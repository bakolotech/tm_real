
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
  /* background-color: #555; */

  text-align: justify;
  border-radius: 6px;
  /* padding: 10px; */
  position: absolute;
  z-index: 1;
  /* bottom: 125%; */
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


</style>
<style>
                                    .box-payement {
                                        box-sizing: border-box;
                                        height: 42px;
                                        width: 322px;
                                        border: 1px solid #1A7EF5;
                                        border-radius: 6px;
                                        /* background-color: #FFFFFF; */
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
  height: 76px;
  width: 273.55px;
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

.carte-credit-facturation {
    height: 19px;
    color: #191970;
    font-family: Roboto;
    font-size: 16px;
    font-weight: 500;
    letter-spacing: 0;
    line-height: 19px;
    margin-top:11px;
    margin-left: 10px;
}

#paiementBtnContent:hover {
    cursor: pointer;
}

#paiementBtnCheckbox {
    background-color: #fff;
}

.bank-checkbox {
    height: 20px;
    width: 20px;
    background-color: red;
}

</style>
</head>
<body>
<div class="container">
    <div class="rectangle-1">
        <a href="https://toule.market" class="logo-copy">
            <img src="assets/images2/Logo_t.png.svg" alt="logo" width="100%" height="100%">
        </a>
        <div class="parametre">Paramètre</div>
    </div>
</div>

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

                        <div class="col-lg-12 col-md-12 div-2h" >
                            <div class="informations-commerce">
                                {{-- <div class="d-flex justify-content-center text-infos">Informations commerciales pour {{$_SESSION['prenom']['2']}} </div> --}}
                                <div class="d-flex justify-content-center text-infos- custom-text-infos">Informations sur le paiement </div>
                            </div>

                                {{-- premier box --}}
                                <div class="box-1-facturation" style="margin-top: 30px">
                                    <button  class="box-payement" style="margin-left: 42px; padding: 0px !important;" id="paiementBtnCheckbox">
                                        <label id="paiementBtnContent" class="carte-credit-facturation" for="carte_banquaire" style="margin-left: -15px" >
                                            <input class="bank-checkbox" type="checkbox" value="0" style="margin-right: 5px"> Carte de crédit ou de débit
                                            <a href="#"  style="text-decoration: none;   height: 22px;
                                            width: 73px; position: relative; left: 15px; top: -2px">
                                            <img width="73px" height="22px" src="assets/images/carte-bancaire.svg"> </a>
                                        </label>
                                    </button>

                                   <div class="label-el" style="margin-top:10px; margin-left:42px" >Détail de la carte crédit</div>
                                   <div class="carte-credit-detail" style="padding-top: 15px;">

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

                                    <div class="main-box-facture">
                                        <div class="box-input1" >

                                            <div class="label-el">Numéro de la carte</div>
                                            <input type="text" style="padding-left: 10px" class="rectangle-input" id="ville-particulier" placeholder="XXXXXXXXXXXX">
                                        </div>
                                        <div class="box-input1" style="margin-left: 10px">
                                            <div class="label-el">Date d'expiration</div>
                                            <input type="text" style="padding-left: 10px" class="rectangle-input" id="adresse-particulier" placeholder="jj/mm/aaaa">
                                        </div>
                                        <div class="box-input1" style="margin-left: 10px">
                                            <div class="label-el">Code de sécurité (CVV)

                                            </div>
                                            <input type="text" style="padding-left: 10px" class="rectangle-input" id="adresse-complement" placeholder="" style="font-size: 12px;padding-left:5px;">
                                            <small class="tooltips" style="">
                                                <img src="assets/images/icones-vendeurs2/Information.svg" class="tool-img" width="20px" height="20px">
                                                <span class="tooltiptext"><p>
                                                    Groupez les objets similaires ou identiques
                                                    (ex: un paquet de cigarette, quatre pommes, une collection de CD) que
                                                    vous voulez vendre ensemble à un même acheteur.
                                                </p></span>

                                            </small>
                                        </div>
                                    </div>
                                    <div style=" height: 60px; width: 603px; position: relative; margin-left: auto; margin-right: auto;">
                                        <div class="label-el">Nom sur la carte</div>
                                        {{-- <input type="text" class="input-rectangle-long"  placeholder="Moussavou Ulrich"/> --}}
                                        <input type="text" style="padding-left: 10px; width: 603px" class="rectangle-input" id="nom_sur_carte" placeholder="Moussavou Ulrich">

                                        <div style="width: 100%; height: 13px; margin-top: 5px;">
                                            <div for="checkbox"><input type="checkbox" style="position: relative; top: -3.5px; margin-right: 10px" /><span class="span-default-el">Définir en tant que mode de paiement par défaut</span></div>
                                        </div>
                                    </div>
                                </div>
                                {{-- fin premier box  --}}
                                {{-- deuxieme box  --}}
                                <div style="margin-top: 30px">
                                    <div class="box-payement" style="margin-left: 42px">
                                        <label class="carte-credit-facturation" for="carte_banquaire" >
                                            <input type="checkbox" value="0" style="margin-right: 5px"> Service banquaire mobile
                                            <a href="#" onclick="chooseCarteOrService()" style="text-decoration: none;   height: 22px;
                                            width: 73px; position: relative; left: 15px; top: -2px">
                                            <img width="73px" height="22px" src="assets/images/Mobile banking.svg"> </a>
                                        </label>
                                    </div>
                                    <div class="label-el" style="margin-left: 42px; margin-top:10px" >Détail de la carte crédit</div>
                                   <div class="carte-credit-detail" style="padding-top: 15px">

                                    <div style=" height: 60px; width: 603px;position: relative; margin-left: auto; margin-right: auto; display: flex; margin-bottom: 15px;">
                                        <div class="box-input1" style="width: 294px;">
                                            <div class="label-el">Nom du compte Airtel Money (Gabon)</div>
                                            <input type="text" style="padding-left: 10px; width: 294px;" class="rectangle-input" id="ville-particulier" placeholder="Moussavou Ulrich">
                                        </div>

                                        <div class="box-input1" style="margin-left: 10px; width: 294px;">
                                            <div class="label-el">Code marchand</div>
                                            <input type="text" style="padding-left: 10px; width: 294px;" class="rectangle-input" id="adresse-particulier" placeholder="">
                                        </div>
                                    </div>

                                    <div style=" height: 60px; width: 603px;position: relative; margin-left: auto; margin-right: auto; display: flex; margin-bottom: 15px">
                                        <div class="box-input1" style="width: 294px;">
                                            <div class="label-el">Nom du compte Moov Money (Gabon)</div>
                                            <input type="text" style="padding-left: 10px; width: 294px;" class="rectangle-input" id="ville-particulier" placeholder="Moussavou Ulrich">

                                            <div style="width: 100%; height: 13px; margin-top: 5px;">
                                                <div for="checkbox"><input type="checkbox" style="position: relative; top: -3.5px; margin-right: 10px" /><span class="span-default-el">Définir en tant que mode de paiement par défaut</span></div>
                                            </div>

                                        </div>

                                        <div class="box-input1" style="margin-left: 10px; width: 294px;">
                                            <div class="label-el">Code marchand</div>
                                            <input type="text" style="padding-left: 10px; width: 294px;" class="rectangle-input" id="adresse-particulier" placeholder="">


                                        </div>
                                    </div>
                                </div>
                                </div>

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
                                </style>




                            </div>
                               </div>

                            {{-- <label for="adrr">Adresse de l’entreprise</label> --}}


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
                    text-align: center; position: relative; overflow:hidden" onclick="saveMarchandInformationPerso(event)" id="infopersoann"><span class="mbtn-text">Suivant</span></button>
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


    // function saveMarchandInformationPerso(event) {
    //         event.preventDefault();
    //         var pays_citoyennete = $('#pays-citoyenne').find(':selected').val(); //ok
    //         var pay_naissance = $('#pays_naissance').find(':selected').val();
    //         var date_naissance = $('#mask-date-naissance').val()
    //         var piecie_identite_type = $('#piece-identite-type').find(':selected').val();
    //         var numero_piece = $('#numeropiece').val();
    //         var date_expiration = $('#mask-date-expiration').val();
    //         var pays_emission = $('#pays-emission').find(':selected').val();
    //         var adresse_pays_particulier = $('#adresse-pays-particulier').find(':selected').val();
    //         var code_postal_particulier = $('#code-postal').val();
    //         var adresse_province = $('#province-particulier').find(':selected').val();
    //         var adresse_ville = $('#ville-particulier').val();
    //         var adresse_fixe = $('#adresse-particulier').val();
    //         var adresse_complement = $('#adresse-complement').val();
    //         var telephone_particulier = $('#numero-telephone').val();
    //         var adresse_confirmation = $('#adresse-confirmation').val();

    //         console.log("Bonjour ", pays_emission)

    //         var info_particulier = {
    //             pays_citoyennete: pays_citoyennete,
    //             pay_naissance: pay_naissance,
    //             date_naissance: date_naissance,
    //             piecie_identite_type: piecie_identite_type,
    //             numero_piece: numero_piece,
    //             pays_emission: pays_emission,
    //             date_expiration: date_expiration,
    //             adresse_pays_particulier: adresse_pays_particulier,
    //             code_postal_particulier: code_postal_particulier,
    //             adresse_province: adresse_province,
    //             adresse_ville: adresse_ville,
    //             adresse_fixe: adresse_fixe,
    //             adresse_complement: adresse_complement,
    //             telephone_particulier: telephone_particulier,
    //             adresse_confirmation: adresse_confirmation,
    //             _token: $('#token').val(),
    //             step: 2,
    //             type_activite: 1,
    //         }

    //             $.ajax({
    //             type:'POST',
    //             url:"vers-infos-perso",
    //             data: info_particulier,
    //             headers: {
    //                 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    //             },
    //             success:function(response){
    //                 console.log(response)
    //                 window.location.href = "/marchand-facturation-particulier"
    //             }
    //         });
    //     }

    function saveMarchandInformationPerso(e) {
        event.preventDefault();
        let x = e.clientX - e.target.offsetLeft;
        let y = e.clientY - e.target.offsetTop;
        let ripples = document.createElement('span');

        ripples.style.width = '1500px !important';
        ripples.style.height = '1500px !important';

        ripples.classList.add('btn-animate-bg-marchand')
        // ripples.style.left = x + 'px';
        // ripples.style.top = y + 'px';
        document.getElementById('infopersoann').appendChild(ripples);
        // window.location.href = "/marchand-facturation-particulier"
        setTimeout(() => {
            window.location.href = "/marchand-facturation-particulier"
            ripples.remove();
        }, 400)
    }

</script>

<script>
    $(document).ready(function() {

        $('#paiementBtnCheckbox').on('click', function(e) {
            e.preventDefault();
            if ( $(this).find('.bank-checkbox').is(':checked')) {
                $(this).find('.bank-checkbox').prop('checked', false)
            }else {
                $(this).find('.bank-checkbox').prop('checked', true)
            }
            
        })
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
