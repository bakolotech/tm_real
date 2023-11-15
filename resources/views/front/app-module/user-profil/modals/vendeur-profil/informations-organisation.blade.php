
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
    }

    .checkbox-el {
        height: 13px;
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
  height: 106px;
  width: 302px;
  border-radius: 6px;
  background-color: #FFFFFF;
  box-shadow: 0 0 6px 0 rgba(0,0,0,0.5);
  text-align: justify;
  border-radius: 6px;
  position: absolute;
  z-index: 1;
  top: -38px;
  left: 15px;
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
  top: 38px;
  left: 273px;
  margin-left: -283px;
  border-width: 5px;
  border-style: solid;
  border-color: #fff transparent transparent transparent;
  transform: rotate(90deg);
}

.tooltips:hover .tooltiptext {
  visibility: visible;
  opacity: 1;
}

.tooltiptext p {
    height: 84px;
    width: 282px;
    color: #191970;
    font-family: Roboto;
    font-size: 12px;
    letter-spacing: 0;
    line-height: 14px;
    justify-content: center;
    text-align: justify;
    margin-top: 10px;
    margin-left: 10px;
    /* background-color: red; */
}


.tooltips-pre {
  position: relative;
  display: inline-block;
}

.tooltips-pre .tooltiptext {
    visibility: hidden;
    height: 120px;
    width: 302px;
    border-radius: 6px;
    background-color: #FFFFFF;
    box-shadow: 0 0 6px 0 rgba(0,0,0,0.5);
    text-align: justify;
    border-radius: 6px;
    position: absolute;
    z-index: 1;
    top: -38px;
    left: 15px;
    margin-left: 6px;
    opacity: 0;
    transition: opacity 0.3s;
    color: #191970;
    font-family: Roboto;
    font-size: 12px;
    letter-spacing: 0;
    line-height: 13px;
}

.tooltips-pre .tooltiptext::after {
  content: "";
  position: absolute;
  top: 38px;
  left: 273px;
  margin-left: -283px;
  border-width: 5px;
  border-style: solid;
  border-color: #fff transparent transparent transparent;
  transform: rotate(90deg);
}

.tooltips-pre:hover .tooltiptext {
  visibility: visible;
  opacity: 1;
}

.tooltips-pre .tooltiptext p {
    height: 84px;
    width: 282px;
    color: #191970;
    font-family: Roboto;
    font-size: 12px !important;
    letter-spacing: 0;
    line-height: 13px;
    justify-content: center;
    text-align: left;
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

.btn-text-active {
    color: #191970;
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

.checkbox-confirmation {
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
    }

    .checkbox-el {
        height: 13px;
        color: #000000;
        font-family: Roboto;
        font-size: 13px;
        letter-spacing: -0.31px;
        line-height: 13px;
        margin-top: 10px
    }

</style>

<style>
    .adress-principal-vendeur {
        box-sizing: border-box;
        height: 88px;
        width: 633px;
        border: 1px solid #D8D8D8;
        border-radius: 6px;
        background-color: #FFFFFF;
        position: relative;
        margin-left: auto;
        margin-right: auto;
    }

    .check-section {
        width: 278px;
        height: 20px;
        position: relative;
        margin-left: 15px;
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
                    <div class="panel-button-text">Informations commerciaux</div>
                </div>

                <div class="rectangle-panel-button active">
                <div class="panel-button-icon  active   rounded-circle" style="background-color:#1A7EF5; text-align:center; padding:5%">
                        <p class="step-number-marchand">2</p>
                    </div>
                    <div class="panel-button-text">Informations<br> sur le vendeur</div>
                </div>

                <div class="rectangle-panel-button">
                    <div class="panel-button-icon  active   rounded-circle active_step" style="text-align:center; padding:5%">
                        <p class="step-number-marchand">3</p>
                    </div>
                    <div class="panel-button-text-desable">Facturation</div>
                </div>

                <div class="rectangle-panel-button">
                <div class="panel-button-icon  active   rounded-circle active_step" style="text-align:center; padding:5%">
                        <p class="step-number-marchand">4</p>
                    </div>
                    <div class="panel-button-text-desable">Boutique</div>
                </div>

                <div class="rectangle-panel-button">
                <div class="panel-button-icon  active   rounded-circle active_step" style="text-align:center; padding:5%">
                        <p class="step-number-marchand" >5</p> </div>
                    <div class="panel-button-text-desable">Vérification</div>
                </div>

            </div>

            <div class="bordure-droite nouveau-content-right" style="width: 753px;">
                {{-- Entête du form  --}}
                <div class="form-zone">
                <form  data-btn="#login-register-btn">
                        <input name="_token" type="hidden" id="token" value="{{ csrf_token() }}"/>
                        <div  >

                            <div class="informations-commerce">
                                <div class="d-flex justify-content-center text-infos">Informations personnelles pour  @if(isset($_SESSION['nomEntrepriseCaritative'])) {{$_SESSION['nomEntrepriseCaritative']}} @endif</div>
                            </div>
                            {{-- <div class="container-1-infos">

                                <div class="line-container-1" style="display: flex; margin-bottom: 15px; margin-top: 15px;">

                                    <div class="ele1 box-input1" style="margin-left: 15px">
                                        <div class="label-el">Pays de citoyenneté</div>
                                        <select name="payscite" id="paysCitoyenPrivee" class="rectangle-select my-selectkkk" style="width: 195px !important;">
                                            <option value="">Choisir votre pays</option>
                                            @foreach($pays_seul as $pay)
                                            <option value="{{$pay->id}}">{{ $pay->nom_fr_fr }}</option>
                                        @endforeach
                                        </select>
                                    </div>

                                    <div class="ele1 box-input1" style="margin-left: 10px">
                                        <div class="label-el">Pays de naissance</div>
                                        <select name="paysnaiss" id="paysNaissancePrivee" class="rectangle-select my-select" style="padding-left:10px; width: 195px !important;">
                                            <option value="">Choisir votre pays</option>
                                            @foreach($pays_seul as $pay)
                                            <option value="{{$pay->id}}">{{ $pay->nom_fr_fr }}</option>
                                        @endforeach
                                        </select>
                                    </div>

                                    <div class="ele1 box-input1" style="margin-left: 10px">
                                        <div class="label-el">Date de naissance</div>
                                        <input style="padding-left: 10px; width: 195px !important; color: #4A4A4A;" type="text" id="dateNaissancePrivee" placeholder="jj/mm/aaaa" class="rectangle-input">
                                    </div>

                                </div>

                                <div class="line-container-1" style="margin-left: 15px">
                                    <div class="label-el">Justificatif d'identité</div>
                                <div class="d-flex rectangle-input-2" style="width: 605px; border: none">
                                    <select class="rectangle-input-disable-2-p-0 cni-select" id="typePieceIdentitePrivee" style="">
                                        <option value="">Carte national d'identité</option>
                                        <option value="cni">CNI</option>
                                        <option value="passport">Passeport</option>
                                    </select>
                                    <div style="width: 397px;">
                                        <input type="text" style="" class="cni-input" id="numeroPiecePrivee" placeholder="Numéro de carte">
                                    </div>
                                </div>
                                </div>

                                <div class="line-container-1" style="display: flex; margin-left: 15px; margin-top: 15px">
                                    <div class="ele1 box-input1" >
                                    <div class="label-el">Pays d'émission</div>

                                    <select name="paysEmissions" id="paysEmissionPrivee" class="rectangle-select"style="padding-left:10px; z-index: 100 !important">
                                        <option value="">Choisir votre pays</option>
                                        @foreach($pays_seul as $pay)
                                        <option value="{{$pay->id}}">{{ $pay->nom_fr_fr }}</option>
                                    @endforeach
                                    </select>
                                </div>

                                <div class="ele1 box-input1" style="margin-left: 10px">
                                    <div class="label-el">Date d'expiration</div>
                                    <input type="text" id="dateExpirationPrivee" placeholder="jj/mm/aaaa"   class="rectangle-input" style="padding-left: 15px">
                                </div>

                                </div>
                            </div> --}}
                            <div class="container-1-infos">

                                <div class="line-container-1" style="display: flex; margin-bottom: 15px; margin-top: 15px;">

                                    <div class="ele1 box-input1" style="margin-left: 15px">
                                        <div class="label-el">Pays de citoyenneté</div>
                                        <select name="payscite" id="paysCitoyenPrivee" class="rectangle-select my-selectkkk" style="width: 195px !important;">
                                            <option value="">Choisir votre pays</option>
                                        @foreach($pays_seul as $pay)
                                                @if( isset($_SESSION['infos_organisation']['paysCitoyenPrivee']) && $pay->nom_fr_fr == $_SESSION['infos_organisation']['paysCitoyenPrivee'])
                                                    <option value="{{$pay->id}}" selected>{{ $pay->nom_fr_fr }}</option>
                                                    @else
                                                    <option value="{{$pay->id}}" >{{ $pay->nom_fr_fr }}</option>
                                                    @endif
                                                @endforeach
                                        </select>
                                    </div>

                                    <div class="ele1 box-input1" style="margin-left: 10px">
                                        <div class="label-el">Pays de naissance</div>
                                        <select name="paysnaiss" id="paysNaissancePrivee" class="rectangle-select my-select" style="padding-left:10px; width: 195px !important;">
                                            <option value="">Choisir votre pays</option>
                                            @foreach($pays_seul as $pay)
                                            @if(isset($_SESSION['infos_organisation']['paysNaissancePrivee']) && $pay->nom_fr_fr == $_SESSION['infos_organisation']['paysNaissancePrivee'])
                                                <option value="{{$pay->id}}" selected>{{ $pay->nom_fr_fr }}</option>
                                                @else
                                                <option value="{{$pay->id}}" >{{ $pay->nom_fr_fr }}</option>
                                                @endif
                                            @endforeach
                                            </select>
                                    </div>

                                    <div class="ele1 box-input1" style="margin-left: 10px">
                                        <div class="label-el">Date de naissance</div>
                                        <input style="padding-left: 10px; width: 195px !important; color: #4A4A4A;" type="text" id="dateNaissancePrivee" placeholder="jj/mm/aaaa" value="@if(isset($_SESSION['infos_organisation']['dateNaissPrivee']))
                                            {{$_SESSION['infos_organisation']['dateNaissPrivee']}}
                                        @endif" class="rectangle-input">
                                    </div>

                                </div>

                                <div class="line-container-1" style="margin-left: 15px">
                                    <div class="label-el">Justificatif d'identité</div>
                                    <div class="d-flex rectangle-input-2" style="width: 605px; border: none">
                                        <select class="rectangle-input-disable-2-p-0 cni-select" id="typePieceIdentitePrivee" style="">
                                            <option value="cni" @if(isset($_SESSION['infos_organisation']['typePieceIdentitePrivee']) && $_SESSION['infos_organisation']['typePieceIdentitePrivee'] == 'CNI')
                                            selected
                                        @endif">Carte national d'identité</option>
                                            <option value="Passeport" @if(isset($_SESSION['infos_organisation']['typePieceIdentitePrivee']) && $_SESSION['infos_organisation']['typePieceIdentitePrivee'] == 'passport')
                                            selected
                                        @endif">Passeport</option>
                                        </select>
                                        <div style="width: 397px;">
                                            <input type="text" style="" value="@if(isset($_SESSION['infos_organisation']['numeroPiecePrivee'])){{$_SESSION['infos_organisation']['numeroPiecePrivee']}} @endif" class="cni-input" id="numeroPiecePrivee" placeholder="Numéro de carte">
                                        </div>
                                    </div>
                                </div>

                                <div class="line-container-1" style="display: flex; margin-left: 15px; margin-top: 15px">
                                    <div class="ele1 box-input1" >
                                    <div class="label-el">Pays d'émission</div>

                                    <select name="paysEmissions" id="paysEmissionPrivee" class="rectangle-select"style="padding-left:10px; z-index: 100 !important">
                                        <option value="">Choisir votre pays</option>
                                        @foreach($pays_seul as $pay)
                                            @if(isset($_SESSION['infos_organisation']['payEmission']) && $pay->id == $_SESSION['infos_organisation']['payEmission'])
                                            <option value="{{$pay->id}}" selected>{{ $pay->nom_fr_fr }}</option>
                                            @else
                                            <option value="{{$pay->id}}" >{{ $pay->nom_fr_fr }}</option>
                                            @endif
                                        @endforeach
                                    </select>
                            </div>

                                <div class="ele1 box-input1" style="margin-left: 10px">
                                    <div class="label-el">Date d'expiration</div>
                                    <input type="text" id="dateExpirationPrivee" value="@if(isset($_SESSION['infos_organisation']['dateExpiration']))
                                    {{$_SESSION['infos_organisation']['dateExpiration']}}
                                @endif" placeholder="jj/mm/aaaa"   class="rectangle-input" style="padding-left: 15px">
                                </div>

                                </div>
                            </div>

                            <div class="label-el" style="margin-left: 60px; margin-top: 15px;">@if(isset($_SESSION['boutique_organisation']['nomFamilleContactEntreprise'])){{$_SESSION['boutique_organisation']['nomFamilleContactEntreprise']}} @endif</div>

                            <div class="container-1-infos" style="margin-top: 0px !important; padding-top: 15px; height: 139px; width: 632.5px;">
                                <div class="check-section" style="">
                                    <div style="width: 100%; height: 13px; display: flex">

                                        <div style="width: 18px; height: 18px">
                                            <input type="checkbox" class="checkbox-confirmation one-check-4" id="beneficiereEntreprisePrivee" value="Bénéficiare" />
                                        </div>

                                        <div class="span-default-el" style="position: relative; margin-left: 10px; padding-top: 8px">
                                            Est un bénéficiaire effectif de l'entreprise
                                            <small class="tooltips-pre">
                                                <img src="assets/images/icones-vendeurs2/Information.svg" width="14px" height="14px" style="margin-top: -4px; margin-left: 0px">
                                                <span class="tooltiptext">
                                                    <p>
                                                        Un bénéficiaire effectif est une personne physique qui détient ou contrôle, directement ou indirectement, plus de 25 % des actions ou des droits de vote de l’entreprise, ou qui est propriétaire de l’entreprise par d’autres moyens. Si aucun individu n’est éligible aux critères mentionnés ci-dessus, tout individu occupant le poste de gestionnaire principal est un bénéficiaire effectif.
                                                    </p>
                                                </span>
                                            </small>
                                        </div>

                                    </div>
                                </div>

                                <div class="check-section" style="margin-top:10px">
                                    <div style="width: 100%; height: 13px; display: flex">

                                        <div style="width: 18px; height: 18px">
                                            <input type="checkbox" class="checkbox-confirmation one-check-4" id="representantLegalPrivee" value="Représentant" style="" />
                                        </div>

                                        <div class="span-default-el" style="position: relative; top: 3px; margin-left: 10px; ">
                                            Est un représentant légal de l'entreprise <small class="tooltips">
                                                <img src="assets/images/icones-vendeurs2/Information.svg" width="14px" height="14px" style="margin-top: -4px; margin-left: 0px">
                                                <span class="tooltiptext"><p >
                                                    Un représentant légal de l'entreprise a des pouvoirs spécifiques et est légalement
                                                    autorisé par votre société à la gérer et à agir en son nom
                                                    (par exemple : création d’une boutique, sélectionné le mode de paiement, etc.).
                                                    Le représentant légal peut, ou non, être le propriétaire du commerce.
                                                </p></span>
                                            </small>
                                        </div>

                                    </div>
                                </div>

                                <div class="check-section" style="width: 577.5px !important; margin-top: 10px">
                                    <div style="width: 100%; height: 13px; margin-top: 5px; display: flex">

                                        <div style="width: 18px; height: 18px">
                                            <input type="checkbox" class="checkbox-confirmation one-check-4" value="Compte personnel" id="confirmationEtEngagementComptePrivee" />
                                        </div>

                                        <div class="span-default-el" style="position: relative; top: 3px; margin-left: 10px; width: 577.5px !important; text-align: justify; line-height: 16px">
                                            Je confirme que j'agis pour mon propre compte ou pour le compte de l’entreprise inscrite, et je m'engage à mettre à jour les informations relatives au bénéficiaire chaque fois qu'un changement sera apporté.
                                        </div>

                                    </div>
                                </div>
                            </div>
                            {{-- ------------------------------------- fin contact principal----------------------------------- --}}

                        </div>
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
                            <a style="text-decoration: none" href="/marchand-renseignement-organisation">Retour</a>
                        </span>

                    </button>
                        <button type="submit" class="group3 img_bg suivantBtn" style="" onclick="saveMarchandInformationPrivee(event)" id="infos-priveeBtn" disabled>
                        <span class="mbtn-text">Suivant</span>
                        <span class="spinner-borderh" id="sms_spiner-resend"role="status" aria-hidden="true"></span>
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

        function saveMarchandInformationPrivee(event) {
            event.preventDefault();
            let paysCitoyenPrivee = $('#paysCitoyenPrivee').find(':selected').text();
            let paysNaissancePrivee = $('#paysNaissancePrivee').find(':selected').text();
            let typePieceIdentitePrivee = $('#typePieceIdentitePrivee').find(':selected').text();
            let numeroPiecePrivee = $('#numeroPiecePrivee').val();
            let dateExpiration = $("#dateExpirationPrivee").val();
            let payEmission = $("#paysEmissionPrivee").find(':selected').val();
            let beneficierePrivee = $('#beneficiereEntreprisePrivee').val();
            let representantPrivee = $('#representantLegalPrivee').val();
            let confirmationEngagementPrivee = $('#confirmationEtEngagementComptePrivee').val()
            let dateNaissPrivee = $('#dateNaissancePrivee').val()

            let statusCompte = null;

            $('.one-check-4').each(function() {
                if ($(this).prop('checked') === true) {
                    statusCompte = $(this).val();
                }
            })

            var info_particulier = {
                paysCitoyenPrivee: paysCitoyenPrivee,
                paysNaissancePrivee: paysNaissancePrivee,
                typePieceIdentitePrivee: typePieceIdentitePrivee,
                numeroPiecePrivee: numeroPiecePrivee,
                dateExpiration: dateExpiration,
                payEmission: payEmission,
                beneficierePrivee: beneficierePrivee,
                representantPrivee: representantPrivee,
                statusCompte: statusCompte,
                confirmationEngagementPrivee: confirmationEngagementPrivee,
                dateNaissPrivee: dateNaissPrivee,
                _token: $('#token').val(),
                step: 3,
                type_activite: 2
            }

            let x = event.clientX - event.target.offsetLeft;
            let y = event.clientY - event.target.offsetTop;
            let ripples = document.createElement('span');
            ripples.style.width = '1500px !important';
            ripples.style.height = '1500px !important';
            document.getElementById('infos-priveeBtn').appendChild(ripples);

            $.ajax({
                type:'POST',
                url:"vers-infos-perso",
                data: info_particulier,
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },

                beforeSend: function(params) {
                    ripples.remove()
                    $('#sms_spiner-resend').addClass('spinner-border')
                    $('#infos-priveeBtn').find('.mbtn-text').css('display','none')
                    $('#infos-priveeBtn').addClass('resize-verifie-btn')
                    $('#infos-priveeBtn').addClass('block-btn')
                    $('#infos-priveeBtn').css('opacity','0.5')

                    $('#cancelInfosEntreprise').prop('disabled', true)
                    $('#cancelInfosEntreprise').addClass('img_bg')
                    $('#cancelInfosEntreprise').css('opacity','0.5');
                },

                success:function(response){
                    console.log(response)
                    window.location.href = "/marchand-facturation-organisation"
                }
            });

        }

</script>

<script>
    $(document).ready(function() {

        $('#paiementBtnCheckbox').on('click', function(e) {
            e.preventDefault();
            if ( $(this).find('.bank-checkbox').is(':checked')) {
                $(this).find('.bank-checkbox').prop('checked', false)
                $('#section-carte-credit').addClass('paiement-box-disabled')

                $('#section-carte-credit').addClass('normal-box-border')
                $('#paiementBtnCheckbox').addClass('normal-box-border')

                $('#section-carte-credit').removeClass('active-box')
                $('#paiementBtnCheckbox').removeClass('active-box')
                $('#paiementBtnCheckbox').find('.text-facture-box').removeClass('btn-text-active') //remove color

                // desactivation du bouton en cas suivant
                $('#infos-particulier-facturation').attr('disabled', true)
                $('#infos-particulier-facturation').addClass('img_bg')

            }else {
                $(this).find('.bank-checkbox').prop('checked', true)
                $('#section-carte-credit').removeClass('paiement-box-disabled')

                if (!$('#serviceMobileSection').hasClass('paiement-box-disabled')) {
                    $('#serviceMobileSection').addClass('paiement-box-disabled')
                    $('#paiementBtnCheckboxMobile').find('.bank-checkbox').prop('checked', false)
                }

                $('#section-carte-credit').removeClass('normal-box-border')
                $('#paiementBtnCheckbox').removeClass('normal-box-border')

                $('#section-carte-credit').addClass('active-box')
                $('#paiementBtnCheckbox').addClass('active-box')
                $('#paiementBtnCheckbox').find('.text-facture-box').addClass('btn-text-active') // ajout de la couleur au bouton

                // vérification des champs
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

            }

        })

        // service mobile section
        $('#paiementBtnCheckboxMobile').on('click', function(e) {
            e.preventDefault();
            if ( $(this).find('.bank-checkbox').is(':checked')) {
                $(this).find('.bank-checkbox').prop('checked', false)
                $('#serviceMobileSection').addClass('paiement-box-disabled')
                $('#paiementBtnCheckboxMobile').find('.text-facture-box').removeClass('btn-text-active') //remove text color
            }else {
                $(this).find('.bank-checkbox').prop('checked', true)
                $('#serviceMobileSection').removeClass('paiement-box-disabled')

                if (!$('#section-carte-credit').hasClass('paiement-box-disabled')) {
                    $('#section-carte-credit').addClass('paiement-box-disabled')
                    $('#paiementBtnCheckbox').find('.bank-checkbox').prop('checked', false)
                }
                $('#paiementBtnCheckboxMobile').find('.text-facture-box').addClass('btn-text-active') // ajout de la couleur au bouton
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
        $('#dateNaissancePrivee').mask('00/00/0000')
        $('#dateNaissancePrivee').bind('keyup','keydown', function(event) {
            var inputLength = event.target.value.length;
            if (event.keyCode != 8){
            if(inputLength === 2 || inputLength === 5){
                var thisVal = event.target.value;
                thisVal += '/';
                $(event.target).val(thisVal);
                }
            }
        })

        $('#dateExpirationPrivee').mask('00/00/0000')

        $('.one-check-4').on('change', function() {
            let numeroPiecePrivee = $('#numeroPiecePrivee').val();
            let dateExpiration = $("#dateExpirationPrivee").val();
            let dateNaissPrivee = $('#dateNaissancePrivee').val()

            if (numeroPiecePrivee.length > 0 && dateExpiration.length > 0 && dateNaissPrivee.length > 0) {
                $('#infos-priveeBtn').removeClass('img_bg')
                $('#infos-priveeBtn').prop('disabled', false)
            }else{
                $('#infos-priveeBtn').addClass('img_bg')
                $('#infos-priveeBtn').prop('disabled', true)
            }
        })

        $('#dateExpirationPrivee').bind('keyup','keydown', function(event) {
            var inputLength = event.target.value.length;
            if (event.keyCode != 8){
            if(inputLength === 2 || inputLength === 5){
                var thisVal = event.target.value;
                thisVal += '/';
                $(event.target).val(thisVal);
            }
        }

            // let numeroPiecePrivee = $('#numeroPiecePrivee').val();
            // let dateExpiration = $("#dateExpirationPrivee").val();
            // let dateNaissPrivee = $('#dateNaissancePrivee').val()

            // if (numeroPiecePrivee.length > 0 && dateExpiration.length > 0 && dateNaissPrivee.length > 0) {
            //     $('#infos-priveeBtn').removeClass('img_bg')
            //     $('#infos-priveeBtn').prop('disabled', false)
            // }

        })

        $('#sendSmsVerification').on('click', function(e) {

            event.preventDefault();
            let x = e.clientX - e.target.offsetLeft;
            let y = e.clientY - e.target.offsetTop;
            let ripples = document.createElement('span');

            ripples.style.width = '1500px !important';
            ripples.style.height = '1500px !important';

            ripples.classList.add('btn-animate-bg-marchand')
            // ripples.style.left = x + 'px';
            // ripples.style.top = y + 'px';
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

    })
</script>

</body>
</html>
