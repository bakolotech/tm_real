<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Main;
use App\Models\Pays;
use App\Providers\RouteServiceProvider;
use App\User;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{

    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
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
        $this->middleware('guest')->except('logout');
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function login(Request $request)
    {
        $request->validate(
            [
                'email' => ['required'],
                'password' => ['required']
            ],
            [
                '*.required' => "Vous dévez saisir des données ici"
            ]
        );

        $redirect = ['active' => 0];

        $credentials = $request->only('email', 'password');

        $username = User::getUserByEmail($request->email)->get();

        if($username->count() > 0) {
            $user = $username[0];
            if (empty($user->personal_key) || is_null($user->personal_key)) $user->personal_key = Main::getUserKey();
            if ($user instanceof User){
                if ($user->accountLocked()){
                    $message = "Ce compte est bloqué";
                    $error = 1;
                }
                $user->last_ip =  $_SERVER['REMOTE_ADDR'];
                if (Auth::attempt($credentials) && Hash::check(htmlspecialchars($credentials['password']), $user->password)) {

                    unset($_SESSION['config']);

                    $pays = Pays::getPays($user);

                    $user->last_login =  NOW();
                    $user->attemp_failed = 0;
                    //$user->logout = 0;
                    try {
                        $user->save();
                        $redirect = [
                            'url' => url('/'),
                            'active' => 1
                        ];

                        /*$_SESSION['config']['user-pays'] = $pays->id;
                        Main::setSessionProvince($user->province);*/
                        if(!is_null($user->maville)) $_SESSION['config']['user-ville'] = Main::arrayFormat($user->maville);

                        if(!is_null($user->devise)) $_SESSION['config']['user-devise'] = ($user->devise)->toArray();
                        if(!is_null($user->langue)) $_SESSION['config']['user-langue'] = ($user->langue)->toArray();

                        Auth::login($user);
                        $message = "Vous êtes connectés";
                        $error = 0;
                    }
                    catch (\Exception $exception){
                        $message = "<h3 class='text-danger'>La connexion a abouti avec certaines erreurs : {$exception->getMessage()}</h3>";
                        $redirect = [
                            'url' => '',
                            'active' => 0
                        ];
                        $error = 1;
                    }
                }
                else{
                    if ($user->attemp_failed > 5){
                        Auth::logout();
                        $user->locked = 1;
                        $user->save();
                        $message = "Ce compte est bloqué";
                        $error = 1;
                    }
                    else{
                        $user->attemp_failed =  $user->attemp_failed+1;
                        $user->save();
                        $message = "Adresse mail ou mot de passe incorrect";
                        $error = 2;
                    }
                }
            }
            else{
                $message = "Adresse mail ou mot de passe incorrect";
                $error = 2;
            }
        } else {
            $message = "Adresse mail ou mot de passe incorrect";
            $error = 2;
        }

        $data = [
            'redirect' => $redirect,
            'text' => $message,
            'error' => $error
        ];

        return response()->json([$data]);
    }

}
