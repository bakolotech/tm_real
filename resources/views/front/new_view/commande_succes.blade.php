
<style type="text/css">

    @import url('https://fonts.googleapis.com/css2?family=Gelasio:ital@1&family=Licorice&family=Noto+Sans&family=Roboto:wght@300;400&family=Tajawal:wght@300&display=swap');

    .modal-body-success {
        display: flex;
        flex-direction: column;
        flex-wrap: nowrap;
        justify-content: center;
        align-items: center;
        padding-bottom: 0px;
        height: 219px;
    }

    .modal-dialog-success {
        position: relative;
        top: 70px;
    }

    .modal-success-content {
        box-sizing: border-box;
        height: 332px !important;
        width: 429px !important;
        border-radius: 6px;
        background-color: #FFFFFF;
        box-shadow: 0 5px 15px 0 rgba(0,0,0,0.35);
    }

    .modal-content-success {
        border: 3px solid #00B517 !important;
    }

    .modal-header-success {
        display: flex;
        justify-content: center;
        align-items: center;
    }


    .modal-header-success .rounded-check {
        height: 24px;
        width: 24px;
        outline: none;
        border: 1px solid #00B517;
        border-radius: 50%;
        background-color: #fff;
        justify-content: center;
        align-items: center;
        position: relative;
        left: -3.5px;
        top: -2px;
    }

    .modal-header-success .rounded-check i {
        text-align: center;
        position: relative;
        left: -3.5px;
        top: -2px;
    }

    .modal-header-success h4 {
        color: #00B517 !important;
        font-family: Roboto;
        font-size: 20px;
        font-weight: 500;
        letter-spacing: 0;
        line-height: 22px;
        text-align: center;
        text-transform: uppercase;
    }

    .modal-body-success .msg-retour {
        height: 63px;
        width: 354px;
        color: #191970;
        font-family: Roboto;
        font-size: 18px;
        font-weight: 500;
        letter-spacing: 0;
        line-height: 20px;
        text-align: center;
        margin-bottom: 20px;
    }

    .modal-body-success .coordonne-commande {
        margin-bottom: 0px;
    }

    .modal-body-success .coordonne-commande .auth-text {
        margin-bottom: 0px;
    }

    .modal-footer-success {
        display: flex;
        justify-content: center;
        align-items: center;
        border: none;
    }

    .modal-footer-success .keep-shopping{
        height: 37px;
        width: 204px;
        border-radius: 6px;
        color: #FFFFFF;
        font-family: Roboto;
        font-size: 16px;
        font-weight: 500;
        letter-spacing: 0.35px;
        line-height: 18px;
    }

    .modal-footer-success .show-order {
        box-sizing: border-box;
        height: 37px;
        width: 168px;
        border: 1px solid #1A7EF5;
        border-radius: 6px;
        background-color: #FFFFFF;
        color: #1A7EF5;
        font-family: Roboto;
        font-size: 16px;
        font-weight: 500;
        letter-spacing: 0.35px;
    }

    .fa-check {
        color: #00B517;
    }

    .auth-text label {
        color: #191970;
        font-family: Roboto;
        font-size: 14px;
        font-weight: 500;
        letter-spacing: 1.2px;
        line-height: 16px;
    }

    .center-demande-success {
        top: 47% !important;
        transform: translateY(-50%) !important
    }

    .success-header-text {
        width: 70%;
    }

        .success-icon {
            width: 8%;
            position: relative;
            top: -4px;
        }

        @media only screen and (max-width: 540px) {
            .modal-success-content {
                width: 320px !important;
            }

            .success-header-text {
                width: 74% !important;
            }

            .success-header-text h4 {
                font-size: 16px !important;
            }

            .modal-body-success .msg-retour {
                width: 290px !important;
                font-size: 14px !important;
            }

            .modal-footer-success .show-order {
                width: 108px !important;
                font-size: 12px !important;
                left: 0px !important;
            }

            .modal-footer-success .keep-shopping {
                width: 150px !important;
                font-size: 11px !important;
            }

            .modal-footer-success {
                column-gap: 15px;
            }


        }

	</style>

<div class="main_panier_v2 input-none-panier-v2" id="commandeSuccessModal">
    <div class="modal-success-content">

    <div class="modal-error-header modal-header-success">
        <div class="success-icon">
            <img src="/assets/images/empty-check-success.svg" alt="" style="position: relative;">
        </div>
        <div class="success-header-text">
            <h4 style="top: 7px">Merci de votre commande</h4>
        </div>
    </div>

    <div class="modal-body-success">
        <p class="msg-retour">
            Votre commande a bien été prise en compte, la confirmation sera envoyée à votre adresse e-mail.
        </p>

        <div class="coordonne-commande">

            <p class="auth-text"><i class="fa fa-check" style="font-size: 12px"></i>
                <label>E-Mail:</label> <span id="commande-user-email">exemple@exemple.com</span>
            </p>

            <p class="auth-text"><i class="fa fa-check" style="font-size: 12px" ></i>
                <label>N° de commande:</label> <span id="commande-user-numero">999999999</span>
            </p>

            <p class="auth-text"><i class="fa fa-check" style="font-size: 12px" ></i>
                <label>Date de livraison:</label> <span id="commande-user-date">JJ/MM/AAAA</span>
            </p>

        </div>

        </div>

        <div class="modal-footer_bis modal-footer-success" style="border: none; position: relative; ">
            <button type="button" class="show-order" onclick="keep_shopping()" style="position: relative; left: -12px">Mes commandes</button>
            <button type="button" class="btn btn-primary keep-shopping" onclick="location.reload()">Continuer les courses</button>
            </div>


        </div>
    </div>

<script>

function keep_shopping() {

    let succes_info = {
        status_commande: 'ok'
    }

    window.localStorage.setItem('commande_succes', JSON.stringify(succes_info));

    location.reload()

}

function keep_shopping2() {

$('#commandeSuccessModal').modal('hide')

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
    client_commande += '<tr onmouseenter="checkOver('+id_commande+')" onmouseleave="checkOver2('+id_commande+')"   class="commande-rows" data-commade="'+response[index].id+'" style="background-color: redd" >'

    client_commande += `
        <td style="width: 50px">
            <span id="images_temps-${id_commande}"><img src="/assets/images2/Fermes2.svg" alt="" /></span>
            <span id="images_temps1-${id_commande}" class="hide-commande-tr"><img src="/assets/images2/Ouvert.svg" alt="" /></span>
        </d>
    `

    client_commande += '<td class="contenu1 td-section" >'+response[index].ref_commande.toUpperCase()+'</td><td class="contenu4 td-section" style="width: 56px">'+response[index].quantite_total+'</td><td class="contenu5 td-section" style="width: 112px;">'+response[index].totaf_facturation+' Fcfa</td>'

    client_commande += '<td class="td-section" style="width: 56px;"> <img src="'+mode_pay+'"></td><td class="commande-danger td-section" >En cours de traitement</td><td class="contenu2 td-section" style="width:101px">'+response[index].date_commande+'</td><td class="contenu2 td-section" style="width: 51px"><span class="facture-pdf">PDF</span></td>'

    client_commande += '<td class="contenu2 td-section" onmouseout="checkOver3('+id_commande+')" style="width: 147px;"><button onclick=nouvelCommande("'+id_commande+'") class="re-commander">Nvl. Commande</button></td></tr>'

    client_commande += '<tr class="hide-commande-tr default-tr-close-selector" id="detail-commande-'+response[index].id+'"><td colspan="9"><div class="commande-sub-content"><div class="commande-sub-content-adress"><article class="infocliff"><div class="textenteteinfo" style="width: 187px"><p class="penteteinfo">Facturé à :</p></div><div class="group3 zone-icons-grouppe">'

    client_commande += '<img src="/assets/images/icones-vendeurs2/user copy 2.svg" class="addr-icons"><img src="/assets/images/icones-vendeurs2/placeholder copy 2.svg" class="addr-icons"><img src="/assets/images/icones-vendeurs2/telephone.svg" class="addr-icons"></div>'

    client_commande += '<div style="margin-top:-102px; margin-left: 46px"><p class="textcolora4-bis"  style="margin-top:14px;">'+response[index].address_livraison.prenom_nom+'</p><p class="textcolora4-bis"  style="margin-top:12px;">'+response[index].address_livraison.adresse+'</p><p class="textcolora4-bis"  style="margin-top:12px;">'+response[index].address_livraison.portable+'</p></div></article>'

    client_commande += '<article class="infoexpe"><div class="textenteteinfo" style="width: 187px"><p class="penteteinfo">Livré à :</p></div><div class="group3 zone-icons-grouppe"><img src="/assets/images/icones-vendeurs2/user copy 2.svg" class="addr-icons"><img src="/assets/images/icones-vendeurs2/placeholder copy 2.svg" class="addr-icons"><img src="/assets/images/icones-vendeurs2/telephone.svg" class="addr-icons"></div>'

    client_commande += '<div style="margin-top:-102px; margin-left: 46px"><p class="textcolora4-bis"  style="margin-top:14px;">'+response[index].address_livraison.prenom_nom+'</p><p class="textcolora4-bis"  style="margin-top:12px;">'+response[index].address_livraison.adresse+'</p><p class="textcolora4-bis"  style="margin-top:12px;">'+response[index].address_livraison.portable+'</p></div></article></div>'

    client_commande += `<div class="commande-sub-content-details">
        <div class="commande-client-recap-tile"><span class="commande-resume-header">RÉSUMÉ DE LA COMMANDE</span></div>`

    client_commande += `<table id="commande-tablebis" style=" width: 640px !important; left: 0px !important; margin-top: 0px">
    <thead>
        <tr class="commande-resume-table-header"><td class="tab-comm-element" style="width: 110px">Référence</td><td class="tab-comm-element" style="width:347px; text-align:left">Article(s)</td><td class="tab-comm-element">Quantité</td><td class="tab-comm-element">Prix unitaire</td>
        </tr>
    </thead>
    </table>
    `

    client_commande += `<div class="children-sub-table" style="width:640px !important"><table><tbody id="tab-client-commande-sub-content-${id_commande}">`

    if (detail_commant_produit.length > 0) {

        for (let j = 0; j < detail_commant_produit.length; j++) {
            client_commande += '<tr><td class="contenu1 td-section" style="width: 110px">'+detail_commant_produit[j]['ref_produit']+'</td><td class="contenu4 td-section" style="width:347px;"><article class="commande-information-prod"><aside class="boxcontenu2-bis" style="margin-right: 10px"><img src="/'+detail_commant_produit[j]['image']+'" alt="" style="height: 34px;" /></aside><p class="contenu2" style="text-align:left">'+detail_commant_produit[j]['libelle']+'</p></article></td><td class="contenu5 td-section" style="width: 72px">'+detail_commant_produit[j]['quantite']+'</td><td class="td-section"> '+detail_commant_produit[j]['prix']+' Fcfa </td></tr>'
        }

    }

    client_commande += '</tbody></div></table></div></div></td></tr>'

    $('#tab-client-commande').append(client_commande)

    }

    }


    }
})

    $('#defaul-menu-courant-user').addClass('applied-width')
    $('#commande-options-zone').removeClass('hide-commande-tr')
    $(".mydata-menu-profil").removeClass('active-menu-left')
    $(".donnees-menu-profil").hide();
    $(".photo-profil-classe").hide();
    $('#userProfilModal').modal('show')
    $('#mes-commandes').show()

}
    </script>
