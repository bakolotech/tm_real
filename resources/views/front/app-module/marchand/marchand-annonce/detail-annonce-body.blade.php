
<?php
// use App\Http\Controllers\UniverController;
use Illuminate\Support\Facades\DB;

    $boutique_rayon_infos = DB::table('boutiques')
    ->join('boutique_rayons', 'boutiques.id', '=', 'boutique_rayons.boutique_id')
    ->join('rayons', 'boutique_rayons.rayon_id', '=', 'rayons.id')
    ->select('rayons.*', 'rayons.libelle', 'rayons.id')
    ->where('boutiques.id', $_SESSION['boutique_marchand_id'])
    ->get();

    $boutique_univers_infos = DB::table('boutiques')
    ->join('boutique_univers', 'boutiques.id', '=', 'boutique_univers.boutique_id')
    ->join('univers', 'boutique_univers.univers_id', '=', 'univers.id')
    ->select('univers.*', 'univers.libelle', 'univers.id')
    ->where('boutiques.id', $_SESSION['boutique_marchand_id'])
    ->get();

?>
<section style="width: 558px;height:100px; background-color:#191970;">
    <p style="" class="detail-annonce-step-1-title">1- Détails de l'annonce</p>
</section>

<style>
    .test-caracteristique-btn {
        border: transparent;
        background-color: green;
        padding: 3px 10px;
        color: #fff;
        margin-left: 205px;
        margin-top: 5px;
        font-size: 10px;
        border-radius: 4px;
    }

    .video-media {
        position: relative;
        left: -10px;
    }

    .img_preview-class {
        height: auto;
        border-radius: 0px !important;
        max-height: 101px !important;
        padding-left: 5px;
        padding-right: 5px;
    }

    .main-image-preview {
        border-radius: 0px !important;
        max-height: 310px !important;
    }

    .image-main-preview-1-divD {
        padding-left: 5px;
        padding-right: 5px;
    }

    .default-zone-preview-long {
        height: 100% !important;
        width: auto !important;
    }

</style>

<div class="detailan">
    <section style="background-color: #F8F8F8; width: 575px;height: 122px;padding-top: 15px;">
        <div style="border-left:3px solid #1A7EF5;padding-left:20px;border-top-left-radius: 2px;">
            <p class="detail-annonce-libelle"><small class="red-star">*</small>TITRE DE VOTRE ANNONCE</p>
            <p style="  color: #9B9B9B;
    font-family: Roboto;
    font-size: 14px;
    letter-spacing: 0.31px; margin-bottom: 10px !important; margin-top: 6px; line-height: 18px
    ">Choisissez des mots-clés que les acheteurs utilisent pour des recherches.</p>

    <!-- libelle produit  -->
        <input type="text" class="phone-input-1" id="libelle-produit" value="" placeholder="Apple iPhone XR - 64Go - Noir" maxlength="33" />
        <span class="input-count"><span id="countings">0</span>/33</span>
        <br>
        <input type="hidden" class="phone-input-1" id="tabcaracteristique" value="" placeholder="Apple iPhone XR - 64Go - Noir">
        <input type="hidden" class="phone-input-1" id="id_sous_cat" value="" placeholder="Apple iPhone XR - 64Go - Noir" >
        <input type="hidden" class="meme-produit" id="vendre-meme-produit" value="false">
        <input type="hidden" class="rayon_input" id="rayon_id" > <!--hidden input for rayon id-->
        <input type="hidden" class="input-edit-value" id="edit-hidden-value" value="0" />
        <input type="hidden" class="input_update_id" id="id_produit_update" value="0" />

</div>
</section>

<hr class="hr-divider">

<section style=" height: 220px; width: 558px; background-color: #F8F8F8 !important;">
    <div class="rayon-categoris" >
                    {{-- style="padding-top: 14px" --}}
    <div class="text-categorie-zone" style="margin-left: 17px">
        <p class="detail-annonce-libelle" style="padding-bottom: 5px !important;"><small class="red-star">*</small>Catégorie de votre annonce</p>
        <div class="text-infos-marchand">Vous aurez plus de chances d’être en contact avec plusieurs acheteurs si
            votre <br> annonce se trouve dans la bonne catégorie.</div>
    </div>
    <div class="categorie-input">
        <div class="select-input" style="display: flex; flex-direction: column">
            <label class="label-rayon-univers" for="categorie">Univers</label>
            <select style="padding-right: 30px" name="univers" id="univer-boutique" >
                <option value="-1">--Choisir un univers--</option>
                @foreach($boutique_univers_infos as $univer)
                <option value="{{$univer->id}}">{{$univer->libelle}}</option>
                @endforeach
            </select>
        </div>

        <div class="select-input" style="display: flex; flex-direction: column">
        <label class="label-rayon-univers" for="rayon">Rayon</label>
            <select name="categorie" id="produit-rayon">
                <option value="-1">-- Choisir un rayon --</option>
                @foreach($boutique_rayon_infos as $r)
                <option value="{{$r->id}}">{{$r->libelle}}</option>
                @endforeach
            </select>
            <span style="font-size: 10px; color: red" class="rayon-message s-none" id="rayon-section-label"></span>
        </div>

        <div class="select-input" style="display: flex; flex-direction: column; margin-top: 10px">
            <label class="label-rayon-univers"  for="rayon">Catégorie</label>
            <select name="categorie" id="produit-famille" style="margin-top: 0px">
                <option value="-1">-- Choisir une catégorie --</option>
            </select>
            <span style="font-size: 10px; color: red" class="rayon-message s-none" id="rayon-section-label"></span>
        </div>

        <div class="select-input" style="display: flex; flex-direction: column; margin-top: 10px">
            <label class="label-rayon-univers"  for="rayon">Sous Catégorie</label>
            <select name="categorie" id="produit-famille-sousCategorie" style="margin-top: 0px">
                <option value="-1">-- Choisir une sous catégorie --</option>
            </select>
            
            <span style="font-size: 10px; color: red" class="rayon-message s-none" id="rayon-section-label"></span>
            
            <div class="add-sous-cat-element s-none" id="ajout-sous-cat-section">
                <input type="text" placeholder="" id="new_categorie">
                <button onclick="ajout_sous_cat_by_categorie()">Ajouter</button>
            </div>

        </div>

        </div>
    </div>
</section>

{{-- <button onclick="getTaille()">Get taille</button> --}}
    <hr class="hr-divider">

    <section style="" class="caracteristiques-section-elements-min" id="main_caracteristique_section1">
        <div class="caracteristique-section-container">
            <p class="caracteristique-objet-1" class="detail-annonce-libelle" style="margin-bottom:5px">
            <small class="red-star">*</small>CARACTERISTIQUE DE L'OBJET</p>
         <div class="text-infos-marchand" >Les acheteurs ont besoin de ces détails pour trouver votre objet.</div>

        <div class="caracteristique_element" id="caracteristique_element-id" style="margin-top: 10px; height: 180px;overflow-y: scroll;">
            {{-- container reservé aux caracteristiques  --}}

        </div>

        </div>
    </section>

    <hr class="hr-divider">

    <section style=" height: 446px; width: 558px; background-color: #F8F8F8;padding-top: 15px;" >
        <div class="ajout-une-plus-images" >
            <p style="" class="detail-annonce-libelle p-detail-anonce">

            <small class="red-star">*</small>Ajouter une ou plusieurs images</p>
            <p class="p-ajout-autant-images" >Ajoutez autant de photos que possible pour inspirer confiance aux acheteurs.</p>
            <p class="p-photo-element-title">Photos</p>
            <p class="p-photo-counter" id="photo-counter">(0/6)</p>
            <p style="" class="s-nones p-tout-supprimer" id="section-image-title1">
                <a href="#" style="text-decoration: none" onclick="deleteAllImage()" class="under-line-element">Tout supprimer</a> |
                <a href="#" onclick="showWebImport()" style="text-decoration: none" class="under-line-element">Importer à partir du Web</a>
            </p>
            <p style="" class="s-none p-copier-url" id="section-image-title2">
                Copier les photos à partir d'une URL
            </p>

                    {{-- section image --}}
            <div class="s-nones" id="image-section-standard">
            <div class="cadre-images-zone" >
            <div class="cadre-zone-grand s-none" id="cadre-error">

                <input type="hidden" id="current_preview_image" value="">

                <img id="main-image-preview-error" src="assets/images/icones-vendeurs2/offimage.svg" width="75px" height="75px"  /> <br>
                <div class="photo-button-sectionh">
                    <h4 class="text-format-error">
                        Format de fichier non<br> pris en charge
                    </h4> <br>
                    <p class="photo-instruction-1 s-none" style="color: #D0021B" id="g-preview-error"></p>

                    <p class="photo-instruction">
                        Le fichier n'est pas pris en charge par TOULÈ MARKET.<br>

                        Veuillez le supprimer et charger uniquement <br>
                        des fichiers JPG, GIF, PNG, TIF ou BMP.
                    </p>

                </div>

            </div>
        <div class="cadre-zone-grand" id="cadre-cadre-preview" >

            <div class="main-image-section"  id="defaut-preview-section">

            <div class="image-main-preview-1-div flex-zone-cropped" style="justify-content: center; align-items: center" id="main-image-preview1-parent">
                <img id="main-image-preview1"  src="assets/images/icones-vendeurs2/image_outline_icon_139447.svg" width="75px" height="75px"  />
            </div>

            <div style="position: relative;
            left: 56px;">

                <div>
                    <input id="myInputCustomMarchand" type="file" name='files[]' style="visibility:hidden; position: absolute" onchange="imageChanged()" multiple />
                    <button id="file" style="border: 1px solid #1A7EF5; width: 200px;height:41px;color: #1A7EF5;border-radius: 5px;background-color: white ;margin-top:20px; position: relative; " onclick="document.getElementById('myInputCustomMarchand').click()">
                    <img src="assets/images/icones-vendeurs2/plus.svg">&nbsp Ajouter une photo
                </button>
                </div>

                <div style="position: relative; left: -60px">
                    <p class="photo-instruction">Les photos comportant des bordures, <br>du texte ou des illustrations ne sont pas autorisés.<br><br> Vous pouvez également</p>
                <p class="photo-instruction-1"> copier les photos à partir d'une URL.</p>
                </div>

            </div>

        </div>

    <div class="main-image-section content-reserved s-none-forced" id="preview-image-section-div">

        <div class="image-main-preview-1-divD">
            <img id="main-image-preview" class="default-zone-preview" data-url = "1000"  src="assets/images/icones-vendeurs2/image_outline_icon_139447.svg" width="75px" height="75px"  style="height: auto"/>
        </div>

    </div>

    <iframe class="s-none" id="preview_video"  width="308" height="308"
    src="">
    </iframe>

</div>

{{-- </canvas> --}}

<div class="zones-images-petit">

<div class="petit-cadre-image-produit" >

    <div class="image-principal-label">Image Principal</div>
    <img id="photo_0-bclose" class="close-photo-small-photo s-none" src="assets/images/Ferme.svg" alt="" style="" onclick="supprimerImage('photo_0')" width="20px" height="20px"/>
    <img id="photo_0-berror" class="close-photo-small-photo s-none" src="assets/images/Ferme.svg" alt="" width="16px" height="16px" style="position: relative; top: -40px; left: 80px;" onclick="supprimerImagePrincipal('photo_0')" width="20px" height="20px"/>
    <img class="img_preview-class"  style="display: none" data-input-file="photo_0" id="photo_0-view" src="" width="75px" height="75px"  onclick="globalView('photo_0-view')"/>

    <button id="photo_0-b" onclick="document.getElementById('photo_0').click()" style="">
        <img id="photo_0-p"  data-img="false" width="30px" height="30px" src="assets/images/icones-vendeurs2/plus.svg" alt="" />
    </button>

    <input id="photo_0" type="file" name='files[]' style="visibility:hidden" onchange="imageChangedPrincipal('photo_0')" multiple />

</div>
    {{-- img 1  --}}
    <div class="petit-cadre-image-produit" >
        <img id="photo_1-bclose" class="close-photo-small-photo s-none" src="assets/images/Ferme.svg" alt="" style="" onclick="supprimerImage('photo_1')" width="20px" height="20px"/>
        <img id="photo_1-berror" class="close-photo-small-photo s-none" src="assets/images/Ferme.svg" alt="" width="16px" height="16px" style="position: relative; top: -40px; left: 80px;" onclick="supprimerImagePrincipal('photo_1')" width="20px" height="20px"/>
        <img class="img_preview-class" style="display: none" data-input-file="photo_1" id="photo_1-view" data-urlBis="1000" src="" width="75px" height="75px"  onclick="globalView('photo_1-view')"/>
        <button id="photo_1-b" onclick="document.getElementById('photo_1').click()">
            <img id="photo_1-p" data-img="false" width="30px" height="30px" src="assets/images/icones-vendeurs2/plus.svg" alt="" />
        </button>

        <input id="photo_1" type="file" name='photo1' style="visibility:hidden" onchange="imageChangedPrincipal('photo_1')" multiple />

    </div>
        {{-- img  2 --}}
        <div class="petit-cadre-image-produit" >
            <img id="photo_2-bclose" class="close-photo-small-photo s-none" src="assets/images/Ferme.svg" alt="" style="" onclick="supprimerImage('photo_2')" width="20px" height="20px"/>
            <img id="photo_2-berror" class="close-photo-small-photo s-none" src="assets/images/Ferme.svg" alt="" width="16px" height="16px" style="position: relative; top: -40px; left: 80px" onclick="supprimerImagePrincipal('photo_2')" width="20px" height="20px"/>
            <img class="img_preview-class" style="display: none" data-input-file="photo_2" id="photo_2-view" data-urlBis="1000" src="" width="75px" height="75px"  onclick="globalView('photo_2-view')"/>
            <button id="photo_2-b" onclick="document.getElementById('photo_2').click()" style="">
                <img id="photo_2-p"  data-img="false" width="30px" height="30px" src="assets/images/icones-vendeurs2/plus.svg" alt="" />
            </button>
            <input id="photo_2" type="file" name='photo2' style="visibility:hidden" onchange="imageChangedPrincipal('photo_2')" multiple />
        </div>
        {{-- img  3 --}}
        <div class="petit-cadre-image-produit">
            <img id="photo_3-bclose" class="close-photo-small-photo s-none" src="assets/images/Ferme.svg" alt="" style="" onclick="supprimerImage('photo_3')" width="20px" height="20px"/>
            <img id="photo_3-berror" class="close-photo-small-photo s-none" src="assets/images/Ferme.svg" alt="" width="16px" height="16px" style="position: relative; top: -40px; left: 80px" onclick="supprimerImagePrincipal('photo_3')" width="20px" height="20px"/>
            <img class="img_preview-class" style="display: none" data-input-file="photo_3" id="photo_3-view" data-urlBis="1000" src="" width="75px" height="75px"  onclick="globalView('photo_3-view')"/>
            <button id="photo_3-b" onclick="document.getElementById('photo_3').click()" style="">
                <img id="photo_3-p"  data-img="false" width="30px" height="30px" src="assets/images/icones-vendeurs2/plus.svg" alt="" />
            </button>
            <input id="photo_3" type="file" name='photo3' style="visibility:hidden" onchange="imageChangedPrincipal('photo_3')" multiple />
        </div>
        {{-- img  4 --}}
        <div class="petit-cadre-image-produit">
            <img id="photo_4-bclose" class="close-photo-small-photo s-none" src="assets/images/Ferme.svg" alt="" style="" onclick="supprimerImage('photo_4')" width="20px" height="20px"/>
            <img id="photo_4-berror" class="close-photo-small-photo s-none" src="assets/images/Ferme.svg" alt="" width="16px" height="16px" style="position: relative; top: -40px; left: 80px" onclick="supprimerImagePrincipal('photo_4')" width="20px" height="20px"/>
            <img  class="img_preview-class" style="display: none" data-input-file="photo_4" id="photo_4-view" data-urlBis="1000"src="" width="75px" height="75px"  onclick="globalView('photo_4-view')"/>
            <button id="photo_4-b" onclick="document.getElementById('photo_4').click()" style="">
                <img id="photo_4-p"  data-img="false" width="30px" height="30px" src="assets/images/icones-vendeurs2/plus.svg" alt="" />
            </button>
            <input id="photo_4" type="file" name='photo4' style="visibility:hidden" onchange="imageChangedPrincipal('photo_4')" multiple />
        </div>
        {{-- img  5 --}}
        <div class="petit-cadre-image-produit ">
            <img id="photo_5-bclose-bis" class="close-photo-small-photo s-none" src="assets/images/Ferme.svg"style=""  width="20px" height="20px"/>
            <img id="photo_5-berror" class="close-photo-small-photo s-none" src="assets/images/Ferme.svg" alt="" width="16px" height="16px" style="position: relative; top: -40px; left: 80px" onclick="supprimerImagePrincipal('photo_5')" width="20px" height="20px"/>
            <img class="img_preview-class" style="display: none" data-input-file="photo_5" id="photo_5-view" data-urlBis="1000" src="" width="75px" height="75px" onclick="globalView('photo_5-view')" />

            <div class="video-play-button s-none" >
                    <button onclick="showVideoPreview()" style="background-color: #fff; position: relative; left: 24px;" class="video-media">
                        <img style="width: 50px; height: 50px" src="assets/images/1497554804-social-media04_84871.svg" />
                    </button>
                    <input style="position: absolute" type="hidden" value="" placeholder="video caché" id="videoPreviewInput" />
                </div>
                <button id="photo_5-b" onclick="showWebImport()" style="">
                <img id="photo_5-p"  data-img="false" width="30px" height="30px" src="assets/images/icones-vendeurs2/plus.svg" alt="" />
            </button>
            <input id="photo_5" type="file" name='photo5' style="visibility:hidden" onchange="imageChangedPrincipal('photo_5')" multiple />
        </div>

    </div>

    </div>

    <div style="padding-left:20px; border-top-left-radius: 2px; ">
        <input type="hidden" id="image_sources" value="">
        <div style="" class="zones-option-image">

        <div id="cropped-original-element" style="position: relative;  left: 9px">
        <button class="image-option" onclick="resizeImageByCropping()"><img src="assets/images/icones-vendeurs2/Recadrer-black.svg" width="25px" height="25px" style="margin-left: 10px;"></button>

        <button  id="cropImaged" class="image-option"><img src="assets/images/icones-vendeurs2/Rotation.svg" width="25px" height="25px" style="margin-left :20px;"></button>

        <button id="brightness-incff" class="image-option"><img src="assets/images/icones-vendeurs2/Luminausite_&_contraste.svg" width="25px" height="25px" style="margin-left :20px;"></button>

        <button  class="image-option"><img  src="assets/images/icones-vendeurs2/Netteter.svg" width="25px" height="25px" style="margin-left :20px;"></button>

        <button  id="exposureff" class="image-option"><img  src="assets/images/icones-vendeurs2/Ajuster_automatiquement.svg" width="25px" height="25px" style="margin-left :20px;"></button>

        <button onclick="removeImage()" class="image-option"><img  src="assets/images/icones-vendeurs2/Poubelle.svg" width="25px" height="25px" style="margin-left :20px;"></button>
        </div>
        <div class="photo-crope-option s-none" id="cropped-extra-option" style="position: relative; left: 22px">

        <div class="crop-cancel crop-btn-center" onclick="resetCropperElement()">
            <img src="assets/images/crop-cancel.png" />
        </div>

        <div class="crop-success crop-btn-center" onclick="saveCroppedProductPhoto()">
            <img src="assets/images/crop-success.svg" />
        </div>

        <div class="crop-zoom-in crop-btn-center" onclick="cropZoomIn()">
            <img src="assets/images/crop-zoom-in.svg" />
        </div>

        <div class="crop-zoom-out crop-btn-center" onclick="cropZoomOut()">
            <img style="height: 5px" src="assets/images/crop-zoo-out.png" />
        </div>
    </div>
</div>

<button id="save-all-image-button" class="save-all-images" onclick="saveImageProvisoir()" >Importer</button>

</div>

</div>

<article class="s-none image-url-section" id="image-section-online">
    <div class="scrolphoto">
    <div class="url-boxS" id="url-box_2" style="margin-top: 20px">

        <div class="number-img-url" style="display: flex; justify-content: center; align-items: center;">
            01.
        </div>

        <div class="photo-img-url" id="input-web_0">
            <div class="photo-img-url1 s-noned" id="photo_1-url-button">
                <aside id="photo_0-file" style="border: 1px solid #1A7EF5; width: 449px;height:41px;color: #1A7EF5;border-radius: 5px;background-color: white;padding-top:7px;padding-left:150px;" onclick="replaceButton('photo_1-url')">
                <img src="assets/images/icones-vendeurs2/plus.svg">&nbsp Ajouter une photo</aside>
            </div>

            <div class="photo-img-url" id="input-web_0">
                <div class="photo-img-url1 s-none" id="photo_1-url-button">
                    <aside id="file" style="border: 1px solid #1A7EF5; width: 449px;height:41px;color: #1A7EF5;border-radius: 5px;background-color: white;padding-top:7px;padding-left:150px;" onclick="replaceButton('photo_1-url')"><img src="assets/images/icones-vendeurs2/plus.svg">&nbsp Ajouter une photo</aside>
                </div>
                <div class="photo-img-url1 " id="photo_1-url-div">
                    <input id="photo_0-url-value" type="text" style="  height: 41px;
                    width: 449px;
                    border: 1px solid #1A7EF5;
                    border-radius: 6px;
                    background-color: #FFFFFF;color: #4A4A4A;
                    font-family: Roboto;
                    font-size: 14px;
                    letter-spacing: -0.34px;
                    line-height: 16px;padding:5px;" placeholder="Saisissez l’URL de l’emplacement de la photo" >
                    <span onclick="closeInputUrl('photo_1-url')" class="clean-text-suggestion " style="position: absolute; margin-left: -25px; background-color: #fff; top: 44px; color: red; font-size: 14px">&times;</span>
                </div>
            </div>

            </div>
        </div>

    <div class="url-boxS" id="url-box_2" >

        <div class="number-img-url" style="display: flex; justify-content: center; align-items: center;">
            02.
        </div>

        <div class="photo-img-url" id="input-web_1">
            <div class="photo-img-url1" id="photo_2-url-button">
                <aside id="photo_1-file" style="border: 1px solid #1A7EF5; width: 449px;height:41px;color: #1A7EF5;border-radius: 5px;background-color: white;padding-top:7px;padding-left:150px;" onclick="replaceButton('photo_2-url')"><img src="assets/images/icones-vendeurs2/plus.svg">&nbsp Ajouter une photo</aside>
            </div>
            <div class="photo-img-url1 s-none" id="photo_2-url-div">
                <input class="photo_1-url-value" id="photo_1-url-value" type="text"  placeholder="Saisissez l’URL de l’emplacement de la photo" >
                <span onclick="closeInputUrl('photo_2-url')" class="clean-text-suggestion " style="position: absolute; margin-left: -25px; background-color: #fff; top: 44px; color: red; font-size: 14px">&times;</span>
            </div>
        </div>

        </div>

        <div class="url-boxS" id="url-box_3" >
        <div class="number-img-url" style="display: flex; justify-content: center; align-items: center; ">
            03.
        </div>


        <div class="photo-img-url" id="input-web_2">
            <div class="photo-img-url1 " id="photo_3-url-button">
                <aside id="photo_2-file" style="border: 1px solid #1A7EF5; width: 449px;height:41px;color: #1A7EF5;border-radius: 5px;background-color: white;padding-top:7px;padding-left:150px;" onclick="replaceButton('photo_3-url')"><img src="assets/images/icones-vendeurs2/plus.svg">&nbsp Ajouter une photo</aside>
            </div>
            <div class="photo-img-url1 s-none" id="photo_3-url-div">
                <input id="photo_2-url-value" class="photo_url-2-value" type="text"  placeholder="Saisissez l’URL de l’emplacement de la photo" >
                <span onclick="closeInputUrl('photo_3-url')" class="clean-text-suggestion " style="position: absolute; margin-left: -25px; background-color: #fff; top: 44px; color: red; font-size: 14px">&times;</span>
            </div>
        </div>
        </div>

        <div class="url-boxS" id="url-box_4" >

        <div class="number-img-url" style="display: flex; justify-content: center; align-items: center;">
            04.
        </div>

        <div class="photo-img-url" id="input-web_3">
            <div class="photo-img-url1" id="photo_4-url-button">
                <aside id="photo_3-file" style="border: 1px solid #1A7EF5; width: 449px;height:41px;color: #1A7EF5;border-radius: 5px;background-color: white;padding-top:7px;padding-left:150px;" onclick="replaceButton('photo_4-url')"><img src="assets/images/icones-vendeurs2/plus.svg">&nbsp Ajouter une photo</aside>
            </div>
            <div class="photo-img-url1 s-none" id="photo_4-url-div">
                <input id="photo_3-url-value" class="photo_url-3-value" type="text" placeholder="Saisissez l’URL de l’emplacement de la photo" >
                <span onclick="closeInputUrl('photo_4-url')" class="clean-text-suggestion " style="position: absolute; margin-left: -25px; background-color: #fff; top: 44px; color: red; font-size: 14px">&times;</span>
            </div>
        </div>
        </div>

        <div class="url-boxS" id="url-box_5" >

        <div class="number-img-url" style="display: flex; justify-content: center; align-items: center; ">
            05.
        </div>

        <div class="photo-img-url" id="input-web_4">
            <div class="photo-img-url1 " id="photo_5-url-button">
                <aside id="photo_4-file" style="border: 1px solid #1A7EF5; width: 449px;height:41px;color: #1A7EF5;border-radius: 5px;background-color: white;padding-top:7px;padding-left:150px;" onclick="replaceButton('photo_5-url')"><img src="assets/images/icones-vendeurs2/plus.svg">&nbsp Ajouter une photo</aside>
            </div>
            <div class="photo-img-url1 s-none" id="photo_5-url-div">
                <input id="photo_4-url-value" type="text" class="photo_4-url-value" placeholder="Saisissez l’URL de l’emplacement de la photo" >
                <span onclick="closeInputUrl('photo_5-url')" class="clean-text-suggestion " style="position: absolute; margin-left: -25px; background-color: #fff; top: 44px; color: red; font-size: 14px">&times;</span>
            </div>
        </div>
        </div>

        <div class="url-boxS" id="url-box_6" >

        <div class="number-img-url" style="display: flex; justify-content: center; align-items: center; ">
            06.
        </div>

        <div class="photo-img-url" id="input-web_5">
            <div class="photo-img-url1 " id="photo_6-url-button">
                {{-- <input id="photo_2-url" type="text" style="visibility:hidden" /> --}}
                <aside id="file" style="border: 1px solid #1A7EF5; width: 449px;height:41px;color: #1A7EF5;border-radius: 5px;background-color: white;padding-top:7px;padding-left:150px;" onclick="replaceButton('photo_6-url')"><img src="assets/images/icones-vendeurs2/plus.svg">&nbsp Ajouter une vidéo</aside>
            </div>
            <div class="photo-img-url1 s-none" id="photo_6-url-div">
                <input id="photo_5-url-value" type="text" class="photo_5-url-value" placeholder="Saisissez l’URL de l’emplacement de la vidéo" >
                <span onclick="closeInputUrl('photo_6-url')" class="clean-text-suggestion " style="position: absolute; margin-left: -25px; background-color: #fff; top: 44px; color: red; font-size: 14px">&times;</span>
            </div>
        </div>
        </div>

        </div>
        <div class="photo-url-btn-section">
        <section style="width:510px;" >
        <button class="annuler-retour-url-image" onclick="retour_image()">Annuler</button></section>

    <button class="import-url-image-btn" onclick="importerParUrl()">Importer</button>
    <p class="error-message-photo-url">Les photos comportant des bordures/<br>textes/illustrations ne sont pas autorisées.</p>
    </div>
</article>
        {{-- </div> --}}

    {{-- import fichier depuis url  --}}
        </section>

        <hr style="  box-sizing: border-box;
        height: 1px;
        width: 366px;
        border: 1px solid #979797;margin-left:96px;">

    <section class="section-apres-photo-url">
        <div class="description-produit-div" style="border-left:3px solid #1A7EF5;padding-left:15px; border-top-left-radius: 2px; ">
            <p class="detail-annonce-libelle description-object-small"><small class="red-star">*</small>Description de l’objet</p>
    <span class="description-produit-supp" style="">Décrivez les caractéristiques uniques de votre objet et ses défauts.</span>
<textarea maxlength = "4000" id="description_produit" name="w3review" rows="6" cols="62" style="position: relative; left:2px; padding-left:5px"></textarea>
<span class="caracter-counter" id="produit-description-caracter-counter">0 / 4000 caractères</span>
</div>
</section> <br>
