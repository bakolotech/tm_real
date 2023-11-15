<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Produit;
use Illuminate\Support\Facades\DB;

class Boutique extends Controller
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
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
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

    function getArticlesAssocier($id) {

        $article_associe =
        DB::table('rayons')
        ->join('rayon_article_associers', 'rayon_article_associers.rayon_article_associer', '=', 'rayons.id')
        ->select('rayons.*')
        ->where('rayon_article_associers.id_rayon', $id)
        ->get();

        return $article_associe;

    }

    function produit_caracteristique($id_rayon, $id_produit) {
        $caracteristiques = DB::table('rayon_caracteristique_valeurs')
        ->join('produit_caracteristique_valeurs', 'produit_caracteristique_valeurs.id_caracteristique_valeur', '=', 'rayon_caracteristique_valeurs.valeur_id')
        ->join('produits', 'produits.id', '=', 'produit_caracteristique_valeurs.id_produit')
        ->join('rayons', 'rayons.id', '=', 'produits.id_rayon')
        ->join('caracteristiques', 'caracteristiques.id', '=', 'rayon_caracteristique_valeurs.caracteristique_id')
        ->join('valeur_caracteristiques', 'valeur_caracteristiques.id', '=', 'produit_caracteristique_valeurs.id_caracteristique_valeur')
        ->where('produit_caracteristique_valeurs.id_produit', $id_produit)
        ->where('rayon_caracteristique_valeurs.rayon_id', $id_rayon)
        ->select('caracteristiques.libelle as lib_caract', 'valeur_caracteristiques.libelle as lib_valeur')
        ->get();

        $Caracteristique_supp =
        DB::table('produit_caracteristiques')
        ->join('produits', 'produits.id', '=', 'produit_caracteristiques.produit_id')
        ->join('boutique_produit_car_valeurs', 'boutique_produit_car_valeurs.id', '=', 'produit_caracteristiques.valeur')
        ->join('boutique_produit_caracteristiques', 'boutique_produit_caracteristiques.id', '=', 'boutique_produit_car_valeurs.idBoutiqueCarValeur')
        ->where('produit_caracteristiques.produit_id',  $id_produit)
        ->select('boutique_produit_caracteristiques.libelle as lib_caract', 'boutique_produit_car_valeurs.valeur as lib_valeur')->get();

        $c = $caracteristiques->merge($Caracteristique_supp);

        return $c->all();

    }


    public function screenShot() {

        $image_name = uniqid();

        $crop_destination = 'social_share/';

        $image_parts = explode(";base64,", request()->image_screen_shot);
        $image_type_aux = explode("image/", $image_parts[0]);

        $image_type = $image_type_aux[1];

        $image_base64 = base64_decode($image_parts[1]);

        $imageFullPath = $crop_destination . $image_name;

        file_put_contents($imageFullPath, $image_base64);

         return $imageFullPath;

    }

  public function render_facebook_template(Request $request) {

    $current_produit = Produit::where('id', $request->id_produit)->get();  // get produit by id

    $produit_attributs
    = DB::table('produits')
    ->join('rayons', 'rayons.id', '=', 'produits.id_rayon')
    ->select('produits.id as id_produit', 'produits.libelle as libelle_produits', 'rayons.id as rayon_id', 'rayons.slug as rayon_slug')
    ->where('produits.id', $request->id_produit)
    ->get();

    $images = [];

        // $imageData = file_get_contents($request->video_preview);

        $fileName = 'default.jpg';

        $path = 'social_share/video_img_preview/' . $fileName;

        // file_put_contents($path, $imageData);

        if(count($current_produit) > 0) {

        $Image_supp =
        DB::table('produit_images')
            ->where('produit_id',  $current_produit[0]->id)
            ->select('produit_images.image')
            ->get();

            if (count($Image_supp) > 0) {
            
            foreach ($Image_supp as $image) {
                $images[] = $image->image;
            }
        }

        if (count($images) > 3) {
            $images = array_slice($images, 0, 3);
        }

        $caracteristiques = $this->produit_caracteristique($current_produit[0]->id_rayon, $current_produit[0]->id);

        $article_associes = $this->getArticlesAssocier($current_produit[0]->id_rayon);

        $preview_image = $request->image_to_share;

        if ($preview_image == "") {
            $preview_image = $current_produit[0]->image;
        }

        $template_data = [
            'view_image' => $preview_image,
            'libelle' => $current_produit[0]->libelle,
            'reference' => $current_produit[0]->ref_produit,
            'prix' => $current_produit[0]->prix,
            'image_principal' => $current_produit[0]->image,
            'produit_image' => $images,
            'caracteristiques' => $caracteristiques,
            'article_associes' => $article_associes,
            'video_url' => 'defaut.jpg'
        ];

        $fb_template = view('front.new_view.new_template', $template_data)->render();

        return response()->json(['fb_template' => $fb_template, 'produit_meta_data' => $produit_attributs]);

        }


    }

}
