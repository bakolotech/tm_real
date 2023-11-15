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
</style>

<style type="text/css">
        @import url('https://fonts.googleapis.com/css2?family=Gelasio:ital@1&family=Licorice&family=Noto+Sans&family=Roboto:wght@300;400&family=Tajawal:wght@300&display=swap');

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

        .commande-rows:hover {
            cursor: pointer;
        }

        .commande-rows-cover {
            height: 100px;
            width: 600px;
            background-color: #4A4A4A;
            position: relative;
        }
        .commande-rows {
            height: 60px !important;
            height: 60px;
            overflow:hidden;
        }

        .commande-hover-zone {
            height: 58px;
            width: 686px;
            color: #191970;
            background-color: rgba(255,255,255,.7);
            position: relative;
            display: flex;
            justify-content: center;
            align-content: center;
            align-items: center
        }

        .commande-hover-zone-2 {
            height: 58px;
            width: 686px;
            color: #191970;
            background-color: rgba(255,255,255,.7);
            position: relative;
            display: flex;
            justify-content: center;
            align-content: center;
            align-items: center;
            z-index: 1000;
        }

    </style>

<style>
    @import url('https://fonts.googleapis.com/css2?family=Roboto&display=swap');



    .mesBTN{
        box-sizing: border-box;
        height: 40px;
        width: 160px;
        border: 1px solid #191970;
        border-radius: 6px 6px 0 0;
        background-color: #FFFFFF;
        margin-left:5px;
        color: #191970;
        font-family: Roboto;
        font-size: 18px;
        font-weight: 500;
        letter-spacing: 0;
        line-height: 19px;
        padding-top: 10px;
        margin-top: 10px;
        padding-left:10px;
        border-bottom: transparent;
    }

    .mesBTN2{
        box-sizing: border-box;
        height: 40px;
        width: 233px;
        border: 1px solid #D8D8D8;
        border-radius: 6px 6px 0 0;
        background-color: #FFFFFF;
        margin-top: -40px;
        margin-left:168px;
        color: #191970;
        font-family: Roboto;
        font-size: 18px;
        font-weight: 500;
        letter-spacing: 0;
        line-height: 19px;
        padding-top: 10px;
        padding-left:10px;
        opacity: 0.5;
        border-bottom: transparent;

    }


    .maGdiv{
        box-sizing: border-box;
        height: 437px;
        /* width: 1202px; */
        width: 841px
        border: 1px solid #D8D8D8;
        border-radius: 0 6px 6px 6px;
        background-color: #FFFFFF;
        /* margin-left: 5px; */
    }
    .entetecommande{
        box-sizing: border-box;
        height: 36px;
        /* width: 1200px; */
        width: 841px;
        border-bottom: 1px solid #D8D8D8;
        border-radius: 0 6px 0 0;
        background-color: #F8F8F8;

    }
    .labelentetecommande{
        color: #191970;
        font-family: Roboto;
        font-size: 11px;
        letter-spacing: 0;
        line-height: 11px;
        margin-left: 20px;
        margin-top:12px;
    }
    .montabcommande{
        height: 60px;
        width: 1200px;
        border-bottom:1px solid #D8D8D8
    }
    .premierB{
        height: 59px;
        width: 109px;
        border-right: 1px solid #D8D8D8;
        background-color: #FFFFFF;
        padding-top:24px;
    }
     .deuxiemeB{
        box-sizing: border-box;
        height: 59px;
        width: 274px;
        margin-top:-59px;
        margin-left:109px;
        border-right: 1px solid #D8D8D8;
        background-color:#FFFFFF;
        padding-top:14px;

    }
    .troisiemeB{
        box-sizing: border-box;
        height: 59px;
        width: 275px;
        margin-top:-59px;
        margin-left:383px;
        border-right: 1px solid #D8D8D8;
        background-color: #FFFFFF ;
        padding-top: 17px;
    }
    .quatriemeB{
        box-sizing: border-box;
        height: 59px;
        width: 72px;
        margin-top:-59px;
        margin-left:658px;
        border-right: 1px solid #D8D8D8;
        background-color:#FFFFFF;
        padding-top: 23px;
    }
    .cinquiemeB{
        box-sizing: border-box;
        height: 59px;
        width: 110px;
        margin-top:-59px;
        margin-left:730px;
        border-right: 1px solid #D8D8D8;
        background-color:#FFFFFF;
        padding-top:23px;
    }
    .sixiemeB{
        box-sizing: border-box;
        height: 59px;
        width: 77px;
        margin-top:-59px;
        margin-left:840px;
        border-right: 1px solid #D8D8D8;
        background-color: #FFFFFF;
        padding-top: 19px;
        padding-left:21px;
    }
    .septiemeB{
        box-sizing: border-box;
        height: 59px;
        width: 180px;
        margin-top:-59px;
        margin-left:917px;
        border-right: 1px solid #D8D8D8;
        background-color:#FFFFFF;
        padding-top: 23px;
    }
    .huitiemeB{
        box-sizing: border-box;
        height: 59px;
        width: 100px;
        margin-top:-59px;
        margin-left:1097px;
        background-color:#FFFFFF;
        padding-top: 23px;
    }
    .contenu1{
        color: #191970;
        font-family: Roboto;
        font-size: 14px;
        font-weight: 500;
        letter-spacing: 0;
        line-height: 14px;
        text-align: center;
    }
    .boxcontenu2-bis{
        box-sizing: border-box;
        height: 25px;
        border-radius: 6px;
        margin-top:0px;
        margin-left:15px;
        display: flex;
        justify-content: center;
        align-items: center;
    }
    .boxcontenu2a{
        box-sizing: border-box;
        height: 34px;
        width: 34px;
        border: 1px solid #9B9B9B;
        border-radius: 6px;
        background-color: #D8D8D8;
        margin-top:0px;
        margin-left:75px;
    }

    .boxcontenu2b{
        box-sizing: border-box;
        height: 34px;
        width: 34px;
        border: 1px solid #9B9B9B;
        border-radius: 6px;
        background-color: #D8D8D8;
        margin-top:-34px;
        margin-left:116px;
    }
    .boxcontenu2c{
        box-sizing: border-box;
        height: 34px;
        width: 34px;
        border: 1px solid #9B9B9B;
        border-radius: 6px;
        background-color: #D8D8D8;
        margin-top:-34px;
        margin-left:157px;
    }

    .boxcontenu2d{
        box-sizing: border-box;
        height: 34px;
        width: 34px;
        border: 1px solid #9B9B9B;
        border-radius: 6px;
        background-color: #D8D8D8;
        margin-top:0px;
        margin-left:34px;
    }

    .boxcontenu2e{
        box-sizing: border-box;
        height: 34px;
        width: 34px;
        border: 1px solid #9B9B9B;
        border-radius: 6px;
        background-color: #D8D8D8;
        margin-top:-34px;
        margin-left:75px;
    }
    .boxcontenu2f{
        box-sizing: border-box;
        height: 34px;
        width: 34px;
        border: 1px solid #9B9B9B;
        border-radius: 6px;
        background-color: #D8D8D8;
        margin-top:-34px;
        margin-left:116px;
    }
    .boxcontenu2g{
        box-sizing: border-box;
        height: 34px;
        width: 34px;
        border: 1px solid #9B9B9B;
        border-radius: 6px;
        background-color: #D8D8D8;
        margin-top:-34px;
        margin-left:157px;
    }
    .boxcontenu2h{
        box-sizing: border-box;
        height: 34px;
        width: 34px;
        border: 1px solid #9B9B9B;
        border-radius: 6px;
        background-color: #D8D8D8;
        margin-top:-34px;
        margin-left:198px;
    }

    .contenu2{
        color: #191970;
        font-family: Roboto;
        font-size: 14px;
        letter-spacing: 0;
        line-height: 16px;
        /* text-align: left; */
    }

    .contenu3a{
        color: #4A4A4A;
        font-family: Roboto;
        font-size: 14px;
        letter-spacing: 0;
        line-height: 14px;
        text-align: left;
        margin-left:15px;
    }
    .contenu3b{
        color: #9B9B9B;
        font-family: Roboto;
        font-size: 14px;
        letter-spacing: 0;
        line-height: 14px;
        margin-top:-14px;
        text-align: left;
        margin-left:15px;
    }
    .contenu4{
        color: #191970;
        font-family: Roboto;
        font-size: 14px;
        letter-spacing: 0;
        line-height: 14px;
        text-align: center;
    }
    .contenu5{
        color: #191970;
        font-family: Roboto;
        font-size: 14px;
        letter-spacing: 0;
        line-height: 14px;
        text-align: center;
    }
    .contenu7{
        color: #00B517;
        font-family: Roboto;
        font-size: 14px;
        font-weight: 500;
        letter-spacing: 0.31px;
        line-height: 14px;
        text-align: center;

    }
    .contenu7b{
        color: #D0021B;
        font-family: Roboto;
        font-size: 14px;
        font-weight: 500;
        letter-spacing: 0.31px;
        line-height: 14px;
        text-align: center;
    }
    .contenu7c{
        color: #FF9500;
        font-family: Roboto;
        font-size: 14px;
        font-weight: 500;
        letter-spacing: 0.31px;
        line-height: 14px;
        text-align: center;
    }
    .contenu8{
        color: #191970;
        font-family: Roboto;
        font-size: 14px;
        letter-spacing: 0;
        line-height: 14px;
        text-align: center;
    }
    .monscrollcom::-webkit-scrollbar {
        width: 5px;
        border-radius: 3px;
        background-color: #D8D8D8;
    }

    .monscrollcom::-webkit-scrollbar-thumb {
        background: #9B9B9B;
        height: 20px;
        width: 3px;
        border-radius: 3px;
    }

    a{
        text-decoration: none;
        cursor: pointer;
    }
    .monderoule1{
        height:340px;
        width:1190px;
        display: none;
        padding-top: 1px;

    }
    .infocliff{
        height: 159px;
        width: 190px;
        border: 1px solid #D8D8D8;
        border-radius: 6px;
        background-color: #FFFFFF;
        margin-top:10px;
        margin-left:8px;
    }
    .infoexpe{
        height: 159px;
        width: 190px;
        border: 1px solid #D8D8D8;
        border-radius: 6px;
        background-color: #FFFFFF;
        margin-top:4px;
        margin-left:8px;
    }
    .resumecom{
        box-sizing: border-box;
        height: 322px;
        width: 703px;
        background-color: #FFFFFF;
        border: 1px solid #D8D8D8;
        border-radius: 6px;
        margin-top:-322px;
        margin-left:208px;

    }
    .numerosuivi{
        box-sizing: border-box;
        height: 66px;
        width: 269px;
        border: 1px solid #D8D8D8;
        border-radius: 6px;
        background-color: #FFFFFF;

        margin-left:922px;
    }

    .cochesuivi{
        box-sizing: border-box;
        height: 246px;
        width: 269px;
        background-color: #FFFFFF;
        margin-top: 8px;
        margin-left:922px;
    }
    .textenteteinfo{
        box-sizing: border-box;
        height: 37px;
        width: 188px;
        border-bottom: 1px solid #D8D8D8;
        border-radius: 6px 6px 0 0;
        background-color: #F8F8F8;
        padding-top: 12px;
    }
    .penteteinfo{
        color: #9B9B9B;
        font-family: Roboto;
        font-size: 14px;
        font-weight: 500;
        letter-spacing: -0.34px;
        line-height: 14px;
        text-align: center;

    }
    .group3{
        height: 112px;
        width: 31px;
        border:1px solid #D8D8D8;
        border-radius:6px;
        margin-top:5px;
        margin-left:5px;
    }

    .textcolora4{
        color: #4A4A4A;
        font-family: Roboto;
        font-size: 14px;
        letter-spacing: -0.34px;
        line-height: 14px;
    }
    .petittextebleu{
        color: #191970;
        font-family: Roboto;
        font-size: 12px;
        letter-spacing: 0;
        line-height: 12px;
        text-align: center;
    }
    .texteresumecom{
        color: #191970;
        font-family: Roboto;
        font-size: 14px;
        font-weight: 500;
        letter-spacing: -0.34px;
        line-height: 14px;
        text-align: center;
    }
    .textcolorresume{
        color: #00B517;
        font-family: Roboto;
        font-size: 14px;
        font-weight: 500;
        letter-spacing: -0.34px;
        line-height: 14px;
        text-align: center;
    }
    .malignederesume{
        height: 60px;
        width: 701px;
        opacity: 0.95;
        border-bottom:1px solid #D8D8D8;
        padding-top:23px;
        background-color: #FFFFFF;

    }
    #maligneresume1{
        display:none;
    }
    #maligneresume1B{
        display:none;
    }
    .malignederesume2{
        height: 60px;
        width: 701px;
        opacity: 0.95;
        background-color: #FFFFFF;
        border-bottom:1px solid #D8D8D8;
        padding-top:23px;
        padding-left:3px;
    }

    .checkcontenu{
        box-sizing: border-box;
        height: 59px;
        width: 25px;
        border-right: 1px solid #D8D8D8;
        background-color:#FFFF;
        margin-top:-23px;
        padding-top:16px;
    }

       .checkcommande{
        width:18px;
        height:18px;
        cursor: pointer;
        margin-left:2px;
        border-radius:3px;
       }

       .refcontenu{
        box-sizing: border-box;
        height: 58px;
        width: 110px;
        border-right: 1px solid #D8D8D8;
        background-color: #FFFFFF;
        margin-top: -58px;
        margin-left:25px;
        padding-top:23px;
       }
        .informationcontenu{
            box-sizing: border-box;
            height: 58px;
            width: 277px;
            border-right: 1px solid #D8D8D8;
            background-color: #FFFFFF;
            margin-top:-58px;
            margin-left:135px;
            padding-top:13px;
                           }
        .quantitecontenu{

            box-sizing: border-box;
            height: 58px;
            width: 72px;
            border-right: 1px solid #D8D8D8;
            background-color: #FFFFFF;
            margin-top:-58px;
            margin-left:412px;
            padding-top:23px;
        }
         .prixcontenu{
            box-sizing: border-box;
            height: 58px;
            width: 112px;
            border-right: 1px solid #D8D8D8;
            background-color: #FFFFFF;
            margin-top:-58px;
            margin-left:484px;
            padding-top:23px;
         }
         .prixtotalcontenu{
            box-sizing: border-box;
            height: 58px;
            width: 112px;

            background-color: #FFFFFF;
            margin-top:-58px;
            margin-left:596px;
            padding-top:23px;
         }
         .blockblur{
            height: 162px;
            width: 348px;
            border-radius: 6px;
            background-color: #FFFFFF;
            box-shadow: 0 5px 15px 0 rgba(0,0,0,0.5);
            z-index: 1;
            margin-top:-240px;
            margin-left:385px;
            display: none;
            position: relative;
            padding-top: 15px;
         }
         .commandeprete{
            color: #191970;
            font-family: Roboto;
            font-size: 21px;
            font-weight: 500;
            letter-spacing: 0;
            line-height: 21px;
            text-align: center;

         }
         .vousavezverifie{
            color: #191970;
            font-family: Roboto;
            font-size: 14px;
            font-weight: 300;
            letter-spacing: -0.34px;
            line-height: 15px;
            text-align: center;
            margin-top:-5px;

         }
         .mybtnvert{
             margin-left:63px;
             margin-top:33px;
         }
         .btnnon{
            box-sizing: border-box;
            height: 37px;
            width: 100px;
            border: 1px solid #D0021B;
            border-radius: 6px;
            background-color: #FFFFFF;
            color: #D0021B;
            font-family: Roboto;
            font-size: 14px;
            font-weight: 500;
            letter-spacing: 0.31px;
            line-height: 14px;
            text-align: center;

         }
         .btnoui{
            height: 37px;
            width: 100px;
            border-radius: 6px;
            background-color: #00B517;
            border:#00B517;
            color: #FFFFFF;
            font-family: Roboto;
            font-size: 14px;
            font-weight: 500;
            letter-spacing: 0.31px;
            line-height: 14px;
            margin-left:14px;
            text-align: center;

         }
         .commandeexped{
            box-sizing: border-box;
            height: 48px;
            width: 269px;
            border: 1px solid #FF9500;
            border-radius: 6px;
            background-color: #FFFFFF;
            margin-top:2px;
         }
         .commandeannul{
            box-sizing: border-box;
            height: 48px;
            width: 269px;
            border: 1px solid #D0021B;
            border-radius: 6px;
            background-color: #FFFFFF;
            margin-top:2px;
         }
         .commandelivr{
            box-sizing: border-box;
            height: 48px;
            width: 269px;
            border: 1px solid #FF9500;
            border-radius: 6px;
            background-color: #FFFFFF;
            margin-top:2px;
         }
         .commanderecue{
            box-sizing: border-box;
            height: 48px;
            width: 269px;
            border: 1px solid #00B517;
            border-radius: 6px;
            background-color: #FFFFFF;
            margin-top:2px;
         }
        .leftcommandeexpe{
            height: 47px;
            width: 48px;
            border-right: 1px solid #FF9500;
            border-radius: 6px 0 0 6px;

        }
        .leftcommandeannul{
            height: 47px;
            width: 48px;
            border-right: 1px solid #D0021B;
            border-radius: 6px 0 0 6px;

        }
        .leftcommandelivr{
            height: 47px;
            width: 48px;
            border-right:1px solid #FF9500;
            border-radius: 6px 0 0 6px;

        }
        .leftcommandeencours{
            height: 47px;
            width: 48px;
            border-right:1px solid #00B517;
            border-radius: 6px 0 0 6px;

        }
        .commandeexpetext{
            color: #FF9500;
            font-family: Roboto;
            font-size: 14px;
            font-weight: 500;
            letter-spacing: 0.31px;
            line-height: 14px;
            text-align: left;
            margin-left:58px;
           margin-top:-30px;
        }
        .commandeannultext{
            color: #D0021B;
            font-family: Roboto;
            font-size: 14px;
            font-weight: 500;
            letter-spacing: 0.31px;
            line-height: 14px;
            text-align: left;
            margin-left:58px;
            margin-top:-30px;

        }
        .commandelivrtext{
            color: #FF9500;
            font-family: Roboto;
            font-size: 14px;
            font-weight: 500;
            letter-spacing: 0.31px;
            line-height: 14px;
            text-align: left;
            margin-left:58px;
            margin-top:-30px;


        }
        .commandeencourstext{
            color: #00B517;
            font-family: Roboto;
            font-size: 14px;
            font-weight: 500;
            letter-spacing: 0.31px;
            line-height: 14px;
            text-align: left;
            margin-left:58px;
            margin-top:-30px;

        }

        .tab-comm-element {
            color: #191970;
            font-family: Roboto;
            font-size: 11px;
            letter-spacing: 0;
            line-height: 11px;
            margin-left: 20px;
            margin-top: 12px;
            padding: 10px 0px 10px 0px;
        }

        .commande-libelle-prod-detail {
            display: flex;
            align-items: center;
        }

        .detail-commade-price {
            height: 14px;
            color: #191970;
            font-family: Roboto;
            font-size: 14px;
            letter-spacing: 0;
            line-height: 14px;
        }

</style>

<style>
    table, td, th {
      border: 1px solid #D8D8D8;
    }

    table {
        border-collapse: collapse;
        width: 856px;
        /* margin-top: 15px; */
        position: relative;
        /* left: -5px; */
    }

    td {
      text-align: center;

    }

    .tab-comm-element {
        border-right-style : hidden!important;
      border-right:0;
    }

    .td-section {
        /* padding: 10px 0px 10px 0px; */
        height: 60px !important;
        overflow: hidden
    }

    .re-commander {
        height: 38px;
        width: 125px;
        border-radius: 6px;
        background-color: #1A7EF5;
        color: #FFFFFF;
        font-family: Roboto;
        font-size: 14px;
        font-weight: 500;
        letter-spacing: 0;
        line-height: 14px;
        border: transparent;
    }

    .historique-commande-header {
        box-sizing: border-box;
        height: 44px;
        width: 855px;
        border-radius: 7px 7px 0 0;
        background-color: #FFFFFF;
    }

    .commande-success {
        height: 14px;
        /* width: 138px; */
        color: #00B517;
        font-family: Roboto;
        font-size: 14px;
        font-weight: 500;
        letter-spacing: 0.31px;
        line-height: 14px;
        text-align: center;
    }

    .commande-danger {
        height: 14px;
        /* width: 150px; */
        color: #D0021B;
        font-family: Roboto;
        font-size: 14px;
        font-weight: 500;
        letter-spacing: 0.31px;
        line-height: 14px;
        text-align: center;
    }

    .commande-middle {
        height: 14px;
        color: #FF9500;
        font-family: Roboto;
        font-size: 14px;
        font-weight: 500;
        letter-spacing: 0.31px;
        line-height: 14px;
        text-align: center;
    }

    .facture-pdf {
        height: 14px;
        width: 26px;
        color: #191970;
        font-family: Roboto;
        font-size: 14px;
        letter-spacing: 0;
        line-height: 14px;
        text-decoration: underline
    }

    .facture-pdf:hover{
        cursor: pointer;
    }

    .commande-sub-content-adress {
        width: 207px;
        height: 342px;
    }

    .commande-sub-content-details {
        box-sizing: border-box;
        height: 322px;
        width: 647px;
        border: 1px solid #D8D8D8;
        border-radius: 6px 0 0 6px;
        background-color: #FFFFFF;
        margin-top: 10px;
        position: relative;
        left: 0px;
    }

    .commande-client-recap-tile {
        box-sizing: border-box;
        height: 30px;
        width: 647px;
        border-radius: 7px 7px 0 0;
        background-color: #FFFFFF;
        padding-top: 3px;
    }

    .commande-resume-header {
        height: 14px;
        width: 172px;
        color: #191970;
        font-family: Roboto;
        font-size: 14px;
        font-weight: 500;
        letter-spacing: -0.34px;
        line-height: 14px;
        text-align: center;
    }

    .commande-sub-content {
        display: flex;
        flex-direction: row;
    }

    .hide-commande-tr {
        display: none !important
    }

    .commande-information-prod {
        box-sizing: border-box;
        /* height: 58px; */
        width: 330px;
        background-color: transparent;
        display: flex;
        /* padding-top: 13px; */
    }

    #tab-client-commande {
        /* height: 100px; */
        /* overflow-y: auto; */
        /* background-color: red */
    }


    .commande-table-wrapper{
        max-height: 483px;
        overflow-y: auto;
        overflow-x: hidden
    }
    /* .table-commande thead td { position: sticky; top: 0; z-index: 1; } */
    thead {
        position: sticky;
        top: -1px;
        background-color: #ffffff
    }

    .textcolora4-bis {
        color: #4A4A4A;
        font-family: Roboto;
        font-size: 14px;
        letter-spacing: -0.34px;
        line-height: 14px;
        text-align: left;
    }

    .addr-icons {
        margin-left:4px;
        padding-bottom: 20px;
        position: relative;
        left: -2px;
    }

    .zone-icons-grouppe {
        padding-top: 17px
    }

    .historique-commande-head {
        height: 24px;
        width: 264px;
        color: #191970;
        font-family: Roboto;
        font-size: 20px;
        font-weight: 500;
        letter-spacing: -0.48px;
        line-height: 22px;
        margin-left: 30px;
    }

    .commande-table-header {
        box-sizing: border-box;
        height: 36px;
        width: 857px;
        border: 1px solid #D8D8D8;
        background-color: #F8F8F8;
    }

    .commande-resume-table-header {
        box-sizing: border-box;
        height: 36px;
        width: 647px;
        border: 1px solid #D8D8D8;
        background-color: #F8F8F8;
    }

    .commande-addr-detail {
        height: 28px;
        width: 134px;
        /* background-color: #9B9B9B; */
        font-family: Roboto;
        font-size: 14px;
        letter-spacing: -0.34px;
        line-height: 14px;
        margin-bottom: 5px;
        display: flex;
        align-items: center;
    }


table {
  width: 100%;
}

.table-header {
  background-color: grey;
}

.table-content {
  height: 441px;
  overflow-x: hidden;
  margin-top: -3px;
  border: 1px solid rgba(255, 255, 255, 0.3);
  position: relative;
  left: -1px;
}

.children-sub-table {
    height: 256px;
    overflow-x: hidden;
    margin-top: -3px;
    border: 1px solid rgba(255, 255, 255, 0.3);
    position: relative;
    left: -1px;
}

    </style>

<div id="mes-commandes" class="donnees-menu-profil" style="display: none">
    <div class="historique-commande-header" style="padding-top: 10px"><span class="historique-commande-head">Historique de vos commandes</span></div>
    <div class="maGdiv">

      <div class="table-header">
        <table cellpadding="0" cellspacing="0" border="0" style="z-index: 1">
          <thead>
            <tr>
                <td class="tab-comm-element" style="width: 50px; text-align:center">Voir</td>
                <td class="tab-comm-element" style="width: 110px; text-align:center;">Commande N°</td>
                <td class="tab-comm-element" style="width: 56px; text-align:center">Articles</td>
                <td class="tab-comm-element" style="width: 112px;">Prix total</td>
                <td class="tab-comm-element" style="width: 56px;">Paiement</td>
                <td class="tab-comm-element" style="width: 166px;">Etat de la commande</td>
                <td class="tab-comm-element" style="width:101px">Date</td>
                <td class="tab-comm-element" style="width: 51px">Facture</td>
                <td class="tab-comm-element" style="width: 147px;">Re-commande</td>
            </tr>
          </thead>
      </table>
      </div>
      <div class="table-content">
        <table cellpadding="0" cellspacing="0" border="0" id="commande-table">
            <tbody id="tab-client-commande">



            </tbody>
        </table>
    </div>

       {{-- DETAILS DE MON DEROULE --}}
       <section class="monderoule1" id="monderoule1" >
           {{-- DROITE --}}
           <article class="infocliff">
            <div class="textenteteinfo">
                <p class="penteteinfo">Information du client :</p>
            </div>
            <div class="group3">
                <img src="/assets/images/icones-vendeurs2/user copy 2.svg" style="margin-left:10px;margin-top:10px;">
                <img src="/assets/images/icones-vendeurs2/placeholder copy 2.svg" style="margin-left:10px;margin-top:29px;">
                <img src="/assets/images/icones-vendeurs2/telephone.svg" style="margin-left:10px;margin-top:29px;">
            </div>
            <div style="margin-top:-120px;margin-left:46px;">
               <p class="textcolora4"  style="margin-top:14px;">Nom &<br>
                   prénom</p>
               <p class="textcolora4"  style="margin-top:12px;">Adresse du<br>
                   Client</p>
               <p class="textcolora4"  style="margin-top:12px;">N° portable</p>
           </div>
           </article>
           <article class="infoexpe">
               <div class="textenteteinfo">
                   <p class="penteteinfo">Information d’expédition :</p>
               </div>
               <div class="group3">
                   <img src="/assets/images/icones-vendeurs2/user copy 2.svg" style="margin-left:10px;margin-top:10px;">
                   <img src="/assets/images/icones-vendeurs2/placeholder copy 2.svg" style="margin-left:10px;margin-top:29px;">
                   <img src="/assets/images/icones-vendeurs2/telephone.svg" style="margin-left:10px;margin-top:29px;">
               </div>
               <div style="margin-top:-120px;margin-left:46px;">
                   <p class="textcolora4"  style="margin-top:14px;">Nom &<br>
                       prénom</p>
                   <p class="textcolora4"  style="margin-top:12px;">Adresse du<br>
                       Client</p>
                   <p class="textcolora4"  style="margin-top:12px;">N° portable</p>
               </div>
           </article>
           {{-- RESUME --}}
           <article class="resumecom" id=resumecom1>
               <div style="height:32px;width:701px;border-bottom:1px solid #D8D8D8;padding-top:10px;background-color: #FFFFFF">
                   <p class="texteresumecom">RÉSUMÉ DE LA COMMANDE</p>
               </div>
               <div style=" height: 32px;width:701px;border-bottom:1px solid #D8D8D8;  background-color: #F8F8F8; padding-top:5px;">                          <label class="petittextebleu" style="margin-left:54px;">Référence</label>
                  <label class="petittextebleu" style="margin-left:45px;">Article(s)</label>
                  <label class="petittextebleu" style="margin-left:230px;">Quantité</label>
                  <label class="petittextebleu" style="margin-left:30px;">Prix unitaire</label>
                  <label class="petittextebleu" style="margin-left:51px;">Prix total</label>
               </div>
               {{-- CONTENU TABLEAU --}}
               <div style="height:255px;overflow-y:auto;overflow-x:hidden;">

               <aside class="malignederesume2" id="maligneresume2" >
                   <a  style="pointer:cursor">
                  <article class="checkcontenu" >
                   <input type="checkbox"
                   class="checkcommande form-check-input"  onclick="validecommande()">
                  </article>
                  <article class="refcontenu">
                   <p class="contenu1">7401048741</p>
                  </article>
                  <article class="informationcontenu">
                   <aside class="boxcontenu2"></aside>
                   <p class="contenu2">Support réglable pour Echo<br>
                       Show 5 (2e génération) | Bleu</p></article>

                  <article class="quantitecontenu">  <p class="contenu4">999</p></article>
                  <article class="prixcontenu"><p class="contenu5">999.999 Fcfa</p></article>
                  <article class="prixtotalcontenu"><p class="contenu5">999.999 Fcfa</p></article>
               </aside>
               <aside class="malignederesume"id="maligneresume1">
                   <p class="textcolorresume">J’ai vérifié ce produit, il est prêt à etre livré.</p>
               </a>
               </aside>


               <aside class="malignederesume2" id="maligneresume2B">
                   <article class="checkcontenu" >
                    <input type="checkbox"
                    class="checkcommande form-check-input"  onclick="validecommande1()">
                   </article>
                   <article class="refcontenu">
                    <p class="contenu1">7401048741</p>
                   </article>
                   <article class="informationcontenu">
                    <aside class="boxcontenu2"></aside>
                    <p class="contenu2">Support réglable pour Echo<br>
                        Show 5 (2e génération) | Bleu</p></article>

                   <article class="quantitecontenu">  <p class="contenu4">999</p></article>
                   <article class="prixcontenu"><p class="contenu5">999.999 Fcfa</p></article>
                   <article class="prixtotalcontenu"><p class="contenu5">999.999 Fcfa</p></article>
                </aside>
                <aside class="malignederesume"id="maligneresume1B">
                    <p class="textcolorresume">J’ai vérifié ce produit, il est prêt à etre livré.</p>
                </aside>

               </div>

               <div style="  position: fixed;
               display: none;
               width: 100%;
               height: 100%;
               top: 0;
               left: 0;
               right: 0;
               bottom: 0;
               background-color: rgba(0,0,0,0.45);
               z-index: 2;
               border-radius:6px;
               display:none" id="overlay"></div>
           </article>

             {{-- Block sur le blur --}}


             <article class="blockblur" id="blockblur1">
               <p class="commandeprete">Commande prête</p>
               <p class="vousavezverifie">Vous avez vérifier les produits de cette commande, <br>ils sont conforment et prêt pour l’expédition ?</p>
               <aside class="mybtnvert">
               <input type="submit" class="btnnon" value="Non" onclick="commandenonvalide()">
               <input type="submit" class="btnoui" value="Oui" onclick="commandeouivalide()">
               <aside>
           </article>
           {{-- GAUCHE --}}
           <article class="numerosuivi" style="  margin-top:-322px;" id="numerosuivi">
               <aside class="  height: 32px;
               width: 266px;
               border-radius: 6px 6px 0 0;
               background-color: #FFFFF;">

               <label class="petittextebleu" style="float: left;margin-left:10px;margin-top:10px;">N° de suivi de la commande :</label>
               <label class="textcolora4" style="float: right;margin-right:50px;margin-top:10px;">N/A</label>
               </aside>
               <aside style=" height: 32px;
               width: 266px;
               border-radius: 0 0 6px 6px;
               background-color: #F8F8F8;">
                <label class="petittextebleu" style="float: left;margin-left:10px;margin-top:10px;">Date prévue :</label>
                <label class="textcolora4" style="float: right;margin-right:50px;margin-top:10px;">N/A</label>

               </aside>
           </article>
           <article class="cochesuivi">
            <aside class="commandeexped" id="commandeexpe1" style="display: none">
                <div class="leftcommandeexpe" style="display: none;">
                   <script src="https://cdn.lordicon.com/xdjxvujz.js"></script>
                   <lord-icon
                   src="https://cdn.lordicon.com/mwqnntww.json"
                   trigger="loop"
                   delay="1000"
                   colors="primary:#ff9500"
                   style="width:28px;height:28px;margin-top:10px;margin-left:10px;">
                   </lord-icon>
                </div>
                <p class="commandeexpetext">Commande expédiée</p>
            </aside>
            <aside class="commandeannul" id="commandeannul1" style="display: none;">
                <div class="leftcommandeannul">
                   <img src="/assets/images/cancel.svg" style="margin-top:12px;margin-left:14px;">
                </div>
                <p class="commandeannultext">Commande annulée</p>
            </aside>
            <aside class="commandeexped" id="commandeexpe2" style="display: none;">
               <div class="leftcommandeexpe">
                   <lord-icon
                   src="https://cdn.lordicon.com/mwqnntww.json"
                   trigger="loop"
                   delay="1000"
                   colors="primary:#ff9500"
                   style="width:28px;height:28px;margin-top:10px;margin-left:10px;" >
                   </lord-icon>
               </div>
               <p class="commandeexpetext">Commande expediée</p>
           </aside>
            <aside class="commandelivr" id="commandelivr1">
                <div class="leftcommandelivr">
                   <script src="https://cdn.lordicon.com/xdjxvujz.js"></script>
                   <lord-icon
                   src="https://cdn.lordicon.com/mwqnntww.json"
                   trigger="loop"
                   delay="1000"
                   colors="primary:#ff9500"
                   style="width:28px;height:28px;margin-top:10px;margin-left:10px;" id="encours1">
                   </lord-icon>

                </div>
                <p class="commandelivrtext" >En cours de traitement</p>
            </aside>
            <aside class="commanderecue" id="encoursdeT" style="display:none;">
               <div class="leftcommandeencours">
                   <img src="/assets/images/icones-vendeurs2/Valide.svg" style="margin-top:12px;margin-left:14px;">
               </div>
               <p class="commandeencourstext">En cours de traitement</p>
           </aside>

            <aside class="commanderecue" id="commanderecue1">
               <div class="leftcommandeencours">
                   <img src="/assets/images/icones-vendeurs2/Valide.svg" style="margin-top:12px;margin-left:14px;">
               </div>
               <p class="commandeencourstext">Commande reçue</p>
           </aside>

           </article>
       </section>

    {{-- MON DEROULE 2 --}}

       <section class="monderoule1" id="monderoule2" >
           {{-- DROITE --}}
           <article class="infocliff">
            <div class="textenteteinfo">
                <p class="penteteinfo">Information du client :</p>
            </div>
            <div class="group3">
                <img src="/assets/images/icones-vendeurs2/user copy 2.svg" style="margin-left:10px;margin-top:10px;">
                <img src="/assets/images/icones-vendeurs2/placeholder copy 2.svg" style="margin-left:10px;margin-top:29px;">
                <img src="/assets/images/icones-vendeurs2/telephone.svg" style="margin-left:10px;margin-top:29px;">
            </div>
            <div style="margin-top:-120px;margin-left:46px;">
               <p class="textcolora4"  style="margin-top:14px;">Nom &<br>
                   prénom</p>
               <p class="textcolora4"  style="margin-top:12px;">Adresse du<br>
                   Client</p>
               <p class="textcolora4"  style="margin-top:12px;">N° portable</p>
           </div>
           </article>
           <article class="infoexpe">
               <div class="textenteteinfo">
                   <p class="penteteinfo">Information d’expédition :</p>
               </div>
               <div class="group3">
                   <img src="/assets/images/icones-vendeurs2/user copy 2.svg" style="margin-left:10px;margin-top:10px;">
                   <img src="/assets/images/icones-vendeurs2/placeholder copy 2.svg" style="margin-left:10px;margin-top:29px;">
                   <img src="/assets/images/icones-vendeurs2/telephone.svg" style="margin-left:10px;margin-top:29px;">
               </div>
               <div style="margin-top:-120px;margin-left:46px;">
                   <p class="textcolora4"  style="margin-top:14px;">Nom &<br>
                       prénom</p>
                   <p class="textcolora4"  style="margin-top:12px;">Adresse du<br>
                       Client</p>
                   <p class="textcolora4"  style="margin-top:12px;">N° portable</p>
               </div>
           </article>



           {{-- RESUME2 --}}
           <article class="resumecom">
               <div style="height:32px;width:701px;border-bottom:1px solid #D8D8D8;padding-top:10px;">
                   <p class="texteresumecom">RÉSUMÉ DE LA COMMANDE</p>
               </div>
               <div style=" height: 32px;width:701px;border-bottom:1px solid #D8D8D8;  background-color: #F8F8F8; padding-top:5px;">                          <label class="petittextebleu" style="margin-left:54px;">Référence</label>
                  <label class="petittextebleu" style="margin-left:45px;">Article(s)</label>
                  <label class="petittextebleu" style="margin-left:230px;">Quantité</label>
                  <label class="petittextebleu" style="margin-left:30px;">Prix unitaire</label>
                  <label class="petittextebleu" style="margin-left:51px;">Prix total</label>
               </div>
               {{-- CONTENU TABLEAU --}}
               <div style="height:255px;overflow-y:auto;overflow-x:hidden;">

               <aside class="malignederesume2" id="maligneresume2A">
                  <article class="checkcontenu" >
                   <input type="checkbox"
                   class="checkcommande form-check-input"  onclick="validecommande2A()">
                  </article>
                  <article class="refcontenu">
                   <p class="contenu1">7401048741</p>
                  </article>
                  <article class="informationcontenu">
                   <aside class="boxcontenu2"></aside>
                   <p class="contenu2">Support réglable pour Echo<br>
                       Show 5 (2e génération) | Bleu</p></article>

                  <article class="quantitecontenu">  <p class="contenu4">999</p></article>
                  <article class="prixcontenu"><p class="contenu5">999.999 Fcfa</p></article>
                  <article class="prixtotalcontenu"><p class="contenu5">999.999 Fcfa</p></article>
               </aside>
               <aside class="malignederesume"id="maligneresume1A" style="display: none;">
                   <p class="textcolorresume">J’ai vérifié ce produit, il est prêt à etre livré.</p>
               </aside>


               <aside class="malignederesume2" id="maligneresume2BB">
                   <article class="checkcontenu" >
                    <input type="checkbox"
                    class="checkcommande form-check-input"  onclick="validecommande2B()">
                   </article>
                   <article class="refcontenu">
                    <p class="contenu1">7401048741</p>
                   </article>
                   <article class="informationcontenu">
                    <aside class="boxcontenu2"></aside>
                    <p class="contenu2">Support réglable pour Echo<br>
                        Show 5 (2e génération) | Bleu</p></article>

                   <article class="quantitecontenu">  <p class="contenu4">999</p></article>
                   <article class="prixcontenu"><p class="contenu5">999.999 Fcfa</p></article>
                   <article class="prixtotalcontenu"><p class="contenu5">999.999 Fcfa</p></article>
                </aside>
                <aside class="malignederesume"id="maligneresume1BB" style="display: none;">
                    <p class="textcolorresume">J’ai vérifié ce produit, il est prêt à etre livré.</p>
                </aside>

                <aside class="malignederesume2" id="maligneresume2D">
                   <article class="checkcontenu" >
                    <input type="checkbox"
                    class="checkcommande form-check-input"  onclick="validecommande2D()">
                   </article>
                   <article class="refcontenu">
                    <p class="contenu1">7401048741</p>
                   </article>
                   <article class="informationcontenu">
                    <aside class="boxcontenu2"></aside>
                    <p class="contenu2">Support réglable pour Echo<br>
                        Show 5 (2e génération) | Bleu</p></article>

                   <article class="quantitecontenu">  <p class="contenu4">999</p></article>
                   <article class="prixcontenu"><p class="contenu5">999.999 Fcfa</p></article>
                   <article class="prixtotalcontenu"><p class="contenu5">999.999 Fcfa</p></article>
                </aside>
                <aside class="malignederesume"id="maligneresume1D" style="display: none;">
                    <p class="textcolorresume">J’ai vérifié ce produit, il est prêt à etre livré.</p>
                </aside>

                <aside class="malignederesume2" id="maligneresume2C">
                   <article class="checkcontenu" >
                    <input type="checkbox"
                    class="checkcommande form-check-input"  onclick="validecommande2C()">
                   </article>
                   <article class="refcontenu">
                    <p class="contenu1">7401048741</p>
                   </article>
                   <article class="informationcontenu">
                    <aside class="boxcontenu2"></aside>
                    <p class="contenu2">Support réglable pour Echo<br>
                        Show 5 (2e génération) | Bleu</p></article>

                   <article class="quantitecontenu">  <p class="contenu4">999</p></article>
                   <article class="prixcontenu"><p class="contenu5">999.999 Fcfa</p></article>
                   <article class="prixtotalcontenu"><p class="contenu5">999.999 Fcfa</p></article>
                </aside>
                <aside class="malignederesume"id="maligneresume1C" style="display: none;">
                    <p class="textcolorresume">J’ai vérifié ce produit, il est prêt à etre livré.</p>
                </aside>

               </div>
           </article>
           {{-- GAUCHE --}}
           <article class="numerosuivi" style="margin-top:-322px;">
               <aside class="  height: 32px;
               width: 266px;
               border-radius: 6px 6px 0 0;
               background-color: #FFFFFF;">

               <label class="petittextebleu" style="float: left;margin-left:10px;margin-top:10px;">N° de suivi de la commande :</label>
               <label class="textcolora4" style="float: right;margin-right:50px;margin-top:10px;">N/A</label>
               </aside>
               <aside style=" height: 32px;
               width: 266px;
               border-radius: 0 0 6px 6px;
               background-color: #F8F8F8;">
                <label class="petittextebleu" style="float: left;margin-left:10px;margin-top:10px;">Date prévue :</label>
                <label class="textcolora4" style="float: right;margin-right:50px;margin-top:10px;">N/A</label>

               </aside>
           </article>
           <article class="cochesuivi">
               <aside class="commandeexped" id="commandeexpe2A">
                   <div class="leftcommandeexpe">
                       <script src="https://cdn.lordicon.com/xdjxvujz.js"></script>
                       <lord-icon
                       src="https://cdn.lordicon.com/mwqnntww.json"
                       trigger="loop"
                       delay="1000"
                       colors="primary:#ff9500"
                       style="width:28px;height:28px;margin-top:10px;margin-left:10px;">
                       </lord-icon>
                   </div>
                   <p class="commandeexpetext">Commande expédiée</p>
               </aside>
               <aside class="commandeannul" id="commandeannul2">
                   <div class="leftcommandeannul">
                       <img src="/assets/images/cancel.svg" style="margin-top:12px;margin-left:14px;">
                   </div>
                   <p class="commandeannultext">Commande annulée</p>
               </aside>
               <aside class="commandelivr" id="commandelivr2">
                   <div class="leftcommandelivr">
                       <script src="https://cdn.lordicon.com/xdjxvujz.js"></script>
                       <lord-icon
                       src="https://cdn.lordicon.com/mwqnntww.json"
                       trigger="loop"
                       delay="1000"
                       colors="primary:#ff9500"
                       style="width:28px;height:28px;margin-top:10px;margin-left:10px;">
                       </lord-icon>
                   </div>
                   <p class="commandelivrtext">Commande livrée</p>
               </aside>

           </article>
       </section>
       </section>

    </div>
</div>

<script>

</script>
