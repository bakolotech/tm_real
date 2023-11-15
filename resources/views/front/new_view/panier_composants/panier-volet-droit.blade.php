<div class="panier-right-section">
    <button id="exampleModal_bachirClosed" type="button" class="close-btn-panier-bis" style="z-index: 15000; position:absolute; margin-left: 256px; margin-top: -15px" onclick="closePaniverV2()">
        <img src="{{ asset('assets/images/close-btn.svg') }}" alt="">
    </button>
    <div class="modal-headerdd volet-droite-modal-header-panier ">
        <h4 class="text-center">Récapitulatif</h4>
    </div>


    <div class="modal-bodyH volet-droite-modal-body modal-body-pan-updated">

        <div class="recap-commande-section" style="margin-bottom: 7px;">

            <div class="recap-commande-infos-element" >

                <div id="commande-article-section" >
                <span class="recap-commande-libelle">Commande</span> <span class="recap-commande-article"> x<span id="nombre_produit_panier"></span> Articles</span>
            </div>

                <div id="aucun-article-section" class="vider">
                    Aucun Article
                </div>

            </div>

        </div>
        <div class="recap-commande-details-element" style="position:absolute; margin-top: 39px">
            Voir le détail
        </div>

        <div class="recap-commande-produit-content" id="recap-commande-produit-content-id">
            <h5 class="recap-cmd">
                Recaputilatif de la command
            </h5>

            <div class="recap-commande-produit-content-2">
                <div class="article-titre article-title-element">
                    <span class="article-title-elementS" style="margin-right: 169px; margin-left:10px">Articles</span> <span class="article-title-elementS" >Total</span>
                </div>
                <div class="recap-commande-item-container" id="recap-commande-item-container-id">

                </div>
            </div>
        </div>

          <div class="row volet-droite-modal-row">
              <div class="col">
                  <label class="label-infos-new-version ">Sous-total :</label>

              </div>
              <div class="col">
                  <label class="label-value" id="sous-total-panier">X,XX Fcfa</label>
              </div>
          </div>
          <div class="row volet-droite-modal-row">
              <div class="col">
                  <label class="label-infos-new-version " >Réduction :</label>

              </div>
              <div class="col">
                <label id="reduct" class="label-button" style="display: flex; justify-content: center; align-items: center;">Aucun</label>
                <label type="hidden"  id="total_remise" style="position: absolute;display: flex; justify-content: center; align-items: center;margin-top:-10px;color:#D0021B;font-weight:900;font-size:16px;margin-left:20px;"> </label>
              </div>
              <!-- reduction-ok  label-button-->
          </div>

          <div class="row volet-droite-modal-row">
              <div class="col">
                  <label class="label-infos-new-version ">Expédition :</label>
              </div>
              <div class="col" >
                  <label class="label-button" id="prix_expedition_achat" style="display: flex; justify-content: center; align-items: center;">Gratuit</label>

                  <label class="label-value vider" id="prix_expedition_achat-bix" style="display: flex; justify-content: center; align-items: center;">Gratuit</label>

              </div>
          </div>

          <div class="row volet-droite-modal-row">
              <div class="col">
                  <label class="label-infos-new-version">Total :</label>
              </div>

              <div class="col" >
                <label class="label-value"  id="total-panier">X,XX Fcfa</label>

              </div>

          </div>

          <div class="bon-reduction" >
            <span class="span-text"><i style="margin-right:5px"><img class="btn-img-contueddr" src="{{asset('assets/images/bon-reduction-icon-title.svg')}}" alt="" /></i>Un coupon, un code promotionnel ?</span>
            <span id="texte_pro" class="coupon-code-promo" style="position: relative; top:-10px">
            Vous pourrez les ajouter lors du paiement
            </span>


<!-- reporter à la commande -->

                <div class="input-group  coupon_code_cacher" id="coupon_code_champ">
                    <input name="_token" type="hidden" id="token" value="{{ csrf_token() }}"/>
                  <input onfocus="onfocus_ver()" onkeyup="UpperCase()" type="text" class="form-controk" id="input_code" placeholder="Ex: tm-01/tm-02" autoComplet="off">
                  <div style="width: 90px !important" class="input-group-text"   onclick="testCodeP()" id="activer_code">Activer</div>

                </div>

                     <div type="hidden" style="display:none; box-sizing: border-box;
                     height: 72px;
                     width: 256px;
                     border: 1px solid #00B517;
                     border-radius: 6px;
                     background-color: rgba(0,181,23,0.15);
                     padding:10px;
                     text-align:center;
                     padding:10px;
                     margin-top: 5px;" id="success">
                       <div class="div11" style=" height: 16px;
                       width: 16px;
                       margin-left:7px;
                       margin-top: 5px;" >
                        <img class="btn-img-contuer44" src="{{asset('assets/images/code-valide.svg')}}" alt="" />
                        </div>
                        <div class="div22" style="  height: 39px;
                        width: 197px;
                        color: #00B517;
                        font-family: Roboto;
                        font-size: 11px;
                        letter-spacing: 0.24px;
                        line-height: 12px;
                        margin-top: -8px;margin-left:24px;" >
                          Votre code a bien été prise en compte
                          pour les produits de la sélection
                          <strong>fruits-legumes</strong>
                        </div>
                     </div>


                <!-- zone success  -->
                  <div class="code-promo-element coupon_code_cacher" type="hidden"  style="display:none;" id="success">
                      <div class="div1" >
                      <img class="btn-img-contuer44" src="{{asset('assets/images/code-valide.svg')}}" alt="" />
                      </div>
                      <div class="div2" >
                        Votre code a bien été prise en compte
                        pour les produits de la sélection
                        <strong>fruits-legumes</strong>
                      </div>
                  </div>


                  <div type="hidden" style="  box-sizing: border-box;
                  height: 36px;
                  width: 250px;
                  border: 1px solid #D0021B;
                  border-radius: 6px;
                  background-color: rgba(208,2,27,0.15);
                  display: none;
                  margin-top: 5px;" id="erreur">
                  <div class="code-echec-img1" style=" height: 16px;
                  width: 16px;
                  margin-top: 4px;
                  margin-left: 10px;
                  margin-right: 8px;">

                    <img class="btn-img-contuer44" src="{{asset('assets/images/formulaire-incorect.svg')}}" alt="" />
                  </div>

                  <div class="code-echec-text1" style="  height: 13px;
                  width: 164px;
                  color: #D0021B;
                  font-family: Roboto;
                  font-size: 11px;
                  letter-spacing: 0.24px;
                  line-height: 12px;
                  margin-top: -8px;
                  margin-left:40px;">
                    Désolé! Votre code est incorrect
                  </div>
                  </div>

                  <div class="code-echec coupon_code_cacher" id="zone_erreur">
                      <div class="code-echec-img">
                        <img class="btn-img-contuer44" src="{{asset('assets/images/formulaire-incorect.svg')}}" alt="" />
                      </div>

                      <div class="code-echec-text" >
                        Désolé! Votre code est incorrect
                      </div>
                  </div>



                    <!-- zone code non active  -->

                    <div type="hidden" style="   box-sizing: border-box;
                    height: 59px;
                    width: 256px;
                    border: 1px solid #FF9500;
                    border-radius: 6px;
                    background-color: rgba(255,149,0,0.15);
                    display: none;
                    justify-content: flex-start;
                    align-items: flex-start;
                    margin-top: 5px;" id="retir">
                        <div class="code-no-active-img2" style="

                         height: 16px;
                        width: 16px;
                        margin-top: 6px;
                        margin-left: 10px;
                        margin-right: 8px;">
                            <img class="btn-img-contuer44" src="{{asset('assets/images/Aide_Over.svg')}}" alt="" />
                          </div>

                          <div class="code-no-active-text2" style="height: 39px;
                          width: 201px;
                          color: #FF9500;
                          font-family: Roboto;
                          font-size: 11px;
                          letter-spacing: 0.24px;
                          line-height: 12px;
                          margin-top: -10px;
                          margin-left:40px;">
                            Vous avez retirer votre coupon, aucune
                            réduction ne sera appliquée sur votre
                            commande.
                          </div>
                    </div>

                  <div class="code-non-active coupon_code_cacher" id="zone_vide">
                    <div class="code-no-active-img">
                        <img class="btn-img-contuer44" src="{{asset('assets/images/Aide_Over.svg')}}" alt="" />
                      </div>

                      <div class="code-no-active-text">
                        Vous avez retirer votre coupon, aucune
                        réduction ne sera appliquée sur votre
                        commande.
                      </div>

                  </div>

                  <span style="color: red" id="display-card-error-msg"></span>

                  </div>
            </div>

            <div class="button-dash">
                <button class="retour-panier-custom" id="retour_panier" onclick="retour()">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-chevron-left" viewBox="0 0 16 16">
                  <path fill-rule="evenodd" d="M11.354 1.646a.5.5 0 0 1 0 .708L5.707 8l5.647 5.646a.5.5 0 0 1-.708.708l-6-6a.5.5 0 0 1 0-.708l6-6a.5.5 0 0 1 .708 0z"/>
              </svg>
                    </button>
                <button id="continuer" onclick="changement()" class="button-disabled-panier" >
                    <span id="btn_continuer" class="btn-text-contuer" onmouseover="document.getElementById('anim-arr')">CONTINUER</span>
                   <span style="position: relative; left: 59px">

                      <script src="https://cdn.lordicon.com/qjzruarw.js"></script>

                      <lord-icon
                          src="https://cdn.lordicon.com/jxwksgwv.json"
                          trigger="hover"
                          colors="primary:#ffffff"
                          state="hover-1"
                          style="width: 28.76px; height: 24px; padding-left: 100px; position: relative; left: -142px;"
                          >

                      </lord-icon>
                   </span>
                    {{-- <img class="btn-img-contuer" src="{{asset('assets/images/fleche-contunuer.png')}}" alt="" /> --}}
                </button>
            </div>

            <input type="hidden" name="type_achat" id="type_achat">

</div>
