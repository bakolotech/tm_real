function setValuesMobile() {

    var searched_product = JSON.parse(window.localStorage.getItem('searched_product'));
    var tm_current_url = getCurrentUrl();
    var product_id_from_link = getIdFromUrl(tm_current_url);
    

    if ((id_responsive_rayon == 27) || (id_responsive_rayon == 26)) {
        // min_val_prod_culumn = 50;
        min_val_prod_culumn = 90;
    }else if((id_responsive_rayon == 25) || (id_responsive_rayon == 28)) {
        min_val_prod_culumn = 100;
    }else {
        min_val_prod_culumn = 50;
    }

    if ((searched_product == null) && (product_id_from_link == null)) {

    page++;
    var taille_actuel = window.innerWidth;
    var reste_divsion = Math.floor(taille_actuel / min_val_prod_culumn);

    init_product_col_number = reste_divsion;

    $.ajax({
    type: 'GET',
    url: '/get_product_by_screen_size_mobile/'+id_responsive_rayon + '/' + rayon_default_categorie + '/'+init_product_col_number + '/?page=' + page,
    data: {},
    success: function(product_callback) {

    if (product_callback.data != undefined) {

    $('.slider-content-wrapper-user').empty();

    showProductByScreenSiteMobile(id_responsive_rayon, product_callback.data, rayon_default_categorie, init_product_col_number)

    }

    }

    })

    } else if (searched_product != null) {

    page++;
    var taille_actuel = window.innerWidth;
    var reste_divsion = Math.floor(taille_actuel / min_val_prod_culumn);

    init_product_col_number = reste_divsion;
    showRecapProduitSearchedFromMainPage(searched_product)

    } else if(product_id_from_link != null) {

    page++;
    var taille_actuel = window.innerWidth;
    var reste_divsion = Math.floor(taille_actuel / min_val_prod_culumn);
    init_product_col_number = reste_divsion;

    // console.log('ID Produit depuis les reseaux sociaux ici ==> ', product_id_from_link)
    showRecapProduitMarchandTV(product_id_from_link)
    showRecapProduitSearchedFromMainPage(product_id_from_link)

    }

}
