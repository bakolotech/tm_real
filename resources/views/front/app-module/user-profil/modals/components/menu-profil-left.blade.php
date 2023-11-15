<?php
    if (Auth::user()){
        $carnets= \App\Models\CarnetAdresse::getCarnetByUser();
    }
?>

<style>
    .div-principal{
        box-sizing: border-box;
        margin-left: 5px;
        border: 1px solid rgb(216, 216, 216);
        border-radius: 6px;
        position: relative;
        background-color: rgb(255, 255, 255);
        height: 529px;

        margin-top: 5px;
        width: 100%
    }

    .myCard{
        width: 280px;
        margin: auto;
        margin-top: 5px;
        border-radius: 7px;
    }

    .MycardHeader{

        background-color: #9B9B9B;
        padding: 0.25rem 1rem;
        height:30px;
        color: #FFFFFF;
        font-family: Roboto;
        font-size: 14px;
        font-weight: 500;
        letter-spacing: 0;
        line-height: 16px;
    }

    .button-card-entete{
        box-sizing: border-box;
        height: 30px;
        width: 280px;
        border: 1px double #9B9B9B;
        border-radius: 6px 6px 0 0;
        background-color: #9B9B9B;
        text-align: -webkit-match-parent;
        margin-top: 1px;
    }

    .button-card1{
        box-sizing: border-box;
        height: 29px;
        width: 280px;
        border: 1px double #9B9B9B;
        border-bottom: 1px #9B9B9B;
        background-color: #FFFFFF;
        text-align: -webkit-match-parent;
        color: #4A4A4A;
    }

    .button-card1:hover{
        box-sizing: border-box;
        height: 29px;
        width: 280px;
        border: 1px double #D0021B;
        background-color: #F5F5F5;
        color: #191970 !important;
    }

    .button-card2{
        box-sizing: border-box;
        height: 29px;
        width: 280px;
        border: 1px double #9B9B9B;
        border-bottom: 1px #9B9B9B;
        background-color: #FFFFFF;
        text-align: -webkit-match-parent;
        color: #4A4A4A;
    }

    .button-card2:hover{
        box-sizing: border-box;
        height: 29px;
        width: 280px;
        border: 1px double #D0021B;
        background-color: #F5F5F5;
        color: #191970 !important;
    }

    .button-card3{
        box-sizing: border-box;
        height: 29px;
        width: 280px;
        border: 1px double #9B9B9B;
        border-radius: 0 0 6px 6px;
        background-color: #FFFFFF;
        text-align: -webkit-match-parent;
        color: #4A4A4A;
    }

    .button-card3:hover{
        box-sizing: border-box;
        height:29px;
        width: 280px;
        border: 1px double #D0021B;
        border-radius: 0 0 6px 6px;
        background-color: #F5F5F5;
        color: #191970 !important;

    }

    .bordure-left:hover{
        border-left: 5px solid #D0021B;
    }


    .general {
        height: 16px;
        width: 49px;
        color: #FFFFFF;
        font-family: Roboto;
        font-size: 14px;
        font-weight: 500;
        letter-spacing: 0;
        line-height: 16px;
    }

    .mes-adresses {
        height: 16px;
        width: 88px;

        font-family: Roboto;
        font-size: 14px;
        font-weight: 500;
        letter-spacing: 0;
        line-height: 16px;
    }

    .mes-informations-per {
        height: 16px;
        width: 195px;

        font-family: Roboto;
        font-size: 14px;
        font-weight: 500;
        letter-spacing: 0;
        line-height: 16px;
    }


    .icone-menu-user-left{
        height: 19.53px;
        width: 16.5px;
    }
    .mes-modes-de-paiemen {
        height: 16px;
        width: 162px;

        font-family: Roboto;
        font-size: 14px;
        font-weight: 500;
        letter-spacing: 0;
        line-height: 16px;
    }

    .active-menu-left {
        cursor: pointer;
        box-sizing: border-box;
        height: 30px;
        width: 280px;
        border: 1px solid #D0021B;
        border-left: 5px solid #D0021B;
        background-color: #F5F5F5;
        color: #191970;

        font-family: Roboto;
        font-size: 14px;
        font-weight: 500;
        letter-spacing: 0;
        line-height: 16px;
    }


     .img-bottom-address1 {
        height: 210.95px;
        width: 857px;
        position: absolute;
        bottom: 6px;
        background-image: url('/uploads/avatars/back_picture_addresse.webp');
        z-index: 1;
        background-repeat: no-repeat;
        background-size: contain;
        }

//----------------------------------$_COOKIE

.entete-modal-delete{
        box-sizing: border-box;
        height: 1px;
        width: 431px;
        border: 1px solid #D8D8D8;
    }

    .text-confirmer-la-suppres {
        height: 24px;
        width: 237px;
        color: #191970;
        font-family: Roboto;
        font-size: 21px;
        font-weight: 500;
        letter-spacing: 0;
        line-height: 23px;
        text-align: center;
        margin-bottom: 14.5px;
        margin-left: 97.5px;
    }

    .etes-vous-sur-de-vou {
        height: 32px;
        width: 289px;
        color: #191970;
        font-family: Roboto;
        font-size: 14px;
        font-weight: 300;
        letter-spacing: -0.34px;
        line-height: 16px;
        text-align: center;
        margin-top: 14.5px;
        margin-left: 71.5px;
    }

    .non-confirm-delete-carnet {
        box-sizing: border-box;
        height: 37px;
        width: 194px;
        border: 1px solid #1A7EF5;
        border-radius: 6px;
        background-color: #FFFFFF;
        margin-left: 15px;
        margin-top: 40px;

    }
    .oui-confirm-delete-carnet{
        height: 37px;
        width: 194px;
        box-sizing: border-box;
        border: 1px solid #1A7EF5;
        border-radius: 6px;
        background-color: #1A7EF5;
        margin-left: 14px;
        margin-top: 40px;
    }
    .button-non{
        width: 100%;
        height: 100%;
        border: none;
        border-radius: 6px;
        background-color: #ffffff;
        color: #1A7EF5;
        font-family: Roboto;
        font-size: 16px;
        font-weight: 500;
        letter-spacing: 0.35px;
        line-height: 18px;
        text-align: center;
    }
    .button-oui{
        width: 100%;
        height: 100%;
        border: none;
        border-radius: 6px;
        background-color: #1A7EF5;
        color: #FFFFFF;
        font-family: Roboto;
        font-size: 16px;
        font-weight: 500;
        letter-spacing: 0.35px;
        line-height: 18px;
        text-align: center;
    }

    /* --------------------------------------------------------------------------- */


    .carnet-1 {
            height: 134px;
             width: 263px;
             background-color: #1A7EF5;
        }


        .btn-1 button {
            border-top: 1px solid #000;
            border-radius: 0px !important;
            width: 31px;
        }

        .btn-2 button {
            border-top: 1px solid #000;
            border-radius: 6px 6px 0px 0px !important;
            width: 31px;
        }

        .btn-3 button {
            border-top: 1px solid #000;
            border-radius: 0px 0px 6px 6px !important;
            width: 31px;
        }

        .btn-outline-secondary {
            border-radius: 6px;
            background-color: red;
        }

        .btn-1 button, .btn-2 button, .btn-3 button{
            box-sizing: border-box;
            height: 27.25px;
            width: 31px;
            background-color: #FFFFFF;
        }

        .btn-1 button i, .btn-2 button i, .btn-3 button i{
            font-size: 10px;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .btn-1 span, .btn-2 span, .btn-3 span{

        }

        .autre-button {
            height: inherit;
            width: 31px;
        }

        .col-card {
            box-sizing: border-box;
            height: 127px;
            width: 255px;
            border: 1px solid #191970;
            border-radius: 6px;
            background-image: url('19007.webp');
        }

        .col-card1 {
            box-sizing: border-box;
            height: 127px;
            width: 269px;
            border: 1px solid #191970;
            border-radius: 6px;
            background-color: #fdfcfc;
            /* background-image: url('19007.webp'); */
        }

        .btn-pending1 {
            height: 32px;
            width: 31px;
            border-radius: 6px 0 0 6px;
            background-color: #FFFFFF;
        }

        .btn-1 svg {
            color: rgb(252, 106, 106);
            position: relative;
            left: -5px;
            top: -1px !important;
        }

        .user-nom {
            height: 10px;
            width: 130px;
            color: #191970;
            font-family: Roboto;
            font-size: 12px;
            font-weight: 500;
            letter-spacing: -0.29px;
            line-height: 10px;
        }

        .user-tel {
            height: 10px;
            width: 79px;
            color: #191970;
            font-family: Roboto;
            font-size: 12px;
            font-weight: 500;
            letter-spacing: -0.29px;
            line-height: 10px;
        }

        .user-location {
            height: 24px;
            width: 118px;
            color: #191970;
            font-family: Roboto;
            font-size: 12px;
            font-weight: 300;
            letter-spacing: -0.29px;
            line-height: 12px;
        }

        .user-entreprise {
            height: 14px;
            width: 64px;
            color: #191970;
            font-family: Roboto;
            font-size: 12px;
            font-weight: 500;
            letter-spacing: -0.29px;
            line-height: 14px;
        }

        .no-carte-p {
            width: 286px;
            position: relative;
            margin-left: auto;
            margin-right: auto;
            left: -80px;
        }

</style>

<div class="modal fade" id="deleteCarnetCredit" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog  modal-dialog-centered" style="max-width: 432px !important; max-height: 213px !important; border-radius: 6px;">
        <div class="modal-content" style="width: 100% !important; height: 100% !important;background-color: #FFFFFF;box-shadow: 0 5px 15px 0 rgba(0,0,0,0.35);">

            <div class="modal-body px-0" style="height: 213px;padding-top: 25px;">
                <div class="text-confirmer-la-suppres"><span>Confirmer la suppression</span></div>
                <div  class="entete-modal-delete"></div>
                <div class="etes-vous-sur-de-vou">
                    <span>Êtes-vous sûr de vouloir supprimer définitivementcette Carde de Credit ?</span>
                </div>
                <div class="d-flex">
                    <div class="non-confirm-delete-carnet ">
                        <button class="button-non" id="formDeleteCredit_close-btn">NON</button>
                    </div>
                    <div class="oui-confirm-delete-carnet ">

                        <input  hidden value="" id="deleking_id" name="formDeleteCredit_carnet_id" type="text">
                        <button type="button"  id="formDeleteCredit_submit-btn" class="button-oui">OUI</button>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="modifyPayementProfilCarteCredit" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" style="padding-left:250px">
    <div class="modal-dialog volet-droite-modal-dialog-add-pay-credit">
	    <div class="modal-content volet-droite-modal-content-add-pay-credit" >

            <div class="modal-header ajout-carte-credit-header">
                <h5>Modifier une carte de crédit ou de débit</h5>
                <h6>TOULÈ Market accepte la plupart des cartes de paiement.</h6>
                <img src="/assets/images2/CB.svg" alt="">
            </div>

          <div class="modal-body modal-body-ajout-carte-credit">

            <div class="payement-element-container">

                <div class="input-element-carte-credit">
                    <label for="nameDeCarte">Numéro de la carte</label>
                    <input type="text" name="numeroCart" id="nameDeCarte" placeholder="4598 **** **** ****">
                </div>

                <div class="input-element-carte-credit">
                    <label for="nameCarte">Nom sur la carte </label>
                    <input type="text" name="nomCart"   onkeyup=letterOnly(this) id="nameCarte" placeholder="ex. John SMITH">
                </div>

                <div class="carte-carte">

                    <div class="date-expiration numero-ccv">
                        <label for="dateExpiration">Date d'expiration</label>
                        <input maxlength='5' id="dateExpiry" placeholder="MM/YY" type="text" onkeyup="formatString(event);" style="margin-top: -5px;">
                    </div>


                    <div class="numero-ccv">
                        <label for="numberCcv">Numero CCV</label>
                        <input type="number" name="number-ccv" id="numberCcv" placeholder="Votre numero ccv" style="margin-top: -5px;">
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
                    <button class="annul-button" aria-label="Close" id="closeme">Annuler</button>
                    <button class="ajouter-button" id="ModifyCardInfo">Modifier</button>
                </div>

            </div>

        </div>

	    </div>
	  </div>
	</div>

    <div id="size_pro" class="div-principal" style="height: 478px; width:320px; margin-top: 10px">
        <div style="margin-top:20px; margin-bottom:20px">
            <div class="card myCard" style="margin-top: 10px; " >

                <button  class="button-card-entete" >

                <span style="margin-left: 15px"><img class="icone-menu-user-left" src="{{  asset('assets/images/user-profil.svg') }}" alt="">
                    <span  class="general">Général</span>
                </span>
                </button>

                <button  data-id="#info-perso" data-libelle="Mes informations personnelles" data-parent="Général"  class="button-card1 bordure-left mydata-menu-profil"> <span class="mes-informations-per" style="margin-left: 15px">Mes informations personnelles</span> </button>
                <button  data-id="#mes-adresses" data-libelle="Mes adresses" data-parent="Général"  class="button-card2 bordure-left mydata-menu-profil ms"> <span class="mes-adresses  ms" style="margin-left: 15px">Mes adresses</span></button>
                <button   data-id="#mes-modes-de-paiemen" data-libelle="Mes modes de payements" data-parent="Général" value="to-repalce-please" class="button-card3 bordure-left mydata-menu-profil cs"> <span class="mes-modes-de-paiemen" style="margin-left: 15px">Mes modes de payements</span></button>

            </div>

        <div class="card myCard" >
            <button   class="button-card-entete ">
                <span style="margin-left: 15px"><img class="icone-menu-user-left" src="{{  asset('assets/images/message-profil.svg') }}" alt="">
                    <span class="general">Message</span>
                </span>
            </button>
            <button data-id="#messagerie" data-libelle="Messagerie" data-parent="Message"  class="button-card3 bordure-left mydata-menu-profil"> <span class="mes-modes-de-paiemen" style="margin-left: 15px">Messagerie</span></button>

        </div>

        <div class="card myCard"  >
            <button  class="button-card-entete " >
                <span style="margin-left: 15px"><img class="icone-menu-user-left" src="{{  asset('assets/images/achat-profil.svg') }}" alt="">
                    <span class="general">Achats</span>

                </span>

            </button>
            <button data-id="#mes-commandes" class="button-card2 bordure-left mydata-menu-profil" data-libelle="Mes achats" data-parent="Achats"> <span class="mes-modes-de-paiemen commande-instance"  style="margin-left: 15px">Mes achats</span></button>
            <button data-id="#suivis-commandes" class="button-card3 bordure-left mydata-menu-profil" data-libelle="Suivre une commande" data-parent="Achats"> <span class="mes-modes-de-paiemen commande-instanced" style="margin-left: 15px">Suivre une commande</span></button>

        </div>


        <div class="card myCard"  >
            <button  class="button-card-entete" >
                <span style="margin-left: 15px"><img class="icone-menu-user-left" src="{{  asset('assets/images/pour-rien-louper.svg') }}" alt="">
                    <span class="general">Pour ne rien louper</span>

                </span>

            </button>
            <button data-id="#mes-favoris" class="button-card2 bordure-left mydata-menu-profil"> <span class="mes-adresses" style="margin-left: 15px">Mes favoris</span></button>

            <button data-id="#mon-historique" class="button-card3 bordure-left mydata-menu-profil"> <span class="mes-modes-de-paiemen" style="margin-left: 15px">Mon historique</span></button>

        </div>


        <div class="card myCard"  >
            <button  class="button-card-entete" >
                <span style="margin-left: 15px"><img class="icone-menu-user-left" src="{{  asset('assets/images/aide-profile.svg') }}" alt="">
                    <span class="general">Aides</span>
                </span>
            </button>

            <a class="button-card3 bordure-left mydata-menu-profil" href="{{ url('centre_aide') }}" target="_blank" style="text-decoration:none;"> <span class="mes-modes-de-paiemen" style="margin-left: 15px;">Centre d'aides</span></a>

        </div>
    </div>

</div>

<script src="{{ asset('assets/jquery/dist/jquery.min.js') }}"></script>

<script>

        // $('#nameDeCarte').mask('0000 0000 0000 0000');
        // $('#numberCcv').mask('000');

        function letterOnly(input) {
            var regex = /[^a-zA-ZÀ-ÿ-._ ]/gi;
            input.value = input.value.replace(regex, "");

            if (input.value.length < 3 && input.value.length >0) {
                $("#nameCarte").addClass('input-error-warning');
            }else {
                $("#nameCarte").removeClass('input-error-warning');

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


        jQuery(document).ready(function () {

            $(document).on('click', '.ms', function () {
            $('.as').addClass('hide');
            $('.ls').removeClass('hide');
            $('#addAdress').removeClass('desable-add-adresse')

            var LurlM = '/carnet-getaddress';

            $.ajax({
            type: "GET",
            url: LurlM,
            success: function (response) {
            console.log('Votre response des carnets est:', response)
            var carnets = response.carnet[0];

            $('#addressContaineur').empty();
            $('#liste-carnet-adresse-vide').empty();

                if(carnets.length == 0){
                    $('#addressContaineur').append(`<div id="liste-carnet-adresse-vide" class="carnet-adresse">
                    <div class="vous-navez-pas-dad">
                        <span>Vous n'avez pas d'adresses enregistrées</span>
                    </div>
                    <div class="img-bottom-address1"></div>
                </div>`)

            } else {

            $.each(carnets, function(key, carnet){

            if(carnet.adresse_defaut === 1){

            $('#addressContaineur').append(`<div class="back-ground-carnet1" id="carnet_${carnet.id}">
            <div class="col col-card" id="carnets_${carnet.id}" style="text-align: right; margin-bottom: 20px; padding-left:0px; display: flex;">
                <div class="btn-group-vertical" role="group" aria-label="Basic example" style="margin-left: 11px">
                    <div class="btn-2">
                        <button type="button" disabled class="btn btn-outline-secondary"  style="background-color: #fff; border-bottom: none; border-radius: 6px;"><img class="icon-carnet-adresse-rectangle1" style="width :10.96px; height:10.96px; margin-left: -4px"  src="{{  asset('assets/images/icon-user-carnet.svg') }}" alt=""></button>
                        <span class="user-nom"><b>${carnet.prenom_nom}</b></span>
                    </div>
                    <div class="btn-1">
                        <button type="button" disabled class="btn btn-outline-secondary"  style="background-color: #fff;"><img style="margin-top: 2.5px; width :11.95px; height:11.96px; margin-left: -4px" class="icon-carnet-adresse-rectangle1" src="{{  asset('assets/images/icon-telephone-carnet.svg') }}" alt=""></button>
                        <span class="user-tel"><b> ${carnet.portable}</b></span>
                    </div>
                    <div class="btn-1">
                        <button type="button" disabled class="btn btn-outline-secondary"  style="background-color: #fff; border-top: none;"><img style="margin-top: 2.5px; width:8.96px; height:12.95px ; margin-left: -4px" class="icon-carnet-adresse-rectangle1" src="{{  asset('assets/images/icon-localisation-carnet.svg') }}" alt=""> </button>
                        <span class="user-location">${carnet.adresse} </span>
                    </div>
                    <div class="btn-3">
                        <button type="button" disabled class="btn btn-outline-secondary"  style="background-color: #fff; border-top: none;"><img style="margin-top: 2.5px; width:11.95px; height:11.96px ; margin-left: -4px" class="icon-carnet-adresse-rectangle1" src="{{  asset('assets/images/icon-batiment-carnet.svg') }}" alt="">></button>
                        <span class="user-entreprise"><b> ${carnet.nom_entreprise}</b></span>
                    </div>
                </div>
                <div class="autre-button" style="position: absolute; float: right; right: 2px; display: flex; flex-direction: column; justify-content: center; align-items: center;">
                    <div class="pended-button1" style="margin-bottom: 6px">
                        <button value="${carnet.id}" data-toggle="modal" class="btn-pending" data-target="#deleteCarnetAdresse" id="delete" ><img style="width:20px; height:20px"  src="{{ asset('assets/images/fermepannier.svg') }}" alt="" /></button>
                    </div>
                    <div class="pended-button2">
                        <button value="${carnet.id}"  id="modif_addresse" class="btn-pending "><img style="width:20px; height:20px" src="{{ asset('assets/images/edit-off.svg') }}" alt="" /></button>
                    </div>
                </div>
            </div>
            </div> `);
            $('#carnets_'+carnet.id).addClass('col-card');
        }else{

        $('#addressContaineur').append(`<div class="back-ground-carnet" id="carnet_${carnet.id}">
            <div class="col col-card1" style="text-align: right; margin-bottom: 20px; padding-left:0px; display: flex;">
                <div class="btn-group-vertical" role="group" aria-label="Basic example" style="margin-left: 11px">
                    <div class="btn-2">
                        <button type="button" disabled class="btn btn-outline-secondary"  style="background-color: #fff; border-bottom: none; border-radius: 6px;"><img class="icon-carnet-adresse-rectangle1" style="width :10.96px; height:10.96px ; margin-left: -4px" src="{{  asset('assets/images/icon-user-carnet.svg') }}" alt=""></button>
                        <span class="user-nom"><b>  ${carnet.prenom_nom}</b></span>
                    </div>
                    <div class="btn-1">
                        <button type="button" disabled class="btn btn-outline-secondary"  style="background-color: #fff;"><img style="margin-top: 2.5px; width :11.95px; height:11.96px ; margin-left: -4px" class="icon-carnet-adresse-rectangle1" src="{{  asset('assets/images/icon-telephone-carnet.svg') }}" alt=""></button>
                        <span class="user-tel"><b> ${carnet.portable}</b></span>
                    </div>
                    <div class="btn-1">
                        <button type="button" disabled class="btn btn-outline-secondary"  style="background-color: #fff; border-top: none;"><img style="margin-top: 2.5px; width:8.96px; height:12.95px ; margin-left: -4px" class="icon-carnet-adresse-rectangle1" src="{{  asset('assets/images/icon-localisation-carnet.svg') }}" alt=""></button>
                        <span class="user-location">${carnet.adresse} </span>
                    </div>
                    <div class="btn-3">
                        <button type="button" disabled class="btn btn-outline-secondary"  style="background-color: #fff; border-top: none;"><img style="margin-top: 2.5px; width:11.95px; height:11.96px ; margin-left: -4px" class="icon-carnet-adresse-rectangle1" src="{{  asset('assets/images/icon-batiment-carnet.svg') }}" alt=""></button>
                        <span class="user-entreprise"><b> ${carnet.nom_entreprise}</b></span>
                    </div>
                </div>
                <div class="autre-button" style="position: absolute; float: right; right: 2px; display: flex; flex-direction: column; justify-content: center; align-items: center;">
                    <div class="pended-button1" style="margin-bottom: 6px">
            <button value="${carnet.id}" data-toggle="modal" class="btn-pending" data-target="#deleteCarnetAdresse" id="delete" ><img  style="width:20px; height:20px" src="{{ asset('assets/images/fermepannier.svg') }}" alt="" /></button>
                        </div>
                        <div class="pended-button2">
                            <button value="${carnet.id}"  id="modif_addresse" class="btn-pending "><img style="width:20px; height:20px" src="{{ asset('assets/images/edit-off.svg') }}" alt="" /></button>
                        </div>
                    </div>
                </div>
                </div> `);
            }// fin ELSE

            });

        } // fin else

        },
    });

});




//-----------------------------------MES PAIEMENT-------------------------------------------------------------------

                $(document).on('click', '.cs', function () {

                console.log("gets all payments in menu-profile-left blade");

                var LurlK = '/get_credit_card/'+$('.cs').val();

                $.ajax({
                    type: "GET",
                    url: LurlK,
                    success: function (response) {
                    console.log('Vos paiement sont là:', response.creditcards)
                    var cards = response.creditcards;
                    $('#creditcardContainer').empty();
                    if(cards.length == 0){

                    $('#creditcardContainer').append(` <div class="vous-navez-pas-dad">
                                <div class="no-carte-p">Vous n'avez pas enregistré d'options de paiement</div>
                    </div>`)

                } else {

                    $.each(cards, function(key, card){
                    moment(card.date_expiration).format('MM/YYYY');

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
                        <button class="btn-pending1" data-target="#deleteCarnetCredit" id="kinkinaoff" value="${card.id}" style="border: none"><img  style="width:20px; height:20px" src="{{ asset('assets/images/icons/edit_blue.svg') }}" alt="" /></button>
                        </div>
                        <div class="pended-button2">
                            <button class="btn-pending1" data-target="#modifyPayementProfilCarteCredit" id="modifKredo" value="${card.id}"  style="border: none"><img src="{{ asset('assets/images/icons/close_blue.svg') }}" alt="" /></button>
                        </div>
                    </div>
                    </div>
                    <div class="button-section-paiement" style="margin-top: 5px">
                        <div class="row-element-btn-1">
                            <button class="btn-phone"><img style="margin-top: 2.5px; width :11.95px; height:11.96px ; margin-left: -4px" class="icon-carnet-adresse-rectangle1" src="{{  asset('assets/images/icon-telephone-carnet.svg') }}" alt=""></button>
                            <span class="phone-paiement" style="position: relative; top: 7px;">${card.portable}</span>
                        </div>
                        <div class="row-element-btn-1">
                            <button class="btn-phone">
                            <img style="margin-top: 2.5px; width:8.96px; height:12.95px" class="icon-carnet-adresse-rectangle1" src="{{  asset('assets/images/icon-localisation-carnet.svg') }}" alt="">
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
                    <button class="btn-pending1" data-target="#deleteCarnetCredit" value="${card.id}" id="kinkinaoff" style="border: none"><img  style="width:20px; height:20px" src="{{ asset('assets/images/icons/edit_blue.svg') }}" alt="" /></button>
                        </div>
                        <div class="pended-button2">
                            <button class="btn-pending1" data-target="#modifyPayementProfilCarteCredit"  id="modifKredo" value="${card.id}"  style="border: none"><img src="{{ asset('assets/images/icons/close_blue.svg') }}" alt="" /></button>
                        </div>
                    </div>

                    </div>

                    <div class="button-section-paiement" style="margin-top: 5px">

                        <div class="row-element-btn-1">
                            <button class="btn-phone"><img style="margin-top: 2.5px; width :11.95px; height:11.96px ; margin-left: -4px" class="icon-carnet-adresse-rectangle1" src="{{  asset('assets/images/icon-telephone-carnet.svg') }}" alt=""></button>
                            <span class="phone-paiement" style="position: relative; top: 7px;">${card.portable}</span>
                        </div>

                        <div class="row-element-btn-1">
                            <button class="btn-phone">
                            <img style="margin-top: 2.5px; width:8.96px; height:12.95px" class="icon-carnet-adresse-rectangle1" src="{{  asset('assets/images/icon-localisation-carnet.svg') }}" alt="">
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
    });



//---------------------------------------------LINE BREAK-----------------------------------


    $(document).on('click', '#kinkinaoff', function () {
        $('#deleteCarnetCredit').modal('show');//padding-left: 250px
        console.log('just below line break') ;
        console.log($(this).val()) ;
        var credit_id = $(this).val(); // get the current credit to delete (NB: we used s(this.val()) to get the value)
        $('#deleking_id').val(credit_id); // place the address_id in the modal deleting id
        $('#deleteCarnetCredit').css('padding-left','250px');
    })


    $(document).on('click', '#formDeleteCredit_close-btn', function () {
        $('#deleteCarnetCredit').modal('hide');
    })

    $(document).on('click', '#formDeleteCredit_submit-btn', function () {
    var data={};
    var credit = $('#deleking_id').val();

    data = {'credit_id': credit};

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $.ajax({
        type: "POST",
        url: '/credit-delete',
        data: data,
        dataType: "json",
        success: function (response) {
            console.log(response);
            $('#credit_'+credit).remove();
            $('#deleteCarnetCredit').modal('hide');
        }
        });   // FIN AJAX CALL



//-------------------------------DEUXIEME REQUETE AJAX POUR VERIFIER SI LE TBLEAU EST VIDE---------------------------------

        var LurlK = '/get_credit_card/'+$('.cs').val();

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $.ajax({
            type: "GET",
            url: LurlK,
            success: function (response) {
            var cards = response.creditcards;
            if(cards.length == 0){
                $('#creditcardContainer').append(` <div class="vous-navez-pas-dad">
                <div class="no-carte-p">Vous n'avez pas enregistré d'options de paiement</div>
                </div>`)
            }
        }
        });   // FIN AJAX CALL
    }) // FIN formDeleteCredit_submit-btn


//---------------------------------------------------------------------------------------------------------------

            $(document).on('click', '#modifKredo', function (e) {
            e.preventDefault();
            var cardID = $(this).val()

            console.log('menu-profil-left.blade.php');
            $('#modifyPayementProfilCarteCredit').modal('show');
            $('#modifyPayementProfilCarteCredit').css('padding-left','250px');;

            var url = '/get_credit_cardByID/'+cardID;

            $.ajax({
            type: "GET",
            url: url,
            success: function (response) {
                    var credits = response.credits[0];
                    var data={};
                    console.log(credits);

                _.each(credits, function(model){
                    $('#ModifyCardInfo').val(model.id);
                    $('#nameDeCarte').val(model.numero_carte);
                    $('#nameCarte').val(model.nom_proprietaire);
                    $('#dateExpiry').val(model.date_expiration);
                    $('#numberCcv').val(model.code_securite);

                });
            }

            }); // FIN AJAX

        });

        $(document).on('click', '#closeme', function (e) {
            e.preventDefault();
            $('#modifyPayementProfilCarteCredit').modal('hide');

        })


        $(document).on('click', '#ModifyCardInfo', function (e) {
            e.preventDefault();
            console.log('menu-profil-left.blade.php');
            var data ={};
            console.log($('#ModifyCardInfo').val());

            data = {
                'id':$('#ModifyCardInfo').val(),
                'numero_carte':$('#nameDeCarte').val(),
                'nom_proprietaire':$('#nameCarte').val(),
                'date_expiration':$('#dateExpiry').val(),
                'code_securite':$('#numberCcv').val(),
            }


            var url = '/update-user-credit';

            $.ajaxSetup({
            headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $.ajax({
                type: "POST",
                url: url,
                data: data,
                dataType: "json",
                success: function (response) {
                    if(response.status === 200){
                        $('#modifyPayementProfilCarteCredit').modal('hide');
                    }
                }
            })// FIN AJAX

//---------------------------------------------------------------------------------------------

                    var LurlK = '/get_credit_card/'+$('.cs').val();

                    $.ajax({
                        type: "GET",
                        url: LurlK,
                        success: function (response) {
                        var cards = response.creditcards;
                        $('#creditcardContainer').empty();
                        if(cards.length == 0){

                            $('#creditcardContainer').append(` <div class="vous-navez-pas-dad">
                                    <div class="no-carte-p">Vous n'avez pas enregistré d'options de paiement</div>
                            </div>`)

                        } else {

                            $.each(cards, function(key, card){
                            moment(card.date_expiration).format('MM/YYYY');

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
                                    <button class="btn-phone"><img style="margin-top: 2.5px; width :11.95px; height:11.96px ; margin-left: -4px" class="icon-carnet-adresse-rectangle1" src="{{  asset('assets/images/icon-telephone-carnet.svg') }}" alt=""></button>
                                    <span class="phone-paiement" style="position: relative; top: 7px;">${card.portable}</span>
                                </div>
                                <div class="row-element-btn-1">
                                    <button class="btn-phone">
                                    <img style="margin-top: 2.5px; width:8.96px; height:12.95px" class="icon-carnet-adresse-rectangle1" src="{{  asset('assets/images/icon-localisation-carnet.svg') }}" alt="">
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
                            <button class="btn-pending1" data-target="#modifyPayementProfilCarteCredit"  id="modifKredo" value="${card.id}"  style="border: none"><img src="{{ asset('assets/images/icons/close_blue.svg') }}" alt="" /></button>
                        </div>
                    </div>

                    </div>

                    <div class="button-section-paiement" style="margin-top: 5px">

                        <div class="row-element-btn-1">
                            <button class="btn-phone"><img style="margin-top: 2.5px; width :11.95px; height:11.96px ; margin-left: -4px" class="icon-carnet-adresse-rectangle1" src="{{  asset('assets/images/icon-telephone-carnet.svg') }}" alt=""></button>
                            <span class="phone-paiement" style="position: relative; top: 7px;">${card.portable}</span>
                        </div>

                        <div class="row-element-btn-1">
                            <button class="btn-phone">
                            <img style="margin-top: 2.5px; width:8.96px; height:12.95px" class="icon-carnet-adresse-rectangle1" src="{{  asset('assets/images/icon-localisation-carnet.svg') }}" alt="">
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

             });


            //  ---------------------- get client commande ------------------------
            $(document).on('click', '.commande-instance', function () {
            $.ajax({
            type: 'GET',
            url: '/get_client_commande',
            data: {},
            success: function(response) {

            if (response.length > 0) {

            $('#tab-client-commande').empty()

            for (let index = 0; index < response.length; index++) {
            console.log('reponse commande:', response[index])

            let client_commande = '';

            let detail_commant_produit = response[index]['detail_commade']

            var mode_pay;

            if (response[index].mode_payement == 'AirtelMoney') {
                mode_pay = '/assets/images/icons/AirtelMoney.svg'
            }else if (response[index].mode_payement == 'MoovMoney') {
                mode_pay = '/assets/images/icones-vendeurs2/Moovmoney.svg'
            }

            let id_commande = response[index].id

            client_commande += `
                <tr style="position: absolute" class="hide-commande-tr" onmouseleave="checkOver2(${id_commande})" id="commande-hovered-layer-success-${id_commande}" onclick="showSubcontent(${id_commande})">
                    <td colspan="9" style="height: inherit">
                        <div class="commande-hover-zone-2">Fermer les details de cette commande</div>
                    </td>
                </tr>
                `

                client_commande += `
                    <tr style="position: absolute" class="hide-commande-tr" onmouseleave="checkOver2(${id_commande})"  id="commande-hovered-layer-${id_commande}" onclick="showSubcontent(${id_commande})">
                        <td colspan="9" style="height: inherit; border: transparent">
                            <div class="commande-hover-zone">Voir les details de cette commande</div>
                        </td>
                    </tr>
                `
                client_commande += '<tr height="60px" onmouseenter="checkOver('+id_commande+')" onmouseleave="checkOver2('+id_commande+')" class="commande-rows" data-commade="'+response[index].id+'" style="background-color: redd" >'

                client_commande += `
                    <td style="width: 50px">
                        <span id="images_temps-${id_commande}"><img src="/assets/images2/Fermes2.svg" alt="" /></span>
                        <span id="images_temps1-${id_commande}" class="hide-commande-tr"><img src="/assets/images2/Ouvert.svg" alt="" /></span>
                    </d>
                `

                client_commande += '<td class="contenu1 td-section" >'+response[index].ref_commande.toUpperCase()+'</td><td class="contenu4 td-section" style="width: 56px">'+response[index].quantite_total+'</td><td class="contenu5 td-section" style="width: 112px;">'+response[index].totaf_facturation+' Fcfa</td>'

                client_commande += '<td class="td-section" style="width: 56px;"> <img src="'+mode_pay+'"></td><td class="commande-middle td-section" >En cours de traitement</td><td class="contenu2 td-section" style="width:101px">'+response[index].date_commande+'</td><td class="contenu2 td-section" style="width: 51px"><span class="facture-pdf">PDF</span></td>'

                client_commande += '<td class="contenu2 td-section" onmouseout="checkOver3('+id_commande+')" style="width: 147px;"><button onclick=nouvelCommande("'+id_commande+'") class="re-commander">Nvl. Commande</button></td></tr>'

                client_commande += '<tr class="hide-commande-tr default-tr-close-selector" id="detail-commande-'+response[index].id+'"><td colspan="9"><div class="commande-sub-content"><div class="commande-sub-content-adress">'

                client_commande += '<div class="infocliff" style="background-color: yellow1">'

                client_commande += `
                <div class="textenteteinfo" style="width: 187px; background-color:greenf"><p class="penteteinfo">Facturé à :</p></div>
                `
                client_commande += `<div class="group3 zone-icons-grouppe" style="background-color: bluess">`

                client_commande += `
                <img src="/assets/images/icones-vendeurs2/user copy 2.svg" class="addr-icons"><img src="/assets/images/icones-vendeurs2/placeholder copy 2.svg" class="addr-icons"><img src="/assets/images/icones-vendeurs2/telephone.svg" class="addr-icons"></div>
                `

                client_commande += '<div style="margin-top:-114px; margin-left: 46px; ">'

                // pointer
                client_commande += '<div class="textcolora4-bis commande-addr-detail" style="margin-top:14px;" >Jules</div>'

                client_commande += '<div class="textcolora4-bis commande-addr-detail" >okala</div>'

                client_commande += '<div class="textcolora4-bis commande-addr-detail" >074846163</div>'

                client_commande += '</div></div>'

                client_commande += '<div class="infoexpe" style="display:noned"><div class="textenteteinfo" style="width: 187px"><p class="penteteinfo">Livré à :</p></div>'

                client_commande += '<div class="group3 zone-icons-grouppe">'

                client_commande += '<img src="/assets/images/icones-vendeurs2/user copy 2.svg" class="addr-icons"><img src="/assets/images/icones-vendeurs2/placeholder copy 2.svg" class="addr-icons"><img src="/assets/images/icones-vendeurs2/telephone.svg" class="addr-icons"></div>'

                client_commande += '<div style="margin-top:-102px; margin-left: 46px">'

                client_commande += '<div class="textcolora4-bis commande-addr-detail" style="" >Luise</div>'

                client_commande += '<div class="textcolora4-bis commande-addr-detail" >okala</div>'

                client_commande += '<div class="textcolora4-bis commande-addr-detail" >lalala</div>'

                client_commande += '</div></div></div>';

                client_commande += `<div class="commande-sub-content-details">
                    <div class="commande-client-recap-tile"><span class="commande-resume-header">RÉSUMÉ DE LA COMMANDE</span></div>`

                client_commande += `<table id="commande-tablebis" style=" width: 640px !important; left: 0px !important; margin-top: 0px">
                <thead>
                    <tr class="commande-resume-table-header"><td class="tab-comm-element" style="width: 110px">Référence</td><td class="tab-comm-element" style="width:347px; text-align:left; padding-left: 15px">Article(s)</td><td class="tab-comm-element">Quantité</td><td class="tab-comm-element">Prix unitaire</td>
                    </tr>
                </thead>
                </table>
                `

                client_commande += `<div class="children-sub-table" style="width:640px !important"><table><tbody id="tab-client-commande-sub-content-${id_commande}">`

                if (detail_commant_produit.length > 0) {

                    for (let j = 0; j < detail_commant_produit.length; j++) {
                        client_commande += '<tr><td class="contenu1 td-section" style="width: 110px">'+detail_commant_produit[j]['ref_produit']+'</td><td class="contenu4 td-section" style="width:347px;"><article class="commande-information-prod" ><aside class="boxcontenu2-bis" style="margin-right: 10px; height: 34px; width:34px;"><img src="/'+detail_commant_produit[j]['image']+'" alt="" style="height: auto; width: 100%" /></aside><span class="contenu2 commande-libelle-prod-detail" style="text-align:left">'+detail_commant_produit[j]['libelle']+'</span></article></td><td class="contenu5 td-section" style="width: 72px">'+detail_commant_produit[j]['quantite']+'</td><td class="td-section detail-commade-price"> '+detail_commant_produit[j]['prix']+' Fcfa </td></tr>'
                    }

                }

                client_commande += '</tbody></div></table></div></div></td></tr>'

                $('#tab-client-commande').append(client_commande)

                }

            }

        }
        })
    })

    $("#commande-table").delegate("tr.commande-rows", "click", function(event){
        console.log('Voici l attribut:', )
        var id_commande = $(this).attr("data-commade")
        if ($('#detail-commande-'+$(this).attr("data-commade")).hasClass('hide-commande-tr')) {
            $('.default-tr-close-selector').addClass('hide-commande-tr')
            $('#detail-commande-'+$(this).attr("data-commade")).removeClass('hide-commande-tr')
            $('#images_temps1-'+id_commande).removeClass('hide-commande-tr')
            $('#images_temps-'+id_commande).addClass('hide-commande-tr')
        }else {
            $('#detail-commande-'+$(this).attr("data-commade")).addClass('hide-commande-tr')
            $('#images_temps1-'+id_commande).addClass('hide-commande-tr')
            $('#images_temps-'+id_commande).removeClass('hide-commande-tr')
        }

    });

    });


        function nouvelCommande(id_commande) {

            // $("#userProfilModal").removeClass("in");
            // $(".modal-backdrop").remove();
            // $("#userProfilModal").hide();

            $.ajax({
                type: 'GET',
                url: '/recommander',
                data: {id_commande: id_commande},
                success: function(result) {

                var nombre_produit = 0
                console.log('le compteur est:', nombre_produit)
                if (result.length > 0) {

                    for (let j = 0; j < result.length; j++) {
                        nombre_produit += result[j][0]
                    }

                    if ($('#nbr_panier').attr('class') == '') { // traitement du compteur
                        $('#nbr_panier').addClass("menu-item-counter");
                        $('#nbr_panier').addClass("text-center");
                    }

                    $('#nbr_panier').text(nombre_produit);

                    if ($('#nbr_panier2').attr('class') == '') {
                        $('#nbr_panier2').addClass("panier-counter");
                        $('#nbr_panier2').addClass("text-center");
                    }

                    $('#nbr_panier2').text(nombre_produit);

                    $('#pp').text(nombre_produit)

                    }
                }
            })

        }

        function checkOver(id_commande) {
        if ($('#detail-commande-'+id_commande).hasClass('hide-commande-tr')) {
            console.log('il est fermé')
        }else {
            console.log('Il est ouvert:')
        }
        $('#images_temps1-'+id_commande).removeClass('hide-commande-tr')
        $('#images_temps-'+id_commande).addClass('hide-commande-tr')
        }

        function checkOver2(id_commande) {
            if ($('#detail-commande-'+id_commande).hasClass('hide-commande-tr')) {
                console.log('il est fermé')
                $('#images_temps1-'+id_commande).addClass('hide-commande-tr')
                $('#images_temps-'+id_commande).removeClass('hide-commande-tr')
            }else {
                console.log('Il est ouvert:')
            }
        }

        function checkOver3(id_commande) {
            $('#commande-hovered-layer-'+id_commande).addClass('hide-commande-tr')
        }

        function showSubcontent(id_commande) {
            if ($('#detail-commande-'+id_commande).hasClass('hide-commande-tr')) {
                $('#detail-commande-'+id_commande).removeClass('hide-commande-tr')
                $('#commande-hovered-layer-success-'+id_commande).removeClass('hide-commande-tr')
            }else {
                $('#detail-commande-'+id_commande).addClass('hide-commande-tr')
                $('#commande-hovered-layer-success-'+id_commande).addClass('hide-commande-tr')
            }
        }


</script>
