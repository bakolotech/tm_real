<div class="main-menu-avatar-element">
    <div style="border:1px solid #D8D8D8;border-radius: 5px;width:319px ;margin-left: 5px; height: 80px;">

        <a href="#" class="mariehh" data-id="newAvatard" style="text-decoration: none;" id="avatarBoxZone" onclick="showAvatard()">
            <div class="head-left-mask mariesd" data-id="newAvatarde" style="background-color: #fff; display:flex; justify-content: center; align-items:center" >
                {{-- <span class="oval">
                    <img src="assets/images/icones-vendeurs2/Off Copy.svg" width="24px;" height="24px" style="margin-top:22px;margin-left:-40px;">
                </span> --}}
                <span style="font-size: 50px;
                font-weight: 900;" class="avatar-letter-small">
                    @if(isset($_SESSION['boutique_profil_mage']) && $_SESSION['boutique_profil_mage'] != "")
                    <img src="{{ $_SESSION['boutique_profil_mage'] }}" alt="" />
                    @else
                    {{substr($_SESSION['boutique_marchand'], 0, 1)}}
                @endif
                </span>
            </div>
        </a>

        <div class="quel-plaisir-de-vous">
            Quel plaisir de vous revoir,
             <p class="nom-marchand-title" style="" id="nom_store"> {{$_SESSION['boutique_marchand']}}</p>
         </div>

        <div class="p-rect-corps-right">
            <span class="proprio" id="">
                @if($_SESSION['role_marchand'] == 4)
                    Editeur. (vous)
                @elseif ($_SESSION['role_marchand'] == 2)
                    Proprio. (vous)
                @elseif($_SESSION['role_marchand'] == 5)
                    Demarcheur. (vous)
                @elseif($_SESSION['role_marchand'] == 6)
                    Membre. (vous)
                @elseif($_SESSION['role_marchand'] == 7)
                    Membre. (vous)
                @endif
            </span>
        </div>

    </div>

    <style>
        img {
      max-width: 100%; /* This rule is very important, please do not ignore this! */
    }

    /* #canvas {
      height: 600px;
      width: 600px;
      background-color: #ffffff;
      cursor: default;
      border: 1px solid black;
    } */
    </style>
    <style>
        .nom-marchand-title {
            height: 22px;
            width: 120px;
            color: #191970;
            font-family: Roboto;
            font-size: 18px;
            font-weight: 500;
            letter-spacing: 0;
            line-height: 22px;margin-top:0px;
        }

        .personnaliser-profil-text {
            border:1px solid #D8D8D8;
            border-top-left-radius:5px;
            border-top-right-radius:5px;
            width: 1200px;
            margin-left:1%;
            margin-right: 5px;
            margin-left:5px;
            margin-top: 1%;
            background-color: white;
        }

        .ajoutPhotoDiv {
            background-color:#F8F8F8 ;
            width: 1200px;
            margin-left: 5px;
            margin-right:5px;
            border-left: 1px solid #D8D8D8;
            border-right: 1px solid#D8D8D8;
            height: 36px;
        }

        .ajouterPhotoText {
            text-align: center;
            color: #191970;
            font-size: 12px;
            padding-top: 10px;
            padding-bottom: 5px;
        }

        .avatar-actuel {
            text-align: left; color : #1A7EF5 ;
            padding-left: 8px;
            font-family: Roboto ;
            font-size: 20px;
            margin-left:-7px;

        }
        .main-avatar-zone-marchand {
            border:1px solid#D8D8D8;
            width: 1200px;
            height:403px;
            margin-left:5px;
            margin-right: 5px;
            border-bottom-left-radius:5px;
            border-bottom-right-radius:5px;
            margin-bottom: 5px;
            background-color: #fff;
        }

        .boutiqueLetterStyle {
            text-align:center;
            position: relative;
            font-size: 100px;
            font-weight: 900;
        }

        .btnAnnulerMarchand {
            width: 194px;
            height: 37px;
            border: 1px solid #1A7EF5;
            color:#1A7EF5;
            font-size: 16px;
            margin-left:35px;
            border-radius: 6px;
            font-size: 16px;
            font-weight: 500;
            letter-spacing: 0.35px;
            line-height: 18px;
            text-align: center
        }
        .nouvel-avatar-titre {
            text-align: left; color : #1A7EF5 ;
            padding-left: 8px;
            font-family: Roboto ;
            font-size: 20 px ;
            margin-left:-8.5px;
        }
        .zoneAvatarMarchand {
            box-sizing: border-box;
            height: 216px;
            width: 216px;
            content:'';
            border: 2px dashed #9B9B9B;
            border-radius: 6px; overflow:hidden;
        }
        .aucunFichierSelectionner {
            margin-top:60px;color: #4A4A4A;
            font-family: Roboto;
            font-size: 14px;
            font-weight: 300;
            letter-spacing: -0.34px;
            line-height: 16px;
            text-align: center;
        }

        .ajouterUnePhotoText {
            margin-top: 30px;  color: #4A4A4A;
            font-family: Roboto;
            font-size: 14px;
            font-weight: 300;
            letter-spacing: -0.34px;
            line-height: 16px;
            text-align: center;
        }
        .inputRangePhoto {
            background-color: #191970;
            color:#191970;
            text-align:center;
            margin-left: 41px;
            margin-top: 160px;
            display:none
        }
        .zoneImageLoad {
            border-radius: 6px;
            border:1px solid #1A7EF5;
            color: #1A7EF5;
            width:138px;
            height: 36px;
            padding-left: 55px;
            padding-top: 5px;
            margin-left:40px;
            position: absolute;
        }

        .btnZoomFermer {
            box-sizing: border-box;
            height: 216px;
            width: 216px;
            border: 1px solid #9B9B9B;
            border-radius: 6px;
            background-color: #FFFFFF;
            display:none;
        }
        .enregistrementBtn {
            width: 194px;height: 37px;
            font-size: 16px;
            text-align: center;
            margin-left:-10px;
            border-radius: 6px;
            background-color:#1A7EF5;
            color: white;
            font-size: 16px;
            font-weight: 500;
            letter-spacing: 0.35px;
            line-height: 18px;
            text-align: center
        }

        .img_bg {
            background-color: #D8D8D8 !important;
            pointer-events: none;
        }

        .inputRange {
            background-color: #191970;
            color:#191970;
            margin-top: 150px;
            text-align:center;
            margin-left:40px;
        }

        .text-photo-element {
            height: 28px;
            margin-top: 10px;
            width: 562px;
            color: #D0021B;
            font-family: Roboto;
            font-size: 12px;
            letter-spacing: -0.34px;
            line-height: 13px;
            text-align: center;
            margin-left:330px;
            margin-top: 35px;
        }

        .cropper-crop-box {
            border-radius: 12px !important;
        }

    </style>

    <div class="avatar-none zone-glob" style=" position:absolute; margin-top: -1px; z-index: 100000" id="avatarElementZoneSection">
        <div  class="personnaliser-profil-text">
            <div class="row ">
                <h4 style="font-size: 20px;color: #191970; border: 1px; padding-top: 5px; text-align: center; ">
                    Personnalisez votre profil
                </h4>
            </div>
        </div>

        <div  class="ajoutPhotoDiv">
            <p class="ajouterPhotoText">Ajoutez une photo ou modifiez votre avatar afin de rendre les échanges plus sympa !</p>
        </div>

        <div class="main-avatar-zone-marchand">
            <div  style="margin-left: 365px;margin-right:90px;margin-top: 20px;">
                <div style="width: 220px;height:305px;">
                    <h5 class="avatar-actuel">Avatar actuel</h5>
                    <div class="box-avatar-element">
                    <a href="" style="text-decoration: none" id="avatar-letter">
                        <div class="boutiqueLetterStyle">
                        @if(isset($_SESSION['boutique_profil_mage']) && $_SESSION['boutique_profil_mage'] != "")
                            <img src="{{ $_SESSION['boutique_profil_mage'] }}" alt="" />
                            @else
                            {{substr($_SESSION['boutique_marchand'], 0, 1)}}
                        @endif
                    </div>
                    </a>
                    </div>
                    <br>
                    <button onclick="cancelMarchandAvatar()" class="btn btn-outline btnAnnulerMarchand" >Annuler</button>
                </div>
                <div style="width: 220px;height:305px ;margin-left: 259px;margin-top:-305px;">
                    <h5 class="nouvel-avatar-titre" >Nouvel avatar</h5>
                    <div style="" id="newpp" class="av-zone zoneAvatarMarchand" >

                        <p class="aucunFichierSelectionner" style="" id="marchandImageAucunFichier"> Aucun fichier sélectionner</p>
                        <p class="ajouterUnePhotoText" style="" id="marhandBtnAjoutImg">Ajouter une image</p>

                        {{-- <input id="img-zoomer-section" type="range" min="1" max="100" value="20"  id="RangePhoto" class="rangePhot inputRangePhoto" style=""> --}}

                        <div id="boutonChargerImage" style="" class="zoneImageLoad">
                            <input type="file" style="visibility:hidden; position: absolute" id="marchandAvatarElement" onchange="changeMarchandAvatar('marchandAvatarElement')" />
                           <a   href="#" onclick="document.getElementById('marchandAvatarElement').click()"> <img src="assets/images/icones-vendeurs2/Plus2.svg" width="30px" height="25px"></a>
                        </div>

                    </div>
                    <div class="avatar-cropper avatar-none" style="position: absolute; margin-top: -216px;">
                        <a href="#" id="btnRestore" ><img src="assets/images/icones-vendeurs2/Ferme.svg" height="25px" width="25px" style="position:absolute; margin-left:185px;margin-top:3px; z-index: 10"></a>
                        <div class="zoneAvatarMarchand" id="croppedCanvas">
                            <canvas id="canvas" style="position: absolute">
                                Your browser does not support the HTML5 canvas element.
                            </canvas>
                        </div>

                        <div id="resultd"></div>

                    </div>

                    {{-- Avatar de zoom --}}
                    {{-- <div class="btnZoomFermer" style="" id="photozoom1">
                        <a href="#" onclick="fermephotozoom()"><img src="assets/images/icones-vendeurs2/Ferme.svg" height="25px" width="25px" style="margin-left:185px;margin-top:3px;"></a>
                        <input type="range" min="1" max="100" value="20"  id="RangePhoto" class="rangePhot inputRange" >
                    </div> --}}
                    <br>

                    <button class="btn btn img_bgd enregistrementBtn" style="" id="saveCroppedImage">Enregistrer</button>
                </div>
            </div>
            <p class="text-photo-element">Votre photo ne doit pas être contraire aux bonnes mœurs ou à l'ordre public, ni porter atteinte aux droits de tiers. <br> Nous acceptons les formats : jpg, jpeg, png • Poids max : 8 Mo</p>
        </div>

        <style>
              .dragme{
                position:relative;
                width: 270px;
                height: 203px;
                cursor: move;
            }

            #draggable {
                background-color: #ccc;
                border: 1px solid #000;
            }
        </style>
    </div>
    </div>

