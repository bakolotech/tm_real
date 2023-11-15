
	<style type="text/css">
		@import url('https://fonts.googleapis.com/css2?family=Gelasio:ital@1&family=Licorice&family=Noto+Sans&family=Roboto:wght@300;400&family=Tajawal:wght@300&display=swap');

        .modal-dialog {
            position: relative;
        }

        .modal-content {
            height: 491px;
            width: 432px;
            border-radius: 6px;
            background-color: #FFFFFF;
            box-shadow: 0 5px 15px 0 rgba(0,0,0,0.35);
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
        }

        .payement-element-container {
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: flex-start;
            /* margin-top: -20px; */
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

        .footer-button {
            position: relative;
            margin-left: auto;
            margin-right: auto;
            margin-top: 61px;
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

        .volet-droite-modal-dialog-add-pay, .volet-droite-modal-content-add-pay {
            position: relative;
            top: 50px;
        }

        .ajout-carte-credit-header {
            display: flex;
            flex-direction: column;
            margin-bottom: 19px;
        }

        .ajout-carte-credit-header h4{
            /* height: 24px;
            width: 359px; */
            color: #191970;
            font-family: Roboto;
            font-size: 20.5px;
            font-weight: 500;
            letter-spacing: 0;
            line-height: 23px;
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

        .modal-body-ajout-carte-credit .payement-element-container .input-element-carte-credit {
            display: flex;
            flex-direction: column;
            margin-bottom: 19px;

        }

        .modal-body-ajout-carte-credit .payement-element-container .input-element-carte-credit input {
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
            color: #191970;
            font-family: Roboto;
            font-size: 14px;
            font-weight: bold;
            letter-spacing: -0.34px;
            line-height: 16px;
        }

        .numero-ccv {
            display: flex;
            flex-direction: column;
            color: #191970;
            font-family: Roboto;
            font-size: 14px;
            font-weight: bold;
            letter-spacing: -0.34px;
            line-height: 16px;

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
            height: 16px;
            /* width: 114px; */
            color: #191970;
            font-family: Roboto;
            font-size: 14px;
            font-weight: bold;
            letter-spacing: -0.34px;
            line-height: 16px;
            margin-bottom: 7px;
        }

        .checkbox-carte-default {
            position: relative;
            color: #000000;
            font-family: Roboto;
            font-size: 13px;
            letter-spacing: -0.31px;
            line-height: 18px;
            margin-top:12px;
            margin-left:25px;


        }

        .volet-droite-modal-dialog-add-pay-credit, .volet-droite-modal-content-add-pay-credit {
            position: relative;
            top: 50px;
        }


        .micheck2{
            margin-left: 15px;
            margin-top: 1.5px
        }
	</style>


	<!-- Modal -->
	<div class="modal fade" id="modePayementProfilCarteCredit" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true"style="padding-left:250px">
    <div class="modal-dialog volet-droite-modal-dialog-add-pay-credit">
	    <div class="modal-content volet-droite-modal-content-add-pay-credit" >

            <div class="modal-header ajout-carte-credit-header">
                <h4>Ajouter une carte de crédit ou de débit</h4>
                <h6>TOULÈ Market accepte la plupart des cartes de paiement.</h6>
                <img src="/assets/images2/CB.svg" alt="">
            </div>

          <div class="modal-body modal-body-ajout-carte-credit">

            <div class="payement-element-container">

                <div class="input-element-carte-credit">
                    <label for="numeroDeCarte">Numéro de la carte</label>
                    <input type="text" name="numeroCart" id="numeroDeCarte" placeholder="4598 **** **** ****">
                </div>

                <div class="input-element-carte-credit">
                    <label for="nomCarte">Nom sur la carte </label>
                    <input type="text" name="nomCart"   onkeyup=letterOnly(this) id="nomCarte" placeholder="ex. John SMITH">
                </div>



                <div class="carte-carte">

                    <div class="date-expiration numero-ccv">
                        <label for="dateExpiration">Date d'expiration</label>
                        <input maxlength='5' id="dateExpiration" placeholder="MM/YY" type="text" onkeyup="formatString(event);" style="margin-top: -5px;">
                    </div>



                    <div class="numero-ccv">
                        <label for="numeroCcv">Numero CCV</label>
                        <input type="text" name="numero-ccv" id="numeroCcv" placeholder="Votre numero ccv" style="margin-top: -5px;">
                    </div>
                </div>

                <div class="checkbox-carte-default" style="margin-top:-5px;">
                    <input type="checkbox" id="pDefault" class="form-check-input" style="margin-top:1px;">
                   &nbsp Définir en tant que mode de paiement par défaut
                </div>
                <div class="checkbox-carte-default">
                    <input type="checkbox" id="saveCard" class="form-check-input" style="margin-top:1px;">
                   &nbsp  Sauvegarder ma carte pour mes prochains paiements
                </div>


                <div class="footer-button">
                    <button class="annul-button" aria-label="Close" id="annulerBtn">Annuler</button>
                    <button class="ajouter-button" id="ajout-adresse-livraison">SUIVANT</button>
                </div>

            </div>

        </div>

	    </div>
	  </div>
	</div>


<script>


        $('#numeroDeCarte').mask('0000 0000 0000 0000');
        $('#numeroCcv').mask('000');



            function letterOnly(input) {
                var regex = /[^a-zA-ZÀ-ÿ-._]/gi;
                input.value = input.value.replace(regex, "");

                if (input.value.length < 3 && input.value.length >0) {
                    $("#nom_proprietaire").addClass('input-error-warning');
                }else {
                    $("#nom_proprietaire").removeClass('input-error-warning');

                }
            }



            function formatString(e) {
                    var inputChar = String.fromCharCode(event.keyCode);
                    var code = event.keyCode;
                    var allowedKeys = [8];
                    if (allowedKeys.indexOf(code) !== -1) {
                        return;
                    }

                    event.target.value = event.target.value.replace(
                        /^([1-9]\/|[2-9])$/g, '0$1/' // 3 > 03/
                    ).replace(
                        /^(0[1-9]|1[0-2])$/g, '$1/' // 11 > 11/
                    ).replace(
                        /^([0-1])([3-9])$/g, '0$1/$2' // 13 > 01/3
                    ).replace(
                        /^(0?[1-9]|1[0-2])([0-9]{2})$/g, '$1/$2' // 141 > 01/41
                    ).replace(
                        /^([0]+)\/|[0]+$/g, '0' // 0/ > 0 and 00 > 0
                    ).replace(
                        /[^\d\/]|^[\/]*$/g, '' // To allow only digits and `/`
                    ).replace(
                        /\/\//g, '/' // Prevent entering more than 1 `/`
                    );
            }



            function getRadio(id){
                localStorage.setItem('priv', id); // set localStorge key value to 'priv'
            }



jQuery(document).ready(function () {


            $(document).on('click', '#annulerBtn', function (e) {
                e.preventDefault();
                $('#modePayementProfilCarteCredit').modal('hide')
            })


            $(document).on('click', '#ajout-adresse-livraison', function (e) {
                    e.preventDefault();
                    var Ok =true;
                    console.log("add-mode-payement-carte-credit.blade.php");
                    $('#modePayementAdressefacturation').css('padding-left','250px');

                    $('#numeroDeCarte').removeClass('input-error-warning');
                    $('#nomCarte').removeClass('input-error-warning');
                    $('#numeroCcv').removeClass('input-error-warning');
                    $('#dateExpiration').removeClass('input-error-warning');






                    console.log($('#numeroDeCarte').val()); // you have to remove te white spaces before storing in the database



                if(($('#numeroDeCarte').val() === "") || ($('#numeroDeCarte').val().length < 16)){
                     $('#numeroDeCarte').addClass('input-error-warning');
                     Ok = false
                     return;
                }


                if(($('#nomCarte').val() === "") || ($('#nomCarte').val().length < 3)){
                     $('#nomCarte').addClass('input-error-warning');
                     Ok = false
                     return;
                }


                if(($('#numeroCcv').val() === "") || ($('#numeroCcv').val().length < 3)){
                     $('#numeroCcv').addClass('input-error-warning');
                     Ok = false
                     return;
                }

                if(($('#dateExpiration').val() === "")){
                     $('#dateExpiration').addClass('input-error-warning');
                     Ok = false
                     return;
                }


                if(Ok === true){

                    var LurlM = '/carnet-getaddress';

                    $.ajax({
                        type: "GET",
                        url: LurlM,
                        success: function (response) {
                            var carnets = response.carnet[0];


                            $('#container').empty();

                                if(carnets.length == 0){
                                    $('#container').append(`<div id="liste-carnet-adresse-vide" class="carnet-adresse">
                                        <div class="vous-navez-pas-dad">
                                            <span>Vous n'avez pas d'adresses enregistrées</span>
                                        </div>
                                    </div>`)
                                }else {
                                    $.each(carnets, function(key, carnet){
                                        $('#container').append(`
                                        <section style="padding:12px;">
                                            <article class="mesaddresses" style="margin-top:0px;">
                                                <input type="radio" value="${carnet.id}" onclick="getRadio(${carnet.id})" name="Useraddresse" class="form-check-input micheck2" id="check1">
                                                <aside class="labeldiv">
                                                    <label class="labelcheck" for="check1"><b>${carnet.prenom_nom},</b>  ${carnet.portable}, ${carnet.adresse}, ${carnet.nom_entreprise}</label>
                                                </aside>
                                            </article>
                                        </section>`);
                                    });



                                    if($("#check1").is(":checked")){
                                        var add = $("input[name='Useraddresse']:checked").val()
                                        localStorage.setItem('priv', add); // set localStorge key value to 'priv'

                                    }


                                } // fin else
                        },
                    });

                    $('#modePayementProfilCarteCredit').modal('hide')
                    $('#modePayementAdressefacturation').modal('show')
                }

        }) //ajout-adresse-livraison


//----- -------------------------DIVIDER-----------------------------------------------------

            $(document).on('click', '#ajout-adresse-fact', function (e) {
                e.preventDefault();
                var data={};
                var xxUrl='';
                const addUrl = '/add_credit_card';

                console.log("add-mode-payement-carte-credit.blade.php");

                var  adresseId =localStorage.getItem('priv') //Get the id of Address using localstorage
                var  CCNAME =localStorage.getItem('CCard_name'); //Get the card name from (add-mode-payement.blade)


                data = {
                    'numero_carte':$('#numeroDeCarte').val(),
                    'nom_carte':CCNAME,
                    'nom_proprietaire':$('#nomCarte').val(),
                    'date_expiration': $('#dateExpiration').val(),
                    'code_securite': $('#numeroCcv').val(),
                    'adresse_id': adresseId,
                }

                console.log(data);



                        $.ajaxSetup({
                        headers: {
                                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                            }
                        });

                        $.ajax({
                            type: "POST",
                            url: addUrl,
                            data: data,
                            dataType: "json",
                            success: function (response) {
                                var carduserId= response.creditCard.user_id;
                                xxUrl = '/get_credit_card/'+carduserId;

                                $('#modePayementAdressefacturation').modal('hide');

                                $('#numeroDeCarte').val('');
                                $('#nomCarte').val('');
                                $('#dateExpiration').val('');
                                $('#numeroCcv').val('');

                                localStorage.removeItem('priv'); //remove local storage immediately
                                localStorage.removeItem('CCard_name'); //remove local storage immediately


                            },
                        });




  //---------------------------------------------------------------------------------------------------------------------------------
                        setTimeout(function(){

                              $.ajaxSetup({
                                headers: {
                                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                                    }
                                });

                                $.ajax({
                                    type: "GET",
                                    url: xxUrl ,
                                    success: function (response) {
                                        var cards = response.creditcards;
                                        $('#creditcardContainer').empty();
                                        if(cards.length == 0){

                                            $('#creditcardContainer').append(` <div class="vous-navez-pas-dad">
                                                <span>Vous n'avez pas enregistré d'options de paiement</span>
                                            </div>`)

                                        } else {

                                            $.each(cards, function(key, card){

                                                if(card.nom_carte === 'VISA CARD'){
                                                            $('#creditcardContainer').append(`<div class="card-container-carnet" style="display: flex; justify-content: center; align-items:center;" id="credit_${card.id}">
                                                                <div class="main-card-paiement" >
                                                                <div class="card-element-paiement" style="margin-left: 3.8px; margin-top:5px;" >
                                                                    <div class="rectangle-card">
                                                                        <span class="card-name">
                                                                        ${card.nom_carte}
                                                                        </span>
                                                                    </div>
                                                                    <div class="card-icon">
                                                                    </div>
                                                                    <div class="card-icon-checked">
                                                                        <i class="fas fa-check" style="color: #fff"></i>
                                                                    </div>
                                                                <div class="data-cardsss" style="display: flex; flex-direction:column">
                                                                        <label class="user-card-name">
                                                                        ${card.nom_proprietaire}
                                                                        </label>
                                                                        <label class="user-card-acount-number">
                                                                        ${card.numero_carte}
                                                                        </label>
                                                                        <label class="user-card-date">
                                                                        ${card.date_expiration}
                                                                        </label>
                                                                </div>
                                                                <div class="autre-button" style="position: absolute; float: right; right: 15px; top: 15px; display: flex; flex-direction: column; justify-content: center; align-items: center;">
                                                                    <div class="pended-button1" style="margin-bottom: 6px">
                                                                    <button class="btn-pending1" data-target="#deleteCarnetCredit" id="kinkinaoff" value="${card.id}" style="border: none"><img src="{{ asset('assets/images/icons/edit_blue.svg') }}" alt="" /></button>
                                                                    </div>
                                                                    <div class="pended-button2">
                                                                    <button class="btn-pending1" data-target="#modifyPayementProfilCarteCredit" id="modifKredo" value="${card.id}"  style="border: none"><img src="{{ asset('assets/images/icons/close_blue.svg') }}" alt="" /></button>
                                                                    </div>
                                                                </div>
                                                                </div>
                                                                <div class="button-section-paiement" style="margin-top: 5px">
                                                                    <div class="row-element-btn-1">
                                                                        <button class="btn-phone"><i class="fas fa-phone" style="color: rgb(252, 106, 106);"></i></button>
                                                                        <span class="phone-paiement" style="position: relative; top: 7px;">${card.portable}</span>
                                                                    </div>
                                                                    <div class="row-element-btn-1">
                                                                        <button class="btn-phone">
                                                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-geo-alt-fill" viewBox="0 0 16 16">
                                                                                <path d="M8 16s6-5.686 6-10A6 6 0 0 0 2 6c0 4.314 6 10 6 10zm0-7a3 3 0 1 1 0-6 3 3 0 0 1 0 6z"/>
                                                                            </svg>
                                                                        </button>
                                                                        <span class="location-paiement" style="position: relative"> ${card.adresse}</span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="carnet-middle" style="margin-right: 12.5px"></div>
                                                        </div>`);
                                                        }else{

                                                            $('#creditcardContainer').append(`<div class="card-container-carnet" style="display: flex; justify-content: center; align-items:center;" id="credit_${card.id}">
                                                            <div class="main-card-paiement" >
                                                                <div class="card-element-paiement-moov-money" style="margin-left: 3.8px; margin-top:5px;" >

                                                            <div class="rectangle-card">
                                                                <span class="card-name">
                                                                ${card.nom_carte}
                                                                </span>
                                                            </div>
                                                            <div class="card-icon-moov-money">

                                                            </div>

                                                            <div class="card-icon-checked">
                                                                <i class="fas fa-check" style="color: #fff"></i>
                                                            </div>

                                                        <div class="data-cardsss" style="display: flex; flex-direction:column">
                                                                <label class="user-card-name">
                                                                ${card.nom_proprietaire}
                                                                </label>
                                                                <label class="user-card-acount-number">
                                                                ${card.numero_carte}
                                                                </label>
                                                                <label class="user-card-date">
                                                                ${card.date_expiration}
                                                                </label>
                                                        </div>

                                                        <div class="autre-button" style="position: absolute; float: right; right: 15px; top: 15px; display: flex; flex-direction: column; justify-content: center; align-items: center;">
                                                        <div class="pended-button1" style="margin-bottom: 6px">
                                                        <button class="btn-pending1" data-target="#deleteCarnetCredit" value="${card.id}" id="kinkinaoff" style="border: none"><img src="{{ asset('assets/images/icons/edit_blue.svg') }}" alt="" /></button>
                                                            </div>
                                                            <div class="pended-button2">
                                                            <button class="btn-pending1" data-target="#modifyPayementProfilCarteCredit" id="modifKredo" value="${card.id}"  style="border: none"><img src="{{ asset('assets/images/icons/close_blue.svg') }}" alt="" /></button>
                                                            </div>
                                                        </div>

                                                        </div>

                                                        <div class="button-section-paiement" style="margin-top: 5px">

                                                            <div class="row-element-btn-1">
                                                                <button class="btn-phone"><i class="fas fa-phone" style="color: rgb(252, 106, 106);"></i></button>
                                                                <span class="phone-paiement" style="position: relative; top: 7px;">${card.portable}</span>
                                                            </div>

                                                            <div class="row-element-btn-1">
                                                                <button class="btn-phone">
                                                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-geo-alt-fill" viewBox="0 0 16 16">
                                                                        <path d="M8 16s6-5.686 6-10A6 6 0 0 0 2 6c0 4.314 6 10 6 10zm0-7a3 3 0 1 1 0-6 3 3 0 0 1 0 6z"/>
                                                                    </svg>
                                                                </button>
                                                                <span class="location-paiement" style="position: relative">${card.adresse}</span>
                                                            </div>

                                                        </div>

                                                            </div>
                                                            <div class="carnet-middle" style="margin-right: 12.5px">
                                                            </div>
                                                        </div>`)

                                                        }

                                                });

                                        }// fin else
                                    }, // fin success AJAX
                                });

                        }, 2000)

                }) // fin ajout-adresse-fact


            })




</script>
