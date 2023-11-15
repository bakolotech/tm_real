<?php

namespace App\Http\Controllers;

use App\Models\CreditPayement;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

use App\Models\CarnetAdresse;

class CarteCreditController extends Controller
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
        
    }





    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

        public function store(Request $request)
        {
    
            if (!Auth::check() && isset($_SESSION['session_invite'])) {
    
                $type_cart = $request->nom_carte;
                $_SESSION['session_invite'][$type_cart] = $request->all();
                    return response()->json([
                        'status'=>202,
                        'creditCard'=>$_SESSION['session_invite'],
                    ]);
    
            }else {
            $user=User::find(Auth::user()->id);
            if ($user instanceof  User){
    
                if ($request->enregistrer_prochain_achat == 'non') {
                    # code...
                    $cart = [
                        'nom_carte' => $request->nom_carte,
                        'numero_carte'=> $request->numero_carte,
                        'user_id'=> $user->id,
                        'adresse_id'=> $request->adresse_id,
                        'nom_proprietaire'=> $request->nom_proprietaire,
                        'date_expiration'=> $request->date_expiration,
                        'code_securite'=> $request->code_securite,
                    ];
    
                    $array_to_object = (object)$cart;
                    $_SESSION['commande_payement_infos'] = $array_to_object ;
    
                    return response()->json([
                        'status'=>200,
                        'creditCard'=> $array_to_object
                    ]);
    
                } else{
    
                    $cart =  CreditPayement::create([
                        'nom_carte' => $request->nom_carte,
                        'numero_carte'=> $request->numero_carte,
                        'user_id'=> $user->id,
                        'adresse_id'=> $request->adresse_id,
                        'nom_proprietaire'=> $request->nom_proprietaire,
                        'date_expiration'=> $request->date_expiration,
                        'code_securite'=> $request->code_securite,
                    ]);
    
                    $cart_to_store = CreditPayement::find($cart->id)->get();
    
                    $_SESSION['commande_payement_infos'] = $cart_to_store ;
    
                    return response()->json([
                        'status'=>200,
                        'creditCard'=>$cart,
                    ]);
    
    
                }
    
    
            }
    
    
            }
    
        }



    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response 
     */
    public function getUserCard($id)
    {

        $cards = DB::table('credit_payements')
        ->join('carnet_adresses', 'credit_payements.adresse_id', '=', 'carnet_adresses.id')
        ->join('users', 'credit_payements.user_id', '=', 'users.id')
        ->select('credit_payements.nom_carte', 'credit_payements.id', 'credit_payements.numero_carte', 'credit_payements.date_expiration', 'credit_payements.nom_proprietaire', 'carnet_adresses.adresse', 'carnet_adresses.portable')
        ->where('credit_payements.user_id', '=', $id)
        ->get();
       
        return response()->json([
            'status'=>200,
            'creditcards'=>$cards
        ]);
    }

    public function getUserCardAchat() {

        if (Auth::check()) {

            $visa = (object)[];
            $mastercard = (object)[]; 

            $cards = DB::table('credit_payements')
            ->join('carnet_adresses', 'credit_payements.adresse_id', '=', 'carnet_adresses.id')
            ->join('users', 'credit_payements.user_id', '=', 'users.id')
            ->select('credit_payements.nom_carte', 'credit_payements.id', 'credit_payements.numero_carte', 'credit_payements.date_expiration', 'credit_payements.nom_proprietaire', 'carnet_adresses.adresse', 'carnet_adresses.portable', 'credit_payements.code_securite')
            ->where('credit_payements.user_id', '=', Auth::user()->id)
            ->where('credit_payements.nom_carte', '=', 'VISA')
            ->get();

            if (count($cards) > 0) {
                $visa = $cards[0];
            }

            $cards_master = DB::table('credit_payements')
            ->join('carnet_adresses', 'credit_payements.adresse_id', '=', 'carnet_adresses.id')
            ->join('users', 'credit_payements.user_id', '=', 'users.id')
            ->select('credit_payements.nom_carte', 'credit_payements.id', 'credit_payements.numero_carte', 'credit_payements.date_expiration', 'credit_payements.nom_proprietaire', 'carnet_adresses.adresse', 'carnet_adresses.portable', 'credit_payements.code_securite')
            ->where('credit_payements.user_id', '=', Auth::user()->id)
            ->where('credit_payements.nom_carte', '=', 'MasterCard')
            ->get();

            if (count($cards_master) > 0) {
                $mastercard = $cards_master[0];
            }


            if (count($cards) > 0 && count($cards_master)  == 0) {
                $_SESSION['commande_payement_infos'] = $cards[0];
            }else if(count($cards_master) > 0 && count($cards)  == 0) {
                $_SESSION['commande_payement_infos'] = $cards_master[0];
            }

            return response()->json([
                'status'=>200,
                'creditcards'=>$visa,
                'mastercard'=> $mastercard
            ]);

        }else{
            return response()->json([
                'status'=>201,
                'creditcards'=> []
            ]);
        }
        
    }

    public function getCardSelectedCrediCard(Request $request) {
        $cards = DB::table('credit_payements')
            ->join('carnet_adresses', 'credit_payements.adresse_id', '=', 'carnet_adresses.id')
            ->join('users', 'credit_payements.user_id', '=', 'users.id')
            ->select('credit_payements.nom_carte', 'credit_payements.id', 'credit_payements.numero_carte', 'credit_payements.date_expiration', 'credit_payements.nom_proprietaire', 'carnet_adresses.adresse', 'carnet_adresses.portable', 'credit_payements.code_securite')
            ->where('credit_payements.user_id', '=', Auth::user()->id)
            ->where('credit_payements.id', '=', $request->id)
            ->get();

            if (count($cards) > 0) {
                $_SESSION['commande_payement_infos'] = $cards[0];
            }

            return $_SESSION['commande_payement_infos'];

    }

    public function creditToChange(Request $request) { 
        if (isset($_SESSION['session_invite'])) {

            return response()->json([
                'status'=>202,
                'creditcards'=> $_SESSION['session_invite'][$request->type_card]
            ]);

        }else{
            $cards = CreditPayement::where('id', $request->id)->get();
            return response()->json([
                'status'=>200,
                'creditcards'=> $cards[0]
            ]);

        }

    }

    public function changeCreditCarte1(Request $request) {

        if (isset($_SESSION['session_invite'])) {
            return response()->json([
                'status'=>202,
                'creditcards'=> $_SESSION['session_invite'][$request->type_card]
            ]);

        }else {
            if ($request->valeur_confirmation == 'Oui') {

                $carte_credit = CreditPayement::find($request->id);

                $carte_credit->numero_carte = $request->numero_carte;
                $carte_credit->nom_proprietaire = $request->nom_proprietaire;
                $carte_credit->date_expiration = $request->date_expiration;
                $carte_credit->code_securite = $request->code_securite;
                $carte_credit->carte_defaut = $request->carte_par_defaut;

                $carte_credit->save();

                $_SESSION['credit_pay'] = (array)$carte_credit;

                $cards = DB::table('credit_payements')
                ->join('carnet_adresses', 'credit_payements.adresse_id', '=', 'carnet_adresses.id')
                ->join('users', 'credit_payements.user_id', '=', 'users.id')
                ->select('credit_payements.nom_carte', 'credit_payements.id', 'credit_payements.numero_carte', 'credit_payements.date_expiration', 'credit_payements.nom_proprietaire', 'carnet_adresses.adresse', 'carnet_adresses.portable', 'credit_payements.code_securite')
                ->where('credit_payements.user_id', '=', Auth::user()->id)
                ->where('credit_payements.nom_carte', '=', 'VISA')
                ->get();

                if (count($cards) > 0) {
                    $_SESSION['commande_payement_infos'] = $cards[0];
                }
                return $carte_credit;

            }else if($request->valeur_confirmation == 'Non'){ // Pas de conservation en base mais en session
                $_SESSION['commande_payement_infos']  =  $request->all();
                return $_SESSION['commande_payement_infos'];
            }
        }
    }

    public function getCreditCardAchat(Request $request) {
        if ($request->type_card == 'VISA') {
            $cards = DB::table('credit_payements')
            ->join('carnet_adresses', 'credit_payements.adresse_id', '=', 'carnet_adresses.id')
            ->join('users', 'credit_payements.user_id', '=', 'users.id')
            ->select('credit_payements.nom_carte', 'credit_payements.id', 'credit_payements.numero_carte', 'credit_payements.date_expiration', 'credit_payements.nom_proprietaire', 'carnet_adresses.adresse', 'carnet_adresses.portable')
            ->where('credit_payements.user_id', '=', Auth::user()->id)
            ->where('credit_payements.nom_carte', '=', 'VISA')
            ->get();
            return $cards;
        }else if ($request->type_card == 'MasterCard') {
            $cards = DB::table('credit_payements')
            ->join('carnet_adresses', 'credit_payements.adresse_id', '=', 'carnet_adresses.id')
            ->join('users', 'credit_payements.user_id', '=', 'users.id')
            ->select('credit_payements.nom_carte', 'credit_payements.id', 'credit_payements.numero_carte', 'credit_payements.date_expiration', 'credit_payements.nom_proprietaire', 'carnet_adresses.adresse', 'carnet_adresses.portable')
            ->where('credit_payements.user_id', '=', Auth::user()->id)
            ->where('credit_payements.nom_carte', '=', 'MasterCard')
            ->get();
            return $cards;
        }

    }

    public function updateInviteCredit(Request $request) {
        if(isset($_SESSION['session_invite'][$request->nom_carte]))
        $credit_card = $_SESSION['session_invite'][$request->nom_carte];
        $_SESSION['session_invite'][$request->nom_carte] = $request->except(['valeur_confirmation', 'carte_par_defaut']);
        // $_SESSION['commande_payement_infos'] =
        return $credit_card;
    }


      /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public static function getCreditCardbyID($id)
    {
      
        $credits = DB::table('credit_payements') 
        ->where('credit_payements.id', '=', $id)
        ->get();
     
        return response()->json([
            'status'=>200,
            'credits'=> [$credits],
        ]);
        
    }


    public static function UpdateUserCredit(Request $request)
    { 
            $creditas = DB::table('credit_payements') 
            ->where('credit_payements.id', '=', $request->id)
            ->update([ 
                'numero_carte'=>$request->numero_carte,
                'nom_proprietaire'=>$request->nom_proprietaire,
                'date_expiration'=>$request->date_expiration,
                'code_securite'=>$request->code_securite,
            ]);
     
        return response()->json([
            'status'=>200,
        ]);
        
    }




 /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
*/
    public function destroy(Request $request)
    {
        $credit_id= $request->credit_id;
        $deleted = DB::table('credit_payements')->where('id', '=',  $credit_id)->delete();

        return response()->json([
            'status'=>200,
        ]);
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


}
