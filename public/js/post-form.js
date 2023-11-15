window.addEventListener('load', function () {

    jQuery(document).ready(function () {
        let error_tab = false;
        $(document).on('submit', "form[data-tpost='async']" ,(event) => {
            event.preventDefault();
            let id = event.currentTarget.id
            let form = $('#' + id);
            console.log('voici notre formulaire', form)
            let action = form.attr('action');
            let method = form.attr('method');
            let formKey = id.replace('myform', '');
            let data = {};
            let file = {};

            $.each(form[0], (key, value) =>{
                if(value.name){
                    if ($(value).attr('type') == 'radio'){
                        if ($(value).prop('checked') === true){
                            data[value.name.replace(formKey,'')] = $(value).val();
                        }
                    }
                    else{
                        data[value.name.replace(formKey,'')] = $(value).val();
                    }
                }
            })

            console.log('Les données envoyées sont: ', data);

            load(formKey)
            if (!file.isEmpty){
                data['mes_files'] = file;
            }
            let request = ajax(action, data, method, formKey)
                .then(function (retour) {
                    //console.log('succes_bachir',retour);
                    var pwd_source_modif = $('#pwd_modification_source').val();
                    console.log('La source de la modif est:', pwd_source_modif)
                    console.log('Retour data:', retour)

                    if (retour == undefined) {
                        $('#formLogin_main-error').removeClass('d-none')
                    }

                var dataDevise = [];

                    if (retour[0].error == 5) {
                        if (pwd_source_modif == '0') {

                            $('#exampleModal2').modal({
                                backdrop: 'static',
                                keyboard: false
                            })

                        $('#exampleModal2').modal('show');
                            $('#exampleModal_pwd').modal('hide')

                        }else if(pwd_source_modif == '1') {

                            $('#exampleModal2').modal({
                                backdrop: 'static',
                                keyboard: false
                            })
                            $('#exampleModal2').modal('show');

                            $('#exampleModal_pwd').modal('hide')

                        }

                        const input = document.getElementById("exampleFormControlInput1");
                        const error = document.getElementById("basic-addon2");
                        const error1 = document.getElementById("basic-addon1");
                        const email = document.getElementById('mon_email');

                        input.value = "";
                        email.innerHTML = retour[0].e;

                    }
                    if (retour[0].error == 4) {

                        $('#basic-addon1').removeClass('error-pass-none')
                        $('#exampleFormControlInput1').addClass('input-error-warning')
                        $('#exampleFormControlInput1').val("")

                        const input = document.getElementById("exampleFormControlInput1");
                        const error = document.getElementById("basic-addon2");
                        error.classList.remove('error');
                        error.style.removeProperty('display');

                        const error1 = document.getElementById("basic-addon1");
                        error1.classList.remove('error1');

                        input.classList.toggle('none');
                    }


                    // _.each(retour[0].devises, function(model){
                    //     dataDevise.push(model.id);
                    //     dataDevise.push(model.code);
                    // });

                    // sessionStorage.setItem("devises",  dataDevise[1]); 

                    success(retour, formKey, false);

                })
                .catch(function (retour) {
                    console.log('debug erreur',retour);
                });
        });

    })

})
