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
	<!-- Modal -->
    <style>

        .modalCenteredRegisterLogin {
            transform: translateY(-50%) !important;
            position: relative;
            top: 56%;
        }

        .login-error-message {
            color: #D0021B;
            font-family: Roboto;
            font-size: 11px;
            letter-spacing: -0.27px;
            line-height: 12px;
            position: absolute;
            margin-right: 149px;
            margin-top: 5px;
        }

        .register_login_main_content {
            width: 432px;
            height: 446px;
            background: #fff;
            border-radius: 6px;
            padding-top: 23px;
        }

        @media screen and (max-width: 500px) {

        /* #inviteRegisterLoginModalClosed {
            position: absolute;
            right: -27px !important;
            top: -15px !important;
            margin-right: 14px !important;
        } */

        }

    </style>

    <div class="main_panier_v2 input-none-panier-v2" id="inviteRegisterLoginModal">
        <button id="inviteRegisterLoginModalClosed" type="button" class="close-btn-panier-bis" style="z-index: 15000; position:absolute; margin-right: -428px; margin-top: -449px;" >
            <img src="{{ asset('assets/images/close-btn.svg') }}" alt="">
        </button>
        <div class="register_login_main_content">

            <div class="r-l-modal-btn d-flex justify-content-between px-3">

                <div class="blue-active" style="width: 48%" id="connexion_2">
                    <button class="login-register-btn-client mon-button actif hover-actif" id="client-btn-connexion" data-panel="form-connexion-invite">Connexion</button>
                </div>

                <div class="blue-active" style="width: 48%" id="inscription_2">
                    <button class="login-register-btn-client mon-button button-mute hover-actif" id="client-btn-inscription" data-panel="form-inscription-invite">Inscription</button>
                </div>

            </div>

            <div class="rl-modal-content">
                <div id="form-connexion-invite" class="forms-connexion-panel form-connexion">
                    @include('front.new_view.login-invite-section')
                </div>

                <div class="forms-connexion-panel form-inscription d-none" id="form-inscription-invite">
                    {{-- @include('front.app-module.home.modals.components.register-component') --}}
                    @include('front.new_view.registere_invite_section')
                </div>

                <div class="forms-connexion-panel form-devenir-vendeur d-none" id="form-devenir-vendeur-invite" style="margin-bottom:7px">
                    {{-- @include('front.app-module.home.modals.components.vendeur-component') --}}
                </div>
            </div>

            <div class="modal-footer" style="height: 71px !important; border-top: none !important; ">
                <div class="d-flex justify-content-center" style="width: 100%">
                    {{-- <button id="login-register-btn-2"  type="button" onclick="connexionInviteUser()"  class="mon-btn btn-disabled btn-mute btn-accepter-langue-devise">Se connecter</button> --}}
                    <button id="login-register-btn-2"  type="button" onclick="connexionInviteUser()"  class="mon-btn btn-disabled btn-mute btn-accepter-langue-devise">
                        <span id="connexion-text-labelle">Se connecter</span>
                        <span class="spinner-border d-none" id="sms_spiner-resendG" role="status" aria-hidden="trueG"></span>
                    </button>

                </div>
            </div>


        </div>
    </div>



    <script>

        function getCategorisFavoris() {

           $.ajax({
            method: 'GET',
            url: '/get_user_favorie_categorie',
            data: {},
            success: function(response) {

                $('#favoris-categori-section').empty()
                for (let index = 0; index < response.length; index++) {

                    let favoris = response[index].favoris
                    let new_fav_categorie =
                    ` <label for="list-envi" style="" class="fav-checkbox-label">
                        <input onclick= "getCheckBoxValues(${response[index].id})" type="checkbox" name="fav-checkbox" class="fav-checkbox" value="${response[index].id}" id="favori-checkbox${response[index].id}"/>
                        <span class="fav-checkbox-span">${response[index].libelle}</span>
                        <span class="favori-counter">(${favoris.length})</span>
                    </label>`

                    $('#favoris-categori-section').append(new_fav_categorie)
                    id_cat_favori = 1;
                    $('#favori-checkbox1').prop('checked', true)

                }

            }

        })
    }

function inscription_Achat() {

    let prenom_client = $('#formRegister_prenom-input-invite').val();

    let nom_client = $('#formRegister_nom-input-invite').val();
    var sexe_invite = $("input[name='formRegister_sexe-invite']:checked").val();
    let localisation = $('#localization_invite-field').find(':selected').text();
    let email_client = $('#formRegister_email-input-invite').val();
    let password_invite = $('#formRegister-passwordRegister-invite').val();
    let confirm_password = $('#formLogin-registerLogin-invite').val()

    let data = {
        prenom: prenom_client,
        nom: nom_client,
        sexe: sexe_invite,
        ville: localisation,
        email: email_client,
        password: password_invite,
        password_confirmation: confirm_password
    }

    $.ajax({
    method: 'POST',
    url: '/register_achat',
    data: data,
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    },
    beforeSend: function() {
        $('#sms_spiner-resendG').removeClass('d-none')
        $('#connexion-text-labelle').addClass('d-none')
        $('#login-register-btn-2').removeClass('btn-active')
        $('#login-register-btn-2').addClass('btn-disabled')
    },
    success: function(response) {

    if (response.length > 0) {

    if (response[0].error == 2) {
        console.log('Ce numero existe déjà')
        $('.email-exist').removeClass('d-none')
        $('#formRegister_email-input-invite').addClass('input-error-warning-long')
        $('#login-register-btn-2').removeClass('btn-active')
        $('#login-register-btn-2').addClass('btn-disabled')

    } else if(response[0].error == 0) {
        $('#client-btn-inscription').addClass('button-mute');
        $('#client-btn-inscription').removeClass('actif');

        $('#client-btn-connexion').removeClass('button-mute');
        $('#client-btn-connexion').addClass('actif');
        // $('#'+ $(value).attr('data-panel')).addClass('d-none')
        $('#form-inscription-invite').addClass('d-none')
        $('#form-connexion-invite').removeClass('d-none')
    }

    }

    }, // Fin success
    complete: function() {
        $('#sms_spiner-resendG').addClass('d-none')
        $('#connexion-text-labelle').removeClass('d-none')
    }

  })
}

function connexionInviteUser() {

    let user_email = $('#formLogin_email-input-inviter').val();
    let user_pwd = $('#formLogin_password-field-inviter').val();
    let source_demande_connexion = $('#demande_connection_source').val()

    var in_stock_element = $('#in_stock_input_field_mobile').val()
    var product_id = $('#id_produit').val();

    console.log('In stock element ', in_stock_element)

    if ($('#client-btn-inscription').hasClass('actif')) {
        inscription_Achat()
    } else {

    console.log('Voici la source de la demande de la connexion:', source_demande_connexion)

    let data_connexion = {
        email: user_email,
        password: user_pwd,
        connexion_source: source_demande_connexion,
        instock: in_stock_element,
        product_id : product_id,
    }

    var filled_notif_icon =
    `
        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" class="bi bi-bell" viewBox="0 0 16 16" id="in_stock_notification">
            <path fill="#025816" d="M8 16a2 2 0 0 0 2-2H6a2 2 0 0 0 2 2zM8 1.918l-.797.161A4.002 4.002 0 0 0 4 6c0 .628-.134 2.197-.459 3.742-.16.767-.376 1.566-.663 2.258h10.244c-.287-.692-.502-1.49-.663-2.258C12.134 8.197 12 6.628 12 6a4.002 4.002 0 0 0-3.203-3.92L8 1.917z"/>
        </svg>
    `

    $.ajax({
    method: 'POST',
    url: '/log_invite_user',
    data: data_connexion,
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    },
    success: function(response) {

    if(response.status == 200) {
            // information-user
    $('#notif_btn_parent').empty()
    $('#notif-text-element').text('Vous serrez notifiez')
    $('#notif_btn_parent').append(filled_notif_icon)
    $('#guest-user-name').text(response['user'].nom +' '+ response['user'].prenom)
    $('#guest-user-personal_key').text(response['user'].personal_key)

    // profil box
    $("#guest-user-nom-prenom-connexion").text(response['user'].nom +' '+ response['user'].prenom)
    $("#guest-user-key-connexion").text(response['user'].personal_key)

    // general
    $('#formid').attr('action', '/update-user-profil/'+response['user'].id)
    $('#formEditUser_prenom-input').val(response['user'].prenom)
    $('#formEditUser_nom-input').val(response['user'].nom)

    if (response['user'].sexe == "F") {
        $('#formEditUser_femme').prop('checked',true);
    }else if(response['user'].sexe == 'H') {
        $('#formEditUser_homme').prop('checked', true);
    }

    $('#date-naisse').val(response['user'].date_naissance)
    $('#formEditUser_nom_entreprise-input').val(response['user'].nom_entreprise)
    $('#formEditUser_adresse-input').val(response['user'].adresse)

    $('#formEditUser_code_postale-input').val(response['user'].code_postal)
    $('#formEditUser_city_id').val(response['user']['maville'].id)

    $('#guest-user-pays-id').attr('src', '/assets/images2/'+response['user']['pays'].images)
    $('#guest-user-ville-name').text(response['user']['maville'].name)
    $('#guest-pays-icon-for-phone').attr('src', '/assets/images2/'+response['user']['pays'].images)
    $('#numero-telephone').val(response['user'].portable)

    // add adress user
    $('#formAddCarnetAdresseUser_prenom_nom').val(response['user'].prenom + ' '+ response['user'].nom);
    $('#formAddCarnetAdresseUser_portable').val(response['user'].portable);
    $('#formAddCarnetAdresseUser_adresse').val(response['user'].adresse)
    $('#formEditUser_city_id').val(response['user']['maville'].id);
    $('#guest-adresse-ville-name').text(response['user']['maville'].name);

    $('#company').val(response['user'].nom_entreprise)
    $('#formAddCarnetAdresseUser_code_postale').val(response['user'].code_postale);

    // connexion
    $('#formEditUserEmail_myform').attr('action', '/update-user-profil-email/'+response['user'].id)
    $('#formEditUserPassword_myform').attr('action', 'update-user-profil-password/'+response['user'].id)
    $('#formEditUserEmail_email-input').val(response['user'].email)

    // Traitement mobile
    $('#mobile-login-data-id').show()
    $('#mobile-login-form-section-id').hide()
    $('.mobile-panier-user-email-val').text(response['user'].email)

    }

    if (response.status == 405) {
    console.log('Probleme de connexion')

    $('#formLogin_email-input-inviter').addClass('input-error-warning')
    $('#formLogin_password-field-inviter').addClass('input-error-warning-pwd')
    $('#formLogin_password-input-client').addClass('pwd-border-error')
    $('#formLogin_password-field-inviter').val("")
    $('#login-error-message-id-bis').removeClass('d-none')

    }else if(response.status == 200) {
    $('#nbr_commande').text(response.client_commande)
    if (data_connexion.connexion_source == 'favoris') {
    // eclaireur ----> check if product exist in fav table
    var product_id = id_produit.value

    $.ajax({
    type: 'GET',
    url: '/check_favoris_existence',
    data: {product_id: product_id},
    success: function(response){
        if (response.length > 0) {

            console.log('Ce produit existe déjà:')
            console.log('Existence of product is here:', response)
            $('#nbr_favorie2').removeClass('menu-hidden')
            getCategorisFavoris()
            $('#inviteRegisterLoginModal').modal('hide')
            $('#ajouter_favori').addClass('favari-svg-active')

        }else {
            $('#listFavoriFormModal').modal('show')
            $('#inviteRegisterLoginModal').modal('hide')
            $('#nbr_favorie2').removeClass('menu-hidden')
            getCategorisFavoris()
        }
    }
    })


    }else {

    $('#nbr_favorie').addClass('menu-hidden')
    window.localStorage.removeItem('adresse_invite')
    let storage_data = JSON.parse(window.localStorage.getItem('adresse_invite'));
    console.log('Objet local storage:', storage_data) // removeItem
    $('#invite-pays-ville').text('Libreville')
    $('#invite-email-connected').text(response['user']['email'])
    if (response['carnet'].length == 0) {

        $('#invite-email-connected').text(response['email'])
        $('#section-addresse-non-defini').removeClass('infos-invite-none')
        $('#section-addresse-bien-defini').addClass('infos-invite-none')
        $('#section-invite-infos-connected').removeClass('infos-invite-none')

    }else{

        $('#invite-nom-prenom-connected').text(response['carnet'][0]['prenom_nom'])
        $('#invite-numero_tel-connected').text(response['carnet'][0]['portable'])
        $('#invite-quartier-address-connected').text(response['carnet'][0]['adresse'])
        $('#comp-addr-supp-connected').text(response['carnet'][0]['complement'])
        $('#invite-pays-connected').text(response['carnet'][0]['ville'])
        $('#invit-code-postal-connected').text(response['carnet'][0]['code_postale'])
        $('#address_actuel').val(response['carnet'][0]['id'])

        // --------------payement tab -----------------------------------
        $('#invite-email-connected-2').text(response['user']['email'])
        $('#invite-nom-prenom-connected-2').text(response['carnet'][0]['prenom_nom'])
        $('#invite-numero_tel-connected-2').text(response['carnet'][0]['portable'])
        $('#invite-quartier-address-connected-2').text(response['carnet'][0]['adresse'])
        $('#comp-addr-supp-connected-2').text(response['carnet'][0]['complement'])
        $('#invite-pays-connected-2').text(response['carnet'][0]['ville'])
        $('#invit-code-postal-connected-2').text(response['carnet'][0]['code_postale'])
        $('#hidden-connected-flag').val('true')
        $('#section-invite-infos-connected').removeClass('infos-invite-none')

        // Traitement Carnet mobile
        $('.mobile-user-nom-prenom').text(response['user']['email'])
        $('.mobile-user-adress').text(response['carnet'][0]['adresse'])
        $('#mobile-user-ville').text(response['carnet'][0]['ville'])
        $('#mobile-user-complement').text(response['carnet'][0]['complement'])
        $('#mobile-user-phone').text(response['carnet'][0]['portable'])

    }

        $('#tab-form-connection').addClass('infos-invite-none')
        // $('#inviteRegisterLoginModal').modal('hide')
        $('#inviteRegisterLoginModal').addClass('input-none-panier-v2')
    }

    // __________________ get user favoris _____________________
    $.ajax({
        type: 'GET',
        url: '/all_user_favoris',
        data: {},
        success: function(response){
            $('#nbr_favorie').text(response.length)
            $('#nbr_favorie28').text(response.length)


            console.log('Tous les favoris sont ici:', response)
        }
    })

    $('#mes-com-auto-menu').removeClass('menu-hidden')
    $('#mon-profil-auto-menu').removeClass('menu-hidden')
    $('#mon-historique-auto-menu').removeClass('menu-hidden')
    $('#mon-carnet-addr-auto-menu').removeClass('menu-hidden')
    $('#ma-deconnexion-auto-menu').removeClass('menu-hidden')
    $('#user-no-connexion-option').addClass('menu-hidden')
    $('#user-infos-auto-menu').removeClass('menu-hidden')

    $('#u-img-auto').attr('src', '/storage/images/ptofil-imgs/user-icon.svg')

    }

    }

    })
    }

}

function ValidateInviteLogin(prenom_input) {
    var isValid = false;
    var regex = /^[a-zA-ZÀ-ÿ-. ]*$/
    isValid = regex.test(prenom_input);
    return isValid;
}

// Accepter seulement les lettres
function onlyLettersIviteLogin(input) {
    var regex = /[^a-zA-ZÀ-ÿ-._ ]/gi;
    input.value = input.value.replace(regex, "");
}

function open_save_button_login_register () {

    let prenom = $('#formRegister_prenom-input-invite');
    let nom = $('#formRegister_nom-input-invite')
    let email = $('#formRegister_email-input-invite');
    let pwd = $('#formRegister-passwordRegister-invite');
    let c_pwd = $('#formLogin-registerLogin-invite')

    // ----------------------------- input values ---------------------------
    let prenom1 = $('#formRegister_prenom-input-invite').val();
    let nom1 = $('#formRegister_nom-input-invite').val()
    let email1 = $('#formRegister_email-input-invite').val();
    let pwd1 = $('#formRegister-passwordRegister-invite').val();
    let c_pwd1 = $('#formLogin-registerLogin-invite').val()

    let comp_addr2 = $('#comp-addre-user-invite').val();

    let code_poste_invite1 = $('#code-poste-user-invite');
    let nom_entreprise_invite = $('#nom-entreprise-user-invite');

    // pwd-border-error
    if (!$(prenom).hasClass('input-error-warning') && !$(nom).hasClass('input-error-warning') && !$(email).hasClass('input-error-warning-long') && !$(pwd).hasClass('input-error-warning-pwd') && !$(c_pwd).hasClass('input-error-warning-pwd') &&  prenom1.length > 0 && nom1.length > 0 && email1.length > 0  && pwd1.length > 4 && c_pwd1.length > 4) {

        $('#login-register-btn-2').removeClass('btn-disabled')
        $('#login-register-btn-2').addClass('btn-active')
    }else {
        console.log('Cette partie des conditions n\'est pas encore bien rempli:')
        $('#login-register-btn-2').removeClass('btn-active')
        $('#login-register-btn-2').addClass('btn-disabled')
    }
}

// fermeture du modal connexion
$(document).ready(function(){
    $('#inviteRegisterLoginModalClosed').on('click', function(){
        $('#inviteRegisterLoginModal').addClass('input-none-panier-v2')
        // $('#inviteRegisterLoginModal').modal('hide')
        // console.log('Modal closed')
    })

    // -------------------- section control des champs -------------------------
    $('#formRegister_prenom-input-invite').on('blur', function() {
        let email_valeur = $(this).val()
        if (email_valeur.length == 0) {
            $('#formRegister_prenom-input-invite').addClass('input-error-warning')
        }
    })

    $('#formRegister_prenom-input-invite').on('keyup', function() {
        let email_valeur = $(this).val()
        if (email_valeur.length > 0 && $('#formRegister_prenom-input-invite').hasClass('input-error-warning')) {
            $('#formRegister_prenom-input-invite').removeClass('input-error-warning')
        }else if (email_valeur.length == 0) {
            $('#formRegister_prenom-input-invite').addClass('input-error-warning')
        }
        open_save_button_login_register()
    })

    $('#formRegister_nom-input-invite').on('blur', function() {
        let email_valeur = $(this).val()
        if (email_valeur.length == 0) {
            $('#formRegister_nom-input-invite').addClass('input-error-warning')
        }
    })

    $('#formRegister_nom-input-invite').on('keyup', function() {
        let email_valeur = $(this).val()
        if (email_valeur.length > 0 && $('#formRegister_nom-input-invite').hasClass('input-error-warning')) {
            $('#formRegister_nom-input-invite').removeClass('input-error-warning')
        }else if (email_valeur.length == 0) {
            $('#formRegister_nom-input-invite').addClass('input-error-warning')
        }
        open_save_button_login_register()
    })

    // --------------------- email -------------------
    $('#formRegister_email-input-invite').on('blur', function() {
        let email_valeur = $(this).val()
        let isvalid = ValidateEmailInvite(email_valeur)

        if (!isvalid) {
            $('#formRegister_email-input-invite').addClass('input-error-warning-long')
            console.log('Invalide')
        }else {
            $('#formRegister_email-input-invite').removeClass('input-error-warning-long')
        }

        if (email_valeur.length == 0) {
            $('#formRegister_email-input-invite').addClass('input-error-warning-long')
        }

    })

    $('#formRegister_email-input-invite').on('keyup', function() {
        let email_valeur = $(this).val()
        if (email_valeur.length > 0 && $('#formRegister_email-input-invite').hasClass('input-error-warning-long')) {
            $('#formRegister_email-input-invite').removeClass('input-error-warning-long')
        }else if (email_valeur.length == 0) {
            $('#formRegister_email-input-invite').addClass('input-error-warning-long')
        }

        open_save_button_login_register()
    })

    // ---------------- password ----------------------
    $('#formRegister-passwordRegister-invite').on('blur', function(){
        let passwd = $('#formRegister-passwordRegister-invite').val()
        if (passwd.length < 5) {
            $('#pwd_error_message-vendeur').removeClass('error-none')
            $('#pwd_error_message-vendeur').addClass('block-display')
            $('#formRegister-passwordRegister-invite').addClass('input-error-warning-pwd')
            $('#formRegister_password-input').addClass('pwd-border-error')
            $('#formRegister_password-input').removeClass('input-success-border')
        }else{
            $('#pwd_error_message-vendeur').addClass('error-none')
            $('#pwd_error_message-vendeur').removeClass('block-display')
            $('#formRegister-passwordRegister-invite').removeClass('input-error-warning-pwd')
            $('#pwd-border-error').removeClass('pwd-border-error')
            $('#pwd-border-error').addClass('input-success-border')
        }
    })

    $('#formRegister-passwordRegister-invite').on('keyup', function() {
    let email_valeur = $(this).val()
    if (email_valeur.length > 0 && $('#formRegister-passwordRegister-invite').hasClass('input-error-warning-pwd')) {
        $('#formRegister-passwordRegister-invite').removeClass('input-error-warning-pwd')
        $('#formRegister_password-input').removeClass('pwd-border-error')
        // $('#formRegister_password-input').addClass('input-success-border')
    }else if (email_valeur.length == 0) {
        $('#formRegister-passwordRegister-invite').addClass('input-error-warning-pwd')
        $('#formRegister_password-input').addClass('pwd-border-error')
        // $('#formRegister_password-input').removeClass('input-success-border')
    }

    open_save_button_login_register()

    })

    // ---------------- confirme password --------------------
    $('#formLogin-registerLogin-invite').on('blur', function() {
    let passwordConfirmation = $('#formLogin-registerLogin-invite').val();
    let passwd = $('#formRegister-passwordRegister-invite').val()

    if (passwordConfirmation !== passwd) {
        $('#pwdconfirm_error_message-vendeur').removeClass('error-none')
        $('#pwdconfirm_error_message-vendeur').addClass('block-display')
        $('#formLogin-registerLogin-invite').addClass('input-error-warning-pwd')
        $('#formRegister_password_confirmation-input-client').addClass('pwd-border-error')
        $('#formRegister_password_confirmation-input-client').removeClass('input-success-border')
        error_flag_pwdconfirm = true;
    }else {
        $('#pwdconfirm_error_message-vendeur').addClass('error-none')
        $('#pwdconfirm_error_message-vendeur').removeClass('block-display')
        $('#formLogin-registerLogin-invite').removeClass('input-error-warning-pwd')
        $('#formRegister_password_confirmation-input-client').removeClass('pwd-border-error')
        $('#formRegister_password_confirmation-input-client').addClass('input-success-border')
        error_flag_pwdconfirm = false;
    }

    })

        $('#formLogin-registerLogin-invite').on('keyup', function() {
        let email_valeur = $(this).val()
        if (email_valeur.length > 0 && $('#formLogin-registerLogin-invite').hasClass('input-error-warning-pwd')) {
            $('#formLogin-registerLogin-invite').removeClass('input-error-warning-pwd')
            $('#formRegister_password_confirmation-input-client').removeClass('pwd-border-error')
            // $('#formRegister_password-input').addClass('input-success-border')
        }else if (email_valeur.length == 0) {
            $('#formLogin-registerLogin-invite').addClass('input-error-warning-pwd')
            $('#formRegister_password_confirmation-input-client').addClass('pwd-border-error')
            // $('#formRegister_password-input').removeClass('input-success-border')
        }

        open_save_button_login_register()
    })

        // --------------------- login form control -----------------------------

        function activeLoginBtn() {

            let email = $('#formLogin_email-input-inviter');
            let pwd = $('#formLogin_password-field-inviter')

            let email1 = $('#formLogin_email-input-inviter').val();
            let pwd1 = $('#formLogin_password-field-inviter').val()

            if (!$(email).hasClass('input-error-warning') && !$(pwd).hasClass('input-error-warning-pwd')  &&  email1.length > 0 && pwd1.length > 0 ) {
                $('#login-register-btn-2').removeClass('btn-disabled')
                $('#login-register-btn-2').addClass('btn-active')
                $('#login-error-message-id-bis').addClass('d-none')
            }else {
                $('#login-register-btn-2').removeClass('btn-active')
                $('#login-register-btn-2').addClass('btn-disabled')
            }

        }

        $('#formLogin_email-input-inviter').on('blur', function() {
            let email_valeur = $(this).val()
            if (email_valeur.length == 0) {
                $('#formLogin_email-input-inviter').addClass('input-error-warning')
            }
        })

        $('#formLogin_email-input-inviter').on('keyup', function() {
        let email_valeur = $(this).val()
            if (email_valeur.length > 0 && $('#formLogin_email-input-inviter').hasClass('input-error-warning')) {
                $('#formLogin_email-input-inviter').removeClass('input-error-warning')
            }else if (email_valeur.length == 0) {
                $('#formLogin_email-input-inviter').addClass('input-error-warning')
            }

            activeLoginBtn()
        })

        $('#formLogin_password-field-inviter').on('blur', function() {
            let email_valeur = $(this).val()
            if (email_valeur.length == 0) {
                $('#formLogin_password-field-inviter').addClass('input-error-warning-pwd')
                $('#formLogin_password-input-client').addClass('pwd-border-error')
            }
        })

        $('#formLogin_password-field-inviter').on('keyup', function() {
        let email_valeur = $(this).val()
            if (email_valeur.length > 0 && $('#formLogin_password-field-inviter').hasClass('input-error-warning-pwd')) {
                $('#formLogin_password-field-inviter').removeClass('input-error-warning-pwd')
                $('#formLogin_password-input-client').removeClass('pwd-border-error')
            }else if (email_valeur.length == 0) {
                $('#formLogin_password-field-inviter').addClass('input-error-warning-pwd')
                $('#formLogin_password-input-client').addClass('pwd-border-error')
            }

            activeLoginBtn()
        })


})

$('#formRegister_myformClient').on('submit', function(event) {
    event.preventDefault();
    connexionInviteUser()
})

    </script>
