function sortByFamille(event, id, id_rayon) {

    if (id == null) {
        const data_slug = $('#categorie-rayon-'+id_rayon).attr('data-slug')

        const rayon_url = '/rayon/'+id_rayon+'/'+data_slug
    
        window.location.href = rayon_url
    } else {
    
    
        initialize_scroll = 0;

        var mobile_size = matchMedia("(max-width: 500px)");
    
        if (mobile_size.matches) { 
        
        if (id == 156 || id == 155) { // cas des montres
    
            min_val_prod_culumn = 75
    
        }else if((id_rayon == 27)) { // retour au phone
    
            min_val_prod_culumn = 75
    
        } else if(id == 133) {
    
            min_val_prod_culumn = 50
            
        }
    
        } else {
    
        if (id == 156 || id == 155) { // cas des montres
    
            min_val_prod_culumn = 190
    
        }else if((id_rayon == 27) && (id != 156 || id != 155)) { // retour au phone
    
            min_val_prod_culumn = 200
    
        } else if(id == 133) {
    
            min_val_prod_culumn = 200
            
        }
    
        }
    
        var clickedElement1 = event.target;
    
        $('.rayon-nav-univers-dropdown').removeClass('rayon-nav-univers-dropdown-activated')
        $(clickedElement1).closest('.rayon-nav-univers-dropdown').addClass('rayon-nav-univers-dropdown-activated')
        rayon_default_categorie = id;
    
        var prod_categorie_taille_ecran = window.innerWidth;
        var prod_categorie_reste_division = Math.floor(prod_categorie_taille_ecran / min_val_prod_culumn);
        var init_prod_categorie_col_number = prod_categorie_reste_division;
    
        page = 1;
    
        curSlide1 = 0;
    
        $.ajax({
        type: 'GET',
        url: '/products_by_categorie/'+init_prod_categorie_col_number + '/?page' + page,
        data: {id_categorie: id, id_rayon: id_rayon},
        success: function(response) {
    
        $('.slider-content-wrapper-user').empty();
    
        if (mobile_size.matches) {
    
        showProductByScreenSiteMobile(id_rayon, response.data, id , init_prod_categorie_col_number)
    
        $('.row_div-user').css({
            'column-gap': '65px',
        });
    
        $('.custom-carousel-page-userf').css('width', '100%')
    
        } else {
    
        showProductByScreenSite(id_rayon, response.data, id , init_prod_categorie_col_number)
    
        }
    
        }
        })

    }

    }
