<?php

    if (session_status() == PHP_SESSION_NONE) {
        session_start();
    }

    $monPays = \App\Models\Pays::getPays();
    $pays = \App\Models\Pays::possibles();
    $langues = \App\Models\Langue::possibles();
    $devises = \App\Models\Devise::possibles();

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

    <title>Toule-Vendeur</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" crossorigin="anonymous">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;1,100;1,300;1,400;1,500&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/bootstrap/dist/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/select2/css/select2.min.css') }}">

    <link rel="icon" href="assets/images2/fav2.svg" sizes="32x32" />
    <link rel="stylesheet" href="css/style2.css">
    <link rel="stylesheet" href="css/ppvr-1.css">
    <link rel="stylesheet" href="{{ asset('css/main-css.css') }}">
    <link rel="stylesheet" href="{{ asset('css/form-style.css') }}">

<style>

    #ppvr-11 {
        height: 211.86px;
        width: 315px;
        border-radius: 6px 19px 6px 6px;
        border-radius: 6px 19px 6px 6px;
        background-color: #1A7EF5;
        position: absolute;
        margin-top: -230px;
        padding-left: 15px;
        padding-top: 15px;
        margin-right: -100px;
        margin-left: 13px;
        margin-top: -198px;
    }

    #ppvr-21 {
        height: 211.86px;
        width: 315px;
        border-radius: 6px 19px 6px 6px;
        background-color: #1A7EF5;
        position: absolute;
        margin-top: -198px;
        padding-left: 15px;
        padding-top: 15px;
        margin-right: -100px;
        margin-left: 13px;
    }

    #ppvr-31 {
        height: 310px;
        width: 315px;
        border-radius: 6px 19px 6px 6px;
        background-color: #1A7EF5;
        position: absolute;
        margin-top: -297px;
        padding-left: 15px;
        padding-top: 15px;
        margin-right: -100px;
        margin-left: 14px;
    }

    #ppvr-31 p {
        color: #fff;
    }

    .popover-organisation-content {
        height: 234.05px;
        width: 239px;
        overflow-y: auto;
        overflow-x: hidden;
    }


    #ppvr-11, #ppvr-21 p {
        color: #fff;
        font-size: 14.5px;
    }


    #ppvr-11::after {
    content: "";
    position: absolute;
    top: 211px;
    /* left: 100%; */
    margin-left: 10px;
    border-width: 5px;
    border-style: solid;
    border-color: #1A7EF5 transparent transparent transparent;
    transform: rotate(0deg);
    }

    #ppvr-21::after {
    content: "";
    position: absolute;
    top: 211px;
    margin-left: 10px;
    border-width: 5px;
    border-style: solid;
    border-color: #1A7EF5 transparent transparent transparent;
    transform: rotate(0deg);
    }

    #ppvr-31::after {
    content: "";
    position: absolute;
    top: 299px;
    margin-left: -2px;
    border-width: 16px;
    border-style: solid;
    border-color: #1A7EF5 transparent transparent transparent;
    transform: rotate(0deg);
    }

    .tool-none {
        display: none;
    }

    .popover-headerd {
        height: 57px;
        width: 285px;
        color: #FFFFFF;
        font-family: Roboto;
        font-size: 16px;
        font-weight: 500;
        letter-spacing: -0.39px;
        line-height: 17px;
        position: relative;
    }

    .pop-body {
        height: 98px;
        width: 285px;
        color: #FFFFFF;
        font-family: Roboto;
        font-weight: 300;
        font-size: 12px;
        letter-spacing: -0.25px;
        line-height: 15px;
    }

    .pop-body-caritative {
        width: 285px;
        color: #FFFFFF;
        font-family: Roboto;
        font-weight: 300;
        font-size: 12px;
        letter-spacing: -0.25px;
        line-height: 14px;
    }

</style>

</head>

<body id="" class="">
    @include('front.app-module.user-profil.modals.vendeur-menu')
    <div class="rectangle">
        <div class="containerD mask" style="display: flex; flew-direction: column">

            <div class="rowS hauteur-fixe container-zone-vendeur" style="display: flex;">


                <div class="bordure-droite nouveau-content-right" style="">
                    {{-- Entête du form  --}}

                <div class="avant-de-commencer">
                    <p class="d-block h3" style="font-size: 25px !important;">Avant de commencer, vérifiez que vous avez <br> à portée de main les éléments suivants</p>
                    <p class="d-block text-adc">Il est possible que nous vous demandions des informations ou des documents supplémentaires ultérieurement.</p>
                </div>

                    <div class="row" >
                        <div class="col-md-8 offset-md-2">
                            <div class="d-flex justify-content-center group-2">

                                <div class="rectangle-copy col-md-3d">
                                    <div class="rectangle-child">
                                        <div class="icon">
                                            <img src="assets/Icons_Vendeur/Adresse.svg" alt="">
                                        </div>
                                        <p class=" tm-info-nouveau-compte text">Adresse du contact et de l'entreprise</p>
                                    </div>
                                </div>

                                <div class="rectangle-copy col-md-3d">
                                    <div class="rectangle-child">
                                        <div class="icon">
                                            <img src="assets/Icons_Vendeur/Tel.svg" alt="">
                                        </div>
                                        <p class="text   tm-info-nouveau-compte">Numéro de téléphone fixe ou portable</p>
                                    </div>
                                </div>

                                <div class="rectangle-copy col-md-3d">
                                    <div class="rectangle-child">
                                        <div class="icon">
                                            <img src="assets/Icons_Vendeur/Carte.svg" alt="">
                                        </div>
                                        <p class="text tm-info-nouveau-compte">Carte de crédit à débiter</p>
                                    </div>
                                </div>
                                <div class="rectangle-copy col-md-3d">
                                    <div class="rectangle-child">
                                        <div class="icon">
                                            <img src="assets/Icons_Vendeur/Identité.svg" alt="">
                                        </div>
                                        <p class="text tm-info-nouveau-compte">Détails relatifs à l'identité </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    {{-- form  --}}
                    <div class="form-zone" style="width: 866.5px;">
                        <form  method="POST" data-btn="#login-register-btn">
                            <input name="_token" type="hidden" id="token" value="{{ csrf_token() }}"/>
                            {{-- main form content  --}}
                            <div style="margin-top: 60px; padding-left: 94px; ">
                                <div class="groupd" id="informations-principales" style="width: 678px; height: 93px; display: flex; margin-bottom: 20px">
                                    <div>
                                        <div class="label-el">Adresse professionnelle</div>
                                        <select class="rectangle-select my-select my-form-field" style="padding-right: 20px; width: 329px !important " name="adressepro" onchange="paysChanges()" id="langue">
                                            <option value="" style="margin-left: 10px">Choisir votre pays</option>
                                            @foreach($pays as $pay)
                                            <option value="{{$pay->id}}">{{ $pay->nom_fr_fr }}</option>
                                        @endforeach
                                        </select>
                                        <div class="si-vous-navez-pas-d" >
                                            Saisissez votre pays de résidence. <br>
                                            Une sélection incorrecte peut affecter le statut de votre compte.
                                        </div>
                                    </div>
                                    {{-- type activité --}}
                                    <div style="margin-left: 20px; position: relative">
                                        {{-- zone tool tip --}}
                                        <div id="ppvr-11" class="tool-none">
                                            <button type="button" class="close-btn" style="z-index: 15000; position:absolute; right: 8px; top: -1px; border: none; background:transparent" onclick="closeToolTip1()">
                                                <img src="{{ asset('assets/images/close-btn.svg') }}" alt="">
                                            </button>
                                            <div class='popover-paticulier-content'>

                                                <div class="popover-headerd" style="position: relative; top: -5px">
                                                    Assurez-vous que <br>
                                                    votre type d'activité sélectionné <br>est correct.
                                                </div>

                                                <div class="pop-body" style="margin-top: 15px">
                                                    Un particulier vend ses produits dans un contexte privé. <br>Un particulier ne vend pas un produit à une société <br> /organisation caritative et n'opère pas dans un contexte d'affaires ou professionnel.
                                                    <br><br>
                                                    <i>Une sélection incorrecte peut affecter l'état de votre compte.</i>
                                                </div>
                                            </div>

                                        </div>

                                        <div id="ppvr-21" class="tool-none">
                                            <button type="button" class="close-btn" style="z-index: 15000; position:absolute; right: 8px; top: -1px; border: none; background:transparent" onclick="closeToolTip2()">
                                                <img src="{{ asset('assets/images/close-btn.svg') }}" alt="">
                                            </button>
                                            <div class='popover-entreprise-content'>
                                                <div class="popover-headerd" style="position: relative; top: -5px;">
                                                    Assurez-vous que <br>
                                                    votre type d'activité sélectionné <br>est correct.
                                                </div>
                                                {{-- <p class='popover-text-sm-n mon-text-justify'> --}}
                                                <div class="pop-body" style="margin-top: 15px">
                                                    Vous avez choisi de vous inscrire en tant
                                                    <a href='javascript:;' class='bolt-500 link-color-white'>qu'entreprise privée</a>
                                                    qui est controlé et gérée par des personnes privées. Le vendeur TOULE Market est inscrit dans
                                                    le cadre d'une activité commerciale ou professionnelle. <br><br>

                                                    Une sélection incorrecte peut affecter l'état de votre compte.
                                                </div>
                                                {{-- <p class='popover-text-sm-i'>Une sélection incorrecte peut affecter l'état de votre compte.</p> --}}
                                            </div>
                                            <div onclick='popoverHide()' class='popover-dismiss-icon'>
                                                <div class='icons-ferme'>
                                                    <img src='svg/Ferme2.svg' alt='' class='dismiss-icon'>
                                                </div>
                                            </div>

                                        </div>

                                        <div id="ppvr-31" class="tool-none">

                                            <div class='popover-organisation-contentD' style="">
                                                <button type="button" class="close-btn" style="z-index: 15000; position:absolute; right: 4px; top: -1px; border: none; background:transparent" onclick="closeToolTip3()">
                                                    <img src="{{ asset('assets/images/close-btn.svg') }}" alt="">
                                                </button>
                                            <div class="popover-headerd" style="position: relative; top: -5px. ">
                                                Assurez-vous que <br>
                                                votre type d'activité sélectionné <br>est correct.
                                            </div>

                                            <div class="pop-body-caritative" style="margin-top: 20px;">
                                                Vous avez choisi de vous enregistrer en tant qu'<a href='javascript:;' class='bolt-500 link-color-white'>organisme caritatif</a> qui est une entité exonéré d'impôts qui <br>
                                                (1) a été crée et est exploitée Ã  des fins caritatives. <br>
                                                (2) utilise toutes ses ressources pour les activités caritatives qui sont sous son contrat le direct <br>
                                                (3) ne distribue aucune partie du revenu généré pour le bénéfice de tout administrateur, fiduciant, membre ou autre personne privé et <br>
                                                (4) ne contribue pas ou ne s'associe pas à  des organisations politiques.<br><br>

                                                <div>
                                                    <i>Une sélection incorrecte peut affecter l'état de votre compte.</i>
                                                </div>

                                            </div>
                                            {{-- <p class='popover-text-sm-i'>Une sélection incorrecte peut affecter l'état de votre compte.</p> --}}
                                            </div>
                                            <div class='popover-organisation-caritative-dismiss-icon'>
                                                <div class='icons-ferme'>
                                                    <img src='svg/Ferme2.svg' alt='' class='dismiss-icon'>
                                                </div>
                                            </div>
                                        </div>
                                        {{-- tool tip fin  --}}
                                        <div class="label-el" id="type_activite-popover">Type d'activité</div>
                                        <select class="rectangle-select img_bg my-selectl" style="width: 329px; !important;" name="typeactivite" id="type_activite" disabled>
                                            <option value="">Sélectionner votre type d'activité</option>
                                            <option value="1" id="1">Aucun, je suis un particulier</option>
                                            <option value="2" id="2">Organisation caritative</option>
                                            <option value="3"id="3">Entreprise privée</option>
                                        </select>
                                    </div>
                                    {{-- type activité fin  --}}
                                </div>  {{-- fin select input -pays -type act  --}}

                                {{-- debut identité  --}}

                                <style>
                                    #prenom, #prenom2, #nomfamille:focus {
                                        outline: none;
                                    }
                                </style>
                                <div id="particulier" style="width: 678px; height: 77px; margin-bottom: 20px" class="to-hide d-none">
                                    <div class="label-el" id="type_activite-popover">Votre identité</div>
                                    <div class="">
                                        <div class="rowx" style="display: flex">
                                            <div class="col-md-4j" style="margin-right: 10px">
                                                <input type="text" class="particulier-input" name="prenom" id="prenom" onkeyup="letterOnly(this)" placeholder="Prénom">
                                            </div>
                                            <div class="col-md-4k" style="margin-right: 10px">
                                                <input type="text" class="particulier-input" name="prenom2" id="prenom2" onkeyup="letterOnly2(this)" placeholder="Second prénom">
                                            </div>
                                            <div class="col-md-4l" >
                                                <input type="text" class="particulier-input" name="nomfamille" id="nomfamille" onkeyup="onlyLetters(this)" placeholder="Nom de famille">
                                            </div>

                                        </div>
                                        <div class="saisissez-votre-nom">Saisissez votre nom complet, tel qu'il apparaît sur le passeport ou la carte d'identité</div>
                                    </div>
                                </div>{{-- fin identité  --}}

                                <div id="entreprise" style="width: 678px; height: 77px;" class="to-hide d-none">
                                    <div  class="label-el">Nom de l'entreprise, enregistrer auprès de votre pays</div>
                                    <input type="text" style="color: #4A4A4A !important;" class="rectangle-input-entreprise" name="nomEntreprise" id="nomEntreprise" placeholder="Nom de l’entreprise tel qu’il apparaît sur le document d’enregistrement">
                                    <div class="d-flex justify-content-arround">
                                        <div class="forms-3-checkbox-off-2-formsD" style="margin-left: 5px;position: relative; left: 15px;top: 5px">
                                            <input class="form-check-input radio-check-icon" type="checkbox" value="0" checked>
                                        </div>
                                        <div class="je-confirme-que-lem" style="width: 577.04px; position: relative; left: 25px; margin-top: 5px">
                                            Je confirme que l'emplacement et le type de mon entreprise sont corrects, et je comprends que ces informations ne peuvent pas être modifiées ultérieurement.
                                        </div>
                                    </div>
                                </div>

                                <div id="caritative" style="width: 678px; height: 77px;" class="to-hide d-none">
                                    <div  class="label-el">Nom de l'entreprise, enregistrer auprès de votre pays</div>
                                    <input type="text" style="color: #4A4A4A !important;" class="rectangle-input-entreprise" name="nomEntrepriseCaritative" id="nomEntrepriseCaritative" placeholder="Nom de l’entreprise tel qu’il apparaît sur le document d’enregistrement">
                                    <div class="d-flex justify-content-arround">
                                        <div class="forms-3-checkbox-off-2-formsD" style="margin-left: 5px;position: relative; left: 15px;top: 5px">
                                            <input class="form-check-input radio-check-icon" type="checkbox" value="0" checked>
                                        </div>
                                        <div class="je-confirme-que-lem" style="width: 577.04px; position: relative; left: 25px; margin-top: 5px">
                                            Je confirme que l'emplacement et le type de mon entreprise sont corrects, et je comprends que ces informations ne peuvent pas être modifiées ultérieurement.
                                        </div>
                                    </div>
                                </div>

                            </div>

                            <div class="group-5" style="height: 104px; margin-top: 25px; position: relative; top: 60px; margin-bottom: 50px">
                                <div id="particulier" class="to-hide d-none">
                                    <label for="" class="mon-label">Votre identité</label>
                                </div>
                            </div>
                    </form>

                    </div>
                </div>

                <div class="foire-aux-question" style="position: relative; width: 472px !important; ">
                    <div class="col-lg-D d-noneD d-lg-blockD" style="width: 443px !important; position: relative; margin-left: 12px;">

                        <div class="d-flex justify-content-around">
                            <p class="foire-aux-questions">Foire aux questions</p>
                        </div>

                        <div class="question-group-2D">
                            <div style="display: flex; justify-content: space-between">
                                <p class="titre-question">Pourquoi un « contact principal » doit-il fournir ses informations personnelles ?</p>
                                <span data-for-id="#question-1" class="changerIcon icon-1" data-signe="+"><img src='assets/images2/plus-lg.svg'></span>
                            </div>
                            <p class="text-question" id="question-1">Le contact principal est la personne qui a accès au compte, fournit les informations d'enregistrement au nom du détenteur du compte (le vendeur inscrit) et déclenche les transactions telles que les versements et les remboursements. Les actions prises par le point de contact principal sont considérées comme étant prises par le détenteur du compte.</p>
                            <div class="ligne" style="width: 443px !important; position: relative; left: -5px"></div>
                        </div>

                        <div style="margin-top: 15px;" class="question-group-2D">
                            <div style="display: flex; justify-content: space-between">
                                <p class="titre-question">Pourquoi un « contact principal » doit-il fournir ses informations personnelles ?</p>
                                <span data-for-id="#question-2" class="changerIcon icon-1" data-signe="+"><img src='assets/images2/plus-lg.svg'></span>
                            </div>
                            <p class="text-question" id="question-2">Le contact principal est la personne qui a accès au compte, fournit les informations d'enregistrement au nom du détenteur du compte (le vendeur inscrit) et déclenche les transactions telles que les versements et les remboursements. Les actions prises par le point de contact principal sont considérées comme étant prises par le détenteur du compte.</p>
                            <div class="ligne" style="width: 443px !important; position: relative; left: -5px"></div>
                        </div>

                        <div style="margin-top: 15px;" class="question-group-2D">
                            <div style="display: flex; justify-content: space-between">
                                <p class="titre-question">Pourquoi un « contact principal » doit-il fournir ses informations personnelles ?</p>
                                <span data-for-id="#question-3" class="changerIcon icon-1" data-signe="+"><img src='assets/images2/plus-lg.svg'></span>
                            </div>
                            <p class="text-question" id="question-3">Le contact principal est la personne qui a accès au compte, fournit les informations d'enregistrement au nom du détenteur du compte (le vendeur inscrit) et déclenche les transactions telles que les versements et les remboursements. Les actions prises par le point de contact principal sont considérées comme étant prises par le détenteur du compte.</p>
                            <div class="ligne" style="width: 443px !important; position: relative; left: -5px"></div>
                        </div>

                        <div style="margin-top: 15px;" class="question-group-2D">
                            <div style="display: flex; justify-content: space-between">
                                <p class="titre-question">Pourquoi un « contact principal » doit-il fournir ses informations personnelles ?</p>
                                <span data-for-id="#question-4" class="changerIcon icon-1" data-signe="+"><img src='assets/images2/plus-lg.svg'></span>
                            </div>
                            <p class="text-questionD" id="question-4">Le contact principal est la personne qui a accès au compte, fournit les informations d'enregistrement au nom du détenteur du compte (le vendeur inscrit) et déclenche les transactions telles que les versements et les remboursements. Les actions prises par le point de contact principal sont considérées comme étant prises par le détenteur du compte.</p>
                            <div class="ligne" style="width: 443px !important; position: relative; left: -5px"></div>
                        </div>

                    </div>
                </div>
                {{-- footer element  --}}
        </div>
    </div>

    <div style="height: 81px; background-color: transparent; position: relative; top: -120px; width: 100%; padding-right: 400px">
        <div class="d-flex justify-content-center">
            <div class="bottom-divd" style="display: flex; margin-top: 15px; background-color: #fff; padding: 0px 80px 0px 150px">
                <div class="en-signant-de-cette" style="position: relative; left: -52px">
                    En signant de cette manière, vous acceptez notre <br>
                    <a href="#">Conditions d’utilisation</a> et <a href="#">Règles de confidentialité</a>
                </div>
                <div class="group3" style="position: relative; left: -53px">
                    <button style="position: relative; overflow: hidden" type="buttom" class="group3 img_bg" onclick="saveMarchand(event)" disabled id="nouveauVendBtn">
                        <span class="mbtn-text-0">Accepter et continuer</span>
                        <span class="spinner-borderL" id="sms_spiner-resend"role="status" aria-hidden="true"></span>
                    </button>
                </div>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="js/script.js"></script>

    <script src="{{ asset('assets/jquery/dist/jquery.min.js') }}"></script>
    <script src="{{ asset('assets/select2/js/select2.min.js') }}"></script>
    <script src="{{ asset('assets/select2/js/i18n/fr.js') }}"></script>

    <script>

        function saveMarchand(e) {

            e.preventDefault();

            let x = e.clientX - e.target.offsetLeft;
            let y = e.clientY - e.target.offsetTop;
            let ripples = document.createElement('span');

            ripples.style.width = '1500px !important';
            ripples.style.height = '1500px !important';

            ripples.classList.add('btn-animate-bg-marchand')
            document.getElementById('nouveauVendBtn').appendChild(ripples);

            var adressprof = $('#langue').find(":selected").val();
            var type_activite = $('#type_activite').find(":selected").val(); // type_activite

            if (type_activite == 1 && !$('#prenom').hasClass('input-error-warning') && !$('#prenom2').hasClass('input-error-warning')) {
                var prenom = $('#prenom').val();
                var prenom2 = $('#prenom2').val();
                var nomfamille = $('#nomfamille').val();

                var  _token = document.getElementsByName("_token")[0].value

                $.ajax({
                    type:'POST',
                    url:"vers-infos-perso",
                    data:{
                        _token: $('#token').val(),
                        prenom:prenom,
                        prenom2:prenom2,
                        nomfamille:nomfamille,
                        adressprof: adressprof,
                        step: 1,
                        type_activite: type_activite
                    },
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    beforeSend: function(params) {
                        ripples.remove()
                        $('#sms_spiner-resend').addClass('spinner-border')
                        $('#nouveauVendBtn').find('.mbtn-text-0').css('display','none')
                        $('#nouveauVendBtn').addClass('block-btn')
                        $('#nouveauVendBtn').css('opacity','0.5')
                    },
                    success:function(response){
                        window.location.href = "/marchand-information-particulier"
                    }

                });
            }else{
                // alert('Veillez corrigé les')
            }

            if (type_activite == 2) {
                var nomEntrepriseCaritative = $('#nomEntrepriseCaritative').val();
                var  _token = document.getElementsByName("_token")[0].value
                $.ajax({
                    type:'POST',
                    url:"vers-infos-perso",
                    data:{
                        _token: $('#token').val(),
                        nomEntrepriseCaritative:nomEntrepriseCaritative,
                        adressprof: adressprof,
                        step: 1,
                        type_activite: type_activite
                    },
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    beforeSend: function(params) {
                        ripples.remove()
                        $('#sms_spiner-resend').addClass('spinner-border')
                        $('#nouveauVendBtn').find('.mbtn-text-0').css('display','none')
                        $('#nouveauVendBtn').addClass('block-btn')
                        $('#nouveauVendBtn').css('opacity','0.5')
                    },
                    success:function(response){
                        window.location.href = "/marchand-renseignement-organisation"
                    }
                });
            }

            if (type_activite == 3) {
                var nomEntreprise = $('#nomEntreprise').val();
                var  _token = document.getElementsByName("_token")[0].value
                $.ajax({
                    type:'POST',
                    url:"vers-infos-perso",
                    data:{
                        _token: $('#token').val(),
                        nomEntreprise:nomEntreprise,
                        adressprof: adressprof,
                        step: 1,
                        type_activite: type_activite
                    },
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    beforeSend: function(params) {
                        ripples.remove()
                        $('#sms_spiner-resend').addClass('spinner-border')
                        $('#nouveauVendBtn').find('.mbtn-text-0').css('display','none')
                        $('#nouveauVendBtn').addClass('block-btn')
                        $('#nouveauVendBtn').css('opacity','0.5')
                    },
                    success:function(response){
                        window.location.href = "/marchand-renseignement-vendeur-privee"
                    }
                });
            }

        }

        function paysChanges() {
        }

        // toggle dropdown function
    </script>
</body>
</html>
