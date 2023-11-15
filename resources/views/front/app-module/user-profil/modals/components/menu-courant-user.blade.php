<style>
    .current-user-menu-element {
        padding-left: 30px;
        box-sizing: border-box;
        height: 34px;
        border: 1px solid #D8D8D8;
        border-radius: 6px;
        background-color: #FFFFFF;
        line-height: 28px;
        margin-right: 5px;
        margin-top: 4px;
        width: 100%;
        letter-spacing: 0.59px;
    }

    .applied-width {
        width: 457px !important;
    }

    .current-user-menu-element-1 {
        padding-left: 30px;
        box-sizing: border-box;
        border-radius: 6px;
        margin-right: -2px;
        margin-top: -34px;
        width: 357px;
        letter-spacing: 0.59px;
        position: absolute;
        margin-left: 471px;
    }

    .rectangle-select3-bis {
        border-radius: 6px;
        height: 34px;
        width: 184px;
        font-size: 14px;
        padding-left: 15px;
        appearance: none;
        background-image: url(/assets/images/icones-vendeurs2/arraow-down-full.svg);
        background-repeat: no-repeat;
        background-position: right 10px center;
        color: #4A4A4A;
        font-family: Roboto;
        font-size: 14px;
        letter-spacing: -0.34px;
        line-height: 16px;
        background-color: #F8F8F8;
        border: 1px solid #9B9B9B;
        padding-left: 10px !important;
    }

    .detail-commade-price {
        height: 14px;
        /* width: 82px; */
        color: #191970;
        font-family: Roboto;
        font-size: 14px;
        letter-spacing: 0;
        line-height: 14px;
    }

    #tris_par_date .select2-container, #tris_par_date .select2 {
        height: 25px !important;
    }

</style>

<div  class="current-user-menu-element" id="defaul-menu-courant-user">
    <div class="d-flex" style="margin-top: 1px">
        <span style="color: #191970;font-size: 11px; margin-right: 5px; font-style: italic; font-size: 12px; ">Mon Profil
            <img style="height: 11px;width: 11px; " src="{{  asset('assets/images/chevron_right.svg') }}" alt="">
        </span>
        &nbsp;&nbsp;
        &nbsp;&nbsp;<span style="color: #191970;font-size: 11px; margin-left: -19px" ><span id="nav-module-element" style="font-style: italic; font-size: 12px;">Général</span>
            <img style="height: 11px;width: 11px; margin-right: 5px" src="{{  asset('assets/images/chevron_right.svg') }}" alt="">
        </span>
        &nbsp;&nbsp;<span style=" color: #4A4A4A;font-size: 12px; margin-left: -9px" id="nav-nemu-module-element">Mes informations personnelles</span>
    </div>
</div>

<div  class="current-user-menu-element-1 hide-commande-tr" style="display: flex; column-gap:5px"- id="commande-options-zone">

    <select name="payscite" id="tris_par_date" class="rectangle-select3-bis my-selectkkk" style="width: 194px !important; margin-right: 10px; visibility:visible; height: 30px !important; margin-right: 10px">
        <option value="all">Toutes</option>
        <option value="this_week">Cette semaine</option>
        <option value="this_month">Ce mois-ci</option>
        <option value="three_last_months">3 derniers mois</option>
        <option value="six_last_month">6 derniers mois</option>
        <option value="this_year">Cette année</option>
    </select>

    <select name="payscite" id="tous_les_prix" class="rectangle-select3-bis my-selectkkk" style="width: 194px !important; height: 30px !important;">
        <option value="Tous les prix">Toutes</option>
        <option value="croissant">Croissant</option>
        <option value="decroissant">Décroissant</option>
    </select>

</div>
