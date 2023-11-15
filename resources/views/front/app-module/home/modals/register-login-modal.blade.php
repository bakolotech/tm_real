<style>
    .btn-animate-bg {
        position: absolute;
        transform: translate(-50%, -50%);
        pointer-events: none;
        background-color: rgba(124,252,0, 0.45);
        border-radius: 50%;
        animation: animate 1s linear infinite;
    }

    @keyframes animate {

        0% {
            width: 0px;
            height: 0px;
            opacity: 0.5;
        }

        100% {
            width: 1500px;
            height: 1500px;
            opacity: 0px;
        }

    }

    .select {
        box-sizing: border-box;
        height: 39px !important;
        width: 153px !important;
        border: 1px solid #9B9B9B;
        border-radius: 0 6px 6px 0;
        background-color: #FFFFFF;
        padding-left: 10px;
    }

    .input-group-prepend {
        box-sizing: border-box;
        height: 41px !important;
        width: 41px;
        border-radius: 6px 0 0 6px;
        background-color: #FFFFFF;
    }


</style>

<div class="modal fade" id="registerLoginModal" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true" style="z-index: 20000">
    <div class="modal-dialog modal-dialog-centered d-flex justify-content-center">
        <div class="modal-content register-login-cmodal-content" style="width: 432px; !important; height: 587px !important;">
            <button type="button" class="close-btn close-btn-inscription-helper" data-dismiss="modal" aria-label="Close" onclick="fermer_login_register()" style="position:absolute; right: -11px; top: -20px">
                <img src="{{ asset('assets/images/close-btn.svg') }}" alt="">
            </button>

            <div class="modal-body px-0 register-login-body" style="padding-top: 25px ">

                <div class="r-l-modal-btn d-flex justify-content-between px-3 ">

                    <div class="blue-active" style="width: 28%" id="connexion_1">
                        <button class="login-register-btn mon-button actif hover-actif" data-panel="form-connexion">Connexion</button>
                    </div>

                    <div class="blue-active" style="width: 28%" id="inscription_1">
                        <button class="login-register-btn mon-button button-mute hover-actif" data-panel="form-inscription">Inscription</button>
                    </div>

                    <div class="green-active" style="width: 40%; overflow: hidden; " id="vendeur_1">
                        <button style="overflow: hidden; position: relative" class="login-register-btn mon-button button-mute hover-actif mon-button-vendeur-helper" data-panel="form-devenir-vendeur">Devenir vendeur</button>
                    </div>

                </div>

                <div class="rl-modal-content">
                    <div id="form-connexion" class="forms-connexion-panel form-connexion">
                        @include('front.app-module.home.modals.components.login-component')
                    </div>

                    <div class="forms-connexion-panel form-inscription d-none" id="form-inscription">
                        @include('front.app-module.home.modals.components.register-component')
                    </div>

                    <div class="forms-connexion-panel form-devenir-vendeur d-none" id="form-devenir-vendeur" style="margin-bottom:7px">
                        @include('front.app-module.home.modals.components.vendeur-component')
                    </div>
                </div>

                <div class="modal-footer" style="height: 71px !important; border-top: none !important">
                    <div class="d-flex justify-content-center" style="width: 100%">
                        <button id="login-register-btn" disabled type="button" onclick="document.getElementById(this.getAttribute('data-for')).click()" data-for="form-connexion-btn" class="mon-btn btn-disabled btn-mute btn-accepter-langue-devise">Se connecter</button>
                    </div>
                </div>
 
            </div>
        </div>
    </div>
</div>
 
 
