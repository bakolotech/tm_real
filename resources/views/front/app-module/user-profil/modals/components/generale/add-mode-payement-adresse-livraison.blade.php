
	<style type="text/css">
		@import url('https://fonts.googleapis.com/css2?family=Gelasio:ital@1&family=Licorice&family=Noto+Sans&family=Roboto:wght@300;400&family=Tajawal:wght@300&display=swap');

        .add-pay-header h4 {
            height: 24px;
            width: 276px;
            color: #191970;
            font-family: Roboto;
            font-size: 21px;
            font-weight: 500;
            letter-spacing: 0;
            line-height: 23px;
            text-align: center;
            position: relative;
            margin-left: auto;
            margin-right: auto;
        }

        .payement-element-container {
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: flex-start;
        }

        .payement-card {
            display: flex;
            justify-content: flex-start;
            align-items: center;
            box-sizing: border-box;
            height: 56px;
            width: 402px;
            border: 1px solid #9B9B9B;
            border-radius: 6px;
            position: relative;
            margin-left: auto;
            margin-right: auto;

            background-color: #FFFFFF;
        }

        .checkbox-element {
            margin-left: 30px;
        }

        .checkbox-element input{
            height: 16px;
            width: 16px;
            background-color: #191970;
        }

        input [type='radio']:checked::after {
            width: 15px;
            height: 15px;
            border-radius: 15px;
            top: -2px; left: -1px;
            position: relative;
            background-color: #ffa500;
            content: ''; display: inline-block;
            visibility: visible;
            border: 2px solid white;
        }

        .payement-element-img {
            margin-left: 10px;
        }

        .payement-element-img  img{
            height: 28px;
            width: 44px;
        }

        .payement-element-text {
            height: 18px;
            color: #191970;
            font-family: Roboto;
            font-size: 16px;
            font-weight: 500;
            letter-spacing: -0.39px;
            line-height: 18px;
            margin-left: 10px;
        }

        .footer-button {
            position: relative;
            margin-left: auto;
            margin-right: auto;
            margin-top: 40px;
        }
        .annul-button {
            box-sizing: border-box;
            height: 37px;
            width: 194px;
            border: 1px solid #1A7EF5;
            border-radius: 6px;
            background-color: #FFFFFF;

            color: #1A7EF5;
            font-family: Roboto;
            font-size: 14px;
            font-weight: 500;
            letter-spacing: 0.31px;
            line-height: 18px;
            text-align: center;
        }

        .ajouter-button {
            height: 37px;
            width: 194px;
            border-radius: 6px;
            background-color: #1A7EF5;

            color: #FFFFFF;
            font-family: Roboto;
            font-size: 14px;
            font-weight: bold;
            letter-spacing: 0.31px;
            line-height: 18px;
            text-align: center;
            border: none;
        }

     .payement-card:hover{
        background-color: #F5F5F5;
        cursor: pointer;
        }

        .volet-droite-modal-dialog-add-livraison, .volet-droite-modal-content-livraison {
            position: relative;
            top: 50px;
        }

        .ajout-carte-credit-header {
            display: flex;
            flex-direction: column;
            margin-bottom: 19px;
        }

        .ajout-carte-credit-header h4{
            /* height: 24px;
            width: 359px; */
            /* color: #191970;
            font-family: Roboto;
            font-size: 21px;
            font-weight: 500;
            letter-spacing: 0;
            line-height: 24px;
            text-align: center; */

        }

        .ajout-carte-credit-header h6 {
            height: 16px;
            width: 342px;
            color: #191970;
            font-family: Roboto;
            font-size: 14px;
            letter-spacing: -0.34px;
            line-height: 16px;
            text-align: center;
            margin-top:3px;

        }

        .modal-body-ajout-carte-credit .payement-element-container .input-element-carte-credit {
            display: flex;
            flex-direction: column;
            margin-bottom: 15px;

        }

        .modal-body-ajout-carte-credit .payement-element-container .input-element-carte-credit-last {
            /* display: flex;
            flex-direction: column;
            margin-bottom: 15px; */

        }

        .modal-body-ajout-carte-credit .payement-element-container .input-element-carte-credit-last input {
            box-sizing: border-box;
            height: 41px;
            width: 402px;
            border: 1px solid #9B9B9B;
            border-radius: 6px;
            background-color: #F8F8F8;
            padding-left: 15px;

        }

        .modal-body-ajout-carte-credit .payement-element-container .input-element-carte-credit input {
            box-sizing: border-box;
            height: 41px;
            width: 402px;
            border: 1px solid #9B9B9B;
            border-radius: 6px;
            background-color: #F8F8F8;
            padding-left: 13px;

        }

        .payement-element-container {
            margin-left: 15px;
            margin-right: 15px;
        }

        .carte-carte {
            display: flex;
            column-gap: 14px;
        }

        .numero-ccv {
            display: flex;
            flex-direction: column;

        }

        .numero-ccv input {
            box-sizing: border-box;
            height: 41px;
            width: 194px;
            border: 1px solid #9B9B9B;
            border-radius: 6px;
            background-color: #F8F8F8;
            padding-left: 15px;
        }

        .input-element-carte-credit label {
            height: 16px;
            /* width: 114px; */
            color: #191970;
            font-family: Roboto;
            font-size: 14px;
            font-weight: bold;
            letter-spacing: -0.34px;
            line-height: 16px;
            margin-bottom: 7px;
        }

        /* .checkbox-carte-default {
            position: relative;
            top: 20px;
        } */

        .il-sagit-de {
            display: flex;
            width: 402px;
            position: relative;
            margin-left: auto;
            margin-right: auto;
            margin-bottom: 15px;
            /* margin-top: 15px; */
        }

        .il-sagit-de .checkbox-carte-default {
            /* background-color: r */
            color: #4A4A4A;
            font-family: Roboto;
            font-size: 13px;
            letter-spacing: -0.31px;
            line-height: 18px;
        }

        .input-group-prepend .input-group-text {
            box-sizing: border-box;
            height: 41px !important;
            width: 41px;
            border: 1px solid #9B9B9B;
            border-radius: 6px 0 0 6px;
            background-color: #FFFFFF;
        }


        .select {
            box-sizing: border-box;
            height: 41px !important;
            width: 153px !important;
            border: 1px solid #9B9B9B;
            border-radius: 0 6px 6px 0;
            background-color: #FFFFFF;
            padding-left:10px;


        }

        .code-post input {
            height: 41px;
            width: 194px;
            margin-left:200px;
            margin-top:-41px;
        }
	</style>


	<!-- Modal -->
	<div class="modal fade" id="modePayementProfilLivraison" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog volet-droite-modal-dialog-add-livraison">
	    <div class="modal-content volet-droite-modal-content-livraison" >

            <div class="modal-header ajout-carte-credit-header">
                <h4 style="margin-top: 5px;">Adresse de livraison</h4>
            </div>

          <div class="modal-body modal-body-ajout-carte-credit">

            <div class="payement-element-container">

                <div class="carte-carte" style="margin-bottom: 15px;">

                    <div class="date-expiration numero-ccv">
                        <input type="text" name="name_surname" id="name_surname" onkeyup="letterOnly(this)" placeholder="Prénom & nom">
                    </div>

                    <div class="numero-ccv">
                        <input type="text" name="phonenumber" id="phonenumber" placeholder="Numéro portable" style="background-image: url('assets/images/icones-vendeurs2/infoB.svg');background-position:top 10px right 15px;background-repeat:no-repeat;background-size:20px;background-origin:content content; ">
                    </div>
                </div>

                <div class="input-element-carte-credit">
                    <input type="text" name="addresses" id="addresses" placeholder="Adresse (Quartier/Rue/...)">
                </div>

                <div class="input-element-carte-credit">
                    <input type="text" name="Komplements" id="Komplements" placeholder="Compléments(ex:immeuble, étage...)">
                </div>

                <div class="row carte-carte" style="margin-bottom: 18px;margin-left:-10px;">

                    <div style="display: flex;" >
                        <div class="input-group">
                            <div class="input-group-prepend">
                              <div class="input-group-text">
                                  <!-- <img src="globe-icon.webp" width="19px" height="19px" alt="" /> -->
                                  <img src="{{ asset('assets/images/icons/globe-icon.webp') }}" alt="" />
                              </div>
                            </div>
                            <select class="select" id="villes">
                                <!-- <option >Ville</option> -->
                                <option value="ntoum" selected>Ntoum</option>
                                <option value="oyem">Oyem</option>
                                <option value="libreville">Libreville</option>
                                <option value="bitam">Bitam</option>
                            </select>
                          </div>
                    </div>

                    <div class="col code-post">
                        <input type="text" class="form-control input-element" id="postal_code" placeholder="Code postal" name="postal_code">
                    </div>
                  </div>


                  <label style="  color: #191970;
                  font-family: Roboto;
                  font-size: 15px;
                  font-weight: bold;
                  letter-spacing: -0.36px;
                  line-height: 18px;margin-top:0px;margin-left:8px;">Il s'agit d'une</label>

                <div class="il-sagit-de" style="position:relative; margin-top:-25px;">
                    <div class="checkbox-carte-default">
                        <input type="radio" name="addy" checked id="Rezident" class="form-check-input" style="margin-top:1px;">
                        &nbsp Adresse résidentielle
                    </div>
                     &nbsp&nbsp
                    <div class="checkbox-carte-default" >
                        <input type="radio" name="addy" class="form-check-input" style="margin-top:1px">
                       &nbsp Adresse professionnelle/commerciale
                    </div>
                </div>

                <div class="input-element-carte-credit-last" style="position: relative;margin-top:15px;">
                    <input type="text" name="Kompany" id="Kompany" placeholder="Nom de l'Entreprise">
                </div>

                <!-- <div class="checkbox-carte-default" style="margin-top:-5px;margin-bottom:20px;">
                    <input type="checkbox" class="form-check-input" style="margin-top:1px;">
                    &nbsp  Faire de cette adresse mon adresse de livraison par défaut
                </div> -->


                <div class="footer-button">
                    <button class="annul-button">Annuler</button>
                    <button class="ajouter-button" id="addAGain">Continuer</button>
                </div>

            </div>

        </div>

	    </div>
	  </div>
	</div>

<script>

            $('#postal_code').mask('000000')
            $('#phonenumber').mask('000000000')




            function letterOnly(input) {

                var regex = /[^a-zA-ZÀ-ÿ-._]/gi;
                input.value = input.value.replace(regex, "");

                if (input.value.length < 3 && input.value.length >0) {
                    $("#name_surname").addClass('input-error-warning');
                }else {
                    $("#name_surname").removeClass('input-error-warning');
                }
            }




        jQuery(document).ready(function () {




                $(document).on('click', '#addAGain', function (e) {

                        e.preventDefault();
                        console.log("add-mode-payement-adresse-livraison.blade");

                        var data={};
                        var REGEXNUMBER = '^[0-9]*$';
                        var REGEXNUMBER1 = '^[0][6-7][0-9]{7}$';
                        var Ok = true;
                        var uurls='/carnet-adresse';

                        $('#name_surname').removeClass('input-error-warning');
                        $('#phonenumber').removeClass('input-error-warning');
                        $('#addresses').removeClass('input-error-warning');
                        $('#Komplements').removeClass('input-error-warning');
                        $('#villes').removeClass('input-error-warning');
                        $('#postal_code ').removeClass('input-error-warning');
                        $('#Kompany').removeClass('input-error-warning');


                        data = {
                            'prenom_nom': $('#name_surname').val(),
                            'portable': $('#phonenumber').val(),
                            'adresse': $('#addresses').val(),
                            'complement': $('#Komplements').val(),
                            'ville': $('#villes').val(),
                            'code_postale': $('#postal_code').val(),
                            'nom_entreprise': $('#Kompany').val(),
                        }


                        REG = new RegExp( REGEXNUMBER, "g");
                        REGs = new RegExp(REGEXNUMBER1, "g");

                        data.type_adresse = $("#Rezident").is(":checked") ? '2' : '1';

                        if(data.type_adresse == '2'){
                            data.nom_entreprise = 'resident';
                        }

                        // console.log(data);

                        if(_.isUndefined(data.prenom_nom) || data.prenom_nom === ""){$("#name_surname").addClass('input-error-warning'); Ok = false; return;}
                        if(_.isUndefined(data.portable) || data.portable === "" || (!REGs.test(data.portable))){$("#phonenumber").addClass('input-error-warning'); Ok =false; return;}
                        if(_.isUndefined(data.adresse) || data.adresse === ""){$("#addresses").addClass('input-error-warning');  Ok = false; return;}
                        if(_.isUndefined(data.complement) || data.complement === "" ){$("#Komplements").addClass('input-error-warning'); Ok = false; return;}
                        if(_.isUndefined(data.ville) || data.ville === ""){$("#villes").addClass('input-error-warning');  Ok = false;return;}
                        if((!REG.test(data.code_postale))|| data.code_postale === ""){$("#postal_code").addClass('input-error-warning'); Ok = false; return;}


                        if(_.isUndefined(data.nom_entreprise) || data.nom_entreprise === ""){$("#Kompany").addClass('input-error-warning'); Ok = false; return;}


                         if(Ok === true){

                             console.log(data);


                             $.ajaxSetup({
                                headers: {
                                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                                    }
                                });

                            $.ajax({
                                    type: "POST",
                                    url: uurls,
                                    data: data,
                                    dataType: "json",


                                    success: function (response) {

                                        $('#modePayementProfilLivraison').modal('hide');
                                        $('#modePayementAdressefacturation').modal('show')


                                            var KurlM = '/carnet-getaddress';

                                            $.ajax({
                                                type: "GET",
                                                url: KurlM,
                                                success: function (response) {
                                                    var carnets = response.carnet[0];

                                                    $ ('#name_surname').val('');
                                                    $('#phonenumber').val('');
                                                    $('#addresses').val('');
                                                     $('#Komplements').val('');
                                                     $('#postal_code').val('');
                                                     $('#Kompany').val('');

                                                    $('#container').empty();

                                                        if(carnets.length == 0){
                                                            $('#container').append(`<div id="liste-carnet-adresse-vide" class="carnet-adresse">
                                                                    <div class="vous-navez-pas-dad">
                                                                        <span>Vous n'avez pas d'adresses enregistrées</span>
                                                                    </div>
                                                                </div>`)
                                                        }else {
                                                            $.each(carnets, function(key, carnet){
                                                                $('#container').append(`
                                                                <section style="padding:12px;">
                                                                    <article class="mesaddresses" style="margin-top:0px;">
                                                                        <input type="radio" value="${carnet.id}" onclick="getRadio(${carnet.id})" name="Useraddresse" class="form-check-input micheck2" id="check1">
                                                                        <aside class="labeldiv">
                                                                            <label class="labelcheck" for="check1"><b>${carnet.prenom_nom},</b>  ${carnet.portable},    ${carnet.adresse}, ${carnet.nom_entreprise}</label>
                                                                        </aside>
                                                                    </article>
                                                                </section>`);
                                                            });
                                                        } // fin else
                                                },
                                            });

                                    },

                                });   // FIN AJAX CALL




                    }

                });

        });


</script>
