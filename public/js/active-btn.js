
function ValidateEmail(mailval){
    var emailv = mailval
    if (/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/.test(emailv))
    {
        return (true)
    }else {
        return false;
    }
}

function isNumberOnly(value) {
    return /^[0-9]+$/.test(value);
}

// window.addEventListener('load', function () {
    jQuery(document).ready(function () {
        // let error_flag = false;

        function Validate(prenom_input) {
            var isValid = false;
            var regex = /^[a-zA-ZÀ-ÿ-. ]*$/
            isValid = regex.test(prenom_input);
            return isValid;
        }


        // -------------- login validation ------------------
        $(document).on('blur', '#formLogin_email-input', function() {
            var user_name = $(this).val()

            if (user_name.length > 0) {
                $(this).removeClass('input-error-warning')
            }else{
                $(this).addClass('input-error-warning')
            }

        })

        $(document).on('keyup', '#formLogin_email-input', function() {
            var user_name = $(this).val()

            if (user_name.length > 0) {
                $(this).removeClass('input-error-warning')
            }else{
                $(this).addClass('input-error-warning')
            }

            user_login_input_function()

        })

        // $(document).on("blur", "#formLogin_password-input", function() {
        //     var user_pwd = $(this).val()
        //     if (user_pwd.length > 0) {
        //         $('#formLogin_password-input').removeClass('pwd-border-error')
        //     }else{
        //         $('#formLogin_password-input').addClass('pwd-border-error')
        //     }
        // });

        $(document).on('blur', '#formLogin_password-field', function() {
            var user_pwd = $(this).val()

            if (user_pwd.length > 0) {
                $('#formLogin_password-input').removeClass('pwd-border-error')
            }else{
                $('#formLogin_password-input').addClass('pwd-border-error')
            }
        })

        $(document).on('keyup', '#formLogin_password-field', function() {
            var user_pwd = $(this).val()

            if (user_pwd.length > 0) {
                $('#formLogin_password-input').removeClass('pwd-border-error')
            }else{
                $('#formLogin_password-input').addClass('pwd-border-error')
            }

            user_login_input_function()
        })

        function user_login_input_function() {
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

        // --------------- user register validate function ----------
        $(document).on('blur', '#formRegister_prenom-input', function() {
            var user_name = $(this).val()

            if (user_name.length > 0) {
                $(this).removeClass('input-error-warning')
            }else{
                $(this).addClass('input-error-warning')
            }
        })

        $(document).on('keyup', '#formRegister_prenom-input', function() {
            var user_name = $(this).val()

            if (user_name.length > 0) {
                $(this).removeClass('input-error-warning')
            }else{
                $(this).addClass('input-error-warning')
            }

            user_register_input_validation()

        })

        $(document).on('blur', '#formRegister_nom-input', function() {
            var user_first_name = $(this).val()

            if (user_first_name.length > 0) {
                $(this).removeClass('input-error-warning')
            }else{
                $(this).addClass('input-error-warning')
            }

        })

        $(document).on('keyup', '#formRegister_nom-input', function() {
            var user_first_name = $(this).val()

            if (user_first_name.length > 0) {
                $(this).removeClass('input-error-warning')
            }else{
                $(this).addClass('input-error-warning')
            }

            user_register_input_validation()

        })

        $(document).on('blur', '#formRegister_email-input', function() {

            var user_email = $(this).val()
            let isvalid = ValidateEmail(user_email)
            let numberOnly = isNumberOnly(user_email)

            if (user_email.length > 0 && isvalid) {
                $(this).removeClass('input-error-warning')
            }else if(numberOnly && user_email.length > 8){
                $(this).removeClass('input-error-warning')
            }else{
                $(this).addClass('input-error-warning')
            }

        })

        $('#formRegister_email-input').bind('keyup', 'keydown', function(event) {

            var user_email = $(this).val()
            let isvalid = ValidateEmail(user_email)
            let numberOnly = isNumberOnly(user_email)

            if (user_email.length > 0 && isvalid) {
                $(this).removeClass('input-error-warning')
            }else if(numberOnly && user_email.length > 8){
                console.log('Here we are in number only')
                $(this).removeClass('input-error-warning')
            }else{
                $(this).addClass('input-error-warning')
            }

            user_register_input_validation()

        })

        $(document).on('blur', '#formRegister-passwordRegister', function() {

            var user_pwd = $(this).val()

            if (user_pwd.length > 0) {
                $(this).removeClass('input-error-warning-pwd-r')

                $('#pwd-border-error-register').removeClass('pwd-border-error')
            }else{
                $(this).addClass('input-error-warning-pwd-r')
                $('#pwd-border-error-register').addClass('pwd-border-error')
            }

        })

        $(document).on('keyup', '#formRegister-passwordRegister', function() {
            var user_pwd = $(this).val()

            if (user_pwd.length > 0) {
                $(this).removeClass('input-error-warning-pwd-r')

                $('#pwd-border-error-register').removeClass('pwd-border-error')
            }else{
                $(this).addClass('input-error-warning-pwd-r')
                $('#pwd-border-error-register').addClass('pwd-border-error')
            }

            user_register_input_validation()

        })

        $(document).on('blur', '#formLogin-registerLogin', function() {
            var c_user_pwd = $(this).val()

            if (c_user_pwd.length > 0) {
                $(this).removeClass('input-error-warning-pwd-r')
                $('#pwdc-border-error-register').removeClass('pwd-border-error')
            }else{
                $(this).addClass('input-error-warning-pwd-r')
                $('#pwdc-border-error-register').addClass('pwd-border-error')
            }

        })

        $(document).on('keyup', '#formLogin-registerLogin', function() {
            var c_user_pwd = $(this).val()

            if (c_user_pwd.length > 0) {
                $(this).removeClass('input-error-warning-pwd-r')
                $('#pwdc-border-error-register').removeClass('pwd-border-error')
            }else{
                $(this).addClass('input-error-warning-pwd-r')
                $('#pwdc-border-error-register').addClass('pwd-border-error')
            }

            user_register_input_validation()

        })

        function user_register_input_validation() {
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

        let error_flag_prenom = false;
        let error_flag_nom = false;
        let error_flag_email = false;
        let error_flag_pwd = false;
        let error_flag_pwdconfirm = false;

        $(document).on('blur', '#formVendeur_prenom-input', function(){
            var prenom = $('#formVendeur_prenom-input').val();
            if (!Validate(prenom) || prenom === '') {
                $("#formVendeur_prenom-input").addClass('input-error-warning')
                $('#prenom_error_message-vendeur').removeClass('error-none')
                $("#formVendeur_prenom-input").removeClass('input-success-border')
                $('#prenom_error_message-vendeur').addClass('block-display')
                error_flag_prenom = true;
                error_tab.push(1);
            }else {
                error_flag_prenom = false;
                $("#formVendeur_prenom-input").removeClass('input-error-warning')
                $("#formVendeur_prenom-input").addClass('input-success-border')
                $('#prenom_error_message-vendeur').addClass('error-none')
                $('#prenom_error_message-vendeur').removeClass('block-display')
            }
        })

        $(document).on('blur', '#formVendeur_nom-input', function(){
            var nom = $('#formVendeur_nom-input').val();
            if (!Validate(nom) || nom === '') {
                $("#formVendeur_nom-input").addClass('input-error-warning')
                $("#formVendeur_nom-input").removeClass('input-success-border')
                $('#nom_error_message-vendeur').removeClass('error-none');
                $('#nom_error_message-vendeur').addClass('block-display')
                error_flag_nom = true;
            }else {
                error_flag_nom = false;
                $("#formVendeur_nom-input").removeClass('input-error-warning')
                $("#formVendeur_nom-input").addClass('input-success-border')
                $('#nom_error_message-vendeur').addClass('error-none');
                $('#nom_error_message-vendeur').removeClass('block-display')
            }

        })

        $(document).on('blur', '#formVendeur_email-input', function() {
            let email = $('#formVendeur_email-input').val();
            let isvalid = ValidateEmail(email)

            if (!isvalid) {
                $('#email_error_message-vendeur').removeClass('error-none')
                $('#email_error_message-vendeur').addClass('block-display')
                $('#formVendeur_email-input').addClass('input-error-warning')
                $('#formVendeur_email-input').removeClass('input-success-border')
                error_flag_email = true
            }else {
                $('#email_error_message-vendeur').addClass('error-none')
                $('#email_error_message-vendeur').removeClass('block-display')
                $('#formVendeur_email-input').removeClass('input-error-warning')
                $('#formVendeur_email-input').addClass('input-success-border')
                error_flag_email = false
            }
        })

        $('#formVendeur-password').on('blur', function(){
            let passwd = $('#formVendeur-password').val()
            if (passwd.length < 5) {
                $('#pwd_error_message-vendeur').removeClass('error-none')
                $('#pwd_error_message-vendeur').addClass('block-display')
                $('#formVendeur-password').addClass('input-error-warning-pwd')
                $('#pwd-border-error').addClass('pwd-border-error')
                $('#pwd-border-error').removeClass('input-success-border')
                error_flag_pwd = true;
            }else{
                $('#pwd_error_message-vendeur').addClass('error-none')
                $('#pwd_error_message-vendeur').removeClass('block-display')
                $('#formVendeur-password').removeClass('input-error-warning-pwd')
                $('#pwd-border-error').removeClass('pwd-border-error')
                $('#pwd-border-error').addClass('input-success-border')
                error_flag_pwd = false;
            }
        })

        $('#formVendeur-confirmation').on('blur', function() {
            let passwordConfirmation = $('#formVendeur-confirmation').val();
            let passwd = $('#formVendeur-password').val()

            if (passwordConfirmation !== passwd) {
                $('#pwdconfirm_error_message-vendeur').removeClass('error-none')
                $('#pwdconfirm_error_message-vendeur').addClass('block-display')
                $('#formVendeur-confirmation').addClass('input-error-warning-pwd')
                $('#pwdc-border-error').addClass('pwd-border-error')
                $('#pwdc-border-error').removeClass('input-success-border')
                error_flag_pwdconfirm = true;
            }else {
                $('#pwdconfirm_error_message-vendeur').addClass('error-none')
                $('#pwdconfirm_error_message-vendeur').removeClass('block-display')
                $('#formVendeur-confirmation').removeClass('input-error-warning-pwd')
                $('#pwdc-border-error').removeClass('pwd-border-error')
                $('#pwdc-border-error').addClass('input-success-border')
                error_flag_pwdconfirm = false;
            }

        })

        // ------------------ vendeur input validate -------------
        $("#formVendeur_prenom-input").on('keyup', function(){
            var v_name = $(this).val();
            if (v_name.length > 0) {
                $("#formVendeur_prenom-input").removeClass('input-error-warning')
                $("#formVendeur_prenom-input").addClass('input-success-border')
                $('#prenom_error_message-vendeur').addClass('error-none')
                $('#prenom_error_message-vendeur').removeClass('block-display')
            }else{
                $("#formVendeur_prenom-input").addClass('input-error-warning')
                $('#prenom_error_message-vendeur').removeClass('error-none')
                $("#formVendeur_prenom-input").removeClass('input-success-border')
                $('#prenom_error_message-vendeur').addClass('block-display')
            }

            user_vendeur_input_validation()

        })

        $(document).on('keyup', '#formVendeur_nom-input', function(){
            var v_fname = $(this).val();
            if (v_fname.length > 0) {
                $("#formVendeur_nom-input").removeClass('input-error-warning')
                $("#formVendeur_nom-input").addClass('input-success-border')
                $('#nom_error_message-vendeur').addClass('error-none');
                $('#nom_error_message-vendeur').removeClass('block-display')
            }else {
                $("#formVendeur_nom-input").addClass('input-error-warning')
                $("#formVendeur_nom-input").removeClass('input-success-border')
                $('#nom_error_message-vendeur').removeClass('error-none');
                $('#nom_error_message-vendeur').addClass('block-display')
            }

            user_vendeur_input_validation()

        })

        $('#formVendeur_email-input').on('keyup', function(){
            var v_email = $(this).val();
            if (v_email.length > 0) {
                $('#email_error_message-vendeur').addClass('error-none')
                $('#email_error_message-vendeur').removeClass('block-display')
                $('#formVendeur_email-input').removeClass('input-error-warning')
                $('#formVendeur_email-input').addClass('input-success-border')
            }else{
                $('#email_error_message-vendeur').removeClass('error-none')
                $('#email_error_message-vendeur').addClass('block-display')
                $('#formVendeur_email-input').addClass('input-error-warning')
                $('#formVendeur_email-input').removeClass('input-success-border')
            }

            user_vendeur_input_validation()

        })

        $(document).on('keyup', '#formVendeur-password', function(){
            var v_pwd = $(this).val();
            if (v_pwd.length > 0) {
                $('#pwd_error_message-vendeur').addClass('error-none')
                $('#pwd_error_message-vendeur').removeClass('block-display')
                $('#formVendeur-password').removeClass('input-error-warning-pwd')
                $('#pwd-border-error').removeClass('pwd-border-error')
                $('#pwd-border-error').addClass('input-success-border')
            }else {
                $('#pwd_error_message-vendeur').removeClass('error-none')
                $('#pwd_error_message-vendeur').addClass('block-display')
                $('#formVendeur-password').addClass('input-error-warning-pwd')
                $('#pwd-border-error').addClass('pwd-border-error')
                $('#pwd-border-error').removeClass('input-success-border')
            }

            user_vendeur_input_validation()

        })

        $(document).on('keyup', '#formVendeur-confirmation', function(){
            var cv_pwd = $(this).val()
            if (cv_pwd.length > 0) {
                $('#pwdconfirm_error_message-vendeur').addClass('error-none')
                $('#pwdconfirm_error_message-vendeur').removeClass('block-display')
                $('#formVendeur-confirmation').removeClass('input-error-warning-pwd')
                $('#pwdc-border-error').removeClass('pwd-border-error')
                $('#pwdc-border-error').addClass('input-success-border')
            }else {
                $('#pwdconfirm_error_message-vendeur').removeClass('error-none')
                $('#pwdconfirm_error_message-vendeur').addClass('block-display')
                $('#formVendeur-confirmation').addClass('input-error-warning-pwd')
                $('#pwdc-border-error').addClass('pwd-border-error')
                $('#pwdc-border-error').removeClass('input-success-border')
            }

            user_vendeur_input_validation()

        })

        function user_vendeur_input_validation () {

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

        $("input, select, textarea").keyup(function () {
            let i = 0
        })
    })

// })


activeBtn = function(formKey){
    let form = $('#'+ formKey +'myform');
    let submitButton = $('#'+ formKey +'submit-btn')
    let button = $('#'+ formKey +'button')
    let uniqueBtn = $('#'+ formKey +'unique_button')
    if (form[0] && form[0].length > 0){
        let i = 0; let j = 0; let k=0
        $.each(form[0], function (key, value) {
            if(value.name && (value.name != '_token' && value.name != '_method')){
                if ($(value).attr('data-old') && $(value).attr('data-old') != $(value).val()){
                    j = 1;
                }
            }
        })

        if (j === 1){
            submitButton.prop('disabled', false)

            button.addClass('mon-btn-primary')
            button.removeClass('btn-disabled')

            uniqueBtn.prop('disabled', false)
            uniqueBtn.addClass('mon-btn-primary')
            uniqueBtn.removeClass('btn-disabled')
        }
        else{
            submitButton.prop('disabled', true)

            button.removeClass('mon-btn-primary')
            button.addClass('btn-disabled')

            uniqueBtn.prop('disabled', true)
            uniqueBtn.removeClass('mon-btn-primary')
            uniqueBtn.addClass('btn-disabled')
        }
    }
}
