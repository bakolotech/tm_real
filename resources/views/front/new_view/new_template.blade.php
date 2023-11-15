<style>

    .prepare_facebook {
        width: 1200px;
        height: 630px;
        display: flex;
        align-items: center;
        justify-content: center;
        flex-direction: column;
        margin-top: 20px;
    }

    .main-top-zone {
        height: 630px;
        width: 1200px;
        display: flex;
        column-gap: 10px;
        border-radius: 6px;
    }

    .main-bottom-zone {
        height: 10px;
        width: 600px;
        background-color: #1A7EF5
    }

    .btn-partager {
        background-color: rgba(70, 70, 250, 0.856);
        border: transparent;
        height: 41px;
        color: #fff;
        width: 120px;
        border-radius: 6px;
        padding-top: 5px;
        padding-bottom: 5px;
        margin-top: 20px;
    }


    .btn-partager:hover {
        cursor: pointer;
    }

    .left-zone {
        display: flex;
        flex-direction: column
    }

    .right-zone {
        /* border: 1px solid #D8D8D8 */
    }


    .main-child {
        width: 590px;
        height: 610px;
    }

    .left-top-element { /* menu top  */
        height: 50px;
        width: 590px;
        background-color: #f5f5f5;
        font-size: 24px;
        padding-top: 1px;
        border-radius: 6px;
    }

    .left-top-element i {
        color: #0d6efd;
        font-size: 24px !important;
        position: relative;
        top: 4px !important;
    }

    .left-top-element img {
        position: relative;
        top: 3px;
        height: 20px;
    }

    .left-bottom-element { /* bottom image section */
        width: 295px;
        height: 280px;
        display: flex;
        margin-top: 5px;
    }

    .case-img-p {
        height: 100px;
        width: 100px;
        border-radius: 6px;
        background-color: #D8D8D8;
        margin-left: 4px;
        margin-top: 4px;
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .grand-image {
        box-sizing: border-box;
        height: 572px;
        width: 480px;
        border: 1px solid #1A7EF5;
        border-radius: 0 6px 6px 0;
        display: flex;
        align-items: center;
        justify-content: center;
        flex-direction: column;
        padding-top: 5px;
        padding-left: 5px;
        padding-right: 5px;
    }

    .grand-image-img {
        box-sizing: border-box;
        height: 480px;
        width: 480px;
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .grand-image-image {
        height: auto;
        max-height: 98%;
        width: auto;
        max-width: 96%;
    }

    .nouveaute-preview {
        color: #D0021B;
        border: 1px solid #D0021B;
        font-family: Roboto;
        font-size: 22px;
        font-weight: 500;
        letter-spacing: 0;
        line-height: 13px;
        background-color: transparent;
        height: 40px;
        width: 106px;
        padding: 0px;
        border-radius: 5px;
        position: relative;
        top: 3px;
    }

    .article-title-facebook {
        height: 48px;
        width: 600px;
        color: #191970;
        font-family: Roboto;
        font-size: 20px;
        font-weight: 500;
        letter-spacing: 0;
        line-height: 20px;
        position: relative;
        top: 2px;
        left: 5px;
        font-size: 24px;
    }

    .right-start-ref-zone {
        display: flex;
        margin-top: 5px;
    }

    .right-bottom-zone {
        margin-bottom: 10px;
        display: flex;
        justify-content: flex-start;
        align-items: center;
        position: relative;
        top: 5px;
    }

    .icon-section-preview {
        display: flex;
        justify-content: center;
        align-items: center;
        padding: 0px !important;
        top: -5px;
        width: 110px;
    }

    .text-section-revue-preview {
        margin-right: 5px;
        padding: 0px !important;
        margin-left: 5px;
        margin-top: 12px;
        font-size: 20px;
        font-family: Roboto;
        position: relative;
        top: -4px;
    }

    .ref-section-revue-preview span {
        color: #191970;
        font-family: Roboto;
        font-size: 20px !important;
        font-weight: 500;
        letter-spacing: 0;
        line-height: 24px;
    }

    .preview-prix-section-facebook {
        height: 100px;
        width: 566px;
        background-color: #F5F5F5;
        border-top: 1px solid #9B9B9B;
        border-bottom: 1px solid #9B9B9B;
        margin-top: 10px;
    }

    .preview-prix-element-facebook {
        color: #191970;
        text-align: center;
        color: #191970;
        font-family: Roboto;
        font-size: 48px;
        font-weight: 500;
        letter-spacing: 0;
        line-height: 28px;
        margin-top: 37px;
    }

    .case-img-p .cadre-div-p {
        display: flex;
        justify-content: center;
        align-items: center;
    }

    .cadre-div-p {
        box-sizing: border-box;
        height: 114px;
        width: 112px;
        border: 1px solid #ccc !important;
        border-bottom: none;
        border-right: none;
    }

    .right-bottom-element-2 {
        height: 100px;
        width: 566px;
        background-color: #b5d6fd;
        display: flex;
        justify-content: center;
        align-items: center;
        flex-direction: row;
        box-sizing: border-box;
        border: 1px solid #D8D8D8;
        border-radius: 6px;
        background-color: #FFFFFF;
        position: relative;
        top: 35px !important;
    }

    .custom-circle-element {
        height: 6px !important; width: 6px !important; font-size: 8px;
        margin-right: 5px; color: #00b517;
        background-color: #00b517;
        border-radius: 50%;
    }

    .article-associe-preview {
        height: 14px;
        display: flex;
        justify-content: center;
        align-items: center;
        position: absolute;
        margin-bottom: 110px;
        width: 236px;
        left: 60px;
        background-color: #ffffff;
        font-size: 20px;
        font-family: roboto;
    }

    .img-card-petit-p {
        width: auto;
        height: auto;
        max-height: 100px;
        max-width: 100px;
    }

    .youtube-icon {
        height: auto;
        width: auto;
        max-height: 50px;
        max-height: 50px;
    }

    .orange-color {
        box-sizing: border-box;
        height: 24px ;
        width: 24px;
        color: #FF9500;
        padding: 0px !important;
        margin: 0px !important;
    }

    .gray-color {
        box-sizing: border-box;
        height: 24px ;
        width: 24px;
        color: #D8D8D8;
        padding: 0px !important;
        margin: 0px !important;
    }

    #refReference {
        position: relative;
        top: 0px;
    }

</style>


<style>

#quantite-facebook {
    background-color: #F8F8F8;
    text-align: center;
    border: none;
    outline: none;
    width: 35px;
    font-size: 20px !important;
}
/* Firefox */
input[type=number] {
    -moz-appearance: textfield;
}

/* Chrome */
input::-webkit-inner-spin-button,
input::-webkit-outer-spin-button {
    -webkit-appearance: none;
    margin:0;
}

/* Opéra*/
input::-o-inner-spin-button,
input::-o-outer-spin-button {
    -o-appearance: none;
    margin:0
}

.z-exp-1-icones-bis {
    width: auto;
    border-radius: 6px;
    background-color: #D8D8D8;
    background: linear-gradient(180deg, #FFCD18 0%, #FF9F0A 100%);
}

.icon-last-level {
    width: 30px;
    padding-left: 8px;
}

.produit-option-supp {
    display: flex;
    justify-content: flex-start;
    align-items: center;
    height: 29px !important;
}

.libelle-option-p {
    height: 15px;
    width: 56px;
    height: 12px;
    color: #191970;
    font-family: Roboto;
    font-size: 12px;
    font-weight: 500;
    letter-spacing: 0;
    text-align: center;
    position: relative;
    left: -5px;
}

.flex-container{
    display: flex;
    flex-direction: row;
    background-color: #F8F8F8;
    justify-content: space-evenly;
    align-items: center;
    align-content: center;
    color: #FFFFFF;
    gap: 15px 0px;
}

.flex-items{
    flex-grow: 1;
    background-color: #191970;
    cursor: pointer;
}

.flex-items1{
    flex-grow: 2;
    background-color: #9B9B9B;
    cursor: pointer;
}

</style>

<style>
    .form-label-products-facebook {
        color: #9B9B9B;
        font-family: Roboto;
        font-size: 24px;
        letter-spacing: 0;
        line-height: 40px;
    }


.right-bottom-element-1 {
        height: 290px;
        width: 566px;
        background-color: #fff;
        padding-top: 10px;
    }

.produit-caracteristique-detail-facebook {
    box-sizing: border-box;
    height: 62px;
    width: 270px;
    border: 1px solid #dddcdc;
    border-radius: 6px;
    background-color: #F8F8F8;
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin-right: 14px;
}


.produit-caracteristique-detail-facebook button {
    background-color: transparent;
    border: none;
}

.select-product-facebook {
    box-sizing: border-box;
    height: 62px;
    width: 270px;
    border: 1px solid #9B9B9B;
    border-radius: 6px;
    background-color: #F8F8F8;
    -webkit-appearance: none;
    -moz-appearance: none;
    background-image: url(ic_chevron_right.svg);
    background-repeat: no-repeat;
    background-position-x: 160px;
    background-position-y: center;
    border: 1px solid #dfdfdf;
    padding-left: 20px !important;
    padding-top: 20px !important;
    font-size: 20px !important;
}

.zone-tm-logo {
    height: 55px;
}

.zone-tm-logo img {
    width: 100%;
    height: 32px;
}

.left-top-element i {
    font-family: Roboto;
    font-size: 11px;
    position: relative;
    top: 1px;
}

.tm-logo-zone {
    height: 82px;
    width: 100%;
    position: relative;
    display: flex;
    align-items: center;
    justify-content: center;
    margin-top: 3px;
    margin-bottom: 4px;
    position: relative;
    top: -10px !important;
}

.tm-logo-zone img {
    width: auto;
    height: auto;
    max-height: 75px;
}

.tm_text_logo {
    font-family: Roboto;
}

.produit-carateristique-row1-facebook {
    position: relative;
    top: 10px;
}

.produit-carateristique-row2-facebook {
    position: relative;
    top: 20px;
}

.p-img {
    height: 572px;
}

.produit-associer-section-marchand a {
    width: 84px;
    height: 84px;
}

.produit-associer-section-marchand a img {
    width: 100%;
    height: 100%;
}

</style>

    <div class="containerd" style="display: flex; align-items: center; justify-content: center; ">
    <div class="prepare_facebook">

    <div class="main-top-zone" id="zone-face-popup">
        <div class="left-zone main-child">

        <div class="left-top-element">
           <i style="margin-left: 10px;">Univers téléphonie, High-Tech <img src="{{asset('assets/images/icons/ic_chevron_right.svg')}}" alt=""/></i> <i>Téléphonie</i>
        </div>

        <div class="left-bottom-element">

        <div class="p-img" >

        <div class="cadre-div-p">
            <div class="case-img-p" style="background-color: #fff">
                <img class="img-card-petit-p" src="/{{ $image_principal }}" alt="" id="image_autre2" style="">
            </div>
        </div>

        @foreach ($produit_image as $image)
        <div class="cadre-div-p">
            <div class="case-img-p" style="background-color: #fff">
                <img class="img-card-petit-p" src="/{{ $image }}" alt="" id="image_principal1">
            </div>
        </div>
        @endforeach

        @if(count($produit_image) < 3)
            @for($i = 0; $i < 3 - count($produit_image); $i++)
            <div class="cadre-div-p">
                <div class="case-img-p">

                </div>
            </div>
            @endfor
        @endif

        <div class="cadre-div-p">
            <div class="case-img-p" style="background-image: url('/{{ $video_url }}'); background-size: 100% contain; background-position: center;">
                <img class="youtube-icon" style="height: 45%; width: 45%; background-color: #fff; border-radius: 6px; border-radius: 6px" src="/assets/images/tm_yt_icon1.svg" alt="">
            </div>
        </div>

        </div>

        <div class="grand-image">
            <div class="grand-image-img" >
                <img class="grand-image-image" src="/{{ $view_image }}" alt="" id="image_principal">
            </div>
            <div class="tm-logo-zone">
                {{-- <div class="tm_text_logo">Seulement sur toulemarket</div>--}}
                <img src="/assets/images/tm_share_logo.png" alt="">
            </div>
            {{-- <img class="grand-image-image" src="/uploads/637000be86b9f30923" alt="" id="image_principal"> --}}
        </div>


        </div>

        </div>

        <div class="right-zone main-child" style="margin-left: 10px">

        <div class="right-top-element-entete">

        <div class="right-element-libelle" >
            <button class="nouveaute-preview" style="display: nonep" >Nouveau</button> <span class="article-title-facebook" >{{ $libelle }}</span>
        </div>

        <div class="right-start-ref-zone">

        <div class="icon-section-preview">
            <svg class="orange-color" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-star-fill" viewBox="0 0 16 16">
            <path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"/></svg>

            <svg class="orange-color" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-star-fill" viewBox="0 0 16 16">
            <path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"/></svg>

            <svg class="orange-color" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-star-fill" viewBox="0 0 16 16">
            <path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"/></svg>

            <svg class="gray-color" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-star-fill" viewBox="0 0 16 16">
            <path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"/>
            </svg>

            <svg class="gray-color" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-star-fill" viewBox="0 0 16 16">
            <path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"/></svg>
        </div>

        <div class="text-section-revue-preview">
            <span>3.1 | 0 livraisons</span>
        </div>

        <div class="ref-section-revue-preview" style="position: relative; top: 10px">
            <span style="margin: 0px; padding: 0px; color: #9B9B9B!important; font-size: 10px" id="refReference">Référence : {{ $reference}}</span>
            <span id="reference_produit_client" ></span>
        </div>

        </div>

        <div class="preview-prix-section-facebook" style="display: flex; justify-content: center; align-items: center">
            <div class="tm-price-section-1 " >
                <p id="prix_total" class="preview-prix-element-facebook text-align-center"> {{ number_format($prix, 0, ' ', ' ') }} <span id="currency3">Fcfa</span></p>
                <input type="hidden" id="current_price" value="" />
            </div>
        </div>

        </div>

        <div class="right-bottom-element-1" >
            <div class="produit-carateristique-row1-facebook">
                <form action="/action_page.php" autocomplete="off">
                    <div class="quantite-caracteristique" style="display: flex; ">
                        <div>
                            <span class="form-label-products-facebook">Quantité</span>
                            <div id="p_input" class="btn-group produit-caracteristique-detail-facebook" role="group" aria-label="Basic example" style="">
                                <button onclick="moins()" type="button"><img src="/assets/recap_produit/form-icon/moins.svg" style="position: relative; right: -8px; height: 30px; width: 30px"></button>

                                <input type="text" id="quantite-facebook" value="1" minlength="1" onblur="verifier_input()" onkeyup="make_calculation()">
                                <button onclick="plus()" type="button"><img src="/assets/recap_produit/form-icon/Plus.svg" style="position: relative; right: 8px; width: 30px; height: 30px"></button>
                            </div>
                        </div>

                        @if(count($caracteristiques) > 0)
                        <div>
                            <span for="email" class="form-label-products-facebook" id="carac_produit-Label0">{{$caracteristiques[0]->lib_caract}}</span>
                            <select class="select-product-facebook" id="carac_produit0" onchange="verifier_article()" style="padding-top: 6px"><option>{{$caracteristiques[0]->lib_valeur}}</option></select>
                        </div>
                        @endif

                    </div>
                </form>
            </div>

            <div class="produit-carateristique-row2-facebook">
                <form action="/action_page.php" autocomplete="off">
                    <div class="" style="display: flex;">

                    @if(count($caracteristiques) > 1)
                    <div style="margin-right: 10px; padding: 0px !important;">
                        <span for="email" class="form-label-products-facebook" id="carac_produit-Label1">{{$caracteristiques[1]->lib_caract}}</span>
                        <select class="select-product-facebook" id="carac_produit1" onchange="verifier_article()" style="padding-top: 6px" ><option>{{$caracteristiques[1]->lib_valeur}}</option></select>
                    </div>
                    @endif

                    @if(count($caracteristiques) > 2)
                    <div>
                        <span for="email" class="form-label-products-facebook" id="carac_produit-Label2">{{$caracteristiques[2]->lib_caract}}</span>
                        <select class="select-product-facebook" id="carac_produit2" onchange="verifier_article()" style="padding-top: 6px" ><option>{{$caracteristiques[2]->lib_valeur}}</option></select>
                    </div>
                    @endif

                    </div>
                </form>
            </div>

        </div>

        <div class="right-bottom-element-2" style="position: relative; top: 23px !important">
        <div class="article-associe-preview">
            <span class="fass fa-circled custom-circle-element"></span> Articles associés</span>

            <span style="position: relative; top: -4px;padding: 0px !important; margin: 0px !important;">
        </div>

        <div class="produit-associer-section-marchand" style="display: flex">

        @if($article_associes)
            @foreach($article_associes as $article_assoc)
            <a>
                <img src="/storage/images/rayons/{{$article_assoc->logo}}" alt="B">
            </a>
            @endforeach
        @endif

        </div>

        </div>

    </div>
    </div>


    </div>
    </div>
