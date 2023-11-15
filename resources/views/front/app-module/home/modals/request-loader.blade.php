<div class="modal fade" id="modal-loader" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content loader-modal-primary">

            <button type="button" class="close-btn d-none close-loader-modal" data-dismiss="modal" aria-label="Close">
                <img src="{{ asset('assets/images/close-btn.svg') }}" alt="">
            </button>

            <div class="modal-body p-0 m-0">
                <div class="d-flex justify-content-center" style="margin: 52px 87px 35.09px 87px;">
                    <div class="loader-image" style="width: 255px; height: 46px">
                        <img src="{{asset('assets/images/logo.png.svg')}}" alt="" style="height: 100%; width: 100%">
                    </div>
                </div>
                <div class="d-flex justify-content-center">
                    <div class="loader-main-text">
                        Traitement de la requête <br>
                        Veuillez patienter…
                    </div>
                </div>

                <div class="d-flex justify-content-center">
                    <div class="loader-loader">
                        <img src="{{ asset('assets/images/loader.gif') }}" alt="" style="height: 100%; width: 100%">
                    </div>
                </div>

                <div class="d-flex justify-content-center">
                    <div class="loader-footer">
                        <p>Veuillez ne pas actualiser votre navigateur.</p>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
