

    <style>
        @import url('https://fonts.googleapis.com/css2?family=Roboto&display=swap');
        .modal-content-detail-annonce-expedition,
        .modal-body-detail-annonce-expedition {
            height: 100vh!important;
            width: 558px!important;
            border-radius: 6px;
            background-color: #FFFFFF;
            box-shadow: 0 5px 15px 0 rgba(0, 0, 0, 0.35);
        }



        .modal-body {
            margin: 0px;
            padding: 0px;
        }

        .modal-dialog-detail-annonce-expedition {
            /* position: relative;
            left: 370px;
            top: -30px; */
            position: absolute;
            top: 0px !important;
            margin-top: 0px !important;
            float: right;
            right: 60px;
        }

        .dtexpe {
            overflow-y: scroll;
            white-space: nowrap;
            overflow-x: hidden;
        }

        div.dtexpe{
            display: inline-block;
            float: none;
            height: calc(100vh - 100px) !important;
            width: 558px;
        }

        div.dtexpe::-webkit-scrollbar {
            width: 5px;
            border-radius: 3px;
            background-color: #D8D8D8;
        }

        div.dtexpe::-webkit-scrollbar-thumb {
            background: #9B9B9B;
            height: 20px;
            width: 3px;
            border-radius: 3px;
        }

        #form {
            color: #191970;
            font-family: Roboto;
            font-size: 14px;
            letter-spacing: -0.36px;
            line-height: 16px;
            padding: 10px
        }

        #form-select {
            color: #4A4A4A;
            font-family: Roboto;
            font-size: 14px;
            letter-spacing: -0.34px;
            line-height: 16px;
        }

        #file {
            cursor: pointer;
        }
        /* barre verticale*/
    </style>




        <!-- The Modal -->
        <div class="modal" id="dtexpedition">
            <div class="modal-dialog modal-dialog-detail-annonce-expedition">
                <div class="modal-content modal-content-detail-annonce-expedition">


                    <section style="width: 558px;height:100px; background-color:#191970;">
                        <p style="  color: #FFFFFF;
                       font-family: Roboto;
                       font-size: 21px;
                       font-weight: 500;
                       letter-spacing: 0;
                       line-height: 23px;
                       text-align: center;padding-top: 38px;">3- Information sur l'expedition</p>
                    </section>
                    <div class="dtexpe" style="background-color: #F8F8F8;">

                        <div style="border-left:3px solid #1A7EF5;padding-left:20px; border-top-left-radius: 2px;margin-top:10px">
                        <input class="form-check-input" type="checkbox"  style="  height: 18px;
                        width: 18px;
                        border-radius: 2px;
                        ;margin-top: 15px;margin-left:0px;">
                        <label class="form-check-label" for="defaultCheck1" style=" color: #000000;
                        font-family: Roboto;
                        font-size: 14px;
                        font-weight: 900;
                        letter-spacing: 0.31px;
                        line-height: 18px;margin-top: 15px;margin-left: 5px;">Expédition nationale</label>

                        <p style="  color: #000000;
                        font-family: Roboto;
                        font-size: 12px;
                        letter-spacing: 0.31px;
                        line-height: 18px;margin-top:10px;
                      ">Sélectionnez un service d’expédition avec un coût fixe ou bien proposez la livraison gratuite.</p>

                        {{-- debut card expedition antional  --}}
                      <div style="  height: auto;
                      width: 518px;  border: 1px solid #979797;
                        border-radius: 6px;
                        background-color: #fff;padding-top:20px ">

                        <div class="main-expedition-card" style="">
                            <section style="  height: 219px;
                            width: 260px;
                            border-right: 1px solid #979797;
                            background-color: #FFFFFF;">
                            <img src="assets/images/icones-vendeurs2/bateau.svg" style=" height: 27px;
                            width: 43.2px;margin-left:129px;margin-top:30px;">
                            <article style="  height: 20px;
                            width: 259px;
                            background-color: #F8F8F8;margin-top:15px;"><p style="

                               color: #000000;
                               font-family: Roboto;
                               font-size: 14px;
                               letter-spacing: 0.31px;
                               line-height: 14px;text-align:center;margin-left:-15px;">Envoie par </p>  <p style=" color: #191970;
                               font-family: Roboto;
                               font-size: 14px;
                               letter-spacing: 0.31px;
                               line-height: 14px;text-align:right;margin-top:-30px;margin-right:50px;padding:2px;">Voiture</p></article>

                               <article style="  height: 20px;
                               width: 259px;
                               background-color: #F8F8F8;margin-top:10px;"><p style="

                               color: #191970;
                               font-family: Roboto;
                               font-size: 12px;
                               letter-spacing: 0.26px;
                               line-height: 14px;
                               text-align: center;padding:2px;
                               ">30 Kg , L+I+H < 150 cm , L < 100 cm </p></article>

                               <article style="  height: 20px;
                               width: 259px;
                               background-color: #F8F8F8;margin-top:10px;padding:2px;"><p style="

                               color: #000000;
                               font-family: Roboto;
                               font-size: 12px;
                               font-weight: bold;
                               letter-spacing: 0.26px;
                               line-height: 14px;text-align:center;">1.500 Fcfa - 2.000 Fcfa</p></article>

                               <p style=" color: #1A7EF5;
                               font-family: Roboto;
                               font-size: 10px;
                               letter-spacing: 0.26px;
                               line-height: 11px;
                               text-align: center;margin-top:20px;">Modifier | Supprimer</p>
                           </section>

                           <section style="  height: 229px;
                           width: 217px;
                            background-color: #FFFFFF;margin-left:260px;margin-top:-219px">

                               <input class="form-check-input" type="checkbox"  style="  height: 18px;
                               width: 18px;
                               border-radius: 2px;
                               ;margin-top: 15px;margin-left:10px;">
                               <label class="form-check-label" for="defaultCheck1" style="   color: #191970;
                               font-family: Roboto;
                               font-size: 12px;
                               font-weight: 900;
                               letter-spacing: 0;
                               line-height: 14px;margin-top:15px">Vous payez</label>

                               <p style="  color: #4A4A4A;
                               font-family: Roboto;
                               font-size: 10px;
                               letter-spacing: 0;
                               line-height: 12px;margin-top:15px;margin-left:10px;">L’expédition est gratuite pour le client.<br>
                                   Frais calculés en fonction du lieu où il se trouve.</p>

                                   <hr style="  height: 1px;
                                   width: 162px;
                                   border: 1px solid #D8D8D8;
                                 margin-top:10px;margin-left:40px;">

                           <input class="form-check-input" type="checkbox"  style="  height: 18px;
                           width: 18px;
                           border-radius: 2px;
                           ;margin-top: 10px;margin-left:10px;">
                           <label class="form-check-label" for="defaultCheck1" style="   color: #191970;
                           font-family: Roboto;
                           font-size: 12px;
                           font-weight: 900;
                           letter-spacing: 0;
                           line-height: 14px;margin-top:10px;">Le client paie les frais de
                           livraison fixes</label>

                           <p style="  color: #4A4A4A;
                           font-family: Roboto;
                           font-size: 10px;
                           letter-spacing: 0;
                           line-height: 12px;margin-top:15px;margin-left:10px;">L’expédition est à prix fixes pour le client.<br>
                           Frais calculés en fonction du lieu où il se trouve.</p>

                           <input type="text" placeholder="-"  style="width: 126px;height:31px;border-bottom-left-radius: 5px;border-top-left-radius: 5px;font-size: 18px;border: 1px solid #9B9B9B;padding-left:10px;background-color: #D8D8D8;margin-left:30px;">


                           <aside style="
                               border: 1px solid #9B9B9B;text-align:center;  font-family: Roboto;
                               height:31px;width:57px;
                               font-size: 11px;
                               letter-spacing: -0.34px;
                               line-height: 16px;
                               border-radius: 0 6px 6px 0;
                               background-color: #D8D8D8;margin-left:155px;margin-top:-31px;padding-top:7px;">Fcfa (XAF)</aside>


                           </section>
                        </div> <hr>

                        <div class="main-expedition-card" style="">
                            <section style="  height: 219px;
                            width: 260px;
                            border-right: 1px solid #979797;
                            background-color: #FFFFFF;">
                            <img src="assets/images/icones-vendeurs2/bateau.svg" style=" height: 27px;
                            width: 43.2px;margin-left:129px;margin-top:30px;">
                            <article style="  height: 20px;
                            width: 259px;
                            background-color: #F8F8F8;margin-top:15px;"><p style="

                               color: #000000;
                               font-family: Roboto;
                               font-size: 14px;
                               letter-spacing: 0.31px;
                               line-height: 14px;text-align:center;margin-left:-15px;">Envoie par </p>  <p style=" color: #191970;
                               font-family: Roboto;
                               font-size: 14px;
                               letter-spacing: 0.31px;
                               line-height: 14px;text-align:right;margin-top:-30px;margin-right:50px;padding:2px;">Moto</p></article>

                               <article style="  height: 20px;
                               width: 259px;
                               background-color: #F8F8F8;margin-top:10px;"><p style="

                               color: #191970;
                               font-family: Roboto;
                               font-size: 12px;
                               letter-spacing: 0.26px;
                               line-height: 14px;
                               text-align: center;padding:2px;
                               ">30 Kg , L+I+H < 150 cm , L < 100 cm </p></article>

                               <article style="  height: 20px;
                               width: 259px;
                               background-color: #F8F8F8;margin-top:10px;padding:2px;"><p style="

                               color: #000000;
                               font-family: Roboto;
                               font-size: 12px;
                               font-weight: bold;
                               letter-spacing: 0.26px;
                               line-height: 14px;text-align:center;">1.500 Fcfa - 2.000 Fcfa</p></article>

                               <p style=" color: #1A7EF5;
                               font-family: Roboto;
                               font-size: 10px;
                               letter-spacing: 0.26px;
                               line-height: 11px;
                               text-align: center;margin-top:20px;">Modifier | Supprimer</p>

                           </section>

                           <section style="  height: 229px;
                           width: 217px;
                            background-color: #FFFFFF;margin-left:260px;margin-top:-219px">

                               <input class="form-check-input" type="checkbox"  style="  height: 18px;
                               width: 18px;
                               border-radius: 2px;
                               ;margin-top: 15px;margin-left:10px;">
                               <label class="form-check-label" for="defaultCheck1" style="   color: #191970;
                               font-family: Roboto;
                               font-size: 12px;
                               font-weight: 900;
                               letter-spacing: 0;
                               line-height: 14px;margin-top:15px">Vous payez</label>

                               <p style="  color: #4A4A4A;
                               font-family: Roboto;
                               font-size: 10px;
                               letter-spacing: 0;
                               line-height: 12px;margin-top:15px;margin-left:10px;">L’expédition est gratuite pour le client.<br>
                                   Frais calculés en fonction du lieu où il se trouve.</p>

                                   <hr style="  height: 1px;
                                   width: 162px;
                                   border: 1px solid #D8D8D8;
                                 margin-top:10px;margin-left:40px;">

                           <input class="form-check-input" type="checkbox"  style="  height: 18px;
                           width: 18px;
                           border-radius: 2px;
                           ;margin-top: 10px;margin-left:10px;">
                           <label class="form-check-label" for="defaultCheck1" style="   color: #191970;
                           font-family: Roboto;
                           font-size: 12px;
                           font-weight: 900;
                           letter-spacing: 0;
                           line-height: 14px;margin-top:10px;">Le client paie les frais de
                           livraison fixes</label>

                           <p style="  color: #4A4A4A;
                           font-family: Roboto;
                           font-size: 10px;
                           letter-spacing: 0;
                           line-height: 12px;margin-top:15px;margin-left:10px;">L’expédition est à prix fixes pour le client.<br>
                           Frais calculés en fonction du lieu où il se trouve.</p>

                           <input type="text" placeholder="-"  style="width: 126px;height:31px;border-bottom-left-radius: 5px;border-top-left-radius: 5px;font-size: 18px;border: 1px solid #9B9B9B;padding-left:10px;background-color: #D8D8D8;margin-left:30px;">


                           <aside style="
                               border: 1px solid #9B9B9B;text-align:center;  font-family: Roboto;
                               height:31px;width:57px;
                               font-size: 11px;
                               letter-spacing: -0.34px;
                               line-height: 16px;
                               border-radius: 0 6px 6px 0;
                               background-color: #D8D8D8;margin-left:155px;margin-top:-31px;padding-top:7px;">Fcfa (XAF)</aside>


                           </section>
                        </div>
                    <section style="  height: 36px;
                    width: 516px;
                    border-top: 1px solid #979797;
                    border-radius: 0 0 6px 6px;
                    background-color: #FFFFFF;">
                     <p style="  color: #1A7EF5;
                     font-family: Roboto;
                     font-size: 20px;
                     letter-spacing: 0;
                     line-height: 14px;text-align:left;margin-left:140px;padding-top:15px;">+</p>
                     <p style="  color: #1A7EF5;
                     font-family: Roboto;
                     font-size: 12px;
                     letter-spacing: 0;
                     line-height: 14px;text-align:center;padding-top:15px;margin-top:-43px;">  &nbsp&nbsp Ajouter un autre service d’expédition</p></section>
                    </div>

                </div>

                {{-- fin card expedition national  --}}


                        <div style="border-left:3px solid #1A7EF5;padding-left:20px; border-top-left-radius: 2px;margin-top:20px">
                            <input class="form-check-input" type="checkbox"  style="  height: 18px;
                            width: 18px;
                            border-radius: 2px;
                            ;margin-top: 15px;margin-left:0px;">
                            <label class="form-check-label" for="defaultCheck1" style=" color: #000000;
                            font-family: Roboto;
                            font-size: 14px;
                            font-weight: 900;
                            letter-spacing: 0.31px;
                            line-height: 18px;margin-top: 15px;margin-left: 5px;">Expédition internationale</label>

                            <p style="  color: #000000;
                            font-family: Roboto;
                            font-size: 12px;
                            letter-spacing: 0.26px;
                            line-height: 18px;
                          ">Les réglementations douanières varient d'un pays à l'autre et tous les transporteurs ne <br> desservent pas toutes les destinations. Vérifiez que votre annonce mentionne clairement qui<br> est responsable du paiement de ces frais supplémentaires.</p>

                    <div style="  height: 250px;
                    width: 518px;  border: 1px solid #979797;
                    border-radius: 6px;
                    background-color: #FFFFFF;padding-top:30px ">
                    <section style="  height: 180px;
                    width: 260px;
                    border-right: 1px solid #979797;
                    background-color: #FFFFFF;">

                    <aside style="width:240px; height:67px; background-color:#F8F8F8;margin-left:10px">
                    <img src="assets/images/icones-vendeurs2/camion.svg" style=" height: 27px;
                    width: 43.2px;margin-left:10px;margin-top:15px;">
                    <p style="  color: #191970;
                    font-family: Roboto;
                    font-size: 16px;
                    font-weight: bold;
                    letter-spacing: 0.35px;
                    line-height: 14px; margin-top:-30px; text-align:center;">UPS Express</p>
                     <p style="    color: #4A4A4A;
                     font-family: Roboto;
                     font-size: 10px;
                     letter-spacing: 0.22px;
                     line-height: 11px;; margin-top:-10px; text-align:center;margin-left:50px;">Information de suivi incluse : Oui</p>
                     <p style=" color: #1A7EF5;
                     font-family: Roboto;
                     font-size: 10px;
                     letter-spacing: 0.22px;
                     line-height: 11px;
                     text-align: center;margin-top:-10px;margin-left:15px;"> Modifier | Supprimer</p>



                    </aside>

                    <p style="  color: #000000;
                    font-family: Roboto;
                    font-size: 12px;
                    letter-spacing: 0.26px;
                    line-height: 10px;margin-left:15px;margin-top:30px;"> Lieu d’expédition internationale</p>
                    <select style="  height: 40.5px;
                    width: 220px;
                    border: 1px solid #979797;
                    border-radius: 6px;
                    background-color: #FFFFFF;  color: #000000;
                    font-family: Roboto;
                    font-size: 14px;
                    letter-spacing: 0.31px;
                    line-height: 16px;margin-left:15px;

                  "> <option selected>Monde entier/Afrique/Union…</option>
                                <option value="1">Gabon</option>
                                <option value="2">Mali</option></select>


                        </section>

                        <section style="  height: 180px;
                        width: 217px;
                        background-color: #FFFFFF;margin-left:260px;margin-top:-180px">

                        <input class="form-check-input" type="checkbox"  style="  height: 18px;
                        width: 18px;
                        border-radius: 2px;
                        ;margin-top: 15px;margin-left:10px;">
                        <label class="form-check-label" for="defaultCheck1" style="   color: #191970;
                        font-family: Roboto;
                        font-size: 12px;
                        font-weight: 900;
                        letter-spacing: 0;
                        line-height: 14px;margin-top:15px">Le client paie les frais de
                            livraison fixes</label>

                        <p style="  color: #4A4A4A;
                        font-family: Roboto;
                        font-size: 10px;
                        letter-spacing: 0;
                        line-height: 12px;margin-top:15px;margin-left:10px;">L’expédition est gratuite pour le client.<br>
                            Frais calculés en fonction du lieu où il se trouve.</p>




                        <input type="text" placeholder="-"  style="width: 156px;height:41px;border-bottom-left-radius: 5px;border-top-left-radius: 5px;font-size: 18px;border: 1px solid #9B9B9B;padding-left:10px;background-color: #D8D8D8;margin-left:20px;margin-top:35px;">


                        <aside style="
                        border: 1px solid #9B9B9B;text-align:center;  font-family: Roboto;
                        height:41px;width:65px;
                        font-size: 11px;
                        letter-spacing: -0.34px;
                        line-height: 16px;
                        border-radius: 0 6px 6px 0;
                        background-color: #D8D8D8;margin-left:175px;margin-top:-41px;padding-top:10px;">Fcfa (XAF)</aside>


                        </section>



                        <section style="  height: 36px;
                        width: 516px;
                        border-top: 1px solid #979797;
                        border-radius: 0 0 6px 6px;
                        background-color: #FFFFFF;">
                        <p style="  color: #1A7EF5;
                        font-family: Roboto;
                        font-size: 20px;
                        letter-spacing: 0;
                        line-height: 14px;text-align:left;margin-left:140px;padding-top:10px;">+</p>
                        <p style="  color: #1A7EF5;
                        font-family: Roboto;
                        font-size: 12px;
                        letter-spacing: 0;
                        line-height: 14px;text-align:center;padding-top:10px;margin-top:-43px;">  &nbsp&nbsp Ajouter une expédition internationale</p></section>
                        </div>

                         </div>
                         <div style="border-left:3px solid #1A7EF5;padding-left:20px; border-top-left-radius: 2px;margin-top:30px">
                            <p style="  color: #000000;
                            font-family: Roboto;
                            font-size: 14px;
                            font-weight: 900;
                            letter-spacing: 0.31px;
                            line-height: 18px;">Exclure des lieux de livraison</p>

                            <aside style="  height: 41px;
                            width: 510px;
                            border: 1px solid #1A7EF5;
                            border-radius: 6px;
                            background-color: #FFFFFF;"><p style="  color: #1A7EF5;
                            font-family: Roboto;
                            font-size: 14px;
                            letter-spacing: -0.34px;
                            line-height: 16px;text-align:center;padding-top:10px">Créer une liste d’exclusions</p></aside>
                         </div>






                        <div style="height:82px;padding-top:22px;padding-bottom:22px;;background-color:white;padding-left:10px;margin-top:20px;">
                            <button style="  height: 37px;
                      width: 203px;
                      border: 1px solid #1A7EF5;
                      border-radius: 6px;
                      background-color: #FFFFFF;  color: #1A7EF5;
                      font-family: Roboto;
                      font-size: 16px;
                      font-weight: 900;
                      letter-spacing: 0.35px;
                      line-height: 19px;
                      text-align: center;margin-left:15px;">Apperçu de l’annonce</button>

                        <button style="box-sizing: border-box;
                        height: 37px;
                        width: 135px;
                        border: 1px solid #1A7EF5;
                        border-radius: 6px;
                        background-color: #FFFFFF;  letter-spacing: 0.35px;
                        line-height: 19px;
                        text-align: center;
                        color: #1A7EF5">Retour </button>

                            <button style=" height: 37px;
                      width: 160px;
                      border-radius: 6px;
                      background-color: #1A7EF5;  color: #FFFFFF;
                      font-family: Roboto;
                      font-size: 16px;
                      font-weight: 900;
                      letter-spacing: 0.35px;
                      line-height: 19px;
                      text-align: center;border:1px solid  #1A7EF5;">Mettre en rayon</button>




                        </div>

                        </div>
                    </div>

                </div>








                <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js " integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM " crossorigin="anonymous "></script>


