window.addEventListener('load', function() {
    jQuery(document).ready(function() {

        $(function() {
            /* $('.dates #date-naiss').datepicker({
                 language: 'fr',
                 'format':'dd-mm-yyyy',
                 'autoclose':true
             });*/
        });



        (function($) {
            $.fn.datepicker.dates['fr'] = {
                days: ["dimanche", "lundi", "mardi", "mercredi", "jeudi", "vendredi", "samedi"],
                daysShort: ["dim.", "lun.", "mar.", "mer.", "jeu.", "ven.", "sam."],
                daysMin: ["d", "l", "ma", "me", "j", "v", "s"],
                months: ["janvier", "février", "mars", "avril", "mai", "juin", "juillet", "août", "septembre", "octobre", "novembre", "décembre"],
                monthsShort: ["janv.", "févr.", "mars", "avril", "mai", "juin", "juil.", "août", "sept.", "oct.", "nov.", "déc."],
                today: "Aujourd'hui",
                monthsTitle: "Mois",
                clear: "Effacer",
                weekStart: 1,
                format: "dd/mm/yyyy"
            };
        }(jQuery));

        $('.date-naiss').val(new Date()).datepicker({
            language: 'fr',
            autoclose: true,
            todayHighlight: true,
            dateFormat: 'dd/mm/yy',
        })

        $('#date-naiss').datepicker()
            .on('changeDate', function(e) {
                var mydate = new Date()

                var birthDay = document.getElementById("date-naiss").value;
                var DOB = new Date(birthDay);
                var today = new Date();
                var age = today.getTime() - DOB.getTime();
                age = Math.floor(age / (1000 * 60 * 60 * 24 * 365.25));

                //console.log(age)
                if (age < 13) {
                    console.log(age + 'est inférieur ')

                    var texte = document.getElementById("date-naiss");
                    texte.classList.add("age-error")
                } else {
                    var texte = document.getElementById("date-naiss");
                    texte.classList.remove("age-error")
                }

                document.getElementById('age').value = age;

            });
             // -------------------- navigation entre menu dans un modal --------------
        $(".mydata").on("click", function() {
            $('.mydata').not(this).css({ 'background-color': '#D8D8D8', 'border': '1px solid #9B9B9B', 'color': '#4A4A4A' });
            $(this).css({ 'background-color': '#FFFFFF', 'border': '1px solid #1A7EF5', 'color': '#191970' });
            var dataId = $(this).attr("data-id");
            $(".donnees").hide();
            $(dataId).show();
        });

        //---------------------- navigation entre menu gauche ---------------------
        $(".mydata-menu-profil").on("click", function() {

            var dataId = $(this).attr("data-id");
            var menu_libelle = $(this).attr('data-libelle')
            var nav_parent = $(this).attr('data-parent')
            $('#nav-nemu-module-element').text(menu_libelle)
            $('#nav-module-element').text(nav_parent)
            $(".mydata-menu-profil").removeClass('active-menu-left')
            $(".donnees-menu-profil").hide();
            $(".photo-profil-classe").hide();
            $(this).addClass('active-menu-left')
            $(dataId).show()

            console.log('Show modal element', dataId)
            console.log('Here is commande zone:')

            if (dataId == "#info-perso") {

            }

            if (dataId == "#mes-adresses") {
                console.log('Mes adresse clicked')
                $('#addAdress').removeClass('desable-add-adresse')
            }

            if (dataId == "#mes-commandes") {
                $('#defaul-menu-courant-user').addClass('applied-width')
                $('#commande-options-zone').removeClass('hide-commande-tr')
            }else{
                $('#commande-options-zone').addClass('hide-commande-tr')
                $('#defaul-menu-courant-user').removeClass('applied-width')
            }

        });

        // $('#tris_par_date').select2({
        //     dropdownCssClass : 'no-search'
        // });

        // $('#tous_les_prix').select2({
        //     dropdownCssClass : 'no-search'
        // });


        // upload photo profil
        $(".photo-profil").on("click", function() {
            var dataId = $(this).attr("data-id");
            $(".donnees-menu-profil").hide();
            $(dataId).show()
        });

        $('.ajout-mode-pay-infos').on('click', function() {

            })
            // chevron ouvran et fermant

        $("#chevron-bottom-mode-paiement").click(function() {
            $(".rectangle-copy-3").slideDown();
            $(".chevron-top-option-paiement").hide();
            $(".chevron-bottom-option-paiement").show();
        });

        $("#chevron-bottom-mode-paiement2").click(function() {
            $(".rectangle-copy-3").slideUp();
            $(".chevron-bottom-option-paiement").hide();
            $(".chevron-top-option-paiement").show();
        });

        /* mise à jour des données utilisateurs profils*/

        $(".btn-user-profil-update").click(function(event) {
            event.preventDefault();

            let nom = $("input[name=nom]").val();
            let prenom = $("input[name=prenom]").val();
            let sexe = $("input[name=sexe]:checked").val();
            let nom_entreprise = $("input[name=nom_entreprise]").val();
            let code_postale = $("input[name=code_postale]").val();
            let portable = $("input[name=portable]").val();
            let date_naissance = $("input[name=date_naissance]").val();

            var id = $('#user_id').val();
            let _url = `/update-user-profil/${id}`;

            let _token = $('meta[name="csrf-token"]').attr('content');

            $.ajax({
                url: _url,
                type: "POST",
                data: {
                    nom: nom,
                    prenom: prenom,
                    sexe: sexe,
                    nom_entreprise: nom_entreprise,
                    code_postale: code_postale,
                    portable: portable,
                    date_naissance: date_naissance,
                    _token: _token
                },
                success: function(response) {

                    if (response) {
                        console.log(response);

                        var message = "<div class=\"div-btn-success-update-profile-generale\">\n" +
                            "            <p class=\"span-btn-success-update-profile-generale\">\n" +
                            "                Mise à jour effectuée avec succès!\n" +
                            "            </p>\n" +
                            "        </div>"

                        //$("#btn-succ-update").append(message);

                        $('#btn-succ-update').append(message).delay(2000).queue(function(next) {
                            $(this).remove(message);
                        });

                    }
                },
                error: function(error) {
                    console.log(error);
                }
            });
        });

        $(".button-info-perso").click(function() {
            $(".button-info-perso").not(this).removeClass('mon-bg-grey');
        });


        // upload image
        $("#profilImageUpload").on("click", function(e) {
            e.preventDefault();

            var fd = new FormData();
            var files = $('#file')[0].files;

            // Check file selected or not
            if (files.length > 0) {
                fd.append('file', files[0]);

                $.ajax({
                    url: 'profile',
                    type: 'post',
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    data: fd,
                    contentType: false,
                    processData: false,
                    success: function(response) {

                        $("#current-profil-avatar").attr("src", '/uploads/avatars/' + response.image); // just to display to the user interface/view
                        $('.photo-user').css('background-image', 'url(/uploads/avatars/' + response.image + ')');
                    },
                });

            } else {
                alert("Veillez sélectionner une image svp");
            }

        })

        $('#message-input').on('keydown', function(e) {
            var key = e.which;
            switch (key) {
                case 13: // enter
                    //   console.log("Vous avez tapez la touche entrée")
                    let message = $('#message-input').val() //message-input-current
                    const currrent_user = $('#message-input-current').val()
                    let current = new Date();
                    var heure = current.toLocaleTimeString();

                    let minutes = current.getMinutes();
                    let hour = current.getHours();
                    console.log(message)
                    $.ajax({
                        url: 'envoyer_message',
                        type: 'post',
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        data: { val: message },
                        success: function(response) {


                            $('#message-input').val('')
                            $('.conversation-section-2').append('<div class="conversation-section-real-time"><div class="user-active-infos"><div class="user-active-photo-profil"></div><div class="user-active-name">' + currrent_user + '</div><div class="user-active-current-time">' + hour + ':' + minutes + '</div></div><div class="user-active-message">' + response.val + '</div></div>')

                            const myTimeout = setTimeout(function() {
                                let current_response = new Date();

                                let minutes_r = current_response.getMinutes();
                                let hour_r = current_response.getHours();
                                // initialiser la variable message
                                $('.conversation-section-2').append('<div class="conversation-section-real-time-response"><div class="corner-time">' + hour_r + ':' + minutes_r + '</div><div class="response-message"> <p>Ok d\'accord et vous me proposé combien?? pour quelle date voulez vous de cet article?</p></div> </div>')
                            }, 5000);

                        },

                        error: function(error) {
                            console.log(error)
                        }
                    });

                    break;
                default:
                    break;
            }
        });

        $('#add-payement-method').on('click', function() {
            $('#modePayementProfil').modal('hide')
            $('#modePayementProfilCarteCredit').modal('show')
        })

        $('#continuerajout').on('click', function() {
            $('#modePayementProfilLivraison').modal('hide')

        })

        $("#sendmessage_button").on("click", function() {
            let message = $('#message-input').val() //message-input-current
            const currrent_user = $('#message-input-current').val()
            let current = new Date();
            var heure = current.toLocaleTimeString();

            let minutes = current.getMinutes();
            let hour = current.getHours();
            console.log(message)
            $.ajax({
                url: 'envoyer_message',
                type: 'post',
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                data: { val: message },
                success: function(response) {

                    $('#message-input').val('')
                    $('.conversation-section-2').append('<div class="conversation-section-real-time"><div class="user-active-infos"><div class="user-active-photo-profil"></div><div class="user-active-name">' + currrent_user + '</div><div class="user-active-current-time">' + hour + ':' + minutes + '</div></div><div class="user-active-message">' + response.val + '</div></div>')

                    const myTimeout = setTimeout(function() {
                        let current_response = new Date();

                        let minutes_r = current_response.getMinutes();
                        let hour_r = current_response.getHours();

                        // initialiser la variable message

                        $('.conversation-section-2').append('<div class="conversation-section-real-time-response"><div class="corner-time">' + hour_r + ':' + minutes_r + '</div><div class="response-message"> <p>Ok d\'accord et vous me proposé combien?? pour quelle date voulez vous de cet article?</p></div> </div>')
                    }, 5000);

                },

                error: function(error) {
                    console.log(error)
                }
            });
        })

    })
})

$('#formEditUser_prenom-input').on('blur', function() {
    var prenom = $('#formEditUser_prenom-input').val();
    if (prenom === '') {
        console.log('nous sommes dans la bonne zone')
        $("#formEditUser_prenom-input").addClass('input-error-warning')

    } else {
        console.log('nous sommes dans la zone contraire')
        $("#formEditUser_prenom-input").removeClass('input-error-warning')
    }
})
$('#formEditUser_nom-input').on('blur', function() {
    var prenom = $('#formEditUser_nom-input').val();
    if (prenom === '') {
        console.log('nous sommes dans la bonne zone')
        $("#formEditUser_nom-input").addClass('input-error-warning')

    } else {
        console.log('nous sommes dans la zone contraire')
        $("#formEditUser_nom-input").removeClass('input-error-warning')
    }
})
$('#date-naiss').on('blur', function() {
    var prenom = $('#date-naiss').val();
    if (prenom === '') {
        console.log('nous sommes dans la bonne zone')
        $("#date-naiss").addClass('input-error-warning')

    } else {
        console.log('nous sommes dans la zone contraire')
        $("#date-naiss").removeClass('input-error-warning')
    }
})

$('#tris_par_date').on('change', function() {

  $.ajax({
    type: 'GET',
    url: '/sort_data_by_date',
    data: {type_date: $(this).val()},
    success: function(response) {

    $('#tab-client-commande').empty()
    if (response.length > 0) {
    for (let index = 0; index < response.length; index++) {

    console.log('reponse commande:', response[index])

    let client_commande = '';

    let detail_commant_produit = response[index]['detail_commade']

    var mode_pay;

    if (response[index].mode_payement == 'AirtelMoney') {
        mode_pay = '/assets/images/icons/AirtelMoney.svg'
    }else if (response[index].mode_payement == 'MoovMoney') {
        mode_pay = '/assets/images/icones-vendeurs2/Moovmoney.svg'
    }

    let id_commande = response[index].id

    client_commande += `
        <tr style="position: absolute" class="hide-commande-tr" onmouseleave="checkOver2(${id_commande})" id="commande-hovered-layer-success-${id_commande}" onclick="showSubcontent(${id_commande})">
            <td colspan="9" style="height: inherit">
                <div class="commande-hover-zone-2">Fermer les details de cette commande</div>
            </td>
        </tr>
    `

    client_commande += `
        <tr style="position: absolute" class="hide-commande-tr" onmouseleave="checkOver2(${id_commande})"  id="commande-hovered-layer-${id_commande}" onclick="showSubcontent(${id_commande})">
            <td colspan="9" style="height: inherit; border: transparent">
                <div class="commande-hover-zone">Voir les details de cette commande</div>
            </td>
        </tr>
    `
    client_commande += '<tr onmouseenter="checkOver('+id_commande+')" onmouseleave="checkOver2('+id_commande+')"   class="commande-rows" data-commade="'+response[index].id+'" style="background-color: redd" >'

    client_commande += `
        <td style="width: 50px">
            <span id="images_temps-${id_commande}"><img src="/assets/images2/Fermes2.svg" alt="" /></span>
            <span id="images_temps1-${id_commande}" class="hide-commande-tr"><img src="/assets/images2/Ouvert.svg" alt="" /></span>
        </d>
    `

    client_commande += '<td class="contenu1 td-section" >'+response[index].ref_commande.toUpperCase()+'</td><td class="contenu4 td-section" style="width: 56px">'+response[index].quantite_total+'</td><td class="contenu5 td-section" style="width: 112px;">'+response[index].totaf_facturation+' Fcfa</td>'

    client_commande += '<td class="td-section" style="width: 56px;"> <img src="'+mode_pay+'"></td><td class="commande-danger td-section" >En cours de traitement</td><td class="contenu2 td-section" style="width:101px">'+response[index].date_commande+'</td><td class="contenu2 td-section" style="width: 51px"><span class="facture-pdf">PDF</span></td>'

    client_commande += '<td class="contenu2 td-section" onmouseout="checkOver3('+id_commande+')" style="width: 147px;"><button onclick=nouvelCommande("'+id_commande+'") class="re-commander">Nvl. Commande</button></td></tr>'

    client_commande += '<tr class="hide-commande-tr default-tr-close-selector" id="detail-commande-'+response[index].id+'"><td colspan="9"><div class="commande-sub-content"><div class="commande-sub-content-adress" ><article class="infocliff">'

    client_commande += `
    <div class="textenteteinfo" style="width: 187px;"><p class="penteteinfo">Facturé à :</p></div><div class="group3 zone-icons-grouppe">
    `

    client_commande += '<img src="/assets/images/icones-vendeurs2/user copy 2.svg" class="addr-icons"><img src="/assets/images/icones-vendeurs2/placeholder copy 2.svg" class="addr-icons"><img src="/assets/images/icones-vendeurs2/telephone.svg" class="addr-icons"></div>'

    client_commande += '<div style="margin-top:-102px; margin-left: 46px"><p class="textcolora4-bis"  style="margin-top:14px;">'+response[index].address_livraison.prenom_nom+'</p><p class="textcolora4-bis"  style="margin-top:12px;">'+response[index].address_livraison.adresse+'</p><p class="textcolora4-bis"  style="margin-top:12px;">'+response[index].address_livraison.portable+'</p></div></article>'

    client_commande += '<article class="infoexpe"><div class="textenteteinfo" style="width: 187px"><p class="penteteinfo">Livré à :</p></div><div class="group3 zone-icons-grouppe"><img src="/assets/images/icones-vendeurs2/user copy 2.svg" class="addr-icons"><img src="/assets/images/icones-vendeurs2/placeholder copy 2.svg" class="addr-icons"><img src="/assets/images/icones-vendeurs2/telephone.svg" class="addr-icons"></div>'

    client_commande += '<div style="margin-top:-102px; margin-left: 46px"><p class="textcolora4-bis"  style="margin-top:14px;">'+response[index].address_livraison.prenom_nom+'</p><p class="textcolora4-bis"  style="margin-top:12px;">'+response[index].address_livraison.adresse+'</p><p class="textcolora4-bis"  style="margin-top:12px;">'+response[index].address_livraison.portable+'</p></div></article></div>'

    client_commande += `<div class="commande-sub-content-details">
        <div class="commande-client-recap-tile"><span class="commande-resume-header">RÉSUMÉ DE LA COMMANDE</span></div>`

    client_commande += `<table id="commande-tablebis" style=" width: 640px !important; left: 0px !important; margin-top: 0px">
    <thead>
        <tr class="commande-resume-table-header"><td class="tab-comm-element" style="width: 110px">Référence</td><td class="tab-comm-element" style="width:347px; text-align:left">Article(s)</td><td class="tab-comm-element">Quantité</td><td class="tab-comm-element">Prix unitaire</td>
        </tr>
    </thead>
    </table>
    `

    client_commande += `<div class="children-sub-table" style="width:640px !important"><table><tbody id="tab-client-commande-sub-content-${id_commande}">`

    if (detail_commant_produit.length > 0) {

        for (let j = 0; j < detail_commant_produit.length; j++) {
            client_commande += '<tr><td class="contenu1 td-section" style="width: 110px">'+detail_commant_produit[j]['ref_produit']+'</td><td class="contenu4 td-section" style="width:347px;"><article class="commande-information-prod"><aside class="boxcontenu2-bis" style="margin-right: 10px"><img src="/'+detail_commant_produit[j]['image']+'" alt="" style="height: 34px;" /></aside><p class="contenu2" style="text-align:left">'+detail_commant_produit[j]['libelle']+'</p></article></td><td class="contenu5 td-section" style="width: 72px">'+detail_commant_produit[j]['quantite']+'</td><td class="td-section"> '+detail_commant_produit[j]['prix']+' Fcfa </td></tr>'
        }

    }

    client_commande += '</tbody></div></table></div></div></td></tr>'

    $('#tab-client-commande').append(client_commande)

    }

    }
        }
    })

})

