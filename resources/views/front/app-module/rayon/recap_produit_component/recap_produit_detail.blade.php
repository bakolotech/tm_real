<button id="modalProduitClosedBIS" type="button" class="close-btn_biss" style="z-index: 500; position:absolute;" >
            <img src="{{ asset('assets/images/close-btn.svg') }}" alt="">
        </button>
    <div class="content-container" >

<div class="left-box">
    <div class="menu-section" style="border: none !important">
        <nav>
        <ol class="breadcrumb" style="background: transparent !important; position:relative; top: -2px; padding: 0.75rem 1rem;">
            <li ><a href="/"> <i class="fa-thin fa-album-collection-circle-user"></i>Acceuil<img src="{{asset('assets/images/icons/ic_chevron_right.svg')}}" alt=""/></a></li>
            <li aria-current="page">
            <a href="#" id="produit-univer-user">Univers alimentation
                </a><img src="{{asset('assets/images/icons/ic_chevron_right.svg')}}" alt=""/></li>
            <li aria-current="page"><a href="#" id="produit-rayon-user">Fruits légumes</a><img src="{{asset('assets/images/icons/ic_chevron_right.svg')}}" alt=""/></li>
            <li  aria-current="page" class="text-active">Détail sur le produit</li>
        </ol>
        </nav>
    </div>
    <div class="article-libelle block_mobile" style="display: flex; flex-direction: row;margin-left: 16px;">
        <button class="nouveaute">Nouveau</button>

        <span class="article-title" style="color: #4A4A4A;font-size: 13px;font-weight: bold;">

        </span>
        <input type="hidden" id="id_produit">
    </div>
    <div style="margin-left: 17px;margin-bottom: 5px;" class="block_mobile">
        <span style="margin: 0px; padding: 0px; color: #9B9B9B!important; font-size: 6px;">Réf : </span>
        <span id="reference_produit_client" style="font-size: 6px;color: #9B9B9B!important;">P110YAXSY8C</span>
    </div>

    <div class="img-box-section" style="display: flex; flex-direction: row;">

    <div class="petit-section"  style="display: flex; flex-direction: column; justify-content: flex-start; align-items: flex-start;">
    <div class="cadre-div tm_produit_petit_img_user tm_active_img_product">
    <div class="petit-cadre" style="background-color: #fff !important">
        <img class="img-card-petit" src="" alt="" id="image_principal1" >
    </div>
    </div>
    <div class="cadre-div tm_produit_petit_img_user">
    <div class="petit-cadre">
        <img class="img-card-petit" src="" alt="" id="image_autre1" >
    </div>
    </div>
    <div class="cadre-div tm_produit_petit_img_user">
    <div class="petit-cadre">
        <img class="img-card-petit" src="" alt="" id="image_autre2" >
    </div>
    </div>
    <div class="cadre-div tm_produit_petit_img_user">
    <div class="petit-cadre">
        <img class="img-card-petit" src="" alt="" id="image_autre3" >
    </div>
    </div>

    <div class="cadre-div tm_produit_petit_img_user">
    <div class="petit-cadre">
        <img class="img-card-petit" src="" alt="" id="image_autre4" >
    </div>
    </div>
    <div class="cadre-div tm_produit_petit_img_user" id="zone-video-product">
    <div class="petit-cadre tm_vid_icon">


    </div>
    </div>
    </div>

    {{-- preview section  --}}
    <div class="gros-cadre-user" style="padding-left: 5px; padding-right: 5px">
    <img class="img-card" src="" alt="" id="image_principal" >

    <div class="tm_show_p_product-client s-none-client" style="width: 403px">
        <iframe id="marchand_video_preview_big_client" class="img-card" width="403" height="403" src="" style="width: 403px; height: 403px">
        </iframe>
    </div>

    <div class="button-option" >
        <div class="btn-group_bis2 btn-icons" style="position: absolute; margin-top: 159px; margin-left: -145px">
            <span class="article-button-option"><img class="enStock-svg" src="{{asset('assets/recap_produit/icons/En_stock.svg')}}" alt=""/></span>
            <span class="article-button-option"><img class="partager-svg" src="{{asset('assets/recap_produit/icons/Partage.svg')}}" onclick="showSocialShare()" alt=""/></span>
            <span class="article-button-option"><img class="favori-svg" onclick="ajout_favori()" id="ajouter_favori" src="{{asset('assets/recap_produit/icons/Favoris_no.svg')}}" alt=""/></span>
            <span class="article-button-option"><img class="comparer-svg" src="{{asset('assets/recap_produit/icons/Comparer.svg')}}" alt=""/></span>
        </div>
    </div>
    </div>
</div>

    <div class="start-section" id="start-section-mobile" style="margin-left: 18px;">

        <div class="icon-section" style="display: flex; justify-content: center; align-items: center; padding: 0px !important; top: -5px">
            <svg class="orange-color" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-star-fill" viewBox="0 0 16 16">
                <path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"/>
                </svg>
            <svg class="orange-color" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-star-fill" viewBox="0 0 16 16">
                <path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"/>
                </svg>

            <svg class="orange-color" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-star-fill" viewBox="0 0 16 16">
                <path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"/>
                </svg>

            <svg class="gray-color" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-star-fill" viewBox="0 0 16 16">
                <path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"/>
                </svg>

            <svg class="gray-color" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-star-fill" viewBox="0 0 16 16">
                <path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"/>
                </svg>

        </div>

    <div class="text-section-revue">
        <span style="position: relative; top: -5px">3.1 | 0 livraisons</span>
    </div>

    <div class="ref-section-revue" style="position: relative; top: -3px">
        <p style="font-size: 18px;" id="prix_total_mobile" class="preview-prix-element text-align-center">XXX.XXX <span id="currency3">Fcfa</span></p>
        <input type="hidden" id="current_price" value="" />
    </div>

</div>

    <div class="btn-section" style="margin-top: 15px;" id="Ajouter_new">
        <div class="btn-group">

            <div class="bouton-first">
                <button type="button" class="btn" onclick="Passer_au_panier_rapide()">
                    <img src="{{asset('assets/images/icones-vendeurs2/icones-menu/paiement.svg')}}" />
                </button>
            </div>

            <div class="bouton-second">
                <button type="submit" id="ajouter_panier" class="btn btn-primary" onclick="ajout_panier()">
                    <img id="imgButon0" src="{{asset('assets/recap_produit/icons/Chariot.svg')}}" /> <label id="aa">Ajouter au panier</label>
                    <span id="spinner_ajouter" style="position: relative; top: -5px" class="spinner-border none-messaboxe" role="status" ></span>
                </button>
            </div>

            <div class="bouton-third">
                <button type="button" class="btn btn-success" id="faireUneOffre">
                    <img src="{{asset('assets/recap_produit/icons/Negociation.svg')}}" /> <label>Faire une offre</label>
                </button>
            </div>

        </div>

    </div>

    <div class="in_stock_zone s-none-client" id="in_stock_main_element">
        @include('front.new_view.panier_composants.in_stock_element');
    </div>

<div class="btn-section" style="margin-top: 15px; display:none" id="modification">
<div class="bouton-modifier">

    <button class="modifier-panier desabled-modification-article" id="Enregistrer_panier_nouvel" onclick="ajout_panier_modification()">
        <img id="imgButon1" class="modifButon" src="{{asset('assets/images/icons/Mise_a_jour.svg')}}" />
        <span id="span1">Enregistrer les modifications</span>
        <small id="spinner_modifier" class="" role="status" aria-hidden="true" style="color: #1A7EF5"></small>
    </button>

    <button class="ajouter-panier-modifier desactive" id="ajouter_panier_nouvel"  onclick="ajouter_nouvel()">
        <img id="imgButon2" class="modifButon" src="{{asset('assets/recap_produit/icons/Chariot.svg')}}" />
        <span id="span2">Ajouter comme nouvel article</span>
        <small id="spinner_ajouter_nouvel" class="" role="status" aria-hidden="true"></small>
    </button>

</div>
</div>

<div class="detail-bottom" style="border: 1px solid #ccc; " id="client_sur_meme_produit">

<div class="detail-bottom-elemnt1">
<img src="{{asset('assets/recap_produit/icons/Logo.png.svg')}}" alt="" />
<span class="separateur"></span>
</div>

<div class="detail-bottom-elemnt2" >
<p style="position: relative; right: 10px; " class="zone-infos-panier">
<span>
    <b>D'autres acheteurs s'intéressent à ceci.</b>
</span><br/>
Plus de {{rand(5, 15)}} personnes l'ont dans leur panier en ce moment.
</p>
</div>

</div>

</div>
<!-- end left box  -->

<div class="right-box">

<div class="article-libelle" id="block_desktop" style="display: flex; flex-direction: row;">
    <button class="nouveaute">Nouveauté</button>

    <span class="article-title">
        {{-- MARMITE SANS COUVERCLE 6,8l --}}
    </span>
    <input type="hidden" id="id_produit">
</div>

<div class="start-section" id="start-section-desktop">
    <div class="icon-section" style="display: flex; justify-content: center; align-items: center; padding: 0px !important; top: -5px">
        <svg class="orange-color" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-star-fill" viewBox="0 0 16 16">
            <path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"/>
            </svg>
        <svg class="orange-color" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-star-fill" viewBox="0 0 16 16">
            <path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"/>
            </svg>

        <svg class="orange-color" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-star-fill" viewBox="0 0 16 16">
            <path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"/>
            </svg>

        <svg class="gray-color" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-star-fill" viewBox="0 0 16 16">
            <path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"/>
            </svg>

        <svg class="gray-color" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-star-fill" viewBox="0 0 16 16">
            <path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"/>
        </svg>
    </div>

    <div class="text-section-revue">
        <span style="position: relative; top: -5px">3.1 | 0 livraisons</span>
    </div>

    <div class="ref-section-revue" style="position: relative; top: -3px">
        <span style="margin: 0px; padding: 0px; color: #9B9B9B!important">Référence : </span>
        <span id="reference_produit_client_desktop" >P110YAXSY8C</span>
        <input type="hidden" name="" id="id_session">
        <input type="hidden" name="" id="id_session_update">
        <input type="hidden" name="tm_active_image_to_share" id="tm_active_image_to_share" />
        <input type="hidden" name="product_video_preview_for_share" id="product_video_preview_for_share" />
    </div>

</div>

<div class="section-cout-marchand-popup" style="display: flex; justify-content: center; align-items: center">

    <div class="tm-price-section-1 " >
        <p id="prix_total" class="preview-prix-element text-align-center">XXX.XXX <span id="currency3">Fcfa</span></p>
        <input type="hidden" id="current_price" value="" />
    </div>

    <div class="tm-price-section-2 s-none" style="display: none">
        <span class="current-unite " style="display: flex">
        <p class="preview-prix-separator">|</p>
            <p class="preview-prix-kilos" ><span id="tm_nombre_par_lot" style="margin-right: 5px">XX </span><span id="unite_de_vente">Kg </span><br>
            <span id="prod_prix_unitaire">X.XXX</span> <span id="currency4">Fcfa</span> / <span id="unite_de_vente2">kg </span>
    </p>
        </span>
    </div>


</div>

<div class="produit-caracteristique" >
<div class="produit-carateristique-row1">
    <form action="/action_page.php" autocomplete="off">
        <div class="quantite-caracteristique" style="display: flex; ">
            <div>
    <span class="form-label-products">Quantité</span>
    <div id="p_input" class="btn-group produit-caracteristique-detail" role="group" aria-label="Basic example" style="" >
        <button onclick="moins()" type="button"><img src="{{asset('assets/recap_produit/form-icon/moins.svg')}}"  style="position: relative; right: -17px;"/></button>
        <input type="text" id="quantite" value="1" minlength="1" onblur="verifier_input()" onkeyup="make_calculation()">
        <button onclick="plus()" type="button"><img src="{{asset('assets/recap_produit/form-icon/Plus.svg')}}" style="position: relative; right: 17px;"/></button>

    </div>
</div>

    <div class="style_pour_desktop">
        <span for="email" class="form-label-products" id="carac_produit-Label0">@Caractéristique 0</span>
        <select class="select-product" id="carac_produit0" onchange="verifier_article()">
        </select>
    </div>

        </div>
    </form>
</div>

<div class="produit-carateristique-row2">
<form action="/action_page.php" autocomplete="off">
    <div class="" style="display: flex;">
        <div class="cara_annee" style="margin-right: 10px; padding: 0px !important;">
            <span for="email" class="form-label-products" id="carac_produit-Label1">@Caractéristique 1</span>
            <select class="select-product" id="carac_produit1" onchange="verifier_article()">
        </select>
    </div>

    <div class="style_pour_desktop">
        <span for="email" class="form-label-products" id="carac_produit-Label2">@Caractéristique 2</span>
        <select class="select-product" id="carac_produit2" onchange="verifier_article()">

    </select>
</div>

    </div>
</form>
</div>

<!-- </div><br><br> -->

<div class="data-icon" style="display: flex; position: relative; margin-top: 24px">
<div class="col-1s" style="width: 141px;">
    <div class="btn-group paiement-section">

    <div class="z-exp-1-icones-bis" style="margin-right: 2px">
        <div class="produit-option-supp">
            <div class="icon-last-level">
                <img src="{{asset('assets/images/icons/tm_chariot.svg')}}">
            </div>
            <div class="libelle-option-p" style="left: -15px">
                <span class="s-none-p">Retour</span>
            </div>
            </div>
    </div>
    <div class="z-exp-1-icones-bis" style="margin-right: 2px">
        <div class="produit-option-supp">
            <div class="icon-last-level">
                <img src="{{asset('assets/recap_produit/move-by-trolley.svg')}}">
            </div>
            <div class="libelle-option-p" style="top:2px">
                <span class="s-none-p" style="position: relative; top: -3px">Expédition</span>
            </div>
            </div>
    </div>
    <div class="z-exp-1-icones-bis">
        <div class="produit-option-supp">
            <div class="icon-last-level">
                <img src="{{asset('assets/recap_produit/Group 8.svg')}}">
            </div>
            <div class="libelle-option-p">
                <span class="s-none-p">Paiement</span>
            </div>
            </div>
    </div>
</div>
</div>


<div class="info-expediction-user">
    <p class="slide-option-text">Retour national accepté</p>
    <p class="slide-option-text">Expédition en 45 min</p>
    <p class="slide-option-text">Paiement bacaire accepté</p>
</div>

</div>

<div class="rowf infos-description des_car_desktop"  style="position: relative; left: 0px" id="descProd">
    <div style="width: auto;">
        <p style="position: absolute; float: left; left: 15px;">Description et caractéristiques</p>
    </div>
    <div style="width: auto">

        <button class="btn btn-default" >
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-plus-lg" viewBox="0 0 16 16">
                <path fill-rule="evenodd" d="M8 2a.5.5 0 0 1 .5.5v5h5a.5.5 0 0 1 0 1h-5v5a.5.5 0 0 1-1 0v-5h-5a.5.5 0 0 1 0-1h5v-5A.5.5 0 0 1 8 2Z"/>
                </svg>
        </button>
    </div>
</div>

<div class="rowf infos-description des_car_mobile"  style="position: relative; left: 0px" id="descProd">
    <div style="width: auto;">
        <p style="position: absolute; float: left; left: 15px;">Description et caractéristiques</p>
    </div>
    <div style="width: auto">

        <button class="btn btn-default" >
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-plus-lg" viewBox="0 0 16 16">
                <path fill-rule="evenodd" d="M8 2a.5.5 0 0 1 .5.5v5h5a.5.5 0 0 1 0 1h-5v5a.5.5 0 0 1-1 0v-5h-5a.5.5 0 0 1 0-1h5v-5A.5.5 0 0 1 8 2Z"/>
                </svg>
        </button>
    </div>
</div>

<style>
    .article-button-option {
        display: flex !important;
    }

    .btn-group_bis2 {
        display: flex;
    }
</style>

<button class="rowf infos-offres" style="position: relative; left: 0px; border: none" onclick="build_popup_fav()">
    <p style="display: flex; justify-content: space-between; align-items: center;position: relative; top: 7px; color: #fff;">
        <img src="{{asset('assets/images/icons/tm_sigle.svg')}}" alt=""  style="position: relative; left: 10px"/>
        <span style="position: absolute; float: left; left: 45px;">Voir les <span id="produit_partenaire_counter">999</span> offres de nos partenaires</span>
        <span style="position: relative; left: -13px"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-plus-lg" viewBox="0 0 16 16">
            <path fill-rule="evenodd" d="M8 2a.5.5 0 0 1 .5.5v5h5a.5.5 0 0 1 0 1h-5v5a.5.5 0 0 1-1 0v-5h-5a.5.5 0 0 1 0-1h5v-5A.5.5 0 0 1 8 2Z"/>
            </svg>
        </span>
    </p>
</button>

<div class="rowf infos-articles" style="position: relative; left: 1px;">
    <div class="article-associe">
        <span style="position: relative; top: -'4px;padding: 0px !important; margin: 0px !important;">
        <i class="fas fa-circle" style="height: 6px; width: 6px; font-size: 8px; margin-right: 5px; color: #00b517"></i> Articles associés</span>
    </div>
    <div class="produit-associer-section-marchand" style="display: flex">

    </div>
</div>

</div>
</div>
    <!-- row end  -->
</div>
</div>
<div class="modal-footer footer_mod_recapj" style="display:none">
    <button type="button" class="btn btn-xs" onclick="Passer_au_panier_rapide()" style="height: 32px">
        <img src="{{asset('assets/images/icones-vendeurs2/icones-menu/paiement.svg')}}" />
    </button>
    <button type="button" style="font-size: 12px;" class="btn btn-success btn-xs" id="faireUneOffre">
        <img src="{{asset('assets/recap_produit/icons/Negociation.svg')}}" />
    </button>
    <button type="submit" style="font-size: 12px;" id="ajouter_panier" class="btn btn-primary btn-xs" onclick="ajout_panier()">
        <img id="imgButon0" src="{{asset('assets/recap_produit/icons/Chariot.svg')}}" /> <label style="margin-bottom: 0px;" id="aa">Ajouter au panier</label>
        <span id="spinner_ajouter" style="position: relative; top: -5px" class="spinner-border none-messaboxe" role="status" ></span>
    </button>

    <span class="article-button-option" style="display:none"><img class="enStock-svg" src="{{asset('assets/recap_produit/icons/En_stock.svg')}}" alt=""/></span>
    <span class="article-button-option"><img class="partager-svg" src="{{asset('assets/recap_produit/icons/Partage.svg')}}" onclick="showSocialShare()" alt=""/></span>
    <span class="article-button-option"><img class="favori-svg" onclick="ajout_favori()" id="ajouter_favori" src="{{asset('assets/recap_produit/icons/Favoris_no.svg')}}" alt=""/></span>
    <span class="article-button-option" style="display:none"><img class="comparer-svg" src="{{asset('assets/recap_produit/icons/Comparer.svg')}}" alt=""/></span>
</div>

{{-- success message after adding to basket  --}}
<div class="box-bottom new_produit" id="ajouter_au_panier_success" style="position: absolute; margin-top: 630px;">
<p>
    Un nouvel article a été ajouté. Vous avez maintenant <span class="article-panier-number-underline" style="text-decoration: underline" onclick="document.getElementById('voir_panier').click()"><span id="pp"></span> articles</span> dans votre panier.
</p>
</div>

<div class="box-bottom new_produit" id="ajouter_au_panier_success_mofif" style="position: absolute; margin-top: 630px;">
<p>
    Votre article a été modifié avec succès.
</p>
</div>

<div class="box-bottom2 old_produit" id="ajouter_au_panier_echec">
<p>
    La modification de cet article a été efectué avec succès.
</p>
