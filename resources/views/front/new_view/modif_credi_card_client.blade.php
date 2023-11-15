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

        #modifCreditCardClient {
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


<div class="modal fade" id="modifCreditCardClient" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" style="padding-left:250px">
    <div class="modal-dialog volet-droite-modal-dialog-add-select">
	    <div class="modal-content volet-droite-modal-content-add-select" >

          <section class="headerselect">
              <h4 class="textheader">Choisir une autre carte de crédit</h4>
          </section>

            <section style="padding:4px;">

                <div id="containerModifCreditCardSection">

                </div>

                <input type="hidden" value="" id="current_credit_carte" />
                <input type="hidden" value="" id="current_credit_carte-master" />
                <input type="hidden" value="" id="current_type_card" />

            </section>

            <div class="footer-button1">
                <button class="ajouteruneaddresse" id="ajoutCreditCardAchatClient" onclick="addVisaCardChaged()">Ajouter une carte</button>
                <button class="utiliseraddresse-client" id="modifier-credit-carte-bis" onclick="changeCarteAchat()">Utiliser cette carte</button>
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


</script>
