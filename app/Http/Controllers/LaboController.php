<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use App\User;

class LaboController extends Controller
{
    //

    public function getallCommandes(Request $request) {

        $nom_commandes_marchand
        = DB::table('recap_commandes')
        // ->join('carnet_adresses', 'carnet_adresses.id', 'recap_commandes.id_addresse_livraison')
        ->join('users', 'users.id', '=', 'recap_commandes.user_id')
        ->select('recap_commandes.ref_commande', 
            'recap_commandes.id',
            'recap_commandes.id', 'recap_commandes.nombre_article',
            'recap_commandes.totaf_facturation', 
            'recap_commandes.date_commande',
            'recap_commandes.mode_payement',
            'recap_commandes.created_at',
            'recap_commandes.status_commande',
            'recap_commandes.status_payement',
            'users.email', 'users.nom', 'users.prenom',
            // 'carnet_adresses.adresse',
        )
        ->where('recap_commandes.status_payement', 200)
        ->get();
    
        foreach ($nom_commandes_marchand as $value) {

        $commande_produits
        = DB::table('commande_produits')
            ->join('produits', 'produits.id', '=', 'commande_produits.id_produit')
            ->join('boutiques', 'boutiques.id', 'produits.boutique_id')
            ->join('marchands', 'marchands.id', 'boutiques.id_marchand')
            ->join('recap_commandes', 'recap_commandes.id', '=', 'commande_produits.order_id')
            ->select(
                'produits.ref_produit', 
                'produits.image', 
                'produits.libelle', 
                'produits.prix', 
                'commande_produits.quantite',
                'marchands.nom as nom_marchand',
                'marchands.prenom as nom_prenom_marchand',
                'boutiques.libelle as nom_boutique',
            )
            ->where('commande_produits.order_id', $value->id)
            ->get();

        $value->commande_produit = $commande_produits;

        $currentDateTime = Carbon::now();

        $otherDateTime = Carbon::parse($value->created_at);

        $diff = $currentDateTime->diff($otherDateTime)->format('%h h : %i min');

        $value->duree = $diff;

        }
     
            // return $nom_commandes_marchand;
    
            return view('front.labo.main-view', ['data' => $nom_commandes_marchand]);
            // return 'gretting';
        }

}
