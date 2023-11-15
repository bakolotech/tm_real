<?php

    use Illuminate\Support\Facades\DB;
    use App\Models\Produit;

    if (session_status() == PHP_SESSION_NONE) {
        session_start();
    }

    $monPays = \App\Models\Pays::getPays();
    $pays = \App\Models\Pays::possibles();
    $langues = \App\Models\Langue::possibles();
    $devises = \App\Models\Devise::possibles();

    if (isset($_SESSION['config']) && !empty($_SESSION['config']) && count($_SESSION['config']) > 0){
        if (isset($_SESSION['config']['user-langue']) && !empty($_SESSION['config']['user-langue'])) {$maLangue = $_SESSION['config']['user-langue'];} else {$maLangue = []; }
        if (isset($_SESSION['config']['user-ville']) && !empty($_SESSION['config']['user-ville'])) {$maVille = $_SESSION['config']['user-ville'];} else {$maVille = []; }
        if (isset($_SESSION['config']['user-province']) && !empty($_SESSION['config']['user-province'])) {$maProvince = $_SESSION['config']['user-province'];} else {$maProvince = []; }
        if (isset($_SESSION['config']['user-devise']) && !empty($_SESSION['config']['user-devise'])) {$maDevise = $_SESSION['config']['user-devise'];} else {$maDevise = []; }
    }
    else{
        $maLangue = [];
        $maVille = [];
        $maProvince = [];
        $maDevise = [];
    }

    $maPosition = $_SESSION['config']['ma-position'];
    // print_r($maPosition);
    ?>
	<style type="text/css">
		@import url('https://fonts.googleapis.com/css2?family=Gelasio:ital@1&family=Licorice&family=Noto+Sans&family=Roboto:wght@300;400&family=Tajawal:wght@300&display=swap');

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

        .ckeckbox1-connected {
            border-radius: 4px;
            background-color: #1A7EF5;
            height: 20px;
            width: 20px;
            margin-right: 8px;
        }

        .ckeckbox1-connected span {
            position: relative;
            top: -15px;
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
            margin-top: 40px;
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
            font-weight: 500;
            letter-spacing: 0.31px;
            line-height: 18px;
            text-align: center;
            border: none;
        }

     .payement-card:hover{
        background-color: #F5F5F5;
        cursor: pointer;
        }

        .volet-droite-modal-dialog-add-livraison, .volet-droite-modal-content-livraison {
            position: relative;
            top: 50px;
        }

        .ajout-carte-credit-header {
            display: flex;
            flex-direction: column;
            margin-bottom: 19px;
        }

        .ajout-carte-credit-header h4{
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
            margin-top:3px;

        }

        .modal-body-ajout-carte-credit .payement-element-container .input-element-carte-credit {
            display: flex;
            flex-direction: column;
            margin-bottom: 15px;

        }

        .modal-body-ajout-carte-credit .payement-element-container .input-element-carte-credit-last input {
            box-sizing: border-box;
            height: 41px;
            width: 402px;
            border: 1px solid #9B9B9B;
            border-radius: 6px;
            background-color: #F8F8F8;
            padding-left: 15px;

        }

        .modal-body-ajout-carte-credit .payement-element-container .input-element-carte-credit input {
            box-sizing: border-box;
            height: 41px;
            width: 402px;
            border: 1px solid #9B9B9B;
            border-radius: 6px;
            background-color: #F8F8F8;
            padding-left: 13px;

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

        .il-sagit-de {
            display: flex;
            width: 402px;
            position: relative;
            margin-left: auto;
            margin-right: auto;
            margin-bottom: 15px;
            /* margin-top: 15px; */
        }

        .il-sagit-de .checkbox-carte-default {
            /* background-color: r */
            color: #4A4A4A;
            font-family: Roboto;
            font-size: 13px;
            letter-spacing: -0.31px;
            line-height: 18px;
        }

        .input-group-prepend .input-group-text {
            box-sizing: border-box;
            height: 41px !important;
            width: 41px;
            border: 1px solid #9B9B9B;
            border-radius: 6px 0 0 6px;
            background-color: #FFFFFF;
        }


        .select {
            box-sizing: border-box;
            height: 41px !important;
            width: 153px !important;
            border: 1px solid #9B9B9B;
            border-radius: 0 6px 6px 0;
            background-color: #FFFFFF;
            padding-left:10px;
        }

        .code-post input {
            height: 41px;
            width: 194px;
            margin-left:200px;
            margin-top:-41px;
        }

        #ville_user_client_achat:focus {
            border: none;
            outline: none
        }

        .center-forget-modal {
            top: 47% !important;
            transform: translateY(-50%) !important
        }

	</style>
    <style>
    .annul-button-client {
        box-sizing: border-box;
        height: 37px;
        width: 194px;
        border: 1px solid #1A7EF5;
        border-radius: 6px;
        background-color: #FFFFFF;
        color: #1A7EF5;
        font-family: Roboto;
        font-size: 16px;
        font-weight: 500;
        letter-spacing: 0.35px;
        line-height: 18px;
        text-align: center;

    }

    .ajouter-button-client {
        height: 37px;
        width: 194px;
        border-radius: 6px;
        background-color: #1A7EF5;

        color: #FFFFFF;
        font-family: Roboto;
        font-size: 16px;
        font-weight: 500;
        letter-spacing: 0.35px;
        line-height: 18px;
        text-align: center;
        border: transparent;
        margin-left: 15px;
    }

    .form-content-with-map {
        height: 491px !important;
        width: 873px !important;
        position: relative;
        left: -220px !important;
    }

    .address-livraison-map-section {
        width: 402px !important;
        position: relative; top: -20px;
        background-color: #9B9B9B;
    }

    .address-livraison-map-container {
        width: 402px; height: 400px;
        background-color: #fff;
        border: 1px solid #e6e3e3
    }

    .center-forget-modal {
        top: 47% !important;
        transform: translateY(-50%) !important
    }

    .spinner-border-helper {
        width: 1.5rem !important;
        height: 1.5rem !important;
        vertical-align: -0.125em;
        border: 0.25em solid currentColor;
        border-right-color: #1A7EF5!important;
        border-radius: 50%;
        border-color: #D8D8D8;
        -webkit-animation: .75s linear infinite spinner-border;
        animation: .75s linear infinite spinner-border;
    }

    .spinner-locationk {
        position: absolute;
        margin-left: 10px;
        margin-top: 9px;
    }



    </style>


	<!-- Modal -->
	<div class="modal fade" id="AjoutAdresseLivraisonAchat" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" style="z-index:10000">
    <div class="modal-dialog volet-droite-modal-dialog-add-livraison center-forget-modal">
	    <div class="modal-content volet-droite-modal-content-livraison form-content-with-map" >

            <button id="AjoutAdresseLivraisonAchatClosed" type="button" class="close-btn" style="z-index: 15000; position:absolute; right: -16px; top: -18px" >
                <img src="{{ asset('assets/images/close-btn.svg') }}" alt="">
            </button>

            <div class="modal-header ajout-carte-credit-header">
                <h4 style="margin-top: 5px;">Adresse de livraison</h4>
            </div>

          <div class="modal-body modal-body-ajout-carte-credit" style="display: flex !important">

            <div class="payement-element-container" style="position: relative; top: -21px; background-color: #fff; left:0px">

                <div class="carte-carte" style="margin-bottom: 15px;">

                    <div class="date-expiration numero-ccv">
                        <input type="text" name="numero-ccv" id="ajout-addr-nom" placeholder="Prénom & nom" onkeyup="letterOnly(this)">
                    </div>

                    <div class="numero-ccv">
                        <input type="text" name="phonenumber" id="ajout-addr-numero-cvv" placeholder="Numéro portable" style="background-image: url('/assets/images/icones-vendeurs2/infoB.svg');background-position:top 10px right 15px;background-repeat:no-repeat;background-size:20px;background-origin:content content; ">
                    </div>
                </div>

                <div class="input-element-carte-credit">
                    <button class="localisation-button-address" aria-label="Me geolocaliser" onclick="prendreMesCoordoneesNewUser()" style="padding-left: 10px">
                    <img style="position: absolute; margin-left: -12px" src="/assets/images/geo-alt-fill.svg" alt="" /> Me géolocaliser</button>
                    <input type="text" aria-label="Me geolocaliser" name="addresses" id="ajout-addr-quartier_new_user" placeholder="Adresse (Quartier/Rue/...)">
                    <span  aria-label="Me geolocaliser" class="spinner-border spinner-border-helper hide spinner-locationk" id="location_spiner3-new-user-achat" role="status" aria-hidden="true"></span>
                    <input name="livraison_addres_latitude_new_user" aria-label="Me geolocaliser" type="hidden" id="livraison_adress_lat_new_user" value="" />
                    <input name="livraison_addres_longitude_new_user" aria-label="Me geolocaliser" type="hidden" id="livraison_adress_lng_new_user" value="" />
                </div>

                <div class="input-element-carte-credit">
                    <input type="text" name="Komplements" id="ajout-addr-comp-addrer" placeholder="Compléments(ex:immeuble, étage...)">
                </div>

                <div class="row carte-carte" style="margin-bottom: 18px;margin-left:-10px;">
                <div class="cols">
                    <div class="input-group mb-3">
                    <div class="input-group-prepend" style="width: 41px !important; height: 41px !important; ">
                    <span class="input-group-text" id="basic-addon1-user-connected" style="width: 41px !important; height: 41px !important; background-color: #ccc">
                        <img src="{{ \App\Models\Pays::getImage2($maPosition['images']) }}" alt="" id="langue-modal-region-img" >
                        <input type="hidden" value="{{ \App\Models\Pays::getPays()->name }}" id="pays_client_achat">
                    </span>
            </div>
                    <div class="select" style="width: 154px !important;">
                    <select
                        name="formRegister_ville"
                        style="width: 155px; padding: 13px 0 10px 15px; position:relative; left: -11px; background-color: transparent; border: none !important"
                        class=" my-selectpays my-form-field-mute"
                        data-img-field="#langue-modal-region-img"
                        aria-label=".form-select-lg example"
                        id="ville_user_client_achat"
                    >
                    @foreach($_SESSION['config']['ma-position']['country']['cities'] as $city)
                        <option value="{{ $city['id'] }}" class="test">{{ $city['name'] }}</option>
                    @endforeach
                    </select>
                </div>
            </div>
        </div>

            <div class="col code-post">
                <input type="text" style="margin-top: -56px; !important" class="form-control input-element" id="ajout-addr-code-poste" placeholder="Code postal" name="postal_code">
            </div>

            </div>
            <div class="last-adresse-section">

            <label style="  color: #191970;
            font-family: Roboto;
            font-size: 15px;
            font-weight: 500;
            letter-spacing: -0.36px;
            line-height: 18px;margin-top:0px;margin-left:8px; position: relative; top: -17px">Il s'agit d'une</label>

            <div class="addresse-user-invite" style="margin-bottom: 0px !important; position: relative; top: -5px">

                <div style="display: flex">
                    <label for="addrcom" style="margin-right: 70px">
                        <input type="checkbox"  class="ckeckbox1" checked value="Residentiel"><span class="add-user-invite">Adresse résidentielle</span>
                    </label>
                    <label for="addrcom">
                        <input type="checkbox"  class="ckeckbox1" value="Entreprise"><span class="add-user-invite">Adresse pro/commerciale</span>
                    </label>
                </div>

            </div>

            <div class="input-element-carte-credit-last">
                <input type="text" class="grise-invite" name="numeroCarte" id="ajout-addr-nom-entreprise" placeholder="Nom de l'entreprise">
            </div>

            <div class="footer-button" style="margin-top: 22px; display: flex" >
                <button class="annul-button-client" onclick="annulerInviteAddresse1()">Annuler</button>
                <button class="ajouter-button-client ajout-adress-livrason-disabled" id="btn_addr_livraison-client" onclick="saveAjoutAdressLivraison()">Continuer</button>
            </div>
            </div>

            </div>

            {{-- zone reserver à la map  --}}
            <div class="payement-element-container address-livraison-map-section" style="top: -25px; position: relative; left:0px">


                <div class="address-livraison-map-container" id="address-livraison-map-container-id-new-user">

                </div>


            </div>

        </div>

	    </div>
	  </div>
	</div>

    <script src="{{ asset('assets/jQuery-Mask-Plugin-master/dist/jquery.mask.min.js') }}"></script>
    <script>

    $(document).ready(function() {
        $('.ckeckbox1').click(function() {

            $(this).prop('checked', true);

            if ($(this).val() === 'Entreprise') {
                $('#ajout-addr-nom-entreprise').removeClass('grise-invite')
                $('#btn_addr_livraison-client').addClass('ajout-adress-livrason-disabled')

            }else{
                $('#ajout-addr-nom-entreprise').addClass('grise-invite')
                $('#ajout-addr-nom-entreprise').removeClass('input-error-warning-long')
                $('#ajout-addr-nom-entreprise').val("")

                open_address_livr_btn()

            }
            $.each($('.ckeckbox1').not($(this)), function(key, value) {
                $(value).prop('checked', false);
            })

        })

        $('#AjoutAdresseLivraisonAchatClosed').on('click', function() {
            $('#AjoutAdresseLivraisonAchat').modal('hide')
        })

    })



        $('#ajout-addr-numero-cvv').mask('000000000')
        $('#ajout-addr-code-poste').mask('00000')

        $('#ajout-addr-nom').on('keyup', function() {
            let email_valeur = $(this).val()
            if (email_valeur.length > 0 && $('#ajout-addr-nom').hasClass('input-error-warning')) {
                $('#ajout-addr-nom').removeClass('input-error-warning')
            }else if (email_valeur.length == 0) {
                $('#ajout-addr-nom').addClass('input-error-warning')
            }
            open_address_livr_btn()
        })

    // ------------------------------- numero tel -------------------------------------
    $('#ajout-addr-nom').on('blur', function() {
        let email_valeur = $(this).val()
        if (email_valeur.length == 0) {
            $('#ajout-addr-nom').addClass('input-error-warning')
        }
    })

    $('#ajout-addr-numero-cvv').on('keyup', function() {
        let email_valeur = $(this).val()
        if (email_valeur.length > 0 && $('#ajout-addr-numero-cvv').hasClass('input-error-warning')) {
            $('#ajout-addr-numero-cvv').removeClass('input-error-warning')
        }else if (email_valeur.length == 0) {
            $('#ajout-addr-numero-cvv').addClass('input-error-warning')
        }
        open_address_livr_btn()
    })


    // ---------------------------- addresse quartier -----------------------

    $('#ajout-addr-numero-cvv').on('blur', function() {
        let email_valeur = $(this).val()
        if (email_valeur.length == 0) {
            $('#ajout-addr-numero-cvv').addClass('input-error-warning')
        }
    })

    $('#ajout-addr-quartier_new_user').on('keyup', function() {
        let email_valeur = $(this).val()
        if (email_valeur.length > 0 && $('#ajout-addr-quartier_new_user').hasClass('input-error-warning')) {
            $('#ajout-addr-quartier_new_user').removeClass('input-error-warning')
        }else if (email_valeur.length == 0) {
            $('#ajout-addr-quartier_new_user').addClass('input-error-warning')
        }

        open_address_livr_btn()

    })

    $('#ajout-addr-quartier_new_user').on('blur', function() {
        let email_valeur = $(this).val()
        if (email_valeur.length == 0) {
            $('#ajout-addr-quartier_new_user').addClass('input-error-warning')
        }
    })

    // ---------------------- nom entreprise nom-entreprise-user-invite -----------------------
    $('#ajout-addr-nom-entreprise').on('blur', function() {
        let email_valeur = $(this).val()
        if (email_valeur.length == 0) {
            $('#ajout-addr-nom-entreprise').addClass('input-error-warning-long')
        }

    })

    $('#ajout-addr-nom-entreprise').on('keyup', function() {

        let email_valeur = $(this).val()
        if (email_valeur.length > 0 && $('#ajout-addr-nom-entreprise').hasClass('input-error-warning-long')) {
            $('#ajout-addr-nom-entreprise').removeClass('input-error-warning-long')
        }else if (email_valeur.length == 0) {
            $('#ajout-addr-nom-entreprise').addClass('input-error-warning-long')
        }

        open_address_livr_btn()

    })

    function ValidateEmailInvite(mailval){
        var emailv = mailval
        if (/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/.test(emailv))
        {
            return (true)
        }else {
            return false;
        }
    }


    function open_address_livr_btn () {

    let nom_prenom1 = $('#ajout-addr-nom');
    let telephone_livraison= $('#ajout-addr-numero-cvv');
    let address_livraison = $('#ajout-addr-quartier_new_user');

    let nom_prenom2 = $('#ajout-addr-nom').val();
    let telephone_livraison2= $('#ajout-addr-numero-cvv').val();
    let address_livraison2 = $('#ajout-addr-quartier_new_user').val();

    let nom_entreprise_invite = $('#ajout-addr-nom-entreprise');

    // pwd-border-error
    if (!$(nom_prenom1).hasClass('input-error-warning') && !$(telephone_livraison).hasClass('input-error-warning') && !$(address_livraison).hasClass('input-error-warning') && !$(nom_entreprise_invite).hasClass('input-error-warning-long') && nom_prenom2.length > 0 && telephone_livraison2.length > 0 && address_livraison2.length > 0) {
        $('#btn_addr_livraison-client').removeClass('ajout-adress-livrason-disabled')
        console.log('Normalement bon')
    }else {
        $('#btn_addr_livraison-client').addClass('ajout-adress-livrason-disabled')
        console.log('Normalement pas bon')
    }
    }

        function saveAjoutAdressLivraison() {

            let ajout_addr_nom = $('#ajout-addr-nom').val();
            let ajout_addr_adress = $('#ajout-addr-quartier_new_user').val();
            let ajout_numero = $('#ajout-addr-numero-cvv').val();
            let code_postale = $('#ajout-addr-code-poste').val();
            let comp_addr = $('#ajout-addr-comp-addrer').val();
            let nom_entreprise = $('#ajout-addr-nom-entreprise').val();
            let addr_ville = $('#ville_user_client_achat').find(':selected').text();
            let add_pays = $('#pays_client_achat').val();
            let type_addresse = $('.ckeckbox1-connected:checkbox:checked').val()
            var latitude = $('#livraison_adress_lat_user').val();
            var longitude = $('#livraison_adress_lng_user').val();

            data = {
                'prenom_nom': ajout_addr_nom,
                'portable': ajout_numero,
                'adresse': ajout_addr_adress,
                'complement': comp_addr,
                'ville': addr_ville,
                'code_postale': code_postale,
                'nom_entreprise': nom_entreprise,
                'type_adresse':type_addresse,
                'latitude': latitude,
                'longitude': longitude,

            }

            $.ajax({
                type: "POST",
                url: '/add-address-carnet-achat',
                data: data,
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                success: function (response) {
                    $('#id_client_addresse').val(response['carnet'][0]['id'])
                    $('#invite-nom-prenom-connected').text(response['carnet'][0]['prenom_nom'])
                    $('#invite-numero_tel-connected').text(response['carnet'][0]['portable'])
                    $('#invite-quartier-address-connected').text(response['carnet'][0]['adresse'])
                    $('#comp-addr-supp-connected').text(response['carnet'][0]['complement'])
                    $('#invite-pays-connected').text(response['carnet'][0]['ville'])
                    $('#invit-code-postal-connected').text(response['carnet'][0]['code_postale'])

                    $('#invite-email-connected-2').text(response['user_email'])
                    $('#invite-nom-prenom-connected-2').text(response['carnet'][0]['prenom_nom'])
                    $('#invite-numero_tel-connected-2').text(response['carnet'][0]['portable'])
                    $('#invite-quartier-address-connected-2').text(response['carnet'][0]['adresse'])
                    $('#comp-addr-supp-connected-2').text(response['carnet'][0]['complement'])
                    $('#invite-pays-connected-2').text(response['carnet'][0]['ville'])
                    $('#invit-code-postal-connected-2').text(response['carnet'][0]['code_postale'])
                    $('#hidden-connected-flag').val('true') // flag de vérification si le user est connecté
                    $('#section-addresse-non-defini').addClass('infos-invite-none')
                    $('#section-addresse-bien-defini').removeClass('infos-invite-none')

                    if ($('.row-expedition-updated').hasClass('box-error-login')) {
                        $('.row-expedition-updated').removeClass('box-error-login')
                    }

                    $('#AjoutAdresseLivraisonAchat').modal('hide')
                }
            })
        }

        function open_save_button () {

            let email_invite1 = $('#email-user-invite');
            let nom_prenom1 = $('#prenom-nom-user-invite');
            let num_invite1 = $('#numero-user-invite');
            let addr_quartier1 = $('#address-quartier-user-invite');
            let comp_addr1 = $('#comp-addre-user-invite');

            // ----------------------------- input values ---------------------------
            let email_invite2 = $('#email-user-invite').val();
            let nom_prenom2 = $('#prenom-nom-user-invite').val();
            let num_invite2 = $('#numero-user-invite').val();
            let addr_quartier2 = $('#address-quartier-user-invite').val();
            let comp_addr2 = $('#comp-addre-user-invite').val();

            let code_poste_invite1 = $('#code-poste-user-invite');
            let nom_entreprise_invite = $('#nom-entreprise-user-invite');
            // pwd-border-error
            if (!$(email_invite1).hasClass('input-error-warning-long') && !$(nom_prenom1).hasClass('input-error-warning') && !$(num_invite1).hasClass('input-error-warning') && !$(addr_quartier1).hasClass('pwd-border-error') && email_invite2.length > 0 && nom_prenom2.length > 0 && num_invite2.length > 0 && addr_quartier2.length > 0) {
                $('#btn_addr_livraison-invite').removeClass('ajout-adress-livrason-disabled')
            }else {
                $('#btn_addr_livraison-invite').addClass('ajout-adress-livrason-disabled')
            }
        }

        // --------------------- email ----------------------------
        $('#email-user-invite').on('blur', function() {
            let email_valeur = $(this).val()
            let isvalid = ValidateEmailInvite(email_valeur)

            if (!isvalid) {
                $('#email-user-invite').addClass('input-error-warning-long')
                console.log('Invalide')
            }else {
                $('#email-user-invite').removeClass('input-error-warning-long')
            }

            if (email_valeur.length == 0) {
                $('#email-user-invite').addClass('input-error-warning-long')
            }
        })

        $('#email-user-invite').on('keyup', function() {
            let email_valeur = $(this).val()
            if (email_valeur.length > 0 && $('#email-user-invite').hasClass('input-error-warning-long')) {
                $('#email-user-invite').removeClass('input-error-warning-long')
            }else if (email_valeur.length == 0) {
                $('#email-user-invite').addClass('input-error-warning-long')
            }

            open_save_button()
        })

        // Accepter seulement les lettres
        function onlyLettersIvite(input) {
            var regex = /[^a-zA-ZÀ-ÿ-._ ]/gi;
            input.value = input.value.replace(regex, "");
        }

        // ------------------------ nom prenom ------------------------------
        $('#prenom-nom-user-invite').on('blur', function() {
            let email_valeur = $(this).val()
            if (email_valeur.length == 0) {
                $('#prenom-nom-user-invite').addClass('input-error-warning')
            }
        })

        $('#prenom-nom-user-invite').on('keyup', function() {
            onlyLettersIvite(this)
            let email_valeur = $(this).val()
            if (email_valeur.length > 0 && $('#prenom-nom-user-invite').hasClass('input-error-warning')) {
                $('#prenom-nom-user-invite').removeClass('input-error-warning')
            }else if (email_valeur.length == 0) {
                $('#prenom-nom-user-invite').addClass('input-error-warning')
            }

            open_save_button()

        })

        // ------------------------------- numero tel -------------------------------------
        $('#numero-user-invite').on('blur', function() {
            let email_valeur = $(this).val()
            if (email_valeur.length == 0) {
                $('#numero-user-invite').addClass('input-error-warning')
            }
        })

        $('#numero-user-invite').on('keyup', function() {
            let email_valeur = $(this).val()
            if (email_valeur.length > 0 && $('#numero-user-invite').hasClass('input-error-warning')) {
                $('#numero-user-invite').removeClass('input-error-warning')
            }else if (email_valeur.length == 0) {
                $('#numero-user-invite').addClass('input-error-warning')
            }

            open_save_button()
        })


        // ---------------------------- addresse quartier -----------------------
        $('#address-quartier-user-invite').on('blur', function() {
            let email_valeur = $(this).val()
            if (email_valeur.length == 0) {
                $('#address-quartier-user-invite').addClass('pwd-border-error')
            }

        })

        $('#address-quartier-user-invite').on('keyup', function() {
            let email_valeur = $(this).val()
            if (email_valeur.length > 0 && $('#address-quartier-user-invite').hasClass('pwd-border-error')) {
                $('#address-quartier-user-invite').removeClass('pwd-border-error')
            }else if (email_valeur.length == 0) {
                $('#address-quartier-user-invite').addClass('pwd-border-error')
            }

            open_save_button()

        })

        // ---------------------- nom entreprise nom-entreprise-user-invite -----------------------
        $('#nom-entreprise-user-invite').on('blur', function() {
            let email_valeur = $(this).val()
            if (email_valeur.length == 0) {
                $('#nom-entreprise-user-invite').addClass('input-error-warning-long')
            }

        })

        $('#nom-entreprise-user-invite').on('keyup', function() {
            let email_valeur = $(this).val()
            if (email_valeur.length > 0 && $('#nom-entreprise-user-invite').hasClass('input-error-warning-long')) {
                $('#nom-entreprise-user-invite').removeClass('input-error-warning-long')
            }else if (email_valeur.length == 0) {
                $('#nom-entreprise-user-invite').addClass('input-error-warning-long')
            }

            open_save_button()

        })

        function editInviteData() {

            let edit_email = $('#invite-email').text()
            let edit_nom_prenom = $('#invite-nom-prenom').text()
            let edit_numero_phone = $('#invite-numero_tel').text()
            let edit_addr_phone = $('#invite-quartier-address').text()
            let edit_code_postal = $('#invit-code-postal').text()
            let comp_addre = $('#comp-addr-supp').text()

            $('#email-user-invite').val(edit_email);
            $('#prenom-nom-user-invite').val(edit_nom_prenom);
            $('#numero-user-invite').val(edit_numero_phone);
            $('#address-quartier-user-invite').val(edit_addr_phone);
            $('#comp-addre-user-invite').val(comp_addre);
            $('#code-poste-user-invite').val(edit_code_postal)
            // --------------------fill all input-----------------
            $('#FormulaitreInvite').modal('show');

        }

        function annulerInviteAddresse() {
            $('#email-user-invite').val("");
            $('#prenom-nom-user-invite').val("");
            $('#numero-user-invite').val("");
            $('#address-quartier-user-invite').val("");
            $('#comp-addre-user-invite').val("");

            $('#code-poste-user-invite').val("");
            $('#nom-entreprise-user-invite').val("");
            $('#FormulaitreInvite').modal('hide');
        }


var marker_achat_process_new_user;
var map_chat_process_new_user;
function initMapAchatProcessNewUser() {

    var myLatLng = {lat: 0.3924100, lng: 9.4535600};

    map_chat_process_new_user = new google.maps.Map(document.getElementById('address-livraison-map-container-id-new-user'), {
        zoom: 15,
        center: myLatLng
    });

    const infoWindow = new google.maps.InfoWindow();

    marker_achat_process_new_user = new google.maps.Marker({
        position: myLatLng,
        map: map_chat_process_new_user,
        draggable: true,
        title: 'Hello World!'
    });

    var geocoder = new google.maps.Geocoder();

    // movement des markers
    marker_achat_process_new_user.addListener("dragend", (event) => {
        // infoWindow.close();
        // infoWindow.setContent(
        // `Pin dropped at: ${event.lat()}, ${event.lng()}`
        // );
        // infoWindow.open(marker.map, marker);
        var updatedLatLng = {
            lat: event.latLng.lat(),
            lng: event.latLng.lng()
        };

        geocoder.geocode({'location': updatedLatLng}, function(results, status) {
            if (status === 'OK') {
                if (results[0]) {
                console.log(results[0].formatted_address);
                $('#ajout-addr-quartier_new_user').val(results[0].formatted_address)
                } else {
                console.log('No results found');
                }
            } else {
                console.log('Geocoder failed due to: ' + status);
            }
        });

    });

    var autocomplete = new google.maps.places.Autocomplete(
        document.getElementById('ajout-addr-quartier_new_user')
    );

    autocomplete.bindTo("bounds", map_chat_process_new_user);

    const infowindow = new google.maps.InfoWindow();
    const infowindowContent = document.getElementById("infowindow-content");

    infowindow.setContent(infowindowContent);

    // Démmarage du choix de la selection
    autocomplete.addListener("place_changed", () => {
        // infowindow.close();
        marker_achat_process_new_user.setVisible(false);

        const place = autocomplete.getPlace();

        if (!place.geometry || !place.geometry.location) {
        return;
        }

        // If the place has a geometry, then present it on a map.
        if (place.geometry.viewport) {
        map_chat_process_new_user.fitBounds(place.geometry.viewport);
        } else {
        map_chat_process_new_user.setCenter(place.geometry.location);
        map_chat_process_new_user.setZoom(15);
        }

        marker_achat_process_new_user.setPosition(place.geometry.location);
        marker_achat_process_new_user.setVisible(true);
        infowindowContent.children["place-name"].textContent = place.name;
        infowindowContent.children["place-address"].textContent =
        place.formatted_address;
        // infowindow.open(map, marker);

    })

    }

    function prendreMesCoordoneesNewUser() {
        $('#location_spiner3-new-user-achat').removeClass('hide')
        if (navigator.geolocation) {
        navigator.geolocation.watchPosition(showPositionBisNewUser);
        } else {
            // x.innerHTML = "Geolocation is not supported by this browser.";
        }
    }

    function showPositionBisNewUser(position) {

        var data_location = position.coords.latitude + ' , ' + position.coords.longitude
        const user_location = { lat: position.coords.latitude, lng: position.coords.longitude };

        
        var geocoder = new google.maps.Geocoder();

            geocoder.geocode({
                location: user_location
            }).then((response) => {
            if(response.results[0]) {
            $('#ajout-addr-quartier_new_user').val(response.results[0].formatted_address)
            }else {
                $('#ajout-addr-quartier_new_user').val(data_location)
            }

        })

        marker_achat_process_new_user.setPosition(user_location)
        map_chat_process_new_user.setCenter(user_location);
        map_chat_process_new_user.setZoom(15);

        $('#location_spiner3-new-user-achat').addClass('hide')

        // $('#ajout-addr-quartier_new_user').val(data_location)

        $('#livraison_addres_latitude_new_user').val(position.coords.latitude)
        $('#livraison_addres_longitude_new_user').val(position.coords.longitude)

    }

    </script>
