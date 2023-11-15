@extends('front.layout.main-layout')

<?php

    use Illuminate\Support\Facades\DB;
    use App\Models\Produit;

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
    }else{
        $maLangue = [];
        $maVille = [];
        $maProvince = [];
        $maDevise = [];
    }

    $maPosition = $_SESSION['config']['ma-position'];

    $arry = [];

    if ($default_rayon->id == 25) {
        $arry = array_chunk($produitsPartager->toArray(), 12);
    }else if ($default_rayon->id == 27) {
        $arry = array_chunk($produitsPartager->toArray(), 40);
    }else if ($default_rayon->id == 26) {
        $arry = array_chunk($produitsPartager->toArray(), 25);
    }else if ($default_rayon->id == 28) {
        $arry = array_chunk($produitsPartager->toArray(), 12);
    }

// echo $boutique;
// get boutique informations
$use_photo_profil = NULL;
$use_first_letter = '';

$boutiques = DB::table('boutiques')->where('id', $boutique)->get();
if (empty($boutiques[0]->image || is_null($boutiques[0]->image))) {
    $use_first_letter = $boutiques[0]->libelle;
}else {
    $use_photo_profil = $boutiques[0]->image;
}

$marchand = 
DB::table('marchands')
->join('users', 'users.id', '=', 'marchands.id_utilisateur')
->select('users.*')
->where('marchands.id', $boutiques[0]->id_marchand)->get();
// echo $marchand[0]->id;

$marchand_image = $marchand[0]->image;

// dd($marchand);
// print_r($boutiques);

echo "<script>var partager_seached_rayon_val = ".$default_rayon->id.", boutique_partager_id = ".$boutique."</script>";

?>

@section('css-debut')

    <link rel="stylesheet" href="{{ asset('css/new_product_recap_product.css')}}" >
    {{-- <link rel="stylesheet" href="{{ asset('css/partager_boutique.css')}}" > --}}
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

@endsection

@include('front.app-module.rayon.recap-produit-main-modal')
@section('search-bar')
<div class="rayon-bloc-recherche" >

    <div class="formRayonSearch_input my-form-field br-l input-recherche" style="width: inherit; z-index: 12" tabindex="0">
        <input  placeholder="Commencez votre recherche..." type="text" class="" data-key="{{ csrf_token() }}"  name="formRayonSearch_text" id="formRayonSearch_text-input_partager" style="height: 34px;">
        <div class="icon-note-vocal">
            <i class="fal fa-microphone-alt text-danger"></i>
        </div>
    </div>

    <div class="formRayonSearch_button">
        <button class="button-recherche mon-btn-primary" type="submit">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="#fff" class="bi bi-search" viewBox="0 0 16 16">
                <path d="M11.742 10.315a6.5 6.5 0 1 0-1.427 1.427l3.823 3.822a1 1 0 0 0 1.415-1.414l-3.822-3.823zM2 6.5a4.5 4.5 0 1 1 9 0a4.5 4.5 0 0 1-9 0z"></path>
            </svg>
        </button>
    </div>

</div>

@include('front.app-module.univers.includes.partage-search-results')
@endsection

@section('zone-option-profild')
<div>
<div class="group2 main-header-icons" style="width: 70px;">

    <div class="icon-pays">
        <a href="javascript:;" data-toggle="modal" data-target="#modalLangueDevise">
            <img class="header-icon-home" style="height: 22px; width: 22px;border-radius: 50%;" src="{{ \App\Models\Pays::getImage2($maPosition['images']) }}" alt="">
        </a>
    </div>

    @auth
        <div class="icon-profil" id="toggle-profil-icon" onclick="toggleShowElement('#profil-box')">
            <img class="header-icon-home" style="height: 22px; width: 22px; border-radius: 50%;" src="{{ \App\User::getImage() }}" alt="">
        </div>
    @endauth

    @guest()
        <div class="icon-profil" id="toggle-profil-icon" onclick="toggleShowElement('#profil-box')">
            <img class="header-icon-home" style="height: 22px; width: 22px; border-radius: 50%;" src="{{ \App\User::getImage() }}" alt="">
        </div>
    @endguest
</div>
</div>
@endsection

@section('contenu')

@if(($default_rayon->id == 25) || ($default_rayon->id == 26) || ($default_rayon->id == 27) || ($default_rayon->id == 28) || ($default_rayon->id == 38) || ($default_rayon->id == 39))
    <div style="background: url('/storage/images/rayons/grande_etagere/background_univers_3_etagere1_type1.webp') no-repeat; background-repeat: no-repeat; background-size: cover; background-position: center; height: calc(100vh - 95px) !important;" class="grande-etagere padding-fluid" id="grande_etagereOK">
@else
    <div class="contenu-marchand" style="background: url('/storage/images/rayons/{{$default_rayon->grande_etagere }}') no-repeat; background-repeat: no-repeat; background-size: cover; background-position: center;">
@endif


    <div class="dynamique-div-section s-none">

    </div>

    <style>

        @media screen and (min-width: 1919px)  {
            .prod_container_bis {
            height: 99% !important;
            display: flex;
            flex-direction: column;
            grid-row-gap: 0px;
            display: grid !important;
            grid-template-rows: 0px 1fr 1fr 1fr 1fr 1fr 7.5%;
            grid-row-gap: 0px !important;
            margin-top: 8px;
        }

        .slider-content-wrapper-user {
            height: 99% !important;
        }

        }

        .prod_container_bis {
            height: 99%;
            display: flex;
            flex-direction: column;
            grid-row-gap: 0px;
            display: grid !important;
            grid-template-rows: 0px 1fr 1fr 1fr 1fr 1fr 7.5%;
            grid-row-gap: 0px !important;
            margin-top: 8px;
        }
    
        .prod_container_bis_tv {
            height: 100%;
            display: flex;
            flex-direction: column;
            grid-row-gap: 0px;
            display: grid !important;
            grid-template-rows: 1fr 1fr 1fr  36px;
            grid-row-gap: 0px !important;
        }
    
        .line_0 {
            width: 96.8%;
            background-color: #f9f9f9;;
            position: relative;
            margin-left: auto;
            margin-right: auto;
            top: 6px;
            z-index: 1000
        }
    
        .line_1 {
            width: 96.8%;
            background: url('/storage/etagere_decouper_webp/Ligne01.webp');
            background-size: 102% 100%;
            background-repeat: no-repeat;
            position: relative;
            margin-left: auto;
            margin-right: auto;
        }
    
        .line_2 {
            width: 100%;
            background: url('/storage/etagere_decouper_webp/Ligne02.webp');
            background-size: 100% 100%;
            background-repeat: no-repeat;
        }
    
        .line_3 {
            width: 100%;
            background: url('/storage/etagere_decouper_webp/Ligne03.webp');
            background-size: 100% 100%;
            background-repeat: no-repeat;
        }
    
        .line_4 {
            width: 100%;
            background: url('/storage/etagere_decouper_webp/Ligne04.webp');
            background-size: 100% 100%;
            background-repeat: no-repeat;
        }
    
        .line_5 {
            width: 100%;
            background: url('/storage/etagere_decouper_webp/Ligne05.webp');
            background-size: 100% 100%;
            background-repeat: no-repeat;
        }
    
        .line_6 {
            width: 100%;
            background: url('/storage/etagere_decouper_webp/Ligne06.webp');
            background-size: 100% 100%;
        }
    
        .line_6 {
            width: 100%;
            background: url('/storage/etagere_decouper_webp/Ligne06.webp');
            background-size: 100% 100%;
        }
    
        .line_1_tv {
            width: 97.8%;
            background: url('/storage/etagere_decouper_tv_webp/Ligne1.webp');
            background-size: 100% 100%;
            background-repeat: no-repeat;
            position: relative;
            margin-left: auto;
        }
    
        .line_2_tv {
            width: 100%;
            background: url('/storage/etagere_decouper_tv_webp/Ligne2.webp');
            background-size: 100% 100%;
            background-repeat: no-repeat;
        }
    
        .line_3_tv {
            width: 100%;
            background: url('/storage/etagere_decouper_tv_webp/Ligne3.webp');
            background-size: 100% 100%;
            background-repeat: no-repeat;
        }
    
        .line_4_tv {
            width: 100%;
            background: url('/storage/etagere_decouper_tv_webp/Ligne4.webp');
            background-size: 100% 100%;
            background-repeat: no-repeat;
        }

        .section-hidden-boutique {
            display: block !important;
        }

        .main-carousel-section-changed-user, .main-carousel-section-changed-user_tv {
            width: 100% !important;
        }

        .grande-etagere {
            height: calc(100vh - 148px) !important;
            width: 100% !important;
            background-position: -15px -120px !important;
            background-size: calc(100% + 50px) 104vh !important;
        }
    
    </style>

    <div class="navbar-next" style="position: relative; top: 1%; padding-left: 4% !important">
        <div class="user-marchand-profil" style="margin-top: -5px ! important">

            <div class="img-marchand" onclick="showMenuProfil()" style="height: 70px; width: 70px; border-radius: 6px">
                @if(!is_null($use_photo_profil))
                <img src="/{{ $use_photo_profil }}" alt="" />
                @else
                <div id="avatar-letter" style="border-radius: 6px">
                    <div class="boutiqueLetterStyle12" style="box-sizing: border-box;
                    height: 70px;
                    width: 70px;
                    border-right: 1px solid #1A7EF5;
                    border-radius: 6px; font-size: 50px; font-weight: 900; display: flex; justify-content: center; align-items: center; color: #1A7EF5">
                    {{substr($use_first_letter, 0, 1)}}

                </div>
            </div>
                @endif

            </div>

            <div class="element-icons" >
 
                <div class="icons-share-marchand marchand-user-profil" onclick="showMenuProfil()" style="display: flex; justify-content: center; align-items: center;">
                    @if(!is_null($marchand_image))
                        <img src="/{{$marchand_image}}" alt="" >
                    @else
                    <img src="/assets/images/User3.svg" alt="" >
                    @endif
                </div>

                <div id="share-boutique-marchand" class="icons-share-marchand img-share-marchand" style="display: flex; justify-content: center; align-items: center; margin-top: 5px">
                    <img src="/assets/images/Partage_Copy.svg" alt="" >
                </div>

            </div>

        </div>

    <div class="next-box-marchand" style="margin-top: -5px ! important; margin-right: 10px">
        <div class="next-box-marchand-text">
            Clients en rayon
        </div>

        <div class="next-box-marchand-img" style="margin-top: -10px !important">
            <div>
                {{-- <img src="/assets/images2/user.png" alt="" > --}}
            </div>
            <div>
                {{-- <img src="/assets/images2/user.png" alt="" > --}}
            </div>
            <div>
                
            </div>

        </div>

    </div>

    <div class="trait-separator" style="display: none"></div>

    <div class="historique">
    <li onclick="raccourci1('boutik3', 'boutik1', 'mes-boutiques-contents-id')" id="boutik3"><img src="/assets/images/icones-vendeurs2/icones-menu/boutique.svg"id="boutik1"><img src="assets/images/icones-vendeurs2/icones-menu/boutiquebleu.svg" style="display:none"id="boutik2"><br><br><p style="margin-top:3px;">Mes <br> boutiques</p></li>
    {{-- afficher les rayon d'une boutique  --}}

    <div >
    <section class="section-hidden-boutique" id="boutik4">

    <div style="position: absolute" class="prev-element-share-old slide-rayon-btn-old" onclick="swipper_prev()">
        <img src="/assets/images/icones-vendeurs2/chevron_big_left.svg" style="margin-left:2px; margin-top:24px;">
    </div>

    <article style="" class="main-zone-rayon-section-share">

    <div class="swiper mySwiper2">
        <div class="swiper-wrapper" style="display: flex; overflow-x: hidden">

        </div>
    </div>

    </article>

    <div style="" class="next-element-share slide-btn-next-rayon" id="nextRayonShare" onclick="swipper_next()">
        <img src="/assets/images/icones-vendeurs2/chevron_big_right.svg" style="margin-left:1.5px; margin-top:24px;">
    </div>

    </section>

    {{-- afficher les rayon d'une boutique fin et debut de l'option par defaut  --}}

    </div>

        <li style="padding:4px;display:none;"onclick="raccourci6()"><article style=" height: 60px;
            width: 60px;
            border-radius: 6px;
            background-color: #1A7EF5;color:white;text-align:center;padding-top:20px;padding:5px; font-family: Roboto;
            font-size: 12px;
            font-weight:300;
            letter-spacing: 0.24px;
            line-height: 13px;padding-top:15px;" ><img src="assets/images/icones-vendeurs2/Plusblanc.svg" width="15px" height="15px;"style="margin-bottom:5px;"><br>Créer</article></li>
        </div>

        <div>
        </div>
    </div>

    <div class="rayon-btn-direction-legume-left  prev-div-btn my-slick-btn-2" onclick="tm_carousel_preview1()">
        <button class="btn-left btn-direction" style="border-radius: 0px 50% 50% 0px">
            <img class="img-direction-btn" src="{{ asset('assets/images2/prec.svg') }}" alt="">
        </button>
    </div>

    <div id="desk-top-article-section-id">
    @if($default_rayon->id == 25)
    <div class="etagere_parent_zone_tv" id="zone_produit_calculate">
        <div class="main-carousel-section-changed-user_tv" id="main-rayon-container-{{$default_rayon->id}}">

        <div class="slider-content-wrapper-user" id="rayon-produit-section-{{$default_rayon->id}}">
            <div class="custom-carousel-page-user prod_container_bis_tv">
                <div class="line_1_tv"></div>
                <div class="line_2_tv"></div>
                <div class="line_3_tv"></div>
                <div class="line_4_tv"></div>
            </div>
        </div>

    </div>
    </div>

    @endif

    @if($default_rayon->id == 28)

        <div class="etagere_parent_zone_tv" id="zone_produit_calculate">
        <div class="main-carousel-section-changed-user_tv" id="main-rayon-container-{{$default_rayon->id}}">

        <div class="slider-content-wrapper-user" id="rayon-produit-section-{{$default_rayon->id}}">
            <div class="custom-carousel-page-user prod_container_bis_tv">
                <div class="line_1_tv"></div>
                <div class="line_2_tv"></div>
                <div class="line_3_tv"></div>
                <div class="line_4_tv"></div>
            </div>
        </div>
        </div>
        </div>

    @endif

    @if($default_rayon->id == 27)
    <div class="etagere_parent_zone" id="zone_produit_calculate">

        <div class="main-carousel-section-changed-user main-carousel-center-item" id="main-rayon-container-{{$default_rayon->id}}">

        <div class="slider-content-wrapper-user"  id="rayon-produit-section-{{$default_rayon->id}}">
            <div class="custom-carousel-page-user prod_container_bis">
                <div class="line_0"></div>
                <div class="line_1"></div>
                <div class="line_2"></div>
                <div class="line_3"></div>
                <div class="line_4"></div>
                <div class="line_5"></div>
                <div class="line_6"></div>
            </div>
        </div>

        </div>
    </div>
    @endif

    @if($default_rayon->id == 12)
    <div class="etagere_parent_zone" id="zone_produit_calculate">

        <div class="main-carousel-section-changed-user main-carousel-center-item" id="main-rayon-container-{{$default_rayon->id}}">

        <div class="slider-content-wrapper-user"  id="rayon-produit-section-{{$default_rayon->id}}">
            <div class="custom-carousel-page-user prod_container_bis">
                <div class="line_0"></div>
                <div class="line_1"></div>
                <div class="line_2"></div>
                <div class="line_3"></div>
                <div class="line_4"></div>
                <div class="line_5"></div>
                <div class="line_6"></div>
            </div>
        </div>

        </div>
    </div>
    @endif

    @if($default_rayon->id == 9)
    <div class="etagere_parent_zone" id="zone_produit_calculate">

        <div class="main-carousel-section-changed-user main-carousel-center-item" id="main-rayon-container-{{$default_rayon->id}}">

        <div class="slider-content-wrapper-user"  id="rayon-produit-section-{{$default_rayon->id}}">

            <div class="custom-carousel-page-user prod_container_bis">
                <div class="line_0"></div>
                <div class="line_1"></div>
                <div class="line_2"></div>
                <div class="line_3"></div>
                <div class="line_4"></div>
                <div class="line_5"></div>
                <div class="line_6"></div>
            </div>

        </div>

        </div>

    </div>

    @endif

    @if($default_rayon->id == 8)
    <div class="etagere_parent_zone" id="zone_produit_calculate">

        <div class="main-carousel-section-changed-user main-carousel-center-item" id="main-rayon-container-{{$default_rayon->id}}">

        <div class="slider-content-wrapper-user"  id="rayon-produit-section-{{$default_rayon->id}}">

            <div class="custom-carousel-page-user prod_container_bis">
                <div class="line_0"></div>
                <div class="line_1"></div>
                <div class="line_2"></div>
                <div class="line_3"></div>
                <div class="line_4"></div>
                <div class="line_5"></div>
                <div class="line_6"></div>
            </div>

        </div>

        </div>

    </div>

    @endif

    @if($default_rayon->id == 38)
    <div class="etagere_parent_zone" id="zone_produit_calculate">

        <div class="main-carousel-section-changed-user main-carousel-center-item" id="main-rayon-container-{{$default_rayon->id}}">

        <div class="slider-content-wrapper-user"  id="rayon-produit-section-{{$default_rayon->id}}">

            <div class="custom-carousel-page-user prod_container_bis">
                <div class="line_0"></div>
                <div class="line_1"></div>
                <div class="line_2"></div>
                <div class="line_3"></div>
                <div class="line_4"></div>
                <div class="line_5"></div>
                <div class="line_6"></div>
            </div>

        </div>

        </div>

    </div>

    @endif

    @if($default_rayon->id == 26)
    <div class="etagere_parent_zone" id="zone_produit_calculate">

        <div class="main-carousel-section-changed-user main-carousel-center-item" id="main-rayon-container-{{$default_rayon->id}}">

        <div class="slider-content-wrapper-user"  id="rayon-produit-section-{{$default_rayon->id}}">
            <div class="custom-carousel-page-user prod_container_bis">
                <div class="line_0"></div>
                <div class="line_1"></div>
                <div class="line_2"></div>
                <div class="line_3"></div>
                <div class="line_4"></div>
                <div class="line_5"></div>
                <div class="line_6"></div>
            </div>
        </div>

        </div>
    </div>
    @endif

    @if($default_rayon->id == 39)
    <div class="etagere_parent_zone" id="zone_produit_calculate">

        <div class="main-carousel-section-changed-user main-carousel-center-item" id="main-rayon-container-{{$default_rayon->id}}">

        <div class="slider-content-wrapper-user"  id="rayon-produit-section-{{$default_rayon->id}}">
            <div class="custom-carousel-page-user prod_container_bis">
                <div class="line_0"></div>
                <div class="line_1"></div>
                <div class="line_2"></div>
                <div class="line_3"></div>
                <div class="line_4"></div>
                <div class="line_5"></div>
                <div class="line_6"></div>
            </div>
        </div>

        </div>
    </div>
    @endif
    </div>


    <div class="rayon-btn-direction-legume next-div-btn-share-boutik my-slick-btn-2" onclick="tm_carousel_next2({{$boutique}})" style="border-radius: 50% 0px 0px 50%; bottom: 200px; top: 53%">
        <button class="btn-direction-faux btn-right-small" style="background: transparent">
            <img class="img-direction-btnd" src="{{ asset('assets/images2/Next.svg') }}" alt="">
        </button>
    </div> 


    <div class="rayon-btn-direction-etat-panier next-div-btn-share-boutik my-slick-btn-2-12" style="z-index: 11000; margin-top: -23vh" onclick="document.getElementById('voir_panier').click()">

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

    

    <style>

    .content-slide {
        display: flex;
        flex-direction:column;
        row-gap: 20px;
    }

    .etagere_parent_zone {
        display: flex;
        flex-direction: column;
        justify-content: flex-end;
        width: 91% !important;
        position: relative;
        margin-left: auto !important;
        margin-right: auto !important;
        justify-content: flex-start !important;
    }

    .slider-content-wrapper-user {
        height: 93% !important;
    }

    </style>

    {{-- <div class="bottom-bar-float">


    </div> --}}

        {{-- modal zone --}}

    </div>

<style>

    .shareboutique, .shareboutique-content {
        height: 212px !important;
        width: 432px !important;
        border-radius: 6px;
    }

    .social-box-media {
        box-sizing: border-box;
        height: 66px;
        width: 58px;
        border: 1px solid #979797;
        border-radius: 6px;
        background-color: #FFFFFF;
        display: flex;
        justify-content: center;
        align-items: center;
    }

    .social-box-media:hover {
        cursor: pointer;
    }

</style> 

{{-- partager ma boutique  --}}
<script>

var partager_boutique_page_counter = 0;

if((partager_seached_rayon_val == 27) || (partager_seached_rayon_val == 12)) {
    min_val_prod_culumn = 200
}else if (partager_seached_rayon_val == 25) {
    min_val_prod_culumn = 330;
}else if(partager_seached_rayon_val == 26) {
    min_val_prod_culumn = 300;
}else if(partager_seached_rayon_val == 28) {
    min_val_prod_culumn = 330;
}else if(partager_seached_rayon_val == 38) {
    min_val_prod_culumn = 200;
}else if(partager_seached_rayon_val == 39) {
    min_val_prod_culumn = 200;
}else if((partager_seached_rayon_val == 9) || (partager_seached_rayon_val == 8)) {
    min_val_prod_culumn = 250;
}else {
    min_val_prod_culumn = 300
}


function showProductByScreenSite_bis(partager_seached_rayon_val, data_product, colomn_number) {

var etagere_ligne_counter = 0;
var etagere_ligne_counter_bloc_3 = 0

const chunk = (arr, size) =>
Array.from({ length: Math.ceil(arr.length / size) }, (v, i) =>
    arr.slice(i * size, i * size + size)
);

if (partager_seached_rayon_val == 27) { // ------------- téléphonie

var line_slide = chunk(data_product, colomn_number)
var etagere_slides = [];

etagere_slides += '<div class="custom-carousel-page-user prod_container_bis" style="position: relative; " >'
etagere_slides += '<div class="line_0"></div>'
line_slide.forEach((div_row, div_index) => {
etagere_ligne_counter ++;

if (div_index == 0) {
    etagere_slides += '<div class="row_div-user-telephonie line_1" >'
}else if(div_index == 1) {
    etagere_slides += '<div class="row_div-user-telephonie line_2" >'
}else if (div_index == 2) {
    etagere_slides += '<div class="row_div-user-telephonie line_3" >'
}else if(div_index == 3) {
    etagere_slides += '<div class="row_div-user-telephonie line_4" >'
}else if(div_index == 4) {
    etagere_slides += '<div class="row_div-user-telephonie line_5" >'
}else {
    etagere_slides += '<div class="row_div-user-telephonie" >'
}

div_row.forEach((slide_el, index) => {

var phone_height = getProductHeight(slide_el);
etagere_slides += generateProdCase(slide_el, phone_height)

})

etagere_slides += '</div>'

})

if (etagere_ligne_counter < 5) {
    var reste_ligne = 5 - etagere_ligne_counter
    for (let j = 0; j < reste_ligne; j++) {

    var nbre_suivant = etagere_ligne_counter + j;

    if (nbre_suivant == 0) {
        etagere_slides += '<div class="row_div-user-telephonie line_1"></div>'
    }else if(nbre_suivant == 1) {
        etagere_slides += '<div class="row_div-user-telephonie line_2"></div>'
    }else if(nbre_suivant == 2) {
        etagere_slides += '<div class="row_div-user-telephonie line_3"></div>'
    }else if(nbre_suivant == 3) {
        etagere_slides += '<div class="row_div-user-telephonie line_4"></div>'
    }else if(nbre_suivant == 4) {
        etagere_slides += '<div class="row_div-user-telephonie line_5"></div>'
    }else {
        etagere_slides += '<div class="row_div-user-telephonie"></div>'
    }

    }
}

etagere_slides += '<div class="line_6"></div>'

etagere_slides += '</div>'

$('.slider-content-wrapper-user').append(etagere_slides)

} else if (partager_seached_rayon_val == 36) { // ------------- Papetérie

    var line_slide = chunk(data_product, colomn_number)
    var etagere_slides = [];


    etagere_slides += '<div class="custom-carousel-page-user prod_container_bis" style="position: relative; " >'
    etagere_slides += '<div class="line_0"></div>'
    line_slide.forEach((div_row, div_index) => {
    etagere_ligne_counter ++;

    if (div_index == 0) {
        etagere_slides += '<div class="row_div-user-telephonie line_1" >'
    }else if(div_index == 1) {
        etagere_slides += '<div class="row_div-user-telephonie line_2" >'
    }else if (div_index == 2) {
        etagere_slides += '<div class="row_div-user-telephonie line_3" >'
    }else if(div_index == 3) {
        etagere_slides += '<div class="row_div-user-telephonie line_4" >'
    }else if(div_index == 4) {
        etagere_slides += '<div class="row_div-user-telephonie line_5" >'
    }else {
        etagere_slides += '<div class="row_div-user-telephonie" >'
    }

    div_row.forEach((slide_el, index) => {

    var phone_height = getProductHeight(slide_el);
    etagere_slides += generateProdCaseInfoReseau(slide_el, phone_height)

    })

    etagere_slides += '</div>'

    })

    if (etagere_ligne_counter < 5) {
        var reste_ligne = 5 - etagere_ligne_counter
        for (let j = 0; j < reste_ligne; j++) {

        var nbre_suivant = etagere_ligne_counter + j;

        if (nbre_suivant == 0) {
            etagere_slides += '<div class="row_div-user-telephonie line_1"></div>'
        }else if(nbre_suivant == 1) {
            etagere_slides += '<div class="row_div-user-telephonie line_2"></div>'
        }else if(nbre_suivant == 2) {
            etagere_slides += '<div class="row_div-user-telephonie line_3"></div>'
        }else if(nbre_suivant == 3) {
            etagere_slides += '<div class="row_div-user-telephonie line_4"></div>'
        }else if(nbre_suivant == 4) {
            etagere_slides += '<div class="row_div-user-telephonie line_5"></div>'
        }else {
            etagere_slides += '<div class="row_div-user-telephonie"></div>'
        }

        }
    }

    etagere_slides += '<div class="line_6"></div>'

    etagere_slides += '</div>'

    $('.slider-content-wrapper-user').append(etagere_slides)

    } else if (partager_seached_rayon_val == 39) { // ------------- Papetérie

var line_slide = chunk(data_product, colomn_number)

var etagere_slides = [];


etagere_slides += '<div class="custom-carousel-page-user prod_container_bis" style="position: relative; " >'
etagere_slides += '<div class="line_0"></div>'
line_slide.forEach((div_row, div_index) => {

console.log('Les data sont => ', div_row)
etagere_ligne_counter ++;

if (div_index == 0) {
    etagere_slides += '<div class="row_div-user-telephonie line_1" >'
}else if(div_index == 1) {
    etagere_slides += '<div class="row_div-user-telephonie line_2" >'
}else if (div_index == 2) {
    etagere_slides += '<div class="row_div-user-telephonie line_3" >'
}else if(div_index == 3) {
    etagere_slides += '<div class="row_div-user-telephonie line_4" >'
}else if(div_index == 4) {
    etagere_slides += '<div class="row_div-user-telephonie line_5" >'
}else {
    etagere_slides += '<div class="row_div-user-telephonie" >'
}

div_row.forEach((slide_el, index) => {

var phone_height = getProductHeight(slide_el);

etagere_slides += generateProdCaseInfoReseau(slide_el, phone_height)

})

etagere_slides += '</div>'

})

if (etagere_ligne_counter < 5) {
    var reste_ligne = 5 - etagere_ligne_counter
    for (let j = 0; j < reste_ligne; j++) {

    var nbre_suivant = etagere_ligne_counter + j;

    if (nbre_suivant == 0) {
        etagere_slides += '<div class="row_div-user-telephonie line_1"></div>'
    }else if(nbre_suivant == 1) {
        etagere_slides += '<div class="row_div-user-telephonie line_2"></div>'
    }else if(nbre_suivant == 2) {
        etagere_slides += '<div class="row_div-user-telephonie line_3"></div>'
    }else if(nbre_suivant == 3) {
        etagere_slides += '<div class="row_div-user-telephonie line_4"></div>'
    }else if(nbre_suivant == 4) {
        etagere_slides += '<div class="row_div-user-telephonie line_5"></div>'
    }else {
        etagere_slides += '<div class="row_div-user-telephonie"></div>'
    }

    }
}

etagere_slides += '<div class="line_6"></div>'

etagere_slides += '</div>'

console.log('Here is shared data => ', etagere_slides)

$('.slider-content-wrapper-user').append(etagere_slides)

}else if (partager_seached_rayon_val == 38) { // ------------- Papetérie

var line_slide = chunk(data_product, colomn_number)

var etagere_slides = [];


etagere_slides += '<div class="custom-carousel-page-user prod_container_bis" style="position: relative; " >'
etagere_slides += '<div class="line_0"></div>'
line_slide.forEach((div_row, div_index) => {

console.log('Les data sont => ', div_row)
etagere_ligne_counter ++;

if (div_index == 0) {
    etagere_slides += '<div class="row_div-user-telephonie line_1" >'
}else if(div_index == 1) {
    etagere_slides += '<div class="row_div-user-telephonie line_2" >'
}else if (div_index == 2) {
    etagere_slides += '<div class="row_div-user-telephonie line_3" >'
}else if(div_index == 3) {
    etagere_slides += '<div class="row_div-user-telephonie line_4" >'
}else if(div_index == 4) {
    etagere_slides += '<div class="row_div-user-telephonie line_5" >'
}else {
    etagere_slides += '<div class="row_div-user-telephonie" >'
}

div_row.forEach((slide_el, index) => {

var phone_height = getProductHeight(slide_el);
etagere_slides += generateProdCaseInfoReseau(slide_el, phone_height)

})

etagere_slides += '</div>'

})

if (etagere_ligne_counter < 5) {
    var reste_ligne = 5 - etagere_ligne_counter
    for (let j = 0; j < reste_ligne; j++) {

    var nbre_suivant = etagere_ligne_counter + j;

    if (nbre_suivant == 0) {
        etagere_slides += '<div class="row_div-user-telephonie line_1"></div>'
    }else if(nbre_suivant == 1) {
        etagere_slides += '<div class="row_div-user-telephonie line_2"></div>'
    }else if(nbre_suivant == 2) {
        etagere_slides += '<div class="row_div-user-telephonie line_3"></div>'
    }else if(nbre_suivant == 3) {
        etagere_slides += '<div class="row_div-user-telephonie line_4"></div>'
    }else if(nbre_suivant == 4) {
        etagere_slides += '<div class="row_div-user-telephonie line_5"></div>'
    }else {
        etagere_slides += '<div class="row_div-user-telephonie"></div>'
    }

    }
}

etagere_slides += '<div class="line_6"></div>'

etagere_slides += '</div>'

console.log('Here is shared data => ', etagere_slides)

$('.slider-content-wrapper-user').append(etagere_slides)

}else if(partager_seached_rayon_val == 25) {
    var etagere_slides = [];

    etagere_slides += '<div class="custom-carousel-page-user prod_container_bis_tv">'

    var line_slide = chunk(data_product, colomn_number)

    line_slide.forEach((div_row, div_index) => {

    etagere_ligne_counter ++;
    if (div_index == 0) {
        etagere_slides += '<div class="row_div-user line_1_tv" >'
    }else if(div_index == 1) {
        etagere_slides += '<div class="row_div-user line_2_tv" >'
    }else if (div_index == 2) {
        etagere_slides += '<div class="row_div-user line_3_tv" >'
    }else {
        etagere_slides += '<div class="row_div-user" >'
    }
    // etagere_slides += '<div class="row_div-user" >'
    div_row.forEach((slide_el, index) => {

    etagere_slides += '<div id="addSlide-user'+slide_el.id+'" onclick="showClickEffect('+slide_el.id+')" class="slide case-produit-btnd" onmouseover="showEffect('+slide_el.id+')" style="height: 155px !important;" onmouseleave="showEffectRemove('+slide_el.id+')">'
    etagere_slides += '<img id="image-prod-id'+slide_el.id+'" onclick="showRecapProduitMarchandTV('+slide_el.id+')" class="image-prod" src= "/'+slide_el.image+'" width="'+slide_el.taille_sur_etagere+'px">'
    etagere_slides += '<span id="effect-layer'+slide_el.id+'" class="product-effect-layer effect-none" style="font-size: 12px; position: absolute; width: '+slide_el.taille_sur_etagere+'px; "><span class="cap-cover"></span>'

        etagere_slides += '</span>'
        etagere_slides += '</div>'

    })
        etagere_slides += '</div>'
    })

    if (etagere_ligne_counter < 3) {

    var reste_ligne = 3 - etagere_ligne_counter

    for (let j = 0; j < reste_ligne; j++) {
        var line_tv_suivant = etagere_ligne_counter + j;

        if (line_tv_suivant == 0) {
            etagere_slides += '<div class="row_div-user line_1_tv" ></div>'
        }else if(line_tv_suivant == 1) {
            etagere_slides += '<div class="row_div-user line_2_tv" ></div>'
        }else if (line_tv_suivant == 2) {
            etagere_slides += '<div class="row_div-user line_3_tv" ></div>'
        }else {
            etagere_slides += '<div class="row_div-user" ></div>'
        }

    }

    }

    etagere_slides += '<div class="line_4_tv"></div>'

    etagere_slides += '</div>'

    $('.slider-content-wrapper-user').append(etagere_slides)
}else if (partager_seached_rayon_val == 9) { // ------------- Papetérie

var line_slide = chunk(data_product, colomn_number)

var etagere_slides = [];


etagere_slides += '<div class="custom-carousel-page-user prod_container_bis" style="position: relative; " >'
etagere_slides += '<div class="line_0"></div>'
line_slide.forEach((div_row, div_index) => {

console.log('Les data sont => ', div_row)
etagere_ligne_counter ++;

if (div_index == 0) {
    etagere_slides += '<div class="row_div-user-telephonie line_1" >'
}else if(div_index == 1) {
    etagere_slides += '<div class="row_div-user-telephonie line_2" >'
}else if (div_index == 2) {
    etagere_slides += '<div class="row_div-user-telephonie line_3" >'
}else if(div_index == 3) {
    etagere_slides += '<div class="row_div-user-telephonie line_4" >'
}else if(div_index == 4) {
    etagere_slides += '<div class="row_div-user-telephonie line_5" >'
}else {
    etagere_slides += '<div class="row_div-user-telephonie" >'
}

div_row.forEach((slide_el, index) => {

var phone_height = getProductHeight(slide_el);

console.log('Le height phone est bien => ', phone_height)
etagere_slides += generateProdCaseInfoReseau(slide_el, phone_height)

})

etagere_slides += '</div>'

})

if (etagere_ligne_counter < 5) {
    var reste_ligne = 5 - etagere_ligne_counter
    for (let j = 0; j < reste_ligne; j++) {

    var nbre_suivant = etagere_ligne_counter + j;

    if (nbre_suivant == 0) {
        etagere_slides += '<div class="row_div-user-telephonie line_1"></div>'
    }else if(nbre_suivant == 1) {
        etagere_slides += '<div class="row_div-user-telephonie line_2"></div>'
    }else if(nbre_suivant == 2) {
        etagere_slides += '<div class="row_div-user-telephonie line_3"></div>'
    }else if(nbre_suivant == 3) {
        etagere_slides += '<div class="row_div-user-telephonie line_4"></div>'
    }else if(nbre_suivant == 4) {
        etagere_slides += '<div class="row_div-user-telephonie line_5"></div>'
    }else {
        etagere_slides += '<div class="row_div-user-telephonie"></div>'
    }

    }
}

etagere_slides += '<div class="line_6"></div>'

etagere_slides += '</div>'

console.log('Here is shared data => ', etagere_slides)

$('.slider-content-wrapper-user').append(etagere_slides)

}else if (partager_seached_rayon_val == 12) { // ------------- Papetérie

var line_slide = chunk(data_product, colomn_number)

var etagere_slides = [];


etagere_slides += '<div class="custom-carousel-page-user prod_container_bis" style="position: relative; " >'
etagere_slides += '<div class="line_0"></div>'
line_slide.forEach((div_row, div_index) => {

console.log('Les data sont => ', div_row)
etagere_ligne_counter ++;

if (div_index == 0) {
    etagere_slides += '<div class="row_div-user-telephonie line_1" >'
}else if(div_index == 1) {
    etagere_slides += '<div class="row_div-user-telephonie line_2" >'
}else if (div_index == 2) {
    etagere_slides += '<div class="row_div-user-telephonie line_3" >'
}else if(div_index == 3) {
    etagere_slides += '<div class="row_div-user-telephonie line_4" >'
}else if(div_index == 4) {
    etagere_slides += '<div class="row_div-user-telephonie line_5" >'
}else {
    etagere_slides += '<div class="row_div-user-telephonie" >'
}

div_row.forEach((slide_el, index) => {

var phone_height = getProductHeight(slide_el);

console.log('Le height phone est bien => ', phone_height)
etagere_slides += generateProdCaseInfoReseau(slide_el, phone_height)

})

etagere_slides += '</div>'

})

if (etagere_ligne_counter < 5) {
    var reste_ligne = 5 - etagere_ligne_counter
    for (let j = 0; j < reste_ligne; j++) {

    var nbre_suivant = etagere_ligne_counter + j;

    if (nbre_suivant == 0) {
        etagere_slides += '<div class="row_div-user-telephonie line_1"></div>'
    }else if(nbre_suivant == 1) {
        etagere_slides += '<div class="row_div-user-telephonie line_2"></div>'
    }else if(nbre_suivant == 2) {
        etagere_slides += '<div class="row_div-user-telephonie line_3"></div>'
    }else if(nbre_suivant == 3) {
        etagere_slides += '<div class="row_div-user-telephonie line_4"></div>'
    }else if(nbre_suivant == 4) {
        etagere_slides += '<div class="row_div-user-telephonie line_5"></div>'
    }else {
        etagere_slides += '<div class="row_div-user-telephonie"></div>'
    }

    }
}

etagere_slides += '<div class="line_6"></div>'

etagere_slides += '</div>'

console.log('Here is shared data => ', etagere_slides)

$('.slider-content-wrapper-user').append(etagere_slides)

}else if (partager_seached_rayon_val == 8) { // ------------- Papetérie

var line_slide = chunk(data_product, colomn_number)

var etagere_slides = [];


etagere_slides += '<div class="custom-carousel-page-user prod_container_bis" style="position: relative; " >'
etagere_slides += '<div class="line_0"></div>'
line_slide.forEach((div_row, div_index) => {

console.log('Les data sont => ', div_row)
etagere_ligne_counter ++;

if (div_index == 0) {
    etagere_slides += '<div class="row_div-user-telephonie line_1" >'
}else if(div_index == 1) {
    etagere_slides += '<div class="row_div-user-telephonie line_2" >'
}else if (div_index == 2) {
    etagere_slides += '<div class="row_div-user-telephonie line_3" >'
}else if(div_index == 3) {
    etagere_slides += '<div class="row_div-user-telephonie line_4" >'
}else if(div_index == 4) {
    etagere_slides += '<div class="row_div-user-telephonie line_5" >'
}else {
    etagere_slides += '<div class="row_div-user-telephonie" >'
}

div_row.forEach((slide_el, index) => {

var phone_height = getProductHeight(slide_el);

console.log('Le height phone est bien => ', phone_height)
etagere_slides += generateProdCase(slide_el, phone_height)

})

etagere_slides += '</div>'

})

if (etagere_ligne_counter < 5) {
    var reste_ligne = 5 - etagere_ligne_counter
    for (let j = 0; j < reste_ligne; j++) {

    var nbre_suivant = etagere_ligne_counter + j;

    if (nbre_suivant == 0) {
        etagere_slides += '<div class="row_div-user-telephonie line_1"></div>'
    }else if(nbre_suivant == 1) {
        etagere_slides += '<div class="row_div-user-telephonie line_2"></div>'
    }else if(nbre_suivant == 2) {
        etagere_slides += '<div class="row_div-user-telephonie line_3"></div>'
    }else if(nbre_suivant == 3) {
        etagere_slides += '<div class="row_div-user-telephonie line_4"></div>'
    }else if(nbre_suivant == 4) {
        etagere_slides += '<div class="row_div-user-telephonie line_5"></div>'
    }else {
        etagere_slides += '<div class="row_div-user-telephonie"></div>'
    }

    }
}

etagere_slides += '<div class="line_6"></div>'

etagere_slides += '</div>'

console.log('Here is shared data => ', etagere_slides)

$('.slider-content-wrapper-user').append(etagere_slides)

}else if(partager_seached_rayon_val == 28) {

var etagere_slides = [];

etagere_slides += '<div class="custom-carousel-page-user prod_container_bis_tv">'

var line_slide = chunk(data_product, colomn_number)

line_slide.forEach((div_row, div_index) => {

etagere_ligne_counter ++;
if (div_index == 0) {
    etagere_slides += '<div class="row_div-user line_1_tv" >'
}else if(div_index == 1) {
    etagere_slides += '<div class="row_div-user line_2_tv" >'
}else if (div_index == 2) {
    etagere_slides += '<div class="row_div-user line_3_tv" >'
}else {
    etagere_slides += '<div class="row_div-user" >'
}
// etagere_slides += '<div class="row_div-user" >'
div_row.forEach((slide_el, index) => {

etagere_slides += '<div id="addSlide-user'+slide_el.id+'" onclick="showClickEffect('+slide_el.id+')" class="slide case-produit-btnd" onmouseover="showEffect('+slide_el.id+')" style="height: 155px !important;" onmouseleave="showEffectRemove('+slide_el.id+')">'
etagere_slides += '<img id="image-prod-id'+slide_el.id+'" onclick="showRecapProduitMarchandTV('+slide_el.id+')" class="image-prod" src= "/'+slide_el.image+'" width="'+slide_el.taille_sur_etagere+'px">'
etagere_slides += '<span id="effect-layer'+slide_el.id+'" class="product-effect-layer effect-none" style="font-size: 12px; position: absolute; width: '+slide_el.taille_sur_etagere+'px; "><span class="cap-cover"></span>'

    etagere_slides += '</span>'
    etagere_slides += '</div>'

})
    etagere_slides += '</div>'
})

if (etagere_ligne_counter < 3) {

    var reste_ligne = 3 - etagere_ligne_counter

    for (let j = 0; j < reste_ligne; j++) {
    var line_tv_suivant = etagere_ligne_counter + j;

    if (line_tv_suivant == 0) {
        etagere_slides += '<div class="row_div-user line_1_tv" ></div>'
    }else if(line_tv_suivant == 1) {
        etagere_slides += '<div class="row_div-user line_2_tv" ></div>'
    }else if (line_tv_suivant == 2) {
        etagere_slides += '<div class="row_div-user line_3_tv" ></div>'
    }else {
        etagere_slides += '<div class="row_div-user" ></div>'
    }
    }

}

etagere_slides += '<div class="line_4_tv"></div>'

etagere_slides += '</div>'

$('.slider-content-wrapper-user').append(etagere_slides)

}else if(partager_seached_rayon_val == 26) {

var line_slide = chunk(data_product, colomn_number)
var etagere_slides = [];

etagere_slides += '<div class="custom-carousel-page-user prod_container_bis" style="position: relative; " >'
etagere_slides += '<div class="line_0"></div>'
line_slide.forEach((div_row, div_index) => {

etagere_ligne_counter ++;

if (div_index == 0) {
    etagere_slides += '<div class="row_div-user-telephonie line_1" >'
}else if(div_index == 1) {
    etagere_slides += '<div class="row_div-user-telephonie line_2" >'
}else if (div_index == 2) {
    etagere_slides += '<div class="row_div-user-telephonie line_3" >'
}else if(div_index == 3) {
    etagere_slides += '<div class="row_div-user-telephonie line_4" >'
}else if(div_index == 4) {
    etagere_slides += '<div class="row_div-user-telephonie line_5" >'
}else {
    etagere_slides += '<div class="row_div-user-telephonie" >'
}

div_row.forEach((slide_el, index) => {
    var phone_height = getInformatiqueReseauxHeight(slide_el);
    etagere_slides += generateProdCaseInfoReseau(slide_el, phone_height)
})

etagere_slides += '</div>'

})

if (etagere_ligne_counter < 5) {
var reste_ligne = 5 - etagere_ligne_counter
for (let j = 0; j < reste_ligne; j++) {
    var nbre_suivant = etagere_ligne_counter + j;

    if (nbre_suivant == 0) {
        etagere_slides += '<div class="row_div-user-telephonie line_1"></div>'
    }else if(nbre_suivant == 1) {
        etagere_slides += '<div class="row_div-user-telephonie line_2"></div>'
    }else if(nbre_suivant == 2) {
        etagere_slides += '<div class="row_div-user-telephonie line_3"></div>'
    }else if(nbre_suivant == 3) {
        etagere_slides += '<div class="row_div-user-telephonie line_4"></div>'
    }else if(nbre_suivant == 4) {
        etagere_slides += '<div class="row_div-user-telephonie line_5"></div>'
    }else {
        etagere_slides += '<div class="row_div-user-telephonie"></div>'
    }
}
}

etagere_slides += '<div class="line_6"></div>'

etagere_slides += '</div>'

$('.slider-content-wrapper-user').append(etagere_slides)

}else if (partager_seached_rayon_val == 10) { // ------------- appareillage-outils

    var line_slide = chunk(data_product, colomn_number)
    var etagere_slides = [];


    etagere_slides += '<div class="custom-carousel-page-user prod_container_bis" style="position: relative; " >'
    etagere_slides += '<div class="line_0"></div>'
    line_slide.forEach((div_row, div_index) => {
    etagere_ligne_counter ++;

    if (div_index == 0) {
        etagere_slides += '<div class="row_div-user-telephonie line_1" >'
    }else if(div_index == 1) {
        etagere_slides += '<div class="row_div-user-telephonie line_2" >'
    }else if (div_index == 2) {
        etagere_slides += '<div class="row_div-user-telephonie line_3" >'
    }else if(div_index == 3) {
        etagere_slides += '<div class="row_div-user-telephonie line_4" >'
    }else if(div_index == 4) {
        etagere_slides += '<div class="row_div-user-telephonie line_5" >'
    }else {
        etagere_slides += '<div class="row_div-user-telephonie" >'
    }

    div_row.forEach((slide_el, index) => {

    var phone_height = getProductHeight(slide_el);
    etagere_slides += generateProdCaseInfoReseau(slide_el, phone_height)
    })

    etagere_slides += '</div>'

    })

    if (etagere_ligne_counter < 5) {
        var reste_ligne = 5 - etagere_ligne_counter
        for (let j = 0; j < reste_ligne; j++) {

        var nbre_suivant = etagere_ligne_counter + j;

        if (nbre_suivant == 0) {
            etagere_slides += '<div class="row_div-user-telephonie line_1"></div>'
        }else if(nbre_suivant == 1) {
            etagere_slides += '<div class="row_div-user-telephonie line_2"></div>'
        }else if(nbre_suivant == 2) {
            etagere_slides += '<div class="row_div-user-telephonie line_3"></div>'
        }else if(nbre_suivant == 3) {
            etagere_slides += '<div class="row_div-user-telephonie line_4"></div>'
        }else if(nbre_suivant == 4) {
            etagere_slides += '<div class="row_div-user-telephonie line_5"></div>'
        }else {
            etagere_slides += '<div class="row_div-user-telephonie"></div>'
        }

        }
    }

    etagere_slides += '<div class="line_6"></div>'

    etagere_slides += '</div>'

    $('.slider-content-wrapper-user').append(etagere_slides)

    }
}


function getGetPartagerBoutiqueProduct(id_boutique, partager_seached_rayon_val, counter) {

    rayon_default_categorie = 3
    // init_product_col_number = 5
    counter++;

    var taille_actuel = window.innerWidth;
    var reste_divsion = Math.floor(taille_actuel / min_val_prod_culumn);

    init_product_col_number = reste_divsion;

    $.ajax({
    type: 'GET',
    url: '/get_partager_product_by_screen_size/'+id_boutique+'/'+partager_seached_rayon_val + '/' + rayon_default_categorie + '/'+init_product_col_number + '/?page=' + counter,
    data: {},
    success: function(retour) {

    $('.slider-content-wrapper-user').empty()
    var produits = retour.boutique_data.data
    showProductByScreenSite_bis(partager_seached_rayon_val, produits, init_product_col_number)

    }

    })

}

function show_all_partage_boutique_rayon(boutique_id, rayon_active) {
    $.ajax({
    method: 'GET',
    url: '/all_boutique_rayon_partager/'+boutique_id,
    data: {rayon_active: rayon_active},
    headers: {},
    success: function(response) {

    const chunk = (arr, size) =>

    Array.from({ length: Math.ceil(arr.length / size) }, (v, i) =>
        arr.slice(i * size, i * size + size)
    );

    let tableau_rayon = chunk(response['rayon'], 6)
    let id_boutique = response['boutique']

    for (let r = 0; r < tableau_rayon.length; r++) {
    var swiper = [];

    swiper = '<div class= "main-rayon-items swiper-slide">'

    for(let y = 0; y < tableau_rayon[r].length; y++) {

        if (tableau_rayon[r][y].id == rayon_active) {
            let id = tableau_rayon[r][y]['id']
            swiper += '<div id="bouton-rayon'+tableau_rayon[r][y].id+'" data-etagere = "'+tableau_rayon[r][y].grande_etagere+'" style="white-space: nowrap;overflow: hidden;" class="mesb rayon-marchand-dynamique rayon-hover" onclick="changeBackImageClient('+tableau_rayon[r][y].id+', '+id_boutique+')"><a style="font-weight: 500;text-decoration:none; color: #fff" class="rayon-link-item" id="link'+tableau_rayon[r][y].id+'" href="#">'+tableau_rayon[r][y]["libelle"]+'</a></div>'
        }else {
            let id = tableau_rayon[r][y]['id']
            swiper += '<div id="bouton-rayon'+tableau_rayon[r][y].id+'" data-etagere = "'+tableau_rayon[r][y].grande_etagere+'" style="white-space: nowrap;overflow: hidden;" class="mesb rayon-marchand-dynamique" onclick="changeBackImageClient('+tableau_rayon[r][y].id+', '+id_boutique+')"><a style="font-weight: 500;text-decoration:none;" class="rayon-link-item" id="link'+tableau_rayon[r][y].id+'" href="#">'+tableau_rayon[r][y]["libelle"]+'</a></div>'
        }

    }

        swiper += '</div>'

        $('.swiper-wrapper').append(swiper);

    }

    }
    })
}



    window.onload = function() {
    // fonction qui affiche les rayons d'un marchand
    var boutique_id = "<?php echo $boutique; ?>"
    var rayon_active = "<?php echo $rayon; ?>"

    getGetPartagerBoutiqueProduct(boutique_id, partager_seached_rayon_val, partager_boutique_page_counter);
    show_all_partage_boutique_rayon(boutique_id, rayon_active)

    }

    function getYoutubeVideoTumbnail(videoId, apiKey) {

    fetch(`https://www.googleapis.com/youtube/v3/videos?id=${videoId}&key=${apiKey}&part=snippet`)
    .then(response => response.json())
    .then(data => {

    const thumbnailUrl = data.items[0].snippet.thumbnails.default.url;

    $('.tm_vid_icon').css({
        'background-image': 'url("'+thumbnailUrl+'")',
        'background-size': '100% contain',
        'background-position': 'center'
    })

    $('#mobile-autre-image_video4').css({
        'background-image': 'url("'+thumbnailUrl+'")',
        'background-size': '100% contain',
        'background-position': 'center'
    })

    $('#product_video_preview_for_share').val(thumbnailUrl)

    })
    .catch(error => {
        console.error('Error:', error);
    });
} //--- Fin getYoutubeVideoTumbnail()

    function showClickEffectBis(id) {

    }

function showEffect(id) {
    var img_size = document.getElementById('addSlide-user'+id).offsetWidth
    var img_size_height = document.getElementById('addSlide-user'+id).offsetHeight / 1.3
    $('#effect-layer'+id).css('width', img_size+'px')
    $('#effect-layer'+id).css('height', img_size_height+'px')
    $('#effect-layer'+id).removeClass('effect-none')
    $('#image-prod-id'+id).addClass('produit-show-effect')
}

function showEffectRemove(id) {
    $('#effect-layer'+id).addClass('effect-none')
    $('#image-prod-id'+id).removeClass('produit-show-effect')
}

function productVideoPreviewClient(video, index_div) {
    $('#tm_active_image_to_share').val("") // vider l'image active
    var video_no_suggestion = video+'?rel=0'
    $('.gros-cadre').css({"padding-left": '0px', 'padding-right': '0px'})
    $('#image_principal').addClass('s-none-client')
    $('#marchand_video_preview_big_client').removeClass('img-card-long')
    $('#image_principal').removeClass('img-card-long')
    $('.tm_show_p_product-client').removeClass('s-none-client')

    $('#marchand_video_preview_big_client').attr('src', video_no_suggestion)
    $('#marchand_video_preview_big_client').css({
        'height':'397px',
        'position': 'relative',
        'top': '4px'
    });

    let zone_petite_image = $('.tm_produit_petit_img_user')
    for (let h = 0; h < zone_petite_image.length; h++) {
    $(zone_petite_image[h]).removeClass('tm_active_img_product')
    }

    $(zone_petite_image[index_div]).addClass('tm_active_img_product')

} // --- Fin productVideoPreviewClient()
 
// preview image for client
function showImagePrevievClient(image, index_div) {

$('#tm_active_image_to_share').val(image) // image active
let img_p = new Image();

img_p.onload = function() {
if (img_p.height > img_p.width) {
    $('.gros-cadre-user').addClass('gros-cadre-user-long')
    $('.img-card').addClass('img-card-long')
}else {
    $('.img-card').removeClass('img-card-long')
    $('.gros-cadre-user').removeClass('gros-cadre-user-long')
}
};

img_p.src = '/'+image;

let zone_petite_image = $('.tm_produit_petit_img_user')
if ($('#image_principal').hasClass('s-none-client')) {
    $('#image_principal').removeClass('s-none-client')
}

$('#image_principal').attr('src', '/'+image)

if (!$('.tm_show_p_product-client').hasClass('s-none-client')) {
    $('.tm_show_p_product-client').addClass('s-none-client')
    $('.gros-cadre').css({"padding-left": '5px', 'padding-right': '5px'})
}

for (let h = 0; h < zone_petite_image.length; h++) {
    $(zone_petite_image[h]).removeClass('tm_active_img_product')
}

$(zone_petite_image[index_div]).addClass('tm_active_img_product')

} // Fin showImagePrevievClient()

function showRecapProduitMarchandTV(id) {

closeMessagerieBox2()
closeMessagerieBox()

$('#id_produit').val(id)

$('#modification').hide()
$('#Ajouter_new').show()

$('.tm_vid_icon').css({
    'background-image': '',
    'background-size': '',
    'background-position': ''
});

let zone_petite_image = $('.tm_produit_petit_img_user') // Recuperation des autres images
$(zone_petite_image[0]).addClass('tm_active_img_product') // Ajout de la classe active

for (let h = 1; h < zone_petite_image.length; h++) {
    $(zone_petite_image[h]).removeClass('tm_active_img_product')
}

let init_peti_cadre = $('.petit-cadre')
let mobile_init_petit_cadre = $('.mobile_petit-cadre')

for (let g = 1; g < 5; g++) {
    $(init_peti_cadre[g]).removeClass('set-white-bg')
    $(init_peti_cadre[g]).addClass('set-gray-bg')
}

if (!$('.tm_show_p_product-client').hasClass('s-none-client')) {
    $('.tm_show_p_product-client').addClass('s-none-client')
    $('#image_principal').removeClass('s-none-client')
}


let mobile_zone_petite_image = $('.panier-mobile-cadre-div')
$(mobile_zone_petite_image[0]).addClass('tm_active_img_product')
// reset active class from all images
for (let h = 1; h < mobile_zone_petite_image.length; h++) {
    $(mobile_zone_petite_image[h]).removeClass('tm_active_img_product')
}

$.ajax({ // Recuperation detail produit

method: 'GET',
url: '/show_detail_produit/'+id,
data: {},
headers: {},
success: function(response){

var prix_article = response['Detail_Produit'][0][0]['prix'];
var prix_tag = '<sup style="position: relative; left: 5px">Fcfa</sup>'

$('.article-title').text(response['Detail_Produit'][0][0]['libelle'])
$('#reference_produit_client_desktop').text(response['Detail_Produit'][0][0]['ref_produit'])
$('.mobile_article-title').text(response['Detail_Produit'][0][0]['libelle'])

if (prix_article == 0) {
    $('#Ajouter_new').addClass('s-none-client')
    $('#client_sur_meme_produit').addClass('s-none-client')
    $('#in_stock_main_element').removeClass('s-none-client')

    $('#prix_total').text('Actuellement indisponible')
    $('#prix_total').css('font-size', '18px')
    $('#prix_total_mobile').text('Actuellement indisponible')
    // $('#prix_total_mobile').append(prix_tag)
    // $('#prix_total').append(prix_tag)

}else{

    $('#prix_total').text(prix_article.toLocaleString())
    $('#prix_total').append(prix_tag)
    $('#current_price').val(response['Detail_Produit'][0][0]['prix'])
    $('.mobile-prod-price').text(prix_article.toLocaleString())
    $('.mobile-prod-price').append(prix_tag)

    $('#prix_total').css('font-size', '24px')

    $('#Ajouter_new').removeClass('s-none-client')
    $('#client_sur_meme_produit').removeClass('s-none-client')
    $('#in_stock_main_element').addClass('s-none-client')

}


$('#description_marchand_zone1').text(response['Detail_Produit'][0][0]['description'])

$('#mobile-caracteristique-data').text(response['Detail_Produit'][0][0]['description'])

$('#image_principal').attr('src', '/'+response['Detail_Produit'][0][0]['image'])
$('#image_principal1').attr('src', '/'+response['Detail_Produit'][0][0]['image'])

$('#mobile_image_principal').attr('src', '/'+response['Detail_Produit'][0][0]['image'])
$('#mobile_image_autre0').attr('src', '/'+response['Detail_Produit'][0][0]['image']) // Mobile


$("#quantite").val(1)

// click de l'image principal
$('#image_principal1').bind('click', function(v) {
    showImagePrevievClient(response['Detail_Produit'][0][0]['image'], 0)
})

$('#mobile_image_autre0').bind('click', function(v) {
    showImageMobilePreview(response['Detail_Produit'][0][0]['image'], 0)
})

// calucl de la taille et affectation des nouvelle propriétés
let img_p = new Image();

img_p.onload = function() {
if (img_p.height > img_p.width) {
    $('.img-card').addClass('img-card-long')
    $('.img-card-petit').addClass('img-card-petit-long')
    $('.gros-cadre-user').addClass('gros-cadre-user-long')
}else {
    $('.img-card').removeClass('img-card-long')
    $('.img-card-petit').removeClass('img-card-petit-long')
    $('.gros-cadre-user').removeClass('gros-cadre-user-long')
}
};

img_p.src = '/'+response['Detail_Produit'][0][0]["image"];
// chargement de l'instance produit
product_instance = response;

$('.gros-cadre-user').addClass('set-white-color');
$('#mobile_image_autre1').addClass('set-white-color');
// $('#quantite_marchand').val(response['Detail_Produit'][0][0]['quantite'])
$('#reference_produit_client').text(response['Detail_Produit'][0][0]['ref_produit'])
$('#panier-mobile-ref_prod').text(response['Detail_Produit'][0][0]['ref_produit'])

if (response['Detail_Produit'][0][0]['video_preview'] != null) {

var url_video = response['Detail_Produit'][0][0]['video_preview'] // url de la video
var regex = /https:\/\/youtube\.com\/embed\/|(\?t=\d+)/gi;
var videoId = url_video.replace(regex, "");

const apiKey = 'AIzaSyDdX29Tk27nv5nd9sHWgu-eRKNVr_n38Rk'; // Replace with your YouTube Data API key

$('.tm_vid_icon').empty();
$('#mobile-autre-image_video4').empty()

const img_icon = '<img class="img-card-petit-p" style="height: 45%; width: 45%; background-color: #fff; border-radius: 6px" src="/assets/images/tm_yt_icon1.svg" alt="" id="image_autreMarchand4d" >'
$('.tm_vid_icon').append(img_icon)
$('#mobile-autre-image_video4').append(img_icon)

getYoutubeVideoTumbnail(videoId, apiKey)

$('.tm_vid_icon').bind('click', function(){
    productVideoPreviewClient(response['Detail_Produit'][0][0]['video_preview'], 5)
})

$('.mobile-tm_vid_icon').bind('click', function() {
    mobileVideoPreview(response['Detail_Produit'][0][0]['video_preview'], 4)
})

$('.tm_vid_icon').removeClass('set-gray-bg')
$('.tm_vid_icon').addClass('set-white-bg')

}else{

$image = $('#image_autreMarchand4d')
$('.tm_vid_icon').empty();
$('.tm_vid_icon').removeClass('set-white-bg')
$('.tm_vid_icon').addClass('set-gray-bg')

} // --- Fin If Video

if (response['Detail_Produit'][1].length > 0) {
    $('#produit-univer-user').text(response['Detail_Produit'][1][0]['libelle'])
}

let a_index = 0;
for (let caracteristique_item in response['Detail_Produit'][14] ) {
    $('#carac_produit'+a_index).empty()
    $('#carac_produit'+a_index).append('<option>'+response['Detail_Produit'][14][caracteristique_item]+'</option>')
    $('#carac_produit-Label'+a_index).text(caracteristique_item)

    $('#mobile-carac_produit'+a_index).empty()
    $('#mobile-carac_produit'+a_index).append('<option>'+response['Detail_Produit'][14][caracteristique_item]+'</option>')
    $('#mobile-carac_produit-Label'+a_index).text(caracteristique_item)

    a_index++
}

if (response['Detail_Produit'][13].length > 0) {

$('#produit-rayon-user').text(response['Detail_Produit'][13][0]['libelle'])
$.ajax({ // Recuperation des articles associé

method: 'GET',
url: '/rayon_articles_associer/'+response['Detail_Produit'][13][0]['id'],
success: function(response) {
if (response.length > 0) {

    $('.produit-associer-section').empty();

    if (response.length > 0) {
    $('.produit-associer-section-marchand').empty();
    for (let j = 0; j < response.length; j++) {
        let rayon_produit_associer = '<a title="'+response[j]['libelle']+'"><img src="/storage/images/rayons/'+response[j]['logo']+'" alt="B"></a>'
        $('.produit-associer-section-marchand').append(rayon_produit_associer)
    }
    }
}

}
}) // Fin Recuperation des articles associé
}

for (i = 1; i < 6; ++i) { // Initialiser les cases images
    $('#image_autre'+i).hide()
}

for (i = 0; i < response['Detail_Produit'][5].length; ++i) {

let incr_index = i + 1;
var image_for_size_calculation = response['Detail_Produit'][5][i]["image"]

let img = new Image();
img.onload = function() {

if (img.height > img.width) {
    $('#image_autre'+incr_index).closest('petit-cadre').addClass('img-card-long')
    $('#image_autre'+incr_index).addClass('img-card-petit-long')

    $('#mobile_image_autre'+incr_index).closest('mobile_petit-cadre').addClass('img-card-long')
    $('#mobile_image_autre'+incr_index).addClass('img-card-petit-long')

}else {
    $('#image_autre'+incr_index).closest('petit-cadre').removeClass('img-card-long')
    $('#image_autre'+incr_index).removeClass('img-card-petit-long')

    $('#mobile_image_autre'+incr_index).closest('mobile_petit-cadre').removeClass('img-card-long')
    $('#mobile_image_autre'+incr_index).removeClass('img-card-petit-long')
}
};

img.src = '/'+response['Detail_Produit'][5][i]["image"];

$('#image_autre'+incr_index).attr('src', '/'+response['Detail_Produit'][5][i]["image"]) // Chargement des images
$('#mobile_image_autre'+incr_index).attr('src', '/'+response['Detail_Produit'][5][i]["image"]) //Chargement des image for mobile

let img_element = response['Detail_Produit'][5][i]["image"]

$('#image_autre'+incr_index).bind('click', function(v) {
    showImagePrevievClient(img_element, incr_index)
})

$('#mobile_image_autre'+incr_index).bind('click', function() {
    showImageMobilePreview(img_element, incr_index)
})

let index_increment = i + 1;

$(init_peti_cadre[index_increment]).removeClass('set-gray-bg') // Enleve le bg gray
$(init_peti_cadre[index_increment]).addClass('set-white-bg') // ajout du bg white

$(mobile_init_petit_cadre[index_increment]).removeClass('set-gray-bg')
$(mobile_init_petit_cadre[index_increment]).addClass('set-white-bg')

$('#image_autre'+incr_index).show()
$('#mobile_image_autre'+incr_index).show()

}

$('#produit_partenaire_counter').text(response['Detail_Produit'][15].length)

for (let caracteristique_item in response['Detail_Produit'][14] ) {
    let caracteristique_row = "<tr><td>"+caracteristique_item+"</td><td>"+product_instance['Detail_Produit'][14][caracteristique_item]+"</td></tr>"
    $('#TableContainerMobile').append(caracteristique_row)
}

}

})

showClickEffectBis(id)

setTimeout(function() {
    $('#recap-produit-main-modal').removeClass('main-prod-detail-modal')
    // $('#myModal').modal('show')
}, 10)

}

function showClickEffect(id) {

    var img_size_height = document.getElementById('addSlide-user'+id).offsetHeight
    var img_p = $('#addSlide-user'+id).find('img')[0].offsetHeight
    console.log('Here is your image', img_p)
    $('#effect-layer'+id).css('height', img_p+'px')
    $('#effect-layer'+id).addClass('product-filled-effect')

    setTimeout(function(){
        showRecapProduitMarchandTV(id)
    },  10)

}

let slideIndex = 0;
showSlides();

function showSlides() {
let i;
let slides = document.getElementsByClassName("libelle-option-p");
for (i = 0; i < slides.length; i++) {
    slides[i].style.display = "none";
}
slideIndex++;
if (slideIndex > slides.length) {slideIndex = 1}
slides[slideIndex-1].style.display = "block";
setTimeout(showSlides, 2000); // Change image every 2 seconds
}

let slideIndex1 = 0;
showSlides1();

function showSlides1() {
    let i;
    let slides = document.getElementsByClassName("slide-option-text");
    for (i = 0; i < slides.length; i++) {
        slides[i].style.display = "none";
    }
    slideIndex1++;
    if (slideIndex1 > slides.length) {slideIndex1 = 1}
    slides[slideIndex1-1].style.display = "block";
    setTimeout(showSlides1, 2000); // Change image every 2 seconds
}

var maxSwiperSlide = 0;
var curSlideSwiper = 0;
function swipper_next() {
    // main-rayon-items
    const slides = document.querySelectorAll(".main-rayon-items");
    maxSwiperSlide = slides.length - 1;

    if (curSlideSwiper === maxSwiperSlide) {
        // curSlide = 0;
    } else {
        curSlideSwiper++;
    }

    slides.forEach((slide, indx) => {
        let offsete = - curSlideSwiper;
        slide.style.transform = `translateX(${100 * offsete}%)`;
    });

}

function swipper_prev() {
    // main-rayon-items
    const slides = document.querySelectorAll(".main-rayon-items");

    curSlideSwiper--;

    if (curSlideSwiper < 0) {
        curSlideSwiper = 0
    }

    slides.forEach((slide, indx) => {
        let offsete = -curSlide;
        slide.style.transform = `translateX(${100 * offsete}%)`;
    });

}

$(document).ready(function() {
     // Fermeture du popop produit
     $('#modalProduitClosedBIS').on('click', function() {
        $('#marchand_video_preview_big_client').attr('src', " ")
        $('#recap-produit-main-modal').addClass('main-prod-detail-modal')
    })

    $('#descProd').on('click', function() {
        console.log('Description modal opened')
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

})

function boutiquePartageresizeProduct() {
    
    var tablet_media_query = window.matchMedia("(min-width: 481px) and (max-width: 767px) and (orientation: landscape)");

    if (!tablet_media_query.matches) { // Au cas ou il ne s'agit
    
    var num_reste_division = Math.floor(this.window.innerWidth / min_val_prod_culumn)

    console.log('List rayon => ', partager_seached_rayon_val)
    // grande_etagereOK
    var product_container_zone = document.getElementById('main-rayon-container-'+partager_seached_rayon_val).offsetHeight

    var window_width_media_query = $(window).width()
    if (num_reste_division != init_product_col_number) {
    // page++;
    page = 1;
    curSlide1 = 0;
    // var id_boutique = 20
    init_product_col_number = num_reste_division
    $.ajax({
    type: 'GET',
    url: '/get_partager_product_by_screen_size/'+boutique_partager_id+'/'+partager_seached_rayon_val + '/' + rayon_default_categorie + '/'+init_product_col_number + '/?page=' + page,
    data: {},
    success: function(product_callback) {

    console.log('Here is resized data => ', product_callback)

    $('.slider-content-wrapper-user').empty()

    var produits = product_callback.boutique_data.data
    showProductByScreenSite_bis(partager_seached_rayon_val, produits, init_product_col_number)
    // showProductByScreenSite_bis(partager_seached_rayon_val, product_callback.data, init_product_col_number)

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
    
    showProductForTablette(id_responsive_rayon, product_callback.data, init_prod_col)

    if (id_responsive_rayon == 27) { // cas du rayon téléphone
        const main_element_phonie = document.getElementById('main-rayon-container-'+id_responsive_rayon).getElementsByClassName('row_div-user-telephonie')
        telephonie_onload_taille(window_width_media_query, product_container_zone, main_element_phonie)

    }
    // console.log('Here data back from tablette => ', product_callback)
    }

    })
        // console.log('Mobile tablet section')
    }

  }

window.addEventListener('resize', function() {
    boutiquePartageresizeProduct()
});

    </script>

@endsection
