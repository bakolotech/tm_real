<?php
    $ciel = "background: url(".\App\Http\Controllers\MainController::getCiel() .") no-repeat; background-size: cover";

    if (isset($_SESSION['config']['occasion']) && $_SESSION['config']['occasion'] == 1) {
        $univers1 = \App\Models\Univer::occation()->where('ranger', 1);
        $univers2 = \App\Models\Univer::occation()->where('ranger', 2);
    }
    else {
        $univers1 = \App\Models\Univer::possibles([1]);
        $univers2 = \App\Models\Univer::possibles([2]);
    }

?>

@extends('front.layout.main-layout')


@section('css-debut')
    <link rel="stylesheet" href="{{asset('css/home.css')}}">
    <link rel="stylesheet" href="{{ asset('css/responsive-home.css') }}">
@endsection

@section('occasion')
    @include('front.layout.occasion-btn')
@endsection

@section('modal-debut')
    @include('front.app-module.home.modals.request-loader')
@endsection

@section('contenu')
    <div class="hide-for-search my-navbar bg-white padding-fluid" style="height: 44px !important;">
        <div class="my-navbar-content">
            <button class="my-slick-btn my-slick-btn-prev" onclick="document.getElementById('home-nav-prev-btn').click()">
                <img src="{{ asset('assets/images/arrow-left.svg') }}" alt="">
            </button>
            <div class="home-nav">
                <div class="home-nav-item slide-0 owl-carousel">
                    <div class="d-flex justify-content-center home-nav-content item">
                        <div class="home-nav-item-image"><img src="{{asset('assets/images/Protection.svg')}}" alt=""></div>
                        <div class="home-nav-item-text">
                            <span>Paiements sécurisés et garantis</span>
                        </div>
                    </div>
                    <div class="d-flex justify-content-center home-nav-content item">
                        <div class="home-nav-item-image"><img src="{{asset('assets/images2/produit-1.svg')}}" alt=""></div>
                        <div class="home-nav-item-text">
                            <span>Retour et échange faciles de vos commandes</span>
                        </div>
                    </div>

                    <div class="d-flex justify-content-center home-nav-content item">
                        <div class="home-nav-item-image"><img src="{{asset('assets/images2/Service_client-1.svg')}}" alt=""></div>
                        <div class="home-nav-item-text">
                            <span>Service client expert</span>
                        </div>
                    </div>
                    <div class="d-flex justify-content-center home-nav-content item">
                        <div class="home-nav-item-image"><img src="{{asset('assets/images2/Qualite-1.svg')}}" alt=""></div>
                        <div class="home-nav-item-text">
                            <span>Produit de haute qualité</span>
                        </div>
                    </div>
                    <div class="d-flex justify-content-center home-nav-content item">
                        <div class="home-nav-item-image"><img src="{{asset('assets/images/Protection.svg')}}" alt=""></div>
                        <div class="home-nav-item-text">
                            <span>Paiement sécurisé</span>
                        </div>
                    </div>
                    <div class="d-flex justify-content-center home-nav-content item">
                        <div class="home-nav-item-image"><img src="{{asset('assets/images2/Qualite-1.svg')}}" alt=""></div>
                        <div class="home-nav-item-text">
                            <span>Produit de haute qualité</span>
                        </div>
                    </div>

                </div>
            </div>
            <button class="my-slick-btn my-slick-btn-next" onclick="document.getElementById('home-nav-next-btn').click()">
                <img src="{{ asset('assets/images/arrow-right.svg') }}" alt="">
            </button>
        </div>
    </div>
    <div class="padding-fluid">
        <style>
    
            #banniere-carousel-item .item2 img {
                height: 100% !important;
                width: auto !important;
            }

            .nav-bar-1920 {
                width: 16.2% !important;
            }

            .nav-bar-1367-1919 {
                width: 16.2% !important;
            }

            .owl-next-min-1920 {
                left: 48.5% !important;
                top: -146px !important;
            }

            .owl-prev-min-1920 {
                right: 47.8% !important;
                top: -148px !important;
            }

            .owl-next-1367-1919 {
                left: 48.2% !important;
                top: -120px !important;
            }

            .owl-prev-1367-1919 {
                right: 47.2% !important;
                top: -120px !important;
            }

            .owl-next-768-1366 {
                left: 48.3% !important;
                top: -114px !important;
            }

            .owl-prev-768-1366 {
                right: 46.8% !important;
                top: -114px !important;
            }

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
    
        </style>

        <style>
           /* Styles personnalisés supplémentaires pour le menu latéral */
    .sidebar {
      width: 400px; /* Largeur fixe sur ordinateur de bureau */
      max-width: 100%; /* Limite la largeur maximale sur les appareils mobiles */
      position: fixed;
      top: 0;
      bottom: 0;
      left: 0;
      z-index: 100;
      padding: 20px;
      overflow-x: hidden;
      overflow-y: auto;
      background-color: #f8f9fa;
      transition: margin-left 0.3s ease;
    }

    .sidebar-banner {
      background-color: #007bff; /* Couleur de fond bleue */
      padding: 10px;
      color: #ffffff; /* Couleur du texte blanc */
      font-weight: bold;
      text-align: center;
    }
 
    .sidebar-banner-resultat{
        background-color: #efefef;
        padding: 10px;
        color: #191970;
        font-weight: bold;
    }

    .responsive-iframe-container {
      position: relative;
      overflow: hidden;
      padding-top: 56.25%; 
      height: 500px;
    }

    .responsive-iframe-container iframe {
      position: absolute;
      top: 0;
      left: 0;
      width: 100%;
      height: 100%;
    }

    .content {
      padding: 20px;
    }

    .close-icon {
      color: #ffffff; /* Couleur de l'icône de fermeture */
      font-size: 18px; /* Taille de l'icône de fermeture */
      position: absolute;
      top: 10px;
      right: 10px;
      cursor: pointer;
    }

    /* Réactivité pour les appareils mobiles */
    @media (max-width: 768px) {
      .sidebar {
        width: 100%; /* Largeur de 100% pour les appareils mobiles */
      }
    }

    .univers-pas-disponible {

        height: 88%;
        width: 96%;
        border-radius: 6px;
        background-color: #FFFFFF;
        background-color: #fff;
        position: absolute;
        border-radius: 6px;
        font-size: 10px;
        font-weight: bold;
        color: rgb(68, 110, 68);
        text-align: justify;
        background-color: rgba(0, 0, 0, 0.6);
        pointer-events: none;

    }

    .univers-pas-disponible-text {
    height: 58px;
    width: 62px;
    border-radius: 6px;

    background-color: rgba(255,250,250, 0.6);
    position: absolute;
    z-index: 1;
    color: rgb(68, 110, 68);;
    font-family: Roboto;
    font-size: 14px;
    font-weight: 500;
    letter-spacing: 0;
    line-height: 16px;
    text-align: center;
    display: flex;
    align-items: center;
    justify-content: center;
    bottom: 0px;

    margin-left: 3px;
    margin-bottom: 2px;

    }

    @media only screen and (min-width: 768px) and  {

    }
        </style>

        <section style="height: 60px !important; margin-bottom: 62px" id="banniere-carousel-item">
            <div class="hide-for-search slide owl-carousel owl-theme" style="height: 75px !important; ">
                <div class="item2 item" style="height: 60px !important; ">
                    <img class="banner owl-lazy" data-src="{{ asset('assets/images/tm-banner/banniere-site-TM-1.webp') }}" alt="">
                </div>
                <div class="item2 item" style="height: 60px !important;">
                    <img class="banner owl-lazy" data-src="{{ asset('assets/images/tm-banner/banniere-site-TM-2.webp') }}" alt="">
                </div>
                <div class="item2 item" style="height: 60px !important; ">
                    <img class="banner owl-lazy" data-src="{{ asset('assets/images/tm-banner/banniere-site-TM-3.webp') }}" alt="">
                </div>
                <div class="item2 item" style="height: 60px !important; ">
                    <img class="banner owl-lazy" data-src="{{ asset('assets/images/tm-banner/banniere-site-TM-4.webp') }}" alt="">
                </div>
            </div>
        </section>

        <div class="responsible-margin responsible-margin-search"></div>
        <section class="main-search-bar" style="margin-top: 15px;">
            <div style="position: absolute;" class="d-none" id="val-image-libelle">
                <label class="seleted-image remove" id="val-image-libelle-1">
                    Selected Image here
                </label>
            </div>
            <div class="d-flex justify-content-center">

                <div style=" width: 648px" id="main-search-field">
                    <div onclick="showSectionRecherche()" class="my-form-field d-flex justify-content-between pl-0" style="height: 33px !important;">

                        <div class="" style="padding: 4px 6px;">
                            <img src="{{ asset('assets/images/Recherche.svg') }}" alt="" class="search-icon-loop">
                        </div>

                        <div style="height: 100%;width: inherit;">
                            {{-- <input
                                type="text"
                                data-url="{{ url('main-search') }}"
                                data-key="{{ csrf_token() }}"
                                autocomplete="off"
                                id="ma-recherche"class="my-form-field-mute custom-main-search-input pl-3"
                                placeholder="Commencez la recherche"
                                style="height: 100%; padding: 13px 40px 13px 0 !important; font-weight: initial !important;"
                                onfocus="this.style.webkitTransform = 'translate3d(0px,-10000px,0)'; webkitRequestAnimationFrame(function() { this.style.webkitTransform = ''; }.bind(this))"
                            >
                            <img class="d-none clean-main-search-text" src="{{ asset('assets/images/Ferme2.svg') }}" alt="" id="clean-main-search-text-id"> --}}
                            
                            <form action="{{url('/general_searched_result')}}" style="height: 100%;width: inherit;" id="ma-recherche-form">

                                <input
                                    type="text"
                                    data-url="{{ url('main-search') }}"
                                    data-key="{{ csrf_token() }}"
                                    autocomplete="off"
                                    id="ma-recherche"class="my-form-field-mute custom-main-search-input pl-3"
                                    placeholder="Commencez la recherche"
                                    style="height: 100%; padding: 13px 40px 13px 0 !important; font-weight: initial !important;"
                                    {{-- onfocus="this.style.webkitTransform = 'translate3d(0px,-10000px,0)'; webkitRequestAnimationFrame(function() { this.style.webkitTransform = ''; }.bind(this))" --}}
                                >
    
                                <img class="d-none clean-main-search-text" src="{{ asset('assets/images/Ferme2.svg') }}" alt="" id="clean-main-search-text-id">
    
                            </form>

                        </div>

                        <div class="d-flex justify-content-between align-items-center"  style="padding: 0 15px 0 0;">
                            <label for="file-input-reseach" style="background-color: none; position: relative; top: 3.5px;">
                                <img id="img-test" src="{{ asset('assets/images/photo-gallery-search.svg') }}" alt="">
                            </label>
                            <img id="img-searched-placeholder" src="{{ asset('assets/images/photo-gallery-search.svg') }}" alt="" style="position: absolute; margin-left: 38px; display:none">
                        </div>

                    </div>
                </div>
            </div>

            <input id="file-input-reseach" type="file" style="position: absolute; visibility:hidden" onchange="searchByImageSelect(event)"/>
        </section>

        <div class="responsible-margin responsible-margin-caroussel"></div>

        <div class="caroussel-section" style="margin-top: 20px;">
            <div class="hide-for-search">
                <div class="slide1">
                    <div class="d-none"></div>
                    <div class="sliderm owl-carousel owl-theme">
                        @foreach($univers1 as $univer)
                            @if (($univer->id == 3) || ($univer->id == 7))
                            <div class="mask item un-univers" id="univers-{{ $univer->id }}" onclick="document.getElementById('univer-{{ $univer->id }}').click()">
                                <a href="{{ url('univ/'. $univer->id .'/'. $univer->slug) }}" class="d-none" id="univer-{{ $univer->id }}"></a>
                                <div style="background: url('{{ $univer->getMiniLink() }}') no-repeat" class="ma-miniature">
                                    <img data-id="univers-{{ $univer->id }}" class="miniature" src="{{ asset('assets/vitrines/fenetre_0.webp') }}" alt="">
                                </div>
                                <div class="text_cat">
                                    <p>{{ $univer->getLibelle() }}</p>
                                </div>
                            </div>
                            @elseif($univer->id == 4)
                            <div class="mask item un-univers" id="univers-{{ $univer->id }}" onclick="document.getElementById('univer-{{ $univer->id }}').click()">
                                {{-- <a href="{{ url('univ/'. $univer->id .'/'. $univer->slug) }}" class="d-none" id="univer-{{ $univer->id }}"></a> --}}
                                <div class="univers-pas-disponible" style="display: none_none">
                                    <div class="univers-pas-disponible-text" style="display: noned; font-size: 10px; font-weight: 500; background-color: #fff; color: #D0021B">OUVERT EN NOVEMBRE</div></div>
                                <div style="background: url('{{ $univer->getMiniLink() }}') no-repeat" class="ma-miniature">
                                    <img data-id="univers-{{ $univer->id }}" class="miniature" src="{{ asset('assets/vitrines/fenetre_0.webp') }}" alt="">
                                </div>
                                <div class="text_cat">
                                    <p>{{ $univer->getLibelle() }}</p>
                                </div>
                            </div>
                            @else
                            <div class="mask item un-univers" id="univers-{{ $univer->id }}" onclick="document.getElementById('univer-{{ $univer->id }}').click()">
                                {{-- <a href="{{ url('univ/'. $univer->id .'/'. $univer->slug) }}" class="d-none" id="univer-{{ $univer->id }}"></a> --}}
                                <div class="univers-pas-disponible" style="display: none_none">
                                    <div class="univers-pas-disponible-text" style="display: noned; font-size: 10px; font-weight: 500">BIENTOT OUVERT</div></div>
                                <div style="background: url('{{ $univer->getMiniLink() }}') no-repeat" class="ma-miniature">
                                    <img data-id="univers-{{ $univer->id }}" class="miniature" src="{{ asset('assets/vitrines/fenetre_0.webp') }}" alt="">
                                </div>
                                <div class="text_cat">
                                    <p>{{ $univer->getLibelle() }}</p>
                                </div>
                            </div>
                                
                            @endif
                        @endforeach

                        @if ($univers1->count() < 6)
                            @for($i=$univers1->count(); $i<7; $i++)
                                <div class="mask item">
                                    <div style="background: url('{{ asset('assets/images/Miniature_boutique_vide_par_defaut.jpg') }}') no-repeat" class="ma-miniature">
                                        <img data-id="" class="miniature" src="{{ asset('assets/vitrines/fenetre_0.webp') }}" alt="">
                                    </div>
                                    <div class="text_cat">
                                        <p>Univers non disponible</p>
                                    </div>
                                </div>
                            @endfor
                        @endif

                    </div>
                </div>

                <div class="responsible-margin responsible-margin-caroussel-2"></div>

                <div class="slide2">
                    <div class="d-none"></div>
                    <div class="sliderm2 owl-carousel owl-theme">
                        @foreach($univers2 as $univer)
                        @if($univer->id == 3)
                            
                       
                        @elseif(($univer->id == 6) || $univer->id == 9)
                            <div class="mask2 item un-univers" id="univers-{{ $univer->id }}" onclick="document.getElementById('univer-{{ $univer->id }}').click()">
                                {{-- <a href="{{ url('univ/'. $univer->id .'/'. $univer->slug) }}" class="d-none" id="univer-{{ $univer->id }}"></a> --}}
                                <div class="univers-pas-disponible" style="display: none_none">
                                    <div class="univers-pas-disponible-text" style="display: noned; font-size: 10px; font-weight: 500; background-color: #fff; color: #D0021B">OUVERT EN NOVEMBRE</div></div>
                                <div style="background: url('{{ $univer->getMiniLink() }}') no-repeat" class="ma-miniature">
                                    <img data-id="univers-{{ $univer->id }}" class="miniature" src="{{ asset('assets/vitrines/fenetre_0.webp') }}" alt="">
                                </div>
                                <div class="text_cat">
                                    <p>{{ $univer->getLibelle() }}</p>
                                </div>
                            </div>
                            @else
                            <div class="mask2 item un-univers" id="univers-{{ $univer->id }}" onclick="document.getElementById('univer-{{ $univer->id }}').click()">
                                {{-- <a href="{{ url('univ/'. $univer->id .'/'. $univer->slug) }}" class="d-none" id="univer-{{ $univer->id }}"></a> --}}
                                <div class="univers-pas-disponible" style="display: none_none">
                                    <div class="univers-pas-disponible-text" style="display: noned; font-size: 10px; font-weight: 500">BIENTOT OUVERT</div>
                                </div>
                                <div style="background: url('{{ $univer->getMiniLink() }}') no-repeat" class="ma-miniature">
                                    <img data-id="univers-{{ $univer->id }}" class="miniature" src="{{ asset('assets/vitrines/fenetre_0.webp') }}" alt="">
                                </div>
                                <div class="text_cat">
                                    <p>{{ $univer->getLibelle() }}</p>
                                </div>
                            </div>
                            @endif
                        @endforeach

                    </div>
                </div>
            </div>
        </div>

    </div>
    <div class="d-none" id="les-vitrines">
        <img data-id="0" class="miniature" src="{{ asset('assets/vitrines/fenetre_0.webp') }}" alt="">
        <img data-id="1" class="miniature" src="{{ asset('assets/vitrines/fenetre_1.webp') }}" alt="">
        <img data-id="2" class="miniature" src="{{ asset('assets/vitrines/fenetre_2.webp') }}" alt="">
        <img data-id="3" class="miniature" src="{{ asset('assets/vitrines/fenetre_3.webp') }}" alt="">
        <img data-id="4" class="miniature" src="{{ asset('assets/vitrines/fenetre_4.webp') }}" alt="">
        <img data-id="5" class="miniature" src="{{ asset('assets/vitrines/fenetre_5.webp') }}" alt="">
        <img data-id="6" class="miniature" src="{{ asset('assets/vitrines/fenetre_6.webp') }}" alt="">
        <img data-id="7" class="miniature" src="{{ asset('assets/vitrines/fenetre_7.webp') }}" alt="">
        <img data-id="8" class="miniature" src="{{ asset('assets/vitrines/fenetre_8.webp') }}" alt="">
        <img data-id="9" class="miniature" src="{{ asset('assets/vitrines/fenetre_9.webp') }}" alt="">
        <img data-id="10" class="miniature" src="{{ asset('assets/vitrines/fenetre_10.webp') }}" alt="">
        <img data-id="11" class="miniature" src="{{ asset('assets/vitrines/fenetre_11.webp') }}" alt="">
    </div>
@endsection

@section('search')
    @include('search')
@endsection

@section('js-fin')

  </div>

  


    <script>

        $(document).ready(function() {
        // Attacher la fonction de clic à l'élément avec l'ID "monBouton"
        $("#btn_val_g").click(function() {
            var iduser      =  $("#id_user_prod_game").val(); 
           console.log(iduser);
            
           location.href="https://toulemarket.com/start_game?id_user="+iduser;
        });
        });


        function initmatchMediaClasses() {
            console.log('You fired me')
            $('.owl-next').removeClass('owl-next-min-1920')
            $('.owl-prev').removeClass('owl-prev-min-1920')

            $('.owl-next').removeClass('owl-next-1367-1919')
            $('.owl-prev').removeClass('owl-prev-1367-1919')

            $('.owl-next').removeClass('owl-next-768-1366')
            $('.owl-prev').removeClass('owl-prev-768-1366')
        }

        jQuery(document).ready(function() {
            $(".slide").owlCarousel({
                loop:true,
                nav:true,
                autoplay:true,
                autoplayTimeout:5000,
                autoplaySpeed: 1000,
                autoplayHoverPause:true,
                lazyLoad: true,
                responsive:{
                    0:{
                        items:1
                    },
                    600:{
                        items:2.7
                    },
                    1000:{
                        items:3.5
                    },
                    1200:{
                        items:3.5
                    },
                    1500:{
                        items:4.5
                    }
                }
            });

            $(".sliderm, .sliderm2").owlCarousel({
                loop:true,
                nav:true,
                lazyLoad: true,
                navText: [
                    "<img class='slide-btn slide-left-btn' src='{{ asset('assets/images/prev.svg') }}' />",
                    "<img class='slide-btn slide-left-btn' src='{{ asset('assets/images2/Next.svg') }}' />"
                ],
                responsive:{
                    0:{
                        items:1.5
                    },
                    600:{
                        items:2
                    },
                    700:{
                        items:2.5
                    },
                    800:{
                        items:3
                    },
                    970:{
                        items:4
                    },
                    1100:{
                        items:4.5
                    }
                }
            });
            $(".slide-0").owlCarousel({
                loop:false,
                nav:true,
                autoplay:false,
                navText: [
                    "<button type='button' id='home-nav-prev-btn'></button>",
                    "<button type='button' id='home-nav-next-btn'></button>"
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
                        items: 4
                    }
                }
            });

            $('#recherhce-input').click(()=>{
                showSectionRecherche()
            })

            window.addEventListener('keyup', function (e) {
                if(e.key === "Escape") {
                    e.preventDefault();
                    hideSectionRecherche()
                    $("button[data-dismiss='modal']").click()
                }
            })

            // small screen
            var mediaquqery_min_768  = window.matchMedia("(min-width: 768px)")
            var mediaQuery_max_1366 = window.matchMedia("(max-width: 1366px)");

            // medium screen
            var mediaQuery_max_1367 = window.matchMedia("(min-width: 1367px)")
            var mediaQuery_max_1919 = window.matchMedia("(max-width: 1919px)")

            // large screen
            var mediaQuery_max_1920 = window.matchMedia("(min-width: 1920px)")

            if (mediaQuery_max_1920.matches) {
                var carousel_item = $(".slide-0").find('.owl-item')
                $(carousel_item[3]).addClass('nav-bar-1920')

                $('.owl-next').addClass('owl-next-min-1920')
                $('.owl-prev').addClass('owl-prev-min-1920')

            }else if (mediaQuery_max_1367.matches && mediaQuery_max_1919.matches) {
                var carousel_item = $(".slide-0").find('.owl-item')
                $(carousel_item[3]).addClass('nav-bar-1367-1919')

                $('.owl-next').addClass('owl-next-1367-1919')
                $('.owl-prev').addClass('owl-prev-1367-1919')

            }else if(mediaquqery_min_768.matches && mediaQuery_max_1366.matches) {
                var carousel_item = $(".slide-0").find('.owl-item')
                $(carousel_item[3]).addClass('nav-bar-1367-1919')

                $('.owl-next').addClass('owl-next-768-1366')
                $('.owl-prev').addClass('owl-prev-768-1366')
            }

            
            window.addEventListener('resize', function() {

            // small screen
            var mediaquqery_min_768  = window.matchMedia("(min-width: 768px)")
            var mediaQuery_max_1366 = window.matchMedia("(max-width: 1366px)");

            // medium screen 
            var mediaQuery_max_1367_bis = window.matchMedia("(min-width: 1367px)")
            var mediaQuery_max_1919_bis = window.matchMedia("(max-width: 1919px)")
            
            // large screen 
            var mediaQuery_max_1920_bis = window.matchMedia("(min-width: 1920px)")

            if (mediaQuery_max_1920_bis.matches) {
                initmatchMediaClasses()
                var carousel_item = $(".slide-0").find('.owl-item')
                $(carousel_item[3]).addClass('nav-bar-1920')

                $('.owl-next').addClass('owl-next-min-1920')
                $('.owl-prev').addClass('owl-prev-min-1920')

            }else if (mediaQuery_max_1367_bis.matches && mediaQuery_max_1919_bis.matches) {
                initmatchMediaClasses()
                var carousel_item = $(".slide-0").find('.owl-item')
                $(carousel_item[3]).addClass('nav-bar-1367-1919')

                $('.owl-next').addClass('owl-next-1367-1919')
                $('.owl-prev').addClass('owl-prev-1367-1919')

            }else if (mediaquqery_min_768.matches && mediaQuery_max_1366.matches) {
                initmatchMediaClasses()
                var carousel_item = $(".slide-0").find('.owl-item')
                $(carousel_item[3]).addClass('nav-bar-1367-1919')

                $('.owl-next').addClass('owl-next-768-1366')
                $('.owl-prev').addClass('owl-prev-768-1366')

            }else {
                var carousel_item = $(".slide-0").find('.owl-item')
                $(carousel_item[3]).removeClass('nav-bar-1367-1919')

                initmatchMediaClasses()

            }

            

            });

        })

        function translateToFren(text) {

            let apiUrl = `https://api.mymemory.translated.net/get?q=${text}&langpair=en|fr`;
            const feched_text = fetch(apiUrl).then(res => res.json()).then(data => {
                return data.responseData.translatedText
            })

            return feched_text.then(data => {
                return data;
            });
        }

        const fetchTranslatedData = async (apiUrl) => {
            try {
                let response = await fetch(apiUrl)
                if (response.ok) {
                    let jsonResponse = await response.json();
                    return jsonResponse;
                }
            }catch(error){
                console.log(error)
            }
        }

        function sendRequest(tab_mots) {
            $.ajax({
            type: 'POST',
            url: '/search_by_image',
            data: {text_search: tab_mots},
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            success: function (response) {
                $('#image-search-result').empty()
                if (response.length > 0) {
                    for (let j = 0; j < response.length; j++) {
                        var produit_tableau = response[j]

                        for (let v = 0; v < produit_tableau.length; v++) {

                            var id_rayon = produit_tableau[v]['id_rayon']
                            var rayon_slug = produit_tableau[v]['slug']
                            var id_produit = produit_tableau[v]['id']
                            var image_to_show = `<div class="img-container-sr">
                                                    <img height="197px" width="auto" class="img-searched-result-1" src="/${produit_tableau[v]['image']}" alt="" onclick=redirectRayonFromMain('/rayon/${id_rayon}/${rayon_slug}','${id_produit}')>
                                                </div>`
                            $('#image-search-result').append(image_to_show)
                        }
                    }
                }
            },
            error: function(error) {
                console.log('Votre error:', error)
            }
        })
        }

        function searchByImageSelect(event) {

            var searched_img = $('#file-input-reseach').get(0).files[0];
            var reader = new FileReader();

            reader.onload = function(){
                $('#img-searched-placeholder').attr('src', reader.result)
            }

            reader.readAsDataURL(searched_img);

            if($('#val-image-libelle-1').hasClass('d-none')) {
                $('#val-image-libelle-1').removeClass('d-none')
            }

            const img = document.getElementById('img-searched-placeholder');
            $('#val-image-libelle').removeClass('d-none')
            $('#val-image-libelle-1').text(searched_img.name)

            $('#searchbyText-result').addClass('d-none')
            $('#searchbyImage-result').removeClass('d-none')
            // Load the model.
            mobilenet.load().then(model => {
                // Classify the image.
                model.classify(img).then(predictions => {
                    console.log(predictions);
                    let join_wordTo_search = [];
                    predictions.forEach(element => {
                        join_wordTo_search.push(element.className)
                    });

                    if (join_wordTo_search.length > 0) {
                        let join_wordTo_searchToString = join_wordTo_search.join();
                        let apiUrl = `https://api.mymemory.translated.net/get?q=${join_wordTo_searchToString}&langpair=en|fr`;
                        const data6 = fetchTranslatedData(apiUrl)
                        data6.then(data => {
                            sendRequest(data.responseData.translatedText)
                            // console.log('Le text traduit est:', data.responseData.translatedText)
                        })
                        // console.log('Le string est:', join_wordTo_searchToString)
                    }
                });
            });

            $('#clean-main-search-text-id').removeClass('d-none')

        }

        //FONCTION QUI AFFICHE LE MODAL DU GAME
        function open_modal_game(){
            $("#registerLoginModal").modal("show");
        }

       //open_modal_game();

       function user_login_input_function1_game() {
        var user_name = $('#formLogin_email-input').val()
        var user_pwd = $('#formLogin_password-field').val()

        var user_name1 = $('#formLogin_email-input')

        if (user_name.length > 0 && user_pwd.length > 0 && !$(user_name1).hasClass('input-error-warning')) {
            // $(button[0]).prop('disabled', false);
            $('#login-register-btn').addClass('btn-active')
            $('#login-register-btn').removeClass('.btn-disabled')
            $('#login-register-btn').prop('disabled', false)
        } else {
            // $(button[0]).prop('disabled', true);
            $('#login-register-btn').removeClass('btn-active')
            $('#login-register-btn').addClass('.btn-disabled')
            $('#login-register-btn').prop('disabled', true)
        }
    }
       
       //FONCATION NAVIGATION BTN INSCRIPTION GAME
       $('.login-register-btn-game').click(function (e) {
            //alert("bonour"); 
            setTimeout(() => {
                let panel =  $(this).attr('data-panel');
                console.log('Le panel solicité est:', panel)

                
                //$('#'+ panel).fadeIn();

                $('.login-register-btn-game').not(this).each(function (key, value) {
                    $(value).addClass('button-mute');
                    $(value).removeClass('actif');  
                    //$('#'+ $(value).attr('data-panel')).addClass('d-none')
                })

                $(this).addClass('actif') ; 
                $(this).removeClass('button-mute');
                $('#login-register-btn-game').attr('data-for', panel +'-btn');

                if (panel == 'form-connexion-game') {
                    $("#form-inscription-game").hide();
                    $("#form-connexion-game").fadeIn(); 
                    $('#login-register-btn-game').text('Se connecter')
                    user_login_input_function1_game() 

                }else if (panel == 'form-inscription-game') {
                    $("#form-connexion-game").hide();
                    $("#form-inscription-game").fadeIn();
                    $('#login-register-btn-game').text('S\'inscrire')
                    user_register_input_validation1()

                }

            }, 500)

        })


        function verif_user_game(){
            var iduser      =  $("#id_user_prod_game").val(); 
            $.ajax({
                url: "/tm_user_game/"+iduser,
                type: "GET",
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }, 
                success: function(response) {

                    if (typeof id_user_prod_game === 'undefined') {
                        // La variable est undefined
                        $("#sidebar").css("display","none");
                    } else {
                        var nombre_paticipation = response.nombre;
                        console.log(nombre_paticipation);
                        if(nombre_paticipation == 0 ){
                            $("#sidebar").css("display","block");
                        }else{
                            $("#sidebar").css("display","none");
                        }
                    }

                   
                },
                error: function(xhr, status, error) {
                    // Traitement à effectuer en cas d'erreur de la requête
                    console.error("Erreur lors de la requête POST : " + error);
                }
                });
        }

        setTimeout(() => {
        
            verif_user_game();

        }, 1500);

        function go_game_game(){
            var iduser      =  $("#id_user_prod_game").val(); 
            location.hef="https://toulemarket.com/start_game?id_user="+iduser;
        }   

        function get_data_game(){
            //script pour inserer les gagnants.
            var iduser      =  $("#id_user_prod_game").val();    
            var ref_produit = $("#ref_prod_game").val();  

            var nbre_participation = 1;
 
            $.ajax({
                url: "/tm_game_store",
                type: "POST",
                data: {
                    iduser: iduser,
                    ref_produit: ref_produit,
                    nbre_participation: nbre_participation
                },
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }, 
                success: function(response) {
                    // Traitement à effectuer en cas de succès de la requête
                    console.log("Requête POST réussie !");
                    console.log(response); // Affichage de la réponse du serveur
                    ajout_panier();
                },
                error: function(xhr, status, error) {
                    // Traitement à effectuer en cas d'erreur de la requête
                    console.error("Erreur lors de la requête POST : " + error);
                }
                });

        }

        $(document).ready(function() {

        var telephone_size_media_query = window.matchMedia("(max-width: 500px)");

        if (telephone_size_media_query.matches) {
            $('.sliderm').owlCarousel();
            $('.sliderm2').owlCarousel();

            var element_3 = $('#univers-3')
            var element_4 = $('#univers-4')

            var element_7 = $('#univers-7')

            // var carousel_data = $('.sliderm')
            // carousel_data.trigger('remove.owl.carousel', [2]).trigger('refresh.owl.carousel');

            // carousel_data.trigger('add.owl.carousel', [element_3[0], 0]).trigger('refresh.owl.carousel');
            var carousel_data = $('.sliderm')
            var carousel_data2 = $('.sliderm2')
            carousel_data.trigger('remove.owl.carousel', [2]).trigger('refresh.owl.carousel');

            carousel_data.trigger('add.owl.carousel', [element_3[0], 0]).trigger('refresh.owl.carousel');

            carousel_data.trigger('remove.owl.carousel', [3]).trigger('refresh.owl.carousel');
            carousel_data.trigger('add.owl.carousel', [element_4[0], 1]).trigger('refresh.owl.carousel');

            carousel_data.trigger('remove.owl.carousel', [3]).trigger('refresh.owl.carousel');
            carousel_data2.trigger('add.owl.carousel', [element_7[0], 0]).trigger('refresh.owl.carousel');

        }

        $('#ma-recherche-form').on('submit', function(event) {

            event.preventDefault()
            let action = $(this).attr('action')
            var input_val = $('#ma-recherche').val();

            $.ajax({ 
            type: 'POST',
            url: action,
            data: {value: input_val},
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            success: function(response) {
                localStorage.setItem('searched_product_global', JSON.stringify(response.id))
                var redirect_ur = '/rayon/'+response.id_rayon+'/'+response.slug+''
                window.location.href = redirect_ur
            }
            })

            })

        })

    </script>

@endsection
