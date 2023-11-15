
var initialize_scroll = 0;
var data_to_skip = 0;

function loadMobileProduct(id_rayon, rayon_default_categorie, colomn_number) {

    const $scrollableElement = $('#rayon-produit-section-last-layer-'+id_rayon);
    var currentScroll = $scrollableElement.scrollLeft();
    currentScroll = Math.ceil(currentScroll)

    var taille_actuel = window.innerWidth;
    var reste_divsion = Math.floor(taille_actuel / min_val_prod_culumn);
    init_product_col_number = reste_divsion;

    var row_to_clone_new_product = [];

    if (id_rayon == 27) {
        row_to_clone_new_product = $('#mobile-main-article-section').find('.row_div-user-telephonie');
        data_to_skip = reste_divsion * 5
    }else if ((id_rayon == 25) || (id_rayon == 28)) {
        data_to_skip = reste_divsion * 3
        row_to_clone_new_product = $('#mobile-main-article-section').find('.row_div-user');
    }else {
        row_to_clone_new_product = $('#mobile-main-article-section').find('.row_div-user-telephonie');
        data_to_skip = reste_divsion * 5
    }

    const chunk = (arr, size) =>
    Array.from({ length: Math.ceil(arr.length / size) }, (v, i) =>
        arr.slice(i * size, i * size + size)
    );

    if ($scrollableElement.scrollLeft() + $scrollableElement.innerWidth() + 10 >= $scrollableElement[0].scrollWidth) {
    
    initialize_scroll = initialize_scroll + data_to_skip

    $.ajax({
    type: 'GET',
    url: '/get_product_by_screen_size_mobile_scroll/'+id_rayon+'/'+rayon_default_categorie+'/'+init_product_col_number,
    data: {
        skip: initialize_scroll,
    },
    success: function(product_callback) {

    console.log('Data scrolled => ', product_callback)

    if (product_callback.length > 0) {

    var data_splited = chunk(product_callback, colomn_number)
    
    data_splited.forEach(function(row) {
    row.forEach(function(element, index) {
        
    if ((id_rayon == 38) || (id_rayon == 39)) {
        var phone_height = getInformatiqueReseauxHeight(element);
        var rowContent = generateProductCaseBis(element, phone_height);
        $(row_to_clone_new_product[index]).append(rowContent);
    } else {
        var phone_height = getProductHeight(element);
        var rowContent = generateProductCaseBis(element, phone_height);
        $(row_to_clone_new_product[index]).append(rowContent);
    }
    
    })
    })
    
    }
    }

    })
    }


}
