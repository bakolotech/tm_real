function setValues() {

    var searched_product = JSON.parse(window.localStorage.getItem('searched_product'));
    var tm_current_url = getCurrentUrl();
    var product_id_from_link = getIdFromUrl(tm_current_url); // Pour le retour de facebook


    // if ((searched_product == null) && (product_id_from_link == null)) {
    if ((searched_product == null) && (product_id_from_link == null)) {

        page++;
        var taille_actuel = window.innerWidth;
        var reste_divsion = Math.floor(taille_actuel / min_val_prod_culumn);

        init_product_col_number = reste_divsion;

        $.ajax({
        type: 'GET',
        url: '/get_product_by_screen_size/'+id_responsive_rayon + '/' + rayon_default_categorie + '/'+init_product_col_number + '/?page=' + page,
        data: {},
        success: function(product_callback) {

        if (product_callback.data != undefined) {

        $('.slider-content-wrapper-user').empty();

        showProductByScreenSite(id_responsive_rayon, product_callback.data, rayon_default_categorie, init_product_col_number)

        }

        }

        })

    } else if (searched_product != null) {

    page++;
    var taille_actuel = window.innerWidth;
    var reste_divsion = Math.floor(taille_actuel / min_val_prod_culumn);

    console.log('You should be here Second =>  ', product_id_from_link)

    init_product_col_number = reste_divsion;
    showRecapProduitSearchedFromMainPage(searched_product)

    }else if(product_id_from_link != null) {

    page++;
    var taille_actuel = window.innerWidth;
    var reste_divsion = Math.floor(taille_actuel / min_val_prod_culumn);
    console.log('You should be here =>  ', product_id_from_link)
    init_product_col_number = reste_divsion;
    console.log('ID Produit depuis les reseaux sociaux ici ==> ', product_id_from_link)
    showRecapProduitMarchandTV(product_id_from_link)
    showRecapProduitSearchedFromMainPage(product_id_from_link)

    }

}
