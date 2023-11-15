@extends('front.layout.main-layout')

<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <title>TOULET WHEEL</title>

 
    <meta name="author" content="Gafami">

    <link rel="stylesheet" href="css/global.css"> 

    <link rel="icon" href="img/brand.png" type="image/png">

    <style type="text/css" id="operaUserStyle"></style>
    <link href="css/bootstrap.min.css" rel="stylesheet" >
</head>

<body class="" style="background-color: rgb(19, 99, 195); background-image: none;">
    <!-- BACKGROUND ANIMATION RENDER HERE -->
    
    <input type="hidden" id="id_user" value="<?php echo $_GET["id_user"]; ?>">
    <input type="hidden" id="ref_prod_game">
    
    <!-- THIS ELEMENT TO BE USED TO DRAW LUCKY WHEEL -->
    <div id="particles-js" class="gift-bg"></div>
    <div id="drawing"></div>
    <!-- BURGER MENU -->
    <div style="display: none;" class="burger-menu">
        <span class="active"></span>
        <span class="active"></span>
        <span class="active"></span>
        <div class="counter">...</div>
    </div>
    <!-- REWARD LIST OF PLAYER -->
    <div class="reward-list">
        <div class="items"></div>
    </div>
    <!-- BANNERS -->

    <!-- POPUP AFFILIATE -->

    <!-- POPUP ENTER ACCESS KEY -->

    <!-- POPUP COUNTDOWN TIMER -->

    <!-- POPUP CUSTOMER EMAIL RENDER HERE  -->

    <!-- OVERLAY MENU CONFIG ADMIN ONLY -->


    <!-- SOUND TRACK -->
    <audio id="spinSound" controls="" style="display:none;">
        <source src="media/spinSound.mp3" type="audio/mp3">
        Your browser does not support the audio element.
    </audio>

    <!-- Modal -->
    <div class="modal fade" id="myModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">  
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Résultats</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body" id="le_texte" style="font-size: 30px;font-weight: 700;text-align: center;">
                
            </div>
            <div class="modal-footer">
                <a onclick="get_data_game()" class="btn btn-primary" id="btn_valid">Continuer</a> 
                <a href="https://toulemarket.com/" style="display:none" id="btn_site" class="btn btn-primary">retour au site</a>
            </div>
            </div>
        </div>
        </div>

    <!-- CONFIG NEEDED PARAMS GENEREATE FROMN ADMIN PAGE TO OPERATE THE WHEEL AS: TOTAL SLICE, GRAPHIC, REWARD VALUES -->
    <script id="config" defer="">
        var _dynamicParams = {
            "config": {
                "wheelUX": "4",
                "totalSlices": 12,
                "distanceDeg": 45,
                "defaultStartDeg": 270,
                "borderSlice": 5,
                "sliceWidth": 30,
                "graphicOption": 1,
                "brandLogo": "img/brand.png", 
                "backgroundColor": "#337ab7",
                "allowSound": true,
                "anims": {
                    "fallingSnow": true,
                    "flame": true
                }
            },     
            "jsonData": [
                { "value": "775", "imageUrl": "img/reward0.png", "probability": 45, "id_produit": 775 },
                { "value": "776", "imageUrl": "img/reward01.png", "probability": 5, "id_produit": 776  },
                { "value": "0", "imageUrl": "img/reward2.png", "probability": 5 },
                { "value": "774", "imageUrl": "img/reward3.png", "probability": 8, "id_produit": 774  },
                { "value": "0", "imageUrl": "img/reward4.png", "probability": 5 },
                { "value": "787", "imageUrl": "img/reward5.png", "probability": 12, "id_produit": 787  },
                { "value": "0", "imageUrl": "img/reward6.png", "probability": 4 },
                { "value": "782", "imageUrl": "img/reward7.png", "probability": 6, "id_produit": 782  }, 
                { "value": "0", "imageUrl": "img/reward8.png", "probability": 8 },   
                { "value": "TM-CASKET", "imageUrl": "img/reward9.png", "probability": 2 }, 
                { "value": "762", "imageUrl": "img/reward10.png", "probability": 1, "id_produit": 762  },
                { "value": "0", "imageUrl": "img/reward11.png", "probability": 9 }
            ],
            "anims": { "fallingSnow": false }
        }
        </script>
        
    
        <script src="js/jquery-3.7.0.min.js" ></script>
        <script src="js/svg.min.js" defer=""></script>
        <script src="js/layout.js" defer=""></script>

        <script id="particles-lib" src="js/particles.min.js" defer=""></script>
        <script id="anims" src="js/animations.js" defer=""></script>
        <script src="js/bootstrap.bundle.min.js" ></script>
    <script>
        /***************** CLICK AND RECEIVE REWARD EVENTS *****************/

      //FONCTION QUI AFFICHE LE MODAL DU GAME
      function open_modal_game(){
            $("#registerLoginModal").modal("show");
        }

       //open_modal_game(); 

        function loadEvents() {

            // Load reward
            loadRewardBag();

            // Check Game Rules
            if (document.querySelector('#count-down-timer')) {
                checkGameRules();
            }

            // Spin tap
            _globalVars.elms.spin.click(function () {
                //alert("bonjour");
                if (localStorage.getItem("remainTime")) {
                    return;
                }

                if (!_globalVars.isProcessing) {


                    // Play sound if have config
                    if (_dynamicParams.config.allowSound) {
                        var spinSound = document.getElementById('spinSound');
                        spinSound.play().catch(function () {
                        });
                    }

                    spin(function (data) {

                        // LA REFFERENCE DU PRODUIT ICI
                        console.log(data); 
                        
                        // Exemple d'utilisation 
                        

                        //$('#myModal').modal('show');  

                        if(data == "0"){
                            $("#le_texte").html("Vous avez perdu..."); 

                        }else{

                            $("#le_texte").html("Super Vous avez Gagner..."); 
                            //parent.$(".sidebar-banner-resultat").html("REF : "+data);
                            $("#ref_prod_game").val(data);
                           // parent.$("#id_produit_du_produit").val(data); 
                           // parent.$("#btn_valider_lot").fadeIn(); 
                            $('#myModal').modal('show');     

                        }

                        // Save reward into reward bag
                        saveReward(data);

                        // Your continue code if have

                        // Check if the reward popup component is ready or not. Priority is customer email popup first
                        if (document.querySelector('#popup-customer-email') && !document.querySelector('#email-popup-config')) {
                            showPopupEmail();
                        } else if (document.querySelector('#daily-lucky') && !document.querySelector('#reward-popup-config')) {
                            showPopup(data);
                        }

                        // Check condition to show count down timer
                        if (document.querySelector('#count-down-timer')) {

                            var playTimes = localStorage.getItem(cachedKey);

                            if (localStorage.getItem(cachedKey)) {
                                playTimes = JSON.parse(localStorage.getItem(cachedKey)).length;
                            } else {
                                playTimes = 0;
                            }

                            if (typeof (_dynamicParams.countdownConfig) !== 'undefined') {

                                if ((parseInt(playTimes) % parseInt(_dynamicParams.countdownConfig.timesToShowCountDown)) === 0) {

                                    var currentDate = new Date();
                                    var remainTime = currentDate.setHours(currentDate.getHours() + parseInt(_dynamicParams.countdownConfig.remainTime));
                                    localStorage.setItem('remainTime', remainTime);

                                    showCountDownTime();

                                }

                            }

                        }

                    });

                }

            });

            

            // Redeem listener
            document.addEventListener('onRedeemCompleted', function (data) {

                // data.rewardValue => The reward value of user after finish spin the wheel.
                console.log(data.rewardValue);

            }, false);

            // Burger Menu tap
            var burgerMenu = document.querySelector('.burger-menu');
            burgerMenu.addEventListener('click', function (event) {
                burgerMenu.children[0].classList.toggle('active');
                burgerMenu.children[0].classList.toggle('cross');
                burgerMenu.children[1].classList.toggle('active');
                burgerMenu.children[1].classList.toggle('cross');
                burgerMenu.children[2].classList.toggle('hide');

                // Show or hide reward list
                document.querySelector('.reward-list').classList.toggle('show');
            });

            // Affiliate link click
            if (document.querySelector('.affiliate-link') !== null) {
                document.querySelector('.affiliate-link, .popup-container').addEventListener("click", function (e) {

                    if (e.target.className.indexOf('popup-container') > -1 ||
                        e.target.className.indexOf('btn-continue') > -1 ||
                        e.target.className === '') {
                        document.querySelector('#daily-lucky').classList.add('hide');

                        // Call Redirect to the new pafe for each slide data config
                        redirectAffiliateLink();
                    }

                }, false);
            }

            // Access button click
            if (document.querySelector('#access-key .btn-submit')) {

                setTimeout(function () { document.querySelector('#access-key .inner-content').classList.add('active'); }, 500);

                document.querySelector('#access-key .btn-submit').addEventListener('click', function (e) {

                    // Call Verify Access Key
                    verifyAccess();

                }, false);
            }
        }

        /*
            Function to show Popup reward 
        */
        function showPopup(data) {

            if (document.querySelector('.affiliate-link')) {
                try {

                    var rewards = JSON.parse(localStorage.getItem(cachedKey));
                    var totalPrice = 0;

                    for (var i = 0; i < rewards.length; i++) {
                        if (rewards[i].redeem === false) {
                            totalPrice = totalPrice + parseInt(rewards[i].price.split('$')[0]);
                        }
                    }

                    if (data) {
                        document.querySelector('#number-coin-luckydraw strong').innerHTML = data;
                    } else {
                        document.querySelector('#number-coin-luckydraw strong').innerHTML = totalPrice + '$';
                    }


                } catch (ex) { }
                document.querySelector('#daily-lucky').classList.remove('hide');
            }
        }

        /*
            Function to handle click event for access button click
        */
        function verifyAccess() {

            if (document.querySelector('#access-key .text-box')) {
                try {

                    // Get access key value from textbox
                    var accessKey = document.querySelector('#access-key .text-box').value;

                    // Continue your code to validate access key

                    document.querySelector('#access-key').classList.add('hide');

                } catch (ex) { }
            }
        }

        /*
            Three Functions to manage count down timer
        */
        function remainTimeCalc() {

            // Get count down time
            var countDownTime = parseFloat(localStorage.getItem('remainTime'));

            // Get today's date and time
            var now = new Date().getTime();

            // Find the distance between now and the count down date
            var distance = countDownTime - now;

            // Time calculations for days, hours, minutes and seconds
            //var days = Math.floor(distance / (1000 * 60 * 60 * 24));
            var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
            var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
            var seconds = Math.floor((distance % (1000 * 60)) / 1000);

            // Display the result in the element with id="demo"
            document.querySelector('.remainTime .hours').innerHTML = hours;

            document.querySelector('.remainTime .minutes').innerHTML = minutes;

            document.querySelector('.remainTime .seconds').innerHTML = seconds;

            // If the count down is finished, write some text
            if (distance < 0) {
                return 1;
            } else {
                return 0;
            }
        }

        function showCountDownTime() {

            document.querySelector('#count-down-timer').classList.remove('hide');

            var isCompleteCountDown = remainTimeCalc();

            // Update the count down every 1 second
            var interval = setInterval(function () {

                isCompleteCountDown = remainTimeCalc();

                // If the count down is finished allow to continue play lucky wheel
                if (isCompleteCountDown) {

                    clearInterval(interval);

                    document.querySelector('#count-down-timer').classList.add('hide');

                    // Remove local localStorage Data
                    localStorage.removeItem('remainTime');

                }
            }, 1000);
        }

        function checkGameRules() {

            // Check the reamin time of count down timer
            if (localStorage.getItem('remainTime')) {
                showCountDownTime();
            }
        }

        /*
            Function redirect to new page
        */
        function redirectAffiliateLink() {

            try {
                var currentReward = document.getElementById('drawing').getAttribute('value');
                var currentAffiliateLink = _dynamicParams.jsonData[currentReward].link;;

                if (typeof (currentAffiliateLink) !== 'undefined') {
                    window.open(currentAffiliateLink, '_blank');
                }

            } catch (ex) { }
        }

        /*
            Function to validate email and send email
        */
        function validateEmail(elm, value) {
            var re = /^(([^<>()\[\]\.,;:\s@\"]+(\.[^<>()\[\]\.,;:\s@\"]+)*)|(\".+\"))@(([^<>()\.,;\s@\"]+\.{0,1})+[^<>()\.,;:\s@\"]{2,})$/;
            if (re.test(value)) {
                document.querySelector('.btn-send-email').classList.remove('inactive');
            } else {
                document.querySelector('.btn-send-email').classList.add('inactive');
            }
        }

        

        /*
            Function to handle email popup show / hide
        */
        function showPopupEmail() {
            document.querySelector('#popup-customer-email').classList.remove('hide');
            setTimeout(function () { document.querySelector('#popup-customer-email .inner-content').classList.add('active'); }, 500);
        }

        /*
            Event click of send email button
        */
        if (document.querySelector('#popup-customer-email')) {
            document.querySelector('.btn-send-email').addEventListener('click', function (e) {

                if (document.querySelector('.btn-send-email').className.indexOf('inactive') === -1) {
                    sendEmail();
                }

            }, false);
        }
    /***************** //CLICK AND RECEIVE REWARD EVENTS *****************/
    </script>

    <script>
        function get_data_game(){
                
                //script pour inserer les gagnants.
                var iduser      =  $("#id_user").val();    
                var ref_produit = $("#ref_prod_game").val();  
      
                var nbre_participation = 1;
                //location.href="https://toulemarket.com/"
                $.ajax({
                    url: "/tm_game_store",
                    type: "POST",
                    data: {
                        iduser: iduser,
                        ref_produit: ref_produit,
                        nbre_participation: nbre_participation
                    },
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }, 
                    success: function(response) {
                        // Traitement à effectuer en cas de succès de la requête
                        console.log("Requête POST réussie !");
                        console.log(response); // Affichage de la réponse du serveur
                        ajout_panier_game();
                        location.href="https://toulemarket.com/";
                    },
                    error: function(xhr, status, error) {
                        // Traitement à effectuer en cas d'erreur de la requête
                        console.error("Erreur lors de la requête POST : " + error);
                    }
                    });
    
            }

            function ajout_panier_game() {

let quantite_produit = 1;
imgButon0.style.display = "none";
span0.innerHTML = "";
ajouter_panier.disabled = true;

// ajouter_panier.classList.add("desactive");
let id_produit = $("#id_produit_du_produit").val(); 
let reference_produit =  $("#ref_prod_game").val();  
let prix_unitaire_produit = 100;
let tab_caracteristique = {}
let prix_total = Number(quantite_produit) * Number(prix_unitaire_produit)

for (let u = 0; u < 3; u++) {
    let label_caract = $('#carac_produit-Label'+u).text()
    tab_caracteristique[label_caract] = $('#carac_produit'+u).find(':selected').text()
}

let produit = {
    'quantite': quantite_produit,
    'prix': prix_unitaire_produit,
    'id_produit': id_produit,
    'prix_total': prix_total,
    'ref' : reference_produit,
    'carac' : tab_caracteristique,
}

$.ajax({
type: 'GET',
url: '/panier/ajouter/',
data: produit,
cache: false,
beforeSend: function(){
// spinner_ajouter.classList.add("spinner-border");
spinner_ajouter.classList.remove("none-messaboxe");
},
success: function(result) {
console.log('panier_ajouter', result) //ok

setTimeout(function() { // apparution du msg de success
$('#ajouter_au_panier_success').removeClass('new_produit');
}, 0);

setTimeout(function() { // dispparution du msg de success 2s après
$('#ajouter_au_panier_success').addClass('new_produit');
}, 2000);

setTimeout(function() { // apparution du msg de success
$('#myModal').modal('hide')
voir_panier_poppop()
}, 2000);

if ($('#nbr_panier').attr('class') == '') { // traitement du compteur
$('#nbr_panier').addClass("menu-item-counter");
$('#nbr_panier').addClass("text-center");
}

$('#nbr_panier').text(result[0]['0']);

if ($('#nbr_panier2').attr('class') == '') {
$('#nbr_panier2').addClass("panier-counter");
$('#nbr_panier2').addClass("text-center");
}

if (result[0]['0'] > 100) {
$('#nbr_panier2').text('+99');
}else {
$('#nbr_panier2').text(result[0]['0']);
}

$('#nbr_panier2_hidden').text(result[0]['0'])


$('#pp').text(result[0]['0'])

},

complete:function(data){
ajouter_panier.disabled = false;
spinner_ajouter.classList.add("none-messaboxe");
span0.innerHTML = "Ajouter au panier";
imgButon0.style.display = "inline";
},

error: function(error) {
console.log('Pas bon')
}

});
}
    </script>



</body>

</html>