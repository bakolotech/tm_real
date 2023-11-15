let curSlide = 0;
let maxSlide = 0;
// var boutique_id = 15;

// const slides2 = document.querySelectorAll(".custom-carousel-page-user");
let maxSlide1 = 0

let curSlide1 = 0;

function tm_carousel_next() {
  const slides = document.querySelectorAll(".custom-carousel-page");
    //alert('You are going to the next step now')
  maxSlide = slides.length - 1;
    if (curSlide === maxSlide) {
        // curSlide = 0;
    } else {
        curSlide++;
    }


    var all_inside_line = $(slides[curSlide]).find('.row_div-telephonie')

    var all_inside_line_tv = $(slides[curSlide]).find('.row_div')

    $(all_inside_line[0]).css({
        "position": "relative",
        "top": '-10px'
    });

    $(all_inside_line[1]).css({
        "position": "relative",
        "top": '-10px'
    });

    $(all_inside_line[2]).css({
        "position": "relative",
        "top": '-1px'
    });

    $(all_inside_line[3]).css({
        "position": "relative",
        "top": '-1px'
    });

    $(all_inside_line[4]).css({
        "position": "relative",
        "top": '15px'
    });

    $(all_inside_line_tv[0]).css({
        'position': 'relative',
        'top': '-15px'
    })


    slides.forEach((slide, indx) => {
        let offsete = - curSlide;
        slide.style.transform = `translateX(${100 * offsete}%)`;
    });
}

function tm_carousel_preview() {
    const slides = document.querySelectorAll(".custom-carousel-page");

    curSlide--;

    if (curSlide < 0) {
        curSlide = 0
    }
    // curSlide = maxSlide - 1
    console.log('Le truc courant dans le preview est:', curSlide)

    slides.forEach((slide, indx) => {
        let offsete = -curSlide;
        slide.style.transform = `translateX(${100 * offsete}%)`;
    });

}

function tm_carousel_next1_old() {

    const slides2 = document.querySelectorAll(".custom-carousel-page-user");
    maxSlide1 = slides2.length - 1

    if (curSlide1 === maxSlide1) {
        // curSlide1 = 0;
    } else {
        curSlide1++;
    }

    console.log('Le truc courant dans le next est:', curSlide1)

    slides2.forEach((slide, indx) => {
        let offsete = - curSlide1;
        slide.style.transform = `translateX(${100 * offsete}%)`;
    });

}


// ---------------------------- slide acceil -----------------------
function tm_carousel_next1() {
    lazy_loading_rayon_product(id_rayon, rayon_default_categorie, init_product_col_number)
}

function tm_carousel_next2(boutique_id) {

    lazy_loading_rayon_product_boutique_partager(boutique_id, partager_seached_rayon_val, rayon_default_categorie, init_product_col_number)
    
}

function tm_next_slide_1_section() {

    console.log('You are scrolling right => ', )
    
    const parentDiv = document.getElementById("desk-top-article-section-id");

    const slides2 = parentDiv.querySelectorAll(".custom-carousel-page-user");

    if (slides2.length > 1) {

        maxSlide1 = slides2.length - 1

        if (curSlide1 === maxSlide1) {
            // curSlide1 = 0;
        } else {
            curSlide1++;
        }

        slides2.forEach((slide, indx) => {
            let offsete = - curSlide1;
            slide.style.transform = `translateX(${100 * offsete}%)`;
        });

    }

}

function tm_carousel_preview1() {
    const slides2 = document.querySelectorAll(".custom-carousel-page-user");

    curSlide1--;

    if (curSlide1 < 0) {
        curSlide1 = 0
    }
    // curSlide = maxSlide - 1
    console.log('Le truc courant dans le preview est:', curSlide1)

    slides2.forEach((slide, indx) => {
        let offsete = -curSlide1;
        slide.style.transform = `translateX(${100 * offsete}%)`;
    });

}

function showContinentPay(idContinent) {
    var element1 = document.getElementById('continent'+idContinent+'')
    if (element1.classList.contains('s-none')) {
        element1.classList.remove('s-none')
        element1.s
    }
}

function processMouseEnter() {
    $(this).find('.add-product-button-etagere').addClass('active-product-btn-hover')
    $(this).find('.add-product-button-etagere').removeClass('not-active-product-btn-hover')
}

function processMouseLeave() {
    $(this).find('.add-product-button-etagere').addClass('not-active-product-btn-hover')
    $(this).find('.add-product-button-etagere').removeClass('active-product-btn-hover')
}

function next_btn_zone_clicked(index) {

    if ($('#newSlide'+index).find('button').hasClass('active-product-btn')) {
    $('#newSlide'+index).find('button').remove()
    let product_image = "<img src='uploads/6356952f19b3098589' alt=''>"
    $('#newSlide'+index).append(product_image);
    console.log('Nous dans une section active')

    for (let j = index + 1; j < 15; j++) {
    if ($('#newSlide'+j).find('img').length == 0) {
        $('#newSlide'+j).find('button').removeClass('not-active-product-btn')
        $('#newSlide'+j).find('button').removeClass('add-product-button-etagere')
        $('#newSlide'+j).find('button').addClass('add-product-button-etagere-active')
        $('#newSlide'+j).find('button').removeClass('not-active-product-btn-hover')
        $('#newSlide'+j).find('button').addClass('active-product-btn')
        return;
    }

    }
    }else{
        $('#newSlide'+index).find('button').remove()
        let product_image = "<img src='uploads/6356952f19b3098589' alt=''>"
        $('#newSlide'+index).append(product_image);
        console.log('Nous sommes dans le bouton non active')
    }
}

function testCurentCase(num_etagere, row_index, product_position) {
    console.log('voici le num de l etagere', num_etagere, 'La ligne =>', row_index, 'Position sur etagere =>', product_position)
    $('#numero_slide_etagere').val(num_etagere)
    $('#popupannonce-recheche').removeClass('s-none')
    $('#popupannonce-recheche').show()
    $('#searchProduitBar').focus();
    $('#position_sur_etagere').val(product_position)
    $('#numero_ligne_sur_slide').val(row_index)

    // recuperation des modes de payements
    $.ajax({
    method: 'GET',
    url: 'get_money_marchand/',
    success: function(response) {
    console.log('Les modes de payements sont présents:', response)
    if(response['status'] == 200) {
    if (response['cardInfo'].length > 0 && response['cardInfo'][0]['type_carte'] == 'Visa') {
        $('#payement-marchand-preview').text('Carte Bancaire |')
    }

    if (response['moneyInfo'].length > 0) {
    for (let v = 0; v < response['moneyInfo'].length; v++) {
    if (response['moneyInfo'][v]['type_service'] == 'airtel') {
        let span_mobile_service = "<span style ='text-transform:capitalize; margin-left: 5px'>Airtel Money</span>"
        $('#payement-marchand-preview').append(span_mobile_service)
    }else if(response['moneyInfo'][v]['type_service'] == 'moov'){
        let span_mobile_service = "<span style ='text-transform:capitalize; margin-left: 5px'>Moov Money</span>"
        $('#payement-marchand-preview').append(span_mobile_service)
    }
    }
    }
    }else if (response['status'] == 201) {
    if (response['cardInfo'].length > 0 && response['cardInfo'][0]['type_carte'] == 'Visa') {
        $('#payement-marchand-preview').text('Carte Bancaire |')
    }
    }else if (response['status'] == 202) {
    if (response['moneyInfo'].length > 0) {
    for (let v = 0; v < response['moneyInfo'].length; v++) {
    if (response['moneyInfo'][v]['type_service'] == 'airtel') {
        let span_mobile_service = "<span style ='text-transform:capitalize; margin-left: 5px'>Airtel Money</span>"
        $('#payement-marchand-preview').append(span_mobile_service)
    }else if(response['moneyInfo'][v]['type_service'] == 'moov'){
        let span_mobile_service = "<span style ='text-transform:capitalize; margin-left: 5px'>Moov Money</span>"
        $('#payement-marchand-preview').append(span_mobile_service)
    }
    }
    }
    }else{
        console.log('Désolé, vous n\avez pas de mode de paiement')
    }
       // $('#payement-marchand-preview').text(response['cardInfo'][0]['type_carte'])moneyInfo
    }
    })
    // -------------------- articles associes ------------------
}

jQuery(document).ready(function () {

    // ---------------------------- au cas ou y a pas de produit dans ce rayon onclick="showAddProduct()" --------------------
    let page_produit_init = $('#slide-p-init');
    let page_produit_telephonie = $('#slide-p-init-telephonie')
    let page_produit_informatique_tablette = $('#slide-p-init-informatique-tablette')
    let page_produit_appareillages_outils = $('#slide-p-init-appareillage-outils')
    let page_produit_cheveux = $('#slide-p-init_cheveux')

    if (page_produit_init.length > 0) {

    let page_sliders = document.getElementsByClassName('custom-carousel-page');
    let last_slider_pages = page_sliders[page_sliders.length - 1]; // last slide
    let last_slider_width = Math.ceil(last_slider_pages.getBoundingClientRect().width)
    let last_slider_row = last_slider_pages.getElementsByClassName('row_div')
    let default_etagere_num = 0 // étagère par default

    Array.prototype.forEach.call(last_slider_row, function(row_div, row_index) {
        let current_row = row_div.getElementsByClassName('slide')
        console.log('Voici chaque row:', current_row)
        let j = 0;
        while (current_row.length < 5) {
        let bouton_ajout = '<button onclick="testCurentCase('+default_etagere_num+', '+row_index+', '+j+')" class="add-product-button-etagere not-active-product-btn" button-index="1" style="position: absolute;" onclick="showAddProduct()"><span class="add-product-icon">+</span></button>'
        let div_slide = $("<div>")
        div_slide.addClass("slide");
        div_slide.attr("id", "addSlide"+default_etagere_num+'-'+row_index+'-'+j);
        div_slide.addClass("slide-add-btn");
        div_slide.addClass('init-added-button')
        div_slide.append(bouton_ajout)
        $(row_div).append(div_slide)
        j++;
        }
    });

    bouton_ajout = '<button class="add-product-button-etagere-active active-product-btn" onclick="testCurentCase()" button-index="1" style="position: absolute;" onclick="showAddProduct()"><span class="add-product-icon">+</span></button>'

    let div_slide = $("<div>")
    div_slide.addClass("slide");
    div_slide.attr("id", "addSlide0-1");
    div_slide.addClass("slide-add-btn");
    div_slide.addClass('init-added-button')
    div_slide.append(bouton_ajout)
    $('#slide-p-init').append(div_slide)
        // }
    }

    if (page_produit_telephonie.length > 0) {
    let page_sliders = document.getElementsByClassName('custom-carousel-page');
    let last_slider_pages = page_sliders[page_sliders.length - 1]; // last slide
    let last_slider_width = Math.ceil(last_slider_pages.getBoundingClientRect().width)
    let last_slider_row = last_slider_pages.getElementsByClassName('row_div-telephonie')
    let default_etagere_num = 0 // étagère par default

    console.log('dernier slide est:', last_slider_pages, 'et son width est:', last_slider_row)
    Array.prototype.forEach.call(last_slider_row, function(row_div, row_index) {
        let current_row = row_div.getElementsByClassName('slide')
        console.log('Voici chaque row:', current_row)
        let j = 0;
        while (current_row.length < 6) {
        let bouton_ajout = '<button onclick="testCurentCase('+default_etagere_num+', '+row_index+', '+j+')" class="add-product-button-etagere not-active-product-btn" button-index="1" style="position: absolute;" onclick="showAddProduct()"><span class="add-product-icon">+</span></button>'
        let div_slide = $("<div>")
        div_slide.addClass("slide");
        div_slide.attr("id", "addSlide"+default_etagere_num+'-'+row_index+'-'+j);
        div_slide.addClass("slide-add-btn");
        div_slide.addClass('init-added-button-telephonie')
        div_slide.append(bouton_ajout)
        $(row_div).append(div_slide)
        j++;
        }
    });

    bouton_ajout = '<button class="add-product-button-etagere-active active-product-btn" onclick="testCurentCase()" button-index="1" style="position: absolute;" onclick="showAddProduct()"><span class="add-product-icon">+</span></button>'

    let div_slide = $("<div>")
    div_slide.addClass("slide");
    div_slide.attr("id", "addSlide0-1");
    div_slide.addClass("slide-add-btn");
    div_slide.addClass('init-added-button')
    div_slide.append(bouton_ajout)
    $('#slide-p-init').append(div_slide)
    // }
    }

    if (page_produit_cheveux.length > 0) {
        let page_sliders = document.getElementsByClassName('custom-carousel-page');
        let last_slider_pages = page_sliders[page_sliders.length - 1]; // last slide
        let last_slider_width = Math.ceil(last_slider_pages.getBoundingClientRect().width)
        let last_slider_row = last_slider_pages.getElementsByClassName('row_div-telephonie')
        let default_etagere_num = 0 // étagère par default
    
        console.log('dernier slide est:', last_slider_pages, 'et son width est:', last_slider_row)
        Array.prototype.forEach.call(last_slider_row, function(row_div, row_index) {
            let current_row = row_div.getElementsByClassName('slide')
            console.log('Voici chaque row:', current_row)
            let j = 0;
            while (current_row.length < 6) {
            let bouton_ajout = '<button onclick="testCurentCase('+default_etagere_num+', '+row_index+', '+j+')" class="add-product-button-etagere not-active-product-btn" button-index="1" style="position: absolute;" onclick="showAddProduct()"><span class="add-product-icon">+</span></button>'
            let div_slide = $("<div>")
            div_slide.addClass("slide");
            div_slide.attr("id", "addSlide"+default_etagere_num+'-'+row_index+'-'+j);
            div_slide.addClass("slide-add-btn");
            div_slide.addClass('init-added-button-telephonie')
            div_slide.append(bouton_ajout)
            $(row_div).append(div_slide)
            j++;
            }
        });
    
        bouton_ajout = '<button class="add-product-button-etagere-active active-product-btn" onclick="testCurentCase()" button-index="1" style="position: absolute;" onclick="showAddProduct()"><span class="add-product-icon">+</span></button>'
    
        let div_slide = $("<div>")
        div_slide.addClass("slide");
        div_slide.attr("id", "addSlide0-1");
        div_slide.addClass("slide-add-btn");
        div_slide.addClass('init-added-button')
        div_slide.append(bouton_ajout)
        $('#slide-p-init_cheveux').append(div_slide)
        // }
        }

    if (page_produit_informatique_tablette.length > 0) {

    let page_sliders = document.getElementsByClassName('custom-carousel-page');
    let last_slider_pages = page_sliders[page_sliders.length - 1]; // last slide
    let last_slider_row = last_slider_pages.getElementsByClassName('row_div-informatique-tablette')
    let default_etagere_num = 0 // étagère par default

    Array.prototype.forEach.call(last_slider_row, function(row_div, row_index) {
        let current_row = row_div.getElementsByClassName('slide')

        let j = 0;
        while (current_row.length < 6) {
        let bouton_ajout = '<button onclick="testCurentCase('+default_etagere_num+', '+row_index+', '+j+')" class="add-product-button-etagere not-active-product-btn" button-index="1" style="position: absolute;" onclick="showAddProduct()"><span class="add-product-icon">+</span></button>'
        let div_slide = $("<div>")
        div_slide.addClass("slide");
        div_slide.attr("id", "addSlide"+default_etagere_num+'-'+row_index+'-'+j);
        div_slide.addClass("slide-add-btn");
        div_slide.addClass('init-added-button-informatique-tablette')
        div_slide.append(bouton_ajout)
        $(row_div).append(div_slide)
        j++;
        }
    });

    bouton_ajout = '<button class="add-product-button-etagere-active active-product-btn" onclick="testCurentCase()" button-index="1" style="position: absolute;" onclick="showAddProduct()"><span class="add-product-icon">+</span></button>'

    let div_slide = $("<div>")
    div_slide.addClass("slide");
    div_slide.attr("id", "addSlide0-1");
    div_slide.addClass("slide-add-btn");
    div_slide.addClass('init-added-button')
    div_slide.append(bouton_ajout)
    $('#slide-p-init').append(div_slide)
        // }
    }

    // Zone appareillage et outils
    if (page_produit_appareillages_outils.length > 0) {
        let page_sliders = document.getElementsByClassName('custom-carousel-page');
        let last_slider_pages = page_sliders[page_sliders.length - 1]; // last slide
        let last_slider_width = Math.ceil(last_slider_pages.getBoundingClientRect().width)
        let last_slider_row = last_slider_pages.getElementsByClassName('row_div-telephonie')
        let default_etagere_num = 0 // étagère par default

        console.log('dernier slide est:', last_slider_pages, 'et son width est:', last_slider_row)
        Array.prototype.forEach.call(last_slider_row, function(row_div, row_index) {
            let current_row = row_div.getElementsByClassName('slide')
            console.log('Voici chaque row:', current_row)
            let j = 0;
            while (current_row.length < 6) {
            let bouton_ajout = '<button onclick="testCurentCase('+default_etagere_num+', '+row_index+', '+j+')" class="add-product-button-etagere not-active-product-btn" button-index="1" style="position: absolute;" onclick="showAddProduct()"><span class="add-product-icon">+</span></button>'
            let div_slide = $("<div>")
            div_slide.addClass("slide");
            div_slide.attr("id", "addSlide"+default_etagere_num+'-'+row_index+'-'+j);
            div_slide.addClass("slide-add-btn");
            div_slide.addClass('init-added-button-telephonie')
            div_slide.append(bouton_ajout)
            $(row_div).append(div_slide)
            j++;
            }
        });

        bouton_ajout = '<button class="add-product-button-etagere-active active-product-btn" onclick="testCurentCase()" button-index="1" style="position: absolute;" onclick="showAddProduct()"><span class="add-product-icon">+</span></button>'

        let div_slide = $("<div>")
        div_slide.addClass("slide");
        div_slide.attr("id", "addSlide0-1");
        div_slide.addClass("slide-add-btn");
        div_slide.addClass('init-added-button')
        div_slide.append(bouton_ajout)
        $('#slide-p-init-appareillage-outils').append(div_slide)
        // }
    }

    $('.slide-add-btn').each(function() {
        $(this).mouseenter(function() {
            $(this).find('.add-product-button-etagere').addClass('active-product-btn-hover')
            $(this).find('.add-product-button-etagere').removeClass('not-active-product-btn-hover')
        })

        $(this).mouseleave(function() {
            $(this).find('.add-product-button-etagere').addClass('not-active-product-btn-hover')
            $(this).find('.add-product-button-etagere').removeClass('active-product-btn-hover')
        })
    })

    // traitement en cas de l'étagère remplit
    let full_data_width_bis = [];
    let full_data_width_bis1 = [];
    let full_data_width_info_reseau = [];
    let full_data_width_television = [];
    let etager_page_sliders = document.getElementsByClassName('custom-carousel-page');

    // cas de la téléphonie
    Array.prototype.forEach.call(etager_page_sliders, function(etagere_slide, row_index) {
// console.log('ici bien', etagere_slide)
        var row_slide = $(etagere_slide).find('.row_div-telephonie')
        // console.log('Voici les rows ici :', row_slide)
        Array.prototype.forEach.call(row_slide, function(row_div){
            var row_div_slide = $(row_div).find('.slide')

            Array.prototype.forEach.call(row_div_slide, function(element){
                if ($(element).attr('data-width') == 0) {
                    full_data_width_bis.push($(element).attr('data-width'))
                }else{
                    full_data_width_bis1.push($(element).attr('data-width'))
                }
            })

        })

    })

    // cas de la téléphonie
    Array.prototype.forEach.call(etager_page_sliders, function(etagere_slide, row_index) {
        // console.log('ici bien', etagere_slide)
        var row_slide = $(etagere_slide).find('.row_div')
        // console.log('Voici les rows ici :', row_slide)
        Array.prototype.forEach.call(row_slide, function(row_div){
            var row_div_slide = $(row_div).find('.slide')

            Array.prototype.forEach.call(row_div_slide, function(element){
                if ($(element).attr('data-width') == 0) {
                    full_data_width_television.push($(element).attr('data-width'))
                }
            })

        })

    })

    // var row_slide = $(etagere_slide).find('.row_div')
    let tv_image_son_row_check = document.getElementsByClassName('row_div');
    if (full_data_width_television.length == 0 && tv_image_son_row_check.length > 0) {
        var next_slider = etager_page_sliders.length;
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


    // --------------------------------------- section 1 end --------------------
    // get check if telephonie exist en passant par l'existance de leur ligne
    let check_telephonie_ligne = document.getElementsByClassName('row_div-telephonie');
    if (full_data_width_bis.length == 0 && check_telephonie_ligne.length > 0) {
    var next_slider = etager_page_sliders.length;
        // console.log('Nous sommes dans le plein de l étagère ...', slides)
        console.log('Nous sommes dans la zone spécial de création d un autre slide sur étagère')
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

    // console.log('All slides heres => ', slides)
    console.log('He should fill up and create a second slide here:', div_element)
    document.getElementsByClassName("slider-content-wrapper")[0].appendChild(div_element);

    }

    console.log('Voici les slides de ce rayon:', etager_page_sliders)

})

function startCalculate() {
    console.log('Resize start here sir')
}

var detectWrap = function(className) {
    var wrappedItems = [];
    var prevItem = {};
    var currItem = {};
    var items = document.getElementsByClassName('custom-carousel-page');
    for (let y = 0; y < items.length; y++) {
       currItem = items[i].getBoundingClientRect();
       if (prevItem && prevItem.top < currItem.top) {
            wrappedItems.push(items[i]);
       }
       prevItem = currItem;
    }
    return wrappedItems;
}


function wrapped() {
    var offset_top_prev;
    $('#slide-p0').each(function(){
    var offset_top = $(this).offset().top;
    if (offset_top > offset_top_prev) {
        $(this).addClass('wrapped');
    }else if(offset_top == offset_top_prev) {
        $(this).removeClass('wrapped');
    }

    offset_top_prev = offset_top;

    });
}

function find(needle, haystack) {
    var results = [];
    var idx = haystack.indexOf(needle);
    while (idx != -1) {
        results.push(idx);
        idx = haystack.indexOf(needle, idx + 1);
    }
    return results;
}


function detectWrapBis(node) {
    for(const container of node) {
    for(const child of container.children) {
    if (child.offsetTop > container.offsetTop) {
        child.classList.add('wrapped')
    }else{
        child.classList.remove('wrapped')
    }
    }
    }
}

// ------------------ section 3 ------------------------
var wrappers = $('.flex[class*="flex-wrap"]');
if (wrappers.length) {
    $(window).on('resize', function() {
        wrappers.each(function() {
        var prnt = $(this),
        chldrn = prnt.children(':not(:first-child)'), // select flex children
        frst = prnt.children().first();
        chldrn.each(function(i, e){
            $(e).toggleClass('flex-wrapping', $(e).offset().top != frst.offset().top);
            prnt.toggleClass('flex-wrapped', !!prnt.find('.flex-wrapped').length);
            frst.toggleClass('flex-wrapped', !!chldrn.filter(':not(.flex-wrapped)').length)
        })
        }).trigger('resize');
    })
}

// ------------------- on resize get  the last wrapped element -------------------------

$(window).on('load', function() {
    
    var first_section_div = $('#tm-main-slide-carouselF').find('.row_div-telephonie')
    $(first_section_div[0]).css({
        'position': 'relative',
        'top': '-10px'
    })

    const slides = document.querySelectorAll(".custom-carousel-page");
    var all_inside_line_tv = $(slides[0]).find('.row_div')
    $(all_inside_line_tv[0]).css({
        'position': 'relative',
        'top': '-15px'
    })

})


