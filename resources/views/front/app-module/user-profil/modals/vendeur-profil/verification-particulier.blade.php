
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
    border-right: 1px solid #9B9B9B;
    /* border-right: none; */
    padding-top: 2px;
    background-color: #F8F8F8;
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
    /* padding-left: 11px; */
    position: relative;
    top: 3px;
    left: -4.5px;
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
            /* background-color: #000; */
            margin-bottom: 20px;
        }

        .checkbox-content {
            height: 20px;
            width: 199px;
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
            padding-left: 18px;
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
            padding-left: 38px;

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
            height: 399px;
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
            /* background-color: #000; */
            margin-bottom: 20px;
        }

        .checkbox-content {
            height: 20px;
            width: 199px;
            /* background-color: green; */
            margin-top: 10px;
        }

        .input-verification {
            box-sizing: border-box;
            height: 41px;
            width: 294px;
            border: 1px solid #9B9B9B;
            border-radius: 6px;
            background-color: #D8D8D8;
            pointer-events: none;

            color: #4A4A4A;
            font-family: Roboto;
            font-size: 14px;
            font-weight: 500;
            letter-spacing: -0.34px;
            line-height: 15px;
        }

        .input-verification-open {
            box-sizing: border-box;
            height: 41px;
            width: 294px;
            border: 1px solid #9B9B9B;
            border-radius: 6px;
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
            margin-right: 12px;
        }

        .pass-link {
            /* min-width: 35%;color:white; font-family: Roboto; */
            font-size: 12px;
            font-weight: 500;
            letter-spacing: 0.26px;
            line-height: 12px;
            text-decoration: none;
            padding-left: 11px;
            position: relative;
            top: 3px;
            left: -1px;
        }

        .pass-link-1 {
            /* min-width: 35%;color:white; font-family: Roboto; */
            font-size: 12px;
            font-weight: 500;
            letter-spacing: 0.26px;
            line-height: 12px;
            text-decoration: none;
            padding-left: 11px;
            position: relative;
            top: 7px;
            left: -1px;
        }

        .pass-main {
            height: 31px;
            width: 141px;
            border-radius: 6px;
            background-color: #1A7EF5;
            position: relative;

        }

        .pass-holder-element {
            height: 31px;
            width: 137.5px;
            border-radius: 6px;
            background-color: #F8F8F8;
            position: relative;
            top: 4px;
            margin-right: 5px;
        }

        .element-doc1 {
            height: 31px;
            width: 141px;
            border-radius: 6px;
            background-color: #1A7EF5;
            margin-top: 3.5px;
            padding-top:5px;
            position: relative;
        }

        .middle-element-doc {
            height: 31px;
            width: 241px;
            border-radius: 6px;
            background-color: #F8F8F8 !important;
            margin-top: 4px;
            margin-left: 5px;
            margin-right: 5px;
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

    </style>

<style>

    .modal-dialog-verification {
        position: relative;
        top: 18%;
    }
    .modal-dialog-verification, .modal-content-verification {
        height: 429.5px;
        width: 452px;
        border-radius: 6px;
        background-color: #FFFFFF;
        box-shadow: 0 2px 6px 0 rgba(0,0,0,0.35);

    }

    .modal-dialog-verification-error {
        position: relative;
        top: 18%;
    }
    .modal-dialog-verification-error, .modal-content-verification-error {
        height: 332px;
        width: 429px;
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
        /* background-color: #ccc; */
    }

    .modal-footer-verification {
        height: 62px;
        width: 100%;
        /* background-color: green; */
    }

    .modal-body-verification {
        width: 100%;
        height: 303px;
    }

    .modal-body-verification-error {
        width: 100%;
        height: 201px;
    }

    .modal-verification-body-content {
        height: 255px;
        width: 422px;
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
        margin-top: 25px;
        margin-left: 62px;
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
        /* padding-top: 6px; */
    }

    .verification-cancel {
        box-sizing: border-box;
        height: 37px;
        width: 194px;
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
        width: 194px;
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

    .first-zone-verif {
        box-sizing: border-box;
        height: 233px !important;
        width: 633px;
        border: 1px solid #D8D8D8;
        border-radius: 6px;
        background-color: #FFFFFF;
        position: relative;
        left: 45px;
        padding-top: 15px;
    }

    .verification-boutique-detail2 {
        box-sizing: border-box;
        height: 167px;
        width: 633px;
        border: 1px solid #D8D8D8;
        border-radius: 6px;
        background-color: #FFFFFF;
        position: relative;
        left: 45px;
        padding-top: 15px;
    }

    #sms_spiner-resend {
        position: absolute;
        margin-left: -19px !important;
        margin-top: -12px !important;
    }

    .rectangle-input-2-1 {
        box-sizing: border-box;
        height: 41px;
        width: 100%;
        border: 1px solid #979797;
        border-radius: 6px;
        color: #4A4A4A;
        font-family: Roboto;
        font-size: 14px;
        letter-spacing: -0.34px;
        line-height: 16px;
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

                                    <div class="rectangle-panel-button success">

                                    <div class="panel-button-icon success">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-check-circle-fill" viewBox="0 0 16 16">
                                    <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z"/>
                                    </svg>              </div>

                                        <div class="panel-button-text">Facturation</div>
                                    </div>
                                    <div class="rectangle-panel-button success">

                                                <div class="panel-button-icon success">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-check-circle-fill" viewBox="0 0 16 16">
                                <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z"/>
                                </svg>              </div>
                                        <div class="panel-button-text">Boutique</div>
                                    </div>
                                    <div class="rectangle-panel-button active">
                                        <div class="panel-button-icon  active   rounded-circle" style="background-color:#1A7EF5; text-align:center; padding:5%">
                                            <p class="step-number-marchand">4</p>
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
                                {{-- <div class="d-flex justify-content-center text-infos">Informations commerciales pour {{$_SESSION['prenom']['2']}} </div> --}}
                                <div class="d-flex justify-content-center text-infos- custom-text-infos">Vérification de l’identité </div>
                            </div>

                                {{-- premier box --}}
                                <div class="box-1-facturation" style="margin-top: 30px;">

                                    <div class="label-el" style="margin-left: 45px; margin-top:10px" >Récapitulatif des informations du vendeur</div>
                                   <div class="verification-boutique-detail">

                                    <div class="first-zone-verif">
                                        <div style=" height: 60px; width: 603px;position: relative; margin-left: auto; margin-right: auto; display: flex; margin-bottom: 10px">
                                            <div class="box-input1" style=" width: 294px;">
                                                <div class="label-el">Prénom & Nom</div>
                                                <input type="text" style="padding-left: 10px" class="input-verification" value="{{$_SESSION['prenom'][0]}} {{$_SESSION['prenom'][1]}} {{$_SESSION['prenom'][2]}}" id="ville-particulier" placeholder="Ville">
                                            </div>

                                            <div class="box-input1" style="margin-left: 15px; width: 294px;">
                                                <div class="label-el">Date de naissance</div>
                                                <input type="text" style="padding-left: 10px" class="input-verification" value="{{$_SESSION['info_person']['date_naissance']}}" id="adresse-particulier" placeholder="Adresse">
                                            </div>
                                        </div>

                                        <div style=" height: 60px; width: 603px;position: relative; margin-left: auto; margin-right: auto; display: flex; margin-bottom: 10px">
                                            <div class="box-input1" style="width: 294px;">
                                                <div class="label-el">Pays de naissance</div>
                                                <input type="text" style="padding-left: 10px" class="input-verification" value="{{$_SESSION['info_person']['pay_naissance']}}" id="ville-particulier" placeholder="Ville">
                                            </div>

                                            <div class="box-input1" style="margin-left: 15px; width: 294px;">
                                                <div class="label-el">Pays de citoyenneté</div>
                                                <input type="text" style="padding-left: 10px" class="input-verification" value="{{$_SESSION['info_person']['pays_citoyennete']}}" id="adresse-particulier" placeholder="Adresse">
                                            </div>
                                        </div>

                                        <div style=" height: 60px; width: 603px;position: relative; margin-left: auto; margin-right: auto; display: flex; margin-bottom: 1px">
                                            <div class="box-input1" style=" width: 294px;">
                                                <div class="label-el">Données d’identité</div>
                                                <input type="text" style="padding-left: 10px" class="input-verification" value="@if(isset($_SESSION['info_person']['piecie_identite_type']) && $_SESSION['info_person']['piecie_identite_type'] == "Carte national d'identité") #CNI :  {{$_SESSION['info_person']['numero_piece']}} / Exp: {{$_SESSION['info_person']['date_expiration']}} @else # {{$_SESSION['info_person']['piecie_identite_type']}} :  {{$_SESSION['info_person']['numero_piece']}} / Exp: {{$_SESSION['info_person']['date_expiration']}} @endif" id="ville-particulier" placeholder="Ville">
                                            </div>

                                            <div class="box-input1" style="margin-left: 15px; width: 294px;">
                                                <div class="label-el"><small style="font-size: 16px; color: red; position: relative; top: 3px">*</small>CNI/Passeport</div>
                                                <div style="padding-left: 5px; padding-right: 5px; display: flex" class="input-verification-open">

                                                    <div class="pass-holder-element">
                                                        <span id="pieceIdentitePreview" style="font-size: 14px; position: relative; left:5px; top: 2px"> </span>
                                                    </div>

                                                    <div style="position: relative; top: 3.5px">
                                                        <article style="" class="pass-main">

                                                            <a href="#" style="" class="envoyer-un-sms pass-link" id="chargerDocument">Charger un document</a>
                                                            <input id="myPassCni" type="file" style="visibility: hidden" name='files[]' onchange="chargementDocumentChanged()" multiple />
                                                        </article>
                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    {{-- debut zone checkbox  --}}

                                    <!-- deuxieme zone  -->
                                    <div class="label-el" style="margin-left: 45px; margin-top:20px" >Récapitulatif des informations de la boutique</div>
                                <div class="verification-boutique-detail2" style="">

                                <div style=" height: 60px; width: 603px;position: relative; margin-left: auto; margin-right: auto; display: flex; margin-bottom: 15px">
                            <div class="box-input1" style="width: 294px;">
                                <div class="label-el">Nom commercial</div>
                                <input type="text" style="padding-left: 10px" value="{{$_SESSION['boutique_particulier']['nom_boutique']}}" class="input-verification" id="ville-particulier" placeholder="Ville">
                            </div>

                            <div class="box-input1" style="margin-left: 15px; width: 294px;">
                                <div class="label-el">Adresse de l’entreprise</div>
                                <input type="text" style="padding-left: 10px" value="{{$_SESSION['info_person']['adresse_pays_particulier']}}, {{$_SESSION['info_person']['adresse_province']}}, {{$_SESSION['info_person']['adresse_ville']}}, {{$_SESSION['info_person']['adresse_fixe']}}, {{$_SESSION['info_person']['code_postal_particulier']}},  {{$_SESSION['info_person']['adresse_complement']}}" class="input-verification" id="adresse-particulier" placeholder="Adresse">
                            </div>

                        </div>

                            <div class="form-fields" style="margin-top: 15px; margin-left: 13px; ">
                                <div class="label-el"><small style="font-size: 16px; color: red; position: relative; top: 3px">*</small>Justificatif d'identité</div>
                                <div class="d-flex rectangle-input-2-1" style="width: 605px;">
                                    <div>
                                        <select class="rectangle-input-disable-2-p-0 cni-select" id="piece-identite-typed" style="">
                                            <option value="">Relevé de compte bancaire</option>
                                            <option value="cni">Relever de carte de crédit</option>
                                            <option value="passport">Contrat de bail</option>
                                            <option value="passport">Certificat de résidence</option>
                                        </select>
                                    </div>

                                    <div class="middle-element-doc" style="">
                                        <span id="pieceRelevePreview" style="font-size: 14px; position: relative; left:5px; top: 9px; width: 241px !important;"> </span>
                                    </div>

                                    <div style="position: relative; top: 3.5px">
                                        <article style="" class="pass-main">
                                            <a href="#" style="" class="envoyer-un-sms pass-link-1" id="chargerReleveBancaire">Charger un document</a>
                                            <input id="myReleveBancaire" type="file" style="visibility: hidden" name='files[]' onchange="chargementReleveChanged()" multiple />
                                        </article>

                                            {{-- <a href="#" style="" class="envoyer-un-sms pass-link" >Charger un document</a> --}}

                                    </div>

                                </div>
                            </div><br>

                            {{-- <div class="col-8">
                                <input type="text" style=" padding-left: 15px;" class="input-neutre in-style line-height-16" >
                            </div> --}}
                        </div>
                        </div>
                    </div>

                            {{-- <label for="adrr">Adresse de l’entreprise</label> --}}
                        </div>
                    </form>

                </div>
            </div>
            {{-- debut foire aux question  --}}
            <div class="foire-aux-question" style="position: relative; left: 15px; width: 472.5px !important">
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


            <div class="modal modal-verification" tabindex="-1" role="dialog" id="modalVerification">
                <div class="modal-dialog modal-dialog-verification" role="document">
                  <div class="modal-content modal-content-verification">
                    <div class="modal-headerh modal-header-verification" style="border-bottom: 1px solid #ccc">
                      <div class="modal-verification-header" >
                        Instructions pour la documentation
                      </div>
                    </div>
                    <div class="modal-body modal-body-verification">
                      <div class="modal-verification-body-content">
                        • Les informations figurant sur le document doivent correspondre à celles que vous avez fournies.<br/><br/>
                        • Numériser le document original en couleur ou prenez une photo avec votre téléphone portable. Ne pas soumette d’impression d’écran.<br/><br/>
                        • L’image du document doit être de haute qualité, colorée et irréprochable. L’image doit afficher une page de document entière ou, s’il s’agit d’une carte d’identité nationale, les deux faces de la carte.<br/><br/>
                        • Votre document doit être rédigé dans la langues utilisée pour compléter votre inscription. S’il n’est pas dans l’une des proposées par TOULÈ Market, fournissez une traduction certifiée du document dans l’une de ces langues prises en charge.<br/><br/>
                        • La taille du document doit être inférieure à 20 Mo<br/><br/>
                        • Les formats acceptés sont *.png, *.tiff, *.tif, *.jpg, *.jpeg, et *.pdf <br/>
                      </div>
                    </div>

                    <div class="modal-footer-verification">
                        <div style="display: flex; justify-content: center; align-items: center">
                            <button onclick="document.getElementById('myPassCni').click()" type="button" class="verification-suivant" data-dismiss="modal">OK! J'ai compris</button>
                        </div>
                    </div>

                  </div>
                </div>
              </div>
              {{-- -------------------modal fin-------------------- --}}

              <div class="modal modal-verification" tabindex="-1" role="dialog" id="modalVerificationIdentite">
                <div class="modal-dialog modal-dialog-verification" role="document">
                  <div class="modal-content modal-content-verification">

                    <div class="modal-headerh modal-header-verification" style="border-bottom: 1px solid #ccc">
                      <div class="modal-verification-header" >
                        Instructions pour la documentation
                      </div>
                    </div>

                    <div class="modal-body modal-body-verification">
                      <div class="modal-verification-body-content">
                        • Les informations figurant sur le document doivent correspondre à celles que vous avez fournies.<br/><br/>
                        • Numériser le document original en couleur ou prenez une photo avec votre téléphone portable. Ne pas soumette d’impression d’écran.<br/><br/>
                        • L’image du document doit être de haute qualité, colorée et irréprochable. L’image doit afficher une page de document entière ou, s’il s’agit d’une carte d’identité nationale, les deux faces de la carte.<br/><br/>
                        • Votre document doit être rédigé dans la langues utilisée pour compléter votre inscription. S’il n’est pas dans l’une des proposées par TOULÈ Market, fournissez une traduction certifiée du document dans l’une de ces langues prises en charge.<br/><br/>
                        • La taille du document doit être inférieure à 20 Mo<br/><br/>
                        • Les formats acceptés sont *.png, *.tiff, *.tif, *.jpg, *.jpeg, et *.pdf <br/>
                      </div>
                    </div>

                    <div class="modal-footer-verification">
                        <div style="display: flex; justify-content: center; align-items: center">
                            <button onclick="document.getElementById('myReleveBancaire').click()" type="button" class="verification-suivant" data-dismiss="modal">OK! J'ai compris</button>
                        </div>
                    </div>

                  </div>
                </div>
              </div>


            {{-- -------------------modal fin-------------------- --}}

            <div class="modal modal-verification" tabindex="-1" role="dialog" id="modalVerificationError">
                <div class="modal-dialog modal-dialog-verification-error" role="document" >
                    <div class="modal-contentD modal-content-verification-error" >

                        <div class="modal-headerh modal-header-verification-error" style="border-bottom: 1px solid #ccc">
                        <div class="modal-verification-header-error" >
                            <img src="/assets/images/icones-vendeurs2/Cancel.svg" style="position: absolute; margin-left: -30px; margin-top: -2px"> ERREUR DE D’ENVOIE DE FORMULAIRE
                        </div>
                    </div>

                    <div class="modal-bodys modal-body-verification-error" >

                        <div class="modal-verification-body-content-error" style="height: 72px; width: 308px; left: 60px">
                            <div class="error-titre-verification">L'information fournie doit être corrigée.</div>
                             <div class="text-error-content">
                                Impossible de vérifier votre document.<br>
                                Veuillez soumettre une nouvelle copie de votre
                                document et assurez-vous qu’il est conforme à
                                nos recommandations générales.
                             </div>
                        </div>

                    </div>
                    <button onclick="document.getElementById('myReleveBancaire').click()" type="button" class="verification-suivant" style="margin-left: 118px;position: relative; top: -25px; height: 37px !important" data-dismiss="modal">Modifier</button>
                    </div>
                </div>
                </div>
        {{-- -------------------modal fin-------------------- --}}

    </div>
</div>

        </div>
    </div>

    <div style="height: 81px; background-color: transparent; position: relative; top: -120px; width: 100%; padding-right: 400px">
        <div class="d-flex justify-content-center">
            <div class="bottom-divd" style="display: flex; margin-top: 15px; background-color: #fff; padding: 0px 80px 0px 80px">
                <div class="group-3">
                    <button type="submit" class="group3 bouton-annuler1" style="" onclick="retour(event)" id="soumettreCancelBtn">
                        <span class="mbtn-text"><a style="text-decoration: none" href="/marchand-boutique-particulier">Retour</a></span>
                    </button>
                        <button id="soumettreBtn" type="submit" class="group3 suivantBtn img_bg" disabled style="" onclick="saveMarchandVerificationParticulier(event)" >
                        <span class="mbtn-text">Soumettre</span>
                        <span class="spinner-borderj" id="sms_spiner-resend"role="status" aria-hidden="true"></span>
                    </button>
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

    let instruction_flag = false;
    let instruction_flag_bancaire = false;

    function saveMarchandVerificationParticulier(e) {
        event.preventDefault();
        let x = e.clientX - e.target.offsetLeft;
        let y = e.clientY - e.target.offsetTop;
        let ripples = document.createElement('span');

        var formData = new FormData();  // formData instance
        var cni_password = $('#myPassCni')[0].files; // file2
        var releve_bancaire = $('#myReleveBancaire')[0].files

        var _token = $('#token').val()
            // Append data
        formData.append('pass_cni',cni_password[0]);
        formData.append('releve_bancaire', releve_bancaire[0])
        formData.append('_token', _token);
        formData.append('type_activite', 1);
        formData.append('step', 5);

        ripples.style.width = '1500px !important';
        ripples.style.height = '1500px !important';

        ripples.classList.add('btn-animate-bg-marchand')
        document.getElementById('soumettreBtn').appendChild(ripples);

        $.ajax({
                type:'POST',
                url:"vers-infos-perso",
                data: formData,
                contentType: false,
                processData: false,

                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                beforeSend: function(params) {
                    ripples.remove()
                    $('#sms_spiner-resend').addClass('spinner-border')
                    $('#soumettreBtn').find('.mbtn-text').css('display','none')
                    $('#soumettreBtn').addClass('resize-verifie-btn')
                    $('#soumettreBtn').addClass('block-btn')
                    $('#soumettreBtn').css('opacity','0.5')

                    $('#soumettreCancelBtn').prop('disabled', true)
                    $('#soumettreCancelBtn').addClass('img_bg')
                    $('#soumettreCancelBtn').css('opacity','0.5');
                },

            success:function(response){
                if (response === 'mail error') {
                    $('#modalVerificationError').modal('show')
                }

                if(response === 'une erreur s est produit'){
                    $('#modalVerificationError').modal('show')
                }
                if (response == "success") {
                    setTimeout(() => {
                        ripples.remove();
                        window.location.href = "/marchand-envoie-formulaire"
                    }, 400);
                    console.log("Votre resultat est:", response)
                }else if(response == "tropgrand"){
                    $('#modalVerificationError').modal('show')
                }
            },
            complete: function() {
                $('#sms_spiner-resend').removeClass('spinner-border')
                $('#soumettreBtn').find('.mbtn-text').css('display','block')
                $('#soumettreBtn').removeClass('resize-verifie-btn')
                $('#soumettreBtn').removeClass('block-btn')
                $('#soumettreBtn').css('opacity','1')

                $('#soumettreCancelBtn').prop('disabled', false)
                $('#soumettreCancelBtn').removeClass('img_bg')
                $('#soumettreCancelBtn').css('opacity','1');
            }
        });
    }

    function chargementDocumentChanged() {

        let accepted_format = ["png", "tiff", "tif", "jpg", "jpeg", "pdf"]
        // declaration de deux variables
        let document_identite = $('#myPassCni').get(0).files[0]['name'];

        let document_identite_btn = $('#myPassCni').get(0).files[0];
        let document_identite_tout_btn = $('#myReleveBancaire').get(0).files[0];

        let document_identite_tout = $('#myPassCni').get(0).files[0];
        let document_extention = document_identite.split(".")[1]
        let document_title = document_identite.split(".")[0]
        let chaine_caractere;

        if (accepted_format.includes(document_extention)) {
            console.log('OK format accepté')
        }else {
            console.log('sory le format n\est pas accepté')
        }

        if (document_title.length > 20) {

            let intermediate = document_title.length -7;

            chaine_caractere = document_title.substring(0, 5)+'...'+document_title.substring(intermediate, document_title.length)+'.'+document_extention;
        }else{
            chaine_caractere = document_title+'.'+document_extention
        }

        $('#pieceIdentitePreview').text(chaine_caractere)
}

function chargementReleveChanged() {
    let document_identite = $('#myReleveBancaire').get(0).files[0]['name'];
        let document_identite_tout = $('#myReleveBancaire').get(0).files[0];
        let document_extention = document_identite.split(".")[1]
        let document_title = document_identite.split(".")[0]

        let accepted_format = ["png", "tiff", "tif", "jpg", "jpeg", "pdf"]

        if (accepted_format.includes(document_extention)) {
            console.log('OK format accepté')
        }else {
            console.log('sory le format n\est pas accepté')
        }

        // declaration des deux variables pour desactiver le bouton
        let document_identite_btn = $('#myPassCni').get(0).files[0];
        let document_identite_tout_btn = $('#myReleveBancaire').get(0).files[0];

        console.log('les deux variable son', document_identite_btn, 'et autre nom:', document_identite_tout_btn)

        if (document_identite_btn !="undefined" && document_identite_tout_btn !="undefined") {
            console.log('ok  tout est remplie')
            $("#soumettreBtn").removeClass('img_bg')
            $("#soumettreBtn").prop('disabled', false)
        }

        let chaine_caractere;

        let char_no_space = document_title.trim();
        if (char_no_space.length > 30) {
            let intermediate = document_title.length -16;

            chaine_caractere = document_title.substring(0, 10)+'...'+document_title.substring(intermediate, document_title.length)+'.'+document_extention;
        }else{
            console.log('voici la taille au delà de inferieur à 40:', document_title.length)
            chaine_caractere = document_title+'.'+document_extention
        }
        $('#pieceRelevePreview').text(chaine_caractere)
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

        // $('#modalVerificationError').modal('show')

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


        $('#chargerDocument').on('click', function() {
            if (!instruction_flag) {
                $('#modalVerification').modal('show')
            }else {
                document.getElementById('myPassCni').click()
            }
        })

        $('#chargerReleveBancaire').on('click', function() {
            if (!instruction_flag_bancaire) {
                $('#modalVerificationIdentite').modal('show')
            }else{
                document.getElementById('myReleveBancaire').click()
            }

        })

        // fermeture du modal identité
        $('#myPassCni').on('click', function() {
            $('#modalVerification').modal('hide')
            instruction_flag = true;
        })

        // fermeture du modal releve bancaire
        $('#myReleveBancaire').on('click', function() {
            $('#modalVerificationIdentite').modal('hide')
            instruction_flag_bancaire = true;
        })

    })
</script>

</body>
</html>
