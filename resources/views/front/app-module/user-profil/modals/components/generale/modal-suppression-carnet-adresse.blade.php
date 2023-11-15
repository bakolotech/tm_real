<style>
    .entete-modal-delete{
        box-sizing: border-box;
        height: 1px;
        width: 431px;
        border: 1px solid #D8D8D8;
    }

    .text-confirmer-la-suppres {
        height: 24px;
        width: 237px;
        color: #191970;
        font-family: Roboto;
        font-size: 21px;
        font-weight: 500;
        letter-spacing: 0;
        line-height: 23px;
        text-align: center;
        margin-bottom: 14.5px;
        margin-left: 97.5px;
    }

    .etes-vous-sur-de-vou {
        height: 32px;
        width: 289px;
        color: #191970;
        font-family: Roboto;
        font-size: 14px;
        font-weight: 300;
        letter-spacing: -0.34px;
        line-height: 16px;
        text-align: center;
        margin-top: 14.5px;
        margin-left: 71.5px;
    }

    .non-confirm-delete-carnet {
        box-sizing: border-box;
        height: 37px;
        width: 194px;
        border: 1px solid #1A7EF5;
        border-radius: 6px;
        background-color: #FFFFFF;
        margin-left: 15px;
        margin-top: 40px;

    }
    .oui-confirm-delete-carnet{
        height: 37px;
        width: 194px;
        box-sizing: border-box;
        border: 1px solid #1A7EF5;
        border-radius: 6px;
        background-color: #1A7EF5;
        margin-left: 14px;
        margin-top: 40px;
    }
    .button-non{
        width: 100%;
        height: 100%;
        border: none;
        border-radius: 6px;
        background-color: #ffffff;
        color: #1A7EF5;
        font-family: Roboto;
        font-size: 16px;
        font-weight: 500;
        letter-spacing: 0.35px;
        line-height: 18px;
        text-align: center;
    }
    .button-oui{
        width: 100%;
        height: 100%;
        border: none;
        border-radius: 6px;
        background-color: #1A7EF5;
        color: #FFFFFF;
        font-family: Roboto;
        font-size: 16px;
        font-weight: 500;
        letter-spacing: 0.35px;
        line-height: 18px;
        text-align: center;
    }

</style>

<div class="modal fade" id="deleteCarnetAdresse" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true" style="padding-left:250px">
    <div class="modal-dialog  modal-dialog-centered" style="max-width: 432px !important; max-height: 213px !important; border-radius: 6px;">
        <div class="modal-content" style="width: 100% !important; height: 100% !important;background-color: #FFFFFF;box-shadow: 0 5px 15px 0 rgba(0,0,0,0.35);">
            <!-- <button style="z-index: 1;" type="button" class="close-btn" data-dismiss="modal" aria-label="Close">
                <img src="{{ asset('assets/images/close-btn.svg') }}" alt="">
            </button> -->

            <div class="modal-body px-0" style="height: 213px;padding-top: 25px;">
                <div class="text-confirmer-la-suppres"><span>Confirmer la suppression</span></div>
                <div  class="entete-modal-delete"></div>
                <div class="etes-vous-sur-de-vou">
                    <span>Êtes-vous sûr de vouloir supprimer définitivement cette adresse ?</span>
                </div>
                <div class="d-flex">
                    <div class="non-confirm-delete-carnet" id="closeModalAddresse">
                        <button class="button-non">NON</button>
                    </div>
                    <div class="oui-confirm-delete-carnet ">
                          <!-- <form action="{{ url('/carnet-delete/') }}" data-btn="#formDeleteCarnet_submit-btn" method="post" data-tpost="async" id="formDeleteCarnet_myform" >
                            @csrf
                            <input value=""  name="formDeleteCarnet_carnet_id" style="display: none" type="text">
                            <button type="button" id="formDeleteCarnet_submit-btn" class="button-oui">OUI</button>
                        </form> -->

                        <input  hidden value="" id="deleteing_id" name="formDeleteCarnet_carnet_id" type="text">
                        <button type="button"  id="formDeleteCarnet_submit-btn" class="button-oui">OUI</button>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>


<script>

    jQuery(document).ready(function () {
         $(document).on('click', '#formDeleteCarnet_submit-btn', function (e) {
            e.preventDefault();
            var data={};
            var carnet = $('#deleteing_id').val();
            data = {'carnet_id': carnet};
            console.log(data);


            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $.ajax({
                    type: "POST",
                    url: '/carnet-delete',
                    data: data,
                    dataType: "json",
                    success: function (response) {
                        $('#carnet_'+carnet).remove();
                        $('#deleteCarnetAdresse').hide();

                    }
                });   // FIN AJAX CALL


// ------------------------------------deuxieme appelle AJAX- pour verifier si le carnet d'addresse est vide--------------

                var LurlM = '/carnet-getaddress';

                $.ajax({
                    type: "GET",
                    url: LurlM,
                    success: function (response) {
                        var carnets = response.carnet[0];

                     $('#liste-carnet-adresse-vide').empty();

                        if(carnets.length == 0){
                            $('#addressContaineur').append(`<div id="liste-carnet-adresse-vide" class="carnet-adresse">
                                <div class="vous-navez-pas-dad">
                                    <span>Vous n'avez pas d'adresses enregistrées</span>
                                </div>
                                <div class="img-bottom-address1"></div>
                            </div>`)

                        }

                    },
                });

       })




       $(document).on('click', '#closeModalAddresse', function (e) {
            $('#deleteCarnetAdresse').hide();

       })





    });









</script>
