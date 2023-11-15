<?php

namespace App\Http\Controllers;

use App\Models\CarnetAdresse;
use App\Models\Commande;
use App\Models\Produit;
use App\Models\CommandeProduit;
use CreateCommandeProduitsTable;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use App\Models\RecapCommande;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class CommandeController extends Controller
{
    public function create()
    {
        // $mytime = Carbon::now();
        $command_object = [
            'client_id' => Auth::user()->id,
            'date_commande' =>'2022-10-12 18:10:10',
            'date_expedition' => '2022-10-12 18:10:10',
            'status' => 1,
            'commentaire' => 'Hello',
        ];

        $commande = Commande::create($command_object);
        $produits = Produit::find([64, 65, 66]);
        // dd($produit);
        foreach ($produits as $produit)
        {
            $commande->produits()->attach([$produit->id => ['quantite' => $produit->quantite]]);
        }
        //$commande->produits()->attach($produits);

        return response()->json([
            'status'=>200,
        ]);

        //$produits = Commande::find(1)->produits; (retrieve the products through the Commande model)
    }


    public function getStatusCommande(Request $request)
{
    //
}

    public function ajoutCommant(Request $request)
    {

        $data_product = $_SESSION['panier'];
        $data_expedition = $_SESSION['commande_expedition'];
        $data_adresse_livraison = $_SESSION['user_adresse_achat'];
        $data_payement = $_SESSION['commande_payement_infos'];
        $data_resume = [$data_product, $data_expedition, $data_adresse_livraison, $data_payement];
        $total_final = 0;

        for ($i=0; $i < count($_SESSION['panier']); $i++) {
            $total_final += $_SESSION['panier'][$i]['prix_total'];
        }

        $length = 10;

        // $alphabet = "123456789azertyAZERTYUIOPQSDFuiopqsdfghjklmwxcvbnGHJKLMWXCVBN0";
        $alphabet = "123456789AZERTYUIOPQSDFGHJKLMWXCVBN0";
        $id_commande =  substr(str_shuffle(str_shuffle(str_repeat($alphabet, $length))), 0, $length);
        $date_commande = date('d/m/Y');

        $order1 = [
            'user_id' => Auth::user()->id,
            'id_addresse_livraison' => $data_adresse_livraison['id'],
            'id_adresse_facturation' => $data_payement->id,
            'escompte_facturation' => 0,
            'escompte_code_facturation' => 0,
            'facturation_sous_total' => $total_final,
            'facturation_taxe' => 0,
            'totaf_facturation' => $total_final,
            'id_commande' => $id_commande,
            'date_commande' => $date_commande,
        ];

        $order = RecapCommande::create($order1);

        // return $order;
        return $order1;
    }

    public function prepareMobileForm(Request $request) {

        $data_product = $_SESSION['panier'];
        $data_expedition = $_SESSION['commande_expedition'];
        $data_adresse_livraison = $_SESSION['user_adresse_achat'];
        $data_payement = 'Moov';
        $data_resume = [$data_product, $data_expedition, $data_adresse_livraison];
        $total_final = 0;

        for ($i=0; $i < count($_SESSION['panier']); $i++) {
            $total_final += $_SESSION['panier'][$i]['prix_total'];
        }

        $length = 10;

        // $alphabet = "123456789azertyAZERTYUIOPQSDFuiopqsdfghjklmwxcvbnGHJKLMWXCVBN0";
        $alphabet = "123456789AZERTYUIOPQSDFGHJKLMWXCVBN0";
        $id_commande =  substr(str_shuffle(str_shuffle(str_repeat($alphabet, $length))), 0, $length);
        $date_commande = date('d/m/Y');

        $order1 = [
            'user_id' => Auth::user()->id,
            'id_addresse_livraison' => $data_adresse_livraison['id'],
            'id_adresse_facturation' => 1,
            'escompte_facturation' => 0,
            'escompte_code_facturation' => 0,
            'facturation_sous_total' => $total_final,
            'facturation_taxe' => 0,
            'totaf_facturation' => $total_final,
            'id_commande' => $id_commande,
            'date_commande' => $date_commande,
        ];


        // return $order;
        return $order1;
    }

    public function retour_pvit(Request $request) {
        return redirect('/');
    }

    public function payerAvecMoovMoney(Request $request)
    {
        // Action & Post
        $ACTION_URL = 'https://mypvit.com/pvit-secure-full-api.kk';
        $METHOD = 'POST';

        // Les donnees a envoye a PVIT
        $data = array(
            'tel_marchand' => '062341392',
            'montant' =>  '150', //$montant[0],
            'ref' => 'IJJDKJDhh',
            'tel_client' => '062955997',
            'token' => 'eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.cTBwakpwWDNhUEowaEFibkhZU3haUzJmUU0yeE9CcklLQ3JBT0RXSmNUZXdNZUxtNTNoaFY2MFU0SDFtb1d4RW5pdE84VmlSVWFzY2pQZkFxdVg4bUJzWTBETkVjNFVpZUZBOWRXZDlGdGI2M3R5VjluemMrdUQzV1gvVWEzS2RoZFh4b0xNeFg5R2FxbE55aHhhUm9VYmpULzNUcUs4b3dzSnNQMUpGMmhZZW5ya0ViSWxYdk05VVRqREQycEtFOjpEKzJId2N6aStjTlVNTnVnMmVCUHp3PT0=.UwxmZr0gmCIbnJsFkeVtvtJq67M56xqLmr+MZLlq4M4=',
            'action' => '1',
            'service' => 'REST',
            'operateur' => 'MC',
            'redirect' => '/retour_pvit'
        );

        // dd($data);

        // Creation d'une ressource Curl
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_URL, $ACTION_URL);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

        // Appelle du serverice et recuperation du resultat
        $resultat = curl_exec($ch);
        // dd($resultat);
    }

    public function payerAvecAirtelMoney() {
         // Action & Post
         $ACTION_URL = 'https://mypvit.com/pvit-secure-full-api.kk';
         $METHOD = 'POST';

         // Les donnees a envoye a PVIT
         $data = array(
             'tel_marchand' => '076513886',
             'montant' =>  '100', //$montant[0],
             'ref' => 'DFHGBV93',
             'tel_client' => '074846163',
             'token' => 'eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.cTBwakpwWDNhUEowaEFibkhZU3haUzJmUU0yeE9CcklLQ3JBT0RXSmNUZXdNZUxtNTNoaFY2MFU0SDFtb1d4RW5pdE84VmlSVWFzY2pQZkFxdVg4bUJzWTBETkVjNFVpZUZBOWRXZDlGdGI2M3R5VjluemMrdUQzV1gvVWEzS2RoZFh4b0xNeFg5R2FxbE55aHhhUm9VYmpULzNUcUs4b3dzSnNQMUpGMmhZZW5ya0ViSWxYdk05VVRqREQycEtFOjpEKzJId2N6aStjTlVNTnVnMmVCUHp3PT0=.UwxmZr0gmCIbnJsFkeVtvtJq67M56xqLmr+MZLlq4M4=',
             'action' => '1',
             'service' => 'REST',
             'operateur' => 'AM',
             'redirect' => ''
         );

         // dd($data);

         // Creation d'une ressource Curl
         $ch = curl_init();
         curl_setopt($ch, CURLOPT_POST, 1);
         curl_setopt($ch, CURLOPT_URL, $ACTION_URL);
         curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
         curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

         // Appelle du serverice et recuperation du resultat
         $resultat = curl_exec($ch);
         // dd($resultat);
    }

    public function payWithMobileServices(Request $request)
    {
        global $data_payement;
        global $mode_payement;

        $data_product = $_SESSION['panier']; // infos des produits dans le panier
        $data_expedition = $_SESSION['commande_expedition']; // infos de l'expédition
        $data_adresse_livraison = $_SESSION['user_adresse_achat']; // infos de l'addresse de livraison
        $montant_expedition = $_SESSION['expedition'];

        if (isset($_SESSION['commande_payement_infos'])) {
            $data_payement = $_SESSION['commande_payement_infos']; // infos de moyens de paiement
        }else {
            $data_payement = [];
        }

        $data_resume = [$data_product, $data_expedition, $data_adresse_livraison, $data_payement];

        // return $data_resume;
        $sous_total = 0;
        $total_final = 0;
        $quantite = 0;

        for ($i=0; $i < count($_SESSION['panier']); $i++) {
            $sous_total += $_SESSION['panier'][$i]['prix_total'] * $_SESSION['panier'][$i]['quantite'];
            $quantite += $_SESSION['panier'][$i]['quantite'];
        }

        if (!isset($_SESSION['commande_client'])) {
            $_SESSION['commande_client'] = 0;
        }

        $_SESSION['commande_client'] += 1;

        if ($sous_total > 20000) {
            $montant_expedition = 0;
        }

        $total_final = $sous_total + $montant_expedition;


        // Action & Post
        global $tel_marchant;

        if ($request->type_service == "AM") {
            $tel_marchant = '076513886';
            $mode_payement = 'AirtelMoney';
        }else if ($request->type_service == "MC") {
            $tel_marchant = '062341392';
            $mode_payement = 'MoovMoney';
        }

        $alphabet = "123456789azertyAZERTYUIOPQSDFuiopqsdfghjklmwxcvbnGHJKLMWXCVBN0";
        $length = 10;
        $ref_commande =  substr(str_shuffle(str_shuffle(str_repeat($alphabet, $length))), 0, $length);
        $date_commande = date('d-m-Y');

        $order1 = [
            'user_id' => Auth::user()->id,
            'id_addresse_livraison' => $data_adresse_livraison['id'],
            'id_adresse_facturation' => $request->num_tel,
            'escompte_facturation' => 0,
            'escompte_code_facturation' => 0,
            'facturation_sous_total' => $sous_total,
            'facturation_taxe' => 0,
            'totaf_facturation' => $total_final,
            'ref_commande' => $ref_commande,
            'date_commande' => $date_commande,
            'mode_payement' => $mode_payement,
            'facture_montant_expedition' => $montant_expedition,
            'nombre_article' => count($_SESSION['panier'])
        ];

        $order = RecapCommande::create($order1);

        for($i = 0, $size = count($_SESSION['panier']); $i < $size; ++$i) {
            $po = [
                'id_produit' => $_SESSION['panier'][$i]['id_produit'],
                'order_id' => $order->id,
                'quantite' => $_SESSION['panier'][$i]['quantite']
            ];

            CommandeProduit::create($po);

        }

        $date_livraison = date('d-m-Y');

        $ACTION_URL = 'https://mypvit.com/pvit-secure-full-api.kk';
        $METHOD = 'POST';

        // Les donnees a envoye a PVIT
        $data = array(
            'tel_marchand' => $tel_marchant,
            'montant' =>   $total_final, //$montant[0],
            'ref' => $ref_commande,
            'tel_client' => $request->num_tel,
            'token' => 'eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.cTBwakpwWDNhUEowaEFibkhZU3haUzJmUU0yeE9CcklLQ3JBT0RXSmNUZXdNZUxtNTNoaFY2MFU0SDFtb1d4RW5pdE84VmlSVWFzY2pQZkFxdVg4bUJzWTBETkVjNFVpZUZBOWRXZDlGdGI2M3R5VjluemMrdUQzV1gvVWEzS2RoZFh4b0xNeFg5R2FxbE55aHhhUm9VYmpULzNUcUs4b3dzSnNQMUpGMmhZZW5ya0ViSWxYdk05VVRqREQycEtFOjpEKzJId2N6aStjTlVNTnVnMmVCUHp3PT0=.UwxmZr0gmCIbnJsFkeVtvtJq67M56xqLmr+MZLlq4M4=',
            'action' => '1',
            'service' => 'REST',
            'operateur' => $request->type_service,
            'redirect' => ''
        );

        // Creation d'une ressource Curl
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_URL, $ACTION_URL);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

        // Appelle du serverice et recuperation du resultat
        $resultat = curl_exec($ch);

        $xml = simplexml_load_string($resultat, "SimpleXMLElement", LIBXML_NOCDATA);
        $json = json_encode($xml);
        $array = json_decode($json,TRUE);

        return response()->json([
            'pvit_response' => $array,
            'user_meta_data' => [Auth::user()->email, $date_livraison]
        ]);

    }

    public function checkPvitCallBack(Request $request) {
        $order = RecapCommande::where('ref_commande', $request->ref_produit)->get();

        if (count($order) > 0) {
            return $order;
        }else{
            return 'Erreur de transaction';
        }

    }

    public function payWithCreditCard(Request $request) {

        $alphabet = "123456789azertyAZERTYUIOPQSDFuiopqsdfghjklmwxcvbnGHJKLMWXCVBN0";
        $length = 10;
        $ref_commande =  substr(str_shuffle(str_shuffle(str_repeat($alphabet, $length))), 0, $length);


        $data_transaction = array(
            'client_card' => '8888 8888 8888 8888',
            'montant' =>  '1000', //$montant[0],
            'ref' => $ref_commande,
        );

        return $data_transaction;
    }

    // client commande
    public function getClientCommande() {
        $client_commandes = RecapCommande::where('user_id', Auth::user()->id)->get();

        foreach ($client_commandes as $client_commande) {
            // $client_commande1 = CommandeProduit::where('order_id', $client_commande->id)->get();
            $quantite = 0;

            $client_commande1 =
                DB::table('commande_produits')
                ->join('recap_commandes', 'recap_commandes.id', '=', 'commande_produits.order_id')
                ->join('produits', 'produits.id', '=', 'commande_produits.id_produit')
                ->select('produits.ref_produit', 'produits.image', 'produits.libelle', 'produits.prix', 'recap_commandes.ref_commande', 'commande_produits.quantite' )
                ->where('commande_produits.order_id', $client_commande->id)
                ->get();

            if(count($client_commande1) > 0) {
                foreach ($client_commande1 as $client_detail) {
                    $quantite += $client_detail->quantite;
                }
                $client_commande->quantite_total = $quantite;
            }

            $commande_address_livraison = CarnetAdresse::find($client_commande->id_addresse_livraison);

            $client_commande->detail_commade = $client_commande1;
            $client_commande->address_livraison = $commande_address_livraison;

        }

        return $client_commandes;
    }

    public function recommander(Request $request) {

        if (!isset($_SESSION['panier'])) {
            $_SESSION['panier'] = [];
        }else{
            $_SESSION['panier'] = [];
        }

        $_SESSION['panier'] = array_values($_SESSION['panier']) ;
        $articles = [];

        $produit_command =
            DB::table('commande_produits')
            ->join('recap_commandes', 'recap_commandes.id', '=', 'commande_produits.order_id')
            ->join('produits', 'produits.id', '=', 'commande_produits.id_produit')
            ->select('produits.ref_produit', 'produits.image', 'produits.libelle', 'produits.id_rayon', 'produits.id as id_produit', 'produits.prix', 'produits.ref_produit', 'recap_commandes.ref_commande', 'commande_produits.quantite as quantite_comande')
            ->where('commande_produits.order_id', $request->id_commande)
            ->get();

            foreach ($produit_command as $commande) {

                $tab_caracteristique = [];
                $tab_caracteristique_supp = [];

                $Caracteristiques =
                DB::table('rayon_caracteristique_valeurs')
                ->join('produit_caracteristique_valeurs', 'produit_caracteristique_valeurs.id_caracteristique_valeur', '=', 'rayon_caracteristique_valeurs.valeur_id')
                ->join('produits', 'produits.id', '=', 'produit_caracteristique_valeurs.id_produit')
                ->join('rayons', 'rayons.id', '=', 'produits.id_rayon')
                ->join('caracteristiques', 'caracteristiques.id', '=', 'rayon_caracteristique_valeurs.caracteristique_id')
                ->join('valeur_caracteristiques', 'valeur_caracteristiques.id', '=', 'produit_caracteristique_valeurs.id_caracteristique_valeur')
                ->where('produit_caracteristique_valeurs.id_produit',  $commande->id_produit)
                ->where('rayon_caracteristique_valeurs.rayon_id',  $commande->id_rayon)
                ->select('caracteristiques.libelle as lib_caract', 'valeur_caracteristiques.libelle as lib_valeur')
                ->get();

                foreach ($Caracteristiques as $caracteristique) {
                    $tab_caracteristique[$caracteristique->lib_caract] = $caracteristique->lib_valeur;
                }

                $Caracteristique_supp =
                DB::table('produit_caracteristiques')
                ->join('produits', 'produits.id', '=', 'produit_caracteristiques.produit_id')
                ->join('boutique_produit_car_valeurs', 'boutique_produit_car_valeurs.id', '=', 'produit_caracteristiques.valeur')
                ->join('boutique_produit_caracteristiques', 'boutique_produit_caracteristiques.id', '=', 'boutique_produit_car_valeurs.idBoutiqueCarValeur')
                ->where('produit_caracteristiques.produit_id',  $commande->id_produit)
                ->select('boutique_produit_caracteristiques.libelle', 'boutique_produit_car_valeurs.valeur')
                ->get();

                foreach ($Caracteristique_supp as $caracteritique_sp) {
                    $tab_caracteristique_supp[$caracteritique_sp->libelle] = $caracteritique_sp->valeur;
                }

                $tab_contactener = array_merge($tab_caracteristique, $tab_caracteristique_supp);

                $commande->caract = $tab_contactener;
                $prix_total = $commande->quantite_comande * $commande->prix;

                $data = [
                    'id_produit' => $commande->id_produit,
                    'prix_unitaire' => $commande->prix,
                    'quantite' => $commande->quantite_comande, // quantité dans la commande
                    'prix_total' => $prix_total, //prix total dans la commande
                    'statut' => 1,
                    'ref' => $commande->ref_produit,
                    'carac' => $tab_contactener, // carteristique dans la commande
                    'carac1' => null,
                    'carac2' => null
                ];

                array_push($data, $commande->quantite_comande);

                array_push($_SESSION['panier'], $data);

            }

            return response()->json($_SESSION['panier']);

    }

    public function sortByDate(Request $request) {

        $sorted_commande = [];

        if ($request->type_date == 'all') {

            $items = RecapCommande::where('user_id', Auth::user()->id)->get();
            $sorted_commande = $items;

        }

        if ($request->type_date == 'this_week') {

            $items = RecapCommande::select("*")
            ->where('user_id', Auth::user()->id)
            ->whereBetween('created_at',
                    [Carbon::now()->startOfWeek(), Carbon::now()->endOfWeek()]
                )
            ->get();

            $sorted_commande = $items;

        }

        if ($request->type_date == 'this_month') {

            $items = RecapCommande::select('*')
            ->where('user_id', Auth::user()->id)
            ->whereMonth('created_at', Carbon::now()->month)
            ->get();

            $sorted_commande = $items;
        }

        if ($request->type_date == 'three_last_months') {

            $items = RecapCommande::select('*')
            ->where('user_id', Auth::user()->id)
            ->whereBetween('created_at',
                [Carbon::now()->subMonth(3), Carbon::now()]
            )
            ->get();

            $sorted_commande = $items;

        }

        if ($request->type_date == 'six_last_month') {
            $items = RecapCommande::select('*')
            ->where('user_id', Auth::user()->id)
            ->whereBetween('created_at',
                [Carbon::now()->subMonth(6), Carbon::now()]
            )
            ->get();

            $sorted_commande = $items;
        }

        if ($request->type_date == 'this_year') {

            $items = RecapCommande::whereBetween('created_at', [
                Carbon::now()->startOfYear(),
                Carbon::now()->endOfYear(),
            ])
            ->where('user_id', Auth::user()->id)
            ->get();

            // return $items;
            $sorted_commande = $items;
        }

        if (count($sorted_commande) > 0) {
            foreach ($sorted_commande as $client_commande) {
                $quantite = 0;
                $client_commande1 =
                    DB::table('commande_produits')
                    ->join('recap_commandes', 'recap_commandes.id', '=', 'commande_produits.order_id')
                    ->join('produits', 'produits.id', '=', 'commande_produits.id_produit')
                    ->select('produits.ref_produit', 'produits.image', 'produits.libelle', 'produits.prix', 'recap_commandes.ref_commande', 'commande_produits.quantite' )
                    ->where('commande_produits.order_id', $client_commande->id)
                    ->get();

                if(count($client_commande1) > 0) {
                    foreach ($client_commande1 as $client_detail) {
                        $quantite += $client_detail->quantite;
                    }
                    $client_commande->quantite_total = $quantite;
                }

                $commande_address_livraison = CarnetAdresse::find($client_commande->id_addresse_livraison);

                $client_commande->detail_commade = $client_commande1;
                $client_commande->address_livraison = $commande_address_livraison;

            }

        }

        return $sorted_commande;

    }

}
