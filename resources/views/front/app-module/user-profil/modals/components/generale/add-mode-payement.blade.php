
	<style type="text/css">
		@import url('https://fonts.googleapis.com/css2?family=Gelasio:ital@1&family=Licorice&family=Noto+Sans&family=Roboto:wght@300;400&family=Tajawal:wght@300&display=swap');

        .modal-content {
            height: 491px;
            width: 432px;
            border-radius: 6px;
            background-color: #FFFFFF;
            box-shadow: 0 5px 15px 0 rgba(0,0,0,0.35);
        }


        .payement-element-container {
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: flex-start;
        }

        .add-pay-header h4 {
            height: 24px;
            width: 276px;
            color: #191970;
            font-family: Roboto;
            font-size: 21px;
            font-weight: 500;
            letter-spacing: 0;
            line-height: 23px;
            text-align: center;
            position: relative;
            margin-left: auto;
            margin-right: auto;
            margin-top:10px;
        }

        .payement-element-container {
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: flex-start;

        }

        .payement-card {
            display: flex;
            justify-content: flex-start;
            align-items: center;
            box-sizing: border-box;
            height: 56px;
            width: 402x!important;
            border: 1px solid #9B9B9B;
            border-radius: 6px;
            position: relative;
            margin-left: 15px;
            margin-right: auto;
            margin-top: 5px;
            background-color: #FFFFFF;
        }

        .checkbox-element {
            margin-left: 30px;
        }

        .checkbox-element input{
            height: 16px;
            width: 16px;
            background-color: #191970;
        }

        input [type='radio']:checked::after {
            width: 15px;
            height: 15px;
            border-radius: 15px;
            top: -2px; left: -1px;
            position: relative;
            background-color: #ffa500;
            content: ''; display: inline-block;
            visibility: visible;
            border: 2px solid white;
        }

        .payement-element-img {
            margin-left: 10px;
        }

        .payement-element-img  img{
            height: 28px;
            width: 44px;
        }

        .payement-element-text {
            height: 18px;
            color: #191970;
            font-family: Roboto;
            font-size: 16px;
            font-weight: 500;
            letter-spacing: -0.39px;
            line-height: 18px;
            margin-left: 10px;
        }

        .footer-button {
            position: relative;
            display: flex;
        }
        .annul-button {
            box-sizing: border-box;
            height: 37px;
            width: 111px!important;
            border: 1px solid #1A7EF5;
            border-radius: 6px;
            background-color: #FFFFFF;
            margin-top:-15px;
            color: #1A7EF5;
            font-family: Roboto;
            font-size: 14px;
            font-weight: 500;
            letter-spacing: 0.31px;
            line-height: 18px;
            text-align: center;
            margin-left:36px;
        }

        .ajouter-button {
            height: 37px;
            width: 194px;
            border-radius: 6px;
            background-color: #1A7EF5;
            margin-top:-15px;
            color: #FFFFFF;
            font-family: Roboto;
            font-size: 14px;
            font-weight: bold;
            letter-spacing: 0.31px;
            line-height: 18px;
            text-align: center;
            border: none;
            margin-left: 15px;

        }

        .ajouter-button:hover{
            color: #FFFFFF;
            background-color: #146FDA;
        }

     .payement-card:hover{
        background-color: #F5F5F5;
        cursor: pointer;
        }

        .volet-droite-modal-dialog-add-pay, .volet-droite-modal-content-add-pay {
            position: relative;
            top: 50px;
        }

        .btn-inactive{
            background-color: #9B9B9B;
            color: #FFFFFF;
            font-family: Roboto;
            font-size: 16px;
            font-weight: 500;
            letter-spacing: 0.35px;
            line-height: 18px;
            text-align: center;
        }

        .payement-card-inactive {
            display: flex;
            justify-content: flex-start;
            align-items: center;
            box-sizing: border-box;
            height: 56px;
            width: 402px;
            border: 1px solid #9B9B9B;
            border-radius: 6px;
            position: relative;
            margin-left: auto;
            margin-right: auto;
            background-color: #9B9B9B;
        }

	</style>


	<!-- Modal -->
	<div class="modal fade" id="modePayementProfil" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" style="padding-left:250px">
	  <div class="modal-dialog volet-droite-modal-dialog-add-pay">
	    <div class="modal-content volet-droite-modal-content-add-pay" >

            <div class="modal-header add-pay-header">
                <h4>Choisir un mode de paiement</h4>
            </div>

          <div class="modal-body"  style="margin-top: 15px;">

            <div class="payement-element-container">

                <div class="payement-card" id="Amoney">

                    <div class="checkbox-element" >
                        <input type="radio" value="airtel" name="moovmoney" id="airtelmoney" disabled />
                    </div>

                    <div class="payement-element-img">
                        <img src="{{ asset('assets/images/icons/AirtelMoney.svg') }}" alt="" />
                    </div>

                    <div class="payement-element-text">
                        <span>Airtel Money</span>
                    </div>

                </div>

                <!-- --------------------- -->

                <div class="payement-card" id="Vmoney">

                    <div class="checkbox-element">
                        <input type="radio" value="airtel" name="moovmoney" id="visamoney" checked/>
                    </div>

                    <div class="payement-element-img">
                        <img src="{{ asset('assets/images/icons/Visa.svg') }}" alt="" />
                    </div>

                    <div class="payement-element-text">
                        <span>VISA</span>
                    </div>

                </div>

                <!-- ------------------------------- -->

                <div class="payement-card" id="Pmoney" style="margint-top:15px">

                    <div class="checkbox-element">
                        <input type="radio" value="airtel" name="moovmoney" id="paypalmoney" disabled/>
                    </div>

                    <div class="payement-element-img">
                        <img src="{{ asset('assets/images/icons/Paypal.svg') }}" alt="" />
                    </div>

                    <div class="payement-element-text">
                        <span>Paypal</span>
                    </div>

                </div>

                <!-- ----------------------------  -->


                <div class="payement-card" id="Mmoney">

                    <div class="checkbox-element">
                        <input type="radio" value="airtel" name="moovmoney" id="moovmoney" disabled/>
                    </div>

                    <div class="payement-element-img">
                        <img src="{{ asset('assets/images/icons/Moovmoney.svg') }}" alt="" />
                    </div>

                    <div class="payement-element-text">
                        <span>Moov Money</span>
                    </div>

                </div>

                <!-- ----------------------------  -->


                <div class="payement-card" id="Mamoney">

                    <div class="checkbox-element">
                        <input type="radio" value="airtel" name="moovmoney" id="mastermoney"/>
                    </div>

                    <div class="payement-element-img">
                        <img src="{{ asset('assets/images/icons/Mastercard.svg') }}" alt="" />

                    </div>

                    <div class="payement-element-text">
                        <span>MasterCard</span>
                    </div>

                </div>

                <div class="footer-button" >
                    <button class="annul-button"  id="closemenow">Annuler</button>
                    <button class="ajouter-button" id="add-payement-method">Ajouter ce paiement</button>
                </div>

            </div>

        </div>

	    </div>
	  </div>
	</div>

    <script>

            $('#Amoney').removeClass('payement-card');
            $('#Amoney').addClass('payement-card-inactive');
        jQuery(document).ready(function () {


            $(document).on('click', '#closemenow', function (e) {
                e.preventDefault();
                $('#modePayementProfil').modal('hide');
            })


            $(document).on('click', '#add-payement-method', function (e) {
                e.preventDefault();
                $('#modePayementProfilCarteCredit').css('padding-left','250px');

                console.log("add-mode-payement.blade.php");

                let checkState;
                let Creditcard_name;

                if($("#airtelmoney").is(":checked")){
                    checkState =1;
                }else if($("#visamoney").is(":checked")){
                    checkState =2;
                    Creditcard_name ='VISA CARD';
                }else if($("#paypalmoney").is(":checked")){
                    checkState =3;
                }else if($("#moovmoney").is(":checked")){
                    checkState =4;
                }else if($("#mastermoney").is(":checked")){
                    checkState =5;
                    Creditcard_name ='MASTER CARD'
                }
                else{
                    checkState=0;
                }

                localStorage.setItem('CCard_name', Creditcard_name); // set localStorge key value to 'CCard_name'


            })

    })
    </script>
