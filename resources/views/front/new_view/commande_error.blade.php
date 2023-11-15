<style type="text/css">
    @import url('https://fonts.googleapis.com/css2?family=Gelasio:ital@1&family=Licorice&family=Noto+Sans&family=Roboto:wght@300;400&family=Tajawal:wght@300&display=swap');

    .modal-body-error {
        display: flex;
        flex-direction: column;
        flex-wrap: nowrap;
        justify-content: center;
        align-items: center;
        padding-bottom: 0px;
    }

    .modal-dialog-error {
        position: relative;
    }

    .center-demande-error {
        top: 47% !important;
        transform: translateY(-50%) !important
    }

    .modal-dialog-error, .modal-content-error {
        box-sizing: border-box;
        height: 332px !important;
        width: 429px !important;
        border-radius: 6px;
        background-color: #FFFFFF;
        box-shadow: 0 5px 15px 0 rgba(0,0,0,0.35);
    }

    .modal-content-error {
        border: 3px solid #D0021B !important;
    }

    .title_mod_erro_new {
        display: flex;
        justify-content: center;
        align-items: center;
        color: #D0021B;
        font-family: Roboto;
        font-size: 20px;
        font-weight: 500;
        letter-spacing: 0;
        line-height: 23px;
        text-align: center
    }

    .img_close_mod_error {
        height: 24px;
        width: 24px;
        outline: none;
        border: 1px solid red;
        border-radius: 50%;
        background-color: #fff;
        justify-content: center;
        align-items: center;
        position: relative;
        top: -3px;
    }

    .modal-header-error .rounded-check svg {
        color: red;
        position: relative;
        left: 0.5px;
        top: -2px;
    }

    .modal-header-error h4 {
        height: 24px;
        width: 206px;
        color: #D0021B;
        font-family: Roboto;
        font-size: 20px;
        font-weight: 500;
        letter-spacing: 0;
        line-height: 24px;
        text-align: center;
    }

    .body-text-section-1 {
        height: 42px;
        width: 354px;
        color: #4A4A4A;
        font-family: Roboto;
        font-size: 18px;
        font-weight: 500;
        letter-spacing: 0;
        line-height: 21px;
        text-align: center;
        height: 74px;
        position: relative;
        margin-left: auto;
        margin-right: auto;
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .modal-body-error .coordonne-commande {
        margin-bottom: 0px;
    }

    .modal-body-error .coordonne-commande .auth-text {
        margin-bottom: 0px;
    }

    .modal-footer-error {
        display: flex;
        justify-content: center;
        align-items: center;
        border: none;
    }

    .modal-footer-error .renvoyer{
        height: 37px;
        width: 395px;
        border-radius: 6px;
        background-color: #1A7EF5;
        color: #FFFFFF;
        font-family: Roboto;
        font-size: 16px;
        font-weight: 500;
        letter-spacing: 0.35px;
        line-height: 18px;
    }

    .auth-text label {
        color: #191970;
        font-family: Roboto;
        font-size: 14px;
        font-weight: 700;
        letter-spacing: 1.2px;
        line-height: 16px;
    }

    .body-text-section-3 {
        height: 14px;
        width: 356px;
        font-family: Roboto;
        font-size: 12px;
        letter-spacing: 0;
        line-height: 13px;
        text-align: center;
        position: relative;
        margin-right: auto;
        margin-left: auto;
    }

    .banque-text_new {
        height: 36px;
        width: 395px;
        color: #4A4A4A;
        font-family: Roboto;
        font-size: 15px;
        font-weight: 300;
        letter-spacing: 0;
        line-height: 17px;
        text-align: center;
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .btn:focus {
        outline: thin dotted;
        outline: 5px auto -webkit-focus-ring-color;
        outline-offset: -2px;

    }

    .btn:active {
        border: none;
        outline: none;
        box-shadow: none;
    }

    @media only screen and (max-width: 540px) {

    .modal-error-content {
        box-sizing: border-box;
        height: 332px !important;
        width: 320px !important;
        border-radius: 6px;
        background-color: #FFFFFF;
        box-shadow: 0 5px 15px 0 rgba(0,0,0,0.35);
    }

    .body-text-section-1 {
        width: 315px !important;
    }

    .error-header-text {
        width: 71% !important;
    }

    .banque-text_new {
        width: 290px !important;
        font-size: 12px !important;
    }

    .body-text-section-3 {
        width: 320px !important;
    }

    .body-text-section-3 {
        width: 290px !important;
    }

    .orientation-text {
        margin-left: 0px !important;
    }

    .modal-footer-error .renvoyer {
        width: 293px !important;
        font-size: 12px !important;
    }

    .img_close_mod_error{
        position: relative;
        left: 0px !important;
    }

    .title_mod_erro{
        position: relative;
        left: -54px !important;
        top: 6px;
    }

    .modal-footer-error .renvoyer {
        height: 37px;
        width: 395px;
        border-radius: 6px;
        background-color: #1A7EF5;
        color: #FFFFFF;
        font-family: Roboto;
        font-size: 13px;
        font-weight: 500;
        letter-spacing: 0.35px;
        line-height: 18px;
    }

    .orientation-text {
        height: 14px;
        width: 340px;
        font-family: Roboto;
        font-size: 12px;
        letter-spacing: 0;
        line-height: 13px;
        text-align: center;
        margin-left: -14px;
    }

    .banque-text {
        height: 36px;
        width: 340px;
        color: #4A4A4A;
        font-family: Roboto;
        font-size: 12px;
        font-weight: 300;
        letter-spacing: 0;
        line-height: 17px;
    }

        .modal-body-error {
            display: block;
            flex-direction: column;
            flex-wrap: nowrap;
            justify-content: center;
            align-items: center;
            padding-bottom: 0px;
            margin-left: -26px !important;
        }
    }

        .modal-error-content {
            box-sizing: border-box;
            height: 332px !important;
            width: 429px;
            border-radius: 6px;
            background-color: #FFFFFF;
            box-shadow: 0 5px 15px 0 rgba(0,0,0,0.35);
            border: 3px solid #D0021B !important;
        }

        .modal-error-header {
            height: 65.5px;
            width: 100%;
            border-radius: 6px 6px 0px 0px;
            display: flex;
            justify-content: center;
            align-items: center;
            padding-top: 10px;
            border: 1px solid #ccc;
        }

        .error-icon {
            width: 8%;
        }

        .error-header-text {
            width: 53%;
        }

        .body-text-section-2 {
            height: 80px;
            position: relative;
            margin-left: auto;
            margin-right: auto;
        }

        .modal-error-body {
            height: 214px;
        }

	</style>

    <div class="main_panier_v2 input-none-panier-v2" id="commandError">

        <div class="modal-error-content">

            <div class="modal-error-header">
                <div class="error-icon">
                    <img class="img_close_mod_error" src="/assets/images/Cancel-red.svg" alt="">
                </div>
                <div class="error-header-text">
                    <h5 class="title_mod_erro_new" style="position: relative;"><i class="bi bi-x-lg"></i>ERREUR DE PAIEMENT</h5>
                </div>
            </div>

    <div class="modal-error-body">

        <div class="body-text-section-1">
            Nous n’avons pas été en mesure<br/>
            de traiter votre paiement.
        </div>

        <div class="body-text-section-2 banque-text_new">
            Contactez votre banque pour plus de détails, saisissez <br /> les informations d’un autre mode de paiement.
        </div>

        <div class="body-text-section-3">
            <span class="orientation-text" style="position: relative;">
                Si les problèmes persistent, veuillez contacter <a href="" style="text-decoration: underline">l’équipe de support</a>.
            </span>
        </div>

    </div>

    <div class="modal-error-footer modal-footer-error">
        <button type="button" class="btn btn-primary renvoyer" onclick="backRecapCheckOut()">
            <svg style="position: relative; left: -10px" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-chevron-left" viewBox="0 0 16 16">
                <path fill-rule="evenodd" d="M11.354 1.646a.5.5 0 0 1 0 .708L5.707 8l5.647 5.646a.5.5 0 0 1-.708.708l-6-6a.5.5 0 0 1 0-.708l6-6a.5.5 0 0 1 .708 0z"/>
                </svg>
            Essayer une autre méthode de paiement.
        </button>
    </div>
</div>

    </div>
