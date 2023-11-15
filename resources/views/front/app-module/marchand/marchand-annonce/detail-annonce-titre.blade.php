


    <style>
        @import url('https://fonts.googleapis.com/css2?family=Roboto&display=swap');
        .modal-content-detail-annonce-titre,
        .modal-body-detail-annonce-vente {
            height: 579px!important;
            width: 444px!important;
            border-radius: 6px;
            background-color: #FFFFFF;
            box-shadow: 0 5px 15px 0 rgba(0, 0, 0, 0.35);
            z-index: 10000;
        }

        .modal-body {
            margin: 0px;
            padding: 0px;
        }

        .modal-dialog-detail-annonce-titre {
            position: relative;
            top: 40px;
            margin-top: 0px !important;
            float: center;
            margin-left:250px;
            z-index: 10000;

        }

        .dtvente {
            overflow-y: scroll;
            white-space: nowrap;
            overflow-x: hidden;
        }

        div.dtvente {
            display: inline-block;
            float: none;
            width: 558px;
        }

        div.dtvente::-webkit-scrollbar {
            width: 5px;
            border-radius: 3px;
            background-color: #D8D8D8;
        }

        div.dtvente::-webkit-scrollbar-thumb {
            background: #9B9B9B;
            height: 20px;
            width: 3px;
            border-radius: 3px;
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

        #file {
            cursor: pointer;
        }

    </style>

<style>
    .left-image-preview-box {
        height: 579px;
        width: 122px;
        border-radius: 6px;
        background-color: #FFFFFF;
        box-shadow: 0 5px 15px 0 rgba(0,0,0,0.45);
        padding-top: 15px;
    }

    .left-image-preview-box-container {
        height: 549px;
        width: 92px;
        margin-left: 15px;
    }

    .img-p-1 {
        box-sizing: border-box;
        height: 92.34px;
        width: 92px;
        border: 1px solid #9B9B9B;
    }

    .nouveau-title-section {
        height: 24px;
        width: 414px;
        margin-left: 15px;
        margin-top: 15px;
    }

    .nombre-livraison-reference {
        height: 11px;
        width: 314px;
        display: flex;
        margin-left: 15px;
        margin-top: 10px;
    }

    .etoile-section {
        height: 12px;
        display: flex;
        margin-right: 5px;
    }
    .etoile-section div {
        height: 12px;
        width: 12.8px;
        position: relative;
    }

    .prix-caracteristique-p-section {
        height: 65px;
        width: 414px;
        background-color: #F5F5F5;
        margin-left: 15px;
        border-top:1px solid #9B9B9B;
        border-bottom:1px solid #9B9B9B;
        margin-top: 10px;
    }

    .line-red-p {
        box-sizing: border-box;
        border: 1px solid #D0021B;
        transform: rotate(45deg)
    }

    del {
        color: red;
        text-decoration: none;
        position: relative;
    }

    del::before {
      content: " ";
      display: block;
      width: 100px;
      border-top: 2px solid red;
      height: 12px;
      position: absolute;
      bottom: 2px;
      left: 120px;
      transform: rotate(-7deg);
    }

    .z-exp-1 {
        height: 29px;
        width: 414px;
        margin-left: 15px;
        display: flex; column-gap: 15px;
        margin-top: 5px
    }

    .z-exp-11 {
        box-sizing: border-box;
        height: 29px;
        width: 362px;
        border: 1px solid #D8D8D8;
        border-radius: 6px;
        background-color: #F5F5F5;
        display: flex;
        justify-content: flex-start;
        align-items: center
    }

    .z-exp-11 span {
        margin-left: 20px;
    }

    .z-exp-1-icones {
        height: 29px;
        width: 37px;
        border-radius: 6px;
        background-color: #D8D8D8;
        padding-left:12px;
        padding-top:8px;
    }

    .description-caracteristique-p {
        box-sizing: border-box;
        height: 62px;
        width: 415px;
        border: 1px solid #F8F8F8;
        border-radius: 6px;
        background-color: #F8F8F8;
        margin-left: 15px;
        margin-top: 15px;
        color: #000000;
        font-family: Roboto;
        font-size: 10px;
        letter-spacing: 0;
        line-height: 11px;
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

    .preview-prix-separator {
        color: #A4A4A4;
        font-family: Roboto;
        font-size: 30px;
        letter-spacing: 0;
        line-height: 13px;
        text-align: center;
        position: relative;
        top: 20px;
        margin-left: 10px;
    }

    .preview-prix-kilos {
        color: #191970;
        font-family: Roboto;
        font-size: 12px;
        font-weight: bold;
        letter-spacing: 0;
        line-height: 13px;
        /* text-align:center; */
        position: relative;
        top: 15px;
        margin-left: 10px;

    }

    .preview-article-retour {
        color: #191970;
        font-family: Roboto;
        font-size: 9px;
        font-weight: 500;
        letter-spacing: 0;
        line-height: 10px;
    }

    .preview-ref-text {
        color: #a4a4a4;
        font-family: Roboto;
        font-size: 10px;
        font-weight: 500;
        letter-spacing: 0;
        line-height: 12px;
    }

    .preview-ref-val {
        color: #191970;
        font-family: Roboto;
        font-size: 8px;
        font-weight: 500;
        letter-spacing: 0;
        line-height: 12px;
    }

    .preview-retour-24h {
        color: #191970;
        font-family: Roboto;
        font-size: 9px;
        font-weight: 500;
        letter-spacing: 0;
        line-height: 10px;
    }

    .preview-payment-cart {
        color: #191970;
        font-family: Roboto;
        font-size: 9px;
        font-weight: 500;
        letter-spacing: 0;
        line-height: 10px;
    }

    .preview-img-element-1 {
        height:82.3px;width:82px;
        background-color:#D8D8D8;
        border-radius:5px; margin-left: 4px; margin-top: 4px
    }

    .preview-annonce-titre {
        color: #191970;
        font-family: Roboto;
        font-size: 20px;
        font-weight: 500;
        letter-spacing: 0;
        line-height: 24px ;margin-top:-28px;
    }

</style>
<style>
    .preview-img-element-2 {
        height:82.3px;width:82px;background-color:#D8D8D8;border-radius:5px; margin-left: 4px; margin-top: 4px
    }

    .preview-img-element-3 {
        height:82.3px;width:82px;background-color:#D8D8D8;border-radius:5px; margin-left: 4px; margin-top: 4px
    }

    .preview-img-element-4 {
        height:82.3px;width:82px;background-color:#D8D8D8;border-radius:5px; margin-left: 4px; margin-top: 4px
    }

    .preview-img-element-5 {
        height:82.3px;width:82px;background-color:#D8D8D8;border-radius:5px; margin-left: 4px; margin-top: 4px
    }

    .preview-img-element-6 {
        height:82.3px;width:82px;background-color:#D8D8D8;border-radius:5px; margin-left: 4px; margin-top: 4px
    }

    .preview-livraison-number {
        color: #191970;
        font-family: Roboto;
        font-size: 10px;
        letter-spacing: 0;
        line-height: 11px;
    }
</style>
        <!-- The Modal -->


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js " integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM " crossorigin="anonymous "></script>


