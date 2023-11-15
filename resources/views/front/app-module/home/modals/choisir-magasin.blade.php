<?php $i=0; ?>
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

    .ripple {
        background-position: center;
        transition: background 600ms;
    }
    .ripple:hover {
        background: #2C3EDD radial-gradient(circle, transparent 1%, #1A7EF5 1%) center/15000%;
        background-color: #146FDA !important;
    }
    .ripple:active {
        background-color: #6eb9f7;
        background-size: 100%;
        transition: background 0s;
        box-shadow: none;
    }

    .ripple:focus {
        outline: none;
        box-shadow: none;
    }


</style>

<div class="modal fade" id="modalChoisirMagasin" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered d-flex justify-content-center" style="z-index: 110 !important">
        <div class="modal-content choisir-mag-modal-content" style="width: 432px; height: 351px" style="z-index: 110 !important">
            <button onclick="closeMarcheModal2()" type="button" class="close-btn" data-dismiss="modal" style="position:absolute; right: -11px; top: -18px" id="formChangeBoutique_modal-close" aria-label="Close">
                <img src="{{ asset('assets/images/close-btn.svg') }}" alt="">
            </button>
            <div class="modal-header p-0 m-0 justify-content-center" style="height: 64px" onclick="closeSelect('#formChangeBoutique_pays-select')">
                <div class="d-flex justify-content-center">
                    <div style="padding: 20px 9px 6px 0;">
                        <img src="{{ asset('assets/images/market_bleu.svg') }}" alt="" width="17px" height="17px">
                    </div>
                    <div class="">
                        <p class="my-modal-header-text">Choisir mon marché</p>
                    </div>
                </div>
            </div>

            <div class="modal-body" style="padding: 15px 15px 0 15px !important;">
                <div class="choisir-boutique-texte" style="padding: 0 23px !important;" onclick="closeSelect('#formChangeBoutique_pays-select')">
                    Avantage N°1 :
                    <p>Voir les disponibilités des produits dans votre magasin.</p>
                    Avantage N°2 :
                    <p>
                        Accéder rapidement au produit dans votre région pour
                        pouvoir etre livré encore plus vite.
                    </p>
                </div>


                <form action="{{ url('changer-boutique') }}" method="post" data-tpost="async" id="formChangeBoutique_myform" data-btn="#formChangeBoutique_submitBtn">
                    @csrf
                    <div class="row choisir-mag-form" style="position: relative; left: -10px;">
                        <div class="col-6 choisir-magazin-input-1" style="position: relative;">
                            <div class="form-group mb-1" style="position: relative; left: 10px">
                                <input
                                    data-position="{{ $maPosition['id'] }}"
                                    type="hidden"
                                    name="formChangeBoutique_pays"
                                    id="formChangeBoutique_pays"
                                    value="{{ $monPays->id }}"
                                    data-select="#formChangeBoutique_city-input"
                                    data-load="1"
                                    data-csrf="{{ csrf_token() }}"
                                    data-form-key="formChangeBoutique_"
                                    data-url="{{ url('city-list') }}"
                                    data-btnId="#formChangeBoutique_submitBtn"
                                >
                                <div class="my-select-img bg-simple-grey" id="formChangeBoutique_pays-input" style="width: 194px !important">
                                    <div class='parent-0 select-main-div my-form-field pl-0' data-ul-id='#id3' id="formChangeBoutique_pays-select" data-opened="0" style="overflow: hidden; width: 194px !important">
                                        <div class='select-main-div-img with-border' id="id3-main-img"><img src='{{ $monPays->getImage() }}' alt=''></div>
                                        <div class='select-main-div-text'>{{ $monPays->nom_fr_fr }}</div>
                                    </div>
                                    <ul class='select-ul' id='id3' style="width: 194px !important;" data-opened="0">
                                        @foreach($pays as $pay)
                                            <li class='select-li' id="formChangeBoutique_select-li-{{ $pay->id }}" data-value='{{ $pay->id }}' data-input='#formChangeBoutique_pays' data-text="{{ $pay->nom_fr_fr }}">
                                                <div class='select-second-div'>
                                                    <div class='select-main-div-img'><img src='{{ $pay->getImage() }}' alt=''></div>
                                                    <div class='select-main-div-text'>{{ $pay->nom_fr_fr }}</div>
                                                    <div class='selected-li'></div>
                                                </div>
                                            </li>
                                        @endforeach
                                    </ul>
                                </div>
                                <div id='formChangeBoutique_pays-error' class="formChangeBoutique_error-text error-text error-msg"></div>
                            </div>
                        </div>
                        <div class="col-6 choisir-magazin-input-2">
                            <div class="form-group " onclick="closeSelect('#formChangeBoutique_pays-select')" style="position: relative; width: 194px !important; z-index: 2000">
                                <select @if ($maPosition['id'] != $_SESSION['config']['user-pays']) disabled @endif data-default-city="{{ $maPosition['states']['0']['cities'][0]['id'] }}" name="formChangeBoutique_city" id="formChangeBoutique_city-input" style="width: 194px !important; z-index: 2000" class="my-select my-form-field" aria-label="" onchange="marcherChanged()">
                                    @if ($maPosition['id'] == $_SESSION['config']['user-pays'])
                                        @foreach($maPosition['country']['cities'] as $city)
                                            <option @if(isset($maProvince['cities'][0]) && count($maProvince['cities'][0]) > 0 && $maProvince['cities'][0]['id'] == $city['id'])
                                                    selected <?php $i = 1?>
                                                    @elseif (isset($maPosition['states'][0]['cities'][0]) && !empty($maPosition['states'][0]['cities'][0]) && $maPosition['states'][0]['cities'][0]['id'] == $city['id'] && $i == 0)
                                                    selected
                                                    @endif value="{{ $city['id'] }}">
                                                {{ $city['name'] }}
                                            </option>
                                        @endforeach
                                    @else
                                        <option selected value="{{ $maProvince['cities'][0]['id'] }}">{{ $maProvince['cities'][0]['name'] }}</option>
                                    @endif
                                </select>
                                <div id="formChangeBoutique_city-error" class="formChangeBoutique_error-text error-text error-msg"></div>
                            </div>
                        </div>
                        <button class="btn btn-primary" type="submit" id="formChangeBoutique_submit-btn" hidden>Continuer</button>
                    </div>
                </form>
                <div class="d-flex justify-content-end" onclick="closeSelect('#formChangeBoutique_pays-select')">
                    <div class="change-magasin-message">
                        @if((isset($_SESSION['config']['ma-position']['states'][0]['cities'][0]) && count($_SESSION['config']['ma-position']['states'][0]['cities'][0]) > 0 && $_SESSION['config']['ma-position']['states'][0]['cities'][0]['id'] == $maProvince['cities'][0]['id']) && ($monPays->id == $maPosition['id']))
                            <span>Marché par defaut</span>
                        @else
                            <span>Marché personnalisé</span>
                        @endif
                    </div>
                </div>
            </div>


            <div onclick="closeSelect('#formChangeBoutique_pays-select')" class="d-flex justify-content-center modal-footer-btn" style="margin-bottom: 25px !important; margin-top: 30px !important;">
                <button id="btn-element-marche" type="button"
                       style="background-color:#1A7EF5;color:white;" class="btn mon-btn-primary btn-accepter-langue-devise ripple"
                        onclick="document.getElementById('formChangeBoutique_submit-btn').click()"
                >Continuer
                </button>
            </div>

        </div>
    </div>
</div>
</div>
