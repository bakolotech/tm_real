
<?php

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

$monPays = \App\Models\Pays::getPays();
$pays = \App\Models\Pays::possibles();
$langues = \App\Models\Langue::possibles();
$devises = \App\Models\Devise::possibles();
$pays= \App\Models\Pays::getPaysInfos();
$pays_seul = \App\Models\Pays::possibles();

// dd($pays);


if (isset($_SESSION['config']) && !empty($_SESSION['config']) && count($_SESSION['config']) > 0){
    if (isset($_SESSION['config']['user-langue']) && !empty($_SESSION['config']['user-langue'])) {$maLangue = $_SESSION['config']['user-langue'];} else {$maLangue = []; }
    if (isset($_SESSION['config']['user-ville']) && !empty($_SESSION['config']['user-ville'])) {$maVille = $_SESSION['config']['user-ville'];} else {$maVille = []; }
    if (isset($_SESSION['config']['user-province']) && !empty($_SESSION['config']['user-province'])) {$maProvince = $_SESSION['config']['user-province'];} else {$maProvince = []; }
    if (isset($_SESSION['config']['user-devise']) && !empty($_SESSION['config']['user-devise'])) {$maDevise = $_SESSION['config']['user-devise'];} else {$maDevise = []; }
}
else{
    $maLangue = [];
    $maVille = [];
    $maProvince = [];
    $maDevise = [];
}
$maPosition = $_SESSION['config']['ma-position'];


?>

<!doctype html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="keywords" content="Toule-Accueil" />
    <meta name="description" content="Toule-Accueil" />
    <meta name="google-signin-client_id" content="887187098623-0alf9uj2b4f6gelfi70s7se6ana8teu1.apps.googleusercontent.com">

    <title>Toule-Marchand 3-2</title>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js"crossorigin="anonymous"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;1,100;1,300;1,400;1,500&display=swap" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="{{ asset('assets/select2/css/select2.min.css') }}">


    <link rel="icon" href="assets/images/fav2.svg" sizes="32x32" />
    <link rel="stylesheet" href="css/style2.css">
    <link rel="stylesheet" href="{{ asset('css/main-css.css') }}">
    <link rel="stylesheet" href="{{ asset('css/form-style.css') }}">

    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/bootstrap/dist/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/select2/css/select2.min.css') }}">
    @yield('css-debut')
    <link rel="stylesheet" href="{{ asset('assets/owl-caroussel/dist/assets/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/owl-caroussel/dist/assets/owl.theme.default.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/rayon.css') }}">
    <link rel="stylesheet" href="{{ asset('css/main-css.css') }}">
    <link rel="stylesheet" href="{{ asset('css/form-style.css') }}">
    <link rel="stylesheet" href="{{ asset('lib/bootstrap-datepicker.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/public/fontawesome-free/css/all.css') }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper/swiper-bundle.min.css" />

         {{-- JS CHART ET JQUERY --}}
         <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js"></script>
         <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
         <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script>
         <script type="text/javascript" src="http://code.highcharts.com/highcharts.js"></script>
         <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.js"></script>

    <style>

        #ppvr-11,  #ppvr-21 {
            height: 240.05px;
            width: 246px;
            border-radius: 6px 19px 6px 6px;
            background-color: #1A7EF5;
            position: absolute;
            margin-top: -230px;
            padding: 7px;
            margin-right: -100px;
            margin-left: 82px;
            overflow-y: auto;
            overflow-x: hidden;
        }

        .rectangle-panel-button {
            margin-bottom: 29.5px;
        }

        .disable-button {
            box-sizing: border-box;
            height: 35px;
            width: 35px;
            border: 2px solid #FFFFFF;
            background-color: #D8D8D8;
        }

        .active_step {
            background-color: #D8D8D8;
        }

        .panel-button-text-desable {
            color: #9B9B9B !important;
            font-family: Roboto;
            font-size: 10px;
            font-weight: 500;
            letter-spacing: 0;
            line-height: 11px;
            text-align: center;
        }

        .custom-text-infos {
            height: 18px;
            width: 415px;
            color: #000000;
            font-family: Roboto;
            font-size: 14px;
            font-weight: 900;
            letter-spacing: 0.4px;
            line-height: 18px;
        }

        .box-sizing {
            height: 60px;
            width: 194px;
            padding: 0px;
        }

        .input-background {
            border: 1px solid #9B9B9B;
            border-radius: 6px;
            background-color: #F8F8F8;
        }

    </style>

</head>



<body>
<div class="container">
    <div class="rectangle-1">
        <a href="https://toule.market" class="logo-copy">
            <img src="assets/images2/Logo_T.png.svg" alt="logo" width="100%" height="100%">
        </a>
        <div class="parametre">Paramètre</div>
    </div>
</div>

<div class="rectangle">
    <div class="containerD mask" style="display: flex; flew-direction: column">

        <div class="rowS hauteur-fixe container-zone-vendeur" style="display: flex;">
            <div style="width: 112.5px; height: 95vh; padding-left: 10px; border-right: 2px solid #979797; margin-right: 60px">
                <div class="rectangle-panel-button active">

                    <div class="panel-button-icon  active   rounded-circle" style="background-color:#1A7EF5; text-align:center; padding:5%">
                        <p style="color:white">1</p>
                    </div>

                    <div class="panel-button-text">Informations individuelles</div>
                    </div>

                    <div class="rectangle-panel-button">
                    <div class="panel-button-icon  active   rounded-circle active_step" style="text-align:center; padding:5%">
                           <p style="color:white">2</p> </div>
                        <div class="panel-button-text-desable">Facturation</div>
                    </div>

                    <div class="rectangle-panel-button">
                    <div class="panel-button-icon  active   rounded-circle active_step" style="text-align:center; padding:5%">
                           <p style="color:white">3</p> </div>
                        <div class="panel-button-text-desable">Boutique</div>
                    </div>

                    <div class="rectangle-panel-button">
                    <div class="panel-button-icon  active   rounded-circle active_step" style="text-align:center; padding:5%">
                           <p style="color:white">4</p> </div>
                        <div class="panel-button-text-desable">Vérification</div>
                    </div>
            </div>

            <div class="bordure-droite nouveau-content-right" style="width: 753px;">
                {{-- Entête du form  --}}
                <div class="form-zone" style="margin-right: 60px;">
                    <form  data-btn="#login-register-btn">
                        <input name="_token" type="hidden" id="token" value="{{ csrf_token() }}"/>
                    {{-- <div class="row"> --}}

                        {{-- debut formulaire  --}}

                        <div class="col-lg-12 col-md-12 div-2h" >
                            <div class="informations-commerce">
                                {{-- <div class="d-flex justify-content-center text-infos">Informations commerciales pour {{$_SESSION['prenom']['2']}} </div> --}}
                                <div class="d-flex justify-content-center text-infos- custom-text-infos">Informations commerciales pour XXXX </div>
                            </div>
                               {{-- Premier block --}}
                               <style>

                                    .container-1-infos {
                                        height: 240px;
                                        width: 633px;
                                        margin-top: 20.5px;
                                        border: 1px solid #D8D8D8;
                                        border-radius: 6px;
                                        position: relative;
                                        margin-left: auto;
                                        margin-right: auto;
                                    }

                                    .container-2-infos {
                                        height: 150px;
                                        width: 633px;
                                        margin-top: 20.5px;
                                        border: 1px solid #D8D8D8;
                                        border-radius: 6px;
                                        position: relative;
                                        margin-left: auto;
                                        margin-right: auto;
                                    }

                                    .line-container-1 {
                                        height: 60px;
                                    }

                                    .box-input1 {
                                        height: 60px;
                                        width: 195px;
                                    }

                                    .rectangle-select {
                                        box-sizing: border-box;
                                        border-radius: 6px;
                                        background-color: #F8F8F8 !important;
                                    }

                                    

                                    .ul-select {
                                        width: 300px;
                                        border: 1px #000 solid;
                                        margin-top: 7px;
                                        height: 230px;
                                        overflow-y: auto;
                                        overflow-x: hidden;
                                    }

                                    .ul-select li { padding: 5px 10px; z-index: 2; }
                                    .ul-select li:not(.init) {
                                        float: left;
                                        width: 300px;
                                        display: none;
                                        background: #ddd;

                                    }
                                    .ul-select li:not(.init):hover, ul li.selected:not(.init) { background: #09f; }
                                    li.init { cursor: pointer; }

                                    a#submit { z-index: 1; }

                                    .pays-none {
                                        display: none;
                                    }

                               </style>
                               <div class="container-1-infos">

                                <div class="line-container-1" style="display: flex; margin-bottom: 15px; margin-top: 15px; ">
                                    <div class="ele1 box-input1" style="margin-left: 15px">
                                        <div class="label-el">Pays de citoyenneté</div>
                                        {{-- <select name="payscite" id="pays-citoyenne" class="rectangle-select my-selectkkk" style="width: 195px !important;">
                                            <option value="">Sélectionner le pays</option>
                                            <option value="Gabon">Gabon</option>
                                            <option value="Caméroun">Caméroun</option>
                                            <option value="Guinée">Guinée</option>
                                            <option value="Togo">Togo</option>
                                        </select> --}}
                                        <select name="payscite" id="pays-citoyenne" class="rectangle-select my-selectkkk" style="width: 195px !important;">
                                            <option value="">Choisir votre pays</option>
                                            @foreach($pays_seul as $pay)
                                            <option value="{{$pay->id}}">{{ $pay->nom_fr_fr }}</option>
                                        @endforeach
                                        </select>
                                    </div>

                                    <div class="ele1 box-input1" style="margin-left: 10px">
                                            <div class="label-el">Pays de naissance</div>
                                            {{-- <select name="paysnaiss" id="pays_naissance" class="rectangle-select my-select" style="padding-left:10px; width: 195px !important;">
                                                <option value="">Sélectionner le pays</option>
                                                <option value="Gabon">Gabon</option>
                                                <option value="Togo">Togo</option>
                                                <option value="Mali">Mali</option>
                                            </select> --}}
                                            <select name="paysnaiss" id="pays_naissance" class="rectangle-select my-select" style="padding-left:10px; width: 195px !important;">
                                                <option value="">Choisir votre pays</option>
                                                @foreach($pays_seul as $pay)
                                                <option value="{{$pay->id}}">{{ $pay->nom_fr_fr }}</option>
                                            @endforeach
                                            </select>
                                    </div>

                                    <div class="ele1 box-input1" style="margin-left: 10px">
                                        <div class="label-el">Date de naissance</div>
                                        <input style="padding-left: 10px; width: 195px !important; color: #4A4A4A;" type="text" id="mask-date-naissance" placeholder="jj/mm/aaaa" class="rectangle-input">
                                    </div>
                                </div>

                                <div class="line-container-1" style="margin-left: 15px">
                                    <div class="label-el">Justificatif d'identité</div>
                                <div class="d-flex rectangle-input-2" style="width: 605px;">
                                    <select class="rectangle-input-disable-2-p-0" id="piece-identite-type" style="width: 207px !important; padding-left: 10px;">
                                        <option value="">Carte national d'identité</option>
                                        <option value="cni">CNI</option>
                                        <option value="passport">Passeport</option>
                                    </select>
                                    <div style="width: 397px;">
                                        <input type="text" style=" padding-left: 10px; width: 397px !important; font-weight: 300" class="input-neutre in-style" id="numeropiece" placeholder="Numéro de carte">
                                    </div>
                                </div>

                                </div>

                                <div class="line-container-1" style="display: flex; margin-left: 15px; margin-top: 15px">
                                    <div class="ele1 box-input1" >
                                        <div class="label-el">Pays d'émission</div>
                                        {{-- <select name="paysEmissions" id="pays-emission" class="rectangle-select"style="padding-left:10px; z-index: 100 !important">
                                            <option value="">Sélectionner le pays</option>
                                            <option value="Gabon">Gabon</option>
                                            <option value="Mali">Mali</option>
                                            <option value="Canada">Canada</option>
                                        </select> --}}
                                        <select name="paysEmissions" id="pays-emission" class="rectangle-select"style="padding-left:10px; z-index: 100 !important">
                                            <option value="">Choisir votre pays</option>
                                            @foreach($pays_seul as $pay)
                                            <option value="{{$pay->id}}">{{ $pay->nom_fr_fr }}</option>
                                        @endforeach
                                        </select>
                                </div>

                                <div class="ele1 box-input1" style="margin-left: 10px">
                                    {{-- <label for="" class="mon-label">Date d'expiration</label> --}}
                                    <div class="label-el">Date d'expiration</div>
                                    <input type="text" id="mask-date-expiration" placeholder="jj/mm/aaaa"   class="rectangle-input" style="padding-left: 15px">
                                </div>

                                </div>
                            </div>
                               </div>

                               <style>
                                    .line-container-2 {
                                        height: 41px;
                                        width: 100%;
                                    }
                               </style>

                            <div class="container-2-infos">
                                <div class="line-container-2" style="display: flex; margin-top: 15px">
                                    <div class="box-input1" style="margin-left: 15px">
                                        <select name="paysadress" class="rectangle-select" id="adresse-pays-particulier" style="padding-left: 10px">
                                            <option value="" disabled selected hidden>Sélectionner le pays</option>
                                            <option value="Gabon">Gabon</option>
                                            <option value="Congo">Congo</option>
                                            <option value="Cameroun">Cameroun</option>
                                        </select>
                                    </div>

                                    <div class="box-input1" style="margin-left: 10px">
                                        <input style="padding-left: 15px" type="text" class="rectangle-input" id="code-postal" placeholder="Code postal">
                                    </div>

                                    <div class="box-input1" style="margin-left: 10px">
                                        {{-- <select name="province_element" class="rectangle-select" id="province-particulier" style="padding-left: 10px; padding-right: 15px !important">
                                            <option value="">Bitam</option>
                                            <option value="">Libreville</option>
                                            <option value="">Port Gentil</option>
                                        </select> --}}
                                        <select @if ($maPosition['id'] != $_SESSION['config']['user-pays']) disabled @endif data-default-city="{{ $maPosition['states']['0']['cities'][0]['id'] }}" name="province_element" class="rectangle-select" id="province-particulier" style="width: 194px !important; z-index: 2000" class="my-select my-form-field" aria-label="" onchange="marcherChanged()">
                                            @if ($maPosition['id'] == $_SESSION['config']['user-pays'])
                                                @foreach($maPosition['country']['cities'] as $city)
                                                    <option @if(isset($maProvince['cities'][0]) && count($maProvince['cities'][0]) > 0 && $maProvince['cities'][0]['id'] == $city['id'])
                                                            selected <?php $i = 1?>
                                                            @elseif (isset($maPosition['states'][0]['cities'][0]) && !empty($maPosition['states'][0]['cities'][0]) && $maPosition['states'][0]['cities'][0]['id'] == $city['id'] && $i == 0)
                                                            selected
                                                            @endif value="{{ $city['id'] }}">
                                                        {{ $city['name'] }}
                                                    </option>
                                                @endforeach
                                            @else
                                                <option selected value="{{ $maProvince['cities'][0]['id'] }}">{{ $maProvince['cities'][0]['name'] }}</option>
                                            @endif
                                        </select>
                                    </div>
                                </div>
                                {{-- line 2  --}}

                                <div class="line-container-2" style="display: flex; margin-top: 5px">
                                    <div class="box-input1" style="margin-left: 15px">
                                        <input type="text" style="padding-left: 10px" class="rectangle-input" id="ville-particulier" placeholder="Ville">
                                    </div>
                                    <div class="box-input1" style="margin-left: 10px">
                                        <input type="text" style="padding-left: 10px" class="rectangle-input" id="adresse-particulier" placeholder="Adresse">
                                    </div>
                                    <div class="box-input1" style="margin-left: 10px">
                                        <input type="text" style="padding-left: 10px" class="rectangle-input" id="adresse-complement" placeholder="Comp. d’adresse (facultatif)" style="font-size: 12px;padding-left:5px;">
                                    </div>
                                </div>

                                <div class="line-container-2" style="display: flex; margin-top: 5px; ">
                                    <div class="forms-3-checkbox-off-2-forms" style="margin-left: 15px; margin-right: 5px" >
                                        <input style="margin: 0px" class="form-check-input radio-check-icon" type="checkbox" id="adresse-confirmation" value="0">
                                    </div>
                                    <div class="je-confirme-que-lem" style=" color: #4A4A4A;
                                    font-family: Roboto;
                                    font-size: 12px;
                                    letter-spacing: 0.26px;
                                    line-height: 13px;">Je confirme que mon adresse est correcte et je comprends que ces informations ne peuvent pas être modifiées tant que la vérification de l'adresse n'est pas terminée.</div>
                                </div>
                            </div>


                            <div class="form-fields" style="margin-top: 50px; margin-left: 30px">
                            <div class="col-8">
                                    <label for="" class="mon-label">Numéro de téléphone pour vérification</label>
                                    <div class="d-flex rectangle-input-2" >
                                        <div class="" style="width: 25%; height: 100%;">
                                            {{-- <ul class="list-unstyled ul-select" style="border: none; position: relative; top: 5px">
                                                <li class="init">Choisir le pays</li>
                                                @foreach($pays as $pay)

                                                <li data-value="{{ $pay['phonecode'] }}">
                                                    <img style="margin-top: -3px" src='{{$pay['images']}}' alt=''>
                                                    <span class="pays_name">{{ $pay['nom_pays'] }} ( {{$pay['phonecode']}})</span>
                                                </li>
                                            @endforeach
                                            </ul> --}}

                                            <ul class='select-ul' id='id3' style="width: 194px !important;">
                                                @foreach($pays_seul as $pay)

                                                    <li class='select-li' id="formChangeBoutique_select-li-{{ $pay->id }}" data-value='{{ $pay->id }}' data-input='#formChangeBoutique_pays' data-text="{{ $pay->nom_fr_fr }}">
                                                        <div class='select-second-div'>
                                                            <div class='select-main-div-img'><img src='{{ $pay->getImage() }}' alt=''></div>
                                                            <div class='select-main-div-text'>{{ $pay->nom_fr_fr }}</div>
                                                            <div class='selected-lihh'></div>
                                                        </div>
                                                    </li>
                                                @endforeach
                                            </ul>

                                            <div class="my-select-img bg-simple-grey" id="formChangeBoutique_pays-input" style="width: 194px !important">
                                    <div class='parent-0 select-main-div my-form-field pl-0' data-ul-id='#id3' id="formChangeBoutique_pays-select" data-opened="0" style="overflow: hidden; width: 194px !important">
                                        <!-- <div class='select-main-div-img with-border' id="id3-main-img"><img src='{{ $monPays->getImage() }}' alt=''></div>
                                        <div class='select-main-div-text'>{{ $monPays->nom_fr_fr }}</div> -->
                                    </div>
                                    <ul class='select-ul' id='id3' style="width: 194px !important;" data-opened="0">
                                        @foreach($pays_seul as $pay)
                                            <li class='select-li' id="formChangeBoutique_select-li-{{ $pay->id }}" data-value='{{ $pay->id }}' data-input='#formChangeBoutique_pays' data-text="{{ $pay->nom_fr_fr }}">
                                                <div class='select-second-div'>
                                                    <div class='select-main-div-img'><img src='{{ $pay->getImage() }}' alt=''></div>
                                                    <div class='select-main-div-text'>{{ $pay->nom_fr_fr }}</div>
                                                    <div class='selected-li'></div>
                                                </div>
                                            </li>
                                        @endforeach
                                    </ul>
                                </div>
                                <div id='formChangeBoutique_pays-error' class="formChangeBoutique_error-text error-text error-msg"></div>
                            </div>

                                        </div>
                                        <div class="" style="width: 20%; height: 100%;">
                                            <input type="text" id="inputCode" class="input-neutre" value="">
                                        </div>
                                        <div class="" style="width: 40%; height: 100%">
                                            <input type="text" class="input-neutre" id="numero-telephone" placeholder="Ex: 62955990">
                                        </div>
                                        {{-- <div><input type="tel" id="demo" placeholder="" id="telephone"></div> --}}
                                        <article style="  height: 31px;
                                        width: 133px;
                                        border-radius: 6px;
                                        background-color: #1A7EF5;margin-top:5px;margin-left:5px;padding-left:7px;padding-top:5px;">
                                        <a href="3-1-verifie.php" style="min-width: 35%;color:white; font-family: Roboto;
                                        font-size: 10px;
                                        font-weight: 500;
                                        letter-spacing: 0.26px;
                                        line-height: 14px; text-decoration: none" class="envoyer-un-sms">Envoyer un message</a></article>
                                    </div>

                                    {{-- <div class="zone-pays-test">

                                    </div> --}}


                                    {{-- <div class="je-confirme-que-lem">{{$_SESSION['type_marchand']}}</div> --}}
                                </div>
                            </div>
                        </div>
                    </form><br><br><br><br><br><br><br><br><br>

                </div>
            </div>

            <div class="foire-aux-question" style="width: 472.5px; position: relative; left: -10px">
                <div class="col-lg- d-none d-lg-block" >

                    <div class="d-flex justify-content-around">
                        <p class="foire-aux-questions">Foire aux questions</p>
                    </div>

                    <div class="question-group-2">
                        <div style="display: flex; justify-content: space-between">
                            <p class="titre-question">Pourquoi un « contact principal » doit-il fournir ses informations personnelles ?</p>
                            <span data-for-id="#question-1" class="changerIcon icon-1" data-signe="+"><img src='assets/images2/plus-lg.svg'></span>
                        </div>
                        <p class="text-question" id="question-1">Le contact principal est la personne qui a accès au compte, fournit les informations d'enregistrement au nom du détenteur du compte (le vendeur inscrit) et déclenche les transactions telles que les versements et les remboursements. Les actions prises par le point de contact principal sont considérées comme étant prises par le détenteur du compte.</p>
                        <div class="ligne"></div>
                    </div>

                    <div style="margin-top: 15px;" class="question-group-2">
                        <div style="display: flex; justify-content: space-between">
                            <p class="titre-question">Qui est un « bénéficiaire effectif » ?</p>
                            <span data-for-id="#question-2" class="changerIcon icon-1" data-signe="+"><img src='assets/images2/plus-lg.svg'></span>
                        </div>
                        <p class="text-question" id="question-2">Les bénéficiaires effectifs sont des personnes qui possèdent ou contrôlent l'entreprise en détenant, directement ou indirectement, plus-lg de 25 % de ses parts ou droits de vote, ou toute autre personne qui exerce une forme de contrôle sur la gestion de l'entreprise.</p>
                        <div class="ligne"></div>
                    </div>

                    <div style="margin-top: 15px;" class="question-group-2">
                        <div style="display: flex; justify-content: space-between">
                            <p class="titre-question">Qui est le « représentant légal de l'entreprise » ?</p>
                            <span data-for-id="#question-3" class="changerIcon icon-1" data-signe="+"><img src='assets/images2/plus-lg.svg'></span>
                        </div>
                        <p class="text-question" id="question-3">Un représentant légal de l'entreprise a des pouvoirs spécifiques et est légalement autorisé par votre société à la gérer et à agir en son nom (par exemple : acceptation des conditions générales, ouverture d'un compte vendeur, etc.). Le représentant légal peut, ou non, être le propriétaire du commerce.</p>
                        <div class="ligne"></div>
                    </div>

                    <div style="margin-top: 15px;" class="question-group-2">
                        <div style="display: flex; justify-content: space-between">
                            <p class="titre-question">Que dois-je faire si je suis le contact principal, mais pas le représentant légal ?</p>
                            <span data-for-id="#question-4" class="changerIcon icon-1" data-signe="+"><img src='assets/images2/plus-lg.svg'></span>
                        </div>
                        <p class="text-question" id="question-4">Si la personne enregistrée comme contact principal n'est pas un représentant légal, le représentant légal de l'entreprise enregistrée fournit une lettre d'autorisation. Ce document autorise le contact principal à agir au nom de l'entreprise. Nous vous informerons dès que le document sera requis.</p>
                        <div class="ligne"></div>
                    </div>

                </div>
            </div>
            {{-- footer element  --}}

    </div>
</div>

        </div>
    </div>
    <div style="height: 81px; background-color: transparent; position: relative; top: -120px; width: 100%; padding-right: 400px">
        <div class="d-flex justify-content-center">
            <div class="bottom-divd" style="display: flex; margin-top: 15px; background-color: #fff; padding: 0px 80px 0px 80px">
                <div class="group-3">
                    <button type="submit" class="group3" style="font-family: Roboto;
                    font-size: 16px;
                    font-weight: 500;
                    letter-spacing: 0.35px;
                    line-height: 19px;
                    text-align: center;" onclick="saveMarchandInformationPerso(event)"><span class="mbtn-text">Suivant</span></button>
                </div>
            </div>

        </div>
    </div>



<script src="js/script.js"></script>

<script src="{{ asset('assets/jquery/dist/jquery.min.js') }}"></script>
    <script src="{{ asset('assets/select2/js/select2.min.js') }}"></script>
    <script src="{{ asset('assets/select2/js/i18n/fr.js') }}"></script>

    <script src="{{ asset('js/form.js') }}"></script>

{{-- jQuery-Mask-Plugin-master --}}
<script src="{{ asset('assets/jQuery-Mask-Plugin-master/dist/jquery.mask.min.js') }}"></script>
<script>

    IMask(
        document.getElementById('mask-date'),
        {
            mask: Date,
            lazy: false,
            overwrite: true,
            autofix: true,
            pattern: "d/m/Y",
            blocks: {
                d: {mask: IMask.MaskedRange, placeholderChar: 'j', from: 1, to: 31, maxLength: 2},
                m: {mask: IMask.MaskedRange, placeholderChar: 'm', from: 1, to: 12, maxLength: 2},
                Y: {mask: IMask.MaskedRange, placeholderChar: 'a', from: 1900, to: 3000, maxLength: 4},
            }
        }
    );
    IMask(
        document.getElementById('mask-date-1'),
        {
            mask: Date,            lazy: false,
            overwrite: true,
            autofix: true,
            pattern: "d/m/Y",
            blocks: {
                d: {mask: IMask.MaskedRange, placeholderChar: 'j', from: 1, to: 31, maxLength: 2},
                m: {mask: IMask.MaskedRange, placeholderChar: 'm', from: 1, to: 12, maxLength: 2},
                Y: {mask: IMask.MaskedRange, placeholderChar: 'a', from: 1900, to: 3000, maxLength: 4},
            }
        }
    );

    function saveMarchandInformationPerso(event) {
            event.preventDefault();
            var pays_citoyennete = $('#pays-citoyenne').find(':selected').val(); //ok
            var pay_naissance = $('#pays_naissance').find(':selected').val();
            var date_naissance = $('#mask-date-naissance').val()
            var piecie_identite_type = $('#piece-identite-type').find(':selected').val();
            var numero_piece = $('#numeropiece').val();
            var date_expiration = $('#mask-date-expiration').val();
            var pays_emission = $('#pays-emission').find(':selected').val();
            var adresse_pays_particulier = $('#adresse-pays-particulier').find(':selected').val();
            var code_postal_particulier = $('#code-postal').val();
            var adresse_province = $('#province-particulier').find(':selected').val();
            var adresse_ville = $('#ville-particulier').val();
            var adresse_fixe = $('#adresse-particulier').val();
            var adresse_complement = $('#adresse-complement').val();
            var telephone_particulier = $('#numero-telephone').val();
            var adresse_confirmation = $('#adresse-confirmation').val();

            console.log("Bonjour ", pays_emission)

            var info_particulier = {
                pays_citoyennete: pays_citoyennete,
                pay_naissance: pay_naissance,
                date_naissance: date_naissance,
                piecie_identite_type: piecie_identite_type,
                numero_piece: numero_piece,
                pays_emission: pays_emission,
                date_expiration: date_expiration,
                adresse_pays_particulier: adresse_pays_particulier,
                code_postal_particulier: code_postal_particulier,
                adresse_province: adresse_province,
                adresse_ville: adresse_ville,
                adresse_fixe: adresse_fixe,
                adresse_complement: adresse_complement,
                telephone_particulier: telephone_particulier,
                adresse_confirmation: adresse_confirmation,
                _token: $('#token').val(),
                step: 2,
                type_activite: 1,
            }


            if ($('#adresse-confirmation').is(":checked"))
            {
                console.log("Vous avez conformé l'inscription")
            }

                $.ajax({
                type:'POST',
                url:"vers-infos-perso",
                data: info_particulier,
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                success:function(response){
                    console.log(response)
                    window.location.href = "/marchand-facturation-particulier"
                }
            });
        }

</script>

<script>
    $(document).ready(function() {

        $('#pays-citoyenne').select2({
            dropdownCssClass : 'no-search'
        });

        $('#pays-emission').select2({
            dropdownCssClass : 'no-search'
        })

        $('#adresse-pays-particulier').select2({
            dropdownCssClass : 'no-search'
        })

        $('#province-particulier').select2({
            dropdownCssClass : 'no-search'
        })

        $('#mask-date-naissance').mask('00/00/0000');

        $('#code-postal').mask('0000')

        $('#mask-date-naissance').bind('keyup','keydown', function(event) {
            var inputLength = event.target.value.length;
            if (event.keyCode != 8){
            if(inputLength === 2 || inputLength === 5){
                var thisVal = event.target.value;
                thisVal += '/';
                $(event.target).val(thisVal);
                }
            }
        })

        // date d'expiration
        $('#mask-date-expiration').mask('00/00/0000')
        $('#mask-date-expiration').bind('keyup','keydown', function(event) {
            var inputLength = event.target.value.length;
            if (event.keyCode != 8){
            if(inputLength === 2 || inputLength === 5){
                var thisVal = event.target.value;
                thisVal += '/';
                $(event.target).val(thisVal);
                }
            }
        })
        // $('#mask-date-naissance').on('keyup', function() {
        //     let date = $('#mask-date-naissance').val()
        //     let tab_date = []
        //     var dateformat = /^(0?[1-9]|[12][0-9]|3[01])[\/\-](0?[1-9]|1[012])[\/\-]\d{4}$/;


        //     if(date.length == 2) {
        //         let date_p = date;
        //         $('#mask-date-naissance').val(date_p+'/')
        //     }

        // })

        // $("ul").on("click", ".init", function() {
        //         $(this).closest("ul").children('li:not(.init)').toggle();
        //         $(this).closest("ul").children('li:not(.init)').each(function() {
        //             if ($(this).find('.pays_name').hasClass('pays-none')) {
        //                 $(this).find('.pays_name').removeClass('pays-none')
        //             }
        //         })

        //     });

        //     var allOptions = $("ul").children('li:not(.init)');
        //     $("ul").on("click", "li:not(.init)", function() {
        //         allOptions.removeClass('selected');
        //         let current_span = $(this).find('.pays_name')
        //         $(this).find('.pays_name').addClass('pays-none');
        //         $(this).addClass('selected');
        //         $(this).addClass('selected');
        //         $('#inputCode').val($(this).attr('data-value'))
        //         $("ul").children('.init').html($(this).html());
        //         $(this).append(current_span)
        //         allOptions.toggle();
        // });

        var input = document.querySelector("#demo");

        $("#demo").intlTelInput({
            initialCountry: "us",
            separateDialCode: true,
            preferredCountries: ["fr", "us", "gb"],
            geoIpLookup: function (callback) {
                $.get('https://ipinfo.io', function () {
                }, "jsonp").always(function (resp) {
                    var countryCode = (resp && resp.country) ? resp.country : "";
                    callback(countryCode);
                });
            },
            utilsScript: "https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/11.0.14/js/utils.js"
        });
    })
</script>

</body>
</html>
