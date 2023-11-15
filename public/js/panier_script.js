// paul js

function voir_panier_poppop() {

    $('#myModal').modal('hide');

    if ($('#nbr_panier').text() == 0) {
        const element = document.getElementById('mon_panier');
        element.classList.toggle('panier_show')
    } else {
    //
    $.ajax({

    type: 'GET',
    url: '/panier/afficher/',
    data: '',
    cache: false,
    success: function(result) {

    let default_order_price = 20000;
    var sous_total = 0;
    var nombre_total = 0;
    $('#article_du_panier0').empty()
    let produit_object = [];
    let tab_expedition = [];
    // for (let i = 0; i < result.length; i++) {
    for (var i = result.length - 1; i >= 0; i--) {
    let tab_expedition2 = result[i][2]

    if (tab_expedition2.length > 0) {
        tab_expedition.push(tab_expedition2[0].prix)
    }

    produit_object = '<div class="customu-popup paniersuppp mystyle" id="pop_'+i+'">';
    produit_object += '<div class="container-supp custom-commande-del" id="popup-close-body"><div><p class="popu-del-produit">Supprimer l’article du panier ?</p></div>'

    produit_object += '<div style="display: flex;  column-gap: 14px"><button class="supp-oui" onclick=supprimer_produit("'+i+'")>Oui</button><button class="supp-non" onclick="closePopup('+i+')">Non</button></div></div></div><div class="box-container" id="article_'+result[i].id+'" style="display: flex; flex-direction:column; justify-content:center; align-items:center; row-gap:30px"><div style="display: flex; flex-direction: column"><div class="box-elements"><div class="row" style="margin: 0%; padding: 0%; position: relative; margin-bottom: 10px;">'

    // produit_object += '<div class="img-layout-1"><img class="img-layout-1 no-padding" src="/'+result[i].image+'" alt="" id="article_image" style="height: auto"></div> <div class="text-layout" id="elemnt-test"><span class="text-level-1" style="margin-bottom: 11.26px;" id="article_nom">'+result[i].libelle+'</span><span class="text-level-2" style="margin-bottom: 7px; " id="article_ref">Ref. '+result[i].ref_produit+'</span><span class="text-level-3" style="font-size: 16px !important;" id="article_prix_unit">'+result[i].prix+" Fcfa"+'</span><input type="hidden" id="article_id" name="" value="'+result[i].id+'"></div>'

    if (result[i].id_rayon == 27) {
        produit_object += '<div class="img-layout-1" style="padding-right: 0px"><div class="center-panier-img"><img class="no-padding panier-image-long" src="/'+result[i].image+'" alt="" id="article_image-'+result[i].id+'" ></div></div> <div class="text-layout" id="elemnt-test"><span class="text-level-1" style="margin-bottom: 11.26px;" id="article_nom">'+result[i].libelle+'</span><span class="text-level-2" style="margin-bottom: 7px; " id="article_ref">Ref. '+result[i].ref_produit+'</span><span class="text-level-3" style="font-size: 16px !important;" id="article_prix_unit">'+result[i].prix+" Fcfa"+'</span><input type="hidden" id="article_id" name="" value="'+result[i].id+'"></div>'
    }else if (result[i].id_rayon == 25) {
        produit_object += '<div class="img-layout-1" style="padding-right: 0px"><div class="center-panier-img"><img class="no-padding panier-image-large" src="/'+result[i].image+'" alt="" id="article_image-'+result[i].id+'" ></div></div> <div class="text-layout" id="elemnt-test"><span class="text-level-1" style="margin-bottom: 11.26px;" id="article_nom">'+result[i].libelle+'</span><span class="text-level-2" style="margin-bottom: 7px; " id="article_ref">Ref. '+result[i].ref_produit+'</span><span class="text-level-3" style="font-size: 16px !important;" id="article_prix_unit">'+result[i].prix+" Fcfa"+'</span><input type="hidden" id="article_id" name="" value="'+result[i].id+'"></div>'
    }else {
        produit_object += '<div class="img-layout-1" style="padding-right: 0px"><div class="center-panier-img"><img class="no-padding panier-image-large" src="/'+result[i].image+'" alt="" id="article_image-'+result[i].id+'" ></div></div> <div class="text-layout" id="elemnt-test"><span class="text-level-1" style="margin-bottom: 11.26px;" id="article_nom">'+result[i].libelle+'</span><span class="text-level-2" style="margin-bottom: 7px; " id="article_ref">Ref. '+result[i].ref_produit+'</span><span class="text-level-3" style="font-size: 16px !important;" id="article_prix_unit">'+result[i].prix+" Fcfa"+'</span><input type="hidden" id="article_id" name="" value="'+result[i].id+'"></div>'
    }

    produit_object += '<div class="button-layout"><button onclick="confirmationSuppression('+i+')" class="button-close" style="margin-bottom: 14px;"><img class="corbeil-filter" src="/assets/images/Corbeille-grise-base.svg" alt=""></button><button class="span-button-editf button-close" onclick="modifier_produit('+i+')"><img class="partager-svg" src="/assets/images/tm_edit-off.svg" alt=""/></button></div></div><div class="line-separator"></div><div class="row" style="margin: 0%; padding: 0%; position: relative; margin-bottom: 5px;"><div class="row article-new" style="margin-bottom: 5px;">'

    produit_object += '<div class="col col1" style="display: flex; justify-content: center; align-items: center;"><span id="article_total"> '+result[i]['0']+" article(s)"+'</span></div><span class="separateur-1"></span><div class="col col2" style="display: flex; justify-content: center; align-items: center;"><span id="article_prix_total">'+result[i].prix*result[i]['0']+" Fcfa"+'</span></div></div><div class="row expedition-info" style="display: flex; justify-content: center; align-items: center;"><span>Expédition en 45 min</span></div></div><div class="line-separator1"></div>'

    produit_object += '<div class="rowd product-caracteristique" style="display: flex; justify-content: center; align-items: center;">'

    for (let caracteristique_item in result[i][1] ) {
        produit_object += '<label class="custom-span"><span>'+caracteristique_item+'</span><button class="infos-val-caracteristique" > '+result[i][1][caracteristique_item]+'</button></label>'
    }

    produit_object += '</div></div></div></div>'

    $('#article_du_panier0').append(produit_object)

    sous_total += result[i].prix*result[i]['0']
    nombre_total += parseInt(result[i]['0'])
    $('#sous_total').text(sous_total.toLocaleString()+" Fcfa")
    $('#total_tous').text(sous_total.toLocaleString()+" Fcfa")
    }

    if (tab_expedition.length > 0) {

    let maximum = -Infinity;
    let minimum = Infinity;

    for(let number of tab_expedition) {
        if(number > maximum)
        maximum = number;

        if(number < minimum)
        minimum = number
    }

    $('#montant_expedition_panier').text(maximum+ ' Fcfa')
    $('#panier-orange-info').addClass('new_produit') // retirer l'infos gratuit
    $('#panier-success-info').removeClass('new_produit') // ajout de l'infos livraison payant

    if (sous_total > 20000) {
        maximum  = 0;
    }

    let montant_total = Number(maximum) + Number(sous_total)
    let montant_restant_livraison_gratuite = default_order_price - montant_total;

    $('#total_tous').text(montant_total+" Fcfa") // montant total du panier
    $('#montant_restant_livraison_gratuite').text(montant_restant_livraison_gratuite)

    if (montant_restant_livraison_gratuite == 0 || montant_restant_livraison_gratuite < 0) {
        default_order_price = 0
        $('#panier-orange-info').removeClass('new_produit') // ajouter l'infos gratuit
        $('#panier-success-info').addClass('new_produit') // retrait de l'infos livraison payant
        $('#montant_expedition_panier').text('Gratuit')
    }


    }else{
        $('#montant_expedition_panier').text('Gratuit')
        $('#panier-orange-info').removeClass('new_produit') // ajouter l'infos gratuit
        $('#panier-success-info').addClass('new_produit') // retrait de l'infos livraison payant
        let montant_total = Number(sous_total) + 0;
        $('#total_tous').text(montant_total+" Fcfa") // montant total du panier
    }
    const element = document.getElementById('main-element');
    element.classList.toggle('panier_show')
    $('#nombre_total').text(nombre_total);

    $("#userProfilModal").removeClass("in");
    $(".modal-backdrop").remove();
    $("#userProfilModal").hide();
    $("#userProfilModal").modal('hide')

    },

    error: function(error) {
        console.log('Erreur de la requette')
    }

    });
    //
    }
    }

    function supprimer_produit(id){

        $.ajax({
        type: 'GET',
        url: '/panier/supprimer/',
        data: { id: id },
        cache: false,
        success: function(result) {
        console.log('retour suppression',result)
        let default_order_price = 20000;
        if (result == 10) {

        if ($('#nbr_panier').attr('class') != '') {
            $('#nbr_panier').removeClass("menu-item-counter");
            $('#nbr_panier').removeClass("text-center");
            $('#nbr_panier').empty();
        $('#nbr_panier').empty();
        }

        if ($('#nbr_panier2').attr('class') != '') {
            $('#nbr_panier2').removeClass("panier-counter");
            $('#nbr_panier2').removeClass("text-center");
            $('#nbr_panier2').text("")
        }

        const element2 = document.getElementById('main-element');
        element2.classList.remove('panier_show');
        const element1 = document.getElementById('mon_panier');
        element1.classList.add('panier_show');

        } else {

        var sous_total = 0;
        var nombre_total = 0;
        let produit_object = [];

        $('#article_du_panier0').empty()
        let tab_expedition = [];

        for (let i = 0; i < result.length; i++) {

        let tab_expedition2 = result[i][2]

        if (tab_expedition2.length > 0) {
            tab_expedition.push(tab_expedition2[0].prix)
        }

        produit_object = '<div class="customu-popup paniersuppp mystyle" id="pop_'+i+'">';
        produit_object += '<div class="container-supp custom-commande-del" id="popup-close-body"><div><p class="popu-del-produit">Supprimer l’article du panier ?</p></div>'

        produit_object += '<div style="display: flex;  column-gap: 14px"><button class="supp-oui" onclick=supprimer_produit("'+i+'")>Oui</button><button class="supp-non" onclick="closePopup('+i+')">Non</button></div></div></div><div class="box-container" id="article_'+result[i].id+'" style="display: flex; flex-direction:column; justify-content:center; align-items:center; row-gap:30px"><div style="display: flex; flex-direction: column"><div class="box-elements"><div class="row" style="margin: 0%; padding: 0%; position: relative; margin-bottom: 10px;">'

        // produit_object += '<div class="img-layout-1"><img class="img-layout-1 no-padding" src="/'+result[i].image+'" alt="" id="article_image" style="height: auto"></div> <div class="text-layout" id="elemnt-test"><span class="text-level-1" style="margin-bottom: 11.26px;" id="article_nom">'+result[i].libelle+'</span><span class="text-level-2" style="margin-bottom: 7px; " id="article_ref">Ref. '+result[i].ref_produit+'</span><span class="text-level-3" style="font-size: 16px !important;" id="article_prix_unit">'+result[i].prix+" Fcfa"+'</span><input type="hidden" id="article_id" name="" value="'+result[i].id+'"></div>'
        if (result[i].id_rayon == 27) {
            produit_object += '<div class="img-layout-1" style="padding-right: 0px"><div class="center-panier-img"><img class="no-padding panier-image-long" src="/'+result[i].image+'" alt="" id="article_image-'+result[i].id+'" ></div></div> <div class="text-layout" id="elemnt-test"><span class="text-level-1" style="margin-bottom: 11.26px;" id="article_nom">'+result[i].libelle+'</span><span class="text-level-2" style="margin-bottom: 7px; " id="article_ref">Ref. '+result[i].ref_produit+'</span><span class="text-level-3" style="font-size: 16px !important;" id="article_prix_unit">'+result[i].prix+" Fcfa"+'</span><input type="hidden" id="article_id" name="" value="'+result[i].id+'"></div>'
        }else if (result[i].id_rayon == 25) {
            produit_object += '<div class="img-layout-1" style="padding-right: 0px"><div class="center-panier-img"><img class="no-padding panier-image-large" src="/'+result[i].image+'" alt="" id="article_image-'+result[i].id+'" ></div></div> <div class="text-layout" id="elemnt-test"><span class="text-level-1" style="margin-bottom: 11.26px;" id="article_nom">'+result[i].libelle+'</span><span class="text-level-2" style="margin-bottom: 7px; " id="article_ref">Ref. '+result[i].ref_produit+'</span><span class="text-level-3" style="font-size: 16px !important;" id="article_prix_unit">'+result[i].prix+" Fcfa"+'</span><input type="hidden" id="article_id" name="" value="'+result[i].id+'"></div>'
        }else {
            produit_object += '<div class="img-layout-1" style="padding-right: 0px"><div class="center-panier-img"><img class="no-padding panier-image-large" src="/'+result[i].image+'" alt="" id="article_image-'+result[i].id+'" ></div></div> <div class="text-layout" id="elemnt-test"><span class="text-level-1" style="margin-bottom: 11.26px;" id="article_nom">'+result[i].libelle+'</span><span class="text-level-2" style="margin-bottom: 7px; " id="article_ref">Ref. '+result[i].ref_produit+'</span><span class="text-level-3" style="font-size: 16px !important;" id="article_prix_unit">'+result[i].prix+" Fcfa"+'</span><input type="hidden" id="article_id" name="" value="'+result[i].id+'"></div>'
        }

        // TO CHANGE SECTION
        produit_object += '<div class="button-layout"><button onclick="confirmationSuppression('+i+')" class="button-close" style="margin-bottom: 14px;"><img class="corbeil-filter" src="/assets/images/Corbeille-grise-base.svg" alt=""></button><button class="span-button-editf button-close" onclick="modifier_produit('+i+')"><img class="partager-svg" src="/assets/images/tm_edit-off.svg" alt=""/></button></div></div><div class="line-separator"></div><div class="row" style="margin: 0%; padding: 0%; position: relative; margin-bottom: 5px;"><div class="row article-new" style="margin-bottom: 5px;">'

        produit_object += '<div class="col col1" style="display: flex; justify-content: center; align-items: center;"><span id="article_total"> '+result[i]['0']+" article(s)"+'</span></div><span class="separateur-1"></span><div class="col col2" style="display: flex; justify-content: center; align-items: center;"><span id="article_prix_total">'+result[i].prix*result[i]['0']+" Fcfa"+'</span></div></div><div class="row expedition-info" style="display: flex; justify-content: center; align-items: center;"><span>Expédition en 45 min</span></div></div><div class="line-separator1"></div>'

        produit_object += '<div class="rowd product-caracteristique" style="display: flex; justify-content: center; align-items: center;">'

        for (let caracteristique_item in result[i][1] ) {
            produit_object += '<label class="custom-span"><span>'+caracteristique_item+'</span><button class="infos-val-caracteristique" > '+result[i][1][caracteristique_item]+'</button></label>'
        }

        produit_object += '</div></div></div></div>'

        $('#article_du_panier0').append(produit_object)

        nombre_total += parseInt(result[i]['0']);
        sous_total += result[i].prix*result[i]['0']

        if (tab_expedition.length > 0) {

        let maximum = -Infinity;
        let minimum = Infinity;

        for(let number of tab_expedition) {
            if(number > maximum)
            maximum = number;

            if(number < minimum)
            minimum = number
        }

        $('#montant_expedition_panier').text(maximum+ ' Fcfa')
        $('#panier-orange-info').addClass('new_produit') // retirer l'infos gratuit
        $('#panier-success-info').removeClass('new_produit') // ajout de l'infos livraison payant
        let montant_total = Number(maximum) + Number(sous_total)
        $('#total_tous').text(montant_total+" Fcfa") // montant total du panier

        let montant_restant_livraison_gratuite = default_order_price - montant_total;

        $('#total_tous').text(montant_total+" Fcfa") // montant total du panier
        $('#montant_restant_livraison_gratuite').text(montant_restant_livraison_gratuite)

        if (montant_restant_livraison_gratuite == 0 || montant_restant_livraison_gratuite < 0) {
            default_order_price = 0
            $('#panier-orange-info').removeClass('new_produit') // ajouter l'infos gratuit
            $('#panier-success-info').addClass('new_produit') // retrait de l'infos livraison payant
            $('#montant_expedition_panier').text('Gratuit')
        }
        }else{
            $('#montant_expedition_panier').text('Gratuit')
            let montant_total = Number(sous_total) + 0;
            $('#total_tous').text(montant_total+" Fcfa") // montant total du panier
            $('#panier-orange-info').removeClass('new_produit') // retirer l'infos gratuit
            $('#panier-success-info').addClass('new_produit') // retrait de l'infos livraison payant
        }

        $('#sous_total').text(sous_total+" Fcfa") // le sous total du panier
        $('#nbr_panier').text(result.length)
        $('#nbr_panier1').text(result.length)
        if (nombre_total > 100) {
            $('#nbr_panier2').text('+99')
        }else {
            $('#nbr_panier2').text(nombre_total)
        }

        $('#nbr_panier2_hidden').text(nombre_total)

        $('#racourci_panier').text(result.length)
        }
        $('#nombre_total').text(nombre_total);
        }
        },

        error: function(error) {
            console.log('pas bon',error)
        }

        });

      }

    function confirmationSuppression(id){
        const monstyle = document.getElementById('recap-modification-produit')
        const modalelement = document.getElementById('main-element')
        modalelement.style.backgroundColor = "rgba(0, 0, 0, 0.5)";
        modalelement.style.width = "100%";
        monstyle.classList.remove('recap-modification-produit');
        $('#myModal').modal('hide')
        var element = document.getElementById('pop_'+id)
        element.classList.remove("mystyle");
    }

            // suppression depuis le panier
function supprimer_produit2(id){
    const element2 = document.getElementById("cvide");
    $.ajax({
    type: 'GET',
    url: '/panier/supprimer/',
    data: { id: id },
    cache: false,
    success: function(result) {

    $('#recap-commande-item-container-id').empty()
    $('#myModal').modal('hide')
    if (result == 10) {

    $('#nbr_panier').text(0);
    $('#nbr_panier1').text(0);
    $('#nbr_panier2').text(0);
    $('#contenu_des_box').addClass('vider') // updated 21/12/22
    element2.classList.remove("vider");
    $('#contenu_des_box').empty()
    $('#sous-total-panier').text("0.00 Fcfa")
    $('#total-panier').text("0.00 Fcfa")
    $('#101').text("0 Article(s)")
    $('#continuer').css('background-color','#9B9B9B')
    $('#nombre_produit_panier').text(0)
    $('#commande-article-section').addClass("vider")
    $('#aucun-article-section').removeClass("vider")
    $('.recap-commande-details-element').addClass('recap-commande-details-element-desabled')

    } else {

    console.log('Tout le panier n\'est pas encore  vide')
    element2.classList.add("vider");
    var sous_total = 0;
    var tous_article = 0;
    $('#contenu_des_box').empty()
    let produit_object = []

    let tab_expedition = [];

    for (let i = 0; i < result.length; i++) {

    let tab_expedition2 = result[i][2]

    if (tab_expedition2.length > 0) {
        tab_expedition.push(tab_expedition2[0].prix)
    }


    produit_object = '<div class="customu-popup paniersuppp mystyle" id="contenu_article'+result[i].id+'">';
    produit_object += '<div class="container-supp custom-commande-del" id="popup-close-body"><div><p class="popu-del-produit">Supprimer l’article du panier ?</p></div>'

    produit_object += '<div style="display: flex;  column-gap: 14px"><button class="supp-oui" onclick=supprimer_produit2("'+i+'")>Oui</button><button class="supp-non" onclick="closePopup('+i+')">Non</button></div></div></div><div class="box-container" id="article_'+result[i].id+'" style="display: flex; flex-direction:column; justify-content:center; align-items:center; row-gap:30px"><div style="display: flex; flex-direction: column"><div class="box-elements"><div class="row" style="margin: 0%; padding: 0%; position: relative; margin-bottom: 10px;">'

    produit_object += '<div class="img-layout-1"><img class="img-layout-1 no-padding" src="/'+result[i].image+'" alt="" id="article_image" style="height: auto"></div> <div class="text-layout" id="elemnt-test"><span class="text-level-1" style="margin-bottom: 11.26px;" id="article_nom">'+result[i].libelle+'</span><span class="text-level-2" style="margin-bottom: 7px; " id="article_ref">Ref. '+result[i].ref_produit+'</span><span class="text-level-3" style="font-size: 16px !important;" id="article_prix_unit">'+result[i].prix+" Fcfa"+'</span><input type="hidden" id="article_id" name="" value="'+result[i].id+'"></div>'

    produit_object += '<div class="button-layout"><button onclick="supprimer_produit2('+i+')" class="button-close" style="margin-bottom: 14px;"><img class="corbeil-filter" src="/assets/images/Corbeille-grise-base.svg" alt=""></button><button class="span-button-editf button-close" onclick="modifier_produit('+i+')"><img class="partager-svg" src="/assets/images/tm_edit-off.svg" alt=""/></button></div></div><div class="line-separator"></div><div class="row" style="margin: 0%; padding: 0%; position: relative; margin-bottom: 5px;"><div class="row article-new" style="margin-bottom: 5px;">'

    produit_object += '<div class="col col1" style="display: flex; justify-content: center; align-items: center;"><span id="article_total"> '+result[i]['0']+" article(s)"+'</span></div><span class="separateur-1"></span><div class="col col2" style="display: flex; justify-content: center; align-items: center;"><span id="article_prix_total">'+result[i].prix*result[i]['0']+" Fcfa"+'</span></div></div><div class="row expedition-info" style="display: flex; justify-content: center; align-items: center;"><span>Expédition en 45 min</span></div></div><div class="line-separator1"></div>'

    produit_object += '<div class="rowd product-caracteristique" style="display: flex; justify-content: center; align-items: center;">'

    // console.log('Les caracteristiques sont là:', result[i][1])

    for (let caracteristique_item in result[i][1] ) {
    produit_object += '<label class="custom-span"><span>'+caracteristique_item+'</span><button class="infos-val-caracteristique" > '+result[i][1][caracteristique_item]+'</button></label>'
    }

    produit_object += '</div></div></div></div>'

    produit_object += '</div>'
    $('#contenu_des_box').append(produit_object)

    let recap_commande = [];
    recap_commande += `<div class="recap-article-item">
                        <div class="cmd-artice-libelle">${result[i].libelle} </div>
                        <div class="cmd-artice-qte-prix" style="display: flex">
                            <div class="cmd-ref-article">${result[i].ref_produit} <small style="margin-right: 72px"> x ${result[i]['0']}</small></div>
                            <div class="recap_price_total">${result[i].prix*result[i]['0']} Fcfa</div>
                        </div>
                    </div>`

    $('#recap-commande-item-container-id').append(recap_commande)

    sous_total += result[i].prix*result[i]['0']
    tous_article += parseInt(result[i]['0'])
    $('#sous-total-panier').text(sous_total.toLocaleString()+" Fcfa")
    $('#total-panier').text(sous_total.toLocaleString()+" Fcfa")
    $('#101').text(tous_article+" Article(s)")
    $('#nbr_panier2').text(tous_article);
    $('#nombre_produit_panier').text(tous_article)
    $('#continuer').css('background-color','#1a7ef5')
    }

    if (tab_expedition.length > 0) {
    let maximum = -Infinity;
    let minimum = Infinity;

    for(let number of tab_expedition) {
        if(number > maximum)
        maximum = number;

        if(number < minimum)
        minimum = number
    }

    let total_expedition_inclu = Number(maximum) + Number(sous_total)
    $('#total-panier').text(total_expedition_inclu.toLocaleString() + " Fcfa")
    $('#prix_expedition_achat-bix').text(maximum + " Fcfa")
    $('#prix_expedition_achat-bix').removeClass('vider')
    $('#prix_expedition_achat').addClass('vider')

    }else{
        $('#prix_expedition_achat-bix').text("")
        $('#prix_expedition_achat-bix').addClass('vider')
        $('#prix_expedition_achat').removeClass('vider')
    }


    }},

    error: function(error) {
        console.log('pas bon',error)
    }

    });

}

function Passer_au_panier() {  // affiche le panier
    Remise_azero()

    const element = document.getElementById('main-element');
    const element2 = document.getElementById("cvide");

    $('#myModal').modal('hide')

    $.ajax({
    type: 'GET',
    url: '/panier/panier',
    data: '',
    cache: false,
    success: function(result) {

    console.log('Resultat is:', result)
    document.getElementById("type_achat").value = 1;

    $('#contenu_des_box').removeClass('vider') // updated 21/12/22
    $('#commande-article-section').removeClass("vider")
    $('#aucun-article-section').addClass("vider")
    $('.recap-commande-details-element').removeClass('recap-commande-details-element-desabled')

    masquer_retour(document.getElementById("type_achat").value);
    let nombre_total = document.getElementById('nbr_panier2_hidden').innerHTML;

    $('#nombre_produit_panier').text(nombre_total.trim())
    $('#recap-commande-item-container-id').empty()
    if (result.length > 0) {
    var sous_total = 0;
    var tous_article = 0;
    $('#contenu_des_box').empty()
    $('#mobile-panier-articles-container').empty()

    let produit_object = [];
    let tab_expedition = [];

    for (let i = 0; i < result.length; i++) {

    let tab_expedition2 = result[i][2]

    if (tab_expedition2.length > 0) {
        tab_expedition.push(tab_expedition2[0].prix)
    }

    produit_object = '<div class="customu-popup paniersuppp mystyle" id="contenu_article'+result[i].id+'">';
    produit_object += '<div class="container-supp custom-commande-del" id="popup-close-body"><div><p class="popu-del-produit">Supprimer l’article du panier ?</p></div>'

    produit_object += '<div style="display: flex;  column-gap: 14px"><button class="supp-oui" onclick=supprimer_produit2("'+i+'")>Oui</button><button class="supp-non" onclick="closePopup('+i+')">Non</button></div></div></div><div class="box-container" id="article_'+result[i].id+'" style="display: flex; flex-direction:column; justify-content:center; align-items:center; row-gap:30px"><div style="display: flex; flex-direction: column"><div class="box-elements"><div class="row" style="margin: 0%; padding: 0%; position: relative; margin-bottom: 10px;">'

    if (result[i].id_rayon == 27) {
        produit_object += '<div class="img-layout-1" style="padding-right: 0px"><div class="center-panier-img"><img class="no-padding panier-image-long" src="/'+result[i].image+'" alt="" id="article_image-'+result[i].id+'" ></div></div> <div class="text-layout" id="elemnt-test"><span class="text-level-1" style="margin-bottom: 11.26px;" id="article_nom">'+result[i].libelle+'</span><span class="text-level-2" style="margin-bottom: 7px; " id="article_ref">Ref. '+result[i].ref_produit+'</span><span class="text-level-3" style="font-size: 16px !important;" id="article_prix_unit">'+result[i].prix+" Fcfa"+'</span><input type="hidden" id="article_id" name="" value="'+result[i].id+'"></div>'
    }else if (result[i].id_rayon == 25) {
        produit_object += '<div class="img-layout-1" style="padding-right: 0px"><div class="center-panier-img"><img class="no-padding panier-image-large" src="/'+result[i].image+'" alt="" id="article_image-'+result[i].id+'" ></div></div> <div class="text-layout" id="elemnt-test"><span class="text-level-1" style="margin-bottom: 11.26px;" id="article_nom">'+result[i].libelle+'</span><span class="text-level-2" style="margin-bottom: 7px; " id="article_ref">Ref. '+result[i].ref_produit+'</span><span class="text-level-3" style="font-size: 16px !important;" id="article_prix_unit">'+result[i].prix+" Fcfa"+'</span><input type="hidden" id="article_id" name="" value="'+result[i].id+'"></div>'
    }else {
        produit_object += '<div class="img-layout-1" style="padding-right: 0px"><div class="center-panier-img"><img class="no-padding panier-image-large" src="/'+result[i].image+'" alt="" id="article_image-'+result[i].id+'" ></div></div> <div class="text-layout" id="elemnt-test"><span class="text-level-1" style="margin-bottom: 11.26px;" id="article_nom">'+result[i].libelle+'</span><span class="text-level-2" style="margin-bottom: 7px; " id="article_ref">Ref. '+result[i].ref_produit+'</span><span class="text-level-3" style="font-size: 16px !important;" id="article_prix_unit">'+result[i].prix+" Fcfa"+'</span><input type="hidden" id="article_id" name="" value="'+result[i].id+'"></div>'
    }

    produit_object += '<div class="button-layout"><button onclick="supprimer_produit2('+i+')" class="button-close" style="margin-bottom: 14px;"><img class="corbeil-filter" src="/assets/images/Corbeille-grise-base.svg" alt=""></button><button class="span-button-editf button-close" onclick="modifier_produit('+i+')"><img class="partager-svg" src="/assets/images/tm_edit-off.svg" alt=""/></button></div></div><div class="line-separator"></div><div class="row" style="margin: 0%; padding: 0%; position: relative; margin-bottom: 5px;"><div class="row article-new" style="margin-bottom: 5px;">'

    produit_object += '<div class="col col1" style="display: flex; justify-content: center; align-items: center;"><span id="article_total"> '+result[i]['0']+" article(s)"+'</span></div><span class="separateur-1"></span><div class="col col2" style="display: flex; justify-content: center; align-items: center;"><span id="article_prix_total">'+result[i].prix*result[i]['0']+" Fcfa"+'</span></div></div><div class="row expedition-info" style="display: flex; justify-content: center; align-items: center;"><span>Expédition en 45 min</span></div></div><div class="line-separator1"></div>'

    produit_object += '<div class="rowd product-caracteristique" style="display: flex; justify-content: center; align-items: center;">'

    // console.log('Les caracteristiques sont là:', result[i][1])

    for (let caracteristique_item in result[i][1] ) {
    produit_object += '<label class="custom-span"><span>'+caracteristique_item+'</span><button class="infos-val-caracteristique" > '+result[i][1][caracteristique_item]+'</button></label>'
    }

    produit_object += '</div></div></div></div>'

    produit_object += '</div>'
    $('#contenu_des_box').append(produit_object)
    $('#mobile-panier-articles-container').append(produit_object)

    // ------------------------- commande recap ----------------------------------
    let recap_commande = [];
    recap_commande += `<div class="recap-article-item">
                        <div class="cmd-artice-libelle">${result[i].libelle} </div>
                        <div class="cmd-artice-qte-prix" style="display: flex">
                            <div class="cmd-ref-article">${result[i].ref_produit} <small style="margin-right: 72px"> x ${result[i]['0']}</small></div>
                            <div class="recap_price_total">${result[i].prix*result[i]['0']} Fcfa</div>
                        </div>
                    </div>`

    $('#recap-commande-item-container-id').append(recap_commande)

    sous_total += result[i].prix*result[i]['0']
    tous_article += parseInt(result[i]['0'])
    $('#sous-total-panier').text(sous_total.toLocaleString()+" Fcfa")
    $('#total-panier').text(sous_total.toLocaleString()+" Fcfa")
    $('#101').text(tous_article+" Article(s)")
    element2.classList.add("vider");
    $('#continuer').css('background-color','#1a7ef5')


    $('.sous-total-panier-mobile').text(sous_total.toLocaleString()+" Fcfa")
    $('.total-panier-mobile').text(sous_total.toLocaleString()+" Fcfa")

    }

    if (tab_expedition.length > 0) {

    let maximum = -Infinity;
    let minimum = Infinity;

    for(let number of tab_expedition) {
        if(number > maximum)
        maximum = number;

        if(number < minimum)
        minimum = number
    }

    $('#prix_expedition_achat-bix').text(maximum +" Fcfa")
    $('#prix_expedition_achat-bix').removeClass('vider')
    $('#prix_expedition_achat').addClass('vider')
    $('.montant_expedition_panier-mobile').text('Gratuit')

    // cas ou le client est exonéré du prix de l'expédition

    if (sous_total > 20000) {
        maximum  = 0;
        $('#prix_expedition_achat-bix').addClass('vider')
        $('#prix_expedition_achat').removeClass('vider')
        $('.montant_expedition_panier-mobile').text('Gratuit')// Expedition mobile
    }

    let total_exp_included = Number(sous_total) + Number(maximum)
    $('#total-panier').text(total_exp_included.toLocaleString()+" Fcfa")
    $('.total-panier-mobile').text(total_exp_included.toLocaleString()+" Fcfa") // mobile

    }else{
        $('#prix_expedition_achat-bix').text("")
        $('#prix_expedition_achat-bix').addClass('vider')
        $('#prix_expedition_achat').removeClass('vider')
        $('#montant_expedition_panier-mobile').removeClass('vider')// Expedition mobile
    }

    } else {
        element2.classList.remove("vider");
        $('#continuer').css('background-color','#9B9B9B')
    }

    element.classList.remove('panier_show')
    $('#exampleModal_bachir').modal({
        backdrop: 'static',
        keyboard: false
    })

    $('#panier_version_v2').removeClass('input-none-panier-v2')

    // $('#exampleModal_bachir').modal('show')

        },

        error: function(error) {
            console.log('Pas bon')
        }

    });
  }

  function Passer_au_panier_rapide() {

    Remise_azero()

    const element = document.getElementById('main-element');
    const element2 = document.getElementById("cvide");
    // $('#myModal').modal('hide') // Fermeture du modal recap produit
    $('#marchand_video_preview_big_client').attr('src', " ") // En cas de video en lecture
    $('#recap-produit-main-modal').addClass('main-prod-detail-modal') // Fermeture de nouvelle popup
    let quantite_produit = $('#quantite').val();
    $('#contenu_des_box').removeClass('vider') // updated 21/12/22

    $('#recap-commande-item-container-id').empty()

    let id_produit = product_instance['Detail_Produit'][0][0]['id']
    let reference_produit = product_instance['Detail_Produit'][0][0]['ref_produit']
    let prix_unitaire_produit = product_instance['Detail_Produit'][0][0]['prix']
    let tab_caracteristique = {}
    let prix_total = Number(quantite_produit) * Number(prix_unitaire_produit)

    for (let u = 0; u < 3; u++) {
        let label_caract = $('#carac_produit-Label'+u).text()
        tab_caracteristique[label_caract] = $('#carac_produit'+u).find(':selected').text()
    }
    console.log('Vos caracteristiques sont:', tab_caracteristique)
    let produit = {
        'quantite': quantite_produit,
        'prix': prix_unitaire_produit,
        'id_produit': id_produit,
        'prix_total': prix_total,
        'ref' : reference_produit,
        'carac' : tab_caracteristique,
    }

        $.ajax({
        type: 'GET',
        url: '/panier/panier_rapide',
        data: produit,
        cache: false,
        success: function(result) {

        document.getElementById("type_achat").value = 1;
        masquer_retour(document.getElementById("type_achat").value);

        console.log('Le resultat est:', result)

        if (result.length > 0) {
        var sous_total = 0;
        var tous_article = 0;
        $('#contenu_des_box').empty()

        let produit_object = []
        let tab_expedition = [];

        for (let i = 0; i < result.length; i++) {

        let tab_expedition2 = result[i][2]

        if (tab_expedition2.length > 0) {
            tab_expedition.push(tab_expedition2[0].prix)
        }

        produit_object = '<div class="customu-popup paniersuppp mystyle" id="contenu_article'+result[i].id+'">';
        produit_object += '<div class="container-supp custom-commande-del" id="popup-close-body"><div><p class="popu-del-produit">Supprimer l’article du panier ?</p></div>'

        produit_object += '<div style="display: flex;  column-gap: 14px"><button class="supp-oui" onclick=supprimer_produit2("'+i+'")>Oui</button><button class="supp-non" onclick="closePopup('+i+')">Non</button></div></div></div><div class="box-container" id="article_'+result[i].id+'" style="display: flex; flex-direction:column; justify-content:center; align-items:center; row-gap:30px"><div style="display: flex; flex-direction: column"><div class="box-elements"><div class="row" style="margin: 0%; padding: 0%; position: relative; margin-bottom: 10px;">'

        produit_object += '<div class="img-layout-1"><img class="img-layout-1 no-padding" src="/'+result[i].image+'" alt="" id="article_image" style="height: auto"></div> <div class="text-layout" id="elemnt-test"><span class="text-level-1" style="margin-bottom: 11.26px;" id="article_nom">'+result[i].libelle+'</span><span class="text-level-2" style="margin-bottom: 7px; " id="article_ref">Ref. '+result[i].ref_produit+'</span><span class="text-level-3" style="font-size: 16px !important;" id="article_prix_unit">'+result[i].prix+" Fcfa"+'</span><input type="hidden" id="article_id" name="" value="'+result[i].id+'"></div>'

        produit_object += '<div class="button-layout"><button onclick="supprimer_produit2('+i+')" class="button-close" style="margin-bottom: 14px;"><img class="corbeil-filter" src="/assets/images/Corbeille-grise-base.svg" alt=""></button><button class="span-button-editf button-close" onclick="modifier_produit3('+i+')"><img class="partager-svg" src="/assets/images/tm_edit-off.svg" alt=""/></button></div></div><div class="line-separator"></div><div class="row" style="margin: 0%; padding: 0%; position: relative; margin-bottom: 5px;"><div class="row article-new" style="margin-bottom: 5px;">'

        produit_object += '<div class="col col1" style="display: flex; justify-content: center; align-items: center;"><span id="article_total"> '+result[i]['0']+" article(s)"+'</span></div><span class="separateur-1"></span><div class="col col2" style="display: flex; justify-content: center; align-items: center;"><span id="article_prix_total">'+result[i].prix*result[i]['0']+" Fcfa"+'</span></div></div><div class="row expedition-info" style="display: flex; justify-content: center; align-items: center;"><span>Expédition en 45 min</span></div></div><div class="line-separator1"></div>'

        produit_object += '<div class="rowd product-caracteristique" style="display: flex; justify-content: center; align-items: center;">'


        for (let caracteristique_item in result[i][1] ) {
            produit_object += '<label class="custom-span"><span>'+caracteristique_item+'</span><button class="infos-val-caracteristique" > '+result[i][1][caracteristique_item]+'</button></label>'
        }

        produit_object += '</div></div></div></div>'

        produit_object += '</div>'
        $('#contenu_des_box').append(produit_object)


        // ------------------------- commande recap ----------------------------------
        let recap_commande = [];
        $('#nombre_produit_panier').text(1)
        recap_commande += `<div class="recap-article-item">
                            <div class="cmd-artice-libelle">${result[i].libelle} </div>
                            <div class="cmd-artice-qte-prix" style="display: flex">
                                <div class="cmd-ref-article">${result[i].ref_produit} <small style="margin-right: 72px"> x ${result[i]['0']}</small></div>
                                <div class="recap_price_total">${result[i].prix*result[i]['0']} Fcfa</div>
                            </div>
                        </div>`

        $('#recap-commande-item-container-id').append(recap_commande)

        sous_total += result[i].prix*result[i]['0']
        tous_article += parseInt(result[i]['0'])
        $('#sous-total-panier').text(sous_total.toLocaleString()+" Fcfa")
        $('#total-panier').text(sous_total.toLocaleString()+" Fcfa")
        $('#101').text(tous_article+" Article(s)")

        element2.classList.add("vider");
        $('#continuer').css('background-color','#1a7ef5')

        }

        if (tab_expedition.length > 0) {

        let maximum = -Infinity;
        let minimum = Infinity;

        for(let number of tab_expedition) {
            if(number > maximum)
            maximum = number;

            if(number < minimum)
            minimum = number
        }

        $('#prix_expedition_achat-bix').text(maximum +" Fcfa")
        $('#prix_expedition_achat-bix').removeClass('vider')
        $('#prix_expedition_achat').addClass('vider')
        $('#montant_expedition_panier-mobile').text(maximum +" Fcfa") // Expedition mobile

        // cas ou le client est exonéré du prix de l'expédition

        if (sous_total > 20000) {
            maximum  = 0;
            $('#prix_expedition_achat-bix').addClass('vider')
            $('#prix_expedition_achat').removeClass('vider')
            $('#montant_expedition_panier-mobile').removeClass('vider') // Expedition mobile
        }

        let total_exp_included = Number(sous_total) + Number(maximum)
        $('#total-panier').text(total_exp_included+" Fcfa")

        }else{
            $('#prix_expedition_achat-bix').text("")
            $('#prix_expedition_achat-bix').addClass('vider')
            $('#prix_expedition_achat').removeClass('vider')
            $('#montant_expedition_panier-mobile').removeClass('vider') // Expedition mobile
        }

        } else {
            element2.classList.remove("vider");
            $('#continuer').css('background-color','#9B9B9B')
        }
        element.classList.remove('panier_show')

        $('#exampleModal_bachir').modal({
            backdrop: 'static',
            keyboard: false
        })

        // $('#exampleModal_bachir').modal('show')
        $('#panier_version_v2').removeClass('input-none-panier-v2')

        },

        error: function(error) {
            console.log('Un problème est suvenu lors de la récuperation de cet article')
        }

        });
    }

    // modification du produit dans un panier
function modifier_produit(id) {
    $('#exampleModal_bachir').modal('hide')
    $('#panier_version_v2').addClass('input-none-panier-v2')
    $('#modification').show()
    $('#Ajouter_new').hide()
    let id_produit = id;

    const monstyle = document.getElementById('recap-modification-produit')
    const modalelement = document.getElementById('main-element')
    monstyle.classList.add('recap-modification-produit');// class a modifier
    modalelement.style.backgroundColor = "transparent";
    modalelement.style.width = "310px";

    $('#id_session_update').val(id)

    if (modalelement.classList.contains("panier_show") == false){
        modalelement.classList.add('panier_show')
    }

    activation_but.disabled = true;
    activation_but.classList.add("desactive");

    let modifier = {
    'id': id
    }

    let zone_petite_image = $('.tm_produit_petit_img_user')
    $(zone_petite_image[0]).addClass('tm_active_img_product')
    for (let h = 1; h < zone_petite_image.length; h++) {
        $(zone_petite_image[h]).removeClass('tm_active_img_product')
    }

    let init_peti_cadre = $('.petit-cadre')
    let mobile_init_petit_cadre = $('.mobile_petit-cadre')

    for (let g = 1; g < 5; g++) {
        $(init_peti_cadre[g]).removeClass('set-white-bg')
        $(init_peti_cadre[g]).addClass('set-gray-bg')
    }

    if (!$('.tm_show_p_product-client').hasClass('s-none-client')) {
        $('.tm_show_p_product-client').addClass('s-none-client')
        $('#image_principal').removeClass('s-none-client')
    }

    let mobile_zone_petite_image = $('.panier-mobile-cadre-div')
    $(mobile_zone_petite_image[0]).addClass('tm_active_img_product')
    // reset active class from all images
    for (let h = 1; h < mobile_zone_petite_image.length; h++) {
        $(mobile_zone_petite_image[h]).removeClass('tm_active_img_product')
    }

    $.ajax({
    type: 'GET',
    url: '/produit_detail_modif/',
    data: modifier ,
    cache: false,
    success: function(response) {

    product_instance = response
    console.log('Nouvelle valeur: ', product_instance )
    $('.article-title').text(response['Detail_Produit'][0][0]['libelle'])
    $('.mobile_article-title').text(response['Detail_Produit'][0][0]['libelle'])
    $('#prix_total').text(response['Detail_Produit'][15]['prix_total']+'Fcfa')
    $('#current_price').val(response['Detail_Produit'][0][0]['prix'])

    $('.mobile-prod-price').text(response['Detail_Produit'][0][0]['prix'])

    $('#description_marchand_zone1').text(response['Detail_Produit'][0][0]['description'])
    $('#image_principal').attr('src', '/'+response['Detail_Produit'][0][0]['image'])
    $('#image_principal1').attr('src', '/'+response['Detail_Produit'][0][0]['image'])

    $('#mobile_image_principal').attr('src', '/'+response['Detail_Produit'][0][0]['image'])
    $('#mobile_image_autre0').attr('src', '/'+response['Detail_Produit'][0][0]['image']) // Mobile
    
    $('#image_principal1').bind('click', function(v) {
        showImagePrevievClient(response['Detail_Produit'][0][0]['image'], 0)
    })

    $('#mobile_image_autre0').bind('click', function(v) {
        showImageMobilePreview(response['Detail_Produit'][0][0]['image'], 0)
    })

    $('.gros-cadre-user').addClass('set-white-color')
    $('#mobile_image_autre1').addClass('set-white-color');
    // $('#quantite_marchand').val(response['Detail_Produit'][0][0]['quantite'])
    $('#reference_produit_client').text(response['Detail_Produit'][0][0]['ref_produit'])
    $('#panier-mobile-ref_prod').text(response['Detail_Produit'][0][0]['ref_produit'])

    if (response['Detail_Produit'][0][0]['video_preview'] != null) {
        $('.tm_vid_icon').empty();

        const img_icon = '<img class="img-card-petit-p" style="height: 50%; width: 50%" src="/assets/images/1497554804-social-media04_84871.svg" alt="" id="image_autreMarchand4d" >'
        $('.tm_vid_icon').append(img_icon)
        $('#mobile-autre-image_video4').append(img_icon)

        var url_video = response['Detail_Produit'][0][0]['video_preview'] // url de la video
        var regex = /https:\/\/youtube\.com\/embed\/|(\?t=\d+)/gi;
        var videoId = url_video.replace(regex, "");

        const apiKey = 'AIzaSyDdX29Tk27nv5nd9sHWgu-eRKNVr_n38Rk'; // Replace with your YouTube Data API key
        
        $('#mobile-autre-image_video4').empty()

        getYoutubeVideoTumbnail(videoId, apiKey)
    
        $('.tm_vid_icon').bind('click', function(){
            productVideoPreviewClient(response['Detail_Produit'][0][0]['video_preview'], 5)
        })
    
        $('.mobile-tm_vid_icon').bind('click', function() {
            mobileVideoPreview(response['Detail_Produit'][0][0]['video_preview'], 4)
        })
    
        $('.tm_vid_icon').removeClass('set-gray-bg')
        $('.tm_vid_icon').addClass('set-white-bg')

    }else{
        $image = $('#image_autreMarchand4d')
        $('.tm_vid_icon').empty();
        $('.tm_vid_icon').removeClass('set-white-bg')
        $('.tm_vid_icon').addClass('set-gray-bg')
    }

    let a_index = 0;
    for (let caracteristique_item in response['Detail_Produit'][14] ) {
        $('#carac_produit'+a_index).empty()
        $('#carac_produit'+a_index).append('<option>'+response['Detail_Produit'][14][caracteristique_item]+'</option>')
        $('#carac_produit-Label'+a_index).text(caracteristique_item)

        $('#mobile-carac_produit'+a_index).empty()
        $('#mobile-carac_produit'+a_index).append('<option>'+response['Detail_Produit'][14][caracteristique_item]+'</option>')
        $('#mobile-carac_produit-Label'+a_index).text(caracteristique_item)

        a_index++
    }

    if (response['Detail_Produit'][1].length > 0) {
        $('#produit-univer-user').text(response['Detail_Produit'][1][0]['libelle'])
    }

    // $('.gros-cadre').addClass('set-white-bg')
    for (i = 1; i < 6; ++i) {
        $('#image_autre'+i).hide()
    }

    $('#Deskription').text(response['Detail_Produit'][0][0]['description']) // Description

    $('#TableContainer').empty();
    for (let caracteristique_item in response['Detail_Produit'][14] ) {
        let caracteristique_row = "<tr><td>"+caracteristique_item+"</td><td>"+response['Detail_Produit'][14][caracteristique_item]+"</td></tr>"
        $('#TableContainer').append(caracteristique_row)
    }

// for (let v = 0; v < response['Detail_Produit'][5].length; v++) {
   for (i = 0; i < response['Detail_Produit'][5].length; ++i) {

    let incr_index = i + 1;
    var image_for_size_calculation = response['Detail_Produit'][5][i]["image"]

    let img = new Image();
    img.onload = function() {

    if (img.height > img.width) {
        $('#image_autre'+incr_index).closest('petit-cadre').addClass('img-card-long')
        $('#image_autre'+incr_index).addClass('img-card-petit-long')

        $('#mobile_image_autre'+incr_index).closest('mobile_petit-cadre').addClass('img-card-long')
        $('#mobile_image_autre'+incr_index).addClass('img-card-petit-long')

    }else {
        $('#image_autre'+incr_index).closest('petit-cadre').removeClass('img-card-long')
        $('#image_autre'+incr_index).removeClass('img-card-petit-long')

        $('#mobile_image_autre'+incr_index).closest('mobile_petit-cadre').removeClass('img-card-long')
        $('#mobile_image_autre'+incr_index).removeClass('img-card-petit-long')
    }
    };

    img.src = '/'+response['Detail_Produit'][5][i]["image"];

    $('#image_autre'+incr_index).attr('src', '/'+response['Detail_Produit'][5][i]["image"]) // Chargement des images
    $('#mobile_image_autre'+incr_index).attr('src', '/'+response['Detail_Produit'][5][i]["image"]) //Chargement des image for mobile

    let img_element = response['Detail_Produit'][5][i]["image"]

    $('#image_autre'+incr_index).bind('click', function(v) {
        showImagePrevievClient(img_element, incr_index)
    })

    $('#mobile_image_autre'+incr_index).bind('click', function() {
        showImageMobilePreview(img_element, incr_index)
    })

    let index_increment = i + 1;

    $(init_peti_cadre[index_increment]).removeClass('set-gray-bg') // Enleve le bg gray
    $(init_peti_cadre[index_increment]).addClass('set-white-bg') // ajout du bg white

    $(mobile_init_petit_cadre[index_increment]).removeClass('set-gray-bg')
    $(mobile_init_petit_cadre[index_increment]).addClass('set-white-bg')

    $('#image_autre'+incr_index).show()
    $('#mobile_image_autre'+incr_index).show()

    }

    if (response['Detail_Produit'][13].length > 0) {

    $('#produit-rayon-user').text(response['Detail_Produit'][13][0]['libelle'])
    $.ajax({
    method: 'GET',
    url: '/rayon_articles_associer/'+response['Detail_Produit'][13][0]['id'],
    success: function(response) {
    if (response.length > 0) {

    $('.produit-associer-section').empty();

    if (response.length > 0) {
        $('.produit-associer-section-marchand').empty();
        for (let j = 0; j < response.length; j++) {
            let rayon_produit_associer = '<a title="'+response[j]['libelle']+'"><img src="/storage/images/rayons/'+response[j]['logo']+'" alt="B"></a>'
            $('.produit-associer-section-marchand').append(rayon_produit_associer)
        }
    }
    }
    // $('#payement-marchand-preview').text(response['cardInfo'][0]['type_carte'])
    }
    })
}


    $('#quantite').val(response['Detail_Produit'][15]['quantite'])

    $('#id_session').val(id_produit)

    $('#id_produit').val(response['Detail_Produit'][15]['id_produit'])
    // $('#price_first').val(result[0][0].prix)

    // location.reload(true);
    // $('#myModal').modal({
    //     backdrop: 'static',
    //     keyboard: false
    // })
    // $('#myModal').modal('show')

    $('#recap-produit-main-modal').removeClass('main-prod-detail-modal')
    showPanier()

    },

    error: function(error) {
        console.log('pas bon')
    }

    });

    }

    // modification du produit dans un panier
function modifier_produit3(id) {

    $('#exampleModal_bachir').modal('hide')
    $('#modification').show()
    $('#Ajouter_new').hide()
    let id_produit = id;

    const monstyle = document.getElementById('recap-modification-produit')
    const modalelement = document.getElementById('main-element')
    monstyle.classList.add('recap-modification-produit');// class a modifier
    modalelement.style.backgroundColor = "transparent";

    activation_but.disabled = true;
    activation_but.classList.add("desactive");

    let modifier = {
    'id': id
    }

    let zone_petite_image = $('.tm_produit_petit_img_user')
    $(zone_petite_image[0]).addClass('tm_active_img_product')
    for (let h = 1; h < zone_petite_image.length; h++) {
        $(zone_petite_image[h]).removeClass('tm_active_img_product')
    }

    let init_peti_cadre = $('.petit-cadre')

    for (let g = 1; g < 5; g++) {
        $(init_peti_cadre[g]).removeClass('set-white-bg')
        $(init_peti_cadre[g]).addClass('set-gray-bg')
    }

    if (!$('.tm_show_p_product-client').hasClass('s-none-client')) {
        $('.tm_show_p_product-client').addClass('s-none-client')
        $('#image_principal').removeClass('s-none-client')
    }

    $.ajax({
    type: 'GET',
    url: '/produit_detail_modif2/',
    data: modifier ,
    cache: false,
    success: function(response) {

    console.log('modif',response['Detail_Produit'][15][0]['quantite'])
    $('.article-title').text(response['Detail_Produit'][0][0]['libelle'])
    $('#prix_total').text(response['Detail_Produit'][15]['prix_total']+'Fcfa')
    $('#current_price').val(response['Detail_Produit'][15][0]['prix'])
    $('#description_marchand_zone1').text(response['Detail_Produit'][0][0]['description'])
    $('#image_principal').attr('src', '/'+response['Detail_Produit'][0][0]['image'])
    $('#image_principal1').attr('src', '/'+response['Detail_Produit'][0][0]['image'])

    $('#image_principal1').bind('click', function(v) {
        showImagePrevievClient(response['Detail_Produit'][0][0]['image'], 0)
    })

    $('.gros-cadre-user').addClass('set-white-color')
    $('#reference_produit_client').text(response['Detail_Produit'][0][0]['ref_produit'])

    if (response['Detail_Produit'][0][0]['video_preview'] != null) {
        $('.tm_vid_icon').empty();
        const img_icon = '<img class="img-card-petit-p" style="height: 50%; width: 50%" src="/assets/images/1497554804-social-media04_84871.svg" alt="" id="image_autreMarchand4d" >'
        $('.tm_vid_icon').append(img_icon)
        $('.tm_vid_icon').bind('click', function(){
            productVideoPreviewClient(response['Detail_Produit'][0][0]['video_preview'], 5)
        })
        $('.tm_vid_icon').removeClass('set-gray-bg')
        $('.tm_vid_icon').addClass('set-white-bg')

    }else{
        $image = $('#image_autreMarchand4d')
        $('.tm_vid_icon').empty();
        $('.tm_vid_icon').removeClass('set-white-bg')
        $('.tm_vid_icon').addClass('set-gray-bg')
    }

    let a_index = 0;
    for (let caracteristique_item in response['Detail_Produit'][14] ) {
        $('#carac_produit'+a_index).empty()
        $('#carac_produit'+a_index).append('<option>'+response['Detail_Produit'][14][caracteristique_item]+'</option>')
        $('#carac_produit-Label'+a_index).text(caracteristique_item)
        a_index++
    }

    if (response['Detail_Produit'][1].length > 0) {
        $('#produit-univer-user').text(response['Detail_Produit'][1][0]['libelle'])
    }

    // $('.gros-cadre').addClass('set-white-bg')
    for (i = 1; i < 6; ++i) {
        $('#image_autre'+i).hide()
    }

    $('#Deskription').text(response['Detail_Produit'][0][0]['description']) // Description

    $('#TableContainer').empty();
    for (let caracteristique_item in response['Detail_Produit'][14] ) {
        let caracteristique_row = "<tr><td>"+caracteristique_item+"</td><td>"+response['Detail_Produit'][14][caracteristique_item]+"</td></tr>"
        $('#TableContainer').append(caracteristique_row)
    }

    // for (let v = 0; v < response['Detail_Produit'][5].length; v++) {
    for (i = 0; i < response['Detail_Produit'][5].length; ++i) {

        let incr_index = i + 1;
        $('#image_autre'+incr_index).attr('src', '/'+response['Detail_Produit'][5][i]["image"])
        let img_element = response['Detail_Produit'][5][i]["image"]
        $('#image_autre'+incr_index).bind('click', function(v) {
            showImagePrevievClient(img_element, incr_index)
        })
        let index_increment = i + 1;
        $(init_peti_cadre[index_increment]).removeClass('set-gray-bg')
        $(init_peti_cadre[index_increment]).addClass('set-white-bg')
        $('#image_autre'+incr_index).show()

    }

    if (response['Detail_Produit'][13].length > 0) {
    $('#produit-rayon-user').text(response['Detail_Produit'][13][0]['libelle'])

    $.ajax({
    method: 'GET',
    url: '/rayon_articles_associer/'+response['Detail_Produit'][13][0]['id'],
    success: function(response) {
    if (response.length > 0) {

    $('.produit-associer-section').empty();

    if (response.length > 0) {
        $('.produit-associer-section-marchand').empty();
        for (let j = 0; j < response.length; j++) {
            let rayon_produit_associer = '<a title="'+response[j]['libelle']+'"><img src="/storage/images/rayons/'+response[j]['logo']+'" alt="B"></a>'
            $('.produit-associer-section-marchand').append(rayon_produit_associer)
        }
    }
    }
    // $('#payement-marchand-preview').text(response['cardInfo'][0]['type_carte'])
    }
    })
   }


    $('#quantite').val(response['Detail_Produit'][15][0]['quantite'])

    $('#id_session').val(id_produit)

    $('#id_produit').val(response['Detail_Produit'][15][0]['id_produit'])
    // $('#price_first').val(result[0][0].prix)

    // location.reload(true);
    $('#myModal').modal({
        backdrop: 'static',
        keyboard: false
    })

    $('#myModal').modal('show')

    },

    error: function(error) {
        console.log('pas bon')
    }

    });

 }

 window.addEventListener("load", function() {
    let storage_invite_data = JSON.parse(window.localStorage.getItem('adresse_invite'));
    if (storage_invite_data != null) {
        window.localStorage.removeItem('adresse_invite')
    }
});
