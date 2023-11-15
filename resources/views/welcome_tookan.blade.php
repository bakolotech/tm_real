<!DOCTYPE html>
<html>
    <head>

        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>Welcome Tookan</title>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script>
        <script type="text/javascript" src="http://code.highcharts.com/highcharts.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/@tensorflow/tfjs@1.0.1"> </script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/bodymovin/5.7.4/lottie.min.js"></script>
        <script src="https://polyfill.io/v3/polyfill.min.js?features=default"></script>
        <script src="{{ asset('js/detect_mobile.js')}}"></script>
        <style>
            .tookan-body {
                /* position: relative;
                margin-left: auto;
                margin-right: auto;
                width: 35%;
                background-color: #8080801c;
                display: flex;
                flex-direction: column;
                row-gap: 25px;
                margin-top: 15%; */

                position: fixed;
                top: 0;
                left: 0;
                width: 100%;
                background-color: #fff; /* You can adjust the background color to match your design */
                box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1); /* Optional: Add a shadow effect for the header */
                z-index: 999; /* Optional: Increase z-index to ensure it's above other elements */
                
            }
            .tookan-body button {
                height: 42px;
                width: 100%;
                border: transparent;
                background-color: #1A7EF5;
                font-size: 14px;
                color: #ffffff;
            }

            button:hover {
                cursor: pointer;
                background-color: #4b99f8
            }

            .tookan-body2 input {
                height: 41px;
                width: 100%;
                box-sizing: border-box;
                border: 1px solid #9B9B9B;
                border-radius: 6px;
                background-color: #F8F8F8;
                font-family: Roboto;
                font-size: 15px;
                font-weight: 500;
                letter-spacing: -0.36px;
                padding: 0 0 0 13px;
                outline: transparent;
                color: #585858;
                line-height: 16px;
            }

            .container-msg-udeted-price{
                width: 35%;
                height: 40px;
                border: solid 0 transparent;
                border-radius: 10px;
                position: relative;
                text-align: center;
                margin-left: auto;
                margin-right: auto;

            }

            

        </style>
    </head>
    <body style="align-items: center; justify-content: center">

        {{-- <h1 style="text-align: center">Requette tookan</h1> --}}

       <div class="great-section-elemt" style="height: auto; width: 100%; background-color: #ccc">
        <div class="tookan-body2" style="position: sticky !important; top: 0px !important; height: auto">
            <input type="text" id="prod_ref_element" placeholder="Tapez la référence du produit">
            <input type="text" id="prod_new_price" placeholder="Tapez la prix du produit">
            <button id="create_tookan_task">Enregistrer</button>
        </div>
       </div>

        <div class="container-msg-udeted-price" id="message_update_price">
        </div>


        <div class="great-section-elemt-helper" style="height: auto; width: 100%; background-color: #ccc; visibility: hidden;">
            <div class="tookan-body2" style="position: relative">
                <textarea name="description" id="description-produit" cols="30" rows="10"></textarea>
                <input type="text" id="prod_description_ref" placeholder="Entrez la reference produit" />
                <button id="update_produit_description">Enregistrer</button>
            </div>
        </div>

<script>

    document.getElementById('create_tookan_task').addEventListener('click', function() {

    var ref_p = $('#prod_ref_element').val();
    var p_price = $('#prod_new_price').val();
    $.ajax({
    type: 'POST',
    url: '/update_prod_price',
    data: {ref: ref_p, price: p_price},
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    },
    success: function(data_prod_disponible) {
        console.log('Produit state => ', data_prod_disponible)
        if(data_prod_disponible.statut==="ok"){
            $("#prod_ref_element").val("")
            $("#prod_new_price").val("")
            setTimeout(() => {
                $("#message_update_price").text("Modification réussie")
                document.getElementById("message_update_price").style.color="green"
            },1000);
            setTimeout(function(){
                $("#message_update_price").text("")
            },3500)
        }else{
            console.log('error')
            $("#prod_ref_element").val("")
            $("#prod_new_price").val("")
            setTimeout(() => {
                $("#message_update_price").text("Echec de modification")
                document.getElementById("message_update_price").style.color="red"
            },1000);
            setTimeout(function(){
                $("#message_update_price").text("")
            },3500)
    }
    
    },
    error: function() {
        console.log('rien ne va')
    },
        
    })
})

document.getElementById("update_produit_description").addEventListener('click', function(){

    var description = $('#description-produit').val()
    var ref = $('#prod_description_ref').val()

    $.ajax({
    type: 'POST',
    url: '/update_description_prod',
    data: {description: description, ref: ref},
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    },
    success: function(data_prod_disponible) {
        console.log('Description modifié avec succes')
    },
    error: function() {
        console.log('Une erreur s\'est produite lors de la modification')
    },
        
    })
    console.log('You are updating description price')
})

</script>
  </body>
</html>
