<?php

namespace App\Http\Controllers;

use App\Models\BoutiqueRayons;
use App\Models\Rayon;
use App\Models\RayonCaracteristiqueValeur;
use App\Models\ValeurCaracteristiques;
use App\Models\Univer;
use App\Models\Famille;
use App\Models\Produit;
use Illuminate\Http\Request;
use App\Models\SousCategorie;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use App\Http\Controllers\ProduitController;
class RayonController extends Controller
{
    /**
     * UniverController constructor.
     */
    private $categorie_par_defaut;
    public function __construct()
    {
        $this->middleware('is-admin')->only(['create', 'store', 'edit', 'update', 'destroy']);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function index()
    {
        //return view('front.app-module.Accueil.etagere');
        return redirect('/');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $univers = Univer::possibles();
        $datas = [
            'univers' => $univers
        ];
        return response()->view('back.app-modules.rayons.add-rayon', $datas);
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        try {
            $request->validate(
                [
                    'univers' => ['required', 'integer', Rule::exists('univers', 'id')->where(function ($req) {
                        return $req->where([['locked', 0], ['deleted', 0]]);
                    })],
                    'libelle' => ['required', 'string', 'max:50', 'unique:rayons,libelle'],
                    'description' => ['string', 'nullable', 'max:1000'],
                    'logo' => ['required', 'max:100'],
                    'petite_etagere' => ['required', 'max:500'],
                    'grande_etagere' => ['required', 'max:1000'],
                ],
                [
                    '*.exists' => "Cette valeur est incorrecte",
                    '*.required' => "Ce champ est obligatoire",
                    '*.max' => "Vous avez dépassé la taille maximale ici",
                    '*.integer' => "Ce champ ne peut contenir que des entiers",
                    '*.string' => "Ce champ ne peut contenir que des caractères",
                    '*.unique' => "Cette valeur existe déjà"
                ]
            );
        }
        catch (\Exception $exception){
            return back()->with('error-message', "Une erreur s'est produite : ". $exception->getMessage());
        }

        //dd($request);

        try {
            $logo = Storage::disk('rayon_path')->put('logo', $request->file()['logo']);
            $logoHover = ''; //Storage::disk('rayon_path')->put('grande_etagere', $request->file()['grande_etagere']);
            $petiteEtagere = Storage::disk('rayon_path')->put('petite_etagere', $request->file()['petite_etagere']);
            $grandeEtagere = Storage::disk('rayon_path')->put('grande_etagere', $request->file()['grande_etagere']);
            $rayon = Rayon::create([
                "libelle" => self::security($request->get('libelle')),
                "univer_id" => self::security($request->get('univers')),
                "description" => self::security($request->get('description')),
                'logo' => $logo,
                'logo_hover' => $logoHover,
                'petite_etagere' => $petiteEtagere,
                'grande_etagere' => $grandeEtagere,
            ]);

            if ($rayon instanceof Rayon) {
                return back()->with('success-message', "Le rayon ". $this->text($rayon->libelle) ." enrégistré avec succès");
            }
            else return back()->with('error-message', "Une erreur s'est produite. Réessayer s'il vous plaît");
        }
        catch (\Exception $exception){
            return back()->with('error-message', "Une erreur s'est produite : ". $exception->getMessage());
        }
    }

    /**
     * @param $rayon_id
     * @param null $slug
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Http\Response
     */
    public function show($rayon_id, $slug = null, $origin = null)
    {

        if (\Illuminate\Support\Facades\Auth::check() && !isset($_SESSION['config']['user-logged'])) {
            \Illuminate\Support\Facades\Auth::logout();
            return redirect('/');
        }

        $rayon = Rayon::getOne()->where('id', self::security($rayon_id));

        if (!is_null($slug)){
            $rayon->where('slug', self::security($slug));
        }

        $rayon = $rayon->get();

        if ($rayon->count() === 1 && $rayon[0] instanceof Rayon) {
            $rayon = $rayon[0];

            $default_famille = $rayon->familles[0]->id;
            foreach ($rayon->familles as $famille) {

                if ($famille->default_categorie == 1) {
                    $default_famille = $famille->id;
                    $this->categorie_par_defaut = $famille->id;
                }

            }

            $rayon_univer = DB::table('univers')->where('id', $rayon->univer_id)->get();

            $data = [
                'rayon' => $rayon,
                'page' => [
                    'title' => 'Rayon ' . $rayon->getLibelle()
                ],
                'sous_cat_id' => $origin,
                'default_categorie' => $default_famille,
                'univer_id' => $rayon_univer[0]->id,
                'univer_slug' => $rayon_univer[0]->slug,
            ];
            return response()->view('front.app-module.rayon.show-rayon', $data);
        }
        else {
            return back()->with('error-message', "Ce rayon n'a pas été trouvé");
        }
    }

    public function showProduitRecherche($rayon_id, $slug = null,  $idproduit)
    {

        // traitement et recureation des produits
        $produit = Produit::where('id', $idproduit)->get();

        $produit1 = Produit::where('id', $idproduit);

        $famille_id = "";

        $sous_cat_produ = array();


        if(count($produit) > 0) {

            $rayon = $produit[0]->id_rayon; // id du rayon
            $sous_categorie_id = $produit[0]->sous_categorie_id; // id de la sous categorie
            $famille_id = $produit[0]->id_famille; // id de la famille

            // produit de la sous categorie à la quelle £ le pd
            $sous_categorie_produit1 =
            DB::table('produits')
            ->where('sous_categorie_id', $sous_categorie_id)
            ->where('id', '<>', $produit[0]->id);

            $sous_categorie_produit  = $produit1->union($sous_categorie_produit1)->get();

            $famille_sous_categorie =
            DB::table('sous_categories')
            ->where('id', '<>', $sous_categorie_id)
            ->where('famille_id', $famille_id)->get(); // toute les sous cat de la famille

            foreach($sous_categorie_produit as $produit) {

                $caracteristiques = DB::table('rayon_caracteristique_valeurs')
                ->join('produit_caracteristique_valeurs', 'produit_caracteristique_valeurs.id_caracteristique_valeur', '=', 'rayon_caracteristique_valeurs.valeur_id')
                ->join('produits', 'produits.id', '=', 'produit_caracteristique_valeurs.id_produit')
                ->join('rayons', 'rayons.id', '=', 'produits.id_rayon')
                ->join('caracteristiques', 'caracteristiques.id', '=', 'rayon_caracteristique_valeurs.caracteristique_id')
                ->join('valeur_caracteristiques', 'valeur_caracteristiques.id', '=', 'produit_caracteristique_valeurs.id_caracteristique_valeur')
                ->where('produit_caracteristique_valeurs.id_produit', $produit->id)
                ->where('rayon_caracteristique_valeurs.rayon_id', $produit->id_rayon)
                ->select('caracteristiques.libelle as lib_caract', 'valeur_caracteristiques.libelle as lib_valeur')
                ->get();

                $capacite_val = '';

                if (count($caracteristiques) > 0) {

                    foreach ($caracteristiques as $c) {
                        if ($c->lib_caract == 'Capacités') {
                            $capacite_val = $c->lib_valeur;
                        }
                    }

                    $produit->capacite = $capacite_val;

                }


            }

            $sous_categorie_produit_array = array();
            array_push($sous_categorie_produit_array, $sous_categorie_produit);

            foreach($famille_sous_categorie as $famille_sous_cate) {
                $sous_categorie_produit2 = Produit::where('sous_categorie_id', $famille_sous_cate->id)->get();

                if(count($sous_categorie_produit2) > 0) {
                    foreach($sous_categorie_produit2 as $produit) {

                    $caracteristiques = DB::table('rayon_caracteristique_valeurs')
                    ->join('produit_caracteristique_valeurs', 'produit_caracteristique_valeurs.id_caracteristique_valeur', '=', 'rayon_caracteristique_valeurs.valeur_id')
                    ->join('produits', 'produits.id', '=', 'produit_caracteristique_valeurs.id_produit')
                    ->join('rayons', 'rayons.id', '=', 'produits.id_rayon')
                    ->join('caracteristiques', 'caracteristiques.id', '=', 'rayon_caracteristique_valeurs.caracteristique_id')
                    ->join('valeur_caracteristiques', 'valeur_caracteristiques.id', '=', 'produit_caracteristique_valeurs.id_caracteristique_valeur')
                    ->where('produit_caracteristique_valeurs.id_produit', $produit->id)
                    ->where('rayon_caracteristique_valeurs.rayon_id', $produit->id_rayon)
                    ->select('caracteristiques.libelle as lib_caract', 'valeur_caracteristiques.libelle as lib_valeur')
                    ->get();

                    $capacite_val = '';

                    if (count($caracteristiques) > 0) {

                        foreach ($caracteristiques as $c) {
                            if ($c->lib_caract == 'Capacités') {
                                $capacite_val = $c->lib_valeur;
                            }
                        }

                        $produit->capacite = $capacite_val;

                    }


                    }
                    array_push($sous_categorie_produit_array, $sous_categorie_produit2);
                }

            }

            $sous_cat_produ = $sous_categorie_produit_array;


        }

        $rayon = Rayon::getOne()->where('id', self::security($rayon_id));

        if (!is_null($slug)){
            $rayon->where('slug', self::security($slug));
        }


        $rayon = $rayon->get();

        if ($rayon->count() === 1 && $rayon[0] instanceof Rayon) {
            $rayon = $rayon[0];

            $default_famille = $rayon->familles[0]->id;
            foreach ($rayon->familles as $famille) {

                if ($famille->default_categorie == 1) {
                    $default_famille = $famille->id;
                    $famille->default_categorie = 0;
                }

                if($famille->id == $famille_id) {
                    $famille->default_categorie = 1;
                }

            }

            $data = [
                'rayon' => $rayon,
                'page' => [
                    'title' => 'Rayon ' . $rayon->getLibelle()
                ],
                'id_produit' => $idproduit,
                'default_categorie' => $default_famille,
                'produits' => $sous_cat_produ
            ];

            return response()->view('front.app-module.rayon.show-rayon-recherche', $data);
        }

        else {
            return back()->with('error-message', "Ce rayon n'a pas été trouvé");
        }
    }

    public function show_detail(Request $request){

        if (!isset($_SESSION['panier']) || !isset($_SESSION['panier_rapide'])) {
            $_SESSION['panier'] = [];
            $_SESSION['panier_rapide'] = [];
        }
        $_SESSION['panier'] = array_values($_SESSION['panier']) ;
        $id = $request->id;

        $produits = DB::table('sous_categories')
            ->join('produits', 'sous_categories.id', '=', 'produits.sous_categorie_id')
            ->select('produits.*')
            ->where('produits.sous_categorie_id', '=', $id)
            ->get();

        $autres = DB::table('sous_categories')
            ->join('produits', 'sous_categories.id', '=', 'produits.sous_categorie_id')
            ->join('produit_images', 'produit_images.produit_id', '=', 'produits.id')
            ->select('produit_images.id', 'produit_images.image')
            ->where('produits.sous_categorie_id', '=', $id)
            ->get();

        global $a ;
        global $tab ;
        $tab = [];
        $a = 0;

        return response()->json([$produits,$autres,$a,$tab]);
    }

    public function show_detail_modif(Request $request){

        global $a ;
        global $tab ;
        $tab = [];
        $a = 0;
        $id1 = $request->id;

        $_SESSION['panier'] = array_values($_SESSION['panier']) ;
        $tab = $_SESSION['panier'][$id1];

        $id = $tab['id_produit'];

       $current_produit= Produit::where('id', $id)->get();  // get produit by id
       $Boutique_id = $current_produit[0]->boutique_id; // get id boutique de produit //139
       $Rayon_id = $current_produit[0]->id_rayon; // id Rayon de prodit
       $Id_produit = $id; // id produit 193
       // get univers id
       $Univers_libelle =
            DB::table('univers')
            ->join('rayons', 'rayons.univer_id', '=', 'univers.id')
            ->where('rayons.id', $current_produit[0]->id_rayon)
            ->select('univers.libelle')
            ->get();

        $produit_rayons =
            DB::table('rayons')
            ->where('rayons.id', $current_produit[0]->id_rayon)
            ->select('rayons.libelle', 'rayons.id')
            ->get();

       $Category_produit =
            DB::table('familles')
            ->join('produits', 'produits.id_famille', '=', 'familles.id')
            ->where('familles.id', $current_produit[0]->id_famille)
            ->select('familles.libelle')
            ->distinct('familles.libelle')
            ->get();
        // get caracteristiques produits
       $Caracteristiques =
            DB::table('rayon_caracteristique_valeurs')
            ->join('produit_caracteristique_valeurs', 'produit_caracteristique_valeurs.id_caracteristique_valeur', '=', 'rayon_caracteristique_valeurs.valeur_id')
            ->join('produits', 'produits.id', '=', 'produit_caracteristique_valeurs.id_produit')
            ->join('rayons', 'rayons.id', '=', 'produits.id_rayon')
            ->join('caracteristiques', 'caracteristiques.id', '=', 'rayon_caracteristique_valeurs.caracteristique_id')
            ->join('valeur_caracteristiques', 'valeur_caracteristiques.id', '=', 'produit_caracteristique_valeurs.id_caracteristique_valeur')
            ->where('produit_caracteristique_valeurs.id_produit',  $Id_produit)
            ->where('rayon_caracteristique_valeurs.rayon_id',  $Rayon_id)
            ->select('caracteristiques.libelle as lib_caract', 'valeur_caracteristiques.libelle as lib_valeur')
            ->get();

        $tab_caracteristique = [];
        $tab_caracteristique_supp = [];

       foreach ($Caracteristiques as $caracteristique) {
        $tab_caracteristique[$caracteristique->lib_caract] = $caracteristique->lib_valeur;
       }

       // get caracteristiques produits  SUPPLEMENTAIRE
       $Caracteristique_supp =
             DB::table('produit_caracteristiques')
            ->join('produits', 'produits.id', '=', 'produit_caracteristiques.produit_id')
            ->join('boutique_produit_car_valeurs', 'boutique_produit_car_valeurs.id', '=', 'produit_caracteristiques.valeur')
            ->join('boutique_produit_caracteristiques', 'boutique_produit_caracteristiques.id', '=', 'boutique_produit_car_valeurs.idBoutiqueCarValeur')
            ->where('produit_caracteristiques.produit_id',  $Id_produit)
            ->select('boutique_produit_caracteristiques.libelle', 'boutique_produit_car_valeurs.valeur')
            ->get();

       foreach ($Caracteristique_supp as $caracteritique_sp) {
        $tab_caracteristique_supp[$caracteritique_sp->libelle] = $caracteritique_sp->valeur;
       }

       $tab_contactener = array_merge($tab_caracteristique, $tab_caracteristique_supp);

       $Image_supp =
            DB::table('produit_images')
            ->where('produit_id',  $Id_produit)
            ->select('produit_images.image')
            ->get();

       $Negoce_produit =
            DB::table('produit_negociation_intervals')
            ->where('produit_id',  $Id_produit)
            ->select('produit_negociation_intervals.type_negociation', 'produit_negociation_intervals.valeur')
            ->get();

       $Achat_multiple_produit =
            DB::table('produit_achat_multiples')
            ->where('produit_id',  $Id_produit)
            ->select('produit_achat_multiples.nombre_produits', 'produit_achat_multiples.pourcentage')
            ->get();

       $Option_retour_produit =
            DB::table('produit_options_retours')
            ->where('produit_id',  $Id_produit)
            ->select('produit_options_retours.type_retour', 'produit_options_retours.nombre_jours', 'produit_options_retours.payee_par')
            ->get();

       $Expeditions_produit =
            DB::table('expedition')
            ->join('produit_expeditions', 'produit_expeditions.id_expedition', '=', 'expedition.id')
            ->where('produit_expeditions.produit_id',  $Id_produit)
            ->select('expedition.mode_expedition', 'produit_expeditions.paye_par', 'produit_expeditions.prix')
            ->get();

       $Pays_exclus_produit =
            DB::table('produit_pays_exclus')
            ->where('produit_id',  $Id_produit)
            ->select('produit_pays_exclus.pays')
            ->get();

       $CCredit =
            DB::table('produits')
            ->join('boutiques', 'boutiques.id', '=',  'produits.boutique_id')
            ->join('facturations', 'facturations.id_boutique', '=',  'boutiques.id')
            ->join('mobile_payements', 'mobile_payements.id_marchand', '=',  'boutiques.id_marchand')
            ->where('boutiques.id', '=', $current_produit[0]->boutique_id)
            ->where('facturations.status', '=', 1)
            ->select('facturations.type_carte' )
            ->distinct('facturations.type_carte')
            ->get();

       $MPaiement =
            DB::table('produits')
            ->join('boutiques', 'boutiques.id', '=',  'produits.boutique_id')
            ->join('facturations', 'facturations.id_boutique', '=',  'boutiques.id')
            ->join('mobile_payements', 'mobile_payements.id_marchand', '=',  'boutiques.id_marchand')
            ->where('boutiques.id', '=', $current_produit[0]->boutique_id)
            ->where('mobile_payements.status', '=', 0)
            ->select( 'mobile_payements.type_service')
            ->distinct( 'mobile_payements.type_service')
            ->get();

       //return response()->json([$stats1]);

        return response()->json([
            'status'=> 200,
            'Detail_Produit'=> [
                    $current_produit,
                    $Univers_libelle,
                    $Category_produit,
                    $Caracteristiques,
                    $Caracteristique_supp,
                    $Image_supp,
                    $Negoce_produit ,
                    $Achat_multiple_produit,
                    $Option_retour_produit,
                    $Expeditions_produit,
                    $Pays_exclus_produit,
                    $CCredit,
                    $MPaiement,
                    $produit_rayons,
                    $tab_contactener,
                    $tab
            ]
        ]);

    }

    public function show_detail_modif2(Request $request){

        global $a ;
        global $tab ;
        $tab = [];
        $a = 0;
        $id1 = $request->id;

        // $_SESSION['panier_rapide'] = array_values($_SESSION['panier_rapide']) ;
        $tab = $_SESSION['panier_rapide'][$id1];
        // return $tab;

        $id = $tab[0]['id'];

       $current_produit= Produit::where('id', $id)->get();  // get produit by id
       $Boutique_id = $current_produit[0]->boutique_id; // get id boutique de produit //139
       $Rayon_id = $current_produit[0]->id_rayon; // id Rayon de prodit
       $Id_produit = $id; // id produit 193
       // get univers id
       $Univers_libelle =
       DB::table('univers')
        ->join('rayons', 'rayons.univer_id', '=', 'univers.id')
        ->where('rayons.id', $current_produit[0]->id_rayon)
        ->select('univers.libelle')
        ->get();

        $produit_rayons =
        DB::table('rayons')
        ->where('rayons.id', $current_produit[0]->id_rayon)
        ->select('rayons.libelle', 'rayons.id')
        ->get();

       $Category_produit =
       DB::table('familles')
        ->join('produits', 'produits.id_famille', '=', 'familles.id')
        ->where('familles.id', $current_produit[0]->id_famille)
        ->select('familles.libelle')
        ->distinct('familles.libelle')
        ->get();
        // get caracteristiques produits
       $Caracteristiques =
       DB::table('rayon_caracteristique_valeurs')
        ->join('produit_caracteristique_valeurs', 'produit_caracteristique_valeurs.id_caracteristique_valeur', '=', 'rayon_caracteristique_valeurs.valeur_id')
        ->join('produits', 'produits.id', '=', 'produit_caracteristique_valeurs.id_produit')
        ->join('rayons', 'rayons.id', '=', 'produits.id_rayon')
        ->join('caracteristiques', 'caracteristiques.id', '=', 'rayon_caracteristique_valeurs.caracteristique_id')
        ->join('valeur_caracteristiques', 'valeur_caracteristiques.id', '=', 'produit_caracteristique_valeurs.id_caracteristique_valeur')
        ->where('produit_caracteristique_valeurs.id_produit',  $Id_produit)
        ->where('rayon_caracteristique_valeurs.rayon_id',  $Rayon_id)
        ->select('caracteristiques.libelle as lib_caract', 'valeur_caracteristiques.libelle as lib_valeur')
        ->get();

        $tab_caracteristique = [];
        $tab_caracteristique_supp = [];

       foreach ($Caracteristiques as $caracteristique) {
        $tab_caracteristique[$caracteristique->lib_caract] = $caracteristique->lib_valeur;
       }

       // get caracteristiques produits  SUPPLEMENTAIRE
       $Caracteristique_supp =
       DB::table('produit_caracteristiques')
        ->join('produits', 'produits.id', '=', 'produit_caracteristiques.produit_id')
        ->join('boutique_produit_car_valeurs', 'boutique_produit_car_valeurs.id', '=', 'produit_caracteristiques.valeur')
        ->join('boutique_produit_caracteristiques', 'boutique_produit_caracteristiques.id', '=', 'boutique_produit_car_valeurs.idBoutiqueCarValeur')
        ->where('produit_caracteristiques.produit_id',  $Id_produit)
        ->select('boutique_produit_caracteristiques.libelle', 'boutique_produit_car_valeurs.valeur')
        ->get();

       foreach ($Caracteristique_supp as $caracteritique_sp) {
        $tab_caracteristique_supp[$caracteritique_sp->libelle] = $caracteritique_sp->valeur;
       }

       $tab_contactener = array_merge($tab_caracteristique, $tab_caracteristique_supp);

       $Image_supp =
       DB::table('produit_images')
        ->where('produit_id',  $Id_produit)
        ->select('produit_images.image')
        ->get();

       $Negoce_produit =
       DB::table('produit_negociation_intervals')
        ->where('produit_id',  $Id_produit)
        ->select('produit_negociation_intervals.type_negociation', 'produit_negociation_intervals.valeur')
        ->get();

       $Achat_multiple_produit =
       DB::table('produit_achat_multiples')
        ->where('produit_id',  $Id_produit)
        ->select('produit_achat_multiples.nombre_produits', 'produit_achat_multiples.pourcentage')
        ->get();

        $Option_retour_produit =
        DB::table('produit_options_retours')
         ->where('produit_id',  $Id_produit)
         ->select('produit_options_retours.type_retour', 'produit_options_retours.nombre_jours', 'produit_options_retours.payee_par')
         ->get();

        $Expeditions_produit =
        DB::table('expedition')
         ->join('produit_expeditions', 'produit_expeditions.id_expedition', '=', 'expedition.id')
         ->where('produit_expeditions.produit_id',  $Id_produit)
         ->select('expedition.mode_expedition', 'produit_expeditions.paye_par', 'produit_expeditions.prix')
         ->get();

        $Pays_exclus_produit =
        DB::table('produit_pays_exclus')
         ->where('produit_id',  $Id_produit)
         ->select('produit_pays_exclus.pays')
         ->get();

        $CCredit =
        DB::table('produits')
         ->join('boutiques', 'boutiques.id', '=',  'produits.boutique_id')
         ->join('facturations', 'facturations.id_boutique', '=',  'boutiques.id')
         ->join('mobile_payements', 'mobile_payements.id_marchand', '=',  'boutiques.id_marchand')
         ->where('boutiques.id', '=', $current_produit[0]->boutique_id)
         ->where('facturations.status', '=', 1)
         ->select('facturations.type_carte' )
         ->distinct('facturations.type_carte')
         ->get();

        $MPaiement =
        DB::table('produits')
         ->join('boutiques', 'boutiques.id', '=',  'produits.boutique_id')
         ->join('facturations', 'facturations.id_boutique', '=',  'boutiques.id')
         ->join('mobile_payements', 'mobile_payements.id_marchand', '=',  'boutiques.id_marchand')
         ->where('boutiques.id', '=', $current_produit[0]->boutique_id)
         ->where('mobile_payements.status', '=', 0)
         ->select( 'mobile_payements.type_service')
         ->distinct( 'mobile_payements.type_service')
         ->get();

       //return response()->json([$stats1]);

        return response()->json([
            'status'=> 200,
            'Detail_Produit'=> [
                    $current_produit,
                    $Univers_libelle,
                    $Category_produit,
                    $Caracteristiques,
                    $Caracteristique_supp,
                    $Image_supp,
                    $Negoce_produit ,
                    $Achat_multiple_produit,
                    $Option_retour_produit,
                    $Expeditions_produit,
                    $Pays_exclus_produit,
                    $CCredit,
                    $MPaiement,
                    $produit_rayons,
                    $tab_contactener,
                    $tab
            ]
        ]);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Rayon  $rayon
     * @return \Illuminate\Http\Response
     */
    public function edit($rayon_id)
    {
        $rayon = Rayon::where('id', $rayon_id)->first();
        $univers =Univer::possibles();

        if ($rayon instanceof Rayon)
        {
            return response()
            ->view('back.app-modules.rayons.edit-rayon',
            [
                'rayon'=>$rayon,
                'univers'=>$univers,
                'page' => [ 'title' => 'Édition du rayon ' . strtolower($this->text($rayon->getLibelle())) ]
            ]
            );
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
        //dd($request, Rayon::find($id));
        try {
            $request->validate(
                [
                    'univers' => ['required', 'integer', Rule::exists('univers', 'id')->where(function ($req) {
                        return $req->where([['locked', 0], ['deleted', 0]]);
                    })],
                    'libelle' => ['required', 'string', 'max:50', Rule::unique('rayons', 'libelle')->where(function ($query) use ($request, $id){
                        return $query->where('id', '!=', self::security($id));
                    })],
                    'description' => ['string', 'nullable', 'max:1000']
                ],
                [
                    '*.exists' => "Cette valeur est incorrecte",
                    '*.required' => "Ce champ est obligatoire",
                    '*.max' => "Vous avez dépassé la taille maximale ici",
                    '*.integer' => "Ce champ ne peut contenir que des entiers",
                    '*.string' => "Ce champ ne peut contenir que des caractères",
                    '*.unique' => "Cette valeur existe déjà"
                ]
            );
        }
        catch (\Exception $exception){
            return back()->with('error-message', "Une erreur s'est produite : ". $exception->getMessage());
        }

        try {

            $rayon= Rayon::find(self::security($id));
            if ($rayon instanceof Rayon) {
                $libelle = self::security($request->get('libelle'));
                $univers = self::security($request->get('univers'));
                $description = self::security($request->get('description'));

                $petiteEtagere = Controller::editFile($request, 'petite_etagere', 'rayon_path', $rayon->petite_etagere, 'petite_etagere');
                $grandeEtagere = Controller::editFile($request, 'grande_etagere', 'rayon_path', $rayon->grande_etagere, 'grande_etagere');
                $logo = Controller::editFile($request, 'logo', 'rayon_path', $rayon->logo, 'logo');

                //return back()->with('success-message', "Le rayon ". $this->text($rayon->libelle) ." modifié avec succès");

                $rayon->libelle = $libelle;
                $rayon->univer_id = $univers;
                $rayon->description = $description;
                $rayon->logo = $logo;
                $rayon->petite_etagere = $petiteEtagere;
                $rayon->grande_etagere = $grandeEtagere;
                $rayon->save();
                return back()->with('success-message', "Le rayon " . $this->text($rayon->libelle) . " modifié avec succès");

            }
            else{
                return back()->with('error-message', "Une erreur s'est produite : Le rayon n'a pas été trouvé");
            }
        }
        catch (\Exception $exception){
            return back()->with('error-message', "Une erreur s'est produite : ". $exception->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Rayon  $rayon
     * @return \Illuminate\Http\Response
     */
    public function destroy(Rayon $rayon)
    {
        //
    }

    public function universProduit($id) {
        $rayon = Univer::getById($id);
        return $rayon['0']['rayons'];
    }

    public function getRayonFamille(Request $request) {
        $rayon = Rayon::where('id', $request->id)->with('familles')->get();
        return $rayon;
    }

    public function caracteristiqueAffectation(Request $request) {
        $tab_valeur = [];
        $check_error = false;
        foreach ($request->valeur as $key => $value) {

            $valeur_id = DB::table('valeur_caracteristiques')
                            ->select('valeur_caracteristiques.*')
                            ->where('libelle', $value)
                            ->get();
            $tab_valeur[] = $valeur_id[0]->id;

            if (count($valeur_id) > 0) {
                $rayon_caracteristique_valeur = RayonCaracteristiqueValeur::create([
                    'rayon_id' => $request->rayon,
                    'caracteristique_id' => $request->caracteristique,
                    'valeur_id' => $valeur_id[0]->id
                ]);

                if(!$rayon_caracteristique_valeur){
                    $check_error = true;
                }

            }
        }

        if ($check_error) {
            return 'error';
        }else {
            return 'succuss';
        }

    }

    public function caracteristiqueByRayonId(Request $request, $id) {
        $caracteristique =
        DB::table('rayons')
        ->join('rayon_caracteristique_valeurs', 'rayon_caracteristique_valeurs.rayon_id', '=', 'rayons.id')
        ->join('caracteristiques', 'caracteristiques.id', '=', 'rayon_caracteristique_valeurs.caracteristique_id')
        ->join('valeur_caracteristiques', 'valeur_caracteristiques.id', '=', 'rayon_caracteristique_valeurs.valeur_id')
        ->select('rayon_caracteristique_valeurs.*', 'caracteristiques.libelle')
        ->where('rayon_caracteristique_valeurs.rayon_id', $id)
        ->groupBy('rayon_caracteristique_valeurs.caracteristique_id')
        ->get();

        return $caracteristique;

    }

    public function getValeursForRayon(Request $request) {

        $valeur = DB::table('rayons')
        ->join('rayon_caracteristique_valeurs', 'rayon_caracteristique_valeurs.rayon_id', '=', 'rayons.id')
        ->join('caracteristiques', 'caracteristiques.id', '=', 'rayon_caracteristique_valeurs.caracteristique_id')
        ->join('valeur_caracteristiques', 'valeur_caracteristiques.id', '=', 'rayon_caracteristique_valeurs.valeur_id')
        ->select('valeur_caracteristiques.*')
        ->where('rayon_caracteristique_valeurs.caracteristique_id', $request->caracteristique)
        ->where('rayon_caracteristique_valeurs.rayon_id', $request->rayon)
        ->get();

        return $valeur;

    }

    public function rayonUnivers($id) {
        $rayon = Rayon::where('id', $id)->with('familles')->get();
        $rayon_famille = Famille::where('rayon_id', $id);
        // return [$rayon[0]->univer_id, $rayon_famille];
        return $rayon[0];
    }

    public function showMarchandRayon($rayon_id, $slug = null)
    {
        $rayon = Rayon::getOne()->where('id', self::security($rayon_id));
        if (!is_null($slug)){
            $rayon->where('slug', self::security($slug));
        }
        $rayon = $rayon->get();
        if ($rayon->count() === 1 && $rayon[0] instanceof Rayon) {
            $rayon = $rayon[0];
            $data = [
                'rayon' => $rayon,
                'page' => [
                    'title' => 'Rayon ' . $rayon->getLibelle()
                ]
            ];
            return response()->view('front.app-module.rayon.show-rayon', $data);
        }
        else {
            return back()->with('error-message', "Ce rayon n'a pas été trouvé");
        }
    }

    public function showMarchand($rayon_id)
    {
        $rayon = Rayon::getOne()->where('id', self::security($rayon_id));
        // $produit = Produit::where('rayon_id', $rayon_id);
        $rayon = $rayon->get();
        if ($rayon->count() === 1 && $rayon[0] instanceof Rayon) {
            $rayon = $rayon[0];
            $data = [
                'rayon' => $rayon,
                'page' => [
                    'title' => 'Rayon ' . $rayon->getLibelle()
                ]
            ];
            return response()->view('front.app-module.marchand.show-marchand-rayon-product', $data);
        }
        else {
            return back()->with('error-message', "Ce rayon n'a pas été trouvé");
        }
    }

// pour affichez les rayons de la boutique
public function boutiqueRayon() {

    $tab = [];
    $rayons =
    DB::table('rayons')
    ->join('boutique_rayons', 'boutique_rayons.rayon_id', '=', 'rayons.id')
    ->select('rayons.*', 'boutique_rayons.status as status_rayon')
    ->orderBy('status_rayon', 'DESC')
    ->where('boutique_rayons.boutique_id', $_SESSION['boutique_marchand_id'])
    ->get();

    foreach ($rayons as $r) {
        $tab[] = $r;
    }

    return $tab;

}

public function boutiqueRayonPartager(Request $request, $boutique) {

    $tab = [];

    $rayons =
    DB::table('rayons')
    ->join('boutique_rayons', 'boutique_rayons.rayon_id', '=', 'rayons.id')
    ->select('rayons.*', 'boutique_rayons.status as status_rayon')
    ->where('boutique_rayons.boutique_id', $boutique)
    ->where('boutique_rayons.rayon_id', '<>', $request->rayon_active);

    $rayons1 =
    DB::table('rayons')
    ->join('boutique_rayons', 'boutique_rayons.rayon_id', '=', 'rayons.id')
    ->select('rayons.*', 'boutique_rayons.status as status_rayon')
    ->where('boutique_rayons.boutique_id', $boutique)
    ->where('boutique_rayons.rayon_id', $request->rayon_active);

    $rayon_final = $rayons1->union($rayons)->get();

    foreach ($rayon_final as $r) {
        $tab[] = $r;
    }

    return response()->json(['rayon' => $tab, 'boutique' => $boutique]);

}

public function rayonBackgroundPartager($id_rayon, $id_boutique) {

    $rayon_bg = Rayon::where('id', $id_rayon)->get();

    $produits =
    Produit::where('id_rayon', $id_rayon)
    ->where('boutique_id', $id_boutique)
    ->get();

    foreach($produits as $produit) {

    $caracteristiques = DB::table('rayon_caracteristique_valeurs')
    ->join('produit_caracteristique_valeurs', 'produit_caracteristique_valeurs.id_caracteristique_valeur', '=', 'rayon_caracteristique_valeurs.valeur_id')
    ->join('produits', 'produits.id', '=', 'produit_caracteristique_valeurs.id_produit')
    ->join('rayons', 'rayons.id', '=', 'produits.id_rayon')
    ->join('caracteristiques', 'caracteristiques.id', '=', 'rayon_caracteristique_valeurs.caracteristique_id')
    ->join('valeur_caracteristiques', 'valeur_caracteristiques.id', '=', 'produit_caracteristique_valeurs.id_caracteristique_valeur')
    ->where('produit_caracteristique_valeurs.id_produit', $produit->id)
    ->where('rayon_caracteristique_valeurs.rayon_id', $produit->id_rayon)
    ->select('caracteristiques.libelle as lib_caract', 'valeur_caracteristiques.libelle as lib_valeur')
    ->get();

    $capacite_val = '';

    if (count($caracteristiques) > 0) {

        foreach ($caracteristiques as $c) {
            if ($c->lib_caract == 'Capacités') {
                $capacite_val = $c->lib_valeur;
            }
        }

        $produit->capacite = $capacite_val;

    }


    }


    return response()->json([
        'rayon' => $rayon_bg,
        'produits' => $produits
    ]);

}

public function rayonBackground($id) {

    $rayon_bg = Rayon::where('id', $id)->get();

    $slides_data = []; // le [] qui contiendra les p
    $rayons_slides =
    Produit::where('numero_slide', '!=', NULL)
    ->where('id_rayon', $id)
    ->where('boutique_id', $_SESSION['boutique_marchand_id'])
    ->groupBy('numero_slide')
    ->get();

    foreach ($rayons_slides as $slide) {
        $num_slide = $slide->numero_slide;
        $slide_lignes =
        DB::table('produits')
        ->where('numero_slide', $slide->numero_slide)
        ->select('numero_ligne_slide')
        ->groupBy('numero_ligne_slide')
        ->orderBy('numero_ligne_slide', 'asc')
        ->get();

        $tab_produit = [];

        foreach($slide_lignes as $ligne) {
            $ligne_produit =
            DB::table('produits')
            ->where('numero_ligne_slide', $ligne->numero_ligne_slide)
            ->where('numero_slide', $num_slide)
            ->where('boutique_id', $_SESSION['boutique_marchand_id'])
            ->where('id_rayon', $id)
            ->where('deleted', 0)
            ->get();

            if (count($ligne_produit) > 0) {
                $tab_produit[$ligne->numero_ligne_slide][] = $ligne_produit;
            }

        }

        $slides_data[$slide->numero_slide][] = $tab_produit;

    }

    foreach($slides_data as $key => $slides) {
        foreach($slides as $key1 => $rows) {
        $tab_slide_row = [];
        foreach($rows as $key2 => $row) {

        $tab_slide_row[] = $key2;
        $tab_slide_image_position = []; // index and position
        foreach ($row as $key3 => $p) {

        foreach($p as $key4 => $p1) {
            $tab_slide_image_position[$key2][] = $p1->position_sur_etagere;
        }

        }
        }
    }
    }

    return response()->json([
        'rayon' => $rayon_bg,
        'produits' => $slides_data
    ]);

    }

    public function getByLibelle(Request $request) {
        $rayon_id = Rayon::where('libelle', $request->libelle_rayon)->get();
        return $rayon_id[0]->id;
    }

    public function activeDefaultRayon(Request $request) {

        $update = BoutiqueRayons::where('boutique_id', $_SESSION['boutique_marchand_id'])->update([
            'status' => 0
        ]);

        $active_default_rayons = BoutiqueRayons::where('rayon_id', $request->active_rayon)
        ->where('boutique_id', $_SESSION['boutique_marchand_id'])
        ->get();

        if (count($active_default_rayons) > 0) {
            $active_default_rayons[0]->status = 1;
            $active_default_rayons[0]->save();

            $rayons = DB::table('rayons')
                    ->join('boutique_rayons', 'boutique_rayons.rayon_id', '=', 'rayons.id')
                    ->select('rayons.*', 'boutique_rayons.status as status_rayon')
                    ->orderBy('status_rayon', 'DESC')
                    ->where('boutique_rayons.boutique_id', $_SESSION['boutique_marchand_id'])
                    ->get();

            foreach ($rayons as $r) {
                $tab[] = $r;
            }

            return $tab;

        }
    }

    function getArticlesAssocier(Request $request, $id) {

        $article_associe =
        DB::table('rayons')
        ->join('rayon_article_associers', 'rayon_article_associers.rayon_article_associer', '=', 'rayons.id')
        ->select('rayons.*')
        ->where('rayon_article_associers.id_rayon', $id)
        ->get();

        return $article_associe;

    }

    public function show_produit_by_rayon($rayon_id, $rayon_cat, $column) {

        $produit_tab = [];
        if ($rayon_id == 27) {

        $nbre_produit_per_page = $column * 5;

        $produits =
        DB::table('produits')
        ->where('id_rayon', $rayon_id)
        ->where('produits.id_famille', $rayon_cat)
        ->where('produits.deleted', 0)
        ->paginate($nbre_produit_per_page);

        $produit_tab = $produits;


        foreach($produit_tab as $produit) {

            $caracteristiques = DB::table('rayon_caracteristique_valeurs')
            ->join('produit_caracteristique_valeurs', 'produit_caracteristique_valeurs.id_caracteristique_valeur', '=', 'rayon_caracteristique_valeurs.valeur_id')
            ->join('produits', 'produits.id', '=', 'produit_caracteristique_valeurs.id_produit')
            ->join('rayons', 'rayons.id', '=', 'produits.id_rayon')
            ->join('caracteristiques', 'caracteristiques.id', '=', 'rayon_caracteristique_valeurs.caracteristique_id')
            ->join('valeur_caracteristiques', 'valeur_caracteristiques.id', '=', 'produit_caracteristique_valeurs.id_caracteristique_valeur')
            ->where('produit_caracteristique_valeurs.id_produit', $produit->id)
            ->where('rayon_caracteristique_valeurs.rayon_id', $produit->id_rayon)
            ->select('caracteristiques.libelle as lib_caract', 'valeur_caracteristiques.libelle as lib_valeur')
            ->get();

            $capacite_val = '';

            if (count($caracteristiques) > 0) {

                foreach ($caracteristiques as $c) {
                    if ($c->lib_caract == 'Capacités') {
                        $capacite_val = $c->lib_valeur;
                    }
                }

                $produit->capacite = $capacite_val;

            }

        }

        }else if($rayon_id == 25) {
            $nbre_produit_per_page = $column * 3;
            $produits =
            DB::table('produits')
            ->where('id_rayon', $rayon_id)
            ->where('produits.id_famille', $rayon_cat)
            ->where('produits.deleted', 0)
            ->paginate($nbre_produit_per_page);

            $produit_tab = $produits;

        }else if($rayon_id == 28) {
            $nbre_produit_per_page = $column * 3;
            $produits =
            DB::table('produits')
            ->where('id_rayon', $rayon_id)
            ->where('produits.id_famille', $rayon_cat)
            ->where('produits.deleted', 0)
            ->paginate($nbre_produit_per_page);

            $produit_tab = $produits;
        } else if ($rayon_id == 26) {
            $nbre_produit_per_page = $column * 5;
            $produits =
            DB::table('produits')
            ->where('id_rayon', $rayon_id)
            ->where('produits.id_famille', $rayon_cat)
            ->where('produits.deleted', 0)
            ->paginate($nbre_produit_per_page);

            $produit_tab = $produits;

        }else if ($rayon_id == 38) {

            $nbre_produit_per_page = $column * 5;
            $produits =
            DB::table('produits')
            ->where('id_rayon', $rayon_id)
            ->where('produits.id_famille', $rayon_cat)
            ->where('produits.deleted', 0)
            ->paginate($nbre_produit_per_page);

            $produit_tab = $produits;

        }else if ($rayon_id == 39) {

            $nbre_produit_per_page = $column * 5;
            $produits =
            DB::table('produits')
            ->where('id_rayon', $rayon_id)
            ->where('produits.id_famille', $rayon_cat)
            ->where('produits.deleted', 0)
            ->paginate($nbre_produit_per_page);

            $produit_tab = $produits;

        }else if ($rayon_id == 8) {
            
            $nbre_produit_per_page = $column * 5;
            $produits =
            DB::table('produits')
            ->where('id_rayon', $rayon_id)
            ->where('produits.id_famille', $rayon_cat)
            ->where('produits.deleted', 0)
            ->paginate($nbre_produit_per_page);

            $produit_tab = $produits;

        }else if ($rayon_id == 9) {
            
            $nbre_produit_per_page = $column * 5;
            $produits =
            DB::table('produits')
            ->where('id_rayon', $rayon_id)
            ->where('produits.id_famille', $rayon_cat)
            ->where('produits.deleted', 0)
            ->paginate($nbre_produit_per_page);

            $produit_tab = $produits;

        }else if ($rayon_id == 12) {
            
            $nbre_produit_per_page = $column * 5;
            $produits =
            DB::table('produits')
            ->where('id_rayon', $rayon_id)
            ->where('produits.id_famille', $rayon_cat)
            ->where('produits.deleted', 0)
            ->paginate($nbre_produit_per_page);

            $produit_tab = $produits;

        }else if ($rayon_id == 10) {
            
            $nbre_produit_per_page = $column * 5;
            $produits =
            DB::table('produits')
            ->where('id_rayon', $rayon_id)
            ->where('produits.id_famille', $rayon_cat)
            ->where('produits.deleted', 0)
            ->paginate($nbre_produit_per_page);

            $produit_tab = $produits;

        }

        return $produit_tab;

    }

    // get product by screen size
    public function show_produit_by_screen_size($id_rayon, $rayon_cat, $column) {

        $produit_tab = [];
        $default_famille = "";

        $rayon_familles =  DB::table('familles')
        ->where('rayon_id', $id_rayon)
        ->where('default_categorie', 1)
        ->get();

        $rayon_familles_no_default =  DB::table('familles')
        ->where('rayon_id', $id_rayon)
        ->where('default_categorie', 0)
        ->get();

        if (count($rayon_familles) > 0) {
            $default_famille = $rayon_familles[0]->id;
        }else{
            $default_famille = $rayon_familles_no_default[0]->id; 
        }

        if ($id_rayon == 27) { // cas des téléphone
            $nbre_produit_per_page = $column * 5;
            $produits =
            DB::table('produits')
            ->where('produits.id_rayon', $id_rayon)
            ->where('produits.id_famille', $rayon_cat)
            ->where('produits.deleted', 0)
            ->paginate($nbre_produit_per_page);

            $produit_tab = $produits;

            foreach($produit_tab as $produit) {

                $caracteristiques = DB::table('rayon_caracteristique_valeurs')
                ->join('produit_caracteristique_valeurs', 'produit_caracteristique_valeurs.id_caracteristique_valeur', '=', 'rayon_caracteristique_valeurs.valeur_id')
                ->join('produits', 'produits.id', '=', 'produit_caracteristique_valeurs.id_produit')
                ->join('rayons', 'rayons.id', '=', 'produits.id_rayon')
                ->join('caracteristiques', 'caracteristiques.id', '=', 'rayon_caracteristique_valeurs.caracteristique_id')
                ->join('valeur_caracteristiques', 'valeur_caracteristiques.id', '=', 'produit_caracteristique_valeurs.id_caracteristique_valeur')
                ->where('produit_caracteristique_valeurs.id_produit', $produit->id)
                ->where('rayon_caracteristique_valeurs.rayon_id', $produit->id_rayon)
                ->select('caracteristiques.libelle as lib_caract', 'valeur_caracteristiques.libelle as lib_valeur')
                ->get();

                $capacite_val = '';

                if (count($caracteristiques) > 0) {

                    foreach ($caracteristiques as $c) {
                        if ($c->lib_caract == 'Capacités') {
                            $capacite_val = $c->lib_valeur;
                        }
                    }

                    $produit->capacite = $capacite_val;

                }

            }

        }else if ($id_rayon == 38) { // cas des téléphone

        $nbre_produit_per_page = $column * 5;
        $produits =
        DB::table('produits')
        ->where('produits.id_rayon', 38)
        ->where('produits.id_famille', $rayon_cat)
        ->where('produits.deleted', 0)
        ->paginate($nbre_produit_per_page);

        $produit_tab = $produits;

        }else if ($id_rayon == 9) { // cas des téléphone

            $nbre_produit_per_page = $column * 5;
            $produits =
            DB::table('produits')
            ->where('produits.id_rayon', 9)
            ->where('produits.id_famille', $rayon_cat)
            ->where('produits.deleted', 0)
            ->paginate($nbre_produit_per_page);
    
            $produit_tab = $produits;
    
        }else if($id_rayon == 25) {

            $nbre_produit_per_page = $column * 3;
            $produits =
            DB::table('produits')
            ->where('id_rayon', $id_rayon)
            ->where('produits.id_famille', $rayon_cat)
            ->where('produits.deleted', 0)
            ->paginate($nbre_produit_per_page);

            $produit_tab = $produits;

        }else if($id_rayon == 28) {

            $nbre_produit_per_page = $column * 3;
            $produits =
            DB::table('produits')
            ->where('id_rayon', $id_rayon)
            ->where('produits.id_famille', $rayon_cat)
            ->where('produits.deleted', 0)
            ->paginate($nbre_produit_per_page);

            $produit_tab = $produits;
        }else if ($id_rayon == 26) {

            $nbre_produit_per_page = $column * 5;
            $produits =
            DB::table('produits')
            ->where('id_rayon', $id_rayon)
            ->where('produits.id_famille', $rayon_cat)
            ->where('produits.deleted', 0)
            ->paginate($nbre_produit_per_page);

            $produit_tab = $produits;

        }else if ($id_rayon == 10) {

            $nbre_produit_per_page = $column * 5;
            $produits =
            DB::table('produits')
            ->where('id_rayon', $id_rayon)
            ->where('produits.id_famille', $rayon_cat)
            ->where('produits.deleted', 0)
            ->paginate($nbre_produit_per_page);

            $produit_tab = $produits;

        }else if ($id_rayon == 39) {

            $nbre_produit_per_page = $column * 5;
            $produits =
            DB::table('produits')
            ->where('id_rayon', $id_rayon)
            ->where('produits.id_famille', $rayon_cat)
            ->where('produits.deleted', 0)
            ->paginate($nbre_produit_per_page);

            $produit_tab = $produits;

        }else if ($id_rayon == 8) {

            $nbre_produit_per_page = $column * 5;
            $produits =
            DB::table('produits')
            ->where('id_rayon', $id_rayon)
            ->where('produits.id_famille', $rayon_cat)
            ->where('produits.deleted', 0)
            ->paginate($nbre_produit_per_page);

            $produit_tab = $produits;

        }else if ($id_rayon == 12) {

            $nbre_produit_per_page = $column * 5;
            $produits =
            DB::table('produits')
            ->where('id_rayon', $id_rayon)
            ->where('produits.id_famille', $rayon_cat)
            ->where('produits.deleted', 0)
            ->paginate($nbre_produit_per_page);

            $produit_tab = $produits;

        }

        return $produit_tab;

    }

        // get product by screen size
        public function show_produit_by_screen_size_mobile($id_rayon, $rayon_cat, $column) {

            $produit_tab = [];
            $default_famille = "";
    
            $rayon_familles =  DB::table('familles')
            ->where('rayon_id', $id_rayon)
            ->where('default_categorie', 1)
            ->get();
    
            $rayon_familles_no_default =  DB::table('familles')
            ->where('rayon_id', $id_rayon)
            ->where('default_categorie', 0)
            ->get();
    
            if (count($rayon_familles) > 0) {
                $default_famille = $rayon_familles[0]->id;
            }else{
                $default_famille = $rayon_familles_no_default[0]->id; 
            }
    
            if ($id_rayon == 27) { // cas des téléphone
                $nbre_produit_per_page = $column * 5;
                $produits =
                DB::table('produits')
                ->where('produits.id_rayon', $id_rayon)
                ->where('produits.id_famille', $rayon_cat)
                ->where('produits.deleted', 0)
                ->paginate($nbre_produit_per_page);
    
                $produit_tab = $produits;
    
                foreach($produit_tab as $produit) {
    
                    $caracteristiques = DB::table('rayon_caracteristique_valeurs')
                    ->join('produit_caracteristique_valeurs', 'produit_caracteristique_valeurs.id_caracteristique_valeur', '=', 'rayon_caracteristique_valeurs.valeur_id')
                    ->join('produits', 'produits.id', '=', 'produit_caracteristique_valeurs.id_produit')
                    ->join('rayons', 'rayons.id', '=', 'produits.id_rayon')
                    ->join('caracteristiques', 'caracteristiques.id', '=', 'rayon_caracteristique_valeurs.caracteristique_id')
                    ->join('valeur_caracteristiques', 'valeur_caracteristiques.id', '=', 'produit_caracteristique_valeurs.id_caracteristique_valeur')
                    ->where('produit_caracteristique_valeurs.id_produit', $produit->id)
                    ->where('rayon_caracteristique_valeurs.rayon_id', $produit->id_rayon)
                    ->select('caracteristiques.libelle as lib_caract', 'valeur_caracteristiques.libelle as lib_valeur')
                    ->get();
    
                    $capacite_val = '';
    
                    if (count($caracteristiques) > 0) {
    
                        foreach ($caracteristiques as $c) {
                            if ($c->lib_caract == 'Capacités') {
                                $capacite_val = $c->lib_valeur;
                            }
                        }
    
                        $produit->capacite = $capacite_val;
    
                    }
    
                }
    
            }else if ($id_rayon == 38) { // cas des téléphone
    
            $nbre_produit_per_page = $column * 5;
            $produits =
            DB::table('produits')
            ->where('produits.id_rayon', 38)
            ->where('produits.id_famille', $rayon_cat)
            ->where('produits.deleted', 0)
            ->paginate($nbre_produit_per_page);
    
            $produit_tab = $produits;
    
            }else if ($id_rayon == 9) { // cas des téléphone
    
                $nbre_produit_per_page = $column * 5;
                $produits =
                DB::table('produits')
                ->where('produits.id_rayon', 9)
                ->where('produits.id_famille', $rayon_cat)
                ->where('produits.deleted', 0)
                ->paginate($nbre_produit_per_page);
        
                $produit_tab = $produits;
        
            }else if($id_rayon == 25) {
    
                $nbre_produit_per_page = $column * 3;
                $produits =
                DB::table('produits')
                ->where('id_rayon', $id_rayon)
                ->where('produits.id_famille', $rayon_cat)
                ->where('produits.deleted', 0)
                ->paginate($nbre_produit_per_page);
    
                $produit_tab = $produits;
    
            }else if($id_rayon == 28) {
    
                $nbre_produit_per_page = $column * 3;
                $produits =
                DB::table('produits')
                ->where('id_rayon', $id_rayon)
                ->where('produits.id_famille', $rayon_cat)
                ->where('produits.deleted', 0)
                ->paginate($nbre_produit_per_page);
    
                $produit_tab = $produits;
            }else if ($id_rayon == 26) {
    
                $nbre_produit_per_page = $column * 5;
                $produits =
                DB::table('produits')
                ->where('id_rayon', $id_rayon)
                ->where('produits.id_famille', $rayon_cat)
                ->where('produits.deleted', 0)
                ->paginate($nbre_produit_per_page);
    
                $produit_tab = $produits;
    
            }else if ($id_rayon == 10) {
    
                $nbre_produit_per_page = $column * 5;
                $produits =
                DB::table('produits')
                ->where('id_rayon', $id_rayon)
                ->where('produits.id_famille', $rayon_cat)
                ->where('produits.deleted', 0)
                ->paginate($nbre_produit_per_page);
    
                $produit_tab = $produits;
    
            }else if ($id_rayon == 39) {
    
                $nbre_produit_per_page = $column * 5;
                $produits =
                DB::table('produits')
                ->where('id_rayon', $id_rayon)
                ->where('produits.id_famille', $rayon_cat)
                ->where('produits.deleted', 0)
                ->paginate($nbre_produit_per_page);
    
                $produit_tab = $produits;
    
            }else if ($id_rayon == 8) {
    
                $nbre_produit_per_page = $column * 5;
                $produits =
                DB::table('produits')
                ->where('id_rayon', $id_rayon)
                ->where('produits.id_famille', $rayon_cat)
                ->where('produits.deleted', 0)
                ->paginate($nbre_produit_per_page);
    
                $produit_tab = $produits;
    
            }else if ($id_rayon == 12) {
    
                $nbre_produit_per_page = $column * 5;
                $produits =
                DB::table('produits')
                ->where('id_rayon', $id_rayon)
                ->where('produits.id_famille', $rayon_cat)
                ->where('produits.deleted', 0)
                ->paginate($nbre_produit_per_page);
    
                $produit_tab = $produits;
    
            }
    
            return $produit_tab;
            }

            // get product by screen size
        public function show_produit_by_screen_size_mobile_scroll(Request $request, $id_rayon, $rayon_cat, $column) {

            $produit_tab = [];
            $default_famille = "";
    
            $rayon_familles =  DB::table('familles')
            ->where('rayon_id', $id_rayon)
            ->where('default_categorie', 1)
            ->get();
    
            $rayon_familles_no_default =  DB::table('familles')
            ->where('rayon_id', $id_rayon)
            ->where('default_categorie', 0)
            ->get();
    
            if (count($rayon_familles) > 0) {
                $default_famille = $rayon_familles[0]->id;
            }else{
                $default_famille = $rayon_familles_no_default[0]->id; 
            }
    
            if ($id_rayon == 27) { // cas des téléphone
                $nbre_produit_per_page = $column * 5;
                $produits =
                DB::table('produits')
                ->where('produits.id_rayon', $id_rayon)
                ->where('produits.id_famille', $rayon_cat)
                ->where('produits.deleted', 0)
                ->skip($request->skip)
                ->take(20)
                ->get();
                // ->paginate($nbre_produit_per_page);
    
                $produit_tab = $produits;
    
                foreach($produit_tab as $produit) {
    
                    $caracteristiques = DB::table('rayon_caracteristique_valeurs')
                    ->join('produit_caracteristique_valeurs', 'produit_caracteristique_valeurs.id_caracteristique_valeur', '=', 'rayon_caracteristique_valeurs.valeur_id')
                    ->join('produits', 'produits.id', '=', 'produit_caracteristique_valeurs.id_produit')
                    ->join('rayons', 'rayons.id', '=', 'produits.id_rayon')
                    ->join('caracteristiques', 'caracteristiques.id', '=', 'rayon_caracteristique_valeurs.caracteristique_id')
                    ->join('valeur_caracteristiques', 'valeur_caracteristiques.id', '=', 'produit_caracteristique_valeurs.id_caracteristique_valeur')
                    ->where('produit_caracteristique_valeurs.id_produit', $produit->id)
                    ->where('rayon_caracteristique_valeurs.rayon_id', $produit->id_rayon)
                    ->select('caracteristiques.libelle as lib_caract', 'valeur_caracteristiques.libelle as lib_valeur')
                    ->get();
    
                    $capacite_val = '';
    
                    if (count($caracteristiques) > 0) {
    
                        foreach ($caracteristiques as $c) {
                            if ($c->lib_caract == 'Capacités') {
                                $capacite_val = $c->lib_valeur;
                            }
                        }
    
                        $produit->capacite = $capacite_val;
    
                    }
    
                }
    
            }else if ($id_rayon == 38) { // cas des téléphone
    
            $nbre_produit_per_page = $column * 5;
            $produits =
            DB::table('produits')
            ->where('produits.id_rayon', 38)
            ->where('produits.id_famille', $rayon_cat)
            ->where('produits.deleted', 0)
            ->skip($request->skip)
            ->take(20)
            ->get();
            // ->paginate($nbre_produit_per_page);
    
            $produit_tab = $produits;
    
            }else if ($id_rayon == 9) { // cas des téléphone
    
                $nbre_produit_per_page = $column * 5;
                $produits =
                DB::table('produits')
                ->where('produits.id_rayon', 9)
                ->where('produits.id_famille', $rayon_cat)
                ->where('produits.deleted', 0)
                ->paginate($nbre_produit_per_page);
        
                $produit_tab = $produits;
        
            }else if($id_rayon == 25) {
    
                $nbre_produit_per_page = $column * 3;
                $produits =
                DB::table('produits')
                ->where('id_rayon', $id_rayon)
                ->where('produits.id_famille', $rayon_cat)
                ->where('produits.deleted', 0)
                ->skip($request->skip)
                ->take(9)
                ->get();
    
                $produit_tab = $produits;
    
            }else if($id_rayon == 28) {
    
                $nbre_produit_per_page = $column * 3;
                $produits =
                DB::table('produits')
                ->where('id_rayon', $id_rayon)
                ->where('produits.id_famille', $rayon_cat)
                ->where('produits.deleted', 0)
                ->skip($request->skip)
                ->take(9)
                ->get();
                // ->paginate($nbre_produit_per_page);
    
                $produit_tab = $produits;
            }else if ($id_rayon == 26) {
    
                $nbre_produit_per_page = $column * 5;
                $produits =
                DB::table('produits')
                ->where('id_rayon', $id_rayon)
                ->where('produits.id_famille', $rayon_cat)
                ->where('produits.deleted', 0)
                ->skip($request->skip)
                ->take(20)
                ->get();
                // ->paginate($nbre_produit_per_page);
    
                $produit_tab = $produits;
    
            }else if ($id_rayon == 10) {
    
                $nbre_produit_per_page = $column * 5;
                $produits =
                DB::table('produits')
                ->where('id_rayon', $id_rayon)
                ->where('produits.id_famille', $rayon_cat)
                ->where('produits.deleted', 0)
                ->paginate($nbre_produit_per_page);
    
                $produit_tab = $produits;
    
            }else if ($id_rayon == 39) {
    
                $nbre_produit_per_page = $column * 5;
                $produits =
                DB::table('produits')
                ->where('id_rayon', $id_rayon)
                ->where('produits.id_famille', $rayon_cat)
                ->where('produits.deleted', 0)
                ->skip($request->skip)
                ->take(20)
                ->get();
                // ->paginate($nbre_produit_per_page);
    
                $produit_tab = $produits;
    
            }else if ($id_rayon == 8) {
    
                $nbre_produit_per_page = $column * 5;
                $produits =
                DB::table('produits')
                ->where('id_rayon', $id_rayon)
                ->where('produits.id_famille', $rayon_cat)
                ->where('produits.deleted', 0)
                ->paginate($nbre_produit_per_page);
    
                $produit_tab = $produits;
    
            }else if ($id_rayon == 12) {
    
                $nbre_produit_per_page = $column * 5;
                $produits =
                DB::table('produits')
                ->where('id_rayon', $id_rayon)
                ->where('produits.id_famille', $rayon_cat)
                ->where('produits.deleted', 0)
                ->paginate($nbre_produit_per_page);
    
                $produit_tab = $produits;
    
            }
    
            return $produit_tab;
            }

}
