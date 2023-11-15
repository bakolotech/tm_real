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
    }
    else{
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
// print_r($rayon->id);

// print_r($produits);

$produit_rayons = DB::table('produits')
->join('images_etageres', 'produits.image_etagere', '=', 'images_etageres.id')
->join('familles', 'familles.id', '=', 'produits.id_famille')
->where('familles.id', $default_categorie)
->where('id_rayon', $rayon->id)
->where('produits.deleted', 0)
->select('produits.*', 'images_etageres.path')
->get();

// print_r($produit_rayons);

$tab_p = [];
$tab_taille = [];
$positions_etageres = [];
$array_bis = [];
$arry = [];
foreach ($produit_rayons as $produit) {
    // ----------------------- caracteristique du produit ----------------------------
    // recuperation des attributs
    $caracteristiques = DB::table('rayon_caracteristique_valeurs')
    ->join('produit_caracteristique_valeurs', 'produit_caracteristique_valeurs.id_caracteristique_valeur', '=', 'rayon_caracteristique_valeurs.valeur_id')
    ->join('produits', 'produits.id', '=', 'produit_caracteristique_valeurs.id_produit')
    ->join('rayons', 'rayons.id', '=', 'produits.id_rayon')
    ->join('caracteristiques', 'caracteristiques.id', '=', 'rayon_caracteristique_valeurs.caracteristique_id')
    ->join('valeur_caracteristiques', 'valeur_caracteristiques.id', '=', 'produit_caracteristique_valeurs.id_caracteristique_valeur')
    ->where('produit_caracteristique_valeurs.id_produit', $produit->id)
    ->where('rayon_caracteristique_valeurs.rayon_id', $produit->id_rayon)
    ->select('caracteristiques.libelle as lib_caract', 'valeur_caracteristiques.libelle as lib_valeur')
    ->get();
    // ------------------- caracteristiques supplementaire -------------------------
    $caracteristique_supp = DB::table('produit_caracteristiques')
    ->join('produits', 'produits.id', '=', 'produit_caracteristiques.produit_id')
    ->join('boutique_produit_car_valeurs', 'boutique_produit_car_valeurs.id', '=', 'produit_caracteristiques.valeur')
    ->join('boutique_produit_caracteristiques', 'boutique_produit_caracteristiques.id', '=', 'boutique_produit_car_valeurs.idBoutiqueCarValeur')
    ->where('produit_caracteristiques.produit_id', $produit->id)
    ->where('boutique_produit_caracteristiques.libelle', 'Taille')
    ->select('boutique_produit_car_valeurs.valeur')
    ->get();

    if (count($caracteristique_supp) > 0) {
        $produit->taille_ecran = $caracteristique_supp[0]->valeur;
    }else {
        $produit->taille_ecran = 'pas de taille';
    }

    $produit->caracteristique = $caracteristiques;
    // ----------------- remplissage des donneés dans les tablaux idéals à faire un tableau unique
    $tab_p[] = $produit;
    $tab_taille[] = $produit->taille_ecran;
    $positions_etageres[] = $produit->position_sur_etagere;
    // $produit->caracteristique_supp = $caracteristique_supp;
}

function array_flatten($array) {
    $return = array();
    foreach ($array as $key => $value) {
        if (is_array($value)){
            $return = array_merge($return, array_flatten($value));
        } else {
            $return[$key] = $value;
        }
    }

    return $return;
}

// $product_decoded = json_decode($produits);
$tabpp = [];

foreach ($produits as $pp) {
    $array_to_flat = array_flatten($pp);

    foreach ($array_to_flat as $pf) {
        $tabpp[] = $pf;
    }

}
$array_to_flat = array_flatten($tabpp);
// print_r($array_to_flat);
// print_r($produits[2]->toArray());
foreach ($tabpp as $p) {
    // echo $p->taille_sur_etagere.'<br>';
}
// $pduits = [];
// foreach ($produits as $p) {
//     $pduits[] = $p->position_sur_etagere;
// }

// print_r($pduits);

if ($rayon->id == 25) {
    $arry = array_chunk( $tabpp, 12); // images produit coupé en 15
}else if ($rayon->id == 27) {
    $arry = array_chunk( $tabpp, 40); // images produit coupé en 40
}else if ($rayon->id == 26) {
    $arry = array_chunk( $tabpp, 40); // images produit coupé en 40
}

// echo count($arry);

for ($i=0; $i < count($arry); $i++) {
    $array_bis[] = array_chunk($arry[$i], 4);
}


$arry_taille = array_chunk($tab_taille, 12); // taille pour les écrans
$position_etagere = array_chunk($positions_etageres, 12);

// -------------------------------get rayons sliders----------------------------
$slides_data = [];
$rayons_slides =
    DB::table('produits')
    ->where('numero_slide', '!=', NULL)
    ->where('id_rayon', 25)
    ->groupBy('numero_slide')->get();

foreach ($rayons_slides as $slide) {
    $num_slide = $slide->numero_slide;
    $slide_lignes =
    DB::table('produits')
    ->where('numero_slide', $slide->numero_slide)
    ->select('numero_ligne_slide')
    ->groupBy('numero_ligne_slide')
    ->orderBy('numero_ligne_slide', 'asc')->get();

$tab_produit = [];
    foreach ($slide_lignes as $ligne) {
        $ligne_produit = DB::table('produits')
        ->where('numero_ligne_slide', $ligne->numero_ligne_slide)
        ->where('numero_slide', $num_slide)
        ->where('deleted', 0)
        ->get();
        if (count($ligne_produit) > 0) {
            $tab_produit[$ligne->numero_ligne_slide][] = $ligne_produit;
        }
    }
    // print_r($tab_produit);
    $slides_data[$slide->numero_slide][] = $tab_produit;
}

// print_r($slides_data);
foreach ($slides_data as $key => $slides) {
    foreach ($slides as $key1 => $rows) {
        $tab_slide_row = [];
        foreach ($rows as $key2 => $row) {

        $tab_slide_row[] = $key2;
        $tab_slide_image_position = []; // tableau indexé avec les positions
        foreach ($row as $key3 => $p) {
            foreach ($p as $key4 => $p1) {
                $tab_slide_image_position[$key2][] = $p1->position_sur_etagere;
            }
        }

        }
    }
}

?>
@extends('front.layout.main-layout')

@section('css-debut')
    <link rel="stylesheet" href="{{asset('css/home.css')}}">
    <link rel="stylesheet" href="{{asset('css/demo.css')}}">
    <link rel="stylesheet" href="{{ asset('css/rayon.css') }}">
    <link rel="stylesheet" href="{{ asset('css/etagere.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/slick/slick.css') }}">
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

    .case-el1{
        position: relative;
        margin-bottom: 5px;
        top: -30px;
    }

    .case-el2{
        position: relative;
        margin-bottom: 29px;
        top: 2px;
    }

    .case-el3{
        position: relative;
        margin-bottom: 35px;
        /* top: -12px; */
    }

    .case-el4{
        /* background-color: green !important; */
    }

    .case-el5{
        /* background-color: yellow !important; */
    }

    .owl-item {
        padding: 0px !important;
        margin: 0px !important;
    }

</style>

<style>

    .main-carousel-section-changed-user {
        background-color: transparent;
        width: 81% !important;
        width: auto;
        height: 500px;
        position: relative;
        margin-left: auto;
        margin-right: auto;
        margin-top: 0px;
        overflow: hidden;
        left: -15px;
    }

    .slide {
        font-size: 50px;
        text-align: center;
        margin-bottom: 15px;
    }

    .custom-carousel-page-user {
        width: 1125px !important;
        transition: transform 0.5s ease-in-out;

        flex-basis: 1125px !important;
        flex-grow: 0 !important;
        flex-shrink: 0 !important;
        position: relative;
        top: -55px;
    }

    .custom-carousel-page-user:not(:first-child) {

    }

    .custom-carousel-page-user:first-child {
        left: -20px;
    }

    .not-active-product-btn {
        visibility:hidden
    }

    .not-active-product-btn-hover {
        visibility:hidden
    }

    .active-product-btn-hover {
        visibility: visible
    }

    .class-default-added-btn {
        height: 155px;
        width: 170px;
        background-image: linear-gradient(to right, #333 10%, rgba(255, 255, 255, 0) 0%);
        background-position: top;
        background-size: 10px 1px;
        background-repeat: repeat-x;
        display: flex;
        border: 0.5px #333 dotted;
        border-radius: 4px;
        justify-content: center;
        align-items: center;
    }

    .class-default-added-btn:hover{
        cursor: pointer;
    }

.init-added-button {
    height: 155px;
    width: 170px;
    background-image: linear-gradient(to right, #333 10%, rgba(255, 255, 255, 0) 0%);
    background-position: top;
    background-size: 10px 1px;
    background-repeat: repeat-x;
    display: flex;
    border: 0.5px #333 dotted;
    border-radius: 4px;
    justify-content: center;
    align-items: center
}

.p-box {
    width: 264px;
    height: 164px;
    border-radius: 6px;
}

.product-img-for-option:hover span{
    display: flex !important;
}

.image-prod-option:hover {
    cursor: pointer;
}

.image-prod {
    max-height: 155px !important;
}

.slider-content-wrapper-user {
    display: flex;
    transition: transform 0.5s ease-in-out;
    transition-delay: 1s;
    position: relative;
    transform-style: preserve-3d;
}

canvas {
    width: 310px ;
    height: 310px ;
}

.btn-add-product-title {
    height: 22px;
    width: 40px;
    color: #4A4A4A;
    font-family: Roboto;
    font-size: 10px;
    font-weight: 500;
    letter-spacing: 0;
    line-height: 11px;
    text-align: center;
}

.owl-stage-outer {
    width: 99.4%;
    position: relative;
    left: 5px;
}

.add-product-icon {
    height: 24px;
    width: 24px;
    font-size: 24px;
    margin-bottom: 5px;
}

.bottom-bar-float {
    height: 61px;
    width: 100%;
    background: rgba(3, 138, 255, 0.5);
    position: absolute;
    float: bottom;
    bottom: 0%;
    display: flex;
    justify-content: center;
    align-items: center;
}

.zone-user {
    height: 41px;
    width: 114px;
    box-shadow: 0 2px 48px 0 rgba(0,0,0,0.13);
    position: relative;
    display: flex;
    justify-content: flex-start;
    align-items: center;
    border-radius: 6px;
    background-color: #146FDA;
    margin-right: 20px;
}

.navbar-next {
    width: 100%;
    height: 110px;
    background-color: transparent;
    display: flex;
    justify-content: flex-start;
    align-items: center;
}

.user-marchand-profil {
    box-sizing: border-box;
    height: 70px;
    width: 107px;
    border: 1px solid #9B9B9B;
    border-radius: 6px;
    background-color: #fff;
    position: relative;
    left: 13%;
    display: flex;
}

.img-marchand img {
    box-sizing: border-box;
    height: 70px;
    width: 70px;
    border-radius: 6px;
    position: relative;
    top: -1px;
}

.img-marchand:hover {
    cursor: pointer;
}

.marchand-user-profil:hover {
    cursor: pointer;
    transform: scale(1.1);
    background: rgb(89, 171, 227);
    opacity: 0.9;
}

.icons-share-marchand {
    height: 27px;
    width: 27px;
    border-radius: 6px;
    background-color: #1A7EF5;
}

.icons-share-marchand img {
    position: relative;
    height: 21px !important;
    width: 21px !important;
    top: 0px;
}

.element-icons {
    width: calc(107px - 70px);
    height: 70px;
    position: relative;
    top: 5px;
    margin-left: 4px;
}

.next-box-marchand {
    box-sizing: border-box;
    height: 70px;
    width: 123px;
    border: 1px solid #9B9B9B;
    border-radius: 6px;
    background-color: #FFFFFF;
    position: relative;
    display: flex;
    flex-direction: column;
    justify-content: center;
    align-items: center;
    row-gap: 10px;
    left: 13%;
    margin-left: 5px;
}

.img-share-marchand img {
    height: 20px !important;
    width: 20px !important;
    transition: all .2s ease-in-out;
}

.img-share-marchand:hover {
    cursor: pointer;
    transform: scale(1.1);
    background: rgb(89, 171, 227);
    opacity: 0.9;
}

.main-prod-options {
    display: none;
    height: 37px;
    width: 99%;
    border-radius: 6px;
    background: rgba(0, 0, 0, 0.3);
    position: absolute;
    margin-top: -35px;
    column-gap: 7px;
    padding-left: 5%;
    padding-top: 5px
}

.case-produit:hover .main-prod-options{
    display: inline-block
}

@media only screen and (max-width: 1500px) {
.boutique-produit-container {
    display: grid;
    grid-template-columns: repeat(7, 1fr);
    column-gap: 12px;
    row-gap: 3px !important;
    position: relative;
    left: -1px;
    /* top: 80px !important; */
    margin-top:20px !important;
}

.image_principal-produit {
    height: 107px !important;
    width: 163px !important;
    border-radius: 6px;
}

.navbar-next {
    position: relative;
    top: -17px;
}
}

.desable-input {
    pointer-events: none;
    background-color: #ccc !important;
}

.error-produit {
    border: 1px solid #D0021B!important;
}

.button-active {
    background-color: #1A7EF5 !important;
}

.button-active:hover {
background-color: #146FDA !important;
}

#creer-nouvelle-annonce {
    padding-top: 5px;
}

#creer-nouvelle-annonce:hover {
    cursor: pointer;
}

#searchProduitBar{
    border: none !important;
    box-shadow: none !important;
    border:0;outline:0;
    font-size: 13px;
}

#searchProduitBar:focus{
    border: none !important;
    box-shadow: none !important;
    border:0;outline:0;
}

#searchProduitBar:active{
    border: none !important;
    box-shadow: none !important;
    border:0;outline:0;
}

.avatar-none {
    display: none;
}

.next-box-marchand-text {
    height: 20px;
    width: 113px;
    border-radius: 4px;
    background-color: #F5F5F5;

    color: #191970;
    font-family: Roboto;
    font-size: 12px;
    font-weight: bold;
    letter-spacing: 0;
    line-height: 10px;
    text-align: center;
    text-align: center;
    padding-top: 5px;
    position: relative;
    margin-left: auto;
    margin-right: auto;
}

.next-box-marchand-img {
    display: flex;
    position: relative;
}

.next-box-marchand-img div {
    height: 28.71px;
    width: 29px;
    box-shadow: 0 2px 48px 0 rgba(0,0,0,0.13);
}

.next-box-marchand-img img {
    height: 28.71px;
    width: 29px;
    border-radius: 50px;
    box-shadow: 0 2px 48px 0 rgba(0,0,0,0.13);
}

.last-element-text {
    box-sizing: border-box;
    height: 32.71px;
    width: 33px;
    border: 2px solid #FFFFFF;
    background-color: #D8D8D8;
    display: flex;
    justify-content: center;
    align-items: center;
    border-radius: 50%;
}

.last-element-text h6 {
    height: 10px;
    width: 21px;
    color: #4A4A4A;
    font-family: Roboto;
    font-size: 12px;
    font-weight: bold;
    letter-spacing: 0;
    line-height: 10px;
    position: relative;
    top: 4px;
}

.trait-separator {
    box-sizing: border-box;
    height: 50px;
    width: 1px;
    border: 1px solid #979797;
    position: relative;
    left: 14%;
}

.negociation-section {
    pointer-events:none;
    opacity: .5;
}

.negociation-section-desabled {
    pointer-events:none;
    opacity: .5;
}

.retour-section-desabled {
    pointer-events:none;
    opacity: .5;
}

.transparente {
    background: none !important;
    background-color: transparent !important
}

.vendre-meme-article {
    height: 34px;width: 185px;border-radius: 6px;background-color: #1A7EF5;color:white;border:1px solid #1A7EF5; position: relative;
    font-size: 14px;
}

.vendre-meme-article:hover {
    background-color: #146FDA !important;
}

.search-product-item {
    color: #146FDA;
}
.search-product-item:hover{
    opacity: .9;
    color: #D0021B !important;
    cursor: pointer;
    background-color: #F5F5F5 !important;
}

.results-items-over:hover {
    color: #D0021B !important;
    font-weight: 500;
}

.text-result-search b:hover {
    color: #D0021B !important;
}

.text-result-search b:hover {
    color: #D0021B !important;
}

.mot-recherche-produit {
    color: #191970;
    font-weight: 500;
}

.clean-text-suggestion:hover{
    cursor: pointer;
}

.clean-text-suggestion img {
    width: 16px;
    height: 16px;
}

.ajout-caracteristique-btn {
    box-sizing: border-box;
    height: 41px;
    width: 253px;
    border: 1px solid #9B9B9B;
    border-radius: 6px;
    background-color: #FFFFFF;
}

.caracteristique-supplementaire {
    box-sizing: border-box;
    height: 154px;
    width: 253px;
    border: 1px solid #979797;
    border-radius: 6px;
    background-color: #FFFFFF;
    position: relative;
    margin-right: auto;
    margin-top: 5px;
    padding: 0px !important;
    z-index: 1000;
}

.row-supp-1 {
    height: 36px;
    width: 251px;
    display: flex;
    column-gap: 5px;
    margin-top: 5px;
    margin-bottom: 5px;
    border-bottom: 1px solid #979797;
}

.row-supp-1 label {
    height: 16px;
    width: 39px;
    color: #191970;
    font-family: Roboto;
    font-size: 14px;
    letter-spacing: -0.34px;
    line-height: 14px;
    margin-top: 9px
}

.row-supp-2 {
    display: grid;
    grid-template-columns: repeat(2, 119px);
    row-gap: 3px !important;
    column-gap: 5px;
}

.row-supp-1 input {
    outline: none;
    border: none;
}

.detail-annonce-libelle {
    width: 226px;
    color: #191970 !important;
    font-family: Roboto;
    font-size: 14px;
    font-weight: 500;
    letter-spacing: 0.31px;
    padding-bottom: 0px !important;
    margin-bottom: 0px !important;
    line-height: 15px;
    text-transform: uppercase
}

.red-star {
    color: #D0021B;
}

.hr-divider {
    box-sizing: border-box;
    height: 1px;
    width: 366px;
    border: 1px solid #979797;margin-left:96px;
    margin-top: 15px !important
}

.add-input-caracteristique {
    height: 31px;
    width: 118px;
    border-radius: 6px;
    background-color: #F8F8F8;
    padding-left: 10px;
    outline: none;
    border: none;
    margin-left: 5px;
    padding-right: 20px;

    color: #191970;
    font-family: Roboto;
    font-size: 14px;
    letter-spacing: -0.34px;
    line-height: 16px;
}

.input-caracteristique-child {
    border: 1px solid red !important;
}

.boutique-produit-container {
    display: grid;
    grid-template-columns: repeat(6, 1fr);
    column-gap: 12px;
    row-gap: 60px;
    padding-bottom: 10px;
    position: relative;
    left: -1px;
    /* top: 4.5%; */
    margin-top:4.5%;
}

.case-produit {
    box-sizing: border-box;
    height: 107px;
    width: 163px;
    border-radius: 6px;
}

.case-produit:hover {
    border: 1px solid #1A7EF5;
}

.image_principal-produit {
    height: 104px !important;
    width: 161px !important;
    border-radius: 6px;
}

.produit-step-1-footer {
    padding-top: 7px;
}

.mode-expedition-row {
    /* background-color: #ccc */
}
.country_to_expulse {
    /* background-color: #146FDA !important; */
}

.table td, .table th {
    border-left: 1px solid #ccc !important;
}

.img-section {
    margin-left: 9px;
}

.img-section img {
    box-sizing: border-box;
    height: 33px;
    width: 33px;
    border-radius: 50px;
    border: 1px solid #FFFFFF;
    /* margin-left: 9px; */
}

.icon-zone {
    height: 16px;
    width: 16px;
    /* background-color: red;+ */
    display: flex;
    justify-content: center;
    align-items: center;
    margin-left: 7px;
    color: #ccc;
}

.over-section {
    box-sizing: border-box;
    height: 31px;
    width: 31px;
    border: 1px solid #FFFFFF;
    border-radius: 6px;
    background-color: #9B9B9B;
    margin-left: 8px;
}

#close-search-product:hover {
    cursor: pointer;
}

.imagessearch {
    width: 183px !important;
    height: 183px !important;
}

.redColor {
    color: red !important;
    font-weight: 500;
}

.caracteristique-frequent {
    color: #1A7EF5;
    font-family: Roboto;
    font-size: 12px;
    letter-spacing: 0;
    line-height: 12px;
}

.caracteristique-frequent-label {
    font-family: Roboto;
    font-size: 12px;
    letter-spacing: 0;
    line-height: 12px;
}
.midle-mode-expedition {
    height: 50px;
    width: 563px;
    border-radius: 6px;
    position: relative;
    margin-left: 5px;
    padding-top: 4.5px;
}

/* class="expedition-modif-supp" */
.expedition-modif-supp {
    position: relative;
    left: 1px !important;
}
.expedition-modif-supp a {
    text-decoration: none;
}

.expedition-modif-supp a:hover {
    text-decoration: underline;
}

.midle-mode-expedition:hover {
    background-color: #F5F5F5;
    cursor: pointer;
}

.box-prod-options {
    box-sizing: border-box;
    height: 26px;
    width: 26px;
    border-radius: 16.5px;
}

.box-prod-options:hover{
    cursor: pointer;
}

.dynamique-div-section {
    width: 76%;
    height: 75.4%;
    top: 15.5%;
    background: #ccc;
    position: absolute;
    left: 12.5%;
}

.img-marchand-etager {
    height: 60px;
    width: 60px;
    position: absolute;
    left: -150px;
}

.img-marchand-etager:hover {
    cursor: pointer;
}


.historique {
    display: flex;
    margin-left:280px;
    margin-top:-5px;
}

.historique li {
    list-style-type: none;
    height: 70px;
    width: 70px;
    color: #9B9B9B;
    font-family: Roboto;
    font-size: 10px;
    font-weight: 500;
    letter-spacing: 0;
    line-height: 11px;
    text-align: center;
    margin-left: 9px;
    padding-top: 10px;
    cursor: pointer;
    border-radius: 6px;
    background-color: white;
    border: 1px solid #9B9B9B;
}

.historique li:hover {
    border: 1px solid #1A7EF5;
}
.mesb{
    background-color: #D8D8D8;
    color: #4A4A4A;
    font-weight:bold;
}

.mesb:hover{
    background-color: #1A7EF5;
    color:white;
    font-weight: 500;
    cursor: pointer;
}

.rayon-hover {
    background-color: #1A7EF5;
    color:white !important;
    font-weight: 500;
    cursor: pointer;
}

.rayon-hover-link{
    color: #fff !important;
}

.mesb:hover a{
    color:white;
    font-weight: 500;
    cursor: pointer;
    font-weight: 500;
}

/* style paul  */
.modsup{
    color:#1A7EF5;
}

.modsup:hover{
    color:#191970;
    background-color: #F5F5F5;
}

.cobat{
    background-color: #FFFF;
}

.cobat:hover{
    background-color: #F5F5F5;
}
.progres{
    position: relative;
    margin: 4px;
    float:left;
    text-align: center;
    margin-top:-53px;
}

.barOverflow{ /* Wraps the rotating .bar */
    position: relative;
    overflow: hidden; /* Comment this line to understand the trick */
    width: 70px; height: 55px; /* Half circle (overflow) */
    /* bring the numbers up */
}
.bar{
    position: absolute;
    top: 0; left: 0;
    width: 70px; height: 78px; /* full circle! */
    border-radius: 50%;
    box-sizing: border-box;
    border: 3px solid#00B517;     /* half gray, */
    border-bottom-color:#D8D8D8;  /* half azure */
    border-right-color: #D8D8D8;
}
.mesch:hover{
    background-color:#F5F5F5;
    cursor: pointer;
}

#paiem5{
    background-color: #FFFF;
}

.paiem5:hover{
    background-color: #F5F5F5;
}

.prog {
    width: 45px!important;
    height: 45px !important;
    line-height: 50px;
    background: #ffffff;
    margin-top: -49px;
    box-shadow: none;
    position: relative;
    margin-left: 100px;
    border-radius: 80px
}

.prog>span {
    width: 50%;
    height: 100%;
    overflow: hidden;
    position: absolute;
    top: 0;
    z-index: 1;
}

.prog .prog-left {
    left: 0;
}

.prog .prog-bar {
    width: 100%;
    height: 100%;
    background: none;
    border-width: 3px;
    border-style: solid;
    position: absolute;
    top: 0;
}

.prog .prog-left .prog-bar {
    left: 100%;
    border-top-right-radius: 80px;
    border-bottom-right-radius: 80px;
    border-left: 0;
    -webkit-transform-origin: center left;
    transform-origin: center left;
}

.prog .prog-right {
    right: 0;
}

.prog .prog-right .prog-bar {
    left: -100%;
    border-top-left-radius: 80px;
    border-bottom-left-radius: 80px;
    border-right: 0;
    -webkit-transform-origin: center right;
    transform-origin: center right;
    animation: loading-1 1.8s linear forwards;
}

.prog .prog-value {
    width: 27px;
    height: 16px;
    border-radius: 50%;
    color: #191970;
    font-family: Roboto;
    font-size: 14px;
    font-weight: bold;
    letter-spacing: 0;
    line-height: 16px;
    text-align: center;
    padding-left: 10px;
    padding-top: 15px;
}

.prog.blue .prog-bar {
    border-color: rgb(15, 167, 15);
}
.prog.yel .prog-bar {
    border-color: #FF9500;
}
.prog.third .prog-bar {
    border-color:#FFCC00;
}

.prog.blue .prog-left .prog-bar {
    animation: loading-2 1.5s linear forwards 1.8s;
}

.prog.yel .prog-left .prog-bar {
    animation: loading-2 1.5s linear forwards 1.8s;
}

.prog.third .prog-left .prog-bar {
    animation: loading-2 1.5s linear forwards 1.8s;
}


.modsup{
    color:#1A7EF5;
}

.modsup:hover{
    color:#191970;
    background-color: #F5F5F5;
}

.rayon-link-item {
    text-decoration: none; color: #000
}

.rayon-link-item:hover{
    color: #fff;
}

.boutique-produit-container11 {
    display: grid !important;
    grid-template-columns: repeat(6, 1fr);
    column-gap: 12px;
    row-gap: 12% !important;
    position: relative;
    left: -1px;
    margin-top:4.7%;
}

.swiper {
    width: 100%;
    height: 100%;
    position: relative;
}

.swiper {
    margin-left: auto;
    margin-right: auto;
}

.swiper-slide {
    display: -webkit-box;
    display: -ms-flexbox;
    display: -webkit-flex;
    display: flex;
    -webkit-box-pack: center;
    -ms-flex-pack: center;
    -webkit-justify-content: center;
    justify-content: center;
    -webkit-box-align: center;
    -ms-flex-align: center;
    -webkit-align-items: center;
    align-items: center;
}

/* zone nornal  */
#produit_section-carse1 {
    position: relative;
    top: -25px;
}

#produit_section-carse2 {
    position: relative;
    top: -42px;
}

#produit_section-carse3 {
    position: relative;
    top: -85px;
}

#produit_section-carse4 {
    position: relative;
    top: -125px;
}

#produit_section-carse-ajax1{
    position: relative;
    top: -30px;
}

@media only screen and (min-width : 1828px) {

/* -------------------- zone responsive ----------------------  */
#produit_section-carse1 {
    position: relative;
    margin-top: 112px !important;
}

#grande-etagere-slide {
    position: relative;
    margin-left: auto;
    margin-right: auto;
    width: 90%;
    top: 60px;
}

#grande-etagere-slide1 {
    position: relative;
    margin-left: auto;
    margin-right: auto;
    width: 90%;
    top: 60px;
}

#grande-etagere-slide2 {
    position: relative;
    margin-left: auto;
    margin-right: auto;
    width: 90%;
    top: 60px;
}
}

@media only screen and (max-width : 1800px) {

    #produit_section-carse1 {
        position: relative;
        margin-top: 37px;
    }

    #produit_section-carse2 {
        position: relative;
        top: -42px;
    }

    #produit_section-carse3 {
        position: relative;
        top: -85px;
    }

    #produit_section-carse4 {
        position: relative;
        top: -125px;
    }

    .default-setted {
        position: absolute;
        margin-left: 445px !important;
        margin-top: -92px !important;
    }

    #produit_section-carse-ajax1{
        position: relative;
        top: -78px;
    }
}

    .marchand-av-img {
        position: relative;
        height: auto;
        width: auto;
        border-radius: 6px;
        visibility: hidden;
    }

</style>

<style>
.rayon-marchand-dynamique {
    height: 30px;
    width: 146px;
    border-radius: 6px;
    text-align:center;padding:8px;
    font-family: Roboto;
    font-size: 12px;
    letter-spacing: 0;
    line-height: 13px;
}

.main-rayon-items {
    display: grid;
    grid-template-columns: repeat(3, 1fr);
    grid-row-gap: 4px;
}

.boutiqueLetterStyleBis {
    box-sizing: border-box;
    height: 70px;
    width: 70px;
    border-right: 1px solid #1A7EF5;
    border-radius: 6px;
    font-size: 50px;
    font-weight: 900;
    display: flex;
    justify-content: center;
    align-items: center;
    color: #1A7EF5;
}

.valide-none {
    display: none;
}

.set-white-color {
    background-color: #fff;
}

 .section-hidden-boutique {
    height: 70px;
    width: 506px;
    border-radius: 6px;
    background-color: #FFFFFF;
    margin-left:9px;
    display:none;
}

.slide-rayon-btn {
    width:23px;
    height:69px;
    background-color:#F5F5F5;
    border:1px solid #FFFF;
    border-radius:6px 0 0 6px;
}

.main-zone-rayon-section {
    width:458px;
    height:69px;
    margin-left:23px;
    margin-top:-69px;
    padding:2px;
    padding-top:3px;
}

.changer-mode-payement {
    margin-top:8px;
    color:#1A7EF5;
    font-family: Roboto;
    font-size: 12px;
    font-weight: 500;
    letter-spacing: 0.24px;
    line-height: 13px
}

.section-mode-payement-hidden {
    box-sizing: border-box;
    height: 70px;
    width: 70px;
    border: 1px solid #1A7EF5;
    border-radius: 6px;
    margin-left:9px;
    text-align:center;
    padding:5px;
}

.slide-btn-next-rayon {
    width:23px;
    height:69px;
    background-color:#F5F5F5;
    margin-left:482px;
    margin-top:-70px;
    border:1px solid #FFFF;
    border-radius:0 6px 6px 0;
}

.mode-payement-hidden-zone {
    box-sizing: border-box;
    height: 70px;
    width: 70px;
    border: 1px solid #1A7EF5;
    border-radius: 6px;
    background-color: #FFFFFF;
    margin-left:9px;
}

.mode-payement-par-defaut {
    opacity:0.5;
    /* pointer:none; */
    font-family: Roboto;
    font-size: 12px;
    font-weight: 500;
    letter-spacing: 0;
    line-height: 11px;
    text-align: center;
    height:30px;
    margin-top:-15px;
    width:66px;
    margin-left:1px;
    padding-top:11px;
}

.modifier-btn-element {
    font-family: Roboto;
    font-size: 12px;
    font-weight: 500;
    letter-spacing: 0;
    line-height: 11px;
    text-align: center;
    height:30px;
    margin-top:2px;
    width:66px;
    margin-left:1px;
    cursor:pointer;
    padding-top:11px;
}

.default-setted {
    position: absolute;
    margin-top: 20px;
    margin-left: 21px;
}

 .section-marchand-payement {
    height: 70px;
    width: 222px;
    border: 1px solid #1A7EF5;
    border-radius: 6px;
    background-color: #FFFFFF;
    margin-left:9px;
    padding:10px;
}

.section-payement-article-1 {
    height: 50px;
    width: 33px;
    border-radius: 6px;
    background-color: #F5F5F5;
}

.section-payement-article-2 {
    margin-left:40px;
    margin-top:-50px;
    height: 50px;
    width: 159px;
    border-radius: 6px;
    background-color: #F5F5F5;
    font-family: Roboto;
    font-size: 12px;
    letter-spacing: 0;
    line-height: 12px;
    text-align: center;
    padding:9.5px;
}

.section-payement-airtel {
    text-align:center;
    color: #1A7EF5;
    font-family: Roboto;
    font-size: 14px;
    font-weight: 500;
    letter-spacing: 0;
    line-height: 14px;
    text-align: center;
}

.section-payement-numero {
    text-align:center; color: #191970;
    font-family: Roboto;
    font-size: 14px;
    font-weight: 500;
    letter-spacing: 0;
    line-height: 14px;
    text-align: center;
    margin-top:-10px;
}

.section-tableau-zone {
    margin-left:9px;display:none;  box-sizing: border-box;
    height: 70px;
    width: 221px;
    border: 1px solid #1A7EF5;
    border-radius: 6px;
    background-color:#F5F5F5;
}

.section-tableau-p-stock {
    color: #191970;
    font-family: Roboto;
    font-size: 12px;
    font-weight: bold;
    letter-spacing: 0.24px;
    line-height: 13px;
    padding-top:10px;
    padding-left:15px;
    text-decoration:none!important;
}

 .produit-en-stock-bar {
    box-sizing: border-box;
    height: 1px;
    width: 72px;
    border: 1px solid #191970;
    opacity: 0.5;
    margin-top:-13px;
    margin-left:10px;
}

#carouselExampleIndicators {
    height: 17.5px;
    width: 72px;
    border-radius: 2px;
    background-color: #00B517;
    margin-top:-12px;
    margin-left:10px;
}

.carouss-inner-custom {
    color: #FFFFFF;
    font-family: Roboto;
    font-size: 8px;
    font-weight: 500;
    letter-spacing: 0.16px;
    line-height: 8px;
    text-align: center;
    padding-top:5px;
}

.section-nouvelle-commande {
    margin-left:9px;
    box-sizing: border-box;
    height: 70px;
    width: 221px;
    border: 1px solid #1A7EF5;
    background-color:#F5F5F5;
    border-radius: 6px;
}

.p-nouvelle-commande {
    color: #191970;
    font-family: Roboto;
    font-size: 12px;
    font-weight: bold;
    letter-spacing: 0.24px;
    line-height: 13px;
    padding-top:10px;
    padding-left:15px;
}

.nouvelle-commande-hr {
    box-sizing: border-box;
    height: 1px;
    width: 72px;
    border: 1px solid #191970;
    opacity: 0.5;
    margin-top:-13px;
    margin-left:10px;
}

.carouss-slider-custom {
    height: 17.5px;
    width: 72px;
    border-radius: 2px;
    background-color:  #FF9500;
    margin-top:-12px;
    margin-left:10px;
}

.carouss-inner-custom1 {
    color: #FFFFFF;
    font-family: Roboto;
    font-size: 8px;
    font-weight: 500;
    letter-spacing: 0.16px;
    line-height: 8px;
    text-align: center;
    padding-top:5px;
}

.section-tab6 {
    margin-left:9px;
    box-sizing: border-box;
    height: 70px;
    width: 221px;
    border: 1px solid #1A7EF5;
    border-radius: 6px;
    background-color:#F5F5F5;
}

.commande-passee {
    color: #191970;
    font-family: Roboto;
    font-size: 12px;
    font-weight: bold;
    letter-spacing: 0.24px;
    line-height: 13px;
    padding-top:10px;
    padding-left:15px;
}

.commande-passee-hr {
    box-sizing: border-box;
    height: 1px;
    width: 72px;
    border: 1px solid #191970;
    opacity: 0.5;
    margin-top:-13px;
    margin-left:10px;
}

.carouss-slide-commande {
    height: 17.5px;
    width: 72px;
    border-radius: 2px;
    background-color:  #FFCC00;
    margin-top:-12px;
    margin-left:10px;
}

.carouss-inner-semaine {
    color: #FFFFFF;
    font-family: Roboto;
    font-size: 8px;
    font-weight: 500;
    letter-spacing: 0.16px;
    line-height: 8px;
    text-align: center;
    padding-top:5px;
}

.section-hc4 {
    display: none;margin-left:9px; box-sizing: border-box;
    height: 70px;
    width: 142px;
    border: 1px solid #1A7EF5;
    border-radius: 6px;
    background-color: #FFFFFF;padding:10px;
}

.dernier-code-generer {
    color: #9B9B9B;
    font-family: Roboto;
    font-size: 10px;
    letter-spacing: 0;
    line-height: 11px;
}

.zone-code-genere {
    box-sizing: border-box;
    height: 34px;
    width: 122px;
    border: 1px solid #D0021B;
    border-radius: 6px;
    background-color: #FFFFFF;
    text-align:center;  color: #191970;
    font-family: Roboto;
    font-size: 20px;
    font-weight: bold;
    letter-spacing: 0;
    line-height: 22px;
    padding-top:5px;
    margin-top:-10px;padding-left:8px;
}

.section-hc5-zone {
    box-sizing: border-box;
    height: 70px;
    width: 145px;
    border-radius: 6px;
    border:1px solid #1A7EF5;
    background-color: #FFFF;
    padding:5px;
    margin-left:9px;
}

.mon-historique-h {
    height: 60px;
    width: 135px;
    border-radius: 6px;
    text-align:center;padding-top:20px; color: #4A4A4A;
    font-family: Roboto;
    font-size: 12px;
    font-weight: 500;
    letter-spacing: 0.24px;
    line-height: 13px;
}


.corbeille-section {
    height: 21px;
    width: 104px;
    border-radius: 6px;
    margin-left:10px;
    padding:3px;
    margin-top:-10px;
}

.corbeille-counter {
    color: #D0021B;
    font-family: Roboto;
    font-size: 16px;
    font-weight: bold;
    letter-spacing: 0;
    margin-top:2px;
    line-height: 13px;
}

#viderCorbeilBtn:hover{
    cursor: pointer;
}

.reinitialiser-30 {
    width:124px;
    position:absolute;
    color: #191970;
    font-family: Roboto;
    font-size: 9px!important;
    letter-spacing: 0;
    position: relative;
    z-index:1;
    line-height: 9px;
    padding:0px;text-align:left;margin-top:7px;
    padding-left:7px;
}

.article-vidcorb {
    box-sizing: border-box;
    height: 37px;
    width: 127px;
    border: 1px solid #979797;
    border-radius: 6px;
    background-color: #FFFFFF;
    box-shadow: 0 0 4px 0 rgba(0,0,0,0.25);
    display:none;margin-top:-30px;margin-left:5px;
    border-radius:6px;position:relative;
    padding-top:6px; color: #191970;
    font-family: Roboto;
    font-size: 12px;
    letter-spacing: 0;
    line-height: 12px;
    z-index:1;
    text-align:center
}

.promotion-encours {
    color: #9B9B9B;
    font-family: Roboto;
    font-size: 10px;
    letter-spacing: 0;
    line-height: 11px;margin-top:3px;
}

.section-cp4-promo {
    box-sizing: border-box;
    height: 70px;
    width: 368.5px;
    border: 1px solid #1A7EF5;
    border-radius: 6px;
    background-color: #FFFFFF;
    margin-left:9px;padding:10px;
}

.solde-month {
    color: #191970;
    font-family: Roboto;
    font-size: 14px;
    font-weight: bold;
    letter-spacing: 0;
    line-height: 16px;
    margin-top:-8px;
}

.solde-div-element {
    box-sizing: border-box;
    height: 50px;
    width: 1px;
    border: 1px solid #D8D8D8;
    margin-top:-53px;
    margin-left:100px;
}

.aside-nbre-user {
    height: 24px;
    width: 50px;
    border-radius: 6px;
    background-color: #D0021B; color: #FFFFFF;
    font-family: Roboto;
    font-size: 8px;
    letter-spacing: 0;
    line-height: 9px;
    text-align: center;margin-top:4px;
    padding:3px;cursor: pointer;
}

.aside-element-description {
    height: 43px;
    width: 6px;
    border-radius: 4px 4px 0 0;
    background-color: #E5E9F2;
    margin-top:-50px;
    margin-left:60px;
    padding-top:30px;
}

.article-zone-neutre {
    height: 13px;
    width: 6px;
    border-radius: 4px 4px 0 0;
    background-color: #D0021B;
    margin-left:0.2px;
}

.p-element-zone-l {
    margin-left:62px;color: #001737;
    font-family: Roboto;
    font-size: 5px;
    letter-spacing: 0;
    line-height: 5px;margin-top:3px;
}

.aside-element-m {
    height: 43px;
    width: 6px;
    border-radius: 4px 4px 0 0;
    background-color: #E5E9F2;
    margin-top:-67px;
    margin-left:72px;
    padding-top:23px;
}

.article-mardi-parent {
    height: 20px;
    width: 6px;
    border-radius: 4px 4px 0 0;
    background-color: #D0021B;
    margin-left:0px;
}
.aside-element-mardi {
    margin-left:74px;color: #001737;
    font-family: Roboto;
    font-size: 5px;
    letter-spacing: 0;
    line-height: 5px;margin-top:3px;
}

.aside-element-mercredi {
    height: 43px;
    width: 6px;
    border-radius: 4px 4px 0 0;
    background-color: #E5E9F2;
    margin-top:-67px;
    margin-left:84px;
    padding-top:13px;
}

.article-element-mercredi {
    height: 30px;
    width: 6px;
    border-radius: 4px 4px 0 0;
    background-color: #D0021B;
    margin-left:0px;
}

.mercredi-p-element {
    margin-left:86px;color: #001737;
    font-family: Roboto;
    font-size: 5px;
    letter-spacing: 0;
    line-height: 5px;margin-top:3px;
}

.aside-jeudi-element {
    height: 43px;
    width: 6px;
    border-radius: 4px 4px 0 0;
    background-color: #E5E9F2;
    margin-top:-67px;
    margin-left:96px;padding-top:33px;
}

.article-jeudi-element {
    height: 10px;
    width: 6px;
    border-radius: 4px 4px 0 0;
    background-color: #D0021B;
    margin-left:0px;
}

.p-jeudi-element {
    margin-left:98px;color: #001737;
    font-family: Roboto;
    font-size: 5px;
    letter-spacing: 0;
    line-height: 5px;margin-top:3px;
}

.aside-vendredi-element {
    height: 43px;
    width: 6px;
    border-radius: 4px 4px 0 0;
    background-color: #E5E9F2;
    margin-top:-67px;margin-left:108px;
    padding-top:5px;
}

.article-vendredi-element {
    height: 38px;
    width: 6px;
    border-radius: 4px 4px 0 0;
    background-color: #D0021B;
    margin-left:0px;
}

.p-vendredi-element {
    margin-left:110px;color: #001737;
    font-family: Roboto;
    font-size: 5px;
    letter-spacing: 0;
    line-height: 5px;margin-top:3px;
}

.aside-samedi-element {
    height: 43px;
    width: 6px;
    border-radius: 4px 4px 0 0;
    background-color: #E5E9F2;
    margin-top:-67px;
    margin-left:120px;padding-top:0px;
}

.article-samedi-element {
    height: 43px;
    width: 6px;
    border-radius: 4px 4px 0 0;
    background-color: #D0021B;margin-left:0px;
}

.p-samedi-element {
    margin-left:122px;color: #001737;
    font-family: Roboto;
    font-size: 5px;
    letter-spacing: 0;
    line-height: 5px;margin-top:3px;
}

.aside-dimanche-element {
    height: 43px;
    width: 6px;
    border-radius: 4px 4px 0 0;
    background-color: #E5E9F2;
    margin-top:-67px;margin-left:132px;
    padding-top:28px;
}

.article-dimanche-element {
    height: 15px;
    width: 6px;
    border-radius: 4px 4px 0 0;
    background-color: #D0021B;
    margin-left:0px;
}

.p-dimanche-element {
    margin-left:134px;color: #001737;
    font-family: Roboto;
    font-size: 5px;
    letter-spacing: 0;
    line-height: 5px;margin-top:3px;
}


.p-lundi-element-1 {
    margin-left:62px;color: #001737;
    font-family: Roboto;
    font-size: 5px;
    letter-spacing: 0;
    line-height: 5px;margin-top:3px;
}

.aside-lundi-element-1 {
    height: 43px;
    width: 6px;
    border-radius: 4px 4px 0 0;
    background-color: #E5E9F2;
    margin-top:-50px;
    margin-left:60px;padding-top:20px;
}

.article-lundi-element-1 {
    height: 23px;
    width: 6px;
    border-radius: 4px 4px 0 0;
    background-color: #0A84FF;margin-left:0.2px;
}

.aside-mardi-element-1 {
    height: 43px;
    width: 6px;
    border-radius: 4px 4px 0 0;
    background-color: #E5E9F2;
    margin-top:-67px;
    margin-left:72px;
    padding-top:33px;
}

.article-mardi-element-1 {
    height: 10px;
    width: 6px;
    border-radius: 4px 4px 0 0;
    background-color: #0A84FF;
    margin-left:0px;
}

.p-mardi-element-1 {
    margin-left:74px;color: #001737;
    font-family: Roboto;
    font-size: 5px;
    letter-spacing: 0;
    line-height: 5px;margin-top:3px;
}

.aside-mercredi-element-1 {
    height: 43px;
    width: 6px;
    border-radius: 4px 4px 0 0;
    background-color: #E5E9F2;
    margin-top:-67px;margin-left:84px;
    padding-top:13px;
}

.article-mercredi-element-1 {
    height: 30px;
    width: 6px;
    border-radius: 4px 4px 0 0;
    background-color: #0A84FF;
    margin-left:0px;
}

.p-mercredi-element-1 {
    margin-left:86px;color: #001737;
    font-family: Roboto;
    font-size: 5px;
    letter-spacing: 0;
    line-height: 5px;margin-top:3px;
}

.aside-jeudi-element-1 {
    height: 43px;
    width: 6px;
    border-radius: 4px 4px 0 0;
    background-color: #E5E9F2;
    margin-top:-67px;
    margin-left:96px;padding-top:3px;
}

.article-jeudi-element-1 {
    height: 40px;
    width: 6px;
    border-radius: 4px 4px 0 0;
    background-color: #0A84FF;
    margin-left:0px;
}

.p-jeudi-element-1 {
    margin-left:98px;color: #001737;
    font-family: Roboto;
    font-size: 5px;
    letter-spacing: 0;
    line-height: 5px;margin-top:3px;
}

.aside-vendredi-elemen-1 {
    height: 43px;
    width: 6px;
    border-radius: 4px 4px 0 0;
    background-color: #E5E9F2;
    margin-top:-67px;margin-left:108px;
    padding-top:10px;
}

.article-vendredi-element-1 {
    height: 33px;
    width: 6px;
    border-radius: 4px 4px 0 0;
    background-color: #0A84FF;
    margin-left:0px;
}

.p-vendredi-element {
    margin-left:110px;color: #001737;
    font-family: Roboto;
    font-size: 5px;
    letter-spacing: 0;
    line-height: 5px;margin-top:3px;
}

.aside-element-samedi-1 {
    height: 43px;
    width: 6px;
    border-radius: 4px 4px 0 0;
    background-color: #E5E9F2;
    margin-top:-67px;margin-left:120px;
    padding-top:0px;
}

.article-samedi-element-1 {
    height: 43px;
    width: 6px;
    border-radius: 4px 4px 0 0;
    background-color: #0A84FF;
    margin-left:0px;
}

.p-samedi-element-1 {
    margin-left:122px;color: #001737;
    font-family: Roboto;
    font-size: 5px;
    letter-spacing: 0;
    line-height: 5px;margin-top:3px;
}

.article-dimande-element-1 {
    height: 23px;
    width: 6px;
    border-radius: 4px 4px 0 0;
    background-color: #0A84FF;
    margin-left:0px;
}

.p-dimanche-element-1 {
    margin-left:134px;color: #001737;
    font-family: Roboto;
    font-size: 5px;
    letter-spacing: 0;
    line-height: 5px;margin-top:3px;
}

.slide {
    font-size: 50px;
    text-align: center;
    margin-bottom: 15px;
    display: flex;
    align-items: flex-end;
}

.none-items {
    display: none !important;
}

.previen-btn:hover {
    cursor: pointer;
}

.next-btn:hover{
    cursor: pointer;
}

.custom-carousel-page-user {

}

.custom-carousel-page-user:not(:first-child) {
    /* padding-left: 45px; */
}

.custom-carousel-page-user:first-child {
    left: -20px;
}

.slider-content {
    position: relative;
    width: 100%;
}


.tm-supp-slide-element {
    height: 155px !important;
    position: relative;
    display: flex;
    justify-content: center;
    align-items: flex-end;
    width: 120px !important
}

.case-produit-btn {
    height: 155px !important;
}

.slide-add-btn:hover{
    visibility: visible
}

.not-active-product-btn {
    visibility:hidden
}

.active-product-btn {
    visibility: visible
}

.not-active-product-btn-hover {
    visibility:hidden
}

.active-product-btn-hover {
    visibility: visible
}

.class-default-added-btn {
    height: 155px;
    width: 170px;
    background-image: linear-gradient(to right, #333 10%, rgba(255, 255, 255, 0) 0%);
    background-position: top;
    background-size: 10px 1px;
    background-repeat: repeat-x;
    display: flex;
    border: 0.5px #333 dotted;
    border-radius: 4px;
    justify-content: center;
    align-items: center;
}

.class-default-added-btn:hover{
    cursor: pointer;
}

.init-added-button {
    height: 155px;
    width: 170px;
    background-image: linear-gradient(to right, #333 10%, rgba(255, 255, 255, 0) 0%);
    background-position: top;
    background-size: 10px 1px;
    background-repeat: repeat-x;
    display: flex;
    border: 0.5px #333 dotted;
    border-radius: 4px;
    justify-content: center;
    align-items: center
}

.row_div-user {
    width: 92%;
    height: 160px;
    margin-bottom: 22px;
    display: flex;
    justify-content: space-between;
    column-gap: 10px;
}

.row_div-user-telephonie {
    width: 92%;
    height: 78px;
    margin-bottom: 27px;
    display: flex;
    justify-content: space-between;
    align-items: baseline;
}

.p-box {
    width: 264px;
    height: 164px;
    border-radius: 6px;
    border: 1px solid red;
}

.product-img-for-option:hover span{
    display: flex !important;
}

.image-prod-option:hover {
    cursor: pointer;
}

.image-prod-option{
    margin: 0px !important;
}

.prod-option-corbeil:hover {
    filter: invert(16%) sepia(70%) saturate(5409%) hue-rotate(345deg) brightness(78%) contrast(112%);
}

.prod-option-preview:hover {
    filter: invert(35%) sepia(32%) saturate(4698%) hue-rotate(202deg) brightness(103%) contrast(92%);
}

.prod-option-edit:hover {
    filter: invert(35%) sepia(32%) saturate(4698%) hue-rotate(202deg) brightness(103%) contrast(92%);
}

.prod-option-preview{
    position: relative;
    margin: 0px;
    padding: 0px
}

.prod-option-edit {
    position: relative;
    margin: 0px;
    padding: 0px
}

.p-element-unkown-2 {
    color: #191970;
    font-family: Roboto;
    font-size: 24px;
    font-weight: 500;
    letter-spacing: -0.58px;
    line-height: 28px;
    margin-top:50px;text-align:center;
}

.s-none-client {
    display: none !important;
}

.slider-content-wrapper-user:not(:first-child) {
    position: relative;
}

.slider-content-wrapper-user:first-child {
    position: relative;
    top: 40px;
}

.product-effect-layer {

}

.product-effect-layer:hover > .image-prod {
    filter: drop-shadow(0px 0px 0.75rem #0e0e46);
}

.produit-show-effect {
    filter: drop-shadow(0px 0px 0.75rem #0e0e46);
}

.product-effect-layer:hover  {
    filter: drop-shadow(0px 0px 0.75rem #0e0e46);
}

.product-filled-effect {

}

.effect-none {
    display: none !important;
}

.image-prod:hover{
    filter: drop-shadow(0px 0px 0.75rem #0e0e46);
}

.effect-none_noned {
    background-color: #333;
}

.cap-cover {
    background-color: rgba(0, 0, 0, 0.5);
    font-weight: 500;
}

.product-effect-layer:hover {
    cursor: pointer;
}

.slide img:hover {
    cursor: pointer;
}

.rayon-btn-direction-legume-left:hover .img-direction-btn {
    opacity: 1 !important;
}

.my-slick-btn-2:hover .img-direction-btnd {
    opacity: 1 !important;
}

.btn-left:hover {
    /* background-color: #000 !important; */
}

.img-direction-btn {
    opacity: 0.8 !important;
}

.img-direction-btn:hover {
    opacity: 1 !important;
}

.img-direction-btnd {
    opacity: 0.8 !important;
}

.img-direction-btnd:hover {
    opacity: 1 !important;
}

</style>

@section('search-bar')
<div class="rayon-bloc-recherche">
    <div class="formRayonSearch_input my-form-field br-l input-recherche" style="width: inherit; z-index: 12" tabindex="0">
        <input onkeyup='rayonSearch("{{ url('search-from-rayon/'. $rayon->id) }}", this)' data-rayon="{{ $rayon->id }}" data-univer="{{ url('search-from-rayon/'. $rayon->id) }}" placeholder="Commencez votre recherche..." type="text" class=""  name="formRayonSearch_text" id="formRayonSearch_text-input" style="height: 34px;">
        <div class="icon-note-vocal">
            <i class="fal fa-microphone-alt text-danger"></i>
        </div>
    </div>
    <div class="formRayonSearch_button">
        <button class="button-recherche mon-btn-primary" type="submit">
            <i class="far fa-search text-white"></i>
        </button>
    </div>
</div>

<input type="hidden" value="" id="demande_connection_source" />

@endsection

@section('contenu')

<nav class="owl-filter-bar d-none">
    <a href="#" class="item" data-owl-filter="*" id="famille-all">Tout</a>
    @foreach($rayon->familles as $famille)
        <a href="#" class="item" data-owl-filter=".famille-{{ $famille->id }}" id="famille-{{ $famille->id }}">{{ $famille->text($famille->libelle) }}</a>
    @endforeach
</nav>

<div class="my-navbar bg-white d-flex padding-fluid">
<img onclick="window.history.back()" style="height: 42px;width: 42px; margin-top: 3px; cursor: pointer;" src="{{ asset('assets/images2/left-icon.png') }}" alt="" onclick="document.getElementById('go-to-back').click()">

<div class="d-flex justify-content-between" style="height: 100%; margin-left: 5px;align-items: center; cursor:pointer;" onclick="document.getElementById('famille-all').click()">
    <div style="width: 50px; height: 100%; border-radius: 50% 0 0 50%; background-color: #191970;">
        <img style="height: 100%;height: 41px;width: 41px;margin: 3px 3px 3px 3px;" src="{{ $rayon->getIconLink() }}" alt="">
    </div>
    <div style="background-color: #191970;    padding: 7px 4px;height: 100%;display: flex;align-items: center; width: 140px;">
        <p class="p-0 m-0" style="line-height: 2.3em; color: white; font-weight: 500; font-family: Roboto;text-transform: UPPERCASE;line-height: 1.2;">{{ $rayon->text($rayon->libelle) }}</p>
    </div>
</div>

<button class="my-slick-btn my-slide-btn-prev br-l" onclick="document.getElementById('rayon-nav-prev-btn').click()" style="margin: 12px 0;position: absolute;left: 286px;">
    <i class="fas fa-chevron-left"></i>
</button>

<div class="owl-carousel navbar-slide" id="nav-slide" style="width: 81%; border-right: solid 1px #9B9B9B;">
    @foreach($rayon->familles as $famille)

    @if($famille->default_categorie == 1)
    <div class="rayon-nav-univers-dropdown item rayon-nav-univers-dropdown-activated" id="flle-item-{{$famille->id}}" onclick="sortByFamille({{$famille->id}})">
    @else
    <div class="rayon-nav-univers-dropdown item" id="flle-item-{{$famille->id}}" onclick="sortByFamille({{$famille->id}})">
    @endif
    <div class="rayon-nav-univers-content" style="display: flex;justify-content: center;">
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

<button class="my-slick-btn my-slide-btn-next br-r" onclick="document.getElementById('rayon-nav-next-btn').click()" style="margin: 12px 0;">
    <i class="fas fa-chevron-right"></i>
</button>

<div class="parametre-icon">
    <img class="hover-hide" src="{{ asset('assets/images2/Filtre-blanc-off.svg') }}" alt="">
    <img class="hover-show" src="{{ asset('assets/images2/Filtre-bleu-survole.svg') }}" alt="">
</div>
<div class="filter-icon">
    <img class="hover-hide" src="{{ asset('assets/images2/Trier-blanc-off.svg') }}" alt="">
    <img class="hover-show" src="{{ asset('assets/images2/Trier-bleu-survole.svg') }}" alt="">
</div>

</div>


@if($rayon->id == 7)
<div style="background: url('{{ $rayon->getGEtagereLink() }}') no-repeat;" class="grande-etagere">
@else
<div style="background: url('{{ $rayon->getGEtagereLink() }}') no-repeat;" class="grande-etagere padding-fluid" id="grande_etagereOK">
@endif

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

 @if($rayon->id == 25)
    <div class="main-carousel-section-changed-user" style="padding-left: 50px; height: 615px">

    <div class="slider-content-wrapper-user" style="top: 84px" id="rayon-produit-section-{{$rayon->id}}">
    @php
    $nbre_element = 0;
    $div_slide_element = '';
    for($i = 0; $i < count($arry); ++$i) {

    $div_slide_element .= '<div class="custom-carousel-page-user" id="slide-p-user'.$i.'" data-index = "'.$i.'" >';

    $tab_line = array_chunk($arry[$i], 4);

    for($j = 0; $j < count($tab_line); ++$j) {

        $div_slide_element .= '<div class="row_div-user" >';

        for($v = 0; $v < count($tab_line[$j]); ++$v){

        $div_slide_element .= '<div onclick="showClickEffect('.$tab_line[$j][$v]->id.')" onmouseover="showEffect('.$tab_line[$j][$v]->id.')" id="addSlide-user'.$tab_line[$j][$v]->id.'" class="slide case-produit-btnd" style="height: 155px !important;" onmouseleave="showEffectRemove('.$tab_line[$j][$v]->id.')">
        <img id="image-prod-id'.$tab_line[$j][$v]->id.'" class="image-prod" src="/'.$tab_line[$j][$v]->image.'"  alt="" onclick="showRecapProduitMarchandTV('.$tab_line[$j][$v]->id.')" width="'.$tab_line[$j][$v]->taille_sur_etagere.'px"><span id="effect-layer'.$tab_line[$j][$v]->id.'" class="product-effect-layer effect-none" style="font-size: 12px; position: absolute; width: '.$tab_line[$j][$v]->taille_sur_etagere.'px; "><span class="cap-cover"></span>
        </div>';

        }

        $div_slide_element .= '</div>';
    }

    $div_slide_element .= '</div>';

    }
    echo $div_slide_element;

    @endphp
    </div></div>
    @endif

    @if($rayon->id == 27)
    <div class="main-carousel-section-changed-user" style="padding-left: 50px; height: 615px">

    <div class="slider-content-wrapper-user" style="top: 84px" id="rayon-produit-section-{{$rayon->id}}">
    @php
    $nbre_element = 0;
    $div_slide_element = '';
    for($i = 0; $i < count($arry); ++$i) {
    $div_slide_element .= '<div class="custom-carousel-page-user" style="position: relative; top: -40px" id="slide-p-user'.$i.'" data-index = "'.$i.'" >';

    $tab_line = array_chunk($arry[$i], 8);
    for($j = 0; $j < count($tab_line); ++$j) {

    $div_slide_element .= '<div class="row_div-user-telephonie" >';

    for($v = 0; $v < count($tab_line[$j]); ++$v){

    $phone_height = 0;
    if ($tab_line[$j][$v]->taille_sur_etagere == 43) {
        $phone_height = 58;
    }else if($tab_line[$j][$v]->taille_sur_etagere == 50) {
        $phone_height = 68;
    }else if ($tab_line[$j][$v]->taille_sur_etagere == 57) {
        $phone_height = 78;
    }else {
        $phone_height = 43;
    }

    $capacite_val = '';

    // print_r($tab_line[$j][$v]->caracteristique);
    // $caracteristiques = $tab_line[$j][$v]->caracteristique;
    // foreach ($caracteristiques as $c) {
    //     if ($c->lib_caract == 'Capacités') {
    //         $capacite_val = $c->lib_valeur;
    //     }
    // }

    // echo $capacite_val;

    $div_slide_element .= '<div onclick="showClickEffect('.$tab_line[$j][$v]->id.')" onmouseover="showEffect('.$tab_line[$j][$v]->id.')" id="addSlide-user'.$tab_line[$j][$v]->id.'" class="slide case-produit-btnd" style="height: '.$phone_height.'px !important;" onmouseleave="showEffectRemove('.$tab_line[$j][$v]->id.')">
    <img id="image-prod-id'.$tab_line[$j][$v]->id.'" class="image-prod product-effect-layer2" style="height: 100% !important; width: auto !important" src="/'.$tab_line[$j][$v]->image.'"  alt="" onclick="showRecapProduitMarchandTV('.$tab_line[$j][$v]->id.')" width="'.$tab_line[$j][$v]->taille_sur_etagere.'px"><span id="effect-layer'.$tab_line[$j][$v]->id.'" class="product-effect-layer effect-none" style="font-size: 12px; position: absolute; width: '.$tab_line[$j][$v]->taille_sur_etagere.'px; color: #fff;"><span class="cap-cover">'.$capacite_val.'</span></span>
    </div>';

    }

    $div_slide_element .= '</div>';
    }

    $div_slide_element .= '</div>';
    }
    echo $div_slide_element;
    @endphp
    </div></div>
    @endif

    @if($rayon->id == 26)

    <div class="main-carousel-section-changed-user" style="padding-left: 50px; height: 615px">

    <div class="slider-content-wrapper-user" style="top: 84px" id="rayon-produit-section-{{$rayon->id}}">
    @php

    $nbre_element = 0;
    $div_slide_element = '';
    for($i = 0; $i < count($arry); ++$i) {

    $div_slide_element .= '<div class="custom-carousel-page-user" style="position: relative; top: -40px" id="slide-p-user'.$i.'" data-index = "'.$i.'" >';

    $tab_line = array_chunk($arry[$i], 8);
    for($j = 0; $j < count($tab_line); ++$j) {
    $div_slide_element .= '<div class="row_div-user-telephonie" >';

    for($v = 0; $v < count($tab_line[$j]); ++$v){

    // Définition des tailles en fonction des largeur
    $phone_height = 0;
    if ($tab_line[$j][$v]->taille_sur_etagere == 43) {
        $phone_height = 58;
    }else if($tab_line[$j][$v]->taille_sur_etagere == 50) {
        $phone_height = 68;
    }else if ($tab_line[$j][$v]->taille_sur_etagere == 57) {
        $phone_height = 78;
    }else {
        $phone_height = 43;
    }

    // $div_slide_element .= '<div onclick="showClickEffect('.$tab_line[$j][$v]->id.')" onmouseover="showEffect('.$tab_line[$j][$v]->id.')" id="addSlide-user'.$tab_line[$j][$v]->id.'" class="slide case-produit-btnd" style="height: '.$phone_height.'px !important;" onmouseleave="showEffectRemove('.$tab_line[$j][$v]->id.')">
    // <img id="image-prod-id'.$tab_line[$j][$v]->id.'" class="image-prod" style="height: '.$phone_height .'px !important; width: '.$tab_line[$j][$v]->taille_sur_etagere.'px !important" src="/'.$tab_line[$j][$v]->image.'"  alt="" onclick="showRecapProduitMarchandTV('.$tab_line[$j][$v]->id.')" width="'.$tab_line[$j][$v]->taille_sur_etagere.'px"><span id="effect-layer'.$tab_line[$j][$v]->id.'" class="product-effect-layer effect-none" style="font-size: 12px; position: absolute; width: '.$tab_line[$j][$v]->taille_sur_etagere.'px; "><span class="cap-cover"></span>
    // </div>';
    $div_slide_element .= '<div onclick="showClickEffect('.$tab_line[$j][$v]->id.')" onmouseover="showEffect('.$tab_line[$j][$v]->id.')" id="addSlide-user'.$tab_line[$j][$v]->id.'" class="slide case-produit-btnd" style="height: '.$phone_height.'px !important;" onmouseleave="showEffectRemove('.$tab_line[$j][$v]->id.')">
    <img id="image-prod-id'.$tab_line[$j][$v]->id.'" class="image-prod" style="height: 100% !important; width: auto !important" src="/'.$tab_line[$j][$v]->image.'"  alt="" onclick="showRecapProduitMarchandTV('.$tab_line[$j][$v]->id.')" width="'.$tab_line[$j][$v]->taille_sur_etagere.'px"><span id="effect-layer'.$tab_line[$j][$v]->id.'" class="product-effect-layer effect-none" style="height: '.$phone_height.'px !important; width: '.$tab_line[$j][$v]->taille_sur_etagere.'px "></span>
    </div>';

    }

    $div_slide_element .= '</div>';
    }

    $div_slide_element .= '</div>';
    }

    echo $div_slide_element;

    @endphp
    </div></div>
    @endif

    <div class="rayon-btn-direction-legume next-div-btn my-slick-btn-2" onclick="tm_carousel_next1()" style="border-radius: 50% 0px 0px 50%; ">
        <button class="btn-direction-faux btn-right-small" style="background: transparent">
            <img class="img-direction-btnd" src="{{ asset('assets/images2/Next.svg') }}" alt="">
        </button>
    </div>

    <div class="rayon-btn-direction-etat-panier next-div-btn my-slick-btn-2-12" style="z-index: 11000;" onclick="document.getElementById('voir_panier').click()">

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

    <script>
        Echo.private('negociation.<?php echo $user_id1 ;?>')
            .listen('RealtimeNegociation', (e) => {
                let received_msg = '<div class="negociation-marchand-response" style="width: 282px; margin-top: 27.47px; margin-left: 20px;"><div style="height: 18px;color: #8D97A5;font-family: Roboto;font-size: 12px;font-weight: 500;letter-spacing: 0.5px;line-height: 18px;text-align: right;">11:08</div><div style="width: 282px;border-radius: 5px;background-color: #D8D8D8; display: flex;justify-content: center; align-items: center"><div class="retour-marchand-zone" style="width: 265px;color: #51606D;font-family: Roboto;font-size: 14px;font-weight: 500;letter-spacing: 0;line-height: 20px; padding: 10px">'+e.message+'</div></div></div>'
                $('#userNegociationZoneElement').append(received_msg)
        });
    </script>
    <script>

function getURLParameter(name) {
    return decodeURIComponent((new RegExp('[?|&]' + name + '=' + '([^&;]+?)(&|#|;|$)').exec(location.search) || [null, ''])[1].replace(/\+/g, '%20')) || null;
}

let product_instance = [];
$('#numeroCarte-inviter').mask('0000 0000 0000 0000');
$('#numeroCcv').mask('000');

var main_carousel_document = document.querySelector('.main-carousel-section-changed-user')

window.onload = (event) => {

    var searched_product_id = getURLParameter('idp');
    console.log('Your ID is', searched_product_id)

    $.ajax({

    type: 'GET',
    url: '/get_searched_product_cat/'+searched_product_id,
    data: {},
    success: function(response) {
        console.log('la reponse en bien', response)
    // $('.main-carousel-section-changed-user').empty()

    const chunk = (arr, size) =>

    Array.from({ length: Math.ceil(arr.length / size) }, (v, i) =>
        arr.slice(i * size, i * size + size)
    );

    var new_array = response.famille_produit
    console.log('Retour recherche =>', new_array.flat(1))
    var final_data = new_array.flat(1)

    if (response.rayon_id == 27) {
    $('#rayon-produit-section-'+response.rayon_id).empty()
    let tableau_slides = chunk(final_data, 40)
    var etagere_slides = [];
    tableau_slides.forEach((element, index) => {

    etagere_slides += '<div class="custom-carousel-page-user" style="position: relative; top: -45px; " id="slide-p-user'+index+'" data-index = "'+index+'" >'

    var line_slide = chunk(element, 8)

    line_slide.forEach((div_row, div_index) => {
    etagere_slides += '<div class="row_div-user-telephonie" >'
    div_row.forEach((slide_el, index) => {

    var phone_height = 0;
    if (slide_el.taille_sur_etagere == 43) {
        phone_height = 58;
    }else if(slide_el.taille_sur_etagere == 50) {
        phone_height = 68;
    }else if (slide_el.taille_sur_etagere == 57) {
        phone_height = 78;
    }else {
        phone_height = 43;
    }

    etagere_slides += '<div id="addSlide-user'+slide_el.id+'" onclick="showClickEffect('+slide_el.id+')" class="slide case-produit-btnd" onmouseover="showEffect('+slide_el.id+')" style="height: '+phone_height+'px !important;" onmouseleave="showEffectRemove('+slide_el.id+')">'
    etagere_slides += '<img id="image-prod-id'+slide_el.id+'" onclick="showRecapProduitMarchandTV('+slide_el.id+')" class="image-prod" src= "/'+slide_el.image+'" width="'+slide_el.taille_sur_etagere+'px">'

    etagere_slides += '<span id="effect-layer'+slide_el.id+'" class="product-effect-layer effect-none" style="font-size: 12px; position: absolute; width: '+slide_el.taille_sur_etagere+'px; color: #fff;"><span class="cap-cover">'+slide_el.capacite+'</span></span>'

    etagere_slides += '</span>'
    etagere_slides += '</div>'

    })
    etagere_slides += '</div>'

    })

    etagere_slides += '</div>'

    })

    console.log('data ready to display', etagere_slides)

    $('#rayon-produit-section-'+response.rayon_id).append(etagere_slides)
    $('#image-prod-id'+searched_product_id).addClass('produit-show-effect')

 } else if(response.rayon_id == 25) {
    let tableau_slides = chunk(final_data, 12)
    var etagere_slides = [];
    tableau_slides.forEach((element, index) => {

    etagere_slides += '<div class="custom-carousel-page-user" id="slide-p-user'+index+'" data-index = "'+index+'" >'

    var line_slide = chunk(element, 4)

    line_slide.forEach((div_row, div_index) => {
    etagere_slides += '<div class="row_div-user" >'
    div_row.forEach((slide_el, index) => {

    etagere_slides += '<div id="addSlide-user'+slide_el.id+'" onclick="showClickEffect('+slide_el.id+')" class="slide case-produit-btnd" onmouseover="showEffect('+slide_el.id+')" style="height: 155px !important;" onmouseleave="showEffectRemove('+slide_el.id+')">'
    etagere_slides += '<img id="image-prod-id'+slide_el.id+'" onclick="showRecapProduitMarchandTV('+slide_el.id+')" class="image-prod" src= "/'+slide_el.image+'" width="'+slide_el.taille_sur_etagere+'px">'
    etagere_slides += '<span id="effect-layer'+slide_el.id+'" class="product-effect-layer effect-none" style="font-size: 12px; position: absolute; width: '+slide_el.taille_sur_etagere+'px; "><span class="cap-cover"></span>'

        etagere_slides += '</span>'
        etagere_slides += '</div>'

    })
        etagere_slides += '</div>'
    })

    etagere_slides += '</div>'

    })

    $('#rayon-produit-section-'+response.rayon_id).append(etagere_slides)
    $('#image-prod-id'+searched_product_id).addClass('produit-show-effect')

 }else if (response.rayon_id == 26) {
    $('#rayon-produit-section-'+response.rayon_id).empty()
    let tableau_slides = chunk(final_data, 40)
    var etagere_slides = [];
    tableau_slides.forEach((element, index) => {

    etagere_slides += '<div class="custom-carousel-page-user" style="position: relative; top: -45px; " id="slide-p-user'+index+'" data-index = "'+index+'" >'

    var line_slide = chunk(element, 8)

    line_slide.forEach((div_row, div_index) => {
    etagere_slides += '<div class="row_div-user-telephonie" >'
    div_row.forEach((slide_el, index) => {

    var phone_height = 0;
    if (slide_el.taille_sur_etagere == 43) {
        phone_height = 58;
    }else if(slide_el.taille_sur_etagere == 50) {
        phone_height = 68;
    }else if (slide_el.taille_sur_etagere == 57) {
        phone_height = 78;
    }else {
        phone_height = 43;
    }

    etagere_slides += '<div id="addSlide-user'+slide_el.id+'" onclick="showClickEffect('+slide_el.id+')" class="slide case-produit-btnd" onmouseover="showEffect('+slide_el.id+')" style="height: '+phone_height+'px !important;" onmouseleave="showEffectRemove('+slide_el.id+')">'
    etagere_slides += '<img id="image-prod-id'+slide_el.id+'" onclick="showRecapProduitMarchandTV('+slide_el.id+')" class="image-prod" src= "/'+slide_el.image+'" width="'+slide_el.taille_sur_etagere+'px">'

    etagere_slides += '<span id="effect-layer'+slide_el.id+'" class="product-effect-layer effect-none" style="font-size: 12px; position: absolute; width: '+slide_el.taille_sur_etagere+'px; color: #fff;"><span class="cap-cover"></span></span>'

    etagere_slides += '</span>'
    etagere_slides += '</div>'

    })
    etagere_slides += '</div>'

    })

    etagere_slides += '</div>'

    })

    console.log('data ready to display', etagere_slides)

    $('#rayon-produit-section-'+response.rayon_id).append(etagere_slides)
    $('#image-prod-id'+searched_product_id).addClass('produit-show-effect')
 }

        }
    })

};

jQuery(document).ready(function () {
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
    } )

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

    var searched_product_id = getURLParameter('idp');

    // var etagere_current_slide_bis = document.getElementById('slide-p-user0')
    // var children_div = etagere_current_slide_bis.getElementsByClassName('.row_div-user-telephonie')
    // var all_slide = $(etagere_current_slide_bis).find('.slide')

    // var searched_product = $('#addSlide-user'+searched_product_id)
    // var save_search_p = searched_product
    // var product_img = $('#image-prod-id'+searched_product_id)

    // var next_element = $(searched_product).next()

    // console.log('La valeur suivant est:', next_element)

    // console.log('L ensemble des éléments est:', all_slide.index(searched_product))

    // var first_element = all_slide[0]
    // $(all_slide[0]).replaceWith(searched_product)
    // $(first_element).insertBefore(next_element)

    // $(product_img).addClass('produit-show-effect')

    })

    window.addEventListener('load', function () {
        jQuery(document).ready(function () {
            $('.sous-categorie-title p, .parametre-icon, .filter-icon, .my-slick-btn').slideDown(100);
        })
    })

    function getId(id){
    $('#modification').hide()
    $('#Ajouter_new').show()
    let zone_petite_image = $('.tm_produit_petit_img_user')
    $(zone_petite_image[0]).addClass('tm_active_img_product')
    for (let h = 1; h < zone_petite_image.length; h++) {
        $(zone_petite_image[h]).removeClass('tm_active_img_product')
    }

    let init_peti_cadre = $('.petit-cadre')

    for (let g = 1; g < 5; g++) {
        $(init_peti_cadre[g]).removeClass('set-white-bg')
        $(init_peti_cadre[g]).addClass('set-gray-bg')
    }

    if (!$('.tm_show_p_product-client').hasClass('s-none-client')) {
        $('.tm_show_p_product-client').addClass('s-none-client')
        $('#image_principal').removeClass('s-none-client')
    }

    $.ajax({
    method: 'GET',
    url: '/show_detail_produit/'+id,
    data: {},
    headers: {},
    success: function(response){

    console.log('response is:', response)
    $('.article-title').text(response['Detail_Produit'][0][0]['libelle'])
    $('#prix_total').text(response['Detail_Produit'][0][0]['prix']+'Fcfa')
    $('#current_price').val(response['Detail_Produit'][0][0]['prix'])
    $('#description_marchand_zone1').text(response['Detail_Produit'][0][0]['description'])
    $('#image_principal').attr('src', '/storage/images/produits/'+response['Detail_Produit'][0][0]['image'])
    $('#image_principal1').attr('src', '/storage/images/produits/'+response['Detail_Produit'][0][0]['image'])
    $("#quantite").val(1)

    // click de l'image principal
    $('#image_principal1').bind('click', function(v) {
        showImagePrevievClient('storage/images/produits/'+response['Detail_Produit'][0][0]['image'], 0)
    })

    // chargement de l'instance produit
    product_instance = response;

    $('.gros-cadre-user').addClass('set-white-color')
    // $('#quantite_marchand').val(response['Detail_Produit'][0][0]['quantite'])
    $('#reference_produit_client').text(response['Detail_Produit'][0][0]['ref_produit'])

    if (response['Detail_Produit'][0][0]['video_preview'] != null) {
        $('.tm_vid_icon').empty();
        const img_icon = '<img class="img-card-petit-p" style="height: 50%; width: 50%" src="/assets/images/1497554804-social-media04_84871.svg" alt="" id="image_autreMarchand4d" >'
        $('.tm_vid_icon').append(img_icon)
        $('.tm_vid_icon').bind('click', function(){
            productVideoPreviewClient(response['Detail_Produit'][0][0]['video_preview'], 5)
        })
        $('.tm_vid_icon').removeClass('set-gray-bg')
        $('.tm_vid_icon').addClass('set-white-bg')
    }else{
        $image = $('#image_autreMarchand4d')
        $('.tm_vid_icon').empty();
        $('.tm_vid_icon').removeClass('set-white-bg')
        $('.tm_vid_icon').addClass('set-gray-bg')
    }

    if (response['Detail_Produit'][1].length > 0) {
        $('#produit-univer-user').text(response['Detail_Produit'][1][0]['libelle'])
    }

    let a_index = 0;
    for (let caracteristique_item in response['Detail_Produit'][14] ) {
        $('#carac_produit'+a_index).empty()
        $('#carac_produit'+a_index).append('<option>'+response['Detail_Produit'][14][caracteristique_item]+'</option>')
        $('#carac_produit-Label'+a_index).text(caracteristique_item)
        a_index++
    }

    if (response['Detail_Produit'][13].length > 0) {
        $('#produit-rayon-user').text(response['Detail_Produit'][13][0]['libelle'])
        $.ajax({
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
            // $('#payement-marchand-preview').text(response['cardInfo'][0]['type_carte'])
        }
    })
    }

    // $('.gros-cadre').addClass('set-white-bg')
    for (i = 1; i < 6; ++i) {
        $('#image_autre'+i).hide()
    }

    // for (let v = 0; v < response['Detail_Produit'][5].length; v++) {
    for (i = 0; i < response['Detail_Produit'][5].length; ++i) {
        let incr_index = i + 1;
        $('#image_autre'+incr_index).attr('src', '/storage/images/produits/'+response['Detail_Produit'][5][i]["image"])
        let img_element = 'storage/images/produits/'+response['Detail_Produit'][5][i]["image"]
        $('#image_autre'+incr_index).bind('click', function(v) {
            showImagePrevievClient(img_element, incr_index)
        })
        let index_increment = i + 1;
        $(init_peti_cadre[index_increment]).removeClass('set-gray-bg')
        $(init_peti_cadre[index_increment]).addClass('set-white-bg')
        $('#image_autre'+incr_index).show()
    }
  }
})

    // $('#recapProduitMarchand').modal('show')
    $('#myModal').modal('show')

}

function voir_profile() {
    console.log('Got me here please')
    // $('#userProfilModal').modal('show')
    console.log($('#userProfilModal'))
    $('#userProfilModal').modal('show')
}

// preview image for client
function showImagePrevievClient(image, index_div) {
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
    console.log('Voici son index div est à:', index_div)
}

// video preview
function productVideoPreviewClient(video, index_div) {
    $('.gros-cadre').css({"padding-left": '0px', 'padding-right': '0px'})
    $('#image_principal').addClass('s-none-client')
    $('#marchand_video_preview_big_client').removeClass('img-card-long')
    $('#image_principal').removeClass('img-card-long')
    $('.tm_show_p_product-client').removeClass('s-none-client')
    $('#marchand_video_preview_big_client').attr('src', video)
    $('#marchand_video_preview_big_client').css('height', "397px")
    $('#marchand_video_preview_big_client').css('position', "relative")
    $('#marchand_video_preview_big_client').css('top', "4px")

    let zone_petite_image = $('.tm_produit_petit_img_user')
    for (let h = 0; h < zone_petite_image.length; h++) {
    $(zone_petite_image[h]).removeClass('tm_active_img_product')
    }

    $(zone_petite_image[index_div]).addClass('tm_active_img_product')

}

function showRecapProduitMarchandTV(id) {

    $('#id_produit').val(id)

    $('#modification').hide()
    $('#Ajouter_new').show()

    let zone_petite_image = $('.tm_produit_petit_img_user')
    $(zone_petite_image[0]).addClass('tm_active_img_product')

    for (let h = 1; h < zone_petite_image.length; h++) {
        $(zone_petite_image[h]).removeClass('tm_active_img_product')
    }

    let init_peti_cadre = $('.petit-cadre')

    for (let g = 1; g < 5; g++) {
        $(init_peti_cadre[g]).removeClass('set-white-bg')
        $(init_peti_cadre[g]).addClass('set-gray-bg')
    }

    if (!$('.tm_show_p_product-client').hasClass('s-none-client')) {
        $('.tm_show_p_product-client').addClass('s-none-client')
        $('#image_principal').removeClass('s-none-client')
    }

    $.ajax({

    method: 'GET',
    url: '/show_detail_produit/'+id,
    data: {},
    headers: {},
    success: function(response){

    console.log('response is:', response)
    console.log('Le prix de l\'article est: ', response['Detail_Produit'][0][0]['prix'])
    var prix_article = response['Detail_Produit'][0][0]['prix'];
    console.log('Le prix converti est:', prix_article.toLocaleString())
    var prix_tag = '<sup style="position: relative; left: 5px">Fcfa</sup>'

    $('.article-title').text(response['Detail_Produit'][0][0]['libelle'])
    $('#prix_total').text(prix_article.toLocaleString())
    $('#prix_total').append(prix_tag)
    $('#current_price').val(response['Detail_Produit'][0][0]['prix'])
    $('#description_marchand_zone1').text(response['Detail_Produit'][0][0]['description'])
    $('#image_principal').attr('src', '/'+response['Detail_Produit'][0][0]['image'])
    $('#image_principal1').attr('src', '/'+response['Detail_Produit'][0][0]['image'])
    $("#quantite").val(1)

    // click de l'image principal
    $('#image_principal1').bind('click', function(v) {
        showImagePrevievClient(response['Detail_Produit'][0][0]['image'], 0)
    })

    // calucl de la taille et affectation des nouvelle propriétés
    let img_p = new Image();

    img_p.onload = function() {
    if (img_p.height > img_p.width) {
        console.log('La taille de la', img_p.height, 'la width', img_p.width)
        console.log('La longueur est supperieur à la largeur')
        $('.img-card').addClass('img-card-long')
        $('.img-card-petit').addClass('img-card-petit-long')
        $('.gros-cadre-user').addClass('gros-cadre-user-long')
    }else {
        console.log('La taille de la', img_p.height, 'la width', img_p.width)
        $('.img-card').removeClass('img-card-long')
        $('.img-card-petit').removeClass('img-card-petit-long')
        $('.gros-cadre-user').removeClass('gros-cadre-user-long')
    }
    };

    img_p.src = '/'+response['Detail_Produit'][0][0]["image"];

    // chargement de l'instance produit
    product_instance = response;

    $('.gros-cadre-user').addClass('set-white-color')
    // $('#quantite_marchand').val(response['Detail_Produit'][0][0]['quantite'])
    $('#reference_produit_client').text(response['Detail_Produit'][0][0]['ref_produit'])

    if (response['Detail_Produit'][0][0]['video_preview'] != null) {
        $('.tm_vid_icon').empty();
        const img_icon = '<img class="img-card-petit-p" style="height: 50%; width: 50%" src="/assets/images/1497554804-social-media04_84871.svg" alt="" id="image_autreMarchand4d" >'
        $('.tm_vid_icon').append(img_icon)
        $('.tm_vid_icon').bind('click', function(){
            productVideoPreviewClient(response['Detail_Produit'][0][0]['video_preview'], 5)
        })
        $('.tm_vid_icon').removeClass('set-gray-bg')
        $('.tm_vid_icon').addClass('set-white-bg')
    }else{
        $image = $('#image_autreMarchand4d')
        $('.tm_vid_icon').empty();
        $('.tm_vid_icon').removeClass('set-white-bg')
        $('.tm_vid_icon').addClass('set-gray-bg')
    }

    if (response['Detail_Produit'][1].length > 0) {
        $('#produit-univer-user').text(response['Detail_Produit'][1][0]['libelle'])
    }

    let a_index = 0;
    for (let caracteristique_item in response['Detail_Produit'][14] ) {
        $('#carac_produit'+a_index).empty()
        $('#carac_produit'+a_index).append('<option>'+response['Detail_Produit'][14][caracteristique_item]+'</option>')
        $('#carac_produit-Label'+a_index).text(caracteristique_item)
        a_index++
    }

    if (response['Detail_Produit'][13].length > 0) {
        $('#produit-rayon-user').text(response['Detail_Produit'][13][0]['libelle'])
        $.ajax({
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
            // $('#payement-marchand-preview').text(response['cardInfo'][0]['type_carte'])
        }
    })
    }

    for (i = 1; i < 6; ++i) {
        $('#image_autre'+i).hide()
    }

    for (i = 0; i < response['Detail_Produit'][5].length; ++i) {

    let incr_index = i + 1;
    var image_for_size_calculation = response['Detail_Produit'][5][i]["image"]

    let img = new Image();
    img.onload = function() {
    console.log(img.width, img.height)
    if (img.height > img.width) {
        $('#image_autre'+incr_index).closest('petit-cadre').addClass('img-card-long')
        $('#image_autre'+incr_index).addClass('img-card-petit-long')
    }else {
        $('#image_autre'+incr_index).closest('petit-cadre').removeClass('img-card-long')
        $('#image_autre'+incr_index).removeClass('img-card-petit-long')
    }
    };
    img.src = '/'+response['Detail_Produit'][5][i]["image"];

    $('#image_autre'+incr_index).attr('src', '/'+response['Detail_Produit'][5][i]["image"])
    let img_element = response['Detail_Produit'][5][i]["image"]
    $('#image_autre'+incr_index).bind('click', function(v) {
        showImagePrevievClient(img_element, incr_index)
    })
    let index_increment = i + 1;
    $(init_peti_cadre[index_increment]).removeClass('set-gray-bg')
    $(init_peti_cadre[index_increment]).addClass('set-white-bg')
    $('#image_autre'+incr_index).show()
    }

    $('#produit_partenaire_counter').text(response['Detail_Produit'][15].length)
    }

})

showClickEffectBis(id)
    setTimeout(function() {
    $('#myModal').modal('show')
    }, 10)
}


// ---------------------------------- sharing section --------------------------------
let current_url_to_share = window.location.href;
$('#share-produit-whatapp').on('click', function() {
    let product_id = $('#id_produit').val()
    window.open('https://wa.me/?text='+current_url_to_share+'/?id='+product_id, '_blank');
})


$('#share-produit-twiter').on('click', function() {
    let product_id = $('#id_produit').val()
    window.open('http://twitter.com/share?text=Votre boutique here&url='+current_url_to_share+'/?id='+product_id, '_blank');
})

$('#share-produit-mail').on('click', function() {
    let product_id = $('#id_produit').val()
    window.location.href = 'mailto:chrismedmadzou@gmail.com?subject=Subject&body='+current_url_to_share+'/?id='+product_id;
})

$('#share-produit-copie-coller').on('click', function() {
    var copyText = document.getElementById("link-to-share-product");
    console.log('Text to copy is ', copyText)
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

// ---------------------------------- sharing section --------------------------------

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

function showSocialShare() {
    let current_url_to_share = window.location.href;
    let product_id = $('#id_produit').val()
    let final_product_link = current_url_to_share+'/?id='+product_id
    console.log('Link is:', final_product_link)
    $('#link-to-share-product').val(final_product_link);
    $('#produitSocialShareModal').modal('show')
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

function showClickEffectBis(id) {

}

function sortByFamille(id) {

    curSlide1 = 0;
    $('.rayon-nav-univers-dropdown').removeClass('rayon-nav-univers-dropdown-activated')
    $('#flle-item-'+id).addClass('rayon-nav-univers-dropdown-activated')
    $.ajax({
    type: 'GET',
    url: '/products_by_categorie',
    data: {id_categorie: id},
    success: function(response) {

    $('.slider-content-wrapper-user').empty();
    const chunk = (arr, size) =>

    Array.from({ length: Math.ceil(arr.length / size) }, (v, i) =>
        arr.slice(i * size, i * size + size)
    );

    if (response.length > 0 ) {
    if (response[0].id_rayon == 25) {
    let tableau_slides = chunk(response, 12)
    var etagere_slides = [];
    tableau_slides.forEach((element, index) => {

    etagere_slides += '<div class="custom-carousel-page-user" id="slide-p-user'+index+'" data-index = "'+index+'" >'

    var line_slide = chunk(element, 4)

    line_slide.forEach((div_row, div_index) => {
    etagere_slides += '<div class="row_div-user" >'
    div_row.forEach((slide_el, index) => {

    etagere_slides += '<div id="addSlide-user'+slide_el.id+'" onclick="showClickEffect('+slide_el.id+')" class="slide case-produit-btnd" onmouseover="showEffect('+slide_el.id+')" style="height: 155px !important;" onmouseleave="showEffectRemove('+slide_el.id+')">'
    etagere_slides += '<img id="image-prod-id'+slide_el.id+'" onclick="showRecapProduitMarchandTV('+slide_el.id+')" class="image-prod" src= "/'+slide_el.image+'" width="'+slide_el.taille_sur_etagere+'px">'
    etagere_slides += '<span id="effect-layer'+slide_el.id+'" class="product-effect-layer effect-none" style="font-size: 12px; position: absolute; width: '+slide_el.taille_sur_etagere+'px; "><span class="cap-cover"></span>'

        etagere_slides += '</span>'
        etagere_slides += '</div>'

    })
        etagere_slides += '</div>'
    })

    etagere_slides += '</div>'

    })

    }else if (response[0].id_rayon == 27) {
    let tableau_slides = chunk(response, 40)
    var etagere_slides = [];
    tableau_slides.forEach((element, index) => {

    etagere_slides += '<div class="custom-carousel-page-user" style="position: relative; top: -45px" id="slide-p-user'+index+'" data-index = "'+index+'" >'

    var line_slide = chunk(element, 8)

    line_slide.forEach((div_row, div_index) => {
    etagere_slides += '<div class="row_div-user-telephonie" >'
    div_row.forEach((slide_el, index) => {

    var phone_height = 0;
    if (slide_el.taille_sur_etagere == 43) {
        phone_height = 58;
    }else if(slide_el.taille_sur_etagere == 50) {
        phone_height = 68;
    }else if (slide_el.taille_sur_etagere == 57) {
        phone_height = 78;
    }else {
        phone_height = 43;
    }

    etagere_slides += '<div id="addSlide-user'+slide_el.id+'" onclick="showClickEffect('+slide_el.id+')" class="slide case-produit-btnd" onmouseover="showEffect('+slide_el.id+')" style="height: '+phone_height+'px !important;" onmouseleave="showEffectRemove('+slide_el.id+')">'
    etagere_slides += '<img id="image-prod-id'+slide_el.id+'" onclick="showRecapProduitMarchandTV('+slide_el.id+')" class="image-prod" src= "/'+slide_el.image+'" width="'+slide_el.taille_sur_etagere+'px">'

    etagere_slides += '<span id="effect-layer'+slide_el.id+'" class="product-effect-layer effect-none" style="font-size: 12px; position: absolute; width: '+slide_el.taille_sur_etagere+'px; color: #fff;"><span class="cap-cover">'+slide_el.capacite+'</span></span>'

    etagere_slides += '</span>'
    etagere_slides += '</div>'

    })
    etagere_slides += '</div>'

    })

    etagere_slides += '</div>'

    })
    }
    }

    if (response.length > 0) {
        $('#rayon-produit-section-'+response[0].id_rayon).append(etagere_slides)
    }

    }
    })

    }

    </script>

@endsection
