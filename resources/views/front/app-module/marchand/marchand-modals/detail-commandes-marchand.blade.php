
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Roboto&display=swap');
        .modal-content-detail-commande,
        .modal-body-detail_commande {
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

        .modal-dialog-detail-commande {
            position: relative;
            height: 579px;
            left: -350px;
            top: 60px;
        }
        .mesBTN{
            box-sizing: border-box;
            height: 40px;
            width: 160px;
            border: 1px solid #D8D8D8;
            border-radius: 6px 6px 0 0;
            background-color: #FFFFFF;
            margin-left:5px;
            color: #191970;
            font-family: Roboto;
            font-size: 18px;
            font-weight: 500;
            letter-spacing: 0;
            line-height: 19px;
            padding-top: 10px;
            margin-top: 10px;
            padding-left:10px;
            border-bottom: transparent;
        }
        .mesBTN2{
            box-sizing: border-box;
            height: 40px;
            width: 233px;
            border: 1px solid #D8D8D8;
            border-radius: 6px 6px 0 0;
            background-color: #FFFFFF;
            margin-top: -40px;
            margin-left:168px;
            color: #191970;
            font-family: Roboto;
            font-size: 18px;
            font-weight: 500;
            letter-spacing: 0;
            line-height: 19px;
            padding-top: 10px;
            padding-left:10px;
            border-bottom: transparent;

        }

        .mesBTN-active {
            border: 1px solid #191970 !important;
            border-bottom: none !important;
        }

        .mesBTN-desable {
            opacity: 0.5 !important;
        }


        .maGdiv{
            box-sizing: border-box;
            height: 437px;
            width: 1202px;
            border: 1px solid #D8D8D8;
            border-radius: 0 6px 6px 6px;
            background-color: #FFFFFF;
            margin-left: 5px;

        }
        .entetecommande{
            box-sizing: border-box;
            height: 36px;
            width: 1200px;
            border-bottom: 1px solid #D8D8D8;
            border-radius: 0 6px 0 0;
            background-color: #F8F8F8;

        }
        .labelentetecommande{
            color: #191970;
            font-family: Roboto;
            font-size: 11px;
            letter-spacing: 0;
            line-height: 11px;
            margin-left: 20px;
            margin-top:12px;
        }
        .montabcommande{
            height: 60px;
            width: 1200px;
            border-bottom:1px solid #D8D8D8
        }
        .premierB{
            height: 59px;
            width: 109px;
            border-right: 1px solid #D8D8D8;
            background-color: #FFFFFF;
            padding-top:24px;
        }
         .deuxiemeB{
            box-sizing: border-box;
            height: 59px;
            width: 274px;
            margin-top:-59px;
            margin-left:109px;
            border-right: 1px solid #D8D8D8;
            background-color:#FFFFFF;
            padding-top:14px;

        }
        .troisiemeB{
            box-sizing: border-box;
            height: 59px;
            width: 275px;
            margin-top:-59px;
            margin-left:383px;
            border-right: 1px solid #D8D8D8;
            background-color: #FFFFFF ;
            padding-top: 17px;
        }
        .quatriemeB{
            box-sizing: border-box;
            height: 59px;
            width: 72px;
            margin-top:-59px;
            margin-left:658px;
            border-right: 1px solid #D8D8D8;
            background-color:#FFFFFF;
            padding-top: 23px;
        }
        .cinquiemeB{
            box-sizing: border-box;
            height: 59px;
            width: 110px;
            margin-top:-59px;
            margin-left:730px;
            border-right: 1px solid #D8D8D8;
            background-color:#FFFFFF;
            padding-top:23px;
        }
        .sixiemeB{
            box-sizing: border-box;
            height: 59px;
            width: 77px;
            margin-top:-59px;
            margin-left:840px;
            border-right: 1px solid #D8D8D8;
            background-color: #FFFFFF;
            padding-top: 19px;
            padding-left:21px;
        }
        .septiemeB{
            box-sizing: border-box;
            height: 59px;
            width: 180px;
            margin-top:-59px;
            margin-left:917px;
            border-right: 1px solid #D8D8D8;
            background-color:#FFFFFF;
            padding-top: 23px;
        }
        .huitiemeB{
            box-sizing: border-box;
            height: 59px;
            width: 100px;
            margin-top:-59px;
            margin-left:1097px;
            background-color:#FFFFFF;
            padding-top: 23px;
        }
        .contenu1{
            color: #191970;
            font-family: Roboto;
            font-size: 14px;
            font-weight: 500;
            letter-spacing: 0;
            line-height: 14px;
            text-align: center;
        }
        .boxcontenu2{
            box-sizing: border-box;
            height: 34px;
            width: 34px;
            border: 1px solid #9B9B9B;
            border-radius: 6px;
            background-color: #D8D8D8;
            margin-top:0px;
            margin-left:10px;
            display: flex;
            align-items: center;
        }
        .boxcontenu2a{
            box-sizing: border-box;
            height: 34px;
            width: 34px;
            border: 1px solid #9B9B9B;
            border-radius: 6px;
            background-color: #D8D8D8;
            margin-top:0px;
            margin-left:75px;
        }
        .boxcontenu2b{
            box-sizing: border-box;
            height: 34px;
            width: 34px;
            border: 1px solid #9B9B9B;
            border-radius: 6px;
            background-color: #D8D8D8;
            margin-top:-34px;
            margin-left:116px;
        }
        .boxcontenu2c{
            box-sizing: border-box;
            height: 34px;
            width: 34px;
            border: 1px solid #9B9B9B;
            border-radius: 6px;
            background-color: #D8D8D8;
            margin-top:-34px;
            margin-left:157px;
        }

        .boxcontenu2d{
            box-sizing: border-box;
            height: 34px;
            width: 34px;
            border: 1px solid #9B9B9B;
            border-radius: 6px;
            background-color: #D8D8D8;
            margin-top:0px;
            margin-left:34px;
        }

        .boxcontenu2e{
            box-sizing: border-box;
            height: 34px;
            width: 34px;
            border: 1px solid #9B9B9B;
            border-radius: 6px;
            background-color: #D8D8D8;
            margin-top:-34px;
            margin-left:75px;
        }
        .boxcontenu2f{
            box-sizing: border-box;
            height: 34px;
            width: 34px;
            border: 1px solid #9B9B9B;
            border-radius: 6px;
            background-color: #D8D8D8;
            margin-top:-34px;
            margin-left:116px;
        }
        .boxcontenu2g{
            box-sizing: border-box;
            height: 34px;
            width: 34px;
            border: 1px solid #9B9B9B;
            border-radius: 6px;
            background-color: #D8D8D8;
            margin-top:-34px;
            margin-left:157px;
        }
        .boxcontenu2h{
            box-sizing: border-box;
            height: 34px;
            width: 34px;
            border: 1px solid #9B9B9B;
            border-radius: 6px;
            background-color: #D8D8D8;
            margin-top:-34px;
            margin-left:198px;
        }
        .contenu2{
            color: #191970;
            font-family: Roboto;
            font-size: 14px;
            letter-spacing: 0;
            line-height: 16px;
            margin-top:14px;
            float: right;
            margin-right:20px;
            margin-top:-30px;

        }
        .contenu3a{
            color: #4A4A4A;
            font-family: Roboto;
            font-size: 14px;
            letter-spacing: 0;
            line-height: 14px;
            text-align: left;
            margin-left:15px;
        }
        .contenu3b{
            color: #9B9B9B;
            font-family: Roboto;
            font-size: 14px;
            letter-spacing: 0;
            line-height: 14px;
            margin-top:-14px;
            text-align: left;
            margin-left:15px;
        }
        .contenu4{
            color: #191970;
            font-family: Roboto;
            font-size: 14px;
            letter-spacing: 0;
            line-height: 14px;
            text-align: center;
        }
        .contenu5{
            color: #191970;
            font-family: Roboto;
            font-size: 14px;
            letter-spacing: 0;
            line-height: 14px;
            text-align: center;
        }
        .contenu7{
            color: #00B517;
            font-family: Roboto;
            font-size: 14px;
            font-weight: 500;
            letter-spacing: 0.31px;
            line-height: 14px;
            text-align: center;

        }
        .contenu7b{
            color: #D0021B;
            font-family: Roboto;
            font-size: 14px;
            font-weight: 500;
            letter-spacing: 0.31px;
            line-height: 14px;
            text-align: center;
        }
        .contenu7c{
            color: #FF9500;
            font-family: Roboto;
            font-size: 14px;
            font-weight: 500;
            letter-spacing: 0.31px;
            line-height: 14px;
            text-align: center;
        }
        .contenu8{
            color: #191970;
            font-family: Roboto;
            font-size: 14px;
            letter-spacing: 0;
            line-height: 14px;
            text-align: center;
        }
        .monscrollcom::-webkit-scrollbar {
            width: 5px;
            border-radius: 3px;
            background-color: #D8D8D8;
        }

        .monscrollcom::-webkit-scrollbar-thumb {
            background: #9B9B9B;
            height: 20px;
            width: 3px;
            border-radius: 3px;
        }

        a{
            text-decoration: none;
            cursor: pointer;
        }
        .monderoule1{
            height:340px;
            width:1190px;
            display: none;
            padding-top: 1px;

        }
        .infocliff{
            height: 159px;
            width: 190px;
            border: 1px solid #D8D8D8;
            border-radius: 6px;
            background-color: #FFFFFF;
            margin-top:10px;
            margin-left:8px;
        }
        .infoexpe{
            height: 159px;
            width: 190px;
            border: 1px solid #D8D8D8;
            border-radius: 6px;
            background-color: #FFFFFF;
            margin-top:4px;
            margin-left:8px;
        }
        .resumecom{
            box-sizing: border-box;
            height: 322px;
            width: 703px;
            background-color: #FFFFFF;
            border: 1px solid #D8D8D8;
            border-radius: 6px;
            margin-top:-322px;
            margin-left:208px;

        }
        .numerosuivi{
            box-sizing: border-box;
            height: 66px;
            width: 269px;
            border: 1px solid #D8D8D8;
            border-radius: 6px;
            background-color: #FFFFFF;

            margin-left:922px;
        }

        .cochesuivi{
            box-sizing: border-box;
            height: 246px;
            width: 269px;
            background-color: #FFFFFF;
            margin-top: 8px;
            margin-left:922px;
        }
        .textenteteinfo{
            box-sizing: border-box;
            height: 37px;
            width: 188px;
            border-bottom: 1px solid #D8D8D8;
            border-radius: 6px 6px 0 0;
            background-color: #F8F8F8;
            padding-top: 12px;
        }
        .penteteinfo{
            color: #9B9B9B;
            font-family: Roboto;
            font-size: 14px;
            font-weight: 500;
            letter-spacing: -0.34px;
            line-height: 14px;
            text-align: center;

        }
        .group3{
            height: 112px;
            width: 31px;
            border:1px solid #D8D8D8;
            border-radius:6px;
            margin-top:5px;
            margin-left:5px;
        }

        .textcolora4{
            color: #4A4A4A;
            font-family: Roboto;
            font-size: 14px;
            letter-spacing: -0.34px;
            line-height: 14px;
        }
        .petittextebleu{
            color: #191970;
            font-family: Roboto;
            font-size: 12px;
            letter-spacing: 0;
            line-height: 12px;
            text-align: center;
        }
        .texteresumecom{
            color: #191970;
            font-family: Roboto;
            font-size: 14px;
            font-weight: 500;
            letter-spacing: -0.34px;
            line-height: 14px;
            text-align: center;
        }
        .textcolorresume{
            color: #00B517;
            font-family: Roboto;
            font-size: 14px;
            font-weight: 500;
            letter-spacing: -0.34px;
            line-height: 14px;
            text-align: center;
        }
        .malignederesume{
            height: 60px;
            width: 701px;
            opacity: 0.95;
            border-bottom:1px solid #D8D8D8;
            padding-top:23px;
            background-color: #FFFFFF;

        }

        .detail-commande-hover-zone {
            height: 58px;
            width: 686px;
            color: #191970;
            background-color: rgba(255,255,255,.9);
            position: relative;
            display: flex;
            justify-content: center;
            align-content: center;
            align-items: center
        }
        #maligneresume1{
            display:none;
        }
        #maligneresume1B{
            display:none;
        }
        .malignederesume2{
            height: 60px;
            width: 701px;
            opacity: 0.95;
            background-color: #FFFFFF;
            border-bottom:1px solid #D8D8D8;
            padding-top:23px;
            padding-left:3px;
        }

           .checkcontenu{
            box-sizing: border-box;
            height: 59px;
            width: 25px;
            border-right: 1px solid #D8D8D8;
            background-color:#FFFF;
            margin-top:-23px;
            padding-top:16px;
           }
           .checkcommande{
               width:18px;
               height:18px;
               cursor: pointer;
               margin-left:2px;
              border-radius:3px;
           }

           .refcontenu{
            box-sizing: border-box;
            height: 58px;
            width: 110px;
            border-right: 1px solid #D8D8D8;
            background-color: #FFFFFF;
            margin-top: -58px;
            margin-left:25px;
            padding-top:23px;
           }
            .informationcontenu{
                box-sizing: border-box;
                height: 58px;
                width: 277px;
                border-right: 1px solid #D8D8D8;
                background-color: #FFFFFF;
                margin-top:-58px;
                margin-left:135px;
                padding-top:13px;
                               }
            .quantitecontenu{

                box-sizing: border-box;
                height: 58px;
                width: 72px;
                border-right: 1px solid #D8D8D8;
                background-color: #FFFFFF;
                margin-top:-58px;
                margin-left:412px;
                padding-top:23px;
            }
             .prixcontenu{
                box-sizing: border-box;
                height: 58px;
                width: 112px;
                border-right: 1px solid #D8D8D8;
                background-color: #FFFFFF;
                margin-top:-58px;
                margin-left:484px;
                padding-top:23px;
             }
             .prixtotalcontenu{
                box-sizing: border-box;
                height: 58px;
                width: 112px;

                background-color: #FFFFFF;
                margin-top:-58px;
                margin-left:596px;
                padding-top:23px;
             }
             .blockblur{
                height: 162px;
                width: 348px;
                border-radius: 6px;
                background-color: #FFFFFF;
                box-shadow: 0 5px 15px 0 rgba(0,0,0,0.5);
                z-index: 1;
                margin-top:-240px;
                margin-left:385px;
                display: none;
                position: relative;
                padding-top: 15px;
             }

             .blockblur-detail-command {
                height: 162px;
                width: 348px;
                border-radius: 6px;
                background-color: #FFFFFF;
                box-shadow: 0 5px 15px 0 rgba(0,0,0,0.5);
                z-index: 1;
                /* margin-top:-240px;
                margin-left:385px; */
                /* display: none; */
                position: relative;
                padding-top: 15px;
             }
             .commandeprete{
                color: #191970;
                font-family: Roboto;
                font-size: 21px;
                font-weight: 500;
                letter-spacing: 0;
                line-height: 21px;
                text-align: center;

             }
             .vousavezverifie{
                color: #191970;
                font-family: Roboto;
                font-size: 14px;
                font-weight: 300;
                letter-spacing: -0.34px;
                line-height: 15px;
                text-align: center;
                margin-top:-5px;

             }
             .mybtnvert{
                 margin-left:63px;
                 margin-top:33px;
             }
             .btnnon{
                box-sizing: border-box;
                height: 37px;
                width: 100px;
                border: 1px solid #D0021B;
                border-radius: 6px;
                background-color: #FFFFFF;
                color: #D0021B;
                font-family: Roboto;
                font-size: 14px;
                font-weight: 500;
                letter-spacing: 0.31px;
                line-height: 14px;
                text-align: center;

             }
             .btnoui{
                height: 37px;
                width: 100px;
                border-radius: 6px;
                background-color: #00B517;
                border:#00B517;
                color: #FFFFFF;
                font-family: Roboto;
                font-size: 14px;
                font-weight: 500;
                letter-spacing: 0.31px;
                line-height: 14px;
                margin-left:14px;
                text-align: center;

             }
             .commandeexped{
                box-sizing: border-box;
                height: 48px;
                width: 269px;
                border: 1px solid #FF9500;
                border-radius: 6px;
                background-color: #FFFFFF;
                margin-top:2px;
             }
             .commandeannul{
                box-sizing: border-box;
                height: 48px;
                width: 269px;
                border: 1px solid #D0021B;
                border-radius: 6px;
                background-color: #FFFFFF;
                margin-top:2px;
             }
             .commandelivr{
                box-sizing: border-box;
                height: 48px;
                width: 269px;
                border: 1px solid #FF9500;
                border-radius: 6px;
                background-color: #FFFFFF;
                margin-top:2px;
             }
             .commanderecue{
                box-sizing: border-box;
                height: 48px;
                width: 269px;
                border: 1px solid #00B517;
                border-radius: 6px;
                background-color: #FFFFFF;
                margin-top:2px;
             }
            .leftcommandeexpe{
                height: 47px;
                width: 48px;
                border-right: 1px solid #FF9500;
                border-radius: 6px 0 0 6px;

            }
            .leftcommandeannul{
                height: 47px;
                width: 48px;
                border-right: 1px solid #D0021B;
                border-radius: 6px 0 0 6px;

            }
            .leftcommandelivr{
                height: 47px;
                width: 48px;
                border-right:1px solid #FF9500;
                border-radius: 6px 0 0 6px;

            }
            .leftcommandeencours{
                height: 47px;
                width: 48px;
                border-right:1px solid #00B517;
                border-radius: 6px 0 0 6px;

            }
            .commandeexpetext{
                color: #FF9500;
                font-family: Roboto;
                font-size: 14px;
                font-weight: 500;
                letter-spacing: 0.31px;
                line-height: 14px;
                text-align: left;
                margin-left:58px;
               margin-top:-30px;
            }
            .commandeannultext{
                color: #D0021B;
                font-family: Roboto;
                font-size: 14px;
                font-weight: 500;
                letter-spacing: 0.31px;
                line-height: 14px;
                text-align: left;
                margin-left:58px;
                margin-top:-30px;

            }
            .commandelivrtext{
                color: #FF9500;
                font-family: Roboto;
                font-size: 14px;
                font-weight: 500;
                letter-spacing: 0.31px;
                line-height: 14px;
                text-align: left;
                margin-left:58px;
                margin-top:-30px;


            }
            .commandeencourstext{
                color: #00B517;
                font-family: Roboto;
                font-size: 14px;
                font-weight: 500;
                letter-spacing: 0.31px;
                line-height: 14px;
                text-align: left;
                margin-left:58px;
                margin-top:-30px;

            }

.unkown_over_lay-div-2 {
    position: fixed;
    display: none;
    width: 100%;
    height: 100%;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background-color: rgba(0,0,0,0.45);
    z-index: 2;
    border-radius:6px;
    display:none
}

.unkown_over_lay-div-2-detail {
    position: absolute;
    width: 100%;
    height: 100%;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background-color: rgba(0,0,0,0.45);
    z-index: 2;
    border-radius:6px;
    display: flex;
    justify-content: center;
    align-items: center;
}

.table-content-marchand {
  height: 405px;
  overflow-x: hidden;
  margin-top: -3px;
  border: 1px solid rgba(255, 255, 255, 0.3);
  position: relative;
  left: -1px;
}

.pas-de-commande-marchand {
    position: absolute;
    margin-top: 13%;
    margin-left: 33%;
}

#tab-marchand-commande td {
    padding-top: 10px;
    padding-bottom: 10px;
}

.table-content-helper {
    background-color: #fff;
    position: absolute;
    z-index: 1000;
    width: 1200px; left: 6px;
    /* display: flex; */
    /* column-gap: 10px; */
}

.btn-produit_rupture {
    box-sizing: border-box;
    height: 37px;
    width: 194px;
    border: 1px solid #D0021B;
    border-radius: 6px;
    background-color: #FFFFFF;

    color: #D0021B;
    font-family: Roboto;
    font-size: 16px;
    font-weight: 500;
    letter-spacing: 0.35px;
    line-height: 18px;
    text-align: center;
}

.btn-produit_disponible {
    height: 37px;
    width: 194px;
    border-radius: 6px;
    background-color: #00B517;
    border: transparent;

    color: #FFFFFF;
    font-family: Roboto;
    font-size: 16px;
    font-weight: 500;
    letter-spacing: 0.35px;
    line-height: 18px;
    text-align: center;
}

.text-color-prod-indisponible {
    color: #D0021B;
    font-family: Roboto;
    font-size: 14px;
    font-weight: 500;
    letter-spacing: -0.34px;
    line-height: 14px;
    text-align: center;
}

.btn-edit-prod-statut {
    position: absolute;
    float: right;
    right: 0px;
    margin-top: 11px;
}

    </style>

<style>
    .marchand-commande-commande-infos {
        box-sizing: border-box;
        height: 66px;
        width: 269px;
        border: 1px solid #D8D8D8;
        border-radius: 6px;
        background-color: #FFFFFF;
    }

    .date-livraison-detail {
        height: 32px;
        width: 267px;
        border-radius: 0 0 6px 6px;
        background-color: #F8F8F8;
        display: flex;
    }

    .date-livraison-detail span {
        height: 12px;
        width: 155px;
        color: #191970;
        font-family: Roboto;
        font-size: 12px;
        letter-spacing: 0;
        line-height: 12px;
        position: relative;
        top: 10px;
        left: 10px;
    }

    .numero-suivi-detail {
        height: 32px;
        /* width: 267px;s */
        border-radius: 6px 6px 0 0;
        background-color: #FFFFFF;
        display: flex
    }

    .numero-suivi-detail span {
        height: 12px;
        color: #191970;
        font-family: Roboto;
        font-size: 12px;
        letter-spacing: 0;
        line-height: 12px;
        text-align: center;
        position: relative;
        top: 10px;
        left: 10px;
    }

    .line-product-clonned {
        height: 58px;
        width: 1200px;
        opacity: 0.55;
        display: flex;
        justify-content: space-around;
        border: 1px solid #ccc;
        margin-bottom: 5px;
        align-items: center;
    }

    .detail-commande-prod-infos {
        display: flex;
        column-gap: 10px;
    }

    .clonned-col1, .clonned-col2, .clonned-col3,
    .clonned-col4, .clonned-col5, .clonned-col6, .clonned-col7, .clonned-col8 {
        height: 58px;
        display: flex;
        align-items: center;
        justify-content: center;
        border-right: 1px solid #ccc;
    }

    .marchand-commande-client-detail {
        box-sizing: border-box;
        height: 323px;
        width: 704px;
        border: 1px solid #D8D8D8;
        border-radius: 6px;
        background-color: #FFFFFF;
    }

    .detail-prod-body {
        height: 257px;
        overflow-x: hidden;
        border: 1px solid rgba(255, 255, 255, 0.3);
        position: relative;
        left: -1px;
        overflow-y: auto;
        width: 705px;
    }

    .detail-resumer-commande {
        height: 30.5px;
        width: 100%;
        /* background-color: #ccc */
        color: #191970;
        font-family: Roboto;
        font-size: 14px;
        font-weight: 500;
        letter-spacing: -0.34px;
        line-height: 14px;
        text-align: center;
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .marchand-commande-type-handle:hover{
        cursor: pointer;
    }

    .marchand-line-commande-hover:hover {
        cursor: pointer;
    }

    .line-product-clonned:hover {
        cursor: pointer;
    }

    .marchand-commandes-table-header {
        box-sizing: border-box;
        height: 36px;
        width: 1202px;
        border: 1px solid #D8D8D8;
        border-radius: 0 6px 0 0;
        background-color: #F8F8F8;
    }

    #tab-marchand-commande-historique td {
        padding-top: 10px;
        padding-bottom: 10px;
    }

    .detail-commande-hover-zone-historique {
        height: 58px;
        width: 686px;
        color: #191970;
        background-color: rgba(255,255,255,.5);
        position: relative;
        display: flex;
        justify-content: center;
        align-content: center;
        align-items: center;
    }

    .test-commande-sound {
        width: 182px;
        position: absolute;
        margin-top: 102px;
        margin-left: 417px;
        border: transparent;
        border-radius: 6px;
    }

</style>

</head>

<body>


<div class="modal modal-marchand-close" id="commandedet">
    <div class="modal-dialog modal-dialog-detail-commande">
    <div class="modal-content modal-content-detail-commande">


    <div style="margin-top:5px;">

    @include('front.app-module.marchand.marchand-modals.marchand-profil-data')
    <div style="border:1px solid #D8D8D8;border-radius: 5px;margin-top:-80px;position: absolute;margin-left: 334px; width:873px;height: 80px;background-color: white; display: flex; flex-direction: column; justify-content: center; align-items: center">
        {{-- @include('front.app-module.marchand.marchand-modals.menu-modal-marchand') --}}

        {{-- Menu --}}
        @auth
@if (\Illuminate\Support\Facades\Auth::user()->role == 2)

    <div class="historique-code" id="gerer-equipe-menu">
        <li data-id="infomarch" class="marie" style="margin-left:0px;"><img src="assets/images/icones-vendeurs2/icones-menu/info-marche.svg"><br><br><p style="margin-top:3px">Info. du <br> marché</p></li>
        <li  data-id="gererEquipe" class="marie" ><img src="assets/images/icones-vendeurs2/icones-menu/gestionequipe.svg"><br><br><p style="margin-top:2px">Gestion d'équipe</p></li>
        <li  class="marie"><img src="assets/images/icones-vendeurs2/icones-menu/gestionstock.svg"><br><br><p style="margin-top:2px">Gestion <br>de  stocks</p></li>
        <li data-id="msgMarchand" class="marie"><img src="assets/images/icones-vendeurs2/icones-menu/messagerie.svg"><br><br><br><p style="margin-top:2px">Messagerie</p></li>
        <li data-id="commandedet" class="marie" style="color: #1A7EF5;border:1px solid #1A7EF5;background-color:#F8F8F8">
            <span class="marchand-commande-counter" id="marchand-commande-counter_id_1"></span>
            <img src="assets/images/icones-vendeurs2/icones-menu/commandebleu.svg"><br><br>
            <p style="margin-top:3px">Mes <br>commandes</p></li>
        <li  data-id="modePaiementMarchand1" style="margin-bottom" class="marie"><img src="assets/images/icones-vendeurs2/icones-menu/paiement.svg" ><br><p style="margin-top:15px;">Mode de <br> paiements<p></li>
        <li data-id="tbMarchand" class="marie"><img src="assets/images/icones-vendeurs2/icones-menu/gestion.svg"><br><br><p style="margin-top:2px">Tableau <br>de gestions</p></li>
        <li  data-id="historiqueCode" data-id="genererCode" class="marie"><img src="assets/images/icones-vendeurs2/icones-menu/codepromo.svg"><br><br><p style="margin-top:2px">Historique <br>de codes</p></li>
        <li  data-id="nouvellePromo" class="marie"><img src="assets/images/icones-vendeurs2/icones-menu/promo.svg"><br><br><p style="margin-top:2px">Créer<br>une promo</p></li>
        <li  data-id = "articleCorbeille" class="marie"  ><img src="assets/images/icones-vendeurs2/icones-menu/corbeille.svg"><br><br><br><p style="margin-top:2px">Corbeille</p></li>
        <li  data-id="gestMenu" class="marie"><img src="assets/images/icones-vendeurs2/icones-menu/gestionmenu.svg"><br><br><p style="margin-top:2px">Gestion <br>des menus</p></li>

    </div>
@elseif (\Illuminate\Support\Facades\Auth::user()->role == 4) {{-- Editeur --}}
    <div class="historique-code" id="gerer-equipe-menu">
        <li data-id="infomarch" class="marie" style="margin-left:0px;"><img src="assets/images/icones-vendeurs2/icones-menu/info-marche.svg"><br><br>Info. du <br> marché</li>
        <li  data-id="gererEquipe" class="marie" style="pointer-events:none;opacity:0.6;"><img src="assets/images/icones-vendeurs2/icones-menu/gestionequipe.svg"><br><br>Gestion d'équipe</li>
        <li  class="marie" style="pointer-events:none;opacity:0.6;"><img src="assets/images/icones-vendeurs2/icones-menu/gestionstock.svg"><br><br>Gestion <br>de stocks</li>
        <li data-id="msgMarchand"  class="marie" style="pointer-events:none;opacity:0.6;"><img src="assets/images/icones-vendeurs2/icones-menu/messagerie.svg"><br><br><br>Messagerie</li>
        <li  class="marie"><img src="assets/images/icones-vendeurs2/icones-menu/commandebleu.svg"><br><br>Mes<br> commandes</li>
        <li  data-id="modePaiementMarchand1" class="marie" style="pointer-events:none;opacity:0.6;"><img src="assets/images/icones-vendeurs2/icones-menu/paiement.svg" ><br><br><br>Mode de <br>paiements</li>
        <li data-id="tbMarchand" class="marie" ><img src="assets/images/icones-vendeurs2/icones-menu/gestion.svg"><br><br>Tableau <br>de gestions</li>
        <li  data-id="historiqueCode" data-id="genererCode" class="marie" style="pointer-events:none;opacity:0.6;"><img src="assets/images/icones-vendeurs2/icones-menu/codepromo.svg"><br><br>Historique <br>de codes</li>
        <li  data-id="nouvellePromo" class="marie"><img src="assets/images/icones-vendeurs2/icones-menu/promo.svg"><br><br>Créer <br> une promo</li>
        <li  data-id = "articleCorbeille" class="marie"><img src="assets/images/icones-vendeurs2/icones-menu/corbeille.svg"><br><br><br>Corbeille</li>
        <li  data-id="gestMenu" class="marie"><img src="assets/images/icones-vendeurs2/icones-menu/gestionmenu.svg" style="pointer-events:none;opacity:0.6;"><br><br>Gestion <br>des menus</li>
    </div>
@elseif (\Illuminate\Support\Facades\Auth::user()->role == 5) {{-- Demarcheur --}}
    <div class="historique-code" id="gerer-equipe-menu">
        <li data-id="infomarch" class="marie" style="margin-left:0px;"><img src="assets/images/icones-vendeurs2/icones-menu/info-marche.svg"><br><br>Info.du <br> marché</li>
        <li  data-id="gererEquipe" class="marie" style="pointer-events:none;opacity:0.6;"><img src="assets/images/icones-vendeurs2/icones-menu/gestionequipe.svg"><br><br>Gestion d'équipe</li>
        <li  class="marie" style="pointer-events:none;opacity:0.6;"><img src="assets/images/icones-vendeurs2/icones-menu/gestionstock.svg"><br><br>Gestion <br>de stocks</li>
        <li data-id="msgMarchand"  class="marie" style="color: #1A7EF5"><img src="assets/images/icones-vendeurs2/icones-menu/messagerie.svg"><br><br><br>Messagerie</li>
        <li  class="marie" style="pointer-events:none;opacity:0.6;"><img src="assets/images/icones-vendeurs2/icones-menu/commandebleu.svg"><br><br>Mes <br>commandes</li>
        <li  data-id="modePaiementMarchand1" class="marie" style="pointer-events:none;opacity:0.6;"><img src="assets/images/icones-vendeurs2/icones-menu/paiement.svg" ><br><br><br>Mode de <br>paiements</li>
        <li data-id="tbMarchand" class="marie" style="pointer-events:none;opacity:0.6;"><img src="assets/images/icones-vendeurs2/icones-menu/gestion.svg"><br><br>Tableau <br>de gestions</li>
        <li  data-id="historiqueCode" data-id="genererCode" class="marie"><img src="assets/images/icones-vendeurs2/icones-menu/codepromo.svg"><br><br>Historique <br>de codes</li>
        <li  data-id="nouvellePromo" class="marie" style="pointer-events:none;opacity:0.6;"><img src="assets/images/icones-vendeurs2/icones-menu/promo.svg"><br><br>Créer <br>une promo</li>
        <li  data-id = "articleCorbeille" class="marie" style="pointer-events:none;opacity:0.6;"><img src="assets/images/icones-vendeurs2/icones-menu/corbeillebleu.svg"><br><br><br>Corbeille</li>
        <li  data-id="gestMenu" class="marie" style="pointer-events:none;opacity:0.6;"><img src="assets/images/icones-vendeurs2/icones-menu/gestionmenu.svg"><br><br>Gestion <br>des menus</li>
    </div>
@elseif (\Illuminate\Support\Facades\Auth::user()->role == 6) {{-- Membre --}}
    <div class="historique-code" id="gerer-equipe-menu">
        <li data-id="infomarch" class="marie" style="color: #1A7EF5;margin-left:0px;"><img src="assets/images/icones-vendeurs2/icones-menu/info-marche.svg"><br><br>Info.<br> du marché</li>
        <li  data-id="gererEquipe" class="marie" style="pointer-events:none;opacity:0.6;"><img src="assets/images/icones-vendeurs2/icones-menu/gestionequipe.svg"><br><br>Gestion d'équipe</li>
        <li  class="marie" style="pointer-events:none;opacity:0.6;"><img src="assets/images/icones-vendeurs2/icones-menu/gestionstock.svg"><br><br>Gestion <br>de stocks</li>
        <li data-id="msgMarchand"  class="marie" style="pointer-events:none;opacity:0.6;"><img src="assets/images/icones-vendeurs2/icones-menu/messagerie.svg"><br><br><br>Messagerie</li>
        <li  class="marie" style="pointer-events:none;opacity:0.6;"><img src="assets/images/icones-vendeurs2/icones-menu/commandebleu.svg"><br><br>Mes<br> commandes</li>
        <li  data-id="modePaiementMarchand1" class="marie" ><img src="assets/images/icones-vendeurs2/icones-menu/paiement.svg" ><br><br><br>Mode <br>de paiements</li>
        <li data-id="tbMarchand" class="marie" style="pointer-events:none;opacity:0.6;"><img src="assets/images/icones-vendeurs2/icones-menu/gestion.svg"><br><br>Tableau <br>de gestions</li>
        <li  data-id="historiqueCode" data-id="genererCode" class="marie" style="pointer-events:none;opacity:0.6;"><img src="assets/images/icones-vendeurs2/icones-menu/codepromo.svg"><br><br>Historique <br>de codes</li>
        <li  data-id="nouvellePromo" class="marie" style="pointer-events:none;opacity:0.6;"><img src="assets/images/icones-vendeurs2/icones-menu/promo.svg"><br><br>Créer <br>une promo</li>
        <li  data-id = "articleCorbeille" class="marie" style="pointer-events:none;opacity:0.6;"><img src="assets/images/icones-vendeurs2/icones-menu/corbeillebleu.svg"><br><br><br>Corbeille</li>
        <li  data-id="gestMenu" class="marie" style="pointer-events:none;opacity:0.6;"><img src="assets/images/icones-vendeurs2/icones-menu/gestionmenu.svg"><br><br>Gestion <br>des menus</li>
    </div>
@elseif (\Illuminate\Support\Facades\Auth::user()->role == 7) {{-- Gérant --}}
<div class="historique-code" id="gerer-equipe-menu">
    <li data-id="infomarch" class="marie" style="margin-left:0px;"><img src="assets/images/icones-vendeurs2/icones-menu/info-marche.svg" style="color: #1A7EF5"><br><br>Info. du <br>marché</li>
    <li  data-id="gererEquipe" class="marie" style="pointer-events:none;opacity:0.6;"><img src="assets/images/icones-vendeurs2/icones-menu/gestionequipe.svg"><br><br>Gestion d'équipe</li>
    <li  class="marie"><img src="assets/images/icones-vendeurs2/icones-menu/gestionstock.svg"><br><br>Gestion <br>de  stocks</li>
    <li data-id="msgMarchand"  class="marie"><img src="assets/images/icones-vendeurs2/icones-menu/messagerie.svg"><br><br><br>Messagerie</li>
    <li  class="marie"><img src="assets/images/icones-vendeurs2/icones-menu/commandebleu.svg"><br><br>Mes <br>commandes</li>
    <li  data-id="modePaiementMarchand1" class="marie"><img src="assets/images/icones-vendeurs2/icones-menu/paiement.svg" ><br><br><br>Mode <br> de paiements</li>
    <li data-id="tbMarchand" class="marie"><img src="assets/images/icones-vendeurs2/icones-menu/gestion.svg"><br><br>Tableau <br>de gestions</li>
    <li  data-id="historiqueCode" data-id="genererCode" class="marie"><img src="assets/images/icones-vendeurs2/icones-menu/codepromo.svg"><br><br>Historique <br> de codes</li>
    <li  data-id="nouvellePromo" class="marie"><img src="assets/images/icones-vendeurs2/icones-menu/promo.svg"><br><br>Créer <br>une promo</li>
    <li  data-id = "articleCorbeille" class="marie" style="color: #1A7EF5;border:1px solid #1A7EF5;background-color:#F8F8F8"><img src="assets/images/icones-vendeurs2/icones-menu/corbeillebleu.svg"><br><br><br>Corbeille</li>
    <li  data-id="gestMenu" class="marie"><img src="assets/images/icones-vendeurs2/icones-menu/gestionmenu.svg"><br><br>Gestion <br>des menus</li>
</div>
@else
    <div class="historique-code" id="gerer-equipe-menu">
        <li data-id="infomarch" class="marie" style="color: #1A7EF5;margin-left:0px;"><img src="assets/images/icones-vendeurs2/icones-menu/info-marche.svg"><br><br>Info. du<br> marché</li>
        <li  data-id="gererEquipe" class="marie" style="pointer-events:none;opacity:0.6;"><img src="assets/images/icones-vendeurs2/icones-menu/gestionequipe.svg"><br><br>Gestion d'équipe</li>
        <li  class="marie" style="pointer-events:none;opacity:0.6;"><img src="assets/images/icones-vendeurs2/icones-menu/gestionstock.svg"><br><br>Gestion <br>de stocks</li>
        <li data-id="msgMarchand"  class="marie" style="pointer-events:none;opacity:0.6;"><img src="assets/images/icones-vendeurs2/icones-menu/messagerie.svg"><br><br><br>Messagerie</li>
        <li  class="marie" style="pointer-events:none;opacity:0.6;"><img src="assets/images/icones-vendeurs2/icones-menu/commandebleu.svg"><br><br>Mes <br> commandees</li>
        <li  data-id="modePaiementMarchand1" class="marie" style="pointer-events:none;opacity:0.6;"><img src="assets/images/icones-vendeurs2/icones-menu/paiement.svg" ><br><br><br>Mode de <br> paiements</li>
        <li data-id="tbMarchand" class="marie" style="pointer-events:none;opacity:0.6;"><img src="assets/images/icones-vendeurs2/icones-menu/gestion.svg"><br><br>Tableau <br> de gestions</li>
        <li  data-id="historiqueCode" data-id="genererCode" class="marie" style="pointer-events:none;opacity:0.6;"><img src="assets/images/icones-vendeurs2/icones-menu/codepromo.svg"><br><br>Historique<br> de codes</li>
        <li  data-id="nouvellePromo" class="marie" style="pointer-events:none;opacity:0.6;"><img src="assets/images/icones-vendeurs2/icones-menu/promo.svg"><br><br>Créer <br>une promo</li>
        <li  data-id = "articleCorbeille" class="marie" style="pointer-events:none;opacity:0.6;"><img src="assets/images/icones-vendeurs2/icones-menu/corbeillebleu.svg"><br><br><br>Corbeille</li>
        <li  data-id="gestMenu" class="marie" style="pointer-events:none;opacity:0.6;"><img src="assets/images/icones-vendeurs2/icones-menu/gestionmenu.svg"><br><br>Gestion <br> des menus</li>
    </div>
@endif
@endauth


 </div>

</div>

{{-- BOUTONS MES COMMANDES /HISTORIQUES --}}

<div class="mesBTN marchand-commande-type-handle mesBTN-active" data-id="commande-recu-zone-id">
    Mes commandes
</div>

<div class="mesBTN2 marchand-commande-type-handle mesBTN-desable" data-id="commande-historique-zone-id">
    Historique de commande
</div>

{{-- <button class="test-commande-sound" onclick="playSound()"> Test Commande</button> --}}

<div class="maGdiv" id="commande-recu-zone-id">
    @include('front.app-module.marchand.marchand-files-helpers.commande_recu')
 </div>

 <div class="maGdiv field-none" id="commande-historique-zone-id">
    @include('front.app-module.marchand.marchand-files-helpers.historique-commandes')
 </div>



        </div>
    </div>

    </div>





    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js " integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM " crossorigin="anonymous "></script>

    <script type="text/javascript ">
    </script>
<script>

function detcom(){
    $("#line1").css({"opacity":"0.5","pointer-events":"none"});
    $("#line2").hide();
    $("#line3").hide();
    $("#monderoule1").show();
}

function detcom2(){
    $("#line2").css({"opacity":"0.5","pointer-events":"none"});
    $("#line1").hide();
    $("#line3").hide();
    $("#monderoule2").show();
}

function validecommande(){
    $("#maligneresume1").show();
    $("#maligneresume2").hide();
}

function validecommande1(){
    $("#maligneresume1B").show();
    $("#maligneresume2B").hide();
    $("#resumecom1").css({"filter":" blur(1px)","-webkit-backdrop-filter": "blur(3px)"});
    $("#overlay").show();
    $("#blockblur1").show();
    $("#numerosuivi").css("margin-top","-243px");
}

function validecommande2A(){
    $("#maligneresume1A").show();
    $("#maligneresume2A").hide();
}

function validecommande2B(){
    $("#maligneresume1BB").show();
    $("#maligneresume2BB").hide();
}

function validecommande2C(){
    $("#maligneresume1C").show();
    $("#maligneresume2C").hide();
}

function validecommande2D(){
    $("#maligneresume1D").show();
    $("#maligneresume2D").hide();
}

function commandenonvalide(){
    $("#maligneresume1").hide();
    $("#maligneresume2").show();
    $("#maligneresume1B").hide();
    $("#maligneresume2B").show();
    $("#blockblur1").hide();
    $("#resumecom1").css({"filter":" none","background":"white"});
    $("#numerosuivi").css("margin-top","-322px");
    $("#overlay").hide();
}

function commandeouivalide(){
    $("#maligneresume1").show();
    $("#maligneresume2").hide();
    $("#maligneresume1B").show();
    $("#maligneresume2B").hide();
    $("#blockblur1").hide();
    $("#resumecom1").css({"filter":" none","background":"white"});
    $("#numerosuivi").css("margin-top","-322px");
    $("#overlay").hide();

    $("#commandeexpe2").show();
    $("#encoursdeT").show();
    $("#commandelivr1").hide();
}

function closeDetailCommandePanel() {
    $('#detail-commande-marchant').addClass('field-none')
}

function closeHistoriqueDetailCommandePanel() {
    $('#detail-commande-marchant-historique').addClass('field-none')
}

$(document).ready(function(){

$('.marchand-commande-type-handle').on('click', function() {

var data_id = $(this).attr('data-id')
$('.maGdiv').addClass('field-none')
$('#'+data_id).removeClass('field-none')

$('.marchand-commande-type-handle').removeClass('mesBTN-active')
$('.marchand-commande-type-handle').addClass('mesBTN-desable')

$(this).removeClass('mesBTN-desable')
$(this).addClass('mesBTN-active')

if (data_id == 'commande-historique-zone-id') {
    console.log('Here you clicked history command !!!')
    $.ajax({
    type: 'GET',
    url: '/get_all_marchand_command_accepeted',
    data: {},
    success: function(response) {

    console.log('All commande here:', response)

    $('#tab-marchand-commande-historique').empty()

    if (response.length > 0) {

    var tab_marchand_commande = [];

    for (let c = 0; c < response.length; c++) {

    var mode_pay;

    if (response[c].mode_payement == 'AirtelMoney') {
        mode_pay = '/assets/images/icons/AirtelMoney.svg'
    }else if (response[c].mode_payement == 'MoovMoney') {
        mode_pay = '/assets/images/icones-vendeurs2/Moovmoney.svg'
    }

    tab_marchand_commande += '<tr class="marchand-line-commande-hover" onclick=showMarchandCommandDetailsHistotique("'+response[c].id+'","'+response[c].ref_commande+'") id="commande-line-'+response[c].id+'">'

    tab_marchand_commande += '<td>'+response[c].ref_commande+'</td>'

    var commande_produits = response[c].commande_produit

    if (commande_produits.length == 1) {

    tab_marchand_commande += '<td><div>'
    tab_marchand_commande += '<div class="boxcontenu2" style="background-color: #fff; border: none"><img src="/'+commande_produits[0].image+'" style="max-height:45px" /></div>'
    tab_marchand_commande += '<p class="contenu2" style="margin-bottom: 0px !important" >'+commande_produits[0].libelle+'</p>'
    tab_marchand_commande += '</div></td>'

    }else {

    tab_marchand_commande += '<td><div style="display: flex; align-items: center; justify-content: center;">'
    tab_marchand_commande += '<div class="boxcontenu2" style="background-color: #fff; border: none;"><img src="'+commande_produits[0].image+'" style="max-height:45px" /></div>'

    var left_val = 0;
    for (let pc = 1; pc < commande_produits.length; pc++) {
        left_val += 10;
        tab_marchand_commande += '<div class="boxcontenu2" style="background-color: #fff; border: none; position:relative; left: -'+left_val+'px; margin-left: 0px"><img src="'+commande_produits[pc].image+'" style="max-height:45px" /></div>'
    }

    tab_marchand_commande += '</div></td>'

    }

    tab_marchand_commande += '<td style=" width: 278px;"><div>'
    tab_marchand_commande += '<p class="contenu3a">'+response[c].nom+ ' '+response[c].prenom+'</p>'
    tab_marchand_commande += '<p class="contenu3b" style="margin-bottom: 0px !important">'+response[c].email+'</p>'
    tab_marchand_commande += '</div></td>'

    tab_marchand_commande += '<td style="width:72px">'+response[c].nombre_article+'</td>'

    tab_marchand_commande += '<td>'+response[c].totaf_facturation+' Fcfa</td>'

    tab_marchand_commande += '<td><div>'
    tab_marchand_commande += '<img src="'+mode_pay+'">'
    tab_marchand_commande += '</div></td>'

    if (response[c].status_code_commande == 0) {
        tab_marchand_commande += '<td id="status_de_la_commande'+response[c].ref_commande+'" style="color: green">'+response[c].status_commande+'</td>'
    }else if(response[c].status_code_commande == 1) {
        tab_marchand_commande += '<td id="status_de_la_commande'+response[c].ref_commande+'" style="color: red">'+response[c].status_commande+'</td>'
    }else if(response[c].status_code_commande == 2) {
        tab_marchand_commande += '<td id="status_de_la_commande'+response[c].ref_commande+'" style="color: orange">'+response[c].status_commande+'</td>'
    }


    tab_marchand_commande+= '<td>'+response[c].date_commande+'</td>'

    tab_marchand_commande += '</tr>'

    }

    $('#tab-marchand-commande-historique').append(tab_marchand_commande)

    }
        console.log('All Marchand order here', response)
    }

    })
    }else if (data_id == "commande-recu-zone-id") {
            console.log('Nous sommes dans les commandes reçus')
            $('#commande-en-traitement-statut-running').removeClass('field-none')
            $('#commande-en-traitement-statut').addClass('field-none')
            $('#commande-expedier-statut').addClass('field-none')
            $('#commande-encours-livraison-running').addClass('field-none')
        }
    })

})

function closeCommandeValidation() {

    $("#overlay-detail-commande-marchand").addClass('field-none');

}

function playSound() {
    console.log('The sound is here')
    var mp3_sound = "/assets/mp3/beep-06.mp3"
    var audio = new Audio(mp3_sound);
    audio.play();
}
    </script>

