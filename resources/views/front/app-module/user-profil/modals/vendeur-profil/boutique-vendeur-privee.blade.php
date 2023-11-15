
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

use App\Http\Controllers\UniverController;
$univers = new UniverController();
$niver_final = \App\Models\Univer::all_univers();

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

.bouton-annuler1 {
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
        /* width: 189px; */
        color: #191970;
        font-family: Roboto;
        font-size: 16px;
        font-weight: 500;
        letter-spacing: 0;
        line-height: 19px;
        margin-top:11px;
        margin-left: 10px;
    }

    .box-description-boutique {
        height: 48px;
        width: 633px;
        color: #191970;
        font-family: Roboto;
        font-size: 14px;
        font-weight: 500;
        letter-spacing: 0;
        line-height: 16px;
    }

    </style>

    <style>
        .boutique-checkbox {
            height: 44px;
            width: 603px;
            margin-bottom: 20px;
        }

        .checkbox-content {
            height: 20px;
            width: 202px;
            margin-top: 10px;
        }

        .boutique-unavalable {
            box-sizing: border-box;
            height: 31px !important;
            width: 133px;
            border: 1px solid #D0021B;
            border-radius: 6px;
            background-color: #FFFFFF;

            color: #D0021B;
            font-family: Roboto;
            font-size: 12px;
            font-weight: 500;
            letter-spacing: 0.26px;
            line-height: 12px;

            padding-top: 10px;
            padding-left: 16px;
            position: absolute;
            margin-left: 139px;
            margin-top: -0.5px;
        }

        .boutique-ok {
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
            line-height: 12px;

            padding-top: 10px;
            padding-left: 27px;

            position: absolute;
            margin-left: 139px;
            margin-top: -0.5px;

        }

        .red-text {
            box-sizing: border-box;
            height: 33px;
            width: 163px;
            border: 1px solid #9B9B9B;
            border-radius: 6px;
            background-color: #FFFFFF;
            margin-right: 5px;
            padding-left: 10px;
            padding-top: 9px;
            color: #000000;
            font-family: Roboto;
            font-size: 14px;
            letter-spacing: 0;
            line-height: 14px;
            padding-right: 10px;
            margin-bottom: 0px;
            margin-top: 5px;
        }

        .form-select {
            /* padding-top: 0px !important; */
            padding-bottom: 10px;
        }

        .comment:last-of-type {
        /* border-bottom: none; */
        margin-bottom: 0;
        }

        .red-text-rayon {
            box-sizing: border-box;
            height: 33px;
            width: 163px;
            border: 1px solid #9B9B9B;
            border-radius: 6px;
            background-color: #FFFFFF;
            margin-right: 5px;
            padding-left: 10px;
            padding-top: 9px;
            color: #000000;
            font-family: Roboto;
            font-size: 14px;
            letter-spacing: 0;
            line-height: 14px;
            padding-right: 10px;
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

        .carte-boutique-detail {
            /* height: 190px; */
            /* height: 399px; */
            height: auto;
            width: 633px;
            border: 1px solid #D8D8D8;
            border-radius: 6px;
            position: relative;
            margin-left: auto;
            margin-right: auto;
            padding-bottom: 15px;
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

        .checkbox-size {
            width: 18px;
            height: 18px
        }

        .btik-type {
            position: relative;
            top: -5.5px;
            left: 6px;
            color: #000000;
            font-family: Roboto;
            font-size: 14px;
            letter-spacing: 0;
            line-height: 14px;
        }

        .nom-boutique-section {
            height: 37px;
            width: 603px;
            position: relative;
            margin-left: auto;
            margin-right: auto;
            margin-bottom: 15px;
            background-color: #fff;
        }

        .radio-text {
            position: relative;
            font-family: Roboto;
            font-size: 14px;
            letter-spacing: 0;
            line-height: 14px;
        }
    </style>

<style>
        .multiselect {
        width: 100%;
        }

        .selectBox {
        position: relative;
        }

        .selectBox select {
        width: 100%;
        }

        .overSelect {
            position: absolute;
            left: 0;
            right: 0;
            top: 0;
            bottom: 0;
        }

        #mySelectOptions {
        display: none;
        border: 0.5px #7c7c7c solid;
        background-color: #ffffff;
        max-height: 150px;
        overflow-y: scroll;
        position: absolute;
        width: 603px;
        z-index: 1000;
        }

        #mySelectOptions label {
        display: block;
        font-weight: normal;
        display: block;
        white-space: nowrap;
        min-height: 1.2em;
        background-color: #ffffff00;
        padding: 0 2.25rem 0 .75rem;
        /* padding: .375rem 2.25rem .375rem .75rem; */
        }

        #mySelectOptions label:hover {
        background-color: #1e90ff;
        cursor: pointer;
        color: #fff;
        }

        /* rayon  */

        #mySelectOptionsRayon {
        display: none;
        border: 0.5px #7c7c7c solid;
        background-color: #ffffff;
        max-height: 150px;
        overflow-y: scroll;
        }

        #mySelectOptionsRayon label {
        display: block;
        font-weight: normal;
        display: block;
        white-space: nowrap;
        min-height: 1.2em;
        background-color: #ffffff00;
        padding: 0 2.25rem 0 .75rem;
        /* padding: .375rem 2.25rem .375rem .75rem; */
        }

        #mySelectOptionsRayon label:hover {
            background-color: #1e90ff;
            color: #fff;
            cursor: pointer;
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

        .b-none {
            display: none;
        }

        .spiner-box-zone {
            position: absolute;
            margin-left: 530px;
            /* margin-left: 425px; */
            background-color: transparent;
            border: none;
            margin-top: 5px;
        }

        .close-univ-button {
            width: 20px;
            height: 20px;
            border-radius: 50%;
            background-color: transparent;
            position: absolute;
            z-index: 2000;
            color: red;
            margin-left: -25px;
            margin-top: 17px;
            transform: rotate(134deg);
            font-weight: 400;
            font-size: 20px;
        }

        .close-univ-button-1 {
            width: 20px;
            height: 20px;
            border-radius: 50%;
            background-color: transparent;
            position: absolute;
            z-index: 2000;
            color: #D0021B;
            margin-top: -5px;
            transform: rotate(134deg);
            font-weight: 400;
            font-size: 20px;
        }

        .rayon-label {
            /* background-color: yellow !important; */
            /* display: inline-block; */
            margin-bottom: 0px;
            height: 14px;
            margin-bottom: 7px;
            line-height: 14px;
            height: 18px;

        }

        .rayon-label input {
            width: 18px;
            height: 18px;
        }

        .rayon-univers-title {
            /* width: 3 ; */
            height: 30px;
            background-color: #fffdfd;
            padding-left: 10px;
            padding-top: 10px;
            font-size: 14px;
            color: #9B9B9B;
            font-weight: 700;
        }

</style>

<style>
    .slider-head {
        width: 603px;
        height: 194px;
        /* background-color: red; */
        position: relative;
        margin-left: auto;
        margin-right: auto;
        border-radius: 6px;
        padding-top: 10px;

        background: #F8F8F8;
        border: 1px solid #979797;
        padding-left: 15px;
    }

    .rayon-title-zone-count {
        margin-top: 15px;
        height: 20px;
        width: 250px;
        margin-left: 15px;
        margin-bottom: 5px;
        font-family: Roboto;
        font-size: 14px;
        font-weight: 500;
        color: #191970;

    }

    .univer-section {
        width: 100%;
        height: 14px;
        /* background-color: #ccc; */
        line-height: 19;
    }

    .main-section {
        width: 583px;
        height: 128px;
        /* background-color: blue; */
        position: relative;
        margin-left: auto;
        margin-right: auto;
        margin-top: 10px;
        /* margin-top: 10px;
        display: grid;
        grid-template-columns: 280px 1fr; */
    }

    .rayon_items {
        display: grid;
        grid-template-columns: 280px 1fr;
        /* row-gap: -20px !important; */
    }

    .univers-btn-slider-section {
        width: 20px;
        height: 194px !important;
        top: -20px;
        /* background-color: #fff; */
    }

    .dot-btn-element {
        height: 16px;
        width: 5px;
        border-radius: 6px;
        background: #D9D9D9;
        margin-bottom: 1px;
    }

    .dot-btn-element:hover {
        cursor: pointer;
    }

    .select-all-rayons {
        font-family: 'Roboto';
        font-style: normal;
        font-weight: 400;
        font-size: 10px;
        line-height: 10px;
        position: relative;
        top: -4px;
    }

    .rayon-title-zone {
        height: 14px;
        margin-top: 10px;
    }

    .item-none {
        display: none;
    }

    .active-btn-rayon {
        background: #1A7EF5;
    }

    .active-rayon-zone {
        /* border: 1px solid #ccc; */
    }

    .boutik-questions-2 {
        height: 32px;
        width: 603px;
        color: #191970;
        font-family: Roboto;
        font-size: 14px;
        font-weight: 500;
        letter-spacing: 0;
        line-height: 16px;
        margin-bottom: 0px !important;
        margin-top: 20px;
    }

    #univer-title-zone {
        font-family: 'Roboto';
        text-transform: uppercase;
        font-size: 14px;
        position: relative;
        top: -4px;
    }

    .checklibell {
        position: relative;
        top: -2.5px;
    }

    .question-proprietaire-element {
        position: relative;
        top: -10px;
    }

    .question-proprietaire-element input {
        margin-right: 5px;
    }

    .btik-type1 {
        font-size: 14px;
    }

    .btik-type {
        font-size: 14px;
    }

    #default-univers {
        position: relative;
        top: 3px;
        font-size: 14px;
        font-family: Roboto;
    }

    .border-error-univ {
        border: 1px solid #D0021B !important;
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
                        <div class="panel-button-text">Renseignements commerciaux</div>
                    </div>
                    <div class="rectangle-panel-button success">
                        <div class="panel-button-icon success">
                          <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-check-circle-fill" viewBox="0 0 16 16">
      <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z"/>
    </svg>
                        </div>
                        <div class="panel-button-text">Informations individuelles</div>
                    </div>


                    <div class="rectangle-panel-button success">
                        <div class="panel-button-icon  success   " >
                            <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-check-circle-fill" viewBox="0 0 16 16">
                                <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z"/>
                              </svg>
                            {{-- <p style="color:white"></p> --}}
                        </div>
                        <div class="panel-button-text">Facturation</div>
                    </div>
                    <div class="rectangle-panel-button active">
                    <div class="panel-button-icon  active   rounded-circle" style="background-color:#1A7EF5; text-align:center; padding:5%">
                           <p style="color:white">4</p>
                        </div>
                        <div class="panel-button-text">Boutique</div>
                    </div>
                    <div class="rectangle-panel-button">
                    <div class="panel-button-icon  active   rounded-circle" style="background-color:#1A7EF5; text-align:center; padding:5%">
                           <p style="color:white">5</p>
                        </div>
                        <div class="panel-button-text">Vérification</div>
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
                                <div class="d-flex justify-content-center text-infos- custom-text-infos">Informations sur le produit et la boutique </div>
                            </div>

                                {{-- premier box --}}
                                <div class="box-1-facturation" style="margin-top: 20px;">

                                    <div class="box-description-boutique" style="margin-left: 42px;">
                                        Répondez à quelques questions sur votre activité afin que nous puissions
                                        vous aider au mieux lors de votre intégration.
                                        Les réponses que vous fournissez n’affectent pas votre capacité à créer un compte vendeur.
                                    </div>

                                    <div class="label-el" style="margin-left: 42px; margin-top:30px;">Détails de la boutique</div>

                                   <div class="carte-boutique-detail" style="padding-top: 15px;">
                                    <div class="boutique-checkbox" style="margin-left: 15px;">

                                        <div class="label-el">Type de la boutique</div>

                                        <div class="checkbox-content" style="display: flex; column-gap: 30px">
                                            <div>
                                            <input @if((isset($_SESSION['boutique_privee_suppInfos']['nom_boutique'])) && $_SESSION['boutique_privee_suppInfos']['type_boutique'] == "Détaillant")
                                                checked
                                            @endif class="radio-check-icon one-check-1 checkbox-size" id="type-boutik-1" name="type_boutique" type="checkbox" value="Détaillant">
                                                <span class="btik-type">Détaillant</span></div>
                                            <div>
                                            <input @if((isset($_SESSION['boutique_privee_suppInfos']['nom_boutique'])) && $_SESSION['boutique_privee_suppInfos']['type_boutique'] == "Grossiste")
                                            checked
                                        @endif class="radio-check-icon one-check-1 checkbox-size" id="type-boutik-2"  name="type_boutique" type="checkbox" value="Grossite">
                                            <span class="btik-type">Grossiste</span></div>
                                        </div>
                                    </div>

                                    <div style="" class="nom-boutique-section">

                                        <button class="spiner-box-zone">
                                            <span id="boutique_spiner"role="status" aria-hidden="true">
                                            </span>
                                        </button>

                                        <input class="input-rectangle-long-boutique" style="padding-left: 15px" type="text" placeholder="Nom de la boutique" value="@if(isset($_SESSION['boutique_privee_suppInfos']['nom_boutique'])) {{$_SESSION['boutique_privee_suppInfos']['nom_boutique']}} @endif" id="nom-boutique" />
                                        <div class="boutique-existe" style="position: absolute; margin-top: -33.5px; float: right; margin-left: 327px; height: auto; display: flex">
                                            <div id="unavalable-boutik" class="boutique-unavalable b-none" style="">
                                                <span style="position: relative; top: -1px; left: -1px">
                                                    <span style="position: relative; top: -0.5px">Non disponible</span>
                                                    <span class="close-univ-button-1d" style="position: relative; top: -2px">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-exclamation-square" viewBox="0 0 16 16">
                                                            <path d="M14 1a1 1 0 0 1 1 1v12a1 1 0 0 1-1 1H2a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1h12zM2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2z"/>
                                                            <path d="M7.002 11a1 1 0 1 1 2 0 1 1 0 0 1-2 0zM7.1 4.995a.905.905 0 1 1 1.8 0l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 4.995z"/>
                                                          </svg>
                                                    </span></span>
                                            </div>

                                            <div id="avalable-boutik" class="boutique-ok b-none">
                                                <span style="position: relative; top: -1px; left: 1px">Disponible
                                                    <span style="position: relative; top: -2px">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-check-square" viewBox="0 0 16 16">
                                                            <path d="M14 1a1 1 0 0 1 1 1v12a1 1 0 0 1-1 1H2a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1h12zM2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2z"/>
                                                            <path d="M10.97 4.97a.75.75 0 0 1 1.071 1.05l-3.992 4.99a.75.75 0 0 1-1.08.02L4.324 8.384a.75.75 0 1 1 1.06-1.06l2.094 2.093 3.473-4.425a.235.235 0 0 1 .02-.022z"/>
                                                          </svg>
                                                    </span>
                                                </span>
                                            </div>
                                        </div>
                                    </div>

                                    {{-- debut  --}}
                                <div id="myMultiselect" class="multiselect" style="width: 603px !important; margin-left:15px">
                                    <div id="mySelectLabel" class="selectBox" onclick="toggleCheckboxArea()" >
                                        <div class="form-select" id="univers_div_select" style="background-color: #F8F8F8; border: 1px solid #9B9B9B; border-radius: 6px">
                                            <span style="margin-top: 5px"></span>
                                            <small id="default-univers" >Selectionner un univers</small>
                                        </div>
                                        <div class="overSelect"></div>
                                      </div>

                                    <div id="mySelectOptions">
                                        @foreach($niver_final as $univer)
                                            <label><input type="checkbox" data-lib="{{$univer->libelle}}" id="{{$univer->id}}" onchange="checkboxStatusChange({{$univer->id}})" value="{{$univer->id}}" /> {{$univer->libelle}}</label>
                                        @endforeach
                                    </div>

                                    </div>

                                {{-- ----------------------------------------------------  --}}
                                <div class="rayon-title-zone-count">Mes rayons (<span id="rayon-counter-zone">0</span>)</div>
                                <div class="slider-head">
                                    {{-- <div class="univer-section"> --}}
                                        <div class="rayon-title-zone" style="margin-top: 0px">
                                            <span id="univer-title-zone">Aucun univers séléctionner</span>
                                            <a href="#" id="select-all-rayons-id" class="select-all-rayons" onclick="checkAllRayon()">Tout séléctionner</a>
                                            <a href="#" id="deselect-all-rayons-id" class="select-all-rayons item-none" onclick="unCheckAllRayon()">Tout déléctionner</a>
                                        </div>
                                    {{-- </label> --}}

                                    <div style="width: 100%; height: 194px; display: flex; ">
                                        <div class="main-section" >

                                        </div>

                                        <div class="univers-btn-slider-section" style="position: relative;left: 5px">

                                        </div>
                                    </div>

                                </div>
                                 {{-- ----------------------------------------------------  --}}

                                    {{-- debut zone checkbox  --}}
                                <div style="  height: 57px;
                                width: 603px;  margin-left: 15px; ">
                                <p style="height: 32px;
                                width: 603px;
                                color: #191970;
                                font-family: Roboto;
                                font-size: 14px;
                                font-weight: 500;
                                letter-spacing: 0;
                                line-height: 16px;  margin-bottom: 0px !important; margin-top: 20px">
                                    Êtes-vous le fabricant ou le propriétaire de la marque (ou l'agent ou le représentant de la marque)
                                    des produits que vous souhaitez vendre sur TOULÈ Market ?
                                </p>

                                <div class="d-flex" style="height: 20px; width: 351px; margin-top: 5px;">
                                    <div class="checkbox-content" style="display: flex; column-gap: 30px">

                                        <div style="display: flex" class="question-proprietaire-element">
                                            <input class="radio-check-icon one-check-2 checkbox-size" id="question-boutik-3"  name="question_1d" type="checkbox" value="certain" @if(isset($_SESSION['boutique_privee_suppInfos']['fabriquant']) && trim($_SESSION['boutique_privee_suppInfos']['fabriquant']) == "certain") @endif>
                                            <span class="btik-type1">Certain(e)s</span>
                                        </div>

                                        <div style="display: flex" class="question-proprietaire-element">
                                        <input class="radio-check-icon one-check-2 checkbox-size" id="question-boutik-1" name="question_1d" type="checkbox" value="oui" @if(isset($_SESSION['boutique_privee_suppInfos']['fabriquant']) && trim($_SESSION['boutique_privee_suppInfos']['fabriquant']) == "oui") checked @endif>

                                            <span class="btik-type1">Oui</span></div>

                                        <div style="display: flex" class="question-proprietaire-element">
                                        <input  class="radio-check-icon one-check-2 checkbox-size" id="question-boutik-2"  name="question_1d" type="checkbox" value="non" @if(isset($_SESSION['boutique_privee_suppInfos']['fabriquant']) && trim($_SESSION['boutique_privee_suppInfos']['fabriquant']) == "non") @endif>
                                        <span class="btik-type1">Non</span></div>




                                        {{-- <input type="text" value="{{$_SESSION['boutique_privee_suppInfos']['fabriquant']}}"> --}}
                                    </div>
                                </div>
                                </div>
                                    {{-- debut zone checkbox  --}}

                                    {{-- debut zone checkbox  --}}
                                    <div style="  height: 55px;
                                    width: 603px; margin-left: 15px; " id="second-question-element" class="item-none">
                                    <p class="boutik-questions-2" >
                                        Êtes-vous le propriétaire officiel de la marque déposée des produits que vous souhaitez vendre sur TOULÈ Market ?
                                    </p>

                                    <div class="d-flex" style="height: 20px; width: 351px; margin-top: 5px;">
                                        <div class="checkbox-content" style="display: flex; column-gap: 30px">
                                            <div style="display: flex" class="question-proprietaire-element">
                                            <input class="radio-check-icon one-check-3 checkbox-size" id="question-boutik-1off" name="question_2d" type="checkbox" value="oui">
                                                <span class="btik-type1">Oui</span></div>

                                            <div style="display: flex" class="question-proprietaire-element">
                                            <input class="radio-check-icon one-check-3 checkbox-size" id="question-boutik-2off"  name="question_2d" type="checkbox" value="non">
                                            <span class="btik-type1">Non</span></div>

                                            <div style="display: flex" class="question-proprietaire-element">
                                                <input class="radio-check-icon one-check-3 checkbox-size" id="question-boutik-3off"  name="question_2d" type="checkbox" value="Certain">
                                                <span class="btik-type1">Certain(e)s</span>
                                            </div>
                                        </div>
                                    </div>

                                    </div>
                                    {{-- debut zone checkbox  --}}
                                </div>
                                {{-- fin premier box  --}}
                                {{-- deuxieme box  --}}
                            </div> <br>
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
                    <button type="submit" class="group3 bouton-annuler" style="margin-right: 10px" onclick="retour(event)" id="boutiqueCancel">
                        <a style="text-decoration: none" href="/marchand-facturation-vendeur-privee">Retour</a>
                    </button>
                <button type="submit" class="group3 suivantBtn" onclick="saveMarchandInformationPerso(event)" id="infoboutique_persone">
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


    let nombre_rayon = 0;
    let tab_lib_rayons = [];

    let arr = [['il est monté bien, en haut','b'],['c est la lettre, bien','d'],['e','f']];
    let tag = ['c est la lettre, bien','d'];

    function array_equals(a, b){
        return a.length === b.length && a.every((item,idx) => item === b[idx])
    }

    var tab_univer = []
    var tab_rayon = []

    jQuery(document).ready(function () {
        $('.one-check').click(function () {
            $(this).prop('checked', true);
            $.each($('.one-check').not($(this)), function (key, value) {
                $(value).prop('checked', false);
            })
        })
    })

    window.onload = (event) => {
        initMultiselect();
    };

    // for univers
function initMultiselect() {
  checkboxStatusChange();

  document.addEventListener("click", function(evt) {
    var flyoutElement = document.getElementById('myMultiselect'),
      targetElement = evt.target; //
        do {
        if (targetElement == flyoutElement) {
            return;
        }
        // Go up the DOM
        targetElement = targetElement.parentNode;
        } while (targetElement);
        toggleCheckboxArea(true);
  });

}

// rayon section
function initMultiselectRayon() {
  checkboxStatusChanged();
  document.addEventListener("click", function(evt) {
    var flyoutElement = document.getElementById('myMultiselectRayon'),
      targetElement = evt.target; // clicked element
    do {
      if (targetElement == flyoutElement) {
        return;
      }
      // Go up the DOM
      targetElement = targetElement.parentNode;
    } while (targetElement);
    toggleCheckboxArea(true);

  });
}

function checkAllRayon() {

    $('.active-rayon-zone').find(':checkbox').each(function() {
        if ($(this).prop('checked') != true ) {
            $(this).prop('checked', true)
            nombre_rayon += 1
        }
    })

    $('#rayon-counter-zone').text(nombre_rayon)
    $('#deselect-all-rayons-id').removeClass('item-none')
    $('#select-all-rayons-id').addClass('item-none')
}

function unCheckAllRayon() {
    $('.active-rayon-zone').find(':checkbox').each(function() {
        if ($(this).prop('checked') != false ) {
            $(this).prop('checked', false)
            nombre_rayon -= 1
        }
    })
    $('#rayon-counter-zone').text(nombre_rayon)
    $('#deselect-all-rayons-id').addClass('item-none')
    $('#select-all-rayons-id').removeClass('item-none')
}

function checkProprietaire(event) {
    let val_event = $(event.target).val()
    if (val_event === 'oui') {

        if ($('#question-boutik-1').prop('checked') == true) {
            $('#second-question-element').removeClass('item-none')
        }
    }

    if (val_event === 'certain') {

        if ($('#question-boutik-3').prop('checked') == true) {
            $('#second-question-element').removeClass('item-none')
        }else {
            $('#second-question-element').addClass('item-none')
        }
    }

    if (val_event === 'non') {

    if ($('#question-boutik-2').prop('checked') == true) {
        $('#second-question-element').addClass('item-none')
    }

}
    // console.log(check_question)
    // console.log('Bonjour je suis le check que tu cherche', check_question)
}

let tab_uni = [];
let tab_univers_libelle = [];

function checkboxStatusChange(id) {
    var multiselect = document.getElementById("mySelectLabel");
    var multiselectOption = multiselect.getElementsByTagName('span')[0];
    var values_univers = [];
    var checkboxes = document.getElementById("mySelectOptions");
    var checkedCheckboxes = checkboxes.querySelectorAll('input[type=checkbox]:checked');
    let lib_univers = $('#'+id).attr('data-lib')

  if ($('#'+id).is(':checked')) {
    $('#univer-title-zone').text(lib_univers)
    tab_univers_libelle.unshift(lib_univers)

    $.ajax({
            method: 'GET',
            url: 'get_rayons_univers/'+id,
            data: {},
            headers: {},
            success: function(response) {

                $('.main-section').empty()
                $('.univers-btn-slider-section').empty()
                let labelOption = [];
                let tab_rayon = [] // pour une recupération des rayons
                let tableau_rayon_id = []; // pour recupérer les ids des rayons

                $('#univers_div_select').removeClass('border-error-univ')

                for (let i = 0; i < response.length; i++) {
                    labelOption += '<label class="rayon-label" data-univers = "'+id+'" id="rayon_'+response[i].id+'"><input type="checkbox" id="rayon'+response[i].id+'" onchange="checkboxStatusChanged('+response[i].id+')" data-rayon="'+response[i].libelle+'" value="'+response[i].id+'" />&nbsp;'+response[i]['libelle']+'</label>'
                    tab_rayon.push(response[i]['libelle'])
                    tableau_rayon_id.push(response[i]['id'])
                    // ---------------------traitement du tableau -------------------------------------
                }

                $('#mySelectOptionsRayon').append('<div class="rayon-univers-title">'+lib_univers+'</div>'+labelOption)
                tab_uni.unshift(tab_rayon)
                for (let i = 0; i < tab_uni.length; i++) {
                    let slide_element = [];
                    if (i === 0) {
                        let slide_element = '<div class="rayon_items active-rayon-zone" style="position: relative;" id="item'+i+'">'

                    for (let y = 0; y < tab_uni[i].length; y++) {
                        slide_element += '<label class="rayon-label">';
                        slide_element += '<input type="checkbox" data-ray="'+tab_uni[i][y]+'" id="rayons-biz'+y+'" onChange="countRayon(event)"  value="'+y+'" /> <span class="checklibell">'+tab_uni[i][y]+'</span>'
                        slide_element += '</label>'
                    }

                    slide_element += '</div>'
                    let btn_univers = '<div data-univ = "'+tab_univers_libelle[i]+'" id="btn-rayon-el'+i+'" class="active-btn-rayon dot-btn-element" onClick="setthisActive('+i+')"></div>'

                    $('.main-section').append(slide_element)
                    $('.univers-btn-slider-section').append(btn_univers)

                    $('.rayon-label input[type=checkbox]').each(function() {
                        if (tab_lib_rayons.includes($(this).attr('data-ray'))) {
                            $('[data-ray="'+$(this).attr('data-ray')+'"]').prop('checked', true)
                        }
                    })

                    }else {
                        let slide_element = '<div class="rayon_items item-none" style="position: relative;" id="item'+i+'">'
                    for (let y = 0; y < tab_uni[i].length; y++) {
                        slide_element += '<label class="rayon-label">';
                        slide_element += '<input type="checkbox" data-ray="'+tab_uni[i][y]+'" id="'+y+'" onChange="countRayon(event)"  value="'+y+'" /> <span class="checklibell">'+tab_uni[i][y]+'</span>'
                        slide_element += '</label>'
                    }
                    slide_element += '</div>'
                    let btn_univers = '<div data-univ = "'+tab_univers_libelle[i]+'" id="btn-rayon-el'+i+'" class="dot-btn-element" onClick="setthisActive('+i+')"></div>'

                    $('.main-section').append(slide_element)
                    $('.univers-btn-slider-section').append(btn_univers)

                    $('.rayon-label input[type=checkbox]').each(function() {
                        if (tab_lib_rayons.includes($(this).attr('data-ray'))) {
                            $('[data-ray="'+$(this).attr('data-ray')+'"]').prop('checked', true)
                        }
                    })

                    }
                }

            }

        })

// ----------------------------------------------------------------------------
        let univers_pre = $('#'+id).attr('data-lib')

        if (univers_pre.length > 20) {
            let cuted_text = univers_pre.substring(0, 18)

            let new_text = cuted_text+' ...';
            let univers_val =  '<label data-univ="'+univers_pre+'" class="red-text" id="spanelement'+id+'">'+new_text+'</label><label href="#" id="supp-univ'+id+'" class="close-univ-button" onClick="deleteUniver('+id+')">+</label>'

            $('#default-univers').remove();
            multiselectOption.innerHTML += univers_val

        }else {
            let univers_val =  '<label data-univ="'+univers_pre+'" class="red-text" id="spanelement'+id+'">'+univers_pre+'</label><label href="#" id="supp-univ'+id+'" class="close-univ-button" onClick="deleteUniver('+id+')">+</label>'

            $('#default-univers').remove();
            multiselectOption.innerHTML += univers_val
        }
    //   ----------------------------------------------------------------------------------
    }else{

        $('#spanelement'+id).remove()
        $('#supp-univ'+id).remove()
        $.ajax({
                method: 'GET',
                url: 'get_rayons_univers/'+id,
                data: {},
                headers: {},
                success: function(response) {
                    $('.main-section').empty()
                    $('.univers-btn-slider-section').empty();
                    tab_rayon = [];
                    for (let i = 0; i < response.length; i++) {
                        tab_rayon.push(response[i]['libelle'])
                        // ---------------------traitement du tableau -------------------------------------
                    }

                    tab_uni = tab_uni.filter(item => !array_equals(item, tab_rayon)) // ajout d'un tableau de rayon
                    // ------------------------après suppression --------------------------
                        for (let i = 0; i < tab_uni.length; i++) {
                            let slide_element = [];
                        if (i === 0) {
                            let slide_element = '<div class="rayon_items active-rayon-zone" style="position: relative; " id="item'+i+'">'

                        for (let y = 0; y < tab_uni[i].length; y++) {
                            slide_element += '<label class="rayon-label">';
                                // ---------------------- get rayon id -------------------------
                            slide_element += '<input type="checkbox" data-ray="'+tab_uni[i][y]+'" id="'+y+'" onChange="countRayon(event)" value="'+y+'" /> '+tab_uni[i][y]+''
                            slide_element += '</label>'
                        }
                            slide_element += '</div>'
                            let btn_univers = '<div id="btn-rayon-el'+i+'" class="active-btn-rayon dot-btn-element" onClick="setthisActive('+i+')"></div>'

                            $('.main-section').append(slide_element)
                            $('.univers-btn-slider-section').append(btn_univers)

                        }else {
                            let slide_element = '<div class="rayon_items item-none" style="position: relative;" id="item'+i+'">'

                        for (let y = 0; y < tab_uni[i].length; y++) {
                            slide_element += '<label class="rayon-label">';
                            slide_element += '<input type="checkbox" data-ray="'+tab_uni[i][y]+'" id="'+y+'"  value="'+y+'" onChange="countRayon(event)" /> '+tab_uni[i][y]+''
                            slide_element += '</label>'
                        }
                            slide_element += '</div>'
                            let btn_univers = '<div id="btn-rayon-el'+i+'" class="dot-btn-element" onClick="setthisActive('+i+')"></div>'

                            $('.main-section').append(slide_element)
                            $('.univers-btn-slider-section').append(btn_univers)
                            }
                    }
                    // ------------------------- fin suppression --------------------------
                    let nombre_element = $('.red-text').length;

                    if (nombre_element === 0) {
                        $('#univers_div_select').append('<span id="default-univers">Séléctionner un univers</span>')
                    }else{
                        console.log('encore quelque élément')
                    }
                }

            })
    }

}

// switch between univers
function setthisActive(id) {
    let rayon_lib = $('#btn-rayon-el'+id).attr('data-univ')
    $('#univer-title-zone').text(rayon_lib)
    $(".rayon_items").addClass('item-none')
    $('.rayon_items').removeClass('active-rayon-zone');
    $('#item'+id).removeClass('item-none')
    $('#item'+id).addClass('active-rayon-zone')
    $('.dot-btn-element').removeClass('active-btn-rayon')
    $('#btn-rayon-el'+id).addClass('active-btn-rayon')
}

// suppression des univers
function deleteUniver(id) {
    // get all checkbox
    $(this).remove();
    $('#supp-univ'+id).remove()
    $('#'+id).prop('checked', false)
    $('#spanelement'+id).remove();

    let lib_univers = $('#'+id).attr('data-lib')
    tab_univers_libelle = tab_univers_libelle.filter(x => x !== lib_univers);
    let nombre_element = $('.red-text').length;

    if (nombre_element === 0) {
        nombre_rayon = 0;
        $('#univers_div_select').append('<span id="default-univers">Séléctionner un univers</span>')
        $('#univer-title-zone').text('AUCUN UNIVERS SÉLÉCTIONNER')
        $('#rayon-counter-zone').text(nombre_rayon)
    }else{
        console.log('encore quelque élément')
    }

    $.ajax({
            method: 'GET',
            url: 'get_rayons_univers/'+id,
            data: {},
            headers: {},
            success: function(response) {

                tab_rayon = [];
                let tableau_id = [];

                for (let i = 0; i < response.length; i++) {

                    tab_rayon.push(response[i]['libelle'])

                    if ($('[data-ray="'+response[i]['libelle']+'"]').prop('checked') == true) {
                        nombre_rayon -= 1;
                        console.log('ceci à été trouvé ici bien', nombre_rayon)
                    }else {
                        console.log('rien à été trouve')
                    }

                    // ---------------------traitement du tableau -------------------------------------
                }
                if (nombre_rayon < 0) {
                    nombre_rayon = 0;
                }
                $('#rayon-counter-zone').text(nombre_rayon)

                $('.main-section').empty()
                $('.univers-btn-slider-section').empty();
                tab_uni = tab_uni.filter(item => !array_equals(item, tab_rayon))

                // ------------------------après suppression --------------------------
                for (let i = 0; i < tab_uni.length; i++) {
                        // console.log('nous y sommes vraiment...')
                        let slide_element = [];
                        // debut if ---------------------------
                        if (i === 0) {
                            $('#univer-title-zone').text(tab_univers_libelle[0]) // le titre de l'univers
                            let slide_element = '<div class="rayon_items active-rayon-zone" style="position: relative;" id="item'+i+'">'

                        for (let y = 0; y < tab_uni[i].length; y++) {
                            slide_element += '<label class="rayon-label">';
                            slide_element += '<input type="checkbox" data-ray="'+tab_uni[i][y]+'" id="rayons-biz'+y+'" onChange="countRayon(event)"  value="'+y+'" /> <span class="checklibell">'+tab_uni[i][y]+'</span>'
                            slide_element += '</label>'
                        }
                        slide_element += '</div>'
                        let btn_univers = '<div data-univ = "'+tab_univers_libelle[i]+'" id="btn-rayon-el'+i+'" class="active-btn-rayon dot-btn-element" onClick="setthisActive('+i+')"></div>'

                        $('.main-section').append(slide_element)
                        $('.univers-btn-slider-section').append(btn_univers)

                        // recuperation des rayons
                        $('.rayon-label input[type=checkbox]').each(function() {
                            if (tab_lib_rayons.includes($(this).attr('data-ray'))) {
                                $('[data-ray="'+$(this).attr('data-ray')+'"]').prop('checked', true)
                            }
                        })

                        }else {
                            let slide_element = '<div class="rayon_items item-none" style="position: relative; " id="item'+i+'">'

                        for (let y = 0; y < tab_uni[i].length; y++) {
                            slide_element += '<label class="rayon-label">';
                            slide_element += '<input type="checkbox" data-ray="'+tab_uni[i][y]+'" id="rayons-biz'+y+'" onChange="countRayon(event)" value="'+y+'" /> <span class="checklibell">'+tab_uni[i][y]+'</span>'
                            slide_element += '</label>'
                        }
                        slide_element += '</div>'
                        let btn_univers = '<div data-univ = "'+tab_univers_libelle[i]+'" id="btn-rayon-el'+i+'" class="dot-btn-element" onClick="setthisActive('+i+')"></div>'

                        $('.main-section').append(slide_element)
                        $('.univers-btn-slider-section').append(btn_univers)

                        $('.rayon-label input[type=checkbox]').each(function() {
                            if (tab_lib_rayons.includes($(this).attr('data-ray'))) {
                                $('[data-ray="'+$(this).attr('data-ray')+'"]').prop('checked', true)
                            }
                        })

                        }
                    }
                    // ------------------------- fin suppression --------------------------
            }
        })
}

// count rayons

function countRayon(event) {

    if ($(event.target).prop('checked') == true) {
        nombre_rayon += 1;
        tab_lib_rayons.push($(event.target).attr('data-ray'))
    }else{
        nombre_rayon -= 1;
        tab_lib_rayons.splice($(event.target).attr('data-ray'), 1)
    }
    $('#rayon-counter-zone').text(nombre_rayon)

    if (nombre_rayon > 0) {
        $('.slider-head').removeClass('border-error-univ')
    }else{
        // $('.slider-head').removeClass('border-error-univ')
    }
    let libelle_rayon = $(event.target).attr('data-ray')
}

function checkboxStatusChanged(id) {

  var multiselect = document.getElementById("mySelectLabelRayon");
  var multiselectOption = multiselect.getElementsByTagName('span')[0];

  var values_univers = [];
  var checkboxes = document.getElementById("mySelectOptionsRayon");
  var checkedCheckboxes = checkboxes.querySelectorAll('input[type=checkbox]:checked');

//   multiselectOption.innerText = dropdownValue;
// ----------------------------------------------------------------------------
    for (const item of checkedCheckboxes) {
        var checkboxValue = item.getAttribute('data-rayon');
        values_univers.push(checkboxValue);
    }

    tab_univer = values_univers

    let rayon_pre = $('#rayon'+id).attr('data-rayon')

    // console.log('Le truc:', rayon_pre)
    if (rayon_pre.length > 20) {
        let cuted_text = rayon_pre.substring(0, 18)

        let new_text = cuted_text+' ...';

        let univers_val =  '<label class="red-text-rayon" id="spanelement'+id+'">'+new_text+'</label><label href="#" id="supp-rayon-1'+id+'" class="close-univ-button" onClick="deleteRayon('+id+')">+</label>'

        $('#default-rayons').remove();
        multiselectOption.innerHTML += univers_val

    }else {
        let univers_val =  '<label class="red-text-rayon" id="rayon-span'+id+'">'+rayon_pre+'</label><label id="supp-rayon-1'+id+'" class="close-univ-button" onClick="deleteRayon('+id+')">+</label>'

        $('#default-rayons').remove();
        multiselectOption.innerHTML += univers_val
    }
}

function deleteRayon(id) {
    $('#rayon'+id).prop('checked', false)
    $('#rayon-span'+id).remove();
    $('#supp-rayon-1'+id).remove();

    let nombre_element = $('.red-text-rayon').length;

    if (nombre_element === 0) {
        $('#rayon_div_select').append('<span id="default-rayons">Séléctionner un rayon</span>')
    }else{
    }
}

function toggleCheckboxArea(onlyHide = false) {
  var checkboxes = document.getElementById("mySelectOptions");
  var displayValue = checkboxes.style.display;

  if (displayValue != "block") {
    if (onlyHide == false) {
      checkboxes.style.display = "block";
    }
  } else {
    checkboxes.style.display = "none";
  }

}

function toggleCheckboxAreaRayon(onlyHide = false) {

    var checkboxes = document.getElementById("mySelectOptionsRayon");
  var displayValue = checkboxes.style.display;

  if (displayValue != "block") {
    if (onlyHide == false) {
      checkboxes.style.display = "block";
    }
  } else {
    checkboxes.style.display = "none";
  }

}

function saveMarchandInformationPerso(e) {
    event.preventDefault();
    let nom_boutique = $('#nom-boutique').val();

    var fabriquant = $('input[name="question_1d"]:checked').val();
    console.log('votre fabricant est:', fabriquant)
    var proprietaire = $('input[name="question_2d"]:checked').val();

    console.log('les valeur rechercher:', fabriquant, proprietaire)
    // var proprietaire_officiel = $('input[name="question_12"]:checked').val();
    if (fabriquant === undefined && fabriquant !='') {
        console.log('Ya un vraie problème')
    }

    let tableau_univers = [] // initialisation des tableaux des univers
    let tableau_rayons = [] // initialisation des tableaux des rayons

    if (!Validate1(nom_boutique) || nom_boutique === '') {
        $("#nom-boutique").addClass('input-error-warning-long')
    }else {
        $("#nom-boutique").removeClass('input-error-warning-long')
    }

    let univer_section = $('#univers_div_select').find('.red-text').length // recupération de la taille

    if (univer_section > 0) {
        $('#univers_div_select').find('.red-text').each(function() {
            tableau_univers.push($(this).attr('data-univ'))
        })
    }
    // ------------------------- get rayons elements -----------------------------
    let rayons_elements = $('.rayon-label').find('input[type="checkbox"]').length;
    if (rayons_elements > 0) {
        $('.rayon-label').find('input[type="checkbox"]').each(function(){
            if ($(this).prop('checked') == true) {
                tableau_rayons.push($(this).attr('data-ray'))
            }
        })
    }

    if (univer_section === 0) {
        $('#univers_div_select').addClass('border-error-univ')
    }

    if (nombre_rayon === 0 && univer_section > 0) {
        $('.slider-head').addClass('border-error-univ')
    }

    let type_boutique = null;
    if ($('#type-boutik-1').prop('checked') == true) {
        type_boutique = $('#type-boutik-1').val()
    }

    if ($('#type-boutik-2').prop('checked') == true) {
        type_boutique = $('#type-boutik-2').val()
    }
    // let x = e.clientX - e.target.offsetLeft;
    let y = e.clientY - e.target.offsetTop;
    let ripples = document.createElement('span');

    ripples.style.width = '1500px !important';
    ripples.style.height = '1500px !important';

    ripples.classList.add('btn-animate-bg-marchand')
    document.getElementById('infoboutique_persone').appendChild(ripples);
    setTimeout(() => {
        if ( !$("#nom-boutique").hasClass('input-error-warning-long') && !$('#univers_div_select').hasClass('border-error-univ') && !$('.slider-head').hasClass('border-error-univ') && type_boutique != null && fabriquant != undefined) {
            // processing infos
            var nom_boutique = $('#nom-boutique').val();

            var boutique_infos = {
                nom_boutique: nom_boutique,
                type_boutique: type_boutique,
                univers: tableau_univers,
                rayons: tableau_rayons,
                fabriquant: fabriquant,
                proprietaire: 1,
                _token: $('#token').val(),
                step: 5,
                type_activite: 3,
            }

            $.ajax({
            type:'POST',
            url:"vers-infos-perso",
            data: boutique_infos,
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            beforeSend: function(params) {
                ripples.remove()
                $('#sms_spiner-resend').addClass('spinner-border')
                $('#infoboutique_persone').find('.mbtn-text').css('display','none')
                $('#infoboutique_persone').addClass('resize-verifie-btn')
                $('#infoboutique_persone').addClass('block-btn')
                $('#infoboutique_persone').css('opacity','0.5')

                $('#boutiqueCancel').prop('disabled', true)
                $('#boutiqueCancel').addClass('img_bg')
                $('#boutiqueCancel').css('opacity','0.5');
            },
            success:function(response){
                window.location.href = "/marchand-verification-vendeur-privee"
            }
            });

        }else {
            console.log(type_boutique)
        }
        ripples.remove();
    }, 400)

}

    function saveMarchandBoutiqueOrganisation(event) {
        event.preventDefault();

        var nom_boutique = $('#nom-boutique').val();
        var upc = $('input[name="type_boutique"]:checked').val();
        var proprietaire = $('input[name="question_1"]:checked').val();
        var proprietaire_officiel = $('input[name="question_12"]:checked').val();

        var facturation = {
            nom_boutique: nom_boutique,
            upc: upc,
            proprietaire: proprietaire,
            proprietaire_officiel: proprietaire_officiel,
            _token: $('#token').val(),
            step: 5,
            rayons: tab_rayon,
            univers: tab_univer
        }

            $.ajax({
            type:'POST',
            url:"vers-infos-perso",
            data: facturation,
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            success:function(response){
                console.log(response)
                window.location.href = "/marchand-verification-organisation"
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
            }else {
                $(this).find('.bank-checkbox').prop('checked', true)
            }
        })

        // $('.active-rayon-zone').find(':checkbox').on('change', function() {
        //         console.log("bnjour ok ok")
        // })



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


        $('#nom-boutique').on('keyup', function(){

            let nom_boutique = $('#nom-boutique').val();
            if (nom_boutique === '') {
                $('#unavalable-boutik').addClass('b-none')
                $('#avalable-boutik').addClass('b-none')
            }else{
                $("#nom-boutique").removeClass('input-error-warning-long')
            }
           if (nom_boutique.length > 0) {
            $.ajax({
                method: 'GET',
                url: 'checkboutik_name',
                data: {nom_boutique: nom_boutique},
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                beforeSend: function () {
                    $('#boutique_spiner').addClass('spinner-border')
                    $('#boutique_spiner').css('border', '1px solid #9B9B9B;')
                },
                success: function(response) {

                    if (response.length > 0) {
                        $('#unavalable-boutik').removeClass('b-none')
                        $('#avalable-boutik').addClass('b-none')
                    }else {
                        $('#unavalable-boutik').addClass('b-none')
                        $('#avalable-boutik').removeClass('b-none')
                    }
                },

                complete: function () { // Set our complete callback, adding the .hidden class and hiding the spinner.
                    $('#boutique_spiner').removeClass('spinner-border')
                    $('#boutique_spiner').css('border', 'none')
                },
            })
           }else {
            $('#unavalable-boutik').addClass('b-none')
            $('#avalable-boutik').addClass('b-none')
           }
        })

    })
</script>

</body>
</html>
