var skip_value = 0
var searched_text = ""
var seached_key = ""

function modelRecherchePartage(resultat, searchStr = null, in_rayon) {

    console.log('Les données à observer sont => ', resultat.sous_categorie)
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
        "            <div class='text-recherche ' onclick=onclick=showSeachedProduct("+resultat.id+','+rayon_id+")  style='display: flex;align-items: center;'>\n" +
        "                <p class='p1 p-0 m-0 ' >"+ boldString(resultat.libelle, searchStr) + " <span class='result-text'>dans <a href='#' >"+ resultat.sous_categorie.famille.rayon.univer.libelle +"</a></span></p>\n" +
        "            </div>\n" +
        "        </div>\n" +
        "    </div>\n" +
        "</div>"
    }
}

jQuery(document).ready(function () {
    let oldSearchStr = '';
    $('#ma-recherche').keyup(function () {

    let request;
    let texte = $(this).val()

    searched_text = texte; // Text to search globaly

    if (oldSearchStr !== texte) {
    let url = $(this).attr('data-url')
    let key = $(this).attr('data-key')
    seached_key = key  // La clé token
    let champResultat = $('#seach-resultat');
    if (texte && texte.length > 1) {
    
    skip_value = 0;  // Initialisez la valeur to skip

    $('#clean-main-search-text-id').removeClass('d-none')
     request = ajax(url, {_token: key, value: texte, skip_value: skip_value}, 'post');
    request.then(function (retour) {

    if (retour[0].error == 0 && (retour[0].resultats).length > 0) {
        champResultat.html('');
        $.each(retour[0].resultats, function (key, value) {
            setTimeout(() => {
            if (key == 0) {
                champResultat.html(modelRecherche(value, texte))
            } else champResultat.append(modelRecherche(value, texte))
            }, 300)
        })
    } else champResultat.html('<span style="color: red; margin-left: 6rem; position: relative; top: 50px; font-size: 18px; font-weight: 500">Aucun resultat trouvé</span>');

    })

    request.catch(function (retour) {
    })
    } else {
        champResultat.html('');
    }
    oldSearchStr = texte;
        }
    })

    $('#clean-main-search-text-id').on('click', function() {

        if(!$('#val-image-libelle-1').hasClass('d-none')) {
            $('#val-image-libelle-1').addClass('d-none')
        }

        $('#searchbyText-result').removeClass('d-none')
        $('#searchbyImage-result').addClass('d-none')

        $(this).addClass('d-none')
        $('#ma-recherche').val("");
        $('#ma-recherche').focus()
        $('#seach-resultat').empty()

    })

    $('#formRayonSearch_text-input_partager').keyup(function () {
        
    let request;
    let texte = $(this).val()
    let str = '';

    openPartageResultBloc()

    searched_text = texte; // Text to search globaly

    if (oldSearchStr !== texte) {
    let url = '/main-search-partage-boutique'
    let key = $(this).attr('data-key')
    seached_key = key  // La clé token
    let champResultat = $('#seach-resultat');
    if (texte && texte.length > 1) {
    
    skip_value = 0;  // Initialisez la valeur to skip

    $('#clean-main-search-text-id').removeClass('d-none')
    request = ajax(url, {_token: key, value: texte, skip_value: skip_value, boutique_id: boutique_partager_id}, 'post');
    request.then(function (retour) {

    if (retour[0] && retour[0].resultats.length > 0){
        $.each(retour[0].resultats, function (key, value) {
            str += modelRecherchePartage(value, texte, retour[0].in_rayon);
        })
        $('#partage-search-results-bloc #partage-xyz-resultat-search').html(str)
    }
    else{
        str = "<div class='not-result-found'>\n" +
                "    <div>Aucun résultat trouvé</div>\n" +
                "</div>"
        $('#partage-search-results-bloc #search-results').html(str)
    }

    })

    request.catch(function (retour) {
    })
    } else {
        champResultat.html('');
    }
    oldSearchStr = texte;
        }
    })

})

/**
 * Model de résultat de la recherche
 * @param resultat
 * @param searchStr
 * @returns {string}
 */

var tab_historique_prod = [];

function modelRecherche(resultat, searchStr = null) {
    var rayon_id =  resultat.sous_categorie.famille.rayon.id;
    var rayon_slug = resultat.sous_categorie.famille.rayon.slug
    var id_produit = resultat.id;

    return "<div class='row'>\n" +
        "                    <div class='col-md-12 offset-md-3k produit-recherche'>\n" +
        "                        <div class='d-flex justify-content-start' onclick=redirectRayonFromMain('/rayon/"+rayon_id+"/"+rayon_slug+"','"+id_produit+"')>\n" +
        "                            <div class='icon-recherhce'><img src='../assets/images2/Recherche.svg' alt=''></div>\n" +
        "                            <div class='text-recherche'>\n" +
        "                                <p class='p1 p-0 m-0'>"+ boldString(resultat.libelle, searchStr) +"</p>\n" +
        "                                <p class='p2 p-0 m-0'> <span style='color: #4A4A4A !important'> dans</span> "+ resultat.sous_categorie.famille.rayon.univer.libelle +" - "+ resultat.sous_categorie.famille.rayon.libelle +"</p>\n" +
        "                            </div>\n" +
        "                        </div>\n" +
        "                    </div>\n" +
        "                </div>"
}

function modelRecherchePartage2(resultat, searchStr = null) {
    var rayon_id =  resultat.sous_categorie.famille.rayon.id;
    var rayon_slug = resultat.sous_categorie.famille.rayon.slug
    var id_produit = resultat.id;

    return "<div class='row'>\n" +
        "                    <div class='col-md-12 offset-md-3k produit-recherche'>\n" +
        "                        <div class='d-flex justify-content-start' onclick=redirectRayonFromMain('/rayon/"+rayon_id+"/"+rayon_slug+"','"+id_produit+"')>\n" +
        "                            <div class='icon-recherhce'><img src='../assets/images2/Recherche.svg' alt=''></div>\n" +
        "                            <div class='text-recherche'>\n" +
        "                                <p class='p1 p-0 m-0'>"+ boldString(resultat.libelle, searchStr) +"</p>\n" +
        "                                <p class='p2 p-0 m-0'> <span style='color: #4A4A4A !important'> dans</span> "+ resultat.sous_categorie.famille.rayon.univer.libelle +" - "+ resultat.sous_categorie.famille.rayon.libelle +"</p>\n" +
        "                            </div>\n" +
        "                        </div>\n" +
        "                    </div>\n" +
        "                </div>"
}

function boldString(str, find) {
    var reg = new RegExp('('+find+')', 'gi');
    return str.replace(reg, '<b class="mot-recherche">$1</b>');
}

function redirectRayonFromMain(redirectRayon, id_produit) {
    var id_produit = id_produit

    localStorage.setItem('searched_product', JSON.stringify(id_produit))
    var searched_product = JSON.parse(window.localStorage.getItem('searched_product'));
    console.log('Id recherché est bien => ', searched_product)

    $.ajax({
        type: 'POST',
        url: '/laisser_nous_deviner',
        data: {id_produit: id_produit},
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        success: function(response) {
            var id_p = id_produit;

            var p_exist = false;
            
            if (response['connected'] == true) {
                console.log('Le retour du user connected:', response)
            }else {
                var tab_produit = [];
                tab_produit = JSON.parse(localStorage.getItem('cached_product'));

                if (tab_produit == null || tab_produit.length == 0) {
                    tab_produit = []
                    tab_produit.push(response.produit)
                    localStorage.setItem('cached_product', JSON.stringify(tab_produit));
                }else {
                    if (tab_produit.length > 0) {
                        console.log('Nous sommes dans la zone else', tab_produit)
                    for (let h = 0; h < tab_produit.length; h++) {

                        if (tab_produit[h]['id_produit'] == id_p) {
                            p_exist = true
                         }

                    }
                    if (p_exist == false) {
                        tab_produit.push(response.produit)
                        localStorage.setItem('cached_product', JSON.stringify(tab_produit));
                    }else if(p_exist == true) {
                    }

                    }
                }

            }

            window.location.href = redirectRayon

        },
        error: function(error) {
            console.log('Une erreur s\'est produite')
        }
    })

}


function show_partager_searched_product(id, rayon_id) {

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
    $('#flle-item-'+rayon_id).addClass('rayon-nav-univers-dropdown-activated')

    partager_seached_rayon_val = rayon_id

    showProductByScreenSite_bis(rayon_id, data_product.data, init_product_col_number)
    
    $('#image-prod-id'+id).addClass('produit-show-effect')

    },
    complete: function() {
        setTimeout(function() {
            window.localStorage.removeItem('searched_product')
        }, 10000)
    }
    })


  }

function showSeachedProduct(produit_id, rayon_id) {
    show_partager_searched_product(produit_id, rayon_id)
}

$('#xyz-resultat-search').on('scroll', function() {

    let seached_key = $('#public-token').val();
    let searched_text = $('#searchright-template').val();
    var univers_id = $('#univer-id-for-search').val()

    var x = $(this).scrollTop() + $(this).innerHeight()
    var y = $(this)[0].scrollHeight

    if (x >= y) {

        skip_value = skip_value + 10;
        data = {
            _token: seached_key,
            value: searched_text,
            skip_value: skip_value
        }

        let str = '';

        $.ajax({
        type: 'POST',
        url: '/search-from-univ/'+univers_id,
        data: data,
        success: function(retour) {
        console.log('Retour => ', retour)
        $.each(retour[0].resultats, function (key, value) {

            str += modelRecherchePartage(value, searched_text, 0);

        })

        $('#rayon-search-results-bloc #xyz-resultat-search').append(str)

        }
        })
    }
})


$('#partage-xyz-resultat-search').on('scroll', function() {

    let seached_key = $('#public-token').val();
    let searched_text = $('#formRayonSearch_text-input_partager').val();

    var x = $(this).scrollTop() + $(this).innerHeight()
    var y = $(this)[0].scrollHeight

    if (x >= y) {

        skip_value = skip_value + 10;

        data = {
            _token: seached_key,
            value: searched_text,
            skip_value: skip_value,
            boutique_id: boutique_partager_id
        }

        let str = '';

        $.ajax({
        type: 'POST',
        url: '/main-search-partage-boutique',
        data: data,
        success: function(retour) {
        console.log('Retour => ', retour)
        $.each(retour[0].resultats, function (key, value) {

            str += modelRecherchePartage(value, searched_text, 0);

        })

        $('#partage-search-results-bloc #partage-xyz-resultat-search').append(str)

        }
        })
    }
})