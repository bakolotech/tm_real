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

?>
<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'toulemarket') }}</title>
    <link rel="icon" href="{{ asset('assets/images/favicon.svg') }}">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;1,100;1,300;1,400;1,500&amp;display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/bootstrap/dist/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/select2/css/select2.min.css') }}">
    @yield('css-debut')
    <link rel="stylesheet" href="{{ asset('assets/owl-caroussel/dist/assets/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/owl-caroussel/dist/assets/owl.theme.default.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/rayon.css') }}">
    <link rel="stylesheet" href="{{ asset('css/main-css.css') }}">
    <link rel="stylesheet" href="{{ asset('css/form-style.css') }}">
    <link rel="stylesheet" href="{{ asset('css/detail_annonce_body.css') }}">
    <link rel="stylesheet" href="{{ asset('css/acceuil_marchand.css')}}" >
    <link rel="stylesheet" href="{{ asset('css/recap_produit.css')}}" >
    <link rel="stylesheet" href="{{ asset('css/panier_v2.css')}}" >
    <link rel="stylesheet" href="{{ asset('css/mobile_responsive.css')}}" >
    <link rel="stylesheet" href="{{ asset('css/show-univers.css')}}" >
    <link rel="stylesheet" href="{{ asset('css/recap_produit_panier_vide.css')}}">
    {{-- JS CHART ET JQUERY --}}

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

    {{-- <script src="https://kit.fontawesome.com/805087d901.js" crossorigin="anonymous"></script> --}}

    <script
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDZhn2kv6J1GBrOouqHr5g6K8flJN8blAI&callback=initMap&libraries=places&v=weekly"
    defer
    ></script>

    <!-- Load the MobileNet model. -->

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.5.6/cropper.css"/>

    @yield('css-fin')

</head>
<body style="font-family: Roboto, 'sans-serif' !important; overflow-y:hidden !important; @isset($page['background']) background: url('{{ $page['background'] }}') no-repeat; background-size: cover @endisset">
    @if(\Illuminate\Support\Facades\Session::has('message'))
        <div class="d-none" id="session-global-error" data-type="{{ \Illuminate\Support\Facades\Session::get('message')[0] }}">{{ \Illuminate\Support\Facades\Session::get('message')[1] }}</div>
    @endif
    <input type="hidden" id="public-token" value="{{ csrf_token() }}">
    <input type="hidden" id="public-host" value="{{ url('/') }}">
    <a href="{{ url(back()) }}" class="d-none" id="go-to-back"></a>
    <div class="main-section">
    <div class="load_panier_section" id="load_panier_section"></div>
    <div class="recap_panier_template" id="recap_panier_template"></div>

    <div class="panier_template" id="panier_template_section"></div>

    <div class="load_inviter_form_template" id="load_inviter_form_template"></div>

    <div class="register_login_invite_section" id="register_login_invite_section"></div>

    <div class="load_changed_pwd" id="load_changed_pwd"></div>
    
    @include('front.new_view.reponse_forget')
    
    {{-- @include('front.new_view.bachir_load') --}}

    @include('front.app-module.home.modals.num_verification')
    @include('front.new_view.produit_social_share')

    @include('front.app-module.mes-favoris.client_favori_connexion')
    @include('front.app-module.mes-favoris.favori-list')
    @include('front.new_view.recap_produits')

    {{-- section test fin --}}
    <div class="mon-contenu">

        <div class="hide-for-search">

        <div class="main-content bg-white" style="@if(isset($ciel)) {{ $ciel }} @endif">
        <section class="main-header">

        <div class="main-header-fluid padding-fluid">
        <div class="header-site-logo">
            <a href="{{ url('/') }}">
                <img src="{{ asset('assets/images/logo.png.svg') }}" alt="">
            </a>
        </div>

        <div class="nav-search-bar" style="margin-top: 8px;">
            @yield('search-bar')
        </div>

        <div class="header-site-icon">
        <div class="nav-accasion-place" >
            @yield('occasion')
        </div>

        <div class="group icon-boutique"  id="choisir-marcher-mobile" style="padding: 8px; width: 33px;" onclick="showMarche()">
            <img style="width: 17px;height: 17px;" class="header-icon-home" src="{{ asset('assets/images/market_bleu.svg') }}" alt="" id="marche-icon-btn">
            <span id="marcher-spinner" style="position: relative; top: -1px; margin-left: -2px; width: 20px; height: 20px" class="spinner-border modal-loading-spinner" role="status" ></span>
            <a href="javascript:;" id="launch-choisir-magasin" data-toggle="modal" data-target="#modalChoisirMagasin"></a>
        </div>

        @auth

        <div class="group icon-cloche div-icon-cloche" style="padding: 8px 9.7px; width: 33px;" onclick="toggleShowElement('#notification-box')">
            <a href="javascript:;" class="lien-click-vue-notification">
                <i data-count="0" class="incrementationDeNotif menu-item-counter custom-notif-counter field-none" style="" id="count-notification-number-bis"></i>

                <div class="puce puce-danger custom-puce-danger field-none" id="danger_puce_elemnet_id"></div>
                    <img class="header-icon-home" style="width: 13.6px !important;" src="{{ asset('assets/images/icon_notif.svg') }}" alt="">
                </a>
        </div>
        @endauth

        <div class="mobile-search-section">
            @yield('mobile-search-section')
        </div>

        @section('zone-option-profil')
        <div>
        <div class="group2 main-header-icons" style="width: 70px;">

        <div id="pays-loading-btn-icon" class="icon-pays"  onclick="showLangueDevise()">
            <a href="#" >
                <img id="pays-loading-btn-icon2" class="header-icon-home" style="height: 22px; width: 22px;border-radius: 50%;" src="{{ \App\Models\Pays::getImage2($maPosition['images']) }}" alt="">
                <span id="pays-spinner" style="position: relative; top: 3px; margin-left: 3px; width: 20px; height: 20px" class="spinner-border modal-loading-spinner" role="status" ></span>
            </a>
        </div>

            @auth
                <div class="icon-profil" id="toggle-profil-icon" onclick="toggleShowElement('#profil-box')">
                    <img id="user-profil-default-avatar" class="header-icon-home" style="height: 22px; width: 22px; border-radius: 50%;" src="{{ \App\User::getImage() }}" alt="">
                </div>
            @endauth

            @guest()
            <div class="icon-profil" id="toggle-profil-icon" onclick="toggleShowElement('#profil-box')">
                <img class="header-icon-home" style="height: 22px; width: 22px; border-radius: 50%;" src="{{ \App\User::getImage() }}" alt="">
            </div>
            @endguest

            @yield('tm_loop_de_recherche')

        </div>
    </div>
    @show
    {{-- @endsection --}}
    </div>
    </div>
    </section>
    </div>

<style>
    .hide{
        display:none;
    }

    .gm-svpc {
        display: none !important;
    }
    .gm-fullscreen-control {
        display: none !important;
    }

    .suggestion-recherche:hover{
        cursor: pointer;
    }

    #laissez-deviner-inrayon {
        font-size: 12px;
        margin-left: 5px;
    }

    #laissez-deviner-inrayon p {
        margin-bottom: 8px !important;
        margin-top: 0px !important;
    }


.suggestion-recherche:hover{
    background-color: #F5F5F5;
}

.suggestion-recherche p:hover{
    color: #D0021B;
}

.tm_logo_adder {
    width: 100%;
    height: 100%;
    margin-top: -570px;
    position: relative;
    z-index: 100000000;
}

.tm_no-scroll {
    overflow:hidden;
}

.modal-loading-spinner {
    display: none !important;
}

.modal-loading-lock-btn {
    pointer-events: none;
}

.img-layout-1 img {
    max-height: 74px !important;
    max-height: 74px !important;
}

</style>

    @include('front.layout.includes.profil-box')
    @include('front.layout.includes.profil-box1')

    @auth
        @include('front.layout.includes.notification-box')
    @endauth

    </div>

    @yield('navbar')

    <div class="main-content-loop">
        @yield('contenu')
    </div>
    <div class="added-element"></div>
    @yield('modal-debut')

    <div class="load-langue-devise" id="load-langue-devide">

    </div>

    <div class="load-choisir-magasin" id="load-choisir-magasin">
        
    </div>

    @if (!\Illuminate\Support\Facades\Auth::check())
    <div class="auto-login-section" id="auto-login-register-section">
        {{-- @include('front.app-module.home.modals.register-login-modal') --}}
    </div>
    @endif

    @if (\Illuminate\Support\Facades\Auth::check())
        @include('front.app-module.user-profil.modals.profile-user')
    @endif

    @yield('modal-fin')
        <div id="main-bottom-zone-test" style="position: absolute; margin-left: 2000px">
    </div>

</div>
</div>
@yield('search')
<!-- Swiper JS -->
{{-- <script src="{{ asset('js/app.js') }}"></script> --}}
<script>


    Echo.channel('App.Models.User.77')
        .listen('RealTimeMessage', (e) => {
            console.log('message prive', e.message)
    })

</script>

    <!-- Initialize Swiper -->
    <script>

      var swiper = new Swiper(".mySwiper", {
        slidesPerView: 1,
        spaceBetween: 30,
        loop: true,
        pagination: {
          el: ".swiper-pagination",
          clickable: true,
        },
        navigation: {
          nextEl: ".next-element",
          prevEl: ".prev-element",
        },
      });


      var swiper2 = new Swiper(".mySwiper2", {
        slidesPerView: 1,
        spaceBetween: 30,
        loop: true,
        pagination: {
          el: ".swiper-pagination",
          clickable: true,
        },
        navigation: {
          nextEl: ".next-element-share",
          prevEl: ".prev-element-share",
        },

      });

    </script>

</body>


    <script src="{{ asset('assets/select2/js/select2.min.js') }}"></script>

    @yield('js-debut')
    
    <script src="{{ asset('assets/bootstrap/dist/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('js/main.js') }}"></script>
    <script src="{{ asset('js/form.js') }}"></script>
    <script src="{{ asset('js/post-form.js') }}"></script>
    <script src="{{ asset('js/profil-user.js') }}"></script>
    <script src="{{ asset('js/main-search.js') }}"></script>
    <script src="{{ asset('js/active-btn.js') }}"></script>
    <script src="{{ asset('js/images-process.js') }}"></script>
    <script src="{{ asset('js/produit_process.js') }}"></script>
    <script src="{{ asset('js/produit-etagere.js') }}"></script>
    <script src="{{ asset('js/marchand-helpers.js') }}"></script>
    <script src="{{ asset('js/tm-js-carousel.js') }}"></script>
    <script src="{{ asset('js/responsive_function.js')}}"></script>

    <script src="{{ asset('js/rayons/show_rayon/etagere_carousel_product.js')}}"></script>
    <script src="{{ asset('js/rayons/show_rayon/onpageload_show_product.js')}}"></script>
    <script src="{{ asset('js/rayons/show_rayon/onpageload_mobile_show_product.js')}}"></script>
    <script src="{{ asset('js/rayons/show_rayon/align_pc_product_onpageload.js')}}"></script>
    <script src="{{ asset('js/rayons/show_rayon/on_resize_etagere.js')}}"></script>
    <script src="{{ asset('js/rayons/show_rayon/align_mobile_product_onpageload.js')}}"></script>
    <script src="{{ asset('js/rayons/show_rayon/mobile_on_scroll_product.js')}}"></script>
    <script src="{{ asset('js/rayons/show_rayon/show_product_by_categorie.js')}}"></script>

    <script src="{{ asset('js/tm_responsive_media.js')}}"></script>
    <script src="{{ asset('js/detect_mobile.js')}}"></script>
    <script src="{{ asset('js/main_layout_helper.js')}}"></script>
    <script src="{{ asset('js/panier_script.js')}}"></script>
    <script src="{{ asset('js/modal_script.js')}}"></script>

    <script type="text/javascript" src="{{ asset('lib/bootstrap-datepicker.js') }}"></script>
    <script src="{{ asset('assets/owl-caroussel/dist/owl.carousel.min.js') }}"></script>
   
    <script src="{{ asset('/assets/jQuery-Mask-Plugin-master/dist/jquery.mask.min.js') }}"></script>

    <script src="{{ asset('js/html2canvas.js') }}"></script>

    {{-- foto-js  --}}

@yield('js-fin')

<script>

var affectation_valeur_caracteristique = []
var cropper2;
// difference de date


jQuery(document).ready(function () {
    //Ajout des nouvelles fonctions HGerer  equipe
                // function pour envoie de formulaire
    

    function formulaire_0 () {
        $('#connexion_1').removeClass();
        $('#inscription_1').removeClass();
        $('#vendeur_1').removeClass();

        $('#connexion_1').addClass("blue-active");
        $('#inscription_1').addClass("blue-active");
        $('#vendeur_1').addClass("green-active");
    }

    function formulaire_1 () {
        formulaire_0()

        $('#connexion_1').addClass("login-register-percent");
        $('#inscription_1').addClass("login-register-percent");
        $('#vendeur_1').addClass("login-register-no-merchant");
    }


    $('#btnCaracteristiqueValeur').on('click', function(){

    if (affectation_valeur_caracteristique.length > 0) {
    var caracteristique = $('#caracteristique_valeur_affectation').find(':selected').val();
    var rayon = $('#rayons_caracterisuqes_valeur').find(':selected').val()

    let data = {
        _token: $('#token').val(),
        valeur: affectation_valeur_caracteristique,
        rayon: rayon,
        caracteristique: caracteristique
    }

    $.ajax({
        method: 'POST',
        url: 'rayon_caracteristique-affectation',
        data: data,
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },

        success: function(response) {
            if (response == 'succuss') {
                window.location.href = "/traitement_caracteristique"
            }else{
                alert('Error! Il s\'est passé quelque chose')
            }

        }
    })
    }else {
        alert('Vous devez selectionner une valeur')
    }
    })



$('#marchandAvatarElement').on( 'change', function(){
    var canvas  = $("#canvas_marchand"),
    context = canvas.get(0).getContext("2d"),
    $result = $('#result');
    let cropped_url = '';
    $('.avatar-cropper').removeClass('avatar-none')
    if (this.files && this.files[0]) {

    if ( this.files[0].type.match(/^image\//) ) {
    var reader = new FileReader();
    reader.onload = function(evt) {
    var img = new Image();
    img.onload = function() {

    context.canvas.height = this.height;
    context.canvas.width  = this.width;
    let height = this.height
    let width = this.width;
    context.drawImage(img, 0, 0);

    var cropper = canvas.cropper({
    viewMode: 2,
    autoCropArea: 0.9,
    movable:true,
    scalable:true,
    guides:false,
    toggleDragModeOnDblclick:true,
    minCanvasWidth: 320,
    minCanvasHeight: 316,
    minCropBoxWidth: 216,
    minCropBoxHeight: 218,
    minContainerWidth: 200,
    minContainerHeight: 100

    });

    };

    img.src = evt.target.result;
    cropped_url = evt.target.result
    img.style.borderRadius = "6px";
    };

    reader.readAsDataURL(this.files[0]);

    }
    else {
    alert("Invalid file type! Please select an image file.");
    }
    }
    else {
        alert('No file(s) selected.');
    }
});

$('#saveCroppedImage').on('click', function() {
    var canvas  = $("#canvas_marchand")
    canvas = canvas.cropper('getCroppedCanvas')
    canvas.toBlob(function(blob){
    url = URL.createObjectURL(blob);
    var reader = new FileReader();
    reader.readAsDataURL(blob);
    reader.onloadend = function(){

    var base64data = reader.result;
    $.ajax({

    url:'/update_boutique_avatar',
    method:'POST',
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    },
    data:{image:base64data},
    success:function(data)
    {

    $('.box-avatar-element').css('background', 'url('+data+')')
    $('.box-avatar-element').css('background-size', 'cover')
    $('.box-avatar-element').css('background-repeat', 'no-repeat')
    $('.box-avatar-element').css('background-position', 'center center')

    $('#avatar-letter').addClass('avatar-none')
    $('.boutiqueLetterStyle').addClass('avatar-none')
    // $('.mariesd').css('background', 'url('+croppedImageDataURL+')') img-marchand
    $('.mariesd').empty();
    $('.img-marchand').empty();
    $('.mariesd').css('background', 'url('+data+')')

    $('.mariesd').css('background-size', 'cover')
    $('.mariesd').css('background-repeat', 'no-repeat')
    $('.mariesd').css('background-position', 'center center')

    $('.img-marchand').css('background', 'url('+data+')')
    $('.img-marchand').css('background-size', 'cover')
    $('.img-marchand').css('background-repeat', 'no-repeat')
    $('.img-marchand').css('background-position', 'center center')

    // ------------------------------ update user profil ---------------------------
    $('#marchand-profil-box-avatar-1').attr('src', data) // ok
    $('#marchand-profil-box-avatar-2').attr('src', data) // ok
    console.log('l\'avatar doit bien être là');
	}
	});
	};
    });
    // $('.avatar-letter-small').addClass('avatar-none')
    })  //----------------------------- fin section 1 ------------------------------

    $('#btnRestore').click(function() {
        canvas.cropper('reset');
        canvas.cropper('destroy');
        console.log('Rien de bon ici mec')
        // $('#croppedCanvas').remove();
        $('.avatar-cropper').addClass('avatar-none')
    });

    // const cropper2;

    $('#file-client-profil').on('change', function() {

    const canvas = document.getElementById('canvas_client_profil');
    const context = canvas.getContext('2d');
    const result = $('#resultd-avatard-client');
    let cropped_url = '';
    $('.avatar-cropper').removeClass('avatar-none-client')

    $('#client-avatard-input').addClass('avatar-none-client')
    $('#client-avatard-result').removeClass('avatar-none-client')
    // $('#avatar-h4-title').addClass('h4-header-cropper')

    if (this.files && this.files[0]) {

    if ( this.files[0].type.match(/^image\//) ) {
    var reader = new FileReader();
    reader.onload = function(evt) {
    var img = new Image();
    img.onload = function() {

    context.canvas.height = this.height;
    context.canvas.width  = this.width;
    let height = this.height
    let width = this.width;
    context.drawImage(img, 0, 0);

    // new ()
    var imh = $('#current-profil-avatar-selected')

    cropper2  = new Cropper(canvas, {
        viewMode: 2,
        autoCropArea: 0.9,
        movable:true,
        scalable:true,
        guides:false,
        toggleDragModeOnDblclick:true,
        minCanvasWidth: 320,
        minCanvasHeight: 316,
        minCropBoxWidth: 216,
        minCropBoxHeight: 218,
        minContainerWidth: 200,
        minContainerHeight: 200
    });

    };



    img.src = evt.target.result;
    cropped_url = evt.target.result
    img.style.borderRadius = "6px";

    };

    reader.readAsDataURL(this.files[0]);

    }
    else {
    alert("Invalid file type! Please select an image file.");
    }
    }
    else {
        alert('No file(s) selected.');
    }

    // $('#current-profil-avatar-selected').css('display', 'none')
})


    // pour la selection des valeurs caracteristique
    $('#caracteristiqueValeurData input[type=checkbox]').change(function() {
    if ($(this).is(':checked')) {
        var check_item = affectation_valeur_caracteristique.indexOf($(this).next('span').text())
        if (check_item == -1) {
            affectation_valeur_caracteristique.push($(this).next('span').text())
        }

        var span_id = $(this).attr('data-check')

        }else{
            var check_item = affectation_valeur_caracteristique.indexOf($(this).next('span').text())
            if (check_item > -1) {
                affectation_valeur_caracteristique.splice(check_item, 1)
            }
        }

    });

    $('.block1-body-content1').on('click', function() {
        console.log("OK OK here i m")
        alert('Why you clicked me !?')
    })

    $('#toutCocher').on('change', function() {
        if ($('#toutCocher').is(':checked')) {

        $('#caracteristiqueValeurData input[type=checkbox]').prop('checked', true)

        $('#caracteristiqueValeurData input[type=checkbox]').each(function() {
            if ($(this).is(':checked')) {
            var check_item = affectation_valeur_caracteristique.indexOf($(this).next('span').text())
            if (check_item == -1) {
                affectation_valeur_caracteristique.push($(this).next('span').text())
            }
            }
        })
            // console.log('ici le tableau:', checkboxes)
        }else {

        $('#caracteristiqueValeurData input[type=checkbox]').prop('checked', false)

        affectation_valeur_caracteristique = [];

        }
        console.log('Etat actuel du tableau:', affectation_valeur_caracteristique)

    })

    // change rayon to load caracteristique
    $('#rayons_caracterisuqes_result').on('change', function() {

        $.ajax({
        method: 'GET',
        url: 'caracteristiqueByRayonId/'+$(this).val(),
        data: {},
        headers: {

        },
        success: function(response) {

        $('#caracteristiqueCaracteristique').empty()
        for (let index = 0; index < response.length; index++) {

        var caracteristique_select = [];
        let rayon_id = response[index].rayon_id
        let caracteristique_id = response[index].caracteristique_id;
        let caracteristique_libelle = response[index].libelle;

        $.ajax({
        method: 'POST',
        url: 'valeurCaracteristiqueR/'+response[index].caracteristique_id,
        data: {rayon : rayon_id, caracteristique: caracteristique_id},
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        success: function(response) {

            caracteristique_select = '<div style="display: flex; flex-direction: column"><label>'+caracteristique_libelle+'</label>'
            caracteristique_select += '<select class="caracteristique-element">'
            for(let j = 0; j < response.length; j++) {
                caracteristique_select += '<option>'+response[j].libelle+'</option>'
            }
            caracteristique_select += '</select></div>'
            $('#caracteristiqueCaracteristique').append(caracteristique_select);
        }
        })

        }
        console.log('vos caracteristique', response)
        },
        error: function(error) {

        }
        })
    })

    $("#form-envoie-notification").submit(function (e) {
    e.preventDefault();
    var $form = $(this);
    var $url = $(this).attr('action')
    var errormsg = document.getElementById("formNotifInvite_email-error")

    $.ajax({
    type: "POST",
    url: $url,
    data: $form.serialize(),
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    },
    success: function(response){

    if ('m1'in response){
        $("input[name=\"email_destinataire_notif\"]").show()
        $("#mail_idem").show()
        $("#mail_encours").hide()
        $("#mail_marc").hide()
        $("input[name=\"email_destinataire_notif0\"]").hide()
        $("#alert_inco").show()
        $("input[name=\"email_destinataire_notif\"]").css('border','1px solid #D0021B' )

    }

    if ('m2'in response) {
        $("input[name=\"email_destinataire_notif\"]").show()
        $("#mail_encours").show()
        $("#mail_idem").hide()
        $("#mail_marc").hide()
        $("input[name=\"email_destinataire_notif0\"]").hide()
        $("#alert_inco").show()
        $("input[name=\"email_destinataire_notif\"]").css('border','1px solid #D0021B' )
    }


    if ('m3'in response) {
        $("input[name=\"email_destinataire_notif\"]").show()
        $("#mail_encours").hide()
        $("#mail_idem").hide()
        $("#mail_marc").show()
        $("input[name=\"email_destinataire_notif0\"]").hide()
        $("#alert_inco").show()
        $("input[name=\"email_destinataire_notif\"]").css('border','1px solid #D0021B' )
    }

    if ('succes1' in response){
        $("input[name=\"email_destinataire_notif0\"]").show()
        $("input[name=\"email_destinataire_notif\"]").hide()
        $("input[name=\"email_destinataire_notif\"]").val("")
        $("#mail_encours").hide()
        $("#mail_idem").hide()
        $("#mail_marc").hide()

    }

    if ('m11'in response) {
        $("#mail_encours1").hide()
        $("#mail_idem1").show()
        $("#mail_marc1").hide()
        $("#ajouterune").hide()
        $("input[name=\"email_destinataire_notif1\"]").show()
        $("#alert_inco2").show()
        $("input[name=\"email_destinataire_notif1\"]").css('border','1px solid #D0021B' )
    }

    if ('m12'in response) {

        $("#mail_encours1").show()
        $("#mail_idem1").hide()
        $("#mail_marc1").hide()
        $("#ajouterune").hide()
        $("input[name=\"email_destinataire_notif1\"]").show()
        $("#alert_inco2").show()
        $("input[name=\"email_destinataire_notif1\"]").css('border','1px solid #D0021B' )

    }


    if ('m13'in response) {

        $("#mail_encours1").hide()
        $("#mail_idem1").hide()
        $("#mail_marc1").show()
        $("#ajouterune").hide()
        $("input[name=\"email_destinataire_notif1\"]").show()
        $("input[name=\"email_destinataire_notif1\"]").css('border','1px solid #D0021B' )

    }

    if ('succes2' in response){
        $("#ajouterune").show()
        $("input[name=\"email_destinataire_notif1\"]").hide()
        $("input[name=\"email_destinataire_notif1\"]").val("")
        $("#mail_encours1").hide()
        $("#mail_idem1").hide()
        $("#mail_marc1").hide()
    }

    if ('m21'in response) {
        $("#mail_encours2").hide()
        $("#mail_idem2").show()
        $("#mail_marc2").hide()
        $("#ajouterune2").hide()
        $("input[name=\"email_destinataire_notif2\"]").show()
        $("input[name=\"email_destinataire_notif2\"]").css('border','1px solid #D0021B' )
        $("#alert_inco3").show()
        $("#id-email-destinataire-notif2").css('margin-left','-15px')
    }

    if ('m22'in response) {
        $("#mail_encours2").show()
        $("#mail_idem2").hide()
        $("#mail_marc2").hide()
        $("#ajouterune2").hide()
        $("input[name=\"email_destinataire_notif2\"]").show()
        $("input[name=\"email_destinataire_notif2\"]").css('border','1px solid #D0021B' )
        $("#alert_inco3").show()
        $("#id-email-destinataire-notif2").css('margin-left','-15px')
    }

    if ('m23'in response) {

        $("#mail_encours2").hide()
        $("#mail_idem2").hide()
        $("#mail_marc2").show()
        $("#ajouterune2").hide()
        $("input[name=\"email_destinataire_notif2\"]").show()
        $("input[name=\"email_destinataire_notif2\"]").css('border','1px solid #D0021B' )
        $("#alert_inco3").show()
        $("#id-email-destinataire-notif2").css('margin-left','-15px')

    }

    if ('succes3' in response){

    $("#ajouterune2").show()
    $("input[name=\"email_destinataire_notif2\"]").hide()
    $("input[name=\"email_destinataire_notif2\"]").val("")
    $("#mail_encours2").hide()
    $("#mail_idem2").hide()
    $("#mail_marc2").hide()
    }

    if ('m31'in response) {

    $("#mail_encours3").hide()
    $("#mail_idem3").show()
    $("#mail_marc3").hide()
    $("#ajouterune3").hide()
    $("input[name=\"email_destinataire_notif3\"]").show()
    $("input[name=\"email_destinataire_notif3\"]").css('border','1px solid #D0021B' )
    $("#alert_inco4").show()

    }


    if ('m32'in response) {

        $("#mail_encours3").show()
        $("#mail_idem3").hide()
        $("#mail_marc3").hide()
        $("#ajouterune3").hide()
        $("input[name=\"email_destinataire_notif3\"]").show()
        $("input[name=\"email_destinataire_notif3\"]").css('border','1px solid #D0021B' )
        $("#alert_inco4").show()

    }


    if ('m33'in response) {

        $("#mail_encours3").hide()
        $("#mail_idem3").hide()
        $("#mail_marc3").show()
        $("#ajouterune3").hide()
        $("input[name=\"email_destinataire_notif3\"]").show()
        $("input[name=\"email_destinataire_notif3\"]").css('border','1px solid #D0021B' )
        $("#alert_inco4").show()

    }


    if ('succes4' in response) {
        $("#ajouterune3").show()
        $("input[name=\"email_destinataire_notif3\"]").hide()
        $("input[name=\"email_destinataire_notif3\"]").val("")
        $("#mail_encours3").hide()
        $("#mail_idem3").hide()
        $("#mail_marc3").hide()
    }

    // console.log("La réponse : " + response)
    },
    error: function(xhr, status, error){
        console.log("une erreur est survenue : "+ xhr.responseText)

    }
    })

    })

    //action pour afficher le formulaire de login après redirection du mail ouvert lors de l'envoie d'invitation
    let pop_up_redirect_invitation = window.location.hash;
    if (pop_up_redirect_invitation == "#pop-pour-redirection-depuis-le-mail") {

    formulaire_1()
    $("#registerLoginModal").modal('show');
    const queryString = window.location.search;
    const urlParams = new URLSearchParams(queryString);
    const sender = urlParams.get('mail_sender')
    const id_collabo = urlParams.get('collabo')
    let cacher = $("#champ-pour-inviter").val("ViaInvitation")
    let cacher_envoyeur = $("#champ-pour-envoyeur-inviter").val(sender)
    let collabo = $("#champ-collabo").val(id_collabo)

    }



    window.addEventListener('load', function () {
        $('.main-loader').addClass('d-none')
        $('.main-section').removeClass('d-none')
    })

    $("#brightness-inc").on("click", function(e) {
        Caman("#main-image-preview", function () {
            this.brightness(5).render();
        });
    });

    $("#searchProduitBar").click(function(){
        $("#p").slideToggle("slow");
    });

    $("input.number-only").bind({
    keydown: function(e) {
    if (e.shiftKey === true ) {
        if (e.which == 9) {
            return true;
        }
        return false;
    }
    if (e.which > 57) {
        return false;
    }
    if (e.which==32) {
        return false;
    }
    return true;
    }
    });

    $("#cropImage").on("click", function(e) {
        Caman("#main-image-preview", function () {
        // width, height, x, y
        this.crop(500, 300);

        // Still have to call render!
        this.render();

        });
    });

    $("#exposure").on("click", function(e) {

    Caman("#main-image-preview", function () {
    this.exposure(-10);
    // Create the layer
    this.newLayer(function () {
    // Change the blending mode
    this.setBlendingMode("multiply");

    // Change the opacity of this layer
    this.opacity(80);

    // Now we can *either* fill this layer with a
    // solid color...
    this.fillColor('#6899ba');

    // ... or we can copy the contents of the parent
    // layer to this one.
    this.copyParent();

    // Now, we can call any filter function though the
    // filter object.
    this.filter.brightness(10);
    this.filter.contrast(20);

    });

    // And we can call more filters after the layer
    this.clip(10);
    this.render();
    });

    })

    $('#description_produit').on('keyup', function(){

    var description = $('#description_produit').val()
    var libelle = $('#libelle-produit').val()

    if (description.length !=0 ) {

        $('#suivant-step1').removeAttr("disabled");
        $('#suivant-step1').addClass('button-active')

    }else{
        $('#suivant-step1').removeClass('button-active')
        $('#suivant-step1').attr("disabled", "disabled");
    }

    })

    $('#quantite_produit_disponible').on('keyup', function(){

    var detail_retour = $('#quantite_produit_disponible').val()

    if (detail_retour.length !=0 ) {

        $('#suivantExpedition').removeAttr("disabled");
        $('#suivantExpedition').addClass('button-active')

    }else{
        $('#suivantExpedition').removeClass('button-active')
        $('#suivantExpedition').attr("disabled", "disabled");
    }

    })

    let timeout;


$('.my-select').select2({
    dropdownCssClass : 'no-search'
});

$(".js-select2").select2({
    templateResult: function (idioma) {
        let img = $(idioma.element).attr('data-img');
        var $span = $("<span><img src='"+ img +"'/> " + idioma.text + "</span>");
        return $span;
    }
});

})

function resetCropper(event) {
    event.preventDefault();
    $().cropper("destroy")
}


$(document).ready(function(){
$("a").click(function(){
  $("#scroll-liste-invitation-recente").slideToggle("slow");
  $("#sendI").css('margin-top','-60px');
  $("#forme2").hide();
  $("#forme4").hide();
  $("#forme3").hide();
  $("#downX").hide();
  $("#upY").show();
  $("#scroll3").css('height','100px!important')
  $("#clickSending").css('margin-top','-110px')
});

    $('#formEditUser_code_postale-input').mask('0000');
});

$(document).ready(function(){
$("article").click(function(){
  $("#scroll-liste-invitation-recente").slideUp("slow");
  $("#upY").hide();
  $("#forme2").delay(1000).show(0);
  $("#forme4").delay(1000).show(0);
  $("#forme3").delay(1000).show(0);
  $("#downX").delay(1000).show(0);
   setTimeout(function(){ $('#scroll3').css('height','240px'); },1000)
  setTimeout(function(){ $('#clickSending').css('margin-top','20px'); },1000)
  setTimeout(function(){ $('#sendI').css('margin-top','31.5px'); },1000)

});
});

$('.panel-notification-btn').click(function () {
    let panel = $(this).attr('data-panel');
    $('.panel-notification-btn').not(this).removeClass('active')
    $(this).addClass('active')
    $('.notification-panel').not(panel).addClass('d-none')
    $(panel).removeClass('d-none')
})

$('.mon-switch').click(function () {
    let isActive = $(this).attr('data-is-active');
    let input = $(this).attr('data-for');
    $(this).attr('data-is-active', function(index, attr){
        if(attr == 1) return 0;
        else if (attr == 0) return  1;
    })
    if(isActive && isActive == 1){
        $(input).val(0);
        $(this).addClass('switch-0')
        $(this).removeClass('switch-1')
    }
    else{
        $(this).removeClass('switch-0')
        $(this).addClass('switch-1')
        $(input).val(1);
    }
    activeBtn('formEditConfigUser_');

})

$('.config-check-input').click(function () {
    if($(this).prop('checked')){
        $(this).val(1)
    }
    else{
        $(this).val(0)
    }
})

$('.un-checkbox').click(function () {
    let isActive = $(this).attr('data-is-active');
    let input = $(this).attr('data-for');
    $(this).attr('data-is-active', function(index, attr){
        if(attr == 1) return 0;
        else if (attr == 0) return  1;
    })
    if(isActive && isActive == 1){
        $(input).val(0);
        $(this).removeClass('checked-1')
    }
    else{
        $(input).val(1);
        $(this).addClass('checked-1')
    }

    activeBtn('formEditConfigUser_');
})

$('#faireUneOffre').on('click', function() {
    console.log('Great you got me')

    $('#section-messagerie-id').removeClass('main-prod-detail-modal')
    closeMessagerieBox2()
    $('#recapPanierModalContent').css('position', 'relative');
    $('#recapPanierModalContent').css('left', '-200px');
    $('#messagerieClientBox').removeClass('none-messaboxe')
})

function closeMessagerieBox() {
    $('#section-messagerie-id').addClass('main-prod-detail-modal')
    // $('#recapPanierModalContent').css('position', 'relative');
    // $('#recapPanierModalContent').css('left', '0px');
    // $('#messagerieClientBox').addClass('none-messaboxe')
}


// ouverture de tous les pop up
$('.marie').on("click", function() {
    showMenuProfil()
    if ($(this).attr('data-id') == 'articleCorbeille') {
    $.ajax({
    method: 'GET',
    url: 'produits_corbeille',
    data: {},
    headers: {},
    success: function(response) {
    $('#corbeille-data-table').empty();

    for (let i = 0; i < response.length; i++) {
    let tr_element = new Array();
    tr_element = ' <tr id="basket_row'+response[i]['id']+'">'
    tr_element += '<td class="col-element1" style="padding: 0px !important; width: 654px !important;">'
    tr_element += '<img style=" border: 1px solid #9B9B9B; border-radius:6px;width: 40px;height: 40px; margin-left: 30px; margin-top: 5.5px" src="/'+response[i]['image']+'" alt="" />'
    tr_element += '<span>'+response[i]['libelle']+'</span>'
    tr_element += '</td>'

    tr_element += '<td class="col-element2d" style="width: 338px !important;">'+response[i]['r_lib']+'</td>'

    tr_element += '<td class="col-element3tt" style="width: 211.5px !important; boder-left: 1px solid #ccc !important">'

    tr_element +='<span style="color: #D0021B;font-family: Roboto;font-size: 20px;font-weight: 500;letter-spacing: 0;line-height: 22px;text-align: left;">'+response[i]['date_mise_en_corbeille']+'J</span><span style="  color: #D0021B;font-family: Roboto;font-size: 10px;font-weight: 500;letter-spacing: 0;line-height: 11px;text-align: left;">restant</span>'

    tr_element += '<span onClick="resetFromBasket('+response[i]['id']+')" style="border-radius:50%; width:35px;height:35px;padding:5px; position: relative; left: 50px;"id="turn"><img src="assets/images/icones-vendeurs2/Group 5 Copy 13.svg" width="26px" height="26px"></span>'

    tr_element += '<article onClick="removeFromBasket('+response[i]['id']+','+response[i]['corbeille_id']+')" style="border-radius:50%;margin-top:-30px;position: relative; left: 100px;width:35px;height:35px;padding:5px;"id="corb"><img src="assets/images/icones-vendeurs2/Group 5 Copy 12.svg" width="26px" height="26px" id="corb"></article>'
    tr_element += '</td></tr>';

    $('#corbeille-data-table').append(tr_element)
    }
    }
    })
    }

    if ($(this).attr("data-id")) {
        $('.modal-marchand-close').modal('hide')
        var dataId = $(this).attr("data-id");
        $("#"+dataId).modal("show")
    }

    if ($(this).attr('data-id') == 'modePaiementMarchand1') {

    console.log('Le traitement des modes de paiement doit s\'opérer ici')

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

    }

    if ($(this).attr('data-id') == 'commandedet') {

    $.ajax({
    type: 'GET',
    url: '/get_all_marchand_command',
    data: {},
    success: function(response) {

    $('#tab-marchand-commande').empty()

    if (response.length > 0) {

    $('.pas-de-commande-marchand').addClass('field-none')

    var tab_marchand_commande = [];

    for (let c = 0; c < response.length; c++) {

    var mode_pay;

    if (response[c].mode_payement == 'AirtelMoney') {
        mode_pay = '/assets/images/icons/AirtelMoney.svg'
    }else if (response[c].mode_payement == 'MoovMoney') {
        mode_pay = '/assets/images/icones-vendeurs2/Moovmoney.svg'
    }

    tab_marchand_commande += '<tr class="marchand-line-commande-hover" onclick=showMarchandCommandDetails("'+response[c].id+'","'+response[c].ref_commande+'") id="commande-line-'+response[c].id+'">'

    tab_marchand_commande += '<td>'+response[c].ref_commande+'</td>'

    var commande_produits = response[c].commande_produit

    if (commande_produits.length == 1) {

    tab_marchand_commande += '<td><div>'
    tab_marchand_commande += '<div class="boxcontenu2" style="background-color: #fff; border: none"><img src="/'+commande_produits[0].image+'" style="max-height:45px"></div>'
    tab_marchand_commande += '<p class="contenu2" style="margin-bottom: 0px !important" >'+commande_produits[0].libelle+'</p>'
    tab_marchand_commande += '</div></td>'

    }else {

    tab_marchand_commande += '<td><div style="display: flex; align-items: center; justify-content: center;">'
    tab_marchand_commande += '<div class="boxcontenu2" style="background-color: #fff; border: none;"><img src="'+commande_produits[0].image+'" /></div>'

    var left_val = 0;
    for (let pc = 1; pc < commande_produits.length; pc++) {
        left_val += 10;
        tab_marchand_commande += '<div class="boxcontenu2" style="background-color: #fff; border: none; position:relative; left: -'+left_val+'px; margin-left: 0px"><img src="'+commande_produits[pc].image+'" style="max-height:45px" /></div>'
    }

    tab_marchand_commande += '</div></td>'

    }

    tab_marchand_commande += '<td style=" width: 278px;"><div>'
    tab_marchand_commande += '<p class="contenu3a">'+response[c].nom+ ' '+response[c].prenom+'</p>'
    tab_marchand_commande += '<p class="contenu3b" style="margin-bottom: 0px !important">'+response[c].email+'</p>'
    tab_marchand_commande += '</div></td>'

    tab_marchand_commande += '<td style="width:72px">'+response[c].nombre_article+'</td>'

    tab_marchand_commande += '<td>'+response[c].totaf_facturation+' Fcfa</td>'

    tab_marchand_commande += '<td style="width:77px"><div>'
    tab_marchand_commande += '<img src="'+mode_pay+'">'
    tab_marchand_commande += '</div></td>'

    if (response[c].status_code_commande == 0) {
        tab_marchand_commande += '<td id="status_de_la_commande'+response[c].ref_commande+'" style="color: green">'+response[c].status_commande+'</td>'
    }else if(response[c].status_code_commande == 1) {
        tab_marchand_commande += '<td id="status_de_la_commande'+response[c].ref_commande+'" style="color: red">'+response[c].status_commande+'</td>'
    }else if(response[c].status_code_commande == 2) {
        tab_marchand_commande += '<td id="status_de_la_commande'+response[c].ref_commande+'" style="color: orange">'+response[c].status_commande+'</td>'
    }


    tab_marchand_commande+= '<td>'+response[c].date_commande+'</td>'

    tab_marchand_commande += '</tr>'

    }

    $('#tab-marchand-commande').append(tab_marchand_commande)

    }else {
        $('.pas-de-commande-marchand').removeClass('field-none')
    }
        console.log('All Marchand order here', response)
    }

    })
    }

 })



window.addEventListener('load', function () {
    jQuery(document).ready(function () {

    $('#voir_panier').on({
    'click': function() {

    $('#myModal').modal('hide');

    if ($('#nbr_panier').text() == 0) {
        const element = document.getElementById('mon_panier');
        element.classList.toggle('panier_show')
    } else {
    //
    $.ajax({

    type: 'GET',
    url: '/panier/afficher/',
    data: '',
    cache: false,
    success: function(result) {
    console.log('Panier result => ', result)
    let default_order_price = 20000;
    var sous_total = 0;
    var nombre_total = 0;
    $('#article_du_panier0').empty()
    let produit_object = [];
    let tab_expedition = [];
    // for (let i = 0; i < result.length; i++) {
    for (var i = result.length - 1; i >= 0; i--) {

    let tab_expedition2 = result[i][2]

    if (tab_expedition2.length > 0) {
        tab_expedition.push(tab_expedition2[0].prix)
    }
    // calucl de la taille et affectation des nouvelle propriétés
    let img_p = new Image();

    produit_object = '<div class="customu-popup paniersuppp mystyle" id="pop_'+i+'">';
    produit_object += '<div class="container-supp custom-commande-del" id="popup-close-body"><div><p class="popu-del-produit">Supprimer l’article du panier ?</p></div>'

    produit_object += '<div style="display: flex;  column-gap: 14px"><button class="supp-oui" onclick=supprimer_produit("'+i+'")>Oui</button><button class="supp-non" onclick="closePopup('+i+')">Non</button></div></div></div><div class="box-container" id="article_'+result[i].id+'" style="display: flex; flex-direction:column; justify-content:center; align-items:center; row-gap:30px"><div style="display: flex; flex-direction: column"><div class="box-elements"><div class="row" style="margin: 0%; padding: 0%; position: relative; margin-bottom: 10px;">'

    img_p.onload = function() {

        if (img_p.height > img_p.width) {
            // $('.no-padding').addClass('panier-image-long')
        }else {
            // $('.no-padding').addClass('panier-image-large')
        }
    };

    img_p.src = '/'+result[i].image;

    // console.log('La taille est :', $(result[i].image).height())

    if (result[i].id_rayon == 27) {
        produit_object += '<div class="img-layout-1" style="padding-right: 0px"><div class="center-panier-img"><img class="no-padding panier-image-long" src="/'+result[i].image+'" alt="" id="article_image-'+result[i].id+'" ></div></div> <div class="text-layout" id="elemnt-test"><span class="text-level-1" style="margin-bottom: 11.26px;" id="article_nom">'+result[i].libelle+'</span><span class="text-level-2" style="margin-bottom: 7px; " id="article_ref">Ref. '+result[i].ref_produit+'</span><span class="text-level-3" style="font-size: 16px !important;" id="article_prix_unit">'+result[i].prix+" Fcfa"+'</span><input type="hidden" id="article_id" name="" value="'+result[i].id+'"></div>'
    }else if (result[i].id_rayon == 25) {
        produit_object += '<div class="img-layout-1" style="padding-right: 0px"><div class="center-panier-img"><img class="no-padding panier-image-large" src="/'+result[i].image+'" alt="" id="article_image-'+result[i].id+'" ></div></div> <div class="text-layout" id="elemnt-test"><span class="text-level-1" style="margin-bottom: 11.26px;" id="article_nom">'+result[i].libelle+'</span><span class="text-level-2" style="margin-bottom: 7px; " id="article_ref">Ref. '+result[i].ref_produit+'</span><span class="text-level-3" style="font-size: 16px !important;" id="article_prix_unit">'+result[i].prix+" Fcfa"+'</span><input type="hidden" id="article_id" name="" value="'+result[i].id+'"></div>'
    }else {
        produit_object += '<div class="img-layout-1" style="padding-right: 0px"><div class="center-panier-img"><img class="no-padding panier-image-large" src="/'+result[i].image+'" alt="" id="article_image-'+result[i].id+'" ></div></div> <div class="text-layout" id="elemnt-test"><span class="text-level-1" style="margin-bottom: 11.26px;" id="article_nom">'+result[i].libelle+'</span><span class="text-level-2" style="margin-bottom: 7px; " id="article_ref">Ref. '+result[i].ref_produit+'</span><span class="text-level-3" style="font-size: 16px !important;" id="article_prix_unit">'+result[i].prix+" Fcfa"+'</span><input type="hidden" id="article_id" name="" value="'+result[i].id+'"></div>'
    }

    produit_object += '<div class="button-layout"><button onclick="confirmationSuppression('+i+')" class="button-close" style="margin-bottom: 14px;"><img class="corbeil-filter" src="/assets/images/Corbeille-grise-base.svg" alt=""></button><button class="span-button-editf button-close" onclick="modifier_produit('+i+')"><img class="partager-svg" src="/assets/images/tm_edit-off.svg" alt=""/></button></div></div><div class="line-separator"></div><div class="row" style="margin: 0%; padding: 0%; position: relative; margin-bottom: 5px;"><div class="row article-new" style="margin-bottom: 5px;">'

    produit_object += '<div class="col col1" style="display: flex; justify-content: center; align-items: center;"><span id="article_total"> '+result[i]['0']+" article(s)"+'</span></div><span class="separateur-1"></span><div class="col col2" style="display: flex; justify-content: center; align-items: center;"><span id="article_prix_total">'+result[i].prix*result[i]['0']+" Fcfa"+'</span></div></div><div class="row expedition-info" style="display: flex; justify-content: center; align-items: center;"><span>Expédition en 45 min</span></div></div><div class="line-separator1"></div>'

    produit_object += '<div class="rowd product-caracteristique" style="display: flex; justify-content: center; align-items: center;">'

    for (let caracteristique_item in result[i][1] ) {
        produit_object += '<label class="custom-span"><span>'+caracteristique_item+'</span><button class="infos-val-caracteristique" > '+result[i][1][caracteristique_item]+'</button></label>'
    }

    produit_object += '</div></div></div></div>'

    $('#article_du_panier0').append(produit_object)

    sous_total += result[i].prix*result[i]['0']
    nombre_total += parseInt(result[i]['0'])
    $('#sous_total').text(sous_total.toLocaleString()+" Fcfa")
    $('#total_tous').text(sous_total.toLocaleString()+" Fcfa")
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

    if (maximum == null) {
        $('#montant_expedition_panier').text('Gratuit')
    }else {
        $('#montant_expedition_panier').text(maximum+ ' Fcfa')
    }

    $('#panier-orange-info').addClass('new_produit') // retirer l'infos gratuit
    $('#panier-success-info').removeClass('new_produit') // ajout de l'infos livraison payant

    if (sous_total > 20000) {
        maximum  = 0;
    }

    let montant_total = Number(maximum) + Number(sous_total)
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
    const element = document.getElementById('main-element');
    element.classList.toggle('panier_show')
    $('#nombre_total').text(nombre_total);

    $("#userProfilModal").removeClass("in");
    $(".modal-backdrop").remove();
    $("#userProfilModal").hide();
    $("#userProfilModal").modal('hide')

    $('#recap-produit-main-modal').addClass('main-prod-detail-modal')

    },

    error: function(error) {
        console.log('Erreur de la requette')
    }

    });
    //
    }
    }
    });

    })
}) ;


$(document).ready(function(){

    $('#exampleModal_bachir').on('hidden.bs.modal', function(e)
    {
        $(this).removeData();
        // console.log(4)
    }) ;

    $('#modalProduitClosed').on('click', function(){
        // console.log('Here for closing modal')
        let id_produit = $('#id_produit').val();
        console.log('Voici l id', id_produit)
        $.ajax({
        type: 'GET',
        // url: 'remove_from_rayon',
        url: '/remove_user_rayon/'+id_produit,
        data: {id: id_produit},

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

        })

    })




// paul js

jQuery(document).ready(function() {

   setInterval(() => {

    var userCode = '<?php if(isset($_SESSION['boutique_marchand_id'])) echo $_SESSION['boutique_marchand_id'] ;?>'
    // console.log('Bien dans set interval', userCode)

    if (userCode == '') {
        // console.log('Y a pas de marchand connecté')
    }else {

    $.ajax({
    type: 'POST',
    url: '/get_new_marchand_new_command',
    data: {id_marchand: userCode},
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    },
    success: function(marchand_commande_response) {

    if (marchand_commande_response.length > 0) {

    var current_number = $('#marchand-commande-counter_id_1').text()
    var current_notification = $('#count-notification-number-bis').attr('data-count');

    var new_number = Number(current_number) + 1; // Affichage de la notification
    var new_notification_number = Number(current_notification) + 1;

    $('#count-notification-number-bis').removeClass('field-none')
    $('#count-notification-number-bis').attr('data-count', new_notification_number)
    $('#count-notification-number-bis').text(new_notification_number);
    // console.log('<---------------------Le nouveau nombre est bien ------------------>', new_number)
    $('#marchand-commande-counter_id_1').text(new_number)

    setTimeout(() => {
        $('#count-notification-number-bis').addClass('field-none')
        $('#danger_puce_elemnet_id').removeClass('field-none')
    }, 1000); // Fin affichage de la notification

    // -------------------------------- Triger audi play ----------------------------
    var mp3_sound = "assets/mp3/beep-06.mp3"

    var audio = new Audio(mp3_sound);
    audio.muted = false;
    audio.play();
    // -------------------------------- Triger audi play end-------------------------

    $.ajax({
    type: 'POST',
    url: 'update_notified_commande',
    data: {commmand_data: marchand_commande_response},
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    },
    success: function(data_commande_notified) {
    // console.log('Here is the data notified', data_commande_notified)
    }

    })

    // console.log(audio.play())
    }else {
        // console.log('Pas de nouvelle commande ', marchand_commande_response)
    }

    }
    })
    }

    // Begin to check user commande process
    var client_userCode = "<?php if(\Illuminate\Support\Facades\Auth::check()) echo \Illuminate\Support\Facades\Auth::user()->id ;?>"
    // console.log('Bien dans set interval', userCode)
    if (client_userCode == '') {
        // console.log('Y a pas de client connecté')
    }else {

    // console.log('Ya un client connecté', client_userCode)
    $.ajax({
    type: 'GET',
    url: '/get_client_current_commande',
    data: {id_user: client_userCode},
    success: function(response_commande) {
    // console.log('Here is response element => ', response_commande)
    var currentDate = new Date().toLocaleDateString();
    // console.log('La date démandé est bien => ', currentDate)

    if (response_commande[0].length > 0) {

    var commande_status_progress = response_commande[1]
    var heure1, heure2, heure3, heure4;

    for (let index = 0; index < commande_status_progress.length; index++) {
        if (commande_status_progress[index]['order_status'] == 'Commande confirmée') {
            heure1 = commande_status_progress[index]['step_hour']
        }

        if (commande_status_progress[index]['order_status'] == 'En cours de traitement') {
            heure2 = commande_status_progress[index]['step_hour']
        }

        if (commande_status_progress[index]['order_status'] == 'Commande Expediée') {
            heure3 = commande_status_progress[index]['step_hour']
        }

        if (commande_status_progress[index]['order_status'] == 'Commande livree') {
            heure4 = commande_status_progress[index]['step_hour']
        }

    }

    var commande_active = response_commande[0][0]['status_commande'];
    var tracking_link = response_commande[0][0]['tracking_link']
    // console.log('Le status de la commande est bien => ', commande_active)

    if (commande_active == 'Commande confirmée') {

        $('#client_current_commande').removeClass('field-none')
        $('#commande-text-step-1').removeClass('field-none')

        $('#client-commande-step-1').removeClass('default-commande-btn')
        // $('#client-commande-step-1').addClass('current-commande-step')
        $('#client-commande-step-1').addClass('current-commande-step')

        $('#commande-date-verification').text(heure1)

    }else if(commande_active == 'En cours de traitement') {

        $('#client_current_commande').removeClass('field-none')

        $('#commande-text-step-1').removeClass('field-none')
        $('#client-commande-step-1').removeClass('default-commande-btn')
        $('#client-commande-step-1').removeClass('current-commande-step')

        $('#client-commande-step-1').addClass('commande-actif-step')
        $('#commande-step-text-1').removeClass('field-none')
        $('#date-step-1').removeClass('field-none')

        $('#li-step-1').removeClass('test-first-element')
        $('#li-step-1').addClass('test-first-element-active')

        // $('#commande-text-step-2').removeClass('field-none')
        // $('#commande-step-text-2').removeClass('field-none')
        $('#client-commande-step-2').removeClass('default-commande-btn')
        $('#client-commande-step-2').addClass('current-commande-step')
        $('#commande-text-step-2').removeClass('field-none')
        $('#date-step-1').text(heure2)

        // $('#date-step-2').removeClass('field-none')


    }else if (commande_active == 'Commande Expediée') {

    $('#client_current_commande').removeClass('field-none')
    // console.log('La commande a bien été expédié')

    $('#client-commande-step-3').addClass('active-commande-step')
    $('#client-commande-step-2').addClass('active-commande-step')
    $('#client-commande-step-1').addClass('active-commande-step')

    $('#date-step-3').removeClass('field-none')
    $('#date-step-2').removeClass('field-none')
    $('#date-step-1').removeClass('field-none')

    $('#date-step-3').text(heure3)
    $('#date-step-2').text(heure2)
    $('#date-step-1').text(heure1)

    $('#li-step-1').removeClass('test-first-element')
    $('#li-step-1').addClass('test-first-element-active')

    $('#li-step-2').removeClass('test-first-element')
    $('#li-step-2').addClass('test-first-element-active')

    $('#commande-step-text-3').removeClass('field-none')
    $('#commande-step-text-2').removeClass('field-none')
    $('#commande-step-text-1').removeClass('field-none')

    $('#commande-text-step-1').removeClass('field-none')
    $('#commande-text-step-2').removeClass('field-none')
    $('#commande-text-step-3').removeClass('field-none')

    $('#client-commande-step-1').removeClass('default-commande-btn')
    $('#client-commande-step-2').removeClass('default-commande-btn')
    $('#client-commande-step-2').removeClass('current-commande-step')
    $('#client-commande-step-3').removeClass('default-commande-btn')

    $('#client-commande-step-1').addClass('commande-actif-step')
    $('#client-commande-step-2').addClass('commande-actif-step')
    $('#client-commande-step-3').addClass('commande-actif-step')

    $('#commande-date-verification').text(heure1)

    $('#client-commande-step-4').addClass('current-commande-step')
    $('#client-commande-step-4').removeClass('default-commande-btn')
    $('#commande-text-step-4').removeClass('field-none')


    } else if(commande_active == 'Commande en cours de livraison') {
    $('#client_current_commande').addClass('field-none')

    var t_link = $('#client-tracking-link').attr('src')

    $('#suivre-commande-tracking-link').removeClass('field-none')

    if (t_link == '') {
        $('#client-tracking-link').attr('src', tracking_link)
    }

    // $('#suivre-commande-tracking-link').addClass('field-none')

    }else if(commande_active == 'Commande livree') {

    $('#client-lien-suivis-commande').text(tracking_link)

    $('#suivre-commande-tracking-link').addClass('field-none')
    $('#client-tracking-link').attr('src', "")

    $('#client_current_commande').removeClass('field-none')

    $('#client-commande-step-3').addClass('active-commande-step')
    $('#client-commande-step-2').addClass('active-commande-step')
    $('#client-commande-step-1').addClass('active-commande-step')

    $('#date-step-4').removeClass('field-none')
    $('#date-step-3').removeClass('field-none')
    $('#date-step-2').removeClass('field-none')
    $('#date-step-1').removeClass('field-none')

    $('#heure-livraison-client').text(heure4)
    $('#date-step-4').text(heure4)
    $('#date-step-3').text(heure3)
    $('#date-step-2').text(heure2)
    $('#date-step-1').text(heure1)

    $('#li-step-1').removeClass('test-first-element')
    $('#li-step-1').addClass('test-first-element-active')

    $('#li-step-2').removeClass('test-first-element')
    $('#li-step-2').addClass('test-first-element-active')

    $('#li-step-3').removeClass('test-first-element')
    $('#li-step-3').addClass('test-first-element-active')

    $('#li-step-4').removeClass('test-first-element')
    $('#li-step-4').addClass('test-first-element-active')

    $('#commande-step-text-4').removeClass('field-none')
    $('#commande-step-text-3').removeClass('field-none')
    $('#commande-step-text-2').removeClass('field-none')
    $('#commande-step-text-1').removeClass('field-none')

    $('#commande-text-step-1').removeClass('field-none')
    $('#commande-text-step-2').removeClass('field-none')
    $('#commande-text-step-3').removeClass('field-none')
    $('#commande-text-step-5').removeClass('field-none')

    $('#client-commande-step-1').removeClass('default-commande-btn')
    $('#client-commande-step-2').removeClass('default-commande-btn')
    $('#client-commande-step-2').removeClass('current-commande-step')
    $('#client-commande-step-3').removeClass('default-commande-btn')
    $('#client-commande-step-3').removeClass('current-commande-step')
    $('#client-commande-step-4').removeClass('default-commande-btn')
    $('#client-commande-step-4').removeClass('current-commande-step')

    $('#client-commande-step-1').addClass('commande-actif-step')
    $('#client-commande-step-2').addClass('commande-actif-step')
    $('#client-commande-step-3').addClass('commande-actif-step')
    $('#client-commande-step-4').addClass('commande-actif-step')

    $('#client-commande-step-5').removeClass('default-commande-btn')
    $('#client-commande-step-5').addClass('commande-actif-step')

    $('#commande-date-verification').text(heure1)

    // $('#client-commande-step-4').addClass('current-commande-step')
    // $('#client-commande-step-4').removeClass('default-commande-btn')
    $('#commande-text-step-4').removeClass('field-none')

    }
    else {
        $('#client_current_commande').addClass('field-none')
    }

        }
    }

    })

    }
    // Begin to check user commande process

    }, 5000);

    var id_marchand = '<?php if(isset($_SESSION['boutique_marchand_id'])) echo $_SESSION['boutique_marchand_id'] ;?>'
    if (id_marchand == '') {
        // console.log('Y a pas de marchand connecté')
    }else {
        $.ajax({
            type: 'GET',
            url: '/get_marchand_unread_notif',
            data: {id_marchand: id_marchand},
            success: function(response_unread) {

            if (response_unread.length > 0) {
                $('#danger_puce_elemnet_id').removeClass('field-none')
            }

            }
        })
    }
})

jQuery(document).ready(function () {

    let btnNextVue1 = document.getElementById('generer-code-acceuil-messagerie');
    let annulerVue2 = document.getElementById('annulerVue2');
    let btnNextVue3 = document.getElementById('generer-code-vue2-messagerie');
    let btnCloseNextVue = document.getElementById('fermer-generer-code-messagerie');

    btnNextVue1.addEventListener("click", event => {
        $('#block3-vue2').show();
        $('#block3-vue1').hide();
        $('#block3-vue3').hide();
    })
        annulerVue2.addEventListener("click", event => {
        $('#block3-vue2').hide();
        $('#block3-vue1').show();
        $('#block3-vue3').hide();
    })

btnNextVue3.addEventListener("click", event => {

    event.preventDefault();

    var ref_produit = $('#ref_produit').val();
    var remise = $('#remise').val();
    var nbre_produit =$('#nbre_produit').val();
    var date_expiration = $('#date_expiration').val();

    var promocode = {
        ref_produit: ref_produit,
        remise: remise,
        nbre_produit:nbre_produit,
        date_expiration: date_expiration,
        _token: $('#token').val(),
    }

    $.ajax({
    type:'POST',
    url:"coupon",
    data: promocode,
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    },
    success:function(response){

    console.log(response)
    if (response.status == 0) {
    $('#errorP').show(0).delay(10000).hide(0);
    $('#block3-vue2').show()
    $('#block3-vue1').hide()
    $('#block3-vue3').hide()

    }
    else{
    // let CodeP = document.getElementById('CodeP')
    $('#CodeP').text(response['codepromo'])
    $('#CopyP').val(response['codepromo'])
    $('#date_expe').text(date_expiration)
    $('#upcoupon').val(response['codepromo'])
    $('#val_id').val(response['id'])
    $('#block3-vue3').show()
    $('#block3-vue2').hide()
    $('#block3-vue1').hide()

    } }

        });
    })

    btnCloseNextVue.addEventListener("click", event => {

    $('#block3-vue2').hide();
    $('#block3-vue1').show();
    $('#block3-vue3').hide();


    event.preventDefault();
        var val_id = $('#val_id').val();
    var upcoupon = $('#upcoupon').val();


    var codeP ={
        id : val_id,
        code_promo : upcoupon,
        _token: $('#token').val(),
    }

    $.ajax({
    type:'PUT',
    url:"couponUp/"+val_id,
    data: codeP,
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    },

    success:function(response){
        console.log(response)
    }
    });
    })
    btnNextVue1.addEventListener("click", event => {
        $('#block3-vue2').show();
        $('#block3-vue1').hide();
        $('#block3-vue3').hide();
    })
    annulerVue2.addEventListener("click", event => {
        $('#block3-vue2').hide();
        $('#block3-vue1').show();
        $('#block3-vue3').hide();
    })
    btnNextVue3.addEventListener("click", event => {
        $('#block3-vue2').hide();
        $('#block3-vue1').hide();
        $('#block3-vue3').show();
    })
    btnCloseNextVue.addEventListener("click", event => {
        $('#block3-vue2').hide();
        $('#block3-vue1').show();
        $('#block3-vue3').hide();
    })
})


//Chart JS TAB
jQuery(document).ready(function() {

    let btnNextVue1 = document.getElementById('tab1');
    let btnNextVue2 = document.getElementById('tab2');
    let btnNextVue3 = document.getElementById('tab3');

    btnNextVue1.addEventListener("click", event => {
        $('#Chart').show();
        $('#entetetab1').show();
        $('#entetetab2').hide();
        $('#entetetab3').hide();
        $('#Chart2').hide();
        $('#Chart3').hide();
        $('#ta1').css({"border":"1px solid #1A7EF5","background-color":"#F5F5F5",  "box-shadow":" 0 5px 15px 0 rgba(0,0,0,0.15)"});
        $('#ta3').css({"border":"1px solid #D8D8D8","background-color":"#FFFF","box-shadow":"none"});
        $('#ta2').css({"border":"1px solid #D8D8D8","background-color":"#FFFF","box-shadow":"none"});
    })

    btnNextVue2.addEventListener("click", event => {
        $('#Chart').hide();
        $('#entetetab1').hide();
        $('#entetetab2').show();
        $('#entetetab3').hide();
        $('#Chart2').show();
        $('#Chart3').hide();
        $('#ta2').css({"border":"1px solid #1A7EF5","background-color":"#F5F5F5",  "box-shadow":" 0 5px 15px 0 rgba(0,0,0,0.15)"});
        $('#ta1').css({"border":"1px solid #D8D8D8","background-color":"#FFFF","box-shadow":"none"});
        $('#ta3').css({"border":"1px solid #D8D8D8","background-color":"#FFFF","box-shadow":"none"});
    })

    btnNextVue3.addEventListener("click", event => {
        $('#Chart2').hide();
        $('#entetetab1').hide();
        $('#entetetab2').hide();
        $('#entetetab3').show();
        $('#Chart').hide();
        $('#Chart3').show();
        $('#ta3').css({"border":"1px solid #1A7EF5","background-color":"#F5F5F5",  "box-shadow":" 0 5px 15px 0 rgba(0,0,0,0.15)"});
        $('#ta1').css({"border":"1px solid #D8D8D8","background-color":"#FFFF","box-shadow":"none"});
        $('#ta2').css({"border":"1px solid #D8D8D8","background-color":"#FFFF","box-shadow":"none"});
    })

    

})


var xValues = ["1jan", "9 jan", "12jan", "15jan", "18jan", "21jan", "24jan", "27jan", "30jan", "5fev", "8fev","11fev"];


new Chart("myChart", {
    type: "line",
    data: {

    labels: xValues,
    datasets: [{
    data: [40, 200, 40, 510, 600, 300, 1100, 330, 800, 1000, 500,600],
    borderColor: "green",
    height:1,
    fill: true,
    backgroundColor: "transparent"
    }, ]
    },
    options: {
        legend: {
            display: false
        }
    }
});

var xValues = ["1jan", "9 jan", "12jan", "15jan", "18jan", "21jan", "24jan", "27jan", "30jan", "5fev","8fev"];

new Chart("myChart2", {
    type: "line",
    data: {
    labels: xValues,
    datasets: [{
        data: [40, 20, 10, 20, 100, 30, 110, 50, 100, 8,50],
        borderColor: "blue",
        height: 1.5,
        fill: true,
        opacity: 0.4,
        backgroundColor: "transparent",

        },]
    },
    options: {
        legend: {
        display: false
        }
    }
});





</script>

</body>
</html>
