

    <style>
        @import url('https://fonts.googleapis.com/css2?family=Roboto&display=swap');
        .modal-content-commande-marchand,
        .modal-body-commande-marchand {
            height: 100vh!important;
            width: 301px!important;
            border-radius: 6px;
            background-color: #F5F5F5;
            box-shadow: 0 5px 15px 0 rgba(0, 0, 0, 0.35);
        }

        .modal-content {
            /* background-color: #191970; */
        }

        .modal-body {
            margin: 0px;
            padding: 0px;
        }

        .modal-commande-marchand {
            position: absolute;
            top: 0px !important;
            margin-top: 0px !important;
            float: right;
            /* right: 60px; */
            right: 0px;
        }

        .entetecom{
            height: 84px;
            width: 301px;
            background-color: #191970;
            box-shadow: 0 1px 1px 0 #C7C7C7;
            padding-top:34px;
        }
        .newcommande{
            height: 132px;
            width: 281px;
            border-radius: 6px;
            background-color: #FFFFFF;
            margin-top: 10px;
            margin-left:10px;
        }

        .nouvellecom{
            color: #1A7EF5;
            font-family: Roboto;
            font-size: 13px;
            font-weight: 500;
            letter-spacing: 0;
            line-height: 13px;
            margin-top:10px;
            margin-left:8px;
        }
        
        .ilyaqqsec{
            color: #4A4A4A;
            font-family: Roboto;
            font-size: 10px;
            font-weight: 500;
            letter-spacing: 0;
            line-height: 8px;
            text-align: right;
            float:right;
             margin-right: 8px;
             margin-top:-25px;
        }
        .photocom{
            box-sizing: border-box;
            height: 101px;
            width: 72px;
            border: 1px solid #9B9B9B;
            border-radius: 6px;
            background-color: #FFFFFF;
            margin-left:8px;
            margin-top:-10px;

        }
        .photocom2{
            box-sizing: border-box;
            height: 101px;
            width: 190px;
            border: 1px solid #9B9B9B;
            border-radius: 6px;
            background-color: #FFFFFF;
            float:right;
            margin-right:5px;
            margin-top:-101px;
        }
        .maphoto{
            box-sizing: border-box;
            height: 52px;
            width: 52px;
            border: 1px solid #9B9B9B;
            border-radius: 6px;
            background-color: #D8D8D8;
            margin-top: 24px;
            margin-left:9px;
            position:relative;
        }
        .maphoto1{
            box-sizing: border-box;
            height: 52px;
            width: 52px;
            border: 1px solid #9B9B9B;
            border-radius: 6px;
            background-color: #D8D8D8;
            margin-top: 34px;
            margin-left:7px;
            position:relative;
        }
        .maphoto2{
            box-sizing: border-box;
            height: 52px;
            width: 52px;
            border: 1px solid #9B9B9B;
            border-radius: 6px;
            background-color: #D8D8D8;
            margin-top:24px;
            margin-left:13px;
            position:absolute;
        }
        .maphoto3{
            box-sizing: border-box;
            height: 52px;
            width: 52px;
            border: 1px solid #9B9B9B;
            border-radius: 6px;
            background-color: #D8D8D8;
            margin-top:14px;
            margin-left:7px;
            position:absolute;
        }
        .infocom{
            height: 24.75px;
            width: 188px;
            background-color: #FFFFF;
            margin-top:0px;
        }
        .infocomgris{
            height: 24.75px;
            width: 187px;
            background-color: #F8F8F8;
            margin-left:1px;

        }
       .infocomtextb{

        color: #191970;
        font-family: Roboto;
        font-size: 11px;
        font-weight: 500;
        letter-spacing: 0;
        line-height: 11px;
        margin-left: 15px;
        margin-top: 7px;
       }
       .infocomtextn{
        color: #4A4A4A;
        font-family: Roboto;
        font-size: 11px;
        font-weight: 500;
        letter-spacing: 0;
        line-height: 11px;
        float: right;
        margin-right:30px;
        margin-top:7px;
       }
    </style>

        <!-- The Modal -->
        <div class="modal" id="MesComMarch">
            <div class="modal-dialog modal-commande-marchand">
                <div class="modal-content modal-content-commande-marchand">
                    <div class="entetecom">
                         <p style="color: #FFFFFF;
                         font-family: Roboto;
                         font-size: 16px;
                         font-weight: bold;
                         letter-spacing: -0.39px;
                         line-height: 19px;
                         text-align: center;
                       ">LISTE DES COMMANDES</p>
                    </div>
                
               
                    <a style=" color: #9B9B9B;
                    font-family: Roboto;
                    font-size: 16px;
                    font-weight: 500;
                    letter-spacing: -0.39px;
                    line-height: 17px;
                    text-align: center;margin-top:320px;margin-left:67px;margin-right:67px;text-decoration:none;" id="contenucom1" onclick="suitecommande()" >
                        DÉSOLÉ,<br>VOUS N'AVEZ AUCUNE COMMANDE EN COURS

                    </a>
                    <div id="contenucom2" style="display: none;">
                        
                    <section class="newcommande" >
                        <a style="text-decoration:none;cursor:pointer;" onclick="showcom2()">
                        <p class="nouvellecom">Nouvelle commande</p>
                        <p class="ilyaqqsec">il y a quelques secondes</p>

                        <article class="photocom">
                            <aside class="maphoto"></aside>
                        </article>
                        <article class="photocom2">
                            <aside class="infocom">
                                <label class="infocomtextb">N° Commande: </label>
                                <label class="infocomtextn">7401048741</label>
                            </aside>
                            <aside class="infocomgris">
                                <label class="infocomtextb">Nombre d’article(s) : </label>
                                <label class="infocomtextn">01</label>
                            </aside>
                            <aside class="infocom">
                                <label class="infocomtextb">Suivit : </label>
                                <label class="infocomtextn">Non</label>
                            </aside>
                            <aside class="infocomgris">
                                <label class="infocomtextb">À livré avant:</label>
                                <label class="infocomtextn" style="margin-top:-20px;"> 13h 30</label>
                            </aside>
                        </article>
                    </a>
                    </section>

                    <section class="newcommande" >
                        <a style="text-decoration:none;cursor:pointer;" onclick="showcom2()"> 
                        <p class="nouvellecom">Nouvelle commande</p>
                        <p class="ilyaqqsec">il y a 2 min</p>

                        <article class="photocom">
                            <aside class="maphoto3"></aside>
                            <aside class="maphoto2"></aside>
                             <aside class="maphoto1"></aside>
                        </article>
                        <article class="photocom2">
                            <aside class="infocom">
                                <label class="infocomtextb">N° Commande: </label>
                                <label class="infocomtextn">7401048741</label>
                            </aside>
                            <aside class="infocomgris">
                                <label class="infocomtextb">Nombre d’article(s) : </label>
                                <label class="infocomtextn">03</label>
                            </aside>
                            <aside class="infocom">
                                <label class="infocomtextb">Suivit : </label>
                                <label class="infocomtextn">Non</label>
                            </aside>
                            <aside class="infocomgris">
                                <label class="infocomtextb">À livré avant:</label>
                                <label class="infocomtextn" style="margin-top:-20px;"> 13h 30</label>
                            </aside>
                        </article>
                        </a>
                    </section>

                    <section class="newcommande" >
                        <a style="text-decoration:none;cursor:pointer;" onclick="showcom2()">
                        <p class="nouvellecom">Nouvelle commande</p>
                        <p class="ilyaqqsec">il y a quelques secondes</p>

                        <article class="photocom">
                            <aside class="maphoto"></aside>
                        </article>
                        <article class="photocom2">
                            <aside class="infocom">
                                <label class="infocomtextb">N° Commande: </label>
                                <label class="infocomtextn">7401048741</label>
                            </aside>
                            <aside class="infocomgris">
                                <label class="infocomtextb">Nombre d’article(s) : </label>
                                <label class="infocomtextn">01</label>
                            </aside>
                            <aside class="infocom">
                                <label class="infocomtextb">Suivit : </label>
                                <label class="infocomtextn">Non</label>
                            </aside>
                            <aside class="infocomgris">
                                <label class="infocomtextb">À livré avant:</label>
                                <label class="infocomtextn" style="margin-top:-20px;"> 13h 30</label>
                            </aside>
                        </article>
                        </a>
                    </section>
                    </div>
                   
                </div>
                </div>

            </div>

            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js " integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM " crossorigin="anonymous "></script>

<script>
    function suitecommande(){
        $('#contenucom1').hide();
        $('#contenucom2').show();
    }
   
    function showcom2(){
        $('#commandedet').modal('show');
        $('#MesComMarch').hide();

    }
</script>