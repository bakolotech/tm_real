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

            .payement-element-container {
                display: flex;
                flex-direction: column;
                justify-content: center;
                align-items: center;
                position: relative;
                left: -15px;
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

            .footer-button-credit-card {
                position: relative;
                margin-left: auto;
                margin-right: auto;
                margin-top: 20px;
                display: flex;
                justify-content: center;
                align-items: center;
                position: relative;
                top: 25px;
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

            .ajout-carte-credit-header-client {
                display: flex;
                flex-direction: column;
                margin-bottom: 20px;
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

            .modal-body-credit-card-popup .payement-element-container .input-element-carte-credit {
                display: flex;
                flex-direction: column;
                margin-bottom: 15px;

            }

            .modal-body-credit-card-popup .payement-element-container .input-element-carte-credit input {
                box-sizing: border-box;
                height: 41px;
                width: 402px;
                border: 1px solid #9B9B9B;
                border-radius: 6px;
                background-color: #F8F8F8;
                padding-left: 15px;

            }

            .payement-element-container {
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

            .checkbox-carte-default {
                position: relative;
                top: 20px;
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


    .round2 {
    position: relative;
    }

    .round2 label {
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

    .round2 label:after {
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

    .round2 input[type="checkbox"] {
    visibility: hidden;
    }

    .round2 input[type="checkbox"]:checked + label {
    background-color: #1A7EF5;
    border-color: #1A7EF5;
    }

    .round2 input[type="checkbox"]:checked + label:after {
    opacity: 1;
    }

.span-oui, .span-non {
    position: absolute;
    margin-left: 14px;
    margin-top: 3px;
}

        </style>

        <div class="modal fade" id="modifCreditCard" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" style="z-index:25000000">
            <div class="modal-dialog modal-dialog-credit-card-popup" id="creditpopuElement" style="display: flex; align-items:center; justify-content:center; position: relative; top: 10%">
                <div class="modal-content modal-content-credit-card-popup" style="height: 443px !important; display: flex; align-items:center; justify-content:center">

                    <div class="modal-header ajout-carte-credit-header-client">
                        <div class="ajout-credit-div" style="font-size:21px; width: auto; line-height: 21px; position: relative; top: 8px">Ajouter une carte de crédit <span id="visa-master"></span></div>
                        <img src="/assets/images/icones-vendeurs2/CB.svg" alt="">
                    </div>

                <div class="modal-body modal-body-credit-card-popup">

                    <div class="payement-element-container">

                        <div class="input-element-carte-credit">
                            <label for="numeroDeCarte">Numéro de la carte</label>
                            <input type="text" name="numeroCarte" onkeyup="getCardTypeInvite(this.value)" id="numeroCarte-inviter-modif" placeholder="4598 **** **** ****">
                        </div>

                        <div class="input-element-carte-credit">
                            <label for="numeroDeCarte">Nom sur la carte </label>
                            <input type="text" name="numeroCarte" id="nomCarte-inviter-modif" onkeyup="letterOnly(this)"  placeholder="ex. John SMITH">
                        </div>

                        <div class="carte-carte">

                            <div class="date-expiration numero-ccv">
                                <label for="dateExpiration" style="margin-bottom: 5px">Date d'expiration</label>
                                <input type="text" name="numero-ccv" id="date-ccs-inviter-modif" placeholder="Date d'expiration">
                            </div>

                            <div class="numero-ccv">
                                <label for="numeroCcv" style="margin-bottom: 5px">Numero CCV</label>
                                <input type="text" name="numero-ccv" id="numero-ccs-inviter-modif" placeholder="Votre numero ccv">
                            </div>
                        </div>

                        <div class="checkbox-carte-default" style="margin-left: 0px; margin-top: 0px">
                            <small style="font-size: 13.5px; position:relative; top:-5px">Enregistrer pour mes prochains achats <a href="#">Plus d'informations</a></small>

                            <div class="container" style="display: flex">

                                <div class="round2">
                                  <input type="checkbox" id="checkbox-modif" class="checkbox-card-modif" value="Oui"/>
                                  <label for="checkbox-modif"></label><span class="span-oui">Oui</span>
                                </div>

                                <div class="round2" style="position: relative; left:44px">
                                    <input type="checkbox" id="checkbox-modif2" class="checkbox-card-modif" value="Non"/>
                                    <label for="checkbox-modif2"></label><span class="span-non">Non</span>
                                </div>

                              </div>
                        </div>

                        <div class="checkbox-carte-defaults infos-invite-none" id="credit_card_mode_defaut-modif-2" style="margin-left: 12px; margin-top: 35px; line-height: 13px; position:absolute; margin-top:288px">
                            <div class="round2" >
                                <input type="checkbox" id="utiliser-carte-defaut" class="checkbox-cardC" value="default"/>
                                <label for="utiliser-carte-defaut"></label>
                            </div>
                            <small style="font-size: 13.5px; position: relative; top: -11px; left: 30px;">Utiliser comme mode de paiement par defaut</small>
                        </div>

                        <input type="hidden" id="type_client_card" value=""/>
                        <input type="hidden" id="id_client_addresse" value=""/>
                        <input type="hidden" id="postion_carte" value=""/>
                        <input type="hidden" id="session_invite_state" value="false" />

                        <div class="footer-button-credit-card" style="position: relative; top: 45px; margin-top: 35px">
                            <button class="annul-button " onclick="fermermodal()">Annuler</button>
                            <button class="ajouter-button btn-off-card" id="modification-credit-card-1" onclick="updateCarteCreditData()">Modifier cette carte</button>
                        </div>

                    </div>

                </div>

                </div>
            </div>
            </div>
        <script>
            let valeur_confirmation = undefined;
            $(document).ready(function() {
                $('.checkbox-card-modif').click(function() {
                    $(this).prop('checked', true);
                    if ($(this).val() === 'Oui') {
                        $('#credit_card_mode_defaut-modif-2').removeClass('infos-invite-none')
                        valeur_confirmation = 'Oui'
                    }else if (this.value == 'Non') {
                        $('#credit_card_mode_defaut-modif-2').addClass('infos-invite-none')
                        valeur_confirmation = 'Non'
                    }
                    $.each($('.checkbox-card-modif').not($(this)), function(key, value) {
                        $(value).prop('checked', false);
                    })
                })

            // ------------------------- radio btn modif ---------------------
                // $('#date-ccs-inviter-modif').mask('00/00');
                // $('#numero-ccs-inviter-modif').mask('000')
                // $('#numeroCarte-inviter-modif').mask('0000 0000 0000 0000');

            })

            function fermermodal() {
                $('#CreditCardPopup').modal('hide');
                $('#modifCreditCard').modal('hide')
            }

            function updateCarteCreditData() {
                console.log('La modif est lancée ici...')
                console.log('La valeur de confirmation est:', valeur_confirmation)

                valeur_confirmation = $('.checkbox-card-modif:checkbox:checked').val();

                let state_session_invite = $('#session_invite_state').val();

                if (state_session_invite == 'true') {
                let current_type_card = $('#current_type_card').val()

                if (current_type_card == 'VISA') {
                    let valeur_par_defaut = 0;
                    let num_credit_card = $('#numeroCarte-inviter-modif').val()
                    var lastfour = num_credit_card.substr(num_credit_card.length - 4); // => "Tabs1"
                    let nom_proprio = $('#nomCarte-inviter-modif').val()
                    let date_expiration = $('#date-ccs-inviter-modif').val()
                    let code_securite = $('#numero-ccs-inviter-modif').val()

                    $('#credit_proprio').text(nom_proprio)
                    $('#credit_numero-1').text('**** ' + lastfour)
                    $('#credit_date_expire-1').text(date_expiration)

                    let data = {
                        numero_carte: num_credit_card,
                        nom_proprietaire: nom_proprio,
                        date_expiration: date_expiration,
                        code_securite: code_securite,
                        valeur_confirmation: valeur_confirmation,
                        carte_par_defaut: valeur_par_defaut,
                        nom_carte: current_type_card
                    }

                    $.ajax({
                        type: 'POST',
                        url: '/update_invite_credit_card_session',
                        data: data,
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        success: function(response) {
                            console.log(response)
                        }
                    })

                    $('#modifCreditCard').modal('hide')

                }else if (current_type_card == 'MasterCard') {
                    let valeur_par_defaut = 0;
                    let num_credit_card = $('#numeroCarte-inviter-modif').val()
                    var lastfour = num_credit_card.substr(num_credit_card.length - 4); // => "Tabs1"
                    let nom_proprio = $('#nomCarte-inviter-modif').val()
                    let date_expiration = $('#date-ccs-inviter-modif').val()
                    let code_securite = $('#numero-ccs-inviter-modif').val()

                    $('#credit_proprio-m').text(nom_proprio)
                    $('#credit_numero-1-m').text('**** ' + lastfour)
                    $('#credit_date_expire-1-m').text(date_expiration)

                    let data = {
                        numero_carte: num_credit_card,
                        nom_proprietaire: nom_proprio,
                        date_expiration: date_expiration,
                        code_securite: code_securite,
                        valeur_confirmation: valeur_confirmation,
                        carte_par_defaut: valeur_par_defaut,
                        nom_carte: current_type_card
                    }

                    $.ajax({
                        type: 'POST',
                        url: '/update_invite_credit_card_session',
                        data: data,
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        success: function(response) {
                            console.log(response)
                        }
                    })

                    $('#modifCreditCard').modal('hide')
                }

                }else {
                let valeur_par_defaut = 0;

                if ($('#utiliser-carte-defaut').is(':checked')) {
                    valeur_par_defaut = 1
                }

                if (valeur_confirmation != undefined) {

                console.log('La valeur de confirmation est: ', valeur_confirmation)

                let current_type_card = $('#current_type_card').val()
                let actual_card = document.getElementById('current_type_card').value
                console.log('La nouvelle valeur est:', actual_card)

                if (actual_card == 'VISA') {
                let num_credit_card = $('#numeroCarte-inviter-modif').val()
                var lastfour = num_credit_card.substr(num_credit_card.length - 4); // => "Tabs1"
                let nom_proprio = $('#nomCarte-inviter-modif').val()
                let date_expiration = $('#date-ccs-inviter-modif').val()
                let code_securite = $('#numero-ccs-inviter-modif').val()
                let confirmation_achat = valeur_confirmation;
                let type_card = 'Visa'

                let current_visa = $('#current_credit_carte').val();

                $('#credit_proprio').text(nom_proprio)
                $('#credit_numero-1').text('**** ' + lastfour)
                $('#credit_date_expire-1').text(date_expiration)

                let data = {
                    id: current_visa,
                    numero_carte: num_credit_card,
                    nom_proprietaire: nom_proprio,
                    date_expiration: date_expiration,
                    code_securite: code_securite,
                    valeur_confirmation: valeur_confirmation,
                    carte_par_defaut: valeur_par_defaut,
                    nom_carte: type_card
                }

                $.ajax({
                    type: 'POST',
                    url: '/change_credicard-achat',
                    data: data,
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    success: function(reponse) {
                        console.log('retour request:', reponse)
                    }
                })

                $('#modifCreditCard').modal('hide')

                }else if (current_type_card == 'MasterCard') {

                let num_credit_card = $('#numeroCarte-inviter-modif').val()
                var lastfour = num_credit_card.substr(num_credit_card.length - 4); // => "Tabs1"
                let nom_proprio = $('#nomCarte-inviter-modif').val()
                let date_expiration = $('#date-ccs-inviter-modif').val()
                let code_securite = $('#numero-ccs-inviter-modif').val()
                let confirmation_achat = valeur_confirmation;
                let type_card = $('#current_type_card').val()

                let current_visa = $('#current_credit_carte-master').val();

                $('#credit_proprio-m').text(nom_proprio)
                $('#credit_numero-1-m').text('**** ' + lastfour)
                $('#credit_date_expire-1-m').text(date_expiration)

                let data = {
                    id: current_visa,
                    numero_carte: num_credit_card,
                    nom_proprietaire: nom_proprio,
                    date_expiration: date_expiration,
                    code_securite: code_securite,
                    valeur_confirmation: valeur_confirmation,
                    carte_par_defaut: valeur_par_defaut,
                    nom_carte: type_card
                }

                $.ajax({
                    type: 'POST',
                    url: '/change_credicard-achat',
                    data: data,
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },

                    success: function(reponse) {
                        console.log('retour request:', reponse)
                    }

                })

                $('#modifCreditCard').modal('hide')

                }
            }else{
                console.log('Vous devez chequer la confirmation')
            }

        }
                        // console.log('save data')
    }
        </script>
