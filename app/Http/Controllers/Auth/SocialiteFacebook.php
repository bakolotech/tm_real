<?php

namespace App\Http\Controllers\Auth;

use App\User;
use Exception;
use App\Models\Main;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Laravel\Socialite\Facades\Socialite;

class SocialiteFacebook extends Controller
{
    public function login()
    {
        return Socialite::driver('facebook')->redirect();
    }

    public function redirect()
    {
        $facebookUser = Socialite::driver('facebook')->user();

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
            ->where('facebook_key', $facebookUser->id)
            ->get();

        if ($user->count() > 0 && $user[0] instanceof User) {
            $user = $user[0];
            if(empty($user->facebook_key)) $user->facebook_key = $facebookUser->id;

            $user->image = $facebookUser->avatar;

            if(empty($user->email)) $user->email = $facebookUser->email;

            $user->last_login = NOW();
            $user->pays_id = $_SESSION['config']['ma-position']['id'];
            $user->last_ip = $_SERVER['REMOTE_ADDR'];
            $user->city_id = $_SESSION['config']['ma-position']['states'][0]['cities'][0]['id'];
            $user->state_id = $_SESSION['config']['ma-position']['states'][0]['id'];
            $user->facebook_user = json_encode($facebookUser);
            if (empty($user->personal_key)) $user->personal_key = Main::getUserKey();
            $user->save();
        }
        else {
            $key = Main::getUserKey();
            $user = User::create(
                [
                    'nom' => strtoupper(self::security($facebookUser->user['family_name'])),
                    'prenom' => ucwords(self::security($facebookUser->user['given_name'])),
                    'email' => $facebookUser['email'],
                    'facebook_key' => $facebookUser->id,
                    'password' => Hash::make($key),
                    'pays_id' => $_SESSION['config']['ma-position']['id'],
                    'image' => $facebookUser->avatar,
                    'state_id' => $_SESSION['config']['ma-position']['states'][0]['id'],
                    'last_ip' => $_SERVER['REMOTE_ADDR'],
                    'city_id' => $_SESSION['config']['ma-position']['states'][0]['cities'][0]['id'],
                    'last_login' => NOW(),
                    'facebook_user' => json_encode($facebookUser),
                    'personal_key' => $key
                ]
            );
        }

        Main::initSessions($user);
        Auth::login($user);
        Main::setSessionNotificationConfig($user);
        return redirect(url('/'));
    }

    public function redirect2()
    {
        try {

            $user = Socialite::driver('facebook')->user();

            $finduser = User::where('facebook_id', $user->id)->first();

            if($finduser){

                Auth::login($finduser);

                return redirect()->intended('/');

            }else{
                $key = Main::getUserKey();
                $newUser = User::updateOrCreate(['email' => $user->email],[
                        'nom' => $user->name,
                        'prenom' => ucwords($user->surname),
                        'facebook_key'=> $user->id,
                        'password' => Hash::make($key)
                    ]);

                Auth::login($newUser);

                return redirect()->intended('/');
            }

        } catch (Exception $e) {
            dd($e->getMessage());
        }
    }
}
