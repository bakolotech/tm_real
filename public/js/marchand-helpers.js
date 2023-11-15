function ajax_mode_paiement() {
    $.ajax({

        method: 'GET',
        url: 'get_money_marchand/',
        success: function(response) {

        if(response.status == 200){

        $("#paiem4").hide();
        $("#paiem10").hide()

        _.each(response.moneyInfo, function(model){

        if(response.moneyInfo.length == 2){
            $('#affichageState').text('AIRTEL');
            $('#infoMoney').text(response.moneyInfo[1].numero_marchand);

            $('#affichageState1').text('MOOV');
            $('#infoMoney1').text(response.moneyInfo[0].numero_marchand);
        }else{
            if(model.type_service == 'airtel'){
                $('#affichageState').text('AIRTEL');
                $('#infoMoney').text(model.numero_marchand);
            }
            if(model.type_service == 'moov'){
                $('#affichageState1').text('MOOV');
                $('#infoMoney1').text(model.numero_marchand);
            }
        }

        })

        _.each(response.cardInfo, function(model){
            var lastthreees = model.numero_carte.substr(model.numero_carte.length - 4); // => "7891"
            $('#affichageState2').text(model.type_carte); //BIG STATE
            $('#infoMoney2').text('************'+' '+lastthreees);
            $('#infoCredit').text('************'+' '+lastthreees);

        }); // fin LOOP
      }


        if(response.status == 201){
            $("#paiem4").hide();
            $("#paiem10").hide()
            _.each(response.cardInfo, function(model){
                var lastthreees = model.numero_carte.substr(model.numero_carte.length - 4); // => "7891"
                $('#affichageState2').text(model.type_carte); //BIG STATE
                $('#infoMoney2').text('************'+' '+lastthreees);
                $('#infoCredit').text('************'+' '+lastthreees);
            }); // fin LOOP
        }


        if(response.status == 202){
        $("#paiem11").hide();

        _.each(response.moneyInfo, function(model){

        if(response.moneyInfo.length == 2){

        $("#paiem4").show();
        $("#paiem10").show();

        if(model.type_service == 'airtel'){
            $('#getout').show();
            $('#airtelCodeMarchand').text(model.numero_marchand)
            $('#affichageState').text('AIRTEL');
            $('#infoMoney').text(model.numero_marchand);
        }
        if(model.type_service == 'moov'){
            $('#getout').hide();
            $('#airtelCodeMarchand2').text(model.numero_marchand)
            $('#affichageState1').text('MOOV');
            $('#infoMoney1').text(model.numero_marchand);
        }
        }else{

        if(model.type_service == 'airtel'){
            $('#affichageState').text('AIRTEL');
            $('#infoMoney').text(model.numero_marchand);
            $('#getout').show();
            $('#airtelCodeMarchand').text(model.numero_marchand);
            $("#paiem10").hide();
            $("#paiem4").show();
        }
        if(model.type_service == 'moov'){
            $('#affichageState1').text('MOOV');
            $('#infoMoney1').text(model.numero_marchand);
            $('#getout').hide();
            $('#airtelCodeMarchand2').text(model.numero_marchand)
            $("#paiem4").hide();
            $("#paiem10").show();
        }

        }

        }); // fin LOOP
        }
    } // fin success

    }) // find AJAX
}

function raccourci1(x, y, z){
    // ------------------------ new implementation ------------------
    if ($("#"+x).hasClass('marchand-text-menu-active')) {
        console.log('Il contient bien la class')
        $("#"+x).removeClass('marchand-text-menu-active');
        $('#'+y).removeClass('marchand-icon-menu-active')
        $('#'+z).addClass('field-none')
    }else{

        $('.marchand-menu-content').addClass('field-none')
        $('.marchand-text-menu').removeClass('marchand-text-menu-active')
        $('.marchand-icon-menu').removeClass('marchand-icon-menu-active')

        $("#"+x).addClass('marchand-text-menu-active');
        $('#'+y).addClass('marchand-icon-menu-active')
        $('#'+z).removeClass('field-none')
    }

    // setTimeout(function(){
    //     $("#"+x).removeClass('marchand-text-menu-active');
    //     $('#'+y).removeClass('marchand-icon-menu-active')
    //     $('#'+z).addClass('field-none')
    // },120000);

    if (z == "mode-paiements-content-id") {
        ajax_mode_paiement()
    }

    // console.log('Les parametre envoié sont :', x, y, z)

}

function raccourci2(){
    $("#paiem1").hide();
    $("#paiem2").show();
    $("#paiem3").css({"color":"#1A7EF5","background-color":"#F8F8F8","border":"1px solid #1A7EF5"});
    setTimeout(function(){ $('#paiem3').css({"color":"#9B9B9B","background-color":"#FFFF","border":"1px solid #9B9B9B"}); },120000);
    setTimeout(function(){ $('#paiem1').show(); },120000);
    setTimeout(function(){ $('#paiem2').hide(); },120000);
    setTimeout(function(){ $('#paiem4').hide(); },120000);
    setTimeout(function(){ $('#paiem10').hide(); },120000);
    setTimeout(function(){ $('#paiem11').hide(); },120000);
    setTimeout(function(){ $('#paiem5').hide(); },130000);
    $("#boutik1").show();
    $("#boutik2").hide();
    $("#boutik3").css({"color":"#9B9B9B","background-color":"#FFFF","border":"1px solid #9B9B9B"});
    $("#boutik4").hide();
    $("#boutik5").hide();
    //$("#paiem4").show();
    $("#paiem11").show();
    $("#paiem5").show();
    $("#tb4").hide();
    $("#tb5").hide();
    $("#tb6").hide();
    $("#tb1").show();
    $("#tb2").hide();
    $("#tb3").css({"color":"#9B9B9B","background-color":"#FFFF","border":"1px solid #9B9B9B"});
    $("#hc1").show();
    $("#hc2").hide();
    $("#hc3").css({"color":"#9B9B9B","background-color":"#FFFF","border":"1px solid #9B9B9B"});
    $("#hc4").hide();
    $("#hc5").hide();
    $("#cp1").show();
    $("#cp2").hide();
    $("#cp3").css({"color":"#9B9B9B","background-color":"#FFFF","border":"1px solid #9B9B9B"});
    $("#cp4").hide();
    $("#corb1").show();
    $("#corb2").hide()
    $("#corb3").css({"color":"#9B9B9B","background-color":"#FFFF","border":"1px solid #9B9B9B"});
    $("#corb4").hide();



}

function raccourci3(){
    // -----------------------new implementation ---------------------
    $('#boutik1').addClass('marchand-icon-menu-active')
    $("#tb1").hide();
    $("#tb2").show();
    $("#tb3").css({"color":"#1A7EF5","background-color":"#F8F8F8","border":"1px solid #1A7EF5"});
    $("#tb4").show();
    $("#tb5").show();
    $("#tb6").show();
    setTimeout(function(){ $('#tb3').css({"color":"#9B9B9B","background-color":"#FFFF","border":"1px solid #9B9B9B"}); },120000);
    setTimeout(function(){ $('#tb1').show(); },120000);
    setTimeout(function(){ $('#tb2').hide(); },120000);
    setTimeout(function(){ $('#tb4').hide(); },120000);
    setTimeout(function(){ $('#tb5').hide(); },120000);
    setTimeout(function(){ $('#tb6').hide(); },120000);
    $("#boutik1").show();
    $("#boutik2").hide();
    $("#boutik3").css({"color":"#9B9B9B","background-color":"#FFFF","border":"1px solid #9B9B9B"});
    $("#boutik4").hide();
    $("#boutik5").hide();
    $("#paiem1").show();
    $("#paiem2").hide();
    $("#paiem3").css({"color":"#9B9B9B","background-color":"#FFFF","border":"1px solid #9B9B9B"});
    $("#paiem4").hide();
    $("#paiem5").hide();
    $("#paiem1").show();
    $("#paiem2").hide();
    $("#paiem3").css({"color":"#9B9B9B","background-color":"#FFFF","border":"1px solid #9B9B9B"});
    $("#paiem4").hide();
    $("#paiem5").hide();

    $("#hc1").show();
    $("#hc2").hide();
    $("#hc3").css({"color":"#9B9B9B","background-color":"#FFFF","border":"1px solid #9B9B9B"});
    $("#hc4").hide();
    $("#hc5").hide();
    $("#cp1").show();
    $("#cp2").hide();
    $("#cp3").css({"color":"#9B9B9B","background-color":"#FFFF","border":"1px solid #9B9B9B"});
    $("#cp4").hide();
    $("#corb1").show();
    $("#corb2").hide()
    $("#corb3").css({"color":"#9B9B9B","background-color":"#FFFF","border":"1px solid #9B9B9B"});
    $("#corb4").hide();

    $.ajax({
        method: 'GET',
        url: 'get_money_marchand/',
        success: function(response) {
           console.log(response)

           _.each(response.moneyInfo, function(model){

                if(model.card == 1){

                    var lastthreees = model.numero_carte.substr(model.numero_carte.length - 3); // => "789"
                    $('#affichageState').text(model.type_carte);
                    $('#infoMoney').text('************'+' '+lastthreees);

               }else{

                    $('#affichageState').text(model.nom_service);
                    $('#infoMoney').text(model.numero_marchand);

                } // fin else

            }); // fin LOOP

        } // fin success

        }) // find AJAX

}

function raccourci4(){
    $("#hc1").hide();
    $("#hc2").show();
    $("#hc3").css({"color":"#1A7EF5","background-color":"#F8F8F8","border":"1px solid #1A7EF5"});
    $("#hc4").show();
    $("#hc5").show();
    setTimeout(function(){ $('#hc3').css({"color":"#9B9B9B","background-color":"#FFFF","border":"1px solid #9B9B9B"}); },120000);
    setTimeout(function(){ $('#hc1').show(); },120000);
    setTimeout(function(){ $('#hc2').hide(); },120000);
    setTimeout(function(){ $('#hc4').hide(); },120000);
    setTimeout(function(){ $('#hc5').hide(); },120000);
    $("#boutik1").show();
    $("#boutik2").hide();
    $("#boutik3").css({"color":"#9B9B9B","background-color":"#FFFF","border":"1px solid #9B9B9B"});
    $("#boutik4").hide();
    $("#boutik5").hide();
    $("#paiem1").show();
    $("#paiem2").hide();
    $("#paiem3").css({"color":"#9B9B9B","background-color":"#FFFF","border":"1px solid #9B9B9B"});
    $("#paiem4").hide();
    $("#paiem5").hide();
    $("#tb4").hide();
    $("#tb5").hide();
    $("#tb6").hide();
    $("#tb1").show();
    $("#tb2").hide();
    $("#tb3").css({"color":"#9B9B9B","background-color":"#FFFF","border":"1px solid #9B9B9B"});
    $("#cp1").show();
    $("#cp2").hide();
    $("#cp3").css({"color":"#9B9B9B","background-color":"#FFFF","border":"1px solid #9B9B9B"});
    $("#cp4").hide();
    $("#corb1").show();
    $("#corb2").hide()
    $("#corb3").css({"color":"#9B9B9B","background-color":"#FFFF","border":"1px solid #9B9B9B"});
    $("#corb4").hide();
}


function raccourci5(){
    $("#cp1").hide();
    $("#cp2").show();
    $("#cp3").css({"color":"#1A7EF5","background-color":"#F8F8F8","border":"1px solid #1A7EF5"});
    $("#cp4").show();
    setTimeout(function(){ $('#cp3').css({"color":"#9B9B9B","background-color":"#FFFF","border":"1px solid #9B9B9B"}); },120000);
    setTimeout(function(){ $('#cp1').show(); },120000);
    setTimeout(function(){ $('#cp2').hide(); },120000);
    setTimeout(function(){ $('#cp4').hide(); },120000);
    $("#tb1").show();
    $("#tb2").hide();
    $("#tb3").css({"color":"#9B9B9B","background-color":"#FFFF","border":"1px solid #9B9B9B"});
    $("#boutik1").show();
    $("#boutik2").hide();
    $("#boutik3").css({"color":"#9B9B9B","background-color":"#FFFF","border":"1px solid #9B9B9B"});
    $("#boutik4").hide();
    $("#boutik5").hide();
    $("#paiem1").show();
    $("#paiem2").hide();
    $("#paiem3").css({"color":"#9B9B9B","background-color":"#FFFF","border":"1px solid #9B9B9B"});
    $("#paiem4").hide();
    $("#paiem5").hide();
    $("#tb4").hide();
    $("#tb5").hide();
    $("#tb6").hide();
    $("#tb1").show();
    $("#tb2").hide();
    $("#tb3").css({"color":"#9B9B9B","background-color":"#FFFF","border":"1px solid #9B9B9B"});
    $("#hc1").show();
    $("#hc2").hide();
    $("#hc3").css({"color":"#9B9B9B","background-color":"#FFFF","border":"1px solid #9B9B9B"});
    $("#hc4").hide();
    $("#hc5").hide();
    $("#corb1").show();
    $("#corb2").hide()
    $("#corb3").css({"color":"#9B9B9B","background-color":"#FFFF","border":"1px solid #9B9B9B"});
    $("#corb4").hide();
}

// recupere le background selon le rayon
function getBackgroundEtagere() {
    $('.contenu-marchand').css('background-image', 'url(../assets/images2/background-tech.webp) !important')
    console.log('etagère changed')
}


// avatar
function showAvatard(params) {
    $('.zone-glob').removeClass('avatar-none')
}

function cancelMarchandAvatar() {
    $('.zone-glob').addClass('avatar-none')
}


function changeMarchandAvatar(id) {

    var accepted_format = [".jpg", ".jpeg", ".bmp", ".gif", ".png", "jfif"]
    var imagePrincipal = $('#'+id).get(0).files[0];
    var nom_image = $('#'+id).val().replace(/C:\\fakepath\\/i, '')

    var index = id.substr(id.length -1);

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

        }else{
            var reader = new FileReader();
        reader.onload = function(){
            let url_val = reader.result;
            $('#marchandAvatarPic ').attr('src', reader.result)
            $('#marchandAvatarPic ').css('visibility','visible')
            $('#img-zoomer-section').css('display', 'block')
        }
        reader.readAsDataURL(imagePrincipal);
        }
    }

}

function raccourci6(){
    $("#corb1").hide();
    $("#corb2").show()
    $("#corb3").css({"color":"#1A7EF5","background-color":"#F8F8F8","border":"1px solid #1A7EF5"});
    $("#corb4").show();
    setTimeout(function(){ $('#corb3').css({"color":"#9B9B9B","background-color":"#FFFF","border":"1px solid #9B9B9B"}); },120000);
    setTimeout(function(){ $('#corb1').show(); },120000);
    setTimeout(function(){ $('#corb2').hide(); },120000);
    setTimeout(function(){ $('#corb4').hide(); },120000);
    $("#tb1").show();
    $("#tb2").hide();
    $("#tb3").css({"color":"#9B9B9B","background-color":"#FFFF","border":"1px solid #9B9B9B"});
    $("#boutik1").show();
    $("#boutik2").hide();
    $("#boutik3").css({"color":"#9B9B9B","background-color":"#FFFF","border":"1px solid #9B9B9B"});
    $("#boutik4").hide();
    $("#boutik5").hide();
    $("#paiem1").show();
    $("#paiem2").hide();
    $("#paiem3").css({"color":"#9B9B9B","background-color":"#FFFF","border":"1px solid #9B9B9B"});
    $("#paiem4").hide();
    $("#paiem5").hide();
    $("#tb4").hide();
    $("#tb5").hide();
    $("#tb6").hide();
    $("#tb1").show();
    $("#tb2").hide();
    $("#tb3").css({"color":"#9B9B9B","background-color":"#FFFF","border":"1px solid #9B9B9B"});
    $("#hc1").show();
    $("#hc2").hide();
    $("#hc3").css({"color":"#9B9B9B","background-color":"#FFFF","border":"1px solid #9B9B9B"});
    $("#hc4").hide();
    $("#hc5").hide();
    $("#cp1").show();
    $("#cp2").hide();
    $("#cp3").css({"color":"#9B9B9B","background-color":"#FFFF","border":"1px solid #9B9B9B"});
    $("#cp4").hide();

}
