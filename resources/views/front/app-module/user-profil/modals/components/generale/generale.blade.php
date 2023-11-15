

<style>
    .input-general-first{
      box-sizing: border-box;
      height: 41px;
      width: 194px;
      border: 1px solid #9B9B9B;
      border-radius: 6px;
      background-color:#F8F8F8;
      color: #4A4A4A;
      font-family: Roboto;
      font-size: 15px;
      letter-spacing: -0.36px;
      line-height: 13px;
      padding-left:10px;

        }
    .input-element{
      box-sizing: border-box;
      height: 41px;
      width: 194px;
      color: #4A4A4A;
      border: 1px solid #9B9B9B;
      border-radius: 6px;
      background-color: #FFFFFF;
    }
    .myL{
      color: #a4a4a4;
      font-family: Roboto;
      font-size: 15px;
      font-weight: 500;
      letter-spacing: -0.36px;
      line-height: 16px;
      margin-top:12px;



    }
    .input-general-second{
      height: 41px;
      width: 400px;
      border: 1px solid #9B9B9B;
      border-radius: 6px;
      background-color: #F8F8F8;
      color: #4A4A4A;
      font-family: Roboto;
      font-size: 15px;
      letter-spacing: -0.36px;
      line-height: 13px;
      padding-left:10px;

    }
    .coldroit{
        margin-top:-41px;
        margin-left:208px; 
        margin-bottom:18px;
    }
    .myR{
        margin-top:12px;
           width: 16px;
           height:16px;
           margin-left:10px;
    }


    .hide {
      display: none !important;
    }

    .grise{
        background-color: #D8D8D8;
    }

    .btn-active{
        border: 1px solid #1A7EF5;
        background-color: #1A7EF5 !important;
        color:
    }

     .localisation-button:hover {
        color: #FFFFFF;
        background-color: #146FDA;
    }

    .form-right {
        height: auto;
        width: 402px !important;
    }

    .add-map-element-user {
        position: absolute;
        margin-top: -254px;
        width: 419px;
        height: 471px;
        background-color: #ccc;
        margin-left: 5px;
        z-index: 100;
        border-radius: 6px;
    }

</style>

<style>

    .last-button-general {
        height: 37px;
        width: 194px;
        border-radius: 6px;
        background-color: #1A7EF5;
        color: #FFFFFF;
        font-family: Roboto;
        font-size: 16px;
        font-weight: 500;
        letter-spacing: 0.35px;
        line-height: 16px;
        text-align: center;
        margin-top:25px;
        position: absolute;
        float: right;
        right: -1px;
        outline: none;
        border: transparent;
        z-index:2
    }

.map-box-shadow-background-user {
    width: 100%;
    height: 481px;
    background-color: rgba(255, 255, 255, 0.8);
    position: absolute;
    z-index: 2;
}

</style>
{{-- spinner zone --}}
<style>
    .spinner-border-helper {
        width: 1.5rem !important;
        height: 1.5rem !important;
        vertical-align: -0.125em;
        border: 0.25em solid currentColor;
        border-right-color: #1A7EF5!important;
        border-radius: 50%;
        border-color: #D8D8D8;
        -webkit-animation: .75s linear infinite spinner-border;
        animation: .75s linear infinite spinner-border;
    }

    .spinner-location {
        position: absolute;
        margin-left: -370px;
        margin-top: -4px;
    }

    .btn-location-hover:hover {
        background-color: #146FDA;
    }


    /** BUTTON ACTIFS */
    .btn-location-hover-active{
        background-color: #2C3EDD !important;
    }

    .client-sms-confirmation:hover {
        color: #FFFFFF;
        background-color: #146FDA !important;
        cursor: pointer;
    }

    .client-sms-confirmation:active {
        background-color: #2C3EDD !important;
    }

    .btn-modif {
        pointer-events: none;
        background-color: #9B9B9B !important;
    }

    .client-sms-confirmation:active {
        background-color: #2C3EDD !important;
    }

    .last-button-general:hover {
        background-color: #146FDA;
    }

    .last-button-general:active {
        background-color: #2C3EDD ;
    }

    .phone-user-complement:focus {
        border: none !important;
        outline: none !important;
    }

    .phone-user-complement:active {
        border: none !important;
        outline: none !important;
    }


</style>

    <div id="generale" class="donnees" >
        <div class="map-box-shadow-background-user hide" id="map-drop-box-effect-user"></div>

        <div class="d-flex" style="position: relative; z-index: 3">
        <div class="" style="margin-top: 0px; padding-top: 0px">

        <div class="section-title" style="margin-top:25px;margin-left:-12px;">
            <p style=" color: #191970;
            font-family: Roboto;
            font-size: 15px;
            font-weight: 500;
            letter-spacing: -0.36px;
            line-height: 15px;
            margin-left:15px;
            margin-bottom: 10px"
            >
                Modifier les informations de votre profil
            </p>
        </div>

        <div class="form-section" style="margin-bottom: 33px;margin-top:1px;">
            <div class="form-left" style="margin-right: 23px;">

                <form data-btn="#formEditUser_submit-btn" action="@auth{{ url('update-user-profil/'. Auth::user()->id) }}@endauth" method="post" id="formid">
                    @csrf

                        <div class="cols" style="margin-right: 14px;">
                        <input type="text" class="my-form-field input-general-first" placeholder="Prénom"  onkeyup=letterOnly(this) oninput="myActivate(this)"  name="formEditUser_prenom"  id="formEditUser_prenom-input" name="formEditUser_prenom"   value="@auth{{ Auth::user()->prenom }}@endauth" type="text" >
                        </div>
                        <div class="coldroit" >
                        <input  id="formEditUser_nom-input" name="formEditUser_nom" class="my-form-field input-general-first" onkeyup=letterOnly(this) oninput="myActivate(this)" placeholder="Nom"  value="@auth{{ Auth::user()->nom }}@endauth"  type="text"   required>
                        </div>

                        <div class="input-general-first" style="margin-right: 14px;display: flex;background-color:#FFFFFF; ">
                            <article  style="border-right:1px solid #9B9B9B;width:96px!important;margin-left:-10px;padding-left:10px;">
                                <label class="myL"  for="formEditUser_femme">Femme</label>
                                <input class="myR form-check-input" type="radio" id="formEditUser_femme" @auth @if( (Auth::user()->sexe)=='F') checked @endif @endauth value="F" name="formEditUser_sexe">
                            </article>

                            <article style="padding-left:8px; width:96px !important;">
                                <label class="myL"   for="formEditUser_homme" >Homme</label>
                                <input class="myR form-check-input"  type="radio" id="formEditUser_homme"  value="H" @auth @if( (Auth::user()->sexe)=='H') checked @endif @endauth name="formEditUser_sexe" >
                            </article>

                        </div>

                        <div class="coldroit">
                            <input type="text" id="date-naisse"  name="formEditUser_date_naissance" oninput="myActivate(this)"   value="@auth{{ Auth::user()->date_naissance}}@endauth"  class="my-form-field input-general-first " placeholder="JJ/MM/AAAA" >

                            <div class="d-none" id="formEditUser_main-error">

                            <div class="d-flex justify-content-start">
                                <div class="login-error-image"><img style="color: red !important" src="{{ asset('assets/images/warning-icon.svg') }}" alt=""></div>
                                <div class="login-error-text" style=" height: 0px!important;">
                                    <p style="color:red !important;">La date de naissance entrée est inférieur à celle autorisée</p>
                                </div>
                            </div>

                        </div>
                        </div>


                        <div style="margin-bottom: 18px">
                            <div class="colxs" >
                                <input id="formEditUser_nom_entreprise-input" type="text"  name="formEditUser_nom_entreprise" oninput="myActivate(this)"  value="@auth{{Auth::user()->nom_entreprise}}@endauth"  placeholder="Nom de l'entreprise (facultatif)" class="my-form-field input-general-second" >
                            </div>
                            <input  type="text" name="formEditUser_age" value="" id="age" class="my-form-field input-general-second" style="display: none">
                        </div>

                </div>

                <div class="form-right " style="position:relative; top:-10px;">

                <input id="formEditUser_adresse-input" name="formEditUser_adresse" onfocus="showGoogleMapForUserAdresse()" type="text" oninput="myActivate(this)" value="@auth{{Auth::user()->adresse}}@endauth" placeholder="Adresse(Quartier/Rue/...)" class="my-form-field input-general-second" style="margin-bottom:18px; width:402px" >

                <button aria-label="Me geolocaliser" onclick="prendreMesCoordoneesuserAdress()" type=button class="localisation-button" id="meLocaliserBis" value="@auth{{Auth::user()->last_ip}}@endauth" style="margin-top:-237px;">
                <span aria-label="Me geolocaliser" style="height:16px; width:89px" class="mbtn-text-0">
                <img aria-label="Me geolocaliser" style="height:13px; margin-top:-2.5px; width:10px"  src="/assets/images/geo-alt-fill.svg" alt="" />
                Me géolocaliser</span>
                <span aria-label="Me geolocaliser" class="spinner-border hide" id="location_spiner" role="status" aria-hidden="true"></span>

                <span  aria-label="Me geolocaliser" class="spinner-border spinner-border-helper hide spinner-location" id="location_spiner3-bis-user-adresse" role="status" aria-hidden="true"></span>

                </button>

                <input id="formEditUser_code_postale-input" name="formEditUser_code_postale" oninput="myActivate(this)"  value="@auth{{Auth::user()->code_postale}}@endauth"   placeholder="Code postale" class="my-form-field input-general-first" type="text" >

                    <div  style="margin-left:208px;margin-top:-41px;margin-bottom:18px;">

                    <div class="d-flex "  >
                        <input
                            data-position="@auth{{ \App\Models\Pays::getPays()->id}}@endauth"
                            type="hidden"
                            name="formEditUser_city_id"
                            id="formEditUser_city_id"
                            value="@auth{{ $_SESSION['config']['user-ville']['id'] }}@endauth"
                            data-select="#formEditUser_state-input"
                            data-load="1"
                            data-csrf="{{ csrf_token() }}"
                            data-form-key="formEditUser_"
                        >

                        <div class='parent-0 select-main-div my-form-field pl-0  ' style="background-color:#D8D8D8"data-ul-id='#form-profil-ville' >
                            <div class='select-main-div-img' style="border-right: 1px solid #9B9B9B; width:197px; height: 41px;
                            width: 41px;
                            "><img src='@auth{{ $monPays->getImage() }}@endauth' alt='' id="guest-user-pays-id"></div>
                            <div class='select-main-div-text' id="guest-user-ville-name" >@auth{{ $_SESSION['config']['user-ville']['name'] }}@endauth</div>
                        </div>

                        <div id="formEditUser_city_id-error" class="formEditUser_error-text error-text error-msg"></div>

                    </div>
                </div>


                <div class="d-flex rectangle-input-2" style="border:1px solid #9B9B9B;border-radius:6px;background-color:#F5F5F5; height: 41px" >
                    <div class="" style="width: 25%; height: 100%;">
                    <div class="my-select-img bg-simple-grey" id="formChangeBoutique_pays-input" style="width: 194px !important; border-radius: 6px; display: flex">
                        <div class='parent-0 select-main-div my-form-field pl-0' data-ul-id='#id4' id="formChangeBoutique_pays-select" data-opened="0" style="overflow: hidden; width: 60px !important; height: 39px; border-radius: 0px; border: none; border-right: 1px solid #979797;">
                            <div class='select-main-div-img ' id="id3-main-img"><img src='@auth{{ $monPays->getImage() }}@endauth' alt='' id="guest-pays-icon-for-phone"></div>
                        </div>

                    {{-- <ul class='select-ul' data-opened="0"  id='id4' style="width: 194px !important; margin-top: 25px">
                        @foreach($pays as $pay)
                            <li class='select-li-marchand' id="formPay_select-li-{{ $pay['phonecode'] }}" data-value='{{ $pay['phonecode'] }}' data-input='#formChangeBoutique_pays' data-text="{{ $pay['phonecode'] }}">
                                <div class='select-second-div'>
                                    <div class='select-main-div-img'><img src='{{ $pay['images'] }}' alt=''></div>
                                    <div class='select-main-div-text'>{{ $pay['nom_pays'] }}</div>
                                    <div class='selected-li'></div>
                                </div>
                            </li>
                        @endforeach
                    </ul> --}}

                    <div class='select-main-div-text' style="padding-top: 9px; padding-left: 5px; padding-right: 5px" id="code-phone-m">+241</div>

                </div>

                </div>
                <div class="" style="width:40px;; height: 100%; position: relative; margin-left: 75.5px;border:none;">
                    <input style="padding-left: 19px; border-radius: 0px 6px 6px 0px; position: relative;border:none; left: -72px;width:161px;background-color:#F5F5F5; height: 39px" type="text" class="my-form-field input-neutre phone-user-complement" id="numero-telephone" value="@auth{{Auth::user()->portable}}@endauth"placeholder="Ex: 62955990" >
                </div>

                <article style="  height: 33px;
                width: 130px;
                border-radius: 6px;
                background-color: #1A7EF5;margin-top:3.5px;margin-left:50px;padding-left:7px;padding-top:2px;" id="client-sms-confirmation" class="client-sms-confirmation" onclick="addEffectSms()">
                <span style="min-width: 35%;color:white; font-family: Roboto;
                font-size: 12px;
                font-weight: 500;
                letter-spacing: 0.26px;
                line-height: 12px; text-decoration: none; padding-left: 11px; position: relative; top: 1px; left: 3px"  class="envoyer-un-sms">Envoyer un sms</span></article>
            </div>

            <button type="button" class=" btn-modif last-button-general" id="mbtn" onclick="modifierUserProfil()">
                <span class="mbtn-text-0">Modifier</span>
                <span class="spinner-border hide" id="sms_spiner-resend" role="status" aria-hidden="true"></span>
        </button>
                </form>
        </div>
    </div>

    </div>

    </div>

<div class="add-map-element-user hidden-google-map "  id="zone-adresse-map-user" >


    </div>
    <!-- <div id="btn-succ-update"></div> -->
    <div  id="btn-succ-update"class='success-message hide'>
        <span>Mise à jour avec succès</span>
    </div>

    </div>


    <script>

    $('#date-naisse').mask('00/00/0000');
    $('#formEditUser_code_postale-input').mask('000000')

    $('#date-naisse').bind('keyup','keydown', function(event) {
        var inputLength = event.target.value.length;
        if (event.keyCode != 8){
        if(inputLength === 2 || inputLength === 5){
            var thisVal = event.target.value;
            thisVal += '/';
            $(event.target).val(thisVal);
            }
        }
    })

    function letterOnly(input) {
        var regex = /[^a-zA-ZÀ-ÿ-._ ]/gi;
        input.value = input.value.replace(regex, "");

        if (input.value.length < 3 && input.value.length >0) {
            $("#prenom").addClass('input-error-warning');
            $("#nom").addClass('input-error-warning')
        }else {
            $("#nom").removeClass('input-error-warning');
            $("#nom").addClass('input-error-warning')
        }
    }

    function myActivate(input) {
        $("#mbtn").removeClass('btn-modif');
        // $("#mbtn").prop('disabled', false);
    }

    function modifierUserProfil() {
        console.log('Here is the update function')
        // e.preventDefault();
        var data={};
        var REGEXTEXT = '^[A-Za-z][^.]*$';
        var REGEXNUMBER = '^[0][6-7][0-9]{7}$';
        var REGEXNUMBER1 = '^[0-9]*$';

        var urls= $('#formid').attr('action');
        $("#numero-telephone").removeClass('input-error-warning');
        $("#formEditUser_code_postale-input").removeClass('input-error-warning');
            console.log(urls);
            data = {
            'prenom': $('#formEditUser_prenom-input').val(),
            'nom': $('#formEditUser_nom-input').val(),
            'sexe': $('#formEditUser_homme').val(),
            'date_naissance': $('#date-naisse').val(),
            'nom_entreprise': $('#formEditUser_nom_entreprise-input').val(),
            'adresse': $('#formEditUser_adresse-input').val(),
            'code_postale': $('#formEditUser_code_postale-input').val(),
            'portable': $('#numero-telephone').val(),
        }

        data.sexe = $("#formEditUser_homme").is(":checked") ? 'H' : 'F';
        // moment(data.date_naissance).format('YYYY-MM-DD');
        // data.date_naissance = moment().year() - moment(data.date_naissance).year();

        REG = new RegExp(REGEXTEXT, "g");
        REGs = new RegExp(REGEXNUMBER, "g");
        REGc = new RegExp(REGEXNUMBER1, "g");

        if(data.date_naissance < 13 || data.date_naissance > 150) {
            $("#date-naisse").addClass('input-error-warning');
            return;
        }

        if(!REGs.test(data.portable)){
            $("#numero-telephone").addClass('input-error-warning');
            return;
        }

        if(!REGc.test(data.code_postale)){
            $("#formEditUser_code_postale-input").addClass('input-error-warning');
            return;
        }

        if(($('#formEditUser_nom-input').val() === "") || ($('#formEditUser_nom-input').val().length < 3) || (!REG.test(data.nom)) ){
                $("#formEditUser_nom-input").addClass('input-error-warning');
                return;
        }else{

            $("#formEditUser_nom-input").removeClass('input-error-warning');
            $("#date-naisse").removeClass('input-error-warning');

            $.ajaxSetup({
            headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $.ajax({
            type: "POST",
            url: urls,
            data: data,
            dataType: "json",

            beforeSend: function(params) {
                $('#sms_spiner-resend').removeClass('hide');
                $('#sms_spiner-resend').css({ 'width' : '1rem', 'height' : '1rem'})
                $('#mbtn').find('.mbtn-text-0').addClass('hide');
                $('#mbtn').addClass('block-btn');
                $('#mbtn').css('opacity','0.5');
            },

            success: function (response) {
            var user = response.user;
            if (response.status == 400) {

            } else {

            $('#mbtn').prop("disabled", true);
            $("#mbtn").removeClass('btn-active');

            _.each(user, function(model){
                    $('#nom_user').text(model.nom);
                    $('#formEditUser_prenom-input').val(model.prenom);
                    $('#formEditUser_nom-input').val(model.nom);
                    $('#formEditUser_homme').val(model.sexe);
                    $('#formEditUser_nom_entreprise-input').val(model.nom_entreprise);
                    $('#formEditUser_adresse-input').val(model.adresse);
                    $('#formEditUser_code_postale-input').val(model.code_postale);
                    $('#numero-telephone').val(model.portable);
            });

            $('#btn-succ-update').removeClass('hide');

            setTimeout(function() {
                $('#btn-succ-update').addClass('hide');
            }, 3000)

                }
            },
            complete: function() {

                $('#sms_spiner-resend').addClass('hide');
                $('#sms_spiner-resend').css({ 'width' : '1rem', 'height' : '1rem'})
                $('#mbtn').find('.mbtn-text-0').removeClass('hide');
                $('#mbtn').removeClass('input-none');
                $('#mbtn').removeClass('block-btn');
                $('#mbtn').css('opacity','1');
            }
        });

    }
    }


    jQuery(document).ready(function () {

    // $(document).on('click', '#mbtn', function (e) {

    // })



            $(document).on('click', '#meLocaliser', function (e) {
                e.preventDefault();
                var Location = '';
                var Lurls = 'http://ip-api.com/json/' +$('#meLocaliser').val();

                 $.ajax({
                        type: "GET",
                        url: Lurls,
                        beforeSend: function(params) {
                            $('#location_spiner').removeClass('hide')
                            $('#meLocaliser').find('.mbtn-text-0').addClass('hide');
                            $('#meLocaliser').addClass('block-btn');
                            $('#meLocaliser').css('opacity','0.5');
                        },
                        success: function (response) {

                            if(response.status === 'fail'){
                                Location = 'Address Introuvable';
                                $('#formEditUser_adresse-input').val(Location);
                            }
                            else{
                                Location = response.city +', '+response.country;
                                $('#formEditUser_adresse-input').val(Location);
                            }

                        },
                        complete: function() {
                                $('#location_spiner').addClass('hide')
                                $('#meLocaliser').find('.mbtn-text-0').removeClass('hide');
                                $('#meLocaliser').removeClass('input-none');
                                $('#meLocaliser').removeClass('block-btn');
                                $('#meLocaliser').css('opacity','1');
                        }
                    });


            })


    })

    // init user map adresse
    var marker_user_adresse;
    var map_user_adresse;

 function initMapUserAdresse() {

    var myLatLng = {lat: 0.3924100, lng: 9.4535600};
    map_user_adresse = new google.maps.Map(document.getElementById('zone-adresse-map-user'), {
        zoom: 15,
        center: myLatLng,
        zoomControl: true,
        zoomControlOptions: {
            style: google.maps.ZoomControlStyle.SMALL // Set the zoom control style to SMALL
        }
    });

    const infoWindow = new google.maps.InfoWindow();

    marker_user_adresse = new google.maps.Marker({
        position: myLatLng,
        map: map_user_adresse,
        draggable: true,
        title: 'Hello World!'
    });

    var geocoder = new google.maps.Geocoder();

    // movement des markers
    marker_user_adresse.addListener("dragend", (event) => {
        const position = marker_user_adresse.position;
        console.log('All position element by dragging is', position)

        console.log('La latitude est bien => ', position.lat(), 'Et la longitude est => ', position.lng())

        // infoWindow.close();
        infoWindow.setContent(
        `Pin dropped at: ${position.lat()}, ${position.lng()}`
        );
        // infoWindow.open(marker.map, marker);

        geocoder.geocode({'location': position}, function(results, status) {
            if (status === 'OK') {
                if (results[0]) {
                console.log(results[0].formatted_address);
                $('#formEditUser_adresse-input').val(results[0].formatted_address)
                } else {
                console.log('No results found');
                }
            } else {
                console.log('Geocoder failed due to: ' + status);
            }
        });

    });

    autocomplete = new google.maps.places.Autocomplete(
        document.getElementById('formEditUser_adresse-input')
    );

    autocomplete.bindTo("bounds", map_user_adresse);

    const infowindow = new google.maps.InfoWindow();
    const infowindowContent = document.getElementById("infowindow-content");

    infowindow.setContent(infowindowContent);

    // Démmarage du choix de la selection
    autocomplete.addListener("place_changed", () => {
        // infowindow.close();
        marker_user_adresse.setVisible(false);

        const place = autocomplete.getPlace();

        if (!place.geometry || !place.geometry.location) {
        return;
        }

        // If the place has a geometry, then present it on a map.
        if (place.geometry.viewport) {
        map_user_adresse.fitBounds(place.geometry.viewport);
        } else {
        map_user_adresse.setCenter(place.geometry.location);
        map_user_adresse.setZoom(15);
        }

        marker_user_adresse.setPosition(place.geometry.location);
        marker_user_adresse.setVisible(true);
        infowindowContent.children["place-name"].textContent = place.name;
        infowindowContent.children["place-address"].textContent =
        place.formatted_address;
        // infowindow.open(map, marker);

    })

    }

    function showGoogleMapForUserAdresse() {
        // initMapUserAdresse()
        if (typeof marker_user_adresse === 'undefined') {
            initMapUserAdresse()
        }
        $('#map-drop-box-effect-user').removeClass('hide')
        $('#zone-adresse-map-user').removeClass('hidden-google-map')
    }

    function prendreMesCoordoneesuserAdress() {

        if (typeof marker_user_adresse === 'undefined') {
            initMapUserAdresse()
        }
        $('#map-drop-box-effect-user').removeClass('hide')
        // initMapUserAdresse()
        $('#meLocaliserBis').addClass('btn-location-hover-active')

        setTimeout(function(){
            $('#meLocaliserBis').removeClass('btn-location-hover-active')
        }, 200)
        $('#location_spiner3-bis-user-adresse').removeClass('hide')
        $('#zone-adresse-map-user').removeClass('hidden-google-map')
        if (navigator.geolocation) {

            navigator.geolocation.getCurrentPosition(showPositionUserAdress, gpsError, {enableHighAccuracy: true, timeout: 60000, maximumAge: 0});
        } else {
            console.log('Chargement non complet')
            // x.innerHTML = "Geolocation is not supported by this browser.";
        }
    }

    function showPositionUserAdress(position) {

        var data_location = position.coords.latitude + ' , ' + position.coords.longitude
        const user_location = { lat: position.coords.latitude, lng: position.coords.longitude };
        var accuracy = position.coords.accuracy;

        console.log('Le périmètre est bien', accuracy)

        marker_user_adresse.setPosition(user_location)
        map_user_adresse.setCenter(user_location);
        map_user_adresse.setZoom(15);

        $('#formEditUser_adresse-input').val(data_location)
        $('#location_spiner3-bis-user-adresse').addClass('hide')

        $('#livraison_adress_lat').val(position.coords.latitude)
        $('#livraison_adress_lng').val(position.coords.longitude)

    }

    function addEffectSms() {
        console.log('Show me effect')
        $('#client-sms-confirmation').addClass('btn-location-hover-active')
        $('#client-sms-confirmation').css('display:none')

        setTimeout(function(){
            $('#client-sms-confirmation').removeClass('btn-location-hover-active')
        }, 500)


    }


    </script>
