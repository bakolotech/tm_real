<style>
    .main-prod-detail-modal {
        display: none !important
    }

    .main-detail-produit-2 {
        width: 100%;
        height: 100vh;
        position: absolute;
        background-color: rgba(0, 0, 0, 0.5);
        z-index: 3000;
        transition: opacity 1.5s ease-in-out;
    }

    .section-produit {
        animation: tm_fadein 0.5s;
    }

    .section-mobile {
        animation: tm_fadein 0.5s;
    }

    @keyframes tm_fadein {
        0% { margin-top: -10%; opacity: 0.8; }
        100% { margin-top: 0%; opacity: 1; }
    }

    @keyframes tm_fadeout {
        0% { margin-top: 50%; opacity: 1; }
        100% { margin-top: -100%; opacity: 0; }
    }

    .disable-mobile-acha-btn {
        width: 138px;
        height: 32px;
        pointer-events: none;
    }

</style>

<div class="main-prod-detail-modal main-detail-produit-2" id="recap-produit-main-modal">

    <div class="section-produit">
    @include('front.app-module.rayon.recap_produit_component.recap_produit_detail')
    </div>

<!-- Fin main modal product  -->
    <div class="section-descriptions-produit main-prod-detail-modal" id="section-descriptions-produit-id">
        @include('front.app-module.rayon.recap_produit_component.recap_produit_description')
        <!-- description zone  -->
    </div>

    <div class="section-messagerie main-prod-detail-modal" id="section-messagerie-id">
        @include('front.app-module.rayon.recap_produit_component.recap_produit_messagerie')
        <!-- messagerie section  -->
    </div>

    <div class="section-mobile main-prod-detail-modald" id="section-mobile-id" style="display: nonei">
        @include('front.app-module.rayon.recap_produit_component.recap_produit_mobile')
    </div>

</div>

<script type="text/javascript">

    const quantite = document.getElementById("quantite");
    const quantite_mobile = document.getElementById("quantite_mobile");
    const p_input = document.getElementById("p_input");
    const prix = document.getElementById("prix_total");
    const prixm = document.getElementById("prix_total_mobile");
    const prix_mobile = document.getElementById("prix_total_mobile");
    const price_first = document.getElementById("price_first");
    const libelle = document.getElementsByClassName("article-title");
    const id_produit = document.getElementById("id_produit");
    const ref_produit = document.getElementById("reference_produit_client");
    const carac_produit = document.getElementById("carac_produit");
    const carac_produit1 = document.getElementById("carac_produit1");
    const carac_produit2 = document.getElementById("carac_produit2");
    const id_session = document.getElementById("id_session");
    const spinner = document.getElementById("spinner");
    const activation_but = document.getElementById("ajouter_panier_nouvel");
    const ajouter_panier = document.getElementById("ajouter_panier");
    const ajouter_panier_mobile = document.getElementById('ajouter_panier_mobile')
    const Enregistrer_panier_nouvel = document.getElementById("Enregistrer_panier_nouvel");
    const spinner_ajouter = document.getElementById("spinner_ajouter");
    const spinner_modifier = document.getElementById("spinner_modifier");
    const spinner_ajouter_nouvel = document.getElementById("spinner_ajouter_nouvel");
    const span1 = document.getElementById("span1");
    const span2 = document.getElementById("span2");
    const span0 = document.getElementById("aa");
    const span0_mobile = document.getElementById('aa_mobile')
    const imgButon0 = document.getElementById("imgButon0");
    const imgButon0_mobile = document.getElementById('imgButon0_mobile')
    const imgButon1 = document.getElementById("imgButon1");
    const imgButon2 = document.getElementById("imgButon2");

    const ajout_panier_produit = document.getElementById('ajouter_au_panier_success');

    const spinner_ajouter_mobile = document.getElementById("spinner_ajouter_mobile");

    function closeModalProduit() {
        let id_produit = $('#id_produit').val();
        $.ajax({
            type: 'GET',
            url: 'remove_from_rayon',
            data: {id: id_produit},
            cache: false,
            success: function(response) {
                console.log('Bonjour, here is your response', response)
            }
        })

        const monstyle = document.getElementById('recap-modification-produit')
        const modalelement = document.getElementById('main-element')
        modalelement.style.backgroundColor = "rgba(0, 0, 0, 0.5)";
        modalelement.style.width = "100%";
        monstyle.classList.remove('recap-modification-produit');
        $('#myModal').modal('hide');

    }

    function verifier_input() {
        let current_quantite = $('#quantite').val();
        if (current_quantite.length == 0) {
            $('#quantite').val(1)
        }
        console.log('me triggered here', current_quantite)
    }

    function make_calculation() {
        let current_quantite = $('#quantite').val();
        if (current_quantite.length == 0) {
            prix.innerHTML = product_instance['Detail_Produit'][0][0]['prix']+" Fcfa";
            return false
        }else {
            // quantite.value = parseInt(quantite.value) + 1
            let quantite_produit = $('#quantite').val();
            let current_price = $('#current_price').val()
            let prix_unitaire = product_instance['Detail_Produit'][0][0]['prix']
            let prix_total = quantite_produit * current_price
            prix.innerHTML = prix_total+" Fcfa"

            $('#Enregistrer_panier_nouvel').removeClass('desabled-modification-article')
            $('#ajouter_panier_nouvel').removeClass('desactive')
            $('#ajouter_panier_nouvel').prop('disabled', false)
        }
    }

    function testSendMessage() {
        $.ajax({
            type: 'POST',
            url: '/start_negociation',
            data: {id: 1},
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            success: function(response) {
                console.log('Voici la reponse', response)
            }
        })
    }

    function ajout_panier_mobile() {

    let quantite_mobile = $('#quantite_mobile').val();
    imgButon0_mobile.style.display = "none";
    span0_mobile.innerHTML = ""
    ajouter_panier_mobile.disabled = true;

    var id_produit = product_instance['Detail_Produit'][0][0]['id'];
    var reference_produit = product_instance['Detail_Produit'][0][0]['ref_produit'];
    var prix_unitaire_produit = product_instance['Detail_Produit'][0][0]['prix'];

    var tab_caracteristique = {};

    var prix_total = Number(quantite_mobile) * Number(prix_unitaire_produit);

    for(let u = 0; u < 3; u++) {
        let label_caract = $('#mobile-carac_produit-Label'+u).text();
        tab_caracteristique[label_caract] = $('#mobile-carac_produit'+u).find(':selected').text();
    }

    var produit = {
        'quantite': quantite_mobile,
        'prix': prix_unitaire_produit,
        'id_produit': id_produit,
        'prix_total': prix_total,
        'ref': reference_produit,
        'carac': tab_caracteristique
    };

    console.log(' Votre produit à envoyé est bien => ', produit )

    $.ajax({
    type: 'GET',
    url: '/panier/ajouter/',
    data: produit,
    cache: false,
    beforeSend: function(){
        $(ajouter_panier_mobile).addClass('disable-mobile-acha-btn')
        spinner_ajouter_mobile.classList.remove("none-messaboxe");
        spinner_ajouter_mobile.classList.add("spinner-border");
    },
    success: function(result) {
    console.log('panier_ajouter', result) //ok

    setTimeout(function() { // apparution du msg de success
    $('#ajouter_au_panier_success').removeClass('new_produit');
    }, 0);

    setTimeout(function() { // dispparution du msg de success 2s après
    $('#ajouter_au_panier_success').addClass('new_produit');
    }, 2000);

    setTimeout(function() { // apparution du msg de success
        // $('#myModal').modal('hide')
        $('#recap-produit-main-modal').addClass('main-prod-detail-modal')
        loadPanier()
        // voir_panier_poppop()
    }, 2000);

    if ($('#nbr_panier').attr('class') == '') { // traitement du compteur
        $('#nbr_panier').addClass("menu-item-counter");
        $('#nbr_panier').addClass("text-center");
    }

    $('#nbr_panier').text(result[0]['0']);

    if ($('#nbr_panier2').attr('class') == '') {
        $('#nbr_panier2').addClass("panier-counter");
        $('#nbr_panier2').addClass("text-center");
    }

    if (result[0]['0'] > 100) {
        $('#nbr_panier2').text('+99');
    }else {
        $('#nbr_panier2').text(result[0]['0']);
    }

    $('#nbr_panier2_hidden').text(result[0]['0'])


    $('#pp').text(result[0]['0'])

    },

    complete:function(data){
        // ajouter_panier.disabled = false;
        // spinner_ajouter.classList.add("none-messaboxe");
        // span0.innerHTML = "Ajouter au panier";
        // imgButon0.style.display = "inline";

        spinner_ajouter_mobile.classList.add("none-messaboxe");
        spinner_ajouter_mobile.classList.remove("spinner-border");

        $(ajouter_panier_mobile).removeClass('disable-mobile-acha-btn')

        imgButon0_mobile.style.display = "inline";
        span0_mobile.innerHTML = "Ajouter au panier"
        ajouter_panier_mobile.disabled = false;


    },

    error: function(error) {
        console.log('Pas bon')
    }

    });
}

function ajout_panier() {
    let quantite_produit = $('#quantite').val();
    imgButon0.style.display = "none";
    span0.innerHTML = "";
    ajouter_panier.disabled = true;
    // ajouter_panier.classList.add("desactive");
    let id_produit = product_instance['Detail_Produit'][0][0]['id']
    let reference_produit = product_instance['Detail_Produit'][0][0]['ref_produit']
    let prix_unitaire_produit = product_instance['Detail_Produit'][0][0]['prix']
    let tab_caracteristique = {}
    let prix_total = Number(quantite_produit) * Number(prix_unitaire_produit)

    for (let u = 0; u < 3; u++) {
        let label_caract = $('#carac_produit-Label'+u).text()
        tab_caracteristique[label_caract] = $('#carac_produit'+u).find(':selected').text()
    }

    let produit = {
        'quantite': quantite_produit,
        'prix': prix_unitaire_produit,
        'id_produit': id_produit,
        'prix_total': prix_total,
        'ref' : reference_produit,
        'carac' : tab_caracteristique,
    }

    $.ajax({
    type: 'GET',
    url: '/panier/ajouter/',
    data: produit,
    cache: false,
    beforeSend: function(){
        // spinner_ajouter.classList.add("spinner-border");
        spinner_ajouter.classList.remove("none-messaboxe");
    },
    success: function(result) {
    console.log('panier_ajouter', result) //ok

    setTimeout(function() { // apparution du msg de success
    $('#ajouter_au_panier_success').removeClass('new_produit');
    }, 0);

    setTimeout(function() { // dispparution du msg de success 2s après
    $('#ajouter_au_panier_success').addClass('new_produit');
    }, 2000);

    setTimeout(function() { // apparution du msg de success
        // $('#myModal').modal('hide')
        $('#marchand_video_preview_big_client').attr('src', " ")
        $('#recap-produit-main-modal').addClass('main-prod-detail-modal')
        loadPanier()
        // voir_panier_poppop()
    }, 2000);

    if ($('#nbr_panier').attr('class') == '') { // traitement du compteur
        $('#nbr_panier').addClass("menu-item-counter");
        $('#nbr_panier').addClass("text-center");
    }

    $('#nbr_panier').text(result[0]['0']);

    if ($('#nbr_panier2').attr('class') == '') {
        $('#nbr_panier2').addClass("panier-counter");
        $('#nbr_panier2').addClass("text-center");
    }

    if (result[0]['0'] > 100) {
        $('#nbr_panier2').text('+99');
    }else {
        $('#nbr_panier2').text(result[0]['0']);
    }

    $('#nbr_panier2_hidden').text(result[0]['0'])


    $('#pp').text(result[0]['0'])

    },

    complete:function(data){
        ajouter_panier.disabled = false;
        spinner_ajouter.classList.add("none-messaboxe");
        span0.innerHTML = "Ajouter au panier";
        imgButon0.style.display = "inline";
        
    },

    error: function(error) {
        console.log('Pas bon')
    }

    });
 }

function verifier_article () {
    quantite.value = parseInt(quantite.value)
    price_first.innerHTML = parseInt(price_first.innerHTML)
    let produit = {
        'quantite': quantite.value,
        'prix': price_first.value,
        'id_produit': id_produit.value,
        'prix_total': parseInt(price_first.value)*parseInt(quantite.value),
        'ref' : ref_produit.innerHTML,
        'carac' : carac_produit.value,
        'carac1' : carac_produit1.value,
        'carac2' : carac_produit2.value,
        'id_session' : id_session.value
    }

        // alert("test");

        $.ajax({
        type: 'GET',
        url: '/panier/verifier/',
        data: produit,
        cache: false,
        success: function(result) {

            if (result == 0) {
                activation_but.disabled = false ;
                activation_but.classList.remove("desactive")
            } else {
                activation_but.disabled = true;
                activation_but.classList.add("desactive")
            }

        },

        error: function(error) {
            console.log('Pas bon nouvel')
        }

        });

    }

// modification du produit du panier
function ajout_panier_modification() {

    imgButon1.style.display = "none";
    span1.innerHTML = "";

    Enregistrer_panier_nouvel.disabled = true;
    spinner_modifier.classList.add("spinner-border");
    spinner_modifier.classList.add("spinner-border-sm");

    let quantite = $('#quantite').val()
    let current_price = $('#current_price').val()
    let id_produit = $('#id_produit').val() // recuperation de l'id produit
    let prix_total = Number(current_price) * Number(quantite);
    // let id_session = $('#id_session').val();
    let id_session =  $('#id_session_update').val()
    let reference_produit = $('#reference_produit_client').text();

    let caracteristique = {}

    for (let v = 0; v < 3; v++) {
        let lib_car = $('#carac_produit-Label'+v).text();
        let car_val = $('#carac_produit'+v).find(':selected').text();
        caracteristique[lib_car] = car_val
    }

    let produit = {
        'quantite': quantite,
        'prix': current_price,
        'id_produit': id_produit,
        'prix_total': prix_total,
        'ref' : reference_produit,
        'carac' : caracteristique,
        'id_session': id_session,
    }

        $.ajax({
        type: 'GET',
        url: '/panier/modifier/',
        data: produit,
        cache: false,
        success: function(result) {

        console.log('panier_modifier', result) //ok

        if (result) {
            activation_but.disabled = true;
            activation_but.classList.add("desactive");
        }

        setTimeout(function() {
        $('#ajouter_au_panier_success_mofif').removeClass('new_produit');
        }, 0);

        setTimeout(function() {
        $('#ajouter_au_panier_success_mofif').addClass('new_produit');
        Enregistrer_panier_nouvel.disabled = false;
        // Enregistrer_panier_nouvel.classList.remove("desactive")
        spinner_modifier.classList.remove("spinner-border");
        spinner_modifier.classList.remove("spinner-border-sm");
        span1.innerHTML = "Enregistrer les modifications";
        imgButon1.style.display = "inline";
        }, 2000);

        $('#nbr_panier').text(result[0]['0'])
        $('#nbr_panier1').text(result[0]['0'])

            if (result[0]['0'] > 100) {
                $('#nbr_panier2').text('+99');
            }else {
                $('#nbr_panier2').text(result[0]['0']);
            }

            $('#nbr_panier2_hidden').text(result[0]['0'])
            $('#racourci_panier').text(result[0]['0'])
            $('#pp2').text(result[0]['0'])
            $('#Enregistrer_panier_nouvel').addClass('desabled-modification-article')
            // $('#ajouter_panier_nouvel').removeClass('desactive')

            reafficher();

        },

        error: function(error) {
            console.log('Pas bon')
            $('#ajout_panier_modification').prop('disabled', true);
        }

        });

    }

    function open_desk_mobile(){
        $(".none-messaboxe").css("display","block !important");
    }

// ajout d'un nouvel article
function ajouter_nouvel() {

    if(parseInt(quantite.value) < 0 || quantite.value == "" || isNaN(quantite.value)) {
        p_input.classList.add("p_input");
        setTimeout(function() {
        p_input.classList.remove("p_input");
        }, 500);
        quantite.value = 1
    } else {

    imgButon2.style.display = "none";
    span2.innerHTML = "";
    activation_but.disabled = true;
    // activation_but.classList.add("desactive");
    Enregistrer_panier_nouvel.disabled = true;
    // Enregistrer_panier_nouvel.classList.add("desactive");
    spinner_ajouter_nouvel.classList.add("spinner-border");
    spinner_ajouter_nouvel.classList.add("spinner-border-sm");

    let quantite = $('#quantite').val()
    let current_price = $('#current_price').val()
    let id_produit = $('#id_produit').val() // recuperation de l'id produit
    let prix_total = Number(current_price) * Number(quantite);
    let id_session = $('#id_session').val();
    let reference_produit = $('#reference_produit_client').text();

    let caracteristique = {

    }

    for (let v = 0; v < 3; v++) {
        let lib_car = $('#carac_produit-Label'+v).text();
        let car_val = $('#carac_produit'+v).find(':selected').text();
        caracteristique[lib_car] = car_val
    }

    let produit = {
        'quantite': quantite,
        'prix': current_price,
        'id_produit': id_produit,
        'prix_total': prix_total,
        'ref' : reference_produit,
        'carac' : caracteristique,
    }

    $.ajax({
        type: 'GET',
        url: '/panier/nouvel/',
        data: produit,
        cache: false,
        success: function(result) {

        setTimeout(function() {
        $('#ajouter_au_panier_success').removeClass('new_produit');
        }, 0);

        setTimeout(function() {
        $('#ajouter_au_panier_success').addClass('new_produit');
        Enregistrer_panier_nouvel.disabled = false;
        // Enregistrer_panier_nouvel.classList.remove("desactive");
        activation_but.classList.add("desactive");
        spinner_ajouter_nouvel.classList.remove("spinner-border");
        spinner_ajouter_nouvel.classList.remove("spinner-border-sm");

        span2.innerHTML = "Ajouter comme nouvel article";
        imgButon2.style.display = "inline";

        }, 2000);

        // $('#spinner').removeClass('spinner-border spinner-border-sm');
        $('#ajout_panier_modification').prop('disabled', true);

        $('#nbr_panier').text(result[0]['0'])
        $('#nbr_panier1').text(result[0]['0'])

        if (result[0]['0'] > 100) {
            $('#nbr_panier2').text('+99');
        }else {
            $('#nbr_panier2').text(result[0]['0']);
        }

        $('#nbr_panier2_hidden').text(result[0]['0'])
        $('#racourci_panier').text(result[0]['0'])
        $('#pp').text(result[0]['0'])

        // $('#prix_total').text(prix.innerHTML+" Fcfa")

        reafficher();

        },

        error: function(error) {
            console.log('Pas bon')
            $('#ajout_panier_modification').prop('disabled', true);
        }

});
    }

}

function ajout_favori() {
    if ($('#ajouter_favori').hasClass('favari-svg-active')) {
        console.log('Ce produit est déjà dans mes favoris')

    let favori = {
        'favori_id': id_produit.value,
    }

    $.ajax({
        type: 'POST',
        url: '/delete_favoris',
        data: favori,
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        success: function(response) {
            console.log('Retour de la suppression est:', response)
            $('#ajouter_favori').removeClass('favari-svg-active')
        }
    })
    }else {

    let favori = {
    'favori_id': id_produit.value,
    }

    $.ajax({
        type: 'GET',
        url: '/panier/favori/',
        data: favori,
        cache: false,
        success: function(result) {
        if (result == 0) {
            $('#clientFavoriConnexionModal').modal('show')
        }else {
            getCategorisFavoris()
            $('#listFavoriFormModal').modal('show')
            }
        },

        error: function(error) {
            console.log('Pas bon')
        }
    });
    }
    }

    function build_popup_fav() {
        let produit_id = $('#id_produit').val()
        $.ajax({
            type: 'GET',
            url: '/get_same_partenaire_product/'+produit_id,
            data: {},
            success: function(response) {
                console.log('Votre reponse est:', response)
                $('#meme-offre-main').empty()
                if (response['produit_partenaire'].length > 0) {

                    for (let index = 0; index < response['produit_partenaire'].length; index++) {
                       let prix_expedition;

                       if (response['produit_partenaire'][index].prix_expedition != 'Gratuit') {
                            prix_expedition = response['produit_partenaire'][index].prix_expedition + 'Fcfa'
                       }else {
                        prix_expedition = response['produit_partenaire'][index].prix_expedition
                       }

                       let line_produit = `<div class="meme-offre-line">
                        <div class="meme-offre-line-child">

                            <div class="meme-offre-case-prix meme-offre-col">
                                <div class="meme-offre-monatnt">${response['produit_partenaire'][index].prix} Fcfa</div>
                                <div class="meme-offre-occas">· Neuf</div>
                            </div>

                            <div class="meme-offre-case-livraison meme-offre-col">
                                <div class="type-livraison">Livraison : <span class="exp-prix">
                                    ${prix_expedition}
                                   </span></div>
                                <div class="data-expedition">Expédition en 45 min</div>
                            </div>

                            <div class="meme-offre-case-entreprise meme-offre-col">
                                <div class="type-vendeur"><span class="type-vendeur-libelle">· ${response['produit_partenaire'][index].nature_boutique.toUpperCase()}</span></div>
                            </div>

                            <div class="meme-offre-case-btn meme-offre-col">
                                <button class="meme-offre-btn" onclick="showRecapProduitMarchandTV(${response['produit_partenaire'][index].id})">
                                    <span class="meme-offre-btn-span">Voir le Produit</span>
                                </button>
                            </div>

                        </div>
                    </div>`

                    $('#meme-offre-main').append(line_produit)

                    }
                }

    }
        })

        $('#meme-produit-partenaire-section').removeClass('none-messaboxe')

    }


// incrementer le prix et la quantité
function plus() {
    if (parseInt(quantite.value) == 100) {
    } else {
        quantite.value = parseInt(quantite.value) + 1
        let quantite_produit = $('#quantite').val();
        let current_price = $('#current_price').val()
        let prix_unitaire = product_instance['Detail_Produit'][0][0]['prix']
        console.log('Le prix est:', prix_unitaire)
        let prix_total = quantite_produit * current_price
        prix.innerHTML = prix_total+" Fcfa"

        $('#Enregistrer_panier_nouvel').removeClass('desabled-modification-article')
        $('#ajouter_panier_nouvel').removeClass('desactive')
        $('#ajouter_panier_nouvel').prop('disabled', false)
    }
}

// Décrementer la quantité
function moins() {
    if (parseInt(quantite.value) <= 1) {
    } else {
        quantite.value = parseInt(quantite.value) - 1
        let quantite_produit = $('#quantite').val();
        let current_price = $('#current_price').val()

        let prix_unitaire = product_instance['Detail_Produit'][0][0]['prix']
        let prix_total = quantite_produit * current_price

        prix.innerHTML = prix_total+" Fcfa"

        $('#Enregistrer_panier_nouvel').removeClass('desabled-modification-article')
        $('#ajouter_panier_nouvel').removeClass('desactive')

    }
}


function plus_mobile() {

if (parseInt(quantite_mobile.value) == 100) {
} else {
    quantite_mobile.value = parseInt(quantite_mobile.value) + 1

    let quantite_produit = $('#quantite_mobile').val();
    let current_price = $('#current_price').val()
    let prix_unitaire = product_instance['Detail_Produit'][0][0]['prix']

    let prix_total = quantite_produit * current_price

    var prix_tag = '<sup style="position: relative; left: 5px">Fcfa</sup>'

    $('#mobile_prix_total_2').html(prix_total.toLocaleString())
    $('#mobile_prix_total_2').append(prix_tag)

    console.log('Le prix mobile est => ', prix_mobile)

    $('#Enregistrer_panier_nouvel').removeClass('desabled-modification-article')
    $('#ajouter_panier_nouvel').removeClass('desactive')
    $('#ajouter_panier_nouvel').prop('disabled', false)
}

}

function moins_mobile() {

if (parseInt(quantite_mobile.value) <= 1) {
} else {
    quantite_mobile.value = parseInt(quantite_mobile.value) - 1
    let quantite_produit = $('#quantite_mobile').val();
    let current_price = $('#current_price').val()

    let prix_unitaire = product_instance['Detail_Produit'][0][0]['prix']
    let prix_total = quantite_produit * current_price

    var prix_tag = '<sup style="position: relative; left: 5px">Fcfa</sup>'

    $('#mobile_prix_total_2').html(prix_total.toLocaleString())
    $('#mobile_prix_total_2').append(prix_tag)

    $('#Enregistrer_panier_nouvel').removeClass('desabled-modification-article')
    $('#ajouter_panier_nouvel').removeClass('desactive')

}

}


function reafficher () {
    $.ajax({
    type: 'GET',
    url: '/panier/afficher/',
    data: '',
    cache: false,
    success: function(result) {
    console.log('afficher panier apres modiff', result)
    var sous_total = 0;
    var nombre_total = 0;
    let produit_object = [];
    var default_order_price = 20000;
    let tab_expedition = [];
    $('#article_du_panier0').empty()
    for (let i = 0; i < result.length; i++) {

    let tab_expedition2 = result[i][2]

    if (tab_expedition2.length > 0) {
        tab_expedition.push(tab_expedition2[0].prix)
    }

    produit_object = '<div class="customu-popup paniersuppp mystyle" id="pop_'+i+'">';
    produit_object += '<div class="container-supp custom-commande-del" id="popup-close-body"><div><p class="popu-del-produit">Supprimer l’article du panier ?</p></div>'

    produit_object += '<div style="display: flex;  column-gap: 14px"><button class="supp-oui" onclick=supprimer_produit("'+i+'")>Oui</button><button class="supp-non" onclick="closePopup('+i+')">Non</button></div></div></div><div class="box-container" id="article_'+result[i].id+'" style="display: flex; flex-direction:column; justify-content:center; align-items:center; row-gap:30px"><div style="display: flex; flex-direction: column"><div class="box-elements"><div class="row" style="margin: 0%; padding: 0%; position: relative; margin-bottom: 10px;">'

    produit_object += '<div class="img-layout-1"><img class="img-layout-1 no-padding" src="/'+result[i].image+'" alt="" id="article_image" style="height: auto"></div> <div class="text-layout" id="elemnt-test"><span class="text-level-1" style="margin-bottom: 11.26px;" id="article_nom">'+result[i].libelle+'</span><span class="text-level-2" style="margin-bottom: 7px; " id="article_ref">Ref. '+result[i].ref_produit+'</span><span class="text-level-3" style="font-size: 16px !important;" id="article_prix_unit">'+result[i].prix+" Fcfa"+'</span><input type="hidden" id="article_id" name="" value="'+result[i].id+'"></div>'

        produit_object += '<div class="button-layout"><button onclick="confirmationSuppression('+i+')" class="button-close" style="margin-bottom: 14px;"><img class="corbeil-filter" src="/assets/images/Corbeille-grise-base.svg" alt=""></button><button class="span-button-editf button-close" onclick="modifier_produit('+i+')"><img class="partager-svg" src="/assets/images/tm_edit-off.svg" alt=""/></button></div></div><div class="line-separator"></div><div class="row" style="margin: 0%; padding: 0%; position: relative; margin-bottom: 5px;"><div class="row article-new" style="margin-bottom: 5px;">'

        produit_object += '<div class="col col1" style="display: flex; justify-content: center; align-items: center;"><span id="article_total"> '+result[i]['0']+" article(s)"+'</span></div><span class="separateur-1"></span><div class="col col2" style="display: flex; justify-content: center; align-items: center;"><span id="article_prix_total">'+result[i].prix*result[i]['0']+" Fcfa"+'</span></div></div><div class="row expedition-info" style="display: flex; justify-content: center; align-items: center;"><span>Expédition en 45 min</span></div></div><div class="line-separator1"></div>'

        produit_object += '<div class="rowd product-caracteristique" style="display: flex; justify-content: center; align-items: center;">'

            // console.log('Les caracteristiques sont là:', result[i][1])

        for (let caracteristique_item in result[i][1] ) {
            produit_object += '<label class="custom-span"><span>'+caracteristique_item+'</span><button class="infos-val-caracteristique" > '+result[i][1][caracteristique_item]+'</button></label>'
        }

        produit_object += '</div></div></div></div>'

        $('#article_du_panier0').append(produit_object)

        sous_total += result[i].prix*result[i]['0']
        nombre_total += parseInt(result[i]['0']);
        $('#sous_total').text(sous_total+" Fcfa")
        $('#total_tous').text(sous_total+" Fcfa")
        }

        if (tab_expedition.length > 0) {
            let maximum = -Infinity;
            let minimum = Infinity;

            for(let number of tab_expedition) {
                if(number > maximum)
                maximum = number;

                if(number < minimum)
                minimum = number
            }

            $('#montant_expedition_panier').text(maximum+ ' Fcfa')
            $('#panier-orange-info').addClass('new_produit') // retirer l'infos gratuit
            $('#panier-success-info').removeClass('new_produit') // ajout de l'infos livraison payant

            if (sous_total > 20000) {
                maximum = 0;
            }

            let montant_total = Number(maximum) + Number(sous_total) // to keep on tomorow
            let montant_restant_livraison_gratuite = default_order_price - montant_total;

            $('#total_tous').text(montant_total+" Fcfa") // montant total du panier
            $('#montant_restant_livraison_gratuite').text(montant_restant_livraison_gratuite)

            if (montant_restant_livraison_gratuite == 0 || montant_restant_livraison_gratuite < 0) {
                default_order_price = 0
                $('#panier-orange-info').removeClass('new_produit') // ajouter l'infos gratuit
                $('#panier-success-info').addClass('new_produit') // retrait de l'infos livraison payant
                $('#montant_expedition_panier').text('Gratuit')
            }

            }else{
                $('#montant_expedition_panier').text('Gratuit')
                $('#panier-orange-info').removeClass('new_produit') // ajouter l'infos gratuit
                $('#panier-success-info').addClass('new_produit') // retrait de l'infos livraison payant
                let montant_total = Number(sous_total) + 0;
                $('#total_tous').text(montant_total+" Fcfa") // montant total du panier
                }

                $('#nombre_total').text(nombre_total);

            },

            error: function(error) {
                console.log('Pas bon')
            }

        });
    }

    $('#carac_produit0').on('change', function() {
        console.log('Me selected:')
    })

	</script>

<script>
    // initialize fb sdk
    window.fbAsyncInit = function() {
       FB.init({
           appId      : '1207420726577218',
           xfbml      : true,
           autoLogAppEvents : true,
           version    : 'v16.0'
       });
   };

var newWindow;
function openPopUp() {
    var url = "https://www.toulemarket.com/en_attente_de_facebooK";
    var popup_height = 250;
    var popup_width = 650;

    var left = (screen.width - popup_width) / 2;
    var top = (screen.height - popup_height) / 2;

    newWindow = window.open(url, 'popUpWindow', 'height=' + popup_height + ', width=' + popup_width + ', resizable=no; scrollbars=no, toolbar=no' + ', left=' + left + ', top=' + top)
}

$('.des_car_mobile').on('click', function() {
        // alert("ici")
        $('#recapPanierModalContent').css('position', 'relative');
        //$('#recapPanierModalContent').css('left', '-200px');
        $('#dessBox').removeClass('none-messaboxe');
        console.log('la description est:', product_instance['Detail_Produit'][0][0]['description'])

        $('#Deskription').text(product_instance['Detail_Produit'][0][0]['description']) // Description
        $('#TableContainer').empty();
        for (let caracteristique_item in product_instance['Detail_Produit'][14] ) {
            let caracteristique_row = "<tr><td>"+caracteristique_item+"</td><td>"+product_instance['Detail_Produit'][14][caracteristique_item]+"</td></tr>"
            $('#TableContainer').append(caracteristique_row)
        }
})

function shareOverrideOGMeta() {
    let id_produit = $('#id_produit').val();
    let image_to_share = $('#tm_active_image_to_share').val(); // active image sur le popup
    let video_preview = $('#product_video_preview_for_share').val(); //video preview thumbnail

    openPopUp()

    $.ajax({ // Render a template to share
    type: 'POST',
    url: '/render_laravel_template',
    data: {id_produit: id_produit, image_to_share: image_to_share, video_preview: video_preview},
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    },
    success: function(response) {
    // recuperation des attributs à envoyer avec la route facebook
    var produit_meta_data = response.produit_meta_data // autre données du produit
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
    let url_redirection = 'https://toulemarket.com/facebook_preview_view/'+produit_meta_data[0].id_produit+'/'+produit_preview+'/'+produit_meta_data[0].rayon_id+'/'+produit_meta_data[0].rayon_slug
    newWindow.close()

    FB.ui({ // Facebook call
    method: 'share',
    hashtag: '#toulemarket',
    href: url_redirection,
    },
    function (response) {
        // Action after response
    });
    } //--- End if facebook

    },
    complete: function(){
        $('#main-bottom-zone-test').empty()
    }

    }) // --- Fin upload image server

    }); // --- Find html2Canvas
    }
    }) // Fin template rendering

    } // Fin shareOverrideOGMeta()

    function resetModal() {
        $('#client-btn-inscription').addClass('button-mute');
        $('#client-btn-inscription').removeClass('actif');
        $('#'+ $('#client-btn-inscription').attr('data-panel')).addClass('d-none')

        $('#client-btn-connexion').addClass('actif')
        $('#client-btn-connexion').removeClass('button-mute')
        $('#form-connexion-invite').removeClass('d-none')
        $('#client-btn-connexion').attr('data-for', 'form-connexion-invite-btn')
    }

    function favoriAuthentication() {
        resetModal()
        $('#demande_connection_source').val('favoris')
        $('#clientFavoriConnexionModal').modal('hide')
        $('#inviteRegisterLoginModal').modal('show')
    }

</script>
