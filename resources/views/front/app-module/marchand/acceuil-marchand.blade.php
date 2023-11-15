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
    }
    else{
        $maLangue = [];
        $maVille = [];
        $maProvince = [];
        $maDevise = [];
    }

    $maPosition = $_SESSION['config']['ma-position'];
    $user_id = \Illuminate\Support\Facades\Auth::user()->id;
    $default_rayon = [];

    $rayon_active = DB::table('boutique_rayons')
        ->join('rayons', 'rayons.id', '=', 'boutique_rayons.rayon_id')
        ->select('rayons.*')
        ->where('boutique_rayons.boutique_id', '=', $_SESSION['boutique_marchand_id'])
        ->where('boutique_rayons.status', 1)
        ->get();

    if (count($rayon_active) > 0) {
        $default_rayon = $rayon_active[0];
    }else {
        $boutique_univers_infos = DB::table('boutique_rayons')
        ->join('rayons', 'rayons.id', '=', 'boutique_rayons.rayon_id')
        ->select('rayons.*')
        ->where('boutique_rayons.boutique_id', '=', $_SESSION['boutique_marchand_id'])
        ->get();

        $default_rayon = $boutique_univers_infos[0];
    }

$produit_tableau = [];

$produit_rayons = DB::table('produits')
->join('images_etageres', 'produits.image_etagere', '=', 'images_etageres.id')
->where('boutique_id', $_SESSION['boutique_marchand_id'])
->where('id_rayon', $default_rayon->id)
->where('deleted', 0)
->select('produits.*', 'images_etageres.path')
->get();

$tab_p = [];
$tab_taille = [];
$positions_etageres = [];
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
    $tab_p[] = $produit->image;
    $tab_taille[] = $produit->taille_ecran;
    $positions_etageres[] = $produit->position_sur_etagere;
    // $produit->caracteristique_supp = $caracteristique_supp;
}

$arry = array_chunk($tab_p, 15); // images produit coupé en 15
$arry_taille = array_chunk($tab_taille, 15); // taille pour les écrans
$position_etagere = array_chunk($positions_etageres, 15);

// -------------------------------get rayons sliders----------------------------
$slides_data = [];
$rayons_slides =
    DB::table('produits')
    ->where('numero_slide', '!=', NULL)
    ->where('id_rayon', $default_rayon->id)
    ->where('boutique_id', $_SESSION['boutique_marchand_id'])
    ->groupBy('numero_slide')
    ->orderBy('numero_slide', 'DESC')
    ->get();

foreach ($rayons_slides as $slide) {
    $num_slide = $slide->numero_slide;
    $slide_lignes =
    DB::table('produits')
    ->where('numero_slide', $slide->numero_slide)
    ->select('numero_ligne_slide')
    ->groupBy('numero_ligne_slide')
    ->orderBy('numero_ligne_slide', 'asc')
    ->get();

    $tab_produit = [];
    foreach ($slide_lignes as $ligne) {

    $ligne_produit = DB::table('produits')
    ->where('numero_ligne_slide', $ligne->numero_ligne_slide)
    ->where('numero_slide', $num_slide)
    ->where('boutique_id', $_SESSION['boutique_marchand_id'])
    ->where('id_rayon', $default_rayon->id)
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
<style>
.main-carousel-section-changed {
    background-color: transparent;
    width: 1100px;
    height: 500px;
    position: relative;
    margin-left: auto;
    margin-right: auto;
    margin-top: 28px;
    overflow: hidden;
    left: 30px;
}

.slide {
    font-size: 50px;
    text-align: center;
    margin-bottom: 15px;
    margin-right: 40px;
}

.custom-puce-danger {
    position: absolute;
    border:none !important;
    margin-top: 0px;
    margin-left: 7px;
    animation: pulse-dot 1.25s cubic-bezier(0.215, 0.61, 0.355, 1) infinite;
}

.custom-carousel-page {
        /* hdisplay: flex; */
        width: 1100px !important;
        /* flex-wrap: wrap; */
        transition: transform 0.5s ease-in-out;
        /* top: -10px !important; */
    }

.custom-carousel-page:not(:first-child) {
    /* background-color: #900; */
    padding-left: 45px;
}

.custom-carousel-page:first-child {
    position: relative;
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

.init-added-button-telephonie {
    height: 78px;
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

.init-added-button-informatique-tablette {
    height: 88px;
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

.row_div {
    width: 100%;
    height: 160px;
    display: flex;
    position: relative;
 }

 .row_div-telephonie {
    width: 100%;
    height: 78px;
    margin-bottom: 16px;
    display: flex;
    position: relative;
    /* margin-bottom: 20px; */
    /* top: 7px; */
    justify-content: space-around;
}

.row_div-informatique-tablette {
    width: 100%;
    height: 88px;
    margin-bottom: 10px;
    display: flex;
    position: relative;
    margin-bottom: 20px;
    top: 7px;
    justify-content: space-around;
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

.image-prod-option{
    /* margin: 0px !important;
    max-height: 157px; */
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
    /* left: -10px; */
    margin: 0px;
    padding: 0px
}

.prod-option-edit {
    position: relative;
    /* left: -20px; */
    margin: 0px;
    padding: 0px
}

.tm_product_options_container {
        width: 98px;
        height: 36px;
        position: absolute;
        background-color:#FBFBFB;
        padding-top: 2px;
        border-radius: 6px;
        align: center;
        display:none;
        margin-top: 5px;
        padding: 0px;
        padding-left: 5px;
        padding-right: 5px;
    }

.tm_product_options_container .image-prod-option {
    position: relative;
    top: 5px;
}

.slider-content-wrapper {
    display: flex;
    transition: transform 0.5s ease-in-out;
    transition-delay: 1s;
    /* padding-left: 20px; */
    position: relative;
    /* left: 50px; */
    width: auto;
}

.add-product-button {
    box-sizing: border-box;
    height: 71px;
    width: 71px;
    border: 1px solid #4A4A4A;
    border-radius: 6px;
    background-color: #FFFFFFs;
    display: flex;
    flex-direction: column;
    justify-content: center;
    align-items: center;
    position: absolute;
    margin-left: 13%;
    display: none;
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
.add-product-button {
    left: 15%;
    top: -10px;
}

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

</style>
<style>

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

</style>
<style>

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

/* style end  */

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
    /* margin-top: 40px; */
    /* background-color: #ccc; */
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

.default-setted {
    position: absolute;
    z-index: 100000;
}

@media only screen and (min-width : 1828px) {
    body {
        /* background-color: red !important; */
    }

    .add-product-button {
        margin-top: 30px !important
    }

    /* -------------------- zone responsive ----------------------  */
    #produit_section-carse1 {
        position: relative;
        margin-top: 112px !important;
    }

    /* #searchProduitBar {
        margin-left: 400px !important;
    } */

    /* suppose to be on great screen  */
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
    body{
    /* background-color: red !important; */
    }

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
    display: none !important;
    visibility: hidden
}
    .set-white-color {
    background-color: #fff;
}

.main-d {
    box-sizing: border-box;
    height: 41px;
    width: 75px;
    border: 1px solid #979797;
    border-radius: 6px;
    background-color: #F8F8F8;
    display: flex;
    align-items: center;
    justify-content: center;
    column-gap: 1px;
}

.d-input-container {
    height: 41px;
    width: 253px;
    position: relative;
    margin-left: auto;
    margin-right: auto;
    display: flex;
    align-items: center;
    justify-content: center;
    column-gap: 5px;
}

.input-dimension {
    height: 31px;
    width: 43px;
    border-radius: 6px;
    background-color: #FFFFFF;
    border: none;

    color: #4A4A4A;
    font-family: Roboto;
    font-size: 14px;
    letter-spacing: -0.34px;
    line-height: 16px;
    padding-left: 10px;
}

.input-dimension:focus {
    outline: none;
    border: none;
}

.main-d span {
    color: #191970;
    font-family: Roboto;
    font-size: 14px;
    letter-spacing: -0.34px;
    line-height: 16px;
}

.dimension-d {
    height: 14px;
    width: 126px;
    color: #191970;
    font-family: Roboto;
    font-size: 14px;
    font-weight: 500;
    letter-spacing: -0.34px;
    line-height: 14px;
}

.desable-default-rayon {
    opacity: 0.5;
    pointer-events: none;
}

.tm-rayon-par-defaut {
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

.tm-rayon-par-defaut:hover {
    cursor: pointer;
}

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
    border: 1px solid #1A7EF5 !important;
    /* border: 1px solid red !important; */
}

#link-to-share {
    position: relative;
    width: 336px;
    border: 0px;
    top: 5px;
    left: -20px;
}

#link-to-share:focus {
    border: none;
    outline: none;
}

.tooltip-boutique .tooltiptext {
    visibility: hidden;
    width: 77px;
    background-color: #555;
    color: #fff;
    text-align: center;
    border-radius: 6px;
    padding: 5px;
    position: absolute;
    z-index: 1;
    margin-left: 2px;
    margin-top: -111px;
    opacity: 0;
    transition: opacity 0.3s;
}

.tooltip-boutique .tooltiptext::after {
    content: "";
    position: absolute;
    top: 100%;
    left: 50%;
    margin-left: -5px;
    border-width: 5px;
    border-style: solid;
    border-color: #555 transparent transparent transparent;
}

.tooltip-boutique:hover .tooltiptext {
    visibility: visible;
    opacity: 1;
}

.field-none {
    display: none !important;
}

.btn-direction:hover .img-direction-btn {
    opacity: 1 !important;
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

.next-custom:hover .img-direction-btnd {
    opacity: 1 !important;
}


</style>

@section('css-debut')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper/swiper-bundle.min.css" />
@endsection

@section('search-bar')
<div class="rayon-bloc-recherche">

    <div class="formRayonSearch_input my-form-field br-l input-recherche" style="width: inherit; z-index: 12" tabindex="0">
        <input  placeholder="Commencez votre recherche..." type="text" class=""  name="formRayonSearch_text" id="formRayonSearch_text-input" style="height: 34px;">
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
@endsection

@section('zone-option-profil')
<div>
<div class="group2 main-header-icons" style="width: 70px;">

    <div class="icon-pays">
        <a href="javascript:;" data-toggle="modal" data-target="#modalLangueDevise">
            <img class="header-icon-home" style="height: 22px; width: 22px;border-radius: 50%;" src="{{ \App\Models\Pays::getImage2($maPosition['images']) }}" alt="">
        </a>
    </div>

    @auth
        <div class="icon-profil" id="toggle-profil-icon" onclick="toggleShowElement('#profil-box1')">
            <img class="header-icon-home" style="height: 22px; width: 22px; border-radius: 50%;" src="{{ \App\User::getImage() }}" alt="">
        </div>
    @endauth

</div>
</div>
@endsection


@section('contenu')
<div class="contenu-marchand-fake" style="background: url('storage/images/rayons/{{$default_rayon->grande_etagere }}') no-repeat; background-repeat: no-repeat; background-size: cover; background-position: center; position:absolute">

</div>

<div class="contenu-marchand" style="background: url('storage/images/rayons/{{$default_rayon->grande_etagere }}') no-repeat; background-repeat: no-repeat; background-size: cover; background-position: center;">

{{-- debut splite marchand menu  --}}
<div class="navbar-next" style="position: relative; top: 5px;">
    @include('front.app-module.marchand.marchand-annonce.marchand-menu-header')
</div>

<button class="add-product-button" style="margin-top: -10px;" onclick="showAddProduct()">
    <span class="add-product-icon">+</span>
    <span class="btn-add-product-title">NOUVEL ARTICLE</span>
</button>

<div class="rayon-btn-direction-legume-left  prev-div-btn prev-custom" onclick="tm_carousel_preview()">
    <button class="btn-left btn-direction" style="border-radius: 0px 50% 50% 0px">
        <img class="img-direction-btn" src="{{ asset('assets/images2/prec.svg') }}" alt="">
    </button>
</div>

@if($default_rayon->id  == 25)
<div class="main-carousel-section-changed" id="tm-main-slide-carousel" style="display: flex; padding-left: 50px">
    <div class="slider-content-wrapper" id="wrapper-tv-image-son">

    @php

    if (count($arry) == 0) {
        $init_page = '';
        $init_page .= '<div class="custom-carousel-page" id="slide-p-init">';
        $init_page .= '<div class="row_div">';
        $init_page .= '</div>';
        $init_page .= '<div class="row_div">';
        $init_page .= '</div>';
        $init_page .= '<div class="row_div">';
        $init_page .= '</div>';
        $init_page .= '</div>';
        echo $init_page;
    }else {
        $line_slider = [0, 1, 2];
        $case_etagere = [0, 1, 2, 3, 4];
        foreach ($slides_data as $key => $value) {
        $div_slide_element = '';
        $storage_row_line = [];
        $produit_sur_chaque_ligne = [];
        $produit_taille_sur_etagere = [];
        $produit_position_sur_ligne = [];
        $tableau_produits_id = [];
        $produit_max_size = []; // les tailles maximales d'une ligne
        $div_slide_element = '<div class="custom-carousel-page" id="slide-p'.$key.'" data-index = "'.$key.'">';
        $data_etagere_num = $key; // numero du slide sur l'étagère

        foreach ($value as $key1 => $rows) { // STAGE 2
        $tab_slide_row = [];
        foreach ($rows as $key2 => $row) { // STAGE 2
        $tab_slide_row[] = $key2;
        $tab_slide_image_position = []; // tableau indexé avec les positions
        foreach ($row as $key3 => $p) {
        foreach ($p as $key4 => $p1) {
            $produit_sur_chaque_ligne[$key2][$p1->position_sur_etagere] = $p1->image; //les images sur étagère
            $produit_taille_sur_etagere[$key2][$p1->position_sur_etagere] = $p1->taille_sur_etagere; // taille sur étagère
            $produit_position_sur_ligne[$key2][] = $p1->position_sur_etagere; // position sur étagère
            $tableau_produits_id[$key2][$p1->position_sur_etagere] = $p1->id; // ids des produits
        }
        }
        }

    // print_r( $tab_slide_image_position[$key2]) .'<br>';
        foreach ($line_slider as $default_key) {
        $key_row_slide = array_search($default_key, $tab_slide_row);
        if ($key_row_slide === FALSE) {
        $div_slide_element .= '<div class="row_div">';
        foreach ($case_etagere as $num_sur_etager) { // creation des cases vides
            $div_slide_element .= '<div id="addSlide'.$data_etagere_num.'-'.$default_key.'-'.$num_sur_etager.'" class="slide case-produit-btn class-default-added-btn slide-add-btn" data-index="d" style="height: 155px !important;" ><button class="add-product-button-etagere not-active-product-btn" style="position: absolute;" onclick="testCurentCase('.$data_etagere_num.','.$default_key.','.$num_sur_etager.')"><span class="add-product-icon">+</span></button></div>';
        }
        $div_slide_element .= '</div>';
        }else{

        $div_slide_element .= '<div class="row_div">';
        $tab_pos_line = [];
        $tab_p = [];
        $tab_p_taille = [];
        $tab_p_taille_max = [];
        $tab_p_ids = [];

        foreach ($produit_position_sur_ligne[$default_key] as  $p1) {
            $tab_pos_line[] = $p1;
        }

        foreach ($produit_sur_chaque_ligne[$default_key] as $index_p =>  $p) {
            $tab_p[$index_p] = $p;
        }

        foreach ($produit_taille_sur_etagere[$default_key] as $index_p =>  $p) {
            $tab_p_taille[$index_p] = $p;

            if ($p == 264) {
            $tab_p_taille_max[] = $p;
            }
        }

        foreach ($tableau_produits_id[$default_key] as $index_p =>  $p) {
            $tab_p_ids[$index_p] = $p;
        }
        // ------------------------------- counter of max size -------------------------
        $i = 0;

        $taille_produit =  count($tab_p_taille_max);

        foreach ($case_etagere as $num_sur_etager) {
        $keybis = array_search($num_sur_etager, $tab_pos_line);
        if ($keybis === FALSE &&  $taille_produit == 4) {

        }else if ($keybis === FALSE) {
            $div_slide_element .= '<div id="addSlide'.$data_etagere_num.'-'.$default_key.'-'.$num_sur_etager.'" class="slide case-produit-btn class-default-added-btn slide-add-btn" data-index="'.$num_sur_etager.'" style="height: 155px !important;" data-width="0"><button class="add-product-button-etagere not-active-product-btn" style="position: absolute;" onclick="testCurentCase('.$data_etagere_num.','.$default_key.','.$num_sur_etager.')"><span class="add-product-icon">+</span></button></div>';
        }else{
        $div_slide_element .= '<div id="addSlide'.$data_etagere_num.'-'.$default_key.'-'.$num_sur_etager.'" class="slide case-produit-btn" style="height: 155px !important; display: flex;  align-items: flex-end; width: '.$tab_p_taille[$num_sur_etager].' !important;" data-index="'.$num_sur_etager.'" data-width="'.$tab_p_taille[$num_sur_etager].'">
            <div style="display: flex; align-items: flex-start; justify-content:center" class="product-img-for-option">
            <span class="tm_product_options_container">

            <div style="height: 36px; width: 31px; " >
                <img class="image-prod-option prod-option-preview" onclick="showRecapProduitMarchand('.$tab_p_ids[$num_sur_etager].')" src="assets/images/tm_preview_product.svg" alt="">
            </div>
            <div style="height: 36px; width: 36px; ">
                <img class="image-prod-option prod-option-edit" onclick="editProduct('.$tab_p_ids[$num_sur_etager].')" src="assets/images/tm_edit-off.svg" alt="" >
            </div>
            <div style="height: 36px; width: 31px; ">
                <img class="image-prod-option prod-option-corbeil" onclick="deleteProductMarchand('.$tab_p_ids[$num_sur_etager].')" src="assets/images/Corbeille-grise-base.svg" alt="">
            </div>
            </span>
            <img class="image-prod" src="'.$tab_p[$num_sur_etager].'" alt="" height="auto" width="240px">
            </div>
        </div>';
        }
    }
        $div_slide_element .= '</div>';
        }
    }
    }

    $div_slide_element .= '</div>';
    echo $div_slide_element;
    }
        }
        @endphp
    </div>
</div>

@else

<div class="main-carousel-section">

    {{-- zone produit sauf image tv et son --}}
</div>

@endif


@if($default_rayon->id  == 28)
<div class="main-carousel-section-changed" id="tm-main-slide-carousel" style="display: flex; padding-left: 50px">
    <div class="slider-content-wrapper" id="wrapper-tv-image-son">

    @php

    if (count($arry) == 0) {
        $init_page = '';
        $init_page .= '<div class="custom-carousel-page" id="slide-p-init">';
        $init_page .= '<div class="row_div">';
        $init_page .= '</div>';
        $init_page .= '<div class="row_div">';
        $init_page .= '</div>';
        $init_page .= '<div class="row_div">';
        $init_page .= '</div>';
        $init_page .= '</div>';
        echo $init_page;
    }else {
        $line_slider = [0, 1, 2];
        $case_etagere = [0, 1, 2, 3, 4];
        foreach ($slides_data as $key => $value) {
        $div_slide_element = '';
        $storage_row_line = [];
        $produit_sur_chaque_ligne = [];
        $produit_taille_sur_etagere = [];
        $produit_position_sur_ligne = [];
        $tableau_produits_id = [];
        $produit_max_size = []; // les tailles maximales d'une ligne
        $div_slide_element = '<div class="custom-carousel-page" id="slide-p'.$key.'" data-index = "'.$key.'">';
        $data_etagere_num = $key; // numero du slide sur l'étagère

        foreach ($value as $key1 => $rows) { // STAGE 2
        $tab_slide_row = [];
        foreach ($rows as $key2 => $row) { // STAGE 2
        $tab_slide_row[] = $key2;
        $tab_slide_image_position = []; // tableau indexé avec les positions
        foreach ($row as $key3 => $p) {
        foreach ($p as $key4 => $p1) {
            $produit_sur_chaque_ligne[$key2][$p1->position_sur_etagere] = $p1->image; //les images sur étagère
            $produit_taille_sur_etagere[$key2][$p1->position_sur_etagere] = $p1->taille_sur_etagere; // taille sur étagère
            $produit_position_sur_ligne[$key2][] = $p1->position_sur_etagere; // position sur étagère
            $tableau_produits_id[$key2][$p1->position_sur_etagere] = $p1->id; // ids des produits
        }
        }
        }

    // print_r( $tab_slide_image_position[$key2]) .'<br>';
        foreach ($line_slider as $default_key) {
        $key_row_slide = array_search($default_key, $tab_slide_row);
        if ($key_row_slide === FALSE) {
        $div_slide_element .= '<div class="row_div">';
        foreach ($case_etagere as $num_sur_etager) { // creation des cases vides
            $div_slide_element .= '<div id="addSlide'.$data_etagere_num.'-'.$default_key.'-'.$num_sur_etager.'" class="slide case-produit-btn class-default-added-btn slide-add-btn" data-index="d" style="height: 155px !important;" ><button class="add-product-button-etagere not-active-product-btn" style="position: absolute;" onclick="testCurentCase('.$data_etagere_num.','.$default_key.','.$num_sur_etager.')"><span class="add-product-icon">+</span></button></div>';
        }
        $div_slide_element .= '</div>';
        }else{

        $div_slide_element .= '<div class="row_div">';
        $tab_pos_line = [];
        $tab_p = [];
        $tab_p_taille = [];
        $tab_p_taille_max = [];
        $tab_p_ids = [];

        foreach ($produit_position_sur_ligne[$default_key] as  $p1) {
            $tab_pos_line[] = $p1;
        }

        foreach ($produit_sur_chaque_ligne[$default_key] as $index_p =>  $p) {
            $tab_p[$index_p] = $p;
        }

        foreach ($produit_taille_sur_etagere[$default_key] as $index_p =>  $p) {
            $tab_p_taille[$index_p] = $p;

            if ($p == 264) {
            $tab_p_taille_max[] = $p;
            }
        }

        foreach ($tableau_produits_id[$default_key] as $index_p =>  $p) {
            $tab_p_ids[$index_p] = $p;
        }
        // ------------------------------- counter of max size -------------------------
        $i = 0;

        $taille_produit =  count($tab_p_taille_max);

        foreach ($case_etagere as $num_sur_etager) {
        $keybis = array_search($num_sur_etager, $tab_pos_line);
        if ($keybis === FALSE &&  $taille_produit == 4) {

        }else if ($keybis === FALSE) {
            $div_slide_element .= '<div id="addSlide'.$data_etagere_num.'-'.$default_key.'-'.$num_sur_etager.'" class="slide case-produit-btn class-default-added-btn slide-add-btn" data-index="'.$num_sur_etager.'" style="height: 155px !important;" data-width="0"><button class="add-product-button-etagere not-active-product-btn" style="position: absolute;" onclick="testCurentCase('.$data_etagere_num.','.$default_key.','.$num_sur_etager.')"><span class="add-product-icon">+</span></button></div>';
        }else{
        $div_slide_element .= '<div id="addSlide'.$data_etagere_num.'-'.$default_key.'-'.$num_sur_etager.'" class="slide case-produit-btn" style="height: 155px !important; display: flex;  align-items: flex-end; width: '.$tab_p_taille[$num_sur_etager].' !important;" data-index="'.$num_sur_etager.'" data-width="'.$tab_p_taille[$num_sur_etager].'">
            <div style="display: flex; align-items: flex-start; justify-content:center" class="product-img-for-option">
            <span class="tm_product_options_container">

            <div style="height: 36px; width: 31px; " >
                <img class="image-prod-option prod-option-preview" onclick="showRecapProduitMarchand('.$tab_p_ids[$num_sur_etager].')" src="assets/images/tm_preview_product.svg" alt="">
            </div>
            <div style="height: 36px; width: 36px; ">
                <img class="image-prod-option prod-option-edit" onclick="editProduct('.$tab_p_ids[$num_sur_etager].')" src="assets/images/tm_edit-off.svg" alt="" >
            </div>
            <div style="height: 36px; width: 31px; ">
                <img class="image-prod-option prod-option-corbeil" onclick="deleteProductMarchand('.$tab_p_ids[$num_sur_etager].')" src="assets/images/Corbeille-grise-base.svg" alt="">
            </div>
            </span>
            <img class="image-prod" src="'.$tab_p[$num_sur_etager].'" alt="" height="auto" width="240px">
            </div>
        </div>';
        }
    }
        $div_slide_element .= '</div>';
        }
    }
    }

    $div_slide_element .= '</div>';
    echo $div_slide_element;
    }
        }
        @endphp
    </div>
</div>

@else

<div class="main-carousel-section">

    {{-- zone produit sauf image tv et son --}}
</div>

@endif

@if($default_rayon->id  == 8)
<div class="main-carousel-section-changed" id="tm-main-slide-carouselF" style="display: flex; padding-left: 50px">
    <div class="slider-content-wrapper" style="top: 7px">
    @php

    if (count($arry) == 0) {
    $init_page = '';
    $init_page .= '<div class="custom-carousel-page" id="slide-p-init-telephonie">';
    $init_page .= '<div class="row_div-telephonie">';
    $init_page .= '</div>';
    $init_page .= '<div class="row_div-telephonie">';
    $init_page .= '</div>';
    $init_page .= '<div class="row_div-telephonie">';
    $init_page .= '</div>';
    $init_page .= '<div class="row_div-telephonie">';
    $init_page .= '</div>';
    $init_page .= '<div class="row_div-telephonie">';
    $init_page .= '</div>';
    $init_page .= '</div>';

    echo $init_page;

    }else {

    $line_slider = [0, 1, 2, 3, 4];
    $case_etagere = [0, 1, 2, 3, 4, 5];
    foreach ($slides_data as $key => $value) {
    $div_slide_element = '';
    $storage_row_line = [];
    $produit_sur_chaque_ligne = [];
    $produit_taille_sur_etagere = [];
    $produit_position_sur_ligne = [];
    $tableau_produits_id = [];
    $produit_max_size = []; // les tailles maximales d'une ligne
    $div_slide_element = '<div class="custom-carousel-page" id="slide-p'.$key.'" data-index = "'.$key.'">';
    $data_etagere_num = $key; // numero du slide sur l'étagère

    foreach ($value as $key1 => $rows) {
    $tab_slide_row = [];
    foreach ($rows as $key2 => $row) {
    $tab_slide_row[] = $key2;
    $tab_slide_image_position = []; // tableau indexé avec les positions

    foreach ($row as $key3 => $p) {
    foreach ($p as $key4 => $p1) {
        $produit_sur_chaque_ligne[$key2][$p1->position_sur_etagere] = $p1->image; //les images sur étagère
        $produit_taille_sur_etagere[$key2][$p1->position_sur_etagere] = $p1->taille_sur_etagere; // taille sur étagère
        $produit_position_sur_ligne[$key2][] = $p1->position_sur_etagere; // position sur étagère
        $tableau_produits_id[$key2][$p1->position_sur_etagere] = $p1->id; // ids des produits
    }
        }
    }

    // print_r( $tab_slide_image_position[$key2]) .'<br>';
    foreach ($line_slider as $default_key) {
    $key_row_slide = array_search($default_key, $tab_slide_row);
    if ($key_row_slide === FALSE) {
    $div_slide_element .= '<div class="row_div-telephonie">';
    foreach ($case_etagere as $num_sur_etager) { // creation des cases vides
    $div_slide_element .= '<div id="addSlide'.$data_etagere_num.'-'.$default_key.'-'.$num_sur_etager.'" class="slide case-produit-btn class-default-added-btn slide-add-btn" data-index="d" style="height: 78px !important;" ><button class="add-product-button-etagere not-active-product-btn" style="position: absolute;" onclick="testCurentCase('.$data_etagere_num.','.$default_key.','.$num_sur_etager.')"><span class="add-product-icon">+</span></button></div>';
        }
        $div_slide_element .= '</div>';
    }else{

    $div_slide_element .= '<div class="row_div-telephonie">';
    $tab_pos_line = [];
    $tab_p = [];
    $tab_p_taille = [];
    $tab_p_taille_max = [];
    $tab_p_ids = [];

    foreach ($produit_position_sur_ligne[$default_key] as  $p1) {
        $tab_pos_line[] = $p1;
    }

    foreach ($produit_sur_chaque_ligne[$default_key] as $index_p =>  $p) {
        $tab_p[$index_p] = $p;
    }

    foreach ($produit_taille_sur_etagere[$default_key] as $index_p =>  $p) {
        $tab_p_taille[$index_p] = $p;

        if ($p == 58) {
        $tab_p_taille_max[] = $p;
        }
    }

    foreach ($tableau_produits_id[$default_key] as $index_p =>  $p) {
        $tab_p_ids[$index_p] = $p;
    }
    // ------------------------------- counter of max size -------------------------
    $i = 0;

    $taille_produit =  count($tab_p_taille_max);

    foreach ($case_etagere as $num_sur_etager) {
    $keybis = array_search($num_sur_etager, $tab_pos_line);

    $phone_height = 78;

    if ($keybis === FALSE &&  $taille_produit == 4) {

    }else if ($keybis === FALSE) {
    $div_slide_element .= '<div id="addSlide'.$data_etagere_num.'-'.$default_key.'-'.$num_sur_etager.'" class="slide case-produit-btn class-default-added-btn slide-add-btn" data-index="'.$num_sur_etager.'" style="height: 78px !important;" data-width="0"><button class="add-product-button-etagere not-active-product-btn" style="position: absolute;" onclick="testCurentCase('.$data_etagere_num.','.$default_key.','.$num_sur_etager.')"><span class="add-product-icon">+</span></button></div>';
    }else{

    if ($tab_p_taille[$num_sur_etager] == 43) {
        $phone_height = 58;
    }else if($tab_p_taille[$num_sur_etager] == 50) {
        $phone_height = 68;
    }else if ($tab_p_taille[$num_sur_etager] == 57) {
        $phone_height = 78;
    }else {
        $phone_height = 43;
    }

    $div_slide_element .= '<div id="addSlide'.$data_etagere_num.'-'.$default_key.'-'.$num_sur_etager.'" class="slide case-produit-btn" style="height: 78px !important; display: flex;  align-items: flex-end; width: '.$tab_p_taille[$num_sur_etager].' !important;" data-index="'.$num_sur_etager.'" data-width="'.$tab_p_taille[$num_sur_etager].'">
    <div style="display: flex; align-items: flex-start; justify-content:center" class="product-img-for-option">
    <span class="tm_product_options_container">

    <div style="height: 36px; width: 31px; " >
        <img class="image-prod-option prod-option-preview" onclick="showRecapProduitMarchand('.$tab_p_ids[$num_sur_etager].')" src="assets/images/tm_preview_product.svg" alt="">
    </div>
    <div style="height: 36px; width: 36px; ">
        <img class="image-prod-option prod-option-edit" onclick="editProduct('.$tab_p_ids[$num_sur_etager].')" src="assets/images/tm_edit-off.svg" alt="" >
    </div>
    <div style="height: 36px; width: 31px; ">
        <img class="image-prod-option prod-option-corbeil" onclick="deleteProductMarchand('.$tab_p_ids[$num_sur_etager].')" src="assets/images/Corbeille-grise-base.svg" alt="">
    </div>
    </span>
    <img class="image-prod" src="'.$tab_p[$num_sur_etager].'" alt="" height="'.$phone_height .'" width="'.$tab_p_taille[$num_sur_etager].'">
    </div>
    </div>';
        }
       }
        $div_slide_element .= '</div>';
        }
      }
    }

    $div_slide_element .= '</div>';
    echo $div_slide_element;

        }
    }
        @endphp
    </div>
</div>
@else

<div class="main-carousel-section">

    {{-- zone produit sauf image tv et son --}}
</div>

@endif


@if($default_rayon->id  == 39)
<div class="main-carousel-section-changed" id="tm-main-slide-carouselF" style="display: flex; padding-left: 50px">
    <div class="slider-content-wrapper" style="top: 7px">
    @php

    if (count($arry) == 0) {
    $init_page = '';
    $init_page .= '<div class="custom-carousel-page" id="slide-p-init-telephonie">';
    $init_page .= '<div class="row_div-telephonie">';
    $init_page .= '</div>';
    $init_page .= '<div class="row_div-telephonie">';
    $init_page .= '</div>';
    $init_page .= '<div class="row_div-telephonie">';
    $init_page .= '</div>';
    $init_page .= '<div class="row_div-telephonie">';
    $init_page .= '</div>';
    $init_page .= '<div class="row_div-telephonie">';
    $init_page .= '</div>';
    $init_page .= '</div>';

    echo $init_page;

    }else {

    $line_slider = [0, 1, 2, 3, 4];
    $case_etagere = [0, 1, 2, 3, 4, 5];
    foreach ($slides_data as $key => $value) {
    $div_slide_element = '';
    $storage_row_line = [];
    $produit_sur_chaque_ligne = [];
    $produit_taille_sur_etagere = [];
    $produit_position_sur_ligne = [];
    $tableau_produits_id = [];
    $produit_max_size = []; // les tailles maximales d'une ligne
    $div_slide_element = '<div class="custom-carousel-page" id="slide-p'.$key.'" data-index = "'.$key.'">';
    $data_etagere_num = $key; // numero du slide sur l'étagère

    foreach ($value as $key1 => $rows) {
    $tab_slide_row = [];
    foreach ($rows as $key2 => $row) {
    $tab_slide_row[] = $key2;
    $tab_slide_image_position = []; // tableau indexé avec les positions

    foreach ($row as $key3 => $p) {
    foreach ($p as $key4 => $p1) {
        $produit_sur_chaque_ligne[$key2][$p1->position_sur_etagere] = $p1->image; //les images sur étagère
        $produit_taille_sur_etagere[$key2][$p1->position_sur_etagere] = $p1->taille_sur_etagere; // taille sur étagère
        $produit_position_sur_ligne[$key2][] = $p1->position_sur_etagere; // position sur étagère
        $tableau_produits_id[$key2][$p1->position_sur_etagere] = $p1->id; // ids des produits
    }
        }
    }

    // print_r( $tab_slide_image_position[$key2]) .'<br>';
    foreach ($line_slider as $default_key) {
    $key_row_slide = array_search($default_key, $tab_slide_row);
    if ($key_row_slide === FALSE) {
    $div_slide_element .= '<div class="row_div-telephonie">';
    foreach ($case_etagere as $num_sur_etager) { // creation des cases vides
    $div_slide_element .= '<div id="addSlide'.$data_etagere_num.'-'.$default_key.'-'.$num_sur_etager.'" class="slide case-produit-btn class-default-added-btn slide-add-btn" data-index="d" style="height: 78px !important;" ><button class="add-product-button-etagere not-active-product-btn" style="position: absolute;" onclick="testCurentCase('.$data_etagere_num.','.$default_key.','.$num_sur_etager.')"><span class="add-product-icon">+</span></button></div>';
        }
        $div_slide_element .= '</div>';
    }else{

    $div_slide_element .= '<div class="row_div-telephonie">';
    $tab_pos_line = [];
    $tab_p = [];
    $tab_p_taille = [];
    $tab_p_taille_max = [];
    $tab_p_ids = [];

    foreach ($produit_position_sur_ligne[$default_key] as  $p1) {
        $tab_pos_line[] = $p1;
    }

    foreach ($produit_sur_chaque_ligne[$default_key] as $index_p =>  $p) {
        $tab_p[$index_p] = $p;
    }

    foreach ($produit_taille_sur_etagere[$default_key] as $index_p =>  $p) {
        $tab_p_taille[$index_p] = $p;

        if ($p == 58) {
        $tab_p_taille_max[] = $p;
        }
    }

    foreach ($tableau_produits_id[$default_key] as $index_p =>  $p) {
        $tab_p_ids[$index_p] = $p;
    }
    // ------------------------------- counter of max size -------------------------
    $i = 0;

    $taille_produit =  count($tab_p_taille_max);

    foreach ($case_etagere as $num_sur_etager) {
    $keybis = array_search($num_sur_etager, $tab_pos_line);

    $phone_height = 78;

    if ($keybis === FALSE &&  $taille_produit == 4) {

    }else if ($keybis === FALSE) {
    $div_slide_element .= '<div id="addSlide'.$data_etagere_num.'-'.$default_key.'-'.$num_sur_etager.'" class="slide case-produit-btn class-default-added-btn slide-add-btn" data-index="'.$num_sur_etager.'" style="height: 78px !important;" data-width="0"><button class="add-product-button-etagere not-active-product-btn" style="position: absolute;" onclick="testCurentCase('.$data_etagere_num.','.$default_key.','.$num_sur_etager.')"><span class="add-product-icon">+</span></button></div>';
    }else{

    if ($tab_p_taille[$num_sur_etager] == 43) {
        $phone_height = 58;
    }else if($tab_p_taille[$num_sur_etager] == 50) {
        $phone_height = 68;
    }else if ($tab_p_taille[$num_sur_etager] == 57) {
        $phone_height = 78;
    }else {
        $phone_height = 43;
    }

    $div_slide_element .= '<div id="addSlide'.$data_etagere_num.'-'.$default_key.'-'.$num_sur_etager.'" class="slide case-produit-btn" style="height: 78px !important; display: flex;  align-items: flex-end; width: '.$tab_p_taille[$num_sur_etager].' !important;" data-index="'.$num_sur_etager.'" data-width="'.$tab_p_taille[$num_sur_etager].'">
    <div style="display: flex; align-items: flex-start; justify-content:center" class="product-img-for-option">
    <span class="tm_product_options_container">

    <div style="height: 36px; width: 31px; " >
        <img class="image-prod-option prod-option-preview" onclick="showRecapProduitMarchand('.$tab_p_ids[$num_sur_etager].')" src="assets/images/tm_preview_product.svg" alt="">
    </div>
    <div style="height: 36px; width: 36px; ">
        <img class="image-prod-option prod-option-edit" onclick="editProduct('.$tab_p_ids[$num_sur_etager].')" src="assets/images/tm_edit-off.svg" alt="" >
    </div>
    <div style="height: 36px; width: 31px; ">
        <img class="image-prod-option prod-option-corbeil" onclick="deleteProductMarchand('.$tab_p_ids[$num_sur_etager].')" src="assets/images/Corbeille-grise-base.svg" alt="">
    </div>
    </span>
    <img class="image-prod" src="'.$tab_p[$num_sur_etager].'" alt="" height="'.$phone_height .'" width="'.$tab_p_taille[$num_sur_etager].'">
    </div>
    </div>';
        }
       }
        $div_slide_element .= '</div>';
        }
      }
    }

    $div_slide_element .= '</div>';
    echo $div_slide_element;

        }
    }
        @endphp
    </div>
</div>
@else

<div class="main-carousel-section">

    {{-- zone produit sauf image tv et son --}}
</div>

@endif

@if($default_rayon->id  == 12)
<div class="main-carousel-section-changed" id="tm-main-slide-carouselF" style="display: flex; padding-left: 50px">
    <div class="slider-content-wrapper" style="top: 7px">
    @php

    if (count($arry) == 0) {
    $init_page = '';
    $init_page .= '<div class="custom-carousel-page" id="slide-p-init-telephonie">';
    $init_page .= '<div class="row_div-telephonie">';
    $init_page .= '</div>';
    $init_page .= '<div class="row_div-telephonie">';
    $init_page .= '</div>';
    $init_page .= '<div class="row_div-telephonie">';
    $init_page .= '</div>';
    $init_page .= '<div class="row_div-telephonie">';
    $init_page .= '</div>';
    $init_page .= '<div class="row_div-telephonie">';
    $init_page .= '</div>';
    $init_page .= '</div>';

    echo $init_page;

    }else {

    $line_slider = [0, 1, 2, 3, 4];
    $case_etagere = [0, 1, 2, 3, 4, 5];
    foreach ($slides_data as $key => $value) {
    $div_slide_element = '';
    $storage_row_line = [];
    $produit_sur_chaque_ligne = [];
    $produit_taille_sur_etagere = [];
    $produit_position_sur_ligne = [];
    $tableau_produits_id = [];
    $produit_max_size = []; // les tailles maximales d'une ligne
    $div_slide_element = '<div class="custom-carousel-page" id="slide-p'.$key.'" data-index = "'.$key.'">';
    $data_etagere_num = $key; // numero du slide sur l'étagère

    foreach ($value as $key1 => $rows) {
    $tab_slide_row = [];
    foreach ($rows as $key2 => $row) {
    $tab_slide_row[] = $key2;
    $tab_slide_image_position = []; // tableau indexé avec les positions

    foreach ($row as $key3 => $p) {
    foreach ($p as $key4 => $p1) {
        $produit_sur_chaque_ligne[$key2][$p1->position_sur_etagere] = $p1->image; //les images sur étagère
        $produit_taille_sur_etagere[$key2][$p1->position_sur_etagere] = $p1->taille_sur_etagere; // taille sur étagère
        $produit_position_sur_ligne[$key2][] = $p1->position_sur_etagere; // position sur étagère
        $tableau_produits_id[$key2][$p1->position_sur_etagere] = $p1->id; // ids des produits
    }
        }
    }

    // print_r( $tab_slide_image_position[$key2]) .'<br>';
    foreach ($line_slider as $default_key) {
    $key_row_slide = array_search($default_key, $tab_slide_row);
    if ($key_row_slide === FALSE) {
    $div_slide_element .= '<div class="row_div-telephonie">';
    foreach ($case_etagere as $num_sur_etager) { // creation des cases vides
    $div_slide_element .= '<div id="addSlide'.$data_etagere_num.'-'.$default_key.'-'.$num_sur_etager.'" class="slide case-produit-btn class-default-added-btn slide-add-btn" data-index="d" style="height: 78px !important;" ><button class="add-product-button-etagere not-active-product-btn" style="position: absolute;" onclick="testCurentCase('.$data_etagere_num.','.$default_key.','.$num_sur_etager.')"><span class="add-product-icon">+</span></button></div>';
        }
        $div_slide_element .= '</div>';
    }else{

    $div_slide_element .= '<div class="row_div-telephonie">';
    $tab_pos_line = [];
    $tab_p = [];
    $tab_p_taille = [];
    $tab_p_taille_max = [];
    $tab_p_ids = [];

    foreach ($produit_position_sur_ligne[$default_key] as  $p1) {
        $tab_pos_line[] = $p1;
    }

    foreach ($produit_sur_chaque_ligne[$default_key] as $index_p =>  $p) {
        $tab_p[$index_p] = $p;
    }

    foreach ($produit_taille_sur_etagere[$default_key] as $index_p =>  $p) {
        $tab_p_taille[$index_p] = $p;

        if ($p == 58) {
        $tab_p_taille_max[] = $p;
        }
    }

    foreach ($tableau_produits_id[$default_key] as $index_p =>  $p) {
        $tab_p_ids[$index_p] = $p;
    }
    // ------------------------------- counter of max size -------------------------
    $i = 0;

    $taille_produit =  count($tab_p_taille_max);

    foreach ($case_etagere as $num_sur_etager) {
    $keybis = array_search($num_sur_etager, $tab_pos_line);

    $phone_height = 78;

    if ($keybis === FALSE &&  $taille_produit == 4) {

    }else if ($keybis === FALSE) {
    $div_slide_element .= '<div id="addSlide'.$data_etagere_num.'-'.$default_key.'-'.$num_sur_etager.'" class="slide case-produit-btn class-default-added-btn slide-add-btn" data-index="'.$num_sur_etager.'" style="height: 78px !important;" data-width="0"><button class="add-product-button-etagere not-active-product-btn" style="position: absolute;" onclick="testCurentCase('.$data_etagere_num.','.$default_key.','.$num_sur_etager.')"><span class="add-product-icon">+</span></button></div>';
    }else{

    if ($tab_p_taille[$num_sur_etager] == 43) {
        $phone_height = 58;
    }else if($tab_p_taille[$num_sur_etager] == 50) {
        $phone_height = 68;
    }else if ($tab_p_taille[$num_sur_etager] == 57) {
        $phone_height = 78;
    }else {
        $phone_height = 43;
    }

    $div_slide_element .= '<div id="addSlide'.$data_etagere_num.'-'.$default_key.'-'.$num_sur_etager.'" class="slide case-produit-btn" style="height: 78px !important; display: flex;  align-items: flex-end; width: '.$tab_p_taille[$num_sur_etager].' !important;" data-index="'.$num_sur_etager.'" data-width="'.$tab_p_taille[$num_sur_etager].'">
    <div style="display: flex; align-items: flex-start; justify-content:center" class="product-img-for-option">
    <span class="tm_product_options_container">

    <div style="height: 36px; width: 31px; " >
        <img class="image-prod-option prod-option-preview" onclick="showRecapProduitMarchand('.$tab_p_ids[$num_sur_etager].')" src="assets/images/tm_preview_product.svg" alt="">
    </div>
    <div style="height: 36px; width: 36px; ">
        <img class="image-prod-option prod-option-edit" onclick="editProduct('.$tab_p_ids[$num_sur_etager].')" src="assets/images/tm_edit-off.svg" alt="" >
    </div>
    <div style="height: 36px; width: 31px; ">
        <img class="image-prod-option prod-option-corbeil" onclick="deleteProductMarchand('.$tab_p_ids[$num_sur_etager].')" src="assets/images/Corbeille-grise-base.svg" alt="">
    </div>
    </span>
    <img class="image-prod" src="'.$tab_p[$num_sur_etager].'" alt="" height="'.$phone_height .'" width="'.$tab_p_taille[$num_sur_etager].'">
    </div>
    </div>';
        }
       }
        $div_slide_element .= '</div>';
        }
      }
    }

    $div_slide_element .= '</div>';
    echo $div_slide_element;

        }
    }
        @endphp
    </div>
</div>
@else

<div class="main-carousel-section">

    {{-- zone produit sauf image tv et son --}}
</div>

@endif

@if($default_rayon->id  == 27)
<div class="main-carousel-section-changed" id="tm-main-slide-carouselF" style="display: flex; padding-left: 50px">
    <div class="slider-content-wrapper" style="top: 7px">
    @php

    if (count($arry) == 0) {
    $init_page = '';
    $init_page .= '<div class="custom-carousel-page" id="slide-p-init-telephonie">';
    $init_page .= '<div class="row_div-telephonie">';
    $init_page .= '</div>';
    $init_page .= '<div class="row_div-telephonie">';
    $init_page .= '</div>';
    $init_page .= '<div class="row_div-telephonie">';
    $init_page .= '</div>';
    $init_page .= '<div class="row_div-telephonie">';
    $init_page .= '</div>';
    $init_page .= '<div class="row_div-telephonie">';
    $init_page .= '</div>';
    $init_page .= '</div>';

    echo $init_page;

    }else {

    $line_slider = [0, 1, 2, 3, 4];
    $case_etagere = [0, 1, 2, 3, 4, 5];
    foreach ($slides_data as $key => $value) {
    $div_slide_element = '';
    $storage_row_line = [];
    $produit_sur_chaque_ligne = [];
    $produit_taille_sur_etagere = [];
    $produit_position_sur_ligne = [];
    $tableau_produits_id = [];
    $produit_max_size = []; // les tailles maximales d'une ligne
    $div_slide_element = '<div class="custom-carousel-page" id="slide-p'.$key.'" data-index = "'.$key.'">';
    $data_etagere_num = $key; // numero du slide sur l'étagère

    foreach ($value as $key1 => $rows) {
    $tab_slide_row = [];
    foreach ($rows as $key2 => $row) {
    $tab_slide_row[] = $key2;
    $tab_slide_image_position = []; // tableau indexé avec les positions

    foreach ($row as $key3 => $p) {
    foreach ($p as $key4 => $p1) {
        $produit_sur_chaque_ligne[$key2][$p1->position_sur_etagere] = $p1->image; //les images sur étagère
        $produit_taille_sur_etagere[$key2][$p1->position_sur_etagere] = $p1->taille_sur_etagere; // taille sur étagère
        $produit_position_sur_ligne[$key2][] = $p1->position_sur_etagere; // position sur étagère
        $tableau_produits_id[$key2][$p1->position_sur_etagere] = $p1->id; // ids des produits
    }
        }
    }

    // print_r( $tab_slide_image_position[$key2]) .'<br>';
    foreach ($line_slider as $default_key) {
    $key_row_slide = array_search($default_key, $tab_slide_row);
    if ($key_row_slide === FALSE) {
    $div_slide_element .= '<div class="row_div-telephonie">';
    foreach ($case_etagere as $num_sur_etager) { // creation des cases vides
    $div_slide_element .= '<div id="addSlide'.$data_etagere_num.'-'.$default_key.'-'.$num_sur_etager.'" class="slide case-produit-btn class-default-added-btn slide-add-btn" data-index="d" style="height: 78px !important;" ><button class="add-product-button-etagere not-active-product-btn" style="position: absolute;" onclick="testCurentCase('.$data_etagere_num.','.$default_key.','.$num_sur_etager.')"><span class="add-product-icon">+</span></button></div>';
        }
        $div_slide_element .= '</div>';
    }else{

    $div_slide_element .= '<div class="row_div-telephonie">';
    $tab_pos_line = [];
    $tab_p = [];
    $tab_p_taille = [];
    $tab_p_taille_max = [];
    $tab_p_ids = [];

    foreach ($produit_position_sur_ligne[$default_key] as  $p1) {
        $tab_pos_line[] = $p1;
    }

    foreach ($produit_sur_chaque_ligne[$default_key] as $index_p =>  $p) {
        $tab_p[$index_p] = $p;
    }

    foreach ($produit_taille_sur_etagere[$default_key] as $index_p =>  $p) {
        $tab_p_taille[$index_p] = $p;

        if ($p == 58) {
        $tab_p_taille_max[] = $p;
        }
    }

    foreach ($tableau_produits_id[$default_key] as $index_p =>  $p) {
        $tab_p_ids[$index_p] = $p;
    }
    // ------------------------------- counter of max size -------------------------
    $i = 0;

    $taille_produit =  count($tab_p_taille_max);

    foreach ($case_etagere as $num_sur_etager) {
    $keybis = array_search($num_sur_etager, $tab_pos_line);

    $phone_height = 78;

    if ($keybis === FALSE &&  $taille_produit == 4) {

    }else if ($keybis === FALSE) {
    $div_slide_element .= '<div id="addSlide'.$data_etagere_num.'-'.$default_key.'-'.$num_sur_etager.'" class="slide case-produit-btn class-default-added-btn slide-add-btn" data-index="'.$num_sur_etager.'" style="height: 78px !important;" data-width="0"><button class="add-product-button-etagere not-active-product-btn" style="position: absolute;" onclick="testCurentCase('.$data_etagere_num.','.$default_key.','.$num_sur_etager.')"><span class="add-product-icon">+</span></button></div>';
    }else{

    if ($tab_p_taille[$num_sur_etager] == 43) {
        $phone_height = 58;
    }else if($tab_p_taille[$num_sur_etager] == 50) {
        $phone_height = 68;
    }else if ($tab_p_taille[$num_sur_etager] == 57) {
        $phone_height = 78;
    }else {
        $phone_height = 43;
    }

    $div_slide_element .= '<div id="addSlide'.$data_etagere_num.'-'.$default_key.'-'.$num_sur_etager.'" class="slide case-produit-btn" style="height: 78px !important; display: flex;  align-items: flex-end; width: '.$tab_p_taille[$num_sur_etager].' !important;" data-index="'.$num_sur_etager.'" data-width="'.$tab_p_taille[$num_sur_etager].'">
    <div style="display: flex; align-items: flex-start; justify-content:center" class="product-img-for-option">
    <span class="tm_product_options_container">

    <div style="height: 36px; width: 31px; " >
        <img class="image-prod-option prod-option-preview" onclick="showRecapProduitMarchand('.$tab_p_ids[$num_sur_etager].')" src="assets/images/tm_preview_product.svg" alt="">
    </div>
    <div style="height: 36px; width: 36px; ">
        <img class="image-prod-option prod-option-edit" onclick="editProduct('.$tab_p_ids[$num_sur_etager].')" src="assets/images/tm_edit-off.svg" alt="" >
    </div>
    <div style="height: 36px; width: 31px; ">
        <img class="image-prod-option prod-option-corbeil" onclick="deleteProductMarchand('.$tab_p_ids[$num_sur_etager].')" src="assets/images/Corbeille-grise-base.svg" alt="">
    </div>
    </span>
    <img class="image-prod" src="'.$tab_p[$num_sur_etager].'" alt="" height="'.$phone_height .'" width="'.$tab_p_taille[$num_sur_etager].'">
    </div>
    </div>';
        }
       }
        $div_slide_element .= '</div>';
        }
      }
    }

    $div_slide_element .= '</div>';
    echo $div_slide_element;

        }
    }
        @endphp
    </div>
</div>
@else

<div class="main-carousel-section">

    {{-- zone produit sauf image tv et son --}}
</div>

@endif

@if($default_rayon->id  == 38)
<div class="main-carousel-section-changed" id="tm-main-slide-carouselF" style="display: flex; padding-left: 50px">
    <div class="slider-content-wrapper" style="top: 7px">
    @php

    if (count($arry) == 0) {
    $init_page = '';
    $init_page .= '<div class="custom-carousel-page" id="slide-p-init-telephonie">';
    $init_page .= '<div class="row_div-telephonie">';
    $init_page .= '</div>';
    $init_page .= '<div class="row_div-telephonie">';
    $init_page .= '</div>';
    $init_page .= '<div class="row_div-telephonie">';
    $init_page .= '</div>';
    $init_page .= '<div class="row_div-telephonie">';
    $init_page .= '</div>';
    $init_page .= '<div class="row_div-telephonie">';
    $init_page .= '</div>';
    $init_page .= '</div>';

    echo $init_page;

    }else {

    $line_slider = [0, 1, 2, 3, 4];
    $case_etagere = [0, 1, 2, 3, 4, 5];
    foreach ($slides_data as $key => $value) {
    $div_slide_element = '';
    $storage_row_line = [];
    $produit_sur_chaque_ligne = [];
    $produit_taille_sur_etagere = [];
    $produit_position_sur_ligne = [];
    $tableau_produits_id = [];
    $produit_max_size = []; // les tailles maximales d'une ligne
    $div_slide_element = '<div class="custom-carousel-page" id="slide-p'.$key.'" data-index = "'.$key.'">';
    $data_etagere_num = $key; // numero du slide sur l'étagère

    foreach ($value as $key1 => $rows) {
    $tab_slide_row = [];
    foreach ($rows as $key2 => $row) {
    $tab_slide_row[] = $key2;
    $tab_slide_image_position = []; // tableau indexé avec les positions

    foreach ($row as $key3 => $p) {
    foreach ($p as $key4 => $p1) {
        $produit_sur_chaque_ligne[$key2][$p1->position_sur_etagere] = $p1->image; //les images sur étagère
        $produit_taille_sur_etagere[$key2][$p1->position_sur_etagere] = $p1->taille_sur_etagere; // taille sur étagère
        $produit_position_sur_ligne[$key2][] = $p1->position_sur_etagere; // position sur étagère
        $tableau_produits_id[$key2][$p1->position_sur_etagere] = $p1->id; // ids des produits
    }
        }
    }

    // print_r( $tab_slide_image_position[$key2]) .'<br>';
    foreach ($line_slider as $default_key) {
    $key_row_slide = array_search($default_key, $tab_slide_row);
    if ($key_row_slide === FALSE) {
    $div_slide_element .= '<div class="row_div-telephonie">';
    foreach ($case_etagere as $num_sur_etager) { // creation des cases vides
    $div_slide_element .= '<div id="addSlide'.$data_etagere_num.'-'.$default_key.'-'.$num_sur_etager.'" class="slide case-produit-btn class-default-added-btn slide-add-btn" data-index="d" style="height: 78px !important;" ><button class="add-product-button-etagere not-active-product-btn" style="position: absolute;" onclick="testCurentCase('.$data_etagere_num.','.$default_key.','.$num_sur_etager.')"><span class="add-product-icon">+</span></button></div>';
        }
        $div_slide_element .= '</div>';
    }else{

    $div_slide_element .= '<div class="row_div-telephonie">';
    $tab_pos_line = [];
    $tab_p = [];
    $tab_p_taille = [];
    $tab_p_taille_max = [];
    $tab_p_ids = [];

    foreach ($produit_position_sur_ligne[$default_key] as  $p1) {
        $tab_pos_line[] = $p1;
    }

    foreach ($produit_sur_chaque_ligne[$default_key] as $index_p =>  $p) {
        $tab_p[$index_p] = $p;
    }

    foreach ($produit_taille_sur_etagere[$default_key] as $index_p =>  $p) {
        $tab_p_taille[$index_p] = $p;

        if ($p == 58) {
        $tab_p_taille_max[] = $p;
        }
    }

    foreach ($tableau_produits_id[$default_key] as $index_p =>  $p) {
        $tab_p_ids[$index_p] = $p;
    }
    // ------------------------------- counter of max size -------------------------
    $i = 0;

    $taille_produit =  count($tab_p_taille_max);

    foreach ($case_etagere as $num_sur_etager) {
    $keybis = array_search($num_sur_etager, $tab_pos_line);

    $phone_height = 78;

    if ($keybis === FALSE &&  $taille_produit == 4) {

    }else if ($keybis === FALSE) {
    $div_slide_element .= '<div id="addSlide'.$data_etagere_num.'-'.$default_key.'-'.$num_sur_etager.'" class="slide case-produit-btn class-default-added-btn slide-add-btn" data-index="'.$num_sur_etager.'" style="height: 78px !important;" data-width="0"><button class="add-product-button-etagere not-active-product-btn" style="position: absolute;" onclick="testCurentCase('.$data_etagere_num.','.$default_key.','.$num_sur_etager.')"><span class="add-product-icon">+</span></button></div>';
    }else{

    if ($tab_p_taille[$num_sur_etager] == 43) {
        $phone_height = 58;
    }else if($tab_p_taille[$num_sur_etager] == 50) {
        $phone_height = 68;
    }else if ($tab_p_taille[$num_sur_etager] == 57) {
        $phone_height = 78;
    }else {
        $phone_height = 43;
    }

    $div_slide_element .= '<div id="addSlide'.$data_etagere_num.'-'.$default_key.'-'.$num_sur_etager.'" class="slide case-produit-btn" style="height: 78px !important; display: flex;  align-items: flex-end; width: '.$tab_p_taille[$num_sur_etager].' !important;" data-index="'.$num_sur_etager.'" data-width="'.$tab_p_taille[$num_sur_etager].'">
    <div style="display: flex; align-items: flex-start; justify-content:center" class="product-img-for-option">
    <span class="tm_product_options_container">

    <div style="height: 36px; width: 31px; " >
        <img class="image-prod-option prod-option-preview" onclick="showRecapProduitMarchand('.$tab_p_ids[$num_sur_etager].')" src="assets/images/tm_preview_product.svg" alt="">
    </div>
    <div style="height: 36px; width: 36px; ">
        <img class="image-prod-option prod-option-edit" onclick="editProduct('.$tab_p_ids[$num_sur_etager].')" src="assets/images/tm_edit-off.svg" alt="" >
    </div>
    <div style="height: 36px; width: 31px; ">
        <img class="image-prod-option prod-option-corbeil" onclick="deleteProductMarchand('.$tab_p_ids[$num_sur_etager].')" src="assets/images/Corbeille-grise-base.svg" alt="">
    </div>
    </span>
    <img class="image-prod" src="'.$tab_p[$num_sur_etager].'" alt="" height="'.$phone_height .'" width="'.$tab_p_taille[$num_sur_etager].'">
    </div>
    </div>';
        }
       }
        $div_slide_element .= '</div>';
        }
      }
    }

    $div_slide_element .= '</div>';
    echo $div_slide_element;

        }
    }
        @endphp
    </div>
</div>
@else

<div class="main-carousel-section">

    {{-- zone produit sauf image tv et son --}}
</div>

@endif

@if($default_rayon->id  == 26)
<div class="main-carousel-section-changed" id="tm-main-slide-carouselF" style="display: flex; padding-left: 50px">
    <div class="slider-content-wrapper" >
    @php
    if (count($arry) == 0) {

        $init_page = '';
        $init_page .= '<div class="custom-carousel-page" id="slide-p-init-informatique-tablette">';
        $init_page .= '<div class="row_div-informatique-tablette">';
        $init_page .= '</div>';
        $init_page .= '<div class="row_div-informatique-tablette">';
        $init_page .= '</div>';
        $init_page .= '<div class="row_div-informatique-tablette">';
        $init_page .= '</div>';
        $init_page .= '<div class="row_div-informatique-tablette">';
        $init_page .= '</div>';
        $init_page .= '<div class="row_div-informatique-tablette">';
        $init_page .= '</div>';
        $init_page .= '</div>';

        echo $init_page;

    }else {

    $line_slider = [0, 1, 2, 3, 4];
    $case_etagere = [0, 1, 2, 3, 4, 5];

    foreach ($slides_data as $key => $value) {

    $div_slide_element = '';
    $storage_row_line = [];
    $produit_sur_chaque_ligne = [];
    $produit_taille_sur_etagere = [];
    $produit_position_sur_ligne = [];
    $tableau_produits_id = [];
    $produit_max_size = []; // les tailles maximales d'une ligne
    $div_slide_element = '<div class="custom-carousel-page" id="slide-p'.$key.'" data-index = "'.$key.'">';
    $data_etagere_num = $key; // numero du slide sur l'étagère

    foreach ($value as $key1 => $rows) {
    $tab_slide_row = [];
    foreach ($rows as $key2 => $row) {
    $tab_slide_row[] = $key2;
    $tab_slide_image_position = []; // tableau indexé avec les positions

    foreach ($row as $key3 => $p) {
    foreach ($p as $key4 => $p1) {
        $produit_sur_chaque_ligne[$key2][$p1->position_sur_etagere] = $p1->image; //les images sur étagère
        $produit_taille_sur_etagere[$key2][$p1->position_sur_etagere] = $p1->taille_sur_etagere; // taille sur étagère
        $produit_position_sur_ligne[$key2][] = $p1->position_sur_etagere; // position sur étagère
        $tableau_produits_id[$key2][$p1->position_sur_etagere] = $p1->id; // ids des produits
    }
        }
    }

    // print_r( $tab_slide_image_position[$key2]) .'<br>';
    foreach ($line_slider as $default_key) {
    $key_row_slide = array_search($default_key, $tab_slide_row);
    if ($key_row_slide === FALSE) {
    $div_slide_element .= '<div class="row_div-telephonie">';
    foreach ($case_etagere as $num_sur_etager) { // creation des cases vides
    $div_slide_element .= '<div id="addSlide'.$data_etagere_num.'-'.$default_key.'-'.$num_sur_etager.'" class="slide case-produit-btn class-default-added-btn slide-add-btn" data-index="d" style="height: 78px !important;" ><button class="add-product-button-etagere not-active-product-btn" style="position: absolute;" onclick="testCurentCase('.$data_etagere_num.','.$default_key.','.$num_sur_etager.')"><span class="add-product-icon">+</span></button></div>';
        }
        $div_slide_element .= '</div>';
    }else{

    $div_slide_element .= '<div class="row_div-telephonie">';
    $tab_pos_line = [];
    $tab_p = [];
    $tab_p_taille = [];
    $tab_p_taille_max = [];
    $tab_p_ids = [];

    foreach ($produit_position_sur_ligne[$default_key] as  $p1) {
        $tab_pos_line[] = $p1;
    }

    foreach ($produit_sur_chaque_ligne[$default_key] as $index_p =>  $p) {
        $tab_p[$index_p] = $p;
    }

    foreach ($produit_taille_sur_etagere[$default_key] as $index_p =>  $p) {
        $tab_p_taille[$index_p] = $p;

        if ($p == 58) {
        $tab_p_taille_max[] = $p;
        }
    }

    foreach ($tableau_produits_id[$default_key] as $index_p =>  $p) {
        $tab_p_ids[$index_p] = $p;
    }
    // ------------------------------- counter of max size -------------------------
    $i = 0;

    $taille_produit =  count($tab_p_taille_max);

    foreach ($case_etagere as $num_sur_etager) {
    $keybis = array_search($num_sur_etager, $tab_pos_line);

    $phone_height = 93;

    if ($keybis === FALSE &&  $taille_produit == 4) {

    }else if ($keybis === FALSE) {
    $div_slide_element .= '<div id="addSlide'.$data_etagere_num.'-'.$default_key.'-'.$num_sur_etager.'" class="slide case-produit-btn class-default-added-btn slide-add-btn" data-index="'.$num_sur_etager.'" style="height: 78px !important;" data-width="0"><button class="add-product-button-etagere not-active-product-btn" style="position: absolute;" onclick="testCurentCase('.$data_etagere_num.','.$default_key.','.$num_sur_etager.')"><span class="add-product-icon">+</span></button></div>';
    }else{

    $div_slide_element .= '<div id="addSlide'.$data_etagere_num.'-'.$default_key.'-'.$num_sur_etager.'" class="slide case-produit-btn" style="height: 92px !important; display: flex;  align-items: flex-end; width: '.$tab_p_taille[$num_sur_etager].'px !important; margin-right: 0px; margin-bottom: 0px" data-index="'.$num_sur_etager.'" data-width="'.$tab_p_taille[$num_sur_etager].'">
    <div style="display: flex; align-items: flex-start; justify-content:center" class="product-img-for-option">
    <span class="tm_product_options_container">';

    $div_slide_element .= '<div style="height: 36px; width: 31px; " >
        <img class="image-prod-option prod-option-preview" onclick="showRecapProduitMarchand('.$tab_p_ids[$num_sur_etager].')" src="assets/images/tm_preview_product.svg" alt="">
    </div>';

    $div_slide_element .= '<div style="height: 36px; width: 36px; ">
        <img class="image-prod-option prod-option-edit" onclick="editProduct('.$tab_p_ids[$num_sur_etager].')" src="assets/images/tm_edit-off.svg" alt="" >
    </div>';

    $div_slide_element .= '<div style="height: 36px; width: 31px; ">
        <img class="image-prod-option prod-option-corbeil" onclick="deleteProductMarchand('.$tab_p_ids[$num_sur_etager].')" src="assets/images/Corbeille-grise-base.svg" alt="">
    </div>
    </span>
    ';

    $div_slide_element .= '<img style="height: auto; max-height: 92px; width: auto !important; " class="image-prod" src="'.$tab_p[$num_sur_etager].'" alt="" height="auto" width="auto">
    </div>
    </div>';

        }
       }
        $div_slide_element .= '</div>';
        }
      }
    }

    $div_slide_element .= '</div>';
    echo $div_slide_element;

        }
    }

    @endphp
    </div>
</div>
@endif

{{-- Appareil et Outillage  --}}
@if($default_rayon->id  == 10)
<div class="main-carousel-section-changed" id="tm-main-slide-carousel_appareil_outils" style="display: flex; padding-left: 50px">
    <div class="slider-content-wrapper" style="top: 7px">
    @php

    if (count($arry) == 0) {
    $init_page = '';
    $init_page .= '<div class="custom-carousel-page" id="slide-p-init-appareillage-outils">';
    $init_page .= '<div class="row_div-telephonie">';
    $init_page .= '</div>';
    $init_page .= '<div class="row_div-telephonie">';
    $init_page .= '</div>';
    $init_page .= '<div class="row_div-telephonie">';
    $init_page .= '</div>';
    $init_page .= '<div class="row_div-telephonie">';
    $init_page .= '</div>';
    $init_page .= '<div class="row_div-telephonie">';
    $init_page .= '</div>';
    $init_page .= '</div>';

    echo $init_page;

    }else {

    $line_slider = [0, 1, 2, 3, 4];
    $case_etagere = [0, 1, 2, 3, 4, 5];
    foreach ($slides_data as $key => $value) {
    $div_slide_element = '';
    $storage_row_line = [];
    $produit_sur_chaque_ligne = [];
    $produit_taille_sur_etagere = [];
    $produit_position_sur_ligne = [];
    $tableau_produits_id = [];
    $produit_max_size = []; // les tailles maximales d'une ligne
    $div_slide_element = '<div class="custom-carousel-page" id="slide-p'.$key.'" data-index = "'.$key.'">';
    $data_etagere_num = $key; // numero du slide sur l'étagère

    foreach ($value as $key1 => $rows) {
    $tab_slide_row = [];
    foreach ($rows as $key2 => $row) {
    $tab_slide_row[] = $key2;
    $tab_slide_image_position = []; // tableau indexé avec les positions

    foreach ($row as $key3 => $p) {
    foreach ($p as $key4 => $p1) {
        $produit_sur_chaque_ligne[$key2][$p1->position_sur_etagere] = $p1->image; //les images sur étagère
        $produit_taille_sur_etagere[$key2][$p1->position_sur_etagere] = $p1->taille_sur_etagere; // taille sur étagère
        $produit_position_sur_ligne[$key2][] = $p1->position_sur_etagere; // position sur étagère
        $tableau_produits_id[$key2][$p1->position_sur_etagere] = $p1->id; // ids des produits
    }
        }
    }

    // print_r( $tab_slide_image_position[$key2]) .'<br>';
    foreach ($line_slider as $default_key) {
    $key_row_slide = array_search($default_key, $tab_slide_row);
    if ($key_row_slide === FALSE) {
    $div_slide_element .= '<div class="row_div-telephonie">';
    foreach ($case_etagere as $num_sur_etager) { // creation des cases vides
    $div_slide_element .= '<div id="addSlide'.$data_etagere_num.'-'.$default_key.'-'.$num_sur_etager.'" class="slide case-produit-btn class-default-added-btn slide-add-btn" data-index="d" style="height: 78px !important;" ><button class="add-product-button-etagere not-active-product-btn" style="position: absolute;" onclick="testCurentCase('.$data_etagere_num.','.$default_key.','.$num_sur_etager.')"><span class="add-product-icon">+</span></button></div>';
        }
        $div_slide_element .= '</div>';
    }else{

    $div_slide_element .= '<div class="row_div-telephonie">';
    $tab_pos_line = [];
    $tab_p = [];
    $tab_p_taille = [];
    $tab_p_taille_max = [];
    $tab_p_ids = [];

    foreach ($produit_position_sur_ligne[$default_key] as  $p1) {
        $tab_pos_line[] = $p1;
    }

    foreach ($produit_sur_chaque_ligne[$default_key] as $index_p =>  $p) {
        $tab_p[$index_p] = $p;
    }

    foreach ($produit_taille_sur_etagere[$default_key] as $index_p =>  $p) {
        $tab_p_taille[$index_p] = $p;

        if ($p == 58) {
        $tab_p_taille_max[] = $p;
        }
    }

    foreach ($tableau_produits_id[$default_key] as $index_p =>  $p) {
        $tab_p_ids[$index_p] = $p;
    }
    // ------------------------------- counter of max size -------------------------
    $i = 0;

    $taille_produit =  count($tab_p_taille_max);

    foreach ($case_etagere as $num_sur_etager) {
    $keybis = array_search($num_sur_etager, $tab_pos_line);

    $phone_height = 78;

    if ($keybis === FALSE &&  $taille_produit == 4) {

    }else if ($keybis === FALSE) {
    $div_slide_element .= '<div id="addSlide'.$data_etagere_num.'-'.$default_key.'-'.$num_sur_etager.'" class="slide case-produit-btn class-default-added-btn slide-add-btn" data-index="'.$num_sur_etager.'" style="height: 78px !important;" data-width="0"><button class="add-product-button-etagere not-active-product-btn" style="position: absolute;" onclick="testCurentCase('.$data_etagere_num.','.$default_key.','.$num_sur_etager.')"><span class="add-product-icon">+</span></button></div>';
    }else{

    if ($tab_p_taille[$num_sur_etager] == 43) {
        $phone_height = 58;
    }else if($tab_p_taille[$num_sur_etager] == 50) {
        $phone_height = 68;
    }else if ($tab_p_taille[$num_sur_etager] == 57) {
        $phone_height = 78;
    }else {
        $phone_height = 43;
    }

    $div_slide_element .= '<div id="addSlide'.$data_etagere_num.'-'.$default_key.'-'.$num_sur_etager.'" class="slide case-produit-btn" style="height: 78px !important; display: flex;  align-items: flex-end; width: '.$tab_p_taille[$num_sur_etager].' !important;" data-index="'.$num_sur_etager.'" data-width="'.$tab_p_taille[$num_sur_etager].'">
    <div style="display: flex; align-items: flex-start; justify-content:center" class="product-img-for-option">
    <span class="tm_product_options_container">

    <div style="height: 36px; width: 31px; " >
        <img class="image-prod-option prod-option-preview" onclick="showRecapProduitMarchand('.$tab_p_ids[$num_sur_etager].')" src="assets/images/tm_preview_product.svg" alt="">
    </div>
    <div style="height: 36px; width: 36px; ">
        <img class="image-prod-option prod-option-edit" onclick="editProduct('.$tab_p_ids[$num_sur_etager].')" src="assets/images/tm_edit-off.svg" alt="" >
    </div>
    <div style="height: 36px; width: 31px; ">
        <img class="image-prod-option prod-option-corbeil" onclick="deleteProductMarchand('.$tab_p_ids[$num_sur_etager].')" src="assets/images/Corbeille-grise-base.svg" alt="">
    </div>
    </span>
    <img class="image-prod" src="'.$tab_p[$num_sur_etager].'" alt="" height="'.$phone_height .'" width="'.$tab_p_taille[$num_sur_etager].'">
    </div>
    </div>';
        }
       }
        $div_slide_element .= '</div>';
        }
      }
    }

    $div_slide_element .= '</div>';
    echo $div_slide_element;

        }
    }
        @endphp
    </div>
</div>
@else

<div class="main-carousel-section">

    {{-- zone produit sauf image tv et son --}}
</div>

@endif

{{-- Appareil et Outillage  --}}
@if($default_rayon->id  == 9)
<div class="main-carousel-section-changed" id="tm-main-slide-carousel_cheveux" style="display: flex; padding-left: 50px">
    <div class="slider-content-wrapper" style="top: 7px">
    @php

    if (count($arry) == 0) {
    $init_page = '';
    $init_page .= '<div class="custom-carousel-page" id="slide-p-init_cheveux">';
    $init_page .= '<div class="row_div-telephonie">';
    $init_page .= '</div>';
    $init_page .= '<div class="row_div-telephonie">';
    $init_page .= '</div>';
    $init_page .= '<div class="row_div-telephonie">';
    $init_page .= '</div>';
    $init_page .= '<div class="row_div-telephonie">';
    $init_page .= '</div>';
    $init_page .= '<div class="row_div-telephonie">';
    $init_page .= '</div>';
    $init_page .= '</div>';

    echo $init_page;

    }else {

    $line_slider = [0, 1, 2, 3, 4];
    $case_etagere = [0, 1, 2, 3, 4, 5];
    foreach ($slides_data as $key => $value) {
    $div_slide_element = '';
    $storage_row_line = [];
    $produit_sur_chaque_ligne = [];
    $produit_taille_sur_etagere = [];
    $produit_position_sur_ligne = [];
    $tableau_produits_id = [];
    $produit_max_size = []; // les tailles maximales d'une ligne
    $div_slide_element = '<div class="custom-carousel-page" id="slide-p'.$key.'" data-index = "'.$key.'">';
    $data_etagere_num = $key; // numero du slide sur l'étagère

    foreach ($value as $key1 => $rows) {
    $tab_slide_row = [];
    foreach ($rows as $key2 => $row) {
    $tab_slide_row[] = $key2;
    $tab_slide_image_position = []; // tableau indexé avec les positions

    foreach ($row as $key3 => $p) {
    foreach ($p as $key4 => $p1) {
        $produit_sur_chaque_ligne[$key2][$p1->position_sur_etagere] = $p1->image; //les images sur étagère
        $produit_taille_sur_etagere[$key2][$p1->position_sur_etagere] = $p1->taille_sur_etagere; // taille sur étagère
        $produit_position_sur_ligne[$key2][] = $p1->position_sur_etagere; // position sur étagère
        $tableau_produits_id[$key2][$p1->position_sur_etagere] = $p1->id; // ids des produits
    }
        }
    }

    // print_r( $tab_slide_image_position[$key2]) .'<br>';
    foreach ($line_slider as $default_key) {
    $key_row_slide = array_search($default_key, $tab_slide_row);
    if ($key_row_slide === FALSE) {
    $div_slide_element .= '<div class="row_div-telephonie">';
    foreach ($case_etagere as $num_sur_etager) { // creation des cases vides
    $div_slide_element .= '<div id="addSlide'.$data_etagere_num.'-'.$default_key.'-'.$num_sur_etager.'" class="slide case-produit-btn class-default-added-btn slide-add-btn" data-index="d" style="height: 78px !important;" ><button class="add-product-button-etagere not-active-product-btn" style="position: absolute;" onclick="testCurentCase('.$data_etagere_num.','.$default_key.','.$num_sur_etager.')"><span class="add-product-icon">+</span></button></div>';
        }
        $div_slide_element .= '</div>';
    }else{

    $div_slide_element .= '<div class="row_div-telephonie">';
    $tab_pos_line = [];
    $tab_p = [];
    $tab_p_taille = [];
    $tab_p_taille_max = [];
    $tab_p_ids = [];

    foreach ($produit_position_sur_ligne[$default_key] as  $p1) {
        $tab_pos_line[] = $p1;
    }

    foreach ($produit_sur_chaque_ligne[$default_key] as $index_p =>  $p) {
        $tab_p[$index_p] = $p;
    }

    foreach ($produit_taille_sur_etagere[$default_key] as $index_p =>  $p) {
        $tab_p_taille[$index_p] = $p;

        if ($p == 58) {
        $tab_p_taille_max[] = $p;
        }
    }

    foreach ($tableau_produits_id[$default_key] as $index_p =>  $p) {
        $tab_p_ids[$index_p] = $p;
    }
    // ------------------------------- counter of max size -------------------------
    $i = 0;

    $taille_produit =  count($tab_p_taille_max);

    foreach ($case_etagere as $num_sur_etager) {
    $keybis = array_search($num_sur_etager, $tab_pos_line);

    $phone_height = 78;

    if ($keybis === FALSE &&  $taille_produit == 4) {

    }else if ($keybis === FALSE) {
    $div_slide_element .= '<div id="addSlide'.$data_etagere_num.'-'.$default_key.'-'.$num_sur_etager.'" class="slide case-produit-btn class-default-added-btn slide-add-btn" data-index="'.$num_sur_etager.'" style="height: 78px !important;" data-width="0"><button class="add-product-button-etagere not-active-product-btn" style="position: absolute;" onclick="testCurentCase('.$data_etagere_num.','.$default_key.','.$num_sur_etager.')"><span class="add-product-icon">+</span></button></div>';
    }else{

    if ($tab_p_taille[$num_sur_etager] == 43) {
        $phone_height = 58;
    }else if($tab_p_taille[$num_sur_etager] == 50) {
        $phone_height = 68;
    }else if ($tab_p_taille[$num_sur_etager] == 57) {
        $phone_height = 78;
    }else {
        $phone_height = 43;
    }

    $div_slide_element .= '<div id="addSlide'.$data_etagere_num.'-'.$default_key.'-'.$num_sur_etager.'" class="slide case-produit-btn" style="height: 78px !important; display: flex;  align-items: flex-end; width: '.$tab_p_taille[$num_sur_etager].' !important;" data-index="'.$num_sur_etager.'" data-width="'.$tab_p_taille[$num_sur_etager].'">
    <div style="display: flex; align-items: flex-start; justify-content:center" class="product-img-for-option">
    <span class="tm_product_options_container">

    <div style="height: 36px; width: 31px; " >
        <img class="image-prod-option prod-option-preview" onclick="showRecapProduitMarchand('.$tab_p_ids[$num_sur_etager].')" src="assets/images/tm_preview_product.svg" alt="">
    </div>
    <div style="height: 36px; width: 36px; ">
        <img class="image-prod-option prod-option-edit" onclick="editProduct('.$tab_p_ids[$num_sur_etager].')" src="assets/images/tm_edit-off.svg" alt="" >
    </div>
    <div style="height: 36px; width: 31px; ">
        <img class="image-prod-option prod-option-corbeil" onclick="deleteProductMarchand('.$tab_p_ids[$num_sur_etager].')" src="assets/images/Corbeille-grise-base.svg" alt="">
    </div>
    </span>
    <img class="image-prod" src="'.$tab_p[$num_sur_etager].'" alt="" height="'.$phone_height .'" width="'.$tab_p_taille[$num_sur_etager].'">
    </div>
    </div>';
        }
       }
        $div_slide_element .= '</div>';
        }
      }
    }

    $div_slide_element .= '</div>';
    echo $div_slide_element;

        }
    }
        @endphp
    </div>
</div>
@else

<div class="main-carousel-section">

    {{-- zone produit sauf image tv et son --}}
</div>

@endif


<div class="rayon-btn-direction-legume next-custom" onclick="tm_carousel_next()" style="border-radius: 50% 0px 0px 50%; ">
    <button class="btn-direction-faux btn-right-small" style="background: transparent">
        <img class="img-direction-btnd" src="{{ asset('assets/images2/Next.svg') }}" alt="">
    </button>
</div>

{{-- la position du produit sur étagère  --}}
<input type="hidden" value="" id="position_sur_etagere" />

{{-- numero du slide sur l'étag_re  --}}
<input type="hidden" value="" id="numero_slide_etagere" />

{{-- numero de la ligne sur le slide  --}}
<input type="hidden" value="" id="numero_ligne_sur_slide" />


<div class="bottom-bar-float" id="userInRayonFooter" style="display: none">

@include('front.app-module.marchand.marchand-annonce.detail-annonce-search')

</div>

{{-- modal zone --}}
@include('front.app-module.marchand.marchand-modals.gerer-equipe')
@include('front.app-module.marchand.marchand-modals.mode-paiement-marchand')
@include('front.app-module.marchand.marchand-modals.corbeille-marchand')
@include('front.app-module.marchand.marchand-modals.gest-menu-marchand')
@include('front.app-module.marchand.marchand-modals.historique-code-marchand')
@include('front.app-module.marchand.marchand-modals.transfert-proprio-marchand')
@include('front.app-module.marchand.marchand-modals.nouvel-avatar-marchand')
@include('front.app-module.marchand.marchand-modals.tableau-marchand')
@include('front.app-module.marchand.marchand-modals.info-marche-marchand')
@include('front.app-module.marchand.marchand-modals.modifier-role-marchand')
@include('front.app-module.marchand.marchand-modals.nouvelle-promo-marchand')
@include('front.app-module.marchand.marchand-annonce.commandes-marchand')
@include('front.app-module.marchand.marchand-modals.detail-commandes-marchand')
@include('front.app-module.marchand.marchand-annonce.detail-annonce-titre')
@include('front.app-module.marchand.marchand-modals.recap_produits_marchand');
@include('front.app-module.marchand.marchand-annonce.detail-annonce-selection-service')
@include('front.app-module.marchand.marchand-annonce.detail-annonce-selection-expedition')
@include('front.app-module.marchand.marchand-modals.messagerie-marchand')
@include('front.app-module.marchand.marchand-annonce.detail-annonce')
@include('front.app-module.marchand.marchand-annonce.detail-annonce-expedition')

</div>

@include('front.app-module.marchand.marchand-modals.modals-helper')


        {{-- partager ma boutique  --}}
        <div class="modal fade" id="shareBoutiqueModal" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog  modal-dialog-centered shareboutique" >
                <div class="modal-content shareboutique-content" style="background-color: #FFFFFF;box-shadow: 0 5px 15px 0 rgba(0,0,0,0.35);">

                    <div class="modal-body px-0" style="height: 213px;padding-top: 25px;">
                        <div class="text-confirmer-la-suppres" style="position: relative; margin-left: auto; margin-right: auto;"><span>Partager ma boutique</span></div>
                        <div  class="entete-modal-delete"></div>

                        <div class="etes-vous-sur-de-vou" id="zoneInputLien" style="position: relative; margin-left: auto; margin-right: auto; background-color: #FBFBFB; width: 95%; height: 25px">
                            <input type="text" value="" id="link-to-share" style="background-color: transparent"/>
                            <input type="text" value="Gloire à Dieu" id="myInBoutique" style="visibility: hidden">
                        </div>

                        <div class="field-none" id="messageSuccessMarchand" style="position: relative; margin-left: auto; margin-right: auto; left: 115px; color: green">
                            <img src="assets/images/icones-vendeurs2/check.svg" style="position: absolute; margin-left: -30px; margin-top: -2px">
                            Lien de partage copier
                        </div>
                        <div class="d-flex">

                        <div class="main-social-media" style="display: flex; column-gap: 10px; position: relative; top: 25px">

                            <div class="social-box-media" id="share-boutique-whatapp" style="margin-left: 17px">
                                <img src="assets/images/Whatsapp.svg" />
                            </div>

                            <div class="social-box-media" id="share-boutique-facebook">
                                <img src="assets/images/Facebook-share.svg" />
                            </div>

                            <div class="social-box-media" id="share-boutique-twiter">
                                <img src="assets/images/Twitter.svg" />
                            </div>

                            <div class="social-box-media" id="share-boutique-mail">
                                <img src="assets/images/Copie_Colle Copy.svg" />
                            </div>

                            <div class="social-box-media" id="share-boutique-sms">
                                <img src="assets/images/sms_icon-icons.com_67293.svg" />
                            </div>

                            <div class="social-box-media tooltip-boutique" id="share-boutique-copie-coller">
                                <img src="assets/images/Copie_Colle.svg" />
                                <span class="tooltiptext" id="myTooltip" style="position: absolute">Copier</span>
                            </div>

                        </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>

    <script src="{{ asset('js/app.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/swiper/swiper-bundle.min.js"></script>

    <script>
        Echo.channel('events')
            .listen('RealTimeMessage', (e) => {
        });
    </script>

<script>
    // doit recuperer la session user
    Echo.private('negociation.243')
        .listen('RealtimeNegociation', (e) => {
    // affectation de l'id au current user
    $('#hidden-current-conversation').val(e.user['id'])
    var message = e.message;
    let message_avant = document.getElementById('marchand-messageSender');
    let message_element = '<div class="right-container-elt2"><div style="height: 18px;width: 120px;margin-left:299px;"><p style="height: 18px;color: #8D97A5;font-family: Roboto;font-size: 12px;font-weight: 500;letter-spacing: 0.5px;line-height: 18px;text-align: right;">03/03/2022 à 18h10</p></div><div style="border-radius: 5px;background-color: #D8D8D8; width: 419px; min-height: 30px; "><span style="margin-bottom: 5px; padding: 15px; position: relative;" class="marchand-msg-recu" id="marchand-msg-recu">'+message+'</span></div></div>'

    if ($('#special-zone-message'+e.user['id']).length > 0) {
        $('#special-zone-message'+e.user['id']).append(message_element)
    }else{
        $('.notification-msg-text').addClass('negociation-none')
        let div_element = document.createElement('div');
        div_element.style.width = '519px';
        div_element.style.height = '353px';
        // div_element.style.backgroundColor = '#ccc';
        div_element.innerHTML = message_element;
        div_element.setAttribute('id', 'special-zone-message'+e.user['id'])
        div_element.classList.add('notification-msg-text')
        $('.main-negociation-msg-section').append(div_element)
    }

    if ($('#zone-conversation'+e.user['id']).length > 0) {

    }else {
        let left_message_conversation = '<div id="zone-conversation'+e.user['id']+'" class="block1-body-content1" onclick="changeNegociation('+e.user['id']+')"><div class="div1-body-content1"><img src="<?php echo $_SESSION["boutique_profil_mage"];?>" alt="" class="img1-message"><img id="negociationStarterUser" src="uploads/avatars/'+e.user['image']+'" alt="" class="img2-message"></div><div class="div2-body-content1"><div class="line-conversation"></div></div> <div class="div3-body-content1"><div class="text-conversation-nv1"><p class="elt1-text-conservation-nv1">Négociation</p><p class="elt2-text-conservation-nv1"><span class="span-elt2-text-conservation-nv1">99+</span></p><p class="elt3-text-conservation-nv1"></p></div><div class="text-conversation-nv2">'+message+'</div><div class="text-conversation-nv3"><p class="elt1-text-conversation-nv3">Il y\'a une heure</p><p class="elt2-text-conversation-nv3"><i><img style="box-sizing:border-box;border: 1px solid #FFFFFF;" src="assets/images/icones-vendeurs2/ReadIconCopy.svg" alt=""></i></p></div></div></div>';
        $('#body-block1-left').prepend(left_message_conversation)
    }
    // recuperer les infos du produit par id
    let data_post = {
        produit_id: e.id_produit
    }

    $.ajax({
        method: 'POST',
        data: data_post,
        url: 'get_negociation_product_infos',
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        success: function(response) {
        let img_wht_principal = response['image'].replace('principales', '');

        let picture_zone = '<div class="container-body-b3 negociation-main-produit-section" style="display:none1"> <div class="negociation-produit-label">'+response['libelle']+'</div><div class="negociation-produit-pictures"><div style="padding-top: 12px;"> <div class="negociation-class-img-box"></div> <div class="negociation-class-img-box"></div> <div class="negociation-class-img-box"></div></div> <div style="margin-left: 11px;padding-top: 12px;"><p class="negociation-main-img-element" style="background-color: #000"><img id="negociation-main-produit-picture" src="/jdjd.png" alt="" style="width: 100%; height: 100%" /></p></div></div><div style="display:flex; "><div class="ref-negociation-div"><p class="ref-negociation-product">Ref : '+response['ref_produit']+'</p></div><div class="price-negociation-product"><span style=";margin-left:12px;"><i><img style="box-sizing: border-box;margin-top:6px;" src="assets/images/icones-vendeurs2/Chariot.svg"width="16px" height="16px;"  alt=""></i></span><p class="p-negociation-product">'+response['prix']+' </p><p class="p-product-negociation-currency">Fcfa</p></div></div><div style="display: flex;margin-left:33.5px;margin-top:9.5px"><div class="negociation-quantite-product"><p class="negociation-couleur-p">Quantité</p><p class="negociation-param-1">XX</p></div><div class="negociation-couleur-div"><p class="negociation-couleur-p">Couleur</p><span class="couleur-negociation-zone"><i style="margin-left: 12px;"><img src="assets/images/icones-vendeurs2/Path Copy 10.svg" alt=""></i></span></div><div class="negociation-caract-2"><p class="negociation-caract-2-p">Caract. 2</p><p class="negociation-caract-2-val">XX</p></div><div class="negociation-caract-div-3"><p class="negociation-caract-3">Caract.3</p><p class="negociation-caract-3-p">XX</p></div></div><a href="#" id="generer-code-acceuil-messagerie"><div class="negociation-generer-code">Générer un code</div></a></div>'
        $('#main-produit-negiciation-element').append(picture_zone)
        $('#negociation-main-produit-picture').attr('src', 'uploads/'+img_wht_principal)
        console.log('bien here', img_wht_principal)
        },
    });

    });
</script>

<script>
Echo.private('App.User.<?php echo $user_id; ?>')
.listen('UserInRayon', (e) => {

    let id_user = e.message;

    if (e.type_event == 0) {
        let data_post = {
        id: e.message,
        id_produit: e.id_produit
    }

    $.ajax({
    method: 'POST',
    data: data_post,
    url: 'get_user_infos',
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    },

    success: function(response) {

    let img = '<img id="rayon-image-'+id_user+'" src="uploads/avatars/'+response['use-image']+'" alt="" class="avatar-en-rayon">'

    let img_wht_principal = response['produit_image'].replace('principales', '');
    let image_produit = '<img src="uploads/'+img_wht_principal+'" alt="" class="avatar-en-rayon">'

    let client_bottom = '<div class="zone-user" id="b-rayon-image-'+id_user+'"><div class="img-section"><img src="uploads/avatars/'+response['use-image']+'" alt="" > </div><div class="icon-zone"><img src="assets/images/oeil.svg" alt="" ></div><div class="over-section">'+image_produit+'</div></div>'

    $('.bottom-bar-float').append(client_bottom);

    if ($('#preview-user-in-rayon-1').find('.avatar-en-rayon').length == 0) {
        $('#preview-user-in-rayon-1').append(img)
    }else if($('#preview-user-in-rayon-1').find('.avatar-en-rayon').length > 0 && $('#preview-user-in-rayon-2').find('.avatar-en-rayon').length == 0){

        $('#preview-user-in-rayon-2').append(img)

    }else if($('#preview-user-in-rayon-2').find('.avatar-en-rayon').length > 0 && $('#preview-user-in-rayon-3').find('.avatar-en-rayon').length == 0){
        $('#preview-user-in-rayon-3').append(img)
    }else if ($('#preview-user-in-rayon-3').find('.avatar-en-rayon').length > 0 && $('#preview-user-in-rayon-4').find('.avatar-en-rayon').length == 0) {
        $('#preview-user-in-rayon-4').append(img)
    }

    let nombre_user_rayons = document.getElementById("userInRayonZoneHead").getElementsByClassName('avatar-en-rayon').length;

    let user_in_footer = document.getElementById('userInRayonFooter').getElementsByClassName('zone-user').length

    if (nombre_user_rayons ===4) {
        let val_supp = user_in_footer - 3
        $('#extra-user-in-rayon').removeClass('field-none')
        $('#preview-user-in-rayon-4').addClass('field-none')
        $('#in_rayon_user_counter').text('+'+val_supp)
    }
    }
  })

    }else if(e.type_event == 1) {
        $('#rayon-image-'+id_user).remove();
        $('#b-rayon-image-'+id_user).remove();
    }

  });
</script>

<script src="{{ asset('assets/owl-caroussel/dist/owlcarousel2-filter.min.js') }}"></script>
{{-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.5.6/cropper.css"/> --}}
<script src="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.5.6/cropper.js"></script>
<!-- Initialize Swiper -->
<script>
function showContinentPay(idContinent) {

var element1 = document.getElementById('continent'+idContinent+'')
console.log(element1)
if (element1.classList.contains('s-none')) {
    element1.classList.remove('s-none')
    element1.s
}
    }
jQuery(document).ready(function () {

$('#msg-negociation-retour').keypress(function() {
    var keycode = (event.keyCode ? event.keyCode : event.which);
    let msg_body = $('#msg-negociation-retour').val()
    let user_id = $('#hidden-current-conversation').val();
    let id_produit = 4;
    if(keycode == '13'){
    let sending_msg = '<div class="right-container-elt1" id="marchand-messageSender" ><p class="marchand-msg-envoye">'+msg_body+'</p></div>'
    $.ajax({
    type: 'POST',
    url: '/responde_negociation',
    data: {msg: msg_body, user_to: user_id, id_produit: id_produit},
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    },
    success: function(response) {
    $('#special-zone-message'+user_id).append(sending_msg);
    }
    })
    }
})

// partage de la boutique
$('#share-boutique-marchand').on('click', function() {

    var rayon_active = $('.rayon-marchand-dynamique');
    var rayon_active_id = 0

    rayon_active.each(function(index, element) {

    if ($(element).hasClass('rayon-hover')) {
        console.log('Voici le rayon active et son id est:', $(element).attr('data-rayonid'))
        rayon_active_id = $(element).attr('data-rayonid');
    }
    })

    $.ajax({
    method: 'POST',
    url: 'share_boutique_whatapp',
    data: {rayon_active: rayon_active_id},
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    },
    success: function(response) {

    $('#link-to-share').val(response)
    $('#myInBoutique').val(response)
    }
    })
    $('#shareBoutiqueModal').modal('show')
})

$('#famille-image-section').on('click', function() {
    $('.famille-image-zone').toggle();
})

$('.famille-image-zone').hide();

// vider la corbeille
$('#viderCorbeilBtn').on('click', function() {
    $('#corbeilleVideModal').modal('show')
})

$('#share-boutique-whatapp').on('click', function() {
    var link_to_share = $('#myInBoutique').val();
    window.open('https://wa.me/?text='+link_to_share+'', '_blank');
})

$('#share-boutique-facebook').on('click', function() {
    var link_to_share = $('#myInBoutique').val();
    window.open("https://www.facebook.com/sharer/sharer.php?u="+link_to_share+"", "_blank");
 })

$('#share-boutique-twiter').on('click', function() {
    var link_to_share = $('#myInBoutique').val();
    window.open('http://twitter.com/share?text=Votre boutique here&url='+link_to_share+'', '_blank');
})

$('#share-boutique-mail').on('click', function() {
    var link_to_share = $('#myInBoutique').val();
    window.location.href = "mailto:chrismedmadzou@gmail.com?subject=Subject&body="+link_to_share+"";
})

$('#share-boutique-copie-coller').on('click', function() {

    var copyText = document.getElementById("myInBoutique");
    // Select the text field
    copyText.select();
    copyText.setSelectionRange(0, 99999); // For mobile devices
    $('#messageSuccessMarchand').removeClass('field-none')
    $('#messageSuccessMarchand').css('margin-top', '16px')
    $('#zoneInputLien').addClass('field-none')
    // Copy the text inside the text field
    navigator.clipboard.writeText(copyText.value);

    setTimeout(function () {
        $('#messageSuccessMarchand').css('margin-top', '0px')
        $('#messageSuccessMarchand').addClass('field-none')
        $('#zoneInputLien').removeClass('field-none')
    }, 1000)

})

// ---------------------------------------- Display commande --------------------
let storage_data_commande = JSON.parse(window.localStorage.getItem('data_commande'));
if (storage_data_commande != null) {
    var id_commande = storage_data_commande['id_commande']
    var ref_commande = storage_data_commande['ref_commande']
    console.log('Here is local storage =>', storage_data_commande['id_commande'], 'AND ref is => ', storage_data_commande['ref_commande'])
    get_marchand_commandes()
    showMarchandCommandDetails(id_commande, ref_commande)


    $('#commandedet').modal('show')

    setTimeout(() => {
        window.localStorage.removeItem('data_commande')
    }, 3000);
}
})
</script>

    <script>

function viderProductMarchandOK() {
    $.ajax({
        method: 'POST',
        url: 'vider_boutique_corbeille',
        data: {},

        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },

        success: function(response) {
            if (response === "success") {
                window.location.href = "/acceuil-marchand-marchand"
            }
            console.log('Vider corbeille:', response)
        }

    })
}


// function activesup(){
//   $("#supbtk").css({"opacity":"1","cursor":"pointer"});
// }

// modifier les rayons par default
function activeModifierRayon(){
    if ($('#supbtk').hasClass('desable-default-rayon')) {
        $('#supbtk').removeClass('desable-default-rayon');
    }else {
        $('#supbtk').addClass('desable-default-rayon');
    }

}

function ouvcorb(){
    $("#vidcorb").toggle();
}
function opt(){
    $("#opt1").toggle();

}
function utilisateursXXX(){
    $("#clikF").show();
    $("#clikU").hide();
}

function cliquesXXX(){
    $("#clikF").hide();
    $("#clikU").show();
}
</script>
<script>

// tableau des pays exclus
var pays_exclu = []
var mode_expedition = [];
var modification_attribut = []
function boldStringProduit(str, find) {
    var reg = new RegExp('('+find.trim()+')', 'gi');
    return str.replace(reg, '<b class="mot-recherche-produit" >$1</b>');
}

function mouseOverItem(id) {
    let elementP = document.getElementById('prod_'+id).getElementsByTagName('b')
    $('#prod_'+id).find('b').removeClass('mot-recherche-produit')
    $('#prod_'+id).find('p').addClass('redColor');
}

function mouseLeaveItem(id) {
    $('#prod_'+id).find('b').addClass('mot-recherche-produit')
    $('#prod_'+id).find('p').removeClass('redColor');
}

function clearSearchText() {
    $('#searchProduitBar').val('')
    $('#searchProduitBar').focus()
    $('.search-button').addClass('lefted-element')
    $('.clean-text-suggestion').addClass('s-none')
    $('.ul-search').css('display','none')
    $('.produit-search-container').addClass('s-none')
    $('#result-sous-categorie-section').slideUp("slow");
    $('.resultat-element').css('padding-bottom', '0px')
}

$(document).ready(function(){

// pays exclus
$('#checkboxes input[type=checkbox]').change(function() {
    console.log('Hello here is good')
    var lieu_exclu = []
    if ($(this).is(':checked')) {

        var check_item = pays_exclu.indexOf($(this).val())

        if (check_item == -1) {
            pays_exclu.push($(this).val())
        }

        var span_id = $(this).attr('data-check')
        lieu_exclu.push($(this).val())
        var div_span2 = $('#pays-exclu-preview-bis').find('span')

    }else{
        var idp = $(this).attr('data-check')
        $('#zone_exclue-bis_'+idp).remove();

        var div_span2 = $('#pays-exclu-preview-bis').find('span')

        var check_item = pays_exclu.indexOf($(this).val())
        if (check_item > -1) {
            pays_exclu.splice(check_item, 1)
        }
    }

    if (pays_exclu.length > 0) {
        $('#pays-exclu-preview-bis').empty()
        $('#savePaysExclu1').prop('disabled', false)
        $('#savePaysExclu1').css('background-color', '#1A7EF5')
        $('#aucun-lieu-bis').addClass('s-none')
        $('#selected-lieux-section-bis').removeClass('s-none')
        for (let u = 0; u < pays_exclu.length; u++) {
        var textToPrint = pays_exclu[u] + (u != (pays_exclu.length - 1) ? "," : "")
        let selected_pays = '<span id="zone_exclue-bis_'+span_id+'" style="margin-right: 5px">'+textToPrint+'</span>'
        $('#pays-exclu-preview-bis').append(selected_pays)
    }
    }else {
        $('#savePaysExclu1').prop('disabled', true)
        $('#savePaysExclu1').css('background-color', '#ccc')
        $('#aucun-lieu').removeClass('s-none')
        $('#selected-lieux-section').addClass('s-none')
    }
    console.log('ouais c est ça', pays_exclu)

});

$("#searchProduitBar").keyup(function(){
var rechereVal = $('#searchProduitBar').val();
let rech = rechereVal.trim();

    if (rech.length == 0) {
    $('.suggestion-search-btn').addClass('disabled-search')
    $('.ul-search').css('display','none')
    $('.produit-search-container').addClass('s-none')
    $('#result-sous-categorie-section').slideUp("slow");
    $('.resultat-element').css('padding-bottom', '0px')
    $('#idsouscategorieSearch').val('')
    $('.clean-text-suggestion').addClass('s-none')
    $('.search-button').addClass('lefted-element')
    }else{

    $('.suggestion-search-btn').removeClass('disabled-search')
    $('.produit-search-container').addClass('s-none')
    $('.search-button').removeClass('lefted-element')
    $('.clean-text-suggestion').removeClass('s-none')
    $.ajax({
    type: "POST",
    url: "recherche_sous_categorie",
    data: {'valeurR': rechereVal},

    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    },

    success: function(response) {

    $('.ul-search').empty()
    if (response.length == 0) {
    $('.ul-search').append('<span style="position: relative; left: 120px; top: 30px">Aucun Résultat trouvé</span>')
    $('.ul-search').empty()
    $('.resultat-element').empty();
    $('.results-header-visible').addClass('s-none');
    $('.no-results-header').removeClass('s-none')
    $('.resultat-element').css('padding-bottom', '0px')
    $('#idsouscategorieSearch').val('')

    }else {
    $('#result-sous-categorie-section').slideDown("slow");
    $('.resultat-element').empty()
    $('.results-header-visible').removeClass('s-none');
    $('.no-results-header').addClass('s-none')
    $('.resultat-element').css('padding-bottom', '10px')
    for (let index = 0; index < response.length; index++) {
        var libelle = response[index].libelle

        console.log('Voici votre produit id:', response[index].id)
        let libelle_trimed = libelle.trim()

        var libis = '<aside class="search-product-item" onmouseleave="mouseLeaveItem('+response[index].id+')" onmouseover="mouseOverItem('+response[index].id+')" data-categorie="'+response[index].id_famille+'"  data-id="'+response[index].libelle+'" id="prod_'+response[index].id+'" onclick="getAllSousCategorieProduct('+response[index].id+')" style="  height: 33px; width: 646px; background-color: #fff; border-top:F5F5F5;border-bottom:#F5F5F5;"><p class="results-items-over" style="  color: #4A4A4A;-family: Roboto; font-size: 14px; letter-spacing: 0; line-height: 16px;margin-left:20px;margin-top:2px;"> <img src="assets/images/icones-vendeurs2/Plus-blanc.svg" style="margin-top:10px;"> &nbsp <span style="position: relative; top: 7px" class="text-result-search">'+boldStringProduit(libelle_trimed, rechereVal)+'</span></p></aside>'
        $('.resultat-element').append(libis)
    }
    }
    }
    })
    }
  });

    // suppression de la video
    $('#photo_5-bclose').click(function() {
        $('#preview_video').addClass('s-none')
        $('.video-play-button').remove()
        $('.main-image-section').removeClass('s-none')
    })

        // creer une nouvelle annonce en cas des resultats de la recherche non voulu
    $('#creer-nouvelle-annonce').on('click', function() {
        $("#creer-nouvelle-annonce").addClass('add-gray')
        let libelleSearch = $('#searchProduitBar').val();
        if (libelleSearch !== '') {

        let rayon_id = $('#rayon_id').val();

        if (rayon_id !== '') {
            $("#libelle-produit").val(libelleSearch)
            liClicked(rayon_id)
            $('#popupannonce-recheche').hide();
            $('#detailAnnonce').removeClass('none-detail-annonece')
        }else{
            liClicked(-1)
            $("#libelle-produit").val(libelleSearch)  //affectation du titre de l'annonce
            $('#popupannonce-recheche').hide();
            $('#detailAnnonce').removeClass('none-detail-annonece')
        }

        }else {
            console.log("Ce champ est bligatoire")
        }
        // ouverture du popup de preview
        $('#titre-annonce').text(libelleSearch)

        $("#creer-nouvelle-annonce").removeClass('add-gray')

    })

    $('#close-search-product').on('click', function() {
        $('#popupannonce-recheche').hide();
    })

    $('#description_produit').keyup(function() {
        var description = $('#description_produit').val()
        var description_no_space = description.replace(/\s/g, '');            var counter = description.length
        $('#produit-description-caracter-counter').text(counter +' / 4000 caractères')
    })

    });
    </script>


    <script type="application/javascript">

    var images_produit_web = [];
    var images_produit_normal = [];
    var caracteristique_supp = [];

    window.onload = function() {
    // fonction qui affiche les rayons d'un marchand
    $.ajax({
    method: 'GET',
    url: 'all_boutique_rayon',
    data: {},
    headers: {},
    success: function(response) {

    console.log('Tous les rayons sont là', response)

    const chunk = (arr, size) =>

    Array.from({ length: Math.ceil(arr.length / size) }, (v, i) =>
        arr.slice(i * size, i * size + size)
    );

    if (response.length < 6) {
        $('.main-zone-rayon-section').css('margin-top','0px')
    }

    let tableau_rayon = chunk(response, 6)

    for (let r = 0; r < tableau_rayon.length; r++) {
    var swiper = [];

    swiper = '<div class= "main-rayon-items swiper-slide">'

    for(let y = 0; y < tableau_rayon[r].length; y++) {
        if (tableau_rayon[r][y]['status_rayon'] == 1) {
            let id = tableau_rayon[r][y]['id']
            swiper += '<div data-rayonid = "'+tableau_rayon[r][y].id+'" id="bouton-rayon'+tableau_rayon[r][y].id+'" style="white-space: nowrap;overflow: hidden;" class="mesb rayon-marchand-dynamique rayon-hover" onclick="changeBackImage('+tableau_rayon[r][y].id+')"><a style="font-weight: 500;text-decoration:none; color: #fff" class="rayon-link-item" id="link'+tableau_rayon[r][y].id+'" href="#">'+tableau_rayon[r][y]["libelle"]+'</a></div>'
        }else{
            let id = tableau_rayon[r][y]['id']
            swiper += '<div data-rayonid = "'+tableau_rayon[r][y].id+'"  id="bouton-rayon'+tableau_rayon[r][y].id+'" style="white-space: nowrap;overflow: hidden;" class="mesb rayon-marchand-dynamique" onclick="changeBackImage('+tableau_rayon[r][y].id+')"><a style="font-weight: 500;text-decoration:none;" class="rayon-link-item" id="link'+tableau_rayon[r][y].id+'" href="#">'+tableau_rayon[r][y]["libelle"]+'</a></div>'
        }
    }

    swiper += '</div>'
        $('.swiper-wrapper').append(swiper);
    }

    }
    })

    $.ajax({
        method: 'GET',
        url: 'get_corbeille_number',
        data: {},
        headers: {},
        success: function(response) {
        $('#nbre_element-c').text(response);
        }
    })
    }

function showAddProduct() {
    $('#popupannonce-recheche').removeClass('s-none')
    $('#popupannonce-recheche').show()
    $('#searchProduitBar').focus();
}

function showMesCom() {
    $('#MesComMarch').modal('show')
}

function saveImageProvisoir(){
    var img_0_src = $('#photo_0-view').attr('src')
    if ($('#photo_0').get(0).files[0] == undefined && img_0_src == '') {
    }else {
        for (let i = 0; i < 6; i++) {
        var img = $('#photo_'+i).get(0).files[0]
        if (img != undefined) {
            images_produit_normal.push(img);
            $('#save-all-image-button').attr("disabled", "disabled");
                $('#save-all-image-button').css('background-color','#9B9B9B')
            $('#save-all-image-button').addClass('saved')
        }
    }
    }

    console.log(images_produit_normal)
    // console.log("Salut à tous")
}

function replaceButton(id) {
    var url1 = id.split("_").pop();
    var url2 = url1.split('-url')
    $('#'+id+'-button').addClass('s-none')
    $('#'+id+'-div').removeClass('s-none')
    $('#photo_'+url2[0]+'-url-value').focus()

}

function closeInputUrl(id) {
    var url1 = id.split("_").pop();
    var url2 = url1.split('-url')
    $('#photo_'+url2[0]+'-url-value').val("");
    $('#'+id+'-button').removeClass('s-none')
    $('#photo_'+url2[0]+'-url-div').find('p').css('margin-top', '5px')
    $('#'+id+'-div').addClass('s-none')

}

function rechercheProduit() {
    var rechereVal = $('#libelle-produit').val();
    if (rechereVal.length == 0) {
        // $('.ul-search').css('display','none')
    }else{
        $.ajax({
        type: "POST",
        url: "recherche_sous_categorie",
        data: {'valeurR': rechereVal},
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        success: function(response) {
            $('.ul-search').css('display','block')
            $('.ul-search').empty()
            // cas de resultat vide
            if (response.length == 0) {
                $('.ul-search').append('<span style="position: relative; left: 120px; top: 30px">Aucun Résultat trouvé</span>')
            }else {

                for (let index = 0; index < response.length; index++) {
                var li = '<li data-id="'+response[index].libelle+'" id="'+response[index].id+'" onclick="liClicked('+response[index].id+')">'+response[index].libelle+'</li>'
                console.log(li)
                $('.ul-search').append(li)
            }
            }
        }
    })
    }
}

function activeValidateButton() {
    var nom_caracteristique = $('#caracteristique_libelle').val()
    var attribute_1 = $('#attribute_1').val();
    if (attribute_1.length == 0) {
        $('#validateNomCaracteristique').css('background-color', '#D8D8D8')
        $('#validateNomCaracteristique').attr('disabled', 'disabled')
    }else{
        $('#validateNomCaracteristique').css('background-color', '#00B517')
        $('#validateNomCaracteristique').removeAttr('disabled')
    }
}


function setSelect() {
    var desiredOption = $("#selectVal").val();
    if (desiredOption == '') {
        $("#selectVal").focus();
        return false;
    }
    var hasOption = $('#mySelect option[value="' + desiredOption + '"]');
    if (hasOption.length == 0) {
        alert('No such option');
    } else {
        $('#mySelect').val(desiredOption);
    }
    $("#selectVal").select();
}

function getAllSousCategorieProduct(id) {

    let data_id = $('#prod_'+id).attr('data-id')
    let data_sous_cat = $('#prod_'+id).attr('data-categorie');
    $('#searchProduitBar').val(data_id)
    $('#idsouscategorieSearch').val(data_sous_cat)
    $('.ul-search').append('<span style="position: relative; left: 120px; top: 30px">Aucun Résultat trouvé</span>')
    $('.ul-search').empty()
    $('.resultat-element').empty();
    $('.results-header-visible').addClass('s-none');
    $('.no-results-header').removeClass('s-none')
    $.ajax({

    method: 'GET',
    url: 'produit_sous_categorie_rayon/'+id,
    data: {},
    headers: {},
    success: function(response) {

    // var rayonSelectVal = 6
    if (response.length > 0) {

    var universSelectedVal = response[0]['univer_id']
    var rayonSelectVal = response[0]['id']
    var categorie_id = response[0]['id_famille'];

    $('#rayon_id').val(response[0]['id'])
    var hasUniverOption = $('#univer-boutique option[value=" '+universSelectedVal+' "]')
    var hasRayonOption = $('#produit-rayon option[value="' +rayonSelectVal+ '"]') //check if rayon existe
    if (hasRayonOption.length > 0) {

    $('#rayon-section-label').text(response[0]['libelle'])
    $('#univer-boutique').val(universSelectedVal).select();
    $('#produit-rayon').val(rayonSelectVal).select() // chargement des rayons automatique

    // recuperation des categorie par rayon trouvé
    $.ajax({
    method: 'GET',
    url: 'rayon_familles',
    data: {id: $('#produit-rayon').find(':selected').val()},
    headers: {},
    success: function(response) {
    var familles = response[0]['familles']
    $('#produit-famille').empty()

    var famille_option = []

    for (let u = 0; u < familles.length; u++) {
        famille_option += '<option value = '+familles[u]['id']+'>'+familles[u]['libelle']+'</option>';
    }

    famille_option += '<option value="autre_famille">Autre catégorie</option>'
    $('#produit-famille').append(famille_option);
    $('#produit-famille').val(categorie_id).select() //remplissage de la catégoris

        // console.log('Ici les famille', response)
    }
    })

    // fin recuperation des categorie par rayon trouvé
    }
}else{
    console.log('ya rien ici')
    $('#rayon-section-label').removeClass('s-none')
    $('#rayon-section-label').text('Ce produit n\'est pas rangé dans un rayon')

}

    }
})

}

function searchProductBySousCategoris(id) {
    $('.suggestion-search-btn').addClass('suggestion-search-btn-focus')
    let id_sous_categorie = $('#idsouscategorieSearch').val();

    let libelleSearch = $('#searchProduitBar').val();

    console.log('Voici le libelle: ', libelleSearch)

    if (libelleSearch !== '') {
    if (id_sous_categorie != '') {
        let data_suggestion = {
            id_categorie: id_sous_categorie,
            libelle: libelleSearch,
        }
        $.ajax({
        type: "POST",
        url: "sous_categorie_product",
        data: data_suggestion,
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        success: function(response) {
        console.log('Nouvelle reponse est:', response)
        $('#search-product-result11').empty()
        if (response.length > 0) {
        $('#result-sous-categorie-section').hide()
        $('.produit-search-container').removeClass('s-none')
        $('#resultat_vide').remove();

        for (let i = 0; i < response.length; i++) {
            let card = '<article style="  height: 203px;width: 408px;border: 1px solid #D8D8D8; border-radius: 6px; margin-bottom: 10px; ">'

            card += '<aside style="  height: 183px;width: 183px; background-color:#D8D8D8;margin-left:10px;margin-top:10px;">'

            if (response[i]['id'] == 4 || response[i]['id'] == 5 || response[i]['id'] == 6) {
                card +='<img class="imagessearch" src="storage/images/produits/'+response[i]['image']+'" width: "183px" heigh="183px">'
            }else {
                card +='<img class="imagessearch" src="'+response[i]['image']+'" width: "183px" heigh="183px">'
            }
            card += '</aside><div style="box-sizing: border-box;height: 183px;width: 1px;border: 1px solid #f5f5f5; position: relative; top: -184px; left:200px"></div> <div style="height: 183px;width: 183px; margin-left:210px;margin-top:-367px;"><div style="height: 150px; width: 100%; background-color: #fff; position: relative"><p style="  color: #191970;font-family: Roboto;font-size: 12px;font-weight: 500;letter-spacing: -0.08px;line-height: 13px;text-align:left;">'+response[i]['libelle']+'</p>' ;

            card += '<p style="  color: #191970;font-family: Roboto;font-size: 12px;font-weight: 500;letter-spacing: 0;line-height: 11px;margin-left:10px; display: flex; flex-direction: column; row-gap: 10px">'
            let id_preoduit_vredre = response[i]['id'];
            $.ajax({
                type: 'GET',
                url: 'caracteristiqueByProduct/'+response[i]['id'],
                data: {},
                headers: {

                },
                success: function(response) {
                    console.log('Attribute places is here:', response)

                    for (let j = 0; j < response.length; j++) {
                        card += '<span style="position: relative; left: -10px"><span style="font-family:Roboto; font-weight: 300;">'+response[j]['lib_caract']+'</span> : <span style="font-family: Roboto; font-weight: 500">'+response[j]['lib_valeur']+'</span></span>'
                    }

                    card += '</p> </div><div style="height:40px; width: 100%; position: relative; top: -35px">'
                    card += '<hr style="width:185px;height:2px; background-color:#9B9B9B; position: relative; top: 5px; "><button class="vendre-meme-article" type="submit" style="" onClick="vendreMemeProduit('+id_preoduit_vredre+')">Vendre le même article</button></div></div></article>'

                    $('#search-product-result11').append(card)

                }
            })
        }

            }else {
                var msg_retour = "<p id='resultat_vide' style='text-align: center; position: relative; top: 50px'>Aucun resultat trouvé veillez clicker sur le bouton créer une annonce</p>"
                $('#result-sous-categorie-section').hide()
                $('.produit-search-container').removeClass('s-none')
                $('.produit-search-container').append(msg_retour)
            }

            $('.suggestion-search-btn').removeClass('suggestion-search-btn-focus')
        }
    })
    }else{

        if ($('#search-product-result11').empty()) {
            $('#search-product-result11').append('<span style="text-align:center; position: absolute;  margin-left:210px; margin-top:130px; color: #4A4A4A; line-height: 16px;" >Votre produit est unique, alors ne vous arretez pas là.<br> Créer le premier article de cette catégorie.</span>')
        }
        $('#result-sous-categorie-section').hide()
        $('.produit-search-container').removeClass('s-none')
        $('#resultat_vide').remove();
    }
    }else{

    }
}

function vendreMemeProduit(id) {

$('#popupannonce-recheche').hide();
$('#detailAnnonce').removeClass('none-detail-annonece')

$.ajax({
    method: 'GET',
    url: 'vendre_meme_produit/'+id,
    data: {},
    headers: {},
    success: function(response){
        // ----------------------- preview ---------------------
        $('#titre-annonce').text(response[0]['libelle'])
        $('#prix-appercu').text(response[0]['prix'])
        $('#libelle-produit').val(response[0]['libelle'])
        $('#description_produit').val(response[0]['description'])
        $('#suivant-step1').removeAttr('disabled')
        $('#suivant-step1').css('background-color', '#1A7EF5')
        $('#save-all-image-button').addClass('saved')
        $('#prix_achat').val(response[0]['prix'])
        $('#quantite_produit_disponible').val(response[0]['quantite'])
        $('#id_sous_cat').val(response[0]['sous_categorie_id'])
        $('#vendre-meme-produit').val('true')
        $('#produit-rayon').val(response[0]['id_rayon']).select()
        // chargement images
        $('#photo_0-view').attr('src', response[0]['image'])
        $('#photo_0-view').attr('height', "100px")
        $('#photo_0-view').attr('width', "100px")
        $('#photo_0-view').css({'display':'block', 'height': '100px !important', 'width': '100px !important'});
        $('#photo_0-view').css('border-radius','6px')
        $('#photo_0-view').css('margin-right','-4px')

        $('#photo_0-bclose').removeClass('s-none')
        $('#photo_0-bclose').css({'position': 'absolute', 'margin-top': '-80px', 'margin-right':'-80px'})
        $('#photo_0-b').css('display','none')

        // position: absolute; margin-top: -80px; margin-right: -80;

        $('.photo-button-section').addClass('s-none')
        $('#main-image-preview').attr('src', +response[0]['image'])
        $('#main-image-preview').css({'position': 'relative', 'border-radius': '6px'})
        // $('#main-image-preview').css('top', '12px')
        $('#main-image-preview').attr('height', "308px")
        $('#main-image-preview').attr('width', "308px")
        $('#main-image-preview1').addClass('s-none')
        $('#main-image-preview').removeClass('s-none')

        $('#photo_0-preview').attr('src', response[0]['image'])


        for (let j = 0; j < response[0]['produit_images'].length; j++) {
            var img_index = j+1
            $('#photo_'+img_index+'-view').attr('src', response[0]['produit_images'][j]['image'])
            $('#photo_'+img_index+'-view').attr('height', "100px")
            $('#photo_'+img_index+'-view').attr('width', "100px")
            $('#photo_'+img_index+'-view').css({'display':'block', 'height': '100px !important', 'width': '100px !important'});
            $('#photo_'+img_index+'-view').css('border-radius','6px')
            $('#photo_'+img_index+'-view').css('margin-right','-4px')

            $('#photo_'+img_index+'-bclose').removeClass('s-none')
            $('#photo_'+img_index+'-bclose').css({'position': 'absolute', 'margin-top': '-80px', 'margin-right':'-80px'})
            $('#photo_'+img_index+'-b').css('display','none')

            // ------------------------ preview  ----------------------------------------
            $('#photo_'+img_index+'-preview').attr('src', response[0]['produit_images'][j]['image'])

        }

        liClicked(response[0]['id_rayon'])
    }

})

}

function showMenuProfil() { // get commmande notification
    // get commmande notification
    $.ajax({
    type: 'GET',
    url: '/count_marchand_commandes',
    data: {},
    success: function(response) {
    console.log('Link:', response)
    if (response.length > 0) {
        $('#marchand-commande-counter_id').text(response.length)
        $('#marchand-commande-counter_id_1').text(response.length)
        console.log('Le nombre de commande est:', response)
    }else {
        $('#marchand-commande-counter_id_1').css('background-color', 'transparent')
        $('.marchand-commande-counter').css('background-color', 'transparent')
    }

    }
    })

    $('#gererEquipe').modal('show')

}

var elementLi = document.getElementsByClassName('marie');

// premier button suivant
function showTabAnnonceVente() {

    var libelle = $('#libelle-produit').val();
    var img = $('#photo_0').get(0).files;
    var img_0_src = $('#photo_0-view').attr('src')

    if (libelle.length == 0) {
        $('#libelle-produit').addClass('error-produit')
        setTimeout(function(){
            $('#libelle-produit').removeClass('error-produit')
        }, 5000)
    }

    if (img.length == 0 && img_0_src == '') {
        $('#photo_0-p').attr('src', 'assets/images/point_exclamation.svg')
        $('#photo_0-p').css('position', 'relative')
        $('#photo_0-p').css('left', '-10px')
        $('#photo_0-b').attr('disabled','disabled')
        $('#photo_0-berror').removeClass('s-none')
    }

    if(libelle.length > 0 && (img.length > 0 || img_0_src != '') && ($('#save-all-image-button').hasClass('saved') || images_produit_web.length > 0) ) {
    if ($('#step1AnnonceVente').hasClass('active-annonce-show')) {
        $('#step1AnnonceVente').removeClass('active-annonce-show')
        $('#step1AnnonceVente').addClass('s-none')
        $('#step2AnnonceVente').removeClass('s-none')
        $('#step2AnnonceVente').addClass('active-annonce-show')

    }else if ($('#step2AnnonceVente').hasClass('active-annonce-show')) {
        $('#step2AnnonceVente').removeClass('active-annonce-show')
        $('#step1AnnonceVente').addClass('s-none')
        $('#step2AnnonceVente').addClass('s-none')
        $('#step3AnnonceVente').removeClass('s-none')
        $('#step3AnnonceVente').addClass('active-annonce-show')
    }
    }

    // controlle du choix de l'image de l'étagère
    if ($('#getIdImages').val().length == 0) {
        $('.image-section-zone').css('border-color', '#D0021B');
    }

    }

    function showTabAnnonceVenteAnnuler() {

    if ($('#step3AnnonceVente').hasClass('active-annonce-show')) {
        $('#step3AnnonceVente').removeClass('active-annonce-show')
        $('#step3AnnonceVente').addClass('s-none')
        $('#step2AnnonceVente').removeClass('s-none')
        $('#step2AnnonceVente').addClass('active-annonce-show')
    }else if ($('#step2AnnonceVente').hasClass('active-annonce-show')) {
        $('#step2AnnonceVente').removeClass('active-annonce-show')
        $('#step2AnnonceVente').addClass('s-none')
        $('#step1AnnonceVente').removeClass('s-none')
        $('#step1AnnonceVente').addClass('active-annonce-show')
    }
    }

    let photo_product = array();

function showTabAnnonceCreationProduit() {
    $('#searchProduitBar').val("")
    $('#libelle-produit').val("")
    $('#prix_achat').val("")
    $('#quantite_produit_disponible').val("")
    $('#nbre_produit_lot').val("")
    $('#accepter_offre_inferieur-valeur').val("");
    $('#refuse_offre_inferieur-value').val("")
    $('#detail-retour').val("")
    $('#description_produit').val("")

    $('#photo-counter').text("")
    clearSearchText();
    if ($('#photo_0-view').attr('src') != "") {
    supprimerImage('photo_0')
    }

    if ($('#photo_1-view').attr('src') != "") {
    supprimerImage('photo_1')
    }

    if ($('#photo_2-view').attr('src') != "") {
    supprimerImage('photo_2')
    }

    if ($('#photo_3-view').attr('src') != "") {
    supprimerImage('photo_3')
    }

    if ($('#photo_4-view').attr('src') != "") {
    supprimerImage('photo_4')
    }

    if ($('#photo_5-view').attr('src') != "") {
    supprimerImage('photo_5')
    }


    $('#step3AnnonceVente').removeClass('active-annonce-show')
    $('#step3AnnonceVente').addClass('s-none')
    $('#step1AnnonceVente').removeClass('s-none')
    $('#step1AnnonceVente').addClass('active-annonce-show')

    $('#detailAnnonce').addClass('none-detail-annonece')

    }


    function checkvente_par_lot() {
        if ($('#vente_par_lot').is(":checked")) //
        {
            $('#nbre_produit_lot').removeClass('desable-input');
        }else {
            $('#nbre_produit_lot').addClass('desable-input');
        }
    }

    function check_negociation() {
        if ($('#negociation_prix').is(":checked"))
        {
            $('#negociation-desactivation').removeClass('negociation-section')
        }else {
            $('#negociation-desactivation').addClass('negociation-section')
        }
    }

    // activer/desactiver les options de retour
    function option_retour_activation() {
        if ($('#check_negociation_reduction').is(":checked"))
        {
            $('#achat-multiple-values').removeClass('negociation-section')
        }else {
            $('#achat-multiple-values').addClass('negociation-section')
        }
    }


    function check_mode_expedit_international() {
        if ($('#mode_expedition_international').is(":checked")) //
        {
            $('#expedition-international-disable').addClass('s-none');
            $('#expedition-international-active').removeClass('s-none');
        }else {
            $('#expedition-international-disable').removeClass('s-none');
            $('#expedition-international-active').addClass('s-none');
        }
    }


    function linechecked() {
        // console.log("Bonjour à tous")
    }

    function changeModeExpedition(id_mode) {
        // console.log('Modifier l\expedition:', id_mode)
        showModeExpeditionModification(id_mode)
    }

    function display_no_coma () {
        for (var crrLine = 0; crrLine < katzDeliLine.length; crrLine++) {
            textToPrint = textToPrint + (crrLine + 1) + ". " + katzDeliLine[crrLine] + (crrLine != (katzDeliLine.length - 1) ? "," : "")
        }
    }

    function addExclusion() {
        $("#dtServiceExpe").removeClass('hide');
        $('#dtservice').addClass('hide');
        $('#kingPop').addClass('hide'); // Custom Popup
    }

    function fermerPaysExclu() {
    if (pays_exclu.length > 0) {
        console.log('vous devez sauvegarder avant', pays_exclu)
    }else{
        document.getElementById('creer-list-exclusion').innerText = 'Créer une liste d’exclusions'
        $("#dtServiceExpe").addClass('hide');
        $('#kingPop').removeClass('hide'); // Custom Popup
        $('#dtservice').addClass('hide');
    }

    }

    function addAttributeElements() {

        var input_container = document.getElementById('myInputCaracteristiqueContainer')
        var input_element = input_container.getElementsByTagName('input')
        var index_elemnt = input_element.length + 1

        var element = '<div style="margin-left: 5xp" id="attribute-div_'+index_elemnt+'"><input class="add-input-caracteristique" id="attribute_'+index_elemnt+'" type="text" style="height: 31px; width: 118px; border-radius: 6px; background-color: #F8F8F8; padding-left: 10px; outline: none; border: none; margin-left: 5px"><span id="attribute-close_'+index_elemnt+'"  onclick="deleteThis('+index_elemnt+')" class="clean-text-suggestion" style="position: absolute; margin-left: -16px; background-color: #fff; color: red; font-size: 14px">&times;</span></div>'
        $(element).insertBefore(".bouton-ajout-caract")

        if (input_element.length == 6) {
            $(".bouton-ajout-caract").addClass('s-none')

            var tab_value = [];
            for (let i = 0; i < input_element.length; i++) {
                tab_value.push(input_element[i].value)
            }
        }

    }


    function validerCaracteristique() {
        var input_container = document.getElementById('myInputCaracteristiqueContainer')
        var input_element = input_container.getElementsByTagName('input')
        var tab_value = [];
        var caracteristique_libelle = $('#caracteristique_libelle').val();
        var caracteristique_id = caracteristique_libelle.replace(/\s/g, '').toLowerCase();

        for (let i = 0; i < input_element.length; i++) {
            tab_value.push(input_element[i].value)
        }

        var element1 = []
        var caracteristique_select = document.getElementsByClassName('caracteristique-zone')

        element1.push(caracteristique_id)

        var existing_value = $('#tabcaracteristique').val()
        let tablCar = []

        if (existing_value.length != '') {
            tablCar = existing_value.split(',');
        }

        tablCar.push(caracteristique_id)
        $('#tabcaracteristique').val([tablCar])

        var new_caracteristique_id = $('#tabcaracteristique').val()

        // enregistrement des nouveau caracteristique
        $.ajax({
        method: 'POST',
        url: 'save_caracteristique_client',
        data: {caracteristique: tab_value, libelle: caracteristique_libelle},
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        success: function(response) {

        caracteristique_supp.push(response)
        $('#carateristiqueSuppAdded').val([caracteristique_supp])
        console.log('Votre element:', response[0])
        // debut du traitement retour
        var select_element = []

        var select_element_preview = []
        select_element = "<div class='caracteristique-zone'><label class='labele-items' style='position: relative; left: 0px'><small class='red-star'>*</small>"+response[0]['libelle']+"</label><select class='caracterisqueProd' select-type='Supplementaire' data-select='"+caracteristique_libelle+"' name='"+caracteristique_libelle+"' id='"+caracteristique_id+"'>"

        for (let i = 0; i < response[0]['boutique_produit_caracteristique'].length; i++) {
            let selection_option = response[0]['boutique_produit_caracteristique'][i]['valeur']
            tab_value.push(selection_option)
            select_element += "<option value="+response[0]['boutique_produit_caracteristique'][i]['id']+">"+selection_option+"</option>"
        }

        select_element += "</select>"
        select_element += "<div style='display: flex; margin-top: 5px'><span class='caracteristique-frequent-label'>Fréquent : </span><span class='caracteristique-frequent s-none'>iPhone 6s , iPhone 8 , iPhone X</span></div>"
        select_element += "</div>"

        select_element_preview = "<div class='caracteristique-zone-preview'><label class='labele-items' style='position: relative; left: 20px'><small class='red-star'>*</small>"+caracteristique_libelle+"</label><select class='caracterisqueProdPreview' data-select='"+caracteristique_libelle+"' name='"+caracteristique_libelle+"' id='"+caracteristique_id+"'>"

        for (let i = 0; i < input_element.length; i++) {
            select_element_preview += "<option>"+input_element[i].value+"</option>"
        }

        select_element_preview += "</select>"
        select_element_preview += "</div>"

        $(select_element).insertBefore('#btn-attr-product')  // chargement de la caracteristique

        // $('.caracteristique_element').append(select_element)
        $('.caracteristique-supplementaire').addClass('s-none')
        $('.caracteristique-preview-element').append(select_element_preview)

        if (caracteristique_select.length > 3) {
            $('#btn-attr-product').css('display', 'none')
            $('.caracteristique-supplementaire').addClass('s-none')
        }

        },
        error: function(error) {
            console.log('Erreur ajax')
        }
    })

 }

    function deleteThis(id) {
        var input_container = document.getElementById('myInputCaracteristiqueContainer')
        var input_element = input_container.getElementsByTagName('div')
        $('#attribute-div_'+id).remove();

        if(input_element.length < 7){
            $('.bouton-ajout-caract').removeClass('s-none')
        }
    }

    function showAjoutCaracteristique() {
        if ( $('.caracteristique-supplementaire').hasClass('s-none')) {
            $('.caracteristique-supplementaire').removeClass('s-none')
        }else{
            $('.caracteristique-supplementaire').addClass('s-none')
        }
    }

    // sauvegarder les pays exclue
    function sauveExpulsedCountry() {
        if (pays_exclu.length > 0) {
            $("#dtServiceExpe").hide();
            document.getElementById('creer-list-exclusion').innerText = 'Modifier la liste des pays exclus'
        }else {
            console.log("Vous n'avez rien à sauvegarder")
        }

    }


    function deleteProductMarchand(id) {
        $('#corbeilleHiddenId').val(id)
        $('#corbeilleDeleteModal').modal('show')
    }

    function deleteProductMarchandOK() {
    let id = $('#corbeilleHiddenId').val();
        $.ajax({
        method: 'GET',
        url: 'delete_product/'+id,
        data: {},
        headers: {},
        success: function(response) {
        console.log('Voici la reponse:', response)
        console.log('Le numero slide est:', response['numero_slide'], 'la ligne slide:', response['numero_ligne_slide'], 'et la position est', response['position_sur_etagere'])
        let currentCase = $('#addSlide'+response['numero_slide']+'-'+response['numero_ligne_slide']+'-'+response['position_sur_etagere']) // la case courante
        let bouton_ajout = '<button onclick="testCurentCase('+response['numero_slide']+', '+response['numero_ligne_slide']+', '+response['position_sur_etagere']+')" class="add-product-button-etagere not-active-product-btn" button-index="1" style="position: absolute;" onclick="showAddProduct()"><span class="add-product-icon">+</span></button>'
        // ------------------- create button ---------------------
        $(currentCase).find('.product-img-for-option').remove();
        $(currentCase).bind('mouseenter', processMouseEnter)
        $(currentCase).bind('mouseleave', processMouseLeave)
        $(currentCase).css('align-items', 'center')
        $(currentCase).addClass("slide-add-btn");
        $(currentCase).addClass('init-added-button')
        $(currentCase).append(bouton_ajout)
        $('#corbeilleDeleteModal').modal('hide')
            }
        })
    }

    function closeProduitSupp() {
        $('#corbeilleDeleteModal').modal('hide')
    }

    </script>

<script>

function zoomin(){
    var myImg = document.getElementById("marchandAvatarPic");
    var currWidth = myImg.clientWidth;
    if(currWidth == 500){
        alert("Maximum zoom-in level reached.");
    } else{
        myImg.style.width = (currWidth + 50) + "px";
    }
}

function zoomout(){

    var myImg = document.getElementById("marchandAvatarPic");
    var currWidth = myImg.clientWidth;
    if(currWidth == 50){
        alert("Maximum zoom-out level reached.");
    } else{
        myImg.style.width = (currWidth - 50) + "px";
    }

}

function getImageId(id){
    if ((id != 0) || (id != null) || (!_.isUndefined(id))){
    $('#getIdImages').val(id);

    $('#image-sur-etagere-2').val(id)

    $('#photo_0-k').removeClass('hide');
    $('#photo_0-pk').addClass('hide');

    $("#kingpop2").addClass('hide'); // olivier
    $('#kingPop').removeClass('hide'); // madzou
    $('.image-section-zone').css('border-color', '#00B517');

    }else{
        $('.image-section-zone').css('border-color', '#D0021B');
    }
}

    $(document).on('click', '#closeNowOk', function (e) {
            $("#kingpop2").addClass('hide');
            $('#kingPop').removeClass('hide');
    })

    $(document).on('click', '#closeNowOk1', function (e) {
            $("#dtservice").addClass('hide');
            $('#kingPop').removeClass('hide');
    })

    $(document).on('click', '#closeNowOk2', function (e) {
            $("#dtServiceExpe").addClass('hide');
            $('#kingPop').removeClass('hide');
    })

</script>

<script>

$("#libelle-produit").on('focus keyup', function() {
    var $input = $(this);
    var value = $input.val();
    var maxLength = parseInt($input.attr('maxlength'));
    console.log(maxLength);
    var remainingLength = maxLength - value.length;
    console.log(remainingLength);
    if (remainingLength < 0) {
        $input.val(value.substr(0, maxLength));
        remainingLength = 0;
    }
    $('#countings').text(value.length);
});


//****************************OLIVIER************************************************************** */
$(document).on('click', '#popMoney', function (e) {
    $('#modePaiementMarchand1').modal('show');
        $('#cartecredit1').removeClass('hide');
        $('#cartecredit2').addClass('hide');
        $('#servicebk1').removeClass('hide');
        $('#servicebk2').addClass('hide');
        $('#A_money').val('');
        $('#numero_marchandA').val('');
        $('#Mmoney').val('');
        $('#numero_marchandM').val('');
        $('#card_number01').val('');
        $('#card_name01').val('');
        $('#expiry_date01').val('');
        $('#cvv_01').val('');
        $('#airtelCodeMarchand').text('');
        $('#airtelCodeMarchand2').text('');
        $('#infoCredit').text('');
        $('#rapidDebug').addClass('hide'); // rapid debug


        $('#card_number01').removeClass('input-error-warning');
        $('#card_name01').removeClass('input-error-warning');
        $('#cvv_01').removeClass('input-error-warning');
        $('#expiry_date01').removeClass('input-error-warning');


        $.ajax({
        method: 'GET',
        url: 'get_money_marchand/',
        success: function(response) {

        if(response.status == 200){
        $("#paiem11").show();
        setTimeout(function(){
            $('#servicebk1').addClass('hide'); // HIDE MOBILE FORM
            $('#servicebk2').removeClass('hide'); // SHOW MODIF BUTTONS
        }, 500);

        $('#show1').addClass('hide'); //DEL BUTTON AIRTEL
        $('#getout').addClass('hide'); // SHOW MONEY LABEL AIRTEL
        $('#show2').addClass('hide'); //DEL BUTTON MOOV
        $('#getout1').addClass('hide'); // SHOW MONEY LABEL MOOV

        $('#modifyMoneynow').removeClass('hide'); //MODIFY MOBILE
        $('#deleteMmoney').removeClass('hide'); //DELETE MOBILE

        $('#createMoneynow').removeClass('hide'); // CREATE MONEY

        //************CARD PREP************** */
        setTimeout(function(){
            $('#cartecredit1').addClass('hide'); // HIDE CARD FORM
            $('#cartecredit2').removeClass('hide'); // SHOW MODIF BUTTONS
            $('#rapidDebug').removeClass('hide'); // rapid debug

        }, 500);

        _.each(response.cardInfo, function(model){
            var lastthree = model.numero_carte.substr(model.numero_carte.length - 4);
            $('#card_number01').val(model.numero_carte);
            $('#card_name01').val(model.nom_sur_carte);
            $('#expiry_date01').val(model.date_expiration);
            $('#cvv_01').val(model.numero_cvv);
            $('#id_boutique').val(model.id_boutique);
            $('#affichageState2').text(model.type_carte);
            $('#infoMoney2').text('************'+' '+lastthree);
            $('#infoCredit').text(model.type_carte+' '+'****'+' '+lastthree);
            $('#flexCheckDefault1').prop('checked', true);
            $('#flexCheckDefault2').prop('checked', false);
            $('#flexCheckDefault2').prop('disabled', true);
        })

        _.each(response.moneyInfo, function(model){

    if(model.type_service == 'airtel' && model.status == 0){
        $('#A_money').val(model.nom_service);
        $('#numero_marchandA').val(model.numero_marchand);
        $('#id_marchand').val(model.id_marchand);
        $('#airtelCodeMarchand').text(model.numero_marchand);
        $('#get_status').val(1);
        $('#modifyMoneynow').removeClass('hide'); //MODIFY MOBILE
        $('#deleteMmoney').removeClass('hide'); //DELETE MOBILE
        $('#createMoneynow').addClass('hide'); // CREATE MONBEY
        $('#show1').removeClass('hide'); //DEL BUTTON AIRTEL
        $('#getout').removeClass('hide'); // SHOW MONEY LABEL AIRTEL
        $('#modifMarchandMoney01').removeClass('hide'); // Submit button
        $('#CancelMobile').removeClass('hide');
        $('#modifMarchandMoney02').addClass('hide'); //Register button

    }

    if(model.type_service == 'moov' && model.status == 0){
        $('#Mmoney').val(model.nom_service);
        $('#numero_marchandM').val(model.numero_marchand);
        $('#id_marchand').val(model.id_marchand);
        $('#get_status').val(2);
        $('#airtelCodeMarchand2').text(model.numero_marchand);
        $('#modifyMoneynow').removeClass('hide'); //MODIFY MOBILE
        $('#deleteMmoney').removeClass('hide'); //DELETE MOBILE
        $('#createMoneynow').addClass('hide'); // CREATE MONEY
        $('#show2').removeClass('hide'); //DEL BUTTON MOOV
        $('#getout1').removeClass('hide'); // SHOW MONEY LABEL MOOV
        $('#modifMarchandMoney01').removeClass('hide'); // Submit button
        $('#CancelMobile').removeClass('hide');
        $('#modifMarchandMoney02').addClass('hide'); //Register button

        }
    })
    }// fin 200

    if(response.status == 201){
    $("#paiem11").show();
    $("#paiem4").hide();
    $("#paiem10").hide();

    setTimeout(function(){
        $('#servicebk2').addClass('hide'); //HIDE MODIF BUTTONS
        $('#servicebk1').removeClass('hide'); //SHOW MOBILE FORM

        $('#cartecredit1').addClass('hide'); // HIDE CARD FORM
        $('#cartecredit2').removeClass('hide'); // SHOW MODIF BUTTONS

    }, 500);

    $('#modifMarchandMoney01').addClass('hide'); // SUBMIT BUTTON
    $('#CancelMobile').addClass('hide');
    $('#modifMarchandMoney02').removeClass('hide'); // REGISTER BUTTON
    _.each(response.cardInfo, function(model){
    var lastthree = model.numero_carte.substr(model.numero_carte.length - 4);
    $('#card_number01').val(model.numero_carte);
    $('#card_name01').val(model.nom_sur_carte);
    $('#expiry_date01').val(model.date_expiration);
    $('#cvv_01').val(model.numero_cvv);
    $('#id_boutique').val(model.id_boutique);
    $('#id_marchand').val(model.id_marchand);
    $('#affichageState2').text(model.type_carte);
    $('#infoMoney2').text('************'+' '+lastthree);
    $('#infoCredit').text(model.type_carte+' '+'********'+' '+lastthree);
    $('#flexCheckDefault1').prop('checked', true);
    $('#flexCheckDefault2').prop('checked', false);
    $('#flexCheckDefault2').prop('disabled', true);
    })

} // fin 201


if(response.status == 202){ // NO CREDIT CARD or DELETED

    $("#paiem11").hide();

    $('#modifMarchandMoney01').removeClass('hide'); // Submit button
    $('#CancelMobile').removeClass('hide');

    setTimeout(function(){
        $('#servicebk1').addClass('hide'); // HIDE MOBILE FORM
        $('#servicebk2').removeClass('hide'); // SHOW MODIF BUTTONS
        $('#rapidDebug').removeClass('hide'); // rapid debug
    }, 500);

    $('#show1').addClass('hide'); //DEL BUTTON AIRTEL
    $('#getout').addClass('hide'); // SHOW MONEY LABEL AIRTEL
    $('#show2').addClass('hide'); //DEL BUTTON AIRTEL
    $('#getout1').addClass('hide'); // SHOW MONEY LABEL AIRTEL
    //****************PREP CARD************************ */

    setTimeout(function(){
    $('#cartecredit1').removeClass('hide'); // SHOW CARD FORM
    $('#cartecredit2').addClass('hide'); // SHOW MODIF BUTTONS

    $('#card_number01').val('');
    $('#card_name01').val('');
    $('#expiry_date01').val('');
    $('#cvv_01').val('');
    $('#modifMarchandMoney').addClass('hide'); //MODIFY CARD
    $('#CancelMoney').addClass('hide');
    $('#regMarchandMoney').removeClass('hide'); //CREATE NEW CARD

    _.each(response.moneyInfo, function(model){

        if(response.moneyInfo.length == 2){

        $('#getout').css('display', 'block'); // SHOW MONEY LABEL AIRTEL

        $("#paiem4").show();
        $("#paiem10").show();


        if(model.type_service == 'airtel' && model.status == 0){
            $('#A_money').val(model.nom_service);
            $('#numero_marchandA').val(model.numero_marchand);
            $('#id_marchand').val(model.id_marchand);
            $('#airtelCodeMarchand').text(model.numero_marchand);
            $('#get_status').val(1);
            $('#modifyMoneynow').removeClass('hide'); //MODIFY MOBILE
            $('#deleteMmoney').removeClass('hide'); //DELETE MOBILE
            $('#createMoneynow').addClass('hide'); // CREATE MONBEY
            $('#show1').removeClass('hide'); //DEL BUTTON AIRTEL
            $('#getout').removeClass('hide'); // SHOW MONEY LABEL AIRTEL
            // $('#modifMarchandMoney01').removeClass('hide'); // Submit button
            // $('#CancelMobile').removeClass('hide');
            $('#affichageState').text('AIRTEL');
            $('#infoMoney').text(model.numero_marchand);
            $('#modifMarchandMoney02').addClass('hide'); //Register button

        }
        if(model.type_service == 'moov' && model.status == 0){
            $('#Mmoney').val(model.nom_service);
            $('#numero_marchandM').val(model.numero_marchand);
            $('#id_marchand').val(model.id_marchand);
            $('#get_status').val(2);
            $('#airtelCodeMarchand2').text(model.numero_marchand);
            $('#modifyMoneynow').removeClass('hide'); //MODIFY MOBILE
            $('#deleteMmoney').removeClass('hide'); //DELETE MOBILE
            $('#createMoneynow').addClass('hide'); // CREATE MONEY
            $('#show2').removeClass('hide'); //DEL BUTTON MOOV
            $('#getout1').removeClass('hide'); // SHOW MONEY LABEL MOOV
            // $('#modifMarchandMoney01').removeClass('hide'); // Submit button
            // $('#CancelMobile').removeClass('hide');
            $('#affichageState1').text('MOOV');
            $('#infoMoney1').text(model.numero_marchand);
            $('#modifMarchandMoney02').addClass('hide'); //Register button

        }
        }else{

        $('#modifMarchandMoney01').removeClass('hide'); // Submit button
        $('#CancelMobile').removeClass('hide');

        if(model.type_service == 'airtel' && model.status == 0){
            $('#A_money').val(model.nom_service);
            $('#numero_marchandA').val(model.numero_marchand);
            $('#id_marchand').val(model.id_marchand);
            $('#airtelCodeMarchand').text(model.numero_marchand);
            $('#get_status').val(1);
            $('#modifyMoneynow').removeClass('hide'); //MODIFY MOBILE
            $('#deleteMmoney').removeClass('hide'); //DELETE MOBILE
            $('#createMoneynow').addClass('hide'); // CREATE MONBEY
            $('#show1').removeClass('hide'); //DEL BUTTON AIRTEL
            $('#getout').removeClass('hide'); // SHOW MONEY LABEL AIRTEL
            // $('#modifMarchandMoney01').removeClass('hide'); // Submit button
            // $('#CancelMobile').removeClass('hide');
            $('#modifMarchandMoney02').addClass('hide'); //Register button
            $('#affichageState').text('AIRTEL');
            $('#infoMoney').text(model.numero_marchand);

            $("#paiem10").hide();
            $("#paiem4").show();
        }
        if(model.type_service == 'moov' && model.status == 0){
            $('#Mmoney').val(model.nom_service);
            $('#numero_marchandM').val(model.numero_marchand);
            $('#id_marchand').val(model.id_marchand);
            $('#get_status').val(2);
            $('#airtelCodeMarchand2').text(model.numero_marchand);
            $('#modifyMoneynow').removeClass('hide'); //MODIFY MOBILE
            $('#deleteMmoney').removeClass('hide'); //DELETE MOBILE
            $('#createMoneynow').addClass('hide'); // CREATE MONEY
            $('#show2').removeClass('hide'); //DEL BUTTON MOOV
            $('#getout1').removeClass('hide'); // SHOW MONEY LABEL MOOV
            // $('#modifMarchandMoney01').removeClass('hide'); // Submit button
            // $('#CancelMobile').removeClass('hide');
            $('#modifMarchandMoney02').addClass('hide'); //Register button
            $('#affichageState1').text('MOOV');
            $('#infoMoney1').text(model.numero_marchand);

            $("#paiem4").hide();
            $("#paiem10").show();
        }

            }
        })
    }, 500);
    } //fin 202
} // fin success
}) // find AJAX
}); //popMoney

</script>

@endsection
