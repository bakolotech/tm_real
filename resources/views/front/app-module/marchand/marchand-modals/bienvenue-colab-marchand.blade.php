

    <style>
        @import url('https://fonts.googleapis.com/css2?family=Roboto&display=swap');
        .modal-content-welcome-march,
        .modal-body-welcome-march {
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

        .modal-dialog-welcome-march {
            position: relative;
            height: 579px;
            left: -350px;
            top: 60px;
        }

.welcome_march {

display: flex;
}
.welcome_march li {
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
pointer-events:none;
border-radius: 6px;


}

    </style>

</head>

<body>

    <div class="overlay">


        <!-- The Modal -->
        <div class="modal modal-marchand-close" id="welcomeMarchand">
            <div class="modal-dialog modal-dialog-welcome-march">
                <div class="modal-content modal-content-welcome-march">
                    <div style="margin-top:5px;">


                        <div style="border:1px solid #D8D8D8;border-radius: 5px;width:319px ;margin-left: 5px; height: 80px;background-color: white;">
                            <a href="#" class="marie" data-id="newAvatar"> <div class="head-left-mask">
                                <span class="oval">
                                    <img src="assets/images/icones-vendeurs2/Off Copy.svg" width="24px;" height="24px" style="margin-top:22px;margin-left:-40px;">
                                </span>

                            </div></a>


                            <div class="quel-plaisir-de-vous"style="color:white;" >
                                Quel plaisir de vous revoir,
                                 <p style="   height: 22px;
                                    width: 120px;
                                    color: #191970;
                                    font-family: Roboto;
                                    font-size: 18px;
                                    font-weight: 500;
                                    letter-spacing: 0;
                                    line-height: 22px;margin-top:0px;"id="nom_store"> @NomDuStore</p>
                            </div>
                            <p class="p-rect-corps-right">
                                <span class="proprio" id="">Proprio.</span>
                            </p>





                        </div>
                        <div style="border:1px solid #D8D8D8;border-radius: 5px;margin-top:-80px;position: absolute;margin-left: 334px; width:873px;height: 80px;background-color: white; display: flex; flex-direction: column; justify-content: center; align-items: center">
                            {{-- <div class="gerer-equipe-menu">
                                <li  class="marie"><img src="assets/images/icones-vendeurs2/icones-menu/info-marche.svg"><br><br>Infos du marché</li>
                                <li  data-id="gererEquipe" class="marie"><img src="assets/images/icones-vendeurs2/icones-menu/gestionequipe.svg"><br><br>Gestion d'équipe</li>
                                <li  class="marie"><img src="assets/images/icones-vendeurs2/icones-menu/gestionstock.svg"><br><br>Gestion des stocks</li>
                                <li  class="marie"><img src="assets/images/icones-vendeurs2/icones-menu/messagerie.svg"><br><br>Messagerie</li>
                                <li  class="marie"><img src="assets/images/icones-vendeurs2/icones-menu/boutique.svg"><br><br>Mes boutiques</li>
                                <li  data-id="modePaiementMarchand" class="marie"><img src="assets/images/icones-vendeurs2/icones-menu/paiement.svg" ><br><br>Mode de paiements</li>
                                <li  class="marie"><img src="assets/images/icones-vendeurs2/icones-menu/gestion.svg"><br><br>Tableau des gestions</li>
                                <li  data-id="historiqueCode" class="marie"><img src="assets/images/icones-vendeurs2/icones-menu/codepromo.svg"><br><br>Historique des code</li>
                                <li  data-id="nouvellePromo" class="marie"><img src="assets/images/icones-vendeurs2/icones-menu/promo.svg"><br><br>Créer Code Promo</li>
                                <li  data-id = "articleCorbeille"  class="marie"><img src="assets/images/icones-vendeurs2/icones-menu/corbeille.svg"><br><br>Corbeille</li>
                                <li  data-id="gestMenu"  class="marie" style="color: #1A7EF5"><img src="assets/images/icones-vendeurs2/icones-menu/gestionmenubleu.svg"><br><br>Gestion des menus</li>
                            </div> --}}
                            {{-- @include('front.app-module.marchand.marchand-modals.menu-modal-marchand') --}}


                            @auth




                                <div class="welcome_march" id="gerer-equipe-menu">
                                    <li  class="marie" style="margin-left:0px;"><img src="assets/images/icones-vendeurs2/icones-menu/info-marche.svg"><br><br><p style="margin-top:3px">Info. du <br> marché</p></li>
                                    <li  data-id="gererEquipe" class="marie" ><img src="assets/images/icones-vendeurs2/icones-menu/gestionequipe.svg"><br><br><p style="margin-top:2px">Gestion d'équipe</p></li>
                                    <li  class="marie"><img src="assets/images/icones-vendeurs2/icones-menu/gestionstock.svg"><br><br><p style="margin-top:2px">Gestion <br>de  stocks</p></li>
                                    <li data-id="msgMarchand" class="marie"><img src="assets/images/icones-vendeurs2/icones-menu/messagerie.svg"><br><br><br><p style="margin-top:2px">Messagerie</p></li>
                                    <li data-id="welcomeMarchand" class="marie"><img src="assets/images/icones-vendeurs2/icones-menu/boutique.svg"><br><br><p style="margin-top:3px">Mes <br>boutiques</p></li>
                                    <li  data-id="modePaiementMarchand" style="margin-bottom" class="marie"><img src="assets/images/icones-vendeurs2/icones-menu/paiement.svg" ><br><br><p style="margin-top:8px;">Mode de <br> paiements<p></li>
                                    <li data-id="tbMarchand" class="marie"><img src="assets/images/icones-vendeurs2/icones-menu/gestion.svg"><br><br><p style="margin-top:2px">Tableau <br>de gestions</p></li>
                                    <li  data-id="historiqueCode" data-id="genererCode" class="marie" ><img src="assets/images/icones-vendeurs2/icones-menu/codepromo.svg"><br><br><p style="margin-top:2px">Historique <br>de codes</p></li>
                                    <li  data-id="nouvellePromo" class="marie"><img src="assets/images/icones-vendeurs2/icones-menu/promo.svg"><br><br><p style="margin-top:2px">Créer<br>une promo</p></li>
                                    <li  data-id = "articleCorbeille" class="marie"><img src="assets/images/icones-vendeurs2/icones-menu/corbeille.svg"><br><br><br><p style="margin-top:2px">Corbeille</p></li>
                                    <li  data-id="gestMenu" class="marie" ><img src="assets/images/icones-vendeurs2/icones-menu/gestionmenu.svg"><br><br><p style="margin-top:2px">Gestion <br>des menus</p></li>

                                </div>


                            @endauth

                        </div>
                    </div>
                    <div style=" box-sizing: border-box;
                    height: 479px;
                    width: 1202px;
                    border: 1px solid #D8D8D8;
                    border-radius: 6px;
                    background-color: #FFFFFF;margin-top:10px;margin-left:5px;">

                          <img src="assets/images/icones-vendeurs2/Bienvenu.svg"style="margin-top:100px;margin-left:421px;">
                          <p style="  color: #D0021B;
                          font-family: Roboto;
                          font-size: 30px;
                          font-weight: 500;
                          letter-spacing: 0;
                          line-height: 35px;
                          text-align: center;margin-top:20px;margin-left:0px">sur @NomDuStore</p>
                          <p style="  color: #191970;
                          font-family: Roboto;
                          font-size: 20px;
                          font-weight: 500;
                          letter-spacing: 0;
                          line-height: 25px;
                          text-align: center;margin-top:66px;">@ComptePropriétaire vous a invité a rejoindre son équipe sur Toulè Market</p>
                          <p style="  color: #9B9B9B;
                          font-family: Roboto;
                          font-size: 17px;
                          font-weight: 500;
                          letter-spacing: 0;
                          line-height: 18px;
                          text-align: center;margin-top:80px;">Vous n’avez pas encore de rôle mais vous<br>
                            pouvez faire le tour de votre nouvel espace de travail</p>





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
