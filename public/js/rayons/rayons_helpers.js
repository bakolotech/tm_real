
const univers_btn_search = document.getElementById('univers-btn-search-element')

$(document).ready(function() {

    $('#searchright-template-btn').on('click', function() {

        $('#searchright-template').addClass('open-seach-field')
        // $('#searchright-template').focus()

    })

    $('#xyz-scroll-bar').on('scroll', function() {

        let seached_key = $('#public-token').val();
        let searched_text = $('#searchright-template').val();
        var univers_id = $('#univer-id-for-search').val()

        var x = $(this).scrollTop() + $(this).innerHeight()
        var y = $(this)[0].scrollHeight

        console.log('Id univers => ', univers_id)

        // if (x >= y) {

            skip_value = skip_value + 10;
            data = {
                _token: seached_key,
                value: searched_text,
                skip_value: skip_value
            }

            console.log('Scrolling data now ... ')

            let str = '';
            // request = ajax(url, {_token: seached_key, value: searched_text, skip_value: skip_value}, 'post');
            $.ajax({
            type: 'POST',
            url: '/search-from-univ/'+univers_id,
            data: data,
            success: function(retour) {

            console.log('The retured data ', retour)

            $.each(retour[0].resultats, function (key, value) {
                str += modelRecherche3(value, searched_text, 0);
            })
            $('#search-results-mobile').append(str)
            }
            })
        // }

    })

    $('#xyz-resultat-search').on('scroll', function() {

        let seached_key = $('#public-token').val();
        let searched_text = $('#searchright-template').val();
        var univers_id = $('#univer-id-for-search').val()

        console.log('Votre id univers est bien => ', univers_id)

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
            // request = ajax(url, {_token: seached_key, value: searched_text, skip_value: skip_value}, 'post');
            // $.ajax({
            // type: 'POST',
            // url: '/search-from-univ/'+univers_id,
            // data: data,
            // success: function(retour) {
            // console.log('Retour => ', retour)
            // $.each(retour[0].resultats, function (key, value) {
            //     str += modelRecherche2(value, searched_text, 0);
            // })
            // $('#search-results').append(str)
            // }
            // })
        }
    })

    $('#rayon-search-results-bloc').on('scroll', function() {

        console.log('Scrolling data ... ')

        // console.log('Scroll started ...')
        // let seached_key = $('#public-token').val();
        // let searched_text = $('#searchright-template').val();

        // var x = $(this).scrollTop() + $(this).innerHeight()
        // var y = $(this)[0].scrollHeight

        // if (x >= y) {

        //     skip_value = skip_value + 10;
        //     data = {
        //         _token: seached_key,
        //         value: searched_text,
        //         skip_value: skip_value
        //     }

        //     let str = '';
        //     // request = ajax(url, {_token: seached_key, value: searched_text, skip_value: skip_value}, 'post');
        //     $.ajax({
        //     type: 'POST',
        //     url: '/search-from-univ/3',
        //     data: data,
        //     success: function(retour) {

        //     $.each(retour[0].resultats, function (key, value) {
        //         str += modelRecherche3(value, searched_text, 0);
        //     })
        //     $('#search-results-mobile').append(str)
        //     }
        //     })
        // }
    })

    document.getElementById('rayon-main-div-id').addEventListener("click", function(event) {
        setTimeout(function(){
            inputElement_tm.classList.remove('open-seach-field')
        }, 300)
    });

    $('.my-navbar2').on('click', function() {
        setTimeout(function(){
            inputElement_tm.classList.remove('open-seach-field')
        }, 300)
    })

    $('.button-template').on('click', function() {

        let input_val = $("#searchright-template").val();
        let logo_zone = $('.header-site-logo').offset().left;
        var logo_width = $('.header-site-logo').width();
        
        var loop_element = $('#univers-btn-search-element').offset().left + 15

        console.log('The offset is => ', logo_zone, 'Logo width => ', logo_width, 'loop zone => ', loop_element)

        $('#searchright-template').css({
            'width': loop_element+'px'
        })

        $('#mobile-search-resurt-hidden').css({
            'width': loop_element+'px'
        })

        if (input_val.length > 0) {
            rechercheBySubmit(input_val)
        }

        $('#searchright-template').addClass('open-seach-field')

    })

    $('#nav-slide').on('scroll', function() {
        console.log('Control scroll ...')
    })

})


document.getElementById('nav-slide').addEventListener('scroll', function() {

    const nav_list = document.getElementById('nav-slide')
    const nav_list_items = $(nav_list).find('.item')

    var push_elemement = []

    const left_element = document.querySelector('.mobile-hide-container-icon-link-blue')
    const right_compare_element = document.getElementById('filter_for_mobile_delimiter')

    const rect1 = left_element.getBoundingClientRect();
    const rect2 = right_compare_element.getBoundingClientRect();

    var fixed_left_element_right_side = rect1.right
    var fixed_right_element_left_side = rect2.left;

    nav_list_items.each((index, element) => {

    const item_position = $(element).get(0).getBoundingClientRect();
    const item_position_left = item_position.left;
    const item_position_right = item_position.right

    const item_left_ecart = item_position_left - fixed_left_element_right_side
    const item_right_ecart = fixed_right_element_left_side - item_position_right

    if ((item_left_ecart > 0) && (item_right_ecart > 0)) {
        $(element).addClass('active-nav-list-btn-item')
        $(element).removeClass('mobile-default-style-border-blue')
        $(element).removeClass('desabled-rayon-categorie')
        push_elemement.push(element)
    } else {
        $(element).removeClass('active-nav-list-btn-item')
        $(element).removeClass('mobile-default-style-border-blue')
        $(element).addClass('mobile-default-style-border-grey')
        $(element).addClass('desabled-rayon-categorie')
    }

    });

})

const touchDiv = document.getElementById('rayon-main-div-id');
const inputElement_tm = document.getElementById("searchright-template");

touchDiv.addEventListener('touchstart', function(event) {
    document.getElementById('searchright-template').focusout()
    document.getElementById('searchright-template').blur()
});

// Add a touchstart event listener to the document to blur the input when clicking elsewhere
document.addEventListener("touchstart", function(event) {
    if (event.target !== inputElement_tm) {
        inputElement_tm.blur();
    }
});

var btn_mobile_search = document.getElementById('searchright-template-btn')

document.addEventListener("click", function(event) {

    if (event.target !== btn_mobile_search) {
        $('.search-result-blocd').slideUp("fast")
    }

});

var current_content = []

function loadAllUniversRayons(id) {

    var tablet_size_listener_min_width = matchMedia("(max-width: 500px)");

    if(tablet_size_listener_min_width.matches) {
        var contenu_actuel = $('#nav-slide').attr('data-content-type');
        if (contenu_actuel == 'categorie') {
            current_content = $('#nav-slide').find('.rayon-nav-univers-dropdown')
            $.ajax({
                type: 'GET',
                url: '/univers_rayons/'+id,
                data: {},
                success: function(response_element) {
        
                if(response_element.length > 0) {
                $('#nav-slide').attr('data-content-type', "rayons")
                $('#nav-slide').empty()
        
                response_element.forEach(element => {
                    console.log('Every rayon is => ', element)
        
                    var rayon = `
                        <div class="rayon-nav-univers-dropdown mobile-container-others-element mobile-default-style-border-grey item" data-slug="${element.slug}" id="categorie-rayon-${element.id}" onclick="sortByFamille(event, null, ${element.id})" data-opened="0">
                        <div class="rayon-nav-univers-content mobile-famille-libelle mobile-famille-libelle-1" style="display: flex; justify-content: center; color: rgb(25, 25, 112);">
                            <div class="text-block">
                            <div class="rayon-nav-univer-text">
                            <p>
                                ${element.libelle}
                            </p>
                            </div>
                            </div>
                        </div>
                    </div>
                    `
        
                    $('#nav-slide').append(rayon)
        
                });
        
                }
        
                }
            })
        }else {
            $('#nav-slide').empty()
            $('#nav-slide').attr('data-content-type', "categorie")
            console.log('The saved data is => ', current_content)
            $('#nav-slide').html(current_content)
            console.log('Data content type is rayon now')
        }
    }

}

function closeCartePaiement() {
    $('#panier-mobile-mode-paiement-1').addClass('panier-mobile-hidden')
    $('#panier-mobile-mode-paiement-2').addClass('panier-mobile-hidden')
    $('#panier-mobile-mode-paiement-3').addClass('panier-mobile-hidden')
    $('.panier-mobile-card-container').addClass('panier-mobile-hidden')
}