jQuery(document).ready(function () {

    let mot = '';

    $('.select-li').click(function () {
        let selectHtml = $(this.childNodes[1]).html();
        let parentId = '#'+ $($(this).parent()).attr('id');
        parent = $("[data-ul-id='"+ parentId +"']");
        parent.html(selectHtml)

        $(parentId).toggle(100)

        if ($(parent).attr('data-opened') == 1){
            $(parentId +'-main-img, .select-main-div-img').addClass('with-borderkk');
        }

        let input = $(this).attr('data-input');
        if (input && input !== null){
            $(input).val($(this).attr('data-value'));
            statesSelect = $(input).attr('data-select')
            paysChanged($(input), statesSelect)
        }

        $(parent).attr('data-opened', function(index, attr){
            if(attr == 1) return 0;
            else if (attr == 0) return  1;
        })

        $($(this).parent('ul')).attr('data-opened', 0);
        setTimeout(()=>{
            marcherChanged();
        }, 500)

    })

    $('.select-li-marchand').click(function () {

        let selectHtml = $(this.childNodes[1]).html();

        // $('.select-main-div-img').removeClass('with-border')

        let img_cherche = $(this).find('.select-main-div-img');
        let code = $(this).attr('data-text');
        $('#code-phone-m').text(code)

        let nouvell_element = '<div class="select-main-div-img">'+img_cherche.html()+'</div><div class="selected-li"></div>'

        let parentId = '#'+ $($(this).parent()).attr('id');
        parent = $("[data-ul-id='"+ parentId +"']");
        parent.html(nouvell_element)

        $(parentId).toggle(100)

        if ($(parent).attr('data-opened') == 1){
            $(parentId +'-main-img, .select-main-div-img').removeClass('with-border');
        }


        $(parent).attr('data-opened', function(index, attr){
            if(attr == 1) return 0;
            else if (attr == 0) return  1;
        })


    })

    $('.img-select').change(function () {
        let imgField = $(this).attr('data-img-field')
        let selected = $(this).find(':selected')
        let image = $(selected).attr('data-img')
        $(imgField).attr('src', image)
    })


    $(".select-main-div").click(function () {

        let ulId = $(this).attr('data-ul-id')

        $(ulId).attr('data-opened', function(index, attr){
            return attr == 1 ? 0 : 1;
        });

        $(this).attr('data-opened', function(index, attr){
            if(attr == 1) return 0;
            else if (attr == 0) return  1;
        })

        //$(ulId).slideToggle(100);

        if($(ulId).attr('data-opened') == 1){
            $(ulId).slideDown(100);
        }
        else{
            $(ulId).slideUp(100);
        }

        if ($(this).attr('data-opened') == 1){
            $(ulId +'-main-img, .select-main-div-img').removeClass('with-border');
        }
        else if ($(this).attr('data-opened') == 0){
            // $(ulId +'-main-img, .select-main-div-img').addClass('with-border');
        }
    })

    $(window).keyup(function (event) {
        let str_1 = "";
        let str_2 = "";
        let select = $("ul[data-opened='1']");
        mot += String.fromCharCode(event.keyCode);
        if ((select).length > 0 && mot.length > 0){
            $("ul[data-opened='1']").each(function (key, value) {
                x = 0;
                $(value).children().each(function (key2, value2) {
                    if (($(value2).attr('data-text')).substring(0, mot.length).includes(mot)) {
                        if (x == 0){
                            value2Top = $(value2)[0].offsetTop;
                            $(value)[0].scrollTop = value2Top
                            x=1;
                        }
                    }
                })
            })
        }
        setTimeout(()=>{mot = ''}, 1500);
    })

    function activeLoginBtn1() {

        let email = $('#formLogin_email-input-inviter');
        let pwd = $('#formLogin_password-field-inviter')

        let email1 = $('#formLogin_email-input-inviter').val();
        let pwd1 = $('#formLogin_password-field-inviter').val()

        if (!$(email).hasClass('input-error-warning') && !$(pwd).hasClass('input-error-warning-pwd')  &&  email1.length > 0 && pwd1.length > 0 ) {
            $('#login-register-btn-2').removeClass('btn-disabled')
            $('#login-register-btn-2').addClass('btn-active')
            $('#login-error-message-id').addClass('d-none')
        }else {
            $('#login-register-btn-2').removeClass('btn-active')
            $('#login-register-btn-2').addClass('btn-disabled')
        }

    }

    function open_save_button_login_register1 () {

    let prenom = $('#formRegister_prenom-input-invite');
    let nom = $('#formRegister_nom-input-invite')
    let email = $('#formRegister_email-input-invite');
    let pwd = $('#formRegister-passwordRegister-invite');
    let c_pwd = $('#formLogin-registerLogin-invite')

    // ----------------------------- input values ---------------------------
    let prenom1 = $('#formRegister_prenom-input-invite').val();
    let nom1 = $('#formRegister_nom-input-invite').val()
    let email1 = $('#formRegister_email-input-invite').val();
    let pwd1 = $('#formRegister-passwordRegister-invite').val();
    let c_pwd1 = $('#formLogin-registerLogin-invite').val()

    let comp_addr2 = $('#comp-addre-user-invite').val();

    let code_poste_invite1 = $('#code-poste-user-invite');
    let nom_entreprise_invite = $('#nom-entreprise-user-invite');
    console.log('Le pwd est:', pwd1)
    // pwd-border-error
    if (!$(prenom).hasClass('input-error-warning') && !$(nom).hasClass('input-error-warning') && !$(email).hasClass('input-error-warning-long') && !$(pwd).hasClass('input-error-warning-pwd') && !$(c_pwd).hasClass('input-error-warning-pwd') &&  prenom1.length > 0 && nom1.length > 0 && email1.length > 0  && pwd1.length > 4 && c_pwd1.length > 4) {

        $('#login-register-btn-2').removeClass('btn-disabled')
        $('#login-register-btn-2').addClass('btn-active')

    }else {

        $('#login-register-btn-2').removeClass('btn-active')
        $('#login-register-btn-2').addClass('btn-disabled')

    }
    }

function convertString(phrase) {
    var maxLength = 100;

    var returnString = phrase.toLowerCase();
    //Convert Characters
    returnString = returnString.replace("ą", "a");
    returnString = returnString.replace("č", "c");
    returnString = returnString.replace("ę", "e");
    returnString = returnString.replace("ė", "e");
    returnString = returnString.replace("į", "i");
    returnString = returnString.replace("š", "s");
    returnString = returnString.replace("ų", "u");
    returnString = returnString.replace("ū", "u");
    returnString = returnString.replace("ž", "z");

    // if there are other invalid chars, convert them into blank spaces
    returnString = returnString.replace(/[^a-z0-9\s-]/g, "");
    // convert multiple spaces and hyphens into one space
    returnString = returnString.replace(/[\s-]+/g, " ");
    // trims current string
    returnString = returnString.replace(/^\s+|\s+$/g, "");
    // cuts string (if too long)
    if (returnString.length > maxLength) returnString = returnString.substring(0, maxLength);
    // add hyphens
    returnString = returnString.replace(/\s/g, "-");

    return returnString;
    }

    function user_login_input_function1() {
        var user_name = $('#formLogin_email-input').val()
        var user_pwd = $('#formLogin_password-field').val()

        var user_name1 = $('#formLogin_email-input')

        if (user_name.length > 0 && user_pwd.length > 0 && !$(user_name1).hasClass('input-error-warning')) {
            // $(button[0]).prop('disabled', false);
            $('#login-register-btn').addClass('btn-active')
            $('#login-register-btn').removeClass('.btn-disabled')
            $('#login-register-btn').prop('disabled', false)
        } else {
            // $(button[0]).prop('disabled', true);
            $('#login-register-btn').removeClass('btn-active')
            $('#login-register-btn').addClass('.btn-disabled')
            $('#login-register-btn').prop('disabled', true)
        }
    }

    function user_register_input_validation1() {
        console.log('Nous y sommes')
        var user_name = $('#formRegister_prenom-input')
        var user_first_name = $('#formRegister_nom-input')
        var user_email = $('#formRegister_email-input')
        var user_pwd = $('#formRegister-passwordRegister')

        var user_name_val = $('#formRegister_prenom-input').val()
        var user_first_name_val = $('#formRegister_nom-input').val()
        var user_email_val = $('#formRegister_email-input').val()

        var c_user_pwd = $('#formLogin-registerLogin')

        var user_pwd_val = $('#formRegister-passwordRegister').val()
        var c_user_pwd_val = $('#formLogin-registerLogin').val()

        if (!$(user_name).hasClass('input-error-warning') && !$(user_first_name).hasClass('input-error-warning') && !$(user_email).hasClass('input-error-warning') && !$(user_pwd).hasClass('input-error-warning') && user_name_val.length > 0 && user_first_name_val.length > 0 && user_email_val.length > 0 && user_pwd_val.length > 0 && c_user_pwd_val.length > 0) {

            $('#login-register-btn').addClass('btn-active')
            $('#login-register-btn').removeClass('.btn-disabled')
            $('#login-register-btn').prop('disabled', false)

        }else {

            $('#login-register-btn').removeClass('btn-active')
            $('#login-register-btn').addClass('.btn-disabled')
            $('#login-register-btn').prop('disabled', true)
        }


    }

    function user_vendeur_input_validation1 () {

        var prenom = $("#formVendeur_prenom-input");
        var nom_v = $("#formVendeur_nom-input");
        let email = $('#formVendeur_email-input');
        let pwd_border = $('#formVendeur-password')

        var prenom_val = $("#formVendeur_prenom-input").val();
        var nom_v_val = $("#formVendeur_nom-input").val();
        let email_val = $('#formVendeur_email-input').val();
        let isvalid = ValidateEmail(email_val)
        let passwd_val = $('#formVendeur-password').val()
        let passwordConfirmation_val = $('#formVendeur-confirmation').val();

        console.log('Le pass est : ', passwordConfirmation_val)
        console.log('Et la valeur est:', passwd_val)

        if (!$(prenom).hasClass('input-error-warning') && !$(nom_v).hasClass('input-error-warning') && !$(email).hasClass('input-error-warning') && !$(pwd_border).hasClass('input-error-warning-pwd') && prenom_val.length > 0 && nom_v_val.length > 0  && email_val.length > 0 && passwd_val.length > 0 && passwordConfirmation_val == passwd_val && isvalid) {
            console.log('Bon bien ')
            $('#login-register-btn').addClass('btn-active')
            $('#login-register-btn').removeClass('.btn-disabled')
            $('#login-register-btn').prop('disabled', false)

        }else{
            $('#login-register-btn').removeClass('btn-active')
            $('#login-register-btn').addClass('.btn-disabled')
            $('#login-register-btn').prop('disabled', true)
        }

    }

    $(document).on('click', '.login-register-btn', function (e) {

        setTimeout(() => {
            let panel =  $(this).attr('data-panel');
            console.log('Le panel solicité est:', panel)

            $('.login-register-btn').not(this).each(function (key, value) {
                $(value).addClass('button-mute');
                $(value).removeClass('actif');
                $('#'+ $(value).attr('data-panel')).addClass('d-none')
            })
            $(this).addClass('actif')
            $(this).removeClass('button-mute')
            $('#'+ panel).removeClass('d-none')
            $('#login-register-btn').attr('data-for', panel +'-btn')

            if (panel == 'form-connexion') {
                $('#login-register-btn').text('Se connecter')
                user_login_input_function1()
            }else if (panel == 'form-inscription') {
                $('#login-register-btn').text('S\'inscrire')
                user_register_input_validation1()
            }else if(panel == 'form-devenir-vendeur') {
                $('#login-register-btn').text('S\'inscrire')
                user_vendeur_input_validation1()
            }

        }, 500)
    })

    $(document).on('click', '.login-register-btn-client', function() {
        setTimeout(() => {
            let panel =  $(this).attr('data-panel');
            console.log('Votre panel est ici', panel)
            $('.login-register-btn-client').not(this).each(function (key, value) {
                $(value).addClass('button-mute');
                $(value).removeClass('actif');
                $('#'+ $(value).attr('data-panel')).addClass('d-none')
            })
            $(this).addClass('actif')

            $(this).removeClass('button-mute')
            $('#'+ panel).removeClass('d-none')
            $('.login-register-btn-client').attr('data-for', panel +'-btn')

            if (panel == 'form-connexion-invite') {
                activeLoginBtn1()
            }else if (panel == 'form-inscription-invite') {
                open_save_button_login_register1()
            }
        }, 500)
    })

    $('.form-loader').each(function (key, value) {
        formLoader(value)
    })

    // if (!error_flag_prenom && !error_flag_nom && !error_flag_pwd && !error_flag_pwdconfirm && !error_flag_email) {
    //     console.log('activation possible')
    // }

})

/**
 * @param imge
 * @param text
 * @returns {string}
 */
function liRow(image, texte, value){
    return "<li class='select-li' data-value='"+ value +"'><div class='select-second-div'>"+ imgAndText(image, texte) +"</div></li>";
}

imgAndText = function (image, texte) {
    return "<div class='select-main-div-img'><img src='"+ image +"' alt=''></div><div class='select-main-div-text'>"+ texte +"</div><div class='selected-li'></div>";
}

/**
 * @param li
 * @param id
 * @returns {string}
 */
function mainRow(li, id){
    return "<div class='select-main-div' data-ul-id='"+ id +"'>"+ li +"</div>"
}

/**
 * @param li_s
 * @returns {string}
 */
function ul(li_s) {
    return "<ul class='select-ul' id='id1'>"+ li_s +"</ul>"
}

/**
 * @param str
 * @returns {string}
 */
function dropdown(str) {
    return "<div class='my-select-img'>"+ str +"</div>"
}

function togglePasswordEye(element) {
    let host = $('#public-host').val()
    if($(element).attr('data-icon') == 0){
        $(element).attr('data-icon', 1)
        $(element).html("<img src='"+ host +"/assets/images2/Ouvert.svg' />")
        $($(element).attr('data-password-id')).attr('type', 'text')
    }
    else{
        $(element).attr('data-icon', 0)
        $(element).html("<img src='"+ host +"/assets/images2/Fermes2.svg' />")
        $($(element).attr('data-password-id')).attr('type', 'password')
    }
}


function loaderOrForm(key) {
    $('#' + key + 'form').addClass('d-none');
    $('#' + key + 'form-loader').removeClass('d-none');
}


function load(key) {
    $('#' + key + 'btn-text').addClass('d-none');
    $('#' + key + 'btn-loader').removeClass('d-none');
    $('#' + key + 'submitBtn').prop('disabled', true);
    $('#' + key + 'unique_button').prop('disabled', true);
}

function endLoad(key) {
    $('#' + key + 'btn-loader').addClass('d-none');
    $('#' + key + 'btn-text').removeClass('d-none');
    $('#' + key + 'submitBtn').prop('disabled', false);
    $('#' + key + 'unique_button').prop('disabled', false);

}

function loaderOrFormReset(key) {
    loaderOrForm(key)
    $('#' + key + 'loader-spinner').removeClass('d-none');
    $('#' + key + 'rets-d-msg').html('');
}

function resetForm(formKey){
    form = $("#"+ formKey +"myform")
    $.each(form[0], (key, value) => {
        if(value.name && value.type!='hidden'){
            $(value).value = '';
            $(value).prop('checked', false);
        }

    })
    $("img[data-field= '"+ formKey +"img-preview']").attr('src', form.attr('data-default-img'))
}

function formOrLoader2(key) {
    $("#"+ key +"form").toggleClass('d-none');
    $("#"+ key +"form-loader").toggleClass('d-none');
}

/**
 *
 * @param key
 * @param dNone
 */
function formToggle(key, dNone = 0) {
    if (dNone == 0){
        $("#"+ key +"form").addClass('d-none');
    }
    else{
        $("#"+ key +"form").removeClass('d-none');
    }
}

/**
 *
 * @param key
 * @param dNone
 */
function loaderToggle(key, dNone = 0) {
    if (dNone == 0){
        $("#"+ key +"form-loader").addClass('d-none');
    }
    else{
        $("#"+ key +"form-loader").removeClass('d-none');
    }
}

function liClick() {

    $('.select-li').click(function () {
        let selectHtml = $(this.childNodes[1]).html();
        let parentId = '#'+ $($(this).parent()).attr('id');
        $("[data-ul-id='"+ parentId +"']").html(selectHtml)
        $(parentId).toggle(100)
        let input = $(this).attr('data-input');
        if (input && input !== null){
            $(input).val($(this).attr('data-value'));
            statesSelect = $(input).attr('data-select')
            paysChanged($(input), statesSelect)
        }
    })

}

function getFormData(event) {
    event.preventDefault();
    let id = event.currentTarget.id
    let form = $('#' + id);
    let action = form.attr('action');
    let method = form.attr('method');
    let formKey = id.replace('myform', '');
    let data = {};
    $.each(form[0], (key, value) =>{
        if(value.name){
            data[value.name.replace(formKey,'')] = $(value).val();
            //console.log(key + ' : '+ value.name.replace(formKey,'') + ' => ' + $(value).val())
        }
    })

    return {data: data, action: action, method: method};
}

function formLoader(element) {
    // let str = "<div class='my-formloader'>\n" +
    //           "    <img src='../assets/images2/load.gif' alt=''>\n" +
    //           "</div>"
    // $(element).html(str);
}

/**
 * Mettre en majuscule les 1ère lettres d'une phrase
 * @param word
 * @returns {string}
 */
function ucfirts(word) {
    return  word.toLowerCase().replace(/\b[a-z]/g, function(letra) {
        return letra.toUpperCase();
    });
}


 /*function error(retour, formKey) {
    if (retour && retour.responseJSON && retour.responseJSON.errors){
        console.log(retour.responseJSON.errors)
        $.each(retour.responseJSON.errors, function (key, value) {
            $.each(value, function (key2, value2) {
                $('#' + formKey + key + '-error').append('<span class="text-danger">'+value2+'</span>');
                $('#' + formKey + key + '-input').addClass('is-invalid')
            })
        })

        let retErrText = retour.responseJSON.message
        $('#' + formKey + 'form').removeClass('d-none');
        $('#' + formKey + 'form-loader').addClass('d-none');
    }
}

function success(retour, formKey, reload = true){
    if(reload) loaderToggle(formKey, 0);
    if (retour[0].error == 0){
        if (retour[0].reInit && retour[0].reInit.active == 1){
            ajax(retour[0].reInit.url, {_token: retour[0].reInit._token},'post')
        }
        if (retour[0].redirect && retour[0].redirect.active == 1){
            window.location = retour[0].redirect.url;
        }
        else if(reload) location.reload();
        else formOrLoader2(formKey);

    }
    else{
        //let retErrText = retour[0].text + '\n' + retour[0].data
        $('#' + formKey + 'form').removeClass('d-none');
        $('#' + formKey + 'form-loader').addClass('d-none');
    }
}

*/


function marcherChanged() {
    let input = $('#formChangeBoutique_pays');
    let citySelect = $('#formChangeBoutique_city-input');
    if (input.val() == input.attr('data-position') && citySelect.attr('data-default-city') == citySelect.val()){
        $('.change-magasin-message').html("<span>Marché par défaut</span>")
    }
    else{
        $('.change-magasin-message').html("<span>Marché personnalisé</span>")
    }
}

/**
 * Bloquer un champs de formulaire
 * @param inputId
 */
function disabledInput(inputId) {
    $(inputId).addClass('is-disabled');
    $(inputId).prop('disabled', true);
}

/**
 * Débloquer un champs de formulaire
 * @param inputId
 */
function unDisabledInput(inputId) {
    $(inputId).removeClass('is-disabled');
    $(inputId).prop('disabled', false);
}


function closeSelect(element) {
    let champ = $(element);
    if ($(element).attr('data-opened') == 1){
        let ulId = $(element).attr('data-ul-id')
        $(ulId).attr('data-opened', 0);
        $(element).attr('data-opened', 0);
        $(ulId).hide();
        $((champ.children())[0]).addClass('with-border')
    }
}

function submitMarche() {
    document.getElementById('formChangeBoutique_submit-btn').click()
}
