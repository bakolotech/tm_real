<style>
    .form-select-f {
        padding-left: 10px
    }
</style>
<section style="width: 558px;height:100px; background-color:#191970;">
    <p style="  color: #FFFFFF;
    font-family: Roboto;
    font-size: 21px;
    font-weight: 500;
    letter-spacing: 0;
    line-height: 23px;
    text-align: center;padding-top: 38px;">2- Information sur la vente</p>
</section>
{{-- <div class="detailan"> --}}
<section style="background-color: #F8F8F8; width: 558px;height: 152px; position: relative; top: 0px; padding-top: 15px">
    <div style="border-left:3px solid #1A7EF5;padding-left:20px; border-top-left-radius: 2px;">
        <p style="position: relative; " class="prix-achat"><small class="red-star">*</small>Prix d’achat</p>

        <style>

            .input-libelle-vente {
                width: 226px;
                color: #191970 !important;
                font-family: Roboto;
                font-size: 14px;
                font-weight: bold;
                letter-spacing: 0.31px;
                padding-bottom: 0px !important;
                margin-bottom: 0px !important;
                line-height: 15px;
                text-transform: uppercase
            }

            .prix-achat {
                font-family: Roboto;
                font-size: 14px;
                font-weight: 500;
                letter-spacing: 0.31px;
                line-height: 15px;
                color: #191970 !important;
                text-transform: uppercase;
                margin-bottom: 10px !important;
            }

            .quantite {
                font-family: Roboto;
                font-size: 14px;
                font-weight: 500;
                letter-spacing: 0.31px;
                line-height: 15px;
                color: #191970 !important;
                text-transform: uppercase;
                margin-bottom: 10px !important;
                position: relative;
                top: 3px;
            }

        </style>
        <style>
            .tooltips {
                position: relative;
                display: inline-block;
            }

            .tooltips .tooltiptext {
                visibility: hidden;
                height: 76px;
                width: 273.55px;
                border-radius: 6px;
                background-color: #FFFFFF;
                box-shadow: 0 0 6px 0 rgba(0,0,0,0.5);
                /* background-color: #555; */

                text-align: justify;
                border-radius: 6px;
                /* padding: 10px; */
                position: absolute;
                z-index: 1;
                /* bottom: 125%; */
                top: -29px;
                left: 104%;
                margin-left: 6px;
                opacity: 0;
                transition: opacity 0.3s;

                color: #191970;
                font-family: Roboto;
                font-size: 12px;
                letter-spacing: 0;
                line-height: 13px;

            }

            .tooltips .tooltiptext::after {
                content: "";
                position: absolute;
                top: 31px;
                left: 100%;
                margin-left: -283px;
                border-width: 5px;
                border-style: solid;
                border-color: #fff transparent transparent transparent;
                transform: rotate(90deg);
            }

            .tooltips:hover .tooltiptext {
                visibility: visible;
                opacity: 1;

            }

            .tooltiptext p {
                height: 56px;
                width: 241px;
                color: #191970;
                font-family: Roboto;
                font-size: 12px;
                letter-spacing: 0;
                line-height: 13px;
                justify-content: center;
                text-align: justify;
                margin-top: 12px;
                margin-left: 15px
            }

            #detail-retour {

            }

            #quantite {
                height: 16px;
                width: 8px;
                color: #4A4A4A;
                font-family: Roboto;
                font-size: 14px;
                letter-spacing: -0.34px;
                line-height: 16px;

                height: 16px;
                width: 12px;
                color: #4A4A4A;
                font-family: Roboto;
                font-size: 14px;
                letter-spacing: -0.34px;
                line-height: 16px;
            }

            .prix-achat-devise {
                color: #4A4A4A;
                font-family: Roboto;
                font-size: 14px;
                letter-spacing: -0.34px;
                line-height: 16px;background-color: #D8D8D8;width: 99px;height:41px;border-top-right-radius:5px;border-bottom-right-radius: 5px;
                margin-left: 150px;margin-top:0px;border: 1px solid #9B9B9B;
                border-left:0px;
                margin-top:-41px;
                text-align:center;
                padding-top:13.5px
            }

            .prix-achat-input-costum {
                width:150px;height:41px;border-bottom-left-radius: 5px;
                border-top-left-radius: 5px;
                border: 1px solid #9B9B9B; text-align:center; padding-left: 15px;
                position: relative; top: -6px; color: #4A4A4A;
                font-family: Roboto; font-size: 14px;
            }

            .input-quantite-produit {
                height: 41px;
                width: 253px;
                border: 1px solid #979797;
                border-radius: 6px;
                background-color: #FFFFFF; padding-left: 15px;margin-top: -2px;
                position: relative; left: 5px; color: #4A4A4A;
                font-family: Roboto;
                font-size: 14px;
            }

            .input-vente-par-lot {
                height: 18px;
                width: 18px;
                border-radius: 4px;
                margin-top: 25px;margin-left: 80px;
            }

            .vente-en-lot-label {
                color: #000000;
                font-family: Roboto;
                font-size: 14px;
                font-weight: 500;
                letter-spacing: 0.31px;
                line-height: 18px;margin-top: 26px;margin-left: 5px;
            }

            .input-vente-en-lot-2 {
                height: 41px;
                width: 253px;
                border: 1px solid #979797;
                border-radius: 6px;
                background-color: #FFFFFF; padding-left: 15px;margin-left:
                40px; font-size: 14px; margin-top: 15px
            }
            </style>

<style>
    .acheter-15-div-container {
        height: 33px; display: flex; justify-content:flex-start; align-items: center; margin-bottom: 15px
    }

    .acheter-15-checkbox {
        height: 16px;
        width: 16px;
        border-radius: 2px;
        margin-left:15px; margin-top:-1px
    }

    .acheter-15-label {
        color: #000000;
        font-family: Roboto;
        font-size: 14px;
        letter-spacing: 0.31px;
        line-height: 18px;margin-left:5px;
    }

    .acheter-15-select {
        height: 33px;
        width: 73px;
        border: 1px solid #979797;
        border-radius: 6px;

        background-color: #FFFFFF;color: #4A4A4A;
        font-family: Roboto;
        font-size: 14px;
        letter-spacing: -0.34px;
        line-height: 16px;margin-left: 5px;
    }

</style>

<style>

    .frais-retour-element {
        color: #000000;
        font-family: Roboto;
        font-size: 14px;
        letter-spacing: 0.31px;
        line-height: 18px;
    }

    #detail-retour {
        box-sizing: border-box;
        height: 82px;
        width: 518px;
        border: 1px solid #979797;
        border-radius: 6px;
        background-color: #FFFFFF;
    }

    .autre-detail-condition {
        color: #000000;
        font-family: Roboto;
        font-size: 14px;
        letter-spacing: 0.31px;
        line-height: 18px;
    }

    .option-retour-jour {
        height: 41px;
        width: 118px;
        border: 1px solid #979797;
        border-radius: 6px;
        background-color: #FFFFFF;color: #4A4A4A;
        font-family: Roboto;
        font-size: 14px;
        letter-spacing: -0.34px;
        line-height: 16px
    }

</style>

<style>
    .negociation-hr {
        box-sizing: border-box;
        height: 1px;
        width: 366px;
        border: 1px solid #979797;margin-left:96px;
    }

    .main-negociation-section {
        height: 242px;
        width: 558px ;padding-bottom: 10px; padding-top: 15px;
        background-color: #F8F8F8;
    }

    .negociation-container-div {
        border-left:3px solid #1A7EF5;
        height: 212px; width: 558px;
        border-radius: 0 1.5px 1.5px 0;
        padding-left: 20px
    }

    .form-check-box-label-costom {
        color: #191970;
        font-family: Roboto;
        font-size: 14px;
        font-weight: 500;
        letter-spacing: 0.31px;
        line-height: 18px;margin-left: 5px;
        position: relative;
        top: -3px;
    }

    .negociation-p-text {
        color: #9B9B9B;
        font-family: Roboto;
        font-size: 14px;
        letter-spacing: 0.31px;
        line-height: 15px;margin-left: 30px;
    }

</style>


<style>
    .accepte-automatique-offre {
        color: #000000;
        font-family: Roboto;
        font-size: 14px;
        font-weight: 500;
        letter-spacing: 0.31px;
        line-height: 18px;margin-left: 5px; position: relative;top: 2px
    }

    .accepte-automatique-offre-input {
        width: 150px;height:41px;
        border-bottom-left-radius: 5px;border-top-left-radius: 5px;
        font-size: 18px;border: 1px solid #9B9B9B;
        padding-left:10px; background-color: #D8D8D8;
    }

    .accepte-automatique-offre-divise {
        color: #4A4A4A; font-family: Roboto; font-size: 14px;
        letter-spacing: -0.34px;
        line-height: 16px;background-color: #D8D8D8;
        width: 99px;height:41px;
        border-top-right-radius:5px;border-bottom-right-radius: 5px;
        margin-left:0px;margin-top:0px;border: 1px solid #9B9B9B;
        border-left:0px;text-align:center;padding-top:13.5px;
    }

    .refuse-offre-inferieur-input {
        height: 16px;
        width: 16px;
        border-radius: 2px;
        margin-left: 20px;
    }

    .refuse-offre-inferieur-label {
        color: #000000;
        font-family: Roboto;
        font-size: 14px;
        font-weight: 500;
        letter-spacing: 0.31px;
        line-height: 18px; margin-left: 5px; position: relative;top: 3px
    }

    .refuse-offre-inferieur-devise {
        color: #4A4A4A;
        font-family: Roboto;
        font-size: 14px;
        letter-spacing: -0.34px;
        line-height: 16px; background-color: #D8D8D8;width: 99px;
        height:41px;border-top-right-radius:5px;border-bottom-right-radius: 5px;
        margin-left: 0px;border: 1px solid #9B9B9B; border-left:0px;text-align:center;padding-top:13.5px
    }

    .refuse-offre-inferieur-input-d {
        width: 150px;height:41px;
        border-bottom-left-radius: 5px;
        border-top-left-radius: 5px;font-size: 18px;
        border: 1px solid #9B9B9B; padding-left:10px;
        background-color: #D8D8D8;
    }

</style>

<style>
    .achat-multiple-section {
        height: 230px;
        width: 558px;
        background-color: #F8F8F8;
        padding-top: 15px;padding-bottom: 15px;
    }

    .achat-multiple-hr {
        box-sizing: border-box;
        height: 1px;
        width: 366px;
        border: 1px solid #979797;margin-left:96px;
    }

    .row-achat1 {
        height: 18px;
        width: 118px;
        color: #191970;
        font-family: Roboto;
        font-size: 14px;
        font-weight: 500;
        letter-spacing: 0.31px;
        line-height: 18px;
    }

    .row-achat2 {
        height: 20px;
        /* background: #1A7EF5; */
        padding: 0px;
    }

    .input-checkbox-element-12 {
        height: 18px;
        width: 18px;
        border-radius: 2px; margin:0px;
    }

</style>

<style>
    .achat-multiple-checkbox-2 {
        height: 16px;
        width: 16px;
        border-radius: 2px;
    }

    .offre-reduction-label {
        height: 18px;
        width: 493px;
        color: #000000;
        font-family: Roboto;
        font-size: 14px;
        letter-spacing: 0.31px;
        line-height: 18px;
    }

    .achat-multiple-container {
        border-left:3px solid #1A7EF5;
        padding-left:20px; border-top-left-radius: 2px;
        height: 200px;
    }

    .achat-multiple-input-1 {
        height: 16px;
        width: 16px;
        border-radius: 2px;
        margin-left:15px; margin-top:-1px
    }

    .acheter-5-label {
        color: #000000;
        font-family: Roboto;
        font-size: 14px;
        letter-spacing: 0.31px;
        line-height: 18px;margin-left:5px;
    }

    .acheter-5-select {
        height: 33px;
        width: 73px;
        border: 1px solid #979797;
        border-radius: 6px;

        background-color: #FFFFFF;color: #4A4A4A;
        font-family: Roboto;
        font-size: 14px;
        letter-spacing: -0.34px;
        line-height: 16px;margin-left: 5px;
    }

    .acheter-5-pourcentage {
        color: #000000;
        font-family: Roboto;
        font-size: 14px;
        letter-spacing: 0.31px;
        line-height: 18px; margin-left: 5px
    }

</style>

{{-- **********************************3 --}}
<style>
    .acheter-15-pourcentage {
        color: #000000;
        font-family: Roboto;
        font-size: 14px;
        letter-spacing: 0.31px;
        line-height: 18px; margin-left: 5px;
    }

    .acheter-20-div-container {
        height: 33px; display: flex; justify-content:flex-start; align-items: center;
    }

    .acheter-20-input-checkbox {
        height: 16px;
        width: 16px;
        border-radius: 2px;
        margin-left:15px; margin-top:-1px
    }

    .acheter-20-label {
        color: #000000;
        font-family: Roboto;
        font-size: 14px;
        letter-spacing: 0.31px;
        line-height: 18px;margin-left:5px;
    }

    .acheter-20-select {
        height: 33px;
        width: 73px;
        border: 1px solid #979797;
        border-radius: 6px;

        background-color: #FFFFFF;color: #4A4A4A;
        font-family: Roboto;
        font-size: 14px;
        letter-spacing: -0.34px;
        line-height: 16px;margin-left: 5px;
    }

    .acheter-20-pourcentage {
        color: #000000;
        font-family: Roboto;
        font-size: 14px;
        letter-spacing: 0.31px;
        line-height: 18px; margin-left: 5px;
    }

</style>

<style>

    .retour-internationaux-input {
        height: 16px;
        width: 16px;
        border-radius: 2px;
        margin-left: 0px;
    }

    .frais-international {
        height: 41px;
        width: 218px  !important;
        border: 1px solid #979797;
        border-radius: 6px;
        background-color: #FFFFFF;color: #4A4A4A;
        font-family: Roboto;
        font-size: 14px;
        letter-spacing: -0.34px;
        line-height: 16px; margin-top: 5px
    }

    .apres-avoir-recu {
        height: 36px;
        width: 247px;
        color: #000000;
        font-family: Roboto;
        font-size: 14px;
        letter-spacing: 0.31px;
        line-height: 18px;
    }

    .retour-internationaux-accepte {
        height: 18px;
        color: #000000;
        font-family: Roboto;
        font-size: 14px;
        letter-spacing: 0.31px;
        line-height: 18px;
    }
</style>


        <input id="prix_achat" class="prix-achat-input-costum" type="text" placeholder="--" value="" >

        <div class="input-group-prepend PA" style="position: relative; top: -6px">
            <span id="currency" class="prix-achat-devise">Fcfa (XAF)</span>

        </div>


        <div style="margin-left: 260px;margin-top: -70px;">
            <p style="" class="quantite" style="position: relative;"><small class="red-star">*</small>Quantité</p>
            <input  type="text" id="quantite_produit_disponible"  placeholder="1" class="input-quantite-produit">
        </div>
        <div style="display: flex">
        <div style="position: relative; left: 22px">
            <input class="form-check-input input-vente-par-lot" type="checkbox" id="vente_par_lot" onclick="checkvente_par_lot()">
            <label class="form-check-label vente-en-lot-label" for="defaultCheck1" >Vendre par lot</label>
            <small class="tooltips">
                <img src="assets/images/icones-vendeurs2/Information.svg" width="20px" height="20px" style="margin-left: 0;">
                <span class="tooltiptext"><p>
                    Groupez les objets similaires ou identiques
                    (ex: un paquet de cigarette, quatre pommes, une collection de CD) que
                    vous voulez vendre ensemble à un même acheteur.
                </p></span>

            </small>
        </div>
        <input class="desable-input input-vente-en-lot-2" type="text" placeholder="Nombre d’objet dans le lot" id="nbre_produit_lot">
        </div>

        {{-- <div class="tooltips">Verifier tool tip!

    </div> --}}
    </div>
</section>


<hr class="negociation-hr">
            {{-- negociation --}}
<section class="main-negociation-section">
{{-- border level  --}}
    <div class="negociation-container-div">
    {{-- content level  --}}
    <div style="height: 212px; width: 518px;">
        {{-- row 1 ok--}}
        <div class="row1-vente" style="padding: 0px; height: 20px; margin-bottom: 7px">
            <input class="form-check-input input-checkbox-element-12" type="checkbox" id="negociation_prix" onclick="check_negociation()">
            <label class="form-check-label form-check-box-label-costom" for="defaultCheck1" style="">NEGOCIATION DU PRIX D'ACHAT</label>
        </div>
        {{-- row 2 --}}
        <div class="row2-vente" >
        <p class="negociation-p-text">Vendez plus facilement en permettant aux acheteurs de négocier le prix. <br>Vous pouvez accepter, refuser ou faire une contre-offre.<br> Autorisez les acheteurs à faire des offres. Si vous acceptez de recevoir<br> des offres,
            vous avez des chances en plus de vendre vos objets.</p>
        </div>

        {{-- <div class=""> --}}
        <div class="negociation-sous-section negociation-section" id="negociation-desactivation" style="position: relative;  margin-top: 24px;">
            {{-- row 3 --}}
            <div class="row-vente3"  style=" display: flex; height: 41px">
            <div>
            <input class="form-check-input" value="accepter" type="checkbox" id="accepter_offre_inferieur" data-valeur="accepter_offre_inferieur-valeur" style="  height: 16px;
            width: 16px; border-radius: 2px; margin-left: 20px;" >
        <label class="form-check-label accepte-automatique-offre" for="accepter_offre_inferieur">Accepter automatiquement les <br>offres d'au moins</label>
        </div>

        <div class="input-group input-group mb-3" style="width: 255px;  position: relative; left: 11px">
            <input  type="text" class="negociation-section-desabled accepte-automatique-offre-input" id="accepter_offre_inferieur-valeur" placeholder="-" >
            <span  id="inputGroup-sizing" class="accepte-automatique-offre-divise">Fcfa (XAF)</span>
    </div>
    </div>

    <div class="row4-vente" style="position: relative; top: 15px; height: 41px; display: flex">
        <div>
            <input value="refuser" class="form-check-input refuse-offre-inferieur-input" id="refuse_offre_inferieur" data-valeur="refuse_offre_inferieur-value" type="checkbox" >
            <label class="form-check-label refuse-offre-inferieur-label" for="refuse_offre_inferieur" style=" ">Refuser automatiquement les <br>offres inférieures à </label>
        </div>

        <div class="input-group input-group mb-3" style="width: 255px;  position: relative; left: 20px">

            <input class="negociation-section-desabled refuse-offre-inferieur-input-d" value="" type="text" id="refuse_offre_inferieur-value"  placeholder="--" aria-describedby="inputGroup-sizing-sm" >

            <span id="currency2"  class="refuse-offre-inferieur-devise">Fcfa (XAF)</span>
        </div>
    </div>
    </div>
</div>
{{-- row 4 --}}

    </div>
{{-- </div>
</div> --}}

    </section>

    {{-- fin negociation prix  --}}
    <hr class="achat-multiple-hr">

    <section class="achat-multiple-section">


    <div class="achat-multiple-container">

        <div class="row-achat1" style="margin-bottom: 10px; ">
            ACHAT MULTIPLE
        </div>

        <div class="row-achat2" style="margin-bottom: 24px; margin-left: 20px">
            <input class="form-check-input achat-multiple-checkbox-2" id="check_negociation_reduction" type="checkbox" id="defaultCheck1"  onclick="check_negociation_reduction()">
            <label class="form-check-label offre-reduction-label" for="defaultCheck1" >Offrez une réduction aux membres qui achètent plusieurs objets à la fois.</label>
        </div>

        <div class="achat-multiple-values negociation-section" id="achat-multiple-values" >
            <div style="height: 33px; display: flex; justify-content:flex-start; align-items: center; margin-bottom: 15px">
                <input class="form-check-input achat-multiple-input-1" id="negocier-1" type="checkbox" id="defaultCheck1"  value="5" onclick="check_nagociation_value()" data-select-value="negocier-1-value">

            <label class="form-check-label acheter-5-label" for="defaultCheck1" style=" " >Achetez 05 objets ou plus et économisez</label>

            <select id="negocier-1-value" class="form-select-f negociation-section-desabled acheter-5-select" aria-label="Default select example" >
            <option value="">--</option>
            <option value="1">5%</option>
            <option value="2">10%</option>
            <option value="3">15%</option>
            <option value="4">20%</option>
            <option value="5">25%</option>
            <option value="6">30%</option>
            <option value="7">35%</option>
            <option value="8">40%</option>
            <option value="9">45%</option>
            <option value="10">50%</option>
            <option value="11">55%</option>
            <option value="12">60%</option>
            <option value="13">65%</option>
            <option value="14">70%</option>
            <option value="15">75%</option>
            <option value="16">80%</option>
            <option value="17">85%</option>
            <option value="18">90%</option>

            </select>
            <span class="acheter-5-pourcentage">% sur chaque objet.</span>

            </div>

            {{-- **************************2 --}}

            <div class="acheter-15-div-container">
                <input class="form-check-input acheter-15-checkbox" id="negocier-2" type="checkbox" id="defaultCheck1" value="15" onclick="check_nagociation_value2()" data-select-value="negocier-2-value">

            <label class="form-check-label acheter-15-label" for="defaultCheck1" >Achetez 15 objets ou plus et économisez</label>

            <select id="negocier-2-value" class="form-select-f negociation-section-desabled acheter-15-select" >
            <option value="">--</option>
            <option value="1">5%</option>
            <option value="2">10%</option>
            <option value="3">15%</option>
            <option value="4">20%</option>
            <option value="5">25%</option>
            <option value="6">30%</option>
            <option value="7">35%</option>
            <option value="8">40%</option>
            <option value="9">45%</option>
            <option value="10">50%</option>
            <option value="11">55%</option>
            <option value="12">60%</option>
            <option value="13">65%</option>
            <option value="14">70%</option>
            <option value="15">75%</option>
            <option value="16">80%</option>
            <option value="17">85%</option>
            <option value="18">90%</option>
            </select>
            <span class="acheter-15-pourcentage">% sur chaque objet.</span>

            </div>


            <div class="acheter-20-div-container">
                <input class="form-check-input acheter-20-input-checkbox" id="negocier-3" type="checkbox" id="defaultCheck1" value="20" onclick="check_nagociation_value3()" data-select-value="negocier-3-value">

            <label class="form-check-label acheter-20-label" for="defaultCheck1" >Achetez 20 objets ou plus et économisez</label>

            <select id="negocier-3-value" class="form-select-f negociation-section-desabled acheter-20-select" >
            <option value="">--</option>
            <option value="1">5%</option>
            <option value="2">10%</option>
            <option value="3">15%</option>
            <option value="4">20%</option>
            <option value="5">25%</option>
            <option value="6">30%</option>
            <option value="7">35%</option>
            <option value="8">40%</option>
            <option value="9">45%</option>
            <option value="10">50%</option>
            <option value="11">55%</option>
            <option value="12">60%</option>
            <option value="13">65%</option>
            <option value="14">70%</option>
            <option value="15">75%</option>
            <option value="16">80%</option>
            <option value="17">85%</option>
            <option value="18">90%</option>
            </select>
            <span class="acheter-20-pourcentage">% sur chaque objet.</span>

            </div>
        </div>
    </div>

</section>

<hr class="option-retour-hr">

<style>

    .option-retour-hr {
        box-sizing: border-box;
        height: 1px;
        width: 366px;
        border: 1px solid #979797;margin-left:96px;
    }

    .option-retour-main-container {
        height: 383px;
        width: 558px;
        background-color: #F8F8F8;
        padding-top:15px; padding-bottom:15px;
    }

    .option-retour-div-element {
        border-left:3px solid #1A7EF5;padding-left:20px;
        border-top-left-radius: 2px; height: 353px;
    }

    .option-retour-article {
        height: 18px;
        width: 207px;
        color: #191970;
        font-family: Roboto;
        font-size: 14px;
        font-weight: 500;
        letter-spacing: 0.31px;
        line-height: 14px; margin-bottom: 10px
    }

    .main-retour-section-1 {
        display: flex; flex-direction: column; width: 225px
    }

    .retour-national-input {
        height: 16px;
        width: 16px;
        border-radius: 2px;
        margin-left: 0px;
    }

    .frais-nationnaux-select {
        height: 41px;
        width: 218px !important;
        border: 1px solid #979797;
        border-radius: 6px;
        background-color: #FFFFFF;color: #4A4A4A;
        font-family: Roboto;
        font-size: 14px;
        letter-spacing: -0.34px;
        line-height: 16px; margin-top: 5px
    }

    .retour-nationaux-accepte {
        height: 18px;
        color: #000000;
        font-family: Roboto;
        font-size: 14px;
        letter-spacing: 0.31px;
        line-height: 18px;
    }

    .apres-avoir-recu-2 {
        height: 36px;
        width: 247px;
        color: #000000;
        font-family: Roboto;
        font-size: 14px;
        letter-spacing: 0.31px;
        line-height: 18px;
    }

    .delais-annulation-2 {
        height: 41px;
        width: 118px;
        border: 1px solid #979797;
        border-radius: 6px;
        background-color: #FFFFFF;color: #4A4A4A;
        font-family: Roboto;
        font-size: 14px;
        letter-spacing: -0.34px;
        line-height: 16px
    }

    .frais-retour-22 {
        color: #000000;
        font-family: Roboto;
        font-size: 14px;
        letter-spacing: 0.31px;
        line-height: 18px;
    }

</style>

<section class="option-retour-main-container">
    <div class="option-retour-div-element">

        <div class="retour-row-1" style="margin-bottom: 10px">
            <span class="option-retour-article">
                    OPTION DE RETOUR D'ARTICLE</span>
        </div>
        <div class="retour-row-2" style="display: flex; column-gap: 50px">
            {{-- ************* --}}
            <div class="main-retour-section main-retour-section-1" id="option-retour-nationaux-zone">
            <div >
                <input class="form-check-input retour-national-input" id="retour-nationaux" value="Retour national" type="checkbox" >
                <label class="form-check-label retour-nationaux-accepte" for="defaultCheck1" >Retours nationaux acceptés.</label>
            </div>

            {{-- ***************************** --}}

            <div class="retour-section-desabled" id="section-national">
                <div style="height: 36px; width: 247px; margin-right: 24px; margin-top: 15px">
                    <span class="apres-avoir-recu-2">Après avoir reçu l'objet, l'acheteur doit<br>
                    annuler l'achat dans un délai de :</span>
                </div>

                <div style="margin-right: 153px; margin-top: 5px">
                    <select id="delais-annulation-national" class="form-select-f delais-annulation-2" aria-label="Default select example" >
                    <option value="">-- --</option>

                    <option value="1">14 jours</option>
                    <option value="2">30 jours</option>
                    <option value="3">60 jours</option>
                </select>
                    </div>

                    {{-- ************************* --}}
                    <div style="margin-right: 33px; margin-top: 15px">
                    <span class="frais-retour-22">Les frais de retour :</span>
                        <select class="form-select-f frais-nationnaux-select" id="frais-nationaux">
                        <option value="Gratuit" selected>Vendeur(gratuit)</option>
                        <option value="A vos frais">Acheteur</option>
                    </select>
                </div>
            </div>
            {{-- fin section vérouillé --}}
            </div>

            {{-- class verouillage --}}
            <div class="main-retour-section" style="display: flex; flex-direction: column; width: 240px;" id="option-retour-internationaux-zone">
            <div style="" style="margin-right: 68px;">
                <input class="form-check-input retour-internationaux-input" id="retour-internationaux" value="Retour national" type="checkbox" >
                <label class="form-check-label retour-internationaux-accepte" for="defaultCheck1" >Retours internationaux acceptés.</label>
            </div>

            <div class="retour-section-desabled" id="section-international">
            <div style="height: 36px; width: 247px; margin-right: 24px; margin-top: 15px">
                <span class="apres-avoir-recu">Après avoir reçu l'objet, l'acheteur doit<br>
                annuler l'achat dans un délai de :</span>
            </div>

            <div style="margin-right: 153px; margin-top: 5px">
                <select id="detail_annulation_international" class="form-select-f option-retour-jour"  >
                <option value="">-- --</option>
                <option value="1">14 jours</option>
                <option value="2">30 jours</option>
                <option value="3">60 jours</option>
            </select>
                </div>


                {{-- ************************* --}}
                <div style="margin-right: 33px; margin-top: 15px">
                <span class="frais-retour-element">Les frais de retour  :</span>
                    <select class="form-select-f frais-international" id="frais-internationaux">
                    <option value="Vendeur" selected>Vendeur</option>
                    <option value="Acheteur">Acheteur</option>
                </select>
            </div>
            </div>
            </div>

        </div>
        <div class="retour-row-3" style=" display: flex; ">

        </div>
        <div class="retour-row-4" style="display: flex; ">


        </div>

        <div class="retour-row-5" style="display: flex; ">

        </div>

        <div class="retour-row-6 retour-section-desabled" style="  height: 105px; width: 518px; margin-top: 25px" id="section-retour-description">
            <span class="autre-detail-condition">Autres détails sur les conditions de retour :</span>
            <textarea id="detail-retour" value="" name="w3reviewd" rows="4" cols="62" style="position: relative; border-radius: 6px; margin-top: 5px; padding-left: 5px"></textarea>
        </div>
    </div>

</section>

<script src="{{ asset('assets/jQuery-Mask-Plugin-master/dist/jquery.mask.min.js') }}"></script>
<script>
    $('#prix_achat').mask('0000000000');
    $('#quantite_produit_disponible').mask('00000000000');

        $('#currency').text('');
        $('#inputGroup-sizing').text('');
        $('#currency2').text('');
        $('#currency3').text('');
        $('#currency4').text('');

        var DevisesUser = sessionStorage.getItem("devises");

        $('#currency').text(DevisesUser);
        $('#inputGroup-sizing').text(DevisesUser);
        $('#currency2').text(DevisesUser);
        $('#currency3').text(DevisesUser);
        $('#currency4').text(DevisesUser);


</script>
