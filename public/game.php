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
                { "value": "776", "imageUrl": "img/reward1.png", "probability": 5, "id_produit": 776  },
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

      
        function afficherTroisDerniersCaracteres(chaine) {
            if (chaine.length >= 3) {
                var troisDerniersCaracteres = chaine.slice(-3);
                console.log(troisDerniersCaracteres);
            } else {
                console.log("La chaîne est trop courte pour afficher les trois derniers caractères.");
            }
        }

        

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
                        

                        $('#myModal').modal('show');

                        if(data == "0"){
                            $("#le_texte").html("Vous avez perdu..."); 

                        }else{

                            $("#le_texte").html("Super Vous avez Gagner..."); 
                            parent.$(".sidebar-banner-resultat").html("REF : "+data);
                            parent.$("#ref_prod_game").val("TM-0000000"+data);
                            parent.$("#id_produit_du_produit").val(data); 
                            parent.$("#btn_valider_lot").fadeIn(); 

                            var id_produit = afficherTroisDerniersCaracteres(data);
                            alert(id_produit);

                            
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



</body>

</html>