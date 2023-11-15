<div>

    <div class="panier-mobile-prod-container">
        <div class="mobile-panier-articles-number" style="width: 250px; padding-left: 10px">
            <span class="mobile-panier-libelle">Paiement</span>
        </div>
        <div class="mobile-panier-acordion-btn" style="width: 50px; ">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-chevron-down" viewBox="0 0 16 16">
                <path fill-rule="evenodd" d="M1.646 4.646a.5.5 0 0 1 .708 0L8 10.293l5.646-5.647a.5.5 0 0 1 .708.708l-6 6a.5.5 0 0 1-.708 0l-6-6a.5.5 0 0 1 0-.708z"/>
            </svg>
            {{-- <i class="fa fa-angle-down fa-row-down-costum"></i> --}}
        </div>
    </div>

<div class="mobile-panier-articles" id="mobile-panier-connection-container">
<div class="section-identite-1" style="padding-top: 5px; border-bottom: 1px solid #D8D8D8">
    <div class="mobile-panier-user-contact">
        <label class="mobile-panier-user-contact">Contact</label>
        <p class="mobile-panier-user-email mobile-panier-user-email-val">marcus.lee0241@gmail.com</p>
    </div>
    <div class="mobile-panier-user-contact-btn">
        {{-- <img src="/assets/images/tm_edit-off.svg" alt=""> --}}
    </div>
</div>

<div class="section-identite-2" style="border-bottom: 1px solid #D8D8D8">
    <div class="mobile-panier-user-contact">
        <label class="mobile-panier-user-contact">Expédié à:</label>
        <p class="mobile-panier-user-email">
            <span class="mobile-user-nom-prenom">Jody Ellangmane</span>
            <span class="mobile-user-adress">10 Rue de Louis, Libreville,</span>
            <span class="mobile-user-ville">Libreville,</span>
            <span class="mobile-user-complement">Marché Louis,</span>
            {{-- <span class="mobile-user-pays">Gabon,</span> --}}
            <span class="mobile-user-phone">074583840</span>
        </p>
    </div>
    <div class="mobile-panier-user-contact-btn" onclick="modifAdressFacturation()">
        <img src="/assets/images/tm_edit-off.svg" alt="">
    </div>
</div>

<div class="section-identite-3">
    <div class="mobile-panier-user-contact">
        <label class="mobile-panier-user-contact">Méthode:</label>
        <p class="mobile-panier-user-email">
            Expédition en 45 min -  <b>Gratuit</b>
        </p>
    </div>
    <div class="mobile-panier-user-contact-btn">
        {{-- <img src="/assets/images/tm_edit-off.svg" alt=""> --}}
    </div>
</div>

    </div>

</div>

<div class="mobile-panier-paiement-card" >

    <div class="panier-mobile-card-container panier-mobile-hidden">

    @include('front.new_view.panier_composants.back_btn')
    @include('front.new_view.panier_composants.mode_paiement_elemnts')

    </div>

    <div class="panier-mobile-paiement-airtel" onclick="mobile_show_mode_paiement(1, 'AM')" >

        <div class="mobile-rectangle-card-vps" style="position: relative; ">
            <span class="card-name card-name-top">
                AirtelMoney
                </span>
            <div class="card-name-airtel" style="left: 266px">

            </div>
        </div>
    </div>

    <div class="panier-mobile-paiement-moovmoney" onclick="mobile_show_mode_paiement(2, 'MC')">
        <div class="mobile-rectangle-card-vps" style="position: relative; ">
            <span class="card-name card-name-top">
                Moovmoney
            </span>
            <div class="card-name-moovMoney" style="left: 266px">

            </div>
        </div>
    </div>

    <div class="panier-mobile-paiement-visa" onclick="mobile_show_mode_paiement(3)">
        <div class="mobile-rectangle-card-vps" style="position: relative; ">

            <span class="card-name card-name-top">
                Carte Credit
            </span>

        <div class="card-icon-achat" style="top: 2px; left: 266px">

        </div>

        </div>
    </div>

    <div class="panier-mobile-paiement-paypal" onclick="mobile_show_mode_paiement(4, 'VISA')">
        <div class="mobile-rectangle-card-vps" style="position: relative; ">
            <span class="card-name card-name-top">
            PayPal
            </span>
        <div class="card-icon-paypapsticked" style="top: 2px; left: 266px">

            </div>
        </div>
    </div>
</div>

<div class="panier-mobile-recapitulatif">
    @include('front.new_view.panier_composants.recap_prix_panier')
</div>
