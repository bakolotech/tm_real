<div class="mobile-description-caracteristique s-none-client" style="position: absolute">
    <span class="mobile-btn-close-1" onclick="closeMobileCaracteristiques()">✕</span>
    <div class="slide_down_btn"></div>
    <div class="mobile-description_title">Description</div>
    <p class="mobile-caracteristique-data" id="mobile-caracteristique-data">

    </p>
</div>
<style>
    #quantite_mobile {
        background-color: #F8F8F8;
        text-align: center;
        border: none;
        outline: none;
        width: 75px;
}

#in_stock_notification:hover {
    fill: #00b517;
    /* color: #025816 */
}

#in_stock_notification:hover path {
    fill: #00b517; /* Replace 'your_hover_color' with the desired color value */
}

.prevent_notif_clicked {
    pointer-events: none;
}

</style>
<div class="mobile-description-caracteristique2 s-none-client" style="position: absolute">
    <span class="mobile-btn-close-1" onclick="closeMobileCaracteristiques()">✕</span>
    <div class="slide_down_btn"></div>
    <div class="mobile-caracteristique_title">Caractéristiques</div>
    <table  class="table table-striped " id="tab_caracteristiquesj">
        <tbody id="TableContainerMobile">

        </tbody>
    </table>
</div>
<div class="main-panier-mobile-header" style="width: 100%; height: 45px">
<div class="mobile-libelle-header">

    <div class="panier-mobile-nouveau-ref" >
        <div class="panier-mobile-nouveau-section">
            <button class="nouveaute">Nouveau</button>
        </div>
        {{-- <div class="panier-mobile-ref-class">Ref. <span id="panier-mobile-ref_prod"></span></div> --}}
        <input type="hidden" id="mobile_active_image_to_share" />
    </div>

    <div class="panier-mobile-libelle-prod">
        <span id="mobile_prod_title" class="mobile_article-title"></span>
    </div>

</div>

<span class="mobile-btn-close" onclick="closeMobilePanierPopup()">&#x2715;</span>

</div>

<div class="mobile-content-body">

<div class="mobile-prod-image-section" >

    <div class="mobile-prod-image-principal" id="mobile-produit-image-principal" >

        <img class="mobile-img-card" src="" alt="" id="mobile_image_principal" >
        <div class="mobile_tm_show_p_product-client s-none-client" style="width: 276px; height: 276px">
            <iframe id="mobile_client_video_preview" class="img-card" width="276px" height="276px" src="" style="width: 276px important; height: 276px !important;">
            </iframe>
        </div>

        <div class="btn-group_bis2 btn-icons" style="position: absolute; margin-top: 245px;margin-left: 215px;">
            <span class="article-button-option"><img class="partager-svg" src="/assets/recap_produit/icons/Partage.svg" onclick="showSocialShare()" alt=""></span>
            <span class="article-button-option"><img class="favori-svg" onclick="ajout_favori()" id="ajouter_favori" src="/assets/recap_produit/icons/Favoris_no.svg" alt=""></span>
        </div>

    </div>
</div>

<div class="mobile-prod-images" style="display: flex">

    <div class="panier-mobile-cadre-div" style="border-radius: 0px 0px 0px 6px">
        <div class="mobile-prod-small-image mobile_petit-cadre" id="mobile-autre-image_principal" style="background-color: #fff !important">
            <img class="img-card-petit" src="" alt="" id="mobile_image_autre0" >
        </div>
    </div>

    <div class="panier-mobile-cadre-div">
        <div class="mobile-prod-small-image mobile_petit-cadre" id="mobile-autre-image2">
            <img class="img-card-petit" src="" alt="" id="mobile_image_autre1" >
        </div>
    </div>

    <div class="panier-mobile-cadre-div">
        <div class="mobile-prod-small-image mobile_petit-cadre" id="mobile-autre-image3">
            <img class="img-card-petit" src="" alt="" id="mobile_image_autre2" >
        </div>
    </div>
    <div class="panier-mobile-cadre-div">
        <div class="mobile-prod-small-image mobile_petit-cadre" id="mobile-autre-image3">
            <img class="img-card-petit" src="" alt="" id="mobile_image_autre3" >
        </div>
    </div>

    <div class="panier-mobile-cadre-div" style="border-radius: 0px 0px 6px 0px;">
        <div class="mobile-prod-small-image mobile_petit-cadre mobile-tm_vid_icon" id="mobile-autre-image_video4">

        </div>
    </div>

</div>

<div class="mobile-price-detail-section" style="display: none">
    <div class="mobile-price-left-section" style="width: 76px">
        <div class="mobile-prod-start" style="width: 50px">
            <div class="icon-section" style="display: flex; justify-content: center; align-items: center; padding: 0px !important; margin-right: 0px !important">
                <svg class="orange-color" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16">
                    <path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"></path>
                    </svg>
                <svg class="orange-color" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16">
                    <path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"></path>
                    </svg>

                <svg class="orange-color" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16">
                    <path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"></path>
                    </svg>

                <svg class="gray-color" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16">
                    <path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"></path>
                    </svg>

                <svg class="gray-color" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16">
                    <path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"></path>
                    </svg>

            </div>
        </div>
        <div class="mobile-prod-livraison" style="font-size: 10px">0 livraisons</div>
    </div>

    <div class="mobile-price-midle-line"></div>

    <div class="mobile-price-right-section">
        <input type="hidden" id="current_price_mobile" value="" />
        <div class="mobile-prod-livraison-infos">
            Livraison en 45 min - Gratuite dès 20 000 Fcfa
        </div>

    </div>

</div>

<div class="mobile-prod-caracteristique-section">
    <div class="mobile-prod-quantity-and-small-icons" >
        <div class="mobile-prod-small-icons">
            <div class="mobile_select-product-bis">
                <span for="email" class="form-label-products-mobile" id="mobile-carac_produit-Label0bis" style="position: absolute; margin-top: -21px; margin-left: -111px" >Prix</span>
                <div id="mobile_prix_total_2" class="mobile-prod-price mobile_preview-prix-element" style=" ">5000 FC</div>
            </div>
        </div>

        <div class="mobile-prod-quantity" style="position: relative; left: 67px">
        <div id="p_input" class="btn-grouph produit-caracteristique-detail-mobile"  style="width: 137px !important; height: 36px">
            
            <div>
                <span onclick="moins_mobile()" >
                    <img src="/assets/recap_produit/form-icon/moins.svg" style="position: relative; ">
                </span>
            </div>

            <div>
                <input type="text" id="quantite_mobile" value="1" minlength="1" onblur="verifier_input()" onkeyup="make_calculation()">
            </div>

            <div>
                <span onclick="plus_mobile()" type="button">
                    <img src="/assets/recap_produit/form-icon/Plus.svg" style="position: relative; ">
                </span>
            </div>

        </div>
        </div>
        
    </div>

    <div class="mobile_not_in_stock s-none-client ">
        <div class="produit_not_in_stok_mobile">

            <div class="not_stock_line_1_mobile" style="margin-bottom: 5px">
               <span class="in_stock_red_oval"></span> Ce produit n'est plus en stock?
            </div>

            <div class="not_stock_line_2_mobile">
                Me prevenir si disponible
                <span style="margin-left: 5px" onclick="load__invite_resgister_login()" id="notif_btn_parent">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-bell" viewBox="0 0 16 16" id="in_stock_notification">
                        <path d="M8 16a2 2 0 0 0 2-2H6a2 2 0 0 0 2 2zM8 1.918l-.797.161A4.002 4.002 0 0 0 4 6c0 .628-.134 2.197-.459 3.742-.16.767-.376 1.566-.663 2.258h10.244c-.287-.692-.502-1.49-.663-2.258C12.134 8.197 12 6.628 12 6a4.002 4.002 0 0 0-3.203-3.92L8 1.917zM14.22 12c.223.447.481.801.78 1H1c.299-.199.557-.553.78-1C2.68 10.2 3 6.88 3 6c0-2.42 1.72-4.44 4.005-4.901a1 1 0 1 1 1.99 0A5.002 5.002 0 0 1 13 6c0 .88.32 4.2 1.22 6z"/>
                    </svg>
                </span>
            </div>
            <div class="not_stock_line_3" style="display: none">
        
                <div class="in_stock_input" style="display: none">
                    <input class="in_stock_input_field_mobile" id="in_stock_input_field_mobile" type="text" placeholder="Adresse e-mail ou numéro de portable">
                </div>
        
                <div class="in_stock_btn">
                    <button class="in_stock_btn_element_mobile">Envoyer</button>
                </div>
        
            </div>
        
        </div>
    </div>

    <div class="mobile-prod-inputs-section" style="display: none">
    <div class="produit-carateristique-row2">
        <form action="/action_page.php" autocomplete="off">
            <div class="" style="display: flex;">
                <div style="margin-right: 8px; padding: 0px !important;">
                    <span for="email" class="form-label-products-mobile" id="mobile-carac_produit-Label1" style="position: absolute">@Caractéristique 1</span>
                    <select class="mobile_select-product-bis" id="mobile-carac_produit1" onchange="verifier_article()">
                </select>
            </div>

            <div>
                <span for="email" class="form-label-products-mobile" id="mobile-carac_produit-Label2" style="position: absolute" >@Caractéristique 2</span>
                <select class="mobile_select-product-bis" id="mobile-carac_produit2" onchange="verifier_article()">

                </select>
            </div>

            </div>
        </form>
    </div>

    </div>

</div>


<div class="panier_mobile_description_caract " style="display: flex; column-gap: 15px;">

    <div class="panier_mobile_description_caract_link" onclick="showCaracteristique()">
        <span>
            Caractéristiques
        </span>

        <span class="mobile_description_caracteristique_plus" style="right: 150px">&#43;</span>
    </div>

    <div class="panier_mobile_description_caract_link" onclick="showDescription()">
        <span>
            Descriptions
        </span>
        <span class="mobile_description_caracteristique_plus">
            &#43;
        </span>
    </div>

</div>

<div class="mobile-articles-associee" >
<div class="rowf infos-articles-mobile" style="position: relative; left: 1px;">
<div class="article-associe">
    <span style="position: relative; top: 10px; padding: 0px !important; margin: 0px !important; left: -39px;">
        <i class="fas fa-circle" style="height: 6px; width: 6px; font-size: 8px; margin-right: 5px; color: #00b517"></i> Articles associés</span>
</div>
<div class="produit-associer-section-marchand" style="display: flex"><a title="Informatique &amp; Tablettes"><img src="/storage/images/rayons/logo/VMzny4f0Nf8LljVj3V2xlKL7ELZs2dIPRCrX9HKA.svg" alt="B"></a></div>
</div>
</div>

</div>

<div class="panier-prod-footer-btn" style="position: relative; top: 13px;">
<div class="modal-footer_real_mobile footer_mod_recapj" style="display:nones">

<button type="button" class="btn btn-xs" onclick="Passer_au_panier_rapide()" style="border: 1px solid #D0021B; height: 32px">
    <img src="{{asset('assets/images/icones-vendeurs2/icones-menu/paiement.svg')}}" />
</button>

<button type="submit" style="font-size: 12px;" id="ajouter_panier_mobile" class="btn btn-primary btn-xs" onclick="ajout_panier_mobile()">
    <img id="imgButon0_mobile" src="{{asset('assets/recap_produit/icons/Chariot.svg')}}" /> 
    <label style="margin-bottom: 0px;" id="aa_mobile">Ajouter au panier</label>
    <span id="spinner_ajouter_mobile" style="position: relative; top: -5px" class="spinner-border none-messaboxe" role="status" ></span>
</button>

<button type="button" style="font-size: 12px;" class="btn btn-success btn-xs" id="faireUneOffre">
    <img src="{{asset('assets/recap_produit/icons/Negociation.svg')}}" />
</button>

</div>


</div>

<script>
    function ouvre_login() {
        $('#inviteRegisterLoginModal').modal({
            backdrop: 'static',
            keyboard: false
        })
        $('#inviteRegisterLoginModal').modal('show')
    }
</script>
