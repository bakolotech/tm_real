        {{-- partager ma boutique  --}}
        <div class="modal fade" id="produitSocialShareModal" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true" style="z-index: 20000">
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

                    </style>
                    <div class="modal-body px-0" style="height: 213px;padding-top: 25px;">
                        <div class="text-confirmer-la-suppres-client" style="position: relative; margin-left: auto; margin-right: auto;"><span>Partager ce produit</span></div>
                        <div  class="entete-modal-delete-client"></div>

                        <div class="etes-vous-sur-de-vou-client" id="zoneInputLien-share" style="position: relative; margin-left: auto; margin-right: auto; background-color: #FBFBFB; width: 95%; height: 25px">
                            <input type="text" value="" id="link-to-share-product" style="background-color: transparent"/>
                            <input type="text" value="Gloire à Dieu" id="myProductLink" style="visibility: hidden">
                        </div>

                        <div class="field-none" id="messageSuccess-share" style="position: relative; margin-left: auto; margin-right: auto; left: 115px; color: green">
                            <img src="/assets/images/icones-vendeurs2/check.svg" style="position: absolute; margin-left: -30px; margin-top: -2px">
                            Lien de partage copier
                        </div>
                        <div class="d-flex">

                            <div class="main-social-media" style="display: flex; column-gap: 10px; position: relative; top: 25px">

                                <div class="social-box-media" id="share-produit-whatapp" style="margin-left: 17px">
                                    <img src="/assets/images/Whatsapp.svg" />
                                </div>

                                <div class="social-box-media" id="share-produit-facebook" onclick="shareOverrideOGMeta()">
                                    <img src="/assets/images/Facebook-share.svg" />
                                </div>

                                <div class="social-box-media" id="share-produit-twiter">
                                    <img style="width: 32px; height: 32px" src="/assets/images/Twitter.svg" />
                                </div>

                                <div class="social-box-media" id="share-produit-mail">
                                    <img src="/assets/images/Copie_Colle Copy.svg" />
                                </div>

                                <div class="social-box-media" id="share-produit-sms">
                                    <img src="/assets/images/sms_icon-icons.com_67293.svg" />
                                </div>

                                <div class="social-box-media tooltip-boutique" id="share-produit-copie-coller">
                                    <img src="/assets/images/Copie_Colle.svg" />
                                    <span class="tooltiptext" id="myTooltip-produit" style="position: absolute">Copier</span>
                                </div>

                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
