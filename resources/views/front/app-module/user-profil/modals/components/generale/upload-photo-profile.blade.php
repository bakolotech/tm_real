
<div id="upload-photo-profil" class="photo-profil photo-profil-classe" style="display: none">

<div class="row-carnet">
<div class="carnet-description" >
 <h4 class="text-carnet">Personnalisez votre profil</h4>
 <p>
     Ajouter une photo ou modifier votre avatar afin de rendre les échanges plus sympa !
 </p>
</div>

</div>

<style>

.user_profil_photo {
    display: flex;
    justify-content: space-between;
    align-items: center;
    flex-direction: column;
}

.photo-cadre{
    box-sizing: border-box;
    height: 216px;
    width: 216px;
    border: 1px solid #9B9B9B;
    border-radius: 6px;
    background-color: #D8D8D8;
}

.photo-frame-avatar {
    display: flex;
    justify-content: space-between;
    align-items: center;
    column-gap: 49px;
}

.photo-cadre-input{
 box-sizing: border-box;
 height: 216px;
 width: 216px;
 border: 1px dashed #9B9B9B;
 border-radius: 6px;
 background-color: #FFFFFF;

 display: flex;
 flex-direction: column;
 justify-content: flex-start;
 align-items: center;
 padding-top: 61px;

}

.photo-cadre-input .input-file-avatar {
     box-sizing: border-box;
     height: 36px;
     width: 138px;
     border: 1px solid #1A7EF5;
     border-radius: 6px;
     background-color: transparent;
     display: flex;
     justify-content: center;
     align-items: center;
}

.button-section-avatar button{
 height: 37px;
 width: 194px;
 border-radius: 6px;
 background-color: #1A7EF5;
 border: none;

 color: #FFFFFF;
 font-family: Roboto;
 font-size: 16px;
 font-weight: 500;
 letter-spacing: 0.35px;
 line-height: 18px;
 text-align: center;
}

.photo-frame-avatar h4 {
 height: 24px;
 width: 130px;
 color: #1A7EF5;
 font-family: Roboto;
 font-size: 20px;
 letter-spacing: -0.48px;
 line-height: 24px;
 text-align: center;
}

.bottm-section-avatar {
    height: 48px;
    width: 655px;
    position: relative;
    margin-left: auto;
    margin-right: auto;

}

.bottm-section-avatar p {

    font-family: Roboto;
    font-size: 14px;
    letter-spacing: -0.34px;
    line-height: 16px;
    text-align: center;
}

.photo-displayed-input p {
    height: 16px;
    width: 150px;
    color: #4A4A4A;
    font-family: Roboto;
    font-size: 14px;
    font-weight: 300;
    letter-spacing: -0.34px;
    line-height: 16px;
    text-align: center;
}

.file-input-hidden {
    opacity: 0;
    position: absolute;
    cursor: pointer;
    right: -198px;
    top:40px;
}

.avatar-phot {
    position: absolute;
    cursor: pointer;
    right: -198px;
    top:160px;
    right: -61px;
}

.photo-cadre-input button {
    cursor: pointer;
}

</style>

<style type="text/css">
    @import url('https://fonts.googleapis.com/css2?family=Gelasio:ital@1&family=Licorice&family=Noto+Sans&family=Roboto:wght@300;400&family=Tajawal:wght@300&display=swap');

    .row-contanier {
        width: 1212px;
        height: 579px;
        position: relative;
        display: flex;
        justify-content: space-between;
        align-items: center;
    }

    .col-left {
        height: 579px;
        width: 320px;
        /* margin-top: 5px; */
    }

    .row-right {
        height: 579px;
        width: 859px;
        margin-right: 5px;
    }



    .user-infos {
        height: 71px;
        width: 201px;
        color: #191970;
        font-family: Roboto;

        font-weight: 500;
        letter-spacing: -0.51px;
        line-height: 23px;
    }

    .user-phrase-appel {
        width: 205px;
        color: #191970;
        font-family: Roboto;
        font-size: 21px;
        font-weight: 500;
        letter-spacing: -0.51px;
        line-height: 24px;
    }

    .user-name {
        width: 205px;
        color: #191970;
        font-family: Roboto;
        font-size: 21px;
        font-weight: 700;
        letter-spacing: -0.51px;
        line-height: 24px;
    }

    .user-ref {
        color: #191970;
        font-family: Roboto;
        font-size: 14px;
        font-weight: 300;
        letter-spacing: 0;
        line-height: 16px;
    }

    .user-infos h6 {
        margin: 0px;
        padding: 0px !important;
    }

    .icon-element {
        position: absolute;
        margin-left: 9.5px;
        /* top: 54px; */
    }

    .profil-icon-1 {
        height: 18px;
        width: 18px;
        margin-right: 23px;
    }

    .profil-icon-2 {
        height: 18px;
        width: 18px;
    }

    .section-2-contanier {
        box-sizing: border-box;
        height: 473px;
        width: 320px;
        border: 1px solid #D8D8D8;
        border-radius: 6px;
        background-color: #FFFFFF;
        display: flex;
        justify-content: center;
        align-items: center;
        margin-left: 5px;
    }

    .card-section {
        height: 433px;
        width: 280px;
    }

    .card .card-header {
        box-sizing: border-box;
        height: 30px;
        width: 280px;
        border: 1px solid #9B9B9B;
        border-radius: 6px 6px 0 0;
        background-color: #9B9B9B;

        color: #FFFFFF;
        font-family: Roboto;
        font-size: 14px;
        font-weight: 500;
        letter-spacing: 0;
        line-height: 16px;
    }

    .card ul li {
        height: 30px;
        width: 280px;
        color: #4A4A4A;
        font-family: Roboto;
        font-size: 14px;
        font-weight: 500;
        letter-spacing: 0;
        line-height: 16px;
    }
    .menu-section {
        box-sizing: border-box;
        height: 34px;
        /* width: 858px; */
        border: 1px solid #D8D8D8;
        border-radius: 6px;
        margin-top: 5px;
    }

    .navbar {
        box-sizing: border-box;
        height: 34px;
        width: 857px;
        border: 1px solid #D8D8D8;
        border-radius: 6px;
        background-color: #1A7EF5;
        margin-top: 5px;

    }

    .navbar .breadcrumb {
        margin-top: 12px;
        margin-left: 30.5px;
    }

    nav ol li {
        font-family: Roboto;
        font-size: 10px;
        letter-spacing: -0.24px;
        line-height: 11px;
    }

    .section-droite-1 {
        box-sizing: border-box;
        height: 524px;
        width: 857px;
        border: 1px solid #D8D8D8;
        border-radius: 6px;
        display: flex;
        flex-direction: column;
        justify-content: flex-start;
        align-items: flex-start;

    }

    .section-button {
        display: flex;
        justify-content: flex-start;
        align-items: flex-start;
        position: relative;
        left: -1px;
    }

    .button-general {
        box-sizing: border-box;
        height: 37px;
        width: 422px;
        border: 1px solid #1A7EF5;
        border-radius: 6px;
        margin-left: 5px;
        background-color: #FFFFFF;
        margin-right: 3px;

        display: flex;
        justify-content: center;
        align-items: center;
    }

    .button-general span {
        color: #191970;
        font-family: Roboto;
        font-size: 16px;
        font-weight: 500;
        letter-spacing: -0.39px;
        line-height: 17px;
    }

    .button-connexion {
        box-sizing: border-box;
        height: 37px;
        width: 422px;
        border: 1px solid #9B9B9B;
        border-radius: 6px;
        background-color: #D8D8D8;

        display: flex;
        justify-content: center;
        align-items: center;
    }

    .button-connexion span {
        color: #4A4A4A;
        font-family: Roboto;
        font-size: 16px;
        font-weight: 500;
        letter-spacing: -0.39px;
        line-height: 17px;
    }

    .section-title {
        color: #191970;
        font-family: Roboto;
        font-size: 15px;
        font-weight: 500;
        letter-spacing: -0.36px;
        line-height: 17px;
        position: relative;
        left: 15px;
        margin-top: 30px;
    }

    .form-section {
        display: flex;
        justify-content: center;
        align-items: center;
        position: relative;
        left: 15px;
    }

    .form-left {
        height: auto;
        width: 402px;
    }

    .form-right {
        height: auto;
        width: 402px;
    }


    .over-flow-gradient {
        height: 33px;
        width: 79px;
        border-radius: 0 0 6px 6px;
        background: linear-gradient(180deg, rgba(0,0,0,0) 0%, #191970 100%);
        position:absolute;
        top: 50px;
        z-index: 999;
    }

    .fas, .svg1 {
        color: #FFFFFF;
        z-index: 61000;
    }

    .check1 input {
        height: 20px;
        width: 20px;
        position: relative;
        top: 10.5px
    }

    .check1 label {
        color: #9B9B9B;
        font-family: Roboto;
        font-size: 15px;
        font-weight: 500;
        letter-spacing: -0.36px;
        line-height: 16px;
        position: relative;
        top: 6.5px;
        margin-left: 10px;
    }

    .active-element {
        cursor: pointer;
        box-sizing: border-box;
        height: 30px;
        width: 280px;
        border: 1px solid #D0021B;
        border-left: 5px solid #D0021B;
        background-color: #F5F5F5;
        color: #191970;

        font-family: Roboto;
        font-size: 14px;
        font-weight: 500;
        letter-spacing: 0;
        line-height: 16px;
    }

    .list-group {
        border: none;
    }

    .card{
        border: none;
    }

    .form-check-label {
        margin-right: 2px
    }

    .separator-sexe {
        position:absolute;
        float: left;
        margin-left: 96.5px;
        box-sizing: border-box;
        height: 39px;
        width: 0.5px;
        border: 0.5px solid #9B9B9B;
    }

    .text-pass, .text-connexion {
        height: 18px;
        width: 225px;
        color: #191970;
        font-family: Roboto;
        font-size: 15px;
        font-weight: 500;
        letter-spacing: -0.36px;
        line-height: 18px;
    }

    .active-blue {
        box-sizing: border-box;
        height: 37px;
        width: 422px;
        border: 1px solid #1A7EF5 !important;
        color: #191970 !important;
        border-radius: 6px;
        background-color: #FFFFFF !important;
    }

    .active-gray {
        box-sizing: border-box;
        height: 37px;
        width: 422px;
        color: #4A4A4A !important;
        border: 1px solid #9B9B9B !important;
        border-radius: 6px;
        background-color: #D8D8D8 !important;
    }

    .success-message {
        height: 32px;
        width: 847px;
        border-radius: 6px;
        background-color: #00B517;
        float: bottom;
        bottom: 10px;
        z-index: 999;
        position: absolute;
        display: flex;
        justify-content: center;
        align-items: center;
    }

    .success-message span {
        height: 18px;
        width: 169px;
        color: #FFFFFF;
        font-family: Roboto;
        font-size: 16px;
        font-weight: 500;
        letter-spacing: -0.11px;
        line-height: 18px;
        text-align: center;
    }

    .text-carnet {
        height: 24px;
        width: 511px;
        color: #191970;
        font-family: Roboto;
        font-size: 20px;
        font-weight: 600;
        letter-spacing: -0.48px;
        line-height: 24px;
        position: relative;
        top: 10px;
        left: 20px;
    }

    .text-carnet h4{
        color: #191970;
        font-family: Roboto;
        font-size: 20px;
        font-weight: 600;
        letter-spacing: -0.48px;
        line-height: 16px;
    }

    .section-droite-1  p{
        height: 32px;
        width: auto;
        color: #4A4A4A;
        font-family: Roboto;
        font-size: 14px;
        font-weight: 300;
        letter-spacing: -0.48px;
        line-height: 16px;
    }

    .row-carnet {
        box-sizing: border-box;
        height: 76px;
        width: 857px;
        border: 1px solid #D8D8D8;
        position: relative;
        left: -1px;
        top: -5.3px;
        border-radius: 6px 6px 0 0;
    }

    .carnet-description  {
        height: 40px;
        width: 482px;
        color: #4A4A4A;
        font-family: Roboto;
        font-size: 14px;
        font-weight: 300;
        letter-spacing: -0.48px;
        line-height: 16px;
    }


    .carnet-description p {
        position: relative;
        line-height: 16px;
        left: 20px;
    }

    .carnet-middle {
        display: flex;
        justify-content: center;
        align-items: center;
        position: relative;
        margin-left: auto;
        margin-right: auto;
        top: 95.78px;

        color: #4A4A4A;
        font-family: Roboto;
        font-size: 13px;
        font-weight: 500;
        letter-spacing: -0.31px;
        line-height: 15px;
    }

    .user_profil_photo {
        height: 318px;
        width: 481px;
        position: relative;
        margin-left: auto;
        margin-right: auto;
        top: 30px;
    }

    .avatar-none-client {
        display: none !important;
    }

    .h4-header-cropper {
        position: absolute !important;
        z-index: 2000 !important;
        margin-top: -129px !important;
    }

</style>
<form action="@auth{{ url('update-user-profil/'. Auth::user()->id) }}@endauth" method="post" enctype="multipart/form-data" id="myUserProfilForm">
<div class="user_profil_photo" style="margin-bottom: 52px;">

 <div class="photo-frame-avatar">

     <div class="photo-displayed"  >
         <h4>Avatar actuel</h4>
       
         <div class="photo-cadre" style="background: url(/@auth {{ Auth::user()->image }} @endauth) no-repeat; background-position: center center; background-size: contain;">

         </div>
     </div>

     <div class="photo-displayed-input">

        <h4 id="avatar-h4-title" >Nouvel avatar</h4>

        <div class="photo-cadre-input" id="client-avatard-input">

            <p>Aucun fichier sélectionné</p>
            <p>Choisir le fichier</p>
            <div class="input-file-avatar" style="z-index:10;">+<input class="file-input-hidden avatar-phot" type="file" id="file-client-profil" name="avatar" ></div>

            <p style="z-index: 100" id="avatar-name-zone">zone reservé à l'image </p>
            <img width="216px" height="216px" id="current-profil-avatar-selected"  src="{{  asset('/uploads/avatars/default-user-image.png') }}" alt="" style="position: absolute; border-radius: 6px; top:32px">

        </div>

        <div class="photo-cadre-input avatar-none-client"  id="client-avatard-result" style="padding-top: 7px">

            <div class="avatar-cropper" style="position: absolute; ">
                <a href="#" id="btnRestoreClientAvatar" onclick="resetClientCropper()"><img src="/assets/images/icones-vendeurs2/Ferme.svg" height="25px" width="25px" style="position:absolute; margin-left:195px;margin-top:-20px; z-index: 10"></a>
                <div class="zoneAvatarMarchand" id="croppedCanvas">
                    <canvas id="canvas_client_profil" style="position: absolute">
                        Your browser does not support the HTML5 canvas element.
                    </canvas>
                </div>

                <div id="resultd-avatard-client"></div>
            </div>

        </div>

     </div>
 </div>

 <div class="button-section-avatar">
     <button type="button" id="profilImageUploadd" onclick="saveCroppedClientFile()">Enregistrer</button>
 </div>



</div>
</form>
<div class="bottm-section-avatar">
 <p style="color: #160204;">Nous acceptons les formats : jpg, jpeg, png • Poids max : 8 Mo</p>
 <p  style="color: #D0021B;">Votre photo ne doit pas être contraire aux bonnes mœurs ou à l'ordre public, ni porter atteinte aux droits de tiers.</p>
</div>


</div>

<script>

function getFile() {
    document.getElementById("upfile").click();
}

function saveCroppedClientFile() {
    // e.preventDefault();
    console.log('cropped element:', cropper2)

    var canvas = $('#canvas_client_profil')
    canvas = cropper2.getCroppedCanvas();

    canvas.toBlob(function(blob) {
        url = URL.createObjectURL(blob);
        var reader = new FileReader();
        reader.readAsDataURL(blob);

        reader.onloadend = function() {
            var base64data = reader.result
            console.log('Here is the blob:', base64data)
            $.ajax({

            url:'/profile',
            method:'POST',
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            data:{image:base64data},

            success: function(data) {
                console.log('Retour ici', data)
                $('.photo-cadre').css('background', 'url(/'+data+')')
                $('.photo-cadre').css('background-size', 'cover')
                $('.photo-cadre').css('background-repeat', 'no-repeat')
                $('.photo-cadre').css('background-position', 'center center')

                $('.photo-user').css('background', 'url(/'+data+')')
                $('.photo-user').css('background-size', 'cover')
                $('.photo-user').css('background-repeat', 'no-repeat')
                $('.photo-user').css('background-position', 'center center')

                $('#user-profil-default-avatar').attr('src', '/'+data)
                $('#user-profil-default-avatar-big').attr('src', '/'+data)
            }
            })
        }

    })
}

function resetClientCropper() {
    $('#client-avatard-input').removeClass('avatar-none-client')
    $('#client-avatard-result').addClass('avatar-none-client')
    cropper2.destroy()
}

</script>


