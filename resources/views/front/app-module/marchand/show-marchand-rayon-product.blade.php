@extends('front.layout.main-layout')
<?php
    $id_rayon = 7;
    $slug = 'telephonie';

    $rayon_product = DB::table('produits')
                        ->select('produits.*')
                        ->where('id_rayon', $rayon->id)
                        ->get();
?>
<style>

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
        position: relative;
        left: 15%;
        top: 7%;
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

    .add-product-icon {
        height: 24px;
        width: 24px;
        font-size: 24px;
        margin-bottom: 5px;
    }

    .bottom-bar-float {
        height: 61px;
        width: 100%;
        /* background: linear-gradient(90deg, #39B5FB 0%, #1A7EF5 100%); */
        background: linear-gradient(90deg, #39B5FB 0%, #1A7EF5 100%);
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

        @media  screen and (max-width: 1500px) {
        .add-product-button {
            margin-bottom: 20px !important
            }
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
    /* border: 1px solid #1A7EF5; */
    border-radius: 6px;
    position: relative;
    top: -1px;

   }

   .img-marchand, .marchand-user-profil:hover {
       cursor: pointer;
   }

   .icons-share-marchand {
    height: 27px;
    width: 27px;
    border-radius: 6px;
    background-color: #1A7EF5;
    /* background-color: #1A7EF5; */
    /* margin-left: 8px; */
   }

   .icons-share-marchand img {
       position: relative;
       height: 21px !important;
       width: 21px !important;
       top: 0px;
   }

   .element-icons {
       /* display: flex;
       flex-direction: column */
       width: calc(107px - 70px);
       height: 70px;
       /* background-color: rgb(48, 248, 248); */
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
        /* left: 80px; */
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
   }

   .boutique-produit-container {
            display: grid;
            grid-template-columns: repeat(6, 1fr);
            column-gap: 12px;
            row-gap: 3px !important;
            position: relative;
            left: -1px;
            margin-top:-25px !important;
        }

        /* .case-produit {
        box-sizing: border-box;
        height: 80px !important;
        width: 80px;
        border: 1px solid #1A7EF5;
        border-radius: 6px;
        margin-top: -1px;
        } */

        .main-prod-options {
            display: none;
            height: 37px;
            width: 112px;
            border-radius: 6px;
            background: rgba(0, 0, 0, 0.3);
            position: absolute;
            margin-top: -35px;
            column-gap: 7px;
            padding-left: 10px;
            padding-top: 5px
        }

        .case-produit:hover .main-prod-options{
            /* background-color: #146FDA !important; */
            display: flex;
        }

        .image_principal-produit {
            height: 80px !important;
            width: 80px;
            border-radius: 6px;
        }

        .navbar-next {
            position: relative;
            top: -17px;
        }

   @media only screen and (max-width: 1500px) {
        .add-product-button {
            left: 15%;
            top: -10px;
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
    font-size: 14px;
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
/* height: 18px; */
width: 226px;
color: #191970 !important;
font-family: Roboto;
font-size: 14px;
font-weight: bold;
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
row-gap: 25px;
/* width: 600px; */
position: relative;
left: -1px;
margin-top:5%;
}

.case-produit {
  box-sizing: border-box;
  height: 107px;
  width: 163px;
  border: 1px solid #1A7EF5;
  border-radius: 6px;
}

.image_principal-produit {
    height: 104px;
    width: 111px;
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
        /* padding-left: 10px; */
        /* top: 4.4px; */
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
        background-color: #FFFFFF;
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
        background-color: #FFFFFF;
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
/* background-color: #D0021B; */
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

.mesb:hover a{

    /* background-color: #1A7EF5; */
    color:white;
    font-weight: 500;
    cursor: pointer;
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
    /* display: grid; */
    /* grid-template-columns: repeat(6, 1fr); */
    /* column-gap: 12px;
    row-gap: 60px; */
    /* padding-bottom: 10px; */
    position: relative;
    left: -1px;

    margin-top:4.7%;
}


</style>

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

@section('contenu')
    <style>
        .contenu-marchand-rayon {
            width: 100%;
            height: calc(100vh - 101px);
            background-repeat: no-repeat;
            background-size: cover;
            background-position: center;
            position: relative;
        }
    </style>
    {{-- <div class="contenu-marchand-rayon" style="background: url('{{ $rayon->getGEtagereLink() }}') no-repeat; background-size: cover;
        background-position: center;"> --}}
    <div class="contenu-marchand-rayon" style="background: url('{{ $rayon->getGEtagereLink() }}') no-repeat; background-size: cover;
            background-position: center;">
        {{-- <nav class="owl-filter-bar d-none">
            <a href="#" class="item" data-owl-filter="*" id="famille-all">Tout</a>
            @foreach($rayon->familles as $famille)
                <a href="#" class="item" data-owl-filter=".famille-{{ $famille->id }}" id="famille-{{ $famille->id }}">{{ $famille->text($famille->libelle) }}</a>
            @endforeach
        </nav> --}}


        {{-- <div class="my-navbar-content d-flex owl-carousel" id="grande-etagere-slide" style="padding: 0 5px;">

        </div> --}}
        {{-- <div class="dynamique-div-section s-none">

        </div> --}}
        <div class="navbar-next">
            <div class="user-marchand-profil" style="margin-top: -5px ! important">

                <div class="img-marchand" onclick="showMenuProfil()">
                    <img src="{{ asset('assets/images2/user.png')}}" alt="" >
                </div>

                <div class="img-marchand-etager" id="imgMarchandEtager" onclick="getBackgroundEtagere()">
                    <a href="{{url('/rayon_marchand/'.$id_rayon )}}"><img src="assets/images/notification-setting-icon.svg" alt="" ></a>
                </div>

                <div class="element-icons" >

                    <div class="icons-share-marchand marchand-user-profil" onclick="showMenuProfil()" style="display: flex; justify-content: center; align-items: center">
                        <img src="{{ asset('assets/images/User3.svg') }}" alt="" >
                    </div>

                    <div class="icons-share-marchand img-share-marchand" style="display: flex; justify-content: center; align-items: center; margin-top: 5px">

                        <img src="{{ asset('assets/images/Partage_Copy.svg')}}" alt="" >

                    </div>

                </div>
            </div>

            <div class="next-box-marchand" style="margin-top: -5px ! important">
                <div class="next-box-marchand-text">
                    Clients en rayon
                </div>

                <div class="next-box-marchand-img" style="margin-top: -10px !important">
                    <div>
                        <img src="{{ asset('assets/images2/user.png') }}" alt="" >
                    </div>
                    <div>
                        <img src="{{ asset('assets/images2/user.png') }}" alt="" >
                    </div>
                    <div>
                        <img src="{{ asset('assets/images2/user.png') }}" alt="" >
                    </div>
                    <div class="last-element-text">
                        <h6>+99</h6>
                    </div>

                </div>
            </div>

            <div class="trait-separator"></div>
                        {{-- added by paul  --}}
                        <div class="historique" id="gerer-equipe-menu">
                            <li onclick="raccourci1()" id="boutik3"><img src="{{ asset('assets/images/icones-vendeurs2/icones-menu/boutique.svg') }}"id="boutik1"><img src="assets/images/icones-vendeurs2/icones-menu/boutiquebleu.svg" style="display:none"id="boutik2"><br><br><p style="margin-top:3px;">Mes <br> boutiques</p></li>
                            <section style=" height: 70px;
                            width: 506px;
                            border-radius: 6px;
                            background-color: #FFFFFF;border:1px solid #9B9B9B;margin-left:9px;display:none;"id="boutik4">
                            <article style="width:23px;height:66px;background-color:#F5F5F5;"><img src="assets/images/icones-vendeurs2/chevron_big_left.svg" style="margin-left:1.5px; margin-top:24px;"></article>
                            <article style="width:458px;height:66px;margin-left:23px;margin-top:-66px;padding:5px;padding-top:2px;">

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
                                        grid-row-gap: 5px;

                                    }
                                </style>
                            <div class="main-rayon-items">
                                {{-- zone rayons --}}
                            </div>
                            </article>

                            <article style="width:23px;height:66px;background-color:#F5F5F5;margin-left:481px;margin-top:-66px"><img src="{{ asset('assets/images/icones-vendeurs2/chevron_big_right.svg') }}" style="margin-left:1.5px; margin-top:24px;"></article>
                            </section>
                            <section  style="  box-sizing: border-box;
                            height: 70px;
                            width: 70px;
                            border: 1px solid #1A7EF5;
                            border-radius: 6px;
                            background-color: #FFFFFF;margin-left:9px;display:none;"id="boutik5">
                            <article class="modsup" style="
                            font-family: Roboto;
                            font-size: 10px;
                            font-weight: bold;
                            letter-spacing: 0;
                            line-height: 11px;
                            text-align: center;height:30px;margin-top:2px;width:66px;margin-left:1px;padding-top:10px;"><a onclick="activesup()"style="text-decoration: none;">Modifier</a></article>
                                    <hr style="margin-left:4px; height: 1px;width: 57px;margin-top:2px;">
                            <article class="modsup" style=" opacity:0.5;pointer:none;
                            font-family: Roboto;
                            font-size: 10px;
                            font-weight: bold;
                            letter-spacing: 0;
                            line-height: 11px;
                            text-align: center;height:30px;margin-top:-15px;width:66px;margin-left:1px;padding-top:10px;" id="supbtk">Supprimer</article>
                             </section>


                             {{-- Mode de paiement raccourci --}}
                            <li  onclick="raccourci2()"id="paiem3"><img src="{{ asset('assets/images/icones-vendeurs2/icones-menu/paiement.svg') }}"id="paiem1" ><img src="assets/images/icones-vendeurs2/icones-menu/paiementbleu.svg"style="display:none;"id="paiem2" ><br><p style="margin-top:13px;">Mode de <br> paiements<p></li>
                                <section style="   height: 70px;
                                width: 222px;
                                border: 1px solid #1A7EF5;
                                border-radius: 6px;
                                background-color: #FFFFFF;margin-left:9px;display:none;padding:10px;"id="paiem4">
                                <article style=" height: 50px;
                                width: 33px;
                                border-radius: 6px;
                                background-color: #F5F5F5;"><img src="{{ asset('/assets/images/icones-vendeurs2/Valide.svg') }}"width="15px" height="15px"; style="margin-top:18px;margin-left:9px;"></article>
                                <article style="margin-left:43px;margin-top:-50px; height: 50px;
                                width: 159px;
                                border-radius: 6px;
                                background-color: #F5F5F5;

                                font-family: Roboto;
                                font-size: 12px;
                                letter-spacing: 0;
                                line-height: 12px;
                                text-align: center;padding:9.5px;">
                                <p style="text-align:center; color: #1A7EF5;
                                font-family: Roboto;
                                font-size: 14px;
                                font-weight: 500;
                                letter-spacing: 0;
                                line-height: 14px;
                                text-align: center;">Airtel Money<p> <p style="text-align:center; color: #191970;
                                font-family: Roboto;
                                font-size: 14px;
                                font-weight: 500;
                                letter-spacing: 0;
                                line-height: 14px;
                                text-align: center;margin-top:-10px;">+241 99999999</article>
                            </section>
                            <section style="  box-sizing: border-box;
                                height: 70px;
                                width: 70px;
                                border: 1px solid #1A7EF5;
                                border-radius: 6px;
                                background-color: #FFFFFF;margin-left:9px;display:none;text-align:center;
                                "id="paiem5">
                                <img src="assets/images/icones-vendeurs2/Mise_à_jour.svg"style="margin-top:15px;"><p style="margin-top:8px;color:#1A7EF5; font-family: Roboto;
                                font-size: 12px;
                                font-weight: 500;
                                letter-spacing: 0.24px;
                                line-height: 13px">Changer</p></section>


                               {{-- Tableau raccourci --}}
                            <li onclick="raccourci3()" id="tb3"><img src="{{ asset('assets/images/icones-vendeurs2/icones-menu/gestion.svg') }}" id="tb1"><img src="assets/images/icones-vendeurs2/icones-menu/gestionbleu.svg"style="display:none;" id="tb2"><br><br><p style="margin-top:2px">Tableau <br>de gestions</p></li>
                            <section style="margin-left:9px;display:none;  box-sizing: border-box;
                            height: 70px;
                            width: 221px;
                            border: 1px solid #9B9B9B;
                            border-radius: 6px;background-color:#F5F5F5;"id="tb4">




                                <p style="  color: #191970;
                            font-family: Roboto;
                            font-size: 12px;
                            font-weight: bold;
                            letter-spacing: 0.24px;
                            line-height: 13px;padding-top:10px;padding-left:15px;text-decoration:none!important;
                          ">Produits <br>en stock</p>
                          <hr style="  box-sizing: border-box;
                          height: 1px;
                          width: 71px;
                          border: 1px solid #191970;
                          opacity: 0.5;margin-top:-13px;margin-left:10px;">
                          <aside style=" height: 17.5px;
                          width: 72px;
                          border-radius: 2px;
                          background-color: #00B517;margin-top:-12px;margin-left:10px;
                          color: #FFFFFF;
                            font-family: Roboto;
                            font-size: 8px;
                            font-weight: 500;
                            letter-spacing: 0.16px;
                            line-height: 8px;
                            text-align: center;padding-top:5px;
                            ">Cette semaine</aside>


                                <div class="progress blue">
                                    <span class="progress-left">
                                              <span class="progress-bar"></span>
                                    </span>
                                    <span class="progress-right">
                                    <span class="progress-bar"></span>
                                    </span>

                                    <div class="progress-value">999</div>
                                </div>
                                <img src=" {{ asset('assets/images/icones-vendeurs2/Group 31.svg') }}" style="width:80px;height:60px; margin-left:144px;margin-top:-46px">

                            </section>
                             <section style="margin-left:9px;display:none;  box-sizing: border-box;
                             height: 70px;
                             width: 221px;
                             border: 1px solid #9B9B9B;background-color:#F5F5F5;
                             border-radius: 6px;"id="tb5">


                                <p style="  color: #191970;
                            font-family: Roboto;
                            font-size: 12px;
                            font-weight: bold;
                            letter-spacing: 0.24px;
                            line-height: 13px;padding-top:10px;padding-left:15px;
                          ">Nouvelles
                                    <br>commandes</p>
                                    <hr style="  box-sizing: border-box;
                          height: 1px;
                          width: 71px;
                          border: 1px solid #191970;
                          opacity: 0.5;margin-top:-13px;margin-left:10px;">
                          <aside style=" height: 17.5px;
                          width: 72px;
                          border-radius: 2px;
                          background-color: #FF9500;margin-top:-12px;margin-left:10px;
                          color: #FFFFFF;
                            font-family: Roboto;
                            font-size: 8px;
                            font-weight: 500;
                            letter-spacing: 0.16px;
                            line-height: 8px;
                            text-align: center;padding-top:5px;
                            ">Semaine dernière</aside>

                                <div class="progress yel">
                                    <span class="progress-left">
                                              <span class="progress-bar"></span>
                                    </span>
                                    <span class="progress-right">
                                    <span class="progress-bar"></span>
                                    </span>

                                    <div class="progress-value"><img src="{{ asset('assets/images/icones-vendeurs2/Fichier 2@11.svg') }}" style="margin-top:-8px;margin-left:-2.5px;"></div>
                                </div>
                                <img src="assets/images/icones-vendeurs2/Group 25.svg" style="width:80px;height:60px; margin-left:144px;margin-top:-46px">

                             </section>
                              <section style="margin-left:9px;display:none;  box-sizing: border-box;
                              height: 70px;
                              width: 221px;
                              border: 1px solid #9B9B9B;
                              border-radius: 6px;background-color:#F5F5F5;"id="tb6">
                               <a id="tab3" style="text-decoraction:none;">


                                <p style="  color: #191970;
                        font-family: Roboto;
                        font-size: 12px;
                        font-weight: bold;
                        letter-spacing: 0.24px;
                        line-height: 13px;padding-top:10px;padding-left:15px;
                        ">Commandes <br>passées</p>
                                 <hr style="  box-sizing: border-box;
                                 height: 1px;
                                 width: 71px;
                                 border: 1px solid #191970;
                                 opacity: 0.5;margin-top:-13px;margin-left:10px;">
                                 <aside style=" height: 17.5px;
                                 width: 72px;
                                 border-radius: 2px;
                                 background-color: #FFCC00;margin-top:-12px;margin-left:10px;
                                 color: #FFFFFF;
                                   font-family: Roboto;
                                   font-size: 8px;
                                   font-weight: 500;
                                   letter-spacing: 0.16px;
                                   line-height: 8px;
                                   text-align: center;padding-top:5px;
                                   ">Il y’a 3 semaines</aside>
                                <div class="progress third">
                                    <span class="progress-left">
                                        <span class="progress-bar"></span>
                                    </span>
                                    <span class="progress-right">
                                <span class="progress-bar"></span>
                                    </span>

                                    <div class="progress-value"><img src="{{ asset('assets/images/icones-vendeurs2/Fichier 1@11.svg') }}" style="margin-top:-8px;margin-left:-2.5px;"></div>
                                </div>
                                <img src=" {{ asset('assets/images/icones-vendeurs2/Group 80.svg') }} " style="width:80px;height:60px; margin-left:144px;margin-top:-46px">
                            </a>
                            </section>

                            {{-- Historique raccourci  --}}
                            <li  onclick="raccourci4()"id="hc3"><img src="{{ asset('assets/images/icones-vendeurs2/icones-menu/codepromo.svg') }}"id="hc1"><img src="{{ asset('assets/images/icones-vendeurs2/icones-menu/codepromobleu.svg') }}" id="hc2" style="display:none;"><br><br><p style="margin-top:2px">Historique <br>de codes</p></li>
                            <section style="display: none;margin-left:9px; box-sizing: border-box;
                            height: 70px;
                            width: 142px;
                            border: 1px solid #9B9B9B;
                            border-radius: 6px;
                            background-color: #FFFFFF;padding:10px;"id="hc4"><p style=" color: #9B9B9B;
                            font-family: Roboto;
                            font-size: 10px;
                            letter-spacing: 0;
                            line-height: 11px;">Dernier code générer</p>
                            <img src="{{ asset('assets/images/icones-vendeurs2/Copier_Coller.svg') }}" style="float:right;margin-top:-27px;">
                            <article style="  box-sizing: border-box;
                            height: 34px;
                            width: 122px;
                            border: 1px solid #D0021B;
                            border-radius: 6px;
                            background-color: #FFFFFF;text-align:center;  color: #191970;
                            font-family: Roboto;
                            font-size: 20px;
                            font-weight: bold;
                            letter-spacing: 0;
                            line-height: 22px;padding-top:5px;margin-top:-10px;padding-left:8px;">XX-XXX-XX</article>

                            </section>

                            <section style="  box-sizing: border-box;
                            height: 70px;
                            width: 145px;
                            border: 1px solid #9B9B9B
                            border-radius: 6px;
                            background-color: #FFFFFF;padding:5px;display:none;margin-left:9px;"id="hc5">
                            <article style="  height: 60px;
                            width: 135px;
                            border-radius: 6px;
                            background-color: #F5F5F5;text-align:center;padding-top:20px; color: #4A4A4A;
                            font-family: Roboto;
                            font-size: 12px;
                            font-weight: bold;
                            letter-spacing: 0.24px;
                            line-height: 13px;
                            ">Mon historique<br>
                            de codes</article>
                            </section>
                            {{-- Corbeille --}}
                            <li onclick="raccourci6()"id="corb3"><img src="{{ asset('assets/images/icones-vendeurs2/icones-menu/corbeille.svg') }}"id="corb1"><img src=" {{ asset('assets/images/icones-vendeurs2/icones-menu/corbeillebleu.svg') }}"id="corb2" style="display:none;"><br><br><br><p style="margin-top:2px">Corbeille</p></li>
                            <section style="display: none;margin-left:9px; box-sizing: border-box;
                            height: 70px;
                            width: 124px;
                            border: 1px solid #9B9B9B;
                            border-radius: 6px;
                            background-color: #FFFFFF;"id="corb4">
                            <p style="  color: #9B9B9B;
                            font-family: Roboto;
                            font-size: 10px;
                            letter-spacing: 0;
                            line-height: 11px;margin-top:10px;margin-left:10px;">Article dans la corbeille</p>
                            <article class="cobat" style="height: 21px;
                            width: 104px;
                            border-radius: 6px;
                            margin-left:10px;padding:3px;margin-top:-10px;"><a style="text-decoration: none; "onclick="ouvcorb()"><p style="  color: #D0021B;
                           font-family: Roboto;
                           font-size: 16px;
                           font-weight: bold;
                           letter-spacing: 0;

                           line-height: 13px;">999</p><img src=" {{ asset('assets/images/icones-vendeurs2/three-dots.svg') }} "
                           style="float: right; margin-top:-30px;"></a>
                         </article>
                         <p style="
                           width: 110px;
                           color: #191970;
                           font-family: Roboto;
                           font-size: 8px;
                           letter-spacing: 0;
                           line-height: 9px;padding:0px;text-align:center;margin-top:7px;font-size:7px;margin-left:7.3px;">Réinitialisation sous 30jours</p>
                           <article style="width:115px; height:25px;background-color:#fff;padding-top:0px;
                           box-shadow: 0 0 4px 0 rgba(0,0,0,0.25)
                          ;display:none;margin-top:-28px;margin-left:10px;border-radius:3px;;position:relative;background-color:#F5F5F5" id="vidcorb"><p style="color: #191970;
                           font-family: Roboto;
                           font-size: 11px;
                           font-weight: 500;
                           letter-spacing: 0;
                           line-height: 13px; text-align:center;padding-top:5px;">Vider la corbeille</p></article>

                            </section>

                            <li  onclick="raccourci5()" id="cp3"><img src=" {{ asset('assets/images/icones-vendeurs2/icones-menu/promo.svg') }} " id="cp1"><img src="{{ asset('assets/images/icones-vendeurs2/icones-menu/promobleu.svg') }}"id="cp2" style="display: none;"><br><br><p style="margin-top:2px">Créer<br>une promo</p></li>
                            <section style=" box-sizing: border-box;
                            height: 70px;
                            width: 368.5px;
                            border: 1px solid #1A7EF5;
                            border-radius: 6px;
                            background-color: #FFFFFF;display:none;margin-left:9px;"id="cp4"></section>
                            <li style="padding:4px;display:none;"onclick="raccourci6()"><article style=" height: 60px;
                                width: 60px;
                                border-radius: 6px;
                                background-color: #1A7EF5;color:white;text-align:center;padding-top:20px;padding:5px; font-family: Roboto;
                                font-size: 12px;
                                font-weight:300;
                                letter-spacing: 0.24px;
                                line-height: 13px;padding-top:15px;" ><img src=" {{ asset('assets/images/icones-vendeurs2/Plusblanc.svg') }} " width="15px" height="15px;"style="margin-bottom:5px;"><br>Créer</article></li>

                        </div>
        </div>
        {{-- boutique produit container  --}}

       <div class="boutique-produit-container" style="position: absolute; width: 600px; height: auto; background: transparent; margin-left: 415px; margin-top: 5%; top: 300px">
        @foreach($rayon_product as  $p)
        <div class="d-block item main-barquette pt-produit-section ">
            {{-- <div class="sous-categorie-title">
                <p>{{ $p->libelle }}</p>
            </div>
            <div class="barquette" >
                <a onclick="getId({{$p->id}})">
                <img class="owl-lazy" data-src="{{ $p->image }}" alt=""></a>
            </div> --}}
            <div class="case-produit">
                <img class="image_principal-produit" src="{{ asset('uploads/'.$p->image)}}" alt="">
                <div class="main-prod-options" ><div class="box-prod-options" onclick="showRecapProduitMarchand('1')">
                    <img src="{{ asset('assets/images/editer Copy.svg')}}">
                </div><div onclick="editProduct('+response[u].id+')" class="box-prod-options">
                    <img  src="{{ asset('assets/images/edit-off-marchand.svg') }}">
                </div>
                <div onClick="deleteProductMarchand('+response[u].id+')" class="box-prod-options" style="border: 1px solid #1A7EF5;">
                    <img style="position: relative; top: 3px; left: 5px" src="{{ asset('assets/images/Waste Basket.svg')}}">
                    </div>
                </div>
            </div>

        </div>
    @endforeach


        </div>

        {{--  <button class="add-product-button" style="margin-top: -10px" onclick="showAddProduct()">
            <span class="add-product-icon">+</span>
            <span class="btn-add-product-title">NOUVEL ARTICLE</span>
        </button> --}}

        <div class="bottom-bar-float">

            <div class="zone-user">

                <div class="img-section">
                    <img src="{{ asset('assets/images2/user.png')}}" alt="" >
                </div>

                <div class="icon-zone">
                    <img src="{{ asset('assets/images/Chariot-1.svg')}}" alt="" >
                </div>

                <div class="over-section">

                </div>
            </div>

            <div class="zone-user">
                <div class="img-section">
                    <img src=" {{ asset('assets/images2/pierre.jpg') }}" alt="" >
                </div>
                <div class="icon-zone">
                    <img src=" {{ asset('assets/images/Chariot-1.svg') }} " alt="" >
                </div>

                <div class="over-section">

                </div>
            </div>

            <div class="zone-user">
                <div class="img-section">
                    <img src="{{ asset('assets/images2/user.png') }}" alt="" >
                </div>
                <div class="icon-zone">
                    <img src=" {{ asset('assets/images/oeil.svg') }} " alt="" >
                </div>
                <div class="over-section">

                </div>
            </div>

            <div class="zone-user">
                <div class="img-section">
                    <img src="assets/images2/pierre.jpg" alt="" >
                </div>
                <div class="icon-zone">
                    <img src=" {{ asset('assets/images/Chariot-1.svg') }} " alt="" >
                </div>
                <div class="over-section">

                </div>
            </div>

            <div class="zone-user">
                <div class="img-section">
                    <img src="{{ asset('assets/images2/user.png') }}" alt="" >
                </div>
                <div class="icon-zone">
                    <img src="{{'assets/images/Chariot-1.svg'}}" alt="" >
                </div>
                <div class="over-section">

                </div>
            </div>

            <div class="zone-user">
                <div class="img-section">
                    <img src="{{ asset('assets/images2/pierre.jpg') }}" alt="" >
                </div>
                <div class="icon-zone">
                    <img src="{{ asset('assets/images/oeil.svg') }}" alt="" >
                </div>
                <div class="over-section">

                </div>
            </div>

            <div class="zone-user">
                <div class="img-section">
                    <img src="{{ asset('assets/images2/user.png') }}" alt="" >
                </div>
                <div class="icon-zone">
                    <img src="{{ asset('assets/images/Chariot-1.svg') }}" alt="" >
                </div>
                <div class="over-section">

                </div>
            </div>

            <div class="zone-user">
                <div class="img-section">
                    <img src="{{ asset('assets/images2/user.png') }}" alt="" >
                </div>
                <div class="icon-zone">
                    <img src="{{ asset('assets/images/oeil.svg') }}" alt="" >
                </div>
                <div class="over-section">

                </div>
            </div>

            <div class="zone-user">
                <div class="img-section">
                    <img src="{{ asset('assets/images2/pierre.jpg') }}" alt="" >
                </div>
                <div class="icon-zone">
                    <img src="{{ asset('assets/images/Chariot-1.svg') }}" alt="" >
                </div>
                <div class="over-section">

                </div>
            </div>

            <div class="zone-user">
                <div class="img-section">
                    <img src="{{ asset('assets/images2/user.png') }}" alt="" >
                </div>
                <div class="icon-zone">
                    <img src="{{ asset('assets/images/oeil.svg') }}" alt="" >
                </div>
                <div class="over-section">

                </div>
            </div>



            {{-- <div id="modalRecherche" class="modal fade" role="dialog">
                <div class="modal-dialog"  style="width: 1000px !important">

                <!-- Modal content-->
                <div class="modal-content" style="width: 1000px !important">

                <div class="modal-body" style="display: flex; justify-content: center; align-items: center; width: 1000px !important">

                        <p style="  color: #191970;
                        font-family: Roboto;
                        font-size: 24px;
                        font-weight: 500;
                        letter-spacing: -0.58px;
                        line-height: 28px;
                        margin-top:50px;text-align:center;" >Créer votre annonce</p>

                        <input  class="search" id="searchbar"  type="text"
                        name="search" placeholder="Dites-nous ce que vous vendez" style="  height: 33px;
                        width: 648px;margin-left:371px;border-radius: 6px;
                        background-color: #F5F5F5;padding-left:10px;border:1px solid #D8D8D8; color:#A4A4A4;">
                        <button style="background-color: #1A7EF5;  height: 33px;
                        width: 46px;
                        border-radius: 6px;margin-top:-33px;margin-left:1020px;border:1px solid #D8D8D8"><img src="assets/images/icones-vendeurs2/Recherche.svg" ></button>
                        <section id="p" style="width: 646px; height:437px;margin-left:371px;border-radius: 0 0 6px 6px;background-color:white;border:1px solid #d8D8D8;display:none;margin-top:-5px;">
                        <article style="width:646px;height:71px; border-bottom:1px solid #d8D8D8">
                        <p style="  color: #191970;
                        font-family: Roboto;
                        font-size: 16px;
                        font-weight: 500;
                        letter-spacing: -0.39px;
                        line-height: 19px;margin-left:20px;margin-top:20px;">Pouvez-vous être plus précis ?</p>
                        <p style=" color: #9B9B9B;
                        font-family: Roboto;
                        font-size: 13px;
                        letter-spacing: -0.31px;
                        line-height: 15px;;margin-left:20px;">Des détails supplémentaires permettront d’optimiser votre annonce</p>
                        </article>
                        <aside style="  height: 33px;
                        width: 646px;
                        background-color: #F5F5F5; border-top:F5F5F5;border-bottom:#F5F5F5;">
                        <p style="  color: #4A4A4A;
                        font-family: Roboto;
                        font-size: 14px;
                        letter-spacing: 0;
                        line-height: 16px;margin-left:20px;margin-top:8px;
                        "> <img src="assets/images/icones-vendeurs2/plusearch.svg" style="margin-top:10px;"> &nbsp manga</p>
                        </aside>
                        <aside style="  height: 33px;
                        width: 646px;
                        background-color: #F5F5F5; border-top:F5F5F5;border-bottom:#F5F5F5;margin-top:3px;">
                        <p style="  color: #4A4A4A;
                        font-family: Roboto;
                        font-size: 14px;
                        letter-spacing: 0;
                        line-height: 16px;margin-left:20px;margin-top:8px;
                        "> <img src="assets/images/icones-vendeurs2/plusearch.svg" style="margin-top:10px;">
                        magazine</p>
                        </aside>
                        <aside style="  height: 33px;
                        width: 646px;
                        background-color: #F5F5F5; border-top:F5F5F5;border-bottom:#F5F5F5;margin-top:3px;">
                        <p style="  color: #4A4A4A;
                        font-family: Roboto;
                        font-size: 14px;
                        letter-spacing: 0;
                        line-height: 16px;margin-top:8px;margin-left:20px
                        "> <img src="assets/images/icones-vendeurs2/plusearch.svg" style="margin-top:10px;"> macbook</p>
                        </aside>
                        <aside style="  height: 33px;
                        width: 646px;
                        background-color: #F5F5F5; border-top:F5F5F5;border-bottom:#F5F5F5;margin-top:3px;">
                        <p style="  color: #4A4A4A;
                        font-family: Roboto;
                        font-size: 14px;
                        letter-spacing: 0;
                        line-height: 16px;margin-top:8px;margin-left:20px
                        "> <img src="assets/images/icones-vendeurs2/plusearch.svg" style="margin-top:10px;"> maillot de foot</p>
                        </aside>
                        <aside style="  height: 33px;
                        width: 646px;
                        background-color: #F5F5F5; border-top:F5F5F5;border-bottom:#F5F5F5;margin-top:3px;">
                        <p style="  color: #4A4A4A;
                        font-family: Roboto;
                        font-size: 14px;
                        letter-spacing: 0;
                        line-height: 16px;margin-top:8px;margin-left:20px
                        "> <img src="assets/images/icones-vendeurs2/plusearch.svg" style="margin-top:10px;"> marmite</p>
                        </aside>
                        <aside style="  height: 33px;
                        width: 646px;
                        background-color: #F5F5F5; border-top:F5F5F5;border-bottom:#F5F5F5;margin-top:3px;">
                        <p style="  color: #4A4A4A;
                        font-family: Roboto;
                        font-size: 14px;
                        letter-spacing: 0;
                        line-height: 16px;margin-top:8px;margin-left:20px
                        "> <img src="assets/images/icones-vendeurs2/plusearch.svg" style="margin-top:10px;"> maillot homme</p>
                        </aside>
                        <aside style="  height: 33px;
                        width: 646px;
                        background-color: #F5F5F5; border-top:F5F5F5;border-bottom:#F5F5F5;margin-top:3px;">
                        <p style="  color: #4A4A4A;
                        font-family: Roboto;
                        font-size: 14px;
                        letter-spacing: 0;
                        line-height: 16px;margin-top:8px;margin-left:20px
                        "> <img src="assets/images/icones-vendeurs2/plusearch.svg" style="margin-top:10px;"> manette Xbox</p>
                        </aside>
                        <aside style="  height: 33px;
                        width: 646px;
                        background-color: #F5F5F5; border-top:F5F5F5;border-bottom:#F5F5F5;margin-top:3px;">
                        <p style="  color: #4A4A4A;
                        font-family: Roboto;
                        font-size: 14px;
                        letter-spacing: 0;
                        line-height: 16px;margin-top:8px;margin-left:20px
                        "> <img src="assets/images/icones-vendeurs2/plusearch.svg" style="margin-top:10px;"> manette PS4</p>
                        </aside>


                        </article>
                        </section>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
                </div>

            </div>
            </div> --}}

            {{-- @include('front.app-module.marchand.marchand-annonce.detail-annonce-search') --}}
        {{-- </div>
    </marquee> --}}
        </div>

        {{-- modal zone --}}
      {{-- @include('front.app-module.marchand.marchand-modals.gerer-equipe')
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
      @include('front.app-module.marchand.marchand-annonce.detail-annonce-titre')
      @include('front.app-module.marchand.marchand-modals.recap_produits_marchand');
      @include('front.app-module.marchand.marchand-annonce.detail-annonce-selection-service')
      @include('front.app-module.marchand.marchand-annonce.detail-annonce-selection-expedition')
      @include('front.app-module.marchand.marchand-modals.messagerie-marchand')
      @include('front.app-module.marchand.marchand-annonce.detail-annonce')
      @include('front.app-module.marchand.marchand-annonce.detail-annonce-expedition') --}}

    </div>

    {{-- <script src="foto.min.js"></script> detail-annonce-selection-expedition.blade --}}

    <script>

        // tableau des pays exclus
        var pays_exclu = []
        var mode_expedition = [];
        var modification_attribut = []
        function boldStringProduit(str, find) {
            var reg = new RegExp('('+find+')', 'gi');
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


        $('#checkboxes input[type=checkbox]').change(function() {
            var lieu_exclu = []
            if ($(this).is(':checked')) {

                var check_item = pays_exclu.indexOf($(this).val())
                if (check_item == -1) {
                    pays_exclu.push($(this).val())
                }
                var span_id = $(this).attr('data-check')
                lieu_exclu.push($(this).val())
                // pays_exclu.push($(this).val())
                var div_span2 = $('#pays-exclu-preview').find('span')

            }else{
                var idp = $(this).attr('data-check')
                $('#zone_exclue_'+idp).remove();

                var div_span2 = $('#pays-exclu-preview').find('span')


                var check_item = pays_exclu.indexOf($(this).val())
                if (check_item > -1) {
                    pays_exclu.splice(check_item, 1)
                }
            }

                if (pays_exclu.length > 0) {
                    $('#pays-exclu-preview').empty()
                    $('#savePaysExclu').prop('disabled', false)
                    $('#savePaysExclu').css('background-color', '#1A7EF5')
                    $('#aucun-lieu').addClass('s-none')
                    $('#selected-lieux-section').removeClass('s-none')
                    for (let u = 0; u < pays_exclu.length; u++) {
                    var textToPrint = pays_exclu[u] + (u != (pays_exclu.length - 1) ? "," : "")
                    let selected_pays = '<span id="zone_exclue_'+span_id+'" style="margin-right: 5px">'+textToPrint+'</span>'
                    $('#pays-exclu-preview').append(selected_pays)
                }
                }else {
                    $('#savePaysExclu').prop('disabled', true)
                    $('#savePaysExclu').css('background-color', '#ccc')
                    $('#aucun-lieu').removeClass('s-none')
                    $('#selected-lieux-section').addClass('s-none')
                }
            console.log('voici les pays exclu', pays_exclu)

        });

        $('#produit-rayon').on('change', function(){
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

                    // console.log('Ici les famille', response)
                }
            })

            $.ajax({
                method: 'GET',
                url: 'change_rayon_caracteristiques',
                data: {id: $('#produit-rayon').find(':selected').val()},
                headers: {},
                success: function(response) {
                    $('.caracteristique_element').empty()
                    var element1 = [];  //caracteristique-preview
                    var select_element = [];

                   for(var key in response){
                    var element_id = key.replace(/\s/g, '');
                    var element_id1 = element_id.replace(/'/g, '')
                    var element_id_final = element_id1.toLowerCase();
                    select_element += "<div class='caracteristique-zone'><label class='labele-items' style='position: relative; left: 0px'><small class='red-star'>*</small>"+key+"</label><select class='caracterisqueProd' data-select='"+key+"' name='"+key+"' id='"+element_id_final+"'>"+response[key]+"</select>"

                    select_element += "<div style='display: flex; margin-top: 5px'><span class='caracteristique-frequent-label'>Fréquent : </span><span class='caracteristique-frequent s-none'>iPhone 6s , iPhone 8 , iPhone X</span></div>"
                    select_element += "</div>"

                    $('.caracteristique-preview-element').append("<div class='caracteristique-zone-preview'><label class='labele-items' style='position: relative; left: 20px'>"+key+"</label><select  class='caracterisqueProdPreview' name='"+key+"' >"+response[key]+"</select></div>")
                     element1.push(element_id_final)
                   }

                   $('.caracteristique_element').append(select_element)
                   var nbre_caracteristique = document.getElementsByClassName('caracteristique-zone');
                   if (nbre_caracteristique.length < 4 ) {
                    var bouton_ajout_caracteristique = '<div id="btn-attr-product" class="ajoutcaracte" style=" width: 253px; display: flex; flex-direction: column;"><label class="labele-items">Ajouter une autre caractéristique</label><button class="ajout-caracteristique-btn" onclick="showAjoutCaracteristique()">+</button><div class="caracteristique-supplementaire s-none"><div class="row-supp-1"><label for="" style="margin-left: 7px; ">Nom:</label><div><input type="text" style="  height: 31px; width: 158px;border-radius: 6px;background-color: #F8F8F8; padding-left: 10px" id="caracteristique_libelle"></div><button disabled id="validateNomCaracteristique" style="height: 31px;width: 31px;border-radius: 6px;background-color: #D8D8D8; border: none; color: #fff; font-size: 24px; font-weight: 900" onclick="validerCaracteristique()"><svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-check" viewBox="0 0 16 16"><path d="M10.97 4.97a.75.75 0 0 1 1.07 1.05l-3.99 4.99a.75.75 0 0 1-1.08.02L4.324 8.384a.75.75 0 1 1 1.06-1.06l2.094 2.093 3.473-4.425a.267.267 0 0 1 .02-.022z"/></svg></button></div><div class="row-supp-2" id="myInputCaracteristiqueContainer"><div style="margin-left: 5xp"><input type="text" id="attribute_1" onkeyup="activeValidateButton()" class="add-input-caracteristique" ><span onclick="closeInputUrl("photo_2-url")"class="clean-text-suggestion " style="position: absolute; margin-left: -16px; color: red; font-size: 20px">&times;</span></div><div class="bouton-ajout-caract"><button style="  box-sizing: border-box;height: 31px;width: 118px;border: 1px solid #1A7EF5;border-radius: 6px;background-color: #FFFFFF; margin-left: 5px" onclick="addAttributeElements()">+</button></div></div><div class="row-supp-2"></div></div></div> '
                        $('.caracteristique_element').append(bouton_ajout_caracteristique)
                   }

                   if (nbre_caracteristique.length > 4) {
                        console.log('supperieur à 4')
                        // $('.resultat-element').css('padding-bottom', '0px')
                        $('#main_caracteristique_section1').removeClass('caracteristiques-section-elements-min')
                        $('#main_caracteristique_section1').addClass('caracteristiques-section-elements-max')
                   }else {
                    console.log('inferieur à 4')
                        $('#main_caracteristique_section1').addClass('caracteristiques-section-elements-min')
                        $('#main_caracteristique_section1').removeClass('caracteristiques-section-elements-max')
                   }
                   $('#tabcaracteristique').val([element1])

                }
            })

        })

        $("#searchProduitBar").keyup(function(){
        var rechereVal = $('#searchProduitBar').val();
            if (rechereVal.length == 0) {
                console.log('Resulta vide')
                $('.ul-search').css('display','none')
                $('.produit-search-container').addClass('s-none')
                $('#result-sous-categorie-section').slideUp("slow");
                $('.resultat-element').css('padding-bottom', '0px')
                $('#idsouscategorieSearch').val('')
                $('.clean-text-suggestion').addClass('s-none')
                $('.search-button').addClass('lefted-element')

                // $('.ul-search').empty()
            }else{

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
                    // console.log(response)

                    $('.ul-search').empty()

                    if (response.length == 0) {
                        console.log("Aucun un résultat trouvé")
                        $('.ul-search').append('<span style="position: relative; left: 120px; top: 30px">Aucun Résultat trouvé</span>')
                        $('.ul-search').empty()
                        $('.resultat-element').empty();
                        $('.results-header-visible').addClass('s-none');
                        $('.no-results-header').removeClass('s-none')
                        $('.resultat-element').css('padding-bottom', '0px')
                        $('#idsouscategorieSearch').val('')
                        // $('.resultat-element').css('padding-bottom', '0px')
                        // $('.resultat-element').append('<span style="position: relative; left: 120px; top: 30px">Aucun Résultat trouvé</span>')
                    }else {
                        $('#result-sous-categorie-section').slideDown("slow");
                        $('.resultat-element').empty()
                        $('.results-header-visible').removeClass('s-none');
                        $('.no-results-header').addClass('s-none')
                        $('.resultat-element').css('padding-bottom', '10px')
                        for (let index = 0; index < response.length; index++) {
                            var libelle = response[index].libelle

                            var libis = '<aside class="search-product-item" onmouseleave="mouseLeaveItem('+response[index].id+')" onmouseover="mouseOverItem('+response[index].id+')" data-categorie="'+response[index].sous_categorie_id+'"  data-id="'+response[index].libelle+'" id="prod_'+response[index].id+'" onclick="getAllSousCategorieProduct('+response[index].id+')" style="  height: 33px; width: 646px; background-color: #fff; border-top:F5F5F5;border-bottom:#F5F5F5;"><p class="results-items-over" style="  color: #4A4A4A;-family: Roboto; font-size: 14px; letter-spacing: 0; line-height: 16px;margin-left:20px;margin-top:2px;"> <img src="assets/images/icones-vendeurs2/Plus-blanc.svg" style="margin-top:10px;"> &nbsp <span style="position: relative; top: 7px" class="text-result-search">'+boldStringProduit(response[index].libelle, rechereVal)+'</span></p></aside>'
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
            console.log("Encours de suppression")
        })


        // creer une nouvelle annonce en cas des resultats de la recherche non voulu
        $('#creer-nouvelle-annonce').on('click', function() {
            let libelleSearch = $('#searchProduitBar').val();
            if (libelleSearch !== '') {
                // let id_sous_categorie = $('#idsouscategorieSearch').val(); // au lieu de sous_categorie_id on aura rayon_id
                let rayon_id = $('#rayon_id').val();
                // let rayon_id = 3;
                if (rayon_id !== '') {
                    $("#libelle-produit").val(libelleSearch)
                    liClicked(rayon_id)
                    $('#popupannonce-recheche').hide();
                    $('#detailAnnonce').modal('show')
                }else{
                    liClicked(-1)
                    $("#libelle-produit").val(libelleSearch)  //affectation du titre de l'annonce
                    $('#popupannonce-recheche').hide();
                    $('#detailAnnonce').modal('show')
                }

            }else {
                console.log("Ce champ est bligatoire")
            }

        })

        $('#close-search-product').on('click', function() {
            $('#popupannonce-recheche').hide();
        })

        $('#description_produit').keyup(function() {
            var description = $('#description_produit').val()
            var description_no_space = description.replace(/\s/g, '');
            var counter = description.length
            $('#produit-description-caracter-counter').text(counter +' / 4000 caractères')

        })
      });
          </script>


    <script type="application/javascript">

        var images_produit_web = [];
        var images_produit_normal = [];
        var caracteristique_supp = [];
        var photo_counter = 0;
        // window.onload = function() {
        //     $("#dcac1").find("input,select,textarea,button").prop("disabled",true);

        //     $.ajax({
        //         method: 'GET',
        //         url: 'marchand_boutique_product',
        //         data: {},
        //         headers: {},
        //         success: function(response) {
        //             for (let u = 0; u < response.length; u++) {
        //                 // var
        //                 $('.boutique-produit-container').append('<div class="case-produit"><img class="image_principal-produit" src="uploads/'+response[u].image+'" alt=""><div class="main-prod-options" style=""><div class="box-prod-options" onclick="showRecapProduitMarchand('+response[u].id+')"><img src="assets/images/editer Copy.svg"></div><div onclick="editProduct('+response[u].id+')" class="box-prod-options"><img  src="assets/images/edit-off-marchand.svg"></div><div onClick="deleteProductMarchand('+response[u].id+')" class="box-prod-options" style="border: 1px solid #1A7EF5;"><img style="position: relative; top: 3px; left: 5px" src="assets/images/Waste Basket.svg"></div></div></div>')
        //             }
        //         }

        //     })
        // }
        var foto = new Foto();

        function showAddProduct() {
            // $('#detailAnnonce').modal('show')
            $('#popupannonce-recheche').removeClass('s-none')
            $('#popupannonce-recheche').show()
            $('#searchProduitBar').focus();
        }

        function showRecapProduitMarchand(id) {
            console.log('Here is the id', id)
            $.ajax({
                method: 'GET',
                url: 'show_detail_produit/'+id,
                data: {},
                headers: {},
                success: function(response){

                    $('#article_title_marchand').text(response[0][0]['libelle'])
                    $('#prix_total_m').text(response[0][0]['prix']+'Fcfa')
                    $('#description_marchand_zone1').text(response[0][0]['description'])
                    $('#image_principalMarchandPreview').attr('src', 'uploads/'+response[0][0]['image'])
                    $('#image_principalM1').attr('src', 'uploads/'+response[0][0]['image'])
                    $('#quantite_marchand').val(response[0][0]['quantite'])
                    $('#reference_marchand').text(response[0][0]['ref'])
                    // $('#expedition_text_marchand').text(response[1][0]['id_expedition'])
                    if (response[1][0] != undefined) {
                        console.log(response[1][0])
                        $('#expedition_text_marchand').text('Par '+response[1][0]['mode_expedition'] + ' en 24 h')
                    }else {
                        console.log(response[1][0])
                        $('#expedition_text_marchand').text('Pas de mode d\'expedition pour ce produit')
                    }


                    for (let j = 0; j < response[0][0]['produit_images'].length; j++) {
                        if ($('#image_autreMarchand'+j).hasClass('s-none')) {
                            $('#image_autreMarchand'+j).removeClass('s-none')
                        }
                        $('#image_autreMarchand'+j).attr('src', 'uploads/'+response[0][0]['produit_images'][j]['image'])
                    }

                    if(response[0][0]['produit_images'].length < 6) {
                        for (let u = response[0][0]['produit_images'].length; u < 6; u++) {
                            $('#image_autreMarchand'+u).addClass('s-none')
                        }
                    }


                }
            })

            $('#recapProduitMarchand').modal('show')
        }

        function rayonByUnivers(id){
            var boutique_univers = $('#univer-boutique').find(':selected').val();

            $.ajax({
                method: 'GET',
                url: 'rayon_by_univers/'+boutique_univers,
                data: {},
                headers: {},
                success: function(response) {
                    $('#produit-rayon').empty()
                    console.log('reponse verif', response)
                    var rayon_option = []
                    rayon_option = "<option value=''>-- Choisir un rayon --</option>"
                    for (let i = 0; i < response.length; i++) {
                        rayon_option += "<option value="+response[i]['rayon_id']+">"+response[i]['libelle']+"</option>"
                    }
                    $('#produit-rayon').append(rayon_option)
                }
            })
        }


        function saveImageProvisoir(){
            var img_0_src = $('#photo_0-view').attr('src')
            if ($('#photo_0').get(0).files[0] == undefined && img_0_src == 'assets/images/icones-vendeurs2/image_outline_icon_139447.svg') {

            }else {
                for (let i = 0; i < 6; i++) {
                var img = $('#photo_'+i).get(0).files[0]
                if (img != undefined) {
                    images_produit_normal.push(img);
                    $('#save-all-image-button').attr("disabled", "disabled");
                    $('#save-all-image-button').css('background-color','#ccc')
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

        // resultat de la recherche cliqué
        function liClicked(id, libelle) {
            let element_id = $('#'+id);
            $('#id_sous_cat').val(id); // id sous categorie
            $('.ul-search').css('display','none')
            $.ajax({
                type: "POST",
                url: "get_caracteristique_value",
                data: {'idCar': id},
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },

                success: function(response) {
                    $('.caracteristique_element').empty()
                    var element1 = [];  //caracteristique-preview
                    var select_element = [];

                   for(var key in response){
                    var element_id = key.replace(/\s/g, '');
                    var element_id1 = element_id.replace(/'/g, '')
                    var element_id_final = element_id1.toLowerCase();
                    select_element += "<div class='caracteristique-zone'><label class='labele-items' style='position: relative; left: 0px'><small class='red-star'>*</small>"+key+"</label><select class='caracterisqueProd' data-select='"+key+"' name='"+key+"' id='"+element_id_final+"'>"+response[key]+"</select>"

                    select_element += "<div style='display: flex; margin-top: 5px'><span class='caracteristique-frequent-label'>Fréquent : </span><span class='caracteristique-frequent s-none'>iPhone 6s , iPhone 8 , iPhone X</span></div>"
                    select_element += "</div>"
                    $('.caracteristique-preview-element').append("<div class='caracteristique-zone-preview'><label class='labele-items' style='position: relative; left: 20px'>"+key+"</label><select data-select='"+key+"' class='caracterisqueProdPreview' name='"+key+"' id='"+element_id_final+"'>"+response[key]+"</select></div>")
                     element1.push(element_id_final)
                   }

                   $('.caracteristique_element').append(select_element)
                   var nbre_caracteristique = document.getElementsByClassName('caracteristique-zone');
                   if (nbre_caracteristique.length < 4 ) {
                    var bouton_ajout_caracteristique = '<div id="btn-attr-product" class="ajoutcaracte" style=" width: 253px; display: flex; flex-direction: column;"><label class="labele-items">Ajouter une autre caractéristique</label><button class="ajout-caracteristique-btn" onclick="showAjoutCaracteristique()">+</button><div class="caracteristique-supplementaire s-none"><div class="row-supp-1"><label for="" style="margin-left: 7px; ">Nom:</label><div><input type="text" style="  height: 31px; width: 158px;border-radius: 6px;background-color: #F8F8F8; padding-left: 10px" id="caracteristique_libelle"></div><button disabled id="validateNomCaracteristique" style="height: 31px;width: 31px;border-radius: 6px;background-color: #D8D8D8; border: none; color: #fff; font-size: 24px; font-weight: 900" onclick="validerCaracteristique()"><svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-check" viewBox="0 0 16 16"><path d="M10.97 4.97a.75.75 0 0 1 1.07 1.05l-3.99 4.99a.75.75 0 0 1-1.08.02L4.324 8.384a.75.75 0 1 1 1.06-1.06l2.094 2.093 3.473-4.425a.267.267 0 0 1 .02-.022z"/></svg></button></div><div class="row-supp-2" id="myInputCaracteristiqueContainer"><div style="margin-left: 5xp"><input type="text" id="attribute_1" onkeyup="activeValidateButton()" class="add-input-caracteristique" ><span onclick="closeInputUrl("photo_2-url")"class="clean-text-suggestion " style="position: absolute; margin-left: -16px; color: red; font-size: 20px">&times;</span></div><div class="bouton-ajout-caract"><button style="  box-sizing: border-box;height: 31px;width: 118px;border: 1px solid #1A7EF5;border-radius: 6px;background-color: #FFFFFF; margin-left: 5px" onclick="addAttributeElements()">+</button></div></div><div class="row-supp-2"></div></div></div> '
                        $('.caracteristique_element').append(bouton_ajout_caracteristique)
                   }

                   if (nbre_caracteristique.length > 4) {
                        console.log('supperieur à 4')
                        // $('.resultat-element').css('padding-bottom', '0px')
                        $('#main_caracteristique_section1').removeClass('caracteristiques-section-elements-min')
                        $('#main_caracteristique_section1').addClass('caracteristiques-section-elements-max')
                   }else {
                    console.log('inferieur à 4')
                        $('#main_caracteristique_section1').addClass('caracteristiques-section-elements-min')
                        $('#main_caracteristique_section1').removeClass('caracteristiques-section-elements-max')
                   }

                   $('#tabcaracteristique').val([element1])

                }
            })

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
                url: 'produit_sous_categorie_rayon/'+data_sous_cat,
                data: {},
                headers: {},
                success: function(response) {

                    // var rayonSelectVal = 6
                    if (response.length > 0) {
                        var universSelectedVal = response[0]['univer_id']
                        var rayonSelectVal = response[0]['id']
                        $('#rayon_id').val(response[0]['id'])
                        var hasUniverOption = $('#univer-boutique option[value=" '+universSelectedVal+' "]')
                        var hasRayonOption = $('#produit-rayon option[value="' +rayonSelectVal+ '"]') //check if rayon existe
                        if (hasRayonOption.length > 0) {
                            $('#rayon-section-label').text(response[0]['libelle'])

                            $('#univer-boutique').val(universSelectedVal).select();
                            $('#produit-rayon').val(rayonSelectVal).select() // chargement des rayons automatique
                            // $('#rayon-section-label').removeClass('s-none')
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

            let id_sous_categorie = $('#idsouscategorieSearch').val();

            if (id_sous_categorie != '') {
                $.ajax({
                method: "GET",
                url: "sous_categorie_product/"+id_sous_categorie,
                data: {},
                headers: {},
                success: function(response) {
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
                                card +='<img class="imagessearch" src="uploads/'+response[i]['image']+'" width: "183px" heigh="183px">'
                            }
                            card += '</aside><div style="box-sizing: border-box;height: 183px;width: 1px;border: 1px solid #f5f5f5; position: relative; top: -184px; left:200px"></div> <div style="height: 183px;width: 183px; margin-left:210px;margin-top:-367px;"><div style="height: 150px; width: 100%; background-color: #fff; position: relative"><p style="  color: #191970;font-family: Roboto;font-size: 12px;font-weight: 500;letter-spacing: -0.08px;line-height: 13px;text-align:left;">'+response[i]['libelle']+'</p>' ;

                            card += '<p style="  color: #191970;font-family: Roboto;font-size: 12px;font-weight: 500;letter-spacing: 0;line-height: 11px;margin-left:10px; display: flex; flex-direction: column; row-gap: 10px">'

                            let attribut = response[i]['produit_attribut']

                            for (let j = 0; j < attribut.length; j++) {
                                card += '<span style="position: relative; left: -10px"><span style="font-family:Roboto; font-weight: 300;">'+attribut[j]['id_caracteristique_valeur']+'</span> : <span style="font-family: Roboto; font-weight: 500">'+attribut[j]['valeur']+'</span></span>'

                            }

                            card += '</p> </div><div style="height:40px; width: 100%; position: relative; top: -35px">'
                            card += '<hr style="width:185px;height:2px; background-color:#9B9B9B; position: relative; top: 5px; "><button class="vendre-meme-article" type="submit" style="  height: 34px;width: 185px;border-radius: 6px;background-color: #1A7EF5;color:white;border:1px solid #1A7EF5; position: relative; " onClick="vendreMemeProduit('+response[i]['id']+')">Vendre le même article</button></div></div></article>'

                            $('#search-product-result11').append(card)
                            console.log(response[i]['produit_attribut'])

                        }
                    }else {
                        var msg_retour = "<p id='resultat_vide' style='text-align: center; position: relative; top: 50px'>Aucun resultat trouvé veillez clicker sur le bouton créer une annonce</p>"
                        $('#result-sous-categorie-section').hide()
                        $('.produit-search-container').removeClass('s-none')
                        $('.produit-search-container').append(msg_retour)
                    }

                    console.log(response)
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
        }

        function vendreMemeProduit(id) {
            $('#popupannonce-recheche').addClass('s-none')
            $('#detailAnnonce').modal('show')
            $.ajax({
                method: 'GET',
                url: 'vendre_meme_produit/'+id,
                data: {},
                headers: {},
                success: function(response){

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
                    $('#photo_0-view').attr('src', 'uploads/'+response[0]['image'])
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
                    $('#main-image-preview').attr('src', 'uploads/'+response[0]['image'])
                    $('#main-image-preview').css({'position': 'relative', 'top': '-12px', 'border-radius': '6px'})
                    // $('#main-image-preview').css('top', '12px')
                    $('#main-image-preview').attr('height', "308px")
                    $('#main-image-preview').attr('width', "308px")
                    $('#main-image-preview1').addClass('s-none')
                    $('#main-image-preview').removeClass('s-none')


                    for (let j = 0; j < response[0]['produit_images'].length; j++) {
                        var img_index = j+1
                        $('#photo_'+img_index+'-view').attr('src', 'uploads/'+response[0]['produit_images'][j]['image'])
                        $('#photo_'+img_index+'-view').attr('height', "100px")
                        $('#photo_'+img_index+'-view').attr('width', "100px")
                        $('#photo_'+img_index+'-view').css({'display':'block', 'height': '100px !important', 'width': '100px !important'});
                        $('#photo_'+img_index+'-view').css('border-radius','6px')
                        $('#photo_'+img_index+'-view').css('margin-right','-4px')

                        $('#photo_'+img_index+'-bclose').removeClass('s-none')
                        $('#photo_'+img_index+'-bclose').css({'position': 'absolute', 'margin-top': '-80px', 'margin-right':'-80px'})
                        $('#photo_'+img_index+'-b').css('display','none')
                    }

                    liClicked(response[0]['id_rayon'])
                }

            })

        }

        function showMenuProfil() {
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

            if (img.length == 0 && img_0_src == 'assets/images/icones-vendeurs2/image_outline_icon_139447.svg') {
                $('#photo_0-p').attr('src', 'assets/images/point_exclamation.svg')
                $('#photo_0-p').css('position', 'relative')
                $('#photo_0-p').css('left', '-10px')
                $('#photo_0-b').attr('disabled','disabled')
                $('#photo_0-berror').removeClass('s-none')
            }

            if(libelle.length > 0 && (img.length > 0 || img_0_src != 'assets/images/icones-vendeurs2/image_outline_icon_139447.svg') && ($('#save-all-image-button').hasClass('saved') || images_produit_web.length > 0) ) {
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
        }


        function showTabAnnonceVenteStep1(){
            var description = $('#prix_achat').val();
            var quantite = $('#quantite_produit_disponible').val()
            var val_inferieur = $('#accepter_offre_inferieur-valeur').val()
            var val_supperieur = $('#refuse_offre_inferieur-value').val()
            var negociation_5_value = $('#negocier-1-value').find(':selected').val()
            var negociation_15_value = $('#negocier-2-value').find(':selected').val()
            var negociation_20_value = $('#negocier-3-value').find(':selected').val()
            var delais_retour = $('#delais-annulation-national').find(':selected').val();  //reglement_de_paiement
            var reglement_de_paiement = $('#frais_retourd').find(':selected').val();

            if (description.length == 0) {
                $('#prix_achat').addClass('error-produit')
            }

            if (quantite.length == 0) {
                $('#quantite_produit_disponible').addClass('error-produit')
                window.scrollTo({ top: 0, behavior: 'smooth' });
            }

            var nbre_produit_lot = $('#nbre_produit_lot').val();

            if ($('#vente_par_lot').is(":checked") && nbre_produit_lot == 0) {
                $('#nbre_produit_lot').addClass('error-produit')
            }

            if (description.length >0 && quantite.length > 0 && (!$('#nbre_produit_lot').hasClass('error-produit')) && !$('#accepter_offre_inferieur-valeur').hasClass('error-produit') && !$('#refuse_offre_inferieur-value').hasClass('error-produit') && !$('#negocier-1-value').hasClass('error-produit') && !$('#negocier-2-value').hasClass('error-produit') && !$('#negocier-3-value').hasClass('error-produit')) {
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

        function saveProduct() {

            let formData = new FormData();

                  // --------------------images ----------------------------
            let image_principal = $('#photo_0').get(0).files[0];
            let image1 = $('#photo_1').get(0).files[0];
            let image2 = $('#photo_2').get(0).files[0];
            let image3 = $('#photo_3').get(0).files[0];
            let image4 = $('#photo_4').get(0).files[0];
            let image5 = $('#photo_4').get(0).files[0];
            // var formData = new FormData();
            formData.append('image0', image_principal);
            formData.append('image1', image1)
            formData.append('image2', image2)
            formData.append('image3', image3)
            formData.append('image4', image4)
            formData.append('image5', image5)

            $.ajax({
                type:'POST',
                url:"ajout_produit",
                data: formData,
                contentType: false,
                processData: false,
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                success:function(response){
                    console.log(response)
                }
            });

        }

        let photo_product = array();

        function saveCorrection() {

        }

        function globalView(id) {
            // *****************
            $('.main-image-section').removeClass('s-none');
            $('#preview_video').addClass('s-none')

            var image_url = $('#'+id).attr('src');
            // ************************ updated
            $('#main-image-preview1').addClass('s-none')
            $('#main-image-preview').removeClass('s-none')
            $('#main-image-preview1').attr('height', '75px')
            $('#main-image-preview1').attr('weight', '75px')
            // *************************updated

            $('.photo-button-section').addClass('s-none')
            $('#main-image-preview').attr('src', image_url)
            $('#main-image-preview').attr('height', "308px")
            $('#main-image-preview').attr('width', "308px")

        }

        function removeImage() {
                $('#main-image-preview').attr('src', 'assets/images/icones-vendeurs2/image_outline_icon_139447.svg')
                $('#main-image-preview').attr('height', '75px')
                $('#main-image-preview').attr('weight', '75px')
                $('.photo-button-section').removeClass('s-none')
        }

        // produit image onchange
        function imageChangedPrincipal(id) {

            var accepted_format = [".jpg", ".jpeg", ".bmp", ".gif", ".png", "jfif"]
            var imagePrincipal = $('#'+id).get(0).files[0];
            var imagePrincipal = $('#'+id).get(0).files[0];
            var nom_image = $('#'+id).val().replace(/C:\\fakepath\\/i, '')

            var index = id.substr(id.length -1);
            photo_counter = photo_counter + 1;
            $('#photo-counter').text('('+photo_counter+'/6)')

            if (nom_image.length > 0) {
                var blnValid = false;
                for(var i = 0; i < accepted_format.length; i++) {
                    var extensionImage = accepted_format[i];
                if (nom_image.substr(nom_image.length - extensionImage.length, extensionImage.length).toLowerCase() == extensionImage.toLowerCase()) {
                    blnValid = true;
                    break;
                }
                }

                if(!blnValid) {
                    $('#'+id+'-p').attr('src', 'assets/images/point_exclamation.svg')
                    $('#'+id+'-p').css('position', 'relative')
                    $('#'+id+'-p').css('left', '-10px')
                    $('#'+id+'-b').attr('disabled','disabled')
                    $('#g-preview-error').removeClass('s-none')
                    $('#g-preview-error').text(nom_image)
                    $('#'+id+'-berror').removeClass('s-none')
                    $('#cadre-error').removeClass('s-none')
                    $('#cadre-cadre-preview').addClass('s-none')
                }else{
                    var reader = new FileReader();
                reader.onload = function(){
                    $('#'+id+'-view').attr('src', reader.result)
                    $('#'+id+'-view').attr('height', "100px")
                    $('#'+id+'-view').attr('width', "100px")
                    $('#'+id+'-view').css({'display':'block', 'height': '100px !important', 'width': '100px !important'});
                    $('#'+id+'-view').css('border-radius','6px')
                    $('#'+id+'-view').css('margin-right','-4px')

                    $('#'+id+'-bclose').removeClass('s-none')
                    $('#'+id+'-bclose').css({'position': 'absolute', 'margin-top': '-80px', 'margin-right':'-80px'})
                    $('#'+id+'-b').css('display','none')

                    // position: absolute; margin-top: -80px; margin-right: -80;

                    $('.photo-button-section').addClass('s-none')
                    $('#main-image-preview').attr('src', reader.result)
                    $('#main-image-preview').css({'position': 'relative', 'top': '-12px', 'border-radius': '6px'})
                    // $('#main-image-preview').css('top', '12px')
                    $('#main-image-preview').attr('height', "308px")
                    $('#main-image-preview').attr('width', "308px")
                    $('#main-image-preview1').addClass('s-none')
                    $('#main-image-preview').removeClass('s-none')

                    $('#input-web_'+index).addClass('disable-video-url')

                    // verifier si le bouton est grisé
                    if ($('#save-all-image-button').attr('disabled')) {
                        $('#save-all-image-button').removeAttr('disabled')
                        $('#save-all-image-button').css('background-color', '#1A7EF5')
                        console.log('L\'attribut existe')
                    }

                    // supprimerImage


                }
                reader.readAsDataURL(imagePrincipal);
                }
            }

        }

        function supprimerImage(id) {
            var imag1 = $('#'+id+'-view').attr('src');
            var imag2 = $('#main-image-preview').attr('src')
            var imaga_number = images_produit_normal.length;

            if (imaga_number > 0) {
                images_produit_normal.splice(0, 1);
                console.log(images_produit_normal)
            }

            if (images_produit_normal.length == 0) {
                $('#save-all-image-button').removeAttr('disabled')
                $('#save-all-image-button').css('background-color', '#1A7EF5')
                $('#save-all-image-button').removeClass('saved')
            }

            if (imag1 == imag2) {
                $('#main-image-preview').attr('src', 'assets/images/icones-vendeurs2/image_outline_icon_139447.svg')
                // toggle image section
                $('#main-image-preview1').removeClass('s-none')
                $('#main-image-preview').addClass('s-none')
                $('#main-image-preview1').attr('height', '75px')
                $('#main-image-preview1').attr('weight', '75px')
                $('.photo-button-section').removeClass('s-none')
            }

            photo_counter = photo_counter - 1;
            $('#photo-counter').text('('+photo_counter+'/6)')

            $('#'+id).val('')

            $('#'+id+'-b').css('display','block')
            $('#'+id).val();
            $('#'+id+'-bclose').addClass('s-none')
            $('#'+id+'-view').attr('src', 'assets/images/icones-vendeurs2/image_outline_icon_139447.svg');
            $('#'+id+'-view').css('display', 'none')

            var index = id.substr(id.length - 1);
            $('#input-web_'+index).removeClass('disable-video-url')
            $('#photo_'+index+'-url-value').val('')

            // if (photo_counter == 0 && $('#save-all-image-button').hasClass('saved')) {
            //     $('#save-all-image-button').removeClass('saved')
            // }

        }

                // delete all image
        function deleteAllImage(){
            var i = 6;
            for (let i = 0; i < 6; i++) {
                var image_image = 'photo_'+i;
                var val_image = $('#'+image_image).val()

                supprimerImage('photo_'+i);

                // if (val_image.length > 0) {
                //     supprimerImage('photo_'+i);
                // }
            }
            photo_counter = 0;
            var photo_counter_init = photo_counter - photo_counter
            $('#photo-counter').text('('+photo_counter_init+'/6)')
        }

        // affiche la section d'import des photo par url
        function showWebImport() {
            $('#image-section-online').css('position', 'relative')
            $('#image-section-online').css('top', '-10px')
            $('#image-section-online').removeClass('s-none')
            $('#image-section-standard').addClass('s-none')
            $('#section-image-title1').addClass('s-none');
            $('#section-image-title2').removeClass('s-none');
        }

        // revient au chargement normal des photos
        function retour_image() {
            $('#image-section-standard').removeClass('s-none')
            $('#image-section-online').addClass('s-none')
            $('#section-image-title1').removeClass('s-none');
            $('#section-image-title2').addClass('s-none');
        }

        // importe des photos par url
        function importerParUrl(){
            // var i = 2;
            var counter_final = 0;

            images_produit_web = [];

            var https = 'https'
            var jpg = 'jpg'
            var png = 'png'

            for (let i = 0; i < 6; i++) {

                var id = 'photo_'+i

                var img = $('#photo_'+i+'-url-value').val();
                var firstFive = img.substring(8, 16);


                if (img.includes(https) && (img.includes(jpg) || img.includes(png)) && img != ''  && firstFive !="youtu.be" && $('#photo_'+i).get(0).files[0] == undefined && ($('#photo_'+i+'-view').attr('src') != $('#photo_'+i+'-url-value').val())) {
                    $('#'+id+'-view').attr('src', img)
                    $('#'+id+'-view').attr('height', "100px")
                    $('#'+id+'-view').attr('width', "100px")

                    $('#'+id+'-view').css({'display':'block', 'height': '100px !important', 'width': '100px !important'});
                    $('#'+id+'-view').css('border-radius','6px')
                    $('#'+id+'-view').css('margin-right','-4px')

                    $('#'+id+'-bclose').removeClass('s-none')
                    $('#'+id+'-bclose').css({'position': 'absolute', 'margin-top': '-80px', 'margin-right':'-80px'})
                    $('#'+id+'-b').css('display','none')

                    $('.photo-button-section').addClass('s-none')
                    $('#main-image-preview').attr('src', img)
                    $('#main-image-preview').css({'position': 'relative', 'top': '-12px', 'border-radius': '6px'})
                    $('#main-image-preview').attr('height', "308px")
                    $('#main-image-preview').attr('width', "308px")

                    $('#main-image-preview1').addClass('s-none')
                    $('#main-image-preview').removeClass('s-none')

                    photo_counter = photo_counter + 1;
                    counter_final = counter_final + 1;


                    images_produit_web.push(img)
                }else if(firstFive =="youtu.be") {
                    counter_final = counter_final + 1;
                    photo_counter = photo_counter + 1;
                    var final_link = img.replace('youtu.be', 'youtube.com/embed')
                    $('#videoPreviewInput').val(img)
                    $('#preview_video').attr('src', final_link);
                    $('.main-image-section').addClass('s-none')
                    $('#preview_video').removeClass('s-none')
                    $('.video-play-button').removeClass('s-none')

                    $('#'+id+'-bclose').removeClass('s-none')
                    $('#'+id+'-bclose').css({'position': 'absolute', 'margin-top': '-80px', 'margin-right':'-80px'})
                    $('#'+id+'-b').css('display','none')
                }
            }
            $('#photo-counter').text('('+photo_counter+'/6)')
            $('#image-section-standard').removeClass('s-none')
            $('#image-section-online').addClass('s-none')
            $('#section-image-title1').removeClass('s-none');
            $('#section-image-title2').addClass('s-none');


        }

        function showVideoPreview() {

            var video_hidden = $('#videoPreviewInput').val()
            var final_link = video_hidden.replace('youtu.be', 'youtube.com/embed')


            $('#preview_video').attr('src', final_link);
            $('#video_5-view').attr('height', "100px")
            $('#video_5-view').attr('width', "100px")
            $('#video_5-view').attr('src', final_link)
            $('#video_5-view').css({'position':'relative', 'left': '10px', 'border-radius':'6px'})

            $('#preview_video').removeClass('s-none');
            $('.main-image-section').addClass('s-none')
        }

        // supprimer les images
        function supprimerImagePrincipal(id) {
            $('#'+id+'-p').attr('src', 'assets/images/icones-vendeurs2/plus.svg')
            $('#'+id+'-p').css('left', '2px')
            $('#'+id+'-b').removeAttr('disabled')
            // $('#'+id).val('')
            $('#'+id+'-berror').addClass('s-none')

            $('#cadre-error').addClass('s-none');
            $('#cadre-cadre-preview').removeClass('s-none')
            $('#'+id+'-berror').addClass('s-none')
        }

        function imageChanged() {

            var imagePrincipal = $('#myInput').get(0).files[0];


            // this.photo_product.shift(imagePrincipal);

            var reader = new FileReader();

            reader.onload = function(){
                $('.photo-button-section').addClass('s-none')
                $('#main-image-preview').attr('src', reader.result)
                $('#main-image-preview').attr('height', "310px")
                $('#main-image-preview').attr('width', "310px")
            }
            reader.readAsDataURL(imagePrincipal);

            let formData = new FormData();

            formData.append('produit_photo', imagePrincipal)

            $.ajax({
                type:'POST',
                url:"upload_images",
                data: formData,
                contentType: false,
                processData: false,
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                success:function(response){
                    console.log(response)
                    // window.location.href = "/marchand-verification-organisation"
                }
            });

        }

        // submit images
        function saveImages() {

            $.ajax({
                type:'POST',
                url:"save_produit_images",
                data: 1,
                contentType: false,
                processData: false,
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                success:function(response){
                    console.log(response)
                    // window.location.href = "/marchand-verification-organisation"
                }
            });
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

        function check_negociation_reduction() {
            if ($('#check_negociation_reduction').is(":checked"))
            {
                $('#achat-multiple-values').removeClass('negociation-section')
            }else {
                $('#achat-multiple-values').addClass('negociation-section')
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


        function check_nagociation_value() {
            if ($('#negocier-1').is(':checked')) {
                $('#negocier-1-value').removeClass('negociation-section-desabled')
            }else{
                $('#negocier-1-value').addClass('negociation-section-desabled')
            }
        }

        function check_nagociation_value2() {
            if ($('#negocier-2').is(':checked')) {
                $('#negocier-2-value').removeClass('negociation-section-desabled')
            }else{
                $('#negocier-2-value').addClass('negociation-section-desabled')
            }
        }

        function check_nagociation_value3() {
            if ($('#negocier-3').is(':checked')) {
                $('#negocier-3-value').removeClass('negociation-section-desabled')
            }else{
                $('#negocier-3-value').addClass('negociation-section-desabled')
            }
        }

        function active_negociation_prix() {
            if ($('#refuse_offre_inferieur').is(':checked')) {
                $('#refuse_offre_inferieur-value').removeClass('negociation-section-desabled')
                $('#refuse_offre_inferieur-value').css('background-color','#fff')
            }else{
                $('#refuse_offre_inferieur-value').addClass('negociation-section-desabled')
                $('#refuse_offre_inferieur-value').css('background-color','#D8D8D8')
            }
        }

        function active_negociation_prix_inferieur() {
            if ($('#accepter_offre_inferieur').is(':checked')) {
                $('#accepter_offre_inferieur-valeur').removeClass('negociation-section-desabled')
                $('#accepter_offre_inferieur-valeur').css('background-color','#fff')
            }else{
                $('#accepter_offre_inferieur-valeur').addClass('negociation-section-desabled')
                $('#accepter_offre_inferieur-valeur').css('background-color','#D8D8D8')
            }
        }

        function toggleFraisExpedition(id) {
           if ( $('#vouspayer'+id).is(':checked')) {
                $('#clientpaie'+id).addClass('negociation-section-desabled')
           }else{
            $('#clientpaie'+id).removeClass('negociation-section-desabled')
           }

        }

        function toggleFraisExpedition1(id) {
            if ( $('#clientpaie'+id).is(':checked')) {
                $('#vouspayer'+id).addClass('negociation-section-desabled')
                $('#clientpaieInput'+id).removeClass('negociation-section-desabled')
                $('#clientpaieInput'+id).css('background-color','#fff')
           }else{
            $('#vouspayer'+id).removeClass('negociation-section-desabled')
            $('#clientpaieInput'+id).addClass('negociation-section-desabled')
            $('#clientpaieInput'+id).css('background-color','#D8D8D8')
           }
        }

        // retour activation national  section-retour-description
        function check_retour_expedition_national() {
            if ($('#retour-nationaux').is(":checked"))
            {
                $('#section-national').removeClass('retour-section-desabled')
                $('#section-retour-description').removeClass('retour-section-desabled')
            }else if($('#retour-internationaux').is(":checked")) {
                $('#section-national').addClass('retour-section-desabled')
            }else {
                $('#section-national').addClass('retour-section-desabled')
                $('#section-retour-description').addClass('retour-section-desabled')
            }
        }

        // retour activation international
        function check_retour_expedition_international() {
            if ($('#retour-internationaux').is(":checked"))
            {
                $('#section-international').removeClass('retour-section-desabled')
                $('#section-retour-description').removeClass('retour-section-desabled')
            }else if($('#retour-nationaux').is(":checked")) {
                $('#section-international').addClass('retour-section-desabled')
            }else {
                $('#section-international').addClass('retour-section-desabled')
                $('#section-retour-description').addClass('retour-section-desabled')
            }
        }


        function mettreEnRayon() {

            let mode_international = $('#mode_expedition_international').val()
            let mode_nation = $('#expedition-national').val();
            var formData = new FormData();
            let table_expedition = [];

            // traitement des images de vendre le même produit
            let vendre_meme_produit = $('#vendre-meme-produit').val();
            formData.append('vendre_meme_produit', vendre_meme_produit)
            if (vendre_meme_produit == 'true') {

                for (let y = 0; y < 6; y++) {
                    let img = $('#photo_'+y+'-view').attr('src')
                    let data_img = "data:image"

                    if (img !== 'assets/images/icones-vendeurs2/image_outline_icon_139447.svg') {
                        if (img.indexOf('data:image') == -1) {
                            image_final = img.replace('uploads/', '')
                            formData.append('vendre_meme_produit_images[]', image_final)
                        }
                    }
                }

            }

            if(mode_nation == "mode1") {
                for (let i = 1; i < 4; i++) {
                    var regler_par_marchand = $('#vouspayer'+i).val();
                    var regler_par_client = $('#clientpaie'+i).val();
                    var prix_client = $('#clientpaieInput'+i).val();
                    var hidden_mode = $('#hiddenmode'+i).val();

                   var tab = [hidden_mode, regler_par_marchand, regler_par_client, prix_client, ]
                   formData.append('expedition['+i+']', tab)
                }

            console.log(table_expedition)
        }




            if(mode_nation == 'mode-international'){
                var regler_par_marchand = 'false';
                var regler_par_client = $('#clientpaieInternational'+i).val();
                var prix_client = $('#clientpaieInputInternational'+i).val();
                var hidden_mode = $('#hiddenmodeInternational'+i).val();
            }

            // console.log(mode_nation, mode_international)
            let image_principal = $('#photo_0').get(0).files[0];
            let image1 = $('#photo_1').get(0).files[0];
            let image2 = $('#photo_2').get(0).files[0];
            let image3 = $('#photo_3').get(0).files[0];
            let image4 = $('#photo_4').get(0).files[0];
            let image5 = $('#photo_4').get(0).files[0];

            // // ------------produit--------------
            let libelle_produit = $('#libelle-produit').val();
            let id_sous_cat = $('#id_sous_cat').val()  //id de la sous categorie
            let description = $('#description_produit').val();
            let prix_achat = $('#prix_achat').val();
            let quantite_disponible = $('#quantite_produit_disponible').val();
            let nbre_produit_lot = $('#nbre_produit_lot').val();
            let vente_en_lot = $('#vente_par_lot').is(":checked");
            let rayon_produit = $('#produit-rayon').find(':selected').val();

            let id_famille = $('#produit-famille').find(':selected').val()

            let retour = '';


            let negociation = $('#negociation_prix').val();
            // // // si oui accepter_offre_inferieur-valeur
            let accepter_offre_inferieur = $('#accepter_offre_inferieur').val();
            // var boutique_pays = $('#boutique_pays').find(':selected').val();
            let accepter_offre_inferieur_valeur = $('#accepter_offre_inferieur-valeur').val();
//
            let refuse_offre_inferieur = $('#refuse_offre_inferieur').val();
            let refuse_offre_inferieur_value = $('#refuse_offre_inferieur-value').val(); //refuse_offre_inferieur-value

            let negociation_reduction = $('#check_negociation_reduction').val();
            let negocier_5 = $('#negocier-1').val();
            let negocier_5_value = $('#negocier-1-value').find(':selected').text();

            let negocier_15 = $('#negocier-2').val();
            let negocier_15_value = $('#negocier-2-value').find(':selected').text();

            let negocier_20 = $('#negocier-3').val();
            let negocier_20_value = $('#negocier-3-value').find(':selected').text();

            // // mode expedition
            formData.append('mode_nation', mode_nation);
            formData.append('mode_internationalnation', mode_nation);
            formData.append('id_famille', id_famille)

            // // // option de retour

            let retour_nationaux = $('#retour-nationaux').val();
            let retour_internationnaux = $('#retour-internationaux').val();
            let delais = $('#delais-annulation').find(':selected').text();
            let frais_retour = $('#frais_retourd').find(':selected').text();

            if ($('#retour-internationaux').is(':checked') && $('#retour-nationaux').is(':checked')) {
                retour = "International et national";
            }else if($('#retour-internationaux').is(':checked')){
                retour = $('#retour-internationaux').val();
            }else if($('#retour-nationaux').is(':checked')){
                retour = $('#retour-nationaux').val();
            }

            for (let i = 1; i < 11; i++) {
                if ($('#pays'+i).is(':checked')) {
                    var pays = $('#pays'+i).val()
                    formData.append('pays_exclu['+i+']', pays)
                }
            }


            let detail_expedition = $('#detail-retour').val();

            let caract_produit = $('#tabcaracteristique').val();
            let tablCar = caract_produit.split(',');

            formData.append('libelle', libelle_produit);
            formData.append('id_sous_cat', id_sous_cat);
            formData.append('description', description);
            formData.append('prix', prix_achat);
            formData.append('quantite', quantite_disponible)
            formData.append('vente_en_lot', vente_en_lot)
            formData.append('nbre_produit_lot', nbre_produit_lot)
            formData.append('rayon_produit', rayon_produit)

            formData.append('marge_negociable', negociation),
            formData.append('accepter_offre_inferieur', accepter_offre_inferieur)
            formData.append('accepter_offre_inferieur_valeur', accepter_offre_inferieur_valeur)
            formData.append('refuse_offre_inferieur', refuse_offre_inferieur_value)

            // reduction negociation multiple
            // formData.append('negocier', negociation_reduction);
            formData.append('negocier_5', negocier_5);
            formData.append('negocier_1_value', negocier_5_value);
            formData.append('negocier_15', negocier_15);
            formData.append('negocier_2_value', negocier_15_value);
            formData.append('negocier_20', negocier_20);
            formData.append('negocier_3_value', negocier_20_value);

            // retour option
            formData.append('retour_nationaux', retour_nationaux);
            formData.append('retour_internationnaux', retour_internationnaux);
            formData.append('delais', delais);
            formData.append('frais_retour', frais_retour);
            formData.append('detail_expedition', detail_expedition);
            formData.append('caract_produit', caract_produit);
            formData.append('retour_product', retour)



            // formData.append('ref_produit', 'TM-000');
            // formData.append('sous_categorie_id', 'fruit legumes');

            formData.append('image0', image_principal);
            formData.append('image1', image1)
            formData.append('image2', image2)
            formData.append('image3', image3)
            formData.append('image4', image4)
            formData.append('image5', image5)

            // // section caracteristique
            var caract = $('#tabcaracteristique').val();
            var id_tab = caract.split(",")
            let tacaracteristique = [];

            for (let i = 0; i < id_tab.length; i++) {
                var selectedcaract = $('#'+id_tab[i]).find(':selected').text()
                var dataf_selected = $('#'+id_tab[i]).attr('data-select')
                tacaracteristique[i] = selectedcaract
                formData.append('caracteristiques_final['+dataf_selected+']', selectedcaract)
            }

            for(let j = 1; j < 4 ; j++){
                var negociation_val = $('#negocier-'+j+'-value').find(':selected').text();
                var negocier = $('#negocier-'+j).val()
                formData.append('negociation['+negocier+']', negociation_val)
            }

            images_produit_normal.forEach(function(image, i) {
                formData.append('image_' + i, image);
            });

            for (let u = 0; u < images_produit_web.length; u++) {
                formData.append('images_web[]', images_produit_web[u])
            }


            if ($('#videoPreviewInput').val() != '' || $('#videoPreviewInput').val() != null) {
                var produit_video = $('#videoPreviewInput').val()
                formData.append('produit_video', produit_video)
            }


            formData.append('produit_caracteristique[]', tacaracteristique)

            for (let u = 0; u < caracteristique_supp.length; u++) {
                formData.append('caracteristique_supplementaire[]', caracteristique_supp[u])
            }

            // special expedition
            for(let j = 1; j < 4 ; j++){
                var expedition = $('#clientpaieInput'+j).val()
                formData.append('clientpaieInput'+j, expedition)
            }

            $.ajax({
                type:'POST',
                url:"ajout_produit",
                data: formData,
                contentType: false,
                processData: false,
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                success:function(response){

                    if (response == "success") {
                        alert("Votre produit a été enregistré avec succes")
                        window.location.reload()
                    }else{
                        alert("Ouf il s'est produit un petit soucis, veillez reéssayiez merci.")
                    }
                    console.log(response);
                }
            });

        }

        function produit_preview() {

            for (let i = 0; i < images_produit_normal.length; i++) {

                if (images_produit_normal[i] != undefined) {

                    let photo = images_produit_normal[i]
                    let reader = new FileReader();

                    reader.onload = function (photo){
                        $('#main-image-preview-preview-'+i).attr('src', reader.result)
                    }

                    reader.readAsDataURL(photo);

                }
            }

            // traitement des vendre le meme article
            let vendre_meme_produit = $('#vendre-meme-produit').val();
            if (vendre_meme_produit == 'true') {

                for (let y = 0; y < 6; y++) {
                    let img = $('#photo_'+y+'-view').attr('src')
                    let data_img = "data:image"

                    var preview_elemnt = $('#main-image-preview-preview-'+y).attr('src')

                    if (preview_elemnt == 'assets/images/icones-vendeurs2/image_outline_icon_139447.svg') {
                        if (img !== 'assets/images/icones-vendeurs2/image_outline_icon_139447.svg') {
                        if (img.indexOf('data:image') == -1) {
                            image_final = img.replace('uploads/', '')
                            $('#main-image-preview-preview-'+y).attr('src', img)
                        }
                    }
                    }
                }

            }

            if (mode_expedition.length > 0) {
                var check_scooter = mode_expedition.indexOf('Moto')
                if (check_scooter > -1) {
                    $('#expeditionTextPreview').text('Expédition en 30 min (sauf jour ouvré)')
                }else{
                    $('#expeditionTextPreview').text('Expédition dans un bref delais  (sauf jour ouvré)')
                }
                // for (let u = 0; u < mode_expedition.length; u++) {
                //     if (mode_expedition[u] == 'Moto') {
                //         $('#expeditionTextPreview').text('Expédition en 24h (sauf jour ouvré)')
                //     }

                // }
            }else{
                $('#expeditionTextPreview').text('Aucun service d\'expédition séléctionné')
            }

            let mode_international = $('#mode_expedition_international').val()
            let mode_nation = $('#expedition-national').val();
            console.log('Mode expedition:', mode_expedition)

            var delais_retour = $('#delais-annulation-national').find(':selected').val();
            var delais_retour_text = $('#delais-annulation-national').find(':selected').text();
            var delais_retour_text_international = $('#detail_annulation_international').find(':selected').text();
            $('#titre-annonce').text($('#libelle-produit').val())
            $('#prix-appercu').text($('#prix_achat').val() + ' Fcfa')
            $('#description-preview').text($('#description_produit').val())

            if ($('#retour-nationaux').is(':checked') && $('#retour-internationaux').is(':checked')) {
                var frais_nationaux = $('#frais-nationaux').find(':selected').val(); // frais national
                var frais_internationaux = $('#frais-internationaux').find(':selected').val(); // frais international
                var text_final ="Retours nationaux et internationaux acceptés."
                $('#option_retour-preview').text(text_final)
            } else if ($('#retour-nationaux').is(':checked')) {
                var frais_nationaux = $('#frais-nationaux').find(':selected').val();
                var text_final ="Retours nationaux acceptés sous "+ delais_retour_text+ ", "+ frais_nationaux+"."
                $('#option_retour-preview').text(text_final)
            }else if ($('#retour-internationaux').is(':checked')) {
                var frais_internationaux = $('#frais-internationaux').find(':selected').val();
                var text_final ="Retours internationaux acceptés sous "+ delais_retour_text_international+ ", "+ frais_internationaux+"."
                $('#option_retour-preview').text(text_final)
            }else {
                $('#option_retour-preview').text('Article ne disposant pas de retour')
            }


            let ref_produit = Math.floor(1000 + Math.random() * 9000);
            $('#reference-produit-preview').text('TM-'+ref_produit)

            $('#dttitre').modal('show');
            $("#dttitre").css('z-index', '2000')
            $('#dttitre').addClass('transparente')
            $("#dttitre").css('background-color', 'transparent !important')
        }

        // mode expedition d
        function check_mode_expedit_national() {
            if ($('#expedition-national').is(":checked")) //
            {
                $('#zone-expedition-national-disable-not').removeClass('retour-section-desabled');
            }else {
                $('#zone-expedition-national-disable-not').addClass('retour-section-desabled');
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

        function addExpeditionMode(id) {
            // console.log('This is the expedition mode', id)
            $.ajax({
                type: "GET",
                url: "get_single_mode_expedition/"+id,
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                success: function(response) {


                    if (response[0].type_expedition == 'National') {
                        // $('#new-mode-section').empty();
                        var sigle_mode =  []
                        mode_expedition.push(response[0].mode_expedition)
                        $('#mode-expedition-national-value').val(response[0].id) //input to store

                        $('#zone-expedition-national-add').removeClass('s-none')

                        sigle_mode = '<div id="mode-expe'+response[0].id+'" style="border-bottom: 1px solid #979797">'

                            sigle_mode += '<section style="height: 219px; width: 300px; border-right: 1px solid #979797; background-color: fff; border-radius: 6px 0px 0px 0px"> <img src="assets/images/icones-vendeurs2/'+response[0].photo_mode_expedition+'" style=" height: 27px;width: 43.2px;margin-left:129px;margin-top:30px;">'

                            sigle_mode += '<article style="  height: 20px; width: 301px;background-color: #F8F8F8;margin-top:15px;"><span style="width: 68px;color: #000000;font-family: Roboto;font-size: 14px;letter-spacing: 0.31px;line-height: 14px;text-align:center;padding-top: 3.5px; position: relative; left: 90px; top: 3px">Envoie par ' +response[0].mode_expedition+' </article>'

                            sigle_mode += '<article style="  height: 20px;width: 301px;background-color: #F8F8F8;margin-top:10px;"><p style=" color: #191970;font-family: Roboto;font-size: 12px;letter-spacing: 0.26px;line-height: 14px;text-align:center;padding:2px; padding-top: 3.5px">'+response[0].caracteristique+'</p></article>'

                            sigle_mode += '<article style="  height: 20px;width: 301px;background-color: #F8F8F8;margin-top:10px;padding:2px;"><p style="color: #000000font-family: Roboto;font-size: 12px;font-weight: 500;letter-spacing: 0.26px;line-height: 14px;text-align:center; padding-top: 2px">'+response[0].prix+'FCFA  - '+response[0].prix_max+'FCFA</p></article>'

                            sigle_mode += '<p class="expedition-modif-supp" style=" color: #1A7EF5;font-family: Roboto;font-size: 10px;letter-spacing: 0.26px;line-height: 11px;text-align: center;margin-top:20px; position: relative; left: 15px"> <a href="#" onclick=changeModeExpedition("'+response[0].id+'")>Modifier</a> | <a href="#" onclick="deleteModeExpedition('+response[0].id+')">Supprimer</a></p></section>'
                            // end first section

                            sigle_mode +='<section style="height: 219px; width: 217px;margin-top:-219px; position: relative; left:299px;padding-left: 15px; border-left: 1px solid #979797; background-color: #fff; border-radius: 0px 6px 0px 0px">'

                            sigle_mode +='<label class="form-check-label" for="defaultCheck1" style="color: #191970;font-family: Roboto;font-size: 12px;font-weight: 500;letter-spacing: 0;line-height: 14px;margin-top:15px;"><input onclick="toggleFraisExpedition('+response[0].id+')" id="vouspayer'+response[0].id+'" class="form-check-input" type="checkbox"  style="  height: 18px;width: 18px;border-radius: 2px; margin:0px" value="marchand"><span style="position: relative; left: 10px; top: 1px">Vous payez</span></label>'

                            sigle_mode += '<p style="  color: #4A4A4A;font-family: Roboto;font-size: 9px;letter-spacing: 0;line-height: 12px;margin-top:10px;">L’expédition est gratuite pour le client.<br>Frais calculés en fonction du lieu où il se trouve.</p><hr style="  height: 1px;width: 192px;border: 1px solid #D8D8D8;margin-top:10px;margin-left:-2pxpx;"><input onclick="toggleFraisExpedition1('+response[0].id+')" value="client" id="clientpaie'+response[0].id+'" class="form-check-input" type="checkbox"  style="  height: 18px; width: 18px;border-radius: 2px; margin: 0px">'

                            sigle_mode += '<label class="form-check-label" for="defaultCheck1" style=" color: #191970;font-family: Roboto;font-size: 12px;font-weight: 500;letter-spacing: 0;line-height: 14px; margin-left: 10px; width: 137px;">Le client paie les frais de</label><br> <label style="position: relative; left: 30px; color: #191970;font-family: Roboto;font-size: 12px;font-weight: 500;letter-spacing: 0;line-height: 6px;">livraison fixes</label><br><span style="  color: #4A4A4A;font-family: Roboto;font-size: 9px;letter-spacing: 0;line-height: 12px;">L’expédition est à prix fixes pour le client.<br> Frais calculés en fonction du lieu où il se trouve.</span><div style="display: flex; margin-top:10px">'

                            sigle_mode += '<input id="clientpaieInput'+response[0].id+'" class="negociation-section-desabled" type="text" placeholder="-"  style="width: 156px;height:31px;border-bottom-left-radius: 5px;border-top-left-radius: 5px;font-size: 18px;border: 1px solid #9B9B9B;padding-left:10px;background-color: #D8D8D8; height: 41px; width: 136px;"><input id="hiddenmode'+response[0].id+'" type="hidden" value="'+response[0].id+'">'

                            sigle_mode += '<aside style="border: 1px solid #9B9B9B;text-align:center;  font-family: Roboto;font-size: 14px;letter-spacing: -0.34px;line-height: 16px;border-radius: 0 6px 6px 0;background-color: #D8D8D8;margin-left:0px ; padding-top:12.5px; padding-right: -1px;  height: 41px;width: 57px;">Fcfa</aside></div>'

                            sigle_mode += '</section></div>';

                        $('#new-mode-section').append(sigle_mode)

                        $('#zone-expedition-national-disable-contenair').addClass('s-none')
                        $('#zone-expedition-national-disable-not-test').removeClass('s-none')
                        $('#dtservice').modal('hide')
                    }else if(response[0].type_expedition == 'International'){
                        $('#mode-expedition-international-value').val(response[0].id) //input to store
                        // $('#zone-expedition-national-add').removeClass('s-none')
                        $('#expeditionElementInternational-add').removeClass('s-none')
                        var sigle_mode = '<section style="  height: 180px;width: 260px;border-right: 1px solid #979797;background-color: #FFFFFF;"><aside style="width:240px; height:67px; background-color:#F8F8F8;margin-left:10px"><img src="assets/images/icones-vendeurs2/camion.svg" style=" height: 27px;width: 43.2px;margin-left:10px;margin-top:15px;"><p style="  color: #191970;font-family: Roboto;font-size: 16px;font-weight: bold;letter-spacing: 0.35px;line-height: 14px; margin-top:-30px; text-align:center;">'+response[0].mode_expedition+'</p><p style=" color: #4A4A4A;font-family: Roboto;font-size: 10px;letter-spacing: 0.22px;line-height: 11px;; margin-top:-10px; text-align:center;margin-left:50px;">Information de suivi incluse : Oui</p><p class="expedition-modif-supp" style=" color: #1A7EF5;font-family: Roboto;font-size: 10px;letter-spacing: 0.22px;line-height: 11px;text-align: center;margin-top:-10px;margin-left:15px;"> <a href="#" onclick=changeModeExpedition("'+response[0].id+'")>Modifier</a> | <a href="#" onclick="deleteModeExpedition()">Supprimer</a></p></aside><p style="  color: #000000;font-family: Roboto;font-size: 12px;letter-spacing: 0.26px;line-height: 10px;margin-left:15px;margin-top:30px;"> Lieu d’expédition internationale</p><select style="  height: 40.5px;width: 220px;border: 1px solid #979797;border-radius: 6px;background-color: #FFFFFF;  color: #000000;font-family: Roboto;font-size: 14px;letter-spacing: 0.31px;line-height: 16px;margin-left:15px;"><option selected>Monde entier/Afrique/Union…</option><option value="1">Gabon</option><option value="2">Mali</option></select></section><section style="  height: 180px;width: 217px;background-color: #FFFFFF;margin-left:260px;margin-top:-180px"><input class="form-check-input"type="checkbox" id="clientpaieInternational'+response[0].id+'" style="  height: 18px;width: 18px;border-radius: 2px;margin-top: 15px;margin-left:10px;"><label class="form-check-label" for="defaultCheck1" style="   color: #191970;font-family: Roboto;font-size: 12px;font-weight: 500;letter-spacing: 0;line-height: 14px;margin-top:15px">Le client paie les frais de livraison fixes</label><p style="  color: #4A4A4A;font-family: Roboto;font-size: 10px;letter-spacing: 0;line-height: 12px;margin-top:15px;margin-left:10px;">L’expédition est gratuite pour le client.<br>Frais calculés en fonction du lieu où il se trouve.</p><input id="clientpaieInputInternational'+response[0].id+'" type="text" placeholder="-"  style="width: 156px;height:41px;border-bottom-left-radius: 5px;border-top-left-radius: 5px;font-size: 18px;border: 1px solid #9B9B9B;padding-left:10px;background-color: #D8D8D8;margin-left:20px;margin-top:35px;"><aside style="border: 1px solid #9B9B9B;text-align:center;  font-family: Roboto;height:41px;width:65px;font-size: 11px;letter-spacing: -0.34px;line-height: 16px;border-radius: 0 6px 6px 0;background-color: #D8D8D8;margin-left:175px;margin-top:-41px;padding-top:10px;">Fcfa (XAF)</aside></section>';

                        $('#mode_expedition-international-contenair').append(sigle_mode)

                        $('#ajout-service-livraison-add').addClass('s-none')
                        $('#dtservice').modal('hide')
                    }

                }
            })
        }

        function showModeExpedition(id){
            $.ajax({
                type: "GET",
                url: "mode_expedition",
                data: {'mode_expedition': id},

                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },

                success: function(response) {
                    $('.mode_expedition_container').empty()
                    // $('#new-mode-section').empty();
                    let mode_element = [];
                   for (let i = 0; i < response.length; i++) {
                    var id = document.getElementById('mode-expe'+response[i].id)
                    if (id == null) {

                        let chaine = String(response[i].id+'-'+response[i].type_expedition)

                        mode_element = '<aside class="mode-expedition-row" onclick="document.getElementById('+response[i].id+').click()" style="height: 60px;width:578px;padding:5px;border-top:1px solid #D8D8D8; position: relative; top: -1px" id="mode'+response[i].id+'"><div class="midle-mode-expedition"><article style="width:194px;height:40px; border-right:1px solid #D8D8D8; padding-top: 3px"><input  class="form-check-input" id="'+response[i].id+'" type="checkbox" onclick=addExpeditionMode('+response[i].id+')  style="  height: 18px !important;width: 18px !important; border-radius: 4px ;margin-top: 9px;margin-left:10px;"><label class="form-check-label" for="defaultCheck1" style=" color: #000000;font-family: Roboto;font-size: 14px;letter-spacing: 0.31px;line-height: 14px;margin-top: 12px;margin-left: 5px;">Envoie par</label> <span style=" color: #191970;font-family: Roboto; font-size: 14px;font-weight: 500;letter-spacing: 0.31px;line-height: 16px;margin-top:-18px;"><i>'

                        mode_element += response[i].mode_expedition

                        mode_element += '</i></span></article><article style=" width:194px; border-right:1px solid #D8D8D8;margin-top:-40px;margin-left:200px;height:40px;"><div style="display: flex; flex-direction: column">'

                        let caracteristique = response[i].caracteristique.split(',')
                        for (let u = 0; u < caracteristique.length; u++) {
                            mode_element += ' <span style=" color: #191970;font-family: Roboto;font-size: 12px;letter-spacing: 0.26px;line-height: 14px;text-align: center;">'+caracteristique[u]+'</span>'
                        }

                        mode_element += '</div></article><article style=" width:auto; margin-top:-40px;height:40px; position: relative; left: 452px; padding-top:7px"> <div><span style="  color: #191970;font-family: Roboto;font-size: 12px;font-weight: 500;letter-spacing: 0.26px;line-height: 14px;text-align:center;margin-top:6px; margin-right: 5px; ">'+response[i].prix+'</span><span style="color: #00000;font-family: Roboto;font-size: 12px;font-weight: 500;letter-spacing: 0.26px;line-height: 14px;text-align:right;margin-top:-30px;margin-right:40px;">Fcfa </span></div><div><span style="  color: #191970;font-family: Roboto;font-size: 12px;font-weight: 500;letter-spacing: 0.26px;line-height: 14px;text-align:center; margin-right: 5px">'+response[i].prix+'</span><span style="color: #00000;font-family: Roboto;font-size: 12px;font-weight: 500;letter-spacing: 0.26px;line-height: 14px;text-align:right;margin-top:-30px;margin-right:40px;">Fcfa </span></div></article></div></aside>'


                    }
                    $('.mode_expedition_container').append(mode_element)

                   }
                }
            })

            $('#dtservice').modal('show')
            // $("#dtservice").show();
            $("#dtservice").css('z-index', '2000')


            $('#dtservice').addClass('transparente')
            $("#dtservice").css('background-color', 'transparent !important')

        }

        function linechecked() {
            // console.log("Bonjour à tous")
        }

        // show mode for update
        function showModeExpeditionModification(id){
            var id_sent = id;
            $.ajax({
                type: "GET",
                url: "mode_expedition_modif",
                data: {'mode_expedition': id},

                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },

                success: function(response) {
                    console.log('les modes:', response)
                    $('.mode_expedition_container').empty()
                    let mode_element = [];
                    console.log('ok tested')
                   for (let i = 0; i < response.length; i++) {
                    var id_doc = document.getElementById('mode-expe'+response[i].id)
                    // if (id_doc != null) {
                    //     $('#mode-expe'+response[i].id).remove()
                    // }
                    if (id_doc == null) {

                        let chaine = String(response[i].id+'-'+response[i].type_expedition)

                        mode_element = '<aside  class="mode-expedition-row" onclick="document.getElementById('+response[i].id+').click()" style="height: 60px;width:578px;padding:5px;border-top:1px solid #D8D8D8; position: relative; top: -1px" id="mode'+response[i].id+'"><div class="midle-mode-expedition"><article data-parent='+id_sent+' style="width:194px;height:40px; border-right:1px solid #D8D8D8; padding-top: 3px"><input  class="form-check-input" id="'+response[i].id+'" type="checkbox" onclick=addExpeditionModification('+response[i].id+','+id_sent+')  style="  height: 18px !important;width: 18px !important; border-radius: 4px ;margin-top: 9px;margin-left:10px;"><label class="form-check-label" for="defaultCheck1" style=" color: #000000;font-family: Roboto;font-size: 14px;letter-spacing: 0.31px;line-height: 14px;margin-top: 12px;margin-left: 5px;">Envoie par</label> <span style=" color: #191970;font-family: Roboto; font-size: 14px;font-weight: 500;letter-spacing: 0.31px;line-height: 16px;margin-top:-18px;"><i>'

                        mode_element += response[i].mode_expedition

                        mode_element += '</i></span></article><article style=" width:194px; border-right:1px solid #D8D8D8;margin-top:-40px;margin-left:200px;height:40px;"><div style="display: flex; flex-direction: column">'

                        let caracteristique = response[i].caracteristique.split(',')
                        for (let u = 0; u < caracteristique.length; u++) {
                            mode_element += ' <span style=" color: #191970;font-family: Roboto;font-size: 12px;letter-spacing: 0.26px;line-height: 14px;text-align: center;">'+caracteristique[u]+'</span>'
                        }

                        mode_element += '</div></article><article style=" width:auto; margin-top:-40px;height:40px; position: relative; left: 452px; padding-top:7px"> <div><span style="  color: #191970;font-family: Roboto;font-size: 12px;font-weight: 500;letter-spacing: 0.26px;line-height: 14px;text-align:center;margin-top:6px; margin-right: 5px; ">'+response[i].prix+'</span><span style="color: #00000;font-family: Roboto;font-size: 12px;font-weight: 500;letter-spacing: 0.26px;line-height: 14px;text-align:right;margin-top:-30px;margin-right:40px;">Fcfa </span></div><div><span style="  color: #191970;font-family: Roboto;font-size: 12px;font-weight: 500;letter-spacing: 0.26px;line-height: 14px;text-align:center; margin-right: 5px">'+response[i].prix+'</span><span style="color: #00000;font-family: Roboto;font-size: 12px;font-weight: 500;letter-spacing: 0.26px;line-height: 14px;text-align:right;margin-top:-30px;margin-right:40px;">Fcfa </span></div></article></div></aside>'


                    }else {
                        console.log(id)
                    }
                    $('.mode_expedition_container').append(mode_element)

                   }
                }
            })

            $('#dtservice').modal('show')
            // $("#dtservice").show();
            $("#dtservice").css('z-index', '2000')


            $('#dtservice').addClass('transparente')
            $("#dtservice").css('background-color', 'transparent !important')

        }

        // modifier le mode expédition
        function addExpeditionModification(id, parent_id) {
                console.log('zone modif avec comme id:', id)
                console.log('parent id:', parent_id)
                $('#mode-expe'+parent_id).remove() // mode-expe4
            $.ajax({
                type: "GET",
                url: "get_single_mode_expedition/"+id,
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                success: function(response) {


                    if (response[0].type_expedition == 'National') {
                        $('#mode-expe'+id).remove()
                        console.log('Voici id', id)
                        var sigle_mode =  []
                        mode_expedition.push(response[0].mode_expedition)
                        $('#mode-expedition-national-value').val(response[0].id) //input to store

                        $('#zone-expedition-national-add').removeClass('s-none')

                        sigle_mode = '<div id="mode-expe'+response[0].id+'" style="border-bottom: 1px solid #979797">'

                            sigle_mode += '<section style="height: 219px; width: 300px; border-right: 1px solid #979797; background-color: fff; border-radius: 6px 0px 0px 0px"> <img src="assets/images/icones-vendeurs2/'+response[0].photo_mode_expedition+'" style=" height: 27px;width: 43.2px;margin-left:129px;margin-top:30px;">'

                            sigle_mode += '<article style="  height: 20px; width: 301px;background-color: #F8F8F8;margin-top:15px;"><p style="color: #000000;font-family: Roboto;font-size: 14px;letter-spacing: 0.31px;line-height: 14px;text-align:center;margin-left:-61px;">Envoie par </p>  <p style=" color: #191970;font-family: Roboto;font-size: 14px;letter-spacing: 0.31px; line-height: 14px;text-align:right;margin-top:-30px;margin-right:79px;padding:2px;">'+response[0].mode_expedition+'</p></article>'

                            sigle_mode += '<article style="  height: 20px;width: 301px;background-color: #F8F8F8;margin-top:10px;"><p style=" color: #191970;font-family: Roboto;font-size: 12px;letter-spacing: 0.26px;line-height: 14px;text-align:center;padding:2px;">'+response[0].caracteristique+'</p></article>'

                            sigle_mode += '<article style="  height: 20px;width: 301px;background-color: #F8F8F8;margin-top:10px;padding:2px;"><p style="color: #000000font-family: Roboto;font-size: 12px;font-weight: 500;letter-spacing: 0.26px;line-height: 14px;text-align:center;">'+response[0].prix+'FCFA  - '+response[0].prix_max+'</p></article>'

                            sigle_mode += '<p class="expedition-modif-supp" style=" color: #1A7EF5;font-family: Roboto;font-size: 10px;letter-spacing: 0.26px;line-height: 11px;text-align: center;margin-top:20px; position: relative; left: 15px"> <a href="#" onclick=changeModeExpedition("'+response[0].id+'")>Modifier</a> | <a href="#" onclick="deleteModeExpedition('+response[0].id+')">Supprimer</a></p></section>'
                            // end first section

                            sigle_mode +='<section style="height: 219px; width: 217px;margin-top:-219px; position: relative; left:299px;padding-left: 15px; border-left: 1px solid #979797; background-color: #fff; border-radius: 0px 6px 0px 0px">'

                            sigle_mode +='<label class="form-check-label" for="defaultCheck1" style="color: #191970;font-family: Roboto;font-size: 12px;font-weight: 500;letter-spacing: 0;line-height: 14px;margin-top:15px;"><input onclick="toggleFraisExpedition('+response[0].id+')" id="vouspayer'+response[0].id+'" class="form-check-input" type="checkbox"  style="  height: 18px;width: 18px;border-radius: 2px; margin:0px" value="marchand"><span style="position: relative; left: 10px; top: 1px">Vous payez</span></label>'

                            sigle_mode += '<p style="  color: #4A4A4A;font-family: Roboto;font-size: 9px;letter-spacing: 0;line-height: 12px;margin-top:10px;">L’expédition est gratuite pour le client.<br>Frais calculés en fonction du lieu où il se trouve.</p><hr style="  height: 1px;width: 162px;border: 1px solid #D8D8D8;margin-top:10px;margin-left:-2px;"><input onclick="toggleFraisExpedition1('+response[0].id+')" value="client" id="clientpaie'+response[0].id+'" class="form-check-input" type="checkbox"  style="  height: 18px; width: 18px;border-radius: 2px; margin: 0px">'

                            sigle_mode += '<label class="form-check-label" for="defaultCheck1" style=" color: #191970;font-family: Roboto;font-size: 12px;font-weight: 500;letter-spacing: 0;line-height: 14px; margin-left: 10px; width: 137px;">Le client paie les frais de</label><br> <label style="position: relative; left: 30px; color: #191970;font-family: Roboto;font-size: 12px;font-weight: 500;letter-spacing: 0;line-height: 6px;">livraison fixes</label><br><span style="  color: #4A4A4A;font-family: Roboto;font-size: 9px;letter-spacing: 0;line-height: 12px;">L’expédition est à prix fixes pour le client.<br> Frais calculés en fonction du lieu où il se trouve.</span><div style="display: flex; margin-top:10px">'

                            sigle_mode += '<input id="clientpaieInput'+response[0].id+'" class="negociation-section-desabled" type="text" placeholder="-"  style="width: 156px;height:31px;border-bottom-left-radius: 5px;border-top-left-radius: 5px;font-size: 18px;border: 1px solid #9B9B9B;padding-left:10px;background-color: #D8D8D8; height: 40.5px; width: 136px;"><input id="hiddenmode'+response[0].id+'" type="hidden" value="'+response[0].id+'">'

                            sigle_mode += '<aside style="border: 1px solid #9B9B9B;text-align:center;  font-family: Roboto;font-size: 14px;letter-spacing: -0.34px;line-height: 16px;border-radius: 0 6px 6px 0;background-color: #D8D8D8;margin-left:0px ; padding-top:10px; padding-right: 10px;  height: 40.5px;width: 57px;">Fcfa</aside></div>'

                            sigle_mode += '</section></div>';


                            $('#new-mode-section').append(sigle_mode)

                            $('#zone-expedition-national-disable-contenair').addClass('s-none')
                            $('#zone-expedition-national-disable-not-test').removeClass('s-none')
                            $('#dtservice').modal('hide')
                    }

                }
            })
        }

        function changeModeExpedition(id_mode) {
            // console.log('Modifier l\expedition:', id_mode)
            showModeExpeditionModification(id_mode)
        }

        // supprimer le mode expédition
        function deleteModeExpedition(id_mode) {
            if (id_mode == 1) {
                mode_expedition.splice('Voiture', 1)
            }
            if (id_mode == 2) {
                mode_expedition.splice('Moto', 1)
            }
            if (id_mode == 3) {
                mode_expedition.splice('Vélos', 1)
            }
            if (id_mode == 4) {
                mode_expedition.splice('Avion', 1)
            }
            if (id_mode == 7) {
                mode_expedition.splice('Train', 1)
            }

            $('#mode-expe'+id_mode).remove()
            if (mode_expedition.length == 0) {
                $('#zone-expedition-national-disable-not-test').addClass('s-none')
                $('.ajout-service-livraison').removeClass('s-none')
            }
            console.log(mode_expedition)
        }

        function display_no_coma () {
            for (var crrLine = 0; crrLine < katzDeliLine.length; crrLine++) {
                textToPrint = textToPrint + (crrLine + 1) + ". " + katzDeliLine[crrLine] + (crrLine != (katzDeliLine.length - 1) ? "," : "")
            }
        }

        function addExclusion() {

            $("#dtServiceExpe").show();
            $("#dtServiceExpe").css('z-index', '2000')


            $('#dtServiceExpe').addClass('transparente')
            $(".modal").css('background-color', 'transparent !important')
            $("#dtServiceExpe").css('background-color', 'transparent !important')


        }

        function fermerPaysExclu() {
            if (pays_exclu.length > 0) {
                console.log('vous devez sauvegarder avant', pays_exclu)
            }else{
                document.getElementById('creer-list-exclusion').innerText = 'Créer une liste d’exclusions'
                $("#dtServiceExpe").hide();
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
            var select_element = []

            var select_element_preview = []
            select_element = "<div class='caracteristique-zone'><label class='labele-items' style='position: relative; left: 0px'><small class='red-star'>*</small>"+caracteristique_libelle+"</label><select class='caracterisqueProd' data-select='"+caracteristique_libelle+"' name='"+caracteristique_libelle+"' id='"+caracteristique_id+"'>"

            for (let i = 0; i < input_element.length; i++) {
                tab_value.push(input_element[i].value)
                select_element += "<option>"+input_element[i].value+"</option>"
            }

            select_element += "</select>"
            select_element += "<div style='display: flex; margin-top: 5px'><span class='caracteristique-frequent-label'>Fréquent : </span><span class='caracteristique-frequent s-none'>iPhone 6s , iPhone 8 , iPhone X</span></div>"
            select_element += "</div>"

            select_element_preview = "<div class='caracteristique-zone-preview'><label class='labele-items' style='position: relative; left: 20px'><small class='red-star'>*</small>"+caracteristique_libelle+"</label><select class='caracterisqueProdPreview' data-select='"+caracteristique_libelle+"' name='"+caracteristique_libelle+"' id='"+caracteristique_id+"'>"

            for (let i = 0; i < input_element.length; i++) {
                // tab_value.push(input_element[i].value)
                select_element_preview += "<option>"+input_element[i].value+"</option>"
            }

            select_element_preview += "</select>"
            select_element_preview += "</div>"

            // $('.caracteristique_element').append(select_element)
            $(select_element).insertBefore('#btn-attr-product')

            $('.caracteristique-supplementaire').addClass('s-none')
            $('.caracteristique-preview-element').append(select_element_preview)
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
                    console.log(response)
                    caracteristique_supp.push(response)
                    $('#carateristiqueSuppAdded').val([caracteristique_supp])
                },
                error: function(error) {
                    console.log('Erreur ajax')
                }
            })

            if (caracteristique_select.length > 3) {
                $('#btn-attr-product').css('display', 'none')
                $('.caracteristique-supplementaire').addClass('s-none')
            }

        }

        function deleteThis(id) {
            var input_container = document.getElementById('myInputCaracteristiqueContainer')
            var input_element = input_container.getElementsByTagName('div')
            console.log(input_element.length)
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

        function showContinentPay(idContinent) {
            if ($('#continent'+idContinent).hasClass('s-none')) {
                $('#continent'+idContinent).removeClass('s-none')
            }else{
                $('#continent'+idContinent).addClass('s-none')
            }
        }

        // edit product
        function editProduct(id) {

            $('#detailAnnonce').modal('show')
            $('#modifierProduitBtn').removeClass('s-none')
            $('#mettreEnRayonBtn').addClass('s-none')

            $.ajax({
                method: 'GET',
                url: 'modifier_produit_marchand/'+id,
                data: {},
                headers: {},
                success: function(response){

                    $('#edit-hidden-value').val(1)
                    $('#id_produit_update').val(id)
                    $('#libelle-produit').val(response[0][0]['libelle'])
                    $('#description_produit').val(response[0][0]['description'])
                    $('#suivant-step1').removeAttr('disabled')
                    $('#suivant-step1').css('background-color', '#1A7EF5')
                    $('#save-all-image-button').addClass('saved')
                    $('#prix_achat').val(response[0][0]['prix'])
                    $('#quantite_produit_disponible').val(response[0][0]['quantite'])
                    $('#id_sous_cat').val(response[0][0]['sous_categorie_id'])
                    $('#vendre-meme-produit').val('false')

                    console.log('Produit:', response)

                    for (let j = 0; j < response[0][0]['produit_attribut'].length; j++) {
                        // composition de l'attribut et de la valeur pour transporter les deux ensemble
                        modification_attribut.push(response[0][0]['produit_attribut'][j]['id']+'/'+response[0][0]['produit_attribut'][j]['valeur']);
                    }

                    $('#photo_0-view').attr('src', 'uploads/'+response[0][0]['image'])
                    $('#photo_0-view').attr('height', "100px")
                    $('#photo_0-view').attr('width', "100px")
                    $('#photo_0-view').css({'display':'block', 'height': '100px !important', 'width': '100px !important'});
                    $('#photo_0-view').css('border-radius','6px')
                    $('#photo_0-view').css('margin-right','-4px')

                    if (response[0][0]['vente_en_lot'] !== 'false') {
                        $('#vente_par_lot').prop('checked', true)
                        $('#nbre_produit_lot').removeClass('desable-input');
                        $('#nbre_produit_lot').val(response[0][0]['nbre_par_lot'])
                    }

                    // special zone négociation
                    if(response[0][0]['accepte_offresuppa'] !== null) {
                        $('#negociation-desactivation').removeClass('negociation-section')
                        $('#accepter_offre_inferieur-valeur').removeClass('negociation-section-desabled')
                        $('#accepter_offre_inferieur-valeur').css('background-color','#fff')
                        $('#accepter_offre_inferieur').prop('checked', true)
                        $('#accepter_offre_inferieur-valeur').val(response[0][0]['accepte_offresuppa'])
                        $('#negociation_prix').prop('checked', true)
                    }

                    if(response[0][0]['refuser_offreinfa'] !== null) {

                        $('#refuse_offre_inferieur').prop('checked', true)
                        $('#refuse_offre_inferieur-value').removeClass('negociation-section-desabled')
                        $('#refuse_offre_inferieur-value').css('background-color','#fff')
                        $('#refuse_offre_inferieur-value').val(response[0][0]['refuser_offreinfa'])
                        $('#negociation_prix').prop('checked', true)

                    }

                    // zone reservé à l'achat multiple
                    if (response[0][0]['vente_en_lot'] == 'false') {

                    }

                    if(response[0][0]['retour_produit'] == 'Retour national') {
                        $('#retour-nationaux').prop('checked', true);
                        $('#section-national').removeClass('retour-section-desabled')
                        $('#section-retour-description').removeClass('retour-section-desabled')
                    }

                    if(response[0][0]['retour_produit'] == 'Retour International') {
                        $('#retour-internationaux').prop('checked', true);
                        $('#section-international').removeClass('retour-section-desabled')
                        $('#section-retour-description').removeClass('retour-section-desabled')
                    }

                    console.log('expedition', response[1][0])

                    // traitement du mode d'expedition condition à changer
                    if (response[1][0] != undefined) {
                        $('#zone-expedition-national-disable-not').removeClass('retour-section-desabled');

                       for (let y = 0; y < response[1].length; y++) {
                         // recuperation du mode d'expedition
                         var sigle_mode =  []
                        // mode_expedition.push(response[0].mode_expedition)/
                        $('#mode-expedition-national-value').val(response[1][0].id) //input to store

                        $('#zone-expedition-national-add').removeClass('s-none')

                        sigle_mode = '<div id="mode-expe'+response[1][y].id+'" style="border-bottom: 1px solid #979797">'

                        sigle_mode += '<section style="height: 219px; width: 300px; border-right: 1px solid #979797; background-color: fff; border-radius: 6px 0px 0px 0px"> <img src="assets/images/icones-vendeurs2/'+response[1][y].photo_mode_expedition+'" style=" height: 27px;width: 43.2px;margin-left:129px;margin-top:30px;">'

                        sigle_mode += '<article style="  height: 20px; width: 301px;background-color: #F8F8F8;margin-top:15px;"><span style="width: 68px;color: #000000;font-family: Roboto;font-size: 14px;letter-spacing: 0.31px;line-height: 14px;text-align:center;padding-top: 3.5px; position: relative; left: 90px; top: 3px">Envoie par ' +response[1][y].mode_expedition+' </article>'

                        sigle_mode += '<article style="  height: 20px;width: 301px;background-color: #F8F8F8;margin-top:10px;"><p style=" color: #191970;font-family: Roboto;font-size: 12px;letter-spacing: 0.26px;line-height: 14px;text-align:center;padding:2px; padding-top: 3.5px">'+response[1][y].caracteristique+'</p></article>'

                        sigle_mode += '<article style="  height: 20px;width: 301px;background-color: #F8F8F8;margin-top:10px;padding:2px;"><p style="color: #000000font-family: Roboto;font-size: 12px;font-weight: 500;letter-spacing: 0.26px;line-height: 14px;text-align:center; padding-top: 2px">'+response[1][y].prix+'FCFA  - '+response[1][y].prix_max+'FCFA</p></article>'

                        sigle_mode += '<p class="expedition-modif-supp" style=" color: #1A7EF5;font-family: Roboto;font-size: 10px;letter-spacing: 0.26px;line-height: 11px;text-align: center;margin-top:20px; position: relative; left: 15px"> <a href="#" onclick=changeModeExpedition("'+response[1][0].id+'")>Modifier</a> | <a href="#" onclick="deleteModeExpedition('+response[1][0].id+')">Supprimer</a></p></section>'
                            // end first section

                        sigle_mode +='<section style="height: 219px; width: 217px;margin-top:-219px; position: relative; left:299px;padding-left: 15px; border-left: 1px solid #979797; background-color: #fff; border-radius: 0px 6px 0px 0px">'

                        sigle_mode +='<label class="form-check-label" for="defaultCheck1" style="color: #191970;font-family: Roboto;font-size: 12px;font-weight: 500;letter-spacing: 0;line-height: 14px;margin-top:15px;"><input onclick="toggleFraisExpedition('+response[1][y].id+')" id="vouspayer'+response[1][0].id+'" class="form-check-input" type="checkbox"  style="  height: 18px;width: 18px;border-radius: 2px; margin:0px" value="marchand"><span style="position: relative; left: 10px; top: 1px">Vous payez</span></label>'

                        sigle_mode += '<p style="  color: #4A4A4A;font-family: Roboto;font-size: 9px;letter-spacing: 0;line-height: 12px;margin-top:10px;">L’expédition est gratuite pour le client.<br>Frais calculés en fonction du lieu où il se trouve.</p><hr style="  height: 1px;width: 192px;border: 1px solid #D8D8D8;margin-top:10px;margin-left:-2pxpx;"><input onclick="toggleFraisExpedition1('+response[1][y].id+')" value="client" id="clientpaie'+response[1][0].id+'" class="form-check-input" type="checkbox"  style="  height: 18px; width: 18px;border-radius: 2px; margin: 0px">'

                        sigle_mode += '<label class="form-check-label" for="defaultCheck1" style=" color: #191970;font-family: Roboto;font-size: 12px;font-weight: 500;letter-spacing: 0;line-height: 14px; margin-left: 10px; width: 137px;">Le client paie les frais de</label><br> <label style="position: relative; left: 30px; color: #191970;font-family: Roboto;font-size: 12px;font-weight: 500;letter-spacing: 0;line-height: 6px;">livraison fixes</label><br><span style="  color: #4A4A4A;font-family: Roboto;font-size: 9px;letter-spacing: 0;line-height: 12px;">L’expédition est à prix fixes pour le client.<br> Frais calculés en fonction du lieu où il se trouve.</span><div style="display: flex; margin-top:10px">'

                        sigle_mode += '<input id="clientpaieInput'+response[1][y].id+'" class="negociation-section-desabled" type="text" placeholder="-"  style="width: 156px;height:31px;border-bottom-left-radius: 5px;border-top-left-radius: 5px;font-size: 18px;border: 1px solid #9B9B9B;padding-left:10px;background-color: #D8D8D8; height: 41px; width: 136px;"><input id="hiddenmode'+response[1][y].id+'" type="hidden" value="'+response[1][0].id+'">'

                        sigle_mode += '<aside style="border: 1px solid #9B9B9B;text-align:center;  font-family: Roboto;font-size: 14px;letter-spacing: -0.34px;line-height: 16px;border-radius: 0 6px 6px 0;background-color: #D8D8D8;margin-left:0px ; padding-top:12.5px; padding-right: -1px;  height: 41px;width: 57px;">Fcfa</aside></div>'

                        sigle_mode += '</section></div>';

                        $('#new-mode-section').append(sigle_mode)

                       }

                        $('#zone-expedition-national-disable-contenair').addClass('s-none')
                        $('#zone-expedition-national-disable-not-test').removeClass('s-none')
                    }

                    // fin mode d'expedition

                // ------------fin négociation------------------

                // traitement des données de reduction
                if (response[2].length > 0) {
                    $('#check_negociation_reduction').prop('checked', true);
                    $('#achat-multiple-values').removeClass('negociation-section')
                    for (let index = 0; index < response[2].length; index++) {
                        // reduction 5%
                        if (response[2][index]['libelle_reduction'] == 'Achetez 05') {
                            $('#negocier-1').prop('checked', true);
                            $('#negocier-1-value').removeClass('negociation-section-desabled')
                        }

                        // reduction 15%
                        if (response[2][index]['libelle_reduction'] == 'Achetez 15') {
                            $('#negocier-2').prop('checked', true);
                            $('#negocier-2-value').removeClass('negociation-section-desabled')
                        }

                        // reduction 20 %
                        if (response[2][index]['libelle_reduction'] == 'Achetez 20') {
                            $('#negocier-3').prop('checked', true);
                            $('#negocier-3-value').removeClass('negociation-section-desabled')
                        }

                    }
                }
                // FIN traitement données de reduction

                    $('#photo_0-bclose').removeClass('s-none')
                    $('#photo_0-bclose').css({'position': 'absolute', 'margin-top': '-80px', 'margin-right':'-80px'})
                    $('#photo_0-b').css('display','none')

                    // position: absolute; margin-top: -80px; margin-right: -80;

                    $('.photo-button-section').addClass('s-none')
                    $('#main-image-preview').attr('src', 'uploads/'+response[0][0]['image'])
                    $('#main-image-preview').css({'position': 'relative', 'top': '-12px', 'border-radius': '6px'})
                    // $('#main-image-preview').css('top', '12px')
                    $('#main-image-preview').attr('height', "308px")
                    $('#main-image-preview').attr('width', "308px")
                    $('#main-image-preview1').addClass('s-none')
                    $('#main-image-preview').removeClass('s-none')


                    for (let j = 0; j < response[0][0]['produit_images'].length; j++) {
                        var img_index = j+1
                        $('#photo_'+img_index+'-view').attr('src', 'uploads/'+response[0][0]['produit_images'][j]['image'])
                        $('#photo_'+img_index+'-view').attr('height', "100px")
                        $('#photo_'+img_index+'-view').attr('width', "100px")
                        $('#photo_'+img_index+'-view').css({'display':'block', 'height': '100px !important', 'width': '100px !important'});
                        $('#photo_'+img_index+'-view').css('border-radius','6px')
                        $('#photo_'+img_index+'-view').css('margin-right','-4px')

                        $('#photo_'+img_index+'-bclose').removeClass('s-none')
                        $('#photo_'+img_index+'-bclose').css({'position': 'absolute', 'margin-top': '-80px', 'margin-right':'-80px'})
                        $('#photo_'+img_index+'-b').css('display','none')
                    }
                    liClicked(response[0][0]['id_rayon'])

                }

            })

        }

        function deleteProductMarchand(id) {
            let confirmation = confirm("Voulez vous supprimer ce produit ??");
            if (confirmation) {
                $.ajax({
                    method: 'GET',
                    url: 'delete_product/'+id,
                    data: {},
                    headers: {},
                    success: function(response) {
                        console.log('product deleted', response)
                    }
                })
            }else {
                console.log('rien rien')
            }
        }

        function produitUpdate() {

        let mode_international = $('#mode_expedition_international').val()
        let mode_nation = $('#expedition-national').val();
        var formData = new FormData();
        let table_expedition = [];

        for (let i = 1; i < 8; i++) {
            var regler_par_marchand = $('#vouspayer'+i).val();
            var regler_par_client = $('#clientpaie'+i).val();
            var prix_client = $('#clientpaieInput'+i).val();
            var hidden_mode = $('#hiddenmode'+i).val();
            console.log('Voici votre mode', hidden_mode)
            if (hidden_mode != undefined) {
                var tab = [hidden_mode, regler_par_marchand, regler_par_client, prix_client, ]
                formData.append('expedition[]', tab)
            }
            }

        // _____________expedition_______________
        for (let y = 0; y < 6; y++) {
            let img = $('#photo_'+y+'-view').attr('src')
            let data_img = "data:image"

            if (img !== 'assets/images/icones-vendeurs2/image_outline_icon_139447.svg') {
                if (img.indexOf('data:image') == -1) {
                    image_final = img.replace('uploads/', '')
                    formData.append('vendre_meme_produit_images[]', image_final)
                }
            }
        }

        // //             // // ------------produit--------------
        let libelle_produit = $('#libelle-produit').val();
        var id_produit = $('#id_produit_update').val();
        let id_sous_cat = $('#id_sous_cat').val()  //id de la sous categorie
        let description = $('#description_produit').val();
        let prix_achat = $('#prix_achat').val();
        let quantite_disponible = $('#quantite_produit_disponible').val();
        let nbre_produit_lot = $('#nbre_produit_lot').val();
        let vente_en_lot = $('#vente_par_lot').is(":checked");
        let rayon_produit = $('#produit-rayon').find(':selected').val();



        let negociation = $('#negociation_prix').val();
        // // // si oui accepter_offre_inferieur-valeur
        let accepter_offre_inferieur = $('#accepter_offre_inferieur').val();
        // var boutique_pays = $('#boutique_pays').find(':selected').val();
        let accepter_offre_inferieur_valeur = $('#accepter_offre_inferieur-valeur').val();
        //
        let refuse_offre_inferieur = $('#refuse_offre_inferieur').val();
        let refuse_offre_inferieur_value = $('#refuse_offre_inferieur-value').val(); //refuse_offre_inferieur-value

        let negociation_reduction = $('#check_negociation_reduction').val();
        let negocier_5 = $('#negocier-1').val();
        let negocier_5_value = $('#negocier-1-value').find(':selected').text();

        let negocier_15 = $('#negocier-2').val();
        let negocier_15_value = $('#negocier-2-value').find(':selected').text();

        let negocier_20 = $('#negocier-3').val();
        let negocier_20_value = $('#negocier-3-value').find(':selected').text();

        //             // // mode expedition
        formData.append('mode_nation', mode_nation);
        formData.append('mode_internationalnation', mode_nation);

        //             // // // option de retour

        let retour_nationaux = $('#retour-nationaux').val();
        let retour_internationnaux = $('#retour-internationaux').val();
        let delais = $('#delais-annulation').find(':selected').text();
        let frais_retour = $('#frais_retourd').find(':selected').text();

        if ($('#retour-internationaux').is(':checked') && $('#retour-nationaux').is(':checked')) {
            retour = "International et national";
        }else if($('#retour-internationaux').is(':checked')){
            retour = $('#retour-internationaux').val();
        }else if($('#retour-nationaux').is(':checked')){
            retour = $('#retour-nationaux').val();
        }

        for (let i = 1; i < 11; i++) {
        if ($('#pays'+i).is(':checked')) {
            var pays = $('#pays'+i).val()
            formData.append('pays_exclu['+i+']', pays)
        }
        }


        let detail_expedition = $('#detail-retour').val();

        for (let index = 0; index < modification_attribut.length; index++) {
            formData.append('produitAttribut[]', modification_attribut[index])
        }

        formData.append('libelle', libelle_produit);
        formData.append('id_sous_cat', id_sous_cat);
        formData.append('description', description);
        formData.append('prix', prix_achat);
        formData.append('quantite', quantite_disponible)
        formData.append('vente_en_lot', vente_en_lot)
        formData.append('nbre_produit_lot', nbre_produit_lot)
        formData.append('rayon_produit', rayon_produit)
        formData.append('id_produit', id_produit);


        for (let index = 0; index < images_produit_normal.length; index++) {
            formData.append('image_'+index, images_produit_normal[index])
        }

        // recuperation des images un à un
        let image0 = $('#photo_0').get(0).files[0]; // image principal
        let image1 = $('#photo_1').get(0).files[0];
        let image2 = $('#photo_2').get(0).files[0];
        let image3 = $('#photo_3').get(0).files[0];
        let image4 = $('#photo_4').get(0).files[0];
        let image5 = $('#photo_5').get(0).files[0];

        formData.append('image0', image0)
        formData.append('image1', image1)
        formData.append('image2', image2)
        formData.append('image3', image3)
        formData.append('image4', image4)
        formData.append('image5', image5)

        formData.append('marge_negociable', negociation),
        formData.append('accepter_offre_inferieur', accepter_offre_inferieur)
        formData.append('accepter_offre_inferieur_valeur', accepter_offre_inferieur_valeur)
        formData.append('refuse_offre_inferieur', refuse_offre_inferieur_value)

        // reduction negociation multiple

        formData.append('negocier_5', negocier_5);
        formData.append('negocier_1_value', negocier_5_value);
        formData.append('negocier_15', negocier_15);
        formData.append('negocier_2_value', negocier_15_value);
        formData.append('negocier_20', negocier_20);
        formData.append('negocier_3_value', negocier_20_value);

        // retour option
        formData.append('retour_nationaux', retour_nationaux);
        formData.append('retour_internationnaux', retour_internationnaux);
        formData.append('delais', delais);
        formData.append('frais_retour', frais_retour);
        formData.append('detail_expedition', detail_expedition);
        // formData.append('caract_produit', caract_produit);
        formData.append('retour_product', retour)

        //             // // section caracteristique
        var caract = $('#tabcaracteristique').val();
        var id_tab = caract.split(",")
        let tacaracteristique = [];

        for (let i = 0; i < id_tab.length; i++) {
            var selectedcaract = $('#'+id_tab[i]).find(':selected').text()
            var dataf_selected = $('#'+id_tab[i]).attr('data-select')
            tacaracteristique[i] = selectedcaract
            formData.append('caracteristiques_final['+dataf_selected+']', selectedcaract)
        }

        for(let j = 1; j < 4 ; j++){
            var negociation_val = $('#negocier-'+j+'-value').find(':selected').text();
            var negocier = $('#negocier-'+j).val()
            formData.append('negociation['+negocier+']', negociation_val)
        }


        for (let u = 0; u < images_produit_web.length; u++) {
            formData.append('images_web[]', images_produit_web[u])
        }

        // verification si ya la video
        if ($('#videoPreviewInput').val() != '' || $('#videoPreviewInput').val() != null) {
            var produit_video = $('#videoPreviewInput').val()
            formData.append('produit_video', produit_video)
        }


        formData.append('produit_caracteristique[]', tacaracteristique)

        for (let u = 0; u < caracteristique_supp.length; u++) {
            formData.append('caracteristique_supplementaire[]', caracteristique_supp[u])
        }

        $.ajax({
            type:'POST',
            url:"update_produit",
            data: formData,
            contentType: false,
            processData: false,
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            success:function(response){
                console.log('Your response', response)
                // if (response == "SUCCESS") {
                //         alert("Produit modifié avec success")
                //         window.location.reload()
                // }else{
                //     alert("Ouf il s'est produit un petit soucis, veillez reéssayiez merci.")
                // }
            }
        });
        }


        function produitUpdate_ancien() {

            let mode_international = $('#mode_expedition_international').val()

            let mode_nation = $('#expedition-national').val();

            var formData = new FormData();

            let table_expedition = [];

//             // traitement des images de vendre le même produit
//             let vendre_meme_produit = $('#vendre-meme-produit').val();
//             formData.append('vendre_meme_produit', vendre_meme_produit)
//             if (vendre_meme_produit == 'true') {

                for (let y = 0; y < 6; y++) {
                    let img = $('#photo_'+y+'-view').attr('src')
                    let data_img = "data:image"

                    if (img !== 'assets/images/icones-vendeurs2/image_outline_icon_139447.svg') {
                        if (img.indexOf('data:image') == -1) {
                            image_final = img.replace('uploads/', '')
                            formData.append('vendre_meme_produit_images[]', image_final)
                        }
                    }
                }

              // special expedition
              for(let j = 1; j < 4 ; j++){
                    var expedition = $('#clientpaieInput'+j).val()
                    formData.append('clientpaieInput'+j, expedition)
                }

                for (let i = 1; i < 8; i++) {
                    var regler_par_marchand = $('#vouspayer'+i).val();
                    var regler_par_client = $('#clientpaie'+i).val();
                    var prix_client = $('#clientpaieInput'+i).val();
                    var hidden_mode = $('#hiddenmode'+i).val();

                   var tab = [hidden_mode, regler_par_marchand, regler_par_client, prix_client, ]
                   formData.append('expedition['+i+']', tab)
                }

//             if(mode_nation == "mode1") {
//                 for (let i = 1; i < 4; i++) {
//                     var regler_par_marchand = $('#vouspayer'+i).val();
//                     var regler_par_client = $('#clientpaie'+i).val();
//                     var prix_client = $('#clientpaieInput'+i).val();
//                     var hidden_mode = $('#hiddenmode'+i).val();

//                    var tab = [hidden_mode, regler_par_marchand, regler_par_client, prix_client, ]
//                    formData.append('expedition['+i+']', tab)
//                 }

//             console.log(table_expedition)
//         }




//             if(mode_nation == 'mode-international'){
//                 var regler_par_marchand = 'false';
//                 var regler_par_client = $('#clientpaieInternational'+i).val();
//                 var prix_client = $('#clientpaieInputInternational'+i).val();
//                 var hidden_mode = $('#hiddenmodeInternational'+i).val();
//             }

            // console.log(mode_nation, mode_international)
            let image_principal = $('#photo_0').get(0).files[0];
            let image1 = $('#photo_1').get(0).files[0];
            let image2 = $('#photo_2').get(0).files[0];
            let image3 = $('#photo_3').get(0).files[0];
            let image4 = $('#photo_4').get(0).files[0];
            let image5 = $('#photo_4').get(0).files[0];

//             // // ------------produit--------------
            let libelle_produit = $('#libelle-produit').val();
            var id_produit = $('#id_produit_update').val();
            let id_sous_cat = $('#id_sous_cat').val()  //id de la sous categorie
            let description = $('#description_produit').val();
            let prix_achat = $('#prix_achat').val();
            let quantite_disponible = $('#quantite_produit_disponible').val();
            let nbre_produit_lot = $('#nbre_produit_lot').val();
            let vente_en_lot = $('#vente_par_lot').is(":checked");
            let rayon_produit = $('#produit-rayon').find(':selected').val();

            let retour = '';


//             let negociation = $('#negociation_prix').val();
//             // // // si oui accepter_offre_inferieur-valeur
//             let accepter_offre_inferieur = $('#accepter_offre_inferieur').val();
//             // var boutique_pays = $('#boutique_pays').find(':selected').val();
//             let accepter_offre_inferieur_valeur = $('#accepter_offre_inferieur-valeur').val();
// //
//             let refuse_offre_inferieur = $('#refuse_offre_inferieur').val();
//             let refuse_offre_inferieur_value = $('#refuse_offre_inferieur-value').val(); //refuse_offre_inferieur-value

//             let negociation_reduction = $('#check_negociation_reduction').val();
//             let negocier_5 = $('#negocier-1').val();
//             let negocier_5_value = $('#negocier-1-value').find(':selected').text();

//             let negocier_15 = $('#negocier-2').val();
//             let negocier_15_value = $('#negocier-2-value').find(':selected').text();

//             let negocier_20 = $('#negocier-3').val();
//             let negocier_20_value = $('#negocier-3-value').find(':selected').text();

//             // // mode expedition
//             formData.append('mode_nation', mode_nation);
//             formData.append('mode_internationalnation', mode_nation);

//             // // // option de retour

//             let retour_nationaux = $('#retour-nationaux').val();
//             let retour_internationnaux = $('#retour-internationaux').val();
//             let delais = $('#delais-annulation').find(':selected').text();
//             let frais_retour = $('#frais_retourd').find(':selected').text();

//             if ($('#retour-internationaux').is(':checked') && $('#retour-nationaux').is(':checked')) {
//                 retour = "International et national";
//             }else if($('#retour-internationaux').is(':checked')){
//                 retour = $('#retour-internationaux').val();
//             }else if($('#retour-nationaux').is(':checked')){
//                 retour = $('#retour-nationaux').val();
//             }

//             for (let i = 1; i < 11; i++) {
//                 if ($('#pays'+i).is(':checked')) {
//                     var pays = $('#pays'+i).val()
//                     formData.append('pays_exclu['+i+']', pays)
//                 }
//             }


//             let detail_expedition = $('#detail-retour').val();

//             let caract_produit = $('#tabcaracteristique').val();
//             let tablCar = caract_produit.split(',');

            formData.append('libelle', libelle_produit);
            formData.append('id_sous_cat', id_sous_cat);
            formData.append('description', description);
            formData.append('prix', prix_achat);
            formData.append('quantite', quantite_disponible)
            formData.append('vente_en_lot', vente_en_lot)
            formData.append('nbre_produit_lot', nbre_produit_lot)
            formData.append('rayon_produit', rayon_produit)
            formData.append('id_produit', id_produit);

            console.log('attribut:', modification_attribut)

            for (let index = 0; index < modification_attribut.length; index++) {
                formData.append('produitAttribut[]', modification_attribut[index])
            }

            for (let index = 0; index < images_produit_normal.length; index++) {
                formData.append('image_'+index, images_produit_normal[index])
            }


//             // // section caracteristique
            var caract = $('#tabcaracteristique').val();
            var id_tab = caract.split(",")
            let tacaracteristique = [];

            for (let i = 0; i < id_tab.length; i++) {
                var selectedcaract = $('#'+id_tab[i]).find(':selected').text()
                var dataf_selected = $('#'+id_tab[i]).attr('data-select')
                tacaracteristique[i] = selectedcaract
                formData.append('caracteristiques_final['+dataf_selected+']', selectedcaract)
            }

            $.ajax({
                type:'POST',
                url:"update_produit",
                data: formData,
                contentType: false,
                processData: false,
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                success:function(response){
                    console.log('produit à modifier', response);
                }
            });
        }

        function getBackgroundEtagere() {
            $('.contenu-marchand').css('background-image', 'url(../assets/images2/background-tech.webp) !important')
            console.log('etagère changed')
        }



    </script>

@endsection
