<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    {{-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous"> --}}
    <title>Document</title>
    <style>
         @import url('https://fonts.googleapis.com/css2?family=Gelasio:ital@1&family=Licorice&family=Noto+Sans&family=Roboto:wght@300;400&family=Tajawal:wght@300&display=swap');
        *{
            margin: 0px;
            padding: 0px;
        }

        .recap-box-panier-plein {
            box-sizing: border-box;
            height: 100vh;
            width: 301px;
            box-shadow: 0 0px 5px 0 rgba(0,0,0,0.5);
            border-radius: 0 0 6px 6px;
            background-color: #f5f5f5;
            position: absolute;
            float: right;
            right: 1px;
            display: flex;
            justify-content: center;
            align-items: center;
            flex-direction: column;
        }

        .box-container {
            box-sizing: border-box;
            height: 209px;
            width: 302px;
            border: 0.5px solid #9B9B9B;
            border-radius: 0 0 6px 6px;
            background-color: #FFFFFF;
            display: flex;
            justify-content: center;
            align-items: center;
            margin-bottom: 5px;
        }

        .box-elements {
            height: 189px;
            width: 282px;
        }

        .row {
            margin: 0px;
            padding: 0px;
        }

        .button-option button {
            border: none;
            background-color: transparent;
        }

        .button-option button img {
            box-sizing: border-box;
            height: 20px;
            width: 20px;
            border: 1px solid #1A7EF5;
            background-color: #FFFFFF;
            border-radius: 50%;
        }

        .product-caracteristique .col1 {
            position: relative;
            margin: 0px !important;
            padding: 0px !important;
        }

        .product-caracteristique .label span {
            width: 39px;
            color: #191970;
            font-size: 8px;
            left: 4px;
            margin: 0px !important;
            padding: 0px !important;
            background-color: #191970;
        }

        .custom-col span {
            font-size: 8px;
            margin: 0px !important;
            padding: 0px !important;
        }

        .custom-col {
            margin: 0px !important;
            padding: 0px !important;
            background-color: #191970;
        }

        .custom-span {
            font-size: 8px;
            padding: 0px !important;
            margin-left: 6px;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
        }

        .custom-span span {
            height: 10px;
            width: 42px;
            color: #191970;
            font-family: Roboto;
            font-size: 10px;
            line-height: 10px;
            text-align: center;
            position: relative;
            margin-bottom: 3px !important;
            text-transform: uppercase;
        }

        .custom-span:first-child span {
           position: relative;
           left: -5px;
        }

        .infos-val-caracteristique {
            box-sizing: border-box;
            height: 20px;
            width: auto;
            border: 0.75px solid #1A7EF5;
            border-radius: 4px;
            background-color: #FFFFFF;
            text-align: center;
            display: flex;
            justify-content: center;
            align-items: center;
            color: #4A4A4A;
            font-family: Roboto;
            font-size: 12px !important;
            letter-spacing: 0;
            line-height: 12px;
            text-align: center;
            margin-top: 0px;
            padding: 4px 5px 0px 5px;

        }

        .infos-val-caracteristique p {
            color: #4A4A4A;
            font-family: Roboto;
            font-size: 8px;
            letter-spacing: 0;
            line-height: 9px;
            position: relative;
            top: 2px;
        }

        .text-infos {
            display: flex;
            flex-direction: row;
           justify-content: space-between;
        }

        .text-infos p {
            height: 18px;
            width: 249px;
            color: #b50045;
            font-family: Roboto;
            font-size: 8px;
            letter-spacing: 0;
            line-height: 9px;
        }

        .text-infos img {
            height: 14px;
            width: 19px;
         }

         .product-description p {
            color: #4A4A4A;
            font-family: Roboto;
            font-size: 12px;
            letter-spacing: -0.08px;
            margin: 0%;
         }

         .col button {
            color: #4A4A4A;
            font-family: Roboto;
            font-size: 8px;
            letter-spacing: 0;
            line-height: 9px;
            text-align: center;

            box-sizing: border-box;
            height: 19px;
            width: 42px;
            border: 0.75px solid #1A7EF5;
            border-radius: 4px;
            background-color: #FFFFFF;
         }

         .img-layout {
            height: 74px;
            width: 74px;
            margin-right: 15px;
         }

         .img-layout-1 {
            height: 74px;
            width: 74px;
            margin-right: 15px;
            display: flex;
            align-items: center;
            padding-left: 0px;
            background-color: #f5f5f5;
         }

         .no-padding {
            padding-left: 0;
            padding-right: 0;
        }

         .checked-color {
            background-color: #8B2634 !important;
            color: #ffffff !important;
            border: none !important;
         }

         .text-layout {
            width: 138px;
            height: 74px;
            margin-right: 15px;
            display: flex;
            flex-direction: column;
            column-gap: 0px;
            justify-content: center;
            align-items: center;
            padding: 0px;
         }

         .button-layout {
            width: 38px;
            height: 74px;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
         }

         .button-layout .button-close  {
            height: 30px;
            width: 30px;
            border: none;
            border-radius: 50%;
            background-color: #F5F5F5;
            position: relative;
         }

         .button-layout .button-close  svg{
            position: relative;
            height: 20px !important;
            width: 20px !important;
            top: -2px;
         }

         .button-layout .button-open  {
            box-sizing: border-box;
            height: 30px;
            width: 30px;
            border: 1px solid #1A7EF5;
            border-radius: 50%;
            background-color: transparent;
         }

         .button-layout .button-close svg {
            color: #1A7EF5 !important;
         }

         .button-layout .button-open img  {
             width: 12px !important;
             color: #1A7EF5 !important;
             height: 12px;
             position: relative;
             top: -2px;
             border-radius: 50%;
         }

         .button-opendd {
             background-color: transparent;
         }


         .line-separator {
            height: 0.5px;
            width: 281px;
            border: 0.5px solid #D8D8D8;
            margin-bottom: 5px !important;
         }

         .line-separator-updated {
            height: 0.5px;
            width: 150px;
            border: 0.5px solid #D8D8D8;
            margin-bottom: 5px;
         }

         .line-separator1 {
            height: 0.5px;
            width: 281px;
            border: 0.5px solid #D8D8D8;
            margin-bottom: 5px;
         }

         .article-prix {
             margin: 0px;
             padding: 0px;
             width: 280px;
             padding: 0px 11px 0px 11px;
             display: flex;
             justify-content: space-between;
             align-items: center;
             margin-bottom: 10px;
         }

         .article {
            height: 13px;
            width: 56px;
            color: #000000;
            font-family: Roboto;
            font-size: 12px;
            letter-spacing: -0.08px;
            line-height: 13px;
         }

         .prix {
            height: 13px;
            color: #191970;
            font-family: Roboto;
            font-size: 12px;
            font-weight: bold;
            letter-spacing: -0.08px;
            line-height: 13px;
            text-align: right;
         }


         .span-button-edit {
            box-sizing: border-box;
            height: 30px;
            width: 30px;
            border: 1px solid #1A7EF5;
            background-color: #FFFFFF;
            border-radius: 50%;
            cursor: pointer;
            position: relative;
            left: 2px;
         }

         .span-button-edit img {
             position: relative;
             left: 7.5px;
             margin-left: auto;
             margin-right: auto;

         }

         .text-level-1 {
            height: 39px;
            width: 138px;
            color: #4A4A4A;
            font-family: Roboto;
            font-size: 12px;
            letter-spacing: -0.08px;
            line-height: 13px;
         }

         .text-level-2 {
            height: 8px;
            width: 138px;
            color: #9B9B9B;
            font-family: Roboto;
            font-size: 8px;
            letter-spacing: 0;
            line-height: 8px;
         }

         .text-level-3 {
            height: 13px;
            width: 138px;
            color: #191970;
            font-family: Roboto;
            font-size: 12px;
            font-weight: 500;
            letter-spacing: -0.08px;
            line-height: 13px;
         }

         .blue-header-custom {
            background-color: #191970;
            height: 84px;
            width: 302px;
            display: flex;
            justify-content: flex-start;
            align-items: center;
            flex-direction: column;
            position: fixed;
            top: 0px;
            padding: 0px !important;
        }

        .blue-header-custom h4 {
            height: 19px;
            color: #FFFFFF;
            font-family: Roboto;
            font-size: 16px;
            font-weight: 500;
            letter-spacing: -0.39px;
            line-height: 19px;
            text-align: center;
            position: relative;
            top: 34px;
        }

        .detail-footerk {
            height: 214px;
            width: 302px;
            background-color: #ffffff;
            display: flex;
            justify-content: flex-start;
            align-items: center;
            flex-direction: column;
            position: fixed;
            bottom: 0px;
            padding: 0px !important;
        }

        .label-infos {
            width: 84px;
            color: #9B9B9B;
            font-family: Roboto;
            font-size: 14px;
            letter-spacing: 0;
            line-height: 24px;
        }

        .label-price {
            height: 20px;
            width: 97px;
            color: #4A4A4A;
            font-family: Roboto;
            font-size: 14px;
            font-weight: bold;
            letter-spacing: 0;
            line-height: 24px;
            text-align: right;
        }

        .total-price-value {
            height: 24px;
            width: 118px;
            color: #1B2125;
            font-family: Roboto;
            font-size: 16px;
            font-weight: bold;
            letter-spacing: 0;
            line-height: 24px;
            text-align: right;
        }

        .total-price-label {
            height: 24px;
            width: 62.19px;
            color: #1B2125;
            font-family: Roboto;
            font-size: 16px;
            letter-spacing: 0;
            line-height: 24px;
        }

        .infos-bouton button {
            height: 37px;
            width: 204px;
            border: none;
            color: #fff;
            border-radius: 6px;
            background-color: #1A7EF5;
            font-family: Roboto;
            font-size: 15px;
            font-weight: 500;
            letter-spacing: -0.36px;
            line-height: 17px;
            text-align: center;
        }

        /* update  */
        .article-new {
            height: 25px;
            width: 281px;
        }

        .article-new .col1 {
            height: 25px;
            width: 136px;
            border-radius: 6px;
            background-color: rgba(128,195,243,0.15);
        }

        .article-new .col1 span {
            color: #000000;
            font-family: Roboto;
            font-size: 12px;
            letter-spacing: -0.08px;
            line-height: 13px;
        }

        .article-new .col2 {
            height: 25px;
            width: 136px;
            border-radius: 6px;
            background-color: rgba(128,195,243,0.15);
        }

        .article-new .col2 span{
            color: #191970;
            font-family: Roboto;
            font-size: 12px;
            font-weight: 500;
            letter-spacing: -0.08px;
            line-height: 13px;
            text-align: right;
        }

        .article-new .col3 {
            height: 14px;
            width: 1px !important;
            border: 1px solid #D8D8D8;
            background-color: #1A7EF5;
        }

        .separateur-1 {
            padding: 0px !important;
            margin-left: 4.5px;
            margin-right: 4.5px;
            position: relative;
            margin-top: auto;
            margin-bottom: auto;

            box-sizing: border-box;
            height: 14px;
            width: 0.5px;
            border: 0.5px solid #D8D8D8;
        }

        .expedition-info {
            height: 25px;
            width: 281px;
            border-radius: 6px;
            background-color: rgba(245,166,35,0.15);
        }

        .expedition-info span {
            color: #191970;
            font-family: Roboto;
            font-size: 11px;
            font-weight: 500;
            letter-spacing: 0;
            line-height: 11px;
            text-align: center;
        }

        .bull-over-1 {
            position: absolute;
            top: -15px;
            height: 16px;
            width: 301px;
            margin: 0px !important;
            padding: 0px !important;
            background-repeat: no-repeat;
            background-size: cover;
        }

        .bull-over-1 img {
            position: relative;
            width: 301px !important;
            height: inherit;
        }

        .bull-over-1-infos {
            height: 49px;
            width: 301px;
            border-radius: 15px 15px 0 0;
            background-color: #00B517;
            position: absolute;
            top: -53px;
            margin: 0px !important;
            z-index: -1;
            display: flex;
            justify-content: center;
            align-items: center;
            padding-top: 12px;
            padding-left: 14px;
        }

        .bull-over-1-infos2 {
            height: 49px;
            width: 301px;
            border-radius: 15px 15px 0 0;
            background-color: #FF9500;
            position: absolute;
            top: -53px;
            margin: 0px !important;
            z-index: -1;
            display: flex;
            justify-content: center;
            align-items: center;
            padding-top: 6px;
        }

        .bull-over-1-infos3 {
            height: 49px;
            width: 301px;
            border-radius: 15px 15px 0 0;
            background-color: #D0021B;
            position: absolute;
            top: -53px;
            margin: 0px !important;
            z-index: -1;
            display: flex;
            justify-content: center;
            align-items: center;
            padding-top: 6px;
        }

        .active-button {
            background-color: #8B2634 !important;
        }

        .text-section_rayon {
            height: 91px;
            width: 241px;
        }

        .sous-total {
            width: 75px;
            color: #191970;
            font-family: Roboto;
            font-size: 14px;
            font-weight: 500;
            letter-spacing: 0;
            line-height: 16px;
            background-color: #1A7EF5;
        }

        .el1 {
            width: 75px;
            color: #191970;
            font-family: Roboto;
            font-size: 14px;
            font-weight: 500;
            letter-spacing: 0;
            line-height: 16px;
        }

        .el1-p {
            width: 75px;
            color: #191970;
            font-family: Roboto;
            font-size: 10px;
            font-weight: 500;
            letter-spacing: 0;
            line-height: 16px;
        }

        .el2 {
            width: 89px;
            color: #4A4A4A;
            font-family: Roboto;
            font-size: 11px;
            font-weight: bold;
            letter-spacing: 0;
            line-height: 16px;
            text-align: right;
        }

        .el2-p {
            width: 89px;
            color: #4A4A4A;
            font-family: Roboto;
            font-size: 11px;
            font-weight: 500;
            letter-spacing: 0;
            line-height: 16px;
            text-align: right;
        }

        #separtor {
            position: relative;
            margin-left: auto;
            margin-right: auto;
            width: 227px !important;
        }

        #montant_total {
            height: 19px;
            width: 101px;
            color: #191970;
            font-family: Roboto;
            font-size: 16px;
            font-weight: bold;
            letter-spacing: 0;
            line-height: 17px;
            text-align: right;
        }

        .left-hidden {
            position: absolute !important;
            float: right !important;
            right: -700px;
        }

        .btn-right-panier {
            height: 44.61px;
            width: 45.58px;
            border-radius: 50%;
            background-color: #FFFFFF;
            border: none;
            z-index: 999;
        }

        .rayon-btn-direction-panier {
            width: 87px;
            height: 80px;
            background-color: rgba(0,0,0,0.45);
            border: none;
            cursor: pointer;
            float: right;
            right: 0px;
            position: absolute;
            top: 200px;
            border-radius: 25px 0px 0px 25px;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .panier-counter {
            box-sizing: border-box;
            height: 24px;
            width: auto;
            border: 1px solid #FFFFFF;
            border-radius: 5px;
            background-color: #D0021B;
            position: absolute;
            z-index: 1000;
            color: #fff;
            float: left;
            left: 20px;
            text-align: center;
            left: 5px;
            padding: 0px 5px 5px 4px 
        }

        .hidden-element {
            position: absolute;
            float: right;
            right: 6000px;
        }

        .panier_show {
            position: absolute;
            float: right;
            right: 1px;
        }

        .btn-right-panier {
            position: relative;
            top: 18px;
            left: 25px;
        }

        .modal-body-main-recap-produit-panier {
            height: 100vh;
            width: 100%;
            position: absolute;
            z-index: 1000;
            background-color: rgba(0, 0, 0, 0.5);
            display: flex;
        }

        .card-box {
            height: 445px;
            width: 301px;
            overflow-y: auto;
            overflow-x: hidden;
            background-color: #F5F5F5;
            position: sticky;
            top: 62px;
            margin-left: auto;
            margin-right: auto;
            position: fixed;
            margin-top: 20px;
        }

        .btn-outline-primary {
            box-sizing: border-box;
            height: 37px;
            width: 37px;
            border: 1px solid #1A7EF5;
            border-radius: 6px;
            background-color: #FFFFFF;
            justify-content: center;
            align-items: center;
        }

        .btn-outline-primary img {
            width: 20px;
            height:20px;
            position: relative;
            margin-left: auto;
            margin-right: auto;
            right: 5px;
            top: -2px;
        }

        .custom-close-panier  {
            box-sizing: border-box;
            height: 37px;
            width: 37px;
            border: 1px solid #1A7EF5;
            border-radius: 6px;
            background-color: #FFFFFF;
            position: relative;
            top: 35px;
            border: none;
        }

        .el1-total {
            height: 19px;
            color: #191970;
            font-family: Roboto;
            font-size: 16px;
            letter-spacing: 0;
            line-height: 17px;
        }

        .el2-total {
            height: 19px;
            color: #191970;
            font-family: Roboto;
            font-size: 16px;
            font-weight: bold;
            letter-spacing: 0;
            line-height: 17px;
            text-align: right;
        }

        .customu-popup {
            height: 209px;
            width: 301px;
            border-radius: 0 0 6px 6px;
            background-color: rgba(0,0,0,0.45);
            position: absolute;
            display: flex;
            justify-content: center;
            align-items: center;
            float: right;
            right: -5.5px;
            z-index: 1000;

        }

        .container-supp {
            height: 123px;
            width: 264px;
            border-radius: 6px;
            background-color: #FFFFFF;
            box-shadow: 0 5px 15px 0 rgba(0,0,0,0.5);
            position: absolute;
            display: flex;
            justify-content: center;
            align-items: center;
            flex-direction: column;
            column-gap: 14px;
        }

        .custom-commande-del {

        }

        .supp-oui {
            height: 37px;
            width: 100px;
            border-radius: 6px;
            background-color: #007AFF;
            border: none;
            color: #FFFFFF;
            font-family: Roboto;
            font-size: 14px;
            font-weight: 500;
            letter-spacing: 0.31px;
            line-height: 18px;
            text-align: center;
        }

        .supp-non {
            box-sizing: border-box;
            height: 37px;
            width: 100px;
            border: 1px solid #007AFF;
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

        .data-upp-show {
            float: right;
            right: 1px;
        }

        .popu-del-produit {
            height: 16px;
            width: 177px;
            color: #191970;
            font-family: Roboto;
            font-size: 14px;
            font-weight: 500;
            letter-spacing: -0.34px;
            line-height: 16px;
            text-align: center;
        }

        .data-supp-dismiss {
            float: right;
            right: -1000px
        }

        .mystyle {
            float: right;
            right: -1000px;
        }

    </style>

    <style>
            .coupon_code_cacher {
        display : none !important;
    }

    .modal-dialog-test {
      width: 973px;
      border-radius: 6px;
      background-color: #F8F8F8;
      position: relative;
      display: flex;
      flex-direction: column;
      justify-content: flex-start;
      align-items: center;
      background-color: transparent;
    }

    .modal-content-pan, .modal-body-pan-updated {
        width: 973px;
        height: 579px !important;
    }

    .modal-header {
        display: flex;
        justify-content: center;
        align-items: center;
    }

    .modal-header .close-btn-pan {
        position: absolute;
    }
    .modal-header .rounded-check {
        height: 24px;
        width: 24px;
        outline: none;
        border: 1px solid #00B517;
        border-radius: 50%;
        background-color: #fff;
        justify-content: center;
        align-items: center;
        position: relative;
        left: -3.5px;
        top: -2px;
    }

    .modal-header .rounded-check i {
        text-align: center;
        position: relative;
        left: -3.5px;
        top: -2px;
    }
    .close-btn-pan{
        width: 24px;
        height: 24px;
        background-image: url('/assets/images/close-btn.svg') !important;
        background-size:  24px;
        background-repeat: no-repeat;
        border: 1px solid #fff;
        background-color: #1A7EF5;
        opacity: 1;
        border-radius: 50%;
        position: absolute;
        top: -21px;
        right: -9px;
    }

    .modal-header h4 {
        color: #00B517;
        font-family: Roboto;
        font-size: 20px;
        font-weight: 700;
        letter-spacing: 0;
        line-height: 22px;
        text-align: center;
    }
    .modal-body-pan-updated .rows .col .step-panier {
        box-sizing: border-box;
        height: 37px;
        width: 195px;
        border-radius: 6px;
        font-family: Roboto;
        font-size: 14px;
        font-weight: 500;
        display: flex !important;
        justify-content: center;
        align-items: center;
    }

    .exp4 {
        margin-top: 27px;
        width: 500px;
    }

    .step-panier-completed {
        color: #00B517;
        border: 1px solid #00B517;
        background-color: #fff;
        opacity: 0.5;
    }

    .row-header .rows .col {
        margin: 0px 51px 0px 0px !important;
        padding: 0px !important;
    }

    .row-header .row-pop {
        display: flex !important;
        justify-content: space-between;
        align-items: flex-start;
        position: relative;
        top: 10px;
    }

    .step-panier {
        display: block !important;
    }

    .step-panier span{
        display: block;
    }
    .step-expedition-bis {
        box-sizing: border-box;
        height: 149px;
        width: 464px !important;
        border: 1px solid #D8D8D8;
        border-radius: 6px;
        background-color: #FFFFFF;
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
        align-items: center;
    }

    .step-expedition-bis -echec {
        border: 1px solid #D0021B !important;
    }

    .step-expedition2 {
        box-sizing: border-box;
        height: 149px;
        width: 464px;
        border: 1px solid #c1bfbf;
        border-radius: 6px;
        background-color: #FFFFFF;

        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
        align-items: center;
    }

    .step-mode-expedition {
        height: 188px;
        width: 170.2px;
        border-radius: 6px;
        background-image: url('/assets/recap_produit/images/claudio-schwarz-a85IYeAXgxU-unsplash\ Copy.svg');
    }

    .step-mode-expedition {
        display: flex;
        justify-content: center;
        align-items: center;
    }

    .step-mode-expedition button {
        position: relative;
        bottom: -66px;
        box-sizing: border-box;
        height: 37px;
        width: 152px;
        border: 1px solid #1A7EF5;
        border-radius: 6px;
        background-color: #FFFFFF;

        letter-spacing: 0.35px;
        line-height: 18px;
        text-align: center;

        color: #1A7EF5;
    }

    .step-mode-expedition button:hover {
        background-color: #fff;
        color: #1A7EF5;
    }
    .step-expedition-bis button {
        height: 37px;
        width: 220px;
        border: none;
        border-radius: 6px;
        background-color: #1A7EF5;

        font-size: 14px;
        font-weight: 500;
        letter-spacing: -0.34px;
        line-height: 16px;
        text-align: center;
        color: #fff;
    }

    .step-expedition-bis .text-expedition {
        width: 247px;
        color: #191970;
        font-family: Roboto;
        font-size: 18px;
        font-weight: 500;
        letter-spacing: -0.43px;
        line-height: 20px;
        text-align: center;
        margin-bottom: 20px;
    }


    .center img {
        margin-bottom: 20px;
    }

    .center2 p {
        height: 38px;
        color: #9B9B9B;
        font-family: Roboto;
        font-size: 16px;
        font-weight: 500;
        letter-spacing: -0.39px;
        line-height: 17px;
        text-align: center;
        text-transform: uppercase;
        letter-spacing: 1px;
    }

    .main-row {
          box-sizing: border-box;
          height: 442px;
          width: 933px;
          border: 1px solid #D8D8D8;
          border-radius: 6px;
          background-color: #FFFFFF;
    }

    .bottom-element {
        height: 38px;
        width: 210px;
        color: #4A4A4A;
        font-family: Roboto;
        font-size: 16px;
        font-weight: bold;
        letter-spacing: -0.39px;
        line-height: 17px;
        text-align: center;
    }

    .center button {
        box-sizing: border-box;
        height: 37px;
        width: 246px;
        color: #1A7EF5;
        border: 1px solid #1A7EF5;
        border-radius: 6px;
        font-family: Roboto;
        font-size: 14px;
        font-weight: 500;
        letter-spacing: 0.31px;
        line-height: 14px;
        text-align: center;
        background-color: #fff;
    }

    .step-default {
        border: none !important;
    }

    .step-default span {
          height: 16px;
          width: 95px;
          color: #9B9B9B !important;
          font-family: Roboto;
          font-size: 14px;
          font-weight: 500;
          letter-spacing: -0.34px;
          line-height: 16px;
          text-align: center;
    }
    .step-blue {
        box-sizing: border-box;
        height: 37px;
        width: 195px;
        border: 1px solid #1A7EF5 !important;
        border-radius: 6px;
        background-color: #FFFFFF;
        font-size: 14px;
        font-weight: 500;
    }

    .step-blue span {
        color: #191970 !important;
    }

    .pannier-article {
        display: flex;
        flex-direction: row;
        justify-content: flex-end;
        position: relative;
        left: -350px;
    }

    .el1 {
          color: #191970;
          font-family: Roboto;
          font-size: 24px;
          font-weight: 500;
          letter-spacing: 0;
          line-height: 30px;
    }

    .el2 {
      width: 150px !important;
      color: #191970;
      font-family: Roboto;
      font-size: 16px;
      letter-spacing: 0;
      line-height: 12px;
    }

    .volet-droite-modal-content {
        height: 579px !important;
        width: 276px !important;
        border-radius: 6px;
        box-shadow: 0 5px 15px 0 rgba(0,0,0,0.5);
        position: fixed !important;
        background-color: #F8F8F8 !important;
    }

     .volet-droite-modal-body {
        width: 276px !important;
        display: flex;
        flex-direction: column;
        justify-content: flex-start;
        align-items: center;
        margin-top: 0px;
    }

    .volet-droite-modal-header-panier  {
        display: flex;
        justify-content: center;
        align-items: center;
        height: 80px;
        text-align: center;
    }

    .volet-droite-modal-header-panier  .close-btn-pan {
        position: absolute;
    }

    .volet-droite-modal-header-panier  .rounded-check {
        height: 24px !important;
        width: 24px !important;
        outline: none;
        border: 1px solid #00B517;
        border-radius: 50%;
        background-color: #fff;
        justify-content: center;
        align-items: center;
        position: relative;
        left: -3.5px;
        top: -2px;
    }

    .volet-droite-modal-header-panier h4 {
        color: #191970 !important;
        font-family: Roboto;
        font-size: 24px;
        font-weight: 500;
        letter-spacing: 0;
        line-height: 30px;
        text-align: center;
        position: relative;
        top: 15px;
    }

    .volet-droite-modal-row {
        box-sizing: border-box;
        height: 51px;
        width: 256px;
        border: 1px solid #D8D8D8;
        border-radius: 6px;
        background-color: #FFFFFF;
        display: flex;
        justify-content: center;
        align-items: center;
        margin-bottom: 5px !important;
    }

    .label-infos {
        height: 20px;
        width: 75px;
        color: #4A4A4A;
        font-family: Roboto;
        font-size: 14px;
        font-weight: 500;
        letter-spacing: 0;
        line-height: 20px;
    }

    .label-value {
        height: 20px;
        color: #191970;
        font-family: Roboto;
        font-size: 16px;
        font-weight: 500;
        letter-spacing: 0;
        line-height: 16px;
        text-align: right;
        position: relative;
        float: right;
        top: 5px;
    }

    .label-button {
        height: 34px;
        width: 101px;
        border-radius: 6px;
        color: #FFFFFF;
        font-family: Roboto;
        background-color: #00B517;
        font-size: 14px;
        font-weight: 500;
        letter-spacing: 0;
        line-height: 14px;
        text-align: center;
        position: relative;
        left: 5px;
        top: 4px;
    }
    .label-button2 {
        height: 34px;
        width: 101px;
        border-radius: 6px;
        color: red;
        font-family: Roboto;
        font-size: 14px;
        font-weight: bold;
        letter-spacing: 0;
        line-height: 14px;
        text-align: center;
    }

    .bon-reduction {

        width: 256px;
        display: flex;
        flex-direction: column;
        column-gap: 0px;
        justify-content: center;
        align-items: center;
        margin-top: 20.5px;
    }

    .input-group-active input {
        box-sizing: border-box;
        height: 37px !important;
        width: 178px;
        border: 1px solid #9B9B9B;
        border-radius: 6px 0 0 6px;
        background-color: #FFFFFF;
        outline: none !important;
    }

    .input-group-text {
        height: 37px !important;
        width: 72px;
        border-radius: 0 6px 6px 0;
        border: 1px solid #9B9B9B;
        background-color: #9B9B9B;
        color: #fff;
        font-size: 14px !important;
    }

    .input-group-text-activer {
        height: 37px;
        width: 85px;
        border-radius: 0 6px 6px 0;
        border: 1px solid #9B9B9B;
        background-color: #1A7EF5;
        color: #fff;
        padding: 5px 0px 0px 15px;
    }

    .bon-reduction .span-text {
        height: 20px;
        /* width: 137px; */
        color: #4A4A4A;
        font-family: Roboto;
        font-size: 14px;
        font-weight: 500;
        letter-spacing: 0;
        line-height: 12px;
        margin: 0px;
        margin-bottom: 5px !important;
        padding: 0px;
        position: relative;
        left: -5px;

        color: #191970;
    }

    .button-dash {
        display: flex;
        justify-content: center;
        align-items: center;
        position: relative;
        top: -132px;
        /* margin-top: 105.5px; */
    }

    .button-dash .button-dash-text {
        height: 41px;
        /* width: 246px; */
        width: 199px;
        border-radius: 6px;
        background-color: #9B9B9B;
        border: 0px;
        color: #fff;
    }

    .button-disabled-panier {
        box-sizing: border-box;
        height: 37px;
        width: 199px;
        border: 1px solid #146FDA;
        border-radius: 6px;
        background: linear-gradient(270deg, #39B5FB 0%, #1A7EF5 100%);
        color: #fff;
        margin-left: 10px;
        font-family: Roboto;
        font-size: 16px;
        letter-spacing: 0;
        line-height: 14px;
        text-align: center;
        display: flex;
        justify-content: flex-start;
        align-items: center;
    }

    .button-disabled-panier-blocked {
        box-sizing: border-box;
        height: 37px;
        width: 199px;
        border: transparent;
        border-radius: 6px;
        background-color:#ccc !important;
        color: #fff;
        margin-left: 10px;
        font-family: Roboto;
        font-size: 16px;
        letter-spacing: 0;
        line-height: 14px;
        text-align: center;
        display: flex;
        justify-content: flex-start;
        align-items: center;
        pointer-events: none;
    }

    .step-blue {
        box-sizing: border-box;
        height: 37px;
        width: 195px;
        border: 1px solid #1A7EF5;
        border-radius: 6px;
        background-color: #FFFFFF;
    }

    .body-1 {
        position: relative;
        left: -150px;

    }

    .box-container {
        box-sizing: border-box;
        height: 209px;
        width: 301px;
        border: 0.5px solid #9B9B9B;
        border-radius: 0 0 6px 6px;
        background-color: #FFFFFF;
        display: flex;
        justify-content: center;
        align-items: center;
        /* margin: 5px; */
        margin-left: 4.5px;
    }

    /* .box-container-panier{
        margin-top : 5px !important;
    } */

    .box-elements {
        height: 189px;
        width: 280px;
    }

    .row {
        margin: 0px;
        padding: 0px;
    }

    .button-option button {
        border: none;
        background-color: transparent;
    }

    .button-option button img {
        box-sizing: border-box;
        height: 20px;
        width: 20px;
        border: 1px solid #1A7EF5;
        background-color: #FFFFFF;
        border-radius: 50%;
    }

    .product-caracteristique .col {
        margin: 0%;
        padding: 0%;
        position: relative;
        top: -15px;
    }

    .product-caracteristique .col span {
        height: 9px;
        width: 39px;
        color: #41b9f9 !important;
        font-family: Roboto;
        font-size: 8px;
        letter-spacing: 0;
        line-height: 9px;
        text-align: center;
    }


    .text-infos {
        display: flex;
        flex-direction: row;
       justify-content: space-between;
    }

    .text-infos p {
        height: 18px;
        width: 249px;
        color: #b50045;
        font-family: Roboto;
        font-size: 8px;
        letter-spacing: 0;
        line-height: 9px;
    }

    .text-infos img {
        height: 14px;
        width: 19px;
     }

     .product-description p {
        color: #4A4A4A;
        font-family: Roboto;
        font-size: 12px;
        letter-spacing: -0.08px;
        margin: 0%;
     }

     .button2 {
        box-sizing: border-box;
        height: 37px;
        width: 152px;
        border: 1px solid #1A7EF5;
        border-radius: 6px;
        background-color: #FFFFFF;
        font-family: Roboto;
        font-size: 16px;
        font-weight: 900;
        letter-spacing: 0.35px;
        line-height: 16px;
        text-align: center;
     }

     .img-layout {
        height: 74px;
        width: 74px;
        margin-right: 15px;
        background-color: #D8D8D8;
     }

     .checked-color {
        background-color: #8B2634 !important;
        color: #ffffff !important;
        border: none !important;
     }

     .text-layout {
        width: 138px;
        height: 74px;
        margin-right: 15px;
        display: flex;
        flex-direction: column;
        column-gap: 0px;
        justify-content: center;
        align-items: center;
        padding: 0px;
     }

     .button-layout {
        width: 38px;
        height: 74px;
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
     }

     .button-layout .button-close  {
        height: 30px;
        width: 30px;
        border: none;
        border-radius: 50%;
        background-color: #F5F5F5;

     }

     .button-layout .button-open  {
        box-sizing: border-box;
        height: 30px;
        width: 30px;
        color: #1A7EF5;
        border: 1px solid #1A7EF5;
        border-radius: 50%;
        background-color: #FFFFFF;
     }

     .button-layout button img {
        height: 30px;
        width: 30px;
        border-radius: 25px;
     }

     .line-separator {
        box-sizing: border-box;
        height: 1px;
        width: 279px;
        border: 1px solid #D8D8D8;
        margin-top: 12px;
        margin-bottom: 5px;
     }

     .article-prix {
         margin: 0px;
         padding: 0px;
         width: 280px;
         padding: 0px 11px 0px 11px;
         display: flex;
         justify-content: space-between;
         align-items: center;
         margin-bottom: 10px;
     }

     .article {
        height: 13px;
        width: 56px;
        color: #000000;
        font-family: Roboto;
        font-size: 12px;
        letter-spacing: -0.08px;
        line-height: 13px;
     }

     .prix {
        height: 13px;
        color: #191970;
        font-family: Roboto;
        font-size: 12px;
        font-weight: bold;
        letter-spacing: -0.08px;
        line-height: 13px;
        text-align: right;
     }

     .infos-expedition {
        height: 14px;
        width: 279px;
        display: flex;
        flex-direction: row;
        justify-content: space-between;
        align-items: center;
     }

     .infos-expedition-img {
        height: 14px;
        width: 19px;
        margin: 0px;
        padding: 0px;
     }

     .infos-expedition-img img{
        height: 14px;
        width: 19px;

     }

     .infos-expedition-text {
        height: 18px;
        width: 249px;
        color: #000000;
        font-family: Roboto;
        font-size: 8px;
        letter-spacing: 0;
        line-height: 9px;
     }

     .text-level-1 {
        height: 39px;
        width: 138px;
        color: #4A4A4A;
        font-family: Roboto;
        font-size: 12px;
        letter-spacing: -0.08px;
        line-height: 13px;
     }

     .text-level-2 {
        height: 8px;
        width: 138px;
        color: #9B9B9B;
        font-family: Roboto;
        font-size: 8px;
        letter-spacing: 0;
        line-height: 8px;
     }

     .text-level-3 {
        height: 13px;
        width: 138px;
        color: #191970;
        font-family: Roboto;
        font-size: 12px;
        font-weight: 500;
        letter-spacing: -0.08px;
        line-height: 13px;
     }

    .blue-header {
        height: 84px;
        width: 302px;
        background-color: #191970;
        position: fixed;
        top: 0px;
        right: -0.1px;
        display: flex;
        justify-content: center;
        align-items: center;
    }

    .blue-header h4 {
        height: 19px;
        color: #FFFFFF;
        font-family: Roboto;
        font-size: 16px;
        font-weight: bold;
        letter-spacing: -0.39px;
        line-height: 19px;
        text-align: center;
    }

    .detail-footer {
        height: 253px;
        width: 302px;
        background-color: #ffffff;
        box-shadow: 2px 0 5px 0 rgba(0,0,0,0.5);
        display: flex;
        justify-content: flex-start;
        align-items: center;
        flex-direction: column;
        position: fixed;
        bottom: 0px;
        padding: 0px !important;
    }

    .infos-total {
        height: 101.02px;
        width: 254px;
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
        position: relative;
        margin-top: 13px;
    }

    .label-infos-new-version {
        height: 20px;
        width: 84px;
        color: #9B9B9B;
        font-family: Roboto;
        font-size: 14px;
        letter-spacing: 0;
        line-height: 14px;
        padding-top: 7px;
    }

    .label-price {
        height: 20px;
        width: 97px;
        color: #4A4A4A;
        font-family: Roboto;
        font-size: 14px;
        font-weight: bold;
        letter-spacing: 0;
        line-height: 24px;
        text-align: right;
    }

    .total-price-value {
        height: 24px;
        width: 118px;
        color: #1B2125;
        font-family: Roboto;
        font-size: 16px;
        font-weight: bold;
        letter-spacing: 0;
        line-height: 24px;
        text-align: right;
    }

    .total-price-label {
        height: 24px;
        width: 62.19px;
        color: #1B2125;
        font-family: Roboto;
        font-size: 16px;
        letter-spacing: 0;
        line-height: 24px;
    }

    .infos-bouton button {
        height: 37px;
        width: 246px;
        border: none;
        color: #fff;
        border-radius: 6px;
        background-color: #1A7EF5;
        font-family: Roboto;
        font-size: 15px;
        font-weight: 500;
        letter-spacing: -0.36px;
        line-height: 17px;
        text-align: center;
        margin-top: 35.98px;
    }

    .vider {
        display: none !important;
    }

    .img1, .img2, .img3, .img4, .img5{
        background-repeat: no-repeat;
        background-position: center;
    }
    .img1 {
        background-image: url('/assets/recap_produit/amarnath-tade-gXs-mwiXrhA-unsplash.webp');
        background-size: contain;
    }

    .img2 {
        background-image: url('/assets/recap_produit/claudio-schwarz-a85IYeAXgxU-unsplash Copy.svg');
        background-size: contain;
    }
    .img3 {
        background-image: url('/assets/recap_produit/dorian-mongel-5Rgr_zI7pBw-unsplash.webp');
        background-size: contain;
    }
    .img4 {
        background-image: url('/assets/recap_produit/paolo-feser-1MFqJzNUwOM-unsplash.svg');
        background-size: contain;
    }
    .img5 {
        background-image: url('/assets/recap_produit/paul-vhZe9fd9MRs-unsplash.svg');
        background-size: contain;
    }
    .modal-main-body-element {
        height: 579px;
        width: 973px;
        border-radius: 6px;
        background-color: #F8F8F8;
        box-shadow: 0 5px 15px 0 rgba(0,0,0,0.5);
    }

    .body-box {
        height: 442px !important;
        overflow-y: scroll;
        width: 933px !important;

    }

    .pannier-article-tab1 {
        position: relative;
    }

    .panier-title-element1 {
        width: 933px !important;
        height: 28px;
        display: flex;
        justify-content: flex-start;
        align-items: flex-start;
        margin-top: 30px;
    }

    .panier-title-element-updated {
        width: 933px !important;
        height: 28px;
        display: flex;
        justify-content: flex-start;
        align-items: flex-start;
        margin-top: 30px;
    }

    .panier-title-element1 div {
        padding: 0px !important;
        text-align: center;
    }

    .row-header {
        width: 933px;
        height: auto;
        display: flex;
        justify-content: flex-start;
        align-items: flex-start;
    }

    .customu-popup-getit {
        height: 209px;
        width: 301px !important;
        border-radius: 0 0 6px 6px;
        background-color: rgba(0,0,0,0.45);
        position: inherit;
        display: flex;
        justify-content: center;
        align-items: center;
        z-index: 1000;
    }

    .step-mode-expedition-disabled {
        height: 186px;
        width: 169px;
        border-radius: 6px;
        background-color: #fff;
        opacity: 0.6;
        /* position: absolute; */
        margin-top: -187px;
    }

    .box-error-login {
        border: 1px solid #D0021B !important;
    }

    .border-shad {
        box-shadow: 4px 5px 4px 5px rgb(255 0 0 / 10%)
    }

    .box-error-login-fade {
        border: 1px solid black;
        outline-style: solid;
        outline-color: rgba(208, 2, 27, 0.3);
        outline-width: medium;
    }

    .code-promo-element {
        box-sizing: border-box;
        height: 72px;
        width: 256px;
        border: 1px solid #00B517;
        border-radius: 6px;
        background-color: rgba(0,181,23,0.15);

        display: flex;
        justify-content: flex-start;
        align-items: flex-start;
        margin-top: 5px;
    }

    .div1 {
        height: 16px;
        width: 16px;
        margin-left: 10px;
        margin-right: 8px;
        margin-top: 5px;
    }

    .div2 {
        height: 39px;
        width: 197px;
        color: #00B517;
        font-family: Roboto;
        font-size: 11px;
        letter-spacing: 0.24px;
        line-height: 12px;
        margin-top: 12px;
    }

    .el1-panier-caisse {
          height: 30px;
          color: #191970;
          font-family: Roboto;
          font-size: 24px;
          font-weight: 500;
          letter-spacing: 0;
          line-height: 30px;
          margin-right: 10px;
        }

        .el2-panier-caisse {
          height: 12px;
          color: #191970;
          font-family: Roboto;
          font-size: 16px;
          letter-spacing: 0;
          line-height: 12px;
          position: relative;
          top: 10px;
        }

        .panier-title-element1 h6 {
          height: auto;
          color: #191970;
          font-size: 24px;
          margin-right:10px;
        }

        .panier-title-element1 span {
          height: 19px;
          width: 97px;
          color: #191970;
          font-family: Roboto;
          font-size: 16px;
          letter-spacing: 0;
          line-height: 17px;
          position: relative;
          top: 10px;
        }
        .customu-popup {
        height: 209px;
        width: 301px;
        border-radius: 0 0 6px 6px;
        background-color: rgba(0,0,0,0.45);
        position: absolute;
        display: flex;
        justify-content: center;
        align-items: center;
        float: right;
        right: -5.5px;
        z-index: 1000;

    }


    .container-supp {
        height: 123px;
        width: 264px;
        border-radius: 6px;
        background-color: #FFFFFF;
        box-shadow: 0 5px 15px 0 rgba(0,0,0,0.5);
        position: absolute;
        display: flex;
        justify-content: center;
        align-items: center;
        flex-direction: column;
        column-gap: 14px;
    }

    .custom-commande-del {

    }

    .supp-oui {
        height: 37px;
        width: 100px;
        border-radius: 6px;
        background-color: #007AFF;
        border: none;

        color: #FFFFFF;
        font-family: Roboto;
        font-size: 14px;
        font-weight: 500;
        letter-spacing: 0.31px;
        line-height: 18px;
        text-align: center;

    }

    .supp-non {
        box-sizing: border-box;
        height: 37px;
        width: 100px;
        border: 1px solid #007AFF;
        border-radius: 6px;
        background-color: #FFFFFF;
        /* border: none; */

        color: #1A7EF5;
        font-family: Roboto;
        font-size: 14px;
        font-weight: 500;
        letter-spacing: 0.31px;
        line-height: 18px;
        text-align: center;
    }

    .data-upp-show {
        float: right;
        right: 1px;
    }

    .popu-del-produit {
        height: 16px;
        width: 177px;
        color: #191970;
        font-family: Roboto;
        font-size: 14px;
        font-weight: 500;
        letter-spacing: -0.34px;
        line-height: 16px;
        text-align: center;
    }

    .data-supp-dismiss {
        float: right;
        right: -1000px
    }

    .mystyle {
        float: right;
        right: -1000px;
    }

    .col-expedition {
        height: 188px !important;
        width: 170.2px !important;
        border-radius: 6px;
        background-color: #F8F8F8;
    }

    .row-expedition-updated {
        box-sizing: border-box;
        height: 228px;
        width: 933px !important;
        border: 1px solid #D8D8D8;
        border-radius: 6px;
        background-color: #FFFFFF;
        display: flex;
        justify-content: center;
        align-items: center;
    }

    .checkbox {
        width: 20px;
        height: 20px;
        background-color: white;
        border-radius: 18%;
        vertical-align: middle;
        border: 1px solid #ddd;

        margin-right: 5px;
        margin-top:20px;

    }

    .mode-expedition-panier {
        width: 77px;
        color: #FFFFFF;
        font-family: Roboto;
        font-size: 20px;
        font-weight: bold;
        letter-spacing: 0;
        line-height: 24px;
        text-shadow: 0 0 15px #000;
    }

    .exp {
            height: 30px;
            width: 206px;
            color: #191970;
            font-family: Roboto;
            font-size: 24px;
            font-weight: 500;
            letter-spacing: 0;
            line-height: 30px;
            position: relative;

        }

        .exp2 {
            height: 30px;
            width: 206px;
            color: #191970;
            font-family: Roboto;
            font-size: 24px;
            font-weight: 500;
            letter-spacing: 0;
            line-height: 30px;
            width: 500px;
        }

    .ps {
        height: 16px;
        width: 424px;
        color: #191970;
        font-family: Roboto;
        font-size: 14px;
        font-weight: 300;
        letter-spacing: -0.34px;
        line-height: 16px;
        text-align: center;
        position: relative;
        top: -20px;
    }

    .button-entete-adresse-panier{
        height: 40px;
        width: 277px;
        border-radius: 6px;
        background-color: #1A7EF5;
        color: #fff;
        padding-top: 3px;
        border: none;
    }

.zone-adress-element {
    box-sizing: border-box;
    height: 148px;
    width: 933px;
    border-radius: 6px;
    background-color: #FFFFFF;
}

.adresse-row-element-2 {
    box-sizing: border-box;
    height: 50px;
    width: 893px !important;
    border: 1px solid #D8D8D8;
    border-radius: 6px;
    background-color: #FFFFFF;
    display: flex;
    justify-content: flex-start;
    align-items: center;
    position: relative;
    margin-left: 20px;
}

.adresse-row-element-2-icon {
    height: 50px;
    width: 50px;
    border-radius: 6px 0 0 6px;
    display: flex;
    justify-content: flex-start;
    align-items: center;
}

.adresse-row-element-2-icon img {
    height: 25px;
    width: 25px;
}

.adresse-row-element-2-icon-edit {
    height: 50px;
    width: 50px;
    border-radius: 0 6px 6px 0;
    background-color: #D8D8D8;
    background-color: transparent;
    border: none;
}

.adresse-row-element-2-icon-edit img {
    height: 25px;
    width: 25px;
}

.adresse-row-element-2-contact {
    height: 50px;
    width: 105px;
    display: flex;
    justify-content: flex-start;
    align-items: center;
    color: #9B9B9B;
    font-family: Roboto;
    font-size: 16px;
    font-weight: bold;
    letter-spacing: -0.11px;
    line-height: 18px;
}

.adresse-row-element-2-contrat-value {
    height: 18px;
    width: 205px;
    color: #000000;
    font-family: Roboto;
    font-size: 16px;
    font-weight: bold;
    letter-spacing: -0.11px;
    line-height: 18px;
    display: flex;
    justify-content: flex-start;
    align-items: center;
}

.adresse-row-element-2-value {
    height: 50px;
    width: 688px;
    display: flex;
    justify-content: flex-start;
    align-items: center;
    color: #000000;
    font-family: Roboto;
    font-size: 16px;
    font-weight: bold;
    letter-spacing: -0.11px;
    line-height: 18px;
}

.exp-par {
    position: relative;
    top: 10px;
    color: #fff;
    letter-spacing: 2px;
    text-shadow: 0 0 15px #000;
}

.exp-libelle {
    position: relative; left: 27px;
    top: -9px;
    color: #fff;
    letter-spacing: 2px;
    text-shadow: 0 0 15px #000;
}

.infos-connection-user {
    margin: 0px; padding: 0px;
    width: 458px !important;
}

.infos-invite-none {
    display: none !important;
}

.inv-email {
    height: 18px;
    width: 205px;
    color: #000000;
    font-family: Roboto;
    font-size: 16px;
    font-weight: bold;
    letter-spacing: -0.11px;
    line-height: 18px;
}

.inv-autre-infos {
    height: 18px;
    width: 561px;
    color: #000000;
    font-family: Roboto;
    font-size: 16px;
    letter-spacing: -0.39px;
    line-height: 18px;
}

.prod-option-edit:hover {
    filter: invert(35%) sepia(32%) saturate(4698%) hue-rotate(202deg) brightness(103%) contrast(92%);
}

.recap-commande-section {
    height: 61px;
    width: 256px;
}

.recap-commande-infos-element {
    box-sizing: border-box;
    height: 40px;
    width: 256px;
    border: 1px solid #D8D8D8;
    border-radius: 6px 6px 0 0;
    background-color: #FFFFFF;
    text-align: center;
    padding-top: 8px;
}

.recap-commande-details-element {
    height: 22px;
    width: 256px;
    border-radius: 0 0 6px 6px;
    background-color: #1A7EF5;
    text-align: center;

    color: #FFFFFF;
    font-family: Roboto;
    font-size: 12px;
    font-weight: 500;
    letter-spacing: 0;
    line-height: 12px;
    padding-top: 5px;
}

.recap-commande-details-element-desabled {
    pointer-events: none;
    opacity: .5;
}

.recap-commande-libelle {
    height: 20px;
    width: 80px;
    color: #4A4A4A;
    font-family: Roboto;
    font-size: 14px;
    font-weight: bold;
    letter-spacing: 0;
    line-height: 20px;
}

.recap-commande-article {
    height: 16px;
    width: 78px;
    color: #191970;
    font-family: Roboto;
    font-size: 16px;
    font-weight: bold;
    letter-spacing: 0;
    line-height: 16px;
    text-align: right;
}

.recap-commande-produit-content {
    box-sizing: border-box;
    height: 426px;
    width: 256px;
    border: 1px solid #1A7EF5;
    border-radius: 6px;
    background-color: #F8F8F8;
    position: absolute;
    z-index: 1;
    margin-top: 68px;
    visibility: hidden;
    /* display: none; */
}

.recap-commande-produit-content-2 {
    height: 376px;
    border-radius: 0px 0px 6px 6px;
    background-color: #fff;
    padding-top: 10px;
}

.adresse-row-element-2-icon-edit:hover {
    filter: invert(35%) sepia(32%) saturate(4698%) hue-rotate(202deg) brightness(103%) contrast(92%);
}

.payement-element-alert {
    height: 136px;
    width: 216px;
    background-color: rgba(0,0,0,0.45);
    position: absolute;
    z-index: 1;
    border-radius: 9px;
    display: flex;
    justify-content: center;
    align-items: center;
}
.recap-commande-details-element:hover {
    cursor: pointer;
}

.recap-commande-details-element:hover + div#recap-commande-produit-content-id {
    visibility: visible
}

.btn-choose {
background-color: #FFFFFF;
font-size: 14px;
font-weight: 500;
letter-spacing: -0.34px;
line-height: 18px;
border-radius: 6px;
color: #1A7EF5;
border: transparent;
height: 38px;
width: 135px;
position: relative;
top: 20px;
}

.recap-article-item {
    height: 43px;
    width: 236px;
    position: relative;
    margin-left: auto;
    margin-right: auto;
    border-bottom: 1px solid #ccc;
    margin-bottom: 5px;
}
    </style>

<style>
    @import url('https://fonts.googleapis.com/css2?family=Roboto&display=swap');

.modal-content-custom-modif, .modal-body-custom-modif {
    width: 944px !important;
    height: 579px !important;
    background-color: #ffffff;
}

.modal-content {
    background-color: #ffffff;

}

.modal-bodyy-custom-modif {
    margin: 0px;
    padding: 0px;
    background-color: #ffffff;
}

.modal-dialogy-custom-modif {
    position: relative;
    margin-left: auto;
    margin-right: auto;
}

.content-container {
display: flex;
margin: 0px;
padding: 0px;
}

.content-container .left-box {
width: 500px !important;
margin: 0px;
padding: 0px;
}

.content-container .right-box {
width: 444px !important;
padding-left: 14px;
}

.menu-section {
height: 31px;
width: 470px;
border-radius: 6px;
background-color: #F5F5F5;
margin-top: 5px;
margin-left: 15px;
margin-bottom: 5px;
}

nav ol li {
  height: 11px;
color: #191970;
font-family: Roboto;
font-size: 10px;
letter-spacing: -0.24px;
line-height: 11px;
}

.start-section {
display: flex;
justify-content: flex-start;
align-items: center;
margin-bottom: 10px;
display: flex;
justify-content: flex-start;
align-items: center;

}

.navbar {
border-radius: 6px;
background-color: #F5F5F5;
padding: 0px;
margin: 0px 0px 5px 0px;
}

.navbar .breadcrumb {
margin: 10px;
}

.img-box-section {

}

.btn-section {
height: 37px;
  width: 470px;
position: relative;
margin-left: auto;
margin-right: auto;
}

.article-libelle {
margin-bottom: 5px;
margin-top: 15px;
}

.nouveaute {
color: #D0021B;
border: 1px solid #D0021B;
font-family: Roboto;
font-size: 11px;
font-weight: bold;
letter-spacing: 0;
line-height: 13px;
background-color: transparent;
margin-right: 15px;

height: 24px;
width: 64px;
padding: 0px;
}

.nouveaute:hover{
color: #D0021B;
background-color: transparent;
}

.article-title {
height: 24px;
width: 335px;
color: #191970;
font-family: Roboto;
font-size: 20px;
font-weight: 500;
letter-spacing: 0;
line-height: 24px;
}

.notation-section {
  width: 159px;
  display: flex;
}

.notation-section p {
position: relative;
top: 7px;
height: 14px;
width: 90px;
color: #191970;
font-family: Roboto;
font-size: 10px;
letter-spacing: 0;
line-height: 11px;
}

.start-orange {
display: flex;
flex-direction: row;
height: 15px;
  width: 64px;
}

.orange {
box-sizing: border-box;
height: 14px;
width: 14.8px;
color: orange;
}

.start-orange svg {
color: yellow;
width: 12px;
height: 12px;
font-size: 5px;
margin: 0px;
padding: 0px;
}


.start-gray {
display: flex;
flex-direction: row;
}

.gray {
height: 5px;
width: 5px;
color: #ccc;
margin-left: 5px;
}

.ref-data{
position: relative;
left: -40px;
top: 3px;
}

.gros-cadre {
box-sizing: border-box;
height: 403px;
width: 403px;
border: 1px solid #1A7EF5;
border-radius: 0 6px 6px 0;
background-color: #D8D8D8;
}

.petit-section {
height: 403px;
width: 68px !important;
/* border: 1px solid #1A7EF5; */
border-radius: 6px 0 0 6px;
border-right: none;
padding: 0px 0px 0px 0px;
margin-left: 15px;
}

.petit-cadre {
height: 60px;
width: 60px;
border-radius: 6px;
background-color: #D8D8D8;
}

.line {
box-sizing: border-box;
border: 1px solid #1A7EF5;
color: #1A7EF5;
padding: 0px;
margin: 0px;
}

.btn-group {
padding: 0px;
}

.bouton-first {
margin-right: 10px;
}

.bouton-first button {
box-sizing: border-box;
height: 37px;
width: 62px;
border: 1px solid #D0021B;
border-radius: 6px;
background-color: #FFFFFF;
}

.bouton-second {
margin-right: 10px;
}

.bouton-second button {
height: 37px;
width: 194px;
border-radius: 6px;
background-color: #1A7EF5;
}

.bouton-third button {
height: 37px;
width: 194px;
border: none;
border-radius: 6px;
background-color: #00B517 !important;
}

.btn-icon {
position: absolute;
left: 330px;
top: 400px;
}

.btn-icon img {
margin-right: 10px;
cursor: pointer;
}

.detail-bottom {
height: 42px;
  width: 470px;
position: relative;
margin-left: auto;
margin-right: auto;
display: flex;
justify-content: space-between;
align-items: center;
top: 10px;
padding: 0px;
border-radius: 6px;
border: none !important;

background-color: #F8F8F8;
position: relative;
top: 22px;
}

.detail-bottom .detail-bottom-elemnt2 {
height: 28px;
/* width: 316px; */
color: #4A4A4A;
font-family: Roboto;
font-size: 12px;
font-weight: 500;
letter-spacing: 0;
line-height: 14px;
position: relative;
margin-top: 7px;
margin-bottom: 7px
}

.detail-bottom img {
height: 21.82px;
width: 120px;
}

.detail-bottom p {
height: 28px;
width: 313px;
color: #4A4A4A;
font-family: Roboto;
font-size: 12px;
letter-spacing: 0;
line-height: 13px;
position: relative;
/* top: 7px; */
}

.separateur {
position: absolute;
/* top: 5px;
left: 2px; */
box-sizing: border-box;
height: 29px;
width: 1px;
border: 1px solid #D8D8D8;
margin-left: 6.5px;
margin-right: 6.5px;
}

.infos-cout {
border-top: 1px solid #9B9B9B;
border-bottom: 1px solid #9B9B9B;
background-color: #F5F5F5;
height: 65px;
position: relative;
width: 414px;
display: flex;
flex-direction: row;
}

.infos-description {
border-top: 1px solid #1A7EF5;
border-bottom: 1px solid #1A7EF5;
height: 39px;
margin-top: 20px;
width: 414px;
position: relative;
left: 14px;
cursor: pointer;
}

.infos-description p {
height: 19px;
width: auto;
color: #9B9B9B;
font-family: Roboto;
font-size: 16px;
font-weight: 500;
letter-spacing: 0;
line-height: 17px;
position: relative;
top: 10px;
left: 70px;
}

.flex-cout {
width: 300px;
display: flex;
align-items: center;
justify-content: center;
position: relative;
left: 77px;
}

.infos-montant {
position: relative;
margin-top: 12px;
margin-bottom: 12px;
display: flex;
margin-right: 10px;

}


.infos-poid {
/* width: 100px;
height: 28px; */
color: #191970;
font-family: Roboto;
font-size: 12px;
font-weight: bold;
letter-spacing: 0;
line-height: 13px;
/* background-color: #00B517; */
position: relative;
right: -85px;
float: right;
top: 20px;
/* position: relative;
right: -85px; */
}


/* .raillee {
position: relative;
margin-top: 18px !important;

} */

.raillee:before {
position: absolute;
content: "";
left: 0;
top: 50%;
right: 0;
border-top: 1px solid red;
border-color: red;

-webkit-transform:rotate(-5deg);
-moz-transform:rotate(-5deg);
-ms-transform:rotate(-5deg);
-o-transform:rotate(-5deg);
transform:rotate(-5deg);
}

.normal-price {
height: 44px;
/* width: auto; */
color: #191970;
font-family: Roboto;
font-size: 24px;
font-weight: 500;
letter-spacing: 0;
position: relative;
margin-bottom: 12px;
/* line-height: 26px; */
}


.normal_price_infos {
width: 150px;
}

.line-cout{
box-sizing: border-box;
height: 41px;
width: 1px;
border: 1px solid #9B9B9B;
position: relative;
top: 12px;
bottom: 12px;
right: -80px;
}

.produit-caracteristique {
height: 64px;
  width: 414px;
position: relative;
top: 15px;
/* margin-top: 15px; */
}

.produit-caracteristique .produit-carateristique-row1 {
margin-bottom: 15px;
}

.info-expediction {

box-sizing: border-box;
display: flex;
justify-content: center;
align-items: center;
height: 29px;
width: 273px;
border: 1px solid #191970;
border-radius: 6px;
background-color: rgba(128,195,243,0.15);
position: relative;
top: -0.29px;
}

.info-expediction p {
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

.bouton-fi1 {
box-sizing: border-box;
border: 1px solid #D8D8D8;
border-radius: 6px;
margin-right: 10px;
}

.bouton-fi1 button {
position: relative;
border: 0px solid;
height: 29px;
width: 40px;
background: linear-gradient(180deg, #FFCD18 0%, #FF9F0A 100%);
}

.bouton-fi1 button img {
position: relative;
top: -4px;
}

.btn-default {
background-color: rgb(255, 255, 255);
position: absolute;
float: right;
right: -1px;
outline: none;
border: none;
}

.btn-default:active {
outline: none;
border-style: outset;
box-shadow: none;
}

.btn-default:focus{
outline: none;
border-style: outset;
box-shadow: none;
}

.infos-offres {
height: 41px;
width: 414px;
border-radius: 6px;
background: linear-gradient(270deg, #39B5FB 0%, #1A7EF5 100%);
margin-top: 15px;
position: relative;
left: 14px;
}

.infos-articles {
display: flex;
justify-content: center;
align-items: center;
flex-direction: row;
box-sizing: border-box;
height: 72px;
width: 414px;
border: 1px solid #D8D8D8;
border-radius: 6px;
background-color: #FFFFFF;
position: relative;
left: 10px;
margin-top: 18px;
}

.infos-articles img {
height: 42px;
width: 42px;
border-radius: 30px;
background-color: #FFFFFF;
margin-right: 15px;
}

.infos-articles img:hover {
cursor: pointer;
box-shadow: 0 1px 2px 0 rgba(0,0,0,0.5);
}

.cadre-div {
box-sizing: border-box;
height: 68px;
width: 68px;
}

.petit-section .cadre-div {
display: flex;
justify-content: center;
align-items: center;
}

.produit-caracteristique-detail {
box-sizing: border-box;
height: 41px;
width: 202px;
border: 1px solid #dddcdc;
border-radius: 6px;
background-color: #F8F8F8;
display: flex;
justify-content: space-between;
align-items: center;
margin-right: 10px;
}

.produit-caracteristique-detail button {
border: none;
background-color: transparent;
}



.select-product {
box-sizing: border-box;
height: 41px;
width: 202px;
border: 1px solid #9B9B9B;
border-radius: 6px;
background-color: #F8F8F8;
-webkit-appearance: none;
-moz-appearance: none;
background-image: url('ic_chevron_right.svg');
background-repeat: no-repeat;
background-position-x: 160px;
background-position-y: center;
border: 1px solid #dfdfdf;
padding-left: 20px !important;
}

.select-product .option {
padding-left: 20px !important;
}

.article-associe {
height: 14px;
  display: flex;
  justify-content: center;
  align-items: center;

position: absolute;
margin-bottom: 70px;
width: 122px;
left: 30px;
background-color: #ffffff;

}

.article-associe span {
width: 100px;
color: #00B517;
font-family: Roboto;
font-size: 11px;
font-weight: bold;
letter-spacing: 0;
line-height: 13px;
background-color: #fff;
}

.line-middle {
position: absolute;
left: 53%;
box-sizing: border-box;
height: 572px;
width: 1px;
background-color: #e9e7e7;
border: none;
/* border: 0.2px solid #9B9B9B; */
}

/* green box at bottom  */

.box-bottom {
height: 37px;
width: 944px;
border-radius: 6px;
background-color: #00B517;
position: relative;
margin-left: auto;
margin-right: auto;
/* left: -1px; */
margin-top: 50px;
display: flex;
justify-content: center;
align-items: center;

}

.box-bottom p {
height: 18px;
width: 674px;
color: #FFFFFF;
font-family: Roboto;
font-size: 16px;
font-weight: 500;
letter-spacing: -0.11px;
line-height: 18px;
text-align: center;
margin-top: 20px;
}



.icon-section {
margin-right: 5px;
position: relative;
top: -2px
}

.icon-section  .orange-color {
box-sizing: border-box;
height: 12px ;
  width: 12px;
color: #FF9500;
padding: 0px !important;
margin: 0px !important;
}

.icon-section  .gray-color {
box-sizing: border-box;
height: 12px ;
  width: 12px;
color: #D8D8D8;
padding: 0px !important;
margin: 0px !important;
}

.text-section span {
height: 14px;
width: 90px;
color: #191970;
font-family: Roboto;
font-size: 10px;
letter-spacing: 0;
line-height: 11px;
}

.text-section-revue {
margin-right: 15px;
padding: 0px !important;
}
.text-section-revue span {
height: 14px;
width: 90px;
color: #191970;
font-family: Roboto;
font-size: 12px;
letter-spacing: 0;
position: relative;
top: -1px;
}

.ref-section-revue {
padding: 0px !important;
}
.ref-section-revue span {
height: 12px;
width: 128px;
color: #191970;
font-family: Roboto;
font-size: 12px;
font-weight: bold;
letter-spacing: 0;
line-height: 12px;
}

.line-2 {
    width: 141px;
    color: #191970;
    font-family: Roboto;
    font-size: 24px;
    letter-spacing: 0;
    line-height: 14px;
    position: relative;
    left: 86px;
    margin-top: 8px;

}

.line-1 {
    width: 81px;
    color: #9B9B9B;
    font-family: Roboto;
    font-size: 14px;
    font-style: italic;
    letter-spacing: 0;
    margin-bottom: 2px;
    line-height: 14px;
    position: relative;
    left: 146px;
}

optgroup {
    font-size: 40px;
}

.hover {
    box-shadow: 0 1px 2px 0 rgba(0,0,0,0.5);
}

.modal-modifier {
    height: 100vh;
    width: calc(100% - 320px);
    display: flex;
    justify-content: center;
    align-items: center;
}

.form-label-products {
		color: #9B9B9B;
		font-family: Roboto;
		font-size: 15px;
		letter-spacing: 0;
	}

    /* last mod  */
    .remove-modal-modification-panier {
        display: none;
    }

</style>


</head>
<body>

    <div class="modal-body-main-recap-produit-panier hidden-element" id="main-element" style="z-index: 13000; ">

<style>
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

    .bull-over-1-infos-text {
        height: 28px;
        width: 248px;
        color: #FFFFFF;
        font-family: Roboto;
        font-size: 12px;
        letter-spacing: 0;
        line-height: 14px;
    }

    .basket-img-infos {
        position: absolute;
        margin-left: -16px;
        margin-top: 6px;
    }
</style>

<div class="recap-box-panier-plein" id="recap">
        <div class="blue-header-custom">
            <h4>
                APERÇU DE LA COMMANDE (<span id="nombre_total">0</span>)
            </h4>
        </div>

{{-- debut de la boxe --}}

<div class="card-box">
        <div id="article_du_panier0" style="position: relative; left: -5px">

        </div>
</div>


    {{-- fin de la boxe --}}

        <div class="detail-footerk" >

                <div class="rowddd bull-over-1-infos new_produit" id="panier-success-info">

                    <p class="bull-over-1-infos-text">
                        <img class="basket-img-infos" src="{{ asset('/assets/images/icons/Info.svg') }}" alt="" />
                        Plus que <span id="montant_restant_livraison_gratuite"></span> Fcfa pour bénéficier de la livraison gratuite. Livraison et retours gratuits !
                    </p>
                </div>

                <div class="rowddd bull-over-1-infos2 new_produit" id="panier-orange-info">
                    <p class="bull-over-1-infos-text" style="width: 252px; margin-top: 20px">
                        <img style="margin-top: -1px" class="basket-img-infos" src="{{ asset('/assets/images/icons/Info.svg') }}" alt="" />
                        Livraison gratuite chez vous et retours gratuits !
                    </p>
                </div>

                <div class="rowddd bull-over-1-infos3 new_produit" id="panier-danger-info">

                    <p class="bull-over-1-infos-text">
                        <img class="basket-img-infos" src="{{ asset('/assets/images/icons/Info.svg') }}" alt="" />
                        Certains produits de votre panier ne sont plus disponibles en ce moment...
                    </p>
                </div>

                <div class="rowddd bull-over-1" style="background-image: url(/assets/images/icons/tete_de_coupon.webp);">
                    <img src="{{ asset('assets/images/icons/tete_de_coupon.webp') }}" alt="" />
                </div>

                <div style="position: relative; top: 9px;">
                    <div style="display: flex; flex-direction: row; justify-content: flex-start;  align-items: center; margin-bottom: 15px;">
                     <div class="el1-p" style="">
                        Sous-total :
                    </div>
                    <div class="el2" style="position: absolute; float: right; right: 1px; " id="sous_total">
                        {{-- 169.800 Fcfa --}}
                    </div>
                   </div>

                   <div style="display: flex; flex-direction: row; justify-content: flex-start;  align-items: center; ">
                    <div class="el1-p" style="position: absolute; float: left; ">
                        Expédition :
                    </div>
                        <div class="el2-p" id="montant_expedition_panier" style="position: absolute; float: right; right: 1px; color: #00B517;">
                        Gratuite
                    </div>
                   </div>

                   <div id="separtor" class="line-separator-updated" style="margin-bottom: 20px; margin-top: 20px;"></div>

                   <div style="display: flex; flex-direction: row; justify-content: flex-start;  align-items: center; ">
                    <div class="el1-total" style="position: absolute; float: left;">
                        Total :
                    </div>
                    <div class="el2-total" style="position: absolute; float: right; right: 1px; " id="total_tous">
                        {{-- 169.800 Fcfa --}}
                    </div>
                   </div>

               </div>

            <div class="row row_caisse_helper">
            <div class="col-9" style="position: relative; left: 10px">
            <div class="row infos-bouton">
                {{-- <button onclick="Passer_au_panier()">Passer à la caisse</button> --}}
                <button onclick="load_panier_content()" id="passer-ala-caisse-btn">
                    <span id="passer-caisse-spinner" style="position: absolute;  margin-left: -8px; margin-top: -17px" class="spinner-border modal-loading-spinner" role="status" ></span>
                    <span id="passer-ala-caisse" >Passer à la caisse</span>
                </button>
            </div>
            </div>
            <div class="custom-close-panier" >
                <button onclick="showPanier()" class="btn btn-outline-primary" style="background-color:transparent !important"><img src="{{asset('assets/recap_produit/close-blue.svg')}}" alt=""/></button>
            </div>
            </div>

            <div class="row row_caisse_helper" style="  height: 23px; width: 229px; margin-top: 15px">
                <img src="{{asset('assets/recap_produit/paiement.svg')}}" alt=""/>
            </div>
        </div>

    </div>

    <div class="rayon-btn-direction-panier " onclick="showPanier()" style="display: none">
        <span class="panier-counter" id="racourci_panier">
            @if(isset($_SESSION['panier']))
            {{count($_SESSION['panier'])}}
            @else 0
            @endif
        </span>
        <button class="btn-direction-panier btn-right-panier">
            <img class="img-direction-btn-panier" src="{{asset('assets/recap_produit/Chariot.svg')}}" alt="">
        </button>
    </div>
    </div>

    <script>
        function showPanier() {
            const element = document.getElementById('main-element');
            element.classList.toggle('panier_show')
            const monstyle = document.getElementById('recap-modification-produit')
            element.style.backgroundColor = "rgba(0, 0, 0, 0.5)";
            element.style.width = "100%";
            monstyle.classList.remove('recap-modification-produit');
            $('#myModal').modal('hide');
        }

        function showsupppanier(showsupppanier) {
            console.log(showsupppanier)
        }

        function closePopup(id) {
            console.log('Voici id djo', id)
            var element = document.getElementById("pop_"+id);
            element.classList.add("mystyle");
        }

        function closeModalDetail() {
            const modaldetail = document.getElementById('modal-modification-produit-panier')
            modaldetail.classList.add('remove-modal-modification-panier')
        }


    </script>
</body>
</html>
