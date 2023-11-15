function get_mobile_user_infos() {

   $.ajax({  //adresse livraison
   type: 'GET',
   url: '/get_user_infos_carnet',
   success: function(response) {

   let storage_data = JSON.parse(window.localStorage.getItem('adresse_invite'));
   
   if (response == 0 && $('#invite-email-connected').text() == 'default_email@gmail.com') { // Pas de users connecté et pas d'invite

   if (storage_data != null) {
        console.log('User as guess is ok ... ')
   } else {
       $('#tab-form-connection').removeClass('infos-invite-none')
   }

   console.log('Première condition ok ...')

   }else if (response['carnet'][0].length == 0) { // Cas ou il existe bien un utilisateur mais il y a pas d'adresse
   console.log('Deuxième conditionok ...')
   $('#invite-email-connected').text(response['email']) // Affichage d'adresse ensuite montrer le bouton user ajout adresse livraison
   $('#section-addresse-non-defini').removeClass('infos-invite-none')
   $('#section-addresse-bien-defini').addClass('infos-invite-none')
   $('#section-invite-infos-connected').removeClass('infos-invite-none')

   if (storage_data != null) {
       // window.localStorage.clear();
       window.localStorage.removeItem('adresse_invite')
   }

   $('.mobile-panier-user-email-val').text(response['email'])

   $("#ajout-nouvelle-adresse-element-id").show();
   $('#mobile-panier-user-email-id').hide()

   $('#mobile-login-data-id').show()
   $('#mobile-login-form-section-id').hide()


   } else { // Au cas ou y un utilisateur connecté

    $('.mobile-panier-user-email-val').text(response['email'])

    $('#mobile-login-data-id').show()
    $('#mobile-login-form-section-id').hide()

   if (storage_data != null) {
       // window.localStorage.clear();
       window.localStorage.removeItem('adresse_invite')
   }

   let carnet_addresse = response['carnet'][0];
    console.log('Ajout informations de l utilisateurs connecté')

    console.log("Le carnet que je veux scanner est bien => ", carnet_addresse[0]);
    $('.mobile-user-nom-prenom').text(carnet_addresse[0]['prenom_nom'])
    $('.mobile-user-adress').text(carnet_addresse[0]['adresse'])
    // $('.mobile-user-adress').text(response['carnet'][0]['adresse'])
    $('.mobile-user-ville').text(carnet_addresse[0]['ville'])
    // $('#mobile-user-complement').text(response['carnet'][0]['complement'])
    $('.mobile-user-phone').text(carnet_addresse[0]['portable'])

    console.log('Le compte devrait être bon à ce niveau')

   }
   },

   error: function(XMLHttpRequest, textStatus, errorThrown) {
       console.log("some error");
   }

   })
   }
