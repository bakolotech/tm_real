<?php

namespace App\Http\Controllers;

use App\Events\PvitCallbackUpdated;
use App\Events\RealTimeMessage;
use App\Models\CarnetAdresse;
use App\Models\Commande;
use App\Models\Produit;
use App\Models\CommandeProduit;
use App\Models\Adresse;
use CreateCommandeProduitsTable;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use App\Models\RecapCommande;
use App\Models\CommandeTraking;
use App\Models\CommandeProcess;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use App\User;
use Illuminate\Support\Facades\Hash;
use App\Models\Main;
use Illuminate\Support\Facades\File;

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

    public function updateUserTemp(Request $request) {

        DB::table('users')
        ->where('users.email', '=', 'stoulendong@toulemarket.com')
        ->update([
            'prenom' =>  'Stéphane'
        ]);

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

        return $order1;
    }

    // Cree un utilisateur invité 
    public function createInviteeUser($user_profil) {
        $user = User::create(
            [
                'nom' => strtoupper(self::security($_SESSION['session_invite'][0]['nom_prenom'])),
                'prenom' => ucwords(self::security($_SESSION['session_invite'][0]['nom_prenom'])),
                'sexe' => self::security('M'),
                'ville' => self::security('Libreville'),
                'email' => self::security($_SESSION['session_invite'][0]['email_invite']),
                'password' => Hash::make(htmlspecialchars('123456')),
                'personal_key' => Main::getUserKey(),
                'city_id' => $_SESSION['config']['ma-position']['states'][0]['cities'][0]['id'],
                'state_id' => $_SESSION['config']['ma-position']['states'][0]['id'],
                'pays_id' => $_SESSION['config']['ma-position']['id'],
                'last_ip' => $_SERVER['REMOTE_ADDR'],
                'devise_id' => 1,
                'deleted' => $user_profil
            ]
        );

        return $user;

    }

    // Cree une adresse de livraison pour achat invité 
    public function createUserLivraisonAdresse($user_id) {
        
        $carnet_adresse= new CarnetAdresse();
        $carnet_adresse->prenom_nom = $_SESSION['session_invite'][0]['nom_prenom'];
        $carnet_adresse->adresse = $_SESSION['session_invite'][0]['addr_quartier'];
        $carnet_adresse->ville = 'Libreville';
        $carnet_adresse->code_postale = $_SESSION['session_invite'][0]['code_poste_invite'];

        $carnet_adresse->portable = $_SESSION['session_invite'][0]['num_invite'];
        $carnet_adresse->complement = 'En face';
        $carnet_adresse->type_adresse = 'Particulier';
        $carnet_adresse->nom_entreprise = $_SESSION['session_invite'][0]['nom_entreprise_invite'];

        $carnet_adresse->latitude = '';
        $carnet_adresse->longitude = '';

        $long_lat = explode(" , ", $_SESSION['session_invite'][0]['addr_quartier']);

        if(is_array($long_lat) && (count($long_lat)  == 2)) {
            $carnet_adresse->latitude = $long_lat[0];
            $carnet_adresse->longitude = $long_lat[1];
        }

        $carnet_adresse->adresse_defaut=1;
        $carnet_adresse->user_id= $user_id;

        $user_carnet = $carnet_adresse->save(); // Save adresse de livraison ------------------

        if ($user_carnet) {
           return $carnet_adresse;
        }else {

        }

        

    }

    // Les type de services mobiles 
    public function type_service_mobile1($type_service) {
        if ($type_service == "AM") {
            $tel_marchant = '076513886';
            return $tel_marchant;

        }else if ($type_service == "MC") {
            $tel_marchant = '062341392';
            return $tel_marchant;
        }
    }

    public function type_service_mobile2($type_service) {
        if ($type_service == "AM") {
            $mode_payement = 'AirtelMoney';
            return $mode_payement;
        }else if ($type_service == "MC") {
            $mode_payement = 'MoovMoney';
            return $mode_payement;
        }
    }

    // Achat panier normal 
    function processPanierNormal() {
        // Initialize variables to avoid undefined variable warnings
        $sous_total = 0;
        $quantite = 0;
    
        // Check if $_SESSION['panier'] is set and not empty
        if (!empty($_SESSION['panier']) && is_array($_SESSION['panier'])) {
            $data_product = $_SESSION['panier'];
            
            // Calculate the total and quantity of items in the cart
            for ($i = 0; $i < count($_SESSION['panier']); $i++) {
                $sous_total += $_SESSION['panier'][$i]['prix_total'];
                $quantite += $_SESSION['panier'][$i]['quantite'];
            }
        }
    
        // Check if $_SESSION['commande_expedition'] and $_SESSION['expedition'] are set
        if (isset($_SESSION['commande_expedition']) && isset($_SESSION['expedition'])) {
            $data_expedition = $_SESSION['commande_expedition'];
            $montant_expedition = $_SESSION['expedition'];
    
            // Apply the free shipping condition
            if ($sous_total > 20000) {
                $montant_expedition = 0;
            }
        } else {
            // Set default values for $data_expedition and $montant_expedition if they are not set
            $data_expedition = null;
            $montant_expedition = 0;
        }
    
        // Calculate the final total amount and number of articles
        $total_final = $sous_total + $montant_expedition;
        $nbre_article = count($_SESSION['panier']);
    
        return array('total_final' => $total_final, 'nbre_article' => $nbre_article, 'sous_total' => $sous_total, 'montant_expedition' => $_SESSION['expedition']);
    }

    // Achat panier rapide 
    function processPanierRapide() {
        // Initialize variables to avoid undefined variable warnings
        $sous_total = 0;
        $quantite = 0;
    
        // Check if $_SESSION['panier'] is set and not empty
        if (!empty($_SESSION['panier_rapide']) && is_array($_SESSION['panier_rapide'])) {            
            // Calculate the total and quantity of items in the cart
                $sous_total = $_SESSION['panier_rapide'][0]['prix_total'];
                $quantite = $_SESSION['panier_rapide'][0]['quantite'];
        }
    

        if (isset($_SESSION['expedition_rapide'])) {
            $montant_expedition = $_SESSION['expedition_rapide'];
    
            // Apply the free shipping condition
            if ($sous_total > 20000) {
                $montant_expedition = 0;
            }
        } else {
            // Set default values for $data_expedition and $montant_expedition if they are not set
            $data_expedition = null;
            $montant_expedition = 0;
        }
    
        // Calculate the final total amount and number of articles
        $total_final = $sous_total + $montant_expedition;
        $nbre_article = 1;
    
        return array('total_final' => $total_final, 'nbre_article' => $nbre_article, 'sous_total' => $sous_total, 'montant_expedition' => $_SESSION['expedition_rapide']);
    }

    // Paiement via service mobile 
    public function process_pvit_payement($tel_marchant, $total_final, $ref_commande, $numero_client, $type_service) {

        $date_livraison = date('d-m-Y');
        $ACTION_URL = 'https://mypvit.com/pvit-secure-full-api.kk';

        // Les donnees a envoye a PVIT
        $data = array(
            'tel_marchand' => $tel_marchant,
            'montant' =>   $total_final, //$montant[0],
            'ref' => $ref_commande,
            'tel_client' => $numero_client,
            'token' => 'eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.cTBwakpwWDNhUEowaEFibkhZU3haUzJmUU0yeE9CcklLQ3JBT0RXSmNUZXdNZUxtNTNoaFY2MFU0SDFtb1d4RW5pdE84VmlSVWFzY2pQZkFxdVg4bUJzWTBETkVjNFVpZUZBOWRXZDlGdGI2M3R5VjluemMrdUQzV1gvVWEzS2RoZFh4b0xNeFg5R2FxbE55aHhhUm9VYmpULzNUcUs4b3dzSnNQMUpGMmhZZW5ya0ViSWxYdk05VVRqREQycEtFOjpEKzJId2N6aStjTlVNTnVnMmVCUHp3PT0=.UwxmZr0gmCIbnJsFkeVtvtJq67M56xqLmr+MZLlq4M4=',
            'action' => '1',
            'service' => 'REST',
            'operateur' => $type_service,
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

        return $array;

    }

    // Creation de detail de la commande 
    public function create_order_detail($id_commande) {
        if (isset($_SESSION['panier'])) {
            for($i = 0, $size = count($_SESSION['panier']); $i < $size; ++$i) {
                $po = [
                    'id_produit' => $_SESSION['panier'][$i]['id_produit'],
                    'order_id' => $id_commande,
                    'quantite' => $_SESSION['panier'][$i]['quantite']
                ];
    
                CommandeProduit::create($po);
    
            }
        }else if(isset($_SESSION['panier_rapide'])) {
                $po = [
                    'id_produit' => $_SESSION['panier_rapide'][0]['id_produit'],
                    'order_id' => $id_commande,
                    'quantite' => $_SESSION['panier_rapide'][0]['quantite']
                ];
    
                CommandeProduit::create($po);
    
        }
    }

    public function getOrderData($user_id, $id_adresse_livraison, $num_tel, $sous_total, $total_final, $ref_commande, $date_commande, $mode_payement, $montant_expedition, $nbre_article) {

        $order1 = [
            'user_id' => $user_id,
            'id_addresse_livraison' => $id_adresse_livraison,
            'id_adresse_facturation' => $num_tel,
            'escompte_facturation' => 0,
            'escompte_code_facturation' => 0,
            'facturation_sous_total' => $sous_total,
            'facturation_taxe' => 0,
            'totaf_facturation' => $total_final,
            'ref_commande' => $ref_commande,
            'date_commande' => $date_commande,
            'mode_payement' => $mode_payement,
            'facture_montant_expedition' => $montant_expedition,
            'nombre_article' => $nbre_article,
            'status_commande' => 'Commande confirmée',
            'notified' => 'false',
        ];

         return $order1;
    }

    public function commandeProcessData($order_id, $curr, $today) {
        $commande_process = [
           'order_id' => $order_id,
           'order_status' => 'Commande confirmée',
           'step_hour' => $curr,
           'step_date' => $today
       ];

       return $commande_process;
   }

    // ---------------> New payement function 
//     public function payWithMobileServices(Request $request)
//     {
//         global $data_payement;
//         // return $data_resume;
//         $sous_total = 0;
//         $total_final = 0;
//         $quantite = 0;
//         $nbre_article = 0;
//         $montant_expedition = 0;

//         $numero_client = preg_replace('/\s+/', '', $request->num_tel);

//         if(isset($_SESSION['session_invite'])) { // S'il s'agit de la session invité
//         $inviter_profil = 0;

//         if ($_SESSION['session_invite'][0]['memorise'] == 1) {
//             $inviter_profil = 1;
//         }

//         // ------------- > Zone création de user 

//         $inviter_user = $this->createInviteeUser($inviter_profil);
//         // Zone adresse livraison
//         $carnet_adresse = $this->createUserLivraisonAdresse($inviter_user->id);

//         $id_adresse_livraison = $carnet_adresse->id;

//         // Action & Post
//         $tel_marchant = $this->type_service_mobile1($request->type_service);
//         $mode_payement = $this->type_service_mobile2($request->type_service);

//         $alphabet = "123456789azertyAZERTYUIOPQSDFuiopqsdfghjklmwxcvbnGHJKLMWXCVBN0";
//         $length = 15;
//         $ref_commande =  substr(str_shuffle(str_shuffle(str_repeat($alphabet, $length))), 0, $length);
//         $date_commande = date('d-m-Y');

//         if(isset($_SESSION['panier'])) {

//             $data_panier = $this->processPanierNormal();
//             $sous_total = $data_panier['sous_total'];
//             $total_final = $data_panier['total_final'];
//             $nbre_article = $data_panier['nbre_article'];
//             $montant_expedition = $data_panier['montant_expedition'];

//         } else if(isset($_SESSION['panier_rapide'])) {

//             $data_panier_rapide = $this->processPanierRapide();
//             $sous_total = $data_panier_rapide['sous_total'];
//             $total_final = $data_panier_rapide['total_final'];
//             $nbre_article = $data_panier_rapide['nbre_article'];
//             $montant_expedition = $data_panier_rapide['montant_expedition'];

//         }

//         $order1 = [
//             'user_id' => $inviter_user->id,
//             'id_addresse_livraison' => $id_adresse_livraison,
//             'id_adresse_facturation' => $request->num_tel,
//             'escompte_facturation' => 0,
//             'escompte_code_facturation' => 0,
//             'facturation_sous_total' => $sous_total,
//             'facturation_taxe' => 0,
//             'totaf_facturation' => $total_final,
//             'ref_commande' => $ref_commande,
//             'date_commande' => $date_commande,
//             'mode_payement' => $mode_payement,
//             'facture_montant_expedition' => $montant_expedition,
//             'nombre_article' => $nbre_article,
//             'status_commande' => 'Commande confirmée',
//             'notified' => 'false',
//         ];

//         $order = RecapCommande::create($order1);
//         $curr = \Carbon\Carbon::now('Africa/Lagos')->format('H:i');
//         $today = Carbon::today()->toDateString();

//         $commande_process = [
//             'order_id' => $order->id,
//             'order_status' => 'Commande confirmée',
//             'step_hour' => $curr,
//             'step_date' => $today
//         ];

//         $commande_process = CommandeProcess::create($commande_process);

//         // Creation des details produits 
//         $this->create_order_detail($order->id);
//         $date_livraison = date('d-m-Y');

//         $array = $this->process_pvit_payement($tel_marchant, $total_final, $ref_commande, $numero_client, $request->type_service);

//         return response()->json([
//             'pvit_response' => $array,
//             'user_meta_data' => [$_SESSION['session_invite'][0]['email_invite'], $date_livraison]
//         ]);

//         // ---------------------- FIN TRAITEMENT INVITER --------------------------
//         }else if(isset($_SESSION['user_adresse_achat'])) { // -------- CONNECTED USER -----------------

//         $data_adresse_livraison = $_SESSION['user_adresse_achat']; // infos de l'addresse de livraison

//         if (isset($_SESSION['commande_payement_infos'])) {
//             $data_payement = $_SESSION['commande_payement_infos']; // infos de moyens de paiement
//         }else {
//             $data_payement = [];
//         }

//         // Action & Post
//         $tel_marchant = $this->type_service_mobile1($request->type_service);
//         $mode_payement = $this->type_service_mobile2($request->type_service);

//         $alphabet = "123456789azertyAZERTYUIOPQSDFuiopqsdfghjklmwxcvbnGHJKLMWXCVBN0";
//         $length = 15;
//         $ref_commande =  substr(str_shuffle(str_shuffle(str_repeat($alphabet, $length))), 0, $length);
//         $date_commande = date('d-m-Y');

//         if(isset($_SESSION['panier'])) {
            
//             $data_panier = $this->processPanierNormal();
//             $sous_total = $data_panier['sous_total'];
//             $total_final = $data_panier['total_final'];
//             $nbre_article = $data_panier['nbre_article'];
//             $montant_expedition = $data_panier['montant_expedition'];

//         } else if(isset($_SESSION['panier_rapide'])) {
//             $data_panier_rapide = $this->processPanierRapide();
//             $sous_total = $data_panier_rapide['sous_total'];
//             $total_final = $data_panier_rapide['total_final'];
//             $nbre_article = $data_panier_rapide['nbre_article'];
//             $montant_expedition = $data_panier_rapide['montant_expedition'];
//         }

//         if (!isset($_SESSION['commande_client'])) {
//             $_SESSION['commande_client'] = 0;
//         }

//         $_SESSION['commande_client'] += 1;

//         $order1 = [
//             'user_id' => Auth::user()->id,
//             'id_addresse_livraison' => $data_adresse_livraison['id'],
//             'id_adresse_facturation' => $request->num_tel,
//             'escompte_facturation' => 0,
//             'escompte_code_facturation' => 0,
//             'facturation_sous_total' => $sous_total,
//             'facturation_taxe' => 0,
//             'totaf_facturation' => $total_final,
//             'ref_commande' => $ref_commande,
//             'date_commande' => $date_commande,
//             'mode_payement' => $mode_payement,
//             'facture_montant_expedition' => $montant_expedition,
//             'nombre_article' => $nbre_article,
//             'status_commande' => 'Commande confirmée',
//             'notified' => 'false'
//         ];

//         $order = RecapCommande::create($order1);
//         $curr = \Carbon\Carbon::now('Africa/Lagos')->format('H:i');
//         $today = Carbon::today()->toDateString();

//         $commande_process = [
//             'order_id' => $order->id,
//             'order_status' => 'Commande confirmée',
//             'step_hour' => $curr,
//             'step_date' => $today
//         ];

//         $commande_process = CommandeProcess::create($commande_process);

//         // Creation des details produits 
//         $this->create_order_detail($order->id);

//         $date_livraison = date('d-m-Y');

//         $array = $this->process_pvit_payement($tel_marchant, $total_final, $ref_commande, $numero_client, $request->type_service);

//         return response()->json([
//             'pvit_response' => $array,
//             'user_meta_data' => [Auth::user()->email, $date_livraison]
//         ]);

//     }

//   }

    // ---------------> New payement function
    public function payWithMobileServices(Request $request)
    {
        global $data_payement;

        $sous_total = 0;
        $total_final = 0;
        $nbre_article = 0;
        $montant_expedition = 0;
        $numero_client = preg_replace('/\s+/', '', $request->num_tel);

        $alphabet = "123456789azertyAZERTYUIOPQSDFuiopqsdfghjklmwxcvbnGHJKLMWXCVBN0";
        $length = 15;
        $ref_commande =  substr(str_shuffle(str_shuffle(str_repeat($alphabet, $length))), 0, $length);
        $date_commande = date('d-m-Y');

        $tel_marchant = $this->type_service_mobile1($request->type_service);
        $mode_payement = $this->type_service_mobile2($request->type_service);

        if(isset($_SESSION['panier'])) {
            $data_panier = $this->processPanierNormal();
        } else if(isset($_SESSION['panier_rapide'])) {
            $data_panier = $this->processPanierRapide();
        }

        $sous_total = $data_panier['sous_total'];
        $total_final = $data_panier['total_final'];
        $nbre_article = $data_panier['nbre_article'];
        $montant_expedition = $data_panier['montant_expedition'];

        if(isset($_SESSION['session_invite'])) { // S'il s'agit de la session invité

        $inviter_profil = 0;

        try {
            if ($_SESSION['session_invite'][0]['memorise'] == 1) {
                $inviter_profil = 1;
            }
    
            // ------------- > Zone création de user
            $inviter_user = $this->createInviteeUser($inviter_profil);
            // Zone adresse livraison
            $carnet_adresse = $this->createUserLivraisonAdresse($inviter_user->id);
            $id_adresse_livraison = $carnet_adresse->id;
            $order1 = $this->getOrderData($inviter_user->id, $id_adresse_livraison, $numero_client, $sous_total, $total_final, $ref_commande, $date_commande, $mode_payement, $montant_expedition, $nbre_article);
    
            $order = RecapCommande::create($order1);
            $curr = \Carbon\Carbon::now('Africa/Lagos')->format('H:i');
            $today = Carbon::today()->toDateString();
    
            $commande_process = $this->commandeProcessData($order->id, $curr, $today);
            $commande_process = CommandeProcess::create($commande_process);
    
            // Creation des details produits
            $this->create_order_detail($order->id);
            $array = $this->process_pvit_payement($tel_marchant, $total_final, $ref_commande, $numero_client, $request->type_service);
    
            return response()->json([
                'pvit_response' => $array,
                'user_meta_data' => [$_SESSION['session_invite'][0]['email_invite'], $date_commande],
                'message' => 'Commande avec success',
                'status' => 'success'
            ]);
        } catch (\Throwable $th) {
            return response()->json([
                'pvit_response' => [],
                'user_meta_data' => [],
                'message' => ' error: '.$th->getMessage(),
                'status' => 'error'
            ]);
        }

        // ---------------------- FIN TRAITEMENT INVITER --------------------------
        }else if(isset($_SESSION['user_adresse_achat'])) { // -------- CONNECTED USER -----------------
        try {

        $data_adresse_livraison = $_SESSION['user_adresse_achat']; // infos de l'addresse de livraison
        if (isset($_SESSION['commande_payement_infos'])) {
            $data_payement = $_SESSION['commande_payement_infos']; // infos de moyens de paiement
        }else {
            $data_payement = [];
        }

        // Action & Post
        if (!isset($_SESSION['commande_client'])) {
            $_SESSION['commande_client'] = 0;
        }

        $_SESSION['commande_client'] += 1;

        $order1 = $this->getOrderData(Auth::user()->id, $data_adresse_livraison['id'], $numero_client, $sous_total, $total_final, $ref_commande, $date_commande, $mode_payement, $montant_expedition, $nbre_article);

        $order = RecapCommande::create($order1);
        $curr = \Carbon\Carbon::now('Africa/Lagos')->format('H:i');
        $today = Carbon::today()->toDateString();

        $commande_process = $this->commandeProcessData($order->id, $curr, $today);
        $commande_process = CommandeProcess::create($commande_process);

        // Creation des details produits
        $this->create_order_detail($order->id);

        $array = $this->process_pvit_payement($tel_marchant, $total_final, $ref_commande, $numero_client, $request->type_service);

        return response()->json([
            'pvit_response' => $array,
            'user_meta_data' => [Auth::user()->email, $date_commande],
            'message' => 'Commande avec success',
            'status' => 'success'
        ]);

        } catch (\Throwable $th) {

        return response()->json([
            'pvit_response' => [],
            'user_meta_data' => [],
            'message' => ' error: '.$th->getMessage(),
            'status' => 'error'
        ]);

        }

        }

    }


    public function checkPvitCallBack(Request $request) {

        $data_received=file_get_contents("php://input");
        $xml = simplexml_load_string($data_received, "SimpleXMLElement", LIBXML_NOCDATA);
        $json = json_encode($xml);
        $array = json_decode($json,TRUE);

        $order_updated = DB::table('recap_commandes')
        ->where('recap_commandes.ref_commande', '=', $array['REF'])
        ->update([
            'status_payement' => $array['STATUT']
        ]);

        $order_updated = DB::table('recap_commandes')
        ->where('recap_commandes.ref_commande', '=', $array['REF'])
        ->where('recap_commandes.status_payement', 200)
        ->get();

        // Si la transaction est succes

        // _______________________ Chargement dans le fichier text --------------------

        if(count($order_updated) > 0) {

            if(isset($_SESSION['panier_rapide'])) {
                unset($_SESSION['panier_rapide']);
            }


            $current_commande = [
                'id_commande' => $order_updated[0]->id,
                'email' => $order_updated[0]->user_id
            ];
    
            $current_commande_object = (object) $current_commande;
    
            $log = fopen("commandes_temp/nouvellescommande.txt", 'a+');
            fwrite($log, json_encode($current_commande_object) . "\n");
            fclose($log);

        }
        
        // if(count($order_updated) > 0) {
        //     event(new PvitCallbackUpdated($order_updated[0]));
        // }

    }

    public function procede_with_credit_card($total_final, $ref_commande, $email, $nom_prenom) {
        $eb_email = $email;
        // $eb_email = $_SESSION['session_invite'][0]['email_invite'];
        $eb_msisdn = '074846163';
        $eb_amount = $total_final;
        $description = "Paiement par carte credit";
        $eb_shortdescription = $description;
        $eb_reference = $ref_commande;
        $eb_name = $nom_prenom;
        // $eb_name = $_SESSION['session_invite'][0]['nom_prenom'];
    
        $ACTION_URL = "https://stg.billing-easy.com/api/v1/merchant/e_bills";
    
        $charedkey = "37ba8d11-c905-4140-98d2-61310efc835e";
        $username = "toulemarket";
    
        $global_array =
        [
            'payer_email' => $eb_email,
            'payer_msisdn' => $eb_msisdn,
            'amount' => $eb_amount,
            'short_description' => $eb_shortdescription,
            'external_reference' => $eb_reference,
            'payer_name' => $eb_name,
            'expiry_period' => 60
        ];
    
        $content = json_encode($global_array);
        $curl = curl_init($ACTION_URL);
        curl_setopt($curl, CURLOPT_USERPWD, $username . ":" . $charedkey);
        curl_setopt($curl, CURLOPT_HEADER, false);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_HTTPHEADER, array("Content-type: application/json"));
        curl_setopt($curl, CURLOPT_POST, true);
        curl_setopt($curl, CURLOPT_POSTFIELDS, $content);
        $json_response = curl_exec($curl);
    
        // Get status code
        $status = curl_getinfo($curl, CURLINFO_HTTP_CODE);
        $response_e_billing = json_decode($json_response);
    
        return $response_e_billing;
    }

    public function payWithCreditCard(Request $request) {
        
        global $data_payement;
        
        $montant_expedition = 0;
        $sous_total = 0;
        $total_final = 0;

        if(isset($_SESSION['session_invite'])) { // S'il s'agit de la session invité

        $inviter_profil = 0;

        if ($_SESSION['session_invite'][0]['memorise'] == 1) {
            $inviter_profil = 1;
        }

        // ------------- > Zone création de user 
        $inviter_user = $this->createInviteeUser($inviter_profil);

        // Zone adresse livraison
        $carnet_adresse = $this->createUserLivraisonAdresse($inviter_user->id);

        $id_adresse_livraison = $carnet_adresse->id;

        if(isset($_SESSION['panier'])) {

            $data_panier = $this->processPanierNormal();
            $sous_total = $data_panier['sous_total'];
            $total_final = $data_panier['total_final'];
            $nbre_article = $data_panier['nbre_article'];
            $montant_expedition = $data_panier['montant_expedition'];

        } else if(isset($_SESSION['panier_rapide'])) {

            $data_panier_rapide = $this->processPanierRapide();
            $sous_total = $data_panier_rapide['sous_total'];
            $total_final = $data_panier_rapide['total_final'];
            $nbre_article = $data_panier_rapide['nbre_article'];
            $montant_expedition = $data_panier_rapide['montant_expedition'];

        }


        $alphabet = "123456789azertyAZERTYUIOPQSDFuiopqsdfghjklmwxcvbnGHJKLMWXCVBN0";
        $length = 10;
        $ref_commande =  substr(str_shuffle(str_shuffle(str_repeat($alphabet, $length))), 0, $length);
        $date_commande = date('d-m-Y');

        $order1 = [
            'user_id' => $inviter_user->id,
            'id_addresse_livraison' => $id_adresse_livraison,
            'id_adresse_facturation' => $id_adresse_livraison,
            'escompte_facturation' => 0,
            'escompte_code_facturation' => 0,
            'facturation_sous_total' => $sous_total,
            'facturation_taxe' => 0,
            'totaf_facturation' => $total_final,
            'ref_commande' => $ref_commande,
            'date_commande' => $date_commande,
            'mode_payement' => 'VISA',
            'facture_montant_expedition' => $montant_expedition,
            'nombre_article' => $nbre_article,
            'status_commande' => 'Commande confirmée',
            'notified' => 'false',
        ];

        $order = RecapCommande::create($order1);
        $curr = \Carbon\Carbon::now('Africa/Lagos')->format('H:i');
        $today = Carbon::today()->toDateString();

        $commande_process = [
            'order_id' => $order->id,
            'order_status' => 'Commande confirmée',
            'step_hour' => $curr,
            'step_date' => $today
        ];

        $commande_process = CommandeProcess::create($commande_process);

        // Creation des details produits 
        $this->create_order_detail($order->id);

        $date_livraison = date('d-m-Y');

        $response_e_billing = $this->procede_with_credit_card($total_final, $ref_commande, $_SESSION['session_invite'][0]['email_invite'], $_SESSION['session_invite'][0]['nom_prenom']);

        return $response_e_billing;

        }else if(isset($_SESSION['user_adresse_achat'])){ // Cas d'un user connecté
    
        $data_adresse_livraison = $_SESSION['user_adresse_achat']; // infos de l'addresse de livraison

        if (isset($_SESSION['commande_payement_infos'])) {
            $data_payement = $_SESSION['commande_payement_infos']; // infos de moyens de paiement
        }else {
            $data_payement = [];
        }

        if(isset($_SESSION['panier'])) {

            $data_panier = $this->processPanierNormal();
            $sous_total = $data_panier['sous_total'];
            $total_final = $data_panier['total_final'];
            $nbre_article = $data_panier['nbre_article'];
            $montant_expedition = $data_panier['montant_expedition'];

        } else if(isset($_SESSION['panier_rapide'])) {

            $data_panier_rapide = $this->processPanierRapide();
            $sous_total = $data_panier_rapide['sous_total'];
            $total_final = $data_panier_rapide['total_final'];
            $nbre_article = $data_panier_rapide['nbre_article'];
            $montant_expedition = $data_panier_rapide['montant_expedition'];

        }

        $date_commande = date('d-m-Y');

        $alphabet = "123456789azertyAZERTYUIOPQSDFuiopqsdfghjklmwxcvbnGHJKLMWXCVBN0";
        $length = 10;
        $ref_commande =  substr(str_shuffle(str_shuffle(str_repeat($alphabet, $length))), 0, $length);

        $order1 = [
            'user_id' => Auth::user()->id,
            'id_addresse_livraison' => $data_adresse_livraison['id'],
            'id_adresse_facturation' => $data_adresse_livraison['id'],
            'escompte_facturation' => 0,
            'escompte_code_facturation' => 0,
            'facturation_sous_total' => $sous_total,
            'facturation_taxe' => 0,
            'totaf_facturation' => $total_final,
            'ref_commande' => $ref_commande,
            'date_commande' => $date_commande,
            'mode_payement' => 'VISA',
            'facture_montant_expedition' => $montant_expedition,
            'nombre_article' => $nbre_article,
            'status_commande' => 'Commande confirmée',
            'notified' => 'false'
        ];


        $order = RecapCommande::create($order1);
        $curr = \Carbon\Carbon::now('Africa/Lagos')->format('H:i');
        $today = Carbon::today()->toDateString();

        $commande_process = [
            'order_id' => $order->id,
            'order_status' => 'Commande confirmée',
            'step_hour' => $curr,
            'step_date' => $today
        ];

        $commande_process = CommandeProcess::create($commande_process);

        $this->create_order_detail($order->id);

        $date_livraison = date('d-m-Y');

        $response_e_billing = $this->procede_with_credit_card($total_final, $ref_commande, Auth::user()->email, Auth::user()->nom);

        return $response_e_billing;

        }
    }

    public function payWithCreditCard_old(Request $request) {
        
        global $data_payement;
        global $mode_payement;

        if(isset($_SESSION['session_invite'])) { // S'il s'agit de la session invité

        $inviter_profil = 0;

        if ($_SESSION['session_invite'][0]['memorise'] == 1) {
            $inviter_profil = 1;
        }

        // if($_SESSION['session_invite'][0]['memorise'] == 1) { //------------- Si le user est activé--------------
        $user = User::create(
            [
                'nom' => strtoupper(self::security($_SESSION['session_invite'][0]['nom_prenom'])),
                'prenom' => ucwords(self::security($_SESSION['session_invite'][0]['nom_prenom'])),
                'sexe' => self::security('M'),
                'ville' => self::security('Libreville'),
                'email' => self::security($_SESSION['session_invite'][0]['email_invite']),
                'password' => Hash::make(htmlspecialchars('123456')),
                'personal_key' => Main::getUserKey(),
                'city_id' => $_SESSION['config']['ma-position']['states'][0]['cities'][0]['id'],
                'state_id' => $_SESSION['config']['ma-position']['states'][0]['id'],
                'pays_id' => $_SESSION['config']['ma-position']['id'],
                'last_ip' => $_SERVER['REMOTE_ADDR'],
                'devise_id' => 1,
                'deleted' => $inviter_profil
            ]
        );

        $carnet_adresse= new CarnetAdresse();
        $carnet_adresse->prenom_nom = $_SESSION['session_invite'][0]['nom_prenom'];
        $carnet_adresse->adresse = $_SESSION['session_invite'][0]['addr_quartier'];
        $carnet_adresse->ville = 'Libreville';
        $carnet_adresse->code_postale = $_SESSION['session_invite'][0]['code_poste_invite'];

        $carnet_adresse->portable = $_SESSION['session_invite'][0]['num_invite'];
        $carnet_adresse->complement = 'En face';
        $carnet_adresse->type_adresse = 'Particulier';
        $carnet_adresse->nom_entreprise = $_SESSION['session_invite'][0]['nom_entreprise_invite'];

        $carnet_adresse->latitude = '';
        $carnet_adresse->longitude = '';

        $carnet_adresse->adresse_defaut=1;
        $carnet_adresse->user_id=$user->id;

        $carnet_adresse->save(); // Save adresse de livraison ---

        $id_adresse_livraison = $carnet_adresse->id;

        $data_product = $_SESSION['panier']; // infos des produits dans le panier
        $data_expedition = $_SESSION['commande_expedition']; // infos de l'expédition
        $montant_expedition = $_SESSION['expedition']; // Montant de l'expédition

        // return $data_resume;
        $sous_total = 0;
        $total_final = 0;
        $quantite = 0;

        for ($i=0; $i < count($_SESSION['panier']); $i++) {
            $sous_total += $_SESSION['panier'][$i]['prix_total'];
            $quantite += $_SESSION['panier'][$i]['quantite'];
        }


        if ($sous_total > 20000) {
            $montant_expedition = 0;
        }

        $total_final = $sous_total + $montant_expedition; // Calcul de montant total


        $alphabet = "123456789azertyAZERTYUIOPQSDFuiopqsdfghjklmwxcvbnGHJKLMWXCVBN0";
        $length = 10;
        $ref_commande =  substr(str_shuffle(str_shuffle(str_repeat($alphabet, $length))), 0, $length);
        $date_commande = date('d-m-Y');

        $order1 = [
            'user_id' => $user->id,
            'id_addresse_livraison' => $id_adresse_livraison,
            'id_adresse_facturation' => $id_adresse_livraison,
            'escompte_facturation' => 0,
            'escompte_code_facturation' => 0,
            'facturation_sous_total' => $sous_total,
            'facturation_taxe' => 0,
            'totaf_facturation' => $total_final,
            'ref_commande' => $ref_commande,
            'date_commande' => $date_commande,
            'mode_payement' => 'VISA',
            'facture_montant_expedition' => $montant_expedition,
            'nombre_article' => count($_SESSION['panier']),
            'status_commande' => 'Commande confirmée',
            'notified' => 'false',
        ];

        $order = RecapCommande::create($order1);
        $curr = \Carbon\Carbon::now('Africa/Lagos')->format('H:i');
        $today = Carbon::today()->toDateString();

        $commande_process = [
            'order_id' => $order->id,
            'order_status' => 'Commande confirmée',
            'step_hour' => $curr,
            'step_date' => $today
        ];

        $commande_process = CommandeProcess::create($commande_process);

        for($i = 0, $size = count($_SESSION['panier']); $i < $size; ++$i) { // Enregistrement les detail de la commande
            $po = [
                'id_produit' => $_SESSION['panier'][$i]['id_produit'],
                'order_id' => $order->id,
                'quantite' => $_SESSION['panier'][$i]['quantite']
            ];

            CommandeProduit::create($po);
        }

        $date_livraison = date('d-m-Y');

        $eb_email = $_SESSION['session_invite'][0]['email_invite'];
        $eb_msisdn = '074846163';
        $eb_amount = $total_final;
        $description = "Paiement par carte credit";
        $eb_shortdescription = $description;
        $eb_reference = $ref_commande;
        $eb_name = $_SESSION['session_invite'][0]['nom_prenom'];

        $ACTION_URL = "https://stg.billing-easy.com/api/v1/merchant/e_bills";

        $charedkey = "37ba8d11-c905-4140-98d2-61310efc835e";
        $username = "toulemarket";

        $global_array =
        [
            'payer_email' => $eb_email,
            'payer_msisdn' => $eb_msisdn,
            'amount' => $eb_amount,
            'short_description' => $eb_shortdescription,
            'external_reference' => $eb_reference,
            'payer_name' => $eb_name,
            'expiry_period' => 60
        ];

        $content = json_encode($global_array);
        $curl = curl_init($ACTION_URL);
        curl_setopt($curl, CURLOPT_USERPWD, $username . ":" . $charedkey);
        curl_setopt($curl, CURLOPT_HEADER, false);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_HTTPHEADER, array("Content-type: application/json"));
        curl_setopt($curl, CURLOPT_POST, true);
        curl_setopt($curl, CURLOPT_POSTFIELDS, $content);
        $json_response = curl_exec($curl);

        // Get status code
        $status = curl_getinfo($curl, CURLINFO_HTTP_CODE);
        $response_e_billing = json_decode($json_response);

        return $response_e_billing;

        }else{
        $data_product = $_SESSION['panier']; // infos des produits dans le panier
        $data_expedition = $_SESSION['commande_expedition']; // infos de l'expédition
        $data_adresse_livraison = $_SESSION['user_adresse_achat']; // infos de l'addresse de livraison
        $montant_expedition = $_SESSION['expedition'];

        if (isset($_SESSION['commande_payement_infos'])) {
            $data_payement = $_SESSION['commande_payement_infos']; // infos de moyens de paiement
        }else {
            $data_payement = [];
        }

        // return $data_resume;
        $sous_total = 0;
        $total_final = 0;
        $quantite = 0;

        for ($i=0; $i < count($_SESSION['panier']); $i++) {
            $sous_total += $_SESSION['panier'][$i]['prix_total'];
            $quantite += $_SESSION['panier'][$i]['quantite'];
        }


        if ($sous_total > 20000) {
            $montant_expedition = 0;
        }

        $total_final = $sous_total + $montant_expedition;

        global $tel_marchant;

        $tel_marchant = '076513886';

        $date_commande = date('d-m-Y');

        $alphabet = "123456789azertyAZERTYUIOPQSDFuiopqsdfghjklmwxcvbnGHJKLMWXCVBN0";
        $length = 10;
        $ref_commande =  substr(str_shuffle(str_shuffle(str_repeat($alphabet, $length))), 0, $length);

        $order1 = [
            'user_id' => Auth::user()->id,
            'id_addresse_livraison' => $data_adresse_livraison['id'],
            'id_adresse_facturation' => $data_adresse_livraison['id'],
            'escompte_facturation' => 0,
            'escompte_code_facturation' => 0,
            'facturation_sous_total' => $sous_total,
            'facturation_taxe' => 0,
            'totaf_facturation' => $total_final,
            'ref_commande' => $ref_commande,
            'date_commande' => $date_commande,
            'mode_payement' => 'VISA',
            'facture_montant_expedition' => $montant_expedition,
            'nombre_article' => count($_SESSION['panier']),
            'status_commande' => 'Commande confirmée',
            'notified' => 'false'
        ];


        $order = RecapCommande::create($order1);
        $curr = \Carbon\Carbon::now('Africa/Lagos')->format('H:i');
        $today = Carbon::today()->toDateString();

        $commande_process = [
            'order_id' => $order->id,
            'order_status' => 'Commande confirmée',
            'step_hour' => $curr,
            'step_date' => $today
        ];

        $commande_process = CommandeProcess::create($commande_process);

        for($i = 0, $size = count($_SESSION['panier']); $i < $size; ++$i) {
            $po = [
                'id_produit' => $_SESSION['panier'][$i]['id_produit'],
                'order_id' => $order->id,
                'quantite' => $_SESSION['panier'][$i]['quantite']
            ];

            CommandeProduit::create($po);

        }

        $date_livraison = date('d-m-Y');

        $eb_email = Auth::user()->email;
        $eb_msisdn = '074846163';
        $eb_amount = $total_final;
        $description = "Paiement par carte credit";
        $eb_shortdescription = $description;
        $eb_reference = $ref_commande;
        $eb_name = Auth::user()->name;

        $ACTION_URL = "https://stg.billing-easy.com/api/v1/merchant/e_bills";

        $charedkey = "37ba8d11-c905-4140-98d2-61310efc835e";
        $username = "toulemarket";

        $global_array =
        [
            'payer_email' => $eb_email,
            'payer_msisdn' => $eb_msisdn,
            'amount' => $eb_amount,
            'short_description' => $eb_shortdescription,
            'external_reference' => $eb_reference,
            'payer_name' => $eb_name,
            'expiry_period' => 60
        ];

        $content = json_encode($global_array);
        $curl = curl_init($ACTION_URL);
        curl_setopt($curl, CURLOPT_USERPWD, $username . ":" . $charedkey);
        curl_setopt($curl, CURLOPT_HEADER, false);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_HTTPHEADER, array("Content-type: application/json"));
        curl_setopt($curl, CURLOPT_POST, true);
        curl_setopt($curl, CURLOPT_POSTFIELDS, $content);
        $json_response = curl_exec($curl);

        // Get status code
        $status = curl_getinfo($curl, CURLINFO_HTTP_CODE);
        $response_e_billing = json_decode($json_response);

        return $response_e_billing;

        }
    }

// client commande
public function getClientCommande() {
    $recap_array = [];
    // $client_commandes = RecapCommande::where('user_id', Auth::user()->id)->get();
    $items = RecapCommande::select("*")
    ->where('user_id', Auth::user()->id)
    ->where('status_payement', 200)
    ->get();

    $recap_array = $items;


    foreach ($recap_array as $client_commande) {

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

    return $recap_array;
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

    // recuperer le nombre de commande par marchand
    function countMarchandCommande() {

        $nom_commandes_marchand
        = DB::table('commande_produits')
        ->join('produits', 'produits.id', '=', 'commande_produits.id_produit')
        ->join('boutiques', 'boutiques.id', 'produits.boutique_id')
        ->join('recap_commandes', 'recap_commandes.id', 'commande_produits.order_id')
        ->join('users', 'users.id', '=', 'recap_commandes.user_id')
        ->select('recap_commandes.ref_commande', 'recap_commandes.id', 'recap_commandes.nombre_article', 'recap_commandes.totaf_facturation', 'recap_commandes.totaf_facturation', 'recap_commandes.date_commande', 'recap_commandes.mode_payement', 'commande_produits.id_produit',  'users.email', 'users.nom', 'users.prenom', 'recap_commandes.status_commande', 'recap_commandes.status_code_commande', 'recap_commandes.ref_commande')
        ->where('produits.boutique_id', $_SESSION['boutique_marchand_id'])
        ->where('recap_commandes.status_commande', '<>', 'Commande Expediée')
        ->where('recap_commandes.status_payement', 200) 
        ->groupBy('commande_produits.order_id')
        ->orderBy('recap_commandes.id', 'DESC')
        ->get();

        foreach ($nom_commandes_marchand as $value) {

            $commande_produits
            = DB::table('commande_produits')
                ->join('produits', 'produits.id', '=', 'commande_produits.id_produit')
                ->join('recap_commandes', 'recap_commandes.id', '=', 'commande_produits.order_id')
                ->select('produits.*')
                ->where('commande_produits.order_id', $value->id)
                ->get();

            $value->commande_produit = $commande_produits;

        }

        return $nom_commandes_marchand;

    }

        // recuperer le nombre de commande par marchand
        function countMarchandCommandeNumber() {

            $nom_commandes_marchand
            = DB::table('commande_produits')
            ->join('produits', 'produits.id', '=', 'commande_produits.id_produit')
            ->join('boutiques', 'boutiques.id', 'produits.boutique_id')
            ->join('recap_commandes', 'recap_commandes.id', 'commande_produits.order_id')
            ->join('users', 'users.id', '=', 'recap_commandes.user_id')
            ->select('recap_commandes.ref_commande', 'recap_commandes.id', 'recap_commandes.nombre_article', 'recap_commandes.totaf_facturation', 'recap_commandes.totaf_facturation', 'recap_commandes.date_commande', 'recap_commandes.mode_payement', 'commande_produits.id_produit',  'users.email', 'users.nom', 'users.prenom', 'recap_commandes.status_commande', 'recap_commandes.status_code_commande', 'recap_commandes.created_at')
            ->where('produits.boutique_id', $_SESSION['boutique_marchand_id'])
            ->where('recap_commandes.commande_vue', 'false')
            ->where('recap_commandes.status_payement', 200) 
            ->groupBy('commande_produits.order_id')
            ->orderBy('recap_commandes.id', 'desc')
            ->get();

            foreach ($nom_commandes_marchand as $value) {

                $commande_produits
                = DB::table('commande_produits')
                    ->join('produits', 'produits.id', '=', 'commande_produits.id_produit')
                    ->join('recap_commandes', 'recap_commandes.id', '=', 'commande_produits.order_id')
                    ->select('produits.*')
                    ->where('commande_produits.order_id', $value->id)
                    ->get();

                $value->commande_produit = $commande_produits;

                $order_updated = DB::table('recap_commandes')
                ->where('recap_commandes.id', '=', $value->id)
                ->update([
                    'vue_notif' => "true"
                ]);

                $date = $value->created_at;
                $created_at = Carbon::parse($date)->locale('fr');
                $time_gap = $created_at->diffForHumans();
                $value->duree = $time_gap;

            }

            return $nom_commandes_marchand;

        }

    // recuperer le nombre de commande par marchand
    public function countMarchandCommandeAccepted() {

        $nom_commandes_marchand
        = DB::table('commande_produits')
        ->join('produits', 'produits.id', '=', 'commande_produits.id_produit')
        ->join('boutiques', 'boutiques.id', 'produits.boutique_id')
        ->join('recap_commandes', 'recap_commandes.id', 'commande_produits.order_id')
        ->join('users', 'users.id', '=', 'recap_commandes.user_id')
        ->select('recap_commandes.ref_commande', 'recap_commandes.id', 'recap_commandes.nombre_article', 'recap_commandes.totaf_facturation', 'recap_commandes.totaf_facturation', 'recap_commandes.date_commande', 'recap_commandes.mode_payement', 'commande_produits.id_produit',  'users.email', 'users.nom', 'users.prenom', 'recap_commandes.status_commande', 'recap_commandes.status_code_commande')
        ->where('produits.boutique_id', $_SESSION['boutique_marchand_id'])
        ->where('recap_commandes.status_commande', 'Commande Expediée')
        ->groupBy('commande_produits.order_id')
        ->get();

        foreach ($nom_commandes_marchand as $value) {

            $commande_produits
            = DB::table('commande_produits')
                ->join('produits', 'produits.id', '=', 'commande_produits.id_produit')
                ->join('recap_commandes', 'recap_commandes.id', '=', 'commande_produits.order_id')
                ->select('produits.*')
                ->where('commande_produits.order_id', $value->id)
                ->get();

            $value->commande_produit = $commande_produits;

        }

        return $nom_commandes_marchand;

    }

    function getMarchandCommandeDetail(Request $request) {

        $commande_produits
        = DB::table('commande_produits')
            ->join('produits', 'produits.id', '=', 'commande_produits.id_produit')
            ->join('recap_commandes', 'recap_commandes.id', '=', 'commande_produits.order_id')
            ->select('produits.*', 'commande_produits.id as idProduitCommande', 'commande_produits.inStock', 'commande_produits.quantite as qte_commandee', 'recap_commandes.user_id')
            ->where('commande_produits.order_id', $request->id)
            ->get();

            $curr = \Carbon\Carbon::now('Africa/Lagos')->format('H:i');
            $today = Carbon::today()->toDateString();

            $commande_process = [
                'order_id' => $request->id,
                'order_status' => 'En cours de traitement',
                'step_hour' => $curr,
                'step_date' => $today
            ];

            $commande_process = CommandeProcess::create($commande_process);

            if(count($commande_produits) > 0) {
                $commande_owener = $commande_produits[0]->user_id;

                $user_file = 'utilisateurs_temps_infos/welcome_user_'.$commande_owener.'_infos.txt';


                $text_to_append = 'En cours de traitement';

                if(\File::exists(public_path($user_file))){

                    $client_notif = [
                        'status' => 1,
                        'message' => 'Commande en cours de traitement'
                    ];
                    $current_commande_object = (object) $client_notif;
    
                    $log = fopen($user_file, 'a+');
                    fwrite($log, json_encode($current_commande_object) . "\n");
                    fclose($log);

                    }else{


                }
            }


        $order_updated = DB::table('recap_commandes')
            ->where('recap_commandes.ref_commande', '=', $request->ref_commande)
            ->update([
                'commande_vue' => 'true',
            ]);

        $order_updated_status = DB::table('recap_commandes')
        ->where('recap_commandes.ref_commande', '=', $request->ref_commande)
            ->update([
                'status_commande' => 'En cours de traitement',
                'status_code_commande' => 1
        ]);

        $recap_item = DB::table('recap_commandes')
                    ->where('id', $request->id)
                    ->get();


        $_client_address = DB::table('carnet_adresses')
        ->where('id', $recap_item[0]->id_addresse_livraison)
        ->get();

        $nom_commandes_marchand1
        = DB::table('commande_produits')
        ->join('produits', 'produits.id', '=', 'commande_produits.id_produit')
        ->join('boutiques', 'boutiques.id', 'produits.boutique_id')
        ->join('recap_commandes', 'recap_commandes.id', 'commande_produits.order_id')
        ->join('users', 'users.id', '=', 'recap_commandes.user_id')
        ->select('recap_commandes.ref_commande', 'recap_commandes.id', 'recap_commandes.nombre_article', 'recap_commandes.totaf_facturation', 'recap_commandes.totaf_facturation', 'recap_commandes.date_commande', 'recap_commandes.mode_payement', 'commande_produits.id_produit',  'users.email', 'users.nom', 'users.prenom', 'recap_commandes.status_commande', 'recap_commandes.status_code_commande')
        ->where('produits.boutique_id', $_SESSION['boutique_marchand_id'])
        ->where('recap_commandes.id', $request->id)
        ->groupBy('commande_produits.order_id')
        ->get();

        // foreach ($nom_commandes_marchand as $value) {

        $nom_commandes_marchand2
        = DB::table('commande_produits')
            ->join('produits', 'produits.id', '=', 'commande_produits.id_produit')
            ->join('recap_commandes', 'recap_commandes.id', '=', 'commande_produits.order_id')
            ->select('produits.*')
            ->where('commande_produits.order_id', $request->id)
            ->get();

        //     $value->commande_produit = $commande_produits;

        // }

        // get new unviews commande
        $nom_commandes_marchand
            = DB::table('commande_produits')
            ->join('produits', 'produits.id', '=', 'commande_produits.id_produit')
            ->join('boutiques', 'boutiques.id', 'produits.boutique_id')
            ->join('recap_commandes', 'recap_commandes.id', 'commande_produits.order_id')
            ->join('users', 'users.id', '=', 'recap_commandes.user_id')
            ->select('recap_commandes.ref_commande', 'recap_commandes.id', 'recap_commandes.nombre_article', 'recap_commandes.totaf_facturation', 'recap_commandes.totaf_facturation', 'recap_commandes.date_commande', 'recap_commandes.mode_payement', 'commande_produits.id_produit','commande_produits.inStock', 'users.email', 'users.nom', 'users.prenom', 'recap_commandes.status_commande', 'recap_commandes.status_code_commande')
            ->where('produits.boutique_id', $_SESSION['boutique_marchand_id'])
            ->where('recap_commandes.commande_vue', 'false')
            ->groupBy('commande_produits.order_id')
            ->get();

        return [
            $commande_produits,
            $_client_address,
            $nom_commandes_marchand2,
            $nom_commandes_marchand1,
            $nom_commandes_marchand
        ];

    }

    function retourPvitTest(Request $request) {
        $latestProdRef = Adresse::orderBy('id','DESC')->first();
        $next = $latestProdRef->id + 1;
        DB::table('adresses')->insert([
            'id' => $next
        ]);

        $all_addresses = Adresse::all();

        return $all_addresses;
    }

    public function getCallBackStatut($ref_command) {

        // $commande =
        // DB::table('recap_commandes')
        // ->where('ref_commande', $ref_command)
        // ->get();

        $commande2 =
        DB::table('recap_commandes')
        ->select('status_payement', 'ref_commande')
        ->where('ref_commande', $ref_command)
        ->get();

        if (count($commande2) > 0) {

            if (($commande2[0]->status_payement == 200) && (isset($_SESSION['panier']))) {
                for ($i = 0; $i < count($_SESSION['panier']); $i++) {
                    unset($_SESSION['panier'][$i]);
                }
            }
        }

        $commande
        = DB::table('commande_produits')
        ->join('produits', 'produits.id', '=', 'commande_produits.id_produit')
        ->join('boutiques', 'boutiques.id', 'produits.boutique_id')
        ->join('marchands', 'marchands.id', 'boutiques.id_marchand')
        ->join('recap_commandes', 'recap_commandes.id', 'commande_produits.order_id')
        ->select('recap_commandes.ref_commande',
                'recap_commandes.id', 'recap_commandes.nombre_article',
                'recap_commandes.totaf_facturation',
                'recap_commandes.date_commande',
                'recap_commandes.mode_payement',
                'recap_commandes.created_at',
                'commande_produits.id_produit',
                'recap_commandes.status_commande',
                'recap_commandes.status_payement',
                'marchands.nom as nom_marchand',
                'marchands.prenom as nom_prenom_marchand',
                'boutiques.libelle as nom_boutique',
                'recap_commandes.status_payement'
            )
        ->where('recap_commandes.ref_commande', $ref_command)
        ->where('recap_commandes.status_payement', 200)
        ->groupBy('commande_produits.order_id')
        ->get();

        return $commande;

    }

    public function updateCommandeStatut(Request $request) {

        $curr = \Carbon\Carbon::now('Africa/Lagos')->format('H:i');
        $today = Carbon::today()->toDateString();

        $commande_process = [
            'order_id' => $request->id_commande,
            'order_status' => 'Commande Expediée',
            'step_hour' => $curr,
            'step_date' => $today
        ];

        $commande_process = CommandeProcess::create($commande_process);

        if(!is_null($request->produit_non_dispo) && count($request->produit_non_dispo) > 0) {

        foreach ($request->produit_non_dispo as $value) {

            $produit =
            DB::table('commande_produits')
            ->join('produits', 'produits.id', '=' ,'commande_produits.id_produit')
            ->join('recap_commandes', 'recap_commandes.id', '=', 'commande_produits.order_id')
            ->select('produits.libelle', 'produits.prix', 'produits.boutique_id', 'recap_commandes.*')
            ->where('commande_produits.id', $value)
            ->get();

            $nbre_article_avant = $produit[0]->nombre_article;
            $commande_insufisant = $produit[0]->id;

            $p_manquant = $value;

            if (count($produit) > 0) {
                $alphabet = "123456789azertyAZERTYUIOPQSDFuiopqsdfghjklmwxcvbnGHJKLMWXCVBN0";
                $length = 11;
                $ref_commande =  substr(str_shuffle(str_shuffle(str_repeat($alphabet, $length))), 0, $length);

                $p = $produit[0];
                $address_livraison = $p->id_addresse_livraison;
                $address_facturation = $p->id_adresse_facturation;
                $sous_total = $p->facturation_sous_total;
                $total_facturation = $p->totaf_facturation;
                $ref_commande = $ref_commande;
                $date_commande = $p->date_commande;
                $mode_payement = $p->mode_payement;
                $facturation_montant_expedition = $p->facture_montant_expedition;
                $nombre_article = $p->nombre_article; // à reviser
                $statut_commande = 'Commande confirmée';

                $libelle_produit = $p->libelle;
                $prix_produit = $p->prix;
                $boutique_id_produit = $p->boutique_id;

                $produits_similaire = DB::table('produits')
                ->where('libelle', $produit[0]->libelle)
                ->where('prix', $produit[0]->prix)
                ->where('boutique_id', '<>', $produit[0]->boutique_id)
                ->get();

                if (count($produits_similaire) > 0) {

                    $p_similaire = $produits_similaire[0];

                    $order1 = [
                        'user_id' => Auth::user()->id,
                        'id_addresse_livraison' => $address_livraison,
                        'id_adresse_facturation' => $address_facturation,
                        'escompte_facturation' => 0,
                        'escompte_code_facturation' => 0,
                        'facturation_sous_total' => $sous_total,
                        'facturation_taxe' => 0,
                        'totaf_facturation' => $total_facturation,
                        'ref_commande' => $ref_commande,
                        'date_commande' => $date_commande,
                        'mode_payement' => $mode_payement,
                        'facture_montant_expedition' => $facturation_montant_expedition,
                        'nombre_article' => 1, // à traiter
                        'status_commande' => 'Commande confirmée',
                        'type_commande' => 'Sous commande',
                        'ref_commande_principal' => $request->ref_commande
                    ];

                    $order = RecapCommande::create($order1);
                    $id_nvlle_commade = $order->id;

                    $po = [
                        'id_produit' => $p_similaire->id,
                        'order_id' => $id_nvlle_commade,
                        'quantite' => 1
                    ];

                    CommandeProduit::create($po);

                    // $order_updated = DB::table('commande_produits')
                    // ->where('commande_produits.id', '=', $p_manquant)
                    // ->update([
                    //     'id_produit' => $p_similaire->id, // nouveau produit trouvé
                    //     'order_id' => $id_nvlle_commade // nouvelle commande crée
                    // ]);

                    // update commande nombre article
                    // $order_updated = DB::table('recap_commandes')
                    // ->where('recap_commandes.id', '=', $commande_insufisant)
                    // ->update([
                    //     'nombre_article' => $nbre_article_avant - 1, // nouveau nombre d'article
                    // ]);

                    // update table commandes produits
                    }

            }

        }

        if(!is_null($request->produit_dispo) && count($request->produit_dispo) > 0) {

            if ($request->type_update == 1) {
                $order_updated = DB::table('recap_commandes')
                ->where('recap_commandes.ref_commande', '=', $request->ref_commande)
                ->update([
                    'status_commande' => 'Commande Expediée',
                    'status_code_commande' => 2
                ]);
            }else if($request->type_update == 2) {
                $order_updated = DB::table('recap_commandes')
                ->where('recap_commandes.ref_commande', '=', $request->ref_commande)
                ->update([
                    'status_commande' => 'En cours de traitement',
                    'status_code_commande' => 1
                ]);
            }

            return $request;

        }


            return $produit;


        }else {
        if ($request->type_update == 1) {

            $order_updated = DB::table('recap_commandes')
            ->where('recap_commandes.ref_commande', '=', $request->ref_commande)
            ->update([
                'status_commande' => 'Commande Expediée',
                'status_code_commande' => 2
            ]);

        $livrer_avant = Carbon::now();
        $timezone = 'Africa/Libreville'; // Replace with your desired timezone

        $todayDate = Carbon::now()->format('H:i:m');
        $heures = Carbon::now()->format('H');
        $seconde = Carbon::now()->format('i');
        $millisecond = Carbon::now()->format('m');

        $current_time1 = Carbon::now();

        $current_time_plus_one_hour = $current_time1->addHours(1);

        $current_time_plus_two_hours = Carbon::now()->addHours(2);

        $heure_ramassage = $current_time_plus_one_hour->format('Y-m-d h:i:s A');
        $heure_livraison = $current_time_plus_two_hours->format('Y-m-d h:i:s A');

        // return commande detail to send to tookan
        $nom_commandes_marchand1
        = DB::table('commande_produits')
        ->join('produits', 'produits.id', '=', 'commande_produits.id_produit')
        ->join('boutiques', 'boutiques.id', 'produits.boutique_id')
        ->join('marchands', 'marchands.id', 'boutiques.id_marchand')
        ->join('recap_commandes', 'recap_commandes.id', 'commande_produits.order_id')
        ->join('users', 'users.id', '=', 'recap_commandes.user_id')
        ->join('carnet_adresses', 'carnet_adresses.id', '=', 'recap_commandes.id_addresse_livraison')
        ->select('recap_commandes.ref_commande', 'recap_commandes.id', 'recap_commandes.nombre_article', 'recap_commandes.totaf_facturation', 'recap_commandes.totaf_facturation', 'recap_commandes.date_commande', 'recap_commandes.mode_payement', 'commande_produits.id_produit',  'users.email as user_email', 'carnet_adresses.prenom_nom', 'carnet_adresses.portable', 'carnet_adresses.adresse as adresse_livraison', 'carnet_adresses.complement', 'carnet_adresses.latitude as client_lat', 'carnet_adresses.longitude as client_lng', 'recap_commandes.status_commande', 'recap_commandes.status_code_commande', 'recap_commandes.id_addresse_livraison', 'marchands.numero_tel', 'boutiques.libelle as boutique_name', 'boutiques.adresse as boutique_adresse', 'boutiques.latitude as latitude_boutique', 'boutiques.longitude as longitude_boutique')
        ->where('produits.boutique_id', $_SESSION['boutique_marchand_id'])
        ->where('recap_commandes.ref_commande', $request->ref_commande)
        ->groupBy('commande_produits.order_id')
        ->get();

        $adresse_livraison = [];

        if (count($nom_commandes_marchand1) > 0) {

            $adresse_livraison = DB::table('carnet_adresses')
            ->where('id', $nom_commandes_marchand1[0]->id_addresse_livraison)
            ->get();

            $nom_commandes_marchand1[0]->ramasser_avant = $heure_ramassage;
            $nom_commandes_marchand1[0]->livrer_avant = $heure_livraison;

            $nom_commandes_marchand1[0]->heures = $heures;
            $nom_commandes_marchand1[0]->seconde = $seconde;
            $nom_commandes_marchand1[0]->millisecond = $millisecond;

            return [$nom_commandes_marchand1[0], $adresse_livraison[0]];
        }

        }else if($request->type_update == 2) {
            $order_updated = DB::table('recap_commandes')
            ->where('recap_commandes.ref_commande', '=', $request->ref_commande)
            ->update([
                'status_commande' => 'En cours de traitement',
                'status_code_commande' => 1
            ]);
        }
            return $request;
        }

    }

    public function updateProduitState(Request $request) {

        if ($request->type_validation == 1) {
            $order_updated = DB::table('commande_produits')
            ->where('commande_produits.id', '=', $request->id_produit)
            ->update([
                'inStock' => 'oui',
            ]);
        }else if($request->type_validation == 0) {
            $order_updated = DB::table('commande_produits')
            ->where('commande_produits.id', '=', $request->id_produit)
            ->update([
                'inStock' => 'non',
            ]);
        }

        return $request;

    }

    //
    public function getMarchandNewCommand(Request $request) {

        $nom_commandes_marchand
        = DB::table('commande_produits')
        ->join('produits', 'produits.id', '=', 'commande_produits.id_produit')
        ->join('boutiques', 'boutiques.id', 'produits.boutique_id')
        ->join('recap_commandes', 'recap_commandes.id', 'commande_produits.order_id')
        ->join('users', 'users.id', '=', 'recap_commandes.user_id')
        ->select('recap_commandes.ref_commande', 'recap_commandes.id', 'recap_commandes.nombre_article', 'recap_commandes.totaf_facturation', 'recap_commandes.totaf_facturation', 'recap_commandes.date_commande', 'recap_commandes.mode_payement', 'commande_produits.id_produit',  'users.email', 'users.nom', 'users.prenom', 'recap_commandes.status_commande', 'recap_commandes.status_code_commande')
        ->where('produits.boutique_id', $request->id_marchand)
        ->where('recap_commandes.notified', 'false')
        ->where('recap_commandes.status_payement', '200')
        ->groupBy('commande_produits.order_id')
        ->get();

        foreach ($nom_commandes_marchand as $value) {

            $commande_produits
            = DB::table('commande_produits')
                ->join('produits', 'produits.id', '=', 'commande_produits.id_produit')
                ->join('recap_commandes', 'recap_commandes.id', '=', 'commande_produits.order_id')
                ->select('produits.*')
                ->where('commande_produits.order_id', $value->id)
                ->get();

            $value->commande_produit = $commande_produits;

        }

        return $nom_commandes_marchand;

    }

    public function updateNotifiedCommandeStatu(Request $request) {

    if(!is_null($request->commmand_data) && count($request->commmand_data) > 0) {
        foreach ($request->commmand_data as $value) {

            $order_updated = DB::table('recap_commandes')
            ->where('recap_commandes.ref_commande', '=', $value['ref_commande'])
            ->update([
                'notified' => "true"
            ]);

            return $order_updated;
        }
        // return $request->commmand_data;
    }

    }

    public function clientCurrentCommande(Request $request) {

        $client_commandes = RecapCommande::where('user_id', Auth::user()->id)->get();
        $commande_status = [];
        $client_commande_active =
        DB::table('recap_commandes')
        ->where('user_id', $request->id_user)
        ->orderBy('id', 'DESC')
        ->limit(1)
        ->get();

        if (count($client_commande_active) > 0) {
            $commande_status = DB::table('commande_processes')
            ->where('order_id', $client_commande_active[0]->id)
            ->groupBy('order_status')
            ->get();
        }

        return [$client_commande_active, $commande_status];

    }

    public function getUnreadNotification(Request $request) {

        $nom_commandes_marchand
        = DB::table('commande_produits')
        ->join('produits', 'produits.id', '=', 'commande_produits.id_produit')
        ->join('boutiques', 'boutiques.id', 'produits.boutique_id')
        ->join('recap_commandes', 'recap_commandes.id', 'commande_produits.order_id')
        ->join('users', 'users.id', '=', 'recap_commandes.user_id')
        ->select('recap_commandes.ref_commande', 'recap_commandes.id', 'recap_commandes.nombre_article', 'recap_commandes.totaf_facturation', 'recap_commandes.totaf_facturation', 'recap_commandes.date_commande', 'recap_commandes.mode_payement', 'commande_produits.id_produit',  'users.email', 'users.nom', 'users.prenom', 'recap_commandes.status_commande', 'recap_commandes.status_code_commande')
        ->where('produits.boutique_id', $request->id_marchand)
        ->where('recap_commandes.vue_notif', 'false')
        ->groupBy('commande_produits.order_id')
        ->get();

        return $nom_commandes_marchand;
    }

    public function check_ebilling_call_back(Request $request) {

        if(isset($_POST)) {

        $order_updated = DB::table('recap_commandes')
        ->where('recap_commandes.ref_commande', '=', $_POST['reference'])
        ->update([
            'status_payement' => '200'
        ]);

        $order_updated = DB::table('recap_commandes')
        ->where('recap_commandes.ref_commande', '=', $_POST['reference'])
        ->where('recap_commandes.status_payement', 200)
        ->get();

        // _______________________ Chargement dans le fichier text --------------------

        if(count($order_updated) > 0) {

            $current_commande = [
                'id_commande' => $order_updated[0]->id,
                'email' => $order_updated[0]->user_id
            ];
    
            $current_commande_object = (object) $current_commande;
    
            $log = fopen("commandes_temp/nouvellescommande.txt", 'a+');
            fwrite($log, json_encode($current_commande_object) . "\n");
            fclose($log);

        }

        $log1 = fopen("/var/www/toulemarket/retour_ebilling.txt", 'a+');
        fwrite($log1, "[" . date('Y-m-d H:i:s') . "] : Transaction : " . $_POST['reference'] . "\n");

        }

    }

    public function getEbillingCallBackStatut($ref_command) {

        $order_updated = DB::table('recap_commandes')
        ->where('recap_commandes.ref_commande', '=', $ref_command)
        ->get();

        return $order_updated;

    }

    public function createTookanTask(Request $request) {

        $data_task = [
            'track_jobId' => $request->job_id,
            'pickup_job_id' => $request->delivery_id,
            'delivery_job_id' => $request->pickup_id,
            'order_id' => $request->order_id,
            'delivery_tracing_link' => $request->delivery_tracing_link,
            'pickup_tracking_link' => $request->pickup_tracking_link
        ];

        $command_traking = CommandeTraking::create($data_task);

        return $command_traking;

    }

    // recuperation des data pour verification du lien tookan (pour gerer le status en cours de livraison)
    public function getClientCurrentTookanTask($idclient) {

        $client_task =
        DB::table('commande_trakings')
        ->join('recap_commandes', 'recap_commandes.ref_commande', '=', 'commande_trakings.order_id')
        ->where('recap_commandes.user_id', $idclient)
        ->where('commande_trakings.en_cours_livraison', 'false')
        ->get();

        return $client_task;

    }

    // recuperation des data pour verification du lien tookan (pour gerer le status commande livrée)
    public function getClientCurrentTookanTaskEncoursLivraison($idclient) {

        $client_task =
        DB::table('commande_trakings')
        ->join('recap_commandes', 'recap_commandes.ref_commande', '=', 'commande_trakings.order_id')
        ->where('recap_commandes.user_id', $idclient)
        ->where('commande_trakings.en_cours_livraison', 'true')
        ->where('commande_trakings.commande_livree', 'false')
        ->get();

        return $client_task;

    }

    // update du retour de tookan
    public function updateFromTookan(Request $request) {

        if ($request->type_update == 1 ) {

            $order_updated = DB::table('recap_commandes')
            ->where('recap_commandes.ref_commande', '=', $request->ref_commande)
            ->update([
                'status_commande' => 'En cours de livraison',
                'status_code_commande' => '3'
            ]);

            $order_updated = DB::table('commande_trakings')
            ->where('commande_trakings.order_id', '=', $request->ref_commande)
            ->update([
                'en_cours_livraison' => 'true',
            ]);

        }else if($request->type_update == 2) {
            $order_updated = DB::table('recap_commandes')
            ->where('recap_commandes.ref_commande', '=', $request->ref_commande)
            ->update([
                'status_commande' => 'Commande livree',
                'status_code_commande' => '4'
            ]);

            $order_updated = DB::table('commande_trakings')
            ->where('commande_trakings.order_id', '=', $request->ref_commande)
            ->update([
                'commande_livree' => 'true',
            ]);

        }


    }

    public function get_admin_new_commande(Request $request) {
        $nom_commandes_marchand
        = DB::table('commande_produits')
        ->join('produits', 'produits.id', '=', 'commande_produits.id_produit')
        ->join('boutiques', 'boutiques.id', 'produits.boutique_id')
        ->join('marchands', 'marchands.id', 'boutiques.id_marchand')
        ->join('recap_commandes', 'recap_commandes.id', 'commande_produits.order_id')
        // ->join('carnet_adresses', 'carnet_adresses.id', 'recap_commandes.id_addresse_livraison')
        ->join('users', 'users.id', '=', 'recap_commandes.user_id')
        ->select('recap_commandes.ref_commande',
                'recap_commandes.id', 'recap_commandes.nombre_article',
                'recap_commandes.totaf_facturation', 
                'recap_commandes.date_commande',
                'recap_commandes.mode_payement',
                'recap_commandes.created_at',
                'recap_commandes.id_addresse_livraison',
                'commande_produits.id_produit',
                'users.email', 'users.nom', 'users.prenom',
                'recap_commandes.status_commande',
                'recap_commandes.status_payement',
                'marchands.nom as nom_marchand',
                'marchands.prenom as nom_prenom_marchand',
                'boutiques.libelle as nom_boutique',
                // 'carnet_adresses.adresse',
            )
        ->where('recap_commandes.status_payement', 200)
        ->orderBy('recap_commandes.id', 'desc')
        ->groupBy('commande_produits.order_id')
        ->get();

            foreach ($nom_commandes_marchand as $value) {

            $commande_produits
            = DB::table('commande_produits')
                ->join('produits', 'produits.id', '=', 'commande_produits.id_produit')
                ->join('recap_commandes', 'recap_commandes.id', '=', 'commande_produits.order_id')
                ->select('produits.ref_produit', 'produits.image', 'produits.libelle', 'produits.prix', 'commande_produits.quantite')
                ->where('commande_produits.order_id', $value->id)
                ->get();

            $adr_livraison = DB::table('carnet_adresses')->where('id', $value->id_addresse_livraison)->get();

            $value->commande_produit = $commande_produits;

            if(count($adr_livraison) > 0) {
                $value->adresse = $adr_livraison[0]->adresse;
            }

            $currentDateTime = Carbon::now();

            $otherDateTime = Carbon::parse($value->created_at);

            $diff = $currentDateTime->diff($otherDateTime)->format('%h h : %i min');

            $value->duree = $diff;

            }

            return $nom_commandes_marchand;

        }

        public function get_admin_new_commande_bis($id_commande) {
            $nom_commandes_marchand
            = DB::table('commande_produits')
            ->join('produits', 'produits.id', '=', 'commande_produits.id_produit')
            ->join('boutiques', 'boutiques.id', 'produits.boutique_id')
            ->join('marchands', 'marchands.id', 'boutiques.id_marchand')
            ->join('recap_commandes', 'recap_commandes.id', 'commande_produits.order_id')
            ->join('carnet_adresses', 'carnet_adresses.id', 'recap_commandes.id_addresse_livraison')
            ->join('users', 'users.id', '=', 'recap_commandes.user_id')
            ->select('recap_commandes.ref_commande',
                    'recap_commandes.id', 'recap_commandes.nombre_article',
                    'recap_commandes.totaf_facturation',
                    'recap_commandes.date_commande',
                    'recap_commandes.mode_payement',
                    'recap_commandes.created_at',
                    'commande_produits.id_produit',
                    'users.email', 'users.nom', 'users.prenom',
                    'recap_commandes.status_commande',
                    'recap_commandes.status_payement',
                    'marchands.nom as nom_marchand',
                    'marchands.prenom as nom_prenom_marchand',
                    'boutiques.libelle as nom_boutique',
                    'carnet_adresses.adresse',
                )
            ->where('recap_commandes.id', $id_commande)
            ->where('recap_commandes.status_payement', 200)
            ->groupBy('commande_produits.order_id')
            ->get();
        
        foreach ($nom_commandes_marchand as $value) {
        
        $commande_produits
        = DB::table('commande_produits')
            ->join('produits', 'produits.id', '=', 'commande_produits.id_produit')
            ->join('recap_commandes', 'recap_commandes.id', '=', 'commande_produits.order_id')
            ->select('produits.image', 'produits.ref_produit', 'produits.libelle', 'produits.prix', 'commande_produits.quantite')
            ->where('commande_produits.order_id', $value->id)
            ->get();
        
            $value->commande_produit = $commande_produits;
        
            $currentDateTime = Carbon::now();
        
            $otherDateTime = Carbon::parse($value->created_at);
        
            $diff = $currentDateTime->diff($otherDateTime)->format('%h hours %i minutes');
        
            $value->duree = $diff;
        
            }
        
            return $nom_commandes_marchand;
        
        }

        public function getAdminNewCommande(Request $request) {

            $log = fopen("commandes_temp/nouvellescommande.txt", 'a+');
            $filePath = public_path('commandes_temp/nouvellescommande.txt');
    
            $user_name = 'user_name';
    
            $fileContents = File::get(('commandes_temp/nouvellescommande.txt'));
            $dataArray = explode("\n", $fileContents);
    
            $dataArray = array_filter($dataArray, 'trim');
    
            $dataArray = array_map('json_decode', $dataArray);
    
            $tab_new_commande = [];
    
            if(count($dataArray) > 0) {
                foreach($dataArray as $newCommande) {

                if(!is_null($newCommande)) {
                    $nouvelle_commande = $this->get_admin_new_commande_bis($newCommande->id_commande);
        
                    if(count($nouvelle_commande) > 0) {
                        $tab_new_commande[] = $nouvelle_commande[0];
                    }
                }
                    
            }
        }
    
            // $dataArray = array_filter($dataArray, function ($item) use ($user_name) {
            //     return $item->id_commande !== $user_name;
            // });
    
            File::put($filePath, '');
    
            return $tab_new_commande;
    
        }

}
