

    <style>
        @import url('https://fonts.googleapis.com/css2?family=Roboto&display=swap');
        .modal-content-gest-menu,
        .modal-body-gest-menu {
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

        .modal-dialog-gest-menu {
            position: relative;
            height: 579px;
            left: -350px;
            top: 60px;
        }

    </style>

</head>

<body>

    <div class="overlay">
        <!-- The Modal -->
        <div class="modal modal-marchand-close" id="gestMenu">
            <div class="modal-dialog modal-dialog-gest-menu">
                <div class="modal-content modal-content-gest-menu">
                    <div style="margin-top:5px;">
                        @include('front.app-module.marchand.marchand-modals.marchand-profil-data')
                        <div style="border:1px solid #D8D8D8;border-radius: 5px;margin-top:-80px;position: absolute;margin-left: 334px; width:873px;height: 80px;background-color: white; display: flex; flex-direction: column; justify-content: center; align-items: center">
                            {{-- @include('front.app-module.marchand.marchand-modals.menu-modal-marchand') --}}
                            @auth
                            @if (\Illuminate\Support\Facades\Auth::user()->role == 2)

                                <div class="historique-code" id="gerer-equipe-menu">
                                    <li data-id="infomarch" class="marie" style="margin-left:0px;"><img src="assets/images/icones-vendeurs2/icones-menu/info-marche.svg"><br><br><p style="margin-top:3px">Info. du <br> marché</p></li>
                                    <li  data-id="gererEquipe" class="marie" ><img src="assets/images/icones-vendeurs2/icones-menu/gestionequipe.svg"><br><br><p style="margin-top:2px">Gestion d'équipe</p></li>
                                    <li  class="marie"><img src="assets/images/icones-vendeurs2/icones-menu/gestionstock.svg"><br><br><p style="margin-top:2px">Gestion <br>de  stocks</p></li>
                                    <li data-id="msgMarchand" class="marie"><img src="assets/images/icones-vendeurs2/icones-menu/messagerie.svg"><br><br><br><p style="margin-top:2px">Messagerie</p></li>
                                    <li data-id="commandedet" class="marie" style="">
                                        <span class="marchand-commande-counter" id="marchand-commande-counter_id" style="display: none"></span>
                                        <img src="assets/images/icones-vendeurs2/icones-menu/commande.svg"><br><br>
                                        <p style="margin-top:3px">Mes <br>commandes</p>
                                    </li>
                                    <li  data-id="modePaiementMarchand1" style="margin-bottom" class="marie"><img src="assets/images/icones-vendeurs2/icones-menu/paiement.svg" ><br><p style="margin-top:15px;">Mode de <br> paiements<p></li>
                                    <li data-id="tbMarchand" class="marie"><img src="assets/images/icones-vendeurs2/icones-menu/gestion.svg"><br><br><p style="margin-top:2px">Tableau <br>de gestions</p></li>
                                    <li  data-id="historiqueCode" data-id="genererCode" class="marie" ><img src="assets/images/icones-vendeurs2/icones-menu/codepromo.svg"><br><br><p style="margin-top:2px">Historique <br>de codes</p></li>
                                    <li  data-id="nouvellePromo" class="marie"><img src="assets/images/icones-vendeurs2/icones-menu/promo.svg"><br><br><p style="margin-top:2px">Créer<br>une promo</p></li>
                                    <li  data-id = "articleCorbeille" class="marie"><img src="assets/images/icones-vendeurs2/icones-menu/corbeille.svg"><br><br><br><p style="margin-top:2px">Corbeille</p></li>
                                    <li  data-id="gestMenu" class="marie" style="color: #1A7EF5;border:1px solid #1A7EF5;background-color:#F8F8F8"><img src="assets/images/icones-vendeurs2/icones-menu/gestionmenubleu.svg"><br><br><p style="margin-top:2px">Gestion <br>des menus</p></li>
                                </div>

                            @elseif (\Illuminate\Support\Facades\Auth::user()->role == 4) {{-- Editeur --}}
                                <div class="historique-code" id="gerer-equipe-menu">
                                    <li data-id="infomarch" class="marie" style="margin-left:0px;"><img src="assets/images/icones-vendeurs2/icones-menu/info-marche.svg"><br><br>Info. du <br> marché</li>
                                    <li  data-id="gererEquipe" class="marie" style="pointer-events:none;opacity:0.6;"><img src="assets/images/icones-vendeurs2/icones-menu/gestionequipe.svg"><br><br>Gestion d'équipe</li>
                                    <li  class="marie" style="pointer-events:none;opacity:0.6;"><img src="assets/images/icones-vendeurs2/icones-menu/gestionstock.svg"><br><br>Gestion <br>de stocks</li>
                                    <li data-id="msgMarchand"  class="marie" style="pointer-events:none;opacity:0.6;"><img src="assets/images/icones-vendeurs2/icones-menu/messagerie.svg"><br><br><br>Messagerie</li>
                                    <li data-id="commandedet" class="marie"><img src="assets/images/icones-vendeurs2/icones-menu/commande.svg"><br><br>Mes<br> commandes</li>
                                    <li  data-id="modePaiementMarchand1" class="marie" style="pointer-events:none;opacity:0.6;"><img src="assets/images/icones-vendeurs2/icones-menu/paiement.svg" ><br><br><br>Mode de <br>paiements</li>
                                    <li data-id="tbMarchand" class="marie" style="color: #1A7EF5"><img src="assets/images/icones-vendeurs2/icones-menu/gestion.svg"><br><br>Tableau <br>de gestions</li>
                                    <li  data-id="historiqueCode" data-id="genererCode" class="marie" style="pointer-events:none;opacity:0.6;"><img src="assets/images/icones-vendeurs2/icones-menu/codepromo.svg"><br><br>Historique <br>de codes</li>
                                    <li  data-id="nouvellePromo" class="marie"><img src="assets/images/icones-vendeurs2/icones-menu/promo.svg"><br><br>Créer <br> une promo</li>
                                    <li  data-id = "articleCorbeille" class="marie"><img src="assets/images/icones-vendeurs2/icones-menu/corbeille.svg"><br><br><br>Corbeille</li>
                                    <li  data-id="gestMenu" class="marie"><img src="assets/images/icones-vendeurs2/icones-menu/gestionmenubleu.svg" style="pointer-events:none;opacity:0.6;"><br><br>Gestion <br>des menus</li>
                                </div>
                            @elseif (\Illuminate\Support\Facades\Auth::user()->role == 5) {{-- Demarcheur --}}
                                <div class="gerer-equipe-menu" id="gerer-equipe-menu">
                                    <li data-id="infomarch" class="marie" style="margin-left:0px;"><img src="assets/images/icones-vendeurs2/icones-menu/info-marche.svg"><br><br>Info.du <br> marché</li>
                                    <li  data-id="gererEquipe" class="marie" style="pointer-events:none;opacity:0.6;"><img src="assets/images/icones-vendeurs2/icones-menu/gestionequipe.svg"><br><br>Gestion d'équipe</li>
                                    <li  class="marie" style="pointer-events:none;opacity:0.6;"><img src="assets/images/icones-vendeurs2/icones-menu/gestionstock.svg"><br><br>Gestion <br>de stocks</li>
                                    <li data-id="msgMarchand"  class="marie" style="color: #1A7EF5"><img src="assets/images/icones-vendeurs2/icones-menu/messagerie.svg"><br><br><br>Messagerie</li>
                                    <li data-id="commandedet" class="marie" style="pointer-events:none;opacity:0.6;"><img src="assets/images/icones-vendeurs2/icones-menu/commande.svg"><br><br>Mes <br>commandes</li>
                                    <li  data-id="modePaiementMarchand1" class="marie" style="pointer-events:none;opacity:0.6;"><img src="assets/images/icones-vendeurs2/icones-menu/paiement.svg" ><br><br><br>Mode de <br>paiements</li>
                                    <li data-id="tbMarchand" class="marie" style="pointer-events:none;opacity:0.6;"><img src="assets/images/icones-vendeurs2/icones-menu/gestion.svg"><br><br>Tableau <br>de gestions</li>
                                    <li  data-id="historiqueCode" data-id="genererCode" class="marie"><img src="assets/images/icones-vendeurs2/icones-menu/codepromo.svg"><br><br>Historique <br>de codes</li>
                                    <li  data-id="nouvellePromo" class="marie" style="pointer-events:none;opacity:0.6;"><img src="assets/images/icones-vendeurs2/icones-menu/promo.svg"><br><br>Créer <br>une promo</li>
                                    <li  data-id = "articleCorbeille" class="marie" style="pointer-events:none;opacity:0.6;"><img src="assets/images/icones-vendeurs2/icones-menu/corbeille.svg"><br><br><br>Corbeille</li>
                                    <li  data-id="gestMenu" class="marie" style="pointer-events:none;opacity:0.6;"><img src="assets/images/icones-vendeurs2/icones-menu/gestionmenubleu.svg"><br><br>Gestion <br>des menus</li>
                                </div>
                            @elseif (\Illuminate\Support\Facades\Auth::user()->role == 6) {{-- Membre --}}
                                <div class="gerer-equipe-menu" id="gerer-equipe-menu">
                                    <li data-id="infomarch" class="marie" style="color: #1A7EF5;margin-left:0px;"><img src="assets/images/icones-vendeurs2/icones-menu/info-marche.svg"><br><br>Info.<br> du marché</li>
                                    <li  data-id="gererEquipe" class="marie" style="pointer-events:none;opacity:0.6;"><img src="assets/images/icones-vendeurs2/icones-menu/gestionequipe.svg"><br><br>Gestion d'équipe</li>
                                    <li  class="marie" style="pointer-events:none;opacity:0.6;"><img src="assets/images/icones-vendeurs2/icones-menu/gestionstock.svg"><br><br>Gestion <br>de stocks</li>
                                    <li data-id="msgMarchand"  class="marie" style="pointer-events:none;opacity:0.6;"><img src="assets/images/icones-vendeurs2/icones-menu/messagerie.svg"><br><br><br>Messagerie</li>
                                    <li data-id="commandedet" class="marie" style="pointer-events:none;opacity:0.6;"><img src="assets/images/icones-vendeurs2/icones-menu/commande.svg"><br><br>Mes<br> commandes</li>
                                    <li  data-id="modePaiementMarchand1" class="marie" ><img src="assets/images/icones-vendeurs2/icones-menu/paiement.svg" ><br><br><br>Mode <br>de paiements</li>
                                    <li data-id="tbMarchand" class="marie" style="pointer-events:none;opacity:0.6;"><img src="assets/images/icones-vendeurs2/icones-menu/gestion.svg"><br><br>Tableau <br>de gestions</li>
                                    <li  data-id="historiqueCode" data-id="genererCode" class="marie" style="pointer-events:none;opacity:0.6;"><img src="assets/images/icones-vendeurs2/icones-menu/codepromo.svg"><br><br>Historique <br>de codes</li>
                                    <li  data-id="nouvellePromo" class="marie" style="pointer-events:none;opacity:0.6;"><img src="assets/images/icones-vendeurs2/icones-menu/promo.svg"><br><br>Créer <br>une promo</li>
                                    <li  data-id = "articleCorbeille" class="marie" style="pointer-events:none;opacity:0.6;"><img src="assets/images/icones-vendeurs2/icones-menu/corbeille.svg"><br><br><br>Corbeille</li>
                                    <li  data-id="gestMenu" class="marie" style="pointer-events:none;opacity:0.6;"><img src="assets/images/icones-vendeurs2/icones-menu/gestionmenubleu.svg"><br><br>Gestion <br>des menus</li>
                                </div>
                            @elseif (\Illuminate\Support\Facades\Auth::user()->role == 7) {{-- Gérant --}}
                            <div class="gerer-equipe-menu" id="gerer-equipe-menu">
                                <li data-id="infomarch" class="marie" style="margin-left:0px;"><img src="assets/images/icones-vendeurs2/icones-menu/info-marche.svg" style="color: #1A7EF5"><br><br>Info. du <br>marché</li>
                                <li  data-id="gererEquipe" class="marie" style="pointer-events:none;opacity:0.6;"><img src="assets/images/icones-vendeurs2/icones-menu/gestionequipe.svg"><br><br>Gestion d'équipe</li>
                                <li  class="marie"><img src="assets/images/icones-vendeurs2/icones-menu/gestionstock.svg"><br><br>Gestion <br>de  stocks</li>
                                <li data-id="msgMarchand"  class="marie"><img src="assets/images/icones-vendeurs2/icones-menu/messagerie.svg"><br><br><br>Messagerie</li>
                                <li data-id="commandedet" class="marie"><img src="assets/images/icones-vendeurs2/icones-menu/commande.svg"><br><br>Mes <br>commandes</li>
                                <li  data-id="modePaiementMarchand1" class="marie"><img src="assets/images/icones-vendeurs2/icones-menu/paiement.svg" ><br><br><br>Mode <br> de paiements</li>
                                <li data-id="tbMarchand" class="marie"><img src="assets/images/icones-vendeurs2/icones-menu/gestion.svg"><br><br>Tableau <br>de gestions</li>
                                <li  data-id="historiqueCode" data-id="genererCode" class="marie"><img src="assets/images/icones-vendeurs2/icones-menu/codepromo.svg"><br><br>Historique <br> de codes</li>
                                <li  data-id="nouvellePromo" class="marie"><img src="assets/images/icones-vendeurs2/icones-menu/promo.svg"><br><br>Créer <br>une promo</li>
                                <li  data-id = "articleCorbeille" class="marie"><img src="assets/images/icones-vendeurs2/icones-menu/corbeille.svg"><br><br><br>Corbeille</li>
                                <li  data-id="gestMenu" class="marie"><img src="assets/images/icones-vendeurs2/icones-menu/gestionmenubleu.svg"><br><br>Gestion <br>des menus</li>
                            </div>
                            @else
                                <div class="gerer-equipe-menu" id="gerer-equipe-menu">
                                    <li data-id="infomarch" class="marie" style="color: #1A7EF5;margin-left:0px;"><img src="assets/images/icones-vendeurs2/icones-menu/info-marche.svg"><br><br>Info. du<br> marché</li>
                                    <li  data-id="gererEquipe" class="marie" style="pointer-events:none;opacity:0.6;"><img src="assets/images/icones-vendeurs2/icones-menu/gestionequipe.svg"><br><br>Gestion d'équipe</li>
                                    <li  class="marie" style="pointer-events:none;opacity:0.6;"><img src="assets/images/icones-vendeurs2/icones-menu/gestionstock.svg"><br><br>Gestion <br>de stocks</li>
                                    <li data-id="msgMarchand"  class="marie" style="pointer-events:none;opacity:0.6;"><img src="assets/images/icones-vendeurs2/icones-menu/messagerie.svg"><br><br><br>Messagerie</li>
                                    <li data-id="commandedet" class="marie" style="pointer-events:none;opacity:0.6;"><img src="assets/images/icones-vendeurs2/icones-menu/commande.svg"><br><br>Mes <br> commandes</li>
                                    <li  data-id="modePaiementMarchand1" class="marie" style="pointer-events:none;opacity:0.6;"><img src="assets/images/icones-vendeurs2/icones-menu/paiement.svg" ><br><br><br>Mode de <br> paiements</li>
                                    <li data-id="tbMarchand" class="marie" style="pointer-events:none;opacity:0.6;"><img src="assets/images/icones-vendeurs2/icones-menu/gestion.svg"><br><br>Tableau <br> de gestions</li>
                                    <li  data-id="historiqueCode" data-id="genererCode" class="marie" style="pointer-events:none;opacity:0.6;"><img src="assets/images/icones-vendeurs2/icones-menu/codepromo.svg"><br><br>Historique<br> de codes</li>
                                    <li  data-id="nouvellePromo" class="marie" style="pointer-events:none;opacity:0.6;"><img src="assets/images/icones-vendeurs2/icones-menu/promo.svg"><br><br>Créer <br>une promo</li>
                                    <li  data-id = "articleCorbeille" class="marie" style="pointer-events:none;opacity:0.6;"><img src="assets/images/icones-vendeurs2/icones-menu/corbeille.svg"><br><br><br>Corbeille</li>
                                    <li  data-id="gestMenu" class="marie" style="pointer-events:none;opacity:0.6;"><img src="assets/images/icones-vendeurs2/icones-menu/gestionmenubleu.svg"><br><br>Gestion <br> des menus</li>
                                </div>
                            @endif
                            @endauth
                        </div>
                    </div>
                    <div style="border:1px solid #D8D8D8;border-top-left-radius:5px;border-top-right-radius:5px;width: 1199px;margin-right: 5px;margin-left:5px;margin-top: 1%; background-color: white;">
                            <h4 style="font-size: 20px;color: #191970; border: 1px; padding-top: 5px;margin-left: 10px; ">
                                Gestionnaire des menus
                            </h4>
                    </div>
                    <div style="background-color:#F8F8F8 ;width: 1199px;margin-left: 5px;margin-right:5px;border-left: 1px solid #D8D8D8;border-right: 1px solid#D8D8D8; height: 36px; ">
                        <p style="text-align: left;color: #191970; font-size: 12px; padding-top: 8px; padding-bottom: 5px; margin-left:30px;font-weight:500">Modifier l'ordre d'affichage des menus sur votre espace de vente</p>
                    </div>

                    <div style="border:1px solid#D8D8D8;width: 1199px;height:403px;margin-left:5px;margin-right: 5px;border-bottom-left-radius:5px; border-bottom-right-radius:5px;margin-bottom: 5px; background-color: white;">
                        <div class="container ">
                            <div clas=" row text-center " style="padding-top: 10px;padding-bottom: 10px; ">
                                <div class="container text-center " style="width:1065px; height:37px;border-radius: 6px;  border: 1px solid #9B9B9B;
                                border-radius: 6px;
                                background-color: #F8F8F8;padding:10px;">
                                    <p style="text-align: center;color: #4A4A4A;
                                    font-family: Roboto;
                                    font-size: 14px;
                                    letter-spacing: 0;
                                    line-height: 16px; "><img src="assets/images/icones-vendeurs2/infoB.svg"> Personnaliser votre espace de vente. Faite glisser et déposer le menu voulu et ainsi organiser votre espace de travail au mieux.</p>
                                </div>
                            </div>
                        </div>

                                    <div style="border:1px;border-radius:6px; padding:30px;margin-left: 67px;text-align: center;width:250px;height: 120px; background-color:#E6F8E8;   letter-spacing: 0;
                                    line-height: 20px;margin-right:1px; margin-top: 10px; ">
                                        <p style="text-align: center; color: #a4a4a4;;font-size: 18px;margin-top:10px; ">Menus actifs dans <br> votre espace de vente</p>
                                    </div>
                                    <br>
                                    <hr style="width: 245px; margin-left: 67px; margin-right: 10%; ">


                                    <div class="row " style="margin-left:412px;padding-top: 10px;margin-top:-185px; ">
                                        <div style="background-color: #F5F5F5;border-radius:5px;padding-top:11px;margin-left:15px;width:120px;height:120px ;text-align:center;width:120px;height:120px; ">
                                            <img src="assets/images/icones-vendeurs2/Group.svg "> <br>
                                            <p style="color:#1A7EF5; font-size:15px;margin-top:30px;margin-bottom:11px;  letter-spacing: 0;
                                            line-height: 18px;
                                           "> Info <br> du Marché</p>
                                        </div>
                                        <div style="background-color: #F5F5F5;border-radius:6px;padding-top:11px;margin-left:25px;width:120px;height:120px ;text-align:center;width:120px;height:120px">
                                            <img src="assets/images/icones-vendeurs2/people_community_filled_icon_200428.svg "> <br>
                                            <p style="color:#1A7EF5; font-size:15px;margin-top:30px;margin-bottom:11px;   letter-spacing: 0;
                                            line-height: 18px;
                                          "> Gestion<br> d'équipe</p>
                                        </div>
                                        <div  style="background-color: #F5F5F5;border-radius:6px;padding-top:11px;margin-left:25px;width:120px;height:120px ;text-align:center;width:120px;height:120px">
                                            <img src="assets/images/icones-vendeurs2/shipment_upload_icon_187506.svg "> <br>
                                            <p style="color:#1A7EF5; font-size:15px;margin-top:30px;margin-bottom:11px;   letter-spacing: 0;
                                            line-height: 18px;
                                          "> Gestion<br> de stock</p>
                                        </div>
                                        <div style="background-color: #F5F5F5;border-radius:6px;padding-top:11px;margin-left:25px;width:120px;height:120px ;text-align:center;width:120px;height:120px ">
                                            <img src="assets/images/icones-vendeurs2/chat_icon-icons.com_67748.svg "> <br>
                                            <p style="color:#1A7EF5; font-size:15px;margin-top:50px;margin-bottom:11px;   letter-spacing: 0;
                                            line-height: 18px;
                                          "> Messagerie</p>
                                        </div>
                                        <div style="background-color: #F5F5F5;border-radius:6px;padding-top:11px;margin-left:25px;width:120px;height:120px ;text-align:center;width:120px;height:120px ">
                                            <img src="assets/images/icones-vendeurs2/Market.svg"> <br>
                                            <p style="color:#1A7EF5; font-size:15px;margin-top:33px;margin-bottom:11px;   letter-spacing: 0;
                                            line-height: 18px;
                                          "> Mes<br> commandes</p>
                                        </div>
                                    </div>
                                    <hr style="width: 700px; margin-left:426px;margin-top:37px;">
                        <br>
                                    <div  style="border:1px;  background-color: #FAE5E8
                                    ;border-radius:6px; padding:30px;text-align: center;width:250px;height: 120px;margin-left: 67px ; ">
                                        <p style="text-align: center;color: #a4a4a4;; font-size: 18px;  letter-spacing: 0;
                                        line-height: 20px;margin-top:20px; ">Menus inactifs dans <br>votre espace de vente</p>
                                    </div>


                                    <div class="row " style="margin-left:410px; margin-top:-120px;">
                                        <div  style="background-color: #F5F5F5;border-radius:6px;padding-top:11px;margin-left:15px;width:120px;height:120px ;text-align:center;width:120px;height:120px ">
                                            <img src="assets/images/icones-vendeurs2/Carte_Crédit.svg "> <br>
                                            <p style="color:#9B9B9B; font-size:15px;margin-top:30px;margin-bottom:11px;  letter-spacing: 0;
                                            line-height: 18px;
                                           "> Mode de <br> paiement</p>
                                        </div>
                                        <div  style="background-color: #F5F5F5;border-radius:6px;padding-top:11px;margin-left:25px;width:120px;height:120px ;text-align:center;width:120px;height:120px ">
                                            <img src="assets/images/icones-vendeurs2/Strategy2.svg "> <br>
                                            <p style="color:#9B9B9B; font-size:15px;margin-top:30px;margin-bottom:11px;   letter-spacing: 0;
                                            line-height: 18px;
                                          "> Tableau<br> de gestions</p>
                                        </div>
                                        <div  style="background-color: #F5F5F5;border-radius:6px;padding-top:11px;margin-left:25px;width:120px;height:120px ;text-align:center;width:120px;height:120px ">
                                            <img src="assets/images/icones-vendeurs2/coupon, discount, price, sale.svg "> <br>
                                            <p style="color:#9B9B9B;font-size:15px;margin-top:30px;margin-bottom:11px;  letter-spacing: 0;
                                            line-height: 18px;
                                          "> Historique <br>de codes</p>
                                        </div>
                                        <div style="background-color: #F5F5F5;border-radius:6px;padding-top:11px;margin-left:25px;width:120px;height:120px ;text-align:center;width:120px;height:120px ">
                                            <img src="assets/images/icones-vendeurs2/discount, sale, offer, promotion2.svg " > <br>
                                            <p style="color:#9B9B9B;font-size:15px;margin-bottom:11px;margin-top:30px; letter-spacing: 0;
                                            line-height: 18px;"> Créer<br> une promo</p>
                                        </div>
                                        <div  style="background-color: #F5F5F5;border-radius:6px;padding-top:11px;margin-left:25px;width:120px;height:120px ;text-align:center;">
                                            <img src="assets/images/icones-vendeurs2/corbeille.svg "> <br>
                                            <p style="color:#9B9B9B;font-size:15px;margin-top:50px;margin-bottom:11px; letter-spacing: 0;
                                            line-height: 18px;"> Corbeille</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <br>





                </div>
            </div>
        </div>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js " integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM " crossorigin="anonymous "></script>

        <script type="text/javascript ">
        </script>
</body>

</html>
