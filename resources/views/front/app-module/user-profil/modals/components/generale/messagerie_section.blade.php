<?php
    if (Auth::user()){
        // liste des carnets d'adresse
        $carnets= \App\Models\CarnetAdresse::getCarnetByUser();
    }
?>
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
            background-color: #F8F8F8;
            display: flex;
            flex-direction:column;
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
/*
        .img-bottom {
            height: 210.95px;
            width: 857px;
            position: fixed;
            bottom: 145px;
            background-image: url('back_picture.webp');
            z-index: 1;
            background-repeat: no-repeat;
            background-size: contain;
        } */

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
            width: 847px;
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
            font-weight: 500;
            letter-spacing: -0.48px;
            line-height: 24px;
            position: relative;
            top: 10px;
            left: 20px;
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
            height: 44px;
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

        .carnet-middlet {
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            position: relative;
            margin-left: auto;
            margin-right: auto;
            /* top: 95.78px; */

            color: #4A4A4A;
            font-family: Roboto;
            font-size: 13px;
            font-weight: 500;
            letter-spacing: -0.31px;
            line-height: 15px;
            /* background-color: red; */
            /* height: 473px;
            width: 350px;   */
            /* padding: 50px;*/
        }

        .carnet-middlet .user-card-message {
            margin-bottom: 5px;
        }

        .carnet-middlet .user-card-message:hover {
            cursor: pointer;
            background-color: #ebe7e7;
        }



	</style>

<style>
    .conversation-section-2 .conversation-section-real-time {
        /* height: 76px; */
        height: fit-content(20em);
        width: 360px;
        display: flex;
        flex-direction: column;
        position: relative;
        left: 26px;
        top: 14px;
        margin-bottom: 17px;
        /* background-color: #191970; */
    }

    .user-active-infos {
        height: 22px;
        width: 360px;
        display: flex;
        justify-content: flex-start;
        align-items: center;
        margin-bottom: 14px;
    }

    .user-active-photo-profil {
        height: 22px;
        width: 22px;
        background-color: #4A4A4A;

        border-radius: 50%;
        margin-right: 2px;

    }

    .user-active-name {
        height: 20px;
        width: 106px;
        color: #4A4A4A;
        font-family: Roboto;
        font-size: 14px;
        font-weight: 500;
        letter-spacing: 0;
        line-height: 20px;
        margin-right: 192px;
    }

    .user-active-message {
        display: block;
        overflow: auto;
        width: 359px;
        border-radius: 5px;
        background-color: #191970;

        color: #FFFFFF;
        font-family: Roboto;
        font-size: 14px;
        font-weight: 500;
        letter-spacing: 0;
        line-height: 20px;
        text-align: center;

        margin: auto;
        padding: 10px;
    }

    .user-active-current-time {
        height: 18px;
        width: 26px;
        color: #8D97A5;
        font-family: Roboto;
        font-size: 12px;
        font-weight: 500;
        letter-spacing: 0.5px;
        line-height: 18px;
        text-align: right;
    }

    /* response message  */

    .conversation-section-real-time-response {
        height: 113px;
        width: 420px;
        display: flex;
        flex-direction: column;
        /* background-color: #00B517; */
        position: relative;
        margin-top:17px;
        left: 79px;
    }

    .corner-time {
        height: 18px;
        width: 33px;
        color: #8D97A5;
        font-family: Roboto;
        font-size: 12px;
        font-weight: 500;
        letter-spacing: 0.5px;
        line-height: 18px;
        text-align: right;
        position: relative;
        float: right;
        clear: right;
        text-align: right;
        margin:  0 0 0 auto;
        margin-bottom: 15px;
        /* right: 20px; */
    }

    .response-message {
        display: block;
        overflow: auto;
        width: 419px;
        border-radius: 5px;
        background-color: #D8D8D8;
        display: flex;
        justify-content: center;
        align-items: center;

    }

    .response-message p {
        height: 60px;
        width: 400px;
        color: #51606D;
        font-family: Roboto;
        font-size: 14px;
        font-weight: 500;
        letter-spacing: 0;
        line-height: 20px;
    }

    .user-active-message-input {
        height: 46px;
        width: 510px;
        background-color: #fff;
        position: absolute;
        float: right;
        right: 10px;
        bottom: 10px;
        display: flex;
    }

    .user-active-input-section input {
        width: 390px;
        height: 46px;
        padding: 0 0 0 10px;
        position: relative;
        left: 30px;
        border: none;
        outline: none;

    }

    .user-active-input-section input:focus{
        border: none;
        outline: none;
    }

    .user-active-input-section input:active{
        border: none;
        outline: none;
    }

    .button-section {
        width: 110px;
        height: 46px;
        /* background-color: #51606D; */
        display: flex;
        justify-content: center;
        align-items: center;
        position: relative;
        left: 20px;

    }

    .button-section button {
        border: none;
        background-color: #fff;
    }

    .button-section button:hover {
        border: 0.5px solid #D8D8D8;
        background-color: #fff;
    }

    .button-section button svg {
        color: rgb(167, 164, 164);
    }

</style>



<style>

    .message-text-header {
        display: flex;
        justify-content: center;
        align-items: center;
        margin-left: 30px;
    }

    .message-text-header span {
        height: 24px;
        width: 258px;
        color: #4A4A4A;
        font-family: Roboto;
        font-size: 14px;
        font-weight: 300;
        letter-spacing: -0.48px;
        line-height: 16px;
        position: relative;
        top: 3px;
    }

    .message-text-header h4 {
        color: #191970;
    }

    .user-card-message {
        height: 110px;
        width: 336px;
        background-color: #fff;
        display: flex;
        justify-content: flex-start;
        align-items: center;
        border: 1px solid #D8D8D8;

    }

    .user-photo-message {
        height: 57px;
        width: 53px;
        position: relative;
        margin-right: 17.5px;
        margin-left: 20px;
    }

    .toule-img {
        box-sizing: border-box;
        height: 39px;
        width: 39px;
        border: 1px solid #191970;
        background-color: #FFFFFF;
        border-radius: 50%;
    }

    .toule-img img{
       position: relative;
       top: 6px;
       left: 6px;
    }

    .user-photo {
        box-sizing: border-box;
        height: 36px;
        width: 36px;
        border: 1px solid #D0021B;
        border-radius: 50%;
        position: absolute;
        top: 28px;
        left: 20px;

    }

    .user-photo img {
        box-sizing: border-box;
        height: 36px;
        width: 36px;
        border-radius: 50%;

    }

    .user-message-section {
        height: 80px;
        width: 220px;
        display: flex;
        flex-direction: column !important;

    }

    .user-button-statut-section {
        width: 20px;
        height: 80px;
        display: flex;
        flex-direction: column;
        justify-content: space-between;

        /* background-color: rebeccapurple; */
    }

    .user-button-statut-section img {
        position: relative;
        /* bottom: 14px; */
    }

    .user-message-objet {
        height: 18px;
        width: 129px;
        color: #4A4A4A;
        font-family: Roboto;
        font-size: 15px;
        font-weight: 500;
        letter-spacing: 0;
        line-height: 18px;
        margin-bottom: 16.39px;
    }

    .user-message-content {
        height: 28px;
        width: 220px;
        color: #191970;
        font-family: Roboto;
        font-size: 12px;
        letter-spacing: 0;
        line-height: 13px;
        margin-bottom: 10px;

    }

    .user-message-time {
        height: 14px;
        width: 67px;
        color: #9B9B9B;
        font-family: Roboto;
        font-size: 12px;
        letter-spacing: 0;
        line-height: 13px;

    }

    .online-offline {
        box-sizing: border-box;
        height: 8px;
        width: 8px;
        background-color: #D0021B;
        border-radius: 50%;
    }

    .separator-element {
        box-sizing: border-box;
        height: 80px;
        width: 0.5px;
        border: 0.5px solid #191970;
        position: relative;
        right: 8px;
    }

    .badge-element {
        width: 26px;
        border-radius: 5px;
        color: #FFFFFF;
        font-family: Roboto;
        font-size: 12px;
        font-weight: 500;
        letter-spacing: 0;
        text-align: center;
        position: absolute;
        margin-left:20px;
        margin-bottom: -10px;
        line-height: 20px;
        top: 11px;
        text-align: center;
    }

    .user-message-section1 {
        display: flex;
        flex-direction: row;
        width: 100%;
    }

    .conversation-section-1 {
        /* background-color: red; */
        display: flex;
        flex-direction: column !important;
        height: 473px;
        width: 336px;
    }

    .conversation-section-2 {
        height: 473px;
        width: 521px;
        /* background-color: #1A7EF5; */
        display: flex;
        flex-direction: column;
        justify-content: flex-start;
        align-items: flex-start;
        overflow-y: auto;
        overflow-x: none
    }

    </style>

<div id="messagerie" class="donnees-menu-profil" style="display: none; position: relative; top: -11px; left: -1px;">

    <div class="section-droite-1" style="margin-top: 10px; padding-top: 5px; background-color: #F8F8F8;">

<div class="row-carnet">
     <div class="message-text-header"><h4>Messagerie -</h4>  <span>Toutes les conversations</span></div>
</div>

<div class="user-message-section1" >
     <div class="conversation-section-1">
         <div class="carnet-middlet" >
            <div class="user-card-message">

            <!-- section user photo  -->
            <div class="user-photo-message">
                <div class="toule-img"> <img src="{{ asset('assets/images/toulemarket-icon-svg.svg') }}"  alt=""/></div>
                <div class="user-photo">
                <img src="{{ asset('assets/images/uriel_profil.jpg') }}"  alt=""/>
                </div>
            </div>

            <div class="separator-element"></div>

            <!-- contente message  -->
            <div class="user-message-section">
                <div><span class="user-message-objet">@ObjetDuMessage </span><label class="badge-element" style="background-color:red !important">99+</label></div>
                <span class="user-message-content">Quapropter a natura mihi videtur potius quam ab indigentia orta amicitia.</span>
                <span class="user-message-time">Il y’a 1 heure</span>
            </div>


            <div class="user-button-statut-section" >
                <div class="online-offline"></div>
                <div class="vue"><img src="{{ asset('assets/images/toulemarket-icon.svg') }}" alt="" /></div>
            </div>

        </div>

             <div class="user-card-message">

                <!-- section user photo  -->
                <div class="user-photo-message">
                    <div class="toule-img"> <img src="{{ asset('assets/images/toulemarket-icon-svg.svg') }}"  alt=""/></div>
                    <div class="user-photo">
                    <img src="{{ asset('assets/images/uriel_profil.jpg') }}"  alt=""/>
                    </div>
                </div>

                <div class="separator-element"></div>

                <!-- contente message  -->
                <div class="user-message-section">
                    <div><span class="user-message-objet">@ObjetDuMessage </span><label class="badge-element">99+</label></div>
                    <span class="user-message-content">Quapropter a natura mihi videtur potius quam ab indigentia orta amicitia.</span>
                    <span class="user-message-time">Il y’a 1 heure</span>
                </div>


                <div class="user-button-statut-section" >
                    <div class="online-offline"></div>
                    <div class="vue"><img src="{{ asset('assets/images/toulemarket-icon.svg') }}" alt="" /></div>
                </div>

            </div>

             <div class="user-card-message">

                 <!-- section user photo  -->
                 <div class="user-photo-message">
                     <div class="toule-img"> <img src="{{ asset('assets/images/toulemarket-icon-svg.svg') }}"  alt=""/></div>
                     <div class="user-photo">
                     <img src="{{ asset('assets/images/uriel_profil.jpg') }}"  alt=""/>
                     </div>
                 </div>

                 <div class="separator-element"></div>

                 <!-- contente message  -->
                 <div class="user-message-section">
                     <div><span class="user-message-objet">@ObjetDuMessage </span><label class="badge-element">99+</label></div>
                     <span class="user-message-content">Quapropter a natura mihi videtur potius quam ab indigentia orta amicitia.</span>
                     <span class="user-message-time">Il y’a 1 heure</span>
                 </div>


                 <div class="user-button-statut-section" >
                     <div class="online-offline"></div>
                     <div class="vue"><img src="{{ asset('assets/images/toulemarket-icon.svg') }}" alt="" /></div>
                 </div>

             </div>

             <div class="user-card-message">

                 <!-- section user photo  -->
                 <div class="user-photo-message">
                     <div class="toule-img"> <img src="{{ asset('assets/images/toulemarket-icon-svg.svg') }}"  alt=""/></div>
                     <div class="user-photo">
                     <img src="{{ asset('assets/images/uriel_profil.jpg') }}"  alt=""/>
                     </div>
                 </div>

                 <div class="separator-element"></div>

                 <!-- contente message  -->
                 <div class="user-message-section">
                     <div><span class="user-message-objet">@ObjetDuMessage </span><label class="badge-element">99+</label></div>
                     <span class="user-message-content">Quapropter a natura mihi videtur potius quam ab indigentia orta amicitia.</span>
                     <span class="user-message-time">Il y’a 1 heure</span>
                 </div>


                 <div class="user-button-statut-section" >
                     <div class="online-offline"></div>
                     <div class="vue"><img src="{{ asset('assets/images/toulemarket-icon.svg') }}" alt="" /></div>
                 </div>

             </div>


         </div>
     </div>

     <div class="conversation-section-2">
         <div class="conversation-section-real-time">

             <div class="user-active-infos">
                 <div class="user-active-photo-profil">

                 </div>
                 <div class="user-active-name">
                    @auth
                    {{ Auth::user()->prenom }}
                    @endauth
                 </div>

                 <div class="user-active-current-time">
                     3:45
                 </div>

             </div>

             <div class="user-active-message">
                 Bonjour! je suis intéressé par cet article, avez vous d'autre catalogues ??
             </div>

         </div>

         <div class="conversation-section-real-time-response" >
             <div class="corner-time">
                 11:08
             </div>

             <div class="response-message">
                 <p>Nous avons plusieurs catalogues, concernant celui ci, je peux vous faire une reduction pour plusieurs produits achétés</p>
             </div>

         </div>

         <div class="conversation-section-real-time">

             <div class="user-active-infos">
                 <div class="user-active-photo-profil">

                 </div>
                 <div class="user-active-name">
                    @auth {{ Auth::user()->prenom }} @endauth
                 </div>

                 <div class="user-active-current-time">
                     3:45
                 </div>

             </div>

             <div class="user-active-message">
                 A très bientôt alors
             </div>


         </div>

         <div class="user-active-message-input" style="right: 3px">
             <div class="user-active-input-section">
                 <input type="text" value="" name="search" placeholder="Tapez votre message" id="message-input" autocomplete="off"/>
                 <input type="hidden" value="@auth {{ Auth::user()->prenom }} @endauth" name="search-user" placeholder="Tapez votre message, puis appuyer sur Entrer" id="message-input-current"/>
             </div>
             <div class="button-section">
                 <button type="submit" id="sendmessage_button">
                     <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-image" viewBox="0 0 16 16">
                         <path d="M6.002 5.5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0z"/>
                         <path d="M2.002 1a2 2 0 0 0-2 2v10a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V3a2 2 0 0 0-2-2h-12zm12 1a1 1 0 0 1 1 1v6.5l-3.777-1.947a.5.5 0 0 0-.577.093l-3.71 3.71-2.66-1.772a.5.5 0 0 0-.63.062L1.002 12V3a1 1 0 0 1 1-1h12z"/>
                       </svg>
                 </button>
                 <button type="submit">
                     <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-paperclip" viewBox="0 0 16 16">
                         <path d="M4.5 3a2.5 2.5 0 0 1 5 0v9a1.5 1.5 0 0 1-3 0V5a.5.5 0 0 1 1 0v7a.5.5 0 0 0 1 0V3a1.5 1.5 0 1 0-3 0v9a2.5 2.5 0 0 0 5 0V5a.5.5 0 0 1 1 0v7a3.5 3.5 0 1 1-7 0V3z"/>
                       </svg>
                 </button>
                 <button type="submit">
                     <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-emoji-heart-eyes-fill" viewBox="0 0 16 16">
                         <path d="M8 0a8 8 0 1 0 0 16A8 8 0 0 0 8 0zM4.756 4.566c.763-1.424 4.02-.12.952 3.434-4.496-1.596-2.35-4.298-.952-3.434zm6.559 5.448a.5.5 0 0 1 .548.736A4.498 4.498 0 0 1 7.965 13a4.498 4.498 0 0 1-3.898-2.25.5.5 0 0 1 .548-.736h.005l.017.005.067.015.252.055c.215.046.515.108.857.169.693.124 1.522.242 2.152.242.63 0 1.46-.118 2.152-.242a26.58 26.58 0 0 0 1.109-.224l.067-.015.017-.004.005-.002zm-.07-5.448c1.397-.864 3.543 1.838-.953 3.434-3.067-3.554.19-4.858.952-3.434z"/>
                       </svg>
                 </button>
             </div>
         </div>


     </div>
</div>

</div>



</div>

<script>

</script>

