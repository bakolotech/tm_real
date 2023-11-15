<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ProductGuess;
use App\Models\HistoriqueRecherche;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class ProductGuessController extends Controller
{
    //
    public function laisserNousDeviner(Request $request) {

        global $produit;
        global $connected;

        if (Auth::check()) {

            $connected = true;
            $check_historique =
            HistoriqueRecherche::where('id_produit', $request->id_produit)
            ->get();

            if (count($check_historique) > 0) {
                $check_historique[0]->date_recherche = Carbon::now();
                $check_historique[0]->save();
            }else {

                $historique_recherche = [
                    'id_produit' => $request->id_produit,
                    'id_user' => Auth::id(),
                    'date_recherche' => Carbon::now()
                ];

                $historique_save = HistoriqueRecherche::create($historique_recherche);

            }

            // return 'A user is connected';
        }else {
            $connected = false;
        }

        $deviner = ProductGuess::where('id_produit', $request->id_produit)->get();

        if (count($deviner) > 0) {

            $nouveaux_counter = $deviner[0]->counter;
            $nouveaux_counter += 1;
            $deviner[0]->counter = $nouveaux_counter;
            $deviner[0]->save();

            $statut = 'updated';
            $produit_deviner = DB::table('product_guesses')
            ->join('produits', 'produits.id', '=', 'product_guesses.id_produit')
            ->select('*')
            ->orderBy('counter', 'DESC')
            ->where('product_guesses.id_produit', $deviner[0]->id_produit)
            ->get();

            $produit = $produit_deviner[0];

        }else {

            $produit1 = ProductGuess::create([
                'id_produit' => $request->id_produit,
                'counter' => 1
            ]);

            $produit_deviner = DB::table('product_guesses')
            ->join('produits', 'produits.id', '=', 'product_guesses.id_produit')
            ->select('*')
            ->orderBy('counter', 'DESC')
            ->where('product_guesses.id_produit', $produit1->id_produit)
            ->get();

            $produit = $produit_deviner[0];

            $statut = 'created';

        }

        return response()->json([
            'status' => $statut,
            'produit' => $produit,
            'connected' => $connected
        ]);

    }

    public function getDevinerProduct(Request $request) {

        $produit_deviner =
        DB::table('product_guesses')
        ->join('produits', 'produits.id', '=', 'product_guesses.id_produit')
        ->join('rayons', 'rayons.id', '=', 'produits.id_rayon')
        ->select('produits.*', 'rayons.slug')
        ->orderBy('counter', 'DESC')
        ->get();

        if (Auth::check()) {

            $historique_user = HistoriqueRecherche::where('id_user', Auth::user()->id)->get();

            $historique_user1 =
            DB::table('historique_recherches')
            ->join('produits', 'produits.id', '=', 'historique_recherches.id_produit')
            ->where('historique_recherches.id_user', Auth::user()->id)
            ->get();

            return response()->json([
                'deviner' => $produit_deviner,
                'historique' => $historique_user1
            ]);

        }else {
            return response()->json([
                'deviner' => $produit_deviner,
                'historique' => []
            ]);
        }

    }

    public function deleteUserHistoryProduct(Request $request) {
        $delete = HistoriqueRecherche::where('id_produit', $request->id_produit)
                ->where('id_user', Auth::user()->id)->delete();
        return $delete;
    }

}
