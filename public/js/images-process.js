
        // declaration des variables globals
        var photo_counter = 0;
        var cropper2;
        var tableau_images_rognee = new Object();
        let image_princiapl_initial_url

        function array_equals1(a, b){
            return a.length === b.length && a.every((item,idx) => item === b[idx])
        }

       // produit image onchange
       function imageChangedPrincipal(id) {
        // detruire l'instance de cropper
        if (cropper2 instanceof Cropper) {
            cropper2.destroy()
        }

        $('#current_preview_image').val(id)

        var accepted_format = [".jpg", ".jpeg", ".bmp", ".gif", ".png", ".jfif", ".webp"]
        var imagePrincipal = $('#'+id).get(0).files[0];
        var imagePrincipal = $('#'+id).get(0).files[0];
        var nom_image = $('#'+id).val().replace(/C:\\fakepath\\/i, '')

        var index = id.substr(id.length -1);
        photo_counter = photo_counter + 1;  // incrementation des photos
        let index_value = Number(index) + 1;
        $('.preview-img-element-'+index_value).removeClass('set-gray-bg')
        $('.preview-img-element-'+index_value).addClass('set-white-bg')
        $('#photo-counter').text('('+photo_counter+'/6)')

        if (nom_image.length > 0) {
            var blnValid = false;
            for(var i = 0; i < accepted_format.length; i++) {
                var extensionImage = accepted_format[i];
            if (nom_image.substr(nom_image.length - extensionImage.length, extensionImage.length).toLowerCase() == extensionImage.toLowerCase()) {
                blnValid = true;
                break;
            }
            }

            if(!blnValid) {
                $('#'+id+'-p').attr('src', 'assets/images/point_exclamation.svg')
                $('#'+id+'-p').css('position', 'relative')
                $('#'+id+'-p').css('left', '-10px')
                $('#'+id+'-b').attr('disabled','disabled')
                $('#g-preview-error').removeClass('s-none')
                $('#g-preview-error').text(nom_image)
                $('#'+id+'-berror').removeClass('s-none')
                $('#cadre-error').removeClass('s-none')
                $('#cadre-cadre-preview').addClass('s-none')
            }else{
                var reader = new FileReader();
                reader.onload = function(){
                var charged_img = new Image();
                charged_img.src = reader.result;
                charged_img.onload = function() {
                    // access image size here
                    if (this.height > this.width) {
                        $('.default-zone-preview').addClass('default-zone-preview-long')
                    }else {
                        $('.default-zone-preview').removeClass('default-zone-preview-long')
                    }
                    console.log('La largeur est:', this.width, 'Et la hauteur est:', this.height);
                };
                
                $('#'+id+'-view').attr('src', reader.result)
                $('#'+id+'-view').attr('height', "100px")
                $('#'+id+'-view').attr('width', "100px")
                $('#'+id+'-view').css({'display':'block', 'height': '100px !important', 'width': '100px !important'});
                $('#'+id+'-view').css('border-radius','6px')
                $('#'+id+'-view').css('margin-right','-4px')

                $('#'+id+'-bclose').removeClass('s-none')
                $('#'+id+'-bclose').css({'position': 'absolute', 'margin-top': '-80px', 'margin-right':'-80px'})
                $('#'+id+'-b').css('display','none')
                $('.photo-button-section').removeClass('flex-zone-cropped')
                $('.photo-button-section').addClass('s-none')
                $('#main-image-preview').attr('src', reader.result)  // afficher dans le preview
                $('#'+id+'-preview').attr('src', reader.result)  // afficher dans le preview
                $('#main-image-preview').css({'position': 'relative', 'border-radius': '6px'})
                // $('#main-image-preview').css('top', '-10px')
                $('#main-image-preview').attr('height', "308px")
                $('#main-image-preview').attr('width', "308px")

                $('#defaut-preview-section').addClass('s-none')
                $('#preview-image-section-div').removeClass('s-none-forced')
                $('#preview-image-section-div').removeClass('s-none')


                $('#'+id+'-file').addClass('disable-video-url')
                $('#'+id+'-file img').addClass('desable-video-url_svg')


                // verifier si le bouton est grisé
                if ($('#save-all-image-button').attr('disabled')) {
                    $('#save-all-image-button').removeAttr('disabled')
                    $('#save-all-image-button').css('background-color', '#1A7EF5')
                }
            }
            reader.readAsDataURL(imagePrincipal);
            }
        }
        }


    // supprimer une image par id
    function supprimerImage(id) {

        var imag1 = $('#'+id+'-view').attr('src');
        var imag2 = $('#main-image-preview').attr('src')
        var imaga_number = images_produit_normal.length;

        let last = id.charAt(id.length - 1);
        let last_index_value = Number(last) + 1;
        $('.preview-img-element-'+last_index_value).addClass('set-gray-bg')

        let init_count = Number(last) + 1; // la photo suivant
        let last1 = Number(last)

        if (imaga_number > 0) {
            images_produit_normal.splice(0, 1);
        }

        if (images_produit_normal.length == 0) {
            $('#save-all-image-button').removeAttr('disabled')
            $('#save-all-image-button').css('background-color', '#1A7EF5')
            $('#save-all-image-button').removeClass('saved')
        }

        if (imag1 == imag2) {
            $('#preview-image-section-div').addClass('s-none-forced')
            $('#defaut-preview-section').removeClass('s-none')
        }else{

            // $('#defaut-preview-section').removeClass('s-none')
        }

        photo_counter = photo_counter - 1;
        $('#photo-counter').text('('+photo_counter+'/6)')

        $('#'+id).val('')  // reinitialisation de l'input type file

        $('#'+id+'-b').css('display','block')
        $('#'+id).val();
        $('#'+id+'-bclose').addClass('s-none')
        $('#'+id+'-view').attr('src', 'assets/images/icones-vendeurs2/image_outline_icon_139447.svg');
        $('#'+id+'-view').css('display', 'none')

        var index = id.substr(id.length - 1);
        $('#input-web_'+index).removeClass('disable-video-url')
        $('#photo_'+index+'-url-value').val('')

        if (!$('#preview_video').hasClass('s-none')) {
            $('#preview-image-section-div').addClass('s-none-forced')
        }

        // effacer sur le preview
        $('#'+id+'-preview').attr('src', 'assets/images/icones-vendeurs2/image_outline_icon_139447.svg')
        $('#defaut-preview-section').removeClass('s-none-forced')

        if (!$('.video-play-button').hasClass('s-none')) {
            $('.video-play-button').addClass('s-none')
        }

        // remove url desable classe
        $('#'+id+'-file').removeClass('disable-video-url')
        $('#'+id+'-file img').removeClass('desable-video-url_svg')

        let next_id = 'photo_'+ init_count // l' id de l'input type file de l'image

    }

    // suppression de toutes les images
    function deleteAllImage(){
        var i = 6;
        for (let i = 0; i < 6; i++) {
            var image_image = 'photo_'+i;
            var val_image = $('#'+image_image).val()
            supprimerImage('photo_'+i);
        }
        photo_counter = 0;
        var photo_counter_init = photo_counter - photo_counter
        $('#photo-counter').text('('+photo_counter_init+'/6)')

        $('.video-play-button').css('display', 'none')

        $('#photo_5-bclose-bis').addClass('s-none')

        // photo_counter = photo_counter - 1;
        // $('#photo-counter').text('('+photo_counter+'/6)')

        $('#photo_5').val('')  // reinitialisation de l'input type file

        $('#photo_5-b').css('display','block')
        $('#photo_5').val();
        $('#photo_5-bclose').addClass('s-none')
        $('#photo_5-view').attr('src', 'assets/images/icones-vendeurs2/image_outline_icon_139447.svg');
        $('#photo_5-view').css('display', 'none')

        $('#input-web_5').removeClass('disable-video-url')
        $('#photo_5-url-value').val('')

        $('#preview-image-section-div').addClass('s-none-forced')
        $('#preview_video').addClass('s-none')
        $('#video-preview-p').addClass('s-none')

        // effacer sur le preview
        $('#photo_5-preview').attr('src', 'assets/images/icones-vendeurs2/image_outline_icon_139447.svg')
        $('#defaut-preview-section').removeClass('s-none-forced')

        $('#preview-image-section-div').addClass('s-none-forced')
        $('#defaut-preview-section').removeClass('s-none')

        $('.video-play-button').addClass('s-none')

        $('#cadre-cadre-preview')
    }

    // affiche la section d'import des photo par url
    function showWebImport() {
        $('#image-section-online').css('position', 'relative')
        $('#image-section-online').css('top', '-10px')
        $('#image-section-online').removeClass('s-none')
        $('#image-section-standard').addClass('s-none')
        $('#section-image-title1').addClass('s-none');
        $('#section-image-title2').removeClass('s-none');
    }

    // revient au chargement normal des photos declanche le boutton annuler
    function retour_image() {
        $('#image-section-standard').removeClass('s-none')
        $('#image-section-online').addClass('s-none')
        $('#section-image-title1').removeClass('s-none');
        $('#section-image-title2').addClass('s-none');
    }

    // vide l'image à la section principal
    function removeImage() {
        $('#preview-image-section-div').addClass('s-none-forced')
        $('#defaut-preview-section').removeClass('s-none')
    }

    function isImgUrl(url) {
        return fetch(url, {method: 'HEAD'}).then(res => {
          return res.headers.get('Content-Type').startsWith('image')
        })
    }

    function testImage(url, timeoutT) {
        return new Promise(function(resolve, reject) {
          var timeout = timeoutT || 5000;
          var timer, img = new Image();
          img.onerror = img.onabort = function() {
              clearTimeout(timer);
                reject("error");
          };
          img.onload = function() {
               clearTimeout(timer);
               resolve("success");
          };
          timer = setTimeout(function() {

              img.src = "//!!!!/noexist.jpg";
              reject("timeout");
          }, timeout);
          img.src = url;
        });
    }

    function record(url, result) {

        if (result === "success") {
            console.log('Yes nous avons un success,')
            for (let index = 0; index < 6; index++) {

                var id = 'photo_'+index
                if ($('#photo_'+index+'-view').attr('src') == "") {
                    $('#photo_'+index+'-view').attr('src', url)
                    $('#'+id+'-view').attr('data-urlBis', index)
                    $('#'+id+'-view').attr('height', "100px")
                    $('#'+id+'-view').attr('width', "100px")

                    // --------------------------------------------
                    $('#'+id+'-view').css({'display':'block', 'height': '100px !important', 'width': '100px !important'});

                    $('#'+id+'-view').css('border-radius','6px')
                    $('#'+id+'-view').css('margin-right','-4px')

                    $('#'+id+'-bclose').removeClass('s-none')
                    $('#'+id+'-bclose').css({'position': 'absolute', 'margin-top': '-80px', 'margin-right':'-80px'})
                    $('#'+id+'-b').css('display','none')

                    $('.photo-button-section').addClass('s-none')
                    $('#main-image-preview').attr('src', url)
                    $('#main-image-preview').attr('data-url', index)
                    $('#main-image-preview').css({'position': 'relative', 'border-radius': '6px'})
                    $('#main-image-preview').attr('height', "308px")
                    $('#main-image-preview').attr('width', "308px")

                    $('#preview-image-section-div').removeClass('s-none-forced')
                    $('#defaut-preview-section').addClass('s-none')

                    // photo_counter = photo_counter + 1;
                    // counter_final = counter_final + 1;

                    images_produit_web.push(url)
                    return;

                    // console.log('Voici ce lien est vide')
                }
            }
        }else {
            console.log('Ouf c\'est pas une image ça')
        }

    }

    let tab_file_url_link = [];
    // importe des photos par url
    function importerParUrl(){

        for (let i = 0; i < 5; i++) {
            let image_url = $('#photo_'+i+'-url-value').val();

            if (image_url != "") {
                testImage(image_url).then(function succes(valeur) {
                    tab_file_url_link.push(image_url)
                    // checker si ya une case vide et affecter l'image
                    var id = 'photo_'+i
                    if ($('#'+id+'-view').attr('src') == "") {
                        $('#'+id+'-view').attr('src', image_url)
                        $('#'+id+'-preview').attr('src', image_url)  // afficher dans le preview

                        $('#'+id+'-view').attr('data-urlBis', i)
                        $('#'+id+'-view').attr('height', "100px")
                        $('#'+id+'-view').attr('width', "100px")

                        // --------------------------------------------
                        $('#'+id+'-view').css({'display':'block', 'height': '100px !important', 'width': '100px !important'});

                        $('#'+id+'-view').css('border-radius','6px')
                        $('#'+id+'-view').css('margin-right','-4px')

                        $('#'+id+'-bclose').removeClass('s-none')
                        $('#'+id+'-bclose').css({'position': 'absolute', 'margin-top': '-80px', 'margin-right':'-80px'})
                        $('#'+id+'-b').css('display','none')

                        $('.photo-button-section').addClass('s-none')
                        $('#main-image-preview').attr('src', image_url)
                        $('#main-image-preview').attr('data-url', i)
                        $('#main-image-preview').css({'position': 'relative', 'border-radius': '6px'})
                        $('#main-image-preview').attr('height', "308px")
                        $('#main-image-preview').attr('width', "308px")

                        $('#preview-image-section-div').removeClass('s-none-forced')
                        $('#defaut-preview-section').addClass('s-none')
                        $('#save-all-image-button').addClass('saved')
                        photo_counter = photo_counter + 1;  // incrementation des photos
                    }
                },function failure(reason) {
                    // handle an error...
                    console.log('La raison de lerreur est', reason)
                  }.bind(this));
            }
        }

        var img3 = $('#photo_5-url-value').val();
        if (img3 != "") {
            var firstFive = img3.substring(8, 16);
        // counter_final = counter_final + 1;
            var final_link = img3.replace('youtu.be', 'youtube.com/embed')
            $('#videoPreviewInput').val(final_link)
            $('#preview_video').attr('src', final_link);
            $('#video-preview-p').attr('src', final_link);
            $('.main-image-section').addClass('s-none')
            $('#preview_video').removeClass('s-none')
            $('.video-play-button').removeClass('s-none')
            $('#photo_5-bclose-bis').removeClass('s-none')
            $('#photo_5-bclose-bis').css({'position': 'absolute', 'margin-top': '-80px', 'margin-right':'-80px'})
            $('#photo_5-b').css('display','none')*
            $('#video-preview-p').removeClass('s-none')

            if ($('.video-play-button').hasClass('s-none')) {
                $('.video-play-button').removeClass('s-none')
            }

            $('.video-play-button').css('display', 'block')
            $('.video-media').css('display', 'block')
        photo_counter = photo_counter + 1;  // incrementation des photos

        }
        $('#photo-counter').text('('+photo_counter+'/6)')

        $('#preview-image-section-div').removeClass('s-none-forced')
        $('#defaut-preview-section').addClass('s-none')
        $('#image-section-standard').removeClass('s-none')
        $('#image-section-online').addClass('s-none')
        $('#section-image-title1').removeClass('s-none');
        $('#section-image-title2').addClass('s-none');

    }

    // suppression de la video
    $('#photo_5-bclose-bis').on('click', function() {
        var imag1 = $('#photo_5-view').attr('src');
        var imag2 = $('#main-image-preview').attr('src')

        $('.video-play-button').css('display', 'none')

        $('#photo_5-bclose-bis').addClass('s-none')

        photo_counter = photo_counter - 1;
        $('#photo-counter').text('('+photo_counter+'/6)')

        $('#photo_5').val('')  // reinitialisation de l'input type file

        $('#photo_5-b').css('display','block')
        $('#photo_5').val();
        $('#photo_5-bclose').addClass('s-none')
        $('#photo_5-view').attr('src', 'assets/images/icones-vendeurs2/image_outline_icon_139447.svg');
        $('#photo_5-view').css('display', 'none')

        $('#input-web_5').removeClass('disable-video-url')
        $('#photo_5-url-value').val('')

        // $('#preview-image-section-div').addClass('s-none-forced')
        $('#preview_video').addClass('s-none')
        $('#video-preview-p').addClass('s-none')
        // $('#cadre-cadre-preview').removeClass('s-none')

        // effacer sur le preview
        // $('#photo_5-preview').attr('src', 'assets/images/icones-vendeurs2/image_outline_icon_139447.svg')
        // $('#defaut-preview-section').removeClass('s-none-forced')

        $('#preview-image-section-div').addClass('s-none-forced')
        $('#defaut-preview-section').removeClass('s-none')

        // $('.video-play-button').addClass('s-none')

        // $('#cadre-cadre-preview')

    })

    // afficher la video
    function showVideoPreview() {

        var video_hidden = $('#videoPreviewInput').val()
        var final_link = video_hidden.replace('youtu.be', 'youtube.com/embed')


        $('#preview_video').attr('src', final_link);
        $('#video_5-view').attr('height', "100px")
        $('#video_5-view').attr('width', "100px")
        $('#video_5-view').attr('src', final_link)
        $('#video_5-view').css({'position':'relative', 'left': '10px', 'border-radius':'6px'})

        $('#preview_video').removeClass('s-none');
        $('.main-image-section').addClass('s-none')
    }

     // supprimer les images
     function supprimerImagePrincipal(id) {
        $('#'+id+'-p').attr('src', 'assets/images/icones-vendeurs2/plus.svg')
        $('#'+id+'-p').css('left', '2px')
        $('#'+id+'-b').removeAttr('disabled')
        // $('#'+id).val('')
        $('#'+id+'-berror').addClass('s-none')

        $('#cadre-error').addClass('s-none');
        $('#cadre-cadre-preview').removeClass('s-none')
        $('#'+id+'-berror').addClass('s-none')
    }

    // image chargé
    function imageChanged() {

        var imagePrincipal = $('#myInputCustomMarchand').get(0).files[0];

        var reader = new FileReader();

        reader.onload = function(){
            $('.photo-button-section').addClass('s-none')
            $('#main-image-preview').attr('src', reader.result)
            $('#main-image-preview').attr('height', "308px")
            $('#main-image-preview').attr('width', "308px")
        }
        reader.readAsDataURL(imagePrincipal);
        $('#defaut-preview-section').addClass('s-none')
        $('#preview-image-section-div').removeClass('s-none-forced')
        $('#main-image-preview').css('border-radius', '6px')

        let formData = new FormData();

        formData.append('produit_photo', imagePrincipal)

        $.ajax({
            type:'POST',
            url:"upload_images",
            data: formData,
            contentType: false,
            processData: false,
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            success:function(response){
                console.log(response)
                // window.location.href = "/marchand-verification-organisation"
            }
        });

    }


    // rogner l'image
        // croppe product images

        function resizeImageByCropping() {
            // recuperation de l'image qui concerne
            let main_image = document.getElementById('main-image-preview')
            // store principal image url
            image_princiapl_initial_url = main_image.src;

            cropper2  = new Cropper(main_image, {
                aspectRatio: 1,
                movable:true,
                scalable:true,
            });

            $('#cropped-extra-option').removeClass('s-none')
            $('#cropped-extra-option').addClass('flex-zone-cropped')
            $('#cropped-original-element').addClass('s-none')

        }

        function saveCroppedProductPhoto() {
            let image_concernee = $('#current_preview_image').val();
            var croppedImage = cropper2.getCroppedCanvas().toDataURL("image/png")
            let image_etat = $('#main-image-preview').attr('data-url') // pour limage principal data-urlBis="1000"

            if (image_etat != "1000") {
                let constructed_id = 'photo_'+image_etat
                // let constructed_id_bis = 'photo_'+image_etat_bis
                $('#'+constructed_id+'-view').attr('src', croppedImage)
                $('#'+constructed_id+'-preview').attr('src', croppedImage)
                $('#main-image-preview').attr('src', croppedImage)

                tableau_images_rognee[image_concernee] = croppedImage
                cropper2.destroy();

                $('#cropped-extra-option').removeClass('flex-zone-cropped')
                $('#cropped-extra-option').addClass('s-none')
                $('#cropped-original-element').removeClass('s-none')
            }else {

                $('#'+image_concernee+'-view').attr('src', croppedImage)
                $('#'+image_concernee+'-preview').attr('src', croppedImage)
                $('#main-image-preview').attr('src', croppedImage)

                // tableau_images_rognee.push({: croppedImage})
                tableau_images_rognee[image_concernee] = croppedImage
                cropper2.destroy();

                $('#cropped-extra-option').removeClass('flex-zone-cropped')
                $('#cropped-extra-option').addClass('s-none')
                $('#cropped-original-element').removeClass('s-none')

            }

            // console.log('Voici le tableau des images cropped:', tableau_images_rognee.join())

        }

        function textCroppedArrayImage() {
            let image_key = "photo_1";
            delete tableau_images_rognee[image_key];
            console.log('autre part:', tableau_images_rognee)
        }

        function resetCropperElement() {
            if (cropper2 instanceof Cropper) {
                cropper2.destroy()
                console.log('Le cropper a été detruit')
            }

            $('#cropped-extra-option').removeClass('flex-zone-cropped')
            $('#cropped-extra-option').addClass('s-none')
            $('#cropped-original-element').removeClass('s-none')
        }

        // visualiser une image
        function globalView(id) {
            // *****************
            let image_etat_bis = $('#'+id).attr('data-urlBis')
            $('#main-image-preview').attr('data-url', image_etat_bis)
            let image_id = id.replace('-view', ' ')
            console.log('Votre est id est:', image_id)
            $('#current_preview_image').val(image_id.trim())  // remplissage de l'image courant

            $('.main-image-section').removeClass('s-none');
            $('#preview_video').addClass('s-none')

            var image_url = $('#'+id).attr('src');
            // ************************ updated
            $('#main-image-preview').attr('src', image_url)
            $('#main-image-preview').attr('height', "308px")
            $('#main-image-preview').attr('width', "308px")

            $('#preview-image-section-div').removeClass('s-none-forced')
            $('#defaut-preview-section').addClass('s-none')

        }

        function cropZoomIn() {
            cropper2.zoom(0.1);
        }

        function cropZoomOut() {
            cropper2.zoom(-0.1);
        }






