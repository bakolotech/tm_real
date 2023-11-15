function lazy_loading_rayon_product(id_rayon, rayon_default_categorie, init_product_col_number) {

    var etagere_ligne_counter_bis = 0;
    var etagere_ligne_counter_bloc_3 = 0;

    const chunk = (arr, size) =>
    Array.from({ length: Math.ceil(arr.length / size) }, (v, i) =>
        arr.slice(i * size, i * size + size)
    );

    page++;

    var product_container_zone = document.getElementById('main-rayon-container-'+id_responsive_rayon).offsetHeight

    $.ajax({
    type: "GET",
    url: '/show_produit_by_rayon/' + id_rayon + '/' + rayon_default_categorie + '/' + init_product_col_number + '/?page=' + page,
    datatype: "html",
    beforeSend: function() {
        $('.ajax-loading').show();
    },
    complete: function () {
        tm_next_slide_1_section()
    }
    }).done(function(data_response) {

    var data_array = data_response.data;
    if (data_array.length > 0) {

    if (id_rayon == 27) {

        var line_slide = chunk(data_response.data, init_product_col_number)
        var etagere_slides = [];

        $('#load-data-pagination').css('display', 'none')

        etagere_slides += '<div class="custom-carousel-page-user prod_container_bis" style="position: relative; " >'
        etagere_slides += '<div class="line_0"></div>'
        line_slide.forEach((div_row, div_index) => {

        etagere_ligne_counter_bis ++;

        if (div_index == 0) {
            etagere_slides += '<div class="row_div-user-telephonie line_1" >'
        }else if(div_index == 1) {
            etagere_slides += '<div class="row_div-user-telephonie line_2" >'
        }else if (div_index == 2) {
            etagere_slides += '<div class="row_div-user-telephonie line_3" >'
        }else if(div_index == 3) {
            etagere_slides += '<div class="row_div-user-telephonie line_4" >'
        }else if(div_index == 4) {
            etagere_slides += '<div class="row_div-user-telephonie line_5" >'
        }else {
            etagere_slides += '<div class="row_div-user-telephonie" >'
        }

        div_row.forEach((slide_el, index) => {

            var phone_height = getProductHeight(slide_el);
            etagere_slides += generateProdCase(slide_el, phone_height)

        })

        etagere_slides += '</div>'

        })

        if (etagere_ligne_counter_bis < 5) {
            var reste_ligne = 5 - etagere_ligne_counter_bis
            for (let j = 0; j < reste_ligne; j++) {

                var nbre_suivant = etagere_ligne_counter_bis + j;

                if (nbre_suivant == 0) {
                    etagere_slides += '<div class="row_div-user-telephonie line_1"></div>'
                }else if(nbre_suivant == 1) {
                    etagere_slides += '<div class="row_div-user-telephonie line_2"></div>'
                }else if(nbre_suivant == 2) {
                    etagere_slides += '<div class="row_div-user-telephonie line_3"></div>'
                }else if(nbre_suivant == 3) {
                    etagere_slides += '<div class="row_div-user-telephonie line_4"></div>'
                }else if(nbre_suivant == 4) {
                    etagere_slides += '<div class="row_div-user-telephonie line_5"></div>'
                }else {
                    etagere_slides += '<div class="row_div-user-telephonie"></div>'
                }

            }
        }

        etagere_slides += '<div class="line_6"></div>'

        etagere_slides += '</div>'



        $('.slider-content-wrapper-user').append(etagere_slides)

    } else if (id_rayon == 38) {

        var line_slide = chunk(data_response.data, init_product_col_number)
        var etagere_slides = [];

        $('#load-data-pagination').css('display', 'none')

        etagere_slides += '<div class="custom-carousel-page-user prod_container_bis" style="position: relative; " >'
        etagere_slides += '<div class="line_0"></div>'
        line_slide.forEach((div_row, div_index) => {

        etagere_ligne_counter_bis ++;

        if (div_index == 0) {
            etagere_slides += '<div class="row_div-user-telephonie line_1" >'
        }else if(div_index == 1) {
            etagere_slides += '<div class="row_div-user-telephonie line_2" >'
        }else if (div_index == 2) {
            etagere_slides += '<div class="row_div-user-telephonie line_3" >'
        }else if(div_index == 3) {
            etagere_slides += '<div class="row_div-user-telephonie line_4" >'
        }else if(div_index == 4) {
            etagere_slides += '<div class="row_div-user-telephonie line_5" >'
        }else {
            etagere_slides += '<div class="row_div-user-telephonie" >'
        }

        div_row.forEach((slide_el, index) => {

            var phone_height = getProductHeight(slide_el);
            etagere_slides += generateProdCaseInfoReseau(slide_el, phone_height)

        })

        etagere_slides += '</div>'

        })

        if (etagere_ligne_counter_bis < 5) {
            var reste_ligne = 5 - etagere_ligne_counter_bis
            for (let j = 0; j < reste_ligne; j++) {

                var nbre_suivant = etagere_ligne_counter_bis + j;

                if (nbre_suivant == 0) {
                    etagere_slides += '<div class="row_div-user-telephonie line_1"></div>'
                }else if(nbre_suivant == 1) {
                    etagere_slides += '<div class="row_div-user-telephonie line_2"></div>'
                }else if(nbre_suivant == 2) {
                    etagere_slides += '<div class="row_div-user-telephonie line_3"></div>'
                }else if(nbre_suivant == 3) {
                    etagere_slides += '<div class="row_div-user-telephonie line_4"></div>'
                }else if(nbre_suivant == 4) {
                    etagere_slides += '<div class="row_div-user-telephonie line_5"></div>'
                }else {
                    etagere_slides += '<div class="row_div-user-telephonie"></div>'
                }

            }
        }

        etagere_slides += '<div class="line_6"></div>'

        etagere_slides += '</div>'



        $('.slider-content-wrapper-user').append(etagere_slides)

    }else if (id_rayon == 39) {

        var line_slide = chunk(data_response.data, init_product_col_number)
        var etagere_slides = [];

        $('#load-data-pagination').css('display', 'none')

        etagere_slides += '<div class="custom-carousel-page-user prod_container_bis" style="position: relative; " >'
        etagere_slides += '<div class="line_0"></div>'
        line_slide.forEach((div_row, div_index) => {

        etagere_ligne_counter_bis ++;

        if (div_index == 0) {
            etagere_slides += '<div class="row_div-user-telephonie line_1" >'
        }else if(div_index == 1) {
            etagere_slides += '<div class="row_div-user-telephonie line_2" >'
        }else if (div_index == 2) {
            etagere_slides += '<div class="row_div-user-telephonie line_3" >'
        }else if(div_index == 3) {
            etagere_slides += '<div class="row_div-user-telephonie line_4" >'
        }else if(div_index == 4) {
            etagere_slides += '<div class="row_div-user-telephonie line_5" >'
        }else {
            etagere_slides += '<div class="row_div-user-telephonie" >'
        }

        div_row.forEach((slide_el, index) => {

            var phone_height = getProductHeight(slide_el);
            etagere_slides += generateProdCaseInfoReseau(slide_el, phone_height)

        })

        etagere_slides += '</div>'

        })

        if (etagere_ligne_counter_bis < 5) {
            var reste_ligne = 5 - etagere_ligne_counter_bis
            for (let j = 0; j < reste_ligne; j++) {

                var nbre_suivant = etagere_ligne_counter_bis + j;

                if (nbre_suivant == 0) {
                    etagere_slides += '<div class="row_div-user-telephonie line_1"></div>'
                }else if(nbre_suivant == 1) {
                    etagere_slides += '<div class="row_div-user-telephonie line_2"></div>'
                }else if(nbre_suivant == 2) {
                    etagere_slides += '<div class="row_div-user-telephonie line_3"></div>'
                }else if(nbre_suivant == 3) {
                    etagere_slides += '<div class="row_div-user-telephonie line_4"></div>'
                }else if(nbre_suivant == 4) {
                    etagere_slides += '<div class="row_div-user-telephonie line_5"></div>'
                }else {
                    etagere_slides += '<div class="row_div-user-telephonie"></div>'
                }

            }
        }

        etagere_slides += '<div class="line_6"></div>'

        etagere_slides += '</div>'



        $('.slider-content-wrapper-user').append(etagere_slides)

    }else if(id_rayon == 25) { // ----------- Rayon Télévision ---------------

        var etagere_slides = [];

        etagere_slides += '<div class="custom-carousel-page-user prod_container_bis_tv">'

        var line_slide = chunk(data_response.data, init_product_col_number)

        line_slide.forEach((div_row, div_index) => {

            etagere_ligne_counter_bis ++;
        if (div_index == 0) {
            etagere_slides += '<div class="row_div-user line_1_tv" >'
        }else if(div_index == 1) {
            etagere_slides += '<div class="row_div-user line_2_tv" >'
        }else if (div_index == 2) {
            etagere_slides += '<div class="row_div-user line_3_tv" >'
        }else {
            etagere_slides += '<div class="row_div-user" >'
        }
        // etagere_slides += '<div class="row_div-user" >'
        div_row.forEach((slide_el, index) => {

        etagere_slides += '<div id="addSlide-user'+slide_el.id+'" onclick="showClickEffect('+slide_el.id+')" class="slide case-produit-btnd" onmouseover="showEffect('+slide_el.id+')" style="height: 155px !important;" onmouseleave="showEffectRemove('+slide_el.id+')">'
        etagere_slides += '<img id="image-prod-id'+slide_el.id+'" onclick="showRecapProduitMarchandTV('+slide_el.id+')" class="image-prod" src= "/'+slide_el.image+'" width="'+slide_el.taille_sur_etagere+'px">'
        etagere_slides += '<span id="effect-layer'+slide_el.id+'" class="product-effect-layer effect-none" style="font-size: 12px; position: absolute; width: '+slide_el.taille_sur_etagere+'px; "><span class="cap-cover"></span>'

            etagere_slides += '</span>'
            etagere_slides += '</div>'

        })
            etagere_slides += '</div>'
        })

        if (etagere_ligne_counter_bis < 3) {

            var reste_ligne = 3 - etagere_ligne_counter_bis

            for (let j = 0; j < reste_ligne; j++) {
                var line_tv_suivant = etagere_ligne_counter_bis + j;

                if (line_tv_suivant == 0) {
                    etagere_slides += '<div class="row_div-user line_1_tv" ></div>'
                }else if(line_tv_suivant == 1) {
                    etagere_slides += '<div class="row_div-user line_2_tv" ></div>'
                }else if (line_tv_suivant == 2) {
                    etagere_slides += '<div class="row_div-user line_3_tv" ></div>'
                }else {
                    etagere_slides += '<div class="row_div-user" ></div>'
                }
            }

        }

        etagere_slides += '<div class="line_4_tv"></div>'

        etagere_slides += '</div>'

        $('.slider-content-wrapper-user').append(etagere_slides)


    }else if(id_rayon == 28) {

    var etagere_slides = [];

    etagere_slides += '<div class="custom-carousel-page-user prod_container_bis_tv">'

    var line_slide = chunk(data_response.data, init_product_col_number)

    line_slide.forEach((div_row, div_index) => {

    etagere_ligne_counter_bis++;

    if (div_index == 0) {
        etagere_slides += '<div class="row_div-user line_1_tv" >'
    }else if(div_index == 1) {
        etagere_slides += '<div class="row_div-user line_2_tv" >'
    }else if (div_index == 2) {
        etagere_slides += '<div class="row_div-user line_3_tv" >'
    }else {
        etagere_slides += '<div class="row_div-user" >'
    }

    div_row.forEach((slide_el, index) => {

    etagere_slides += '<div id="addSlide-user'+slide_el.id+'" onclick="showClickEffect('+slide_el.id+')" class="slide case-produit-btnd" onmouseover="showEffect('+slide_el.id+')" style="height: 155px !important;" onmouseleave="showEffectRemove('+slide_el.id+')">'
    etagere_slides += '<img id="image-prod-id'+slide_el.id+'" onclick="showRecapProduitMarchandTV('+slide_el.id+')" class="image-prod" src= "/'+slide_el.image+'" width="'+slide_el.taille_sur_etagere+'px">'
    etagere_slides += '<span id="effect-layer'+slide_el.id+'" class="product-effect-layer effect-none" style="font-size: 12px; position: absolute; width: '+slide_el.taille_sur_etagere+'px; "><span class="cap-cover"></span>'

        etagere_slides += '</span>'
        etagere_slides += '</div>'

    })
        etagere_slides += '</div>'
    })

    if (etagere_ligne_counter_bis < 3) {

        var reste_ligne = 3 - etagere_ligne_counter_bis

        for (let j = 0; j < reste_ligne; j++) {

        var line_tv_suivant = etagere_ligne_counter_bis + j;

        if (line_tv_suivant == 0) {
            etagere_slides += '<div class="row_div-user line_1_tv" ></div>'
        }else if(line_tv_suivant == 1) {
            etagere_slides += '<div class="row_div-user line_2_tv" ></div>'
        }else if (line_tv_suivant == 2) {
            etagere_slides += '<div class="row_div-user line_3_tv" ></div>'
        }else {
            etagere_slides += '<div class="row_div-user" ></div>'
        }

        }

    }

    etagere_slides += '<div class="line_4_tv"></div>'

    etagere_slides += '</div>'

    $('.slider-content-wrapper-user').append(etagere_slides)

    } else if (id_rayon == 26) { // ------------- Rayon Informatique ---------------
        var line_slide = chunk(data_response.data, init_product_col_number)
        var etagere_slides = [];

        $('#load-data-pagination').css('display', 'none')

        etagere_slides += '<div class="custom-carousel-page-user prod_container_bis" style="position: relative; " >'
        etagere_slides += '<div class="line_0"></div>'
        line_slide.forEach((div_row, div_index) => {

        etagere_ligne_counter_bis ++;

        if (div_index == 0) {
            etagere_slides += '<div class="row_div-user-telephonie line_1" >'
        }else if(div_index == 1) {
            etagere_slides += '<div class="row_div-user-telephonie line_2" >'
        }else if (div_index == 2) {
            etagere_slides += '<div class="row_div-user-telephonie line_3" >'
        }else if(div_index == 3) {
            etagere_slides += '<div class="row_div-user-telephonie line_4" >'
        }else if(div_index == 4) {
            etagere_slides += '<div class="row_div-user-telephonie line_5" >'
        }else {
            etagere_slides += '<div class="row_div-user-telephonie" >'
        }

        div_row.forEach((slide_el, index) => {

            var phone_height = getInformatiqueReseauxHeight(slide_el);
            etagere_slides += generateProdCaseInfoReseau(slide_el, phone_height)

        })

        etagere_slides += '</div>'

        })

        if (etagere_ligne_counter_bis < 5) {
            var reste_ligne = 5 - etagere_ligne_counter_bis
            for (let j = 0; j < reste_ligne; j++) {
                var nbre_suivant = etagere_ligne_counter_bis + j;

            if (nbre_suivant == 0) {
                etagere_slides += '<div class="row_div-user-telephonie line_1"></div>'
            }else if(nbre_suivant == 1) {
                etagere_slides += '<div class="row_div-user-telephonie line_2"></div>'
            }else if(nbre_suivant == 2) {
                etagere_slides += '<div class="row_div-user-telephonie line_3"></div>'
            }else if(nbre_suivant == 3) {
                etagere_slides += '<div class="row_div-user-telephonie line_4"></div>'
            }else if(nbre_suivant == 4) {
                etagere_slides += '<div class="row_div-user-telephonie line_5"></div>'
            }else {
                etagere_slides += '<div class="row_div-user-telephonie"></div>'
            }
                // etagere_slides += '<div class="row_div-user-telephonie"></div>'
            }
        }

        etagere_slides += '<div class="line_6"></div>'

        etagere_slides += '</div>'

        $('.slider-content-wrapper-user').append(etagere_slides)

    }

    var window_width_media_query = $(window).width();
    const main_element_phonie = document.getElementById('main-rayon-container-'+id_responsive_rayon).getElementsByClassName('row_div-user-telephonie') // cas du phone
    const main_element_tv = document.getElementById('main-rayon-container-'+id_responsive_rayon).getElementsByClassName('row_div-user')

    const scoped_slide_section = $('.custom-carousel-page-user')
    const scoped_slide_section_children = $(scoped_slide_section[page - 1]).find('.row_div-user-telephonie')
    var scoped_tv_slide_children = $(scoped_slide_section[page - 1]).find('.row_div-user')

    if (id_responsive_rayon == 27) { // cas du rayon téléphone
    // alert('I m in next slide zone now')

    if (rayon_default_categorie != 153) {
        $('.image-prod-phone').css('max-height','78px')
    }

    telephonie_onload_taille(window_width_media_query, product_container_zone, scoped_slide_section_children)

    }else if(id_responsive_rayon == 25){

    tv_onload_taille(window_width_media_query, product_container_zone, scoped_tv_slide_children)

    }
    }

    }).fail(function(jqXHR, ajaxOptions, thrownError){
        console.log('Il s\'est produit quelque chose ...')
    })

}
