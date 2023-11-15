<style type="text/css">
    @import url('https://fonts.googleapis.com/css2?family=Gelasio:ital@1&family=Licorice&family=Noto+Sans&family=Roboto:wght@300;400&family=Tajawal:wght@300&display=swap');

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
        width: 300px !important;
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
        margin-bottom: 12.39px;
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
            width: 306px;
            color: #191970;
            font-family: Roboto;
            font-size: 24px;
            font-weight: 500;
            letter-spacing: 0;
            line-height: 30px;
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
    /* margin-top: 23px !important; */
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
.recap-article-item {

}

.recap-cmd {
height: 28px;
width: 104px;
color: #191970;
font-family: Roboto;
font-size: 14px;
font-weight: 500;
letter-spacing: 0;
line-height: 14px;
margin-left: 10px;
margin-top: 10px;
}

.cmd-artice-libelle {
    height: 22px;
    width: 148px;
    color: #4A4A4A;
    font-family: Roboto;
    font-size: 11px;
    letter-spacing: 0;
    line-height: 11px;
    margin-bottom: 5px;
}

.cmd-artice-qte-prix {
    height: 11px;
    color: #4A4A4A;
    font-family: Roboto;
    font-size: 11px;
    font-weight: 500;
    letter-spacing: 0;
    line-height: 11px;
}

.cmd-ref-article {
    color: #4A4A4A;
    font-family: Roboto;
    font-size: 11px;
    font-weight: 500;
    letter-spacing: 0;
    line-height: 11px;
}

.article-title-element {
    height: 11px;
    color: #191970;
    font-family: Roboto;
    font-size: 11px;
    font-weight: 500;
    letter-spacing: 0;
    line-height: 11px;
    margin-bottom: 10px;
}

.article-titre {

}

.recap_price_total {
    text-align: right;
    animation-direction: right;
    width: 158px;
    height: 10px;
    position: absolute;
    left: 68px;
}

.client-address-line {
    box-sizing: border-box;
    height: 56px;
    width: 402px;
    border-radius: 6px;
    background-color: #F5F5F5;
    margin-top: 15px;
    margin-left: 10.5px;
}

</style>


<style>

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

    .modal-panier-content-updated {
        width: 973px;
        height: 579px !important;
        background-color: #F8F8F8;
    }

    .panier-right-section {
        height: 579px !important;
        width: 276px !important;
        border-radius: 6px;
        box-shadow: 0 5px 15px 0 rgba(0,0,0,0.5);
        /* position: fixed !important; */
        background-color: #F8F8F8 !important;
    }

    .main_panier_v2 {
        display: flex;
        align-items: center;
        justify-content: center;
        column-gap: 20px;

    }

    .close-btn-panier-bis {
    width: 34px;
    height: 34px;
    background: transparent;
    border: none;
    position: absolute;

    }

    .input-none-panier-v2 {
        display: none !important;
    }

    .mobile-panier-step-btn {
        width: 340px;
        height: 65px;
        background-color: #F5F5F5;
        position: absolute;
        margin-top: -65px;
        border-radius: 0px 0px 6px 6px;
        display: none;
    }

    .mobile-panier-recap {
        width: 100%;
        height: 160px;
        /* background: royalblue */
        border: 1px solid;
    }

    .mobile-code-promo-btn {
        height: 37px;
        width: 87px;
        border-radius: 0 6px 6px 0;
        background-color: #007BFF;

        color: #FFFFFF;
        font-family: Roboto;
        font-size: 12px;
        letter-spacing: -0.08px;
        line-height: 22px;
        text-align: center;
        border: transparent;
    }

    .mobile-code-promo-input {
        height: 37px;
        width: 150px;
        border-radius: 0 6px 6px 0;
        background-color: #F5F5F5;
    }

    .body-box-mobile {
        display: none;
    }

    .expedition-moyen {
        position: relative;
        top: -72px !important;
        left: 32px !important;
    }

    .step-mode-expedition button {
        position: relative;
        left: -37px !important;
        top: 20px !important;
        padding-left: 34px;
        padding-right: 30px;
    }


</style>

<style>
    .retour-panier-custom {
      height: 37px;
      width: 37px;
      border-radius: 6px;
      background-color: #D8D8D8;
      border: none;
      color: #fff;
    }

    .retour-panier-custom svg {
      color: #000;
        position: relative;
        top: -1px;
    }

    .btn-text-contuer {
        position: relative;
        left: 50px;
        font-weight: 500;
        text-align: center;
    }

    .btn-img-contuer {
      position: absolute;
      float: right;
      right: 15px;
    }
    .reduction-ok {
        text-align: right;
        height: 20px;
        color: rgb(190, 41, 41) !important;
        font-family: Roboto;
        font-size: 16px;
        font-weight: bold;
        letter-spacing: 0;
        line-height: 20px;
        text-align: right;
        float: right;
        position: relative;
        top: 4px;
      }

      .code-vide {
        border: none;
      }

     .code-active {
        box-sizing: border-box;
        height: 41px;
        width: 178px;
        border: 1px solid #00B517;
        border-radius: 6px 0 0 6px;
        background-color: #FFFFFF;
      }

      .coupon-code-promo {
        height: 11px;
        width: 205px;
        color: #4A4A4A;
        font-family: Roboto;
        font-size: 11px;
        font-weight: 500;
        letter-spacing: 0;
        line-height: 11px;
      }


</style>

<!-- zone failed  -->
<style>
.code-echec {

    box-sizing: border-box;
    height: 36px;
    width: 250px;
    border: 1px solid #D0021B;
    border-radius: 6px;
    background-color: rgba(208,2,27,0.15);
    display: flex;
    margin-top: 5px;
}

.code-echec-img {
    height: 16px;
    width: 16px;
    margin-top: 4px;
    margin-left: 10px;
    margin-right: 8px;
}

.code-echec-text {
    height: 13px;
    width: 164px;
    color: #D0021B;
    font-family: Roboto;
    font-size: 11px;
    letter-spacing: 0.24px;
    line-height: 12px;
    margin-top: 12px;
}

</style>

<style>
    .code-non-active{
      box-sizing: border-box;
      height: 59px;
      width: 256px;
      border: 1px solid #FF9500;
      border-radius: 6px;
      background-color: rgba(255,149,0,0.15);
      display: flex;
      justify-content: flex-start;
      align-items: flex-start;
      margin-top: 5px;
    }

    .code-no-active-img {
      height: 16px;
      width: 16px;
      margin-top: 6px;
      margin-left: 10px;
      margin-right: 8px;
    }

  .code-no-active-text {
      height: 39px;
      width: 201px;
      color: #FF9500;
      font-family: Roboto;
      font-size: 11px;
      letter-spacing: 0.24px;
      line-height: 12px;
      margin-top: 12px;
    }

    .box-container {
        width: 295px !important;
    }


</style>

<div class="main_panier_v2 input-none-panier-v2" id="panier_version_v2">

    <button id="exampleModal_bachirCloseds" type="button" class="close-btn-panier-bis" style="z-index: 15000; position:absolute;  display:none" onclick="closePaniverV2()">
        <img src="{{ asset('assets/images/close-btn.svg') }}" alt="">
    </button>

<div class="panier-main-section">

    @include('front.new_view.panier_composants.panier_main_section')
    @include('front.new_view.panier_composants.panier-volet-droit')
    @include('front.new_view.panier_composants.panier-mobile-section')

</div>

    @include('front.new_view.paiement_card_popup')
    @include('front.new_view.ajout-adress-livraison')
    @include('front.new_view.modif_address_client')
    @include('front.new_view.modif_credi_card_client')
    @include('front.new_view.credit_card_modification')
    @include('front.new_view.choix_address_factu_client')
    @include('front.new_view.user-ajout-addr-livraison')
    @include('front.new_view.commande_error')
    @include('front.new_view.commande_succes')
    @include('front.new_view.numero_telephone')
    @include('front.new_view.bachir_load')

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

<script>

 let mode_expidion_for_payment = {}

 function getExpeditionById(id) {

    $.ajax({
    method: 'GET',
    url: '/get_sigle_expedition',
    data: {id: id},
    success: function(response) {

    let val_element = $('#expedition_input'+id).attr('data-expedition')

    if (typeof val_element == 'number') {
    mode_expidion_for_payment = Number(val_element)
    let montant_expedition = parseInt(mode_expidion_for_payment)
    $('#prix_expedition_achat').text(mode_expidion_for_payment+'Fcfa')
    $('#prix_expedition_achat-bix').text(montant_expedition + " Fcfa")
    }else {
    $('#prix_expedition_achat').text(val_element)
    $('#prix_expedition_achat-bix').text(val_element)
    }

    $.ajax({
    type: 'GET',
    url: '/current_price_achat',
    data: {},
    success: function(result) {

    var sous_total = 0;
    var nombre_total = 0;

    for (let i = 0; i < result.length; i++) {
        sous_total += result[i].prix*result[i]['0']
        nombre_total += parseInt(result[i]['0'])
    }

    if (sous_total > 20000) {
        $('#prix_expedition_achat').text('Gratuit')
        montant_expedition = 0;
    }

    let total_expedition_inclu = sous_total + montant_expedition;
    $('#total-panier').text(total_expedition_inclu.toLocaleString()+ ' Fcfa');

    }
    })

    }

    })
 }


     // selection du moyen d'expédition
 $(document).ready(function() {
     // ---------------------- paypal ------------------------
     $('#paypal-info-icon').on('mouseenter', function() {
         $('#paypal-infos-text-id').removeClass('infos-invite-none')
         $('#selectionner-btn-infos-text-paypal').addClass('infos-invite-none')
     })

     $('#paypal-info-icon').on('mouseleave', function() {
         $('#paypal-infos-text-id').addClass('infos-invite-none')
         $('#selectionner-btn-infos-text-paypal').removeClass('infos-invite-none')
     })

     // ---------------------- airtel ------------------------
     $('#credicard-info-icon').on('mouseenter', function() {
         $('#creditcard-infos-text-id').removeClass('infos-invite-none')
         $('#creditcard-selectionner-btn-infos-text').addClass('infos-invite-none')
     })

     $('#credicard-info-icon').on('mouseleave', function() {
         $('#creditcard-infos-text-id').addClass('infos-invite-none')
         $('#creditcard-selectionner-btn-infos-text').removeClass('infos-invite-none')
     })

     // ---------------------- moov ------------------------
     $('#moov-info-icon').on('mouseenter', function() {
         $('#moov-infos-text-id').removeClass('infos-invite-none')
         $('#selectionner-btn-infos-text-moov').addClass('infos-invite-none')
     })

     $('#moov-info-icon').on('mouseleave', function() {
         $('#moov-infos-text-id').addClass('infos-invite-none')
         $('#selectionner-btn-infos-text-moov').removeClass('infos-invite-none')
     })

     // --------------------------------------
     $('.check-expedition').click(function() {

     $(this).prop('checked', true);

     console.log('Voici le truc comme id:', $(this).val())

     getExpeditionById($(this).val())

     let valeur_expedition = $(this).attr('data-expedition')
     if (valeur_expedition == 'Gratuit') {
         $('#montant_expedition_achat').text('Gratuit')
     }else {
         $('#montant_expedition_achat').text(valeur_expedition + ' Fcfa')
             }


     $.each($('.check-expedition').not($(this)), function(key, value) {
         $(value).prop('checked', false);
     })

     if ($('.row-expedition-updated').hasClass('box-error-login')) {
         $('.row-expedition-updated').removeClass('box-error-login')
     }


 })

 // foermeture du modal achat
 $('#exampleModal_bachirClosed').on('click', function() {
     $("#continuer").addClass('button-disabled-panier')
     $("#continuer").removeClass('button-disabled-panier-blocked')
     $('#exampleModal_bachir').modal('hide')
 })


 // debut traitement de controle des champs pop num_tel

//  $('#phone-paiement-zone-moov').bind('keyup','keydown', function(event) {
//      var inputLength = event.target.value.length;
//      if (event.keyCode != 8){
//      if(inputLength === 3 || inputLength === 6 || inputLength === 9){
//          var thisVal = event.target.value;
//          thisVal += ' ';
//          $(event.target).val(thisVal);
//      }
//      }

//      if (inputLength == 12) {
//          $("#continuer").addClass('button-disabled-panier')
//          $("#continuer").removeClass('button-disabled-panier-blocked')
//      }else {
//          $("#continuer").removeClass('button-disabled-panier')
//          $("#continuer").addClass('button-disabled-panier-blocked')
//      }

//  })

//  $('#phone-paiement-zone').bind('keyup','keydown', function(event) {
//      var inputLength = event.target.value.length;
//      console.log('Le target est:', inputLength)
//      if (event.keyCode != 8){
//      if(inputLength === 3 || inputLength === 6 || inputLength === 9){
//          var thisVal = event.target.value;
//          thisVal += ' ';
//          $(event.target).val(thisVal);
//      }

//      }

//      if (inputLength == 12) {
//          $("#continuer").addClass('button-disabled-panier')
//          $("#continuer").removeClass('button-disabled-panier-blocked')
//      }else {
//          $("#continuer").removeClass('button-disabled-panier')
//          $("#continuer").addClass('button-disabled-panier-blocked')
//      }
//  })

$(document).on('keyup keydown', '#phone-paiement-zone-moov', function(event) {
     var inputLength = event.target.value.length;
     if (event.keyCode != 8){
     if(inputLength === 3 || inputLength === 6 || inputLength === 9){
         var thisVal = event.target.value;
         thisVal += ' ';
         $(event.target).val(thisVal);
     }
     }

     if (inputLength == 12) {
         $("#continuer").addClass('button-disabled-panier')
         $("#continuer").removeClass('button-disabled-panier-blocked')
     }else {
         $("#continuer").removeClass('button-disabled-panier')
         $("#continuer").addClass('button-disabled-panier-blocked')
     }

 })

 $(document).on('keyup keydown', '#phone-paiement-zone', function(event) {
    var inputLength = event.target.value.length;
    console.log('Le target est:', inputLength);
    if (event.keyCode !== 8) {
        if (inputLength === 3 || inputLength === 6 || inputLength === 9) {
            var thisVal = event.target.value;
            thisVal += ' ';
            $(event.target).val(thisVal);
        }
    }

    if (inputLength === 12) {
        $("#continuer").addClass('button-disabled-panier');
        $("#continuer").removeClass('button-disabled-panier-blocked');
    } else {
        $("#continuer").removeClass('button-disabled-panier');
        $("#continuer").addClass('button-disabled-panier-blocked');
    }
});

 // btn_numero_telephone-client

 $('#numero_telephone-client-2').on('keyup', function() {
         let email_valeur = $(this).val()
         if (email_valeur.length > 0 && $('#numero_telephone-client-2').hasClass('input-error-warning')) {
             $('#numero_telephone-client-2').removeClass('input-error-warning')
         }else if (email_valeur.length == 0) {
             $('#numero_telephone-client-2').addClass('input-error-warning')
         }
         open_num_tel_btn()
     })

 // ------------------------------- numero tel -------------------------------------
 $('#numero_telephone-client-2').on('blur', function() {
     let email_valeur = $(this).val()
     if (email_valeur.length == 0) {
         $('#numero_telephone-client-2').addClass('input-error-warning')
     }
 })

 })

 function open_num_tel_btn () {

 let nom_prenom1 = $('#numero_telephone-client-2');

 let nom_prenom2 = $('#numero_telephone-client-2').val();

 // pwd-border-error
 if (!$(nom_prenom1).hasClass('input-error-warning') &&  nom_prenom2.length > 0 ) {
     $('#btn_numero_telephone-client').removeClass('ajout-adress-livrason-disabled')
     console.log('Normalement bon')
 }else {
     $('#btn_numero_telephone-client').addClass('ajout-adress-livrason-disabled')
     console.log('Normalement pas bon')
 }
 }

function expedition_panier(id) {
    for (let index = 1; index < 8; index++) {
        $('#expedition_input'+index).prop('checked', false)
    }

    $('#expedition_input'+id).prop('checked', true)
    let check_valeur = $('#expedition_input'+id).val();
    getExpeditionById(check_valeur)
    console.log('Votre element est:', id, 'et sa valeur est:', check_valeur)
}

function getCardTypeInvite(num) {
    
    num = num.replace(/[^\d]/g,'');  // Sanitise number
    var regexps = {
        'Mastercard' : /^5[1-5][0-9]{5,}$/,
        'Visa' : /^4[0-9]{6,}$/,
        'Amex' : /^3[47][0-9]{5,}$/,
        'Discover' : /^6(?:011|5[0-9]{2})[0-9]{3,}$/,
        'Diners' : /^3(?:0[0-5]|[68][0-9])[0-9]{4,}$/,
        'Cb' : /^(?:2131|1800|35[0-9]{3})[0-9]{3,}$/,
        'Inconnu' : /.*/,
    };

    for( var card in regexps ) {
        if ( num.match( regexps[ card ] ) ) {

            if(card == 'Visa'){
                $('.visa').removeClass('hide');
                $('.master1').addClass('hide');
                $('.jcb').addClass('hide');
            }else if(card == 'Mastercard'){
                $('.visa').addClass('hide');
                $('.master1').removeClass('hide');
                $('.jcb').addClass('hide');
            }else if(card == 'Cb'){
                $('.visa').addClass('hide');
                $('.master1').addClass('hide');
                $('.jcb').removeClass('hide');
            }
            else{
                $('.visa').addClass('hide');
                $('.master1').addClass('hide');
                $('.jcb').addClass('hide');
            }

            $('#cardType').text(card);
            $('#cardType').val(card);
            return card;
        }
    }
 }

     function modifAdressFacturation() {

    //  initMapAchatProcessInvite()
     var KurlM = '/carnet-getaddress';

     let actuelle_adresse = $('#address_actuel').val()

     $.ajax({
     type: "GET",
     url: KurlM,
     success: function (response) {
     
     if (response.status == 202) {
         let carnet = response.carnet[0]
         let email_invite = $('#email-user-invite').val(carnet.email_invite);
         $('#prenom-nom-user-invite').val(carnet.nom_prenom);
         $('#numero-user-invite').val(carnet.num_invite);
         $('#address-quartier-user-invite').val(carnet.addr_quartier);
         $('#comp-addre-user-invite').val(carnet.comp_addr);
         $('#valeur-user-invite').find(':selected').val();
         $('#code-poste-user-invite').val(carnet.code_poste_invite);
        //  $('#FormulaitreInvite').modal('show');
        $('#FormulaitreInvite').removeClass('input-none-panier-v2')

     }else if (response.status == 200) {
         $('#containerModifAdressSection').empty();
         var carnets = response.carnet[0];
         $.each(carnets, function(key, carnet){

         let card = `
         <section style="" class="client-address-line">
             <article class="mesaddresses" id="custom_add-${carnet.id}" style="margin-top:0px;">
                 <input style="margin-left: 0.75rem;" id="custom_radio-${carnet.id}" type="radio" value="${carnet.id}" onclick="getRadioClient(${carnet.id})" name="Useraddresse" class="form-check-input micheck2" >
                 <aside class="labeldiv">
                     <label class="labelcheck" style="position: relative; top: -6px" for="check1"><span style="font-weight: 500">${carnet.prenom_nom},</span>  ${carnet.portable}, ${carnet.adresse}, ${carnet.complement}, Gabon, ${carnet.ville} - ${carnet.code_postale}</label>
                 </aside>
             </article>
         </section>`

         $('#containerModifAdressSection').append(card)

     });

    //  $('#modifAdressFacturationClient').modal({
    //      backdrop: 'static',
    //      keyboard: false
    //  })
     $('#modifAdressFacturationClient').removeClass('input-none-panier-v2')

     $('#custom_add-'+actuelle_adresse).css('border', '1px solid #00B517')
     $('#custom_radio-'+actuelle_adresse).prop("checked", true);
     $('#custom_radio-'+actuelle_adresse).attr('checked', true);
 }

 }
})
}

function choisirAdressFacturation() {
    var KurlM = '/carnet-getaddress';
    let actuelle_adresse = $('#address_actuel').val()

    $.ajax({
    type: "GET",
    url: KurlM,
    success: function (response) {
        console.log('Voici la reponse des carnets:', response)
        $('#containerChoixAdressSection').empty();

        if (response.status == 200) { // Le cas ou le user est connecté
            $('#ajout-card-btn-element').removeClass('infos-invite-none')
            var carnets = response.carnet[0];
            if (carnets.length > 0) {
            $.each(carnets, function(key, carnet){
            let card = `
            <section style="padding:12px;">
                <article class="mesaddresses" id="custom_add-${carnet.id}" style="margin-top:0px;">
                    <input id="custom_radio-${carnet.id}" type="radio" value="${carnet.id}" onclick="getRadioClient(${carnet.id})" name="UseraddresseFacturation" class="form-check-input micheck2" >
                    <aside class="labeldiv">
                        <label class="labelcheck" for="check1"><b>${carnet.prenom_nom},</b>  ${carnet.portable}, ${carnet.adresse}, ${carnet.complement}, Gabon, ${carnet.ville} - ${carnet.code_postale}</label>
                    </aside>
                </article>
            </section>`
            $('#containerChoixAdressSection').append(card)
        });

            $('#custom_add-'+actuelle_adresse).css('border', '1px solid #00B517')
            $('#custom_radio-'+actuelle_adresse).prop("checked", true);
            $('#custom_radio-'+actuelle_adresse).attr('checked', true);

            }

            }else if (response.status == 202) { // le cas de l'invité
            $('#ajout-card-btn-element').addClass('infos-invite-none')
            let carnet = response.carnet[0];
            console.log('le carnet:', carnet)
            let card = `
                <section style="padding:12px;">
                    <article class="mesaddresses" id="custom_add-${carnet.id}" style="margin-top:0px;">
                        <input id="custom_radio-${carnet.num_invite}" type="radio" value="${carnet.num_invite}" onclick="getRadioClient(${carnet.num_invite})" name="UseraddresseFacturation" class="form-check-input micheck2" >
                        <aside class="labeldiv">
                            <label class="labelcheck" for="check1"><b>${carnet.nom_prenom},</b>  ${carnet.num_invite}, ${carnet.addr_quartier}, ${carnet.comp_addr}, Gabon, Libreville - ${carnet.code_poste_invite}</label>
                        </aside>
                    </article>
                </section>`
                $('#containerChoixAdressSection').append(card)
            }
            console.log('Votre reponse est:', response)
        }
    })

    $('#ChoisirAdressFacturationClient').modal('show')

}

function getRadioClient(id) {
    $("#current_addres").val(id)
    $('#address_actuel').val(id)
    $('#id_client_addresse').val(id)
}

function getCreditCurrentId(id, type_card) {
    console.log('Le type est:', type_card)

    if (type_card =='VISA') {
        $("#current_credit_carte").val(id)
        $('#current_type_card').val('VISA')
    }else if(type_card == 'MasterCard'){
        $("#current_credit_carte-master").val(id)
        $('#current_type_card').val('MasterCard')
    }

}

function ajoutAdressAchat(){

    // initMapAchatProcessNewUser()
    // $('#AjoutAdresseLivraisonAchat').modal({
    //     backdrop: 'static',
    //     keyboard: false
    // })

    // $('#AjoutAdresseLivraisonAchat').modal('show')
    initMapAchatProcess()
    $('#modifAdressFacturationClient').modal('hide')

    $('#UserAjoutAdresseLivraison').removeClass('input-none-panier-v2')

}

function ouvre_modal_me() {
    $("#bachir-loader").modal({ backdrop: 'static', keyboard: false });

    $('#exampleModal_bachir').modal('hide')
    $('#bachir-loader').modal('show');

    setTimeout(function() {
        $('#bachir-loader').modal('hide');
        $('#exampleModal_bachir').modal('show')
    }, 2000);
}

function ouvre_bachir() {
    $("#bachir-loader").modal({ backdrop: 'static', keyboard: false });

    $('#exampleModal_bachir').modal('hide')
    $('#bachir-loader').modal('show');

    setTimeout(function() {
        $('#bachir-loader').modal('hide');
        $('#exampleModal_bachir').modal('show')
    }, 2000);
}

function rand_traitement() {
    function getRandomInt(max) {
        return Math.floor(Math.random() * max);
    }

    if (getRandomInt(2) == 0) {

    }

    if (getRandomInt(2) == 1) {

    }

}

function showinterformulaire() {
    initMapAchatProcessInvite();
    // //  initAutocomplete()
    //  $('#FormulaitreInvite').modal({
    //      backdrop: 'static',
    //      keyboard: false
    //  })
    //  $('#FormulaitreInvite').modal('show')
    $('#FormulaitreInvite').removeClass('input-none-panier-v2')
}

// ouverture du modal connexion dans la session invité
function ouvre_login() {
    // $('#inviteRegisterLoginModal').modal({
    //     backdrop: 'static',
    //     keyboard: false
    // })
    // $('#inviteRegisterLoginModal').modal('show')
    $('#inviteRegisterLoginModal').removeClass('input-none-panier-v2')
}

function ouvre_invite() {
    $("#FormulaitreInvite").modal('show');
    $('#exampleModal_bachir').modal('hide');
}

     const panier = document.getElementById("panier");
     const expedition = document.getElementById("expedition");
     const paiement = document.getElementById("paiement");
     const confirmation = document.getElementById("confirmation");
     const test = document.getElementById("101");
     const coupon_code_champ = document.getElementById("coupon_code_champ");
     const texte_pro = document.getElementById("texte_pro");
     const zone_succes = document.getElementById("zone_succes");
     const zone_vide = document.getElementById("zone_vide");
     const zone_erreur = document.getElementById("zone_erreur");

    function UpperCase () {
        var x = document.getElementById("input_code");
        var y = document.getElementById("activer_code");
        x.value = x.value.toUpperCase();
        y.classList.remove('input-group-text-activer');
        y.classList.add('input-group-text');

        if(x.value != '') {
            y.classList.remove('input-group-text');
            y.classList.add('input-group-text-activer');
        } else {
            y.classList.remove('input-group-text-activer');
            y.classList.add('input-group-text');
        }
    }

     function onfocus_ver() {
         var x = document.getElementById("input_code");
         var y = document.getElementById("activer_code");
         if (y.innerHTML == "Retirer") {
             x.readOnly = true;
         } else {
             x.readOnly = false;
         }
     }

function myFunction() {

    var x1 = document.getElementById("input_code");
    var y = document.getElementById("activer_code");
    var z = document.getElementById("reduction");
    var st = document.getElementById("sous-total-panier");
    var t = document.getElementById("total-panier");
    var zone_s = document.getElementById("zone_succes");
    var zone_v = document.getElementById("zone_vide");
    var zone_e = document.getElementById("zone_erreur");

if (y.innerHTML == "Retirer") {
        z.innerHTML = "Aucun";
        z.classList.add('label-button');
        z.classList.remove('reduction-ok');
        x1.classList.remove('code-plein');
        x1.classList.remove('code-incorrect');
        zone_s.classList.add('coupon_code_cacher');
        zone_e.classList.add('coupon_code_cacher');
        y.innerHTML = "Activer";
        x1.readOnly = false;
        t.innerHTML = st.innerHTML;
        zone_v.classList.remove('coupon_code_cacher');
} else {

switch (x1.value) {
    default:
    z.innerHTML = "Aucun";
    z.classList.add('label-button');
    z.classList.remove('reduction-ok');
    x1.classList.remove('code-plein');
    x1.classList.add('code-incorrect');
    zone_e.classList.remove('coupon_code_cacher');
    zone_s.classList.add('coupon_code_cacher');
    zone_v.classList.add('coupon_code_cacher');
    y.innerHTML = "Activer";
    t.innerHTML = st.innerHTML;
        break;
    }
}

}


var count_paiement = 120;
// marker---------------------
function countDownPayement(request) {
    var timer = document.getElementById("count-paiement-timeout"); // Timer ID
    if (count_paiement > 0) {
        count_paiement--;
        // console.log('counter here', count_paiement)
        timer.innerHTML = count_paiement
        setTimeout("countDownPayement()", 1000);
    } else {
    // window.location.href = redirect;
}
}

function get_tm_mode_expedition() {
$.ajax({

type: 'GET',
url: '/get_expedtions_mode',
success: function(response) {
console.log('Toutes les expéditions sont:', response)
let expedtion_disponible = []

var sous_total = 0;

if (response.length > 0) {

for (let h = 0; h < response.length; h++) {
var data_expedition = response[h][2][0]
console.log('Expedition = :', response[h][2][0])

if(data_expedition == undefined) {

   data_expedition = {
       "mode_expedition": "Voiture",
       "id": 1,
       "prix_max": "4000",
       "prix_marchand": 0
   }

}
var prix_expedition;

if (data_expedition['prix_marchand'] == 0) {
    prix_expedition = 'Gratuit'
    $('#expedition_prix-'+data_expedition['id']).text('Gratuit')
}else {
    prix_expedition = data_expedition['prix_marchand']
    $('#expedition_prix-'+data_expedition['id']).text(data_expedition['prix_marchand']+' Fcfa')
}

$('#disabled-section-'+data_expedition['id']).addClass('vider')
$('#expedition_input'+data_expedition['id']).attr('data-expedition', prix_expedition)

sous_total += response[h].prix*response[h]['0']
console.log('Sous total = ', sous_total)

}

if (sous_total > 20000) {
    prix_expedition = 'Gratuit'
    $('#expedition_prix-'+data_expedition['id']).text('Gratuit')
    $('#expedition_input'+data_expedition['id']).attr('data-expedition', 'Gratuit')
}

}else {
   console.log('Zero expeditions')
   data_expedition = {
       "mode_expedition": "Voiture",
       "id": 1,
       "prix_max": "4000",
       "prix_marchand": 0
   }

   var prix_expedition;

   if (data_expedition['prix_marchand'] == 0) {
       prix_expedition = 'Gratuit'
       $('#expedition_prix-'+data_expedition['id']).text('Gratuit')
   }else {
       prix_expedition = data_expedition['prix_marchand']
       $('#expedition_prix-'+data_expedition['id']).text(data_expedition['prix_marchand']+' Fcfa')
   }

   $('#disabled-section-'+data_expedition['id']).addClass('vider')
   $('#expedition_input'+data_expedition['id']).attr('data-expedition', prix_expedition)

   sous_total += response[h].prix*response[h]['0']
   console.log('Sous total = ', sous_total)

   if (sous_total > 20000) {
       prix_expedition = 'Gratuit'
       $('#expedition_prix-'+data_expedition['id']).text('Gratuit')
       $('#expedition_input'+data_expedition['id']).attr('data-expedition', 'Gratuit')
   }

   
}

}
})
}

function getUserCarnetAdresses2() {
    
 $.ajax({  //adresse livraison

type: 'GET',
url: '/get_user_infos_carnet',
success: function(response) {

let storage_data = JSON.parse(window.localStorage.getItem('adresse_invite'));
if (response == 0 && $('#invite-email-connected').text() == 'default_email@gmail.com') {

if (storage_data != null) {

$('#invite-email-connected').text(storage_data['email_invite'])
$('#invite-nom-prenom-connected').text(storage_data['nom_prenom'])
$('#invite-numero_tel-connected').text(storage_data['num_invite'])
$('#invite-quartier-address-connected').text(storage_data['addr_quartier'])
$('#comp-addr-supp-connected').text(storage_data['comp_addr'])
$('#inv-ville-connected').text(storage_data['ville'])

$('#invite-pays-connected').text('Gabon')

$('#invit-code-postal-connected').text(storage_data['code_poste_invite'])

$('#invite-email-connected-2').text(storage_data['email_invite'])
$('#invite-nom-prenom-connected-2').text(storage_data['nom_prenom'])
$('#invite-numero_tel-connected-2').text(storage_data['num_invite'])
$('#invite-quartier-address-connected-2').text(storage_data['addr_quartier'])
$('#comp-addr-supp-connected-2').text(storage_data['comp_addr'])
$('#invite-pays-connected-2').text('Gabon')
$('#invit-code-postal-connected-2').text(storage_data['code_poste_invite'])

$('#tab-form-connection').addClass('infos-invite-none')
$('#section-invite-infos-connected').removeClass('infos-invite-none')

}else{
    $('#tab-form-connection').removeClass('infos-invite-none')
}

}else if (response['carnet'][0].length == 0) {

$('#invite-email-connected').text(response['email'])
$('#section-addresse-non-defini').removeClass('infos-invite-none')
$('#section-addresse-bien-defini').addClass('infos-invite-none')
$('#section-invite-infos-connected').removeClass('infos-invite-none')

if (storage_data != null) {
    // window.localStorage.clear();
    window.localStorage.removeItem('adresse_invite')
}

}else{

if (storage_data != null) {
    // window.localStorage.clear();
    window.localStorage.removeItem('adresse_invite')
}

let carnet_addresse = response['carnet'];
$('#invite-email-connected').text(response['email'])

$('#invite-nom-prenom-connected').text(response['carnet'][0][0]['prenom_nom'])
$('#invite-numero_tel-connected').text(response['carnet'][0][0]['portable'])
$('#invite-quartier-address-connected').text(response['carnet'][0][0]['adresse'])
$('#comp-addr-supp-connected').text(response['carnet'][0][0]['complement'])
$('#invite-pays-connected').text('Gabon')
$('#invit-code-postal-connected').text(response['carnet'][0][0]['code_postale'])
$('#address_actuel').val(response['carnet'][0][0]['id'])
$('#inv-ville-connected').text(response['carnet'][0][0]['ville'])

$('#id_client_addresse').val(response['carnet'][0][0]['id'])

// --------------payement tab -----------------------------------
$('#invite-email-connected-2').text(response['email'])
$('#invite-nom-prenom-connected-2').text(response['carnet'][0][0]['prenom_nom'])
$('#invite-numero_tel-connected-2').text(response['carnet'][0][0]['portable'])
$('#invite-quartier-address-connected-2').text(response['carnet'][0][0]['adresse'])
$('#comp-addr-supp-connected-2').text(response['carnet'][0][0]['complement'])
$('#invite-pays-connected-2').text('Gabon')
$('#invit-code-postal-connected-2').text(response['carnet'][0][0]['code_postale'])
$('#inv-ville-connected-2').text(response['carnet'][0][0]['ville'])

$('#hidden-connected-flag').val('true') // flag de vérification si le user est connecté
$('#section-invite-infos-connected').removeClass('infos-invite-none')

}
},

error: function(XMLHttpRequest, textStatus, errorThrown) {
    console.log("some error");
}

})
}

function get_tm_card_credit() {
    
 // recuperation des cartes d'achats
 var LurlK = '/get_credit_card_achat/';

$.ajax({
type: "GET",
url: LurlK,
success: function (response) {

if (!jQuery.isEmptyObject(response.creditcards)) {

let cards = response.creditcards;
let card = cards;
$('#csz_2').empty()

let numero_carte = card['numero_carte'];

let id_card = card['id']

$('#current_credit_carte').val(id_card);
let payement_mean = [];

let id_check = 1;
var lastfour = numero_carte.substr(numero_carte.length - 4); // => "Tabs1"
payement_mean += '<div class="card-element-paiement filled" style="margin-left: 3.8px; padding-top: 10px;" id="card_filled-2">'

if (!jQuery.isEmptyObject(response.creditcards) && !jQuery.isEmptyObject(response.mastercard)) {
    payement_mean += '<div id="payement-backdrop_2" class="payement-element-alert"> <button class="btn-choose"  onclick="toggleVisaCard(2,'+response.creditcards.id+')" >Payer avec</button></div>'
}else{
    payement_mean += '<div id="payement-backdrop_2" class="payement-element-alert infos-invite-none"> <button class="btn-choose"  onclick="toggleVisaCard(2,'+response.creditcards.id+')" >Payer avec</button></div>'
}

payement_mean += '<div class="rectangle-card-1"><span class="card-name">'+card['nom_carte']+'</span></div><div class="card-icon" style="left:405px !important; top:32.49px !important"></div><div class="checked-card"><img src="/assets/images/icons/Valide-small.svg" alt=""></div>'

payement_mean += '<div class="data-cardsss-bis" style="display: flex; flex-direction:column"><label class="user-card-name-bis" id="credit_proprio">'+card['nom_proprietaire']+'</label><label class="user-card-acount-number-bis" id="credit_numero-1">**** ' +lastfour+'</label><label class="user-card-date" id="credit_date_expire-1">'+card['date_expiration']+'</label></div>'

payement_mean += '<div class="autre-button-bis"><button class="btn-card-option" onclick=changerCrediCard("VISA")>Changer</button><button class="btn-card-option" onclick=modifCreditCard("Visa","'+card["id"]+'")>Modifier</button></div></div>'

$('#csz_2').append(payement_mean)

}

if (!jQuery.isEmptyObject(response.mastercard)) {

$('#csz_1').empty();
let masters = response.mastercard;
let master = masters
let master_card_bg = '/assets/images/Carte_Paiement/Carte_MAsterCard.svg'
let master_card_small_icon = '/../assets/images/icons/Mastercard.svg'

let numero_carte1 = master['numero_carte'];
var lastfour1 = numero_carte1.substr(numero_carte1.length - 4);

let id_card = master['id']

$('#current_credit_carte-master').val(id_card);

let payement_mean_master = [];
payement_mean_master += '<div class="card-element-paiement filled" id="card_filled-1" style="margin-left: 3.8px;padding-top: 10px; background-image: url('+master_card_bg+')" >'

if (!jQuery.isEmptyObject(response.creditcards) && !jQuery.isEmptyObject(response.mastercard)) {
    payement_mean_master += '<div id="payement-backdrop_1" class="payement-element-alert"> <button class="btn-choose"  onclick="toggleVisaCard(1,'+response.mastercard.id+')" >Payer avec</button></div>'
}else{
    payement_mean_master += '<div id="payement-backdrop_1" class="payement-element-alert infos-invite-none"> <button class="btn-choose"  onclick="toggleVisaCard(1,'+response.mastercard.id+')" >Payer avec</button></div>'
}

payement_mean_master += '<div class="rectangle-card-1" ><span class="card-name">'+master['nom_carte']+'</span></div><div class="card-icon" style="left: 178px; background-image: url('+master_card_small_icon+') !important; top:32.49px"></div><div class="checked-card"><img src="/assets/images/icons/Valide-small.svg" alt=""></div>'

payement_mean_master += '<div class="data-cardsss-bis" style="display: flex; flex-direction:column;"><label class="user-card-name-bis" id="credit_proprio-m" style="width: 90%">'+master['nom_proprietaire']+'</label><label class="user-card-acount-number-bis" id="credit_numero-1-m">**** ' +lastfour1+'</label>'

payement_mean_master += '<label class="user-card-date" id="credit_date_expire-1-m">'+master['date_expiration']+'</label></div><div class="autre-button-bis" ><button class="btn-card-option" onclick=changerCrediCard("MasterCard")>Changer</button><button class="btn-card-option" onclick=modifCreditCard("MasterCard","'+master['id']+'")>Modifier</button></div></div>'

// $('#paiement-main-box-zone').prepend(payement_mean)
$('#csz_1').append(payement_mean_master)

}
}
})
}

function sendInfoBipSms(numero, code_validation) {
    var settings = {

    "url": "https://zjzrlx.api.infobip.com/sms/2/text/advanced",
    "method": "POST",
    "timeout": 0,
    "headers": {
        "Authorization": "App 388a4474b975e04e70e8eef8545a8900-de552553-9817-439c-ab57-a618f6dfa657",
        "Content-Type": "application/json",
        "Accept": "application/json"
    },
    "data": JSON.stringify({
        "messages": [
            {
                "destinations": [
                    {
                        "to": "+241"+numero
                    }
                ],
                "from": "InfoSMS",
                "text": "Vous avez une nouvelle commande du marchand : "+code_validation
            }
        ]
    }),
    };

    $.ajax(settings).done(function (response) {
        console.log('Retour infos bip here', response);
    });
}

function payer_via_mobile_service() {
var num_tel_client = 0

var request_ok = false;

let type_service = $('#mobileTypeService').val();

if (type_service == 'MC') {
    num_tel_client = $('#phone-paiement-zone-moov').val();
}else if (type_service == 'AM') {
    num_tel_client = $('#phone-paiement-zone').val();
}

var request;

// var timerId = setInterval(() => {
$.ajax({
type: 'POST',
url: '/pay_with_mobile_service',
data: {type_service: type_service, num_tel: num_tel_client},
headers: {
    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
},
success: function(response) {  // ----- Retour de paiement

    if(response['status'] == 'success') {
    console.log('Response data:', response)

// request_ok = true

    if (response['pvit_response'].STATUT == 200) { // premiere reponse pvit ok
    var count_time = 0;

    var ref = response['pvit_response'].REF
    var user_email = response['user_meta_data'][0];
    var date_livraison = response['user_meta_data'][1]

    const intervalId = setInterval(() => { // ----- Debut Interval
    $.ajax({
    type: 'GET',
    url: '/get_pvit_callback/'+ref,
    data: {},
    success: function(callback_data) {

    if (callback_data.length > 0 && callback_data[0].status_payement == 200) {
    $('#commande-user-email').text(user_email)
    $('#commande-user-numero').text(ref)
    $('#commande-user-date').text(date_livraison)

    const tm_num = "+24165609192"; // Numero à notifier en cas d'une nouvelle commande

    sendInfoBipSms(tm_num, callback_data[0].nom_prenom_marchand)

    // $('#bachir-loader').modal('hide');
    $('#bachir-loader').addClass('input-none-panier-v2')

    // $('#commandeSuccessModal').modal({
    //     backdrop: 'static',
    //     keyboard: false
    // })

    // $('#commandeSuccessModal').modal('show')
    $('#commandeSuccessModal').removeClass('input-none-panier-v2')

    clearInterval(intervalId)

    } else if(callback_data.length > 0 && callback_data[0].status_payement == 0){

        // $('#bachir-loader').modal('hide');
        $('#bachir-loader').addClass('input-none-panier-v2')

        // $('#commandError').modal({
        //     backdrop: 'static',
        //     keyboard: false
        // })

        // $('#commandError').modal('show')
        $('#commandError').removeClass('input-none-panier-v2')

        clearInterval(intervalId)

    } else {

    count_time += 5000;

    if (count_time >= 120000) {

    console.log('Votre paiement n\'a pas abouti vous devez peut être réessayer')

    // $('#bachir-loader').modal('hide');
    $('#bachir-loader').addClass('input-none-panier-v2')

    // $('#commandError').modal({
    //     backdrop: 'static',
    //     keyboard: false
    // })

    // $('#commandError').modal('show')    
    $('#commandError').removeClass('input-none-panier-v2')
    clearInterval(intervalId)
    }

    }

    }
    }) // fin requete ajax
    }, 5000)  // -------------- fin Interval ---------------

    }else {

    // $('#bachir-loader').modal('hide');
    $('#bachir-loader').addClass('input-none-panier-v2')

    // $('#commandError').modal({
    //     backdrop: 'static',
    //     keyboard: false
    // })

    // $('#commandError').modal('show')
    $('#commandError').removeClass('input-none-panier-v2')
        console.log('Votre demande de payement n\'pas aboutit, cause: ', response['pvit_response'].MESSAGE)
    }

    }else if(response['status'] == 'error'){

    // $('#bachir-loader').modal('hide');
    $('#bachir-loader').addClass('input-none-panier-v2')

    // $('#commandError').modal({
    //     backdrop: 'static',
    //     keyboard: false
    // })

    // $('#commandError').modal('show')
    $('#commandError').removeClass('input-none-panier-v2')

    location.reload();

    }
}
})
}

function payer_via_carte_bancaire() {
    // traitement bancaire
    $.ajax({
    type: 'POST',
    url: '/send_ebelling_payement',
    data: {},
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    },
    success: function(response_call) {

    var bill_id = response_call.e_bill.bill_id
    var ref_produit = response_call.e_bill.external_reference
    var count_time_eb = 0;

    const intervalId = setInterval(() => { // ----- Debut Interval
    $.ajax({
    type: 'GET',
    url: '/get_ebilling_callback/'+ref_produit,
    data: {},
    success: function(callback_data) {
    
    console.log(callback_data)

    if (callback_data.length > 0 && callback_data[0].status_payement == 200) {
    console.log('Paiement visa éffectué avec succes')

    clearInterval(intervalId)

    } else {

    console.log('En attente de la reponse ebilling ...')

    count_time_eb += 5000;

    if (count_time_eb >= 60000) {
    
    // $('#bachir-loader').modal('hide');

    // $('#commandError').modal({
    //     backdrop: 'static',
    //     keyboard: false
    // })

    // $('#commandError').modal('show')

    clearInterval(intervalId)

    }

    }

    }
    }) // fin requete ajax ebilling
   }, 5000)  // -------- fin Interval ebilling -----

   var w = 800;
   var h = 600;
   var left = (screen.width/2)-(w/2); // calculate the left position of the window
   var top = (screen.height/2)-(h/2); // calculate the top position of the window

   var windowName = "Example";
   var windowFeatures = "width=800,height=600, left= "+left+" , top= "+top+", scrollbars=yes,status=yes, resizable=false";
   var ebilling_url = "https://staging.billing-easy.net/?invoice="+bill_id+"&operator=ORABANK_NG&redirect=1"
   window.open(ebilling_url, windowName, windowFeatures);
     
 }
 })
}

function changement() {

 if($("#coupon_code_champ").hasClass("coupon_code_cacher")==false) {
     $("#coupon_code_champ").addClass("coupon_code_cacher");
 }

 if($("#texte_pro").hasClass("coupon_code_cacher")==true) {
     $("#texte_pro").removeClass("coupon_code_cacher");
 }

 if(parseInt($("#101").text()) > 0) {

 let tab_expedition = [2, 5];

 if($("#panier").hasClass("step-blue")==true) {

 $("#panier").removeClass("step-blue")
 $('#panier').addClass('step-panier-completed')
 $("#one").hide()
 $("#expedition").removeClass("step-default")
 $("#expedition").addClass("step-blue")
 $("#two").show()
 $("#101").hide()
 $("#pan").hide()
 // --------------------- mode expédition ------------------------
 get_tm_mode_expedition()
 // ------------------------ fin expédition -------------------------
 getUserCarnetAdresses2()

 } else {

 if($("#expedition").hasClass("step-blue")==true) {

 let array_flag = 0;

 for (let u = 1; u < 8; u++) {
 if ($('#expedition_input'+u).prop('checked') == true) {
     array_flag = array_flag + u
 }
 }

 const user_connecte = $('.special-user-connecte')

 let flag_connection = $('#hidden-connected-flag').val()

 if (user_connecte.length == 0) {

 console.log('Le drapeau de la connexion est:', flag_connection)
 $('.step-expedition-bis').addClass('box-error-login')

 $('.step-expedition-bis').addClass('box-error-login-fade')

 setTimeout(function(){
     $('.step-expedition-bis').removeClass('box-error-login-fade')
 }, 500)

 }else {
     console.log('Il exist un user dans le processus:')
 }

 if (array_flag == 0 || (flag_connection == 'false' &&  $('#section-invite-infos-connected').hasClass('infos-invite-none')) || !$('#section-addresse-non-defini').hasClass('infos-invite-none')) {
     $('.row-expedition-updated').addClass('box-error-login')
     $('.row-expedition-updated').addClass('box-error-login-fade')

     $('#section-addresse-non-defini').addClass('box-error-login')
     $('#section-addresse-non-defini').addClass('box-error-login-fade')

     setTimeout(function(){
         $('.row-expedition-updated').removeClass('box-error-login-fade')
         $('#section-addresse-non-defini').removeClass('box-error-login-fade')
     }, 500)
 }

 // passage au slide suivant  if (array_flag > 0 && user_connecte.length != 0) {
 if (array_flag > 0 && (flag_connection == 'true' ||  !$('#section-invite-infos-connected').hasClass('infos-invite-none')) && $('#section-addresse-non-defini').hasClass('infos-invite-none')) {

 console.log('L\'expedition est: ', mode_expidion_for_payment)

 if (mode_expidion_for_payment.prix_max != 'Gratuit') {
     $('#mode_expedition-payment-checkpoint').text(mode_expidion_for_payment.prix_max+' Fcfa')
     console.log("Vos données d expedition sont:", mode_expidion_for_payment)
 }

//  -------------------> Credit card 
get_tm_card_credit()

 $("#expedition").removeClass("step-blue")
 $('#expedition').addClass('step-panier-completed')
 $("#two").hide()
 $("#paiement").removeClass("step-default")
 $("#paiement").addClass("step-blue")
 $("#three").show()
 $("#coupon_code_champ").removeClass("coupon_code_cacher");
 $("#texte_pro").addClass("coupon_code_cacher");
 $("#btn_continuer").text("COMMANDER")
 $("#continuer").removeClass('button-disabled-panier')
 $("#continuer").addClass('button-disabled-panier-blocked')

 }

 } else {

 if($("#paiement").hasClass("step-blue")==true) {

 $("#coupon_code_champ").removeClass("coupon_code_cacher");
 $("#texte_pro").addClass("coupon_code_cacher");

 // ouvre_modal_me()

 if ($('#payement-backdrop_2').hasClass('infos-invite-none') || $('#payement-backdrop_1').hasClass('infos-invite-none')) {

$('#panier_version_v2').addClass('input-none-panier-v2')

 // marker
 count_paiement = 120;

 countDownPayement()

//  $('#bachir-loader').modal({
//      backdrop: 'static',
//      keyboard: false
//  })

//  $('#bachir-loader').modal('show');
$('#bachir-loader').removeClass('input-none-panier-v2');

 //-------------------- Achat mobile---------------------
 payer_via_mobile_service()
 // }, 10000)
 }else{

    payer_via_carte_bancaire()
    console.log('Pas de moyen séléctionné')

 }
 }
 }

 }
 }

 masquer_retour($("#type_achat").val());

}

//   --------------------------- fin -----------------------

function backRecapCheckOut() {
//  $('#commandError').modal('hide')
    $('#commandError').addClass('input-none-panier-v2')
    $('#panier_version_v2').removeClass('input-none-panier-v2')
//  $('#exampleModal_bachir').modal('show')
}


// pour changer la carte d'achat
function changerCrediCard(type_card) {
    $('#type_client_card').val(type_card) // type de carte en général
    $('#visa-master-bis').text(type_card)
    console.log("le type se recupere ici:", $('#type_client_card').val())
    let id_carte;
    if (type_card == 'VISA') {

    let current_active_card = $('#current_credit_carte').val();

    console.log('Voici le current active credit card:', current_active_card)
    id_carte = current_active_card;

    let data = {
        id: id_carte,
        type_card: type_card
    }

    $.ajax({
    type: 'GET',
    url: '/change_credit_card_achat',
    data: data,
    success: function(response) {

    $('#containerModifCreditCardSection').empty()
    $.each(response, function(key, card){
    let card1 = `
    <section style="padding:12px;">
        <article class="mesaddresses" id="custom_card-${card.id}" style="margin-top:0px;">
            <input id="custom_radio-card-${card.id}" type="radio" value="${card.id}" onclick="getCreditCurrentId(${card.id}, 'VISA')" name="Useraddresse" class="form-check-input micheck2" >
            <aside class="labeldiv">
                <label class="labelcheck" for="check1"><b>${card.nom_proprietaire},</b>  ${card.numero_carte}, ${card.date_expiration}</label>
            </aside>
        </article>
    </section>`
    $('#containerModifCreditCardSection').append(card1)
    });

    $('#custom_card-'+id_carte).css('border', '1px solid #00B517')
    $('#custom_radio-card-'+id_carte).prop("checked", true);
    $('#custom_radio-card-'+id_carte).attr('checked', true);

    }
    })
    }else if (type_card == 'MasterCard') {

    let current_active_card_master = $('#current_credit_carte-master').val();
    id_carte = current_active_card_master;

    let data = {
        id: id_carte,
        type_card: type_card
    }

    $.ajax({
    type: 'GET',
    url: '/change_credit_card_achat',
    data: data,
    success: function(response) {
    $('#containerModifCreditCardSection').empty()
    $.each(response, function(key, card){
    let card1 = `
    <section style="padding:12px;">
        <article class="mesaddresses" id="custom_cardm-${card.id}" style="margin-top:0px;">
            <input id="custom_radio-cardm-${card.id}" type="radio" value="${card.id}" onclick="getCreditCurrentId(${card.id}, 'MasterCard')" name="Useraddresse" class="form-check-input micheck2" >
            <aside class="labeldiv">
                <label class="labelcheck" for="check1"><b>${card.nom_proprietaire},</b>  ${card.numero_carte}, ${card.date_expiration}</label>
            </aside>
        </article>
    </section>`
    $('#containerModifCreditCardSection').append(card1)
    });

    $('#custom_cardm-'+id_carte).css('border', '1px solid #00B517')
    $('#custom_radio-cardm-'+id_carte).prop("checked", true);
    $('#custom_radio-cardm-'+id_carte).attr('checked', true);

    }
    })
    }

    $('#modifCreditCardClient').modal('show')
  }

// Ajout de la carte de paiement coté client

function ajoutCarteCredit() {
 $('#CreditCardPopup').modal('hide');
 // choisirAdressFacturation() // affichage des adresses dans un pop up
 $.ajax({
     type: 'POST',
     url: '/send_ebelling_payement',
     data: {

     },
     headers: {
         'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
     },
     success: function(response_call) {
         console.log('Response callabck', response_call)
     }
 })
}

function toggleVisaCard(id, type_service) {

    $('#phone-paiement-zone').val("")
    $('#phone-paiement-zone-moov').val("")
    $('#mobileTypeService').val(type_service)
    if (id == 1) {

    $('#payement-backdrop_'+id).addClass('infos-invite-none')
    $('#payement-backdrop_2').removeClass('infos-invite-none')
    $('#section-airtel-input-zone').removeClass('infos-invite-none') // open input
    $('#section-airtel-input-zone-moov').addClass('infos-invite-none')

    $('#payement-backdrop_3').removeClass('infos-invite-none')

    $('#validate-credit-card-btn-spiner-id').removeClass('validate-credit-card-btn-spiner')
    $('#validate-span-spiner-id').removeClass('validate-span-spiner')
    $('#validate-credit-card-btn-spiner-id').removeClass('green-bg')

    $('#svgContainerhh').addClass('infos-invite-none')

    }else if (id == 2) {

    $('#payement-backdrop_'+id).addClass('infos-invite-none')
    $('#payement-backdrop_1').removeClass('infos-invite-none')
    $('#section-airtel-input-zone').addClass('infos-invite-none') // remove airtel input
    $('#section-airtel-input-zone-moov').removeClass('infos-invite-none')

    $('#payement-backdrop_3').removeClass('infos-invite-none')

    $('#validate-credit-card-btn-spiner-id').removeClass('validate-credit-card-btn-spiner')
    $('#validate-span-spiner-id').removeClass('validate-span-spiner')
    $('#validate-credit-card-btn-spiner-id').removeClass('green-bg')

    $('#svgContainerhh').addClass('infos-invite-none')

    }else if (id == 3) {

    $('#payement-backdrop_1').removeClass('infos-invite-none')
    $('#payement-backdrop_2').removeClass('infos-invite-none')
    $('#payement-backdrop_'+id).addClass('infos-invite-none')

    $('#section-airtel-input-zone').addClass('infos-invite-none') // remove airtel input
    $('#section-airtel-input-zone-moov').addClass('infos-invite-none')

    $('#validate-credit-card-btn-spiner-id').addClass('validate-credit-card-btn-spiner')
    $('#validate-span-spiner-id').addClass('validate-span-spiner')
    $('#svgContainerhh').removeClass('infos-invite-none')

    setTimeout(() => {
        $('#validate-credit-card-btn-spiner-id').addClass('green-bg')

        $("#continuer").addClass('button-disabled-panier')
        $("#continuer").removeClass('button-disabled-panier-blocked')
    }, 1200);

    }

    $("#continuer").removeClass('button-disabled-panier')
    $("#continuer").addClass('button-disabled-panier-blocked')

    }

    function inpayPopup () {
        $('#numeroCarte-inviter').val('');
        $('#nomCarte-inviter').val('');
        $('#date-ccs-inviter').val('');
        $('#numero-ccs-inviter').val('');
    }

    function retour() {

        if($("#coupon_code_champ").hasClass("coupon_code_cacher")==false) {
            $("#coupon_code_champ").addClass("coupon_code_cacher");
        }

        if($("#texte_pro").hasClass("coupon_code_cacher")==true) {
            $("#texte_pro").removeClass("coupon_code_cacher");
        }

         if(parseInt($("#101").text()) > 0) {

        if($("#paiement").hasClass("step-blue")==false && $("#paiement").hasClass("step-default") == false) {
            $("#paiement").addClass("step-blue")
            $("#for").hide()
            $("#three").show()
            $("#coupon_code_champ").removeClass("coupon_code_cacher");
            $("#texte_pro").addClass("coupon_code_cacher");
        } else {
            if($("#paiement").hasClass("step-blue")==true) {
            $("#paiement").removeClass("step-blue")
            $("#paiement").addClass("step-default")

            $("#three").hide()
            $("#two").show()
            $("#expedition").addClass("step-blue")
            $('#expedition').removeClass('step-panier-completed')
            $("#btn_continuer").text("CONTINUER")
            $("#continuer").addClass('button-disabled-panier')
            $("#continuer").removeClass('button-disabled-panier-blocked')
        } else {

        if ($("#expedition").hasClass("step-blue")==true) {
        $("#expedition").removeClass("step-blue")
        // $('#expedition').removeClass('step-panier-completed')
        $("#expedition").addClass("step-default")
        $("#two").hide()
        $("#one").show()
        $("#101").show()
        $("#pan").show()
        $("#panier").addClass("step-blue")
        $('#panier').removeClass('step-panier-completed')
        }
    }
    }
    }
       masquer_retour($("#type_achat").val());
    }

     function addVisaCard(id, position) {
         inpayPopup()
         $('#creditpopuElement').css('margin-top', "80px")
         $('#type_client_card').val(id)
         $('#visa-master-bis').text(id)
         $('#postion_carte').val(position)
         $('#CreditCardPopup').modal('show');
     }

     function addVisaCardChaged(id, position) {

         $('#creditpopuElement').css('margin-top', "80px")

         $('#modifCreditCardClient').modal('hide')
         $('#CreditCardPopup').modal('show');
     }

// modification de la carte credit existant
function modifCreditCard(type_card, id) {

    console.log('New id here please:', id)
    let id_card;
    if (type_card == 'Visa') {
        let current_visa = $('#current_credit_carte').val();
        id_card = current_visa
        type_card  = 'VISA'
        console.log('Votre type est:', current_visa)
    }else if(type_card == 'MasterCard') {
        let current_master = $('#current_credit_carte-master').val();
        id_card = current_master
        console.log('Votre type est:', current_master)
    }

     $('#current_type_card').val(type_card)

     $.ajax({
     type: 'GET',
     url: '/get_credit_card-to-change',
     data: {id: id_card, type_card: type_card},
     success: function(response){
         if (response.status == 200) {
             let num_credit_card = response.creditcards.numero_carte;
             $('#numeroCarte-inviter-modif').val(num_credit_card)
             $('#nomCarte-inviter-modif').val(response.creditcards.nom_proprietaire)
             $('#date-ccs-inviter-modif').val(response.creditcards.date_expiration)
             $('#numero-ccs-inviter-modif').val(response.creditcards.code_securite)
             $('#checkbox-modif').prop('checked', true)
             $('#checkbox-modif2').prop('checked', false)
             $('#credit_card_mode_defaut-modif-2').removeClass('infos-invite-none')
             if (response.creditcards.carte_defaut == 1) {
                 $('#utiliser-carte-defaut').prop('checked', true)
                 valeur_confirmation = 'Oui'
             }else{
                 $('#utiliser-carte-defaut').prop('checked', false)
             }
         }else if(response.status == 202){
             let num_credit_card = response.creditcards.numero_carte;
             $('#numeroCarte-inviter-modif').val(response.creditcards.numero_carte)
             $('#nomCarte-inviter-modif').val(response.creditcards.nom_proprietaire)
             $('#date-ccs-inviter-modif').val(response.creditcards.date_expiration)
             $('#numero-ccs-inviter-modif').val(response.creditcards.code_securite)
             $('#session_invite_state').val(true)
         }
     }
  })

  $('#modifCreditCard').modal('show');

  }

 function Remise_azero() {

     $("#panier").removeClass();
     $("#expedition").removeClass();
     $("#paiement").removeClass();
     $("#confirmation").removeClass();

     $("#panier").addClass("step-panier step-blue");
     $("#expedition").addClass("step-panier step-default");
     $("#paiement").addClass("step-panier step-default");
     $("#confirmation").addClass("step-panier step-default");

     $("#one").show()
     $("#two").hide()
     $("#three").hide()
     $("#for").hide()
     $("#101").show()
     $("#pan").show()
     $("#btn_continuer").text("CONTINUER")

     $("#coupon_code_champ").addClass("coupon_code_cacher");
     $("#texte_pro").removeClass("coupon_code_cacher");

     $("#reduction").text("Aucun");
     $("#reduction").addClass('label-button');
     $("#reduction").removeClass('reduction-ok');
     $("#input_code").val('');
     $("#input_code").attr('readonly', false);
     $("#input_code").removeClass();
     $("#input_code").addClass("form-control");

     $("#activer_code").removeClass();
     $("#activer_code").text("Activer");
     $("#activer_code").addClass("input-group-text");
     $("#zone_succes").removeClass();
     $("#zone_succes").addClass("code-promo-element coupon_code_cacher");
     $("#zone_vide").removeClass();
     $("#zone_vide").addClass("code-non-active coupon_code_cacher");
     $("#zone_erreur").removeClass();
     $("#zone_erreur").addClass("code-echec coupon_code_cacher");

 }

 function Remise_azero_panier_vide() {

     $("#panier").removeClass();
     $("#expedition").removeClass();
     $("#paiement").removeClass();
     $("#confirmation").removeClass();

     $("#panier").addClass("step-panier");
     $("#expedition").addClass("step-panier step-blue");
     $("#paiement").addClass("step-panier step-default");
     $("#confirmation").addClass("step-panier step-default");

     $("#one").hide()
     $("#two").show()
     $("#three").hide()
     $("#for").hide()
     $("#101").hide()
     $("#pan").hide()
     $("#btn_continuer").text("CONTINUER")

     $("#coupon_code_champ").addClass("coupon_code_cacher");
     $("#texte_pro").removeClass("coupon_code_cacher");

     $("#reduction").text("Aucun");
     $("#reduction").addClass('label-button');
     $("#reduction").removeClass('reduction-ok');
     $("#input_code").val('');
     $("#input_code").attr('readonly', false);
     $("#input_code").removeClass();
     $("#input_code").addClass("form-control");

     $("#activer_code").removeClass();
     $("#activer_code").text("Activer");
     $("#activer_code").addClass("input-group-text");
     $("#zone_succes").removeClass();
     $("#zone_succes").addClass("code-promo-element coupon_code_cacher");
     $("#zone_vide").removeClass();
     $("#zone_vide").addClass("code-non-active coupon_code_cacher");
     $("#zone_erreur").removeClass();
     $("#zone_erreur").addClass("code-echec coupon_code_cacher");

 }

function masquer_retour(id) {
 switch(id) {
 case '1':
     if ($("#panier").hasClass("step-blue")==true) {
         $("#retour_panier").hide()
     } else {
         $("#retour_panier").show()
     }
     break;
 case '2':
     if ($("#expedition").hasClass("step-blue")==true) {
         $("#retour_panier").hide()
     } else {
         $("#retour_panier").show()
     }
     break;
 default:
 }

}

// changer de carte de credit
function changeCarteAchat() {
 let id_card;
 let current_type_card = $('#current_type_card').val();

 console.log('Voici le type current', current_type_card)

 if (current_type_card == 'VISA') {
     id_card  = $('#current_credit_carte').val();
 }else if (current_type_card == 'MasterCard') {
     id_card  = $('#current_credit_carte-master').val();
 }

 let current_credit_card = $('#current_credit_carte').val();
 $.ajax({
     type: 'GET',
     url: '/get_credit_card-to-change',
     data: {id: id_card},
     success: function(response){
        let carte_credit = response.creditcards
        if (carte_credit['nom_carte'] == 'VISA') {
            let num_credit_card = carte_credit['numero_carte'];
            var lastfour = num_credit_card.substr(num_credit_card.length - 4); // => "Tabs1"
            $('#credit_proprio').text(carte_credit['nom_proprietaire'])
            $('#credit_numero-1').text('**** ' + lastfour)
            $('#credit_date_expire-1').text(carte_credit['date_expiration'])

        }else if (carte_credit['nom_carte'] == 'MasterCard') {
            let num_credit_card = carte_credit['numero_carte'];
            var lastfour = num_credit_card.substr(num_credit_card.length - 4); // => "Tabs1"
            $('#credit_proprio-m').text(carte_credit['nom_proprietaire'])
            $('#credit_numero-1-m').text('**** ' + lastfour)
            $('#credit_date_expire-1-m').text(carte_credit['date_expiration'])
        }
        console.log('La reponse est:', response)

        $('#modifCreditCardClient').modal('hide')
     }
 })

}


function open_number_phone_modal(type_service) {

    if (type_service == "AM") {
    $('#type_service').text('AirtelMoney')
    }else if (type_service == "MC") {
    $('#type_service').text('MoovMoney')
    }

    $('#mobileTypeService').val(type_service)
    $('#entrerNumeroTelephone').modal('show')

}

function payWithMobileService() {

let type_service = $('#mobileTypeService').val();
let numero_tel = $('#numero_telephone-client-2').val();

$.ajax({
 type: 'POST',
 url: '/pay_with_mobile_service',
 data: {type_service: type_service, num_tel: numero_tel},
 headers: {
     'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
 },
 success: function(response) {
    console.log('Vore reponse payement mobile est:', response);
    var nbre_actuel_commande = $('#nbr_commande').text();
    var nbre_article_panier = $('#nombre_produit_panier').text()
    var nbre_commade = parseInt(nbre_actuel_commande) + parseInt(nbre_article_panier)
    $('#nbr_commande').text(nbre_commade)

    if (response.STATUT == 200) {

    let ref_produit = response.REF
    let timerId = setInterval(() => {
    $.ajax({
    type: 'POST',
    url: '/check_pvit_callback_status',
    data: {ref_produit: ref_produit},
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    },
    success: function(response) {
        console.log('La reponse est:', response)
        if (response.status_payement == null) {
            console.log('Commande non reglé')
            clearInterval(timerId)
        }else if (response.status_payement == 200) {
            console.log('Commande payé avec succès')
        } else if(response.status_payement == 006) {
            console.log('Le payement de la commande a échoué, veillez réessayé')
        }
    }

    })
    }, 5000);

    setTimeout(() => {
        clearInterval(timerId)
        console.log('La transaction n\'a pas aboutit')
    }, 15000)
     }else {
         console.log('Votre demande de payement n\'pas aboutit, cause: ', response.MESSAGE)
     }

 }
})
}


function closePanierMobileV2() {
    console.log('You are closing here !')
    // $('#panier-main-mobile-section-id').addClass('input-none-panier-v2')
    $('#panier_version_v2').addClass('input-none-panier-v2')
}

function closePaniverV2() {
    window.localStorage.removeItem('adresse_invite')
    $('#panier_version_v2').addClass('input-none-panier-v2')
}

 </script>

