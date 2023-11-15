<?php

namespace App\Http\Controllers;

use App\Models\MarchandController;
use App\Models\Marchand;
use App\Models\Facturation;
use App\Models\Boutique;
use App\Models\BoutiqueRayons;
use App\Models\BoutiqueUnivers;
use App\Models\Collabo;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Notifications\InviteNotification;
use Illuminate\Support\Facades\Notification;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\DB;
use App\Models\mobilePayement;
use Carbon\Carbon;
use App\Models\Main;

// session_start();

class MarchandControllerController extends Controller
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
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function checkForMenu()
    {
        $ls_collabo = Collabo::all();
        $user = Auth::user();
        return response()->json([$ls_collabo, $user]);
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

        $idUser = Auth::user()->id;

        if (Auth::user()->id != 0 || Auth::user()->id != null) {
            $_SESSION['id_utilisateur'] = Auth::user()->id;
        }

        // stockage de la session du type d'activité dans une session  $_SESSION['pays'] = $request->all();
        if (array_key_exists('type_activite', $request->all())) {
            $_SESSION['type_activite'] = $request->type_activite;
        }

        if (array_key_exists('type_activite', $request->all()) && $request->step == 1) {
            // $_SESSION['type_activite'] = $request->type_activite;
            $_SESSION['pays'] = $request->all();
        }

        if (array_key_exists('nomEntreprise', $request->all())) {
            $_SESSION['nomEntreprise'] = $request->nomEntreprise;
        }

        if (array_key_exists('nomEntrepriseCaritative', $request->all())) {
            $_SESSION['nomEntrepriseCaritative'] = $request->nomEntrepriseCaritative;
        }

        // particulier
        if ($request->step == 1 && $request->type_activite == 1) {
            $data_step_1 = [$request->prenom, $request->prenom2, $request->nomfamille];
            $_SESSION['prenom'] =  $data_step_1;
        }

        if ($request->step == 2 && $_SESSION['type_activite'] == 1) {
            $information_particulier = [
            'pays_citoyennete' => $request->pays_citoyennete,
            'pay_naissance' => $request->pay_naissance,
            'date_naissance' => $request->date_naissance,
            'numero_piece' => $request->numero_piece,
            'pays_emission' => $request->pays_emission,
            'date_expiration' => $request->date_expiration,
            'adresse_pays_particulier' => $request->adresse_pays_particulier,
            'code_postal_particulier' => $request->code_postal_particulier,
            'adresse_province' => $request->adresse_province,
            'adresse_ville' => $request->adresse_ville,
            'adresse_fixe' => $request->adresse_fixe,
            'adresse_complement' => $request->adresse_complement,
            'numero_tel' => $request->telephone_particulier,
            'adresse_confirmation' => $request->adresse_confirmation,
            'piecie_identite_type' => $request->piecie_identite_type
            ];
            $_SESSION['info_person'] = $information_particulier;
        }

        if ($request->step == 3 && $_SESSION['type_activite'] == 1) {

            if (isset($_SESSION['facturation'])) {
                unset($_SESSION['facturation']);
            }

            $_SESSION['facturation'] = $request->all();
            return $_SESSION['facturation'];

        }

        if ($request->step == 4 && $_SESSION['type_activite'] == 1) {
            $_SESSION['boutique_particulier'] = $request->all();
        }

        if ($request->step == 5 && $_SESSION['type_activite'] == 1) {
            $location = 'uploads';
            if ($request->file('pass_cni') != null && $request->file('releve_bancaire') !=null) {
                $valid_exetension = ["png", "tiff", "tif", "jpg", "jpeg", "pdf"];
                $file_identite_size = $request->file('pass_cni');
                $filename = time().'_'.$file_identite_size->getClientOriginalName();
                $extension = $file_identite_size->getClientOriginalExtension();
                $file_size = $file_identite_size->getSize();
                $filesize = round($file_size / 1024 / 1024, 1);

                // verification de la taille
                if ($filesize > 5) {
                    return 'tropgrand';
                }else {

                $file_identite = $request->file('pass_cni');
                $filename = time().'_'.$file_identite->getClientOriginalName();
                $extension = $file_identite->getClientOriginalExtension();
                $file_identite->move($location, $filename);

                  //  relevé bancaire
                  $docsupp = $request->file('releve_bancaire');
                  $doc_supp_name = time().'_'.$docsupp->getClientOriginalName();
                  // File extension
                  $extension = $docsupp->getClientOriginalExtension();
                  $docsupp->move($location, $doc_supp_name);

                $marchand = Marchand::create([
                    'nom' => $_SESSION['prenom'][2],
                    'prenom' => $_SESSION['prenom'][0],
                    'pays_citoyennete' =>   $_SESSION['info_person']['pays_citoyennete'],
                    'date_naisse' =>   $_SESSION['info_person']['date_naissance'],
                    'copie_piece_identite' =>  $_SESSION['info_person']['numero_piece'],
                    'date_expiration' =>  $_SESSION['info_person']['date_expiration'],
                    'pays_emission' =>  $_SESSION['info_person']['pays_emission'],
                    'numero_tel' => $_SESSION['info_person']['numero_tel'],
                    'identite_document' => $filename,
                    'id_utilisateur' => $_SESSION['id_utilisateur'],
                    'verifie' => true
                ]);

                $marchand_id = $marchand->id;

                $boutiques = [
                    'libelle' => $_SESSION['boutique_particulier']['nom_boutique'], //proprietaire
                    'type_boutique' => $_SESSION['boutique_particulier']['type_boutique'],
                    'fabriquant' => 'oui',
                    'proprietaire_marque_depose' => 'oui',
                    'num_matricule' => "particulier",
                    'boutique_pays' => "particulier",
                    'code_postal' => $_SESSION['info_person']['code_postal_particulier'],
                    'province' => "Oyem",
                    'ville' => "particulier",
                    'adresse' => "particulier",
                    'complement_adresse' => "particulier",
                    'contact_principla_prenom' => $_SESSION['prenom'][0],
                    'contact_principal_prenom2' => $_SESSION['prenom'][1],
                    'contact_principal_nomfamille' => $_SESSION['prenom'][2],
                    'description' => 'Description',
                    'id_marchand' => $marchand_id
                ];

                $boutique = Boutique::create($boutiques);
                $id_boutique = $boutique->id;
                // traitement des rayons et des univers
                foreach($_SESSION['boutique_particulier']['rayons'] as $rayon) {
                    $rayons = DB::table('rayons')
                    ->select('rayons.id')
                    ->where('libelle', $rayon)
                    ->get();

                    if (count($rayons) > 0) {
                        $boutique_rayon = BoutiqueRayons::create([
                            'rayon_id' => $rayons[0]->id,
                            'boutique_id' => $id_boutique
                        ]);
                    }

                 }

                 foreach($_SESSION['boutique_particulier']['univers'] as $univers) {

                    $univers = DB::table('univers')
                                ->select('univers.id')
                                ->where('libelle', $univers)
                                ->get();

                    if (count($univers) > 0) {
                        $boutique_rayon = BoutiqueUnivers::create([
                            'univers_id' => $univers[0]->id,
                            'boutique_id' => $id_boutique
                        ]);
                    }

                }

                if (isset($_SESSION['facturation']['payement_mobile'])) {

                    if (isset($_SESSION['facturation']['payement_mobile']['airtel'])) {

                        $facturation = [
                            'nom_service' => $_SESSION['facturation']['payement_mobile']['airtel'][0], // le code marchand
                            'numero_marchand' => $_SESSION['facturation']['payement_mobile']['airtel'][1], // nom du marchand
                            'type_service' => 'airtel', // no date
                            'id_marchand' => $marchand_id,  // no cvv
                            'status' => $_SESSION['facturation']['payement_mobile']['default_mobile_payment']
                        ];

                        $facturation = mobilePayement::create($facturation);

                    }

                    if (isset($_SESSION['facturation']['payement_mobile']['moov'])) {

                        $facturation = [
                            'nom_service' => $_SESSION['facturation']['payement_mobile']['moov'][0], // le code marchand
                            'numero_marchand' => $_SESSION['facturation']['payement_mobile']['moov'][1], // nom du marchand
                            'type_service' => 'moov', // no date
                            'id_marchand' => $marchand_id,  // no cvv
                            'status' => $_SESSION['facturation']['payement_mobile']['default_mobile_payment']
                        ];

                        $facturation = mobilePayement::create($facturation);

                    }

                }

                if(isset($_SESSION['facturation']['carte_bank'])) {
                    $facturation = [
                   'numero_carte' => $_SESSION['facturation']['carte_bank']['numero_carte'],
                   'nom_sur_carte' => $_SESSION['facturation']['carte_bank']['nom_sur_carte'],
                   'date_expiration' => $_SESSION['facturation']['carte_bank']['date_expiration'],
                   'numero_cvv' => $_SESSION['facturation']['carte_bank']['code_cvv'],
                   'type_carte' => 'Carte_bank',
                   'releve_banque' => $doc_supp_name,
                   'id_boutique' => $id_boutique,
                   'status' => 1
                   ];

                   $facturation = Facturation::create($facturation);

               }

                // envoie de mail après création de compte
                $token = str_shuffle("gzak!SMUCnJmcN?xndhdklzejsnxn214djwxgdkngsgs");
                $usermail = "Chrismed Madzou";

                $url = URL::temporarySignedRoute(
                    'page_accueil', now()->addMinutes(1440), [
                        'collabo' => '$id_collabo',
                        'token' => $token,
                        'msg-pour-redirection-depuis-le-mail' => "ok",
                        "mail_sender" => $usermail
                    ]
                )."#pop-pour-redirection-depuis-le-mail";

                $mail = Auth::user()->email;

                try{
                    // $email = Notification::route('mail', $mail)->notify(new InviteNotification($url));
                }
                catch(\Exception $e){ // Using a generic exception
                    return 'mail error';
                }

                unset($_SESSION['type_activite']);
                unset($_SESSION['prenom']);
                unset($_SESSION['facturation']);
                unset($_SESSION['boutique_particulier']);
                unset($_SESSION['info_person']);

                \Illuminate\Support\Facades\Auth::logout();

                return 'success';
             }

            }else {
                $marchand = Marchand::create([
                    'nom' => $_SESSION['prenom'][2],
                    'prenom' => $_SESSION['prenom'][0],
                    'pays_citoyennete' =>   $_SESSION['info_person']['pays_citoyennete'],
                    'date_naisse' =>   $_SESSION['info_person']['date_naissance'],
                    'copie_piece_identite' =>  $_SESSION['info_person']['numero_piece'],
                    'date_expiration' =>  $_SESSION['info_person']['date_expiration'],
                    'pays_emission' =>  $_SESSION['info_person']['pays_emission'],
                    'numero_tel' => $_SESSION['info_person']['numero_tel'],
                    'identite_document' => null,
                    'id_utilisateur' => $_SESSION['id_utilisateur'],
                    'verifie' => true
                ]);

                $marchand_id = $marchand->id;

                $boutiques = [
                    'libelle' => $_SESSION['boutique_particulier']['nom_boutique'], //proprietaire
                    'upc' => $_SESSION['boutique_particulier']['type_boutique'],
                    'fabriquant' => $_SESSION['boutique_particulier']['proprietaire'],
                    'proprietaire_marque_depose' => $_SESSION['boutique_particulier']['proprietaire'],
                    'num_matricule' => "particulier",
                    'boutique_pays' => "particulier",
                    'code_postal' => $_SESSION['info_person']['code_postal_particulier'],
                    'province' => "Oyem",
                    'ville' => "particulier",
                    'adresse' => "particulier",
                    'complement_adresse' => "particulier",
                    'contact_principla_prenom' => $_SESSION['prenom'][0],
                    'contact_principal_prenom2' => $_SESSION['prenom'][1],
                    'contact_principal_nomfamille' => $_SESSION['prenom'][2],
                    'description' => 'Description',
                    'id_marchand' => $marchand_id
                ];

                $boutique = Boutique::create($boutiques);
                $id_boutique = $boutique->id;

                $facturation = [
                    'numero_carte' => $_SESSION['facturation']['numero_carte'],
                    'nom_sur_carte' => $_SESSION['facturation']['nom_sur_carte'],
                    'date_expiration' => $_SESSION['facturation']['date_expiration'],
                    'numero_cvv' => $_SESSION['facturation']['numero_cvv'],
                    'releve_banque' => null,
                    'id_boutique' => $id_boutique
                ];

                $facturation = Facturation::create($facturation);

                return "success";
            }

        }

        // ------------------------ fin particulier ------------------------------

        if ($request->step == 1 && $request->type_activite == 2) {
            $_SESSION['nomEntreprise'] = $request->nomEntreprise;
            return $_SESSION['nomEntreprise'];
        }

        // traitement caritative

        if ($request->step == 1 && $_SESSION['type_activite'] == 2) {
            // $_SESSION['infos_nouveau_marchant'] = $request->all();
            return response()->json([$request->all()]);
        }

        if ($request->step == 2 && $_SESSION['type_activite'] == 2) {
            if (empty($request->villeEntreprise) && empty($request->codePostalEntreprise)) {
                $_SESSION['boutique_organisation']['numeroEntreprise'] = $request->numeroEntreprise;
                $_SESSION['boutique_organisation']['matriculeEntreprise'] = $request->matriculeEntreprise;
                $_SESSION['boutique_organisation']['nomFamilleContactEntreprise'] = $request->nomFamilleContactEntreprise;
                $_SESSION['boutique_organisation']['prenom2ContactEntreprise'] = $request->prenom2ContactEntreprise;
                $_SESSION['boutique_organisation']['prenomContactEntreprise'] = $request->prenomContactEntreprise;
                return $_SESSION['boutique_organisation'];
            }else {
                $_SESSION['boutique_organisation'] = $request->except('step', 'type_activite', '_token');
                return $_SESSION['boutique_organisation'];
            }
        }

        if ($request->step == 3 && $_SESSION['type_activite'] == 2) {
            $_SESSION['infos_organisation'] = $request->all();
            return response()->json([$request->all()]);
        }

        if ($request->step == 4 && $_SESSION['type_activite'] == 2) {
            $_SESSION['facturation_organisation'] = $request->all();
            return response()->json([$request->all()]);
        }

        if ($request->step == 5 && $_SESSION['type_activite'] == 2) {
            $_SESSION['boutique_organisation_suppInfos'] = $request->all();
            $_SESSION['boutique_organisation']['upc'] = "123";
            return $_SESSION['boutique_organisation_suppInfos'];
        }

        if ($request->step == 6 && $_SESSION['type_activite'] == 2) {

                $marchand = Marchand::create([
                    'nom' => $_SESSION['boutique_organisation']['nomFamilleContactEntreprise'],
                    'prenom' => $_SESSION['boutique_organisation']['prenomContactEntreprise'],
                    'pays_citoyennete' =>  $_SESSION['infos_organisation']['paysCitoyenPrivee'],
                    'date_naisse' =>  $_SESSION['infos_organisation']['dateNaissPrivee'],
                    'copie_piece_identite' =>  $_SESSION['infos_organisation']['numeroPiecePrivee'],
                    'date_expiration' =>  $_SESSION['infos_organisation']['dateExpiration'],
                    'pays_emission' =>  $_SESSION['infos_organisation']['payEmission'],
                    'numero_tel' => 1,
                    'identite_document' => 'kkk',
                    'id_utilisateur' => $_SESSION['id_utilisateur'],
                    'verifie' => true,
                    'representant' => $_SESSION['infos_organisation']['statusCompte'],
                    'beneficiaire' => 1,
                    'confirmerEngagement' => 1,
                ]);

                $marchand_id = $marchand->id;

                $boutiques = [
                    'libelle' => $_SESSION['boutique_organisation_suppInfos']['nom_boutique'],
                    'type_boutique' => $_SESSION['boutique_organisation_suppInfos']['type_boutique'],
                    'upc' => 1,
                    'fabriquant' => $_SESSION['boutique_organisation_suppInfos']['proprietaire'],
                    'proprietaire_marque_depose' => $_SESSION['boutique_organisation_suppInfos']['proprietaire'],
                    'num_matricule' => $_SESSION['boutique_organisation']['matriculeEntreprise'],
                    'boutique_pays' => $_SESSION['boutique_organisation']['paysEntreprise'],
                    'code_postal' => "1223",
                    'province' => "Oyem",
                    'ville' => $_SESSION['boutique_organisation']['villeEntreprise'],
                    'adresse' => $_SESSION['boutique_organisation']['adresseEntreprise'],
                    'complement_adresse' => 2,
                    'contact_principla_prenom' => $_SESSION['boutique_organisation']['prenomContactEntreprise'],
                    'contact_principal_prenom2' => $_SESSION['boutique_organisation']['prenom2ContactEntreprise'],
                    'contact_principal_nomfamille' => $_SESSION['boutique_organisation']['nomFamilleContactEntreprise'],
                    'description' => 'Description',
                    'id_marchand' => $marchand_id
                ];

                $boutique = Boutique::create($boutiques);
                $id_boutique = $boutique->id;

                foreach($_SESSION['boutique_organisation_suppInfos']['rayons'] as $rayon) {
                    $rayons = DB::table('rayons')
                                ->select('rayons.id')
                                ->where('libelle', $rayon)
                                ->get();
                    if (count($rayons) > 0) {
                        $boutique_rayon = BoutiqueRayons::create([
                            'rayon_id' => $rayons[0]->id,
                            'boutique_id' => $id_boutique
                        ]);
                    }
                 }

                 foreach($_SESSION['boutique_organisation_suppInfos']['univers'] as $univers) {
                    $univers = DB::table('univers')
                    ->select('univers.id')
                    ->where('libelle', $univers)
                    ->get();

                    if (count($univers) > 0) {
                        $boutique_rayon = BoutiqueUnivers::create([
                            'univers_id' => $univers[0]->id,
                            'boutique_id' => $id_boutique
                        ]);
                    }
                }

                // -------------------- facturation organisation ---------------------
                if (isset($_SESSION['facturation_organisation']['payement_mobile'])) {

                    if (isset($_SESSION['facturation_organisation']['payement_mobile']['airtel'])) {

                        $facturation = [
                            'nom_service' => $_SESSION['facturation_organisation']['payement_mobile']['airtel'][0], // le code marchand
                            'numero_marchand' => $_SESSION['facturation_organisation']['payement_mobile']['airtel'][1], // nom du marchand
                            'type_service' => 'airtel', // no date
                            'id_marchand' => $marchand_id,  // no cvv
                            'status' => 0
                        ];

                        $facturation = mobilePayement::create($facturation);
                    }

                    if (isset($_SESSION['facturation_organisation']['payement_mobile']['moov'])) {

                        $facturation = [
                            'nom_service' => $_SESSION['facturation_organisation']['payement_mobile']['moov'][0], // le code marchand
                            'numero_marchand' => $_SESSION['facturation_organisation']['payement_mobile']['moov'][1], // nom du marchand
                            'type_service' => 'moov', // no date
                            'id_marchand' => $marchand_id,  // no cvv
                            'status' => 0
                        ];
                        $facturation = mobilePayement::create($facturation);
                    }

                }

                if(isset($_SESSION['facturation_organisation']['carte_bank']) && count($_SESSION['facturation_organisation']['carte_bank']) > 0) {
                    $facturation = [
                   'numero_carte' => $_SESSION['facturation_organisation']['carte_bank']['numero_carte'],
                   'nom_sur_carte' => $_SESSION['facturation_organisation']['carte_bank']['nom_sur_carte'],
                   'date_expiration' => $_SESSION['facturation_organisation']['carte_bank']['date_expiration'],
                   'numero_cvv' => $_SESSION['facturation_organisation']['carte_bank']['code_cvv'],
                   'type_carte' => 'Carte_bank',
                   'releve_banque' => 'default',
                   'id_boutique' => $id_boutique,
                   'status' => 1
                   ];

                   $facturation = Facturation::create($facturation);
               }


            $token = str_shuffle("gzak!SMUCnJmcN?xndhdklzejsnxn214djwxgdkngsgs");
                $usermail = "Chrismed Madzou";

                $url = URL::temporarySignedRoute(
                    'page_accueil', now()->addMinutes(1440), [
                        'collabo' => '$id_collabo',
                        'token' => $token,
                        'msg-pour-redirection-depuis-le-mail' => "ok",
                        "mail_sender" => $usermail
                    ]
                )."#pop-pour-redirection-depuis-le-mail";

                $mail = Auth::user()->email;

                try{
                    // $email = Notification::route('mail', $mail)->notify(new InviteNotification($url));
                }

                catch(\Exception $e){ // Using a generic exception
                    return 'mail error';
                }

                // unset all session
                unset($_SESSION['type_activite']);
                unset($_SESSION['nomEntrepriseCaritative']);
                unset($_SESSION['boutique_organisation']);
                unset($_SESSION['infos_organisation']);
                unset($_SESSION['facturation_organisation']);
                unset($_SESSION['boutique_organisation_suppInfos']);

                \Illuminate\Support\Facades\Auth::logout();
                return 'success';
        }

        // -----------------traiment privee -----------------
        if ($request->step == 1 && $request->type_activite == 3) {
            $_SESSION['infos_marchand_privee'] = $request->except('step', 'type_activite', '_token');
            return response()->json([$_SESSION['infos_marchand_privee']]);
        }

        if ($request->step == 2 && $_SESSION['type_activite'] == 3) {
            $data_renseignement = $request->except('step', 'type_activite', '_token');
            if (empty($request->villeEntreprise) && empty($request->codePostalEntreprise)) {

                $_SESSION['boutique_privee']['numeroEntreprise'] = $request->numeroEntreprise;
                $_SESSION['boutique_privee']['matriculeEntreprise'] = $request->matriculeEntreprise;
                $_SESSION['boutique_privee']['nomFamilleContactEntreprise'] = $request->nomFamilleContactEntreprise;
                $_SESSION['boutique_privee']['prenom2ContactEntreprise'] = $request->prenom2ContactEntreprise;
                $_SESSION['boutique_privee']['prenomContactEntreprise'] = $request->prenomContactEntreprise;
                return $_SESSION['boutique_privee'];

            }else {
                $_SESSION['boutique_privee'] = $request->except('step', 'type_activite', '_token');
                return $_SESSION['boutique_privee'];
            }

            // return response()->json([$request->all()]);
        }

        if ($request->step == 3 && $_SESSION['type_activite'] == 3) {
            $_SESSION['infos_privee'] = $request->all();
            return response()->json([$request->all()]);
        }

        if ($request->step == 4 && $_SESSION['type_activite'] == 3) {
            $_SESSION['facturation_privee'] = $request->all();
            return response()->json([$request->all()]);
        }

        if ($request->step == 5 && $_SESSION['type_activite'] == 3) {
            $_SESSION['boutique_privee_suppInfos'] = $request->all();
            $_SESSION['boutique_privee']['upc'] = "123";
            return $_SESSION['boutique_privee_suppInfos'];
        }

        if ($request->step == 6 && $_SESSION['type_activite'] == 3) {
            if ($request->file('pass_cni') != null && $request->file('releve_bancaire') !=null) {

                    $marchand = Marchand::create([
                        'nom' => $_SESSION['boutique_privee']['nomFamilleContactEntreprise'],
                        'prenom' => $_SESSION['boutique_privee']['prenomContactEntreprise'],
                        'pays_citoyennete' =>  $_SESSION['infos_privee']['paysCitoyenPrivee'],
                        'date_naisse' =>  $_SESSION['infos_privee']['dateNaissPrivee'],
                        'copie_piece_identite' =>  $_SESSION['infos_privee']['numeroPiecePrivee'],
                        'date_expiration' =>  $_SESSION['infos_privee']['dateExpiration'],
                        'pays_emission' =>  $_SESSION['infos_privee']['payEmission'],
                        'numero_tel' =>1,
                        'identite_document' => 1,
                        'id_utilisateur' => $_SESSION['id_utilisateur'],
                        'verifie' => true,
                        'representant' => $_SESSION['infos_privee']['statusCompte'],
                        'beneficiaire' => 1,
                        'confirmerEngagement' => 1,
                    ]);

                    $marchand_id = $marchand->id;

                    $boutiques = [
                        'libelle' => $_SESSION['boutique_privee_suppInfos']['nom_boutique'],
                        'type_boutique' => $_SESSION['boutique_privee_suppInfos']['type_boutique'],
                        'upc' => 1,
                        'fabriquant' => $_SESSION['boutique_privee_suppInfos']['fabriquant'],
                        'proprietaire_marque_depose' => $_SESSION['boutique_privee_suppInfos']['proprietaire'],
                        'num_matricule' => $_SESSION['boutique_privee']['matriculeEntreprise'],
                        'boutique_pays' => $_SESSION['boutique_privee']['paysEntreprise'],
                        'code_postal' => "1223",
                        'province' => "Oyem",
                        'ville' => $_SESSION['boutique_privee']['villeEntreprise'],
                        'adresse' => $_SESSION['boutique_privee']['adresseEntreprise'],
                        'complement_adresse' => 2,
                        'contact_principla_prenom' => $_SESSION['boutique_privee']['prenomContactEntreprise'],
                        'contact_principal_prenom2' => $_SESSION['boutique_privee']['prenom2ContactEntreprise'],
                        'contact_principal_nomfamille' => $_SESSION['boutique_privee']['nomFamilleContactEntreprise'],
                        'description' => 'Description',
                        'id_marchand' => $marchand_id,
                        'fiche_circuit' => 1
                    ];

                    $boutique = Boutique::create($boutiques);

                    $id_boutique = $boutique->id;

                    foreach($_SESSION['boutique_privee_suppInfos']['rayons'] as $rayon) {

                        $rayons = DB::table('rayons')
                        ->select('rayons.id')
                        ->where('libelle', $rayon)
                        ->get();

                        if (count($rayons) > 0) {
                            $boutique_rayon = BoutiqueRayons::create([
                                'rayon_id' => $rayons[0]->id,
                                'boutique_id' => $id_boutique
                            ]);
                        }

                    }

                    foreach($_SESSION['boutique_privee_suppInfos']['univers'] as $univers) {
                        $univers = DB::table('univers')
                        ->select('univers.id')
                        ->where('libelle', $univers)
                        ->get();

                        if (count($univers) > 0) {
                            $boutique_rayon = BoutiqueUnivers::create([
                                'univers_id' => $univers[0]->id,
                                'boutique_id' => $id_boutique
                            ]);
                        }
                    }

                                    // -------------------- facturation organisation ---------------------
                if (isset($_SESSION['facturation_privee']['payement_mobile'])) {

                    if (isset($_SESSION['facturation_privee']['payement_mobile']['airtel'])) {

                        $facturation = [
                            'nom_service' => $_SESSION['facturation_privee']['payement_mobile']['airtel'][0], // le code marchand
                            'numero_marchand' => $_SESSION['facturation_privee']['payement_mobile']['airtel'][1], // nom du marchand
                            'type_service' => 'airtel', // no date
                            'id_marchand' => $marchand_id,  // no cvv
                            'status' => 0
                        ];
                        $facturation = mobilePayement::create($facturation);
                    }

                    if (isset($_SESSION['facturation_privee']['payement_mobile']['moov'])) {

                        $facturation = [
                            'nom_service' => $_SESSION['facturation_privee']['payement_mobile']['moov'][0], // le code marchand
                            'numero_marchand' => $_SESSION['facturation_privee']['payement_mobile']['moov'][1], // nom du marchand
                            'type_service' => 'moov', // no date
                            'id_marchand' => $marchand_id,  // no cvv
                            'status' => 0
                        ];

                        $facturation = mobilePayement::create($facturation);

                    }

                }

                if(isset($_SESSION['facturation_privee']['carte_bank']) && count($_SESSION['facturation_privee']['carte_bank']) > 0) {
                    $facturation = [
                   'numero_carte' => $_SESSION['facturation_privee']['carte_bank']['numero_carte'],
                   'nom_sur_carte' => $_SESSION['facturation_privee']['carte_bank']['nom_sur_carte'],
                   'date_expiration' => $_SESSION['facturation_privee']['carte_bank']['date_expiration'],
                   'numero_cvv' => $_SESSION['facturation_privee']['carte_bank']['code_cvv'],
                   'type_carte' => 'Carte_bank',
                   'releve_banque' => 'default',
                   'id_boutique' => $id_boutique,
                   'status' => 1
                   ];

                   $facturation = Facturation::create($facturation);
               }

                $token = str_shuffle("gzak!SMUCnJmcN?xndhdklzejsnxn214djwxgdkngsgs");
                $usermail = "Chrismed Madzou";

                $url = URL::temporarySignedRoute(
                    'page_accueil', now()->addMinutes(1440), [
                        'collabo' => '$id_collabo',
                        'token' => $token,
                        'msg-pour-redirection-depuis-le-mail' => "ok",
                        "mail_sender" => $usermail
                    ]
                )."#pop-pour-redirection-depuis-le-mail";

                $mail = Auth::user()->email;

                try{
                    // $email = Notification::route('mail', $mail)->notify(new InviteNotification($url));
                }
                catch(\Exception $e){ // Using a generic exception
                    return 'mail error';
                }

                unset($_SESSION['type_activite']);
                unset($_SESSION['nomEntreprise']);
                unset($_SESSION['boutique_privee']);
                unset($_SESSION['infos_privee']);
                unset($_SESSION['facturation_privee']);
                unset($_SESSION['boutique_privee_suppInfos']);

                \Illuminate\Support\Facades\Auth::logout();
                return "success";

            }

            // if ($marchand &&  $boutiques) {
            //     unset($_SESSION['boutique_organisation']);
            //     unset($_SESSION['infos_organisation']);
            //     unset($_SESSION['facturation_organisation']);
            //     unset($_SESSION['boutique_organisation_suppInfos']);
            // }

            // if($boutique) {
            //     return "success";
            // }else{
            //     return 'error';
            // }

            // return $_SESSION['id_utilisateur'];
        }

    }



    /**
     * Display the specified resource.
     *
     * @param  \App\Models\MarchandController  $marchandController
     * @return \Illuminate\Http\Response
     */
    public function show(MarchandController $marchandController)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\MarchandController  $marchandController
     * @return \Illuminate\Http\Response
     */
    public function edit(MarchandController $marchandController)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\MarchandController  $marchandController
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, MarchandController $marchandController)
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
    public function updateProprio(Request $request, $id)
    {
        $mdp = $request->password;
        $crypter = Hash::make(htmlspecialchars($request->password));
        $user = User::where('id', $id)->where("password", $crypter);
        $userUpdating = User::where('id', $id)->get();
        $userNouveau = User::where('id', $request->id_news)->get();
        if ($user) {
            $updateCollabo = User::where('id', $request->id_news)->update(['role' => 2]);
            $updateCollabo2 = Collabo::where('id_utilisateur', $request->id_news)->update(['role_collabo' => "Propriétaire de la boutique"]);
            $updateLastUser = User::where('id', $id)->update(['role' => 6]);
            if (!(Collabo::where('id_utilisateur', $id)->exists())) {
                Collabo::create([
                    'id_utilisateur'  => $id,
                    'id_boutique' => null,
                    'mail_collabo' => $userUpdating[0]->email,
                    'mail_sender' => "Aucun",
                    'role_collabo' => 'Invitation envoyée',
                    'statut_collabo' => 'Actif',
                    'authentification_collabo' => "Par mail",
                    'descrip_collabo' => null
                ]);
            }
            // var_dump("Le mdp simple : ",$mdp, "Le hashé : ",$crypter, "id nouveau : ",$request->id_news,"le nouveau proprio : ",$userNouveau, "L'ancien proprio : ",$userUpdating[0]->email);
            return response()->json($updateCollabo);
        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\MarchandController  $marchandController
     * @return \Illuminate\Http\Response
     */
    public function destroy(MarchandController $marchandController)
    {
        //
    }

    // afficher tous les marchands

    public function allMarchand() {
        $_SESSION['type_marchand'] = "Particulier";
        if (isset($_SESSION['prenom'][0])) {
            return redirect('/marchand-information-particulier');
        }else if (isset($_SESSION['nomEntrepriseCaritative'])) {
            return redirect('/marchand-renseignement-organisation');
        }else if (isset($_SESSION['nomEntreprise'])) {
            return redirect('/marchand-renseignement-vendeur-privee');
        } {

        }
        return view("marchand");
    }

        // afficher  le paiement liée à un marchands

        public function getPaymentMarchand() {
            if (Auth::check()) {
                $user = Auth::user();

                $stats = DB::table('marchands')
                ->join('boutiques', 'boutiques.id_marchand', '=',  'marchands.id')
                ->join('facturations', 'facturations.id_boutique', '=',  'boutiques.id')
                ->where('marchands.id_utilisateur', '=', $user->id)
                ->where('facturations.status', '=', 1)
                ->select('facturations.status as card', 'facturations.numero_carte', 'facturations.nom_sur_carte', 'facturations.numero_cvv', 'facturations.id_boutique', 'facturations.date_expiration', 'facturations.type_carte')
                ->get();

                $stats1 = DB::table('marchands')
                ->join('mobile_payements', 'mobile_payements.id_marchand', '=',  'marchands.id')
                ->where('marchands.id_utilisateur', '=', $user->id)
                ->where('mobile_payements.status', '=', 0)
                ->select('mobile_payements.status', 'mobile_payements.type_service', 'mobile_payements.nom_service', 'mobile_payements.numero_marchand', 'mobile_payements.numero_marchand', 'mobile_payements.id_marchand')
                ->get();


                if(count($stats) != 0 &&  count($stats1) != 0 ){

                    return response()->json([
                        'status'=> 200,
                        'cardInfo'=>$stats,
                        'moneyInfo'=>$stats1,

                    ]);

                }else if(count($stats) != 0 &&  count($stats1) == 0 ){
                    return response()->json([
                        'status'=>201,
                       'cardInfo'=>$stats,
                   ]);

                }else if(count($stats1) != 0 &&  count($stats) == 0 ){
                    return response()->json([
                        'status'=>202,
                       'moneyInfo'=>$stats1,
                   ]);
                }else{

                    return response()->json([
                        'status'=>500,
                   ]);

                }

            }

        }





        //******************UPDATE PAYMENT******************************************************************* */


              /**
             * Update the specified resource in storage.
             *
             * @param  \Illuminate\Http\Request  $request
             * @param  int  $id
             * @return \Illuminate\Http\Response
             */


         public function modifyPaymentMarchand(Request $request) {

            if (Auth::check()) {

                $user = Auth::user();

                if($request->status == 3 ){  // condition for deleting mobile money payment

                    $stats = DB::table('marchands')
                    ->join('boutiques', 'boutiques.id_marchand', '=',  'marchands.id')
                    ->join('facturations', 'facturations.id_boutique', '=',  'boutiques.id')
                    ->where('marchands.id_utilisateur', '=', $user->id)
                    ->where('facturations.status', '=', 1)
                    ->select('facturations.status as card', 'facturations.numero_carte', 'facturations.nom_sur_carte', 'facturations.numero_cvv', 'facturations.id_boutique', 'facturations.date_expiration', 'facturations.type_carte')
                    ->get();


                    if(count($stats) != 0){

                        $creditas = DB::table('mobile_payements')
                        ->where('mobile_payements.id_marchand', '=', $request->id_marchand)
                        ->where('mobile_payements.type_service', '=', 'airtel')
                        ->update([
                            'status'=>$request->status,
                        ]);
                        $creditas = DB::table('mobile_payements')
                        ->where('mobile_payements.id_marchand', '=', $request->id_marchand)
                        ->where('mobile_payements.type_service', '<>', 'airtel')
                        ->update([
                            'status'=>$request->status,
                        ]);

                        return response()->json([
                            'status'=> 200,
                        ]);

                    }else{

                        return response()->json([
                            'status'=> 400,
                        ]);
                    }
                }




        //***********************DELETE AIRTEL PAYMENT *************************************************** */

        if($request->status == 8 ){  // condition for deleting airtel money mobile payment

                $stats = DB::table('marchands')
                ->join('boutiques', 'boutiques.id_marchand', '=',  'marchands.id')
                ->join('facturations', 'facturations.id_boutique', '=',  'boutiques.id')
                ->where('marchands.id_utilisateur', '=', $user->id)
                ->where('facturations.status', '=', 1)
                ->select('facturations.status as card', 'facturations.numero_carte', 'facturations.nom_sur_carte', 'facturations.numero_cvv', 'facturations.id_boutique', 'facturations.date_expiration', 'facturations.type_carte')
                ->get();


                $stats1 = DB::table('marchands')
                ->join('mobile_payements', 'mobile_payements.id_marchand', '=',  'marchands.id')
                ->where('marchands.id_utilisateur', '=', $user->id)
                ->where('mobile_payements.status', '=', 0)
                ->select('mobile_payements.status', 'mobile_payements.type_service', 'mobile_payements.nom_service', 'mobile_payements.numero_marchand', 'mobile_payements.numero_marchand', 'mobile_payements.id_marchand')
                ->get();

            if(count($stats) != 0){

                $creditas = DB::table('mobile_payements')
                    ->where('mobile_payements.id_marchand', '=', $request->id_marchand)
                    ->where('mobile_payements.type_service', '=', 'airtel')
                    ->update([
                        'status'=>3,
                    ]);
                return response()->json([
                    'status'=> 200,
                ]);

            }else if(count($stats1) == 2){

                    $creditas = DB::table('mobile_payements')
                    ->where('mobile_payements.id_marchand', '=', $request->id_marchand)
                    ->where('mobile_payements.type_service', '=', 'airtel')
                    ->update([
                        'status'=>3,
                    ]);
                    return response()->json([
                        'status'=> 200,
                    ]);

            }else{
                return response()->json([
                    'status'=> 400,
                ]);
            }

        }


        //***********************DELETE MOOV PAYMENT *************************************************** */
        if($request->status == 9 ){  // condition for deleting airtel money mobile payment

                $stats = DB::table('marchands')
                ->join('boutiques', 'boutiques.id_marchand', '=',  'marchands.id')
                ->join('facturations', 'facturations.id_boutique', '=',  'boutiques.id')
                ->where('marchands.id_utilisateur', '=', $user->id)
                ->where('facturations.status', '=', 1)
                ->select('facturations.status as card', 'facturations.numero_carte', 'facturations.nom_sur_carte', 'facturations.numero_cvv', 'facturations.id_boutique', 'facturations.date_expiration', 'facturations.type_carte')
                ->get();

                $stats1 = DB::table('marchands')
                ->join('mobile_payements', 'mobile_payements.id_marchand', '=',  'marchands.id')
                ->where('marchands.id_utilisateur', '=', $user->id)
                ->where('mobile_payements.status', '=', 0)
                ->select('mobile_payements.status', 'mobile_payements.type_service', 'mobile_payements.nom_service', 'mobile_payements.numero_marchand', 'mobile_payements.numero_marchand', 'mobile_payements.id_marchand')
                ->get();

            if(count($stats) != 0){

                $creditas = DB::table('mobile_payements')
                    ->where('mobile_payements.id_marchand', '=', $request->id_marchand)
                    ->where('mobile_payements.type_service', '=', 'moov')
                    ->update([
                        'status'=>3,
                    ]);
                return response()->json([
                    'status'=> 200,
                ]);

            }else if(count($stats1) == 2){

                $creditas = DB::table('mobile_payements')
                ->where('mobile_payements.id_marchand', '=', $request->id_marchand)
                ->where('mobile_payements.type_service', '=', 'airtel')
                ->update([
                    'status'=>3,
                ]);
                return response()->json([
                    'status'=> 200,
                ]);

            }else{
                return response()->json([
                    'status'=> 400,
                ]);
            }

        }

        //******************************CONDITION FOR CREATING MOBILE MONEY OR REACTIVATE********************************************************** */

                        if($request->status == 0 ){  // condition for deleting mobile money (NEVER LOOP THROUG A REQUEST FOR NOW)

                                if($request->type_service == 'airtel'){
                                    $creditas = DB::table('mobile_payements')
                                    ->updateOrInsert(
                                        ['mobile_payements.id_marchand' => $request->id_marchand, 'mobile_payements.type_service' => 'airtel'],
                                        [ 'status'=>$request->status, 'nom_service'=>$request->nom_serviceA, 'numero_marchand'=>$request->numero_marchandA]
                                    );
                                    return response()->json([
                                        'status'=> 200,

                                    ]);
                                }

                                if($request->type_service == 'moov'){
                                    $creditas = DB::table('mobile_payements')
                                    ->updateOrInsert(
                                        ['mobile_payements.id_marchand' => $request->id_marchand, 'mobile_payements.type_service' => 'moov'],
                                        [ 'status'=>$request->status, 'nom_service'=>$request->nom_serviceM, 'numero_marchand'=>$request->numero_marchandM]
                                    );
                                    return response()->json([
                                        'status'=> 200,
                                    ]);
                                }

                                if($request->type_service == 'ANM'){

                                    $creditas = DB::table('mobile_payements')
                                    ->updateOrInsert(
                                        ['mobile_payements.id_marchand' => $request->id_marchand, 'mobile_payements.type_service' => 'airtel'],
                                        [ 'status'=>$request->status, 'nom_service'=>$request->nom_serviceA, 'numero_marchand'=>$request->numero_marchandA]
                                    );

                                    $creditas = DB::table('mobile_payements')
                                    ->updateOrInsert(
                                        ['mobile_payements.id_marchand' => $request->id_marchand, 'mobile_payements.type_service' => 'moov'],
                                        [ 'status'=>$request->status, 'nom_service'=>$request->nom_serviceM, 'numero_marchand'=>$request->numero_marchandM]
                                    );
                                    return response()->json([
                                        'status'=> 200,
                                    ]);
                                }
                            //}
                    } // fin if general


        //**********************DELETE EXISTING CREDIT CARD***************************************** */

                if($request->status == 4 ){
                        $stats = DB::table('marchands')
                        ->join('mobile_payements', 'mobile_payements.id_marchand', '=',  'marchands.id')
                        ->where('marchands.id_utilisateur', '=', $user->id)
                        ->where('mobile_payements.status', '=', 0)
                        ->select('mobile_payements.status', 'mobile_payements.type_service', 'mobile_payements.nom_service', 'mobile_payements.numero_marchand', 'mobile_payements.numero_marchand', 'mobile_payements.id_marchand')
                        ->get();

                        if(count($stats) != 0){
                                $creditas = DB::table('facturations')
                                ->where('facturations.id_boutique', '=', $_SESSION['boutique_marchand_id'])
                                ->update([
                                    'status'=>$request->status,
                                ]);
                                return response()->json([
                                    'status'=> 200,

                                 ]);
                        }else{
                            return response()->json([
                               'status'=> 400,
                            ]);
                        }
                }


        //******************************CREATING NEW CARD OR UPDATE CREDIT CARD IF EXIST *************************************** */
                    if($request->card == 6){
                        $creditas = DB::table('facturations')
                        ->updateOrInsert(
                            ['facturations.id_boutique' =>  $_SESSION['boutique_marchand_id']],
                            ['numero_carte'=>$request->numero_carte, 'nom_sur_carte'=>$request->nom_carte, 'date_expiration'=>$request->date_expiration, 'status'=>1,
                            'numero_cvv'=>$request->code_securite, 'type_carte'=>$request->type_carte]
                        );
                        return response()->json([
                            'status'=> 200,
                        ]);
                    }

        //******************************UPDATING EXISTING CARD *************************************** */
                    if($request->card == 1){
                        $creditas = DB::table('facturations')
                        ->where('facturations.id_boutique', '=', $_SESSION['boutique_marchand_id'])
                        ->update([
                            'numero_carte'=>$request->numero_carte,
                            'nom_sur_carte'=>$request->nom_carte,
                            'date_expiration'=>$request->date_expiration,
                            'numero_cvv'=>$request->code_securite,
                            'type_carte'=>$request->type_carte,
                            'status'=>1,
                        ]);
                     }

        //******************************UPDATING Airtel Money*************************************** */
                    if($request->identity ==1){
                        $creditas = DB::table('mobile_payements')
                        ->where('mobile_payements.id_marchand', '=', $request->id_marchand)
                        ->where('mobile_payements.type_service', '=', 'airtel')
                        ->update([
                            'nom_service'=>$request->nom_service,
                            'numero_marchand'=>$request->numero_marchand,
                            'status'=>0,
                        ]);
                    }

        //******************************UPDATING CARD Moov Money*************************************** */
                    if($request->identity ==2){
                        $creditas = DB::table('mobile_payements')
                        ->where('mobile_payements.id_marchand', '=', $request->id_marchand)
                        ->where('mobile_payements.type_service', '<>', 'airtel')
                        ->update([
                            'nom_service'=>$request->nom_service,
                            'numero_marchand'=>$request->numero_marchand,
                            'status'=>0,
                        ]);
                    }

        //******************************UPDATING CARD  AIRTEL AND MOOV*************************************** */
                     if($request->identity ==3){
                            $creditas = DB::table('mobile_payements')
                            ->where('mobile_payements.id_marchand', '=', $request->id_marchand)
                            ->where('mobile_payements.type_service', '=', 'airtel')
                            ->update([
                                'nom_service'=>$request->nom_serviceA,
                                'numero_marchand'=>$request->numero_marchandA,
                                'status'=>0,
                            ]);
                            $creditas = DB::table('mobile_payements')
                            ->where('mobile_payements.id_marchand', '=', $request->id_marchand)
                            ->where('mobile_payements.type_service', '<>', 'airtel')
                            ->update([
                                'nom_service'=>$request->nom_serviceM,
                                'numero_marchand'=>$request->numero_marchandM,
                                'status'=>0,
                            ]);
                      }
                    return response()->json([
                        'status'=>200,
                    ]);
            } // end if  Auth()
        } // fin modifyPaymentMarchand


        public function verifyVendeurEmail(Request $request, $id_vendeur) {

            $currentDateTime = Carbon::now();
            $formattedDateTime = $currentDateTime->format('Y-m-d H:i:s');

            $order_updated = DB::table('users')
                ->where('users.id', '=', $id_vendeur)
                ->update([
                'email_verified_at' => $formattedDateTime,
            ]);

            $pre_user = DB::table('users')->where('id', $id_vendeur)->get();
            $user = $pre_user[0];

            if ($user instanceof User){
                $user->last_login =  NOW();
                $user->attemp_failed = 0;
                $user->logout = 0;

                Main::initSessions($user);
                Main::setSessionNotificationConfig($user);
        
                if($user->save())  Auth::login($user);
            }

            return redirect()->route('marchand-space');

        }


}
