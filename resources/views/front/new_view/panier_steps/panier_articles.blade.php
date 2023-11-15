<style>

    .mobile-panier-acordion-btn {
        display: flex;
        justify-content: center;
        align-items: center;
    }

    @media only screen and (max-width: 540px) {
        .button-layout button img {
            opacity: 0.6;
        }
    }
</style>
<div>

    <div class="panier-mobile-prod-container">
        <div class="mobile-panier-articles-number" style="width: 250px; padding-left: 10px">
            <span class="mobile-panier-libelle">Panier</span>
        </div>
        <div class="mobile-panier-acordion-btn" style="width: 50px; ">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-chevron-down" viewBox="0 0 16 16">
                <path fill-rule="evenodd" d="M1.646 4.646a.5.5 0 0 1 .708 0L8 10.293l5.646-5.647a.5.5 0 0 1 .708.708l-6 6a.5.5 0 0 1-.708 0l-6-6a.5.5 0 0 1 0-.708z"/>
            </svg>
            {{-- <i class="fa fa-angle-down fa-row-down-costum"></i> --}}
        </div>
    </div>

    <div class="mobile-panier-articles" id="mobile-panier-articles-container" style="padding-top: 5px">

    </div>

</div>

<div class="panier-mobile-recapitulatif">
    @include('front.new_view.panier_composants.recap_prix_panier')
</div>
