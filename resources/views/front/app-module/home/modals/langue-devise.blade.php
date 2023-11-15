<?php

    if (session_status() == PHP_SESSION_NONE) {
        session_start();
    }

    $monPays = \App\Models\Pays::getPays();
    $pays = \App\Models\Pays::possibles();
    $langues = \App\Models\Langue::possibles();
    $devises = \App\Models\Devise::possibles();

    if (isset($_SESSION['config']) && !empty($_SESSION['config']) && count($_SESSION['config']) > 0){
        if (isset($_SESSION['config']['user-langue']) && !empty($_SESSION['config']['user-langue'])) {$maLangue = $_SESSION['config']['user-langue'];} else {$maLangue = []; }
        if (isset($_SESSION['config']['user-ville']) && !empty($_SESSION['config']['user-ville'])) {$maVille = $_SESSION['config']['user-ville'];} else {$maVille = []; }
        if (isset($_SESSION['config']['user-province']) && !empty($_SESSION['config']['user-province'])) {$maProvince = $_SESSION['config']['user-province'];} else {$maProvince = []; }
        if (isset($_SESSION['config']['user-devise']) && !empty($_SESSION['config']['user-devise'])) {$maDevise = $_SESSION['config']['user-devise'];} else {$maDevise = []; }
    }
    else{
        $maLangue = [];
        $maVille = [];
        $maProvince = [];
        $maDevise = [];
    }

    $maPosition = $_SESSION['config']['ma-position'];

?>

<style>
    .langue-devise-element {
        width: 95%;
        position: relative;
        margin-left: auto;
        margin-right: auto;
    }
</style>
<div class="modal fade" id="modalLangueDevise" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered d-flex justify-content-center">
        <div class="modal-content choisir-langue-modal-content" style="height: 439px !important; width: 432px">
            
            <button type="button" class="close-btn close-btn-langue-mobile" id="changeDevise_modal-closes" onclick="closeMarcheModal2()" data-dismiss="modal" aria-label="Close">
                <img src="{{ asset('assets/images/close-btn.svg') }}" alt="">
            </button>

            <div class="modal-header d-block" style="height: 85px; padding: 25px 0 15px 0 !important;">
                <p class="my-modal-header-text d-block text-center p-0 m-0">Choix de la langue/Devise</p>
                <p class="my-modal-header-subtext d-block text-center p-0 m-0 my-modal-header-subtext-helper" style="margin-top: 5px !important;">Paramétrez votre pays, votre langue, et la devise que vous utilisez.</p>
            </div>
            <div class="modal-body my-0 py-0">

                <div id="changeDevise_form" class="langue-devise-element">
                    <form action="{{ url('change-devise')  }}" method="post" id="changeDevise_myform" data-tpost="async">

                        @csrf
                        <div class="row">

                            <div class="col-12">
                                <div class="m-0 p-0" style="margin-top: 15px !important;">
                                    <label for="" class="mon-label m-0 p-0">Région</label>
                                    <div class="my-select-img">
                                        <div class='parent-0 select-main-div my-form-field pl-0 bg-x' data-ul-id='#id1' data-value="{{ $monPays->id }}">
                                            <div disabled class='select-main-div-img with-border'><img src='{{ \App\Models\Pays::getImage2($maPosition['images']) }}' alt=''></div>
                                            <div class='select-main-div-text'>{{ $maPosition['nom_fr_fr'] }}</div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-12">
                                <div class="m-0 p-0" style="margin-top: 15px !important;">
                                    <label for="" class="mon-label m-0 p-0">Langue</label>

                                    <select name="changeDevise_langue" id="changeDevise_langue-input" class="select-with-image my-form-field my-select1">
                                        @foreach($langues as $langue)
                                            <option @if(count($maLangue) > 0 && $maLangue['id'] == $langue->id) selected @endif value="{{ $langue->id }}">{{ $langue->libelle }}</option>
                                        @endforeach
                                    </select>
                                    <div id="changeDevise_langue-error" class="formLogin_error-text error-text error-msg"></div>
                                </div>
                            </div>

                            <div class="col-12">
                                <div class="m-0 p-0" style="margin-top: 15px !important;">
                                    <label for="" class="mon-label m-0 p-0">Dévise</label>
                                     <select name="changeDevise_devise" id="changeDevise_devise-input" class="my-form-field my-select1">
                                        @foreach($devises as $devise)
                                            <option @if(count($maDevise) > 0 && $maDevise['id'] == $devise->id) selected @endif value="{{ $devise->id }}">{{ $devise->libelle }}</option>
                                        @endforeach
                                    </select>
                                    <div id="changeDevise_devise-error" class="formLogin_error-text error-text error-msg"></div>
                                </div>
                            </div>
                            
                        </div>
                        <div class="d-flex justify-content-between" style="margin-top: 50px; margin-bottom: 25px;">
                            <button type="reset" class="btn1 btn-white btn-annuler-langue-devise" onclick="closeMarcheModal2()" style="height: 37px; width: 194px;">Annuler</button>

                            <button type="submit" class="btn1 mon-btn-primary btn-accepter-langue-devise" id="changeDevices" style="height: 37px; width: 194px; margin-right:5px; border:transparent">J'accepte</button>
                        </div>
                    </form>
                </div>

                <div class="form-loader d-none" id="changeDevise_form-loader" data-formkey="changeDevise_"></div>

            </div>
        </div>
    </div>
</div>


<script>

        jQuery(document).ready(function () {


                $(document).on('click', '#changeDevices', function (e) {
                    e.preventDefault();

                    data = {
                        'devise':$('#changeDevise_devise-input').val(),
                        'langue':$('#changeDevise_langue-input').val(),
                    }


                     var url = '/change-devise';

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
                        success: function (response) {
                                $('#modalLangueDevise').modal('hide')
                                $('#modalLangueDevise').remove();

                                if(response.status === 200){
                                //$('#modalLangueDevise').remove();
                                sessionStorage.removeItem("devises"); // remove actual session
                                _.each(response.devize[0], function(model){
                                    var myDevise =model.code;
                                     sessionStorage.setItem("devises",  myDevise) // reset session
                                });
                                    $('#currency').text('');
                                    $('#inputGroup-sizing').text('');
                                    $('#currency2').text('');
                                    $('#currency3').text('');
                                    $('#currency4').text('');
                                    var DevisesUsers = sessionStorage.getItem("devises");
                                    $('#currency').text(DevisesUsers);
                                    $('#inputGroup-sizing').text(DevisesUsers);
                                    $('#currency2').text(DevisesUsers);
                                    $('#currency3').text(DevisesUsers);
                                    $('#currency4').text(DevisesUsers);
                            }


                            }
                        // }
                    })// FIN AJAX
                })

        });

</script>
