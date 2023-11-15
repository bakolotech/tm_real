
$(document).ready(function() {

    setInterval(() => {

    //  var userCode = '<?php if(isset($_SESSION["boutique_marchand_id"])) echo $_SESSION["boutique_marchand_id"] ;?>'
     // console.log('Bien dans set interval', userCode)
    //  if (userCode == '') {
    //      // console.log('Y a pas de marchand connecté')
    //  }else {

    //  }
    var userCode;

    if (typeof marchandUserCode !== 'undefined') {

    userCode = marchandUserCode;

     $.ajax({
        type: 'POST',
        url: '/get_new_marchand_new_command',
        data: {id_marchand: userCode},
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        success: function(marchand_commande_response) {

        if (marchand_commande_response.length > 0) {

        var current_number = $('#marchand-commande-counter_id_1').text()
        var current_notification = $('#count-notification-number-bis').attr('data-count');

        var new_number = Number(current_number) + 1; // Affichage de la notification
        var new_notification_number = Number(current_notification) + 1;

        $('#count-notification-number-bis').removeClass('field-none')
        $('#count-notification-number-bis').attr('data-count', new_notification_number)
        $('#count-notification-number-bis').text(new_notification_number);
        // console.log('<---------------------Le nouveau nombre est bien ------------------>', new_number)
        $('#marchand-commande-counter_id_1').text(new_number)

        setTimeout(() => {
            $('#count-notification-number-bis').addClass('field-none')
            $('#danger_puce_elemnet_id').removeClass('field-none')
        }, 1000); // Fin affichage de la notification

        // -------------------------------- Triger audi play ----------------------------
        var mp3_sound = "assets/mp3/beep-06.mp3"
        const audioContext = new (window.AudioContext || window.webkitAudioContext)();
        // Load audio file
        fetch(mp3_sound)
        .then(response => response.arrayBuffer())
        .then(data => audioContext.decodeAudioData(data))
        .then(buffer => {
            // Create a buffer source node
            const source = audioContext.createBufferSource();
            source.buffer = buffer;

            // Connect the source to the audio context's destination (i.e., speakers)
            source.connect(audioContext.destination);

            // Play the audio
            source.start();
        })
        .catch(error => console.error(error));
        // var audio = new Audio(mp3_sound);
        // audio.muted = false;
        // audio.play();
        // -------------------------------- Triger audi play end-------------------------

        $.ajax({
           type: 'POST',
           url: 'update_notified_commande',
           data: {commmand_data: marchand_commande_response},
           headers: {
               'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
           },
           success: function(data_commande_notified) {
           // console.log('Here is the data notified', data_commande_notified)
           }

        })

        // console.log(audio.play())
        }else {
            // console.log('Pas de nouvelle commande ', marchand_commande_response)
        }

        }
        })
    }

     // Begin to check user commande process
     var client_userCode;

     if (typeof userIdTookan !== 'undefined') {

        client_userCode = userIdTookan

        $.ajax({
        type: 'GET',
        url: '/get_client_current_commande',
        data: {id_user: client_userCode},
        success: function(response_commande) {
        // console.log('Here is response element => ', response_commande)
        var currentDate = new Date().toLocaleDateString();
        // console.log('La date démandé est bien => ', currentDate)

        if (response_commande[0].length > 0) {

        var commande_status_progress = response_commande[1]
        var heure1, heure2, heure3;

        for (let index = 0; index < commande_status_progress.length; index++) {
            if (commande_status_progress[index]['order_status'] == 'Commande confirmée') {
                heure1 = commande_status_progress[index]['step_hour']
            }

            if (commande_status_progress[index]['order_status'] == 'En cours de traitement') {
                heure2 = commande_status_progress[index]['step_hour']
            }

            if (commande_status_progress[index]['order_status'] == 'Commande Expediée') {
                heure3 = commande_status_progress[index]['step_hour']
            }

        }

        var commande_active = response_commande[0][0]['status_commande'];
        // console.log('Le status de la commande est bien => ', commande_active)

        if (commande_active == 'Commande confirmée') {

        $('#client_current_commande').removeClass('field-none')
        $('#commande-text-step-1').removeClass('field-none')

        $('#client-commande-step-1').removeClass('default-commande-btn')
        // $('#client-commande-step-1').addClass('current-commande-step')
        $('#client-commande-step-1').addClass('current-commande-step')

        $('#commande-date-verification').text(heure1)

        }else if(commande_active == 'En cours de traitement') {

        $('#client_current_commande').removeClass('field-none')

        $('#commande-text-step-1').removeClass('field-none')
        $('#client-commande-step-1').removeClass('default-commande-btn')
        $('#client-commande-step-1').removeClass('current-commande-step')

        $('#client-commande-step-1').addClass('commande-actif-step')
        $('#commande-step-text-1').removeClass('field-none')
        $('#date-step-1').removeClass('field-none')

        $('#li-step-1').removeClass('test-first-element')
        $('#li-step-1').addClass('test-first-element-active')

        // $('#commande-text-step-2').removeClass('field-none')
        // $('#commande-step-text-2').removeClass('field-none')
        $('#client-commande-step-2').removeClass('default-commande-btn')
        $('#client-commande-step-2').addClass('current-commande-step')
        $('#commande-text-step-2').removeClass('field-none')
        $('#date-step-1').text(heure2)

        // $('#date-step-2').removeClass('field-none')


        }else if (commande_active == 'Commande Expediée') {

        $('#client_current_commande').removeClass('field-none')
        // console.log('La commande a bien été expédié')

        $('#client-commande-step-3').addClass('active-commande-step')
        $('#client-commande-step-2').addClass('active-commande-step')
        $('#client-commande-step-1').addClass('active-commande-step')

        $('#date-step-3').removeClass('field-none')
        $('#date-step-2').removeClass('field-none')
        $('#date-step-1').removeClass('field-none')

        $('#date-step-3').text(heure3)
        $('#date-step-2').text(heure2)
        $('#date-step-1').text(heure1)

        $('#li-step-1').removeClass('test-first-element')
        $('#li-step-1').addClass('test-first-element-active')

        $('#li-step-2').removeClass('test-first-element')
        $('#li-step-2').addClass('test-first-element-active')

        $('#commande-step-text-3').removeClass('field-none')
        $('#commande-step-text-2').removeClass('field-none')
        $('#commande-step-text-1').removeClass('field-none')

        $('#commande-text-step-1').removeClass('field-none')
        $('#commande-text-step-2').removeClass('field-none')
        $('#commande-text-step-3').removeClass('field-none')

        $('#client-commande-step-1').removeClass('default-commande-btn')
        $('#client-commande-step-2').removeClass('default-commande-btn')
        $('#client-commande-step-2').removeClass('current-commande-step')
        $('#client-commande-step-3').removeClass('default-commande-btn')

        $('#client-commande-step-1').addClass('commande-actif-step')
        $('#client-commande-step-2').addClass('commande-actif-step')
        $('#client-commande-step-3').addClass('commande-actif-step')

        $('#commande-date-verification').text(heure1)

        $('#client-commande-step-4').addClass('current-commande-step')
        $('#client-commande-step-4').removeClass('default-commande-btn')
        $('#commande-text-step-4').removeClass('field-none')


        } else if(commande_active == 'Commande en cours de livraison') {

        }else if(commande_active == 'Commande livrée') {

        }
        else {
            $('#client_current_commande').addClass('field-none')
        }

        }
    }

    })
     }

    }, 5000);


     var id_marchand = '<?php if(isset($_SESSION["boutique_marchand_id"])) echo $_SESSION["boutique_marchand_id"] ;?>'

     if (id_marchand == '') {
         // console.log('Y a pas de marchand connecté')
     }else {
         $.ajax({
             type: 'GET',
             url: '/get_marchand_unread_notif',
             data: {id_marchand: id_marchand},
             success: function(response_unread) {

             if (response_unread.length > 0) {
                 $('#danger_puce_elemnet_id').removeClass('field-none')
             }

             }
         })
     }

 });
