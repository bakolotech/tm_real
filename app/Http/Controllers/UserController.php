<?php

namespace App\Http\Controllers;

use App\Models\City;
use App\Models\Country;
use App\Models\Devise;
use App\Models\Langue;
use App\Models\Main;
use App\Models\Pays;
use App\Models\MesFavoris;
use App\Models\Marchand;
use App\Models\Boutique;
use App\Models\State;
use App\Models\CarnetAdresse;
use App\Models\InStockNotifyer;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Image;
use App\Events\RealTimeMessage;
use App\Events\RealtimeNegociation;
use App\Models\ProduitNegociation;
use Exception;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Http;
use App\Models\PhoneVerificationUser;
use Illuminate\Support\Facades\Mail;
use App\Email\Inscription;
use stdClass;

class UserController extends Controller
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
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        //
    }

    /**
     * @param Request $request
     * @param $user_id
     * @return \Illuminate\Http\JsonResponse
     */

    public function update(Request $request,  $user_id)
    {


            $validator = Validator::make($request->all(), [
                'nom'=> 'required|max:50',
            ]);

            if($validator->fails()){
                return response()->json([
                    'status'=>400,
                    'errors'=>$validator->messages()
                ]);

            } else{

                    if ($request->date_naissance > 13){
                        $user=Auth::user();
                        $user->nom=strtoupper(self::security($request->nom));
                        $user->prenom=ucwords(self::security($request->prenom));
                        $user->sexe=$request->sexe;
                        $user->nom_entreprise=self::security($request->nom_entreprise);
                        $user->code_postale=self::security($request->code_postale);
                        $user->portable=self::security(str_replace(" ","",$request->portable));
                        $user->date_naissance=$request->date_naissance;
                        $user->adresse=$request->adresse;

                        $user->save();

                        return response()->json([
                            'status'=>200,
                            'message'=>'User Updated Successfully.',
                            'user'=> [$user],
                        ]);

                    }else {

                        return response()->json([
                        'status'=>404,
                        'message'=>'La date de naissance entrée est inférieur à celle autorisée.'
                ]);

                }
            }

    }


    public function updateEmail(Request $request,  $user_id)
    {

            $validator = Validator::make($request->all(), [
                'email'=> 'required|email|unique:users',
            ]);

            if($validator->fails()){
                return response()->json([
                    'status'=>400,
                    'message'=> 'This email exists already!'
                ]);

            } else{
                $user=User::find(Auth::user()->id);

                 if ($user instanceof  User){
                        if (Hash::check($request->password, $user->password)){

                            $user->email=self::security($request->email);
                            $user->save();

                            return response()->json([
                                'status'=>200,
                                'message'=>'Mise à jour effectuée avec succès.'
                            ]);
                        }else{
                            return response()->json([
                                'status'=>404,
                                'message'=>'Invalid User passoword.'

                            ]);
                        }
                    }
         }

    }

    public function updatePassword(Request $request, $user_id){

        $validator = Validator::make($request->all(), [
            'password' => 'nullable|required_with:password_confirmation|string|confirmed',
        ]);

        if($validator->fails()){
            return response()->json([
                'status'=>404,
                'errors'=>$validator->messages()
            ]);

        } else{

                    $user=User::find(Auth::user()->id);

                    if ($user instanceof User){
                        if (Hash::check($request->password_actuel, $user->password)){
                                $user->password=Hash::make($request->password);
                                $user->save();

                                return response()->json([
                                    'status'=>200,
                                    'message'=>'Mise à jour effectuée avec succès !'

                                ]);

                        }
                        else{

                            return response()->json([
                                'status'=>401,
                                'message'=>'Incorrect password !'

                            ]);
                        }

                    }
        }

}
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        //
    }

    function getUserFavorisBis($id_user){
        $mesfavoris = MesFavoris::where('id_user', $id_user)->get();
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

    }


    public function changeDevise(Request $request)
    {

        $devisesUser = [];
        
        $request->validate(
            [
                'devise' => ['required', 'integer', Rule::exists('devises', 'id')->where(function ($req){
                    return $req->where([['locked', 0], ['deleted', 0]]);
                })],
                'langue' => ['required', 'integer', Rule::exists('langues', 'id')->where(function ($req){
                    return $req->where([['locked', 0], ['deleted', 0]]);
                })]
            ]
        );

        $data = [
            'langue_id' => $request->get('langue'),
            'devise_id' => $request->get('devise')
        ];

        if (Auth::check()) {
            $user = Auth::user();
            $user->langue_id = $request->get('langue');
            $user->devise_id = $request->get('devise');
            $user->save();

            $devisesUser = Devise::select('id', 'code')->where('id', $user->devise_id)->get();
        }

        $_SESSION['config']['user-devise'] = (Devise::where('id', $data['devise_id'])->first())->toArray();
        $_SESSION['config']['user-langue'] = (Langue::where('id', $data['langue_id'])->first())->toArray();

        return response()->json([
            'status'=>200,
            'devize'=> [$devisesUser]
        ]);
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function changerBoutique(Request $request)
    {
        $request->validate(
            [
                'pays' => ['required', 'integer', Rule::exists('pays', 'id')->where(function ($req){
                    return $req->where([['locked', 0], ['deleted', 0]]);
                })],
                'city' => ['required', 'integer', 'exists:cities,id'],
            ],
            [
                'pays.*' => "Mauvaise selection",
                'cities.*' => "Mauvaise selection"
            ]
        );

        $state = State::with(
            [
                'cities' => function($req) use ($request){
                    return $req->where('id', self::security($request->get('city')));
                }
            ]
        )->whereIn('id', function ($req) use ($request){
            $req->select('state_id')->from((new City)->getTable())->where('id', self::security($request->get('city')));
        })->first();

        //dd($state);

        Main::setSessionPays($request->get('pays'));
        Main::setSessionProvince($state);

        $data = [
            'redirect' => [
                'url' => '',
                'active' => 1
            ],

            'error' => 0
        ];


        return response()->json([$data]);
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function listProvince(Request $request)
    {

        $str = '';
        $pays = Pays::with(
            [
                'states' => function($req){
                    return $req->orderBy('iso2', 'asc');
                },
                'country'
            ]
        )->where('id', htmlspecialchars($request->get('pays_id')))->first();
        if ($pays instanceof Pays && $pays->states->count() > 0 && $pays->id == $_SESSION['config']['ma-position']['id']) {
            foreach ($pays->states as $state){
                $str .= "<option value='{$state->id}' >{$state->name}</option>";
            }
        }
        else{
            $country = $pays->country;
            if ($country instanceof Country) {
                $state = State::with(
                    [
                        'cities'
                    ]
                )
                    ->whereIn('id', function ($req) use ($pays){
                        $req->select('state_id')->from((new City)->getTable())->where([['country_code', $pays->alpha2], ['name', 'LIKE', '%'. $pays->country->capital .'%']]);
                    })->first();
                $str = "<option value=". $state->id .">". $state->text($state->name) ."</option>";
            }
        }

        return response()->json($str);
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function listVille(Request $request)
    {

        $pays = Pays::with(
            [
                'country' => function($req){
                    return $req->with(
                        [
                            'pays',
                            'cities' => function($req){
                                return $req->orderBy('state_code', 'asc');
                            }
                        ]
                    );
                }
            ]
        )->where('id', htmlspecialchars($request->get('pays_id')))->first();
        $str = '';
        $disabled = true;

        if ($pays instanceof Pays) {
            if ($pays->id == $_SESSION['config']['ma-position']['id']) {
                $country = $pays->country;
                $disabled = false;
                if ($country instanceof Country && $country->cities->count() > 0) {
                    foreach ($country->cities as $city) {
                        $str .= "<option ". ($city->id == $_SESSION['config']['ma-position']['states'][0]['cities'][0]['id'] ? 'selected' : '') ." value='{$city->id}'>{$city->name}</option>";
                    }
                }
            } else {
                $capital = City::where([['name', $pays->country->capital], ['country_code', $pays->alpha2]])->first();
                if ($capital instanceof City) {
                    $str = "<option selected value='{$capital->id}'>" . $capital->text($capital->name) . "</option>";
                }
                else{
                    $capital = City::where([['name', 'LIKE', '%'. $pays->country->capital .'%'], ['country_code', $pays->alpha2]])->first();
                    if ($capital instanceof City) {
                        $str = "<option selected value='{$capital->id}'>" . $capital->text($capital->name) . "</option>";
                    }
                    else{
                        $capital = City::where('name', $pays->country->capital)->first();
                        $str = "<option selected value='{$capital->id}'>" . $capital->text($capital->name) . "</option>";
                    }
                }
            }
        }
        $data = [
            'options' => $str,
            'disabled' => $disabled
        ];
        return response()->json($data);
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    function get_ip() {
        $ipaddress = '';
         if (isset($_SERVER['HTTP_CLIENT_IP']))
             $ipaddress = $_SERVER['HTTP_CLIENT_IP'];
         else if(isset($_SERVER['HTTP_X_FORWARDED_FOR']))
             $ipaddress = $_SERVER['HTTP_X_FORWARDED_FOR'];
         else if(isset($_SERVER['HTTP_X_FORWARDED']))
             $ipaddress = $_SERVER['HTTP_X_FORWARDED'];
         else if(isset($_SERVER['HTTP_FORWARDED_FOR']))
             $ipaddress = $_SERVER['HTTP_FORWARDED_FOR'];
         else if(isset($_SERVER['HTTP_FORWARDED']))
             $ipaddress = $_SERVER['HTTP_FORWARDED'];
         else if(isset($_SERVER['REMOTE_ADDR']))
             $ipaddress = $_SERVER['REMOTE_ADDR'];
         else
             $ipaddress = 'UNKNOWN';
         return $ipaddress;
     }

     function getClientUnNotifiedCommande($id_marchand) {

        $nom_commandes_marchand
        = DB::table('commande_produits')
        ->join('produits', 'produits.id', '=', 'commande_produits.id_produit')
        ->join('boutiques', 'boutiques.id', 'produits.boutique_id')
        ->join('recap_commandes', 'recap_commandes.id', 'commande_produits.order_id')
        ->join('users', 'users.id', '=', 'recap_commandes.user_id')
        ->select('recap_commandes.ref_commande', 'recap_commandes.id', 'recap_commandes.nombre_article', 'recap_commandes.totaf_facturation', 'recap_commandes.totaf_facturation', 'recap_commandes.date_commande', 'recap_commandes.mode_payement', 'commande_produits.id_produit',  'users.email', 'users.nom', 'users.prenom', 'recap_commandes.status_commande', 'recap_commandes.status_code_commande')
        ->where('produits.boutique_id', $id_marchand)
        ->where('recap_commandes.notified', 'false')
        ->groupBy('commande_produits.order_id')
        ->get();

        return $nom_commandes_marchand;

    }

    public function login(Request $request)
    {

$redirect = ['active' => 0];

                $request->validate(
            [
                'email' => ['required'],
                'password' => ['required']
            ],
            [
                '*.required' => "Vous dévez saisir des données ici"
            ]
        );

        $is_email = "@";
        if(strpos($request->email, $is_email) !== false){
            $credentials = $request->only('email', 'password');
            $username = User::getUserByEmail($request->email)->get();
        } else{
            $credentials = ['portable' => str_replace(" ","",$request->email), 'password' => $request->password];
            $username = User::getUserByPortable($request->email)->get();
        }
        
        if(($username->count() > 0) && ($username[0]->email_verified_at !== NULL)) {

            $user = $username[0];

            if (empty($user->personal_key) || is_null($user->personal_key)) $user->personal_key = Main::getUserKey();
if(!is_null($user->maville)) $_SESSION['config']['user-ville'] = Main::arrayFormat($user->maville);

            $user->city_id = $_SESSION['config']['ma-position']['states'][0]['cities'][0]['id'];
            $user->state_id = $_SESSION['config']['ma-position']['states'][0]['id'];
            $user->pays_id = $_SESSION['config']['ma-position']['id'];

            
            if ($user instanceof User){

                Main::setSessionNotificationConfig($user);

                if ($user->accountLocked()){
                    $message = "Ce compte est bloqué";
                    $error = 1;
                }
                // $user->last_ip =  $_SERVER['REMOTE_ADDR'];
                $user->last_ip = $this->get_ip();
                if (Auth::attempt($credentials) && Hash::check(htmlspecialchars($credentials['password']), $user->password)) {
                    $user->last_login =  NOW();
                    $user->attemp_failed = 0;
                    $user->logout = 0;
                    try {
                        // zone de redirection
                        if ($user->role == 2) {

                            $_SESSION['role_marchand'] = $user->role;
                            $marchand_exist = Marchand::where('id_utilisateur', $user->id)->get();

                            $devises = Devise::select('id', 'code')->where('id', $user->devise_id)->first();

                            if ($marchand_exist->count() > 0) {
                                $marchand_boutique = Boutique::where('id_marchand', $marchand_exist['0']['id'])->get();
                                // $session_info_marchand['libelle'] = ;

                                // return $marchand_commande;

                                $_SESSION['boutique_marchand'] = $marchand_boutique[0]->libelle;
                                $_SESSION['boutique_marchand_id'] = $marchand_boutique[0]->id;
                                $_SESSION['boutique_profil_mage'] = $marchand_boutique[0]->image;

                                $marchand_commande = $this->getClientUnNotifiedCommande($_SESSION['boutique_marchand_id']);

                                if(count($marchand_commande) > 0) {
                                    foreach ($marchand_commande as $commande) {
                                        $order_updated = DB::table('recap_commandes')
                                        ->where('recap_commandes.ref_commande', '=', $commande->ref_commande)
                                        ->update([
                                            'notified' => "true"
                                        ]);
                                    }
                                }
                                
                                $redirect = [
                                    'url' => '/acceuil-marchand-marchand',
                                    'active' => 1
                                ];

                            }else {
                                $redirect = [
                                    'url' => '/marchand-space',
                                    'active' => 1
                                ];
                            }
                            

                        }else if($user->role == 4 || $user->role == 5 || $user->role == 6 || $user->role == 7){
                            $devises = Devise::select('id','code')->where('id', $user->devise_id)->first();
                            $_SESSION['role_marchand'] = $user->role;
                            $redirect = [
                                'url' => '/acceuil-marchand-marchand',
                                'active' => 1
                            ];
                        }else {
                            $devises = Devise::select('id','code')->where('id', $user->devise_id)->first();
                            $redirect = [
                                'url' => '',
                                'active' => 1
                            ];
                        }

                        Main::initSessions($user);

                        if($user->save()) Auth::login($user);
                        $message = "Vous êtes connectés";
                        $error = 0;
                        $status = 200;
                    }
                    catch (\Exception $exception){
                        $message = "<h3 class='text-danger'>La connexion a abouti avec certaines erreurs : {$exception->getMessage()}</h3>";
                        $redirect = [
                            'url' => '',
                            'active' => 0
                        ];
                        $error = 1;
                        Auth::logout();
                        $status = 419;
                    }
                }
                else{
                    if ($user->attemp_failed > 50000){
                        Auth::logout();
                        $user->locked = 1;
                        $user->save();
                        $message = "Ce compte est bloqué";
                        $error = 1;
                        $status = 419;
                    }
                    else{
                        $user->attemp_failed =  $user->attemp_failed+1;
                        $user->save();
                        $message = "Adresse mail ou mot de passe incorrect";
                        $error = 2;
                        $status = 419;
                    }
                }
            }
            else{
                $message = "Adresse mail ou mot de passe incorrect";
                $error = 2;
            }
} else if(($username->count() > 0) && ($username[0]->email_verified_at == NULL)) {
            $message = "Ce compte n' est pas vérifié";
            $error = 3;
            $devises = [];
        } else {
            $message = "Adresse mail ou mot de passe incorrect";
            $error = 2;
$devises = [];
        }

        if (Auth::check()) {
            $this->getUserFavorisBis(Auth::user()->id);
        }

        $data = [
            'redirect' => $redirect,
            'text' => $message,
            'error' => $error,
            'devises'=>  [$devises]
        ];

        // return user command
        $user_commande = new User();
        $user_command = $user_commande->getUserCommade(Auth::user()->id);
        $_SESSION['commande_client'] = $user_command;

        $directory = public_path('utilisateurs_temps_infos'); // The directory where you want to create the file
        $filename = 'welcome_user_'.Auth::user()->id.'_infos.txt';
        // $filename = 'example.txt'; // The name of the file
        $content = "This is the content of the file."; // The content you want to put in the file


        // Combine the directory and filename to create the full path
        $filePath = $directory . '/' . $filename;


        // Use file_put_contents to create the file and write the content
        if (file_put_contents($filePath, $content) !== false) {
            // return "File created successfully!";
        } else {
            // return "Failed to create the file.";
        }


        return response()->json([$data]);
    }

    public function confirmation($token, $email)
    {
        $user = User::where([['remember_token', htmlspecialchars($token)], ['email', htmlspecialchars($email)]])->get();
        if ($user->count() === 1 && $user[0] instanceof User){
            $user = $user[0];
            $user->remember_token = '';
            $user->email_verified_at = NOW();
            $user->save();
            Auth::login($user);
            return redirect('/');
        }
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function editConfig(Request $request)
    {
        return response()->json([$request->all()]);
    }

    /*avatar profile*/

    public function profile(){
        return view('profile', array('user' => Auth::user()) );
    }

    public function update_avatar(Request $request){

                // // Handle the user upload of avatar

        //     $avatar = $request->file('file');
        //     $filename = time() . '.' . $avatar->getClientOriginalExtension();
        //     Image::make($avatar)->resize(300, 300)->save( public_path('/uploads/avatars/' . $filename ) );

        $image_name = uniqid();

        $crop_destination = 'uploads/avatars/';

        $image_parts = explode(";base64,", request()->image);
        $image_type_aux = explode("image/", $image_parts[0]);

        $image_type = $image_type_aux[1];

        $image_base64 = base64_decode($image_parts[1]);

        $imageFullPath = $crop_destination . $image_name;

        file_put_contents($imageFullPath, $image_base64);

        $user = Auth::user();
        $user->image = $imageFullPath;
        $user->save();

        return $imageFullPath;

    }

    public function vendeur(Request $request)
    {

        $request->validate(
            [
                'nom' => ['required', 'string'],
                'prenom' => ['required', 'string'],
                'email' => ['required', 'string', 'unique:users,email'],
                'password' => ['required', 'confirmed']
            ],
            [
                'email.*' => "Veuiller saisir une adresse électronnique valide",
                'nom.*' => "Veuillez saisir un nom valide",
                'prenom.*' => "Veuillez saisir un prénom valide",
                'password.*'=> "Veuillez saisir un mot de passe valide",
                'password.confirmed' => "Vos deux mots de passe ne sont pas identiques"
            ]

        );

        //dd($request->all());

        $paysId = $_SESSION['config']['ma-position']['id'];

        $currencySymbole = DB::table('pays')
            ->select('symbole')
            ->where('id', '=',  $paysId)
            ->get();

        foreach ($currencySymbole as $currency) {
            //echo $currency->symbole;
            if($currency->symbole === 'XAF'){$Ddevise = 1;}
            elseif($currency->symbole === '$'){$Ddevise = 4;}
            elseif($currency->symbole === 'XOF'){$Ddevise = 3;}
            elseif($currency->symbole === '€'){$Ddevise = 2;}
            else{$Ddevise = 1;}
        }

        //echo $Ddevise;



        $user = User::create(
            [
                'nom' => strtoupper(self::security($request['nom'])),
                'prenom' => ucwords(self::security($request['prenom'])),
                'email' => self::security($request['email']),
                'password' => Hash::make(htmlspecialchars($request['password'])),
                'role' => '2',
                'personal_key' => Main::getUserKey(),
                'city_id' => $_SESSION['config']['ma-position']['states'][0]['cities'][0]['id'],
                'state_id' => $_SESSION['config']['ma-position']['states'][0]['id'],
                'pays_id' => $_SESSION['config']['ma-position']['id'],
                'last_ip' => $_SERVER['REMOTE_ADDR'],
                'devise_id' => $Ddevise
            ]
        );

        Main::setSessionNotificationConfig($user);

        if ($user instanceof User) {
            Auth::login($user);
            $user->notificationConfig()->create();
            try {
                // $user->sendEmail();
                $url = url('/verify_vendeur_email/'.$user->id);
                $user->sendVendeurEmailVerification($url); 
            }
            catch (\Exception $exception){}

            $data = [
                'error' => 0,
                'redirect' => [
                    'url' => url('/marchand-space'),
                    'active' => 1
                ],
                'message' => "Compte créé avec success"
            ];

        }
        Main::initSessions($user);
        return response()->json([$data]);
    }

    public function send_message(Request $request) {
        return $request;
    }

    public function sendMessage(Request $request) {
        $user = User::find(77);
        $id = 77;
        $user = Auth::user();
        $event = event(new RealTimeMessage($request->message));
        return $event;
    }

    public function startNegociate(Request $request){
        $user = Auth::user();
        $date_message = date('d-m-y h:i:s');
        $id_produit = $request->id_produit;
        $negociation = ProduitNegociation::create([
            'user_from' => $user->id,
            'user_to' => 243,
            'text_message' => $request->message,
            'product_id' => $id_produit,
            'date_message' => $date_message
        ]);
        $event = event(new RealtimeNegociation($user, $request->message, 243, $id_produit));
        return $user;
    }

    public function respondNegociation(Request $request) {

        $user = Auth::user();
        $message = $request->msg;
        $date_message = date('d-m-y h:i:s');
        $id_produit = $request->id_produit;
        $user_to = $request->user_to;

        $_SESSION['user_to'] = $user_to;

        $negociation = ProduitNegociation::create([
            'user_from' => $user->id,
            'user_to' => $user_to,
            'text_message' => $message,
            'product_id' => $id_produit,
            'date_message' => $date_message
        ]);

        $event = event(new RealtimeNegociation($user, $message, $user_to, $id_produit));

    }

        // login depuis le parcous panier
        public function inviteLogin(Request $request) {



        $credentials = $request->only('email', 'password');
        $user = new \stdClass();
        $username = User::getUserByEmail($request->email)->get();
        
        if (count($username) > 0) {
            $user = $username[0];
        }

        if ($user instanceof User){
        if (Auth::attempt($credentials) && Hash::check(htmlspecialchars($credentials['password']), $user->password)) {

        $user->last_login =  NOW();
        $user->attemp_failed = 0;
        $user->logout = 0;

        // if (isset($request->instock) && ($request->instock == 'active')) {
            
        //     // return 'Notify instock activated ... ';
        //     $user_notification = [
        //         'user_id' => $user->id,
        //         'id_produit' => $request->product_id,
        //     ];
    
        //     $createNotif = InStockNotifyer::create($user_notification);

        // }

        Main::initSessions($user);
        Main::setSessionNotificationConfig($user);

        if($user->save())  Auth::login($user);

        $message = "Vous êtes connectés";
        $error = 0;
        $status = 200;

        if (isset($_SESSION['session_invite'])) {
            unset($_SESSION['session_invite']);
        }

        $carnets = CarnetAdresse::where('user_id', Auth::user()->id)->get();

        if (count($carnets) > 0) {
            $_SESSION['user_adresse_achat'] = $carnets[0]->toArray(); // chargement de l'adress dans la session
        }

        // return user command
        $user_commande = new User();
        $user_command = $user_commande->getUserCommade(Auth::user()->id);
        $_SESSION['commande_client'] = $user_command;

        return response()->json([
            'status'=>200,
            'user' => $user,
            'carnet'=> $carnets,
            'email' =>Auth::user()->email,
            'client_commande' => $user_command
        ]);

        }else {
        return response()->json([
            'status'=>405,
            'user' => 0,
            'carnet'=> [],
            'email' =>0,
            'client_commande' => 0
        ]);
        }

        }else {
            return response()->json([
                'status'=>405,
                'user' => 0,
                'carnet'=> [],
                'email' =>0,
            ]);
        }
        }

        // set invité session
        public function setInviterSession(Request $request) {
            $_SESSION['session_invite'] = array();
            array_push($_SESSION['session_invite'], $request->all());
            return $_SESSION['session_invite'];
        }

        public function getCurrentUserData(Request $request) {
            $user=User::find(Auth::user()->id);
            return $user;
        }
 
        public function redirectToFacebook(Request $request) {
            
            $appId = '1207420726577218';
            $code = random_int(100000, 999999);
            $redirectUri = urlencode('https://toulemarket.com/facebook_manualy_login/');
            $state = 'fb-'.$code.'_tm';

            $url = "https://www.facebook.com/v17.0/dialog/oauth?client_id={$appId}&redirect_uri={$redirectUri}&state={$state}";

            return redirect()->away($url);

        }

        public function handleFacebookCallback(Request $request) {
            $appId = '1207420726577218';
            $appSecret = '8166d70485fc15dad11386e23d559c74';
            $redirectUri = 'https://toulemarket.com/facebook_manualy_login/';
        
            $code = $request->query('code');
        
            // Exchange the authorization code for an access token
            $accessTokenResponse = Http::get("https://graph.facebook.com/v17.0/oauth/access_token", [
                'client_id' => $appId,
                'client_secret' => $appSecret,
                'redirect_uri' => $redirectUri,
                'code' => $code
            ]);
        
            $accessTokenData = $accessTokenResponse->json();

            // dd($accessTokenData);
        
            if(isset($accessTokenData['access_token'])) {
                // Access token success obtained
                // Use the access token

                try{
                    $userDataResponse = Http::get("https://graph.facebook.com/me", [
                        'access_token' => $accessTokenData['access_token'],
                        'fields' => 'id,first_name,last_name,name,email,picture', // Specify the fields you want to retrieve
                    ]);
            
                    $userData = $userDataResponse->json();
                    // dd($userData);
    
                    $use_id = isset($userData["id"]) ? $userData["id"] : "";
                    $firstname = isset($userData["first_name"]) ? $userData["first_name"] : "";
                    $lastname = isset($userData["last_name"]) ? $userData["last_name"] : "";
                    $user_name = isset($userData["name"]) ? $userData["name"] : null;
                    $user_email = isset($userData["email"]) ? $userData["email"] : "";
                    $user_image = isset($userData["picture"]["data"]["url"]) ? $userData["picture"]["data"]["url"] : "";
    
                    $user = User::with([
                        'notificationConfig',
                        'pays',
                        'province',
                        'maville',
                        'langue',
                        'devise'
                    ])->where('facebook_key', $use_id)
                    ->get();
    
                    if ($user->count() > 0 && $user[0] instanceof User) {
    
                        $user = $user[0];
                        Main::initSessions($user);
                        Auth::login($user);
                        Main::setSessionNotificationConfig($user);
                    
                        $tm_url = 'https://toulemarket.com';
        
                        return redirect()->away($tm_url);
    
                    } else {
                        $key = Main::getUserkey();
                        $user = User::create([
                            'nom' => $lastname,
                            'prenom' => $firstname,
                            'email' => $user_email,
                            'facebook_key' => $use_id,
                            'password' => Hash::make($key),
                            'pays_id' => $_SESSION['config']['ma-position']['id'],
                            'image' => $user_image,
                            'state_id' => $_SESSION['config']['ma-position']['states'][0]['id'],
                            'last_ip' => $_SERVER['REMOTE_ADDR'],
                            'city_id' => $_SESSION['config']['ma-position']['states'][0]['cities'][0]['id'],
                            'last_login' => NOW(),
                            'facebook_user' => $user_name,
                            'personal_key' => $key,
                        ]
                        );
                
                        Main::initSessions($user);
                        Auth::login($user);
                        Main::setSessionNotificationConfig($user);
                    
                        // return response()->json(['status' => '200']);
                        $tm_url = 'https://toulemarket.com';
                        return redirect()->away($tm_url);
                    }
                }catch(Exception $e) {
                    $tm_url = 'https://toulemarket.com';
                    return redirect()->away($tm_url);
                }
        
            } else {
                $tm_url = 'https://toulemarket.com';
                return redirect()->away($tm_url);
                // dd('Ya problème lors de la connexion facebook');
            }
        }

        public function resendEmailCode(Request $request) {
            $unique_code = rand(1000,9999);

            $username = User::getUserByEmail($request->email)->get();

            $user = $username[0];

            $phone_confirmation = [
                'phone_number' => $request->email,
                'code' => $unique_code,
                'user_id' => $user->id
            ];
    
            $phone_verification = PhoneVerificationUser::create($phone_confirmation);

            Mail::to($user->email)->send(new Inscription($user));

            return $phone_verification;

        }

}
