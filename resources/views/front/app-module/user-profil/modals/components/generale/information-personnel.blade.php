
    <style type="text/css">
        @import url('https://fonts.googleapis.com/css2?family=Gelasio:ital@1&family=Licorice&family=Noto+Sans&family=Roboto:wght@300;400&family=Tajawal:wght@300&display=swap');

        .row-contanier {
            width: 1212px;
            height: 579px;
            position: relative;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .col-left {
            height: 579px;
            width: 320px;
            /* margin-top: 5px; */
        }

        .row-right {
            height: 579px;
            width: 859px;
            margin-right: 5px;
        }

        .profil-card {
            box-sizing: border-box;
            height: 79px;
            width: 320px;
            border: 1px solid #D8D8D8;
            border-radius: 7px 6px 6px 7px;
            background-color: #FFFFFF;
            display: flex;
            justify-content: flex-start;
            align-items: center;
            margin-left: 5px;
            margin-top: 5px;
        }

        .user-infos {
            height: 71px;
            width: 201px;
            color: #191970;
            font-family: Roboto;

            font-weight: 500;
            letter-spacing: -0.51px;
            line-height: 23px;
        }

        .user-phrase-appel {
            width: 205px;
            color: #191970;
            font-family: Roboto;
            font-size: 21px;
            font-weight: 500;
            letter-spacing: -0.51px;
            line-height: 24px;
        }

        .user-name {
            width: 205px;
            color: #191970;
            font-family: Roboto;
            font-size: 21px;
            font-weight: 700;
            letter-spacing: -0.51px;
            line-height: 24px;
        }

        .user-ref {
            color: #191970;
            font-family: Roboto;
            font-size: 14px;
            font-weight: 300;
            letter-spacing: 0;
            line-height: 16px;
        }

        .user-infos h6 {
            margin: 0px;
            padding: 0px !important;
        }

        .icon-element {
            position: absolute;
            margin-left: 9.5px;
        }

        .profil-icon-1 {
            height: 18px;
            width: 18px;
            margin-right: 23px;
        }

        .profil-icon-2 {
            height: 18px;
            width: 18px;
        }

        .section-2-contanier {
            box-sizing: border-box;
            height: 473px;
            width: 320px;
            border: 1px solid #D8D8D8;
            border-radius: 6px;
            background-color: #FFFFFF;
            display: flex;
            justify-content: center;
            align-items: center;
            margin-left: 5px;
        }

        .card-section {
            height: 433px;
            width: 280px;
        }

        .card .card-header {
            box-sizing: border-box;
            height: 30px;
            width: 280px;
            border: 1px solid #9B9B9B;
            border-radius: 6px 6px 0 0;
            background-color: #9B9B9B;

            color: #FFFFFF;
            font-family: Roboto;
            font-size: 14px;
            font-weight: 500;
            letter-spacing: 0;
            line-height: 16px;
        }

        .card ul li {
            height: 30px;
            width: 280px;
            color: #4A4A4A;
            font-family: Roboto;
            font-size: 14px;
            font-weight: 500;
            letter-spacing: 0;
            line-height: 16px;
        }

        .card-1 {

        }

        .menu-section {
            box-sizing: border-box;
            height: 34px;
            /* width: 858px; */
            border: 1px solid #D8D8D8;
            border-radius: 6px;
            margin-top: 5px;
        }
/*
        .navbar {
            box-sizing: border-box;
            height: 34px;
            width: 857px;
            border: 1px solid #D8D8D8;
            border-radius: 6px;
            background-color: #1A7EF5;
            margin-top: 5px;

        }

        .navbar .breadcrumb {
            margin-top: 12px;
            margin-left: 30.5px;
        }

        nav ol li {
            font-family: Roboto;
            font-size: 10px;
            letter-spacing: -0.24px;
            line-height: 11px;
        } */

        .section-droite-1 {
            box-sizing: border-box;
            height: 524px;
            width: 857px;
            border-radius: 6px;
            display: flex;
            flex-direction: column;
            justify-content: flex-start;
            align-items: flex-start;

        }

        .section-button {
            display: flex;
            justify-content: flex-start;
            align-items: flex-start;
            position: relative;
            left: -1px;
            margin-top:5px;
        }

        .button-general {
            box-sizing: border-box;
            height: 37px;
            width: 422px;
            border: 1px solid #1A7EF5;
            border-radius: 6px;
            margin-left: 5px;
            background-color: #FFFFFF;
            margin-right: 3px;
            color: #191970;
            display: flex;
            justify-content: center;
            align-items: center;
            cursor: pointer;
            font-family: Roboto;
            font-size: 16px;
            font-weight: 500;
            letter-spacing: -0.39px;
            line-height: 17px;
            cursor: pointer;
            margin-top: -2px;
        }

        .button-general span {
            color: #191970;
            font-family: Roboto;
            font-size: 16px;
            font-weight: 500;
            letter-spacing: -0.39px;
            line-height: 17px;
            cursor: pointer;


        }

        .button-connexion {
            box-sizing: border-box;
            height: 37px;
            width: 422px;
            border: 1px solid #9B9B9B;
            border-radius: 6px;
            background-color: #D8D8D8;
            color: #4A4A4A;
            display: flex;
            justify-content: center;
            align-items: center;
            cursor: pointer;
            font-family: Roboto;
            font-size: 16px;
            font-weight: 500;
            letter-spacing: -0.39px;
            line-height: 17px;
            margin-top: -2px;
        }

        .button-connexion span {
            color: #4A4A4A;
            font-family: Roboto;
            font-size: 16px;
            font-weight: 500;
            letter-spacing: -0.39px;
            line-height: 17px;
        }

        .section-title {
            color: #191970;
            font-family: Roboto;
            font-size: 15px;
            font-weight: 500;
            letter-spacing: -0.36px;
            line-height: 17px;
            position: relative;
            left: 15px;
            margin-top: 30px;
        }

        .form-section {
            display: flex;
            justify-content: center;
            align-items: center;
            position: relative;
            left: 15px;
        }

        .form-left {
            height: auto;
            width: 402px;
        }

        .form-right {
            height: auto;
            width: 402px;
        }

        .checkbox-section {
            box-sizing: border-box;
            height: 41px;
            width: 194px;
            border: 1px solid #9B9B9B;
            border-radius: 6px;
            background-color: #FFFFFF;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .input-element {
            box-sizing: border-box;
            height: 41px;
            width: 194px;
            border: 1px solid #9B9B9B;
            border-radius: 6px;
            background-color: #F8F8F8;
        }

        .input-element-lg {
            box-sizing: border-box;
            height: 41px;
            width: 402px;
            border: 1px solid #9B9B9B;
            border-radius: 6px;
            background-color: #F8F8F8;
        }

        .img-bottom {
            height: 219px;
            width: 857px;
            position: absolute;
            bottom: 5px;
            background-image: url('/uploads/avatars/back_picture.webp');
            background-position:center bottom;
            background-size:contain;
            z-index: 1;
            background-repeat: no-repeat;
        }

        .img-bottom2 {
            height: 217px;
            width: 857px;
            position: absolute;
            bottom: 4px;
            background-image: url('/uploads/avatars/back_connection.webp');
            background-position:center bottom;
            background-size:contain;
            z-index: 1;
            background-repeat: no-repeat;
        }

        .input-group-text {
            box-sizing: border-box;
            height: 41px;
            width: 41px;
            border: 1px solid #9B9B9B;
            border-radius: 6px 0 0 6px;
            background-color: #F8F8F8;
        }

        .input-group-text img{
            height: 19px !important;
            width: 19px !important;
            height: inherit;
            width: inherit;
            position: relative;
            left: -2px;
        }

        .over-flow-gradient {
            height: 33px;
            width: 79px;
            border-radius: 0 0 6px 6px;
            background: linear-gradient(180deg, rgba(0,0,0,0) 0%, #191970 100%);
            position:absolute;
            top: 50px;
            z-index: 999;
        }

        .fas, .svg1 {
            color: #FFFFFF;
            z-index: 61000;
        }

        .last-button {
            position: relative;
            float: right;
            right: -600px;
        }

        .last-button button {
            height: 37px;
            width: 194px;
            border: none;
            border-radius: 6px;
            background-color: #9B9B9B;

            color: #FFFFFF;
            font-family: Roboto;
            font-size: 16px;
            font-weight: 500;
            letter-spacing: 0.35px;
            line-height: 18px;
            text-align: center;
        }

        .badge {
            height: 20px;
            width: 26px;
            border-radius: 5px;
            background-color: #D0021B;
            position: absolute;
            float: right;
            right: 20px;
            top: 3px;
        }

        .list-group .list-group-item:hover{
            cursor: pointer;
            box-sizing: border-box;
            height: 30px;
            width: 280px;
            border: 1px solid #D0021B;
            border-left: 5px solid #D0021B;
            background-color: #F5F5F5;
            color: #191970;

            font-family: Roboto;
            font-size: 14px;
            font-weight: 500;
            letter-spacing: 0;
            line-height: 16px;
        }

        .check1 input {
            height: 20px;
            width: 20px;
            position: relative;
            top: 10.5px
        }

        .check1 label {
            color: #9B9B9B;
            font-family: Roboto;
            font-size: 15px;
            font-weight: 500;
            letter-spacing: -0.36px;
            line-height: 16px;
            position: relative;
            top: 6.5px;
            margin-left: 10px;
        }

        .active-element {
            cursor: pointer;
            box-sizing: border-box;
            height: 30px;
            width: 280px;
            border: 1px solid #D0021B;
            border-left: 5px solid #D0021B;
            background-color: #F5F5F5;
            color: #191970;
            font-family: Roboto;
            font-size: 14px;
            font-weight: 500;
            letter-spacing: 0;
            line-height: 16px;
        }

        .list-group {
            border: none;
        }

        .card{
            border: none;
        }

        .form-check-label {
            margin-right: 2px
        }

        .separator-sexe {
            position:absolute;
            float: left;
            margin-left: 96.5px;
            box-sizing: border-box;
            height: 39px;
            width: 0.5px;
            border: 0.5px solid #9B9B9B;
        }

        .hide {
            display: none !important;
        }


          .generalss{
            height: 19px;
            width: 53px;
            color: #191970;
            font-family: Roboto;
            font-size: 16px;
            font-weight: 500;
            letter-spacing: -0.39px;
            line-height: 17px;
            margin-top:1px
            }

            .connexion {
                height: 19px;
                width: 53px;
                color: #191970;
                font-family: Roboto;
                font-size: 16px;
                font-weight: 500;
                letter-spacing: -0.39px;
                line-height: 17px;
                margin-top:2px
            }
    </style>

<div id="info-perso" class="donnees-menu-profil">

    <!-- <div class="d-flex" style="margin: auto">
        <button data-id="#generale" class="button-info-perso general-info-perso mydata is-active" >
            <div class="text-center">
                <img src="{{  asset('assets/images/icon-edit-general-profil.svg') }}" alt=""> <span style="color: #191970; font-weight: 500;">Général</span>
            </div>
        </button>
        <button  data-id="#connexion" class=" button-info-perso connexion-info-perso mon-bg-grey btn-profil mydata">
            <div class="text-center">
                <img src="{{  asset('assets/images/cadena.svg') }}" alt=""> Connexion
            </div>
        </button>
    </div> -->
    <div class="r section-button">
        <div class="button-general general-info-perso mydata is-active" data-id="#generale" id="gen" >


<svg width="16px" height="16px" viewBox="0 0 16 15" id="unlock1" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
    <title>8E3BA111-A3B8-4B9A-A0A6-0C57FF09E913</title>
    <g id="Welcome" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
        <g id="Accueil-/-Général-/--Mon_Profil-/-Général" transform="translate(-634.000000, -230.000000)" fill="#191970" fill-rule="nonzero">
            <g id="Group-7" transform="translate(105.000000, 167.000000)">
                <g id="Group-5" transform="translate(529.500000, 61.000000)">
                    <g id="Icons/edit-off" transform="translate(0.000000, 2.000000)">
                        <g id="Icons/Modifier-Copy-4" transform="translate(1.071429, 1.071429)">
                            <path d="M4.37601993,1.28571429 C4.55017397,1.28571429 4.69131999,1.42949223 4.69131999,1.6066136 C4.69131999,1.78386031 4.55017397,1.92751291 4.37601993,1.92751291 L4.37601993,1.92751291 L1.57650029,1.92751291 C1.05428457,1.92813965 0.631215929,2.3588467 0.630600117,2.89021084 L0.630600117,2.89021084 L0.630600117,11.252521 C0.631215929,11.7840104 1.05428457,12.2147175 1.57650029,12.2152189 L1.57650029,12.2152189 L10.4234997,12.2152189 C10.9457154,12.2147175 11.368784,11.7840104 11.3693999,11.252521 L11.3693999,11.252521 L11.3693999,8.40328605 C11.3693999,8.22603934 11.5105459,8.08238674 11.6846999,8.08238674 C11.8588539,8.08238674 12,8.22603934 12,8.40328605 L12,8.40328605 L12,11.2526463 C11.9990147,12.1383786 11.2937771,12.85614 10.4234997,12.8571429 L10.4234997,12.8571429 L1.57650029,12.8571429 C0.706222881,12.85614 0.000985312682,12.1383786 0,11.2526463 L0,11.2526463 L0,2.89021084 C0.000985312682,2.00447858 0.706222881,1.2867171 1.57650029,1.28571429 L1.57650029,1.28571429 Z M10.0113731,0.423626114 C10.5762581,-0.141208705 11.4920774,-0.141208705 12.0569624,0.423626114 L12.0569624,0.423626114 L12.4341383,0.80076856 C12.9981444,1.36598006 12.9981444,2.2809648 12.4341383,2.84617626 L12.4341383,2.84617626 L6.69978364,8.58027311 C6.66048399,8.61956927 6.61176753,8.64794282 6.55827988,8.66275735 L6.55827988,8.66275735 L3.83580801,9.41691667 C3.72418704,9.44780119 3.60465593,9.41628895 3.52266663,9.33443246 C3.44080285,9.25245044 3.40928784,9.13292993 3.44030065,9.02131888 L3.44030065,9.02131888 L4.19440136,6.29908862 C4.20921717,6.24560572 4.23759327,6.19689355 4.27689289,6.15759742 L4.27689289,6.15759742 Z M4.67491144,6.97314913 L4.21147723,8.64580853 L5.88415954,8.18241546 L4.67491144,6.97314913 Z M9.67048344,1.67356959 L4.97725485,6.36650722 L6.49072972,7.87997334 L11.1840839,3.18703571 L9.67048344,1.67356959 Z M11.6023172,0.87810536 C11.2885481,0.564364016 10.7797875,0.564364016 10.4660183,0.87810536 L10.4660183,0.87810536 L10.1250031,1.2189648 L11.6387291,2.73255646 L11.9796187,2.39169702 C12.2928857,2.07770459 12.2928857,1.5693658 11.9796187,1.25524781 L11.9796187,1.25524781 Z" id="Combined-Shape"></path>
                        </g>
                    </g>
                </g>
            </g>
        </g>
    </g>
</svg>




<svg width="16px" height="16px"  id="unlock" class="bi bi-pencil-square hide"  viewBox="0 0 16 15" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
    <title>3BFD2BB8-6EE4-4F8A-B5B2-3079C10C48AE</title>
    <g id="Welcome" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
        <g id="Accueil-/-Générale-/---Mon_profil-/-Connexion" transform="translate(-634.000000, -231.000000)" fill="#4A4A4A" fill-rule="nonzero">
            <g id="Group-7" transform="translate(105.000000, 167.000000)">
                <g id="Fichier-5@11" transform="translate(350.000000, 48.000000)">
                    <g id="Group-9" transform="translate(5.000000, 5.000000)">
                        <g id="Group-5" transform="translate(174.500000, 9.000000)">
                            <g id="Icons/edit-off" transform="translate(0.000000, 2.000000)">
                                <g id="Icons/Modifier-Copy-4" transform="translate(1.071429, 1.071429)">
                                    <path d="M4.37601993,1.28571429 C4.55017397,1.28571429 4.69131999,1.42949223 4.69131999,1.6066136 C4.69131999,1.78386031 4.55017397,1.92751291 4.37601993,1.92751291 L4.37601993,1.92751291 L1.57650029,1.92751291 C1.05428457,1.92813965 0.631215929,2.3588467 0.630600117,2.89021084 L0.630600117,2.89021084 L0.630600117,11.252521 C0.631215929,11.7840104 1.05428457,12.2147175 1.57650029,12.2152189 L1.57650029,12.2152189 L10.4234997,12.2152189 C10.9457154,12.2147175 11.368784,11.7840104 11.3693999,11.252521 L11.3693999,11.252521 L11.3693999,8.40328605 C11.3693999,8.22603934 11.5105459,8.08238674 11.6846999,8.08238674 C11.8588539,8.08238674 12,8.22603934 12,8.40328605 L12,8.40328605 L12,11.2526463 C11.9990147,12.1383786 11.2937771,12.85614 10.4234997,12.8571429 L10.4234997,12.8571429 L1.57650029,12.8571429 C0.706222881,12.85614 0.000985312682,12.1383786 0,11.2526463 L0,11.2526463 L0,2.89021084 C0.000985312682,2.00447858 0.706222881,1.2867171 1.57650029,1.28571429 L1.57650029,1.28571429 Z M10.0113731,0.423626114 C10.5762581,-0.141208705 11.4920774,-0.141208705 12.0569624,0.423626114 L12.0569624,0.423626114 L12.4341383,0.80076856 C12.9981444,1.36598006 12.9981444,2.2809648 12.4341383,2.84617626 L12.4341383,2.84617626 L6.69978364,8.58027311 C6.66048399,8.61956927 6.61176753,8.64794282 6.55827988,8.66275735 L6.55827988,8.66275735 L3.83580801,9.41691667 C3.72418704,9.44780119 3.60465593,9.41628895 3.52266663,9.33443246 C3.44080285,9.25245044 3.40928784,9.13292993 3.44030065,9.02131888 L3.44030065,9.02131888 L4.19440136,6.29908862 C4.20921717,6.24560572 4.23759327,6.19689355 4.27689289,6.15759742 L4.27689289,6.15759742 Z M4.67491144,6.97314913 L4.21147723,8.64580853 L5.88415954,8.18241546 L4.67491144,6.97314913 Z M9.67048344,1.67356959 L4.97725485,6.36650722 L6.49072972,7.87997334 L11.1840839,3.18703571 L9.67048344,1.67356959 Z M11.6023172,0.87810536 C11.2885481,0.564364016 10.7797875,0.564364016 10.4660183,0.87810536 L10.4660183,0.87810536 L10.1250031,1.2189648 L11.6387291,2.73255646 L11.9796187,2.39169702 C12.2928857,2.07770459 12.2928857,1.5693658 11.9796187,1.25524781 L11.9796187,1.25524781 Z" id="Combined-Shape"></path>
                                </g>
                            </g>
                        </g>
                    </g>
                </g>
            </g>
        </g>
    </g>
</svg>
                &nbsp <span class="generalss">Général</span>

        </div>


<div data-id="#connexion" class="button-connexion connexion-info-perso mon-bg-grey btn-profil mydata" id="con">

<svg width="16px" height="16px" viewBox="0 0 14 15"  id="lock1" class="bi bi-lock hide" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
    <title>3B8865A5-1ED4-48C5-A61A-49B29ACC726F</title>
    <g id="Welcome" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
        <g id="Accueil-/-Générale-/---Mon_profil-/-Connexion" transform="translate(-1050.000000, -231.000000)" fill="#191970" fill-rule="nonzero">
            <g id="Group-7" transform="translate(105.000000, 167.000000)">
                <g id="Fichier-5@11" transform="translate(350.000000, 48.000000)">
                    <g id="Group-9" transform="translate(5.000000, 5.000000)">
                        <g id="Group-4" transform="translate(590.500000, 9.000000)">
                            <g id="Group-3" transform="translate(0.000000, 2.000000)">
                                <g id="padlock" transform="translate(0.760000, 0.000000)">
                                    <path d="M9.95014663,6.375 L9.95014663,4.00105932 C9.95687425,2.92690678 9.50276005,1.8940678 8.69208211,1.14088983 C7.90831465,0.403601695 6.88235294,0 5.79584268,0 C5.77902363,0 5.75884078,0 5.74202174,0 C3.42435743,0.0031779661 1.54062446,1.79555085 1.54062446,4.00105932 L1.54062446,6.375 C0.666034156,6.47351695 0.0269104709,7.16631356 0.0269104709,8.00529661 L0.0269104709,13.3379237 C0.0269104709,14.2436441 0.793858893,14.9904661 1.75254442,14.9904661 L9.74159048,14.9904661 C10.700276,14.9904661 11.4672244,14.2436441 11.4672244,13.3379237 L11.4672244,8.00529661 C11.4638606,7.16949153 10.8247369,6.47351695 9.95014663,6.375 Z M2.21002243,4.00105932 L2.21338623,4.00105932 C2.21338623,2.14512712 3.79774021,0.626037647 5.74538554,0.626037647 L5.74874935,0.626037647 C6.67379679,0.622881356 7.56184233,0.969279661 8.21778506,1.58580508 C8.90063826,2.22457627 9.28074866,3.09533898 9.27402105,4.00105932 L9.27402105,6.37817797 L8.53398309,6.37817797 L8.53398309,4.00105932 C8.54071071,3.27966102 8.23796791,2.58686441 7.69639469,2.07838983 C7.18509574,1.59533898 6.49215111,1.3220339 5.76893221,1.3220339 L5.74874935,1.3220339 C4.20139727,1.3220339 2.95006038,2.52330508 2.95006038,3.99788136 L2.95006038,6.37817797 L2.21002243,6.37817797 L2.21002243,4.00105932 L2.21002243,4.00105932 Z M7.86458513,4.00105932 L7.86458513,6.37817797 L3.62618596,6.37817797 L3.62618596,4.00105932 C3.62618596,2.87605932 4.57478006,1.96080508 5.75211316,1.96080508 L5.77229602,1.96080508 C6.31723305,1.96080508 6.84198723,2.16737288 7.22882525,2.53283898 C7.63920994,2.92055085 7.87131275,3.45127119 7.86458513,4.00105932 Z M10.8247369,13.3474576 L10.8247369,13.3474576 C10.8247369,13.9036017 10.3470761,14.3548729 9.75840952,14.3548729 L1.76599965,14.3548729 C1.1773331,14.3548729 0.699672244,13.9036017 0.699672244,13.3474576 L0.699672244,8.02118644 C0.699672244,7.46504237 1.1773331,7.01377119 1.76599965,7.01377119 L9.75840952,7.01377119 C10.3470761,7.01377119 10.8247369,7.46504237 10.8247369,8.02118644 L10.8247369,13.3474576 Z" id="Shape"></path>
                                    <path d="M6.90926341,10.4872881 C6.76125582,9.99470339 6.28695877,9.65783898 5.74538554,9.65783898 C5.07598758,9.65783898 4.53105054,10.1694915 4.53105054,10.8050847 C4.53105054,11.3167373 4.88761428,11.7648305 5.40900466,11.904661 L5.40900466,12.7944915 C5.40900466,12.9692797 5.56037606,13.1122881 5.74538554,13.1122881 C5.93039503,13.1122881 6.08176643,12.9692797 6.08176643,12.7944915 L6.08176643,11.904661 C6.72425392,11.7298729 7.09763671,11.0942797 6.90926341,10.4872881 Z M5.74538554,11.3135593 C5.44600656,11.3135593 5.20381232,11.0847458 5.20381232,10.8019068 C5.20381232,10.5190678 5.44600656,10.2902542 5.74538554,10.2902542 C6.04476453,10.2902542 6.28695877,10.5190678 6.28695877,10.8019068 C6.28695877,11.0847458 6.04476453,11.3135593 5.74538554,11.3135593 Z" id="Shape"></path>
                                </g>
                            </g>
                        </g>
                    </g>
                </g>
            </g>
        </g>
    </g>
</svg>




<svg width="16px" height="16px" viewBox="0 0 14 15" version="1.1" id="lock" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
    <title>818B572D-D3C8-46F0-A691-48B8C7E5D68E</title>
    <g id="Welcome" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
        <g id="Accueil-/-Général-/--Mon_Profil-/-Général" transform="translate(-1050.000000, -231.000000)" fill="#4A4A4A" fill-rule="nonzero">
            <g id="Group-7" transform="translate(105.000000, 167.000000)">
                <g id="Group-4" transform="translate(945.500000, 62.000000)">
                    <g id="Group-3" transform="translate(0.000000, 2.000000)">
                        <g id="padlock" transform="translate(0.760000, 0.000000)">
                            <path d="M9.95014663,6.375 L9.95014663,4.00105932 C9.95687425,2.92690678 9.50276005,1.8940678 8.69208211,1.14088983 C7.90831465,0.403601695 6.88235294,0 5.79584268,0 C5.77902363,0 5.75884078,0 5.74202174,0 C3.42435743,0.0031779661 1.54062446,1.79555085 1.54062446,4.00105932 L1.54062446,6.375 C0.666034156,6.47351695 0.0269104709,7.16631356 0.0269104709,8.00529661 L0.0269104709,13.3379237 C0.0269104709,14.2436441 0.793858893,14.9904661 1.75254442,14.9904661 L9.74159048,14.9904661 C10.700276,14.9904661 11.4672244,14.2436441 11.4672244,13.3379237 L11.4672244,8.00529661 C11.4638606,7.16949153 10.8247369,6.47351695 9.95014663,6.375 Z M2.21002243,4.00105932 L2.21338623,4.00105932 C2.21338623,2.14512712 3.79774021,0.626037647 5.74538554,0.626037647 L5.74874935,0.626037647 C6.67379679,0.622881356 7.56184233,0.969279661 8.21778506,1.58580508 C8.90063826,2.22457627 9.28074866,3.09533898 9.27402105,4.00105932 L9.27402105,6.37817797 L8.53398309,6.37817797 L8.53398309,4.00105932 C8.54071071,3.27966102 8.23796791,2.58686441 7.69639469,2.07838983 C7.18509574,1.59533898 6.49215111,1.3220339 5.76893221,1.3220339 L5.74874935,1.3220339 C4.20139727,1.3220339 2.95006038,2.52330508 2.95006038,3.99788136 L2.95006038,6.37817797 L2.21002243,6.37817797 L2.21002243,4.00105932 L2.21002243,4.00105932 Z M7.86458513,4.00105932 L7.86458513,6.37817797 L3.62618596,6.37817797 L3.62618596,4.00105932 C3.62618596,2.87605932 4.57478006,1.96080508 5.75211316,1.96080508 L5.77229602,1.96080508 C6.31723305,1.96080508 6.84198723,2.16737288 7.22882525,2.53283898 C7.63920994,2.92055085 7.87131275,3.45127119 7.86458513,4.00105932 Z M10.8247369,13.3474576 L10.8247369,13.3474576 C10.8247369,13.9036017 10.3470761,14.3548729 9.75840952,14.3548729 L1.76599965,14.3548729 C1.1773331,14.3548729 0.699672244,13.9036017 0.699672244,13.3474576 L0.699672244,8.02118644 C0.699672244,7.46504237 1.1773331,7.01377119 1.76599965,7.01377119 L9.75840952,7.01377119 C10.3470761,7.01377119 10.8247369,7.46504237 10.8247369,8.02118644 L10.8247369,13.3474576 Z" id="Shape"></path>
                            <path d="M6.90926341,10.4872881 C6.76125582,9.99470339 6.28695877,9.65783898 5.74538554,9.65783898 C5.07598758,9.65783898 4.53105054,10.1694915 4.53105054,10.8050847 C4.53105054,11.3167373 4.88761428,11.7648305 5.40900466,11.904661 L5.40900466,12.7944915 C5.40900466,12.9692797 5.56037606,13.1122881 5.74538554,13.1122881 C5.93039503,13.1122881 6.08176643,12.9692797 6.08176643,12.7944915 L6.08176643,11.904661 C6.72425392,11.7298729 7.09763671,11.0942797 6.90926341,10.4872881 Z M5.74538554,11.3135593 C5.44600656,11.3135593 5.20381232,11.0847458 5.20381232,10.8019068 C5.20381232,10.5190678 5.44600656,10.2902542 5.74538554,10.2902542 C6.04476453,10.2902542 6.28695877,10.5190678 6.28695877,10.8019068 C6.28695877,11.0847458 6.04476453,11.3135593 5.74538554,11.3135593 Z" id="Shape"></path>
                        </g>
                    </g>
                </g>
            </g>
        </g>
    </g>
</svg>



                &nbsp <span class="connexion">Connexion</span>

        </div>


    </div>

    @include('front.app-module.user-profil.modals.components.generale.generale')
    @include('front.app-module.user-profil.modals.components.generale.connexion')

    <div id="divGen" class="img-bottom" style="margin-bottom:-4.8px;"></div>
    <div id="divCon" class="img-bottom2 hide" style="margin-bottom:-4.8px;"></div>

</div>

<script>

    jQuery(document).ready(function () {

        $(document).on('click', '#gen', function () {
            $('.generalss').css('color', '#191970');
            $('#unlock1').removeClass('hide');
            $('#unlock').addClass('hide');
            $('.connexion').css('color', '#4A4A4A');
            $("#divGen").removeClass('hide');
            $("#divCon").addClass('hide');
            $('#lock').removeClass('hide');
            $('#lock1').addClass('hide');
        })

        $(document).on('click', '#con', function () {
            $('.connexion').css('color', '#191970');
            $('#lock').addClass('hide');
            $('#lock1').removeClass('hide');
            $('.generalss').css('color', '#4A4A4A');
            $('#unlock1').addClass('hide');
            $('#unlock').removeClass('hide');
            $("#divCon").removeClass('hide');
            $("#divGen").addClass('hide');
        })


})
</script>
