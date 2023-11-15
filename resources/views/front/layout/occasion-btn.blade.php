<div class="group icon-accasion">
    <div class="occasion-btn d-flex justify-content-between" onclick="document.getElementById('set-loader-modal').click()">
        <div class="occasion-spinner">
            <div id="occasion-spinner" class="spinner-grow text-muted d-none" style="width: 11px; height: 11px; color: #191970 !important;"></div>
            <img id="occasion-icon" src="{{ asset('assets/images/occasion-icon.svg')  }}" alt="" style="margin-top: 0 !important;">
        </div>
        <div class="" style="margin-top: 0; margin-left: 4px;">
            <span class="main-header-occasion-text">OCCASION</span>
        </div>
    </div>

    <a href="javascript:;"
       data-toggle="modal"
       data-target="#modal-loader_hide"
       id="set-loader-modal"
       class="d-none"
       data-key="{{ csrf_token() }}"
       data-url="{{url('/produit-occasion_hide')}}"
       onclick="loadOccasion(this)"
       data-active="1"
    >
    </a>
</div>
