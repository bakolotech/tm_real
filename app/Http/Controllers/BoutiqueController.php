<?php

namespace App\Http\Controllers;

use App\Models\Boutique;
use App\Models\Produit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\URL;
use App\User;

class BoutiqueController extends Controller
{
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
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Boutique  $boutique
     * @return \Illuminate\Http\Response
     */
    public function show(Boutique $boutique)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Boutique  $boutique
     * @return \Illuminate\Http\Response
     */
    public function edit(Boutique $boutique)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Boutique  $boutique
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Boutique $boutique)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Boutique  $boutique
     * @return \Illuminate\Http\Response
     */
    public function destroy(Boutique $boutique)
    {
        //
    }

    public function checkboutiqueName(Request $request) {
        $query = DB::table('boutiques')->where('libelle', $request->nom_boutique)->get();
        if (count($query) > 0) {
            return $query[0]->libelle;
        }
    }

    public function updateProfil(Request $request) {

        $image_name = uniqid();

        $crop_destination = 'uploads/';

        $image_parts = explode(";base64,", request()->image);
        $image_type_aux = explode("image/", $image_parts[0]);

        $image_type = $image_type_aux[1];

        $image_base64 = base64_decode($image_parts[1]);

        $imageFullPath = $crop_destination . $image_name;

        file_put_contents($imageFullPath, $image_base64);
         $boutique = Boutique::where('id', $_SESSION['boutique_marchand_id'])->get();
        $boutique_1 = $boutique[0];

         $boutique_1->image = $imageFullPath;
         $boutique_1->save();

         $_SESSION['boutique_profil_mage'] = $imageFullPath;

         return $imageFullPath;

    }

    public function shareByWhatApp(Request $request) {

        $token = str_shuffle("gzak!SMUCnJmcN?xndhdklzejsnxn214djwxgdkngsgs");

        $url = route('boutique', ['boutique' => $_SESSION['boutique_marchand_id'], 'rayon' => $request->rayon_active]);

        // $url = URL::temporarySignedRoute(
        //     'boutique', now()->addMinutes(1440), [
        //         'boutique' => $_SESSION['boutique_marchand_id'],
        //         'token' => $token,
        //         'boutique_shared' => "ok",
        //     ]
        // );

        return $url;
        // return redirect('https://www.facebook.com/sharer/sharer.php?u=https://toulemarket.com');
        // http://127.0.0.1:8000/boutique_personnel/144?boutique_shared=ok&expires=1677258339&token=ssUgnxg1x%3FzNnjdng2cS4nawxeCdkkknhd%21JmsjzldgM&signature=7905d4edb041b265a37e7e050e28a6b9fcbed320a881b4d9acfe1b6906ac9584
    }

public function produitVisitors($boutique, $rayon) {

    $default_rayon = [];

    $rayon_active = DB::table('boutique_rayons')
    ->join('rayons', 'rayons.id', '=', 'boutique_rayons.rayon_id')
    ->select('rayons.*')
    ->where('boutique_rayons.boutique_id', '=', $boutique)
    ->where('boutique_rayons.rayon_id', $rayon)
    ->get();

    $default_rayon = $rayon_active[0];

    $produit_rayons = DB::table('produits')
    ->join('images_etageres', 'produits.image_etagere', '=', 'images_etageres.id')
    ->where('boutique_id', $boutique)
    ->where('id_rayon', $default_rayon->id)
    ->where('deleted', 0)
    ->select('produits.*', 'images_etageres.path')
    ->get();

    foreach($produit_rayons as $produit) {

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

    // dd($default_rayon);

    return view('front.app-module.marchand.boutique-partager.boutique_partager', ['produitsPartager' => $produit_rayons, 'default_rayon' => $default_rayon, 'boutique' => $boutique, 'rayon' => $rayon]);

    }

    public function userInRayon(Request $request) {
        // return $id_produit;
        $image_profil = User::where('id', $request->id)->get();
        // return $image_profil[0]->image;

        $image_produit = Produit::where('id', $request->id_produit)->get();
        $image_principal = $image_produit[0]->image;

        if (count($image_profil) > 0) {
            $response_table = ['use-image' => $image_profil[0]->image, 'produit_image' => $image_principal];
        }else{
            $response_table = ['use-image' => 'default-user-image.png', 'produit_image' => $image_principal];
        }


        return $response_table;

    }

    // Liste des produits partager
    public function show_produit_partager($id_boutique, $id_rayon, $rayon_cat, $column) {

        if($id_rayon == 25) {
            $nbre_produit_per_page = $column * 3;

            $produits =
            DB::table('produits')
            ->join('familles', 'familles.id', '=', 'produits.id_famille')
            ->select('produits.*')
            ->where('id_rayon', $id_rayon)
            ->where('boutique_id', $id_boutique)
            ->where('produits.deleted', 0)
            ->orderBy('familles.default_categorie', 'DESC')
            ->orderBy('familles.id')
            ->paginate($nbre_produit_per_page);

            return response()->json(['boutique_data' => $produits]);
        }else if($id_rayon == 27) {

            $nbre_produit_per_page = $column * 5;

            $produits =
            DB::table('produits')
            ->join('familles', 'familles.id', '=', 'produits.id_famille')
            ->select('produits.*')
            ->where('id_rayon', $id_rayon)
            ->where('boutique_id', $id_boutique)
            ->where('produits.deleted', 0)
            ->orderBy('familles.default_categorie', 'DESC')
            ->orderBy('familles.id')
            ->paginate($nbre_produit_per_page);

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

            return response()->json(['boutique_data' => $produits]);
        }else {
            $nbre_produit_per_page = $column * 5;

            $produits =
            DB::table('produits')
            ->join('familles', 'familles.id', '=', 'produits.id_famille')
            ->select('produits.*')
            ->where('id_rayon', $id_rayon)
            ->where('boutique_id', $id_boutique)
            ->where('produits.deleted', 0)
            ->orderBy('familles.default_categorie', 'DESC')
            ->orderBy('familles.id')
            ->paginate($nbre_produit_per_page);

            return response()->json(['boutique_data' => $produits]);
        }
        
     }

     public function rechercheBoutique(Request $request, $univer_id = null) {
        
        $tableau_des_mots = explode(' ', $request['value']);
        // $produits = [];
        try {
            $produits_instantce = Produit::with(
                [
                    'produitImages' => function($query){
                        return $query->where([['locked', 0], ['deleted', 0]]);
                    },

                    'sousCategorie' => function($query) use ($request, $univer_id){
                        return $query->with(
                            [
                                'famille' => function($query) use ($request, $univer_id){
                                    return $query->with(
                                        [
                                            'rayon' => function($query) use ($request, $univer_id){
                                                return $query->with(
                                                    [
                                                        'univer'
                                                    ]
                                                )->where(function ($query) use ($univer_id){
                                                    if (!is_null($univer_id)) {
                                                        return $query->where('univer_id', self::security($univer_id));
                                                    }
                                                    else{
                                                        return $query->whereNotNull('univer_id');
                                                    }
                                                });
                                            }
                                        ]
                                    );
                                }
                            ]
                        );
                    }

                ]
            )->where('libelle', 'LIKE', '%'. htmlspecialchars($request['value']) .'%')
            ->where('boutique_id', $request->boutique_id)
            ->where('deleted', 0);

            if (($produits_instantce->count() > 0) && ($produits_instantce->count() > $request->skip_value)) {
                $produits = $produits_instantce->skip($request->skip_value)->take(10)->get();

                $data = [
                    'resultats' => $produits,
                    'requete' => $request->all(),
                    'univer_id' => $univer_id,
                    'in_rayon' => 0,
                    'error' => 0
                ];

                return response()->json([$data]);

            }else if($produits_instantce->count() == 0 && count($tableau_des_mots) > 0) {
                $produits = Produit::with(
                [
                    'produitImages' => function($query){
                        return $query->where([['locked', 0], ['deleted', 0]]);
                    },

                    'sousCategorie' => function($query) use ($request, $univer_id){
                        return $query->with(
                            [
                                'famille' => function($query) use ($request, $univer_id){
                                    return $query->with(
                                        [
                                            'rayon' => function($query) use ($request, $univer_id){
                                                return $query->with(
                                                    [
                                                        'univer'
                                                    ]
                                                )->where(function ($query) use ($univer_id){
                                                    if (!is_null($univer_id)) {
                                                        return $query->where('univer_id', self::security($univer_id));
                                                    }
                                                    else{
                                                        return $query->whereNotNull('univer_id');
                                                    }
                                                });
                                            }
                                        ]
                                    );
                                }
                            ]
                        );
                    }

                ]
            )->where(function ($query) use ($tableau_des_mots) {
                foreach ($tableau_des_mots as $term) {
                    $query->where('libelle', 'LIKE', '%' . $term . '%');
                }
            })
            ->where('boutique_id', $request->boutique_id)
            ->where('deleted', 0)
            ->get();

            $data = [
                'resultats' => $produits,
                'requete' => $request->all(),
                'univer_id' => $univer_id,
                'in_rayon' => 0,
                'error' => 0
            ];

            return response()->json([$data]);
            }else {
                $data = [
                    'resultats' => [],
                    'requete' => $request->all(),
                    'univer_id' => $univer_id,
                    'in_rayon' => 0,
                    'error' => 0
                ];

                return response()->json([$data]);
            }


        }
        catch (\Exception $exception){
            $data = [
                'resultats' => [],
                'error' => 1
            ];
            return response()->json([$data]);
        }
     }

}
