$(document).ready(function() {
// --------------------------------------------------------------
setInterval(() => {
// console.log('User id is => ', userIdTookan)
if (typeof userIdTookan !== 'undefined') {
    // userId is defined, use it in your JavaScript code
    $.ajax({
    type: 'GET',
    url: '/get_client_tookan_current_job/'+userIdTookan,
    data: {},
    success: function(tookan_data_processing) {

    if (tookan_data_processing.length > 0) {

        var check_task = tookan_data_processing[0]; // recuperation de la task depuis la base
        // console.log('Here is data from base => ', check_task)
        var delivery_tracking_link = check_task.delivery_tracing_link; // lien de suivi
        var order_id_track = check_task.order_id; // id de la commande

        // Préparation de la requette XMLHttpRequest
        var request = new XMLHttpRequest();

        request.open('POST', 'https://api.tookanapp.com/v2/get_job_details_by_order_id')
        request.setRequestHeader('content-type', 'application/json');

        var tookan_body = {
        "api_key": "53676880f74608161e457a6b145860471aecc4fc29de7a3c5a1a04c8",
        "order_ids": [
            order_id_track,
        ],
            "include_task_history": 0
        }

        request.onreadystatechange = function() {
            if (this.readyState === 4) {

             var responseData = JSON.parse(this.responseText);
             var task_status =  responseData.data[0].job_status

             if (task_status == 1) {

                var t_link = $('#client-tracking-link').attr('src')

                if (t_link == '') {
                    $('#client-lien-suivis-commande').text(delivery_tracking_link)
                    $('#client-tracking-link').attr('src', delivery_tracking_link)
                    $('#suivre-commande-tracking-link').removeClass('field-none')
                }

                // update commande commande en cours de livraison
                $.ajax({
                    type: 'POST',
                    url: '/update_commande_status_from_tookan',
                    data: {ref_commande: order_id_track, type_update: 1},
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    success: function(response_update) {
                        console.log('Commande updated => ', response_update)
                    }
                })


             }

            } else {
                console.log('Ici est la reponse tookan', this)
            }
        }

        request.send(JSON.stringify(tookan_body));

    } // End if array not empty

    }
    })

}

}, 4000)


setInterval(() => {
    // console.log('User id is => ', userIdTookan)
    if (typeof userIdTookan !== 'undefined') {
        // userId is defined, use it in your JavaScript code
        $.ajax({
        type: 'GET',
        url: '/get_client_tookan_current_job_encours_livraison/'+userIdTookan,
        data: {},
        success: function(tookan_data_processing) {

        if (tookan_data_processing.length > 0) {

            var check_task_bis = tookan_data_processing[0]; // recuperation de la task depuis la base
            // console.log('Here is data from base => ', check_task)
            var delivery_tracking_link_bis = check_task_bis.delivery_tracing_link; // lien de suivi
            var order_id_track_bis = check_task_bis.order_id; // id de la commande

            // Préparation de la requette XMLHttpRequest
            var request = new XMLHttpRequest();

            request.open('POST', 'https://api.tookanapp.com/v2/get_job_details_by_order_id')
            request.setRequestHeader('content-type', 'application/json');

            var tookan_body = {
            "api_key": "53676880f74608161e457a6b145860471aecc4fc29de7a3c5a1a04c8",
            "order_ids": [
                order_id_track_bis,
            ],
                "include_task_history": 0
            }

            request.onreadystatechange = function() {
                if (this.readyState === 4) {

                 var responseData = JSON.parse(this.responseText);
                 var task_status =  responseData.data[0].job_status

                 if (task_status == 2) {

                    var t_link = $('#client-tracking-link').attr('src')

                    if (t_link == '') {
                        $('#client-tracking-link').attr('src', delivery_tracking_link_bis)
                    }

                    // update commande commande en cours de livraison
                    $.ajax({
                        type: 'POST',
                        url: '/update_commande_status_from_tookan',
                        data: {ref_commande: order_id_track_bis, type_update: 2},
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        success: function(response_update) {
                            console.log('Commande updated => ', response_update)
                        }
                    })

                    $('#suivre-commande-tracking-link').addClass('field-none')


                 }

                } else {
                    console.log('Ici est la reponse tookan', this)
                }
            }

            request.send(JSON.stringify(tookan_body));

        } // End if array not empty

        }
        })

    }

    }, 3000)
// ---------------------------------------------------------------
})
