<style>
    #formEditUserPassword_myform .taille-margin-right-conn .btn-active{
        border: 1px solid #1A7EF5;
        background-color: #1A7EF5 !important;
        color: #FFFFFF ;
    }
    #formEditUserPassword_myform .taille-margin-right-conn .btn-active:hover{
        background-color: #146FDA !important;
    }


    #formEditUserEmail_myform .taille-margin-right-conn .btn-active{
        border: 1px solid #1A7EF5;
        background-color: #1A7EF5 !important;
        color: #FFFFFF ;
    }

#formEditUserEmail_myform .taille-margin-right-conn .btn-active:hover{
    background-color: #146FDA !important;
}

.btn-modif-conn{
    height: 37px;
    width: 194px;
    border-radius: 6px;
    background-color: #9B9B9B;
    color: #FFFFFF;
    font-family: Roboto;
    font-size: 16px;
    font-weight: 500;
    letter-spacing: 0.35px;
    line-height: 18px;
    text-align: center;
    margin-left:100px;
    border: transparent;
    z-index:1;
    margin-top:-6px;
}

.hide {
  display: none !important;
}

.block-btn {
    pointer-events: none;
}

.Bcolor{
    background-color: #9B9B9B !important;
}

.success-message {
    height: 32px;
    width: 825px !important;
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

.form-section-2 {
    margin-bottom: 33px;
    display: flex;
    left: 15px;
    position: relative;
    margin-top: 20px
}

</style>
<div id="connexion" class="donnees" style="display: none">

    <div class="d-flex" style="height: 93%;width: 100%;">


        <div class="form-section-2">
            <div class="form-left">
                <p class="text-connexion">Changer votre moyen de connexion</p>
                <form  id="formEditUserEmail_myform" data-btn="#formEditUserEmail_submit-btn" action="@auth{{ url('update-user-profil-email/'. Auth::user()->id) }}@endauth" method="post" >
                    @csrf
                    <div  style="margin-bottom: 18px">


                    <input  readonly disabled class="input-general-second" style=" border: 1px solid #00B517;background-image:url('/assets/images/icones-vendeurs2/Valide.svg');background-repeat:no-repeat;background-position: top 7px right 10px;"  name="formEditUserEmail_email" id="formEditUserEmail_email-input" value="@auth{{ Auth::user()->email }}@endauth" class="my-form-field input-connexion-profil " placeholder="Adresse email"  type="email"  required  pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$" >
                    <div id="formEditUserEmail_email-error" class="formEditUserEmail_error-text error-text error-msg"></div>

                    </div>

                    <div  style="margin-bottom: 18px">

                            <input class="input-general-second" type="email" id="formEditUserEmail_email_confirmation-input" name="formEditUserEmail_email_confirmation" class="my-form-field input-connexion-profil " placeholder="Votre adresse email"  required pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$" >
                            <div id="formEditUserEmail_email_confirmation-error" class="formEditUserEmail_error-text error-text error-msg"></div>

                    </div>
                    <div  style="margin-bottom: 18px">


                        <input class="input-general-second" type="text" id="confirmermotdepasse" name="confirmationdemotdepasse" class="input-connexion-profil " placeholder="Entrez votre mot de passe actuel"  required pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$" >
                        <div id="formEditUserEmail_email_confirmation-error" class="formEditUserEmail_error-text error-text error-msg"></div>

                </div>

                    <div class="taille-margin-right-conn">
                        <button type="button" class=" btn-modif-conn" disabled id="formEditUserEmail_submit-btn" onclick="updateCostomerEMail()">
                                <span class="mbtn-text-0">Modifier</span>
                                <span class="spinner-border hide" id="sms_spiner-resends" role="status" aria-hidden="true"></span>
                        </button>
                    </div >


                    </form>
            </div>




            <div class="form-right" style="margin-left: 25px;">
            <form id="formEditUserPassword_myform" data-btn="#formEditUserPassword_submit-btn" action="@auth{{ url('update-user-profil-password/'. Auth::user()->id) }}@endauth" method="post" >
                @csrf
                    <p class="text-pass">Changer votre mot de passe</p>
                    <div class="row" style="margin-bottom: 18px">

                            <input class="input-general-second" name="formEditUserPassword_password_actuel" id="formEditUserPassword_password_actuel" class="my-form-field input-connexion-profil" placeholder="Mot de pass actuel" type="password"  minlength="4" required>
                            <!-- <input type="text" class="form-control input-element-lg" placeholder="uriel.nedelec@gmail.com" name="Nom"> -->

                        <div class="d-none" id="formEditUserPassword_main-error">
                        <div class="d-flex justify-content-start">
                            <div class="login-error-image"><img src="{{ asset('assets/images/warning-icon.svg') }}" alt=""></div>
                            <div class="login-error-text">
                                <p>Mot de passe incorrect</p>
                            </div>
                        </div>
                    </div>
                    </div>
                    <div class="row" style="margin-bottom: 18px">


                            <input class="input-general-second" id="formEditUserPassword_nouveau_password-input" name="formEditUserPassword_nouveau_password"  class="my-form-field input-connexion-profil" placeholder="Nouveau mot de pass" type="password"  required>
                            <div id="formEditUserPassword_nouveau_password-error" class="formEditUserPassword_error-text error-text error-msg"></div>

                    </div>
                    <div class="row" style="margin-bottom: 18px">


                            <input class="input-general-second" id="formEditUserPassword_nouveau_password_confirmation-input" name="formEditUserPassword_nouveau_password_confirmation" class="my-form-field input-connexion-profil" placeholder="Confirmer le nouveau mot de pass" type="password"  required>
                            <div id="formEditUserPassword_nouveau_password_confirmation-error" class="formEditUserPassword_error-text error-text error-msg"></div>

                    </div>

                    <div class="taille-margin-right-conn">
                        <button type="button" class=" btn-modif-conn" disabled id="formEditUserPassword_submit-btn">
                                <span class="mbtn-text-0">Modifier</span>
                                <span class="spinner-border hide" id="sms_spiner-resendk" role="status" aria-hidden="true"></span>
                        </button>
                     </div>
                    </form>
            </div>

        </div>

        <div id="success_good" class="success-message hide">
            <span>Mise à jour avec succès</span>
        </div>

        <div class="last-button" style="z-index: 1000">
            <button class="btn-default">Modifier</button>
        </div>

    </div>


    <div id="btn-succ-update-password"></div>
    <div id="btn-succ-update-email"></div>


</div>

<script>




    $('#formEditUserEmail_email_confirmation-input').on('blur', function() {
            let email = $('#formEditUserEmail_email_confirmation-input').val();
            let isvalid = ValidateEmail(email)

            if (!isvalid) {
                $('#formEditUserEmail_email_confirmation-input').addClass('input-error-warning')
                $('#formEditUserEmail_email_confirmation-input').removeClass('input-success-border')
                error_flag_email = true
            }else {
                $('#formEditUserEmail_email_confirmation-input').removeClass('input-error-warning')
                $('#formEditUserEmail_email_confirmation-input').addClass('input-success-border')
                error_flag_email = false
            }
        })

        function ValidateEmail(mailval){
                var emailv = mailval
                if (/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/.test(emailv))
                {
                    return (true)
                }else {
                    return false;
                }
        }

    function updateCostomerEMail() { 
    console.log('Here is the email update place')
    var data={};
    var urls= $('#formEditUserEmail_myform').attr('action')
    console.log(urls);

    data = {
        'email': $('#formEditUserEmail_email_confirmation-input').val(),
        'password': $('#confirmermotdepasse').val(),
    }

    $("#formEditUserEmail_email_confirmation-input").removeClass('input-success-border');
    $("#formEditUserEmail_email_confirmation-input").removeClass('input-error-warning');
    $("#confirmermotdepasse").removeClass('input-error-warning');
    $("#confirmermotdepasse").removeClass('input-success-warning');


       $.ajaxSetup({
        headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

       $.ajax({
            type: "POST",
            url: urls,
            data: data,
            dataType: "json",


            beforeSend: function(params) {
                $('#sms_spiner-resends').removeClass('hide')
                $('#formEditUserEmail_submit-btn').find('.mbtn-text-0').addClass('hide');
                $('#formEditUserEmail_submit-btn').addClass('block-btn');
                $('#formEditUserEmail_submit-btn').css('opacity','0.5');
            },

            success: function (response) {

                if(response.status === 400){
                    $('#formEditUserEmail_email_confirmation-input').addClass('input-error-warning');
                }

                if(response.status === 404){
                    $('#confirmermotdepasse').addClass('input-error-warning');
                }

                if(response.status === 200){
                $('#formEditUserEmail_email_confirmation-input').val("");
                $('#formEditUserEmail_email_confirmation-input').removeClass('input-success-border')
                $('#confirmermotdepasse').val("");
                $("#success_good").removeClass('hide');
                $('#formEditUserEmail_email-input').val(data.email);
                $('#formEditUserEmail_submit-btn').removeClass('btn-active');
                    setTimeout(function() {
                        $('#success_good').addClass('hide');
                        $('#formEditUserEmail_submit-btn').prop("disabled", true);
                    }, 5000)
                }

            },
            complete: function() {
                    $('#sms_spiner-resends').addClass('hide')
                    $('#formEditUserEmail_submit-btn').find('.mbtn-text-0').removeClass('hide');
                    $('#formEditUserEmail_submit-btn').removeClass('input-none');
                    $('#formEditUserEmail_submit-btn').removeClass('block-btn');
                    $('#formEditUserEmail_submit-btn').css('opacity','1');

            }
        });   // FIN AJAX CALL
        }


jQuery(document).ready(function () {

$(document).on('click', '#formEditUserEmail_submit-btn_down', function (e) {
    e.preventDefault();
    var data={};
    var urls= $('#formEditUserEmail_myform').attr('action')
    console.log(urls);

    data = {
        'email': $('#formEditUserEmail_email_confirmation-input').val(),
        'password': $('#confirmermotdepasse').val(),
    }

    $("#formEditUserEmail_email_confirmation-input").removeClass('input-success-border');
    $("#formEditUserEmail_email_confirmation-input").removeClass('input-error-warning');
    $("#confirmermotdepasse").removeClass('input-error-warning');
    $("#confirmermotdepasse").removeClass('input-success-warning');


       $.ajaxSetup({
        headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

       $.ajax({
            type: "POST",
            url: urls,
            data: data,
            dataType: "json",


            beforeSend: function(params) {
                $('#sms_spiner-resends').removeClass('hide')
                $('#formEditUserEmail_submit-btn').find('.mbtn-text-0').addClass('hide');
                $('#formEditUserEmail_submit-btn').addClass('block-btn');
                $('#formEditUserEmail_submit-btn').css('opacity','0.5');
            },

            success: function (response) {

                if(response.status === 400){
                    $('#formEditUserEmail_email_confirmation-input').addClass('input-error-warning');
                }

                if(response.status === 404){
                    $('#confirmermotdepasse').addClass('input-error-warning');
                }

                if(response.status === 200){
                $('#formEditUserEmail_email_confirmation-input').val("");
                $('#formEditUserEmail_email_confirmation-input').removeClass('input-success-border')
                $('#confirmermotdepasse').val("");
                $("#success_good").removeClass('hide');
                $('#formEditUserEmail_email-input').val(data.email);
                $('#formEditUserEmail_submit-btn').removeClass('btn-active');
                    setTimeout(function() {
                        $('#success_good').addClass('hide');
                        $('#formEditUserEmail_submit-btn').prop("disabled", true);
                    }, 5000)
                }

            },
            complete: function() {
                    $('#sms_spiner-resends').addClass('hide')
                    $('#formEditUserEmail_submit-btn').find('.mbtn-text-0').removeClass('hide');
                    $('#formEditUserEmail_submit-btn').removeClass('input-none');
                    $('#formEditUserEmail_submit-btn').removeClass('block-btn');
                    $('#formEditUserEmail_submit-btn').css('opacity','1');

            }
        });   // FIN AJAX CALL
})

// ---------------------END PHASE 1------------------------------------------------





$(document).on('click', '#formEditUserPassword_submit-btn', function (e) {
    e.preventDefault();
    var data={};
    var urls= $('#formEditUserPassword_myform').attr('action');

    data = {
        'password_actuel':  $('#formEditUserPassword_password_actuel').val(),
        'password': $('#formEditUserPassword_nouveau_password-input').val(),
        'password_confirmation': $('#formEditUserPassword_nouveau_password_confirmation-input').val(),
    }

    $("#formEditUserEmail_email_confirmation-input").removeClass('input-error-warning');
    $("#formEditUserPassword_nouveau_password_confirmation-input").removeClass('input-error-warning');
    $("#formEditUserPassword_password_actuel").removeClass('input-error-warning');


       $.ajaxSetup({
        headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });



       $.ajax({
            type: "POST",
            url: urls,
            data: data,
            dataType: "json",


            beforeSend: function(params) {
                $('#sms_spiner-resendk').removeClass('hide')
                $('#formEditUserPassword_submit-btn').find('.mbtn-text-0').addClass('hide');
                $('#formEditUserPassword_submit-btn').addClass('block-btn');
                $('#formEditUserPassword_submit-btn').css('opacity','0.5');
            },
            success: function (response) {

                    if(response.status === 400){
                        $("#formEditUserEmail_email_confirmation-input").addClass('input-error-warning');
                    }

                    if(response.status === 404){
                        $("#formEditUserPassword_nouveau_password_confirmation-input").addClass('input-error-warning');
                    }
                    if(response.status === 401){
                        $("#formEditUserPassword_password_actuel").addClass('input-error-warning');
                    }

                    if(response.status === 200){

                        $('#formEditUserPassword_password_actuel').val("");
                        $('#formEditUserPassword_nouveau_password-input').val("");
                        $('#formEditUserPassword_nouveau_password_confirmation-input').val("");
                        $("#success_good").removeClass('hide');
                        $('#formEditUserPassword_submit-btn').removeClass('btn-active');
                        setTimeout(function() {
                            $('#success_good').addClass('hide');
                            $('#formEditUserPassword_submit-btn').prop("disabled", true);
                        }, 5000)
                    }
            },

            complete: function() {
                    $('#sms_spiner-resendk').addClass('hide')
                    $('#formEditUserPassword_submit-btn').find('.mbtn-text-0').removeClass('hide');
                    $('#formEditUserPassword_submit-btn').removeClass('input-none');
                    $('#formEditUserPassword_submit-btn').removeClass('block-btn');
                    $('#formEditUserPassword_submit-btn').css('opacity','1');

            }
        }); 
})







})
</script>
