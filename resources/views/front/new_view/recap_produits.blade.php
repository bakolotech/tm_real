<div class="overlay">

    <style>
    
        .form-label-products {
            color: #9B9B9B;
            font-family: Roboto;
            font-size: 15px;
            letter-spacing: 0;
        }
    
        .recap-modification-produit {
            position: relative;
            margin-left: auto;
            margin-right: auto;
            display: table;
            overflow-y: auto;
            overflow-x: auto;
            min-width: 300px;
            left: -150px;
        }
    
        .btn-close-detail-produit{
            height: 34px;
            width: 34px;
            background-image: url('close.svg') !important;
            background-size:  24px;
            background-repeat: no-repeat; /* Do not repeat the image */
            border: 1px solid #fff;
            background-color: #1A7EF5;
            opacity: 1;
            border-radius: 50%;
            position: absolute;
            top: -19px;
            right: -15px;
            color: #fff;
        }
    
        .btn-close-detail-produit:hover {
            opacity: 1 !important;
        }
    
        .s-none-client {
            display: none !important;
        }
    
    </style>
    
    <style>
        .breadcrumb li {
            height: 11px;
        }
    
        .breadcrumb li img {
            margin-left: 6px;
            margin-right: 6px;
        }
    
    .breadcrumb li a {
        font-family: Roboto;
        font-size: 12px;
        font-style: italic;
    }
    
    .text-active {
        font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;
        font-size: 12px;
        font-style: italic;
    }
    
        .petit-cadre {
            display: flex;
            justify-content: center;
            align-items: center;
        }
    
        .petit-cadre img {
            height: auto;
        }
    
        .tm_produit_petit_img_user:first-child{
            border-radius: 6px 0px 0px 0px;
        }
    
        .cadre-div:last-child{
            border-bottom: 1px solid #ccc;
            border-radius: 0px 0px 0px 6px;
        }
    
        .tm_active_img_product {
            border: 1px solid #1A7EF5 !important;
            border-right: none !important;
        }

        .tm_active_img_product-mobile {
            border: 1px solid #1A7EF5 !important;
            border-top: none !important;
        }
    
        .partager-svg:hover{
            filter: invert(35%) sepia(32%) saturate(4698%) hue-rotate(202deg) brightness(103%) contrast(92%);
        }
    
        .comparer-svg:hover{
            filter: invert(35%) sepia(32%) saturate(4698%) hue-rotate(202deg) brightness(103%) contrast(92%);
        }
    
        .favori-svg:hover{
            filter: invert(31%) sepia(57%) saturate(2100%) hue-rotate(322deg) brightness(104%) contrast(104%);
        }
    
        .favari-svg-active {
            filter: invert(31%) sepia(57%) saturate(2100%) hue-rotate(322deg) brightness(104%) contrast(104%);
        }
    
        .corbeil-filter:hover {
            filter: invert(16%) sepia(70%) saturate(5409%) hue-rotate(345deg) brightness(78%) contrast(112%);
        }
    
        .section-produits_partenaire {
            height: 579px;
            width: 944px;
            border-radius: 6px;
            background-color: #FFFFFF;
            box-shadow: 0 5px 15px 0 rgba(0,0,0,0.5);
            background-color: #F5F5F5;
            position: absolute;
            z-index: 5000
        }
    
        .article-button-option {
            height: 26px;
            width: 26px;
            background-color: #fff;
            margin-right: 5px;
            border-radius: 50%
        }
    
    </style>
    
    <style>
    
    .ajout-updated {
        height: 18px;
        width: 105px;
        color: #FFFFFF;
        font-family: Roboto;
        font-size: 13px;
        font-weight: 500;
        letter-spacing: 0.29px;
        line-height: 18px;
        text-align: center;
        position: relative;
        top: -2px;
    }
    
    .bouton-modifier .modifier-panier {
        box-sizing: border-box;
        height: 37px;
        width: 230px;
        border: 1px solid #1A7EF5;
        border-radius: 6px;
        background-color: #FFFFFF;
    }
    
    .bouton-modifier .modifier-panier span {
        height: 18px;
        width: 189px;
        color: #1A7EF5;
        font-family: Roboto;
        font-size: 14px;
        font-weight: 500;
        letter-spacing: 0.31px;
        line-height: 18px;
    }
    
    .bouton-modifier .ajouter-panier-modifier {
        height: 37px;
        width: 234px;
        border-radius: 6px;
        background-color: #1A7EF5;
        border: none;
    
    }
    
    .bouton-modifier .ajouter-panier-modifier span {
        height: 18px;
        width: 193px;
        color: #FFFFFF;
        font-family: Roboto;
        font-size: 14px;
        font-weight: 500;
        letter-spacing: 0.31px;
        line-height: 18px;
    }
    
    #offre {
        height: 18px;
        width: 89px;
        color: #FFFFFF;
        font-family: Roboto;
        font-size: 13px;
        font-weight: 500;
        letter-spacing: 0.29px;
        line-height: 18px;
        text-align: center;
    }
    
    .modifButon {
        position: relative;
        top: -2px;
    }
    
    #faireoffre {
        position: relative;
        left: -3px;
    }
    
    .desactive {
        background-color: #9B9B9B !important;
        border: 0px !important;
    }
    .desactive #span {
        color: #FFFFFF;
    }
    
    .img-p-flex-center {
        display: flex;
        align-items: center;
    }
    
    .set-white-bg {
        background-color: #fff;
    }
    
    .set-gray-bg {
        background-color: #D8D8D8;;
    }
    
    .tm-price-section-1 {
        height: 100%;
        width: 100%;
    }
    
    .prix-half-width {
        width: 49% !important;
    }
    
    .tm-price-section-2 {
        height: 100%;
        width: 49%;
    }
    
    .text-align-right {
        text-align: right;
    }
    
    .text-align-center {
        text-align: center;
    }
    
    .preview-prix-element {
        color:#191970;text-align:center;  color: #191970;
        font-family: Roboto;
        font-size: 24px;
        font-weight: 500;
        letter-spacing: 0;
        line-height: 28px;
        margin-top:17px;
        /* margin-left:-102px; */
    }
    
    .messagerie-box {
    height: 580px;
    width: 325px;
    border-radius: 6px;
    background-color: #FFFFFF;
    box-shadow: 0 5px 15px 0 rgba(0,0,0,0.5);
    position: absolute;
    margin-top: 0px;
    margin-left: 980px;
    }
    
    .messagerie-container {
    
    }
    
    .user-photo-name-time {
    display: flex;
    flex-direction: row;
    margin-left: 20px;
    margin-top: 20px;
    }
    
    .user-1-message-section {
    display: flex;
    flex-direction: column;
    }
    
    .photo-user {
        height: 22px;
        width: 22px;
        border-radius: 50%;
        background-color: #4A4A4A;
        margin-right: 14px;
    }
    
    .user-mane-thingin {
    height: 20px;
    width: 106px;
    color: #4A4A4A;
    font-family: Roboto;
    font-size: 14px;
    font-weight: 500;
    letter-spacing: 0;
    line-height: 20px;
    margin-right: 112px;
    }
    
    .time-message-user {
    height: 18px;
    width: 26px;
    color: #8D97A5;
    font-family: Roboto;
    font-size: 12px;
    font-weight: 500;
    letter-spacing: 0.5px;
    line-height: 18px;
    text-align: right;
    }
    
    .user-message {
    /* height: 40px; */
    width: 280px;
    border-radius: 5px;
    background-color: #191970;
    color: #fff;
    margin-left: 20px;
    margin-top: 14px;
    }
    
    .message-input-section {
    display: flex;
    margin-left: 10px;
    position: relative;
    /* top: 438px; */
    }
    
    .message-inout-section input {
    height: 42px;
    width: 205px;
    border-radius: 6px;
    background-color: #F8F8F8;
    padding-left: 12px;
    }
    
    .button-inout-section {
    height: 42px;
    width: 100px;
    /* background-color: #ccc; */
    }
    
    .button-section button {
    margin-top: 9px;
    margin-left: 10px
    }
    
    .button-section button svg {
    color: #ccc !important;
    }
    
    .none-messaboxe {
    display: none !important;
    }
    
    .negociation-user-avatar {
    box-sizing: border-box;
    height: 37.2px;
    width: 37.2px;
    border: 1px solid #FFFFFF;
    background-color: #4A4A4A;
    border-radius: 50%;
    position: relative;
    left: 26px;
    top: 13.4px;
    }
    
    .text-negociation-avatar {
    height: 28px;
    width: 193px;
    color: #FFFFFF;
    font-family: Roboto;
    font-size: 12px;
    font-weight: 500;
    letter-spacing: 0.8px;
    line-height: 14px;
    position: relative;
    top: 20px;
    left: 37px;
    }
    
    .negociation-message-success {
    height: 37px;
    width: 325px;
    border-radius: 6px;
    background-color: #00B517;
    position: absolute;
    margin-top: 20px;
    display: flex;
    justify-content: center;
    align-items: center;
    
    color: #FFFFFF;
    font-family: Roboto;
    font-size: 16px;
    font-weight: 500;
    letter-spacing: -0.11px;
    line-height: 18px;
    text-align: center;
    }
    
    .desabled-modification-article {
    pointer-events: none;
    opacity: 0.5
    }
    
    .desabled-ajout-nouvel-article {
    pointer-events: none
    }
    
    @media only screen and (max-width: 2560px) {
    #start-section-mobile{
        display:none;
    }
    
    .des_car_mobile{
        display:none;
    }
    
    .des_car_desktop{
        display:block;
    }
    
    .footer_mod_recap{
        display:none;
    }
    
    .none-messaboxe {
        display: none;
    }
    
    #descProd_mobile{
        display:none;
    }
    
    .descProd_desktop{
        display:block ;
    }
    
    
    
    .gros-cadre-user .img-card-long {
    height: 100% !important;
    width: auto !important;
    border-radius: 0 6px 6px 0;
    max-height: 100% !important;
    display: flex;
    justify-content: space-between;
    align-items: flex-end;
    align-content: flex-end;
    }
    
    .footer_mod_recap{
        /* display:none; */
    }
    
    .block_mobile{
        display: none !important;
    }
    }
    
    @media only screen and (max-width: 540px) {
    .content-container {
        display: block;
        margin: 0px;
        padding: 0px;
        max-height: 559px;
        overflow-y: scroll;
        max-width: 100%;
        width: 100%;
        overflow-x: clip;
        position: relative;
        padding-right: 15px;
    }
    
    .btn_cara_close{
        z-index: 15000;
        position: absolute;
        right: 5px !important;
        top: 4px !important;
    }
    
    .des_car_mobile{
        display:block;
    }
    
    .des_car_desktop{
        display:none;
    }
    
    .msg-box-bis {
        max-height: 418px;
    width: 325px;
    border-radius: 6px;
    background-color: #fff;
    box-shadow: 0 5px 15px 0 rgba(0,0,0,0.5);
    position: absolute;
    margin-top: 95px !important;
    overflow-y: auto;
    overflow-x: clip;
    margin-left: 29px !important;
    }
    
    #descProd_mobile{
        display:block;
    }
    
    .descProd_desktop{
        display:none;
    }
    
    #modalProduitClosed{
        z-index: 500;
        position: absolute;
        right: 8px !important;
        top: 0px !important;
    }
    
    .infos-articles {
        display: flex;
        justify-content: center;
        align-items: center;
        flex-direction: row;
        box-sizing: border-box;
        height: 72px;
        width: 340px;
        border: 1px solid #D8D8D8;
        border-radius: 6px;
        background-color: #FFFFFF;
        position: relative;
        left: 10px;
        margin-top: 18px;
    }
    
    .infos-description {
        border-top: 1px solid #1A7EF5;
        border-bottom: 1px solid #1A7EF5;
        height: 39px;
        margin-top: 20px;
        width: 340px;
        position: relative;
        left: 14px;
        cursor: pointer;
    }
    
    .gros-cadre-user .img-card-long{
        width: 100% !important;
    }
    
    #carac_produit1{
        width: 108px;
    }
    
    .cara_annee{
        width: 108px;
    }
    
    .rayon-btn-direction-etat-panier {
        width: 87px;
        height: 80px;
        background-color: rgba(0,0,0,0.45);
        border: none;
        cursor: pointer;
        position: absolute;
        float: right;
        right: 0px;
        border-radius: 50% 0px 0px 50%;
        display: flex;
        justify-content: center;
        align-items: center;
        margin-top: 164px;
    }
    
    .select-product {
        box-sizing: border-box;
        height: 41px;
        width: 218px;
        border: 1px solid #9B9B9B;
        border-radius: 6px;
        background-color: #F8F8F8;
        -webkit-appearance: none;
        -moz-appearance: none;
        background-image: url(ic_chevron_right.svg);
        background-repeat: no-repeat;
        background-position-x: 160px;
        background-position-y: center;
        border: 1px solid #dfdfdf;
        padding-left: 20px !important;
    }
    
    .style_pour_desktop{
        box-sizing: border-box;
        height: 41px;
        width: 238px;
        border-radius: 6px;
        display: block;
        justify-content: space-between;
        align-items: center;
        margin-right: 10px;
     }
    
    .produit-caracteristique-detail {
        box-sizing: border-box;
        height: 41px;
        width: 108px;
        border: 1px solid #dddcdc;
        border-radius: 6px;
        background-color: #F8F8F8;
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-right: 10px;
    }
    
    .button-option{
        display:none;
    }
    
    .btn-section{
        display: none !important;
    }
    
    .modal-content-panier, .modal-body-panier {
        border-bottom-left-radius: 0px !important;
        border-bottom-right-radius: 0px !important;
    }
    
    .footer_mod_recap{
        display:block;
        background: white;
    }
    
    .infos-offres{
        display:none !important;
    }
    
    .data-icon{
        display:none !important;
    }
    
    .section-cout-marchand-popup{
        display:none !important;
    }
    
    #block_desktop{
        display:none;
    }
    
    .detail-bottom{
        display:none;
    }
    
    .block_mobile{
        display:block !important;
    }
    
    #start-section-mobile{
        display:flex;
    }
    
    #start-section-desktop{
        display:none;
    }
    
    #block_desktop{
        display:none !important;
    }
    
    .modal-content-panier, .modal-body-panier {
        width: 100% !important;
        height: 560px !important;
        background-color: #ffffff;
        border-radius: 6px;
    }
    
    .modal-dialog-panier {
        position: relative;
        height: 579px;
        left: 0px;
        top: 0%;
    }
    
    .menu-section {
        display: none;
    }
    
    .content-container .right-box {
        width: 100% !important;
        padding-left: 14px !important;
    }
    
    .content-container .left-box {
        width: 100% !important;
        margin: 0px;
        padding: 0px;
    }
    
    }
    
    
    </style>
    
    <style>
        .poids-1 {
            margin-bottom: 5px;
        }
    
        .p_input {
            border: solid #D0021B 1px;
            animation-name: example;
            animation-duration: 0.5s;
            animation-delay: 0s;
        }
    
        .section-cout-marchand-popup {
            height: 65px;
            width: 414px;
            background-color: #F5F5F5;
            border-top:1px solid #9B9B9B;
            border-bottom:1px solid #9B9B9B;
            margin-top: 10px;
        }
    
    </style>
    
    <style>
        #quantite {
            background-color: #F8F8F8;
            text-align: center;
            border: none;
            outline: none;
            width: 75px
        }
        /* Firefox */
        input[type=number] {
            -moz-appearance: textfield;
        }
    
        /* Chrome */
        input::-webkit-inner-spin-button,
        input::-webkit-outer-spin-button {
            -webkit-appearance: none;
            margin:0;
        }
    
        /* Opéra*/
        input::-o-inner-spin-button,
        input::-o-outer-spin-button {
            -o-appearance: none;
            margin:0
        }
    
        .z-exp-1-icones-bis {
            width: auto;
            border-radius: 6px;
            background-color: #D8D8D8;
            background: linear-gradient(180deg, #FFCD18 0%, #FF9F0A 100%);
        }
    
        .icon-last-level {
            width: 30px;
            padding-left: 8px;
        }
    
        .produit-option-supp {
            display: flex;
            justify-content: flex-start;
            align-items: center;
            height: 29px !important;
        }
    
        .libelle-option-p {
            height: 15px;
            width: 56px;
            height: 12px;
            color: #191970;
            font-family: Roboto;
            font-size: 12px;
            font-weight: 500;
            letter-spacing: 0;
            text-align: center;
            position: relative;
            left: -5px;
        }
    
        .flex-container{
            display: flex;
            flex-direction: row;
            background-color: #F8F8F8;
            justify-content: space-evenly;
            align-items: center;
            align-content: center;
            color: #FFFFFF;
            gap: 15px 0px;
        }
    
        .flex-items{
            flex-grow: 1;
            background-color: #191970 !important;
            color: #fff !important;
            cursor: pointer;
        }

        .flex-items1{
            flex-grow: 2;
            background-color: #F8F8F8;
            color: #9B9B9B;
            cursor: pointer;
        }
    
    </style>
    
    
    <style>
        .info-expediction-user {
            position: relative;
            box-sizing: border-box;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 29px;
            width: 250px;
            border: 1px solid #191970;
            border-radius: 6px;
            background-color: rgba(128,195,243,0.15);
            position: relative;
            right: -23px;
        }
    
        .info-expediction-user p {
        display: flex;
        justify-content: center;
        align-items: center;
        position: relative;
        top: 7.5px;
        height: 14px;
        width: 220px;
        color: #191970;
        font-family: Roboto;
        font-size: 12px;
        font-weight: 500;
        letter-spacing: 0;
        line-height: 14px;
        text-align: center;
    }
    </style>
    
    <style>
    
        .msg-box-bis {
            height: 580px;
            width: 325px;
            border-radius: 6px;
            background-color: #fff;
            box-shadow: 0 5px 15px 0 rgba(0,0,0,0.5);
            position: absolute;
            margin-top: 0px;
            margin-left: 960px;
        }
    
        .description-title-label {
            margin-top:25px;
            font-family: Roboto;
            font-size: 14px;
            letter-spacing: 0;
            margin-left: 46px;
        }
    
        .caracteristique-title-label {
            margin-top:25px; margin-left: 8px;
            font-family: Roboto;
            font-size: 14px;
            letter-spacing: 0;
        }
    
    .article-panier-number-underline:hover {
        cursor: pointer;
    }
    
    .gros-cadre-user .img-card-long {
        height: 100% !important;
        width: auto !important;
        border-radius: 0 6px 6px 0;
        max-height: 100% !important;
        display: flex;
        justify-content: space-between;
        align-items: flex-end;
        align-content: flex-end;
    }
    
    .petit-cadre .img-card-petit-long {
        height: 100% !important;
        width: auto !important;
    }
    
    .gros-cadre-user-long {
        justify-content: center !important;
        padding-top: 5px !important;
        padding-bottom: 5px !important;
    }
    
    .set-white-color {
        background-color: #fff !important;
    }
    #TableContainer {
        font-size: 14px
    }
    
    #Deskription {
        box-sizing: border-box;
        width: 312px;
        height: 481px;
        border: none;
        margin-left: 15px;
        margin-top: 15px;
        color: #191970;
        font-size: 15px;
        letter-spacing: -0.29;
        line-height: 17px;
    }
    
    #Deskription:focus {
        border: none !important;
        outline: none !important;
        color: #000000;
        font-size: 15px;
        letter-spacing: 1;
        line-height: 24px;
    }
    
    </style>
    
    <div class="modal fade" id="myModal" data-backdrop="static" data-keyboard="false">
        <div class="modal-dialog modal-dialog-panier modal-dialog-centered" id="recap-modification-produit">
          <div class="modal-content modal-content-panier" id="recapPanierModalContent">
    
      </div>
    
        </div>
    </div>
    </div>
    
    <!-- Modal -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    