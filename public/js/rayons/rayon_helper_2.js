function getURLParameter(name) {
    return decodeURIComponent((new RegExp('[?|&]' + name + '=' + '([^&;]+?)(&|#|;|$)').exec(location.search) || [null, ''])[1].replace(/\+/g, '%20')) || null;
}

// Reservé à certain variable
function searchProductResult(id_produit) {
    $.ajax({
    type: 'GET',
    url: '/get_searched_product_cat/'+id_produit,
    data: {},
    success: function(response) {

    const chunk = (arr, size) =>

    Array.from({ length: Math.ceil(arr.length / size) }, (v, i) =>
        arr.slice(i * size, i * size + size)
    );

    var new_array = response.famille_produit
    console.log('Retour recherche =>', new_array.flat(1))
    var final_data = new_array.flat(1)

    if (response.rayon_id == 27) {
    $('#rayon-produit-section-'+response.rayon_id).empty()
    let tableau_slides = chunk(final_data, 40)
    var etagere_slides = [];
    tableau_slides.forEach((element, index) => {

    etagere_slides += '<div class="custom-carousel-page-user" style="position: relative; top: -45px; " id="slide-p-user'+index+'" data-index = "'+index+'" >'

    var line_slide = chunk(element, 8)

    line_slide.forEach((div_row, div_index) => {
    etagere_slides += '<div class="row_div-user-telephonie" >'
    div_row.forEach((slide_el, index) => {

    var phone_height = 0;
    if (slide_el.taille_sur_etagere == 43) {
        phone_height = 58;
    }else if(slide_el.taille_sur_etagere == 50) {
        phone_height = 68;
    }else if (slide_el.taille_sur_etagere == 57) {
        phone_height = 78;
    }else {
        phone_height = 43;
    }

    etagere_slides += '<div id="addSlide-user'+slide_el.id+'" onclick="showClickEffect('+slide_el.id+')" class="slide case-produit-btnd" onmouseover="showEffect('+slide_el.id+')" style="height: '+phone_height+'px !important;" onmouseleave="showEffectRemove('+slide_el.id+')">'
    etagere_slides += '<img id="image-prod-id'+slide_el.id+'" onclick="showRecapProduitMarchandTV('+slide_el.id+')" class="image-prod" src= "/'+slide_el.image+'" width="'+slide_el.taille_sur_etagere+'px">'

    etagere_slides += '<span id="effect-layer'+slide_el.id+'" class="product-effect-layer effect-none" style="font-size: 12px; position: absolute; width: '+slide_el.taille_sur_etagere+'px; color: #fff;"><span class="cap-cover">'+slide_el.capacite+'</span></span>'

    etagere_slides += '</span>'
    etagere_slides += '</div>'

    })
    etagere_slides += '</div>'

    })

    etagere_slides += '</div>'

    })

    console.log('data ready to display', etagere_slides)

    $('#rayon-produit-section-'+response.rayon_id).append(etagere_slides)
    $('#image-prod-id'+searched_product_id).addClass('produit-show-effect')

 } else if(response.rayon_id == 25) {
    let tableau_slides = chunk(final_data, 12)
    var etagere_slides = [];
    tableau_slides.forEach((element, index) => {

    etagere_slides += '<div class="custom-carousel-page-user" id="slide-p-user'+index+'" data-index = "'+index+'" >'

    var line_slide = chunk(element, 4)

    line_slide.forEach((div_row, div_index) => {
    etagere_slides += '<div class="row_div-user" >'
    div_row.forEach((slide_el, index) => {

    etagere_slides += '<div id="addSlide-user'+slide_el.id+'" onclick="showClickEffect('+slide_el.id+')" class="slide case-produit-btnd" onmouseover="showEffect('+slide_el.id+')" style="height: 155px !important;" onmouseleave="showEffectRemove('+slide_el.id+')">'
    etagere_slides += '<img id="image-prod-id'+slide_el.id+'" onclick="showRecapProduitMarchandTV('+slide_el.id+')" class="image-prod" src= "/'+slide_el.image+'" width="'+slide_el.taille_sur_etagere+'px">'
    etagere_slides += '<span id="effect-layer'+slide_el.id+'" class="product-effect-layer effect-none" style="font-size: 12px; position: absolute; width: '+slide_el.taille_sur_etagere+'px; "><span class="cap-cover"></span>'

        etagere_slides += '</span>'
        etagere_slides += '</div>'

    })
        etagere_slides += '</div>'
    })

    etagere_slides += '</div>'

    })

    $('#rayon-produit-section-'+response.rayon_id).append(etagere_slides)
    $('#image-prod-id'+searched_product_id).addClass('produit-show-effect')

 }else if (response.rayon_id == 26) {
    $('#rayon-produit-section-'+response.rayon_id).empty()
    let tableau_slides = chunk(final_data, 40)
    var etagere_slides = [];
    tableau_slides.forEach((element, index) => {

    etagere_slides += '<div class="custom-carousel-page-user" style="position: relative; top: -45px; " id="slide-p-user'+index+'" data-index = "'+index+'" >'

    var line_slide = chunk(element, 8)

    line_slide.forEach((div_row, div_index) => {
    etagere_slides += '<div class="row_div-user-telephonie" >'
    div_row.forEach((slide_el, index) => {

    var phone_height = 0;
    if (slide_el.taille_sur_etagere == 43) {
        phone_height = 58;
    }else if(slide_el.taille_sur_etagere == 50) {
        phone_height = 68;
    }else if (slide_el.taille_sur_etagere == 57) {
        phone_height = 78;
    }else {
        phone_height = 43;
    }

    etagere_slides += '<div id="addSlide-user'+slide_el.id+'" onclick="showClickEffect('+slide_el.id+')" class="slide case-produit-btnd" onmouseover="showEffect('+slide_el.id+')" style="height: '+phone_height+'px !important;" onmouseleave="showEffectRemove('+slide_el.id+')">'
    etagere_slides += '<img id="image-prod-id'+slide_el.id+'" onclick="showRecapProduitMarchandTV('+slide_el.id+')" class="image-prod-5-ligne" src= "/'+slide_el.image+'" width="'+slide_el.taille_sur_etagere+'px">'

    etagere_slides += '<span id="effect-layer'+slide_el.id+'" class="product-effect-layer effect-none" style="font-size: 12px; position: absolute; width: '+slide_el.taille_sur_etagere+'px; color: #fff;"><span class="cap-cover"></span></span>'

    etagere_slides += '</span>'
    etagere_slides += '</div>'

    })
    etagere_slides += '</div>'

    })

    etagere_slides += '</div>'

    })

    console.log('data ready to display', etagere_slides)

    $('#rayon-produit-section-'+response.rayon_id).append(etagere_slides)
    $('#image-prod-id'+searched_product_id).addClass('produit-show-effect')
 }

        }
    })
}

function getId(id){

    $('#modification').hide()
    $('#Ajouter_new').show()
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

    method: 'GET',
    url: '/show_detail_produit/'+id,
    data: {},
    headers: {},
    success: function(response){

    console.log('response is:', response)
    $('.article-title').text(response['Detail_Produit'][0][0]['libelle'])
    $('#prix_total').text(response['Detail_Produit'][0][0]['prix']+'Fcfa')
    $('#current_price').val(response['Detail_Produit'][0][0]['prix'])
    $('#description_marchand_zone1').text(response['Detail_Produit'][0][0]['description'])
    $('#image_principal').attr('src', '/storage/images/produits/'+response['Detail_Produit'][0][0]['image'])
    $('#image_principal1').attr('src', '/storage/images/produits/'+response['Detail_Produit'][0][0]['image'])
    $("#quantite").val(1)

    // click de l'image principal
    $('#image_principal1').bind('click', function(v) {
        showImagePrevievClient('storage/images/produits/'+response['Detail_Produit'][0][0]['image'], 0)
    })

    // chargement de l'instance produit
    product_instance = response;

    $('.gros-cadre-user').addClass('set-white-color')
    // $('#quantite_marchand').val(response['Detail_Produit'][0][0]['quantite'])
    $('#reference_produit_client').text(response['Detail_Produit'][0][0]['ref_produit']);

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

    if (response['Detail_Produit'][1].length > 0) {
        $('#produit-univer-user').text(response['Detail_Produit'][1][0]['libelle'])
    }

    let a_index = 0;
    for (let caracteristique_item in response['Detail_Produit'][14] ) {
        $('#carac_produit'+a_index).empty()
        $('#carac_produit'+a_index).append('<option>'+response['Detail_Produit'][14][caracteristique_item]+'</option>')
        $('#carac_produit-Label'+a_index).text(caracteristique_item)
        a_index++
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

    // $('.gros-cadre').addClass('set-white-bg')
    for (i = 1; i < 6; ++i) {
        $('#image_autre'+i).hide()
    }

// for (let v = 0; v < response['Detail_Produit'][5].length; v++) {
    for (i = 0; i < response['Detail_Produit'][5].length; ++i) {
    let incr_index = i + 1;
    $('#image_autre'+incr_index).attr('src', '/storage/images/produits/'+response['Detail_Produit'][5][i]["image"])
    let img_element = 'storage/images/produits/'+response['Detail_Produit'][5][i]["image"]
    $('#image_autre'+incr_index).bind('click', function(v) {
        showImagePrevievClient(img_element, incr_index)
    })
    let index_increment = i + 1;
    $(init_peti_cadre[index_increment]).removeClass('set-gray-bg')
    $(init_peti_cadre[index_increment]).addClass('set-white-bg')
    $('#image_autre'+incr_index).show()
    }
    }

 })

// $('#recapProduitMarchand').modal('show')
    $('#myModal').modal('show')

}

function voir_profile() {
    $('#userProfilModal').modal('show')
}

// preview image for client
function showImagePrevievClient(image, index_div) {

    $('#tm_active_image_to_share').val(image) // image active
    $('#marchand_video_preview_big_client').attr('src', " ") //Fermer la video si en lecture
    let img_p = new Image();

    img_p.onload = function() {
    if (img_p.height > img_p.width) {
        $('.gros-cadre-user').addClass('gros-cadre-user-long')
        $('.img-card').addClass('img-card-long')
    }else {
        $('.img-card').removeClass('img-card-long')
        $('.gros-cadre-user').removeClass('gros-cadre-user-long')
    }
    };

    img_p.src = '/'+image;

    let zone_petite_image = $('.tm_produit_petit_img_user')
    if ($('#image_principal').hasClass('s-none-client')) {
        $('#image_principal').removeClass('s-none-client')
    }

    $('#image_principal').attr('src', '/'+image)

    if (!$('.tm_show_p_product-client').hasClass('s-none-client')) {
        $('.tm_show_p_product-client').addClass('s-none-client')
        $('.gros-cadre').css({"padding-left": '5px', 'padding-right': '5px'})
    }

    for (let h = 0; h < zone_petite_image.length; h++) {
        $(zone_petite_image[h]).removeClass('tm_active_img_product')
    }

    $(zone_petite_image[index_div]).addClass('tm_active_img_product')

} // Fin showImagePrevievClient()

// Visualise les autres images du produit
function showImageMobilePreview(image, index_div) {

    $('#mobile_active_image_to_share').val(image);
    $('#mobile_client_video_preview').attr('src', " ") //Fermer la video si en lecture

    var img_p = new Image();

    img_p.onload = function() {

    if(img_p.height > img_p.width) {
        $('.gros-cadre-user').addClass('gros-cadre-user-long');
        $('.mobile-img-card').addClass('img-card-long')
    }else {
        $('.mobile-img-card').removeClass('img-card-long');
        $('.gros-cadre-user').removeClass('gros-cadre-user-long');
    }

    };

    img_p.src = '/'+image;

    let zone_petite_image = $('.panier-mobile-cadre-div');
    if ($('#mobile_image_principal').hasClass('s-none-client')) {
        $('#mobile_image_principal').removeClass('s-none-client')
    }

    $('#mobile_image_principal').attr('src', '/'+image)

    if(!$('.mobile_tm_show_p_product-client').hasClass('s-none-client')) {

        $('.mobile_tm_show_p_product-client').addClass('s-none-client')

        $('.gros-cadre').css({
            'padding-left': '5px',
            'padding-right': '5px'
        })

    }

    for(h = 0; h < zone_petite_image.length; h++) {
        $(zone_petite_image[h]).removeClass('tm_active_img_product-mobile');
    }

    $(zone_petite_image[index_div]).addClass('tm_active_img_product-mobile')

}

// video preview
function productVideoPreviewClient(video, index_div) {
    $('#tm_active_image_to_share').val("") // vider l'image active
    var video_no_suggestion = video+'?rel=0'
    $('.gros-cadre').css({"padding-left": '0px', 'padding-right': '0px'})
    $('#image_principal').addClass('s-none-client')
    $('#marchand_video_preview_big_client').removeClass('img-card-long')
    $('#image_principal').removeClass('img-card-long')
    $('.tm_show_p_product-client').removeClass('s-none-client')

    $('#marchand_video_preview_big_client').attr('src', video_no_suggestion)
    $('#marchand_video_preview_big_client').css({
        'height':'397px',
        'position': 'relative',
        'top': '4px'
    });

    let zone_petite_image = $('.tm_produit_petit_img_user')
    for (let h = 0; h < zone_petite_image.length; h++) {
    $(zone_petite_image[h]).removeClass('tm_active_img_product')
    }

    $(zone_petite_image[index_div]).addClass('tm_active_img_product')

} // --- Fin productVideoPreviewClient()

function mobileVideoPreview(video, index_div) {

    $('#tm_active_image_to_share').val();
    var video_no_suggession = video+'?rel=0';

    $('.gros-cadre').css({'padding-left': '0px', 'padding-right': '0px'})
    $('#mobile_image_principal').addClass('s-none-client');
    $('#mobile_client_video_preview').removeClass('img-card-long')
    $('#mobile_image_principal').removeClass('img-card-long')

    $('.mobile_tm_show_p_product-client').removeClass('s-none-client');

    $('#mobile_client_video_preview').attr('src', video_no_suggession);

    $('#mobile_client_video_preview').css({
        'height': '276px',
        'position': 'relative',
        'top': '0px'
    });

    let zone_petite_image = $('.panier-mobile-cadre-div');
    console.log('L element est la', zone_petite_image.length)

    for(var h = 0; h < zone_petite_image.length; h++) {
        console.log('It came here')
        $(zone_petite_image[h]).removeClass('tm_active_img_product')
    }

    $(zone_petite_image[3]).addClass('tm_active_img_product')

}

function getYoutubeVideoTumbnail(videoId, apiKey) {

    fetch(`https://www.googleapis.com/youtube/v3/videos?id=${videoId}&key=${apiKey}&part=snippet`)
    .then(response => response.json())
    .then(data => {

    const thumbnailUrl = data.items[0].snippet.thumbnails.default.url;

    $('.tm_vid_icon').css({
        'background-image': 'url("'+thumbnailUrl+'")',
        'background-size': '100% contain',
        'background-position': 'center'
    })

    $('#mobile-autre-image_video4').css({
        'background-image': 'url("'+thumbnailUrl+'")',
        'background-size': '100% contain',
        'background-position': 'center'
    })

    $('#product_video_preview_for_share').val(thumbnailUrl)

    })
    .catch(error => {
        console.error('Error:', error);
    });

} //--- Fin getYoutubeVideoTumbnail()

function check_if_already_notification_activated(id_produit) {

    $.ajax({
    type: 'GET',
    url: '/verify_user_accepted_notification/'+id_produit,
    data: {},
    success: function(response) {
    $('#notif_btn_parent').empty()
    if(response == 1) {
       
        var filled_notif_icon = 
        `
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" class="bi bi-bell" viewBox="0 0 16 16" id="in_stock_notification">
                <path fill="#025816" d="M8 16a2 2 0 0 0 2-2H6a2 2 0 0 0 2 2zM8 1.918l-.797.161A4.002 4.002 0 0 0 4 6c0 .628-.134 2.197-.459 3.742-.16.767-.376 1.566-.663 2.258h10.244c-.287-.692-.502-1.49-.663-2.258C12.134 8.197 12 6.628 12 6a4.002 4.002 0 0 0-3.203-3.92L8 1.917z"/>
            </svg>
        `

        $('#notif_btn_parent').append(filled_notif_icon)
        $('#notif_btn_parent').addClass('prevent_notif_clicked')

    } else if(response == 0) {

        const half_filled 
        = `
        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-bell" viewBox="0 0 16 16" id="in_stock_notification">
            <path d="M8 16a2 2 0 0 0 2-2H6a2 2 0 0 0 2 2zM8 1.918l-.797.161A4.002 4.002 0 0 0 4 6c0 .628-.134 2.197-.459 3.742-.16.767-.376 1.566-.663 2.258h10.244c-.287-.692-.502-1.49-.663-2.258C12.134 8.197 12 6.628 12 6a4.002 4.002 0 0 0-3.203-3.92L8 1.917zM14.22 12c.223.447.481.801.78 1H1c.299-.199.557-.553.78-1C2.68 10.2 3 6.88 3 6c0-2.42 1.72-4.44 4.005-4.901a1 1 0 1 1 1.99 0A5.002 5.002 0 0 1 13 6c0 .88.32 4.2 1.22 6z"></path>
        </svg>
        `
        $('#notif_btn_parent').removeClass('prevent_notif_clicked')
        $('#notif_btn_parent').append(half_filled)

    }
        // console.log(' User accepted notification response => ', response)
    }
    })
}

function produits_rayon_associer(id) {
    $.ajax({ // Recuperation des articles associé
    method: 'GET',
    url: '/rayon_articles_associer/'+id,
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

    }
    }) // Fin Recuperation des articles associé
}


function showRecapProduitMarchandTV(id) {

    closeMessagerieBox2()
    closeMessagerieBox()

    $('#id_produit').val(id)

    $('#modification').hide()
    $('#Ajouter_new').show()

    $('.tm_vid_icon').css({
        'background-image': '',
        'background-size': '',
        'background-position': ''
    });

    let zone_petite_image = $('.tm_produit_petit_img_user') // Recuperation des autres images
    $(zone_petite_image[0]).addClass('tm_active_img_product') // Ajout de la classe active

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
    $(mobile_zone_petite_image[0]).addClass('tm_active_img_product-mobile')
    // reset active class from all images
    for (let h = 1; h < mobile_zone_petite_image.length; h++) {
        $(mobile_zone_petite_image[h]).removeClass('tm_active_img_product-mobile')
    }

    $.ajax({ // Recuperation detail produit

    method: 'GET',
    url: '/show_detail_produit/'+id,
    data: {},
    headers: {},
    success: function(response){

    var prix_article = response['Detail_Produit'][0][0]['prix'];
    var prix_tag = '<sup style="position: relative; left: 5px">Fcfa</sup>'

    $('.article-title').text(response['Detail_Produit'][0][0]['libelle'])
    $('#reference_produit_client_desktop').text(response['Detail_Produit'][0][0]['ref_produit'])
    $('.mobile_article-title').text(response['Detail_Produit'][0][0]['libelle'])

    if (prix_article == 0) {
        $('#Ajouter_new').addClass('s-none-client')
        $('#client_sur_meme_produit').addClass('s-none-client')
        $('#in_stock_main_element').removeClass('s-none-client')

        $('#prix_total').text('Actuellement indisponible')
        $('#prix_total').css('font-size', '18px')
        $('#prix_total_mobile').text('Actuellement indisponible')
        $('.mobile_not_in_stock').removeClass('s-none-client')
        $('.mobile-prod-quantity-and-small-icons').addClass('s-none-client')

        check_if_already_notification_activated(response['Detail_Produit'][0][0]['id'])


    }else{

        $('#prix_total').text(prix_article.toLocaleString())
        $('#prix_total').append(prix_tag)
        $('#current_price').val(response['Detail_Produit'][0][0]['prix'])
        $('.mobile-prod-price').text(prix_article.toLocaleString())
        $('.mobile-prod-price').append(prix_tag)

        $('#prix_total').css('font-size', '24px')

        $('#Ajouter_new').removeClass('s-none-client')
        $('#client_sur_meme_produit').removeClass('s-none-client')
        $('#in_stock_main_element').addClass('s-none-client')
        $('.mobile_not_in_stock').addClass('s-none-client')
        $('.mobile-prod-quantity-and-small-icons').removeClass('s-none-client')

    }


    $('#description_marchand_zone1').text(response['Detail_Produit'][0][0]['description'])

    $('#mobile-caracteristique-data').text(response['Detail_Produit'][0][0]['description'])

    $('#image_principal').attr('src', '/'+response['Detail_Produit'][0][0]['image'])
    $('#image_principal1').attr('src', '/'+response['Detail_Produit'][0][0]['image'])

    $('#mobile_image_principal').attr('src', '/'+response['Detail_Produit'][0][0]['image'])
    $('#mobile_image_autre0').attr('src', '/'+response['Detail_Produit'][0][0]['image']) // Mobile


    $("#quantite").val(1)

    // click de l'image principal
    $('#image_principal1').bind('click', function(v) {
        showImagePrevievClient(response['Detail_Produit'][0][0]['image'], 0)
    })

    $('#mobile_image_autre0').bind('click', function(v) {
        showImageMobilePreview(response['Detail_Produit'][0][0]['image'], 0)
    })

    // calucl de la taille et affectation des nouvelle propriétés
    let img_p = new Image();

    img_p.onload = function() {
    if (img_p.height > img_p.width) {
        $('.img-card').addClass('img-card-long')
        $('.img-card-petit').addClass('img-card-petit-long')
        $('.gros-cadre-user').addClass('gros-cadre-user-long')
    }else {
        $('.img-card').removeClass('img-card-long')
        $('.img-card-petit').removeClass('img-card-petit-long')
        $('.gros-cadre-user').removeClass('gros-cadre-user-long')
    }
    };

    img_p.src = '/'+response['Detail_Produit'][0][0]["image"];
    // chargement de l'instance produit
    product_instance = response;

    $('.gros-cadre-user').addClass('set-white-color');
    $('#mobile_image_autre1').addClass('set-white-color');
    // $('#quantite_marchand').val(response['Detail_Produit'][0][0]['quantite'])
    $('#reference_produit_client').text(response['Detail_Produit'][0][0]['ref_produit'])
    $('#panier-mobile-ref_prod').text(response['Detail_Produit'][0][0]['ref_produit'])

    if (response['Detail_Produit'][0][0]['video_preview'] != null) {

    var url_video = response['Detail_Produit'][0][0]['video_preview'] // url de la video
    var regex = /https:\/\/youtube\.com\/embed\/|(\?t=\d+)/gi;
    var videoId = url_video.replace(regex, "");

    const apiKey = 'AIzaSyDdX29Tk27nv5nd9sHWgu-eRKNVr_n38Rk'; // Replace with your YouTube Data API key

    $('.tm_vid_icon').empty();
    $('#mobile-autre-image_video4').empty()

    const img_icon = '<img class="img-card-petit-p" style="height: 45%; width: 45%; background-color: #fff; border-radius: 6px" src="/assets/images/tm_yt_icon1.svg" alt="" id="image_autreMarchand4d" >'
    $('.tm_vid_icon').append(img_icon)
    $('#mobile-autre-image_video4').append(img_icon)

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

    } // --- Fin If Video

    if (response['Detail_Produit'][1].length > 0) {
        $('#produit-univer-user').text(response['Detail_Produit'][1][0]['libelle'])
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

    if (response['Detail_Produit'][13].length > 0) {

    $('#produit-rayon-user').text(response['Detail_Produit'][13][0]['libelle'])
    // Process recherche associé 
    produits_rayon_associer(response['Detail_Produit'][13][0]['id'])

    }

    for (i = 1; i < 6; ++i) { // Initialiser les cases images
        $('#image_autre'+i).hide()
    }

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

    $('#produit_partenaire_counter').text(response['Detail_Produit'][15].length)

    for (let caracteristique_item in response['Detail_Produit'][14] ) {
        let caracteristique_row = "<tr><td>"+caracteristique_item+"</td><td>"+product_instance['Detail_Produit'][14][caracteristique_item]+"</td></tr>"
        $('#TableContainerMobile').append(caracteristique_row)
    }

    }

    })

    showClickEffectBis(id)

    let window_width = window.innerWidth;
    let window_height = window.innerHeight;

    if ((window_height <= 630) && (window_height >= 495)) {
        $('#section-mobile-id').addClass('scale-popup')
    }else if((window_height <= 490) && (window_height >= 200)) {
        $('#section-mobile-id').addClass('scale-popup-2')
        $('#section-mobile-id').css('top', '-25px')
    } else {

    }

    setTimeout(function() {
        $('#recap-produit-main-modal').removeClass('main-prod-detail-modal')
        // $('#myModal').modal('show')
    }, 10)

    window.localStorage.removeItem('searched_product')  // Effacer le produit stocké

}


let slideIndex = 0;
showSlides();

function showSlides() {
    let i;
    let slides = document.getElementsByClassName("libelle-option-p");
    for (i = 0; i < slides.length; i++) {
        slides[i].style.display = "none";
    }
    slideIndex++;
    if (slideIndex > slides.length) {slideIndex = 1}
    slides[slideIndex-1].style.display = "block";
    setTimeout(showSlides, 2000); // Change image every 2 seconds
}

let slideIndex1 = 0;
showSlides1();

function showSlides1() {
    let i;
    let slides = document.getElementsByClassName("slide-option-text");
    for (i = 0; i < slides.length; i++) {
        slides[i].style.display = "none";
    }
    slideIndex1++;
    if (slideIndex1 > slides.length) {slideIndex1 = 1}
    slides[slideIndex1-1].style.display = "block";
    setTimeout(showSlides1, 2000); // Change image every 2 seconds
}

// ---------------------------------- sharing section --------------------------------

function showSocialShare() {
    let current_url_to_share = window.location.href;
    let product_id = $('#id_produit').val()
    let final_product_link = current_url_to_share+'/?id='+product_id

    $('#link-to-share-product').val(final_product_link);
    $('#produitSocialShareModal').modal('show')

}

function showEffect(id) {
    var img_size = document.getElementById('addSlide-user'+id).offsetWidth
    var img_size_height = document.getElementById('addSlide-user'+id).offsetHeight / 1.3
    $('#effect-layer'+id).css('width', img_size+'px')
    $('#effect-layer'+id).css('height', img_size_height+'px')
    $('#effect-layer'+id).removeClass('effect-none')
    $('#image-prod-id'+id).addClass('produit-show-effect')
}

function showEffectRemove(id) {
    $('#effect-layer'+id).addClass('effect-none')
    $('#image-prod-id'+id).removeClass('produit-show-effect')
}

function showClickEffect(id) {

    var img_size_height = document.getElementById('addSlide-user'+id).offsetHeight
    var img_p = $('#addSlide-user'+id).find('img')[0].offsetHeight
    console.log('Here is your image', img_p)
    $('#effect-layer'+id).css('height', img_p+'px')
    $('#effect-layer'+id).addClass('product-filled-effect')

    setTimeout(function(){
        showRecapProduitMarchandTV(id)
    },  10)

}

function showClickEffectBis(id) {

}

function closeMobilePanierPopup() {

    $('#mobile_image_principal').removeClass('s-none-client')

    $('.mobile_tm_show_p_product-client').addClass('s-none-client')

    $('#mobile_client_video_preview').attr('src', " ") //Fermer la video si en lecture
    $('#recap-produit-main-modal').addClass('main-prod-detail-modal')

}

function showDescription() {
    $('.mobile-description-caracteristique').removeClass('s-none-client')
}

function showCaracteristique() {
    $('.mobile-description-caracteristique2').removeClass('s-none-client')
}

function closeMobileCaracteristiques() {
    $('.mobile-description-caracteristique2').addClass('s-none-client')
    $('.mobile-description-caracteristique').addClass('s-none-client')
}

function keep_shopping() {

    let succes_info = {
        status_commande: 'ok'
    }

    window.localStorage.setItem('commande_succes', JSON.stringify(succes_info));
    location.reload()

}

function generateProductCaseBis(slide_el, phone_height) {
    console.log('Check rayon id too => ', slide_el)
    if ((id_rayon == 26) || (id_rayon == 38) || (id_rayon == 39)) {
        var etagere_slides = []
        if (slide_el.id == 1124 || slide_el.id == 951 || slide_el.id == 932 || slide_el.id == 934) {

         etagere_slides += '<div id="addSlide-user'+slide_el.id+'" onclick="showClickEffect('+slide_el.id+')" class="slide case-produit-btnd" onmouseover="showEffect('+slide_el.id+')" style="height: '+phone_height+'px !important;" onmouseleave="showEffectRemove('+slide_el.id+')">'
         etagere_slides += '<img id="image-prod-id'+slide_el.id+'" onclick="showRecapProduitMarchandTV('+slide_el.id+')" class="image-prod-5-ligne" src= "/'+slide_el.image+'" width="'+slide_el.taille_sur_etagere+'px" style="width: auto; height: 100px">'

         etagere_slides += '<span id="effect-layer'+slide_el.id+'" class="product-effect-layer effect-none" style="font-size: 12px; position: absolute; width: '+slide_el.taille_sur_etagere+'px; color: #fff;"><span class="cap-cover"></span></span>'

         etagere_slides += '</span>'
         etagere_slides += '</div>'

        }else {

         etagere_slides += '<div id="addSlide-user'+slide_el.id+'" onclick="showClickEffect('+slide_el.id+')" class="slide case-produit-btnd" onmouseover="showEffect('+slide_el.id+')" style="height: '+phone_height+'px !important;" onmouseleave="showEffectRemove('+slide_el.id+')">'
         etagere_slides += '<img id="image-prod-id'+slide_el.id+'" onclick="showRecapProduitMarchandTV('+slide_el.id+')" class="image-prod-5-ligne" src= "/'+slide_el.image+'" width="'+slide_el.taille_sur_etagere+'px" style="width: auto; max-width: '+slide_el.taille_sur_etagere+'px">'

         etagere_slides += '<span id="effect-layer'+slide_el.id+'" class="product-effect-layer effect-none" style="font-size: 12px; position: absolute; width: '+slide_el.taille_sur_etagere+'px; color: #fff;"><span class="cap-cover"></span></span>'

         etagere_slides += '</span>'
         etagere_slides += '</div>'

        }

        return etagere_slides;

    }else {
    return `<div id="addSlide-user${slide_el.id}" onclick="showClickEffect(${slide_el.id})" class="slide case-produit-btnd" onmouseover="showEffect(${slide_el.id})" style="height: ${phone_height}px !important;" onmouseleave="showEffectRemove(${slide_el.id})">
                <img id="image-prod-id${slide_el.id}" onclick="showRecapProduitMarchandTV(${slide_el.id})" class="image-prod-old" src="/${slide_el.image}" width="${slide_el.taille_sur_etagere}px">
                <span id="effect-layer${slide_el.id}" class="product-effect-layer effect-none" style="font-size: 12px; position: absolute; width: ${slide_el.taille_sur_etagere}px;"><span class="cap-cover"></span></span>
            </div>`;
    }
    // return `<div id="addSlide-user${slide_el.id}" onclick="showClickEffect(${slide_el.id})" class="slide case-produit-btnd" onmouseover="showEffect(${slide_el.id})" style="height: ${height}px !important;" onmouseleave="showEffectRemove(${slide_el.id})">
    //             <img id="image-prod-id${slide_el.id}" onclick="showRecapProduitMarchandTV(${slide_el.id})" class="image-prod" src="/${slide_el.image}" width="${slide_el.taille_sur_etagere}px">
    //             <span id="effect-layer${slide_el.id}" class="product-effect-layer effect-none" style="font-size: 12px; position: absolute; width: ${slide_el.taille_sur_etagere}px;"><span class="cap-cover"></span></span>
    //         </div>`;
}
