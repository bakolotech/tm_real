<?php

namespace App\Http\Controllers;

use App\Models\Famille;
use App\Models\Produit;
use App\Models\ProduitSousCategorie;
use App\Models\Rayon;
use App\Models\SousCategorie;
use App\Models\Univer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\DB;

class UniverController extends Controller
{
    /**
     * UniverController constructor.
     */
    public function __construct()
    {
        $this->middleware('is-admin')->only(['create', 'store', 'edit', 'update', 'destroy']);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $univers = Univer::all();
        return response()->json($univers);
        //return response()->view('front.app-module.Accueil.Accueil');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return response()->view('back.app-modules.univers.add-univers');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {

        try {
            $request->validate(
                [
                    'libelle' => ['required', 'string', 'max:50', 'unique:univers,libelle'],
                    'mini' => ['required', 'max:1000'],
                    'logo' => ['required', 'max:1000'],
                    'logo_hover' => ['required', 'max:1000'],
                    'background' => ['required', 'max:1000'],
                    'ranger' => ['required', Rule::in([1, 2])]
                ],
                [
                    'libelle.*' => "Cette donnée est incorrecte",
                    '*.required' => "Ce champ est obligatoire",
                    '*.max' => "Vous avez dépassé la taille maximale ici",
                    '*.string' => "Ce champ ne peut contenir que des caractères",
                    '*.unique' => "Cette valeur existe déjà"
                ]
            );
        }

        catch (\Exception $exception){
            return back()->with('error-message', "Une erreur s'est produite : ". $exception->getMessage());
        }

        try {
            $mini = Storage::disk('univers_path')->put('minis', $request->file()['mini']);
            $logo = Storage::disk('univers_path')->put('logos', $request->file()['logo']);
            $logoHover = Storage::disk('univers_path')->put('logo_hovers', $request->file()['logo_hover']);
            $background = Storage::disk('univers_path')->put('backgrounds', $request->file()['background']);

            $univer = Univer::create([
                "mini" => $mini,
                "background" => $background,
                "logo" => $logo,
                "logo_hover" => $logoHover,
                "libelle" => self::security($request->get('libelle')),
                "description" => self::security($request->get('description')),
                "ranger" => self::security($request->get('ranger'))
            ]);

            if ($univer instanceof Univer) {
                return back()->with('success-message', "Univers ". $this->text($univer->libelle) ." enrégistré avec succès");
            }
            else return back()->with('error-message', "Une erreur s'est produite. Réessayer s'il vous plaît");
        }
        catch (\Exception $exception){
            return back()->with('error-message', "Une erreur s'est produite : ". $exception->getMessage());
        }
    }

    /**
     * Display the specified resource.
     *
     * @param $id
     * @param null $slug
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Http\Response
     */
    public function show($id, $slug = null)
    {

        if (\Illuminate\Support\Facades\Auth::check() && !isset($_SESSION['config']['user-logged'])) {
            \Illuminate\Support\Facades\Auth::logout();
            return redirect('/');
        }

        $univer = Univer::getOne()->where('id', self::security($id));
        if (!is_null($slug)) {
            $univer->where('slug', self::security($slug));
        }
        $univer = $univer->get();
        $univers = Univer::possibles();
        if ($univer->count() === 1 && $univer[0] instanceof Univer) {
            $univer = $univer[0];
            $background = $univer->backgroundPath();
            $data = [
                'univers' => $univers,
                'univer' => $univer,
                'page' => [
                    'background' => $background,
                    'title' => 'Univers ' . $univer->getLibelle()
                ]
            ];
        }
        else {
            return back()->with('error-message', "Cet univers n'a pas été trouvé");
        }
        return response()->view('front.app-module.univers.show-univers', $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param $id
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Http\Response
     */
    public function edit($id)
    {
        $univers = Univer::where('id', self::security($id))->get();
        if ($univers->count() === 1 && $univers[0] instanceof Univer) {
            $univers = $univers->first();
            $data = [
                'univers' => $univers
            ];

            return response()->view('back.app-modules.univers.edit-univers', $data);
        }
        else{
            return back()->with('message-suppression', "Une erreur est survenue ou univers n'existe pas");
        }

    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, $id)
    {
        $univer = Univer::where([['id', self::security($id)], ['deleted', 0]])->get();
        if ($univer->count() === 1 && $univer[0] instanceof Univer) {
            $univer = $univer[0];
        }
        else{
            return back()->with('error-message', "Une erreur s'est produite : ". "Nous n'avons pas pu retrouver cet univers");
        }
        try {
            $request->validate(
                [
                    'libelle' => ['required', 'string', 'max:50', Rule::unique('univers', 'libelle')->where(function ($req) use ($id){
                        return $req->where([['id', '!=', self::security($id)], ['deleted', 0]]);
                    })],
                    'mini' => ['max:1000'],
                    'logo' => ['max:1000'],
                    'logo_hover' => ['max:1000'],
                    'background' => ['max:1000'],
                    'ranger' => ['required', Rule::in([1, 2])]
                ],
                [
                    'libelle.*' => "Cette donnée est incorrecte",
                    '*.in' => "Cette donnée est incorrecte",
                    '*.required' => "Ce champ est obligatoire",
                    '*.max' => "Vous avez dépassé la taille maximale ici",
                    '*.string' => "Ce champ ne peut contenir que des caractères",
                    '*.unique' => "Cette valeur existe déjà"
                ]
            );

            $logo = self::editFile($request, 'logo', 'univers_path', $univer->logo, 'logos');
            $logoHover = self::editFile($request, 'logo_hover', 'univers_path', $univer->logo_hover, 'logo_hovers');
            $mini = self::editFile($request, 'mini', 'univers_path', $univer->mini, 'minis');
            $background = self::editFile($request, 'background', 'univers_path', $univer->background, 'backgrounds');

            $univer->libelle = self::security($request->get('libelle'));
            $univer->ranger = self::security($request->get('ranger'));
            $univer->logo = $logo;
            $univer->logo_hover = $logoHover;
            $univer->mini = $mini;
            $univer->background = $background;

            $univer->save();

            return back()->with('success-message', "Univers ". $this->$univer->libelle ." modifié avec succès");

        }

        catch (\Exception $exception){
            return back()->with('error-message', "Une erreur s'est produite : ". $exception->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function occasion(Request $request)
    {
        if ($request->has('occation')) {
            $_SESSION['config']['occasion'] = 1;
        }
        return response()->view('front.welcome');
    }

    public function occasion2(Request $request)
    {
        $arr = [];
        try {
            /*$univers = Univer::whereIn('id', function ($req1) use ($request) {
                $req1->select('univer_id')->from((new Rayon)->getTable())
                    ->whereIn('id', function ($req2) {
                        $req2->select('rayon_id')->from((new Famille)->getTable())
                            ->whereIn('id', function ($req3) {
                                $req3->select('famille_id')->from((new SousCategorie)->getTable())->whereIn('id', function ($req4) {
                                    $req4->select('sous_categorie_id')->from((new ProduitSousCategorie)->getTable())
                                        ->where([['locked', 0], ['deleted', 0]]);
                                })->where([['locked', 0], ['deleted', 0]]);
                            })->where([['locked', 0], ['deleted', 0]]);
                    })->where([['locked', 0], ['deleted', 0]]);
                })
                ->where([['locked', 0], ['deleted', 0], ['occasion', 1]])->get();*/
            $univers = Univer::where([['locked', 0], ['deleted', 0], ['occasion', 1]])->get();

            foreach ($univers as $univer) {
                array_push($arr, 'univers-'. $univer->id);
            }
            $data = [
                'univerIds' => $arr,
                'error' => 0
            ];
        }
        catch (\Exception $exception){
            $data = ['error'=>1];
        }

        return response()->json([$data]);
    }

    /**
     * @param Request $request
     * @param $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function loadRayon(Request $request, $id)
    {
        $li = "<div style='display: flex; align-items: center; justify-content: center; height: ;'></div>";
        $univer = Univer::with('rayons')
            ->where('id', self::security($id))->get();

        if ($univer->count() === 1 && $univer[0] instanceof Univer) {
            $univer = $univer[0];
            if ($univer->rayons->count() > 0) {
                foreach ($univer->rayons as $rayon){
                    $li .= "<li class='rayon-menu-li'>
                                <a href='{$rayon->getShowLink()}' class='rayon-menu-a'>
                                    <!--img src='". $rayon->getIconLink() ."' alt='' class='rayon-menu-img'-->
                                    {$rayon->text($rayon->libelle)}
                                </a>
                            </li>";
                }
            }
        }
        return response()->json([$li]);
    }

    /**
     * @param Request $request
     * @param $univer_id
     * @return \Illuminate\Http\JsonResponse
     */
    public function search(Request $request, $univer_id)
    {
        $results = [];

        $request->validate(
            [
                'text' => ['required', 'string', 'min:2']
            ]
        );

        $produits = Produit::with(
            [
                'produitSousCategories' => function($req){
                    return $req->with(
                        [
                            'sousCategorie' => function($req){
                                return $req->with(
                                    [
                                        'famille' => function($req){
                                            return $req->with(
                                                [
                                                    'rayon'
                                                ]
                                            );
                                        }
                                    ]
                                );
                            }
                        ]
                    );
                }
            ]
        )
            ->whereIn('id', function ($req) use($univer_id, $request){
                $req->select('produit_id')->from((new ProduitSousCategorie)->getTable())
                    ->whereIn('sous_categorie_id', function ($req) use ($univer_id, $request){
                        $req->select('id')->from((new SousCategorie)->getTable())
                            ->where('libelle', 'LIKE', '%'. self::security($request->get('text')) .'%')
                            ->whereIn('famille_id', function ($req1) use ($univer_id){
                                $req1->select('id')->from((new Famille)->getTable())
                                    ->whereIn('rayon_id', function ($req2) use ($univer_id){
                                        $req2->select('id')->from((new Rayon)->getTable())
                                            ->where('univer_id', self::security($univer_id));
                                    });
                            });
                    });
            })
            ->get();

        if ($produits->count() > 0) {
            return response()->json([$produits]);
        }

    }

    public function univerById($id) {
        // return $id;
        $boutique_rayon = DB::table('rayons')
        ->join('boutique_rayons', 'boutique_rayons.rayon_id', '=', 'rayons.id')
        ->join('boutiques', 'boutiques.id', '=', 'boutique_rayons.boutique_id')
        ->select('boutique_rayons.*', 'rayons.libelle')
        ->where('rayons.univer_id', $id)
        ->where('boutique_rayons.boutique_id', $_SESSION['boutique_marchand_id'])
        ->get();

        return $boutique_rayon;

    }

    public function univerRayons(Request $request, $id) {

        $rayon_id =
        Rayon::find($id);

        $rayons =
        DB::table('univers')
        ->join('rayons', 'rayons.univer_id', 'univers.id')
        ->select('rayons.*')
        ->where('univers.id', $rayon_id->univer_id)
        ->get();

        return $rayons;

    }

}
