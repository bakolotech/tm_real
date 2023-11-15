

                     <section style="width: 558px;height:100px; background-color:#191970;">
                        <p style="  color: #FFFFFF;
                       font-family: Roboto;
                       font-size: 21px;
                       font-weight: 500;
                       letter-spacing: 0;
                       line-height: 23px;
                       text-align: center;padding-top: 38px;">1- Detail de l'annonce</p>
                    </section>

                    <div class="detailan">
                        <section style="background-color: #F8F8F8; width: 575px;height: 135px;padding-top: 15px;">
                            <div style="border-left:3px solid #1A7EF5;padding-left:20px;padding-bottom: 5px; border-top-left-radius: 2px;">
                                <p style=" color: #000000;
                        font-family: Roboto;
                        font-size: 14px;
                        font-weight: 900;
                        letter-spacing: 0.31px;
                        line-height: 18px;
                      ">*Titre de votre annonce</p>
                                <p style="  color: #9B9B9B;
                      font-family: Roboto;
                      font-size: 14px;
                      letter-spacing: 0.31px;
                      line-height: 18px;">Choisissez des mots-clés que les acheteurs utilisent pour des rechercher.</p>
                      <style>
                          .phone-input-1 {
                            height: 41px;
                            width: 518px;
                            border: 1px solid #979797;
                            border-radius: 6px;
                            background-color: #FFFFFF;color:#000000;padding: 7px;
                          }

                          .ul-search {
                            width: 90%;
                            height: 100px;
                            background-color: #F0FFF0;
                            z-index:2000;
                            position: absolute;
                            margin-top:-10px;
                            margin-left: 30px;
                            border-radius: 1px 1px 6px 6px;
                          }

                          .ul-search li {
                            list-style-type: none;
                            border-bottom: 1px solid #9B9B9B;
                          }

                          .ul-search li:hover {
                            cursor: pointer;
                            background-color: #ccc;
                            color: blue
                          }

                          .caracterisqueProd {
                              width: 220px;
                              height: 40px;
                              position: relative;
                              left: 20px;
                              border-radius: 6px;
                              padding-left: 15px;
                          }

                          .caracteristique-zone {
                              display: flex;
                              flex-direction: column;
                          }

                          .caracteristique_element {
                              display: flex;
                              column-gap: 20px;
                              width: 600px;
                              position: relative;
                              left: 30px;
                              /* margin-right: auto; */
                              /* background-color: #979797; */
                          }

                          .image-option {
                              border: none;
                              background-color: #F0FFF0;
                          }

                          .image-option:hover {
                              /* background-color: red; */
                          }

                          .image-option img:hover {
                              cursor: pointer;
                          }

                          .sava-all-images {
                                height: 37px !important;
                                width: 206px !important;
                                border: 1px solid #1A7EF5;
                                border-radius: 6px;
                                background-color: #FFFFFF;
                                font-family: Roboto;
                                font-size: 16px;
                                font-weight: 900;
                                text-align:center;
                                /* margin-left: 315px; */
                                color: #1A7EF5;
                                margin-top: 8px;
                                position: relative;
                                float: right;
                                right: 10px;

                          }

                      </style>
                      <!-- libelle produit  -->
                     <input type="text" class="phone-input-1" id="libelle-produit" value="" placeholder="Apple iPhone XR - 64Go - Noir" onkeyup="rechercheProduit()">

                            </div>
                        </section>

                        <ul class="ul-search" style="display: none">
                            {{-- <small class="no-result" style="display: none">Aucun resultat trouve</small> --}}
                        </ul>

                        <hr style="  box-sizing: border-box;
                    height: 1px;
                    width: 366px;
                    border: 1px solid #979797;margin-left:96px;">

                        <section style="  height: auto;
                        width: 558px;
                        background-color: #F8F8F8;padding-top: 15px; ;
                        ">
                            <div style="border-left:3px solid #1A7EF5;padding-left:20px; border-top-left-radius: 2px;">
                                <p style=" color: #000000;
                        font-family: Roboto;
                        font-size: 14px;
                        font-weight: 900;
                        letter-spacing: 0.31px;
                        line-height: 18px;"> *Caractéristique de l’objet</p>
                        <div class="caracteristique_element" >

                        </div>
                                {{-- <p style="  color: #9B9B9B;
                        font-family: Roboto;
                        font-size: 14px;
                        letter-spacing: 0.31px;
                        line-height: 18px;">Les acheteurs ont besoin de ces détails pour trouver votre objet.</p>

                            <p style=" color: #000000;
                                font-family: Roboto;
                                font-size: 14px;
                                font-weight: 900;
                                letter-spacing: 0.31px;
                                line-height: 18px;margin-top: 5px;">Marque</p>
                                <!-- marque produit  -->
                            <select class="form-select form-select-lg mb-3" id="marque_produit" aria-label=".form-select-lg example" style="  height: 41px;
                                ckground-color: #FFFFFF;margin-top:-8px;">
                                <option selected>Apple</option>
                                <option value="1">tecno</option>
                                <option value="2">Itel</option>
                                <option value="3">Samsung</option>
                            </select>

                            <p style=" color: #000000;
                                font-family: Roboto;
                                font-size: 14px;
                                font-weight: 900;
                                letter-spacing: 0.31px;
                                line-height: 18px;
                                text-align: right;margin-right:210px;margin-top:-84px;">Modèle</p>
                                <!-- model  -->
                            <select class="form-select form-select-lg mb-3" id="model_produit" aria-label="form-select-lg example" style="  height: 41px;
                                width: 253px !important;
                                border: 1px solid #979797;
                                border-radius: 6px;
                                background-color: #FFFFFF;margin-left: 275px;margin-top: -7px;;">
                                <option selected>Iphone XR</option>
                                <option value="1">Iphone 12</option>
                                <option value="2">Iphone 12 mini</option>
                                <option value="3">Iphone 11</option>
                            </select>
                            <p style="color:#4A4A4A;font-family: Roboto;
                            font-size: 12px;
                            letter-spacing: 0;
                            line-height: 13px;margin-left: 280px;">Fréquent:</p>
                                <p style="color:#1A7EF5;font-family: Roboto;
                            font-size: 12px;
                            letter-spacing: 0;
                            line-height: 13px;margin-left: 335px;margin-top: -28px;">iPhone 6s , iPhone 8 , iPhone X

                                </p>


                                <p style=" color: #000000;
                            font-family: Roboto;
                            font-size: 14px;
                            font-weight: 900;
                            letter-spacing: 0.31px;
                            line-height: 18px;margin-top:30px;">Couleur</p>

                            <select class="form-select form-select-lg mb-3" id="coleur_produit" aria-label=".form-select-lg example" style="  height: 41px;
                                width: 253px !important;
                                border: 1px solid #979797;
                                border-radius: 6px;
                                background-color: #FFFFFF;margin-top: -8px;">
                                <option selected>Noir</option>
                                <option value="1">Or</option>
                                <option value="2">Argent</option>
                                <option value="3">Rosé</option>
                            </select>


                                <p style=" color: #000000;
                                  font-family: Roboto;
                                  font-size: 14px;
                                  font-weight: 900;
                                  letter-spacing: 0.31px;
                                  line-height: 18px;
                                  text-align: right;margin-right:120px;margin-top:-84px;">Capacité de stockage</p>
                            <select class="form-select form-select-lg mb-3" id="capacite_produit" aria-label=".form-select-lg example" style="  height: 41px;
                                      width: 253px !important;
                                      border: 1px solid #979797;
                                      border-radius: 6px;
                                      background-color: #FFFFFF;margin-left: 275px;margin-top: -7px;;">
                                          <option selected>64 Go</option>
                                          <option value="1">16 Go</option>
                                          <option value="2">32 Go</option>

                                          </select>
                                <p style="color:#4A4A4A;font-family: Roboto;
                                      font-size: 12px;
                                      letter-spacing: 0;
                                      line-height: 13px;margin-left: 280px;">Fréquent:</p>
                                <p style="color:#1A7EF5;font-family: Roboto;
                                      font-size: 12px;
                                      letter-spacing: 0;
                                      line-height: 13px;margin-left: 335px;margin-top: -28px;">16 Go , 64 Go, 128 Go

                                </p>

                                <p style=" color: #000000;
                            font-family: Roboto;
                            font-size: 14px;
                            font-weight: 900;
                            letter-spacing: 0.31px;
                            line-height: 18px;
                            text-align:left;margin-top:-15px;">Etat</p>
                            <select class="form-select form-select-lg mb-3" id="etat_produit" aria-label=".form-select-lg example" style="  height: 41px;
                                width: 253px !important;
                                border: 1px solid #979797;
                                border-radius: 6px;
                                background-color: #FFFFFF;margin-top: -7px;;">
                                <option selected>Neuf</option>
                                <option value="1">Occasion propre</option>
                                <option value="2">Occasion</option>
                            </select>
                                <p style="color:#4A4A4A;font-family: Roboto;
                                font-size: 12px;
                                letter-spacing: 0;
                                line-height: 13px;">Fréquent:</p>
                                <p style="color:#1A7EF5;font-family: Roboto;
                                font-size: 12px;
                                letter-spacing: 0;
                                line-height: 13px;margin-left:60px;margin-top: -28px;">Neuf ,Très bon état , Occasion

                                </p> --}}

                            </div>
                        </section>

                        <hr style="  box-sizing: border-box;
                    height: 1px;
                    width: 366px;
                    border: 1px solid #979797;margin-left:96px;">

                    <section style=" height: 480px;
                     width: 558px;
                     background-color: #F8F8F8;padding-top: 15px;">
                            <div style="border-left:3px solid #1A7EF5;padding-left:15px; border-top-left-radius: 2px;">
                                <p style=" color: #000000;
                     font-family: Roboto;
                     font-size: 14px;
                     font-weight: 900;
                     letter-spacing: 0.31px;
                     line-height: 18px;">*Ajouter une ou plusieurs images</p>
                                <p style="  color: #9B9B9B;
                     font-family: Roboto;
                     font-size: 14px;
                     letter-spacing: 0.31px;
                     line-height: 18px;">Ajoutez autant de photos que possible pour inspirer confiance aux acheteurs.</p>
                                <p style="  color: black;
                              font-family: Roboto;
                              font-size: 14px;
                              font-weight: 900;
                              letter-spacing: 0.31px;
                              line-height: 18px;">Photos</p>
                                <p style="  color: #9B9B9B;
                     font-family: Roboto;
                     font-size: 14px;
                     font-weight: 300;
                     letter-spacing: 0.31px;
                     line-height: 18px;margin-top: -35px;margin-left: 50px;">(0/7)</p>
                                <p style="color: #1A7EF5;
                     font-family: Roboto;
                     font-size: 12px;
                     letter-spacing: 0.26px;
                     line-height: 13px;
                     text-align: right;margin-top:-30px;margin-right:15px">Tout supprimer | Importer à partir du Web</p>

                    <section style="width: 558px;">
                        <article style="height: 310px;width: 310px;border: 1px solid #9B9B9B;
                            border-radius: 6px 6px 0 0;
                            background-color: #FFFFFF;">
                                        <img id="main-image-preview" src="assets/images/icones-vendeurs2/image_outline_icon_139447.svg" width="75px" height="75px" style="margin-left: 110px;margin-top: 30px;" /> <br>
                                        <input id="myInput" type="file" name='files[]' style="visibility:hidden" onchange="imageChanged()" multiple />
                                        <button id="file" style="border: 1px solid #1A7EF5; width: 200px;height:41px;color: #1A7EF5;border-radius: 5px;background-color: white;margin-left:-340px;margin-top:20px" onclick="document.getElementById('myInput').click()"><img src="assets/images/icones-vendeurs2/plus.svg">&nbsp Ajouter une photo</button>

                                        <p style="  color: black;
                                    font-family: Roboto;
                                    font-size: 12px;
                                    font-weight: 300;
                                    letter-spacing: 0;
                                    line-height: 13px;
                                    text-align: center;margin-top: 15px;">Les photos comportant des bordures, <br>du texte ou des illustrations ne sont pas autorisés.<br><br> Vous pouvez également</p>
                                        <p style="   color: #1A7EF5;
                                    font-family: Roboto;
                                    font-size: 12px;
                                    font-weight: 300;
                                    letter-spacing: 0;
                                    line-height: 13px;
                                    text-align: center;margin-top: -10px;;"> copier les photos à partir d'une URL.</p>
                                    </article>
                                    <div style="  border: 1px solid #979797;
                                border-radius: 0 0 6px 6px;
                                background-color:white; width:310;height:45px;padding: 10px;">

                                            <button class="image-option"><img src="assets/images/icones-vendeurs2/Recadrer_Clique.svg" width="25px" height="25px" style="margin-left: 10px;"></button>


                                            <button onclick="saveCorrection()" class="image-option"><img src="assets/images/icones-vendeurs2/Rotation.svg" width="25px" height="25px" style="margin-left :20px;"></button>


                                            <button class="image-option"><img src="assets/images/icones-vendeurs2/Luminausité_&_contraste.svg" width="25px" height="25px" style="margin-left :20px;"></button>


                                            <button class="image-option"><img  src="assets/images/icones-vendeurs2/Netteter.svg" width="25px" height="25px" style="margin-left :20px;"></button>


                                            <button class="image-option"><img  src="assets/images/icones-vendeurs2/Ajuster_automatiquement.svg" width="25px" height="25px" style="margin-left :20px;"></button>

                                            <button onclick="supprimerImage()" class="image-option"><img  src="assets/images/icones-vendeurs2/Poubelle.svg" width="25px" height="25px" style="margin-left :20px;"></button>

                                </div>
                                </div>
                            <div style="border-left:3px solid #1A7EF5;padding-left:20px; border-top-left-radius: 2px;">
                                       <article style="   height: 102px;
                                width: 102px;
                                border: 1px solid #9B9B9B;
                                border-radius: 6px;
                                background-color: #FFFFFF;
                                margin-top:-357px;
                                margin-left:315px;"
                                >
                                <img id="photo_principal" data-img="false" width="30px" height="30px" src="assets/images/icones-vendeurs2/plus.svg" style="margin-top: 32px;margin-left: 38px;" alt="" />
                                        <div style=" height: 27px;
                                            width: 100px;
                                            border-radius: 0 0 5px 5px;
                                            background-color: #D8D8D8;
                                        ">
                                            <p style=" color: #4A4A4A;
                                        font-family: Roboto;
                                        font-size: 10px;
                                        letter-spacing: 0.22px;
                                        line-height: 11px;
                                        text-align: right;margin-top:10px;text-align: center;padding-left: 2px;padding-top:7px;">Photo principale</p>

                                        </div>


                                    </article>
                                    <article style="   height: 102px;
                                width: 102px;
                                border: 1px solid #9B9B9B;
                                border-radius: 6px;
                                background-color: #FFFFFF;margin-top:3px;margin-left:315px;">
                                        <img data-img="false" id="photo_1" src="assets/images/icones-vendeurs2/plus.svg" width="30px" height="30px" style="margin-top: 32px;margin-left: 38px;">

                                    </article>
                                    <article style="   height: 102px;
                                width: 102px;
                                border: 1px solid #9B9B9B;
                                border-radius: 6px;
                                background-color: #FFFFFF;margin-top:3px;margin-left:315px;">

                                        <img data-img="false" id="photo_2" src="assets/images/icones-vendeurs2/plus.svg" width="30px" height="30px" style="margin-top: 32px;margin-left: 38px;">
                                    </article>
                                    <article style="   height: 102px;
                                width: 102px;
                                border: 1px solid #9B9B9B;
                                border-radius: 6px;
                                background-color: #FFFFFF;margin-top:-313px;margin-left:420px;">

                                        <img id="photo_3" data-img="false" src="assets/images/icones-vendeurs2/plus.svg" width="30px" height="30px" style="margin-top: 32px;margin-left: 38px;">
                                    </article>
                                    <article style="   height: 102px;
                                width: 102px;
                                border: 1px solid #9B9B9B;
                                border-radius: 6px;
                                background-color: #FFFFFF;margin-top:3px;margin-left:420px;">
                                        <img id="photo_4" data-img="false" src="assets/images/icones-vendeurs2/plus.svg" width="30px" height="30px" style="margin-top: 32px;margin-left: 38px;">

                                    </article>
                                    <article style="   height: 102px;
                                width: 102px;
                                border: 1px solid #9B9B9B;
                                border-radius: 6px;
                                background-color: #FFFFFF;margin-top:3px;margin-left:420px;">

                                        <img id="photo_5" data-img="false" src="assets/images/icones-vendeurs2/plus.svg" width="30px" height="30px" style="margin-top: 32px;margin-left: 38px;">
                                    </article>
                                    <button class="sava-all-images" onclick="saveImages()" >Enregistrer</button>

                            </div>
                            {{-- <button onclick="saveImages()" style=" ">Enregistrer</button> --}}
                            </section>


                            <hr style="  box-sizing: border-box;
                            height: 1px;
                            width: 366px;
                            border: 1px solid #979797;margin-left:96px;">

                        <section style="  height: 260px;
                        width: 558px;
                        background-color: #F8F8F8;padding-top:15px;">
                            <div style="border-left:3px solid #1A7EF5;padding-left:15px; border-top-left-radius: 2px;">
                                <p style="  color: #000000;
                        font-family: Roboto;
                        font-size: 14px;
                        font-weight: 900;
                        letter-spacing: 0.31px;
                        line-height: 15px;">*Description de l’objet</p>
                                <p style="  color: #9B9B9B;
                        font-family: Roboto;
                        font-size: 14px;
                        letter-spacing: 0.31px;
                        line-height: 18px;">Décrivez les caractéristiques uniques de votre objet et ses défauts.</p>

                                <article style="  width: 519px;  height: 39px;
                       border: 1px solid #9B9B9B;
                       border-radius: 6px 6px 0 0;
                       background-color: #FFFFFF;margin-left: 5px;padding-top: 5px;">
                                    <img src="assets/images/icones-vendeurs2/type-bold.svg" width="25px" height="25px" style="margin-left :50px;">
                                    <img src="assets/images/icones-vendeurs2/type-italic.svg" width="25px" height="25px" style="margin-left :20px;">
                                    <img src="assets/images/icones-vendeurs2/backspace-fill.svg" width="25px" height="25px" style="margin-left :20px;">

                                </article>
                                <input type="textarea" id="description_produit" style="  height: 135px;
                      width: 519px;
                      border-left: 1px solid #9B9B9B;
                      border-right: 1px solid #9B9B9B;
                      border-bottom: 1px solid #9B9B9B;
                      border-top:1px solid #9B9B9B;
                      border-radius: 0 0 6px 6px;
                      background-color: #FFFFFF;margin-left: 5px;">



                            </div>
                        </section> <br>
