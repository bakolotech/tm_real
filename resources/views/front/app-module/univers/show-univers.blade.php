@extends('front.layout.main-layout')

@section('css-debut')
    <link rel="stylesheet" href="{{ asset('css/rayons/rayon_style.css')}}?v=1.0" >
@endsection

@section('navbar')

<style>

    @media screen and (max-width: 500px) {
    .main-header {
        height: 85px !important;
    }

    .header-site-icon, .header-site-logo {
        padding-bottom: 26.25px !important;
    }

    .header-site-logo a img{
        width: 145px;
        position: relative;
        top: 0px;
    }
    
    }

    @media (max-width:770px){
        #choisir-marcher-mobile {
            display: none;
        }
    }
    .mobile-container-product-result-from-api{
        height: 250px;
        overflow-y: scroll;
        margin: 0 1px 0 0;
        overflow-x: hidden;
        padding-bottom:2px;
    }

    @media screen and (max-width: 500px) {
    body, html {
        position: absolute;
        top: 0px !important;
        right: 0px !important;
        bottom: 0px !important;
        left: 0px !important;
        overflow-y: hidden !important;
        height:100% !important;
        }
    }

</style>

@section('tm_loop_de_recherche')
    <div class="search-container-template" >

    <input style="padding-left: 5px" class="search-template expandright-template" autocomplete="off" id="searchright-template" type="text" placeholder="Commencez votre recherche" onkeyup='rayonSearch_mobile("{{ url('search-from-univ/'. $univer->id) }}", this)' data-univer="{{ url('search-from-univ/'. $univer->id) }}"
    >
    <label class="button-template searchbutton-template" for="searchright-template" id="univers-btn-search-element">
        <span class="mglass-template">&#9906;</span>
    </label>


    @include('front.app-module.rayon.mobile-rayon-search')

    </div>
@endsection

<style>

.rayon-btn-direction-etat-panier {
    width: 87px;
    height: 80px;
    background-color: rgba(0,0,0,0.45);
    border: none;
    cursor: pointer;
    position: absolute;
    float: right;
    right: 0px;
    border-radius: 50% 0px 0px 50%;
    display: flex;
    justify-content: center;
    align-items: center;
    margin-top: 27vh;
}

.panier-counter {
    box-sizing: border-box;
    height: 24px;
    width: auto;
    border: 1px solid #FFFFFF;
    border-radius: 5px;
    background-color: #D0021B;
    position: absolute;
    z-index: 1000;
    color: #fff;
    float: left;
    left: 20px;
    text-align: center;
    left: 5px;
    padding: 0px 5px 5px 4px;
}

.univers-mobile-menu {
    height: 100%;
    width: 302px;
    background-color: #FFFFFF;
    margin-top: 50px;
    left: -2000px;
}

.univers-mobile-menu-child {
    height: 100%;
    width: 302px;
    z-index: 10000;
    position: absolute;
    background-color: #FFFFFF;
    left: -2000px;
    margin-top: 50px;
}

.nav-univers-mobile{
    list-style:none;
    display: block;
    padding: 0;
    margin: 0;
    list-style-type: none;
}

.univ-mobile-menu-li{
      margin-left: 0;
      padding-left: 0;
      display:inline-block;
      width: 100%;
      list-style: none !important;
      text-decoration: none !important;
      list-style-type: none !important;
}

.univ-mobile-menu-a {
    color: rgba(255,255,255,0.9);
    font-size: 0.75em;
    padding: 1.05em	1em;
    position: relative;
    display:flex;
    text-decoration: none;

    height: 14px;
    color: #4A4A4A;
    font-family: Roboto;
    font-size: 12px;
    letter-spacing: -0.29px;
    line-height: 14px;
    margin-left: 20px;

}

.mobile-univers-text {
    width: 245px;
    display: block;
    padding: 7px 0 0 5px;
}

.univ-responsive-icon {
    height: 24px;
    width: 26px;
}

.univ-rayon-responsive {
    display: none;
}

.univers-rayon-child-responsive {
    position: absolute;
    display: none;
    padding-left: 10px;
}

.univers-rayon-zone {
    display: block;
    position: absolute;
    height: 100%;
    width: 100%;
    background-color: #fff;
    z-index: 1000;
    color: #fff !important;
    display: flex;
    flex-direction: column;
    justify-content: flex-start;
    margin-left: 13px;
    top: 0px;
}

.reset_left {
    left: 0px;
}

.disapear_left {
    left: -2000px
}

.responsive-retour {
    position: absolute;
    z-index: 2000;
    background-color: transparent;
    margin-top: 10px;
    width: 100px;
    color: #1A7EF5;
    border: none;
    display: flex;
}

.slide_element_place {
    position: absolute;
    left: -302px; /* SET THE SLIDER TO BE OFFSCREEN INITIALLY */
    width: 302px;
    height: 80.3vh;
    background-color: rgba(255, 255, 255, 0.95);
    transition: 0.5s;
}

.slide_element_place-right {
    position: absolute;
    left: ;: -302px; /* SET THE SLIDER TO BE OFFSCREEN INITIALLY */
    width: 302px;
    height: 100%;
    background: #fff;
    transition: 0.5s;
}



.filtre-retour-recherche-responsive {

}

.univers-rayon-child-responsive-element {
    /* padding-top: 35px; */
    display: grid;
    grid-template-columns: 1fr 1fr;
    grid-column-gap: 5px;
    grid-row-gap: 10px
}

.univ-rayon-responsiveF {
    box-sizing: border-box;
    height: 37px;
    width: 139px;
    border: 1px solid #1A7EF5;
    border-radius: 6px;
    background-color: #FFFFFF;
    color: #4A4A4A;
    display: flex;
    align-items: center;
    justify-content: center;
}

.petite-etagere {
    text-decoration: none;
    color: #000;
    width: 103px;
    color: #4A4A4A;
    font-family: Roboto;
    font-size: 12px;
    font-weight: 500;
    letter-spacing: -0.29px;
    line-height: 14px;
    text-align: center;
}

.univers-libelle-section {
    height: 34px;
    width: 302px;
    background-color: #F5F5F5;
    display: flex;
    align-items: center;
    padding-left: 17px;
}

.univers_mobile_search {
    margin-bottom: 11px;
    position: relative;
    margin-left: auto;
    margin-right: auto;
}

.my-navbar2 {
    display: none;
    position: relative;
    z-index: 2
}

.show-hide-btn {
    display: none !important;
}

.responsive-retour {
    width: 100px;
    color: #1A7EF5;
    border: none;
    display: flex;
}

.responsive-retour-con {
    height: 25px;
    width: 27px;
    background-color: #F5F5F5;
    color: #1A7EF5;
    border-radius: 50%;
}

.responsive-retour i {
    color: #1A7EF5 !important;
    margin-right: 10px;
}

#search-results-mobile {
    width: 263px;
    max-height: 173px;
}

.mobile-search-resurt-height-0 {
    height: 0px;
}

.mobile_input_search {
    border: none;
    outline: none;
}

.mobile_input_search:focus {
    border: none;
    outline: none;
}

.mobile-menu-btn-icon {
position: absolute;
margin-left: 48px;
margin-top: 14px;
  color: #4A4A4A;
  font-family: Roboto;
  font-size: 12px;
  font-weight: 500;
  letter-spacing: -0.29px;
  line-height: 8px;
}

.retour-univers-rayon-btn {
    position: absolute;
    margin-top: -2px;
    margin-left: 15px;
}

.mobile-menu-btn-icon-close {
    position: absolute;
    margin-left: 48px;
    margin-top: 14px;
    color: #1A7EF5;
    font-family: Roboto;
    font-size: 12px;
    font-weight: 500;
    letter-spacing: -0.29px;
    line-height: 27px;
}

.fermer-x-mob {
   background-color: #F5F5F5;
   height: 36px;
    width: 36px;
    background-color: #F5F5F5;
    position: absolute;
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    margin-top: -13px;
    margin-left: -43px;
}

.fermer-x-mob img {
    text-align: center;
    margin-left: 11px;
    margin-top: 11px;
}

.chevron-alignee {
    padding: 7px 0 0 5px;
}

.responsive-retour-icon {
    background: #f8f8f8;
    width: 40px;
    height: 40px;
    border-radius: 50%;
    margin-top: -5px;
    padding: 9px 14px 12px 14px;
}

.span-return {
    margin-left: 5px;
    margin-top: 9px;
    font-size: 14px;
    font-weight: 500;
    letter-spacing: -0.29px;
    line-height: 16px;
}

.btn-menu-element-2 {
    height: 41px;
    width: 90px;
    background: #f8f8f8;
    display: flex;
    align-items: center;
    justify-content: center;
    position: relative;
    top: 4px;
    color: #1A7EF5;
    border-radius: 25px;
}

@media screen and (max-width: 500px) {
    .my-navbar {
        display: none !important;
    }
}

</style>
    <input type="hidden" id="load-menu-url" value="{{ url('univer-load-rayon') }}">

    <div class="univers-mobile-menu-child">

        <div class="filtre-retour-recherche-responsive">
            <div class="univers-libelle-section"></div>
        </div>
        <div class="univers-mobile-menu-child-content">

        </div>
    </div>

    <div class="univers-mobile-menu" style="position: absolute; z-index: 1000; border-radius: 0px 20px 20px 0px;">

    <ul class="nav-univers-mobile">
    @foreach($univers as $unUniver)

    <li class="univ-mobile-menu-li">
        <a href="#" class="univ-mobile-menu-a">
            <img class="owl-lazy logo-normal univ-responsive-icon" src="{{ $unUniver->getIconLink() }}" alt="">
            <span class="mobile-univers-text">
                {{ str_replace('Univers', '', strtoupper($unUniver->getLibelle())) }}
            </span>
            <span>

            <i class="fas fa-chevron-right chevron-alignee" style="color: #4A4A4A"></i>
           </span>
        </a>
        <div class="univers-rayon-child-responsive" style="padding-top: 10px">
           <div class="univers-rayon-child-responsive-element">
            @foreach($unUniver->rayons as $rayon)
            <div class="univ-rayon-responsiveF" data-sort = "{{ $rayon->slug }}">
                <a class="petite-etagere" href="{{ url('rayon/'. $rayon->id .'/'. $rayon->slug) }}">
                    {{ strtoupper($rayon->slug) }}
                </a>
            </div>
        @endforeach
           </div>
        </div>
    </li>

    </ul>
    @endforeach
    </div>

    @include('front.app-module.univers.includes.mobile_menu_left')
    @include('front.app-module.univers.includes.univers_desktop_menu')
    @include('front.app-module.univers.includes.filter-box')
    @endsection

@section('search-bar')
<div class="rayon-bloc-recherche">
<div class="formRayonSearch_input my-form-field br-l input-recherche" style="width: inherit; z-index: 12" tabindex="0">
    <input onkeyup='rayonSearch("{{ url('search-from-univ/'. $univer->id) }}", this)' data-univer="{{ url('search-from-univ/'. $univer->id) }}" placeholder="Commencez votre recherche..." type="text" class=""  name="formRayonSearch_text" id="formRayonSearch_text-input" style="height: 34px;">
    <div class="icon-note-vocal">
        <i class="fal fa-microphone-alt text-danger"></i>
    </div>
</div>
<div class="formRayonSearch_button">
    <button class="button-recherche mon-btn-primary" type="submit">
        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="#fff" class="bi bi-search" viewBox="0 0 16 16">
            <path d="M11.742 10.315a6.5 6.5 0 1 0-1.427 1.427l3.823 3.822a1 1 0 0 0 1.415-1.414l-3.822-3.823zM2 6.5a4.5 4.5 0 1 1 9 0a4.5 4.5 0 0 1-9 0z"/>
        </svg>
    </button>
</div>
</div>
@include('front.app-module.univers.includes.rayon-search-results')
@endsection

@section('contenu')
    <div class="rayon-main-div" id="rayon-main-div-id">

        <div class="rayon-btn-direction-legume-left  prev-div-btn my-slick-btn-2 show-univ-left-btn" onclick="prevRayon()" style="z-index:100">
            <button class="btn-left btn-direction" style="border-radius: 0px 50% 50% 0px">
                <img class="img-direction-btn" src="{{ asset('assets/images2/prec.svg') }}" alt="">
            </button>
        </div>

        <div class="rayon owl-carousel" id="rayon-carousel-element">
            @if($univer->id == 7)
            @php

            $rayon_array = $univer->rayons;
            $reversed_array = $rayon_array->reverse();

            $first_element = $reversed_array->splice(0,1)->first();
            $fourth_element = $reversed_array->splice(2, 1)->first();

            $reversed_array->push($first_element);

            $reversed_array->push($fourth_element);

            @endphp
            @foreach($reversed_array as $rayon)
                <div class="une-etagere item" data-sort = "{{ $rayon->slug }}">
                    <a class="petite-etagere" href="{{ url('rayon/'. $rayon->id .'/'. $rayon->slug) }}">
                        <img class="etagere-img owl-lazy" data-src="{{ $rayon->getPEtagereLink() }}" alt="">
                    </a>
                </div>
            @endforeach
            @elseif($univer->id == 4)
            @php

            $rayon_array = $univer->rayons;
            // $reversed_array = $rayon_array->reverse();

            $third_element = $rayon_array->splice(3, 1)->first();
            $second_element = $rayon_array->splice(2, 1)->first();

            $rayon_array->push($third_element);

            $rayon_array->push($second_element);

            @endphp
            @foreach($rayon_array as $rayon)
                <div class="une-etagere item" data-sort = "{{ $rayon->slug }}">
                    <a class="petite-etagere" href="{{ url('rayon/'. $rayon->id .'/'. $rayon->slug) }}">
                        <img class="etagere-img owl-lazy" data-src="{{ $rayon->getPEtagereLink() }}" alt="">
                    </a>
                </div>
            @endforeach
            @else
            @foreach($univer->rayons as $rayon)
            <div class="une-etagere item" data-sort = "{{ $rayon->slug }}">
                <a class="petite-etagere" href="{{ url('rayon/'. $rayon->id .'/'. $rayon->slug) }}">
                    <img class="etagere-img owl-lazy" data-src="{{ $rayon->getPEtagereLink() }}" alt="">
                </a>
            </div>
            @endforeach
            @endif
        </div>

        <div class="rayon-mobile owl-carousel-mobile owl-carousel-mobile-custom" id="rayon-carousel-element-mobile" style="display: none">
            @if($univer->id == 7)
            @php

            $rayon_array = $univer->rayons;
            $reversed_array = $rayon_array->reverse();

            $first_element = $reversed_array->splice(0,1)->first();
            $fourth_element = $reversed_array->splice(2, 1)->first();

            $reversed_array->push($first_element);

            $reversed_array->push($fourth_element);

            @endphp
            @foreach($reversed_array as $rayon)
                <div class="une-etagere item" data-sort = "{{ $rayon->slug }}">
                    <a class="petite-etagere" href="{{ url('rayon/'. $rayon->id .'/'. $rayon->slug) }}">
                        <img class="etagere-img owl-lazy" data-src="{{ $rayon->getPEtagereLink() }}" src="{{ $rayon->getPEtagereLink() }}" alt="">
                    </a>
                </div>
            @endforeach
            @elseif($univer->id == 4)
            @php

            $rayon_array = $univer->rayons;
            // $reversed_array = $rayon_array->reverse();

            $third_element = $rayon_array->splice(3, 1)->first();
            $second_element = $rayon_array->splice(2, 1)->first();

            $rayon_array->push($third_element);

            $rayon_array->push($second_element);

            @endphp
            @foreach($rayon_array as $rayon)
                <div class="une-etagere item" data-sort = "{{ $rayon->slug }}">
                    <a class="petite-etagere" href="{{ url('rayon/'. $rayon->id .'/'. $rayon->slug) }}">
                        <img class="etagere-img owl-lazy" data-src="{{ $rayon->getPEtagereLink() }}" src="{{ $rayon->getPEtagereLink() }}" alt="">
                    </a>
                </div>
            @endforeach
            @else
            @foreach($univer->rayons as $rayon)
            <div class="une-etagere item" data-sort = "{{ $rayon->slug }}">
                <a class="petite-etagere" href="{{ url('rayon/'. $rayon->id .'/'. $rayon->slug) }}">
                    <img class="etagere-img owl-lazy" data-src="{{ $rayon->getPEtagereLink() }}" src="{{ $rayon->getPEtagereLink() }}" alt="">
                </a>
            </div>
            @endforeach
            @endif
        </div>

        <div class="rayon-btn-direction-legume next-div-btn my-slick-btn-2 show-univ-left-btn" onclick="nextRayon()" style="border-radius: 50% 0px 0px 50%; z-index:100">
            <button class="btn-direction-faux btn-right-small" style="background: transparent">
                <img class="img-direction-btnd" src="{{ asset('assets/images2/Next.svg') }}" alt="">
            </button>
        </div>

        <div class="rayon-btn-direction-etat-panier next-div-btn my-slick-btn-2-12" onclick="loadPanier()" style="z-index:100">
            @if(isset($_SESSION['panier']) && count($_SESSION['panier']) > 0)
            @php
                $nbre_element = 0;
                for($i = 0, $size = count($_SESSION['panier']); $i < $size; ++$i) {
                    $nbre_element += $_SESSION['panier'][$i]['quantite'];
                }
            @endphp
            <span class="panier-counter text-center" id="nbr_panier1">
                {{ $nbre_element }}
            </span>
            @endif
        <button class="btn-direction btn-right">
            <img class="img-direction-btn" src="{{ asset('assets/images/icons/Chariot-panier.svg') }}" alt="">
        </button>
    </div>

    {{-- <div></div> --}}
    <span class="hidden-univers-id-section">
        <input type="hidden" value="{{$univer->id}}" id="univer-id-for-search">
    </span>

    </div>

@endsection


@section('js-debut')

@endsection


@section('js-fin')
<script src="{{ asset('js/rayons/rayons_helpers.js') }}"></script>
<script>

    // Function to initialize Owl Carousel
function initializeUniversOwlCarousel(loop_val) {
    var owl_r = $('.rayon').owlCarousel({
    loop:loop_val,
    nav:true,
    autoplay:false,
    lazyLoad: true,
    navText: [
        "<button type='button' class='d-none' id='etageres-prev-btn'></button>",
        "<button type='button' class='d-none' id='etageres-next-btn'></button>"
    ],
    responsive:{
        0:{
            items:1,
            center: true,
            // mergeFit:true,
        },
        800:{
            items:2
        },
        1250:{
            items: 5
        }
    },
    beforeInit : function(elem){
        //Parameter elem pointing to $("#owl-demo")
        // filterByAtoZ(elem);
    },

    afterInit: function() {
        filterByAtoZ()
    }


});

return owl_r;
}
    jQuery(document).ready(function () {

        $('.rayon-nav-slide').owlCarousel({
            loop:true,
            nav:true,
            autoplay:false,
            lazyLoad: true,
            pagination: false,
            navText: [
                "<button type='button' class='d-none' id='rayon-nav-prev-btn'></button>",
                "<button type='button' class='d-none' id='rayon-nav-next-btn'></button>"
            ],
            responsive:{
                0:{
                    items:1
                },
                800:{
                    items:2
                },
                1250:{
                    items:3
                },
                1350: {
                    items: 4.8
                },
                1500: {
                    items: 5.8
                }
            }
        });

        if (window.matchMedia("(max-width: 767px)").matches) {

        $('#rayon-carousel-element').css('display', 'none')

        $('#rayon-carousel-element-mobile').css({
            'display' : 'flex',
            'overflow-x' : 'scroll' 
        })

        // $('.une-etagere').addClass('d-zoom')

        $('.une-etagere').css({
            'position': 'relative',
            'top': '-30px',
            // 'transform': 'scale(0.95)'
        })

        var all_mobile_carousel_item = $('#rayon-carousel-element-mobile').find('.une-etagere');
        $(all_mobile_carousel_item[0]).addClass('d-zoom-mobile')

        }else {
            initializeUniversOwlCarousel(true)
        }

        // var owl_r = $('.rayon').owlCarousel({
        //     loop:true,
        //     nav:true,
        //     autoplay:false,
        //     lazyLoad: true,
        //     navText: [
        //         "<button type='button' class='d-none' id='etageres-prev-btn'></button>",
        //         "<button type='button' class='d-none' id='etageres-next-btn'></button>"
        //     ],
        //     responsive:{
        //         0:{
        //             items:2.1,
        //             center: true,
        //             // onDragged: phoneCallBack
        //         },
        //         800:{
        //             items:2
        //         },
        //         1250:{
        //             items: 5
        //         }
        //     },
        //     beforeInit : function(elem){
        //         //Parameter elem pointing to $("#owl-demo")
        //         // filterByAtoZ(elem);
        //     },

        //     afterInit: function() {
        //         filterByAtoZ()
        //     }


        // });

    function phoneCallBack(event) {
        var active_owl = $(".rayon").find(".owl-item");
        var items     = event.item.count;
        var item      = event.item.index;
        console.log('You really dragged me !', active_owl[item])

        $(active_owl[item]).css({
            'position': 'relative',
            'left': '-45px'
        })

        $(active_owl[item+1]).css({
            'position': 'relative',
            'left': '25px'
        })

        $(active_owl[item-1]).css({
            // 'background-color': 'blue',
            'position': 'relative',
            'left': '-75px'
        })

    }

    $('#filter-by-az-div').on('click', function() {

        var items = $('#rayon-carousel-element').find('.une-etagere');
        var tab_unique = [];

        if ($(this).attr('data-is-active') == 1) {
            items.sort(function(a, b) {
            var libelle12 = $(a).attr('data-sort').toUpperCase()
            var libelle123 = $(b).attr('data-sort').toUpperCase()
            var contentA = $(a).text().toUpperCase();
            var contentB = $(b).text().toUpperCase();
            return (libelle12 < libelle123) ? -1 : (libelle12 > libelle123) ? 1 : 0;
        });

        $.each(items, function(i, item) {
            let lib_r = $(item).attr('data-sort')
            tab_unique[lib_r] = item
        });

        var tab_def = []

        for (const property in tab_unique) {
            tab_def.push(tab_unique[property])
        }


        $('.rayon').trigger('replace.owl.carousel', [tab_def]).trigger('refresh.owl.carousel');
        deZoom()
        }else {
            console.log('Checked false')
        }


        // window.dispatchEvent(new Event('resize'));

    })

    window.addEventListener('load', deZoom);

    $('.univ-mobile-menu-li').click(function() {
        $('.univers-mobile-menu-child-content').empty();
        $('.univers-libelle-section').empty();

        console.log('You are clicking here man ... ')
        $('.icon-menu-2').addClass('show-hide-btn')
        $('.icon-menu-3').removeClass('show-hide-btn')
        $('.retour-univers-rayon-btn').removeClass('show-hide-btn')

        $(this).find('.univ-responsive-icon').clone().appendTo('.univers-libelle-section')
        $(this).find('.mobile-univers-text').clone().appendTo('.univers-libelle-section')
        var univ_child = $(this).find('.univers-rayon-child-responsive');

        $('.univers-mobile-menu-child').css('left', '0px')
        $('.univers-mobile-menu-child').addClass('slide_element_place')

        setTimeout(() => {
            $('.univers-rayon-child-responsive').css('display', 'block')
        }, 700);

        $(univ_child).clone().appendTo('.univers-mobile-menu-child-content')

    })

    $('.icon-menu-1').click(function() {
        console.log('Zone 1')
        if ($('.univers-mobile-menu').hasClass('slide_element_place')) {
            $('.univers-mobile-menu').css('left', '-302px')
            $('.univers-mobile-menu').removeClass('slide_element_place')
            $('.univers-mobile-menu').addClass('slide_element_place-right')

            $('.icon-menu-1').removeClass('show-hide-btn')
            $('.icon-menu-2').addClass('show-hide-btn')
        }else {
            $('.icon-menu-1').addClass('show-hide-btn')
            $('.icon-menu-2').removeClass('show-hide-btn')
            $('.univers-mobile-menu').css('left', '0px')
            $('.univers-mobile-menu').addClass('slide_element_place')
        }

    })

    $('.icon-menu-2').click(function() {
    console.log('Deuxième menu')
    if ($('.univers-mobile-menu').hasClass('slide_element_place')) {
        $('.univers-mobile-menu').css('left', '-302px')
        $('.univers-mobile-menu').removeClass('slide_element_place')
        $('.univers-mobile-menu').addClass('slide_element_place-right')

        $('.icon-menu-1').removeClass('show-hide-btn')
        $('.icon-menu-2').addClass('show-hide-btn')
    }else {
        $('.icon-menu-1').removeClass('show-hide-btn')
        $('.icon-menu-2').addClass('show-hide-btn')
        $('.univers-mobile-menu').css('left', '0px')
        $('.univers-mobile-menu').addClass('slide_element_place')
    }

    })

    $('#mobile-search-resurt').mouseleave(function() {
        // closeResultBloc();
        console.log('Mouse leaving section')
        $('.search-result-blocd').css('height', '0px')
        $('.search-result-blocd').css('transition', '0.5s')
    })

    document.getElementById("searchright-template").addEventListener("change",function(){
        document.getElementById("mobile-search-resurt").classList.remove("mobile-search-resurt-height-145")
        document.getElementById("searchright-template").value=""
    })

})

    function onlyUnique(value, index, self) {
        return self.indexOf(value) === index;
    }

    function showSectionRecherched() {

        if ($('.search-result-blocd').hasClass('mobile-search-resurt-height-145')) {
            $('.search-result-blocd').removeClass('mobile-search-resurt-height-145')
            $('.search-result-blocd').css('transition', '0.5s')
        }else {
            $('.search-result-blocd').addClass('mobile-search-resurt-height-145')
        }

    }

    function closeUniversElement() {
        // $('.retour-univers-rayon-btn').addClass('show-hide-btn')

        $('.icon-menu-3').addClass('show-hide-btn')
        $('.icon-menu-1').addClass('show-hide-btn')
        $('.icon-menu-2').removeClass('show-hide-btn')

        // $('.mobile_menu_btn').removeClass('show-hide-btn')
        $('.univers-rayon-child-responsive').css('display', 'none')
        $('.univers-mobile-menu-child').css('left', '-2000px')
    }

    function sortByAlphabet() {
        var owl = $("#rayon-carousel-element").data('owlCarousel');
        owl.addItem('<div/>', 0);
        var nb = owl.itemsAmount;

        for (var i = 0; i < (nb - 1); i++) {
            owl.removeItem(1);
        }

        if (cat == 'all') {
            $('#projects-copy .project').each(function() {
                owl.addItem($(this).clone());
            });
        } else {
            $('#projects-copy .project.' + cat).each(function() {
                owl.addItem($(this).clone());
            });
        }
    }

    function filterByAtoZ() {

        var items = $('#rayon-carousel-element').find('.item');

        items.sort(function(a, b) {
            var libelle12 = $(a).attr('data-sort').toUpperCase()
            var libelle123 = $(b).attr('data-sort').toUpperCase()
            var contentA = $(a).text().toUpperCase();
            var contentB = $(b).text().toUpperCase();
            return (libelle12 < libelle123) ? -1 : (libelle12 > libelle123) ? 1 : 0;
        });

        // $('.rayon').trigger('replace.owl.carousel', [items]);
        $.each(items, function(i, item) {
            owl_r.append(item);
        });

    }

    $(document).ready(function() {
        var tablet_size_listener_min_width = matchMedia("(max-width: 500px)");
        if(tablet_size_listener_min_width.matches) {

            var active_owl = $(".rayon").find(".owl-item");
            $('.owl-stage').css('width', '2500px')

            var scroll_height = $(this).scrollTop();
            $(this).css({
                'top': scroll_height
            })

        }
    })

    $(document).ready(function() {

    $('#rayon-carousel-element-mobile').on('scroll', function() {

        const univers_rayon_container = document.querySelector('.owl-carousel-mobile-custom');

        const scrollLeft = univers_rayon_container.scrollLeft;
        const containerWidth = univers_rayon_container.clientWidth;
        const items = univers_rayon_container.querySelectorAll('.une-etagere');

        let visibleItem = null;

        let total_mobile_carousel_section = items.length*containerWidth

        items.forEach((item, index) => {

        const itemOffsetLeft = item.offsetLeft;
        const itemWidth = item.clientWidth;

        if((itemOffsetLeft >= scrollLeft) && (itemOffsetLeft + itemWidth <= scrollLeft + containerWidth)) {
            visibleItem = item;
            $('.une-etagere').removeClass('d-zoom-mobile')
            $(item).addClass('d-zoom-mobile')
        } else {
            // $(item).removeClass('d-zoom-mobile')
        }

        })

        if(visibleItem) {
            console.log('Visible item:', visibleItem)
        }else {
            console.log('Nous n\'avons pas encore trouvé l`\élément active')
        }

    });

    })

    function show_univ_preview(id, slug) {
        var url = '/univ/'+id+'/'+slug
        window.location.href = url;
    }


    </script>
@endsection
