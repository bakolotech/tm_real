
<style>

    .modal-dialog-response-fp, .modal-content-response-fp {
        height: 277px !important;
        width: 432px !important;
        border-radius: 6px;
        background-color: #FFFFFF;
        box-shadow: 0 5px 15px 0 rgba(0,0,0,0.35);
    }

    .center-forgot-password {
        transform: translateY(-50%) !important;
        position: relative;
        top: 47%;
    }

    .btn-outline-primary-custom {
        box-sizing: border-box;
        height: 37px;
        width: 164px !important;
        border: 1px solid #1A7EF5 !important;
        border-radius: 6px;
        background-color: #FFFFFF;

        color: #1A7EF5;
        font-family: Roboto;
        font-size: 14px;
        font-weight: 500;
        letter-spacing: 0.31px;
        line-height: 14px;
        text-align: center;
    }

    .response-fb-header {
        height: 63.5px;
        /* background-color: #ccc; */
    }

    .response-fb-header h5 {
        height: 24px;
        width: 300px;
        color: #191970;
        font-family: Roboto;
        font-size: 21px;
        font-weight: 500;
        letter-spacing: 0;
        line-height: 24px;
        text-align: center;
        position: relative;
        left: 47px;
    }

    .custom-resent-pwd {
        height: 37px;
        width: 164px;
        border-radius: 6px;
        background-color: #1A7EF5;
        color: #FFFFFF;
        font-family: Roboto;
        font-size: 14px;
        font-weight: 500;
        letter-spacing: 0.31px;
        line-height: 18px;
        text-align: center;
    }

</style>
    <div class="modal fade" id="exampleModal2" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" style="z-index: 270000">
    <div class="modal-dialog modal-dialog-response-fp center-forgot-password" style="position: relative;">
        <div class="modal-content modal-content-response-fp" style="border-bottom: none;text-align: center;">

        <div class="modal-header response-fb-header"style="text-align: center;padding-bottom: 0px !important;">

            {{-- <button type="button" class="btn-close close-btn2" style="width: 24px; height: 24px;background-image: url('/assets/images2/close.svg') !important;background-size: 24px;background-repeat: no-repeat;border: 1px solid #fff;background-color: #1A7EF5;opacity: 1;border-radius: 50%;position: absolute; top: -21px;right: -9px;" onclick="closeResposeFp()"></button> --}}
            <button id="responseForgetPassWord" type="button" class="close-btn" style="z-index: 15000; position:absolute; right: -16px; top: -18px" >
                <img src="{{ asset('assets/images/close-btn.svg') }}" alt="">
            </button>

            <h5 class="">
                Vérifiez votre boîte de réception</h5>
        </div>

        <div class="modal-body" style="margin-top: 25px; margin-bottom: 25px; margin-left: 15px;">
            {{-- <p id="retour_request"></p> --}}
            <p class="auth-text" style="  height: 48px;width: 393px;color: #191970;font-family: Roboto;font-size: 14px;font-weight: 300; letter-spacing: -0.34px;line-height: 18px;text-align: center;padding: 0px;">
            Nous venons d'envoyer un lien de réinitialisation du mot de passe à<br>
            <span id="mon_email"></span>. <br>
            (Psst - vous devrez peut-être regarder dans votre dossier spam).
            </p>
            <p class="auth-text" style="  height: 48px;width: 393px;color: #191970;font-family: Roboto;font-size: 14px;font-weight: 300; letter-spacing: -0.34px;line-height: 18px;text-align: center;padding: 0px; margin-top: 25px;">
            Vous n'arrivez toujours pas à vous connecter ?<br>
            Demandez un nouvel envoie d’e-mail ci-dessous.
            </p>
        </div>

        <div class="modal-foo" style="position: relative;text-align: center;top: -18px;
        padding: 0px; display: flex; padding-left: 45px">
            <button type="button" class="btn-custom btn-outline-primary-custom" data-dismiss="modal" onclick="closeResposeFp()" style="margin-right: 14px">OK</button>
            <form action="{{ route('resent.password.post') }}" method="POST" data-tpost="async" id="resent_myform" data-btn="#resent-btn">
                @csrf
            <input type="hidden" name="token" value="{{Session::get('renvoyer_email')}}">
            <button type="submit" class="btn btn-primary custom-resent-pwd" >Renvoyer</button>
                </form>
        </div>

    <br><br>
    </div>
    </div>
    </div>

    <script>
        function closeResposeFp() {

        var pwd_source_modif = $('#pwd_modification_source').val();
        if (pwd_source_modif == '0') {

            $('#registerLoginModal').modal({
                backdrop: 'static',
                keyboard: false
            })

            // $('#registerLoginModal').modal('show');

            document.getElementById('register-login').click()

            $('#exampleModal2').modal('hide')

        }else if(pwd_source_modif == '1') {
            $('#exampleModal2').modal('hide')
            $("#inviteRegisterLoginModal").modal('show')
        }

        }
    </script>

    {{-- @endsection --}}
