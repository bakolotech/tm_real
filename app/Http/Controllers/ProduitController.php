<?php

namespace App\Http\Controllers;

use App\Models\Caracteristique;
use App\Models\Famille;
use App\Models\Produit;
use App\Models\Corbeille;
use App\Models\ProduitCaracteristique;
use App\Models\ProduitSousCategorie;
use App\Models\ProduitCaracteristiqueValeur;
use App\Models\ProduitNegociationInterval;
use App\Models\Rayon;
use App\Models\ProduitAchatMultiple;
use App\Models\SousCategorie;
use App\Models\ProduitExpedition;
use App\Models\Univer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use ProtoneMedia\LaravelCrossEloquentSearch\Search;
use Illuminate\Support\Facades\DB;
use App\Models\SousCategorieCaracteristique;
use App\Models\ProduitImage;
use Carbon\Carbon;
use App\Events\UserInRayon;
use Illuminate\Support\Facades\Auth;
use App\Models\CaracteristiqueValeurs;
use App\Models\ProduitOptionsRetour;
use App\Models\Boutique;
use App\Http\Controllers\CaracteristiqueController;
use App\Models\SearchByImage;
use App\Models\BoutiqueProduitCaracteristique;
use App\Models\BoutiqueProduitCarValeur;
use Illuminate\Support\Collection;

class ProduitController extends Controller
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
        $sousCategories = SousCategorie::possibles();

        $data = [
            'sousCategories' => $sousCategories,
            'page' => [
                'title' => 'Ajouter un produit'
            ]
        ];

        return response()->view('back.app-modules.add-produit', $data);
    }



    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function getStatics(){


        $start = Carbon::createFromTime(8, 0);
        $end = Carbon::createFromTime(23, 0);



        if (Auth::check()) {

            $user = Auth::user();
            $stats = DB::table('produits')
            ->join('boutiques', 'boutiques.id', '=',  'produits.boutique_id')
            ->join('marchands', 'marchands.id', '=', 'boutiques.id_marchand')
            ->where('produits.boutique_id', '=', $_SESSION['boutique_marchand_id'])
            ->where('marchands.id_utilisateur', '=', $user->id)
            ->select('produits.quantite')
            ->sum('produits.quantite');


            $today = DB::table('produits')
            ->join('boutiques', 'boutiques.id', '=',  'produits.boutique_id')
            ->join('marchands', 'marchands.id', '=', 'boutiques.id_marchand')
            ->where('produits.boutique_id', '=', $_SESSION['boutique_marchand_id'])
            ->where('marchands.id_utilisateur', '=', $user->id)
            ->whereDate('produits.created_at', '=', Carbon::today())
            ->select('produits.quantite')
            ->sum('produits.quantite');


            $prix = DB::table('produits')
            ->join('boutiques', 'boutiques.id', '=',  'produits.boutique_id')
            ->join('marchands', 'marchands.id', '=', 'boutiques.id_marchand')
            ->where('produits.boutique_id', '=', $_SESSION['boutique_marchand_id'])
            ->where('marchands.id_utilisateur', '=', $user->id)
            ->where('produits.quantite', '>', 0)
            ->select(DB::raw('sum(prix * quantite) as totalPriceQuantity'))->get();


            $prodiutVendu = DB::table('produits')
            ->join('boutiques', 'boutiques.id', '=',  'produits.boutique_id')
            ->join('marchands', 'marchands.id', '=', 'boutiques.id_marchand')
            ->join('commande_produit', 'commande_produit.produit_id', '=', 'produits.id')
            ->join('commandes', 'commandes.id', '=', 'commande_produit.commande_id')
            ->where('produits.boutique_id', '=', $_SESSION['boutique_marchand_id'])
            ->where('marchands.id_utilisateur', '=', $user->id)
            ->whereDate('commandes.created_at', '=', Carbon::today())
            ->where('commandes.status', '=', 3)
            ->select('produits.quantite')
            ->sum('produits.quantite');


            $Commande_en_cours_today = DB::table('produits')
            ->join('boutiques', 'boutiques.id', '=',  'produits.boutique_id')
            ->join('marchands', 'marchands.id', '=', 'boutiques.id_marchand')
            ->join('commande_produit', 'commande_produit.produit_id', '=', 'produits.id')
            ->join('commandes', 'commandes.id', '=', 'commande_produit.commande_id')
            ->where('produits.boutique_id', '=', $_SESSION['boutique_marchand_id'])
            ->where('marchands.id_utilisateur', '=', $user->id)
            ->whereDate('commandes.created_at', '=', Carbon::today())
            ->where('commandes.status', '=', 2)
            ->select('commande_produit.commande_id')
            ->distinct('commande_produit.commande_id')
            ->count('commande_produit.commande_id');



            $commandes_recu = DB::table('produits')
            ->join('boutiques', 'boutiques.id', '=',  'produits.boutique_id')
            ->join('marchands', 'marchands.id', '=', 'boutiques.id_marchand')
            ->join('commande_produit', 'commande_produit.produit_id', '=', 'produits.id')
            ->join('commandes', 'commandes.id', '=', 'commande_produit.commande_id')
            ->where('produits.boutique_id', '=', $_SESSION['boutique_marchand_id'])
            ->where('marchands.id_utilisateur', '=', $user->id)
            ->whereDate('commandes.created_at', '=', Carbon::today())
            ->where('commandes.status', '=', 1)
            ->select('commande_produit.commande_id')
            ->distinct('commande_produit.commande_id')
            ->count('commande_produit.commande_id');


            $Commande_effectuer = DB::table('produits')
            ->join('boutiques', 'boutiques.id', '=',  'produits.boutique_id')
            ->join('marchands', 'marchands.id', '=', 'boutiques.id_marchand')
            ->join('commande_produit', 'commande_produit.produit_id', '=', 'produits.id')
            ->join('commandes', 'commandes.id', '=', 'commande_produit.commande_id')
            ->where('produits.boutique_id', '=', $_SESSION['boutique_marchand_id'])
            ->where('marchands.id_utilisateur', '=', $user->id)
            ->whereDate('commandes.created_at', '=', Carbon::today())
            ->where('commandes.status', '=', 3)
            ->select('commande_produit.commande_id')
            ->distinct('commande_produit.commande_id')
            ->count('commande_produit.commande_id');


            $Commande_annuler = DB::table('produits')
            ->join('boutiques', 'boutiques.id', '=',  'produits.boutique_id')
            ->join('marchands', 'marchands.id', '=', 'boutiques.id_marchand')
            ->join('commande_produit', 'commande_produit.produit_id', '=', 'produits.id')
            ->join('commandes', 'commandes.id', '=', 'commande_produit.commande_id')
            ->where('produits.boutique_id', '=', $_SESSION['boutique_marchand_id'])
            ->where('marchands.id_utilisateur', '=', $user->id)
            ->whereDate('commandes.created_at', '=', Carbon::today())
            ->where('commandes.status', '=', 4)
            ->select('commande_produit.commande_id')
            ->distinct('commande_produit.commande_id')
            ->count('commande_produit.commande_id');



            //------------------------------GRAPH DATA---------------------------------------------------

            $produit_entrant_jour = DB::table('produits')
            ->join('boutiques', 'boutiques.id', '=',  'produits.boutique_id')
            ->join('marchands', 'marchands.id', '=', 'boutiques.id_marchand')
            ->where('produits.boutique_id', '=', $_SESSION['boutique_marchand_id'])
            ->where('marchands.id_utilisateur', '=', $user->id)
            ->whereDate('produits.created_at', '=', Carbon::today())
            ->whereBetween('produits.created_at',[$start, $end])
            ->select('produits.quantite', 'produits.created_at' )
            ->get();



            $prodiutSortant = DB::table('produits')
            ->join('boutiques', 'boutiques.id', '=',  'produits.boutique_id')
            ->join('marchands', 'marchands.id', '=', 'boutiques.id_marchand')
            ->join('commande_produit', 'commande_produit.produit_id', '=', 'produits.id')
            ->join('commandes', 'commandes.id', '=', 'commande_produit.commande_id')
            ->where('produits.boutique_id', '=', $_SESSION['boutique_marchand_id'])
            ->where('marchands.id_utilisateur', '=', $user->id)
            ->whereDate('commandes.created_at', '=', Carbon::today())
            ->where('commandes.status', '=', 3)
            ->select('produits.quantite')
            //->sum('produits.quantite');
            ->get();

            $commandes_recu_jour =DB::table('produits')
            ->join('boutiques', 'boutiques.id', '=',  'produits.boutique_id')
            ->join('marchands', 'marchands.id', '=', 'boutiques.id_marchand')
            ->join('commande_produit', 'commande_produit.produit_id', '=', 'produits.id')
            ->join('commandes', 'commandes.id', '=', 'commande_produit.commande_id')
            ->where('produits.boutique_id', '=', $_SESSION['boutique_marchand_id'])
            ->where('marchands.id_utilisateur', '=', $user->id)
            ->whereDate('commandes.created_at', Carbon::today())
            ->where('commandes.status', '=', 1)
            ->select('commande_produit.commande_id')
            ->distinct('commande_produit.commande_id')
            ->count('commande_produit.commande_id');

            $Commande_effectuer_jour = DB::table('produits')
            ->join('boutiques', 'boutiques.id', '=',  'produits.boutique_id')
            ->join('marchands', 'marchands.id', '=', 'boutiques.id_marchand')
            ->join('commande_produit', 'commande_produit.produit_id', '=', 'produits.id')
            ->join('commandes', 'commandes.id', '=', 'commande_produit.commande_id')
            ->where('produits.boutique_id', '=', $_SESSION['boutique_marchand_id'])
            ->where('marchands.id_utilisateur', '=', $user->id)
            ->whereDate('commandes.created_at', '=', Carbon::today())
            ->where('commandes.status', '=', 3)
            ->select('commande_produit.commande_id')
            ->distinct('commande_produit.commande_id')
            ->count('commande_produit.commande_id');

        }

        return response()->json([
            'status'=>200,
            'stats'=> $stats,
            'today'=> $today,
            'price'=> $prix,
            'produit_sortant' => $prodiutVendu,
            'command_encours_today' => $Commande_en_cours_today,
            'commande_recu_aujourdhui'=> $commandes_recu,
            'commande_effectuee'=> $Commande_effectuer,
            'commande_cancelled'=> $Commande_annuler,
            'produit_entrant_jour'=> $produit_entrant_jour,
            'commande_jour'=>$commandes_recu_jour,
            'commande_effectuer_jour'=>$Commande_effectuer_jour,
            'produit_sortant_graph'=> $prodiutSortant
        ]);

    }



     /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function getStatsFilter($id){

        $dateS = Carbon::now()->month;
        $dateE = Carbon::now()->addMonth(2);



        $start = Carbon::createFromTime(8, 0);
        $end = Carbon::createFromTime(23, 0);

        if (Auth::check()) {
            $user = Auth::user();

              $monthc = Boutique::find($_SESSION['boutique_marchand_id']);
              $boutique_created = $monthc->created_at->format('m');


                if($id == 2){
                    //echo 'week';
                    $statF = DB::table('produits')
                    ->join('boutiques', 'boutiques.id', '=',  'produits.boutique_id')
                    ->join('marchands', 'marchands.id', '=', 'boutiques.id_marchand')
                    ->where('produits.boutique_id', '=', $_SESSION['boutique_marchand_id'])
                    ->where('marchands.id_utilisateur', '=', $user->id)
                    ->whereBetween('produits.created_at',  [Carbon::now()->startOfWeek(Carbon::SUNDAY),      Carbon::now()->endOfWeek (Carbon::SATURDAY)])
                    ->select('produits.quantite')
                    ->sum('produits.quantite');


                    $soldProduct = DB::table('produits')
                    ->join('boutiques', 'boutiques.id', '=',  'produits.boutique_id')
                    ->join('marchands', 'marchands.id', '=', 'boutiques.id_marchand')
                    ->join('commande_produit', 'commande_produit.produit_id', '=', 'produits.id')
                    ->join('commandes', 'commandes.id', '=', 'commande_produit.commande_id')
                    ->where('produits.boutique_id', '=', $_SESSION['boutique_marchand_id'])
                    ->where('marchands.id_utilisateur', '=', $user->id)
                    ->whereBetween('commandes.created_at',  [Carbon::now()->startOfWeek(Carbon::SUNDAY),      Carbon::now()->endOfWeek (Carbon::SATURDAY)])
                    ->where('commandes.status', '=', 3)
                    ->select('produits.quantite')
                    ->sum('produits.quantite');

                    $Commande_en_cours = DB::table('produits')
                    ->join('boutiques', 'boutiques.id', '=',  'produits.boutique_id')
                    ->join('marchands', 'marchands.id', '=', 'boutiques.id_marchand')
                    ->join('commande_produit', 'commande_produit.produit_id', '=', 'produits.id')
                    ->join('commandes', 'commandes.id', '=', 'commande_produit.commande_id')
                    ->where('produits.boutique_id', '=', $_SESSION['boutique_marchand_id'])
                    ->where('marchands.id_utilisateur', '=', $user->id)
                    ->whereBetween('commandes.created_at',  [Carbon::now()->startOfWeek(Carbon::SUNDAY),      Carbon::now()->endOfWeek (Carbon::SATURDAY)])
                    ->where('commandes.status', '=', 2)
                    ->select('commande_produit.commande_id')
                    ->distinct('commande_produit.commande_id')
                    ->count('commande_produit.commande_id');

                    $commande_recu = DB::table('produits')
                    ->join('boutiques', 'boutiques.id', '=',  'produits.boutique_id')
                    ->join('marchands', 'marchands.id', '=', 'boutiques.id_marchand')
                    ->join('commande_produit', 'commande_produit.produit_id', '=', 'produits.id')
                    ->join('commandes', 'commandes.id', '=', 'commande_produit.commande_id')
                    ->where('produits.boutique_id', '=', $_SESSION['boutique_marchand_id'])
                    ->where('marchands.id_utilisateur', '=', $user->id)
                    ->whereBetween('commandes.created_at',  [Carbon::now()->startOfWeek(Carbon::SUNDAY),      Carbon::now()->endOfWeek (Carbon::SATURDAY)])
                    ->where('commandes.status', '=', 1)
                    ->select('commande_produit.commande_id')
                    ->distinct('commande_produit.commande_id')
                    ->count('commande_produit.commande_id');


                    $Commandes_effectuer = DB::table('produits')
                    ->join('boutiques', 'boutiques.id', '=',  'produits.boutique_id')
                    ->join('marchands', 'marchands.id', '=', 'boutiques.id_marchand')
                    ->join('commande_produit', 'commande_produit.produit_id', '=', 'produits.id')
                    ->join('commandes', 'commandes.id', '=', 'commande_produit.commande_id')
                    ->where('produits.boutique_id', '=', $_SESSION['boutique_marchand_id'])
                    ->where('marchands.id_utilisateur', '=', $user->id)
                    ->whereBetween('commandes.created_at',  [Carbon::now()->startOfWeek(Carbon::SUNDAY),      Carbon::now()->endOfWeek (Carbon::SATURDAY)])
                    ->where('commandes.status', '=', 3)
                    ->select('commande_produit.commande_id')
                    ->distinct('commande_produit.commande_id')
                    ->count('commande_produit.commande_id');


                    $Commande_annulled = DB::table('produits')
                    ->join('boutiques', 'boutiques.id', '=',  'produits.boutique_id')
                    ->join('marchands', 'marchands.id', '=', 'boutiques.id_marchand')
                    ->join('commande_produit', 'commande_produit.produit_id', '=', 'produits.id')
                    ->join('commandes', 'commandes.id', '=', 'commande_produit.commande_id')
                    ->where('produits.boutique_id', '=', $_SESSION['boutique_marchand_id'])
                    ->where('marchands.id_utilisateur', '=', $user->id)
                    ->whereBetween('commandes.created_at',  [Carbon::now()->startOfWeek(Carbon::SUNDAY),      Carbon::now()->endOfWeek (Carbon::SATURDAY)])
                    ->where('commandes.status', '=', 4)
                    ->select('commande_produit.commande_id')
                    ->distinct('commande_produit.commande_id')
                    ->count('commande_produit.commande_id');

                     //---------------------------GRAPH WEEK--------------------------------------------------


                     $produit_graph = DB::table('produits')
                     ->join('boutiques', 'boutiques.id', '=',  'produits.boutique_id')
                     ->join('marchands', 'marchands.id', '=', 'boutiques.id_marchand')
                     ->where('produits.boutique_id', '=', $_SESSION['boutique_marchand_id'])
                     ->where('marchands.id_utilisateur', '=', $user->id)
                     ->whereBetween('produits.created_at',  [Carbon::now()->startOfWeek(Carbon::SUNDAY), Carbon::now()->endOfWeek (Carbon::SATURDAY)])
                     ->select('produits.quantite')
                     ->get();



                    $commandes_recu_graph =DB::table('produits')
                    ->join('boutiques', 'boutiques.id', '=',  'produits.boutique_id')
                    ->join('marchands', 'marchands.id', '=', 'boutiques.id_marchand')
                    ->join('commande_produit', 'commande_produit.produit_id', '=', 'produits.id')
                    ->join('commandes', 'commandes.id', '=', 'commande_produit.commande_id')
                    ->where('produits.boutique_id', '=', $_SESSION['boutique_marchand_id'])
                    ->where('marchands.id_utilisateur', '=', $user->id)
                    ->whereBetween('commandes.created_at', [Carbon::now()->startOfWeek(Carbon::SUNDAY), Carbon::now()->endOfWeek (Carbon::SATURDAY)])
                    ->where('commandes.status', '=', 1)
                    ->select('commande_produit.commande_id')
                    ->distinct('commande_produit.commande_id')
                    ->count('commande_produit.commande_id');


                    // FIGHT TO FIND THIS REQUETE TONIGHT

                    // $commandes_recu_graph =DB::table('produits')
                    // ->join('boutiques', 'boutiques.id', '=',  'produits.boutique_id')
                    // ->join('marchands', 'marchands.id', '=', 'boutiques.id_marchand')
                    // ->join('commande_produit', 'commande_produit.produit_id', '=', 'produits.id')
                    // ->join('commandes', 'commandes.id', '=', 'commande_produit.commande_id')
                    // ->where('produits.boutique_id', '=', $_SESSION['boutique_marchand_id'])
                    // ->where('marchands.id_utilisateur', '=', $user->id)
                    // ->where('commandes.status', '=', 1)
                    // ->distinct('commande_produit.commande_id')
                    // ->whereBetween('commandes.created_at', [Carbon::now()->startOfWeek(Carbon::SUNDAY), Carbon::now()->endOfWeek (Carbon::SATURDAY)])
                    // ->select('commande_produit.commande_id',  DB::raw('DATE(commandes.created_at) as day'))
                    // ->groupBy('day')
                    // ->get();




                    $Commandes_effectuer_graph = DB::table('produits')
                    ->join('boutiques', 'boutiques.id', '=',  'produits.boutique_id')
                    ->join('marchands', 'marchands.id', '=', 'boutiques.id_marchand')
                    ->join('commande_produit', 'commande_produit.produit_id', '=', 'produits.id')
                    ->join('commandes', 'commandes.id', '=', 'commande_produit.commande_id')
                    ->where('produits.boutique_id', '=', $_SESSION['boutique_marchand_id'])
                    ->where('marchands.id_utilisateur', '=', $user->id)
                    ->whereBetween('commandes.created_at',  [Carbon::now()->startOfWeek(Carbon::SUNDAY),      Carbon::now()->endOfWeek (Carbon::SATURDAY)])
                    ->where('commandes.status', '=', 3)
                    ->select('commande_produit.commande_id')
                    ->distinct('commande_produit.commande_id')
                    ->count('commande_produit.commande_id');



                    //---------------------------------PRODUIT SORTANT GRAPH--------------------------------------------------------------

                    $soldProduct_outing = DB::table('produits')
                    ->join('boutiques', 'boutiques.id', '=',  'produits.boutique_id')
                    ->join('marchands', 'marchands.id', '=', 'boutiques.id_marchand')
                    ->join('commande_produit', 'commande_produit.produit_id', '=', 'produits.id')
                    ->join('commandes', 'commandes.id', '=', 'commande_produit.commande_id')
                    ->where('produits.boutique_id', '=', $_SESSION['boutique_marchand_id'])
                    ->where('marchands.id_utilisateur', '=', $user->id)
                    ->whereBetween('commandes.created_at',  [Carbon::now()->startOfWeek(Carbon::SUNDAY), Carbon::now()->endOfWeek (Carbon::SATURDAY)])
                    ->where('commandes.status', '=', 3)
                    ->select('produits.quantite')
                    ->get('produits.quantite');

                    //-----------------------------------------------------------------------------------------------



                }else if($id == 3){


                    //-----------------------------------------------echo 'month--------------------------------------'

                    $statF = DB::table('produits')
                    ->join('boutiques', 'boutiques.id', '=',  'produits.boutique_id')
                    ->join('marchands', 'marchands.id', '=', 'boutiques.id_marchand')
                    ->where('produits.boutique_id', '=', $_SESSION['boutique_marchand_id'])
                    ->where('marchands.id_utilisateur', '=', $user->id)
                    ->whereMonth('produits.created_at', Carbon::now()->month) //'07' | Carbon::now()->month
                    ->select('produits.quantite')
                    ->sum('produits.quantite');


                    $soldProduct = DB::table('produits')
                    ->join('boutiques', 'boutiques.id', '=',  'produits.boutique_id')
                    ->join('marchands', 'marchands.id', '=', 'boutiques.id_marchand')
                    ->join('commande_produit', 'commande_produit.produit_id', '=', 'produits.id')
                    ->join('commandes', 'commandes.id', '=', 'commande_produit.commande_id')
                    ->where('produits.boutique_id', '=', $_SESSION['boutique_marchand_id'])
                    ->where('marchands.id_utilisateur', '=', $user->id)
                    ->where('commandes.status', '=', 3)
                    ->whereMonth('commandes.created_at', '=', Carbon::now()->month)
                    ->select('produits.quantite')
                    ->sum('produits.quantite');


                    $Commande_en_cours = DB::table('produits')
                    ->join('boutiques', 'boutiques.id', '=',  'produits.boutique_id')
                    ->join('marchands', 'marchands.id', '=', 'boutiques.id_marchand')
                    ->join('commande_produit', 'commande_produit.produit_id', '=', 'produits.id')
                    ->join('commandes', 'commandes.id', '=', 'commande_produit.commande_id')
                    ->where('produits.boutique_id', '=', $_SESSION['boutique_marchand_id'])
                    ->where('marchands.id_utilisateur', '=', $user->id)
                    ->whereMonth('commandes.created_at', '=', Carbon::now()->month)
                    ->where('commandes.status', '=', 2)
                    ->select('commande_produit.commande_id')
                    ->distinct('commande_produit.commande_id')
                    ->count('commande_produit.commande_id');


                    $commande_recu = DB::table('produits')
                    ->join('boutiques', 'boutiques.id', '=',  'produits.boutique_id')
                    ->join('marchands', 'marchands.id', '=', 'boutiques.id_marchand')
                    ->join('commande_produit', 'commande_produit.produit_id', '=', 'produits.id')
                    ->join('commandes', 'commandes.id', '=', 'commande_produit.commande_id')
                    ->where('produits.boutique_id', '=', $_SESSION['boutique_marchand_id'])
                    ->where('marchands.id_utilisateur', '=', $user->id)
                    ->whereMonth('commandes.created_at', '=', Carbon::now()->month)
                    ->where('commandes.status', '=', 1)
                    ->select('commande_produit.commande_id')
                    ->distinct('commande_produit.commande_id')
                    ->count('commande_produit.commande_id');


                    $Commandes_effectuer = DB::table('produits')
                    ->join('boutiques', 'boutiques.id', '=',  'produits.boutique_id')
                    ->join('marchands', 'marchands.id', '=', 'boutiques.id_marchand')
                    ->join('commande_produit', 'commande_produit.produit_id', '=', 'produits.id')
                    ->join('commandes', 'commandes.id', '=', 'commande_produit.commande_id')
                    ->where('produits.boutique_id', '=', $_SESSION['boutique_marchand_id'])
                    ->where('marchands.id_utilisateur', '=', $user->id)
                    ->whereMonth('commandes.created_at', '=', Carbon::now()->month)
                    ->where('commandes.status', '=', 3)
                    ->select('commande_produit.commande_id')
                    ->distinct('commande_produit.commande_id')
                    ->count('commande_produit.commande_id');


                    $Commande_annulled = DB::table('produits')
                    ->join('boutiques', 'boutiques.id', '=',  'produits.boutique_id')
                    ->join('marchands', 'marchands.id', '=', 'boutiques.id_marchand')
                    ->join('commande_produit', 'commande_produit.produit_id', '=', 'produits.id')
                    ->join('commandes', 'commandes.id', '=', 'commande_produit.commande_id')
                    ->where('produits.boutique_id', '=', $_SESSION['boutique_marchand_id'])
                    ->where('marchands.id_utilisateur', '=', $user->id)
                    ->whereMonth('commandes.created_at', '=', Carbon::now()->month)
                    ->where('commandes.status', '=', 4)
                    ->select('commande_produit.commande_id')
                    ->distinct('commande_produit.commande_id')
                    ->count('commande_produit.commande_id');

                    //------------------------------GRAPH MOIS---------------------------

                    $produit_graph = DB::table('produits')
                    ->join('boutiques', 'boutiques.id', '=',  'produits.boutique_id')
                    ->join('marchands', 'marchands.id', '=', 'boutiques.id_marchand')
                    ->where('produits.boutique_id', '=', $_SESSION['boutique_marchand_id'])
                    ->where('marchands.id_utilisateur', '=', $user->id)
                    ->whereMonth('produits.created_at', Carbon::now()->month)
                    ->select('produits.quantite')
                    ->sum('produits.quantite');



                    // $produit_graph = DB::table('produits')
                    // ->join('boutiques', 'boutiques.id', '=',  'produits.boutique_id')
                    // ->join('marchands', 'marchands.id', '=', 'boutiques.id_marchand')
                    // ->where('produits.boutique_id', '=', $_SESSION['boutique_marchand_id'])
                    // ->where('marchands.id_utilisateur', '=', $user->id)
                    // ->whereBetween('produits.created_at',[$dateS, $dateE])
                    // ->select('produits.quantite')
                    // ->get();



                    $commandes_recu_graph =DB::table('produits')
                    ->join('boutiques', 'boutiques.id', '=',  'produits.boutique_id')
                    ->join('marchands', 'marchands.id', '=', 'boutiques.id_marchand')
                    ->join('commande_produit', 'commande_produit.produit_id', '=', 'produits.id')
                    ->join('commandes', 'commandes.id', '=', 'commande_produit.commande_id')
                    ->where('produits.boutique_id', '=', $_SESSION['boutique_marchand_id'])
                    ->where('marchands.id_utilisateur', '=', $user->id)
                    ->whereMonth('commandes.created_at', Carbon::now()->month)
                    ->where('commandes.status', '=', 1)
                    ->select('commande_produit.commande_id')
                    ->distinct('commande_produit.commande_id')
                    ->count('commande_produit.commande_id');


                    $Commandes_effectuer_graph = DB::table('produits')
                    ->join('boutiques', 'boutiques.id', '=',  'produits.boutique_id')
                    ->join('marchands', 'marchands.id', '=', 'boutiques.id_marchand')
                    ->join('commande_produit', 'commande_produit.produit_id', '=', 'produits.id')
                    ->join('commandes', 'commandes.id', '=', 'commande_produit.commande_id')
                    ->where('produits.boutique_id', '=', $_SESSION['boutique_marchand_id'])
                    ->where('marchands.id_utilisateur', '=', $user->id)
                    ->whereMonth('commandes.created_at',  Carbon::now()->month)
                    ->where('commandes.status', '=', 3)
                    ->select('commande_produit.commande_id')
                    ->distinct('commande_produit.commande_id')
                    ->count('commande_produit.commande_id');



                    $soldProduct_outing = DB::table('produits')
                    ->join('boutiques', 'boutiques.id', '=',  'produits.boutique_id')
                    ->join('marchands', 'marchands.id', '=', 'boutiques.id_marchand')
                    ->join('commande_produit', 'commande_produit.produit_id', '=', 'produits.id')
                    ->join('commandes', 'commandes.id', '=', 'commande_produit.commande_id')
                    ->where('produits.boutique_id', '=', $_SESSION['boutique_marchand_id'])
                    ->where('marchands.id_utilisateur', '=', $user->id)
                    ->whereMonth('produits.created_at', Carbon::now()->month)
                    ->where('commandes.status', '=', 3)
                    ->select('produits.quantite')
                    ->sum('produits.quantite');
                    //->get();





                }else{
                    //echo 'today';
                    $statF = DB::table('produits')
                    ->join('boutiques', 'boutiques.id', '=',  'produits.boutique_id')
                    ->join('marchands', 'marchands.id', '=', 'boutiques.id_marchand')
                    ->where('produits.boutique_id', '=', $_SESSION['boutique_marchand_id'])
                    ->where('marchands.id_utilisateur', '=', $user->id)
                    ->whereDate('produits.created_at', '=', Carbon::today())
                    ->select('produits.quantite')
                    ->sum('produits.quantite');

                    $soldProduct = DB::table('produits')
                    ->join('boutiques', 'boutiques.id', '=',  'produits.boutique_id')
                    ->join('marchands', 'marchands.id', '=', 'boutiques.id_marchand')
                    ->join('commande_produit', 'commande_produit.produit_id', '=', 'produits.id')
                    ->join('commandes', 'commandes.id', '=', 'commande_produit.commande_id')
                    ->where('produits.boutique_id', '=', $_SESSION['boutique_marchand_id'])
                    ->where('marchands.id_utilisateur', '=', $user->id)
                    ->whereDate('commandes.created_at', '=', Carbon::today())
                    ->where('commandes.status', '=', 3)
                    ->select('produits.quantite')
                    ->sum('produits.quantite');


                    $Commande_en_cours = DB::table('produits')
                    ->join('boutiques', 'boutiques.id', '=',  'produits.boutique_id')
                    ->join('marchands', 'marchands.id', '=', 'boutiques.id_marchand')
                    ->join('commande_produit', 'commande_produit.produit_id', '=', 'produits.id')
                    ->join('commandes', 'commandes.id', '=', 'commande_produit.commande_id')
                    ->where('produits.boutique_id', '=', $_SESSION['boutique_marchand_id'])
                    ->where('marchands.id_utilisateur', '=', $user->id)
                    ->whereDate('commandes.created_at', '=', Carbon::today())
                    ->where('commandes.status', '=', 2)
                    ->select('commande_produit.commande_id')
                    ->distinct('commande_produit.commande_id')
                    ->count('commande_produit.commande_id');


                    $commande_recu = DB::table('produits')
                    ->join('boutiques', 'boutiques.id', '=',  'produits.boutique_id')
                    ->join('marchands', 'marchands.id', '=', 'boutiques.id_marchand')
                    ->join('commande_produit', 'commande_produit.produit_id', '=', 'produits.id')
                    ->join('commandes', 'commandes.id', '=', 'commande_produit.commande_id')
                    ->where('produits.boutique_id', '=', $_SESSION['boutique_marchand_id'])
                    ->where('marchands.id_utilisateur', '=', $user->id)
                    ->whereDate('commandes.created_at', '=', Carbon::today())
                    ->where('commandes.status', '=', 1)
                    ->select('commande_produit.commande_id')
                    ->distinct('commande_produit.commande_id')
                    ->count('commande_produit.commande_id');


                    $Commandes_effectuer = DB::table('produits')
                    ->join('boutiques', 'boutiques.id', '=',  'produits.boutique_id')
                    ->join('marchands', 'marchands.id', '=', 'boutiques.id_marchand')
                    ->join('commande_produit', 'commande_produit.produit_id', '=', 'produits.id')
                    ->join('commandes', 'commandes.id', '=', 'commande_produit.commande_id')
                    ->where('produits.boutique_id', '=', $_SESSION['boutique_marchand_id'])
                    ->where('marchands.id_utilisateur', '=', $user->id)
                    ->whereDate('commandes.created_at', '=', Carbon::today())
                    ->where('commandes.status', '=', 3)
                    ->select('commande_produit.commande_id')
                    ->distinct('commande_produit.commande_id')
                    ->count('commande_produit.commande_id');


                    $Commande_annulled = DB::table('produits')
                    ->join('boutiques', 'boutiques.id', '=',  'produits.boutique_id')
                    ->join('marchands', 'marchands.id', '=', 'boutiques.id_marchand')
                    ->join('commande_produit', 'commande_produit.produit_id', '=', 'produits.id')
                    ->join('commandes', 'commandes.id', '=', 'commande_produit.commande_id')
                    ->where('produits.boutique_id', '=', $_SESSION['boutique_marchand_id'])
                    ->where('marchands.id_utilisateur', '=', $user->id)
                    ->whereDate('commandes.created_at', '=', Carbon::today())
                    ->where('commandes.status', '=', 4)
                    ->select('commande_produit.commande_id')
                    ->distinct('commande_produit.commande_id')
                    ->count('commande_produit.commande_id');


                     //------------------------------GRAPH JOUR---------------------------



                    //  $produit_graph = DB::table('produits')
                    //  ->join('boutiques', 'boutiques.id', '=',  'produits.boutique_id')
                    //  ->join('marchands', 'marchands.id', '=', 'boutiques.id_marchand')
                    //  ->where('produits.boutique_id', '=', $_SESSION['boutique_marchand_id'])
                    //  ->where('marchands.id_utilisateur', '=', $user->id)
                    //  ->whereDate('produits.created_at', Carbon::today())
                    //  ->select('produits.quantite')
                    //  ->count('produits.quantite');


                     $produit_graph = DB::table('produits')
                    ->join('boutiques', 'boutiques.id', '=',  'produits.boutique_id')
                    ->join('marchands', 'marchands.id', '=', 'boutiques.id_marchand')
                    ->where('produits.boutique_id', '=', $_SESSION['boutique_marchand_id'])
                    ->where('marchands.id_utilisateur', '=', $user->id)
                    ->whereDate('produits.created_at', '=', Carbon::today())
                    ->whereBetween('produits.created_at',[$start, $end])
                    ->select('produits.quantite', 'produits.created_at' )
                    ->get();




                    $commandes_recu_graph =DB::table('produits')
                    ->join('boutiques', 'boutiques.id', '=',  'produits.boutique_id')
                    ->join('marchands', 'marchands.id', '=', 'boutiques.id_marchand')
                    ->join('commande_produit', 'commande_produit.produit_id', '=', 'produits.id')
                    ->join('commandes', 'commandes.id', '=', 'commande_produit.commande_id')
                    ->where('produits.boutique_id', '=', $_SESSION['boutique_marchand_id'])
                    ->where('marchands.id_utilisateur', '=', $user->id)
                    ->whereDate('commandes.created_at', Carbon::today())
                    ->where('commandes.status', '=', 1)
                    ->select('commande_produit.commande_id')
                    ->distinct('commande_produit.commande_id')
                    ->count('commande_produit.commande_id');


                    $Commandes_effectuer_graph = DB::table('produits')
                    ->join('boutiques', 'boutiques.id', '=',  'produits.boutique_id')
                    ->join('marchands', 'marchands.id', '=', 'boutiques.id_marchand')
                    ->join('commande_produit', 'commande_produit.produit_id', '=', 'produits.id')
                    ->join('commandes', 'commandes.id', '=', 'commande_produit.commande_id')
                    ->where('produits.boutique_id', '=', $_SESSION['boutique_marchand_id'])
                    ->where('marchands.id_utilisateur', '=', $user->id)
                    ->whereDate('commandes.created_at',  Carbon::today())
                    ->where('commandes.status', '=', 3)
                    ->select('commande_produit.commande_id')
                    ->distinct('commande_produit.commande_id')
                    ->count('commande_produit.commande_id');


                    $soldProduct_outing = DB::table('produits')
                    ->join('boutiques', 'boutiques.id', '=',  'produits.boutique_id')
                    ->join('marchands', 'marchands.id', '=', 'boutiques.id_marchand')
                    ->join('commande_produit', 'commande_produit.produit_id', '=', 'produits.id')
                    ->join('commandes', 'commandes.id', '=', 'commande_produit.commande_id')
                    ->where('produits.boutique_id', '=', $_SESSION['boutique_marchand_id'])
                    ->where('marchands.id_utilisateur', '=', $user->id)
                    ->whereDate('commandes.created_at',  Carbon::today())
                    ->where('commandes.status', '=', 3)
                    ->select('produits.quantite')
                    ->sum('produits.quantite');


                }
        }

        return response()->json([
            'boutique_created'=> $boutique_created,
            'status'=>200,
            'filter'=> $statF,
            'sold'=> $soldProduct,
            'commande_encours'=> $Commande_en_cours,
            'commande_recu'=> $commande_recu,
            'commande_effectuer'=>   $Commandes_effectuer,
            'commande_annulled'=>   $Commande_annulled,
            'produits_entrant_graph'=>  $produit_graph,
            'commande_graph'=>  $commandes_recu_graph,
            'commande_effectuer_graph'=> $Commandes_effectuer_graph,
            'produit_sortant_graph'=>$soldProduct_outing,

        ]);

    }




    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $sousCategories = SousCategorie::possibles();

        $data = [
            'sousCategories' => $sousCategories,
            'page' => [
                'title' => 'Ajouter un produit'
            ]
        ];

        return response()->view('back.app-modules.add-produit', $data);

    }

    public function photoUpload(Request $request) {
        // $photo_array = array();
        $_SESSION['photo_produit'] = array();
        $photo_produit = $request->file('produit_photo');
        $filename = time().'_'.$photo_produit->getClientOriginalName();
        $_SESSION['productP'][] = $filename;
        // array_push( $_SESSION['photo_produit'], $filename);
        return  $_SESSION;
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    // Enregistrement et referencement du produit
    public function store(Request $request)
    {

        // $image_principal = 'default.png';

        $latestProdRef = Produit::orderBy('created_at','DESC')->first();
        $ref_product = 'TM-'.str_pad($latestProdRef->id + 1, 10, "0", STR_PAD_LEFT);
        $image_etage = 11111; // default au cas une image étagère n'est pas présent
        $destination_images = 'uploads/';
        $image_principal_fini = "";

        if ($request->image_etagere != "") {
            $image_etage = $request->image_etagere;
        }
        // ----------------------------taritement image principal -----------------------------------
        // image_principal
        if (str_contains($request->image_principal, 'https://')) {
            $image_name = uniqid();
            $supp_digit = rand ( 10000 , 99999 ); //ajout des nombres pour sur le nom pour le distinguer un peu plus
            $extension = pathinfo($request->image_principal, PATHINFO_EXTENSION);
            // get file content from url
            $image_principal_fini = $destination_images . $image_name . $supp_digit;
            $file = file_get_contents($request->image_principal);
            $save_from_url = file_put_contents($image_principal_fini, $file);
        }else{
            $image_name = uniqid();
            $supp_digit = rand ( 10000 , 99999 ); //ajout des nombres pour sur le nom pour le distinguer un peu plus
            $image_principal_fini = $destination_images . $image_name . $supp_digit;

            $image_parts = explode(";base64,", $request->image_principal);
            $image_type_aux = explode("image/", $image_parts[0]);
            // $image_type = $image_type_aux[1];
            $image_base64 = base64_decode($image_parts[1]);
            file_put_contents($image_principal_fini, $image_base64);
        }

        // -------------------------- produit ------------------------
        $produit_object = [
            'libelle' => $request->libelle_produit,
            'id_rayon' => $request->rayon_produit,
            'id_famille' => $request->produit_categorie,
            'image_etagere' => $image_etage,
            'image' => $image_principal_fini,
            'description' => $request->description,
            'prix' => $request->prix_achat,
            'quantite' => $request->quantite_disponible, //debut info_supp
            'boutique_id' => $_SESSION['boutique_marchand_id'],
            'ref_produit' => $ref_product,
            'sous_categorie_id' => $request->id_sous_categorie,
            'vente_en_lot' => $request->vente_en_lot,
            'nbre_par_lot' => $request->nbre_produit_lot,
            'video_preview' => $request->video_preview_product,
            'position_sur_etagere' => $request->position_sur_etagere,
            'numero_slide' => $request->numero_slide_etagere,
            'numero_ligne_slide' => $request->numero_slide_ligne,
            'taille_sur_etagere'=> $request->taille_sur_etagere
        ];

        $produit = Produit::create($produit_object);

        // --------------------------- caracteristique ---------------------------
        if($request->has('caracteristique_normal')) {
            $caracteristique_normal = $request->caracteristique_normal;
            if (count($caracteristique_normal) > 0) {
                foreach ($caracteristique_normal as $val) {
                    $caracteristique_produit =  [
                        'id_produit' => $produit->id,
                        'id_caracteristique_valeur' =>  $val,
                    ];
                    $produit_caract_insert = ProduitCaracteristiqueValeur::create($caracteristique_produit);
                }
            }
        }

        // ------------------------------- produits images ---------------------------------
        $crop_destination = 'uploads/';

        $https_array = [];
        $input_files = [];
        if($produit instanceof Produit) {
            if ($request->tableau_images != null && count($request->tableau_images) > 0) {
            foreach($request->tableau_images as $img) {
            if (str_contains($img, 'https://')) {  // s 'il s-ageit d_une url depuis le web
            //    ---------------- zone https  --------------------
            $image_name = uniqid();
            $supp_digit = rand ( 10000 , 99999 ); //ajout des nombres pour sur le nom pour le distinguer un peu plus
            $extension = pathinfo($img, PATHINFO_EXTENSION);
                // get file content from url
            $imageFullPath1 = $crop_destination . $image_name . $supp_digit;
            $file = file_get_contents($img);
            $save_from_url = file_put_contents($imageFullPath1, $file);

            $produit->produitImages()->create(
                [
                    'image' =>  $imageFullPath1,
                    'origine_image' => 'local'
                ]
            );
            }else {
            // zone file normal for uploads
            $image_name = uniqid();
            $supp_digit = rand ( 10000 , 99999 ); //ajout des nombres pour sur le nom pour le distinguer un peu plus
            $imageFullPath2 = $crop_destination . $image_name . $supp_digit;

            $image_parts = explode(";base64,", $img);
            $image_type_aux = explode("image/", $image_parts[0]);

            // $image_type = $image_type_aux[1];
            $image_base64 = base64_decode($image_parts[1]);

            file_put_contents($imageFullPath2, $image_base64);
            $produit->produitImages()->create(
                    [
                        'image' =>  $imageFullPath2,
                        'origine_image' => 'local'
                    ]
                );
            }
            }
            }


            if($request->has('pays_exclu')) {
                $pays_sous_exclusion = $request->pays_exclu;
                if (count($pays_sous_exclusion) > 0) {
                # code...
                foreach($request->pays_exclu as $key => $value) {
                    $produit->produitPaysExclu()->create(
                    [
                        'pays' =>  $value
                    ]
                    );
                }
                }
            }
        }

        // ------------------------- mode d'expedition ok --------------------------------
        if($request->has('tableau_moyens_expedition')) {
            $tableau_moyens_expedition = $request->tableau_moyens_expedition;
            if (count($tableau_moyens_expedition) > 0) {
                foreach($tableau_moyens_expedition as $exp) {

                $expedition = [
                    'id_expedition' => $exp['mode'],
                    'produit_id' => $produit->id,
                    'paye_par'=> $exp['payeur'],
                    'prix' => $exp['prix']
                ];
                $sendExpedition = ProduitExpedition::create($expedition);

                }
            }

        }

        if($request->has('negociation_produit')) {
            $negociation_produit = $request->negociation_produit;
            if (count($negociation_produit) > 0) {
                foreach ($request->negociation_produit as $negociation) {

                $negociation =  [
                    'produit_id' => $produit->id,
                    'type_negociation' => $negociation['type_negociation'],
                    'valeur' => $negociation['montant']
                ];

                $negociationProduit = ProduitNegociationInterval::create($negociation);

                }
            }
        }

        if($request->has('achat_multiple_produit')) {
            $achat_multiple_produit = $request->achat_multiple_produit;
            if (count($achat_multiple_produit) > 0) {
                foreach ($achat_multiple_produit as $achat) {
                    $produit_achat_multiple = [
                        'produit_id' => $produit->id,
                        'nombre_produits' => $achat['nombre_produit'],
                        'pourcentage' => $achat['pourcentage'],
                    ];

                    $achat_multiple = ProduitAchatMultiple::create($produit_achat_multiple);
                }
            }
        }

        // ------------------------ Negociation produit --------------------

        // retour national et international
        if($request->has('retour_national')) {
            $retour_national = $request->retour_national;
            if (count($retour_national) > 0) {
                $option_retour_national = [
                    'produit_id' => $produit->id,
                    'type_retour' => 'national',
                    'nombre_jours' => $request->retour_national[0],
                    'payee_par' => $request->retour_national[1],
                ];

                $option_retour = ProduitOptionsRetour::create($option_retour_national);
            }
        }

        if($request->has('retour_international')) {
            $retour_international = $request->retour_international;
            if (count($retour_international) > 0) {
                $option_retour_international = [
                    'produit_id' => $produit->id,
                    'type_retour' => 'international',
                    'nombre_jours' => $request->retour_international[0],
                    'payee_par' => $request->retour_international[1],
                ];

                $option_retour = ProduitOptionsRetour::create($option_retour_international);
            }
        }

         // ------------------------- mode d'expedition --------------------------------
         if($request->has('caracteristique_supplementaire')) {
            $caracteristique_supplementaire = $request->caracteristique_supplementaire;
            if (count($caracteristique_supplementaire) > 0) {
                foreach($request->caracteristique_supplementaire as $caracteristique_supp) {
                    DB::insert('insert into tm_produit_caracteristiques (valeur, produit_id) values (?, ?)', [$caracteristique_supp, $produit->id]);
                }
            }
         }

         if(count((array)$request->caracteristique_categorie)) {

            foreach($request->caracteristique_categorie as $key => $value) {

                $caracteristique = BoutiqueProduitCaracteristique::create([
                    'id_boutique' => $_SESSION['boutique_marchand_id'],
                    'libelle' => $key,
                ]);

                $caracteristique_id =  $caracteristique->id;
                $caracteristique_valeurs = BoutiqueProduitCarValeur::create([
                    'idBoutiqueCarValeur' => $caracteristique_id,
                    'valeur' => $value,
                ]);

                DB::insert('insert into tm_produit_caracteristiques (valeur, produit_id) values (?, ?)', [$caracteristique_valeurs->id, $produit->id]);

                // return "$key => $value\n";
            }
            // return $request->caracteristique_categorie;
         }

        if($produit) {
            $caracteristique_supp = new CaracteristiqueController();
            $caracteristique_supp_data = $caracteristique_supp->caracteristique_supplementaire($produit->id);
            return response()->json(['status' => 200, 'produit' => $produit, 'caracteristique_supp' => $caracteristique_supp_data]);
        }else {
            return 'error';
        }
        // return $request;

    }

    public function marchandBoutiqueProduit() {

        $marchand_boutique_produit =
        DB::table('produits')
        ->join('images_etageres', 'produits.image_etagere', '=', 'images_etageres.id')
        ->where('boutique_id', $_SESSION['boutique_marchand_id'])
        ->where('id_rayon', 7)
        ->where('deleted', 0)
        ->select('produits.*', 'images_etageres.path')
        ->get();

        return $marchand_boutique_produit;

    }

    public function getModeExpedition(Request $request) {
       if($request->has('tab') && count($request->tab) > 0){
            $data = DB::table('expedition')
                    ->where('type_expedition', $request->mode_expedition)
                    ->whereNotIn('id', $request->tab)->get();
                    return $data;
       }else {
        $data = DB::table('expedition')
                    ->where('type_expedition', $request->mode_expedition)
                    ->get();
        return $data;
       }
    }

    // pour la modification du mode d'expedition
    public function getModeExpeditionModification(Request $request) {
        $data = DB::select('SELECT * FROM tm_expedition WHERE id != "'.$request->mode_expedition.'" AND type_expedition="National"');
        return $data;
    }

    function getCaract($id_produit) {

            $caracteristique = ProduitCaracteristiqueValeur::where('id_produit', $id_produit)->get();
            $caracteristique_final = [];
            foreach($caracteristique as $c){

                $valeur = CaracteristiqueValeurs::where('id', $c->id_caracteristique_valeur)->get();

                if (count($valeur) > 0) {
                    $caracteristique_libelle = Caracteristique::where('id', $valeur[0]->caracteristique_id)->get();
                    if (count($caracteristique_libelle) > 0) {
                        $caracteristique_final[] = $valeur[0]->valeur;
                    }
                }

            }
            // return $this->hasMany(ProduitCaracteristiqueValeur::class, 'id_produit');
            return $caracteristique_final;

    }

    // recuperation des produit de la même catégie filtrée
    public function getCategorieAllProduct(Request $request) {
        // return $request;
        $divided_libelle = explode(" ", $request->libelle);
        $sous_categories_produit = Produit::where('id_famille', $request->id_categorie)
        ->where('libelle', 'LIKE', "%{$divided_libelle[0]}%")
        ->get();

        // $produit_array = [];
        // foreach ($sous_categories_produit as $p) {
        //     $produit_array[] = $p;
        //     $produit_array[] = $this->getCaract($p->id);
        // }
        return $sous_categories_produit;
        // return $sous_categories_produit;
    }

    public function getSingleModeExpedition(Request $request, $id){
        $mode_expedition = DB::select('SELECT * FROM tm_expedition WHERE id = "'.$id.'"');
        return $mode_expedition;
    }

    public function saveProductImages() {
        $tab_photo = array();
       foreach($_SESSION['productP'] as $photo) {
        // $tab_photo[] = $photo;
        $produit =  Produit::find(9);
        $produit->produitImages()->create(
            [
                'image' => $photo
            ]);
       }

       return "success";

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Produit  $produit
     * @return \Illuminate\Http\Response
     */
    public function show(Produit $produit)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Produit  $produit
     * @return \Illuminate\Http\Response
     */
    public function edit(Produit $produit)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Produit  $produit
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Produit $produit)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Produit  $produit
     * @return \Illuminate\Http\Response
     */
    public function destroy(Produit $produit)
    {
        //
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function recherche(Request $request, $univer_id = null)
    {

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


    public function searchInRayon(Request $request, $id, $univer_id = null)
    {
        $tableau_des_mots = explode(' ', $request['value']);

        try {
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
            )->where('libelle', 'LIKE', '%'. htmlspecialchars($request['value']) .'%')
            ->where('id_rayon', $id)
            ->where('deleted', 0)
            ->skip(0)
            ->take(10)
            ->get();

        if (count($produits) == 0 && count($tableau_des_mots) > 1) {

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
            ->get();

            $data = [
                'resultats' => $produits,
                'requete' => $request->all(),
                'in_rayon' => 1,
                'rayon_id' => $id,
                'error' => 0
            ];

        }else {
            $data = [
                'resultats' => $produits,
                'requete' => $request->all(),
                'in_rayon' => 1,
                'rayon_id' => $id,
                'error' => 0
            ];
        }
            // $data = [
            //     'resultats' => $produits,
            //     'requete' => $request->all(),
            //     'in_rayon' => 1,
            //     'rayon_id' => $id,
            //     'error' => 0
            // ];
        }
        catch (\Exception $exception){
            $data = [
                'error-text' => $exception->getMessage(),
                'resultats' => [],
                'error' => 1
            ];
        }

        return response()->json([$data]);
    }

    // search sous categorie
    public function rechercheSousCategorie(Request $request)
    {

        $results = Search::add(SousCategorie::class, 'libelle')
                        ->search($request->valeurR);

        return response()->json($results);

    }

    public function suggestProduct(Request $request) {

        $data = Produit::where('libelle', 'like', '%'.$request->valeurR.'%')
                ->skip(0)
                ->take(10)
                ->where('deleted', '<>', 1)
                ->get();
        return $data;
    }

    public function scopeFilter($query, array $filtes) {
        $query->when(
            $filters['search'] ?? false,
            fn ($query, $search) =>
            $query
             ->whereHas('users', function ($query) use ($search) {
                return $query
                    ->where('name', 'like', '%'.$search.'%');
             })
             ->orwhere('caption', 'like', '%'.$search.'%')
             ->orwhere('description', 'like', '%'.$search.'%')
             ->orwhere('id', $search)
            );
    }

    // description in two tables
    public function searchProductSousCat($value) {
        $data = Produit::join('SousCategorie', 'SousCategorie.id', 'Produit.sous_categorie_id')
                        ->where('libelle', 'like', '%'.$value.'%')
                        ->get();
        return $data;
    }

    public function search1($keyword) {
        $results = DB::query('SELECT id, libelle FROM (
            SELECT id, libelle FROM `tm_produit` where `libelle` LIKE "%'.$keyword.'%" OR `slug` LIKE "%'.$keyword.'%"
            UNION ALL
            SELECT id, libelle FROM `tm_sous_categorie` where `libelle` LIKE "%'.$keyword.'%" OR `description` LIKE "%'.$keyword.'%"
            ) temp_table
            ORDER BY `id` desc
            LIMIT 0, 10
        ');

        return $results;
    }

    // from here we can get the attribute;
    public function getCaracteristique(Request $request){
        $caracteristiques = DB::select('select * from tm_sous_categorie_caracteristiques where sous_categorie_id = ?', [$request->idCar]);
        $table_caracteristique = [];
        if (count($caracteristiques) > 0) {

            foreach ($caracteristiques as $caract) {

                $caracteristique = Caracteristique::find($caract->caracteristique_id);
                if (!is_null($caracteristique)) {
                    $table_caracteristique_valeur = [];
                    $valeurs = DB::select('select * from tm_caracteristique_valeurs where caracteristique_id = ?', [$caracteristique->id]);

                        foreach($valeurs as $val) {
                            $options = "<option>".$val->valeur."</option>";
                            $table_caracteristique_valeur[] = $options;
                        }

                    $label = $caracteristique->libelle;
                    $table_caracteristique[$label] = $table_caracteristique_valeur;
                }
            }

        }

        return response()->json($table_caracteristique);

    }

        // recuperation des caracteristiques par rapports au rayon;
        public function getCaracteristiqueRayon(Request $request){

            $caracteristiques = DB::table('rayons')
            ->join('rayon_caracteristique_valeurs', 'rayon_caracteristique_valeurs.rayon_id', '=', 'rayons.id')
            ->join('caracteristiques', 'caracteristiques.id', '=', 'rayon_caracteristique_valeurs.caracteristique_id')
            ->join('valeur_caracteristiques', 'valeur_caracteristiques.id', '=', 'rayon_caracteristique_valeurs.valeur_id')
            ->select('rayon_caracteristique_valeurs.*', 'caracteristiques.libelle')
            ->where('rayon_caracteristique_valeurs.rayon_id', $request->idCar)
            ->groupBy('rayon_caracteristique_valeurs.caracteristique_id')
            ->get();

            $table_caracteristique = [];
            if (count($caracteristiques) > 0) {

                foreach ($caracteristiques as $caract) {

                    $caracteristique = Caracteristique::find($caract->caracteristique_id);
                    if (!is_null($caracteristique)) {
                        $table_caracteristique_valeur = [];
                        // $valeurs = DB::select('select * from tm_caracteristique_valeurs where caracteristique_id = ?', [$caracteristique->id]);
                        $valeurs = DB::table('rayons')
                        ->join('rayon_caracteristique_valeurs', 'rayon_caracteristique_valeurs.rayon_id', '=', 'rayons.id')
                        ->join('caracteristiques', 'caracteristiques.id', '=', 'rayon_caracteristique_valeurs.caracteristique_id')
                        ->join('valeur_caracteristiques', 'valeur_caracteristiques.id', '=', 'rayon_caracteristique_valeurs.valeur_id')
                        ->select('valeur_caracteristiques.*')
                        ->where('rayon_caracteristique_valeurs.caracteristique_id', $caract->caracteristique_id)
                        ->where('rayon_caracteristique_valeurs.rayon_id', $caract->rayon_id)
                        ->get();
                            foreach($valeurs as $val) {
                                $options = "<option value=".$val->id.">".$val->libelle."</option>";
                                $table_caracteristique_valeur[] = $options;
                            }

                        $label = $caract->libelle;
                        $table_caracteristique[$label] = $table_caracteristique_valeur;
                    }
                }

            }

            return response()->json($table_caracteristique);
        }

        public function getCaracteristiqueRayonChanged(Request $request) {

            $caracteristiques = DB::table('rayons')
            ->join('rayon_caracteristique_valeurs', 'rayon_caracteristique_valeurs.rayon_id', '=', 'rayons.id')
            ->join('caracteristiques', 'caracteristiques.id', '=', 'rayon_caracteristique_valeurs.caracteristique_id')
            ->join('valeur_caracteristiques', 'valeur_caracteristiques.id', '=', 'rayon_caracteristique_valeurs.valeur_id')
            ->select('rayon_caracteristique_valeurs.*', 'caracteristiques.libelle')
            ->where('rayon_caracteristique_valeurs.rayon_id', $request->id)
            ->groupBy('rayon_caracteristique_valeurs.caracteristique_id')
            ->get();

            $table_caracteristique = [];
            if (count($caracteristiques) > 0) {

                foreach ($caracteristiques as $caract) {

                    $caracteristique = Caracteristique::find($caract->caracteristique_id);
                    if (!is_null($caracteristique)) {
                        $table_caracteristique_valeur = [];
                        // $valeurs = DB::select('select * from tm_caracteristique_valeurs where caracteristique_id = ?', [$caracteristique->id]);
                        $valeurs = DB::table('rayons')
                        ->join('rayon_caracteristique_valeurs', 'rayon_caracteristique_valeurs.rayon_id', '=', 'rayons.id')
                        ->join('caracteristiques', 'caracteristiques.id', '=', 'rayon_caracteristique_valeurs.caracteristique_id')
                        ->join('valeur_caracteristiques', 'valeur_caracteristiques.id', '=', 'rayon_caracteristique_valeurs.valeur_id')
                        ->select('valeur_caracteristiques.*')
                        ->where('rayon_caracteristique_valeurs.caracteristique_id', $caract->caracteristique_id)
                        ->where('rayon_caracteristique_valeurs.rayon_id', $caract->rayon_id)
                        ->get();
                            foreach($valeurs as $val) {
                                $options = "<option value=".$val->id.">".$val->libelle."</option>";
                                $table_caracteristique_valeur[] = $options;
                            }

                        $label = $caract->libelle;
                        $table_caracteristique[$label] = $table_caracteristique_valeur;
                    }
                }

            }

            return response()->json($table_caracteristique);
        }

        public function getCaracteristiqueRayonChangedRayon($id_rayon) {

            $caracteristiques = DB::table('rayons')
            ->join('rayon_caracteristique_valeurs', 'rayon_caracteristique_valeurs.rayon_id', '=', 'rayons.id')
            ->join('caracteristiques', 'caracteristiques.id', '=', 'rayon_caracteristique_valeurs.caracteristique_id')
            ->join('valeur_caracteristiques', 'valeur_caracteristiques.id', '=', 'rayon_caracteristique_valeurs.valeur_id')
            ->select('rayon_caracteristique_valeurs.*', 'caracteristiques.libelle')
            ->where('rayon_caracteristique_valeurs.rayon_id', $id_rayon)
            ->groupBy('rayon_caracteristique_valeurs.caracteristique_id')
            ->get();

            $table_caracteristique = [];
            if (count($caracteristiques) > 0) {

                foreach ($caracteristiques as $caract) {

                    $caracteristique = Caracteristique::find($caract->caracteristique_id);
                    if (!is_null($caracteristique)) {
                        $table_caracteristique_valeur = [];
                        // $valeurs = DB::select('select * from tm_caracteristique_valeurs where caracteristique_id = ?', [$caracteristique->id]);
                        $valeurs = DB::table('rayons')
                        ->join('rayon_caracteristique_valeurs', 'rayon_caracteristique_valeurs.rayon_id', '=', 'rayons.id')
                        ->join('caracteristiques', 'caracteristiques.id', '=', 'rayon_caracteristique_valeurs.caracteristique_id')
                        ->join('valeur_caracteristiques', 'valeur_caracteristiques.id', '=', 'rayon_caracteristique_valeurs.valeur_id')
                        ->select('valeur_caracteristiques.*')
                        ->where('rayon_caracteristique_valeurs.caracteristique_id', $caract->caracteristique_id)
                        ->where('rayon_caracteristique_valeurs.rayon_id', $caract->rayon_id)
                        ->get();
                            foreach($valeurs as $val) {
                                $options = "<option value=".$val->id.">".$val->libelle."</option>";
                                $table_caracteristique_valeur[] = $options;
                            }

                        $label = $caract->libelle;
                        $table_caracteristique[$label] = $table_caracteristique_valeur;
                    }
                }

            }

            return $table_caracteristique;
        }

        public function getCaracteristiqueRayonChangedBIS($id_categorie) {

            $caracteristiques = DB::table('familles')
            ->join('rayon_caracteristique_valeurs', 'rayon_caracteristique_valeurs.categorie_id', '=', 'familles.id')
            ->join('caracteristiques', 'caracteristiques.id', '=', 'rayon_caracteristique_valeurs.caracteristique_id')
            ->join('valeur_caracteristiques', 'valeur_caracteristiques.id', '=', 'rayon_caracteristique_valeurs.valeur_id')
            ->select('rayon_caracteristique_valeurs.*', 'caracteristiques.libelle')
            ->where('rayon_caracteristique_valeurs.categorie_id', $id_categorie)
            ->groupBy('rayon_caracteristique_valeurs.caracteristique_id')
            ->get();

            $table_caracteristique = [];
            if (count($caracteristiques) > 0) {

                foreach ($caracteristiques as $caract) {

                    $caracteristique = Caracteristique::find($caract->caracteristique_id);
                    if (!is_null($caracteristique)) {
                        $table_caracteristique_valeur = [];
                        // $valeurs = DB::select('select * from tm_caracteristique_valeurs where caracteristique_id = ?', [$caracteristique->id]);
                        $valeurs = DB::table('familles')
                        ->join('rayon_caracteristique_valeurs', 'rayon_caracteristique_valeurs.categorie_id', '=', 'familles.id')
                        ->join('caracteristiques', 'caracteristiques.id', '=', 'rayon_caracteristique_valeurs.caracteristique_id')
                        ->join('valeur_caracteristiques', 'valeur_caracteristiques.id', '=', 'rayon_caracteristique_valeurs.valeur_id')
                        ->select('valeur_caracteristiques.*')
                        ->where('rayon_caracteristique_valeurs.caracteristique_id', $caract->caracteristique_id)
                        ->where('rayon_caracteristique_valeurs.categorie_id', $caract->categorie_id)
                        ->get();
                            foreach($valeurs as $val) {
                                $options = "<option value=".$val->id.">".$val->libelle."</option>";
                                $table_caracteristique_valeur[] = $options;
                            }

                        $label = $caract->libelle;
                        $table_caracteristique[$label] = $table_caracteristique_valeur;
                    }
                }

            }

            return $table_caracteristique;
        }

    // recuperation du rayon à la quelle appartient le produit
    public function produitSousCatRayon(Request $request, $id) {

        $boutique_rayon_infos = DB::table('produits')
        ->join('rayons', 'produits.id_rayon', '=', 'rayons.id')
        ->join('univers', 'univers.id', '=', 'rayons.univer_id')
        ->select('rayons.libelle', 'rayons.id', 'rayons.univer_id', 'produits.id_famille')
        ->where('produits.id', $id)
        ->get();

        if(count($boutique_rayon_infos) > 0) {

            $rayon_categories = Rayon::where('id', $boutique_rayon_infos[0]->id)->with('familles')->get();

            $article_associe =
            DB::table('rayons')
            ->join('rayon_article_associers', 'rayon_article_associers.rayon_article_associer', '=', 'rayons.id')
            ->select('rayons.*')
            ->where('rayon_article_associers.id_rayon', $boutique_rayon_infos[0]->id)
            ->get();

            return response()->json([
                'infos_categorie' => $boutique_rayon_infos,
                'rayon_familles' => $rayon_categories,
                'article_associe' => $article_associe
            ]);

        } else {
            return response()->json([

            ]);
        }

    }
       // affichage des details d'un produit
       public function getPartenaireProduct($id) {
        $data_expedition = [];

        $current_produit= Produit::where('id', $id)->get();  // get produit by id
        $autre_offre_partenaire =
        DB::table('produits')
        ->join('boutiques', 'boutiques.id', '=', 'produits.boutique_id')
        ->select('produits.id', 'produits.prix', 'produits.libelle', 'boutiques.nature_boutique')
        ->where('produits.libelle', $current_produit[0]->libelle)
        ->where('produits.id', '<>', $id)
        ->get();

        foreach($autre_offre_partenaire as $prod) {
            $produit_expedition_data = DB::table('produits')
            ->join('produit_expeditions', 'produit_expeditions.produit_id', '=', 'produits.id')
            ->join('expedition', 'expedition.id', '=', 'produit_expeditions.id_expedition')
            ->where('produits.id', $prod->id)
            ->get();

            if(count($produit_expedition_data) > 0) {
                $data_expedition = $produit_expedition_data[0];
                $prod->prix_expedition = $data_expedition->prix;
            }else {
                $prod->prix_expedition = 'Gratuit';
            }

        }

        return response()->json([
            'produit_partenaire' => $autre_offre_partenaire,
            'expedition' => $data_expedition,
            ''
        ]);

    }

    public function sortPartenaireProductByPrice(Request $request) {
        // return $request;
        $data_expedition = [];
        if ($request->prix == 'croissant') {

        $current_produit= Produit::where('id', $request->produit_id)->get();  // get produit by id

        $autre_offre_partenaire =
        DB::table('produits')
        ->join('boutiques', 'boutiques.id', '=', 'produits.boutique_id')
        ->select('produits.id', 'produits.prix', 'produits.libelle', 'boutiques.nature_boutique')
        ->where('produits.libelle', $current_produit[0]->libelle)
        ->where('produits.id', '<>', $request->produit_id)
        ->orderBy('produits.prix', 'asc')
        ->get();

        foreach($autre_offre_partenaire as $prod) {
            $produit_expedition_data = DB::table('produits')
            ->join('produit_expeditions', 'produit_expeditions.produit_id', '=', 'produits.id')
            ->join('expedition', 'expedition.id', '=', 'produit_expeditions.id_expedition')
            ->where('produits.id', $prod->id)
            ->get();

            if(count($produit_expedition_data) > 0) {
                $data_expedition = $produit_expedition_data[0];
                $prod->prix_expedition = $data_expedition->prix;
            }else {
                $prod->prix_expedition = 'Gratuit';
            }
        }

        return response()->json([
            'produit_partenaire' => $autre_offre_partenaire,
            'expedition' => $data_expedition,
            ''
        ]);

        }else if($request->prix == 'decroissant') {
            $current_produit=
            Produit::where('id', $request->produit_id)->get();  // get produit by id

        $autre_offre_partenaire =
        DB::table('produits')
        ->join('boutiques', 'boutiques.id', '=', 'produits.boutique_id')
        ->select('produits.id', 'produits.prix', 'produits.libelle', 'boutiques.nature_boutique')
        ->where('produits.libelle', $current_produit[0]->libelle)
        ->where('produits.id', '<>', $request->produit_id)
        ->orderBy('produits.prix', 'desc')
        ->get();

        foreach($autre_offre_partenaire as $prod) {
            $produit_expedition_data = DB::table('produits')
            ->join('produit_expeditions', 'produit_expeditions.produit_id', '=', 'produits.id')
            ->join('expedition', 'expedition.id', '=', 'produit_expeditions.id_expedition')
            ->where('produits.id', $prod->id)
            ->get();

            if(count($produit_expedition_data) > 0) {
                $data_expedition = $produit_expedition_data[0];
                $prod->prix_expedition = $data_expedition->prix;
            }else {
                $prod->prix_expedition = 'Gratuit';
            }
        }

        return response()->json([
            'produit_partenaire' => $autre_offre_partenaire,
            'expedition' => $data_expedition,
            ''
        ]);

        }

    }

    // affichage des details d'un produit
    public function show_produit_detail(Request $request, $id) {

        $current_produit= Produit::where('id', $id)->get();  // get produit by id
       $Boutique_id = $current_produit[0]->boutique_id; // get id boutique de produit //139
       $Rayon_id = $current_produit[0]->id_rayon; // id Rayon de prodit
       $Id_produit = $id; // id produit 193

       $autre_offre_partenaire =
        Produit::where('libelle', $current_produit[0]->libelle)
        ->where('id', '<>', $id)
        ->get();
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
        ->select('rayons.libelle', 'rayons.id', 'rayons.slug')
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
    //    ->Where('rayon_caracteristique_valeurs.categorie_id',  $current_produit[0]->id_famille)
       ->select('caracteristiques.libelle as lib_caract', 'valeur_caracteristiques.libelle as lib_valeur');
    //    ->get();

       $Caracteristiques_famille =
       DB::table('rayon_caracteristique_valeurs')
       ->join('produit_caracteristique_valeurs', 'produit_caracteristique_valeurs.id_caracteristique_valeur', '=', 'rayon_caracteristique_valeurs.valeur_id')
       ->join('produits', 'produits.id', '=', 'produit_caracteristique_valeurs.id_produit')
       ->join('familles', 'familles.id', '=', 'produits.id_famille')
       ->join('caracteristiques', 'caracteristiques.id', '=', 'rayon_caracteristique_valeurs.caracteristique_id')
       ->join('valeur_caracteristiques', 'valeur_caracteristiques.id', '=', 'produit_caracteristique_valeurs.id_caracteristique_valeur')
       ->where('produit_caracteristique_valeurs.id_produit',  $Id_produit)
       ->where('rayon_caracteristique_valeurs.categorie_id',  $current_produit[0]->id_famille)
       ->select('caracteristiques.libelle as lib_caract', 'valeur_caracteristiques.libelle as lib_valeur');
    //    ->get();

    //    $car_final = $Caracteristiques + $Caracteristiques_famille;
        $combinedResult = $Caracteristiques->union($Caracteristiques_famille)->get();

        $tab_caracteristique = [];
        $tab_caracteristique_supp = [];

       foreach ($combinedResult as $caracteristique) {
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

        $favoris = false;

        if(Auth::check()) {
            $produit_favoris = DB::table('mes_favoris')
            ->where('id_produit', $Id_produit)
            ->where('id_user', Auth::user()->id)->get();

            if(count($produit_favoris) > 0) {
                $favoris = true;
            }
        }

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
                $autre_offre_partenaire,
                $favoris
           ]
       ]);
    }

    // supprimer le client du rayon
    public function removeUserRayon(Request $request, $id) {
        // get proprietaire du produit
        $id_produit = $id;

        $product_owner = DB::table('boutiques')
        ->join('marchands', 'marchands.id', '=', 'boutiques.id_marchand')
        ->join('users', 'users.id', '=', 'marchands.id_utilisateur')
        ->select('users.id')
        ->where('boutiques.id', 137)
        ->get();

        $id_user = $product_owner[0]->id;
        $_SESSION['boutique_concernee'] = $id_user;
        if(Auth::check()) {
            $id_user_connectee = Auth::user()->id;
            $event = event(new UserInRayon($id_user_connectee, $id_user, $id_produit, 1));
        }else{
            $event = event(new UserInRayon($_SESSION['anonymous_user'], $id_user, $id_produit, 1));
        }

        // return 'tout est ok';
    }

    public function vendreMemeProduit(Request $request, $id) {
        $produit = Produit::where('id', $id)->with('produitImages')->get();
        return $produit;
    }

    public function vendreMemeProduitCaracteristique(Request $request, $id) {
        $caracterisque =
        DB::table('sous_categorie_caracteristiques')
        ->join('caracteristiques', 'caracteristiques.id','=','sous_categorie_caracteristiques.caracteristique_id')
        ->select('caracteristiques.id', 'caracteristiques.libelle')
        ->groupBy('caracteristique_id')
        ->where('sous_categorie_id', $id)
        ->get();

        // get caractéristique value

        $main_tab = [];

        for ($i=0; $i < count($caracterisque); $i++) {

            $caracterisque_valeur = DB::table('caracteristique_valeurs')
                                      ->where('caracteristique_id', $caracterisque[$i]->id)
                                      ->get();
            $caract_valeur = [];
            foreach ($caracterisque_valeur as $key => $value) {
                $caract_valeur[] =  $value;
            }

            $main_tab[$caracterisque[$i]->libelle] = $caract_valeur;
        }

        return $main_tab;

    }

    public function modifierProduitMarchand(Request $request, $id) {
        $produit = Produit::where('id', $id)->with('produitImages')->with('produitAttribut')->get();
        $expedition = ProduitExpedition::where('id', $produit[0]->id)->get();

        $expedition_value =
        DB::table('expedition')
        ->join('produit_expeditions', 'produit_expeditions.id_expedition', '=', 'expedition.id')
        ->join('produits', 'produits.id', '=', 'produit_expeditions.produit_id')
        ->select('expedition.*')
        ->where('produit_expeditions.produit_id', $produit[0]->id)
        ->get();

        $produit_reduction =
        DB::table('produit_reductions')
        ->join('produits', 'produit_reductions.produit_id', '=', 'produits.id')
        ->select('produit_reductions.*')
        ->where('produits.id', $produit[0]->id)
        ->get();

        return response()->json([$produit, $expedition_value, $produit_reduction]);
    }

    // suppression du produit
    public function suppressionProduit(Request $request, $id) {

        $produit = Produit::find($id);

        $produit->deleted = 1;

        $dt = Carbon::now();
        $date_mise_en_corbeille = date('d-m-y h:i:s');

        $corbeille =Corbeille:: create([
            'produit_id' => $id,
            'date_mise_en_corbeille' => $dt,
        ]);

        $produit->save();

        return $produit;

    }

    public function updateProduit(Request $request) {
        $location = 'uploads';
        $produit = Produit::find($request->id_produit);
        $produit->libelle = $request->libelle;
        $produit->description = $request->description;
        $produit->prix = $request->prix;
        $produit->quantite = $request->quantite;

        if (!is_null($request->nbre_produit_lot)) {
            $produit->vente_en_lot = true;
            $produit->nbre_par_lot = $request->nbre_produit_lot;
        }

        if (!is_null($request->accepter_offre_inferieur_valeur)) {
            $produit->accepte_offresuppa = $request->accepter_offre_inferieur_valeur;
        }

        if (!is_null($request->refuse_offre_inferieur)) {
            $produit->refuser_offreinfa = $request->refuse_offre_inferieur;
        }

        if ($request->retour_nationaux != 'Retour national' || $request->retour_produit == null) {
            $produit->retour_produit = $request->retour_produit;
        }

        if(!is_null($request->delais)) {
            $produit->delais_retour = $request->delais;
        }

        $attribute = [];

        $data_check = [];
        $images_total[] = $produit->produitImages;

        // à traiter à la fin
        $expedition = DB::table('produit_expeditions')
                        ->where('produit_id', $produit->id)
                        ->get();

        if(count($expedition) > 0 && count($request->expedition) > 0) {
            foreach($expedition as $key => $exp){
                // $valeur_expedtion = explode(',', $request->expedition[$key+1]);
                if(array_key_exists($key, $request->expedition)) {
                    $valeur_expedtion = explode(',', $request->expedition[$key]);
                    $expedition_fini = ProduitExpedition::find($exp->id);
                    $expedition_fini->id_expedition = $valeur_expedtion[0];
                    $expedition_fini->save();

                }else {
                    // return 'pas ok';
                }
            }
            for($i = count($expedition); $i < 7; $i++) {
                if(array_key_exists($i, $request->expedition)) {
                    $valeur_expedtion = explode(',', $request->expedition[$i]);
                    $expedition = [
                        'id_expedition' => $valeur_expedtion[0],
                        'produit_id' => $produit->id,
                        'payer_par'=> $valeur_expedtion[2],
                        'prix' => $valeur_expedtion[3]
                        ];
                    $sendExpedition = ProduitExpedition::create($expedition);

                }
            }
        }

        $update =  $produit->save();

        if ($update) {
           return 'SUCCESS';
        }else {
            return 'ERROR';
        }

    }

    public function rayonProduit($id) {
        $produit = DB::table('produits')
        ->join('images_etageres', 'produits.image_etagere', '=', 'images_etageres.id')
        ->where('boutique_id', $_SESSION['boutique_marchand_id'])
        ->where('id_rayon', $id)
        ->where('deleted', 0)
        ->select('produits.*', 'images_etageres.path')
        ->get();
        return $produit;
    }


    public static function partition( $list, $p ) {
        $listlen = count( $list );
        $partlen = floor( $listlen / $p );
        $partrem = $listlen % $p;
        $partition1 = array();
        $mark = 0;
        for ($px = 0; $px < $p; $px++) {
            $incr = ($px < $partrem) ? $partlen + 1 : $partlen;
            $partition1[$px] = array_slice( $list, $mark, $incr );
            $mark += $incr;
        }
        return $partition1;
    }

    public function resetProduct($id) {
        $produit = Produit::find($id);
        $corbeille = Corbeille::where('produit_id', $id)->get();

        if(count($corbeille) > 0){
            $corbeille[0]->delete();
        }
        $produit->update(['deleted' => 0]);
        return $produit;
    }

    // get negociation product
    public function produitNegociationInfos(Request $request) {
        $produit = Produit::where('id', $request->produit_id)->get();
        return $produit[0];
    }

    public function caracteristiqueByProduit($id) {
        $produit = Produit::find($id);
        $produit_rayon = $produit->id_rayon;


        $caracteristiques = DB::table('rayon_caracteristique_valeurs')
        ->join('produit_caracteristique_valeurs', 'produit_caracteristique_valeurs.id_caracteristique_valeur', '=', 'rayon_caracteristique_valeurs.valeur_id')
        ->join('produits', 'produits.id', '=', 'produit_caracteristique_valeurs.id_produit')
        ->join('rayons', 'rayons.id', '=', 'produits.id_rayon')
        ->join('caracteristiques', 'caracteristiques.id', '=', 'rayon_caracteristique_valeurs.caracteristique_id')
        ->join('valeur_caracteristiques', 'valeur_caracteristiques.id', '=', 'produit_caracteristique_valeurs.id_caracteristique_valeur')
        ->where('produit_caracteristique_valeurs.id_produit', $id)
        ->where('rayon_caracteristique_valeurs.rayon_id', $produit_rayon)
        ->select('caracteristiques.libelle as lib_caract', 'valeur_caracteristiques.libelle as lib_valeur')
        ->get();


        return $caracteristiques;
    }

    public function produitParRayon(Request $request) {

    }

    public function updateProduitPosition(Request $request) {

        $produit = Produit::where('id', $request->id_produit)->update([
            "numero_slide" => $request->numero_slide,
            "numero_ligne_slide" => $request->numero_ligne_slide,
            "position_sur_etagere" => $request->position_sur_etagere,
        ]);

        return $produit;

    }

    public function searchByImage(Request $request) {

        $valeur_a_rechercher = $request->text_search;
        $valeurs = explode(',', $valeur_a_rechercher);

        $caracteristiques = DB::table('rayon_caracteristique_valeurs')
        ->join('produit_caracteristique_valeurs', 'produit_caracteristique_valeurs.id_caracteristique_valeur', '=', 'rayon_caracteristique_valeurs.valeur_id')
        ->join('produits', 'produits.id', '=', 'produit_caracteristique_valeurs.id_produit')
        ->join('rayons', 'rayons.id', '=', 'produits.id_rayon')
        ->join('caracteristiques', 'caracteristiques.id', '=', 'rayon_caracteristique_valeurs.caracteristique_id')
        ->join('valeur_caracteristiques', 'valeur_caracteristiques.id', '=', 'produit_caracteristique_valeurs.id_caracteristique_valeur')
        ->where('valeur_caracteristiques.libelle', 'like', '%' . $valeurs[0] . '%')
        ->select('caracteristiques.libelle as lib_caract', 'valeur_caracteristiques.libelle as lib_valeur')
        ->distinct()
        ->get();

        $Caracteristique_supp =
        DB::table('produit_caracteristiques')
        ->join('produits', 'produits.id', '=', 'produit_caracteristiques.produit_id')
        ->join('boutique_produit_car_valeurs', 'boutique_produit_car_valeurs.id', '=', 'produit_caracteristiques.valeur')
        ->join('boutique_produit_caracteristiques', 'boutique_produit_caracteristiques.id', '=', 'boutique_produit_car_valeurs.idBoutiqueCarValeur')
        ->select('boutique_produit_caracteristiques.libelle', 'boutique_produit_car_valeurs.valeur')
        ->distinct()
        ->get();

        $results = [];

        if (count($valeurs) > 0) {
            for($i=0; $i < count($valeurs); $i++) {

                $produits =
                DB::table('produits')
                ->join('rayons', 'rayons.id', '=', 'produits.id_rayon')
                ->select('produits.*', 'rayons.slug')
                ->where('produits.libelle', 'like', '%' .$valeurs[$i]. '%')
                ->orWhere('produits.description', 'like', '%' .$valeurs[$i]. '%')
                ->get();

                if(count($produits) > 0) {
                    $results[] = $produits;
                }

            }
        }

        return $results;

    }

    public function saveImageMeta(Request $request) {
        $data = [
            'fr_prodection' => $request->prediction_fr,
            'en_prediction' => $request->prediction_en,
            'product_id' => 1,
            'libelle_produit' => $request->libelle_produit
        ];

        $meta_data = SearchByImage::create($data);
        return $meta_data;
    }

    public function familleSousCategorie(Request $request) {
        $sous_categorie
        = DB::table('sous_categories')->where('famille_id', $request->id_famille)->get();

        $famille = DB::table('familles')->where('id', $request->id_famille)->get();

        // $rayon_caracteristique = new Collection($this->getCaracteristiqueRayonChangedRayon($famille[0]->rayon_id));
        // $caterogie_caracteristique = new Collection($this->getCaracteristiqueRayonChangedBIS($request->id_famille));

        $rayon_caracteristique = $this->getCaracteristiqueRayonChangedRayon($famille[0]->rayon_id);
        $caterogie_caracteristique = $this->getCaracteristiqueRayonChangedBIS($request->id_famille);

        $final_caracteristique_object = $rayon_caracteristique + $caterogie_caracteristique;

        // cas des catégories qui on les même tailles 
        $tab_same_categorie = [157, 158, 159, 160, 161, 162, 163, 164, 165, 386, 203]; // cas du rayon jeux

        if(in_array($request->id_famille, $tab_same_categorie)) {
        $categorie_id = 161; 
         $caracteristique
        = DB::table('caracteristiques')
        ->join('categorie_caracteristiques', 'categorie_caracteristiques.id_caracteristique', '=', 'caracteristiques.id')
        ->where('categorie_caracteristiques.id_categorie', $categorie_id)
        ->get();
        return response()->json(['sous_categorie' => $sous_categorie, 'caracteristique' => $caracteristique, 'cat_caracteristique' => $final_caracteristique_object]);

        } else {

        $caracteristique
        = DB::table('caracteristiques')
        ->join('categorie_caracteristiques', 'categorie_caracteristiques.id_caracteristique', '=', 'caracteristiques.id')
        ->where('categorie_caracteristiques.id_categorie', $request->id_famille)
        ->get();
            return response()->json(['sous_categorie' => $sous_categorie, 'caracteristique' => $caracteristique, 'cat_caracteristique' => $final_caracteristique_object]);

        }
        // $sous_categorie = DB::table('sous_categories')->where('famille_id', $request->id_famille)->get();

        // $caracteristique = DB::table('caracteristiques')
        //                     ->join('categorie_caracteristiques', 'categorie_caracteristiques.id_caracteristique', '=', 'caracteristiques.id')
        //                     ->where('categorie_caracteristiques.id_categorie', $request->id_famille)
        //                     ->get();

        // return response()->json(['sous_categorie' => $sous_categorie, 'caracteristique' => $caracteristique]);

    }



function getProductByCategorie(Request $request, $column) {

    if ($request->id_rayon == 27) { // cas de rayon téléphone

    $nbre_produit_per_page = $column * 5;


    $produits =
        DB::table('produits')
        ->where('id_famille', $request->id_categorie)
        ->where('produits.deleted', 0)
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
    return $produits;

    }else if($request->id_rayon == 25) { // cas de rayon TV

        $nbre_produit_per_page = $column * 3;

        $produits =
            DB::table('produits')
            ->where('id_famille', $request->id_categorie)
            ->where('produits.deleted', 0)
            ->paginate($nbre_produit_per_page);

        return $produits;

    }else if($request->id_rayon == 28) { // cas de rayon jeux
        $nbre_produit_per_page = $column * 3;

        $produits =
            DB::table('produits')
            ->where('id_famille', $request->id_categorie)
            ->where('produits.deleted', 0)
            ->paginate($nbre_produit_per_page);

        return $produits; 

    }else if($request->id_rayon == 26) { // cas de informatique reseau
        $nbre_produit_per_page = $column * 5;

        $produits =
            DB::table('produits')
            ->where('id_famille', $request->id_categorie)
            ->where('produits.deleted', 0)
            ->paginate($nbre_produit_per_page);

        return $produits;
    }else if($request->id_rayon == 38) { // cas de informatique reseau
        $nbre_produit_per_page = $column * 5;

        $produits =
            DB::table('produits')
            ->where('id_famille', $request->id_categorie)
            ->where('produits.deleted', 0)
            ->paginate($nbre_produit_per_page);

        return $produits;
    }else if($request->id_rayon == 39) { // cas de informatique reseau
        $nbre_produit_per_page = $column * 5;

        $produits =
            DB::table('produits')
            ->where('id_famille', $request->id_categorie)
            ->where('produits.deleted', 0)
            ->paginate($nbre_produit_per_page);

        return $produits;
    }else if($request->id_rayon == 9) { // cas de informatique reseau
        $nbre_produit_per_page = $column * 5;

        $produits =
            DB::table('produits')
            ->where('id_famille', $request->id_categorie)
            ->where('produits.deleted', 0)
            ->paginate($nbre_produit_per_page);

        return $produits;
    }else if($request->id_rayon == 8) { // cas de informatique reseau
        $nbre_produit_per_page = $column * 5;

        $produits =
            DB::table('produits')
            ->where('id_famille', $request->id_categorie)
            ->where('produits.deleted', 0)
            ->paginate($nbre_produit_per_page);

        return $produits;
    }else if($request->id_rayon == 10) { // cas de informatique reseau
        $nbre_produit_per_page = $column * 5;

        $produits =
            DB::table('produits')
            ->where('id_famille', $request->id_categorie)
            ->where('produits.deleted', 0)
            ->paginate($nbre_produit_per_page);

        return $produits;
    }else if($request->id_rayon == 12) { // cas de informatique reseau
        $nbre_produit_per_page = $column * 5;

        $produits =
            DB::table('produits')
            ->where('id_famille', $request->id_categorie)
            ->where('produits.deleted', 0)
            ->paginate($nbre_produit_per_page);

        return $produits;
    }


 }

    public function getCaracteristiqueByProdRayonId($prod_id, $rayon_id) {

        $caracteristiques =
        DB::table('rayon_caracteristique_valeurs')
        ->join('produit_caracteristique_valeurs', 'produit_caracteristique_valeurs.id_caracteristique_valeur', '=', 'rayon_caracteristique_valeurs.valeur_id')
        ->join('produits', 'produits.id', '=', 'produit_caracteristique_valeurs.id_produit')
        ->join('rayons', 'rayons.id', '=', 'produits.id_rayon')
        ->join('caracteristiques', 'caracteristiques.id', '=', 'rayon_caracteristique_valeurs.caracteristique_id')
        ->join('valeur_caracteristiques', 'valeur_caracteristiques.id', '=', 'produit_caracteristique_valeurs.id_caracteristique_valeur')
        ->where('produit_caracteristique_valeurs.id_produit', $prod_id)
        ->where('rayon_caracteristique_valeurs.rayon_id', $rayon_id)
        ->select('caracteristiques.libelle as lib_caract', 'valeur_caracteristiques.libelle as lib_valeur')
        ->get();

        return $caracteristiques;
    }

    
 public function getSearchedDataByCategorie($product_id, $column) {

    $produit = Produit::where('id', $product_id)->get();

    $produit1 = Produit::where('id', $product_id);

    if(count($produit) > 0) {

    $rayon = $produit[0]->id_rayon; // id du rayon
    $sous_categorie_id = $produit[0]->sous_categorie_id; // id de la sous categorie
    $famille_id = $produit[0]->id_famille; // id de la famille

    // produit de la sous categorie à la quelle £ le pd
    $sous_categorie_produit1 =
    DB::table('produits')
    ->where('sous_categorie_id', $sous_categorie_id)
    ->where('id', '<>', $produit[0]->id)
    ->where('deleted', 0);

    $famille_sous_categorie =
    DB::table('produits')
    ->where('id', '<>', $sous_categorie_id)
    ->where('id_famille', $famille_id) // toute les sous cat de la famille
    ->where('deleted', 0);

    if($rayon == 27) {

        $nombre_article = $column * 5;
        $sous_categorie_produit  =
        $produit1->union($sous_categorie_produit1)
        ->union($famille_sous_categorie)
        ->paginate($nombre_article);

        foreach($sous_categorie_produit as $produit) {

            $caracteristiques = $this->getCaracteristiqueByProdRayonId($produit->id, $produit->id_rayon);

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
            'produit' => $produit,
            'famille_produit' => $sous_categorie_produit,
            'rayon_id' => $rayon,
            'famille_id' => $famille_id
            // 'famille_sous_cat' => $famille_sous_categorie
        ]);


    }else if($rayon == 38) {
        $nombre_article = $column * 5;
        $sous_categorie_produit  =
        $produit1->union($sous_categorie_produit1)
        ->union($famille_sous_categorie)
        ->paginate($nombre_article);

        foreach($sous_categorie_produit as $produit) {

            $caracteristiques = $this->getCaracteristiqueByProdRayonId($produit->id, $produit->id_rayon);

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
            'produit' => $produit,
            'famille_produit' => $sous_categorie_produit,
            'rayon_id' => $rayon,
            'famille_id' => $famille_id
            // 'famille_sous_cat' => $famille_sous_categorie
        ]);


    } else if($rayon == 10) {
        $nombre_article = $column * 5;
        $sous_categorie_produit  =
        $produit1->union($sous_categorie_produit1)
        ->union($famille_sous_categorie)
        ->paginate($nombre_article);

        foreach($sous_categorie_produit as $produit) {

            $caracteristiques = $this->getCaracteristiqueByProdRayonId($produit->id, $produit->id_rayon);

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
            'produit' => $produit,
            'famille_produit' => $sous_categorie_produit,
            'rayon_id' => $rayon,
            'famille_id' => $famille_id
            // 'famille_sous_cat' => $famille_sous_categorie
        ]);


    }else if($rayon == 39) {
        $nombre_article = $column * 5;
        $sous_categorie_produit  =
        $produit1->union($sous_categorie_produit1)
        ->union($famille_sous_categorie)
        ->paginate($nombre_article);

        foreach($sous_categorie_produit as $produit) {

            $caracteristiques = $this->getCaracteristiqueByProdRayonId($produit->id, $produit->id_rayon);

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
            'produit' => $produit,
            'famille_produit' => $sous_categorie_produit,
            'rayon_id' => $rayon,
            'famille_id' => $famille_id
            // 'famille_sous_cat' => $famille_sous_categorie
        ]);


    }else if($rayon == 25) {

    $nombre_article = $column * 3;
    $sous_categorie_produit  =
    $produit1->union($sous_categorie_produit1)
    ->union($famille_sous_categorie)
    ->paginate($nombre_article);

    foreach($sous_categorie_produit as $produit) {

        $caracteristiques = $this->getCaracteristiqueByProdRayonId($produit->id, $produit->id_rayon);

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
        'produit' => $produit,
        'famille_produit' => $sous_categorie_produit,
        'rayon_id' => $rayon,
        'famille_id' => $famille_id
        // 'famille_sous_cat' => $famille_sous_categorie
    ]);

    }else if($rayon == 28) {
        $nombre_article = $column * 3;
        $sous_categorie_produit  =
        $produit1->union($sous_categorie_produit1)
        ->union($famille_sous_categorie)
        ->paginate($nombre_article);
    
        foreach($sous_categorie_produit as $produit) {
    
            $caracteristiques = $this->getCaracteristiqueByProdRayonId($produit->id, $produit->id_rayon);
    
            $capacite_val = '';
    
        }
    
        return response()->json([
            'produit' => $produit,
            'famille_produit' => $sous_categorie_produit,
            'rayon_id' => $rayon,
            'famille_id' => $famille_id
        ]);
    } else if($rayon == 26) {
        
        $nombre_article = $column * 5;
        $sous_categorie_produit  =
        $produit1->union($sous_categorie_produit1)
        ->union($famille_sous_categorie)
        ->paginate($nombre_article);

        foreach($sous_categorie_produit as $produit) {

            $caracteristiques = $this->getCaracteristiqueByProdRayonId($produit->id, $produit->id_rayon);

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
            'produit' => $produit,
            'famille_produit' => $sous_categorie_produit,
            'rayon_id' => $rayon,
            'famille_id' => $famille_id
        ]);
    } else if($rayon == 12) {
        
        $nombre_article = $column * 5;
        $sous_categorie_produit  =
        $produit1->union($sous_categorie_produit1)
        ->union($famille_sous_categorie)
        ->paginate($nombre_article);


        return response()->json([
            'produit' => $produit,
            'famille_produit' => $sous_categorie_produit,
            'rayon_id' => $rayon,
            'famille_id' => $famille_id
        ]);
    }else if($rayon == 8) {
        
        $nombre_article = $column * 5;
        $sous_categorie_produit  =
        $produit1->union($sous_categorie_produit1)
        ->union($famille_sous_categorie)
        ->paginate($nombre_article);


        return response()->json([
            'produit' => $produit,
            'famille_produit' => $sous_categorie_produit,
            'rayon_id' => $rayon,
            'famille_id' => $famille_id
        ]);
    }else if($rayon == 9) {
        
        $nombre_article = $column * 5;
        $sous_categorie_produit  =
        $produit1->union($sous_categorie_produit1)
        ->union($famille_sous_categorie)
        ->paginate($nombre_article);


        return response()->json([
            'produit' => $produit,
            'famille_produit' => $sous_categorie_produit,
            'rayon_id' => $rayon,
            'famille_id' => $famille_id
        ]);
    }

    }

}

// Affiche tous les resultats de la recherche
public function showAllSearchedProduct(Request $request) {

    // $search_data = $this->recherche($request);
    $tableau_des_mots = explode(' ', $request->value);
    $emptyObject = new \stdClass();

    $tab_rayon_number = [];

    $groupedByR
    = DB::table('produits')
    ->select('id_rayon', 'id', DB::raw('count(*) as count'))
    ->where('libelle', 'LIKE', '%'.$request->value.'%')
    ->groupBy('id_rayon')
    ->get();

    if($groupedByR->count() > 0) {

        foreach($groupedByR as $r) {
            $tab_rayon_number[] = $r->count;
        }

    }else if(count($tableau_des_mots) > 0) {

        $groupedByR = DB::table('produits')
        ->select('id_rayon', 'id', DB::raw('count(*) as count'))
        ->where('deleted', 0)
        ->where(function ($query) use ($tableau_des_mots){
            foreach($tableau_des_mots as $term) {
                $query->orWhere('produits.libelle', 'LIKE', '%' .$term . '%');
            }
        })->get();

        if(count($groupedByR) > 0) {

            foreach($groupedByR as $r) {
                $tab_rayon_number[] = $r->count;
            }

        }

    }

    $max_rayon = max($tab_rayon_number);

    foreach($groupedByR as $r) {
        if($r->count == $max_rayon) {
            $rayon = Rayon::find($r->id_rayon);
            $emptyObject = $r;
            $emptyObject->slug = $rayon->slug;
            break;
        }
    }

    return $emptyObject;

}

}
