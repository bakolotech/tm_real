<style>
    @import url('https://fonts.googleapis.com/css2?family=Roboto&display=swap');
    .modal-content-msg-marchand,
    .modal-body-msg-marchand {
        width: 1212px !important;
        height: 579px !important;
        border-radius: 6px;
        background-color: #F8F8F8;
        box-shadow: 0 5px 15px 0 rgba(0, 0, 0, 0.5);
    }



    .modal-body {
        margin: 0px;
        padding: 0px;
    }

    .modal-dialog-msg-marchand {
        position: relative;
        height: 579px;
        left: -350px;
        top: 50px;
    }

    .form-control {
            font-size: 14px;
            color: #9B9B9B;
        }
        
         ::-webkit-scrollbar {
            width: 5px;
            margin-right: 10px;
        }
        
         ::-webkit-scrollbar-track {
            box-shadow: inset 0 0 5px #D8D8D8;
            border-radius: 5px;
            margin-right: 10px;
        }
        
         ::-webkit-scrollbar-thumb {
            background: #D8D8D8;
            border-radius: 5px;
            margin-right: 10px;
        }
        
         ::-webkit-scrollbar-thumb:hover {
            background: #D8D8D8;
            background-color: grey;
        }
        
        .head {
            display: flex;
            height: 81px;
            margin-top: 5px;
        }
        /* ./Entete de la page */
        
        .body {
            display: flex;
            margin-left: 5px;
            margin-top: 10px;
        }
        /* ./Corps de la page */
        /* Debut entete de gauche */
        
        .head-left {
            height: 81px;
            width: 319px;
            border: 1px solid #D8D8D8;
            border-radius: 7px 6px 6px 7px;
            background-color: #FFFFFF;
            box-sizing: border-box;
            margin-left: 5px;
            display: flex;
            padding: 0;
        }
        
        .head-left-mask {
            box-sizing: border-box;
            height: 79px;
            width: 80px;
            border: 1px solid #1A7EF5;
            border-radius: 6px;
            background-color: #D8D8D8;
            display: flex;
        }
        
        .oval {
            height: 9px;
            width: 9px;
            background-color: #00B517;
            margin-left: 67px;
            margin-top: 5px;
            border-radius: 50%;
        }
        
        .pencil-icon-head-left {
            height: 18px;
            width: 18px;
            margin-top: 17.5px;
        }
        
        .quel-plaisir-de-vous {
            height: 44px;
            width: 205px;
            color: #191970;
            font-family: Roboto;
            font-size: 18px;
            font-weight: 500;
            letter-spacing: 0;
            line-height: 18px;
            margin-bottom: 12px;
            margin-left: 100px;
            margin-top: -78px;
        }
        
        .proprio {
            height: 16px;
            width: 51px;
            color: #FFFFFF;
            font-family: Roboto;
            font-size: 14px;
            font-weight: 500;
            letter-spacing: 0;
            line-height: 16px;
            text-align: center;
        }
        
        .p-rect-corps-right {
            height: 18px;
            width: 71px;
            border-radius: 6px;
            background-color: #1A7EF5;
            margin-left: 100px;
        }
        /* Fin entete gauche */
        /* Début entete droite */
        
        .head-right {
            box-sizing: border-box;
            height: 81px;
            width: 873px;
            border: 1px solid #D8D8D8;
            border-radius: 7px 6px 6px 7px;
            background-color: #FFFFFF;
            display: flex;
            margin-left: 10px;
        }
        
        .div-info-marcher {
            height: 70px;
            width: 70px;
            border-radius: 6px;
            margin-left: 6.5px;
            margin-top: 5.5px;
        }
        
        .span-info-marcher {
            height: 17px;
            width: 17px;
            margin-left: 26.5px;
            margin-top: 17px;
        }
        
        .p-info-marcher {
            height: 22px;
            width: 35px;
            color: #9B9B9B;
            font-family: Roboto;
            font-size: 10px;
            font-weight: 500;
            letter-spacing: 0;
            margin-left: 17.5px;
            margin-top: 9px;
            line-height: 11px;
            text-align: center;
        }
        
        .div-gest-equip {
            height: 70px;
            width: 70px;
            border-radius: 6px;
            margin-left: 9px;
            margin-top: 5.5px;
        }
        
        .span-gest-equip {
            height: 17px;
            width: 17px;
            margin-left: 26.5px;
            margin-top: 17px;
        }
        
        .p-gest-equip {
            height: 22px;
            width: 35px;
            color: #9B9B9B;
            font-family: Roboto;
            font-size: 10px;
            font-weight: 500;
            letter-spacing: 0;
            margin-left: 17.5px;
            margin-top: 9px;
            line-height: 11px;
            text-align: center;
        }
        
        .div-gest-stk {
            height: 70px;
            width: 70px;
            border-radius: 6px;
            margin-left: 9px;
            margin-top: 5.5px;
        }
        
        .span-gest-stk {
            height: 17px;
            width: 17px;
            margin-left: 26.5px;
            margin-top: 17px;
        }
        
        .p-gest-stk {
            margin-left: 15.5px;
            margin-top: 9px;
            height: 22px;
            width: 39px;
            color: #9B9B9B;
            font-family: Roboto;
            font-size: 10px;
            font-weight: 500;
            letter-spacing: 0;
            line-height: 11px;
            text-align: center;
        }
        
        .div-msg {
            margin-left: 8.5px;
            margin-top: 5px;
            box-sizing: border-box;
            height: 71px;
            width: 71px;
            border: 1px solid #1A7EF5;
            border-radius: 6px;
            background-color: #F5F5F5;
        }
        
        .span-msg {
            margin-left: 26.5px;
            margin-top: 22px;
            height: 17.5px;
            width: 17.5px;
        }
        
        .p-msg {
            margin-left: 9px;
            margin-top: 22px;
            height: 11px;
            width: 53px;
            color: #1A7EF5;
            font-family: Roboto;
            font-size: 10px;
            font-weight: 500;
            letter-spacing: 0;
            line-height: 11px;
            text-align: center;
        }
        
        .div-mes-boutik {
            height: 70px;
            width: 70px;
            border-radius: 6px;
            margin-left: 9px;
            margin-top: 5.5px;
        }
        
        .span-mes-boutik {
            height: 17px;
            width: 17px;
            margin-left: 26.5px;
            margin-top: 17px;
        }
        
        .p-mes-boutik {
            margin-left: 12px;
            margin-top: 8.5px;
            height: 22px;
            width: 46px;
            color: #9B9B9B;
            font-family: Roboto;
            font-size: 10px;
            font-weight: 500;
            letter-spacing: 0;
            line-height: 11px;
            text-align: center;
        }
        
        .div-mod-paye {
            height: 70px;
            width: 70px;
            border-radius: 6px;
            margin-left: 9px;
            margin-top: 5.5px;
        }
        
        .span-mod-paye {
            height: 17px;
            width: 17px;
            margin-left: 20px;
            margin-top: 17px;
        }
        
        .p-mod-paye {
            margin-left: 14px;
            margin-top: 12px;
            height: 22px;
            width: 42px;
            color: #9B9B9B;
            font-family: Roboto;
            font-size: 10px;
            font-weight: 500;
            letter-spacing: 0;
            line-height: 11px;
            text-align: center;
        }
        
        .div-tab-gest {
            height: 70px;
            width: 70px;
            border-radius: 6px;
            margin-left: 9px;
            margin-top: 5.5px;
        }
        
        .span-tab-gest {
            height: 17px;
            width: 17px;
            margin-left: 22px;
            margin-top: 8.5px;
        }
        
        .p-tab-gest {
            margin-left: 11.5px;
            margin-top: 10.5px;
            height: 22px;
            width: 47px;
            color: #9B9B9B;
            font-family: Roboto;
            font-size: 10px;
            font-weight: 500;
            letter-spacing: 0;
            line-height: 11px;
            text-align: center;
        }
        
        .div-hist-code {
            height: 70px;
            width: 70px;
            border-radius: 6px;
            margin-left: 9px;
            margin-top: 5.5px;
        }
        
        .span-tab-gest {
            height: 17px;
            width: 17px;
            margin-left: 26.5px;
            margin-top: 8.5px;
        }
        
        .p-tab-gest {
            margin-left: 11.5px;
            margin-top: 6.89px;
            height: 22px;
            width: 47px;
            color: #9B9B9B;
            font-family: Roboto;
            font-size: 10px;
            font-weight: 500;
            letter-spacing: 0;
            line-height: 11px;
            text-align: center;
        }
        
        .div-create-promo {
            height: 70px;
            width: 70px;
            border-radius: 6px;
            margin-left: 9px;
            margin-top: 5.5px;
        }
        
        .span-create-promo {
            height: 17px;
            width: 17px;
            margin-left: 21.5px;
            margin-top: 8.5px;
        }
        
        .p-create-promo {
            margin-left: 10.5px;
            margin-top: 9px;
            height: 22px;
            width: 49px;
            color: #9B9B9B;
            font-family: Roboto;
            font-size: 10px;
            font-weight: 500;
            letter-spacing: 0;
            line-height: 11px;
            text-align: center;
        }
        
        .div-trash {
            height: 70px;
            width: 70px;
            border-radius: 6px;
            margin-left: 9px;
            margin-top: 5.5px;
        }
        
        .span-trash {
            height: 17px;
            width: 17px;
            margin-left: 24.5px;
            margin-top: 8.5px;
        }
        
        .p-trash {
            margin-left: 15px;
            margin-top: 16px;
            height: 22px;
            width: 39px;
            color: #9B9B9B;
            font-family: Roboto;
            font-size: 10px;
            font-weight: 500;
            letter-spacing: 0;
            line-height: 11px;
            text-align: center;
        }
        
        .div-gest-menu {
            height: 70px;
            width: 70px;
            border-radius: 6px;
            margin-left: 9px;
            margin-top: 5.5px;
        }
        
        .span-gest-menu {
            height: 17px;
            width: 17px;
            margin-left: 26.5px;
            margin-top: 17px;
        }
        
        .p-gest-menu {
            margin-left: 10px;
            margin-top: 9px;
            height: 22px;
            width: 50px;
            color: #9B9B9B;
            font-family: Roboto;
            font-size: 10px;
            font-weight: 500;
            letter-spacing: 0;
            line-height: 11px;
            text-align: center;
        }
        /* Fin entete droite */
        /* Début block1 de page */
        
        .block1 {
            box-sizing: border-box;
            height: 475px;
            width: 338px;
            border: 1px solid #D8D8D8;
            border-radius: 6px 0 0 6px;
            background-color: #FFFFFF;
        }
        
        .head-block1 {
            height: 40px;
            width: 338px;
            padding-top: 7.5px;
        }
        
        .head-block1-span-messagerie {
            height: 21px;
            width: 90px;
            margin-left: 10px;
            color: #191970;
            font-family: Roboto;
            font-size: 18px;
            font-weight: 500;
            letter-spacing: -0.48px;
            line-height: 21px;
            /* padding-top: 15.2px; */
        }
        
        .head-block1-span-all-convert {
            height: 13px;
            width: 120px;
            color: #4A4A4A;
            font-family: Roboto;
            font-size: 11px;
            font-weight: 300;
            letter-spacing: -0.27px;
            line-height: 12px;
            /* margin-top: 18.6px; */
        }
        
        .body-block1 {
            box-sizing: border-box;
            height: 434px;
            width: 338px;
            border: 1px solid #d8d8d8;
            background-color: #F5F5F5;
            border-radius: 0 0 0 6px;
            overflow-x: hidden;
            overflow-y: auto;
        }
        
        .block1-body-content1 {
            display: flex;
            height: 110px;
            width: 336px;
            border-radius: 6px;
            background-color: #FFFFFF;
            box-shadow: 0 5px 15px 0 rgba(0, 0, 0, 0.02);
            margin-top: 5px;
        }
        
        .img1-message {
            height: 39px;
            width: 39px;
            box-shadow: 0 2px 48px 0 rgba(0, 0, 0, 0.13);
            border-radius: 50%;
            border: 1px solid #191970;
            background-color: #FFFFFF;
        }
        
        .img2-message {
            height: 39px;
            width: 39px;
            box-shadow: 0 2px 48px 0 rgba(0, 0, 0, 0.13);
            border-radius: 50%;
            position: relative;
            top: -12px;
            left: 15px;
            border: 1px solid #D0021B
        }
        
        .line-conversation {
            box-sizing: border-box;
            height: 80px;
            width: 1px;
            border: 0.5px solid #191970;
            margin-top: 15px;
            margin-left: 8px;
        }
        
        .div1-body-content1 {
            height: 57px;
            width: 53px;
            margin-left: 8.5px;
            margin-top: 15px;
        }
        
        .text-conversation-nv1,
        .text-conversation-nv3 {
            display: flex;
        }
        
        .text-conversation-nv2 {
            margin-left: 9.5px;
            height: 28px;
            width: 220px;
            color: #191970;
            font-family: Roboto;
            font-size: 12px;
            letter-spacing: 0;
            line-height: 13px;
        }
        
        .elt1-text-conservation-nv1 {
            height: 18px;
            width: 129px;
            color: #4A4A4A;
            font-family: Roboto;
            font-size: 15px;
            font-weight: 500;
            letter-spacing: 0;
            line-height: 18px;
            margin-top: 15px;
            margin-left: 9.5px;
        }
        
        .elt3-text-conservation-nv1 {
            box-sizing: border-box;
            height: 8px;
            width: 8px;
            border: 0.75px solid #191970;
            background-color: #D0021B;
            border-radius: 50%;
            margin-left: 73px;
            margin-top: 15px;
        }
        
        .elt2-text-conservation-nv1 {
            height: 20px;
            width: 26px;
            border-radius: 5px;
            background-color: #D0021B;
            margin-top: 14px;
            margin-left: 10px;
        }
        
        .span-elt2-text-conservation-nv1 {
            height: 13px;
            width: 17px;
            color: #FFFFFF;
            font-family: Roboto;
            font-size: 8px;
            font-weight: 500;
            letter-spacing: 0;
            line-height: 9px;
            margin-top: 4.5px;
            margin-left: 4.5px;
        }
        
        .elt1-text-conversation-nv3 {
            height: 14px;
            width: 100px;
            color: #9B9B9B;
            font-family: Roboto;
            font-size: 12px;
            letter-spacing: 0;
            line-height: 13px;
            margin-left: 9.5px;
            margin-top: 10px;
        }
        
        .elt2-text-conversation-nv3 {
            margin-left: 130px;
        }
        
        .block1-body-content2 {
            display: flex;
            height: 110px;
            width: 336px;
            border-radius: 6px;
            background-color: #F8F8F8;
            box-shadow: 0 5px 15px 0 rgba(0, 0, 0, 0.02);
            margin-top: 5px;
        }
        
        .elt2-content2-text-conservation-nv1 {
            box-sizing: border-box;
            height: 8px;
            width: 8px;
            border: 0.75px solid #191970;
            border-radius: 50%;
            margin-left: 109px;
            margin-top: 15px;
        }
        
        .elt2-content3-text-conservation-nv1 {
            box-sizing: border-box;
            height: 8px;
            width: 8px;
            border: 0.75px solid #191970;
            border-radius: 50%;
            margin-left: 109px;
            margin-top: 15px;
        }
        
        .block1-body-content3 {
            display: flex;
            height: 110px;
            width: 336px;
            border-radius: 6px;
            background-color: #FFFFFF;
            box-shadow: 0 5px 15px 0 rgba(0, 0, 0, 0.02);
            margin-top: 5px;
        }
        
        .block1-body-content4 {
            display: flex;
            height: 110px;
            width: 336px;
            border-radius: 6px;
            background-color: #FFFFFF;
            box-shadow: 0 5px 15px 0 rgba(0, 0, 0, 0.02);
            margin-top: 5px;
        }
        /* Fin block1*/
        /* Début block2 de page */
        
        .block2 {
            box-sizing: border-box;
            height: 475px;
            width: 519px;
            border: 1px solid #D8D8D8;
            background-color: #FFFFFF;
        }
        
        .head-block2 {
            height: 40px;
            width: 519px;
        }
        
        .head-block2-span {
            margin-left: 491px;
            margin-top: 15px;
            margin-right: 11px;
        }
        
        .body-block2 {
            width: 519px;
            height: 434px;
            border: 1px solid #D8D8D8;
            background-color: #FFFFFF;
        }
        
        .body-block2-up {
            height: 373px;
            width: 519px;
            overflow-x: hidden;
            overflow-y: auto;
        }
        
        .right-container-elt1 {
            height: 40px;
            width: 359px;
            border-radius: 5px;
            background-color: #191970;
            margin-left: 20px;
            margin-top: 9px;
        }
        
        .right-container-elt2 {
            height: 108px;
            width: 419px;
            margin-left: 85px;
            margin-top: 21px;
        }
        
        .right-container-elt3 {
            height: 202px;
            width: 419px;
            margin-left: 20px;
        }
        
        .body-block2-bottom {
            box-sizing: border-box;
            height: 60px;
            width: 519px;
            border: 1px solid #D8D8D8;
            display: flex;
        }
        /* Fin block2*/
        /* Début block3 de page */
        
        .block3 {
            height: 475px;
            width: 342.5px;
            box-sizing: border-box;
            border: 1px solid #D8D8D8;
            border-radius: 0 6px 6px 0;
            overflow: hidden;
        }
        
        .head-body-block3-span {
            height: 21px;
            width: 135px;
            color: #191970;
            font-family: Roboto;
            font-size: 18px;
            font-weight: bold;
            letter-spacing: -0.43px;
            line-height: 21px;
            margin-left: 12px;
            margin-top: 12px;
            padding-top:10px;
            
        }
        
        .head-body-block32-span {
            height: 21px;
            width: 188px;
            color: #191970;
            font-family: Roboto;
            font-size: 18px;
            font-weight: 500;
            letter-spacing: -0.43px;
            line-height: 21px;
            margin-left: 12px;
            margin-top: 12px;
        }
        
        .head-body-block33-span {
            height: 21px;
            width: 188px;
            color: #191970;
            font-family: Roboto;
            font-size: 18px;
            font-weight: 500;
            letter-spacing: -0.43px;
            line-height: 21px;
            margin-left: 12px;
            margin-top: 12px;
            background-color: white;
        }
        
        .head-body-block3 {
            box-sizing: border-box;
            height: 40px;
            width: 342.5px;
            border-bottom: 1px solid #D8D8D8;
            border-radius: 0 6px 0 0;
            background-color: #FFFFFF;
            padding-left:10px;
            padding-top:5px;
        }
        
        .head-body-block32 {
            box-sizing: border-box;
            height: 40px;
            width: 342.5px;
            border-bottom: 1px solid #D8D8D8;
            border-radius: 0 6px 0 0;
            background-color: #FFFFFF;
        }
        .head-body-block33{
            background-color: white;
            height: 53px;
            width: 342.5px;
            border-bottom: 1px solid #D8D8D8;
            border-radius: 0 6px 0 0;
            margin-top:-12px;
            padding:10px;
        }
        
        .body-block-vue1 {
            height: 424px;
            width: 320px;
            border-radius: 16px 16px 0 0;
            background-color: #FFFFFF;
            box-shadow: 0 5px 15px 0 rgba(0, 0, 0, 0.5);
            margin-left: 14px;
            margin-top: 9.8px;
            z-index: -2;
        }
        /* Fin block3*/
        /* Controle pour forme */
        
        .input-field {
            background-image: url("Valider.svg");
            background-repeat: no-repeat;
            background-position: right center;
        }
        
        .reference-produit-messagerie-vendeur,
        .nbr-produit-messagerie-vendeur {
            outline: 1px solid #979797;
            border-radius: 6px;
            box-sizing: border-box;
            height: 41px;
            width: 307px;
            border: 1px solid #979797;
            background-color: #FFFFFF;
            background-image: url("PathCopy10.svg");
        }
        
        .select-remise-produit-messagerie-vendeur {
            box-sizing: border-box;
            height: 38px;
            width: 194px;
            background-color: #FFFFFF;
            color: #4A4A4A;
            font-family: Roboto;
            font-size: 14px;
            font-weight: 500;
            letter-spacing: -0.34px;
            line-height: 16px;
        }
        
        .select-datexp-produit-messagerie-vendeur,
        .select-datexp-produit-messagerie-vendeur:focus,
        .select-datexp-produit-messagerie-vendeur::after {
            color: #4A4A4A;
            font-family: Roboto;
            font-size: 14px;
            font-weight: 500;
            letter-spacing: -0.34px;
            line-height: 16px;
            height: 38px;
            width: 302px;
            border: none;
        }
</style>

</head>

<body>




    <!-- The Modal -->
    <div class="modal modal-marchand-close" id="msgMarchand">
        <div class="modal-dialog modal-dialog-msg-marchand">
            <div class="modal-content modal-content-msg-marchand">
                <div style="margin-top:5px;">


                    <div style="border:1px solid #D8D8D8;border-radius: 5px;width:315px ;margin-left: 5px; height: 81px;background-color: white;">
                        <div class="head-left-mask">
                            <span class="oval"></span>
                           
                        </div>
                        
                        
                        <div class="quel-plaisir-de-vous">
                            Quel plaisir de vous revoir,
                            <br/>@NomDuStore
                        </div>
                        <p class="p-rect-corps-right">
                            <span class="proprio">Proprio.</span>
                        </p>
                    </div>
                    <div style="border:1px solid #D8D8D8;border-radius: 5px;margin-top:-81px;position: absolute;margin-left: 330px; width:873px;height: 81px;background-color: white;">

                        <div class="gerer-equipe-menu">
                            <li  class="marie"><img src="assets/images/icones-vendeurs2/icones-menu/info-marche.svg"><br><br>Infos du marché</li>
                            <li  data-id="gererEquipe" class="marie"><img src="assets/images/icones-vendeurs2/icones-menu/gestionequipe.svg"><br><br>Gestion d'équipe</li>
                            <li  class="marie"><img src="assets/images/icones-vendeurs2/icones-menu/gestionstock.svg"><br><br>Gestion des stocks</li>
                            <li  data-id="msgMarchand" class="marie" style="color:#1A7EF5"><img src="assets/images/icones-vendeurs2/icones-menu/messageriebleu.svg"><br><br>Messagerie</li>
                            <li  class="marie"><img src="assets/images/icones-vendeurs2/icones-menu/boutique.svg"><br><br>Mes boutiques</li>
                            <li  data-id="modePaiementMarchand" class="marie"><img src="assets/images/icones-vendeurs2/icones-menu/paiement.svg" ><br><br>Mode de paiements</li>
                            <li  class="marie"><img src="assets/images/icones-vendeurs2/icones-menu/gestion.svg"><br><br>Tableau des gestions</li>
                            <li  data-id="historiqueCode" class="marie"><img src="assets/images/icones-vendeurs2/icones-menu/codepromo.svg"><br><br>Historique des code</li>
                            <li  data-id="nouvellePromo" class="marie"><img src="assets/images/icones-vendeurs2/icones-menu/promo.svg"><br><br>Créer Code Promo</li>
                            <li  data-id = "articleCorbeille"  class="marie"><img src="assets/images/icones-vendeurs2/icones-menu/corbeille.svg"><br><br>Corbeille</li>
                            <li  data-id="gestMenu"  class="marie" ><img src="assets/images/icones-vendeurs2/icones-menu/gestionmenu.svg"><br><br>Gestion des menus</li>
                        </div>
                        {{-- @include('front.app-module.marchand.marchand-modals.menu-modal-marchand') --}}
                    </div>

                </div>
               
                        <div class="body">
                            <div class="block1">
                                <div class="head-block1">
                                    <span class="head-block1-span-messagerie">Messagerie</span>
                                    <span class="head-block1-span-all-convert">- Toutes les conversations</span>
                                </div>
                                <div class="body-block1">
                                    <div class="block1-body-content1">
                                        <div class="div1-body-content1">
                                            <img src="assets/images/icones-vendeurs2/uriel_profil.jpg" alt="" class="img1-message">
                                            <img src="assets/images/icones-vendeurs2/man-user.jpg" alt="" class="img2-message">
                                        </div>
                                        <div class="div2-body-content1">
                                            <div class="line-conversation"></div>
                                        </div>
                                        <div class="div3-body-content1">
                                            <div class="text-conversation-nv1">
                                                <p class="elt1-text-conservation-nv1">@ObjetDuMessage</p>
                                                <p class="elt2-text-conservation-nv1">
                                                    <span class="span-elt2-text-conservation-nv1">99+</span>
                                                </p>
                                                <p class="elt3-text-conservation-nv1"></p>
                                            </div>
                                            <div class="text-conversation-nv2">
                                                Quapropter a natura mihi videtur potius quam ab indigentia orta amicitia.
                                            </div>
                                            <div class="text-conversation-nv3">
                                                <p class="elt1-text-conversation-nv3">
                                                    Il y'a une heure
                                                </p>
                                                <p class="elt2-text-conversation-nv3">
                                                    <i><img style="box-sizing: border-box;
                                                        border: 1px solid #FFFFFF;" src="assets/images/icones-vendeurs2/ReadIconCopy.svg" alt=""></i>
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="block1-body-content2">
                                        <div class="div1-body-content1">
                                            <img src="assets/images/icones-vendeurs2/uriel_profil.jpg" alt="" class="img1-message">
                                            <img src="assets/images/icones-vendeurs2/man-user.jpg" alt="" class="img2-message">
                                        </div>
                                        <div class="div2-body-content1">
                                            <div class="line-conversation"></div>
                                        </div>
                                        <div class="div3-body-content1">
                                            <div class="text-conversation-nv1">
                                                <p class="elt1-text-conservation-nv1">@ObjetDuMessage</p>
                                                <p class="elt2-content2-text-conservation-nv1"></p>
                                            </div>
                                            <div class="text-conversation-nv2">
                                                Quapropter a natura mihi videtur potius quam ab indigentia orta amicitia.
                                            </div>
                                            <div class="text-conversation-nv3">
                                                <p class="elt1-text-conversation-nv3">
                                                    Il y'a 4 jours
                                                </p>
                                                <p class="elt2-text-conversation-nv3">
                                                    <i><img style="box-sizing: border-box;
                                                        border: 1px solid #FFFFFF;" src="assets/images/icones-vendeurs2/Ouvert.svg" alt=""></i>
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="block1-body-content3">
                                        <div class="div1-body-content1">
                                            <img src="assets/images/icones-vendeurs2/uriel_profil.jpg" alt="" class="img1-message">
                                            <img src="assets/images/icones-vendeurs2/man-user.jpg" alt="" class="img2-message">
                                        </div>
                                        <div class="div2-body-content1">
                                            <div class="line-conversation"></div>
                                        </div>
                                        <div class="div3-body-content1">
                                            <div class="text-conversation-nv1">
                                                <p class="elt1-text-conservation-nv1">@ObjetDuMessage</p>
                                                <p class="elt2-content3-text-conservation-nv1"></p>
                                            </div>
                                            <div class="text-conversation-nv2">
                                                Quapropter a natura mihi videtur potius quam ab indigentia orta amicitia.
                                            </div>
                                            <div class="text-conversation-nv3">
                                                <p class="elt1-text-conversation-nv3">
                                                    Il y'a une semaine
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="block1-body-content4">
                                        <div class="div1-body-content1">
                                            <img src="assets/images/icones-vendeurs2/uriel_profil.jpg" alt="" class="img1-message">
                                            <img src="assets/images/icones-vendeurs2/man-user.jpg" alt="" class="img2-message">
                                        </div>
                                        <div class="div2-body-content1">
                                            <div class="line-conversation"></div>
                                        </div>
                                        <div class="div3-body-content1">
                                            <div class="text-conversation-nv1">
                                                <p class="elt1-text-conservation-nv1">@ObjetDuMessage</p>
                                                <p class="elt2-text-conservation-nv1">
                                                    <span class="span-elt2-text-conservation-nv1">99+</span>
                                                </p>
                                                <p class="elt3-text-conservation-nv1"></p>
                                            </div>
                                            <div class="text-conversation-nv2">
                                                Quapropter a natura mihi videtur potius quam ab indigentia orta amicitia.
                                            </div>
                                            <div class="text-conversation-nv3">
                                                <p class="elt1-text-conversation-nv3">
                                                    Il y'a une heure
                                                </p>
                                                <p class="elt2-text-conversation-nv3">
                                                    <i><img style="box-sizing: border-box;
                                                        border: 1px solid #FFFFFF;" src="assets/images/icones-vendeurs2/ReadIconCopy.svg" alt=""></i>
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="block2">
                                <div class="head-block2">
                                    <span class="head-block2-span"><i><img style="box-sizing: border-box;border: 1px solid #FFFFFF;height: 17px;width: 17px;margin-top:10px;" src="assets/images/icones-vendeurs2/parametres-cog.png" alt=""></i>
                                    </span>
                                </div>
                                <div class="body-block2">
                                    <div class="body-block2-up">
                                        <div class="right-container-elt1">
                                            <p style="height: 20px;width: 343px;color: #FFFFFF;font-family: Roboto;font-size: 14px;font-weight: 500;
                                                letter-spacing: 0;line-height: 20px;text-align:center;padding-top:11px;">
                                                Lorem ipsum dolor sit amet, consectetur adipiscing
                                            </p>
                                        </div>
                                        <div class="right-container-elt2">
                                            <div style="height: 18px;width: 120px;margin-left:299px;">
                                                <p style="height: 18px;color: #8D97A5;font-family: Roboto;font-size: 12px;
                                                font-weight: 500;letter-spacing: 0.5px;line-height: 18px;text-align: right;">03/03/2022 à 18h10</p>
                                            </div>
                                            <div style="border-radius: 5px;background-color: #D8D8D8;height: 80px;width: 419px;">
                                                <p style="color: #51606D;font-family: Roboto;font-size: 14px;padding-left:5px;padding-top:5px;
                                                font-weight: 500;letter-spacing: 0;line-height: 20px;text-align:center;">
                                                    Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Elementum pulvinar etiam non quam lacus suspendisse
                                                </p>
                                            </div>
                                        </div>
                                        <div class="right-container-elt3">
                                            <div style="height: 22px;width: 419px;display:flex;margin-bottom:10px;">
                                                <span style="height: 22px;width: 22px;background-color: #4A4A4A;border-radius:50%;"></span>
                                                <span style="height: 20px;width: 106px;color: #4A4A4A;font-family: Roboto;
                                                font-size: 14px;font-weight: 500;letter-spacing: 0;line-height: 20px;margin-left:10px;">Client user name</span>
                                                <span style="height: 18px;margin-left:157px;width: 120px;color: #8D97A5;font-family: Roboto;
                                                font-size: 12px;font-weight: 500;letter-spacing: 0.5px;line-height: 18px;text-align: right;">03/03/2022 à 18h30</span>
                                            </div>
                                            <div style="height: 100px;width: 419px;border-radius: 5px;background-color: #191970;margin-bottom:10px;">
                                                <p style="height: 80px;width: 389.04px;color: #FFFFFF;font-family: Roboto;font-size: 14px;
                                                    font-weight: 500;letter-spacing: 0;line-height: 20px;padding-top:5px;text-align:center;padding-left:5px;">
                                                    Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Elementum pulvinar etiam non quam lacus suspendisse faucibus interdum.
                                                </p>
                                            </div>
                                            <div style="height: 80px;width: 419px;border-radius: 5px;background-color: #191970;">
                                                <p style="height: 80px;width: 389.04px;color: #FFFFFF;font-family: Roboto;font-size: 14px;
                                                    font-weight: 500;letter-spacing: 0;line-height: 20px;padding-top:5px;text-align:center;padding-left:5px;">
                                                    Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Elementum pulvinar etiam non quam lacus suspendisse faucibus interdum.
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="body-block2-bottom">
                                        <div style="height: 43px;width: 366px;border-radius: 6px;background-color: #F8F8F8;margin-left:20px;margin-top:9px;">
                                            <input style="height: 43px;width: 366px;color: #9B9B9B;font-family: Roboto;font-size: 14px;font-weight: 500;
                                            letter-spacing: 0;line-height: 19px;border-style: none;background-color: #F8F8F8;padding-left:10px;" type="text" name="" id="" placeholder="Saisir un message">
                                        </div>
                                        <div style="height: 17px;width: 93px;margin-left:24px;margin-top:22px;">
                                            <span class="picture-icon"><i><img src="assets/images/icones-vendeurs2/PictureIcon.svg" alt="" ></i></span>
                                            <span class="attachment-icon"><i><img src="assets/images/icones-vendeurs2/AttachmentIcon.svg" alt="" style="margin-left: 10px;"></i></span>
                                            <span class="emoji-icon"><i><img src="assets/images/icones-vendeurs2/EmojiIcon.svg" alt="" style="margin-left: 10px;"></i></span>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="block3">
                                <div id="block3-vue1">
                                    <div class="head-body-block3">
                                        <span style="height: 21px;width: 135px;color: #191970;font-family: Roboto;font-size: 18px;
                                            font-weight: bold;letter-spacing: -0.43px;line-height: 21px;margin-left:10px;margin-top:9.5px;">
                                            Détails du produit
                                        </span>
                                    </div>
                                    <div class="container-body-b3" style="height: 427px;width: 320px;border-radius: 16px 16px 0 0;background-color: #FFFFFF;
                                        box-shadow: 0 5px 15px 0 rgba(0,0,0,0.5);margin-left:14px;margin-top: 9.8px;">
                                        <div style="height: 36px;width: 259px;color: #191970;font-family: Roboto;font-size: 17px;font-weight: bold;
                                        letter-spacing: 0;line-height: 18px;margin-left:34px;padding-top: 10px;">Gril électrique de 18 ports de Cuisinart avec base de support</div>
                                        <div style="height: 188px;width: 259px;margin-left:34px;margin-top:10px;display:flex;margin-bottom:10px;">
                                            <div style="padding-top: 12px;">
                                                <div style="box-sizing: border-box;height: 60px;margin-bottom:4px;
                                                    width: 60px;border: 1px solid #1A7EF5;border-radius: 6px;background-color: #F8F8F8;"></div>
                                                <div style="box-sizing: border-box;height: 60px;margin-bottom:4px;
                                                    width: 60px;border: 1px solid #1A7EF5;border-radius: 6px;background-color: #F8F8F8;"></div>
                                                <div style="box-sizing: border-box;height: 60px;
                                                    width: 60px;border: 1px solid #1A7EF5;border-radius: 6px;background-color: #F8F8F8;"></div>
                                            </div>
                                            <div style="margin-left: 11px;padding-top: 12px;">
                                                <p style="box-sizing: border-box;height: 188px;width: 188px;border: 1px solid #1A7EF5;
                                                border-radius: 6px;background-color: #F8F8F8;"></p>
                                            </div>
                                        </div>
                                        <div style="display:flex;">
                                            <div style="height: 30px;width: 92px;margin-left:34px;border-radius: 6px;background-color: #191970;text-align:center;margin-top: 10px;">
                                                <p style="height: 10px;width: 72px;color: #FFFFFF;padding-left:3.2px;font-family: Roboto;font-size: 10px;font-weight: bold;padding-top:8px;
                                                    letter-spacing: 0;line-height: 10px;">Ref : XX-XXXXX</p>
                                            </div>
                                            <div style="height: 30px;width: 163px;margin-left:4px;border-radius: 6px;background-color: #00B517;display:flex;margin-top: 10px;">
                                                <span style="height: 16px;width: 16px;margin-left:8px;"><i><img style="box-sizing: border-box;" src="Chariot.svg" alt=""></i></span>
                                                <p style="height: 21px;width: 119px;color: #FFFFFF;font-family: Roboto;font-size: 12px;
                                                font-weight: 500;letter-spacing: 0;line-height: 21px;margin-left:10px;margin-top:6.97px;">681 814 Fcfa</p>
                                            </div>
                                        </div>
                                        <div style="display: flex;margin-left:33.5px;margin-top:9.5px">
                                            <div style="box-sizing: border-box;height: 68px;width: 57px;border: 1px solid #D8D8D8;border-radius: 6px;background-color: #FFFFFF;">
                                                <p style="height: 10px;width: 39px;color: #191970;font-family: Roboto;font-size: 10px;
                                                font-weight: bold;letter-spacing: 0;line-height: 10px;text-align:center;margin-left:9px;margin-top:7.5px;">
                                                Quantité</p>
                                                <p style="height: 30px;width: 34px;color: #191970;font-family: Roboto;
                                                font-size: 26px;font-weight: bold;letter-spacing: 0;line-height: 29px;margin-left:9px;">XX</p>
                                            </div>
                                            <div style="box-sizing: border-box;height: 68px;width: 57px;border: 1px solid #D8D8D8;margin-left:10px;border-radius: 6px;background-color: #FFFFFF;">
                                                <p style="height: 10px;width: 36px;margin-left:9px;margin-top:7.5px;color: #191970;font-family: Roboto;font-size: 10px;
                                                    font-weight: bold;letter-spacing: 0;line-height: 10px;">Couleur</p>
                                                <span style="margin-left: 16px;height: 16px;margin-left:9px;width: 42px;border-radius: 4px;background-color: #8B2634;display: inline-block;text-align:start">
                                                    <i style="margin-left: 18px;margin-bottom: 8px;"><img src="PathCopy10.svg" alt=""></i>
                                                </span>
                                            </div>
                                            <div style="box-sizing: border-box;height: 68px;
                                                width: 57px;border: 1px solid #D8D8D8;margin-left:10px;
                                                border-radius: 6px;background-color: #FFFFFF;">
                                                <p style="height: 10px;margin-left:9px;margin-top:7.5px;
                                                width: 41px;
                                                color: #191970;
                                                font-family: Roboto;
                                                font-size: 10px;
                                                font-weight: bold;
                                                letter-spacing: 0;
                                                line-height: 10px;">Caract. 2</p>
                                                <p style="height: 30px;width: 34px;color: #191970;font-family: Roboto;
                                                font-size: 26px;font-weight: bold;letter-spacing: 0;line-height: 29px;margin-left:9px;">XX</p>
                                            </div>
                                            <div style="box-sizing: border-box;height: 68px;
                                                width: 57px;border: 1px solid #D8D8D8;margin-left:10px;
                                                border-radius: 6px;background-color: #FFFFFF;">
                                                <p style="height: 10px;margin-left:9px;margin-top:7.5px;
                                                width: 40px;
                                                color: #191970;
                                                font-family: Roboto;
                                                font-size: 10px;
                                                font-weight: bold;
                                                letter-spacing: 0;
                                                line-height: 10px;">Caract. 3</p>
                                                <p style="height: 30px;width: 34px;color: #191970;font-family: Roboto;
                                                font-size: 26px;font-weight: bold;letter-spacing: 0;line-height: 29px;margin-left:9px;">XX</p>
                                            </div>
                                        </div>
                                        <a href="#" style="height: 37px;width: 259px;border-radius: 6px;background-color: #1A7EF5;display:block;margin-left:34px;margin-top:10.5px;
                                                text-decoration:none;" id="generer-code-acceuil-messagerie">
                                            <div style="height: 18px;width: 123px;color: #FFFFFF;margin-left:68px;padding-top:10.5px;
                                                font-family: Roboto;font-size: 16px;font-weight: 500;letter-spacing: 0.35px;
                                                line-height: 18px;text-align: center;">Générer un code</div>
                                        </a>
                                    </div>
                                </div>
                                <div id="block3-vue2" style="display: none;">
                                    <div class="head-body-block32">
                                        <p style="height: 21px;width: 308px;color: #191970;font-family: Roboto;font-size: 18px;font-weight: 500;padding-top:10px;padding-left:10px;
                                            letter-spacing: -0.43px;line-height: 21px;">
                                            Création du code produit
                                        </p>
                                    </div>
                                    <form action="" method="post" data-tpost="async">
                                        <div style="height: 61px;width: 307px;margin-top: 19px;margin-left: 20px;">
                                            <label for="reference-produit-messagerie-vendeur" style="height: 15px;
                                            width: 138px;
                                            color: #191970;
                                            font-family: Roboto;
                                            font-size: 14px;
                                            font-weight: 500;
                                            letter-spacing: 0.34px;
                                            line-height: 15px;
                                            text-align: center;">Référence du produit</label>
                                            <input type="text" name="" id="reference-produit-messagerie-vendeur" class="reference-produit-messagerie-vendeur input-field" style="height: 41px;
                                            width: 307px;color: #4A4A4A;font-family: Roboto;font-size: 14px;font-weight: 500;letter-spacing: -0.34px;
                                            line-height: 16px;padding-left: 10px;" placeholder="Réf : XX-XX-XX-XX">
                                        </div>
                                        <div style="height: 61px;width: 307px;margin-top: 9px;margin-left: 20px;">
                                            <label for="select-remise" style="height: 15px;
                                            width: 120px;
                                            color: #191970;
                                            font-family: Roboto;
                                            font-size: 14px;
                                            font-weight: 500;
                                            letter-spacing: 0.34px;
                                            line-height: 15px;
                                            text-align: center;">Remise du produit</label>
                                            <div class="remise-prod" style="height: 41px;width: 307px;display: flex;">
                                                <div style="box-sizing: border-box;
                                                    height: 41px;
                                                    width: 201px;
                                                    border: 1px solid #979797;
                                                    border-radius: 6px 0 0 6px;
                                                    background-color: #FFFFFF;">
                                                    <select name="" id="select-remise" class="select-remise-produit-messagerie-vendeur input-field" style="border: none;display: block;">
                                                        <option value="" style="text-align: center;">--</option>
                                                        <option value="">5%</option>
                                                        <option value="">10%</option>
                                                    </select>
                                                </div>
                                                <div style="box-sizing: border-box;
                                                    height: 41px;
                                                    width: 107px;
                                                    border: 1px solid #979797;
                                                    border-radius: 0 6px 6px 0;
                                                    background-color: #F8F8F8;">
                                                    <label for="devise-pour-remise" style="height: 20px;width: 107px;display: flex;">
                                                        <span style="height: 16px;margin-left: 10px;margin-top: 10px;
                                                        width: 60px;
                                                        color: #4A4A4A;
                                                        font-family: Roboto;
                                                        font-size: 14px;
                                                        font-weight: 500;
                                                        letter-spacing: -0.34px;
                                                        line-height: 16px;">F CFA</span>
                                                        <span style="height: 5.83px;width: 11.67px;margin-top: 3px;"><i class="fa fa-caret-down"></i></span>
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                        <div style="height: 61px;width: 307px;margin-top:9px;margin-left: 20px;">
                                            <label for="nbr-produit-messagerie-vendeur" style="height: 15px;width: 200px;
                                            color: #191970;
                                            font-family: Roboto;
                                            font-size: 14px;
                                            font-weight: 500;
                                            letter-spacing: 0.34px;
                                            line-height: 15px;
                                            text-align: left;">Nombre du produit</label>
                                            <div style="display:flex;box-sizing: border-box;
                                                height: 41px;
                                                width: 307px;
                                                border: 1px solid #979797;
                                                border-radius: 6px;
                                                background-color: #FFFFFF;">
                                                <input type="number" placeholder="01" style="padding:10px;"class="nbr-produit-messagerie-vendeur" id="nbr-produit-messagerie-vendeur">
                                            </div>
                                        </div>
                                        <div style="height: 61px;width: 307px;margin-top: 9px;margin-left: 20px;">
                                            <label for="" style="height: 15px;
                                            width: 167px;
                                            color: #191970;
                                            font-family: Roboto;
                                            font-size: 14px;
                                            font-weight: 500;
                                            letter-spacing: 0.34px;
                                            line-height: 15px;
                                            text-align: center;">Date d'expiration du code</label>
                                            <div style="display: flex;box-sizing: border-box;
                                            height: 41px;
                                            width: 307px;
                                            border: 1px solid #979797;
                                            border-radius: 6px;
                                            background-color: #FFFFFF;color:A4A4A4;padding-left:10px;">
                                                <select name="" id="" class="select-datexp-produit-messagerie-vendeur input-field">
                                                    <option value="">Une semaine</option>
                                                    <option value="">Deux semaine</option>
                                                    <option value="">Trois semaine</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div style="display: flex;margin-top: 13px;">
                                            <a href="#" id="annulerVue2" style="margin-top:10.5px;text-decoration:none;box-sizing: border-box;margin-left:37px;
                                                height: 37px;width: 100px;border: 1px solid #1A7EF5;border-radius: 6px;background-color: #FFFFFF;">
                                                <div style="height: 100px;padding-top:10.5px;
                                                width: 100px;
                                                color: #1A7EF5;
                                                font-family: Roboto;
                                                font-size: 16px;
                                                font-weight: 500;
                                                letter-spacing: 0.35px;
                                                line-height: 18px;
                                                text-align: center;">Annuler</div>
                                            </a>
                                            <a href="#" id="generer-code-vue2-messagerie" style="height: 37px;width: 164px;border-radius: 6px;background-color: #1A7EF5;display:block;margin-left:10px;margin-top:8.5px;
                                                    text-decoration:none;">
                                                <div style="padding-top:10.5px;height: 18px;
                                                width: 164px;
                                                color: #FFFFFF;
                                                font-family: Roboto;
                                                font-size: 16px;
                                                font-weight: 500;
                                                letter-spacing: 0.35px;
                                                line-height: 18px;
                                                text-align: center;">Générer un code</div>
                                            </a>
                                        </div>
                                        <div style="height: 61px;width: 320px;border-radius: 16px 16px 0 0;padding-top: 10px;
                                            background-color: #FFFFFF;margin-top: 28px;margin-left: 10px;
                                            box-shadow: 0 0 15px 0 rgba(0,0,0,0.5);">
                                            <p style="height: 36px;width: 260px;color: #191970;font-family: Roboto;font-size: 17px;margin-left: 34px;
                                                font-weight: bold;letter-spacing: 0;line-height: 18px;">Gril électrique de 18 ports de Cuisinart avec base de support</p>
                                        </div>
                                    </form>
                                </div>
                                <div id="block3-vue3" style="display: none;">
                                    <div class="head-body-block33">
                                        <p style="height: 21px;width: 188px;color: #191970;font-family: Roboto;font-size: 18px;font-weight: 500;
                                            letter-spacing: -0.43px;line-height: 21px;margin-left: 12px;margin-top: 12px;">
                                            Générer le  code produit
                                        </p>
                                    </div>
                                    <form action="" method="post" data-tpost="async">
                                        <div>
                                            <p style="margin-left: 150px;margin-top: 15px;"><i><img src="Valider2.svg" alt=""></i></p>
                                            <p style="height: 18px;margin-left: 90px;
                                            width: 172px;
                                            color: #191970;
                                            font-family: Roboto;
                                            font-size: 15px;
                                            font-weight: 500;
                                            letter-spacing: 0;
                                            line-height: 18px;
                                            text-align: center;">Code généré avec succès</p>
                                        </div>
                                        <div style="height: 181px;width: 317px;border-radius: 16px;background-color: #FFFFFF;margin-left: 14px;margin-top: 32px;padding-top: 30px;">
                                            <div style="height: 100px;width: 262px;border: 1px dashed #979797;border-radius: 16px;
                                                background-color: #FFFFFF;display: flex;margin-left: 27.5px;">
                                                <p style="height: 40px;
                                                width: 162px;margin-left: 35px;margin-top: 30px;
                                                color: #1A7EF5;
                                                font-family: Roboto;
                                                font-size: 40px;
                                                font-weight: 500;
                                                letter-spacing: 0;
                                                line-height: 40px;
                                                text-align: center;">XXX-XXX</p>
                                                <p style="margin-top: 38px;margin-left: 3px;"><i><img src="Copie_Colle.svg" alt=""></i></p>
                                            </div>
                                            <p style="margin-top: 15px;margin-left: 96px;height: 16px;
                                                width: 125px;
                                                color: #4A4A4A;
                                                font-family: Roboto;
                                                font-size: 14px;
                                                font-weight: 500;
                                                letter-spacing: -0.34px;
                                                line-height: 16px;">
                                                    <span>Expire le 31/12/2021</span></p>
                                        </div>
                                        <div style="width: 100px;height: 37px;margin-top: 34px;margin-left: 123px;">
                                            <a href="#" style="margin-top:10.5px;text-decoration:none;" id="fermer-generer-code-messagerie">
                                                <div style="box-sizing: border-box;
                                                height: 37px;padding-top: 7px;
                                                width: 100px;
                                                border: 1px solid #1A7EF5;
                                                border-radius: 6px;
                                                background-color: #FFFFFF;color: #1A7EF5;
                                                font-family: Roboto;
                                                font-size: 16px;
                                                font-weight: 500;
                                                letter-spacing: 0.35px;
                                                line-height: 18px;
                                                text-align: center;">Fermer</div>
                                            </a>
                                        </div>
                                        <div style="height: 61px;width: 320px;border-radius: 16px 16px 0 0;padding-top: 10px;
                                            background-color: #FFFFFF;margin-top: 30px;margin-left: 10px;
                                            box-shadow: 0 0 15px 0 rgba(0,0,0,0.5);">
                                                <p style="height: 36px;width: 260px;color: #191970;font-family: Roboto;font-size: 17px;margin-left: 34px;
                                                    font-weight: bold;letter-spacing: 0;line-height: 18px;">Gril électrique de 18 ports de Cuisinart avec base de support</p>
                                        </div>
                                    </form>
                                </div>   
                        </div>
                        </div>
                    </div>
                </div>
            </div>
     

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js " integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM " crossorigin="anonymous "></script>


