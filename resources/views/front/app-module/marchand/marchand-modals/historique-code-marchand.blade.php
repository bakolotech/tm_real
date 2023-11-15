

    <style>
        @import url('https://fonts.googleapis.com/css2?family=Roboto&display=swap');
        .modal-content-historique-code-marchand,
        .modal-body-historique-code-marchand {
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

        .modal-dialog-historique-code-marchand{
            position: relative;
            height: 579px;
            left: -350px;
            top: 60px;
        }

        .histC {
            overflow-y: scroll;
            white-space: nowrap;
            overflow-x: hidden;
        }

        div.histC {
            display: inline-block;
            float: none;
            height: 399px!important;
            width: 1200px;
        }

        div.histC::-webkit-scrollbar {
            width: 5px;
            border-radius: 3px;
            background-color: #D8D8D8;
        }

        div.histC::-webkit-scrollbar-thumb {
            background: #9B9B9B;
            height: 80px;
            width: 3px;
            border-radius: 3px;
        }


                .historique-code {

        display: flex;
        }
        .historique-code li {
        list-style-type: none;
        height: 70px;
        width: 70px;
        color: #9B9B9B;
        font-family: Roboto;
        font-size: 10px;
        font-weight: 500;
        letter-spacing: 0;
        line-height: 11px;
        text-align: center;
        margin-left: 9px;
        /* background-color: #D0021B; */
        padding-top: 10px;
        cursor: pointer;
        border-radius: 6px;


        }

        .historique-code li:hover {
        border: 1px solid #1A7EF5;

        }
    </style>

</head>

<body>

    <div class="overlay">


        <!-- The Modal -->
        <div class="modal modal-marchand-close" id="historiqueCode">
            <div class="modal-dialog modal-dialog-historique-code-marchand">
                <div class="modal-content modal-content-historique-code-marchand">
                    <div style="margin-top:5px;">
                        @include('front.app-module.marchand.marchand-modals.marchand-profil-data')
                        <div style="border:1px solid #D8D8D8;border-radius: 5px;margin-top:-80px;position: absolute;margin-left: 334px; width:873px;height: 80px;background-color: white; display: flex; flex-direction: column; justify-content: center; align-items: center">

                            {{-- Menu --}}
                            @auth
@if (\Illuminate\Support\Facades\Auth::user()->role == 2)

    <div class="historique-code" id="gerer-equipe-menu">
        <li data-id="infomarch" class="marie" style="margin-left:0px;"><img src="assets/images/icones-vendeurs2/icones-menu/info-marche.svg"><br><br><p style="margin-top:3px ;">Info. du <br> marché</p></li>
        <li  data-id="gererEquipe" class="marie" ><img src="assets/images/icones-vendeurs2/icones-menu/gestionequipe.svg"><br><br><p style="margin-top:2px">Gestion d'équipe</p></li>
        <li  class="marie"><img src="assets/images/icones-vendeurs2/icones-menu/gestionstock.svg"><br><br><p style="margin-top:2px">Gestion <br>de  stocks</p></li>
        <li data-id="msgMarchand" class="marie"><img src="assets/images/icones-vendeurs2/icones-menu/messagerie.svg"><br><br><br><p style="margin-top:2px">Messagerie</p></li>
        <li data-id="commandedet" class="marie"><img src="assets/images/icones-vendeurs2/icones-menu/commande.svg"><br><br><p style="margin-top:3px">Mes <br>commandes</p></li>
        <li  data-id="modePaiementMarchand1" style="margin-bottom" class="marie"><img src="assets/images/icones-vendeurs2/icones-menu/paiement.svg" ><br><p style="margin-top:15px;">Mode de <br> paiements<p></li>
        <li  data-id="tbMarchand" class="marie"><img src="assets/images/icones-vendeurs2/icones-menu/gestion.svg"><br><br><p style="margin-top:2px">Tableau <br>de gestions</p></li>
        <li  data-id="historiqueCode" data-id="genererCode" class="marie" style="color: #1A7EF5;border:1px solid #1A7EF5;background-color:#F8F8F8"><img src="assets/images/icones-vendeurs2/icones-menu/codepromobleu.svg"><br><br><p style="margin-top:2px">Historique <br>de codes</p></li>
        <li  data-id="nouvellePromo" class="marie"><img src="assets/images/icones-vendeurs2/icones-menu/promo.svg"><br><br><p style="margin-top:2px">Créer<br>une promo</p></li>
        <li  data-id = "articleCorbeille" class="marie"><img src="assets/images/icones-vendeurs2/icones-menu/corbeille.svg"><br><br><br><p style="margin-top:2px">Corbeille</p></li>
        <li  data-id="gestMenu" class="marie"><img src="assets/images/icones-vendeurs2/icones-menu/gestionmenu.svg"><br><br><p style="margin-top:2px">Gestion <br>des menus</p></li>

    </div>
@elseif (\Illuminate\Support\Facades\Auth::user()->role == 4) {{-- Editeur --}}
    <div class="historique-code" id="gerer-equipe-menu">
        <li data-id="infomarch" class="marie" style="margin-left:0px;"><img src="assets/images/icones-vendeurs2/icones-menu/info-marche.svg"><br><br>Info. du <br> marché</li>
        <li  data-id="gererEquipe" class="marie" style="pointer-events:none;opacity:0.6;"><img src="assets/images/icones-vendeurs2/icones-menu/gestionequipe.svg"><br><br>Gestion d'équipe</li>
        <li  class="marie" style="pointer-events:none;opacity:0.6;"><img src="assets/images/icones-vendeurs2/icones-menu/gestionstock.svg"><br><br>Gestion <br>de stocks</li>
        <li data-id="msgMarchand"  class="marie" style="pointer-events:none;opacity:0.6;"><img src="assets/images/icones-vendeurs2/icones-menu/messagerie.svg"><br><br><br>Messagerie</li>
        <li data-id="commandedet" class="marie"><img src="assets/images/icones-vendeurs2/icones-menu/commande.svg"><br><br><p style="margin-top:3px">Mes <br>commandes</p></li>
        <li  data-id="modePaiementMarchand1" class="marie" style="pointer-events:none;opacity:0.6;"><img src="assets/images/icones-vendeurs2/icones-menu/paiement.svg" ><br><br><br>Mode de <br>paiements</li>
        <li data-id="tbMarchand" class="marie" style="color: #1A7EF5"><img src="assets/images/icones-vendeurs2/icones-menu/gestion.svg"><br><br>Tableau <br>de gestions</li>
        <li  data-id="historiqueCode" data-id="genererCode" class="marie" style="pointer-events:none;opacity:0.6;"><img src="assets/images/icones-vendeurs2/icones-menu/codepromobleu.svg"><br><br>Historique <br>de codes</li>
        <li  data-id="nouvellePromo" class="marie"><img src="assets/images/icones-vendeurs2/icones-menu/promo.svg"><br><br>Créer <br> une promo</li>
        <li  data-id = "articleCorbeille" class="marie"><img src="assets/images/icones-vendeurs2/icones-menu/corbeille.svg"><br><br><br>Corbeille</li>
        <li  data-id="gestMenu" class="marie"><img src="assets/images/icones-vendeurs2/icones-menu/gestionmenu.svg" style="pointer-events:none;opacity:0.6;"><br><br>Gestion <br>des menus</li>
    </div>
@elseif (\Illuminate\Support\Facades\Auth::user()->role == 5) {{-- Demarcheur --}}
    <div class="gerer-equipe-menu" id="gerer-equipe-menu">
        <li  data-id="infomarch" class="marie"style="margin-left:0px;"><><img src="assets/images/icones-vendeurs2/icones-menu/info-marche.svg"><br><br>Info.du <br> marché</li>
        <li  data-id="gererEquipe" class="marie" style="pointer-events:none;opacity:0.6;"><img src="assets/images/icones-vendeurs2/icones-menu/gestionequipe.svg"><br><br>Gestion d'équipe</li>
        <li  class="marie" style="pointer-events:none;opacity:0.6;"><img src="assets/images/icones-vendeurs2/icones-menu/gestionstock.svg"><br><br>Gestion <br>de stocks</li>
        <li data-id="msgMarchand"  class="marie" style="color: #1A7EF5"><img src="assets/images/icones-vendeurs2/icones-menu/messagerie.svg"><br><br><br>Messagerie</li>
        <li data-id="commandedet" class="marie"><img src="assets/images/icones-vendeurs2/icones-menu/commande.svg"><br><br><p style="margin-top:3px">Mes <br>commandes</p></li>
        <li  data-id="modePaiementMarchand1" class="marie" style="pointer-events:none;opacity:0.6;"><img src="assets/images/icones-vendeurs2/icones-menu/paiement.svg" ><br><br><br>Mode de <br>paiements</li>
        <li data-id="tbMarchand" class="marie" style="pointer-events:none;opacity:0.6;"><img src="assets/images/icones-vendeurs2/icones-menu/gestion.svg"><br><br>Tableau <br>de gestions</li>
        <li  data-id="historiqueCode" data-id="genererCode" class="marie"><img src="assets/images/icones-vendeurs2/icones-menu/codepromobleu.svg"><br><br>Historique <br>de codes</li>
        <li  data-id="nouvellePromo" class="marie" style="pointer-events:none;opacity:0.6;"><img src="assets/images/icones-vendeurs2/icones-menu/promo.svg"><br><br>Créer <br>une promo</li>
        <li  data-id = "articleCorbeille" class="marie" style="pointer-events:none;opacity:0.6;"><img src="assets/images/icones-vendeurs2/icones-menu/corbeille.svg"><br><br><br>Corbeille</li>
        <li  data-id="gestMenu" class="marie" style="pointer-events:none;opacity:0.6;"><img src="assets/images/icones-vendeurs2/icones-menu/gestionmenu.svg"><br><br>Gestion <br>des menus</li>
    </div>
@elseif (\Illuminate\Support\Facades\Auth::user()->role == 6) {{-- Membre --}}
    <div class="gerer-equipe-menu" id="gerer-equipe-menu">
        <li  data-id="infomarch" class="marie" style="color: #1A7EF5;margin-left:0px;"><img src="assets/images/icones-vendeurs2/icones-menu/info-marche.svg"><br><br>Info.<br> du marché</li>
        <li  data-id="gererEquipe" class="marie" style="pointer-events:none;opacity:0.6;"><img src="assets/images/icones-vendeurs2/icones-menu/gestionequipe.svg"><br><br>Gestion d'équipe</li>
        <li  class="marie" style="pointer-events:none;opacity:0.6;"><img src="assets/images/icones-vendeurs2/icones-menu/gestionstock.svg"><br><br>Gestion <br>de stocks</li>
        <li data-id="msgMarchand"  class="marie" style="pointer-events:none;opacity:0.6;"><img src="assets/images/icones-vendeurs2/icones-menu/messagerie.svg"><br><br><br>Messagerie</li>
        <li data-id="commandedet" class="marie"><img src="assets/images/icones-vendeurs2/icones-menu/commande.svg"><br><br><p style="margin-top:3px">Mes <br>commandes</p></li>
        <li  data-id="modePaiementMarchand1" class="marie" ><img src="assets/images/icones-vendeurs2/icones-menu/paiement.svg" ><br><br><br>Mode <br>de paiements</li>
        <li data-id="tbMarchand" class="marie" style="pointer-events:none;opacity:0.6;"><img src="assets/images/icones-vendeurs2/icones-menu/gestion.svg"><br><br>Tableau <br>de gestions</li>
        <li  data-id="historiqueCode" data-id="genererCode" class="marie" style="pointer-events:none;opacity:0.6;"><img src="assets/images/icones-vendeurs2/icones-menu/codepromobleu.svg"><br><br>Historique <br>de codes</li>
        <li  data-id="nouvellePromo" class="marie" style="pointer-events:none;opacity:0.6;"><img src="assets/images/icones-vendeurs2/icones-menu/promo.svg"><br><br>Créer <br>une promo</li>
        <li  data-id = "articleCorbeille" class="marie" style="pointer-events:none;opacity:0.6;"><img src="assets/images/icones-vendeurs2/icones-menu/corbeille.svg"><br><br><br>Corbeille</li>
        <li  data-id="gestMenu" class="marie" style="pointer-events:none;opacity:0.6;"><img src="assets/images/icones-vendeurs2/icones-menu/gestionmenu.svg"><br><br>Gestion <br>des menus</li>
    </div>
@elseif (\Illuminate\Support\Facades\Auth::user()->role == 7) {{-- Gérant --}}
<div class="gerer-equipe-menu" id="gerer-equipe-menu">
    <li  data-id="infomarch" class="marie" style="margin-left:0px;"><><img src="assets/images/icones-vendeurs2/icones-menu/info-marche.svg" style="color: #1A7EF5"><br><br>Info. du <br>marché</li>
    <li  data-id="gererEquipe" class="marie" style="pointer-events:none;opacity:0.6;"><img src="assets/images/icones-vendeurs2/icones-menu/gestionequipe.svg"><br><br>Gestion d'équipe</li>
    <li  class="marie"><img src="assets/images/icones-vendeurs2/icones-menu/gestionstock.svg"><br><br>Gestion <br>de  stocks</li>
    <li data-id="msgMarchand"  class="marie"><img src="assets/images/icones-vendeurs2/icones-menu/messagerie.svg"><br><br><br>Messagerie</li>
    <li data-id="commandedet" class="marie"><img src="assets/images/icones-vendeurs2/icones-menu/commande.svg"><br><br><p style="margin-top:3px">Mes <br>commandes</p></li>
    <li  data-id="modePaiementMarchand1" class="marie"><img src="assets/images/icones-vendeurs2/icones-menu/paiement.svg" ><br><br><br>Mode <br> de paiements</li>
    <li data-id="tbMarchand"  class="marie"><img src="assets/images/icones-vendeurs2/icones-menu/gestion.svg"><br><br>Tableau <br>de gestions</li>
    <li  data-id="historiqueCode" data-id="genererCode" class="marie" style="color: #1A7EF5;border:1px solid #1A7EF5;background-color:#F8F8F8"><img src="assets/images/icones-vendeurs2/icones-menu/codepromobleu.svg"><br><br>Historique <br> de codes</li>
    <li  data-id="nouvellePromo" class="marie"><img src="assets/images/icones-vendeurs2/icones-menu/promo.svg"><br><br>Créer <br>une promo</li>
    <li  data-id = "articleCorbeille" class="marie"><img src="assets/images/icones-vendeurs2/icones-menu/corbeille.svg"><br><br><br>Corbeille</li>
    <li  data-id="gestMenu" class="marie"><img src="assets/images/icones-vendeurs2/icones-menu/gestionmenu.svg"><br><br>Gestion <br>des menus</li>
</div>
@else
    <div class="gerer-equipe-menu" id="gerer-equipe-menu">
        <li  data-id="infomarch" class="marie" style="color: #1A7EF5;margin-left:0px;"><img src="assets/images/icones-vendeurs2/icones-menu/info-marche.svg"><br><br>Info. du<br> marché</li>
        <li  data-id="gererEquipe" class="marie" style="pointer-events:none;opacity:0.6;"><img src="assets/images/icones-vendeurs2/icones-menu/gestionequipe.svg"><br><br>Gestion d'équipe</li>
        <li  class="marie" style="pointer-events:none;opacity:0.6;"><img src="assets/images/icones-vendeurs2/icones-menu/gestionstock.svg"><br><br>Gestion <br>de stocks</li>
        <li data-id="commandedet" class="marie"><img src="assets/images/icones-vendeurs2/icones-menu/commande.svg"><br><br><p style="margin-top:3px">Mes <br>commandes</p></li>
        <li  class="marie" style="pointer-events:none;opacity:0.6;"><img src="assets/images/icones-vendeurs2/icones-menu/boutique.svg"><br><br>Mes <br> boutiques</li>
        <li  data-id="modePaiementMarchand1" class="marie" style="pointer-events:none;opacity:0.6;"><img src="assets/images/icones-vendeurs2/icones-menu/paiement.svg" ><br><br><br>Mode de <br> paiements</li>
        <li data-id="tbMarchand" class="marie" style="pointer-events:none;opacity:0.6;"><img src="assets/images/icones-vendeurs2/icones-menu/gestion.svg"><br><br>Tableau <br> de gestions</li>
        <li  data-id="historiqueCode" data-id="genererCode" class="marie" style="pointer-events:none;opacity:0.6;"><img src="assets/images/icones-vendeurs2/icones-menu/codepromobleu.svg"><br><br>Historique<br> de codes</li>
        <li  data-id="nouvellePromo" class="marie" style="pointer-events:none;opacity:0.6;"><img src="assets/images/icones-vendeurs2/icones-menu/promo.svg"><br><br>Créer <br>une promo</li>
        <li  data-id = "articleCorbeille" class="marie" style="pointer-events:none;opacity:0.6;"><img src="assets/images/icones-vendeurs2/icones-menu/corbeille.svg"><br><br><br>Corbeille</li>
        <li  data-id="gestMenu" class="marie" style="pointer-events:none;opacity:0.6;"><img src="assets/images/icones-vendeurs2/icones-menu/gestionmenu.svg"><br><br>Gestion <br> des menus</li>
    </div>
@endif
@endauth


                        </div>
                    </div>
                    <div style="border:1px solid #D8D8D8;border-top-left-radius:5px;border-top-right-radius:5px;width: 1200px;margin-left:1%;margin-right: 5px;margin-left:5px;margin-top: 1%; background-color: white; height: 39px;">

                            <p style="font-size: 20px;color: #191970;font-weight: 500; border: 1px; padding-top: 5px;margin-left:10px ">
                                Historique de codes
                            </p>

                    </div>
                    <div  style="background-color:#F8F8F8 ;width: 1200px;margin-left: 5px;margin-right:5px;border-left: 1px solid #D8D8D8;border-right: 1px solid#D8D8D8; height: 36px; ">
                        <table style="width: 1200px;margin-left:0px;">

                            <td style="width: 513px;border-right: 1px solid #D8D8D8;height: 36px;">
                                <p style="text-align: left; color: #191970;
                    font-family: Roboto;
                    font-size: 11px;
                    letter-spacing: 0;
                    line-height: 12px;padding-top: 12px; padding-bottom: 5px; padding-left: 30px;">Nom de de l’article &nbsp <img src="  assets/images/icones-vendeurs2/Arrow3.svg" width="15px" height="15px"></p>
                            </td>
                            <td style="width: 479px;border-right: 1px solid #D8D8D8;height: 36px;">
                                <p style="text-align: left; color: #191970;
                        font-family: Roboto;
                        font-size: 11px;
                        letter-spacing: 0;
                        line-height: 12px;padding-top: 12px; padding-bottom: 5px;padding-left:30px; ">Compte utilisé &nbsp <img src="  assets/images/icones-vendeurs2/Arrow3.svg" width="15px" height="15px"></p>
                            </td>
                            <td style="width: 212px;height: 36px;">
                                <p style="text-align: left; color: #191970;
                        font-family: Roboto;
                        font-size: 11px;
                        letter-spacing: 0;
                        line-height: 12px;padding-top: 12px; padding-bottom: 5px; padding-left:30px">Statuts &nbsp <img src="  assets/images/icones-vendeurs2/Arrow3.svg" width="15px" height="15px"></p>
                                <p></p>
                            </td>
                            </tr>
                        </table>


                    </div>
                    <div style="border:1px solid#D8D8D8;width: 1200px;height:403px;margin-left:5px;margin-right: 5px;border-bottom-left-radius:5px; border-bottom-right-radius:5px;margin-bottom: 5px; background-color: white;">
                        <div class="histC ">
                            <table class="table " style="width: 1200px;height: auto;">

                                <tr style="height: 60px!important;">
                                    <td style="width: 513px;border-right: 1px solid #D8D8D8;padding:0px;">

                                        <div class="container" style="border:1px solid #9B9B9B; background-color:#D8D8D8;border-radius:6px;width: 34px;height: 34px;margin-left: 33px;margin-top:14px; "></div>
                                        <p style="text-align: right;  color: #191970;
                                font-family: Roboto;
                                font-size: 14px;
                                font-weight: 500;
                                letter-spacing: 0;
                                line-height: 15px;margin-top: -23px;margin-right:68px;">Support réglable pour Echo Show 5 (2e génération) | Bleu</p>

                                    </td>
                                    <td style="width: 479px;border-right: 1px solid #D8D8D8;padding:0%;">


                                        <p style="font-size: 14px;color: #191970;font-weight: 500; border: 1px; text-align: left;margin-left:30px;margin-top:24px;">
                                            Uriel Nedelec -
                                        </p>

                                        <p style="color:#a4a4a4; font-size:10px;margin-left:-110px; text-align: center;margin-top: -31px;">uriel.nedelec@gmail.com
                                        </p>

                                        <p style="
                                                  color: #191970;
                                                    font-family: Roboto;
                                                    font-size: 14px;
                                                    font-weight: 500;
                                                    letter-spacing: 0;
                                                    line-height: 15px;
                                                    text-align: right;margin-top: -30px;margin-right:30px;">│03/03/2022 à 18h10</p>


                                    </td>
                                    <td style="width:212px;">
                                        <div class="row" style="padding-top: 7px;margin-left:13px;">
                                            <div class="col-8">
                                                <article  style="border: 1px solid #191970; width: 110px;height: 30px;border-radius: 5px;margin-left: -5px;">
                                                    <p style="color: #191970; font-family: Roboto;
                                            font-size: 16px;
                                            font-weight: bold;
                                            letter-spacing: 0;
                                             text-align: left;margin-top: 5px;margin-left:15px;">XX-XXX-XX</p>
                                                </article>
                                            </div>
                                            <div class="col-4" >
                                                <img src="  assets/images/icones-vendeurs2/En cours.svg" width="30px" height="30px">
                                            </div>

                                        </div>
                                    </td>
                                </tr>

                                <tr style="height: 60px!important;">
                                    <td style="width: 513px;border-right: 1px solid #D8D8D8;padding:0px;">

                                        <div class="container" style="border:1px solid #9B9B9B; background-color:#D8D8D8;border-radius:6px;width: 34px;height: 34px;margin-left: 33px;margin-top:14px; "></div>
                                        <p style="text-align: right;  color: #191970;
                                font-family: Roboto;
                                font-size: 14px;
                                font-weight: 500;
                                letter-spacing: 0;
                                line-height: 15px;margin-top: -23px;margin-right:68px;">Support réglable pour Echo Show 5 (2e génération) | Bleu</p>

                                    </td>
                                    <td style="width: 479px;border-right: 1px solid #D8D8D8;padding:0%;">


                                        <p style="font-size: 14px;color: #191970;font-weight: 500; border: 1px; text-align: left;margin-left:30px;margin-top:22px;">
                                            Uriel Nedelec -
                                        </p>

                                        <p style="color:#a4a4a4; font-size:10px;margin-left:-110px; text-align: center;margin-top: -31px;">uriel.nedelec@gmail.com
                                        </p>

                                        <p style="
                                                  color: #191970;
                                                    font-family: Roboto;
                                                    font-size: 14px;
                                                    font-weight: 500;
                                                    letter-spacing: 0;
                                                    line-height: 15px;
                                                    text-align: right;margin-top: -30px;margin-right:30px;">│03/03/2022 à 18h10</p>


                                    </td>
                                    <td style="width:212px;">
                                        <div class="row" style="padding-top: 7px;margin-left:13px;">
                                            <div class="col-8">
                                                <article  style="border: 1px solid #191970; width: 110px;height: 30px;border-radius: 5px;margin-left: -5px;">
                                                    <p style="color: #191970; font-family: Roboto;
                                            font-size: 16px;
                                            font-weight: bold;
                                            letter-spacing: 0;
                                             text-align: left;margin-top: 5px;margin-left:15px;">XX-XXX-XX</p>
                                                </article>
                                            </div>
                                            <div class="col-4" >
                                                <img src="  assets/images/icones-vendeurs2/En cours.svg" width="30px" height="30px">
                                            </div>

                                        </div>
                                    </td>
                                </tr>

                                <tr style="height: 60px!important;">
                                    <td style="width: 513px;border-right: 1px solid #D8D8D8;padding:0px;">

                                        <div class="container" style="border:1px solid #9B9B9B; background-color:#D8D8D8;border-radius:6px;width: 34px;height: 34px;margin-left: 33px;margin-top:14px; "></div>
                                        <p style="text-align: right;  color: #191970;
                                font-family: Roboto;
                                font-size: 14px;
                                font-weight: 500;
                                letter-spacing: 0;
                                line-height: 15px;margin-top: -23px;margin-right:68px;">Support réglable pour Echo Show 5 (2e génération) | Bleu</p>

                                    </td>
                                    <td style="width: 479px;border-right: 1px solid #D8D8D8;padding:0%;">


                                        <p style="font-size: 14px;color: #191970;font-weight: 500; border: 1px; text-align: left;margin-left:30px;margin-top:22px;">
                                            Uriel Nedelec -
                                        </p>

                                        <p style="color:#a4a4a4; font-size:10px;margin-left:-110px; text-align: center;margin-top: -31px;">uriel.nedelec@gmail.com
                                        </p>

                                        <p style="
                                                  color: #191970;
                                                    font-family: Roboto;
                                                    font-size: 14px;
                                                    font-weight: 500;
                                                    letter-spacing: 0;
                                                    line-height: 15px;
                                                    text-align: right;margin-top: -30px;margin-right:30px;">│03/03/2022 à 18h10</p>


                                    </td>
                                    <td style="width:212px;">
                                        <div class="row" style="padding-top: 7px;margin-left:13px;">
                                            <div class="col-8">
                                                <article  style="border: 1px solid #191970; width: 110px;height: 30px;border-radius: 5px;margin-left: -5px;">
                                                    <p style="color: #191970; font-family: Roboto;
                                            font-size: 16px;
                                            font-weight: bold;
                                            letter-spacing: 0;
                                             text-align: left;margin-top: 5px;margin-left:15px;">XX-XXX-XX</p>
                                                </article>
                                            </div>
                                            <div class="col-4" >
                                                <img src="  assets/images/icones-vendeurs2/En cours.svg" width="30px" height="30px">
                                            </div>

                                        </div>
                                    </td>
                                </tr>

                                <tr style="height: 60px!important;">
                                    <td style="width: 513px;border-right: 1px solid #D8D8D8;padding:0px;">

                                        <div class="container" style="border:1px solid #9B9B9B; background-color:#D8D8D8;border-radius:6px;width: 34px;height: 34px;margin-left: 33px;margin-top:14px; "></div>
                                        <p style="text-align: right;  color: #191970;
                                font-family: Roboto;
                                font-size: 14px;
                                font-weight: 500;
                                letter-spacing: 0;
                                line-height: 15px;margin-top: -23px;margin-right:68px;">Support réglable pour Echo Show 5 (2e génération) | Bleu</p>

                                    </td>
                                    <td style="width: 479px;border-right: 1px solid #D8D8D8;padding:0%;">


                                        <p style="font-size: 14px;color: #191970;font-weight: 500; border: 1px; text-align: left;margin-left:30px;margin-top:22px;">
                                            Uriel Nedelec -
                                        </p>

                                        <p style="color:#a4a4a4; font-size:10px;margin-left:-110px; text-align: center;margin-top: -31px;">uriel.nedelec@gmail.com
                                        </p>

                                        <p style="
                                                  color: #191970;
                                                    font-family: Roboto;
                                                    font-size: 14px;
                                                    font-weight: 500;
                                                    letter-spacing: 0;
                                                    line-height: 15px;
                                                    text-align: right;margin-top: -30px;margin-right:30px;">│03/03/2022 à 18h10</p>


                                    </td>
                                    <td style="width:212px;">
                                        <div class="row" style="padding-top: 7px;margin-left:13px;">
                                            <div class="col-8">
                                                <article  style="border: 1px solid #191970; width: 110px;height: 30px;border-radius: 5px;margin-left: -5px;">
                                                    <p style="color: #191970; font-family: Roboto;
                                            font-size: 16px;
                                            font-weight: bold;
                                            letter-spacing: 0;
                                             text-align: left;margin-top: 5px;margin-left:15px;">XX-XXX-XX</p>
                                                </article>
                                            </div>
                                            <div class="col-4" >
                                                <img src="  assets/images/icones-vendeurs2/Group 13.svg" width="30px" height="30px">
                                            </div>

                                        </div>
                                    </td>
                                </tr>

                                <tr style="height: 60px!important;">
                                    <td style="width: 513px;border-right: 1px solid #D8D8D8;padding:0px;">

                                        <div class="container" style="border:1px solid #9B9B9B; background-color:#D8D8D8;border-radius:6px;width: 34px;height: 34px;margin-left: 33px;margin-top:14px; "></div>
                                        <p style="text-align: right;  color: #191970;
                                font-family: Roboto;
                                font-size: 14px;
                                font-weight: 500;
                                letter-spacing: 0;
                                line-height: 15px;margin-top: -23px;margin-right:68px;">Support réglable pour Echo Show 5 (2e génération) | Bleu</p>

                                    </td>
                                    <td style="width: 479px;border-right: 1px solid #D8D8D8;padding:0%;">


                                        <p style="font-size: 14px;color: #191970;font-weight: 500; border: 1px; text-align: left;margin-left:30px;margin-top:22px;">
                                            Uriel Nedelec -
                                        </p>

                                        <p style="color:#a4a4a4; font-size:10px;margin-left:-110px; text-align: center;margin-top: -31px;">uriel.nedelec@gmail.com
                                        </p>

                                        <p style="
                                                  color: #191970;
                                                    font-family: Roboto;
                                                    font-size: 14px;
                                                    font-weight: 500;
                                                    letter-spacing: 0;
                                                    line-height: 15px;
                                                    text-align: right;margin-top: -30px;margin-right:30px;">│03/03/2022 à 18h10</p>


                                    </td>
                                    <td style="width:212px;">
                                        <div class="row" style="padding-top: 7px;margin-left:13px;">
                                            <div class="col-8">
                                                <article  style="border: 1px solid #191970; width: 110px;height: 30px;border-radius: 5px;margin-left: -5px;">
                                                    <p style="color: #191970; font-family: Roboto;
                                            font-size: 16px;
                                            font-weight: bold;
                                            letter-spacing: 0;
                                             text-align: left;margin-top: 5px;margin-left:15px;">XX-XXX-XX</p>
                                                </article>
                                            </div>
                                            <div class="col-4" >
                                                <img src="  assets/images/icones-vendeurs2/Group 14.svg" width="30px" height="30px">
                                            </div>

                                        </div>
                                    </td>
                                </tr>


                                <tr style="height: 60px!important;">
                                    <td style="width: 513px;border-right: 1px solid #D8D8D8;padding:0px;">

                                        <div class="container" style="border:1px solid #9B9B9B; background-color:#D8D8D8;border-radius:6px;width: 34px;height: 34px;margin-left: 33px;margin-top:14px; "></div>
                                        <p style="text-align: right;  color: #191970;
                                font-family: Roboto;
                                font-size: 14px;
                                font-weight: 500;
                                letter-spacing: 0;
                                line-height: 15px;margin-top: -23px;margin-right:68px;">Support réglable pour Echo Show 5 (2e génération) | Bleu</p>

                                    </td>
                                    <td style="width: 479px;border-right: 1px solid #D8D8D8;padding:0%;">


                                        <p style="font-size: 14px;color: #191970;font-weight: 500; border: 1px; text-align: left;margin-left:30px;margin-top:22px;">
                                            Uriel Nedelec -
                                        </p>

                                        <p style="color:#a4a4a4; font-size:10px;margin-left:-110px; text-align: center;margin-top: -31px;">uriel.nedelec@gmail.com
                                        </p>

                                        <p style="
                                                  color: #191970;
                                                    font-family: Roboto;
                                                    font-size: 14px;
                                                    font-weight: 500;
                                                    letter-spacing: 0;
                                                    line-height: 15px;
                                                    text-align: right;margin-top: -30px;margin-right:30px;">│03/03/2022 à 18h10</p>


                                    </td>
                                    <td style="width:212px;">
                                        <div class="row" style="padding-top: 7px;margin-left:13px;">
                                            <div class="col-8">
                                                <article  style="border: 1px solid #191970; width: 110px;height: 30px;border-radius: 5px;margin-left: -5px;">
                                                    <p style="color: #191970; font-family: Roboto;
                                            font-size: 16px;
                                            font-weight: bold;
                                            letter-spacing: 0;
                                             text-align: left;margin-top: 5px;margin-left:15px;">XX-XXX-XX</p>
                                                </article>
                                            </div>
                                            <div class="col-4" >
                                                <img src="  assets/images/icones-vendeurs2/En cours.svg" width="30px" height="30px">
                                            </div>

                                        </div>
                                    </td>
                                </tr>

                                <tr style="height: 60px!important;">
                                    <td style="width: 513px;border-right: 1px solid #D8D8D8;padding:0px;">

                                        <div class="container" style="border:1px solid #9B9B9B; background-color:#D8D8D8;border-radius:6px;width: 34px;height: 34px;margin-left: 33px;margin-top:14px; "></div>
                                        <p style="text-align: right;  color: #191970;
                                font-family: Roboto;
                                font-size: 14px;
                                font-weight: 500;
                                letter-spacing: 0;
                                line-height: 15px;margin-top: -23px;margin-right:68px;">Support réglable pour Echo Show 5 (2e génération) | Bleu</p>

                                    </td>
                                    <td style="width: 479px;border-right: 1px solid #D8D8D8;padding:0%;">


                                        <p style="font-size: 14px;color: #191970;font-weight: 500; border: 1px; text-align: left;margin-left:30px;margin-top:22px;">
                                            Uriel Nedelec -
                                        </p>

                                        <p style="color:#a4a4a4; font-size:10px;margin-left:-110px; text-align: center;margin-top: -31px;">uriel.nedelec@gmail.com
                                        </p>

                                        <p style="
                                                  color: #191970;
                                                    font-family: Roboto;
                                                    font-size: 14px;
                                                    font-weight: 500;
                                                    letter-spacing: 0;
                                                    line-height: 15px;
                                                    text-align: right;margin-top: -30px;margin-right:30px;">│03/03/2022 à 18h10</p>


                                    </td>
                                    <td style="width:212px;">
                                        <div class="row" style="padding-top: 7px;margin-left:13px;">
                                            <div class="col-8">
                                                <article  style="border: 1px solid #191970; width: 110px;height: 30px;border-radius: 5px;margin-left: -5px;">
                                                    <p style="color: #191970; font-family: Roboto;
                                            font-size: 16px;
                                            font-weight: bold;
                                            letter-spacing: 0;
                                             text-align: left;margin-top: 5px;margin-left:15px;">XX-XXX-XX</p>
                                                </article>
                                            </div>
                                            <div class="col-4" >
                                                <img src="  assets/images/icones-vendeurs2/En cours.svg" width="30px" height="30px">
                                            </div>

                                        </div>
                                    </td>
                                </tr>

                                <tr style="height: 60px!important;">
                                    <td style="width: 513px;border-right: 1px solid #D8D8D8;padding:0px;">

                                        <div class="container" style="border:1px solid #9B9B9B; background-color:#D8D8D8;border-radius:6px;width: 34px;height: 34px;margin-left: 33px;margin-top:14px; "></div>
                                        <p style="text-align: right;  color: #191970;
                                font-family: Roboto;
                                font-size: 14px;
                                font-weight: 500;
                                letter-spacing: 0;
                                line-height: 15px;margin-top: -23px;margin-right:68px;">Support réglable pour Echo Show 5 (2e génération) | Bleu</p>

                                    </td>
                                    <td style="width: 479px;border-right: 1px solid #D8D8D8;padding:0%;">


                                        <p style="font-size: 14px;color: #191970;font-weight: 500; border: 1px; text-align: left;margin-left:30px;margin-top:22px;">
                                            Uriel Nedelec -
                                        </p>

                                        <p style="color:#a4a4a4; font-size:10px;margin-left:-110px; text-align: center;margin-top: -31px;">uriel.nedelec@gmail.com
                                        </p>

                                        <p style="
                                                  color: #191970;
                                                    font-family: Roboto;
                                                    font-size: 14px;
                                                    font-weight: 500;
                                                    letter-spacing: 0;
                                                    line-height: 15px;
                                                    text-align: right;margin-top: -30px;margin-right:30px;">│03/03/2022 à 18h10</p>


                                    </td>
                                    <td style="width:212px;">
                                        <div class="row" style="padding-top: 7px;margin-left:13px;">
                                            <div class="col-8">
                                                <article  style="border: 1px solid #191970; width: 110px;height: 30px;border-radius: 5px;margin-left: -5px;">
                                                    <p style="color: #191970; font-family: Roboto;
                                            font-size: 16px;
                                            font-weight: bold;
                                            letter-spacing: 0;
                                             text-align: left;margin-top: 5px;margin-left:15px;">XX-XXX-XX</p>
                                                </article>
                                            </div>
                                            <div class="col-4" >
                                                <img src="  assets/images/icones-vendeurs2/Group 13.svg" width="30px" height="30px">
                                            </div>

                                        </div>
                                    </td>
                                </tr>

                                <tr style="height: 60px!important;">
                                    <td style="width: 513px;border-right: 1px solid #D8D8D8;padding:0px;">

                                        <div class="container" style="border:1px solid #9B9B9B; background-color:#D8D8D8;border-radius:6px;width: 34px;height: 34px;margin-left: 33px;margin-top:14px; "></div>
                                        <p style="text-align: right;  color: #191970;
                                font-family: Roboto;
                                font-size: 14px;
                                font-weight: 500;
                                letter-spacing: 0;
                                line-height: 15px;margin-top: -23px;margin-right:68px;">Support réglable pour Echo Show 5 (2e génération) | Bleu</p>

                                    </td>
                                    <td style="width: 479px;border-right: 1px solid #D8D8D8;padding:0%;">


                                        <p style="font-size: 14px;color: #191970;font-weight: 500; border: 1px; text-align: left;margin-left:30px;margin-top:22px;">
                                            Uriel Nedelec -
                                        </p>

                                        <p style="color:#a4a4a4; font-size:10px;margin-left:-110px; text-align: center;margin-top: -31px;">uriel.nedelec@gmail.com
                                        </p>

                                        <p style="
                                                  color: #191970;
                                                    font-family: Roboto;
                                                    font-size: 14px;
                                                    font-weight: 500;
                                                    letter-spacing: 0;
                                                    line-height: 15px;
                                                    text-align: right;margin-top: -30px;margin-right:30px;">│03/03/2022 à 18h10</p>


                                    </td>
                                    <td style="width:212px;">
                                        <div class="row" style="padding-top: 7px;margin-left:13px;">
                                            <div class="col-8">
                                                <article  style="border: 1px solid #191970; width: 110px;height: 30px;border-radius: 5px;margin-left: -5px;">
                                                    <p style="color: #191970; font-family: Roboto;
                                            font-size: 16px;
                                            font-weight: bold;
                                            letter-spacing: 0;
                                             text-align: left;margin-top: 5px;margin-left:15px;">XX-XXX-XX</p>
                                                </article>
                                            </div>
                                            <div class="col-4" >
                                                <img src="  assets/images/icones-vendeurs2/Group 13.svg" width="30px" height="30px">
                                            </div>

                                        </div>
                                    </td>
                                </tr>

                                <tr style="height: 60px!important;">
                                    <td style="width: 513px;border-right: 1px solid #D8D8D8;padding:0px;">

                                        <div class="container" style="border:1px solid #9B9B9B; background-color:#D8D8D8;border-radius:6px;width: 34px;height: 34px;margin-left: 33px;margin-top:14px; "></div>
                                        <p style="text-align: right;  color: #191970;
                                font-family: Roboto;
                                font-size: 14px;
                                font-weight: 500;
                                letter-spacing: 0;
                                line-height: 15px;margin-top: -23px;margin-right:68px;">Support réglable pour Echo Show 5 (2e génération) | Bleu</p>

                                    </td>
                                    <td style="width: 479px;border-right: 1px solid #D8D8D8;padding:0%;">


                                        <p style="font-size: 14px;color: #191970;font-weight: 500; border: 1px; text-align: left;margin-left:30px;margin-top:22px;">
                                            Uriel Nedelec -
                                        </p>

                                        <p style="color:#a4a4a4; font-size:10px;margin-left:-110px; text-align: center;margin-top: -31px;">uriel.nedelec@gmail.com
                                        </p>

                                        <p style="
                                                  color: #191970;
                                                    font-family: Roboto;
                                                    font-size: 14px;
                                                    font-weight: 500;
                                                    letter-spacing: 0;
                                                    line-height: 15px;
                                                    text-align: right;margin-top: -30px;margin-right:30px;">│03/03/2022 à 18h10</p>


                                    </td>
                                    <td style="width:212px;">
                                        <div class="row" style="padding-top: 7px;margin-left:13px;">
                                            <div class="col-8">
                                                <article  style="border: 1px solid #191970; width: 110px;height: 30px;border-radius: 5px;margin-left: -5px;">
                                                    <p style="color: #191970; font-family: Roboto;
                                            font-size: 16px;
                                            font-weight: bold;
                                            letter-spacing: 0;
                                             text-align: left;margin-top: 5px;margin-left:15px;">XX-XXX-XX</p>
                                                </article>
                                            </div>
                                            <div class="col-4" >
                                                <img src="  assets/images/icones-vendeurs2/Group 14.svg" width="30px" height="30px">
                                            </div>

                                        </div>
                                    </td>
                                </tr>

                                <tr style="height: 60px!important;">
                                    <td style="width: 513px;border-right: 1px solid #D8D8D8;padding:0px;">

                                        <div class="container" style="border:1px solid #9B9B9B; background-color:#D8D8D8;border-radius:6px;width: 34px;height: 34px;margin-left: 33px;margin-top:14px; "></div>
                                        <p style="text-align: right;  color: #191970;
                                font-family: Roboto;
                                font-size: 14px;
                                font-weight: 500;
                                letter-spacing: 0;
                                line-height: 15px;margin-top: -23px;margin-right:68px;">Support réglable pour Echo Show 5 (2e génération) | Bleu</p>

                                    </td>
                                    <td style="width: 479px;border-right: 1px solid #D8D8D8;padding:0%;">


                                        <p style="font-size: 14px;color: #191970;font-weight: 500; border: 1px; text-align: left;margin-left:30px;margin-top:22px;">
                                            Uriel Nedelec -
                                        </p>

                                        <p style="color:#a4a4a4; font-size:10px;margin-left:-110px; text-align: center;margin-top: -31px;">uriel.nedelec@gmail.com
                                        </p>

                                        <p style="
                                                  color: #191970;
                                                    font-family: Roboto;
                                                    font-size: 14px;
                                                    font-weight: 500;
                                                    letter-spacing: 0;
                                                    line-height: 15px;
                                                    text-align: right;margin-top: -30px;margin-right:30px;">│03/03/2022 à 18h10</p>


                                    </td>
                                    <td style="width:212px;">
                                        <div class="row" style="padding-top: 7px;margin-left:13px;">
                                            <div class="col-8">
                                                <article  style="border: 1px solid #191970; width: 110px;height: 30px;border-radius: 5px;margin-left: -5px;">
                                                    <p style="color: #191970; font-family: Roboto;
                                            font-size: 16px;
                                            font-weight: bold;
                                            letter-spacing: 0;
                                             text-align: left;margin-top: 5px;margin-left:15px;">XX-XXX-XX</p>
                                                </article>
                                            </div>
                                            <div class="col-4" >
                                                <img src="  assets/images/icones-vendeurs2/Group 14.svg" width="30px" height="30px">
                                            </div>

                                        </div>
                                    </td>
                                </tr>

                                <tr style="height: 60px!important;">
                                    <td style="width: 513px;border-right: 1px solid #D8D8D8;padding:0px;">

                                        <div class="container" style="border:1px solid #9B9B9B; background-color:#D8D8D8;border-radius:6px;width: 34px;height: 34px;margin-left: 33px;margin-top:14px; "></div>
                                        <p style="text-align: right;  color: #191970;
                                font-family: Roboto;
                                font-size: 14px;
                                font-weight: 500;
                                letter-spacing: 0;
                                line-height: 15px;margin-top: -23px;margin-right:68px;">Support réglable pour Echo Show 5 (2e génération) | Bleu</p>

                                    </td>
                                    <td style="width: 479px;border-right: 1px solid #D8D8D8;padding:0%;">


                                        <p style="font-size: 14px;color: #191970;font-weight: 500; border: 1px; text-align: left;margin-left:30px;margin-top:22px;">
                                            Uriel Nedelec -
                                        </p>

                                        <p style="color:#a4a4a4; font-size:10px;margin-left:-110px; text-align: center;margin-top: -31px;">uriel.nedelec@gmail.com
                                        </p>

                                        <p style="
                                                  color: #191970;
                                                    font-family: Roboto;
                                                    font-size: 14px;
                                                    font-weight: 500;
                                                    letter-spacing: 0;
                                                    line-height: 15px;
                                                    text-align: right;margin-top: -30px;margin-right:30px;">│03/03/2022 à 18h10</p>


                                    </td>
                                    <td style="width:212px;">
                                        <div class="row" style="padding-top: 7px;margin-left:13px;">
                                            <div class="col-8">
                                                <article  style="border: 1px solid #191970; width: 110px;height: 30px;border-radius: 5px;margin-left: -5px;">
                                                    <p style="color: #191970; font-family: Roboto;
                                            font-size: 16px;
                                            font-weight: bold;
                                            letter-spacing: 0;
                                             text-align: left;margin-top: 5px;margin-left:15px;">XX-XXX-XX</p>
                                                </article>
                                            </div>
                                            <div class="col-4" >
                                                <img src="  assets/images/icones-vendeurs2/En cours.svg" width="30px" height="30px">
                                            </div>

                                        </div>
                                    </td>
                                </tr>

                                <tr style="height: 60px!important;">
                                    <td style="width: 513px;border-right: 1px solid #D8D8D8;padding:0px;">

                                        <div class="container" style="border:1px solid #9B9B9B; background-color:#D8D8D8;border-radius:6px;width: 34px;height: 34px;margin-left: 33px;margin-top:14px; "></div>
                                        <p style="text-align: right;  color: #191970;
                                font-family: Roboto;
                                font-size: 14px;
                                font-weight: 500;
                                letter-spacing: 0;
                                line-height: 15px;margin-top: -23px;margin-right:68px;">Support réglable pour Echo Show 5 (2e génération) | Bleu</p>

                                    </td>
                                    <td style="width: 479px;border-right: 1px solid #D8D8D8;padding:0%;">


                                        <p style="font-size: 14px;color: #191970;font-weight: 500; border: 1px; text-align: left;margin-left:30px;margin-top:22px;">
                                            Uriel Nedelec -
                                        </p>

                                        <p style="color:#a4a4a4; font-size:10px;margin-left:-110px; text-align: center;margin-top: -31px;">uriel.nedelec@gmail.com
                                        </p>

                                        <p style="
                                                  color: #191970;
                                                    font-family: Roboto;
                                                    font-size: 14px;
                                                    font-weight: 500;
                                                    letter-spacing: 0;
                                                    line-height: 15px;
                                                    text-align: right;margin-top: -30px;margin-right:30px;">│03/03/2022 à 18h10</p>


                                    </td>
                                    <td style="width:212px;">
                                        <div class="row" style="padding-top: 7px;margin-left:13px;">
                                            <div class="col-8">
                                                <article  style="border: 1px solid #191970; width: 110px;height: 30px;border-radius: 5px;margin-left: -5px;">
                                                    <p style="color: #191970; font-family: Roboto;
                                            font-size: 16px;
                                            font-weight: bold;
                                            letter-spacing: 0;
                                             text-align: left;margin-top: 5px;margin-left:15px;">XX-XXX-XX</p>
                                                </article>
                                            </div>
                                            <div class="col-4" >
                                                <img src="  assets/images/icones-vendeurs2/En cours.svg" width="30px" height="30px">
                                            </div>

                                        </div>
                                    </td>
                                </tr>


                        </div>
                        </table>


                    </div>
                </div>
            </div>

        </div>
    </div>




    </div>
    </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js " integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM " crossorigin="anonymous "></script>

    <script type="text/javascript ">
    </script>
</body>

</html>
