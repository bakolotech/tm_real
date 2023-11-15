<style>
    .mobile-code-promo-label {
        font-family: Roboto;
        font-size: 12px;
        letter-spacing: 0;
        line-height: 14px;
    }

    .panier-mobile-recapitulatif-title hr {
        background: azure;
    }
    
</style>
<div class="panier-mobile-recapitulatif-title"><hr/><h4>Récapitulatif</h4></div>
<div class="panier-mobile-promo-form" style="display: none">
    <h6 class="mobile-panier-form-title">Avez-vous un code de réduction ?</h6>
    <div>
        <form action="#">
            <div class="mobile-panier-code-promo">
            <div><input type="text" class="panier-form-input-code" placeholder="Tapez votre code"></div>
            <div><button class="panier-mobile-form-btn">Activer</button></div>
            </div>
        </form>
    </div>
</div>
<div class="panier-mobile-recapilatif-prix">
    <div class="panier-recap-reduction panier-mobile-recapilatif-prix-child">
        <label class="mobile-code-promo-label">Avez vous un code promo ?</label><a href="" class="mobile-code-promo-label" style="">Activer</a>
    </div>
    <div class="panier-recap-prix panier-mobile-recapilatif-prix-child">
        <label class="mobile-prix-ht">Total HP</label><label class="mobile-prix-ht-val sous-total-panier-mobile" id="sous-total-panier-mobile">1.515.000 Fcfa</label>
    </div>
    <div class="panier-recap-reduction panier-mobile-recapilatif-prix-child" style="display: none">
        <label class="mobile-reduction-label">Réduction :</label><label class="mobile-reduction-label-val">- 10%</label>
    </div>
    <div class="panier-recap-expedition panier-mobile-recapilatif-prix-child">
        <label class="mobile-frais-label">Frais d’expédition : </label><label class="mobile-frais-label-val montant_expedition_panier-mobile" id="montant_expedition_panier-mobile" style="color: #00B517; font-weight: 500">Express - 2.000 Fcfa</label>
    </div>
    <div class="panier-mobile-recapilatif-prix-child" style="border-top: 1px solid #D8D8D8; padding-top: 10px">
        <label class="mobile-prix-ht">Prix Total</label><label class="mobile-prix-ht-val total-panier-mobile" id="total-panier-mobile">1.515.000 Fcfa</label>
    </div>
</div>
