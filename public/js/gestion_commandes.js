function validerCommandeProdui(id) {
    console.log('Le tableau avant est => ', commandes_product)

    $('#detail-commande-hovered-layer-'+id).removeClass('hide-commande-tr')
    var ref_commande = $('#commanade_ref_validation').val();
    var type_update = 2;

    // Passage dans le traitement en cours
    $.ajax({
    type: 'POST',
    url: '/update_commade_traitement_statut',
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    },
    data: {ref_commande: ref_commande, type_update: type_update},
    success: function(response_data) {

    }
    })

}

// -------------------------------------- // ---------------------------------
// details historique de commande
function showMarchandCommandDetailsHistotique(id, ref_commande) {

    $('#commanade_ref_validation').val(ref_commande)
    $('#commanade_ref_validation-id').val(id)

    $.ajax({
    type: 'GET',
    url: '/get_marchand_commande_details',
    data: {id: id},
    success: function(data_response) {

    console.log('Your data response => ', data_response)

    $('#clonned-col1-h').empty()
    $('#clonned-col2-h').empty()
    $('#clonned-col3-h').empty()
    $('#clonned-col4-h').empty()
    $('#clonned-col5-h').empty()
    $('#clonned-col6-h').empty()
    $('#clonned-col7-h').empty()
    $('#clonned-col8-h').empty()
    $('.marchand-commande-client-address-h').empty();

    var clonned_commande = data_response[2]
    var commande_clonned_info = data_response[3][0]
    var tab_commande_clonned = []
    tab_commande_clonned += '<div style="display: flex">'
    var left_val = 0;
    for (let pc = 0; pc < clonned_commande.length; pc++) {
        left_val += 10;
        tab_commande_clonned += '<div class="boxcontenu2" style="background-color: #fff; border: none; position:relative; left: -'+left_val+'px; margin-left: 0px"><img src="'+clonned_commande[pc].image+'" style="max-height:45px" /></div>'
    }
    tab_commande_clonned += '</div>'

    $('#clonned-col1-h').append(commande_clonned_info.ref_commande)
    $('#clonned-col2-h').append(tab_commande_clonned)
    $('#clonned-col3-h').append(commande_clonned_info.nom+' '+commande_clonned_info.email)
    $('#clonned-col4-h').append(commande_clonned_info.nombre_article)
    $('#clonned-col5-h').append(commande_clonned_info.totaf_facturation)

    if (commande_clonned_info.mode_payement == 'AirtelMoney') {
        var mode_pay = '/assets/images/icons/AirtelMoney.svg'
        var img_pay = '<img src="'+mode_pay+'">'
        $('#clonned-col6-h').append(img_pay)
    }else if (commande_clonned_info.mode_payement == 'MoovMoney') {
        var mode_pay = '/assets/images/icones-vendeurs2/Moovmoney.svg'
        var img_pay = '<img src="'+mode_pay+'">'
        $('#clonned-col6-h').append(img_pay)
    }

    $('#clonned-col7-h').append(commande_clonned_info.status_commande)
    $('#clonned-col8-h').append(commande_clonned_info.date_commande)

    // traitement de status de la commande
    if (commande_clonned_info.status_commande == "En cours de traitement") {
        $('#commande-en-traitement-statut').addClass('field-none')
        $('#commande-expedier-statut').addClass('field-none')
    }else if(commande_clonned_info.status_commande == "Commande Expediée") {
        $('#commande-en-traitement-statut-running').addClass('field-none')
        $('#commande-en-traitement-statut').removeClass('field-none')
        $('#commande-expedier-statut').removeClass('field-none')
        $('#commande-encours-livraison-running').removeClass('field-none')
    }

    var response = data_response[0];
    var address_livraison = data_response[1][0]
    var client_livraison = [];

    client_livraison += '<article class="infoexpe" style="margin-top: 0px"><div class="textenteteinfo" style="width: 187px"><p class="penteteinfo">Facturé à :</p></div><div class="group3 zone-icons-grouppe" style="padding-left: 6px"><img src="/assets/images/icones-vendeurs2/user copy 2.svg" class="addr-icons"><img src="/assets/images/icones-vendeurs2/placeholder copy 2.svg" class="addr-icons"><img src="/assets/images/icones-vendeurs2/telephone.svg" class="addr-icons"></div>'

    client_livraison += '<div style="margin-top:-102px; margin-left: 46px"><p class="textcolora4-bis"  style="margin-top:14px;">'+address_livraison.prenom_nom+'</p><p class="textcolora4-bis"  style="margin-top:12px;">'+address_livraison.adresse+'</p><p class="textcolora4-bis"  style="margin-top:12px;">'+address_livraison.portable+'</p></div></article>'

    client_livraison += '<article class="infoexpe"><div class="textenteteinfo" style="width: 187px"><p class="penteteinfo">Livré à :</p></div><div class="group3 zone-icons-grouppe" style="padding-left: 6px"><img src="/assets/images/icones-vendeurs2/user copy 2.svg" class="addr-icons"><img src="/assets/images/icones-vendeurs2/placeholder copy 2.svg" class="addr-icons"><img src="/assets/images/icones-vendeurs2/telephone.svg" class="addr-icons"></div>'

    client_livraison += '<div style="margin-top:-102px; margin-left: 46px"><p class="textcolora4-bis"  style="margin-top:14px;">'+address_livraison.prenom_nom+'</p><p class="textcolora4-bis"  style="margin-top:12px;">'+address_livraison.adresse+'</p><p class="textcolora4-bis"  style="margin-top:12px;">'+address_livraison.portable+'</p></div></article></div>'

    $('.marchand-commande-client-address-h').append(client_livraison)

    commandes_product = [];

    $('#marchand-commandes-details-historique').empty()

    console.log('Check response =>', response)

    if (response.length > 0) {

        var detail_commant_produit = response;
        var client_commande = [];
        for (let j = 0; j < detail_commant_produit.length; j++) {

        var id_produit_commande = detail_commant_produit[j]['idProduitCommande']
        commandes_product.push(id_produit_commande)

        var button_options1 = '<button class="btn-produit_rupture" onclick="validateProduitIndisponible('+detail_commant_produit[j]['idProduitCommande']+')">Produit en rupture</button>'
        var button_options2 = '<button class="btn-produit_disponible" onclick="validerProduitDisponible('+detail_commant_produit[j]['idProduitCommande']+')">Produit disponible</button>'

        client_commande += `
        <tr style="position: absolute" class="hide-commande-trh" onmouseleave="checkOver2(${id_produit_commande})"  id="detail-commande-hovered-layer-${id_produit_commande}" onclick="showSubcontent(${id_produit_commande})">
            <td colspan="9" style="height: inherit; border: transparent">
                <div class="detail-commande-hover-zone-historique" style="width: 701px">
    </div></div>
            </td>
        </tr>
        `

        client_commande += '<tr>'

        console.log('La valeur de inStock est => ', detail_commant_produit[j]['inStock'])
        if (detail_commant_produit[j]['inStock'] == 'oui') {
            client_commande += '<td style="width: 25px"> <input type="checkbox" class="checkcommande form-check-input" checked  onclick="validerCommandeProdui('+id_produit_commande+')"></td>'
        }else {
            client_commande += '<td style="width: 25px"> <input type="checkbox" class="checkcommande form-check-input"  onclick="validerCommandeProdui('+id_produit_commande+')"></td>'
        }



        client_commande += '<td class="contenu1 td-section" style="width: 110px">'+detail_commant_produit[j]['ref_produit']+'</td>'

        client_commande += '<td class="contenu4 td-section" style="width:347px;"><article class="commande-information-prod"><aside class="boxcontenu2-bis" style="margin-right: 10px"><img src="/'+detail_commant_produit[j]['image']+'" alt="" style="height: 34px;" /></aside><p class="contenu2d" style="text-align:left">'+detail_commant_produit[j]['libelle']+'</p></article></td>'

        client_commande += '<td class="contenu5 td-section" style="width: 72px">'+detail_commant_produit[j]['qte_commandee']+'</td>'

        client_commande += '<td class="td-section" style="width: 112px"> '+detail_commant_produit[j]['prix']+' Fcfa </td>'

        var prix_total = detail_commant_produit[j]['prix'] * detail_commant_produit[j]['qte_commandee']

        client_commande += '<td class="td-section" style="width: 112px"> '+prix_total+' Fcfa </td></tr>'

        }

        // console.log('Votre tableau est bien là:', client_commande)
        $('#detail-commande-marchant-historique').removeClass('field-none')

        $('#marchand-commandes-details-historique').append(client_commande)

    }

    }
    })
}

// ------------------------------------- // ----------------------------------------
