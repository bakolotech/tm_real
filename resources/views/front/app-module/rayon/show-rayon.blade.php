<?php
    if (session_status() == PHP_SESSION_NONE) {
        session_start();
    }

    $monPays = \App\Models\Pays::getPays();
    $pays = \App\Models\Pays::possibles();
    $langues = \App\Models\Langue::possibles();
    $devises = \App\Models\Devise::possibles();

    if (isset($_SESSION['config']) && !empty($_SESSION['config']) && count($_SESSION['config']) > 0){
        if (isset($_SESSION['config']['user-langue']) && !empty($_SESSION['config']['user-langue'])) {$maLangue = $_SESSION['config']['user-langue'];} else {$maLangue = []; }
        if (isset($_SESSION['config']['user-ville']) && !empty($_SESSION['config']['user-ville'])) {$maVille = $_SESSION['config']['user-ville'];} else {$maVille = []; }
        if (isset($_SESSION['config']['user-province']) && !empty($_SESSION['config']['user-province'])) {$maProvince = $_SESSION['config']['user-province'];} else {$maProvince = []; }
        if (isset($_SESSION['config']['user-devise']) && !empty($_SESSION['config']['user-devise'])) {$maDevise = $_SESSION['config']['user-devise'];} else {$maDevise = []; }
    } else {
        $maLangue = [];
        $maVille = [];
        $maProvince = [];
        $maDevise = [];
    }

    $maPosition = $_SESSION['config']['ma-position'];

    if (\Illuminate\Support\Facades\Auth::check()) {
        $user_id1 = \Illuminate\Support\Facades\Auth::user()->id;
    }else {
        $user_id1 = 'None';
    }

    $default_rayon = [];


$produit_tableau = [];

echo "<script>var seached_rayon_val = ".$rayon->id.", rayon_default_categorie = ".$default_categorie."</script>";
echo '<link rel="icon" href="https://toulemarket.com/assets/images/favicon.svg">';

?>

@extends('front.layout.main-layout')

@include('front.app-module.rayon.recap-produit-main-modal')

@section('css-debut')
    <link rel="stylesheet" href="{{asset('css/home.css')}}">
    <link rel="stylesheet" href="{{asset('css/demo.css')}}">
    <link rel="stylesheet" href="{{ asset('css/rayon.css') }}">
    <link rel="stylesheet" href="{{ asset('css/etagere.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/slick/slick.css') }}">
    <link rel="stylesheet" href="{{ asset('css/rayon_style.css') }}">
    <link rel="stylesheet" href="{{ asset('css/etagere_responsive.css') }}">
    <link rel="stylesheet" href="{{ asset('css/tv_responsive_bis.css')}}">
    <link rel="stylesheet" href="{{ asset('css/new_product_recap_product.css')}}" >
    <link rel="stylesheet" href="{{ asset('css/rayons/rayon_style.css')}}?v=1.0" >
    <link rel="stylesheet" href="{{ asset('css/rayons/rayon_style_helper.css')}}?v=1.0" >
@endsection

<style>

.mon-contenu {
    /* background-color: #191970; */
}

.mobile-article-section {
    display: none;
}

@media screen and (max-width: 500px) {

.hide-for-search {
    /* display: none !important;  */
}

.header-site-icon, .header-site-logo {
    padding-bottom: 13.25px !important;
}

.header-site-logo a img{
    width: 145px;
    position: relative;
    top: -4px;
}

.mon-contenu {
    height: 100% !important;
}

.grande-etagere {
    height: calc(100vh - 105px) !important;
    width: 100% !important;
    background-size: calc(100% + 50px) 100vh !important;
    /* display: none; */

}

.slider-content-wrapper-user {
    /* display: none !important; */
}

.my-navbar {
    /* display: none !important; */
}

body {
    height: 100% !important;
    overflow-x: hidden !important; 
    overflow-y: hidden !important;
    /* background-size: 179vh !important; */
}

.main-header {
    height: 62px !important;
}

.header-site-icon, .header-site-logo {
    padding-bottom: 13.25px !important;
}

.desk-top-article-section {
    display: none !important;
}

.mobile-article-section {
    display: block !important;
}

.slider-content-wrapper-user {
    overflow-x: scroll !important;
}

.slider-content-wrapper-user-mobile {
    overflow-x: scroll !important;
}

.custom-carousel-page-userf {
    overflow-x: scroll !important;
}

.row_div-user-telephonie {
    column-gap: 60px !important;
}

.main-carousel-section-changed-user_tv {
    width: 100% !important;
}

.mobile-description-caracteristique2 {
    overflow-y: scroll;
}

.rayon-nav-univers-dropdown {
    width: 300px !important;
}

.row_div-user {
    width: 100% !important;
}

.mon-contenu {
    /* display: none; */
}

#grande_etagereOK {
    /* display: none !important; */
}

.box.arrow-top, .box-2.arrow-top-2 {
    margin-top: -6px !important;
}


}

.active-nav-list-btn-item {
    border: 1px solid #191970 !important;
    color: #191970 !important;
}

.desabled-rayon-categorie {
    opacity: 0.3
}

.etagere-parent-miror {
    position: fixed;
    height: inherit;
    width: inherit;
    grid-row-gap: 0px;
    display: grid !important;
    grid-template-rows: 0px 1fr 1fr 1fr 1fr 1fr 7.5%;
    grid-row-gap: 0px !important;
    z-index: -1;
}

.etagere-parent-miror_tv {
    position: fixed;
    height: inherit;
    width: inherit;
    grid-row-gap: 0px;
    display: grid !important;
    grid-template-rows: 1fr 1fr 1fr 36px;
    grid-row-gap: 0px !important;
    z-index: -1;
}

.veiw-device-width-and-height {
    position: absolute;
    height: 95%;
    width: 300px;
    background: grey;
    z-index: 10000;
    margin-left: -332px;
    border-radius: 6px;
    text-align: center;
    /* transition: .2s; */
}

.scale-popup {
    transform: scale(0.9);
}

.scale-popup-2 {
    transform: scale(0.8);
}

</style>

@if($rayon->id == 7)
<style>
    .main-content-loop {
        height: 100%;
        background: url('{{ $rayon->getGEtagereLink() }}') no-repeat;
        background-size: 100%  100% !important;
    }
</style>

    @elseif(($rayon->id == 25) || ($rayon->id == 26) || ($rayon->id == 27) || ($rayon->id == 28) || ($rayon->id == 38) || ($rayon->id == 39) || ($rayon->id == 9) || ($rayon->id == 12) || ($rayon->id == 8))
    <style>
        .main-content-loop {
            height: 100%;
            background: url('/storage/images/rayons/grande_etagere/background_univers_3_etagere1_type1.webp') no-repeat;
            background-size: 100%  100% !important;
        }
    </style>
    @else
    <style>
        .main-content-loop {
            height: 100%;
            background: url('{{ $rayon->getGEtagereLink() }}') no-repeat;
            background-size: 100%  100% !important;
        }
    </style>
    @endif

@section('search-bar')
<div class="rayon-bloc-recherche">
    <div class="formRayonSearch_input my-form-field br-l input-recherche" style="width: inherit; z-index: 12" tabindex="0">

        <input onkeyup='rayonSearch("{{ url('search-from-univ/'.$univer_id) }}", this)'  data-univer="{{ url('search-from-rayon/'.$univer_id) }}" placeholder="Commencez votre recherche..." type="text" class=""  name="formRayonSearch_text" id="formRayonSearch_text-input" style="height: 34px;">
        <div class="icon-note-vocal">
            <i class="fal fa-microphone-alt text-danger"></i>
        </div>
    </div>
    <div class="formRayonSearch_button" >
        <button class="button-recherche mon-btn-primary" type="submit">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="#fff" class="bi bi-search" viewBox="0 0 16 16">
                <path d="M11.742 10.315a6.5 6.5 0 1 0-1.427 1.427l3.823 3.822a1 1 0 0 0 1.415-1.414l-3.822-3.823zM2 6.5a4.5 4.5 0 1 1 9 0a4.5 4.5 0 0 1-9 0z"/>
            </svg>
        </button>
    </div>
</div>

@section('tm_loop_de_recherche')
    <div class="search-container-template" >
        <input class="search-template expandright-template" autocomplete="off" id="searchright-template" type="text" placeholder="Commencez votre recherche" data-rayon="{{ $rayon->id }}" onkeyup='rayonSearch_mobile("{{ url('search-from-univ/'. $univer_id) }}", this)' data-univer="{{ url('search-from-univ/'. $univer_id) }}">
        <label class="button-template searchbutton-template" for="searchright-template" id="univers-btn-search-element1">
            <span class="mglass-template">&#9906;</span>
        </label>

        @include('front.app-module.rayon.mobile-rayon-search')
    </div>
@endsection

<input type="hidden" value="" id="demande_connection_source" />

@include('front.app-module.univers.includes.rayon-search-results')

@endsection

@section('contenu')

<nav class="owl-filter-bar d-none">
    <a href="#" class="item" data-owl-filter="*" id="famille-all">Tout</a>
    @foreach($rayon->familles as $famille)
        <a href="#" class="item" data-owl-filter=".famille-{{ $famille->id }}" id="famille-{{ $famille->id }}">{{ $famille->text($famille->libelle) }}</a>
    @endforeach
</nav>

<div class="my-navbar bg-white d-flex padding-fluid">
    <a href="{{ url('univ/'.$univer_id.'/'.$univer_slug) }}" class="mobile-hide-left-icon"><img style="height: 42px;width: 42px; margin-top: 3px; cursor: pointer;" src="{{ asset('assets/images2/left-icon.png') }}" alt="" ></a>
    <input type="hidden" value="{{$univer_id}}" id="univer-id-for-search">
<div class="d-flex justify-content-between" style="height: 100%; margin-left: 5px;align-items: center; cursor:pointer;" onclick="loadAllUniversRayons({{$rayon->id}})">
    <div style="width: 50px; height: 100%; border-radius: 50% 0 0 50%; background-color: #191970;" class="mobile-hide-container-icon-link-blue">
        <img style="height: 100%;height: 41px;width: 41px;margin: 3px 3px 3px 3px;" src="{{ $rayon->getIconLink() }}" alt="">
    </div>

    <div style="background-color: #191970;    padding: 7px 4px;height: 100%;display: flex;align-items: center; width: 140px;" class="rayon-mobile mobile-hide-rayon-text-libelle">
        <p class="p-0 m-0" style="line-height: 2.3em; color: white; font-weight: 500; font-family: Roboto;text-transform: UPPERCASE;line-height: 1.2;">{{ $rayon->text($rayon->libelle) }}</p>
    </div>
</div>

<button class="my-slick-btn my-slide-btn-prev br-l my-slick-btn-mobile-btn mobile-hide-btn-chevron-left" onclick="document.getElementById('rayon-nav-prev-btn').click()" style="margin: 12px 0;position: absolute;left: 286px; ">
    <svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" fill="#fff" class="bi bi-chevron-left" viewBox="0 0 16 16" style="position: relative; top: -1px">
        <path d="M11.854 1.146a.5.5 0 0 1 0 .708L5.707 8l6.147 6.146a.5.5 0 0 1 0 .708a.5.5 0 0 1-.708 0l-7-7a.5.5 0 0 1 0-.708l7-7a.5.5 0 0 1 .708 0z"/>
    </svg>
</button>

<div class="owl-carousel navbar-slide mobile-hide-container-rayon" id="nav-slide" data-content-type="categorie" style="width: 81%; border-right: solid 1px #9B9B9B;">
    @php
        $counter = 0;
    @endphp
    @foreach($rayon->familles as $famille)

    @php
        $counter++;
    @endphp

    @if($famille->default_categorie == 1)
    <div class="rayon-nav-univers-dropdown mobile-container-elements item rayon-nav-univers-dropdown-activated mobile-default-style-border-blue mobile-container-first-element" id="flle-item-{{$famille->id}}" onclick="sortByFamille(event, {{$famille->id}}, {{$rayon->id}})">
    @else
    <div class="rayon-nav-univers-dropdown mobile-container-others-element mobile-default-style-border-grey item" id="flle-item-{{$famille->id}}" onclick="sortByFamille(event, {{$famille->id}}, {{$rayon->id}})">
    @endif
    <div class="rayon-nav-univers-content mobile-famille-libelle mobile-famille-libelle-{{$counter}}" style="display: flex;justify-content: center;">
        <div class="text-block">
        <div class="rayon-nav-univer-text">
        <p>
            {{ $famille->libelle }}
        </p>
        </div>
        </div>
    </div>
    </div>
    @endforeach
</div>

<button class="my-slick-btn my-slide-btn-next br-r mobile-hide-btn-chevron-right" onclick="document.getElementById('rayon-nav-next-btn').click()" style="margin: 12px 0;">
    <svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" fill="#fff" class="bi bi-chevron-right" viewBox="0 0 16 16" style="position: relative; top: -1px">
        <path d="M4.146 1.146a.5.5 0 0 1 0 .708L9.293 8l-5.147 5.146a.5.5 0 1 1-.708-.708l5-5a.5.5 0 0 1 0-.708l-5-5a.5.5 0 0 1 .708-.708z"/>
    </svg>
</button>

<div class="parametre-icon mobile-hide-container-icon-filtre" id="filter_for_mobile_delimiter" onclick="keep_shopping_old_end()">
    <img class="hover-hide" src="{{ asset('assets/images2/Filtre-blanc-off.svg') }}" alt="">
    <img class="hover-show" src="{{ asset('assets/images2/Filtre-bleu-survole.svg') }}" alt="">

    <span style="position: absolute" id="view-window-height-and-width"></span>
    
</div>
<div class="filter-icon filter-icon-mobile mobile-hide-container-icon-trier">
    <img class="hover-hide" src="{{ asset('assets/images2/Trier-blanc-off.svg') }}" alt="">
    <img class="hover-show" src="{{ asset('assets/images2/Trier-bleu-survole.svg') }}" alt="">
</div>

</div>


{{-- @if($rayon->id == 7)
<div style="background: url('{{ $rayon->getGEtagereLink() }}') no-repeat;" class="grande-etagere grand-etagere-helper-function_bis">
@elseif(($rayon->id == 25) || ($rayon->id == 26) || ($rayon->id == 27) || ($rayon->id == 28) || ($rayon->id == 38) || ($rayon->id == 39) || ($rayon->id == 9) || ($rayon->id == 12) || ($rayon->id == 8))
<div style="background: url('/storage/images/rayons/grande_etagere/background_univers_3_etagere1_type1.webp') no-repeat;" class="grande-etagere padding-fluid" id="grande_etagereOK">
@else
<div style="background: url('{{ $rayon->getGEtagereLink() }}') no-repeat;" class="grande-etagere padding-fluid grand-etagere-helper-function_bis1" id="grande_etagereOK">
@endif --}}
<div class="grande-etagere padding-fluid grand-etagere-helper-function_bis1" id="grande_etagereOK">

<div class="rayon-btn-direction-legume-left  prev-div-btn my-slick-btn-2" onclick="tm_carousel_preview1()">
    <button class="btn-left btn-direction" style="border-radius: 0px 50% 50% 0px" >
        <img class="img-direction-btn" src="{{ asset('assets/images2/prec.svg') }}" alt="">
    </button>
</div>
@if($rayon->id == 7)
    <div class="my-navbar-content d-flex owl-carousel" id="grande-etagere-slide" style="width: 77%; position: relative; margin-left: auto; margin-right: auto;">
    @foreach($rayon->sousCategories() as $key => $sousCategorie)
    <div class="d-block item main-barquette pt-produit-section famille-{{$sousCategorie->famille->id}}" style="position: relative; top: 20px">

    <div class="sous-categorie-title" style="position: relative; top: -20px">
        <p>{{ $sousCategorie->text($sousCategorie->libelle) }}</p>
    </div>
    @for($i=1; $i<5; $i++)
        <div class="barquettegg {{'case-el'.$i}}" id="b-{{ $i }}">
            <a onclick="getId({{$sousCategorie->id}})">
            <img class="owl-lazy" data-src="{{ $sousCategorie->getMaquetteLink() }}" alt=""></a>
        </div>
        @if($i > 0 && $i < 5)
        @endif
    @endfor
    </div>
    @endforeach
 </div>

 @endif

    <div class="desk-top-article-section" id="desk-top-article-section-id">

    @if($rayon->id == 25)
        @include('front.app-module.rayon.rayons_par_univers.univers_3.rayon_tv')
    @endif

    @if($rayon->id == 27)
        @include('front.app-module.rayon.rayons_par_univers.univers_3.rayon_telephonie')
    @endif

    @if($rayon->id == 38)
        @include('front.app-module.rayon.rayons_par_univers.univers_7.rayon_fourniture_scolaire')
    @endif

    @if($rayon->id == 9)
        @include('front.app-module.rayon.rayons_par_univers.univers_4.rayon_cheveux')
    @endif

    @if($rayon->id == 26)
        @include('front.app-module.rayon.rayons_par_univers.univers_3.rayon_informatique_tablette')
    @endif

    @if($rayon->id == 28)
        @include('front.app-module.rayon.rayons_par_univers.univers_3.rayon_jeux')
    @endif

    @if($rayon->id == 10)
        @include('front.app-module.rayon.rayons_par_univers.univers_4.rayon_appareillage_outils')
    @endif

    @if($rayon->id == 39)
        @include('front.app-module.rayon.rayons_par_univers.univers_7.rayon_livre_enseignement')
    @endif

    @if($rayon->id == 8)
        @include('front.app-module.rayon.rayons_par_univers.univers_4.rayon_corps_bains')
    @endif

    @if($rayon->id == 12)
        @include('front.app-module.rayon.rayons_par_univers.univers_4.rayon_parfums')
    @endif
    </div>

    <div class="mobile-article-section" id="mobile-main-article-section">

        @if($rayon->id == 25)
            @include('front.app-module.rayon.rayons_par_univers.univers_3.rayon_tv')
        @endif
    
        @if($rayon->id == 26)
            @include('front.app-module.rayon.rayons_par_univers.univers_3.rayon_informatique_tablette')
        @endif
    
        @if($rayon->id == 27)
            @include('front.app-module.rayon.rayons_par_univers.univers_3.rayon_telephonie')
        @endif
    
        @if($rayon->id == 28)
            @include('front.app-module.rayon.rayons_par_univers.univers_3.rayon_jeux')
        @endif
    
        @if($rayon->id == 8)
            @include('front.app-module.rayon.rayons_par_univers.univers_4.rayon_corps_bains')
        @endif
    
        @if($rayon->id == 9)
            @include('front.app-module.rayon.rayons_par_univers.univers_4.rayon_cheveux')
        @endif
    
        @if($rayon->id == 10)
            @include('front.app-module.rayon.rayons_par_univers.univers_4.rayon_appareillage_outils')
        @endif
    
        @if($rayon->id == 12)
            @include('front.app-module.rayon.rayons_par_univers.univers_4.rayon_parfums')
        @endif
    
        @if($rayon->id == 38)
            @include('front.app-module.rayon.rayons_par_univers.univers_7.rayon_fourniture_scolaire')
        @endif
    
        @if($rayon->id == 39)
            @include('front.app-module.rayon.rayons_par_univers.univers_7.rayon_livre_enseignement')
        @endif
    </div>

<div class="rayon-btn-direction-legume next-div-btn my-slick-btn-2" onclick="tm_carousel_next1()" style="border-radius: 50% 0px 0px 50%; ">
    <button class="btn-direction-faux btn-right-small" style="background: transparent; z-index: 1">
        <img class="img-direction-btnd" src="{{ asset('assets/images2/Next.svg') }}" alt="">
    </button>
</div>

<div class="rayon-btn-direction-etat-panier next-div-btn my-slick-btn-2-12" style="z-index: 11000;" onclick="loadPanier()">

    @if(isset($_SESSION['panier']) && count($_SESSION['panier']) > 0)
        @php
            $nbre_element = 0;
            for($i = 0, $size = count($_SESSION['panier']); $i < $size; ++$i) {
                $nbre_element += $_SESSION['panier'][$i]['quantite'];
            }
        @endphp
        <span class="panier-counter" id="nbr_panier2">
            @if($nbre_element > 100)
                +99
            @else
            {{ $nbre_element }}
            @endif
        </span>

        <span id="nbr_panier2_hidden" style="visibility:hidden">
            {{ $nbre_element }}
        </span>

    @else <span class="" id="nbr_panier2"></span><span id="nbr_panier2_hidden" style="visibility:hidden">
    </span>
    @endif
        <button class="btn-direction btn-right">
            <img class="img-direction-btn" src="{{ asset('assets/images/icons/Chariot-panier.svg') }}" alt="">
        </button>
    </div>
    </div>

@endsection

@section('js-fin')

    <script src="{{ asset('assets/owl-caroussel/dist/owlcarousel2-filter.min.js') }}"></script>
    <script src="{{ asset('assets/jQuery-Mask-Plugin-master/dist/jquery.mask.min.js') }}"></script>
    <script src="{{ asset('js/rayons/rayons_helpers.js') }}"></script>
    <script src="{{ asset('js/rayons/rayon_helper_2.js') }}"></script>
    <script src="{{ asset('js/rayons/rayon_helper_3.js') }}"></script>
    <script src="{{ asset('js/rayons/show_rayon/mobile_on_scroll_product.js') }}"></script>
    <script src="{{ asset('js/rayons/notify_me_onstock.js') }}"></script>

    <script>
        Echo.private('negociation.<?php echo $user_id1 ;?>')
            .listen('RealtimeNegociation', (e) => {
                let received_msg = '<div class="negociation-marchand-response" style="width: 282px; margin-top: 27.47px; margin-left: 20px;"><div style="height: 18px;color: #8D97A5;font-family: Roboto;font-size: 12px;font-weight: 500;letter-spacing: 0.5px;line-height: 18px;text-align: right;">11:08</div><div style="width: 282px;border-radius: 5px;background-color: #D8D8D8; display: flex;justify-content: center; align-items: center"><div class="retour-marchand-zone" style="width: 265px;color: #51606D;font-family: Roboto;font-size: 14px;font-weight: 500;letter-spacing: 0;line-height: 20px; padding: 10px">'+e.message+'</div></div></div>'
                $('#userNegociationZoneElement').append(received_msg)
        });
    </script>

<script>



let product_instance = [];

// $rayon->id
var id_rayon = "<?php echo $rayon->id; ?>";

$('#numeroCarte-inviter').mask('0000 0000 0000 0000');
$('#numeroCcv').mask('000');

var main_carousel_document = document.querySelector('.main-carousel-section-changed-user')

window.onload = (event) => {
    var searched_product_id = getURLParameter('idp');
    searchProductResult(searched_product_id)
};

jQuery(document).ready(function () {

    var tablet_size_listener_min_width = matchMedia("(min-width: 500px)");

    if (tablet_size_listener_min_width.matches) {
        $('#nav-slide').owlCarousel({

        nav:true,
        loop: true,
        center: true,
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
                items: 4.9
            },
            1500: {
                items: 5.9
            },
            1700: {
                items: 8.9
            }
        }
        });
    }

    var owl = $('#grande-etagere-slide').owlCarousel({
        nav:true,
        margin: 0,
        loop: true,
        autoplay:false,
        lazyLoad: true,
        slideBy: 2,
        navText: [
            "<button type='button' class='d-none' id='etageres-prev-btn'></button>",
            "<button type='button' class='d-none' id='etageres-next-btn'></button>"
        ],
        responsive:{
            0:{
                items:1
            },
            800:{
                items:4
            },
            1250:{
                items: 6
            },
            1366:{
                items : 5
            },
            1400:{
                items : 7
            }
        }
    });

    $( '.owl-filter-bar' ).on( 'click', '.item', function() {
        var $item = $(this);
        var filter = $item.data( 'owl-filter' )
        owl.owlcarousel2_filter( filter );
    })

    $('#user_message_input').keypress(function() {

    let keycode = (event.keyCode ? event.keyCode : event.which);
    let message_content = $('#user_message_input').val();
    let id_produit = $('#negociation_id_product').val();

    if(keycode == '13'){
    let sending_msg = '<div class="right-container-elt1" id="marchand-messageSender" ><p class="marchand-msg-envoye">'+message_content+'</p></div>'
    $.ajax({
    type: 'POST',
    url: '/send_user_message',
    data: {message: message_content, id_produit: id_produit},
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    },
    success: function(response) {

    let message_body = '<div class="user-1-message-section" style="display: flex; flex-direction: column;"><div class="user-photo-name-time" style="display: flex;flex-direction: row;margin-left: 20px; margin-top: 20px;"><div class="photo-user" style=" height: 22px;width: 22px;border-radius: 50%;background-color: #4A4A4A;margin-right: 14px;"><img src="/uploads/avatars/'+response["image"]+'" style="width:100%; height:100%; border-radius: 50%; margin: 0px;margin-top: -6px" alt=""></div><div class="user-mane-thingin" style="height: 20px;width: 106px; color: #4A4A4A; font-family: Roboto; font-size: 14px; font-weight: 500; letter-spacing: 0; line-height: 20px;margin-right: 112px;">'+response['nom']+'</div> <div class="time-message-user" style="height: 18px; width: 26px;color: #8D97A5; font-family: Roboto; font-size: 12px;font-weight: 500; letter-spacing: 0.5px; line-height: 18px;text-align: right;">12h:00</div> </div> <div class="user-message" style=" width: 280px; border-radius: 5px; background-color: #191970;color: #fff; margin-left: 20px; margin-top: 14px; display: flex; justify-content: center; align-items: center"> <div style="width: 255.1px; color: #FFFFFF; font-family: Roboto;font-size: 14px;font-weight: 500;letter-spacing: 0;line-height: 20px;">'+message_content+'</div></div></div>'

    $('#userNegociationZoneElement').append(message_body)

    $('#user_message_input').val(" ")

    $('.negociation-message-success').removeClass('none-messaboxe')
    setTimeout(() => {
        $('.negociation-message-success').addClass('none-messaboxe')
    }, 3000);

    }
    })

    }
    })

    let facebook_feed = window.location.href;
    let paramString = facebook_feed.split('?')[1];
    let queryString = new URLSearchParams(paramString);

    // Fermeture du popop produit
    $('#modalProduitClosedBIS').on('click', function() {
        $('#marchand_video_preview_big_client').attr('src', " ")
        $('#recap-produit-main-modal').addClass('main-prod-detail-modal')
    })

    
    const nav_list = document.getElementById('nav-slide')
    const nav_list_items = $(nav_list).find('.item')

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

    const mobile_size_for_me = matchMedia("(max-width: 500px)");

    if (mobile_size_for_me.matches) {  
    if ((item_left_ecart > 0) && (item_right_ecart > 0)) {
        $(element).addClass('active-nav-list-btn-item')
        $(element).removeClass('mobile-default-style-border-blue')
        $(element).removeClass('desabled-rayon-categorie')
    } else {
        $(element).removeClass('active-nav-list-btn-item')
        $(element).removeClass('mobile-default-style-border-blue')
        $(element).addClass('mobile-default-style-border-grey')
        $(element).addClass('desabled-rayon-categorie')
    }
    }



    });



    })

    window.addEventListener('load', function () {
        jQuery(document).ready(function () {
            $('.sous-categorie-title p, .parametre-icon, .filter-icon, .my-slick-btn').slideDown(100);
        })
    })


$('#descProd').on('click', function() {

    closeMessagerieBox()
    $('#section-descriptions-produit-id').removeClass('main-prod-detail-modal')

    $('#recapPanierModalContent').css('position', 'relative');
    $('#recapPanierModalContent').css('left', '-200px');
    $('#dessBox').removeClass('none-messaboxe');
    console.log('la description est:', product_instance['Detail_Produit'][0][0]['description'])

    $('#Deskription').text(product_instance['Detail_Produit'][0][0]['description']) // Description
    $('#TableContainer').empty();
    for (let caracteristique_item in product_instance['Detail_Produit'][14] ) {
        let caracteristique_row = "<tr><td>"+caracteristique_item+"</td><td>"+product_instance['Detail_Produit'][14][caracteristique_item]+"</td></tr>"
        $('#TableContainer').append(caracteristique_row)
    }

})

// ---------------------------------- sharing section --------------------------------
let current_url_to_share = window.location.href;
$('#share-produit-whatapp').on('click', function() {
    let product_id = $('#id_produit').val()
    window.open('https://wa.me/?text='+current_url_to_share+'/?id='+product_id, '_blank');
})


$('#share-produit-twiter').on('click', function() {

    let product_id = $('#id_produit').val()
    let image_to_share = $('#tm_active_image_to_share').val(); // active image sur le popup
    let video_preview = $('#product_video_preview_for_share').val(); //video preview thumbnail

    openPopUp()

    $.ajax({ // Render a template to share
    type: 'POST',
    url: '/render_laravel_template',
    data: {id_produit: product_id, image_to_share: image_to_share, video_preview: video_preview},
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    },
    success: function(response) {
    // recuperation des attributs à envoyer avec la route facebook
    var produit_meta_data = response.produit_meta_data
    var libelle_produit = produit_meta_data[0].libelle_produits

    $('#main-bottom-zone-test').html(response.fb_template)

    html2canvas(document.getElementById('main-bottom-zone-test'), {
        // scale: 2
    }).then(function(canvas) {
    var base64data = canvas.toDataURL("image/png")

    $.ajax({ // upload a screenshot to server
    type: 'POST',
    url: '/article_screen_shot',
    data: {image_screen_shot:base64data},
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    },
    success: function(response) {

    if (response.length > 0) { // traitement de facebook

    var produit_preview = response.replace('social_share/', '');
        window.open('http://twitter.com/share?text='+libelle_produit + ' %23toulemarket via @toulemarket&url=https://toulemarket.com/twiter_preview_view/'+produit_meta_data[0].id_produit+'/'+produit_preview+'/'+produit_meta_data[0].rayon_id+'/'+produit_meta_data[0].rayon_slug, '_blank');
        newWindow.close()
    }

    },
    complete: function(){
        $('#main-bottom-zone-test').empty()
    }
    }) // --- Fin upload to server

    }); // --- Fin html2canvas
    }
    }) // -- Fin Render template to share from html

 })

$('#share-produit-mail').on('click', function() {
    let product_id = $('#id_produit').val()
    window.location.href = 'mailto:chrismedmadzou@gmail.com?subject=Subject&body='+current_url_to_share+'/?id='+product_id;
})

$('#share-produit-copie-coller').on('click', function() {
    var copyText = document.getElementById("link-to-share-product");

    copyText.select();
    copyText.setSelectionRange(0, 99999); // For mobile devices

    $('#messageSuccess-share').removeClass('field-none')
    $('#messageSuccess-share').css('margin-top', '16px')
    $('#zoneInputLien-share').addClass('field-none')
    // Copy the text inside the text field
    navigator.clipboard.writeText(copyText.value);

    setTimeout(function () {
        $('#messageSuccess-share').css('margin-top', '0px')
        $('#messageSuccess-share').addClass('field-none')
        $('#zoneInputLien-share').removeClass('field-none')
    }, 1000)

})

$('.mobile-description-caracteristique').on('click', function() {
        $(this).addClass('s-none-client')
})

$('.mobile-description-caracteristique2').on('click', function() {
    $(this).addClass('s-none-client')
})


$('.button-template').on('click', function() {

let input_val = $("#searchright-template").val();
let logo_zone = $('.header-site-logo').offset().left;
var logo_width = $('.header-site-logo').width();

var loop_element = $('#univers-btn-search-element1').offset().left + 15

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

$('#grande_etagereOK').on('click', function() {
    $('#searchright-template').removeClass('open-seach-field')
    $('.search-result-blocd').slideUp("fast")
})



const buttons=document.querySelectorAll(".mobile-container-elements")
document.getElementsByClassName("mobile-famille-libelle")[0].style.color="#191970"
buttons.forEach(button=>{
    button.addEventListener("click",function(){
        document.getElementsByClassName("mobile-famille-libelle")[0].style.color=""
        buttons.forEach(btn=>{
            btn.classList.remove("mobile-toggle-style-blue")
            btn.classList.add("mobile-default-style-border-grey")
        })
        button.classList.remove("mobile-default-style-border-grey")
        button.classList.add("mobile-toggle-style-blue")
    })
})


$(document).ready(function() {
    var windowHeight = window.innerHeight;
    var main_header_height = $('.main-header').height();
    var nav_bar_height = $('.my-navbar').height();

    var top_header_section = main_header_height + nav_bar_height;


    var grand_etagere = windowHeight - top_header_section + 20;

    console.log('Grand etagere height => ', grand_etagere)

    if (window.matchMedia("(max-width: 767px)").matches) {
        window.style.backgroundColor = "#ccc"
    }

    $('.etagere-parent-miror').css({
        'border': '1px solid red'  
    })

})


</script>

@endsection
