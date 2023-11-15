<style>
    .localisation-button {
        height: 31px;
        width: 133.75px;
        border-radius: 6px;
        background-color: #1A7EF5;
        color: #FFFFFF;
        font-family: Roboto;
        font-size: 13px;
        font-weight: 500;
        letter-spacing: -0.31px;
        line-height: 16px;
        border: none;
        position: absolute;
        top: 242px;
        float: right;
        right: 5px;
}
</style>
<div class="modal fade" id="userProfilModal" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    {{-- <div class="modal" id="userProfilModal" tabindex="-1" role="dialog" > --}}
    <div class="modal-dialog modal-xl modal-dialog-centered" style="max-width: 1212px !important; max-height: 639px !important; border-radius: 6px;">
        <div class="modal-content" style="width: 1212px !important; height: 577px !important;background-color: #F8F8F8;">
            <button style="z-index: 1; margin-right: -5px" type="button" class="close-btn" data-dismiss="modal" aria-label="Close" onclick="closeUserProfilModal()">
                <img src="{{ asset('assets/images/close-btn.svg') }}" alt="">
            </button>

                <div class="modal-body px-0" style="height: 639px;">
                <div class="d-flex" >
                    <div  style="height: 574px; width: 320px; margin-top: 5px" >
                        <!-- debut information-user -->

                    @include('front.app-module.user-profil.modals.components.information-user')

                    <!-- fin information-user -->

                        <!-- debut menu profil left -->

                    @include('front.app-module.user-profil.modals.components.menu-profil-left')

                    <!-- fin menu profil left -->

                    </div>
                    <div  style="height: 577px !important ;width: 857px !important; margin-left: 30px; ">

                        @include('front.app-module.user-profil.modals.components.menu-courant-user')

                        <div id="size_pro" style="box-sizing: border-box; border: 1px solid rgb(216, 216, 216); border-radius: 6px; margin-top: 10px; margin-right: 5px;  position: relative; width: 857px; background-color: rgb(255, 255, 255); height: 523px;">
                            @include('front.app-module.user-profil.modals.components.generale.information-personnel')

                            @include('front.app-module.user-profil.modals.components.generale.mes-addresse')
                            @include('front.app-module.user-profil.modals.components.generale.mes-mode-payement')
                            @include('front.app-module.user-profil.modals.components.generale.upload-photo-profile')
                            @include('front.app-module.user-profil.modals.components.generale.messagerie_section')
                            @include('front.app-module.user-profil.modals.components.generale.mes-commandes')
                            @include('front.app-module.user-profil.modals.components.generale.suivre-commande')

                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


{{-- <script src="js/script.js"></script>
<script src="{{ asset('assets/jquery/dist/jquery.min.js') }}"></script> --}}


<script>
jQuery(document).ready(function () {

        $(document).on('click', '.close-btn', function (e) {
            e.preventDefault();
           $('#btn-succ-update').addClass('hide');
        })
})

</script>
