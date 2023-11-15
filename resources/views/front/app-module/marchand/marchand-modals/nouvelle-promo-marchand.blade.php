
<style>
    @import url('https://fonts.googleapis.com/css2?family=Roboto&display=swap');
    .modal-content-nouvelle-promo-marchand,
    .modal-body-nouvelle-promo-marchand {
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

    .modal-dialog-nouvelle-promo-marchand {
        position: relative;
        height: 579px;
        left: -350px;
        top: 60px;
    }

    .form-control {
        font-size: 14px;
        color: #9B9B9B;
    }

    .form-select {
        font-size: 14px;
        color: black;
    }

    #col:hover {
        border-radius:6px;
        box-shadow: 0 0 4px 0 rgba(0, 0, 0, 0.5);
    }

    .scrollprom {
    overflow-x: scroll;
    white-space: nowrap;
    overflow-y: hidden;
    }

    .lol2:hover {
    background-color: rgba(184, 233, 134, 0.35);
}
    div.scrollprom {
        display: inline-block;
        float: none;
        width: 720px !important;
        height:252px !important;
    }

    div.scrollprom::-webkit-scrollbar {
        height: 4px;
        background-color: transparent;
    }
</style>


    <!-- The Modal -->
    <div class="modal modal-marchand-close" id="nouvellePromo">
        <div class="modal-dialog modal-dialog-nouvelle-promo-marchand">
            <div class="modal-content modal-content-nouvelle-promo-marchand">
                <div style="margin-top:5px;">
                    @include('front.app-module.marchand.marchand-modals.marchand-profil-data')

                        <div style="border:1px solid #D8D8D8;border-radius: 5px;margin-top:-80px;position: absolute;margin-left: 334px; width:873px;height: 80px;background-color: white; display: flex; flex-direction: column; justify-content: center; align-items: center">

                                                @auth
@if (\Illuminate\Support\Facades\Auth::user()->role == 2)



<div class="historique-code" id="gerer-equipe-menu">
    <li  data-id="infomarch" class="marie" style="margin-left:0px;"><img src="assets/images/icones-vendeurs2/icones-menu/info-marche.svg"><br><br><p style="margin-top:3px ;">Info. du <br> marché</p></li>
    <li  data-id="gererEquipe" class="marie" ><img src="assets/images/icones-vendeurs2/icones-menu/gestionequipe.svg"><br><br><p style="margin-top:2px">Gestion d'équipe</p></li>
    <li  class="marie"><img src="assets/images/icones-vendeurs2/icones-menu/gestionstock.svg"><br><br><p style="margin-top:2px">Gestion <br>de  stocks</p></li>
    <li data-id="msgMarchand" class="marie"><img src="assets/images/icones-vendeurs2/icones-menu/messagerie.svg"><br><br><br><p style="margin-top:2px">Messagerie</p></li>
    <li data-id="commandedet" class="marie"><img src="assets/images/icones-vendeurs2/icones-menu/commande.svg"><br><br><p style="margin-top:3px">Mes <br>commandes</p></li>
    <li  data-id="modePaiementMarchand1" style="margin-bottom" class="marie"><img src="assets/images/icones-vendeurs2/icones-menu/paiement.svg" ><br><p style="margin-top:15px;">Mode de <br> paiements<p></li>
    <li data-id="tbMarchand" class="marie" ><img src="assets/images/icones-vendeurs2/icones-menu/gestion.svg"><br><br><p style="margin-top:2px">Tableau <br>de gestions</p></li>
    <li  data-id="historiqueCode" data-id="genererCode" class="marie"><img src="assets/images/icones-vendeurs2/icones-menu/codepromo.svg"><br><br><p style="margin-top:2px">Historique <br>de codes</p></li>
    <li  data-id="nouvellePromo" class="marie" style="color: #1A7EF5;border:1px solid #1A7EF5;background-color:#F8F8F8"><img src="assets/images/icones-vendeurs2/icones-menu/promobleu.svg"><br><br><p style="margin-top:2px">Créer<br>une promo</p></li>
    <li  data-id = "articleCorbeille" class="marie"><img src="assets/images/icones-vendeurs2/icones-menu/corbeille.svg"><br><br><br><p style="margin-top:2px">Corbeille</p></li>
    <li  data-id="gestMenu" class="marie"><img src="assets/images/icones-vendeurs2/icones-menu/gestionmenu.svg"><br><br><p style="margin-top:2px">Gestion <br>des menus</p></li>

</div>
@elseif (\Illuminate\Support\Facades\Auth::user()->role == 4) {{-- Editeur --}}
<div class="historique-code" id="gerer-equipe-menu">
    <li  data-id="infomarch" class="marie" style="margin-left:0px;"><><img src="assets/images/icones-vendeurs2/icones-menu/info-marche.svg"><br><br>Info. du <br> marché</li>
    <li  data-id="gererEquipe" class="marie" style="pointer-events:none;opacity:0.6;"><img src="assets/images/icones-vendeurs2/icones-menu/gestionequipe.svg"><br><br>Gestion d'équipe</li>
    <li  class="marie" style="pointer-events:none;opacity:0.6;"><img src="assets/images/icones-vendeurs2/icones-menu/gestionstock.svg"><br><br>Gestion <br>de stocks</li>
    <li data-id="msgMarchand"  class="marie" style="pointer-events:none;opacity:0.6;"><img src="assets/images/icones-vendeurs2/icones-menu/messagerie.svg"><br><br><br>Messagerie</li>
    <li data-id="commandedet" class="marie"><img src="assets/images/icones-vendeurs2/icones-menu/commande.svg"><br><br><p style="margin-top:3px">Mes <br>commandes</p></li>
    <li  data-id="modePaiementMarchand1" class="marie" style="pointer-events:none;opacity:0.6;"><img src="assets/images/icones-vendeurs2/icones-menu/paiement.svg" ><br><br><br>Mode de <br>paiements</li>
    <li  class="marie" data-id="tbMarchand"  ><img src="assets/images/icones-vendeurs2/icones-menu/gestion.svg"><br><br>Tableau <br>de gestions</li>
    <li  data-id="historiqueCode" data-id="genererCode" class="marie" style="pointer-events:none;opacity:0.6;"><img src="assets/images/icones-vendeurs2/icones-menu/codepromo.svg"><br><br>Historique <br>de codes</li>
    <li  data-id="nouvellePromo" class="marie" style="color: #1A7EF5"><img src="assets/images/icones-vendeurs2/icones-menu/promobleu.svg"><br><br>Créer <br> une promo</li>
    <li  data-id = "articleCorbeille" class="marie"><img src="assets/images/icones-vendeurs2/icones-menu/corbeille.svg"><br><br><br>Corbeille</li>
    <li  data-id="gestMenu" class="marie"><img src="assets/images/icones-vendeurs2/icones-menu/gestionmenu.svg" style="pointer-events:none;opacity:0.6;"><br><br>Gestion <br>des menus</li>
</div>
@elseif (\Illuminate\Support\Facades\Auth::user()->role == 5) {{-- Demarcheur --}}
<div class="gerer-equipe-menu" id="gerer-equipe-menu">
    <li  data-id="infomarch" class="marie"style="margin-left:0px;"><><img src="assets/images/icones-vendeurs2/icones-menu/info-marche.svg"><br><br>Info.du <br> marché</li>
    <li  data-id="gererEquipe" class="marie" style="pointer-events:none;opacity:0.6;"><img src="assets/images/icones-vendeurs2/icones-menu/gestionequipe.svg"><br><br>Gestion d'équipe</li>
    <li  class="marie" style="pointer-events:none;opacity:0.6;"><img src="assets/images/icones-vendeurs2/icones-menu/gestionstock.svg"><br><br>Gestion <br>de stocks</li>
    <li data-id="commandedet" class="marie"><img src="assets/images/icones-vendeurs2/icones-menu/commande.svg"><br><br><p style="margin-top:3px">Mes <br>commandes</p></li>
    <li data-id="commandedet" class="marie" style="pointer-events:none;opacity:0.6;"><img src="assets/images/icones-vendeurs2/icones-menu/commande.svg"><br><br>Mes <br>boutiques</li>
    <li  data-id="modePaiementMarchand1" class="marie" style="pointer-events:none;opacity:0.6;"><img src="assets/images/icones-vendeurs2/icones-menu/paiement.svg" ><br><br><br>Mode de <br>paiements</li>
    <li data-id="tbMarchand"  class="marie" style="pointer-events:none;opacity:0.6;"><img src="assets/images/icones-vendeurs2/icones-menu/gestion.svg"><br><br>Tableau <br>de gestions</li>
    <li  data-id="historiqueCode" data-id="genererCode" class="marie"><img src="assets/images/icones-vendeurs2/icones-menu/codepromo.svg"><br><br>Historique <br>de codes</li>
    <li  data-id="nouvellePromo" class="marie" style="pointer-events:none;opacity:0.6;"><img src="assets/images/icones-vendeurs2/icones-menu/promobleu.svg"><br><br>Créer <br>une promo</li>
    <li  data-id = "articleCorbeille" class="marie" style="pointer-events:none;opacity:0.6;"><img src="assets/images/icones-vendeurs2/icones-menu/corbeille.svg"><br><br><br>Corbeille</li>
    <li  data-id="gestMenu" class="marie" style="pointer-events:none;opacity:0.6;"><img src="assets/images/icones-vendeurs2/icones-menu/gestionmenu.svg"><br><br>Gestion <br>des menus</li>
</div>
@elseif (\Illuminate\Support\Facades\Auth::user()->role == 6) {{-- Membre --}}
<div class="gerer-equipe-menu" id="gerer-equipe-menu">
    <li  data-id="infomarch" class="marie" style="color: #1A7EF5;margin-left:0px;"><img src="assets/images/icones-vendeurs2/icones-menu/info-marche.svg"><br><br>Info.<br> du marché</li>
    <li  data-id="gererEquipe" class="marie" style="pointer-events:none;opacity:0.6;"><img src="assets/images/icones-vendeurs2/icones-menu/gestionequipe.svg"><br><br>Gestion d'équipe</li>
    <li  class="marie" style="pointer-events:none;opacity:0.6;"><img src="assets/images/icones-vendeurs2/icones-menu/gestionstock.svg"><br><br>Gestion <br>de stocks</li>
    <li data-id="commandedet" class="marie"><img src="assets/images/icones-vendeurs2/icones-menu/commande.svg"><br><br><p style="margin-top:3px">Mes <br>commandes</p></li>
    <li  class="marie" style="pointer-events:none;opacity:0.6;"><img src="assets/images/icones-vendeurs2/icones-menu/commande.svg"><br><br>Mes<br> boutiques</li>
    <li  data-id="modePaiementMarchand" class="marie" ><img src="assets/images/icones-vendeurs2/icones-menu/paiement.svg" ><br><br><br>Mode <br>de paiements</li>
    <li data-id="tbMarchand"  class="marie" style="pointer-events:none;opacity:0.6;"><img src="assets/images/icones-vendeurs2/icones-menu/gestion.svg"><br><br>Tableau <br>de gestions</li>
    <li  data-id="historiqueCode" data-id="genererCode" class="marie" style="pointer-events:none;opacity:0.6;"><img src="assets/images/icones-vendeurs2/icones-menu/codepromo.svg"><br><br>Historique <br>de codes</li>
    <li  data-id="nouvellePromo" class="marie" style="pointer-events:none;opacity:0.6;"><img src="assets/images/icones-vendeurs2/icones-menu/promobleu.svg"><br><br>Créer <br>une promo</li>
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
<li data-id="tbMarchand" class="marie" ><img src="assets/images/icones-vendeurs2/icones-menu/gestion.svg"><br><br>Tableau <br>de gestions</li>
<li  data-id="historiqueCode"  class="marie" ><img src="assets/images/icones-vendeurs2/icones-menu/codepromo.svg"><br><br>Historique <br> de codes</li>
<li  data-id="nouvellePromo" class="marie" style="color: #1A7EF5;border:1px solid #1A7EF5;background-color:#F8F8F8"><img src="assets/images/icones-vendeurs2/icones-menu/promobleu.svg"><br><br>Créer <br>une promo</li>
<li  data-id = "articleCorbeille" class="marie"><img src="assets/images/icones-vendeurs2/icones-menu/corbeille.svg"><br><br><br>Corbeille</li>
<li  data-id="gestMenu" class="marie"><img src="assets/images/icones-vendeurs2/icones-menu/gestionmenu.svg"><br><br>Gestion <br>des menus</li>
</div>
@else
<div class="gerer-equipe-menu" id="gerer-equipe-menu">
    <li  data-id="infomarch" class="marie" style="color: #1A7EF5;margin-left:0px;"><img src="assets/images/icones-vendeurs2/icones-menu/info-marche.svg"><br><br>Info. du<br> marché</li>
    <li  data-id="gererEquipe" class="marie" style="pointer-events:none;opacity:0.6;"><img src="assets/images/icones-vendeurs2/icones-menu/gestionequipe.svg"><br><br>Gestion d'équipe</li>
    <li  class="marie" style="pointer-events:none;opacity:0.6;"><img src="assets/images/icones-vendeurs2/icones-menu/gestionstock.svg"><br><br>Gestion <br>de stocks</li>
    <li data-id="msgMarchand"  class="marie" style="pointer-events:none;opacity:0.6;"><img src="assets/images/icones-vendeurs2/icones-menu/messagerie.svg"><br><br><br>Messagerie</li>
    <li data-id="commandedet" class="marie"><img src="assets/images/icones-vendeurs2/icones-menu/commande.svg"><br><br><p style="margin-top:3px">Mes <br>commandes</p></li>
    <li  data-id="modePaiementMarchand1" class="marie" style="pointer-events:none;opacity:0.6;"><img src="assets/images/icones-vendeurs2/icones-menu/paiement.svg" ><br><br><br>Mode de <br> paiements</li>
    <li data-id="tbMarchand"  class="marie" style="pointer-events:none;opacity:0.6;"><img src="assets/images/icones-vendeurs2/icones-menu/gestion.svg"><br><br>Tableau <br> de gestions</li>
    <li  data-id="historiqueCode" data-id="genererCode" class="marie" style="pointer-events:none;opacity:0.6;"><img src="assets/images/icones-vendeurs2/icones-menu/codepromo.svg"><br><br>Historique<br> de codes</li>
    <li  data-id="nouvellePromo" class="marie" style="pointer-events:none;opacity:0.6;"><img src="assets/images/icones-vendeurs2/icones-menu/promobleu.svg"><br><br>Créer <br>une promo</li>
    <li  data-id = "articleCorbeille" class="marie" style="pointer-events:none;opacity:0.6;"><img src="assets/images/icones-vendeurs2/icones-menu/corbeille.svg"><br><br><br>Corbeille</li>
    <li  data-id="gestMenu" class="marie" style="pointer-events:none;opacity:0.6;"><img src="assets/images/icones-vendeurs2/icones-menu/gestionmenu.svg"><br><br>Gestion <br> des menus</li>
</div>
@endif
@endauth


                    </div>
                </div>
                        <div style="border:1px solid #D8D8D8;width:854px; height:39px;border-top-left-radius:5px;margin-left:5px;margin-top: 10px; background-color: white;">
                            <h4 style=" font-size: 18px;color:#191970; border: 1px; margin-top:10px;text-align: left;padding-left:10px; font-weight: 500;
                            letter-spacing: 0;
                            line-height: 19px "id="leftnouvellepromo">
                                Nouvelle promotion
                            </h4>
                            <h4 style=" font-size: 18px;color:#191970; border: 1px; margin-top:10px;text-align: left;padding-left:10px; font-weight: 500;
                            letter-spacing: 0;
                            line-height: 19px ;display:none;"id="leftnouvellepromo2">
                                Quel rayon profite de votre promotion ?
                            </h4>
                            <h4 style=" font-size: 18px;color:#191970; border: 1px; margin-top:10px;text-align: left;padding-left:10px; font-weight: 500;
                            letter-spacing: 0;
                            line-height: 19px ;display:none;"id="leftnouvellepromo3">
                            Sélection des produits en solde
                        </h4>
                        </div>
                        <div style="border-top:1px solid #D8D8D8; border-right: 1px solid #D8D8D8; border-bottom:1px solid #D8D8D8;width:347px;height:39px ;border-left:1px solid #D8D8D8; margin-left:858px; border-top-right-radius:5px;margin-top: -39px; background-color: white;opacity:0.5;pointer:none; "id="rightliste">
                            <h4 style="font-size: 18px;color:#191970; border: 1px; margin-top:10px;;text-align: left;margin-left:10px; " >
                                Ma liste
                            </h4>
                        </div>

                            <div style="border-left:1px solid #D8D8D8;width: 854px;margin-left:5px;height:36px; ">
                            <p style="color: #191970; text-align:left;font-size: 11px; padding-left: 30px;margin-top:10.5px; ">Faire de vos produits le centre d’interet et attirer une nouvelle clientelle.</p>
                        </div>

                        <div style="border-right:1px solid #D8D8D8; border-left:1px solid #d8D8D8;border-top: 1px;border-bottom: 1px ;height: 36px;margin-right: 5px; width:347px;margin-left:858px;margin-top:-36px;pointer:none;opacity:0.5;"id="rightprodselecpromo">
                            <p style="color: #191970;font-size: 11px; text-align:left; margin-left:30px;margin-top:10.5px;">Produits sélectionnés pour la promotion</p>
                        </div>




                        <div  style="background-color:white;border:1px solid #D8D8D8;width: 854px;height: 404px; margin-left:5px; padding-top: 10px; padding-bottom: 30px; border-bottom-left-radius: 5px;">
                            <div class="container " style="background-color: #F8F8F8 ; width: 720px;height: 252px; margin-left: 68px;margin-top: 34px;margin-right: 50px; padding-top:40px;padding-left: 80px;border-radius:6px; " id="leftfirstpromo">

                                <div class="row " style="padding-top:10px;">
                                    <div class="col ">
                                        <label for="exampleFormControlInput1 " class="form-label " style="text-align: center; color:black;font-size: 14px;   font-weight: 500;
                                        letter-spacing: 0.31px;
                                        line-height: 18px;
                                        text-align: center;
                                        ">Nom de la promotion</label>
                                        <input type="text " class="form-control " id="# " placeholder="Exemple: Promo des fêtes " style="background-color: white; width: 256px; height: 41px; border-radius:6px;font-size:14px;margin-top:-5px;color:#A4A4A4"><br>

                                        <label for="exampleFormControlInput1 " class="form-label " style="text-align: center; color:black; font-size: 14px;   font-weight: 500;
                                        letter-spacing: 0.31px;
                                        line-height: 18px;
                                        text-align: center;
                                        ">Type de promotion</label>
                                        <select style="background-color: white; width: 256px; height: 41px;border-radius:6px;font-size:14px;padding-left:10px;margin-top:-5px;color:black ;">
                                            <option selected>Produit multiple</option>
                                            <option>Produit neutre</option>
                                        </select>
                                    </div>


                                    <div class="col ">
                                        <label class="form-label " style="text-align: center; color:black; font-size: 14px;  font-weight: 500;
                                        letter-spacing: 0.31px;
                                        line-height: 18px;
                                        text-align: center;
                                        ">Durée de la promotion</label>
                                        <select  style="background-color: white;  width: 256px; height: 41px;border-radius:6px;font-size:14px;padding-left:10px;margin-top:-5px;color:black">
                                            <option selected>1 semaine (Minumum)</option>
                                            <option>2 semaines</option>
                                        </select> <br>

                                        <label for="exampleFormControlInput1 " class="form-label " style="text-align: center; color:black; font-size: 14px;margin-top:25px;  font-weight: 500;
                                        letter-spacing: 0.31px;
                                        line-height: 18px;
                                        text-align: center;
                                        ">Remise de la promotion</label>
                                        <div style="margin-top:-5px;">
                                            <input type="text " style=" height: 41px;border-top-left-radius:6px;border-bottom-left-radius: 6px;width:159px;border-right:transparent;padding:10px;border:1px solid #D8D8D8;color:#A4A4A4" >
                                            <select  style="background-color: white; height: 41px;border-top-right-radius:6px;border-bottom-right-radius:6px;font-size:14px;padding:10px;border:1px solid #D8D8D8;width:97px;margin-left:-4px;color:#A4A4A4">
                                                <option selected>-  %</option>
                                                <option>FCFA</option>
                                            </select>

                                        </div>


                                    </div>

                                </div>
                                </div>
                                {{-- 2nde cont promo --}}
                                <div class="container " style=" width: 720px;height: 252px; margin-left: 62px;margin-top: 34px; padding-top:20px;padding-left: 50px;display:none;border-radius:6px;background-color: #F8F8F8 ;" id="leftfirstpromo2">

                                    <div class="col" id="col1" style="  height: 85px!important;width:85px!important;padding-top:0.5px;padding-left:7px;
                                        ">
                                        <input class="form-check-input" type="checkbox" id="Checkbox1" style="position:relative;margin-left:2px;">
                                        <label for="Checkbox1" style="margin-top:-13px;">
                                        <img src="assets/images/icones-vendeurs2/Cartouches & tonner.svg" width="69px" height="69px" id="col" onclick="colborder1()"></label>

                                        </div>



                                        <div class="col" id="col2" style="  height: 85px!important;width:85px!important;padding-top:0.5px;padding-left:7px;margin-left:110px;margin-top:-85px;
                                        " >
                                            <input class="form-check-input" type="checkbox" id="Checkbox2" style="position: relative;margin-left:2px;;"><label for="Checkbox2">
                                            <img src="assets/images/icones-vendeurs2/Classements & Archives.svg" width="69px" height="69px" id="col" style="margin-top:-13px;" onclick="colborder2()"></label>
                                        </div>
                                        <div class="col" id="col3" style="  height: 85px!important;width:85px!important;padding-top:0.5px;padding-left:7px;margin-left:220px;margin-top:-82px; ">
                                            <input class="form-check-input" type="checkbox" id="Checkbox3" style="position: relative;margin-left:2px;;"><label for="Checkbox3">
                                            <img src="assets/images/icones-vendeurs2/Papeterie et fourniture.svg" width="69px" height="69px" id="col" style="margin-top:-13px;"onclick="colborder3()"></label>
                                        </div>
                                        <div class="col" id="col4" style="  height: 85px!important;width:85px!important;padding-top:0.5px;padding-left:7px;margin-left:330px;margin-top:-82px;" >
                                            <input class="form-check-input" type="checkbox" id="Checkbox4" style="position: relative;margin-left:2px;;"><label for="Checkbox4">
                                            <img src="assets/images/icones-vendeurs2/Telephonie & mobilité.svg" width="69px" height="69px" id="col" style="margin-top:-13px"onclick="colborder4()"></label>
                                        </div>

                                        <div class="col" id="col5" style="  height: 85px!important;width:85px!important;padding-top:0.5px;padding-left:7px;margin-left:440px;margin-top:-82px;">
                                            <input class="form-check-input" type="checkbox" id="Checkbox5" style="position: relative;margin-left:2px;;"><label for="Checkbox5">
                                            <img src="assets/images/icones-vendeurs2/Maroquinerie & cadeaux.svg" width="69px" height="69px" id="col" style="margin-top:-13px;"onclick="colborder5()"></label>
                                        </div>
                                        <div class="col" id="col6" style="  height: 85px!important;width:85px!important;padding-top:0.5px;padding-left:7px;margin-left:550px;margin-top:-82px;">
                                            <input class="form-check-input" type="checkbox" id="Checkbox6" style="position: relative;margin-left:2px;;"><label for="Checkbox6">
                                            <img src="assets/images/icones-vendeurs2/Livres & enseignements.svg" width="69px" height="69px" id="col" style="margin-top:-13px;"onclick="colborder6()"></label>
                                        </div>

                                    <br>

                                        <div class="col" id="col7" style="  height: 85px!important;width:85px!important;padding-top:0.5px;padding-left:7px;margin-left:5px;">
                                            <input class="form-check-input" type="checkbox" id="Checkbox7" style="position: relative;margin-left:2px;;"><label for="Checkbox7">
                                            <img src="assets/images/icones-vendeurs2/Bureautique & informatique.svg" width="69px" height="69px" id="col" style="margin-top:-13px;"onclick="colborder7()"></label>
                                        </div>
                                        <div class="col"id="col8" style="  height: 85px!important;width:85px!important;padding-top:0.5px;padding-left:7px;margin-left:110px;margin-top:-85px;">
                                            <input class="form-check-input" type="checkbox" id="Checkbox8" style="position: relative;margin-left:2px;;"><label for="Checkbox8">
                                            <img src="assets/images/icones-vendeurs2/Mobilier(Bureau).svg" width="69px" height="69px" id="col" style="margin-top:-13px;"onclick="colborder8()"></label>
                                        </div>
                                        <div class="col" id="col9" style="  height: 85px!important;width:85px!important;padding-top:0.5px;padding-left:7px;margin-left:220px;margin-top:-85px;">
                                            <input class="form-check-input" type="checkbox" id="Checkbox9" style="position: relative;margin-left:2px;;"><label for="Checkbox9">
                                            <img src="assets/images/icones-vendeurs2/Equipements & commerces.svg" width="69px" height="69px" id="col" style="margin-top: -13px;"onclick="colborder9()"></label>
                                        </div>
                                        <div class="col"id="col10" style="  height: 85px!important;width:85px!important;padding-top:0.5px;padding-left:7px;margin-left:330px;margin-top:-85px;">
                                            <input class="form-check-input" type="checkbox" id="Checkbox10" style="position: relative;margin-left:2px;;"><label for="Checkbox10">
                                            <img src="assets/images/icones-vendeurs2/Espace service.svg" width="69px" height="69px" id="col" style="margin-top:-13px;"onclick="colborder10()"></label>
                                        </div>
                                        <div class="col" id="col11" style="  height: 85px!important;width:85px!important;padding-top:0.5px;padding-left:7px;margin-left:440px;margin-top:-85px;">
                                            <input class="form-check-input" type="checkbox" id="Checkbox11" style="position: relative;margin-left:2px;;"><label for="Checkbox11">
                                            <img src="assets/images/icones-vendeurs2/Foutniture scolaire.svg" width="69px" height="69px" id="col" style="margin-top:-13px;"onclick="colborder11()"></label>
                                        </div>

                                    </div>

                    {{-- 3e Lancer la promo --}}
                    <div class="container scrollprom" style="background-color: #F8F8F8 ; margin-left: 62px;margin-top: 34px;margin-right: 25px; width:720px;height:252px; padding:3%;display:none;" id="leftfirstpromo3">

                        <div class="row" style="width: 1000px;">

                            {{-- Viandes --}}
                    <div class="col" style="padding-left: 5px;margin-left: -10px;">
                    <p style="color:#191970; text-align: left; margin-left:5px; font-family: Roboto;
                    font-size: 14px;
                    font-weight: 500;
                    letter-spacing: 0;
                    line-height: 16px;">Viandes</p>

                    <div  id="lol3a"class="lol2" style=" box-sizing: border-box;
                    height: 39px;
                    width: 197px;
                    border: 1px solid #1A7EF5;
                    border-radius: 6px;padding:8px;font-size:23px; color:#1A7EF5;margin-top:-10px
                    ">

                    <p style="font-size:14px;text-align:left;float:left; font-weight: 500;
                    letter-spacing: 0;
                    line-height: 16px;padding:0px;padding-top:5px;"id="textA">Nouvelle Promo</p> <p style="text-align:center;margin-top:-9px;margin-left:10.5px;" id="textB"> |</p>
                    <a id="v1"  onclick="change1()"style="float:right; margin-top:-45px;margin-right:7px;"><img src="assets/images/icones-vendeurs2/Plus2.svg"id="imgA" ><img src="assets/images/icones-vendeurs2/just.svg" width="24px" height="24px" style="display:none;"id="imgB"></a>

                    </div>
                    <div  id="lol3b" class="lol2" style=" box-sizing: border-box;
                    height: 39px;
                    width: 197px;
                    border: 1px solid #1A7EF5;
                    border-radius: 6px;padding:8px;font-size:25px; color:#1A7EF5;margin-top:6px;;;
                    ">
                    <p style="font-size:14px;text-align:left;float:left; font-weight: 500;
                    letter-spacing: 0;
                    line-height: 16px;padding:0px;padding-top:5px;"id="textA1">Nouvelle Promo</p> <p style="text-align:center;margin-top:-9px;margin-left:10px;"id="textB1">&nbsp&nbsp&nbsp&nbsp |</p>
                    <a id="v2"  onclick="change2()"style="float:right; margin-top:-45px;margin-right:7px;"><img src="assets/images/icones-vendeurs2/Plus2.svg" id="imgA1"><img src="assets/images/icones-vendeurs2/just.svg" width="24px" height="24px" style="display:none;"id="imgB1"></a>
                    </div>
                    <div  id="lol3c" class="lol2" style=" box-sizing: border-box;
                    height: 39px;
                    width: 197px;
                    border: 1px solid #1A7EF5;
                    border-radius: 6px;padding:8px;font-size:25px; color:#1A7EF5;margin-top:6px;;;
                    ">
                    <p style="font-size:14px;text-align:left;float:left;font-weight: 500;
                    letter-spacing: 0;
                    line-height: 16px;padding:0px;padding-top:5px;"id="textA2">Nouvelle Promo</p> <p style="text-align:center;margin-top:-9px;margin-left:10px;"id="textB2">&nbsp&nbsp&nbsp&nbsp |</p>
                    <a   onclick="change3()"style="float:right; margin-top:-45px;margin-right:7px;"><img src="assets/images/icones-vendeurs2/Plus2.svg" id="imgA2"><img src="assets/images/icones-vendeurs2/just.svg" width="24px" height="24px" style="display:none;"id="imgB2"></a>
                        </div>

                        <div  id="lol3d" class="lol2" style=" box-sizing: border-box;
                        height: 39px;
                        width: 197px;
                        border: 1px solid #1A7EF5;
                        border-radius: 6px;padding:8px;font-size:25px; color:#1A7EF5;margin-top:6px;;;
                        ">
                        <p style="font-size:14px;text-align:left;float:left;font-weight: 500;
                        letter-spacing: 0;
                        line-height: 16px;padding:0px;padding-top:5px;"id="textA3">Nouvelle Promo</p> <p style="text-align:center;margin-top:-9px;margin-left:10px;"id="textB3">&nbsp&nbsp&nbsp&nbsp |</p>
                        <a   onclick="change4()"style="float:right; margin-top:-45px;margin-right:7px;"><img src="assets/images/icones-vendeurs2/Plus2.svg" id="imgA3"><img src="assets/images/icones-vendeurs2/just.svg" width="24px" height="24px" style="display:none;"id="imgB3"></a>
                                </div>


                    </div>
                            {{-- Conserves --}}

                    <div class="col" style="padding-left: 5px;margin-left:-120px;">
                        <p style="color:#191970; text-align: left; margin-left:5px; font-family: Roboto;
                        font-size: 14px;
                        font-weight: 500;
                        letter-spacing: 0;
                        line-height: 16px;">Conserves & locaux</p>


                       <div  id="lol3e" class="lol2" style=" box-sizing: border-box;
                       height: 39px;
                       width: 197px;
                       border: 1px solid #1A7EF5;
                       border-radius: 6px;padding:8px;font-size:25px; color:#1A7EF5;margin-top:-10px;
                       ">

                       <p style="font-size:14px;text-align:left;float:left;font-weight: 500;
                       letter-spacing: 0;
                       line-height: 16px;padding:0px;padding-top:5px;"id="textA5">Nouvelle Promo</p> <p style="text-align:center;margin-top:-9px;margin-left:10.5px;"id="textB5"> |</p>
                       <a   onclick="change5()"style="float:right; margin-top:-45px;margin-right:7px;"><img src="assets/images/icones-vendeurs2/Plus2.svg" id="imgA5"><img src="assets/images/icones-vendeurs2/just.svg" width="24px" height="24px" style="display:none;"id="imgB5"></a>

                       </div>
                       <div  id="lol3f" class="lol2" style=" box-sizing: border-box;
                       height: 39px;
                       width: 197px;
                       border: 1px solid #1A7EF5;
                       border-radius: 6px;padding:8px;font-size:25px; color:#1A7EF5;margin-top:6px;;;
                       ">
                       <p style="font-size:14px;text-align:left;float:left;font-weight: 500;
                       letter-spacing: 0;
                       line-height: 16px;padding:0px;padding-top:5px;"id="textA6">Nouvelle Promo</p> <p style="text-align:center;margin-top:-9px;margin-left:10px;"id="textB6">&nbsp&nbsp&nbsp&nbsp |</p>
                       <a   onclick="change6()"style="float:right; margin-top:-45px;margin-right:7px;"><img src="assets/images/icones-vendeurs2/Plus2.svg" id="imgA6"><img src="assets/images/icones-vendeurs2/just.svg" width="24px" height="24px" style="display:none;"id="imgB6"></a>
                       </div>
                       <div  id="lol3g" class="lol2" style=" box-sizing: border-box;
                       height: 39px;
                       width: 197px;
                       border: 1px solid #1A7EF5;
                       border-radius: 6px;padding:8px;font-size:25px; color:#1A7EF5;margin-top:6px;;;
                       ">
                       <p style="font-size:14px;text-align:left;float:left;font-weight: 500;
                       letter-spacing: 0;
                       line-height: 16px;padding:0px;padding-top:5px;"id="textA7">Nouvelle Promo</p> <p style="text-align:center;margin-top:-9px;margin-left:10px;"id="textB7">&nbsp&nbsp&nbsp&nbsp |</p>
                       <a   onclick="change7()"style="float:right; margin-top:-45px;margin-right:7px;"><img src="assets/images/icones-vendeurs2/Plus2.svg"id="imgA7" ><img src="assets/images/icones-vendeurs2/just.svg" width="24px" height="24px" style="display:none;"id="imgB7"></a>
                           </div>

                        <div  id="lol3h" class="lol2" style=" box-sizing: border-box;
                        height: 39px;
                        width: 197px;
                        border: 1px solid #1A7EF5;
                        border-radius: 6px;padding:8px;font-size:25px; color:#1A7EF5;margin-top:6px;;;
                        ">
                        <p style="font-size:14px;text-align:left;float:left;font-weight: 500;
                        letter-spacing: 0;
                        line-height: 16px;padding:0px;padding-top:5px;"id="textA8">Nouvelle Promo</p> <p style="text-align:center;margin-top:-9px;margin-left:10px;"id="textB8">&nbsp&nbsp&nbsp&nbsp |</p>
                        <a   onclick="change8()"style="float:right; margin-top:-45px;margin-right:7px;"><img src="assets/images/icones-vendeurs2/Plus2.svg"id="imgA8" ><img src="assets/images/icones-vendeurs2/just.svg" width="24px" height="24px" style="display:none;"id="imgB8"></a>
                                </div>

                    </div>

                         {{-- Poissons & crustacés--}}

                         <div class="col" style="padding-left: 5px;margin-left:-120px;">
                            <p style="color:#191970; text-align: left; margin-left:5px; font-family: Roboto;
                            font-size: 14px;
                            font-weight: 500;
                            letter-spacing: 0;
                            line-height: 16px;">Poissons & crustacés</p>


                           <div  id="lol3i" class="lol2" style=" box-sizing: border-box;
                           height: 39px;
                           width: 197px;
                           border: 1px solid #1A7EF5;
                           border-radius: 6px;padding:8px;font-size:25px; color:#1A7EF5;margin-top:-10px;
                           ">

                           <p style="font-size:14px;text-align:left;float:left;font-weight: 500;
                           letter-spacing: 0;
                           line-height: 16px;padding:0px;padding-top:5px;"id="textA9">Nouvelle Promo</p> <p style="text-align:center;margin-top:-9px;margin-left:10.5px;"id="textB9"> |</p>
                           <a   onclick="change9()"style="float:right; margin-top:-45px;margin-right:7px;"><img src="assets/images/icones-vendeurs2/Plus2.svg"id="imgA9" ><img src="assets/images/icones-vendeurs2/just.svg" width="24px" height="24px" style="display:none;"id="imgB9"></a>

                           </div>
                           <div  id="lol3j" class="lol2" style=" box-sizing: border-box;
                           height: 39px;
                           width: 197px;
                           border: 1px solid #1A7EF5;
                           border-radius: 6px;padding:8px;font-size:25px; color:#1A7EF5;margin-top:6px;;;
                           ">
                           <p style="font-size:14px;text-align:left;float:left;font-weight: 500;
                           letter-spacing: 0;
                           line-height: 16px;padding:0px;padding-top:5px;"id="textA10">Nouvelle Promo</p> <p style="text-align:center;margin-top:-9px;margin-left:10px;"id="textB10">&nbsp&nbsp&nbsp&nbsp |</p>
                           <a   onclick="change10()"style="float:right; margin-top:-45px;margin-right:7px;"><img src="assets/images/icones-vendeurs2/Plus2.svg"id="imgA10" ><img src="assets/images/icones-vendeurs2/just.svg" width="24px" height="24px" style="display:none;"id="imgB10"></a>
                           </div>
                           <div  id="lol3k" class="lol2" style=" box-sizing: border-box;
                           height: 39px;
                           width: 197px;
                           border: 1px solid #1A7EF5;
                           border-radius: 6px;padding:8px;font-size:25px; color:#1A7EF5;margin-top:6px;;;
                           ">
                           <p style="font-size:14px;text-align:left;float:left;font-weight: 500;
                           letter-spacing: 0;
                           line-height: 16px;padding:0px;padding-top:5px;"id="textA11">Nouvelle Promo</p> <p style="text-align:center;margin-top:-9px;margin-left:10px;"id="textB11">&nbsp&nbsp&nbsp&nbsp |</p>
                           <a   onclick="change11()"style="float:right; margin-top:-45px;margin-right:7px;"><img src="assets/images/icones-vendeurs2/Plus2.svg" id="imgA11"><img src="assets/images/icones-vendeurs2/just.svg" width="24px" height="24px" style="display:none;"id="imgB11"></a>
                               </div>

                            <div  id="lol3l" class="lol2" style=" box-sizing: border-box;
                            height: 39px;
                            width: 197px;
                            border: 1px solid #1A7EF5;
                            border-radius: 6px;padding:8px;font-size:25px; color:#1A7EF5;margin-top:6px;;;
                            ">
                            <p style="font-size:14px;text-align:left;float:left;font-weight: 500;
                            letter-spacing: 0;
                            line-height: 16px;padding:0px;padding-top:5px;"id="textA12">Nouvelle Promo</p> <p style="text-align:center;margin-top:-9px;margin-left:10px;" id="textB12">&nbsp&nbsp&nbsp&nbsp |</p>
                            <a   onclick="change12()"style="float:right; margin-top:-45px;margin-right:7px;"><img src="assets/images/icones-vendeurs2/Plus2.svg" id="imgA12"><img src="assets/images/icones-vendeurs2/just.svg" width="24px" height="24px" style="display:none;"id="imgB12"></a>
                                    </div>

                        </div>

                                 {{-- Fruit & légumes --}}


                    <div class="col" style="padding-left: 5px;margin-left:-120px;">
                        <p style="color:#191970; text-align: left; margin-left:5px; font-family: Roboto;
                        font-size: 14px;
                        font-weight: 500;
                        letter-spacing: 0;
                        line-height: 16px;">Fruits & Légumes</p>


                       <div  id="lol3m" class="lol2" style=" box-sizing: border-box;
                       height: 39px;
                       width: 197px;
                       border: 1px solid #1A7EF5;
                       border-radius: 6px;padding:8px;font-size:25px; color:#1A7EF5;margin-top:-10px;
                       ">

                       <p style="font-size:14px;text-align:left;float:left;font-weight: 500;
                       letter-spacing: 0;
                       line-height: 16px;padding:0px;padding-top:5px;"id="textA13">Nouvelle Promo</p> <p style="text-align:center;margin-top:-9px;margin-left:10.5px;"id="textB13"> |</p>
                       <a   onclick="change13()"style="float:right; margin-top:-45px;margin-right:7px;"><img src="assets/images/icones-vendeurs2/Plus2.svg"id="imgA13" ><img src="assets/images/icones-vendeurs2/just.svg" width="24px" height="24px" style="display:none;"id="imgB13"></a>

                       </div>
                       <div  id="lol3n" class="lol2" style=" box-sizing: border-box;
                       height: 39px;
                       width: 197px;
                       border: 1px solid #1A7EF5;
                       border-radius: 6px;padding:8px;font-size:25px; color:#1A7EF5;margin-top:6px;;;
                       ">
                       <p style="font-size:14px;text-align:left;float:left;font-weight: 500;
                       letter-spacing: 0;
                       line-height: 16px;padding:0px;padding-top:5px;"id="textA14">Nouvelle Promo</p> <p style="text-align:center;margin-top:-9px;margin-left:10px;"id="textB14">&nbsp&nbsp&nbsp&nbsp |</p>
                       <a   onclick="change14()"style="float:right; margin-top:-45px;margin-right:7px;"><img src="assets/images/icones-vendeurs2/Plus2.svg"id="imgA14" ><img src="assets/images/icones-vendeurs2/just.svg" width="24px" height="24px" style="display:none;"id="imgB14"></a>
                       </div>
                       <div  id="lol3o" class="lol2" style=" box-sizing: border-box;
                       height: 39px;
                       width: 197px;
                       border: 1px solid #1A7EF5;
                       border-radius: 6px;padding:8px;font-size:25px; color:#1A7EF5;margin-top:6px;;;
                       ">
                       <p style="font-size:14px;text-align:left;float:left;font-weight: 500;
                       letter-spacing: 0;
                       line-height: 16px;padding:0px;padding-top:5px;"id="textA15">Nouvelle Promo</p> <p style="text-align:center;margin-top:-9px;margin-left:10px;"id="textB15">&nbsp&nbsp&nbsp&nbsp |</p>
                       <a   onclick="change15()"style="float:right; margin-top:-45px;margin-right:7px;"><img src="assets/images/icones-vendeurs2/Plus2.svg" id="imgA15"><img src="assets/images/icones-vendeurs2/just.svg" width="24px" height="24px" style="display:none;"id="imgB15"></a>
                           </div>

                        <div  id="lol3p" class="lol2" style=" box-sizing: border-box;
                        height: 39px;
                        width: 197px;
                        border: 1px solid #1A7EF5;
                        border-radius: 6px;padding:8px;font-size:25px; color:#1A7EF5;margin-top:6px;;;
                        ">
                        <p style="font-size:14px;text-align:left;float:left;font-weight: 500;
                        letter-spacing: 0;
                        line-height: 16px;padding:0px;padding-top:5px;"id="textA16">Nouvelle Promo</p> <p style="text-align:center;margin-top:-9px;margin-left:10px;line-width:8px;"id="textB16">&nbsp&nbsp&nbsp&nbsp |</p>
                        <a   onclick="change16()"style="float:right; margin-top:-45px;margin-right:7px;"><img src="assets/images/icones-vendeurs2/Plus2.svg"id="imgA16" ><img src="assets/images/icones-vendeurs2/just.svg" width="24px" height="24px" style="display:none;"id="imgB16"></a>
                                </div>

                    </div>



                                        </div>
                                    </div>


                                <br>
                                {{-- Buttons --}}
                                <div class="container " style="text-align: center; margin-top: 15px;font-size: 16px;  height: 18px;
                                color: #FFFFFF;
                                font-family: Roboto;
                                font-size: 14px;
                                font-weight: 500;
                                letter-spacing: 0.31px;line-height: 18px;
                                text-align: center;margin-left:20px;">
                                {{-- Fisrt Annuler --}}
                                    <button type=" submit " value="Annuler " style="width: 164px; height: 37px;margin-right: 10px;border-radius: 6px; color:#1A7EF5; border:1px solid #1A7EF5;background-color:white;  font-family: Roboto;
                                    font-size: 16px;
                                    font-weight: 500;
                                    letter-spacing: 0.35px;
                                    line-height: 18px;
                                    text-align: center; "id="firstAnnul" onclick="returnfisrtpromo()">Annuler</button>
                                    {{-- Second Annuler --}}
                                        <button type=" submit " value="Annuler " style="width: 113px; height: 37px;margin-right: 10px;margin-top:23px;border-radius: 6px; color:#1A7EF5; border:1px solid #1A7EF5;background-color:white;  font-family: Roboto;
                                        font-size: 16px;
                                        font-weight: 500;
                                        letter-spacing: 0.35px;
                                        line-height: 18px;
                                        text-align: center; display:none;"id="secondAnnul" onclick="returnsecondpromo()">Annuler</button>
                                            {{-- Fisrt Suivant --}}
                                    <button type="submit "  style="width: 164px; height: 37px; border-radius: 6px;border:#1A7EF5; color:white;background-color:#1A7EF5 ;  font-family: Roboto;
                                    font-size: 16px;
                                    font-weight: 500;
                                    letter-spacing: 0.35px;
                                    line-height: 18px;
                                    text-align: center;" onclick="suitenewpromo()" id="buttonSuivant1">Suivant</button>
                                                {{-- Second Suivant --}}
                                    <button type="submit "  style="width: 164px; height: 37px; border-radius: 6px;border:#1A7EF5; color:white;background-color:#1A7EF5 ;  font-family: Roboto;
                                    font-size: 16px;
                                    font-weight: 500;
                                    letter-spacing: 0.35px;
                                    line-height: 18px;
                                    text-align: center;display:none;" onclick="suitenewpromo2()" id="buttonSuivant2">Suivant</button>
                                    {{-- Button lancer promo --}}
                                    <button type="submit "  style="margin-top:22px;width: 197px; height: 37px; border-top-left-radius: 6px;border-bottom-left-radius: 6px;border:#1A7EF5; color:white;background-color:#1A7EF5 ;  font-family: Roboto;
                                    font-size: 16px;
                                    font-weight: 500;
                                    letter-spacing: 0.35px;
                                    line-height: 18px;
                                        text-align: center;display:none;" onclick="suitenewpromo2()" id="buttonSuivant3">Lancer la promotion</button>

                                     <div class="dropdown" id="selectSuivant3" style="display: none;margin-left:25px;">
                                        <button onclick="drop()" type="submit" class="btn btn-default dropdown-toggle"  style="color: white;background-color:#1A7EF5;width:26px;height:37px;padding:10px;border-radius:0 6px 6px 0;margin-top:-24px;margin-left:120px;" >
                                        <span class="caret"style="margin-right:-4px;"></span></button>
                                        <article style="  box-sizing: border-box;
                                        height: 252.26px;
                                        width: 274px;

                                        border-radius: 6px;
                                        background-color: #FFFFFF;
                                        box-shadow: 0 5px 15px 0 rgba(0,0,0,0.45);
                                      display:none;float:center;margin-top:-290px;margin-left:-150px;padding:10px;position:absolute;"id="programmez">
                                      <p style=" color: #191970;
                                      font-family: Roboto;
                                      font-size: 21px;
                                      font-weight: 500;
                                      letter-spacing: 0;
                                      line-height: 21px;text-align:left">Programmer le début <br>
                                        de la promotion</p>
                                        <p style="  color: #191970;
                                        font-family: Roboto;
                                        font-size: 14px;
                                        font-weight: 300;
                                        letter-spacing: -0.34px;
                                        line-height: 16px;margin-top:-10px;text-align:left;">Il est préférable de choisir une heure <br>
                                            en soirée, lorsque les gens sont chez eux.</p>
                                        <section style="margin-top:15px;">
                                        <label style=" color: #191970;
                                        font-family: Roboto;
                                        font-size: 12px;
                                        font-weight: 500;
                                        letter-spacing: 0;
                                        line-height: 12px;text-align:left;float:left;position:relative;">Date de début: </label>
                                        <select style="  box-sizing: border-box;
                                        height: 41px;
                                        width: 253px;
                                        border: 1px solid #979797;
                                        border-radius: 6px;
                                        background-color: #F5F5F5;padding:5px;padding-left:15px;margin-top:-5px;">
                                        <option value=""disabled selected hidden>—</option>
                                        <option value="" > Samedi 23 juillet</option>
                                        <option value="" >Dimanche 24 juillet</option>
                                        <option value="" >Lundi 25 juillet</option>
                                        <option value="" >Mardi 26 Juillet</option>
                                        <option value="" >Mercredi 27 juillet</option>
                                        <option value="" >Jeudi 28 juillet</option>
                                    </select></section>
                                     <section style="margin-top:15px">
                                    <label style=" color: #191970;
                                    font-family: Roboto;
                                    font-size: 12px;
                                    font-weight: 500;
                                    letter-spacing: 0;
                                    line-height: 12px;text-align:left;float:left;position:relative;float:left;position:relative;">Heure de début: </label>
                                     <select  style=" height: 41px;
                                     width: 115.5px;
                                     border: 1px solid #979797;
                                     border-radius: 6px;
                                     background-color: #F5F5F5;float:left;position:relative;margin-top:15px;margin-left:-85px;padding-left:10px;padding:5px">
                                       <option value=""disabled selected hidden>—</option>
                                       <option value="" >00 </option>
                                       <option value="" >01 </option>
                                       <option value="" >02 </option>
                                       <option value="" >03 </option>
                                       <option value="" >04</option>
                                       <option value="" >05</option>
                                       <option value="" >06 </option>
                                       <option value="" >07</option>
                                       <option value="" >08</option>
                                       <option value="" >09</option>
                                       <option value="" >10 </option>
                                       <option value="" >11 </option>
                                       <option value="" >12 </option>
                                       <option value="" >13 </option>
                                       <option value="" >14 </option>
                                       <option value="" >15 </option>
                                       <option value="" >16 </option>
                                       <option value="" >17 </option>
                                       <option value="" >18 </option>
                                       <option value="" >19</option>
                                       <option value="" >20 </option>
                                       <option value="" >21 </option>
                                       <option value="" >22</option>
                                       <option value="" >23 </option>

                                    </select>

                                       <select  style=" height: 41px;
                                       width: 115.5px;
                                       border: 1px solid #979797;
                                       border-radius: 6px;
                                       background-color: #F5F5F5;float:right;position:relative;margin-top:15px;padding-left:10px;padding:5px">
                                         <option value=""disabled selected hidden>—</option>
                                         <option value="" >00 </option>
                                         <option value="" >01 </option>
                                         <option value="" >02 </option>
                                         <option value="" >03 </option>
                                         <option value="" >04</option>
                                         <option value="" >05</option>
                                         <option value="" >06 </option>
                                         <option value="" >07</option>
                                         <option value="" >08</option>
                                         <option value="" >09</option>
                                         <option value="" >10 </option>
                                         <option value="" >11 </option>
                                         <option value="" >12 </option>
                                         <option value="" >13 </option>
                                         <option value="" >14 </option>
                                         <option value="" >15 </option>
                                         <option value="" >16 </option>
                                         <option value="" >17 </option>
                                         <option value="" >18 </option>
                                         <option value="" >19</option>
                                         <option value="" >20 </option>
                                         <option value="" >21 </option>
                                         <option value="" >22</option>
                                         <option value="" >23 </option>
                                         <option value="" >24 </option>
                                         <option value="" >25 </option>
                                         <option value="" >26 </option>
                                         <option value="" >27 </option>
                                         <option value="" >28 </option>
                                         <option value="" >29 </option>
                                         <option value="" >30</option></select>
                                     </section>

                                     <section style="  width: 0;
                                     height: 0;
                                     border-left: 16px solid transparent;
                                     border-right: 16px solid transparent;
                                     border-top: 30px solid white;margin-top:70px;margin-left:110px;border-radius:3px;"></section>
                                        </article>




                                    </div>



                                </div>


                        </div>



                        <div  style="background-color:white;border-right:1px solid #D8D8D8;border-left:1px solid #D8D8D8;border-top: 1px solid #D8D8D8;border-bottom: 1px solid #D8D8D8;padding-top: 1%; width:347px;height: 404px; margin-right:5px;margin-left:858px;border-bottom-right-radius:
                                    5px;margin-top:-404px;pointer:none;opacity:0.5 " id="rightprodselec">
                            <p style="font-size: 12px; color:#a4a4a4; text-align: center;padding-top: 40%;padding-bottom: 35%; " id="noproduitselect">Aucun produit <br> dans ma liste</p>
                            <section id="produitselectfor" style="display: none;">
                                <h4 style="color:#191970; font-size: 14px; text-align: center;padding-top: 10%; ">Conserves & bocaux</h4>
                                <p style="  font-size: 12px;
                                font-weight: 500;
                                letter-spacing: 0;
                                line-height: 13px; color: #1A7EF5;; text-align: center; ">NomDuProduit , NomDuProduit , <br> NomDuProduit , NomDuProduit ,<br> NomDuProduit , NomDuProduit ,<br> NomDuProduit , NomDuProduit ,<br> NomDuProduit , NomDuProduit ,<br> NomDuProduit , NomDuProduit ,</p>
                                <h4 style="color: #191970; font-size: 14px; text-align: center; ">Fruits & légumes</h4>
                                <p style=" font-size: 12px;
                                font-weight: 500;
                                letter-spacing: 0;
                                line-height: 13px; color: #1A7EF5;; text-align: center; ">NomDuProduit , NomDuProduit , <br> NomDuProduit , NomDuProduit ,<br> NomDuProduit , NomDuProduit ,<br> NomDuProduit , NomDuProduit ,<br> NomDuProduit , NomDuProduit ,<br> NomDuProduit , NomDuProduit ,</p>
                                <h4 style=" color: #191970; font-size: 14px; text-align: center; ">Poissons & crustacés</h4>
                                <p style="  font-size: 12px;
                                font-weight: 500;
                                letter-spacing: 0;
                                line-height: 13px; color: #1A7EF5;; text-align: center; ">NomDuProduit , NomDuProduit , <br> NomDuProduit , NomDuProduit ,<br> NomDuProduit , NomDuProduit ,<br></p>
                            </section>

                        </div>

                    </div>

                </div>
            </div>

<script>
function suitenewpromo(){
    $("#leftfirstpromo").hide();
    $("#leftfirstpromo2").show();
    $("#leftfirstpromo3").hide();
    $("#leftnouvellepromo").hide();
    $("#leftnouvellepromo2").show();
    $("#leftnouvellepromo3").hide();
    $("#buttonSuivant1").hide();
    $("#buttonSuivant2").show();
    $("#buttonSuivant3").hide();
    $("#selectSuivant3").hide();
    $("#produitselectfor").hide();
    $("#noproduitselect").show();
    $("#firstAnnul").show();
    $("#secondAnnul").hide();

}
function returnfisrtpromo(){
    $("#leftfirstpromo").show();
    $("#leftfirstpromo2").hide();
    $("#leftfirstpromo3").hide();
    $("#leftnouvellepromo").show();
    $("#leftnouvellepromo2").hide();
    $("#leftnouvellepromo3").hide();
    $("#buttonSuivant1").show();
    $("#buttonSuivant2").hide();
    $("#buttonSuivant3").hide();
    $("#selectSuivant3").hide();
    $("#firstAnnul").show();
    $("#secondAnnul").hide();
    $("#produitselectfor").hide();
    $("#noproduitselect").show();
    $("#rightliste").css({"opacity":"0.5","pointer":"none"});
    $("#rightprodselec").css({"opacity":"0.5","pointer":"none"});
    $("#rightprodselecpromo").css({"opacity":"0.5","pointer":"none"});
}
function suitenewpromo2(){
    $("#leftfirstpromo").hide();
    $("#leftfirstpromo2").hide();
    $("#leftfirstpromo3").show();
    $("#leftnouvellepromo").hide();
    $("#leftnouvellepromo3").show();
    $("#leftnouvellepromo2").hide();
    $("#buttonSuivant1").hide();
    $("#buttonSuivant2").hide();
    $("#buttonSuivant3").show();
    $("#selectSuivant3").show();
    $("#firstAnnul").hide();
    $("#secondAnnul").show();
    $("#produitselectfor").show();
    $("#noproduitselect").hide();
    $("#rightliste").css({"opacity":"1","cursor":"pointer"});
    $("#rightprodselec").css({"opacity":"1","cursor":"pointer"});
    $("#rightprodselecpromo").css({"opacity":"1","cursor":"pointer"});

}
function returnsecondpromo(){
    $("#leftfirstpromo").hide();
    $("#leftfirstpromo2").show();
    $("#leftfirstpromo3").hide();
    $("#leftnouvellepromo").hide();
    $("#leftnouvellepromo2").show();
    $("#leftnouvellepromo3").hide();
    $("#buttonSuivant1").hide();
    $("#buttonSuivant2").show();
    $("#buttonSuivant3").hide();
    $("#selectSuivant3").hide();
    $("#firstAnnul").show();
    $("#secondAnnul").hide();
    $("#produitselectfor").hide();
    $("#noproduitselect").show();
    $("#rightliste").css({"opacity":"0.5","pointer":"none"});
    $("#rightprodselec").css({"opacity":"0.5","pointer":"none"});
    $("#rightprodselecpromo").css({"opacity":"0.5","pointer":"none"});
}

function colborder1(){
    $("#col1").css({"border":"1px solid #1A7EF5","border-radius":"6px"});
}
function colborder2(){
    $("#col2").css({"border":"1px solid #1A7EF5","border-radius":"6px"});
}
function colborder3(){
    $("#col3").css({"border":"1px solid #1A7EF5","border-radius":"6px"});
}
function colborder4(){
    $("#col4").css({"border":"1px solid #1A7EF5","border-radius":"6px"});
}
function colborder5(){
    $("#col5").css({"border":"1px solid #1A7EF5","border-radius":"6px"});
}
function colborder6(){
    $("#col6").css({"border":"1px solid #1A7EF5","border-radius":"6px"});
}
function colborder7(){
    $("#col7").css({"border":"1px solid #1A7EF5","border-radius":"6px"});
}
function colborder8(){
    $("#col8").css({"border":"1px solid #1A7EF5","border-radius":"6px"});
}
function colborder9(){
    $("#col9").css({"border":"1px solid #1A7EF5","border-radius":"6px"});
}
function colborder10(){
    $("#col10").css({"border":"1px solid #1A7EF5","border-radius":"6px"});
}
function colborder11(){
    $("#col11").css({"border":"1px solid #1A7EF5","border-radius":"6px"});
}


function change1(){

    $("#textA").css("color","white");
    $("#textB").css("color","#00B517");
    $("#imgA").hide();
    $("#imgB").show();
    $("#lol3a").css({"border":"1px solid #417505","background-color":"#00B517"});
}

function change2(){

    $("#textA1").css("color","white");
    $("#textB1").css("color","#00B517");
    $("#imgA1").hide();
    $("#imgB1").show();
    $("#lol3b").css({"border":"1px solid #417505","background-color":"#00B517"});
}

function change3(){

    $("#textA2").css("color","white");
    $("#textB2").css("color","#00B517");
    $("#imgA2").hide();
    $("#imgB2").show();
    $("#lol3c").css({"border":"1px solid #417505","background-color":"#00B517"});
}
function change4(){

    $("#textA3").css("color","white");
    $("#textB3").css("color","#00B517");
    $("#imgA3").hide();
    $("#imgB3").show();
    $("#lol3d").css({"border":"1px solid #417505","background-color":"#00B517"});
}
function change5(){

    $("#textA5").css("color","white");
    $("#textB5").css("color","#00B517");
    $("#imgA5").hide();
    $("#imgB5").show();
    $("#lol3e").css({"border":"1px solid #417505","background-color":"#00B517"});
}
function change6(){

    $("#textA6").css("color","white");
    $("#textB6").css("color","#00B517");
    $("#imgA6").hide();
    $("#imgB6").show();
    $("#lol3f").css({"border":"1px solid #417505","background-color":"#00B517"});
}
function change7(){

    $("#textA7").css("color","white");
    $("#textB7").css("color","#00B517");
    $("#imgA7").hide();
    $("#imgB7").show();
    $("#lol3g").css({"border":"1px solid #417505","background-color":"#00B517"});
}
function change8(){

    $("#textA8").css("color","white");
    $("#textB8").css("color","#00B517");
    $("#imgA8").hide();
    $("#imgB8").show();
    $("#lol3h").css({"border":"1px solid #417505","background-color":"#00B517"});
}
function change9(){

    $("#textA9").css("color","white");
    $("#textB9").css("color","#00B517");
    $("#imgA9").hide();
    $("#imgB9").show();
    $("#lol3i").css({"border":"1px solid #417505","background-color":"#00B517"});
}
function change10(){

    $("#textA10").css("color","white");
    $("#textB10").css("color","#00B517");
    $("#imgA10").hide();
    $("#imgB10").show();
    $("#lol3j").css({"border":"1px solid #417505","background-color":"#00B517"});
}
function change11(){

    $("#textA11").css("color","white");
    $("#textB11").css("color","#00B517");
    $("#imgA11").hide();
    $("#imgB11").show();
    $("#lol3k").css({"border":"1px solid #417505","background-color":"#00B517"});
}
function change12(){

    $("#textA12").css("color","white");
    $("#textB12").css("color","#00B517");
    $("#imgA12").hide();
    $("#imgB12").show();
    $("#lol3l").css({"border":"1px solid #417505","background-color":"#00B517"});
}
function change13(){

    $("#textA13").css("color","white");
    $("#textB13").css("color","#00B517");
    $("#imgA13").hide();
    $("#imgB13").show();
    $("#lol3m").css({"border":"1px solid #417505","background-color":"#00B517"});
}
function change14(){

    $("#textA14").css("color","white");
    $("#textB14").css("color","#00B517");
    $("#imgA14").hide();
    $("#imgB14").show();
    $("#lol3n").css({"border":"1px solid #417505","background-color":"#00B517"});
}
function change15(){

    $("#textA15").css("color","white");
    $("#textB15").css("color","#00B517");
    $("#imgA15").hide();
    $("#imgB15").show();
    $("#lol3o").css({"border":"1px solid #417505","background-color":"#00B517"});
}
function change16(){

    $("#textA16").css("color","white");
    $("#textB16").css("color","#00B517");
    $("#imgA16").hide();
    $("#imgB16").show();
    $("#lol3p").css({"border":"1px solid #417505","background-color":"#00B517"});
}


function drop(){
         $("#programmez").toggle();
          console.log("Yo mec!");

      }




</script>



