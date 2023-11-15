<style type="text/css">
    @import url('https://fonts.googleapis.com/css2?family=Gelasio:ital@1&family=Licorice&family=Noto+Sans&family=Roboto:wght@300;400&family=Tajawal:wght@300&display=swap');
    .modal-dialog {
            position: relative;
        }

        .volet-droite-modal-dialog-add-select, .volet-droite-modal-content-add-select {
            height: 491px !important;
            width: 432px !important;
            border-radius: 6px;
            background-color: #FFFFFF;
            box-shadow: 0 5px 15px 0 rgba(0,0,0,0.35);
        }
        .headerselect{
            height:40px;
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
        .ajouteruneaddresse-client{
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
            margin-left: 15px;

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

        #modifAdressFacturationClient {
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

        .modif-addr-center {
            top: 47% !important;
            transform: translateY(-50%) !important
        }

        @media screen and (max-width: 500px) {

            .volet-droite-modal-dialog-add-select, .volet-droite-modal-content-add-select {
                width: 320px !important;
                border-radius: 6px;
                background-color: #FFFFFF;
                box-shadow: 0 5px 15px 0 rgba(0,0,0,0.35);
            }

            .mesaddresses {
                width: 290px !important;
            }

            .textheader {
                font-size: 15px !important;
            }

            .labelcheck {
                font-size: 13px !important;
            }

            .client-address-line {
                width: 320px !important;
            }

            .utiliseraddresse-client {
                font-size: 12px !important;
            }

            .ajouteruneaddresse-client {
                font-size: 12px !important;
            }

            .modif-addr-center {
                position: relative;
                margin-left: auto;
                margin-right: auto;
                /* left: 10px; */
            }

            .modif_adress_livraison_content {
                width: 320px !important;
                height: 491px;
                background-color: #F5F5F5;
                border-radius: 6px;
            }

            #modifAdressFacturationClientClosed {
                margin-left: 304px !important;
                margin-top: -19px !important;
            }

        }
        
        .modif_adress_header {
            height: 40px;
            width: 100%;
            border-radius: 6px 6px 0px 0px;
            border-bottom: 1px solid #D8D8D8;
        }

        .modif_adress_livraison_content {
            width: 432px;
            height: 491px;
            background-color: #F5F5F5;
            border-radius: 6px;
        }

</style>

<div class="main_panier_v2 input-none-panier-v2" id="modifAdressFacturationClient">

    <div class="modif_adress_livraison_content">
        <button id="modifAdressFacturationClientClosed" type="button" class="close-btn-panier-bis" style="z-index: 15000; position:absolute; margin-left: 414px; margin-top: -19px;" >
            <img src="{{ asset('assets/images/close-btn.svg') }}" alt="">
        </button>
        <div class="modif_adress_header">
            <section class="headerselect">
                <h4 class="textheader">Selectionnez une adresse de facturation</h4>
            </section>
        </div>

        <div class="modif_adress_livraison_body">
            <section style="padding:4px;">

                <div id="containerModifAdressSection" style="height: 371px; overflow-y: scroll">

                </div>

                <input type="hidden" value="" id="current_addres" />

            </section>

            <div class="footer-button1" style="margin-top: 0px !important">
                <button class="ajouteruneaddresse-client" onclick="ajoutUserConnectedAddressLivraison()">Ajouter une adresse</button>
                <button class="utiliseraddresse-client" style="margin-left: 8px" id="ajout-adresse-fact-bis" onclick="changeAdresseClient()">Utiliser cette adresse</button>
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

        $('#modifAdressFacturationClientClosed').on('click', function() {
            $('#modifAdressFacturationClient').addClass('input-none-panier-v2')
            // $('#modifAdressFacturationClient').modal('hide')
        })
    })

    function changeAdresseClient() {

        let current_address = $('#current_addres').val();
        
        $.ajax({
        type: 'GET',
        url: '/get_sigle_addresse',
        data: {id: current_address},
        success: function(response) {

        $('#invite-nom-prenom-connected').text(response[0]['prenom_nom'])
        $('#invite-numero_tel-connected').text(response[0]['portable'])
        $('#invite-quartier-address-connected').text(response[0]['adresse'])
        $('#comp-addr-supp-connected').text(response[0]['complement'])
        $('#invite-pays-connected').text('Gabon')
        $('#inv-ville-connected').text(response[0]['ville'])
        $('#invit-code-postal-connected').text(response[0]['code_postale'])

        $('#invite-nom-prenom-connected-2').text(response[0]['prenom_nom'])
        $('#invite-numero_tel-connected-2').text(response[0]['portable'])
        $('#invite-quartier-address-connected-2').text(response[0]['adresse'])
        $('#comp-addr-supp-connected-2').text(response[0]['complement'])
        $('#invite-pays-connected-2').text('Gabon')
        $('#inv-ville-connected-2').text(response[0]['ville'])
        $('#invit-code-postal-connected-2').text(response[0]['code_postale'])

        $('.mobile-user-nom-prenom').text(response[0]['prenom_nom'])
        $('.mobile-user-adress').text(response[0]['adresse'])
        $('.mobile-user-ville').text(response[0]['ville'])
        $('.mobile-user-complement').text(response[0]['complement'])
        $('.mobile-user-phone').text(response[0]['portable'])

        $('#modifAdressFacturationClient').addClass('input-none-panier-v2')

        }
        })
    }

    function ajoutUserConnectedAddressLivraison() {

        initMapAchatProcess()
        $('#modifAdressFacturationClient').addClass('input-none-panier-v2')

        // $('#UserAjoutAdresseLivraison').modal({
        //     backdrop: 'static',
        //     keyboard: false
        // })

        $('#UserAjoutAdresseLivraison').removeClass('input-none-panier-v2')

        //  $('#UserAjoutAdresseLivraison').modal('show')
        
    }

</script>
