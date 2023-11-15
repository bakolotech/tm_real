

  <style>
    @import url('https://fonts.googleapis.com/css2?family=Roboto&display=swap');
    .modal-content-tb-marchand,
    .modal-body-tb-marchand {
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

    .modal-dialog-tb-marchand {
        position: relative;
        height: 579px;
        left: -350px;
        top: 60px;
    }

    #form {
        color: #191970;
        font-family: Roboto;
        font-size: 14px;
        letter-spacing: -0.36px;
        line-height: 16px;
        padding: 10px
    }

    #forme {
        color: #1A7EF5;
        font-family: Roboto;
        font-size: 14px;
        letter-spacing: 0;
        line-height: 13px;
        text-align: center;
    }

    .head-left-mask {
        box-sizing: border-box;
        height: 79px;
        width: 80px;
        border: 1px solid #1A7EF5;
        border-radius: 6px;
        background-color: #D8D8D8;
        display: flex;
    }
    .oval {
        height: 9px;
        width: 9px;
        background-color: #00B517;
        margin-left: 67px;
        margin-top: 5px;
        border-radius: 50%;
    }
    .p-rect-corps-right {
        height: 18px;
        width: 71px;
        border-radius: 6px;
        background-color: #1A7EF5;
        margin-left: 100px;
    }
    .proprio {
        height: 16px;
        width: 51px;
        color: #FFFFFF;
        font-family: Roboto;
        font-size: 14px;
        font-weight: 500;
        letter-spacing: 0;
        line-height: 16px;
        text-align: center;
    }

        /* Progress circle*/

        .progress {
            width: 45px!important;
            height: 45px !important;
            line-height: 50px;
            background: white;
            margin-top: -53px;
            box-shadow: none;
            position: relative;
            margin-left: 100px;
            border-radius: 80px
        }

        .progress>span {
            width: 50%;
            height: 100%;
            overflow: hidden;
            position: absolute;
            top: 0;
            z-index: 1;
        }

        .progress .progress-left {
            left: 0;
        }

        .progress .progress-bar {
            width: 100%;
            height: 100%;
            background: none;
            border-width: 3px;
            border-style: solid;
            position: absolute;
            top: 0;
        }

        .progress .progress-left .progress-bar {
            left: 100%;
            border-top-right-radius: 80px;
            border-bottom-right-radius: 80px;
            border-left: 0;
            -webkit-transform-origin: center left;
            transform-origin: center left;
        }

        .progress .progress-right {
            right: 0;
        }

        .progress .progress-right .progress-bar {
            left: -100%;
            border-top-left-radius: 80px;
            border-bottom-left-radius: 80px;
            border-right: 0;
            -webkit-transform-origin: center right;
            transform-origin: center right;
            animation: loading-1 1.8s linear forwards;
        }

        .progress .progress-value {
            width: 27px;
            height: 16px;
            border-radius: 50%;
            color: #191970;
            font-family: Roboto;
            font-size: 14px;
            font-weight: bold;
            letter-spacing: 0;
            line-height: 16px;
            text-align: center;
            padding-left: 10px;
            padding-top: 15px;
        }

        .progress.blue .progress-bar {
            border-color: rgb(15, 167, 15);
        }
        .progress.yel .progress-bar {
            border-color: #FF9500;
        }
        .progress.third .progress-bar {
            border-color:#FFCC00;
        }

        .progress.blue .progress-left .progress-bar {
            animation: loading-2 1.5s linear forwards 1.8s;
        }
         .progress.yel .progress-left .progress-bar {
            animation: loading-2 1.5s linear forwards 1.8s;
        }
         .progress.third .progress-left .progress-bar {
            animation: loading-2 1.5s linear forwards 1.8s;
        }

        @keyframes loading-1 {
            0% {
                -webkit-transform: rotate(0deg);
                transform: rotate(0deg);
            }
            100% {
                -webkit-transform: rotate(180deg);
                transform: rotate(180deg);
            }
        }

        @keyframes loading-2 {
            0% {
                -webkit-transform: rotate(0deg);
                transform: rotate(0deg);
            }
            100% {
                -webkit-transform: rotate(144deg);
                transform: rotate(144deg);
            }
        }

        @keyframes loading-3 {
            0% {
                -webkit-transform: rotate(0deg);
                transform: rotate(0deg);
            }
            100% {
                -webkit-transform: rotate(135deg);
                transform: rotate(135deg);
            }
        } */

        a {
            text-decoration: none;
        }

</style>






    <!-- The Modal -->
    <div class="modal modal-marchand-close" id="tbMarchand" >
        <div class="modal-dialog modal-dialog-tb-marchand">
            <div class="modal-content modal-content-tb-marchand">
                <div style="margin-top:5px;">
                    @include('front.app-module.marchand.marchand-modals.marchand-profil-data')
                        <div style="border:1px solid #D8D8D8;border-radius: 5px;margin-top:-80px;position: absolute;margin-left: 334px; width:873px;height: 80px;background-color: white; display: flex; flex-direction: column; justify-content: center; align-items: center">

                                                  @auth
@if (\Illuminate\Support\Facades\Auth::user()->role == 2)

    <div class="historique-code" id="gerer-equipe-menu">
        <li data-id="infomarch" class="marie" style="margin-left:0px;"><img src="assets/images/icones-vendeurs2/icones-menu/info-marche.svg"><br><br><p style="margin-top:3px ;">Info. du <br> marché</p></li>
        <li  data-id="gererEquipe" class="marie" ><img src="assets/images/icones-vendeurs2/icones-menu/gestionequipe.svg"><br><br><p style="margin-top:2px">Gestion d'équipe</p></li>
        <li  class="marie"><img src="assets/images/icones-vendeurs2/icones-menu/gestionstock.svg"><br><br><p style="margin-top:2px">Gestion <br>de  stocks</p></li>
        <li data-id="msgMarchand" class="marie"><img src="assets/images/icones-vendeurs2/icones-menu/messagerie.svg"><br><br><br><p style="margin-top:2px">Messagerie</p></li>
        <li data-id="commandedet" class="marie"><img src="assets/images/icones-vendeurs2/icones-menu/commande.svg"><br><br><p style="margin-top:3px">Mes <br>commandes</p></li>
        <li  data-id="modePaiementMarchand1" style="margin-bottom" class="marie"><img src="assets/images/icones-vendeurs2/icones-menu/paiement.svg" ><br><p style="margin-top:15px;">Mode de <br> paiements<p></li>

        <li data-id="tbMarchand" class="marie" style="color: #1A7EF5;border:1px solid #1A7EF5;background-color:#F8F8F8"><img src="assets/images/icones-vendeurs2/icones-menu/gestionbleu.svg"><br><br><p style="margin-top:2px">Tableau <br>de gestions</p></li>

        <li  data-id="historiqueCode" data-id="genererCode" class="marie"><img src="assets/images/icones-vendeurs2/icones-menu/codepromo.svg"><br><br><p style="margin-top:2px">Historique <br>de codes</p></li>
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
        <li  data-id="modePaiementMarchand1" class="marie" style="pointer-events:none;opacity:0.6;"><img src="assets/images/icones-vendeurs2/icones-menu/paiement.svg" ><br><br><br>Mode de <br>paiements</li>
        <li  class="marie" data-id="tbMarchand"   style="color: #1A7EF5"><img src="assets/images/icones-vendeurs2/icones-menu/gestionbleu.svg"><br><br>Tableau <br>de gestions</li>
        <li  data-id="historiqueCode" data-id="genererCode" class="marie" style="pointer-events:none;opacity:0.6;"><img src="assets/images/icones-vendeurs2/icones-menu/codepromo.svg"><br><br>Historique <br>de codes</li>
        <li  data-id="nouvellePromo" class="marie"><img src="assets/images/icones-vendeurs2/icones-menu/promo.svg"><br><br>Créer <br> une promo</li>
        <li  data-id = "articleCorbeille" class="marie"><img src="assets/images/icones-vendeurs2/icones-menu/corbeille.svg"><br><br><br>Corbeille</li>
        <li  data-id="gestMenu" class="marie"><img src="assets/images/icones-vendeurs2/icones-menu/gestionmenu.svg" style="pointer-events:none;opacity:0.6;"><br><br>Gestion <br>des menus</li>
    </div>
@elseif (\Illuminate\Support\Facades\Auth::user()->role == 5) {{-- Demarcheur --}}
    <div class="gerer-equipe-menu" id="gerer-equipe-menu">
        <li  class="marie"style="margin-left:0px;"><><img src="assets/images/icones-vendeurs2/icones-menu/info-marche.svg"><br><br>Info.du <br> marché</li>
        <li  data-id="gererEquipe" class="marie" style="pointer-events:none;opacity:0.6;"><img src="assets/images/icones-vendeurs2/icones-menu/gestionequipe.svg"><br><br>Gestion d'équipe</li>
        <li  class="marie" style="pointer-events:none;opacity:0.6;"><img src="assets/images/icones-vendeurs2/icones-menu/gestionstock.svg"><br><br>Gestion <br>de stocks</li>
        <li data-id="msgMarchand"  class="marie" style="color: #1A7EF5"><img src="assets/images/icones-vendeurs2/icones-menu/messagerie.svg"><br><br><br>Messagerie</li>
        <li data-id="commandedet" class="marie"><img src="assets/images/icones-vendeurs2/icones-menu/commande.svg"><br><br><p style="margin-top:3px">Mes <br>commandes</p></li>
        <li  data-id="modePaiementMarchand1" class="marie" style="pointer-events:none;opacity:0.6;"><img src="assets/images/icones-vendeurs2/icones-menu/paiement.svg" ><br><br><br>Mode de <br>paiements</li>
        <li data-id="tbMarchand"  class="marie" style="pointer-events:none;opacity:0.6;"><img src="assets/images/icones-vendeurs2/icones-menu/gestionbleu.svg"><br><br>Tableau <br>de gestions</li>
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
        <li  data-id="modePaiementMarchand1" class="marie" ><img src="assets/images/icones-vendeurs2/icones-menu/paiement.svg" ><br><br><br>Mode <br>de paiements</li>
        <li data-id="tbMarchand" class="marie" style="pointer-events:none;opacity:0.6;"><img src="assets/images/icones-vendeurs2/icones-menu/gestionbleu.svg"><br><br>Tableau <br>de gestions</li>
        <li  data-id="historiqueCode" data-id="genererCode" class="marie" style="pointer-events:none;opacity:0.6;"><img src="assets/images/icones-vendeurs2/icones-menu/codepromo.svg"><br><br>Historique <br>de codes</li>
        <li  data-id="nouvellePromo" class="marie" style="pointer-events:none;opacity:0.6;"><img src="assets/images/icones-vendeurs2/icones-menu/promo.svg"><br><br>Créer <br>une promo</li>
        <li  data-id = "articleCorbeille" class="marie" style="pointer-events:none;opacity:0.6;"><img src="assets/images/icones-vendeurs2/icones-menu/corbeille.svg"><br><br><br>Corbeille</li>
        <li  data-id="gestMenu" class="marie" style="pointer-events:none;opacity:0.6;"><img src="assets/images/icones-vendeurs2/icones-menu/gestionmenu.svg"><br><br>Gestion <br>des menus</li>
    </div>
@elseif (\Illuminate\Support\Facades\Auth::user()->role == 7) {{-- Gérant --}}
<div class="gerer-equipe-menu" id="gerer-equipe-menu">
    <li data-id="infomarch" class="marie" style="margin-left:0px;"><><img src="assets/images/icones-vendeurs2/icones-menu/info-marche.svg" style="color: #1A7EF5"><br><br>Info. du <br>marché</li>
    <li  data-id="gererEquipe" class="marie" style="pointer-events:none;opacity:0.6;"><img src="assets/images/icones-vendeurs2/icones-menu/gestionequipe.svg"><br><br>Gestion d'équipe</li>
    <li  class="marie"><img src="assets/images/icones-vendeurs2/icones-menu/gestionstock.svg"><br><br>Gestion <br>de  stocks</li>
    <li data-id="msgMarchand"  class="marie"><img src="assets/images/icones-vendeurs2/icones-menu/messagerie.svg"><br><br><br>Messagerie</li>
    <li data-id="commandedet" class="marie"><img src="assets/images/icones-vendeurs2/icones-menu/commande.svg"><br><br><p style="margin-top:3px">Mes <br>commandes</p></li>
    <li  data-id="modePaiementMarchand1" class="marie"><img src="assets/images/icones-vendeurs2/icones-menu/paiement.svg" ><br><br><br>Mode <br> de paiements</li>
    <li data-id="tbMarchand" class="marie" style="color: #1A7EF5;border:1px solid #1A7EF5;background-color:#F8F8F8"><img src="assets/images/icones-vendeurs2/icones-menu/gestionbleu.svg"><br><br>Tableau <br>de gestions</li>
    <li  data-id="historiqueCode"  class="marie" ><img src="assets/images/icones-vendeurs2/icones-menu/codepromo.svg"><br><br>Historique <br> de codes</li>
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
        <li  data-id="modePaiementMarchand1" class="marie" style="pointer-events:none;opacity:0.6;"><img src="assets/images/icones-vendeurs2/icones-menu/paiement.svg" ><br><br><br>Mode de <br> paiements</li>
        <li data-id="tbMarchand" class="marie" style="pointer-events:none;opacity:0.6;"><img src="assets/images/icones-vendeurs2/icones-menu/gestionbleu.svg"><br><br>Tableau <br> de gestions</li>
        <li  data-id="historiqueCode" data-id="genererCode" class="marie" style="pointer-events:none;opacity:0.6;"><img src="assets/images/icones-vendeurs2/icones-menu/codepromo.svg"><br><br>Historique<br> de codes</li>
        <li  data-id="nouvellePromo" class="marie" style="pointer-events:none;opacity:0.6;"><img src="assets/images/icones-vendeurs2/icones-menu/promo.svg"><br><br>Créer <br>une promo</li>
        <li  data-id = "articleCorbeille" class="marie" style="pointer-events:none;opacity:0.6;"><img src="assets/images/icones-vendeurs2/icones-menu/corbeille.svg"><br><br><br>Corbeille</li>
        <li  data-id="gestMenu" class="marie" style="pointer-events:none;opacity:0.6;"><img src="assets/images/icones-vendeurs2/icones-menu/gestionmenu.svg"><br><br>Gestion <br> des menus</li>
    </div>
@endif
@endauth


                        </div>
                    </div>



                <div style="margin-top: 10px;">
                    <section style="width:281px;margin-left:5px;height:39px; border-top-left-radius:5px ; border:1px solid #D8D8D8;background-color: white;">
                        <p style="  color: #191970;
                    font-family: Roboto;
                    font-size: 14px;
                    font-weight: 500;
                    letter-spacing: 0;
                    line-height: 19px;
                    text-align: left;padding-left: 10px;padding-top: 10px;">Tableau de gestion</p>


                    </section>
                    <section style="  width: 281px; margin-left:5px;
                    border-left: 1px solid #D8D8D8;
                    background-color: #F8F8F8;height:36px;
                  ">
                        <p style="  color: #191970;
                    font-family: Roboto;
                    font-size: 11px;
                    letter-spacing: 0;
                    line-height: 12px;text-align: left ; padding-left: 30px;padding-top: 13px;">
                            Modules </p>
                    </section>

                    <section style="margin-top: 10px;margin-right: 5px; width: 921px;height: 39px;border:1px solid #D8D8D8;border-top-right-radius:5px ;margin-top: -75px;margin-left: 285px;background-color: white;">
                        <p style="  color: #191970;
                        font-family: Roboto;
                        font-size: 18px;
                        font-weight: 500;
                        letter-spacing: 0;
                        line-height: 19px;
                        text-align: left;padding-left: 10px;padding-top: 10px;">Statistiques</p>
                        <div class="form-check" style="margin-left: 641px;margin-top:-38px;">

                            <input class="form-check-input one-checkG" type="checkbox" value="1" id="flexCheckIndeterminate1" checked>

                            <label class="form-check-label" for="flexCheckIndeterminate" style="  width: 65px;
                            color: #4A4A4A;
                            font-family:Roboto;
                            font-size: 12px;
                            letter-spacing: 0;
                            line-height: 16px;margin-top:5px;">
                              Aujourd'hui
                            </label>


                          </div>

                          <div class="form-check" style="margin-left: 757px;margin-top:-38px;">

                            <input class="form-check-input one-checkG" type="checkbox" value="2" id="flexCheckIndeterminate2">

                            <label class="form-check-label" for="flexCheckIndeterminate" style="  width: 65px;
                            color: #4A4A4A;
                            font-family: Roboto;
                            font-size: 12px;
                            letter-spacing: 0;
                            line-height: 16px;margin-top:17px">
                              Semaine
                            </label>


                          </div>

                          <div class="form-check" style="margin-left: 860px;margin-top:-38px;">

                            <input class="form-check-input one-checkG" type="checkbox" value="3" id="flexCheckIndeterminate3">

                            <label class="form-check-label" for="flexCheckIndeterminate" style="  width: 65px;
                            color: #4A4A4A;
                            font-family: Roboto;
                            font-size: 12px;
                            letter-spacing: 0;
                            line-height: 16px;margin-top:20px;">
                              Mois
                            </label>


                          </div>

                    </section>
                    <section style="  height: 36px;
                    width: 921px;
                    border-right: 1px solid #D8D8D8;border-left:1px solid #D8D8D8;
                    background-color: #F8F8F8;margin-left: 285px;">
                        <p style="  color: #191970;
                    font-family: Roboto;
                    font-size: 11px;
                    letter-spacing: 0;
                    line-height: 12px;text-align:left; padding-left:30px;padding-top: 13px;">Rester à l’affut de la moindre stat coté vente, achat, clientèle et bien plus encore.</p>
                    </section>


                </div>
                <div class="container" style="margin-left: -7px;;">
                    <section style="width:281px;height: 93px;  border-top: 1px solid #D8D8D8;border-left:1px solid #D8D8D8;border-right:1px solid #D8D8D8;
                    background-color: #FFFFFF;">
                        <p style="  color: #191970;
                    font-family: Roboto;
                    font-size: 14px;
                    font-weight: 500;
                    letter-spacing: 0;
                    line-height: 19px;
                    text-align: center;padding-top:20px">Chiffre d’affaire de ma boutique</p>

                    <p style="  color: #191970;
                    font-family: Roboto;
                    font-size: 26px;
                    font-weight: 500;
                    letter-spacing: 0;
                    line-height: 19px;
                    text-align: center;margin-top:5px;" id="tbg">xxxxx FCFA</p>

                    </section>
                    <section style="width:281px;height:310px;border: 1px solid #D8D8D8;padding-bottom: 20px;border-bottom-left-radius: 5px;background-image: url(assets/images/icones-vendeurs2/Group\ 5\ Copy\ 7.webp);background-repeat: repeat;background-size: 330px;">





                        <article class="at" style="height: 70px;
                           width: 221px;
                           border: 1px solid #D8D8D8;
                           border-radius: 6px;background-color: #FFFF ;margin-top: 20px;margin-left: 30px;" id="ta1">
                            <a  id="tab1" >



                                <p style="  color: #191970;
                            font-family: Roboto;
                            font-size: 12px;
                            font-weight: bold;
                            letter-spacing: 0.24px;
                            line-height: 13px;padding-top:23px;padding-left:15px;text-decoration:none!important;
                          ">Produits <br>en stock</p>

                                <div class="progress blue">
                                    <span class="progress-left">
                                              <span class="progress-bar"></span>
                                    </span>
                                    <span class="progress-right">
                                    <span class="progress-bar"></span>
                                    </span>

                                    <div class="progress-value" id="stock1">XXX</div>
                                </div>
                                <img src="assets/images/icones-vendeurs2/Group 31.svg" style="width:80px;height:60px; margin-left:144px;margin-top:-48px">

                            </a>
                        </article>








                        <article class="at" style="height: 70px;
                        width: 221px;
                        border: 1px solid #D8D8D8;
                        border-radius: 6px;background-color: #FFFF ;margin-top: 30px;margin-left: 30px;" id="ta2">
                            <a  id="tab2" style="text-decoraction:none;">

                                <p style="  color: #191970;
                            font-family: Roboto;
                            font-size: 12px;
                            font-weight: bold;
                            letter-spacing: 0.24px;
                            line-height: 13px;padding-top:23px;padding-left:15px;
                          ">Nouvelles
                                    <br>commandes</p>

                                <div class="progress yel">
                                    <span class="progress-left">
                                              <span class="progress-bar"></span>
                                    </span>
                                    <span class="progress-right">
                                    <span class="progress-bar"></span>
                                    </span>

                                    <div class="progress-value" id="Newcommande">XXX</div>
                                </div>
                                <img src="assets/images/icones-vendeurs2/Group 25.svg" style="width:80px;height:60px; margin-left:144px;margin-top:-48px">
                            </a>
                        </article>










                        <article class="at" style="height: 70px;
                        width: 221px;
                        border: 1px solid #D8D8D8;
                        border-radius: 6px;background-color: #FFFF ;margin-top: 30px;margin-left: 30px;" id="ta3">
                            <a id="tab4" style="text-decoraction:none;">


                        <p style="  color: #191970;
                        font-family: Roboto;
                        font-size: 12px;
                        font-weight: bold;
                        letter-spacing: 0.24px;
                        line-height: 13px;padding-top:23px;padding-left:15px;
                        ">Commandes <br>passées</p>
                                <div class="progress third">
                                    <span class="progress-left">
                                        <span class="progress-bar"></span>
                                    </span>
                                    <span class="progress-right">
                                <span class="progress-bar"></span>
                                    </span>

                                    <div class="progress-value" id="passer">XXX</div>
                                </div>
                                <img src="assets/images/icones-vendeurs2/Group 80.svg" style="width:80px;height:60px; margin-left:144px;margin-top:-48px">
                            </a>
                        </article>







                    </section>

                    <section style="width:921px;height:403px;margin-left:280px;margin-top:-403px; border:1px solid #D8D8D8 ;border-bottom-right-radius: 5px;background-color: white;" >
                    {{-- Premier en tete (1er tableau) --}}
                    <aside id="entetetab1" style="display:none;margin-top:20px;">
                        <article style=" height: 31px;
                        width: 190px;
                        border-radius: 6px;
                        background-color: #F5F5F5;margin-left: 100px;border: 1 px solid #D8D8D8;margin-top:10px;padding:6px;">
                            <p style="  color: #191970;
                        font-family: Roboto;
                        font-size: 16px;
                        font-weight: 500;
                        letter-spacing: 0;
                        line-height: 19px;margin-left:5px;">Produit en stock :</p>
                            <p style="  color: #4A4A4A;
                        font-family: Roboto;
                        font-size: 16px;
                        font-weight: 500;
                        letter-spacing: 0;
                        line-height: 19px;margin-left:130px;margin-top:-35px;" id="stock"> XXXX

                            </p>
                        </article>
                        <p style="  color: #9B9B9B;
                        font-family: Roboto;
                        font-size: 16px;
                        font-weight: 500;
                        letter-spacing: 0;
                        line-height: 19px;margin-left:300px;margin-top: -25px;">?</p>
                        <article style="   height: 31px;
                        width: 220px;padding:6px;

                           border-radius: 6px;
                           background-color: #F5F5F5;margin-left:325px;margin-top:-41px;border: 1 px solid #D8D8D8;">
                            <p style="
                            color: #D0021B;
                        font-family: Roboto;
                        font-size: 16px;
                        font-weight: 500;
                        letter-spacing: 0;
                        line-height: 19px;">Produit sortant :</p>
                            <p style="  color: #4A4A4A;
                        font-family: Roboto;
                        font-size: 16px;
                        font-weight: 500;
                        letter-spacing: 0;
                        line-height: 19px;margin-left:120px;margin-top:-35px;" id="sortant">XXXX

                            </p>
                            <p style="margin-left:160px;margin-top:-35px;"><svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="#D0021B" color="#00B517;" class="bi bi-caret-down-fill" viewBox="0 0 16 16">
                                <path d="M7.247 11.14 2.451 5.658C1.885 5.013 2.345 4 3.204 4h9.592a1 1 0 0 1 .753 1.659l-4.796 5.48a1 1 0 0 1-1.506 0z"/>
                              </svg>
                                <p style="margin-left:178px;margin-top:-30px;  color: #D0021B;
                              font-family: Roboto;
                              font-size: 10px;
                              font-weight: 500;
                              letter-spacing: 0;
                              line-height: 11px;
                            ">100%</p>
                        </article>
                        <p style="  color: #9B9B9B;
                        font-family: Roboto;
                        font-size: 16px;
                        font-weight: 500;
                        letter-spacing: 0;
                        line-height: 19px;margin-left:555px;margin-top: -25px;">?</p>
                        <article style="   height: 31px;
                              width: 235px;
                              border-radius: 6px;
                              background-color: #F5F5F5;border: 1 px solid #D8D8D8;margin-left:580px;margin-top:-41px;padding:6px;">
                            <p style="
                              color: #00B517;
                                font-family: Roboto;
                                font-size: 16px;
                                font-weight: 500;
                                letter-spacing: 0;
                                line-height: 19px;margin-left:5px;">Produit rentrant :</p>
                            <p style="  color: #4A4A4A;
                                font-family: Roboto;
                                font-size: 16px;
                                font-weight: 500;
                                letter-spacing: 0;
                                line-height: 19px;margin-left:135px;margin-top:-35px;"id="today">XXXX

                            </p>
                            <p style="margin-left:175px;margin-top:-35px;color: #00B517;
                            ;
                              font-family: Roboto;
                              font-size: 16px;
                              font-weight: 500;">
                                <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="#00B517" class=" bi bi-caret-up-fill " viewBox="0 0 16 16 ">
                                <path d="m7.247 4.86-4.796 5.481c-.566.647-.106 1.659.753 1.659h9.592a1 1 0 0 0 .753-1.659l-4.796-5.48a1 1 0 0 0-1.506 0z "/>
                              </svg> </p>
                            <p style="margin-left:192px;margin-top:-30px;  color: #00B517;
                            font-family: Roboto;
                            font-size: 10px;
                            font-weight: 500;
                            letter-spacing: 0;
                            line-height: 11px;
                          ">100%</p>

                        </article>

                        </aside>

                          {{-- 2ieme en tete Pour 2ieme Tableau --}}

                         <aside id="entetetab2" style="display:none;margin-top:20px;">
                        <article style=" height: 31px;
                        width: 190px;
                        border-radius: 6px;
                        background-color: #F5F5F5;margin-left: 80px;border: 1 px solid #D8D8D8;margin-top:10px;padding:6px;">
                            <p style="  color: #191970;
                        font-family: Roboto;
                        font-size: 16px;
                        font-weight: 500;
                        letter-spacing: 0;
                        line-height: 19px;margin-left:5px;">Produit en stock :</p>
                            <p style="  color: #4A4A4A;
                        font-family: Roboto;
                        font-size: 16px;
                        font-weight: 500;
                        letter-spacing: 0;
                        line-height: 19px;margin-left:130px;margin-top:-35px;" id="stock2">XXXX

                            </p>
                        </article>
                        <p style="  color: #9B9B9B;
                        font-family: Roboto;
                        font-size: 16px;
                        font-weight: 500;
                        letter-spacing: 0;
                        line-height: 19px;margin-left:280px;margin-top: -25px;">?</p>
                        <article style="   height: 31px;
                        width: 249px;padding:6px;

                           border-radius: 6px;
                           background-color: #F5F5F5;margin-left:305px;margin-top:-41px;border: 1 px solid #D8D8D8;">
                            <p style="
                            color: #FF9F0A;
                        font-family: Roboto;
                        font-size: 16px;
                        font-weight: 500;
                        letter-spacing: 0;
                        line-height: 19px;">Commande en cours :</p>
                            <p style="  color: #4A4A4A;
                        font-family: Roboto;
                        font-size: 16px;
                        font-weight: 500;
                        letter-spacing: 0;
                        line-height: 19px;margin-left:160px;margin-top:-35px;" id="C_encours">XXXX

                            </p>
                            <p style="margin-left:200px;margin-top:-35px;"><svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="#D0021B" color="#00B517;" class="bi bi-caret-down-fill" viewBox="0 0 16 16">
                                <path d="M7.247 11.14 2.451 5.658C1.885 5.013 2.345 4 3.204 4h9.592a1 1 0 0 1 .753 1.659l-4.796 5.48a1 1 0 0 1-1.506 0z"/>
                              </svg>
                                <p style="margin-left:218px;margin-top:-30px;  color: #D0021B;
                              font-family: Roboto;
                              font-size: 10px;
                              font-weight: 500;
                              letter-spacing: 0;
                              line-height: 11px;
                            ">100%</p>
                        </article>
                        <p style="  color: #9B9B9B;
                        font-family: Roboto;
                        font-size: 16px;
                        font-weight: 500;
                        letter-spacing: 0;
                        line-height: 19px;margin-left:565px;margin-top: -25px;">?</p>
                        <article style="   height: 31px;
                              width: 237px;
                              border-radius: 6px;
                              background-color: #F5F5F5;border: 1 px solid #D8D8D8;margin-left:590px;margin-top:-41px;padding:6px;">
                            <p style="
                              color: #00B517;
                                font-family: Roboto;
                                font-size: 16px;
                                font-weight: 500;
                                letter-spacing: 0;
                                line-height: 19px;margin-left:5px;">Commande reçue :</p>
                            <p style="  color: #4A4A4A;
                                font-family: Roboto;
                                font-size: 16px;
                                font-weight: 500;
                                letter-spacing: 0;
                                line-height: 19px;margin-left:145px;margin-top:-35px;" id="commande_recu">XXXX

                            </p>
                            <p style="margin-left:185px;margin-top:-35px;color: #00B517;
                            ;
                              font-family: Roboto;
                              font-size: 16px;
                              font-weight: 500;">
                                <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="#00B517" class=" bi bi-caret-up-fill " viewBox="0 0 16 16 ">
                                <path d="m7.247 4.86-4.796 5.481c-.566.647-.106 1.659.753 1.659h9.592a1 1 0 0 0 .753-1.659l-4.796-5.48a1 1 0 0 0-1.506 0z "/>
                              </svg> </p>
                            <p style="margin-left:200px;margin-top:-30px;  color: #00B517;
                            font-family: Roboto;
                            font-size: 10px;
                            font-weight: 500;
                            letter-spacing: 0;
                            line-height: 11px;
                          ">100%</p>

                        </article>

                        </aside>

                        {{-- 3e en tete (3ieme Tableau) --}}

                         <aside id="entetetab3" style="display:none; margin-top:20px;">
                        <article style=" height: 31px;
                        width: 190px;
                        border-radius: 6px;
                        background-color: #F5F5F5;margin-left: 80px;border: 1 px solid #D8D8D8;margin-top:10px;padding:6px;">
                            <p style="  color: #191970;
                        font-family: Roboto;
                        font-size: 16px;
                        font-weight: 500;
                        letter-spacing: 0;
                        line-height: 19px;margin-left:5px;">Produit en stock :</p>
                            <p style="  color: #4A4A4A;
                        font-family: Roboto;
                        font-size: 16px;
                        font-weight: 500;
                        letter-spacing: 0;
                        line-height: 19px;margin-left:130px;margin-top:-35px;" id="stock3">XXXX

                            </p>
                        </article>
                        <p style="  color: #9B9B9B;
                        font-family: Roboto;
                        font-size: 16px;
                        font-weight: 500;
                        letter-spacing: 0;
                        line-height: 19px;margin-left:280px;margin-top: -25px;">?</p>
                        <article style="   height: 31px;
                        width: 249px;padding:6px;

                           border-radius: 6px;
                           background-color: #F5F5F5;margin-left:305px;margin-top:-41px;border: 1 px solid #D8D8D8;">
                            <p style="
                            color: #D0021B;
                        font-family: Roboto;
                        font-size: 16px;
                        font-weight: 500;
                        letter-spacing: 0;
                        line-height: 19px;">Commande annulée :</p>
                            <p style="  color: #4A4A4A;
                        font-family: Roboto;
                        font-size: 16px;
                        font-weight: 500;
                        letter-spacing: 0;
                        line-height: 19px;margin-left:160px;margin-top:-35px;" id="kanceled">XXXX

                            </p>
                            <p style="margin-left:200px;margin-top:-35px;"><svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="#D0021B" color="#00B517;" class="bi bi-caret-down-fill" viewBox="0 0 16 16">
                                <path d="M7.247 11.14 2.451 5.658C1.885 5.013 2.345 4 3.204 4h9.592a1 1 0 0 1 .753 1.659l-4.796 5.48a1 1 0 0 1-1.506 0z"/>
                              </svg>
                                <p style="margin-left:218px;margin-top:-30px;  color: #D0021B;
                              font-family: Roboto;
                              font-size: 10px;
                              font-weight: 500;
                              letter-spacing: 0;
                              line-height: 11px;
                            ">100%</p>
                        </article>
                        <p style="  color: #9B9B9B;
                        font-family: Roboto;
                        font-size: 16px;
                        font-weight: 500;
                        letter-spacing: 0;
                        line-height: 19px;margin-left:565px;margin-top: -25px;">?</p>
                        <article style="   height: 31px;
                              width: 265px;
                              border-radius: 6px;
                              background-color: #F5F5F5;border: 1 px solid #D8D8D8;margin-left:590px;margin-top:-41px;padding:6px;">
                            <p style="
                              color: #00B517;
                                font-family: Roboto;
                                font-size: 16px;
                                font-weight: 500;
                                letter-spacing: 0;
                                line-height: 19px;margin-left:5px;">Commande effectuée :</p>
                            <p style="  color: #4A4A4A;
                                font-family: Roboto;
                                font-size: 16px;
                                font-weight: 500;
                                letter-spacing: 0;
                                line-height: 19px;margin-left:175px;margin-top:-35px;" id="Ceffectuer">XXXX

                            </p>
                            <p style="margin-left:215px;margin-top:-35px;color: #00B517;
                            ;
                              font-family: Roboto;
                              font-size: 16px;
                              font-weight: 500;">
                                <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="#00B517" class=" bi bi-caret-up-fill " viewBox="0 0 16 16 ">
                                <path d="m7.247 4.86-4.796 5.481c-.566.647-.106 1.659.753 1.659h9.592a1 1 0 0 0 .753-1.659l-4.796-5.48a1 1 0 0 0-1.506 0z "/>
                              </svg> </p>
                            <p style="margin-left:230px;margin-top:-30px;  color: #00B517;
                            font-family: Roboto;
                            font-size: 10px;
                            font-weight: 500;
                            letter-spacing: 0;
                            line-height: 11px;
                          ">100%</p>

                        </article>

                        </aside>

                        {{-- Les canvas (Tableaux) --}}





                        <section style="display: none;width:800px;height:300px;margin-left:60px;padding:0px;" id="Chart">
                            <canvas id="myChart" style="height:300px!important;width:800px!important;margin-top:20px;margin-right:20px;"></canvas>
                        </section>

                        <section style="display: none;width:800px;height:300px;margin-left:40px;" id="Chart2">
                            <canvas id="myChart2" style="height:300px!important;width:800px!important;margin-top:20px;margin-right:20px;"></canvas>
                        </section>

                        <section style="display:none;width:800px;height:300px;margin-left:40px;" id="Chart3">
                            <canvas id="myChart3" style="height:300px!important;width:800px!important;margin-top:20px;margin-right:20px;"></canvas>
                        </section>







                    </section>
                </div>
            </div>
        </div>
    </div>


            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js " integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM " crossorigin="anonymous "></script>


            <script>

                    // $('#Chart').empty(); // this is my <canvas> element
                    // $('#Chart').append(<canvas id="myChart" style="height:300px!important;width:800px!important;margin-top:20px;margin-right:20px;"></canvas>`);

                    jQuery(document).ready(function () { //gerer-equipe-menu

                        // $(document).on('click', '#gerer-equipe-menu', function (e) {


                        // })

                        $('#gerer-equipe-menu-later').click(function() {
                            var DevisesUser2 = sessionStorage.getItem("devises");
                            $('#tbg').empty();
                            $('#flexCheckIndeterminate1').prop('checked', true);
                            $('#flexCheckIndeterminate2').prop('checked', false);
                            $('#flexCheckIndeterminate3').prop('checked', false);

                            var datums=[];
                            var datumt=[];
                            var datumC=[];


                            $('#entetetab1').css('display', 'block');
                            $('#Chart').css('display', 'block');

                            var Lurla = '/gestion';
                            $.ajax({
                                type: "GET",
                                url: Lurla,
                                success: function (response) {
                                    if(response.price[0].length == 0){
                                        $('#tbg').text(0 + ' '+ DevisesUser2);

                                    }else{

                                        $('#tbg').text(response.price[0].totalPriceQuantity + ' '+ DevisesUser2);

                                    }


                                    $('#stock').empty();
                                    $('#stock1').empty();
                                    $('#stock2').empty();
                                    $('#stock3').empty();
                                    $('#sortant').empty();
                                    $('#commande_recu').empty()
                                    $('#Newcommande').empty()
                                    $('#Ceffectuer').empty()

                                    $('#today').empty();
                                    $('#C_encours').empty();
                                    $('#passer').empty();
                                    $('#kanceled').empty();
                                    //--------------------------
                                    $('#stock').text(response.stats)
                                    $('#stock1').text(response.stats)
                                    $('#stock2').text(response.stats)
                                    $('#stock3').text(response.stats)

                                    $('#today').text(response.today) ;
                                    $('#sortant').text(response.produit_sortant);
                                    $('#C_encours').text(response.command_encours_today);
                                    $('#Newcommande').text(response.commande_recu_aujourdhui);

                                    $('#commande_recu').text(response.commande_recu_aujourdhui);

                                    $('#passer').text(response.commande_effectuee);
                                    $('#Ceffectuer').text(response.commande_effectuee);

                                    $('#kanceled').text(response.commande_cancelled);



                                    var xValue1=[];
                                    var Psortant=[];

                                    if(response.produit_entrant_jour.length == 0){

                                        xValue1 = ["1:00","2:00","3:00","4:00","5:00","6:00","7:00","8:00", "9:00", "10:00", "11:00", "12:00", "13:00", "14:00", "15:00", "16:00", "17:00", "18:00", "19:00", "20:00", "21:00", "22:00", "23:00", "24:00"];

                                    }else{
                                        _.each(response.produit_entrant_jour, function(model){
                                            var test =moment(model.created_at).format('HH:MM');
                                            console.log(test);
                                                datums.push(model.quantite);
                                                xValue1.push(test);
                                         });

                                    }


                                    _.each(response.produit_sortant_graph, function(model){

                                                Psortant.push(model.quantite);

                                    });






                                    new Chart("myChart", {
                                        type: "line",
                                        data: {
                                            labels: xValue1,
                                            datasets: [{
                                                data: datums,
                                                borderColor: "green",
                                                height:1,
                                                fill: true,
                                                backgroundColor: "transparent"

                                            },{
                                                data: Psortant,
                                                borderColor: "red",
                                                height:1,
                                                fill: true,
                                                backgroundColor: "transparent"

                                            }]
                                        },
                                        options: {
                                            legend: {
                                                display: false
                                            }
                                        }
                                    });


                                    //------------------------------------------------------------------
                                    datumt.push(response.commande_jour);


                                    var xValue2 = ["8:00", "9:00", "10:00", "11:00", "12:00", "13:00", "14:00", "15:00", "16:00", "17:00",
                                                "18:00", "19:00", "20:00", "21:00", "22:00", "23:00", "24:00"];

                                    new Chart("myChart2", {
                                        type: "line",
                                        data: {
                                            labels: xValue2,
                                            datasets: [{
                                                data: datumt,
                                                borderColor: "blue",
                                                height: 1.5,
                                                fill: true,
                                                opacity: 0.4,
                                                backgroundColor: "transparent",

                                            },]
                                        },
                                        options: {
                                            legend: {
                                                display: false
                                            }
                                        }
                                    });

                                 //------------------------------------------------------------------
                                 datumC.push(response.commande_effectuer_jour);


                                  var xValue02 =["8:00", "9:00", "10:00", "11:00", "12:00", "13:00", "14:00", "15:00", "16:00", "17:00",
                                                "18:00", "19:00", "20:00", "21:00", "22:00", "23:00", "24:00"];

                                  new Chart("myChart3", {
                                      type: "line",
                                      data: {
                                          labels: xValue02,
                                          datasets: [{
                                              data: datumC,
                                              borderColor: "blue",
                                              height: 1.5,
                                              fill: true,
                                              opacity: 0.4,
                                              backgroundColor: "transparent",

                                          }, ]
                                      },
                                      options: {
                                          legend: {
                                              display: false
                                          }
                                      }
                                  });





                                },
                            });
                        })







                            $('.one-checkG').click(function(){

                                var week=[];
                                var mois=[];
                                var cweek=[];
                                var sortant=[];

                                var commandeM=[];
                                var pro_sortant_mois=[];
                                var Ceffect=[];
                                var testTab=[];
                                var xValues5=[]
                                var commande=[];
                                var commande_encours_semaine=[];
                                var commande_encours_mois=[];

                                var Gmonths = ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov","Dec"];
                                var xValues04 = ["Jan", "Fev", "Mar", "Avr", "Mai", "Jui", "Juill", "Aout", "Sep", "Oct", "Nov","Dec"];
                                var xValues6 = ["8:00", "9:00", "10:00", "11:00", "12:00", "13:00", "14:00", "15:00", "16:00", "17:00",
                                                "18:00", "19:00", "20:00", "21:00", "22:00", "23:00", "24:00"];

                                var xValues08 = ["8:00", "9:00", "10:00", "11:00", "12:00", "13:00", "14:00", "15:00", "16:00", "17:00",
                                                "18:00", "19:00", "20:00", "21:00", "22:00", "23:00", "24:00"];

                                var xValues3 = ["dimanche", "Lundi", "Mardi", "Mercredi", "Jeudi", "Vendredi", "Samedi"];
                                var xValues03 = ["dimanche", "Lundi", "Mardi", "Mercredi", "Jeudi", "Vendredi", "Samedi"];
                                var xValues05 = ["dimanche", "Lundi", "Mardi", "Mercredi", "Jeudi", "Vendredi", "Samedi"];





                                    $(this).prop('checked', true);
                                    $.each($('.one-checkG').not($(this)), function(key, value) {
                                        $(value).prop('checked', false);
                                    })

                                    var Lurlf = '/gestion/';

                                    var digit= $(this).val();

                                    $.ajax({
                                    type: "GET",
                                    url: Lurlf+ $(this).val(),
                                    success: function (response) {


                                        var BoutiqueCreated =response.boutique_created;

                                        $('#today').empty();
                                        $('#sortant').empty();
                                        $('#C_encours').empty();
                                        $('#commande_recu').empty();
                                        $('#Ceffectuer').empty();
                                        $('#passer').empty();
                                        $('#kanceled').empty();


                                        $('#today').text(response.filter)
                                        $('#sortant').text(response.sold)
                                        $('#C_encours').text(response.commande_encours)


                                        $('#commande_recu').text(response.commande_recu );
                                        $('#Ceffectuer').text(response.commande_effectuer);
                                        $('#passer').text(response.commande_effectuer);
                                        $('#kanceled').text(response.commande_annulled);






                                     //--------------------------GRAPH SEMAINE--------------------------


                                        if(digit == 2){

                                            console.log(" WEEK 002");


                                            _.each(response.produits_entrant_graph, function(model){
                                                week.push(model.quantite)
                                            });

                                            _.each(response.produit_sortant_graph, function(model){
                                                sortant.push(model.quantite)
                                            });




                                            new Chart("myChart", {
                                                type: "line",
                                                data: {
                                                    labels: xValues3,
                                                    datasets: [{
                                                        data: week,
                                                        borderColor: "green",
                                                        height:1,
                                                        fill: true,
                                                        backgroundColor: "transparent"

                                                    },{
                                                        data: sortant,
                                                        borderColor: "red",
                                                        height:1,
                                                        fill: true,
                                                        backgroundColor: "transparent"

                                                    }, ]
                                                },
                                                options: {
                                                    legend: {
                                                        display: false
                                                    }
                                                }
                                            });



                                        //-----------------Commande par SEMAINE------------------------------------


                                            cweek.push(response.commande_graph);
                                            commande_encours_semaine.push(response.commande_encours);


                                                new Chart("myChart2", {
                                                    type: "line",
                                                    data: {
                                                        labels: xValues03,
                                                        datasets: [{
                                                            data: cweek,
                                                            borderColor: "green",
                                                            height: 1.5,
                                                            fill: true,
                                                            opacity: 0.4,
                                                            backgroundColor: "transparent",

                                                        }, {
                                                            data: commande_encours_semaine,
                                                            borderColor: "orange",
                                                            height: 1.5,
                                                            fill: true,
                                                            opacity: 0.4,
                                                            backgroundColor: "transparent",

                                                        }]
                                                    },
                                                    options: {
                                                        legend: {
                                                            display: false
                                                        }
                                                    }
                                                });





                                        //-----------------Commande EFFECTUEE par SEMAINE------------------------------------



                                                Ceffect.push(response.commande_effectuer_graph);


                                                new Chart("myChart3", {
                                                    type: "line",
                                                    data: {
                                                        labels: xValues05,
                                                        datasets: [{
                                                            data: Ceffect,
                                                            borderColor: "blue",
                                                            height: 1.5,
                                                            fill: true,
                                                            opacity: 0.4,
                                                            backgroundColor: "transparent",

                                                        }, ]
                                                    },
                                                    options: {
                                                        legend: {
                                                            display: false
                                                        }
                                                    }
                                                });

                                    }// fin if




                                    //--------------------------GRAPH MOIS---------------------------

                                    if(digit == 3){

                                        console.log("MONTH 003");



                                            pro_sortant_mois.push(response.produit_sortant_graph)
                                            pro_sortant_mois.push(0)
                                            mois.push(response.produits_entrant_graph)
                                            mois.push(0)




                                             _.each(Gmonths, function(model, index){
                                                if(index >= (BoutiqueCreated - 1)){
                                                    testTab.push(model)
                                                }

                                             });



                                            commandeM.push(response.commande_graph);



                                            new Chart("myChart", {
                                                type: "line",
                                                data: {
                                                    labels: testTab,
                                                    datasets: [{
                                                        data: mois,
                                                        borderColor: "green",
                                                        height:1,
                                                        fill: true,
                                                        backgroundColor: "transparent"

                                                    }, {
                                                        data: pro_sortant_mois,
                                                        borderColor: "red",
                                                        height:1,
                                                        fill: true,
                                                        backgroundColor: "transparent"

                                                    },]
                                                        },
                                                        options: {
                                                            legend: {
                                                                display: false
                                                            }
                                                        }
                                                });




                                            //----------------------------Commande MOIS---------------------------

                                            commande_encours_mois.push(response.commande_encours);


                                               new Chart("myChart2", {
                                                    type: "line",
                                                    data: {
                                                        labels: testTab,
                                                        datasets: [{
                                                            data:  commandeM,
                                                            borderColor: "green",
                                                            height:1,
                                                            fill: true,
                                                            backgroundColor: "transparent"

                                                        },{
                                                            data:  commande_encours_mois,
                                                            borderColor: "orange",
                                                            height:1,
                                                            fill: true,
                                                            backgroundColor: "transparent"

                                                        } ]
                                                            },
                                                            options: {
                                                                legend: {
                                                                    display: false
                                                                }
                                                            }
                                                });

                                    //-----------------------COMMAND EFFECTUEE MOIS-------------------------------------

                                                var Ceffect1=[];
                                                Ceffect1.push(response.commande_effectuer_graph);


                                                new Chart("myChart3", {
                                                    type: "line",
                                                    data: {
                                                        labels: testTab,
                                                        datasets: [{
                                                            data: Ceffect1,
                                                            borderColor: "blue",
                                                            height: 1.5,
                                                            fill: true,
                                                            opacity: 0.4,
                                                            backgroundColor: "transparent",

                                                        }, ]
                                                    },
                                                    options: {
                                                        legend: {
                                                            display: false
                                                        }
                                                    }
                                                });




                                        } // fin if

                                    //--------------------------GRAPH DAY---------------------------


                                    if(digit == 1){
                                        console.log(" DAYS 001");

                                        mois=[];


                                        if(response.produits_entrant_graph.length == 0){

                                            xValues5 = ["1:00","2:00","3:00","4:00","5:00","6:00","7:00","8:00", "9:00", "10:00", "11:00", "12:00", "13:00", "14:00", "15:00", "16:00", "17:00", "18:00", "19:00", "20:00", "21:00", "22:00", "23:00", "24:00"];

                                        }else{
                                                _.each(response.produits_entrant_graph, function(model){
                                                    var test =moment(model.created_at).format('HH:MM');

                                                    mois.push(model.quantite);
                                                        xValues5.push(test);
                                                });

                                            }



                                        commande.push(response.commande_graph)


                                        new Chart("myChart", {
                                            type: "line",
                                            data: {
                                                labels: xValues5,
                                                datasets: [{
                                                    data: mois,
                                                    borderColor: "green",
                                                    height:1,
                                                    fill: true,
                                                    backgroundColor: "transparent"

                                                }, ]
                                                    },
                                                    options: {
                                                        legend: {
                                                            display: false
                                                        }
                                                    }
                                            });

                                            //-----------------Commande par JOUR------------------------------------





                                            new Chart("myChart2", {
                                                type: "line",
                                                data: {
                                                    labels: xValues6,
                                                    datasets: [{
                                                        data: commande,
                                                        borderColor: "blue",
                                                        height: 1.5,
                                                        fill: true,
                                                        opacity: 0.4,
                                                        backgroundColor: "transparent",

                                                    }, ]
                                                },
                                                options: {
                                                    legend: {
                                                        display: false
                                                    }
                                                }
                                            });

                                        //-----------------------COMMAND EFFECTUEE MOIS-------------------------------------

                                        var Ceffect2=[];
                                        Ceffect2.push(response.commande_effectuer_graph);


                                                new Chart("myChart3", {
                                                    type: "line",
                                                    data: {
                                                        labels: xValues08,
                                                        datasets: [{
                                                            data: Ceffect1,
                                                            borderColor: "blue",
                                                            height: 1.5,
                                                            fill: true,
                                                            opacity: 0.4,
                                                            backgroundColor: "transparent",

                                                        }, ]
                                                    },
                                                    options: {
                                                        legend: {
                                                            display: false
                                                        }
                                                    }
                                                });

                                        } // fin if




                                    },
                                });
                            })

                    })






//var datum =[40, 10, 40, 15, 700, 300, 500]

// var xValues = ["Lundi", "Mardi", "Mercredi", "Jeudi", "Vendredi", "Samedi", "Dimanche"];


// new Chart("myChart", {
//     type: "line",
//     data: {
//         labels: xValues,
//         datasets: [{
//             data: datums,
//             borderColor: "green",
//             height:1,
//             fill: true,
//             backgroundColor: "transparent"

//         }, ]
//     },
//     options: {
//         legend: {
//             display: false
//         }
//     }
// });


// var xValues = ["dimanche", "Lundi", "Mardi", "Mercredi", "Jeudi", "Vendredi", "Samedi"];

// new Chart("myChart2", {
//     type: "line",
//     data: {
//         labels: xValues,
//         datasets: [{
//             data: [40, 20, 10, 20, 100, 30, 110, 50, 100, 8,50],
//             borderColor: "blue",
//             height: 1.5,
//             fill: true,
//             opacity: 0.4,
//             backgroundColor: "transparent",

//         }, ]
//     },
//     options: {
//         legend: {
//             display: false
//         }
//     }
// });


// var xValues = ["dimanche", "Lundi", "Mardi", "Mercredi", "Jeudi", "Vendredi", "Samedi"];

// new Chart("myChart3", {
//     type: "line",
//     data: {
//         labels: xValues,
//         datasets: [{
//             data: [40, 200, 40, 510, 600, 300, 1100, 330, 800, 1000, 500,600],
//             borderColor: "red",
//             height:1,
//             fill: true,
//             backgroundColor: "transparent"



//         }, ]
//     },
//     options: {
//         legend: {
//             display: false
//         }
//     }
// });





</script>
