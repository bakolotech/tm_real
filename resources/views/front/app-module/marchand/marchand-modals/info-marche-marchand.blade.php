

    <style>
        @import url('https://fonts.googleapis.com/css2?family=Roboto&display=swap');
        .modal-content-info-march,
        .modal-body-info-march {
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

        .modal-dialog-info-march {
            position: relative;
            height: 579px;
            left: -350px;
            top: 60px;
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
        <div class="modal modal-marchand-close" id="infomarch">
            <div class="modal-dialog modal-dialog-info-march">
                <div class="modal-content modal-content-info-march">
                    <div style="margin-top:5px;">
                        @include('front.app-module.marchand.marchand-modals.marchand-profil-data')
                        <div style="border:1px solid #D8D8D8;border-radius: 5px;margin-top:-80px;position: absolute;margin-left: 334px; width:873px;height: 80px;background-color: white; display: flex; flex-direction: column; justify-content: center; align-items: center">
                            @auth

                        @if (\Illuminate\Support\Facades\Auth::user()->role == 2)


                            <div class="historique-code" id="gerer-equipe-menu">
                                <li  data-id="infomarch"class="marie" style="margin-left:0px;color: #1A7EF5;border:1px solid #1A7EF5;background-color:#F8F8F8"><img src="assets/images/icones-vendeurs2/icones-menu/info-marchebleu.svg"><br><br><p style="margin-top:3px ;">Info. du <br> marché</p></li>
                                <li  data-id="gererEquipe" class="marie" ><img src="assets/images/icones-vendeurs2/icones-menu/gestionequipe.svg"><br><br><p style="margin-top:2px">Gestion d'équipe</p></li>
                                <li  class="marie"><img src="assets/images/icones-vendeurs2/icones-menu/gestionstock.svg"><br><br><p style="margin-top:2px">Gestion <br>de  stocks</p></li>
                                <li data-id="msgMarchand" class="marie"><img src="assets/images/icones-vendeurs2/icones-menu/messagerie.svg"><br><br><br><p style="margin-top:2px">Messagerie</p></li>
                                <li data-id="commandedet" class="marie"><img src="assets/images/icones-vendeurs2/icones-menu/commande.svg"><br><br><p style="margin-top:3px">Mes <br>commandes</p></li>
                                <li  data-id="modePaiementMarchand1" style="margin-bottom" class="marie"><img src="assets/images/icones-vendeurs2/icones-menu/paiement.svg" ><br><p style="margin-top:15px;">Mode de <br> paiements<p></li>
                                <li  data-id="tbMarchand" class="marie"><img src="assets/images/icones-vendeurs2/icones-menu/gestion.svg"><br><br><p style="margin-top:2px">Tableau <br>de gestions</p></li>
                                <li  data-id="historiqueCode" data-id="genererCode" class="marie" ><img src="assets/images/icones-vendeurs2/icones-menu/codepromo.svg"><br><br><p style="margin-top:2px">Historique <br>de codes</p></li>
                                <li  data-id="nouvellePromo" class="marie"><img src="assets/images/icones-vendeurs2/icones-menu/promo.svg"><br><br><p style="margin-top:2px">Créer<br>une promo</p></li>
                                <li  data-id = "articleCorbeille" class="marie"><img src="assets/images/icones-vendeurs2/icones-menu/corbeille.svg"><br><br><br><p style="margin-top:2px">Corbeille</p></li>
                                <li  data-id="gestMenu" class="marie"><img src="assets/images/icones-vendeurs2/icones-menu/gestionmenu.svg"><br><br><p style="margin-top:2px">Gestion <br>des menus</p></li>

                            </div>
                        @elseif (\Illuminate\Support\Facades\Auth::user()->role == 4) {{-- Editeur --}}
                            <div class="historique-code" id="gerer-equipe-menu">
                                <li  class="marie" style="margin-left:0px;color: #1A7EF5;border:1px solid #1A7EF5;background-color:#F8F8F8"><img src="assets/images/icones-vendeurs2/icones-menu/info-marchebleu.svg"><br><br>Info. du <br> marché</li>
                                <li  data-id="gererEquipe" class="marie" style="pointer-events:none;opacity:0.6;"><img src="assets/images/icones-vendeurs2/icones-menu/gestionequipe.svg"><br><br>Gestion d'équipe</li>
                                <li  class="marie" style="pointer-events:none;opacity:0.6;"><img src="assets/images/icones-vendeurs2/icones-menu/gestionstock.svg"><br><br>Gestion <br>de stocks</li>
                                <li data-id="msgMarchand"  class="marie" style="pointer-events:none;opacity:0.6;"><img src="assets/images/icones-vendeurs2/icones-menu/messagerie.svg"><br><br><br>Messagerie</li>
                                <li  class="marie"><img src="assets/images/icones-vendeurs2/icones-menu/commande.svg"><br><br>Mes<br> commandes</li>
                                <li  data-id="modePaiementMarchand" class="marie" style="pointer-events:none;opacity:0.6;"><img src="assets/images/icones-vendeurs2/icones-menu/paiement.svg" ><br><br><br>Mode de <br>paiements</li>
                                <li data-id="tbMarchand" class="marie" style="color: #1A7EF5"><img src="assets/images/icones-vendeurs2/icones-menu/gestion.svg"><br><br>Tableau <br>de gestions</li>
                                <li  data-id="historiqueCode" data-id="genererCode" class="marie" style="pointer-events:none;opacity:0.6;"><img src="assets/images/icones-vendeurs2/icones-menu/codepromo.svg"><br><br>Historique <br>de codes</li>
                                <li  data-id="nouvellePromo" class="marie"><img src="assets/images/icones-vendeurs2/icones-menu/promo.svg"><br><br>Créer <br> une promo</li>
                                <li  data-id = "articleCorbeille" class="marie"><img src="assets/images/icones-vendeurs2/icones-menu/corbeille.svg"><br><br><br>Corbeille</li>
                                <li  data-id="gestMenu" class="marie"><img src="assets/images/icones-vendeurs2/icones-menu/gestionmenu.svg" style="pointer-events:none;opacity:0.6;"><br><br>Gestion <br>des menus</li>
                            </div>
                        @elseif (\Illuminate\Support\Facades\Auth::user()->role == 5) {{-- Demarcheur --}}
                            <div class="gerer-equipe-menu" id="gerer-equipe-menu">
                                <li  class="marie"style="margin-left:0px;"><img src="assets/images/icones-vendeurs2/icones-menu/info-marchebleu.svg"><br><br>Info.du <br> marché</li>
                                <li  data-id="gererEquipe" class="marie" style="pointer-events:none;opacity:0.6;"><img src="assets/images/icones-vendeurs2/icones-menu/gestionequipe.svg"><br><br>Gestion d'équipe</li>
                                <li  class="marie" style="pointer-events:none;opacity:0.6;"><img src="assets/images/icones-vendeurs2/icones-menu/gestionstock.svg"><br><br>Gestion <br>de stocks</li>
                                <li data-id="msgMarchand"  class="marie" style="color: #1A7EF5"><img src="assets/images/icones-vendeurs2/icones-menu/messagerie.svg"><br><br><br>Messagerie</li>
                                <li data-id="commandedet" class="marie" style="pointer-events:none;opacity:0.6;"><img src="assets/images/icones-vendeurs2/icones-menu/commande.svg"><br><br>Mes <br>commandes</li>
                                <li  data-id="modePaiementMarchand1" class="marie" style="pointer-events:none;opacity:0.6;"><img src="assets/images/icones-vendeurs2/icones-menu/paiement.svg" ><br><br><br>Mode de <br>paiements</li>
                                <li data-id="tbMarchand" class="marie" style="pointer-events:none;opacity:0.6;"><img src="assets/images/icones-vendeurs2/icones-menu/gestion.svg"><br><br>Tableau <br>de gestions</li>
                                <li  data-id="historiqueCode" data-id="genererCode" class="marie"><img src="assets/images/icones-vendeurs2/icones-menu/codepromobleu.svg"><br><br>Historique <br>de codes</li>
                                <li  data-id="nouvellePromo" class="marie" style="pointer-events:none;opacity:0.6;"><img src="assets/images/icones-vendeurs2/icones-menu/promo.svg"><br><br>Créer <br>une promo</li>
                                <li  data-id = "articleCorbeille" class="marie" style="pointer-events:none;opacity:0.6;"><img src="assets/images/icones-vendeurs2/icones-menu/corbeille.svg"><br><br><br>Corbeille</li>
                                <li  data-id="gestMenu" class="marie" style="pointer-events:none;opacity:0.6;"><img src="assets/images/icones-vendeurs2/icones-menu/gestionmenu.svg"><br><br>Gestion <br>des menus</li>
                            </div>
                        @elseif (\Illuminate\Support\Facades\Auth::user()->role == 6) {{-- Membre --}}
                            <div class="gerer-equipe-menu" id="gerer-equipe-menu">
                                <li  class="marie" style="color: #1A7EF5;margin-left:0px;"><img src="assets/images/icones-vendeurs2/icones-menu/info-marche.svg"><br><br>Info.<br> du marché</li>
                                <li  data-id="gererEquipe" class="marie" style="pointer-events:none;opacity:0.6;"><img src="assets/images/icones-vendeurs2/icones-menu/gestionequipe.svg"><br><br>Gestion d'équipe</li>
                                <li  class="marie" style="pointer-events:none;opacity:0.6;"><img src="assets/images/icones-vendeurs2/icones-menu/gestionstock.svg"><br><br>Gestion <br>de stocks</li>
                                <li data-id="msgMarchand"  class="marie" style="pointer-events:none;opacity:0.6;"><img src="assets/images/icones-vendeurs2/icones-menu/messagerie.svg"><br><br><br>Messagerie</li>
                                <li data-id="commandedet" class="marie" style="pointer-events:none;opacity:0.6;"><img src="assets/images/icones-vendeurs2/icones-menu/commande.svg"><br><br>Mes<br> commandes</li>
                                <li  data-id="modePaiementMarchand1" class="marie" ><img src="assets/images/icones-vendeurs2/icones-menu/paiement.svg" ><br><br><br>Mode <br>de paiements</li>
                                <li data-id="tbMarchand" class="marie" style="pointer-events:none;opacity:0.6;"><img src="assets/images/icones-vendeurs2/icones-menu/gestion.svg"><br><br>Tableau <br>de gestions</li>
                                <li  data-id="historiqueCode" data-id="genererCode" class="marie" style="pointer-events:none;opacity:0.6;"><img src="assets/images/icones-vendeurs2/icones-menu/codepromobleu.svg"><br><br>Historique <br>de codes</li>
                                <li  data-id="nouvellePromo" class="marie" style="pointer-events:none;opacity:0.6;"><img src="assets/images/icones-vendeurs2/icones-menu/promo.svg"><br><br>Créer <br>une promo</li>
                                <li  data-id = "articleCorbeille" class="marie" style="pointer-events:none;opacity:0.6;"><img src="assets/images/icones-vendeurs2/icones-menu/corbeille.svg"><br><br><br>Corbeille</li>
                                <li  data-id="gestMenu" class="marie" style="pointer-events:none;opacity:0.6;"><img src="assets/images/icones-vendeurs2/icones-menu/gestionmenu.svg"><br><br>Gestion <br>des menus</li>
                            </div>
                        @elseif (\Illuminate\Support\Facades\Auth::user()->role == 7) {{-- Gérant --}}
                        <div class="gerer-equipe-menu" id="gerer-equipe-menu">
                            <li  class="marie" style="margin-left:0px;color: #1A7EF5;border:1px solid #1A7EF5;background-color:#F8F8F8"><img src="assets/images/icones-vendeurs2/icones-menu/info-marchebleu.svg" style="color: #1A7EF5"><br><br>Info. du <br>marché</li>
                            <li  data-id="gererEquipe" class="marie" style="pointer-events:none;opacity:0.6;"><img src="assets/images/icones-vendeurs2/icones-menu/gestionequipe.svg"><br><br>Gestion d'équipe</li>
                            <li  class="marie"><img src="assets/images/icones-vendeurs2/icones-menu/gestionstock.svg"><br><br>Gestion <br>de  stocks</li>
                            <li data-id="msgMarchand"  class="marie"><img src="assets/images/icones-vendeurs2/icones-menu/messagerie.svg"><br><br><br>Messagerie</li>
                            <li data-id="commandedet" class="marie"><img src="assets/images/icones-vendeurs2/icones-menu/commande.svg"><br><br>Mes <br>commandes</li>
                            <li  data-id="modePaiementMarchand1" class="marie"><img src="assets/images/icones-vendeurs2/icones-menu/paiement.svg" ><br><br><br>Mode <br> de paiements</li>
                            <li data-id="tbMarchand"  class="marie"><img src="assets/images/icones-vendeurs2/icones-menu/gestion.svg"><br><br>Tableau <br>de gestions</li>
                            <li  data-id="historiqueCode" data-id="genererCode" ><img src="assets/images/icones-vendeurs2/icones-menu/codepromo.svg"><br><br>Historique <br> de codes</li>
                            <li  data-id="nouvellePromo" class="marie"><img src="assets/images/icones-vendeurs2/icones-menu/promo.svg"><br><br>Créer <br>une promo</li>
                            <li  data-id = "articleCorbeille" class="marie"><img src="assets/images/icones-vendeurs2/icones-menu/corbeille.svg"><br><br><br>Corbeille</li>
                            <li  data-id="gestMenu" class="marie"><img src="assets/images/icones-vendeurs2/icones-menu/gestionmenu.svg"><br><br>Gestion <br>des menus</li>
                        </div>
                        @else
                            <div class="gerer-equipe-menu" id="gerer-equipe-menu">
                                <li  class="marie" style="color: #1A7EF5;border:1px solid #1A7EF5;background-color:#F8F8F8;margin-left:0px;"><img src="assets/images/icones-vendeurs2/icones-menu/info-marchebleu.svg"><br><br>Info. du<br> marché</li>
                                <li  data-id="gererEquipe" class="marie" style="pointer-events:none;opacity:0.6;"><img src="assets/images/icones-vendeurs2/icones-menu/gestionequipe.svg"><br><br>Gestion d'équipe</li>
                                <li  class="marie" style="pointer-events:none;opacity:0.6;"><img src="assets/images/icones-vendeurs2/icones-menu/gestionstock.svg"><br><br>Gestion <br>de stocks</li>
                                <li data-id="msgMarchand"  class="marie" style="pointer-events:none;opacity:0.6;"><img src="assets/images/icones-vendeurs2/icones-menu/messagerie.svg"><br><br><br>Messagerie</li>
                                <li data-id="commandedet" class="marie" style="pointer-events:none;opacity:0.6;"><img src="assets/images/icones-vendeurs2/icones-menu/commande.svg"><br><br>Mes <br> commandes</li>
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
                    <div style=" box-sizing: border-box;
                    height: 39px;
                    width: 1202px;
                    border: 1px solid #D8D8D8;
                    border-radius: 6px 6px 0 0;
                    background-color: #FFFFFF;margin-top:10px;margin-left:5px;padding:10px;">
                        <p style=" color: #191970;
                        font-family: Roboto;
                        font-size: 18px;
                        font-weight: 500;
                        letter-spacing: 0;
                        line-height: 19px;">Utilisateur : @NomDuCompte</p>

                </div>
                <div style=" height: 36px;
                width: 1202px;
                border-left: 1px solid #D8D8D8;
                border-right: 1px solid #D8D8D8;
                background-color: #F8F8F8;padding:10px;margin-left:5px;"><p style="   color: #191970;
  font-family: Roboto;
  font-size: 11px;
  letter-spacing: 0;

  line-height: 13px;margin-left:20px;">Vous êtes la seule personne à pouvoir consulter et modifier cette partie</p></div>
                    <div style=" box-sizing: border-box;
                    height: 405px;
                    width: 1202px;
                    border: 1px solid #D8D8D8;
                    border-radius: 0 0 6px 6px;
                    margin-left:5px;padding:0px; background-color:#FFFFFF;">


                    {{-- SECTION LEFT MENU --}}
                    <section style="width: 297px;height:403px;border-right:1px solid #D8D8D8;padding:0px;padding-top:15px;">
                        <aside style="  box-sizing: border-box;
                        height: 37px;
                        width: 268px;
                        border: 1px solid #1A7EF5;
                        border-radius: 6px;margin-left:14px;cursor: pointer;
                      " id="leftparm1"><a onclick="paramleft()"><p style=" color: #191970;
                    font-family: Roboto;
                    font-size: 15px;
                    font-weight: 500;
                    letter-spacing: 0;
                    line-height: 15px;
                    text-align: center;margin-top:11px;"  >Paramètres</p></a></aside>

                    <aside style="  box-sizing: border-box;
                    height: 37px;
                    width: 268px;
                    border: 1px solid #D8D8D8;margin-top:5px;
                    border-radius: 6px;margin-left:14px;cursor: pointer;
                    "id="leftparm2"><a onclick="notifleft()"><p style=" color: #191970;
                    font-family: Roboto;
                    font-size: 15px;
                    font-weight: 500;
                    letter-spacing: 0;
                    line-height: 15px;
                    text-align: center;margin-top:10px;"  >Notifications

                    </p></a></aside>


                    <aside style="  box-sizing: border-box;
                    height: 37px;
                    width: 268px;
                    border: 1px solid #D8D8D8;margin-top:5px;
                    border-radius: 6px;margin-left:14px;cursor:pointer;
                    "id="leftparm3"><a onclick="boutikleft()"><p style=" color: #191970;
                    font-family: Roboto;
                    font-size: 15px;
                    font-weight: 500;
                    letter-spacing: 0;
                    line-height: 15px;
                    text-align: center;margin-top:11px;"  >commande</p></a></aside>
                    </section>


                         {{-- SECTION RIGHT  --}}
                         {{-- Section number1 --}}
                    <section style="width:903px;height:403px;margin-top:-403px;margin-left:298px;padding:15px;" id="rightparm1">

                        {{-- article left --}}
                        <article style="width:435px;height:380px;border:transparent;">
                             <aside style="  height: 37px;
                             width: 432px;
                             border: 1px solid #D8D8D8;
                             border-radius: 6px;
                             background-color: #FFFFFF;"id="as1">
                             <p style="  color: #191970;
                             font-family: Roboto;
                             font-size: 15px;
                             font-weight: 500;
                             letter-spacing: -0.36px;
                             line-height: 13px;margin-top:12px;margin-left:15px;
                           ">NOM D’UTILISATEUR</p><a onclick="ouvrecontenu1()"> <img src="assets/images/icones-vendeurs2/Plus3.svg" style="float:right;margin-right:15px;margin-top:-35px;" id="leftplus1"></a><a onclick="fermecontenu1()"><img src="assets/images/icones-vendeurs2/Minus3.svg" style="float:right;margin-right:15px;margin-top:-35px;display:none;" id="leftmoins1"></a>
                             </aside>
                             {{-- contenu caché 1 --}}
                             <aside style=" box-sizing: border-box;
                             height: 252px;
                             width: 432px;
                             border-left:1px solid #D8D8D8;
                             border-right:1px solid #D8D8D8;
                             border-bottom:1px solid #D8D8D8;
                             border-radius: 0 0 6px 6px;padding:15px;
                             background-color: #FFFFFF;display:none;"id="cache1">
                             <input type="text" style=" box-sizing: border-box;
                             height: 41px;
                             width: 402px;
                             border: 1px solid #9B9B9B;
                             border-radius: 6px;
                             background-color: #F8F8F8; color: #9B9B9B;padding:10px;
                            font-family: Roboto;
                            font-size: 15px;
                            letter-spacing: -0.36px;
                            line-height: 13px;" placeholder="Nom d'utilisateur" onclick="butchange1()">
                            <p style="color: #191970;
                            font-family: Roboto;
                            font-size: 12px;
                            font-weight: 300;
                            letter-spacing: 0;
                            line-height: 14px;margin-top:10px;text-align:justify">Les noms d’utilisateur ne font pas partie de votre profil et ne sont requis par TOULÈ Market que pour des raisons de supports techniques. Votre nom d’utilisateur est le plus invisible aux autres utilisateurs, mais vous pouvez changer cela si vous le souhaitez.<br><br>

                            Les noms d'utilisateurs doivent être en minuscules et ne peuvent excéder 21 caractères. Ils ne peuvent comporter que des lettres, des chiffres, des points, des traits d'union et des traits de soulignement.</p>

                            <button style="  height: 37px;
                            width: 194px;
                            border-radius: 6px;
                            background-color: #9B9B9B;  color: #FFFFFF;
                            font-family: Roboto;
                            font-size: 16px;
                            font-weight: 500;
                            letter-spacing: 0.35px;
                            line-height: 18px;
                            text-align: center;margin-top:5px;margin-left:104px;border:1px solid #9B9B9B"id="but1">Modifier</button>
                             </aside>


                             <aside style="  height: 37px;
                             width: 432px;
                             border: 1px solid #D8D8D8;
                             border-radius: 6px;
                             background-color: #FFFFFF;margin-top:11px;"id="as2">
                             <p style="  color: #191970;
                             font-family: Roboto;
                             font-size: 15px;
                             font-weight: 500;
                             letter-spacing: -0.36px;
                             line-height: 13px;margin-top:12px;margin-left:15px;
                           ">DÉCONNEXION DE TOUTES LES AUTRES SESSIONS</p> <a onclick="ouvrecontenu2()"> <img src="assets/images/icones-vendeurs2/Plus3.svg" style="float:right;margin-right:15px;margin-top:-35px;" id="leftplus2"></a><a onclick="fermecontenu2()"><img src="assets/images/icones-vendeurs2/Minus3.svg" style="float:right;margin-right:15px;margin-top:-35px;display:none;" id="leftmoins2"></a>
                             </aside>
                             {{-- contenu caché 2 --}}
                             <aside style="   box-sizing: border-box;
                             height: 149px;
                             width: 432px;
                             border-left: 1px solid #D8D8D8;
                             border-right: 1px solid #D8D8D8;
                             border-bottom: 1px solid #D8D8D8;
                             border-radius: 0 0 6px 6px;padding:15px;
                             background-color: #FFFF;display:none;"id="cache2">
                             <p style=" color: #191970;
                             font-family: Roboto;
                             font-size: 12px;
                             font-weight: 300;
                             letter-spacing: 0;
                             line-height: 14px;margin-top:0px;text-align:justify">Vous avez égaré votre téléphone ? Vous avez utilisé un ordinateur public et vous y êtes toujours connecté(e) ? Vous voulez vous déconnecter de toutes vos sessions sauf celle sur ce navigateur ? Cette fonction est faite pour vous.</p>
                             <button style="  height: 37px;
                             width: 194px;
                             border-radius: 6px;
                             background-color: #D0021B;  color: #FFFFFF;
                            font-family: Roboto;
                            font-size: 16px;
                            font-weight: 500;
                            letter-spacing: 0.35px;
                            line-height: 18px;
                            text-align: center;margin-top:8.5px;margin-left:104px;border:1px solid #9B9B9B;">Déconnexion</button></aside>
                        </article>

                        {{-- Article right --}}
                        <article style="width:435px;height:380px;margin-top:-380px;margin-left:438px; border:transparent;">


                            <aside style="  height: 37px;
                            width: 432px;
                            border: 1px solid #D8D8D8;
                            border-radius: 6px;
                            background-color: #FFFFFF;" id="as3">
                            <p style="  color: #191970;
                            font-family: Roboto;
                            font-size: 15px;
                            font-weight: 500;
                            letter-spacing: -0.36px;
                            line-height: 13px;margin-top:12px;margin-left:15px;
                          ">NOM D’AFFICHAGE</p><a onclick="ouvrecontenu3()"> <img src="assets/images/icones-vendeurs2/Plus3.svg" style="margin-left:385px;;margin-top:-35px;margin-right:15px" id="leftplus3"></a><a onclick="fermecontenu3()"><img src="assets/images/icones-vendeurs2/Minus3.svg" style="margin-left:385px;margin-right:15px;margin-top:-35px;display:none;position: relative;" id="leftmoins3"></a>
                            </aside>
                           {{-- contenu caché 3 --}}
                           <aside style=" box-sizing: border-box;
                           height: 174px;
                            width: 432px;
                            border-left: 1px solid #D8D8D8;
                             border-right: 1px solid #D8D8D8;
                             border-bottom: 1px solid #D8D8D8;
                            border-radius: 0 0 6px 6px;padding:15px;
                            background-color: #FFFFFF;display:none;"id="cache3">
                            <input type="text" style=" box-sizing: border-box;
                            height: 41px;
                            width: 402px;
                            border: 1px solid #9B9B9B;
                            border-radius: 6px;
                            background-color: #F8F8F8;padding:10px;margin-top:-5px;" placeholder="Nom d'affichage" onclick="butchange2()">
                            <p style="margin-top:10px;color: #191970;
                            font-family: Roboto;
                            font-size: 12px;
                            font-weight: 300;
                            letter-spacing: 0;
                            line-height: 14px;margin-top:10px;text-align:justify">Cela peut être votre prénom ou un surnom… ce que vous souhaitez qu'on voit dans votre espace TOULÈ Market.</p>
                            <button style="  height: 37px;
                            width: 194px;
                            border-radius: 6px;
                            background-color: #9B9B9B;  color: #FFFFFF;
                            font-family: Roboto;
                            font-size: 16px;
                            font-weight: 500;
                            letter-spacing: 0.35px;
                            line-height: 18px;
                            text-align: center;margin-top:17px;margin-left:104px;border:1px solid #9B9B9B"id="but2">Modifier</button>

                            </aside>

                            <aside style="  height: 37px;
                            width: 432px;
                            border: 1px solid #D8D8D8;
                            border-radius: 6px;
                            background-color: #FFFFFF;margin-top:10px;"id="as4">
                            <p style="  color: #191970;
                            font-family: Roboto;
                            font-size: 15px;
                            font-weight: 500;
                            letter-spacing: -0.36px;
                            line-height: 14px;margin-top:10px;text-align:justify;margin-top:12px;margin-left:15px;
                          ">SUPPRIMER MON COMPTE MARCHAND</p> <a onclick="ouvrecontenu4()"> <img src="assets/images/icones-vendeurs2/Plus3.svg" style="margin-left:385px;margin-top:-35px;" id="leftplus4"></a><a onclick="fermecontenu4()"><img src="assets/images/icones-vendeurs2/Minus3.svg" style="margin-left:385px;margin-right:15px;margin-top:-35px;display:none;position: relative;" id="leftmoins4"></a>
                            </aside>
                            {{-- contenu caché 4 --}}
                            <aside style=" box-sizing: border-box;
                              height: 162px;
                                width: 432px;
                                border-left: 1px solid #D8D8D8;
                                border-right: 1px solid #D8D8D8;
                                border-bottom: 1px solid #D8D8D8;
                                border-radius: 0 0 6px 6px;
                                background-color: #FFFFFF;display:none;padding:15px;"id="cache4">
                                <p style="  color: #191970;
                                font-family: Roboto;
                                font-size: 12px;
                                font-weight: 300;
                                letter-spacing: 0;
                                line-height: 14px;text-align:justify">Vous êtes le propriétaire de @NomDuStore, vous ne pouvez donc pas désactiver votre compte.<br><br>

                                    Vous pouvez <a onclick="ChangerPropioMarchand({{\Illuminate\Support\Facades\Auth::id()}})"><u>transférer la propriété </u></a>à un autre membre ou supprimer mon compte marchand pour pouvoir rendre cette option disponible.</p>

                                    <button style="  height: 37px;
                                    width: 194px;
                                    border-radius: 6px;
                                    background-color: #9B9B9B;  color: #FFFFFF;
                                    font-family: Roboto;
                                    font-size: 16px;
                                    font-weight: 500;
                                    letter-spacing: 0.35px;
                                    line-height: 18px;
                                    text-align: center;margin-top:5px;margin-left:104px;border:1px solid #9B9B9B">Supprimer</button>

                                </aside>
                        </article>
                    </section>

                    {{-- Section number 2 --}}
                    <section style="width:903px;height:403px;margin-top:-403px;margin-left:298px;padding:0px;display:none;" id="rightparm2">
                        <aside style="height:64px;border-bottom:1px solid #D8D8D8;width:900px;padding:15px;">
                            <p style=" color: #191970;
                            font-family: Roboto;
                            font-size: 15px;
                            font-weight: 500;
                            letter-spacing: -0.36px;
                            line-height: 13px;margin-top:3px;">PRÉFÉRENCES DES E-MAILS
                            </p>
                            <p style=" color: #191970;
                            font-family: Roboto;
                            font-size: 15px;
                            font-weight: 300;
                            letter-spacing: 0;
                            line-height: 16px;margin-left:15px;margin-top:-10px;">Sélectionnez les types de mails que vous souhaitez recevoir.</p>

                        </aside>
                        <aside style="  box-sizing: border-box;
                        height: 60px!important;
                        width: 901px;
                        border-bottom: 1px solid #D8D8D8;
                        background-color: #F8F8F8;padding-left:30px;padding-top:10px;">
                        <input type="checkbox" class="form-check-input" id="notif" name="notif"checked style="margin-top:10px;margin-left:0px;border-radius:3px;">
                        <div style="margin-left:30px;margin-top:-20px;">

                       <label for="notif" style="color: #191970;
                       font-family: Roboto;
                       font-size: 14px;
                       font-weight: 500;
                       letter-spacing: 0;
                       line-height: 14px;margin-top:0px;">Notification générale des mails</label>
                        <label for="notif" style=";margin-top:-5px;color: #4A4A4A;
                        font-family: Roboto;
                        font-size: 11px;
                        letter-spacing: 0;
                        line-height: 11px;
                      " >Des mails sont déclenchés par vos activités sur la plateforme, cela comprend les mises à jour de vos comptes, communications, commandes, expéditions, etc.</label></div>



                        </aside>
                         <aside style="  box-sizing: border-box;
                         height: 60px!important;
                         width: 901px;
                         border-bottom: 1px solid #D8D8D8;
                         background-color: #F8F8F8;padding-left:30px;padding-top:10px;">

                         <input type="checkbox" class="form-check-input" id="notifG" name="notifG"checked style="margin-top:12px;margin-left:0px;;border-radius:3px;">
                         <div style="margin-left:30px;margin-top:-24px;">
                        <label for="notifG" style="color: #191970;
                        font-family: Roboto;
                        font-size: 14px;
                        font-weight: 500;
                        letter-spacing: 0;
                        line-height: 14px;margin-top:0px;">Mises à jour sur les litiges</label>
                         <label for="notifG" style=";margin-top:-5px;color: #4A4A4A;
                         font-family: Roboto;
                         font-size: 11px;
                         letter-spacing: 0;
                         line-height: 11px;
                       " >En cas de litige auquel vous êtes partie (qu'il soit initié par vous ou non), nous vous en informerons et vous tiendrons au courant de son évolution.</label></div>

                         </aside>


                         <aside style="height:84px;border-bottom:1px solid #D8D8D8;width:900px;padding:15px;">
                            <p style=" color: #191970;
                            font-family: Roboto;
                            font-size: 15px;
                            font-weight: 500;
                            letter-spacing: -0.36px;
                            line-height: 13px;margin-top:15px;">PRÉFÉRENCES DES E-MAILS MARKETING
                            </p>
                            <p style=" color: #191970;
                            font-family: Roboto;
                            font-size: 15px;
                            font-weight: 300;
                            letter-spacing: 0;
                            line-height: 16px;margin-left:15px;margin-top:-10px;">E-mails contenant des messages promotionnels sur les produits et services de TOULÈ Market</p>

                        </aside>

                        <aside style="  box-sizing: border-box;
                        height: 71px!important;
                        width: 901px;
                        border-bottom: 1px solid #D8D8D8;
                        background-color: #F8F8F8;padding-left:30px;padding-top:10px;">
                        <input type="checkbox" class="form-check-input" id="notifH" name="notifH"checked style="margin-top:20px;margin-left:0px;border-radius:3px;">
                        <div style="margin-left:30px;margin-top:-28px;">
                       <label for="notifH" style="color: #191970;
                       font-family: Roboto;
                       font-size: 14px;
                       font-weight: 500;
                       letter-spacing: 0;
                       line-height: 14px;margin-top:0px;">Notification générale marketing</label>
                        <label for="notifH" style=";margin-top:-5px;color: #4A4A4A;
                        font-family: Roboto;
                        font-size: 11px;
                        letter-spacing: 0;
                        line-height: 14px;
                      " >Des e-mails destinés à vous informer des offres, des événements et des mises à jour des services, y compris les remises sur les produits, les offres spéciales,<br>
                    les événements et les offres de services qui peuvent être bénéfiques pour votre entreprise.</label></div>



                        </aside>
                         <aside style="  box-sizing: border-box;
                         height: 60px!important;
                         width: 901px;
                         border-bottom:1px solid #D8D8D8;
                         background-color: #F8F8F8;padding-left:30px;padding-top:10px;">

                         <input type="checkbox"class="form-check-input" id="notifF" name="notifF"checked style="margin-top:13px;border-radius:3px;margin-left:0px;">

                         <div style="margin-left:30px;margin-top:-22px;">
                        <label for="notifF" style="color: #191970;
                        font-family: Roboto;
                        font-size: 14px;
                        font-weight: 500;
                        letter-spacing: 0;
                        line-height: 14px;margin-top:0px;">Enquêtes</label><br>
                         <label for="notifF" style="margin-top:-5px;color: #4A4A4A;
                         font-family: Roboto;
                         font-size: 11px;
                         letter-spacing: 0;
                         line-height: 11px;
                       " >Des e-mails vous invitant à nous faire part de vos commentaires afin que nous puissions améliorer nos offres et mieux vous servir.</label></div>

                         </aside>

                    </section>

                        {{-- Section number 3 --}}
                        <section style="width:903px;height:403px;margin-top:-403px;margin-left:298px;padding:15px;display:none;" id="rightparm3">
                        <p style=" color: #191970;
                        font-family: Roboto;
                        font-size: 12px;
                        letter-spacing: -0.36px;
                        line-height: 16px;">Vous pouvez mettre à jour certaines informations relative à votre commande directement ici. Certaines informations sont diaponible pendant le <br>partage vers d’autres vos clients.<u> Partager ma commande </u></p>
                        {{-- Formulaire --}}
                        <aside style="  width: 874px;height:322px;
                        border: 1px solid #D8D8D8;
                        border-radius: 6px;
                        background-color: #FFFFFF;margin-top:20px;padding:15px;
                      ">
                      {{-- Left --}}
                       <div style="height:140px;width:422px;">
                        <label style=" color: #191970;
                        font-family: Roboto;
                        font-size: 15px;
                        font-weight: 500;
                        letter-spacing: -0.36px;
                        line-height: 13px;margin-left:2px">Nom de la commande</label>
                        <input type="text" style="  height: 41px;
                        width: 402px;
                        border: 1px solid #9B9B9B;
                        border-radius: 6px;
                        background-color: #F8F8F8;color: #9B9B9B;
                        font-family: Roboto;
                        font-size: 15px;
                        letter-spacing: -0.36px;
                        line-height: 13px;
                        padding-left:10px; padding-top:3px;margin-top:-5px; background-image:url('assets/images/icones-vendeurs2/newcheck.svg');background-repeat:no-repeat;background-origin:content-box;background-position:top 5.5px right 10px;background-size: 20px;cursor-events: none;cursor:not-allowed" placeholder="Nom de la commande">

                         <label style=" color: #191970;
                         font-family: Roboto;
                         font-size: 15px;
                         font-weight: 500;
                         letter-spacing: -0.36px;
                         line-height: 13px;margin-top:15px;margin-left:2px">Propriétaire de la commande</label>
                         <input type="text" style="  height: 41px;
                         width: 402px;
                         border: 1px solid #9B9B9B;
                         border-radius: 6px;
                         background-color: #F8F8F8;color: #9B9B9B;
                         font-family: Roboto;
                         font-size: 15px;
                         letter-spacing: -0.36px;
                         line-height: 13px;
                         padding-left:10px; padding-top:3px;margin-top:-5px; background-image:url('assets/images/icones-vendeurs2/newcheck.svg');background-repeat:no-repeat;background-origin:content-box;background-position:top 5.5px right 10px; background-size: 20px;pointer-events:none;cursor: not-allowed;" placeholder="Nom complet">
                       </div>
                       {{-- Right --}}
                       <div style="height:140px;width:422px;margin-left:442px;margin-top:-140px;">
                        <label style=" color: #191970;
                        font-family: Roboto;
                        font-size: 15px;
                        font-weight: 500;
                        letter-spacing: -0.36px;
                        line-height: 13px;margin-left:2px">Contact</label>
                        <input type="text" style="  height: 41px;
                        width: 402px;
                        border: 1px solid #9B9B9B;
                        border-radius: 6px;
                        background-color: #F8F8F8;color: #9B9B9B;
                        font-family: Roboto;
                        font-size: 15px;
                        letter-spacing: -0.36px;
                        line-height: 13px;
                        padding-left:10px; padding-top:3px;margin-top:-5px; background-image:url('assets/images/icones-vendeurs2/newcheck.svg');background-repeat:no-repeat;background-origin:content-box;background-position:top 5.5px right 10px; background-size: 20px;pointer-events:none;cursor: not-allowed;" placeholder="Numéro de téléphone">

                         <label style=" color: #191970;
                         font-family: Roboto;
                         font-size: 15px;
                         font-weight: 500;
                         letter-spacing: -0.36px;
                         line-height: 13px;margin-top:15px;margin-left:2px">Adresse e-mail</label>
                         <input type="text" style="  height: 41px;
                         width: 402px;
                         border: 1px solid #9B9B9B;
                         border-radius: 6px;
                         background-color: #F8F8F8;color: #9B9B9B;
                         font-family: Roboto;
                         font-size: 15px;
                         letter-spacing: -0.36px;
                         line-height: 13px;
                         padding-left:10px; padding-top:3px;margin-top:-5px; background-image:url('assets/images/icones-vendeurs2/newcheck.svg');background-repeat:no-repeat;background-origin:content-box;background-position:top 5.5px right 10px;; background-size: 20px;pointer-events:none;cursor: not-allowed;" placeholder="exemple@gmail.com">
                    </div>
                    <label style=" color: #191970;
                    font-family: Roboto;
                    font-size: 15px;
                    font-weight: 500;
                    letter-spacing: -0.36px;
                    line-height: 13px;margin-top:10px;margin-left:2px">Description de la commande</label><label style="color: #9B9B9B;
                    font-family: Roboto;
                    font-size: 12px;
                    letter-spacing: -0.29px;
                    line-height: 13px;margin-left:5px;">0/2000 Caractères</label>
                    <textarea type="textarea" row="6" cols="80" style="  box-sizing: border-box;
                    height: 124px;
                    width: 844px;
                    border: 1px solid #9B9B9B;
                    border-radius: 6px;
                    background-color: #FFFFFF;padding:10px;margin-left:0px;margin-top:-5px;"></textarea>

                      </aside>



                        </section>

                    </div>

            </div>
        </div>
        </div>
    </div>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js " integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM " crossorigin="anonymous "></script>

        <script>
           function ouvrecontenu1(){
               $("#leftplus1").hide();
               $("#leftmoins1").show();
               $("#cache1").show();
               $("#as1").css("border-radius","6px 6px 0 0");
               $("#leftplus2").show();
               $("#leftmoins2").hide();
               $("#cache2").hide();
               $("#as2").css("border-radius","6px");
               $("#leftplus3").show();
               $("#leftmoins3").hide();
               $("#cache3").hide();
               $("#as3").css("border-radius","6px");
               $("#leftplus4").show();
               $("#leftmoins4").hide();
               $("#cache4").hide();
               $("#as4").css("border-radius","6px");
           }

           function fermecontenu1(){
               $("#leftplus1").show();
               $("#leftmoins1").hide();
               $("#cache1").hide();
               $("#as1").css("border-radius","6px");
           }

           function ouvrecontenu2(){
               $("#leftplus2").hide();
               $("#leftmoins2").show();
               $("#cache2").show();
               $("#as2").css("border-radius","6px 6px 0 0");
               $("#leftplus1").show();
               $("#leftmoins1").hide();
               $("#cache1").hide();
               $("#as1").css("border-radius","6px");
               $("#leftplus3").show();
               $("#leftmoins3").hide();
               $("#cache3").hide();
               $("#as3").css("border-radius","6px");
               $("#leftplus4").show();
               $("#leftmoins4").hide();
               $("#cache4").hide();
               $("#as4").css("border-radius","6px");

           }

           function fermecontenu2(){
               $("#leftplus2").show();
               $("#leftmoins2").hide();
               $("#cache2").hide();
               $("#as2").css("border-radius","6px");
           }
           function ouvrecontenu3(){
               $("#leftplus3").hide();
               $("#leftmoins3").show();
               $("#cache3").show();
               $("#as3").css("border-radius","6px 6px 0 0");
               $("#leftplus1").show();
               $("#leftmoins1").hide();
               $("#cache1").hide();
               $("#as1").css("border-radius","6px");
               $("#leftplus2").show();
               $("#leftmoins2").hide();
               $("#cache2").hide();
               $("#as2").css("border-radius","6px");
               $("#leftplus4").show();
               $("#leftmoins4").hide();
               $("#cache4").hide();
               $("#as4").css("border-radius","6px");
           }

           function fermecontenu3(){
               $("#leftplus3").show();
               $("#leftmoins3").hide();
               $("#cache3").hide();
               $("#as3").css("border-radius","6px");
             ;
           }
           function ouvrecontenu4(){
               $("#leftplus4").hide();
               $("#leftmoins4").show();
               $("#cache4").show();
               $("#as4").css("border-radius","6px 6px 0 0");
               $("#leftplus1").show();
               $("#leftmoins1").hide();
               $("#cache1").hide();
               $("#as1").css("border-radius","6px");
               $("#leftplus2").show();
               $("#leftmoins2").hide();
               $("#cache2").hide();
               $("#as2").css("border-radius","6px");
               $("#leftplus3").show();
               $("#leftmoins3").hide();
               $("#cache3").hide();
               $("#as3").css("border-radius","6px");

           }

           function fermecontenu4(){
               $("#leftplus4").show();
               $("#leftmoins4").hide();
               $("#cache4").hide();
               $("#as4").css("border-radius","6px");
           }
           function butchange1(){
               $("#but1").css("background-color","#1A7EF5");
           }
           function butchange2(){
               $("#but2").css("background-color","#1A7EF5");
           }




        // Fonctions de changements de contenu
        function paramleft(){
            $("#leftparm1").css("border","1px solid #1A7EF5");
            $("#leftparm2").css("border","1px solid #D8D8D8");
            $("#leftparm3").css("border","1px solid #D8D8D8");
            $("#rightparm1").show();
            $("#rightparm2").hide();
            $("#rightparm3").hide();

        }
        function boutikleft(){
            $("#leftparm1").css("border","1px solid #D8D8D8");
            $("#leftparm2").css("border","1px solid #D8D8D8");
            $("#leftparm3").css("border","1px solid #1A7EF5");
            $("#rightparm1").hide();
            $("#rightparm2").hide();
            $("#rightparm3").show();
        }

        function notifleft(){
            $("#leftparm1").css("border","1px solid #D8D8D8");
            $("#leftparm3").css("border","1px solid #D8D8D8");
            $("#leftparm2").css("border","1px solid #1A7EF5");
            $("#rightparm1").hide();
            $("#rightparm2").show();
            $("#rightparm3").hide();
        }
        </script>

</body>

</html>
