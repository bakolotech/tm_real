
<div class="px-3 d-flex justify-content-between" style="margin-top: 20px;">
    <div style="
        color: #4A4A4A;
        font-family: Roboto;
        font-size: 16px;
        font-weight: 500;
        letter-spacing: -0.39px;
        line-height: 19px;

        ">
        OU
    </div>
    <div class="ligne" style="position: relative; top: -2px"></div>
</div>

<div class="d-flex justify-content-between px-3 social-connexion-button-responsive " style="margin-top: 15px;">
    {{-- <div class="social-connexion-btn" style="width: 49%"  onclick="document.getElementById('facebook-auth').click()"> --}}
        <div class="social-connexion-btn" style="width: 49%"  onclick="document.getElementById('facebook-auth-bis-1').click()">
        <a id="facebook-auth" href="{{ url('/facebook-auth') }}" hidden class="d-none">connexion avec google</a>
        <div class="connexion-facebook m-0 p-0">
            <div class="icon-facebook"><img src="{{ asset('assets/images/facebook.svg') }}" alt=""></div>
            <div class="text-facebook">Continuer avec Facebook</div>
        </div>

    </div>
    <div style="width: 49%" class="social-connexion-btn">

        <div class="connexion-google" onclick="document.getElementById('google-auth').click()">
            <a id="google-auth" href="{{ url('/google-auth') }}" hidden class="d-none">connexion avec google</a>
            <div class="icon-google"><img src="{{ asset('assets/images/google.png') }}" alt=""></div>
            <div class="text-google"><span>Continuer avec Google</span></div>
        </div>

    </div>
</div>

<div class="text-sm-center" style="display: flex;justify-content: center;">
    <p>
        En signant de cette manière, vous acceptez notre <a href="javascript:;">Conditions d’utilisation</a>
        et <a href="javascript:;">Règles de confidentialité</a> et notre politique d’utilisation des cookies.
        Vous recevrez peut-être des notifications par texto de notre part et vous pouvez
        à tout moment vous désabonner.
    </p>
</div>
