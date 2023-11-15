<div class="main-annonce-body none-detail-annonece" id="detailAnnonce">

<div class="detail-annonce-left-side">
    {{-- contenair des popups  --}}
    <style>

        .img-p-1 img {
            height: auto;
            max-height: 82.3px !important;
        }

        .img-p-flex-center {
            display: flex;
            align-items: center;
        }

        .set-white-bg {
            background-color: #fff;
        }

        .set-gray-bg {
            background-color: #D8D8D8;;
        }

        .tm-price-section-1 {
            height: 100%;
            width: 100%;
        }

        .prix-half-width {
            width: 49% !important;
        }

        .tm-price-section-2 {
            height: 100%;
            width: 49%;
        }

        .text-align-right {
            text-align: right;
        }

        .text-align-center {
            text-align: center;
        }

    </style>
<div class="left-popup-element-zone">
    {{-- zone principal du popup  --}}
    <div class="left-popup-element-preview-product" id="kingPop">
        {{-- cadres des images  --}}
        <div class="preview-left-img-zone">
    <div class="left-image-preview-box">
        <div class="left-image-preview-box-container">

        <div class="img-p-1" style="border-radius: 6px 6px 0 0; border-bottom: none">
            <div class="preview-img-element-1 img-p-flex-center">
                <img id="photo_0-preview" src="assets/images/icones-vendeurs2/image_outline_icon_139447.svg" width="82px" height="82.3px"  />
            </div>
        </div>

        <div class="img-p-1" style="border-top: 1px solid #9B9B9B; border-bottom: none ">
            <div class="preview-img-element-2 img-p-flex-center">
                <img id="photo_1-preview" src="assets/images/icones-vendeurs2/image_outline_icon_139447.svg" width="82px" height="82.3px"  />
            </div>
        </div>
        <div class="img-p-1" style="border-top: 1px solid #9B9B9B; border-bottom: none ">
            <div class="preview-img-element-3 img-p-flex-center">
                <img id="photo_2-preview" src="assets/images/icones-vendeurs2/image_outline_icon_139447.svg" width="82px" height="82.3px"  />
            </div>
        </div>

        <div class="img-p-1" style="border-top: 1px solid #9B9B9B; border-bottom: none ">
            <div class="preview-img-element-4 img-p-flex-center">
                <img id="photo_3-preview" src="assets/images/icones-vendeurs2/image_outline_icon_139447.svg" width="82px" height="82.3px"  />
            </div>
        </div>
        <div class="img-p-1" style="border-top: 1px solid #9B9B9B; border-bottom: none ">
            <div class="preview-img-element-5 img-p-flex-center">
                <img id="photo_4-preview" src="assets/images/icones-vendeurs2/image_outline_icon_139447.svg" width="82px" height="82.3px"  />
            </div>
        </div>
        <div class="img-p-1" style="border-radius: 0 0 6px 6px;">
            <div class="preview-img-element-6">
                <iframe  id="video-preview-p"  width="82" height="82"
                src="" style="width: 82px; height: 82px" class="s-none">
                </iframe>
                {{-- <img id="photo_5-preview" src="assets/images/icones-vendeurs2/image_outline_icon_139447.svg" width="82px" height="82.3px"  /> --}}
            </div>
        </div>
    </div>
    </div>
</div>
{{-- fin cadres des images  --}}
<div class="preview-data-zone">
    {{-- libelle produit  --}}
    <div class="preview-libelle-zone">
        <div class="nouveau-title-section" >
            <img src="assets/images/icones-vendeurs2/nouveau.svg" style="position: absolute; height: 24px; display: none">
            <span class="preview-annonce-titre" id="titre-annonce">@TitreDeL’Annonce</span>
        </div>
    </div>
    {{-- fin libelle produit  --}}
    <div class="nombre-livraison-reference">
        <div class="etoile-section">
            <div> <img src="assets/images/icones-vendeurs2/Rate_Vide.svg" height="10px"width="15px" ></div>
            <div> <img src="assets/images/icones-vendeurs2/Rate_Vide.svg" height="10px"width="15px" ></div>
            <div> <img src="assets/images/icones-vendeurs2/Rate_Vide.svg" height="10px"width="15px" ></div>
            <div> <img src="assets/images/icones-vendeurs2/Rate_Vide.svg" height="10px"width="15px" ></div>
            <div> <img src="assets/images/icones-vendeurs2/Rate_Vide.svg" height="10px"width="15px" ></div>
        </div>
        <div class="livraison-section" style="margin-right: 35px">
            <span class="preview-livraison-number">0 | 00 livraisons</span>
        </div>

        <div class="ref-p-section">
            <span class="preview-ref-text">Référence :</span><span class="preview-ref-val" id="reference-produit-preview"> XXXXXXXXXXX </span>
        </div>
    </div>
    {{-- fin ref livreson  --}}
    <div class="prix-caracteristique-p-section" style="display: flex; justify-content: center; align-items: center">

        <div class="tm-price-section-1 " >
            <p id="prix-appercu" class="preview-prix-element text-align-center">XXX.XXX <span id="currency3">Fcfa</span></p>
        </div>

        <div class="tm-price-section-2 s-none" >
            <span class="current-unite " style="display: flex">
            <p class="preview-prix-separator">|</p>
                <p class="preview-prix-kilos" ><span id="tm_nombre_par_lot" style="margin-right: 5px">XX </span><span id="unite_de_vente">Kg </span><br>
                <span id="prod_prix_unitaire">X.XXX</span> <span id="currency4">Fcfa</span> / <span id="unite_de_vente2">kg </span>
        </p>
           </span>
        </div>

    </div>
    {{-- caracteristique zone  --}}
    <div class="caracteristique-preview-element" id="caracteristique-preview1">

    </div>
    {{-- caracteristique zone fin  --}}
    {{-- zone expedition retour  --}}
    <div class="zone-expedition-retour-payement">
        <div class="z-exp-1" style="display: flex; column-gap: 15px">
            <div class="z-exp-1-icones">
                <img src="assets/images/icones-vendeurs2/Chariot.svg">
            </div>

            <div class="z-exp-11" >
                <span class="preview-article-retour" id="option_retour-preview">Article ne disposant pas de retour</span>
            </div>
        </div>

        <div class="z-exp-1" style="display: flex; column-gap: 15px; margin-top: 5px">
            <div class="z-exp-1-icones">
                <img src="assets/images/icones-vendeurs2/trolley.svg">
            </div>

            <div class="z-exp-11" >
                <span class="preview-retour-24h" id="expeditionTextPreview">Expédition en 24h (sauf jour ouvré)</span>
            </div>
        </div>

                <div class="z-exp-1" style="">
                    <div class="z-exp-1-icones">
                        <img src="assets/images/icones-vendeurs2/Group 8.svg">
                    </div>

                    <div class="z-exp-11" >
                        <span class="preview-payment-cart" id="payement-marchand-preview"></span>
                    </div>
                </div>
            </div>
            {{-- expedition retour fin  --}}
            {{-- caracteristique preview  --}}
            {{-- <div class="description-caracteristique-p" id="description-preview">

            </div> --}}
            <textarea rows="4" cols="50" class="description-caracteristique-p" id="description-preview" style="padding: 3px" readonly>

            </textarea>

            {{-- produit similaire  --}}
            <div class="rowf infos-articles" style="position: relative; left:15px;margin-top:22px;">

                <div class="article-associe"  >
                    <span style="position: relative; top: -4px;padding: 0px !important; margin: 0px !important;">
                        <i class="fas fa-circle" style="height: 6px; width: 6px; font-size: 8px; margin-right: 5px"></i> Articles associés</span>
                </div>

                <div class="produit-associer-section" style="display: flex">
                    {{-- <img  src="assets/images/icons/Icons_Rayons/Accessoires.svg" class="hoverd img-assoc" alt="" />
                <img   src="assets/images/icons/Icons_Rayons/Accompagnements.svg" alt="" class="img-assoc"/>
                <img   src="assets/images/icons/Icons_Rayons/Boulangerie.svg" alt="" class="img-assoc"/>
                <img src="assets/images/icons/Icons_Rayons/Cartouches_tonner.svg" alt="" class="img-assoc"/>
                <img  src="assets/images/icons/Icons_Rayons/Cereales.svg" alt="" class="img-assoc"/>
                <img  src="assets/images/icons/Icons_Rayons/Volailles.svg" alt="" class="img-assoc"/>
                    <img  src="assets/images/icons/Icons_Rayons/Boulangerie.svg" alt=""  class="img-assoc"/> --}}
                </div>

            </div>
        </div>

    </div>
            {{-- fin preview  --}}

    {{-- debut modal produit etagere  --}}
    <div  class="hide" id="kingpop2" style="background-color: #fff; border-radius:5px 5px" >
    <div>
    <section style="box-sizing: border-box; height: 51px; width: 600px; border: 1px solid #D8D8D8; border-radius: 5px 5px 0 0;
                background-color: #FFFFFF;">
        <p class="header-image-etagere">Choisissez votre image de présentation</p>

            <button style="z-index: 1; margin-left: 574px; margin-top: -64px; border-radius: 50%; border: 1px solid #fff; background-repeat: no-repeat;
                            opacity: 1; right: -9px; background-size: 24px; height: 34px; width: 34px" type="button" id="closeNowOk">
                <img src="https://toulemarket.com/assets/images/close-btn.svg" alt="">
            </button>
        </section>

        <section style="height: 31px; width: 584px; border-top: none; padding:10px;">

        <article style=" width:189px;position: relative;   top: -2px; left: 4px">
                {{-- <span style="color: #4A4A4A;
                    font-family: Roboto;
                    font-size: 16px;
                    font-weight: 300;
                    letter-spacing: 0.35px;
                    line-height: 16px;
                    text-align:center;
                    position: relative;
                    left: 1px;
                    height: 16px;
                    ">
                        Services d’expédition
                    </span> --}}
        </article>
    </section>

    <section class="ImagePopContainer">

    </section>

    </div>
</div>
{{-- fin modal produit etagere  --}}
<!-- debut mode expedition -->
<div class="mode-expedition hide"  id="dtservice" style="background-color: #fff; border-radius:5px 5px">
<div>
    <section class="section-selectionner-un-service-expedition">
            <p class="p-element-service-expedition">Séletionner un service d’expédition
        </p>
        <button class="fermer-popup-expedition" type="button" id="closeNowOk1">
                <img src="https://toulemarket.com/assets/images/close-btn.svg" alt="">
            </button>
    </section>

    <section class="selection-service-section-2">

    <article style=" width:189px; border-right:1px solid #D8D8D8; position: relative; top: -2px; left: 4px">
        <span class="span-service-expedition">Services d’expédition</span>

        </article>

            <article style=" width:194px; border-right:1px solid #D8D8D8;margin-top:-16px;margin-left:198px; position: relative; top: -1px">
                <span class="poids-dimension-max">Poids & Dimensions Max.</span>
            </article>

            <article style=" width:194px; margin-top:-14px;margin-left:390px;">
            <span class="frais-estimer-span">Frais estimés</span>
            </article>

            </section>

            <section style="height: 300px;width:578px;" class="mode_expedition_container">

            </section>

    </div>
</div>
        <!-- fin mode expedition  -->
        @include('front.app-module.marchand.marchand-annonce.pays_exclus')
    </div>
</div>

{{-- reservé aux popups  --}}
<div class="detail-annonce-right-side" id="rightModalContainerElement">
        <div class="step-2-annoce  active-annonce-show" id="step1AnnonceVente">

            @include('front.app-module.marchand.marchand-annonce.detail-annonce-body')
            <div style="height:77px">
                <button onclick="showTabAnnonceCreationProduit()" class="annuler-step-1-produit">Annuler</button>
                <button id="suivant-step1" onclick="showTabAnnonceVente()" disabled class="suivant-step-1-produit" >Suivant</button>
            </div>
    </div>

    </div>
    <div class="step-1-annoce s-none" id="step2AnnonceVente" style="background-color: #fff">

             @include('front.app-module.marchand.marchand-annonce.detail-vente-body')
            <div style="height:70px; padding-top: 17px">
                <button onclick="showTabAnnonceVenteAnnuler()" class="annuler-step-2-produit">Retour</button>
                <button onclick="showTabAnnonceVenteStep1()" class="suivant-step-2-produit" id="suivantExpedition" disabled>Suivant</button>
            </div>
    </div>

    <div class="step-3-annoce s-none" id="step3AnnonceVente" style="background-color: #fff; ">
        @include('front.app-module.marchand.marchand-annonce.detail-annonce-expedition-body')
    </div>
    <!-- body section  -->
    </div>/
    </div>

</div>
