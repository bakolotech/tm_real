function get_tm_mode_expedition_mobile() {

    $.ajax({
    type: 'GET',
    url: '/get_expedtions_mode',
    success: function(response) {

    $('#mobile-panier-articles-expedition').empty()

    var sous_total = 0;
    var tab_exepedition = [];

    if (response.length > 0) {

    for (let h = 0; h < response.length; h++) {

    var data_expedition = response[h][2][0]

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
    // add expedition to an array 
    tab_exepedition.push(data_expedition['id'])

    $('#mobile-mode-expedition-'+data_expedition['id']).removeClass('vider')
    $('#expedition_input'+data_expedition['id']).attr('data-expedition', prix_expedition)

    }  // - Fin de la boucle

    // Check The default mode
    expedition_panier(tab_exepedition[0])
    $('#mobile-expedition-'+tab_exepedition[0]).attr('checked', true)

    if (sous_total > 20000) {
        prix_expedition = 'Gratuit'
        $('#expedition_prix-'+data_expedition['id']).text('Gratuit')
        $('#expedition_input'+data_expedition['id']).attr('data-expedition', 'Gratuit')
    }

    // Get all available checkbox

    }else {

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

       $('#mobile-mode-expedition-'+data_expedition['id']).removeClass('vider')
       $('#expedition_input'+data_expedition['id']).attr('data-expedition', prix_expedition)

       sous_total += response[h].prix*response[h]['0']

        // Check the default checkbox section
       expedition_panier(data_expedition['id'])
       $('#mobile-expedition-'+data_expedition['id']).attr('checked', true)

       if (sous_total > 20000) {
           prix_expedition = 'Gratuit'
           $('#expedition_prix-'+data_expedition['id']).text('Gratuit')
           $('#expedition_input'+data_expedition['id']).attr('data-expedition', 'Gratuit')
       }


    }

    }
    })
 }

function changement_mobile() {
    if($('#mobile-nemu-panier').hasClass('panier-btn-step-active')) {

        $("#mobile-panier-step-one").hide()
        $("#mobile-panier-step-two_0").show()

        $('#mobile-nemu-panier').removeClass('panier-btn-step-active')
        $('#mobile-nemu-panier').addClass('panier-btn-steps-succes')

        $('#mobile-nemu-expedition').removeClass('panier-btn-steps')
        $('#mobile-nemu-expedition').addClass('panier-btn-step-active')

        get_tm_mode_expedition_mobile()

        get_mobile_user_infos()

        $('#mobile-panier-back-btn').show();

    }else if($('#mobile-nemu-expedition').hasClass('panier-btn-step-active')) {

        if($('#mobile-login-data-id:visible').length != 0) {
            $('#mobile-nemu-expedition').removeClass('panier-btn-step-active')
            $('#mobile-nemu-expedition').addClass('panier-btn-steps-succes')
    
            $('#mobile-nemu-paiement').removeClass('panier-btn-steps')
            $('#mobile-nemu-paiement').addClass('panier-btn-step-active')
    
            $("#mobile-panier-step-one").hide()
            $("#mobile-panier-step-two_0").hide()
            $("#mobile-panier-step-two").show()
        } else {
            $('#mobile-login-form-section-id').addClass('box-error-login')
            console.log('Border this section with error class .box-error-login')
        }

    } else if($('#mobile-nemu-paiement').hasClass('panier-btn-step-active')) {

        $('#panier_version_v2').addClass('input-none-panier-v2')

        // $('#bachir-loader').modal({
        //     backdrop: 'static',
        //     keyboard: false
        // })

        count_paiement = 120;
        countDownPayement()
        // $('#bachir-loader').modal('show');
        $('#bachir-loader').removeClass('input-none-panier-v2')
        payer_via_mobile_service_mobile()

    }
}
