<div class="table-header">
    <table cellpadding="0" cellspacing="0" border="0" style="z-index: 1">
        <thead id="commande-fixed-head" class="marchand-commandes-table-header">
            <tr>
                {{-- <td style="width:25px">Case</td> --}}
                <td class="tab-comm-element" style=" width: 110px; text-align:center">Commande n°</td>
                <td class="tab-comm-element" style="width: 277px; text-align:center;">Produit(s)</td>
                <td class="tab-comm-element" style="width: 277px; text-align:center;">Client</td>
                <td class="tab-comm-element" style=" width: 72px; text-align:center">Articles</td>
                <td class="tab-comm-element" style=" width: 122px; text-align:center">Prix total</td>
                <td class="tab-comm-element" style="width: 77px;">Paiement</td>
                <td class="tab-comm-element" style=" width: 182px;">État</td>
                <td class="tab-comm-element" style=" width: 101px;">Date</td>
            </tr>
        </thead>
    </table>
    </div>

        <div class="table-content-marchand field-none table-content-helper" id="detail-commande-marchant-historique" style="background-color: #fff">

            <div class="line-product-clonned" onclick="closeHistoriqueDetailCommandePanel()">
                <div class="clonned-col1" id="clonned-col1-h" style="width: 110px;"></div>
                <div class="clonned-col2" id="clonned-col2-h" style="width: 277px;"></div>
                <div class="clonned-col3" id="clonned-col3-h" style="width: 278px;"></div>
                <div class="clonned-col4" id="clonned-col4-h" style="width: 72px;"></div>
                <div class="clonned-col5" id="clonned-col5-h" style="width: 112px;"></div>
                <div class="clonned-col6" id="clonned-col6-h" style="width: 77px;"></div>
                <div class="clonned-col7" id="clonned-col7-h" style="width: 182px;"></div>
                <div class="clonned-col8" id="clonned-col8-h" style="width: 101px;"></div>
            </div>


            <div class="detail-commande-prod-infos">
                <div class="marchand-commande-client-address-h" style="width: 190px; height: 100%; ; margin-right: 8px">

                </div>

                <div class="marchand-commande-client-detail" style="width: 704px; ">
                    <div class="detail-resumer-commande">RÉSUMÉ DE LA COMMANDE</div>
                    <div class="detail-prod-header">
                        <table cellpadding="0" cellspacing="0" border="0" style="z-index: 1">
                            <thead id="commande-detail-fixed-head" >
                            <tr>
                                {{-- <td style="width:25px">Case</td> --}}
                                <td class="tab-comm-element" style=" width: 110px; text-align:center">Référence</td>
                                <td class="tab-comm-element" style="width: 277px; text-align:center;">Article(s)</td>
                                <td class="tab-comm-element" style=" width: 72px; text-align:center">Quantité</td>
                                <td class="tab-comm-element" style="width: 112px;">Prix Unitaire</td>
                                <td class="tab-comm-element" style=" width: 112px;">Prix total</td>
                            </tr>
                            </thead>
                        </table>
                    </div>
                    <div class="detail-prod-body">
                        <table style="width: 704px; auto">

                            <tbody id="marchand-commandes-details-historique">

                            </tbody>

                        </table>
                    </div>
                </div>


                <div class="marchand-commande-commande-infos">
                    <div class="commande-matricule-element-zone">
                        <div class="numero-suivi-detail">
                            <span>N° de suivi de la commande :</span> <p style="position: relative; top: 4px; left: 20px">A/N</p>
                        </div>
                        <div class="date-livraison-detail">
                            <span>Date prévue :</span> <p style="position: relative; top: 4px; left: 10px" >A/N</p>
                        </div>
                    </div>
                    <div class="commande-progress-state-zone">

                        <aside class="commandeannul field-none" id="commandeannul1" >
                            <div class="leftcommandeannul">
                            <img src="/assets/images/cancel.svg" style="margin-top:12px;margin-left:14px;">
                            </div>
                            <p class="commandeannultext">Commande annulée</p>
                        </aside>

                        <aside class="commanderecue" id="encoursdeT" style="display:nones;">
                            <div class="leftcommandeencours">
                                <img src="/assets/images/icones-vendeurs2/Valide.svg" style="margin-top:12px;margin-left:14px;">
                            </div>
                            <p class="commandeencourstext">Commande expediée</p>
                        </aside>

                        <aside class="commandeexped field-none" id="commandeexpe2" style="display: noned;">
                            <div class="leftcommandeexpe">
                                <lord-icon
                                src="https://cdn.lordicon.com/mwqnntww.json"
                                trigger="loop"
                                delay="1000"
                                colors="primary:#ff9500"
                                style="width:28px;height:28px;margin-top:10px;margin-left:10px;" >
                                </lord-icon>
                            </div>
                            <p class="commandeexpetext">Commande expediée</p>
                        </aside>

                        <aside class="commandelivr" id="commandelivr1" style="display:none;">
                            <div class="leftcommandelivr">
                            <script src="https://cdn.lordicon.com/xdjxvujz.js"></script>
                            <lord-icon
                            src="https://cdn.lordicon.com/mwqnntww.json"
                            trigger="loop"
                            delay="1000"
                            colors="primary:#ff9500"
                            style="width:28px;height:28px;margin-top:10px;margin-left:10px;" id="encours1">
                            </lord-icon>

                            </div>
                            <p class="commandelivrtext" >En cours de traitement</p>
                        </aside>

                        <aside class="commanderecue" id="encoursdeT" style="display:nones;">
                            <div class="leftcommandeencours">
                                <img src="/assets/images/icones-vendeurs2/Valide.svg" style="margin-top:12px;margin-left:14px;">
                            </div>
                            <p class="commandeencourstext">En cours de traitement</p>
                        </aside>

                        <aside class="commanderecue" id="commanderecue1">
                            <div class="leftcommandeencours">
                                <img src="/assets/images/icones-vendeurs2/Valide.svg" style="margin-top:12px;margin-left:14px;">
                            </div>
                            <p class="commandeencourstext">Commande reçue</p>
                        </aside>

                    </div>
                </div>
            </div>

        </div>

        <div class="table-content-marchand">

            <table cellpadding="0" cellspacing="0" border="0" id="commande-table" >
                <tbody id="tab-marchand-commande-historique" >

                </tbody>
            </table>

        </div>

        {{-- DEBUT DES INFOS --}}
        <section class="monscrollcom"style="height: 401px;overflow-y:auto;overflow-x:hidden; display: none">
        <aside class="montabcommande" id="line1">
        <a onclick="detcom()">

            <article class="premierB">
                <p class="contenu1">7401048741</p>
            </article>
            <article class="deuxiemeB">
            <div class="boxcontenu2"></div>
            <p class="contenu2">Support réglable pour Echo<br>
            Show 5 (2e génération) | Bleu</p>

        </article>
        <article class="troisiemeB">
            <p class="contenu3a">Tokyo Naikra
            </p>
            <p class="contenu3b">hopetechnologies.boma@example.com
            </p>
        </article>
        <article class="quatriemeB">
            <p class="contenu4">999</p>
        </article>
        <article class="cinquiemeB">
            <p class="contenu5">999.999 Fcfa</p>
        </article>
        <article class="sixiemeB">
                <img src="assets/images/icones-vendeurs2/Paypal.svg">
        </article>
        <article class="septiemeB">
            <p class="contenu7">Commande confirmé</p>
        </article>
        <article class="huitiemeB">
            <p class="contenu8">30-10-2022</p>
        </article>
        </a>
        </aside>

        {{-- 2ieme ligne --}}
        <aside class="montabcommande" id="line2">
            <a onclick="detcom2()">
            <article class="premierB">
                <p class="contenu1">7401048741</p>
            </article>
            <article class="deuxiemeB">
                <div class="boxcontenu2a"></div>
                <div class="boxcontenu2b"></div>
                <div class="boxcontenu2c"></div>
            </article>
            <article class="troisiemeB">
            <p class="contenu3a">Tokyo Naikra
            </p>
            <p class="contenu3b">hopetechnologies.boma@example.com
            </p>
            </article>
            <article class="quatriemeB">
            <p class="contenu4">999</p>
            </article>
            <article class="cinquiemeB">
            <p class="contenu5">999.999 Fcfa</p>
            </article>
            <article class="sixiemeB">
            <img src="assets/images/icones-vendeurs2/Moovmoney.svg">
            </article>
            <article class="septiemeB">
            <p class="contenu7b">En cours de traitement</p>
            </article>
            <article class="huitiemeB">
            <p class="contenu8">30-10-2022</p>
            </article>
            </a>
        </aside>
        {{-- 3ieme ligne --}}
        <aside class="montabcommande" id="line3">
            <article class="premierB">
                <p class="contenu1">7401048741</p>
            </article>
            <article class="deuxiemeB">
                <div class="boxcontenu2d"></div>
                <div class="boxcontenu2e"></div>
                <div class="boxcontenu2f"></div>
                <div class="boxcontenu2g"></div>
                <div class="boxcontenu2h"></div>
            </article>
            <article class="troisiemeB">
            <p class="contenu3a">Tokyo Naikra
            </p>
            <p class="contenu3b">hopetechnologies.boma@example.com
            </p>
            </article>
            <article class="quatriemeB">
            <p class="contenu4">999</p>
            </article>
            <article class="cinquiemeB">
            <p class="contenu5">999.999 Fcfa</p>
            </article>
            <article class="sixiemeB">
            <img src="assets/images/icones-vendeurs2/Moovmoney.svg">
            </article>
            <article class="septiemeB">
            <p class="contenu7c">Produit expédié</p>
            </article>
            <article class="huitiemeB">
            <p class="contenu8">30-10-2022</p>
            </article>
        </aside>

        {{-- DETAILS DE MON DEROULE --}}
        <section class="monderoule1" id="monderoule1" >
        {{-- DROITE --}}
        <article class="infocliff">
            <div class="textenteteinfo">
                <p class="penteteinfo">Information du client :</p>
            </div>
            <div class="group3">
                <img src="/assets/images/icones-vendeurs2/user copy 2.svg" style="margin-left:10px;margin-top:10px;">
                <img src="/assets/images/icones-vendeurs2/placeholder copy 2.svg" style="margin-left:10px;margin-top:29px;">
                <img src="/assets/images/icones-vendeurs2/telephone.svg" style="margin-left:10px;margin-top:29px;">
            </div>
            <div style="margin-top:-120px;margin-left:46px;">
            <p class="textcolora4"  style="margin-top:14px;">Nom &<br>
                prénom</p>
            <p class="textcolora4"  style="margin-top:12px;">Adresse du<br>
                Client</p>
            <p class="textcolora4"  style="margin-top:12px;">N° portable</p>
        </div>
        </article>
        <article class="infoexpe">
            <div class="textenteteinfo">
                <p class="penteteinfo">Information d’expédition :</p>
            </div>
            <div class="group3">
                <img src="/assets/images/icones-vendeurs2/user copy 2.svg" style="margin-left:10px;margin-top:10px;">
                <img src="/assets/images/icones-vendeurs2/placeholder copy 2.svg" style="margin-left:10px;margin-top:29px;">
                <img src="/assets/images/icones-vendeurs2/telephone.svg" style="margin-left:10px;margin-top:29px;">
            </div>
            <div style="margin-top:-120px;margin-left:46px;">
                <p class="textcolora4"  style="margin-top:14px;">Nom &<br>
                    prénom</p>
                <p class="textcolora4"  style="margin-top:12px;">Adresse du<br>
                    Client</p>
                <p class="textcolora4"  style="margin-top:12px;">N° portable</p>
            </div>
        </article>
        {{-- RESUME --}}
        <article class="resumecom" id=resumecom1>
        <div style="height:32px;width:701px;border-bottom:1px solid #D8D8D8;padding-top:10px;background-color: #FFFFFF">
            <p class="texteresumecom">RÉSUMÉ DE LA COMMANDE</p>
        </div>
        <div style=" height: 32px;width:701px;border-bottom:1px solid #D8D8D8;  background-color: #F8F8F8; padding-top:5px;">                          <label class="petittextebleu" style="margin-left:54px;">Référence</label>
            <label class="petittextebleu" style="margin-left:45px;">Article(s)</label>
            <label class="petittextebleu" style="margin-left:230px;">Quantité</label>
            <label class="petittextebleu" style="margin-left:30px;">Prix unitaire</label>
            <label class="petittextebleu" style="margin-left:51px;">Prix total</label>
        </div>
        {{-- CONTENU TABLEAU --}}
        <div style="height:255px;overflow-y:auto;overflow-x:hidden;">

        <aside class="malignederesume2" id="maligneresume2" >
            <a  style="pointer:cursor">
            <article class="checkcontenu" >
            <input type="checkbox"
            class="checkcommande form-check-input"  onclick="validecommande()">
            </article>
            <article class="refcontenu">
            <p class="contenu1">7401048741</p>
            </article>
            <article class="informationcontenu">
            <aside class="boxcontenu2"></aside>
            <p class="contenu2">Support réglable pour Echo<br>
                Show 5 (2e génération) | Bleu</p></article>

            <article class="quantitecontenu">  <p class="contenu4">999</p></article>
            <article class="prixcontenu"><p class="contenu5">999.999 Fcfa</p></article>
            <article class="prixtotalcontenu"><p class="contenu5">999.999 Fcfa</p></article>
        </aside>

        <aside class="malignederesume"id="maligneresume1">
            <p class="textcolorresume">J’ai vérifié ce produit, il est prêt à etre livré.</p>
        </a>
        </aside>


        <aside class="malignederesume2" id="maligneresume2B">
        <article class="checkcontenu" >
            <input type="checkbox"
            class="checkcommande form-check-input"  onclick="validecommande1()">
        </article>
        <article class="refcontenu">
            <p class="contenu1">7401048741</p>
        </article>
        <article class="informationcontenu">
            <aside class="boxcontenu2"></aside>
            <p class="contenu2">Support réglable pour Echo<br>
                Show 5 (2e génération) | Bleu</p></article>

        <article class="quantitecontenu">  <p class="contenu4">999</p></article>
        <article class="prixcontenu"><p class="contenu5">999.999 Fcfa</p></article>
        <article class="prixtotalcontenu"><p class="contenu5">999.999 Fcfa</p></article>
        </aside>

        <aside class="malignederesume"id="maligneresume1B">
            <p class="textcolorresume">J’ai vérifié ce produit, il est prêt à etre livré.</p>
        </aside>

        </div>
        <div class="unkown_over_lay-div-2" id="overlay"></div>
     </article>

        {{-- Block sur le blur --}}


    <article class="blockblur" id="blockblur1">
        <p class="commandeprete">Commande prête</p>
        <p class="vousavezverifie">Vous avez vérifier les produits de cette commande, <br>ils sont conforment et prêt pour l’expédition ?</p>
        <aside class="mybtnvert">
        <input type="submit" class="btnnon" value="Non" onclick="commandenonvalide()">
        <input type="submit" class="btnoui" value="Oui" onclick="commandeouivalide()">
        <aside>
     </article>

        {{-- GAUCHE --}}
        <article class="numerosuivi" style="  margin-top:-322px;" id="numerosuivi">
            <aside class="  height: 32px;
            width: 266px;
            border-radius: 6px 6px 0 0;
            background-color: #FFFFF;">

            <label class="petittextebleu" style="float: left;margin-left:10px;margin-top:10px;">N° de suivi de la commande :</label>
            <label class="textcolora4" style="float: right;margin-right:50px;margin-top:10px;">N/A</label>
            </aside>
            <aside style=" height: 32px;
            width: 266px;
            border-radius: 0 0 6px 6px;
            background-color: #F8F8F8;">
                <label class="petittextebleu" style="float: left;margin-left:10px;margin-top:10px;">Date prévue :</label>
                <label class="textcolora4" style="float: right;margin-right:50px;margin-top:10px;">N/A</label>

            </aside>
        </article>
        <article class="cochesuivi">
            <aside class="commandeexped" id="commandeexpe1" style="display: none">
                <div class="leftcommandeexpe" style="display: none;">
                <script src="https://cdn.lordicon.com/xdjxvujz.js"></script>
                <lord-icon
                src="https://cdn.lordicon.com/mwqnntww.json"
                trigger="loop"
                delay="1000"
                colors="primary:#ff9500"
                style="width:28px;height:28px;margin-top:10px;margin-left:10px;">
                </lord-icon>
                </div>
                <p class="commandeexpetext">Commande expédiée</p>
            </aside>
            <aside class="commandeannul" id="commandeannul1" style="display: none;">
                <div class="leftcommandeannul">
                <img src="/assets/images/cancel.svg" style="margin-top:12px;margin-left:14px;">
                </div>
                <p class="commandeannultext">Commande annulée</p>
            </aside>
            <aside class="commandeexped" id="commandeexpe2" style="display: none;">
            <div class="leftcommandeexpe">
                <lord-icon
                src="https://cdn.lordicon.com/mwqnntww.json"
                trigger="loop"
                delay="1000"
                colors="primary:#ff9500"
                style="width:28px;height:28px;margin-top:10px;margin-left:10px;" >
                </lord-icon>
            </div>
            <p class="commandeexpetext">Commande expediée</p>
        </aside>
        <aside class="commandelivr" id="commandelivr1">
            <div class="leftcommandelivr">
            <script src="https://cdn.lordicon.com/xdjxvujz.js"></script>
            <lord-icon
            src="https://cdn.lordicon.com/mwqnntww.json"
            trigger="loop"
            delay="1000"
            colors="primary:#ff9500"
            style="width:28px;height:28px;margin-top:10px;margin-left:10px;" id="encours1">
            </lord-icon>

            </div>
            <p class="commandelivrtext" >En cours de traitement</p>
        </aside>
        <aside class="commanderecue" id="encoursdeT" style="display:none;">
        <div class="leftcommandeencours">
            <img src="/assets/images/icones-vendeurs2/Valide.svg" style="margin-top:12px;margin-left:14px;">
        </div>
        <p class="commandeencourstext">En cours de traitement</p>
        </aside>

            <aside class="commanderecue" id="commanderecue1">
            <div class="leftcommandeencours">
                <img src="/assets/images/icones-vendeurs2/Valide.svg" style="margin-top:12px;margin-left:14px;">
            </div>
            <p class="commandeencourstext">Commande reçue</p>
        </aside>



        </article>
       </section>

        {{-- MON DEROULE 2 --}}
        <section class="monderoule1" id="monderoule2" >
            {{-- DROITE --}}
            <article class="infocliff">
                <div class="textenteteinfo">
                    <p class="penteteinfo">Information du client :</p>
                </div>
                <div class="group3">
                    <img src="/assets/images/icones-vendeurs2/user copy 2.svg" style="margin-left:10px;margin-top:10px;">
                    <img src="/assets/images/icones-vendeurs2/placeholder copy 2.svg" style="margin-left:10px;margin-top:29px;">
                    <img src="/assets/images/icones-vendeurs2/telephone.svg" style="margin-left:10px;margin-top:29px;">
                </div>
                <div style="margin-top:-120px;margin-left:46px;">
                <p class="textcolora4"  style="margin-top:14px;">Nom &<br>
                    prénom</p>
                <p class="textcolora4"  style="margin-top:12px;">Adresse du<br>
                    Client</p>
                <p class="textcolora4"  style="margin-top:12px;">N° portable</p>
            </div>
            </article>
            <article class="infoexpe">
                <div class="textenteteinfo">
                    <p class="penteteinfo">Information d’expédition :</p>
                </div>
                <div class="group3">
                    <img src="/assets/images/icones-vendeurs2/user copy 2.svg" style="margin-left:10px;margin-top:10px;">
                    <img src="/assets/images/icones-vendeurs2/placeholder copy 2.svg" style="margin-left:10px;margin-top:29px;">
                    <img src="/assets/images/icones-vendeurs2/telephone.svg" style="margin-left:10px;margin-top:29px;">
                </div>
                <div style="margin-top:-120px;margin-left:46px;">
                    <p class="textcolora4"  style="margin-top:14px;">Nom &<br>
                        prénom</p>
                    <p class="textcolora4"  style="margin-top:12px;">Adresse du<br>
                        Client</p>
                    <p class="textcolora4"  style="margin-top:12px;">N° portable</p>
                </div>
            </article>



            {{-- RESUME2 --}}
            <article class="resumecom">

            <div style="height:32px;width:701px;border-bottom:1px solid #D8D8D8;padding-top:10px;">
                <p class="texteresumecom">RÉSUMÉ DE LA COMMANDE</p>
            </div>
            <div style=" height: 32px;width:701px;border-bottom:1px solid #D8D8D8;  background-color: #F8F8F8; padding-top:5px;">                          <label class="petittextebleu" style="margin-left:54px;">Référence</label>
                <label class="petittextebleu" style="margin-left:45px;">Article(s)</label>
                <label class="petittextebleu" style="margin-left:230px;">Quantité</label>
                <label class="petittextebleu" style="margin-left:30px;">Prix unitaire</label>
                <label class="petittextebleu" style="margin-left:51px;">Prix total</label>
            </div>

            {{-- CONTENU TABLEAU --}}
            <div style="height:255px;overflow-y:auto;overflow-x:hidden;">

            <aside class="malignederesume2" id="maligneresume2A">
                <article class="checkcontenu" >
                <input type="checkbox"
                class="checkcommande form-check-input"  onclick="validecommande2A()">
                </article>
                <article class="refcontenu">
                <p class="contenu1">7401048741</p>
                </article>
                <article class="informationcontenu">
                <aside class="boxcontenu2"></aside>
                <p class="contenu2">Support réglable pour Echo<br>
                    Show 5 (2e génération) | Bleu</p></article>

                <article class="quantitecontenu">  <p class="contenu4">999</p></article>
                <article class="prixcontenu"><p class="contenu5">999.999 Fcfa</p></article>
                <article class="prixtotalcontenu"><p class="contenu5">999.999 Fcfa</p></article>
             </aside>

            <aside class="malignederesume"id="maligneresume1A" style="display: none;">
                <p class="textcolorresume">J’ai vérifié ce produit, il est prêt à etre livré.</p>
            </aside>


            <aside class="malignederesume2" id="maligneresume2BB">
                <article class="checkcontenu" >
                    <input type="checkbox"
                    class="checkcommande form-check-input"  onclick="validecommande2B()">
                </article>
                <article class="refcontenu">
                    <p class="contenu1">7401048741</p>
                </article>
                <article class="informationcontenu">
                    <aside class="boxcontenu2"></aside>
                    <p class="contenu2">Support réglable pour Echo<br>
                    Show 5 (2e génération) | Bleu</p></article>

                <article class="quantitecontenu">  <p class="contenu4">999</p></article>
                <article class="prixcontenu"><p class="contenu5">999.999 Fcfa</p></article>
                <article class="prixtotalcontenu"><p class="contenu5">999.999 Fcfa</p></article>
                </aside>

                <aside class="malignederesume"id="maligneresume1BB" style="display: none;">
                    <p class="textcolorresume">J’ai vérifié ce produit, il est prêt à etre livré.</p>
                </aside>

                <aside class="malignederesume2" id="maligneresume2D">
                <article class="checkcontenu" >
                    <input type="checkbox"
                    class="checkcommande form-check-input"  onclick="validecommande2D()">
                </article>
                <article class="refcontenu">
                    <p class="contenu1">7401048741</p>
                </article>
                <article class="informationcontenu">
                    <aside class="boxcontenu2"></aside>
                    <p class="contenu2">Support réglable pour Echo<br>
                    Show 5 (2e génération) | Bleu</p></article>

                <article class="quantitecontenu">  <p class="contenu4">999</p></article>
                <article class="prixcontenu"><p class="contenu5">999.999 Fcfa</p></article>
                <article class="prixtotalcontenu"><p class="contenu5">999.999 Fcfa</p></article>
                </aside>
                <aside class="malignederesume"id="maligneresume1D" style="display: none;">
                    <p class="textcolorresume">J’ai vérifié ce produit, il est prêt à etre livré.</p>
                </aside>

                <aside class="malignederesume2" id="maligneresume2C">
                <article class="checkcontenu" >
                    <input type="checkbox"
                    class="checkcommande form-check-input"  onclick="validecommande2C()">
                </article>
                <article class="refcontenu">
                    <p class="contenu1">7401048741</p>
                </article>
                <article class="informationcontenu">
                    <aside class="boxcontenu2"></aside>
                    <p class="contenu2">Support réglable pour Echo<br>
                        Show 5 (2e génération) | Bleu</p></article>

                <article class="quantitecontenu">  <p class="contenu4">999</p></article>
                <article class="prixcontenu"><p class="contenu5">999.999 Fcfa</p></article>
                <article class="prixtotalcontenu"><p class="contenu5">999.999 Fcfa</p></article>
                </aside>
                <aside class="malignederesume"id="maligneresume1C" style="display: none;">
                    <p class="textcolorresume">J’ai vérifié ce produit, il est prêt à etre livré.</p>
                </aside>

                </div>
            </article>
    {{-- GAUCHE --}}
    <article class="numerosuivi" style="margin-top:-322px;">
        <aside class="  height: 32px;
        width: 266px;
        border-radius: 6px 6px 0 0;
        background-color: #FFFFFF;">

        <label class="petittextebleu" style="float: left;margin-left:10px;margin-top:10px;">N° de suivi de la commande :</label>
        <label class="textcolora4" style="float: right;margin-right:50px;margin-top:10px;">N/A</label>
        </aside>
        <aside style=" height: 32px;
        width: 266px;
        border-radius: 0 0 6px 6px;
        background-color: #F8F8F8;">
            <label class="petittextebleu" style="float: left;margin-left:10px;margin-top:10px;">Date prévue :</label>
            <label class="textcolora4" style="float: right;margin-right:50px;margin-top:10px;">N/A</label>

        </aside>
    </article>

    <article class="cochesuivi" >
        <aside class="commandeexped" id="commandeexpe2A">
        <div class="leftcommandeexpe">
        <script src="https://cdn.lordicon.com/xdjxvujz.js"></script>
        <lord-icon
        src="https://cdn.lordicon.com/mwqnntww.json"
        trigger="loop"
        delay="1000"
        colors="primary:#ff9500"
        style="width:28px;height:28px;margin-top:10px;margin-left:10px;">
        </lord-icon>
        </div>
            <p class="commandeexpetext">Commande expédiée</p>
        </aside>
        <aside class="commandeannul" id="commandeannul2">
            <div class="leftcommandeannul">
                <img src="/assets/images/cancel.svg" style="margin-top:12px;margin-left:14px;">
            </div>
            <p class="commandeannultext">Commande annulée</p>
        </aside>
        <aside class="commandelivr" id="commandelivr2">
            <div class="leftcommandelivr">
                <script src="https://cdn.lordicon.com/xdjxvujz.js"></script>
                <lord-icon
                src="https://cdn.lordicon.com/mwqnntww.json"
                trigger="loop"
                delay="1000"
                colors="primary:#ff9500"
                style="width:28px;height:28px;margin-top:10px;margin-left:10px;">
                </lord-icon>
            </div>
            <p class="commandelivrtext">Commande livrée</p>
        </aside>

        </article>
        </section>
        </section>
