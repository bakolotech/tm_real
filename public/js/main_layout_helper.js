var commandes_product = [];
var commande_produit_disponible = [];
var commande_produitf_non_disponible = [];

var date_diff_indays = function(date1, date2) {
    dt1 = new Date(date1);
    dt2 = new Date(date2);
    return Math.floor((
        Date.UTC(
            dt2.getFullYear(),
            dt2.getMonth(), dt2.getDate()) - Date.UTC(dt1.getFullYear(),
            dt1.getMonth(), dt1.getDate())
        ) /(1000 * 60 * 60 * 24));
}

function sendMessage() {
    var message_content = $('#user_message_input').val();
    $.ajax({
        method: 'POST',
        url: '/send_user_message',
        data: {message: message_content},
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        success: function(response) {
            console.log('Message fired successfully');
        }
    })
}

function fermer_login_register () {
    $("#registerLoginModal").modal('hide');
}

    //changer le proprio après le click!
    function changeproprio(){
        var bjr = $('#exampleDataList').val();
        var pswcr = $('#formLogin_password-field').val();

        let email = {
            bjr: bjr,
            pswcr:pswcr
        }

        $.ajax({
            type:"POST",
            url: "/collabo3",
            data:email,
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            success:function(response){
                console.log(bjr)
            console.log(pswcr)
                console.log(response)
                $("#transfertPro").modal('hide')
                $("#gererEquipe").modal('hide')
            }
        })
    }

    function affecterCaracteristique() {
        let data = {
            _token: $('#token').val(),
        }
        $.ajax({
            method: 'POST',
            url: 'rayon_caracteristique-affectation',
            data: {

            },
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },

            success: function(response) {
                console.log('Bonjour à tous!', response)
            }
        })
    }

    function closeMessagerieBox() {
        $('#recapPanierModalContent').css('position', 'relative');
        $('#recapPanierModalContent').css('left', '0px');
        $('#messagerieClientBox').addClass('none-messaboxe')
    }

    //changer l'input pour envoyer mail
    function changeinp(){
        $("#ajouterune").hide();
        $("#id-email-destinataire-notif2").show();
    }

    function changeinpu(){
        $("#ajouterune2").hide();
        $("#id-email-destinataire-notif3").show();
    }

    function changeinpu3(){
        $("#ajouterune3").hide();
        $("#id-email-destinataire-notif4").show();
    }

    function changeinpu4(){
        $("#ajouterune4").hide();
        $("#id-email-destinataire-notif5").show();
    }

   
    function showMarchandCommandDetails(id, ref_commande) {
   
       $('#commanade_ref_validation').val(ref_commande)
       $('#commanade_ref_validation-id').val(id)
   
       $.ajax({
       type: 'GET',
       url: '/get_marchand_commande_details',
       data: {id: id, ref_commande: ref_commande},
       success: function(data_response) {
   
       $('#clonned-col1').empty()
       $('#clonned-col2').empty()
       $('#clonned-col3').empty()
       $('#clonned-col4').empty()
       $('#clonned-col5').empty()
       $('#clonned-col6').empty()
       $('#clonned-col7').empty()
       $('#clonned-col8').empty()
   
       $('.marchand-commande-client-address').empty();
   
       console.log('Check new feature => ', data_response)
   
       var clonned_commande = data_response[2]
       var commande_clonned_info = data_response[3][0]
   
       $('#marchand-commande-counter_id_1').text(data_response[4].length)
   
       var tab_commande_clonned = []
       tab_commande_clonned += '<div style="display: flex">'
       var left_val = 0;
       for (let pc = 0; pc < clonned_commande.length; pc++) {
           left_val += 10;
           tab_commande_clonned += '<div class="boxcontenu2" style="background-color: #fff; border: none; position:relative; left: -'+left_val+'px; margin-left: 0px"><img src="'+clonned_commande[pc].image+'" style="max-height:45px" /></div>'
       }
       tab_commande_clonned += '</div>'
   
       $('#clonned-col1').append(commande_clonned_info.ref_commande)
       $('#clonned-col2').append(tab_commande_clonned)
       $('#clonned-col3').append(commande_clonned_info.nom+' '+commande_clonned_info.email)
       $('#clonned-col4').append(commande_clonned_info.nombre_article)
       $('#clonned-col5').append(commande_clonned_info.totaf_facturation)
   
       if (commande_clonned_info.mode_payement == 'AirtelMoney') {
           var mode_pay = '/assets/images/icons/AirtelMoney.svg'
           var img_pay = '<img src="'+mode_pay+'">'
           $('#clonned-col6').append(img_pay)
       }else if (commande_clonned_info.mode_payement == 'MoovMoney') {
           var mode_pay = '/assets/images/icones-vendeurs2/Moovmoney.svg'
           var img_pay = '<img src="'+mode_pay+'">'
           $('#clonned-col6').append(img_pay)
       }else if(commande_clonned_info.mode_payement == 'Visa') {
   
       }
   
       $('#clonned-col7').append(commande_clonned_info.status_commande)
       $('#clonned-col8').append(commande_clonned_info.date_commande)
   
       // traitement de status de la commande
       if (commande_clonned_info.status_commande == "En cours de traitement") {
           // $('#commande-en-traitement-statut').removeClass('field-none')
           // $('#commande-en-traitement-statut-running').removeClass()
           $('#commande-en-traitement-statut').addClass('field-none')
           $('#commande-expedier-statut').addClass('field-none')
           // $('#commande-encours-livraison-running').addClass('field-none')
       }else if(commande_clonned_info.status_commande == "Commande Expediée") {
           $('#commande-en-traitement-statut-running').addClass('field-none')
           $('#commande-en-traitement-statut').removeClass('field-none')
           $('#commande-expedier-statut').removeClass('field-none')
           $('#commande-encours-livraison-running').removeClass('field-none')
       }else {
           $('#commande-en-traitement-statut-running').removeClass('field-none')
           $('#commande-en-traitement-statut').addClass('field-none')
           $('#commande-expedier-statut').addClass('field-none')
           $('#commande-encours-livraison-running').addClass('field-none')
       }
   
       var response = data_response[0];
       var address_livraison = data_response[1][0]
       var client_livraison = [];
   
       client_livraison += '<article class="infoexpe" style="margin-top: 0px"><div class="textenteteinfo" style="width: 187px"><p class="penteteinfo">Facturé à :</p></div><div class="group3 zone-icons-grouppe" style="padding-left: 6px"><img src="/assets/images/icones-vendeurs2/user copy 2.svg" class="addr-icons"><img src="/assets/images/icones-vendeurs2/placeholder copy 2.svg" class="addr-icons"><img src="/assets/images/icones-vendeurs2/telephone.svg" class="addr-icons"></div>'
   
       client_livraison += '<div style="margin-top:-102px; margin-left: 46px"><p class="textcolora4-bis"  style="margin-top:14px;">'+address_livraison.prenom_nom+'</p><p class="textcolora4-bis"  style="margin-top:12px;">'+address_livraison.adresse+'</p><p class="textcolora4-bis"  style="margin-top:12px;">'+address_livraison.portable+'</p></div></article>'
   
       client_livraison += '<article class="infoexpe"><div class="textenteteinfo" style="width: 187px"><p class="penteteinfo">Livré à :</p></div><div class="group3 zone-icons-grouppe" style="padding-left: 6px"><img src="/assets/images/icones-vendeurs2/user copy 2.svg" class="addr-icons"><img src="/assets/images/icones-vendeurs2/placeholder copy 2.svg" class="addr-icons"><img src="/assets/images/icones-vendeurs2/telephone.svg" class="addr-icons"></div>'
   
       client_livraison += '<div style="margin-top:-102px; margin-left: 46px"><p class="textcolora4-bis"  style="margin-top:14px;">'+address_livraison.prenom_nom+'</p><p class="textcolora4-bis"  style="margin-top:12px;">'+address_livraison.adresse+'</p><p class="textcolora4-bis"  style="margin-top:12px;">'+address_livraison.portable+'</p></div></article></div>'
   
       $('.marchand-commande-client-address').append(client_livraison)
   
       commandes_product = [];
   
       $('#marchand-commandes-details').empty()
   
       console.log('Check response =>', response)
   
       if (response.length > 0) {
   
           var detail_commant_produit = response;
           var client_commande = [];
           for (let j = 0; j < detail_commant_produit.length; j++) {
   
           var id_produit_commande = detail_commant_produit[j]['idProduitCommande']
           commandes_product.push(id_produit_commande)
   
           var button_options1 = '<button class="btn-produit_rupture" onclick="validateProduitIndisponible('+detail_commant_produit[j]['idProduitCommande']+')">Produit en rupture</button>'
           var button_options2 = '<button class="btn-produit_disponible" onclick="validerProduitDisponible('+detail_commant_produit[j]['idProduitCommande']+')">Produit disponible</button>'
   
           client_commande += `
           <tr style="position: absolute" class="hide-commande-tr" onmouseleave="checkOver2(${id_produit_commande})"  id="detail-commande-hovered-layer-${id_produit_commande}" onclick="showSubcontent(${id_produit_commande})">
               <td colspan="9" style="height: inherit; border: transparent">
                   <div class="detail-commande-hover-zone" style="width: 701px"><span id="btn-prod-validation-${id_produit_commande}">${button_options1}  ${button_options2}</span><span class="field-none textcolorresume" id="text-prod-validation-${id_produit_commande}">J’ai vérifié ce produit, il est prêt à etre livré.</span><span class="field-none text-color-prod-indisponible" id="text-prod-indisponible-${id_produit_commande}">J’ai vérifié ce produit, il n’est plus disponible en stock.</span> <div class="field-none btn-edit-prod-statut" id="edit-prod-state-${id_produit_commande}" style="height: 36px; width: 36px; ">
           <img class="image-prod-option prod-option-edit" onclick="editProductCommandeState(${id_produit_commande})" src="/assets/images/tm_edit-off.svg" alt="">
       </div></div>
               </td>
           </tr>
           `
   
           client_commande += '<tr>'
   
           client_commande += '<td style="width: 25px"> <input type="checkbox" class="checkcommande form-check-input"  onclick="validerCommandeProdui('+id_produit_commande+')"></td>'
   
           client_commande += '<td class="contenu1 td-section" style="width: 110px">'+detail_commant_produit[j]['ref_produit']+'</td>'
   
           client_commande += '<td class="contenu4 td-section" style="width:347px;"><article class="commande-information-prod"><aside class="boxcontenu2-bis" style="margin-right: 10px"><img src="/'+detail_commant_produit[j]['image']+'" alt="" style="height: 34px;" /></aside><p class="contenu2d" style="text-align:left">'+detail_commant_produit[j]['libelle']+'</p></article></td>'
   
           client_commande += '<td class="contenu5 td-section" style="width: 72px">'+detail_commant_produit[j]['qte_commandee']+'</td>'
   
           client_commande += '<td class="td-section" style="width: 112px"> '+detail_commant_produit[j]['prix']+' Fcfa </td>'
   
           var prix_total = detail_commant_produit[j]['prix'] * detail_commant_produit[j]['qte_commandee']
   
           client_commande += '<td class="td-section" style="width: 112px"> '+prix_total+' Fcfa </td></tr>'
   
           }
   
           // console.log('Votre tableau est bien là:', client_commande)
           $('#detail-commande-marchant').removeClass('field-none')
   
           $('#marchand-commandes-details').append(client_commande)
   
       }
   
       }
       })
    }

    function validerCommandeProdui(id) {
        console.log('Le tableau avant est => ', commandes_product)
    
        $('#detail-commande-hovered-layer-'+id).removeClass('hide-commande-tr')
        var ref_commande = $('#commanade_ref_validation').val();
        var type_update = 2;
    
        // Passage dans le traitement en cours
        $.ajax({
        type: 'POST',
        url: '/update_commade_traitement_statut',
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        data: {ref_commande: ref_commande, type_update: type_update},
        success: function(response_data) {
    
        }
        })
    
    }

    function valideCommandeApresTraitement() {

        var ref_commande =  $('#commanade_ref_validation').val();
        var id_commande =  $('#commanade_ref_validation-id').val();
    
        console.log('Here is the ref ', ref_commande)
        $("#overlay-detail-commande-marchand").addClass('field-none');
        $('#detail-commande-marchant').addClass('field-none')
        $('#status_de_la_commande'+ref_commande).text('Commande Expédiée')
        $('#status_de_la_commande'+ref_commande).css('color', 'orange')
        // console.log('La ref de la commande est bien => ', ref_commande)
        var type_update = 1;
    
        $('#commande-line-'+id_commande).remove()
    
        $('#status_de_la_commande2NW5KEiUGR').text('Commande test')
    
        $.ajax({
        type: 'POST',
        url: '/update_commade_traitement_statut',
        data: {ref_commande: ref_commande, type_update: type_update, produit_dispo: commande_produit_disponible, produit_non_dispo: commande_produitf_non_disponible, id_commande: id_commande},
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        success: function(data_response) {
    
        if (data_response.length > 0) {
    
        var sigle_client = data_response[0];
        var sigle_client_adress = data_response[1];
    
        var client_lat_init, client_lng_init;
        var boutique_lat_init, boutique_lng_init;
    
        var nom_client = sigle_client.prenom_nom;
        var num_client = sigle_client_adress.portable;
        var adresse = sigle_client_adress.adresse
        var client_email = sigle_client.user_email;
        var client_telephone = sigle_client.portable;
        var client_adress_livraison = sigle_client.adresse_livraison
        var client_lat = sigle_client.client_lat;
        var client_lng = sigle_client.client_lng
    
        // console.log('La latitude est => ', client_lat, 'Et la longitude est => ', client_lng)
    
        if (client_lat == null || client_lng == null) {
    
            client_lat_init = "";
            client_lng_init = "";
    
        }else {
            client_lat_init = client_lat;
            client_lng_init = client_lng;
        }
    
        // -----------------------marchand data ---------------------
        var num_pickup = sigle_client.numero_tel
        var nom_boutique = sigle_client.boutique_name
        var heure_ramassage = sigle_client.ramasser_avant
        var boutique_lat = sigle_client.latitude_boutique
        var boutique_lng = sigle_client.longitude_boutique
        var boutique_adresse = sigle_client.boutique_adresse
        var heure_livraison = sigle_client.livrer_avant
    
        if (boutique_lat == null || boutique_lng == null) {
    
        boutique_lat_init = "";
        boutique_lng_init = "";
    
        }else {
        boutique_lat_init = boutique_lat;
        boutique_lng_init = boutique_lng;
        }
    
        // déclaration de tookan
        var request = new XMLHttpRequest();
    
        request.open('POST', 'https://api.tookanapp.com/v2/create_task')
        request.setRequestHeader('content-type', 'application/json');
    
    request.onreadystatechange = function() {
        if (this.readyState === 4) {
    
            console.log('Status:', this.status);
            console.log('Les données sont:', this.data);
            console.log('Headers', this.getAllResponseHeaders());
            var responseData = JSON.parse(this.responseText);
            console.log('Objet JSON EST BIEN => ', responseData)
            console.log('Body request is', this.responseText, ' For job id', responseData.status, 'For pickup_job_id:', responseData.data);
            var data_tookan = responseData.data;
            var job_id = data_tookan.job_id
            var pickup_id = data_tookan.pickup_job_id
            var delivery_id = data_tookan.delivery_job_id
            var order_id = data_tookan.order_id
            var delivery_tracing_link = data_tookan.delivery_tracing_link
            var pickup_tracking_link = data_tookan.pickup_tracking_link
    
            console.log('Le pickup est bien => ', pickup_id, 'et le numero delivery', delivery_id)
    
            $.ajax({
                type: 'POST',
                url: '/create_tookan_task',
                data: {job_id: job_id, pickup_id: pickup_id, delivery_id: delivery_id, order_id: order_id, delivery_tracing_link: delivery_tracing_link, pickup_tracking_link: pickup_tracking_link},
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                success: function(response) {
                    console.log('Task created in your database')
                }
            })
        }
    };
    
    // "api_key": "5366628cf7470e111b512f6b4e4b75471aedc2fa2bdf7d36551f01c4",
    var body = {
            "api_key": "53666380f1420d181e5a797b12112d471aedccfe28db7e385b1508c3",
            "order_id": ref_commande,
            "team_id": "",
            "auto_assignment": "1",
            "job_description": "Livraison de la commande",
            "job_pickup_phone": num_pickup,
            "job_pickup_name": nom_boutique,
            "job_pickup_email": "",
            "job_pickup_address": boutique_adresse,
            "job_pickup_latitude": "",
            "job_pickup_longitude": boutique_lng_init,
            "job_pickup_datetime": heure_ramassage,
            "customer_email": client_email,
            "customer_username": nom_client,
            "customer_phone": client_telephone,
            "customer_address": client_adress_livraison,
            "latitude": client_lat_init,
            "longitude": client_lng_init,
            "job_delivery_datetime": heure_livraison,
            "has_pickup": "1",
            "has_delivery": "1",
            "layout_type": "0",
            "tracking_link": 1,
            "timezone": "-60",
            "pickup_custom_field_template": "Ramassage_&_Livraison",
            "pickup_meta_data": [
                {
                "label": "Prix_de_la_livraison",
                "data": "1000 Fcfa"
                },
                {
                "label": "Mode_de_paiement",
                "data": "Payé"
                }
            ],
            "fleet_id": "",
            "p_ref_images": [
    
            ],
            "ref_images": [
    
            ],
            "notify": 1,
            "tags": "",
            "geofence": 0,
            "ride_type": 0
            }
    
            request.send(JSON.stringify(body));
    
            }
            console.log('He are data response => ', data_response)
        }
    
        })
    }

    function validerProduitDisponible(id) {

        var product_index = commandes_product.indexOf(id)
    
        if (product_index != -1) {
            commande_produit_disponible.push(id)
        }
        // commandes_product.splice(product_index, 1)
    
        var type_validation = 1;
        $('#btn-prod-validation-'+id).addClass('field-none')
        $('#text-prod-validation-'+id).removeClass('field-none')
        $('#edit-prod-state-'+id).removeClass('field-none')
    
        $.ajax({
            type: 'POST',
            url: '/update_produit_state',
            data: {id_produit: id, type_validation: type_validation},
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            success: function(data_prod_disponible) {
                console.log('Produit state => ', data_prod_disponible)
            }
        })
    
        if (commande_produit_disponible.length == commandes_product.length) {
            $("#maligneresume1B").show();
            $("#maligneresume2B").hide();
            $("#resumecom1").css({"filter":" blur(1px)","-webkit-backdrop-filter": "blur(3px)"});
            $("#overlay-detail-commande-marchand").removeClass('field-none');
            $("#blockblur1").show();
            $("#numerosuivi").css("margin-top","-243px");
            $('#commanade_ref_validation').val()
        }else if((commande_produit_disponible.length + commande_produitf_non_disponible.length) == commandes_product.length) {
            $("#maligneresume1B").show();
            $("#maligneresume2B").hide();
            $("#resumecom1").css({"filter":" blur(1px)","-webkit-backdrop-filter": "blur(3px)"});
            $("#overlay-detail-commande-marchand").removeClass('field-none');
            $("#blockblur1").show();
            $("#numerosuivi").css("margin-top","-243px");
            $('#commanade_ref_validation').val()
        }
    
    }

    function validateProduitIndisponible(id) {

        var product_index = commandes_product.indexOf(id)
    
        if (product_index != -1) {
            commande_produitf_non_disponible.push(id)
        }
    
        var type_validation = 0;
        $('#btn-prod-validation-'+id).addClass('field-none');
        $('#text-prod-indisponible-'+id).removeClass('field-none')
        $('#edit-prod-state-'+id).removeClass('field-none')
    
        $.ajax({
            type: 'POST',
            url: '/update_produit_state',
            data: {id_produit: id, type_validation: type_validation},
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            success: function(data_prod_disponible) {
                console.log('Produit state => ', data_prod_disponible)
            }
        })
    
        if (commande_produitf_non_disponible.length == commandes_product.length) {
            $("#maligneresume1B").show();
            $("#maligneresume2B").hide();
            $("#resumecom1").css({"filter":" blur(1px)","-webkit-backdrop-filter": "blur(3px)"});
            $("#overlay-detail-commande-marchand").removeClass('field-none');
            $("#blockblur1").show();
            $("#numerosuivi").css("margin-top","-243px");
            $('#commanade_ref_validation').val()
        }else if((commande_produit_disponible.length + commande_produitf_non_disponible.length) == commandes_product.length) {
            $("#maligneresume1B").show();
            $("#maligneresume2B").hide();
            $("#resumecom1").css({"filter":" blur(1px)","-webkit-backdrop-filter": "blur(3px)"});
            $("#overlay-detail-commande-marchand").removeClass('field-none');
            $("#blockblur1").show();
            $("#numerosuivi").css("margin-top","-243px");
            $('#commanade_ref_validation').val()
        }
    
    }

    function editProductCommandeState(id) {

        var product_index1 = commande_produit_disponible.indexOf(id)
        var product_index2 = commande_produitf_non_disponible.indexOf(id)
    
        if (product_index1 != -1) {
            commande_produit_disponible.splice(product_index1, 1)
        }
    
        if (product_index2 != -1) {
            commande_produitf_non_disponible.splice(product_index2, 1)
        }
    
        console.log('Tab actuel est => ', commande_produit_disponible)
    
    
        $('#btn-prod-validation-'+id).removeClass('field-none');
        $('#text-prod-indisponible-'+id).addClass('field-none')
        $('#text-prod-validation-'+id).addClass('field-none')
        $('#edit-prod-state-'+id).addClass('field-none')
    }

    function showMarchandCommandDetailsHistotique(id, ref_commande) {

        $('#commanade_ref_validation').val(ref_commande)
        $('#commanade_ref_validation-id').val(id)
    
        $.ajax({
        type: 'GET',
        url: '/get_marchand_commande_details',
        data: {id: id},
        success: function(data_response) {
    
        console.log('Your data response => ', data_response)
    
        $('#clonned-col1-h').empty()
        $('#clonned-col2-h').empty()
        $('#clonned-col3-h').empty()
        $('#clonned-col4-h').empty()
        $('#clonned-col5-h').empty()
        $('#clonned-col6-h').empty()
        $('#clonned-col7-h').empty()
        $('#clonned-col8-h').empty()
        $('.marchand-commande-client-address-h').empty();
    
        var clonned_commande = data_response[2]
        var commande_clonned_info = data_response[3][0]
        var tab_commande_clonned = []
        tab_commande_clonned += '<div style="display: flex">'
        var left_val = 0;
        for (let pc = 0; pc < clonned_commande.length; pc++) {
            left_val += 10;
            tab_commande_clonned += '<div class="boxcontenu2" style="background-color: #fff; border: none; position:relative; left: -'+left_val+'px; margin-left: 0px"><img src="'+clonned_commande[pc].image+'" style="max-height:45px" /></div>'
        }
        tab_commande_clonned += '</div>'
    
        $('#clonned-col1-h').append(commande_clonned_info.ref_commande)
        $('#clonned-col2-h').append(tab_commande_clonned)
        $('#clonned-col3-h').append(commande_clonned_info.nom+' '+commande_clonned_info.email)
        $('#clonned-col4-h').append(commande_clonned_info.nombre_article)
        $('#clonned-col5-h').append(commande_clonned_info.totaf_facturation)
    
        if (commande_clonned_info.mode_payement == 'AirtelMoney') {
            var mode_pay = '/assets/images/icons/AirtelMoney.svg'
            var img_pay = '<img src="'+mode_pay+'">'
            $('#clonned-col6-h').append(img_pay)
        }else if (commande_clonned_info.mode_payement == 'MoovMoney') {
            var mode_pay = '/assets/images/icones-vendeurs2/Moovmoney.svg'
            var img_pay = '<img src="'+mode_pay+'">'
            $('#clonned-col6-h').append(img_pay)
        }
    
        $('#clonned-col7-h').append(commande_clonned_info.status_commande)
        $('#clonned-col8-h').append(commande_clonned_info.date_commande)
    
        // traitement de status de la commande
        if (commande_clonned_info.status_commande == "En cours de traitement") {
            $('#commande-en-traitement-statut').addClass('field-none')
            $('#commande-expedier-statut').addClass('field-none')
        }else if(commande_clonned_info.status_commande == "Commande Expediée") {
            $('#commande-en-traitement-statut-running').addClass('field-none')
            $('#commande-en-traitement-statut').removeClass('field-none')
            $('#commande-expedier-statut').removeClass('field-none')
            $('#commande-encours-livraison-running').removeClass('field-none')
        }
    
        var response = data_response[0];
        var address_livraison = data_response[1][0]
        var client_livraison = [];
    
        client_livraison += '<article class="infoexpe" style="margin-top: 0px"><div class="textenteteinfo" style="width: 187px"><p class="penteteinfo">Facturé à :</p></div><div class="group3 zone-icons-grouppe" style="padding-left: 6px"><img src="/assets/images/icones-vendeurs2/user copy 2.svg" class="addr-icons"><img src="/assets/images/icones-vendeurs2/placeholder copy 2.svg" class="addr-icons"><img src="/assets/images/icones-vendeurs2/telephone.svg" class="addr-icons"></div>'
    
        client_livraison += '<div style="margin-top:-102px; margin-left: 46px"><p class="textcolora4-bis"  style="margin-top:14px;">'+address_livraison.prenom_nom+'</p><p class="textcolora4-bis"  style="margin-top:12px;">'+address_livraison.adresse+'</p><p class="textcolora4-bis"  style="margin-top:12px;">'+address_livraison.portable+'</p></div></article>'
    
        client_livraison += '<article class="infoexpe"><div class="textenteteinfo" style="width: 187px"><p class="penteteinfo">Livré à :</p></div><div class="group3 zone-icons-grouppe" style="padding-left: 6px"><img src="/assets/images/icones-vendeurs2/user copy 2.svg" class="addr-icons"><img src="/assets/images/icones-vendeurs2/placeholder copy 2.svg" class="addr-icons"><img src="/assets/images/icones-vendeurs2/telephone.svg" class="addr-icons"></div>'
    
        client_livraison += '<div style="margin-top:-102px; margin-left: 46px"><p class="textcolora4-bis"  style="margin-top:14px;">'+address_livraison.prenom_nom+'</p><p class="textcolora4-bis"  style="margin-top:12px;">'+address_livraison.adresse+'</p><p class="textcolora4-bis"  style="margin-top:12px;">'+address_livraison.portable+'</p></div></article></div>'
    
        $('.marchand-commande-client-address-h').append(client_livraison)
    
        commandes_product = [];
    
        $('#marchand-commandes-details-historique').empty()
    
        console.log('Check response =>', response)
    
        if (response.length > 0) {
    
            var detail_commant_produit = response;
            var client_commande = [];
            for (let j = 0; j < detail_commant_produit.length; j++) {
    
            var id_produit_commande = detail_commant_produit[j]['idProduitCommande']
            commandes_product.push(id_produit_commande)
    
            var button_options1 = '<button class="btn-produit_rupture" onclick="validateProduitIndisponible('+detail_commant_produit[j]['idProduitCommande']+')">Produit en rupture</button>'
            var button_options2 = '<button class="btn-produit_disponible" onclick="validerProduitDisponible('+detail_commant_produit[j]['idProduitCommande']+')">Produit disponible</button>'
    
            client_commande += `
            <tr style="position: absolute" class="hide-commande-trh" onmouseleave="checkOver2(${id_produit_commande})"  id="detail-commande-hovered-layer-${id_produit_commande}" onclick="showSubcontent(${id_produit_commande})">
                <td colspan="9" style="height: inherit; border: transparent">
                    <div class="detail-commande-hover-zone-historique" style="width: 701px">
        </div></div>
                </td>
            </tr>
            `
    
            client_commande += '<tr>'
    
            console.log('La valeur de inStock est => ', detail_commant_produit[j]['inStock'])
            if (detail_commant_produit[j]['inStock'] == 'oui') {
                client_commande += '<td style="width: 25px"> <input type="checkbox" class="checkcommande form-check-input" checked  onclick="validerCommandeProdui('+id_produit_commande+')"></td>'
            }else {
                client_commande += '<td style="width: 25px"> <input type="checkbox" class="checkcommande form-check-input"  onclick="validerCommandeProdui('+id_produit_commande+')"></td>'
            }
    
    
    
            client_commande += '<td class="contenu1 td-section" style="width: 110px">'+detail_commant_produit[j]['ref_produit']+'</td>'
    
            client_commande += '<td class="contenu4 td-section" style="width:347px;"><article class="commande-information-prod"><aside class="boxcontenu2-bis" style="margin-right: 10px"><img src="/'+detail_commant_produit[j]['image']+'" alt="" style="height: 34px;" /></aside><p class="contenu2d" style="text-align:left">'+detail_commant_produit[j]['libelle']+'</p></article></td>'
    
            client_commande += '<td class="contenu5 td-section" style="width: 72px">'+detail_commant_produit[j]['qte_commandee']+'</td>'
    
            client_commande += '<td class="td-section" style="width: 112px"> '+detail_commant_produit[j]['prix']+' Fcfa </td>'
    
            var prix_total = detail_commant_produit[j]['prix'] * detail_commant_produit[j]['qte_commandee']
    
            client_commande += '<td class="td-section" style="width: 112px"> '+prix_total+' Fcfa </td></tr>'
    
            }
    
            // console.log('Votre tableau est bien là:', client_commande)
            $('#detail-commande-marchant-historique').removeClass('field-none')
    
            $('#marchand-commandes-details-historique').append(client_commande)
    
        }
    
        }
        })
    }

    function resetFromBasket(id) {
        console.log(id)
        $.ajax({
        method: 'PUT',
        url: 'reset_corbeille_produit/'+id,
        data: {},
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        success: function(response) {
            $('#basket_row'+id).remove();
            console.log('gloire à Dieu', response)
    
        }
        })
        // alert('reset here', id)
    }

    function removeFromBasket(bid, id) {
        console.log('voici id', id)
        $.ajax({
        method: 'PUT',
        url: 'remove_from_basket/'+id,
        data: {},
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        success: function(response) {
            $('#basket_row'+bid).remove();
    
            console.log('bonne requette de basket', response)
        }
        })
    }

    function matchCustom(params, data) {
        // If there are no search terms, return all of the data
        if ($.trim(params.term) === '') {
            return data;
        }
    
        // Do not display the item if there is no 'text' property
        if (typeof data.text === 'undefined') {
            return null;
        }
    
        // `params.term` should be the term that is used for searching
        // `data.text` is the text that is displayed for the data object
        if (data.text.indexOf(params.term) > -1) {
            var modifiedData = $.extend({}, data, true);
            modifiedData.text += ' (matched)';
    
            // You can return modified objects from here
            // This includes matching the `children` how you want in nested data sets
            return modifiedData;
        }
    
        // Return `null` if the term should not be displayed
        return null;
    }

    function getcollab(){
        $.ajax({
        type: "GET",
        url: "/collabo2",
        data: "",
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        success:function(response){
        $('#datalistOptions').empty()
        console.log(response)
        for (let i = 0; i < response.length; i++) {
            const element = "<option>"+response[i].mail_collabo+"</option>"
            $('#exampleDataList').append(element)
        }
    
        }
        })
     }

     function testCodeP(){
        var y = document.getElementById("activer_code");
        var x = document.getElementById("input_code");
        if (y.innerHTML == "Activer") {
    
        event.preventDefault();
        var code_promo = $('#input_code').val();
        var remise = $('#total_remise').text();
        var prix = $('#total-panier').text();
    
        var promo = {
            code_promo : code_promo,
            remise : remise,
            prix : prix,
    
            _token: $('#token').val()
        }
    
        $.ajax({
        type: 'POST',
        url: '/panier/promo',
        data: promo,
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        success:function(rep){
            console.log(rep)
            var prixB = (parseInt(prix)*rep)/100
            if (rep<80){
            $('#total_remise').text(rep+" %")
            $('#total-panier').text(parseInt(prix)-prixB+" Fcfa")
            $('#total_panier').show()
            $('#success').show()
            $('#erreur').hide()
            $('#reduct').hide()
            $('#retir').hide()
            y.innerHTML = "Retirer"
            }
            else {
            $('#total_remise').text(rep+" Fcfa")
            $('#total-panier').text(parseInt(prix)-rep+" Fcfa")
            $('#total_panier').show()
            $('#success').show()
            $('#erreur').hide()
            $('#reduct').hide()
            $('#retir').hide()
            y.innerHTML = "Retirer"}
    
            },
            error:function(err){
    
                $('#success').hide()
                $("#erreur").show();
                $('#reduct').show()
                $('#total_panier').hide()
                $('#total-panier').text(prix)
                $('#retir').hide()
            }
            })
         }
    
        else if (y.innerHTML == "Retirer"){
    
        event.preventDefault();
    
        var code_promo = $('#input_code').val();
        var remise = $('#total_remise').text();
        var prix = $('#total-panier').text();
        var prixB = $('#sous-total-panier').text();
    
        var promo = {
            code_promo : code_promo,
            remise : remise,
            prix : prix,
            prixB : prixB,
            _token: $('#token').val()
        }
    
        $.ajax({
        type: 'POST',
        url: '/panier/promo',
        data: promo,
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        success:function(rep){
    
        console.log(rep)
    
        if (rep<80){
    
        $('#total-panier').text(prixB)
        $("#input_code").val(" ")
        $('#reduct').show()
        $('#total_remise').hide()
        $('#success').hide()
        $('#retir').show()
        $('#total_panier').hide()
        y.innerHTML = "Activer"
        }
        else{
            var prixt = parseInt(prix) +parseInt(rep)
        $('#total-panier').text(prixt+" Fcfa")
        $("#input_code").val(" ")
        $('#reduct').show()
        $('#total_remise').hide()
        $('#success').hide()
        $('#retir').show()
        $('#total_panier').hide()
    
        y.innerHTML = "Activer"
        }
        },
        error:function(err){
    
            $('#success').hide()
            $("#erreur").show();
            $('#reduct').show()
            $('#total_panier').hide()
            $('#total-panier').text(prix.toLocaleString())
            $('#retir').hide()
        }
        })
    
        }
    }

    //annuler btn marchand changer proprio
    function annulerchangerpro(){

        $("#transfertPro").modal('hide')

    }

    function cartecredit(){

        var numero_carte = $('#m-numero-carte').val();
        var proprietaire_carte = $('#m-propprietaire-carte').val();
        var date_experition = $('#m-propprietaire-carte').val();
        var code_securite = $('#m-code-securite-carte').val()
        
        var data = {
            numero_carte: numero_carte,
            proprietaire_carte: proprietaire_carte,
            date_experition: date_experition,
            code_securite: code_securite
        }
        
        $.ajax({
            method: 'POST',
            url: 'save_credit_card',
            data: data,
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            success: function(response) {
                console.log('voici votre credit', response)
            }
        })
        
        }

        
    function ajouterservicebk(){
        var numero_marchand_rg = $('#m-numero-marchand').val();
        var code_marchand_rg = $('#m-code-marchand').val();

        var m_numero_moov = $('#m-numero-moov').val();
        var m_code_moov = $('#m-code-moov').val();

        $.Ajax({
            method: 'POST',
            url: 'save_service_mobile',
            data: {},
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        })
        console.log('Gloire à Dieu')

    }

    function returnservicebk(){
        $('#servicebk1').show();
        $('#cartecredit2').hide();
        $('#servicebk2').hide();
        $('#cartecredit1 ').removeClass("blockcs");
    }

    // affichage des filtres
    function afficherFiltreOption() {
        $('#nav-slide').css('width', '1%')
        $('#nav-slide').css('display', 'none')
        $('#nav-slide1').css('display', 'block')
        $('#nav-slide1').css('width', '72% !important')
        // console.log('Filtre displayer')
    }

    // function forgetPassword(source) {

    //     if (source == 0) {
    //     $('#pwd_modification_source').val(source)
    //     $('#registerLoginModal .close-btn').click()
    //     $('.modal-backdrop').remove() // removes the grey overlay.
    
    //     $('#exampleModal_pwd').modal({
    //         backdrop: 'static',
    //         keyboard: false
    //     })
    
    //     $('#exampleModal_pwd').modal('show');
    
    //     }else if(source == 1) {
    
    //     $('#pwd_modification_source').val(source)
    //     $('#inviteRegisterLoginModal').modal('hide')
    
    //     $('#exampleModal_pwd').modal({
    //         backdrop: 'static',
    //         keyboard: false
    //     })
    
    //     $('#exampleModal_pwd').modal('show');
    //     }
    
    // }
    
    function closeUserProfilModal() {
        $('#userProfilModal').modal('hide')
    }

    
function keep_shopping_2() {

    $('#commandeSuccessModal').modal('hide')
    
    $.ajax({
        type: 'GET',
        url: '/get_client_commande',
        data: {},
        success: function(response) {

        if (response.length > 0) {

        $('#tab-client-commande').empty()

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
            client_commande += '<tr height="60px" onmouseenter="checkOver('+id_commande+')" onmouseleave="checkOver2('+id_commande+')" class="commande-rows" data-commade="'+response[index].id+'" style="background-color: redd" >'

            client_commande += `
                <td style="width: 50px">
                    <span id="images_temps-${id_commande}"><img src="/assets/images2/Fermes2.svg" alt="" /></span>
                    <span id="images_temps1-${id_commande}" class="hide-commande-tr"><img src="/assets/images2/Ouvert.svg" alt="" /></span>
                </d>
            `

            client_commande += '<td class="contenu1 td-section" >'+response[index].ref_commande.toUpperCase()+'</td><td class="contenu4 td-section" style="width: 56px">'+response[index].quantite_total+'</td><td class="contenu5 td-section" style="width: 112px;">'+response[index].totaf_facturation+' Fcfa</td>'

            client_commande += '<td class="td-section" style="width: 56px;"> <img src="'+mode_pay+'"></td><td class="commande-middle td-section" >En cours de traitement</td><td class="contenu2 td-section" style="width:101px">'+response[index].date_commande+'</td><td class="contenu2 td-section" style="width: 51px"><span class="facture-pdf">PDF</span></td>'

            client_commande += '<td class="contenu2 td-section" onmouseout="checkOver3('+id_commande+')" style="width: 147px;"><button onclick=nouvelCommande("'+id_commande+'") class="re-commander">Nvl. Commande</button></td></tr>'

            client_commande += '<tr class="hide-commande-tr default-tr-close-selector" id="detail-commande-'+response[index].id+'"><td colspan="9"><div class="commande-sub-content"><div class="commande-sub-content-adress">'

            client_commande += '<div class="infocliff" style="background-color: yellow1">'

            client_commande += `
            <div class="textenteteinfo" style="width: 187px; background-color:greenf"><p class="penteteinfo">Facturé à :</p></div>
            `
            client_commande += `<div class="group3 zone-icons-grouppe" style="background-color: bluess">`

            client_commande += `
            <img src="/assets/images/icones-vendeurs2/user copy 2.svg" class="addr-icons"><img src="/assets/images/icones-vendeurs2/placeholder copy 2.svg" class="addr-icons"><img src="/assets/images/icones-vendeurs2/telephone.svg" class="addr-icons"></div>
            `

            client_commande += '<div style="margin-top:-114px; margin-left: 46px; ">'

            // pointer
            client_commande += '<div class="textcolora4-bis commande-addr-detail" style="margin-top:14px;" >Jules</div>'

            client_commande += '<div class="textcolora4-bis commande-addr-detail" >okala</div>'

            client_commande += '<div class="textcolora4-bis commande-addr-detail" >074846163</div>'

            client_commande += '</div></div>'

            client_commande += '<div class="infoexpe" style="display:noned"><div class="textenteteinfo" style="width: 187px"><p class="penteteinfo">Livré à :</p></div>'

            client_commande += '<div class="group3 zone-icons-grouppe">'

            client_commande += '<img src="/assets/images/icones-vendeurs2/user copy 2.svg" class="addr-icons"><img src="/assets/images/icones-vendeurs2/placeholder copy 2.svg" class="addr-icons"><img src="/assets/images/icones-vendeurs2/telephone.svg" class="addr-icons"></div>'

            client_commande += '<div style="margin-top:-102px; margin-left: 46px">'

            client_commande += '<div class="textcolora4-bis commande-addr-detail" style="" >Luise</div>'

            client_commande += '<div class="textcolora4-bis commande-addr-detail" >okala</div>'

            client_commande += '<div class="textcolora4-bis commande-addr-detail" >lalala</div>'

            client_commande += '</div></div></div>';

            client_commande += `<div class="commande-sub-content-details">
                <div class="commande-client-recap-tile"><span class="commande-resume-header">RÉSUMÉ DE LA COMMANDE</span></div>`

            client_commande += `<table id="commande-tablebis" style=" width: 640px !important; left: 0px !important; margin-top: 0px">
            <thead>
                <tr class="commande-resume-table-header"><td class="tab-comm-element" style="width: 110px">Référence</td><td class="tab-comm-element" style="width:347px; text-align:left; padding-left: 15px">Article(s)</td><td class="tab-comm-element">Quantité</td><td class="tab-comm-element">Prix unitaire</td>
                </tr>
            </thead>
            </table>
            `

            client_commande += `<div class="children-sub-table" style="width:640px !important"><table><tbody id="tab-client-commande-sub-content-${id_commande}">`

            if (detail_commant_produit.length > 0) {

                for (let j = 0; j < detail_commant_produit.length; j++) {
                    client_commande += '<tr><td class="contenu1 td-section" style="width: 110px">'+detail_commant_produit[j]['ref_produit']+'</td><td class="contenu4 td-section" style="width:347px;"><article class="commande-information-prod" ><aside class="boxcontenu2-bis" style="margin-right: 10px; height: 34px; width:34px;"><img src="/'+detail_commant_produit[j]['image']+'" alt="" style="height: auto; width: 100%" /></aside><span class="contenu2 commande-libelle-prod-detail" style="text-align:left">'+detail_commant_produit[j]['libelle']+'</span></article></td><td class="contenu5 td-section" style="width: 72px">'+detail_commant_produit[j]['quantite']+'</td><td class="td-section detail-commade-price"> '+detail_commant_produit[j]['prix']+' Fcfa </td></tr>'
                }

            }

            client_commande += '</tbody></div></table></div></div></td></tr>'

            $('#tab-client-commande').append(client_commande)

            }

        }

    }
    })
        $('#defaul-menu-courant-user').addClass('applied-width')
        $('#commande-options-zone').removeClass('hide-commande-tr')
        $(".mydata-menu-profil").removeClass('active-menu-left')
        $(".donnees-menu-profil").hide();
        $(".photo-profil-classe").hide();
        $('#userProfilModal').modal('show')
        $('#mes-commandes').show()
    }

    document.getElementById('userProfilModal').addEventListener('click', function(event) {

        var adress_input = document.getElementById('formAddCarnetAdresseUser_adresse')
        var adress_input_user = document.getElementById('formEditUser_adresse-input')
        var map_section = document.getElementById('zone-adresse-map').getElementsByTagName('div')
        const firstChild = map_section[5];
        var map_special_zone = document.getElementsByClassName('gm-style')
    
        var clickedElement = event.target;
    
        var parentElement = null;
        parentElement = clickedElement.parentNode;
    
        var parent_node_map_attr = parentElement.getAttribute('aria-label')
        var parent_node_map_attr2 = parentElement.getAttribute('title')
    
    
        console.log('Le direct map => ', parent_node_map_attr)
        console.log('Second map attribute is => ', parent_node_map_attr2)
    
    
        if (parent_node_map_attr === 'Map' || parent_node_map_attr === 'Carte') {
    
        }else if ((event.target === adress_input) || (event.target === adress_input_user)) {
    
        }else if(clickedElement.tagName.toLowerCase() === 'area') {
    
        }else if((clickedElement.getAttribute('aria-label') === 'Show satellite imagery') || (clickedElement.getAttribute('aria-label') === 'Afficher les images satellite')){
    
        }else if((clickedElement.getAttribute('aria-label') === 'Show street map') || (clickedElement.getAttribute('aria-label') === 'Afficher un plan de ville')) {
    
        }else if((clickedElement.getAttribute('aria-label') === 'Zoom in') || (clickedElement.getAttribute('aria-label') === 'Zoom avant')){
    
        }else if((clickedElement.getAttribute('aria-label') === 'Zoom out') || (clickedElement.getAttribute('aria-label') === 'Zoom arrière')) {
    
        }else if((clickedElement.getAttribute('title') === 'Drag Pegman onto the map to open Street View') || (clickedElement.getAttribute('title') === 'Faites glisser Pegman sur la carte pour ouvrir Street View')) {
    
        }else if((clickedElement.getAttribute('aria-label') === 'Toggle fullscreen view') || (clickedElement.getAttribute('aria-label') === 'Passer en plein écran')) {
    
        }else if(clickedElement.getAttribute('aria-label') === 'Me geolocaliser') {
    
        }else if(clickedElement.tagName.toLowerCase() === 'img') {
    
        }else {
            $('#map-drop-box-effect').addClass('hide')
            $('#map-drop-box-effect-user').addClass('hide')
            $('#zone-adresse-map').addClass('hidden-google-map')
            $('#zone-adresse-map-user').addClass('hidden-google-map')
        }
    
        console.log('Element zone => ', event.target)
    
    })

$(document).ready(function() {
    let storage_data_commande = JSON.parse(window.localStorage.getItem('commande_succes'));
    if (storage_data_commande != null) {
        var id_commande = storage_data_commande['status_commande']
       
        keep_shopping_2()

        setTimeout(() => {
            window.localStorage.removeItem('commande_succes')
        }, 3000);
    }

    $('#voir_commandes').on('click', function() {
        console.log('You want to know commande yep !!!')
        $.ajax({
        type: 'GET',
        url: '/get_client_commande',
        data: {},
        success: function(response) {
    
        if (response.length > 0) {
        $('#tab-client-commande').empty()
    
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
    
        // ------------------------- debut detail de commande ------------------------
        client_commande += '<tr class="hide-commande-tr default-tr-close-selector" id="detail-commande-'+response[index].id+'"><td colspan="9"><div class="commande-sub-content"><div class="commande-sub-content-adress"><article class="infocliff"><div class="textenteteinfo" style="width: 187px"><p class="penteteinfo">Facturé à :</p></div><div class="group3 zone-icons-grouppe">'
    
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
    
        client_commande += '</tbody></div></table></div></div></td></tr>' // fin detail de la commande
    
        $('#tab-client-commande').append(client_commande)
    
        }
    
        }
    
        }
        })
    
        $('#defaul-menu-courant-user').addClass('applied-width')
        $('#commande-options-zone').removeClass('hide-commande-tr')
        $(".mydata-menu-profil").removeClass('active-menu-left')
        $(".donnees-menu-profil").hide();
        $(".photo-profil-classe").hide();
    
        $('#userProfilModal').modal({
            backdrop: 'static',
            keyboard: false
        })
    
        $('#userProfilModal').modal('show')
        $('#mes-commandes').show()
    })
})





