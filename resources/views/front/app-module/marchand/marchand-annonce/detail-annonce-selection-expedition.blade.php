

    <style>
        @import url('https://fonts.googleapis.com/css2?family=Roboto&display=swap');
        .modal-content-detail-annonce-selection-expe,
        .modal-body-detail-annonce-selection-expe {
            height: 441px!important;
            width: 584px!important;
            border-radius: 6px;
            background-color: #FFFFFF;

            position: relative;
            float: left;
            left: -50px;

            border: 1px solid #979797;
            border-radius: 6px;
            background-color: #FFFFFF;
            box-shadow: 0 5px 15px 0 rgba(0,0,0,0.5);
        }

        #dtServiceExpe {
            /* width: 800px !important; */
            height: 441px !important;
            width: 584px !important;
        }



        .modal-body {
            margin: 0px;
            padding: 0px;
        }

        .modal-dialog-detail-annonce-selection-expe {

            position: relative;
            top: 300px;
            border: 1px solid #979797;
            border-radius: 6px;
            background-color: #FFFFFF;
            box-shadow: 0 5px 15px 0 rgba(0,0,0,0.5);

            /* left: 500px;
            float: left; */
        }

        #form {
            color: #191970;
            font-family: Roboto;
            font-size: 14px;
            letter-spacing: -0.36px;
            line-height: 16px;
            padding: 10px
        }

        #form-select {
            color: #4A4A4A;
            font-family: Roboto;
            font-size: 14px;
            letter-spacing: -0.34px;
            line-height: 16px;
        }


    </style>

        <!-- The Modal -->
        <div class="modal" id="dtServiceExpeK">
            <div class="modal-dialog modal-dialog-detail-annonce-expe">
                <div class="modal-content modal-content-detail-annonce-selection-expe">
                    <section style="height: 39px;
                         width: 584px;
                         border: 1px solid #979797;
                         border-radius: 6px 6px 0 0;
                         background-color: #FFFFFF;
                       border:1px solid #D8D8D8;
                       "> <p style="   color: #191970;
                    font-family: Roboto;
                    font-size: 14px;
                    font-weight: 500;
                    letter-spacing: 0.31px;
                    line-height: 18px;
                    text-align: center;margin-top:10px;
                    ">Modifier les lieux d’expédition exclus
                    </p>

                </section>

                <aside style="   height: 31px;
                width: 553px;

                border: 1px solid #979797;
                border-bottom: 0px;
                margin-left:0px;
                margin-top:0px;
                border-radius: 6px 6px 0 0;
                background-color: #F8F8F8;
                margin-left:15px;margin-top:10px;
              "> <p style="color: #000000;
                font-family: Roboto;
                font-size: 12px;
                font-weight: 500;
                letter-spacing: 0.26px;
                line-height: 14px;text-align:center;margin-top:8px;">Sélectionnez les zones géographiques / les pays vers lesquels vous n'envoyez pas d'articles</p></aside>
                <style>
                    .pays_list_container {
                        height: 193px;
                        overflow-y: auto;
                        width: 553px;
                        border: 1px solid #979797;
                        background-color: #FFFFFF;
                        margin-left: 15px;
                        display: flex;
                        column-gap: 27px;
                        padding-top: 12px;
                    }

                    .pays_exclu_left {
                        /* height: 120px; */
                        width: 273px;
                        /* background-color: #1A7EF5; */
                        margin-left: 30px;
                    }

                    .pays_exclu_right {
                        /* height: 95px; */
                        width: 193px;
                        /* background-color: #ccc; */
                    }

                    .pays_exclu_left label {
                        height: 16px;
                        font-family: Roboto;
                        font-size: 14px;
                        letter-spacing: 0.31px;
                        line-height: 16px;
                    }

                    .pays_exclu_right label {
                        height: 16px;
                        font-family: Roboto;
                        font-size: 14px;
                        letter-spacing: 0.31px;
                        line-height: 16px;
                    }

                    .pays_exclu_left a {
                        text-decoration: none;
                    }

                    .pays_exclu_left a:hover {
                        text-decoration-line: underline;
                    }

                    .pays_exclu_right a {
                        text-decoration: none;
                    }

                    .pays_exclu_right a:hover {
                        text-decoration-line: underline;
                    }

                </style>

                <div id="checkboxes" class="pays_list_container country_to_expulse" style="">

                    <div class="pays_exclu_left">
                        <div>
                            <label style="margin: 0px; padding: 0px; line-height: 20px">
                                <input style="width: 18px; height: 18px; margin: 0px; margin-right: 10px" class="form-check-input"  type="checkbox" id="pays1" value="Afrique" data-check = "1">Afrique <a href="#" onclick="showContinentPay(1)">(pays)</a>
                            </label>
                        </div>
                        {{-- ---------------------------------- pays africains --}}
                        <div class="pays-continent s-none" style="width: 190px; height: auto; padding-top: 10px; padding-left: 15px" id="continent1">

                            <div>
                                <label style="margin: 0px; padding: 0px; line-height: 20px">
                                    <input style="width: 18px; height: 18px; margin: 0px; margin-right: 10px" class="form-check-input"  type="checkbox" id="pays11" value="Algérie" data-check = "11">Algérie
                                </label>
                            </div>

                            <div style="margin-top: 5px">
                                <label style="margin: 0px; padding: 0px; line-height: 20px">
                                    <input style="width: 18px; height: 18px; margin: 0px; margin-right: 10px" class="form-check-input"  type="checkbox" id="pays12" value="Angola" data-check = "12">Angola
                                </label>
                            </div>
                            <div style="margin-top: 5px">
                                <label style="margin: 0px; padding: 0px; line-height: 20px">
                                    <input style="width: 18px; height: 18px; margin: 0px; margin-right: 10px" class="form-check-input"  type="checkbox" id="pays13" value="Bénin" data-check = "13">Bénin
                                </label>
                            </div>
                            <div style="margin-top: 5px">
                                <label style="margin: 0px; padding: 0px; line-height: 20px">
                                    <input style="width: 18px; height: 18px; margin: 0px; margin-right: 10px" class="form-check-input"  type="checkbox" id="pays14" value="Botswana" data-check = "14">Botswana
                                </label>
                            </div>
                            <div style="margin-top: 5px">
                                <label style="margin: 0px; padding: 0px; line-height: 20px">
                                    <input style="width: 18px; height: 18px; margin: 0px; margin-right: 10px" class="form-check-input"  type="checkbox" id="pays15" value="Burkina Faso" data-check = "15">Burkina Faso
                                </label>
                            </div>
                            <div style="margin-top: 5px">
                                <label style="margin: 0px; padding: 0px; line-height: 20px">
                                    <input style="width: 18px; height: 18px; margin: 0px; margin-right: 10px" class="form-check-input"  type="checkbox" id="pays16" value="Burundi" data-check = "16">Burundi
                                </label>
                            </div>
                            <div style="margin-top: 5px">
                                <label style="margin: 0px; padding: 0px; line-height: 20px">
                                    <input style="width: 18px; height: 18px; margin: 0px; margin-right: 10px" class="form-check-input"  type="checkbox" id="pays17" value="Cameroun" data-check = "17">Cameroun
                                </label>
                            </div>
                            <div style="margin-top: 5px">
                                <label style="margin: 0px; padding: 0px; line-height: 20px">
                                    <input style="width: 18px; height: 18px; margin: 0px; margin-right: 10px" class="form-check-input"  type="checkbox" id="pays18" value="Îles du Cap-Vert" data-check = "18">Îles du Cap-Vert
                                </label>
                            </div>
                            <div style="margin-top: 5px">
                                <label style="margin: 0px; padding: 0px; line-height: 20px">
                                    <input style="width: 18px; height: 18px; margin: 0px; margin-right: 10px" class="form-check-input"  type="checkbox" id="pays19" value="République centrafricaine" data-check = "19">Rép. centrafricaine
                                </label>
                            </div>
                            <div style="margin-top: 5px">
                                <label style="margin: 0px; padding: 0px; line-height: 20px">
                                    <input style="width: 18px; height: 18px; margin: 0px; margin-right: 10px" class="form-check-input"  type="checkbox" id="pays110" value="Tchad" data-check = "110">Tchad
                                </label>
                            </div>
                            <div style="margin-top: 5px">
                                <label style="margin: 0px; padding: 0px; line-height: 20px">
                                    <input style="width: 18px; height: 18px; margin: 0px; margin-right: 10px" class="form-check-input"  type="checkbox" id="pays111" value="Comores" data-check = "111">Comores
                                </label>
                            </div>
                            <div style="margin-top: 5px">
                                <label style="margin: 0px; padding: 0px; line-height: 20px">
                                    <input style="width: 18px; height: 18px; margin: 0px; margin-right: 10px" class="form-check-input"  type="checkbox" id="pays112" value="République démocratique du Congo" data-check = "112">Congo-Kinshasa
                                </label>
                            </div>
                            <div style="margin-top: 5px">
                                <label style="margin: 0px; padding: 0px; line-height: 20px">
                                    <input style="width: 18px; height: 18px; margin: 0px; margin-right: 10px" class="form-check-input"  type="checkbox" id="pays113" value="Congo" data-check = "113">Congo-Brazzaville
                                </label>
                            </div>
                            <div style="margin-top: 5px">
                                <label style="margin: 0px; padding: 0px; line-height: 20px">
                                    <input style="width: 18px; height: 18px; margin: 0px; margin-right: 10px" class="form-check-input"  type="checkbox" id="pays114" value="Côte d’Ivoire" data-check = "114">Côte d’Ivoire
                                </label>
                            </div>
                            <div style="margin-top: 5px">
                                <label style="margin: 0px; padding: 0px; line-height: 20px">
                                    <input style="width: 18px; height: 18px; margin: 0px; margin-right: 10px" class="form-check-input"  type="checkbox" id="pays115" value="Djibouti" data-check = "115">Djibouti
                                </label>
                            </div>
                            <div style="margin-top: 5px">
                                <label style="margin: 0px; padding: 0px; line-height: 20px">
                                    <input style="width: 18px; height: 18px; margin: 0px; margin-right: 10px" class="form-check-input"  type="checkbox" id="pays116" value="Égypte" data-check = "116">Égypte
                                </label>
                            </div>
                            <div style="margin-top: 5px">
                                <label style="margin: 0px; padding: 0px; line-height: 20px">
                                    <input style="width: 18px; height: 18px; margin: 0px; margin-right: 10px" class="form-check-input"  type="checkbox" id="pays117" value="Guinée équatoriale" data-check = "117">Guinée équatoriale
                                </label>
                            </div>
                            <div style="margin-top: 5px">
                                <label style="margin: 0px; padding: 0px; line-height: 20px">
                                    <input style="width: 18px; height: 18px; margin: 0px; margin-right: 10px" class="form-check-input"  type="checkbox" id="pays118" value="Érythrée" data-check = "118">Érythrée
                                </label>
                            </div>
                            <div style="margin-top: 5px">
                                <label style="margin: 0px; padding: 0px; line-height: 20px">
                                    <input style="width: 18px; height: 18px; margin: 0px; margin-right: 10px" class="form-check-input"  type="checkbox" id="pays119" value="Éthiopie" data-check = "119">Éthiopie
                                </label>
                            </div>
                            <div style="margin-top: 5px">
                                <label style="margin: 0px; padding: 0px; line-height: 20px">
                                    <input style="width: 18px; height: 18px; margin: 0px; margin-right: 10px" class="form-check-input"  type="checkbox" id="pays120" value="Gabon" data-check = "120">Gabon
                                </label>
                            </div>
                            <div style="margin-top: 5px">
                                <label style="margin: 0px; padding: 0px; line-height: 20px">
                                    <input style="width: 18px; height: 18px; margin: 0px; margin-right: 10px" class="form-check-input"  type="checkbox" id="pays121" value="Gambie" data-check = "121">Gambie
                                </label>
                            </div>
                            <div style="margin-top: 5px">
                                <label style="margin: 0px; padding: 0px; line-height: 20px">
                                    <input style="width: 18px; height: 18px; margin: 0px; margin-right: 10px" class="form-check-input"  type="checkbox" id="pays122" value="Ghana" data-check = "122">Ghana
                                </label>
                            </div>
                            <div style="margin-top: 5px">
                                <label style="margin: 0px; padding: 0px; line-height: 20px">
                                    <input style="width: 18px; height: 18px; margin: 0px; margin-right: 10px" class="form-check-input"  type="checkbox" id="pays123" value="Guinée" data-check = "123">Guinée
                                </label>
                            </div>
                            <div style="margin-top: 5px">
                                <label style="margin: 0px; padding: 0px; line-height: 20px">
                                    <input style="width: 18px; height: 18px; margin: 0px; margin-right: 10px" class="form-check-input"  type="checkbox" id="pays124" value="Guinée-Bissau" data-check = "124">Guinée-Bissau
                                </label>
                            </div>
                            <div style="margin-top: 5px">
                                <label style="margin: 0px; padding: 0px; line-height: 20px">
                                    <input style="width: 18px; height: 18px; margin: 0px; margin-right: 10px" class="form-check-input"  type="checkbox" id="pays125" value="Kenya" data-check = "125">Kenya
                                </label>
                            </div>
                            <div style="margin-top: 5px">
                                <label style="margin: 0px; padding: 0px; line-height: 20px">
                                    <input style="width: 18px; height: 18px; margin: 0px; margin-right: 10px" class="form-check-input"  type="checkbox" id="pays126" value="Lesotho" data-check = "126">Lesotho
                                </label>
                            </div>
                            <div style="margin-top: 5px">
                                <label style="margin: 0px; padding: 0px; line-height: 20px">
                                    <input style="width: 18px; height: 18px; margin: 0px; margin-right: 10px" class="form-check-input"  type="checkbox" id="pays127" value="Libéria" data-check = "127">Libéria
                                </label>
                            </div>
                            <div style="margin-top: 5px">
                                <label style="margin: 0px; padding: 0px; line-height: 20px">
                                    <input style="width: 18px; height: 18px; margin: 0px; margin-right: 10px" class="form-check-input"  type="checkbox" id="pays128" value="Libye" data-check = "128">Libye
                                </label>
                            </div>
                            <div style="margin-top: 5px">
                                <label style="margin: 0px; padding: 0px; line-height: 20px">
                                    <input style="width: 18px; height: 18px; margin: 0px; margin-right: 10px" class="form-check-input"  type="checkbox" id="pays129" value="Madagascar" data-check = "129">Madagascar
                                </label>
                            </div>
                            <div style="margin-top: 5px">
                                <label style="margin: 0px; padding: 0px; line-height: 20px">
                                    <input style="width: 18px; height: 18px; margin: 0px; margin-right: 10px" class="form-check-input"  type="checkbox" id="pays130" value="Malawi" data-check = "130">Malawi
                                </label>
                            </div>
                            <div style="margin-top: 5px">
                                <label style="margin: 0px; padding: 0px; line-height: 20px">
                                    <input style="width: 18px; height: 18px; margin: 0px; margin-right: 10px" class="form-check-input"  type="checkbox" id="pays131" value="Mali" data-check = "131">Mali
                                </label>
                            </div>
                            <div style="margin-top: 5px">
                                <label style="margin: 0px; padding: 0px; line-height: 20px">
                                    <input style="width: 18px; height: 18px; margin: 0px; margin-right: 10px" class="form-check-input"  type="checkbox" id="pays132" value="Mauritanie" data-check = "132">Mauritanie
                                </label>
                            </div>
                            <div style="margin-top: 5px">
                                <label style="margin: 0px; padding: 0px; line-height: 20px">
                                    <input style="width: 18px; height: 18px; margin: 0px; margin-right: 10px" class="form-check-input"  type="checkbox" id="pays133" value="Maurice" data-check = "133">Maurice
                                </label>
                            </div>
                            <div style="margin-top: 5px">
                                <label style="margin: 0px; padding: 0px; line-height: 20px">
                                    <input style="width: 18px; height: 18px; margin: 0px; margin-right: 10px" class="form-check-input"  type="checkbox" id="pays134" value="Mayotte" data-check = "134">Mayotte
                                </label>
                            </div>
                            <div style="margin-top: 5px">
                                <label style="margin: 0px; padding: 0px; line-height: 20px">
                                    <input style="width: 18px; height: 18px; margin: 0px; margin-right: 10px" class="form-check-input"  type="checkbox" id="pays135" value="Maroc" data-check = "135">Maroc
                                </label>
                            </div>
                            <div style="margin-top: 5px">
                                <label style="margin: 0px; padding: 0px; line-height: 20px">
                                    <input style="width: 18px; height: 18px; margin: 0px; margin-right: 10px" class="form-check-input"  type="checkbox" id="pays136" value="Mozambique" data-check = "136">Mozambique
                                </label>
                            </div>
                            <div style="margin-top: 5px">
                                <label style="margin: 0px; padding: 0px; line-height: 20px">
                                    <input style="width: 18px; height: 18px; margin: 0px; margin-right: 10px" class="form-check-input"  type="checkbox" id="pays137" value="Namibie" data-check = "137">Namibie
                                </label>
                            </div>
                            <div style="margin-top: 5px">
                                <label style="margin: 0px; padding: 0px; line-height: 20px">
                                    <input style="width: 18px; height: 18px; margin: 0px; margin-right: 10px" class="form-check-input"  type="checkbox" id="pays138" value="Niger" data-check = "138">Niger
                                </label>
                            </div>
                            <div style="margin-top: 5px">
                                <label style="margin: 0px; padding: 0px; line-height: 20px">
                                    <input style="width: 18px; height: 18px; margin: 0px; margin-right: 10px" class="form-check-input"  type="checkbox" id="pays139" value="Nigéria" data-check = "139">Nigéria
                                </label>
                            </div>
                            <div style="margin-top: 5px">
                                <label style="margin: 0px; padding: 0px; line-height: 20px">
                                    <input style="width: 18px; height: 18px; margin: 0px; margin-right: 10px" class="form-check-input"  type="checkbox" id="pays140" value="Réunion" data-check = "140">Réunion
                                </label>
                            </div>
                            <div style="margin-top: 5px">
                                <label style="margin: 0px; padding: 0px; line-height: 20px">
                                    <input style="width: 18px; height: 18px; margin: 0px; margin-right: 10px" class="form-check-input"  type="checkbox" id="pays141" value="Rwanda" data-check = "141">Rwanda
                                </label>
                            </div>
                            <div style="margin-top: 5px">
                                <label style="margin: 0px; padding: 0px; line-height: 20px">
                                    <input style="width: 18px; height: 18px; margin: 0px; margin-right: 10px" class="form-check-input"  type="checkbox" id="pays142" value="Sainte-Hélène" data-check = "142">Sainte-Hélène
                                </label>
                            </div>
                            <div style="margin-top: 5px">
                                <label style="margin: 0px; padding: 0px; line-height: 20px">
                                    <input style="width: 18px; height: 18px; margin: 0px; margin-right: 10px" class="form-check-input"  type="checkbox" id="pays143" value="Sénégal" data-check = "143">Sénégal
                                </label>
                            </div>
                            <div style="margin-top: 5px">
                                <label style="margin: 0px; padding: 0px; line-height: 20px">
                                    <input style="width: 18px; height: 18px; margin: 0px; margin-right: 10px" class="form-check-input"  type="checkbox" id="pays144" value="Seychelles" data-check = "144">Seychelles
                                </label>
                            </div>
                            <div style="margin-top: 5px">
                                <label style="margin: 0px; padding: 0px; line-height: 20px">
                                    <input style="width: 18px; height: 18px; margin: 0px; margin-right: 10px" class="form-check-input"  type="checkbox" id="pays145" value="Sierra Leone" data-check = "145">Sierra Leone
                                </label>
                            </div>
                            <div style="margin-top: 5px">
                                <label style="margin: 0px; padding: 0px; line-height: 20px">
                                    <input style="width: 18px; height: 18px; margin: 0px; margin-right: 10px" class="form-check-input"  type="checkbox" id="pays146" value="Somalie" data-check = "146">Somalie
                                </label>
                            </div>
                            <div style="margin-top: 5px">
                                <label style="margin: 0px; padding: 0px; line-height: 20px">
                                    <input style="width: 18px; height: 18px; margin: 0px; margin-right: 10px" class="form-check-input"  type="checkbox" id="pays147" value="Afrique du Sud" data-check = "147">Afrique du Sud
                                </label>
                            </div>
                            <div style="margin-top: 5px">
                                <label style="margin: 0px; padding: 0px; line-height: 20px">
                                    <input style="width: 18px; height: 18px; margin: 0px; margin-right: 10px" class="form-check-input"  type="checkbox" id="pays148" value="Swaziland" data-check = "148">Swaziland
                                </label>
                            </div>
                            <div style="margin-top: 5px">
                                <label style="margin: 0px; padding: 0px; line-height: 20px">
                                    <input style="width: 18px; height: 18px; margin: 0px; margin-right: 10px" class="form-check-input"  type="checkbox" id="pays149" value="Tanzanie" data-check = "149">Tanzanie
                                </label>
                            </div>
                            <div style="margin-top: 5px">
                                <label style="margin: 0px; padding: 0px; line-height: 20px">
                                    <input style="width: 18px; height: 18px; margin: 0px; margin-right: 10px" class="form-check-input"  type="checkbox" id="pays150" value="Togo" data-check = "150">Togo
                                </label>
                            </div>
                            <div style="margin-top: 5px">
                                <label style="margin: 0px; padding: 0px; line-height: 20px">
                                    <input style="width: 18px; height: 18px; margin: 0px; margin-right: 10px" class="form-check-input"  type="checkbox" id="pays151" value="Tunisie" data-check = "151">Tunisie
                                </label>
                            </div>
                            <div style="margin-top: 5px">
                                <label style="margin: 0px; padding: 0px; line-height: 20px">
                                    <input style="width: 18px; height: 18px; margin: 0px; margin-right: 10px" class="form-check-input"  type="checkbox" id="pays152" value="Ouganda" data-check = "152">Ouganda
                                </label>
                            </div>
                            <div style="margin-top: 5px">
                                <label style="margin: 0px; padding: 0px; line-height: 20px">
                                    <input style="width: 18px; height: 18px; margin: 0px; margin-right: 10px" class="form-check-input"  type="checkbox" id="pays153" value="Sahara occidental" data-check = "153">Sahara occidental
                                </label>
                            </div>
                            <div style="margin-top: 5px">
                                <label style="margin: 0px; padding: 0px; line-height: 20px">
                                    <input style="width: 18px; height: 18px; margin: 0px; margin-right: 10px" class="form-check-input"  type="checkbox" id="pays154" value="Zambie" data-check = "154">Zambie
                                </label>
                            </div>

                            <div style="margin-top: 5px">
                                <label style="margin: 0px; padding: 0px; line-height: 20px">
                                    <input style="width: 18px; height: 18px; margin: 0px; margin-right: 10px" class="form-check-input"  type="checkbox" id="pays155" value="Zambie" data-check = "155">Zimbabwe
                                </label>
                            </div>

                        </div>
                        {{-- ---------------------------------- pays africains fin --}}
                        <div style="margin-top: 10px">
                            <label style="margin: 0px; padding: 0px; line-height: 20px">
                                <input style="width: 18px; height: 18px; margin: 0px; margin-right: 10px" class="form-check-input"  type="checkbox" id="pays2" value="Asie" data-check = "2">Asie <a href="#" onclick="showContinentPay(2)">(pays)</a>
                            </label>
                        </div>
                        {{-- ---------------------------------- pays asiatique--}}
                        <div class="pays-continent s-none" style="width: 190px; height: auto; padding-top: 10px; padding-left: 15px" id="continent2">
                            <div>
                                <label style="margin: 0px; padding: 0px; line-height: 20px">
                                    <input style="width: 18px; height: 18px; margin: 0px; margin-right: 10px" class="form-check-input"  type="checkbox" id="pays21" value="Afghanistan" data-check = "21">Afghanistan
                                </label>
                            </div>
                            <div style="margin-top: 5px">
                                <label style="margin: 0px; padding: 0px; line-height: 20px">
                                    <input style="width: 18px; height: 18px; margin: 0px; margin-right: 10px" class="form-check-input"  type="checkbox" id="pays22" value="Arménie" data-check = "22">Arménie
                                </label>
                            </div>
                            <div style="margin-top: 5px">
                                <label style="margin: 0px; padding: 0px; line-height: 20px">
                                    <input style="width: 18px; height: 18px; margin: 0px; margin-right: 10px" class="form-check-input"  type="checkbox" id="pays23" value="Azerbaïdjan" data-check = "23">Azerbaïdjan
                                </label>
                            </div>
                            <div style="margin-top: 5px">
                                <label style="margin: 0px; padding: 0px; line-height: 20px">
                                    <input style="width: 18px; height: 18px; margin: 0px; margin-right: 10px" class="form-check-input"  type="checkbox" id="pays24" value="Bangladesh" data-check = "24">Bangladesh
                                </label>
                            </div>
                            <div style="margin-top: 5px">
                                <label style="margin: 0px; padding: 0px; line-height: 20px">
                                    <input style="width: 18px; height: 18px; margin: 0px; margin-right: 10px" class="form-check-input"  type="checkbox" id="pays25" value="Bhoutan" data-check = "25">Bhoutan
                                </label>
                            </div>
                            <div style="margin-top: 5px">
                                <label style="margin: 0px; padding: 0px; line-height: 20px">
                                    <input style="width: 18px; height: 18px; margin: 0px; margin-right: 10px" class="form-check-input"  type="checkbox" id="pays26" value="Chine" data-check = "26">Chine
                                </label>
                            </div>
                            <div style="margin-top: 5px">
                                <label style="margin: 0px; padding: 0px; line-height: 20px">
                                    <input style="width: 18px; height: 18px; margin: 0px; margin-right: 10px" class="form-check-input"  type="checkbox" id="pays27" value="Géorgie" data-check = "27">Géorgie
                                </label>
                            </div>
                            <div style="margin-top: 5px">
                                <label style="margin: 0px; padding: 0px; line-height: 20px">
                                    <input style="width: 18px; height: 18px; margin: 0px; margin-right: 10px" class="form-check-input"  type="checkbox" id="pays28" value="Inde" data-check = "28">Inde
                                </label>
                            </div>
                            <div style="margin-top: 5px">
                                <label style="margin: 0px; padding: 0px; line-height: 20px">
                                    <input style="width: 18px; height: 18px; margin: 0px; margin-right: 10px" class="form-check-input"  type="checkbox" id="pays29" value="Japon" data-check = "29">Japon
                                </label>
                            </div>
                            <div style="margin-top: 5px">
                                <label style="margin: 0px; padding: 0px; line-height: 20px">
                                    <input style="width: 18px; height: 18px; margin: 0px; margin-right: 10px" class="form-check-input"  type="checkbox" id="pays210" value="Kazakhstan" data-check = "210">Kazakhstan
                                </label>
                            </div>
                            <div style="margin-top: 5px">
                                <label style="margin: 0px; padding: 0px; line-height: 20px">
                                    <input style="width: 18px; height: 18px; margin: 0px; margin-right: 10px" class="form-check-input"  type="checkbox" id="pays211" value="Kirghizstan" data-check = "211">Kirghizstan
                                </label>
                            </div>
                            <div style="margin-top: 5px">
                                <label style="margin: 0px; padding: 0px; line-height: 20px">
                                    <input style="width: 18px; height: 18px; margin: 0px; margin-right: 10px" class="form-check-input"  type="checkbox" id="pays212" value="Maldives" data-check = "212">Maldives
                                </label>
                            </div>
                            <div style="margin-top: 5px">
                                <label style="margin: 0px; padding: 0px; line-height: 20px">
                                    <input style="width: 18px; height: 18px; margin: 0px; margin-right: 10px" class="form-check-input"  type="checkbox" id="pays213" value="Mongolie" data-check = "213">Mongolie
                                </label>
                            </div>
                            <div style="margin-top: 5px">
                                <label style="margin: 0px; padding: 0px; line-height: 20px">
                                    <input style="width: 18px; height: 18px; margin: 0px; margin-right: 10px" class="form-check-input"  type="checkbox" id="pays214" value="Népal" data-check = "214">Népal
                                </label>
                            </div>
                            <div style="margin-top: 5px">
                                <label style="margin: 0px; padding: 0px; line-height: 20px">
                                    <input style="width: 18px; height: 18px; margin: 0px; margin-right: 10px" class="form-check-input"  type="checkbox" id="pays215" value="Pakistan" data-check = "215">Pakistan
                                </label>
                            </div>
                            <div style="margin-top: 5px">
                                <label style="margin: 0px; padding: 0px; line-height: 20px">
                                    <input style="width: 18px; height: 18px; margin: 0px; margin-right: 10px" class="form-check-input"  type="checkbox" id="pays216" value="Corée du Sud" data-check = "216">Corée du Sud
                                </label>
                            </div>
                            <div style="margin-top: 5px">
                                <label style="margin: 0px; padding: 0px; line-height: 20px">
                                    <input style="width: 18px; height: 18px; margin: 0px; margin-right: 10px" class="form-check-input"  type="checkbox" id="pays217" value="Sri Lanka" data-check = "217">Sri Lanka
                                </label>
                            </div>
                            <div style="margin-top: 5px">
                                <label style="margin: 0px; padding: 0px; line-height: 20px">
                                    <input style="width: 18px; height: 18px; margin: 0px; margin-right: 10px" class="form-check-input"  type="checkbox" id="pays218" value="Tadjikistan" data-check = "218">Tadjikistan
                                </label>
                            </div>
                            <div style="margin-top: 5px">
                                <label style="margin: 0px; padding: 0px; line-height: 20px">
                                    <input style="width: 18px; height: 18px; margin: 0px; margin-right: 10px" class="form-check-input"  type="checkbox" id="pays219" value="Turkménistan" data-check = "219">Turkménistan
                                </label>
                            </div>
                            <div style="margin-top: 5px">
                                <label style="margin: 0px; padding: 0px; line-height: 20px">
                                    <input style="width: 18px; height: 18px; margin: 0px; margin-right: 10px" class="form-check-input"  type="checkbox" id="pays220" value="Ouzbékistan" data-check = "220">Ouzbékistan
                                </label>
                            </div>

                        </div>
                        {{-- ---------------------------------- pays asiatique fin --}}
                        <div style="margin-top: 10px">
                            <label style="margin: 0px; padding: 0px; line-height: 20px">
                                <input style="width: 18px; height: 18px; margin: 0px; margin-right: 10px" class="form-check-input"  type="checkbox" id="pays3" value="Moyen-Orient" data-check = "3">Moyen-Orient <a href="#" onclick="showContinentPay(3)">(pays)</a>
                            </label>
                        </div>
                        {{-- ---------------------------------- pays moyen orient --}}
                        <div class="pays-continent s-none" style="width: 190px; height: auto; padding-top: 10px; padding-left: 15px" id="continent3">
                            <div>
                                <label style="margin: 0px; padding: 0px; line-height: 20px">
                                    <input style="width: 18px; height: 18px; margin: 0px; margin-right: 10px" class="form-check-input"  type="checkbox" id="pays31" value="Bahreïn" data-check = "31">Bahreïn
                                </label>
                            </div>
                            <div style="margin-top: 5px">
                                <label style="margin: 0px; padding: 0px; line-height: 20px">
                                    <input style="width: 18px; height: 18px; margin: 0px; margin-right: 10px" class="form-check-input"  type="checkbox" id="pays32" value="Liban" data-check = "32">Liban
                                </label>
                            </div>
                            <div style="margin-top: 5px">
                                <label style="margin: 0px; padding: 0px; line-height: 20px">
                                    <input style="width: 18px; height: 18px; margin: 0px; margin-right: 10px" class="form-check-input"  type="checkbox" id="pays33" value="Émirats arabes unis" data-check = "33">Émirats arabes unis
                                </label>
                            </div>
                            <div style="margin-top: 5px">
                                <label style="margin: 0px; padding: 0px; line-height: 20px">
                                    <input style="width: 18px; height: 18px; margin: 0px; margin-right: 10px" class="form-check-input"  type="checkbox" id="pays34" value="Irak" data-check = "34">Irak
                                </label>
                            </div>
                            <div style="margin-top: 5px">
                                <label style="margin: 0px; padding: 0px; line-height: 20px">
                                    <input style="width: 18px; height: 18px; margin: 0px; margin-right: 10px" class="form-check-input"  type="checkbox" id="pays35" value="Koweït" data-check = "35">Koweït
                                </label>
                            </div>
                            <div style="margin-top: 5px">
                                <label style="margin: 0px; padding: 0px; line-height: 20px">
                                    <input style="width: 18px; height: 18px; margin: 0px; margin-right: 10px" class="form-check-input"  type="checkbox" id="pays36" value="Israël" data-check = "36">Israël
                                </label>
                            </div>
                            <div style="margin-top: 5px">
                                <label style="margin: 0px; padding: 0px; line-height: 20px">
                                    <input style="width: 18px; height: 18px; margin: 0px; margin-right: 10px" class="form-check-input"  type="checkbox" id="pays37" value="Yémen" data-check = "37">Yémen
                                </label>
                            </div>
                            <div style="margin-top: 5px">
                                <label style="margin: 0px; padding: 0px; line-height: 20px">
                                    <input style="width: 18px; height: 18px; margin: 0px; margin-right: 10px" class="form-check-input"  type="checkbox" id="pays38" value="Jordanie" data-check = "38">Jordanie
                                </label>
                            </div>
                            <div style="margin-top: 5px">
                                <label style="margin: 0px; padding: 0px; line-height: 20px">
                                    <input style="width: 18px; height: 18px; margin: 0px; margin-right: 10px" class="form-check-input"  type="checkbox" id="pays39" value="Oman" data-check = "39">Oman
                                </label>
                            </div>
                            <div style="margin-top: 5px">
                                <label style="margin: 0px; padding: 0px; line-height: 20px">
                                    <input style="width: 18px; height: 18px; margin: 0px; margin-right: 10px" class="form-check-input"  type="checkbox" id="pays310" value="Qatar" data-check = "310">Qatar
                                </label>
                            </div>
                            <div style="margin-top: 5px">
                                <label style="margin: 0px; padding: 0px; line-height: 20px">
                                    <input style="width: 18px; height: 18px; margin: 0px; margin-right: 10px" class="form-check-input"  type="checkbox" id="pays311" value="Arabie saoudite" data-check = "311">Arabie saoudite
                                </label>
                            </div>
                            <div style="margin-top: 5px">
                                <label style="margin: 0px; padding: 0px; line-height: 20px">
                                    <input style="width: 18px; height: 18px; margin: 0px; margin-right: 10px" class="form-check-input"  type="checkbox" id="pays312" value="Turquie" data-check = "312">Turquie
                                </label>
                            </div>

                        </div>
                        {{-- ---------------------------------- pays moyen orient fin --}}
                        <div style="margin-top: 10px">
                            <label style="margin: 0px; padding: 0px; line-height: 20px">
                                <input style="width: 18px; height: 18px; margin: 0px; margin-right: 10px" class="form-check-input"  type="checkbox" id="pays4" value="Amérique Centrale et Caraïbes" data-check = "4">Amérique Centrale et Caraïbes  <a href="#" onclick="showContinentPay(4)">(pays)</a>
                            </label>
                        </div>
                         {{-- ---------------------------------- pays amerique central --}}
                         <div class="pays-continent s-none" style="width: 190px; height: auto; padding-top: 10px; padding-left: 15px" id="continent4">
                            <div>
                                <label style="margin: 0px; padding: 0px; line-height: 20px">
                                    <input style="width: 18px; height: 18px; margin: 0px; margin-right: 10px" class="form-check-input"  type="checkbox" id="pays41" value="Anguilla" data-check = "41">Anguilla
                                </label>
                            </div>
                            <div style="margin-top: 5px">
                                <label style="margin: 0px; padding: 0px; line-height: 20px">
                                    <input style="width: 18px; height: 18px; margin: 0px; margin-right: 10px" class="form-check-input"  type="checkbox" id="pays42" value="Antigua-et-Barbuda" data-check = "42">Antigua-et-Barbuda
                                </label>
                            </div>
                            <div style="margin-top: 5px">
                                <label style="margin: 0px; padding: 0px; line-height: 20px">
                                    <input style="width: 18px; height: 18px; margin: 0px; margin-right: 10px" class="form-check-input"  type="checkbox" id="pays43" value="Aruba" data-check = "43">Aruba
                                </label>
                            </div>
                            <div style="margin-top: 5px">
                                <label style="margin: 0px; padding: 0px; line-height: 20px">
                                    <input style="width: 18px; height: 18px; margin: 0px; margin-right: 10px" class="form-check-input"  type="checkbox" id="pays44" value="Bahamas" data-check = "44">Bahamas
                                </label>
                            </div>
                            <div style="margin-top: 5px">
                                <label style="margin: 0px; padding: 0px; line-height: 20px">
                                    <input style="width: 18px; height: 18px; margin: 0px; margin-right: 10px" class="form-check-input"  type="checkbox" id="pays45" value="Barbade" data-check = "45">Barbade
                                </label>
                            </div>
                            <div style="margin-top: 5px">
                                <label style="margin: 0px; padding: 0px; line-height: 20px">
                                    <input style="width: 18px; height: 18px; margin: 0px; margin-right: 10px" class="form-check-input"  type="checkbox" id="pays46" value="Belize" data-check = "46">Belize
                                </label>
                            </div>
                            <div style="margin-top: 5px">
                                <label style="margin: 0px; padding: 0px; line-height: 20px">
                                    <input style="width: 18px; height: 18px; margin: 0px; margin-right: 10px" class="form-check-input"  type="checkbox" id="pays47" value="Îles Vierges britanniques" data-check = "47">Vierges britanniques
                                </label>
                            </div>
                            <div style="margin-top: 5px">
                                <label style="margin: 0px; padding: 0px; line-height: 20px">
                                    <input style="width: 18px; height: 18px; margin: 0px; margin-right: 10px" class="form-check-input"  type="checkbox" id="pays48" value="Iles Caïmans" data-check = "48">Iles Caïmans
                                </label>
                            </div>
                            <div style="margin-top: 5px">
                                <label style="margin: 0px; padding: 0px; line-height: 20px">
                                    <input style="width: 18px; height: 18px; margin: 0px; margin-right: 10px" class="form-check-input"  type="checkbox" id="pays49" value="Costa Rica" data-check = "49">Costa Rica
                                </label>
                            </div>
                            <div style="margin-top: 5px">
                                <label style="margin: 0px; padding: 0px; line-height: 20px">
                                    <input style="width: 18px; height: 18px; margin: 0px; margin-right: 10px" class="form-check-input"  type="checkbox" id="pays410" value="Dominique" data-check = "410">Dominique
                                </label>
                            </div>
                            <div style="margin-top: 5px">
                                <label style="margin: 0px; padding: 0px; line-height: 20px">
                                    <input style="width: 18px; height: 18px; margin: 0px; margin-right: 10px" class="form-check-input"  type="checkbox" id="pays411" value="République dominicaine" data-check = "411">Rép. dominicaine
                                </label>
                            </div>
                            <div style="margin-top: 5px">
                                <label style="margin: 0px; padding: 0px; line-height: 20px">
                                    <input style="width: 18px; height: 18px; margin: 0px; margin-right: 10px" class="form-check-input"  type="checkbox" id="pays412" value="Salvador" data-check = "412">Salvador
                                </label>
                            </div>
                            <div style="margin-top: 5px">
                                <label style="margin: 0px; padding: 0px; line-height: 20px">
                                    <input style="width: 18px; height: 18px; margin: 0px; margin-right: 10px" class="form-check-input"  type="checkbox" id="pays413" value="Grenade" data-check = "413">Grenade
                                </label>
                            </div>
                            <div style="margin-top: 5px">
                                <label style="margin: 0px; padding: 0px; line-height: 20px">
                                    <input style="width: 18px; height: 18px; margin: 0px; margin-right: 10px" class="form-check-input"  type="checkbox" id="pays414" value="Guadeloupe" data-check = "414">Guadeloupe
                                </label>
                            </div>
                            <div style="margin-top: 5px">
                                <label style="margin: 0px; padding: 0px; line-height: 20px">
                                    <input style="width: 18px; height: 18px; margin: 0px; margin-right: 10px" class="form-check-input"  type="checkbox" id="pays415" value="Guatemala" data-check = "415">Guatemala
                                </label>
                            </div>
                            <div style="margin-top: 5px">
                                <label style="margin: 0px; padding: 0px; line-height: 20px">
                                    <input style="width: 18px; height: 18px; margin: 0px; margin-right: 10px" class="form-check-input"  type="checkbox" id="pays416" value="Haïti" data-check = "416">Haïti
                                </label>
                            </div>
                            <div style="margin-top: 5px">
                                <label style="margin: 0px; padding: 0px; line-height: 20px">
                                    <input style="width: 18px; height: 18px; margin: 0px; margin-right: 10px" class="form-check-input"  type="checkbox" id="pays417" value="Honduras" data-check = "417">Honduras
                                </label>
                            </div>
                            <div style="margin-top: 5px">
                                <label style="margin: 0px; padding: 0px; line-height: 20px">
                                    <input style="width: 18px; height: 18px; margin: 0px; margin-right: 10px" class="form-check-input"  type="checkbox" id="pays418" value="Jamaïque" data-check = "418">Jamaïque
                                </label>
                            </div>
                            <div style="margin-top: 5px">
                                <label style="margin: 0px; padding: 0px; line-height: 20px">
                                    <input style="width: 18px; height: 18px; margin: 0px; margin-right: 10px" class="form-check-input"  type="checkbox" id="pays419" value="Martinique" data-check = "419">Martinique
                                </label>
                            </div>
                            <div style="margin-top: 5px">
                                <label style="margin: 0px; padding: 0px; line-height: 20px">
                                    <input style="width: 18px; height: 18px; margin: 0px; margin-right: 10px" class="form-check-input"  type="checkbox" id="pays420" value="Montserrat" data-check = "420">Montserrat
                                </label>
                            </div>
                            <div style="margin-top: 5px">
                                <label style="margin: 0px; padding: 0px; line-height: 20px">
                                    <input style="width: 18px; height: 18px; margin: 0px; margin-right: 10px" class="form-check-input"  type="checkbox" id="pays421" value="Antilles néerlandaises" data-check = "421">Antilles néerlandaises
                                </label>
                            </div>
                            <div style="margin-top: 5px">
                                <label style="margin: 0px; padding: 0px; line-height: 20px">
                                    <input style="width: 18px; height: 18px; margin: 0px; margin-right: 10px" class="form-check-input"  type="checkbox" id="pays422" value="Nicaragua" data-check = "422">Nicaragua
                                </label>
                            </div>
                            <div style="margin-top: 5px">
                                <label style="margin: 0px; padding: 0px; line-height: 20px">
                                    <input style="width: 18px; height: 18px; margin: 0px; margin-right: 10px" class="form-check-input"  type="checkbox" id="pays423" value="Panama" data-check = "423">Panama
                                </label>
                            </div>
                            <div style="margin-top: 5px">
                                <label style="margin: 0px; padding: 0px; line-height: 20px">
                                    <input style="width: 18px; height: 18px; margin: 0px; margin-right: 10px" class="form-check-input"  type="checkbox" id="pays424" value="Porto Rico" data-check = "424">Porto Rico
                                </label>
                            </div>
                            <div style="margin-top: 5px">
                                <label style="margin: 0px; padding: 0px; line-height: 20px">
                                    <input style="width: 18px; height: 18px; margin: 0px; margin-right: 10px" class="form-check-input"  type="checkbox" id="pays425" value="Saint-Kitts-et-Nevis" data-check = "425">Saint-Kitts-et-Nevis
                                </label>
                            </div>
                            <div style="margin-top: 5px">
                                <label style="margin: 0px; padding: 0px; line-height: 20px">
                                    <input style="width: 18px; height: 18px; margin: 0px; margin-right: 10px" class="form-check-input"  type="checkbox" id="pays426" value="Sainte-Lucie" data-check = "426">Sainte-Lucie
                                </label>
                            </div>
                            <div style="margin-top: 5px">
                                <label style="margin: 0px; padding: 0px; line-height: 20px">
                                    <input style="width: 18px; height: 18px; margin: 0px; margin-right: 10px" class="form-check-input"  type="checkbox" id="pays427" value="Saint-Vincent-et-les-Grenadines" data-check = "427">Saint-Vinc./G.
                                </label>
                            </div>
                            <div style="margin-top: 5px">
                                <label style="margin: 0px; padding: 0px; line-height: 20px">
                                    <input style="width: 18px; height: 18px; margin: 0px; margin-right: 10px" class="form-check-input"  type="checkbox" id="pays428" value="Trinité-et-Tobago" data-check = "428">Trinité-et-Tobago
                                </label>
                            </div>
                            <div style="margin-top: 5px">
                                <label style="margin: 0px; padding: 0px; line-height: 20px">
                                    <input style="width: 18px; height: 18px; margin: 0px; margin-right: 10px" class="form-check-input"  type="checkbox" id="pays429" value="Îles Turks et Caicos" data-check = "429">Îles Turks et Caicos
                                </label>
                            </div>
                            <div style="margin-top: 5px">
                                <label style="margin: 0px; padding: 0px; line-height: 20px">
                                    <input style="width: 18px; height: 18px; margin: 0px; margin-right: 10px" class="form-check-input"  type="checkbox" id="pays430" value="Îles Vierges américaines" data-check = "430">Vierges américaines
                                </label>
                            </div>


                        </div>
                         {{-- ---------------------------------- pays amerique central fin --}}

                        <div style="margin-top: 10px">
                            <label style="margin: 0px; padding: 0px; line-height: 20px">
                                <input style="width: 18px; height: 18px; margin: 0px; margin-right: 10px" class="form-check-input"  type="checkbox" id="pays5" value="Amérique du sud" data-check = "5">Amérique du Sud <a href="#" onclick="showContinentPay(5)">(pays)</a>
                            </label>
                        </div>
                        {{-- ---------------------------------- pays amerique du sud --}}
                        <div class="pays-continent s-none" style="width: 190px; height: auto; padding-top: 10px; padding-left: 15px" id="continent5">
                            <div>
                                <label style="margin: 0px; padding: 0px; line-height: 20px">
                                    <input style="width: 18px; height: 18px; margin: 0px; margin-right: 10px" class="form-check-input"  type="checkbox" id="pays51" value="Argentine" data-check = "51">Argentine
                                </label>
                            </div>
                            <div style="margin-top: 5px">
                                <label style="margin: 0px; padding: 0px; line-height: 20px">
                                    <input style="width: 18px; height: 18px; margin: 0px; margin-right: 10px" class="form-check-input"  type="checkbox" id="pays52" value="Bolivie" data-check = "52">Bolivie
                                </label>
                            </div>
                            <div style="margin-top: 5px">
                                <label style="margin: 0px; padding: 0px; line-height: 20px">
                                    <input style="width: 18px; height: 18px; margin: 0px; margin-right: 10px" class="form-check-input"  type="checkbox" id="pays53" value="Brésil" data-check = "53">Brésil
                                </label>
                            </div>
                            <div style="margin-top: 5px">
                                <label style="margin: 0px; padding: 0px; line-height: 20px">
                                    <input style="width: 18px; height: 18px; margin: 0px; margin-right: 10px" class="form-check-input"  type="checkbox" id="pays54" value="Chili" data-check = "54">Chili
                                </label>
                            </div>
                            <div style="margin-top: 5px">
                                <label style="margin: 0px; padding: 0px; line-height: 20px">
                                    <input style="width: 18px; height: 18px; margin: 0px; margin-right: 10px" class="form-check-input"  type="checkbox" id="pays55" value="Colombie" data-check = "55">Colombie
                                </label>
                            </div>
                            <div style="margin-top: 5px">
                                <label style="margin: 0px; padding: 0px; line-height: 20px">
                                    <input style="width: 18px; height: 18px; margin: 0px; margin-right: 10px" class="form-check-input"  type="checkbox" id="pays56" value="Équateur" data-check = "56">Équateur
                                </label>
                            </div>
                            <div style="margin-top: 5px">
                                <label style="margin: 0px; padding: 0px; line-height: 20px">
                                    <input style="width: 18px; height: 18px; margin: 0px; margin-right: 10px" class="form-check-input"  type="checkbox" id="pays57" value="Îles Malouines" data-check = "57">Îles Malouines
                                </label>
                            </div>
                            <div style="margin-top: 5px">
                                <label style="margin: 0px; padding: 0px; line-height: 20px">
                                    <input style="width: 18px; height: 18px; margin: 0px; margin-right: 10px" class="form-check-input"  type="checkbox" id="pays58" value="Guyane française" data-check = "58">Guyane française
                                </label>
                            </div>
                            <div style="margin-top: 5px">
                                <label style="margin: 0px; padding: 0px; line-height: 20px">
                                    <input style="width: 18px; height: 18px; margin: 0px; margin-right: 10px" class="form-check-input"  type="checkbox" id="pays59" value="Guyane" data-check = "59">Guyane
                                </label>
                            </div>
                            <div style="margin-top: 5px">
                                <label style="margin: 0px; padding: 0px; line-height: 20px">
                                    <input style="width: 18px; height: 18px; margin: 0px; margin-right: 10px" class="form-check-input"  type="checkbox" id="pays510" value="Paraguay" data-check = "510">Paraguay
                                </label>
                            </div>
                            <div style="margin-top: 5px">
                                <label style="margin: 0px; padding: 0px; line-height: 20px">
                                    <input style="width: 18px; height: 18px; margin: 0px; margin-right: 10px" class="form-check-input"  type="checkbox" id="pays511" value="Pérou" data-check = "511">Pérou
                                </label>
                            </div>
                            <div style="margin-top: 5px">
                                <label style="margin: 0px; padding: 0px; line-height: 20px">
                                    <input style="width: 18px; height: 18px; margin: 0px; margin-right: 10px" class="form-check-input"  type="checkbox" id="pays512" value="Surinam" data-check = "512">Surinam
                                </label>
                            </div>
                            <div style="margin-top: 5px">
                                <label style="margin: 0px; padding: 0px; line-height: 20px">
                                    <input style="width: 18px; height: 18px; margin: 0px; margin-right: 10px" class="form-check-input"  type="checkbox" id="pays513" value="Uruguay" data-check = "513">Uruguay
                                </label>
                            </div>
                            <div style="margin-top: 5px">
                                <label style="margin: 0px; padding: 0px; line-height: 20px">
                                    <input style="width: 18px; height: 18px; margin: 0px; margin-right: 10px" class="form-check-input"  type="checkbox" id="pays514" value="Venezuela" data-check = "514">Venezuela
                                </label>
                            </div>


                        </div>
                         {{-- ---------------------------------- pays amerique du sud fin --}}
                    </div>
                    {{-- zone droite  --}}
                    <div class="pays_exclu_right">
                        <div>
                            <label style="margin: 0px; padding: 0px; line-height: 20px">
                                <input style="width: 18px; height: 18px; margin: 0px; margin-right: 10px" class="form-check-input"  type="checkbox" id="pays6" value="Europe" data-check = "6">Europe  <a href="#" onclick="showContinentPay(6)">(pays)</a>
                            </label>
                        </div>
                          {{-- ---------------------------------- pays europe --}}
                        <div class="pays-continent s-none" style="width: 190px; height: auto; padding-top: 10px; padding-left: 15px" id="continent6">
                            <div>
                                <label style="margin: 0px; padding: 0px; line-height: 20px">
                                    <input style="width: 18px; height: 18px; margin: 0px; margin-right: 10px" class="form-check-input"  type="checkbox" id="pays61" value="Albanie" data-check = "61">Albanie
                                </label>
                            </div>
                            <div style="margin-top: 10px">
                                <label style="margin: 0px; padding: 0px; line-height: 20px">
                                    <input style="width: 18px; height: 18px; margin: 0px; margin-right: 10px" class="form-check-input"  type="checkbox" id="pays62" value="Andorre" data-check = "62">Andorre
                                </label>
                            </div>
                            <div style="margin-top: 10px">
                                <label style="margin: 0px; padding: 0px; line-height: 20px">
                                    <input style="width: 18px; height: 18px; margin: 0px; margin-right: 10px" class="form-check-input"  type="checkbox" id="pays63" value="Autriche" data-check = "63">Autriche
                                </label>
                            </div>
                            <div style="margin-top: 10px">
                                <label style="margin: 0px; padding: 0px; line-height: 20px">
                                    <input style="width: 18px; height: 18px; margin: 0px; margin-right: 10px" class="form-check-input"  type="checkbox" id="pays64" value="Biélorussie" data-check = "64">Biélorussie
                                </label>
                            </div>
                            <div style="margin-top: 10px">
                                <label style="margin: 0px; padding: 0px; line-height: 20px">
                                    <input style="width: 18px; height: 18px; margin: 0px; margin-right: 10px" class="form-check-input"  type="checkbox" id="pays65" value="Belgique" data-check = "65">Belgique
                                </label>
                            </div>
                            <div style="margin-top: 10px">
                                <label style="margin: 0px; padding: 0px; line-height: 20px">
                                    <input style="width: 18px; height: 18px; margin: 0px; margin-right: 10px" class="form-check-input"  type="checkbox" id="pays66" value="Bosnie-Herzégovine" data-check = "66">Bosnie-Herzégovine
                                </label>
                            </div>
                            <div style="margin-top: 10px">
                                <label style="margin: 0px; padding: 0px; line-height: 20px">
                                    <input style="width: 18px; height: 18px; margin: 0px; margin-right: 10px" class="form-check-input"  type="checkbox" id="pays67" value="Bulgarie" data-check = "67">Bulgarie
                                </label>
                            </div>
                            <div style="margin-top: 10px">
                                <label style="margin: 0px; padding: 0px; line-height: 20px">
                                    <input style="width: 18px; height: 18px; margin: 0px; margin-right: 10px" class="form-check-input"  type="checkbox" id="pays68" value="Croatie" data-check = "68">Croatie
                                </label>
                            </div>
                            <div style="margin-top: 10px">
                                <label style="margin: 0px; padding: 0px; line-height: 20px">
                                    <input style="width: 18px; height: 18px; margin: 0px; margin-right: 10px" class="form-check-input"  type="checkbox" id="pays69" value="Chypre" data-check = "69">Chypre
                                </label>
                            </div>
                            <div style="margin-top: 10px">
                                <label style="margin: 0px; padding: 0px; line-height: 20px">
                                    <input style="width: 18px; height: 18px; margin: 0px; margin-right: 10px" class="form-check-input"  type="checkbox" id="pays610" value="République tchèque" data-check = "610">République tchèque
                                </label>
                            </div>
                            <div style="margin-top: 10px">
                                <label style="margin: 0px; padding: 0px; line-height: 20px">
                                    <input style="width: 18px; height: 18px; margin: 0px; margin-right: 10px" class="form-check-input"  type="checkbox" id="pays611" value="Danemark" data-check = "611">Danemark
                                </label>
                            </div>
                            <div style="margin-top: 10px">
                                <label style="margin: 0px; padding: 0px; line-height: 20px">
                                    <input style="width: 18px; height: 18px; margin: 0px; margin-right: 10px" class="form-check-input"  type="checkbox" id="pays612" value="Estonie" data-check = "612">Estonie
                                </label>
                            </div>
                            <div style="margin-top: 10px">
                                <label style="margin: 0px; padding: 0px; line-height: 20px">
                                    <input style="width: 18px; height: 18px; margin: 0px; margin-right: 10px" class="form-check-input"  type="checkbox" id="pays613" value="Finlande" data-check = "613">Finlande
                                </label>
                            </div>
                            <div style="margin-top: 10px">
                                <label style="margin: 0px; padding: 0px; line-height: 20px">
                                    <input style="width: 18px; height: 18px; margin: 0px; margin-right: 10px" class="form-check-input"  type="checkbox" id="pays614" value="Allemagne" data-check = "614">Allemagne
                                </label>
                            </div>
                            <div style="margin-top: 10px">
                                <label style="margin: 0px; padding: 0px; line-height: 20px">
                                    <input style="width: 18px; height: 18px; margin: 0px; margin-right: 10px" class="form-check-input"  type="checkbox" id="pays615" value="Gibraltar" data-check = "615">Gibraltar
                                </label>
                            </div>
                            <div style="margin-top: 10px">
                                <label style="margin: 0px; padding: 0px; line-height: 20px">
                                    <input style="width: 18px; height: 18px; margin: 0px; margin-right: 10px" class="form-check-input"  type="checkbox" id="pays616" value="Grèce" data-check = "616">Grèce
                                </label>
                            </div>
                            <div style="margin-top: 10px">
                                <label style="margin: 0px; padding: 0px; line-height: 20px">
                                    <input style="width: 18px; height: 18px; margin: 0px; margin-right: 10px" class="form-check-input"  type="checkbox" id="pays617" value="Guernesey" data-check = "617">Guernesey
                                </label>
                            </div>
                            <div style="margin-top: 10px">
                                <label style="margin: 0px; padding: 0px; line-height: 20px">
                                    <input style="width: 18px; height: 18px; margin: 0px; margin-right: 10px" class="form-check-input"  type="checkbox" id="pays618" value="Hongrie" data-check = "618">Hongrie
                                </label>
                            </div>
                            <div style="margin-top: 10px">
                                <label style="margin: 0px; padding: 0px; line-height: 20px">
                                    <input style="width: 18px; height: 18px; margin: 0px; margin-right: 10px" class="form-check-input"  type="checkbox" id="pays619" value="Islande" data-check = "619">Islande
                                </label>
                            </div>
                            <div style="margin-top: 10px">
                                <label style="margin: 0px; padding: 0px; line-height: 20px">
                                    <input style="width: 18px; height: 18px; margin: 0px; margin-right: 10px" class="form-check-input"  type="checkbox" id="pays620" value="Irlande" data-check = "620">Irlande
                                </label>
                            </div>
                            <div style="margin-top: 10px">
                                <label style="margin: 0px; padding: 0px; line-height: 20px">
                                    <input style="width: 18px; height: 18px; margin: 0px; margin-right: 10px" class="form-check-input"  type="checkbox" id="pays621" value="Italie" data-check = "621">Italie
                                </label>
                            </div>
                            <div style="margin-top: 10px">
                                <label style="margin: 0px; padding: 0px; line-height: 20px">
                                    <input style="width: 18px; height: 18px; margin: 0px; margin-right: 10px" class="form-check-input"  type="checkbox" id="pays622" value="Jersey" data-check = "622">Jersey
                                </label>
                            </div>
                            <div style="margin-top: 10px">
                                <label style="margin: 0px; padding: 0px; line-height: 20px">
                                    <input style="width: 18px; height: 18px; margin: 0px; margin-right: 10px" class="form-check-input"  type="checkbox" id="pays623" value="Lettonie" data-check = "623">Lettonie
                                </label>
                            </div>
                            <div style="margin-top: 10px">
                                <label style="margin: 0px; padding: 0px; line-height: 20px">
                                    <input style="width: 18px; height: 18px; margin: 0px; margin-right: 10px" class="form-check-input"  type="checkbox" id="pays224" value="Liechtenstein" data-check = "624">Liechtenstein
                                </label>
                            </div>
                            <div style="margin-top: 10px">
                                <label style="margin: 0px; padding: 0px; line-height: 20px">
                                    <input style="width: 18px; height: 18px; margin: 0px; margin-right: 10px" class="form-check-input"  type="checkbox" id="pays625" value="Lituanie" data-check = "625">Lituanie
                                </label>
                            </div>
                            <div style="margin-top: 10px">
                                <label style="margin: 0px; padding: 0px; line-height: 20px">
                                    <input style="width: 18px; height: 18px; margin: 0px; margin-right: 10px" class="form-check-input"  type="checkbox" id="pays626" value="Luxembourg" data-check = "626">Luxembourg
                                </label>
                            </div>
                            <div style="margin-top: 10px">
                                <label style="margin: 0px; padding: 0px; line-height: 20px">
                                    <input style="width: 18px; height: 18px; margin: 0px; margin-right: 10px" class="form-check-input"  type="checkbox" id="pays627" value="Macédoine" data-check = "627">Macédoine
                                </label>
                            </div>
                            <div style="margin-top: 10px">
                                <label style="margin: 0px; padding: 0px; line-height: 20px">
                                    <input style="width: 18px; height: 18px; margin: 0px; margin-right: 10px" class="form-check-input"  type="checkbox" id="pays628" value="Malte" data-check = "628">Malte
                                </label>
                            </div>
                            <div style="margin-top: 10px">
                                <label style="margin: 0px; padding: 0px; line-height: 20px">
                                    <input style="width: 18px; height: 18px; margin: 0px; margin-right: 10px" class="form-check-input"  type="checkbox" id="pays629" value="Moldavie" data-check = "629">Moldavie
                                </label>
                            </div>
                            <div style="margin-top: 10px">
                                <label style="margin: 0px; padding: 0px; line-height: 20px">
                                    <input style="width: 18px; height: 18px; margin: 0px; margin-right: 10px" class="form-check-input"  type="checkbox" id="pays630" value="Monaco" data-check = "630">Monaco
                                </label>
                            </div>
                            <div style="margin-top: 10px">
                                <label style="margin: 0px; padding: 0px; line-height: 20px">
                                    <input style="width: 18px; height: 18px; margin: 0px; margin-right: 10px" class="form-check-input"  type="checkbox" id="pays631" value="Monténégro" data-check = "631">Monténégro
                                </label>
                            </div>
                            <div style="margin-top: 10px">
                                <label style="margin: 0px; padding: 0px; line-height: 20px">
                                    <input style="width: 18px; height: 18px; margin: 0px; margin-right: 10px" class="form-check-input"  type="checkbox" id="pays632" value="Pays-Bas" data-check = "632">Pays-Bas
                                </label>
                            </div>
                            <div style="margin-top: 10px">
                                <label style="margin: 0px; padding: 0px; line-height: 20px">
                                    <input style="width: 18px; height: 18px; margin: 0px; margin-right: 10px" class="form-check-input"  type="checkbox" id="pays633" value="Norvège" data-check = "633">Norvège
                                </label>
                            </div>
                            <div style="margin-top: 10px">
                                <label style="margin: 0px; padding: 0px; line-height: 20px">
                                    <input style="width: 18px; height: 18px; margin: 0px; margin-right: 10px" class="form-check-input"  type="checkbox" id="pays634" value="Pologne" data-check = "634">Pologne
                                </label>
                            </div>
                            <div style="margin-top: 10px">
                                <label style="margin: 0px; padding: 0px; line-height: 20px">
                                    <input style="width: 18px; height: 18px; margin: 0px; margin-right: 10px" class="form-check-input"  type="checkbox" id="pays635" value="Portugal" data-check = "635">Portugal
                                </label>
                            </div>
                            <div style="margin-top: 10px">
                                <label style="margin: 0px; padding: 0px; line-height: 20px">
                                    <input style="width: 18px; height: 18px; margin: 0px; margin-right: 10px" class="form-check-input"  type="checkbox" id="pays636" value="Roumanie" data-check = "636">Roumanie
                                </label>
                            </div>
                            <div style="margin-top: 10px">
                                <label style="margin: 0px; padding: 0px; line-height: 20px">
                                    <input style="width: 18px; height: 18px; margin: 0px; margin-right: 10px" class="form-check-input"  type="checkbox" id="pays637" value="Russie" data-check = "637">Russie
                                </label>
                            </div>
                            <div style="margin-top: 10px">
                                <label style="margin: 0px; padding: 0px; line-height: 20px">
                                    <input style="width: 18px; height: 18px; margin: 0px; margin-right: 10px" class="form-check-input"  type="checkbox" id="pays638" value="Saint-Marin" data-check = "638">Saint-Marin
                                </label>
                            </div>
                            <div style="margin-top: 10px">
                                <label style="margin: 0px; padding: 0px; line-height: 20px">
                                    <input style="width: 18px; height: 18px; margin: 0px; margin-right: 10px" class="form-check-input"  type="checkbox" id="pays639" value="Serbie" data-check = "639">Serbie
                                </label>
                            </div>
                            <div style="margin-top: 10px">
                                <label style="margin: 0px; padding: 0px; line-height: 20px">
                                    <input style="width: 18px; height: 18px; margin: 0px; margin-right: 10px" class="form-check-input"  type="checkbox" id="pays640" value="Slovaquie" data-check = "640">Slovaquie
                                </label>
                            </div>
                            <div style="margin-top: 10px">
                                <label style="margin: 0px; padding: 0px; line-height: 20px">
                                    <input style="width: 18px; height: 18px; margin: 0px; margin-right: 10px" class="form-check-input"  type="checkbox" id="pays641" value="Slovénie" data-check = "641">Slovénie
                                </label>
                            </div>
                            <div style="margin-top: 10px">
                                <label style="margin: 0px; padding: 0px; line-height: 20px">
                                    <input style="width: 18px; height: 18px; margin: 0px; margin-right: 10px" class="form-check-input"  type="checkbox" id="pays642" value="Espagne" data-check = "642">Espagne
                                </label>
                            </div>
                            <div style="margin-top: 10px">
                                <label style="margin: 0px; padding: 0px; line-height: 20px">
                                    <input style="width: 18px; height: 18px; margin: 0px; margin-right: 10px" class="form-check-input"  type="checkbox" id="pays643" value="Svalbard et Jan Mayen" data-check = "643">Svalbard et Jan M.
                                </label>
                            </div>
                            <div style="margin-top: 10px">
                                <label style="margin: 0px; padding: 0px; line-height: 20px">
                                    <input style="width: 18px; height: 18px; margin: 0px; margin-right: 10px" class="form-check-input"  type="checkbox" id="pays644" value="Suède" data-check = "644">Suède
                                </label>
                            </div>
                            <div style="margin-top: 10px">
                                <label style="margin: 0px; padding: 0px; line-height: 20px">
                                    <input style="width: 18px; height: 18px; margin: 0px; margin-right: 10px" class="form-check-input"  type="checkbox" id="pays645" value="Suisse" data-check = "645">Suisse
                                </label>
                            </div>
                            <div style="margin-top: 10px">
                                <label style="margin: 0px; padding: 0px; line-height: 20px">
                                    <input style="width: 18px; height: 18px; margin: 0px; margin-right: 10px" class="form-check-input"  type="checkbox" id="pays646" value="Ukraine" data-check = "646">Ukraine
                                </label>
                            </div>
                            <div style="margin-top: 10px">
                                <label style="margin: 0px; padding: 0px; line-height: 20px">
                                    <input style="width: 18px; height: 18px; margin: 0px; margin-right: 10px" class="form-check-input"  type="checkbox" id="pays647" value="Royaume-Uni" data-check = "647">Royaume-Uni
                                </label>
                            </div>
                            <div style="margin-top: 10px">
                                <label style="margin: 0px; padding: 0px; line-height: 20px">
                                    <input style="width: 18px; height: 18px; margin: 0px; margin-right: 10px" class="form-check-input"  type="checkbox" id="pays648" value="Vatican" data-check = "648">Vatican
                                </label>
                            </div>
                            {{-- <div style="margin-top: 10px">
                                <label style="margin: 0px; padding: 0px; line-height: 20px">
                                    <input style="width: 18px; height: 18px; margin: 0px; margin-right: 10px" class="form-check-input"  type="checkbox" id="pays61" value="Albanie" data-check = "61">Albanie
                                </label>
                            </div> --}}

                        </div>
                        {{-- ---------------------------------- pays europe fin --}}
                        <div style="margin-top: 10px">
                            <label style="margin: 0px; padding: 0px; line-height: 20px">
                                <input style="width: 18px; height: 18px; margin: 0px; margin-right: 10px" class="form-check-input"  type="checkbox" id="pays7" value="Océanie" data-check = "7">Océanie  <a href="#" onclick="showContinentPay(7)">(pays)</a>
                            </label>
                        </div>
                          {{-- ---------------------------------- pays océanie --}}
                          <div class="pays-continent s-none" style="width: 190px; height: auto; padding-top: 10px; padding-left: 15px" id="continent7">
                            <div>
                                <label style="margin: 0px; padding: 0px; line-height: 20px">
                                    <input style="width: 18px; height: 18px; margin: 0px; margin-right: 10px" class="form-check-input"  type="checkbox" id="pays71" value="Samoa américaines" data-check = "71">Samoa américaines
                                </label>
                            </div>
                            <div style="margin-top: 5px">
                                <label style="margin: 0px; padding: 0px; line-height: 20px">
                                    <input style="width: 18px; height: 18px; margin: 0px; margin-right: 10px" class="form-check-input"  type="checkbox" id="pays72" value="Australie" data-check = "72">Australie
                                </label>
                            </div>
                            <div style="margin-top: 5px">
                                <label style="margin: 0px; padding: 0px; line-height: 20px">
                                    <input style="width: 18px; height: 18px; margin: 0px; margin-right: 10px" class="form-check-input"  type="checkbox" id="pays73" value="Iles Cook" data-check = "73">Iles Cook
                                </label>
                            </div>
                            <div style="margin-top: 5px">
                                <label style="margin: 0px; padding: 0px; line-height: 20px">
                                    <input style="width: 18px; height: 18px; margin: 0px; margin-right: 10px" class="form-check-input"  type="checkbox" id="pays74" value="Fidji" data-check = "74">Fidji
                                </label>
                            </div>
                            <div style="margin-top: 5px">
                                <label style="margin: 0px; padding: 0px; line-height: 20px">
                                    <input style="width: 18px; height: 18px; margin: 0px; margin-right: 10px" class="form-check-input"  type="checkbox" id="pays75" value="Polynésie française" data-check = "75">Polynésie française
                                </label>
                            </div>
                            <div style="margin-top: 5px">
                                <label style="margin: 0px; padding: 0px; line-height: 20px">
                                    <input style="width: 18px; height: 18px; margin: 0px; margin-right: 10px" class="form-check-input"  type="checkbox" id="pays76" value="Guam" data-check = "76">Guam
                                </label>
                            </div>
                            <div style="margin-top: 5px">
                                <label style="margin: 0px; padding: 0px; line-height: 20px">
                                    <input style="width: 18px; height: 18px; margin: 0px; margin-right: 10px" class="form-check-input"  type="checkbox" id="pays77" value="Kiribati" data-check = "77">Kiribati
                                </label>
                            </div>
                            <div style="margin-top: 5px">
                                <label style="margin: 0px; padding: 0px; line-height: 20px">
                                    <input style="width: 18px; height: 18px; margin: 0px; margin-right: 10px" class="form-check-input"  type="checkbox" id="pays78" value="Iles Marshall" data-check = "78">Iles Marshall
                                </label>
                            </div>
                            <div style="margin-top: 5px">
                                <label style="margin: 0px; padding: 0px; line-height: 20px">
                                    <input style="width: 18px; height: 18px; margin: 0px; margin-right: 10px" class="form-check-input"  type="checkbox" id="pays79" value="Micronésie" data-check = "79">Micronésie
                                </label>
                            </div>
                            <div style="margin-top: 5px">
                                <label style="margin: 0px; padding: 0px; line-height: 20px">
                                    <input style="width: 18px; height: 18px; margin: 0px; margin-right: 10px" class="form-check-input"  type="checkbox" id="pays710" value="Nauru" data-check = "710">Nauru
                                </label>
                            </div>
                            <div style="margin-top: 5px">
                                <label style="margin: 0px; padding: 0px; line-height: 20px">
                                    <input style="width: 18px; height: 18px; margin: 0px; margin-right: 10px" class="form-check-input"  type="checkbox" id="pays711" value="Nouvelle-Calédonie" data-check = "711">Nouvelle-Calédonie
                                </label>
                            </div>
                            <div style="margin-top: 5px">
                                <label style="margin: 0px; padding: 0px; line-height: 20px">
                                    <input style="width: 18px; height: 18px; margin: 0px; margin-right: 10px" class="form-check-input"  type="checkbox" id="pays712" value="Nouvelle-Zélande" data-check = "712">Nouvelle-Zélande
                                </label>
                            </div>
                            <div style="margin-top: 5px">
                                <label style="margin: 0px; padding: 0px; line-height: 20px">
                                    <input style="width: 18px; height: 18px; margin: 0px; margin-right: 10px" class="form-check-input"  type="checkbox" id="pays713" value="Niué" data-check = "713">Niué
                                </label>
                            </div>
                            <div style="margin-top: 5px">
                                <label style="margin: 0px; padding: 0px; line-height: 20px">
                                    <input style="width: 18px; height: 18px; margin: 0px; margin-right: 10px" class="form-check-input"  type="checkbox" id="pays714" value="Palau" data-check = "714">Palau
                                </label>
                            </div>
                            <div style="margin-top: 5px">
                                <label style="margin: 0px; padding: 0px; line-height: 20px">
                                    <input style="width: 18px; height: 18px; margin: 0px; margin-right: 10px" class="form-check-input"  type="checkbox" id="pays715" value="Papouasie-Nouvelle-Guinée" data-check = "715">Papouasie-Nlle-G.
                                </label>
                            </div>
                            <div style="margin-top: 5px">
                                <label style="margin: 0px; padding: 0px; line-height: 20px">
                                    <input style="width: 18px; height: 18px; margin: 0px; margin-right: 10px" class="form-check-input"  type="checkbox" id="pays716" value="Îles Salomon" data-check = "716">Îles Salomon
                                </label>
                            </div>
                            <div style="margin-top: 5px">
                                <label style="margin: 0px; padding: 0px; line-height: 20px">
                                    <input style="width: 18px; height: 18px; margin: 0px; margin-right: 10px" class="form-check-input"  type="checkbox" id="pays717" value="Tonga" data-check = "717">Tonga
                                </label>
                            </div>
                            <div style="margin-top: 5px">
                                <label style="margin: 0px; padding: 0px; line-height: 20px">
                                    <input style="width: 18px; height: 18px; margin: 0px; margin-right: 10px" class="form-check-input"  type="checkbox" id="pays718" value="Tuvalu" data-check = "718">Tuvalu
                                </label>
                            </div>
                            <div style="margin-top: 5px">
                                <label style="margin: 0px; padding: 0px; line-height: 20px">
                                    <input style="width: 18px; height: 18px; margin: 0px; margin-right: 10px" class="form-check-input"  type="checkbox" id="pays719" value="Australie" data-check = "719">Vanuatu
                                </label>
                            </div>
                            <div style="margin-top: 5px">
                                <label style="margin: 0px; padding: 0px; line-height: 20px">
                                    <input style="width: 18px; height: 18px; margin: 0px; margin-right: 10px" class="form-check-input"  type="checkbox" id="pays720" value="Wallis-et-Futuna" data-check = "720">Wallis-et-Futuna
                                </label>
                            </div>
                            <div style="margin-top: 5px">
                                <label style="margin: 0px; padding: 0px; line-height: 20px">
                                    <input style="width: 18px; height: 18px; margin: 0px; margin-right: 10px" class="form-check-input"  type="checkbox" id="pays721" value="Samoa occidentales" data-check = "721">Samoa occidentales
                                </label>
                            </div>

                        </div>
                        {{-- ---------------------------------- pays europe fin --}}
                        <div style="margin-top: 10px">
                            <label style="margin: 0px; padding: 0px; line-height: 20px">
                                <input style="width: 18px; height: 18px; margin: 0px; margin-right: 10px" class="form-check-input"  type="checkbox" id="pays8" value="Asie du Sud-Est" data-check = "8">Asie du Sud-Est <a href="#" onclick="showContinentPay(8)">(pays)</a>
                            </label>
                        </div>
                          {{-- ---------------------------------- pays asie sud est --}}
                          <div class="pays-continent s-none" style="width: 190px; height: auto; padding-top: 10px; padding-left: 15px" id="continent8">
                            <div>
                                <label style="margin: 0px; padding: 0px; line-height: 20px">
                                    <input style="width: 18px; height: 18px; margin: 0px; margin-right: 10px" class="form-check-input"  type="checkbox" id="pays81" value="Brunéi Darussalam" data-check = "81">Brunéi Darussalam
                                </label>
                            </div>
                            <div style="margin-top: 5px">
                                <label style="margin: 0px; padding: 0px; line-height: 20px">
                                    <input style="width: 18px; height: 18px; margin: 0px; margin-right: 10px" class="form-check-input"  type="checkbox" id="pays82" value="Cambodge" data-check = "82">Cambodge
                                </label>
                            </div>
                            <div style="margin-top: 5px">
                                <label style="margin: 0px; padding: 0px; line-height: 20px">
                                    <input style="width: 18px; height: 18px; margin: 0px; margin-right: 10px" class="form-check-input"  type="checkbox" id="pays83" value="Hong Kong" data-check = "83">Hong Kong
                                </label>
                            </div>
                            <div style="margin-top: 5px">
                                <label style="margin: 0px; padding: 0px; line-height: 20px">
                                    <input style="width: 18px; height: 18px; margin: 0px; margin-right: 10px" class="form-check-input"  type="checkbox" id="pays84" value="Indonésie" data-check = "84">Indonésie
                                </label>
                            </div>
                            <div style="margin-top: 5px">
                                <label style="margin: 0px; padding: 0px; line-height: 20px">
                                    <input style="width: 18px; height: 18px; margin: 0px; margin-right: 10px" class="form-check-input"  type="checkbox" id="pays85" value="Laos" data-check = "85">Laos
                                </label>
                            </div>
                            <div style="margin-top: 5px">
                                <label style="margin: 0px; padding: 0px; line-height: 20px">
                                    <input style="width: 18px; height: 18px; margin: 0px; margin-right: 10px" class="form-check-input"  type="checkbox" id="pays86" value="Macao" data-check = "86">Macao
                                </label>
                            </div>
                            <div style="margin-top: 5px">
                                <label style="margin: 0px; padding: 0px; line-height: 20px">
                                    <input style="width: 18px; height: 18px; margin: 0px; margin-right: 10px" class="form-check-input"  type="checkbox" id="pays87" value="Malaisie" data-check = "87">Malaisie
                                </label>
                            </div>
                            <div style="margin-top: 5px">
                                <label style="margin: 0px; padding: 0px; line-height: 20px">
                                    <input style="width: 18px; height: 18px; margin: 0px; margin-right: 10px" class="form-check-input"  type="checkbox" id="pays88" value="Philippines" data-check = "88">Philippines
                                </label>
                            </div>
                            <div style="margin-top: 5px">
                                <label style="margin: 0px; padding: 0px; line-height: 20px">
                                    <input style="width: 18px; height: 18px; margin: 0px; margin-right: 10px" class="form-check-input"  type="checkbox" id="pays89" value="Singapour" data-check = "89">Singapour
                                </label>
                            </div>
                            <div style="margin-top: 5px">
                                <label style="margin: 0px; padding: 0px; line-height: 20px">
                                    <input style="width: 18px; height: 18px; margin: 0px; margin-right: 10px" class="form-check-input"  type="checkbox" id="pays810" value="Taiwan" data-check = "810">Taiwan
                                </label>
                            </div>
                            <div style="margin-top: 5px">
                                <label style="margin: 0px; padding: 0px; line-height: 20px">
                                    <input style="width: 18px; height: 18px; margin: 0px; margin-right: 10px" class="form-check-input"  type="checkbox" id="pays811" value="Thaïlande" data-check = "811">Thaïlande
                                </label>
                            </div>
                            <div style="margin-top: 5px">
                                <label style="margin: 0px; padding: 0px; line-height: 20px">
                                    <input style="width: 18px; height: 18px; margin: 0px; margin-right: 10px" class="form-check-input"  type="checkbox" id="pays812" value="Vietnam" data-check = "812">Vietnam
                                </label>
                            </div>


                        </div>
                        {{-- ---------------------------------- pays asie sud est fin --}}
                        <div style="margin-top: 10px">
                            <label style="margin: 0px; padding: 0px; line-height: 20px">
                                <input style="width: 18px; height: 18px; margin: 0px; margin-right: 10px" class="form-check-input"  type="checkbox" id="pays9" value="Amérique du Nord" data-check = "9">Amérique du Nord  <a href="#" onclick="showContinentPay(9)">(pays)</a>
                            </label>
                        </div>
                        {{-- ---------------------------------- pays amerique du nord --}}
                        <div class="pays-continent s-none" style="width: 190px; height: auto; padding-top: 10px; padding-left: 15px" id="continent9">
                            <div>
                                <label style="margin: 0px; padding: 0px; line-height: 20px">
                                    <input style="width: 18px; height: 18px; margin: 0px; margin-right: 10px" class="form-check-input"  type="checkbox" id="pays91" value="Canada" data-check = "91">Canada
                                </label>
                            </div>
                            <div style="margin-top: 5px">
                                <label style="margin: 0px; padding: 0px; line-height: 20px">
                                    <input style="width: 18px; height: 18px; margin: 0px; margin-right: 10px" class="form-check-input"  type="checkbox" id="pays92" value="États-Unis" data-check = "92">États-Unis
                                </label>
                            </div>
                            <div style="margin-top: 5px">
                                <label style="margin: 0px; padding: 0px; line-height: 20px">
                                    <input style="width: 18px; height: 18px; margin: 0px; margin-right: 10px" class="form-check-input"  type="checkbox" id="pays93" value="Mexique" data-check = "93">Mexique
                                </label>
                            </div>
                            <div style="margin-top: 5px">
                                <label style="margin: 0px; padding: 0px; line-height: 20px">
                                    <input style="width: 18px; height: 18px; margin: 0px; margin-right: 10px" class="form-check-input"  type="checkbox" id="pays94" value="Groenland" data-check = "94">Groenland
                                </label>
                            </div>
                            <div style="margin-top: 5px">
                                <label style="margin: 0px; padding: 0px; line-height: 20px">
                                    <input style="width: 18px; height: 18px; margin: 0px; margin-right: 10px" class="form-check-input"  type="checkbox" id="pays95" value="Bermudes" data-check = "95">Bermudes
                                </label>
                            </div>
                            <div style="margin-top: 5px">
                                {{-- <label style="margin: 0px; padding: 0px; line-height: 20px">
                                    <input style="width: 18px; height: 18px; margin: 0px; margin-right: 10px" class="form-check-input"  type="checkbox" id="pays96" value="Bermudes" data-check = "96"><div style="margin-top: 5px"> --}}
                                <label style="margin: 0px; padding: 0px; line-height: 20px">
                                    <input style="width: 18px; height: 18px; margin: 0px; margin-right: 10px" class="form-check-input"  type="checkbox" id="pays96" value="Saint-Pierre-et-Miquelon" data-check = "96">Saint-Pierre-et-Miquelon
                                </label>
                            </div>
                                {{-- </label> --}}
                            {{-- </div> --}}
                        </div>
                        {{-- ---------------------------------- pays amerique du nord fin--}}
                    </div>

                </div>
                <div style="height: 65px !important; ">
                    <section id="aucun-lieu" style=" height: 31px;
                            width: 553px;
                            border: 1px solid #9B9B9B;
                            border-radius: 6px;
                            background-color: #F8F8F8;margin-top:5px;margin-left:15px;">
                             <p style="  color: #000;
                             font-family: Roboto;
                             font-size: 12px;
                             font-weight: 300;
                             letter-spacing: 0.26px;
                             line-height: 14px;text-align:center;margin-top:7px;"> Aucun lieu exclu

                            </p></section>

                            <section class="s-none" id="selected-lieux-section"  style="height: auto; overflow-y:auto;
                                width: 553px; overflow-x: hidden;
                                border: 1px solid #9B9B9B;
                                border-radius: 6px;
                                background-color: #F8F8F8;margin-top:5px;margin-left:15px;">
                                <article style="height:inherit;width:500px;margin-left:10px; position: relative; top: 8px">
                                <p style="    color:#191970;
                                font-family: Roboto;
                                font-size: 12px;
                                letter-spacing: 0.26px;
                                line-height: 14px;
                            text-align:left;margin-left:10px;"> Lieux exclus :

                                </p>
                                <p style="color:#000000;
                                font-family: Roboto;
                                font-size: 12px;
                                letter-spacing: 0.26px;
                                line-height: 14px;
                            text-align:left;margin-top:-30px;margin-left:90px;" id="pays-exclu-preview"> </p>

                            </article></section>
                </div>

                      <p style=" color: #4A4A4A;
                      font-family: Roboto;
                      font-size: 9px;
                      letter-spacing: 0.2px;
                      line-height: 10px;text-align:left;margin-left:15px;margin-right:10px; margin-top: 5px">Remarque : si vous excluez des lieux de livraison, nous bloquerons les acheteurs dont l'adresse de livraison principale se situe dans<br> les pays vers lesquels vous n'envoyez pas vos objets. Vous pouvez modifier cette option à la section Conditions requises pour les<br> acheteurs dans vos préférences de vente. Ces exclusions seront appliquées par défaut à toutes vos annonces futures. Vous pouvez <br>modifier ces exclusions dans vos annonces individuelles au moment de la mise en vente.</p>

                      <div style="display: flex; column-gap: 10px; position: relative; float: left; left: 247px !important; ">
                        <button style="  height: 37px; border: none;
                        width: 204px;
                        border-radius: 6px;
                        background-color: #ccc; color:#fff ;text-align:center;padding:10px;margin-top:-10px;font-family: Roboto;
                        font-size: 16px;
                        font-weight: 500;
                        letter-spacing: 0.31px;
                        line-height: 16px;" id="savePaysExclu" onclick="sauveExpulsedCountry()" disabled> Enregistrer & fermer </button>
                        <button style="  height: 37px;
                      width: 108px;
                      border: 1px solid #1A7EF5;
                      border-radius: 6px;
                      background-color: #FFFFFF; color:#1A7EF5;text-align:center;padding:10px;margin-top:-10px;font-family: Roboto;
                        letter-spacing: 0.31px; font-family: Roboto;
                        font-size: 16px;
                        font-weight: 500;
                        letter-spacing: 0.31px;
                        line-height: 16px;" onclick="fermerPaysExclu()"> Fermer </button>
                      </div>
                </div>
                        </div>

                        </div>
                    </div>










                <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js " integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM " crossorigin="anonymous "></script>


