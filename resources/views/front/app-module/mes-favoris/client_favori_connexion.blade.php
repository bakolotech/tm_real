        {{-- partager ma boutique  --}}
        <div class="modal fade" id="clientFavoriConnexionModal" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true" style="z-index: 20000">
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

                        .favori-btn-connection {
                            height: 37px;
                            width: 227px;
                            border-radius: 6px;
                            background-color: #1A7EF5;

                            color: #FFFFFF;
                            font-family: Roboto;
                            font-size: 14px;
                            font-weight: 500;
                            letter-spacing: 0.31px;
                            line-height: 18px;
                            text-align: center;
                            border: transparent;

                        }

                        .fav-msg-libelle {
                            height: 16px;
                            width: 216px;
                            color: #191970;
                            font-family: Roboto;
                            font-size: 14px;
                            font-weight: 300;
                            letter-spacing: -0.34px;
                            line-height: 16px;
                            text-align: center;
                            position: relative;
                            margin-right: auto;
                            margin-left: auto;
                            margin-top: 19px;
                        }


                    </style>
                    <div class="modal-body px-0" style="height: 213px;padding-top: 25px;">
                        <div class="text-confirmer-la-suppres-client" style="position: relative; margin-left: auto; margin-right: auto;"><span>Mes favoris</span></div>
                        <div  class="entete-modal-delete-client"></div>
                        <div class="fav-msg-libelle">Connectez-vous pour gérer vos listes</div>
                        <div class="d-flex">

                            <div class="main-social-media" style="position: relative; margin-left: auto; margin-right: auto; margin-top:55px">
                                <button class="favori-btn-connection" onclick="favoriAuthentication()">Se connecter / S’inscrire</button>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
