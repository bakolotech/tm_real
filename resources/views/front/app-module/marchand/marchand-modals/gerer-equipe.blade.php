
<head>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Roboto&display=swap');
        .modal-content-gerer-equipe,
        .modal-body-gerer-equipe {
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

        .modal-dialog-gerer-equipe {
            position: relative;
            height: 579px;
            left: -350px;
            top: 60px;
        }

        .scroll {
            overflow-y: scroll;
            white-space: nowrap;
            overflow-x: hidden;
        }

        div.scroll {
            display: inline-block;
            float: none;
            height: 398px!important;
            width:840px!important;
            margin-left: 0px;
        }

        div.scroll::-webkit-scrollbar {
            width: 5px;
            border-radius: 3px;
            background-color: #D8D8D8;

        }

        div.scroll::-webkit-scrollbar-thumb {
            background: #9B9B9B;
            height: 80px;
            width: 3px;
            border-radius: 3px;
        }
        /* scroll2 */

        .scroll2 {
            overflow-y: scroll;
            white-space: nowrap;
            overflow-x: hidden;
        }

        div.scroll2 {
            display: inline-block;
            float: none;
            height: 146px!important;
            width: 360px;
            margin-left:-15px;
        }

        div.scroll2::-webkit-scrollbar {
            width: 4px;
            border-radius: 3px;
            background-color: #D8D8D8;
            display:none;
        }

        div.scroll2::-webkit-scrollbar-thumb {
            background: #9B9B9B;
            height: 30px;
            width: 3px;
            border-radius: 3px;
            display: none;
        }

         /* scroll3 */

         .scroll3 {
            overflow-y: scroll;
            white-space: nowrap;
            overflow-x: hidden;
        }

        div.scroll3 {
            display: inline-block;
            float: none;
            height: 240px!important;
            width: 340px;
        }

        div.scroll3::-webkit-scrollbar {
            width: 4px;
            border-radius: 3px;
            background-color: #D8D8D8;
        }

        div.scroll3::-webkit-scrollbar-thumb {
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

        #forme {
            color: #1A7EF5;
            font-family: Roboto;
            font-size: 14px;
            letter-spacing: 0;
            line-height: 13px;
            text-align: center;
        }

        .head-left-mask {
            box-sizing: border-box;
            height: 79px;
            width: 79px;
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
        .p-rect-corps-right {
            height: 18px;
            width: 120px !important;
            border-radius: 6px;
            background-color: #1A7EF5;
            margin-left: 100px;
            margin-top:-10px;
            padding-left:8px;
            padding-top: 2px;
        }

        .quel-plaisir-de-vous {
            height: 22px;
            width: 205px;
            color: #191970;
            font-family: Roboto;
            font-size: 18px;
            font-weight: 300 !important;
            letter-spacing: 0;
            line-height: 18px;
            margin-bottom: 12px;
            margin-left: 100px;
            margin-top: -72px!important;
        }
        .proprio {
            height: 16px;
            /* width: 51px; */
            color: #FFFFFF;
            font-family: Roboto;
            font-size: 14px;
            font-weight: 500;
            letter-spacing: 0;
            line-height: 16px;
            text-align: center;
            margin-left:2px;

        }


    tr.chill:nth-child(even) {background:#FFF;}
    tr.chill:nth-child(odd) {background: #F8F8F8;}

    .dropbtn {
        background-color:transparent;
        background-image: url('assets/images/icones-vendeurs2/three-dots.svg');
        background-repeat:no-repeat;
        background-size: 18px;
        border: none;

        margin-top:10px;
        cursor: pointer;
        width: 30px;
        height: 40px;

        text-align: left;
        margin-left:-45px;

        padding: 16px;
        font-size: 16px;
    }

.dropdown {
  position: relative;
  display: inline-block;
  border-radius: 5px;
}

.dropdown-content {
    display: none;
    position: absolute;
    background-color: white !important;
    min-width: 180px;
    box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
    margin-left: -200px;
    margin-top:-25px;
    border-radius: 5px;
    padding:6px;
    border: 1px solid #9B9B9B;
}

.dropdown-content a {
     padding: 8px 8px;
    text-decoration: none;
    display: block;
    font-size: 12px;
    height: 27px;
    color: #191970;
   font-family: Roboto;
   font-size: 12px;
   letter-spacing: 0;
   line-height: 14px;
    background-color: white;
}

.dropdown-content a:hover {
    background-color:#F8F8F8;
        border-radius:6px;
    }

.show {display: block;}
    </style>
    <script>
        function myFunctionForDropDown() {
            document.getElementById("myDropdown").classList.toggle("show");
        }

        function myFunctionForDropDown2() {
            document.getElementById("myDropdown2").classList.toggle("show");
        }

        // Close the dropdown if the user clicks outside of it
        window.onclick = function(event) {
            if (!event.target.matches('.dropbtn')) {
                var dropdowns = document.getElementsByClassName("dropdown-content");
                var i;
                for (i = 0; i < dropdowns.length; i++) {
                    var openDropdown = dropdowns[i];
                    if (openDropdown.classList.contains('show')) {
                        openDropdown.classList.remove('show');
                    }
                }
            }
        }

        function RenvoieInviter(id){
            let urlform = $("#form-envoie-notification").attr('action')
            $.ajax({
                type: "GET",
                url: "/liste/collabo/"+ id,
                data: "",
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                success: function(response){
                    let renvoyer = "nouveau"
                    let mail_collabo = response.mail_collabo
                    $.ajax({
                        type: "POST",
                        url: urlform,
                        data: {email_destinataire_notif: mail_collabo, revoie:renvoyer},
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        success: function(response){
                            console.log("Notif envoyer avec succes")
                        },
                        error: function(xhr){
                            console.log("une erreur est survenue : "+ xhr.responseText)
                        }
                    })
                },
                error: function(xhr){
                    console.log("une erreur est survenue lors de renvoie : "+ xhr.responseText)
                    // console.log("L'url de renvoie: " + url)
                    // console.log("Les data : " + $form.serialize())
                }
            })
        }

        function DesactiverCompteCollabo(id){
        $.ajax({
            type: "PUT",
            url: "/update/collabo/"+ id,
            data: {id:id},
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            success: function(response){},
            error: function(xhr){
                console.log("une erreur est survenue lors de désactivation : "+ xhr.responseText)
            }
        })
        }

        function ChangerRoleCollabo(id){
            $("#modifRole").modal('show');
            $("#btn-changer-role-collabo").on("click", function(e) {
            e.preventDefault()
            let valChoix = $("input[name=\"changer_role_collabo\"]:checked").val()
            // console.log("Click pour affectation de nouveau rôle donc : "+valChoix)
            $.ajax({
            type: "PUT",
            url: "/updaterole/collabo/"+id,
            data: {changer_role_collabo:valChoix},
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            success: function(response){
                console.log("Changement de rôle avec succes : " + response)
                $("#modifRole").modal('hide');
                // $(".modal-content-gerer-equipe").load()
            },
            error: function(xhr){
                console.log("une erreur est survenue : "+ xhr.responseText)
            }
            })
        })
        $("#annul-btn-changer-role-collabo").on("click", function(){
            $("#modifRole").modal('hide');
        })
    }

    function ChangerPropioMarchand(id){
        $("#transfertPro").modal('show');
    }


        function AnnulerIniviteCollabo(id){
            $.ajax({
                type: "PUT",
                url: "/update/collabo/"+ id,
                data: {id:id},
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                success: function(response){},
                error: function(xhr){
                    console.log("une erreur est survenue lors de désactivation : "+ xhr.responseText)
                }
            })
        }

    </script>

</head>


        <!-- The Modal -->
        <div class="modal modal-marchand-close" id="gererEquipe" data-id="gererEquipe">
            <div class="modal-dialog modal-dialog-gerer-equipe">
                <div class="modal-content modal-content-gerer-equipe">
                    <div style="margin-top:5px;">
                        @include('front.app-module.marchand.marchand-modals.marchand-profil-data')
                        <div style="border:1px solid #D8D8D8;border-radius: 5px;margin-top:-80px;position: absolute;margin-left: 334px; width:873px;height: 80px;background-color: white; display: flex; flex-direction: column; justify-content: center; align-items: center">
                            <style>
                                .gerer-equipe-menu {
                                    display: flex;
                                }

                                .gerer-equipe-menu li {
                                    list-style-type: none;
                                    height: 70px;
                                    width: 70px;
                                    color: #9B9B9B;
                                    font-family: Roboto;
                                    font-size: 10px;
                                    font-weight: 500;
                                    letter-spacing: 0;
                                    line-height: 11px;
                                    text-align: center;
                                    margin-left: 9px;
                                    padding-top: 10px;
                                    cursor: pointer;
                                    border-radius: 6px;
                                }

                                .gerer-equipe-menu li:hover {
                                    border: 1px solid #1A7EF5;
                                }

                            </style>

                            @include('front.app-module.marchand.marchand-modals.menu-modal-marchand')

                        </div>
                    </div>

                    <div  style="border:1px solid #D8D8D8;border-radius: 5px;width: 1200px;margin-left:1%;margin-right: 5px;margin-left:5px;margin-top: 1%; background-color: white; ">

                        <div  style="width:843px;height: 40px;border-bottom: 1px solid #D8D8D8;padding-left:10px;border-right: 1px solid #D8D8D8;margin-top:0px;padding-top:5px;">
                            <p style="font-size: 20px;color: #191970;font-weight: 500; border: 1px;  ">
                                Gérer mon équipe
                            </p>

                        </div>
                        <div style="width: 360px;height: 40px;border-bottom: 1px solid #D8D8D8;margin-left:840px;padding-top:12px;padding-left:15px;margin-top:-40px;">
                            <p style="  color: #191970;
                            font-family: Roboto;
                            font-size: 14px;
                            font-weight: 500;
                            letter-spacing: 0;
                            line-height: 19px;">Envoyer des invitations</p>

                        </div>



                                {{-- EN TETE  --}}
                            <table style="border:1px solid transparent;width: 843px;height: auto;">
                                <tr style="background-color: #F8F8F8; height:36px;border-bottom: 1px solid #d8d8d8;">
                                    <th style="width: 291px;  color: #191970;
                                font-family: Roboto;
                                font-size: 11px;
                                letter-spacing: -0.27px;
                                line-height: 13px;border-right: 1px solid #d8d8d8;padding-left:30px;font-weight:500">Nom &nbsp <a href="#" onclick="#"><img src="assets/images/icones-vendeurs2/Arrow3.svg" width="15px" height="15px"></a></th>
                                    <th style="width: 212px; color: #191970;
                                font-family: Roboto;
                                font-size: 11px;
                                letter-spacing: -0.27px;
                                line-height: 13px;border-right: 1px solid #d8d8d8;padding-left:30px;font-weight:500">Rôle du compte &nbsp <a href="#" onclick="#"><img src="assets/images/icones-vendeurs2/Arrow3.svg" width="15px" height="15px"></a></th>
                                    <th style="width: 112px; color: #191970;
                                font-family: Roboto;
                                font-size: 11px;
                                letter-spacing: -0.27px;
                                line-height: 13px;border-right: 1px solid #d8d8d8;font-weight:500;text-align:center;">Statut &nbsp <a href="#" onclick="#"><img src="assets/images/icones-vendeurs2/Arrow3.svg" width="15px" height="15px"></a></th>
                                    <th style="width: 228px; color: #191970;
                                font-family: Roboto;
                                font-size: 11px;
                                letter-spacing: -0.27px;
                                line-height: 13px;padding-left:29px;font-weight:500">Authentification &nbsp <a href="#" onclick="#"><img src="assets/images/icones-vendeurs2/Arrow3.svg" width="15px" height="15px"></a></th>
                                </tr>
                            </table>
                            {{-- CORP --}}
                            <div class="scroll ">
                                <table  style="border:1px solid transparent;width:843px;height: auto;" id="custo">
                                    <tr style="height: 60px !important; border-bottom: 1px solid #D8D8D8;">
                                        <td  id="ligne-affichage-marchand-liste" style="width: 291px; border-right: 1px solid#D8D8D8;">

                                        </td>
                                        <td style="width: 212px; border-right: 1px solid #D8D8D8;">
                                            <article style="
                                                width: 6px!important;height:6px;
                                                border-radius: 1px;
                                                background-color: #1A7EF5;margin-left:30px;margin-top:20px;"></article>

                                            &nbsp
                                            <p style=" color: #4A4A4A;
                                            font-family: Roboto;
                                            font-size: 12px;
                                            letter-spacing: 0;
                                            line-height: 14px;margin-top:-30px;text-align:left;margin-left:40px;"id="rolePropri">Propriétaire de la boutique </p>


                                        </td>
                                        <td style="width: 112px; color: #4A4A4A;
                                            font-family: Roboto;
                                            font-size: 12px;
                                            letter-spacing: 0;
                                            line-height: 14px;border-right: 1px solid #D8D8D8;text-align: center;padding-bottom:3px;">Actif</td>
                                        <td style="width: 228px; color: #4A4A4A;
                                            font-family: Roboto;
                                            font-size: 12px;
                                            letter-spacing: 0;
                                            line-height: 14px;
                                            text-align: left;padding-bottom:3px;padding-left: 30px;">Par email &nbsp

                                        </td>
                                        <td>
                                            <div class="dropdown">
                                                <button onclick="myFunctionForDropDown2()" class="dropbtn" style="margin-top:25px;"> </button>
                                                <div id="myDropdown2" class="dropdown-content">
                                                    <a href="#" style="text-align:left;margin-left:2px; margin-top:0px;"> Modifier mon profile</a>
                                                    <hr style="width:180px;margin-top:5px;">
                                                    <a href="#" data-id="transfertPro" style="margin-top:-13px;text-align:left;margin-left:2px;"
                                                    onclick="ChangerPropioMarchand({{\Illuminate\Support\Facades\Auth::id()}})"> Changer de propriétaire </a>
                                                </div>
                                            </div>
                                        </td>

                                    </tr>
                                    {{-- <tr style="height: 60px;border-bottom: 1px solid #D8D8D8;background-color: #f8f8f8;">
                                        <td style="width: 288px; border-right: 1px solid#D8D8D8;height:60px!important;">

                                            <div class="container" style="border:1px solid #9B9B9B; background-color:#D8D8D8;border-radius:6px;width: 34px;height: 34px;margin-top: 5px;margin-left:10px; "></div>
                                            <p style="text-align: right;  color: #191970;
                                                font-family: Roboto;
                                                font-size: 14px;
                                                font-weight: 500;
                                                letter-spacing: 0;
                                                line-height: 15px;margin-top: -33px;margin-right:50px;">Yvan NGOUWA IMBIONGUOT</p>
                                            <p style=" color: #4A4A4A;
                                                font-family: Roboto;
                                                font-size: 11px;
                                                letter-spacing: 0;
                                                line-height: 11px;text-align: right; margin-top:-5px;margin-right:105px;">yvan.neilsing@gmail.com</p>
                                        </td>
                                        <td style="width: 212px; border-right: 1px solid #D8D8D8;height:60px!important">
                                            <div style="  height: 6px!important;
                                                width: 6px!important;
                                                border-radius: 1px;
                                                background-color: #00B517;;margin-top: 8px;margin-left:20px;"></div>
                                            &nbsp
                                            <p style=" color: #4A4A4A;
                                            font-family: Roboto;
                                            font-size: 12px;
                                            letter-spacing: 0;
                                            line-height: 14px;margin-top:-30px;text-align: center;">Éditeur</p>
                                        </td>
                                        <td style="width: 112px; color: #4A4A4A;
                                            font-family: Roboto;
                                            font-size: 12px;
                                            letter-spacing: 0;
                                            line-height: 14px;border-right: 1px solid #D8D8D8;height:60px!important;text-align: center;padding-bottom: 10px;">Actif</td>
                                        <td style="width: 228px; color: #4A4A4A;
                                            font-family: Roboto;
                                            font-size: 12px;
                                            letter-spacing: 0;
                                            line-height: 14px;
                                            text-align: left;height:60px!important;padding-bottom: 10px;padding-left: 10px;
                                        ">Par email &nbsp
                                            <span style="width: 60px; height: 40px; font-size: 20px;text-align: right;margin-left:90px;">
                                                <img src="assets/images/icones-vendeurs2/three-dots.svg" width="20px" height="25px"> </span>


                                        </td>

                                    </tr>
                                    <tr style="height: 60px;border-bottom: 1px solid #D8D8D8;">
                                        <td style="width: 288px; border-right: 1px solid#D8D8D8;height:60px!important;">

                                            <div class="container" style="border:1px solid #9B9B9B; background-color:#D8D8D8;border-radius:6px;width: 34px;height: 34px;margin-top: 5px;margin-left:10px; "></div>
                                            <p style="text-align: right;  color: #191970;
                                                font-family: Roboto;
                                                font-size: 14px;
                                                font-weight: 500;
                                                letter-spacing: 0;
                                                line-height: 15px;margin-top: -33px;margin-right:50px;">Yvan NGOUWA IMBIONGUOT</p>
                                            <p style=" color: #4A4A4A;
                                                font-family: Roboto;
                                                font-size: 11px;
                                                letter-spacing: 0;
                                                line-height: 11px;text-align: right; margin-top:-5px;margin-right:105px;">yvan.neilsing@gmail.com</p>
                                        </td>
                                        <td style="width: 212px; border-right: 1px solid #D8D8D8;height:60px!important">
                                            <div style="  height: 6px!important;
                                                width: 6px!important;
                                                border-radius: 1px;
                                                background-color: #1A7EF5;margin-top: 8px;margin-left:20px;"></div>
                                            &nbsp
                                            <p style=" color: #4A4A4A;
                                            font-family: Roboto;
                                            font-size: 12px;
                                            letter-spacing: 0;
                                            line-height: 14px;margin-top:-30px;text-align: center;">Gérant de la boutique</p>
                                        </td>
                                        <td style="width: 112px; color: #4A4A4A;
                                            font-family: Roboto;
                                            font-size: 12px;
                                            letter-spacing: 0;
                                            line-height: 14px;border-right: 1px solid #D8D8D8;height:60px!important;text-align: center;padding-bottom: 10px;">Inactif</td>
                                        <td style="width: 228px; color: #4A4A4A;
                                            font-family: Roboto;
                                            font-size: 12px;
                                            letter-spacing: 0;
                                            line-height: 14px;
                                            text-align: left;height:60px!important;padding-bottom: 10px;padding-left: 10px;
                                        ">Par email &nbsp
                                        <span style="width: 60px; height: 40px; font-size: 20px;text-align: right;margin-left:90px;">
                                            <img src="assets/images/icones-vendeurs2/three-dots.svg" width="20px" height="25px"> </span>

                                        </td>

                                    </tr>
                                    <tr style="height: 60px;background-color: #f8f8f8;border-bottom:1px solid #d8d8d8;opacity: 0.5;">
                                        <td style="width: 288px; border-right: 1px solid#D8D8D8;height:60px!important;">

                                            <div class="container" style="border:1px solid #9B9B9B; background-color:#D8D8D8;border-radius:6px;width: 34px;height: 34px;margin-top: 5px;margin-left:10px; "></div>
                                            <p style="text-align: right;  color: #191970;
                                                font-family: Roboto;
                                                font-size: 14px;
                                                font-weight: 500;
                                                letter-spacing: 0;
                                                line-height: 15px;margin-top: -33px;margin-right:50px;">Yvan NGOUWA IMBIONGUOT</p>
                                            <p style=" color: #4A4A4A;
                                                font-family: Roboto;
                                                font-size: 11px;
                                                letter-spacing: 0;
                                                line-height: 11px;text-align: right; margin-top:-5px;margin-right:105px;">yvan.neilsing@gmail.com</p>
                                        </td>
                                        <td style="width: 212px; border-right: 1px solid #D8D8D8;height:60px!important; ">
                                            <div style="  height: 6px!important;
                                                width: 6px!important;
                                                border-radius: 1px;
                                                background-color:  #D0021B;margin-top: 8px;margin-left:20px;"></div>
                                            &nbsp
                                            <p style=" color: #4A4A4A;
                                            font-family: Roboto;
                                            font-size: 12px;
                                            letter-spacing: 0;
                                            line-height: 14px;margin-top:-30px;text-align: center;">Démarcheur</p>
                                        </td>
                                        <td style="width: 112px; color: #4A4A4A;
                                            font-family: Roboto;
                                            font-size: 12px;
                                            letter-spacing: 0;
                                            line-height: 14px;border-right: 1px solid #D8D8D8;height:60px!important;text-align: center;padding-bottom: 10px;">Désactivé</td>
                                        <td style="width: 228px; color: #4A4A4A;
                                            font-family: Roboto;
                                            font-size: 12px;
                                            letter-spacing: 0;
                                            line-height: 14px;
                                            text-align: left;height:60px!important;padding-bottom: 10px;padding-left: 10px;
                                        ">Par email &nbsp
                                            <span style="width: 60px; height: 40px; font-size: 20px;text-align: right;margin-left:90px;">
                                                <img src="assets/images/icones-vendeurs2/three-dots.svg" width="20px" height="25px"> </span>


                                        </td>

                                    </tr>
                                    <tr style="height: 60px;border-bottom: 1px solid #D8D8D8;">
                                        <td style="width: 288px; border-right: 1px solid#D8D8D8;height:60px!important">

                                            <div class="container" style="border:1px solid #9B9B9B; background-color:#D8D8D8;border-radius:6px;width: 34px;height: 34px;margin-top: 5px;margin-left:10px; "></div>
                                            <p style="text-align: right;  color: #191970;
                                                font-family: Roboto;
                                                font-size: 14px;
                                                font-weight: 500;
                                                letter-spacing: 0;
                                                line-height: 15px;margin-top: -33px;margin-right:50px;">Yvan NGOUWA IMBIONGUOT</p>
                                            <p style=" color: #4A4A4A;
                                                font-family: Roboto;
                                                font-size: 11px;
                                                letter-spacing: 0;
                                                line-height: 11px;text-align: right; margin-top:-5px;margin-right:105px;">yvan.neilsing@gmail.com</p>
                                        </td>
                                        <td style="width: 212px; border-right: 1px solid #D8D8D8;height:60px!important">
                                            <div style="  height: 6px!important;
                                                width: 6px!important;
                                                border-radius: 1px;
                                                background-color: #D0021B;margin-top: 8px;margin-left:20px;"></div>
                                            &nbsp
                                            <p style=" color: #4A4A4A;
                                            font-family: Roboto;
                                            font-size: 12px;
                                            letter-spacing: 0;
                                            line-height: 14px;margin-top:-30px;text-align: center;">Démarcheur</p>
                                        </td>
                                        <td style="width: 112px; color: #4A4A4A;
                                            font-family: Roboto;
                                            font-size: 12px;
                                            letter-spacing: 0;
                                            line-height: 14px;border-right: 1px solid #D8D8D8;height:60px!important;text-align: center;padding-bottom: 10px;">Actif</td>
                                        <td style="width: 228px; color: #4A4A4A;
                                            font-family: Roboto;
                                            font-size: 12px;
                                            letter-spacing: 0;
                                            line-height: 14px;
                                            text-align: left;height:60px!important;padding-bottom: 10px;padding-left: 10px;
                                        ">Par email &nbsp
                                        <span style="width: 60px; height: 40px; font-size: 20px;text-align: right;margin-left:90px;">
                                            <img src="assets/images/icones-vendeurs2/three-dots.svg" width="20px" height="25px"> </span>


                                        </td>

                                    </tr>
                                    <tr style="height: 60px;border-bottom: 1px solid #D8D8D8;background-color: #F8F8F8;">
                                        <td style="width: 288px; border-right: 1px solid#D8D8D8;height:60px!important;">

                                            <div class="container" style="border:1px solid #9B9B9B; background-color:#D8D8D8;border-radius:6px;width: 34px;height: 34px;margin-top: 5px;margin-left:10px; "></div>
                                            <p style="text-align: right;  color: #191970;
                                                font-family: Roboto;
                                                font-size: 14px;
                                                font-weight: 500;
                                                letter-spacing: 0;
                                                line-height: 15px;margin-top: -33px;margin-right:50px;">Yvan NGOUWA IMBIONGUOT</p>
                                            <p style=" color: #4A4A4A;
                                                font-family: Roboto;
                                                font-size: 11px;
                                                letter-spacing: 0;
                                                line-height: 11px;text-align: right; margin-top:-5px;margin-right:105px;">yvan.neilsing@gmail.com</p>
                                        </td>
                                        <td style="width: 212px; border-right: 1px solid #D8D8D8;height:60px!important">
                                            <div style="  height: 6px!important;
                                                width: 6px!important;
                                                border-radius: 1px;
                                                background-color: #FF9500;margin-top: 8px;margin-left:20px;"></div>
                                            &nbsp
                                            <p style=" color: #4A4A4A;
                                            font-family: Roboto;
                                            font-size: 12px;
                                            letter-spacing: 0;
                                            line-height: 14px;margin-top:-30px;text-align: center;">Invitation envoyée</p>
                                        </td>
                                        <td style="width: 112px; color: #4A4A4A;
                                            font-family: Roboto;
                                            font-size: 12px;
                                            letter-spacing: 0;
                                            line-height: 14px;border-right: 1px solid #D8D8D8;height:60px!important;text-align: center;padding-bottom: 10px;">Actif</td>
                                        <td style="width: 228px; color: #4A4A4A;
                                            font-family: Roboto;
                                            font-size: 12px;
                                            letter-spacing: 0;
                                            line-height: 14px;
                                            text-align: left;height:60px!important;padding-bottom: 10px;padding-left: 10px;
                                        ">Par email &nbsp
                                            <span style="width: 60px; height: 40px; font-size: 20px;text-align: right;margin-left:90px;">
                                                <img src="assets/images/icones-vendeurs2/three-dots.svg" width="20px" height="25px"> </span>


                                        </td>

                                    </tr> --}}
                                    <tbody id="tbody-liste-collabo-notif"></tbody>
                                </table>
                            </div>

                    </div>


                    <div style="width: 360px;margin-top: -436px;margin-left:848.8px;padding-left: 15px;border-left:1px solid #D8D8D8">
                        <form action="{{ route("invitation.send")}}" method="POST" id="form-envoie-notification">
                            @csrf
                            <p style=" color: #4A4A4A;
                                font-family: Roboto;
                                font-size: 14px;
                                letter-spacing: 0;
                                line-height: 15px;text-align: center;margin-top: 15px;">Inviter des personnes à rejoindre votre équipe</p>
                            <p style="  color: #9B9B9B;
                                font-family: Roboto;
                                font-size: 11px;
                                letter-spacing: 0;
                                line-height: 10px;margin-top:0px;"> À :</p>

                            <div class="scroll3" style="height: auto;padding-top:10px;" id="scroll3">
                            {{-- <input type="text" name="renvoie" id="" value="autre" hidden style="height: 0;width:0; display:none"> --}}
                            <input type="email " id="id_email_destinataire_notif" name="email_destinataire_notif" placeholder=" EmailDuDestinataire@email.com" style="height: 41px;
                                width: 330px; border:1px solid; border: 1px solid #1A7EF5;font-size:14px;
                                    border-radius: 6px;padding-left:10px;
                                   ;margin-top:-8px;margin-bottom:6px" >

                            <img src="assets/images/icones-vendeurs2/Formulaire_Alerte_Incorrect.svg" style="display:none;margin-left:-30px;"id="alert_inco">

                              <input type="email " id="id-email-destinataire-notif0" name="email_destinataire_notif0" placeholder="Mail envoyé avec succès" style="height: 41px;
                              width: 330px; border:1px solid; border: 1px solid #1A7EF5;
                                  border-radius: 6px;padding-left:10px;font-size:14px;
                                  background-color: #F8F8F8;background-image:url(assets/images/icones-vendeurs2/checkbleu.svg);background-repeat: no-repeat;background-position: right;background-origin: content-box,content-box;display:none;margin-bottom:6px;">

                              <p style="display: none;  color: #D0021B;
                              font-family: Roboto;
                              font-size: 11px;
                              letter-spacing: -0.27px;
                              line-height: 13px;text-align:left;margin-top:-2px;margin-left:5px;" id="mail_encours"> Ce membre a une invitation en cours</p>
                                <p style="display: none;  color: #D0021B;
                                  font-family: Roboto;
                                  font-size: 11px;
                                  letter-spacing: -0.27px;
                                  line-height: 13px;text-align:left;margin-top:-2px;margin-left:5px;" id="mail_idem">Vous ne pouvez pas vous envoyer une invitation!</p>

                                <p style="display: none;  color: #D0021B;
                                font-family: Roboto;
                                font-size: 11px;
                                letter-spacing: -0.27px;
                                line-height: 13px;text-align:left;margin-top:-2px;margin-left:5px;" id="mail_marc">Ce mail appartient à un marchand!</p>

                             {{-- 2ieme  --}}

                            <aside type="button " id="forme"  style="height:42px;width:340px;" a href="#" onclick="changeinp()">
                            <article style="height: 41px; width: 330px;  border: 1px solid        #9B9B9B;
                                border-radius: 6px;padding: 10px; cursor: pointer;
                                background-color: #FFFFFF;
                                background-origin: content-box, content-box; background-size: 20px;background-image: url(assets/images/icones-vendeurs2/plus2.svg);background-repeat: no-repeat;background-position:55px;" id="ajouterune">
                                <p style="margin-right:-16px;font-size:14px;margin-top:3px;">Ajouter une autre personne </p></article>

                            <input type="email " id="id-email-destinataire-notif2" name="email_destinataire_notif1" placeholder=" EmailDuDestinataire@email.com" style="height: 41px;
                            width: 330px;border: 1px solid #1A7EF5;
                                border-radius: 6px;padding-left:10px;display:none;
                                background-color: #F8F8F8;margin-left:-10px;font-size:14px">
                                <img src="assets/images/icones-vendeurs2/Formulaire_Alerte_Incorrect.svg" style="display:none;margin-left:-25px;" id="alert_inco2"> </aside>

                                <p style="display: none;  color: #D0021B;
                                font-family: Roboto;
                                font-size: 11px;
                                letter-spacing: -0.27px;
                                line-height: 13px;text-align:left;margin-top:3px;margin-left:7px;" id="mail_encours1"> Ce membre a une invitation en cours</p>
                                <p style="display: none;  color: #D0021B;
                                    font-family: Roboto;
                                    font-size: 11px;
                                    letter-spacing: -0.27px;
                                    line-height: 13px;text-align:left;margin-top:3px;margin-left:7px;" id="mail_idem1">Vous ne pouvez pas vous envoyer une invitation!</p>

                                <p style="display: none;  color: #D0021B;
                                font-family: Roboto;
                                font-size: 11px;
                                letter-spacing: -0.27px;
                                line-height: 13px;text-align:left;margin-top:3px;margin-left:7px;" id="mail_marc1">Ce mail appartient à un marchand!</p>


                              {{-- 3ieme --}}
                            <div style="margin-top: 7px;">
                            <aside type="button " id="forme2"  style="height:42px;width:340px;margn-left:10px;" a href="#" onclick="changeinpu()"><article style="height: 41px; width: 330px;  border: 1px solid#9B9B9B;
                                border-radius: 6px;padding: 10px; cursor: pointer;
                                background-color: #FFFFFF;
                                background-origin: content-box, content-box; background-size: 20px;background-image: url(assets/images/icones-vendeurs2/plus2.svg);background-repeat: no-repeat;background-position: 55px;" id="ajouterune2"><p style="color:#1A7EF5;text-align:center;font-size:14px;margin-right:-16px;">Ajouter une autre personne </p>



                            </article>
                            <input type="email " id="id-email-destinataire-notif3" name="email_destinataire_notif2" placeholder=" EmailDuDestinataire@email.com" style="height: 41px;
                            width: 330px;border: 1px solid #1A7EF5;
                                border-radius: 6px;padding-left:10px;display:none;
                                 background-color: #F8F8F8;font-size:14px;"> <img src="assets/images/icones-vendeurs2/Formulaire_Alerte_Incorrect.svg" style="margin-left:-25px;display:none;"id="alert_inco3">



                                </aside>

                                  <p style="display: none;  color: #D0021B;
                                  font-family: Roboto;
                                  font-size: 11px;
                                  letter-spacing: -0.27px;
                                  line-height: 13px;text-align:left;margin-top:3px;margin-left:5px" id="mail_encours2"> Ce membre a une invitation en cours</p>
                                  <p style="display: none;  color: #D0021B;
                                      font-family: Roboto;
                                      font-size: 11px;
                                      letter-spacing: -0.27px;
                                      line-height: 13px;text-align:left;margin-top:3px;margin-left:5px" id="mail_idem2">Vous ne pouvez pas vous envoyer une invitation!</p>

                                  <p style="display: none;  color: #D0021B;
                                  font-family: Roboto;
                                  font-size: 11px;
                                  letter-spacing: -0.27px;
                                  line-height: 13px;text-align:left;margin-top:3px;margin-left:5px;" id="mail_marc2">Ce mail appartient à un marchand!</p>
                            </div>


                            {{-- 4ieme --}}
                            <div style="margin-top: 7px;">
                            <aside type="button " id="forme3"  style="height:42px;width:340px;margn-left:10px;" a href="#" onclick="changeinpu3()">
                            <article style="height: 41px; width: 330px;  border: 1px solid        #9B9B9B;
                                border-radius: 6px;padding: 10px; cursor: pointer;
                                background-color: #FFFFFF;
                                background-origin: content-box, content-box; background-size: 20px;background-image: url(assets/images/icones-vendeurs2/plus2.svg);background-repeat: no-repeat;background-position:55px;" id="ajouterune3"><p style="color:#1A7EF5;text-align:center;font-size:14px;margin-right:-16px;">Ajouter une autre personne </p></article>



                            <input type="email " id="id-email-destinataire-notif4" name="email_destinataire_notif3" placeholder=" EmailDuDestinataire@email.com" style="height: 41px;
                            width: 330px;border: 1px solid #1A7EF5;
                                border-radius: 6px;padding-left:10px;display:none;
                                background-color: #F8F8F8;font-size:14px"><img src="assets/images/icones-vendeurs2/Formulaire_Alerte_Incorrect.svg" style="display:none;margin-left:-25px;"id="alert_inco4">
                                </aside>
                                  <p style="display: none;  color: #D0021B;
                                  font-family: Roboto;
                                  font-size: 11px;
                                  letter-spacing: -0.27px;
                                  line-height: 13px;text-align:left;margin-top:3px;margin-left:5px;" id="mail_encours3"> Ce membre a une invitation en cours</p>
                                  <p style="display: none;  color: #D0021B;
                                      font-family: Roboto;
                                      font-size: 11px;
                                      letter-spacing: -0.27px;
                                      line-height: 13px;text-align:left;margin-top:3px;margin-left:5px;" id="mail_idem3">Vous ne pouvez pas vous envoyer une invitation!</p>

                                  <p style="display: none;  color: #D0021B;
                                  font-family: Roboto;
                                  font-size: 11px;
                                  letter-spacing: -0.27px;
                                  line-height: 13px;text-align:left;margin-top:-10px;margin-left:5px;" id="mail_marc3">Ce mail appartient à un marchand!</p>
                            </div>

                            {{-- 5ieme --}}
                            <div style="margin-top: 7px;">
                            <aside type="button " id="forme4"  style="height:42px;width:340px;margn-left:10px;" a href="#" onclick="changeinpu4()"><article style="height: 41px; width: 330px;  border: 1px solid #9B9B9B;
                                border-radius: 6px;padding: 10px; cursor: pointer;
                                background-color: #FFFFFF;;
                                background-origin: content-box, content-box; background-size: 20px;background-image: url(assets/images/icones-vendeurs2/plus2.svg);background-repeat: no-repeat;background-position:55px;" id="ajouterune4"><p style="color:#1A7EF5;text-align:center;font-size:14px;margin-right:-16px;">Ajouter une autre personne </p></article>

                            <input type="email " id="id-email-destinataire-notif5" name="email_destinataire_notif4" placeholder=" EmailDuDestinataire@email.com" style="height: 41px;
                            width: 330px;border: 1px solid #1A7EF5;;
                                border-radius: 6px;padding-left:10px;display:none;font-size:14px;
                                background-color: #F8F8F8;"><img src="assets/images/icones-vendeurs2/Formulaire_Alerte_Incorrect.svg" style="display:none;margin-left:-25px;"id="alert_inco5"></aside>

                                <p style="display: none;  color: #D0021B;
                                font-family: Roboto;
                                font-size: 11px;
                                letter-spacing: -0.27px;
                                line-height: 13px;text-align:left;margin-left:5px;margin-top:3px;" id="mail_encours4"> Ce membre a une invitation en cours</p>
                                <p style="display: none;  color: #D0021B;
                                    font-family: Roboto;
                                    font-size: 11px;
                                    letter-spacing: -0.27px;
                                    line-height: 13px;text-align:left;margin-top:3px;margin-left:5px;" id="mail_idem4">Vous ne pouvez pas vous envoyer une invitation!</p>

                                <p style="display: none;  color: #D0021B;
                                font-family: Roboto;
                                font-size: 11px;
                                letter-spacing: -0.27px;
                                line-height: 13px;text-align:left;margin-top:3px;margin-left:5px;" id="mail_marc4">Ce mail appartient à un marchand!</p>
                            </div>

                                                            </div>

                            <input type="submit" id="clickSending" value="Envoyer" style="color: white;background-color: #1A7EF5; width: 100px;height: 37px;
                                font-family: Roboto;
                                font-size: 16px;
                                font-weight: 500;
                                letter-spacing: 0.35px;
                                line-height: 18px;
                                text-align: center;border:1px solid #1A7EF5;border-radius: 5px;margin-left:230px; margin-top: 20px;"
                                >

                        </form>

                        <div class="container" style="width: 356px;height: 36px;border: 1px solid #D8D8D8;
                                background-color: #F8F8F8!important;padding: 10px;margin-left: -16px;margin-top: 31.5px;
                            " id="sendI">
                            <p style=" color: #191970;font-family: roboto;font-size: 14px;letter-spacing: 0;line-height: 11px;text-align: left;margin-top:2px">Mes invitations envoyées &nbsp</p>
                            <p style=" color: #9B9B9B;font-family: Roboto;font-size: 10px;letter-spacing: 0;
                                line-height: 11px; text-align: center;margin-top: -26px;margin-left:5px" class="compte-total-invitation">(+99)</p> <a href="#" id="downX" type="button" style="margin-top:-30px;margin-left:315px;"><img src="assets/images/icones-vendeurs2/Plusgray.svg"></a>

                                <article href="#" id="upY" type="button" style="margin-top:-30px;margin-left:315px;display:none;"><img src="assets/images/icones-vendeurs2/Minusgray.svg"></article>

                        </div>
                        <div class="scroll2" style="height: auto;display:none;" id="scroll-liste-invitation-recente">



                            {{-- <section style="width: 338px;height:81px;border: 1px solid #D8D8D8;margin-left: -8px;padding-left: 15px;">
                                <p style="text-align: left;font-size: 14px;color: #191970;">@EmailDuDestinataire</p>
                                <p style="  color: #191970;
                                font-family: Roboto;
                                font-size: 11px;
                                letter-spacing: 0;
                                line-height: 14px;margin-top: 2px;">Invité(e) par @CompteInvité </p>
                                <p style="  color: #D0021B;
                                font-family: Roboto;
                                font-size: 11px;
                                letter-spacing: 0;
                                line-height: 13px;margin-top: 10px;">Invité(e) par @CompteInvité </p>

                            </section> --}}
                        </div>

                    </div>

                </div>

            </div>


        </div>



    </div>


