<?php

namespace App\Http\Controllers;

use App\Models\CarnetAdresse;
use App\Models\Produit;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class CarnetAdresseController extends Controller
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
        $request->validate(
            [
                'prenom_nom' => ['required', 'string', 'max:50'],
                'adresse' => ['required', 'string', 'max:100'],
                'ville' => ['required', 'string'],
                'portable' => ['required', 'string', 'max:25'],
                'type_adresse' => ['required', 'string', 'max:100'],
                'adresse_defaut' => [ 'integer', 'max:1'],

            ],
            [
                '*.required' => "Ce champ est obligatoire",
                '*.max' => "Vous avez dépassé la taille maximale ici",
                '*.string' => "Ce champ ne peut contenir que des caractères",
            ]
        );


        try
        {
            $user=User::find(Auth::user()->id);

            if ($user instanceof User){

                if($request->adresse_defaut == 1){

                     DB::table('carnet_adresses')
                    ->where('carnet_adresses.user_id', '=', $user->id)
                    ->where('carnet_adresses.adresse_defaut', '=', 1)
                    ->update([
                        'adresse_defaut' =>  0
                    ]);

                    $carnet_adresse= new CarnetAdresse();
                    $carnet_adresse->prenom_nom=$request->prenom_nom;
                    $carnet_adresse->adresse=$request->adresse;
                    $carnet_adresse->ville=$request->ville;
                    $carnet_adresse->code_postale=$request->code_postale;
                    $carnet_adresse->portable=$request->portable;
                    $carnet_adresse->complement=$request->complement;
                    $carnet_adresse->type_adresse=$request->type_adresse;
                    $carnet_adresse->nom_entreprise=$request->nom_entreprise;
                    $carnet_adresse->adresse_defaut=$request->adresse_defaut;
                    $carnet_adresse->user_id=$user->id;

                    $carnet_adresse->save();

                    if ($carnet_adresse) {
                        $_SESSION['user_adresse_achat'] = $carnet_adresse->toArray(); // chargement de l'adress dans la session
                    }

                    return response()->json([
                        'status'=>200,
                        'message'=>'Mise à jour effetuée avec succès !',
                        'carnet'=> [$carnet_adresse],
                        'user_email', Auth::user()->email,
                    ]);


                }else{

                    $carnet_adresse= new CarnetAdresse();
                    $carnet_adresse->prenom_nom=$request->prenom_nom;
                    $carnet_adresse->adresse=$request->adresse;
                    $carnet_adresse->ville=$request->ville;
                    $carnet_adresse->code_postale=$request->code_postale;
                    $carnet_adresse->portable=$request->portable;
                    $carnet_adresse->complement=$request->complement;
                    $carnet_adresse->type_adresse=$request->type_adresse;
                    $carnet_adresse->nom_entreprise=$request->nom_entreprise;
                    $carnet_adresse->adresse_defaut=$request->adresse_defaut;
                    $carnet_adresse->user_id=$user->id;

                    $carnet_adresse->latitude =$request->address_lat;
                    $carnet_adresse->longitude =$request->adress_long;

                    $carnet_adresse->save();

                    if ($carnet_adresse) {
                        $_SESSION['user_adresse_achat'] = $carnet_adresse->toArray(); // chargement de l'adress dans la session
                    }

                    return response()->json([
                        'status'=>200,
                        'message'=>'Mise à jour effetuée avec succès !',
                        'carnet'=> [$carnet_adresse],
                        'user_email', Auth::user()->email,
                    ]);

                }

            }

        }
        catch (\Exception $exception)
        {
            return response()->json([
                'status'=>404,
                'message'=>'Une erreur est survenue, réessayez plutard !'
            ]);
        }

    }


    public static function getaddressUser()
    {
        if (Auth::check()) {
            $carnets = CarnetAdresse::where('user_id', Auth::user()->id)->get();

            return response()->json([
                'status'=>200,
                'carnet'=> [$carnets],
            ]);

        }else if(isset($_SESSION['session_invite'])){
            return response()->json([
                'status'=>202,
                'carnet'=> $_SESSION['session_invite'],
            ]);
        }
    }

        // ----------------------------get carnet pour achat -------------------
        public function getUserAchatAchat() {
            if (Auth::check()) {
                $carnets = CarnetAdresse::where('user_id', Auth::user()->id)->get();
                if (count($carnets) > 0) {
                    $session_adress1 = [];
                    $session_adress1['id'] = $carnets[0]->id;
                    $session_adress1['nom'] = $carnets[0]->prenom_nom;
                    $session_adress1['adresse'] = $carnets[0]->adresse;
                    $_SESSION['user_adresse_achat'] = $session_adress1;
                }

                return response()->json([
                    'status'=>200,
                    'carnet'=> [$carnets],
                    'email' =>Auth::user()->email,
                ]);

        }else{
            return '0';
        }
    }

    public static function UpdateUserAddress(Request $request)
    {

        $user=User::find(Auth::user()->id);

        if($request->adresse_defaut == 1){

            DB::table('carnet_adresses')
            ->where('carnet_adresses.user_id', '=', $user->id)
            ->where('carnet_adresses.adresse_defaut', '=', 1)
            ->update([
                'adresse_defaut' =>  0
            ]);


            $carnets= CarnetAdresse::where('user_id', Auth::user()->id)
                    ->where('id', $request->id)
                    ->update([
                        'prenom_nom'=>$request->prenom_nom,
                        'adresse'=>$request->adresse,
                        'ville'=>$request->ville,
                        'code_postale'=>$request->code_postale,
                        'portable'=>$request->portable,
                        'complement'=>$request->complement,
                        'type_adresse'=>$request->type_adresse,
                        'nom_entreprise'=>$request->nom_entreprise,
                        'adresse_defaut'=>$request->adresse_defaut,
                    ]);

                return response()->json([
                    'status'=>200,
                ]);

        }else{

                $carnets= CarnetAdresse::where('user_id', Auth::user()->id)
                    ->where('id', $request->id)
                    ->update([
                        'prenom_nom'=>$request->prenom_nom,
                        'adresse'=>$request->adresse,
                        'ville'=>$request->ville,
                        'code_postale'=>$request->code_postale,
                        'portable'=>$request->portable,
                        'complement'=>$request->complement,
                        'type_adresse'=>$request->type_adresse,
                        'nom_entreprise'=>$request->nom_entreprise,
                        'adresse_defaut'=>$request->adresse_defaut,
                    ]);

                return response()->json([
                    'status'=>200,
                ]);
        }

    }

    public function siggleAdresse(Request $request) {
        $adress = CarnetAdresse::where('id', $request->id)->get();
          // Mettre en session l'adresse
        if (count($adress) > 0) {
            $_SESSION['user_adresse_achat'] = $adress[0]->toArray();
        }
        return $adress;
    }

    public function getSigleExpedition(Request $request) {

        $expedition = DB::table('expedition')
                        ->select('*')
                        ->where('id', $request->id)
                        ->get();
        if (count($expedition) > 0) {
            $_SESSION['commande_expedition'] = $expedition[0];
        }

        return $expedition;

    }

    public function getCurrentPrice() {

        if (isset($_SESSION['panier']) && count($_SESSION['panier']) > 0) {
        $_SESSION['panier'] = array_merge($_SESSION['panier']);
        $articles = [];

        for($i = 0, $size = count($_SESSION['panier']); $i < $size; ++$i) {
            $id = $_SESSION['panier'][$i]['id_produit'];
            $quantite = $_SESSION['panier'][$i]['quantite'];
            $carac = $_SESSION['panier'][$i]['carac'];
            $data = Produit::find($id)->toArray();
            array_push($data,$quantite);
            array_push($data,$carac);
            array_push($articles,$data);
        }
        // dd($articles);

        return response()->json($articles);

        }
    }

    public function saveFromAchat(Request $request) {

        $carnet_adresse= new CarnetAdresse();
        $carnet_adresse->prenom_nom=$request->prenom_nom;
        $carnet_adresse->adresse=$request->adresse;
        $carnet_adresse->ville=$request->ville;
        $carnet_adresse->code_postale=$request->code_postale;

        $carnet_adresse->portable=$request->portable;
        $carnet_adresse->complement=$request->complement;
        $carnet_adresse->type_adresse=$request->type_adresse;
        $carnet_adresse->nom_entreprise=$request->nom_entreprise;

        $carnet_adresse->latitude =$request->latitude;
        $carnet_adresse->longitude =$request->longitude;

        $carnet_adresse->adresse_defaut=1;
        $carnet_adresse->user_id=Auth::user()->id;

        $carnet_adresse->save();

        $_SESSION['user_adresse_achat'] = $carnet_adresse->toArray();

        // return  $carnet_adresse;

        return response()->json([
            'status'=>200,
            'message'=>'Mise à jour effetuée avec succès !',
            'carnet'=> [$carnet_adresse],
            'user_email', Auth::user()->email,
        ]);

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
    public function destroy(Request $request)
    {
        $carnet_id= $request->carnet_id;
        CarnetAdresse::find($carnet_id)->delete();


        $carnets = CarnetAdresse::where('user_id', Auth::user()->id)->get();
        return response()->json([
            'status'=>200,
            'carnet'=> [$carnets],
        ]);
    }
}
