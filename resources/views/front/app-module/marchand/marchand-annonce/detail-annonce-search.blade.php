 <style>
        @import url('https://fonts.googleapis.com/css2?family=Roboto&display=swap');

</style>
<script  src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script>
    $(document).ready(function(){
        $("button").click(function(){
            $("#p").slideToggle("slow");
        });
    });
    </script>

    <script>
        $(document).ready(function(){
        $("#searchProduitBar").click(function(){
          $("#p").slideToggle("slow");
        });
      });
    </script>

    <style>
        .popupannonce-main {
            position: absolute;
            vertical-align: top;
            width: 100%; background: rgba(255, 255, 255, .9);
             height: 100vh; bottom: 1px; z-index: 2000; display:none
        }

        .close-seach-product-custom {
            width: 35px; height: 35px; color: #fff;
            background-color: #1A7EF5; text-align: center;
            padding-top: 5px; border-radius: 50%;
            position:absolute;
            float: right;
            right: 85px;
            margin-top: 36px;
        }

        .creer-votre-annonce {
            color: #191970; font-family: Roboto; font-size: 24px;
            font-weight: 500; letter-spacing: -0.58px; line-height: 28px;
            margin-top:50px;text-align:center;
            margin-bottom: 10px;
        }

        .first-search-element {
            width: 648px;
            height:auto;
            border-radius: 0 0 6px 6px;
            background-color:white;
            border:0px solid #d8D8D8;
            margin-top: -17px;
            box-shadow: 0 5px 15px 0 rgba(0,0,0,0.5);
            position: relative;
            margin-left: auto;
            margin-right: auto;
        }

        .pouvez-vous-ete-precis {
            color: #191970;
            font-family: Roboto;
            font-size: 16px;
            font-weight: 500;
            letter-spacing: -0.39px;
            line-height: 19px;margin-left:20px;margin-top:20px; position: relative; top: 10px
        }

        .article-etre-plus-precis {
            width:646px;height:71px; border-bottom:1px solid #fff;
            position: relative; top: 13px;
        }

        .detail-supp-optimiser {
            color: #9B9B9B;
            font-family: Roboto;
            font-size: 13px;
            letter-spacing: -0.31px;
            line-height: 15px;;margin-left:20px;
        }

        .nous-avons-plus-suggestion {
            color: #191970;
            font-family: Roboto;
            font-size: 16px;
            font-weight: 500;
            letter-spacing: -0.39px;
            line-height: 19px;margin-left:20px;margin-top:20px; position: relative; top:10px
        }

        .cliquer-sur-img {
            color: #9B9B9B;
            font-family: Roboto;
            font-size: 13px;
            letter-spacing: -0.31px;
            line-height: 15px;;margin-left:20px;
        }

        .resultat-suggestion-produit {
            margin-bottom: 10px; padding-bottom: 10px;
            padding-top: 10px
        }

        .produit-search-container {
            height: 450px;
            width: 856px;border:1px solid #D8D8D8;
            border-radius:6px;
            position: relative;
            top: 52px; background-color: #fff;
            padding-top: 0;
            margin-left: auto;
            margin-right: auto;
        }

        .section-search-container {
            margin-top:0px;  height: 60px;
            width: 854px;
            border-bottom: 1px solid #D8D8D8;
            border-radius: 6px 6px 0 0;
            background-color: #fff;
        }

        .rechercher-un-objet-similaire {
            color: #4A4A4A;
            font-family: Roboto;
            font-size: 14px;
            font-weight: 300;
            letter-spacing: -0.48px;
            line-height: 16px;margin-left:20px;
            position: relative; top: 23px
        }

        .suggestion-search-btn {
            background-color: #1A7EF5;
            height: 33px; width: 46px; border-radius: 6px;
           border: none; position: relative;
        }

        .disabled-search{
            background-color: #ccc !important;
            pointer-events: none;
        }

        .suggestion-search-btn:hover {
            background-color: #146FDA;
        }

        .suggestion-search-btn-focus {
            background-color: #2C3EDD !important;
        }

        .close-seach-product-custom:hover {
            background-color: #146FDA;
        }

        .close-seach-product-custom:focus {
            background-color: #2C3EDD;
        }

        .suggestion-input-search {
            height: 33px;
            width: 648px;
            border-radius: 6px;
            background-color: #F5F5F5;
            padding-left:10px;
            color:#000
        }

        .suggestion-input-btn-section {
            width: 700px;
            height: 34px;
            display: flex;
            position: relative;
            margin-left: auto;
            margin-right: auto;
            align-content: center;
            justify-content: center;
        }

    </style>

    <div id="popupannonce-recheche" class="s-none popupannonce-main">
        <p class="close-search-product close-seach-product-custom" id="close-search-product">
            <img src="assets/images/white-close-x.svg" >
        </p>
        <div class="creer-votre-annonce">Créer votre annonce</div>

    <div class="suggestion-input-btn-section">
    <div class="input-suggestion-element">
        <input  class="search suggestion-input-search" id="searchProduitBar"  type="text"
        name="search" placeholder="Dites-nous ce que vous vendez" >
        <i onclick="clearSearchText()" class="clean-text-suggestion s-none" style="position: absolute; margin-left: -25px; background-color: #f5f5f5; margin-top: 10px">
        <img src="assets/images/icones-vendeurs2/Ferme.svg" ></i>

    <input id="idsouscategorieSearch" type="hidden" value="" />
    <section id="result-sous-categorie-section" class="s-none first-search-element">
        <div class="results-header-visible">
            <article class="article-etre-plus-precis">
                <p style="" class="pouvez-vous-ete-precis">Pouvez-vous être plus précis ?</p>
                <p class="detail-supp-optimiser">Des détails supplémentaires permettront d’optimiser votre annonce</p>
                </article>
        </div>

        <div class="no-results-header s-nones">
            <article style="width:646px;height:80px; position: relative; top: 13px">
            <p class="nous-avons-plus-suggestion">Nous n'avons plus de suggestions
            <img src="assets/images/icones-vendeurs2/bleu-arrow1.svg" ></p>
            <p class="cliquer-sur-img">Cliquez sur <img src="assets/images/icones-vendeurs2/Recherche-gray.svg" width="16.34px" height="17px">  pour afficher les résultats possible</p>
            </article>
        </div>

        <div class="resultat-element resultat-suggestion-produit" >

        </div>

    </article>
    </section>
    </div>
         <div class="btn-search-suggestion-element" style="margin-left: 5px">
            <button class="search-button suggestion-search-btn disabled-search"  onclick="searchProductBySousCategoris()">
        <img src="assets/images/icones-vendeurs2/Recherche.svg" >
     </button>
         </div>
    </div>

    <div class="produit-search-container s-none">
    <section class="section-search-container"><p class="rechercher-un-objet-similaire">Rechercher un objet similaire pour commencer votre annonce</p>
        <style>
            .creer-une-annonce {
                height: 40px;
                width: 201px;
                border: 1px solid #1A7EF5;
                border-radius: 6px;
                background-color: #FFFFFF;margin-left:640px; position: relative; top: -23px
            }

            .creer-une-annonce:hover {
                background-color: #f8f8f8;
                cursor: pointer;
            }

            .creer-annonce-plus {
                color: #1A7EF5;
                font-family: Roboto;
                font-size: 20px;
                font-weight: 500;
                letter-spacing: -0.34px;
                line-height: 18px;text-align:left;margin-left:20px; position: relative; top: 6px;
                position: relative;
                left: 15px
            }

            .creer-annonce-p-2 {
                color: #1A7EF5;
                font-family: Roboto;
                font-size: 14px;
                font-weight: 500;
                letter-spacing: -0.34px;
                line-height: 18px;margin-left:50px;
                position: relative; top: -28px
            }

            .search-element-zone {
                display: grid; grid-template-columns: 400px 400px;
                column-gap:20px; height:388px; overflow-y:auto; overflow-x:hidden; padding-left: 11px; padding-top: 10px
            }

            .add-gray {
                background-color: #ccc;
            }

        </style>
        <div class="creer-une-annonce" id="creer-nouvelle-annonce">
            <p class="creer-annonce-plus"> + </p><p class="creer-annonce-p-2" >Créer une annonce<p>
        </div>
    </section>

        <div class="search search-element-zone" id="search-product-result11">
        </div>
  </div>
</div>



