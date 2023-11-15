        {{-- partager ma boutique  --}}
        <div class="modal fade" id="entrerNumeroTelephone" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true" style="z-index: 100001">
            <div class="modal-dialog  modal-dialog-centered shareboutique" >
                <div class="modal-content shareboutique-content" style="background-color: #FFFFFF;box-shadow: 0 5px 15px 0 rgba(0,0,0,0.35);">
                    <style>
                        .etes-vous-sur-de-vou-client {
                            height: 32px;
                            width: 289px;
                            color: #191970;
                            font-family: Roboto;
                            font-size: 14px;
                            font-weight: 300;
                            letter-spacing: -0.34px;
                            line-height: 16px;
                            text-align: center;
                            margin-top: 14.5px;
                            margin-left: 71.5px;
                        }

                        .text-confirmer-la-suppres-client {
                            height: 24px;
                            width: 237px;
                            color: #191970;
                            font-family: Roboto;
                            font-size: 21px;
                            font-weight: 500;
                            letter-spacing: 0;
                            line-height: 23px;
                            text-align: center;
                            margin-bottom: 14.5px;
                            margin-left: 97.5px;
                        }

                        .entete-modal-delete-client {
                            box-sizing: border-box;
                            height: 1px;
                            width: 431px;
                            border: 1px solid #D8D8D8;
                        }

                        .etes-vous-sur-de-vou {
                            height: 32px;
                            width: 289px;
                            color: #191970;
                            font-family: Roboto;
                            font-size: 14px;
                            font-weight: 300;
                            letter-spacing: -0.34px;
                            line-height: 16px;
                            text-align: center;
                            margin-top: 14.5px;
                            margin-left: 71.5px;
                        }

                        #link-to-share-product {
                            position: relative;
                            width: 336px;
                            border: 0px;
                            top: 5px;
                            left: -20px;
                        }

                        #link-to-share-product:focus {
                            border: none;
                            outline: none;
                        }

                        .text-confirmer-la-suppres-client-1 {
                            height: 24px;
                            /* width: 237px; */
                            color: #191970;
                            font-family: Roboto;
                            font-size: 21px;
                            font-weight: 500;
                            letter-spacing: 0;
                            line-height: 23px;
                            text-align: center;
                            margin-bottom: 14.5px;
                            margin-left: 97.5px;

                        }

                        #numero_telephone-client-2 {
                            position: relative;
                            border: 0px;
                            margin-left: auto;
                            margin-right: auto;
                            background-color: #FBFBFB;
                            width: 100%;
                            height: 28px;
                            border-radius: 4px;
                            padding-left: 5px;
                        }

                        #numero_telephone-client-2:focus{
                            border: 0px;
                            outline: 0px;
                        }

                    .ajouter-button-client-num {
                        height: 37px;
                        width: 194px;
                        border-radius: 6px;
                        background-color: #1A7EF5;

                        color: #FFFFFF;
                        font-family: Roboto;
                        font-size: 16px;
                        font-weight: 500;
                        letter-spacing: 0.35px;
                        line-height: 18px;
                        text-align: center;
                        border: transparent;
                        margin-left: 15px;
                    }

                    .annul-button-client-num {
                        box-sizing: border-box;
                        height: 37px;
                        width: 194px;
                        border: 1px solid #1A7EF5;
                        border-radius: 6px;
                        background-color: #FFFFFF;

                        color: #1A7EF5;
                        font-family: Roboto;
                        font-size: 16px;
                        font-weight: 500;
                        letter-spacing: 0.35px;
                        line-height: 18px;
                        text-align: center;

                    }

                    </style>
                    <div class="modal-body px-0" style="height: 213px;padding-top: 25px;">
                        <div class="text-confirmer-la-suppres-client-1" style="position: relative; margin-left: auto; margin-right: auto;"><span>Entrez votre numero <span id="type_service"></span></span></div>
                        <div  class="entete-modal-delete-client"></div>

                        <div class="etes-vous-sur-de-vou-client" id="zoneInputLien-tel" style="position: relative; margin-left: auto; margin-right: auto; background-color: #FBFBFB; width: 95%; height: 25px; margin-top:38px">
                            <input type="text" value="" placeholder="Entrez votre numero de téléphone ..." id="numero_telephone-client-2" style="background-color: transparent"/>
                            <input type="hidden" value="Gloire à Dieu" id="mobileTypeService" style="visibility: hidden">
                        </div>

                        <div class="field-none" id="messageSuccess" style="position: relative; margin-left: auto; margin-right: auto; left: 115px; color: green">
                            <img src="/assets/images/icones-vendeurs2/check.svg" style="position: absolute; margin-left: -30px; margin-top: -2px">
                            Lien de partage copier
                        </div>
                        <div class="d-flex" style="padding-left: 15px; margin-top: 30px">
                            <button class="annul-button-client-num" onclick="annulerInviteAddresse1()" >Annuler</button>
                            <button class="ajouter-button-client-num ajout-adress-livrason-disabled" id="btn_numero_telephone-client" onclick="payWithMobileService()">Continuer</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
