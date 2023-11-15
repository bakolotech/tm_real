<style>
    .tm_coming_soon_page {
    height: 100vh;
    width: 100%;
    position: fixed !important;
    z-index: 100;
    background-color: rgba(0, 0, 0, 0.5);
    overflow: hidden !important;
    display: flex;
    align-items: center;
    justify-content: center;

    }

    .tm_launch_main_container {
        width: 55%;
        color: #fff;
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
        row-gap: 20px;
        background-color: rgba(0, 0, 0, 0.6);
        padding-top: 30px;
        padding-bottom: 30px;
        position: relative;
        top: 25px;
        border-radius: 15px;
    }

    .launch_section_title {
        font-family: 'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana, sans-serif;
        font-weight: 700;
        font-size: 32px;
    }

    .launch_section_text p {
        text-align: center;
        font-size: 16px;
        font-family: Arial, Helvetica, sans-serif;
        letter-spacing: 2px;
    }

    .lauch_section_timer {
        display: flex;
        width: 100%;
        align-items: center;
        justify-content: center;
        column-gap: 30px;
    }

    .lauch_section_timer > div {
        display: flex;
        flex-direction: column;
        background-color: #fff;
        color: #000;
        justify-content: center;
        align-items: center;
        width: 150px;
        font-family: Arial, Helvetica, sans-serif;
    }

    .launch-btn-text {
        margin-bottom: 20px;
    }

    .launch-input-pwd {
        box-sizing: border-box;
        height: 41px;
        width: 402px;
        border: 1px solid #1A7EF5;
        border-radius: 6px;
        background-color: #F8F8F8;
        padding-left: 15px;
    }

    .launch-btn-connexion {
        height: 37px;
        width: 100px;
        border-radius: 6px;
        background-color: #1A7EF5;
        color: #fff;
        border: transparent;
    }

    .launch-numb {
        font-size: 20px;
    }

</style>

<div class="tm_coming_soon_page input-nonel" id="panier_version_v2">
    <div class="tm_launch_main_container">

        <div class="launch_section_title">
            TOULEMARKET, OUVERTURE PROCHAINE
        </div>

        <div class="launch_section_text">
            <p>Bienvenu sur toulemarket,
                Notre site web est en cours d'approvisionement, <br> Nous travaillons pour rencontrer vos attentes,<br>
                toulemarket sera sur vos appareil dans : </p>
        </div>

        <div class="lauch_section_timer">
            <div class="launch-day">
                <div class="launch-day-value launch-numb">00</div>
                <div class="launch-day-text">Jours</div>
            </div>
            <div class="launch-heure">
                <div class="launch-heure-value launch-numb">00</div>
                <div class="launch-heure-text">Heures</div>
            </div>
            <div class="launch-minute">
                <div class="launch-minute-value launch-numb">00</div>
                <div class="lauch-minute-text">Minutes</div>
            </div>
            <div class="launch-sec">
                <div class="launch-sec-value launch-numb">00</div>
                <div class="launch-sec-text">Secondes</div>
            </div>
        </div>

        <div class="launch_section_button">
            <div class="launch-btn-text">Entrez le mot de passe pour acceder à la demo!</div>
            <div class="lauch_form_btn">
                <input type="password" class="launch-input-pwd" placeholder="Entrez le mot de passe" id="laundch_pwd">
                <button class="launch-btn-connexion" onclick="startDemo()">Connecter</button>
            </div>
        </div>

    </div>

</div>

<script>

    const launch_day = document.querySelector(".launch-day-value")
    const launch_hour = document.querySelector(".launch-heure-value");
    const launch_min = document.querySelector(".launch-minute-value");
    const launch_sec = document.querySelector(".launch-sec-value")

    var lauch_timer = setInterval(() => {
    var currentDate = new Date().getTime();
    var launchDate = new Date('Jul 15, 2023 13:00:00').getTime();

    var duration  = launchDate - currentDate;
    var days = Math.floor(duration / (1000 * 60 * 60 * 24));
    var heures = Math.floor((duration % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60))
    var minutes = Math.floor((duration % (1000 * 60 * 60 )) / (1000 * 60))
    var seconds = Math.floor((duration % (1000 * 60)) / 1000);

    launch_day.innerHTML = days
    launch_hour.innerHTML = heures
    launch_min.innerHTML = minutes
    launch_sec.innerHTML = seconds

    }, 1000);

    function startDemo() {

        var email = 'bill_barber5@gmail.com';
        var password = $('#laundch_pwd').val();

        $.ajax({
            type: 'POST',
            url: '/open_demo',
            data: {email: email, password: password},
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            success: function(response) {
                if (response.status == 200) {
                    window.location.reload()
                }
            }
        })

    }


</script>
