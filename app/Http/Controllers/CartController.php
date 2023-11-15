<?php

namespace App\Http\Controllers;

use App\Models\Produit;
use App\Models\Promotion;
use App\Models\ProduitSousCategorie;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\MesFavoris;

use function PHPUnit\Framework\isNull;

class CartController extends Controller
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
    public function ajouter_article(Request $request)
    {
        //ma premiere fonction d'ajout

        if (!isset($_SESSION['panier'])) {
            $_SESSION['panier'] = [];
        }
        $_SESSION['panier'] = array_values($_SESSION['panier']) ;
        global $a ;
        global $quantite ;
        $a = 0;
        $quantite = 0;

        for($i = 0, $size = count($_SESSION['panier']); $i < $size; ++$i) {
            if(array_search($request->id_produit,$_SESSION['panier'][$i])){
                if(array_search($request->ref,$_SESSION['panier'][$i])){
                    if(array_search($request->carac,$_SESSION['panier'][$i])){
                        if(array_search($request->carac1,$_SESSION['panier'][$i])){
                            if(array_search($request->carac2,$_SESSION['panier'][$i])){
                                $a = 1;
                                $quantite = $_SESSION['panier'][$i]['quantite'];
                                    unset($_SESSION['panier'][$i]);
                                break;
                            }
                        }
                    }

                }
            }
        }

        if ($a == 1) {
            $data = [
                'id_produit' => $request->id_produit,
                'prix_unitaire' => $request->prix,
                'quantite' => $request->quantite+$quantite,
                'prix_total' => $request->prix_total,
                'statut' => 2,
                'ref' => $request->ref,
                'carac' => $request->carac,
                'carac1' => $request->carac1,
                'carac2' => $request->carac2
            ];
        } else {
            $data = [
                'id_produit' => $request->id_produit,
                'prix_unitaire' => $request->prix,
                'quantite' => $request->quantite,
                'prix_total' => $request->prix_total,
                'statut' => 1,
                'ref' => $request->ref,
                'carac' => $request->carac,
                'carac1' => $request->carac1,
                'carac2' => $request->carac2
            ];
        }

        $_SESSION['panier'] = array_values($_SESSION['panier']) ;
        array_push($_SESSION['panier'], $data);

        $nbre_element = 0;
        for($i = 0, $size = count($_SESSION['panier']); $i < $size; ++$i) {
            $nbre_element += $_SESSION['panier'][$i]['quantite'];
        }
        array_push($data, $nbre_element);

        return response()->json([$data]);

    }

    public function store2(Request $request)
    {
        if(Auth::check())  {
            return 1;
        }else {
            return '0';
        }
    }

    public function store2bis(Request $request)
    {

        if (!isset($_SESSION['favori'])) {
            $_SESSION['favori'] = [];
        }

        if(Auth::check())  {

            $check_favoris = MesFavoris::where([
                'id_produit' => $request->id_produit,
                'id_user' => Auth::user()->id
            ])->get();

            if (count($check_favoris) > 0) {
                $check_favoris = MesFavoris::find($check_favoris[0]->id)->delete();
        $data = [
            'favori_id' => $request->favori_id,
                    'statut' => 2,
        ];
                $nbre_element = count($_SESSION['favori']) - 1;
                array_push($data, $nbre_element);

                return response()->json(array_merge([$data]));

            }else {
            $data = [
                'favori_id' => $request->favori_id,
                    'statut' => 1,
            ];

            array_push($_SESSION['favori'], $data);
            $nbre_element = count($_SESSION['favori']);
            array_push($data, $nbre_element);

                $favoris = MesFavoris::create([
                    'id_produit' => $request->id_produit,
                    'id_user' => Auth::user()->id,
                    'id_categorie' => $request->id_categori_favorie,
                ]);

        return response()->json(array_merge([$data]));

            }

        }else {
            return '0';
        }

    }

    function getProductExpeditionById($id) {

        $produit_expedition_data = DB::table('produits')
        ->join('produit_expeditions', 'produit_expeditions.produit_id', '=', 'produits.id')
        ->join('expedition', 'expedition.id', '=', 'produit_expeditions.id_expedition')
        ->select('expedition.mode_expedition', 'expedition.id', 'expedition.prix_max', 'produit_expeditions.prix as prix')
        ->where('produits.id', $id)
        ->get();

        return $produit_expedition_data;

    }

    public function getProductExpeditionById2($produit_id) {

        $prixMax = null;

        $get_product_expedition
        = DB::table('produit_expeditions')
        ->join('produits', 'produits.id', '=', 'produit_expeditions.produit_id')
        ->join('expedition', 'expedition.id', '=', 'produit_expeditions.id_expedition')
        ->select(
            'produits.id',
            'produits.libelle',
            'expedition.mode_expedition',
            'produit_expeditions.paye_par',
            'produit_expeditions.prix'
        )->where('produit_expeditions.produit_id', $produit_id)
        ->get();

        foreach ($get_product_expedition as $expedition) {
            if (!is_numeric($expedition->prix)) {
                $expedition->prix = 0;
                $prix = $expedition->prix;

                if($prixMax === null || $prix > $prixMax) {
                    $prixMax = $prix;
                }
            }
        }

        return response()->json($get_product_expedition);
        // return $prixMax;

    }

    public function store3(Request $request)
    {
        $_SESSION['panier'] = array_merge($_SESSION['panier']);
        $articles = [];
        $tabeau_expedition = [];

        for($i = 0, $size = count($_SESSION['panier']); $i < $size; ++$i) {
            $id = $_SESSION['panier'][$i]['id_produit'];
            $quantite = $_SESSION['panier'][$i]['quantite'];
            $carac = $_SESSION['panier'][$i]['carac'];
            $data = Produit::find($id)->toArray();

            // data expedition
            $produit_expedition_data = $this->getProductExpeditionById($id);

            if (count($produit_expedition_data) > 0) {
                if ((!is_null($produit_expedition_data[0]->prix))) {
                    array_push($tabeau_expedition, $produit_expedition_data[0]->prix);
                }else {
                    array_push($tabeau_expedition, 0);
                }
                
            }

            array_push($data,$quantite);
            array_push($data,$carac);
            array_push($data,$produit_expedition_data);
            array_push($articles,$data);

        }

        if(count($tabeau_expedition) > 0) {
            $_SESSION['expedition'] = max($tabeau_expedition);  // montant de l'expédition dans une session
        }else {
            $_SESSION['expedition'] = 0;
        }

        // return tabeau_expedition;

        return response()->json($articles);
    }

    public function store4(Request $request)
    {
        $id_art = $request->id;
        $articles = [];
        $tabeau_expedition = [];

        unset($_SESSION['panier'][$id_art]); // On supprime le produit du tableau des produits du panier

        $_SESSION['panier'] = array_merge($_SESSION['panier']) ;
        $_SESSION['panier'] = array_values($_SESSION['panier']) ;

        if ($_SESSION['panier'] == []) {
            return response()->json(10);
        } else {

            for($o = 0, $size = count($_SESSION['panier']); $o < $size; ++$o) {
                $id = $_SESSION['panier'][$o]['id_produit'];
                $quantite = $_SESSION['panier'][$o]['quantite'];
                $carac = $_SESSION['panier'][$o]['carac'];
                $data = Produit::find($id)->toArray();
                 // data expedition
                $produit_expedition_data = $this->getProductExpeditionById($id);

                if (count($produit_expedition_data) > 0) {
                    array_push($tabeau_expedition, $produit_expedition_data[0]->prix);
                }

                array_push($data,$quantite);
                array_push($data,$carac);
                array_push($data,$produit_expedition_data);
                array_push($articles,$data);
            }
            $articles = array_values($articles) ;
            return response()->json($articles);
        }
    }

    function commandeExpedition(Request $request) {
        $products_session = [];
        $id_art = $request->id;
        $articles = [];

        if(isset($_SESSION['panier'])) {

            unset($_SESSION['panier'][$id_art]);
            $_SESSION['panier'] = array_merge($_SESSION['panier']) ;
            $_SESSION['panier'] = array_values($_SESSION['panier']) ;

            foreach ($_SESSION['panier'] as $panier_product) {
                $id = $panier_product['id_produit'];
                $quantite = $panier_product['quantite'];
                $carac = $panier_product['carac'];
                $data = Produit::find($id)->toArray();

                $product_expeditions = DB::table('produits')
                ->join('produit_expeditions', 'produit_expeditions.produit_id', '=', 'produits.id')
                ->join('expedition', 'expedition.id', '=', 'produit_expeditions.id_expedition')
                ->select('expedition.mode_expedition', 'expedition.id', 'expedition.prix_max', 'produit_expeditions.prix as prix_marchand')
                ->where('produit_expeditions.produit_id', $panier_product['id_produit'])
                ->get();

                if (count($product_expeditions) > 0) {

                    if(is_null($product_expeditions[0]->prix_marchand) ){
                        $product_expeditions[0]->prix_marchand = 0;
                    }

                    $products_session[] = $product_expeditions[0];

                }

                array_push($data,$quantite);
                array_push($data,$carac);
                array_push($data,$products_session);
                array_push($articles,$data);

            }

            $articles = array_values($articles) ;

            return response()->json($articles);

        }else if(isset($_SESSION['panier_rapide'])) {
            $_SESSION['panier_rapide'] = array_merge($_SESSION['panier_rapide']) ;
            $_SESSION['panier_rapide'] = array_values($_SESSION['panier_rapide']) ;

            $id = $_SESSION['panier_rapide'][0]['id_produit'];
            $data = Produit::find($id)->toArray();
            $product_expeditions = DB::table('produits')
            ->join('produit_expeditions', 'produit_expeditions.produit_id', '=', 'produits.id')
            ->join('expedition', 'expedition.id', '=', 'produit_expeditions.id_expedition')
            ->select('expedition.mode_expedition', 'expedition.id', 'expedition.prix_max', 'produit_expeditions.prix as prix_marchand')
            ->where('produit_expeditions.produit_id', $id)
            ->get();

            if (count($product_expeditions) > 0) {

                if(is_null($product_expeditions[0]->prix_marchand) ){
                    $product_expeditions[0]->prix_marchand = 0;
                }

                $products_session[] = $product_expeditions[0];

            }

            array_push($data,1);
            array_push($data,[]);
            array_push($data,$products_session);
            array_push($articles,$data);

            $articles = array_values($articles) ;

            return response()->json($articles);

        }

    }

    public function store5(Request $request)
    {
        $id = $request->id;

        $data = Produit::find($id)->toArray();
        $data = ProduitSousCategorie::find($data['sous_categorie_id']);
        return response()->json($data);

    }

    public function store6(Request $request)
    {
        $_SESSION['panier'] = array_merge($_SESSION['panier']);
        $articles = [];

        global $expedition;

        for($i = 0, $size = count($_SESSION['panier']); $i < $size; ++$i) {
            $id = $_SESSION['panier'][$i]['id_produit'];
            $quantite = $_SESSION['panier'][$i]['quantite'];
            $carac = $_SESSION['panier'][$i]['carac'];
            $data = Produit::find($id)->toArray();

            $produit_expedition_data = DB::table('produits')
            ->join('produit_expeditions', 'produit_expeditions.produit_id', '=', 'produits.id')
            ->join('expedition', 'expedition.id', '=', 'produit_expeditions.id_expedition')
            ->select('expedition.mode_expedition', 'expedition.id', 'expedition.prix_max', 'produit_expeditions.prix as prix')
            ->where('produits.id', $id)
            ->get();

            if (count($produit_expedition_data) > 0) {
                foreach ($produit_expedition_data as $expedition) {
                    if (is_null($expedition->prix)) {
                        $expedition->prix = 0;
                    }
                }
            }

            array_push($data,$quantite);
            array_push($data,$carac);
            array_push($data,$produit_expedition_data);
            array_push($articles,$data);
        }

        return response()->json($articles);
    }

    public function store6b(Request $request)
    {
        $_SESSION['panier_rapide'] = [];
        $articles = [];
        $tabeau_expedition = [];

        $a = 0;
        $quantite = 0;

        $id = $request->id_produit;
        $quantite = $request->quantite;
        $carac = $request->carac;

        $data1 = [
            'id_produit' => $request->id_produit,
            'prix_unitaire' => $request->prix,
            'quantite' => $request->quantite,
            'prix_total' => $request->prix_total,
            'statut' => $a == 1 ? 2 : 1,
            'ref' => $request->ref,
            'carac' => $request->carac,
            // 'carac1' => $request->carac1,
            // 'carac2' => $request->carac2
        ];

        $_SESSION['panier_rapide'] = array_values($_SESSION['panier_rapide']) ;
        array_push($_SESSION['panier_rapide'], $data1);

        $data = Produit::find($id)->toArray();

        $produit_expedition_data = $this->getProductExpeditionById($id);

        if (count($produit_expedition_data) > 0) {
            foreach ($produit_expedition_data as $expedition) {
                if (is_null($expedition->prix)) {
                    $expedition->prix = 0;
                    array_push($tabeau_expedition, $expedition->prix);
                }else {
                    array_push($tabeau_expedition, $expedition->prix);
                }
            }
        }

        if(count($tabeau_expedition) > 0) {
            $_SESSION['expedition_rapide'] = max($tabeau_expedition);  // montant de l'expédition dans une session
        }else {
            $_SESSION['expedition_rapide'] = 0;
        }

        array_push($data,$quantite);
        array_push($data,$carac);
        array_push($data,$produit_expedition_data);

        array_push($articles,$data);
        array_push($_SESSION['panier_rapide'], $articles);

        return response()->json($articles);
    }

    public function store7(Request $request)
    {

        //ma deuxieme fonction d'ajout

        if (!isset($_SESSION['panier'])) {
            $_SESSION['panier'] = [];
        }
        
        $_SESSION['panier'] = array_values($_SESSION['panier']) ;
        global $a ;
        global $id ;
        global $quantite ;
        $a = 0;
        $quantite = 0;
        $id = intval($request->id_session);

        unset($_SESSION['panier'][$id]);

            $data = [
                'id_produit' => $request->id_produit,
                'prix_unitaire' => $request->prix,
                'quantite' => $request->quantite,
                'prix_total' => $request->prix_total,
                'statut' => 1,
                'ref' => $request->ref,
                'carac' => $request->carac,
                'carac1' => $request->carac1,
                'carac2' => $request->carac2
            ];

        array_push($_SESSION['panier'], $data);
        $_SESSION['panier'] = array_values($_SESSION['panier']) ;

        $nbre_element = 0;
        for($i = 0, $size = count($_SESSION['panier']); $i < $size; ++$i) {
            $nbre_element += $_SESSION['panier'][$i]['quantite'];
        }
        array_push($data, $nbre_element);

        return response()->json([$data]);

    }

    public function store8(Request $request)
    {

    //ma troisieme fonction d'ajout

    if (!isset($_SESSION['panier'])) {
        $_SESSION['panier'] = [];
    }

    $_SESSION['panier'] = array_values($_SESSION['panier']);
    global $a ;

    $a = 0;
        $data = [
            'id_produit' => $request->id_produit,
            'prix_unitaire' => $request->prix,
            'quantite' => $request->quantite,
            'prix_total' => $request->prix_total,
            'statut' => 1,
            'ref' => $request->ref,
            'carac' => $request->carac,
            'carac1' => $request->carac1,
            'carac2' => $request->carac2
        ];

        array_push($_SESSION['panier'], $data);
        $_SESSION['panier'] = array_values($_SESSION['panier']) ;

        $nbre_element = 0;
        for($i = 0, $size = count($_SESSION['panier']); $i < $size; ++$i) {
            $nbre_element += $_SESSION['panier'][$i]['quantite'];
        }
        array_push($data, $nbre_element);

        return response()->json([$data]);

    }

    public function checkpromo(Request $request){

        $coupCheck = Promotion::where('code_promo', $request->code_promo)->get();
        $remise = $coupCheck[0]->remise;
        if ($coupCheck->code_promo = $request->code_promo){
            return $remise ;
        }
    }

    public function store9(Request $request)
    {
        //ma premiere fonction d'ajout

        if (!isset($_SESSION['panier'])) {
            $_SESSION['panier'] = [];
        }
        $_SESSION['panier'] = array_values($_SESSION['panier']) ;
        global $a ;
        global $id ;
        $a = 0;
        $id = intval($request->id_session);

        for($i = 0, $size = count($_SESSION['panier']); $i < $size; ++$i) {
            if(array_search($request->id_produit,$_SESSION['panier'][$i])){
                if(array_search($request->ref,$_SESSION['panier'][$i])){

                    if($request->carac == $_SESSION['panier'][$i]['carac']){
                        if($request->carac1 == $_SESSION['panier'][$i]['carac1']){
                            if($request->carac2 == $_SESSION['panier'][$i]['carac2']){
                                $a = 1;
                                    // unset($_SESSION['panier'][$i]);
                                break;
                            }
                        }
                    }

                }
            }
        }

        return response()->json($a);

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
}
