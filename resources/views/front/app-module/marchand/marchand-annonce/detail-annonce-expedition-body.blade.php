

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

        .aucun-element {
            height: 18px;
            width: 146px;
            color: #000000;
            font-family: Roboto;
            font-size: 12px;
            letter-spacing: 0.26px;
            line-height: 12px;
            position: relative;
            top: 65px;
            left: -130px
        }

        /* // aucun-element-international */
        .aucun-element-international {
            height: 18px;
            width: 146px;
            color: #000000;
            font-family: Roboto;
            font-size: 12px;
            letter-spacing: 0.26px;
            line-height: 12px;
            position: relative;
            top: 75px;
            left: 184.5px;
            /* left: -130px */
        }

        .expedition-title {
            height: 18px;
            width: 165px;
            color: #191970;
            font-family: Roboto;
            font-size: 14px;
            font-weight: 500;
            letter-spacing: 0.31px;
            line-height: 18px;
            text-transform: uppercase;
            /* margin-top: 15px; */
            margin-left: 5px;
        }

        .expedition-title-inter {
            height: 18px;
            width: 165px;
            color: #191970;
            font-family: Roboto;
            font-size: 14px;
            font-weight: 500;
            letter-spacing: 0.31px;
            line-height: 18px;
            text-transform: uppercase;
            /* margin-top: 15px; */
            margin-left: 5px;
        }
        /* barre verticale*/
    </style>

                    <div class="expedition-section">
                        <section style="width: 558px;height:100px; background-color:#191970;">
                            <p style="  color: #FFFFFF;
                           font-family: Roboto;
                           font-size: 21px;
                           font-weight: 500;
                           letter-spacing: 0;
                           line-height: 23px;
                           text-align: center;padding-top: 38px;">3- Information sur l'expedition</p>
                        </section>
                        <div class="dtexpe" style="background-color: #F8F8F8; padding-top:15px">


                            <div style="border-left:3px solid #1A7EF5;padding-left:20px; border-top-left-radius: 2px;">
                            <input class="form-check-input" type="checkbox"  style="  height: 18px;
                            width: 18px;
                            border-radius: 2px; margin-top: 0px;margin-left:0px;" value="mode1" id="expedition-national" >
                            <label class="form-check-label expedition-title" for="defaultCheck1" style=" " >Expédition nationale</label>

                            <input type="hidden" id="mode-expedition-national-value"  placeholder="mode-expedition">

                            <p style="color: #000000;
                            font-family: Roboto;
                            font-size: 12px;
                            letter-spacing: 0.31px;
                            line-height: 18px;margin-top:5px;
                          ">Sélectionnez un service d’expédition avec un coût fixe ou bien proposez la livraison gratuite.</p>
                        {{-- debut service ajout service expedition  --}}
                        {{-- ++++++++++++++++++++++++++++++++++ --}}
                        {{-- visible zone --}}
                        <style>
                            .ajout-service-livraison-custom {
                                height: 219px;
                                width: 518px; border: 1px solid #979797;
                                border-radius: 6px;
                                background-color: #F8F8F8;
                            }

                            .aside-show-mode-expedition-el {
                                border: 1px solid #1A7EF5;
                                width: 300px;height:41px;color: #1A7EF5;
                                border-radius: 5px;background-color: white;
                                margin-left:105px; padding-top:7px;
                                padding-left:32px; padding-top: 10px;
                                position: relative; top:83px; font-size: 12px;
                            }

                            .card-element-bis {
                                width: 518px;  border: 1px solid #979797;
                                border-radius: 6px;
                                background-color: #fff;
                            }

                            .section-signe-plus {
                                height: 36px;
                                width: 516px;
                                border-top: 1px solid #979797;
                                border-top: none;
                                border-radius: 0 0 6px 6px;
                            }

                            .section-signe-plsu-p {
                                color: #1A7EF5;
                                font-family: Roboto;
                                font-size: 20px;
                                letter-spacing: 0;
                                line-height: 14px;text-align:left;
                                margin-left:140px;padding-top:12px;
                            }

                            .autre-service-expedition {
                                margin-right: 10px; width: 16px; height: 16px; position: relative; top: -1px
                            }

                            .international-ajouter-service-exp {
                                color: #1A7EF5;
                                font-family: Roboto;
                                font-size: 12px;
                                letter-spacing: 0;
                                line-height: 14px;text-align:center;padding-top:15px;margin-top:-45px;
                            }

                            .section-signe-plus-p {
                                color: #1A7EF5;
                                font-family: Roboto;
                                font-size: 20px;
                                letter-spacing: 0;
                                line-height: 14px;text-align:left;margin-left:140px;padding-top:10px;
                            }

                        </style>
                        <div class="ajout-service-livraison ajout-service-livraison-custom" id="zone-expedition-national-disable-contenair">

                        <div class="s-noness retour-section-desabled" id="zone-expedition-national-disable-not">

                            <input id="myInputh" type="file" style="visibility:hidden" />
                            <span class="aucun-element" style="position: relative; ">Aucun service sélectionné</span>
                                <aside class="aside-show-mode-expedition-el" id="file" onclick="showModeExpedition('National')">
                                <img src="assets/images/icones-vendeurs2/plus.svg" class="autre-service-expedition">Ajouter un autre service d’expédition </aside>
                        </div>

                        </div>

                        <div id="zone-expedition-national-disable-not-test" class="s-none card-element-bis" >

                          <div class="card-element" id="new-mode-section" >

                          </div>

                      <section class="section-signe-plus">
                       <p class="section-signe-plus-p">+</p>
                       <p class="international-ajouter-service-exp"> <a style="text-decoration: none" href="#" onclick="showModeExpedition('National')">&nbsp&nbsp Ajouter un autre service d’expédition</a> </p>
                       </section>
                      </div>
                      <div>
                      </div>
                  </div>

                {{-- fin expedition national  --}}
                <style>
                    .main-international-expedition {
                        border-left:3px solid #1A7EF5;
                        padding-left:20px; border-top-left-radius: 2px;
                        margin-top:20px; height: 304px;
                    }

                    .input-international-checkbox {
                        height: 18px;
                        width: 18px;
                        border-radius: 2px; margin-left:0px; margin-top: 0px
                    }
                </style>
                    <div class="main-international-expedition">
                        <input class="form-check-input input-international-checkbox" type="checkbox" value="mode-international" id="mode_expedition_international"
                            onclick="check_mode_expedit_international()" disabled>
                        <label class="form-check-label expedition-title-inter" for="defaultCheck1" style="margin-bottom: 6px; position: relative; top: -1px">Expédition internationale</label>
                        <input type="hidden" id="mode-expedition-international-value"  placeholder="mode-expedition">
                        <p style="  color: #000000;
                        font-family: Roboto;
                        font-size: 12px;
                        letter-spacing: 0.26px;
                        line-height: 15px;
                        ">Les réglementations douanières varient d'un pays à l'autre et tous les transporteurs ne <br> desservent pas toutes les destinations. Vérifiez que votre annonce mentionne clairement qui<br> est responsable du paiement de ces frais supplémentaires.</p>

                                {{-- debut expedition internationnal  --}}
                    <div class="expeditionElementInternational s-none" id="expeditionElementInternational-add" style="  height: 250px;
                            width: 518px;  border: 1px solid #979797;
                            border-radius: 6px;
                            background-color: #FFFFFF;padding-top:30px;">

                            {{-- debut zone retour  --}}
                                <div class="mode_expedition-international-contenair" id="mode_expedition-international-contenair">

                                </div>
                            {{-- section de retour  --}}
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
                            line-height: 14px;text-align:center;padding-top:10px;margin-top:-43px;">
                             <a href="#" style="text-decoration: none"> &nbsp&nbsp Ajouter une expédition internationale</a> </p></section>
                            </div>


                            {{-- fin expedition international  --}}
                            <div class="ajout-service-livraison" id="ajout-service-livraison-add" style="  height: 219px;
                            width: 518px; border: 1px solid #979797;
                            border-radius: 6px;
                            background-color: #F8F8F8;" >

                             <div id="expedition-international-disable" class="retour-section-desabled">
                            <span class="aucun-element-international">Aucun service sélectionné</span>
                                <aside id="file" style="border: 1px solid #1A7EF5; width: 300px;height:41px;color: #1A7EF5;border-radius: 5px;background-color: white;margin-left:105px; padding-top:7px;padding-left:32px; padding-top: 10px; position: relative; top:100px; font-size: 12px;" onclick="showModeExpedition('National')"><img src="assets/images/icones-vendeurs2/plus.svg" style="margin-right: 10px; width: 16px; height: 16px; position: relative; top: -1px">Ajouter un autre service d’expédition </aside>
                             </div>

                            <div class="s-none" id="expedition-international-active">
                                <input id="myInputj" type="file" style="visibility:hidden" />
                                <aside id="file" style="border: 1px solid #1A7EF5; width: 300px;height:41px;color: #1A7EF5;border-radius: 5px;background-color: white;margin-left:105px; padding-top:7px;padding-left:20px; padding-top: 10px; position: relative; top:55px; font-size: 12px;" onclick="showModeExpedition('International')"><img src="assets/images/icones-vendeurs2/plus.svg" style="margin-right: 30px">Ajouter un autre service d’expédition </aside>
                            </div>
                            </div>

                             </div>
                             <style>
                                .exclusion-pays {
                                    height: 18px;
                                    width: 235px;
                                    color: #191970;
                                    font-family: Roboto;
                                    font-size: 14px;
                                    font-weight: 500;
                                    letter-spacing: 0.31px;
                                    line-height: 14px;
                                    text-transform: uppercase
                                }

                                .ray-spiner-prop {
                                    /* margin-left: -80px;
                                    margin-top: -81px;
                                    position: relative;
                                    top: 8px;
                                    left: -18px; */
                                }

                                .mettre-en-ray-text {
                                    position: relative;
                                }

                                .spine-none {
                                    display: none !important;
                                }

                                .spiner-css-attr {
                                    position: relative;
                                    top: 9px;
                                    opacity: 0.5;
                                    pointer-events: none;
                                }

                                .mettre-en-r {
                                    height: 37px;
                                    width: 160px;
                                    border-radius: 6px;
                                    background-color: #1A7EF5;  color: #FFFFFF;
                                    font-family: Roboto;
                                    font-size: 16px;
                                    font-weight: 500;
                                    letter-spacing: 0.35px;
                                    line-height: 19px;
                                    text-align: center;border:1px solid  #1A7EF5;
                                }

                                .add-ray-desable {
                                    background-color: #9B9B9B !important;
                                    pointer-events: none;
                                    border: transparent !important;
                                }

                             </style>
                             <div style="border-left:3px solid #1A7EF5;padding-left:20px; border-top-left-radius: 2px;margin-top:30px">
                                <p style="" class="exclusion-pays">Exclure des lieux de livraison</p>

                    <aside  style="  height: 41px;
                                width: 510px;
                                border: 1px solid #1A7EF5;
                                border-radius: 6px;
                                background-color: #FFFFFF;"><p style="  color: #1A7EF5;
                                font-family: Roboto;
                                font-size: 14px;
                                letter-spacing: -0.34px;
                                line-height: 16px;text-align:center;padding-top:10px">
                                <a id="creer-list-exclusion" href="#" onclick="addExclusion()" style="text-decoration: none; position: relative; top: 2px">Créer une liste d’exclusions</a></p>
                            </aside>

                    </div>

                    <div style="height:82px;padding-top:22px;padding-bottom:22px;;background-color:white;padding-left:10px;margin-top:20px;">
                                <button style="  height: 37px;
                          width: 203px;
                          border: 1px solid #1A7EF5;
                          border-radius: 6px;
                          background-color: #FFFFFF;  color: #1A7EF5;
                          font-family: Roboto;
                          font-size: 16px;
                          font-weight: 500;
                          letter-spacing: 0.35px;
                          line-height: 19px;
                          text-align: center;margin-left:15px;" onclick="produit_preview()">Apperçu de l’annonce</button>

                            <button onclick="showTabAnnonceVenteAnnuler()" style="box-sizing: border-box;
                            height: 37px;
                            width: 135px;
                            border: 1px solid #1A7EF5;
                            border-radius: 6px;
                            background-color: #FFFFFF;  letter-spacing: 0.35px;
                            line-height: 19px;
                            text-align: center;
                            color: #1A7EF5">Retour </button>

                        <button id="mettreEnRayonBtn" class="s-no11 mettre-en-r add-ray-desable" style="" onclick="mettreEnRayon()">
                          <span id="metre-en-ray-text" class="mettre-en-ray-text spine-noneJ">Mettre en rayon</span>
                          <span id="metre-en-ray-spiner" class="spinner-border ray-spiner-prop spine-none"></span>
                        </button>

                           <button id="modifierProduitBtn" class="s-none" style=" height: 37px;
                           width: 160px;
                           border-radius: 6px;
                           background-color: #525353;  color: #FFFFFF;
                           font-family: Roboto;
                           font-size: 16px;
                           font-weight: 500;
                           letter-spacing: 0.35px;
                           line-height: 19px;
                           text-align: center;border:1px solid  #c8dbf3;" onclick="produitUpdate()">Modification</button>
                        </div>

                            </div>
                    </div>
