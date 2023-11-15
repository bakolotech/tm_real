<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="{{ asset('css/universAccueil.css')}}" rel="stylesheet" />
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">
        <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css'>
        <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css'>
        <link rel="stylesheet" href="css/style.css">

        <link rel="stylesheet" href="css/demo.css">
        @yield('css-debut')
        <link rel="stylesheet" href="{{ asset('css/main-css.css') }}">
        <link rel="stylesheet" href="{{ asset('css/rayon.css') }}">
        <link rel="stylesheet" href="{{ asset('assets/slick/slick.css') }}">
        @yield('css-fin')


        {{-- <link rel="stylesheet" type="text/css" href="{{ asset('assets/slick_plugin/slick/slick.css') }}"/>
        <link rel="stylesheet" type="text/css" href="{{ asset('assets/slick_plugin/slick/slick-theme.css') }}"/> --}}
        <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.css">


        <title>Document</title>


    </head>
    <body >
        <div class="my-navbar bg-white">
            <div class="my-navbar-content">

                <button class="my-slick-btn my-slick-btn-prev" data-to="0">
                    <img src="{{ asset('assets/images/ic_chevron_right.svg') }}" alt="">
                </button>
                <div class=" border-nav">
                    <div class="d-flex rayon-nav-univers-dropdown">
                        <p class="text-menu" style="padding-left: 9px;position: relative;top: 9px;" >
                            <i style="color:#b62c38" class="fas"><img src="{{ asset('assets/images/Qualité.svg') }}"></i>
                            <span class="text-nav">Produits de haute qualités</span>
                        </p>


                        <div class="rayon-nav-univer-show">

                            <img class="rayon-nav-univer-show-0 d-none" src="{{ asset('assets/images2/moins.png') }}" alt="">
                        </div>
                    </div>
                </div>
                <div class="border-nav">
                    <div class="d-flex rayon-nav-univers-dropdown">
                        <p class="text-menu" style="padding-left: 9px;position: relative;top: 9px;" >
                            <i style="color:#b62c38" class="fas"><img src="{{ asset('assets/images/Protection.svg') }}"></i>
                            <span class="text-nav">Payements sécurisés garantis</span>
                        </p>
                        <div class="rayon-nav-univer-show">

                            <img class="rayon-nav-univer-show-0 d-none" src="{{ asset('assets/images2/moins.png') }}" alt="">
                        </div>
                    </div>
                </div>
                <div class=" border-nav">
                    <div class="d-flex rayon-nav-univers-dropdown">
                        <p class="text-menu" style="padding-left: 9px;position: relative;top: 9px;" >
                            <i style="color:#b62c38" class="fas"><img src="{{ asset('assets/images/Retour produit.svg') }}"></i>
                            <span class="text-nav">Retours simples et rapides</span>
                        </p>


                        <div class="rayon-nav-univer-show">
                            <img class="rayon-nav-univer-show-0 d-none" src="{{ asset('assets/images2/moins.png') }}" alt="">
                        </div>
                    </div>
                </div>
                <div class=" border-nav">
                    <div class="d-flex rayon-nav-univers-dropdown">
                        <p class="text-menu" style="padding-left: 9px;position: relative;top: 9px;" >
                            <i style="color:#b62c38" class="fas"><img src="{{ asset('assets/images/Service client.svg') }}"></i>
                            <span class="text-nav">Service client expert</span>
                        </p>


                        <div class="rayon-nav-univer-show">

                            <img class="rayon-nav-univer-show-0 d-none" src="{{ asset('assets/images2/moins.png') }}" alt="">
                        </div>
                    </div>
                </div>


                <button class="my-slick-btn my-slick-btn-next" data-to="1">
                    <img src="{{ asset('assets/images/ic_chevron_right.svg') }}" alt="">
                </button>


            </div>
        </div>

        <div style="padding :0 58px">

            <section>
                <div class="container-fluid slide">

                    <div class="item2">
                        <img class="banner" src="{{ asset('assets/images/pub_banner.jpg') }}" alt="">
                    </div>
                    <div class="item2">
                        <img class="banner" src="{{ asset('assets/images/pub_banner_2.jpg') }}" alt="">
                    </div>
                    <div class="item2">
                        <img class="banner" src="{{ asset('assets/images/pub_banner.jpg') }}" alt="">
                    </div>


                    <div class="item2">
                        <img class="banner" src="{{ asset('assets/images/pub_banner.jpg') }}" alt="">
                    </div>
                    <div class="item2">
                        <img class="banner" src="{{ asset('assets/images/pub_banner_2.jpg') }}" alt="">
                    </div>
                    <div class="item2">
                        <img class="banner" src="{{ asset('assets/images/pub_banner.jpg') }}" alt="">
                    </div>
                </div>
                <div class="d-flex justify-content-center">
                    <a  onclick="prev()" class="cercle"><span></span></a>
                    <a onclick="next()" class="cercle"><span></span></a>
                    <a onclick="next()" class="cercle"><span></span></a>
                </div>

            </section>

            <section>
                <div class="container input-group col-md-6 mb-3">
                    <span class="input-group-text" id="icon_recherche" style="font-size: 15px; color: rgb(25, 25, 112); border-width: 1px 0px 1px 1px; border-top-style: solid; border-bottom-style: solid; border-left-style: solid; border-top-color: rgb(155, 155, 155); border-bottom-color: rgb(155, 155, 155); border-left-color: rgb(155, 155, 155); border-image: initial; height: 34px; background: rgb(255, 255, 255); border-right-style: initial; border-right-color: initial; padding-right: 0px; padding-left: 9px;"><img style="height: 18px;" src="{{ asset('assets/images/Recherche.svg') }}"></span>
                    <input autocomplete="on" onclick="focus_champ()" style="font-size: 15px; color: rgb(25, 25, 112); border-width: 1px 0px; border-top-style: solid; border-bottom-style: solid; border-top-color: rgb(155, 155, 155); border-bottom-color: rgb(155, 155, 155); border-image: initial; height: 34px; border-right-style: initial; border-right-color: initial; border-left-style: initial; border-left-color: initial; background: rgb(255, 255, 255);" id="valeur_recherche" class="date-picker form-control" placeholder="Commencez la recherche">
                    <span class="input-group-text" onclick="delete_texte()" style="display: none; font-size: 15px; color: rgb(25, 25, 112); border: 1px solid rgb(155, 155, 155); height: 34px; background: rgb(255, 255, 255); cursor: pointer;" id="btn_delete_text"><img style="height: 18px;" src="{{ asset('assets/images/enveloppe.svg') }}"></span>
                    <span class="input-group-text" id="icon_galerie" style="font-size: 15px; color: rgb(25, 25, 112); border-width: 1px 1px 1px 0px; border-top-style: solid; border-right-style: solid; border-bottom-style: solid; border-top-color: rgb(155, 155, 155); border-right-color: rgb(155, 155, 155); border-bottom-color: rgb(155, 155, 155); border-image: initial; height: 34px; background: rgb(255, 255, 255); border-left-style: initial; border-left-color: initial;"><img src="{{ asset('assets/images/enveloppe.svg') }}"></span>
                </div>
            </section>


            <div class="slide1">
                <div class="sliderm">
                    <div class="mask">
                        <div>
                            <img class="miniature" src="{{ asset('assets/images/Mini_Tv_Telephonie_High_Tech.webp') }}" alt="">
                        </div>
                        <div class="text_cat">
                            <p  style="color: #4A4A4A">UNIVERS TV, TELEPHONIE, HIGH-TECH</p>
                        </div>
                    </div>
                    <div class="mask">
                        <div>
                            <img class="miniature" src="{{ asset('assets/images/Miniature_boutique_alimentation.jpg') }}" alt="">
                        </div>
                        <div class="text_cat">
                            <p  style="color: #4A4A4A">UNIVERS ALIMENTATION</p>
                        </div>
                    </div>
                    <div class="mask">
                        <div>
                            <img class="miniature" src="{{ asset('assets/images/Miniature_boutique_deco_&_maison.jpg') }}" alt="">
                        </div>
                        <div class="text_cat">
                            <p  style="color: #4A4A4A">UNIVERS MAISON & DECO</p>
                        </div>
                    </div>
                    <div class="mask">
                        <div>
                            <img class="miniature" src="{{ asset('assets/images/Miniature_boutique_vide_par_defaut.jpg') }}" alt="">
                        </div>
                        <div class="text_cat">
                            <p  style="color: #4A4A4A">UNIVERS VIDE</p>
                        </div>
                    </div>
                    <div class="mask">
                        <div>
                            <img class="miniature" src="{{ asset('assets/images/Miniature_boutique_vide_par_defaut.jpg') }}" alt="">
                        </div>
                        <div class="text_cat">
                            <p  style="color: #4A4A4A">UNIVERS VIDE</p>
                        </div>
                    </div>
                    <div class="mask">
                        <div>
                            <img class="miniature" src="{{ asset('assets/images/Miniature_boutique_vide_par_defaut.jpg') }}" alt="">
                        </div>
                        <div class="text_cat">
                            <p  style="color: #4A4A4A">UNIVERS VIDE</p>
                        </div>
                    </div>
                </div>
                <button type="button" role="presentation" class="owl-prev1">
                    <div class="arrow_left1">
                        <i class=" taille fa fa-angle-left" aria-hidden="true"></i>
                    </div>
                </button>
                <button type="button" role="presentation" class="owl-next1">
                    <div class="arrow_right1">
                        <i class="taille fa fa-angle-right" aria-hidden="true"></i>
                    </div>
                </button>
            </div>


            <div class="slide2">
                <div class="sliderm2">
                    <div class="mask2">
                        <div>
                            <img class="miniature" src="{{ asset('assets/images/Miniature_boutique_vide_par_defaut.jpg') }}" alt="">
                        </div>
                        <div class="text_cat">
                            <p  style="color: #4A4A4A">UNIVERS VIDE</p>
                        </div>
                    </div>

                    <div class="mask2">
                        <div>
                            <img class="miniature" src="{{ asset('assets/images/Miniature_boutique_vide_par_defaut.jpg') }}" alt="">
                        </div>
                        <div class="text_cat">
                            <p  style="color: #4A4A4A">UNIVERS VIDE</p>
                        </div>
                    </div>
                    <div class="mask2">
                        <div>
                            <img class="miniature" src="{{ asset('assets/images/Miniature_boutique_vide_par_defaut.jpg') }}" alt="">
                        </div>
                        <div class="text_cat">
                            <p  style="color: #4A4A4A">UNIVERS VIDE</p>
                        </div>
                    </div>
                    <div class="mask2">
                        <div>
                            <img class="miniature" src="{{ asset('assets/images/Miniature_boutique_vide_par_defaut.jpg') }}" alt="">
                        </div>
                        <div class="text_cat">
                            <p  style="color: #4A4A4A">UNIVERS VIDE</p>
                        </div>
                    </div>
                    <div class="mask2">
                        <div>
                            <img class="miniature" src="{{ asset('assets/images/Miniature_boutique_vide_par_defaut.jpg') }}" alt="">
                        </div>
                        <div class="text_cat">
                            <p  style="color: #4A4A4A">UNIVERS VIDE</p>
                        </div>
                    </div>
                    <div class="mask2">
                        <div>
                            <img class="miniature" src="{{ asset('assets/images/Miniature_boutique_vide_par_defaut.jpg') }}" alt="">
                        </div>
                        <div class="text_cat">
                            <p  style="color: #4A4A4A">UNIVERS VIDE</p>
                        </div>
                    </div>
                </div>
                <button type="button" role="presentation" class="owl-prev2">
                    <div class="arrow_left">
                        <i class=" taille2 fa fa-angle-left" aria-hidden="true"></i>
                    </div>
                </button>
                <button type="button" role="presentation" class="owl-next2">
                    <div class="arrow_right">
                        <i class="taille2 fa fa-angle-right" aria-hidden="true"></i>
                    </div>
                </button>
            </div>
        </div>

        <script src="https://code.jquery.com/jquery-3.6.0.min.js"
            integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4="
            crossorigin="anonymous">
        </script>

        <script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.js"></script>
        <script src="{{ asset('assets/jQuery-Mask-Plugin-master/dist/jquery.mask.min.js') }}"></script>

        <script>
            jQuery(document).ready(function() {
                $('.slide').slick({
                    slidesToShow: 3,
                    slidesToScroll: 1,
                    autoplay: true,
                    autoplaySpeed: 2000,
                });

                $('.sliderm').slick({
                slidesToShow: 5,
                slidesToScroll: 1
                });

                $('.sliderm2').slick({
                slidesToShow: 5,
                slidesToScroll: 1
                });

                // $('#formEditUser_nom-input').mask('0000');


            })


        </script>

        <script>

            var sliderMain = document.getElementById("slide");
            var item = sliderMain.getElementsByClassName("item2");
            function next(){
                sliderMain.append(item[0]);
            }

            function prev(){
                sliderMain.prepend(item[item.length-1]);
            }
        </script>

        <script>

            // var sliderMain2 = document.getElementById("slider-main2");
            // var item2 = sliderMain2.getElementsByClassName("item2");
            // function next2(){
            //     sliderMain2.append(item2[0]);
            // }

            // function prev2(){
            //     sliderMain2.prepend(item2[item2.length-1]);
            // }
        </script>



    </body>
</html>
