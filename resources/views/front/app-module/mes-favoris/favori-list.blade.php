<style>
    .etes-vous-sur-de-vou-client {
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

    .text-confirmer-la-suppres-client {
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

    .entete-modal-delete-client {
        box-sizing: border-box;
        height: 1px;
        width: 431px;
        border: 1px solid #D8D8D8;
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

    #link-to-share-product {
        position: relative;
        width: 336px;
        border: 0px;
        top: 5px;
        left: -20px;
    }

    #link-to-share-product:focus {
        border: none;
        outline: none;
    }

    .favori-btn-connection {
        height: 37px;
        width: 227px;
        border-radius: 6px;
        background-color: #1A7EF5;

        color: #FFFFFF;
        font-family: Roboto;
        font-size: 14px;
        font-weight: 500;
        letter-spacing: 0.31px;
        line-height: 18px;
        text-align: center;
        border: transparent;

    }

    .fav-msg-libelle {
        height: 16px;
        width: 216px;
        color: #191970;
        font-family: Roboto;
        font-size: 14px;
        font-weight: 300;
        letter-spacing: -0.34px;
        line-height: 16px;
        text-align: center;
        position: relative;
        margin-right: auto;
        margin-left: auto;
        margin-top: 19px;
    }

    .list_favoris-dialog, .list_favoris-content {
        height: 298px !important;
        width: 432px !important;
        border-radius: 6px;
        background-color: #FFFFFF;
        box-shadow: 0 2px 6px 0 rgba(0,0,0,0.35);
    }

    .modalCentered {
        top: 50% !important;
        transform: translateY(-50%) !important
    }

    .main-favori-box {
        /* height: 100px; */
        width: 302px;
        margin-left: auto;
        margin-right: auto;
        margin-top: 25px;
        /* background-color: #4A4A4A; */
    }

    .fav-checkbox {
        height: 18px;
        width: 18px;
        border-radius: 4px;
        background-color: #1A7EF5;
    }

    .fav-checkbox:active{
        background-color: #1A7EF5;
    }

    .fav-checkbox-label {
        margin-right: 10px;
    }

    .fav-checkbox-span {
        position: relative;
        top: -3px;
        height: 19px;
        width: 33px;
        color: #4A4A4A;
        font-family: Roboto;
        font-size: 16px;
        font-weight: 500;
        letter-spacing: -0.39px;
        line-height: 19px;
    }

    .favori-counter {
        height: 14px;
        width: 15px;
        color: #9B9B9B;
        font-family: Roboto;
        font-size: 12px;
        font-weight: 500;
        letter-spacing: -0.29px;
        line-height: 14px;
    }

    .favoris-categori-section {
        height: 50px;
        /* background-color: #9B9B9B; */
    }

</style>

<style>

    .input-favori {
        box-sizing: border-box;
        height: 41px;
        width: 194px;
        border: 1px solid #9B9B9B;
        border-radius: 6px;
        background-color: #F8F8F8;
        padding-left: 15px
    }

    .add-favori-btn {
        box-sizing: border-box;
        height: 41px;
        width: 67px;
        border: 1px solid #1A7EF5;
        border-radius: 6px;
        background-color: #FFFFFF;
    }

</style>

<?php
use App\Models\CategorieFavoris;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

// $c = DB::table('categorie_favoris')
//     ->select('*')
//     ->where('id_user', Auth::user()->id)->get();

?>

<div class="modal" id="listFavoriFormModal" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true" style="z-index: 20000">
    <div class="modal-dialog   list_favoris-dialog modalCentered" >
        <div class="modal-content list_favoris-content" style="background-color: #FFFFFF;box-shadow: 0 5px 15px 0 rgba(0,0,0,0.35);">
            <div class="modal-body px-0" style="padding-top: 25px;">
                <div class="text-confirmer-la-suppres-client" style="position: relative; margin-left: auto; margin-right: auto;"><span>Mes listes</span></div>
                <div  class="entete-modal-delete-client"></div>

                <div class="main-favori-box">
                    <div class="d-flex favoris-categori-section" id="favoris-categori-section" style="display: flex; flex-wrap: wrap;">
                        <label for="list-envi" style="" class="fav-checkbox-label">
                            <input type="checkbox" class="fav-checkbox" name="fav-checkbox" checked/>
                            <span class="fav-checkbox-span">Ma liste d'envie</span>
                            <span class="favori-counter">(0)</span>
                        </label>

                        @if(\Illuminate\Support\Facades\Auth::check())

                        @endif

                    </div>

                    <div class="d-flex" style="margin-top:40px" >
                        <div class="favori-list-input" style="margin-right: 16px">
                            <input type="text" class="input-favori" placeholder="Nouvelle liste" id="categorie-favoris">
                        </div>
                        <div class="favori-list-button">
                            <button class="add-favori-btn" onclick="AjoutCategorieFavorie()">Créer</button>
                        </div>
                    </div>
                    <div class="d-flex" style="margin-top: 15px; display: flex; align-items: center; justify-content:center">
                        <button class="favori-btn-connection" onclick="storeInFavoris()">Ajouter à la liste</button>
                    </div>
                </div>


                {{-- <div class="main-social-media" style="position: relative; margin-left: auto; margin-right: auto; margin-top:55px">

                </div> --}}
            </div>
        </div>
    </div>
</div>

<script>
let id_cat_favori;
function getCheckBoxValues(id){
        $('[name="fav-checkbox"]').each( function(key, value){
            $(value).prop('checked', false);
        });

        $('#favori-checkbox'+id).prop('checked', true)
        id_cat_favori = id

    }

    function AjoutCategorieFavorie() {
        console.log('Je suis bien là')
        $('[name="fav-checkbox"]').each( function(key, value){
            $(value).prop('checked', false);
        });


        $('#favoris-categori-section input:checked').each(function() {
            $(this).prop('checked', false)
        });


        let cat_fav = $('#categorie-favoris').val()
        let data = {
            libelle: cat_fav
        }
        $.ajax({
            method: 'POST',
            url: '/ajout_categorie_favorie',
            data: data,
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            success: function(response) {

                let new_fav_categorie = ` <label for="list-envi" style="" class="fav-checkbox-label">
                                            <input onclick="getCheckBoxValues(${response.id})" type="checkbox" name="fav-checkbox" class="fav-checkbox" checked/>
                                            <span class="fav-checkbox-span">${response.libelle}</span>
                                            <span class="favori-counter">(0)</span>
                                        </label>`

                $('#favoris-categori-section').append(new_fav_categorie)

            }
        })
        console.log('Add Cat')
    }


    // function storeInFavoris() {

    //     let favori = {
    //         favori_id: id_produit.value,
    //         id_produit: id_produit.value,
    //         id_categori_favorie: id_cat_favori
    //     }

    //     $.ajax({
    //         type: 'GET',
    //         url: '/panier/favori2/',
    //         data: favori,
    //         cache: false,
    //         success: function(result) {
    //             $('#listFavoriFormModal').modal('hide')
    //             if (result[0].statut == 1) {
    //                     $('#nbr_favorie').text(result[0]['0'])
    //                     $('#ajouter_favori').attr('src',"{{asset('assets/recap_produit/icons/Favoris_Selected.svg')}}")
    //                 }
    //                 if (result[0].statut == 2) {
    //                     $('#nbr_favorie').text(result[0]['0'])
    //                     if ($('#ajouter_favori').attr('src') == "{{asset('assets/recap_produit/icons/Favoris_Selected.svg')}}") {
    //                     $('#ajouter_favori').attr('src',"{{asset('assets/recap_produit/icons/Favoris_no.svg')}}")
    //                     } else {
    //                         $('#ajouter_favori').attr('src',"{{asset('assets/recap_produit/icons/Favoris_Selected.svg')}}")
    //                     }
    //                 }
    //         },

    //         error: function(error) {
    //             console.log('Pas bon')
    //         }

    //     });
    // }

</script>
