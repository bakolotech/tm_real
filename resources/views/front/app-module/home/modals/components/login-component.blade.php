
<div class="r-l-title pxx-3">
    <div class="mon-title"><p>Heureux de vous revoir parmi nous !</p></div>
    <div class="mon-subtitle"><p>Vous pouvez vous connecter à TOULÈ Market avec <br> votre compte TOULÈ Market existant.</p></div>
</div>

<div class="ligne-100"></div>

<div  style="height: 357px !important; overflow: hidden; padding-top: 14.5px;">
    <form action="{{ url('/connexion') }}" data-tpost="async" method="post" id="formLogin_myform" data-btn="#login-register-btn">
        @csrf

        <div class="px-0-responsive-personalisee pxx-3">
            <input name="formLogin_email" id="formLogin_email-input" type="text" class="my-form-field" placeholder="Adresse e-mail ou numéro de portable">
            <div id="formLogin_email-error" class="formLogin_error-text error-text error-msg"></div>
        </div>

        <div class="px-0-responsive-personalisee pxx-3" style="margin-top: 15px;">
            <div class="d-flex justify-content-between my-form-field password-field p-0" id="formLogin_password-input">
                <input name="formLogin_password" type="password" style="padding-left: 13px" class="my-form-field-mute" id="formLogin_password-field" placeholder="Votre mot de passe">
                <div class="image-password" data-icon="0" onclick="togglePasswordEye(this)" data-password-id="#formLogin_password-field">
                    <img src='{{ asset('assets/images2/Fermes2.svg') }}' alt=''>
                </div>
            </div>
            <div id="formLogin_password-error" class="formLogin_error-text error-text error-msg"></div>
        </div>

        <div class="pxx-3 d-flex justify-content-end">
            <div class="d-none" id="formLogin_main-error" style="padding-right: 4px">
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
                <a href="javascript:;" style="height: 18px; color: #1A7EF5; font-size: 12px; letter-spacing: -0.34px; line-height: 18px; text-decoration: underline" onclick="loadPassword(0)">
                    Mot de passe oublié ?
                </a>
            </div>
        </div>
        @include('front.app-module.home.modals.components.connexion-externe-component')
        <button type="submit" hidden id="form-connexion-btn"></button>
</form>
</div>


