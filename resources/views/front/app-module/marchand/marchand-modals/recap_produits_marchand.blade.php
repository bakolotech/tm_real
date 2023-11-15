@extends('front.layout.layout1')
@section('layout1')

	<div class="overlay">

<style>
    .form-label-products {
        color: #9B9B9B;
        font-family: Roboto;
        font-size: 15px;
        letter-spacing: 0;
    }
    .recap-modification-produit {
        position: relative;
        margin-left: auto;
        margin-right: auto;
        display: table;
        overflow-y: auto;
        overflow-x: auto;
        min-width: 300px;
        left: -150px;

    }
    .btn-close-detail-produit{
            height: 34px;
            width: 34px;
            background-image: url('close.svg') !important;
            background-size:  24px;
            background-repeat: no-repeat; /* Do not repeat the image */
            border: 1px solid #fff;
            background-color: #1A7EF5;
            opacity: 1;
            border-radius: 50%;
            position: absolute;
            top: -19px;
            right: -15px;
            color: #fff;
        }

        .btn-close-detail-produit:hover {
            opacity: 1 !important;
        }

</style>
<style>
    .ajout-updated {
            height: 18px;
            width: 105px;
            color: #FFFFFF;
            font-family: Roboto;
            font-size: 13px;
            font-weight: 500;
            letter-spacing: 0.29px;
            line-height: 18px;
            text-align: center;
            position: relative;
            top: -2px;
        }

    .bouton-modifier .modifier-panier {
        box-sizing: border-box;
        height: 37px;
        width: 230px;
        border: 1px solid #1A7EF5;
        border-radius: 6px;
        background-color: #FFFFFF;
    }

    .bouton-modifier .modifier-panier span {
        height: 18px;
        width: 189px;
        color: #1A7EF5;
        font-family: Roboto;
        font-size: 14px;
        font-weight: 500;
        letter-spacing: 0.31px;
        line-height: 18px;
    }

    .bouton-modifier .ajouter-panier-modifier {
        height: 37px;
        width: 234px;
        border-radius: 6px;
        background-color: #1A7EF5;
        border: none;

    }

    .bouton-modifier .ajouter-panier-modifier span {
        height: 18px;
        width: 193px;
        color: #FFFFFF;
        font-family: Roboto;
        font-size: 14px;
        font-weight: 500;
        letter-spacing: 0.31px;
        line-height: 18px;
    }
#offre {
        height: 18px;
        width: 89px;
        color: #FFFFFF;
        font-family: Roboto;
        font-size: 13px;
        font-weight: 500;
        letter-spacing: 0.29px;
        line-height: 18px;
        text-align: center;
    }

    .modifButon {
        position: relative;
        top: -2px;
    }

    #faireoffre {
        position: relative;
        left: -3px;
    }

.desactive {
    background-color: #9B9B9B !important;
    border: 0px !important;
}
.desactive #span {
    color: #FFFFFF;
}
</style>
<style>
    #quantite_marchand {
        background-color: #F8F8F8;
        text-align: center;
        border: none;
        outline: none;
        width: 75px
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

    .breadcrumb li {
            height: 11px;
        }

        .breadcrumb li img {
            margin-left: 6px;
            margin-right: 6px;
        }

        .breadcrumb li a {
            font-family: Roboto;
            font-size: 12px;
            font-style: italic;
        }

        .text-active {
            font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;
            font-size: 12px;
            font-style: italic;
            font-style: italic;
        }

        .breadcrumb a {
            text-decoration: none;
        }

        .img-card-petit-p {

        }

        .img-card-petit-p{
            width: 100%;
            height: auto;
        }

        .petit-cadre-preview {
            height: 60px;
            width: 60px;
            border-radius: 6px;
            background-color: #D8D8D8;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .petit-cadre-preview .img-card-petit {
            height: auto;
            width: 100% !important;
            border-radius: 6px;
        }

        .show-detail-petit-section-img {
            display: flex; flex-direction: column;
            justify-content: flex-start; align-items: flex-start;
        }

        .tm_show_detail_petit-section{
            height: 403px;
            width: 68px !important;
            border-radius: 6px 0 0 6px;
            border-right: none;
            padding: 0px 0px 0px 0px;
            margin-left: 15px;
        }

        .tm_show_detail_petit-section .tm_show_recap_cadre-div {
            display: flex;
            justify-content: center;
            align-items: center;
            border-right: none !important;
        }

        .tm_img_top_none {
            border-top: none;
        }

        .tm_img_bottom_ok {
            border-bottom: none;
        }

        .tm_show_recap_cadre-div {
            box-sizing: border-box;
            height: 68px;
            width: 68px;
            border: 1px solid #ccc;
            border-bottom: none;
        }

        .tm_show_recap_cadre-div:first-child{
             border-radius: 6px 0px 0px 0px;
        }

        .tm_show_recap_cadre-div:last-child{
             border-bottom: 1px solid #ccc;
             border-radius: 0px 0px 0px 6px;
        }

        .tm_active_img_product {
            border: 1px solid #1A7EF5 !important;
        }

        .set-gray-bg {
            background-color: #ccc
        }
        
        .gros-cadre .img-card-long {
            height: 100% !important;
            width: auto !important;
            border-radius: 0 6px 6px 0;
            max-height: 100% !important;
            display: flex;
            justify-content: space-between;
            align-items: flex-end;
            align-content: flex-end;
        }

        .petit-cadre-preview .img-card-petit-long {
            height: 100% !important;
            width: auto !important;
        }

        .gros-cadre-user-long {
            justify-content: center !important;
            padding-top: 5px !important;
            padding-bottom: 5px !important;
            display: flex;
            align-items: center;
        }

</style>
<div class="modal fade" id="recapProduitMarchand" data-backdrop="static" data-keyboard="false">
	<div class="modal-dialog modal-dialog-panier" id="recap-modification-produit">
	  <div class="modal-content modal-content-panier">
        <button type="button" class="close-btn" data-dismiss="modal" aria-label="Close" style="z-index: 15000; position:absolute; right: -16px; top: -18px" onclick="closeMarchandPoppup()">
            <img src="{{ asset('assets/images/close-btn.svg') }}" alt="">
        </button>
		<div class="line-middle"></div>
		<div class="modal-body modal-body-panier">
			<div class="content-container" >

				<div class="left-box">
					<div class="menu-section" style="border: none !important">
						<nav>
							<ol class="breadcrumb" style="background: transparent !important; position:relative; top: 10px; left: 5px">
							  <li ><a href="/"> <i class="fa-thin fa-album-collection-circle-user"></i>Acceuil<img src="{{asset('assets/images/icons/ic_chevron_right.svg')}}" alt=""/></a></li>
							  <li aria-current="page">
                                <a href="#" id="produit-univer-preview">Univers alimentation
                                    </a><img src="{{asset('assets/images/icons/ic_chevron_right.svg')}}" alt=""/></li>
							  <li aria-current="page"><a href="#" id="produit-rayon-preview">Fruits légumes</a><img src="{{asset('assets/images/icons/ic_chevron_right.svg')}}" alt=""/></li>
							  <li  aria-current="page" class="text-active">Détail sur le produit</li>
							</ol>
						  </nav>
					</div>

					  <div class="img-box-section" style="display: flex; flex-direction: row; boder: 1px solid #ccc">

						<div class="tm_show_detail_petit-section show-detail-petit-section-img">
						<div class="tm_show_recap_cadre-div tm_active_img_product">
						<div class="petit-cadre-preview " style="background-color: #fff !important">
                            <img class="img-card-petit-p" src="/def.jpg" alt="" id="image_principalM1" >
                        </div>
						</div>
						<div class="tm_show_recap_cadre-div">
						<div class="petit-cadre-preview">
                            <img class="img-card-petit-p" src="/def.jpg" alt="" id="image_autreMarchand1" >
                        </div>
						</div>
						<div class="tm_show_recap_cadre-div">
						<div class="petit-cadre-preview">
                            <img class="img-card-petit-p" src="/def.jpg" alt="" id="image_autreMarchand2" >
                        </div>
						</div>
						<div class="tm_show_recap_cadre-div">
						<div class="petit-cadre-preview">
                            <img class="img-card-petit-p" src="/def.jpg" alt="" id="image_autreMarchand3" >
                        </div>
						</div>
						<div class="tm_show_recap_cadre-div">
						<div class="petit-cadre-preview">
                            <img class="img-card-petit-p" src="/def.jpg" alt="" id="image_autreMarchand4" >
                        </div>
						</div>

						<div class="tm_show_recap_cadre-div" >
						<div class="petit-cadre-preview tm_vid_icon" style="display: flex; align-items: center; justify-content: center;">

                        </div>
						</div>

					</div>

					<div class="gros-cadre" style="padding-left: 5px; padding-right: 5px;">
                    <img class="img-card" src="" alt="" id="image_principalMarchandPreview" >
                    <div class="tm_show_p_product s-none" style="width: 403px">
                        <iframe id="marchand_video_preview_big" class="img-card" width="403" height="403" src="" style="width: 403px; height: 403px">
                        </iframe>
                    </div>
					<div class="button-option">
						<div class="btn-group btn-icon" >
							<img src="{{asset('assets/recap_produit/icons/En_stock.svg')}}" alt=""/>
							<img src="{{asset('assets/recap_produit/icons/Partage.svg')}}" alt=""/>
							{{-- <img onclick="ajout_favori()" id="ajouter_favori" src="{{asset('assets/recap_produit/icons/Favoris_no.svg')}}" alt=""/> --}}
                            {{-- <img onclick="ajout_favori()" id="ajouter_favori" src="{{asset('assets/recap_produit/icons/Favoris_Selected.svg')}}" alt=""/> --}}
							{{-- <img src="{{asset('assets/recap_produit/icons/Comparer.svg')}}" alt=""/> --}}
						</div>
					</div>
					</div>
				</div>

			<div class="btn-section s-none" style="margin-top: 15px;" id="Ajouter_new">
				<div class="btn-group">

					<div class="bouton-first">
						<button type="button" class="btn" onclick="Passer_au_panier_rapide()">
							<img src="{{asset('assets/recap_produit/icons/Achat_Eclaire.svg')}}" />
						</button>
					</div>

					<div class="bouton-second">
                        <button type="submit" id="ajouter_panier" class="btn btn-primary" onclick="ajout_panier()">
                            <img id="imgButon0" src="{{asset('assets/recap_produit/icons/Chariot.svg')}}" /> <label id="aa">Ajouter au panier</label>
                            <span id="spinner_ajouter" class="" role="status" aria-hidden="true"></span>
                        </button>
					</div>

					<div class="bouton-third">
						<button type="button" class="btn btn-success">
							<img src="{{asset('assets/recap_produit/icons/Negociation.svg')}}" /> <label>Faire une offre</label>
						</button>
					</div>

				</div>

			</div>

            <div class="btn-section s-none" style="margin-top: 15px;" id="modification">
                <div class="bouton-modifier">
                    <button class="modifier-panier" id="Enregistrer_panier_nouvel" onclick="ajout_panier_modification()">
                        <img id="imgButon1" class="modifButon" src="{{asset('assets/images/icons/Mise_a_jour.svg')}}" />
                        <span id="span1">Enregistrer les modifications</span>
                        <small id="spinner_modifier" class="" role="status" aria-hidden="true" style="color: #1A7EF5"></small>
                    </button>

                    <button class="ajouter-panier-modifier desactive" id="ajouter_panier_nouvel" disabled onclick="ajouter_nouvel()">
                        <img id="imgButon2" class="modifButon" src="{{asset('assets/recap_produit/icons/Chariot.svg')}}" />
                        <span id="span2">Ajouter comme nouvel article</span>
                        <small id="spinner_ajouter_nouvel" class="" role="status" aria-hidden="true"></small>
                    </button>
                </div>
			</div>

             {{-- zone description --}}
             <textarea rows="4" cols="50" class="description-caracteristique-p" id="description_marchand_zone1" style="padding: 3px; width: 470px; height: 103px" readonly>

            </textarea>
		</div>

		<div class="right-box">
			<div class="article-libelle" style="display: flex; flex-direction: row;">
				<button class="nouveaute">Nouveauté</button>

				<span class="article-title" id="article_title_marchand">
					Chargement en cours ...
				</span>
                <input type="hidden" id="id_produit_m">
			</div>

			<div class="start-section">
				<div class="icon-section" style="display: flex; justify-content: center; align-items: center; padding: 0px !important; ">

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
					<span>3.1 | 9046 livraisons</span>
				</div>

				<div class="ref-section-revue" style="position: relative;">
					<span style="margin: 0px; padding: 0px; color: #9B9B9B!important">Référence : </span>
                    <span id="reference_marchand-bis">Chargement ...</span>
				</div>

			</div>

			{{-- <div class="infos-cout">

					<div class="infos-montant" style="display: flex; flex-direction: column; justify-content: center;">
						<span class="line-1 raillee" style="padding: 0px !important; ">120000 Fcfa</span>
						<span class="line-2" id="prix_total_m" style="padding: 0px !important; ">105.000 Fcfa</span>
                        <input type="hidden" name="" id="price_first">
                        <input type="hidden" name="" id="id_session">
					</div>
					<span class="line-cout" style="position: relative;"></span>
					<!-- <div>

					</div> -->
                    <style>
						.poids-1 {
							margin-bottom: 5px;
						}

                        .p_input {
                            border: solid #D0021B 1px;
                            animation-name: example;
                            animation-duration: 0.5s;
                            animation-delay: 0s;
                        }

                        @keyframes example {
                        0% {
                            transform: scale(1);
                        }
                        50% {
                            transform: scale(1.05);
                        }
                        }
                        100% {
                            transform: scale(1);
                        }

                        .bouton-fi1-bis {
                            box-sizing: border-box;
                            border: 1px solid #D8D8D8;
                            border-radius: 6px;
                            margin-right: 10px;
                            }

                            .bouton-fi1-bis button {
                            position: relative;
                            border: 0px solid;
                            height: 29px;
                            width: 40px;
                            background: linear-gradient(180deg, #FFCD18 0%, #FF9F0A 100%);
                            }

                            .bouton-fi1-bis button img {
                                position: relative;
                                /* top: ; */
                            }

					</style>
					<div class="infos-poid">
						<div class="poids-1">
							<span>25kg</span>
						</div>
						<div class="poids-2">
							<span class="infos-montant-poids">1200 Fcfa/kg</span>
						</div>
					</div>
			</div> --}}

            <style>
                    .section-cout-marchand-popup {
                        height: 65px;
                        width: 414px;
                        background-color: #F5F5F5;
                        border-top:1px solid #9B9B9B;
                        border-bottom:1px solid #9B9B9B;
                        margin-top: 10px;
                    }

                    .line-red-p {
                        box-sizing: border-box;
                        border: 1px solid #D0021B;
                        transform: rotate(45deg)
                    }

                    .bouton-fi1-bis {
                    box-sizing: border-box;
                    border: 1px solid #D8D8D8;
                    border-radius: 6px;
                    margin-right: 10px;
                    }

                    .bouton-fi1-bis button {
                    position: relative;
                    border: 0px solid;
                    height: 29px;
                    width: auto;
                    background: linear-gradient(180deg, #FFCD18 0%, #FF9F0A 100%);
                    }

                    .bouton-fi1-bis button img {
                        position: relative;
                    }

                    .s-none-p {
                        height: 12px;
                        color: #191970;
                        font-family: Roboto;
                        font-size: 12px;
                        font-weight: 500;
                        letter-spacing: 0;
                        text-align: center;
                        position: relative;
                    }

                    .z-exp-2 {
                    height: 29px;
                    width: 414px;
                    display: flex; column-gap: 15px;
                    margin-top: 5px
                }

                .z-exp-111 {
                    box-sizing: border-box;
                    display: flex;
                    justify-content: center;
                    align-items: center;
                    height: 29px;
                    width: 273px;
                    border: 1px solid #191970;
                    border-radius: 6px;
                    background-color: rgba(128,195,243,0.15);
                    position: relative;
                    top: -0.29px;
                    font-size: 12px;
                }

                .z-exp-1-icones-bis {
                    width: 150px;
                    border-radius: 6px;
                    background-color: #D8D8D8;
                    padding-left: 9px;
                    /* padding-top: 7.5px; */
                    background: linear-gradient(180deg, #FFCD18 0%, #FF9F0A 100%);
                }

                .icon-last-level {
                    width: 30px;
                }

                .produit-option-supp {
                    display: flex; justify-content: flex-start; align-items: center
                }

                .libelle-option-p {
                    height: 15px;
                    width: 86px;
                }

                .preview-article-retour {
                    font-size: 12px;
                }

            </style>

            <div class="section-cout-marchand-popup" style="display: flex; justify-content: center; align-items: center">

                <div class="tm-price-section-1 " >
                    <p id="prix_total_m" class="preview-prix-element text-align-center">XXX.XXX <span id="currency3">Fcfa</span></p>
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

			<div class="produit-caracteristique">
				<div class="produit-carateristique-row1">
						<div class="quantite-caracteristique" style="display: flex;">

							<div>
								<span class="form-label-products">Quantité</span>
								<div id="p_input" class="btn-group produit-caracteristique-detail" role="group" aria-label="Basic example" style="">
									<button onclick="moins()" type="button"><img src="{{asset('assets/recap_produit/form-icon/moins.svg')}}"  style="position: relative; right: -17px;"/></button>

									<input type="number" id="quantite_marchand" value="1" min="1" onchange="verifier_input()">
									<button onclick="plus()" type="button"><img src="{{asset('assets/recap_produit/form-icon/Plus.svg')}}" style="position: relative; right: 17px;"/></button>
								</div>
							</div>

							<div>
							<span for="email" class="form-label-products" id="carac_produit-marchandLabel0">@Caractéristique 0</span>
							<select class="select-product" id="carac_produit-marchand0" onchange="verifier_article()">

							</select>
						</div>
						</div>
				</div>
				<div class="produit-carateristique-row2">

						<div class="" style="display: flex;">
							<div style="margin-right: 10px; padding: 0px !important;">
								<span for="email" class="form-label-products" id="carac_produit-marchandLabel1">@Caractéristique 1</span>
								<select class="select-product" id="carac_produit-marchand1" onchange="verifier_article()">
									<!-- <option class="option">Frais</option>
									<option class="option">Valeur 2</option>
									<option class="option">Valeur 3</option>
									<option class="option">Valeur 4</option> -->
							    </select>
						</div>

						<div>
							<span for="email" class="form-label-products" id="carac_produit-marchandLabel2">@Caractéristique 3</span>
							<select class="select-product" id="carac_produit-marchand2" onchange="verifier_article()">

								<!-- <option class="option">Valeur 1</option>
								<option class="option">Valeur 2</option>
								<option class="option">Valeur 3</option>
								<option class="option">Valeur 4</option> -->
						</select>
					</div>

						</div>

				</div>

                <div class="zone-expedition-retour-payement" style="position: relative; top: 20px; margin-bottom: 65px">
                    <div class="z-exp-2" style="display: flex; column-gap: 15px">
                        <div class="z-exp-1-icones-bis">

                           <div class="produit-option-supp">
                            <div class="icon-last-level">
                                <img src="assets/images/icones-vendeurs2/Chariot.svg" style="width: 15px; height: 15px;">
                           </div>
                           <div class="libelle-option-p">
                                <span class="s-none-p">Retour</span>
                           </div>
                           </div>

                        </div>

                        <div class="z-exp-111" >
                            <span class="preview-article-retour" id="retour-show-recap">Article ne disposant pas de retour</span>
                        </div>
                    </div>

                    <div class="z-exp-2" style="display: flex; column-gap: 15px; margin-top: 20px">
                        <div class="z-exp-1-icones-bis">
                            <div class="produit-option-supp">
                                <div class="icon-last-level">
                                    <img src="assets/images/icones-vendeurs2/trolley.svg">
                               </div>
                               <div class="libelle-option-p">
                                    <span class="s-none-p">Expédition</span>
                               </div>
                               </div>
                        </div>

                        <div class="z-exp-111" >
                            <span class="preview-article-retour" id="show-detail-expeditiond" style="font-size: 12px">Expédition en 24h (sauf jour ouvré)</span>
                        </div>
                    </div>

                    <div class="z-exp-2" style="margin-top: 20px">
                        <div class="z-exp-1-icones-bis">
                            <div class="produit-option-supp">
                                <div class="icon-last-level">
                                    <img src="assets/images/icones-vendeurs2/Group 8.svg" style="width: 15px; height: 15px;">
                               </div>
                               <div class="libelle-option-p">
                                    <span class="s-none-p">Paiement</span>
                               </div>
                               </div>
                        </div>

                        <div class="z-exp-111" >
                            <span class="preview-payment-carthhg preview-article-retour" id="show_detail_bank_paiement" ></span>
                            <span class="preview-payment-carthhg preview-article-retour" id="show_detail_mobile_paiement" ></span>
                        </div>
                    </div>
                </div>

			<!-- </div><br><br> -->

				{{-- <div class="data-icon" style="display: flex; position: relative; margin-top: 24px; background-color: red">
					<div class="col-1s" style="width: auto;">
						<div class="btn-group paiement-section">

						<div class="bouton-fi1-bis slide-infos-option">
							<button type="button" class="btn btn-primary" style="display: flex; justify-content: center; align-items: center">
								<img src="{{asset('assets/images/icons/tm_chariot.svg')}}" style="position: relative; top: 1px;"/>
                                <span class="s-none-p">Paiement</span>
							</button>
						</div>

						<div class="bouton-fi1-bis slide-infos-option">
							<button type="button" class="btn btn-primary">
								<img src="{{asset('assets/recap_produit/move-by-trolley.svg')}}" style="position: relative; top: 1px;"/>
                                <span class="s-none-p" style="    position: relative; top: -5px;">Expédition</span>
							</button>
						</div>

						<div class="bouton-fi1-bis slide-infos-option" >
							<button type="button" class="btn btn-primary" style="display: flex; justify-content: center; align-items: center;" onclick="slide_infos()">
								<img src="{{asset('assets/recap_produit/Group 8.svg')}}"  style="position: relative; top: 1px;"/>
                                <span class="s-none-p">Retour</span>
							</button>
						</div>

					</div>
				</div>

                <style>
					.info-expediction {
						position: relative;
						top: 3px;
					}
				</style>

				<div class="info-expediction">
					<p id="expedition_text_marchand">Expédition en 24h (sauf jour ouvré)</p>
				</div>

			</div> --}}
            {{-- <div class="info-expediction">
                <p id="expedition_text_marchand">Expédition en 24h (sauf jour ouvré)</p>
            </div> --}}
            <style>
                .infos-description1 {
                    border-top: 1px solid #1A7EF5;
                    border-bottom: 1px solid #1A7EF5;
                    margin-top: 20px;
                    width: auto;
                    position: relative;
                    left: 14px;
                    cursor: pointer;
                }

                .style-p-assoc {
                    box-sizing: border-box;
                    height: 72px;
                    width: 414px;
                    border: 1px solid #D8D8D8;
                    border-radius: 6px;
                    background-color: #FFFFFF;
                }

            </style>
                <div class="rowf infos-articles" style="position: relative; left: 1px;">
                    {{-- <img src="assets/images/article_associe.png" alt="" > --}}
                    <div class="article-associe"  >
                        <span style="position: relative; top: -'4px;padding: 0px !important; margin: 0px !important;">
                            <i class="fas fa-circle" style="height: 6px; width: 6px; font-size: 8px; margin-right: 5px; color: #00b517"></i> Articles associés</span>
                    </div>
                    <div class="produit-associer-section-marchand" style="display: flex">

                    </div>
                </div>


				<button class="rowf infos-offres s-none" style="position: relative; left: 0px; border: none">
					<p style="display: flex; justify-content: space-between; align-items: center;position: relative; top: 7px; color: #fff;">
						<img src="{{asset('assets/images/icons/tm_sigle.svg')}}" alt=""  style="position: relative; left: 10px"/>
						<span style="position: absolute; float: left; left: 45px;">Voir les 999 offres de nos partenaires</span>
						<span style="position: relative; left: -13px"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-plus-lg" viewBox="0 0 16 16">
						<path fill-rule="evenodd" d="M8 2a.5.5 0 0 1 .5.5v5h5a.5.5 0 0 1 0 1h-5v5a.5.5 0 0 1-1 0v-5h-5a.5.5 0 0 1 0-1h5v-5A.5.5 0 0 1 8 2Z"/>
						</svg></span>
					</p>
				</button>

			</div>
		</div>
		<!-- row end  -->
	</div>

	  </div>
	  <div class="box-bottom new_produit" id="ajouter_au_panier_success">
			<p>
				Un nouvel article a été ajouté. Vous avez maintenant <span id="pp"></span> articles dans votre panier.
			</p>
	  </div>

	  <div class="box-bottom new_produit" id="ajouter_au_panier_success_mofif">
        <p>
            {{-- Votre article à été modifié. Vous avez maintenant <span id="pp2"></span> articles dans votre panier. --}}
            Votre article a été modifié avec succès.
        </p>
      </div>

	  <div class="box-bottom2 old_produit" id="ajouter_au_panier_echec">
        <p>
            La modification de cet article a été efectué avec succès.
        </p>
      </div>

	</div>


  </div>
	{{-- </div> --}}

	<!-- Modal -->
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

	<script type="text/javascript">

    const quantite = document.getElementById("quantite");
    const p_input = document.getElementById("p_input");
    const prix = document.getElementById("prix_total");
    const price_first = document.getElementById("price_first");
    const libelle = document.getElementsByClassName("article-title");
    const id_produit = document.getElementById("id_produit");
    const ref_produit = document.getElementById("reference");
    const carac_produit = document.getElementById("carac_produit");
    const carac_produit1 = document.getElementById("carac_produit1");
    const carac_produit2 = document.getElementById("carac_produit2");
    const id_session = document.getElementById("id_session");
    const spinner = document.getElementById("spinner");
    const activation_but = document.getElementById("ajouter_panier_nouvel");
    const ajouter_panier = document.getElementById("ajouter_panier");
    const Enregistrer_panier_nouvel = document.getElementById("Enregistrer_panier_nouvel");
    const spinner_ajouter = document.getElementById("spinner_ajouter");
    const spinner_modifier = document.getElementById("spinner_modifier");
    const spinner_ajouter_nouvel = document.getElementById("spinner_ajouter_nouvel");
    const span1 = document.getElementById("span1");
    const span2 = document.getElementById("span2");
    const span0 = document.getElementById("aa");
    const imgButon0 = document.getElementById("imgButon0");
    const imgButon1 = document.getElementById("imgButon1");
    const imgButon2 = document.getElementById("imgButon2");

    const ajout_panier_produit = document.getElementById('ajouter_au_panier_success');

    function closeModalProduit() {

        const monstyle = document.getElementById('recap-modification-produit')
        const modalelement = document.getElementById('main-element')
        modalelement.style.backgroundColor = "rgba(0, 0, 0, 0.5)";
        modalelement.style.width = "100%";
        monstyle.classList.remove('recap-modification-produit');
        $('#myModal').modal('hide');
    }

    // function _lodajout_panier() {

    // if(parseInt(quantite.value) < 0 || quantite.value == "" || isNaN(quantite.value)) {
    //     p_input.classList.add("p_input");
    //     setTimeout(function() {
    //     p_input.classList.remove("p_input");
    //     }, 500);
    //     quantite.value = 1
    // } else {

    // imgButon0.style.display = "none";
    // span0.innerHTML = "";
    // ajouter_panier.disabled = true;
    // // ajouter_panier.classList.add("desactive");
    // spinner_ajouter.classList.add("spinner-border");
    // spinner_ajouter.classList.add("spinner-border-sm");

    // quantite.value = parseInt(quantite.value)
    // // prix.innerHTML = parseInt(price_first.value)*parseInt(quantite.value)
    // price_first.innerHTML = parseInt(price_first.innerHTML)

    // let produit = {
    //     'quantite': quantite.value,
    //     'prix': price_first.value,
    //     'id_produit': id_produit.value,
    //     'prix_total': parseInt(price_first.value)*parseInt(quantite.value),
    //     'ref' : ref_produit.innerHTML,
    //     'carac' : carac_produit.value,
    //     'carac1' : carac_produit1.value,
    //     'carac2' : carac_produit2.value
    // }
    //     $.ajax({
    //     type: 'GET',
    //     url: '/panier/ajouter/',
    //     data: produit,
    //     cache: false,
    //     success: function(result) {
    //     console.log('panier_ajouter', result) //ok

    //     setTimeout(function() {
    //     $('#ajouter_au_panier_success').removeClass('new_produit');
    //     }, 0);

    //     setTimeout(function() {
    //     $('#ajouter_au_panier_success').addClass('new_produit');
    //     ajouter_panier.disabled = false;
    //     // ajouter_panier.classList.remove("desactive");
    //     spinner_ajouter.classList.remove("spinner-border");
    //     spinner_ajouter.classList.remove("spinner-border-sm");
    //     span0.innerHTML = "Ajouter au panier";
    //     imgButon0.style.display = "inline";
    //     }, 2000);

    //     if ($('#nbr_panier').attr('class') == '') {
    //         $('#nbr_panier').addClass("menu-item-counter");
    //         $('#nbr_panier').addClass("text-center");
    //     }
    //     $('#nbr_panier').text(result[0]['0']);

    //     if ($('#nbr_panier2').attr('class') == '') {
    //         $('#nbr_panier2').addClass("panier-counter");
    //         $('#nbr_panier2').addClass("text-center");
    //     }
    //     $('#nbr_panier2').text(result[0]['0']);

    //     $('#pp').text(result[0]['0'])
    //     // $('#prix_total').text(prix.innerHTML+" Fcfa")
    // },

    // error: function(error) {
    //     console.log('Pas bon')
    // }

    // });
    // }
    // }

    function verifier_article () {
        quantite.value = parseInt(quantite.value)
        // prix.innerHTML = parseInt(price_first.value)*parseInt(quantite.value)
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
                    console.log('panier_nouvel', result) //ok
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

quantite.value = parseInt(quantite.value)
// prix.innerHTML = parseInt(price_first.value)*parseInt(quantite.value)
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
$.ajax({
        type: 'GET',
        url: '/panier/nouvel/',
        data: produit,
        cache: false,
        success: function(result) {
            console.log('panier_modifier', result) //ok

                    // if (result) {
                    //     activation_but.disabled = true;
                    //     activation_but.classList.add("desactive");
                    // }

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
                $('#nbr_panier2').text(result[0]['0'])
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

        let favori = {
            'favori_id': id_produit.value,
        }
            $.ajax({
                type: 'GET',
                url: '/panier/favori/',
                data: favori,
                cache: false,
                success: function(result) {
                    console.log('favori', result)
                    if (result[0].statut == 1) {
                        $('#nbr_favorie').text(result[0]['0'])
                        $('#ajouter_favori').attr('src',"{{asset('assets/recap_produit/icons/Favoris_Selected.svg')}}")
                    }
                    if (result[0].statut == 2) {
                        $('#nbr_favorie').text(result[0]['0'])
                        if ($('#ajouter_favori').attr('src') == "{{asset('assets/recap_produit/icons/Favoris_Selected.svg')}}") {
                        $('#ajouter_favori').attr('src',"{{asset('assets/recap_produit/icons/Favoris_no.svg')}}")
                        } else {
                            $('#ajouter_favori').attr('src',"{{asset('assets/recap_produit/icons/Favoris_Selected.svg')}}")
                        }
                    }

                },

                error: function(error) {
                    console.log('Pas bon')
                }

            });

    }

    function plus() {

        if (parseInt(quantite.value) == 100) {
        } else {
            quantite.value = parseInt(quantite.value) + 1
            prix.innerHTML = parseInt(price_first.value)*parseInt(quantite.value)+" Fcfa"

        }
    }
    function moins() {

        if (parseInt(quantite.value) <= 1) {
        } else {
            quantite.value = parseInt(quantite.value) - 1
            prix.innerHTML = parseInt(price_first.value)*parseInt(quantite.value)+" Fcfa"
        }
    }

    window.addEventListener('load', function () {
            jQuery(document).ready(function () {
            $('#image_principal1').on({
                'click': function() {
                if ($('#image_principal1').attr('src')) {
                    $('#image_principal').attr('src',$('#image_principal1').attr('src'));
                }
                }
            });
            $('#image_autre0').on({
                'click': function() {
                if ($('#image_autre0').attr('src')) {
                    $('#image_principal').attr('src',$('#image_autre0').attr('src'));
                }
                }
            });
            $('#image_autre1').on({
                'click': function() {
                if ($('#image_autre1').attr('src')) {
                    $('#image_principal').attr('src',$('#image_autre1').attr('src'));
                }
                }
            });
            $('#image_autre2').on({
                'click': function() {
                if ($('#image_autre2').attr('src')) {
                    $('#image_principal').attr('src',$('#image_autre2').attr('src'));
                }
                }
            });
            $('#image_autre3').on({
                'click': function() {
                if ($('#image_autre3').attr('src')) {
                    $('#image_principal').attr('src',$('#image_autre3').attr('src'));
                }
                }
            });

            $('#image_autre4').on({
                'click': function() {
                if ($('#image_autre4').attr('src')) {
                    $('#image_principal').attr('src',$('#image_autre4').attr('src'));
                }
                }
            });
            })
        })

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
                                $('#article_du_panier0').empty()
                                for (let i = 0; i < result.length; i++) {

                                    $('#article_du_panier0').append('<div class="customu-popup paniersuppp mystyle" id="pop_'+i+'"><div class="container-supp custom-commande-del" id="popup-close-body"><div><p class="popu-del-produit">Supprimer l’article du panier ?</p></div><div style="display: flex;  column-gap: 14px"><button class="supp-oui" onclick=supprimer_produit("'+i+'")>Oui</button><button class="supp-non" onclick="closePopup('+i+')">Non</button></div></div></div><div class="box-container" id="article_'+result[i].id+'" style="display: flex; flex-direction:column; justify-content:center; align-items:center; row-gap:30px"><div style="display: flex; flex-direction: column"><div class="box-elements"><div class="row" style="margin: 0%; padding: 0%; position: relative; margin-bottom: 10px;"><div class="img-layout-1"><img class="img-layout-1 no-padding" src="'+"{{asset('storage/images/produits')}}/"+result[i].image+'" alt="" id="article_image" ></div> <div class="text-layout" id="elemnt-test"><span class="text-level-1" style="margin-bottom: 11.26px;" id="article_nom">'+result[i].libelle+'</span><span class="text-level-2" style="margin-bottom: 7px; " id="article_ref">Ref. '+result[i].ref_produit+'</span><span class="text-level-3" style="font-size: 16px !important;" id="article_prix_unit">'+result[i].prix+" Fcfa"+'</span><input type="hidden" id="article_id" name="" value="'+result[i].id+'"></div><div class="button-layout"><button onclick="confirmationSuppression('+i+')" class="button-close" style="margin-bottom: 14px;"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-x" viewBox="0 0 16 16"><path d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708z"/> </svg></button><span class="span-button-edit" style="width:30px; height:30px" onclick="modifier_produit('+i+')"><img src="{{asset("assets/recap_produit/Modifier.png")}}" width="12px" height="12px" alt=""/></span></div></div><div class="line-separator"></div><div class="row" style="margin: 0%; padding: 0%; position: relative; margin-bottom: 5px;"><div class="row article-new" style="margin-bottom: 5px;"><div class="col col1" style="display: flex; justify-content: center; align-items: center;"><span id="article_total"> '+result[i]['0']+" article(s)"+'</span></div><span class="separateur-1"></span><div class="col col2" style="display: flex; justify-content: center; align-items: center;"><span id="article_prix_total">'+result[i].prix*result[i]['0']+" Fcfa"+'</span></div></div><div class="row expedition-info" style="display: flex; justify-content: center; align-items: center;"><span>Expédition en 24h (sauf jour ouvré)</span></div></div><div class="line-separator1"></div><div class="rowd product-caracteristique" style="display: flex; justify-content: center; align-items: center;"> <label class="custom-span"> <span>COULEUR</span> <button class="infos-val-caracteristique active-button" style="border: none; " ><svg style="color: #fff" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-check-lg" viewBox="0 0 16 16"><path d="M12.736 3.97a.733.733 0 0 1 1.047 0c.286.289.29.756.01 1.05L7.88 12.01a.733.733 0 0 1-1.065.02L3.217 8.384a.757.757 0 0 1 0-1.06.733.733 0 0 1 1.047 0l3.052 3.093 5.4-6.425a.247.247 0 0 1 .02-.022Z"/></svg></button></label> <label class="custom-span"><span>COULEUR</span><button class="infos-val-caracteristique" > 11.5</button> </label> <label class="custom-span"><span>COULEUR</span><button class="infos-val-caracteristique" > 11.5</button></label><label class="custom-span"><span>COULEUR</span><button class="infos-val-caracteristique" > 11.5</button></label><label class="custom-span"><span>COULEUR</span><button class="infos-val-caracteristique" > 11.5</button></label><label class="custom-span"><span>COULEUR</span><button class="infos-val-caracteristique" > 11.5</button></label></div></div></div></div>')

                                    sous_total += result[i].prix*result[i]['0']
                                    nombre_total += parseInt(result[i]['0']);
                                    $('#sous_total').text(sous_total+" Fcfa")
                                    $('#total_tous').text(sous_total+" Fcfa")

                                }
                                $('#nombre_total').text(nombre_total);

                                // const element = document.getElementById('main-element');
                                // element.classList.toggle('panier_show')
                            },

                            error: function(error) {
                                console.log('Pas bon')
                            }

                        });
            }

	</script>

@endsection
