<?php
    if (Auth::user()){
        // liste des carnets d'adresse
        $carnets= \App\Models\CarnetAdresse::getCarnetByUser();
    }
?>

<style>
    .div-prinipal-profil-mes-adress{
        box-sizing: border-box;
        height: 76px;
        width: 820px;
        /*border: 1px solid #D8D8D8;*/
        border-radius: 6px 6px 0 0;
        background-color: #FFFFFF;
        border: none;
        border-bottom: 1px solid rgb(216, 216, 216);
        padding-right: 35.5px;
    }
    .entete-adresse-1{
        height: 56px;
        width: 511px;
        color: #4A4A4A;
        font-family: Roboto;
        font-size: 14px;
        font-weight: 300;
        letter-spacing: -0.48px;
        line-height: 16px;
        margin-top: 10px;
    }

    .button-entete-adresse{
        height: 40px;
        width: 277px;
        border-radius: 6px;
        background-color: #1A7EF5;
        margin-top: 18px;
        padding-top: 3px;
        border: none;

    }

    .button-entete-adresse:hover {
        color: #FFFFFF;
        background-color: #146FDA;
    }

    .button-entete-adresse:active {
        /* background: #2C3EDD radial-gradient(circle, transparent 1%, #1A7EF5 1%) center/15000%; */
        background-color: #2C3EDD !important;
    }

    .nouvelle-adresse-text-profil-user{
        height: 20px;
        width: 178px;
        color: #FFFFFF;
        font-family: Roboto;
        margin-top: 10px;
        font-size: 14px;
        font-weight: 500;
        letter-spacing: -0.34px;
        line-height: 18px;
    }
    .text-gerer-carnet-adresse{
        height: 24px;
        width: 511px;
        color: #191970;
        font-family: Roboto;
        font-size: 20px;
        font-weight: 500;
        letter-spacing: -0.48px;
        line-height: 22px;
        margin-top: 10px;
        margin-left: 30px;
    }

    .text-carnet-adresse-profil-paragraph{
        height: 32px;

        color: #4A4A4A;
        font-family: Roboto;
        font-size: 14px;
        font-weight: 300;
        letter-spacing: -0.48px;
        line-height: 16px;
        margin-left: 30px;
    }

    .img1-carnet-adresse{
        height: 322px;
        width: 322px;
        margin: auto;
        margin-top: 38px;

    }
    .vous-navez-pas-dad {
        height: 15px;
        width: 226px;
        color: #4A4A4A;
        font-family: Roboto;
        font-size: 13px;
        font-weight: 500;
        letter-spacing: -0.31px;
        line-height: 14px;
        margin: auto;
        margin-top: 91px;
    }

    .desable-add-adresse {
        pointer-events: none;
        background-color: #9B9B9B !important;
    }

</style>

<style type="text/css">
        @import url('https://fonts.googleapis.com/css2?family=Gelasio:ital@1&family=Licorice&family=Noto+Sans&family=Roboto:wght@300;400&family=Tajawal:wght@300&display=swap');

        /* .modal-dialog {
            position: relative;
        }

        .modal-content {
            width: 1212px;
            height: 579px;
            position: relative;
            margin-left: -350px;
        }

        .modal-content ,.modal-body {
            width: 1212px;
            height: 579px;
        } */

        .row-contanier {
            width: 1212px;
            height: 579px;
            position: relative;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .col-left {
            height: 579px;
            width: 320px;
            /* margin-top: 5px; */
        }

        .row-right {
            height: 579px;
            width: 859px;
            margin-right: 5px;
        }

        .profil-card {
            box-sizing: border-box;
            height: 79px;
            width: 320px;
            border: 1px solid #D8D8D8;
            border-radius: 7px 6px 6px 7px;
            background-color: #FFFFFF;
            display: flex;
            justify-content: flex-start;
            align-items: center;
            margin-left: 5px;
            margin-top: 5px;
        }

        /* .photo-profil {
            box-sizing: border-box;
            height: 79px;
            width: 79px;
            border: 1px solid #1A7EF5;
            border-radius: 6px;
            margin-right: 20px;
            box-sizing: border-box;
            background-color: #D8D8D8;
        } */

        .user-infos {
            height: 71px;
            width: 201px;
            color: #191970;
            font-family: Roboto;

            font-weight: 500;
            letter-spacing: -0.51px;
            line-height: 23px;
        }

        .user-phrase-appel {
            width: 205px;
            color: #191970;
            font-family: Roboto;
            font-size: 21px;
            font-weight: 500;
            letter-spacing: -0.51px;
            line-height: 24px;
        }

        .user-name {
            width: 205px;
            color: #191970;
            font-family: Roboto;
            font-size: 21px;
            font-weight: 700;
            letter-spacing: -0.51px;
            line-height: 24px;
        }

        .user-ref {
            color: #191970;
            font-family: Roboto;
            font-size: 14px;
            font-weight: 300;
            letter-spacing: 0;
            line-height: 16px;
        }

        .user-infos h6 {
            margin: 0px;
            padding: 0px !important;
        }

        .icon-element {
            position: absolute;
            margin-left: 9.5px;
            /* top: 54px; */
        }

        .profil-icon-1 {
            height: 18px;
            width: 18px;
            margin-right: 23px;
        }

        .profil-icon-2 {
            height: 18px;
            width: 18px;
        }

        .section-2-contanier {
            box-sizing: border-box;
            height: 473px;
            width: 320px;
            border: 1px solid #D8D8D8;
            border-radius: 6px;
            background-color: #FFFFFF;
            display: flex;
            justify-content: center;
            align-items: center;
            margin-left: 5px;
        }

        .card-section {
            height: 433px;
            width: 280px;
        }

        .card .card-header {
            box-sizing: border-box;
            height: 30px;
            width: 280px;
            border: 1px solid #9B9B9B;
            border-radius: 6px 6px 0 0;
            background-color: #9B9B9B;

            color: #FFFFFF;
            font-family: Roboto;
            font-size: 14px;
            font-weight: 500;
            letter-spacing: 0;
            line-height: 16px;
        }

        .card ul li {
            height: 30px;
            width: 280px;
            color: #4A4A4A;
            font-family: Roboto;
            font-size: 14px;
            font-weight: 500;
            letter-spacing: 0;
            line-height: 16px;
        }

        .card-1 {

        }

        .menu-section {
            box-sizing: border-box;
            height: 34px;
            /* width: 858px; */
            border: 1px solid #D8D8D8;
            border-radius: 6px;
            margin-top: 5px;
        }

        .navbar {
            box-sizing: border-box;
            height: 34px;
            width: 857px;
            border: 1px solid #D8D8D8;
            border-radius: 6px;
            background-color: #1A7EF5;
            margin-top: 5px;

        }

        .navbar .breadcrumb {
            margin-top: 12px;
            margin-left: 30.5px;
        }

        nav ol li {
            font-family: Roboto;
            font-size: 10px;
            letter-spacing: -0.24px;
            line-height: 11px;
        }

        .section-droite-1 {
            box-sizing: border-box;
            height: 524px;
            width: 857px;
            border: 1px solid #D8D8D8;
            border-radius: 6px;
            display: flex;
            flex-direction: column;
            justify-content: flex-start;
            align-items: flex-start;

        }

        .section-button {
            display: flex;
            justify-content: flex-start;
            align-items: flex-start;
            position: relative;
            left: -1px;
        }

        .button-general {
            box-sizing: border-box;
            height: 37px;
            width: 422px;
            border: 1px solid #1A7EF5;
            border-radius: 6px;
            margin-left: 5px;
            background-color: #FFFFFF;
            margin-right: 3px;

            display: flex;
            justify-content: center;
            align-items: center;
        }

        .button-general span {
            color: #191970;
            font-family: Roboto;
            font-size: 16px;
            font-weight: 500;
            letter-spacing: -0.39px;
            line-height: 17px;
        }

        .button-connexion {
            box-sizing: border-box;
            height: 37px;
            width: 422px;
            border: 1px solid #9B9B9B;
            border-radius: 6px;
            background-color: #D8D8D8;

            display: flex;
            justify-content: center;
            align-items: center;
        }

        .button-connexion span {
            color: #4A4A4A;
            font-family: Roboto;
            font-size: 16px;
            font-weight: 500;
            letter-spacing: -0.39px;
            line-height: 17px;
        }

        .section-title {
            color: #191970;
            font-family: Roboto;
            font-size: 15px;
            font-weight: 500;
            letter-spacing: -0.36px;
            line-height: 17px;
            position: relative;
            left: 15px;
            margin-top: 30px;
        }

        .form-section {
            display: flex;
            justify-content: center;
            align-items: center;
            position: relative;
            left: 15px;
        }

        .form-left {
            height: auto;
            width: 402px;
        }

        .form-right {
            height: auto;
            width: 402px;
        }

        .checkbox-section {
            box-sizing: border-box;
            height: 41px;
            width: 194px;
            border: 1px solid #9B9B9B;
            border-radius: 6px;
            background-color: #FFFFFF;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .input-element {
            box-sizing: border-box;
            height: 41px;
            width: 194px;
            border: 1px solid #9B9B9B;
            border-radius: 6px;
            background-color: #F8F8F8;
        }

        .input-element-lg {
            box-sizing: border-box;
            height: 41px;
            width: 402px;
            border: 1px solid #9B9B9B;
            border-radius: 6px;
            background-color: #F8F8F8;
        }

         .img-bottom-address {
            height: 163.95px;
            width: 780px;
            position: absolute;
            bottom: 6px;
            background-image: url('/uploads/avatars/back_picture_addresse.webp');
            background-position:center bottom;
            background-size:contain;
            z-index: 1;
            background-repeat: no-repeat;
        }

        .input-group-text {
            box-sizing: border-box;
            height: 41px;
            width: 41px;
            border: 1px solid #9B9B9B;
            border-radius: 6px 0 0 6px;
            background-color: #F8F8F8;
        }

        .input-group-text img{
            height: 19px !important;
            width: 19px !important;
            height: inherit;
            width: inherit;
            position: relative;
            left: -2px;
        }

        .over-flow-gradient {
            height: 33px;
            width: 79px;
            border-radius: 0 0 6px 6px;
            background: linear-gradient(180deg, rgba(0,0,0,0) 0%, #191970 100%);
            position:absolute;
            top: 50px;
            z-index: 999;
        }

        .fas, .svg1 {
            color: #FFFFFF;
            z-index: 61000;
        }

        .last-button {
            position: relative;
            float: right;
            right: -600px;
        }

        .last-button button {
            height: 37px;
            width: 194px;
            border: none;
            border-radius: 6px;
            background-color: #9B9B9B;

            color: #FFFFFF;
            font-family: Roboto;
            font-size: 16px;
            font-weight: 500;
            letter-spacing: 0.35px;
            line-height: 18px;
            text-align: center;
        }

        .badge {
            height: 20px;
            width: 26px;
            border-radius: 5px;
            background-color: #D0021B;
            position: absolute;
            float: right;
            right: 20px;
            top: 3px;
        }

        .list-group .list-group-item:hover{
            cursor: pointer;
            box-sizing: border-box;
            height: 30px;
            width: 280px;
            border: 1px solid #D0021B;
            border-left: 5px solid #D0021B;
            background-color: #F5F5F5;
            color: #191970;

            font-family: Roboto;
            font-size: 14px;
            font-weight: 500;
            letter-spacing: 0;
            line-height: 16px;
        }

        .check1 input {
            height: 20px;
            width: 20px;
            position: relative;
            top: 10.5px
        }

        .check1 label {
            color: #9B9B9B;
            font-family: Roboto;
            font-size: 15px;
            font-weight: 500;
            letter-spacing: -0.36px;
            line-height: 16px;
            position: relative;
            top: 6.5px;
            margin-left: 10px;
        }

        .active-element {
            cursor: pointer;
            box-sizing: border-box;
            height: 30px;
            width: 280px;
            border: 1px solid #D0021B;
            border-left: 5px solid #D0021B;
            background-color: #F5F5F5;
            color: #191970;

            font-family: Roboto;
            font-size: 14px;
            font-weight: 500;
            letter-spacing: 0;
            line-height: 16px;
        }

        .list-group {
            border: none;
        }

        .card{
            border: none;
        }

        .form-check-label {
            margin-right: 2px
        }

        .separator-sexe {
            position:absolute;
            float: left;
            margin-left: 96.5px;
            /* right: 9px; */
            box-sizing: border-box;
            height: 39px;
            width: 0.5px;
            border: 0.5px solid #9B9B9B;
        }

        .text-pass, .text-connexion {
            height: 18px;
            width: 225px;
            color: #191970;
            font-family: Roboto;
            font-size: 15px;
            font-weight: 500;
            letter-spacing: -0.36px;
            line-height: 18px;
        }

        .active-blue {
            box-sizing: border-box;
            height: 37px;
            width: 422px;
            border: 1px solid #1A7EF5 !important;
            color: #191970 !important;
            border-radius: 6px;
            background-color: #FFFFFF !important;
        }

        .active-gray {
            box-sizing: border-box;
            height: 37px;
            width: 422px;
            color: #4A4A4A !important;
            border: 1px solid #9B9B9B !important;
            border-radius: 6px;
            background-color: #D8D8D8 !important;
        }

        .success-message {
            height: 32px;
            width: 825px;
            border-radius: 6px;
            background-color: #00B517;
            float: bottom;
            bottom: 10px;
            z-index: 999;
            position: absolute;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .success-message span {
            height: 18px;
            width: 169px;
            color: #FFFFFF;
            font-family: Roboto;
            font-size: 16px;
            font-weight: 500;
            letter-spacing: -0.11px;
            line-height: 18px;
            text-align: center;
        }

        .text-carnet {
            height: 24px;
            width: 511px;
            color: #191970;
            font-family: Roboto;
            font-size: 20px;
            font-weight: 600;
            letter-spacing: -0.48px;
            line-height: 24px;
            position: relative;
            top: 10px;
            left: 20px;
        }

        .text-carnet h4{
            color: #191970;
            font-family: Roboto;
            font-size: 20px;
            font-weight: 600;
            letter-spacing: -0.48px;
        }

        .section-droite-1  p{
            height: 32px;
            width: 450px;
            color: #4A4A4A;
            font-family: Roboto;
            font-size: 14px;
            font-weight: 300;
            letter-spacing: -0.48px;
            line-height: 16px;
        }

        .row-carnet {
            box-sizing: border-box;
            height: 76px;
            width: 857px;
            border: 1px solid #D8D8D8;
            position: relative;
            left: -1px;
            top: -5.3px;
            border-radius: 6px 6px 0 0;
            background-color: #FFFFFF;
            display: flex;
        }

        .btn-carnet {
            height: 37px;
            width: 267px;
            border-radius: 6px;
            background-color: #1A7EF5;

            color: #FFFFFF;
            font-family: Roboto;
            font-size: 14px;
            font-weight: 500;
            letter-spacing: -0.34px;
            line-height: 18px;
            border: none;
            position: absolute;
            top: 19.5px;
            float: right;
            right: 20px;

        }

        .carnet-description p {
            position: relative;
            left: 20px;
        }

        .carnet-middle {
            display: flex;
            justify-content: center;
            align-items: center;
            position: relative;
            margin-left: auto;
            margin-right: auto;
            top: 95.78px;

            color: #4A4A4A;
            font-family: Roboto;
            font-size: 13px;
            font-weight: 500;
            letter-spacing: -0.31px;
            line-height: 15px;
        }

    </style>

<div id="mes-adresses" class="donnees-menu-profil" style="display: none">

    <div class="d-flex div-prinipal-profil-mes-adress" style="margin: auto">
        <div>
            <div class="text-gerer-carnet-adresse">
                <span >Gérer le carnet d'adresses</span>
            </div>
            <div class="text-carnet-adresse-profil-paragraph">
                <p >pour un règlement plus rapide, utilisez votre carnet d'adresses pour stoker en <br> toute séurité
                    les adresses d'expédition et de faturation de votre commande</p>
            </div>
        </div>

        <div style="width: 50%">
            <button data-id="#add-carnet-adresse" id="addAdress" class="my-data-adresse button-entete-adresse na">
                <span class="nouvelle-adresse-text-profil-user">
                <img style="margin-right: 15px;" src="{{  asset('assets/images/plus-arnet-adresse-profil.svg') }}">
                    Ajouter une nouvelle adresse</span>
            </button>
        </div>
    </div>

   {{-- @if ($carnets->count() <= 0)
        @include('front.app-module.user-profil.modals.components.generale.liste-carnet-adresse-vide')
    @endif --}}
    @include('front.app-module.user-profil.modals.components.generale.add-carnet-adresse')
    @include('front.app-module.user-profil.modals.components.generale.liste-carnet-adresse')



</div>

<script>

        jQuery(document).ready(function () {

            $(document).on('click', '#addAdress', function () {
                $('#addAdress').addClass('desable-add-adresse')
                console.log('Add Adresse --->')
                $('.as').removeClass('hide');
                $('.ls').addClass('hide');
                console.log('mes addresse')

                $('#addCarnet').removeClass('hide');
                $('#modifCarnet').addClass('hide');

          });

        });



</script>
