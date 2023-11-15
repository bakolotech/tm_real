<div class="modal fade" id="maquetteProduit" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content">
            <button type="button" class="close-btn" data-dismiss="modal" aria-label="Close">
                <img src="{{ asset('assets/images/close-btn.svg') }}" alt="">
            </button>
            <div class="modal-header p-0 justify-content-center">
                <p class="my-modal-header-text">Maquette des produit de la sous famille {{ $sousCategorie->text($sousCategorie->libelle) }}</p>
            </div>
            <div class="modal-body">

                <img  src="{{ $sousCategorie->getMaquetteLink() }}" style="width: 100%" alt="">

            </div>
        </div>
    </div>
</div>
