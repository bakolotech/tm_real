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

<div style="margin:0 !important">
    <div class="paragraphe-responsive-personalisee">
        <p class="paragraphe-responsive-personalisee" style="margin-top: 25px;text-align: center !important;color: #191970 !important;font-family: Roboto !important;font-size: 20px !important;line-height: 18px !important;">Nouveau client ? Bienvenue !</p>
    </div>
</div>
<div class="hr-responsive-personnalisee"style="margin: 0.3rem 0;background-color: grey;opacity: .25;width: 100%;height: 1px;"></div>
<div  style="height: 394px !important; overflow-y: scroll; overflow-x: hidden; padding: 0 0 0;"class="form-container-responsive-register-personnalisee">
    <form action="{{ url('/register') }}" method="post" id="formRegister_myform" data-tpost="async" data-btn="#login-register-btn">
        @csrf
        <div>
            <div class="row mt-3 register-nom-prenom-responsive" style="margin-left: 15px ">
                <div class="col col-login">
                    <style>
                        .my-form-fields {
                            box-sizing: border-box;
                            height: 41px;
                            width: 194px;
                            border: 1px solid #9B9B9B;
                            border-radius: 6px;
                            background-color: #F8F8F8;
                            padding-left: 15px;
                        }

                        .my-selectpays {
                            box-sizing: border-box;
                            height: 41px;
                            width: 194px;
                            /* border: 1px solid #1A7EF5; */
                            border: 1px solid #9B9B9B;
                            border-radius: 0px 6px 6px 0px !important;
                            background-color: #F8F8F8;
                            padding-left: 15px;
                        }

                        .col-login {
                            padding: 0!important;
                            margin: 0px !important;
                        }

                        .my-form-fields:hover, .select2-container:hover{
                            outline: 1px solid #1A7EF5;
                            border-radius: 6px;
                            background-color: #F8F8F8;
                        }

                        .my-form-field-mute:focus, .my-form-fields:focus{
                            outline: 1px solid #1A7EF5;
                            border-radius: 6px;
                            background-color: #F8F8F8;
                        }

                        .separateur-login {
                            box-sizing: border-box;
                            height: 39px;
                            width: 1px;
                            border: 1px solid #9B9B9B;
                        }

                        .femme-fiel {
                            width: 97px !important;
                            height: 41px;
                            border: 1px solid #9B9B9B;

                            background-color: #F8F8F8;
                            border-radius: 6px 0px 0px 6px;
                        }

                        .homme-fiel {
                            width: 97px !important;
                            height: 41px;
                            border: 1px solid #9B9B9B;
                            background-color: #F8F8F8;
                            border-radius: 0px 6px 6px 0px;
                        }

                        .blue-warning {
                            height: 11px;
                            /* width: 259px; */
                            color: #191970;
                            font-family: Roboto;
                            font-size: 10px;
                            letter-spacing: 0.22px;
                            line-height: 11px;
                            position: relative;
                            left: -13px;
                            margin-top: 5px;
                        }

                        .displayBadge{
                            margin-top: 5%;
                            display: none;
                            text-align :center;
                        }

                        @keyframes elementAnimation {
                            0%   {width: 0px;}
                            100%  {width: 60px;}
                        }

                        .animateWidth {
                            animation-name: elementAnimation;
                            animation-duration: 600ms;
                        }

                        .my-selectpays-custom:focus {
                            border: transparent;
                            outline: none
                        }



                    </style>
                    <div class=""><input name="formRegister_prenom" id="formRegister_prenom-input" type="text" class="my-form-fields" placeholder="Prénom"></div>
                    <div id="formRegister_prenom-error" class="formRegister_error-text error-text error-msg"></div>


                </div>
                <div class="col col-login">
                    <div class="responsive-nom-helper" style="position: relative; left: -5px"><input name="formRegister_nom" id="formRegister_nom-input" type="text" class="my-form-fields" placeholder="Nom"></div>
                    <div id="formRegister_nom-error" class="formRegister_error-text error-text error-msg"></div>
                </div>
            </div>

            <div class="row mt-3" style="position: relative; left: 3px">
                <div class="col-6 col-login col-6-container-responsive-personalisee">
                    <div id="formRegister_sexe-input" style="display: flex; position: relative; left: 25.5px" >
                        <div class="femme-fiel" style="padding: 8px 0px 13px 18px">
                            <label class="form-check-label" for="formRegister-sexe_femme" style="margin-top: 0px; position: relative; left: -10px; margin-right: 10px">
                                Femme
                            </label>
                            <input style="width: 16px; height: 16px;" class="form-check-input" name="formRegister_sexe" type="radio" value="F" id="formRegister-sexe_femme">
                        </div>

                        <div class="homme-fiel" style="padding: 8px 0px 13px 18px">
                            <label class="form-check-label" for="formRegister-sexe_homme" style="margin-top: 0px; position: relative; left: -10px; margin-right: 10px">
                                Homme
                            </label>
                            <input style="width: 16px; height: 16px;" class="form-check-input" name="formRegister_sexe" type="radio" value="H" id="formRegister-sexe_homme">
                        </div>
                    </div>
                    <div id="formRegister_sexe-error" class="formRegister_error-text error-text error-msg"></div>
                </div>
                <div class="col-6 col-login" style="left: 5px;position: relative;">
                    <div class="input-group mb-3">
                        <div class="input-group-prepend" style="width: 41px !important; height: 41px !important; ">
                            <span class="input-group-text" id="basic-addon1" style="width: 39px !important; height: 39px !important; background-color: #ccc; position: relative; left: 1px">
                                <img src="{{ \App\Models\Pays::getImage2($maPosition['images']) }}" alt="" id="langue-modal-region-img" >
                            </span>
                        </div>
                        <div class="select" style="width: 154px" >
                            <select
                                name="formRegister_ville"
                                style="width: 100%; padding: 13px 0 10px 15px; border:none; background-color: transparent; height: 37px"
                                class=" my-selectpays my-form-field-mute my-selectpays-custom"
                                data-img-field="#langue-modal-region-img"
                                aria-label=".form-select-lg example"
                                @if ($maPosition['id'] != $_SESSION['config']['user-pays']) disabled @endif data-default-city="{{ $maPosition['states']['0']['cities'][0]['id'] }}"
                                >

                                @if ($maPosition['id'] == $_SESSION['config']['user-pays'])
                                    @foreach($maPosition['country']['cities'] as $city)
                                        <option @if(isset($maProvince['cities'][0]) && count($maProvince['cities'][0]) > 0 && $maProvince['cities'][0]['id'] == $city['id'])
                                                selected <?php $i = 1?>
                                                @elseif (isset($maPosition['states'][0]['cities'][0]) && !empty($maPosition['states'][0]['cities'][0]) && $maPosition['states'][0]['cities'][0]['id'] == $city['id'] && $i == 0)
                                                selected
                                                @endif value="{{ $city['id'] }}">
                                            {{ $city['name'] }}
                                        </option>
                                    @endforeach
                                @else
                                    <option selected value="{{ $maProvince['cities'][0]['id'] }}">{{ $maProvince['cities'][0]['name'] }}</option>
                                @endif

                            </select>
                            {{-- <select @if ($maPosition['id'] != $_SESSION['config']['user-pays']) disabled @endif data-default-city="{{ $maPosition['states']['0']['cities'][0]['id'] }}" name="formChangeBoutique_city" id="formChangeBoutique_city-input" style="width: 194px !important; z-index: 2000" class="my-select my-form-field" aria-label="" onchange="marcherChanged()">
                                @if ($maPosition['id'] == $_SESSION['config']['user-pays'])
                                    @foreach($maPosition['country']['cities'] as $city)
                                        <option @if(isset($maProvince['cities'][0]) && count($maProvince['cities'][0]) > 0 && $maProvince['cities'][0]['id'] == $city['id'])
                                                selected <?php $i = 1?>
                                                @elseif (isset($maPosition['states'][0]['cities'][0]) && !empty($maPosition['states'][0]['cities'][0]) && $maPosition['states'][0]['cities'][0]['id'] == $city['id'] && $i == 0)
                                                selected
                                                @endif value="{{ $city['id'] }}">
                                            {{ $city['name'] }}
                                        </option>
                                    @endforeach
                                @else
                                    <option selected value="{{ $maProvince['cities'][0]['id'] }}">{{ $maProvince['cities'][0]['name'] }}</option>
                                @endif
                            </select> --}}
                        </div>
                      </div>
                    <div id="formRegister_ville-error" class="formRegister_error-text error-text error-msg"></div>
                </div>
            </div>
            {{-- <div class="px-3"> --}}
                <div class="row mt-3" style="margin-left: 13px; margin-right: 13px; position: relative; top: -15px">
                    <div class="col col-login">
                        <input type="text" class="my-form-field" placeholder="Adresse e-mail ou numéro de portable" name="formRegister_email" id="formRegister_email-input">
                        <div id="formRegister_email-error" class="formRegister_error-text error-text error-msg"></div>
                    </div>
                </div>

                <div class="row mt-3 register-pwd-responsive" style="margin-left: 13px; margin-right: 13px; position: relative; top: -15px">
                    <div class="col col-login" style="margin-right: 12px !important">
                        <div class="d-flex justify-content-between my-form-field password-field p-0" id="pwd-border-error-register">
                            <input type="password" name="formRegister_password" id="formRegister-passwordRegister" style="padding-left: 13px" class="my-form-field-mute" placeholder="Mot de passe" onkeyup="validatePwd()">
                            <div class="image-password" data-icon="0" onclick="togglePasswordEye(this)" data-password-id="#formRegister-passwordRegister" style="position: relative; left: -4px">
                                <img src='{{ asset('assets/images2/Fermes2.svg') }}' alt=''>
                            </div>
                        </div>
                        <div id="formRegister_password-error" class="formRegister_error-text error-text error-msg"></div>

                        <span class="blue-warning" style="display: none; left: 0px !important" id="main-bar">

                            <div id="myProgress" class="progress" >
                                <div id="meter" class="metter" ></div>
                            </div>
                            <div>
                                <span id="msg-progress-bar" class="msg-progress-bar" style="position: absolute; top: -2px; left: 180px"></span>
                            </div>
                        </span>

                    </div>
                    <div class="col col-login" style="margin-left: 7px">
                        <div class="d-flex justify-content-between my-form-field password-field p-0" id="pwdc-border-error-register">
                            <input type="password" name="formRegister_password_confirmation" id="formLogin-registerLogin" style="padding-left: 13px" class="my-form-field-mute" placeholder="Confirmer">
                            <div class="image-password" data-icon="0" onclick="togglePasswordEye(this)" data-password-id="#formLogin-registerLogin" style="position: relative; left: -4px">
                                <img src='{{ asset('assets/images2/Fermes2.svg') }}' alt=''>
                            </div>
                        </div>
                        <div id="formRegister_password_confirmation-error" class="formRegister_error-text error-text error-msg"></div>
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
                        .progress{
                            height: 6px;
                            width:158px;
                        }
                        .msg-progress-bar{
                            /* jf */
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

                    {{-- <span class="blue-warning">

                         <div class="progress-bar-default" id="backdefault">


                            <div class="progress-bar-success" id="barre-success" style="position: absolute; text-align: right">
                                <span style="position: relative; text-align: right; top: -3px; right: -28px">Fort</span>
                            </div>

                            <div class="progress-bar-orange" id="barre-moyen" style="position: absolute; text-align: right">
                                <span style="position: relative; text-align: right; top: -3px; right: -33px">Moyen</span>
                            </div>

                            <div class="progress-bar-error" style="position: absolute; text-align: right" id="barre-error">
                                <span style="position: relative; text-align: right; top: -3px; right: -30px">Faible</span>
                            </div>

                        </div>


                    </span> --}}
                    

                    <span id="StrengthDisp" class="badge displayBadge">Weak</span>

                </div>
            {{-- </div> --}}

        </div>
        <div style="position: relative; top: -20px">
            @include('front.app-module.home.modals.components.connexion-externe-component')
        </div>
        <button type="submit" hidden id="form-inscription-btn"></button>
    </form>
</div>

<script>
    let password = document.getElementById('formRegister-passwordRegister'); //barre-error
    let strongPassword = new RegExp('(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*[A-Za-z0-9])(?=.{8,})')
    let mediumPassword = new RegExp('((?=.*[0-9])(?=.*[A-Za-z0-9])(?=.{6,}))|((?=.*[a-z])(?=.*[A-Z])(?=.*[A-Za-z0-9])(?=.{6,}))')
    let weakPassword = new RegExp('((?=.*[0-9])(?=.*[A-Za-z0-9])(?=.{5,}))|((?=.*[a-z])(?=.*[A-Z])(?=.*[A-Za-z0-9])(?=.{6,}))')

    // let nameInput = document.getElementById('formRegister_prenom-input').value
    // let firstnameInput = document.getElementById('formRegister_prenom-input').value
    let strengthbar = document.getElementById("meter")
    let iProgressBar = 0
    let textMessageProgressBar = document.getElementById('msg-progress-bar')
    const main_bar = document.getElementById('main-bar')
    let passwordVal = password.value;

    function StrengthChecker(PasswordParameter) {
        if (PasswordParameter.length == 0) {
        // console.log('votre valeur autre', PasswordParameter.length)
        main_bar.style.display = "none";
        } else {
            console.log('votre valeur', PasswordParameter.length)
        if(strongPassword.test(PasswordParameter)) {
            main_bar.style.display = "block";
            strengthbar.style.backgroundColor = "#00B517"
            strengthbar.style.height= "6px"
            strengthbar.style.borderRadius= "2.5px"
            strengthbar.style.width = "100%";
            textMessageProgressBar.innerHTML = "Fort"
            textMessageProgressBar.style.color = "#00B517"
        } else if(mediumPassword.test(PasswordParameter) && (PasswordParameter.length >= 6 && PasswordParameter.length <= 50)) {
            main_bar.style.display = "block";
            strengthbar.style.backgroundColor = "#FF9500"
            strengthbar.style.height= "6px"
            strengthbar.style.borderRadius= "2.5px"
            strengthbar.style.width = "70%";
            textMessageProgressBar.innerHTML = "Moyen"
            textMessageProgressBar.style.color = "#FF9500"
        } else {
                main_bar.style.display = "block";
                strengthbar.style.backgroundColor = "#D0021B"
                strengthbar.style.height= "6px"
                strengthbar.style.borderRadius= "2.5px"
                strengthbar.style.width = "50%";
                textMessageProgressBar.innerHTML = "Faible"
                textMessageProgressBar.style.color = "#D0021B"
        }
        }
    }

    // password.addEventListener('keyup', StrengthChecker(password.value))
    password.addEventListener("keyup", event => {
        console.log("Subscription password to check")
        event.preventDefault();
        if(passwordVal == null){
        strengthbar.style.backgroundColor = "#e9ecef"
        strengthbar.style.height= "6px"
        strengthbar.style.borderRadius= "2.5px"
        strengthbar.style.width = "100%";
        }else {
            StrengthChecker(password.value);
        }
    })
</script>



