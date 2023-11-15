<div class="user-marchand-profil" style="margin-top: -5px ! important">

    <div class="img-marchand" onclick="showMenuProfil()" style="height: 70px; width: 70px; border-radius: 6px">
        @if(isset($_SESSION['boutique_profil_mage']) && $_SESSION['boutique_profil_mage'] != "")
        <img src="{{ $_SESSION['boutique_profil_mage'] }}" alt="" />
        @else

        <div id="avatar-letter" style="border-radius: 6px">
            <div class="boutiqueLetterStyle12 boutiqueLetterStyleBis" style="">
                {{substr($_SESSION['boutique_marchand'], 0, 1)}}
            </div>
        </div>

        @endif

    </div>

    <div class="element-icons" >

        <div class="icons-share-marchand marchand-user-profil" onclick="showMenuProfil()" style="display: flex; justify-content: center; align-items: center">
            <img src="assets/images/User3.svg" alt="" >
        </div>

        <div id="share-boutique-marchand" class="icons-share-marchand img-share-marchand" style="display: flex; justify-content: center; align-items: center; margin-top: 5px">
            <img src="assets/images/Partage_Copy.svg" alt="" >
        </div>

    </div>

</div>

{{-- client en rayons --}}
<div class="next-box-marchand" style="margin-top: -5px ! important">

        <div class="next-box-marchand-text" style="margin-top: -18px">
            Clients en rayon
        </div>

        {{-- <button onclick="triggerEvent()">Test Pusher</button> --}}

    <div class="next-box-marchand-img" style="margin-top: -10px !important" id="userInRayonZoneHead">
        
        <div id="preview-user-in-rayon-1">

        </div>

        <div id="preview-user-in-rayon-2">

        </div>

        <div id="preview-user-in-rayon-3">

        </div>

        <div id="preview-user-in-rayon-4">

        </div>

        <div id="extra-user-in-rayon" class="last-element-text field-none">
            <h6 id="in_rayon_user_counter">+99</h6>
        </div>
        
    </div>

</div>
{{-- client en rayon fin  --}}

<div class="trait-separator"></div>

<div class="menu-marchand-container">
<div class="historique" id="gerer-equipe-menu" style="overflow: auto; height: 70px">

{{-- debut mes boutiques --}}
<li onclick="raccourci1('boutik3', 'boutik1', 'mes-boutiques-contents-id')" id="boutik3" class="marchand-text-menu">
    <img class="marchand-icon-menu marchand-boutique-icon-size" src="assets/images/icones-vendeurs2/icones-menu/boutique.svg" id="boutik1">
    <p style="margin-top:5px;">Mes <br> boutiques</p>
</li>

{{-- afficher les rayon d'une boutique  --}}
<div class="mes-boutiques-contents marchand-menu-content field-none" style="display: flex" id="mes-boutiques-contents-id">
<section class="section-hidden-boutique" id="boutik4">
<article style="" class="prev-element slide-rayon-btn"><img src="assets/images/icones-vendeurs2/chevron_big_left.svg" style="margin-left:2px; margin-top:24px;"></article>
<article style="" class="main-zone-rayon-section">

    <div class="swiper mySwiper">
        <div class="swiper-wrapper">

        </div>
    </div>

</article>

<article style="" class="next-element slide-btn-next-rayon">
    <img src="assets/images/icones-vendeurs2/chevron_big_right.svg" style="margin-left:1.5px; margin-top:24px;">
</article>
</section>

{{-- afficher les rayon d'une boutique fin et debut de l'option par defaut  --}}

<section class="mode-payement-hidden-zone" id="boutik5">
<img class="default-setted valide-none" src="assets/images/icones-vendeurs2/check.svg" >
<div class="rayon-actif-content">
    <article class="modsup modifier-btn-element" style="">
        <a onclick="activeModifierRayon()"style="text-decoration: none;">Modifier</a>
    </article>
    <hr style="margin-left:4px; height: 1px;width: 57px;margin-top:2px;">
    <article onclick="modifierRayon()" class="modsup tm-rayon-par-defaut desable-default-rayon" style="" id="supbtk">
        Par Défaut
    </article>
</div>
    <input type="hidden" id="activeRayonVal" value="" />
</section>

</div>

{{-- Mode de paiement --}}
<li  onclick="raccourci1('paiem3', 'paiem1', 'mode-paiements-content-id')" id="paiem3" class="marchand-text-menu">
<img src="assets/images/icones-vendeurs2/icones-menu/paiement.svg" class="marchand-icon-menu"  id="paiem1" >
<p style="margin-top:7px;">Mode de <br> paiements<p></li>

<div class="mode-paiements-content marchand-menu-content field-none" style="display: flex" id="mode-paiements-content-id">
<section class="section-marchand-payement" id="paiem4">

<article style="" class="section-payement-article-1">
    <img src="/assets/images/icones-vendeurs2/Valide.svg"width="15px" height="15px"; style="margin-top:18px;margin-left:9px;">
</article>

<article class="section-payement-article-2" style="">
    <p style="" class="section-payement-airtel" id="affichageState">Loading...</p>
    <p id="infoMoney" style="" class="section-payement-numero"></p>
</article>

</section>

<section class="section-marchand-payement" id="paiem10">
    <article style="" class="section-payement-article-1">
        <img src="/assets/images/icones-vendeurs2/Valide.svg"width="15px" height="15px"; style="margin-top:18px;margin-left:9px;">
    </article>
    <article class="section-payement-article-2" style="">
        <p style="" class="section-payement-airtel" id="affichageState1">Loading...</p>
        <p id="infoMoney1" style="" class="section-payement-numero">
        </p>
    </article>
</section>

<section class="section-marchand-payement" id="paiem11">
    <article style="" class="section-payement-article-1">
        <img src="/assets/images/icones-vendeurs2/Valide.svg"width="15px" height="15px"; style="margin-top:18px;margin-left:9px;">
    </article>
    <article class="section-payement-article-2" style="">
        <p style="" class="section-payement-airtel" id="affichageState2">Loading...</p>
        <p id="infoMoney2" style="" class="section-payement-numero">
        </p>
    </article>
</section>

<section style=""  class="section-mode-payement-hidden" id="paiem5">
    <div class="paiem5"  id="popMoney" style="height:60px;border-radius:6px;">
    <img src="assets/images/icones-vendeurs2/Mise_à_jour.svg"style="margin-top:10px;">
    <p class="changer-mode-payement" style="">Changer</p></div>
</section>

</div>

{{-- fin mode de paiement et debut tableau de gestion  --}}

<li onclick="raccourci1('tb3', 'tb1', 'tableau-de-gestions-content-id')" id="tb3" class="marchand-text-menu">
<img src="assets/images/icones-vendeurs2/icones-menu/gestion.svg" class="marchand-icon-menu" style="height: 26px; width: 18px;" id="tb1">
<p style="margin-top:5px">Tableau <br>de gestions</p></li>

<div class="tableau-de-gestions-content marchand-menu-content field-none" style="display: flex" id="tableau-de-gestions-content-id">
<section style="" id="tb4" class="section-tableau-zone">
<p style="" class="section-tableau-p-stock">Produits <br>en stock</p>
<hr style="" class="produit-en-stock-bar">
<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel" style="">

<div class="carousel-inner carouss-inner-custom" style="">
    <div class="carousel-item active">
    Cette semaine
    </div>
    <div class="carousel-item">
    Semaine dernière
    </div>
    <div class="carousel-item">
    Il y'a 3 semaines
    </div>
</div>
</div>

<div class="prog blue" style="position: relative; top: -10px">
    <span class="prog-left">
        <span class="prog-bar"></span>
    </span>
    <span class="prog-right">
    <span class="prog-bar"></span>
    </span>

    <div class="prog-value" ><span id="nbre-en-corbeille">0</span></div>
</div>

<img src="assets/images/icones-vendeurs2/Group 31.svg" style="width:80px;height:60px; margin-left:144px;margin-top:-69px">
</section>

<section class="section-nouvelle-commande" style=""id="tb5">
<p style="" class="p-nouvelle-commande">Nouvelles
<br>commandes</p>
<hr style="" class="nouvelle-commande-hr">

<div id="carouselExampleIndicators" class="carousel slide carouss-slider-custom" data-ride="carousel" style="">

<div class="carousel-inner carouss-inner-custom" style="">
    <div class="carousel-item active">
    Cette semaine
    </div>
    <div class="carousel-item">
    Semaine dernière
    </div>
    <div class="carousel-item">
    Il y'a 3 semaines
    </div>
</div>

</div>

<div class="prog yel" style="position: relative; top: -10px">
    <span class="prog-left">
                <span class="prog-bar"></span>
    </span>
    <span class="prog-right">
    <span class="prog-bar"></span>
    </span>

    <div class="prog-value"><img src="assets/images/icones-vendeurs2/Fichier 2@11.svg" style="margin-top:-6.75px;margin-left:-2.35px;"></div>
</div>
<img src="assets/images/icones-vendeurs2/Group 25.svg" style="width:80px;height:60px; margin-left:144px;margin-top:-69px">

</section>

<section style="" id="tb6" class="section-tab6">
<a id="tab3" style="text-decoraction:none;">

<p style="" class="commande-passee" >Commandes <br>passées</p>
<hr style="" class="commande-passee-hr">

<div id="carouselExampleIndicators" class="carousel slide carouss-slide-commande" data-ride="carousel" style="">

<div class="carousel-inner carouss-inner-semaine" style="">
    <div class="carousel-item active">
    Cette semaine
    </div>
    <div class="carousel-item">
    Semaine dernière
    </div>
    <div class="carousel-item">
    Il y'a 3 semaines
    </div>
</div>
</div>

<div class="prog third" style="position: relative; top: -10px">
    <span class="prog-left">
        <span class="prog-bar"></span>
    </span>
    <span class="prog-right">
<span class="prog-bar"></span>
    </span>

    <div class="prog-value"><img src="assets/images/icones-vendeurs2/Fichier 1@11.svg" style="margin-top:-6.75px;margin-left:-2.35px;"></div>
</div>
    <img src="assets/images/icones-vendeurs2/Group 80.svg" style="width:80px;height:60px; margin-left:144px;margin-top:-69px">
</a>
</section>

</div>
{{-- fin tableau de gestion debut historique de code  --}}

<li  onclick="raccourci1('hc3', 'hc1', 'historique-decode-contents-id')"id="hc3" class="marchand-text-menu">
    <img src="assets/images/icones-vendeurs2/icones-menu/codepromo.svg" class="marchand-icon-menu" style=" height: 26px; width: 18px;" id="hc1">
    <br><p style="margin-top:5px">Historique <br>de codes</p>
</li>

<div class="historique-decode-contents marchand-menu-content field-none" style="display: flex;" id="historique-decode-contents-id">
<section class="section-hc4" style=""id="hc4">
    <p style="" class="dernier-code-generer">Dernier code générer</p>
    <img src="assets/images/icones-vendeurs2/Copier_Coller.svg" style="float:right;margin-top:-27px;">
    <article style="" class="zone-code-genere" >XX-XXX-XX</article>
</section>

<section class="section-hc5-zone" style="" id="hc5">
    <article style="" class="paiem5" class="mon-historique-h">Mon historique<br>
    de codes
    </article>
</section>
</div>

{{-- Corbeille --}}
<li onclick="raccourci1('corb3', 'corb1', 'corbeilles-contents-id')"id="corb3" class="marchand-text-menu">
    <img src="assets/images/icones-vendeurs2/icones-menu/corbeille.svg" class="marchand-icon-menu" style="  height: 26px; width: 21px;" id="corb1">
    <br><p style="margin-top:10px">Corbeille</p>
</li>

<div class="corbeilles-contents marchand-menu-content field-none" id="corbeilles-contents-id">
<section style="" class="section-corb4" id="corb4">
<p style="" class="section-corb4-p">Article dans la corbeille</p>
<article class="cobat corbeille-section" style="">
<a style="text-decoration: none;" onclick="showCorbeille()">
    <p style="width: 50px !important" class="corbeille-counter" id="nbre_element-c">999</p>
</a>
<a href="#" onclick="ouvcorb()" ><img src="assets/images/icones-vendeurs2/three-dots.svg"
    style="float: right; margin-top:-33px;"></a>
</article>
<p style="" class="reinitialiser-30" >Réinitialisation 30 j</p>
<article style="" class="article-vidcorb" id="vidcorb">
<div style="height:24px;width:124px;padding-top:6px;text-align:center" class="paiem5" id="viderCorbeilBtn"> Vider la corbeille</div></article>
</section>
</div>

{{-- CREER PROMO --}}

<li  onclick="raccourci1('cp3', 'cp1', 'code-promo-contents-id')" id="cp3" class="marchand-text-menu">
    <img src="assets/images/icones-vendeurs2/icones-menu/promo.svg" class="marchand-icon-menu" style="  height: 26px; width: 27px;" id="cp1">
    <p style="margin-top:5px">Créer<br>une promo</p>
</li>

        <div class="code-promo-contents marchand-menu-content field-none" id="code-promo-contents-id">
            <section style="" class="section-cp4-promo" id="cp4">
            <article style="height:60px;width:100px;margin-top:-5px;padding:2px;">
                <p style="" class="promotion-encours">Promotion en cours</p>
                <p style="" class="solde-month">LES SOLDES<br>DE MAI 2023</p>
            </article>
            <div style="" class="solde-div-element"></div>
            <article style="height:60px;width:150px;margin-left:105px;margin-top:-60px;padding:5px;">
            <aside style="" class="historique-decode-aside">

            <a style="text-decoration: none;" onclick="cliquesXXX()">
                XXXXX Cliques
            </a>

            </aside>
            <aside style="" class="aside-nbre-usersddd historique-decode-aside-1">
            <a style="text-decoration: none;" onclick="utilisateursXXX()">XXXXX
            Utilisateurs
            </aside>
            <aside id="clikF">
            {{-- Lundi --}}
            <aside style="" class="aside-element-description">
                <article style="" class="article-zone-neutre"></article>
            </aside>

            <p style="" class="p-element-zone-l">L</p>
            {{-- Mardi --}}
            <aside style="" class="aside-element-m">
            <article class="article-mardi-parent" style=""></article></aside>
            <p class="aside-element-mardi">M</p>

            {{-- Mercredi --}}
            <aside class="aside-element-mercredi" >
            <article class="article-element-mercredi" >

            </article>
            </aside>
            <p class="mercredi-p-element" >M</p>
            {{-- Jeudi --}}
            <aside class="aside-jeudi-element">
                <article class="article-jeudi-element" ></article></aside>
            <p class="p-jeudi-element" >J</p>
            {{-- Vendredi --}}
            <aside class="aside-vendredi-element" >
            <article class="article-vendredi-element"  >
            </article>
            </aside>
            <p class="p-vendredi-element">V</p>

                {{-- Samedi --}}
                <aside class="aside-samedi-element" >
                <article class="article-samedi-element" >
                    </article>
                </aside>
                <p class="p-samedi-element" >S</p>

                {{-- Click bleu --}}
                <aside id="clikU" style="display: none;">
                    {{-- Lundi --}}
                    <aside class="aside-lundi-element-1" >
                        <article class="article-lundi-element-1"></article></aside>
                    <p class="p-lundi-element-1" >L</p>

                {{-- Mardi --}}
                <aside class="aside-mardi-element-1">
                    <article class="article-mardi-element-1" ></article></aside>
                <p class="p-mardi-element-1">M</p>
                {{-- Mercredi --}}
                <aside class="aside-mercredi-element-1">
                <article class="article-mercredi-element-1" ></article></aside>
                <p class="p-mercredi-element-1" >M</p>
                {{-- Jeudi --}}
                <aside class="aside-jeudi-element-1" >
                    <article class="article-jeudi-element-1"></article></aside>
                <p class="p-jeudi-element-1">J</p>
            {{-- Vendredi --}}
            <aside class="aside-vendredi-elemen-1">
                <article class="article-vendredi-element-1" ></article></aside>
                <p class="p-vendredi-element" >V</p>

            {{-- Samedi --}}
            <aside class="aside-element-samedi-1" >
                <article class="article-samedi-element-1" ></article></aside>
            <p class="p-samedi-element-1" >S</p>

            {{-- Dimanche --}}
            <aside class="aside-dimande-element-1" >
                <article class="article-dimande-element-1"></article></aside>
            <p class="p-dimanche-element-1">D</p>
                    </aside>
                    <style>
                        .aside-dimande-element-1 {
                            height: 43px;
                            width: 6px;
                            border-radius: 4px 4px 0 0;
                            background-color: #E5E9F2;
                            margin-top:-67px;margin-left:132px;
                            padding-top:20px;
                        }
                    </style>
            </article>
            <div class="div-unknow-element-1" ></div>

                <div class="progres" style="margin-left:263px;">
                    <div class="barOverflow">
                    <div class="bar"></div>

                    </div>
                    <span class="jours-restant-element-1" >27 j<br><p class="j-restant-p" >restant</p></span>
                </div>

                <a onclick="opt()">
                    <img src="assets/images/icones-vendeurs2/three-dots.svg" class="icon-trois-point">
                </a>
                <article class="article-unknowed-1" id="opt1">
                <aside class="aside-unkowed-element-1">
                    <div class="mesch arreter-promos">Arrêter la promo</div></aside>
                <aside class="arreter-promo-child">
                <div class="mesch mesch-custom-1">Modifier la promo</div></aside>
                <aside class="aside-unkowed-element-2">
                    <div class="mesch mesch-custom-2">Supprimer la promo</div></aside>
                </article>
                </section>
          </div>

          <button style="position: relative; margin-left: 5px; display: none" class="retour_pvit_test" onclick="give_pvit_try()">Give it try</button>

        </div>
</div>
<div>
</div>

<script>

    function give_pvit_try() {
        $.ajax({
        type: 'POST',
        url: '/retour_pvit_test',
        data: {},
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        success: function(response) {
            console.log('you did it', response)
        }
        })
        console.log('Today give me pvit callback oh lord')
    }

    function triggerEvent() {
        $.ajax({
        type: 'POST',
        url: '/send_ebelling_payement',
        data: {},
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        success: function(response) {
            console.log(response)
            // console.log('you did it', response)
        }
        })
        // console.log('Looking to trigger laravel event')
    }

</script>

