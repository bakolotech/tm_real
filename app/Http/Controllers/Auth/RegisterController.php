<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Main;
use App\Providers\RouteServiceProvider;
use App\User;
use App\Models\Collabo;
use App\Models\PhoneVerificationUser;
use App\Events\InvitationNotif;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Carbon\Carbon;




use Illuminate\Support\Facades\DB;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);
    }

    function checkIfEmailExists($email)
    {
        $user = User::where('email', $email)
                    ->where('deleted', 0)
                    ->first();

        if ($user) {
            return true; // Number or email already exists
        }

        return false; // Number or email does not exist

    }

    function checkIfPhoneExists($phoneNumber)
    {
        $user = User::where('portable', $phoneNumber)
                    ->where('deleted', 0)
                    ->first();

        if ($user) {
            return true; // Number or email already exists
        }

        return false; // Number or email does not exist
    }

    public function register(Request $request)
    {
        $is_email = "@";
        $phone_email = 0;
        $phone_exist = false;
        $email_exist = false;

        $phone_validation_code = mt_rand(1000, 9999);

        if(strpos($request->email, $is_email) !== false){
            $phone_email = 1;
            $email_exist = $this->checkIfEmailExists($request->email);
            $request->validate(
                [
                    'email' => ['required', 'string', 'unique:users,email'],
                ],
                [
                    'email.*' => "Veuiller saisir une adresse électronnique ou un numéro de téléphone valide",
                ]
            );
        } else{
            $phone_email = 2;
            $phone_exist = $this->checkIfPhoneExists($request->email);
            $request->validate(
                [
                    'email' => 'required|regex:/^([0-9\s\-\+\(\)]*)$/|min:9',
                ],
                [
                    'email.*' => "Veuiller saisir une adresse électronnique ou un numéro de téléphone valide",
                ]
            );
        }

        $request->validate(
            [
                'nom' => ['required', 'string'],
                'prenom' => ['required', 'string'],
                'sexe' => ['required', Rule::in(['H', 'F'])],
                'ville' => ['required', 'string'],
                'password' => ['required', 'confirmed']
            ],
            [
                'nom.*' => "Veuillez saisir un nom valide",
                'prenom.*' => "Veuillez saisir un prénom valide",
                'sexe.*' => "Veuillez choisir votre genre",
                'ville.*' => "Veuillez choisir votre lieu de résidence",
                'password.*'=> "Veuillez saisir un mot de passe valide",
                'password.confirmed' => "Vos deux mots de passe ne sont pas identiques"
            ]

        );



        $paysId = $_SESSION['config']['ma-position']['id'];

        $currencySymbole = DB::table('pays')
            ->select('symbole')
            ->where('id', '=',  $paysId)
            ->get();

        foreach ($currencySymbole as $currency) {
            //echo $currency->symbole;
            if($currency->symbole === 'XAF'){$Ddevise = 1;}
            elseif($currency->symbole === '$'){$Ddevise = 4;}
            elseif($currency->symbole === 'EUR'){$Ddevise = 2;}
            elseif($currency->symbole === '€'){$Ddevise = 2;}
            else{$Ddevise = 1;}
        }



        if ($request->champ_pour_inviter == "ViaInvitation") { //Inscription via lien d'invitation
            if ($phone_email == 1) {
                $user = User::create(
                    [
                        'nom' => strtoupper(self::security($request['nom'])),
                        'prenom' => ucwords(self::security($request['prenom'])),
                        'sexe' => self::security($request['sexe']),
                        'ville' => self::security($request['ville']),
                        'email' => self::security($request['email']),
                        'password' => Hash::make(htmlspecialchars($request['password'])),
                        'personal_key' => Main::getUserKey(),
                        'city_id' => $_SESSION['config']['ma-position']['states'][0]['cities'][0]['id'],
                        'state_id' => $_SESSION['config']['ma-position']['states'][0]['id'],
                        'pays_id' => $_SESSION['config']['ma-position']['id'],
                        'last_ip' => $_SERVER['REMOTE_ADDR'],
                        'role' => 6,
                        'devise_id' => $Ddevise
                    ]
                );
            } elseif ($phone_email == 2) {
                $user = User::create(
                    [
                        'nom' => strtoupper(self::security($request['nom'])),
                        'prenom' => ucwords(self::security($request['prenom'])),
                        'sexe' => self::security($request['sexe']),
                        'ville' => self::security($request['ville']),
                        'email' => "",
                        'password' => Hash::make(htmlspecialchars($request['password'])),
                        'personal_key' => Main::getUserKey(),
                        'city_id' => $_SESSION['config']['ma-position']['states'][0]['cities'][0]['id'],
                        'state_id' => $_SESSION['config']['ma-position']['states'][0]['id'],
                        'pays_id' => $_SESSION['config']['ma-position']['id'],
                        'last_ip' => $_SERVER['REMOTE_ADDR'],
                        'portable' => str_replace(" ","",$request['email']),
                        'role' => 6,
                        'devise_id' => $Ddevise,
                        'deleted' => 1
                    ]
                );
            }

            if ($user instanceof User) {
                $user->notificationConfig()->create();
                try {
                    $user->sendEmail();
                }
                catch (\Exception $exception){}
                // $updateUser = User::where('id', $user->id)->update(['role' => 6]);
                $updateCollabo = Collabo::where('id', $request->champ_collabo)->update(['id_utilisateur' => $user->id]);
                // event(new InvitationNotif($request->champ_pour_envoyeur_invite));
                $data = [
                    'error' => 0,
                    'redirect' => [
                        // 'url' => url('/acceuil-marchand-marchand'),
                        'url' => url('/'),
                        'active' => 1
                    ],
                    'message' => "Compte créé avec success",
                    'email' => $request->email,
                    'validation_code' => 0
                ];

            }
            // $voirNotif = event(new InvitationNotif("$request->champ_pour_envoyeur_invite"));
            // return response()->json(["Id collabo compte" => $user->id]);
            Main::initSessions($user);
            return response()->json([$data]);
        }else { // Inscription ordinaire
        if ($phone_email == 1) {
            $user = User::create(
                [
                    'nom' => strtoupper(self::security($request['nom'])),
                    'prenom' => ucwords(self::security($request['prenom'])),
                    'sexe' => self::security($request['sexe']),
                    'ville' => self::security($request['ville']),
                    'email' => self::security($request['email']),
                    'password' => Hash::make(htmlspecialchars($request['password'])),
                    'personal_key' => Main::getUserKey(),
                    'city_id' => $_SESSION['config']['ma-position']['states'][0]['cities'][0]['id'],
                    'state_id' => $_SESSION['config']['ma-position']['states'][0]['id'],
                    'pays_id' => $_SESSION['config']['ma-position']['id'],
                    'last_ip' => $_SERVER['REMOTE_ADDR'],
                    'devise_id' => $Ddevise
                ]
            );
        } elseif ($phone_email == 2 && !$phone_exist) {
            $user = User::create(
                [
                    'nom' => strtoupper(self::security($request['nom'])),
                    'prenom' => ucwords(self::security($request['prenom'])),
                    'sexe' => self::security($request['sexe']),
                    'ville' => self::security($request['ville']),
                    'email' => "",
                    'password' => Hash::make(htmlspecialchars($request['password'])),
                    'personal_key' => Main::getUserKey(),
                    'city_id' => $_SESSION['config']['ma-position']['states'][0]['cities'][0]['id'],
                    'state_id' => $_SESSION['config']['ma-position']['states'][0]['id'],
                    'pays_id' => $_SESSION['config']['ma-position']['id'],
                    'last_ip' => $_SERVER['REMOTE_ADDR'],
                    'portable' => str_replace(" ","",$request['email']),
                    'devise_id' => $Ddevise,
                    'deleted' => 1
                ]
            );
        }

        if ($user instanceof User) {

            
            
            $user->notificationConfig()->create();
            try {
                $user->sendEmail();
            }
            catch (\Exception $exception){}
            $data = [
                'error' => 0,
                'redirect' => [
                    'url' => url('/'),
                    'active' => 1
                ],
                'message' => "Compte créé avec success",
                'email' => $request->email,
                'validation_code' => $phone_validation_code
            ];

        }
        Main::initSessions($user);
        return response()->json([$data]);
    }

}

public function achat_register(Request $request)
{
    $is_email = "@";
    $phone_email = 0;

    $email_exist = false;
    $phone_exist = false;

    $phone_validation_code = mt_rand(1000, 9999);

    if(strpos($request->email, $is_email) !== false){
        $email_exist = $this->checkIfEmailExists($request->email);
    } else if(strpos($request->email, $is_email) == false) {
        $phone_exist = $this->checkIfPhoneExists($request->email);
    }

    if ($email_exist || $phone_exist) {

        $data = [
            'error' => 2,
            'redirect' => [
                'url' => url('/'),
                'active' => 1
            ],
            'message' => "Cette adresse mail ou numéro de téléphone existe déjà",
            'email' => "",
            'validation_code' => ""
        ];

        return response()->json([$data]);
        // return 'Ce cette adresse mail ou numéro de téléphone existe déjà';
    }else {
        $request->validate(
            [
                'nom' => ['required', 'string'],
                'prenom' => ['required', 'string'],
                'sexe' => ['required', Rule::in(['H', 'F'])],
                'ville' => ['required', 'string'],
                'password' => ['required', 'confirmed']
            ],
            [
                'nom.*' => "Veuillez saisir un nom valide",
                'prenom.*' => "Veuillez saisir un prénom valide",
                'sexe.*' => "Veuillez choisir votre genre",
                'ville.*' => "Veuillez choisir votre lieu de résidence",
                'password.*'=> "Veuillez saisir un mot de passe valide",
                'password.confirmed' => "Vos deux mots de passe ne sont pas identiques"
            ]

        );

        $paysId = $_SESSION['config']['ma-position']['id'];

        $currencySymbole = DB::table('pays')
            ->select('symbole')
            ->where('id', '=',  $paysId)
            ->get();

        foreach ($currencySymbole as $currency) {
            //echo $currency->symbole;
            if($currency->symbole === 'XAF'){$Ddevise = 1;}
            elseif($currency->symbole === '$'){$Ddevise = 4;}
            elseif($currency->symbole === 'EUR'){$Ddevise = 2;}
            elseif($currency->symbole === '€'){$Ddevise = 2;}
            else{$Ddevise = 1;}
        }

        if (strpos($request->email, $is_email) !== false) {
            $user = User::create(
                [
                    'nom' => strtoupper(self::security($request['nom'])),
                    'prenom' => ucwords(self::security($request['prenom'])),
                    'sexe' => self::security($request['sexe']),
                    'ville' => self::security($request['ville']),
                    'email' => self::security($request['email']),
                    'password' => Hash::make(htmlspecialchars($request['password'])),
                    'personal_key' => Main::getUserKey(),
                    'city_id' => $_SESSION['config']['ma-position']['states'][0]['cities'][0]['id'],
                    'state_id' => $_SESSION['config']['ma-position']['states'][0]['id'],
                    'pays_id' => $_SESSION['config']['ma-position']['id'],
                    'last_ip' => $_SERVER['REMOTE_ADDR'],
                    'devise_id' => $Ddevise
                ]
            );
        }else if(strpos($request->email, $is_email) == false) {
            $user = User::create(
                [
                    'nom' => strtoupper(self::security($request['nom'])),
                    'prenom' => ucwords(self::security($request['prenom'])),
                    'sexe' => self::security($request['sexe']),
                    'ville' => self::security($request['ville']),
                    'email' => "",
                    'password' => Hash::make(htmlspecialchars($request['password'])),
                    'personal_key' => Main::getUserKey(),
                    'city_id' => $_SESSION['config']['ma-position']['states'][0]['cities'][0]['id'],
                    'state_id' => $_SESSION['config']['ma-position']['states'][0]['id'],
                    'pays_id' => $_SESSION['config']['ma-position']['id'],
                    'last_ip' => $_SERVER['REMOTE_ADDR'],
                    'portable' => str_replace(" ","",$request['email']),
                    'devise_id' => $Ddevise,
                    'deleted' => 1
                ]
            );
        }

        if ($user instanceof User) {

            // $phone_confirmation = [
                //     'phone_number' => $request->email,
                //     'code' => $phone_validation_code,
                //     'user_id' => $user->id
            // ];

            // $phone_verification = PhoneVerificationUser::create($phone_confirmation);

            $user->notificationConfig()->create();
            try {
                $user->sendEmail();
            }
            catch (\Exception $exception){}
            $data = [
                'error' => 0,
                'redirect' => [
                    'url' => url('/'),
                    'active' => 1
                ],
                'message' => "Compte créé avec success",
                'email' => $request->email,
                'validation_code' => $phone_validation_code
            ];

            Main::initSessions($user);
            return response()->json([$data]);

        }else {

            $data = [
                'error' => 1,
                'redirect' => [
                    'url' => url('/'),
                    'active' => 1
                ],
                'message' => "Compte créé avec success",
                'email' => $request->email,
                'validation_code' => $phone_validation_code
            ];

            return response()->json([$data]);

        }

    }

}

public function updatePhoneCodeStatus(Request $request) {

    DB::table('phone_verification_users')
    ->where('phone_verification_users.code', '=', $request->phone_code)
    ->where('phone_number', $request->phone_number)
    ->update([
        'isVerified' =>  '1'
    ]);

    $user_id = DB::table('phone_verification_users')
    ->where('code', $request->phone_code)
    ->where('isVerified', 1)
    ->get();

    $currentDate = Carbon::now();
    $formattedDate = $currentDate->format('Y-m-d H:i:s');

    if(count($user_id) > 0) {

        $user_id_val = $user_id[0]->user_id;

        $activate_user = DB::table('users')->where('id', $user_id_val)->update([
            'deleted' => 0,
            'email_verified_at' => $formattedDate
        ]);

        $data = [
            'message' => 'Statut modifier avec succes',
            'error' => 0
        ];

        return response()->json($data);

    }else {

        $data = [
            'message' => 'Erreur de modification',
            'error' => 1
        ];

        return response()->json($data);

    }


}


public function updateUserValidationCode(Request $request) {
    $user = DB::table('phone_verification_users')
            ->where('phone_number', $request->phone_number)
            ->where('isVerified', 0)
            ->update([
                'code' => $request->num_code
            ]);

            if ($user) {
                return response()->json([
                    'status'=> 200,
                    'message'=> 'Code renvoyé avec success',
                    'error'=> 0
                ]);
            }else {
                return response()->json([
                    'status' => 405,
                    'message' => 'Probleme lors du renvoie de code',
                    'error' => 1,
                ]);
            }

    return $request;

}

public function faceboologin(Request $request) {

    $user = User::with([
        'notificationConfig',
        'pays',
        'province',
        'maville',
        'langue',
        'devise'
    ])->where('facebook_key', $request->facebook_id)
    ->get();

    if ($user->count() > 0 && $user[0] instanceof User) {

        $user = $user[0];
        Main::initSessions($user);
        Auth::login($user);
        Main::setSessionNotificationConfig($user);
    
        return response()->json(['status' => '200']);
    }else {
        $key = Main::getUserkey();
        $user = User::create([
            'nom' => $request->facebook_lastname,
            'prenom' => $request->facebook_firstname,
            'email' => $request->facebook_email,
            'facebook_key' => $request->facebook_id,
            'password' => Hash::make($key),
            'pays_id' => $_SESSION['config']['ma-position']['id'],
            'image' => $request->facebook_picture,
            'state_id' => $_SESSION['config']['ma-position']['states'][0]['id'],
            'last_ip' => $_SERVER['REMOTE_ADDR'],
            'city_id' => $_SESSION['config']['ma-position']['states'][0]['cities'][0]['id'],
            'last_login' => NOW(),
            'facebook_user' => $request->facebook_name,
            'personal_key' => $key,
        ]
        );

        Main::initSessions($user);
        Auth::login($user);
        Main::setSessionNotificationConfig($user);
    
        return response()->json(['status' => '200']);
    }

    // return redirect(url('/'));
}
}
