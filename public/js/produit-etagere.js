// recuperation des donnees du rayon: par id
function changeBackImage(id) {

    $('.rayon-marchand-dynamique').removeClass('rayon-hover')
    $('.rayon-link-item').removeClass('rayon-hover-link');
    $('#bouton-rayon'+id).addClass('rayon-hover')
    $('#link'+id).addClass('rayon-hover-link')
    $('#activeRayonVal').val(id) // id du rayon pour la modification
    $('.main-carousel-section-changed').empty();

    const chunk = (arr, size) =>

    Array.from({ length: Math.ceil(arr.length / size) }, (v, i) =>
        arr.slice(i * size, i * size + size)
    );

    let preview_back = $('.contenu-marchand').css('background-image');
    $('.contenu-marchand-fake').css('background-image', preview_back)

    // $('#tm-main-slide-carousel').remove()
    $.ajax({
    method: 'GET',
    url: '/rayon_background/'+id,
    data: {},
    headers: {},
    beforeSend: function() {

    },
    success: function(response) {

    if (response['rayon'][0]['id'] == 25 && response['produits'].length  == 0) {

    let tableau_produit = chunk(response['produits'], 12)

    }else if(response['rayon'][0]['id'] == 25 && response['produits'].length  > 0) {
    var tab_produits = response['produits'];
    // ...
    var div_slide_element = '';

    div_slide_element += '<div class="slider-content-wrapper">'

    var line_slide = [0, 1, 2];
    var case_etagere = [0, 1, 2, 3, 4];

    for (const key in tab_produits) {
    var storage_row_line = [];
    var produit_sur_chaque_ligne = [];
    var produit_taille_sur_etagere = [];
    var produit_position_sur_ligne = [];
    var tableau_produits_id = [];
    var produit_max_size = []; //les tailles maximales d'une ligne
    div_slide_element += '<div class="custom-carousel-page" id="slide-p'+key+'" data-index = "'+key+'" >'

    var data_etagere_num = key;
    if (tab_produits.hasOwnProperty(key)) {
    var tab_slide_row = tab_produits[key]
    for(const key1 in tab_slide_row) { // STAGE 2

    var tab_slide_row_array2 = [];
    var array_stage2 = tab_slide_row[key1]
    for(const key2 in array_stage2) { // STAGE 3

    tab_slide_row_array2.push(key2)
    var tab_slide_image_position = [];
    var array_stage3 = array_stage2[key2];

    for(const key3 in array_stage3) {
    div_slide_element += '<div class="row_div" >'

    var array_stage4 = array_stage3[key3];

    for(const key4 in array_stage4) {
    var p1 = array_stage4[key4]
    var index_produit = p1.position_sur_etagere;

    console.log('Le produit est ici:', p1)
    div_slide_element += '<div class="slide case-produit-btn" style="height: 155px !important; display: flex; align-items: flex-end; width: '+p1.taille_sur_etagere+'px !important;">'
    div_slide_element += '<div style="display: flex; align-items: flex-start; justify-content: center;" class="product-img-for-option">'

    div_slide_element += '<span class="tm_product_options_container">'
    // les options du produits
    div_slide_element += '<div style="height: 36px; width: 31px; " >'
    div_slide_element += '<img class="image-prod-option prod-option-preview" onclick="showRecapProduitMarchand('+p1.id+')" src="assets/images/tm_preview_product.svg" alt="">'
    div_slide_element += '</div>'

    div_slide_element += '<div style="height: 36px; width: 31px; " >'
    div_slide_element += '<img class="image-prod-option prod-option-edit" onclick="editProduct('+p1.id+')" src="assets/images/tm_edit-off.svg" alt="" >'
    div_slide_element += '</div>'

    div_slide_element += '<div style="height: 36px; width: 31px; " >'
    div_slide_element += '<img class="image-prod-option prod-option-corbeil" onclick="deleteProductMarchand('+p1.id+')" src="assets/images/Corbeille-grise-base.svg" alt="">'
    div_slide_element += '</div>'

    div_slide_element += '</span>'
    div_slide_element += ' <img class="image-prod" src="'+p1.image+'" alt="" height="auto" width="240px">'
    div_slide_element += '</div>'
    div_slide_element += '</div>'

    }

    div_slide_element += '</div>'

    }

    var tab_slide_row_array3 = [];

    }

    }
    }

    div_slide_element += '</div>'

    }

    div_slide_element += '</div>'
    $('.main-carousel-section-changed').append(div_slide_element)

    const slides = document.querySelectorAll(".custom-carousel-page");
    var all_inside_line_tv = $(slides[0]).find('.row_div')
    $(all_inside_line_tv[0]).css({
        'position': 'relative',
        'top': '-15px',

    })

    }

    if (response['rayon'][0]['id'] == 26 && response['produits'].length == 0) {
        let tableau_produit = chunk(response['produits'], 30)
        console.log('Nous sommes dans le rayon Informatique et tablette =>', response['rayon'][0]['libelle'])
        console.log('And the chunking result is', tableau_produit)
    }else if(response['rayon'][0]['id'] == 26 && response['produits'].length > 0) {

    var tab_produits = response['produits'];
    // ...
    var div_slide_element = '';

    div_slide_element += '<div class="slider-content-wrapper">'

    var line_slide = [0, 1, 2, 3, 4];
    var case_etagere = [0, 1, 2, 3, 4, 5];

    for (const key in tab_produits) {
    var storage_row_line = [];
    var produit_sur_chaque_ligne = [];
    var produit_taille_sur_etagere = [];
    var produit_position_sur_ligne = [];
    var tableau_produits_id = [];
    var produit_max_size = []; //les tailles maximales d'une ligne
    div_slide_element += '<div class="custom-carousel-page" id="slide-p'+key+'" data-index = "'+key+'" >'

    var data_etagere_num = key;
    if (tab_produits.hasOwnProperty(key)) {
    var tab_slide_row = tab_produits[key]
    for(const key1 in tab_slide_row) { // STAGE 2

    var tab_slide_row_array2 = [];
    var array_stage2 = tab_slide_row[key1]
    for(const key2 in array_stage2) { // STAGE 3

    tab_slide_row_array2.push(key2)
    var tab_slide_image_position = [];
    var array_stage3 = array_stage2[key2];

    for(const key3 in array_stage3) {
    div_slide_element += '<div class="row_div-telephonie" >'
    console.log('Le contenu de celui ci est bien:', array_stage3[key3])
    var array_stage4 = array_stage3[key3];

    for(const key4 in array_stage4) {
    var p1 = array_stage4[key4]
    var index_produit = p1.position_sur_etagere;

    div_slide_element += '<div class="slide case-produit-btn" style="height: 78px !important; display: flex; align-items: flex-end; width: '+p1.taille_sur_etagere+'px !important;">'
    div_slide_element += '<div style="display: flex; align-items: flex-start; justify-content: center;" class="product-img-for-option">'

    div_slide_element += '<span class="tm_product_options_container">'
    // les options du produits
    div_slide_element += '<div style="height: 36px; width: 31px; " >'
    div_slide_element += '<img class="image-prod-option prod-option-preview" onclick="showRecapProduitMarchand('+p1.id+')" src="assets/images/tm_preview_product.svg" alt="">'
    div_slide_element += '</div>'

    div_slide_element += '<div style="height: 36px; width: 31px; " >'
    div_slide_element += '<img class="image-prod-option prod-option-edit" onclick="editProduct('+p1.id+')" src="assets/images/tm_edit-off.svg" alt="" >'
    div_slide_element += '</div>'

    div_slide_element += '<div style="height: 36px; width: 31px; " >'
    div_slide_element += '<img class="image-prod-option prod-option-corbeil" onclick="deleteProductMarchand('+p1.id+')" src="assets/images/Corbeille-grise-base.svg" alt="">'
    div_slide_element += '</div>'

    div_slide_element += '</span>'
    div_slide_element += ' <img class="image-prod" src="'+p1.image+'" alt="" height="auto" width="240px">'
    div_slide_element += '</div>'
    div_slide_element += '</div>'

    }

    div_slide_element += '</div>'

    }

    console.log('Les les indexs sont: =>', key2)
    var tab_slide_row_array3 = [];

    }

    }
    }


    div_slide_element += '</div>'
    }

    div_slide_element += '</div>'
    $('.main-carousel-section-changed').append(div_slide_element)

 }

    if (response['rayon'][0]['id'] == 27 && response['produits'].length > 0) {
    var tab_produits = response['produits'];
    console.log('Inside Phone section')
    // ...
    var div_slide_element = '';

    div_slide_element += '<div class="slider-content-wrapper">'

    var line_slide = [0, 1, 2];
    var case_etagere = [0, 1, 2, 3, 4, 5];

    for (const key in tab_produits) {
    var storage_row_line = [];
    var produit_sur_chaque_ligne = [];
    var produit_taille_sur_etagere = [];
    var produit_position_sur_ligne = [];
    var tableau_produits_id = [];
    var produit_max_size = []; //les tailles maximales d'une ligne
    div_slide_element += '<div class="custom-carousel-page" id="slide-p'+key+'" data-index = "'+key+'" >'

    var data_etagere_num = key;
    if (tab_produits.hasOwnProperty(key)) {
    var tab_slide_row = tab_produits[key]
    for(const key1 in tab_slide_row) { // STAGE 2

    var tab_slide_row_array2 = [];
    var array_stage2 = tab_slide_row[key1]
    for(const key2 in array_stage2) { // STAGE 3

    tab_slide_row_array2.push(key2)
    var tab_slide_image_position = [];
    var array_stage3 = array_stage2[key2];

    for(const key3 in array_stage3) {
    div_slide_element += '<div class="row_div-telephonie" >'
    console.log('Le contenu de celui ci est bien:', array_stage3[key3])
    var array_stage4 = array_stage3[key3];

    for(const key4 in array_stage4) {
    var p1 = array_stage4[key4]
    var index_produit = p1.position_sur_etagere;

    console.log('Le produit est ici:', p1)
    div_slide_element += '<div class="slide case-produit-btn" style="height: 78px !important; display: flex; align-items: flex-end; width: '+p1.taille_sur_etagere+'px !important;">'
    div_slide_element += '<div style="display: flex; align-items: flex-start; justify-content: center;" class="product-img-for-option">'

    div_slide_element += '<span class="tm_product_options_container">'
    // les options du produits
    div_slide_element += '<div style="height: 36px; width: 31px; " >'
    div_slide_element += '<img class="image-prod-option prod-option-preview" onclick="showRecapProduitMarchand('+p1.id+')" src="assets/images/tm_preview_product.svg" alt="">'
    div_slide_element += '</div>'

    div_slide_element += '<div style="height: 36px; width: 31px; " >'
    div_slide_element += '<img class="image-prod-option prod-option-edit" onclick="editProduct('+p1.id+')" src="assets/images/tm_edit-off.svg" alt="" >'
    div_slide_element += '</div>'

    div_slide_element += '<div style="height: 36px; width: 31px; " >'
    div_slide_element += '<img class="image-prod-option prod-option-corbeil" onclick="deleteProductMarchand('+p1.id+')" src="assets/images/Corbeille-grise-base.svg" alt="">'
    div_slide_element += '</div>'

    div_slide_element += '</span>'
    div_slide_element += ' <img class="image-prod" src="'+p1.image+'" alt="" height="auto" width="240px">'
    div_slide_element += '</div>'
    div_slide_element += '</div>'

    }

    div_slide_element += '</div>'

    }

    console.log('Les les indexs sont: =>', key2)
    var tab_slide_row_array3 = [];

    }

    }
    }


    div_slide_element += '</div>'
    }

    div_slide_element += '</div>'

    $('.main-carousel-section-changed').append(div_slide_element)

    }

    if (response['rayon'][0]['id'] == 28) {
        console.log('Nous sommes dans le rayon Téléphone =>', response['rayon'][0]['libelle'])
    }

    const br_rayon = '/storage/images/rayons/'+response['rayon'][0]['grande_etagere'];
    $(".contenu-marchand").css("background-image", "url(" + br_rayon + ")");

    },
    complete: function(response) {

    }
    })

  }

  // recuperation des donnees du rayon: par id
function changeBackImageClient(id_rayon, id_boutique) {

    // if(id_rayon == 27) {
    //     min_val_prod_culumn = 200
    // }else if (id_rayon == 25) {
    //     min_val_prod_culumn = 330;
    // }else {
    //     min_val_prod_culumn = 300
    // }

    if (id_rayon == 27) {
        min_val_prod_culumn = 200;
    }else if(id_rayon == 25) {
        min_val_prod_culumn = 330;
    }else if(id_rayon == 26) {
        min_val_prod_culumn = 300;
    }else if(id_rayon == 28) {
        min_val_prod_culumn = 330;
    }else if(id_rayon == 38) {
        min_val_prod_culumn = 200;
    }else if(id_rayon == 39) {
        min_val_prod_culumn = 200;
    }else if(id_rayon == 9) {
        min_val_prod_culumn = 250;
    }else {
        min_val_prod_culumn = 330;
    }

    var taille_actuel = window.innerWidth;

    let reste_division = Math.floor(taille_actuel / min_val_prod_culumn);
    
    init_product_col_number = reste_division;
    
    var rayon_default_categorie = 10;
    counter = 1;
    curSlide1 = 0;

    console.log('Counter is => ', counter)

    var etagere_bg = $('#bouton-rayon'+id_rayon).attr('data-etagere')
    
    $('.rayon-marchand-dynamique').removeClass('rayon-hover')
    $('.rayon-link-item').removeClass('rayon-hover-link');
    $('#bouton-rayon'+id_rayon).addClass('rayon-hover')
    $('#link'+id_rayon).addClass('rayon-hover-link')
    $('#activeRayonVal').val(id_rayon) // id du rayon pour la modification
    
    // const chunk = (arr, size) =>
    
    // Array.from({ length: Math.ceil(arr.length / size) }, (v, i) =>
    //     arr.slice(i * size, i * size + size)
    // );
    
    let preview_back = $('.contenu-marchand').css('background-image');
    
    $('.contenu-marchand-fake').css('background-image', preview_back)
    
    // $('#tm-main-slide-carousel').remove()
    $.ajax({
    method: 'GET',
    url: '/get_partager_product_by_screen_size/'+id_boutique+'/'+id_rayon + '/' + rayon_default_categorie + '/'+init_product_col_number + '/?page=' + counter,
    data: {},
    headers: {},
    beforeSend: function() {
    
    },
    success: function(response) {

    $('.slider-content-wrapper-user').empty();
    
    const br_rayon = '/storage/images/rayons/'+etagere_bg;
    $(".contenu-marchand").css("background-image", "url(" + br_rayon + ")");

    var produits = response.boutique_data.data

    partager_seached_rayon_val = id_rayon

    if (produits.length > 0) {
        showProductByScreenSite_bis(id_rayon, produits, init_product_col_number)
    }else {
        $('.slider-content-wrapper-user').append(telephonie_etagere_vide)
    }

    
    },
    complete: function(response) {

    }

    })
    
    }

  // -------------------- close description caracteristique popup -------------------
    function closeMessagerieBox2() {
        $('#section-descriptions-produit-id').addClass('main-prod-detail-modal')
    }

  $(document).ready(function() {
    $('#descProd').on('click', function() {

        $('#recapPanierModalContent').css('position', 'relative');
        $('#recapPanierModalContent').css('left', '-200px');
        $('#dessBox').removeClass('none-messaboxe');
        console.log('la description est:', product_instance['Detail_Produit'][0][0]['description'])

        $('#Deskription').text(product_instance['Detail_Produit'][0][0]['description']) // Description
        $('#TableContainer').empty();
        for (let caracteristique_item in product_instance['Detail_Produit'][14] ) {
            let caracteristique_row = "<tr><td>"+caracteristique_item+"</td><td class='valeur-caracteristiques'>"+product_instance['Detail_Produit'][14][caracteristique_item]+"</td></tr>"
            $('#TableContainer').append(caracteristique_row)
        }

    })

    // -------------------- ouverture du pop up caracteristique et description ----------------

    // $('#flex-items01').on('click', function() {
    //     $('#Karacteristique').addClass('none-messaboxe')
    //     $('#Deskription').removeClass('none-messaboxe')
    //     $('#flex-items01').css('background-color', '#191970');
    //     $('#flex-items02').css('background-color', '#F8F8F8')
    //     $('#Cdesc').css('color', '#9B9B9B')
    // })

    $('#myModal').on('hidden.bs.modal', function (e) {
        $('#image_principal').attr('src', "")
        $('#marchand_video_preview_big_client').attr('src', " ")
    })

    $('.init-carat-btn').on('click', function() {

        $('.init-carat-btn').removeClass('flex-items')
        $('.description-caracteristique-common').addClass('none-messaboxe')

        if (!$(this).hasClass('flex-items')) {
            $(this).addClass('flex-items')
            const id_content = $(this).attr('data-content')
            console.log('Your id is =>', id_content)
            $('#'+id_content).removeClass('none-messaboxe')
        }

    })

    // $('#flex-items02').on('click', function() {
    //     $('#Karacteristique').removeClass('none-messaboxe')
    //     $('#Deskription').addClass('none-messaboxe');
    //     $('#flex-items02').css('background-color', '#191970');
    //     $('#flex-items01').css('background-color', '#F8F8F8')
    //     $('#Pdesc').css('color', '#9B9B9B');
    // })

    // ------------------ inviter login -------------------
    $('#inviteRegisterLoginModalClosed').on('click', function(){
        $('#inviteRegisterLoginModal').modal('hide')
        console.log('Modal closed')
    })

    // -------------------- section control des champs -------------------------
    $('#formRegister_prenom-input-invite').on('blur', function() {
        let email_valeur = $(this).val()
        if (email_valeur.length == 0) {
            $('#formRegister_prenom-input-invite').addClass('input-error-warning')
        }
    })

    $('#formRegister_prenom-input-invite').on('keyup', function() {
        let email_valeur = $(this).val()
        if (email_valeur.length > 0 && $('#formRegister_prenom-input-invite').hasClass('input-error-warning')) {
            $('#formRegister_prenom-input-invite').removeClass('input-error-warning')
        }else if (email_valeur.length == 0) {
            $('#formRegister_prenom-input-invite').addClass('input-error-warning')
        }
        open_save_button_login_register()
    })

    $('#formRegister_nom-input-invite').on('blur', function() {
        let email_valeur = $(this).val()
        if (email_valeur.length == 0) {
            $('#formRegister_nom-input-invite').addClass('input-error-warning')
        }
    })

    $('#formRegister_nom-input-invite').on('keyup', function() {
        let email_valeur = $(this).val()
        if (email_valeur.length > 0 && $('#formRegister_nom-input-invite').hasClass('input-error-warning')) {
            $('#formRegister_nom-input-invite').removeClass('input-error-warning')
        }else if (email_valeur.length == 0) {
            $('#formRegister_nom-input-invite').addClass('input-error-warning')
        }
        open_save_button_login_register()
    })

    // --------------------- email -------------------
    $('#formRegister_email-input-invite').on('blur', function() {
        let email_valeur = $(this).val()
        let isvalid = ValidateEmailInvite(email_valeur)

        if (!isvalid) {
            $('#formRegister_email-input-invite').addClass('input-error-warning-long')
            console.log('Invalide')
        }else {
            $('#formRegister_email-input-invite').removeClass('input-error-warning-long')
        }

        if (email_valeur.length == 0) {
            $('#formRegister_email-input-invite').addClass('input-error-warning-long')
        }

    })

    $('#formRegister_email-input-invite').on('keyup', function() {
        let email_valeur = $(this).val()
        if (email_valeur.length > 0 && $('#formRegister_email-input-invite').hasClass('input-error-warning-long')) {
            $('#formRegister_email-input-invite').removeClass('input-error-warning-long')
        }else if (email_valeur.length == 0) {
            $('#formRegister_email-input-invite').addClass('input-error-warning-long')
        }

        open_save_button_login_register()
    })

    // ---------------- password ----------------------
    $('#formRegister-passwordRegister-invite').on('blur', function(){
        let passwd = $('#formRegister-passwordRegister-invite').val()
        if (passwd.length < 5) {
            $('#pwd_error_message-vendeur').removeClass('error-none')
            $('#pwd_error_message-vendeur').addClass('block-display')
            $('#formRegister-passwordRegister-invite').addClass('input-error-warning-pwd')
            $('#formRegister_password-input').addClass('pwd-border-error')
            $('#formRegister_password-input').removeClass('input-success-border')
        }else{
            $('#pwd_error_message-vendeur').addClass('error-none')
            $('#pwd_error_message-vendeur').removeClass('block-display')
            $('#formRegister-passwordRegister-invite').removeClass('input-error-warning-pwd')
            $('#pwd-border-error').removeClass('pwd-border-error')
            $('#pwd-border-error').addClass('input-success-border')
        }
    })

    $('#formRegister-passwordRegister-invite').on('keyup', function() {
    let email_valeur = $(this).val()
    if (email_valeur.length > 0 && $('#formRegister-passwordRegister-invite').hasClass('input-error-warning-pwd')) {
        $('#formRegister-passwordRegister-invite').removeClass('input-error-warning-pwd')
        $('#formRegister_password-input').removeClass('pwd-border-error')
        // $('#formRegister_password-input').addClass('input-success-border')
    }else if (email_valeur.length == 0) {
        $('#formRegister-passwordRegister-invite').addClass('input-error-warning-pwd')
        $('#formRegister_password-input').addClass('pwd-border-error')
        // $('#formRegister_password-input').removeClass('input-success-border')
    }

    open_save_button_login_register()

    })

    // ---------------- confirme password --------------------
    $('#formLogin-registerLogin-invite').on('blur', function() {
    let passwordConfirmation = $('#formLogin-registerLogin-invite').val();
    let passwd = $('#formRegister-passwordRegister-invite').val()

    if (passwordConfirmation !== passwd) {
        $('#pwdconfirm_error_message-vendeur').removeClass('error-none')
        $('#pwdconfirm_error_message-vendeur').addClass('block-display')
        $('#formLogin-registerLogin-invite').addClass('input-error-warning-pwd')
        $('#formRegister_password_confirmation-input-client').addClass('pwd-border-error')
        $('#formRegister_password_confirmation-input-client').removeClass('input-success-border')
        error_flag_pwdconfirm = true;
    }else {
        $('#pwdconfirm_error_message-vendeur').addClass('error-none')
        $('#pwdconfirm_error_message-vendeur').removeClass('block-display')
        $('#formLogin-registerLogin-invite').removeClass('input-error-warning-pwd')
        $('#formRegister_password_confirmation-input-client').removeClass('pwd-border-error')
        $('#formRegister_password_confirmation-input-client').addClass('input-success-border')
        error_flag_pwdconfirm = false;
    }

    })

    $('#formLogin-registerLogin-invite').on('keyup', function() {
    let email_valeur = $(this).val()
    if (email_valeur.length > 0 && $('#formLogin-registerLogin-invite').hasClass('input-error-warning-pwd')) {
        $('#formLogin-registerLogin-invite').removeClass('input-error-warning-pwd')
        $('#formRegister_password_confirmation-input-client').removeClass('pwd-border-error')
        // $('#formRegister_password-input').addClass('input-success-border')
    }else if (email_valeur.length == 0) {
        $('#formLogin-registerLogin-invite').addClass('input-error-warning-pwd')
        $('#formRegister_password_confirmation-input-client').addClass('pwd-border-error')
        // $('#formRegister_password-input').removeClass('input-success-border')
    }

    open_save_button_login_register()

    })

// --------------------- login form control -----------------------------

    $('#formLogin_email-input-inviter').on('blur', function() {
    let email_valeur = $(this).val()
    if (email_valeur.length == 0) {
        $('#formLogin_email-input-inviter').addClass('input-error-warning')
    }
    })

    // -----------------------------------------
    $('#formLogin_email-input-inviter').on('keyup', function() {
    console.log('Here is where we re loking for')
    let email_valeur = $(this).val()
    if (email_valeur.length > 0 && $('#formLogin_email-input-inviter').hasClass('input-error-warning')) {
        $('#formLogin_email-input-inviter').removeClass('input-error-warning')
    }else if (email_valeur.length == 0) {
        $('#formLogin_email-input-inviter').addClass('input-error-warning')
    }

    activeLoginBtn()

    })

    // ------------------------------------------
    $('#formLogin_password-field-inviter').on('blur', function() {
    let email_valeur = $(this).val()
    if (email_valeur.length == 0) {
        $('#formLogin_password-field-inviter').addClass('input-error-warning-pwd')
        $('#formLogin_password-input-client').addClass('pwd-border-error')
    }
    })

    // -----------------------------------------
    $('#formLogin_password-field-inviter').on('keyup', function() {

    let email_valeur = $(this).val()
    if (email_valeur.length > 0 && $('#formLogin_password-field-inviter').hasClass('input-error-warning-pwd')) {
        $('#formLogin_password-field-inviter').removeClass('input-error-warning-pwd')
        $('#formLogin_password-input-client').removeClass('pwd-border-error')
    }else if (email_valeur.length == 0) {
        $('#formLogin_password-field-inviter').addClass('input-error-warning-pwd')
        $('#formLogin_password-input-client').addClass('pwd-border-error')
    }

    activeLoginBtn()

    })

    // ----------------------------------------------
    $('#formRegister_myformClient').on('submit', function(event) {
    event.preventDefault();
    console.log('You submitted subscription form')
    connexionInviteUser()
    })

    $('#numero_telephone-client-2').mask('000000000')
    $('#phone-paiement-zone').mask('000 00 00 00')
    $('#phone-paiement-zone-moov').mask('000 00 00 00')

    // var windowHeight = $(window).height();
    // var windowWidth = $(window).width();
    // var boxHeight = $('.modal-dialog').height();
    // var boxWidth = $('.modal-dialog').width();

    $('.modal-dialog').css({'top':((windowHeight - boxHeight)/8)});

  })
