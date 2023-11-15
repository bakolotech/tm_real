<style>

    .btn-menu-element-paiement {
        height: 30px;
        width: 30px;
        background: #f8f8f8;
        display: flex;
        align-items: center;
        justify-content: center;
        position: absolute;
        color: #1A7EF5;
        border-radius: 25px;
        margin-top: 43px;
    }

    .btn-menu-element-2-icon-paiement {
        position: relative;
        left: -2px;
        top: 1px;
    }

    .btn-menu-element-2-text-paiement {
        position: relative;
        left: -6px;
    }

</style>

<div class="btn-menu-element-paiement" onclick="closeCartePaiement()">
    <div class="btn-menu-element-2-icon-paiement">

        <svg xmlns="http://www.w3.org/2000/svg" width="15" height="12" fill="#1A7EF5" class="bi bi-chevron-left" viewBox="0 0 16 16" style="position: relative; top: -1px">
            <path d="M11.854 1.146a.5.5 0 0 1 0 .708L5.707 8l6.147 6.146a.5.5 0 0 1 0 .708a.5.5 0 0 1-.708 0l-7-7a.5.5 0 0 1 0-.708l7-7a.5.5 0 0 1 .708 0z"></path>
        </svg>

    </div>
    {{-- <div class="btn-menu-element-2-text-paiement">
        <span class="span-return" style="font-size: 11px">RETOUR</span>
    </div> --}}
</div>
