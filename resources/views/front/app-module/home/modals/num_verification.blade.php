{{-- ------------------------------------- fin contact principal----------------------------------- --}}

<style>

    #ppvr-11,  #ppvr-21 {
        height: 240.05px;
        width: 246px;
        border-radius: 6px 19px 6px 6px;
        background-color: #1A7EF5;
        position: absolute;
        margin-top: -230px;
        padding: 7px;
        margin-right: -100px;
        margin-left: 82px;
        overflow-y: auto;
        overflow-x: hidden;
    }

    .rectangle-panel-button {
        margin-bottom: 29.5px;
    }

    .disable-button {
        box-sizing: border-box;
        height: 35px;
        width: 35px;
        border: 2px solid #FFFFFF;
        background-color: #D8D8D8;
    }

    .active_step {
        background-color: #D8D8D8;
    }

    .panel-button-text-desable {
        color: #9B9B9B !important;
        font-family: Roboto;
        font-size: 10px;
        font-weight: 500;
        letter-spacing: 0;
        line-height: 11px;
        text-align: center;
    }

    .custom-text-infos {
        height: 18px;
        color: #000000;
        font-family: Roboto;
        font-size: 18px;
        letter-spacing: 0.4px;
        line-height: 18px;
        justify-content: center;
        align-items: center;
        text-align: center;
        display: flex;
    }

    .custom-text-infos-text {
        color: #000000;
        font-family: Roboto;
        font-size: 18px;
        letter-spacing: 0.4px;
        line-height: 18px;
    }

    .box-sizing {
        height: 60px;
        width: 194px;
        padding: 0px;
    }

    .input-background {
        border: 1px solid #9B9B9B;
        border-radius: 6px;
        background-color: #F8F8F8;
    }

</style>

<style>

.container-1-infos {
    height: 240px;
    width: 633px;
    margin-top: 20.5px;
    border: 1px solid #D8D8D8;
    border-radius: 6px;
    position: relative;
    margin-left: auto;
    margin-right: auto;
}

.container-2-infos {
    height: 150px;
    width: 633px;
    border: 1px solid #D8D8D8;
    border-radius: 6px;
    position: relative;
    margin-left: auto;
    margin-right: auto;
}

.container-2-infos-add {
    margin-top: 20.5px;
    height: 14px;
    width: 145px;
    color: #191970;
    font-family: Roboto;
    font-size: 14px;
    font-weight: 500;
    letter-spacing: 0;
    line-height: 14px;
    position: relative;
    left: 60px;
    margin-bottom: 5px;
}

.line-container-1 {
    height: 60px;
}

.box-input1 {
    height: 60px;
    width: 195px;
}

.rectangle-select {
    box-sizing: border-box;
    border-radius: 6px;
    background-color: #F8F8F8 !important;
}

.label-el {
    height: 14px;
    color: #191970;
    font-family: Roboto;
    font-size: 14px;
    font-weight: 500;
    letter-spacing: 0.31px;
    line-height: 14px;
    margin-bottom: 5px;
}

.ul-select {
    width: 300px;
    border: 1px #000 solid;
    margin-top: 7px;
    height: 230px;
    overflow-y: auto;
    overflow-x: hidden;
}

.ul-select li { padding: 5px 10px; z-index: 2; }
.ul-select li:not(.init) {
    float: left;
    width: 300px;
    display: none;
    background: #ddd;

}
.ul-select li:not(.init):hover, ul li.selected:not(.init) { background: #09f; }
li.init { cursor: pointer; }

a#submit { z-index: 1; }

.pays-none {
    display: none;
}

.border-error-select {
    border: 1px solid #D0021B !important;
}

</style>

<style>
.line-container-2 {
    height: 41px;
    width: 100%;
}
</style>
<style>
.tooltips {
position: relative;
display: inline-block;
}

.tooltips .tooltiptext {
    visibility: hidden;
    height: 76px;
    width: 273.55px;
    border-radius: 6px;
    background-color: #FFFFFF;
    box-shadow: 0 0 6px 0 rgba(0,0,0,0.5);

    text-align: justify;
    border-radius: 6px;
    position: absolute;
    z-index: 1;

    top: -43px;
    left: 104%;
    margin-left: 6px;
    opacity: 0;
    transition: opacity 0.3s;
    color: #191970;
    font-family: Roboto;
    font-size: 12px;
    letter-spacing: 0;
    line-height: 13px;
}

.tooltips .tooltiptext::after {
    content: "";
    position: absolute;
    top: 31px;
    left: 100%;
    margin-left: -283px;
    border-width: 5px;
    border-style: solid;
    border-color: #fff transparent transparent transparent;
    transform: rotate(90deg);
}

.tooltips:hover .tooltiptext {
    visibility: visible;
    opacity: 1;

}

.tooltiptext p {
    height: 56px;
    width: 241px;
    color: #191970;
    font-family: Roboto;
    font-size: 12px;
    letter-spacing: 0;
    line-height: 13px;
    justify-content: center;
    text-align: justify;
    margin-top: 12px;
    margin-left: 15px
}

.cni-input {
    box-sizing: border-box;
    height: 41px;
    width: 397px;
    border: 1px solid #9B9B9B;
    border-radius: 0 6px 6px 0;
    background-color: #F8F8F8;
    padding-left: 10px;
}

.cni-select {
    width: 207px !important;
    padding-left: 10px;
    border: 1px solid #9B9B9B;
    border-right: none;
    padding-top: 2px;
}

.cni-input:focus, .cni-select:focus {
outline: none;
}

.main-sms-element {
    height: 31px;
    width: 133px;
    border-radius: 6px;
    background-color: #1A7EF5;
    margin-top:3.5px;
    margin-left:8px;
    padding-left:7px;
    padding-top:5px;
    position: relative;
    overflow: hidden;
}

.envoyer-un-sms {
    min-width: 35%;
    color:white;
    font-family: Roboto;
    font-size: 12px;
    font-weight: 500;
    letter-spacing: 0.26px;
    line-height: 12px;
    text-decoration: none;
    padding-left: 11px;
    position: relative;
    top: 3px;
    left: 3px;
    text-decoration: none
}

.envoyer-un-sms:hover {
    text-decoration: none;
    color: #fff;
}

.adress-principal-vendeur {
    box-sizing: border-box;
    height: 88px;
    width: 633px;
    border: 1px solid #D8D8D8;
    border-radius: 6px;
    background-color: #FFFFFF;
    position: relative;
    margin-left: auto;
    margin-right: auto;
}

.input-none {
    display: none !important;
}

.border-error {
    border: 1px solid red;
}

.span-element-code {
    width: 50px;
    height: 37px;
    text-align: center;
    padding-top: 10px;
    border: 1px solid #979797;
    border-right: none;
}


.v-none {
    visibility: hidden;
}

.input-code:focus {
    outline: none;
    border: 1px solid #979797;
}

.span-element-code {
    width: 50px;
    height: 37px;
    text-align: center;
    padding-top: 10px;
    border: 1px solid #979797;
    border-right: none;
}

.verified-section {
    box-sizing: border-box;
    height: 31px;
    width: 133px;
    border: 1px solid #00B517;
    border-radius: 6px;
    background-color: #FFFFFF;

    color: #00B517;
    font-family: Roboto;
    font-size: 12px;
    font-weight: 500;
    letter-spacing: 0.26px;
    line-height: 13px;
    position: absolute;
    display: flex;
    justify-content: center;
    align-items: center;
    align-content: center;
    text-align: center;
    margin-left: 301px;
    margin-top: -36px;
}

.input-retour-zone {
    box-sizing: border-box;
    height: 41px;
    width: 603px;
    border: 1px solid #9B9B9B;
    /* transform: rotate(180deg); */
    border-radius: 6px;
    background-color: #F8F8F8;
    margin-left: 15px;
    /* margin-top: 15px; */
    padding-left: 15px;
}

.retour-adress-zone-option {
    height: 32px;
    width: 633px;
    display: flex;
    margin-top: 23px;
}

.el111 {
    height: 32px;
    width: 316.5px;
    background: #fff;
    box-sizing: border-box;
    border: 1px solid #D8D8D8;
    /* border-radius: 0 0 0 6px; */
    background-color: #FFFFFF;
}

.el111 span {
    height: 12px;
    width: 108px;
    color: #191970;
    font-family: Roboto;
    font-size: 12px;
    font-weight: 500;
    letter-spacing: 0;
    line-height: 12px;
    margin-left: 47px;
}

.lock-phone {
    opacity: 0.5;
    pointer-events: none;
}

.next-btn-particulier {
    font-family: Roboto;
    font-size: 16px;
    font-weight: 500;
    letter-spacing: 0.35px;
    line-height: 19px;
    text-align: center; position: relative; overflow:hidden
}

</style>

<style>
.modal-dialog-verification {
    position: relative;
    top: 18%;
}

.modal-dialog-verification, .modal-content-verification {
    height: 295px;
    width: 432px;
    border-radius: 6px;
    background-color: #FFFFFF;
    box-shadow: 0 2px 6px 0 rgba(0,0,0,0.35);

}

.modal-dialog-verification-error {
    position: relative;
    top: 18%;
}

.modal-dialog-verification-error, .modal-content-verification-error {
    height: 295px;
    width: 432px;
    border-radius: 6px;
    background-color: #FFFFFF;
}

.modal-content-verification-error {
    box-sizing: border-box;
    height: 332px;
    width: 429px;
    border: 2px solid #D0021B;
    border-radius: 6px;
    background-color: #FFFFFF;
    box-shadow: 0 5px 15px 0 rgba(0,0,0,0.35);
}

.modal-header-verification {
    height: 63.5px;
    width: 100%;
}

.modal-footer-verification {
    height: 62px;
    width: 100%;
}

.modal-body-verification {
    width: 100%;
}

.modal-body-verification-error {
    width: 100%;
    height: 201px;
}

.modal-verification-body-content {
    height: 168.5px;
    width: 100%;
    color: #191970;
    font-family: Roboto;
    font-size: 13px;
    font-weight: 300;
    letter-spacing: -0.34px;
    line-height: 14px;
    text-align: justify;
}

.modal-verification-body-content-error {
    color: #191970;
    font-family: Roboto;
    font-size: 13px;
    font-weight: 300;
    letter-spacing: -0.34px;
    line-height: 14px;
    text-align: justify;
    position: relative;
    left: 40px;
}

.modal-verification-header {
    height: 24px;
    width: 330px;
    color: #191970;
    font-family: Roboto;
    font-size: 21px;
    font-weight: 500;
    letter-spacing: 0;
    line-height: 21px;
    text-align: center;
    margin-top: 20px;
    margin-left: 50px;
}

.modal-verification-header-error {
    height: 24px;
    width: 350px;
    color: #D0021B;
    font-family: Roboto;
    font-size: 20px;
    font-weight: 500;
    letter-spacing: 0;
    line-height: 22px;
    text-align: center;
    margin-top: 25px;
    margin-left: 55px;
    margin-bottom: 15px;
}

.verification-cancel {
    box-sizing: border-box;
    height: 37px;
    width: 164px;
    border: 1px solid #1A7EF5;
    border-radius: 6px;
    background-color: #FFFFFF;
    font-family: Roboto;
    font-size: 16px;
    font-weight: 500;
    letter-spacing: 0.35px;
    line-height: 16px;
    text-align: center;
    color: #1A7EF5;
}

.verification-suivant {
    height: 37px;
    width: 164px;
    border-radius: 6px;
    background-color: #1A7EF5;
    border: none;

    color: #FFFFFF;
    font-family: Roboto;
    font-size: 16px;
    font-weight: 500;
    letter-spacing: 0.35px;
    line-height: 16px;
    text-align: center;
}

.error-titre-verification {
    height: 21px;
    width: 316px;
    color: #4A4A4A;
    font-family: Roboto;
    font-size: 18px;
    font-weight: 500;
    letter-spacing: 0;
    line-height: 20px;
    margin-top: 25px;
    margin-bottom: 30px;
}

.text-error-content {
    height: 72px;
    width: 308px;
    color: #4A4A4A;
    font-family: Roboto;
    font-size: 15px;
    font-weight: 300;
    letter-spacing: 0;
    line-height: 17px;
    text-align: center;
}

.spine-position {
    position: absolute;
    margin-left: -276px;
    margin-top: -14px;
}

.tooltiptextDD {
    visibility: hidden;
    position: absolute;
    margin-top: -60px;
    color: #fff;
    background-color: #4A4A4A;
    padding-left: 5px;
    padding-right: 5px;
    padding-top: 2px;
    padding-bottom: 2px;
    font-size: 10px;
    width: 79px;
    margin-left: 5px;
}

.icon-item-zone:hover .tooltiptextDD {
    visibility: visible;
}
</style>

<style>
.verification-phone-info {
    height: 45px;
    width: 238px;
    margin-left: 97px;
    text-align: center;
    font-family: 'Roboto';
    font-style: normal;
    margin-top: 15px;
    font-size: 16px;
}

.verification-input-section {
    width: 370px;
    height: 41px;
    background-color: #F8F8F8;
    margin-left: 33px;
    margin-top: 20px;
    display: flex;
    border-radius: 6px;
    border: 1px solid #9B9B9B;
}

.tm-item {
    width: 40px;
    height: 41px;
    display: flex;
    align-content: center;
    justify-content: center;
    align-items: center;

    font-family: 'Roboto';
    font-style: normal;
    font-weight: 400;
    font-size: 14px;
    line-height: 14px;

    letter-spacing: -0.33px;
    color: #4A4A4A;
}

.input-item-zone {
    width: 290px;
    height: 41px;
}

.icon-item-zone {
    width: 40px;
    height: 39px;
    display: flex;
    align-content: center;
    justify-content: center;
    align-items: center;
    border-left: 1px solid #9B9B9B;
}

.verification-input-element {
    width: 290px;
    height: 39px;
    background: #F8F8F8;
    border: none;
    color: #4A4A4A !important;
    font-family: Roboto;
    font-size: 14px;
    letter-spacing: -0.34px;
    line-height: 16px;
    padding-top: 5px;
}

.verification-input-element:focus{
    outline: none;
}

.number-only-section {
    font-style: normal;
    font-weight: 500;
    font-size: 14px;
    line-height: 18px;
    text-align: center;
    letter-spacing: -0.337647px;
}

</style>
<style>
.tooltip-sms {
    position: relative;
    display: inline-block;
    border-bottom: 1px dotted black;
}

.tooltip-sms .tooltiptext {
    visibility: hidden;
    width: 120px;
    background-color: black;
    color: #fff;
    text-align: center;
    border-radius: 6px;
    padding: 5px 0;
    position: absolute;
    z-index: 1;
    bottom: 150%;
    left: 50%;
    margin-left: -60px;
}

.tooltip-sms .tooltiptext::after {
    content: "";
    position: absolute;
    top: 100%;
    left: 50%;
    margin-left: -5px;
    border-width: 5px;
    border-style: solid;
    border-color: black transparent transparent transparent;
}

.tooltip-sms:hover .tooltiptext {
    visibility: visible;
}

.tooltiptextDD {
    visibility: hidden;
    position: absolute;
    margin-top: -60px;
    color: #fff;
    background-color: #4A4A4A;
    padding-left: 5px;
    padding-right: 5px;
    padding-top: 2px;
    padding-bottom: 2px;
    font-size: 10px;
    width: 79px;
    margin-left: 5px;
}

.icon-item-zone:hover .tooltiptextDD {
    visibility: visible;
}

.spiner-box-zone {
    position: absolute;
    margin-left: 530px;
    background-color: transparent;
    border: none;
    margin-top: 5px;
}

.timer-section {
    height: 10px;
    width: 400px;
    position: relative;
    margin-left: auto;
    margin-right: auto;
    margin-top: 10px;
    text-align: center;
}

.disabled-btn-element {
    pointer-events: none
}

#boutique_spiner {
    position: absolute;
    margin-left: -543px !important;
    margin-top: -17px !important;
}

#sms_spiner-resend {
    position: absolute;
    margin-left: -277px !important;
    margin-top: -14px !important;
}

.resize-verifie-btn {
    position: relative;
    top: -5px;
}

#prenomContactEntreprise,
#prenom2ContactEntreprise,
#nomFamContactEnt:focus {
    outline: none;
}


/* tool adresse  */
.tooltips-adrr {
    position: relative;
    display: inline-block;
}

.tooltips-adrr .tooltiptext {
    visibility: hidden;
    height: 90px;
    width: 300.55px;

    height: 90px;
    width: 288px;
    border-radius: 6px;
    background-color: #FFFFFF;
    box-shadow: 0 0 6px 0 rgba(0,0,0,0.5);
    text-align: justify;
    border-radius: 6px;
    position: absolute;
    z-index: 1;
    top: -49px;
    left: 15px;
    margin-left: 158px;
    opacity: 0;
    transition: opacity 0.3s;

    color: #191970;
    font-family: Roboto;
    font-size: 12px;
    letter-spacing: 0;
    line-height: 13px;

}

.tooltips-adrr .tooltiptext::after {
    content: "";
    position: absolute;
    top: 38px;
    left: 273px;
    margin-left: -283px;
    border-width: 5px;
    border-style: solid;
    border-color: #fff transparent transparent transparent;
    transform: rotate(90deg);
}

.tooltips-adrr:hover .tooltiptext {
    visibility: visible;
    opacity: 1;
}

.tooltips-adrr p {
    height: 56px;
    width: 269px;
    color: #191970;
    font-family: Roboto;
    font-size: 12px;
    letter-spacing: 0;
    line-height: 14px;
    justify-content: center;
    text-align: justify;
    margin-top: 10px;
    margin-left: 10px;
}

/* tool adresse  */

</style>

<div class="modal modal-verification" backdrop="static" tabindex="-1" role="dialog"  aria-hidden="true" id="modalVerificationNumero" style="z-index:100000">
    <div class="modal-dialog modal-dialog-verification" role="document">
        <div class="modal-content modal-content-verification">

        <div class="modal-headerh modal-header-verification" style="border-bottom: 1px solid #ccc">
            <div class="modal-verification-header">
            Code de confirmation
            </div>
        </div>

        <div class="modal-body modal-body-verification" style="padding: 0px !important">
            <div class="modal-verification-body-content">

            <div class="verification-phone-info" >
               <div class="phone-section d-none">
                Vous devriez recevoir un texto au<br>
                    <span class="number-only-section">+241 <span id="inscription-number-phone-preview">62756478</span> (Gabon) </span><br>
                    contenant un code de confirmation
               </div>

               <div class="email-section">
               Vous devriez recevoir un mail au<br>
                <span class="number-only-section"><span id="inscription-mail-preview">62756478</span>  </span><br>
                contenant un code de confirmation
               </div>
            </div>

            <div class="verification-input-section">

                <div class="tm-item">
                    <img src="{{ asset('assets/images/tm-fav.svg') }}" alt="">
                </div>

                <div class="input-item-zone">
                    <input type="text" class="verification-input-element" id="inputCodeVerificationInscription" placeholder="Saisissez le code">
                    <input type="hidden" id="inscription_code_number_phone" />
                    <span class="input-none" id="phone-verification-erreur_inscription" style="color: red; position: relative; top: 23px; margin-left: auto; margin-right: auto; left: 26px">Code incorrect, veillez saisir un code valide</span>
                </div>

                <div class="icon-item-zone">
                    <button class="spiner-box-zone">
                        <span id="sms_spiner-resend"role="status" aria-hidden="true"></span>
                    </button>
                    <span class="tooltiptextDD" >Renvoyer le code</span>
                    <script src="https://cdn.lordicon.com/xdjxvujz.js"></script>

                    <button type="button" class="disabled-btn-element" id="resendCodeBtnInscription" style="border: none; background-color: transparent;" onclick="resendValidationCode()" disabled>

                        <span id="coloredReloadBtnInscription" class="input-none" >
                            <lord-icon
                                src="https://cdn.lordicon.com/sihdhmit.json"
                                trigger="click"
                                colors="primary:#1a7ef5"
                                style="width:30px;height:30px">
                            </lord-icon>
                        </span>

                        <span id="disabledReloadBtnInscription">
                            <lord-icon
                            src="https://cdn.lordicon.com/sihdhmit.json"
                            trigger="click"
                            colors="primary:#969696"
                            style="width:30px;height:30px">
                        </lord-icon>
                        </span>
                    </button>
                </div>

            </div>

            <p id="inscription_timer" class="timer-section"  style="position: relative; left: 0px">

            </p>

            </div>
        </div>

        <div class="modal-footer-verification" style="position: relative; top: -15px">

            <div style="padding-left: 45px">

                <button type="button" onclick="closePhoneValidationModal()" class="verification-cancel" style="margin-right: 12px">Annuler</button>

                <button id="validateCodeSms" onclick="checkVerificationCodeInscription()" type="button" class="verification-suivant" ><span class="check_text">Vérifier</span>
                    <span class="spiner-box-zone input-none">
                        <span id="boutique_spiner"role="status" aria-hidden="true"></span>
                    </span>
                </button>

            </div>

        </div>

        </div>
    </div>
    </div>
