<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Main;
use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Laravel\Socialite\Facades\Socialite;

class SocialiteGoogle extends Controller
{
    public function login()
    {
        return Socialite::driver('google')->redirect();
    }

    public function redirect()
    {
        $googleUser = Socialite::driver('google')->stateless()->user();
        //dd($googleUser->user);
        //try {
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

            $user->pays_id = "80";
            $user->last_ip = $_SERVER['REMOTE_ADDR'];
            $user->city_id = "48138";
            $user->state_id = "2727";
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
        /*}
        catch (\Exception $exception){
            dd($exception->getMessage());
            return redirect(url('/'))->with('message-error', "Une erreur est suvenue. Réessayer plutard");
        }*/

    }
}
