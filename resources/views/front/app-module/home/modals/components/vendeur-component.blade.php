<?php

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

?>

<style>

    .devenir-vendeur-container-helper {
        width: 415px;
        position: relative;
        margin-left: auto;
        margin-right: auto;
    }

</style>

<div class="r-l-title px-3">
    <div class="mon-title"><p>Ouvrir un commerce, c'est facile <br> en devenant vendeur </p></div>
</div>
<div class="ligne-100"></div>
<form action="{{ url('nouveau-vendeur') }}" data-btn="#login-register-btn" method="post" id="formVendeur_myform" data-tpost="async">
    @csrf
    <div style="height: 363px !important; overflow-y: scroll; overflow-x: hidden; padding: 0 0 14.5px 0;" class="devenir-vendeur-container-helper">
        <div class="pxl-3">

            <div class="row mt-3 vendeur-nom-prenom-responsive mt-3-vendeur-helper">
                <div class="col">
                    <div class="">
                        <input type="text" class="my-form-field" id="formVendeur_prenom-input" placeholder="Prénom" name="prenom">
                        <span class="error-message-waring error-none" id="prenom_error_message-vendeur">Veillez saisir un prénom valide</span>
                        <div id="formVendeur_prenom-error" class="formRegister_error-text error-text error-msg"></div>
                    </div>
                </div>
                <div class="col">
                    <div class=""><input type="text" class="my-form-field" id="formVendeur_nom-input" placeholder="Nom" name="nom"></div>
                    <span class="error-message-waring error-none" id="nom_error_message-vendeur">Veillez saisir un nom valide</span>
                    <div id="formVendeur_nom-error" class="formRegister_error-text error-text error-msg"></div>
                </div>
            </div>

            <style>
                .progress-bar-default {
                    height: 5px;
                    width: 158px;
                    border-radius: 2.5px;
                    background-color: #F8F8F8;
                }

                .progress-bar-orange {
                    height: 5px;
                    width: 100px;
                    border-radius: 2.5px;
                    background-color: #FF9500;
                }

                .progress-bar-success {
                    height: 5px;
                    width: 158px;
                    border-radius: 2.5px;
                    background-color: #00B517;
                }

                .progress-bar-error {
                    height: 5px;
                    width: 60px;
                    border-radius: 2.5px;
                    background-color: #D0021B;
                }

                .progressvendeur{
                    height: 6px;
                    width:158px;
                    position: relative;
                    left: 14px;
                }

                .msg-progress-bar{
                    height: 6px;
                    text-align: right;
                    font-family: Roboto;
                    font-size: 10px;
                    letter-spacing: 0.22px;
                    line-height: 8px;
                    align-content: flex-end;
                    margin-left: 5px;
                }

            </style>

            <div class="row mt-3 mt-3-vendeur-helper">
                <div class="col">
                    <div class=""><input  type="email" class="my-form-field" placeholder="Adresse e-mail" name="email" id="formVendeur_email-input"></div>
                    <span class="error-message-waring error-none" id="email_error_message-vendeur">Veillez saisir une addresse éléctronique valide</span>
                    <div id="formVendeur_email-error" class="formRegister_error-text error-text error-msg"></div>
                </div>
            </div>

            <div class="row mt-3 register-pwd-responsive mt-3-vendeur-helper">

                <div class="col">
                    <div id="pwd-border-error" class="d-flex justify-content-between my-form-field password-field p-0">
                        <input name="password" type="password" id="formVendeur-password" style="padding-left: 13px" class="my-form-field-mute" placeholder="Mot de passe">
                        <div class="image-password" data-icon="0" onclick="togglePasswordEye(this)" data-password-id="#formVendeur-password" style="position: relative; left: -4px">
                            <img src='{{ asset('assets/images2/Fermes2.svg') }}' alt=''>
                        </div>
                    </div>
                    <span class="error-message-waring error-none" id="pwd_error_message-vendeur">5 caractères minimum réquis</span>
                    <div id="formVendeur_password-error" class="formRegister_error-text error-text error-msg"></div>
                </div>

                <div class="col">
                    <div id="pwdc-border-error" class="d-flex justify-content-between my-form-field password-field p-0">
                        <input name="password_confirmation" type="password" id="formVendeur-confirmation" style="padding-left: 13px" class="my-form-field-mute" placeholder="Confirmer">

                        <div class="image-password" data-icon="0" onclick="togglePasswordEye(this)" data-password-id="#formVendeur-confirmation" style="position: relative; left: -4px">
                            <img src='{{ asset('assets/images2/Fermes2.svg') }}' alt=''>
                        </div>

                    </div>
                    <span class="error-message-waring error-none" id="pwdconfirm_error_message-vendeur">Les champs ne correcpondent pas</span>
                    <div id="formVendeur_password_confirmation-error" class="formRegister_error-text error-text error-msg"></div>
                </div>

                <span class="blue-warning" style="display: none" id="main-bar_v">

                    <div id="myProgressVendeur" class="progressvendeur" >
                        <div id="meter_v" class="metter" ></div>
                    </div>

                    <div style="display: flex; width: 300px">
                        <span id="msg-progress-bar_v" class="msg-progress-bar"></span>
                        <span id="password-test1" style="position: absolute; margin-left: 172px; margin-top:-7.5px; width:30px; height: 15px; text-align:right"></span>
                    </div>

                </span>
            </div>
        </div>
        @include('front.app-module.home.modals.components.connexion-externe-component')
    </div>

    <button type="submit" hidden id="form-devenir-vendeur-btn"></button>
</form>

<script>

// strong password vendeur
let password_vendeur = document.getElementById('formVendeur-password'); //barre-error
let strongPassword_v = new RegExp('(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*[A-Za-z0-9])(?=.{8,})')
let mediumPassword_v = new RegExp('((?=.*[0-9])(?=.*[A-Za-z0-9])(?=.{6,}))|((?=.*[a-z])(?=.*[A-Z])(?=.*[A-Za-z0-9])(?=.{6,}))')
let weakPassword_v = new RegExp('((?=.*[0-9])(?=.*[A-Za-z0-9])(?=.{5,}))|((?=.*[a-z])(?=.*[A-Z])(?=.*[A-Za-z0-9])(?=.{6,}))')
let strengthbar_v = document.getElementById("meter_v")
const main_bar_v = document.getElementById('main-bar_v')
let textMessageProgressBar_v = document.getElementById('msg-progress-bar_v')
let passwordVal_v = password_vendeur.value;
let password_test = document.getElementById('password-test1')

function StrengthCheckerVendeur(PasswordParameter) {
    if (PasswordParameter.length == 0) {
    // console.log('votre valeur autre', PasswordParameter.length)
    main_bar_v.style.display = "none";
    } else {

    if(strongPassword_v.test(PasswordParameter)) {
        main_bar_v.style.display = "block";
        strengthbar_v.style.backgroundColor = "#00B517"
        strengthbar_v.style.height= "6px"
        strengthbar_v.style.borderRadius= "2.5px"
        strengthbar_v.style.width = "100%";
        password_test.innerHTML = "Fort"
        password_test.style.color = "#00B517"
    } else if(mediumPassword_v.test(PasswordParameter) && (PasswordParameter.length >= 6 && PasswordParameter.length <= 50)) {

        main_bar_v.style.display = "block";
        strengthbar_v.style.backgroundColor = "#FF9500"
        strengthbar_v.style.height= "6px"
        strengthbar_v.style.borderRadius= "2.5px"
        strengthbar_v.style.width = "70%";
        password_test.innerHTML = "Moyen"
        password_test.style.color = "#FF9500"

    } else {

    main_bar_v.style.display = "block";
    strengthbar_v.style.backgroundColor = "#D0021B"
    strengthbar_v.style.height= "6px"
    strengthbar_v.style.borderRadius= "2.5px"
    strengthbar_v.style.width = "50%";
    password_test.innerHTML = "Faible"
    password_test.style.color = "#D0021B"
    }
    }
}

password_vendeur.addEventListener("keyup", event => {
    event.preventDefault();
    if(passwordVal_v == null){
        strengthbar_v.style.backgroundColor = "#e9ecef"
        strengthbar_v.style.height= "6px"
        strengthbar_v.style.borderRadius= "2.5px"
        strengthbar_v.style.width = "100%";
    }else {
        StrengthCheckerVendeur(password_vendeur.value);
    }

})
</script>
