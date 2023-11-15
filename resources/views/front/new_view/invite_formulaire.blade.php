<?php

use Illuminate\Support\Facades\DB;
use App\Models\Produit;

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
} else {
    $maLangue = [];
    $maVille = [];
    $maProvince = [];
    $maDevise = [];
}

$maPosition = $_SESSION['config']['ma-position'];
// print_r($maPosition);
?>
<style type="text/css">
    @import url('https://fonts.googleapis.com/css2?family=Gelasio:ital@1&family=Licorice&family=Noto+Sans&family=Roboto:wght@300;400&family=Tajawal:wght@300&display=swap');

    .modal-dialog {
        position: relative;
    }

    .custom-class {
        display: none;
    }

    .modal-content {
        border-radius: 6px;
        background-color: #FFFFFF;
        box-shadow: 0 5px 15px 0 rgba(0,0,0,0.35);
    }

    .modal-dialog-inviter, .modal-content-inviter ,.modal-body-inviter {
        height: 618px !important;
        width: 432px;
    }

    .modal-header {
        text-align: center;
    }

.modal-header h4 {
    height: 24px;
    width: 276px;
    color: #191970;
    font-family: Roboto;
    font-size: 21px;
    font-weight: 500;
    letter-spacing: 0;
    line-height: 23px;
    text-align: center;
    position: relative;
    margin-left: auto;
    margin-right: auto;
}

.modal-body {
    margin: 0px;
    padding: 0px;
}

.payement-element-container-2 {
    display: flex;
    flex-direction: column;
    justify-content: center;
    align-items: flex-start;
    position: relative;
    left: -15px;
}

.payement-card {
    display: flex;
    justify-content: flex-start;
    align-items: center;
    box-sizing: border-box;
    height: 56px;
    width: 402px;
    border: 1px solid #9B9B9B;
    border-radius: 6px;
    position: relative;
    margin-left: auto;
    margin-right: auto;
    background-color: #FFFFFF;
}

.checkbox-element {
    margin-left: 30px;
}

.checkbox-element input{
    height: 16px;
    width: 16px;
    background-color: #191970;
}

input [type='radio']:checked::after {
    width: 15px;
    height: 15px;
    border-radius: 15px;
    top: -2px; left: -1px;
    position: relative;
    background-color: #ffa500;
    content: ''; display: inline-block;
    visibility: visible;
    border: 2px solid white;
}

.payement-element-img {
    margin-left: 10px;
}

.payement-element-img  img{
    height: 28px;
    width: 44px;
}

.payement-element-text {
    height: 18px;
    color: #191970;
    font-family: Roboto;
    font-size: 16px;
    font-weight: 500;
    letter-spacing: -0.39px;
    line-height: 18px;
    margin-left: 10px;
}

.footer-button {
    position: relative;
    margin-left: auto;
    margin-right: auto;
    margin-top: 20px;
}
.annul-button {
    box-sizing: border-box;
    height: 37px;
    width: 194px;
    border: 1px solid #1A7EF5;
    border-radius: 6px;
    background-color: #FFFFFF;

    color: #1A7EF5;
    font-family: Roboto;
    font-size: 16px;
    font-weight: 500;
    letter-spacing: 0.31px;
    line-height: 16px;
    text-align: center;
}

.annul-button-2 {
    box-sizing: border-box;
    height: 37px;
    width: 194px;
    border: 1px solid #1A7EF5;
    border-radius: 6px;
    background-color: #FFFFFF;

    color: #1A7EF5;
    font-family: Roboto;
    font-size: 16px;
    font-weight: 500;
    letter-spacing: 0.31px;
    line-height: 16px;
    text-align: center;
}

.ajouter-button {
    height: 37px;
    width: 194px;
    border-radius: 6px;
    background-color: #1A7EF5;

    color: #FFFFFF;
    font-family: Roboto;
    font-size: 14px;
    font-weight: 500;
    letter-spacing: 0.31px;
    line-height: 14px;
    text-align: center;
    border: none;
}


.payement-card:hover{
background-color: #F5F5F5;
cursor: pointer;
}

.ajout-carte-credit-header {
    display: flex;
    flex-direction: column;
    justify-content: center
}

.ajout-carte-credit-header h5{
    height: 20px;
    color: #191970;
    font-family: Roboto;
    font-size: 20px;
    font-weight: 500;
    letter-spacing: 0;
    line-height: 20px;
    text-align: center;
}

.ajout-carte-credit-header h6 {
    height: 16px;
    width: 342px;
    color: #191970;
    font-family: Roboto;
    font-size: 14px;
    letter-spacing: -0.34px;
    line-height: 16px;
    text-align: center;

}

.input-element-carte-credit {
    display: flex;
    flex-direction: column;
    margin-bottom: 5px;
}

.achat_inviter_body .input-element-carte-credit-last input {
    box-sizing: border-box;
    height: 41px;
    width: 402px;
    border: 1px solid #9B9B9B;
    border-radius: 6px;
    background-color: #F8F8F8;
    padding-left: 15px;

}

.achat_inviter_body .input-element-carte-credit input {
    box-sizing: border-box;
    height: 41px;
    width: 402px;
    border: 1px solid #9B9B9B;
    border-radius: 6px;
    background-color: #F8F8F8;
    padding-left: 13px;

}

.achat_inviter_body .payement-element-container-2 {
    margin-left: 15px;
    margin-right: 15px;
}

.carte-carte {
    display: flex;
    column-gap: 14px;
}

.numero-ccv {
    display: flex;
    flex-direction: column;

}

.numero-ccv input {
    box-sizing: border-box;
    height: 41px;
    width: 194px;
    border: 1px solid #9B9B9B;
    border-radius: 6px;
    background-color: #F8F8F8;
    padding-left: 15px;
}

.input-element-carte-credit label {
    color: #191970;
    font-family: Roboto;
    font-size: 14px;
    font-weight: 500;
    letter-spacing: -0.34px;
    line-height: 14px;
    margin-bottom: 5px;
}

.il-sagit-de {
    display: flex;
    width: 402px;
    position: relative;
    margin-left: auto;
    margin-right: auto;
    margin-bottom: 17px;
    /* margin-top: 17px; */
}

.il-sagit-de .checkbox-carte-default {
    color: #4A4A4A;
    font-family: Roboto;
    font-size: 13px;
    letter-spacing: -0.31px;
    line-height: 18px;
}

.input-group {
    height: 41px;
    width: 194px;
}

.input-group-prepend .input-group-text {
    box-sizing: border-box;
    height: 41px;
    width: 41px;
    border: 1px solid #9B9B9B;
    border-radius: 6px 0 0 6px;
    background-color: #FFFFFF;
}

.form-select {
    box-sizing: border-box;
    height: 41px;
    border: 1px solid #9B9B9B;
    border-radius: 0 6px 6px 0;
    background-color: #F8F8F8;
}

.code-post-2 input {
    height: 41px;
    width: 194px;
    background-color: #F8F8F8;
    border: 1px solid #9B9B9B;
    border-radius: 6px;
}

.label-email {
    height: 18px;
    width: 306px;
    color: #191970;
    font-family: Roboto;
    font-size: 15px;
    font-weight: 500;
    letter-spacing: 0;
    line-height: 15px;
}

.code-correct {
    background-size: 16px;
}

.code-correct1 {
    background-size: 16px;
}

.avoir-un-compte {
    height: 12px;
    width: 291px;
    font-family: Roboto;
    font-size: 12px;
    font-weight: 500;
    letter-spacing: -0.09px;
    line-height: 12px;
}

.address-livraison {
    height: 14px;
    width: 138px;
    color: #191970;
    font-family: Roboto;
    font-size: 14px;
    font-weight: 500;
    letter-spacing: 0;
    line-height: 14px;
    /* margin-top: 20px; */
    margin-bottom: 5px;
}

.type-adress-de {
    height: 14px;
    width: 138px;
    color: #191970;
    font-family: Roboto;
    font-size: 14px;
    font-weight: 500;
    letter-spacing: 0;
    line-height: 14px;
    margin-bottom: 10px;
}

.localisation-button-1-new {
    height: 31px;
    width: 133.75px;
    border-radius: 6px;
    background-color: #1A7EF5;
    color: #FFFFFF;
    font-family: Roboto;
    font-size: 13px;
    font-weight: 500;
    letter-spacing: -0.31px;
    line-height: 16px;
    border: none;
    position: absolute;
    margin-left: 263px;
    margin-top: 5px;
}

.localisation-button {
    height: 31px;
    width: 133.75px;
    border-radius: 6px;
    background-color: #1A7EF5;
    color: #FFFFFF;
    font-family: Roboto;
    font-size: 13px;
    font-weight: 500;
    letter-spacing: -0.31px;
    line-height: 16px;
    border: none;
    position: absolute;
    top: 242px;
    float: right;
    right: 5px;
}


.ckeckbox1 {
    border-radius: 4px;
    background-color: #1A7EF5;
    height: 20px;
    width: 20px;
    margin-right: 8px;
}

.ckeckbox1 span {
    position: relative;
    top: -15px;

}

.addresse-user-invite {
    height: 20px;
    width: 402px;
    margin-bottom: 15px;
}

.add-user-invite {
    height: 18px;
    width: 121px;
    color: #4A4A4A;
    font-family: Roboto;
    font-size: 13px;
    letter-spacing: 0;
    line-height: 18px;
    position: relative;
    top: -5px;
}

.ajouter-button-continuer {
    height: 37px;
    width: 194px;
    border-radius: 6px;
    background-color: #1A7EF5 ;
    border: none;
    color: #FFFFFF;
    font-family: Roboto;
    font-size: 16px;
    font-weight: 500;
    letter-spacing: 0.35px;
    line-height: 16px;
    text-align: center;
}

.ajout-adress-livrason-disabled {
    background-color: #9B9B9B !important;
    pointer-events: none;
}

.grise-invite{
    background-color: #D8D8D8 !important;
    pointer-events: none;
}

.user-save-infos {
    height: 45.5px;
    width: 402px;
    background-color: #F8F8F8;
    margin-top: 10px;
    margin-bottom: 15px;
    align-items: center;
    justify-content: flex-start;
    display: flex;
    padding-top: 18px;
    padding-left: 10px;
    border-radius: 6px;
}

.user-save-infos-child {
    width: 309px !important;
    height: 28px;
    font-family: 'Roboto';
    font-style: normal;
    font-weight: 400;
    font-size: 13px;
    line-height: 14px;
    letter-spacing: -0.0933333px;
    color: #4A4A4A;
    margin-right: 25px;
    margin-bottom: 15px;
}

.user-save-infos-line {
    width: 402px;
    background-color: #D8D8D8;
    height:1px;
    margin-bottom: 10px;
}

.inviter-adress-map {
    width: 865px !important;
    left: -237px;
}

.achat_invite_map_section {
    width: 402px;
    height: 100%;
}


.spinner-border-helper-invite {
    width: 1.5rem !important;
    height: 1.5rem !important;
    vertical-align: -0.125em;
    border: 0.25em solid currentColor;
    border-radius: 50%;
    border-color: #D8D8D8 !important;
    border-right-color: #1A7EF5!important;
    -webkit-animation: .75s linear infinite spinner-border;
    animation: .75s linear infinite spinner-border;
}

.spinner-locationk {
    position: absolute;
    margin-left: 10px;
    margin-top: 9px;
}

.btn-location-hover:hover {
    background-color: #146FDA;
}

.localisation-button-1:hover {
    color: #FFFFFF;
    background-color: #146FDA;
}

.localisation-button-1:active {
    background-color: #2C3EDD !important;
}


.ajouter-button-continuer:hover {
    color: #FFFFFF;
    background-color: #146FDA;
}

.ajouter-button-continuer:active {
    background-color: #2C3EDD !important;
}

.annul-button-2:hover {
    color: #146FDA !important;
    border-color: #146FDA !important;
}

.annul-button-2:active {
    color: #2C3EDD !important;
    border-color: #2C3EDD !important;
}

.center-forget-modal {
    top: 47% !important;
    transform: translateY(-50%) !important
}

.add-address-mobile-map-section-inviter-hidden {
    display: none !important;
}

.achat_inviter_content {
    width: 840px !important;
    height: 631px !important;
    background-color: #fff;
    border-radius: 6px;
}

@media only screen and (max-width: 540px) {
    .payement-element-container-2{
        display:none;
    }

    #FormulaitreInviteClosed{
        z-index: 15000;
        position: absolute;
        margin-left: 320px !important;
        margin-top: -588px !important;
        right: 20px !important;
    }

    .user-save-infos-line {
        width: 77% !important;
        background-color: #D8D8D8;
        height: 1px;
        margin-bottom: 10px;
    }

    .add-user-invite {
        height: 18px;
        width: 121px;
        color: #4A4A4A;
        font-family: Roboto;
        font-size: 12px !important;
        letter-spacing: 0;
        line-height: 18px;
        position: relative;
        top: -5px;
    }

    .block_inv_mobile{
        display:block;
    }

    #adresse_res{
        margin-right: 10px !important;
    }

    .numero-ccv input {
        box-sizing: border-box;
        height: 41px;
        width: 148px !important;
        border: 1px solid #9B9B9B;
        border-radius: 6px;
        background-color: #F8F8F8;
        padding-left: 15px;
    }

    .code-post-2 input {
        height: 41px;
        width: 140px;
        background-color: #F8F8F8;
        border: 1px solid #9B9B9B;
        border-radius: 6px;
        margin-left: -38px;
    }

    .select-main-div {
        display: flex;
        width: 77%;
        box-sizing: border-box;
        background: url(../assets/images/arrow-down.svg) no-repeat;
        background-position: 97% center;
        cursor: pointer;
        overflow: hidden;
    }

    .input-element-carte-credit label {
            height: 16px;
            color: #191970;
            font-family: Roboto;
            font-size: 12px !important;
            font-weight: bold;
            letter-spacing: -0.34px;
            line-height: 16px;
            margin-bottom: 7px;
        }
        .avoir-un-compte {
        margin-left: 30px;
    }

    .localisation-button-1 {
        height: 31px;
        width: 133.75px;
        border-radius: 6px;
        background-color: #1A7EF5;
        color: #FFFFFF;
        font-family: Roboto;
        font-size: 13px;
        font-weight: 500;
        letter-spacing: -0.31px;
        line-height: 16px;
        border: none;
        position: absolute;
        top: 242px;
        float: right;
        right: 100px;
    }

    .footer-button {
        margin-left: auto;
        margin-right: 35px !important;
    }

    .annul-button-2 {
        box-sizing: border-box;
        height: 37px;
        width: 140px;
        border: 1px solid #1A7EF5;
        border-radius: 6px;
        background-color: #FFFFFF;
        color: #1A7EF5;
        font-family: Roboto;
        font-size: 16px;
        font-weight: 500;
        letter-spacing: 0.31px;
        line-height: 16px;
        text-align: center;
    }

    .ajouter-button-continuer {
        height: 37px;
        width: 140px;
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

    .ajout-carte-credit-header h5 {
        height: 20px;
        color: #191970;
        font-family: Roboto;
        font-size: 14px;
        font-weight: 500;
        letter-spacing: 0;
        line-height: 20px;
        text-align: center;
    }

    .user-save-infos {
        height: 45.5px;
        width: 77% !important;
        background-color: #F8F8F8;
        margin-top: 10px;
        margin-bottom: 15px;
        align-items: center;
        justify-content: flex-start;
        display: flex;
        padding-top: 18px;
        padding-left: 10px;
        border-radius: 6px;
    }

    .achat_inviter_body .input-element-carte-credit-last input {
        box-sizing: border-box;
        height: 41px;
        width: 97%;
        border: 1px solid #9B9B9B;
        border-radius: 6px;
        background-color: #F8F8F8;
        padding-left: 15px;
    }

    .achat_inviter_body .input-element-carte-credit input {
        box-sizing: border-box;
        height: 41px;
        width: 97%;
        border: 1px solid #9B9B9B;
        border-radius: 6px;
        background-color: #F8F8F8;
        padding-left: 13px;
    }

    .localisation-button-1-new {
        margin-left: 162px !important;
    }

    .inviter-adress-map {
        width: 340px !important;
        left: 20px;
    }

    .add-address-mobile-map-section-inviter {
        width: 310px !important;
        height: 318px;
        display: block;
        position: absolute;
        background: red;
        /* bottom: 0px; */
        /* margin-bottom: -10px; */
        margin-top: 210px;
        border-radius: 0px 0px 6px 6px;
        margin-left: 2px;
        box-shadow: rgba(0, 0, 0, 0.07) 0px 1px 1px, rgba(0, 0, 0, 0.07) 0px 2px 2px, rgba(0, 0, 0, 0.07) 0px 4px 4px, rgba(0, 0, 0, 0.07) 0px 8px 8px, rgba(0, 0, 0, 0.07) 0px 16px 16px;
    }

    .mobile-map-container-zone-inviter {
        width: 310px !important;
        height: 318px;
    }

    .modal-body-inviter {
        width: 320px !important;
    }

    .achat_inviter_content {
        width: 320px !important;
        height: 579px !important;
    }

    .payement-element-container-2 {
        position: relative;
        left: -25.5px;
    }

    .to-remove-on-mobile {
        display: none !important;
    }

    .invite_common {
    width: 97% !important;
    height: 90% !important;
    background-color: #fff;
    margin-left: 9px;
}

    .user-save-infos {
        display: none !important;
    }

}

.main_panier_V2 {
    height: 100%;
    width: 100%;
    position: fixed !important;
    z-index: 100;
    background-color: rgba(0, 0, 0, 0.5);
    right: 0px;
    overflow: hidden;
}



.achat_inviter_header {
    height: 40px;
    width: 100%;
    border-radius: 6px 6px 0px 0px;
    border-bottom: 1px solid #D8D8D8;
}

.achat_inviter_body {
    height: 591px;
    width: 100%;
    border-radius: 0px 0px 6px 6px;
    display: flex;
    justify-content: center;
    column-gap: 10px;
    padding-top: 10px;
}

.invite_common {
    width: 48%;
    height: 100%;
    background-color: #fff;
}

</style>


    <div class="main_panier_v2 input-none-panier-v2" id="FormulaitreInvite">
    <button id="FormulaitreInviteClosed" onclick="closeInviterModal()" type="button" class="close-btn-panier-bis" style="z-index: 15000; position:absolute; margin-left: 840px; margin-top: -641px;" >
        <img src="{{ asset('assets/images/close-btn.svg') }}" alt="">
    </button>
    <div class="achat_inviter_content">

        <div class="achat_inviter_header ajout-carte-credit-header" style="margin-bottom: 0px !important">
            <h5 class="header-element" style="margin-bottom: -2px">Où devons-nous envoyer votre commande ?</h5>
        </div>

        <div class="achat_inviter_body">

            <div class="achat_inviter_form invite_common">
                <div class="input-element-carte-credit">
                    <label for="email" class="label-email">Vous n'avez pas d'identifiant TOULE MARKET</label>
                    <input class="my-form-field code-correct1" type="text" name="numeroCarte" id="email-user-invite" placeholder="Adresse e-mail">
                </div>

                <div class="avoir-un-compte" onclick="openConnection_Modal()">
                    Vous avez déjà un compte ? <a href="#">Ouvrir une session</a>
                </div>
                <!-- addresse de livraison  -->
                <div class="user-save-infos">

                    <div class="user-save-infos-child">
                        <p >Je souhaite que mes informations personnelles soient
                            mémorisées pour mes prochaines visites.</p>
                    </div>

                    <div class="switch-config" style="margin-bottom: 16px">
                        <div class="mon-switch switch-0" data-for="#formEditConfigUser_notification_bureau-input-inviter" data-is-active="0">
                            <div class="toggle-switch"></div>
                        </div>
                        <input type="hidden" data-old="0" name="formEditConfigUser_notification_bureau" value="1" id="formEditConfigUser_notification_bureau-input-inviter">
                    </div>

                </div>

                <div class="user-save-infos-line"></div>

                <label for="prenom" class="address-livraison">Adresse de livraison</label>
                <div class="carte-carte" style="margin-bottom: 15px;">

                    <div class="date-expiration numero-ccv">
                        <input type="text" class="my-form-field" name="numero-ccv" id="prenom-nom-user-invite" placeholder="Prénom & nom">
                    </div>

                    <div class="numero-ccv">
                        <input class="my-form-field code-correct" type="text" name="numero-ccv" id="numero-user-invite" placeholder="Numéro portable">
                    </div>

                </div>

                <div class="input-element-carte-credit" style="margin-bottom: 15px !important">

                    <div style="display: flex;">

                            <input autocomplete="off" class="my-form-fieldd tm-input-error-quartier" type="text" name="numeroCarte" style="padding-right:150px" id="address-quartier-user-invite" placeholder="Adresse (Quartier/Rue/...)" onfocus="showInviterMobileMap()" >

                        <button class="localisation-button-1-new" style="padding-left: 10px" onclick="prendreMesCoordoneesSInviter()">

                        <img style="position: absolute; margin-left: -12px" src="/assets/images/geo-alt-fill.svg" alt="" /> Me géolocaliser</button>
                        <span  aria-label="Me geolocaliser" class="spinner-border spinner-border-helper-invite hide spinner-locationk" id="location_spiner3-bis-invite" role="status" aria-hidden="true"></span>

                        <input name="livraison_addres_latitude" type="hidden" id="livraison_adress_lat_inviter" value="" />
                        <input name="livraison_addres_longitude" type="hidden" id="livraison_adress_lng_inviter" value="" />
                    </div>

                    </div>

                    <div class="input-element-carte-credit" style="margin-bottom: 10px !important">
                        <input  type="text" class="my-form-field" name="numeroCarte" id="comp-addre-user-invite" placeholder="Compléments (ex: immeuble, étage...)">
                    </div>

                    <div class="rows carte-carte" style="margin-bottom: 15px">
                        <div class="cols">

                        <div style="width: 194px; ">
                        <input
                            data-position="{{ \App\Models\Pays::getPays()->id }}"
                            type="hidden"
                            name="formAddCarnetAdresseUser_ville"
                            id="formEditUser_city_id"
                            value="Libreville"
                            data-select="#formEditUser_state-input"
                            data-load="1"
                            data-csrf="{{ csrf_token() }}"
                            data-form-key="formEditUser_"
                        >
                        <div class="my-select-img" id="formEditUser_city_id-input">
                            <div class='parent-0 select-main-div my-form-field  pl-0 bg-x' data-ul-id='#form-profil-ville'>
                                <div style="border-right: 1px solid #8d8787 !important;"  class='select-main-div-img'><img src='{{ $monPays->getImage() }}' alt=''></div>
                                <div class='select-main-div-text'>Libreville</div>
                            </div>
                        </div>
                        <div id="formEditUser_city_id-error" class="formEditUser_error-text error-text error-msg"></div>
                    </div>
                    </div>

                    <div class="cols code-post-2">
                        <input type="text" class="form-controlx my-form-field input-element" id="code-poste-user-invite" placeholder="Code postal" name="Nom">
                    </div>
                    </div>

                            <!-- s'agit-it  -->
        <label for="prenom" class="type-adress-de">Il s'agit de:</label>

        <div class="addresse-user-invite">
            {{-- <label for="il-sagit">Il s'agit de</label> --}}

            <div style="display: flex">
                <label for="addrcom" style="margin-right: 70px" id="adresse_res">
                    <input type="checkbox"  class="ckeckbox1" checked value="Residentiel"><span class="add-user-invite">Adresse résidentielle</span>
                </label>
                <label for="addrcom">
                    <input type="checkbox"  class="ckeckbox1" value="Entreprise"><span class="add-user-invite">Adresse pro/commerciale</span>
                </label>
            </div>

        </div>

        <div class="input-element-carte-credit-last">
            <input type="text" class="my-form-field grise-invite" name="numeroCarte" id="nom-entreprise-user-invite" placeholder="Nom de l'entreprise">
        </div>

        <div class="footer-button" style="position: relative; display: flex; justify-content: center; align-items: center; column-gap: 14px; margin-top: 25px">
            <button class="annul-button-2" onclick="annulerInviteAddresse()">Annuler</button>
            <button class="ajouter-button-continuer ajout-adress-livrason-disabled" id="btn_addr_livraison-invite" onclick="saveInvitation()">Continuer</button>
        </div>

        </div>
        <div class="achat_inviter_map invite_common to-remove-on-mobile">

            <div class="payement-element-container-2" style="border-radius: 6px; height: 97%">

                <div class="achat_invite_map_section" id="achat_invite_map_section_id" style="border-radius: 6px">

                </div>


                </div>

            </div>

        <div class="add-address-mobile-map-section-inviter add-address-mobile-map-section-inviter-hidden">
            <div class="mobile-map-container-zone-inviter" id="mobile-add-adress-map-2-inviter">

            </div>
        </div>

        </div>

        </div>

    </div>
</div>


<script src="{{ asset('assets/jQuery-Mask-Plugin-master/dist/jquery.mask.min.js') }}"></script>
<script>

$(document).ready(function() {
$('.ckeckbox1').click(function() {

$(this).prop('checked', true);

if ($(this).val() === 'Entreprise') {
    $('#nom-entreprise-user-invite').removeClass('grise-invite')
    $('#btn_addr_livraison-invite').addClass('ajout-adress-livrason-disabled')
}else{
    console.log('NoN')
    $('#nom-entreprise-user-invite').addClass('grise-invite')
    $('#nom-entreprise-user-invite').removeClass('input-error-warning-long')
    $('#nom-entreprise-user-invite').val("")
}
$.each($('.ckeckbox1').not($(this)), function(key, value) {
    $(value).prop('checked', false);
})

})

})

$('#numero-user-invite').mask('000000000')
$('#code-poste-user-invite').mask('00000')

$('#ajout-addr-numero-cvv-user-connected').mask('000000000')
$('#ajout-addr-code-poste-user-connected').mask('00000')

function ValidateEmailInvite(mailval){
    var emailv = mailval
    if (/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/.test(emailv))
    {
        return (true)
    }else {
        return false;
    }
}

function initAutocomplete() {

    var autocomplete = new google.maps.places.Autocomplete(document.getElementById('address-quartier-user-invite'));

    // Optional: If you want to do something with the selected place, use the 'place_changed' event.
    autocomplete.addListener('place_changed', function() {
      var place = autocomplete.getPlace();
      if (!place.geometry) {
        // The user selected a place that is not in the Places database.
        return;
      }

      // Use the 'place' object to access place details (e.g., place.geometry.location.lat() and place.geometry.location.lng() for latitude and longitude).
      console.log('Selected place:', place.name, place.geometry.location.lat(), place.geometry.location.lng());
    });
  }

function open_save_button () {

let email_invite1 = $('#email-user-invite');
let nom_prenom1 = $('#prenom-nom-user-invite');
let num_invite1 = $('#numero-user-invite');
let addr_quartier1 = $('#address-quartier-user-invite');
let comp_addr1 = $('#comp-addre-user-invite');

// ----------------------------- input values ---------------------------
let email_invite2 = $('#email-user-invite').val();
let nom_prenom2 = $('#prenom-nom-user-invite').val();
let num_invite2 = $('#numero-user-invite').val();
let addr_quartier2 = $('#address-quartier-user-invite').val();
let comp_addr2 = $('#comp-addre-user-invite').val();

let code_poste_invite1 = $('#code-poste-user-invite');
let nom_entreprise_invite = $('#nom-entreprise-user-invite');
// pwd-border-error
if (!$(email_invite1).hasClass('input-error-warning-long') && !$(nom_prenom1).hasClass('input-error-warning') && !$(num_invite1).hasClass('input-error-warning') && !$(addr_quartier1).hasClass('pwd-border-error') && email_invite2.length > 0 && nom_prenom2.length > 0 && num_invite2.length > 0 && addr_quartier2.length > 0) {
    $('#btn_addr_livraison-invite').removeClass('ajout-adress-livrason-disabled')
}else {
    $('#btn_addr_livraison-invite').addClass('ajout-adress-livrason-disabled')
}
}
function saveInvitation() {

let email_invite = $('#email-user-invite').val();
let nom_prenom = $('#prenom-nom-user-invite').val();
let num_invite = $('#numero-user-invite').val();
let addr_quartier = $('#address-quartier-user-invite').val();
let comp_addr = $('#comp-addre-user-invite').val();
let valeur_invite = $('#valeur-user-invite').find(':selected').val();
let code_poste_invite = $('#code-poste-user-invite').val();
let nom_entreprise_invite = $('#nom-entreprise-user-invite').val();
let rember_this_adress = $('#formEditConfigUser_notification_bureau-input-inviter').val()

let data_adresse_livraison = {
    email_invite: email_invite,
    nom_prenom: nom_prenom,
    num_invite: num_invite,
    addr_quartier: addr_quartier,
    comp_addr: comp_addr,
    code_poste_invite: code_poste_invite,
    nom_entreprise_invite: nom_entreprise_invite,
    memorise: rember_this_adress
}

window.localStorage.setItem('adresse_invite', JSON.stringify(data_adresse_livraison));

$.ajax({
    type: 'POST',
    url: '/set_inviter_session',
    data: data_adresse_livraison,
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    },

    success: function(response) {
        console.log('Retour de la session invité est:', response)
    }

})

$('#invite-email-connected').text(email_invite)
$('#invite-nom-prenom-connected').text(nom_prenom)
$('#invite-numero_tel-connected').text(num_invite)
$('#invite-quartier-address-connected').text(addr_quartier)
$('#comp-addr-supp-connected').text(comp_addr)
$('#invite-pays-connected').text('Libreville')
$('#invit-code-postal-connected').text(code_poste_invite)

// --------------payement tab -----------------------------------
$('#invite-email-connected-2').text(email_invite)
$('#invite-nom-prenom-connected-2').text(nom_prenom)
$('#invite-numero_tel-connected-2').text(num_invite)
$('#invite-quartier-address-connected-2').text(addr_quartier)
$('#comp-addr-supp-connected-2').text(comp_addr)
$('#invite-pays-connected-2').text('Libreville')
$('#invit-code-postal-connected-2').text(code_poste_invite)

//---------- Traitement mobile -------------
$('.mobile-user-nom-prenom').text(email_invite)
$('.mobile-user-adress').text(addr_quartier)
$('#mobile-user-ville').text('Libreville')
$('#mobile-user-complement').text(comp_addr)
$('#mobile-user-phone').text(num_invite)

$('#mobile-login-data-id').show()
$('#mobile-login-form-section-id').hide()
$('.mobile-panier-user-email-val').text(email_invite)
// --------- Fin traitement mobiles ----------

$('#tab-form-connection').addClass('infos-invite-none')
$('#section-invite-infos-connected').removeClass('infos-invite-none')
$('#FormulaitreInvite').addClass('input-none-panier-v2')
// $('#FormulaitreInvite').modal('hide');

}

// --------------------- email ----------------------------
$(document).on('blur', '#email-user-invite', function() {
let email_valeur = $(this).val()
let isvalid = ValidateEmailInvite(email_valeur)

if (!isvalid) {
    $('#email-user-invite').addClass('input-error-warning-long')
    console.log('Invalide')
}else {
    $('#email-user-invite').removeClass('input-error-warning-long')
}

if (email_valeur.length == 0) {
    $('#email-user-invite').addClass('input-error-warning-long')
}
})

$(document).on('keyup', '#email-user-invite', function() {
let email_valeur = $(this).val()
if (email_valeur.length > 0 && $('#email-user-invite').hasClass('input-error-warning-long')) {
    $('#email-user-invite').removeClass('input-error-warning-long')
}else if (email_valeur.length == 0) {
    $('#email-user-invite').addClass('input-error-warning-long')
}

open_save_button()

})

function onlyLettersIvite(input) {
var regex = /[^a-zA-ZÀ-ÿ-._ ]/gi;
input.value = input.value.replace(regex, "");
if (input.value.length < 3) {
console.log('Ya un traitement ici')

}else {

}
}

// ------------------------ nom prenom ------------------------------
$(document).on('blur', '#prenom-nom-user-invite', function() {
let email_valeur = $(this).val()
if (email_valeur.length == 0) {
    $('#prenom-nom-user-invite').addClass('input-error-warning')
}
})

$(document).on('keyup', '#prenom-nom-user-invite', function() {
onlyLettersIvite(this)
let email_valeur = $(this).val()
if (email_valeur.length > 0 && $('#prenom-nom-user-invite').hasClass('input-error-warning')) {
    $('#prenom-nom-user-invite').removeClass('input-error-warning')
}else if (email_valeur.length == 0) {
    $('#prenom-nom-user-invite').addClass('input-error-warning')
}

open_save_button()

})

// ------------------------------- numero tel -------------------------------------
$(document).on('blur', '#numero-user-invite', function() {
let email_valeur = $(this).val()
if (email_valeur.length == 0) {
    $('#numero-user-invite').addClass('input-error-warning')
}
})

$(document).on('keyup', '#numero-user-invite', function() {
let email_valeur = $(this).val()
if (email_valeur.length > 0 && $('#numero-user-invite').hasClass('input-error-warning')) {
    $('#numero-user-invite').removeClass('input-error-warning')
}else if (email_valeur.length == 0) {
    $('#numero-user-invite').addClass('input-error-warning')
}

open_save_button()
})


// ---------------------------- addresse quartier -----------------------
$(document).on('blur', '#address-quartier-user-invite', function() {
let email_valeur = $(this).val()
if (email_valeur.length == 0) {
    $('#address-quartier-user-invite').addClass('pwd-border-error')
}

})

$(document).on('keyup', '#address-quartier-user-invite', function() {
let email_valeur = $(this).val()
if (email_valeur.length > 0 && $('#address-quartier-user-invite').hasClass('pwd-border-error')) {
    $('#address-quartier-user-invite').removeClass('pwd-border-error')
}else if (email_valeur.length == 0) {
    $('#address-quartier-user-invite').addClass('pwd-border-error')
}

open_save_button()

})

// ---------------------- nom entreprise nom-entreprise-user-invite -----------------------
$(document).on('blur', '#nom-entreprise-user-invite', function() {
let email_valeur = $(this).val()
if (email_valeur.length == 0) {
    $('#nom-entreprise-user-invite').addClass('input-error-warning-long')
}

})

$(document).on('keyup', '#nom-entreprise-user-invite', function() {

let email_valeur = $(this).val()
if (email_valeur.length > 0 && $('#nom-entreprise-user-invite').hasClass('input-error-warning-long')) {
    $('#nom-entreprise-user-invite').removeClass('input-error-warning-long')
}else if (email_valeur.length == 0) {
    $('#nom-entreprise-user-invite').addClass('input-error-warning-long')
}

open_save_button()

})

function closeInviterModal() {
    $('#FormulaitreInvite').addClass('input-none-panier-v2')
    // $('#FormulaitreInvite').modal('hide')
}

function editInviteData() {

let edit_email = $('#invite-email').text()
let edit_nom_prenom = $('#invite-nom-prenom').text()
let edit_numero_phone = $('#invite-numero_tel').text()
let edit_addr_phone = $('#invite-quartier-address').text()
let edit_code_postal = $('#invit-code-postal').text()
let comp_addre = $('#comp-addr-supp').text()

$('#email-user-invite').val(edit_email);
$('#prenom-nom-user-invite').val(edit_nom_prenom);
$('#numero-user-invite').val(edit_numero_phone);
$('#address-quartier-user-invite').val(edit_addr_phone);
$('#comp-addre-user-invite').val(comp_addre);
$('#code-poste-user-invite').val(edit_code_postal)
// --------------------fill all input-----------------
$('#FormulaitreInvite').modal('show');

}

function annulerInviteAddresse() {
$('#email-user-invite').val("");
$('#prenom-nom-user-invite').val("");
$('#numero-user-invite').val("");
$('#address-quartier-user-invite').val("");
$('#comp-addre-user-invite').val("");

$('#code-poste-user-invite').val("");
$('#nom-entreprise-user-invite').val("");
$('#FormulaitreInvite').modal('hide');
}

function openConnection_Modal() {
    $('#FormulaitreInvite').addClass('input-none-panier-v2')
    load__invite_resgister_login()
// $('#FormulaitreInvite').modal('hide')
// $('#inviteRegisterLoginModal').modal('show')
}

var marker_achat_invite;
var map_chat_process_invite;

function initMapAchatProcessInvite() {
    const input_invite_search = document.getElementById('address-quartier-user-invite');

var myLatLng = {lat: 0.3924100, lng: 9.4535600};

map_chat_process_invite = new google.maps.Map(document.getElementById('achat_invite_map_section_id'), {
    zoom: 15,
    center: myLatLng
});

const infoWindow = new google.maps.InfoWindow();

marker_achat_invite = new google.maps.Marker({
    position: myLatLng,
    map: map_chat_process_invite,
    draggable: true,
    title: 'Hello World!'
});

var geocoder = new google.maps.Geocoder();

// movement des markers
marker_achat_invite.addListener("dragend", (event) => {
    // infoWindow.close();
    const position = marker_achat_invite.position;
    infoWindow.setContent(
    `Pin dropped at: ${position.lat()}, ${position.lng()}`
    );
    // infoWindow.open(marker.map, marker);

    geocoder.geocode({'location': position}, function(results, status) {
        if (status === 'OK') {
            if (results[0]) {
            console.log(results[0].formatted_address);
            $('#address-quartier-user-invite').val(results[0].formatted_address)
            } else {
            console.log('No results found');
            }
        } else {
            console.log('Geocoder failed due to: ' + status);
        }
    });

});

const autocomplete = new google.maps.places.Autocomplete(input_invite_search);

autocomplete.bindTo("bounds", map_chat_process_invite);

const infowindow = new google.maps.InfoWindow();
const infowindowContent = document.getElementById("infowindow-content");

infowindow.setContent(infowindowContent);

// Démmarage du choix de la selection
autocomplete.addListener("place_changed", () => {
    // infowindow.close();
    marker_achat_invite.setVisible(false);

    const place = autocomplete.getPlace();

    if (!place.geometry || !place.geometry.location) {
    return;
    }

    // If the place has a geometry, then present it on a map.
    if (place.geometry.viewport) {
    map_chat_process_invite.fitBounds(place.geometry.viewport);
    } else {
    map_chat_process_invite.setCenter(place.geometry.location);
    map_chat_process_invite.setZoom(15);
    }

    marker_achat_invite.setPosition(place.geometry.location);
    marker_achat_invite.setVisible(true);
    infowindowContent.children["place-name"].textContent = place.name;
    infowindowContent.children["place-address"].textContent =
    place.formatted_address;
    // infowindow.open(map, marker);

})

}

function mobileInitMapAchatProcessInvite() {

const input_invite_search = document.getElementById('address-quartier-user-invite');

var myLatLng = {lat: 0.3924100, lng: 9.4535600};

map_chat_process_invite = new google.maps.Map(document.getElementById('mobile-add-adress-map-2-inviter'), {
    zoom: 15,
    center: myLatLng
});

const infoWindow = new google.maps.InfoWindow();

marker_achat_invite = new google.maps.Marker({
    position: myLatLng,
    map: map_chat_process_invite,
    draggable: true,
    title: 'Hello World!'
});

var geocoder = new google.maps.Geocoder();

// movement des markers
marker_achat_invite.addListener("dragend", (event) => {
    // infoWindow.close();
    const position = marker_achat_invite.position;
    infoWindow.setContent(
    `Pin dropped at: ${position.lat()}, ${position.lng()}`
    );
    // infoWindow.open(marker.map, marker);

    geocoder.geocode({'location': position}, function(results, status) {
        if (status === 'OK') {
            if (results[0]) {
            console.log(results[0].formatted_address);
            $('#address-quartier-user-invite').val(results[0].formatted_address)
            } else {
            console.log('No results found');
            }
        } else {
            console.log('Geocoder failed due to: ' + status);
        }
    });

});

const autocomplete = new google.maps.places.Autocomplete(input_invite_search);

autocomplete.bindTo("bounds", map_chat_process_invite);

const infowindow = new google.maps.InfoWindow();
const infowindowContent = document.getElementById("infowindow-content");

infowindow.setContent(infowindowContent);

// Démmarage du choix de la selection
autocomplete.addListener("place_changed", () => {
    // infowindow.close();
    marker_achat_invite.setVisible(false);

    const place = autocomplete.getPlace();

    if (!place.geometry || !place.geometry.location) {
    return;
    }

    // If the place has a geometry, then present it on a map.
    if (place.geometry.viewport) {
    map_chat_process_invite.fitBounds(place.geometry.viewport);
    } else {
    map_chat_process_invite.setCenter(place.geometry.location);
    map_chat_process_invite.setZoom(15);
    }

    marker_achat_invite.setPosition(place.geometry.location);
    marker_achat_invite.setVisible(true);
    infowindowContent.children["place-name"].textContent = place.name;
    infowindowContent.children["place-address"].textContent =
    place.formatted_address;
    // infowindow.open(map, marker);

})

}

function showInviterMobileMap() {

    var tablet_size_listener_min_width = matchMedia("(max-width: 500px)");
    if(tablet_size_listener_min_width.matches) {
        $('.add-address-mobile-map-section-inviter').removeClass('add-address-mobile-map-section-inviter-hidden')
        // mobileInitMapAchatProcess()
        // add-address-mobile-map-section-inviter add-address-mobile-map-section-inviter-hidden
        mobileInitMapAchatProcessInvite()
    }

}

function prendreMesCoordoneesSInviter() {
    $('#location_spiner3-bis-invite').removeClass('hide')
    if (navigator.geolocation) {
    navigator.geolocation.getCurrentPosition(showPositionBisInviter);
    } else {
        // x.innerHTML = "Geolocation is not supported by this browser.";
    }
}

function showPositionBisInviter(position) {

var data_location = position.coords.latitude + ' , ' + position.coords.longitude
const user_location = { lat: position.coords.latitude, lng: position.coords.longitude };

var geocoder = new google.maps.Geocoder();

    geocoder.geocode({
        location: user_location
    }).then((response) => {
    if(response.results[0]) {
        $('#address-quartier-user-invite').val(response.results[0].formatted_address)
        $('#address-quartier-user-invite').removeClass('pwd-border-error')
    }else {
        $('#address-quartier-user-invite').val(data_location)
        $('#address-quartier-user-invite').removeClass('pwd-border-error')
    }

    open_save_button()

 })

marker_achat_invite.setPosition(user_location)
map_chat_process_invite.setCenter(user_location);
map_chat_process_invite.setZoom(15);

$('#location_spiner3-bis-invite').addClass('hide')

// $('#address-quartier-user-invite').val(data_location)

$('#livraison_adress_lat_inviter').val(position.coords.latitude)
$('#livraison_adress_lng_inviter').val(position.coords.longitude)

}

document.getElementById('FormulaitreInvite').addEventListener('click', function(event) {

    var map_section = document.getElementById('mobile-add-adress-map-2-inviter').getElementsByTagName('div')

    var clickedElement = event.target;

    var parentElement = null;
    parentElement = clickedElement.parentNode;

    console.log('The clicked element is => ', clickedElement)
    const modal_section_body = document.getElementById('modal-body-ajout-carte-credit-id')

    var parent_node_map_attr = parentElement.getAttribute('aria-label')
    var parent_node_map_attr2 = parentElement.getAttribute('title')

    const input_adresse = document.getElementById('address-quartier-user-invite');
    const map_container_section = document.getElementById('mobile-add-adress-map-2-inviter')
    const mobile_adress_input_section = document.getElementById('zone-quartier-map-protection')

    if ((event.target === mobile_adress_input_section) || (event.target === input_adresse) || (event.target === parent_node_map_attr2) || (event.target === mobile_adress_input_section) || (parent_node_map_attr === "Map") || (parent_node_map_attr === "Carte")) {

    // $('.add-address-mobile-map-section').removeClass('add-address-mobile-map-section-hidden')
    $('.add-address-mobile-map-section-inviter').removeClass('add-address-mobile-map-section-inviter-hidden')

    }else if(clickedElement.tagName.toLowerCase() === 'area') {

    }else if((clickedElement.getAttribute('aria-label') === 'Show satellite imagery') || (clickedElement.getAttribute('aria-label') === 'Afficher les images satellite')){

    }else if((clickedElement.getAttribute('aria-label') === 'Show street map') || (clickedElement.getAttribute('aria-label') === 'Afficher un plan de ville')) {

    }else if((clickedElement.getAttribute('aria-label') === 'Zoom in') || (clickedElement.getAttribute('aria-label') === 'Zoom avant')){

    }else if((clickedElement.getAttribute('aria-label') === 'Zoom out') || (clickedElement.getAttribute('aria-label') === 'Zoom arrière')) {

    }else if((clickedElement.getAttribute('title') === 'Drag Pegman onto the map to open Street View') || (clickedElement.getAttribute('title') === 'Faites glisser Pegman sur la carte pour ouvrir Street View')) {

    }else if((clickedElement.getAttribute('aria-label') === 'Toggle fullscreen view') || (clickedElement.getAttribute('aria-label') === 'Passer en plein écran')) {

    }else if(clickedElement.getAttribute('aria-label') === 'Me geolocaliser') {

    }else if(clickedElement.tagName.toLowerCase() === 'img') {

    } else {
        console.log('La map peut fermer')
        // $('.add-address-mobile-map-section').addClass('add-address-mobile-map-section-hidden')
        $('.add-address-mobile-map-section-inviter').addClass('add-address-mobile-map-section-inviter-hidden')
        // $('.add-address-mobile-map-section').css('display', 'none')
    }

    })

</script>
