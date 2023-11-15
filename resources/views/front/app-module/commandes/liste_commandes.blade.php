@extends('front.layout.main-layout')

@section('contenu')
    <div class="admin-commande-main-table" >
    <style>

    .btn-commande {
        border: transparent;
        position: relative;
        margin-left: auto;
        margin-right: auto;
        align-self: center;
        margin-left: 40%;
    }

    .admin-commande-main-table {
        width: 90%;
        position: relative;
        margin-left: auto;
        margin-right: auto;
    }

    .td-section:hover {
        background-color: #D8D8D8;
    }

    .admin-line-commande:hover {
        background-color: #D8D8D8;
        cursor: pointer;
    }

    .hide-commande-tr {
        display: none !important;
    }

    .parent-line-commande-hovered {
        background-color: #D8D8D8;
    }

    @media screen and (min-width: 1920px)  {

    .table-content-admin {
        height: 700px !important;
        background-color:azure
    }

    /* .table-content {
        height: 441px;
        overflow-x: hidden;
        margin-top: -3px;
        border: 1px solid rgba(255, 255, 255, 0.3);
        position: relative;
        left: -1px;
    } */

    } 

    .table-content {
        height: 441px;
        overflow-x: hidden;
        margin-top: -3px;
        border: 1px solid rgba(255, 255, 255, 0.3);
        position: relative;
        left: -1px;
    }

    /* sets */
$gl-ms: "screen and (max-width: 23.5em)"; /* up to 360px */
$gl-xs: "screen and (max-width: 35.5em)"; /* up to 568px */
$gl-sm: "screen and (max-width: 48em)"; /* max 768px */
$gl-md: "screen and (max-width: 64em)"; /* max 1024px */
$gl-lg: "screen and (max-width: 80em)"; /* max 1280px */

/* table style */
table {
  border-spacing: 1;
  border-collapse: collapse;
  background: white;
  border-radius: 6px;
  overflow: hidden;
  max-width: 800px;
  width: 100%;
  margin: 0 auto;
  position: relative;
}

table * {
  position: relative;
}

td,
th {
  padding-left: 8px;
}

thead tr {
  height: 60px;
  /* background: #FFED86; */
  border-bottom: 1px solid #E3F1D5;
  font-size: 16px;
}

tbody tr {
  height: 48px;
  border-bottom: 1px solid #E3F1D5;
}

tbody tr:last-child {
  border: 0;
}

td,
th {
  text-align: left;
}

td.l,
th.l {
  text-align: right;
}

td.c,
th.c {
  text-align: center;
}

td.r,
th.r {
  text-align: center;
}

@media #{$gl-xs} {
  table {
    display: block;
  }

  table *,
  tr,
  td,
  th {
    display: block;
  }

  thead {
    display: none;
  }

  tbody tr {
    height: auto;
    padding: 8px 0;
  }

  td {
    padding-left: 45%;
    margin-bottom: 12px;
  }

  td:last-child {
    margin-bottom: 0;
  }

  td:before {
    position: absolute;
    font-weight: 700;
    width: 40%;
    left: 10px;
    top: 0;
  }

  td:nth-child(1):before {
    content: "Code";
  }

  td:nth-child(2):before {
    content: "Stock";
  }

  td:nth-child(3):before {
    content: "Cap";
  }

  td:nth-child(4):before {
    content: "Inch";
  }

  td:nth-child(5):before {
    content: "Box Type";
  }
}

/* body style */
body {
  /* background: #9BC86A; */
  font: 400 14px 'Calibri', 'Arial';
  padding: 20px;
}

blockquote {
  color: white;
  text-align: center;
}


    </style>

    <div class="list-commandes" style="background-color: honeydew">
        <button class="btn-commande" id="admin_liste_des_toutes_active"  style="background-color: transparent" onclick="trgHandler()">LISTE DE TOUTES LES COMMANDES</button>
        <input type="checkbox" id="tm_myCheck" onclick="trgHandler()">
        <span id="tm_span_all_commande"></span>

    </div>

    <div class="main-commande-admin-table-section">
        <div class="maGdiv">

            <div class="table-header">
              <table cellpadding="0" cellspacing="0" border="0" style="z-index: 1">
                <thead>
                  <tr>

                      <td class="tab-comm-element" style="width: 5.4%" >N°</td>
                      <td class="tab-comm-element" style="width: 20.5%" >Nom et prénom</td>

                      <td class="tab-comm-element" style="width: 20.5%" >Marchand</td>

                      <td class="tab-comm-element" style="width: 20.5%" >Adresse de Livr.</td>
                      <td class="tab-comm-element" style="width: 10%" >Montant </td>

                      <td class="tab-comm-element" style="width: 10%" >Statut Paiement </td>

                      <td class="tab-comm-element" style="width: 3.6%"> Mode </td>

                      <td class="tab-comm-element" >Durée </td>

                  </tr>
                </thead>
            </table>
            </div>
            <div class="table-content table-content-admin" style="height: 510px">
              <table cellpadding="0" cellspacing="0" border="0" id="admin-commande-table">
                  <tbody id="admin-tab-client-commande">

                  </tbody>
              </table>
          </div>

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

                     <div class="unkown-overlay-div" id="overlay"></div>

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
                 <article class="cochesuivi">
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

          </div>
    </div>
    </div>

    <script>

    function trgHandler() {
      console.log('Nouvelle commande')
    }

    $(document).ready(function() {

    $.ajax({
    type: 'GET',
    url: '/get_all_admin_command',
    data: {},
    success: function(response) {

    $('#admin-tab-client-commande').empty();

    console.log('All commande => ', response)

    let client_commande = [];

    for (let index = 0; index < response.length; index++) {

    var mode_pay;

    var detail_commant_produit = response[index].commande_produit

    if(response[index].mode_payement == 'AirtelMoney') {
        mode_pay = '/assets/images/icons/AirtelMoney.svg'
    }else if(response[index].mode_payement == 'MoovMoney') {
        mode_pay = '/assets/images/icones-vendeurs2/Moovmoney.svg';
    }else if(response[index].mode_payement == 'VISA') {
        mode_pay = '/assets/images/icons/card-icon.svg'
    }

    var counter = index + 1

    let id_commande = response[index].id;

    client_commande += '<tr class="admin-line-commande" id="admin-line-commande-'+id_commande+'" onclick="affiche_produit_detail_admin('+id_commande+')">';

    client_commande += '<td style="width: 5.4%">'+ counter +'</td>'

    client_commande += '<td class="contenu1 td-section" style="width: 20.5%">'+response[index].nom+ ' ' +response[index].prenom+'</td>'

    client_commande += '<td class="contenu1 td-section" style="width: 20.5%">'+ response[index].nom_boutique + ' </td>'

    if (response[index].adresse == undefined) {
        client_commande += '<td class="td-section" style="width: 20.5%">---</td>'
    }else {
        client_commande += '<td class="td-section" style="width: 20.5%">'+response[index].adresse+'</td>'
    }
    

    client_commande += '<td class="td-section" style="width: 10.4%">'+response[index].totaf_facturation+ ' Fcfa</td>'

    if(response[index].status_payement == null) {
        client_commande += '<td class="td-section" style="width: 10%" >Non Payé</td>'
    }else {
        client_commande += '<td class="td-section" style="width: 10%" >Payé</td>'
    }

    client_commande += '<td class="td-section" style="width: 3.6%" ><img src = "'+mode_pay+'"></td>'

    client_commande += '<td class="td-section" >'+response[index].duree+'</td>'

    client_commande += '</tr>'

    if (detail_commant_produit.length > 0) {

        for (let j = 0; j < detail_commant_produit.length; j++) {
            client_commande += '<tr class="hide-commande-tr detail_produit_section" id="detail_produits_commande_element-'+id_commande+'" style="border:none"><td class="contenu1 td-section" style="border:none"></td><td class="contenu1 td-section" style="width: 110px; border:none">'+detail_commant_produit[j]['ref_produit']+'</td><td class="contenu4 td-section" style="width:347px; border:none"><article class="commande-information-prod" ><aside class="boxcontenu2-bis" style="margin-right: 10px; height: 34px; width:34px;"><img src="/'+detail_commant_produit[j]['image']+'" alt="" style="height: auto; width: 100%" /></aside><span class="contenu2 commande-libelle-prod-detail" style="text-align:left">'+detail_commant_produit[j]['libelle']+'</span></article></td><td class="contenu5 td-section" style="width: 72px; border:none">'+detail_commant_produit[j].quantite+'</td><td class="td-section detail-commade-price" style="border:none"> '+detail_commant_produit[j]['prix']+' Fcfa </td></tr>'
        }

    }

    }

    $('#admin-tab-client-commande').prepend(client_commande);

    }

    })
    })

  $(document).ready(function() {

    setInterval(() => {

        $.ajax({
        type: 'POST',
        url: '/write_data_infile',
        data: {},
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        success: function(response) {

        let client_commande = [];
        // location.reload();
        // document.getElementById("tm_myCheck").click();
        // $('#admin_liste_des_toutes_active')[0].click()
        // $('#audioPlayer')[0].click()

        // window.reload();
        // window.location.reload()
       
            // setTimeout(() => {
            // location.reload()
            // window.location.href = ''
            //  window.location.reload();
            // var mp3_sound = "/assets/mp3/beep-06.mp3"

            // var audio = new Audio(mp3_sound);
            // audio.muted = false;
             
            // audio.play();
        // }, 3000);

        if (response.length > 0) {

        for (let index = 0; index < response.length; index++) {

        if(response[index].mode_payement == 'AirtelMoney') {
            mode_pay = '/assets/images/icons/AirtelMoney.svg'
        }else if(response[index].mode_payement == 'MoovMoney') {
            mode_pay = '/assets/images/icones-vendeurs2/Moovmoney.svg';
        }else if(response[index].mode_payement == 'VISA') {
            mode_pay = '/assets/images/icons/card-icon.svg'
        }

        var mp3_sound = "/assets/mp3/beep-06.mp3"

        var audio = new Audio(mp3_sound);
        audio.muted = false;
        audio.play();

		var mode_pay;

        var detail_commant_produit = response[index].commande_produit

        var counter = index + 1

        let id_commande = response[index].id;

        client_commande += '<tr class="admin-line-commande" id="admin-line-commande-'+id_commande+'" onclick="affiche_produit_detail_admin('+id_commande+')">';

        client_commande += '<td>'+ id_commande +'</td>'

        client_commande += '<td class="contenu1 td-section" >'+response[index].nom+ ' ' +response[index].prenom+'</td>'

        client_commande += '<td class="contenu1 td-section" >'+ response[index].nom_boutique + ' </td>'

        client_commande += '<td class="td-section" >'+response[index].adresse+'</td>'

        client_commande += '<td class="td-section" >'+response[index].totaf_facturation+'</td>'

        if(response[index].status_payement == null) {
            client_commande += '<td class="td-section" >Non Payé</td>'
        }else {
            client_commande += '<td class="td-section" >Payé</td>'
        }

        client_commande += '<td class="td-section" style="width: 3.6%" ><img src = "'+mode_pay+'"></td>'

        client_commande += '<td class="td-section" >'+response[index].duree+'</td>'

        client_commande += '</tr>'

        if (detail_commant_produit.length > 0) {

        for (let j = 0; j < detail_commant_produit.length; j++) {
            client_commande += '<tr class="hide-commande-tr detail_produit_section" id="detail_produits_commande_element-'+id_commande+'" style="border:none"><td class="contenu1 td-section" style="border:none"></td><td class="contenu1 td-section" style="width: 110px; border:none">'+detail_commant_produit[j]['ref_produit']+'</td><td class="contenu4 td-section" style="width:347px; border:none"><article class="commande-information-prod" ><aside class="boxcontenu2-bis" style="margin-right: 10px; height: 34px; width:34px;"><img src="/'+detail_commant_produit[j]['image']+'" alt="" style="height: auto; width: 100%" /></aside><span class="contenu2 commande-libelle-prod-detail" style="text-align:left">'+detail_commant_produit[j]['libelle']+'</span></article></td><td class="contenu5 td-section" style="width: 72px; border:none">'+detail_commant_produit[j].quantite+'</td><td class="td-section detail-commade-price" style="border:none"> '+detail_commant_produit[j]['prix']+' Fcfa </td></tr>'
        }

        }

    }

    $('#admin-tab-client-commande').prepend(client_commande);

    }

    // console.log('Here return data => ', response)
    }

    })



    }, 15000);

  })


function affiche_produit_detail_admin(id_commande) {

    $('.detail_produit_section').addClass('hide-commande-tr')
    $('.admin-line-commande').removeClass('parent-line-commande-hovered')

    if ($('#admin-line-commande-'+id_commande).hasClass('parent-line-commande-hovered')) {
        console.log('He has classe')
        $('#admin-line-commande-'+id_commande).removeClass('parent-line-commande-hovered')
        $('#detail_produits_commande_element-'+id_commande).addClass('hide-commande-tr')
    }else {
        console.log('He dont have class')
        $('#admin-line-commande-'+id_commande).addClass('parent-line-commande-hovered')
        $('#detail_produits_commande_element-'+id_commande).removeClass('hide-commande-tr')
    }

}

    // var i = 0

    // setInterval(() => {
    //     i++;
    //     var commande_line = '<label>'+i+'</label><br>'
    //     $('.list-commandes').append(commande_line)
    // }, 1000);

    </script>
@endsection
{{-- <html>
    <head>

    </head>
    <body>
        <h1>Bienvenu dans votre dashboard</h1>
    </body>
</html> --}}
