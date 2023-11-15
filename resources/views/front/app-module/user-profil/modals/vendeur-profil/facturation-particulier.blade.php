
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
    {{-- <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script> --}}
    <link rel="stylesheet" href="{{ asset('assets/select2/css/select2.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/bootstrap/dist/css/bootstrap.min.css') }}">


    <link rel="icon" href="assets/images/fav2.svg" sizes="32x32" />
    <link rel="stylesheet" href="css/style2.css">
    <link rel="stylesheet" href="{{ asset('css/main-css.css') }}">
    <link rel="stylesheet" href="{{ asset('css/form-style.css') }}">

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
            color: #000000;
            font-family: Roboto;
            font-size: 18px;
            letter-spacing: 0.4px;
            line-height: 18px;
            justify-content: center;
            align-items: center;
            text-align: center;
            display: flex;
        }

        .custom-text-infos-text {
            color: #000000;
            font-family: Roboto;
            font-size: 18px;
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
        /* margin-top: 20.5px; */
        border: 1px solid #D8D8D8;
        border-radius: 6px;
        position: relative;
        margin-left: auto;
        margin-right: auto;
    }

    .container-2-infos-add {
        margin-top: 20.5px;
        height: 14px;
        width: 145px;
        color: #191970;
        font-family: Roboto;
        font-size: 14px;
        font-weight: 500;
        letter-spacing: 0;
        line-height: 14px;
        position: relative;
        left: 60px;
        margin-bottom: 5px;
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

    .label-el {
        height: 14px;
        color: #191970;
        font-family: Roboto;
        font-size: 14px;
        font-weight: 500;
        letter-spacing: 0.31px;
        line-height: 14px;
        margin-bottom: 5px;
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


<style>
    .line-container-2 {
        height: 41px;
        width: 100%;
    }
</style>
<style>

.cni-input {
    box-sizing: border-box;
    height: 41px;
    width: 397px;
    border: 1px solid #9B9B9B;
    border-radius: 0 6px 6px 0;
    background-color: #F8F8F8;
    padding-left: 10px;
}

.cni-select {
    width: 207px !important;
    padding-left: 10px;
    border: 1px solid #9B9B9B;
    border-right: none;
    padding-top: 2px;
}

.cni-input:focus, .cni-select:focus {
    outline: none;
}

.main-sms-element {
    height: 31px;
    width: 133px;
    border-radius: 6px;
    background-color: #1A7EF5;
    margin-top:3.5px;
    margin-left:8px;
    padding-left:7px;
    padding-top:5px;
    position: relative;
    overflow: hidden;
}

.envoyer-un-sms {
    min-width: 35%;
    color:white;
    font-family: Roboto;
    font-size: 12px;
    font-weight: 500;
    letter-spacing: 0.26px;
    line-height: 12px;
    text-decoration: none;
    padding-left: 11px;
    position: relative;
    top: 3px;
    left: 3px;
    text-decoration: none
}

.envoyer-un-sms:hover {
    text-decoration: none;
    color: #fff;
}

</style>
<style>

    .active-box {
        border: 1px solid #1A7EF5 !important;
    }

    .normal-box-border {
        border: 1px solid #D8D8D8 !important;
    }

    .carte-credit-detail {
        height: 190px;
        width: 633px;
        border-radius: 6px;
        position: relative;
        margin-left: auto;
        margin-right: auto;
        /* background-color: #fff; */
    }

    .checkbox-el {
        height: 13px;
        /* width: 265px; */
        color: #000000;
        font-family: Roboto;
        font-size: 13px;
        letter-spacing: -0.31px;
        line-height: 13px;
        margin-top: 10px
    }
</style>

<style>
    .main-box-facture {
        height: 60px;
        width: 603px;
        position: relative;
        margin-left: auto;
        margin-right: auto;
        display: flex;
        margin-bottom: 15px;
    }

    .tool-img {
        margin-top: -65px;
        margin-left: 170px;
    }

    .span-default-el {
        height: 13px;
        width: 265px;
        color: #000000;
        font-family: Roboto;
        font-size: 13px;
        letter-spacing: -0.31px;
        line-height: 14px;
        position: relative;
        top: -5px;
    }

</style>
<style>
.tooltips {
  position: relative;
  display: inline-block;
}

.tooltips .tooltiptext {
  visibility: hidden;
  /* height: 76px;
  width: 273.55px; */
  height: 48px;
  width: 226px;
  border-radius: 6px;
  background-color: #FFFFFF;
  box-shadow: 0 0 6px 0 rgba(0,0,0,0.5);
  /* background-color: #555; */

  text-align: justify;
  border-radius: 6px;
  /* padding: 10px; */
  position: absolute;
  z-index: 1;
  /* bottom: 125%; */
  top: -85px;
  left: -32px;
  margin-left: 6px;
  opacity: 0;
  transition: opacity 0.3s;

    color: #191970;
    font-family: Roboto;
    font-size: 12px;
    letter-spacing: 0;
    line-height: 13px;

}

.tooltips .tooltiptext::after {
  content: "";
  position: absolute;
  top: 48px;
  left: 484px;
  margin-left: -283px;
  border-width: 5px;
  border-style: solid;
  border-color: #fff transparent transparent transparent;
  transform: rotate(0deg);
}

.tooltips:hover .tooltiptext {
  visibility: visible;
  opacity: 1;
}

.tooltiptext p {
    height: 56px;
    width: 241px;
    color: #191970;
    font-family: Roboto;
    font-size: 12px;
    letter-spacing: 0;
    line-height: 13px;
    justify-content: center;
    text-align: justify;
    /* height: 28px; */
    width: 206px;
    margin-top: 10px;
    margin-left: 10px;
}

.carte-credit-facturation {
    height: 16px;
    color: #191970;
    font-family: Roboto;
    font-size: 16px;
    font-weight: 500;
    letter-spacing: 0;
    line-height: 16px;
    margin-top:11px;
    margin-left: 10px;
}

.text-facture-box {
    height: 16px;
    font-family: Roboto;
    font-size: 16px;
    font-weight: 500;
    letter-spacing: 0;
    line-height: 16px;
    color: #9B9B9B;
}

.text-facture-box-mobile {
    height: 16px;
    font-family: Roboto;
    font-size: 16px;
    font-weight: 500;
    letter-spacing: 0;
    line-height: 16px;
    color: #9B9B9B;
}

.btn-text-active {
    color: #191970 !important;
}

#paiementBtnContent:hover {
    cursor: pointer;
}

#paiementBtnCheckbox {
    background-color: #fff;
}

#paiementBtnCheckbox1 {
    background-color: #fff;
}

.bank-checkbox {
    height: 18px;
    width: 18px;
    border-radius: 4px;
    background-color: #1A7EF5;
}

.bouton-annuler {
    box-sizing: border-box;
    height: 38px;
    width: 201px !important;
    border: 1px solid #1A7EF5;
    border-radius: 6px;
    background-color: #FFFFFF !important;

    color: #1A7EF5;
    font-family: Roboto;
    font-size: 16px;
    font-weight: 500;
    letter-spacing: 0.35px;
    line-height: 17px;
    text-align: center;
}

.suivantBtn {
    height: 37px;
    width: 200px;
    border-radius: 6px;
    background-color: #1A7EF5;

    font-family: Roboto;
    font-size: 16px;
    font-weight: 500;
    letter-spacing: 0.35px;
    line-height: 19px;
    text-align: center;
    position: relative;
    overflow:hidden;
}

.checkbox-confirmation-facturation {
    width: 18px;
    height: 18px;
    border-radius: 4px;
}

.paiement-box-disabled {
    pointer-events: none;
    opacity: 0.5;
}

.box-paiement-disabled-btn {
    background-color: #F8F8F8 !important;
}

#paiementBtnCheckboxMobile {
    background-color: #fff;
}
</style>

<style>
    .box-payement {
        box-sizing: border-box;
        height: 42px;
        width: 322px;
        border: 1px solid #1A7EF5;
        border-radius: 6px;
    }

    .carte-credit-detail {
        height: 190px;
        width: 633px;
        border: 1px solid #D8D8D8;
        border-radius: 6px;
        position: relative;
        margin-left: auto;
        margin-right: auto;
        /* background-color: #fff; */
    }

    .checkbox-el {
        height: 13px;
        /* width: 265px; */
        color: #000000;
        font-family: Roboto;
        font-size: 13px;
        letter-spacing: -0.31px;
        line-height: 13px;
        margin-top: 10px
    }

    .facturation-text-color {
        color: #191970;
    }
</style>
</head>
<body>

    @include('front.app-module.user-profil.modals.vendeur-menu')

<div class="rectangle">
    <div class="containerD mask" style="display: flex; flew-direction: column">

        <div class="rowS hauteur-fixe container-zone-vendeur" style="display: flex;">
            <div style="" class="left-step-navigation">

                    <div class="rectangle-panel-button success">
                        <div class="panel-button-icon success">
                          <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-check-circle-fill" viewBox="0 0 16 16">
                            <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z"/>
                            </svg>
                        </div>
                        <div class="panel-button-text">Informations individuelles</div>
                       

                    </div>
                    <div class="rectangle-panel-button active">
                    <div class="panel-button-icon  active   rounded-circle" style="background-color:#1A7EF5; text-align:center; padding:5%">
                        <p class="step-number-marchand" >2</p>
                    </div>
                    <div class="panel-button-text">Facturation</div>
                    </div>
                    <div class="rectangle-panel-button">
                    <div class="panel-button-icon  active   rounded-circle active_step" style="text-align:center; padding:5%">
                           <p class="step-number-marchand" >3</p> </div>
                        <div class="panel-button-text-desable">Boutique</div>
                    </div>

                    <div class="rectangle-panel-button">
                    <div class="panel-button-icon  active   rounded-circle active_step" style="text-align:center; padding:5%">
                           <p class="step-number-marchand" >4</p> </div>
                        <div class="panel-button-text-desable">Vérification</div>
                    </div>
            </div>

            <div class="bordure-droite nouveau-content-right" style="width: 753px;">
                {{-- Entête du form  --}}
                <div class="form-zone">
                <form  data-btn="#login-register-btn">
                        <input name="_token" type="hidden" id="token" value="{{ csrf_token() }}"/>
                    {{-- <div class="row"> --}}

                        {{-- debut formulaire  --}}

                        <div class="col-lg-12 col-md-12 div-2h" >
                            <div class="informations-commerce">
                                {{-- <div class="d-flex justify-content-center text-infos">Informations commerciales pour {{$_SESSION['prenom']['2']}} </div> --}}
                                <div class="d-flex justify-content-center text-infos- custom-text-infos">Informations sur le paiement </div>

                            </div>

                                {{-- premier box --}}
                                <div class="box-1-facturation" style="margin-top: 30px">
                                    <div id="main-credit-zone">
                                        <?php ?>
                                        <div  class="box-payement normal-box-border" style="margin-left: 42px; padding: 0px !important;" id="paiementBtnCheckboxl">
                                            <label style="height: 42px;  display: flex; padding-top: 11px" id="paiementBtnCheckboxH">

                                                <div style="width: 18px; height: 18px; margin-left: 10px">
                                                    <input class="bank-checkbox" type="checkbox" value="0" style="" id="bank-account-card">
                                                </div>

                                                <div class="text-facture-box" style="position: relative; top: 2px; width: 190px; margin-left: 10px">
                                                    Carte de crédit ou de débit
                                                </div>

                                                <div style="width: 73px; height: 22px; position: relative; top: -4px; margin-left: 10px">
                                                    <img width="73px" height="22px" src="assets/images/carte-bancaire.svg"> </a>
                                                </div>
                                            </label>
                                        </div>

                                       <div class="label-el" style="margin-top:10px; margin-left:42px" >Détail de la carte crédit</div>
                                       <div class="carte-credit-detail normal-box-bordedr paiement-box-disabled" id="section-carte-credit" style="padding-top: 15px;">

                                        <div class="main-box-facture">
                                            <div class="box-input1" >
                                                <div class="label-el">Numéro de la carte</div>
                                                <input type="text" style="padding-left: 10px" class="rectangle-input" id="numero-carte" value="@if(isset($_SESSION['facturation']['numero_carte']) && !is_array($_SESSION['facturation']['numero_carte'])) {{$_SESSION['facturation']['numero_carte']}} @endif" placeholder="XXXXXXXXXXXX">
                                            </div>
                                            <div class="box-input1" style="margin-left: 10px">
                                                <div class="label-el">Date d'expiration</div>
                                                <input value="@if(isset($_SESSION['facturation']['date_expiration'])){{$_SESSION['facturation']['date_expiration']}}
                                            @endif" type="text" style="padding-left: 10px" class="rectangle-input" id="date-expiration-carte" placeholder="mm/aaaa">
                                            </div>
                                            <div class="box-input1" style="margin-left: 10px">
                                                <div class="label-el">Code de sécurité (CVV)

                                                </div>
                                                <input value="@if(isset($_SESSION['facturation']['code_cvv']))
                                                {{$_SESSION['facturation']['code_cvv']}} @endif" type="text" style="padding-left: 10px" class="rectangle-input" id="code-cvv" placeholder="" style="font-size: 12px;padding-left:5px;">
                                                <small class="tooltips">
                                                    <img src="assets/images/icones-vendeurs2/Information.svg" class="tool-img" width="20px" height="20px">
                                                    <span class="tooltiptext"><p>
                                                        Le numéro CVV correspond aux trois derniers chiffres au dos de votre carte.
                                                    </p></span>

                                                </small>
                                            </div>
                                        </div>

                                        <div style=" height: 60px; width: 603px; position: relative; margin-left: auto; margin-right: auto;">
                                            <div class="label-el">Nom sur la carte</div>
                                            <input value="@if(isset($_SESSION['facturation']['nom_sur_carte'])){{$_SESSION['facturation']['nom_sur_carte']}} @endif"  type="text" style="padding-left: 10px; width: 603px" class="rectangle-input" id="nom-complet-sur-carte" placeholder="Moussavou Ulrich" onkeyup="letterOnlyMonCarte(this)">

                                            <div style="width: 100%; height: 13px; margin-top: 5px; display: flex">

                                                <div style="width: 18px; height: 18px">
                                                    <input type="checkbox" class="checkbox-confirmation-facturation" id="bank-card-default" style="" />
                                                </div>

                                                <div class="span-default-el" style="position: relative; top: 3px; margin-left: 10px; ">
                                                    Définir en tant que mode de paiement par défaut
                                                </div>

                                            </div>
                                        </div>

                                    </div>
                                    </div>
                                {{-- fin premier box  --}}
                                {{-- deuxieme box  --}}
                                <div id="mobile-baking-section" style="margin-top: 30px;">
                                    <div  class="box-payement normal-box-border" style="margin-left: 42px; padding: 0px !important;" id="paiementBtnCheckboxMobilee">
                                        <label style="height: 42px;  display: flex; padding-top: 11px">

                                            <div style="width: 18px; height: 18px; margin-left: 10px">
                                                <input class="bank-checkbox" type="checkbox" value="0" style="" id="mobile_service_airtel_moov">
                                            </div>

                                            <div class="text-facture-box-mobile" style="position: relative; top: 2px; width: 190px; margin-left: 10px;">
                                                Service bancaire mobile
                                            </div>

                                            <div style="width: 73px; height: 22px; position: relative; top: -4px; margin-left: 10px">
                                                <img width="73px" height="22px" src="assets/images/Mobile banking.svg"> </a>
                                            </div>
                                        </label>
                                    </div>

                                <div class="label-el" style="margin-left: 42px; margin-top:10px" >Détail de la Sim Marchande</div>
                                   <div class="carte-credit-detail normal-box-border paiement-box-disabled" id="serviceMobileSection" style="padding-top: 15px;">

                                    <div style=" height: 60px; width: 603px;position: relative; margin-left: auto; margin-right: auto; display: flex; margin-bottom: 15px;">
                                        <div class="box-input1" style="width: 294px;">
                                            <div class="label-el">Nom du compte Airtel Money (Gabon)</div>
                                            <input value="@if(isset($_SESSION['facturation']['numero_carte']) && is_array($_SESSION['facturation']['numero_carte'])) {{$_SESSION['facturation']['numero_carte'][0][0]}} @endif" type="text" style="padding-left: 10px; width: 294px;" class="rectangle-input" id="airtel_num" placeholder="Moussavou Ulrich" onkeyup="letterOnlyFacture(this)">
                                        </div>

                                        <div class="box-input1" style="margin-left: 15px; width: 294px;">
                                            <div class="label-el">Code marchand</div>
                                            <input value="@if(isset($_SESSION['facturation']['numero_carte'][0][1]))
                                            {{$_SESSION['facturation']['numero_carte'][0][1]}}
                                        @endif" type="text" style="padding-left: 10px; width: 294px;" class="rectangle-input" id="code_marchand_airtel" placeholder="">
                                        </div>
                                    </div>

                                    <div style=" height: 60px; width: 603px;position: relative; margin-left: auto; margin-right: auto; display: flex; margin-bottom: 15px">
                                        <div class="box-input1" style="width: 294px;">
                                            <div class="label-el">Nom du compte Moov Money (Gabon)</div>

                                            <input value="@if(isset($_SESSION['facturation']['numero_carte']) && is_array($_SESSION['facturation']['numero_carte'])) {{$_SESSION['facturation']['numero_carte'][1][0]}} @endif" type="text" style="padding-left: 10px; width: 294px;" class="rectangle-input" id="moov_num" placeholder="Moussavou Ulrich" onkeyup="letterOnlyFacture1(this)">

                                            {{-- <div style="width: 100%; height: 13px; margin-top: 5px; display: flex">

                                                <div style="width: 18px; height: 18px">
                                                    <input type="checkbox" class="checkbox-confirmation-facturation" id="mobile-payement-default" style="" />
                                                </div>

                                                <div class="span-default-el" style="position: relative; top: 3px; margin-left: 10px; background-color: red">
                                                    Définir en tant que mode de paiement par défaut
                                                </div>

                                            </div> --}}

                                        </div>

                                        <div class="box-input1" style="margin-left: 15px; width: 294px;">
                                            <div class="label-el">Code marchand</div>
                                            <input value="@if(isset($_SESSION['facturation']['numero_carte'][1][1])) {{$_SESSION['facturation']['numero_carte'][1][1]}} @endif" type="text" style="padding-left: 10px; width: 294px;" class="rectangle-input" id="code_marchand_moov" placeholder="">
                                        </div>
                                    </div>
                                </div>
                                </div>
                            </div>
                               </div>
                            {{-- <label for="adrr">Adresse de l’entreprise</label> --}}
                        </div>
                    </form>
                </div>
            </div>
            {{-- debut foire aux question  --}}
            <div class="foire-aux-question" style="position: relative; left: -10px; width: 472.5px !important">
                <div class="col-lg-D d-noneD d-lg-blockD" style="width: 443px !important">

                    <div class="d-flex justify-content-around">
                        <p class="foire-aux-questions">Foire aux questions</p>
                    </div>

                    <div class="question-group-2D">
                        <div style="display: flex; justify-content: space-between">
                            <p class="titre-question">Pourquoi un « contact principal » doit-il fournir ses informations personnelles ?</p>
                            <span data-for-id="#question-1" class="changerIcon icon-1" data-signe="+"><img src='assets/images2/plus-lg.svg'></span>
                        </div>
                        <p class="text-question" id="question-1">Le contact principal est la personne qui a accès au compte, fournit les informations d'enregistrement au nom du détenteur du compte (le vendeur inscrit) et déclenche les transactions telles que les versements et les remboursements. Les actions prises par le point de contact principal sont considérées comme étant prises par le détenteur du compte.</p>
                        <div class="ligne"></div>
                    </div>

                    <div style="margin-top: 15px;" class="question-group-2D">
                        <div style="display: flex; justify-content: space-between">
                            <p class="titre-question">Pourquoi un « contact principal » doit-il fournir ses informations personnelles ?</p>
                            <span data-for-id="#question-2" class="changerIcon icon-1" data-signe="+"><img src='assets/images2/plus-lg.svg'></span>
                        </div>
                        <p class="text-question" id="question-2">Le contact principal est la personne qui a accès au compte, fournit les informations d'enregistrement au nom du détenteur du compte (le vendeur inscrit) et déclenche les transactions telles que les versements et les remboursements. Les actions prises par le point de contact principal sont considérées comme étant prises par le détenteur du compte.</p>
                        <div class="ligne"></div>
                    </div>

                    <div style="margin-top: 15px;" class="question-group-2D">
                        <div style="display: flex; justify-content: space-between">
                            <p class="titre-question">Pourquoi un « contact principal » doit-il fournir ses informations personnelles ?</p>
                            <span data-for-id="#question-3" class="changerIcon icon-1" data-signe="+"><img src='assets/images2/plus-lg.svg'></span>
                        </div>
                        <p class="text-question" id="question-3">Le contact principal est la personne qui a accès au compte, fournit les informations d'enregistrement au nom du détenteur du compte (le vendeur inscrit) et déclenche les transactions telles que les versements et les remboursements. Les actions prises par le point de contact principal sont considérées comme étant prises par le détenteur du compte.</p>
                        <div class="ligne"></div>
                    </div>

                    <div style="margin-top: 15px;" class="question-group-2D">
                        <div style="display: flex; justify-content: space-between">
                            <p class="titre-question">Pourquoi un « contact principal » doit-il fournir ses informations personnelles ?</p>
                            <span data-for-id="#question-4" class="changerIcon icon-1" data-signe="+"><img src='assets/images2/plus-lg.svg'></span>
                        </div>
                        <p class="text-questionD" id="question-4">Le contact principal est la personne qui a accès au compte, fournit les informations d'enregistrement au nom du détenteur du compte (le vendeur inscrit) et déclenche les transactions telles que les versements et les remboursements. Les actions prises par le point de contact principal sont considérées comme étant prises par le détenteur du compte.</p>
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
                    <button type="submit" class="group3 bouton-annuler" style="margin-right: 10px" onclick="retour(event)" id="cancelInfosEntreprise">
                        <span class="mbtn-text">
                            <a style="text-decoration: none" href="/marchand-information-particulier">Retour</a>
                        </span>
                    </button>
                        <button type="submit" class="group3 img_bg suivantBtn" style="" onclick="saveMarchandInformationPerso(event)" id="infos-particulier-facturation" disabled>
                        <span class="mbtn-text">Suivant</span>
                        <span class="spinner-borderH" id="sms_spiner-resend"role="status" aria-hidden="true"></span>
                    </button>
                </div>
            </div>
        </div>
    </div>

<script src="js/script.js"></script>

<link href="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.12/css/intlTelInput.css" rel="stylesheet" />

<script src="{{ asset('assets/jquery/dist/jquery.min.js') }}"></script>
<script src="{{ asset('assets/select2/js/select2.min.js') }}"></script>
<script src="{{ asset('assets/select2/js/i18n/fr.js') }}"></script>

    <script src="{{ asset('js/form.js') }}"></script>
{{-- jQuery-Mask-Plugin-master --}}
<script src="{{ asset('assets/jQuery-Mask-Plugin-master/dist/jquery.mask.min.js') }}"></script>
<script>

    function checkDefault() {
        var default_carte,
        default_mobile_payment;

        if ($("#bank-card-default").is(':checked')) {
                default_carte =1;
                default_mobile_payment =0;
        }else{
            default_carte =0;
        }

        if ($("#mobile-payement-default").is(':checked')) {
            default_mobile_payment =1;
            default_carte =0;
        }else{
            default_mobile_payment =0;
        }

    }

    function saveMarchandInformationPerso(event) {
            event.preventDefault();
            let x = event.clientX - event.target.offsetLeft;
            let y = event.clientY - event.target.offsetTop;
            let ripples = document.createElement('span');

            var default_carte,
            default_mobile_payment;

            if ($("#bank-card-default").is(':checked')) {
                default_carte =1;
                default_mobile_payment =0;
            }else{
                default_carte =0;
            }

            if ($("#mobile-payement-default").is(':checked')) {
                default_mobile_payment =1;
                default_carte =0;
            }else{
                default_mobile_payment =0;
            }

            if ($('#bank-account-card').is(':checked') || $('#mobile_service_airtel_moov').is(':checked')) {
                // ---------------------------------  traitement de la carte visa -----------------------
                var numero_carte = $('#numero-carte').val();
                var nom_sur_carte = $('#nom-complet-sur-carte').val();
                var date_expiration = $('#date-expiration-carte').val();
                var code_cvv = $('#code-cvv').val();
                var facturation = {};

                if (numero_carte.length > 0 && nom_sur_carte.length > 0 && date_expiration.length > 0) {
                var facturation = {
                    numero_carte: numero_carte,
                    nom_sur_carte: nom_sur_carte,
                    date_expiration: date_expiration,
                    type_carte: 'Carte_bank',
                    default_carte: default_carte,
                    code_cvv: code_cvv,
                    _token: $('#token').val(),
                    step: 3,
                    type_activite: 1
                }
            }
                // ---------------------------------------- traitement mobile -------------------------------

                let airtel_array = [];
                let moov_array = [];

                let marchand_airtel = $('#airtel_num').val();
                let marchand_airtel_code = $('#code_marchand_airtel').val();

                if (marchand_airtel !='' && marchand_airtel_code != '') {
                    airtel_array.push(marchand_airtel, marchand_airtel_code)
                }

                // traitement de moov
                let marchand_moov = $('#moov_num').val();
                let marchand_moov_code = $('#code_marchand_moov').val();

                if (marchand_moov != '' && marchand_moov_code != '') {
                    moov_array.push(marchand_moov)
                    moov_array.push(marchand_moov_code)
                }

                // verification et requette

                let service_mobile_final = [];
                if (airtel_array.length > 0) {
                    service_mobile_final.push(airtel_array)
                }

                if (moov_array.length > 0) {
                    service_mobile_final.push(moov_array)
                }

                if (service_mobile_final.length > 0) {
                    var facturation_mobile = {
                        numero_carte: service_mobile_final,
                        airtel: airtel_array,
                        moov :moov_array,
                        default_mobile_payment:default_mobile_payment,
                        type_carte: 'mobile',
                    }
                }

                ripples.style.width = '1500px !important';
                ripples.style.height = '1500px !important';
                document.getElementById('infos-particulier-facturation').appendChild(ripples);
                console.log('votre tableau mobile:', facturation_mobile, 'et le tableau carte visa:', facturation)

                    $.ajax({
                    type:'POST',
                    url:"vers-infos-perso",
                    data: {
                            "_token": "{{ csrf_token() }}",
                            carte_bank: facturation, 
                            payement_mobile: facturation_mobile,
                            step: 3,
                            type_activite: 1
                        },
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    beforeSend: function(params) {
                        ripples.remove()
                        $('#sms_spiner-resend').addClass('spinner-border')
                        $('#infos-particulier-facturation').find('.mbtn-text').css('display','none')
                        $('#infos-particulier-facturation').addClass('resize-verifie-btn')
                        $('#infos-particulier-facturation').addClass('block-btn')
                        $('#infos-particulier-facturation').css('opacity','0.5')

                        $('#cancelInfosEntreprise').prop('disabled', true)
                        $('#cancelInfosEntreprise').addClass('img_bg')
                        $('#cancelInfosEntreprise').css('opacity','0.5');
                    },
                    success:function(response){
                        console.log('Votre response est:', response) 
                        console.log('Votre reponse du service bancaire', response)
                        window.location.href = "/marchand-boutique-particulier"
                    }
                });

            }
        }

</script>

<script>
    $(document).ready(function() {

        $('#bank-account-card').on('change', function(e) {
            if ( $(this).is(':checked')) {
                $('#section-carte-credit').removeClass('paiement-box-disabled')
                $('#section-carte-credit').addClass('active-box')
                $('#paiementBtnCheckboxl').removeClass('normal-box-border')
                $('.text-facture-box').addClass('btn-text-active')

                // activer automatiquement comme mode de paiement par defaut
                $('#bank-card-default').prop('checked', true)

                // if ($('#mobile_service_airtel_moov').is(':checked')) {
                //     $('#mobile_service_airtel_moov').prop('checked', false)
                //     $('#serviceMobileSection').addClass('paiement-box-disabled')
                //     $('#serviceMobileSection').addClass('normal-box-border')
                //     $('#serviceMobileSection').removeClass('active-box')
                //     $('#paiementBtnCheckboxMobilee').addClass('normal-box-border')
                //     $('.text-facture-box-mobile').removeClass('btn-text-active')
                // }

                let numero_carte = $('#numero-carte').val();
                let date_expedition = $('#date-expiration-carte').val();
                let nom_sur_carte = $('#nom-complet-sur-carte').val();

                if (numero_carte != '' && date_expedition != '' && nom_sur_carte != '') {
                    $('#infos-particulier-facturation').attr('disabled', false)
                    $('#infos-particulier-facturation').removeClass('img_bg')
                }else{
                    $('#infos-particulier-facturation').attr('disabled', true)
                    $('#infos-particulier-facturation').addClass('img_bg')
                }

            }else {
                $('#section-carte-credit').addClass('paiement-box-disabled')
                $('#section-carte-credit').removeClass('active-box')
                $('#paiementBtnCheckboxl').addClass('normal-box-border')
                $('.text-facture-box').removeClass('btn-text-active')
                // desactivation du mode par defaut
                $('#bank-card-default').prop('checked', false)

                $('#infos-particulier-facturation').attr('disabled', true)
                $('#infos-particulier-facturation').addClass('img_bg')
            }

        })

        // service mobile section
        $('#mobile_service_airtel_moov').on('change', function(e) {
            if ( $(this).is(':checked')) {

            $('#serviceMobileSection').removeClass('paiement-box-disabled')
            $('#serviceMobileSection').removeClass('normal-box-border')
            $('#serviceMobileSection').addClass('active-box')
            $('#paiementBtnCheckboxMobilee').removeClass('normal-box-border')
            $('.text-facture-box-mobile').addClass('btn-text-active')

            // desactiver le premier
            // if ($('#bank-account-card').is(':checked')) {
            //     $('#bank-account-card').prop('checked', false)
            //     $('#section-carte-credit').addClass('paiement-box-disabled')
            //     $('#section-carte-credit').removeClass('active-box')
            //     $('#paiementBtnCheckboxl').addClass('normal-box-border')
            //     $('#paiementBtnCheckboxl').removeClass('btn-text-active')
            //     $('.text-facture-box').removeClass('btn-text-active')
            // }

            let airtel_num = $('#airtel_num').val();
            var code_marchand_airtel = $('#code_marchand_airtel').val();
            // if ($('#infos-particulier-facturation').prop('disabled') === false || airtel_num === '' || code_marchand_airtel === '') {
            //     $('#infos-particulier-facturation').attr('disabled', true)
            //     $('#infos-particulier-facturation').addClass('img_bg')
            // }

            }else {
                $('#serviceMobileSection').addClass('paiement-box-disabled')
                $('#serviceMobileSection').addClass('normal-box-border')
                $('#serviceMobileSection').removeClass('active-box')
                $('#paiementBtnCheckboxMobilee').addClass('normal-box-border')
                $('#paiementBtnCheckboxMobilee').removeClass('btn-text-active')
                $('.text-facture-box-mobile').removeClass('btn-text-active')
            }

        })

        // -------------------end section
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

        $('#date-expiration-carte').mask('00/0000');

        $('#code-cvv').mask('000')

        $('#numero-telephone').mask('000000000000000000000')

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

        $('#sendSmsVerification').on('click', function(e) {

            event.preventDefault();
            let x = e.clientX - e.target.offsetLeft;
            let y = e.clientY - e.target.offsetTop;
            let ripples = document.createElement('span');

            ripples.style.width = '1500px !important';
            ripples.style.height = '1500px !important';

            ripples.classList.add('btn-animate-bg-marchand')

            document.getElementById('sendSmsSection').appendChild(ripples);
            setTimeout(() => {
                 $.ajax({
                method: 'POST',
                url: '/send_verification_sms',
                data: {_token: $('#token').val(),},
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                success: function(response) {
                    console.log('Bonjour')
                }
            })
                ripples.remove();
            }, 500)

        })

        // ------------------------ gerer l'état des payements par défaut----------------------

        $('.checkbox-confirmation-facturation').click(function() {
        $(this).prop('checked', true);
            $.each($('.checkbox-confirmation-facturation').not($(this)), function(key, value) {
                $(value).prop('checked', false);
            })
        })
    })
</script>

</body>
</html>
