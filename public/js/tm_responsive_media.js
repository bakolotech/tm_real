
var page = 0;
var counter = 1;
var id_rayon = 27;
var init_product_col_number = 0;
var min_val_prod_culumn;
var rayon_window_width = window.innerWidth; // window width for height and rows control
var rayon_window_height = window.innerHeight;

var telephonie_etagere_vide =
    `<div class="custom-carousel-page-user prod_container_bis">
        <div class="line_0"></div>
        <div class="line_1"></div>
        <div class="line_2"></div>
        <div class="line_3"></div>
        <div class="line_4"></div>
        <div class="line_5"></div>
        <div class="line_6"></div>
    </div>`

var tv_etagere_vide =
    `<div class="custom-carousel-page-user prod_container_bis_tv">
        <div class="line_1_tv"></div>
        <div class="line_2_tv"></div>
        <div class="line_3_tv"></div>
        <div class="line_4_tv"></div>
    </div>`

if (seached_rayon_val == 27) {
    min_val_prod_culumn = 200;
}else if(seached_rayon_val == 25) {
    min_val_prod_culumn = 330;
}else if(seached_rayon_val == 26) {
    min_val_prod_culumn = 300;
}else if(seached_rayon_val == 28) {
    min_val_prod_culumn = 330;
}else if(seached_rayon_val == 38) {
    min_val_prod_culumn = 200;
}else if(seached_rayon_val == 39) {
    min_val_prod_culumn = 200;
}else if(seached_rayon_val == 9) {
    min_val_prod_culumn = 250;
}else {
    min_val_prod_culumn = 330;
}

// ------------------------ les tailles au chargement ---------------------

function getProductHeight(slide_el) {

    var phone_height = 0;
    if (slide_el.taille_sur_etagere == 43) {
        phone_height = 58;
    }else if(slide_el.taille_sur_etagere == 50) {
        phone_height = 68;
    }else if (slide_el.taille_sur_etagere == 57) {
        phone_height = 78;
    }else if(slide_el.taille_sur_etagere == 101) {
        phone_height = 80;
    }else if(slide_el.taille_sur_etagere == 103) { // trolley
        phone_height = 100;
    }else if(slide_el.taille_sur_etagere == 102) {
        phone_height = 111;
    }else if(slide_el.taille_sur_etagere == 70) {
        phone_height = 65;
    }else if(slide_el.taille_sur_etagere == 95) {
        phone_height = 83;
    }else if(slide_el.taille_sur_etagere == 80) {
        phone_height = 80;
    }else {
        phone_height = 53;
    }

    return phone_height
}

function getInformatiqueReseauxHeight(slide_el) {

    var phone_height = 0;
    if (slide_el.taille_sur_etagere == 43) {
        phone_height = 58;
    }else if(slide_el.taille_sur_etagere == 50) {
        phone_height = 68;
    }else if (slide_el.taille_sur_etagere == 57) {
        phone_height = 78;
    }else {
        phone_height = 78;
    }

    return phone_height
    
}

function generateProdCase(slide_el, phone_height) {
    var etagere_slides = []
    etagere_slides += '<div id="addSlide-user'+slide_el.id+'" onclick="showClickEffect('+slide_el.id+')" class="slide case-produit-btnd" onmouseover="showEffect('+slide_el.id+')" style="height: '+phone_height+'px !important;" onmouseleave="showEffectRemove('+slide_el.id+')">'
    etagere_slides += '<img style="max-height: 100%; width: auto" id="image-prod-id'+slide_el.id+'" onclick="showRecapProduitMarchandTV('+slide_el.id+')" class="image-prod-phone" src= "/'+slide_el.image+'" width="'+slide_el.taille_sur_etagere+'px">'

    etagere_slides += '<span id="effect-layer'+slide_el.id+'" class="product-effect-layer effect-none" style="font-size: 12px; position: absolute; width: '+slide_el.taille_sur_etagere+'px; color: #fff;"><span class="cap-cover">'+slide_el.capacite+'</span></span>'

    etagere_slides += '</span>'
    etagere_slides += '</div>'
    return etagere_slides;

}

function generateProdCaseInfoReseau(slide_el, phone_height) {
 var etagere_slides = []
   if (slide_el.id == 1124 || slide_el.id == 951 || slide_el.id == 932 || slide_el.id == 934) {
    etagere_slides += '<div id="addSlide-user'+slide_el.id+'" onclick="showClickEffect('+slide_el.id+')" class="slide case-produit-btnd" onmouseover="showEffect('+slide_el.id+')" style="height: '+phone_height+'px !important;" onmouseleave="showEffectRemove('+slide_el.id+')">'
    etagere_slides += '<img id="image-prod-id'+slide_el.id+'" onclick="showRecapProduitMarchandTV('+slide_el.id+')" class="image-prod" src= "/'+slide_el.image+'" width="'+slide_el.taille_sur_etagere+'px" style="width: auto; height: 100px">'

    etagere_slides += '<span id="effect-layer'+slide_el.id+'" class="product-effect-layer effect-none" style="font-size: 12px; position: absolute; width: '+slide_el.taille_sur_etagere+'px; color: #fff;"><span class="cap-cover"></span></span>'

    etagere_slides += '</span>'
    etagere_slides += '</div>'
   }else {
    etagere_slides += '<div id="addSlide-user'+slide_el.id+'" onclick="showClickEffect('+slide_el.id+')" class="slide case-produit-btnd" onmouseover="showEffect('+slide_el.id+')" style="height: '+phone_height+'px !important;" onmouseleave="showEffectRemove('+slide_el.id+')">'
    etagere_slides += '<img id="image-prod-id'+slide_el.id+'" onclick="showRecapProduitMarchandTV('+slide_el.id+')" class="image-prod" src= "/'+slide_el.image+'" width="'+slide_el.taille_sur_etagere+'px" style="max-height: '+phone_height+'px !important; width: auto; max-width: '+slide_el.taille_sur_etagere+'px">'

    etagere_slides += '<span id="effect-layer'+slide_el.id+'" class="product-effect-layer effect-none" style="font-size: 12px; position: absolute; width: '+slide_el.taille_sur_etagere+'px; color: #fff;"><span class="cap-cover"></span></span>'

    etagere_slides += '</span>'
    etagere_slides += '</div>'
   }

   return etagere_slides;

}

function getCurrentUrl() {
    return window.location.href;
}

function getIdFromUrl(url) {
    const urlObj = new URL(url);
    const params = new URLSearchParams(urlObj.search);
    return params.get("id")
}


var id_responsive_rayon = seached_rayon_val;

function showProductForTablette(id_rayon, data_product, colomn_number) {

    const chunk = (arr, size) =>
    Array.from({ length: Math.ceil(arr.length / size) }, (v, i) =>
        arr.slice(i * size, i * size + size)
    );

    $('#rayon-produit-section-'+id_rayon)

    if (id_rayon == 27) {
        var line_slide = chunk(data_product, colomn_number)
        var etagere_slides = [];

        etagere_slides += '<div class="custom-carousel-page-user" style="position: relative; " >'
        line_slide.forEach((div_row, div_index) => {

        etagere_slides += '<div class="row_div-user-telephonie" style="height: 90px">'
        div_row.forEach((slide_el, index) => {

            var phone_height = getProductHeight(slide_el);

            etagere_slides += generateProdCase(slide_el, phone_height)

        })
        etagere_slides += '</div>'
    })

    etagere_slides += '</div>'

    $('.slider-content-wrapper-user').append(etagere_slides)

    var etagere_lines = $('#rayon-produit-section-'+id_rayon).find('.row_div-user-telephonie')

    }else if(id_rayon == 25) {
        var line_slide = chunk(data_product, colomn_number)
        var etagere_slides = [];

        etagere_slides += '<div class="custom-carousel-page-user" style="position: relative; " >'
        line_slide.forEach((div_row, div_index) => {

        etagere_slides += '<div class="row_div-user">'
        div_row.forEach((slide_el, index) => {

            var phone_height = getProductHeight(slide_el);

            etagere_slides += generateProdCase(slide_el, phone_height)

        })
        etagere_slides += '</div>'
    })

    etagere_slides += '</div>'

    $('.slider-content-wrapper-user').append(etagere_slides)

    var etagere_lines = $('#rayon-produit-section-'+id_rayon).find('.row_div-user')
    $(etagere_lines[1]).css('height', '109px')
    $(etagere_lines[0]).css('height', '116px')

    }

}

/*
 * domready (c) Dustin Diaz 2014 - License MIT
 * https://github.com/ded/domready/
 */
!function (name, definition) {

    if (typeof module != 'undefined') module.exports = definition()
    else if (typeof define == 'function' && typeof define.amd == 'object') define(definition)
    else this[name] = definition()

  }('domready', function () {

    var fns = [], listener
      , doc = document
      , hack = doc.documentElement.doScroll
      , domContentLoaded = 'DOMContentLoaded'
      , loaded = (hack ? /^loaded|^c/ : /^loaded|^i|^c/).test(doc.readyState)

      if (!loaded)
        doc.addEventListener(domContentLoaded, listener = function () {
          doc.removeEventListener(domContentLoaded, listener)
            loaded = 1
            while (listener = fns.shift()) listener()
        })

    return function (fn) {
      loaded ? setTimeout(fn, 0) : fns.push(fn)
    }

  });
  domready(function () {
    document.documentElement.className += ' domready';
  });

  domready(function () {

    // window.addEventListener("DOMContentLoaded", setValues, false);
    window.addEventListener("DOMContentLoaded", function() {
        var mobile_size = matchMedia("(max-width: 500px)");

        if (mobile_size.matches) {
            setValuesMobile()
        } else {
            setValues()
        }

    },false);

    window.addEventListener('resize', function() {
        var mobile_size2 = matchMedia("(max-width: 500px)");
        if (!mobile_size2.matches) {
            onResizeProduct()
        } 
        
    });

  });

    function lazy_loading_rayon_product_boutique_partager(id_boutique, id_rayon, rayon_default_categorie, init_product_col_number) {

        var etagere_ligne_counter_bis = 0;
        var etagere_ligne_counter_bloc_3 = 0;
    
        const chunk = (arr, size) =>
        Array.from({ length: Math.ceil(arr.length / size) }, (v, i) =>
            arr.slice(i * size, i * size + size)
        );
    
        counter++;

        console.log('Le counter est => ', counter)
    
        var product_container_zone = 150
    
        $.ajax({
        type: "GET",
        url: '/get_partager_product_by_screen_size/'+id_boutique+'/'+id_rayon + '/' + rayon_default_categorie + '/'+init_product_col_number + '/?page=' + counter,
        // url: '/show_produit_by_rayon/' + id_rayon + '/' + rayon_default_categorie + '/' + init_product_col_number + '/?page=' + page,
        datatype: "html",
        beforeSend: function() {
            $('.ajax-loading').show();
        },
        complete: function () {
            tm_next_slide_1_section()
        }
        }).done(function(data_response) {

        console.log('Show data to verify => ', data_response)
    
        var data_array = data_response.boutique_data.data;
        console.log('Les data', data_array)
        if (data_array.length > 0) {
    
        if (id_rayon == 27) {
    
            var line_slide = chunk(data_array, init_product_col_number)
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
    
        var line_slide = chunk(data_array, init_product_col_number)
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
    
        var line_slide = chunk(data_array, init_product_col_number)
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

        var line_slide = chunk(data_array, init_product_col_number)

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
    
        var line_slide = chunk(data_array, init_product_col_number)
    
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
            var line_slide = chunk(data_array, init_product_col_number)
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

        const scoped_slide_section = $('.custom-carousel-page-user')
        const scoped_slide_section_children = $(scoped_slide_section[page - 1]).find('.row_div-user-telephonie')
        var scoped_tv_slide_children = $(scoped_slide_section[page - 1]).find('.row_div-user')
    

        }
    
        }).fail(function(jqXHR, ajaxOptions, thrownError){
            console.log('Il s\'est produit quelque chose ...')
        })
    
    }


