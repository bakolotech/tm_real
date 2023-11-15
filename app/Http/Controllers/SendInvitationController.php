<?php

namespace App\Http\Controllers;

use App\Models\SendInvitation;
use App\Models\Marchand;
use App\User;
use App\Models\Collabo;
use App\Notifications\InviteNotification;
use App\Models\Boutique;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Notification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class SendInvitationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = Auth::user();
        // if(Auth::user()->role == 2){
        //     $marchand = Auth::user();
        //     $ls_collabo = Collabo::where('mail_sender', $marchand->email);
        //     var_dump($ls_collabo);
        //     // return response()->json($ls_collabo);
        // }
        $ls_collabo = SendInvitation::all();
        return response()->json(['ls_collabo' => $ls_collabo, 'marchand'=> $user]);
    }

    public function process_invites(Request $request)
    {
        $data = $request->except(('_token'));
        foreach ($data as $value) {

            if($value != null) {
                $array_mail[] = $value;
                $validator = Validator::make($request->all(), [
                    'email_destinataire_notif' => 'required|email'/*|unique:users,email*/
                    ],
                    [
                        'email_destinataire_notif.required' => "L'adresse de l'invité est obligatoire",
                        'email_destinataire_notif.email' => "L'adresse de l'invité n'est pas valide"
                    ]

                );



                  $resulttab = [];






                $mail_col = DB::table('collabos')
                         ->where('collabos.mail_collabo',$request->email_destinataire_notif)
                         ->get();
                $march = DB::table('users')
                     ->where('users.email',$request->email_destinataire_notif)
                     ->select('users.role')
                     ->get();

                     $mail_colab = '';

                     if(count($mail_col) > 0) {
                        $mail_colab = $mail_col[0]->mail_collabo;
                     }
                     $march0 = '';
                     if (count($march) > 0){
                        $march0 = $march[0]->role;
                     }


                if (Auth::user()->email == $request->email_destinataire_notif){
                    $resulttab['m1'] = 'm1'; ;

                } else if ( $mail_colab == $request->email_destinataire_notif){
                    $resulttab['m2'] = 'm2' ;
                }else if ( $march0 == 2){
                    $resulttab['m3'] = 'm3';
                }
                 else {
                      if ($validator->fails()) {
                                    return response()->json($validator->errors(), 400);
                                }else {
                                    $usermail = Auth::user()->nom." ".Auth::user()->prenom;
                                    $follower = auth()->user();
                                    $token = str_shuffle("gzak!SMUCnJmcN?xndhdklzejsnxn214djwxgdkngsgs");
                                    $notif = new SendInvitation;
                                    $notif->token =$token;
                                    $notif->email_notif =$request->email_destinataire_notif;
                                    $notif->sender = Auth::user()->email;
                                    $notif->role_notif ="Invitation Envoyée";
                                    $notif->statut_notif ="En cours de validation";
                                    $notif->save();}
                                    if ($notif) {
                                        # check de user connecter ou non pour le pop-up de cloche

                                        $collabo = Collabo::create([
                                            'id_boutique' => $_SESSION['boutique_marchand'] ,
                                            'mail_collabo' => $request->email_destinataire_notif,
                                            'mail_sender' => Auth::user()->email,
                                            'role_collabo' => 'Invitation envoyée',
                                            'statut_collabo' => 'En cours de validation',
                                            'authentification_collabo' => "Par mail",
                                            'descrip_collabo' => null
                                        ]);}
                                  if (User::where('email', $request->email_destinataire_notif)->exists()) {
                            // var_dump("Utilisateurs existants");
                            $user = User::where('email', $request->email_destinataire_notif)->first();;
                            $id_collabo = $user->id;
                        }else {
                            $id_collabo = $collabo->id;
                        }
                        // var_dump("Id ",$id_collabo);
                        $url = URL::temporarySignedRoute(
                            'page_accueil', now()->addMinutes(1440), [
                                'collabo' => $id_collabo,
                                'token' => $token,
                                'msg-pour-redirection-depuis-le-mail' => "ok",
                                "mail_sender" => $usermail
                            ]
                        )."#pop-pour-redirection-depuis-le-mail";
                        Notification::route('mail', $request->email_destinataire_notif)->notify(new InviteNotification($url));
                        $resulttab['succes1'] = 'succes1';
                }


                  //2ieme Input
                 if ( $request->email_destinataire_notif1 != null){


                    $mail_col = DB::table('collabos')
                        ->where('collabos.mail_collabo', $request->email_destinataire_notif1)
                        ->get();
                    $march = DB::table('users')
                    ->where('users.email',$request->email_destinataire_notif1)
                    ->select('users.role')
                    ->get();

                    $mail_colab = '';

                    if(count($mail_col) > 0) {
                    $mail_colab = $mail_col[0]->mail_collabo;
                    }

                    $march0 = '';
                    if (count($march) > 0){
                    $march0 = $march[0]->role;
                    }



                    if (Auth::user()->email == $request->email_destinataire_notif1){
                        $resulttab['m11'] = 'm11';

                    } else if ( $mail_colab == $request->email_destinataire_notif1){
                        $resulttab['m12'] = 'm12' ;

                    }else if ( $march0 == 2){
                        $resulttab['m13'] = 'm13';
                    }
                    else {

                    if ($validator->fails()) {
                        return response()->json($validator->errors(), 400);
                    }else if ($request->email_destinataire_notif1 != null){{
                        $usermail = Auth::user()->nom." ".Auth::user()->prenom;
                        $follower = auth()->user();
                        $token = str_shuffle("gzak!SMUCnJmcN?xndhdklzejsnxn214djwxgdkngsgs");
                        $notif = new SendInvitation;
                        $notif->token =$token;
                        $notif->email_notif =$request->email_destinataire_notif1;
                        $notif->sender = Auth::user()->email;
                        $notif->role_notif ="Invitation Envoyée";
                        $notif->statut_notif ="En cours de validation";
                        $notif->save();}
                        if ($notif) {
                            # check de user connecter ou non pour le pop-up de cloche

                            $collabo = Collabo::create([
                                'id_boutique' => $_SESSION['boutique_marchand'],
                                'mail_collabo' => $request->email_destinataire_notif1,
                                'mail_sender' => Auth::user()->email,
                                'role_collabo' => 'Invitation envoyée',
                                'statut_collabo' => 'En cours de validation',
                                'authentification_collabo' => "Par mail",
                                'descrip_collabo' => null
                            ]);}
                    if (User::where('email', $request->email_destinataire_notif1)->exists()) {
                // var_dump("Utilisateurs existants");
                $user = User::where('email', $request->email_destinataire_notif1)->first();;
                $id_collabo = $user->id;
            }else {
                $id_collabo = $collabo->id;
            }
            // var_dump("Id ",$id_collabo);
            $url = URL::temporarySignedRoute(
                'page_accueil', now()->addMinutes(1440), [
                    'collabo' => $id_collabo,
                    'token' => $token,
                    'msg-pour-redirection-depuis-le-mail' => "ok",
                    "mail_sender" => $usermail
                ]
            )."#pop-pour-redirection-depuis-le-mail";
            Notification::route('mail', $request->email_destinataire_notif1)->notify(new InviteNotification($url));}
            $resulttab['succes2'] = 'succes2';
                }

            }
                           //3ieme Input
              if ( $request->email_destinataire_notif2 != null){
                        $mail_col = DB::table('collabos')
                        ->where('collabos.mail_collabo',$request->email_destinataire_notif2)
                        ->get();
                    $march = DB::table('users')
                    ->where('users.email',$request->email_destinataire_notif2)
                    ->select('users.role')
                    ->get();

                    $mail_colab = '';

                    if(count($mail_col) > 0) {
                    $mail_colab = $mail_col[0]->mail_collabo;
                    }
                    $march0 = '';
                    if (count($march) > 0){
                    $march0 = $march[0]->role;
                    }


                    if (Auth::user()->email == $request->email_destinataire_notif2){
                          $resulttab['m21'] = 'm21';

                        } else if ( $mail_colab == $request->email_destinataire_notif2 ){
                            $resulttab['m22'] = 'm22' ;

                        }else if ( $march0 == 2){
                            $resulttab['m23'] = 'm23';
                        }
                    else {
                if ($validator->fails()) {
                    return response()->json($validator->errors(), 400);
                }else if ($request->email_destinataire_notif2 != null){  {
                    $usermail = Auth::user()->nom." ".Auth::user()->prenom;
                    $follower = auth()->user();
                    $token = str_shuffle("gzak!SMUCnJmcN?xndhdklzejsnxn214djwxgdkngsgs");
                    $notif = new SendInvitation;
                    $notif->token =$token;
                    $notif->email_notif =$request->email_destinataire_notif2;
                    $notif->sender = Auth::user()->email;
                    $notif->role_notif ="Invitation Envoyée";
                    $notif->statut_notif ="En cours de validation";
                    $notif->save();}
                    if ($notif) {
                        # check de user connecter ou non pour le pop-up de cloche

                        $collabo = Collabo::create([
                            'id_boutique' => $_SESSION['boutique_marchand'],
                            'mail_collabo' => $request->email_destinataire_notif2,
                            'mail_sender' => Auth::user()->email,
                            'role_collabo' => 'Invitation envoyée',
                            'statut_collabo' => 'En cours de validation',
                            'authentification_collabo' => "Par mail",
                            'descrip_collabo' => null
                        ]);}
                if (User::where('email', $request->email_destinataire_notif2)->exists()) {
            // var_dump("Utilisateurs existants");
            $user = User::where('email', $request->email_destinataire_notif2)->first();;
            $id_collabo = $user->id;
        }else {
            $id_collabo = $collabo->id;
        }
        // var_dump("Id ",$id_collabo);
        $url = URL::temporarySignedRoute(
            'page_accueil', now()->addMinutes(1440), [
                'collabo' => $id_collabo,
                'token' => $token,
                'msg-pour-redirection-depuis-le-mail' => "ok",
                "mail_sender" => $usermail
            ]
        )."#pop-pour-redirection-depuis-le-mail";
        Notification::route('mail', $request->email_destinataire_notif2)->notify(new InviteNotification($url));}
        $resulttab['succes3'] = 'succes3';;
            }

        }

    //                        //4ieme Input

    if ( $request->email_destinataire_notif3 != null){
                    $mail_col = DB::table('collabos')
                    ->where('collabos.mail_collabo',$request->email_destinataire_notif3)
                    ->get();
                $march = DB::table('users')
                ->where('users.email',$request->email_destinataire_notif3)
                ->select('users.role')
                ->get();

                $mail_colab = '';

                if(count($mail_col) > 0) {
                $mail_colab = $mail_col[0]->mail_collabo;
                }
                $march0 = '';
                if (count($march) > 0){
                $march0 = $march[0]->role;
                }




                if (Auth::user()->email == $request->email_destinataire_notif3){
                    $resulttab['m31'] = 'm31';

                  } else if ( $mail_colab == $request->email_destinataire_notif3 ){
                      $resulttab['m32'] = 'm32' ;

                  }else if ( $march0 == 2){
                      $resulttab['m33'] = 'm33';
                  }


                else {
                    if ($validator->fails()) {
                        return response()->json($validator->errors(), 400);
                    }else if ($request->email_destinataire_notif3 != null){  {
                        $usermail = Auth::user()->nom." ".Auth::user()->prenom;
                        $follower = auth()->user();
                        $token = str_shuffle("gzak!SMUCnJmcN?xndhdklzejsnxn214djwxgdkngsgs");
                        $notif = new SendInvitation;
                        $notif->token =$token;
                        $notif->email_notif =$request->email_destinataire_notif3;
                        $notif->sender = Auth::user()->email;
                        $notif->role_notif ="Invitation Envoyée";
                        $notif->statut_notif ="En cours de validation";
                        $notif->save();}
                        if ($notif) {
                            # check de user connecter ou non pour le pop-up de cloche

                            $collabo = Collabo::create([
                                'id_boutique' => $_SESSION['boutique_marchand'],
                                'mail_collabo' => $request->email_destinataire_notif3,
                                'mail_sender' => Auth::user()->email,
                                'role_collabo' => 'Invitation envoyée',
                                'statut_collabo' => 'En cours de validation',
                                'authentification_collabo' => "Par mail",
                                'descrip_collabo' => null
                            ]);}
                    if (User::where('email', $request->email_destinataire_notif3)->exists()) {
                // var_dump("Utilisateurs existants");
                $user = User::where('email', $request->email_destinataire_notif3)->first();;
                $id_collabo = $user->id;
            }else {
                $id_collabo = $collabo->id;
            }
            // var_dump("Id ",$id_collabo);
            $url = URL::temporarySignedRoute(
                'page_accueil', now()->addMinutes(1440), [
                    'collabo' => $id_collabo,
                    'token' => $token,
                    'msg-pour-redirection-depuis-le-mail' => "ok",
                    "mail_sender" => $usermail
                ]
            )."#pop-pour-redirection-depuis-le-mail";
            Notification::route('mail', $request->email_destinataire_notif3)->notify(new InviteNotification($url));}

            $resulttab['succes4'] = 'succes4';;
                }
            }
                return $resulttab;

    // //           //            //5ieme Input



    //                 $mail_col = DB::table('collabos')
    //                 ->where('collabos.mail_collabo',$request->email_destinataire_notif1)
    //                 ->get();
    //             $march = DB::table('users')
    //             ->where('users.email',$request->email_destinataire_notif1)
    //             ->select('users.role')
    //             ->get();

    //             $mail_colab = '';

    //             if(count($mail_col) > 0) {
    //             $mail_colab = $mail_col[0]->mail_collabo;
    //             }
    //             $march0 = '';
    //             if (count($march) > 0){
    //             $march0 = $march[0]->role;
    //             }


    //             if (Auth::user()->email == $request->email_destinataire_notif1){
    //             return "Vous ne pouvez pas vous envoyez un mail";

    //             } else if ( $mail_colab == $request->email_destinataire_notif1){
    //             return "Ce membre à une invitation en cours";
    //             }else if ( $march0 == 2){
    //             return " Ce mail appartient à un marchand ";
    //             }
    //             else {
    //                 if ($validator->fails()) {
    //                     return response()->json($validator->errors(), 400);
    //                 }else if ($request->email_destinataire_notif4 != null){  {
    //                     $usermail = Auth::user()->nom." ".Auth::user()->prenom;
    //                     $follower = auth()->user();
    //                     $token = str_shuffle("gzak!SMUCnJmcN?xndhdklzejsnxn214djwxgdkngsgs");
    //                     $notif = new SendInvitation;
    //                     $notif->token =$token;
    //                     $notif->email_notif =$request->email_destinataire_notif4;
    //                     $notif->sender = Auth::user()->email;
    //                     $notif->role_notif ="Invitation Envoyée";
    //                     $notif->statut_notif ="En cours de validation";
    //                     $notif->save();}
    //                     if ($notif) {
    //                         # check de user connecter ou non pour le pop-up de cloche

    //                         $collabo = Collabo::create([
    //                             'id_boutique' => $_SESSION['boutique_marchand'],
    //                             'mail_collabo' => $request->email_destinataire_notif4,
    //                             'mail_sender' => Auth::user()->email,
    //                             'role_collabo' => 'Invitation envoyée',
    //                             'statut_collabo' => 'En cours de validation',
    //                             'authentification_collabo' => "Par mail",
    //                             'descrip_collabo' => null
    //                         ]);}
    //                 if (User::where('email', $request->email_destinataire_notif4)->exists()) {
    //             // var_dump("Utilisateurs existants");
    //             $user = User::where('email', $request->email_destinataire_notif4)->first();;
    //             $id_collabo = $user->id;
    //         }else {
    //             $id_collabo = $collabo->id;
    //         }
    //         // var_dump("Id ",$id_collabo);
    //         $url = URL::temporarySignedRoute(
    //             'page_accueil', now()->addMinutes(1440), [
    //                 'collabo' => $id_collabo,
    //                 'token' => $token,
    //                 'msg-pour-redirection-depuis-le-mail' => "ok",
    //                 "mail_sender" => $usermail
    //             ]
    //         )."#pop-pour-redirection-depuis-le-mail";
    //         Notification::route('mail', $request->email_destinataire_notif4)->notify(new InviteNotification($url));}
    //         return "Votre mail a été envoyé avec succès";
    //             }




            }









            }
            # code...





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
     * @param  \App\Models\SendInvitation  $sendInvitation
     * @return \Illuminate\Http\Response
     */
    public function show(SendInvitation $sendInvitation)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\SendInvitation  $sendInvitation
     * @return \Illuminate\Http\Response
     */
    public function edit(SendInvitation $sendInvitation)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\SendInvitation  $sendInvitation
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, SendInvitation $sendInvitation)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\SendInvitation  $sendInvitation
     * @return \Illuminate\Http\Response
     */
    public function destroy(SendInvitation $sendInvitation)
    {
        //
    }
}
