<?php

namespace App\Http\Controllers;

use App\Models\Caracteristique;
use App\Models\Famille;
use App\Models\SousCategorie;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class SousCategorieController extends Controller
{
    /**
     * UniverController constructor.
     */
    public function __construct()
    {
        $this->middleware(['auth', 'is-admin'])->only(['create', 'store', 'edit', 'update', 'destroy']);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $caracteristiques = Caracteristique::where([['deleted', 0], ['locked', 0], ['archived', 0]])->get();
        $familles = Famille::where([['deleted', 0], ['archived', 0], ['locked', 0]])->get();
        $data = [
            'caracteristiques' => $caracteristiques,
            'familles' => $familles
        ];

        return response()->view('back.app-modules.sous-categorie.add-sous-categorie', $data);
    }

    /**
     * Methode d'enregitrement d'une sous-categorie
     *
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        //dd($request);
        try {
            $request->validate(
                [
                    'libelle' => ['required', 'string', 'max:50', 'unique:sous_categories,libelle'],
                    'description' => ['string', 'nullable', 'max:1000'],
                    'famille_id' => ['required','integer', 'max:100'],
                    'image' => ["nullable","mimes:jpeg,jpg,png,svg"],
                    "caracteristiques" => ["nullable","array","min:1"],
                    'caracteristiques.*' => ['required', 'integer', Rule::exists('caracteristiques', 'id')
                        ->where(function ($query){
                            return $query->where([['deleted', 0], ['archived', 0], ['locked', 0]]);
                        })]
                ],
                [
                    'libelle.*' => "Cette donnée est incorrecte",
                    '*.max' => "Cette donnée à dépassé la taille maximale",
                    '*.string' => "Ce champ ne peut contenir que des caractères",
                    '*.unique' => "Cette valeur existe déjà"
                ]
            );
        }
        catch (\PDOException $exception){
            return back()->with('error-message', "Une erreur s'est produite : ". $exception->getMessage());
        }

        try {

            $image = self::storeFile($request,'image','sous_categorie_path','image');

            $sousCategorie = SousCategorie::create([
                "libelle" => self::security($request->get('libelle')),
                "famille_id" =>$request->famille_id,
                "description" => self::security($request->get('description')),
                "image" => $image

            ]);

            if ($sousCategorie instanceof SousCategorie) {
                if (!is_null($request['caracteristiques']) && count($request['caracteristiques']) > 0) {
                    foreach ($request['caracteristiques'] as $caracteristique_id){
                        $sousCategorie->sousCategorieCaracteristiques()->create(
                            [
                                'caracteristique_id' => $caracteristique_id
                            ]
                        );
                    }
                }
                return back()->with('success-message', "La sous catégorie ". $this->text($sousCategorie->libelle) ." enrégistrée avec succès");
            }
            else return back()->with('error-message', "Une erreur s'est produite. Nous n'avons pas terminé la configuration de la sous famille.");
        }
        catch (\Exception $exception){
            return back()->with('error-message', "Une erreur s'est produite : ". $exception->getMessage());
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\SousCategorie  $sousCategorie
     * @return \Illuminate\Http\Response
     */
    public function show(SousCategorie $sousCategorie)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\SousCategorie  $sousCategorie
     * @return \Illuminate\Http\Response
     */
    public function edit(SousCategorie $sousCategorie)
    {
        $caracteristiques = Caracteristique::where([['deleted', 0], ['locked', 0], ['archived', 0]])->get();
        $familles = Famille::where([['deleted', 0], ['archived', 0], ['locked', 0]])->get();
        $sc = SousCategorie::with(
            [
                'famille',
                'sousCategorieCaracteristiques' => function($req){
                    return $req->with('caracteristique')->where([['deleted', 0], ['locked', 0], ['archived', 0]]);
                }
            ]
        )
        ->where('id', $sousCategorie->id)->first();

        //dd($sc);

        $data = [
            'caracteristiques' => $caracteristiques,
            'familles' => $familles,
            'sousCategorie' => $sc,
            'page' =>[
                'title' => 'Edition de la sous famille '. $sousCategorie->text($sousCategorie->libelle)
            ]
        ];
        return response()->view('back.app-modules.sous-categorie.edit-sous-categorie', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\SousCategorie  $sousCategorie
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, SousCategorie $sousCategorie)
    {

        $request->validate(
            [
                'libelle' => ['required', 'string', Rule::unique('sous_categories', 'libelle')->where(function ($query) use ($request, $sousCategorie){
                    return $query->where('id', '!=', $sousCategorie->id)->where([['locked', 0], ['deleted', 0], ['locked', 0]]);
                })],
                'famille_id' => ['required', 'integer', 'exists:familles,id'],
                'caracteristiques' => ['array', 'min:1'],
                'caracteristiques.*' => ['integer', 'exists:caracteristiques,id'],
                'description' => ['string', 'nullable', 'max:1000']
            ]
        );

        try {
            $image = self::editFile($request,'image','sous_categorie_path',$sousCategorie->image,'image');

            $sousCategorie->libelle = self::security($request['libelle']);
            $sousCategorie->famille_id = self::security($request['famille_id']);
            $sousCategorie->image = $image;
            $sousCategorie->description = self::security($request['description']);
            $sousCategorie->save();

            foreach ($sousCategorie->sousCategorieCaracteristiques()->get() as $item){
                $item->deleted = 1;
                $item->locked = 1;
                $item->save();
            }
            if (!is_null($request['caracteristiques']) && count($request['caracteristiques']) > 0) {
                foreach ($request['caracteristiques'] as $caracteristique_id){
                    $sousCategorie->sousCategorieCaracteristiques()->create(
                        [
                            'caracteristique_id' => self::security($caracteristique_id)
                        ]
                    );
                }
            }

            return back()->with('success-message', "La sous catégorie ". $this->text($sousCategorie->libelle) ." enrégistrée avec succès");
        }
        catch (\Exception $exception){
            dd($exception->getMessage());
            return back()->with('error-message', "Une erreur s'est produite : ". $exception->getMessage());
        }

        dd($request, $sousCategorie);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\SousCategorie  $sousCategorie
     * @return \Illuminate\Http\Response
     */
    public function destroy(SousCategorie $sousCategorie)
    {
        //
    }
}
