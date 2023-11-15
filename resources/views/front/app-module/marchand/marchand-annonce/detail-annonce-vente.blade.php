

    <style>
        @import url('https://fonts.googleapis.com/css2?family=Roboto&display=swap');
        .modal-content-detail-annonce-vente,
        .modal-body-detail-annonce-vente {
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

        .modal-dialog-detail-annonce-vente {
            /* position: relative;
            left: 370px;
            top: -30px; */
            position: absolute;
            top: 0px !important;
            margin-top: 0px !important;
            float: right;
            right: 60px;
        }

        .dtvente {
            overflow-y: scroll;
            white-space: nowrap;
            overflow-x: hidden;
        }

        div.dtvente {
            display: inline-block;
            float: none;
            height: calc(100vh - 100px) !important;
            width: 558px;
        }

        div.dtvente::-webkit-scrollbar {
            width: 5px;
            border-radius: 3px;
            background-color: #D8D8D8;
        }

        div.dtvente::-webkit-scrollbar-thumb {
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
        <div class="modal" id="dtvente">
            <div class="modal-dialog modal-dialog-detail-annonce-vente">
                <div class="modal-content modal-content-detail-annonce-vente">


                    <section style="width: 558px;height:100px; background-color:#191970;">
                        <p style="  color: #FFFFFF;
                       font-family: Roboto;
                       font-size: 21px;
                       font-weight: 500;
                       letter-spacing: 0;
                       line-height: 23px;
                       text-align: center;padding-top: 38px;">2- Détails de la vente</p>
                    </section>
                    <div class="dtvente">
                        <section style="background-color: #F8F8F8; width: 558px;height: 152px;padding-top: 15px;">
                            <div style="border-left:3px solid #1A7EF5;padding-left:20px;padding-bottom: 5px; border-top-left-radius: 2px;">
                                <p style="  color: #000000;
                                font-family: Roboto;
                                font-size: 14px;
                                font-weight: 900;
                                letter-spacing: 0.31px;
                                line-height: 15px;">*Prix d’achat</p>
                                <div class="input-group input-group mb-3 ">

                                    <input type="text" class="form-control" placeholder="--"  style="width: 152px;height:41px;border-bottom-left-radius: 5px;border-top-left-radius: 5px;border: 1px solid #9B9B9B;">

                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="inputGroup-sizing" style="  color: #4A4A4A;
                                        font-family: Roboto;
                                        font-size: 14px;
                                        letter-spacing: -0.34px;
                                        line-height: 16px;background-color: #D8D8D8;width: 99px;height:41px;border-top-right-radius:5px;border-bottom-right-radius: 5px;margin-left: 152px;margin-top:0px;border: 1px solid #9B9B9B;">Fcfa (XAF)</span>
                                    </div>


                                </div>
                                <div class="container" style="margin-left: 250px;margin-top: -75px;">
                                    <p style="  color: #000000;
                                font-family: Roboto;
                                font-size: 14px;
                                font-weight: 900;
                                letter-spacing: 0.31px;
                                line-height: 15px;">*Quantité</p>
                                    <input type="text" value="" placeholder="1" style="height: 41px;
                                 width: 253px;
                                 border: 1px solid #979797;
                                 border-radius: 6px;
                                 background-color: #FFFFFF; padding: 10px;margin-top: -2px;">
                                </div>
                                <input class="form-check-input" type="checkbox" id="defaultCheck1" style="  height: 18px;
                                width: 18px;
                                border-radius: 4px;
                                ;margin-top: 25px;margin-left: 80px;">
                                <label class="form-check-label" for="defaultCheck1" style=" color: #000000;
                                font-family: Roboto;
                                font-size: 14px;
                                font-weight: 900;
                                letter-spacing: 0.31px;
                                line-height: 18px;margin-top: 26px;margin-left: 15px;">Vendre par lot</label>
                                <img src="assets/images/icones-vendeurs2/Information.svg" width="20px" height="20px" style="margin-left: 10px;">
                                <input type="text" value="Nombre d’objet dans le lot" style="height: 41px;
                                width: 253px;
                                border: 1px solid #979797;
                                border-radius: 6px;
                                background-color: #FFFFFF; padding: 10px;margin-left:20px;">
                            </div>
                        </section>

                        <hr style="  box-sizing: border-box;
                                 height: 1px;
                                 width: 366px;
                                 border: 1px solid #979797;margin-left:96px;">

                        <section style="  height: 265px;
                                 width: 558px ;padding-bottom: 10px;padding-top: 10px;
                                 background-color: #F8F8F8;">
                            <div style="border-left:3px solid #1A7EF5;padding-left:20px; border-top-left-radius: 2px;">

                                <input class="form-check-input" type="checkbox" id="defaultCheck1" style="  height: 18px;
                                width: 18px;
                                border-radius: 2px;
                                ;margin-top: 15px;margin-left: 10px;">
                                <label class="form-check-label" for="defaultCheck1" style=" color: #000000;
                                font-family: Roboto;
                                font-size: 14px;
                                font-weight: 900;
                                letter-spacing: 0.31px;
                                line-height: 18px;margin-top: 15px;margin-left: 5px;">NEGOCIATION DU PRIX D'ACHAT</label>
                                <p style="  color: #9B9B9B;
                                font-family: Roboto;
                                font-size: 14px;
                                letter-spacing: 0.31px;
                                line-height: 18px;margin-left: 35px;">Vendez plus facilement en permettant aux acheteurs de négocier le prix. <br>Vous pouvez accepter, refuser ou faire une contre-offre.<br> Autorisez les acheteurs à faire des offres. Si vous acceptez de recevoir<br> des offres,
                                    vous avez des chances en plus de vendre vos objets.</p>

                                <input class="form-check-input" type="checkbox" id="defaultCheck1" style="  height: 16px;
                                    width: 16px;
                                    border-radius: 2px;
                                    ;margin-top: 15px;margin-left: 25px;">
                                <label class="form-check-label" for="defaultCheck1" style=" color: #000000;
                                    font-family: Roboto;
                                    font-size: 14px;
                                    font-weight: 900;
                                    letter-spacing: 0.31px;
                                    line-height: 18px;margin-top: 15px;margin-left: 5px;">Accepter automatiquement les <br>offres d'au moins</label>

                                <div class="input-group input-group mb-3" style="margin-left: 265px;margin-top: -40px;">

                                    <input type="text" class="form-control" value="-" aria-describedby="inputGroup-sizing-sm" style="width: 152px;height:41px;border-bottom-left-radius: 5px;border-top-left-radius: 5px;font-size: 18px;border: 1px solid #9B9B9B;">

                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="inputGroup-sizing" style="  color: #4A4A4A;
                                            font-family: Roboto;
                                            font-size: 14px;
                                            letter-spacing: -0.34px;
                                            line-height: 16px;background-color: #D8D8D8;width: 99px;height:41px;border-top-right-radius:5px;border-bottom-right-radius: 5px;margin-left: 152px;margin-top:0px;border: 1px solid #9B9B9B;">Fcfa (XAF)</span>
                                    </div>


                                </div>


                                <input class="form-check-input" type="checkbox" id="defaultCheck1" style="  height: 16px;
                                width: 16px;
                                border-radius: 2px;
                                ;margin-top: 15px;margin-left: 25px;">
                                <label class="form-check-label" for="defaultCheck1" style=" color: #000000;
                                font-family: Roboto;
                                font-size: 14px;
                                font-weight: 900;
                                letter-spacing: 0.31px;
                                line-height: 18px;margin-top: 15px;margin-left: 5px;">Refuser automatiquement les <br>offres inférieures à </label>

                                <div class="input-group input-group mb-3" style="margin-left: 265px;margin-top: -25px;">

                                    <input type="text" class="form-control" value="-" aria-describedby="inputGroup-sizing-sm" style="width: 152px;height:41px;border-bottom-left-radius: 5px;border-top-left-radius: 5px;font-size: 18px; border: 1px solid #9B9B9B;margin-top: -17px;

                                    background-color: #D8D8D8;">

                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="inputGroup-sizing" style="  color: #4A4A4A;
                                        font-family: Roboto;
                                        font-size: 14px;
                                        letter-spacing: -0.34px;
                                        line-height: 16px;background-color: #D8D8D8;width: 99px;height:41px;border-top-right-radius:5px;border-bottom-right-radius: 5px;margin-left: 152px;margin-top:-17px;border: 1px solid #9B9B9B;">Fcfa (XAF)</span>
                                    </div>


                                </div>
                            </div>




                        </section>


                        <hr style="  box-sizing: border-box;
                        height: 1px;
                        width: 366px;
                        border: 1px solid #979797;margin-left:96px;">

                        <section style="  height: 240px;
                        width: 558px;
                        background-color: #F8F8F8;padding-top: 10px;padding-bottom: 10px;">
                            <div style="border-left:3px solid #1A7EF5;padding-left:5px; border-top-left-radius: 2px;">
                                <p style="  color: #000000;
                                font-family: Roboto;
                                font-size: 14px;
                                font-weight: 900;
                                letter-spacing: 0.31px;
                                line-height: 18px;">ACHAT MULTIPLE</p>

                                <input class="form-check-input" type="checkbox" id="defaultCheck1" style="  height: 16px;
                                width: 16px;
                                border-radius: 2px;
                                ;margin-top: 15px;margin-left: 10px;">
                                <label class="form-check-label" for="defaultCheck1" style=" color: #000000;
                                font-family: Roboto;
                                font-size: 14px;
                                font-weight: 900;
                                letter-spacing: 0.31px;
                                line-height: 18px;margin-top: 15px;margin-left:5px;">Offrez une réduction aux membres qui achètent plusieurs objets à la fois.</label> <br>

                                <input class="form-check-input" type="checkbox" id="defaultCheck1" style="  height: 16px;
                                 width: 16px;
                                 border-radius: 2px;
                                 ;margin-top: 10px;margin-left:25px;">
                                <label class="form-check-label" for="defaultCheck1" style=" color: #000000;
                                 font-family: Roboto;
                                 font-size: 14px;
                                 letter-spacing: 0.31px;
                                 line-height: 18px;margin-top: 10px;margin-left:5px;">Achetez 05 objets ou plus et économisez.</label><select class="form-select" aria-label="Default select example" style="  height: 33px;
                                width: 73px;
                                border: 1px solid #979797;
                                border-radius: 6px;

                                background-color: #FFFFFF;color: #4A4A4A;
                                font-family: Roboto;
                                font-size: 14px;
                                letter-spacing: -0.34px;
                                line-height: 16px;margin-left: 330px;margin-top:-30px;">
                                <option selected>--</option>
                                <option value="1">15%</option>
                                <option value="2">30%</option>


                                    </select>
                                <p style="  color: #000000;
                                    font-family: Roboto;
                                    font-size: 14px;
                                    letter-spacing: 0.31px;
                                    line-height: 18px;margin-left:410px;margin-top:-25px;
                                  ">% sur chaque objet.</p><br>

                                <input class="form-check-input" type="checkbox" id="defaultCheck1" style="  height: 16px;
                                width: 16px;
                                border-radius: 2px;
                                ;margin-top: 10px;margin-left: 25px;">
                                <label class="form-check-label" for="defaultCheck1" style=" color: #000000;
                                font-family: Roboto;
                                font-size: 14px;
                                letter-spacing: 0.31px;
                                line-height: 18px;margin-top:10px;margin-left: 5px;">Achetez 15 objets ou plus et économisez.</label> <select class="form-select" aria-label="Default select example" style="  height: 33px;
                                width: 73px;
                                border: 1px solid #979797;
                                border-radius: 6px;

                                background-color: #FFFFFF;color: #4A4A4A;
                                font-family: Roboto;
                                font-size: 14px;
                                letter-spacing: -0.34px;
                                line-height: 16px;margin-left: 330px;margin-top:-30px;">
                                <option selected>--</option>
                                <option value="1">15%</option>
                                <option value="2">30%</option>


                                    </select>
                                <p style="  color: #000000;
                                    font-family: Roboto;
                                    font-size: 14px;
                                    letter-spacing: 0.31px;
                                    line-height: 18px;margin-left:410px;margin-top:-25px;
                                  ">% sur chaque objet.</p>
                                <br>

                                <input class="form-check-input" type="checkbox" id="defaultCheck1" style="  height: 16px;
                                  width: 16px;
                                  border-radius: 2px;
                                  ;margin-top: 10px;margin-left: 25px;">
                                <label class="form-check-label" for="defaultCheck1" style=" color: #000000;
                                  font-family: Roboto;
                                  font-size: 14px;
                                  letter-spacing: 0.31px;
                                  line-height: 18px;margin-top: 10px;margin-left: 5px;">Achetez 20 objets ou plus et économisez.</label> <select class="form-select" aria-label="Default select example" style="  height: 33px;
                                width: 73px;
                                border: 1px solid #979797;
                                border-radius: 6px;

                                background-color: #FFFFFF;color: #4A4A4A;
                                font-family: Roboto;
                                font-size: 14px;
                                letter-spacing: -0.34px;
                                line-height: 16px;margin-left: 330px;margin-top:-30px;">
                                <option selected>--</option>
                                <option value="1">15%</option>
                                <option value="2">30%</option>
                                    </select>
                                <p style="  color: #000000;
                                    font-family: Roboto;
                                    font-size: 14px;
                                    letter-spacing: 0.31px;
                                    line-height: 18px;margin-left:410px;margin-top:-25px;
                                  ">% sur chaque objet.</p>
                            </div>



                        </section>

                        <hr style="  box-sizing: border-box;
                        height: 1px;
                        width: 366px;
                        border: 1px solid #979797;margin-left:96px;">

                        <section style="  height: 410px;
                        width: 558px;
                        background-color: #F8F8F8;padding-top:15px;
                      ">
                            <div style="border-left:3px solid #1A7EF5;padding-left:20px; border-top-left-radius: 2px;">
                                <p style="height: 18px;
                        width: 209px;
                        color: #000000;
                        font-family: Roboto;
                        font-size: 14px;
                        font-weight: 900;
                        letter-spacing: 0.31px;
                        line-height: 18px;">
                                    OPTION DE RETOUR D'ARTICLE</p>

                                <input class="form-check-input" type="checkbox" id="defaultCheck1" style="  height: 16px;
                                width: 16px;
                                border-radius: 2px;
                                ;margin-top: 10px;margin-left: 15px;">
                                <label class="form-check-label" for="defaultCheck1" style="  height: 18px;
                              width: 182px;
                              color: #000000;
                              font-family: Roboto;
                              font-size: 14px;
                              letter-spacing: 0.31px;
                              line-height: 18px;margin-left: 10px;margin-top:10px;">Retours nationaux acceptés.</label>

                                <input class="form-check-input" type="checkbox" id="defaultCheck1" style="  height: 16px;
                                width: 16px;
                                border-radius: 2px;
                                ;margin-top: 10px;margin-left:40px;">
                                <label class="form-check-label" for="defaultCheck1" style="   height: 18px;
                                width: 182px;
                                color: #000000;
                                font-family: Roboto;
                                font-size: 14px;
                                letter-spacing: 0.31px;
                                line-height: 18px;margin-left:10px;margin-top:10px;">Retours internationaux acceptés.</label>
                                <p style=" color: #000000;
                                font-family: Roboto;
                                font-size: 14px;
                                letter-spacing: 0.31px;
                                line-height: 18px;margin-top:15px;">Après avoir reçu l'objet, l'acheteur doit<br> annuler l'achat dans un délai de :</p>

                                <select class="form-select" aria-label="Default select example" style="   height: 41px;
                                width: 118px;
                                border: 1px solid #979797;
                                border-radius: 6px;
                                background-color: #FFFFFF;color: #4A4A4A;
                                font-family: Roboto;
                                font-size: 14px;
                                letter-spacing: -0.34px;
                                line-height: 16px;">
                                <option value="1">14</option>
                                <option value="2">30</option>
                                <option value="3">60</option>

                                    </select>

                                <p style="color: #000000;
                                 font-family: Roboto;
                                 font-size: 14px;
                                 letter-spacing: 0.31px;
                                 line-height: 18px;
                               margin-top:20px;">Les frais de retour seront payés par :</p>
                                <select class="form-select" aria-label="Default select example" style=" height: 41px;
                               width: 218px;
                               border: 1px solid #979797;
                               border-radius: 6px;
                               background-color: #FFFFFF;color: #4A4A4A;
                                font-family: Roboto;
                                font-size: 14px;
                                letter-spacing: -0.34px;
                                line-height: 16px;">
                                <option selected>Acheteur</option>
                                <option value="1">Vendeur</option>
                                <option value="2">Acheteur</option>

                              </select>
                                <select class="form-select" aria-label="Default select example" style=" height: 41px;
                              width: 218px;
                              border: 1px solid #979797;
                              border-radius: 6px;
                              background-color: #FFFFFF;margin-left:250px; margin-top: -41px;color: #4A4A4A;
                                font-family: Roboto;
                                font-size: 14px;
                                letter-spacing: -0.34px;
                                line-height: 16px;">
                               <option selected>Vendeur(gratuit)</option>
                               <option value="1">Vendeur (gratuit)</option>
                               <option value="2">Acheteur(Payant)</option>

                             </select>

                                <p style="  color: #000000;
                             font-family: Roboto;
                             font-size: 14px;
                             letter-spacing: 0.31px;
                             line-height: 18px;margin-top:20px;">Autres détails sur les conditions de retour :</p>

                                <input type="textarea" style="  height: 82px;
                             width: 518px;
                             border: 1px solid #979797;
                             border-radius: 6px;
                             background-color: #FFFFFF;">






                            </div>

                        </section>




                        <div style="height:82px;padding-top:22px;padding-bottom:22px;">
                            <button style="  height: 37px;
                      width: 120px;
                      border: 1px solid #1A7EF5;
                      border-radius: 6px;
                      background-color: #FFFFFF;  color: #1A7EF5;
                      font-family: Roboto;
                      font-size: 16px;
                      font-weight: 900;
                      letter-spacing: 0.35px;
                      line-height: 19px;
                      text-align: center;margin-left: 170px;">Retour</button>
                            <button style=" height: 37px;
                      width: 118px;
                      border-radius: 6px;
                      background-color: #1A7EF5;  color: #FFFFFF;
                      font-family: Roboto;
                      font-size: 16px;
                      font-weight: 900;
                      letter-spacing: 0.35px;
                      line-height: 19px;
                      text-align: center;border:1px solid  #1A7EF5;">Suivant</button>




                        </div>

                        </div>
                    </div>

                </div>








                <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js " integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM " crossorigin="anonymous "></script>


