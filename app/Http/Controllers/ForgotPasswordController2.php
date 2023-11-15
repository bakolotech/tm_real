<?php

namespace App\Http\Controllers;

use App\User;
use Carbon\Carbon;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;

class ForgotPasswordController2 extends Controller
{
      /**
       * Write code on Method
       *
       * @return response()
       */
      public function showForgetPasswordForm()
      {
         return view('auth.forgetPassword');
      }

      /**
       * Write code on Method
       *
       * @return response()
       */
      public function submitForgetPasswordForm(Request $request)
      {
        $redirect = ['active' => 0];
        //   $request->validate([
        //       'email' => 'required|exists:users',
        //   ],
        //   [
        //       'exists' => "L’adresse e-mail ou le numéro de portable que vous avez saisi(e) n’est pas associé(e) à un compte.",
        //       'required' => "Vous devez saisir obligatoirement l'adresse e-mail ou le numéro",
        //   ]);

          $token = Str::random(64);

          DB::table('password_resets')->insert([
              'email' => $request->email,
              'token' => $token,
              'created_at' => Carbon::now()
            ]);

            $email =$request->input('email');
            $nouveau_password = strtoupper("TM-".uniqid());

            $user = User::where('email',$email)->first();

        if($user) {
            $utilisateur = $user->nom." ".$user->prenom;
            $login = $user->email;
            $mdp = $nouveau_password;

            if ($user instanceof User)
            {
                $user->password=Hash::make($nouveau_password);
                $user->save();

            }

          Mail::send('email2.forgetPassword', ['token' => $token, 'utilisateur' => $utilisateur, 'login' => $login , 'mdp' => $mdp], function($message) use($request){
              $message->to($request->email);
              $message->subject('Réinitialisation de votre mot de passe');
          });
            $message = "Bonne combinaison";
            $error = 5;
            Session::put('renvoyer_email', $token);
        } else {
            $message = "Adresse mail ou numero incorrect";
            $error = 4;
        }
        $data = [
            'redirect' => $redirect,
            'text' => $message,
            'error' => $error,
            'e' => $email
        ];


        return response()->json([$data]);

        //   return back()->with('message', 'Nous avons envoyé votre lien de réinitialisation de mot de passe par e-mail !');
      }

         /**
       * Write code on Method
       *
       * @return response()
       */
      public function resentPassword(Request $request) //incomplete
      {
        $redirect = ['active' => 0];

        $new_token = $request->input('token');

        $emails = DB::select('SELECT email FROM tm_password_resets WHERE token = ?',[$new_token]);

        foreach ($emails as $email)
        {
            $email = $email->email;
        }

        $token = Str::random(64);

          DB::table('password_resets')->insert([
              'email' => $email,
              'token' => $token,
              'created_at' => Carbon::now()
            ]);

        $user = User::where('email',$email)->first();
        $nouveau_password = strtoupper("TM-".uniqid());

        if($user) {
            $utilisateur = $user->nom." ".$user->prenom;
            $login = $user->email;
            $mdp = $nouveau_password;

            if ($user instanceof User)
            {
                $user->password=Hash::make($nouveau_password);
                $user->save();

            }

          Mail::send('email2.forgetPassword', ['token' => $token, 'utilisateur' => $utilisateur, 'login' => $login , 'mdp' => $mdp], function($message) use($email){
              $message->to($email);
              $message->subject('Réinitialisation de votre mot de passe');
          });

            $message = "Renvoyer";
            $error = 6;
        }else {
            $message = "Adresse mail incorrecte";
            $error = 7;
        }
        $data = [
            'redirect' => $redirect,
            'text' => $message,
            'error' => $error,
            'e' => $login
        ];


        return response()->json([$data]);


      }

      /**
       * Write code on Method
       *
       * @return response()
       */
      public function showResetPasswordForm($token) {
         return view('auth.forgetPasswordLink', ['token' => $token]);
      }

      /**
       * Write code on Method
       *
       * @return response()
       */
      public function submitResetPasswordForm(Request $request)
      {
          $request->validate([
              'email' => 'required|email|exists:users',
              'password' => 'required|string|min:6|confirmed',
              'password_confirmation' => 'required'
          ]);

          $updatePassword = DB::table('password_resets')
                              ->where([
                                'email' => $request->email,
                                'token' => $request->token
                              ])
                              ->first();

          if(!$updatePassword){
              return back()->withInput()->with('error', 'Invalid token!');
          }

          $user = User::where('email', $request->email)
                      ->update(['password' => Hash::make($request->password)]);

          DB::table('password_resets')->where(['email'=> $request->email])->delete();

          return redirect('/login')->with('message', 'Your password has been changed!');
      }
}
