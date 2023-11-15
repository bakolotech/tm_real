<?php

namespace App\Http\Controllers;

use App\Models\MesFavoris;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\CategorieFavoris;
use Illuminate\Support\Facades\DB;

class MesFavorisController extends Controller
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
     * @param  \App\Models\MesFavoris  $mesFavoris
     * @return \Illuminate\Http\Response
     */
    public function show(MesFavoris $mesFavoris)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\MesFavoris  $mesFavoris
     * @return \Illuminate\Http\Response
     */
    public function edit(MesFavoris $mesFavoris)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\MesFavoris  $mesFavoris
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, MesFavoris $mesFavoris)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\MesFavoris  $mesFavoris
     * @return \Illuminate\Http\Response
     */
    public function destroy(MesFavoris $mesFavoris)
    {
        //
    }

    public function ajoutCategori(Request $request) {

        if (Auth::check()) {

            $categorieFavoris = CategorieFavoris::create([
                'libelle' => $request->libelle,
                'id_user' => Auth::user()->id
            ]);

            return $categorieFavoris;

        }

    }

    public function getUserFavoris(){
        $mesfavoris = MesFavoris::where('id_user', Auth::user()->id)->get();
        if (count($mesfavoris) > 0) {

            if (!isset($_SESSION['favori'])) {
                $_SESSION['favori'] = [];
            }


            foreach ($mesfavoris as $fav) {

                $data = [
                    'favori_id' =>  $fav->id_produit,
                    'statut' => 1,
                ];

                array_push($_SESSION['favori'], $data);

            }

        }

        return $mesfavoris;
    }

    public function getUserFavorisCategoris() {
        $user_categorie_favoris = CategorieFavoris::where('id_user', Auth::user()->id)->orWhere('id', 1)
        ->get();
        if (count($user_categorie_favoris) > 0) {
            foreach ($user_categorie_favoris as $cat) {
                $mesfavoris = MesFavoris::where('id_categorie', $cat->id)->get();
                $cat->favoris = $mesfavoris;
            }
        }
        return $user_categorie_favoris;
    }

    // check fovoris existence
    public function checkFavorisExistence(Request $request) {

        $mesfavoris = MesFavoris::select('*')
                    ->where('id_user', Auth::user()->id)
                    ->where('id_produit', $request->product_id)->get();

        return $mesfavoris;

    }

    public function deleteFavoris(Request $request) {
        $delete = DB::table('mes_favoris')
        ->where('id_produit', $request->favori_id)
        ->where('id_user', Auth::user()->id)
        ->delete();
        return $delete;
    }
}
