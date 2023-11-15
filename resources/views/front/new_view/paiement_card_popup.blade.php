<style type="text/css">
		@import url('https://fonts.googleapis.com/css2?family=Gelasio:ital@1&family=Licorice&family=Noto+Sans&family=Roboto:wght@300;400&family=Tajawal:wght@300&display=swap');

        .modal-dialog {
            position: relative;
        }

        .modal-content {
            /* height: 491px;
            width: 432px; */
            border-radius: 6px;
            background-color: #FFFFFF;
            box-shadow: 0 5px 15px 0 rgba(0,0,0,0.35);
        }

       .modal-dialog-credit-card-popup, .modal-content-credit-card-popup ,.modal-body-credit-card-popup {
            height: 491px !important;
            width: 432px !important;
        }

        .modal-dialog-credit-card-popup, .modal-content-credit-card-popup ,.modal-body-credit-card-popup {
            height: 491px !important;
            width: 432px !important;
        }

        .modal-header {
            text-align: center;
        }

        .modal-header h4 {
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
        }

        .modal-body {
            margin: 0px;
            padding: 0px;
            height: 491px;
            width: 432px;
        }

        .payement-element-container-bis {
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            position: relative;
        }

        .payement-card {
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

        .footer-button-credit-card-bis {
            position: relative;
            margin-left: auto;
            margin-right: auto;
            display: flex;
            justify-content: center;
            align-items: center;
            position: relative;
            flex-direction: row;
            column-gap: 10px;
        }
        .annul-button {
            box-sizing: border-box;
            height: 37px;
            width: 194px;
            border: 1px solid #1A7EF5;
            border-radius: 6px;
            background-color: #FFFFFF;

            color: #1A7EF5;
            font-family: Roboto;
            font-size: 14px;
            font-weight: 500;
            letter-spacing: 0.31px;
            line-height: 18px;
            text-align: center;
        }

        .ajouter-button {
            height: 37px;
            width: 194px;
            border-radius: 6px;
            background-color: #1A7EF5;

            color: #FFFFFF;
            font-family: Roboto;
            font-size: 14px;
            font-weight: bold;
            letter-spacing: 0.31px;
            line-height: 18px;
            text-align: center;
            border: none;
        }


        .payement-card:hover{
        background-color: #F5F5F5;
        cursor: pointer;
        }

        .ajout-carte-credit-header-client-bis {
            display: flex;
            flex-direction: column;
            /* margin-bottom: 20px; */
            height: 65px;
        }

        .ajout-carte-credit-header h4{
            height: 24px;
            width: 359px;
            color: #191970;
            font-family: Roboto;
            font-size: 21px;
            font-weight: 500;
            letter-spacing: 0;
            line-height: 24px;
            text-align: center;
        }

        .ajout-carte-credit-header h6 {
            height: 16px;
            width: 342px;
            color: #191970;
            font-family: Roboto;
            font-size: 14px;
            letter-spacing: -0.34px;
            line-height: 16px;
            text-align: center;

        }

        .modal-body-credit-card-popup .payement-element-container-bis .input-element-carte-credit {
            display: flex;
            flex-direction: column;
            margin-bottom: 15px;

        }

        .modal-body-credit-card-popup .payement-element-container-bis .input-element-carte-credit input {
            box-sizing: border-box;
            height: 41px;
            width: 402px;
            border: 1px solid #9B9B9B;
            border-radius: 6px;
            background-color: #F8F8F8;
            padding-left: 15px;

        }

        .payement-element-container-bis {
            margin-left: 15px;
            margin-right: 15px;
        }

        .carte-carte {
            display: flex;
            column-gap: 14px;
        }

        .numero-ccv {
            display: flex;
            flex-direction: column;

        }

        .numero-ccv input {
            box-sizing: border-box;
            height: 41px;
            width: 194px;
            border: 1px solid #9B9B9B;
            border-radius: 6px;
            background-color: #F8F8F8;
            padding-left: 15px;
        }

        .input-element-carte-credit label {
            color: #191970;
            font-family: Roboto;
            font-size: 14px;
            font-weight: 500;
            letter-spacing: -0.34px;
            line-height: 14px;
            margin-bottom: 5px;
        }

        .checkbox-carte-default-bis {
            position: relative;
            top: 10px;
            left: -26px;
        }

        .ajout-credit-div {
            color: #191970;
            font-family: Roboto;
            font-size: 20.5px;
            font-weight: 500;
            letter-spacing: 0;
            line-height: 21px;
            text-align: center;
        }

        .ckeckbox1-card {
            border-radius: 25px;
            /* background-color: #1A7EF5; */
            height: 20px;
            width: 20px;
            margin-right: 8px;
        }

        .ckeckbox1-card span {
            position: relative;
            top: -15px;
        }

        .checkbox-rounded {
            width: 20px;
            height: 20px;
            background-color: white;
            border-radius: 50%;
            vertical-align: middle;
            border: 1px solid #ddd;
            appearance: none;
            -webkit-appearance: none;
            outline: none;
            cursor: pointer;
        }

        .checkbox-round:checked {
                background-color: gray !important;
            }

            .container-bis {
                margin: 0 auto;
                }

.round {
  position: relative;
}

.round label {
  background-color: #fff;
  border: 1px solid #ccc;
  border-radius: 6px;
  cursor: pointer;
  height: 20px;
  left: 0;
  position: absolute;
  top: 0;
  width: 20px;
}

.round label:after {
  border: 2px solid #fff;
  border-top: none;
  border-right: none;
  content: "";
  height: 6px;
  left: 4px;
  opacity: 0;
  position: absolute;
  top: 4px;
  transform: rotate(-45deg);
  width: 12px;
}

.round input[type="checkbox"] {
  visibility: hidden;
}

.round input[type="checkbox"]:checked + label {
  background-color: #1A7EF5;
  border-color: #1A7EF5;
}

.round input[type="checkbox"]:checked + label:after {
  opacity: 1;
}

.span-oui, .span-non {
    position: absolute;
    margin-left: 14px;
    margin-top: 3px;
}

	</style>

    <div class="modal fade" id="CreditCardPopup" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" style="z-index:25000000">
        <div class="modal-dialog modal-dialog-credit-card-popup CreditCardPopup  " id="creditpopuElement" style="display: flex; align-items:center; justify-content:center">
            <div class="modal-content modal-content-credit-card-popup" style="height: 443px !important; ">

                <div class="modal-header ajout-carte-credit-header-client-bis">
                    <div class="ajout-credit-div" style="font-size:21px; width: auto; line-height: 21px; position: relative; top: 8px">Ajouter une carte de crédit <span id="visa-master-bis"></span></div>
                    <img src="/assets/images/icones-vendeurs2/CB.svg" alt="">
                </div>

            <div class="modal-body modal-body-credit-card-popup">

                <div class="payement-element-container-bis">

                    <div class="input-element-carte-credit">
                        <label for="numeroDeCarte">Numéro de la carte</label>
                        <input type="text" name="numeroCarte" onkeyup="getCardTypeInvite(this.value)" id="numeroCarte-inviter" placeholder="4598 **** **** ****">
                    </div>

                    <div class="input-element-carte-credit">
                        <label for="numeroDeCarte">Nom sur la carte </label>
                        <input type="text" name="numeroCarte" id="nomCarte-inviter"  placeholder="ex. John SMITH" onkeyup="letterOnly(this)">
                    </div>

                    <div class="carte-carte">

                        <div class="date-expiration numero-ccv">
                            <label for="dateExpiration" style="margin-bottom: 5px">Date d'expiration</label>
                            <input type="text" name="numero-ccv" id="date-ccs-inviter" placeholder="Date d'expiration">
                        </div>

                        <div class="numero-ccv">
                            <label for="numeroCcv" style="margin-bottom: 5px">Numero CCV</label>
                            <input type="text" name="numero-ccv" id="numero-ccs-inviter" placeholder="Votre numero ccv">
                        </div>
                    </div>

                    <div class="checkbox-carte-default-bis" style="margin-left: 0px; margin-top: 0px">
                        <small style="font-size: 13.5px; position:relative; top:-5px">Enregistrer pour mes prochains achats <a href="#">Plus d'informations</a></small>

                        <div class="container-bis" style="display: flex">

                            <div class="round">
                              <input type="checkbox" id="checkbox" class="checkbox-card" value="oui"/>
                              <label for="checkbox"></label><span class="span-oui">Oui</span>
                            </div>

                            <div class="round" style="position: relative; left:44px">
                                <input type="checkbox" id="checkbox2" class="checkbox-card" value="non"/>
                                <label for="checkbox2"></label><span class="span-non">Non</span>
                            </div>

                          </div>
                    </div>

                    </div>

                    <div class="checkbox-carte-defaults infos-invite-none" id="credit_card_mode_defaut" style="margin-top: 15px; line-height: 13px; position:absolute">
                        {{-- <input type="checkbox" id="utiliser-carte-defaut" value="oui"> --}}
                        <div class="round" >
                            <input type="checkbox" id="checkbox3" class="checkbox-cardC" value="default"/>
                            <label for="checkbox3"></label>
                        </div>
                        <small style="font-size: 13.5px; position: relative; top: -11px; left: 30px;">Utiliser comme mode de paiement par defaut</small>
                    </div>

                    <input type="hidden" id="type_client_card" value=""/>
                    <input type="hidden" id="id_client_addresse" value=""/>
                    <input type="hidden" id="postion_carte" value=""/>

                    <div class="footer-button-credit-card-bis" style="position: relative; top: 47px">
                        <button class="annul-button " onclick="fermermodal()">Annuler</button>
                        <button class="ajouter-button" onclick="ajoutCarteCredit()">Ajouter ma carte</button>
                    </div>

                </div>

            </div>

            </div>
        </div>
        </div>
        <script>
            function fermermodal() {
                $('#CreditCardPopup').modal('hide');
            }

            $(document).ready(function(){
                // $('#date-ccs-inviter').mask('00/00');
                // $('#numero-ccs-inviter').mask('000')

                $('.checkbox-card').click(function() {
                    $(this).prop('checked', true);
                    if ($(this).val() === 'oui') {
                        console.log('oui clicked')
                        $('#credit_card_mode_defaut').removeClass('infos-invite-none')
                    }else{
                        $('#credit_card_mode_defaut').addClass('infos-invite-none')
                    }
                    $.each($('.checkbox-card').not($(this)), function(key, value) {
                        $(value).prop('checked', false);
                    })
                })

            })

        </script>
