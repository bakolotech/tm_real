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
    }
    else{
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

        .add-pay-header h4 {
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

        .ckeckbox1-connected {
            border-radius: 4px;
            background-color: #1A7EF5;
            height: 20px;
            width: 20px;
            margin-right: 8px;
        }

        .ckeckbox1-connected span {
            position: relative;
            top: -15px;
        }

        .payement-element-container {
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: flex-start;
        }

        .payement-card {
            display: flex;
            justify-content: flex-start;
            align-items: center;
            box-sizing: border-box;
            height: 56px;
            width: 393px;
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
            margin-top: 40px;
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
            font-size: 14px;
            font-weight: 500;
            letter-spacing: 0.31px;
            line-height: 18px;
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
            line-height: 18px;
            text-align: center;
            border: none;
        }

    .payement-card:hover{
        background-color: #F5F5F5;
        cursor: pointer;
    }

    .volet-droite-modal-dialog-add-livraison, .volet-droite-modal-content-livraison {
        position: relative;
        top: 50px;
    }

    .ajout-carte-credit-header {
        display: flex;
        flex-direction: column;
        margin-bottom: 19px;
        align-items: center;
        justify-content: center;
    }

        .ajout-carte-credit-header h4{
            color: #191970;
    font-family: Roboto;
    font-size: 20.5px;
    font-weight: 500;
    letter-spacing: 0;
    line-height: 23px;
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
            margin-top:3px;

        }

        .modifier_adresse_livraison_body .input-element-carte-credit {
            display: flex;
            flex-direction: column;
            margin-bottom: 15px;

        }

        

        .payement-element-container {
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
            width: 402px !important;
            position: relative;
            margin-left: auto;
            margin-right: auto;
            margin-bottom: 15px;
            /* margin-top: 15px; */
        }

        .il-sagit-de .checkbox-carte-default {
            /* background-color: r */
            color: #4A4A4A;
            font-family: Roboto;
            font-size: 13px;
            letter-spacing: -0.31px;
            line-height: 18px;
        }

        .input-group-prepend .input-group-text {
            box-sizing: border-box;
            height: 41px !important;
            width: 41px;
            border: 1px solid #9B9B9B;
            border-radius: 6px 0 0 6px;
            background-color: #FFFFFF;
        }


        .select {
            box-sizing: border-box;
            height: 41px !important;
            width: 153px !important;
            border: 1px solid #9B9B9B;
            border-radius: 0 6px 6px 0;
            background-color: #FFFFFF;
            padding-left:10px;


        }

        .code-post input {
            height: 41px;
            width: 194px;
            margin-left:200px;
            margin-top:-41px;
        }

        .volet-droite-modal-dialog-add-livraison, .volet-droite-modal-content-livraison {
            height: 491px !important;
            width: 432px ;
        }

        #ville_user_client_achat-user-connected {
            border: none;
        }

        #ville_user_client_achat-user-connected:focus {
            border: none;
            outline: none;
        }

        .localisation-button-address {
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
            padding-left: 10px;
            margin-left: 253px;
            margin-top: 4px;
        }

        .pac-container {
            z-index: 800000 !important;
        }

	</style>

    <style>
    .annul-button-client {
        box-sizing: border-box;
        height: 37px;
        width: 194px;
        border: 1px solid #1A7EF5;
        border-radius: 6px;
        background-color: #FFFFFF;

        color: #1A7EF5;
        font-family: Roboto;
        font-size: 16px;
        font-weight: 900;
        letter-spacing: 0.35px;
        line-height: 18px;
        text-align: center;

    }

    .ajouter-button-client {

        height: 37px;
        width: 194px;
        border-radius: 6px;
        background-color: #1A7EF5;

        color: #FFFFFF;
        font-family: Roboto;
        font-size: 16px;
        font-weight: 500;
        letter-spacing: 0.35px;
        line-height: 18px;
        text-align: center;
        border: transparent;
        margin-left: 15px;
    }

    .form-content-with-map {
        height: 491px !important;
        width: 873px;
        position: relative;
        left: -220px ;
    }

    .address-livraison-map-section {
        width: 402px !important;
        position: relative; top: -20px;
        background-color: #9B9B9B;
        box-shadow: rgb(204, 219, 232) 3px 3px 6px 0px inset, rgba(255, 255, 255, 0.5) -3px -3px 6px 1px inset;

    }

    .address-livraison-map-container {
        width: 402px; height: 400px;
        background-color: #fff;
        border: 1px solid #e6e3e3;
        border-radius: 6px;
    }

    .spinner-border-helper {
        width: 1.5rem !important;
        height: 1.5rem !important;
        vertical-align: -0.125em;
        border: 0.25em solid currentColor;
        border-right-color: #1A7EF5!important;
        border-radius: 50%;
        border-color: #D8D8D8;
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

    .localisation-button-address:hover {
        color: #FFFFFF;
        background-color: #146FDA;
    }

    .localisation-button-address:active {
        background-color: #2C3EDD !important;
    }

    /* ajouter-button-client */
    .ajouter-button-client:hover {
        color: #FFFFFF;
        background-color: #146FDA;
    }

    .ajouter-button-client:active {
        background-color: #2C3EDD !important;
    }


     .annul-button-client:hover {
        color: #146FDA !important;
        border-color: #146FDA !important;
    }

    .annul-button-client:active {
        color: #2C3EDD !important;
        border-color: #2C3EDD !important;
    }

    .center-forget-modal {
        top: 47% !important;
        transform: translateY(-50%) !important
    }

</style>

<style type="text/css">
    @import url('https://fonts.googleapis.com/css2?family=Gelasio:ital@1&family=Licorice&family=Noto+Sans&family=Roboto:wght@300;400&family=Tajawal:wght@300&display=swap');

    .modal-dialog {
        position: relative;
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

.modal-body-inviter .payement-element-container-2 .input-element-carte-credit {
    display: flex;
    flex-direction: column;
    margin-bottom: 5px;
}

.modal-body-inviter .payement-element-container-2 .input-element-carte-credit-last input {
    box-sizing: border-box;
    height: 41px;
    width: 402px;
    border: 1px solid #9B9B9B;
    border-radius: 6px;
    background-color: #F8F8F8;
    padding-left: 15px;

}

.modal-body-inviter .payement-element-container-2 .input-element-carte-credit input {
    box-sizing: border-box;
    height: 41px;
    width: 402px;
    border: 1px solid #9B9B9B;
    border-radius: 6px;
    background-color: #F8F8F8;
    padding-left: 13px;

}

.payement-element-container-2 {
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
    right: 5px;
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

.add-address-mobile-map-section-hidden {
    display: none !important;
}

.select-ajout-adress {
    box-sizing: border-box;
    height: 41px !important;
    width: 153px;
    border: 1px solid #9B9B9B;
    border-radius: 0 6px 6px 0;
    background-color: #FFFFFF;
    padding-left: 10px;
}

@media only screen and (max-width: 540px) {

    .payement-element-container-2{
        display:none;
    }

    .invite_common {
        width: 95% !important;
    }

    .footer-button_old {
        width: 302px !important;
    }

    .addresse-user-invite {
        width: 302px !important;
    }

    .checkbox-adress-residentiel-mobile-2 {
        left: 5px !important;
    }

    #UserAjoutAdresseLivraisonClosed {
        margin-right: -315px !important;
    }

    .localisation-button-address {
        margin-left: 165px !important;
        z-index: 1;
    }

    .localisation-button-address {
        margin-left: 163px !important;
    }

    .code-post input {
        width: 97px !important;
    }

    .modifier_adresse_livraison_body-right {
        display: none !important;
    }

    .modifier_adresse_livraison_body .input-element-carte-credit input {
        width: 302px !important;
    }

    #ajout-addr-nom-entreprise-user-connected, #ajout-addr-quartier-user-connected {
        width: 302px !important;
    }

    .modifier_adresse_livraison_content {
        width: 320px !important;
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
            /* width: 114px; */
            color: #191970;
            font-family: Roboto;
            font-size: 12px !important;
            font-weight: bold;
            letter-spacing: -0.34px;
            line-height: 16px;
            margin-bottom: 7px;
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
        margin-right: 92px !important;
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

    .modal-body-inviter .payement-element-container-2 .input-element-carte-credit-last input {
        box-sizing: border-box;
        height: 41px;
        width: 77%;
        border: 1px solid #9B9B9B;
        border-radius: 6px;
        background-color: #F8F8F8;
        padding-left: 15px;
    }

    .modal-body-inviter .payement-element-container-2 .input-element-carte-credit input {
        box-sizing: border-box;
        height: 41px;
        width: 77%;
        border: 1px solid #9B9B9B;
        border-radius: 6px;
        background-color: #F8F8F8;
        padding-left: 13px;
    }

    .volet-droite-modal-content-livraison {
        width: 320px !important;
    }

    .inviter-adress-map {
        width: 340px !important;
        left: 20px;
    }

}

.modifier_adresse_livraison_content {
    width: 840px;
    height: 450px;
    background-color: #fff;
    border-radius: 6px;
}
.form-content-with-map {
        left: 0px !important;
    }


    .payement-element-container {
        width: 320px !important;
    }

    .modal-body-ajout-carte-credit {
        width: 320px !important;
    }

    .volet-droite-modal-dialog-add-livraison {
        width: 320px !important;
    }

    .volet-droite-modal-dialog-add-livraison {
        position: relative;
        margin-left: auto;
        margin-right: auto;
    }

    .carte-carte {
        width: 320px !important;
    }

    .input-element-carte-credit-last {
        margin-top: 23px !important;
    }

    .carte-carte {
        column-gap: 5px !important;
    }

    .last-adresse-section {
        width: 393px;
        margin-left: auto;
        margin-right: auto;
    }

    .checkbox-adress-residentiel-mobile {
        margin-right: 0px !important;
    }

    .checkbox-adress-residentiel-mobile-2 {
        position: relative;
        left: 35px;
    }

    .input-element-carte-credit {
        position: relative;
        margin-left: auto;
        margin-right: auto;
    }

    .localisation-button-address {
        /* margin-left: 161px !important; */
    }

    .nom-et-phone-mobile {
        margin-bottom: 15px;
        position: relative;
        margin-left: auto;
        margin-right: auto;
        width: 300px !important;
    }

    #ville_user_client_achat-user-connected {
        width: 130px !important;
    }

    .ville-section-mobile {
        /* width: 130px !important; */
    }

    .col-mobile-section {
        position: relative;
        left: 9px !important;
    }

    .add-address-mobile-map-section_bis {
        width: 320px !important;
        height: 330px;
        display: block;
        position: absolute;
        background: #fff;
        bottom: 0px;
        margin-bottom: 9px;
        border-radius: 0px 0px 6px 6px;
        /* display: none !important; */
    }

    .mobile-map-container-zone {
        width: 310px !important;
        position: relative;
        margin-left: auto;
        margin-right: auto;
        height: 329px;
        border-radius: 0px 0px 6px 6px;
    }

    .select {
        width: 130px !important;
    }

    .modifier_adresse_livraison_header {
        height: 40px;
        width: 100%;
        border-radius: 6px 6px 0px 0px;
        border-bottom: 1px solid #D8D8D8;
    }

    .invite_common {
        width: 48%;
        height: 100%;
    }

    .modifier_adresse_livraison_body {
        width: 100%;
        height: 409px;
        display: flex;
        align-items: center;
        justify-content: center;
        column-gap: 10px;
        padding-top: 5px;
    }

    .modifier_adresse_livraison_body .input-element-carte-credit-last input {
        box-sizing: border-box;
        height: 41px;
        width: 393px;
        border: 1px solid #9B9B9B;
        border-radius: 6px;
        background-color: #F8F8F8;
        padding-left: 15px;

    }

    .modifier_adresse_livraison_body .input-element-carte-credit input {
        box-sizing: border-box;
        height: 41px;
        width: 393px;
        border: 1px solid #9B9B9B;
        border-radius: 6px;
        background-color: #F8F8F8;
        padding-left: 13px;

    }

    #ajout-addr-nom-entreprise-user-connected, #ajout-addr-quartier-user-connected {
        width: 393px ;
}

</style>

    <div class="main_panier_v2 input-none-panier-v2" id="UserAjoutAdresseLivraison">

        <button id="UserAjoutAdresseLivraisonClosed" type="button" class="close-btn-panier-bis" style="z-index: 15000; position:absolute; margin-right: -840px; margin-top: -455px;" >
            <img src="{{ asset('assets/images/close-btn.svg') }}" alt="">
        </button>

        <div class="modifier_adresse_livraison_content">

            <div class="modifier_adresse_livraison_header ajout-carte-credit-header" style="margin-bottom: 0px">
                <h4 style="margin-top: 9px;">Adresse de livraison</h4>
            </div>

            <div class="modifier_adresse_livraison_body">

                <div class="modifier_adresse_livraison_body-left invite_common">

                    <div class="carte-carte" style="margin-bottom: 15px;">

                        <div class="date-expiration numero-ccv">
                            <input type="text" name="name_surname" class="my-form-field" id="ajout-addr-nom-user-connected" onkeyup="letterOnly(this)" placeholder="Prénom & nom">
                        </div>

                        <div class="numero-ccv">
                            <input type="text" name="phonenumber" id="ajout-addr-numero-cvv-user-connected" class="my-form-field" placeholder="Numéro portable" style="background-image: url('assets/images/icones-vendeurs2/infoB.svg');background-position:top 10px right 15px;background-repeat:no-repeat;background-size:20px;background-origin:content content; ">
                        </div>

                    </div>

                <div class="input-element-carte-credit" id="zone-quartier-map-protection" style="z-index: 100">
                    <button class="localisation-button-address" onclick="prendreMesCoordoneesUser()" style="padding-left: 10px">
                    <img style="position: absolute; margin-left: -12px" src="/assets/images/geo-alt-fill.svg" alt="" /> Me géolocaliser</button>
                    <input type="text" name="addresses" class="my-form-field" id="ajout-addr-quartier-user-connected" placeholder="Adresse (Quartier/Rue/...)" onfocus="showGoogleMapForMobileNew()">
                    <span  aria-label="Me geolocaliser" class="spinner-border spinner-border-helper hide spinner-locationk" id="location_spiner3-bis-user-achat" role="status" aria-hidden="true"></span>
                    <input name="livraison_addres_latitude" type="hidden" id="livraison_adress_lat_user" class="my-form-field" value="" />
                    <input name="livraison_addres_longitude" type="hidden" id="livraison_adress_lng_user" class="my-form-field" value="" />
                </div>

                <div class="input-element-carte-credit">
                    <input type="text" name="Komplements" class="my-form-field" id="ajout-addr-comp-addrer-user-connected" placeholder="Compléments(ex:immeuble, étage...)">
                </div>

            <div class="row carte-carte carte-carte-mobile" style="margin-left:-10px; " >
                <div class="cols col-mobile-section">
                    <div class="input-group mb-3">
                    <div class="input-group-prepend" style="width: 41px !important; height: 41px !important; ">
                    <span class="input-group-text" id="basic-addon1-user-connected" style="width: 41px !important; height: 41px !important; background-color: #ccc">
                        <img src="{{ \App\Models\Pays::getImage2($maPosition['images']) }}" alt="" id="langue-modal-region-img" >
                        <input type="hidden" value="{{ \App\Models\Pays::getPays()->name }}" id="pays_client_achat">
                    </span>
                    </div>
            {{-- <div class="select" style="width: 154px !important;"> --}}
                <div class="select-ajout-adress ville-section-mobile" style="width: 154px;">
                    <select
                        name="formRegister_ville"
                        style="width: 155px; padding: 13px 0 10px 15px; position:relative; left: -11px; background-color: transparent; border: none !important"
                        class=" my-selectpays my-form-field-mute"
                        data-img-field="#langue-modal-region-img"
                        aria-label=".form-select-lg example"
                        id="ville_user_client_achat-user-connected"
                    >
                    @foreach($_SESSION['config']['ma-position']['country']['cities'] as $city)
                        <option value="{{ $city['id'] }}" class="test">{{ $city['name'] }}</option>
                    @endforeach
                    </select>
                </div>

                </div>
                </div>

                <div class="col code-post">
                    <input type="text" style="margin-top: -56px; !important" class="form-controld my-form-field input-element" id="ajout-addr-code-poste-user-connected" placeholder="Code postal" name="postal_code">
                </div>

                </div>

            <div class="last-adresse-section">

                <label style="  color: #191970;
                font-family: Roboto;
                font-size: 15px;
                font-weight: 500;
                letter-spacing: -0.36px;
                line-height: 18px;margin-top:0px;margin-left:8px; position: relative; top: -7px">Il s'agit d'une</label>

                <div class="addresse-user-invite" style="margin-bottom: 0px !important; position: relative; top: -5px">

                    <div style="display: flex">
                        <label class="checkbox-adress-residentiel-mobile" for="addrcom" style="margin-right: 70px">
                            <input type="checkbox"  class="ckeckbox1-connected" checked value="Residentiel"><span class="add-user-invite">Adresse résidentielle</span>
                        </label>
                        <label for="addrcom" class="checkbox-adress-residentiel-mobile-2">
                            <input type="checkbox"  class="ckeckbox1-connected" value="Entreprise"><span class="add-user-invite">Adresse pro/commerciale</span>
                        </label>
                    </div>

                </div>

                <div class="input-element-carte-credit-last">
                    <input type="text" class="my-form-field grise-invite" name="numeroCarte" id="ajout-addr-nom-entreprise-user-connected" placeholder="Nom de l'entreprise">
                </div>

                <div class="footer-button_old" style="margin-top: 22px; display: flex">
                    <button class="annul-button-client" onclick="annulerInviteAddresse1()">Annuler</button>
                    <button id="btn_addr_livraison-invite2" class="ajouter-button-client ajout-adress-livrason-disabled" onclick="saveAjoutAdressUserConnected()">Continuer</button>
                </div>
            </div>


            </div>

            <div class="modifier_adresse_livraison_body-right invite_common">
                <div class="address-livraison-map-container" id="address-livraison-map-container-id">

                </div>
            </div>

            </div>

            <div class="add-address-mobile-map-section_bis add-address-mobile-map-section-hidden">
                <div class="mobile-map-container-zone" id="mobile-add-adress-map-2">

                </div>
            </div>

        </div>
    </div>

<script src="{{ asset('assets/jQuery-Mask-Plugin-master/dist/jquery.mask.min.js') }}"></script>
<script>

    $(document).ready(function() {
        $('.ckeckbox1-connected').click(function() {

            $(this).prop('checked', true);

            if ($(this).val() === 'Entreprise') {
                $('#ajout-addr-nom-entreprise-user-connected').removeClass('grise-invite')
                $('#btn_addr_livraison-invite2').addClass('ajout-adress-livrason-disabled')
            }else{
                $('#ajout-addr-nom-entreprise-user-connected').addClass('grise-invite')
                $('#ajout-addr-nom-entreprise-user-connected').removeClass('input-error-warning-long')
                $('#ajout-addr-nom-entreprise-user-connected').val("")

                open_address_livr_client_btn()
            }
            $.each($('.ckeckbox1-connected').not($(this)), function(key, value) {
                $(value).prop('checked', false);
            })

        })

        $('#UserAjoutAdresseLivraisonClosed').on('click', function() {
            $('#UserAjoutAdresseLivraison').addClass('input-none-panier-v2')
            // $('#UserAjoutAdresseLivraison').modal('hide')
        })

    })

    $('#numero-user-invite').mask('000000000')
    $('#code-poste-user-invite').mask('00000')

    $('#ajout-addr-nom-user-connected').on('keyup', function() {
            let email_valeur = $(this).val()
            if (email_valeur.length > 0 && $('#ajout-addr-nom-user-connected').hasClass('input-error-warning')) {
                $('#ajout-addr-nom-user-connected').removeClass('input-error-warning')
            }else if (email_valeur.length == 0) {
                $('#ajout-addr-nom-user-connected').addClass('input-error-warning')
            }
            open_address_livr_client_btn()
        })

    // ------------------------------- numero tel -------------------------------------
    $('#ajout-addr-nom-user-connected').on('blur', function() {
        let email_valeur = $(this).val()
        if (email_valeur.length == 0) {
            $('#ajout-addr-nom-user-connected').addClass('input-error-warning')
        }
    })

    $('#ajout-addr-numero-cvv-user-connected').on('keyup', function() {
        let email_valeur = $(this).val()
        if (email_valeur.length > 0 && $('#ajout-addr-numero-cvv-user-connected').hasClass('input-error-warning')) {
            $('#ajout-addr-numero-cvv-user-connected').removeClass('input-error-warning')
        }else if (email_valeur.length == 0) {
            $('#ajout-addr-numero-cvv-user-connected').addClass('input-error-warning')
        }
        open_address_livr_client_btn()
    })


    // ---------------------------- addresse quartier -----------------------

    $('#ajout-addr-numero-cvv-user-connected').on('blur', function() {
        let email_valeur = $(this).val()
        if (email_valeur.length == 0) {
            $('#ajout-addr-numero-cvv-user-connected').addClass('input-error-warning')
        }
    })

    $('#ajout-addr-quartier-user-connected').on('keyup', function() {
        let email_valeur = $(this).val()
        if (email_valeur.length > 0 && $('#ajout-addr-quartier-user-connected').hasClass('input-error-warning')) {
            $('#ajout-addr-quartier-user-connected').removeClass('input-error-warning')
        }else if (email_valeur.length == 0) {
            $('#ajout-addr-quartier-user-connected').addClass('input-error-warning')
        }

        open_address_livr_client_btn()

    })

    $('#ajout-addr-quartier-user-connected').on('blur', function() {
        let email_valeur = $(this).val()
        if (email_valeur.length == 0) {
            $('#ajout-addr-quartier-user-connected').addClass('input-error-warning')
        }
    })

    // ---------------------- nom entreprise nom-entreprise-user-invite -----------------------
    $('#ajout-addr-nom-entreprise-user-connected').on('blur', function() {
        let email_valeur = $(this).val()
        if (email_valeur.length == 0) {
            $('#ajout-addr-nom-entreprise-user-connected').addClass('input-error-warning-long')
        }

    })

    $('#ajout-addr-nom-entreprise-user-connected').on('keyup', function() {

        let email_valeur = $(this).val()
        if (email_valeur.length > 0 && $('#ajout-addr-nom-entreprise-user-connected').hasClass('input-error-warning-long')) {
            $('#ajout-addr-nom-entreprise-user-connected').removeClass('input-error-warning-long')
        }else if (email_valeur.length == 0) {
            $('#ajout-addr-nom-entreprise-user-connected').addClass('input-error-warning-long')
        }

        open_address_livr_client_btn()

    })

    function ValidateEmailInvite(mailval){
        var emailv = mailval
        if (/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/.test(emailv))
        {
            return (true)
        }else {
            return false;
        }
    }

    function annulerInviteAddresse1() {
        $('#UserAjoutAdresseLivraison').modal('hide')
    }

    function open_address_livr_client_btn() {
        let nom_prenom1 = $('#ajout-addr-nom-user-connected');
        let telephone_livraison= $('#ajout-addr-nom-user-connected');
        let address_livraison = $('#ajout-addr-quartier-user-connected');

        let nom_prenom2 = $('#ajout-addr-nom-user-connected').val();
        let telephone_livraison2= $('#ajout-addr-nom-user-connected').val();
        let address_livraison2 = $('#ajout-addr-quartier-user-connected').val();

        let nom_entreprise_invite = $('#ajout-addr-nom-entreprise-user-connected');

        // pwd-border-error
        if (!$(nom_prenom1).hasClass('input-error-warning') && !$(telephone_livraison).hasClass('input-error-warning') && !$(address_livraison).hasClass('input-error-warning') && !$(nom_entreprise_invite).hasClass('input-error-warning-long') && nom_prenom2.length > 0 && telephone_livraison2.length > 0 && address_livraison2.length > 0) {
            $('#btn_addr_livraison-invite2').removeClass('ajout-adress-livrason-disabled')
            console.log('Normalement bon')
        }else {
            $('#btn_addr_livraison-invite2').addClass('ajout-adress-livrason-disabled')
            console.log('Normalement pas bon')
        }
    }

    function saveAjoutAdressUserConnected() {

        let ajout_addr_nom = $('#ajout-addr-nom-user-connected').val();
        let ajout_addr_adress = $('#ajout-addr-quartier-user-connected').val();
        let ajout_numero = $('#ajout-addr-numero-cvv-user-connected').val();
        let code_postale = $('#ajout-addr-code-poste-user-connected').val();
        let comp_addr = $('#ajout-addr-comp-addrer-user-connected').val();
        let nom_entreprise = $('#ajout-addr-nom-entreprise-user-connected').val();
        let addr_ville = $('#ville_user_client_achat-user-connected').find(':selected').text();
        let add_pays = $('#pays_client_achat-user-connected').val();
        let type_addresse = $('.ckeckbox1-connected:checkbox:checked').val()
        var latitude = $('#livraison_adress_lat_user').val();
        var longitude = $('#livraison_adress_lng_user').val();

        data = {
            'prenom_nom': ajout_addr_nom,
            'portable': ajout_numero,
            'adresse': ajout_addr_adress,
            'complement': comp_addr,
            'ville': addr_ville,
            'code_postale': code_postale,
            'nom_entreprise': nom_entreprise,
            'type_adresse':type_addresse,
            'latitude': latitude,
            'longitude': longitude,
        }

        $.ajax({
            type: "POST",
            url: '/add-address-carnet-user-connected',
            data: data,
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            success: function (response) {
                $('#address_actuel').val(response['carnet'][0]['id'])
                $('#id_client_addresse').val(response['carnet'][0]['id'])
                $('#invite-nom-prenom-connected').text(response['carnet'][0]['prenom_nom'])
                $('#invite-numero_tel-connected').text(response['carnet'][0]['portable'])
                $('#invite-quartier-address-connected').text(response['carnet'][0]['adresse'])
                $('#comp-addr-supp-connected').text(response['carnet'][0]['complement'])
                $('#invite-pays-connected').text('Gabon')
                $('#inv-ville-connected').text(response['carnet'][0]['ville'])
                $('#invit-code-postal-connected').text(response['carnet'][0]['code_postale'])

                $('#invite-email-connected-2').text(response['user_email'])
                $('#invite-nom-prenom-connected-2').text(response['carnet'][0]['prenom_nom'])
                $('#invite-numero_tel-connected-2').text(response['carnet'][0]['portable'])
                $('#invite-quartier-address-connected-2').text(response['carnet'][0]['adresse'])
                $('#comp-addr-supp-connected-2').text(response['carnet'][0]['complement'])
                $('#inv-ville-connected-2').text(response['carnet'][0]['ville'])
                $('#invite-pays-connected-2').text('Gabon')
                $('#invit-code-postal-connected-2').text(response['carnet'][0]['code_postale'])

                $('#section-addresse-non-defini').addClass('infos-invite-none')
                $('#section-addresse-bien-defini').removeClass('infos-invite-none')

                $("#ajout-nouvelle-adresse-element-id").hide();
                $('#mobile-panier-user-email-id').show()
                
                $('#ajout-addr-nom-user-connected').val("");
                $('#ajout-addr-quartier-user-connected').val("");
                $('#ajout-addr-numero-cvv-user-connected').val("");
                $('#ajout-addr-code-poste-user-connected').val("");
                $('#ajout-addr-comp-addrer-user-connected').val("");
                $('#ajout-addr-nom-entreprise-user-connected').val("");
                $('#UserAjoutAdresseLivraison').addClass('input-none-panier-v2')
                // $('#UserAjoutAdresseLivraison').modal('hide')
            }
        })
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

    // --------------------- email ----------------------------
    $('#email-user-invite').on('blur', function() {
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

    $('#email-user-invite').on('keyup', function() {
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
        console.log('Autre traitement ici')
            // $("#nomfamille").removeClass('input-error-warning')
            // $('#nouveauVendBtn').attr('disabled', false)
            // $('#nouveauVendBtn').removeClass('img_bg')
        }
    }

    // ------------------------ nom prenom ------------------------------
    $('#prenom-nom-user-invite').on('blur', function() {
        let email_valeur = $(this).val()
        if (email_valeur.length == 0) {
            $('#prenom-nom-user-invite').addClass('input-error-warning')
        }
    })

    $('#prenom-nom-user-invite').on('keyup', function() {
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
    $('#numero-user-invite').on('blur', function() {
        let email_valeur = $(this).val()
        if (email_valeur.length == 0) {
            $('#numero-user-invite').addClass('input-error-warning')
        }
    })

    $('#numero-user-invite').on('keyup', function() {
        let email_valeur = $(this).val()
        if (email_valeur.length > 0 && $('#numero-user-invite').hasClass('input-error-warning')) {
            $('#numero-user-invite').removeClass('input-error-warning')
        }else if (email_valeur.length == 0) {
            $('#numero-user-invite').addClass('input-error-warning')
        }

        open_save_button()
    })


    // ---------------------------- addresse quartier -----------------------
    $('#address-quartier-user-invite').on('blur', function() {
        let email_valeur = $(this).val()
        if (email_valeur.length == 0) {
            $('#address-quartier-user-invite').addClass('pwd-border-error')
        }

    })

    $('#address-quartier-user-invite').on('keyup', function() {
        let email_valeur = $(this).val()
        if (email_valeur.length > 0 && $('#address-quartier-user-invite').hasClass('pwd-border-error')) {
            $('#address-quartier-user-invite').removeClass('pwd-border-error')
        }else if (email_valeur.length == 0) {
            $('#address-quartier-user-invite').addClass('pwd-border-error')
        }

        open_save_button()

    })

    // ---------------------- nom entreprise nom-entreprise-user-invite -----------------------
    $('#nom-entreprise-user-invite').on('blur', function() {
        let email_valeur = $(this).val()
        if (email_valeur.length == 0) {
            $('#nom-entreprise-user-invite').addClass('input-error-warning-long')
        }

    })

    $('#nom-entreprise-user-invite').on('keyup', function() {
        let email_valeur = $(this).val()
        if (email_valeur.length > 0 && $('#nom-entreprise-user-invite').hasClass('input-error-warning-long')) {
            $('#nom-entreprise-user-invite').removeClass('input-error-warning-long')
        }else if (email_valeur.length == 0) {
            $('#nom-entreprise-user-invite').addClass('input-error-warning-long')
        }

        open_save_button()

    })

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


var marker_achat_process;
var map_chat_process;
function initMapAchatProcess() {

    var myLatLng = {lat: 0.3924100, lng: 9.4535600};

    map_chat_process = new google.maps.Map(document.getElementById('address-livraison-map-container-id'), {
        zoom: 15,
        center: myLatLng
    });

    const infoWindow = new google.maps.InfoWindow();

    marker_achat_process = new google.maps.Marker({
        position: myLatLng,
        map: map_chat_process,
        draggable: true,
        title: 'Hello World!'
    });

    var geocoder = new google.maps.Geocoder();

    // movement des markers
    marker_achat_process.addListener("dragend", (event) => {
        // infoWindow.close();
        const position = marker_achat_process.position;
        infoWindow.setContent(
        `Pin dropped at: ${position.lat()}, ${position.lng()}`
        );
        // infoWindow.open(marker.map, marker);

        geocoder.geocode({'location': position}, function(results, status) {
            if (status === 'OK') {
                if (results[0]) {
                console.log('Formated adresse is =>', results[0].formatted_address);
                $('#ajout-addr-quartier-user-connected').val(results[0].formatted_address)
                } else {
                console.log('No results found');
                }
            } else {
                console.log('Geocoder failed due to: ' + status);
            }
        });

    });

    autocomplete = new google.maps.places.Autocomplete(
        document.getElementById('ajout-addr-quartier-user-connected')
    );

    autocomplete.bindTo("bounds", map_chat_process);

    const infowindow = new google.maps.InfoWindow();
    const infowindowContent = document.getElementById("infowindow-content");

    infowindow.setContent(infowindowContent);

    // Démmarage du choix de la selection
    autocomplete.addListener("place_changed", () => {
        // infowindow.close();
        marker_achat_process.setVisible(false);

        const place = autocomplete.getPlace();

        if (!place.geometry || !place.geometry.location) {
        return;
        }

        // If the place has a geometry, then present it on a map.
        if (place.geometry.viewport) {
        map_chat_process.fitBounds(place.geometry.viewport);
        } else {
        map_chat_process.setCenter(place.geometry.location);
        map_chat_process.setZoom(15);
        }

        marker_achat_process.setPosition(place.geometry.location);
        marker_achat_process.setVisible(true);
        infowindowContent.children["place-name"].textContent = place.name;
        infowindowContent.children["place-address"].textContent =
        place.formatted_address;
        // infowindow.open(map, marker);

    })

    }

    function mobileInitMapAchatProcess() {

    var myLatLng = {lat: 0.3924100, lng: 9.4535600};

    map_chat_process = new google.maps.Map(document.getElementById('mobile-add-adress-map-2'), {
        zoom: 15,
        center: myLatLng
    });

    const infoWindow = new google.maps.InfoWindow();
    marker_achat_process = new google.maps.Marker({
        position: myLatLng,
        map: map_chat_process,
        draggable: true,
        title: 'Hello World!',
    });

    var geocoder = new google.maps.Geocoder();

    //movement des markers
    marker_achat_process.addListener("dragend", (event) => {
        // infoWindow.close();
        const position = marker_achat_process.position;
        infoWindow.setContent(
        `Pin dropped at: ${position.lat()}, ${position.lng()}`
        );
        // infoWindow.open(marker.map, marker);

        geocoder.geocode({'location': position}, function(results, status) {
            if(status === 'OK') {
            if(results[0]) {
            console.log('Formated adresse is =>', results[0].formatted_address);
            $('#ajout-addr-quartier-user-connected').val(results[0].formatted_address)
            } else {
            console.log('No results found');
            }
            } else {
            console.log('Geocoder failed due to: ' + status);
            }
        });

    });

    autocomplete = new google.maps.places.Autocomplete(
        document.getElementById('ajout-addr-quartier-user-connected')
    );

    autocomplete.bindTo("bounds", map_chat_process);

    const infowindow = new google.maps.InfoWindow();
    const infowindowContent = document.getElementById("infowindow-content");
    infowindow.setContent(infowindowContent);

    // Démmarage du choix de la selection
    autocomplete.addListener("place_changed", () => {
            // infowindow.close();
    marker_achat_process.setVisible(false);

    const place = autocomplete.getPlace();

    if(!place.geometry || !place.geometry.location) {
    return;
    }

    // If the place has a geometry, then present it on a map.
    if (place.geometry.viewport) {
    map_chat_process.fitBounds(place.geometry.viewport);
    } else {
    map_chat_process.setCenter(place.geometry.location);
    map_chat_process.setZoom(15);
    }

    marker_achat_process.setPosition(place.geometry.location);
    marker_achat_process.setVisible(true);
    infowindowContent.children["place-name"].textContent = place.name;
    infowindowContent.children["place-address"].textContent = place.formatted_address;
    // infowindow.open(map, marker);

    })
 }

    function showGoogleMapForMobileNew() {

        var tablet_size_listener_min_width = matchMedia("(max-width: 500px)");
        if(tablet_size_listener_min_width.matches) {
            $('.add-address-mobile-map-section_bis').removeClass('add-address-mobile-map-section-hidden')
            mobileInitMapAchatProcess()
        } else {
            
        }
        // console.log('Bring map into mobile reserved position')
    }

    function prendreMesCoordoneesUser() {

        $('#location_spiner3-bis-user-achat').removeClass('hide')
        if (navigator.geolocation) {
        navigator.geolocation.getCurrentPosition(showPositionBisUser);
        } else {
            // x.innerHTML = "Geolocation is not supported by this browser.";
        }

    }

    function showPositionBisUser(position) {

        var data_location = position.coords.latitude + ' , ' + position.coords.longitude
        const user_location = { lat: position.coords.latitude, lng: position.coords.longitude };

        var geocoder = new google.maps.Geocoder();

            geocoder.geocode({
                location: user_location
            }).then((response) => {
            if(response.results[0]) {
            console.log('Formatted date is => ', response.results[0].formatted_address);
            $('#ajout-addr-quartier-user-connected').val(response.results[0].formatted_address)
            }else {
                $('#ajout-addr-quartier-user-connected').val(data_location)
            }

        })

        marker_achat_process.setPosition(user_location)
        map_chat_process.setCenter(user_location);
        map_chat_process.setZoom(15);

        $('#location_spiner3-bis-user-achat').addClass('hide')

        // $('#ajout-addr-quartier-user-connected').val(data_location)

        $('#livraison_adress_lat_user').val(position.coords.latitude)
        $('#livraison_adress_lng_user').val(position.coords.longitude)

    }

    document.getElementById('UserAjoutAdresseLivraison').addEventListener('click', function(event) {

        var map_section = document.getElementById('mobile-add-adress-map-2').getElementsByTagName('div')

        var clickedElement = event.target;

        var parentElement = null;
        parentElement = clickedElement.parentNode;

        console.log('The clicked element is => ', clickedElement)
        const modal_section_body = document.getElementById('modal-body-ajout-carte-credit-id')

        var parent_node_map_attr = parentElement.getAttribute('aria-label')
        var parent_node_map_attr2 = parentElement.getAttribute('title')

        const input_adresse = document.getElementById('ajout-addr-quartier-user-connected');
        const map_container_section = document.getElementById('mobile-add-adress-map-2')
        const mobile_adress_input_section = document.getElementById('zone-quartier-map-protection')

        if ((event.target === mobile_adress_input_section) || (event.target === input_adresse) || (event.target === parent_node_map_attr2) || (event.target === mobile_adress_input_section) || (parent_node_map_attr === "Map") || (parent_node_map_attr === "Carte")) {
            console.log('La map ne doit pas fermer')
            $('.add-address-mobile-map-section_bis').removeClass('add-address-mobile-map-section-hidden')
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
            $('.add-address-mobile-map-section_bis').addClass('add-address-mobile-map-section-hidden')
            // $('.add-address-mobile-map-section').css('display', 'none')
        }

    })

</script>
