

    <style>
        @import url('https://fonts.googleapis.com/css2?family=Roboto&display=swap');
        .modal-content-mode-paiement-marchand,
        .modal-body-mode-paiement-marchand {
            width: 1212px !important;
            height: 579px !important;
            border-radius: 6px;
            background-color: #F8F8F8;
            box-shadow: 0 5px 15px 0 rgba(0, 0, 0, 0.5);
        }

        .modal-body {
            margin: 0px;
            padding: 0px;
        }

        .modal-dialog-mode-paiement-marchand {
            position: relative;
            left: -350px;
            top: 60px;
        }

        .form-control {
            font-size: 14px;
            color: #9B9B9B;
        }
        .blockcs{
            opacity: 0.5;
            pointer-events: none;
        }

        .mbtn1:hover{
            color: #FFFFFF;
            background-color: #146FDA !important;
        }

        .mbtn2:hover{
            background-color: #F5F5F5 !important;
        }

        .trash:hover{
            filter: invert(16%) sepia(70%) saturate(5409%) hue-rotate(345deg) brightness(78%) contrast(112%);
        }

        .btn-active001{
            border: 1px solid #1A7EF5;
            background-color: #1A7EF5 !important;

        }

        .img_bgk {
            background-color: #9B9B9B !important;
            pointer-events: none;
        }


        /* TOOL TIP */

        .tooltips {
                position: relative;
                display: inline-block;
            }

            .tooltips .tooltiptext {
                visibility: hidden;
                height: 76px;
                width: 273.55px;
                border-radius: 6px;
                background-color: #FFFFFF;
                box-shadow: 0 0 6px 0 rgba(0,0,0,0.5);
                /* background-color: #555; */

                text-align: justify;
                border-radius: 6px;
                /* padding: 10px; */
                position: absolute;
                z-index: 1;
                /* bottom: 125%; */
                top: -29px;
                left: 104%;
                margin-left: 6px;
                opacity: 0;
                transition: opacity 0.3s;

                color: #191970;
                font-family: Roboto;
                font-size: 12px;
                letter-spacing: 0;
                line-height: 13px;

            }

            .tooltips .tooltiptext::after {
                content: "";
                position: absolute;
                top: 31px;
                left: 100%;
                margin-left: -283px;
                border-width: 5px;
                border-style: solid;
                border-color: #fff transparent transparent transparent;
                transform: translateX(-50%);
            }

            .tooltips:hover .tooltiptext {
                visibility: visible;
                opacity: 1;

            }

            .tooltiptext p {
                height: 56px;
                width: 241px;
                color: #191970;
                font-family: Roboto;
                font-size: 12px;
                letter-spacing: 0;
                line-height: 13px;
                justify-content: center;
                text-align: justify;
                margin-top: 12px;
                margin-left: 15px
            }














    </style>

</head>

<body>

    <div class="overlay">

        <!-- The Modal -->
        <div class="modal modal-marchand-close" id="modePaiementMarchand1">
            <div class="modal-dialog modal-dialog-mode-paiement-marchand">
                <div class="modal-content modal-content-mode-paiement-marchand">
                    <div style="margin-top:5px;">
                        @include('front.app-module.marchand.marchand-modals.marchand-profil-data')
                        <div style="border:1px solid #D8D8D8;border-radius: 5px;margin-top:-80px;position: absolute;margin-left: 334px; width:873px;height: 80px;background-color: white; display: flex; flex-direction: column; justify-content: center; align-items: center">

                            {{-- @include('front.app-module.marchand.marchand-modals.menu-modal-marchand') --}}

                            {{-- Menu --}}
                            @auth
@if (\Illuminate\Support\Facades\Auth::user()->role == 2)



    <div class="historique-code" id="gerer-equipe-menu">
        <li data-id="infomarch" class="marie" style="margin-left:0px;"><img src="assets/images/icones-vendeurs2/icones-menu/info-marche.svg"><br><br><p style="margin-top:3px ;">Info. du <br> marché</p></li>
        <li  data-id="gererEquipe" class="marie" ><img src="assets/images/icones-vendeurs2/icones-menu/gestionequipe.svg"><br><br><p style="margin-top:2px">Gestion d'équipe</p></li>
        <li  class="marie"><img src="assets/images/icones-vendeurs2/icones-menu/gestionstock.svg"><br><br><p style="margin-top:2px">Gestion <br>de  stocks</p></li>
        <li data-id="msgMarchand" class="marie"><img src="assets/images/icones-vendeurs2/icones-menu/messagerie.svg"><br><br><br><p style="margin-top:2px">Messagerie</p></li>
        <li data-id="commandedet" class="marie"><img src="assets/images/icones-vendeurs2/icones-menu/commande.svg"><br><br><p style="margin-top:3px">Mes <br>commandes</p></li>
        <li  data-id="modePaiementMarchand1" style="margin-bottom ;color: #1A7EF5;border:1px solid #1A7EF5;background-color:#F8F8F8" class="marie"><img src="assets/images/icones-vendeurs2/icones-menu/paiementbleu.svg" ><br><p style="margin-top:15px;">Mode de <br> paiements<p></li>
        <li data-id="tbMarchand" class="marie"><img src="assets/images/icones-vendeurs2/icones-menu/gestion.svg"><br><br><p style="margin-top:2px">Tableau <br>de gestions</p></li>
        <li  data-id="historiqueCode" data-id="genererCode" class="marie" ><img src="assets/images/icones-vendeurs2/icones-menu/codepromo.svg"><br><br><p style="margin-top:2px">Historique <br>de codes</p></li>
        <li  data-id="nouvellePromo" class="marie"><img src="assets/images/icones-vendeurs2/icones-menu/promo.svg"><br><br><p style="margin-top:2px">Créer<br>une promo</p></li>
        <li  data-id = "articleCorbeille" class="marie"><img src="assets/images/icones-vendeurs2/icones-menu/corbeille.svg"><br><br><br><p style="margin-top:2px">Corbeille</p></li>
        <li  data-id="gestMenu" class="marie"><img src="assets/images/icones-vendeurs2/icones-menu/gestionmenu.svg"><br><br><p style="margin-top:2px">Gestion <br>des menus</p></li>

    </div>
@elseif (\Illuminate\Support\Facades\Auth::user()->role == 4) {{-- Editeur --}}
    <div class="historique-code" id="gerer-equipe-menu">
        <li data-id="infomarch" class="marie" style="margin-left:0px;"><><img src="assets/images/icones-vendeurs2/icones-menu/info-marche.svg"><br><br>Info. du <br> marché</li>
        <li  data-id="gererEquipe" class="marie" style="pointer-events:none;opacity:0.6;"><img src="assets/images/icones-vendeurs2/icones-menu/gestionequipe.svg"><br><br>Gestion d'équipe</li>
        <li  class="marie" style="pointer-events:none;opacity:0.6;"><img src="assets/images/icones-vendeurs2/icones-menu/gestionstock.svg"><br><br>Gestion <br>de stocks</li>
        <li data-id="msgMarchand"  class="marie" style="pointer-events:none;opacity:0.6;"><img src="assets/images/icones-vendeurs2/icones-menu/messagerie.svg"><br><br><br>Messagerie</li>
        <li data-id="commandedet" class="marie"><img src="assets/images/icones-vendeurs2/icones-menu/commande.svg"><br><br><p style="margin-top:3px">Mes <br>commandes</p></li>
        <li  data-id="modePaiementMarchand1" class="marie" style="pointer-events:none;opacity:0.6;"><img src="assets/images/icones-vendeurs2/icones-menu/paiementbleu.svg" ><br><br><br>Mode de <br>paiements</li>
        <li data-id="tbMarchand" class="marie" style="color: #1A7EF5"><img src="assets/images/icones-vendeurs2/icones-menu/gestion.svg"><br><br>Tableau <br>de gestions</li>
        <li  data-id="historiqueCode" data-id="genererCode" class="marie" style="pointer-events:none;opacity:0.6;"><img src="assets/images/icones-vendeurs2/icones-menu/codepromo.svg"><br><br>Historique <br>de codes</li>
        <li  data-id="nouvellePromo" class="marie"><img src="assets/images/icones-vendeurs2/icones-menu/promo.svg"><br><br>Créer <br> une promo</li>
        <li  data-id = "articleCorbeille" class="marie"><img src="assets/images/icones-vendeurs2/icones-menu/corbeille.svg"><br><br><br>Corbeille</li>
        <li  data-id="gestMenu" class="marie"><img src="assets/images/icones-vendeurs2/icones-menu/gestionmenu.svg" style="pointer-events:none;opacity:0.6;"><br><br>Gestion <br>des menus</li>
    </div>
@elseif (\Illuminate\Support\Facades\Auth::user()->role == 5) {{-- Demarcheur --}}
    <div class="gerer-equipe-menu" id="gerer-equipe-menu">
        <li data-id="infomarch" class="marie"style="margin-left:0px;"><><img src="assets/images/icones-vendeurs2/icones-menu/info-marche.svg"><br><br>Info.du <br> marché</li>
        <li  data-id="gererEquipe" class="marie" style="pointer-events:none;opacity:0.6;"><img src="assets/images/icones-vendeurs2/icones-menu/gestionequipe.svg"><br><br>Gestion d'équipe</li>
        <li  class="marie" style="pointer-events:none;opacity:0.6;"><img src="assets/images/icones-vendeurs2/icones-menu/gestionstock.svg"><br><br>Gestion <br>de stocks</li>
        <li data-id="msgMarchand"  class="marie" style="color: #1A7EF5"><img src="assets/images/icones-vendeurs2/icones-menu/messagerie.svg"><br><br><br>Messagerie</li>
        <li data-id="commandedet" class="marie"><img src="assets/images/icones-vendeurs2/icones-menu/commande.svg"><br><br><p style="margin-top:3px">Mes <br>commandes</p></li>
        <li  data-id="modePaiementMarchand1" class="marie" style="pointer-events:none;opacity:0.6;"><img src="assets/images/icones-vendeurs2/icones-menu/paiementbleu.svg" ><br><br><br>Mode de <br>paiements</li>
        <li data-id="tbMarchand" class="marie" style="pointer-events:none;opacity:0.6;"><img src="assets/images/icones-vendeurs2/icones-menu/gestion.svg"><br><br>Tableau <br>de gestions</li>
        <li  data-id="historiqueCode" data-id="genererCode" class="marie"><img src="assets/images/icones-vendeurs2/icones-menu/codepromo.svg"><br><br>Historique <br>de codes</li>
        <li  data-id="nouvellePromo" class="marie" style="pointer-events:none;opacity:0.6;"><img src="assets/images/icones-vendeurs2/icones-menu/promo.svg"><br><br>Créer <br>une promo</li>
        <li  data-id = "articleCorbeille" class="marie" style="pointer-events:none;opacity:0.6;"><img src="assets/images/icones-vendeurs2/icones-menu/corbeille.svg"><br><br><br>Corbeille</li>
        <li  data-id="gestMenu" class="marie" style="pointer-events:none;opacity:0.6;"><img src="assets/images/icones-vendeurs2/icones-menu/gestionmenu.svg"><br><br>Gestion <br>des menus</li>
    </div>
@elseif (\Illuminate\Support\Facades\Auth::user()->role == 6) {{-- Membre --}}
    <div class="gerer-equipe-menu" id="gerer-equipe-menu">
        <li data-id="infomarch" class="marie" style="color: #1A7EF5;margin-left:0px;"><img src="assets/images/icones-vendeurs2/icones-menu/info-marche.svg"><br><br>Info.<br> du marché</li>
        <li  data-id="gererEquipe" class="marie" style="pointer-events:none;opacity:0.6;"><img src="assets/images/icones-vendeurs2/icones-menu/gestionequipe.svg"><br><br>Gestion d'équipe</li>
        <li  class="marie" style="pointer-events:none;opacity:0.6;"><img src="assets/images/icones-vendeurs2/icones-menu/gestionstock.svg"><br><br>Gestion <br>de stocks</li>
        <li data-id="msgMarchand"  class="marie" style="pointer-events:none;opacity:0.6;"><img src="assets/images/icones-vendeurs2/icones-menu/messagerie.svg"><br><br><br>Messagerie</li>
        <li data-id="commandedet" class="marie"><img src="assets/images/icones-vendeurs2/icones-menu/commande.svg"><br><br><p style="margin-top:3px">Mes <br>commandes</p></li>
        <li  data-id="modePaiementMarchand1" class="marie" ><img src="assets/images/icones-vendeurs2/icones-menu/paiementbleu.svg" ><br><br><br>Mode <br>de paiements</li>
        <li data-id="tbMarchand" class="marie" style="pointer-events:none;opacity:0.6;"><img src="assets/images/icones-vendeurs2/icones-menu/gestion.svg"><br><br>Tableau <br>de gestions</li>
        <li  data-id="historiqueCode" data-id="genererCode" class="marie" style="pointer-events:none;opacity:0.6;"><img src="assets/images/icones-vendeurs2/icones-menu/codepromo.svg"><br><br>Historique <br>de codes</li>
        <li  data-id="nouvellePromo" class="marie" style="pointer-events:none;opacity:0.6;"><img src="assets/images/icones-vendeurs2/icones-menu/promo.svg"><br><br>Créer <br>une promo</li>
        <li  data-id = "articleCorbeille" class="marie" style="pointer-events:none;opacity:0.6;"><img src="assets/images/icones-vendeurs2/icones-menu/corbeille.svg"><br><br><br>Corbeille</li>
        <li  data-id="gestMenu" class="marie" style="pointer-events:none;opacity:0.6;"><img src="assets/images/icones-vendeurs2/icones-menu/gestionmenu.svg"><br><br>Gestion <br>des menus</li>
    </div>
@elseif (\Illuminate\Support\Facades\Auth::user()->role == 7) {{-- Gérant --}}
<div class="gerer-equipe-menu" id="gerer-equipe-menu">
    <li  data-id="infomarch"class="marie" style="margin-left:0px;"><><img src="assets/images/icones-vendeurs2/icones-menu/info-marche.svg" style="color: #1A7EF5"><br><br>Info. du <br>marché</li>
    <li  data-id="gererEquipe" class="marie" style="pointer-events:none;opacity:0.6;"><img src="assets/images/icones-vendeurs2/icones-menu/gestionequipe.svg"><br><br>Gestion d'équipe</li>
    <li  class="marie"><img src="assets/images/icones-vendeurs2/icones-menu/gestionstock.svg"><br><br>Gestion <br>de  stocks</li>
    <li data-id="msgMarchand"  class="marie"><img src="assets/images/icones-vendeurs2/icones-menu/messagerie.svg"><br><br><br>Messagerie</li>
    <li data-id="commandedet" class="marie"><img src="assets/images/icones-vendeurs2/icones-menu/commande.svg"><br><br><p style="margin-top:3px">Mes <br>commandes</p></li>
    <li  data-id="modePaiementMarchand1" class="marie"><img src="assets/images/icones-vendeurs2/icones-menu/paiementbleu.svg" ><br><br><br>Mode <br> de paiements</li>
    <li data-id="tbMarchand" class="marie"><img src="assets/images/icones-vendeurs2/icones-menu/gestion.svg"><br><br>Tableau <br>de gestions</li>
    <li  data-id="historiqueCode" data-id="genererCode" class="marie" style="color: #1A7EF5;border:1px solid #1A7EF5;background-color:#F8F8F8"><img src="assets/images/icones-vendeurs2/icones-menu/codepromo.svg"><br><br>Historique <br> de codes</li>
    <li  data-id="nouvellePromo" class="marie"><img src="assets/images/icones-vendeurs2/icones-menu/promo.svg"><br><br>Créer <br>une promo</li>
    <li  data-id = "articleCorbeille" class="marie"><img src="assets/images/icones-vendeurs2/icones-menu/corbeille.svg"><br><br><br>Corbeille</li>
    <li  data-id="gestMenu" class="marie"><img src="assets/images/icones-vendeurs2/icones-menu/gestionmenu.svg"><br><br>Gestion <br>des menus</li>
</div>
@else
    <div class="gerer-equipe-menu" id="gerer-equipe-menu">
        <li data-id="infomarch" class="marie" style="color: #1A7EF5;margin-left:0px;"><img src="assets/images/icones-vendeurs2/icones-menu/info-marche.svg"><br><br>Info. du<br> marché</li>
        <li  data-id="gererEquipe" class="marie" style="pointer-events:none;opacity:0.6;"><img src="assets/images/icones-vendeurs2/icones-menu/gestionequipe.svg"><br><br>Gestion d'équipe</li>
        <li  class="marie" style="pointer-events:none;opacity:0.6;"><img src="assets/images/icones-vendeurs2/icones-menu/gestionstock.svg"><br><br>Gestion <br>de stocks</li>
        <li data-id="msgMarchand"  class="marie" style="pointer-events:none;opacity:0.6;"><img src="assets/images/icones-vendeurs2/icones-menu/messagerie.svg"><br><br><br>Messagerie</li>
        <li data-id="commandedet" class="marie"><img src="assets/images/icones-vendeurs2/icones-menu/commande.svg"><br><br><p style="margin-top:3px">Mes <br>commandes</p></li>
        <li  data-id="modePaiementMarchand1" class="marie" style="pointer-events:none;opacity:0.6;"><img src="assets/images/icones-vendeurs2/icones-menu/paiementbleu.svg" ><br><br><br>Mode de <br> paiements</li>
        <li  data-id="tbMarchand"class="marie" style="pointer-events:none;opacity:0.6;"><img src="assets/images/icones-vendeurs2/icones-menu/gestion.svg"><br><br>Tableau <br> de gestions</li>
        <li  data-id="historiqueCode" data-id="genererCode" class="marie" style="pointer-events:none;opacity:0.6;"><img src="assets/images/icones-vendeurs2/icones-menu/codepromo.svg"><br><br>Historique<br> de codes</li>
        <li  data-id="nouvellePromo" class="marie" style="pointer-events:none;opacity:0.6;"><img src="assets/images/icones-vendeurs2/icones-menu/promo.svg"><br><br>Créer <br>une promo</li>
        <li  data-id = "articleCorbeille" class="marie" style="pointer-events:none;opacity:0.6;"><img src="assets/images/icones-vendeurs2/icones-menu/corbeille.svg"><br><br><br>Corbeille</li>
        <li  data-id="gestMenu" class="marie" style="pointer-events:none;opacity:0.6;"><img src="assets/images/icones-vendeurs2/icones-menu/gestionmenu.svg"><br><br>Gestion <br> des menus</li>
    </div>
@endif
@endauth


            </div>
            </div>

                    <div class="container"  style="margin-left: 5px;">

                            <div style="border:1px solid #D8D8D8;border-top-left-radius:5px;width: 595px;height:39px;margin-top: 10px;margin-left:-10px; background-color: white;">
                                <h4 style="font-size: 18px;color: #191970; border: 1px; padding-top: 10px;text-align: center; ">
                                    Ajouter une carte de credit ou de débit
                                </h4>
                            </div>
                            <div style="border:1px solid #D8D8D8;border-top-right-radius:5px;width: 602px;height:39px;margin-right:5px;margin-top: 10px; background-color: white;margin-left:585px;margin-top:-39px;">
                                <h4 style="font-size: 18px;color: #191970; border: 1px; padding-top:10px;text-align: center; ">
                                    Ajouter un servce bancaire mobile
                                </h4>
                            </div>




                            <div style="border-right:1px solid #D8D8D8;border-left:1px solid#D8D8D8;width: 595px;margin-left:-10px;height: 36px; padding-top:7px;height:36px; ">
                                <p style="color: #191970; text-align: center;font-size: 13px;"> TOULÈ Market accepte la plupart des cartes de paiement : <img src="/assets/images/icones-vendeurs2/CB.svg" width="112px" height="22px;"> </p>
                            </div>
                            <div  style="border-right:1px solid#D8D8D8;;width: 602px;margin-right: 5px;height: 36px;padding-top: 7px; height:36px;margin-left:585px;margin-top:-36px">
                                <p style="color: #191970; text-align: center;font-size: 13px;"> Service de paiement 100% sécurisée : <img src="assets/images/icones-vendeurs2/Mobile banking.svg" width="73px" height="22px;"> </p>
                            </div>
                        </div>




                            <div style="color:#191970; border: 1px solid #D8D8D8;font-size: 14px;padding-top:30px; width: 595px;margin-left:7px;border-bottom-left-radius:5px;;background-color:#FFFFFF;height:404px;">

                                <div class="container" style="padding-right:5%;padding-left: 15%;padding-bottom:10px;">

                                    <section id="cartecredit1">
                                        <label for="exampleFormControlInput1" class="form-label" style="  height: 15px;
                                        width: 114px;
                                        color: #191970;
                                        font-family: Roboto;
                                        font-size: 14px;
                                        font-weight: 500;
                                        letter-spacing: -0.34px;
                                        line-height: 15px;">Numero de la carte </label>





                        <input type="text" class="disap" id="card_number01" onkeyup="getCardType(this.value)"  placeholder="4598 **** **** ****" style="margin-top: -5px; background-color: #F8F8F8;width: 402px;height: 41px;border-radius:6px;border:1px solid#9B9B9B;padding-left:15px;">

                            <span class="visa hide" style="margin-top: -7px;
                                background-color: #F8F8F8;
                                background-image: url(assets/images/icones-vendeurs2/Visa.svg);
                                background-repeat: no-repeat;
                                background-position: right;
                                width: 34px;
                                height: 22px;
                                display: inline-block;
                                padding-left: 34px;
                                padding-right: 6px;
                                margin-left: -54px;
                                margin-bottom: -6px;">
                            </span>



                            <span class="master1" style="margin-top: -7px;
                            background-color: #F8F8F8;
                            background-image: url(assets/images/icones-vendeurs2/Mastercard.svg);
                            background-repeat: no-repeat;
                            background-position: right;
                            width: 34px;
                            height: 22px;
                            display: inline-block;
                            padding-left: 34px;
                            padding-right: 6px;
                            margin-left: -54px;
                            margin-bottom: -6px;">
                            </span>



                            <span class="jcb hide" style="margin-top: -7px;
                                background-color: #F8F8F8;
                                background-image: url(/assets/images/icones-vendeurs2/CB.svg);
                                background-repeat: no-repeat;
                                background-position: right;
                                width: 34px;
                                height: 22px;
                                display: inline-block;

                                padding-left: 34px;
                                padding-right: 6px;
                                margin-left: -54px;
                                margin-bottom: -6px;">
                            </span>


                             <div id="cardType"  class="hide" style="margin-left:5px; font-weight: 600"></div>

                                        <label for="exampleFormControlInput1" class="form-label" style="margin-top:15px;  height: 15px;
                                        width: 114px;
                                        color: #191970;
                                        font-family: Roboto;
                                        font-size: 14px;
                                        font-weight: 500;
                                        letter-spacing: -0.34px;
                                        line-height: 15px;">Nom sur la carte</label>
                                        <input type="text"  id="card_name01" placeholder="Ex: MOUSSAVOU Ulrich" onkeyup="letterOnly(this)" style="background-color: #F8F8F8;width: 402px;height: 41px;margin-top: -5px;border-radius:6px;border:1px solid#9B9B9B;padding-left:15px;">
                                        <div class=" row ">
                                            <div class="col " style="margin-left: -10px;">
                                                <label for="exampleFormControlInput1 " class="form-label " style="margin-top: 15px;  height: 15px;
                                                width: 114px;
                                                color: #191970;
                                                font-family: Roboto;
                                                font-size: 14px;
                                                font-weight: 500;
                                                letter-spacing: -0.34px;
                                                line-height: 15px;"> Date d'expiration</label>
                                                <input type="text" maxlength='5' id="expiry_date01" placeholder="MM/AA" onkeyup="formatString(event);" style="margin-top:-5px;background-color: #F8F8F8;width: 194px;height: 41px;border-radius:6px;border:1px solid#9B9B9B;padding-left:15px;">
                                            </div>
                                            <div class="col" style="margin-left: -14%;">
                                                <label for="exampleFormControlInput1" class="form-label" style="margin-top: 15px;
                                                color: #191970;
                                                font-family: Roboto;
                                                font-size: 14px;
                                                font-weight: 500;
                                                letter-spacing: -0.34px;
                                                line-height: 15px;">Code de sécurité (CVV)</label>

                                                <input type="text" id="cvv_01" placeholder="Ex: 111" style="margin-top: -5px; background-color: #F8F8F8;
                                                background-size: 20px; background-position: right;width: 194px;height: 41px; border-radius:6px;border:1px solid#9B9B9B;padding-left:15px;padding-right:10px;">




                                                <small class="tooltips"
                                                style="margin-top: -7px;
                                                    background-color: #F8F8F8;
                                                    background-image: url(assets/images/icones-vendeurs2/infoB.svg);
                                                    background-repeat: no-repeat;
                                                    background-position: right;
                                                    width: 34px;
                                                    height: 22px;
                                                    display: inline-block;
                                                    padding-left: 34px;
                                                    padding-right: 6px;
                                                    margin-left: -54px;
                                                    margin-bottom: -6px;">
                                                    <span class="tooltiptext"><p>
                                                    le numéro CVV correspond aux trois derniers chiffres au dos de votre carte.
                                                    </p></span>

                                                </small>





                                            </div>

                                        </div>


                                        <div class="col-12 ">
                                            <div class="form-check" style="margin-left:11px;margin-top:10px;">
                                                <input class="form-check-input" type="checkbox" checked value="" id="flexCheckDefault1"  >
                                                <label class="form-check-label" for="flexCheckDefault"style=" color: #000000;
                                                font-family: Roboto;
                                                font-size: 13px;
                                                letter-spacing: -0.31px;
                                                line-height: 18px; margin-left:2px;margin-top:2px;">
                                            Définir en tant que mode de paiement par défaut
                                        </label>
                                            </div>
                                        </div>

                                        <div class="row" style="margin-top:63px;  height: 18px;
                                                    color: #FFFFFF;
                                                    font-family: Roboto;
                                                    font-size: 14px;
                                                    font-weight: 500;
                                                    letter-spacing: 0.31px;line-height: 18px;text-align: center; padding-right:86px; " >

                                            <div class="d-grid gap-2 col mx-auto">
                                                <button type="submit" id="CancelMoney" class="mbtn-text-0 mbtn2 "  value="" style="width: 164px;
                                                height: 37px;
                                                background-color: #FFFFFF;
                                                border-radius: 6px;
                                                color: #1A7EF5 !important;
                                                border: 1px solid #1A7EF5 !important;
                                                text-align: center;
                                                font-size: 16px;
                                                margin-top: 10px;
                                                margin-left:10%">Annuler
                                                </button>
                                            </div>




                                            <div class="d-grid gap-2 col mx-auto ">
                                                <button type="submit" id="modifMarchandMoney" class="mbtn-text-0 mbtn1 "  value="" style="width: 164px;height:37px;background-color:#1A7EF5; border-radius: 6px; color:#1A7EF5;border:1px solid #1A7EF5;color:white;text-align:center;font-size:16px; border-color: transparent !important; margin-top:10px;">Soumettre
                                                <span class="spinner-border hide" id="money_spiner-resend" role="status" aria-hidden="true"></span>
                                                </button>

                                            <button type="submit" id="regMarchandMoney" class="mbtn-text-0 mbtn1 hide"  value="" style="width: 164px;height:37px;background-color:#1A7EF5; border-radius: 6px; color:#1A7EF5;border:1px solid #1A7EF5;color:white;text-align:center;font-size:16px; border-color: transparent !important; margin-left: -93px;">Soumettre
                                                <span class="spinner-border hide" id="regmoney_spiner-resend" role="status" aria-hidden="true"></span>
                                            </button>
                                            </div>

                                        </div>
                                    </section>


                                    {{-- Carte de credit Suite --}}
                                    <section id="cartecredit2" class="hide" style=" padding-top: 70px; padding-right:30px;margin-left:-45px;">
                                        <img src="assets/images/icones-vendeurs2/check copy.svg" width="30px" height="30px" style="margin-left: 230px;">
                                        <h4 style="  color: #1A7EF5;
                                        font-family: Roboto;
                                        font-size: 18px;
                                        font-weight: 900;
                                        letter-spacing: 2;
                                        line-height: 20px;
                                        text-align: center;margin-top: 10px;">CARTE AJOUTÉE
                                        </h4>
                                        <article id="infoCredit" style="  height: 30px;
                                        width: 216px;
                                        border: 1px solid #00B517;
                                        border-radius: 6px; text-align:center;  color: #191970;
                                        font-family: Roboto;
                                        font-size: 15px;
                                        font-weight: 500;
                                        letter-spacing: 0;
                                        line-height: 15px;padding-top:7px; background-color: #E3F7E6;margin-top:15px;margin-left:137px;">Visa **** 2898</article>


                                        <div class="row " style="margin-top: 116.2px;font-size: 16px;  height: 18px;
                                        color: #FFFFFF;
                                        font-family: Roboto;
                                        font-size: 14px;
                                        font-weight: 500;
                                        letter-spacing: 0.31px;line-height: 18px;text-align: center;margin-left:12px; ">



                                            <div class="d-grid gap-2 col-6 mx-auto ">
                                                <button type="submit" value="Annuler" id="deleteCarte" class="mbtn-text-0 mbtn2"  style="
                                                width: 194px;
                                                height:37px;
                                                margin-right:0%;
                                                margin-top:20px;margin-left:23px;padding-right: 0%;
                                                color:#1A7EF5;
                                                border:1px solid #1A7EF5;
                                                border-radius:6px;
                                                font-size:16px;
                                                background-color:#FFFFFF"
                                                onclick="returncartecreditk()">Supprimer la carte
                                                <span class="spinner-border hide" id="delete_m_spiner-resend" role="status" aria-hidden="true"></span>
                                                </button>
                                            </div>
                                            <div class="d-grid gap-2 col-6 mx-auto ">
                                                <button type="submit" value="" class="mbtn1" id="creditModify" style="width: 194px;height:37px;margin-left:-3%;margin-right: 42%; margin-top:20px; border-radius: 6px;background-color:#1A7EF5;border:1px solid #1A7EF5;font-size:16px;color: white;">Modifier la carte </button>
                                                <button type="submit" value="" class="mbtn1  hide" id="creditCreate" style="width: 194px;height:37px;margin-left:-45%;margin-right: 42%; border-radius: 6px;background-color:#1A7EF5;border:1px solid #1A7EF5;font-size:16px;color: white;">Creer </button>
                                            </div>


                                        </div>
                                    </section>

                                    </div>
                            </div>



                                {{-- Zone service banque --}}
                            <div   style="color:#191970; font-size: 14px;padding-top:30px;padding-bottom: 0%; border: 1px solid #D8D8D8;width: 602px; margin-left:602px;margin-top:-404px;height:404px;border-bottom-right-radius: 5px;background-color:#FFFFFF;">

                                <div class="container " style="padding-left: 17%; ">
                                    <section id="servicebk1">
                                    <label for="exampleFormControlInput1 " class="form-label " style="text-align: left;   color: #191970;
                                    font-family: Roboto;
                                    font-size: 14px;
                                    font-weight: 500;
                                    letter-spacing: -0.34px;
                                    line-height: 16px;">Airtel Money (Gabon)</label>
                                    <input type="text" id="A_money" class="koko" placeholder="Nom marchand airtel" onkeyup="letterOnly(this)"  style="background-color: #F8F8F8; width: 402px; height: 41px;margin-top:-5px;border-radius:6px; border:1px solid#9B9B9B;padding-left:15px;">
                                    <input type="text " id="numero_marchandA"  class="koko" maxlength='12' placeholder="Code marchand" style="background-color: #F8F8F8;width: 402px;height:41px;margin-top:10px;border-radius:6px; border:1px solid#9B9B9B;padding-left:15px;">
                                    <label for="exampleFormControlInput1" class="form-label " style="text-align: left;   color: #191970;
                                    font-family: Roboto;
                                    font-size: 14px;
                                    font-weight: 500;
                                    letter-spacing: -0.34px;
                                    line-height: 16px; margin-top:15px;">Moov Money (Gabon)</label>
                                    <input type="text "  id="Mmoney" class="kokot" placeholder="Nom marchand moov money"  onkeyup="letterOnly(this)" style="background-color: #F8F8F8;width: 402px;height: 41px;margin-top:-5px;border-radius:6px;border:1px solid#9B9B9B ;padding-left:15px;">
                                    <input type="text " id="numero_marchandM" class="kokot" maxlength='12' placeholder="Code marchand "  style="background-color: #F8F8F8;width: 402px;height: 41px;margin-top:10px ;border-radius:6px;border:1px solid#9B9B9B;padding-left:15px;">

                                     <input type="hidden" id="id_boutique">
                                     <input type="hidden" id="id_marchand">
                                     <input type="hidden" id="get_status">
                                   <br>
                                    <div class="col-12 ">
                                        <div class="form-check" style="margin-left:11px;margin-top:10px;">
                                        {{--  <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault2" >
                                           <label class="form-check-label" for="flexCheckDefault"style="  color: #000000;
                                            font-family: Roboto;
                                            font-size: 13px;
                                            letter-spacing: -0.31px;
                                            line-height: 18px;margin-left:2px; margin-top:2px;">
                                        Définir en tant que mode de paiement par défaut
                                      </label> --}}
                                        </div>
                                    </div>


                                    <div class="row "  style="margin-top: 30px;
                                                            height: 18px;
                                                            color: #FFFFFF;
                                                            font-family: Roboto;
                                                            font-size: 14px;
                                                            font-weight: 500;
                                                            letter-spacing: 0.31px;
                                                            text-align: center;
                                                            padding-right: 86px; " >

                                        <div class="d-grid gap-2 col mx-auto">
                                            <button type="submit" id="CancelMobile" class="mbtn-text-0 mbtn2 "  value="" style="width: 164px;
                                                height: 37px;
                                                background-color: #FFFFFF;
                                                border-radius: 6px;
                                                color: #1A7EF5 !important;
                                                border: 1px solid #1A7EF5 !important;
                                                text-align: center;
                                                font-size: 16px;
                                                margin-top: 10px;">Annuler
                                            </button>
                                        </div>


                                        <div class="d-grid gap-2 col mx-auto ">
                                           {{-- <input type="submit" value="Soumettre " onclick="ajouterservicebk()" style="width: 164px;height:37px;margin-left:-21%; ;margin-right: 30%;color:white; background-color:#1A7EF5;border:1px solid #1A7EF5; border-radius: 6px;font-size: 16px; "> --}}

                                           <button type="submit" id="modifMarchandMoney01" class="mbtn-text-0 img_bgk"  value="" style="
                                           width: 164px;
                                           height:37px;
                                           margin-left:-12%; ;
                                           margin-right: 30%;
                                           color:white;
                                           background-color:#1A7EF5;
                                           border:1px solid #1A7EF5;
                                           border-radius: 6px;font-size: 16px;
                                           border-color: transparent !important;
                                           margin-top:10px">
                                           Soumettre
                                           <span class="spinner-border hide" id="money1_spiner-resend" role="status" aria-hidden="true"></span>
                                           </button>

                                           <!-- Enregistrer -->
                                           <button type="submit" id="modifMarchandMoney02" class="mbtn-text-0 img_bgk hide"  value="" style="width: 164px;height:37px;margin-left:-53%; ;margin-right: 30%;color:white; background-color:#1A7EF5;border:1px solid #1A7EF5; border-radius: 6px;font-size: 16px;border-color: transparent !important; margin-top: 10px; ">Soumettre
                                           <span class="spinner-border hide" id="money2_spiner-resend" role="status" aria-hidden="true"></span>
                                           </button>

                                        </div>
                                    </div>
                                </section>

                                    {{-- service suite --}}

                                    <section id="servicebk2" class="hide"  style=" padding-top: 70px; height: 207px">
                                        <img src="assets/images/icones-vendeurs2/check copy.svg" width="30px" height="30px" style="margin-left: 180px;">
                                        <h4 style="  color: #1A7EF5;
                                        font-family: Roboto;
                                        font-size: 18px;
                                        font-weight: 900;
                                        letter-spacing: 2;
                                        line-height: 20px;
                                        text-align: center;margin-top: 10px;margin-left:-100px;">SERVICE AJOUTÉ</h4>

                                            <article id="getout" style="  height: 30px;
                                                width: 216px;
                                                border: 1px solid #00B517;
                                                border-radius: 6px; text-align:center;  color: #191970;
                                                font-family: Roboto;
                                                font-size: 15px;
                                                font-weight: 500;
                                                letter-spacing: 0;
                                                line-height: 15px;padding-top:7px; background-color: #E3F7E6;margin-top:15px;margin-left:85px;">Airtel Money: <span id="airtelCodeMarchand">10MP60</span>
                                            </article>
                                            <span id="show1"
                                                style="margin-left: 315px; margin-top:-27px; color:rgb(0, 118, 139); cursor: pointer; font-size:1.8em;"
                                                ><img class="trash" src="assets/images/Corbeille-grise-base.svg" style="margin-top: -28px">
                                            </span>


                                            <article id="getout1" style="  height: 30px;
                                                width: 216px;
                                                border: 1px solid #00B517;
                                                border-radius: 6px; text-align:center;  color: #191970;
                                                font-family: Roboto;
                                                font-size: 15px;
                                                font-weight: 500;
                                                letter-spacing: 0;
                                                line-height: 15px;padding-top:7px; margin-top:15px;background-color: #E3F7E6;margin-left:85px;">Moov Money: <span id="airtelCodeMarchand2">10MP60</span>
                                            </article>

                                            <span id="show2"
                                                style="margin-left: 315px; margin-top:-27px; color:rgb(0, 118, 139); cursor: pointer; font-size:1.8em;"
                                                ><img  class="trash" src="assets/images/Corbeille-grise-base.svg" style="margin-top: -28px">
                                            </span>
                                </section>


                                        <div class="row " id="rapidDebug" style="margin-top:104.1px;  height: 18px;
                                                    color: #FFFFFF;
                                                    font-family: Roboto;
                                                    font-size: 14px;
                                                    font-weight: 500;
                                                    letter-spacing: 0.31px;line-height: 18px;text-align: center; padding-right: 65px;
                                                    margin-left: 21px; " >
                                                <div class="d-grid gap-2 col-6 mx-auto">
                                                    <button type="submit" id="deleteMmoney" class="mbtn2" style="width: 194px;height:37px; margin-left:-47px;color:#1A7EF5;border:1px solid #1A7EF5; border-radius: 6px;background-color:#FFFFFF; font-size: 16px;" onclick="returnservicebk1()">Supprimer les services</button>
                                                </div>
                                                <div class="d-grid gap-2 col-6 mx-auto">
                                                    <button type="submit" id="modifyMoneynow" class="mbtn1" value=" " style="width: 194px;height:37px;margin-left:-20%; ;margin-right: 30%;color:white; background-color:#1A7EF5;border:1px solid #1A7EF5; border-radius: 6px;font-size: 16px; ">Modifier les services
                                                    </button>

                                                    <button type="submit" id="createMoneynow" class="mbtn1 hide" value=" " style="width: 164px;height:37px;margin-left:-61%; ;margin-right: 30%;color:white; background-color:#1A7EF5;border:1px solid #1A7EF5; border-radius: 6px;font-size: 16px; ">Creer
                                                    </button>
                                                </div>
                                            </div>

                                                <div id="carteNotif" class="hide" style="height: 32px;
                                                    width: 1212px;
                                                    border-radius: 6px;
                                                    background-color: #FFF;
                                                    float: bottom;
                                                    bottom: -46px;
                                                    z-index: 999;
                                                    position: absolute;
                                                    display: flex;
                                                    justify-content: center;
                                                    align-items: center;
                                                    margin-left: -705px;
                                                    border: 1px solid #D0021B;
                                                    color:#D0021B;
                                                    font-family: 'Roboto';
                                                    font-style: normal;
                                                    font-weight: 500;
                                                    font-size: 16px;
                                                    line-height: 16px;"
                                                    >
                                                    <span>Impossible d'effectuer cette action, votre boutique a besoin d'un mode de paiement actif. <a href=""> Plus d'infos?</a> </span>
                                                </div>


                                </div>


                            </div>



                        </div>

                    </div>

                </div>


</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js " integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM " crossorigin="anonymous "></script>


<script src="js/script.js"></script>
<script src="js/moment.js"></script>
<script src="js/underscore.js"></script>
<script src="{{ asset('assets/jquery/dist/jquery.min.js') }}"></script>

<script src="{{ asset('assets/jQuery-Mask-Plugin-master/dist/jquery.mask.min.js') }}"></script>



<script>



        $('#card_number01').mask('0000 0000 0000 0000');
        $('#cvv_01').mask('000');



            function getCardType(num) {
                    num = num.replace(/[^\d]/g,'');  // Sanitise number
                    var regexps = {
                        'Mastercard' : /^5[1-5][0-9]{5,}$/,
                        'Visa' : /^4[0-9]{6,}$/,
                        'Amex' : /^3[47][0-9]{5,}$/,
                        'Discover' : /^6(?:011|5[0-9]{2})[0-9]{3,}$/,
                        'Diners' : /^3(?:0[0-5]|[68][0-9])[0-9]{4,}$/,
                        'Cb' : /^(?:2131|1800|35[0-9]{3})[0-9]{3,}$/,
                        'Inconnu' : /.*/,
                    };
                    for( var card in regexps ) {
                        if ( num.match( regexps[ card ] ) ) {

                            if(card == 'Visa'){
                                $('.visa').removeClass('hide');
                                $('.master1').addClass('hide');
                                $('.jcb').addClass('hide');
                            }else if(card == 'Mastercard'){
                                $('.visa').addClass('hide');
                                $('.master1').removeClass('hide');
                                $('.jcb').addClass('hide');
                            }else if(card == 'Cb'){
                                $('.visa').addClass('hide');
                                $('.master1').addClass('hide');
                                $('.jcb').removeClass('hide');
                            }
                            else{
                                $('.visa').addClass('hide');
                                $('.master1').addClass('hide');
                                $('.jcb').addClass('hide');
                            }

                            $('#cardType').text(card);
                            $('#cardType').val(card);
                            return card;
                        }
                    }
            }


//**********************VISA KEYUP EVENT************************************** */

        $(document).on('keyup', '.disap', function () {
            getCardType($('#card_number01').val())
        });



//**********************DELETE AIRTEL MOBILE MONEY**************************************** */

        $(document).on('click', '#show1', function (e) {
            e.preventDefault();
            $('#carteNotif').addClass('hide');
            var data= {};
            data = {
                'status': 8,
                'id_marchand' : $('#id_marchand').val(),
                'type_service' : 'airtel',
            }

            $.ajaxSetup({
                headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $.ajax({

                    type: "POST",
                    url: '/modif_money_marchand',
                    data: data,
                    dataType: "json",
                    success: function (response) {
                        console.log(response);

                        if(response.status === 200){
                            $('#A_money').val('');
                            $('#numero_marchandA').val('');
                            $('#airtelCodeMarchand').text('');
                            $('#show1').addClass('hide');
                            $('#getout').addClass('hide');
                        }
                        else if(response.status === 200 && response.indice === 'ok' ){
                            $('#A_money').val('');
                            $('#numero_marchandA').val('');
                            $('#airtelCodeMarchand').text('');
                            $('#show1').addClass('hide');
                            $('#getout').addClass('hide');

                            $('#affichageState1').text('MOOV');
                            $('#infoMoney1').text($('#numero_marchandM').val());
                            $("#paiem4").hide();

                        }else{
                            $('#carteNotif').removeClass('hide');
                            setTimeout(function(){
                                $('#carteNotif').addClass('hide');
                            }, 8000)
                        }


                    },
                });

//**************SECOND AJAX CALL********************** */

                $.ajax({
                method: 'GET',
                url: 'get_money_marchand/',
                success: function(response) {

                    if(response.status == 201){
                        $('#A_money').val('');
                        $('#numero_marchandA').val('');
                        $('#airtelCodeMarchand').text('');
                        $('#show1').addClass('hide');
                        $('#getout').addClass('hide');

                        $('#modifyMoneynow').addClass('hide'); //MODIFY MOBILE
                        $('#deleteMmoney').addClass('hide');    //DELETE MOBILE


                        $('#servicebk2').addClass('hide'); // HIDE MODIF BUTTONS
                        $('#servicebk1').removeClass('hide'); // SHOW MOBILE FORM

                        $('#modifMarchandMoney01').addClass('hide');
                        $('#CancelMobile').addClass('hide');
                        $('#modifMarchandMoney02').removeClass('hide');
                    }

                    if(response.status == 202){
                        _.each(response.moneyInfo, function(model){
                            if(response.moneyInfo.length == 2){
                                $('#affichageState').text('AIRTEL');
                                $('#infoMoney').text(response.moneyInfo[1].numero_marchand);

                                $('#affichageState1').text('MOOV');
                                $('#infoMoney1').text(response.moneyInfo[0].numero_marchand);

                                $("#paiem4").show();
                                $("#paiem10").show();

                            }else{
                                if(model.type_service == 'airtel'){
                                    $('#affichageState').text('AIRTEL');
                                    $('#infoMoney').text(model.numero_marchand);
                                    $("#paiem10").hide();
                                    $("#paiem4").show();
                                }
                                if(model.type_service == 'moov'){
                                    $('#affichageState1').text('MOOV');
                                    $('#infoMoney1').text(model.numero_marchand);
                                    $("#paiem4").hide();
                                    $("#paiem10").show();
                                }

                            }
                        }); // fin LOOP
                        } // fin if



                  },
                });

})



//**********************DELETE AIRTEL MOBILE MONEY**************************************** */

$(document).on('click', '#show2', function (e) {
            e.preventDefault();
            var data= {};
            data = {
                'status': 9,
                'id_marchand' : $('#id_marchand').val(),
                'type_service' : 'moov',
            }

            $.ajaxSetup({
                headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $.ajax({

                    type: "POST",
                    url: '/modif_money_marchand',
                    data: data,
                    dataType: "json",
                    success: function (response) {
                        console.log(response);

                        if(response.status === 200){
                            $('#Mmoney').val('');
                            $('#numero_marchandM').val('');
                            $('#airtelCodeMarchand2').text('');
                            $('#show2').addClass('hide');
                            $('#getout1').addClass('hide');
                        }
                        else if(response.status === 200 && response.indice === 'ok' ){
                            $('#Mmoney').val('');
                            $('#numero_marchandM').val('');
                            $('#airtelCodeMarchand2').text('');
                            $('#show2').addClass('hide');
                            $('#getout1').addClass('hide');
                            $('#affichageState').text('AIRTEL');
                            $('#infoMoney').text($('#numero_marchandA').val());
                            $("#paiem10").hide();
                        }else{
                            $('#carteNotif').removeClass('hide');
                            setTimeout(function(){
                                $('#carteNotif').addClass('hide');
                            }, 8000)
                        }


                    },
                });


//**************SECOND AJAX CALL********************** */

            $.ajax({
                method: 'GET',
                url: 'get_money_marchand/',
                success: function(response) {

                    if(response.status == 201){
                        $('#Mmoney').val('');
                        $('#numero_marchandM').val('');
                        $('#airtelCodeMarchand2').text('');
                        $('#show2').addClass('hide');
                        $('#getout1').addClass('hide');


                        $('#modifyMoneynow').addClass('hide'); //MODIFY MOBILE
                        $('#deleteMmoney').addClass('hide');    //DELETE MOBILE


                        $('#servicebk2').addClass('hide'); // HIDE MODIF BUTTONS
                        $('#servicebk1').removeClass('hide'); // SHOW MOBILE FORM

                        $('#modifMarchandMoney01').addClass('hide');
                        $('#CancelMobile').addClass('hide');
                        $('#modifMarchandMoney02').removeClass('hide');
                      }

                      if(response.status == 202){
                        _.each(response.moneyInfo, function(model){
                            if(response.moneyInfo.length == 2){
                                $('#affichageState').text('AIRTEL');
                                $('#infoMoney').text(response.moneyInfo[1].numero_marchand);

                                $('#affichageState1').text('MOOV');
                                $('#infoMoney1').text(response.moneyInfo[0].numero_marchand);

                                $("#paiem4").show();
                                $("#paiem10").show();

                            }else{
                                if(model.type_service == 'airtel'){
                                    $('#affichageState').text('AIRTEL');
                                    $('#infoMoney').text(model.numero_marchand);
                                    $("#paiem10").hide();
                                    $("#paiem4").show();
                                }
                                if(model.type_service == 'moov'){
                                    $('#affichageState1').text('MOOV');
                                    $('#infoMoney1').text(model.numero_marchand);
                                    $("#paiem4").hide();
                                    $("#paiem10").show();
                                }

                            }
                        }); // fin LOOP
                        } // fin if
                    },
                });
})






        function formatString(e) {
                    var inputChar = String.fromCharCode(event.keyCode);
                    var code = event.keyCode;
                    var allowedKeys = [8];
                    if (allowedKeys.indexOf(code) !== -1) {
                        return;
                    }
                    event.target.value = event.target.value.replace(
                        /^([1-9]\/|[2-9])$/g, '0$1/' // 3 > 03/
                    ).replace(
                        /^(0[1-9]|1[0-2])$/g, '$1/' // 11 > 11/
                    ).replace(
                        /^([0-1])([3-9])$/g, '0$1/$2' // 13 > 01/3
                    ).replace(
                        /^(0?[1-9]|1[0-2])([0-9]{2})$/g, '$1/$2' // 141 > 01/41
                    ).replace(
                        /^([0]+)\/|[0]+$/g, '0' // 0/ > 0 and 00 > 0
                    ).replace(
                        /[^\d\/]|^[\/]*$/g, '' // To allow only digits and `/`
                    ).replace(
                        /\/\//g, '/' // Prevent entering more than 1 `/`
                    );
        }




//*************************************************************************** */



        $(document).on('click', '#modifMarchandMoney01', function (e) {

           e.preventDefault();
           var Ok  = true;
           $('#A_money').removeClass('input-error-warning');
           $('#numero_marchandA').removeClass('input-error-warning');

           $('#Mmoney').removeClass('input-error-warning');
           $('#numero_marchandM').removeClass('input-error-warning');




    //*************************CONTROLLER LE CHAMP AIRTEL *************************************** */

            if($('#get_status').val() == 1){

                if(( $('#A_money').val() === "") || ($('#A_money').val().length < 3) ){
                     $('#A_money').addClass('input-error-warning');
                     Ok = false
                     return;
                 }


                if(($('#numero_marchandA').val() === "") || ($('#numero_marchandA').val().length < 5)){
                        $('#numero_marchandA').addClass('input-error-warning');
                        Ok = false
                        return;
                }

            }

    //*************************CONTROLLER LE CHAMP MOOV *************************************** */

            if($('#get_status').val() == 2){

                if(( $('#Mmoney').val() === "") || ($('#Mmoney').val().length < 3) ){
                     $('#Mmoney').addClass('input-error-warning');
                     Ok = false
                     return;
                 }


                if(($('#numero_marchandM').val() === "") || ($('#numero_marchandM').val().length < 5)){
                        $('#numero_marchandM').addClass('input-error-warning');
                        Ok = false
                        return;
                }

            }

    //*************************CONTROLLER LES DEUX CHAMP MOOV ET AIRTEL*************************************** */


            if($('#get_status').val() == 3){

                if(( $('#A_money').val() === "") || ($('#A_money').val().length < 3) ){
                     $('#A_money').addClass('input-error-warning');
                     Ok = false
                     return;
                 }

                if(($('#numero_marchandA').val() === "") || ($('#numero_marchandA').val().length < 5)){
                        $('#numero_marchandA').addClass('input-error-warning');
                        Ok = false
                        return;
                }

                if(( $('#Mmoney').val() === "") || ($('#Mmoney').val().length < 3) ){
                     $('#Mmoney').addClass('input-error-warning');
                     Ok = false
                     return;
                 }

                if(($('#numero_marchandM').val() === "") || ($('#numero_marchandM').val().length < 5)){
                        $('#numero_marchandM').addClass('input-error-warning');
                        Ok = false
                        return;
                }


            }



   //***************************GET BACKEND READY**************************************************************** */

           if(( $('#A_money').val() != "") ){  // ONLY AIRTEL MONEY

                var data = {
                    'nom_service':  $('#A_money').val(),
                    'numero_marchand': $('#numero_marchandA').val(),
                    'id_marchand' : $('#id_marchand').val(),
                    'identity' : 1,
                }
           }


           if(( $('#Mmoney').val() != "") ){  // ONLY MOOV MONEY
            var data = {
                'nom_service':  $('#Mmoney').val(),
                'numero_marchand': $('#numero_marchandM').val(),
                'id_marchand' : $('#id_marchand').val(),
                'identity' : 2,
            }
          }


          if(($('#A_money').val() != "") && ($('#Mmoney').val() != "")){ //BOTH AIRTEL AND MOOV MONEY
                var data= {
                    'nom_serviceA':  $('#A_money').val(),
                    'numero_marchandA': $('#numero_marchandA').val(),
                    'nom_serviceM':  $('#Mmoney').val(),
                    'numero_marchandM': $('#numero_marchandM').val(),
                    'id_marchand' : $('#id_marchand').val(),
                    'identity' : 3,
                }
          }

            if(Ok === true){


                $('#affichageState').text(data.nom_service);

                $('#infoMoney').text(data.numero_marchand);

                $.ajaxSetup({
                headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });

                $.ajax({
                    type: "POST",
                    url: '/modif_money_marchand',
                    data: data,
                    dataType: "json",
                    beforeSend: function(params) {
                            $('#money1_spiner-resend').removeClass('hide');
                            $('#money1_spiner-resend').css({ 'width' : '1rem', 'height' : '1rem'})
                            $('#modifMarchandMoney01').find('.mbtn-text-0').addClass('hide');
                            $('#modifMarchandMoney01').addClass('block-btn');
                            $('#modifMarchandMoney01').css('opacity','0.5');
                    },
                    success: function (response) {

                        if(response.status === 200){
                            $('#servicebk2').removeClass('hide');
                            $('#servicebk1').addClass('hide');
                            $('#modifyMoneynow').removeClass('hide');
                            $('#deleteMmoney').removeClass('hide');
                            $('#createMoneynow').addClass('hide');
                            if(data.identity == 1){
                                $('#airtelCodeMarchand').text(data.numero_marchand);
                                $('#show1').removeClass('hide');
                                $('#getout').removeClass('hide');
                                $('#rapidDebug').removeClass('hide'); // rapid debug
                            }
                            if(data.identity == 2){
                                $('#airtelCodeMarchand2').text(data.numero_marchand);
                                $('#show2').removeClass('hide');
                                $('#getout1').removeClass('hide');
                                $('#rapidDebug').removeClass('hide'); // rapid debug
                            }
                            if(data.identity == 3){
                                $('#airtelCodeMarchand').text(data.numero_marchandA);
                                $('#airtelCodeMarchand2').text(data.numero_marchandM);
                                $('#show1').removeClass('hide');
                                $('#getout').removeClass('hide');
                                $('#show2').removeClass('hide');
                                $('#getout1').removeClass('hide');
                                $('#rapidDebug').removeClass('hide'); // rapid debug
                            }
                        }else{
                            $('#carteNotif').removeClass('hide');
                            setTimeout(function(){
                                $('#carteNotif').addClass('hide');
                            }, 8000)
                        }
                    },
                    complete: function() {
                        $('#money1_spiner-resend').addClass('hide');
                        $('#money1_spiner-resend').css({ 'width' : '1rem', 'height' : '1rem'})
                        $('#modifMarchandMoney01').find('.mbtn-text-0').removeClass('hide');
                        $('#modifMarchandMoney01').removeClass('block-btn');
                        $('#modifMarchandMoney01').css('opacity','1');
                        setTimeout(function(){
                            $('#servicebk1').addClass('hide');
                            $('#servicebk2').removeClass('hide');
                        }, 1000);
                    }
                });
            }


                //*********************SECOND REQUEST AJAX*****************/

            $.ajax({
                method: 'GET',
                url: 'get_money_marchand/',
                success: function(response){

                   if(response.status == 202){
                    $("#paiem11").hide();

                    _.each(response.moneyInfo, function(model){

                          if(response.moneyInfo.length == 2){
                              $('#affichageState').text('AIRTEL');
                              $('#infoMoney').text(response.moneyInfo[1].numero_marchand);

                              $('#affichageState1').text('MOOV');
                              $('#infoMoney1').text(response.moneyInfo[0].numero_marchand);

                              $("#paiem4").show();
                              $("#paiem10").show();

                          }else{
                              if(model.type_service == 'airtel'){
                                $('#affichageState').text('AIRTEL');
                                $('#infoMoney').text(model.numero_marchand);
                                $("#paiem10").hide();
                                $("#paiem4").show();

                              }
                              if(model.type_service == 'moov'){
                                $('#affichageState1').text('MOOV');
                                $('#infoMoney1').text(model.numero_marchand);
                                $("#paiem4").hide();
                                $("#paiem10").show();
                              }

                          }
                     }); // fin LOOP
                   } // fin if
                },
            });

        }); // fin modifMarchandMoney01




//****************CREATE MOBILE PAYMENT******************* */

$(document).on('click', '#modifMarchandMoney02', function (e) {
    e.preventDefault();
    var Ok  = true;
    var data ={};

    $('#getout').addClass('hide');
    $('#show1').addClass('hide');
    $('#getout1').addClass('hide');
    $('#show2').addClass('hide');


    if(($('#A_money').val() != "" && $('#Mmoney').val() != "" )){
        data= {
            'nom_serviceA':  $('#A_money').val(),
            'numero_marchandA': $('#numero_marchandA').val(),
            'nom_serviceM':  $('#Mmoney').val(),
            'numero_marchandM': $('#numero_marchandM').val(),
            'id_marchand' : $('#id_marchand').val(),
            'type_service' : 'ANM',
            'status' : 0,
        }

    }else if($('#A_money').val() != ""){
        data= {
            'nom_serviceA':  $('#A_money').val(),
            'numero_marchandA': $('#numero_marchandA').val(),
            'id_marchand' : $('#id_marchand').val(),
            'type_service' : 'airtel',
            'status' : 0,
        }
    }else{
        data= {
            'nom_serviceM':  $('#Mmoney').val(),
            'numero_marchandM': $('#numero_marchandM').val(),
            'id_marchand' : $('#id_marchand').val(),
            'type_service' : 'moov',
            'status' : 0,
         }
    }


                    $.ajaxSetup({
                    headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        }
                    });

                    $.ajax({
                        type: "POST",
                        url: '/modif_money_marchand',
                        data: data,
                        dataType: "json",
                        beforeSend: function(params) {
                            $('#money2_spiner-resend').removeClass('hide');
                            $('#money2_spiner-resend').css({ 'width' : '1rem', 'height' : '1rem'})
                            $('#modifMarchandMoney02').find('.mbtn-text-0').addClass('hide');
                            $('#modifMarchandMoney02').addClass('block-btn');
                            $('#modifMarchandMoney02').css('opacity','0.5');
                    },

                        success: function (response) {

                            if(response.status === 200){
                                $('#servicebk2').removeClass('hide');
                                $('#servicebk1').addClass('hide');
                                $('#modifyMoneynow').removeClass('hide');
                                $('#deleteMmoney').removeClass('hide');
                                $('#createMoneynow').addClass('hide');

                                if(data.type_service == 'airtel'){
                                    $('#airtelCodeMarchand').text(data.numero_marchandA);
                                    $('#show1').removeClass('hide');
                                    $('#getout').removeClass('hide');
                                    $('#rapidDebug').removeClass('hide'); // rapid debug
                                }
                                if(data.type_service == 'moov'){
                                    $('#airtelCodeMarchand2').text(data.numero_marchandM);
                                    $('#show2').removeClass('hide');
                                    $('#getout1').removeClass('hide');
                                    $('#rapidDebug').removeClass('hide'); // rapid debug
                                }
                                if(data.type_service == 'ANM'){
                                    $('#airtelCodeMarchand').text(data.numero_marchandA);
                                    $('#airtelCodeMarchand2').text(data.numero_marchandM);
                                    $('#show1').removeClass('hide');
                                    $('#getout').removeClass('hide');
                                    $('#show2').removeClass('hide');
                                    $('#getout1').removeClass('hide');
                                    $('#rapidDebug').removeClass('hide'); // rapid debug
                                }

                            }
                        },
                        complete: function() {
                            $('#money2_spiner-resend').addClass('hide');
                            $('#money2_spiner-resend').css({ 'width' : '1rem', 'height' : '1rem'})
                            $('#modifMarchandMoney02').find('.mbtn-text-0').removeClass('hide');
                            $('#modifMarchandMoney02').removeClass('block-btn');
                            $('#modifMarchandMoney02').css('opacity','1');
                        }
                    });


        //*********************SECOND REQUEST AJAX*****************/

            $.ajax({
                method: 'GET',
                url: 'get_money_marchand/',
                success: function(response){

                   if(response.status == 202){
                    $("#paiem11").hide();

                    _.each(response.moneyInfo, function(model){

                          if(response.moneyInfo.length == 2){
                              $('#affichageState').text('AIRTEL');
                              $('#infoMoney').text(response.moneyInfo[1].numero_marchand);

                              $('#affichageState1').text('MOOV');
                              $('#infoMoney1').text(response.moneyInfo[0].numero_marchand);

                              $("#paiem4").show();
                              $("#paiem10").show();

                          }else{
                              if(model.type_service == 'airtel'){
                                $('#affichageState').text('AIRTEL');
                                $('#infoMoney').text(model.numero_marchand);
                                $("#paiem10").hide();
                                $("#paiem4").show();

                              }
                              if(model.type_service == 'moov'){
                                $('#affichageState1').text('MOOV');
                                $('#infoMoney1').text(model.numero_marchand);
                                $("#paiem4").hide();
                                $("#paiem10").show();
                              }
                          }
                     }); // fin LOOP
                   } // fin if
                },
            });

});


//*************************CARTE DE CREDIT******************************************************* */

        $(document).on('click', '#modifMarchandMoney', function (e) {
            e.preventDefault();
            var Ok =true;
            $('#card_number01').removeClass('input-error-warning');
            $('#card_name01').removeClass('input-error-warning');
            $('#cvv_01').removeClass('input-error-warning');
            $('#expiry_date01').removeClass('input-error-warning');

            var knowcardType = getCardType($('#card_number01').val())

           var data = {
                'numero_carte': $('#card_number01').val(),
                'nom_carte':     $('#card_name01').val(),
                'date_expiration':  $('#expiry_date01').val(),
                'code_securite': $('#cvv_01').val(),
                'id_boutique' : $('#id_boutique').val(),
                'card': 1,
                'type_carte' :  knowcardType,
            }

                var expire = $('#expiry_date01').val();

                // get current year and month
                var d = new Date();
                var currentYear = d.getFullYear();
                var currentMonth = d.getMonth() + 1;

                // get parts of the expiration date
                var parts = expire.split('/');
                var year = parseInt(parts[1], 10) + 2000;
                var month = parseInt(parts[0], 10);

            if (year < currentYear || (year == currentYear && month < currentMonth)) {
                console.log('The expiry date has passed');
                $('#expiry_date01').addClass('input-error-warning');
                Ok = false
                return;
            }



             if(($('#card_number01').val() === "") || ($('#card_number01').val().length < 19)){
                     $('#card_number01').addClass('input-error-warning');
                     Ok = false
                     return;
            }

            if(($('#card_name01').val() === "")){
                     $('#card_name01').addClass('input-error-warning');
                     Ok = false
                     return;
            }

            if(($('#cvv_01').val() === "") || ($('#cvv_01').val().length < 3)){
                     $('#cvv_01').addClass('input-error-warning');
                     Ok = false
                     return;
            }

            if(($('#expiry_date01').val() === "")){
                $('#expiry_date01').addClass('input-error-warning');
                Ok = false
                return;
            }


            if(knowcardType  == 'Inconnu'){
                $('#card_number01').addClass('input-error-warning');
                Ok = false
                return;
            }


            if(Ok === true){
                var lastthreee = data.numero_carte.substr(data.numero_carte.length - 4); // => "7891"
                $('#infoCredit').text(knowcardType+' '+'****'+' '+lastthreee);
                $('#affichageState2').text(knowcardType);
                $('#infoMoney2').text('************'+' '+lastthreee);
                $.ajaxSetup({
                headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });

                $.ajax({
                    type: "POST",
                    url: '/modif_money_marchand',
                    data: data,
                    dataType: "json",
                    beforeSend: function(params) {
                            $('#money_spiner-resend').removeClass('hide');
                            $('#money_spiner-resend').addClass('spinner-border')
                            $('#money_spiner-resend').css({ 'width' : '1rem', 'height' : '1rem'})
                            $('#modifMarchandMoney').find('.mbtn-text-0').addClass('hide');
                            $('#modifMarchandMoney').addClass('block-btn');
                            $('#modifMarchandMoney').css('opacity','0.5');
                    },
                    success: function (response) {

                        if(response.status === 200){
                          $('#cartecredit1').addClass('hide');
                          $('#cartecredit2').removeClass('hide');

                        }
                    },
                    complete: function() {
                        $('#money_spiner-resend').addClass('hide');
                        $('#money_spiner-resend').removeClass('spinner-border')
                        $('#money_spiner-resend').css({ 'width' : '1rem', 'height' : '1rem'})
                        $('#modifMarchandMoney').find('.mbtn-text-0').removeClass('hide');
                        $('#modifMarchandMoney').removeClass('block-btn');
                        $('#modifMarchandMoney').css('opacity','1');
                        setTimeout(function(){
                            $('#cartecredit1').addClass('hide');
                            $('#cartecredit2').removeClass('hide');
                        }, 1000);
                    }
                });
            }
    });


//*****************Annuler CREDIT CARD BUTTON FUNCTION******************************** */
$(document).on('click', '#CancelMoney', function (e) {
           e.preventDefault();
           $('#cartecredit1').addClass('hide');
           $('#cartecredit2').removeClass('hide');
        });




//*****************MODIFY CREDIT CARD BUTTON FUNCTION******************************** */
        $(document).on('click', '#creditModify', function (e) {
           e.preventDefault();
           $('#cartecredit2').addClass('hide');
           $('#cartecredit1').removeClass('hide');
        });
//***********CREER CREDIT CARD BUTTON********************** */
    $(document).on('click', '#creditCreate', function (e) {
         e.preventDefault();
         $('#cartecredit2').addClass('hide');
         $('#cartecredit1').removeClass('hide');
            $('#card_number01').val('');
            $('#card_name01').val('');
            $('#expiry_date01').val('');
            $('#cvv_01').val('');
         $('#modifMarchandMoney').addClass('hide');
         $('#CancelMoney').addClass('hide');
         $('#regMarchandMoney').removeClass('hide');
      });


    //***********ENREGISTRER CREDIT CARD BUTTON********************** */

$(document).on('click', '#regMarchandMoney', function (e) {
         e.preventDefault();
         var Ok =true;
            $('#card_number01').removeClass('input-error-warning');
            $('#card_name01').removeClass('input-error-warning');
            $('#cvv_01').removeClass('input-error-warning');
            $('#expiry_date01').removeClass('input-error-warning');
            var knowcardType = getCardType($('#card_number01').val()) ;

           var data = {
                'numero_carte': $('#card_number01').val(),
                'nom_carte':     $('#card_name01').val(),
                'date_expiration':  $('#expiry_date01').val(),
                'code_securite': $('#cvv_01').val(),
                'card': 6,
                'type_carte' :  $('#cardType').val(),
                'type_carte' :  knowcardType,
            }

            var expire = $('#expiry_date01').val();
                // get current year and month
                var d = new Date();
                var currentYear = d.getFullYear();
                var currentMonth = d.getMonth() + 1;

                // get parts of the expiration date
                var parts = expire.split('/');
                var year = parseInt(parts[1], 10) + 2000;
                var month = parseInt(parts[0], 10);

            if (year < currentYear || (year == currentYear && month < currentMonth)) {
                console.log('The expiry date has passed');
                $('#expiry_date01').addClass('input-error-warning');
                Ok = false
                return;
            }

             if(($('#card_number01').val() === "") || ($('#card_number01').val().length < 19)){
                     $('#card_number01').addClass('input-error-warning');
                     Ok = false
                     return;
            }

            if(($('#card_name01').val() === "")){
                     $('#card_name01').addClass('input-error-warning');
                     Ok = false
                     return;
            }

            if(($('#cvv_01').val() === "") || ($('#cvv_01').val().length < 3)){
                     $('#cvv_01').addClass('input-error-warning');
                     Ok = false
                     return;
            }

            if(($('#expiry_date01').val() === "")){
                     $('#expiry_date01').addClass('input-error-warning');
                     Ok = false
                     return;
            }

            if(knowcardType  == 'Inconnu'){
                $('#card_number01').addClass('input-error-warning');
                Ok = false
                return;
            }


            if(Ok === true){

                $.ajaxSetup({
                headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });

                $.ajax({
                    type: "POST",
                    url: '/modif_money_marchand',
                    data: data,
                    dataType: "json",

                    beforeSend: function(params) {
                            $('#regmoney_spiner-resend').removeClass('hide');
                            $('#regmoney_spiner-resend').css({ 'width' : '1rem', 'height' : '1rem'})
                            $('#regMarchandMoney').find('.mbtn-text-0').addClass('hide');
                            $('#regMarchandMoney').addClass('block-btn');
                            $('#regMarchandMoney').css('opacity','0.5');
                    },
                    success: function (response) {

                        if(response.status === 200){

                            var lastthreee = data.numero_carte.substr(data.numero_carte.length - 4); // => "7894"
                            $('#infoCredit').text(knowcardType+' '+'*****'+' '+lastthreee);
                            $('#affichageState2').text(data.type_carte);
                            $('#infoMoney2').text('************'+' '+lastthreee);

                            $('#cartecredit1').addClass('hide');
                            $('#cartecredit2').removeClass('hide');
                            $('#modifMarchandMoney').removeClass('hide');
                            $('#CancelMoney').removeClass('hide');
                            $('#regMarchandMoney').addClass('hide')
                            $('#creditModify').removeClass('hide');
                            $('#deleteCarte').removeClass('hide');
                            $('#creditCreate').addClass('hide');
                            $("#paiem11").hide()
                            $("#paiem4").hide();
                            $("#paiem10").hide()

                        }
                    },
                    complete: function() {
                        $('#regmoney_spiner-resend').addClass('hide');
                        $('#regmoney_spiner-resend').css({ 'width' : '1rem', 'height' : '1rem'})
                        $('#modifMarchandMoney').find('.mbtn-text-0').removeClass('hide');
                        $('#regMarchandMoney').removeClass('block-btn');
                        $('#regMarchandMoney').css('opacity','1');

                        setTimeout(function(){
                            $('#cartecredit1').addClass('hide');
                            $('#cartecredit2').removeClass('hide');

                        }, 1000);
                    }
                });
            }
});

//***********CANCEL MOBILE MONEY********************** */

$(document).on('click', '#CancelMobile', function (e) {
    e.preventDefault();
    $('#servicebk2').removeClass('hide');
     $('#servicebk1').addClass('hide');
     $('#modifyMoneynow').removeClass('hide');
     $('#deleteMmoney').removeClass('hide');
     $('#createMoneynow').addClass('hide');
     $('#rapidDebug').removeClass('hide'); // rapid debug
 });


//***********MODIFY AIRTEL MONEY********************** */
        $(document).on('click', '#modifyMoneynow', function (e) {
           e.preventDefault();
           $('#servicebk2').addClass('hide');
           $('#servicebk1').removeClass('hide');
           $('#modifMarchandMoney01').removeClass('hide'); // Submit button
           $('#CancelMobile').removeClass('hide');
           $('#modifMarchandMoney02').addClass('hide'); // Submit button
           $('#rapidDebug').addClass('hide'); // rapid debug
           $('#modifMarchandMoney01').prop('disabled', false);
        });

    //***********CREATE MOBILE MONEY********************** */

    $(document).on('click', '#createMoneynow', function (e) {
         e.preventDefault();
         $('#servicebk2').addClass('hide');
         $('#servicebk1').removeClass('hide');
         $('#modifMarchandMoney01').addClass('hide');
         $('#CancelMobile').addClass('hide');
         $('#modifMarchandMoney02').removeClass('hide');
      });




//***********Activate SOUMETTRE BUTTON onkeyup********************** */
        $(document).on('keyup', '.koko', function () {
                    if (($('#A_money').val() != "" && $('#A_money').val().length > 3) &&($('#numero_marchandA').val() != "" && $('#numero_marchandA').val().length > 5)) {
                        $('#modifMarchandMoney01').removeClass('img_bgk');
                        $('#modifMarchandMoney02').removeClass('img_bgk');
                    }else{
                        $('#modifMarchandMoney01').addClass('img_bgk');
                        $('#modifMarchandMoney02').addClass('img_bgk');
                    }
        });

        $(document).on('keyup', '.kokot', function () {
                    if (($('#Mmoney').val() != "" && $('#Mmoney').val().length > 3) &&($('#numero_marchandM').val() != "" && $('#numero_marchandM').val().length > 5)) {
                        $('#modifMarchandMoney01').removeClass('img_bgk');
                        $('#modifMarchandMoney02').removeClass('img_bgk');
                    }else{
                        $('#modifMarchandMoney01').addClass('img_bgk');
                        $('#modifMarchandMoney02').addClass('img_bgk');
                    }
        });

//***********************SUPPRESSION ALL MOBILE PAYMENT********************************************* */

        function returnservicebk1(){
            var data= {};
            $('#carteNotif').addClass('hide');
            data = {
                'status': 3,
                'id_boutique' : $('#id_boutique').val(),
                'id_marchand' : $('#id_marchand').val(),
            }
            $.ajaxSetup({
                headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $.ajax({
                    type: "POST",
                    url: '/modif_money_marchand',
                    data: data,
                    dataType: "json",
                    success: function (response) {
                        if(response.status === 200){

                            $('#modifMarchandMoney01').prop('disabled', true);
                            $('#modifMarchandMoney01').addClass('img_bgk');
                            $('#modifMarchandMoney01').addClass('hide');
                            $('#CancelMobile').addClass('hide');
                            $('#modifMarchandMoney02').removeClass('hide');
                            $('#modifMarchandMoney02').addClass('img_bgk');
                            $('#rapidDebug').addClass('hide'); // rapid debug

                            $('#A_money').val('');
                            $('#numero_marchandA').val('');
                            $('#Mmoney').val('');
                            $('#numero_marchandM').val('');
                            $('#flexCheckDefault2').prop('disabled', true);
                            $('#flexCheckDefault2').prop('checked', false);
                            $('#get_status').val(0);

                            setTimeout(function(){
                                $('#servicebk2').addClass('hide');
                                $('#servicebk1').removeClass('hide');
                                $('#rapidDebug').addClass('hide'); // rapid
                            }, 1000);
                        }else{
                            $('#carteNotif').removeClass('hide');
                            setTimeout(function(){
                                $('#carteNotif').addClass('hide');
                            }, 8000)
                        }
                    },

                });
        }



//***********************SUPPRESSION CREDIT CARD PAYMENT********************************************* */

        function returncartecreditk(){
            $('#carteNotif').addClass('hide');
            var data= {};
            data = {
                'status': 4,
            }

            $.ajaxSetup({
                headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $.ajax({

                    type: "POST",
                    url: '/modif_money_marchand',
                    data: data,
                    dataType: "json",
                    beforeSend: function(params) {
                            $('#delete_m_spiner-resend').removeClass('hide');
                            $('#delete_m_spiner-resend').css({ 'width' : '1rem', 'height' : '1rem'})
                            $('#deleteCarte').find('.mbtn-text-0').addClass('hide');
                            $('#deleteCarte').addClass('block-btn');
                            $('#deleteCarte').css('opacity','1');
                    },

                    success: function (response) {

                        if(response.status === 200 && response.indice === 'ok'){
                            $('#flexCheckDefault1').prop('disabled', true);
                            $('#flexCheckDefault1').prop('checked', false);
                            $('#flexCheckDefault2').prop('checked', true);
                            $('#infoCredit').text('INEXISTANT');
                            $('#creditModify').addClass('hide');
                            $('#deleteCarte').addClass('hide');

                            $('#card_number01').val('');
                            $('#card_name01').val('');
                            $('#expiry_date01').val('');
                            $('#cvv_01').val('');

                            $("#paiem11").hide();



                            $('#modifMarchandMoney').addClass('hide');
                            $('#CancelMoney').addClass('hide');

                            $('#regMarchandMoney').removeClass('hide');
                            setTimeout(function(){
                                $('#cartecredit2').addClass('hide');
                                $('#cartecredit1').removeClass('hide');
                                $('#flexCheckDefault1').prop('checked', true);
                            }, 2000)
                        }else{

                            $('#deletCarte').css('opacity','1');
                            $('#deletCarte').css('background-color', '#FFFFFF');
                            $('#carteNotif').removeClass('hide');

                            setTimeout(function(){
                                $('#carteNotif').addClass('hide');
                            }, 8000)
                        }
                    },
                    complete: function() {
                        $('#delete_m_spiner-resend').addClass('hide');
                        $('#delete_m_spiner-resend').css({ 'width' : '1rem', 'height' : '1rem'})
                        $('#deleteCarte').find('.mbtn-text-0').removeClass('hide');
                        $('#deleteCarte').removeClass('block-btn');
                        $('#deletCarte').css('opacity','1');

                    }
                });


            //*********************SECOND REQUEST AJAX*****************/

            $.ajax({
                method: 'GET',
                url: 'get_money_marchand/',
                success: function(response){

                   if(response.status == 202){

                    _.each(response.moneyInfo, function(model){

                          if(response.moneyInfo.length == 2){
                              $('#affichageState').text('AIRTEL');
                              $('#infoMoney').text(response.moneyInfo[1].numero_marchand);

                              $('#affichageState1').text('MOOV');
                              $('#infoMoney1').text(response.moneyInfo[0].numero_marchand);

                              $("#paiem4").show();
                              $("#paiem10").show();

                          }else{
                              if(model.type_service == 'airtel'){
                                $('#affichageState').text('AIRTEL');
                                $('#infoMoney').text(model.numero_marchand);
                                $("#paiem10").hide();
                                $("#paiem4").show();

                              }
                              if(model.type_service == 'moov'){
                                $('#affichageState1').text('MOOV');
                                $('#infoMoney1').text(model.numero_marchand);
                                $("#paiem4").hide();
                                $("#paiem10").show();
                              }

                          }
                     }); // fin LOOP
                   } // fin if
                },
            });
        }

</script>
