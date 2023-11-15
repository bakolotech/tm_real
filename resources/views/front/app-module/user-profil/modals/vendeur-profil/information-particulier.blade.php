
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
$pays1 = \App\Models\Pays::possibles();

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

    .border-error-select {
        border: 1px solid #D0021B !important;
    }

</style>

<style>
    .line-container-2 {
        height: 41px;
        width: 100%;
    }
</style>
<style>
.tooltips {
  position: relative;
  display: inline-block;
}

.tooltips .tooltiptext {
  visibility: hidden;
  height: 76px;
  width: 273.55px;
  border-radius: 6px;
  background-color: #FFFFFF;
  box-shadow: 0 0 6px 0 rgba(0,0,0,0.5);

  text-align: justify;
  border-radius: 6px;
  position: absolute;
  z-index: 1;

  top: -43px;
  left: 104%;
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
  top: 31px;
  left: 100%;
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
    height: 56px;
    width: 241px;
    color: #191970;
    font-family: Roboto;
    font-size: 12px;
    letter-spacing: 0;
    line-height: 13px;
    justify-content: center;
    text-align: justify;
    margin-top: 12px;
    margin-left: 15px
}

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

    .input-none {
        display: none !important;
    }

    .border-error {
        border: 1px solid red;
    }

    .span-element-code {
        width: 50px;
        height: 37px;
        text-align: center;
        padding-top: 10px;
        border: 1px solid #979797;
        border-right: none;
    }


    .v-none {
        visibility: hidden;
    }

    .input-code:focus {
        outline: none;
        border: 1px solid #979797;
    }

    .span-element-code {
        width: 50px;
        height: 37px;
        text-align: center;
        padding-top: 10px;
        border: 1px solid #979797;
        border-right: none;
    }

    .verified-section {
        box-sizing: border-box;
        height: 31px;
        width: 133px;
        border: 1px solid #00B517;
        border-radius: 6px;
        background-color: #FFFFFF;

        color: #00B517;
        font-family: Roboto;
        font-size: 12px;
        font-weight: 500;
        letter-spacing: 0.26px;
        line-height: 13px;
        position: absolute;
        display: flex;
        justify-content: center;
        align-items: center;
        align-content: center;
        text-align: center;
        margin-left: 301px;
        margin-top: -36px;
    }

    .input-retour-zone {
        box-sizing: border-box;
        height: 41px;
        width: 603px;
        border: 1px solid #9B9B9B;
        /* transform: rotate(180deg); */
        border-radius: 6px;
        background-color: #F8F8F8;
        margin-left: 15px;
        /* margin-top: 15px; */
        padding-left: 15px;
    }

    .retour-adress-zone-option {
        height: 32px;
        width: 633px;
        display: flex;
        margin-top: 23px;
    }

    .el111 {
        height: 32px;
        width: 316.5px;
        background: #fff;
        box-sizing: border-box;
        border: 1px solid #D8D8D8;
        /* border-radius: 0 0 0 6px; */
        background-color: #FFFFFF;
    }

    .el111 span {
        height: 12px;
        width: 108px;
        color: #191970;
        font-family: Roboto;
        font-size: 12px;
        font-weight: 500;
        letter-spacing: 0;
        line-height: 12px;
        margin-left: 47px;
    }

    .lock-phone {
        opacity: 0.5;
        pointer-events: none;
    }

    .next-btn-particulier {
        font-family: Roboto;
        font-size: 16px;
        font-weight: 500;
        letter-spacing: 0.35px;
        line-height: 19px;
        text-align: center; position: relative; overflow:hidden
    }

</style>

<style>
    .modal-dialog-verification {
        position: relative;
        top: 18%;
    }

    .modal-dialog-verification, .modal-content-verification {
        height: 295px;
        width: 432px;
        border-radius: 6px;
        background-color: #FFFFFF;
        box-shadow: 0 2px 6px 0 rgba(0,0,0,0.35);

    }

    .modal-dialog-verification-error {
        position: relative;
        top: 18%;
    }

    .modal-dialog-verification-error, .modal-content-verification-error {
        height: 295px;
        width: 432px;
        border-radius: 6px;
        background-color: #FFFFFF;
    }

    .modal-content-verification-error {
        box-sizing: border-box;
        height: 332px;
        width: 429px;
        border: 2px solid #D0021B;
        border-radius: 6px;
        background-color: #FFFFFF;
        box-shadow: 0 5px 15px 0 rgba(0,0,0,0.35);
    }

    .modal-header-verification {
        height: 63.5px;
        width: 100%;
    }

    .modal-footer-verification {
        height: 62px;
        width: 100%;
    }

    .modal-body-verification {
        width: 100%;
    }

    .modal-body-verification-error {
        width: 100%;
        height: 201px;
    }

    .modal-verification-body-content {
        height: 168.5px;
        width: 100%;
        color: #191970;
        font-family: Roboto;
        font-size: 13px;
        font-weight: 300;
        letter-spacing: -0.34px;
        line-height: 14px;
        text-align: justify;
    }

    .modal-verification-body-content-error {
        color: #191970;
        font-family: Roboto;
        font-size: 13px;
        font-weight: 300;
        letter-spacing: -0.34px;
        line-height: 14px;
        text-align: justify;
        position: relative;
        left: 40px;
    }

    .modal-verification-header {
        height: 24px;
        width: 330px;
        color: #191970;
        font-family: Roboto;
        font-size: 21px;
        font-weight: 500;
        letter-spacing: 0;
        line-height: 21px;
        text-align: center;
        margin-top: 20px;
        margin-left: 50px;
    }

    .modal-verification-header-error {
        height: 24px;
        width: 350px;
        color: #D0021B;
        font-family: Roboto;
        font-size: 20px;
        font-weight: 500;
        letter-spacing: 0;
        line-height: 22px;
        text-align: center;
        margin-top: 25px;
        margin-left: 55px;
        margin-bottom: 15px;
    }

    .verification-cancel {
        box-sizing: border-box;
        height: 37px;
        width: 164px;
        border: 1px solid #1A7EF5;
        border-radius: 6px;
        background-color: #FFFFFF;
        font-family: Roboto;
        font-size: 16px;
        font-weight: 500;
        letter-spacing: 0.35px;
        line-height: 16px;
        text-align: center;
        color: #1A7EF5;
    }

    .verification-suivant {
        height: 37px;
        width: 164px;
        border-radius: 6px;
        background-color: #1A7EF5;
        border: none;

        color: #FFFFFF;
        font-family: Roboto;
        font-size: 16px;
        font-weight: 500;
        letter-spacing: 0.35px;
        line-height: 16px;
        text-align: center;
    }

    .error-titre-verification {
        height: 21px;
        width: 316px;
        color: #4A4A4A;
        font-family: Roboto;
        font-size: 18px;
        font-weight: 500;
        letter-spacing: 0;
        line-height: 20px;
        margin-top: 25px;
        margin-bottom: 30px;
    }

    .text-error-content {
        height: 72px;
        width: 308px;
        color: #4A4A4A;
        font-family: Roboto;
        font-size: 15px;
        font-weight: 300;
        letter-spacing: 0;
        line-height: 17px;
        text-align: center;
    }

    .spine-position {
        position: absolute;
        margin-left: -276px;
        margin-top: -14px;
    }

    .tooltiptextDD {
        visibility: hidden;
        position: absolute;
        margin-top: -60px;
        color: #fff;
        background-color: #4A4A4A;
        padding-left: 5px;
        padding-right: 5px;
        padding-top: 2px;
        padding-bottom: 2px;
        font-size: 10px;
        width: 79px;
        margin-left: 5px;
    }

    .icon-item-zone:hover .tooltiptextDD {
        visibility: visible;
    }
</style>

<style>
    .verification-phone-info {
        height: 45px;
        width: 238px;
        margin-left: 97px;
        text-align: center;
        font-family: 'Roboto';
        font-style: normal;
        margin-top: 15px;
        font-size: 16px;
    }

    .verification-input-section {
        width: 370px;
        height: 41px;
        background-color: #F8F8F8;
        margin-left: 33px;
        margin-top: 20px;
        display: flex;
        border-radius: 6px;
        border: 1px solid #9B9B9B;
    }

    .tm-item {
        width: 40px;
        height: 41px;
        display: flex;
        align-content: center;
        justify-content: center;
        align-items: center;

        font-family: 'Roboto';
        font-style: normal;
        font-weight: 400;
        font-size: 14px;
        line-height: 14px;

        letter-spacing: -0.33px;
        color: #4A4A4A;
    }

    .input-item-zone {
        width: 290px;
        height: 41px;
    }

    .icon-item-zone {
        width: 40px;
        height: 39px;
        display: flex;
        align-content: center;
        justify-content: center;
        align-items: center;
        border-left: 1px solid #9B9B9B;
    }

    .verification-input-element {
        width: 290px;
        height: 39px;
        background: #F8F8F8;
        border: none;
        color: #4A4A4A !important;
        font-family: Roboto;
        font-size: 14px;
        letter-spacing: -0.34px;
        line-height: 16px;
        padding-top: 5px;
    }

    .verification-input-element:focus{
        outline: none;
    }

    .number-only-section {
        font-style: normal;
        font-weight: 500;
        font-size: 14px;
        line-height: 18px;
        text-align: center;
        letter-spacing: -0.337647px;
    }

</style>
<style>
    .tooltip-sms {
        position: relative;
        display: inline-block;
        border-bottom: 1px dotted black;
    }

    .tooltip-sms .tooltiptext {
        visibility: hidden;
        width: 120px;
        background-color: black;
        color: #fff;
        text-align: center;
        border-radius: 6px;
        padding: 5px 0;
        position: absolute;
        z-index: 1;
        bottom: 150%;
        left: 50%;
        margin-left: -60px;
    }

    .tooltip-sms .tooltiptext::after {
        content: "";
        position: absolute;
        top: 100%;
        left: 50%;
        margin-left: -5px;
        border-width: 5px;
        border-style: solid;
        border-color: black transparent transparent transparent;
    }

    .tooltip-sms:hover .tooltiptext {
        visibility: visible;
    }

    .tooltiptextDD {
        visibility: hidden;
        position: absolute;
        margin-top: -60px;
        color: #fff;
        background-color: #4A4A4A;
        padding-left: 5px;
        padding-right: 5px;
        padding-top: 2px;
        padding-bottom: 2px;
        font-size: 10px;
        width: 79px;
        margin-left: 5px;
    }

    .icon-item-zone:hover .tooltiptextDD {
        visibility: visible;
    }

    .spiner-box-zone {
        position: absolute;
        margin-left: 530px;
        background-color: transparent;
        border: none;
        margin-top: 5px;
    }

    .timer-section {
        height: 10px;
        width: 400px;
        position: relative;
        margin-left: auto;
        margin-right: auto;
        margin-top: 10px;
        text-align: center;
    }

    .disabled-btn-element {
        pointer-events: none
    }

    #boutique_spiner {
        position: absolute;
        margin-left: -543px !important;
        margin-top: -17px !important;
    }

    #sms_spiner-resend {
        position: absolute;
        margin-left: -277px !important;
        margin-top: -14px !important;
    }

    .resize-verifie-btn {
        position: relative;
        top: -5px;
    }

    #prenomContactEntreprise,
    #prenom2ContactEntreprise,
    #nomFamContactEnt:focus {
        outline: none;
    }


/* tool adresse  */
.tooltips-adrr {
  position: relative;
  display: inline-block;
}

.tooltips-adrr .tooltiptext {
  visibility: hidden;
  height: 90px;
  width: 300.55px;

  height: 90px;
  width: 288px;
  border-radius: 6px;
  background-color: #FFFFFF;
  box-shadow: 0 0 6px 0 rgba(0,0,0,0.5);
  text-align: justify;
  border-radius: 6px;
  position: absolute;
  z-index: 1;
  top: -49px;
  left: 15px;
  margin-left: 158px;
  opacity: 0;
  transition: opacity 0.3s;

    color: #191970;
    font-family: Roboto;
    font-size: 12px;
    letter-spacing: 0;
    line-height: 13px;

}

.tooltips-adrr .tooltiptext::after {
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

.tooltips-adrr:hover .tooltiptext {
  visibility: visible;
  opacity: 1;
}

.tooltips-adrr p {
    height: 56px;
    width: 269px;
    color: #191970;
    font-family: Roboto;
    font-size: 12px;
    letter-spacing: 0;
    line-height: 14px;
    justify-content: center;
    text-align: justify;
    margin-top: 10px;
    margin-left: 10px;
}

/* tool adresse  */

</style>

</head>
<body>
    @include('front.app-module.user-profil.modals.vendeur-menu')
<div class="rectangle">
    <div class="containerD mask" style="display: flex; flew-direction: column">

        <div class="rowS hauteur-fixe container-zone-vendeur" style="display: flex;">
            <div style="" class="left-step-navigation">
                <div class="rectangle-panel-button active">

                    <div class="panel-button-icon  active   rounded-circle" style="background-color:#1A7EF5; text-align:center; padding:5%">
                        <p class="step-number-marchand" >1</p>
                    </div>

                    <div class="panel-button-text">Informations individuelles</div>
                    </div>

                    <div class="rectangle-panel-button">
                    <div class="panel-button-icon  active   rounded-circle active_step" style="text-align:center; padding:5%">
                           <p class="step-number-marchand" >2</p> </div>
                        <div class="panel-button-text-desable">Facturation</div>
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

                        <div class="col-lg-12 col-md-12 div-2h">

                            <div class="informations-commerce">
                                <div class="d-flex justify-content-center text-infos- custom-text-infos"><span style="custom-text-infos-text">Informations commerciales pour</span> <b class="infos-user-name">{{$_SESSION['prenom']['2']}}</b> </div>
                            </div>

                               <div class="container-1-infos">

                                <div class="line-container-1" style="display: flex; margin-bottom: 15px; margin-top: 15px; ">
                                    <div class="ele1 box-input1" style="margin-left: 15px">
                                        <div class="label-el">Pays de citoyenneté</div>
                                        <select name="payscite" id="pays-citoyenne" class="rectangle-select my-selectkkk" style="width: 195px !important;">
                                            <option value="">Choisir votre pays</option>
                                            @foreach($pays_seul as $pay)
                                                @if( isset($_SESSION['info_person']['pays_citoyennete']) && $pay->nom_fr_fr == $_SESSION['info_person']['pays_citoyennete'])
                                                    <option value="{{$pay->id}}" selected>{{ $pay->nom_fr_fr }}</option>
                                                    @else
                                                    <option value="{{$pay->id}}" >{{ $pay->nom_fr_fr }}</option>
                                                    @endif
                                                @endforeach
                                        </select>
                                    </div>

                                    <div class="ele1 box-input1" style="margin-left: 10px">
                                        <div class="label-el">Pays de naissance</div>
                                        <select name="paysnaiss" id="pays_naissance" class="rectangle-select my-select" style="padding-left:10px; width: 195px !important;">
                                        <option value="">Choisir votre pays</option>
                                        @foreach($pays_seul as $pay)
                                        @if(isset($_SESSION['info_person']['pay_naissance']) && $pay->nom_fr_fr == $_SESSION['info_person']['pay_naissance'])
                                            <option value="{{$pay->id}}" selected>{{ $pay->nom_fr_fr }}</option>
                                            @else
                                            <option value="{{$pay->id}}" >{{ $pay->nom_fr_fr }}</option>
                                            @endif
                                        @endforeach
                                        </select>
                                    </div>

                                    <div class="ele1 box-input1" style="margin-left: 10px">
                                        <div class="label-el">Date de naissance</div>
                                        <input style="padding-left: 10px; width: 195px !important; color: #4A4A4A;" type="text" id="mask-date-naissance"  placeholder="jj/mm/aaaa" value="@if(isset($_SESSION['info_person']['date_naissance']))
                                            {{$_SESSION['info_person']['date_naissance']}}
                                        @endif" class="rectangle-input">
                                    </div>

                                </div>

                                <div class="line-container-1" style="margin-left: 15px">
                                    <div class="label-el">Justificatif d'identité</div>
                                <div class="d-flex rectangle-input-2" style="width: 605px; border: none">
                                    <select class="rectangle-input-disable-2-p-0 cni-select" id="piece-identite-type" style="">
                                    <option value="cni" @if(isset($_SESSION['info_person']['piecie_identite_type']) && $_SESSION['info_person']['piecie_identite_type'] == 'CNI')
                                        selected
                                    @endif">Carte national d'identité</option>
                                        <option value="Passeport" @if(isset($_SESSION['info_person']['piecie_identite_type']) && $_SESSION['info_person']['piecie_identite_type'] == 'passport')
                                        selected
                                    @endif">Passeport</option>
                                    </select>
                                    <div style="width: 397px;">
                                        <input type="text" style="" value="@if(isset($_SESSION['info_person']['numero_piece'])){{$_SESSION['info_person']['numero_piece']}} @endif" class="cni-input" id="numeropiece" placeholder="Numéro de carte">
                                    </div>
                                </div>

                                </div>

                                <div class="line-container-1" style="display: flex; margin-left: 15px; margin-top: 15px">
                                    <div class="ele1 box-input1" >
                                        <div class="label-el">Pays d'émission</div>

                                        <select name="paysEmissions" id="pays-emission" class="rectangle-select"style="padding-left:10px; z-index: 100 !important">
                                            <option value="">Choisir votre pays</option>
                                            @foreach($pays_seul as $pay)
                                            @if(isset($_SESSION['info_person']['pays_emission']) && $pay->id == $_SESSION['info_person']['pays_emission'])
                                            <option value="{{$pay->id}}" selected>{{ $pay->nom_fr_fr }}</option>
                                            @else
                                            <option value="{{$pay->id}}" >{{ $pay->nom_fr_fr }}</option>
                                            @endif
                                        @endforeach
                                        </select>
                                </div>

                                <div class="ele1 box-input1" style="margin-left: 10px">
                                    <div class="label-el">Date d'expiration</div>
                                    <input type="text" id="mask-date-expiration" value="@if(isset($_SESSION['info_person']['date_expiration'])) {{$_SESSION['info_person']['date_expiration']}} @endif" placeholder="jj/mm/aaaa"   class="rectangle-input" style="padding-left: 15px">
                                </div>

                                </div>
                            </div>
                               </div>

                            <div class="container-2-infos-add">Adresse de l’entreprise
                                <small class="tooltips-adrr" style="">
                                    <img src="assets/images/icones-vendeurs2/Information.svg" width="14px" height="14px" style="margin-top: -30px; margin-left: 150px">
                                    <span class="tooltiptext"><p>
                                        Cette adresse représente votre principal lieu d'affaires (ex. siège social ou succursale) où vous recevez des services de TOULÈ Market, et pour les particuliers, cela représente votre lieu de résidence habituel.
                                    </p></span>

                                </small>
                            </div>
                            <div class="container-2-infos">
                                <div class="line-container-2" style="display: flex; margin-top: 15px">
                                    <div class="box-input1" style="margin-left: 15px">
                                        <select class="rectangle-select img_bg my-selectl" style="width: 195px !important; background-color: #D8D8D8 !important" name="typeactivite" id="adresse-pays-particulier" disabled>
                                            @foreach($pays1 as $pay)
                                            @if(isset($_SESSION['pays']['adressprof']) && $pay->id == $_SESSION['pays']['adressprof'])
                                                <option value="{{$pay->id}}" selected>{{ $pay->nom_fr_fr }}</option>
                                                @else
                                                <option value="{{$pay->id}}" >{{ $pay->nom_fr_fr }}</option>
                                                @endif
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="box-input1" style="margin-left: 10px;">
                                        <input type="text" style="padding-left: 10px" value="@if(isset($_SESSION['info_person']['adresse_province'])){{$_SESSION['info_person']['adresse_province']}} @endif" class="rectangle-input" id="province-particulier" placeholder="Province">
                                    </div>

                                    <div class="box-input1" style="margin-left: 10px">
                                        <input type="text" style="padding-left: 10px" class="rectangle-input" id="ville-particulier" placeholder="Ville" value="@if(isset($_SESSION['info_person']['adresse_ville'])){{$_SESSION['info_person']['adresse_ville']}} @endif">
                                    </div>

                                </div>
                                {{-- line 2  --}}

                                <div class="line-container-2" style="display: flex; margin-top: 5px">

                                    <div class="box-input1" style="margin-left: 15px">
                                        <input type="text" style="padding-left: 10px" class="rectangle-input" id="adresse-particulier" value="@if(isset($_SESSION['info_person']['adresse_fixe'])){{$_SESSION['info_person']['adresse_fixe']}} @endif" placeholder="Adresse">
                                    </div>

                                    <div class="box-input1" style="margin-left: 10px">
                                        <input style="padding-left: 15px" type="text" class="rectangle-input" id="code-postal" value="@if(isset($_SESSION['info_person']['code_postal_particulier'])){{$_SESSION['info_person']['code_postal_particulier']}} @endif" placeholder="Code postal">
                                    </div>

                                    <div class="box-input1" style="margin-left: 10px">
                                        <input type="text" style="padding-left: 10px" class="rectangle-input" id="adresse-complement" value="@if(isset($_SESSION['info_person']['adresse_complement'])){{$_SESSION['info_person']['adresse_complement']}} @endif" placeholder="Comp. d’adresse (facultatif)" style="font-size: 12px;padding-left:5px;">
                                    </div>

                                </div>

                                <div class="line-container-2" style="display: flex; margin-top: 5px; ">
                                    <div class="forms-3-checkbox-off-2-forms" style="margin-left: 15px; margin-right: 5px" >
                                        <input style="margin: 0px" class="form-check-input radio-check-icon" type="checkbox" id="adresse-confirmation" value="0" checked>
                                    </div>
                                    <div class="je-confirme-que-lem" style=" color: #4A4A4A;
                                    font-family: Roboto;
                                    font-size: 12px;
                                    letter-spacing: 0.26px;
                                    line-height: 13px;">Je confirme que mon adresse est correcte et je comprends que ces informations ne peuvent pas être modifiées tant que la vérification de l'adresse n'est pas terminée.</div>
                                </div>

                            </div>

                            <div class="form-fields" style="margin-top: 15px; margin-left: 43px">
                                    <div class="col-8">
                                            <div class="label-el">Numéro de téléphone pour vérification</div>
                                            @if(isset($_SESSION['info_person']['numero_tel']))
                                            <div class="d-flex rectangle-input-2 lock-phone" id="phone-zone-element">
                                                @else
                                                <div class="d-flex rectangle-input-2 lock-phones" id="phone-zone-element">
                                            @endif
                                                <div class="" style="width: 25%; height: 100%;">
                                                    <div class="my-select-img bg-simple-grey" id="formChangeBoutique_pays-input" style="width: 194px !important; border-radius: 6px; display: flex">
                                                        <div class='parent-0 select-main-div my-form-field pl-0' data-ul-id='#id4' id="formChangeBoutique_pays-select" data-opened="0" style="overflow: hidden; width: 60px !important; height: 39px; border-radius: 0px; border: none; border-right: 1px solid #979797;">
                                                            <div class='select-main-div-img ' id="id3-main-img"><img src='{{ $monPays->getImage() }}' alt=''></div>
                                                        </div>

                                                        <ul class='select-ul' data-opened="0"  id='id4' style="width: 194px !important; margin-top: 25px">
                                                            @foreach($pays as $pay)
                                                            <li class='select-li-marchand' id="formPay_select-li-{{ $pay['phonecode'] }}" data-value='{{ $pay['phonecode'] }}' data-input='#formChangeBoutique_pays' data-text="{{ $pay['phonecode'] }}">
                                                            <div class='select-second-div'>
                                                                <div class='select-main-div-img'><img src='{{ $pay['images'] }}' alt=''></div>
                                                                <div class='select-main-div-text'>{{ $pay['nom_pays'] }}</div>
                                                                <div class='selected-li'></div>
                                                            </div>
                                                            </li>
                                                            @endforeach
                                                        </ul>

                                                        <div class='select-main-div-text' style="padding-top: 12px; padding-left: 5px; padding-right: 5px" id="code-phone-m">+241</div>
                                                    </div>
                                                </div>
                                                <div class="" style="width: 40%; height: 100%; position: relative; left: 61.5px;">
                                                    <input style="padding-left: 19px; border-radius: 0px 6px 6px 0px; position: relative; left: -72px" type="text" class="input-neutre" value="@if(isset($_SESSION['info_person']['numero_tel']))
                                                        {{$_SESSION['info_person']['numero_tel']}}
                                                    @endif" id="numero-telephone" placeholder="Ex: 62955990">
                                                </div>
                                                <article class="main-sms-element" style="position: relative; left: 7px" id="sendSmsSection">
                                                    <a id="sendSmsVerification" href="" style="" class="envoyer-un-sms">
                                                    Envoyer un sms</a>
                                                    <span style="position: absolute; margin-left: 44px; margin-top: -2px; color: #fff;" class="spinner-borderg" id="sms_spiner-send"role="status" aria-hidden="true"></span>
                                                </article>

                                                <input type="hidden" value="0" id="telChecked" />

                                                <div id="tm-zone-code1" class="tm-zone-code input-none" style="position: absolute; margin-left: 450px; width: 100px; height: 37px; display: flex">
                                                    <span style="" class="span-element-code">TM-</span>
                                                    <input style="width: 70px; height: 37px; border: 1px solid #979797; border-left: none"  type="text" id="inputCodeVerification1" class=" input-code">
                                                </div>

                                            </div>
                                            <div class="verified-section v-none" id="codeVerifieOk">
                                                Vérifié  <img style="margin-left: 5px" src="{{ asset('assets/images/tm-on.svg') }}" alt="">
                                            </div>
                                            @if(isset($_SESSION['info_person']['numero_tel']))
                                            <div class="verified-section" id="codeVerifieOk">
                                                Vérifié  <img style="margin-left: 5px" src="{{ asset('assets/images/tm-on.svg') }}" alt="">
                                            </div>
                                            @else
                                            <div class="verified-section v-none" id="codeVerifieOk">
                                                Vérifié  <img style="margin-left: 5px" src="{{ asset('assets/images/tm-on.svg') }}" alt="">
                                            </div>
                                            @endif

                                        </div>
                                        <span id="phone-check-error-text" class="input-none" style="position: absolute; margin-left: 460px; margin-top: -27px; font-size: 10px; color: red">Erreur le numero peut être incorrect</span>
                                    </div>
                            {{-- fin section téléphone  --}}

                        </div>
                    </form><br><br><br><br><br><br><br><br><br>

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

            {{-- ------------------------------------- fin contact principal----------------------------------- --}}
            <div class="modal modal-verification" backdrop="static" tabindex="-1" role="dialog"  aria-hidden="true" id="modalVerificationIdentite">
                <div class="modal-dialog modal-dialog-verification" role="document">
                    <div class="modal-content modal-content-verification">

                    <div class="modal-headerh modal-header-verification" style="border-bottom: 1px solid #ccc">
                        <div class="modal-verification-header">
                        Code de confirmation
                        </div>
                    </div>

                    <div class="modal-body modal-body-verification" style="padding: 0px !important">
                        <div class="modal-verification-body-content">

                        <div class="verification-phone-info" >
                            Vous devriez recevoir un texto au<br>
                            <span class="number-only-section">+241 62756478 (Gabon) </span><br>
                            contenant un code de confirmation
                        </div>

                        <div class="verification-input-section">

                            <div class="tm-item">
                                <img src="{{ asset('assets/images/tm-fav.svg') }}" alt="">
                            </div>

                            <div class="input-item-zone">
                                <input type="text" class="verification-input-element" id="inputCodeVerification" placeholder="Saisissez le code">
                                <span class="input-none" id="phone-verification-erreur" style="color: red; position: relative; top: 10px; margin-left: auto; margin-right: auto; left: 26px">Code incorrect, veillez saisir un code valide</span>
                            </div>

                            <div class="icon-item-zone">
                                <button class="spiner-box-zone">
                                    <span id="sms_spiner-resend"role="status" aria-hidden="true"></span>
                                </button>
                                <span class="tooltiptextDD" >Renvoyer le code</span>
                                <script src="https://cdn.lordicon.com/xdjxvujz.js"></script>

                                <button type="button" class="disabled-btn-element" style="border: none; background-color: transparent;" id="resendCodeBtn" disabled>

                                    <span id="coloredReloadBtn" class="input-none">
                                        <lord-icon
                                            src="https://cdn.lordicon.com/sihdhmit.json"
                                            trigger="click"
                                            colors="primary:#1a7ef5"
                                            style="width:30px;height:30px">
                                        </lord-icon>
                                    </span>

                                    <span id="disabledReloadBtn">
                                        <lord-icon
                                        src="https://cdn.lordicon.com/sihdhmit.json"
                                        trigger="click"
                                        colors="primary:#969696"
                                        style="width:30px;height:30px">
                                    </lord-icon>
                                    </span>
                                </button>
                            </div>

                        </div>

                        <p id="timer" class="timer-section"  style="position: relative; left: 0px">

                        </p>
                        </div>
                    </div>

                    <div class="modal-footer-verification" style="position: relative; ">
                        <div style="padding-left: 45px">

                            <button type="button" id="smsVerificationCancelBtn" class="verification-cancel" style="margin-right: 12px">Annuler</button>

                            <button id="validateCodeSms" onclick="checkVerificationCodeParticulier()" type="button" class="verification-suivant" ><span class="check_text">Vérifier</span>
                                <span class="spiner-box-zone input-none">
                                    <span id="boutique_spiner"role="status" aria-hidden="true"></span>
                                </span>
                            </button>

                        </div>
                    </div>

                    </div>
                </div>
                </div>
                {{-- -------------------modal fin-------------------- --}}
            {{-- footer element  --}}
    </div>
</div>

    </div>
</div>

    <div style="height: 81px; background-color: transparent; position: relative; top: -120px; width: 100%; padding-right: 400px">
        <div class="d-flex justify-content-center">
            <div class="bottom-divd" style="display: flex; margin-top: 15px; background-color: #fff; padding: 0px 80px 0px 80px">
                <div class="group-3">
                    @if(isset($_SESSION['info_person']['numero_tel']))
                        <button type="submit" class="group3 next-btn-particulier img_bgs" style="" disableds  onclick="saveMarchandInformationPerso(event)" id="infopersoann">
                        <span class="mbtn-text">Suivant</span>
                        <span class="spinner-borderD" id="sms_spiner-resendInfoPersonnel"role="status" aria-hidden="true"></span>
                    </button>
                    @else
                        <button type="submit" class="group3 next-btn-particulier img_bg" style="" disabled  onclick="saveMarchandInformationPerso(event)" id="infopersoann">
                        <span class="mbtn-text">Suivant</span>
                        <span class="spinner-borderD" id="sms_spiner-resendInfoPersonnel"role="status" aria-hidden="true"></span>
                    </button>
                    @endif
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
{{-- <script src="{{ asset('assets/jQuery-Mask-Plugin-master/dist/jquery.mask.min.js') }}"></script> --}}
<script src="{{ asset('assets/jQuery-Mask-Plugin-master/dist/jquery.mask.min.js') }}"></script>
<script>

    function saveMarchandInformationPerso(event) {
        event.preventDefault();
        var pays_citoyennete = $('#pays-citoyenne').find(':selected').text(); //ok
        var pay_naissance = $('#pays_naissance').find(':selected').text();
        var date_naissance = $('#mask-date-naissance').val()
        var piecie_identite_type = $('#piece-identite-type').find(':selected').text();
        var numero_piece = $('#numeropiece').val();
        var date_expiration = $('#mask-date-expiration').val();
        var pays_emission = $('#pays-emission').find(':selected').val();
        var adresse_pays_particulier = $('#adresse-pays-particulier').find(':selected').val();
        var code_postal_particulier = $('#code-postal').val();
        var adresse_province = $('#province-particulier').val();
        var adresse_ville = $('#ville-particulier').val();
        var adresse_fixe = $('#adresse-particulier').val();
        var adresse_complement = $('#adresse-complement').val();
        var telephone_particulier = $('#numero-telephone').val();
        var adresse_confirmation = $('#adresse-confirmation').val();

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

        let x = event.clientX - event.target.offsetLeft;
        let y = event.clientY - event.target.offsetTop;
        let ripples = document.createElement('span');

        ripples.style.width = '1500px !important';
        ripples.style.height = '1500px !important';

        // ripples.classList.add('btn-animate-bg-marchand')
        document.getElementById('infopersoann').appendChild(ripples);

        if (pays_citoyennete === '' && pay_naissance === '') {  //border-error-select
            console.log('Ya rien', pays_citoyennete, pay_naissance)
            $('#pays-citoyenne').addClass('border-error-select')
            $('#pays-citoyenne').css('border', '1px solid red')

            $('.select2-container--default .select2-selection--single').css("border", "5px solid red !important" );
            $("[labelledby='select2-pays-citoyenne-container']").css('border', '1px solid red !important')
        }else{
            $.ajax({
            type:'POST',
            url:"vers-infos-perso",
            data: info_particulier,
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            beforeSend: function(params) {
                ripples.remove()
                $('#sms_spiner-resendInfoPersonnel').addClass('spinner-border')
                $('#infopersoann').find('.mbtn-text').css('display','none')
                $('#infopersoann').addClass('block-btn')
                $('#infopersoann').css('opacity','0.5')
                console.log('Here we are')
            },
            success:function(response){
                window.location.href = "/marchand-facturation-particulier"
            },
            complete: function() {

            }

            });
    }
}

</script>

<script>

var count = 30; // Timer
    var redirect = "/"; // Target URL
    function countDown() {
        var timer = document.getElementById("timer"); // Timer ID
        if (count > 0) {
        count--;
        timer.innerHTML = "Vous n'avez pas reçu de code ? <br> Veillez patienter " + count+"s avant de demander un autre code"; // Timer Message
        timer.innerHTML += '<img style="margin-left: 5px" width="13px" height="13px" src="{{ asset("assets/images/tm-reload.svg") }}" alt="">'
            setTimeout("countDown()", 1000);
        } else {
            $('#resendCodeBtn').removeClass('disabled-btn-element');
            $('#resendCodeBtn').prop('disabled', false)
            $('#coloredReloadBtn').removeClass('input-none')
            $('#disabledReloadBtn').addClass('input-none')
            $('#timer').addClass('input-none')
        }
    }

    var count1 = 30; // Timer
    function countDown1(count) {
        $('#timer').removeClass('input-none')
        var timer = document.getElementById("timer"); // Timer ID
        if (count1 > 0) {
        count1--;
        timer.innerHTML = "Vous n'avez pas reçu de code ? <br> Veillez patienter " + count1+"s avant de demander un autre code"; // Timer Message
        timer.innerHTML += '<img style="margin-left: 5px" width="13px" height="13px" src="{{ asset("assets/images/tm-reload.svg") }}" alt="">'
            setTimeout("countDown1()", 1000);
        } else {
            $('#resendCodeBtn').removeClass('disabled-btn-element');
            $('#resendCodeBtn').prop('disabled', false)
            $('#coloredReloadBtn').removeClass('input-none')
            $('#disabledReloadBtn').addClass('input-none')
            $('#timer').addClass('input-none')
        }
        }


    $(document).ready(function() {

        $('#pays-citoyenne').select2({
            dropdownCssClass : 'no-search'
        });

        $('#pays-emission').select2({
            dropdownCssClass : 'no-search'
        })

        $('#mask-date-naissance').mask('00/00/0000');

        $('#code-postal').mask('0000')

        $('#numero-telephone').mask('000000000000000000000')
        $('#inputCodeVerification1').mask('0000')

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
            console.log('Nous sommes belle et bien ici')
            e.preventDefault();
            let numero_phone = $('#numero-telephone').val()
            var code_validation = Math.floor(1000 + Math.random() * 9000);

            let x = e.clientX - e.target.offsetLeft;
            let y = e.clientY - e.target.offsetTop;
            let ripples = document.createElement('span');

            ripples.style.width = '1500px !important';
            ripples.style.height = '1500px !important';

            ripples.classList.add('btn-animate-bg-marchand')
            document.getElementById('sendSmsSection').appendChild(ripples);
            var num_tel = $('#numero-telephone').val();
            if (num_tel === '') {
                console.log('Le numero de téléphone est obligatoire')
                $('#phone-zone-element').addClass('border-error')
                // setTimeout
                ripples.remove();
            }else{

                countDown();

                $.ajax({
                    method: 'POST',
                    url: '/check_phone_inbase',
                    data: {_token: $('#token').val(), num_tel: num_tel, code_verification: code_validation},
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    beforeSend: function(params) {
                        ripples.remove()
                        $('#sms_spiner-send').addClass('spinner-border')
                        $('#sendSmsVerification').addClass('input-none')
                        $('#sendSmsSection').addClass('block-btn')
                        $('#sendSmsSection').css('opacity','0.5')
                    },
                    success: function(response) {
                        if (response.status == "200") {
                        console.log('Ce numero existe déjà en base')
                        $('#phone-check-error-text').removeClass('input-none')
                        $('#phone-zone-element').addClass('border-error')
                        }else if (response.status == "201") {
                            var new_user_number_phone = numero_phone.substring(1); // Removes 0
                            console.log('Here is data => ', response)
                            $('#modalVerificationIdentite').show();
                            var settings = {
                            "url": "https://zjzrlx.api.infobip.com/sms/2/text/advanced",
                            "method": "POST",
                            "timeout": 0,
                            "headers": {
                                "Authorization": "App 388a4474b975e04e70e8eef8545a8900-de552553-9817-439c-ab57-a618f6dfa657",
                                "Content-Type": "application/json",
                                "Accept": "application/json"
                                },
                                "data": JSON.stringify({
                                "messages": [
                                    {
                                    "destinations": [
                                        {
                                        "to": "00241"+new_user_number_phone
                                        }
                                    ],
                                    "from": "InfoSMS",
                                    "text": "Salut voici votre code de …: TM-"+code_validation
                                        }
                                    ]
                                }),
                            };

                            $.ajax(settings).done(function (response) {
                                console.log(response);
                                $('.number-only-section').text('+241 '+numero_phone);
                                $('#modalVerificationIdentite').show();
                            });
                        }
                    },
                    complete: function() {
                        $('#sms_spiner-send').removeClass('spinner-border')
                        $('#sendSmsVerification').removeClass('input-none')
                        $('#sendSmsSection').removeClass('block-btn')
                        $('#sendSmsSection').css('opacity','1')
                    }
                })

          }
        })


            $('#resendCodeBtn').on('click', function() {
            var num_tel = $('#numero-telephone').val();
            console.log('ok ok we are')

            if (count1 === 0) {
                count1 = 30
                countDown1();
            }else{
                countDown1();
            }

            $.ajax({
                method: 'POST',
                url: '/send_verification_sms',
                data: {_token: $('#token').val(), num_tel: num_tel},
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                beforeSend: function() {
                    $('#sms_spiner-resend').addClass('spinner-border')
                    $('#coloredReloadBtn').addClass('input-none')
                    $('#disabledReloadBtn').addClass('input-none')
                },
                success: function(response) {

                },

                complete: function() {
                    $('#resendCodeBtn').addClass('disabled-btn-element');
                    $('#resendCodeBtn').prop('disabled', true)
                    $('#coloredReloadBtn').addClass('input-none')
                    $('#disabledReloadBtn').removeClass('input-none')
                    $('#phone-verification-erreur').addClass('input-none')
                    $('#sms_spiner-resend').removeClass('spinner-border')
                }
            })

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

    })
</script>

</body>
</html>
