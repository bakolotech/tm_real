 <button id="modalProduitClosed" type="button" class="close-btn" style="z-index: 500; position:absolute; right: -16px; top: -18px" >
            <img src="{{ asset('assets/images/close-btn.svg') }}" alt="">
        </button>

        <div class="section-produits_partenaire none-messaboxe" id="meme-produit-partenaire-section">
            <div class="meme-offre-modal-header" style="position: relative; margin-left: auto; margin-right: auto; position: relative; top: 0px; left: 1px">

                <button class="retour-affiche-produit" onclick="closeMemeOffrePartenaire()">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-chevron-left" viewBox="0 0 16 16">
                        <path fill-rule="evenodd" d="M11.354 1.646a.5.5 0 0 1 0 .708L5.707 8l5.647 5.646a.5.5 0 0 1-.708.708l-6-6a.5.5 0 0 1 0-.708l6-6a.5.5 0 0 1 .708 0z"/>
                      </svg>
                    Retour affiche Produit
                </button>

                <select name="payscite" id="tous_les_etats" class="rectangle-select3 my-selectkkk" style="width: 195px !important; margin-right: 10px; visibility:hidden">
                    <option value="">Tous les états</option>
                    <option value="">Neuf</option>
                    <option value="">Bon état</option>
                    <option value="">Occasion</option>
                </select>

                <select name="payscite" id="tous_les_prix" class="rectangle-select3 my-selectkkk" style="width: 195px !important;">
                    <option value="Tous les prix">Tous les prix</option>
                    <option value="croissant">Croissant</option>
                    <option value="decroissant">Décroissant</option>
                </select>

            </div>
            <div  class="entete-modal-delete-client-meme"></div>

            <div class="meme-offre-main" id="meme-offre-main">

            </div>
        </div>

    <div class="line-middle"></div>
    <div class="modal-body modal-body-panier" id="shared_panier_article" >

    </div>
