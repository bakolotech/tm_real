<style>
    .div-prinipal-profil-mes-mode-paiement{
        box-sizing: border-box;
        height: 60px;
        width: 825px;
        border: 1px solid #D8D8D8;
        border-radius: 6px 6px 0 0;
        background-color: #FFFFFF;
        border: none;
        border-bottom: 1px solid rgb(216, 216, 216);
        padding-right: 30.5px;
    }
    .entete-adresse-1{
        height: 56px;
        width: 511px;
        color: #4A4A4A;
        font-family: Roboto;
        font-size: 14px;
        font-weight: 300;
        letter-spacing: -0.48px;
        line-height: 16px;
        margin-top: 10px;
    }

    .button-entete-adresse{
        height: 40px;
        width: 277px;
        border-radius: 6px;
        background-color: #1A7EF5;
        margin-top: 18px;
        padding-top: 3px;
        border: none;
    }

    .button-entete-adresse:hover {
        color: #FFFFFF;
        background-color: #146FDA;
    }


    .nouvelle-adresse-text-profil-user{
        height: 20px;
        width: 178px;
        color: #FFFFFF;
        font-family: Roboto;
        margin-top: 10px;
        font-size: 14px;
        font-weight: 500;
        letter-spacing: -0.34px;
        line-height: 18px;
    }
    .text-mes-mode-paiement-profil{
        height: 24px;
        width: 511px;
        color: #191970;
        font-family: Roboto;
        font-size: 20px;
        font-weight: 500;
        letter-spacing: -0.48px;
        line-height: 22px;
        margin-top: 10px;
        margin-left: 30px;
    }

    .text-mes-mode-paiement-profil-paragraph{
        height: 32px;
        width: 100%;
        color: #4A4A4A;
        font-family: Roboto;
        font-size: 14px;
        font-weight: 300;
        letter-spacing: -0.48px;
        line-height: 16px;
        margin-left: 30px;
    }

    .img1-carnet-adresse{
        height: 322px;
        width: 322px;
        margin: auto;
        margin-top: 38px;

    }
    .vous-navez-pas-dad {
        height: 15px;
        width: 226px;
        color: #4A4A4A;
        font-family: Roboto;
        font-size: 13px;
        font-weight: 500;
        letter-spacing: -0.31px;
        line-height: 14px;
        margin: auto;
        margin-top: 91px;
    }
</style>

<div id="mes-modes-de-paiemen" class="donnees-menu-profil" style="display: none">

    <!-- <div class="d-flex div-prinipal-profil-mes-mode-paiement" style="margin: auto">
        <div>
            <div class="text-mes-mode-paiement-profil">
                <span >Gérer les options de paiement</span>
            </div>
            <div class="text-mes-mode-paiement-profil-paragraph">
                <p>
                    Voici un aperçu des méthodes et paramètres de paiement enegistrés pour votre compte TOULE MARKET
                </p>
            </div>
        </div>
    </div> -->
    <div class="d-flex div-prinipal-profil-mes-mode-paiement" style="margin: auto">
        <div style="padding-top: 5px">
            <div class="text-gerer-carnet-adresse" style="position:relative; top:-5px">
                <span >Gérer les options de paiement</span>
            </div>
            <div class="text-carnet-adresse-profil-paragraph" style="position:relative; top:-5px">
                <p >Sauvegarder vos modes de paiement pour votre compte TOULÈ Market.</p>
            </div>
        </div>

        {{-- <div style="width: 50%">
            <button onClick="show_add_mode_payement()" class="my-data-adresse button-entete-adresse" style="position:relative; top:-10px">
                <span class="nouvelle-adresse-text-profil-user">
                    <img style="margin-right: 15px;" src="{{  asset('assets/images/plus-arnet-adresse-profil.svg') }}">
                    Ajouter un nouveau mode de paiement</span>
            </button>
        </div> --}}
        {{-- <button style="height:60px; width: 200px" onclick="updateProfilUserTemp()">Up</button> --}}

        <div style="width: 50%">
            <button style="margin-top: 9px" onClick="show_add_mode_payement()" class="my-data-adresse button-entete-adresse ">
                <span class="nouvelle-adresse-text-profil-user">
                    <img  src="{{  asset('assets/images/plus-arnet-adresse-profil.svg') }}">
                    Ajouter un nouveau mode de paiement</span>
            </button>
        </div>

    </div>
    @include('front.app-module.user-profil.modals.components.generale.liste-carte-sauvegarde')
    @include('front.app-module.user-profil.modals.components.generale.add-mode-payement')
    @include('front.app-module.user-profil.modals.components.generale.add-mode-payement-carte-credit')
    @include('front.app-module.user-profil.modals.components.generale.add-mode-payement-selection-addresse')
    @include('front.app-module.user-profil.modals.components.generale.add-mode-payement-adresse-livraison')

</div>

<script>

    function show_add_mode_payement(){
        $('#modePayementProfil').modal('show')
        $('#modePayementProfil').css('padding-left','250px');

    }

    function updateProfilUserTemp() {
    // console.log('Here is data')
    $.ajax({
    type: 'POST',
    url: '/update_temp_user',
    data: {commmand_data: 2},
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    },
    success: function(data_user) {
        console.log('Data is updated', data_user)
    // console.log('Here is the data notified', data_commande_notified)
    }

    })
}


</script>




