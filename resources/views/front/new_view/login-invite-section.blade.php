
<div class="r-l-title px-3">
    <div class="mon-title"><p>Heureux de vous revoir parmi nous !</p></div>
    <div class="mon-subtitle"><p>Vous pouvez vous connecter à TOULÈ Market avec <br> votre compte TOULÈ Market existant.</p></div>
</div>

<div class="ligne-100"></div>

<div  style="height: 214px !important; overflow: hidden; padding-top: 14.5px;">
    <form action="{{ route('inviter.login')}}"  method="post" id="formLogin_myform-inviter" >
        @csrf

        <div class="px-3">
            <input name="formLogin_email" id="formLogin_email-input-inviter" type="text" class="my-form-field" placeholder="Adresse e-mail ou numéro de portable">
            <div id="formLogin_email-error-inviter" class="formLogin_error-text error-text error-msg"></div>
        </div>

        <input type="hidden" name="_token" value="{{ csrf_token() }}">

        <div class="px-3" style="margin-top: 15px;">
            <div class="d-flex justify-content-between my-form-field password-field p-0" id="formLogin_password-input-client">
                <input name="formLogin_password" type="password" style="padding-left: 13px" class="my-form-field-mute" id="formLogin_password-field-inviter" placeholder="Votre mot de passe">
                <div class="image-password" data-icon="0" onclick="togglePasswordEye(this)" data-password-id="#formLogin_password-field-inviter">
                    <img src='{{ asset('assets/images2/Fermes2.svg') }}' alt=''>
                </div>
            </div>
            <div id="formLogin_password-error-inviter" class="formLogin_error-text error-text error-msg"></div>
        </div>

        <div class="px-3 d-flex justify-content-end">
            <div class="d-none" id="formLogin_main-error-inviter" style="padding-right: 4px">
                <div class="d-flex justify-content-center">
                    <div class="login-error-image"><img src="{{ asset('assets/images/warning-icon.svg') }}" alt=""></div>
                    <div class="login-error-text">
                        <p>
                            L'ID de connexion (adresse e-mail/numéro de portable)
                            <br>
                            ou le mot de passe est incorrect.
                        </p>
                    </div>
                </div>
            </div>
            <div class="float-right">
                <a href="javascript:;" style="height: 18px; color: #1A7EF5; font-size: 12px; letter-spacing: -0.34px; line-height: 18px; text-decoration: underline" onclick="forgetPassword(1)">
                    Mot de passe oublié ?
                </a>
            </div>

            <span class="login-error-message d-none" id="login-error-message-id-bis">L'ID de connexion (adresse e-mail/numéro de portable)<br>
                ou le mot de passe est incorrect.</span>
        </div>
        {{-- @include('front.app-module.home.modals.components.connexion-externe-component') --}}
        <button type="submit" hidden id="form-connexion-btn-inviter"></button>

</form>
</div>


<script type="text/javascript">
   $(document).ready(function() {
    $('#formLogin_myform-inviter').on('submit', function(event) {

    var url = $(this).attr('action')
    event.preventDefault()
    let user_email = $('#formLogin_email-input-inviter').val();
    let user_pwd = $('#formLogin_password-field-inviter').val();
    let source_demande_connexion = $('#demande_connection_source').val()

    if (user_email.length == 0 && user_pwd.length == 0) {
        // console.log('Il s\'agit de l\'inscription alors:')
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

        console.log('This is the object to subscribe', data)

        $.ajax({
        method: 'POST',
        url: '/register',
        data: data,
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
            success: function(response) {
                console.log('Votre reponse est:', response)

                $('#client-btn-inscription').addClass('button-mute');
                $('#client-btn-inscription').removeClass('actif');

                $('#client-btn-connexion').removeClass('button-mute');
                $('#client-btn-connexion').addClass('actif');
                // $('#'+ $(value).attr('data-panel')).addClass('d-none')
                $('#form-inscription-invite').addClass('d-none')
                $('#form-connexion-invite').removeClass('d-none')

            }
        })

    }else {

    console.log('Voici la source de la demande de la connexion:', source_demande_connexion)

    let data_connexion = {
        email: user_email,
        password: user_pwd,
        connexion_source: source_demande_connexion
    }

    $.ajax({
        method: 'POST',
        url: '/log_invite_user',
        data: data_connexion,
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        success: function(response) {


             if (response.status == 405) {

                $('#formLogin_email-input-inviter').addClass('input-error-warning')
                $('#formLogin_password-field-inviter').addClass('input-error-warning-pwd')
                $('#formLogin_password-input-client').addClass('pwd-border-error')
                $('#formLogin_password-field-inviter').val("")
                $('#login-error-message-id').removeClass('d-none')

             }else if(response.status == 200) {
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
                    $('#nbr_favorie').removeClass('menu-hidden')
                    getCategorisFavoris()
                    $('#inviteRegisterLoginModal').modal('hide')
                    $('#ajouter_favori').addClass('favari-svg-active')

                }else {
                    $('#listFavoriFormModal').modal('show')
                    $('#inviteRegisterLoginModal').modal('hide')
                    $('#nbr_favorie').removeClass('menu-hidden')
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

            }

        $('#tab-form-connection').addClass('infos-invite-none')
        $('#inviteRegisterLoginModal').modal('hide')
        }

        // __________________ get user favoris _____________________
        $.ajax({
            type: 'GET',
            url: '/all_user_favoris',
            data: {},
            success: function(response){
                $('#nbr_favorie').text(response.length)
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

        })

   })

</script>

