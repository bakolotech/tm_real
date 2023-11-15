<style>
    .tm_loader-content {
        box-sizing: border-box;
        height: 332px !important;
        width: 429px !important;
        /* border: 2px solid #1A7EF5; */
        border-radius: 6px;
        background-color: #FFFFFF;
        box-shadow: 0 2px 6px 0 rgba(0,0,0,0.35);
    }
</style>


<div class="main_panier_v2 input-none-panier-v2" id="bachir-loader">
    <div class="tm_loader-content">
        <div class="d-flex justify-content-center" style="margin: 52px 87px 35.09px 87px;">
            <div class="loader-image" style="width: 255px; height: 46px">
                <img src="{{asset('assets/images/logo.png.svg')}}" alt="" style="height: 100%; width: 100%">
            </div>
        </div>
        <div class="d-flex justify-content-center">
            <div class="loader-main-text">
                Vérification de paiement <br>
                Veuillez patienter <span id="count-paiement-timeout">120</span>s
            </div>
        </div>

        <div class="d-flex justify-content-center">
            <div class="loader-loader">
                <img src="{{ asset('assets/images/loader.gif') }}" alt="" style="height: 100%; width: 100%">
            </div>
        </div>

        <div class="d-flex justify-content-center">
            <div class="loader-footer">
                <p>Veuillez ne pas actualiser votre navigateur.</p>
            </div>
        </div>
    </div>
</div>

<style>
    @media only screen and (max-width: 540px) {
        .loader-modal-primary {
            box-sizing: border-box;
            height: 332px !important;
            width: 340px !important;
            border: 2px solid #1A7EF5;
            border-radius: 6px;
            background-color: #FFFFFF;
            box-shadow: 0 2px 6px 0 rgba(0,0,0,0.35);
            margin-left: 10px;
        }

        .center-demande-error{
            margin-left: 18px !important;
        }

        .loader-image{
            width: 255px;
            height: 46px;
            /* margin-left: 0px !important; */
        }

        .loader-footer {
            height: 14px;
            width: 231px;
            color: #9B9B9B;
            font-family: Roboto;
            font-size: 12px;
            letter-spacing: 0;
            line-height: 13px;
            text-align: center;
            /* margin-left: -100px !important; */
        }

        .loader-loader {
            margin: 50.5px 0 52.89px 0;
            height: 15px;
            width: 128px;
            /* margin-left: -100px !important; */
        }

        .loader-main-text {
            color: #4A4A4A;
            font-family: Roboto;
            font-size: 18px;
            font-weight: 500;
            letter-spacing: 0;
            line-height: 20px;
            text-align: center;
            /* margin-left: -112px !important; */
        }

        .tm_loader-content {
            width: 320px !important;
        }
    }
</style>
