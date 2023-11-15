// jQuery(document).ready(function() {
    $(function () {

        $('.my-select').select2({
            dropdownCssClass : 'no-search'
        });

        $('#piece-bancaire-type').select2({
            dropdownCssClass : 'no-search'
        })

        // $('#univer-boutique').select2({
        //     dropdownCssClass : 'no-search'
        // });

        // $('#produit-rayon').select2({
        //     dropdownCssClass : 'no-search'
        // });

        // $('#produit-famille').select2({
        //     dropdownCssClass : 'no-search'
        // });

        $('#paysCitoyenPrivee').select2({
            dropdownCssClass : 'no-search'
        })

        $('#paysEmissionPrivee').select2({
            dropdownCssClass : 'no-search'
        })

    // $('#ppvr-1').popover({
    //     placement: 'bottom',
    //     content: popoverTemplateParticulier(),
    //     html: true,
    // })

    // $('#ppvr-2').popover({
    //     placement: 'right',
    //     content: popoverTemplateOrganisationCaritative(),
    //     html: true,
    // })

    // $('#ppvr-3').popover({
    //     placement: 'left',
    //     content: popoverTemplateEntreprisePrivee(),
    //     html: true,
    // });

    $('#ppvr-droit-num-immatriculation').popover({
        content: "<div class='popover-droit popover-droit-white'><div class='popover-droit-contenu'>Indiquez le code de crédit social unifié trouvé sur votre licence commerciale. Une licence d'exploitation est une autorisation d'activité par les agences gouvernementales qui permet à  des individus ou entreprises de faire des affaires.</div></div>",
        placement: 'top',
        html: true,
        trigger: 'hover'
    });

    $('#ppvr-droit-addr-entreprise').popover({
        content: "<div class='popover-droit popover-droit-white'><div class='popover-droit-contenu'>Cette adresse représente votre principal lieu d'affaires (ex. siège social ou succursale) où vous recevez des services de TOULe Market, et pour les particuliers, cela représente votre lieu de résidence habituel.</div></div>",
        placement: 'top',
        html: true,
        trigger: 'hover'
    });

    $('#ppvr-date-expiration').popover({
        content: "<div class='popover-droit popover-droit-white'><div class='popover-droit-contenu'>Conténu non disponible</div></div>",
        placement: 'top',
        html: true,
        trigger: 'hover'
    });

    // $(window).on('popstate', function(event) {
    //     alert("pop");
    // });

    // const inFromBack = performance && performance.getEntriesByType( 'navigation' ).map( nav => nav.type ).includes( 'back_forward' )

    $.each($('.icon-1'), function(key, value) {
        if ($(value).attr('data-signe') == '+') {
            $($(this).attr('data-for-id')).hide()
        }
    })

    $('.icon-1').click(function() {
        let toHide = $(this).attr('data-for-id');

        if ($(this).attr('data-signe') == '-') {
            $(this).attr('data-signe', '+')
            $(this).html("<img class='icon-color' src='assets/images2/plus-lg.svg'  alt=''>")
            $(toHide).slideUp(300);
        } else {
            $.each($('.icon-1').not($(this)), function(key, value) {
                if ($(value).attr('data-signe') == '-') {
                    $(value).attr('data-signe', '+')
                    $($(value).attr('data-for-id')).slideUp(300)
                    $(value).html("<img class='icon-color' src='assets/images2/plus-lg.svg'  alt=''>")
                }
            })
            $(this).attr('data-signe', '-')
            $(this).html("<img class='icon-color' src='assets/images2/Minus.svg' alt=''>")
            $(toHide).slideDown(300);
        }
    })

    $('#informations-principales').on('change', '#langue, #type_activite', function() {

        $('#type_activite').prop('disabled', false)
        $('#type_activite').removeClass('img_bg')

        let typeActivite = $('#type_activite').val();
        let langue = $('#langue').val();
        let toHide = $('.to-hide');

        $.each(toHide, function(key, value) {
            $(value).addClass('d-none')
        })

        if (typeActivite) {

            if ($(this).attr('id') == 'type_activite') {
                hidePopover()

                if (typeActivite == 3) {
                    $('#ppvr-21').removeClass('tool-none')
                    $('#ppvr-11').addClass('tool-none')
                    $('#ppvr-31').addClass('tool-none')
                } else if (typeActivite == 1) {

                    $('#ppvr-11').removeClass('tool-none')
                    $('#ppvr-21').addClass('tool-none')
                    $('#ppvr-31').addClass('tool-none')

                } else if (typeActivite == 2) {
                    $('#ppvr-31').removeClass('tool-none')
                    $('#ppvr-11').addClass('tool-none')
                    $('#ppvr-21').addClass('tool-none')
                }

                //Fermer le popover on click sur l'icone 'X'
                $.each($("img[class*='dismiss-icon']"), function(key, value) {
                    $(value).attr('src', 'svg/Ferme2.svg');
                    $(value).click(function() {
                        hidePopover()
                    })
                })
            }

            if (langue) {
                if (parseInt(typeActivite) == 2) {
                    $('#caritative').removeClass('d-none');
                    $('#prenom').val("")  //reinitialiser le champ prenom
                    $('#prenom2').val("") //reinitialiser le champ prenom2
                    $('#nomfamille').val("") //reinitialiser le champ prenom3

                    $('#nouveauVendBtn').prop('disabled', true);
                    $('#nouveauVendBtn').addClass('img_bg')

                }else if (parseInt(typeActivite) == 3) {
                    $('#entreprise').removeClass('d-none');
                    $('#nomEntrepriseCaritative').val("")

                    $('#nouveauVendBtn').prop('disabled', true);
                    $('#nouveauVendBtn').addClass('img_bg')
                }
                else if (parseInt(typeActivite) == 1) {
                    $('#particulier').removeClass('d-none');
                    $('#nomEntreprise').val("")
                    $('#nomEntrepriseCaritative').val("")

                    $('#nouveauVendBtn').prop('disabled', true);
                    $('#nouveauVendBtn').addClass('img_bg')
                }
            }
        }
    })

    $('.one-check').click(function() {
        $(this).prop('checked', true);
        $.each($('.one-check').not($(this)), function(key, value) {
            $(value).prop('checked', false);
        })
    })

    $('.one-check-1').click(function() {
        $(this).prop('checked', true);
        $.each($('.one-check-1').not($(this)), function(key, value) {
            $(value).prop('checked', false);
        })
    })

    $('.one-check-2').click(function() {
        $(this).prop('checked', true);

        if ($(this).val() === "certain" || $(this).val() === "oui") {
            $('#second-question-element').removeClass('item-none')
        }else{
            $('#second-question-element').addClass('item-none')
        }

        // ouverture d'autre check
        $.each($('.one-check-2').not($(this)), function(key, value) {
            $(value).prop('checked', false);
        })
    })


    $('.one-check-3').click(function() {
        $(this).prop('checked', true);
        $.each($('.one-check-3').not($(this)), function(key, value) {
            $(value).prop('checked', false);
        })
    })

    $('.one-check-4').click(function() {
        $(this).prop('checked', true);
        $.each($('.one-check-4').not($(this)), function(key, value) {
            $(value).prop('checked', false);
        })
    })

    // // Vanilla Javascript
    // var input = document.querySelector("#telephone");
    // window.intlTelInput(input,({
    // // options here
    // }));

    // // jQuery

    // $("#telephone").intlTelInput({
    // // options here
    // });

})

function closeToolTip1() {
    $('#ppvr-11').addClass('tool-none')
}

function closeToolTip2() {
    $('#ppvr-21').addClass('tool-none')
}

function closeToolTip3() {
    $('#ppvr-31').addClass('tool-none')
}


function hidePopover() {
    $('#ppvr-1').popover('hide');
    $('#ppvr-2').popover('hide');
    $('#ppvr-3').popover('hide');
}

var redirect = "/"; // Target URL
var count = 30; // Timer
function countDown1() {

    $('#timer').removeClass('input-none')
    var timer = document.getElementById("timer"); // Timer ID
    if (count > 0) {
    count--;
    timer.innerHTML = "Vous n'avez pas reçu de code ? <br> Veillez patienter " + count+"s avant de demander un autre code"; // Timer Message
    timer.innerHTML += '<img style="margin-left: 5px" width="13px" height="13px" src="{{ asset("assets/images/tm-reload.svg") }}" alt="">'
        setTimeout("countDown1()", 1000);
    } else {
        $('#resendCodeBtn').removeClass('disabled-btn-element');
        $('#resendCodeBtn').prop('disabled', false)
        $('#coloredReloadBtn').removeClass('input-none')
        $('#disabledReloadBtn').addClass('input-none')
        $('#timer').addClass('input-none')
    }
}

function resendCode() {
    var num_tel = $('#numeroEntreprise').val();
    console.log('ok ok we are')
    // $('#modalVerificationIdentite').modal('show')
    countDown1();
//     $.ajax({
//     method: 'POST',
//     url: '/send_verification_sms',
//     data: {_token: $('#token').val(), num_tel: num_tel},
//     headers: {
//         'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
//     },
//     beforeSend: function() {
//         $('#sms_spiner-resend').addClass('spinner-border')
//     },
//     success: function(response) {
//         console.log('voici votre reponse:', response)

//         // if (response === 'success') {
//         //     $('#modalVerificationIdentite').modal('show')
//         // }else if(response === 'erreur denvoie de message') {
//         //     $('#phone-check-error-text').removeClass('input-none')
//         //     $('#phone-zone-element').addClass('border-error')
//         // }
//     },

//     complete: function() {

//     }
// })


}

function Validate1(prenom_input) {
    var isValid = false;
    var regex = /^[a-zA-ZÀ-ÿ-. ]*$/
    isValid = regex.test(prenom_input);
    return isValid;
}

// particulier infos perso
$('#mask-date-naissance').on('keyup', function(){  // date de naissance
    console.log('je suis la date de naissance')
    var date_naiss = $('#mask-date-naissance').val();
    if (date_naiss === '') {
        $("#mask-date-naissance").addClass('input-error-warning')

    }else {
        $("#mask-date-naissance").removeClass('input-error-warning')
    }
})

$('#numeropiece').on('keyup', function(){ // numéro de la pièce
    var num_piece = $('#numeropiece').val();
    if (num_piece === '') {
        $("#numeropiece").addClass('input-error-warning')

    }else {
        $("#numeropiece").removeClass('input-error-warning')
    }
})

$('#mask-date-expiration').on('keyup', function(){ // date d'expiration
    var date_expiration = $('#mask-date-expiration').val();
    if (date_expiration === '') {
        $("#mask-date-expiration").addClass('input-error-warning')
    }else {
        $("#mask-date-expiration").removeClass('input-error-warning')
    }
})


$("#ville-particulier").on('keyup', function(){ // la ville du particulier
    var ville_particulier = $('#ville-particulier').val();
    if (!Validate1(ville_particulier) || ville_particulier === '') {
        $("#ville-particulier").addClass('input-error-warning')
    }else {
        $("#ville-particulier").removeClass('input-error-warning')
    }
})

$('#adresse-particulier').on('keyup', function(){  //adresse particulier
    var adress_particulier = $('#adresse-particulier').val();
    if (adress_particulier === '') {
        $("#adresse-particulier").addClass('input-error-warning')
    }else {
        $("#adresse-particulier").removeClass('input-error-warning')
    }
    // traitement pour activer le bouton suivant
    let date_naiss = $('#mask-date-naissance').val();
    var num_piece = $('#numeropiece').val();
    let date_expiration = $('#mask-date-expiration').val();
    let ville_particulier = $('#ville-particulier').val();
    let address_particulier = $('#adresse-particulier').val();
    let tel_checked = $('#telChecked').val();

    if (date_naiss != '' && num_piece != '' && date_expiration != '' && ville_particulier != '' && address_particulier !='' && tel_checked == 1) {
        $('#infopersoann').prop('disabled', false);
        $('#infopersoann').removeClass('img_bg')
    }

})

// adresse confirmation
$('#adresse-confirmation').on('change', function() {
    if ($(this).is(':checked')) {
        let date_naiss = $('#mask-date-naissance').val();
        var num_piece = $('#numeropiece').val();
        let date_expiration = $('#mask-date-expiration').val();
        let ville_particulier = $('#ville-particulier').val();
        let address_particulier = $('#adresse-particulier').val();
        let tel_checked = $('#telChecked').val();
        let numero_telephone = $('#numero-telephone').val();

        if (date_naiss != '' && num_piece != '' && date_expiration != '' && ville_particulier != '' && address_particulier !='' && numero_telephone != '') {
            // desactivation du bouton
            $('#infopersoann').prop('disabled', false);
            $('#infopersoann').removeClass('img_bg')
        }
    }else{
        $('#infopersoann').prop('disabled', true);
        $('#infopersoann').addClass('img_bg')
    }
})


// controle de particulier

$('#inputCodeVerification').on('keyup', function(){
    let code = $('#inputCodeVerification').val();
    if (code.length === 4) {
        $('#phone-verification-erreur').addClass('input-none')
    }
})


    $('#inputCodeVerification1').on('keyup', function(){
        let code = $('#inputCodeVerification1').val();
        if (code.length === 4) {
            $.ajax({
            method: 'POST',
            url: '/check_verification_sms',
            data: {_token: $('#token').val(), code: code},
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            success: function(response) {

                if (response === 'success') {
                    $('#codeVerifieOk').removeClass('v-none')
                    $('#tm-zone-code1').addClass('input-none')
                    $('#telChecked').val(1)
                    $('#phone-zone-element').addClass('lock-phone') //verouillage de la zone de téléphone

                    // verification des élément pour activer le bouton
                    let date_naiss = $('#mask-date-naissance').val();
                    var num_piece = $('#numeropiece').val();
                    let date_expiration = $('#mask-date-expiration').val();
                    let province_particulier = $('#province-particulier').val();
                    let ville_particulier = $('#ville-particulier').val();
                    let address_particulier = $('#adresse-particulier').val();
                    let tel_checked = $('#telChecked').val();

                    if (date_naiss != '' && num_piece != '' && date_expiration != '' && ville_particulier != '' && address_particulier !='' && province_particulier !='' && tel_checked == 1 && $('#adresse-confirmation').is(':checked')) {
                        $('#infopersoann').prop('disabled', false);
                        $('#infopersoann').removeClass('img_bg')
                    }
                }else if(response==='code incorrect') {
                    $('#inputCodeVerification1').addClass('border-error')
                }
            }
            })
        }
    })

    $('#smsVerificationCancelBtn').on('click', function() {
        $('#numeroEntreprise').val('')
        $('#modalVerificationIdentite').hide()
    })

    function checkVerificationCode() {

        let code = $('#inputCodeVerification').val();
        let numero_phone = $('#numeroEntreprise').val()
        if (code.length === 4) {
            $.ajax({
            method: 'POST',
            url: '/check_verification_sms',
            data: {_token: $('#token').val(), code: code, phone_number: numero_phone},
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },

            beforeSend: function() {

                $('#smsVerificationCancelBtn').prop('disabled', true)
                $('#smsVerificationCancelBtn').addClass('img_bg')
                $('#boutique_spiner').css('border', '1px solid #9B9B9B;')

                $('.spinner-border').addClass('spine-position-1')
                $('#validateCodeSms').prop('disabled', true);
                $('#validateCodeSms').addClass('img_bg')
                $('#timer').addClass('input-none')

                $('#validateCodeSms').find('.check_text').text('')
                $('#validateCodeSms').addClass('resize-verifie-btn')
                $('.spiner-box-zone').removeClass('input-none')
            },

            success: function(response) {

                if (response === 'success') {

                    $('#codeVerifieOk').removeClass('v-none')
                    $('#tm-zone-code1').addClass('input-none')
                    $('#telChecked').val(1)
                    $('#phone-zone-element').addClass('lock-phone')
                    // verification des élément pour activer le bouton
                    $('.number-only-section').text('+241 000000000');
                    $('#modalVerificationIdentite').hide();

                    let prenomprivee = $('#prenomContactEntreprise').val();
                    let prenom2privee = $('#prenom2ContactEntreprise').val();
                    let matricule_entreprise = $('#matriculeEntreprise').val();
                    let ville_particulier = $('#villeEntreprise').val();
                    let adress_particulier = $('#adresseEntreprise').val();
                    if (prenomprivee != '' && prenom2privee != '' && matricule_entreprise != '' && ville_particulier != '' && adress_particulier != '' && $('#adresseEntrepriseConfirme').prop('checked') === true) {
                        $('#renseignementEntrepriseBtn').removeClass('img_bg');
                        $('#renseignementEntrepriseBtn').prop('disabled', false)
                    }else {

                        $('#renseignementEntrepriseBtn').addClass('img_bg');
                        $('#renseignementEntrepriseBtn').prop('disabled', true)
                        // $('#timer').addClass('input-none')
                    }
                }else {
                    $('#phone-verification-erreur').removeClass('input-none')
                }

                $('#inputCodeVerification').val('')
            },

            complete: function() {

                $('#smsVerificationCancelBtn').prop('disabled', false)
                $('#smsVerificationCancelBtn').removeClass('img_bg')

                $('.spinner-border').removeClass('spine-position-1')
                $('#validateCodeSms').prop('disabled', false);
                $('#validateCodeSms').removeClass('img_bg')
                $('#timer').addClass('input-none')

                $('.spiner-box-zone').addClass('input-none')
                $('#validateCodeSms').find('.check_text').text('Vérifier')
                $('#validateCodeSms').removeClass('resize-verifie-btn')
            }

            })
        }
    }

    function checkVerificationCodeParticulier() {

        let code = $('#inputCodeVerification').val();
        let numero_phone = $('#numero-telephone').val()
        if (code.length === 4) {
            $.ajax({
            method: 'POST',
            url: '/check_verification_sms',
            data: {_token: $('#token').val(), code: code, phone_number: numero_phone},
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },

            beforeSend: function() {

                $('#smsVerificationCancelBtn').prop('disabled', true)
                $('#smsVerificationCancelBtn').addClass('img_bg')
                $('#boutique_spiner').css('border', '1px solid #9B9B9B;')

                $('.spinner-border').addClass('spine-position-1')
                $('#validateCodeSms').prop('disabled', true);
                $('#validateCodeSms').addClass('img_bg')
                $('#timer').addClass('input-none')

                $('#validateCodeSms').find('.check_text').text('')
                $('#validateCodeSms').addClass('resize-verifie-btn')
                $('.spiner-box-zone').removeClass('input-none')

            },

            success: function(response) {

                if (response === 'success') {

                    $('#codeVerifieOk').removeClass('v-none')
                    $('#tm-zone-code1').addClass('input-none')
                    $('#telChecked').val(1)
                    $('#phone-zone-element').addClass('lock-phone')

                    $('.number-only-section').text('+241 000000000');
                    $('#modalVerificationIdentite').hide();

                    let date_naiss = $('#mask-date-naissance').val();
                    var num_piece = $('#numeropiece').val();
                    let date_expiration = $('#mask-date-expiration').val();
                    let province_particulier = $('#province-particulier').val();
                    let ville_particulier = $('#ville-particulier').val();
                    let address_particulier = $('#adresse-particulier').val();

                    if (date_naiss != '' && num_piece != '' && date_expiration != '' && ville_particulier != '' && address_particulier !='' && province_particulier != '') {
                        $('#infopersoann').prop('disabled', false);
                        $('#infopersoann').removeClass('img_bg')
                    }
                }else {
                    $('#phone-verification-erreur').removeClass('input-none')
                }

                $('#inputCodeVerification').val('')
            },

            complete: function() {

                $('#smsVerificationCancelBtn').prop('disabled', false)
                $('#smsVerificationCancelBtn').removeClass('img_bg')

                $('.spinner-border').removeClass('spine-position-1')
                $('#validateCodeSms').prop('disabled', false);
                $('#validateCodeSms').removeClass('img_bg')
                $('#timer').addClass('input-none')


                $('.spiner-box-zone').addClass('input-none')
                $('#validateCodeSms').find('.check_text').text('Vérifier')
                $('#validateCodeSms').removeClass('resize-verifie-btn')
            }

            })
        }
    }

// controle de particulier

function onlyLetters(input) {
    var regex = /[^a-zA-ZÀ-ÿ-._ ]/gi;
    input.value = input.value.replace(regex, "");
    if (input.value.length < 3) {
        $("#nomfamille").addClass('input-error-warning')
        $('#nouveauVendBtn').attr('disabled', true)
        $('#nouveauVendBtn').addClass('img_bg')

    }else {
        $("#nomfamille").removeClass('input-error-warning')
        $('#nouveauVendBtn').attr('disabled', false)
        $('#nouveauVendBtn').removeClass('img_bg')
    }
}

function letterOnly(input) {
    var regex = /[^a-zA-ZÀ-ÿ-._ ]/gi;
    input.value = input.value.replace(regex, "");

    if (input.value.length < 3 && input.value.length >0) {
        $("#prenom").addClass('input-error-warning')
    }else {
        $("#prenom").removeClass('input-error-warning')
    }
}

// input 2
function letterOnly2(input) {
    var regex = /[^a-zA-ZÀ-ÿ-._ ]/gi;
    input.value = input.value.replace(regex, "");
    if (input.value.length < 3 && input.value.length >0) {
        $("#prenom2").addClass('input-error-warning')
    }else {
        $("#prenom2").removeClass('input-error-warning')
    }
}

// ---------------------- fin particulier ------------------

//------------------------debut entreprise-----------------
$('#nomEntreprise').on('keyup', function() {
    var entreprise_name = $('#nomEntreprise').val();
    if (entreprise_name === '' || entreprise_name.length < 3) {
        $('#nomEntreprise').addClass('input-error-warning-long');
        $('#nouveauVendBtn').attr('disabled', true)
        $('#nouveauVendBtn').addClass('img_bg')
    }else {
        $('#nomEntreprise').removeClass('input-error-warning-long');
        $('#nouveauVendBtn').attr('disabled', false)
        $('#nouveauVendBtn').removeClass('img_bg')
    }
})

function onlyLettersEntreprise(input) {
    var regex = /[^a-zA-ZÀ-ÿ-._ ]/gi;
    input.value = input.value.replace(regex, "");
    if (input.value.length < 3) {

        $("#nomfamille").addClass('input-error-warning')
        $('#nouveauVendBtn').attr('disabled', true)
        $('#nouveauVendBtn').addClass('img_bg')

    }else {
        $("#nomfamille").removeClass('input-error-warning')
        $('#nouveauVendBtn').attr('disabled', false)
        $('#nouveauVendBtn').removeClass('img_bg')
    }
}

$('#nomEntrepriseCaritative').on('keyup', function() {
    var entreprise_name = $('#nomEntrepriseCaritative').val();
    if (entreprise_name === '' || entreprise_name.length < 3) {
        $('#nomEntrepriseCaritative').addClass('input-error-warning-long');
        $('#nouveauVendBtn').attr('disabled', true)
        $('#nouveauVendBtn').addClass('img_bg')
    }else {
        $('#nomEntrepriseCaritative').removeClass('input-error-warning-long');
        $('#nouveauVendBtn').attr('disabled', false)
        $('#nouveauVendBtn').removeClass('img_bg')
    }
})

// ----------------------   traitement facturation -----------------------
$('#numero-carte').on('blur', function(){
    var nomFamille = $('#numero-carte').val();
    if (nomFamille === '') {
        $("#numero-carte").addClass('input-error-warning')
    }else {
        $("#numero-carte").removeClass('input-error-warning')
    }
})

$('#date-expiration-carte').on('blur', function(){
    var nomFamille = $('#date-expiration-carte').val();
    if (nomFamille === '') {
        $("#date-expiration-carte").addClass('input-error-warning')
    }else {
        $("#date-expiration-carte").removeClass('input-error-warning')
    }
})

// nom-complet-sur-carte
$('#code-cvv').on('blur', function(){
    var nomFamille = $('#code-cvv').val();
    if (nomFamille === '') {
        $("#code-cvv").css('border', '1px solid red')
    }else {
        $("#code-cvv").css('border', '1px solid #dfdfdf')
    }
})

$('#nom-complet-sur-carte').on('keyup', function(){

    var nomFamille = $('#nom-complet-sur-carte').val();
    if (nomFamille === '') {
        $('#nom-complet-sur-carte').addClass('input-error-warning-long');
    }else {
        $('#nom-complet-sur-carte').removeClass('input-error-warning-long');
    }

    // recuperation des variables
    let numero_carte = $('#numero-carte').val();
    let date_expedition = $('#date-expiration-carte').val();
    let nom_sur_carte = $('#nom-complet-sur-carte').val();

    if (numero_carte != '' && date_expedition != '' && nom_sur_carte != '') {
        $('#infos-particulier-facturation').attr('disabled', false)
        $('#infos-particulier-facturation').removeClass('img_bg')
    }else{
        $('#infos-particulier-facturation').attr('disabled', true)
        $('#infos-particulier-facturation').addClass('img_bg')
    }
})


// traitement mobile banking
$('#airtel_num').on('blur', function(){
    var num_airtel = $('#airtel_num').val();
    if (num_airtel === '') {
        $("#airtel_num").addClass('input-error-warning')
    }else {
        $("#airtel_num").removeClass('input-error-warning')
    }

    let airtel_num = $('#airtel_num').val();
    var code_marchand_airtel = $('#code_marchand_airtel').val();

    if (airtel_num != '' && code_marchand_airtel != '') {
        $('#infos-particulier-facturation').attr('disabled', false)
        $('#infos-particulier-facturation').removeClass('img_bg')
    }else{
        $('#infos-particulier-facturation').attr('disabled', true)
        $('#infos-particulier-facturation').addClass('img_bg')
    }
})

$('#code_marchand_airtel').on('keyup', function(){
    var nomFamille = $('#code_marchand_airtel').val();
    if (nomFamille === '') {
        $("#code_marchand_airtel").addClass('input-error-warning')
    }else {
        $("#code_marchand_airtel").removeClass('input-error-warning')
    }

    let airtel_num = $('#airtel_num').val();
    var code_marchand_airtel = $('#code_marchand_airtel').val();

    if (airtel_num != '' && code_marchand_airtel != '') {
        $('#infos-particulier-facturation').attr('disabled', false)
        $('#infos-particulier-facturation').removeClass('img_bg')
    }else{
        $('#infos-particulier-facturation').attr('disabled', true)
        $('#infos-particulier-facturation').addClass('img_bg')
    }
})

$('#moov_num').on('blur', function(){
    var moov_code = $('#moov_num').val();
    if (moov_code === '') {
        $("#moov_num").addClass('input-error-warning')
    }else {
        $("#moov_num").removeClass('input-error-warning')
    }
})

$('#code_marchand_moov').on('keyup', function(){
    var code_moov_num = $('#code_marchand_moov').val();
    if (code_moov_num === '') {
        $("#code_marchand_moov").addClass('input-error-warning')
    }else {
        $("#code_marchand_moov").removeClass('input-error-warning')
    }

    let moov_code = $('#moov_num').val();

    if (code_moov_num != '' && moov_code != '') {
        $('#infos-particulier-facturation').attr('disabled', false)
        $('#infos-particulier-facturation').removeClass('img_bg')
    }else{
        $('#infos-particulier-facturation').attr('disabled', true)
        $('#infos-particulier-facturation').addClass('img_bg')
    }

})


$("#villeEntreprise").on('keyup', function(){ // la ville du particulier
    var ville_particulier = $('#villeEntreprise').val();
    if (!Validate1(ville_particulier) || ville_particulier === '') {
        $("#villeEntreprise").addClass('input-error-warning')
    }else {
        $("#villeEntreprise").removeClass('input-error-warning')
    }
})

$('#adresseEntreprise').on('keyup', function(){  //adresse particulier
    var adress_particulier = $('#adresseEntreprise').val();
    if (adress_particulier === '') {
        $("#adresseEntreprise").addClass('input-error-warning')
    }else {
        $("#adresseEntreprise").removeClass('input-error-warning')
    }
})

// contact principal entreprise
$('#prenomContactEntreprise').on('keyup', function(){
    var prenom = $('#prenomContactEntreprise').val();
    if (prenom === '') {
        $("#prenomContactEntreprise").addClass('input-error-warning')
    }else {
        $("#prenomContactEntreprise").removeClass('input-error-warning')
    }
})

// contact principal entreprise
$('#prenom2ContactEntreprise').on('keyup', function(){
    var prenom = $('#prenom2ContactEntreprise').val();
    if (prenom === '') {
        $("#prenom2ContactEntreprise").addClass('input-error-warning')
    }else {
        $("#prenom2ContactEntreprise").removeClass('input-error-warning')
    }

})

// contact principal entreprise
$('#nomFamContactEnt').on('keyup', function(){
    var prenom = $('#nomFamContactEnt').val();
    if (prenom === '') {
        $("#nomFamContactEnt").addClass('input-error-warning')

    }else {
        $("#nomFamContactEnt").removeClass('input-error-warning')
    }
    let prenomprivee = $('#prenomContactEntreprise').val();
    let prenom2privee = $('#prenom2ContactEntreprise').val();
    let matricule_entreprise = $('#matriculeEntreprise').val();
    let ville_particulier = $('#villeEntreprise').val();
    let adress_particulier = $('#adresseEntreprise').val();
    let verifTel = $('#telChecked').val();

    if (prenomprivee != '' && prenom2privee != '' && matricule_entreprise != '' && ville_particulier != '' && adress_particulier != '' && $('#adresseEntrepriseConfirme').prop('checked') === true && verifTel === "1") {
        $('#renseignementEntrepriseBtn').removeClass('img_bg');
        $('#renseignementEntrepriseBtn').prop('disabled', false)
    }else {
        $('#renseignementEntrepriseBtn').addClass('img_bg');
        $('#renseignementEntrepriseBtn').prop('disabled', true)
    }

})

$('#matriculeEntreprise').on('keyup', function() {
    var entreprise_name = $('#matriculeEntreprise').val();
    if (entreprise_name === '' || entreprise_name.length < 3) {
        $('#matriculeEntreprise').addClass('input-error-warning-long');
    }else {
        $('#matriculeEntreprise').removeClass('input-error-warning-long');
    }
})

$('#numeroPiecePrivee').on('keyup', function(){ // numéro de la pièce
    var num_piece = $('#numeroPiecePrivee').val();
    if (num_piece === '') {
        $("#numeroPiecePrivee").addClass('input-error-warning')
    }else {
        $("#numeroPiecePrivee").removeClass('input-error-warning')
    }
})


function dropdownJs() {
    document.getElementById("myDropdown").classList.toggle("show");
}

function letterOnlyFacture(input) {
    var regex = /[^a-zA-ZÀ-ÿ-._ ]/gi;
    input.value = input.value.replace(regex, "");

    if (input.value.length < 3 && input.value.length >0) {
        $("#airtel_num").addClass('input-error-warning')
    }else {
        $("#airtel_num").removeClass('input-error-warning')
    }
}

function letterOnlyFacture1(input) {
    var regex = /[^a-zA-ZÀ-ÿ-._ ]/gi;
    input.value = input.value.replace(regex, "");

    if (input.value.length < 3 && input.value.length >0) {
        $("#moov_num").addClass('input-error-warning')
    }else {
        $("#moov_num").removeClass('input-error-warning')
    }
}

function letterOnlyMonCarte(input) {
    var regex = /[^a-zA-ZÀ-ÿ-._ ]/gi;
    input.value = input.value.replace(regex, "");

    if (input.value.length < 3 && input.value.length >0) {
        $("#nom-complet-sur-carte").addClass('input-error-warning')
    }else {
        $("#nom-complet-sur-carte").removeClass('input-error-warning')
    }
}

function closeModal() {
    $('#modalVerification').modal('hide')
    $('#modalVerificationIdentite').modal('hide')
}
