<style>

    .m-expedition-text {
        position: relative;
        left: 24px;
        top: -5px;
        color: #000;
        font-family: Roboto;
        font-size: 12px;
        font-style: normal;
        font-weight: 400;
        line-height: normal;
    }

    .m-livraison-checkbox label {
        color: #00B517;
        font-family: Roboto;
        font-size: 14px;
        font-style: normal;
        font-weight: 500;
        line-height: 7px;
        position: relative;
        top: -3px;
    }

    .m-livraison-checkbox input {
        width: 14px;
        height: 20px;
        position: relative;
        top: 4px;
    }

    .btn-inscription-basic svg, .btn-inscription-basic-2 svg {
        height: 25px;
        width: 25px;
    }

    .mobile-panier-articles {
        border: 1px solid #D8D8D8;
        border-radius: 0px 0px 6px 6px;
        border-top: none !important;
        margin-bottom: 10px;
    }

    .mobile-login-form-section {
        padding-top: 5px;
    }

    .infos-connection-user-helper {
        position: relative;
        margin-left: auto;
        margin-right: auto;
    }

    .expedition-1 {
        width: 284px;
        position: relative;
        margin-left: auto;
        margin-right: auto;
    }

    .adresse-row-element-3-mobile {
        box-sizing: border-box;
        height: 30px;
        width: 300px !important;
        border: 1px solid #D8D8D8;
        border-radius: 6px;
        background-color: #FFFFFF;
        display: flex;
        justify-content: flex-start;
        align-items: center;
        position: relative;
        margin-left: 10px;
    }

    .adresse-row-element-3-value-mobile {
        height: 30px;
        width: 300px;
        display: flex;
        justify-content: flex-start;
        align-items: center;
        color: #191970;
        font-family: Roboto;
        font-size: 10px;
        letter-spacing: -0.11px;
        line-height: 18px;
    }

</style>
<div >

    <div class="panier-mobile-prod-container">
        <div class="mobile-panier-articles-number" style="width: 250px; padding-left: 10px">
            <span class="mobile-panier-libelle">Expéditions</span>
        </div>
        <div class="mobile-panier-acordion-btn" style="width: 50px; ">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-chevron-down" viewBox="0 0 16 16">
                <path fill-rule="evenodd" d="M1.646 4.646a.5.5 0 0 1 .708 0L8 10.293l5.646-5.647a.5.5 0 0 1 .708.708l-6 6a.5.5 0 0 1-.708 0l-6-6a.5.5 0 0 1 0-.708z"/>
            </svg>
            {{-- <i class="fa fa-angle-down fa-row-down-costum"></i> --}}
        </div>
    </div>

    <div class="mobile-panier-articles" id="mobile-panier-articles-container" >

        <div class="mobile-login-form-section" id="mobile-login-form-section-id" style="display: noned">
            <div class="step-expedition-bis box-error-login0 infos-connection-user infos-connection-user-helper" style="width: 294px !important; height: 110px !important; margin-bottom: 10px">
                <div class="text-expedition" style="margin-bottom: 0px !important; font-size: 14px; line-height: 15px">
                    Connectez-vous pour régler
                    vos achats plus rapidement.
                </div>

                <button class="btn-inscription-basic" onclick="load__invite_resgister_login()">

                <span style="position: relative;">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person-fill" viewBox="0 0 16 16">
                        <path d="M3 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H3Zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6Z"/>
                    </svg>
                </span>

                <span style="position: relative; top: 0px; left: 4px">
                    Se connecter / S’inscrire
                </span>

                </button> 

            </div>

            <div class="step-expedition-bis box-error-login0 infos-connection-user infos-connection-user-helper" style="width: 294px !important; height: 110px !important; margin-bottom: 10px" >
                <div class="text-expedition" style="position: relative; margin-bottom: 20px">
                    Passer votre commande en mode privé
                </div>

                <button class="btn-inscription-basic-2" style="position: relative; top: -5px;" onclick="load_inviter_formulaire()">
                <span style="position: relative; left: -22px">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person" viewBox="0 0 16 16">
                    <path d="M8 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6Zm2-3a2 2 0 1 1-4 0 2 2 0 0 1 4 0Zm4 8c0 1-1 1-1 1H3s-1 0-1-1 1-4 6-4 6 3 6 4Zm-1-.004c-.001-.246-.154-.986-.832-1.664C11.516 10.68 10.289 10 8 10c-2.29 0-3.516.68-4.168 1.332-.678.678-.83 1.418-.832 1.664h10Z"/>
                </svg>
                </span>
                <span style="position: relative; left: -17px; top: 0px;">
                    Paiement invités
                </span>
                </button>
            </div>

        </div>

        <div class="mobile-login-data" id="mobile-login-data-id" style="width: 300px; height: auto; display: none;">

        <div class="section-identite-1" style="padding-top: 5px; border-bottom: 1px solid #D8D8D8">
            <div class="mobile-panier-user-contact">
                <label class="mobile-panier-user-contact">Contact</label>
                <p class="mobile-panier-user-email mobile-panier-user-email-val">marcus.lee0241@gmail.com</p>
            </div>
            <div class="mobile-panier-user-contact-btn">
                {{-- <img src="/assets/images/tm_edit-off.svg" alt=""> --}}
            </div>
        </div>

        <div class="section-identite-2">
            <div class="mobile-panier-user-contact">
                <label class="mobile-panier-user-contact">Expédié à:</label>

                <p class="mobile-panier-user-email" id="mobile-panier-user-email-id">
                    <span class="mobile-user-nom-prenom">Jody Ellangmane</span>
                    <span class="mobile-user-adress">10 Rue de Louis, Libreville,</span>
                    <span class="mobile-user-ville">Libreville,</span>
                    <span class="mobile-user-complement">Marché Louis,</span>
                    <span class="mobile-user-phone">074583840</span>
                </p>

                <div id="ajout-nouvelle-adresse-element-id" style="display: none">
                    <div class="adresse-row-element-3-mobile" style="margin-top: 5px; border: 1px solid #D0021B" id="section-addresse-non-defini">
                        <span class="adresse-row-element-3-icon" style="display: none;"><img src="https://toulemarket.com/assets/images/error-icon-20.jpg" alt=""></span>
                        <span class="adresse-row-element-3-value-mobile bold-element" style="width: auto">Vous n'avez pas indiqué d'adresse de livraison </span>
                    
                        <div style="position: relative; left: 122px;">
                            <button class="my-data-adresse button-entete-adresse-panier" onclick="ajoutAdressAchat()">
                                <span class="nouvelle-adresse-text-profil-user">
                                    <img style="margin-right: 15px;" src="https://toulemarket.com/assets/images/plus-arnet-adresse-profil.svg">
                                    Ajouter une adresse</span>
                            </button>
                        </div>
                    
                    
                    </div>
                </div>

            </div>
            <div class="mobile-panier-user-contact-btn" onclick="modifAdressFacturation()">
                <img src="/assets/images/tm_edit-off.svg" alt="">
            </div>
        </div>

        </div>

    </div>

</div>

<div >

    <div class="panier-mobile-prod-container">
        <div class="mobile-panier-articles-number" style="width: 250px; padding-left: 10px">
            <span class="mobile-panier-libelle">Mode d'expédition</span>
        </div>
        <div class="mobile-panier-acordion-btn" style="width: 50px; ">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-chevron-down" viewBox="0 0 16 16">
                <path fill-rule="evenodd" d="M1.646 4.646a.5.5 0 0 1 .708 0L8 10.293l5.646-5.647a.5.5 0 0 1 .708.708l-6 6a.5.5 0 0 1-.708 0l-6-6a.5.5 0 0 1 0-.708z"/>
            </svg>
            {{-- <i class="fa fa-angle-down fa-row-down-costum"></i> --}}
        </div>
    </div>

    <div class="mobile-panier-articles" id="mobile-panier-articles-expeditiond" style="height: auto; width: 302px; ">
        <div class="expedition-1 vider" id="mobile-mode-expedition-1" onclick="expedition_panier(1)">

            <div class="m-livraison-checkbox">
                <input type="checkbox" data-expedition="default" value="1" id="mobile-expedition-1">
                <label for="mobile-expedition-1"> Livraison par voiture - Gratuit</label>
            </div>
    
            <div class="m-expedition-text">
                <span style="font-size: 10px">
                    Livraison voiture - Gratuit, expédition prévue en 45 min
                </span>
            </div>
    
        </div>

        <div class="expedition-1 vider" id="mobile-mode-expedition-2" onclick="expedition_panier(2)">

            <div class="m-livraison-checkbox">
                <input type="checkbox" data-expedition="default" value="2" id="mobile-expedition-2">
                <label for="mobile-expedition-2"> Livraison par Scooter - Gratuit</label>
            </div>
    
            <div class="m-expedition-text">
                <span style="font-size: 10px">
                    Livraison Scooter - Gratuit, expédition prévue en 45 min
                </span>
            </div>
    
        </div>

        <div class="expedition-1 vider" id="mobile-mode-expedition-3" onclick="expedition_panier(3)">

            <div class="m-livraison-checkbox">
                <input type="checkbox" value="3" data-expedition="default" id="mobile-expedition-3">
                <label for="mobile-expedition-3"> Livraison par Bateau - Gratuit</label>
            </div>
    
            <div class="m-expedition-text">
                <span style="font-size: 10px">
                    Livraison Bateau - Gratuit, expédition prévue en 45 min
                </span>
            </div>
    
        </div>

        <div class="expedition-1 vider" id="mobile-mode-expedition-4" onclick="expedition_panier(4)">

            <div class="m-livraison-checkbox">
                <input type="checkbox" data-expedition="default" value="4" id="mobile-expedition-4">
                <label for="mobile-expedition-4"> Livraison par Avion - Gratuit</label>
            </div>
    
            <div class="m-expedition-text">
                <span style="font-size: 10px">
                    Livraison Avion - Gratuit, expédition prévue en 45 min
                </span>
            </div>
    
        </div>

        <div class="expedition-1 vider" id="mobile-mode-expedition-7" onclick="expedition_panier(7)">

            <div class="m-livraison-checkbox">
                <input type="checkbox" data-expedition="default" value="7" id="mobile-expedition-7">
                <label for="mobile-expedition-7"> Livraison par Train - Gratuit</label>
            </div>
    
            <div class="m-expedition-text">
                <span style="font-size: 10px">
                    Livraison Train - Gratuit, expédition prévue en 45 min
                </span>
            </div>
    
        </div>

    </div>

</div>

<div class="panier-mobile-recapitulatif" >
    @include('front.new_view.panier_composants.recap_prix_panier')
</div>
