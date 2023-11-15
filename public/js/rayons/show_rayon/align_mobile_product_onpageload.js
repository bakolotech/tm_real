function showProductByScreenSiteMobile(id_rayon, data_product, rayon_default_categorie, colomn_number) {

    var etagere_ligne_counter = 0;
    var etagere_slides = [];

    const chunk = (arr, size) =>
    Array.from({ length: Math.ceil(arr.length / size) }, (v, i) =>
        arr.slice(i * size, i * size + size)
    );

    function generateRowClassName(index) {
        if((id_rayon == 27) || (id_rayon == 38) || (id_rayon == 39) ) {
            return `line_no_bg${index + 1}`;
        }else if((id_rayon == 25) || (id_rayon == 28)) {
            return `line_line_no_bg${index + 1}_tv`;
        } else if(id_rayon == 26) {
            return `line_${index + 1}`;
        }else {
            return `line_line_no_bg${index + 1}`;
        }
    }

    function generateProductCase(slide_el, phone_height) {

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

        }else if (id_rayon == 27) {
            return `<div id="addSlide-user${slide_el.id}" onclick="showClickEffect(${slide_el.id})" class="slide case-produit-btnd" onmouseover="showEffect(${slide_el.id})" style="height: ${phone_height}px !important;" onmouseleave="showEffectRemove(${slide_el.id})">
                    <img id="image-prod-id${slide_el.id}" onclick="showRecapProduitMarchandTV(${slide_el.id})" class="image-prod" src="/${slide_el.image}" width="${slide_el.taille_sur_etagere}px">
                    <span id="effect-layer${slide_el.id}" class="product-effect-layer effect-none" style="font-size: 12px; position: absolute; width: ${slide_el.taille_sur_etagere}px;"><span class="cap-cover" style="color: #fff">${slide_el.capacite}</span></span>
                </div>`;
        } else {
        return `<div id="addSlide-user${slide_el.id}" onclick="showClickEffect(${slide_el.id})" class="slide case-produit-btnd" onmouseover="showEffect(${slide_el.id})" style="height: ${phone_height}px !important;" onmouseleave="showEffectRemove(${slide_el.id})">
                    <img id="image-prod-id${slide_el.id}" onclick="showRecapProduitMarchandTV(${slide_el.id})" class="image-prod" src="/${slide_el.image}" width="${slide_el.taille_sur_etagere}px">
                    <span id="effect-layer${slide_el.id}" class="product-effect-layer effect-none" style="font-size: 12px; position: absolute; width: ${slide_el.taille_sur_etagere}px;"><span class="cap-cover" style="color: #fff"></span></span>
                </div>`;
        }

    }

    function generateRow(data_rows, row_index) {

        etagere_ligne_counter++;
        const rowClassName = generateRowClassName(row_index);
        let rowContent = ''

        if ((id_rayon == 27) || (id_rayon == 26) || (id_rayon == 38) || (id_rayon == 39)) {
            rowContent += `<div class="row_div-user-telephonie ${rowClassName}">`;
        }else if ((id_rayon == 25) || (id_rayon == 28)) {
            rowContent += `<div class="row_div-user ${rowClassName}">`;
        }else {
            rowContent += `<div class="row_div-user-telephonie ${rowClassName}">`;
        }

        data_rows.forEach((slide_el, index) => {
            
            if (id_rayon == 26) {
                const phone_height = getInformatiqueReseauxHeight(slide_el);
                rowContent += generateProductCase(slide_el, phone_height);
            }else {
                const phone_height = getProductHeight(slide_el);
                rowContent += generateProductCase(slide_el, phone_height);
            }

        });

        rowContent += '</div>';

        etagere_slides.push(rowContent);

    }

    function generateEmptyRowsIfNeeded() {

        const rowCount = etagere_ligne_counter;
        const maxRowCount = id_rayon === 25 || id_rayon === 28 ? 3 : 5;

        if ((rowCount < maxRowCount) && (id_rayon === 25 || id_rayon === 28)) {
            const emptyRowCount = maxRowCount - rowCount;
            for (let j = 0; j < emptyRowCount; j++) {
                const nbre_suivant = rowCount + j;
                const rowClassName = generateRowClassName(nbre_suivant);
                etagere_slides.push(`<div class="row_div-user ${rowClassName}"></div>`);
            }
        }else {
            const emptyRowCount = maxRowCount - rowCount;
            for (let j = 0; j < emptyRowCount; j++) {
                const nbre_suivant = rowCount + j;
                const rowClassName = generateRowClassName(nbre_suivant);
                etagere_slides.push(`<div class="row_div-user-telephonie ${rowClassName}"></div>`);
            }
        }

    }

    const line_slide = chunk(data_product, colomn_number);

    let div_closest_section = '';

    const fixed_bg = 
    `<div class="line_0"></div>
    <div class="line_1"></div>
    <div class="line_2"></div>
    <div class="line_3"></div>
    <div class="line_4"></div>
    <div class="line_5"></div>
    <div class="line_6"></div>`;

    const fixed_bg_tv = 
    `<div class="line_1_tv"></div>
    <div class="line_2_tv"></div>
    <div class="line_3_tv"></div>
    <div class="line_4_tv"></div>`;

    if ((id_rayon == 27) || (id_rayon == 38) || (id_rayon == 39)) {
        div_closest_section += '<div class="custom-carousel-page-userf prod_container_bis" id="rayon-produit-section-last-layer-'+id_rayon+'" onscroll="loadMobileProduct('+id_rayon+', '+rayon_default_categorie+', '+colomn_number+')" style="position: relative; width: 100%">'
        div_closest_section += '<div class="etagere-parent-miror">'+fixed_bg+'</div>'
    }else if((id_rayon == 25) || (id_rayon == 28)) {
        div_closest_section += '<div class="etagere-parent-miror_tv">'+fixed_bg_tv+'</div>'
        div_closest_section += '<div class="custom-carousel-page-userf prod_container_bis_tv" id="rayon-produit-section-last-layer-'+id_rayon+'" onscroll="loadMobileProduct('+id_rayon+', '+rayon_default_categorie+', '+colomn_number+')" style="position: relative; width: auto">'
    } else if(id_rayon == 26) {
        div_closest_section += '<div class="custom-carousel-page-userf prod_container_bis" id="rayon-produit-section-last-layer-'+id_rayon+'" onscroll="loadMobileProduct('+id_rayon+', '+rayon_default_categorie+', '+colomn_number+')" style="position: relative; width: 100%">'
    } else {
        // div_closest_section += '<div class="etagere-parent-miror">'+fixed_bg+'</div>'
        div_closest_section += '<div class="custom-carousel-page-userf prod_container_bis" id="rayon-produit-section-last-layer-'+id_rayon+'" onscroll="loadMobileProduct('+id_rayon+', '+rayon_default_categorie+', '+colomn_number+')" style="position: relative; width: 100%">'
    }

    // Assuming you have a variable `id_rayon` containing the ID value
    etagere_slides.push(div_closest_section);

    if ((id_rayon == 27) || (id_rayon == 26) || (id_rayon == 38) || (id_rayon == 39)) {
        etagere_slides.push('<div class="line_0"></div>');
    }else if((id_rayon == 25) || (id_rayon == 28)) {
        // etagere_slides.push('<div class="line_0"></div>');
    }else {
        etagere_slides.push('<div class="line_0"></div>');
    }


    line_slide.forEach((div_row, div_index) => {
        generateRow(div_row, div_index);
    });

    generateEmptyRowsIfNeeded();


    if ((id_rayon == 27) || (id_rayon == 26) || (id_rayon == 38) || (id_rayon == 39)) {
        etagere_slides.push('<div class="line_6"></div>');
    }else if((id_rayon == 25) || (id_rayon == 28)) {
        etagere_slides.push('<div class="line_4_tv"></div>');
    }else {
        etagere_slides.push('<div class="line_6"></div>');
    }
    etagere_slides.push('</div>');

    $('#mobile-main-article-section').find('.slider-content-wrapper-user').append(etagere_slides.join(''));

}
