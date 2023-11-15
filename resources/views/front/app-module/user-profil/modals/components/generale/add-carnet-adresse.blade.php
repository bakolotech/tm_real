<style>
    .il-sagit-dune-copy-2 {
        height: 18px;
        width: 82px;
        color: #191970;
        font-family: Roboto;
        font-size: 15px;
        font-weight: 500;
        letter-spacing: -0.36px;
        line-height: 18px;
        margin-left: 14px;
        margin-top: 19px;
    }
    .adresse-residentiell-copy-2 {
        height: 18px;
        width: 114px;
        color: #4A4A4A;
        font-family: Roboto;
        font-size: 13px;
        letter-spacing: -0.31px;
        line-height: 18px;
    }
    .adresse-professionne-copy-2 {
        height: 18px;
        width: 209px;
        color: #4A4A4A;
        font-family: Roboto;
        font-size: 13px;
        letter-spacing: -0.31px;
        line-height: 18px;
    }

    .faire-de-cette-adres {
        height: 18px;
        width: 319px;
        color: #4A4A4A;
        font-family: Roboto;
        font-size: 13px;
        letter-spacing: -0.31px;
        line-height: 18px;
    }
    .button-annuler-adresse {
        box-sizing: border-box;
        height: 38px;
        width: 187px;
        border: 1px solid #1A7EF5;
        border-radius: 6px;
        background-color: #FFFFFF;
        padding-top: 0.5px;
        padding-right: 81px;

    }

    .button-add-adresse{
        height: 37px;
        width: 164px;
        border-radius: 6px;
        background-color: #9B9B9B;
        color: #FFFFFF;
        border: transparent;
        padding-top: 0.5px;
    }

    .button-add-adresse2{
        height: 37px;
        width: 186px;
        border-radius: 6px;
        background-color: #9B9B9B;
        color: #FFFFFF;
        border: transparent;
        padding-top: 0.5px;
    }

    .text-enregistrer-adresse {
        height: 18px;
        width: 87px;
        color: #FFFFFF;
        font-family: Roboto;
        font-size: 16px;
        font-weight: 500;
        letter-spacing: 0.35px;
        line-height: 18px;
        text-align: center;
        margin-left: 12.5px;
    }

    .text-annuler {
        height: 18px;
        width: 62px;
        color: #1A7EF5;
        font-family: Roboto;
        font-size: 16px;
        font-weight: 500;
        letter-spacing: 0.35px;
        line-height: 18px;
        text-align: center;
    }

    .font-weight-input-carnet{
        font-weight: 400 !important;
    }

    .input-carnet-adresse-1{
        width: 48px;
        border-right: none;
        border-radius: 6px 0px 0px 6px;
        height: 100%;
        margin-left: -13px;
        border: none;
    }

    .input-carnet-adresse-2{
        border-radius: 0 6px 6px 0;
        border-left: none;
        height: 100%;
        width: 100%;
        border: none;
    }

    .input-carnet-adresse-2:focus  {
        border: none;
    }
    .label1{
    color: #191970;
    font-family: Roboto;
    font-size: 15px;
    font-weight: 500;
    letter-spacing: 0;
    line-height: 18px;

    }
.grise{
    background-color: #D8D8D8;
}

.hide {
  display: none !important;
}

.hidden-google-map {
    display: none !important;
}

.btn-active{
    border: 1px solid #1A7EF5;
    background-color: #1A7EF5 !important;
    color:
}

.localisation-button2 {
    height: 31px;
    width: 133.75px;
    border-radius: 6px;
    background-color: #1A7EF5;
    color: #FFFFFF;
    font-family: Roboto;
    font-size: 13px;
    font-weight: 500;
    letter-spacing: -0.31px;
    line-height: 16px;
    border: none;
    position: absolute;
    float: left;
    margin-left: -139px;
    margin-top: 5px;

}

.add-map-element {
    position: absolute;
    top: 75px;
    width: 415px;
    height: 445px;
    margin-left: 431px;
    z-index: 100;
    border-radius: 6px;
}

.add-map-element-container {
    width: 100%;
    height: 100%;
    background-color: #4A4A4A;
}

.pac-container {
    z-index: 200000 !important;
}

.spinner-location {
    position: absolute;
    margin-left: -370px;
    margin-top: -4px;
}

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

.btn-location-hover:hover {
    background-color: #146FDA;
}

.btn-location-hover:active {
    background-color: #2C3EDD;
}
/** BUTTON ACTIFS */
.btn-location-hover-active{
    background-color: #2C3EDD !important;
}

.map-box-shadow-background {
    width: 100%;
    height: 443px;
    background-color: rgba(255, 255, 255, 0.8);
    position: absolute;
    z-index: 2;
}

.img-bottom-address {
    margin-bottom: -3px;
}

</style>
<!-- style="display: none" -->

<div id="add-carnet-adresse" class="carnet-adresse as hide" >
    <div class="map-box-shadow-background hide" id="map-drop-box-effect"></div>
    <div class="d-flex" style="height: 93%;width: 100%; position: relative; z-index: 3">
        <form action="{{ route('carnet-adresse.store')}}" method="post"  id="formAddCarnetAdresseUser_myform">
            @csrf
            <div class="tab_con" style="width: 100%;" >
                <label class="label1" style="width: 402px;  margin-left: 16px; margin-top: 20px" for="email"> Adresse de livraison</label>
                <div class="d-flex" style="margin-left: 14px;margin-top: 10px;" >
                    <div style="margin-right: 14px; width: 194px">
                        <input id="formAddCarnetAdresseUser_prenom_nom" name="formAddCarnetAdresseUser_prenom_nom" oninput="myActivate2(this)" onkeyup=letterOnly(this) value="@auth{{ Auth::user()->prenom.' '.Auth::user()->nom.' ' }}@endauth"  placeholder="Prénom & nom" class="my-form-field input-general-first font-weight-input-carnet" type="text">
                    </div>

                    <div style=" width: 194px">
                        <input  id="formAddCarnetAdresseUser_portable" name="formAddCarnetAdresseUser_portable"  oninput="myActivate2(this)" value="@auth {{ Auth::user()->portable}} @endauth"   placeholder="Numero de Telephone" class="my-form-field input-general-first font-weight-input-carnet" type="text">
                    </div>

                </div>
                <div  style="margin-left: 14px; margin-top: 15px;width: 402px !important;" id="pac-containerG" >

                    <input name="formAddCarnetAdresseUser_adresse" onfocus="showGoogleMap()" style="position: relative; "  type="text" id="formAddCarnetAdresseUser_adresse" oninput="myActivate2(this)" value="@auth{{Auth::user()->adresse}}@endauth"    placeholder="Adresse (Quartier/Rue/...)" class="my-form-field input-general-second font-weight-input-carnet controlsd" >

                    <button aria-label="Me geolocaliser" type=button class="localisation-button2 btn-location-hover" id="meLocaliserAdresseLivraison" onclick="prendreMesCoordoneesS()">
                    <span aria-label="Me geolocaliser" style="height:16px; width:89px" class="mbtn-text-0">
                    <img aria-label="Me geolocaliser" style="height:13px; margin-top:-2.5px; width:10px"  src="/assets/images/geo-alt-fill.svg" alt="" /> Me géolocaliser</span>
                    <span aria-label="Me geolocaliser" class="spinner-border spinner-border-helper hide spinner-location" id="location_spiner3-bis" role="status" aria-hidden="true"></span>

                    </button>

                    <input name="livraison_addres_latitude" type="hidden" id="livraison_adress_lat" value="" />
                    <input name="livraison_addres_longitude" type="hidden" id="livraison_adress_lng" value="" />

                </div>

                <div  style=" margin-left: 14px; margin-top: 15px;width: 402px" >
                    <input name="formAddCarnetAdresseUser_complement" type="text" id="formAddCarnetAdresseUser_complement" oninput="myActivate2(this)" onkeyup=letterOnlycomplement(this) placeholder="Compléments(ex:immeuble, étage...)" class="my-form-field input-general-second font-weight-input-carnet" >
                </div>

                <div class="d-flex" style="margin-left: 14px;margin-top: 15px;" >
                    <div style="width: 194px; margin-right: 14px;">
                        <input
                            data-position="@auth{{ \App\Models\Pays::getPays()->id }}@endauth"
                            type="hidden"
                            name="formAddCarnetAdresseUser_ville"
                            id="formEditUser_city_id"
                            value="@auth{{ $_SESSION['config']['user-ville']['id'] }}@endauth"
                            data-select="#formEditUser_state-input"
                            data-load="1"
                            data-csrf="{{ csrf_token() }}"
                            data-form-key="formEditUser_"
                        >
                        <div class="my-select-img" id="formEditUser_city_id-input">
                            <div class='parent-0 select-main-div my-form-field  pl-0 bg-x' data-ul-id='#form-profil-ville'>
                                <div style="border-right: 1px solid #8d8787 !important;"  class='select-main-div-img'><img src='{{ $monPays->getImage() }}' alt=''></div>
                                <div class='select-main-div-text' id="guest-adresse-ville-name" >@auth{{ $_SESSION['config']['user-ville']['name'] }}@endauth</div>
                            </div>
                        </div>
                        <div id="formEditUser_city_id-error" class="formEditUser_error-text error-text error-msg"></div>
                    </div>
                    <div style="width: 194px;">
                        <input name="formAddCarnetAdresseUser_code_postale" id="formAddCarnetAdresseUser_code_postale" oninput="myActivate2(this)"  value="@auth{{Auth::user()->code_postale}}@endauth"   placeholder="Code postale (facultatif)"  class="my-form-field input-general-first font-weight-input-carnet" type="text">
                    </div>
                </div>
             <div style="margin-left:423px;margin-top:-260px">
                <div class="il-sagit-dune-copy-2">
                    <span>Il s'agit d'une</span>
                </div>

                <div class="d-flex" style="margin-top: 26.48px;margin-left: 14px;">
                    <div class="d-flex">
                        <input name="formAddCarnetAdresseUser_type_adresse"   onclick="checkAddress1()" id="type_residentielle" style="margin-left:3px;margin-top:-1px;font-weight: 100 !important;" value="adresse résidentielle"  class="form-check-input" type="radio">
                        <label class="adresse-residentiell-copy-2" onclick="checAddress2()" id="type_commerciale" style="margin-left:5px" for="formCarnetAdresseUser_adresse_residentielle">Adresse résidentielle</label>
                    </div>
                    <div class="d-flex" >
                        <input name="formAddCarnetAdresseUser_type_adresse" checked onclick="checkAddress2()" id="type_professionnelle" value="adresse professionnelle"  class="form-check-input" style="margin-left: 17px;margin-top:-1px;font-weight: 100 !important;" type="radio">
                        <label class="adresse-professionne-copy-2" for="formCarnetAdresseUser_adresse_professionnelle" style="margin-left:5px;">Adresse professionnelle/commerciale</label>
                    </div>
                </div>


                <div style="margin-left: 14px;margin-top: 20px;width: 402px !important">
                    <input  name="formAddCarnetAdresseUser_nom_entreprise" id="company" oninput="myActivate2(this)"  placeholder="Nom de l'entreprise" value="@auth{{Auth::user()->nom_entreprise}}@endauth" style="width:382px"  class="my-form-field input-general-second font-weight-input-carnet" type="text">
                </div>

                <div style="margin-left: 14px;margin-top: 21.5px;">
                    <input  id="formCarnetAdresseUser_adresse_defaut" name="formCarnetAdresseUser_adresse_defaut[]" type="checkbox" class="form-check-input" style="margin-left:3px;">
                    <label class="faire-de-cette-adres" for="formCarnetAdresseUser_adresse_defaut" style="margin-left:5px;">
                        Faire de cette adresse mon adresse de livraison par défaut
                    </label>
                </div>
                <div class="d-flex" style="margin-top: 23.5px;margin-left:110px;">
                     <button type="button" id="addCarnet" class="button-add-adresse" disabled style="margin-left:118px;" onclick="addAddressLivraison()">
                        <span class="text-enregistrer-adresse mbtn-text-0">Enregistrer</span>
                        <span class="spinner-border hide" id="add_spiner-resend" role="status" aria-hidden="true"></span>
                    </button>

                    <button type="button" id="modifCarnet" class="button-add-adresse2 hide" style="margin-left:99px;">
                        <span class="text-enregistrer-adresse mbtn-text-0">Modifier</span>
                        <span class="spinner-border hide" id="modif_spiner-resend" role="status" aria-hidden="true"></span>
                    </button>
                </div>
            </div>
            </div>
        </form>


    </div>

    <div class="img-bottom-address"></div>

        <div class="add-map-element hidden-google-map "  id="zone-adresse-map" >


    </div>


</div>

    <div id="btn-succ-add-carnet-user" class="success-message hide">
            <span>Mise à jour avec succès</span>
    </div>

<script>


        $('#formAddCarnetAdresseUser_code_postale ').mask('000000')
        $('#formAddCarnetAdresseUser_portable ').mask('000000000')


      function checkAddress1(){
        var address1 = document.getElementById('type_residentielle');
        if($('#type_residentielle').is(":checked")){
            $('#company').prop('readonly', true);
            $('#company').prop('disabled', true);
            $('#company').addClass('grise');
            $('#type_professionnelle').prop('checked', false);
            $('#company').val('');
        }
      }

       function checkAddress2(){
            var address2 = document.getElementById('type_professionnelle');
            if($('#type_professionnelle').is(":checked")){
                $('#company').prop('readonly', false);
                $('#company').prop('disabled', false);
                $('#company').removeClass('grise');
                $('#type_residentielle').prop('checked', false);
            }
        }

        function myActivate2(input) {
            $("#addCarnet").addClass('btn-active');
            $("#addCarnet").prop('disabled', false);
        }


      function letterOnlycomplement(input) {
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

    jQuery(document).ready(function () {

    //----------------------------------------MODIFY CARNET--------------------------------------------------------------------------------------



        $(document).on('click', '#modifCarnet', function (e) {
           e.preventDefault();
           console.log('add-carnet-addresse.blade.php')
           var url= '/update-user-adresse/'+$('#modifCarnet').val();

           var data = {
                'prenom_nom': $('#formAddCarnetAdresseUser_prenom_nom').val(),
                'portable': $('#formAddCarnetAdresseUser_portable').val(),
                'adresse': $('#formAddCarnetAdresseUser_adresse').val(),
                'complement': $('#formAddCarnetAdresseUser_complement').val(),
                'ville': $('#formEditUser_city_id').val(),
                'code_postale': $('#formAddCarnetAdresseUser_code_postale ').val(),
                'nom_entreprise': $('#company').val(),
            }



            data.type_adresse = $("#type_residentielle").is(":checked") ? '2' : '1';
            data.adresse_defaut = $("#formCarnetAdresseUser_adresse_defaut").is(":checked") ? 1 : 0;

            if(data.type_adresse == '2'){
                data.nom_entreprise = 'resident';
            }


            console.log(data);

                $.ajaxSetup({
                headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });

                $.ajax({
                    type: "POST",
                    url: url,
                    data: data,
                    dataType: "json",
                    beforeSend: function(params) {
                        $('#modif_spiner-resend').removeClass('hide');
                        $('#modif_spiner-resend').css({ 'width' : '1rem', 'height' : '1rem'})
                        $('#modifCarnet').find('.mbtn-text-0').addClass('hide');
                        $('#modifCarnet').addClass('block-btn');
                        $('#modifCarnet').css('opacity','0.5');
                    },
                    success: function (response) {
                        if(response.status === 200){

                            $("#btn-succ-add-carnet-user").removeClass('hide');

                            setTimeout(function() {
                                $('#btn-succ-add-carnet-user').addClass('hide');
                                $('.as').addClass('hide');
                                $('.ls').removeClass('hide');
                            }, 3000)
                        }
                    },
                    complete: function() {
                            $('#modif_spiner-resend').addClass('hide');
                            $('#modif_spiner-resend').css({ 'width' : '1rem', 'height' : '1rem'})
                            $('#modifCarnet').find('.mbtn-text-0').removeClass('hide');
                            $('#modifCarnet').removeClass('input-none');
                            $('#modifCarnet').removeClass('block-btn');
                            $('#modifCarnet').css('opacity','1');
                    }
                });



                var LurlM = '/carnet-getaddress';

                   $.ajax({
                    type: "GET",
                    url: LurlM,
                    success: function (response) {
                        var carnets = response.carnet[0];


                    $('#addressContaineur').empty();
                    $('#liste-carnet-adresse-vide').empty();


                     if(carnets.length == 0){
                         $('#addressContaineur').append(`<div id="liste-carnet-adresse-vide" class="carnet-adresse">
                            <div class="vous-navez-pas-dad">
                                <span>Vous n'avez pas d'adresses enregistrées</span>
                            </div>
                            <div class="img-bottom-address"></div>
                        </div>`)

                    } else {

                    $.each(carnets, function(key, carnet){


                        if(carnet.adresse_defaut === 1){
                            $('#addressContaineur').append(`<div class="back-ground-carnet1" id="carnet_${carnet.id}">
                            <div class="col col-card" style="text-align: right; margin-bottom: 20px; padding-left:0px; display: flex;">
                                <div class="btn-group-vertical" role="group" aria-label="Basic example" style="margin-left: 11px">
                                    <div class="btn-2">
                                        <button type="button" disabled class="btn btn-outline-secondary"  style="background-color: #fff; border-bottom: none; border-radius: 6px;"><img class="icon-carnet-adresse-rectangle1" style="width :10.96px; height:10.96px" src="{{  asset('assets/images/icon-user-carnet.svg') }}" alt=""></i>  </button>
                                        <span class="user-nom"><b>  ${carnet.prenom_nom}</b></span>
                                    </div>
                                    <div class="btn-1">
                                        <button type="button" disabled class="btn btn-outline-secondary"  style="background-color: #fff;"><img style="margin-top: 2.5px; width :11.95px; height:11.96px" class="icon-carnet-adresse-rectangle1" src="{{  asset('assets/images/icon-telephone-carnet.svg') }}" alt=""></button>
                                        <span class="user-tel"><b> ${carnet.portable}</b></span>
                                    </div>
                                    <div class="btn-1">
                                        <button type="button" disabled class="btn btn-outline-secondary"  style="background-color: #fff; border-top: none;">  <img style="margin-top: 2.5px; width:8.96px; height:12.95px" class="icon-carnet-adresse-rectangle1" src="{{  asset('assets/images/icon-localisation-carnet.svg') }}" alt=""> </button>
                                        <span class="user-location">${carnet.adresse} </span>
                                    </div>
                                    <div class="btn-3">
                                        <button type="button" disabled class="btn btn-outline-secondary"  style="background-color: #fff; border-top: none;"><img style="margin-top: 2.5px; width:11.95px; height:11.96px" class="icon-carnet-adresse-rectangle1" src="{{  asset('assets/images/icon-batiment-carnet.svg') }}" alt=""></button>
                                        <span class="user-entreprise"><b> ${carnet.nom_entreprise}</b></span>
                                    </div>
                                </div>
                                <div class="autre-button" style="position: absolute; float: right; right: 2px; display: flex; flex-direction: column; justify-content: center; align-items: center;">
                                    <div class="pended-button1" style="margin-bottom: 6px">
                                        <button value="${carnet.id}" data-toggle="modal" class="btn-pending" data-target="#deleteCarnetAdresse" id="delete" ><img style="width:20px; height:20px" src="{{ asset('assets/images/fermepannier.svg') }}" alt="" /></button>
                                    </div>
                                    <div class="pended-button2">
                                        <button value="${carnet.id}" id="modif_addresse" class="btn-pending "><img style="width:20px; height:20px" src="{{ asset('assets/images/edit-off.svg') }}" alt="" /></button>
                                    </div>
                                </div>
                            </div>
                           </div> `);

                        }else{

                        $('#addressContaineur').append(`<div class="back-ground-carnet" id="carnet_${carnet.id}">
                            <div class="col col-card1" style="text-align: right; margin-bottom: 20px; padding-left:0px; display: flex;">
                                <div class="btn-group-vertical" role="group" aria-label="Basic example" style="margin-left: 11px">
                                    <div class="btn-2">
                                        <button type="button" disabled class="btn btn-outline-secondary"  style="background-color: #fff; border-bottom: none; border-radius: 6px;"><img class="icon-carnet-adresse-rectangle1" style="width :10.96px; height:10.96px" src="{{  asset('assets/images/icon-user-carnet.svg') }}" alt=""></i>  </button>
                                        <span class="user-nom"><b>  ${carnet.prenom_nom}</b></span>
                                    </div>
                                    <div class="btn-1">
                                        <button type="button" disabled class="btn btn-outline-secondary"  style="background-color: #fff;"><img style="margin-top: 2.5px; width :11.95px; height:11.96px" class="icon-carnet-adresse-rectangle1" src="{{  asset('assets/images/icon-telephone-carnet.svg') }}" alt=""></button>
                                        <span class="user-tel"><b> ${carnet.portable}</b></span>
                                    </div>
                                    <div class="btn-1">
                                        <button type="button" disabled class="btn btn-outline-secondary"  style="background-color: #fff; border-top: none;">  <img style="margin-top: 2.5px; width:8.96px; height:12.95px" class="icon-carnet-adresse-rectangle1" src="{{  asset('assets/images/icon-localisation-carnet.svg') }}" alt=""> </button>
                                        <span class="user-location">${carnet.adresse} </span>
                                    </div>
                                    <div class="btn-3">
                                        <button type="button" disabled class="btn btn-outline-secondary"  style="background-color: #fff; border-top: none;"><img style="margin-top: 2.5px; width:11.95px; height:11.96px" class="icon-carnet-adresse-rectangle1" src="{{  asset('assets/images/icon-batiment-carnet.svg') }}" alt=""></button>
                                        <span class="user-entreprise"><b> ${carnet.nom_entreprise}</b></span>
                                    </div>
                                </div>
                                <div class="autre-button" style="position: absolute; float: right; right: 2px; display: flex; flex-direction: column; justify-content: center; align-items: center;">
                                    <div class="pended-button1" style="margin-bottom: 6px">
                                        <button value="${carnet.id}" data-toggle="modal" class="btn-pending" data-target="#deleteCarnetAdresse" id="delete" ><img style="width:20px; height:20px"  src="{{ asset('assets/images/fermepannier.svg') }}" alt="" /></button>
                                    </div>
                                    <div class="pended-button2">
                                        <button value="${carnet.id}"  id="modif_addresse" class="btn-pending "><img style="width:20px; height:20px" src="{{ asset('assets/images/edit-off.svg') }}" alt="" /></button>
                                    </div>
                                </div>
                            </div>
                           </div> `);
                        }// fin ELSE

                       });

                    }// fin else

                    },
                });

        });
})

var marker;
var map;

function initMap() {

    var myLatLng = {lat: 0.3924100, lng: 9.4535600};
    map = new google.maps.Map(document.getElementById('zone-adresse-map'), {
        zoom: 15,
        center: myLatLng,
    });

    const infoWindow = new google.maps.InfoWindow();

    marker = new google.maps.Marker({
        position: myLatLng,
        map: map,
        draggable: true,
        title: 'Hello World!'
    });

    var geocoder = new google.maps.Geocoder();

    // movement des markers
    marker.addListener("dragend", (event) => {
    const position = marker.position;
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
            $('#formAddCarnetAdresseUser_adresse').val(results[0].formatted_address)
            } else {
            console.log('No results found');
            }
        } else {
            console.log('Geocoder failed due to: ' + status);
        }
    });

    });

    autocomplete = new google.maps.places.Autocomplete(
        document.getElementById('formAddCarnetAdresseUser_adresse')
    );

    autocomplete.bindTo("bounds", map);

    const infowindow = new google.maps.InfoWindow();
    const infowindowContent = document.getElementById("infowindow-content");

    infowindow.setContent(infowindowContent);

    // Démmarage du choix de la selection
    autocomplete.addListener("place_changed", () => {
        // infowindow.close();
        marker.setVisible(false);

        const place = autocomplete.getPlace();

        if (!place.geometry || !place.geometry.location) {
        return;
        }

        // If the place has a geometry, then present it on a map.
        if (place.geometry.viewport) {
        map.fitBounds(place.geometry.viewport);
        } else {
        map.setCenter(place.geometry.location);
        map.setZoom(15);
        }

        marker.setPosition(place.geometry.location);
        marker.setVisible(true);
        infowindowContent.children["place-name"].textContent = place.name;
        infowindowContent.children["place-address"].textContent =
        place.formatted_address;
        // infowindow.open(map, marker);

    })

}

const gpsOptions = {enableHighAccuracy: true, timeout: 6000, maximumAge: 0};

// Geolocation: Error
function gpsError(err) {
    console.log(`Error: ${err.code}, ${err.message}`);
}

function showPositionBis(position) {

    var data_location = position.coords.latitude + ' , ' + position.coords.longitude
    const user_location = { lat: position.coords.latitude, lng: position.coords.longitude };
    var accuracy = position.coords.accuracy;
    console.log('Le périmètre est bien', accuracy)

    marker.setPosition(user_location)
    map.setCenter(user_location);
    map.setZoom(15);

    $('#formAddCarnetAdresseUser_adresse').val(data_location)
    $('#location_spiner3-bis').addClass('hide')

    $('#livraison_adress_lat').val(position.coords.latitude)
    $('#livraison_adress_lng').val(position.coords.longitude)

}

function prendreMesCoordoneesS() {

    $('#map-drop-box-effect').removeClass('hide')
    $('#meLocaliserAdresseLivraison').addClass('btn-location-hover-active')

    setTimeout(function(){
        $('#meLocaliserAdresseLivraison').removeClass('btn-location-hover-active')
    }, 200)
    $('#location_spiner3-bis').removeClass('hide')
    $('#zone-adresse-map').removeClass('hidden-google-map')
    if (navigator.geolocation) {

        navigator.geolocation.getCurrentPosition(showPositionBis, gpsError, {enableHighAccuracy: true, timeout: 60000, maximumAge: 0});
        $('#location_spiner3-bis').addClass('hide')
    } else {
        console.log('Chargement non complet')
        // x.innerHTML = "Geolocation is not supported by this browser.";
    }
}

function searchPlaces() {
    var place_to_search = $('#formAddCarnetAdresseUser_adresse').val();

    if (place_to_search.length > 2) {
        var user_adresse = "Université Omar Bongo, Libreville, Komo-Mondah, Estuaire, Gabon"
        var geocoder = new google.maps.Geocoder();

        geocoder.geocode({ 'address': place_to_search}, function(results, status) {
            if (status == 'OK') {
                // centered the map on the coordinates turned by the Geocoder
                var map = new google.maps.Map(document.getElementById('zone-adresse-map'), {
                    zoom: 15,
                    center: results[0].geometry.location,
                });

                // Add a marker to the map at the location of the addresse
                var marker = new google.maps.Marker({
                    map: map,
                    position: results[0].geometry.location
                })
            }else {
                console.log('Ce lieu est introuvable')
            }
        })
    }

}

function showGoogleMap() {
    $('#map-drop-box-effect').removeClass('hide')
    $('#zone-adresse-map').removeClass('hidden-google-map')
}

// Add de l'adresse de livraison
function addAddressLivraison() {

    var data={};
    var urls= $('#formAddCarnetAdresseUser_myform').attr('action');

    var REGEXNUMBER = '^[0-9]*$';
    var REGEXNUMBER1 = '^[0][6-7][0-9]{7}$';
    var Ok = true;

    $('#formAddCarnetAdresseUser_prenom_nom').removeClass('input-error-warning');
    $('#formAddCarnetAdresseUser_portable').removeClass('input-error-warning');
    $('#formAddCarnetAdresseUser_adresse').removeClass('input-error-warning');
    $('#formAddCarnetAdresseUser_complement').removeClass('input-error-warning');
    $('#formEditUser_city_id').removeClass('input-error-warning');
    $('#formAddCarnetAdresseUser_code_postale ').removeClass('input-error-warning');
    $('#formCarnetAdresseUser_adresse_defaut').removeClass('input-error-warning');
    $('#company').removeClass('input-error-warning');

    var address_lat = $('#livraison_adress_lat').val();
    var adress_long = $('#livraison_adress_lng').val();


    data = {
        'prenom_nom': $('#formAddCarnetAdresseUser_prenom_nom').val(),
        'portable': $('#formAddCarnetAdresseUser_portable').val(),
        'adresse': $('#formAddCarnetAdresseUser_adresse').val(),
        'complement': $('#formAddCarnetAdresseUser_complement').val(),
        'ville': $('#formEditUser_city_id').val(),
        'code_postale': $('#formAddCarnetAdresseUser_code_postale ').val(),
        'address_lat': address_lat,
        'adress_long': adress_long,
    }


    REG = new RegExp( REGEXNUMBER, "g");
    REGs = new RegExp(REGEXNUMBER1, "g");

    data.type_adresse = $("#type_residentielle").is(":checked") ? '2' : '1';
    data.adresse_defaut = $("#formCarnetAdresseUser_adresse_defaut").is(":checked") ? 1 : 0;

    if(data.type_adresse == '2'){
        data.nom_entreprise = 'resident';
    }


    // if(_.isUndefined(data.prenom_nom) || data.prenom_nom === ""){$("#formAddCarnetAdresseUser_prenom_nom").addClass('input-error-warning'); Ok = false; return;}
    // if(_.isUndefined(data.portable) || data.portable === "" || (!REGs.test(data.portable))){$("#formAddCarnetAdresseUser_portable").addClass('input-error-warning'); Ok =false; return;}
    // if(_.isUndefined(data.adresse) || data.adresse === ""){$("#formAddCarnetAdresseUser_adresse").addClass('input-error-warning');  Ok = false;return;}
    // if(_.isUndefined(data.complement) || data.complement === "" ){$("#formAddCarnetAdresseUser_complement").addClass('input-error-warning'); Ok = false; return;}
    // if(_.isUndefined(data.ville) || data.ville === ""){$("#formEditUser_city_id").addClass('input-error-warning');  Ok = false;return;}
    // if((!REG.test(data.code_postale))){$("#formAddCarnetAdresseUser_code_postale").addClass('input-error-warning'); Ok = false; return;}
    // if(_.isUndefined(data.type_adresse) || data.type_adresse === ""){$("#formCarnetAdresseUser_adresse_defaut").addClass('input-error-warning'); Ok = false; return;}

    // if(_.isUndefined(data.nom_entreprise) || data.nom_entreprise === ""){$("#company").addClass('input-error-warning'); Ok = false; return;}


    // if(Ok === true){

    console.log(data);

    $('.button-add-adresse').prop('disabled', true);

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

    $('#add_spiner-resend').removeClass('hide');
    $('#add_spiner-resend').css({ 'width' : '1rem', 'height' : '1rem'})
    $('#addCarnet').find('.mbtn-text-0').addClass('hide');
    $('#addCarnet').addClass('block-btn');
    $('#addCarnet').css('opacity','0.5');

    },

    success: function (response) {
    if(response.status === 200) {
        $('.button-add-adresse').prop('disabled', true);
        $("#addCarnet").removeClass('btn-active');

        $('#formAddCarnetAdresseUser_prenom_nom').val('');
        $('#formAddCarnetAdresseUser_portable').val('');
        $('#formAddCarnetAdresseUser_adresse').val('');
        $('#formAddCarnetAdresseUser_complement').val('');
    // 'ville': $('#formEditUser_city_id').val();
        $('#formAddCarnetAdresseUser_code_postale ').val('');
        $('#company').val('');

        $("#btn-succ-add-carnet-user").removeClass('hide');

        setTimeout(function() {
            $('#btn-succ-add-carnet-user').addClass('hide');
            $('.as').addClass('hide');
            $('.ls').removeClass('hide');
            $('#addAdress').removeClass('desable-add-adresse')
        }, 2000)
    }

    },

    complete: function() {
        $('#add_spiner-resend').addClass('hide');
        $('#add_spiner-resend').css({ 'width' : '1rem', 'height' : '1rem'})
        $('#addCarnet').find('.mbtn-text-0').removeClass('hide');
        $('#addCarnet').removeClass('input-none');
        $('#addCarnet').removeClass('block-btn');
        $('#addCarnet').css('opacity','1');
    }

    });   // FIN AJAX CALL


    var Lurla = '/carnet-getaddress';

    $.ajax({
    type: "GET",
    url: Lurla,
    success: function (response) {
        var carnets = response.carnet[0];

    $('#addressContaineur').empty();
    $('#liste-carnet-adresse-vide').empty();

    if(carnets.length == 0){
            $('#addressContaineur').append(`<div id="liste-carnet-adresse-vide" class="carnet-adresse">
            <div class="vous-navez-pas-dad">
                <span>Vous n'avez pas d'adresses enregistrées</span>
            </div>
            <div class="img-bottom-address"></div>
        </div>`)

    } else {

    $.each(carnets, function(key, carnet){


    if(carnet.adresse_defaut === 1){

        $('#addressContaineur').append(`<div class="back-ground-carnet1" id="carnet_${carnet.id}">
        <div class="col col-card" id="carnets_${carnet.id}" style="text-align: right; margin-bottom: 20px; padding-left:0px; display: flex;">
            <div class="btn-group-vertical" role="group" aria-label="Basic example" style="margin-left: 11px">
                <div class="btn-2">
                    <button type="button" disabled class="btn btn-outline-secondary"  style="background-color: #fff; border-bottom: none; border-radius: 6px;"><img class="icon-carnet-adresse-rectangle1" style="width :10.96px; height:10.96px; margin-left: -4px" src="{{  asset('assets/images/icon-user-carnet.svg') }}" alt=""></i>  </button>
                    <span class="user-nom"><b>  ${carnet.prenom_nom}</b></span>
                </div>
                <div class="btn-1">
                    <button type="button" disabled class="btn btn-outline-secondary"  style="background-color: #fff;"><img style="margin-top: 2.5px; width :11.95px; height:11.96px; margin-left: -4px" class="icon-carnet-adresse-rectangle1" src="{{  asset('assets/images/icon-telephone-carnet.svg') }}" alt=""></button>
                    <span class="user-tel"><b> ${carnet.portable}</b></span>
                </div>
                <div class="btn-1">
                    <button type="button" disabled class="btn btn-outline-secondary"  style="background-color: #fff; border-top: none;">  <img style="margin-top: 2.5px; width:8.96px; height:12.95px; margin-left: -4px" class="icon-carnet-adresse-rectangle1" src="{{  asset('assets/images/icon-localisation-carnet.svg') }}" alt=""></button>
                    <span class="user-location">${carnet.adresse} </span>
                </div>
                <div class="btn-3">
                    <button type="button" disabled class="btn btn-outline-secondary"  style="background-color: #fff; border-top: none;"><img style="margin-top: 2.5px; width:11.95px; height:11.96px; margin-left: -4px" class="icon-carnet-adresse-rectangle1" src="{{  asset('assets/images/icon-batiment-carnet.svg') }}" alt=""></button>
                    <span class="user-entreprise"><b> ${carnet.nom_entreprise}</b></span>
                </div>
            </div>
            <div class="autre-button" style="position: absolute; float: right; right: 2px; display: flex; flex-direction: column; justify-content: center; align-items: center;">
                <div class="pended-button1" style="margin-bottom: 6px">
                    <button value="${carnet.id}" data-toggle="modal" class="btn-pending" data-target="#deleteCarnetAdresse" id="delete" ><img style="width:20px; height:20px"  src="{{ asset('assets/images/fermepannier.svg') }}" alt="" /></button>
                </div>
                <div class="pended-button2">
                    <button value="${carnet.id}"  id="modif_addresse" class="btn-pending "><img style="width:20px; height:20px" src="{{ asset('assets/images/edit-off.svg') }}" alt="" /></button>
                </div>
            </div>
        </div>
        </div> `);

        $('#carnets_'+carnet.id).addClass('col-card');

        }else{

        $('#addressContaineur').append(`<div class="back-ground-carnet" id="carnet_${carnet.id}">
            <div class="col col-card1" style="text-align: right; margin-bottom: 20px; padding-left:0px; display: flex;">
                <div class="btn-group-vertical" role="group" aria-label="Basic example" style="margin-left: 11px">
                    <div class="btn-2">
                        <button type="button" disabled class="btn btn-outline-secondary"  style="background-color: #fff; border-bottom: none; border-radius: 6px;"><img class="icon-carnet-adresse-rectangle1" style="width :10.96px; height:10.96px" src="{{  asset('assets/images/icon-user-carnet.svg') }}" alt=""></i>  </button>
                        <span class="user-nom"><b>  ${carnet.prenom_nom}</b></span>
                    </div>
                    <div class="btn-1">
                        <button type="button" disabled class="btn btn-outline-secondary"  style="background-color: #fff;"><img style="margin-top: 2.5px; width :11.95px; height:11.96px" class="icon-carnet-adresse-rectangle1" src="{{  asset('assets/images/icon-telephone-carnet.svg') }}" alt=""></button>
                        <span class="user-tel"><b> ${carnet.portable}</b></span>
                    </div>
                    <div class="btn-1">
                        <button type="button" disabled class="btn btn-outline-secondary"  style="background-color: #fff; border-top: none;">  <img style="margin-top: 2.5px; width:8.96px; height:12.95px" class="icon-carnet-adresse-rectangle1" src="{{  asset('assets/images/icon-localisation-carnet.svg') }}" alt=""> </button>
                        <span class="user-location">${carnet.adresse} </span>
                    </div>
                    <div class="btn-3">
                        <button type="button" disabled class="btn btn-outline-secondary"  style="background-color: #fff; border-top: none;"><img style="margin-top: 2.5px; width:11.95px; height:11.96px" class="icon-carnet-adresse-rectangle1" src="{{  asset('assets/images/icon-batiment-carnet.svg') }}" alt=""></button>
                        <span class="user-entreprise"><b> ${carnet.nom_entreprise}</b></span>
                    </div>
                </div>
                <div class="autre-button" style="position: absolute; float: right; right: 2px; display: flex; flex-direction: column; justify-content: center; align-items: center;">
                    <div class="pended-button1" style="margin-bottom: 6px">
                        <button value="${carnet.id}" data-toggle="modal" class="btn-pending" data-target="#deleteCarnetAdresse" id="delete" ><img style="width:20px; height:20px"  src="{{ asset('assets/images/fermepannier.svg') }}" alt="" /></button>
                    </div>
                    <div class="pended-button2">
                        <button value="${carnet.id}" id="modif_addresse" class="btn-pending "><img style="width:20px; height:20px"src="{{ asset('assets/images/edit-off.svg') }}" alt="" /></button>
                    </div>
                </div>
            </div>
            </div> `);
        }// fin ELSE

        });

        } // fin else

        },
    });

            // }
}

</script>
