let query;
var inscription_count = 30;
var inscription_count1 = 30;

jQuery(document).ready(function () {
    let intervalP
    $('.my-slick-btn, .my-slick-btn-2').click(function () {
        let next
        if($(this).attr('data-to') == 0) next = $($($(this).parent().children()[2]).children())[0]
        if($(this).attr('data-to') == 1)  next = $($($(this).parent().children()[2]).children())[2]
        if(next){
            $(next).click()
        }
    })

    $('.miniature').mouseleave(function () {
        clearInterval(intervalP)
        $('.miniature').attr('src', 'assets/vitrines/fenetre_0.webp')
    })

    $('.miniature').mouseenter(function () {
        clearInterval(intervalP)
        $('.miniature').not(this).attr('src', 'assets/vitrines/fenetre_0.webp')
        imgFieldP = $(this);

        if ((imgFieldP.attr('data-id') == 'univers-3') || (imgFieldP.attr('data-id') == 'univers-7')) {
            console.log('Here is loading ...')
            let i = 1;
            let imgLinkP
            intervalP = setInterval(()=>{
                if (i > 0 && i<12) {
                    imgLinkP = '/assets/vitrines/fenetre_' + i + '.webp';
                    $(imgFieldP).attr('src', imgLinkP);
                    i++
                }
                else{
                    clearInterval(intervalP)
                }
            }, 70)
        }
        
    })

    $('.slide-btn').each(function (key, value) {
        $(value).html("<img src='../assets/images2/prec.svg' alt='>")
    })

    $('.main-content, .my-slick-btn, .rayon-main-div').mouseenter(function (event) {
        closeDropdown();
    })

    $('.header-site-logo, .my-navbar, .header-site-icon, .my-slick-btn, .rayon-main-div').mouseenter(function (event) {
        closeResultBloc();
    })

    $('.main-header, .nav-search-bar').mouseenter(function() {
        closeResultBloc();
    })

    $('#rayon-search-results-bloc').mouseleave(function() {
        closeResultBloc();
    })

    $('#partage-search-results-bloc').mouseleave(function() {
        // closeResultBloc();
    })

    $('#formRayonSearch_text-input').focusin(function () {
        console.log('You focused me!!!')
        $.ajax({
            type: 'GET',
            url: '/get_deviner_product',
            success: function(response) {
                $('#laissez-deviner-inrayon').empty()
                if (response['deviner'].length > 0) {
                    for (let j = 0; j < response['deviner'].length; j++) {

                        var id_produit = response['deviner'][j]['id']
                        var id_rayon = response['deviner'][j]['id_rayon']
                        var rayon_slug = response['deviner'][j]['slug']

                        var deviner_item = `
                        <div class="suggestion-recherche " onclick=redirectRayonFromLaisserDevier('/rayon/${id_rayon}/${rayon_slug}','${id_produit}')>
                            <p>${response['deviner'][j]['libelle']}</p>
                        </div>
                            `
                        $('#laissez-deviner-inrayon').append(deviner_item)

                    }
                }
            }
        })
        openResultBloc();
    })

    $('#formRayonSearch_text-input_partager').focusin(function () {
        
        openPartageResultBloc();
        
        $.ajax({
        type: 'GET',
        url: '/get_deviner_product',
        success: function(response) {
        $('#laissez-deviner-inrayon').empty()
        if (response['deviner'].length > 0) {
        for (let j = 0; j < response['deviner'].length; j++) {

        var id_produit = response['deviner'][j]['id']
        var id_rayon = response['deviner'][j]['id_rayon']
        var rayon_slug = response['deviner'][j]['slug']

        var deviner_item = `
        <div class="suggestion-recherche " onclick=redirectRayonFromLaisserDevier('/rayon/${id_rayon}/${rayon_slug}','${id_produit}')>
            <p>${response['deviner'][j]['libelle']}</p>
        </div>
            `
        $('#laissez-deviner-inrayon').append(deviner_item)

        }
        }
        }
        })
        
    })
    
})

/**
 * Afficher ou cacher un bloque de la page
 * @param elementId
 * @param trigger
 * @param triggerElement
 */
function toggleShowElement(elementId) {

    let box = $(elementId)
    let box1_2_3 = $('.box, .box-2, .box-3');
    box1_2_3.not(box).hide()
    box1_2_3.not(box).addClass('is-hidden')

    if (box.hasClass('is-hidden')){

        if (elementId == '#rayon-filter-menu') {
            $('.tirer-logo').addClass('active-tirer-logo')
        }

        box.removeClass('is-hidden')
        box.slideDown(100)

    } else {

        if (elementId == '#rayon-filter-menu') {
            $('.tirer-logo').removeClass('active-tirer-logo')
        }

        box.slideUp(100);
        box.addClass('is-hidden');
    }

    if (elementId == '#notification-box') {
        $.ajax({
            type: 'GET',
            url: '/count_marchand_commandes',
            data: {},
            success: function(response) {
            console.log('Voici la reponse => ', response)
            $('#notification-panel-box-container').empty()
            if (response.length > 0) {
                for (let i = 0; i < response.length; i++) {
                    var commande_item = `
                    <div class="une-notification" onclick="showCommandeDetail('${response[i]['id']}', '${response[i]['ref_commande']}')">
                    <div class="une-notification-content">
                        <div class="notification-logo">
                            <img src="/assets/images/favicon.svg" alt="">
                        </div>
                        <div class="notification-information">
                            <div class="notification-information-message-title">
                                <p class="p-0 m-0">Vous avez une nouvelle commande</p>
                                <div class="puce puce-danger"></div>
                            </div>
                            <div class="notification-information-message-text">
                                <p class="p-0 m-0">Vous avez une nouvelle commande veillez la traiter svp!.</p>
                            </div>
                            <div class="notification-information-message-time">
                                <p class="p-0 m-0">${response[i]['duree']}</p>
                            </div>
                        </div>

                        <div class='notification-icon icon-notification-warning'>
                            <i class='far fa-clock color-warning'></i>
                        </div>

                    </div>
                </div>
                    `
                $('#notification-panel-box-container').append(commande_item)
                $('#danger_puce_elemnet_id').addClass('field-none')
                }
            }else {
                $('#marchand-commande-counter_id_1').css('background-color', 'transparent')
                $('.marchand-commande-counter').css('background-color', 'transparent')
            }

            }
        })

    }

}

showModal = (element) => {
    let id = $(element).attr('data-bs-target')
    console.log(id)
    $(id).trigger('focus')
}

function ouverture(element) {
    let i = 0;
    let imgLink
    let interval
    interval = setInterval(()=>{
        imgLink = '/assets/vitrines/fenetre_' + i + '.webp';
        console.log('ouverture : ' +imgLink)
        $(element).attr('src', imgLink);
        i++
        if (i > 11){
            clearInterval(interval)
        }
    }, 70)
}

function fermeture(element) {
    if (!$(element).attr('src') != '/assets/vitrines/fenetre_0.webp') {
        j = 11
        let interval2
        interval2 = setInterval(() => {
            imgLink = '/assets/vitrines/fenetre_' + j + '.webp';
            console.log('fermeture : ' + imgLink)
            $(element).attr('src', imgLink);
            j--
            if (j < 1){
                clearInterval(interval2)
            }
        }, 70)
    }
}

/**
 *
 *
 * @param url
 * @param data
 * @param type
 * @param formKey
 * @returns {Promise<*>}
 */
async function ajax(url, data, type, formKey='') {
    try {
        result = await $.ajax({
            headers: {'X-CSRF-TOKEN': data._token},
            url: url,
            type: type,
            data: data,
            dataType: 'json'
        });
        return result
    }
    catch (retour) {
        error(retour, formKey)
    }
}

/**
 *
 *
 * @param url
 * @param data
 * @param type
 * @param formKey
 * @returns {Promise<*>}
 */
function ajax2(url, data, type, formKey='') {
    try {
        result = $.ajax({
            headers: {'X-CSRF-TOKEN': data._token},
            url: url,
            type: type,
            data: data,
            dataType: 'json'
        });
        return result
    }
    catch (retour) {
        error(retour, formKey)
    }
}

function error(retour, formKey) {
    if (retour && retour.responseJSON && retour.responseJSON.errors){
        $.each(retour.responseJSON.errors, function (key, value) {
            $.each(value, function (key2, value2) {
                $('#' + formKey + key + '-error').append('<img src="../assets/images/warning-icon.svg"><span>'+value2+'</span>');
                $('#' + formKey + key + '-input').addClass('input-bg-danger')
            })
        })
    }
}

function countDownInscription() {  //compter des seconds
	var inscription_timer = document.getElementById('inscription_timer');

	if (inscription_count > 0) {
		inscription_count --;
		inscription_timer.innerHTML = "Vous n'avez pas reçu de code ? <br> Veillez patienter "+ inscription_count +"s avant de demander un autre code"; // Timer Message
		inscription_timer.innerHTML += '<img style="margin-left: 5px" width="13px" src="/assets/images/tm-reload.svg">'

		setTimeout("countDownInscription()", 1000);
	}else {

		$('#resendCodeBtnInscription').removeClass('disabled-btn-element');
		$('#resendCodeBtnInscription').prop('disabled', false);
		$('#coloredReloadBtnInscription').removeClass('input-none')
		$('#disabledReloadBtnInscription').addClass('input-none');
		$('#inscription_timer').addClass('input-none')

	}
}

function countDownInscription1() {
    $('#inscription_timer').removeClass('input-none')
	var inscription_timer = document.getElementById('inscription_timer');

	if (inscription_count1 > 0) {
		inscription_count1 --;
		inscription_timer.innerHTML = "Vous n'avez pas reçu de code ? <br> Veillez patienter "+ inscription_count1 +"s avant de demander un autre code"; // Timer Message
		inscription_timer.innerHTML += '<img style="margin-left: 5px" width="13px" src="/assets/images/tm-reload.svg">'

		setTimeout("countDownInscription1()", 1000);
	}else {

		$('#resendCodeBtnInscription').removeClass('disabled-btn-element');
		$('#resendCodeBtnInscription').prop('disabled', false);
		$('#coloredReloadBtnInscription').removeClass('input-none')
		$('#disabledReloadBtnInscription').addClass('input-none');
		$('#inscription_timer').addClass('input-none')

	}
}

function sendToInfoBip (new_user_number_phone, code_verification) {
    var settings = {
    "url": "https://zjzrlx.api.infobip.com/sms/2/text/advanced",
    "method": "POST",
    "timeout": 0,
    "headers": {
        "Authorization": "App 388a4474b975e04e70e8eef8545a8900-de552553-9817-439c-ab57-a618f6dfa657",
        "Content-Type": "application/json",
        "Accept": "application/json"
    },

    "data": JSON.stringify({
    "messages": [
        {
            "destinations": [
                {
                    "to": '+241'+new_user_number_phone
                }
            ],
            "from": "InfoSMS",
            "text": "Salut voici votre code de confirmation toulemarket: TM-"+code_verification
        }
      ]
     }),
    };

    $.ajax(settings).done(function (response) {
        console.log('Retour infos bip here', response);
    });

}

function success(retour, formKey, reload = true){
    
    if(reload) loaderToggle(formKey, 0);

    if (retour[0].error == 0){

        if (retour[0].reInit && retour[0].reInit.active == 1){
            ajax(retour[0].reInit.url, {_token: retour[0].reInit._token},'post')
        }
        
        if (retour[0].redirect && retour[0].redirect.active == 1){

            let isvalid = ValidateEmail(retour[0].email)
            let numberOnly = isNumberOnly(retour[0].email)

            if (isvalid) {
                $('#inscription_code_number_phone').val(retour[0].email)
                $('#inscription-mail-preview').text(retour[0].email)
                
                countDownInscription();

                $('#registerLoginModal .close-btn').click()
                $('.modal-backdrop').remove() // removes the grey overlay.
                $('#modalVerificationNumero').show()
        // if (retour[0].redirect.url) window.location = retour[0].redirect.url; else location.reload();
            }else if(numberOnly) {

                var number_phone = $('#formRegister_email-input').val();
                $('#inscription_code_number_phone').val(number_phone)

                $('#inscription-number-phone-preview').text(number_phone)
                $('#inscription-mail-preview').text(number_phone)

                var new_user_number_phone = number_phone.substring(1); // Removes the first character validation_code

                sendToInfoBip(new_user_number_phone, retour[0].validation_code)

                countDownInscription();

                $('#registerLoginModal .close-btn').click()
                $('.modal-backdrop').remove() // removes the grey overlay.
                $('#modalVerificationNumero').show()

            }else {
                if (retour[0].redirect.url) window.location = retour[0].redirect.url; else location.reload();
            }

        }

        else if(reload) location.reload();
        
        else{
            formOrLoader2(formKey);
            endLoad(formKey)
        }
    }else{
        let retErrText = retour[0].text + '\n' + retour[0].data
        $('#' + formKey + 'form').removeClass('d-none');
        $('#' + formKey + 'form-loader').addClass('d-none');
        if (retour[0].error == 2){
            showFormMainError(formKey)
            endLoad(formKey)
}else if(retour[0].error == 3) {
            console.log('Nous sommes dans la section adresse non vérifié')
            // $('#inscription_code_number_phone').val(retour[0].email)
            // $('#inscription-mail-preview').text(retour[0].email)
            $('#registerLoginModal .close-btn').click()
            $('.modal-backdrop').remove() // removes the grey overlay.
            $('#modalVerificationNumero').show()
        }

    }

    if (retour[0].message && retour[0].message.to){
        $(retour[0].message.to).html(retour[0].message.str)
        setTimeout(()=>{
            $(retour[0].message.to).html('')
        }, 1000)
    }
    
}


function showFormMainError(formKey) {
    $('#'+ formKey +'main-error').removeClass('d-none');
}

function hideFormMainError(formKey) {
    $('#'+ formKey +'main-error').addClass('d-none');
}

function keyPress (e) {
    if(e.key === "Escape") {
        console.log('Echap pressed');
    }
}

function hideSectionRecherche() {
    $('#section-recherche').fadeOut(300);
    $('.hide-for-search').css({
        'opacity': '1'
    });

    var zone_recherche = document.getElementById('main-search-field')
    zone_recherche.style.marginTop = '0px'
    $('#main-search-field').css({
        'z-index': '1',
        'position': 'relative',
        'margin-top': '0px'
    })

    $('#clean-main-search-text-id').addClass('d-none')
    $('#ma-recherche').val("");
    $('#seach-resultat').empty()

    if(!$('#val-image-libelle-1').hasClass('d-none')) {
        $('#val-image-libelle-1').addClass('d-none')
    }

    $('#main-search-field').css('margin-top', '0px')

}

function showSectionRecherche() {
    console.log('Great plac')
    // window.scrollTo(0, 0);
    // $("#search-block-logo").addClass(".search-block-logo-add")
    var telephone_size_media_query = window.matchMedia("(max-width: 500px) ");

    if (telephone_size_media_query.matches) {
        $('#main-search-field').css('margin-top', '-68px')
    }

    $('#section-recherche').fadeIn(500);
    $('.hide-for-search').css({
        'opacity': '0.2'
    });

    $('#main-search-field').css({
        'z-index': '11',
        'position': 'absolute'
    })
    $.ajax({
        type: 'GET',
        url: '/get_deviner_product',
        success: function(response) {
            console.log('Votre retour est:', response)

            $('#resulat-deviner-product').empty()
            $('.historique-recherche-container').empty()

            var historique_prod = JSON.parse(localStorage.getItem('cached_product'));

            if (response['historique'].length > 0) {
                var historique_user = response['historique']
                for (let v = 0; v < historique_user.length; v++) {
                    var p_historique = `
                    <div class="d-flex justify-content-center historique-recherche-items" id="user_historique_item_${v}" data-id="${historique_user[v]['id']}">
                        <div class="text-historique-recherche" style="padding-top: 2px">
                            <span>${historique_user[v]['libelle']}</span>
                        </div>
                        <div class="icon-historique-recherche supp-historique-icon" onclick="deletefromStorage(${v})">
                            <img src="/assets/images/Ferme2.svg" alt="">
                        </div>
                    </div>
                    `
                    $('.historique-recherche-container').append(p_historique)
                }
            }else if (response['historique'].length == 0) {
                console.log('User not connected')
                console.log('Autre est là:', historique_prod)
                if (historique_prod == null) {
                    console.log('Local storage is null too')
                }else {
                    for (let v = 0; v < historique_prod.length; v++) {
                    var p_historique = `
                    <div class="d-flex justify-content-center historique-recherche-items" id="user_historique_item_${v}" data-id="00">
                        <div class="text-historique-recherche" style="padding-top: 2px">
                            <span>${historique_prod[v]['libelle']}</span>
                        </div>
                        <div class="icon-historique-recherche supp-historique-icon" onclick="deletefromStorage(${v})">
                            <img src="/assets/images/Ferme2.svg" alt="">
                        </div>
                    </div>
                    `
                    $('.historique-recherche-container').append(p_historique)

                }
                }

            }

            for (let j = 0; j < response['deviner'].length; j++) {

                var id_produit = response['deviner'][j]['id']
                var id_rayon = response['deviner'][j]['id_rayon']
                var rayon_slug = response['deviner'][j]['slug']

                var deviner_item = `
                <div class="suggestion-recherche " onclick=redirectRayonFromLaisserDevier('/rayon/${id_rayon}/${rayon_slug}','${id_produit}')>
                    <p>${response['deviner'][j]['libelle']}</p>
                </div>
                    `
                $('#resulat-deviner-product').append(deviner_item)
            }

        }
    })

    // $('#search-block-logo').css({
    //     'position': 'sticky',
    //     'bottom': '0px',
    // });

    // $('.search-bolck-logo').css({
    //     'z-index':'200',
    // })

    // $('#search_fixed_img').addClass('tm_logo_adder')

    // $('.search-bolck-logo').css({
    //     'z-index':'200',
    // })

    setTimeout(function(){

        window.scrollTo(0, 0);
        document.body.scrollTop = 0;
        const bodyElement = document.body;
        // Set the overflow property to "hidden"
        bodyElement.style.overflow = "auto";

    }, 100);
}

function removeFocusOnelement() {
    var inputSearch = document.getElementById('ma-recherche')
    inputSearch.blur();
}

function redirectRayonFromLaisserDevier(rayonLink, id_produit) {
    localStorage.setItem('searched_product', JSON.stringify(id_produit))
    window.location.href = rayonLink
}


function paysChanged(element, select_id) {
    $($(element).attr('data-btnId')).attr('disabled', true)
    ajax($(element).attr('data-url'), {_token: $(element).attr('data-csrf'), pays_id: $(element).val()}, 'post', $(element).attr('data-form-key'))
        .then(function (retour) {
            $(select_id).html(retour.options)
            if (retour.disabled) disabledInput(select_id); else unDisabledInput(select_id);
            $($(element).attr('data-btnId')).attr('disabled', false)
            marcherChanged();
        })
        .catch(function (retour) {
            console.log(retour);
        })
}

function loadOccasion(element) {
    // let type = $(element).attr('data-active');
    // let key = $(element).attr('data-key');
    // let url = $(element).attr('data-url');

    // if (type == 1) {
    //     occasionActif();
    //     ajax(url, {_token: key, type: type}, 'post')
    //         .then(function (retour) {
    //             if (retour[0].error == 0) {
    //                 $('.un-univers').each(function (key, value) {
    //                     if (!(retour[0].univerIds).includes($(value).attr('id'))) {
    //                         $($(value).parent()).addClass('d-none')
    //                     }
    //                 })
    //                 $(element).attr('data-active', 0)
    //             }
    //             else {
    //                 occasionDesActif();
    //             }
    //         })
    //         .catch(function (retour) {
    //             occasionDesActif();
    //         })
    // }
    // else{
    //     setTimeout(()=>{
    //         $(element).attr('data-active', 1)
    //         $('.un-univers').each(function (key, value){
    //             $($(value).parent()).removeClass('d-none')
    //         });
    //         occasionDesActif();
    //     }, 1000)
    // }

    // setTimeout(()=>{
    //     $('.close-loader-modal').click();
    // }, 1000)

}

function occasionActif() {
    $('#occasion-icon').addClass('d-none')
    $('#occasion-spinner').removeClass('d-none')
    $('.icon-accasion').css({
        backgroundColor: 'rgb(208, 208, 208)',
    });
    $('.main-header-occasion-text').css({
        color: '#191970'
    })
}

function occasionDesActif() {
    $('#occasion-icon').removeClass('d-none')
    $('#occasion-spinner').addClass('d-none')
    $('.icon-accasion').css({
        backgroundColor: '#ffffff',
    });
    $('.main-header-occasion-text').css({
        color: '#9B9B9B'
    })
}

dropdownList = function(element){
    let div = $('.added-element');

    let element2 = $(element)

    $('.rayon-nav-univers-dropdown').not(element).each(function (key, value) {
        $(value).attr('data-opened', 0);
        $(value).parent('div').removeClass('rayon-open')
        $(value).parent('div').addClass('rayon-close')

    })

    if (element2.attr('data-opened') && element2.attr('data-opened') == 1){

    }
    else{

        element2.parent('div').addClass('rayon-open')
        element2.parent('div').removeClass('rayon-close')
        let token = $('#public-token').val();
        let univerId = element2.attr('data-univers')
        let url = $('#load-menu-url').val() +'/'+ univerId;
        element2.attr('data-opened', 1)
        let position = element2.offset();
        let top = position.top + 37;
        let monLeft = position.left - 1;
        let width = element2.width() + 2;
        let str = "<div id='rayon-menu' class='rayon-menu' style='border-top: 1px solid #191970; position: absolute; top: 147.5px; left: "+ monLeft +"px; width: "+ width +"px; z-index: 10'>" +
                        "<div class='load-rayon-menu'>" +

                        "</div>" +
                  "</div>";
        div.html(str);
        $('#rayon-nav-univer-show-'+ univerId).addClass('d-none')
        $('#rayon-nav-univer-hide-'+ univerId).removeClass('d-none')
        query = ajax(url, {_token: token}, 'post', '')
        query.then(function (retour) {
            $('#rayon-menu').html(retour[0])
        });
    }
}

blurList = function () {
    $('.rayon-nav-univers-dropdown').each(function (key, value) {
        $(value).attr('data-opened', 0);
    })
    $('.added-element').html('');
}

nextRayon = function(){
    $('#etageres-next-btn').click();
    $('#etageres-next-btn1').click();
    $('#etageres-next-btn2').click();
    $('#etageres-next-btn3').click();
    $('#etageres-next-btn4').click();
    deZoom();
}

prevRayon = function(){
    $('#etageres-prev-btn').click()
    $('#etageres-prev-btn1').click()
    $('#etageres-prev-btn2').click()
    $('#etageres-prev-btn3').click()
    $('#etageres-prev-btn4').click()
    deZoom()
}

deZoom = function () {
    $('.rayon .owl-stage-outer .owl-stage .owl-item.active').each(function(index, element){
        if (index !== 0 && index !== 4) {
            $(element).addClass('d-zoom');
        }
        else {
            $(element).removeClass('d-zoom');
        }
    });
}

closeDropdown = function () {
    $('.rayon-nav-univers-dropdown').each(function (key, value) {
        $(value).attr('data-opened', 0);
        $(value).parent('div').removeClass('rayon-open')
        $(value).parent('div').addClass('rayon-close')
    });
    $('.added-element').html('');
}

showRayonFilterMenu = function () {
    $('#rayon-filter-menu').slideDown(100)
}

closeRayonFilterMenu = function () {
    $('#rayon-filter-menu').slideUp(100)
}

toggleRayonFilterMenu = function (element) {
    let monElement = $(element);
    let opened = monElement.attr('data-opened')

    if (opened && opened == 1){
        closeRayonFilterMenu()
        monElement.attr('data-opened', 0);
    }
    else {
        showRayonFilterMenu();
        monElement.attr('data-opened', 1);
    }
}

openResultBloc = function () {
    $('#rayon-search-results-bloc').slideDown(100)
}

openPartageResultBloc = function () {
    $('#partage-search-results-bloc').slideDown(100)
}

closeResultBloc = function () {
    $('#rayon-search-results-bloc').slideUp(100)
    $('#partage-search-results-bloc').slideUp(100)
    $('#formRayonSearch_text-input').blur();
}


/**
 * Model de résultat de la recherche
 * @param resultat
 * @param searchStr
 * @returns {string}
 */
function modelRecherche2(resultat, searchStr = null, in_rayon) {
console.log('la valeur flag du rayon est:', in_rayon)
    var rayon_id =  resultat.sous_categorie.famille.rayon.id;
    var rayon_slug = resultat.sous_categorie.famille.rayon.slug

    if (in_rayon == '1') {
    return "<div class='produit-recherche-2'>\n" +
        "        <div class='d-flex justify-content-start'>\n" +
        "            <div class='icon-recherhce'><img src='../../assets/images2/Recherche.svg' alt=''></div>\n" +
        "            <div class='text-recherche' onclick=showRecapProduitSearched('"+resultat.id+"') style='display: flex;align-items: center;'>\n" +
        "                <p class='p1 p-0 m-0'>"+ boldString(resultat.libelle, searchStr) + " <span class='result-text'>dans <a href='#' onclick=redirectRayon('/rayon/"+rayon_id+"/"+rayon_slug+"')>"+ resultat.sous_categorie.famille.rayon.univer.libelle +"</a></span></p>\n" +
        "            </div>\n" +
        "        </div>\n" +
        "    </div>\n" +
        "</div>"
    }else if (in_rayon == '0') {
        return "<div class='produit-recherche-2' >\n" +
        "        <div class='d-flex justify-content-start'>\n" +
        "            <div class='icon-recherhce'><img src='../../assets/images2/Recherche.svg' alt=''></div>\n" +
        "            <div class='text-recherche ' onclick=onclick=redirectRayonFromMain('/rayon/"+rayon_id+"/"+rayon_slug+"','"+resultat.id+"')  style='display: flex;align-items: center;'>\n" +
        "                <p class='p1 p-0 m-0 ' >"+ boldString(resultat.libelle, searchStr) + " <span class='result-text'>dans <a href='#' >"+ resultat.sous_categorie.famille.rayon.univer.libelle +"</a></span></p>\n" +
        "            </div>\n" +
        "        </div>\n" +
        "    </div>\n" +
        "</div>"
    }


}

function modelRecherche3(resultat, searchStr = null, in_rayon) {
    
    console.log('Le resultat est bien => ', resultat )
    var rayon_id =  resultat.sous_categorie.famille.rayon.id;
    var rayon_slug = resultat.sous_categorie.famille.rayon.slug

    if (in_rayon == '1') {
    return "<div class='produit-recherche-2'>\n" +
        "        <div class='d-flex justify-content-start'>\n" +
        "            <div class='icon-recherhce'><img src='../../assets/images2/Recherche.svg' alt=''></div>\n" +
        "            <div class='text-recherche' onclick=showRecapProduitSearched('"+resultat.id+"') style='display: flex;align-items: center;'>\n" +
        "                <p class='p1 p-0 m-0'>"+ boldString(resultat.libelle, searchStr) + " <span class='result-text'>dans <a href='#' onclick=redirectRayon('/rayon/"+rayon_id+"/"+rayon_slug+"')>"+ resultat.sous_categorie.famille.rayon.univer.libelle +"</a></span></p>\n" +
        "            </div>\n" +
        "        </div>\n" +
        "    </div>\n" +
        "</div>"
    }else if (in_rayon == '0') {
        return "<div class='produit-recherche-2' style='font-size: 10px'>\n" +
        "        <div class='d-flex justify-content-start'>\n" +
        "            <div class='icon-recherhce'><img src='../../assets/images2/Recherche.svg' alt=''></div>\n" +
        "            <div class='text-recherche' onclick=onclick=redirectRayonFromMain('/rayon/"+rayon_id+"/"+rayon_slug+"','"+resultat.id+"')  style='display: flex;align-items: center;'>\n" +
        "                <p class='p1 p-0 m-0'>"+ boldString(resultat.libelle, searchStr) + "</p>\n" +
        "            </div>\n" +
        "        </div>\n" +
        "    </div>\n" +
        "</div>"
    }

}

rayonSearch = function (url, element) {
    let str = '';
    let text = $(element).val();
    if (text && text.length > 1){
        let token = $('#public-token').val();

        data = {
            _token: token,
            value: text
        }

        ajax2(url, data, 'post')
            .then(function (retour) {
                console.log('Retour recherche est:', retour)
                if (retour[0] && retour[0].resultats.length > 0){
                    $.each(retour[0].resultats, function (key, value) {
                        str += modelRecherche2(value, text, retour[0].in_rayon);
                    })
                    $('#rayon-search-results-bloc #search-results').html(str)
                }
                else{
                    str = "<div class='not-result-found'>\n" +
                          "    <div>Aucun résultat trouvé</div>\n" +
                          "</div>"
                    $('#rayon-search-results-bloc #search-results').html(str)
                }
            })
    }
}

function rechercheBySubmit(input_val) {
    $.ajax({
    type: 'POST',
    url: '/general_searched_result',
    data: {value: input_val},
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    },
    success: function(response) {

        localStorage.setItem('searched_product', JSON.stringify(response.id))
        var redirect_ur = '/rayon/'+response.id_rayon+'/'+response.slug+''
        window.location.href = redirect_ur

    }
    })
}

rayonSearch_mobile = function (url, element) {

    if ($(element).val().length<=0) {
        $('.search-result-blocd').slideUp("fast")
    }else {
        $('.search-result-blocd').slideDown("fast")
    }

    let str = '';
    let text = $(element).val();
    if (text && text.length > 1){

    let token = $('#public-token').val();

    data = {
        _token: token,
        value: text
    }

    ajax2(url, data, 'post')
    .then(function (retour) {

    if (retour[0] && retour[0].resultats.length > 0){
        $.each(retour[0].resultats, function (key, value) {
            str += modelRecherche3(value, text, 0);
        })
        $('#search-results-mobile').html(str)
    }else{
        str = "<div class='not-result-found'>\n" +
                "    <div>Aucun résultat trouvé</div>\n" +
                "</div>"
        $('#search-results-mobile').html(str)
    }

    })
    }
}

mobile_rayonSearch = function (url, element) {
    let str = '';
    let text = $(element).val();
    if (text && text.length > 1){

    let token = $('#public-token').val();

    data = {
        _token: token,
        value: text
    }

    ajax2(url, data, 'post')
    .then(function (retour) {
    console.log('Retour recherche est:', retour)
    if (retour[0] && retour[0].resultats.length > 0){
        $.each(retour[0].resultats, function (key, value) {
            str += modelRecherche2(value, text, retour[0].in_rayon);
        })

        console.log('Here is the data to load in mobile => ', str)

        $('#search-results-mobile').html(str)
    }
    else{
        console.log('Here is the data to load in mobile => ', str)
        str = "<div class='not-result-found'>\n" +
                "    <div>Aucun résultat trouvé</div>\n" +
                "</div>"
        $('#search-results-mobile').html(str)
    }
    })
    }
}

function fermer_login_register () {
    $("#registerLoginModal").modal('hide');
}
function redirectRayon(redirectRayon) {
    window.location.href = redirectRayon
}


function forgetPassword(source) {
    if (source == 0) {
        $('#pwd_modification_source').val(source)
        $('#registerLoginModal .close-btn').click()
        $('.modal-backdrop').remove() // removes the grey overlay.

        $('#exampleModal_pwd').modal({
            backdrop: 'static',
            keyboard: false
        })

        $('#exampleModal_pwd').modal('show');

    }else if(source == 1) {
        $('#pwd_modification_source').val(source)
        $('#inviteRegisterLoginModal').modal('hide')

        $('#exampleModal_pwd').modal({
            backdrop: 'static',
            keyboard: false
        })

        $('#exampleModal_pwd').modal('show');
    }

}


function deletefromStorage(id_produit) {

    let id_produit1 = $('#user_historique_item_'+id_produit).attr('data-id')
    console.log('id prod:', id_produit1)

    if (id_produit1 == '00') {
        var historique_prod = JSON.parse(localStorage.getItem('cached_product'));
        historique_prod.splice(id_produit, 1);
        localStorage.removeItem("cached_product");
        $('#user_historique_item_'+id_produit).remove();
        localStorage.setItem('cached_product', JSON.stringify(historique_prod));
    }else {
    $.ajax({
        type: 'POST',
        url: '/delete_from_history',
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        data: {id_produit: id_produit1},

        success: function(response) {
            if (response == 1) {
                $('#user_historique_item_'+id_produit).remove();
            }
            // console.log('Delete response here:', response)
        }

    })
    }

}



function showRecapProduitSearched(id) {

    var product_container_zone = document.getElementById('main-rayon-container-'+id_responsive_rayon).offsetHeight
    var window_width_media_query = $(window).width();
    console.log('La valeur actuelle est bien => ', init_product_col_number, 'Et la pagination est à ', page )
    showRecapProduitMarchandTV(id)
    $.ajax({

    type: 'GET',
    url: '/get_searched_product_cat/' + id + '/' + init_product_col_number + '/?page=' + page,
    data: {},
    success: function(response) {

    $('.slider-content-wrapper-user').empty()
    var data_product = response.famille_produit;
    rayon_default_categorie = response.famille_id
    $('.rayon-nav-univers-dropdown').removeClass('rayon-nav-univers-dropdown-activated')
    $('#flle-item-'+rayon_default_categorie).addClass('rayon-nav-univers-dropdown-activated')

    showProductByScreenSite(id_responsive_rayon, data_product.data, init_product_col_number)

    $('#image-prod-id'+id).addClass('produit-show-effect')

    }
    })
}

function showRecapProduitSearchedFromMainPage(id) {
    var product_container_zone = document.getElementById('main-rayon-container-'+id_responsive_rayon).offsetHeight
    var window_width_media_query = $(window).width();
    
    var searched_product = JSON.parse(window.localStorage.getItem('searched_product'));

    console.log('Here is the element ', id)

    // var searched_product_global = JSON.parse(window.localStorage.getItem('searched_product_global'));
    if (searched_product != null) {
        showRecapProduitMarchandTV(id)
    }

    $.ajax({

    type: 'GET',
    url: '/get_searched_product_cat/' + id + '/' + init_product_col_number + '/?page=' + page,
    data: {},
    success: function(response) {

    $('.slider-content-wrapper-user').empty()
    var data_product = response.famille_produit;
    rayon_default_categorie = response.famille_id
    $('.rayon-nav-univers-dropdown').removeClass('rayon-nav-univers-dropdown-activated')
    $('#flle-item-'+rayon_default_categorie).addClass('rayon-nav-univers-dropdown-activated')
    
    var mobile_size = matchMedia("(max-width: 500px)");

    if (mobile_size.matches) {
        // setValuesMobile()
        showProductByScreenSiteMobile(id_responsive_rayon, data_product.data, rayon_default_categorie, init_product_col_number)
        $('#image-prod-id'+id).addClass('produit-show-effect')
    } else {
        showProductByScreenSite(id_responsive_rayon, data_product.data, rayon_default_categorie, init_product_col_number)
        $('#image-prod-id'+id).addClass('produit-show-effect')
    }

    },
    complete: function() {
        setTimeout(function() {
            window.localStorage.removeItem('searched_product')
            window.localStorage.removeItem('searched_product_global')
        }, 5000)
    }
    })
}


function showCommandeDetail(id_commade, ref_commande) {

    let info_commande = {
        id_commande: id_commade,
        ref_commande: ref_commande,
    }
    window.localStorage.setItem('data_commande', JSON.stringify(info_commande));
    window.location.href = "/acceuil-marchand-marchand"

}

function checkVerificationCodeInscription() {

    var phone_code = $('#inputCodeVerificationInscription').val()
    var num_phone = $('#inscription_code_number_phone').val();

    console.log('Here is data before send => ', phone_code, 'and => ', num_phone)

    $.ajax({
        type: 'POST',
        url: '/phone_validation',
        data: {
            phone_code: phone_code,
            phone_number: num_phone
        },
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        success: function(data_verification) {
            if (data_verification.error == 0) {

                $('#formRegister_prenom-input').val(' ');
                $('#formRegister_nom-input').val(' ')
                $('#formRegister_email-input').val(' ')
                $('#formRegister-passwordRegister').val(' ');
                $('#formLogin-registerLogin').val(' ')

                $('#inscription_1').find('.login-register-btn').addClass('button-mute');
                $('#inscription_1').find('.login-register-btn').removeClass('actif');

                $('#connexion_1').find('.login-register-btn').removeClass('button-mute');
                $('#connexion_1').find('.login-register-btn').addClass('actif');
                // $('#'+ $(value).attr('data-panel')).addClass('d-none')
                $('#form-inscription').addClass('d-none')
                $('#form-connexion').removeClass('d-none')

                $('#login-register-btn').attr('data-for', 'form-connexion-btn')

                $('#login-register-btn').text('Se connecter')

                $('#modalVerificationNumero').hide()
                $('#registerLoginModal').modal('show')
                // location.reload()
            }else if(data_verification.error == 1) {
                $('#phone-verification-erreur_inscription').removeClass('input-none')
            }
            console.log('Retour vérification => ', data_verification)
        }

    })
}

function closePhoneValidationModal() {
    $('#modalVerificationNumero').hide()
    location.reload()
}

function resendValidationCode() {

    var randomFourDigitNumber = Math.floor(1000 + Math.random() * 9000);
    var num_phone = $('#inscription_code_number_phone').val();

    let isvalid = ValidateEmail(num_phone)
    let numberOnly = isNumberOnly(num_phone)

    if (numberOnly) {
        
    if (inscription_count1 === 0) {
        inscription_count1 = 30
        countDownInscription1();
        console.log('Ici on serai dans timer 1')
    }else{
        console.log('Ici ausii on serai dans timer 1')
        countDownInscription1();
    }

    var new_user_number_phone = num_phone.substring(1); // Removes the first character

    var settings = {
        "url": "https://zjzrlx.api.infobip.com/sms/2/text/advanced",
        "method": "POST",
        "timeout": 0,
        "headers": {
            "Authorization": "App 388a4474b975e04e70e8eef8545a8900-de552553-9817-439c-ab57-a618f6dfa657",
            "Content-Type": "application/json",
            "Accept": "application/json"
        },
        "data": JSON.stringify({
            "messages": [
                {
                    "destinations": [
                        {
                            "to": "+241"+new_user_number_phone
                        }
                    ],
                    "from": "InfoSMS",
                    "text": "Salut voici votre code de confirmation toulemarket: TM-"+randomFourDigitNumber
                }
            ]
        }),
    };

    $.ajax(settings).done(function (response) {
        console.log(response);
    });

    $.ajax({

    method: 'POST',
    url: '/update_user_validation_code',
    data: {
        num_code: randomFourDigitNumber,
        phone_number: num_phone
    },
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    },
    beforeSend: function() {
        $('#sms_spiner-resend').addClass('spinner-border')
        $('#coloredReloadBtnInscription').addClass('input-none')
        $('#disabledReloadBtnInscription').addClass('input-none')
    },
    success: function(response) {
        console.log('New code has been sent checkout your phone number', response)
    },

    complete: function() {
        $('#resendCodeBtnInscription').addClass('disabled-btn-element');
        $('#resendCodeBtnInscription').prop('disabled', true)
        $('#coloredReloadBtnInscription').addClass('input-none')
        $('#disabledReloadBtnInscription').removeClass('input-none')
        $('#phone-verification-erreur_inscription').addClass('input-none')
        $('#sms_spiner-resend').removeClass('spinner-border')
    }

    })
    }else if(isvalid) {
        console.log('Nous devons renvoyer le code par mail => ', num_phone)
        $.ajax({
            type: 'POST',
            url: '/resend_email_validation_code',
            data: {email: num_phone},
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            success: function(retour) {
                console.log('Votre code retour est => ', retour)
            }
        })
    }

    // console.log('Votre email ou numero de téléphone est => ', num_phone)


}

$('#seach-resultat').on('scroll', function() {

    var url = '/main-search'
    if ($(this).scrollTop() + $(this).innerHeight() >= $(this)[0].scrollHeight) {
        skip_value = skip_value + 10;
        console.log('You realy triggered it and skip value is => ', skip_value)
        let champResultat = $('#seach-resultat');
        request = ajax(url, {_token: seached_key, value: searched_text, skip_value: skip_value}, 'post');
        request.then(function (retour) {
            console.log('La page est bien => ', skip_value)
        console.log('Le retour de la recherche est => ', retour)
        if (retour[0].error == 0 && (retour[0].resultats).length > 0) {

            $.each(retour[0].resultats, function (key, value) {

                champResultat.append(modelRecherche(value, searched_text))

            })
        } else{
            console.log('Pas de resutat supplementaire')
        }

        })
    }
})


window.fbAsyncInit = function() {
	FB.init({
		appId		: '1207420726577218',
		cookie		: true,
		xfbml		: true,
		version		: 'v16.0'
	});

	// FB.AppEvents.logPageView();
};


(function(d, s, id) {
	var js, fjs = d.getElementsByTagName(s)[0]
	if (d.getElementById(id)) {return;}
	js = d.createElement(s); js.id = id;
	js.src = "https://connect.facebook.net/en_us/sdk.js";
	fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));

function testAPI() {
                         // Testing Graph API after login.  See statusChangeCallback() for when this call is made.
    console.log('Welcome!  Fetching your information.... ');
    FB.api('/me?fields=id,name,first_name,last_name,email,picture', function(response) {
    console.log('Here is user email- => ', response.email)
      console.log('Successful login for: ' + response.name );
      console.log('And the object is => : ' + response );
      let stringObject = JSON.stringify(response);
      console.log('Here are stringifyed data => ', stringObject)

      let facebook_id = response.id;
      let facebook_name = response.name;
      let facebook_picture = response.picture.data.url;
      let first_name = response.first_name;
      let last_name = response.last_name;
      let facebook_email = response.email;

      let facebookUserObject = {
        facebook_id: facebook_id,
        facebook_firstname: first_name,
        facebook_lastname: last_name,
        facebook_name: facebook_name,
        facebook_picture: facebook_picture,
        facebook_email: facebook_email
      }

      $.ajax({
        url: '/login_with_facebook',
        method: 'POST',
        data: facebookUserObject,
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        success: function(response) {

            if (response.status == '200') {
                location.reload()
            }else {
                console.log('Une erreur est survenu => ', response)
            }

        }
      })

    });

  }

function facebook_login() {
    FB.login(function(response){
        if (response.status === 'connected') {
            console.log('Check this please => ', response)
            testAPI();
            // Logged into your webpage and Facebook.
            // console.log('La reponse de l\'utilisateur connecté est: ', response)
          } else {
            console.log('La reponse de l\'utilisateur non connecté est: ', response)
            // The person is not logged into your webpage or we are unable to tell.
          }
    }, {scope: 'public_profile,email'});
    // FB.getLoginStatut(function(response) {
    //     statusChangeCallbak(response);
    // })
}

function getElementDistanceFromWindow(element) {
    // Get the element's bounding rectangle
    const rect = element.getBoundingClientRect();

    // Calculate the distance from the element's top edge to the top of the window
    const distanceFromTop = rect.top + window.scrollY;

    return rect.top;

}

// $(document).ready(function)
window.addEventListener('scroll', function() {

    if( $("#section-recherche").css('display').toLowerCase() == 'block') {

        console.log('Here is the needed section')

        const logo_section = document.getElementById('search-block-logo');
        const distanceFromTop = getElementDistanceFromWindow(logo_section)

        const data_checker = parseInt(window.getComputedStyle(logo_section).marginTop);
        var scroll_distance = $(this).scrollTop();

        var input_margin = scroll_distance - 80 ;
        $('#main-search-field').css('margin-top', input_margin+'px')

        $(logo_section).css('margin-top', scroll_distance+'px')

    }

    document.getElementById('searchright-template').focusout()

});

document.getElementById('section-recherche').addEventListener('scroll', function() {
    // alert('You are scolling')
    console.log('You are scrolling')
})

document.body.addEventListener('scroll', function() {
    console.log('Now you are scolling here on body')
})







