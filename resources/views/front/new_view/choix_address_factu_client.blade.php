<style type="text/css">
    @import url('https://fonts.googleapis.com/css2?family=Gelasio:ital@1&family=Licorice&family=Noto+Sans&family=Roboto:wght@300;400&family=Tajawal:wght@300&display=swap');
    .modal-dialog {
            position: relative;
        }


        .headerselect{
            height:60px;
            width:100%;
            border-bottom:1px solid #D8D8D8;

        }
        .textheader{
            color: #191970;
            font-family: Roboto;
            font-size: 21px;
            font-weight: 500;
            letter-spacing: 0;
            line-height: 24px;
            text-align: center;
            margin-top:15px;

        }
        .mesaddresses{
            box-sizing: border-box;
            height: 56px;
            width: 402px;
            border: 1px solid #9B9B9B;
            border-radius: 6px;
            background-color: #F5F5F5;
            margin-top:15px;
            padding-top: 17px;
        }
        .labelcheck{
            color: #4A4A4A;
            font-family: Roboto;
            font-size: 16px;
            letter-spacing: -0.39px;
            line-height: 18px;


        }
        .labeldiv{
            margin-top:-25px;
            margin-left:45px;
        }
        .micheck{
            margin-left:15px;
            margin-top:8.5px;
        }
        .ajouteruneaddresse{
            box-sizing: border-box;
            height: 37px;
            width: 190px;
            border: 1px solid #1A7EF5;
            border-radius: 6px;
            background-color: #FFFFFF;
            color: #1A7EF5;
            font-family: Roboto;
            font-size: 14px;
            letter-spacing: 0.31px;
            line-height: 18px;
            text-align: center;
            margin-left:15px;

        }
        .utiliseraddresse{
            height: 37px;
            width: 200px;
            border-radius: 6px;
            background-color: #1A7EF5;
            color: #FFFFFF;
            font-family: Roboto;
            font-size: 14px;
            font-weight: 500;
            letter-spacing: 0.31px;
            line-height: 18px;
            text-align: center;
            border: #1A7EF5;
            margin-left:12px;
        }

        .utiliseraddresse:hover{
            color: #FFFFFF;
            background-color: #146FDA;
        }

        .footer-button1{
            position: fixed;
            margin-left: auto;
            margin-right: auto;
            margin-top:442px;
        }

        #ChoisirAdressFacturationClient {
            z-index: 100000000000000 !important
        }

        .utiliseraddresse-client {
            height: 37px;
            width: 200px;
            border-radius: 6px;
            background-color: #1A7EF5;
            border: transparent;
            color: #FFFFFF;

        }

</style>


<div class="modal fade" id="ChoisirAdressFacturationClient" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" style="padding-left:250px">
    <div class="modal-dialog volet-droite-modal-dialog-add-select">
	    <div class="modal-content volet-droite-modal-content-add-select" >

          <section class="headerselect">
              <h4 class="textheader">Selectionnez une adresse de facturation</h4>
          </section>


            <section style="padding:4px;">

                <div id="containerChoixAdressSection">

                </div>

                <input type="hidden" value="" id="current_addres" />

            </section>

            <div class="footer-button1" style="display: flex">
                <div style="width: 217px"><button class="ajouteruneaddresse infos-invite-none " id="ajout-card-btn-element" >Ajouter une adresse</button></div>
               <div> <button class="utiliseraddresse-client" id="choix_comme_addr_factuartion" onclick="choisirAddrFacturationAchat()">Utiliser cette adresse</button></div>
            </div>

        </div>
    </div>
</div>

<script>
    jQuery(document).ready(function () {

    $(document).on('click', '#addFaddress', function (e) {
        e.preventDefault();
        var data={};
        console.log('hello');
        $('#modePayementAdressefacturation').modal('hide');
        $('#modePayementProfilLivraison').modal('show');
        })
    })




    function choisirAddrFacturationAchat() {

        var data={};
        var xxUrl='';
        const addUrl = '/add_credit_card';

        let type_card = $('#type_client_card').val()

        let carte_par_defaut = 0;


        var  adresseId =localStorage.getItem('priv') //Get the id of Address using localstorage
        var  CCNAME =localStorage.getItem('CCard_name'); //Get the card name from (add-mode-payement.blade)
        let address_id = $('#id_client_addresse').val();
        let id_adress_bis = $('input[name=UseraddresseFacturation]:checked').val()
        let prochain_achat = $('.checkbox-card:checkbox:checked').val()

        data = {
            'numero_carte':$('#numeroCarte-inviter').val(),
            'nom_carte': type_card,
            'nom_proprietaire':$('#nomCarte-inviter').val(),
            'date_expiration': $('#date-ccs-inviter').val(),
            'code_securite': $('#numero-ccs-inviter').val(),
            'adresse_id': id_adress_bis,
            'enregistrer_prochain_achat': prochain_achat,
        }

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

                if (response.status == 202) {

                if(type_card == 'MasterCard') {
                $('#csz_1').empty()

                let backscrenn = $('#card_filled-2').length

                if (backscrenn == 1) {
                    $('#payement-backdrop_2').removeClass('infos-invite-none')
                }

                let master_card_bg = '/assets/images/Carte_Paiement/Carte_MAsterCard.svg'
                let master_card_small_icon = '/../assets/images/icons/Mastercard.svg'

                    let num_credit_card1 = $('#numeroCarte-inviter').val()
                var lastfour1 = num_credit_card1.substr(num_credit_card1.length - 4); // => "Tabs1"
                let payement_mean_master = [];

                payement_mean_master += `<div class="card-element-paiement" id="card_filled-1" style="margin-left: 3.8px;padding-top: 10px; background-image: url(${master_card_bg})" >`

                payement_mean_master += `<div id="payement-backdrop_1" class="payement-element-alert infos-invite-none"> <button class="btn-choose"  onclick="toggleVisaCard(1)" >Payer avec</button></div>`


                payement_mean_master += `<div class="rectangle-card-1" ><span class="card-name">${type_card}</span></div><div class="card-icon" style="left: 178px; background-image: url(${master_card_small_icon}) !important; top:32.49px"></div><div class="checked-card"><img src="/assets/images/icons/Valide-small.svg" alt=""></div><div class="data-cardsss-bis" style="display: flex; flex-direction:column;">`

                payement_mean_master += `<label class="user-card-name-bis" id="credit_proprio-m" style="width: 90%">${$('#nomCarte-inviter').val()}</label><label class="user-card-acount-number-bis" id="credit_numero-1-m">**** ${lastfour1}</label><label class="user-card-date" id="credit_date_expire-1-m">${$('#date-ccs-inviter').val()}</label></div><div class="autre-button-bis" ><button class="btn-card-option" onclick=modifCreditCard("MasterCard")>Modifier</button></div></div>`

                $('#csz_1').append(payement_mean_master)

                }else if(type_card == 'VISA') {
                $('#csz_2').empty()

                let backscrenn2 = $('#card_filled-1').length
                if (backscrenn2 == 1) {
                    $('#payement-backdrop_1').removeClass('infos-invite-none')
                }

                // $('#current_credit_carte').val(response.creditCard.id)
                let num_credit_card1 = $('#numeroCarte-inviter').val()
                var lastfour1 = num_credit_card1.substr(num_credit_card1.length - 4); // => "Tabs1"
                let payement_mean = []
                payement_mean += `<div class="card-element-paiement" id="card_filled-2" style="margin-left: 3.8px; padding-top: 10px;" >`

                payement_mean += `<div id="payement-backdrop_2" class="payement-element-alert infos-invite-none"> <button class="btn-choose"  onclick="toggleVisaCard(2)" >Payer avec</button></div>`

                payement_mean += `<div class="rectangle-card-1"><span class="card-name">${type_card}</span></div><div class="card-icon" style="left:405px !important; top:32.49px !important"></div><div class="checked-card"><img src="/assets/images/icons/Valide-small.svg" alt=""></div>`

                payement_mean += `<div class="data-cardsss-bis" style="display: flex; flex-direction:column"><label class="user-card-name-bis" id="credit_proprio">${$('#nomCarte-inviter').val()}</label><label class="user-card-acount-number-bis" id="credit_numero-1">**** ${lastfour1}</label>`

                payement_mean += `<label class="user-card-date" id="credit_date_expire-1">${$('#date-ccs-inviter').val()}</label></div><div class="autre-button-bis"><button class="btn-card-option" onclick=modifCreditCard("Visa")>Modifier</button></div></div>`

                $('#csz_2').append(payement_mean)
            }

            inpayPopup()
            $('#CreditCardPopup').modal('hide');
            $('#ChoisirAdressFacturationClient').modal('hide')

                }else if(response.status == 200) {

                let backscrenn = $('#card_filled-2').length

                console.log('L EXISTENCE DE BACKSCREEN ESTQ:', backscrenn)
                var carduserId= response.creditCard.user_id;
                xxUrl = '/get_credit_card/'+carduserId;

                let num_credit_card = response.creditCard.numero_carte;
                var lastfour = num_credit_card.substr(num_credit_card.length - 4); // => "Tabs1"

                if(type_card == 'MasterCard') {

                if (backscrenn == 1) {
                    $('#payement-backdrop_2').removeClass('infos-invite-none')
                }

                $('#csz_1').empty()
                let master_card_bg = '/assets/images/Carte_Paiement/Carte_MAsterCard.svg'
                let master_card_small_icon = '/../assets/images/icons/Mastercard.svg'
                $('#current_credit_carte-master').val(response.creditCard.id)

                let payement_mean_master = []
                payement_mean_master += `<div class="card-element-paiement" id="card_filled-1" style="margin-left: 3.8px;padding-top: 10px; background-image: url(${master_card_bg})" >`

                payement_mean_master += `<div id="payement-backdrop_1" class="payement-element-alert infos-invite-none"> <button class="btn-choose"  onclick="toggleVisaCard(1)" >Payer avec</button></div>`

                payement_mean_master += `<div class="rectangle-card-1" ><span class="card-name">${response.creditCard.nom_carte}</span></div><div class="card-icon" style="left: 178px; background-image: url(${master_card_small_icon}) !important; top:32.49px"></div><div class="checked-card"><img src="/assets/images/icons/Valide-small.svg" alt=""></div>`

                payement_mean_master += `<div class="data-cardsss-bis" style="display: flex; flex-direction:column;"><label class="user-card-name-bis" id="credit_proprio-m" style="width: 90%">${response.creditCard.nom_proprietaire}</label><label class="user-card-acount-number-bis" id="credit_numero-1-m">**** ${lastfour}</label><label class="user-card-date" id="credit_date_expire-1-m">${response.creditCard.date_expiration}</label></div><div class="autre-button-bis" ><button class="btn-card-option" onclick=changerCrediCard("MasterCard")>Changer</button><button class="btn-card-option" onclick=modifCreditCard("MasterCard")>Modifier</button></div></div>`

                $('#csz_1').append(payement_mean_master)

                }else if(type_card == 'VISA') {
                let backscrenn2 = $('#card_filled-1').length
                let payement_mean = []

                if (backscrenn2 == 1) {
                    $('#payement-backdrop_1').removeClass('infos-invite-none')
                }

                $('#csz_2').empty()
                $('#current_credit_carte').val(response.creditCard.id)
                payement_mean += `
                <div class="card-element-paiement" style="margin-left: 3.8px; padding-top: 10px;" id="card_filled-2">`

                payement_mean += `<div id="payement-backdrop_2" class="payement-element-alert infos-invite-none"> <button class="btn-choose"  onclick="toggleVisaCard(2)" >Payer avec</button></div>`

                payement_mean += `<div class="rectangle-card-1"><span class="card-name">${response.creditCard.nom_carte}</span></div><div class="card-icon" style="left:405px !important; top:32.49px !important"></div><div class="checked-card"><img src="/assets/images/icons/Valide-small.svg" alt=""></div>`

                payement_mean += `<div class="data-cardsss-bis" style="display: flex; flex-direction:column"><label class="user-card-name-bis" id="credit_proprio">${response.creditCard.nom_proprietaire}</label><label class="user-card-acount-number-bis" id="credit_numero-1">**** ${lastfour}</label>`

                payement_mean += `<label class="user-card-date" id="credit_date_expire-1">${response.creditCard.date_expiration}</label></div><div class="autre-button-bis"><button class="btn-card-option" onclick=changerCrediCard("VISA")>Changer</button><button class="btn-card-option" onclick=modifCreditCard("Visa")>Modifier</button></div></div>`

                $('#csz_2').append(payement_mean)

                }
                inpayPopup()
                $('#CreditCardPopup').modal('hide');
                $('#ChoisirAdressFacturationClient').modal('hide')
                }

            },
        });

        }

</script>
