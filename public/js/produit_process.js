
jQuery(document).ready(function () {

    $('#libelle-produit').on('keyup', function() {
        let libelle_produit = $('#libelle-produit').val()
        $('#titre-annonce').text(libelle_produit)
    })

    // univers change (element 2)
    $('#univer-boutique').on('change', function() {
        var boutique_univers = $('#univer-boutique').find(':selected').val();
        $.ajax({
            method: 'GET',
            url: 'rayon_by_univers/'+boutique_univers,
            data: {},
            headers: {},
            success: function(response) {
                $('#produit-rayon').empty()
                console.log('reponse verif', response)
                var rayon_option = []
                rayon_option = "<option value=''>-- Choisir un rayon --</option>"
                for (let i = 0; i < response.length; i++) {
                    rayon_option += "<option value="+response[i]['rayon_id']+">"+response[i]['libelle']+"</option>"
                }
                $('#produit-rayon').append(rayon_option)
            }
        })
    })

    function isInArray(array, search)
    {
        return array.indexOf(search) >= 0;
    }

    // ---------------rayon change --------------
    $('#produit-rayon').on('change', function(){
        // chargement des famille
        $.ajax({
        method: 'GET',
        url: 'rayon_familles',
        data: {id: $('#produit-rayon').find(':selected').val()},
        headers: {},
        success: function(response) {

        var familles = response[0]['familles']
        $('#produit-famille').empty()

        var famille_option = []

        famille_option += '<option value = "">----Selectionner une famille----</option>';
        for (let u = 0; u < familles.length; u++) {
            famille_option += '<option value = '+familles[u]['id']+'>'+familles[u]['libelle']+'</option>';
        }

        famille_option += '<option value="autre_famille">Autre catégorie</option>'
        $('#produit-famille').append(famille_option);

        }
    })

    // chargement des caracteristique par rayons
    $.ajax({
    method: 'GET',
    url: 'change_rayon_caracteristiques',
    data: {id: $('#produit-rayon').find(':selected').val()},
    headers: {},
    success: function(response) {
        
    $('.caracteristique_element').empty()
    $('.caracteristique-preview-element').empty()
    var element1 = [];  //caracteristique-preview
    var select_element = [];

    for(var key in response){

    var element_id = key.replace(/\s/g, '');
    var element_id1 = element_id.replace(/'/g, '')
    var element_id_final = element_id1.toLowerCase();

    select_element += "<div class='caracteristique-zone'><label class='labele-items' style='position: relative; left: 0px'><small class='red-star'>*</small>"+key+"</label><select class='caracterisqueProd' select-type='Normal' data-select='"+key+"' name='"+key+"' id='"+element_id_final+"' onchange=caracteristiqueChanged('"+element_id_final+"') >"+response[key]+"<option value='aucun'>Aucun</option></select>"

    select_element += "<div style='display: flex; margin-top: 5px'><span class='caracteristique-frequent-label'>Fréquent : </span><span class='caracteristique-frequent s-none'>iPhone 6s , iPhone 8 , iPhone X</span></div>"
    select_element += "</div>"

    $('.caracteristique-preview-element').append("<div class='caracteristique-zone-preview'><label class='labele-items' style='position: relative; left: 20px'>"+key+"</label><select id='p"+element_id_final+"'  class='caracterisqueProdPreview' name='"+key+"' >"+response[key]+"</select></div>")
    element1.push(element_id_final)

    }

    $('.caracteristique_element').append(select_element)
    var nbre_caracteristique = document.getElementsByClassName('caracteristique-zone');

    //if (nbre_caracteristique.length < 4 ) {
    let bouton_ajout_caracteristique = []

    bouton_ajout_caracteristique += '<div id="btn-attr-product" class="ajoutcaracte" style=" width: 253px; display: flex; flex-direction: column;">'

    bouton_ajout_caracteristique += '<label class="labele-items">Ajouter une autre caractéristique</label> '
    bouton_ajout_caracteristique += '<button class="ajout-caracteristique-btn" onclick="showAjoutCaracteristique()">+</button>'
    bouton_ajout_caracteristique += '<div class="caracteristique-supplementaire s-none"><div class="row-supp-1"><label for="" style="margin-left: 7px; ">Nom:</label><div><input type="text" style="  height: 31px; width: 158px;border-radius: 6px;background-color: #F8F8F8; padding-left: 10px" id="caracteristique_libelle"></div>'

    bouton_ajout_caracteristique += '<button disabled id="validateNomCaracteristique" style="height: 31px;width: 31px;border-radius: 6px;background-color: #D8D8D8; border: none; color: #fff; font-size: 24px; font-weight: 900" onclick="validerCaracteristique()"><svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-check" viewBox="0 0 16 16"><path d="M10.97 4.97a.75.75 0 0 1 1.07 1.05l-3.99 4.99a.75.75 0 0 1-1.08.02L4.324 8.384a.75.75 0 1 1 1.06-1.06l2.094 2.093 3.473-4.425a.267.267 0 0 1 .02-.022z"/></svg></button></div>'

    bouton_ajout_caracteristique += '<div class="row-supp-2" id="myInputCaracteristiqueContainer"><div style="margin-left: 5xp"><input type="text" id="attribute_1" onkeyup="activeValidateButton()" class="add-input-caracteristique" ><span onclick="closeInputUrl("photo_2-url")"class="clean-text-suggestion " style="position: absolute; margin-left: -16px; color: red; font-size: 20px">&times;</span></div><div class="bouton-ajout-caract">'

    bouton_ajout_caracteristique += '<button style="  box-sizing: border-box;height: 31px;width: 118px;border: 1px solid #1A7EF5;border-radius: 6px;background-color: #FFFFFF; margin-left: 5px" onclick="addAttributeElements()">+</button></div></div><div class="row-supp-2"></div></div></div>'
    $('.caracteristique_element').append(bouton_ajout_caracteristique)
    // }

    if (nbre_caracteristique.length > 4) {
        // $('.resultat-element').css('padding-bottom', '0px')
        $('#main_caracteristique_section1').removeClass('caracteristiques-section-elements-min')
        $('#main_caracteristique_section1').addClass('caracteristiques-section-elements-max')

    }else {

        $('#main_caracteristique_section1').addClass('caracteristiques-section-elements-min')
        $('#main_caracteristique_section1').removeClass('caracteristiques-section-elements-max')
    }
    $('#tabcaracteristique').val([element1])

    }
    })

        // ---------------------------- check if the arroy is allowed to have kilogramme option ---------------

        console.log('Here is the data:', $(this).find(':selected').val())
        let vente_en_lot = [1, 2, 3, 4, 5, 6, 7, 8, 10, 11, 12, 13, 14, 15, 16, 18, 19, 20, 22, 24, 30, 32, 35, 36,40, 46, 52, 53, 57, 79]
        let not_vente_en_lot = [];
        const includes = (a, v) => a.indexOf(v) !== -1
        let id_rayon = $('#produit-rayon').find(':selected').val();
        let final_id_rayon = Number( $(this).find(':selected').val())

        if(isInArray(vente_en_lot, final_id_rayon))
        {
            $('.tm-price-section-2').removeClass('s-none')
            $('#tm_vente_en_lot_zone').removeClass('vente-en-lot-section')
            $('.tm-price-section-1').addClass('prix-half-width')
            $('#prix-appercu').removeClass('text-align-center')
            $('#prix-appercu').addClass('text-align-right')
        }else{
            $('.tm-price-section-2').addClass('s-none')
            $('#tm_vente_en_lot_zone').addClass('vente-en-lot-section')

            $('.tm-price-section-1').removeClass('prix-half-width')
            $('#prix-appercu').addClass('text-align-center')
            $('#prix-appercu').removeClass('text-align-right')
        }

        // -------------------- artitcle associer -------------------
        $.ajax({
            method: 'GET',
            url: 'rayon_articles_associer/'+id_rayon,
            success: function(response) {

                if (response.length > 0) {

                    $('.produit-associer-section').empty();

                    if (response.length > 0) {
                        $('.produit-associer-section').empty();
                        for (let j = 0; j < response.length; j++) {
                            let rayon_produit_associer = '<a title="'+response[j]['libelle']+'"><img src="storage/images/rayons/'+response[j]['logo']+'" alt="B"></a>'
                            $('.produit-associer-section').append(rayon_produit_associer)
                        }
                    }
                }
                // $('#payement-marchand-preview').text(response['cardInfo'][0]['type_carte'])
            }
        })

    })

    // ecoute de vente par lot pour besion de preview
    $('#nbre_produit_lot').on('keyup', function() {
        console.log('Voici votre lot', $('#nbre_produit_lot').val())
        let nombre_par_lot = Number($('#nbre_produit_lot').val())
        let prix_par_lot = Number($('#prix_achat').val());
        let prix_unitaire = prix_par_lot / nombre_par_lot
        $('#tm_nombre_par_lot').text(nombre_par_lot)
        $('#prod_prix_unitaire').text(prix_unitaire)
    })

    // ----------------------- categorie ---------------------
    $("#showImagePopup").on('click', function(){
        $.ajax({
            method: 'GET',
            url: 'famille_etagere_image/'+$('#produit-famille').find(':selected').val(),
            data: {},
            headers: {},
            success: function(response) {
                var imagePath = response;
                // --------------------------
                $('.ImagePopContainer').empty();

                if (response.length > 0) {
                    _.each(imagePath, function(prodPhoto){
                        $('.ImagePopContainer').append(`<button onclick=getImageId(${prodPhoto.id}) id="img_${prodPhoto.id}" class="imgx"><span class="gotIt"><img src="/uploads/${prodPhoto.path}"></span></button>`)
                    });
                }else if(_.isUndefined(response)){
                    $('.ImagePopContainer').append(`<span class="gotIt" style="width: 163px; position: relative; left: 192px; top: 85px"><p>Tu n'as pas d'Image</p></span>`)
                }
                else{
                    $('.ImagePopContainer').append(`<span class="gotIt" style="width: 163px; position: relative; left: 192px; top: 85px "><p>Tu n'as pas d'Image</p></span>`)
                }

            },
            error: function(){
                $('.ImagePopContainer').append(`<span class="gotIt" style="width: 163px; position: relative; left: 192px; top: 85px" ><p>Tu n'as pas d'Image</p></span>`)
            }// fin error
        })

            $('#kingPop').addClass('hide');
            $('#kingpop2').removeClass('hide');
    })

    // remplissage automatique de la description de preview
    $('#description_produit').on('keyup', function() {
        let description = $('#description_produit').val();
        $('#description-preview').text(description)
    })

    // remplissage automatique du prix lors du preview
    $('#prix_achat').on('keyup', function() {
        let prix = $('#prix_achat').val()
        var DevisesUser2 = sessionStorage.getItem("devises"); // added code
        $('#prix-appercu').text(prix + ' '+ DevisesUser2)
    })

    // ------------- Negociation ------------------------
    $('#negociation_prix').on('change', function(){
        if ($('#negociation_prix').is(":checked"))
        {
            $('#negociation-desactivation').removeClass('negociation-section')
        }else {
            $('#negociation-desactivation').addClass('negociation-section')
        }
    })

    $('#accepter_offre_inferieur').on('change', function(){
        if ($('#accepter_offre_inferieur').is(':checked')) {
            $('#accepter_offre_inferieur-valeur').removeClass('negociation-section-desabled')
            $('#accepter_offre_inferieur-valeur').css('background-color','#fff')
        }else{
            $('#accepter_offre_inferieur-valeur').addClass('negociation-section-desabled')
            $('#accepter_offre_inferieur-valeur').css('background-color','#D8D8D8')
        }
    })

    $('#refuse_offre_inferieur').on('change', function() {
        if ($('#refuse_offre_inferieur').is(':checked')) {
            $('#refuse_offre_inferieur-value').removeClass('negociation-section-desabled')
            $('#refuse_offre_inferieur-value').css('background-color','#fff')
        }else{
            $('#refuse_offre_inferieur-value').addClass('negociation-section-desabled')
            $('#refuse_offre_inferieur-value').css('background-color','#D8D8D8')
        }
    })

    // achat multiple---------------------------------------------------------
    $('#check_negociation_reduction').on('change', function() {
        if ($('#check_negociation_reduction').is(":checked"))
        {
            $('#achat-multiple-values').removeClass('negociation-section')
        }else {
            $('#achat-multiple-values').addClass('negociation-section')
        }
    })

    // achat 05 produit-----------------------------------------------------
    $('#negocier-1').on('change', function(){
        if ($('#negocier-1').is(':checked')) {
            $('#negocier-1-value').removeClass('negociation-section-desabled')
        }else{
            $('#negocier-1-value').addClass('negociation-section-desabled')
        }
    })

    // achat 10 produit-----------------------------------------------------
    $('#negocier-2').on('change', function(){
        if ($('#negocier-2').is(':checked')) {
            $('#negocier-2-value').removeClass('negociation-section-desabled')
        }else{
            $('#negocier-2-value').addClass('negociation-section-desabled')
        }
    })

    // achat 20 produit-----------------------------------------------------
    $('#negocier-3').on('change', function(){
        if ($('#negocier-3').is(':checked')) {
            $('#negocier-3-value').removeClass('negociation-section-desabled')
        }else{
            $('#negocier-3-value').addClass('negociation-section-desabled')
        }
    })

    // Option de retour-----------------------------------------------------------------------------
    $('#retour-nationaux').on('change', function(){
        let flag_national = false
        if ($('#retour-nationaux').is(":checked") && $('#retour-internationaux').is(":checked"))
        {
            $('#section-national').removeClass('retour-section-desabled')
            $('#section-retour-description').removeClass('retour-section-desabled')
            var text_final ="Retours nationaux et internationaux acceptés."
            flag_national = true;
            $('#option_retour-preview').text(text_final)
        }else if($('#retour-nationaux').is(":checked")){
            $('#section-national').removeClass('retour-section-desabled')
            $('#section-retour-description').removeClass('retour-section-desabled')
            var text_final ="Retours nationaux acceptés."
            flag_national = true;
            $('#option_retour-preview').text(text_final)
        }
        else if($('#retour-internationaux').is(":checked")) {
            var text_final ="Retours internationaux acceptés."
            $('#option_retour-preview').text(text_final)
            $('#section-national').addClass('retour-section-desabled')
        }else {
            var text_final ="Article ne disposant pas de retour."
            $('#option_retour-preview').text(text_final)
            $('#section-national').addClass('retour-section-desabled')
            $('#section-retour-description').addClass('retour-section-desabled')
        }
    })

    $('#retour-internationaux').on('change', function(){
        let flag_international = false
        if ($('#retour-internationaux').is(":checked") && $('#retour-nationaux').is(":checked"))
        {
            $('#section-international').removeClass('retour-section-desabled')
            $('#section-retour-description').removeClass('retour-section-desabled')
            var text_final ="Retours nationaux et internationaux acceptés."
            flag_international = true
            $('#option_retour-preview').text(text_final)
        }else if($('#retour-internationaux').is(":checked")){
            $('#section-international').removeClass('retour-section-desabled')
            $('#section-retour-description').removeClass('retour-section-desabled')
            var text_final ="Retours internationaux acceptés."
            flag_international = true
            $('#option_retour-preview').text(text_final)
        }
        else if($('#retour-nationaux').is(":checked")) {
            $('#section-international').addClass('retour-section-desabled')
            var text_final ="Retours nationaux acceptés."
            $('#option_retour-preview').text(text_final)
        }else {
            $('#section-international').addClass('retour-section-desabled')
            $('#section-retour-description').addClass('retour-section-desabled')
            var text_final ="Article ne disposant pas de retour."
            $('#option_retour-preview').text(text_final)
        }
    })

            // ---------------------Expedition ---------------------------------
    // expedition national on change
    $('#expedition-national').on('change', function(){
        if ($('#expedition-national').is(":checked")) //
        {
            $('#zone-expedition-national-disable-not').removeClass('retour-section-desabled');
        }else {
            $('#zone-expedition-national-disable-not').addClass('retour-section-desabled');
        }
    })

$('#produit-famille').on('change', function() {

    let id_famille = $(this).val()

    $.ajax({
    type: 'GET',
    url: '/get_famille_sous_categorie',
    data: {id_famille: id_famille},
    success: function(response) {

    $('#produit-famille-sousCategorie').empty();
    $('#display-size-zone').remove()

    $('.caracteristique_element').empty()
    $('.caracteristique-preview-element').empty()

    var element1 = [];  //caracteristique-preview
    var select_element = [];

    var sous_categorie_option = []
    var caracteristique_categoris = []

    if(response['sous_categorie'].length > 0) {

        for (let u = 0; u < response['sous_categorie'].length; u++) {
            sous_categorie_option += '<option value = '+response['sous_categorie'][u]['id']+'>'+response['sous_categorie'][u]['libelle']+'</option>';
        }

        sous_categorie_option += '<option value="add-sous-cat">Ajouter une sous catégorie</option>';

    }else {
        sous_categorie_option += '<option value="add-sous-cat-1">-- Selectionner une sous catégorie</option><option value="add-sous-cat">Ajouter une sous catégorie</option>'
    }

    $('#produit-famille-sousCategorie').append(sous_categorie_option)

    for(var key in response['cat_caracteristique']){

        var element_id = key.replace(/\s/g, '');
        var element_id1 = element_id.replace(/'/g, '')
        var element_id_final = element_id1.toLowerCase();
    
        select_element += "<div class='caracteristique-zone'><label class='labele-items' style='position: relative; left: 0px'><small class='red-star'>*</small>"+key+"</label><select class='caracterisqueProd' select-type='Normal' data-select='"+key+"' name='"+key+"' id='"+element_id_final+"' onchange=caracteristiqueChanged('"+element_id_final+"') >"+response['cat_caracteristique'][key]+"<option value='aucun'>Aucun</option></select>"
    
        select_element += "<div style='display: flex; margin-top: 5px'><span class='caracteristique-frequent-label'>Fréquent : </span><span class='caracteristique-frequent s-none'>iPhone 6s , iPhone 8 , iPhone X</span></div>"
        select_element += "</div>"
    
        $('.caracteristique-preview-element').append("<div class='caracteristique-zone-preview'><label class='labele-items' style='position: relative; left: 20px'>"+key+"</label><select id='p"+element_id_final+"'  class='caracterisqueProdPreview' name='"+key+"' >"+response['cat_caracteristique'][key]+"</select></div>")
        element1.push(element_id_final)
    
    }
    
    $('.caracteristique_element').append(select_element)
    var nbre_caracteristique = document.getElementsByClassName('caracteristique-zone');

    let bouton_ajout_caracteristique = []

    bouton_ajout_caracteristique += '<div id="btn-attr-product" class="ajoutcaracte" style=" width: 253px; display: flex; flex-direction: column;">'

    bouton_ajout_caracteristique += '<label class="labele-items">Ajouter une autre caractéristique</label> '
    bouton_ajout_caracteristique += '<button class="ajout-caracteristique-btn" onclick="showAjoutCaracteristique()">+</button>'
    bouton_ajout_caracteristique += '<div class="caracteristique-supplementaire s-none"><div class="row-supp-1"><label for="" style="margin-left: 7px; ">Nom:</label><div><input type="text" style="  height: 31px; width: 158px;border-radius: 6px;background-color: #F8F8F8; padding-left: 10px" id="caracteristique_libelle"></div>'

    bouton_ajout_caracteristique += '<button disabled id="validateNomCaracteristique" style="height: 31px;width: 31px;border-radius: 6px;background-color: #D8D8D8; border: none; color: #fff; font-size: 24px; font-weight: 900" onclick="validerCaracteristique()"><svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-check" viewBox="0 0 16 16"><path d="M10.97 4.97a.75.75 0 0 1 1.07 1.05l-3.99 4.99a.75.75 0 0 1-1.08.02L4.324 8.384a.75.75 0 1 1 1.06-1.06l2.094 2.093 3.473-4.425a.267.267 0 0 1 .02-.022z"/></svg></button></div>'

    bouton_ajout_caracteristique += '<div class="row-supp-2" id="myInputCaracteristiqueContainer"><div style="margin-left: 5xp"><input type="text" id="attribute_1" onkeyup="activeValidateButton()" class="add-input-caracteristique" ><span onclick="closeInputUrl("photo_2-url")"class="clean-text-suggestion " style="position: absolute; margin-left: -16px; color: red; font-size: 20px">&times;</span></div><div class="bouton-ajout-caract">'

    bouton_ajout_caracteristique += '<button style="  box-sizing: border-box;height: 31px;width: 118px;border: 1px solid #1A7EF5;border-radius: 6px;background-color: #FFFFFF; margin-left: 5px" onclick="addAttributeElements()">+</button></div></div><div class="row-supp-2"></div></div></div>'

    $('.caracteristique_element').append(bouton_ajout_caracteristique)

    $('#tabcaracteristique').val([element1])

    if (response['caracteristique'].length > 0) {
    var categorie_caracteristique = response['caracteristique'];
    for (let index = 0; index < categorie_caracteristique.length; index++) {
    const tab_element = categorie_caracteristique[index];
    // console.log('Vite fait')
    if (tab_element.libelle == 'Dimensions') {

    }

    if (tab_element.libelle == 'Vitesse') {
        var dimesion
        = `<div class="caracteristique-zone categorie-caracteristique" ><label class="labele-items" >${tab_element.libelle}</label><div class="d-input-container" style="justify-content: flex-start;">
            <div class="d-length main-dd">
                <input type="text" class="input-dimension" id="vitesse" style="width: 249px; height: 41px; border: 1px solid #979797; position: relative; left: -7px; padding-left: 10px;"><span style="position: absolute; margin-left: -61px; margin-top: 8px;"> / Mbps</span>
            </div>
        </div></div>`

        $(dimesion).insertBefore('#btn-attr-product')
    }

    }

    if (response['caracteristique'][0].id_caracteristique == 13) {

    caracteristique_categoris += '<div class="caracteristique-zone" id="display-size-zone"><label class="labele-items">Taille de l\'écran</label><select class="caracterisqueProd">'

    console.log('Caracteristique envisagé:', response['caracteristique'])

    for (let u = 2; u < response['caracteristique'].length; u++) {
        caracteristique_categoris += '<option value = '+response['caracteristique'][u]['range_sur_etagere']+'>'+response['caracteristique'][u]['valeur']+'</option>';
    }

    caracteristique_categoris += '</select><div>'
    $(caracteristique_categoris).insertBefore('#btn-attr-product')

    }else {
    caracteristique_categoris += '<div class="caracteristique-zone" id="display-size-zone"><label class="labele-items">Taille de l\'écran</label><select class="caracterisqueProd">'
    for (let u = 0; u < response['caracteristique'].length; u++) {

        console.log('La taille sur étagère doit être => ', response['caracteristique'][u]['valeur'])
        caracteristique_categoris += '<option value = '+response['caracteristique'][u]['range_sur_etagere']+'>'+response['caracteristique'][u]['valeur']+'</option>';
    }
    caracteristique_categoris += '</select><div>'
    $(caracteristique_categoris).insertBefore('#btn-attr-product')
    }

    }else {
        $('#display-size-zone').remove()
    }

    }
    })
    })

    $('#produit-famille-sousCategorie').on('change', function() {
        var add_val = $(this).find(':selected').val();
        if(add_val == "add-sous-cat") {
            $('#ajout-sous-cat-section').removeClass('s-none')
        }else {
            $('#ajout-sous-cat-section').addClass('s-none')
        }
    })

})

function ajout_sous_cat_by_categorie() {

    var id_categorie = $('#produit-famille').find(':selected').val();
    var sous_cat_value = $('#new_categorie').val();

    console.log('La valeur est => ', sous_cat_value);

    $.ajax({
    type: "POST",
    url: "/add_sous_caracteristique_value",
    data: {cat: id_categorie, sous_cat_val: sous_cat_value},
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    },
    success: function(response) {

    $('#produit-famille-sousCategorie').empty()

    var sous_categorie_option = []
    var caracteristique_categoris = []

    for (let u = 0; u < response.length; u++) {
        sous_categorie_option += '<option value = '+response[u]['id']+'>'+response[u]['libelle']+'</option>';
    }

    sous_categorie_option += '<option value="add-sous-cat">Ajouter une sous catégorie</option>';

    $('#produit-famille-sousCategorie').append(sous_categorie_option)

    $('#new_categorie').val(" ")
    $('#ajout-sous-cat-section').addClass('s-none')

    }
    })
}

// section function
        // resultat de la recherche cliqué avec chargement de des caracteristiques
        function liClicked(id, libelle) {
            // ----------- my id countings
            let element_id = $('#'+id);
            $('#id_sous_cat').val(id); // id sous categorie en arriere plan
            $('.ul-search').css('display','none') //fermeture de la zone result
            $.ajax({
                type: "POST",
                url: "get_caracteristique_value",
                data: {'idCar': id},
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },

                success: function(response) {
                    let taille_ecran = $('#display-size-zone')
                    $('.caracteristique_element').empty()
                    var element1 = [];  //caracteristique-preview
                    var select_element = [];
                    let input_search_value = $('#searchProduitBar').val();
                    $('#countings').text(input_search_value.length)

                    $('.caracteristique-preview-element').empty()
                   for(var key in response){
                    var element_id = key.replace(/\s/g, '');
                    var element_id1 = element_id.replace(/'/g, '')
                    var element_id_final = element_id1.toLowerCase();
                    select_element += "<div class='caracteristique-zone'><label class='labele-items' style='position: relative; left: 0px'><small class='red-star'>*</small>"+key+"</label><select class='caracterisqueProd' select-type='Normal' data-select='"+key+"' name='"+key+"' id='"+element_id_final+"' onchange=caracteristiqueChanged('"+element_id_final+"')>"+response[key]+"</select>"

                    let caracteristique_preview = []; //initialisation du tableau preview

                    select_element += "<div style='display: flex; margin-top: 5px'><span class='caracteristique-frequent-label'>Fréquent : </span><span class='caracteristique-frequent s-none'>iPhone 6s , iPhone 8 , iPhone X</span></div>"
                    select_element += "</div>"
                    // traitement des caracteristique preview
                    caracteristique_preview += "<div class='caracteristique-zone-preview'>"

                    caracteristique_preview += "<label class='labele-items' style='position: relative; left: 20px'>"+key+"</label>"

                    caracteristique_preview += "<select data-select='"+key+"' class='caracterisqueProdPreview' name='"+key+"' id='p"+element_id_final+"'>"+response[key]+"</select>"

                    caracteristique_preview += "</div>"

                    $('.caracteristique-preview-element').append(caracteristique_preview)
                     element1.push(element_id_final)

                   }

                   $('.caracteristique_element').append(select_element)
                   var nbre_caracteristique = document.getElementsByClassName('caracteristique-zone');
                   //if (nbre_caracteristique.length < 4 ) {
                    var bouton_ajout_caracteristique = '<div id="btn-attr-product" class="ajoutcaracte" style=" width: 253px; display: flex; flex-direction: column;"><label class="labele-items">Ajouter une autre caractéristique</label><button class="ajout-caracteristique-btn" onclick="showAjoutCaracteristique()">+</button><div class="caracteristique-supplementaire s-none"><div class="row-supp-1"><label for="" style="margin-left: 7px; ">Nom:</label><div><input type="text" style="  height: 31px; width: 158px;border-radius: 6px;background-color: #F8F8F8; padding-left: 10px" id="caracteristique_libelle"></div><button disabled id="validateNomCaracteristique" style="height: 31px;width: 31px;border-radius: 6px;background-color: #D8D8D8; border: none; color: #fff; font-size: 24px; font-weight: 900" onclick="validerCaracteristique()"><svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-check" viewBox="0 0 16 16"><path d="M10.97 4.97a.75.75 0 0 1 1.07 1.05l-3.99 4.99a.75.75 0 0 1-1.08.02L4.324 8.384a.75.75 0 1 1 1.06-1.06l2.094 2.093 3.473-4.425a.267.267 0 0 1 .02-.022z"/></svg></button></div><div class="row-supp-2" id="myInputCaracteristiqueContainer"><div style="margin-left: 5xp"><input type="text" id="attribute_1" onkeyup="activeValidateButton()" class="add-input-caracteristique" ><span onclick="closeInputUrl("photo_2-url")"class="clean-text-suggestion " style="position: absolute; margin-left: -16px; color: red; font-size: 20px">&times;</span></div><div class="bouton-ajout-caract"><button style="  box-sizing: border-box;height: 31px;width: 118px;border: 1px solid #1A7EF5;border-radius: 6px;background-color: #FFFFFF; margin-left: 5px" onclick="addAttributeElements()">+</button></div></div><div class="row-supp-2"></div></div></div> '
                        $('.caracteristique_element').append(bouton_ajout_caracteristique)
                   //}

                   if (nbre_caracteristique.length > 4) {
                        console.log('supperieur à 4')
                        // $('.resultat-element').css('padding-bottom', '0px')
                        $('#main_caracteristique_section1').removeClass('caracteristiques-section-elements-min')
                        $('#main_caracteristique_section1').addClass('caracteristiques-section-elements-max')
                   }else {
                    console.log('inferieur à 4')
                        $('#main_caracteristique_section1').addClass('caracteristiques-section-elements-min')
                        $('#main_caracteristique_section1').removeClass('caracteristiques-section-elements-max')
                   }

                   $(taille_ecran).insertBefore('#btn-attr-product')

                   $('#tabcaracteristique').val([element1])

                }
            })

        }

        function setFamilleSousCatSize (id_famille) {

                $.ajax({
                    type: 'GET',
                    url: '/get_famille_sous_categorie',
                    data: {id_famille: id_famille},
                    success: function(response) {
                        // console.log('Retour de la requette', response)
                        console.log('Response retour:', response);
                        $('#produit-famille-sousCategorie').empty();

                        var sous_categorie_option = []
                        var caracteristique_categoris = []

                        for (let u = 0; u < response['sous_categorie'].length; u++) {
                            sous_categorie_option += '<option value = '+response['sous_categorie'][u]['id']+'>'+response['sous_categorie'][u]['libelle']+'</option>';
                        }

                        $('#produit-famille-sousCategorie').append(sous_categorie_option)

                        if (response['caracteristique'].length > 0) {
                            caracteristique_categoris += '<div class="caracteristique-zone" id="display-size-zone"><label class="labele-items">Taille de l\'écran</label><select class="caracterisqueProd">'
                            for (let u = 0; u < response['caracteristique'].length; u++) {
                                caracteristique_categoris += '<option value = '+response['caracteristique'][u]['id']+'>'+response['caracteristique'][u]['valeur']+'</option>';
                            }
                            caracteristique_categoris += '</select><div>'

                            console.log('caract taille:', caracteristique_categoris)
                            // $(caracteristique_categoris).insertBefore('#btn-attr-product')
                            $('#caracteristique_element-id').append(caracteristique_categoris)
                        }
                    }
                })

        }
// changement de caracteristiques
function caracteristiqueChanged(id) {
    let caract_zone = $('#'+id).find(':selected').index()
    let libelle_caracteristique = $('#'+id).find(':selected').text();
    let second_val = $("#p"+id).find('option[text="'+caract_zone+'"]')
    if (id == "unitedemballage") {
        console.log('Voici l\'unité de vente ici:', caract_zone)
        $('#unite_de_vente').text(libelle_caracteristique)
        $('#unite_de_vente2').text(libelle_caracteristique)
    }
    $('#p'+id+' option').eq(caract_zone).prop('selected',true);
    console.log('Here is the caracteristique:', id)
}

// page suivant vers expedition

function showTabAnnonceVenteStep1(){
    var description = $('#prix_achat').val();
    var quantite = $('#quantite_produit_disponible').val()

    if (description.length == 0) {
        $('#prix_achat').addClass('error-produit')
    }

    if (quantite.length == 0) {
        $('#quantite_produit_disponible').addClass('error-produit')
        let element1 = document.getElementById('rightModalContainerElement')
        element1.scrollTo({top: 0, left:1000, behavior: 'smooth'});
    }

    var nbre_produit_lot = $('#nbre_produit_lot').val();

    if ($('#vente_par_lot').is(":checked") && nbre_produit_lot == 0) {
        $('#nbre_produit_lot').addClass('error-produit')
    }

    if (description.length >0 && quantite.length > 0 && (!$('#nbre_produit_lot').hasClass('error-produit')) && !$('#accepter_offre_inferieur-valeur').hasClass('error-produit') && !$('#refuse_offre_inferieur-value').hasClass('error-produit') && !$('#negocier-1-value').hasClass('error-produit') && !$('#negocier-2-value').hasClass('error-produit') && !$('#negocier-3-value').hasClass('error-produit')) {
        if ($('#step1AnnonceVente').hasClass('active-annonce-show')) {
        $('#step1AnnonceVente').removeClass('active-annonce-show')
        $('#step1AnnonceVente').addClass('s-none')
        $('#step2AnnonceVente').removeClass('s-none')
        $('#step2AnnonceVente').addClass('active-annonce-show')

    }else if ($('#step2AnnonceVente').hasClass('active-annonce-show')) {
        $('#step2AnnonceVente').removeClass('active-annonce-show')
        $('#step1AnnonceVente').addClass('s-none')
        $('#step2AnnonceVente').addClass('s-none')
        $('#step3AnnonceVente').removeClass('s-none')
        $('#step3AnnonceVente').addClass('active-annonce-show')
    }
    }

}

// updating a product
function produitUpdate() {
    let mode_nation = $('#expedition-national').val();
    var formData = new FormData();

    for (let i = 1; i < 8; i++) {
        var regler_par_marchand = $('#vouspayer'+i).val();
        var regler_par_client = $('#clientpaie'+i).val();
        var prix_client = $('#clientpaieInput'+i).val();
        var hidden_mode = $('#hiddenmode'+i).val();
        if (hidden_mode != undefined) {
            var tab = [hidden_mode, regler_par_marchand, regler_par_client, prix_client, ]
            formData.append('expedition[]', tab)
        }
        }

    // _____________expedition_______________
    for (let y = 0; y < 6; y++) {
        let img = $('#photo_'+y+'-view').attr('src')

        if (img !== 'assets/images/icones-vendeurs2/image_outline_icon_139447.svg') {
            if (img.indexOf('data:image') == -1) {
                image_final = img.replace('uploads/', '')
                formData.append('vendre_meme_produit_images[]', image_final)
            }
        }
    }

    // //             // // ------------produit--------------
    let libelle_produit = $('#libelle-produit').val();
    var id_produit = $('#id_produit_update').val();
    let id_sous_cat = $('#id_sous_cat').val()  //id de la sous categorie
    let description = $('#description_produit').val();
    let prix_achat = $('#prix_achat').val();
    let quantite_disponible = $('#quantite_produit_disponible').val();
    let nbre_produit_lot = $('#nbre_produit_lot').val();
    let vente_en_lot = $('#vente_par_lot').is(":checked");
    let rayon_produit = $('#produit-rayon').find(':selected').val();

    let negociation = $('#negociation_prix').val();
    // // // si oui accepter_offre_inferieur-valeur
    let accepter_offre_inferieur = $('#accepter_offre_inferieur').val();
    // var boutique_pays = $('#boutique_pays').find(':selected').val();
    let accepter_offre_inferieur_valeur = $('#accepter_offre_inferieur-valeur').val();
    //
    let refuse_offre_inferieur = $('#refuse_offre_inferieur').val();
    let refuse_offre_inferieur_value = $('#refuse_offre_inferieur-value').val(); //refuse_offre_inferieur-value

    let negociation_reduction = $('#check_negociation_reduction').val();
    let negocier_5 = $('#negocier-1').val();
    let negocier_5_value = $('#negocier-1-value').find(':selected').text();

    let negocier_15 = $('#negocier-2').val();
    let negocier_15_value = $('#negocier-2-value').find(':selected').text();

    let negocier_20 = $('#negocier-3').val();
    let negocier_20_value = $('#negocier-3-value').find(':selected').text();

    //             // // mode expedition
    formData.append('mode_nation', mode_nation);
    formData.append('mode_internationalnation', mode_nation);

    //             // // // option de retour

    let retour_nationaux = $('#retour-nationaux').val();
    let retour_internationnaux = $('#retour-internationaux').val();
    let delais = $('#delais-annulation').find(':selected').text();
    let frais_retour = $('#frais_retourd').find(':selected').text();

    if ($('#retour-internationaux').is(':checked') && $('#retour-nationaux').is(':checked')) {
        retour = "International et national";
    }else if($('#retour-internationaux').is(':checked')){
        retour = $('#retour-internationaux').val();
    }else if($('#retour-nationaux').is(':checked')){
        retour = $('#retour-nationaux').val();
    }

    for (let i = 1; i < 11; i++) {
    if ($('#pays'+i).is(':checked')) {
        var pays = $('#pays'+i).val()
        formData.append('pays_exclu['+i+']', pays)
    }
    }

    let detail_expedition = $('#detail-retour').val();

    for (let index = 0; index < modification_attribut.length; index++) {
        formData.append('produitAttribut[]', modification_attribut[index])
    }

    formData.append('libelle', libelle_produit);
    formData.append('id_sous_cat', id_sous_cat);
    formData.append('description', description);
    formData.append('prix', prix_achat);
    formData.append('quantite', quantite_disponible)
    formData.append('vente_en_lot', vente_en_lot)
    formData.append('nbre_produit_lot', nbre_produit_lot)
    formData.append('rayon_produit', rayon_produit)
    formData.append('id_produit', id_produit);


    for (let index = 0; index < images_produit_normal.length; index++) {
        formData.append('image_'+index, images_produit_normal[index])
    }

    // recuperation des images un à un
    let image0 = $('#photo_0').get(0).files[0]; // image principal
    let image1 = $('#photo_1').get(0).files[0];
    let image2 = $('#photo_2').get(0).files[0];
    let image3 = $('#photo_3').get(0).files[0];
    let image4 = $('#photo_4').get(0).files[0];
    let image5 = $('#photo_5').get(0).files[0];

    formData.append('image0', image0)
    formData.append('image1', image1)
    formData.append('image2', image2)
    formData.append('image3', image3)
    formData.append('image4', image4)
    formData.append('image5', image5)

    formData.append('marge_negociable', negociation),
    formData.append('accepter_offre_inferieur', accepter_offre_inferieur)
    formData.append('accepter_offre_inferieur_valeur', accepter_offre_inferieur_valeur)
    formData.append('refuse_offre_inferieur', refuse_offre_inferieur_value)

    // reduction negociation multiple

    formData.append('negocier_5', negocier_5);
    formData.append('negocier_1_value', negocier_5_value);
    formData.append('negocier_15', negocier_15);
    formData.append('negocier_2_value', negocier_15_value);
    formData.append('negocier_20', negocier_20);
    formData.append('negocier_3_value', negocier_20_value);

    // retour option
    formData.append('retour_nationaux', retour_nationaux);
    formData.append('retour_internationnaux', retour_internationnaux);
    formData.append('delais', delais);
    formData.append('frais_retour', frais_retour);
    formData.append('detail_expedition', detail_expedition);
    // formData.append('caract_produit', caract_produit);
    formData.append('retour_product', retour)

    //             // // section caracteristique
    var caract = $('#tabcaracteristique').val();
    var id_tab = caract.split(",")
    let tacaracteristique = [];

    for (let i = 0; i < id_tab.length; i++) {
        var selectedcaract = $('#'+id_tab[i]).find(':selected').text()
        var dataf_selected = $('#'+id_tab[i]).attr('data-select')
        tacaracteristique[i] = selectedcaract
        formData.append('caracteristiques_final['+dataf_selected+']', selectedcaract)
    }

    for(let j = 1; j < 4 ; j++){
        var negociation_val = $('#negocier-'+j+'-value').find(':selected').text();
        var negocier = $('#negocier-'+j).val()
        formData.append('negociation['+negocier+']', negociation_val)
    }


    for (let u = 0; u < images_produit_web.length; u++) {
        formData.append('images_web[]', images_produit_web[u])
    }

    // verification si ya la video
    if ($('#videoPreviewInput').val() != '' || $('#videoPreviewInput').val() != null) {
        var produit_video = $('#videoPreviewInput').val()
        formData.append('produit_video', produit_video)
    }


    formData.append('produit_caracteristique[]', tacaracteristique)

    for (let u = 0; u < caracteristique_supp.length; u++) {
        formData.append('caracteristique_supplementaire[]', caracteristique_supp[u])
    }

    $.ajax({
        type:'POST',
        url:"update_produit",
        data: formData,
        contentType: false,
        processData: false,
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        success:function(response){
            console.log('response updated', response)
            if (response == "SUCCESS") {
                alert("Produit mise à jour avec succès")
                    window.location.reload()
            }else{
                alert("Ouf il s'est produit un petit soucis, veillez reéssayiez merci.")
            }
        }
    });
    }

            // edit product
function editProduct(id) {

    $('#detailAnnonce').removeClass('none-detail-annonece')
    $('#modifierProduitBtn').removeClass('s-none')
    $('#mettreEnRayonBtn').addClass('s-none')

    $.ajax({
        method: 'GET',
        url: 'modifier_produit_marchand/'+id,
        data: {},
        headers: {},
        success: function(response){

        $('#edit-hidden-value').val(1)
        $('#id_produit_update').val(id)
        $('#libelle-produit').val(response[0][0]['libelle'])
        $('#description_produit').val(response[0][0]['description'])
        $('#suivant-step1').removeAttr('disabled')
        $('#suivant-step1').css('background-color', '#1A7EF5')
        $('#save-all-image-button').addClass('saved')
        $('#prix_achat').val(response[0][0]['prix'])
        $('#quantite_produit_disponible').val(response[0][0]['quantite'])
        $('#id_sous_cat').val(response[0][0]['sous_categorie_id'])
        $('#vendre-meme-produit').val('false')
        $('#produit-rayon').val(response[0][0]['id_rayon']).select()

// get rayon univers
        console.log('avant ta requete')
        $.ajax({
            method: 'GET',
            url: 'rayon_univers/'+response[0][0]['id_rayon'],
            data: {},
            headers: {},
            success: function(response) {
                console.log(response)
                $('#univer-boutique').val(response['univer_id']).select();
                $('#produit-famille').empty()
                for(let y = 0; y < response['familles'].length; y++) {
                    $('#produit-famille').append('<option>'+response['familles'][y]['libelle']+'</option>')
                }

            },
            error: function(error) {
                console.log('vous avez une erreur')
            }
        })

        for (let j = 0; j < response[0][0]['produit_attribut'].length; j++) {
            // composition de l'attribut et de la valeur pour transporter les deux ensemble
            modification_attribut.push(response[0][0]['produit_attribut'][j]['id']+'/'+response[0][0]['produit_attribut'][j]['valeur']);
        }

        $('#photo_0-view').attr('src', 'uploads/'+response[0][0]['image'])
        $('#photo_0-view').attr('height', "100px")
        $('#photo_0-view').attr('width', "100px")
        $('#photo_0-view').css({'display':'block', 'height': '100px !important', 'width': '100px !important'});
        $('#photo_0-view').css('border-radius','6px')
        $('#photo_0-view').css('margin-right','-4px')

        if (response[0][0]['vente_en_lot'] !== 'false') {
            $('#vente_par_lot').prop('checked', true)
            $('#nbre_produit_lot').removeClass('desable-input');
            $('#nbre_produit_lot').val(response[0][0]['nbre_par_lot'])
        }

        // special zone négociation
        if(response[0][0]['accepte_offresuppa'] !== null) {
            $('#negociation-desactivation').removeClass('negociation-section')
            $('#accepter_offre_inferieur-valeur').removeClass('negociation-section-desabled')
            $('#accepter_offre_inferieur-valeur').css('background-color','#fff')
            $('#accepter_offre_inferieur').prop('checked', true)
            $('#accepter_offre_inferieur-valeur').val(response[0][0]['accepte_offresuppa'])
            $('#negociation_prix').prop('checked', true)
        }

        if(response[0][0]['refuser_offreinfa'] !== null) {

            $('#refuse_offre_inferieur').prop('checked', true)
            $('#refuse_offre_inferieur-value').removeClass('negociation-section-desabled')
            $('#refuse_offre_inferieur-value').css('background-color','#fff')
            $('#refuse_offre_inferieur-value').val(response[0][0]['refuser_offreinfa'])
            $('#negociation_prix').prop('checked', true)

        }

        // zone reservé à l'achat multiple
        if (response[0][0]['vente_en_lot'] == 'false') {

        }

        if(response[0][0]['retour_produit'] == 'Retour national') {
            $('#retour-nationaux').prop('checked', true);
            $('#section-national').removeClass('retour-section-desabled')
            $('#section-retour-description').removeClass('retour-section-desabled')
        }

        if(response[0][0]['retour_produit'] == 'Retour International') {
            $('#retour-internationaux').prop('checked', true);
            $('#section-international').removeClass('retour-section-desabled')
            $('#section-retour-description').removeClass('retour-section-desabled')
        }

        console.log('expedition', response[1][0])

        // traitement du mode d'expedition condition à changer
        if (response[1][0] != undefined) {
            $('#zone-expedition-national-disable-not').removeClass('retour-section-desabled');

            for (let y = 0; y < response[1].length; y++) {
                // recuperation du mode d'expedition
                var sigle_mode =  []
            // mode_expedition.push(response[0].mode_expedition)/
            $('#mode-expedition-national-value').val(response[1][0].id) //input to store

            $('#zone-expedition-national-add').removeClass('s-none')

            sigle_mode = '<div id="mode-expe'+response[1][y].id+'" style="border-bottom: 1px solid #979797">'

            sigle_mode += '<section style="height: 219px; width: 300px; border-right: 1px solid #979797; background-color: fff; border-radius: 6px 0px 0px 0px"> <img src="assets/images/icones-vendeurs2/'+response[1][y].photo_mode_expedition+'" style=" height: 27px;width: 43.2px;margin-left:129px;margin-top:30px;">'

            sigle_mode += '<article style="  height: 20px; width: 301px;background-color: #F8F8F8;margin-top:15px;"><span style="width: 68px;color: #000000;font-family: Roboto;font-size: 14px;letter-spacing: 0.31px;line-height: 14px;text-align:center;padding-top: 3.5px; position: relative; left: 90px; top: 3px">Envoie par ' +response[1][y].mode_expedition+' </article>'

            sigle_mode += '<article style="  height: 20px;width: 301px;background-color: #F8F8F8;margin-top:10px;"><p style=" color: #191970;font-family: Roboto;font-size: 12px;letter-spacing: 0.26px;line-height: 14px;text-align:center;padding:2px; padding-top: 3.5px">'+response[1][y].caracteristique+'</p></article>'

            sigle_mode += '<article style="  height: 20px;width: 301px;background-color: #F8F8F8;margin-top:10px;padding:2px;"><p style="color: #000000font-family: Roboto;font-size: 12px;font-weight: 500;letter-spacing: 0.26px;line-height: 14px;text-align:center; padding-top: 2px">'+response[1][y].prix+'FCFA  - '+response[1][y].prix_max+'FCFA</p></article>'

            sigle_mode += '<p class="expedition-modif-supp" style=" color: #1A7EF5;font-family: Roboto;font-size: 10px;letter-spacing: 0.26px;line-height: 11px;text-align: center;margin-top:20px; position: relative; left: 15px"> <a href="#" onclick=changeModeExpedition("'+response[1][0].id+'")>Modifier</a> | <a href="#" onclick="deleteModeExpedition('+response[1][0].id+')">Supprimer</a></p></section>'
                // end first section

            sigle_mode +='<section style="height: 219px; width: 217px;margin-top:-219px; position: relative; left:299px;padding-left: 15px; border-left: 1px solid #979797; background-color: #fff; border-radius: 0px 6px 0px 0px">'

            sigle_mode +='<label class="form-check-label" for="defaultCheck1" style="color: #191970;font-family: Roboto;font-size: 12px;font-weight: 500;letter-spacing: 0;line-height: 14px;margin-top:15px;"><input onclick="toggleFraisExpedition('+response[1][y].id+')" id="vouspayer'+response[1][0].id+'" class="form-check-input" type="checkbox"  style="  height: 18px;width: 18px;border-radius: 2px; margin:0px" value="marchand"><span style="position: relative; left: 10px; top: 1px">Vous payez</span></label>'

            sigle_mode += '<p style="  color: #4A4A4A;font-family: Roboto;font-size: 9px;letter-spacing: 0;line-height: 12px;margin-top:10px;">L’expédition est gratuite pour le client.<br>Frais calculés en fonction du lieu où il se trouve.</p><hr style="  height: 1px;width: 192px;border: 1px solid #D8D8D8;margin-top:10px;margin-left:-2pxpx;"><input onclick="toggleFraisExpedition1('+response[1][y].id+')" value="client" id="clientpaie'+response[1][0].id+'" class="form-check-input" type="checkbox"  style="  height: 18px; width: 18px;border-radius: 2px; margin: 0px">'

            sigle_mode += '<label class="form-check-label" for="defaultCheck1" style=" color: #191970;font-family: Roboto;font-size: 12px;font-weight: 500;letter-spacing: 0;line-height: 14px; margin-left: 10px; width: 137px;">Le client paie les frais de</label><br> <label style="position: relative; left: 30px; color: #191970;font-family: Roboto;font-size: 12px;font-weight: 500;letter-spacing: 0;line-height: 6px;">livraison fixes</label><br><span style="  color: #4A4A4A;font-family: Roboto;font-size: 9px;letter-spacing: 0;line-height: 12px;">L’expédition est à prix fixes pour le client.<br> Frais calculés en fonction du lieu où il se trouve.</span><div style="display: flex; margin-top:10px">'

            sigle_mode += '<input id="clientpaieInput'+response[1][y].id+'" class="negociation-section-desabled" type="text" placeholder="-"  style="width: 156px;height:31px;border-bottom-left-radius: 5px;border-top-left-radius: 5px;font-size: 18px;border: 1px solid #9B9B9B;padding-left:10px;background-color: #D8D8D8; height: 41px; width: 136px;"><input id="hiddenmode'+response[1][y].id+'" type="hidden" value="'+response[1][0].id+'">'

            sigle_mode += '<aside style="border: 1px solid #9B9B9B;text-align:center;  font-family: Roboto;font-size: 14px;letter-spacing: -0.34px;line-height: 16px;border-radius: 0 6px 6px 0;background-color: #D8D8D8;margin-left:0px ; padding-top:12.5px; padding-right: -1px;  height: 41px;width: 57px;">Fcfa</aside></div>'

            sigle_mode += '</section></div>';

            $('#new-mode-section').append(sigle_mode)

            }

            $('#zone-expedition-national-disable-contenair').addClass('s-none')
            $('#zone-expedition-national-disable-not-test').removeClass('s-none')
        }

            // fin mode d'expedition

        // ------------fin négociation------------------

        // traitement des données de reduction
        if (response[2].length > 0) {
            $('#check_negociation_reduction').prop('checked', true);
            $('#achat-multiple-values').removeClass('negociation-section')
            for (let index = 0; index < response[2].length; index++) {
                // reduction 5%
                if (response[2][index]['libelle_reduction'] == 'Achetez 05') {
                    $('#negocier-1').prop('checked', true);
                    $('#negocier-1-value').removeClass('negociation-section-desabled')
                }

                // reduction 15%
                if (response[2][index]['libelle_reduction'] == 'Achetez 15') {
                    $('#negocier-2').prop('checked', true);
                    $('#negocier-2-value').removeClass('negociation-section-desabled')
                }

                // reduction 20 %
                if (response[2][index]['libelle_reduction'] == 'Achetez 20') {
                    $('#negocier-3').prop('checked', true);
                    $('#negocier-3-value').removeClass('negociation-section-desabled')
                }

            }
        }

        // FIN traitement données de reduction

            $('#photo_0-bclose').removeClass('s-none')
            $('#photo_0-bclose').css({'position': 'absolute', 'margin-top': '-80px', 'margin-right':'-80px'})
            $('#photo_0-b').css('display','none')

            // position: absolute; margin-top: -80px; margin-right: -80;

            $('.photo-button-section').addClass('s-none')
            $('#main-image-preview').attr('src', 'uploads/'+response[0][0]['image'])
            $('#main-image-preview').css({'position': 'relative', 'top': '-12px', 'border-radius': '6px'})
            // $('#main-image-preview').css('top', '12px')
            $('#main-image-preview').attr('height', "308px")
            $('#main-image-preview').attr('width', "308px")
            $('#main-image-preview1').addClass('s-none')
            $('#main-image-preview').removeClass('s-none')


            for (let j = 0; j < response[0][0]['produit_images'].length; j++) {
                var img_index = j+1
                $('#photo_'+img_index+'-view').attr('src', 'uploads/'+response[0][0]['produit_images'][j]['image'])
                $('#photo_'+img_index+'-view').attr('height', "100px")
                $('#photo_'+img_index+'-view').attr('width', "100px")
                $('#photo_'+img_index+'-view').css({'display':'block', 'height': '100px !important', 'width': '100px !important'});
                $('#photo_'+img_index+'-view').css('border-radius','6px')
                $('#photo_'+img_index+'-view').css('margin-right','-4px')

                $('#photo_'+img_index+'-bclose').removeClass('s-none')
                $('#photo_'+img_index+'-bclose').css({'position': 'absolute', 'margin-top': '-80px', 'margin-right':'-80px'})
                $('#photo_'+img_index+'-b').css('display','none')
            }
            liClicked(response[0][0]['id_rayon'])

        }

    })

    }

    // modifier le mode expédition
    function addExpeditionModification(id, parent_id) {

            $('#mode-expe'+parent_id).remove() // mode-expe4
        $.ajax({
            type: "GET",
            url: "get_single_mode_expedition/"+id,
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            success: function(response) {


                if (response[0].type_expedition == 'National') {
                    $('#mode-expe'+id).remove()
                    console.log('Voici id', id)
                    var sigle_mode =  []
                    mode_expedition.push(response[0].mode_expedition)
                    $('#mode-expedition-national-value').val(response[0].id) //input to store

                    $('#zone-expedition-national-add').removeClass('s-none')

                    sigle_mode = '<div id="mode-expe'+response[0].id+'" style="border-bottom: 1px solid #979797">'

                        sigle_mode += '<section style="height: 219px; width: 300px; border-right: 1px solid #979797; background-color: fff; border-radius: 6px 0px 0px 0px"> <img src="assets/images/icones-vendeurs2/'+response[0].photo_mode_expedition+'" style=" height: 27px;width: 43.2px;margin-left:129px;margin-top:30px;">'

                        sigle_mode += '<article style="  height: 20px; width: 301px;background-color: #F8F8F8;margin-top:15px;"><p style="color: #000000;font-family: Roboto;font-size: 14px;letter-spacing: 0.31px;line-height: 14px;text-align:center;margin-left:-61px;">Envoie par </p>  <p style=" color: #191970;font-family: Roboto;font-size: 14px;letter-spacing: 0.31px; line-height: 14px;text-align:right;margin-top:-30px;margin-right:79px;padding:2px;">'+response[0].mode_expedition+'</p></article>'

                        sigle_mode += '<article style="  height: 20px;width: 301px;background-color: #F8F8F8;margin-top:10px;"><p style=" color: #191970;font-family: Roboto;font-size: 12px;letter-spacing: 0.26px;line-height: 14px;text-align:center;padding:2px;">'+response[0].caracteristique+'</p></article>'

                        sigle_mode += '<article style="  height: 20px;width: 301px;background-color: #F8F8F8;margin-top:10px;padding:2px;"><p style="color: #000000font-family: Roboto;font-size: 12px;font-weight: 500;letter-spacing: 0.26px;line-height: 14px;text-align:center;">'+response[0].prix+'FCFA  - '+response[0].prix_max+'</p></article>'

                        sigle_mode += '<p class="expedition-modif-supp" style=" color: #1A7EF5;font-family: Roboto;font-size: 10px;letter-spacing: 0.26px;line-height: 11px;text-align: center;margin-top:20px; position: relative; left: 15px"> <a href="#" onclick=changeModeExpedition("'+response[0].id+'")>Modifier</a> | <a href="#" onclick="deleteModeExpedition('+response[0].id+')">Supprimer</a></p></section>'
                        // end first section

                        sigle_mode +='<section style="height: 219px; width: 217px;margin-top:-219px; position: relative; left:299px;padding-left: 15px; border-left: 1px solid #979797; background-color: #fff; border-radius: 0px 6px 0px 0px">'

                        sigle_mode +='<label class="form-check-label" for="defaultCheck1" style="color: #191970;font-family: Roboto;font-size: 12px;font-weight: 500;letter-spacing: 0;line-height: 14px;margin-top:15px;"><input onclick="toggleFraisExpedition('+response[0].id+')" id="vouspayer'+response[0].id+'" class="form-check-input" type="checkbox"  style="  height: 18px;width: 18px;border-radius: 2px; margin:0px" value="marchand"><span style="position: relative; left: 10px; top: 1px">Vous payez</span></label>'

                        sigle_mode += '<p style="  color: #4A4A4A;font-family: Roboto;font-size: 9px;letter-spacing: 0;line-height: 12px;margin-top:10px;">L’expédition est gratuite pour le client.<br>Frais calculés en fonction du lieu où il se trouve.</p><hr style="  height: 1px;width: 162px;border: 1px solid #D8D8D8;margin-top:10px;margin-left:-2px;"><input onclick="toggleFraisExpedition1('+response[0].id+')" value="client" id="clientpaie'+response[0].id+'" class="form-check-input" type="checkbox"  style="  height: 18px; width: 18px;border-radius: 2px; margin: 0px">'

                        sigle_mode += '<label class="form-check-label" for="defaultCheck1" style=" color: #191970;font-family: Roboto;font-size: 12px;font-weight: 500;letter-spacing: 0;line-height: 14px; margin-left: 10px; width: 137px;">Le client paie les frais de</label><br> <label style="position: relative; left: 30px; color: #191970;font-family: Roboto;font-size: 12px;font-weight: 500;letter-spacing: 0;line-height: 6px;">livraison fixes</label><br><span style="  color: #4A4A4A;font-family: Roboto;font-size: 9px;letter-spacing: 0;line-height: 12px;">L’expédition est à prix fixes pour le client.<br> Frais calculés en fonction du lieu où il se trouve.</span><div style="display: flex; margin-top:10px">'

                        sigle_mode += '<input id="clientpaieInput'+response[0].id+'" class="negociation-section-desabled" type="text" placeholder="-"  style="width: 156px;height:31px;border-bottom-left-radius: 5px;border-top-left-radius: 5px;font-size: 18px;border: 1px solid #9B9B9B;padding-left:10px;background-color: #D8D8D8; height: 40.5px; width: 136px;"><input id="hiddenmode'+response[0].id+'" type="hidden" value="'+response[0].id+'">'

                        sigle_mode += '<aside style="border: 1px solid #9B9B9B;text-align:center;  font-family: Roboto;font-size: 14px;letter-spacing: -0.34px;line-height: 16px;border-radius: 0 6px 6px 0;background-color: #D8D8D8;margin-left:0px ; padding-top:10px; padding-right: 10px;  height: 40.5px;width: 57px;">Fcfa</aside></div>'

                        sigle_mode += '</section></div>';


                        $('#new-mode-section').append(sigle_mode)

                        $('#zone-expedition-national-disable-contenair').addClass('s-none')
                        $('#zone-expedition-national-disable-not-test').removeClass('s-none')
                        $('#dtservice').modal('hide')
                }

            }
        })
    }


            // show mode for update
            function showModeExpeditionModification(id){
                var id_sent = id;
                $.ajax({
                    type: "GET",
                    url: "mode_expedition_modif",
                    data: {'mode_expedition': id},

                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },

                    success: function(response) {
                        console.log('les modes:', response)
                        $('.mode_expedition_container').empty()
                        let mode_element = [];
                        console.log('ok tested')
                       for (let i = 0; i < response.length; i++) {
                        var id_doc = document.getElementById('mode-expe'+response[i].id)
                        // if (id_doc != null) {
                        //     $('#mode-expe'+response[i].id).remove()
                        // }
                        if (id_doc == null) {

                            let chaine = String(response[i].id+'-'+response[i].type_expedition)

                            mode_element = '<aside  class="mode-expedition-row" onclick="document.getElementById('+response[i].id+').click()" style="height: 60px;width:578px;padding:5px;border-top:1px solid #D8D8D8; position: relative; top: -1px" id="mode'+response[i].id+'"><div class="midle-mode-expedition"><article data-parent='+id_sent+' style="width:194px;height:40px; border-right:1px solid #D8D8D8; padding-top: 3px"><input  class="form-check-input" id="'+response[i].id+'" type="checkbox" onclick=addExpeditionModification('+response[i].id+','+id_sent+')  style="  height: 18px !important;width: 18px !important; border-radius: 4px ;margin-top: 9px;margin-left:10px;"><label class="form-check-label" for="defaultCheck1" style=" color: #000000;font-family: Roboto;font-size: 14px;letter-spacing: 0.31px;line-height: 14px;margin-top: 12px;margin-left: 5px;">Envoie par</label> <span style=" color: #191970;font-family: Roboto; font-size: 14px;font-weight: 500;letter-spacing: 0.31px;line-height: 16px;margin-top:-18px;"><i>'

                            mode_element += response[i].mode_expedition

                            mode_element += '</i></span></article><article style=" width:194px; border-right:1px solid #D8D8D8;margin-top:-40px;margin-left:200px;height:40px;"><div style="display: flex; flex-direction: column">'

                            let caracteristique = response[i].caracteristique.split(',')
                            for (let u = 0; u < caracteristique.length; u++) {
                                mode_element += ' <span style=" color: #191970;font-family: Roboto;font-size: 12px;letter-spacing: 0.26px;line-height: 14px;text-align: center;">'+caracteristique[u]+'</span>'
                            }

                            mode_element += '</div></article><article style=" width:auto; margin-top:-40px;height:40px; position: relative; left: 452px; padding-top:7px"> <div><span style="  color: #191970;font-family: Roboto;font-size: 12px;font-weight: 500;letter-spacing: 0.26px;line-height: 14px;text-align:center;margin-top:6px; margin-right: 5px; ">'+response[i].prix+'</span><span style="color: #00000;font-family: Roboto;font-size: 12px;font-weight: 500;letter-spacing: 0.26px;line-height: 14px;text-align:right;margin-top:-30px;margin-right:40px;">Fcfa </span></div><div><span style="  color: #191970;font-family: Roboto;font-size: 12px;font-weight: 500;letter-spacing: 0.26px;line-height: 14px;text-align:center; margin-right: 5px">'+response[i].prix+'</span><span style="color: #00000;font-family: Roboto;font-size: 12px;font-weight: 500;letter-spacing: 0.26px;line-height: 14px;text-align:right;margin-top:-30px;margin-right:40px;">Fcfa </span></div></article></div></aside>'

                        }else {
                            console.log(id)
                        }
                        $('.mode_expedition_container').append(mode_element)

                       }
                    }
                })

                $('#dtservice').removeClass('hide');

            }

            // afficher les modes de payement
            let modes_expeditions_choisi = [];
            function showModeExpedition(id){

                console.log('Voici letat du tableau actuelement:', modes_expeditions_choisi)
                $.ajax({
                    type: "GET",
                    url: "mode_expedition",
                    data: {mode_expedition: id, tab: modes_expeditions_choisi},

                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },

                    success: function(response) {
                        $('.mode_expedition_container').empty()

                        let mode_element = [];
                        console.log('La taille est:', response.length)
                       for (let i = 0; i < response.length; i++) {

                        var id = document.getElementById('mode-expe'+response[i].id)

                        if (id == null) {
                            console.log('ID:', response[i].id)
                            let chaine = String(response[i].id+'-'+response[i].type_expedition)

                            mode_element = '<aside class="mode-expedition-row" onclick=addExpeditionMode('+response[i].id+') style="height: 60px;width:578px;padding:5px;border-top:1px solid #D8D8D8; position: relative; top: -1px" id="mode'+response[i].id+'"><div class="midle-mode-expedition"><article style="width:194px;height:40px; border-right:1px solid #D8D8D8; padding-top: 3px"><input  class="form-check-input" id="checkmodeexpedition'+response[i].id+'" type="checkbox"  style="  height: 18px !important;width: 18px !important; border-radius: 4px ;margin-top: 9px;margin-left:10px;"><label class="form-check-label" for="defaultCheck1" style=" color: #000000;font-family: Roboto;font-size: 14px;letter-spacing: 0.31px;line-height: 14px;margin-top: 12px;margin-left: 5px;">Envoie par</label> <span style=" color: #191970;font-family: Roboto; font-size: 14px;font-weight: 500;letter-spacing: 0.31px;line-height: 16px;margin-top:-18px;"><i>'

                            mode_element += response[i].mode_expedition

                            mode_element += '</i></span></article><article style=" width:194px; border-right:1px solid #D8D8D8;margin-top:-40px;margin-left:200px;height:40px;"><div style="display: flex; flex-direction: column">'

                            let caracteristique = response[i].caracteristique.split(',')

                            for (let u = 0; u < caracteristique.length; u++) {
                                mode_element += ' <span style=" color: #191970;font-family: Roboto;font-size: 12px;letter-spacing: 0.26px;line-height: 14px;text-align: center;">'+caracteristique[u]+'</span>'
                            }

                            mode_element += '</div></article><article style=" width:auto; margin-top:-40px;height:40px; position: relative; left: 452px; padding-top:7px"> <div><span style="  color: #191970;font-family: Roboto;font-size: 12px;font-weight: 500;letter-spacing: 0.26px;line-height: 14px;text-align:center;margin-top:6px; margin-right: 5px; ">'+response[i].prix+'</span><span style="color: #00000;font-family: Roboto;font-size: 12px;font-weight: 500;letter-spacing: 0.26px;line-height: 14px;text-align:right;margin-top:-30px;margin-right:40px;">Fcfa </span></div><div><span style="  color: #191970;font-family: Roboto;font-size: 12px;font-weight: 500;letter-spacing: 0.26px;line-height: 14px;text-align:center; margin-right: 5px">'+response[i].prix+'</span><span style="color: #00000;font-family: Roboto;font-size: 12px;font-weight: 500;letter-spacing: 0.26px;line-height: 14px;text-align:right;margin-top:-30px;margin-right:40px;">Fcfa </span></div></article></div></aside>'

                        }

                        $('.mode_expedition_container').append(mode_element)

                       }
                    }
                })

                $('#dtservice').removeClass('hide');
                $('#kingPop').addClass('hide'); // Custom Popup
                $("#dtServiceExpe").addClass('hide');

            }

            let tab_mode_affichage = {}
            function addExpeditionMode(id) {

                modes_expeditions_choisi.push(id)

                $.ajax({
                    type: "GET",
                    url: "get_single_mode_expedition/"+id,
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    success: function(response) {

                        tab_mode_affichage[id] = response[0]['mode_expedition'] // FOR THE POPUP

                        if (response[0].type_expedition == 'National') {
                            // $('#new-mode-section').empty();
                            var sigle_mode =  []
                            mode_expedition.push(response[0].mode_expedition)
                            $('#mode-expedition-national-value').val(response[0].id) //input to store

                            $('#zone-expedition-national-add').removeClass('s-none')

                            sigle_mode = '<div id="mode-expe'+response[0].id+'" style="border-bottom: 1px solid #979797; background-color: #fff">'

                            sigle_mode += '<section style="height: 219px; width: 300px; border-right: 1px solid #979797; background-color: fff; border-radius: 6px 0px 0px 0px"> <img src="assets/images/icones-vendeurs2/'+response[0].photo_mode_expedition+'" style=" height: 27px;width: 43.2px;margin-left:129px;margin-top:30px;">'

                            sigle_mode += '<article style="  height: 20px; width: 301px;background-color: #F8F8F8;margin-top:15px;"><span style="width: 68px;color: #000000;font-family: Roboto;font-size: 14px;letter-spacing: 0.31px;line-height: 14px;text-align:center;padding-top: 3.5px; position: relative; left: 90px; top: 3px">Envoie par ' +response[0].mode_expedition+' </article>'

                            sigle_mode += '<article style="  height: 20px;width: 301px;background-color: #F8F8F8;margin-top:10px;"><p style=" color: #191970;font-family: Roboto;font-size: 12px;letter-spacing: 0.26px;line-height: 14px;text-align:center;padding:2px; padding-top: 3.5px">'+response[0].caracteristique+'</p></article>'

                            sigle_mode += '<article style="  height: 20px;width: 301px;background-color: #F8F8F8;margin-top:10px;padding:2px;"><p style="color: #000000font-family: Roboto;font-size: 12px;font-weight: 500;letter-spacing: 0.26px;line-height: 14px;text-align:center; padding-top: 2px">'+response[0].prix+'FCFA  - '+response[0].prix_max+'FCFA</p></article>'

                            sigle_mode += '<p class="expedition-modif-supp" style=" color: #1A7EF5;font-family: Roboto;font-size: 10px;letter-spacing: 0.26px;line-height: 11px;text-align: center;margin-top:20px; position: relative; left: 15px"> <a href="#" onclick=changeModeExpedition("'+response[0].id+'")>Modifier</a> | <a href="#" onclick="deleteModeExpedition('+response[0].id+')">Supprimer</a></p></section>'
                                // end first section

                            sigle_mode +='<section id="mode_expedition_valeur'+response[0].id+'" style="height: 219px; width: 217px;margin-top:-219px; position: relative; left:299px;padding-left: 15px; border-left: 1px solid #979797; background-color: #fff; border-radius: 0px 6px 0px 0px">'

                            sigle_mode +='<label class="form-check-label" for="defaultCheck1" style="color: #191970;font-family: Roboto;font-size: 12px;font-weight: 500;letter-spacing: 0;line-height: 14px;margin-top:15px;"><input onclick="toggleFraisExpedition('+response[0].id+')" id="vouspayer'+response[0].id+'" class="form-check-input" type="checkbox"  style="height: 18px;width: 18px;border-radius: 2px; margin:0px" value="marchand"><span style="position: relative; left: 10px; top: 1px">Vous payez</span></label>'

                            sigle_mode += '<p style="  color: #4A4A4A;font-family: Roboto;font-size: 9px;letter-spacing: 0;line-height: 12px;margin-top:10px;">L’expédition est gratuite pour le client.<br>Frais calculés en fonction du lieu où il se trouve.</p><hr style="  height: 1px;width: 192px;border: 1px solid #D8D8D8;margin-top:10px;margin-left:-2pxpx;"><input onclick="toggleFraisExpedition1('+response[0].id+')" value="client" id="clientpaie'+response[0].id+'" class="form-check-input" type="checkbox"  style="  height: 18px; width: 18px;border-radius: 2px; margin: 0px">'

                            sigle_mode += '<label class="form-check-label" for="defaultCheck1" style=" color: #191970;font-family: Roboto;font-size: 12px;font-weight: 500;letter-spacing: 0;line-height: 14px; margin-left: 10px; width: 137px;">Le client paie les frais de</label><br> <label style="position: relative; left: 30px; color: #191970;font-family: Roboto;font-size: 12px;font-weight: 500;letter-spacing: 0;line-height: 6px;">livraison fixes</label><br><span style="  color: #4A4A4A;font-family: Roboto;font-size: 9px;letter-spacing: 0;line-height: 12px;">L’expédition est à prix fixes pour le client.<br> Frais calculés en fonction du lieu où il se trouve.</span><div style="display: flex; margin-top:10px">'

                            sigle_mode += '<input id="clientpaieInput'+response[0].id+'" class="negociation-section-desabled" type="text" placeholder="-"  style="width: 156px;height:31px;border-bottom-left-radius: 5px;border-top-left-radius: 5px;font-size: 18px;border: 1px solid #9B9B9B;padding-left:10px;background-color: #D8D8D8; height: 41px; width: 136px;"><input id="hiddenmode'+response[0].id+'" type="hidden" value="'+response[0].id+'">'

                            sigle_mode += '<aside style="border: 1px solid #9B9B9B;text-align:center;  font-family: Roboto;font-size: 14px;letter-spacing: -0.34px;line-height: 16px;border-radius: 0 6px 6px 0;background-color: #D8D8D8;margin-left:0px ; padding-top:12.5px; padding-right: -1px;  height: 41px;width: 57px;">Fcfa</aside></div>'

                            sigle_mode += '</section></div>';

                            $('#new-mode-section').append(sigle_mode)

                            $('#zone-expedition-national-disable-contenair').addClass('s-none')
                            $('#zone-expedition-national-disable-not-test').removeClass('s-none')
                            $("#dtservice").addClass('hide');
                            $('#kingPop').removeClass('hide');

                        }else if(response[0].type_expedition == 'International'){
                            $('#mode-expedition-international-value').val(response[0].id) //input to store
                            $('#expeditionElementInternational-add').removeClass('s-none')
                            $('#mode_expedition-international-contenair').append(sigle_mode)
                            $('#ajout-service-livraison-add').addClass('s-none')
                            $('#dtservice').modal('hide')

                        }

                        // $('#expeditionTextPreview').empty()
                        for (const key in tab_mode_affichage) {
                            let span_new = '<i style="margin-right: 10px">'+tab_mode_affichage[key]+'</i>'
                            // $('#expeditionTextPreview').append(span_new)
                        }

                    }
                })

                $('#mettreEnRayonBtn').addClass('add-ray-desable')
            }

        // supprimer le mode expédition
        function deleteModeExpedition(id_mode) {

            let element_index = modes_expeditions_choisi.indexOf(id_mode)

            if (element_index > -1) {
                modes_expeditions_choisi.splice(element_index, 1)
            }

            if (id_mode == 1) {
                mode_expedition.splice('Voiture', 1)
            }

            if (id_mode == 2) {
                mode_expedition.splice('Moto', 1)
            }

            if (id_mode == 3) {
                mode_expedition.splice('Vélos', 1)
            }

            if (id_mode == 4) {
                mode_expedition.splice('Avion', 1)
            }

            if (id_mode == 7) {
                mode_expedition.splice('Train', 1)
            }

            $('#mode-expe'+id_mode).remove()
            if (mode_expedition.length == 0) {
                $('#zone-expedition-national-disable-not-test').addClass('s-none')
                $('.ajout-service-livraison').removeClass('s-none')
            }

            // suppresion dans le preview
            delete tab_mode_affichage[id_mode];
            // $('#expeditionTextPreview').empty()
            for (const key in tab_mode_affichage) {
                let span_new = '<i style="margin-right: 10px">'+tab_mode_affichage[key]+'</i>'
                // $('#expeditionTextPreview').append(span_new)
            }

        }

                    // apperçu de du produit
        function produit_preview() {

            for (let i = 0; i < images_produit_normal.length; i++) {
                if (images_produit_normal[i] != undefined) {
                    let photo = images_produit_normal[i]
                    let reader = new FileReader();
                    reader.onload = function (photo){
                        $('#main-image-preview-preview-'+i).attr('src', reader.result)
                    }
                    reader.readAsDataURL(photo);
                }
            }

            // traitement des vendre le meme article
            let vendre_meme_produit = $('#vendre-meme-produit').val();
            if (vendre_meme_produit == 'true') {

                for (let y = 0; y < 6; y++) {
                    let img = $('#photo_'+y+'-view').attr('src')
                    let data_img = "data:image"
                    var preview_elemnt = $('#main-image-preview-preview-'+y).attr('src')
                    if (preview_elemnt == 'assets/images/icones-vendeurs2/image_outline_icon_139447.svg') {
                        if (img !== 'assets/images/icones-vendeurs2/image_outline_icon_139447.svg') {
                        if (img.indexOf('data:image') == -1) {
                            image_final = img.replace('uploads/', '')
                            $('#main-image-preview-preview-'+y).attr('src', img)
                        }
                    }
                    }
                }
            }

            if (mode_expedition.length > 0) {
                var check_scooter = mode_expedition.indexOf('Moto')
                if (check_scooter > -1) {
                    $('#expeditionTextPreview').text('Expédition en 30 min (sauf jour ouvré)')
                }else{
                    $('#expeditionTextPreview').text('Expédition dans un bref delais  (sauf jour ouvré)')
                }
            }else{
                $('#expeditionTextPreview').text('Aucun service d\'expédition séléctionné')
            }

            let mode_international = $('#mode_expedition_international').val()
            let mode_nation = $('#expedition-national').val();
            console.log('Mode expedition:', mode_expedition)

            var delais_retour = $('#delais-annulation-national').find(':selected').val();
            var delais_retour_text = $('#delais-annulation-national').find(':selected').text();
            var delais_retour_text_international = $('#detail_annulation_international').find(':selected').text();
            $('#titre-annonce').text($('#libelle-produit').val())
            // $('#prix-appercu').text($('#prix_achat').val() + ' Fcfa')
            var devisesUser1 = sessionStorage.getItem("devises"); // added code
            $('#prix-appercu').text($('#prix_achat').val() +' '+ devisesUser1) //added prix_achat
            $('#description-preview').text($('#description_produit').val())

            if ($('#retour-nationaux').is(':checked') && $('#retour-internationaux').is(':checked')) {
                var frais_nationaux = $('#frais-nationaux').find(':selected').val(); // frais national
                var frais_internationaux = $('#frais-internationaux').find(':selected').val(); // frais international
                var text_final ="Retours nationaux et internationaux acceptés."
                $('#option_retour-preview').text(text_final)
            } else if ($('#retour-nationaux').is(':checked')) {
                var frais_nationaux = $('#frais-nationaux').find(':selected').val();
                var text_final ="Retours nationaux acceptés sous "+ delais_retour_text+ ", "+ frais_nationaux+"."
                $('#option_retour-preview').text(text_final)
            }else if ($('#retour-internationaux').is(':checked')) {
                var frais_internationaux = $('#frais-internationaux').find(':selected').val();
                var text_final ="Retours internationaux acceptés sous "+ delais_retour_text_international+ ", "+ frais_internationaux+"."
                $('#option_retour-preview').text(text_final)
            }else {
                $('#option_retour-preview').text('Article ne disposant pas de retour')
            }

            let ref_produit = Math.floor(1000 + Math.random() * 9000);
            $('#reference-produit-preview').text('TM-'+ref_produit)

            $('#dttitre').modal('show');
            $("#dttitre").css('z-index', '2000')
            $('#dttitre').addClass('transparente')
            $("#dttitre").css('background-color', 'transparent !important')

        }


        function mettreEnRayon() {
        // ------------------------ default display data --------------------
        const default_width = 264;
        const taille_initial = 132;
		let element_width = 0
        let sum_imges_width = 0;
        let sum_slide_width = 0;

        // ------------produit--------------
        let libelle_produit = $('#libelle-produit').val(); //libelle du produit
        let rayon_produit = $('#produit-rayon').find(':selected').val(); // rayon du produit
        let produit_categorie = $('#produit-famille').find(':selected').val();  // catégorie du produit
        var image_etagere = $('#image-sur-etagere-2').val(); // image sur etagere
        let image_principal = $('#photo_0-view').attr('src')
        let taille_sur_etagere = '';

        let video_preview_product = $('#videoPreviewInput').val();
        let id_sous_categorie = $('#produit-famille-sousCategorie').find(':selected').val();
        console.log('La video est :', video_preview_product)

        let position_sur_etagere = $('#position_sur_etagere').val()
        let numero_slide_etagere = $('#numero_slide_etagere').val();
        let numero_slide_ligne = $('#numero_ligne_sur_slide').val();

        // get taille pour l'affichage
        let currentCase = $('#addSlide'+numero_slide_etagere+'-'+numero_slide_ligne+'-'+position_sur_etagere) // la case courante
        let num_suivant = Number(position_sur_etagere) + 1; // le numero suivant

        let nextCase = $('#addSlide'+numero_slide_etagere+'-'+numero_slide_ligne+'-'+num_suivant) // current p-box
        // currentCase.css('background-color', 'red')
        let taille_produit = $('#taille').find(':selected').text();
        let val_ecran = taille_produit.replace('Pouces', "");
        let val_ecran_trim = val_ecran.trim()

        let val_ecran_numeric = Number(val_ecran_trim)

        if (val_ecran_numeric >= 32 && val_ecran_numeric < 75) {
            // console.log('petite taille')
            taille_sur_etagere = '164'
        }else if (val_ecran_numeric >= 75 && val_ecran_numeric < 120) {
            taille_sur_etagere = '180'
            // console.log('Taille moyenne')
        }else if (val_ecran_numeric >= 120 && val_ecran_numeric <= 270) {
            taille_sur_etagere = '264'
            // console.log('Taille suppérieurs')
        }else{
            console.log('Désolé cette taille n est pas compris dans les tailles des écrans')
            taille_sur_etagere = '0'
        }
        // ----------------------- caracteristique du produit ---------------------------------
        let caracteristique_normal = [];
        let caracteristique_supplementaire = [];
        $('#caracteristique_element-id select').each(function(){
            if ($(this).attr('select-type') === 'Normal') {

    if ($(this).find(':selected').val() == 'aucun') {
        console.log('Cette caracteristique n\'est pas pris en compte')
    }else {
                caracteristique_normal.push($(this).find(':selected').val())
    }

            }else if($(this).attr('select-type') === 'Supplementaire') {
                console.log('Autre caracteristiques supplementaires:', $(this).find(':selected').val())
                caracteristique_supplementaire.push($(this).find(':selected').val())
            }
        })

        // ----------------------------- fin caracteristique, debut recuperation image -------------------------
        let tableau_images = []
        for (let j = 1; j < 6; j++) {
            if ($('#photo_'+j+'-view').attr('src') != "") {
                tableau_images.push($('#photo_'+j+'-view').attr('src'))
            }
        }
        // ------------------------------------ section 0 -----------------------------
        let row_div1 = $(currentCase).closest('.row_div')
        let currentRowSlide1 = $(row_div1).find('.slide')
        let max_width_product1 = [];
        let min_width_product1 = [];
        let temporary_tab1 = [];

        currentRowSlide1.each(function(slide, element){

            let element_attribute1 = $(element).attr('data-width')
            if (element_attribute1 == 264) {
                max_width_product1.push(element_attribute1)
            }else if(element_attribute1 == 0){
                temporary_tab1.push(element)
            }else if(element_attribute1 == 164){
                min_width_product1.push(element)
            }

        })

        // --------------------------------------- section 0 end ----------------------

        // --------------------------- fin de recuperation des images, debut infos produit -----------------------
        let description = $('#description_produit').val();
        let prix_achat = $('#prix_achat').val();
        let quantite_disponible = $('#quantite_produit_disponible').val();
        let nbre_produit_lot = $('#nbre_produit_lot').val();
        let vente_en_lot = $('#vente_par_lot').is(":checked");

        // ------------------------- negociation ---------------------------------------------------------------------
        let negociation_produit = [];
        $('#negociation-desactivation input[type="checkbox"]').each(function() {
            var ligne_negociation = {};
            if ($(this).is(':checked')) {
                let type_negociation = $(this).val();
                let input_value = $(this).attr('data-valeur')
                let valeur_checker = $('#'+input_value).val();
                ligne_negociation['type_negociation'] =  type_negociation
                ligne_negociation['montant'] =  valeur_checker
                negociation_produit.push(ligne_negociation)
            }
        })

        // ------------------------------- achat multiple --------------------------------------------------------
        let achat_multiple_produit = [];
        $('#achat-multiple-values input[type="checkbox"]').each(function() {
            var ligne_achat_multiple = {};
            if ($(this).is(':checked')) {
                let type_achat = $(this).val(); // type achat choisie
                let select_value = $(this).attr('data-select-value') // recuperer l 'id du select
                let selected_value = $('#'+select_value).find(':selected').text();
                ligne_achat_multiple['nombre_produit'] = type_achat;
                ligne_achat_multiple['pourcentage'] = selected_value;
                achat_multiple_produit.push(ligne_achat_multiple);
            }
        })

        // ------------------------------------ option de retour ---------------------------------------------
        let retour_national = [];
        if ($('#retour-nationaux').is(':checked')) {
            $('#option-retour-nationaux-zone select').each(function() {
                let valeur_retour = $(this).find(':selected').val()
                retour_national.push(valeur_retour)
            })
        }

        let retour_international = []
        if ($('#retour-internationaux').is(':checked')) {
            $('#option-retour-internationaux-zone select').each(function() {
                let valeur_retour = $(this).find(':selected').val()
                retour_international.push(valeur_retour)
            })
        }
        // ---------------------------------- mode expedition -----------------------------------

        // tous les modes
        let tableau_moyens_expedition = [];
        modes_expeditions_choisi.forEach(id_mode => {
            let prix_expedition = $('#clientpaieInput'+id_mode).val()
            let line_mode_expedition = {};
            $('#mode_expedition_valeur'+id_mode+' input[type="checkbox"]').each(function() {
                if ($(this).is(':checked')) {
                line_mode_expedition['payeur'] = $(this).val()
                line_mode_expedition['prix'] = $('#clientpaieInput'+id_mode).val();
                line_mode_expedition['mode'] = id_mode
                }
            })
            tableau_moyens_expedition.push(line_mode_expedition)
        });

    let taille_ecran = $('#display-size-zone').find('select').find(':selected').val()
    taille_sur_etagere = taille_ecran

    if ($('#display-size-zone').find('select').length > 0) {
        console.log('Il existe une taille dans les caracteristiques:', $('#display-size-zone').find('select'))
    }else {

    var d_L = $('#d-L').val();
    var d_H = $('#d-H').val();
    var d_ll = $('#d-ll').val();

    if (d_L < 43 || d_H < 25) {
        taille_sur_etagere = 57
    }else if ((d_L > 43 && d_L < 100) || (d_H > 25 && d_H < 50)) {
        taille_sur_etagere = 86
    } else if ((d_L > 100 && d_L < 152) || (d_H > 50 && d_H < 93)) {
        taille_sur_etagere = 152
    }else if (d_L > 152 || d_H > 93) {
        taille_sur_etagere = 152
    }else {
        taille_sur_etagere = 80
    }

    }

    var v_get_categorie_caracteristique = $('.categorie-caracteristique')
    var cat_caracteristique = new Object;
    // var caracteristique_categorie = new Object;

    v_get_categorie_caracteristique.each(function(index, element) {

        var element_label = $(element).find('label')
        var element_input = $(element).find('input')
        var val_caract;

        var label_caract = $(element_label[0]).text();

        if (label_caract == '*Dimensions L x H x l') {
            var val_caract = $(element_input[0]).val() +'x'+ $(element_input[1]).val() +'x'+$(element_input[2]).val();
        }else if(label_caract == 'Vitesse') {
            var val_caract = $(element_input[0]).val() + ' Mbps';
        } else {
            var val_caract = $(element_input[0]).val()
        }

        cat_caracteristique[label_caract] = val_caract

    })
        // ----------------------------- objet principal ------------------------------
        let data_produit = {
            libelle_produit: libelle_produit,
            rayon_produit: rayon_produit,
            produit_categorie: produit_categorie,
            image_etagere: image_etagere,
            caracteristique_normal: caracteristique_normal,
            caracteristique_supplementaire: caracteristique_supplementaire,
            tableau_images: tableau_images,
            description: description,
            prix_achat: prix_achat,
            quantite_disponible: quantite_disponible,
            nbre_produit_lot: nbre_produit_lot,
            vente_en_lot: vente_en_lot,
            negociation_produit: negociation_produit,
            achat_multiple_produit: achat_multiple_produit,
            retour_national: retour_national,
            retour_international: retour_international,
            tableau_moyens_expedition: tableau_moyens_expedition,
            image_principal: image_principal,
            pays_exclu: pays_exclu,
            position_sur_etagere: position_sur_etagere,
            numero_slide_etagere: numero_slide_etagere,
            numero_slide_ligne: numero_slide_ligne,
            taille_sur_etagere: taille_sur_etagere,
            video_preview_product: video_preview_product,
            id_sous_categorie: id_sous_categorie,
            caracteristique_categorie: cat_caracteristique,
        }

        let page_sliders = document.getElementsByClassName('custom-carousel-page'); // tous les sliders
        // -----------------------reservé à la requette ----------------------------
        $.ajax({
            type:'POST',
            url:"ajout_produit",
            data: data_produit,
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
             beforeSend: function(params) {
                $('#metre-en-ray-spiner').removeClass('spine-none')
                $('#metre-en-ray-text').addClass('spine-none')
                $('#mettreEnRayonBtn').addClass('spiner-css-attr')
            },
            success:function(response){

                let next_slider = page_sliders.length;  // le numero du slide suivant
                if(rayon_produit == 25 && response['status'] == "200") {
                    let counter_img = 0;
                    let full_data_width = [];
                    let product_id = response['produit']['id'];

                    // recuperation de toutes les ligne de l'étagère
                    let current_slide_rows = $('#slide-p'+numero_slide_etagere).find('.row_div'); 

                    current_slide_rows.each(function(){
                    let row_slide_case = $(this).find('.slide')
                        // get all data-width
                        Array.prototype.forEach.call(row_slide_case, function(element){
                            if ($(element).attr('data-width') == 0) {
                                full_data_width.push($(element).attr('data-width'))
                            }
                        })
                       
                        counter_img += $(this).find('img').length;
                    })

                    // -------------------------------product cas too small ---------------------
                    if (taille_sur_etagere == 264 && max_width_product1.length == 3 && min_width_product1.length == 1) {

                            let div_element = document.createElement('div');
                            div_element.style.width = '100%';

                            div_element.classList.add('custom-carousel-page')
                            div_element.setAttribute('id', 'slide-p'+next_slider)

                            //  construction des lignes
                            let div_row_slide = document.createElement('div');
                            div_row_slide.classList.add('row_div')

                            let div_row_slide1 = document.createElement('div');
                            div_row_slide1.classList.add('row_div')

                            let div_row_slide2 = document.createElement('div');
                            div_row_slide2.classList.add('row_div')

                            const p_box = document.createElement('div');
                            p_box.classList.add('p-box')

                            let new_row_ligne = div_row_slide.getElementsByClassName('slide')
                            let new_row_ligne1 = div_row_slide1.getElementsByClassName('slide')
                            let new_row_ligne2 = div_row_slide2.getElementsByClassName('slide')
                            let j = 0

                            while (new_row_ligne.length < 5) {
                                let bouton_ajout = '<button onclick="testCurentCase('+next_slider+', 0, '+j+')" class="add-product-button-etagere not-active-product-btn" button-index="1" style="position: absolute;" onclick="showAddProduct()"><span class="add-product-icon">+</span></button>'
                                let div_slide = $("<div>")
                                div_slide.addClass("slide");
                                div_slide.addClass("slide-add-btn");
                                div_slide.attr("id", "addSlide"+next_slider+'-0-'+j);
                                div_slide.addClass('init-added-button')
                                $(div_slide).bind('mouseenter', processMouseEnter)
                                $(div_slide).bind('mouseleave', processMouseLeave)
                                div_slide.append(bouton_ajout)
                                $(div_row_slide).append(div_slide)
                                j++;
                            }

                            let j1 = 0
                            while (new_row_ligne1.length < 5) {
                                let bouton_ajout = '<button onclick="testCurentCase('+next_slider+', 1, '+j1+')" class="add-product-button-etagere not-active-product-btn" button-index="1" style="position: absolute;" onclick="showAddProduct()"><span class="add-product-icon">+</span></button>'
                                let div_slide = $("<div>")
                                div_slide.addClass("slide");
                                div_slide.addClass("slide-add-btn");
                                div_slide.attr("id", "addSlide"+next_slider+'-1-'+j1);
                                div_slide.addClass('init-added-button')
                                $(div_slide).bind('mouseenter', processMouseEnter)
                                $(div_slide).bind('mouseleave', processMouseLeave)
                                div_slide.append(bouton_ajout)
                                $(div_row_slide1).append(div_slide)
                                j1++;
                            }

                            let j2 = 0;
                            while (new_row_ligne2.length < 5) {
                                let bouton_ajout = '<button onclick="testCurentCase('+next_slider+', 2, '+j2+')" class="add-product-button-etagere not-active-product-btn" button-index="1" style="position: absolute;" onclick="showAddProduct()"><span class="add-product-icon">+</span></button>'
                                let div_slide = $("<div>")
                                div_slide.addClass("slide");
                                div_slide.addClass("slide-add-btn");
                                div_slide.addClass('init-added-button')
                                div_slide.attr("id", "addSlide"+next_slider+'-2-'+j2);
                                $(div_slide).bind('mouseenter', processMouseEnter)
                                $(div_slide).bind('mouseleave', processMouseLeave)
                                div_slide.append(bouton_ajout)
                                $(div_row_slide2).append(div_slide)
                                j2++;
                            }

                            div_element.append(div_row_slide)
                            div_element.append(div_row_slide1)
                            div_element.append(div_row_slide2)
                            $('.slider-content-wrapper').append(div_element)

                            // ---------------------------- remplissage du produit dans une case --------
                            $('#addSlide'+next_slider+'-0-0').find('button').remove()
                            $('#addSlide'+next_slider+'-0-0').removeClass('class-default-added-btn')
                            $('#addSlide'+next_slider+'-0-0').css('display', 'flex')
                            $('#addSlide'+next_slider+'-0-0').css('width', taille_sur_etagere+'px')
                            $('#addSlide'+next_slider+'-0-0').attr('data-width', taille_sur_etagere)
                            $('#addSlide'+next_slider+'-0-0').css('align-items', 'flex-end')
                            // display: flex;  align-items: flex-end;
                            let product_image = "<img src='"+response['produit']['image']+"' alt=''>"

                            $('#addSlide'+next_slider+'-0-0').append(product_image);

                            let data_position = {
                                numero_slide: next_slider,
                                numero_ligne_slide: 0,
                                position_sur_etagere: 0,
                                id_produit: product_id
                            }

                            $.ajax({
                                method: 'POST',
                                url: '/update_product_position',
                                data: data_position,
                                headers: {
                                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                                },
                                success: function(response) {
                                    console.log('Voici la response:', response);
                                }
                            })

                        // }

                        return false;

                    }
                    // -------------------------------product cas too small end ---------------------

                    // ---------------------------- remplissage du produit dans une case --------
                    $('#addSlide'+numero_slide_etagere+'-'+numero_slide_ligne+'-'+position_sur_etagere).find('button').remove()
                    $('#addSlide'+numero_slide_etagere+'-'+numero_slide_ligne+'-'+position_sur_etagere).removeClass('class-default-added-btn')
                    $('#addSlide'+numero_slide_etagere+'-'+numero_slide_ligne+'-'+position_sur_etagere).css('display', 'flex')
                    $('#addSlide'+numero_slide_etagere+'-'+numero_slide_ligne+'-'+position_sur_etagere).css('width', taille_sur_etagere+'px')
                    $('#addSlide'+numero_slide_etagere+'-'+numero_slide_ligne+'-'+position_sur_etagere).attr('data-width', taille_sur_etagere)
                    $('#addSlide'+numero_slide_etagere+'-'+numero_slide_ligne+'-'+position_sur_etagere).css('align-items', 'flex-end')
                    // display: flex;  align-items: flex-end;
                    let product_image = "<img src='"+response['produit']['image']+"' alt=''>"

                    $('#addSlide'+numero_slide_etagere+'-'+numero_slide_ligne+'-'+position_sur_etagere).append(product_image);

                    // --------------------------- traitement du bouton suivant ----------------------------------
                    if ($('#addSlide'+numero_slide_etagere+'-'+position_sur_etagere).find('button').hasClass('active-product-btn')) {
                        for (let j = position_sur_etagere + 1; j < 15; j++) {
                            if ($('#addSlide'+numero_slide_etagere+'-'+j).find('img').length == 0) {
                            $('#addSlide'+numero_slide_etagere+'-'+j).find('button').removeClass('not-active-product-btn')
                            $('#addSlide'+numero_slide_etagere+'-'+j).find('button').removeClass('add-product-button-etagere')
                            $('#addSlide'+numero_slide_etagere+'-'+j).find('button').addClass('add-product-button-etagere-active')
                            $('#addSlide'+numero_slide_etagere+'-'+j).find('button').removeClass('not-active-product-btn-hover')
                            $('#addSlide'+numero_slide_etagere+'-'+j).find('button').addClass('active-product-btn')
                            return;
                            }
                        }
                    }
                    // --------------------------remplissage du produit end----------------------

                    // --------------------------------------- section 1 end --------------------
                    if (full_data_width.length == 0) {

                        let div_element = document.createElement('div');
                        div_element.style.width = '100%';

                         div_element.classList.add('custom-carousel-page')
                         div_element.setAttribute('id', 'slide-p'+next_slider)

                        //  construction des lignes
                         let div_row_slide = document.createElement('div');
                         div_row_slide.classList.add('row_div')

                         let div_row_slide1 = document.createElement('div');
                         div_row_slide1.classList.add('row_div')

                         let div_row_slide2 = document.createElement('div');
                         div_row_slide2.classList.add('row_div')

                         const p_box = document.createElement('div');
                        p_box.classList.add('p-box')

                        let new_row_ligne = div_row_slide.getElementsByClassName('slide')
                        let new_row_ligne1 = div_row_slide1.getElementsByClassName('slide')
                        let new_row_ligne2 = div_row_slide2.getElementsByClassName('slide')
                        let j = 0

                        while (new_row_ligne.length < 5) {
                            let bouton_ajout = '<button onclick="testCurentCase('+next_slider+', 0, '+j+')" class="add-product-button-etagere not-active-product-btn" button-index="1" style="position: absolute;" onclick="showAddProduct()"><span class="add-product-icon">+</span></button>'
                            let div_slide = $("<div>")
                            div_slide.addClass("slide");
                            div_slide.addClass("slide-add-btn");
                            div_slide.attr("id", "addSlide"+next_slider+'-0-'+j);
                            div_slide.addClass('init-added-button')
                            $(div_slide).bind('mouseenter', processMouseEnter)
                            $(div_slide).bind('mouseleave', processMouseLeave)
                            div_slide.append(bouton_ajout)
                            $(div_row_slide).append(div_slide)
                            j++;
                        }

                        let j1 = 0
                        while (new_row_ligne1.length < 5) {
                           let bouton_ajout = '<button onclick="testCurentCase('+next_slider+', 1, '+j1+')" class="add-product-button-etagere not-active-product-btn" button-index="1" style="position: absolute;" onclick="showAddProduct()"><span class="add-product-icon">+</span></button>'
                           let div_slide = $("<div>")
                           div_slide.addClass("slide");
                           div_slide.addClass("slide-add-btn");
                           div_slide.attr("id", "addSlide"+next_slider+'-1-'+j1);
                           div_slide.addClass('init-added-button')
                           $(div_slide).bind('mouseenter', processMouseEnter)
                           $(div_slide).bind('mouseleave', processMouseLeave)
                           div_slide.append(bouton_ajout)
                           $(div_row_slide1).append(div_slide)
                           j1++;
                       }

                       let j2 = 0;
                       while (new_row_ligne2.length < 5) {
                       let bouton_ajout = '<button onclick="testCurentCase('+next_slider+', 2, '+j2+')" class="add-product-button-etagere not-active-product-btn" button-index="1" style="position: absolute;" onclick="showAddProduct()"><span class="add-product-icon">+</span></button>'
                       let div_slide = $("<div>")
                       div_slide.addClass("slide");
                       div_slide.addClass("slide-add-btn");
                       div_slide.addClass('init-added-button')
                       div_slide.attr("id", "addSlide"+next_slider+'-2-'+j2);
                       $(div_slide).bind('mouseenter', processMouseEnter)
                       $(div_slide).bind('mouseleave', processMouseLeave)
                       div_slide.append(bouton_ajout)
                       $(div_row_slide2).append(div_slide)
                       j2++;
                   }

                    div_element.append(div_row_slide)
                    div_element.append(div_row_slide1)
                    div_element.append(div_row_slide2)
                    $('.slider-content-wrapper').append(div_element)

            }

			let row_div = $(currentCase).closest('.row_div')
                    let currentRowSlide = $(row_div).find('.slide')
                    let max_width_product = [];
                    let temporary_tab = []

                    currentRowSlide.each(function(slide, element){
                        let element_attribute = $(element).attr('data-width')
                        if (element_attribute == 264) {
                            max_width_product.push(element_attribute)
                        }else if(element_attribute == 0){
                            temporary_tab.push(element)
                        }
                    })

                    if (max_width_product.length == 4) {
                        // traitement du current case : currentCase
                        Array.prototype.forEach.call(temporary_tab, function(element3) {
                            element3.remove();
                        })
                    }

			 showTabAnnonceCreationProduit();

                }else if(rayon_produit == 27 && response['status'] == "200") {
                    // ------------------------------ debut traitement effective ------------------------------------
                        // get all row of current slide
                        let counter_img = 0;
                        let full_data_width = [];
                        let product_id = response['produit']['id'];
                        let current_slide_rows = $('#slide-p'+numero_slide_etagere).find('.row_div-telephonie'); // recuperation de toutes les ligne de l'étagère

                        current_slide_rows.each(function(){
                        let row_slide_case = $(this).find('.slide')
                            // get all data-width
                            Array.prototype.forEach.call(row_slide_case, function(element){
                                if ($(element).attr('data-width') == 0) {
                                    full_data_width.push($(element).attr('data-width'))
                }else{
                                    console.log('well we here', $(element).attr('data-width'))
                }
                            })
                            console.log('Voici votre resultat attendu:', row_slide_case);
                            counter_img += $(this).find('img').length;
                        })

                        // -------------------------------product cas too small ---------------------
                        if (taille_sur_etagere == 264 && max_width_product1.length == 3 && min_width_product1.length == 1) {

                        // if (full_data_width.length > 12) {
                        let div_element = document.createElement('div');
                        div_element.style.width = '100%';

                        div_element.classList.add('custom-carousel-page')
                        div_element.setAttribute('id', 'slide-p'+next_slider)

                        //  construction des lignes
                        let div_row_slide = document.createElement('div');
                        div_row_slide.classList.add('row_div-telephonie')

                        let div_row_slide1 = document.createElement('div');
                        div_row_slide1.classList.add('row_div-telephonie')

                        let div_row_slide2 = document.createElement('div');
                        div_row_slide2.classList.add('row_div-telephonie')

                        const p_box = document.createElement('div');
                        p_box.classList.add('p-box')

                        let new_row_ligne = div_row_slide.getElementsByClassName('slide')
                        let new_row_ligne1 = div_row_slide1.getElementsByClassName('slide')
                        let new_row_ligne2 = div_row_slide2.getElementsByClassName('slide')
                        let j = 0

                        while (new_row_ligne.length < 5) {
                            let bouton_ajout = '<button onclick="testCurentCase('+next_slider+', 0, '+j+')" class="add-product-button-etagere not-active-product-btn" button-index="1" style="position: absolute;" onclick="showAddProduct()"><span class="add-product-icon">+</span></button>'
                            let div_slide = $("<div>")
                            div_slide.addClass("slide");
                            div_slide.addClass("slide-add-btn");
                            div_slide.attr("id", "addSlide"+next_slider+'-0-'+j);
                            div_slide.addClass('init-added-button')
                            $(div_slide).bind('mouseenter', processMouseEnter)
                            $(div_slide).bind('mouseleave', processMouseLeave)
                            div_slide.append(bouton_ajout)
                            $(div_row_slide).append(div_slide)
                            j++;
                        }

                        let j1 = 0
                        while (new_row_ligne1.length < 5) {
                            let bouton_ajout = '<button onclick="testCurentCase('+next_slider+', 1, '+j1+')" class="add-product-button-etagere not-active-product-btn" button-index="1" style="position: absolute;" onclick="showAddProduct()"><span class="add-product-icon">+</span></button>'
                            let div_slide = $("<div>")
                            div_slide.addClass("slide");
                            div_slide.addClass("slide-add-btn");
                            div_slide.attr("id", "addSlide"+next_slider+'-1-'+j1);
                            div_slide.addClass('init-added-button')
                            $(div_slide).bind('mouseenter', processMouseEnter)
                            $(div_slide).bind('mouseleave', processMouseLeave)
                            div_slide.append(bouton_ajout)
                            $(div_row_slide1).append(div_slide)
                            j1++;
                        }

                        let j2 = 0;
                        while (new_row_ligne2.length < 5) {
                            let bouton_ajout = '<button onclick="testCurentCase('+next_slider+', 2, '+j2+')" class="add-product-button-etagere not-active-product-btn" button-index="1" style="position: absolute;" onclick="showAddProduct()"><span class="add-product-icon">+</span></button>'
                            let div_slide = $("<div>")
                            div_slide.addClass("slide");
                            div_slide.addClass("slide-add-btn");
                            div_slide.addClass('init-added-button')
                            div_slide.attr("id", "addSlide"+next_slider+'-2-'+j2);
                            $(div_slide).bind('mouseenter', processMouseEnter)
                            $(div_slide).bind('mouseleave', processMouseLeave)
                            div_slide.append(bouton_ajout)
                            $(div_row_slide2).append(div_slide)
                            j2++;
                        }

                        div_element.append(div_row_slide)
                        div_element.append(div_row_slide1)
                        div_element.append(div_row_slide2)
                        $('.slider-content-wrapper').append(div_element)

                        // ---------------------------- remplissage du produit dans une case --------
                        $('#addSlide'+next_slider+'-0-0').find('button').remove()
                        $('#addSlide'+next_slider+'-0-0').removeClass('class-default-added-btn')
                        $('#addSlide'+next_slider+'-0-0').css('display', 'flex')
                        $('#addSlide'+next_slider+'-0-0').css('width', taille_sur_etagere+'px')
                        $('#addSlide'+next_slider+'-0-0').attr('data-width', taille_sur_etagere)
                        $('#addSlide'+next_slider+'-0-0').css('align-items', 'flex-end')
                        // display: flex;  align-items: flex-end;
                        let product_image = "<img src='"+response['produit']['image']+"' alt=''>"

                        $('#addSlide'+next_slider+'-0-0').append(product_image);

                        let data_position = {
                            numero_slide: next_slider,
                            numero_ligne_slide: 0,
                            position_sur_etagere: 0,
                            id_produit: product_id
                        }

                        $.ajax({
                            method: 'POST',
                            url: '/update_product_position',
                            data: data_position,
                            headers: {
                                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
                            success: function(response) {
                                console.log('Voici la response:', response);
                            }
                        })

                    // }

                    return false;

                    }
                    // -------------------------------product cas too small end ---------------------

                    // ---------------------------- remplissage du produit dans une case --------
                    $('#addSlide'+numero_slide_etagere+'-'+numero_slide_ligne+'-'+position_sur_etagere).find('button').remove()
                    $('#addSlide'+numero_slide_etagere+'-'+numero_slide_ligne+'-'+position_sur_etagere).removeClass('class-default-added-btn')
                    $('#addSlide'+numero_slide_etagere+'-'+numero_slide_ligne+'-'+position_sur_etagere).css('display', 'flex')
                    $('#addSlide'+numero_slide_etagere+'-'+numero_slide_ligne+'-'+position_sur_etagere).css('width', taille_sur_etagere+'px')
                    $('#addSlide'+numero_slide_etagere+'-'+numero_slide_ligne+'-'+position_sur_etagere).attr('data-width', taille_sur_etagere)
                    $('#addSlide'+numero_slide_etagere+'-'+numero_slide_ligne+'-'+position_sur_etagere).css('align-items', 'flex-end')
                    // display: flex;  align-items: flex-end;
                    let product_image = "<img src='"+response['produit']['image']+"' alt=''>"

                    $('#addSlide'+numero_slide_etagere+'-'+numero_slide_ligne+'-'+position_sur_etagere).append(product_image);

                    // --------------------------- traitement du bouton suivant ----------------------------------
                    if ($('#addSlide'+numero_slide_etagere+'-'+position_sur_etagere).find('button').hasClass('active-product-btn')) {
                    for (let j = position_sur_etagere + 1; j < 15; j++) {
                        if ($('#addSlide'+numero_slide_etagere+'-'+j).find('img').length == 0) {
                        $('#addSlide'+numero_slide_etagere+'-'+j).find('button').removeClass('not-active-product-btn')
                        $('#addSlide'+numero_slide_etagere+'-'+j).find('button').removeClass('add-product-button-etagere')
                        $('#addSlide'+numero_slide_etagere+'-'+j).find('button').addClass('add-product-button-etagere-active')
                        $('#addSlide'+numero_slide_etagere+'-'+j).find('button').removeClass('not-active-product-btn-hover')
                        $('#addSlide'+numero_slide_etagere+'-'+j).find('button').addClass('active-product-btn')
                        return;
                        }
                    }
                    }else{
                        let product_image = "<img src='uploads/635691b243b8013044' alt=''>"
                    }
                        // --------------------------remplissage du produit end----------------------

                        // --------------------------------------- section 1 end --------------------
                        if (full_data_width.length == 0) {
                        // console.log('Nous sommes dans le plein de l étagère ...', slides)
                        let div_element = document.createElement('div');
                        div_element.style.width = '100%';

                        div_element.classList.add('custom-carousel-page')
                        div_element.setAttribute('id', 'slide-p'+next_slider)

                        //  construction des lignes
                        let div_row_slide = document.createElement('div');
                        div_row_slide.classList.add('row_div-telephonie')

                        let div_row_slide1 = document.createElement('div');
                        div_row_slide1.classList.add('row_div-telephonie')

                        let div_row_slide2 = document.createElement('div');
                        div_row_slide2.classList.add('row_div-telephonie')

                        let div_row_slide3 = document.createElement('div');
                        div_row_slide3.classList.add('row_div-telephonie')

                        let div_row_slide4 = document.createElement('div');
                        div_row_slide4.classList.add('row_div-telephonie')

                        const p_box = document.createElement('div');
                        p_box.classList.add('p-box')

                        let new_row_ligne = div_row_slide.getElementsByClassName('slide')
                        let new_row_ligne1 = div_row_slide1.getElementsByClassName('slide')
                        let new_row_ligne2 = div_row_slide2.getElementsByClassName('slide')
                        let new_row_ligne3 = div_row_slide3.getElementsByClassName('slide')
                        let new_row_ligne4 = div_row_slide4.getElementsByClassName('slide')
                        let j = 0

                        while (new_row_ligne.length < 6) {
                            let bouton_ajout = '<button onclick="testCurentCase('+next_slider+', 0, '+j+')" class="add-product-button-etagere not-active-product-btn" button-index="1" style="position: absolute;" onclick="showAddProduct()"><span class="add-product-icon">+</span></button>'
                            let div_slide = $("<div>")
                            div_slide.addClass("slide");
                            div_slide.addClass("slide-add-btn");
                            div_slide.attr("id", "addSlide"+next_slider+'-0-'+j);
                            div_slide.addClass('init-added-button-telephonie')
                            $(div_slide).bind('mouseenter', processMouseEnter)
                            $(div_slide).bind('mouseleave', processMouseLeave)
                            div_slide.append(bouton_ajout)
                            $(div_row_slide).append(div_slide)
                            j++;
                        }

                        let j1 = 0
                        while (new_row_ligne1.length < 6) {
                            let bouton_ajout = '<button onclick="testCurentCase('+next_slider+', 1, '+j1+')" class="add-product-button-etagere not-active-product-btn" button-index="1" style="position: absolute;" onclick="showAddProduct()"><span class="add-product-icon">+</span></button>'
                            let div_slide = $("<div>")
                            div_slide.addClass("slide");
                            div_slide.addClass("slide-add-btn");
                            div_slide.attr("id", "addSlide"+next_slider+'-1-'+j1);
                            div_slide.addClass('init-added-button-telephonie')
                            $(div_slide).bind('mouseenter', processMouseEnter)
                            $(div_slide).bind('mouseleave', processMouseLeave)
                            div_slide.append(bouton_ajout)
                            $(div_row_slide1).append(div_slide)
                            j1++;
                        }

                        let j2 = 0;
                        while (new_row_ligne2.length < 6) {
                        let bouton_ajout = '<button onclick="testCurentCase('+next_slider+', 2, '+j2+')" class="add-product-button-etagere not-active-product-btn" button-index="1" style="position: absolute;" onclick="showAddProduct()"><span class="add-product-icon">+</span></button>'
                        let div_slide = $("<div>")
                        div_slide.addClass("slide");
                        div_slide.addClass("slide-add-btn");
                        div_slide.addClass('init-added-button-telephonie')
                        div_slide.attr("id", "addSlide"+next_slider+'-2-'+j2);
                        $(div_slide).bind('mouseenter', processMouseEnter)
                        $(div_slide).bind('mouseleave', processMouseLeave)
                        div_slide.append(bouton_ajout)
                        $(div_row_slide2).append(div_slide)
                        j2++;
                    }

                    let j3 = 0;
                    while (new_row_ligne3.length < 6) {
                    let bouton_ajout = '<button onclick="testCurentCase('+next_slider+', 2, '+j3+')" class="add-product-button-etagere not-active-product-btn" button-index="1" style="position: absolute;" onclick="showAddProduct()"><span class="add-product-icon">+</span></button>'
                    let div_slide = $("<div>")
                    div_slide.addClass("slide");
                    div_slide.addClass("slide-add-btn");
                    div_slide.addClass('init-added-button-telephonie')
                    div_slide.attr("id", "addSlide"+next_slider+'-2-'+j3);
                    $(div_slide).bind('mouseenter', processMouseEnter)
                    $(div_slide).bind('mouseleave', processMouseLeave)
                    div_slide.append(bouton_ajout)
                    $(div_row_slide3).append(div_slide)
                    j3++;
                }

                let j4 = 0;
                    while (new_row_ligne4.length < 6) {
                    let bouton_ajout = '<button onclick="testCurentCase('+next_slider+', 2, '+j4+')" class="add-product-button-etagere not-active-product-btn" button-index="1" style="position: absolute;" onclick="showAddProduct()"><span class="add-product-icon">+</span></button>'
                    let div_slide = $("<div>")
                    div_slide.addClass("slide");
                    div_slide.addClass("slide-add-btn");
                    div_slide.addClass('init-added-button-telephonie')
                    div_slide.attr("id", "addSlide"+next_slider+'-2-'+j4);
                    $(div_slide).bind('mouseenter', processMouseEnter)
                    $(div_slide).bind('mouseleave', processMouseLeave)
                    div_slide.append(bouton_ajout)
                    $(div_row_slide4).append(div_slide)
                    j4++;
                }

                div_element.append(div_row_slide)
                div_element.append(div_row_slide1)
                div_element.append(div_row_slide2)
                div_element.append(div_row_slide3)
                div_element.append(div_row_slide4)
                // slides.appendChild(div_element)

                document.getElementsByClassName("slider-content-wrapper")[0].appendChild(div_element);



    }

                let row_div = $(currentCase).closest('.row_div-telephonie')
                let currentRowSlide = $(row_div).find('.slide')
                let max_width_product = [];
                let temporary_tab = []

                currentRowSlide.each(function(slide, element){
                    let element_attribute = $(element).attr('data-width')
                    if (element_attribute == 264) {
                        max_width_product.push(element_attribute)
                    }else if(element_attribute == 0){
                        temporary_tab.push(element)
                    }
                })

                if (max_width_product.length == 4) {
                    // traitement du current case : currentCase
                    Array.prototype.forEach.call(temporary_tab, function(element3) {
                        element3.remove();
                    })
                }


            showTabAnnonceCreationProduit();
        }else if(rayon_produit == 39 && response['status'] == "200") {
            // ------------------------------ debut traitement effective ------------------------------------
                // get all row of current slide
                let counter_img = 0;
                let full_data_width = [];
                let product_id = response['produit']['id'];
                let current_slide_rows = $('#slide-p'+numero_slide_etagere).find('.row_div-telephonie'); // recuperation de toutes les ligne de l'étagère

                current_slide_rows.each(function(){
                let row_slide_case = $(this).find('.slide')
                    // get all data-width
                    Array.prototype.forEach.call(row_slide_case, function(element){
                        if ($(element).attr('data-width') == 0) {
                            full_data_width.push($(element).attr('data-width'))
        }else{
                            console.log('well we here', $(element).attr('data-width'))
        }
                    })
                    console.log('Voici votre resultat attendu:', row_slide_case);
                    counter_img += $(this).find('img').length;
                })

                // -------------------------------product cas too small ---------------------
                if (taille_sur_etagere == 264 && max_width_product1.length == 3 && min_width_product1.length == 1) {

                // if (full_data_width.length > 12) {
                let div_element = document.createElement('div');
                div_element.style.width = '100%';

                div_element.classList.add('custom-carousel-page')
                div_element.setAttribute('id', 'slide-p'+next_slider)

                //  construction des lignes
                let div_row_slide = document.createElement('div');
                div_row_slide.classList.add('row_div-telephonie')

                let div_row_slide1 = document.createElement('div');
                div_row_slide1.classList.add('row_div-telephonie')

                let div_row_slide2 = document.createElement('div');
                div_row_slide2.classList.add('row_div-telephonie')

                const p_box = document.createElement('div');
                p_box.classList.add('p-box')

                let new_row_ligne = div_row_slide.getElementsByClassName('slide')
                let new_row_ligne1 = div_row_slide1.getElementsByClassName('slide')
                let new_row_ligne2 = div_row_slide2.getElementsByClassName('slide')
                let j = 0

                while (new_row_ligne.length < 5) {
                    let bouton_ajout = '<button onclick="testCurentCase('+next_slider+', 0, '+j+')" class="add-product-button-etagere not-active-product-btn" button-index="1" style="position: absolute;" onclick="showAddProduct()"><span class="add-product-icon">+</span></button>'
                    let div_slide = $("<div>")
                    div_slide.addClass("slide");
                    div_slide.addClass("slide-add-btn");
                    div_slide.attr("id", "addSlide"+next_slider+'-0-'+j);
                    div_slide.addClass('init-added-button')
                    $(div_slide).bind('mouseenter', processMouseEnter)
                    $(div_slide).bind('mouseleave', processMouseLeave)
                    div_slide.append(bouton_ajout)
                    $(div_row_slide).append(div_slide)
                    j++;
                }

                let j1 = 0
                while (new_row_ligne1.length < 5) {
                    let bouton_ajout = '<button onclick="testCurentCase('+next_slider+', 1, '+j1+')" class="add-product-button-etagere not-active-product-btn" button-index="1" style="position: absolute;" onclick="showAddProduct()"><span class="add-product-icon">+</span></button>'
                    let div_slide = $("<div>")
                    div_slide.addClass("slide");
                    div_slide.addClass("slide-add-btn");
                    div_slide.attr("id", "addSlide"+next_slider+'-1-'+j1);
                    div_slide.addClass('init-added-button')
                    $(div_slide).bind('mouseenter', processMouseEnter)
                    $(div_slide).bind('mouseleave', processMouseLeave)
                    div_slide.append(bouton_ajout)
                    $(div_row_slide1).append(div_slide)
                    j1++;
                }

                let j2 = 0;
                while (new_row_ligne2.length < 5) {
                    let bouton_ajout = '<button onclick="testCurentCase('+next_slider+', 2, '+j2+')" class="add-product-button-etagere not-active-product-btn" button-index="1" style="position: absolute;" onclick="showAddProduct()"><span class="add-product-icon">+</span></button>'
                    let div_slide = $("<div>")
                    div_slide.addClass("slide");
                    div_slide.addClass("slide-add-btn");
                    div_slide.addClass('init-added-button')
                    div_slide.attr("id", "addSlide"+next_slider+'-2-'+j2);
                    $(div_slide).bind('mouseenter', processMouseEnter)
                    $(div_slide).bind('mouseleave', processMouseLeave)
                    div_slide.append(bouton_ajout)
                    $(div_row_slide2).append(div_slide)
                    j2++;
                }

                div_element.append(div_row_slide)
                div_element.append(div_row_slide1)
                div_element.append(div_row_slide2)
                $('.slider-content-wrapper').append(div_element)

                // ---------------------------- remplissage du produit dans une case --------
                $('#addSlide'+next_slider+'-0-0').find('button').remove()
                $('#addSlide'+next_slider+'-0-0').removeClass('class-default-added-btn')
                $('#addSlide'+next_slider+'-0-0').css('display', 'flex')
                $('#addSlide'+next_slider+'-0-0').css('width', taille_sur_etagere+'px')
                $('#addSlide'+next_slider+'-0-0').attr('data-width', taille_sur_etagere)
                $('#addSlide'+next_slider+'-0-0').css('align-items', 'flex-end')
                // display: flex;  align-items: flex-end;
                let product_image = "<img src='"+response['produit']['image']+"' alt=''>"

                $('#addSlide'+next_slider+'-0-0').append(product_image);

                let data_position = {
                    numero_slide: next_slider,
                    numero_ligne_slide: 0,
                    position_sur_etagere: 0,
                    id_produit: product_id
                }

                $.ajax({
                    method: 'POST',
                    url: '/update_product_position',
                    data: data_position,
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    },
                    success: function(response) {
                        console.log('Voici la response:', response);
                    }
                })

            // }

            return false;

            }
            // -------------------------------product cas too small end ---------------------

            // ---------------------------- remplissage du produit dans une case --------
            $('#addSlide'+numero_slide_etagere+'-'+numero_slide_ligne+'-'+position_sur_etagere).find('button').remove()
            $('#addSlide'+numero_slide_etagere+'-'+numero_slide_ligne+'-'+position_sur_etagere).removeClass('class-default-added-btn')
            $('#addSlide'+numero_slide_etagere+'-'+numero_slide_ligne+'-'+position_sur_etagere).css('display', 'flex')
            $('#addSlide'+numero_slide_etagere+'-'+numero_slide_ligne+'-'+position_sur_etagere).css('width', taille_sur_etagere+'px')
            $('#addSlide'+numero_slide_etagere+'-'+numero_slide_ligne+'-'+position_sur_etagere).attr('data-width', taille_sur_etagere)
            $('#addSlide'+numero_slide_etagere+'-'+numero_slide_ligne+'-'+position_sur_etagere).css('align-items', 'flex-end')
            // display: flex;  align-items: flex-end;
            let product_image = "<img src='"+response['produit']['image']+"' alt=''>"

            $('#addSlide'+numero_slide_etagere+'-'+numero_slide_ligne+'-'+position_sur_etagere).append(product_image);

            // --------------------------- traitement du bouton suivant ----------------------------------
            if ($('#addSlide'+numero_slide_etagere+'-'+position_sur_etagere).find('button').hasClass('active-product-btn')) {
            for (let j = position_sur_etagere + 1; j < 15; j++) {
                if ($('#addSlide'+numero_slide_etagere+'-'+j).find('img').length == 0) {
                $('#addSlide'+numero_slide_etagere+'-'+j).find('button').removeClass('not-active-product-btn')
                $('#addSlide'+numero_slide_etagere+'-'+j).find('button').removeClass('add-product-button-etagere')
                $('#addSlide'+numero_slide_etagere+'-'+j).find('button').addClass('add-product-button-etagere-active')
                $('#addSlide'+numero_slide_etagere+'-'+j).find('button').removeClass('not-active-product-btn-hover')
                $('#addSlide'+numero_slide_etagere+'-'+j).find('button').addClass('active-product-btn')
                return;
                }
            }
            }else{
                let product_image = "<img src='uploads/635691b243b8013044' alt=''>"
            }
                // --------------------------remplissage du produit end----------------------

                // --------------------------------------- section 1 end --------------------
                if (full_data_width.length == 0) {
                // console.log('Nous sommes dans le plein de l étagère ...', slides)
                let div_element = document.createElement('div');
                div_element.style.width = '100%';

                div_element.classList.add('custom-carousel-page')
                div_element.setAttribute('id', 'slide-p'+next_slider)

                //  construction des lignes
                let div_row_slide = document.createElement('div');
                div_row_slide.classList.add('row_div-telephonie')

                let div_row_slide1 = document.createElement('div');
                div_row_slide1.classList.add('row_div-telephonie')

                let div_row_slide2 = document.createElement('div');
                div_row_slide2.classList.add('row_div-telephonie')

                let div_row_slide3 = document.createElement('div');
                div_row_slide3.classList.add('row_div-telephonie')

                let div_row_slide4 = document.createElement('div');
                div_row_slide4.classList.add('row_div-telephonie')

                const p_box = document.createElement('div');
                p_box.classList.add('p-box')

                let new_row_ligne = div_row_slide.getElementsByClassName('slide')
                let new_row_ligne1 = div_row_slide1.getElementsByClassName('slide')
                let new_row_ligne2 = div_row_slide2.getElementsByClassName('slide')
                let new_row_ligne3 = div_row_slide3.getElementsByClassName('slide')
                let new_row_ligne4 = div_row_slide4.getElementsByClassName('slide')
                let j = 0

                while (new_row_ligne.length < 6) {
                    let bouton_ajout = '<button onclick="testCurentCase('+next_slider+', 0, '+j+')" class="add-product-button-etagere not-active-product-btn" button-index="1" style="position: absolute;" onclick="showAddProduct()"><span class="add-product-icon">+</span></button>'
                    let div_slide = $("<div>")
                    div_slide.addClass("slide");
                    div_slide.addClass("slide-add-btn");
                    div_slide.attr("id", "addSlide"+next_slider+'-0-'+j);
                    div_slide.addClass('init-added-button-telephonie')
                    $(div_slide).bind('mouseenter', processMouseEnter)
                    $(div_slide).bind('mouseleave', processMouseLeave)
                    div_slide.append(bouton_ajout)
                    $(div_row_slide).append(div_slide)
                    j++;
                }

                let j1 = 0
                while (new_row_ligne1.length < 6) {
                    let bouton_ajout = '<button onclick="testCurentCase('+next_slider+', 1, '+j1+')" class="add-product-button-etagere not-active-product-btn" button-index="1" style="position: absolute;" onclick="showAddProduct()"><span class="add-product-icon">+</span></button>'
                    let div_slide = $("<div>")
                    div_slide.addClass("slide");
                    div_slide.addClass("slide-add-btn");
                    div_slide.attr("id", "addSlide"+next_slider+'-1-'+j1);
                    div_slide.addClass('init-added-button-telephonie')
                    $(div_slide).bind('mouseenter', processMouseEnter)
                    $(div_slide).bind('mouseleave', processMouseLeave)
                    div_slide.append(bouton_ajout)
                    $(div_row_slide1).append(div_slide)
                    j1++;
                }

                let j2 = 0;
                while (new_row_ligne2.length < 6) {
                let bouton_ajout = '<button onclick="testCurentCase('+next_slider+', 2, '+j2+')" class="add-product-button-etagere not-active-product-btn" button-index="1" style="position: absolute;" onclick="showAddProduct()"><span class="add-product-icon">+</span></button>'
                let div_slide = $("<div>")
                div_slide.addClass("slide");
                div_slide.addClass("slide-add-btn");
                div_slide.addClass('init-added-button-telephonie')
                div_slide.attr("id", "addSlide"+next_slider+'-2-'+j2);
                $(div_slide).bind('mouseenter', processMouseEnter)
                $(div_slide).bind('mouseleave', processMouseLeave)
                div_slide.append(bouton_ajout)
                $(div_row_slide2).append(div_slide)
                j2++;
            }

            let j3 = 0;
            while (new_row_ligne3.length < 6) {
            let bouton_ajout = '<button onclick="testCurentCase('+next_slider+', 2, '+j3+')" class="add-product-button-etagere not-active-product-btn" button-index="1" style="position: absolute;" onclick="showAddProduct()"><span class="add-product-icon">+</span></button>'
            let div_slide = $("<div>")
            div_slide.addClass("slide");
            div_slide.addClass("slide-add-btn");
            div_slide.addClass('init-added-button-telephonie')
            div_slide.attr("id", "addSlide"+next_slider+'-2-'+j3);
            $(div_slide).bind('mouseenter', processMouseEnter)
            $(div_slide).bind('mouseleave', processMouseLeave)
            div_slide.append(bouton_ajout)
            $(div_row_slide3).append(div_slide)
            j3++;
        }

        let j4 = 0;
            while (new_row_ligne4.length < 6) {
            let bouton_ajout = '<button onclick="testCurentCase('+next_slider+', 2, '+j4+')" class="add-product-button-etagere not-active-product-btn" button-index="1" style="position: absolute;" onclick="showAddProduct()"><span class="add-product-icon">+</span></button>'
            let div_slide = $("<div>")
            div_slide.addClass("slide");
            div_slide.addClass("slide-add-btn");
            div_slide.addClass('init-added-button-telephonie')
            div_slide.attr("id", "addSlide"+next_slider+'-2-'+j4);
            $(div_slide).bind('mouseenter', processMouseEnter)
            $(div_slide).bind('mouseleave', processMouseLeave)
            div_slide.append(bouton_ajout)
            $(div_row_slide4).append(div_slide)
            j4++;
        }

        div_element.append(div_row_slide)
        div_element.append(div_row_slide1)
        div_element.append(div_row_slide2)
        div_element.append(div_row_slide3)
        div_element.append(div_row_slide4)
        // slides.appendChild(div_element)

        document.getElementsByClassName("slider-content-wrapper")[0].appendChild(div_element);



}

        let row_div = $(currentCase).closest('.row_div-telephonie')
        let currentRowSlide = $(row_div).find('.slide')
        let max_width_product = [];
        let temporary_tab = []

        currentRowSlide.each(function(slide, element){
            let element_attribute = $(element).attr('data-width')
            if (element_attribute == 264) {
                max_width_product.push(element_attribute)
            }else if(element_attribute == 0){
                temporary_tab.push(element)
            }
        })

        if (max_width_product.length == 4) {
            // traitement du current case : currentCase
            Array.prototype.forEach.call(temporary_tab, function(element3) {
                element3.remove();
            })
        }


    showTabAnnonceCreationProduit();
}else if (rayon_produit == 26 && response['status'] == "200") {
                        // get all row of current slide
    let counter_img = 0;
    let full_data_width = [];
    let product_id = response['produit']['id'];
    let current_slide_rows = $('#slide-p'+numero_slide_etagere).find('.row_div-telephonie'); // recuperation de toutes les ligne de l'étagère

    current_slide_rows.each(function(){
    let row_slide_case = $(this).find('.slide')
        // get all data-width
        Array.prototype.forEach.call(row_slide_case, function(element){
            if ($(element).attr('data-width') == 0) {
                full_data_width.push($(element).attr('data-width'))
            }else{
                console.log('well we here', $(element).attr('data-width'))
            }
        })
        console.log('Voici votre resultat attendu:', row_slide_case);
        counter_img += $(this).find('img').length;
    })

    // -------------------------------product cas too small ---------------------
    if (taille_sur_etagere == 264 && max_width_product1.length == 3 && min_width_product1.length == 1) {
    console.log('Il doit être ici à vérifier')
    // if (full_data_width.length > 12) {
    let div_element = document.createElement('div');
    div_element.style.width = '100%';

    div_element.classList.add('custom-carousel-page')
    div_element.setAttribute('id', 'slide-p'+next_slider)

    //  construction des lignes
    let div_row_slide = document.createElement('div');
    div_row_slide.classList.add('row_div-telephonie')

    let div_row_slide1 = document.createElement('div');
    div_row_slide1.classList.add('row_div-telephonie')

    let div_row_slide2 = document.createElement('div');
    div_row_slide2.classList.add('row_div-telephonie')

    const p_box = document.createElement('div');
    p_box.classList.add('p-box')

    let new_row_ligne = div_row_slide.getElementsByClassName('slide')
    let new_row_ligne1 = div_row_slide1.getElementsByClassName('slide')
    let new_row_ligne2 = div_row_slide2.getElementsByClassName('slide')
    let j = 0

    while (new_row_ligne.length < 5) {
        let bouton_ajout = '<button onclick="testCurentCase('+next_slider+', 0, '+j+')" class="add-product-button-etagere not-active-product-btn" button-index="1" style="position: absolute;" onclick="showAddProduct()"><span class="add-product-icon">+</span></button>'
        let div_slide = $("<div>")
        div_slide.addClass("slide");
        div_slide.addClass("slide-add-btn");
        div_slide.attr("id", "addSlide"+next_slider+'-0-'+j);
        div_slide.addClass('init-added-button')
        $(div_slide).bind('mouseenter', processMouseEnter)
        $(div_slide).bind('mouseleave', processMouseLeave)
        div_slide.append(bouton_ajout)
        $(div_row_slide).append(div_slide)
        j++;
    }

    let j1 = 0
    while (new_row_ligne1.length < 5) {
        let bouton_ajout = '<button onclick="testCurentCase('+next_slider+', 1, '+j1+')" class="add-product-button-etagere not-active-product-btn" button-index="1" style="position: absolute;" onclick="showAddProduct()"><span class="add-product-icon">+</span></button>'
        let div_slide = $("<div>")
        div_slide.addClass("slide");
        div_slide.addClass("slide-add-btn");
        div_slide.attr("id", "addSlide"+next_slider+'-1-'+j1);
        div_slide.addClass('init-added-button')
        $(div_slide).bind('mouseenter', processMouseEnter)
        $(div_slide).bind('mouseleave', processMouseLeave)
        div_slide.append(bouton_ajout)
        $(div_row_slide1).append(div_slide)
        j1++;
    }

    let j2 = 0;
    while (new_row_ligne2.length < 5) {
        let bouton_ajout = '<button onclick="testCurentCase('+next_slider+', 2, '+j2+')" class="add-product-button-etagere not-active-product-btn" button-index="1" style="position: absolute;" onclick="showAddProduct()"><span class="add-product-icon">+</span></button>'
        let div_slide = $("<div>")
        div_slide.addClass("slide");
        div_slide.addClass("slide-add-btn");
        div_slide.addClass('init-added-button')
        div_slide.attr("id", "addSlide"+next_slider+'-2-'+j2);
        $(div_slide).bind('mouseenter', processMouseEnter)
        $(div_slide).bind('mouseleave', processMouseLeave)
        div_slide.append(bouton_ajout)
        $(div_row_slide2).append(div_slide)
        j2++;
    }

    div_element.append(div_row_slide)
    div_element.append(div_row_slide1)
    div_element.append(div_row_slide2)
    $('.slider-content-wrapper').append(div_element)

    // ---------------------------- remplissage du produit dans une case --------
    $('#addSlide'+next_slider+'-0-0').find('button').remove()
    $('#addSlide'+next_slider+'-0-0').removeClass('class-default-added-btn')
    $('#addSlide'+next_slider+'-0-0').css('display', 'flex')
    $('#addSlide'+next_slider+'-0-0').css('width', taille_sur_etagere+'px')
    $('#addSlide'+next_slider+'-0-0').attr('data-width', taille_sur_etagere)
    $('#addSlide'+next_slider+'-0-0').css('align-items', 'flex-end')
    // display: flex;  align-items: flex-end;
    let product_image = "<img src='"+response['produit']['image']+"' alt=''>"

    $('#addSlide'+next_slider+'-0-0').append(product_image);

    let data_position = {
        numero_slide: next_slider,
        numero_ligne_slide: 0,
        position_sur_etagere: 0,
        id_produit: product_id
    }

    $.ajax({
        method: 'POST',
        url: '/update_product_position',
        data: data_position,
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        success: function(response) {
            console.log('Voici la response:', response);
        }
    })

    // }

    return false;

    }
    // -------------------------------product cas too small end ---------------------

    // ---------------------------- remplissage du produit dans une case --------

    $('#addSlide'+numero_slide_etagere+'-'+numero_slide_ligne+'-'+position_sur_etagere).find('button').remove()
    $('#addSlide'+numero_slide_etagere+'-'+numero_slide_ligne+'-'+position_sur_etagere).removeClass('class-default-added-btn')
    $('#addSlide'+numero_slide_etagere+'-'+numero_slide_ligne+'-'+position_sur_etagere).css('display', 'flex')
    console.log('Ou bien il est quelque part ici et regardant cette taille alors:', taille_sur_etagere)
    $('#addSlide'+numero_slide_etagere+'-'+numero_slide_ligne+'-'+position_sur_etagere).css('width', taille_sur_etagere+'px')
    $('#addSlide'+numero_slide_etagere+'-'+numero_slide_ligne+'-'+position_sur_etagere).attr('data-width', taille_sur_etagere)
    $('#addSlide'+numero_slide_etagere+'-'+numero_slide_ligne+'-'+position_sur_etagere).css('align-items', 'flex-end')
    // display: flex;  align-items: flex-end;
    let product_image = "<img src='"+response['produit']['image']+"' alt=''>"

    $('#addSlide'+numero_slide_etagere+'-'+numero_slide_ligne+'-'+position_sur_etagere).append(product_image);

    // --------------------------- traitement du bouton suivant ----------------------------------
    if ($('#addSlide'+numero_slide_etagere+'-'+position_sur_etagere).find('button').hasClass('active-product-btn')) {
    for (let j = position_sur_etagere + 1; j < 15; j++) {
        if ($('#addSlide'+numero_slide_etagere+'-'+j).find('img').length == 0) {
        $('#addSlide'+numero_slide_etagere+'-'+j).find('button').removeClass('not-active-product-btn')
        $('#addSlide'+numero_slide_etagere+'-'+j).find('button').removeClass('add-product-button-etagere')
        $('#addSlide'+numero_slide_etagere+'-'+j).find('button').addClass('add-product-button-etagere-active')
        $('#addSlide'+numero_slide_etagere+'-'+j).find('button').removeClass('not-active-product-btn-hover')
        $('#addSlide'+numero_slide_etagere+'-'+j).find('button').addClass('active-product-btn')
        return;
        }
    }
    }else{
        let product_image = "<img src='uploads/635691b243b8013044' alt=''>"
    }
    // --------------------------remplissage du produit end----------------------

    // --------------------------------------- section 1 end --------------------
    if (full_data_width.length == 0) {
    // console.log('Nous sommes dans le plein de l étagère ...', slides)
    let div_element = document.createElement('div');
    div_element.style.width = '100%';

    div_element.classList.add('custom-carousel-page')
    div_element.setAttribute('id', 'slide-p'+next_slider)

    //  construction des lignes
    let div_row_slide = document.createElement('div');
    div_row_slide.classList.add('row_div-telephonie')

    let div_row_slide1 = document.createElement('div');
    div_row_slide1.classList.add('row_div-telephonie')

    let div_row_slide2 = document.createElement('div');
    div_row_slide2.classList.add('row_div-telephonie')

    let div_row_slide3 = document.createElement('div');
    div_row_slide3.classList.add('row_div-telephonie')

    let div_row_slide4 = document.createElement('div');
    div_row_slide4.classList.add('row_div-telephonie')

    const p_box = document.createElement('div');
    p_box.classList.add('p-box')

    let new_row_ligne = div_row_slide.getElementsByClassName('slide')
    let new_row_ligne1 = div_row_slide1.getElementsByClassName('slide')
    let new_row_ligne2 = div_row_slide2.getElementsByClassName('slide')
    let new_row_ligne3 = div_row_slide3.getElementsByClassName('slide')
    let new_row_ligne4 = div_row_slide4.getElementsByClassName('slide')
    let j = 0

    while (new_row_ligne.length < 6) {
        let bouton_ajout = '<button onclick="testCurentCase('+next_slider+', 0, '+j+')" class="add-product-button-etagere not-active-product-btn" button-index="1" style="position: absolute;" onclick="showAddProduct()"><span class="add-product-icon">+</span></button>'
        let div_slide = $("<div>")
        div_slide.addClass("slide");
        div_slide.addClass("slide-add-btn");
        div_slide.attr("id", "addSlide"+next_slider+'-0-'+j);
        div_slide.addClass('init-added-button-telephonie')
        $(div_slide).bind('mouseenter', processMouseEnter)
        $(div_slide).bind('mouseleave', processMouseLeave)
        div_slide.append(bouton_ajout)
        $(div_row_slide).append(div_slide)
        j++;
    }

    let j1 = 0
    while (new_row_ligne1.length < 6) {
        let bouton_ajout = '<button onclick="testCurentCase('+next_slider+', 1, '+j1+')" class="add-product-button-etagere not-active-product-btn" button-index="1" style="position: absolute;" onclick="showAddProduct()"><span class="add-product-icon">+</span></button>'
        let div_slide = $("<div>")
        div_slide.addClass("slide");
        div_slide.addClass("slide-add-btn");
        div_slide.attr("id", "addSlide"+next_slider+'-1-'+j1);
        div_slide.addClass('init-added-button-telephonie')
        $(div_slide).bind('mouseenter', processMouseEnter)
        $(div_slide).bind('mouseleave', processMouseLeave)
        div_slide.append(bouton_ajout)
        $(div_row_slide1).append(div_slide)
        j1++;
    }

    let j2 = 0;
    while (new_row_ligne2.length < 6) {
    let bouton_ajout = '<button onclick="testCurentCase('+next_slider+', 2, '+j2+')" class="add-product-button-etagere not-active-product-btn" button-index="1" style="position: absolute;" onclick="showAddProduct()"><span class="add-product-icon">+</span></button>'
    let div_slide = $("<div>")
    div_slide.addClass("slide");
    div_slide.addClass("slide-add-btn");
    div_slide.addClass('init-added-button-telephonie')
    div_slide.attr("id", "addSlide"+next_slider+'-2-'+j2);
    $(div_slide).bind('mouseenter', processMouseEnter)
    $(div_slide).bind('mouseleave', processMouseLeave)
    div_slide.append(bouton_ajout)
    $(div_row_slide2).append(div_slide)
    j2++;
}

    let j3 = 0;
    while (new_row_ligne3.length < 6) {
    let bouton_ajout = '<button onclick="testCurentCase('+next_slider+', 2, '+j3+')" class="add-product-button-etagere not-active-product-btn" button-index="1" style="position: absolute;" onclick="showAddProduct()"><span class="add-product-icon">+</span></button>'
    let div_slide = $("<div>")
    div_slide.addClass("slide");
    div_slide.addClass("slide-add-btn");
    div_slide.addClass('init-added-button-telephonie')
    div_slide.attr("id", "addSlide"+next_slider+'-2-'+j3);
    $(div_slide).bind('mouseenter', processMouseEnter)
    $(div_slide).bind('mouseleave', processMouseLeave)
    div_slide.append(bouton_ajout)
    $(div_row_slide3).append(div_slide)
    j3++;
}

let j4 = 0;
    while (new_row_ligne4.length < 6) {
    let bouton_ajout = '<button onclick="testCurentCase('+next_slider+', 2, '+j4+')" class="add-product-button-etagere not-active-product-btn" button-index="1" style="position: absolute;" onclick="showAddProduct()"><span class="add-product-icon">+</span></button>'
    let div_slide = $("<div>")
    div_slide.addClass("slide");
    div_slide.addClass("slide-add-btn");
    div_slide.addClass('init-added-button-telephonie')
    div_slide.attr("id", "addSlide"+next_slider+'-2-'+j4);
    $(div_slide).bind('mouseenter', processMouseEnter)
    $(div_slide).bind('mouseleave', processMouseLeave)
    div_slide.append(bouton_ajout)
    $(div_row_slide4).append(div_slide)
    j4++;
}

    div_element.append(div_row_slide)
    div_element.append(div_row_slide1)
    div_element.append(div_row_slide2)
    div_element.append(div_row_slide3)
    div_element.append(div_row_slide4)
    // slides.appendChild(div_element)

    document.getElementsByClassName("slider-content-wrapper")[0].appendChild(div_element);

    }

    let row_div = $(currentCase).closest('.row_div-telephonie')
    let currentRowSlide = $(row_div).find('.slide')
    let max_width_product = [];
    let temporary_tab = []

    currentRowSlide.each(function(slide, element){
        let element_attribute = $(element).attr('data-width')
        if (element_attribute == 264) {
            max_width_product.push(element_attribute)
        }else if(element_attribute == 0){
            temporary_tab.push(element)
        }
    })

    if (max_width_product.length == 4) {
        // traitement du current case : currentCase
        Array.prototype.forEach.call(temporary_tab, function(element3) {
            element3.remove();
        })
    }


        showTabAnnonceCreationProduit();
    }else if(rayon_produit == 28 && response['status'] == "200"){
        // alert('Bien dans rayon jeux!')
        let counter_img = 0;
        let full_data_width = [];
                    let product_id = response['produit']['id'];
                    let current_slide_rows = $('#slide-p'+numero_slide_etagere).find('.row_div'); // recuperation de toutes les ligne de l'étagère

                    current_slide_rows.each(function(){
                    let row_slide_case = $(this).find('.slide')
                        // get all data-width
                        Array.prototype.forEach.call(row_slide_case, function(element){
                            if ($(element).attr('data-width') == 0) {
                                full_data_width.push($(element).attr('data-width'))
                            }else{
                                console.log('well we here', $(element).attr('data-width'))
                            }
                        })
                        console.log('Voici votre resultat attendu:', row_slide_case);
                        counter_img += $(this).find('img').length;
                    })

                    // -------------------------------product cas too small ---------------------
                    if (taille_sur_etagere == 264 && max_width_product1.length == 3 && min_width_product1.length == 1) {

                        // if (full_data_width.length > 12) {
                            let div_element = document.createElement('div');
                            div_element.style.width = '100%';

                            div_element.classList.add('custom-carousel-page')
                            div_element.setAttribute('id', 'slide-p'+next_slider)

                            //  construction des lignes
                            let div_row_slide = document.createElement('div');
                            div_row_slide.classList.add('row_div')

                            let div_row_slide1 = document.createElement('div');
                            div_row_slide1.classList.add('row_div')

                            let div_row_slide2 = document.createElement('div');
                            div_row_slide2.classList.add('row_div')

                            const p_box = document.createElement('div');
                            p_box.classList.add('p-box')

                            let new_row_ligne = div_row_slide.getElementsByClassName('slide')
                            let new_row_ligne1 = div_row_slide1.getElementsByClassName('slide')
                            let new_row_ligne2 = div_row_slide2.getElementsByClassName('slide')
                            let j = 0

                            while (new_row_ligne.length < 5) {
                                let bouton_ajout = '<button onclick="testCurentCase('+next_slider+', 0, '+j+')" class="add-product-button-etagere not-active-product-btn" button-index="1" style="position: absolute;" onclick="showAddProduct()"><span class="add-product-icon">+</span></button>'
                                let div_slide = $("<div>")
                                div_slide.addClass("slide");
                                div_slide.addClass("slide-add-btn");
                                div_slide.attr("id", "addSlide"+next_slider+'-0-'+j);
                                div_slide.addClass('init-added-button')
                                $(div_slide).bind('mouseenter', processMouseEnter)
                                $(div_slide).bind('mouseleave', processMouseLeave)
                                div_slide.append(bouton_ajout)
                                $(div_row_slide).append(div_slide)
                                j++;
                            }

                            let j1 = 0
                            while (new_row_ligne1.length < 5) {
                                let bouton_ajout = '<button onclick="testCurentCase('+next_slider+', 1, '+j1+')" class="add-product-button-etagere not-active-product-btn" button-index="1" style="position: absolute;" onclick="showAddProduct()"><span class="add-product-icon">+</span></button>'
                                let div_slide = $("<div>")
                                div_slide.addClass("slide");
                                div_slide.addClass("slide-add-btn");
                                div_slide.attr("id", "addSlide"+next_slider+'-1-'+j1);
                                div_slide.addClass('init-added-button')
                                $(div_slide).bind('mouseenter', processMouseEnter)
                                $(div_slide).bind('mouseleave', processMouseLeave)
                                div_slide.append(bouton_ajout)
                                $(div_row_slide1).append(div_slide)
                                j1++;
                            }

                            let j2 = 0;
                            while (new_row_ligne2.length < 5) {
                                let bouton_ajout = '<button onclick="testCurentCase('+next_slider+', 2, '+j2+')" class="add-product-button-etagere not-active-product-btn" button-index="1" style="position: absolute;" onclick="showAddProduct()"><span class="add-product-icon">+</span></button>'
                                let div_slide = $("<div>")
                                div_slide.addClass("slide");
                                div_slide.addClass("slide-add-btn");
                                div_slide.addClass('init-added-button')
                                div_slide.attr("id", "addSlide"+next_slider+'-2-'+j2);
                                $(div_slide).bind('mouseenter', processMouseEnter)
                                $(div_slide).bind('mouseleave', processMouseLeave)
                                div_slide.append(bouton_ajout)
                                $(div_row_slide2).append(div_slide)
                                j2++;
                            }

                            div_element.append(div_row_slide)
                            div_element.append(div_row_slide1)
                            div_element.append(div_row_slide2)
                            $('.slider-content-wrapper').append(div_element)

                            // ---------------------------- remplissage du produit dans une case --------
                            $('#addSlide'+next_slider+'-0-0').find('button').remove()
                            $('#addSlide'+next_slider+'-0-0').removeClass('class-default-added-btn')
                            $('#addSlide'+next_slider+'-0-0').css('display', 'flex')
                            $('#addSlide'+next_slider+'-0-0').css('width', taille_sur_etagere+'px')
                            $('#addSlide'+next_slider+'-0-0').attr('data-width', taille_sur_etagere)
                            $('#addSlide'+next_slider+'-0-0').css('align-items', 'flex-end')
                            // display: flex;  align-items: flex-end;
                            let product_image = "<img src='"+response['produit']['image']+"' alt=''>"

                            $('#addSlide'+next_slider+'-0-0').append(product_image);

                            let data_position = {
                                numero_slide: next_slider,
                                numero_ligne_slide: 0,
                                position_sur_etagere: 0,
                                id_produit: product_id
                            }

                            $.ajax({
                                method: 'POST',
                                url: '/update_product_position',
                                data: data_position,
                                headers: {
                                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                                },
                                success: function(response) {
                                    console.log('Voici la response:', response);
                                }
                            })

                        // }

                        return false;

                    }
                    // -------------------------------product cas too small end ---------------------

                    // ---------------------------- remplissage du produit dans une case --------
                    $('#addSlide'+numero_slide_etagere+'-'+numero_slide_ligne+'-'+position_sur_etagere).find('button').remove()
                    $('#addSlide'+numero_slide_etagere+'-'+numero_slide_ligne+'-'+position_sur_etagere).removeClass('class-default-added-btn')
                    $('#addSlide'+numero_slide_etagere+'-'+numero_slide_ligne+'-'+position_sur_etagere).css('display', 'flex')
                    $('#addSlide'+numero_slide_etagere+'-'+numero_slide_ligne+'-'+position_sur_etagere).css('width', taille_sur_etagere+'px')
                    $('#addSlide'+numero_slide_etagere+'-'+numero_slide_ligne+'-'+position_sur_etagere).attr('data-width', taille_sur_etagere)
                    $('#addSlide'+numero_slide_etagere+'-'+numero_slide_ligne+'-'+position_sur_etagere).css('align-items', 'flex-end')
                    // display: flex;  align-items: flex-end;
                    let product_image = "<img src='"+response['produit']['image']+"' alt=''>"

                    $('#addSlide'+numero_slide_etagere+'-'+numero_slide_ligne+'-'+position_sur_etagere).append(product_image);

                    // --------------------------- traitement du bouton suivant ----------------------------------
                    if ($('#addSlide'+numero_slide_etagere+'-'+position_sur_etagere).find('button').hasClass('active-product-btn')) {
                        for (let j = position_sur_etagere + 1; j < 15; j++) {
                            if ($('#addSlide'+numero_slide_etagere+'-'+j).find('img').length == 0) {
                            $('#addSlide'+numero_slide_etagere+'-'+j).find('button').removeClass('not-active-product-btn')
                            $('#addSlide'+numero_slide_etagere+'-'+j).find('button').removeClass('add-product-button-etagere')
                            $('#addSlide'+numero_slide_etagere+'-'+j).find('button').addClass('add-product-button-etagere-active')
                            $('#addSlide'+numero_slide_etagere+'-'+j).find('button').removeClass('not-active-product-btn-hover')
                            $('#addSlide'+numero_slide_etagere+'-'+j).find('button').addClass('active-product-btn')
                            return;
                            }
                        }
                    }else{
                        let product_image = "<img src='uploads/635691b243b8013044' alt=''>"
                    }
                    // --------------------------remplissage du produit end----------------------

                    // --------------------------------------- section 1 end --------------------
                    if (full_data_width.length == 0) {

                        let div_element = document.createElement('div');
                        div_element.style.width = '100%';

                         div_element.classList.add('custom-carousel-page')
                         div_element.setAttribute('id', 'slide-p'+next_slider)

                        //  construction des lignes
                         let div_row_slide = document.createElement('div');
                         div_row_slide.classList.add('row_div')

                         let div_row_slide1 = document.createElement('div');
                         div_row_slide1.classList.add('row_div')

                         let div_row_slide2 = document.createElement('div');
                         div_row_slide2.classList.add('row_div')

                         const p_box = document.createElement('div');
                        p_box.classList.add('p-box')

                        let new_row_ligne = div_row_slide.getElementsByClassName('slide')
                        let new_row_ligne1 = div_row_slide1.getElementsByClassName('slide')
                        let new_row_ligne2 = div_row_slide2.getElementsByClassName('slide')
                        let j = 0

                        while (new_row_ligne.length < 5) {
                            let bouton_ajout = '<button onclick="testCurentCase('+next_slider+', 0, '+j+')" class="add-product-button-etagere not-active-product-btn" button-index="1" style="position: absolute;" onclick="showAddProduct()"><span class="add-product-icon">+</span></button>'
                            let div_slide = $("<div>")
                            div_slide.addClass("slide");
                            div_slide.addClass("slide-add-btn");
                            div_slide.attr("id", "addSlide"+next_slider+'-0-'+j);
                            div_slide.addClass('init-added-button')
                            $(div_slide).bind('mouseenter', processMouseEnter)
                            $(div_slide).bind('mouseleave', processMouseLeave)
                            div_slide.append(bouton_ajout)
                            $(div_row_slide).append(div_slide)
                            j++;
                        }

                        let j1 = 0
                        while (new_row_ligne1.length < 5) {
                           let bouton_ajout = '<button onclick="testCurentCase('+next_slider+', 1, '+j1+')" class="add-product-button-etagere not-active-product-btn" button-index="1" style="position: absolute;" onclick="showAddProduct()"><span class="add-product-icon">+</span></button>'
                           let div_slide = $("<div>")
                           div_slide.addClass("slide");
                           div_slide.addClass("slide-add-btn");
                           div_slide.attr("id", "addSlide"+next_slider+'-1-'+j1);
                           div_slide.addClass('init-added-button')
                           $(div_slide).bind('mouseenter', processMouseEnter)
                           $(div_slide).bind('mouseleave', processMouseLeave)
                           div_slide.append(bouton_ajout)
                           $(div_row_slide1).append(div_slide)
                           j1++;
                       }

                       let j2 = 0;
                       while (new_row_ligne2.length < 5) {
                       let bouton_ajout = '<button onclick="testCurentCase('+next_slider+', 2, '+j2+')" class="add-product-button-etagere not-active-product-btn" button-index="1" style="position: absolute;" onclick="showAddProduct()"><span class="add-product-icon">+</span></button>'
                       let div_slide = $("<div>")
                       div_slide.addClass("slide");
                       div_slide.addClass("slide-add-btn");
                       div_slide.addClass('init-added-button')
                       div_slide.attr("id", "addSlide"+next_slider+'-2-'+j2);
                       $(div_slide).bind('mouseenter', processMouseEnter)
                       $(div_slide).bind('mouseleave', processMouseLeave)
                       div_slide.append(bouton_ajout)
                       $(div_row_slide2).append(div_slide)
                       j2++;
                   }

                    div_element.append(div_row_slide)
                    div_element.append(div_row_slide1)
                    div_element.append(div_row_slide2)
                    $('.slider-content-wrapper').append(div_element)

                    }

			let row_div = $(currentCase).closest('.row_div')
                    let currentRowSlide = $(row_div).find('.slide')
                    let max_width_product = [];
                    let temporary_tab = []

                    currentRowSlide.each(function(slide, element){
                        let element_attribute = $(element).attr('data-width')
                        if (element_attribute == 264) {
                            max_width_product.push(element_attribute)
                        }else if(element_attribute == 0){
                            temporary_tab.push(element)
                        }
                    })

                    if (max_width_product.length == 4) {
                        // traitement du current case : currentCase
                        Array.prototype.forEach.call(temporary_tab, function(element3) {
                            element3.remove();
                        })
                    }

			 showTabAnnonceCreationProduit();
    }else if(rayon_produit == 10 && response['status'] == "200") {
        // ------------------------------ debut traitement effective ------------------------------------
            // get all row of current slide
            let counter_img = 0;
            let full_data_width = [];
            let product_id = response['produit']['id'];
            let current_slide_rows = $('#slide-p'+numero_slide_etagere).find('.row_div-telephonie'); // recuperation de toutes les ligne de l'étagère

            current_slide_rows.each(function(){
            let row_slide_case = $(this).find('.slide')
                // get all data-width
                Array.prototype.forEach.call(row_slide_case, function(element){
                    if ($(element).attr('data-width') == 0) {
                        full_data_width.push($(element).attr('data-width'))
    }else{
                        console.log('well we here', $(element).attr('data-width'))
    }
                })
                console.log('Voici votre resultat attendu:', row_slide_case);
                counter_img += $(this).find('img').length;
            })

            // -------------------------------product cas too small ---------------------
            if (taille_sur_etagere == 264 && max_width_product1.length == 3 && min_width_product1.length == 1) {

            // if (full_data_width.length > 12) {
            let div_element = document.createElement('div');
            div_element.style.width = '100%';

            div_element.classList.add('custom-carousel-page')
            div_element.setAttribute('id', 'slide-p'+next_slider)

            //  construction des lignes
            let div_row_slide = document.createElement('div');
            div_row_slide.classList.add('row_div-telephonie')

            let div_row_slide1 = document.createElement('div');
            div_row_slide1.classList.add('row_div-telephonie')

            let div_row_slide2 = document.createElement('div');
            div_row_slide2.classList.add('row_div-telephonie')

            const p_box = document.createElement('div');
            p_box.classList.add('p-box')

            let new_row_ligne = div_row_slide.getElementsByClassName('slide')
            let new_row_ligne1 = div_row_slide1.getElementsByClassName('slide')
            let new_row_ligne2 = div_row_slide2.getElementsByClassName('slide')
            let j = 0

            while (new_row_ligne.length < 5) {
                let bouton_ajout = '<button onclick="testCurentCase('+next_slider+', 0, '+j+')" class="add-product-button-etagere not-active-product-btn" button-index="1" style="position: absolute;" onclick="showAddProduct()"><span class="add-product-icon">+</span></button>'
                let div_slide = $("<div>")
                div_slide.addClass("slide");
                div_slide.addClass("slide-add-btn");
                div_slide.attr("id", "addSlide"+next_slider+'-0-'+j);
                div_slide.addClass('init-added-button')
                $(div_slide).bind('mouseenter', processMouseEnter)
                $(div_slide).bind('mouseleave', processMouseLeave)
                div_slide.append(bouton_ajout)
                $(div_row_slide).append(div_slide)
                j++;
            }

            let j1 = 0
            while (new_row_ligne1.length < 5) {
                let bouton_ajout = '<button onclick="testCurentCase('+next_slider+', 1, '+j1+')" class="add-product-button-etagere not-active-product-btn" button-index="1" style="position: absolute;" onclick="showAddProduct()"><span class="add-product-icon">+</span></button>'
                let div_slide = $("<div>")
                div_slide.addClass("slide");
                div_slide.addClass("slide-add-btn");
                div_slide.attr("id", "addSlide"+next_slider+'-1-'+j1);
                div_slide.addClass('init-added-button')
                $(div_slide).bind('mouseenter', processMouseEnter)
                $(div_slide).bind('mouseleave', processMouseLeave)
                div_slide.append(bouton_ajout)
                $(div_row_slide1).append(div_slide)
                j1++;
            }

            let j2 = 0;
            while (new_row_ligne2.length < 5) {
                let bouton_ajout = '<button onclick="testCurentCase('+next_slider+', 2, '+j2+')" class="add-product-button-etagere not-active-product-btn" button-index="1" style="position: absolute;" onclick="showAddProduct()"><span class="add-product-icon">+</span></button>'
                let div_slide = $("<div>")
                div_slide.addClass("slide");
                div_slide.addClass("slide-add-btn");
                div_slide.addClass('init-added-button')
                div_slide.attr("id", "addSlide"+next_slider+'-2-'+j2);
                $(div_slide).bind('mouseenter', processMouseEnter)
                $(div_slide).bind('mouseleave', processMouseLeave)
                div_slide.append(bouton_ajout)
                $(div_row_slide2).append(div_slide)
                j2++;
            }

            div_element.append(div_row_slide)
            div_element.append(div_row_slide1)
            div_element.append(div_row_slide2)
            $('.slider-content-wrapper').append(div_element)

            // ---------------------------- remplissage du produit dans une case --------
            $('#addSlide'+next_slider+'-0-0').find('button').remove()
            $('#addSlide'+next_slider+'-0-0').removeClass('class-default-added-btn')
            $('#addSlide'+next_slider+'-0-0').css('display', 'flex')
            $('#addSlide'+next_slider+'-0-0').css('width', taille_sur_etagere+'px')
            $('#addSlide'+next_slider+'-0-0').attr('data-width', taille_sur_etagere)
            $('#addSlide'+next_slider+'-0-0').css('align-items', 'flex-end')
            // display: flex;  align-items: flex-end;
            let product_image = "<img src='"+response['produit']['image']+"' alt=''>"

            $('#addSlide'+next_slider+'-0-0').append(product_image);

            let data_position = {
                numero_slide: next_slider,
                numero_ligne_slide: 0,
                position_sur_etagere: 0,
                id_produit: product_id
            }

            $.ajax({
                method: 'POST',
                url: '/update_product_position',
                data: data_position,
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
},
                success: function(response) {
                    console.log('Voici la response:', response);
                }
            })

        // }

        return false;

        }
        // -------------------------------product cas too small end ---------------------

        // ---------------------------- remplissage du produit dans une case --------
        $('#addSlide'+numero_slide_etagere+'-'+numero_slide_ligne+'-'+position_sur_etagere).find('button').remove()
        $('#addSlide'+numero_slide_etagere+'-'+numero_slide_ligne+'-'+position_sur_etagere).removeClass('class-default-added-btn')
        $('#addSlide'+numero_slide_etagere+'-'+numero_slide_ligne+'-'+position_sur_etagere).css('display', 'flex')
        $('#addSlide'+numero_slide_etagere+'-'+numero_slide_ligne+'-'+position_sur_etagere).css('width', taille_sur_etagere+'px')
        $('#addSlide'+numero_slide_etagere+'-'+numero_slide_ligne+'-'+position_sur_etagere).attr('data-width', taille_sur_etagere)
        $('#addSlide'+numero_slide_etagere+'-'+numero_slide_ligne+'-'+position_sur_etagere).css('align-items', 'flex-end')
        // display: flex;  align-items: flex-end;
        let product_image = "<img src='"+response['produit']['image']+"' alt=''>"

        $('#addSlide'+numero_slide_etagere+'-'+numero_slide_ligne+'-'+position_sur_etagere).append(product_image);

        // --------------------------- traitement du bouton suivant ----------------------------------
        if ($('#addSlide'+numero_slide_etagere+'-'+position_sur_etagere).find('button').hasClass('active-product-btn')) {
        for (let j = position_sur_etagere + 1; j < 15; j++) {
            if ($('#addSlide'+numero_slide_etagere+'-'+j).find('img').length == 0) {
            $('#addSlide'+numero_slide_etagere+'-'+j).find('button').removeClass('not-active-product-btn')
            $('#addSlide'+numero_slide_etagere+'-'+j).find('button').removeClass('add-product-button-etagere')
            $('#addSlide'+numero_slide_etagere+'-'+j).find('button').addClass('add-product-button-etagere-active')
            $('#addSlide'+numero_slide_etagere+'-'+j).find('button').removeClass('not-active-product-btn-hover')
            $('#addSlide'+numero_slide_etagere+'-'+j).find('button').addClass('active-product-btn')
            return;
            }
        }
        }else{
            let product_image = "<img src='uploads/635691b243b8013044' alt=''>"
        }
            // --------------------------remplissage du produit end----------------------

            // --------------------------------------- section 1 end --------------------
            if (full_data_width.length == 0) {
            // console.log('Nous sommes dans le plein de l étagère ...', slides)
            let div_element = document.createElement('div');
            div_element.style.width = '100%';

            div_element.classList.add('custom-carousel-page')
            div_element.setAttribute('id', 'slide-p'+next_slider)

            //  construction des lignes
            let div_row_slide = document.createElement('div');
            div_row_slide.classList.add('row_div-telephonie')

            let div_row_slide1 = document.createElement('div');
            div_row_slide1.classList.add('row_div-telephonie')

            let div_row_slide2 = document.createElement('div');
            div_row_slide2.classList.add('row_div-telephonie')

            let div_row_slide3 = document.createElement('div');
            div_row_slide3.classList.add('row_div-telephonie')

            let div_row_slide4 = document.createElement('div');
            div_row_slide4.classList.add('row_div-telephonie')

            const p_box = document.createElement('div');
            p_box.classList.add('p-box')

            let new_row_ligne = div_row_slide.getElementsByClassName('slide')
            let new_row_ligne1 = div_row_slide1.getElementsByClassName('slide')
            let new_row_ligne2 = div_row_slide2.getElementsByClassName('slide')
            let new_row_ligne3 = div_row_slide3.getElementsByClassName('slide')
            let new_row_ligne4 = div_row_slide4.getElementsByClassName('slide')
            let j = 0

            while (new_row_ligne.length < 6) {
                let bouton_ajout = '<button onclick="testCurentCase('+next_slider+', 0, '+j+')" class="add-product-button-etagere not-active-product-btn" button-index="1" style="position: absolute;" onclick="showAddProduct()"><span class="add-product-icon">+</span></button>'
                let div_slide = $("<div>")
                div_slide.addClass("slide");
                div_slide.addClass("slide-add-btn");
                div_slide.attr("id", "addSlide"+next_slider+'-0-'+j);
                div_slide.addClass('init-added-button-telephonie')
                $(div_slide).bind('mouseenter', processMouseEnter)
                $(div_slide).bind('mouseleave', processMouseLeave)
                div_slide.append(bouton_ajout)
                $(div_row_slide).append(div_slide)
                j++;
            }

            let j1 = 0
            while (new_row_ligne1.length < 6) {
                let bouton_ajout = '<button onclick="testCurentCase('+next_slider+', 1, '+j1+')" class="add-product-button-etagere not-active-product-btn" button-index="1" style="position: absolute;" onclick="showAddProduct()"><span class="add-product-icon">+</span></button>'
                let div_slide = $("<div>")
                div_slide.addClass("slide");
                div_slide.addClass("slide-add-btn");
                div_slide.attr("id", "addSlide"+next_slider+'-1-'+j1);
                div_slide.addClass('init-added-button-telephonie')
                $(div_slide).bind('mouseenter', processMouseEnter)
                $(div_slide).bind('mouseleave', processMouseLeave)
                div_slide.append(bouton_ajout)
                $(div_row_slide1).append(div_slide)
                j1++;
            }

            let j2 = 0;
            while (new_row_ligne2.length < 6) {
            let bouton_ajout = '<button onclick="testCurentCase('+next_slider+', 2, '+j2+')" class="add-product-button-etagere not-active-product-btn" button-index="1" style="position: absolute;" onclick="showAddProduct()"><span class="add-product-icon">+</span></button>'
            let div_slide = $("<div>")
            div_slide.addClass("slide");
            div_slide.addClass("slide-add-btn");
            div_slide.addClass('init-added-button-telephonie')
            div_slide.attr("id", "addSlide"+next_slider+'-2-'+j2);
            $(div_slide).bind('mouseenter', processMouseEnter)
            $(div_slide).bind('mouseleave', processMouseLeave)
            div_slide.append(bouton_ajout)
            $(div_row_slide2).append(div_slide)
            j2++;
        }

        let j3 = 0;
        while (new_row_ligne3.length < 6) {
        let bouton_ajout = '<button onclick="testCurentCase('+next_slider+', 2, '+j3+')" class="add-product-button-etagere not-active-product-btn" button-index="1" style="position: absolute;" onclick="showAddProduct()"><span class="add-product-icon">+</span></button>'
        let div_slide = $("<div>")
        div_slide.addClass("slide");
        div_slide.addClass("slide-add-btn");
        div_slide.addClass('init-added-button-telephonie')
        div_slide.attr("id", "addSlide"+next_slider+'-2-'+j3);
        $(div_slide).bind('mouseenter', processMouseEnter)
        $(div_slide).bind('mouseleave', processMouseLeave)
        div_slide.append(bouton_ajout)
        $(div_row_slide3).append(div_slide)
        j3++;
    }

    let j4 = 0;
        while (new_row_ligne4.length < 6) {
        let bouton_ajout = '<button onclick="testCurentCase('+next_slider+', 2, '+j4+')" class="add-product-button-etagere not-active-product-btn" button-index="1" style="position: absolute;" onclick="showAddProduct()"><span class="add-product-icon">+</span></button>'
        let div_slide = $("<div>")
        div_slide.addClass("slide");
        div_slide.addClass("slide-add-btn");
        div_slide.addClass('init-added-button-telephonie')
        div_slide.attr("id", "addSlide"+next_slider+'-2-'+j4);
        $(div_slide).bind('mouseenter', processMouseEnter)
        $(div_slide).bind('mouseleave', processMouseLeave)
        div_slide.append(bouton_ajout)
        $(div_row_slide4).append(div_slide)
        j4++;
    }

    div_element.append(div_row_slide)
    div_element.append(div_row_slide1)
    div_element.append(div_row_slide2)
    div_element.append(div_row_slide3)
    div_element.append(div_row_slide4)
    // slides.appendChild(div_element)

    document.getElementsByClassName("slider-content-wrapper")[0].appendChild(div_element);

}

    let row_div = $(currentCase).closest('.row_div-telephonie')
    let currentRowSlide = $(row_div).find('.slide')
    let max_width_product = [];
    let temporary_tab = []

    currentRowSlide.each(function(slide, element){
        let element_attribute = $(element).attr('data-width')
        if (element_attribute == 264) {
            max_width_product.push(element_attribute)
        }else if(element_attribute == 0){
            temporary_tab.push(element)
        }
    })

    if (max_width_product.length == 4) {
        // traitement du current case : currentCase
        Array.prototype.forEach.call(temporary_tab, function(element3) {
            element3.remove();
        })
    }


showTabAnnonceCreationProduit();
}else if(rayon_produit == 38 && response['status'] == "200") {
    // ------------------------------ debut traitement effective ------------------------------------
        // get all row of current slide
        let counter_img = 0;
        let full_data_width = [];
        let product_id = response['produit']['id'];
        let current_slide_rows = $('#slide-p'+numero_slide_etagere).find('.row_div-telephonie'); // recuperation de toutes les ligne de l'étagère

        current_slide_rows.each(function(){
        let row_slide_case = $(this).find('.slide')
            // get all data-width
            Array.prototype.forEach.call(row_slide_case, function(element){
                if ($(element).attr('data-width') == 0) {
                    full_data_width.push($(element).attr('data-width'))
}else{
                    console.log('well we here', $(element).attr('data-width'))
}
            })
            console.log('Voici votre resultat attendu:', row_slide_case);
            counter_img += $(this).find('img').length;
        })

        // -------------------------------product cas too small ---------------------
        if (taille_sur_etagere == 264 && max_width_product1.length == 3 && min_width_product1.length == 1) {

        // if (full_data_width.length > 12) {
        let div_element = document.createElement('div');
        div_element.style.width = '100%';

        div_element.classList.add('custom-carousel-page')
        div_element.setAttribute('id', 'slide-p'+next_slider)

        //  construction des lignes
        let div_row_slide = document.createElement('div');
        div_row_slide.classList.add('row_div-telephonie')

        let div_row_slide1 = document.createElement('div');
        div_row_slide1.classList.add('row_div-telephonie')

        let div_row_slide2 = document.createElement('div');
        div_row_slide2.classList.add('row_div-telephonie')

        const p_box = document.createElement('div');
        p_box.classList.add('p-box')

        let new_row_ligne = div_row_slide.getElementsByClassName('slide')
        let new_row_ligne1 = div_row_slide1.getElementsByClassName('slide')
        let new_row_ligne2 = div_row_slide2.getElementsByClassName('slide')
        let j = 0

        while (new_row_ligne.length < 5) {
            let bouton_ajout = '<button onclick="testCurentCase('+next_slider+', 0, '+j+')" class="add-product-button-etagere not-active-product-btn" button-index="1" style="position: absolute;" onclick="showAddProduct()"><span class="add-product-icon">+</span></button>'
            let div_slide = $("<div>")
            div_slide.addClass("slide");
            div_slide.addClass("slide-add-btn");
            div_slide.attr("id", "addSlide"+next_slider+'-0-'+j);
            div_slide.addClass('init-added-button')
            $(div_slide).bind('mouseenter', processMouseEnter)
            $(div_slide).bind('mouseleave', processMouseLeave)
            div_slide.append(bouton_ajout)
            $(div_row_slide).append(div_slide)
            j++;
        }

        let j1 = 0
        while (new_row_ligne1.length < 5) {
            let bouton_ajout = '<button onclick="testCurentCase('+next_slider+', 1, '+j1+')" class="add-product-button-etagere not-active-product-btn" button-index="1" style="position: absolute;" onclick="showAddProduct()"><span class="add-product-icon">+</span></button>'
            let div_slide = $("<div>")
            div_slide.addClass("slide");
            div_slide.addClass("slide-add-btn");
            div_slide.attr("id", "addSlide"+next_slider+'-1-'+j1);
            div_slide.addClass('init-added-button')
            $(div_slide).bind('mouseenter', processMouseEnter)
            $(div_slide).bind('mouseleave', processMouseLeave)
            div_slide.append(bouton_ajout)
            $(div_row_slide1).append(div_slide)
            j1++;
        }

        let j2 = 0;
        while (new_row_ligne2.length < 5) {
            let bouton_ajout = '<button onclick="testCurentCase('+next_slider+', 2, '+j2+')" class="add-product-button-etagere not-active-product-btn" button-index="1" style="position: absolute;" onclick="showAddProduct()"><span class="add-product-icon">+</span></button>'
            let div_slide = $("<div>")
            div_slide.addClass("slide");
            div_slide.addClass("slide-add-btn");
            div_slide.addClass('init-added-button')
            div_slide.attr("id", "addSlide"+next_slider+'-2-'+j2);
            $(div_slide).bind('mouseenter', processMouseEnter)
            $(div_slide).bind('mouseleave', processMouseLeave)
            div_slide.append(bouton_ajout)
            $(div_row_slide2).append(div_slide)
            j2++;
        }

        div_element.append(div_row_slide)
        div_element.append(div_row_slide1)
        div_element.append(div_row_slide2)
        $('.slider-content-wrapper').append(div_element)

        // ---------------------------- remplissage du produit dans une case --------
        $('#addSlide'+next_slider+'-0-0').find('button').remove()
        $('#addSlide'+next_slider+'-0-0').removeClass('class-default-added-btn')
        $('#addSlide'+next_slider+'-0-0').css('display', 'flex')
        $('#addSlide'+next_slider+'-0-0').css('width', taille_sur_etagere+'px')
        $('#addSlide'+next_slider+'-0-0').attr('data-width', taille_sur_etagere)
        $('#addSlide'+next_slider+'-0-0').css('align-items', 'flex-end')
        // display: flex;  align-items: flex-end;
        let product_image = "<img src='"+response['produit']['image']+"' alt=''>"

        $('#addSlide'+next_slider+'-0-0').append(product_image);

        let data_position = {
            numero_slide: next_slider,
            numero_ligne_slide: 0,
            position_sur_etagere: 0,
            id_produit: product_id
        }

        $.ajax({
            method: 'POST',
            url: '/update_product_position',
            data: data_position,
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
},
            success: function(response) {
                console.log('Voici la response:', response);
            }
        })

    // }

    return false;

    }
    // -------------------------------product cas too small end ---------------------

    // ---------------------------- remplissage du produit dans une case --------
    $('#addSlide'+numero_slide_etagere+'-'+numero_slide_ligne+'-'+position_sur_etagere).find('button').remove()
    $('#addSlide'+numero_slide_etagere+'-'+numero_slide_ligne+'-'+position_sur_etagere).removeClass('class-default-added-btn')
    $('#addSlide'+numero_slide_etagere+'-'+numero_slide_ligne+'-'+position_sur_etagere).css('display', 'flex')
    $('#addSlide'+numero_slide_etagere+'-'+numero_slide_ligne+'-'+position_sur_etagere).css('width', taille_sur_etagere+'px')
    $('#addSlide'+numero_slide_etagere+'-'+numero_slide_ligne+'-'+position_sur_etagere).attr('data-width', taille_sur_etagere)
    $('#addSlide'+numero_slide_etagere+'-'+numero_slide_ligne+'-'+position_sur_etagere).css('align-items', 'flex-end')
    // display: flex;  align-items: flex-end;
    let product_image = "<img src='"+response['produit']['image']+"' alt=''>"

    $('#addSlide'+numero_slide_etagere+'-'+numero_slide_ligne+'-'+position_sur_etagere).append(product_image);

    // --------------------------- traitement du bouton suivant ----------------------------------
    if ($('#addSlide'+numero_slide_etagere+'-'+position_sur_etagere).find('button').hasClass('active-product-btn')) {
    for (let j = position_sur_etagere + 1; j < 15; j++) {
        if ($('#addSlide'+numero_slide_etagere+'-'+j).find('img').length == 0) {
        $('#addSlide'+numero_slide_etagere+'-'+j).find('button').removeClass('not-active-product-btn')
        $('#addSlide'+numero_slide_etagere+'-'+j).find('button').removeClass('add-product-button-etagere')
        $('#addSlide'+numero_slide_etagere+'-'+j).find('button').addClass('add-product-button-etagere-active')
        $('#addSlide'+numero_slide_etagere+'-'+j).find('button').removeClass('not-active-product-btn-hover')
        $('#addSlide'+numero_slide_etagere+'-'+j).find('button').addClass('active-product-btn')
        return;
        }
    }
    }else{
        let product_image = "<img src='uploads/635691b243b8013044' alt=''>"
    }
        // --------------------------remplissage du produit end----------------------

        // --------------------------------------- section 1 end --------------------
        if (full_data_width.length == 0) {
        // console.log('Nous sommes dans le plein de l étagère ...', slides)
        let div_element = document.createElement('div');
        div_element.style.width = '100%';

        div_element.classList.add('custom-carousel-page')
        div_element.setAttribute('id', 'slide-p'+next_slider)

        //  construction des lignes
        let div_row_slide = document.createElement('div');
        div_row_slide.classList.add('row_div-telephonie')

        let div_row_slide1 = document.createElement('div');
        div_row_slide1.classList.add('row_div-telephonie')

        let div_row_slide2 = document.createElement('div');
        div_row_slide2.classList.add('row_div-telephonie')

        let div_row_slide3 = document.createElement('div');
        div_row_slide3.classList.add('row_div-telephonie')

        let div_row_slide4 = document.createElement('div');
        div_row_slide4.classList.add('row_div-telephonie')

        const p_box = document.createElement('div');
        p_box.classList.add('p-box')

        let new_row_ligne = div_row_slide.getElementsByClassName('slide')
        let new_row_ligne1 = div_row_slide1.getElementsByClassName('slide')
        let new_row_ligne2 = div_row_slide2.getElementsByClassName('slide')
        let new_row_ligne3 = div_row_slide3.getElementsByClassName('slide')
        let new_row_ligne4 = div_row_slide4.getElementsByClassName('slide')
        let j = 0

        while (new_row_ligne.length < 6) {
            let bouton_ajout = '<button onclick="testCurentCase('+next_slider+', 0, '+j+')" class="add-product-button-etagere not-active-product-btn" button-index="1" style="position: absolute;" onclick="showAddProduct()"><span class="add-product-icon">+</span></button>'
            let div_slide = $("<div>")
            div_slide.addClass("slide");
            div_slide.addClass("slide-add-btn");
            div_slide.attr("id", "addSlide"+next_slider+'-0-'+j);
            div_slide.addClass('init-added-button-telephonie')
            $(div_slide).bind('mouseenter', processMouseEnter)
            $(div_slide).bind('mouseleave', processMouseLeave)
            div_slide.append(bouton_ajout)
            $(div_row_slide).append(div_slide)
            j++;
        }

        let j1 = 0
        while (new_row_ligne1.length < 6) {
            let bouton_ajout = '<button onclick="testCurentCase('+next_slider+', 1, '+j1+')" class="add-product-button-etagere not-active-product-btn" button-index="1" style="position: absolute;" onclick="showAddProduct()"><span class="add-product-icon">+</span></button>'
            let div_slide = $("<div>")
            div_slide.addClass("slide");
            div_slide.addClass("slide-add-btn");
            div_slide.attr("id", "addSlide"+next_slider+'-1-'+j1);
            div_slide.addClass('init-added-button-telephonie')
            $(div_slide).bind('mouseenter', processMouseEnter)
            $(div_slide).bind('mouseleave', processMouseLeave)
            div_slide.append(bouton_ajout)
            $(div_row_slide1).append(div_slide)
            j1++;
        }

        let j2 = 0;
        while (new_row_ligne2.length < 6) {
        let bouton_ajout = '<button onclick="testCurentCase('+next_slider+', 2, '+j2+')" class="add-product-button-etagere not-active-product-btn" button-index="1" style="position: absolute;" onclick="showAddProduct()"><span class="add-product-icon">+</span></button>'
        let div_slide = $("<div>")
        div_slide.addClass("slide");
        div_slide.addClass("slide-add-btn");
        div_slide.addClass('init-added-button-telephonie')
        div_slide.attr("id", "addSlide"+next_slider+'-2-'+j2);
        $(div_slide).bind('mouseenter', processMouseEnter)
        $(div_slide).bind('mouseleave', processMouseLeave)
        div_slide.append(bouton_ajout)
        $(div_row_slide2).append(div_slide)
        j2++;
    }

    let j3 = 0;
    while (new_row_ligne3.length < 6) {
    let bouton_ajout = '<button onclick="testCurentCase('+next_slider+', 2, '+j3+')" class="add-product-button-etagere not-active-product-btn" button-index="1" style="position: absolute;" onclick="showAddProduct()"><span class="add-product-icon">+</span></button>'
    let div_slide = $("<div>")
    div_slide.addClass("slide");
    div_slide.addClass("slide-add-btn");
    div_slide.addClass('init-added-button-telephonie')
    div_slide.attr("id", "addSlide"+next_slider+'-2-'+j3);
    $(div_slide).bind('mouseenter', processMouseEnter)
    $(div_slide).bind('mouseleave', processMouseLeave)
    div_slide.append(bouton_ajout)
    $(div_row_slide3).append(div_slide)
    j3++;
}

let j4 = 0;
    while (new_row_ligne4.length < 6) {
    let bouton_ajout = '<button onclick="testCurentCase('+next_slider+', 2, '+j4+')" class="add-product-button-etagere not-active-product-btn" button-index="1" style="position: absolute;" onclick="showAddProduct()"><span class="add-product-icon">+</span></button>'
    let div_slide = $("<div>")
    div_slide.addClass("slide");
    div_slide.addClass("slide-add-btn");
    div_slide.addClass('init-added-button-telephonie')
    div_slide.attr("id", "addSlide"+next_slider+'-2-'+j4);
    $(div_slide).bind('mouseenter', processMouseEnter)
    $(div_slide).bind('mouseleave', processMouseLeave)
    div_slide.append(bouton_ajout)
    $(div_row_slide4).append(div_slide)
    j4++;
}

div_element.append(div_row_slide)
div_element.append(div_row_slide1)
div_element.append(div_row_slide2)
div_element.append(div_row_slide3)
div_element.append(div_row_slide4)
// slides.appendChild(div_element)

document.getElementsByClassName("slider-content-wrapper")[0].appendChild(div_element);

}

let row_div = $(currentCase).closest('.row_div-telephonie')
let currentRowSlide = $(row_div).find('.slide')
let max_width_product = [];
let temporary_tab = []

currentRowSlide.each(function(slide, element){
    let element_attribute = $(element).attr('data-width')
    if (element_attribute == 264) {
        max_width_product.push(element_attribute)
    }else if(element_attribute == 0){
        temporary_tab.push(element)
    }
})

if (max_width_product.length == 4) {
    // traitement du current case : currentCase
    Array.prototype.forEach.call(temporary_tab, function(element3) {
        element3.remove();
    })
}


showTabAnnonceCreationProduit();
}else{
        console.log('La reponse est bien => ', response)
        alert("Ouf il s'est produit un petit soucis, veillez reéssayiez merci.")

        }
      }
    });

    }


        function toggleFraisExpedition(id) {
           if ( $('#vouspayer'+id).is(':checked')) {
                $('#clientpaie'+id).addClass('negociation-section-desabled')
                $('#mettreEnRayonBtn').removeClass('add-ray-desable')
                $('#clientpaie'+id).prop('checked', false)
                $('#clientpaieInput'+id).addClass('negociation-section-desabled')
                $('#clientpaieInput'+id).css('background-color','rgb(216, 216, 216)')
           }else{
            $('#clientpaie'+id).removeClass('negociation-section-desabled')
            $('#clientpaie'+id).prop('checked', true)
            $('#clientpaieInput'+id).removeClass('negociation-section-desabled')
            $('#clientpaieInput'+id).css('background-color','#fff')
            // $('#mettreEnRayonBtn').addClass('add-ray-desable')
           }
        }

        function toggleFraisExpedition1(id) {
            if ( $('#clientpaie'+id).is(':checked')) {
                $('#vouspayer'+id).addClass('negociation-section-desabled')
                $('#clientpaieInput'+id).removeClass('negociation-section-desabled')
                $('#clientpaieInput'+id).css('background-color','#fff')
                $('#mettreEnRayonBtn').removeClass('add-ray-desable')
                $('#vouspayer'+id).prop('checked', false)
           }else{
            $('#vouspayer'+id).removeClass('negociation-section-desabled')
            $('#clientpaieInput'+id).addClass('negociation-section-desabled')
            $('#clientpaieInput'+id).css('background-color','#D8D8D8')
            $('#vouspayer'+id).prop('checked', true)
            // $('#mettreEnRayonBtn').addClass('add-ray-desable')
           }
        }

        // afficher l'image dans la grande zone d'affichage
        function showImagePreviev(image, index_div) {

            let img_p = new Image();
            img_p.onload = function() {
                if (img_p.height > img_p.width) {
                    $('.gros-cadre').addClass('gros-cadre-user-long')
                    $('.img-card').addClass('img-card-long')
                }else {
                    $('.img-card').removeClass('img-card-long')
                    $('.gros-cadre').removeClass('gros-cadre-user-long')
                }
            };

            img_p.src = '/'+image;

            let zone_petite_image = $('.tm_show_recap_cadre-div')
            if ($('#image_principalMarchandPreview').hasClass('s-none')) {
                $('#image_principalMarchandPreview').removeClass('s-none')
            }

            $('#image_principalMarchandPreview').attr('src', image)
            if (!$('.tm_show_p_product').hasClass('s-none')) {
                $('.tm_show_p_product').addClass('s-none')
                $('.gros-cadre').css({"padding-left": '5px', 'padding-right': '5px'})
            }

            for (let h = 0; h < zone_petite_image.length; h++) {
               $(zone_petite_image[h]).removeClass('tm_active_img_product')
            }

            $(zone_petite_image[index_div]).addClass('tm_active_img_product')
        }

        function productVideoPreview(video, index_div) {
            $('.gros-cadre').css({"padding-left": '0px', 'padding-right': '0px'})
            $('.gros-cadre').removeClass('img-card-long')
            $('#image_principalMarchandPreview').removeClass('img-card-long')
            $('#marchand_video_preview_big').removeClass('img-card-long')
            $('#image_principalMarchandPreview').addClass('s-none')
            $('.tm_show_p_product').removeClass('s-none')
            $('#marchand_video_preview_big').attr('src', video)


            let zone_petite_image = $('.tm_show_recap_cadre-div')
            for (let h = 0; h < zone_petite_image.length; h++) {
                $(zone_petite_image[h]).removeClass('tm_active_img_product')
             }

             $(zone_petite_image[index_div]).addClass('tm_active_img_product')
            console.log(video, 'Et le div index est:', index_div)

        }

        function showRecapProduitMarchand(id) {

            let zone_petite_image = $('.tm_show_recap_cadre-div')
            $(zone_petite_image[0]).addClass('tm_active_img_product')
            for (let h = 1; h < zone_petite_image.length; h++) {
                $(zone_petite_image[h]).removeClass('tm_active_img_product')
             }

            let init_peti_cadre = $('.petit-cadre-preview')

            for (let g = 1; g < 5; g++) {
                $('#image_autreMarchand'+g).hide()
                console.log(init_peti_cadre[g])
                $(init_peti_cadre[g]).removeClass('set-white-bg')
                $(init_peti_cadre[g]).addClass('set-gray-bg')
            }

            if (!$('.tm_show_p_product').hasClass('s-none')) {
                $('.tm_show_p_product').addClass('s-none')
                $('#image_principalMarchandPreview').removeClass('s-none')
            }

            $.ajax({
                method: 'GET',
                url: 'show_detail_produit/'+id,
                data: {},
                headers: {},
                success: function(response){

                    console.log('response is:', response)

                    $('#article_title_marchand').text(response['Detail_Produit'][0][0]['libelle'])
                    $('#prix_total_m').text(response['Detail_Produit'][0][0]['prix']+'Fcfa')
                    $('#description_marchand_zone1').text(response['Detail_Produit'][0][0]['description'])
                    $('#image_principalMarchandPreview').attr('src', response['Detail_Produit'][0][0]['image'])
                    $('#image_principalM1').attr('src', response['Detail_Produit'][0][0]['image'])

                    $('#image_principalM1').bind('click', function(v) {
                        showImagePreviev(response['Detail_Produit'][0][0]['image'], 0)
                    })

    // calucl de la taille et affectation des nouvelle propriétés
                     let img_p = new Image();
                    img_p.onload = function() {
                        if (img_p.height > img_p.width) {
                            console.log('Hauteur suppérieur à la largeur')
                            $('.img-card-petit-p').addClass('img-card-petit-long')
                            $('.img-card').addClass(' img-card-long')
                            $('.gros-cadre').addClass('gros-cadre-user-long')
                        }else {
                            $('.img-card-petit-p').removeClass('img-card-petit-long')
                            $('.img-card').removeClass(' img-card-long')
                            $('.gros-cadre').removeClass('gros-cadre-user-long')
                        }
                    };

                    img_p.src = '/'+response['Detail_Produit'][0][0]["image"];

                    $('.gros-cadre').addClass('set-white-color')
                    $('#quantite_marchand').val(response['Detail_Produit'][0][0]['quantite'])
                    $('#reference_marchand-bis').text(response['Detail_Produit'][0][0]['ref_produit'])

                    if (response['Detail_Produit'][0][0]['video_preview'] != null) {

                        $('.tm_vid_icon').empty();
                        const img_icon = '<img class="img-card-petit-p" style="height: 50%; width: 50%" src="assets/images/1497554804-social-media04_84871.svg" alt="" id="image_autreMarchand4d" >'
                        $('.tm_vid_icon').append(img_icon)
                        $('.tm_vid_icon').bind('click', function(){
                            productVideoPreview(response['Detail_Produit'][0][0]['video_preview'], 5)
                        })

                    }else{
                        $image = $('#image_autreMarchand4d')
                        $('.tm_vid_icon').empty();
                        $('.petit-cadre-preview').removeClass('set-white-bg')
                        $('.petit-cadre-preview').addClass('set-gray-bg')
                    }

                    if (response['Detail_Produit'][1].length > 0) {
                        $('#produit-univer-preview').text(response['Detail_Produit'][1][0]['libelle'])
                    }

                    let a_index = 0;

                    for (let caracteristique_item in response['Detail_Produit'][14] ) {
                        console.log('Voici les indexs', response['Detail_Produit'][14][caracteristique_item])
                        $('#carac_produit-marchand'+a_index).empty()
                        $('#carac_produit-marchand'+a_index).append('<option>'+response['Detail_Produit'][14][caracteristique_item]+'</option>')
                        $('#carac_produit-marchandLabel'+a_index).text(caracteristique_item)
                        a_index++
                    }

                    if (response['Detail_Produit'][8].length > 0) {
                        $('#retour-show-recap').empty();
                        for (let r = 0; r < response['Detail_Produit'][8].length; r++) {
                            if (response['Detail_Produit'][8][r]['type_retour'] == 'national') {
                                let retour_span = '<span>Retour national accepté</span>'
                                $('#retour-show-recap').append(retour_span);
                            }

                        }
                    }

                    if (response['Detail_Produit'][9].length > 0) {
                        $('#show-detail-expedition').empty();
                        for (let exp = 0; exp < response['Detail_Produit'][9].length; exp++) {
                            let expedition_span = '<span>'+response['Detail_Produit'][9][exp]['mode_expedition']+'</span>'
                            $('#show-detail-expedition').append(expedition_span);
                        }
                    }

                    if (response['Detail_Produit'][11].length > 0) {
                        $('#show_detail_bank_paiement').empty();
                        for (let bp = 0; bp < response['Detail_Produit'][11].length; bp++) {
                            if (response['Detail_Produit'][11][bp]['type_carte'] == 'Visa') {
                                let bank_payement = '<span style="margin-right: 5px">Carte Bancaire | </span>'
                                $('#show_detail_bank_paiement').append(bank_payement);
                            }
                        }
                    }

                    if (response['Detail_Produit'][12].length > 0) {
                        $('#show_detail_mobile_paiement').empty();
                        for (let mp = 0; mp < response['Detail_Produit'][12].length; mp++) {

                            if (response['Detail_Produit'][12][mp]['type_service'] == 'airtel') {
                                let mobile_payement = '<span>Airtel Money</span>'
                                $('#show_detail_mobile_paiement').append(mobile_payement);
                            }

                            if (response['Detail_Produit'][12][mp]['type_service'] == 'moov') {
                                let mobile_payement = '<span>Moov Money</span>'
                                $('#show_detail_mobile_paiement').append(mobile_payement);
                            }

                        }
                    }

                    if (response['Detail_Produit'][13].length > 0) {
                        $('#produit-rayon-preview').text(response['Detail_Produit'][13][0]['libelle'])
                        $.ajax({
                            method: 'GET',
                            url: 'rayon_articles_associer/'+response['Detail_Produit'][13][0]['id'],
                            success: function(response) {
                                console.log('Voici les produits associes', response)
                                if (response.length > 0) {

                                    $('.produit-associer-section').empty();

                                    if (response.length > 0) {
                                        $('.produit-associer-section-marchand').empty();
                                        for (let j = 0; j < response.length; j++) {
                                            let rayon_produit_associer = '<a title="'+response[j]['libelle']+'"><img src="storage/images/rayons/'+response[j]['logo']+'" alt="B"></a>'
                                            $('.produit-associer-section-marchand').append(rayon_produit_associer)
                                        }
                                    }
                                }
                                // $('#payement-marchand-preview').text(response['cardInfo'][0]['type_carte'])
                            }
                        })
                    }

                    $('.gros-cadre').addClass('set-white-bg')

                    for (let v = 0; v < response['Detail_Produit'][5].length; v++) {
                        let inter_index = v + 1

                        let img = new Image(); //----------------------------------
                        img.onload = function() {
                        if (img.height > img.width) {
                            $('#image_autreMarchand'+inter_index).closest('petit-cadre-preview').addClass('img-card-long')
                            $('#image_autreMarchand'+inter_index).addClass('img-card-petit-long')
                        }else {
                            $('#image_autreMarchand'+inter_index).closest('petit-cadre-preview').removeClass('img-card-long')
                            $('#image_autreMarchand'+inter_index).removeClass('img-card-petit-long')
                        }
                        };
                        img.src = '/'+response['Detail_Produit'][5][v]["image"];

                        if ($('#image_autreMarchand'+inter_index).hasClass('s-none')) {
                            $('#image_autreMarchand'+inter_index).removeClass('s-none')
                        }
                        $('.petit-cadre-preview').removeClass('set-gray-bg')
                        $('.petit-cadre-preview').addClass('set-white-bg')


                        $('#image_autreMarchand'+inter_index).attr('src', response['Detail_Produit'][5][v]["image"])
                        $('#image_autreMarchand'+inter_index).show()
                        let image_element = response['Detail_Produit'][5][v]["image"]
                        let index_div = v
                        $('#image_autreMarchand'+inter_index).bind('click', function(v) {
                            showImagePreviev(image_element, inter_index)
                        })
                        let petit_cadre = $('.petit-cadre')

                        $(petit_cadre[v]).addClass('set-white-color')

                    }

                    if(response[0][0]['produit_images'].length < 6) {
                        for (let u = response[0][0]['produit_images'].length; u < 6; u++) {
                            $('#image_autreMarchand'+u).addClass('s-none')
                        }
                    }

                }
            })

            $('#recapProduitMarchand').modal('show')
        }



        function slide_infos() {
            let inf_option = document.getElementsByClassName('slide-infos-option')
            Array.prototype.forEach.call(inf_option, function(ele_option) {
                console.log('every element is here', ele_option)
                ele_option.style.backgroundColor = "red !important"
                ele_option.style.width = "60px"
            })
        }

        function closeMarchandPoppup(){
            $('#recapProduitMarchand').modal('hide')
        }

        // teste de recuperation de caracterisquite
        function textCaracteristiqueValue() {
            $('#caracteristique_element-id select').each(function(){

                if ($(this).attr('select-type') === 'Normal') {
                    console.log('Voici les valeur selectionnée:', $(this).find(':selected').val())
                }else if($(this).attr('select-type') === 'Supplementaire') {
                    console.log('Autre caracteristiques supplementaires:', $(this).find(':selected').val())
                }
            })
        }

        // let tableau d'image image_array =    {

        // }

        function textImagesFunction() {
            // image url
            let img_url = $('#photo_0-view').attr('src');

            let tableau_image = []
            for (let j = 0; j < 6; j++) {
                if ($('#photo_'+j+'-view').attr('src') != "") {
                    tableau_image.push($('#photo_'+j+'-view').attr('src'))
                }
            }

            $.ajax({
                type: 'POST',
                url: '/test_upload_file',
                data: {image: tableau_image},
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                success: function(response) {
                    console.log('Voici la reponse success:', response)
                }
            })

        }

        function testNegociation() {
            $('#negociation-desactivation input[type="checkbox"]').each(function() {
                if ($(this).is(':checked')) {
                    let type_negociation = $(this).val();
                    let input_value = $(this).attr('data-valeur')
                    let valeur_checker = $('#'+input_value).val();
                }
            })
        }

        function testAchatMultiple() {
            $('#achat-multiple-values input[type="checkbox"]').each(function() {
                if ($(this).is(':checked')) {
                    let type_achat = $(this).val(); // type achat choisie
                    let select_value = $(this).attr('data-select-value') // recuperer l 'id du select
                    let selected_value = $('#'+select_value).find(':selected').text();
                }
            })

        }

        let retour_national_object  = [];
        let retour_international_object = [];

        function testOptionRetourNational() {
            $('#option-retour-nationaux-zone select').each(function() {
                let valeur_retour = $(this).find(':selected').val()
                retour_national_object.push(valeur_retour)
            })

            console.log('Votre object est:', retour_national_object)

        }

        function testOptionRetourInternational() {
            $('#option-retour-internationaux-zone select').each(function() {
                let valeur_retour = $(this).find(':selected').val()
                retour_international_object.push(valeur_retour)
            })

            console.log('Votre tableau internationnal', retour_international_object)
        }

        function testMoyenExpedition() {
            let tableau_moyens_expedition = []
            modes_expeditions_choisi.forEach(id_mode => {
                let prix_expedition = $('#clientpaieInput'+id_mode).val()
                let line_mode_expedition = {};
                $('#mode_expedition_valeur'+id_mode+' input[type="checkbox"]').each(function() {
                    if ($(this).is(':checked')) {
                        console.log('Voici le checkbox qui va avec ça:', $(this).val())
                        line_mode_expedition['payeur'] = $(this).val()
                        line_mode_expedition['prix'] = $('#clientpaieInput'+id_mode).val();
                        line_mode_expedition['mode'] = id_mode
                    }
                })
                tableau_moyens_expedition.push(line_mode_expedition)
            });

            console.log(tableau_moyens_expedition)

        }


        // --------------------------- test image sur étagère -----------------------
        function testImageEtagere() {
            let image_etagere = "uploads/634aca20bfa1b88839";
            let image_sub_zone = image_etagere.substring(0, 8);
            if (image_sub_zone === "uploads/") {
                let replaced_image = image_etagere.replace("uploads/", " ")
                console.log('La valeur sans upload est: ', replaced_image.trim());
            }else{
                console.log('C est chemin simple')
            }
            console.log('Voici votre image sur étagère', image_sub_zone)
        }

        function addAttributeElements() {

            var input_container = document.getElementById('myInputCaracteristiqueContainer')
            var input_element = input_container.getElementsByTagName('input')
            var index_elemnt = input_element.length + 1

            var element = '<div style="margin-left: 5xp" id="attribute-div_'+index_elemnt+'"><input class="add-input-caracteristique" id="attribute_'+index_elemnt+'" type="text" style="height: 31px; width: 118px; border-radius: 6px; background-color: #F8F8F8; padding-left: 10px; outline: none; border: none; margin-left: 5px"><span id="attribute-close_'+index_elemnt+'"  onclick="deleteThis('+index_elemnt+')" class="clean-text-suggestion" style="position: absolute; margin-left: -16px; background-color: #fff; color: red; font-size: 14px">&times;</span></div>'
            $(element).insertBefore(".bouton-ajout-caract")

            if (input_element.length == 6) {
                $(".bouton-ajout-caract").addClass('s-none')

                var tab_value = [];
                for (let i = 0; i < input_element.length; i++) {
                    tab_value.push(input_element[i].value)
                }
            }

        }


        function validerCaracteristique() {
            var input_container = document.getElementById('myInputCaracteristiqueContainer')
            var input_element = input_container.getElementsByTagName('input')
            var tab_value = [];
            var caracteristique_libelle = $('#caracteristique_libelle').val();
            var caracteristique_id = caracteristique_libelle.replace(/\s/g, '').toLowerCase();

            for (let i = 0; i < input_element.length; i++) {
                tab_value.push(input_element[i].value)
            }

            var element1 = []
            var caracteristique_select = document.getElementsByClassName('caracteristique-zone')

            element1.push(caracteristique_id)

            var existing_value = $('#tabcaracteristique').val()
            let tablCar = []

            if (existing_value.length != '') {
                tablCar = existing_value.split(',');
            }

            tablCar.push(caracteristique_id)
            $('#tabcaracteristique').val([tablCar])

            var new_caracteristique_id = $('#tabcaracteristique').val()

            // enregistrement des nouveau caracteristique
            $.ajax({
                method: 'POST',
                url: 'save_caracteristique_client',
                data: {caracteristique: tab_value, libelle: caracteristique_libelle},
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                success: function(response) {

                    caracteristique_supp.push(response)
                    $('#carateristiqueSuppAdded').val([caracteristique_supp])
                    console.log('Votre element:', response[0])
                    // debut du traitement retour
                    var select_element = []

                    var select_element_preview = []
                    select_element = "<div class='caracteristique-zone'><label class='labele-items' style='position: relative; left: 0px'><small class='red-star'>*</small>"+response[0]['libelle']+"</label><select class='caracterisqueProd' select-type='Supplementaire' data-select='"+caracteristique_libelle+"' name='"+caracteristique_libelle+"' id='"+caracteristique_id+"'>"

                    for (let i = 0; i < response[0]['boutique_produit_caracteristique'].length; i++) {
                        let selection_option = response[0]['boutique_produit_caracteristique'][i]['valeur']
                        tab_value.push(selection_option)
                        select_element += "<option value="+response[0]['boutique_produit_caracteristique'][i]['id']+">"+selection_option+"</option>"
                    }

                    select_element += "</select>"
                    select_element += "<div style='display: flex; margin-top: 5px'><span class='caracteristique-frequent-label'>Fréquent : </span><span class='caracteristique-frequent s-none'>iPhone 6s , iPhone 8 , iPhone X</span></div>"
                    select_element += "</div>"

                    select_element_preview = "<div class='caracteristique-zone-preview'><label class='labele-items' style='position: relative; left: 20px'><small class='red-star'>*</small>"+caracteristique_libelle+"</label><select class='caracterisqueProdPreview' data-select='"+caracteristique_libelle+"' name='"+caracteristique_libelle+"' id='"+caracteristique_id+"'>"

                    for (let i = 0; i < input_element.length; i++) {
                        select_element_preview += "<option>"+input_element[i].value+"</option>"
                    }

                    select_element_preview += "</select>"
                    select_element_preview += "</div>"

                    $(select_element).insertBefore('#btn-attr-product')  // chargement de la caracteristique

                    // $('.caracteristique_element').append(select_element)
                    $('.caracteristique-supplementaire').addClass('s-none')
                    $('.caracteristique-preview-element').append(select_element_preview)

                    // if (caracteristique_select.length > 3) {
                    //     $('#btn-attr-product').css('display', 'none')
                    //     $('.caracteristique-supplementaire').addClass('s-none')
                    // }

                },
                error: function(error) {
                    console.log('Erreur ajax')
                }
            })

        }

        function vendreMemeProduit(id) {

            $('#popupannonce-recheche').hide();
            $('#detailAnnonce').removeClass('none-detail-annonece')

            $.ajax({
                method: 'GET',
                url: 'vendre_meme_produit/'+id,
                data: {},
                headers: {},
                success: function(response){
                    // ----------------------- preview ---------------------
                    $('#titre-annonce').text(response[0]['libelle'])
                    $('#prix-appercu').text(response[0]['prix'])
                    $('#libelle-produit').val(response[0]['libelle'])
                    $('#description_produit').val(response[0]['description'])
                    $('#suivant-step1').removeAttr('disabled')
                    $('#suivant-step1').css('background-color', '#1A7EF5')
                    $('#save-all-image-button').addClass('saved')
                    $('#prix_achat').val(response[0]['prix'])
                    $('#quantite_produit_disponible').val(response[0]['quantite'])
                    $('#id_sous_cat').val(response[0]['sous_categorie_id'])
                    $('#vendre-meme-produit').val('true')
                    $('#produit-rayon').val(response[0]['id_rayon']).select()
                    // chargement images
                    $('#photo_0-view').attr('src', response[0]['image'])
                    $('#photo_0-view').attr('height', "100px")
                    $('#photo_0-view').attr('width', "100px")
                    $('#photo_0-view').css({'display':'block', 'height': '100px !important', 'width': '100px !important'});
                    $('#photo_0-view').css('border-radius','6px')
                    $('#photo_0-view').css('margin-right','-4px')

                    $('#photo_0-bclose').removeClass('s-none')
                    $('#photo_0-bclose').css({'position': 'absolute', 'margin-top': '-80px', 'margin-right':'-80px'})
                    $('#photo_0-b').css('display','none')

                    // position: absolute; margin-top: -80px; margin-right: -80;

                    $('.photo-button-section').addClass('s-none')
                    $('#main-image-preview').attr('src', +response[0]['image'])
                    $('#main-image-preview').css({'position': 'relative', 'border-radius': '6px'})
                    // $('#main-image-preview').css('top', '12px')
                    $('#main-image-preview').attr('height', "308px")
                    $('#main-image-preview').attr('width', "308px")
                    $('#main-image-preview1').addClass('s-none')
                    $('#main-image-preview').removeClass('s-none')

                    $('#photo_0-preview').attr('src', response[0]['image'])


                    for (let j = 0; j < response[0]['produit_images'].length; j++) {
                        var img_index = j+1
                        $('#photo_'+img_index+'-view').attr('src', response[0]['produit_images'][j]['image'])
                        $('#photo_'+img_index+'-view').attr('height', "100px")
                        $('#photo_'+img_index+'-view').attr('width', "100px")
                        $('#photo_'+img_index+'-view').css({'display':'block', 'height': '100px !important', 'width': '100px !important'});
                        $('#photo_'+img_index+'-view').css('border-radius','6px')
                        $('#photo_'+img_index+'-view').css('margin-right','-4px')

                        $('#photo_'+img_index+'-bclose').removeClass('s-none')
                        $('#photo_'+img_index+'-bclose').css({'position': 'absolute', 'margin-top': '-80px', 'margin-right':'-80px'})
                        $('#photo_'+img_index+'-b').css('display','none')

                        // ------------------------ preview  ----------------------------------------
                        $('#photo_'+img_index+'-preview').attr('src', response[0]['produit_images'][j]['image'])

                    }

                    liClicked(response[0]['id_rayon'])
                }

            })

        }


        function closeInputUrl(id) {
            var url1 = id.split("_").pop();
            var url2 = url1.split('-url')
            $('#photo_'+url2[0]+'-url-value').val("");
            $('#'+id+'-button').removeClass('s-none')
            $('#photo_'+url2[0]+'-url-div').find('p').css('margin-top', '5px')
            $('#'+id+'-div').addClass('s-none')

        }

        function getTaille() {

        }

        function rechercheProduit() {
            var rechereVal = $('#libelle-produit').val();
            if (rechereVal.length == 0) {
                // $('.ul-search').css('display','none')
            }else{
                $.ajax({
                type: "POST",
                url: "recherche_sous_categorie",
                data: {'valeurR': rechereVal},
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                success: function(response) {
                    $('.ul-search').css('display','block')
                    $('.ul-search').empty()
                    // cas de resultat vide
                    if (response.length == 0) {
                        $('.ul-search').append('<span style="position: relative; left: 120px; top: 30px">Aucun Résultat trouvé</span>')
                    }else {

                        for (let index = 0; index < response.length; index++) {
                        var li = '<li data-id="'+response[index].libelle+'" id="'+response[index].id+'" onclick="liClicked('+response[index].id+')">'+response[index].libelle+'</li>'
                        console.log(li)
                        $('.ul-search').append(li)
                    }
                    }
                }
            })
            }
        }

        function activeValidateButton() {
            var nom_caracteristique = $('#caracteristique_libelle').val()
            var attribute_1 = $('#attribute_1').val();
            if (attribute_1.length == 0) {
                $('#validateNomCaracteristique').css('background-color', '#D8D8D8')
                $('#validateNomCaracteristique').attr('disabled', 'disabled')
            }else{
                $('#validateNomCaracteristique').css('background-color', '#00B517')
                $('#validateNomCaracteristique').removeAttr('disabled')
            }
        }


        function setSelect() {
            var desiredOption = $("#selectVal").val();
            if (desiredOption == '') {
                $("#selectVal").focus();
                return false;
            }
            var hasOption = $('#mySelect option[value="' + desiredOption + '"]');
            if (hasOption.length == 0) {
                alert('No such option');
            } else {
                $('#mySelect').val(desiredOption);
            }
            $("#selectVal").select();
        }

function getAllSousCategorieProduct(id) {
    let data_id = $('#prod_'+id).attr('data-id')
    let data_sous_cat = $('#prod_'+id).attr('data-categorie');
    $('#searchProduitBar').val(data_id)
    $('#idsouscategorieSearch').val(data_sous_cat)
    $('.ul-search').append('<span style="position: relative; left: 120px; top: 30px">Aucun Résultat trouvé</span>')
    $('.ul-search').empty()
    $('.resultat-element').empty();
    $('.results-header-visible').addClass('s-none');
    $('.no-results-header').removeClass('s-none')

    $.ajax({
    method: 'GET',
    url: 'produit_sous_categorie_rayon/'+id,
    data: {},
    headers: {},
    success: function(response) {

    // var rayonSelectVal = 6
    if (response['infos_categorie'].length > 0) {

    var universSelectedVal = response['infos_categorie'][0]['univer_id']
    var rayonSelectVal = response['infos_categorie'][0]['id']
    var categorie_id = response['infos_categorie'][0]['id_famille'];

    $('#rayon_id').val(response['infos_categorie'][0]['id'])
    var hasUniverOption = $('#univer-boutique option[value=" '+universSelectedVal+' "]')
    var hasRayonOption = $('#produit-rayon option[value="' +rayonSelectVal+ '"]') //check if rayon existe
    if (hasRayonOption.length > 0) {
    $('#rayon-section-label').text(response['infos_categorie'][0]['libelle'])
    $('#univer-boutique').val(universSelectedVal).select();
    $('#produit-rayon').val(rayonSelectVal).select() // chargement des rayons automatique

    // recuperation des categorie par rayon trouvé
    var familles = response['rayon_familles'][0]['familles']
    $('#produit-famille').empty()

    var famille_option = []

    for (let u = 0; u < familles.length; u++) {
        famille_option += '<option value = '+familles[u]['id']+'>'+familles[u]['libelle']+'</option>';
    }

    famille_option += '<option value="autre_famille">Autre catégorie</option>'
    $('#produit-famille').append(famille_option);
    $('#produit-famille').val(categorie_id).select() //remplissage de la catégoris
    setFamilleSousCatSize(categorie_id)

    $('.produit-associer-section').empty();
    for (let j = 0; j < response['article_associe'].length; j++) {

    let rayon_produit_associer = '<a title="'+response['article_associe'][j]['libelle']+'"><img src="storage/images/rayons/'+response['article_associe'][j]['logo']+'" alt="B"></a>'
        $('.produit-associer-section').append(rayon_produit_associer)
    }

    }
    }else{
        console.log('ya rien ici')
        $('#rayon-section-label').removeClass('s-none')

    }

        }
    })

}

        function searchProductBySousCategoris(id) {
            $('.suggestion-search-btn').addClass('suggestion-search-btn-focus')
            let id_sous_categorie = $('#idsouscategorieSearch').val();

            let libelleSearch = $('#searchProduitBar').val();

            console.log('Voici le libelle: ', libelleSearch)

            if (libelleSearch !== '') {
                if (id_sous_categorie != '') {
                    let data_suggestion = {
                        id_categorie: id_sous_categorie,
                        libelle: libelleSearch,
                    }
                $.ajax({
                type: "POST",
                url: "sous_categorie_product",
                data: data_suggestion,
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                success: function(response) {

                    $('#search-product-result11').empty()
                    if (response.length > 0) {

                        $('#result-sous-categorie-section').hide()
                        $('.produit-search-container').removeClass('s-none')
                        $('#resultat_vide').remove();

                        for (let i = 0; i < response.length; i++) {
                            let card = '<article style="  height: 203px;width: 408px;border: 1px solid #D8D8D8; border-radius: 6px; margin-bottom: 10px; ">'

                            card += '<aside style="height: 183px;width: 183px; background-color:#f5f5f5;margin-left:10px;margin-top:10px; display: flex; align-items: center">'

                            if (response[i]['id'] == 4 || response[i]['id'] == 5 || response[i]['id'] == 6) {
                                card +='<img class="imagessearch" src="storage/images/produits/'+response[i]['image']+'" width: "183px" heigh="183px">'
                            }else {
                                card +='<img class="imagessearch" src="'+response[i]['image']+'" width: "183px" heigh="183px">'
                            }

                            card += '</aside><div style="box-sizing: border-box;height: 183px;width: 1px;border: 1px solid #f5f5f5; position: relative; top: -184px; left:200px"></div> <div style="height: 183px;width: 183px; margin-left:210px;margin-top:-367px;"><div style="height: 150px; width: 100%; background-color: #fff; position: relative"><p style="  color: #191970;font-family: Roboto;font-size: 12px;font-weight: 500;letter-spacing: -0.08px;line-height: 13px;text-align:left;">'+response[i]['libelle']+'</p>' ;

                            card += '<p style="  color: #191970;font-family: Roboto;font-size: 12px;font-weight: 500;letter-spacing: 0;line-height: 11px;margin-left:10px; display: flex; flex-direction: column; row-gap: 10px">'
                            let id_preoduit_vredre = response[i]['id'];

                            $.ajax({
                                type: 'GET',
                                url: 'caracteristiqueByProduct/'+response[i]['id'],
                                data: {},
                                headers: {

                                },
                                success: function(response) {
                                    console.log('Attribute places is here:', response)

                                    for (let j = 0; j < response.length; j++) {
                                        card += '<span style="position: relative; left: -10px"><span style="font-family:Roboto; font-weight: 300;">'+response[j]['lib_caract']+'</span> : <span style="font-family: Roboto; font-weight: 500">'+response[j]['lib_valeur']+'</span></span>'
                                    }

                                    card += '</p> </div><div style="height:40px; width: 100%; position: relative; top: -35px">'
                                    card += '<hr style="width:185px;height:2px; background-color:#9B9B9B; position: relative; top: 5px; "><button class="vendre-meme-article" type="submit" style="" onClick="vendreMemeProduit('+id_preoduit_vredre+')">Vendre le même article</button></div></div></article>'

                                    $('#search-product-result11').append(card)

                                }
                            })
                        }

                    }else {
                        var msg_retour = "<p id='resultat_vide' style='text-align: center; position: relative; top: 50px'>Aucun resultat trouvé veillez clicker sur le bouton créer une annonce</p>"
                        $('#result-sous-categorie-section').hide()
                        $('.produit-search-container').removeClass('s-none')
                        $('.produit-search-container').append(msg_retour)
                    }

                    $('.suggestion-search-btn').removeClass('suggestion-search-btn-focus')
                }
            })
            }else{
                if ($('#search-product-result11').empty()) {
                    $('#search-product-result11').append('<span style="text-align:center; position: absolute;  margin-left:210px; margin-top:130px; color: #4A4A4A; line-height: 16px;" >Votre produit est unique, alors ne vous arretez pas là.<br> Créer le premier article de cette catégorie.</span>')
                }
                $('#result-sous-categorie-section').hide()
                $('.produit-search-container').removeClass('s-none')
                $('#resultat_vide').remove();
            }
            }else{

            }
        }
        function getGeopoint() {
            var request = new XMLHttpRequest();

            request.open('POST', 'https://api.tookanapp.com/v2/find_region_from_points');

            request.setRequestHeader('Content-Type', 'application/json');

            request.onreadystatechange = function () {
            if (this.readyState === 4) {
                console.log('Status:', this.status);
                console.log('Headers:', this.getAllResponseHeaders());
                console.log('Body:', this.responseText);
            }
            };

            var body = {
            'api_key': '53676787f0400a0345537662554778471ae3c1f32eda7b3f581d01c0',
            'points': [
            {
                'latitude': '30.7133899',
                'longitude': '76.7950984'
            }
            ]
            };
            request.send(JSON.stringify(body));
        }

        function showPosition(position) {
            console.log('Updated data here', position.coords.latitude, 'Et', position.coords.longitude)
            getCustomer(position.coords.latitude, position.coords.longitude)
        }

        function getUserLocationInfo() {
        window.open("http://127.0.0.1:8000/proceed_with_tookan", "_blank", "toolbar=yes,scrollbars=yes,resizable=yes,top=500,left=500,width=400,height=400");
            var x = document.getElementById('demo')

            if (navigator.geolocation) {
                navigator.geolocation.getCurrentPosition(showPosition);
                // console.log('Voici les data de la géolocalisation:', geolocation)
            }else {
                // console.log('Geolocation is not supported by this browser.')
            }
    }

    function createClient(latitude, longitude) {
        var request = new XMLHttpRequest();

        request.open('POST', 'https://api.tookanapp.com/v2/customer/add');

        request.setRequestHeader('Content-Type', 'application/json');

        request.onreadystatechange = function () {
        if (this.readyState === 4) {
            console.log('Status:', this.status);
            console.log('Headers:', this.getAllResponseHeaders());
            console.log('Body:', this.responseText);
        }
        };

        var body = {
        'api_key': '53676787f0400a0345537662554778471ae3c1f32eda7b3f581d01c0',
        'user_type': 0,
        'name': 'Benj Toule Market',
        'phone': '+24174846167',
        'email': 'chrismedmadzou047@gmail.com',
        'address': 'Alibandengue',
        'latitude': latitude,
        'longitude': longitude
        };

        request.send(JSON.stringify(body));
    }

    function getCustomer(latitude, logitude) {

        var request = new XMLHttpRequest();

        // var latitude = 52.157831
        // var logitude = 5.223776
        // https://api.tomtom.com/search/2/reverseGeocode/crossStreet
        // request.open('GET', 'https://api.tomtom.com/search/2/reverseGeocode/'+latitude+','+logitude+'.json?key=TEGMuUQLN5NwmSO2VocfXmAS1uMDLGUv&radius=100');

        request.open('GET', 'https://api.tomtom.com/search/2/reverseGeocode/crossStreet/'+latitude+','+logitude+'.json?key=TEGMuUQLN5NwmSO2VocfXmAS1uMDLGUv&radius=100');

        request.setRequestHeader('Content-Type', 'application/json');

        request.onreadystatechange = function () {
        if (this.readyState === 4) {
            var json_object = JSON.parse(this.response)
            console.log(json_object.addresses[0])
            $('#address-quartier-user-invite').val(json_object.addresses[0].address.street)
        }
        };

        // var body = {
        // 'api_key': 'eaac56717958fa6664a9c5a0a29a43810a0fcda90be26a3e023b2f70f9ffa05',
        // 'customer_username': 'Benj Toule Market',
        // 'customer_phone': '99895545',
        // 'is_pagination': 1,
        // 'requested_page': 1,
        // 'vendor_id': 1
        // };

        request.send();

    }

    function geocodeWithGoogleMap() {

        // var location = '22 Main st Boston MA';
        // axios.get('https://maps.googleapis.com/maps/api/geocode/json', {
        //     params:{
        //         address: location,
        //         key: 'AIzaSyBO59mo6rMe4ChzmBqZQ8gz9QmWjg_X3c'
        //     }
        // }).then(function(response){
        //     console.log(response)
        // })
        var APIKEY = "Vn26cA8knt2E8sl0WBEvAgWGRUf59mm";
        var CHICAGO = { lat: 41.96484337634848, lng: -87.65514197953675}
        var ALBUQUERQUE = [-106.459201, 35.062859];

        var saveLocation = Cookies.get('lastlocation');

        if (saveLocation) {
            console.log('='+saveLocation);
        }

    }

// modifier les rayons par default
function modifierRayon(){

    let active_rayon = $('#activeRayonVal').val();

    if (active_rayon === "") {
        console.log('Aucun rayon n est activer clicker sur un rayon svp')
    }else {

    $.ajax({
    type: 'POST',
    url: 'set_default_rayon',
    data: {active_rayon: active_rayon},
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    },
    beforeSend: function() {

    },
    success: function(response) {

    const chunk = (arr, size) =>

    Array.from({ length: Math.ceil(arr.length / size) }, (v, i) =>
        arr.slice(i * size, i * size + size)
    );

    let tableau_rayon = chunk(response, 6)

    $('.swiper-wrapper').empty();
    var swiper = [];
    swiper = '<div class= "main-rayon-items swiper-slide">'
    for (let r = 0; r < tableau_rayon.length; r++) {
    var swiper = [];

    swiper = '<div class= "main-rayon-items swiper-slide">'

    for(let y = 0; y < tableau_rayon[r].length; y++) {
    if (tableau_rayon[r][y]['status_rayon'] == 1) {

    let id = tableau_rayon[r][y]['id']
    swiper += '<div id="bouton-rayon'+tableau_rayon[r][y].id+'" style="white-space: nowrap;overflow: hidden;" class="mesb rayon-marchand-dynamique rayon-hover" onclick="changeBackImage('+tableau_rayon[r][y].id+')"><a style="font-weight: 500;text-decoration:none; color: #fff" class="rayon-link-item" id="link'+tableau_rayon[r][y].id+'" href="#">'+tableau_rayon[r][y]["libelle"]+'</a></div>'

    }else{

    let id = tableau_rayon[r][y]['id']
    swiper += '<div id="bouton-rayon'+tableau_rayon[r][y].id+'" style="white-space: nowrap;overflow: hidden;" class="mesb rayon-marchand-dynamique" onclick="changeBackImage('+tableau_rayon[r][y].id+')"><a style="font-weight: 500;text-decoration:none;" class="rayon-link-item" id="link'+tableau_rayon[r][y].id+'" href="#">'+tableau_rayon[r][y]["libelle"]+'</a></div>'

        }
    }

    swiper += '</div>'
    $('.swiper-wrapper').append(swiper);

    $('.default-setted').removeClass('valide-none')
    $('.rayon-actif-content').addClass('valide-none')

    }

    },
    complete: function(){
    setTimeout(function(){
        $('.default-setted').addClass('valide-none')
        $('.rayon-actif-content').removeClass('valide-none')
        $('#supbtk').addClass('desable-default-rayon');
    }, 1000)
        },
        })
        }
    }

    // affiche la corbeil
    function showCorbeille() {

        $.ajax({
        method: 'GET',
        url: 'produits_corbeille',
        data: {},
        headers: {},
        success: function(response) {
        $('#corbeille-data-table').empty();

        for (let i = 0; i < response.length; i++) {

        let tr_element = new Array();
        tr_element = ' <tr id="basket_row'+response[i]['id']+'">'
        tr_element += '<td class="col-element1" style="padding: 0px !important; width: 654px !important;">'
        tr_element += '<img style=" border: 1px solid #9B9B9B; border-radius:6px;width: 40px;height: 40px; margin-left: 30px; margin-top: 5.5px" src="/'+response[i]['image']+'" alt="" />'
        tr_element += '<span>'+response[i]['libelle']+'</span>'
        tr_element += '</td>'

        tr_element += '<td class="col-element2d" style="width: 338px !important;">'+response[i]['r_lib']+'</td>'

        tr_element += '<td class="col-element3tt" style="width: 211.5px !important; boder-left: 1px solid #ccc !important">'

        tr_element +='<span style="color: #D0021B;font-family: Roboto;font-size: 20px;font-weight: 500;letter-spacing: 0;line-height: 22px;text-align: left;">'+response[i]['date_mise_en_corbeille']+'J</span><span style="  color: #D0021B;font-family: Roboto;font-size: 10px;font-weight: 500;letter-spacing: 0;line-height: 11px;text-align: left;">restant</span>'

        tr_element += '<span onClick="resetFromBasket('+response[i]['id']+')" style="border-radius:50%; width:35px;height:35px;padding:5px; position: relative; left: 50px;"id="turn"><img src="assets/images/icones-vendeurs2/Group 5 Copy 13.svg" width="26px" height="26px"></span>'

        tr_element += '<article onClick="removeFromBasket('+response[i]['id']+','+response[i]['corbeille_id']+')" style="border-radius:50%;margin-top:-30px;position: relative; left: 100px;width:35px;height:35px;padding:5px;"id="corb"><img src="assets/images/icones-vendeurs2/Group 5 Copy 12.svg" width="26px" height="26px" id="corb"></article>'
        tr_element += '</td></tr>';

        $('#corbeille-data-table').append(tr_element)

        }
        }
        })
        $("#articleCorbeille").modal("show")
        }

        function calculEtagereBox() {

            var tm_main_carousel = document.getElementsByClassName('custom-carousel-page')
            var tm_main_carousel_size = document.getElementById('tm-main-slide-carousel').offsetWidth;
            var tm_main_array_carousel = [];

            var main_carousel_level1 = $('#tm-main-slide-carousel').find('.custom-carousel-page')

            var main_carousel_level1_array = [];

            main_carousel_level1.each((element_index, htmlEl) => {

            var element_level_1 = $(htmlEl).find('.row_div')
            var element_level_1_array = [];

            // ----------------------- ok ----------------------------
            $(element_level_1).each((element1, htmlEl1) => {
                // console.log('La taille de la ligne est:', htmlEl1.offsetWidth)

                var element_level_2 = $(htmlEl1).find('.slide') // chaque case de la ligne
                var ligne_compteur = 0;
                $(element_level_2).each((element2, htmlEl2) => {
                    var slide_has_product = $(htmlEl2).find('.image-prod')
                    if (slide_has_product[0] != undefined) {
                        // console.log('Level 2 div', slide_has_product[0].offsetWidth)
                        // console.log('The searched attribute ', $(htmlEl2).attr('data-index'))
                        ligne_compteur += slide_has_product[0].offsetWidth;
                    }
                })

                if (ligne_compteur < 838) {

                let tab_attribute = [];
                let tab_current_indexes = [];
                var index_slide2 = []

                $(element_level_2).each((element2, htmlEl2) => {
                    index_slide2.push($(htmlEl2).attr('data-index'))
                    var slide_has_product = $(htmlEl2).find('.image-prod')

                    if (slide_has_product[0] != undefined) {
                        tab_attribute.push($(htmlEl2).attr('data-index'))
                        tab_current_indexes.push(element2)
                    }

                })

                var reste_sur_etagere = 838 - ligne_compteur
                var tab_attribute_size = tab_attribute.length
                var last_tab_attribute_value = index_slide2.length - 1

                var last_index2 = tab_attribute[tab_attribute.length -1];

                if (reste_sur_etagere > 170) {
                    var case_to_complete = reste_sur_etagere / 170
                    case_to_complete = Math.round(case_to_complete)

                for (let h = 1; h <= case_to_complete; h++) {
                    //  start adding some case here
                    var index_case = Number(last_index2) + h
                    let bouton_ajout = '<button onclick="testCurentCase('+element_index+', '+element1+', '+index_case+')" class="add-product-button-etagere not-active-product-btn" button-index="1" style="position: absolute;" onclick="showAddProduct()"><span class="add-product-icon">+</span></button>'

                    // '#addSlide'+element_index+'-'+element1+'-'+tab_attribute[v]

                    var div_supplementaire = $('<div id="addSlide'+element_index+'-'+element1+'-'+index_case+'" class="slide class-default-added-btn" data-index = "'+index_case+'"></div>')
                    $(div_supplementaire).bind('mouseenter', processMouseEnter)
                    $(div_supplementaire).bind('mouseleave', processMouseLeave)

                    div_supplementaire.append(bouton_ajout)
                    $(htmlEl1).append(div_supplementaire)

                }

            }

            console.log('Le tout dernier index ici: ', tab_attribute[tab_attribute.length -1])

            for (let v = 0; v < tab_attribute.length; v++) {

                var x = Number(tab_attribute[v]) + 1;
                var y = tab_attribute[v+1]

                console.log('Dernièr index:', tab_attribute[v])
                // console.log('Les valeurs sont:', 'x=>',x,'y=>', y)
                var interval_index = Number(y) - Number(x);

            if (interval_index >= 1) {
                var val_init = Number(x) - 1;
                var borne_supp = Number(y)
                // console.log('Il existe un ecart à cet endroit de', interval_index, 'Et la borne inferieur est:', val_init)

                for (let k = Number(val_init)+1; k < borne_supp; k++) {
                    // var index_case2 = k - 1;
                    let bouton_ajout = '<button onclick="testCurentCase('+element_index+','+element1+','+k+')" class="add-product-button-etagere not-active-product-btn" button-index="1" style="position: absolute;" onclick="showAddProduct()"><span class="add-product-icon">+</span></button>'

                    var div_supplementaire = $('<div id="addSlide'+element_index+'-'+element1+'-'+k+'" data-index = "'+k+'" class="slide class-default-added-btn"></div>')
                    $(div_supplementaire).bind('mouseenter', processMouseEnter)
                    $(div_supplementaire).bind('mouseleave', processMouseLeave)
                    div_supplementaire.append(bouton_ajout)
                    var val_suivant = k;

                    div_supplementaire.insertAfter('#addSlide'+element_index+'-'+element1+'-'+tab_attribute[v])
                    // console.log('La valeur du milieu est:', val_suivant)
                }

            }

                            // console.log('L interval est bien:', interval_index)
                        }

                        tab_attribute
                    }

                })

            })

                // console.log("Taille total:", ligne_compteur)

                console.log('La taille de ce main est:', main_carousel_level1.length)
            }

            function get_marchand_commandes() {
                $.ajax({
                type: 'GET',
                url: '/get_all_marchand_command',
                data: {},
                success: function(response) {
            
                console.log('All commande here:', response)
            
                $('#tab-marchand-commande').empty()
            
                if (response.length > 0) {
            
                $('.pas-de-commande-marchand').addClass('field-none')
            
                var tab_marchand_commande = [];
            
                for (let c = 0; c < response.length; c++) {
            
                var mode_pay;
            
                if (response[c].mode_payement == 'AirtelMoney') {
                    mode_pay = '/assets/images/icons/AirtelMoney.svg'
                }else if (response[c].mode_payement == 'MoovMoney') {
                    mode_pay = '/assets/images/icones-vendeurs2/Moovmoney.svg'
                }
            
                tab_marchand_commande += '<tr class="marchand-line-commande-hover" onclick=showMarchandCommandDetails("'+response[c].id+'","'+response[c].ref_commande+'") id="commande-line-'+response[c].id+'">'
            
                tab_marchand_commande += '<td>'+response[c].ref_commande+'</td>'
            
                var commande_produits = response[c].commande_produit
            
                if (commande_produits.length == 1) {
            
                tab_marchand_commande += '<td><div>'
                tab_marchand_commande += '<div class="boxcontenu2" style="background-color: #fff; border: none"><img src="/'+commande_produits[0].image+'" style="max-height:45px"></div>'
                tab_marchand_commande += '<p class="contenu2" style="margin-bottom: 0px !important" >'+commande_produits[0].libelle+'</p>'
                tab_marchand_commande += '</div></td>'
            
                }else {
            
                tab_marchand_commande += '<td><div style="display: flex; align-items: center; justify-content: center;">'
                tab_marchand_commande += '<div class="boxcontenu2" style="background-color: #fff; border: none;"><img src="'+commande_produits[0].image+'" /></div>'
            
                var left_val = 0;
                for (let pc = 1; pc < commande_produits.length; pc++) {
                    left_val += 10;
                    tab_marchand_commande += '<div class="boxcontenu2" style="background-color: #fff; border: none; position:relative; left: -'+left_val+'px; margin-left: 0px"><img src="'+commande_produits[pc].image+'" style="max-height:45px" /></div>'
                }
            
                tab_marchand_commande += '</div></td>'
            
                }
            
                tab_marchand_commande += '<td style=" width: 278px;"><div>'
                tab_marchand_commande += '<p class="contenu3a">'+response[c].nom+ ' '+response[c].prenom+'</p>'
                tab_marchand_commande += '<p class="contenu3b" style="margin-bottom: 0px !important">'+response[c].email+'</p>'
                tab_marchand_commande += '</div></td>'
            
                tab_marchand_commande += '<td style="width:72px">'+response[c].nombre_article+'</td>'
            
                tab_marchand_commande += '<td>'+response[c].totaf_facturation+' Fcfa</td>'
            
                tab_marchand_commande += '<td style="width:77px"><div>'
                tab_marchand_commande += '<img src="'+mode_pay+'">'
                tab_marchand_commande += '</div></td>'
            
                if (response[c].status_code_commande == 0) {
                    tab_marchand_commande += '<td id="status_de_la_commande'+response[c].ref_commande+'" style="color: green">'+response[c].status_commande+'</td>'
                }else if(response[c].status_code_commande == 1) {
                    tab_marchand_commande += '<td id="status_de_la_commande'+response[c].ref_commande+'" style="color: red">'+response[c].status_commande+'</td>'
                }else if(response[c].status_code_commande == 2) {
                    tab_marchand_commande += '<td id="status_de_la_commande'+response[c].ref_commande+'" style="color: orange">'+response[c].status_commande+'</td>'
                }
            
            
                tab_marchand_commande+= '<td>'+response[c].date_commande+'</td>'
            
                tab_marchand_commande += '</tr>'
            
                }
            
                $('#tab-marchand-commande').append(tab_marchand_commande)
            
                }else {
                    $('.pas-de-commande-marchand').removeClass('field-none')
                }
                    console.log('All Marchand order here', response)
                }
            
                })
            }





