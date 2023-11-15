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

    .email-exist {
        font-size: 10px;
        position: relative;
        left: 72px;
        top: 1px;
        color: #D0021B
    }

    @media only screen and (max-width: 540px) {
        .for-mobile-esponsive-user-name {
            display: flex !important;
            column-gap: 10px;
        }

        .my-form-fields {
            width: 144px !important;
        }

        .select-ville-mobile {
            position: relative !important;
            top: 0px !important;
            width: 99px !important;
            left: 0px !important;
        }
    }

</style>

<div class="r-l-title px-3">
    <div class="mon-title"><p>Nouveau client ? Bienvenue !</p></div>
</div>

<div class="ligne-100"></div>
<div  style="height: 251px !important; overflow-y: scroll; overflow-x: hidden; padding: 0 0 0;">
    <form action="{{ url('/register') }}" method="post" id="formRegister_myformClient" >
        @csrf
        <div class="px-3s">
            <div class="rowf mt-3 for-mobile-esponsive-user-name" style="margin-left: 15px; display: flex">
                <div class="col col-login">

                    <div class=""><input name="formRegister_prenom" id="formRegister_prenom-input-invite" type="text" class="my-form-fields" placeholder="Prénom" onkeyup="onlyLettersIviteLogin(this)"></div>

                    <div id="formRegister_prenom-error-vite" class="formRegister_error-text error-text error-msg"></div>

                </div>
                <div class="col col-login">
                    <div class=""><input name="formRegister_nom" id="formRegister_nom-input-invite" type="text" class="my-form-fields" placeholder="Nom" onkeyup="onlyLettersIviteLogin(this)"></div>
                    <div id="formRegister_nom-error" class="formRegister_error-text error-text error-msg"></div>
                </div>
            </div>

            <div class="row mt-3" style="position: relative; left: -7px">
                <div class="col-6 col-login">
                    <div id="formRegister_sexe-input" style="display: flex; position: relative; left: 23.5px" >
                        <div class="femme-fiel" style="padding: 8px 0px 13px 18px">
                            <label class="form-check-label" for="formRegister-sexe_femme" style="margin-top: 0px; position: relative; left: -10px; margin-right: 10px">
                                Femme
                            </label>
                            <input style="width: 16px; height: 16px;" class="form-check-input" name="formRegister_sexe-invite" type="radio" value="F" id="formRegister-sexe_femme-invite">
                        </div>

                        <div class="homme-fiel" style="padding: 8px 0px 13px 18px">
                            <label class="form-check-label" for="formRegister-sexe_homme" style="margin-top: 0px; position: relative; left: -10px; margin-right: 10px">
                                Homme
                            </label>
                            <input style="width: 16px; height: 16px;" class="form-check-input" name="formRegister_sexe-invite" type="radio" value="H" id="formRegister-sexe_homme-invite">
                        </div>
                    </div>
                    <div id="formRegister_sexe-error" class="formRegister_error-text error-text error-msg"></div>
                </div>
                <div class="col-6 col-login" style="position: relative; right: -11px">
                    <div class="input-group mb-3">
                        <div class="input-group-prepend" style="width: 41px !important; height: 41px !important; ">
                            <span class="input-group-text" id="basic-addon1-invite" style="width: 41px !important; height: 41px !important; background-color: #ccc">
                                <img src="{{ \App\Models\Pays::getImage2($maPosition['images']) }}" alt="" id="langue-modal-region-img-invite" >
                            </span>
                        </div>
                            <div class="selects " style="width: 154px !important;">
                            <select
                                name="formRegister_ville"
                                style="width: 154px; padding: 13px 0 10px 15px; position: relative; "
                                class=" my-selectpays my-form-field-mute  select-ville-mobile"
                                data-img-field="#langue-modal-region-img-invite"
                                aria-label=".form-select-lg example"
                                id="localization_invite-field"
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
                        </div>
                      </div>
                    <div id="formRegister_ville-error-invite" class="formRegister_error-text error-text error-msg"></div>
                </div>
            </div>
            {{-- <div class="px-3"> --}}
                <div class="row mt-3" style="margin-left: 13px; margin-right: 13px; position: relative; top: -15px">
                    <div class="col col-login">
                        <input type="text" class="my-form-field" placeholder="Adresse e-mail ou numéro de portable" name="formRegister_email" id="formRegister_email-input-invite">
                        <span class="email-exist d-none">Cette adresse mail ou numero de téléphone existe déjà</span>
                    </div>
                </div>

                <div class="row mt-3" style="margin-left: 13px; margin-right: 13px; position: relative; top: -15px">

                    <div class="col col-login" style="margin-right: 7px !important">
                        <div class="d-flex justify-content-between my-form-field password-field p-0" id="formRegister_password-input">
                            <input type="password" name="formRegister_password" id="formRegister-passwordRegister-invite" style="padding-left: 13px" class="my-form-field-mute" placeholder="Mot de passe">
                            <div class="image-password" data-icon="0" onclick="togglePasswordEye(this)" data-password-id="#formRegister-passwordRegister" style="position: relative; left: -4px">
                                <img src='{{ asset('assets/images2/Fermes2.svg') }}' alt=''>
                            </div>
                        </div>
                        <div id="formRegister_password-error-invite" class="formRegister_error-text error-text error-msg"></div>
                    </div>

                    <div class="col col-login" style="margin-left: 7px !important">
                        <div class="d-flex justify-content-between my-form-field password-field p-0" id="formRegister_password_confirmation-input-client">
                            <input type="password" name="formRegister_password_confirmation" id="formLogin-registerLogin-invite" style="padding-left: 13px" class="my-form-field-mute" placeholder="Confirmer">
                            <div class="image-password" data-icon="0" onclick="togglePasswordEye(this)" data-password-id="#formLogin-registerLogin" style="position: relative; left: -4px">
                                <img src='{{ asset('assets/images2/Fermes2.svg') }}' alt=''>
                            </div>
                        </div>
                        <div id="formRegister_password_confirmation-error-invite" class="formRegister_error-text error-text error-msg"></div>
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
                    <span class="blue-warning" style="display: none" id="main-bar">

                        <div id="myProgress-invite" class="progress" >
                            <div id="meter-invite" class="metter" ></div>
                        </div>
                        <div>
                            <span id="msg-progress-bar-invite" class="msg-progress-bar" style="position: absolute; top: -2px; left: 180px"></span>
                        </div>
                    </span>

                    <span id="StrengthDisp-invite" class="badge displayBadge">Weak</span>

                </div>
            {{-- </div> --}}

        </div>
        {{-- <div style="position: relative; top: -20px">
            @include('front.app-module.home.modals.components.connexion-externe-component')
        </div> --}}
        {{-- <button type="submit" hidden id="form-inscription-btn"></button> --}}
    </form>
</div>

<script>
    // formLogin-registerLogin
    // $( document ).ready(function () {

    // })

    // const log = document.getElementById('formRegister-passwordRegister');

    // document.addEventListener('keyup', logKey);

    // function logKey() {
    // alert("salut")
    // }


</script>

