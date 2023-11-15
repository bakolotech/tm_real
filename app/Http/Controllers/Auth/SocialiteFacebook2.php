<?php

namespace App\Http\Controllers\Auth;

use App\User;
use Exception;
use App\Models\Main;
use App\Http\Controllers\Controller;
use GuzzleHttp\Psr7\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Laravel\Socialite\Facades\Socialite;

class SocialiteFacebook2 extends Controller
{
    public function login()
    {
        return Socialite::driver('facebook')->redirect();
    }

    public function redirect()
    {
        $googleUser = Socialite::driver('facebook')->user();
        dd($googleUser->user);
        try {
        $user = User::with(
            [
                'notificationConfig',
                'pays',
                'province',
                'maville',
                'langue',
                'devise'
            ]
        )
            ->where('google_key', $googleUser->id)
            ->orWhere(function ($req) use ($googleUser){
                return $req->where('email', $googleUser['email'])->orWhereNull('email');
            })
            ->get();

        if ($user->count() > 0 && $user[0] instanceof User) {
            $user = $user[0];
            if(empty($user->google_key)) $user->google_key = $googleUser->id;

            $user->image = $googleUser->avatar;

            if(empty($user->email)) $user->email = $googleUser->email;

            $user->last_login = NOW();
            $user->pays_id = $_SESSION['config']['ma-position']['id'];
            $user->last_ip = $_SERVER['REMOTE_ADDR'];
            $user->city_id = $_SESSION['config']['ma-position']['states'][0]['cities'][0]['id'];
            $user->state_id = $_SESSION['config']['ma-position']['states'][0]['id'];
            $user->google_user = json_encode($googleUser);
            if (empty($user->personal_key)) $user->personal_key = Main::getUserKey();
            $user->save();
        }
        else {
            $key = Main::getUserKey();
            $user = User::create(
                [
                    'nom' => strtoupper(self::security($googleUser->user['family_name'])),
                    'prenom' => ucwords(self::security($googleUser->user['given_name'])),
                    'email' => $googleUser['email'],
                    'google_key' => $googleUser->id,
                    'password' => Hash::make($key),
                    'pays_id' => $_SESSION['config']['ma-position']['id'],
                    'image' => $googleUser->avatar,
                    'state_id' => $_SESSION['config']['ma-position']['states'][0]['id'],
                    'last_ip' => $_SERVER['REMOTE_ADDR'],
                    'city_id' => $_SESSION['config']['ma-position']['states'][0]['cities'][0]['id'],
                    'last_login' => NOW(),
                    'google_user' => json_encode($googleUser),
                    'personal_key' => $key
                ]
            );
        }

        Main::initSessions($user);
        Auth::login($user);
        Main::setSessionNotificationConfig($user);
        return redirect(url('/'));
        }
        catch (\Exception $exception){
            dd($exception->getMessage());
            //return redirect(url('/'))->with('message-error', "Une erreur est suvenue. Réessayer plutard");
        }

    }

    public function redirect2(Request $request) {
        // try {

            $user = Socialite::with('facebook')->user();
            dd($user); exit;

            $user = Socialite::driver('facebook')->user();

            dd($user);

            $finduser = User::where('facebook_key', $user->id)->first();

            if($finduser){

                Auth::login($finduser);

                return redirect()->intended('/');

            }else{
                $newUser = User::updateOrCreate(['email' => $user->email],[
                        'nom' => $user->name,
                        'facebook_key'=> $user->id,
                        'password' => encrypt('123456dummy')
                    ]);

                Auth::login($newUser);

                return redirect()->intended('/');
            }

        // } catch (Exception $e) {
        //     dd($e->getMessage());
        // }
    }

}
