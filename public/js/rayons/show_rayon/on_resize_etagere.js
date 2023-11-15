function onResizeProduct() {

    var tablet_media_query = window.matchMedia("(min-width: 481px) and (max-width: 767px) and (orientation: landscape)");

    if (!tablet_media_query.matches) { // Au cas ou il ne s'agit
    // alert('this condition is verified')
    var num_reste_division = Math.floor(this.window.innerWidth / min_val_prod_culumn)
    // grande_etagereOK
    var product_container_zone = document.getElementById('main-rayon-container-'+id_responsive_rayon).offsetHeight

    var window_width_media_query = $(window).width()
    if (num_reste_division != init_product_col_number) {
    // page++;
    page = 1;
    curSlide1 = 0;
    init_product_col_number = num_reste_division
    $.ajax({
    type: 'GET',
    url: '/get_product_by_screen_size/'+id_responsive_rayon + '/' + rayon_default_categorie + '/'+init_product_col_number + '/?page=' + page,
    data: {},
    success: function(product_callback) {

    $('.slider-content-wrapper-user').empty()
    console.log('Les donnees sont => ', product_callback)
    showProductByScreenSite(id_responsive_rayon, product_callback.data, rayon_default_categorie, init_product_col_number)

    const main_element_phonie = document.getElementById('main-rayon-container-'+id_responsive_rayon).getElementsByClassName('row_div-user-telephonie')
    const main_element_tv = document.getElementById('main-rayon-container-'+id_responsive_rayon).getElementsByClassName('row_div-user')



    }


    })

    } else {

    const main_element_phonie = document.getElementById('main-rayon-container-'+id_responsive_rayon).getElementsByClassName('row_div-user-telephonie')
    const main_element_tv = document.getElementById('main-rayon-container-'+id_responsive_rayon).getElementsByClassName('row_div-user')


    }

    }else {
    // alert('I m in this section zone')
    page = 1;
    var init_prod_col = 4;
    $.ajax({
    type: 'GET',
    url: '/get_product_by_screen_size_for_tablette/'+id_responsive_rayon + '/' + rayon_default_categorie + '/'+  init_prod_col + '/?page=' + page,
    data: {},
    success: function(product_callback) {
    console.log('DATA HERE => ', product_callback)
    showProductForTablette(id_responsive_rayon, product_callback.data, init_prod_col)

    if (id_responsive_rayon == 27) { // cas du rayon téléphone
        const main_element_phonie = document.getElementById('main-rayon-container-'+id_responsive_rayon).getElementsByClassName('row_div-user-telephonie')

    }
    // console.log('Here data back from tablette => ', product_callback)
    }

    })
        // console.log('Mobile tablet section')
    }


    }
