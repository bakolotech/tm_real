<div class="modal-panier-content-updated modal-body-pan-updated modal-main-body-element" style="display: flex; flex-direction: column; align-items: center; margin: 0px; padding:10px !important;">
    <!-- menu  -->
<style>
    /* .row>* {
        flex-shrink: 0;
        width: 100%;
        max-width: 100%;
        padding-right: calc(var(--bs-gutter-x) * .5);
        padding-left: calc(var(--bs-gutter-x) * .5);
        margin-top: var(--bs-gutter-y);
    } */
</style>
    <div class="row-header">
        <div class="rows row-pop">

      <div class="col">
          <div class="step-panier step-blue" id="panier">
              <span>1 - PANIER</span>
          </div>
      </div>

      <div class="col">
        <div class="step-panier step-default" id="expedition">
            <span>2 - EXPEDITION</span>
        </div>
    </div>

    <div class="col">
        <div class="step-panier step-default" id="paiement">
            <span>3 - PAIEMENT</span>
        </div>
    </div>

    <div class="col">
        <div class="step-panier step-default" id="confirmation">
            <span>CONFIRMATION</span>
        </div>
    </div>

    </div>
  </div>
  <!-- menu fin -->

  {{-- pas d'article section  --}}
  <div class="panier-title-element1" id="pan" style="margin-bottom: 15px; position: relative; top:5px;">
    <h6>Panier -</h6> <span id="101" > Aucun article</span>
</div>
{{-- pas d'article section fin  --}}
{{-- debut du 1 --}}
<div id="one" class="row main-row" style="margin-bottom: 0px; padding: 0px; display: flex; justify-content: center; margin-top:0 !important/*align-items: center;*/">
    <div id="cvide" class="vider">
        <div class="row" style="position: relative; left: 12px; ">
            <div class="center center2" style="display: flex; flex-direction: column; justify-content: flex-start; align-items: center; margin-top: 68px">
                <img src="{{asset('assets/recap_produit/panier.svg')}}" alt="" style="margin-top: 0px"/>
                <p>
                    Oh! Nooooon,<br>
                    votre panier… il est vide !!
                </p>

            </div>
        </div>
        <div class="row">
            <div class="center" style="display: flex; flex-direction: column; justify-content: center; align-items: center; margin-top: 60px">

                <div class="bottom-element">
                    En manque d’inspiration ?
                </div>

                <button onclick="window.location = '/' ">
                    Trouver des idées
                </button>
            </div>
        </div>
    </div>

    <div class="row2 body-box" style="display: flex; justify-content: flex-start; align-items: flex-start; padding-top:5px !important; flex-wrap: wrap" id="contenu_des_box" >
        <!-- start box produit  -->

    </div>

    <div class="body-box-mobile" id="contenu_des_boxd" style="display: noneD">
        <div class="mobile-panier-recap">
            <div class="mobile-code-promo-zone">
                <label>Récapitulatif </label><br/>
                <span>Avez-vous un code de réduction ?</span>
                <div class="code-promo-mobile">
                    <input type="text" placeholder="Code promo" class="mobile-code-promo-input">
                    <button class="mobile-code-promo-btn">Activer</button>
                </div>
            </div>
            <div class="mobile-panier-tarif-infos">
                <div>
                    <label>Total HT</label>
                    <label id="prix-hors-taxe-mobile"></label>
                </div>

                <div>
                    <label>Frais d'expédition</label>
                    <label id="frais-expedition-mobile"></label>
                </div>

                <div>
                    <label>Total TTC</label>
                    <label id="total-ttc-mobile"></label>
                </div>


            </div>

        </div>
    </div>
    </div>
{{-- fin du 1 --}}

{{-- debut du 2 --}}
<div id="two" style="display: none; ">
<div class="panier-title-element1" id="pan" style="margin-bottom: 15px; position: relative; top:5px; background-color: #F8F8F8 !important; border: 0px solid #000 !important">
<h4 class="exp" >Expéditeur</h4>
</div>
<div  class="row main-row" style="margin-bottom: 0px; padding: 0px; display: flex; justify-content: center; margin-top:0 !important; background-color: #F8F8F8 !important; border: 0px solid #000 !important">
{{-- @if(Auth::check()) --}}

{{-- debut user connected  --}}
<div class="rowd zone-adress-element3  infos-invite-none" style="height: auto; padding-top: 10px; " id="section-invite-infos-connected" >
<input type="hidden" id="hidden-connected-flag" value="false">
<div class="adresse-row-element-3" >
    <span class="adresse-row-element-3-icon"><img src="{{asset('assets/images/icons/Valide.svg')}}" alt=""/></span>
    <span  class="adresse-row-element-3-contact">Contact</span>
    <span  class="adresse-row-element-3-value bold-element" id="invite-email-connected" >default_email@gmail.com</span>
</div>

{{-- cas ou y a pas d'adresse --}}
<div class="adresse-row-element-3 infos-invite-none" style="margin-top: 5px; border: 1px solid #D0021B" id="section-addresse-non-defini">
    <span class="adresse-row-element-3-icon"><img  src="{{asset('assets/images/error-icon-20.jpg')}}" alt=""/></span>
    <span  class="adresse-row-element-3-contact">Expédition</span>
    <span  class="adresse-row-element-3-value bold-element" style="width: auto">Vous n'avez pas indiqué d'adresse de livraison </span>

    <div style="position: relative; left: 122px;">
        <button class="my-data-adresse button-entete-adresse-panier" onclick="ajoutAdressAchat()">
            <span class="nouvelle-adresse-text-profil-user">
                <img style="margin-right: 15px;" src="{{  asset('assets/images/plus-arnet-adresse-profil.svg') }}">
                Ajouter une adresse</span>
        </button>
    </div>

</span>
</div>

{{-- cas ou une addresse existe  --}}
<div class="adresse-row-element-3" style="margin-top: 5px;" id="section-addresse-bien-defini">
    <span class="adresse-row-element-3-icon"><img  src="{{asset('assets/images/icons/Valide.svg')}}" alt=""/></span>
    <span  class="adresse-row-element-3-contact">Expédition</span>
    <span  class="adresse-row-element-3-value"><span class="bold-element" id="invite-nom-prenom-connected">Dupont Steeven</span>, <span id="invite-numero_tel-connected" style="margin-left: 5px">0680130860</span>, <span id="invite-quartier-address-connected" style="margin-left: 5px">10 Rue de la Bibliothèque</span>, <span style="margin-left: 5px" id="comp-addr-supp-connected" ></span>, <span id="invite-pays-connected" style="margin-left: 5px">Gabon</span>, <span id="inv-ville-connected" style="margin-left: 5px; margin-right: 5px">Gabon </span> - <span id="invit-code-postal-connected" style="margin-left: 5px">130010</span></span>
    <input type="hidden" value="" id="address_actuel" />
    <button class="adresse-row-element-2-icon-edit" onclick="modifAdressFacturation()"><img src="{{asset('assets/images/tm_edit-off.svg')}}" alt=""/></button>

</span>

</div>

</div>

{{-- fin zone user en tant que connecté  --}}

{{-- @endif --}}
<div class="rowd zone-adress-element3 infos-invite-none " style="height: auto; padding-top: 10px; " id="section-invite-infos">

    <div class="adresse-row-element-3" >
        <span class="adresse-row-element-3-icon"><img src="{{asset('assets/images/icons/Valide.svg')}}" alt=""/></span>
        <span  class="adresse-row-element-3-contact">Contact</span>
        <span  class="adresse-row-element-3-value bold-element" id="invite-email" >marcus.lee0241@gmail.com</span>
        <button class="adresse-row-element-3-icon-edit" onclick="editInviteData()"><img class="prod-option-edit" src="{{asset('assets/images/tm_edit-off.svg')}}" alt=""/></button>
    </div>

    <div class="adresse-row-element-3" style="margin-top: 5px">
        <span class="adresse-row-element-3-icon"><img  src="{{asset('assets/images/icons/Valide.svg')}}" alt=""/></span>
        <span  class="adresse-row-element-3-contact">Expédition</span>
        <span  class="adresse-row-element-3-value"><span class="bold-element" id="invite-nom-prenom">Dupont Steeven</span>, <span id="invite-numero_tel" style="margin-left: 5px">0680130860</span>, <span id="invite-quartier-address" style="margin-left: 5px">10 Rue de la Bibliothèque</span>, <span style="margin-left: 5px" id="comp-addr-supp" ></span>, <span id="invite-pays" style="margin-left: 5px">Gabon</span>, <span id="inv-ville" style="margin-left: 5px; margin-right: 5px">Libreville </span> - <span id="invit-code-postal" style="margin-left: 5px">130010</span>
    </span>
        <button class="adresse-row-element-3-icon-edit" onclick="editInviteData()"><img class="prod-option-edit" src="{{asset('assets/images/tm_edit-off.svg')}}" alt=""/></button>
    </div>

</div>

<div class="row_old zone-adress-element infos-invite-none" style="width: 933px !important; display: flex; column-gap: 17px; background-color: transparent; " id="tab-form-connection">
    <!-- zone element card  -->
    <div class="step-expedition-bis box-error-login0 infos-connection-user">
        <div class="text-expedition">
            Connectez-vous pour régler
            vos achats plus rapidement.
        </div>

        <button class="btn-inscription-basic" onclick="load__invite_resgister_login()">
            Se connecter / S’inscrire
        </button>
    </div>

    <div class="step-expedition-bis box-error-login0 infos-connection-user" >
        <div class="text-expedition" style="position: relative; top: -8px">
            Régler en tant qu'invité
        </div>

        <span class="ps">
            Poursuivez ainsi. Vous créerez un identifiant ultérieurement.
        </span>

        <button style="position: relative; top: 10px;" onclick="load_inviter_formulaire()">
            Paiement invités
        </button>

    </div>

    <div style="position: absolute; visibility:hidden" id="pvit_form_element_zone">

    </div>

    <div style="display: none" >
        <div class="adresse-row-element-2" style="margin-top:23px !important">
            <span class="adresse-row-element-2-icon"><img src="{{asset('assets/images/icons/Valide.svg')}}" alt=""/></span>
            <span  class="adresse-row-element-2-contact">Contact</span>
            <span  class="adresse-row-element-2-value">marcus.lee0241@gmail.com</span>
            <button class="adresse-row-element-2-icon-edit"><img src="{{asset('assets/images/icons/edit-off.svg')}}" alt=""/></button>
        </div>

        <div class="adresse-row-element-2" style="position: relative; top: -5px">
            <span class="adresse-row-element-2-icon"><img src="{{asset('assets/images/icons/Valide.svg')}}" alt=""/></span>
            <span  class="adresse-row-element-2-contact">Expédition</span>
            <span  class="adresse-row-element-2-value">Dupont Steeven, 0680130860, 10 Rue de la Bibliothèque, France, Marseille - 130010</span>
            <!-- <span  class="adresse-row-element-2-value">marcus.lee0241@gmail.com</span> -->
            <button class="adresse-row-element-2-icon-edit"><img src="{{asset('assets/images/icons/edit-off.svg')}}" alt=""/></button>
        </div>
    </div>

</div>

{{-- --------------------------- fin if ------------------------------------- --}}

<div style="margin-top: 25px; position: relative; left: -312px;">
    <h4 class="exp2" style="position: relative;">Mode d'expédition <small style="font-size: 12px">(5)</small></h4>
</div>

<div class="mode_expedition_mask" style="padding: 0px">
<div class="row-expedition-updated box-error-login1">

<div class="col-expedition" style="margin-right:10px; ">

<div class="step-mode-expedition img1" onclick="expedition_panier(4)">
    <div class="expedition-moyen">
        <span class="text-haut" style="position: relative; ">
            <label>
                <input class="checkbox check-expedition" type="checkbox" value="4" data-expedition="default" name="expedition_input4" id="expedition_input4" />
                <span class="exp-par">par</span>
            </label><br>
            <span class="mode-expedition-panier exp-libelle">AVION</span>
        </span>
    </div>
    <button class="button2" onclick="choseExpedition(4)"><span id="expedition_prix-4">Non Disponible</span></button>
</div>

<div class="step-mode-expedition-disabled"  id="disabled-section-4">

</div>

</div>

<div class="col-expedition" style="margin-right:10px">

<div class="step-mode-expedition img2" onclick="expedition_panier(1)">
    <div class="expedition-moyen">
        <span class="text-haut" style="position: relative; left: 1px">
            <label>
                <input class="checkbox check-expedition" type="checkbox" value="1" data-expedition="default" name="expedition_input1" id="expedition_input1" />
                <span class="exp-par">par</span>
            </label><br>
            <span class="mode-expedition-panier exp-libelle" >VOITURE</span>
        </span>
    </div>
    <button class="button2" onclick="choseExpedition(1)"><span id="expedition_prix-1">Non Disponible</span></button>
</div>

<div class="step-mode-expedition-disabled" id="disabled-section-1">

</div>

</div>

<div class="col-expedition" style="margin-right:10px">

<div class="step-mode-expedition img3" onclick="expedition_panier(3)">
    <div class="expedition-moyen" >
       <span class="text-haut" style="position: relative; left: 3px">
        <label>
            <input class="checkbox check-expedition" type="checkbox" value="3" data-expedition="default" name="expedition_input3" id="expedition_input3" />
            <span class="exp-par">par</span>
        </label><br>
        <span class="mode-expedition-panier exp-libelle" >BATEAU</span>
       </span>
    </div>
    <button class="button2" onclick="choseExpedition(3)"><span id="expedition_prix-3">Non Disponible</span></button>
</div>

<div class="step-mode-expedition-disabled"  id="disabled-section-3" >

</div>

</div>

<div class="col-expedition" style="margin-right:10px">

<div class="step-mode-expedition img4" onclick="expedition_panier(2)">
    <div class="expedition-moyen" style="position: relative; left: 45px !important">
       <span class="text-haut" style="position: relative; left: 1px">
        <label>
            <input class="checkbox check-expedition" type="checkbox" value="2" data-expedition="default" name="expedition_input2" id="expedition_input2" />
            <span class="exp-par">par</span>
        </label><br>
        <span class="mode-expedition-panier exp-libelle" >SCOOTER</span>
       </span>
    </div>

    <button class="button2" onclick="choseExpedition(2)" style="position: relation; left: -51px !important" ><span id="expedition_prix-2">Non Disponible</span></button>

</div>

<div class="step-mode-expedition-disabled" id="disabled-section-2">

</div>

</div>

<div class="col-expedition" >

<div class="step-mode-expedition img5" onclick="expedition_panier(7)">
    <div class="expedition-moyen" >
       <span class="text-haut" style="position: relative; left: -1px">
        <label>
            <input class="checkbox check-expedition" type="checkbox" value="7" data-expedition="default" name="expedition_input7" id="expedition_input7" />
            <span class="exp-par">par</span>
        </label><br>
        <span class="mode-expedition-panier exp-libelle" >TRAIN</span>
       </span>
    </div>
    <button class="button2" onclick="choseExpedition(7)"><span id="expedition_prix-7">Non Disponible</span></button>
</div>

<div class="step-mode-expedition-disabled" id="disabled-section-7">

</div>

</div>

  </div>
  </div>

</div>
</div>
{{-- fin du 2 --}}

{{-- debut du 3 --}}
{{-- <div id="three" class="row main-row" style="margin: 0px; padding: 0px; display: none; justify-content: center; /*align-items: center;*/"> --}}
<div id="three" style="display: none">

<div class="panier-title-element1" id="pan" style="margin-bottom: 15px; position: relative; top:5px;">
    <h6>Paiement </h6>
</div>

@include('front.new_view.paiement_vue')

</div>
{{-- fin du 3 --}}

{{-- debut du 4 --}}
<div id="for" hidden class="row main-row" style="margin: 0px; padding: 0px; display: none; justify-content: center; /*align-items: center;*/">

</div>
{{-- fin du 4 --}}
  <!-- </div> -->

</div>

</div>
