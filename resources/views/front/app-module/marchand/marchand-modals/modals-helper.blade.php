<div class="modal fade" id="corbeilleDeleteModal" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog  modal-dialog-centered" style="max-width: 432px !important; max-height: 213px !important; border-radius: 6px;">
        <div class="modal-content" style="width: 100% !important; height: 100% !important;background-color: #FFFFFF;box-shadow: 0 5px 15px 0 rgba(0,0,0,0.35);">

            <div class="modal-body px-0" style="height: 213px;padding-top: 25px;">
            <div class="text-confirmer-la-suppres"><span>Confirmer la suppression</span></div>
            <div  class="entete-modal-delete"></div>
            <div class="etes-vous-sur-de-vou">
                <input type="hidden" id="corbeilleHiddenId">
                <span>Êtes-vous sûr de vouloir supprimer cet article ?</span>
            </div>
            <div class="d-flex">
                <div class="non-confirm-delete-carnet ">
                    <button class="button-non" onclick="closeProduitSupp()">NON</button>
                </div>
                <div class="oui-confirm-delete-carnet ">
                    <button type="button"  id="formDeleteCarnet_submit-btnV" class="button-oui" onclick="deleteProductMarchandOK()">OUI</button>
                </div>

            </div>
            </div>
        </div>
    </div>
</div>

    {{-- supprimer tous les articles  --}}
    <div class="modal fade" id="corbeilleVideModal" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog  modal-dialog-centered" style="max-width: 432px !important; max-height: 213px !important; border-radius: 6px;">
            <div class="modal-content" style="width: 100% !important; height: 100% !important;background-color: #FFFFFF;box-shadow: 0 5px 15px 0 rgba(0,0,0,0.35);">

                <div class="modal-body px-0" style="height: 213px;padding-top: 25px;">
                    <div class="text-confirmer-la-suppres"><span>Confirmer la suppression</span></div>
                    <div  class="entete-modal-delete"></div>
                    <div class="etes-vous-sur-de-vou">
                        <input type="hidden" id="corbeilleHiddenId">
                        <span>Êtes-vous sûr de vouloir vider définitivement votre corbeille ?</span>
                    </div>
                    <div class="d-flex">
                        <div class="non-confirm-delete-carnet ">
                            <button class="button-non">NON</button>
                        </div>
                        <div class="oui-confirm-delete-carnet ">
                            <button type="button"  id="formDeleteCarnet_submit-btn" class="button-oui" onclick="viderProductMarchandOK()">OUI</button>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
