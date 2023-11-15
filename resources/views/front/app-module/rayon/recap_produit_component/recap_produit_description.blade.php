<div class="messagerie-box none-messaboxesd msg-box-bis"  id="dessBox" style="margin-left: 0px !important">

    <button type="button" class="close-btn btn_cara_close" style="z-index: 15000; position:absolute; right: -16px; top: -18px" onclick="closeMessagerieBox2()">
        <img src="{{ asset('assets/images/close-btn.svg') }}" alt="">
    </button>

    <style>
        .init-carat-btn {
            height: 64px;
            width: 162px;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .valeur-caracteristiques {
            color: #191970;
        }

        .description-style-helper {
            padding: 3px;
            width: 315px;
            height: 500px;
            margin: 0px;
            height: 432px;
            width: 295px;
            color: #191970 !important;
            font-family: Roboto;
            font-size: 14px;
            font-weight: 300;
            letter-spacing: 0px !important;
            line-height: 18px !important;
        }

        #tab_caracteristiques {
            border: 1px solid #ccc;
            margin-top: 3px;
            border-radius: 0.6rem;
            overflow: hidden;
            background: #f8f8f8;
        }

    </style>


    <div class="flex-container">

    <div class="flex-items1 flex-items init-carat-btn" id="flex-items02" data-content="Karacteristique" >
        <span>Caracteristique</span>
        {{-- <p id="Cdesc" class="caracteristique-title-label" >Caracteristique</p> --}}
    </div>

    <div class="flex-items1 init-carat-btn" id="flex-items01"  data-content="Deskription" >
        <span>Description</span>
        {{-- <p  id="Pdesc"class="description-title-label">Description</p> --}}

    </div>
    </div>

    <div style="height:481px; width: 325px; margin-top: 5px; padding-left: 10px; padding-right: 10px; overflow-y: scroll; overflow-x:hidden">

        <div id="Karacteristique" class="none-messaboxe-old description-caracteristique-common" >
            <table  class="table table-striped " id="tab_caracteristiques" style="border: 1px solid #ccc; margin-top: 3px">
                <tbody id="TableContainer">

                </tbody>
            </table>
        </div>

        <div  style="width: 310px; overflow-y: auto; font-size: 14px; position: relative; margin-top: 3px">
            {{-- <p id="Deskription"></p> --}}
            <p rows="4" cols="20" class="description-style-helper description-caracteristique-common none-messaboxe" id="Deskription" style="padding: 3px; width: 305px; height: 500px; margin: 0px" readonly>

            </p>
        </div>

    </div>

    </div>
