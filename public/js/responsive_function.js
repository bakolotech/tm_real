
// small devices
var init_small_height = 768;
var init_small_width = 1366;
var init_small_rapport = (768/1366)*100;

// medium device
var init_medium_height = 728;
var init_medium_width = 1366;
var init_medium_rapport = (728/1366)*100

// tm_model
var init_tm_height = 816;
var init_tm_width = 1536;
var init_tm_rapport = (816/1536)*100

// large device
var init_large_height = 1080;
var int_large_width = 1920;
var init_large_rapport = (1080/1920)*100



// $('.supp_classes').css('height', 'auto')

function telephonie_onload_taille(taille_ecran, rayon_container, rayon_ligne) {


}

function tv_onload_taille(taille_ecran, rayon_container, rayon_lignes) {



}

function jeux_onload_taille(taille_ecran, rayon_container, rayon_lignes) {

}

function reseau_informatique_onload_taille(taille_ecran, rayon_container, rayon_lignes) {

}

function telephonie_show_categorie(taille_ecran, rayon_container, rayon_ligne, scoped_slide) {

}

function tv_show_categorie(taille_ecran, rayon_container, rayon_lignes) {

}

function jeux_show_categorie(taille_ecran, rayon_container, rayon_lignes) {

 }

 function reseau_show_categorie(taille_ecran, rayon_container, rayon_ligne, scoped_slide) {

}

    function telephonie_carousel(taille_ecran, rayon_container, rayon_ligne) {

    }

    function beginCalculation() {

        var container_height = document.getElementById('zone_produit_calculate').offsetHeight
        var container_width = document.getElementById('zone_produit_calculate').offsetWidth

        if (container_height > 476) {

        // Process of the thirth element
        var new_height = 476 / container_height
        var new_height_final = new_height*100;

        var firth_h = new_height_final + 93.6;
        var fourth_h = new_height_final + 93.6

        $('.etagere_col_fouth_element').css('height', fourth_h)
        $('.etagere_col_fith_element').css('height', firth_h)
        console.log('Height => ', container_height, 'Width => ', container_width)

        }


    }
