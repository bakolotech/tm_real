<div class="my-navbar bg-white padding-fluid" >

    <div class="my-navbar-content">

    <div class="menu-logo rayon-nav-icon mr-auto" ></div>
    <button class="my-slick-btn my-slide-btn-prev br-l" onclick="document.getElementById('rayon-nav-prev-btn').click()" >
        <svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" fill="#fff" class="bi bi-chevron-left" viewBox="0 0 16 16" style="position: relative; top: -1px">
            <path d="M11.854 1.146a.5.5 0 0 1 0 .708L5.707 8l6.147 6.146a.5.5 0 0 1 0 .708a.5.5 0 0 1-.708 0l-7-7a.5.5 0 0 1 0-.708l7-7a.5.5 0 0 1 .708 0z"/>
        </svg>
    </button>
    <div class="rayon-nav-slide owl-carousel">
    @foreach($univers as $unUniver)
        {{-- <div class="rayon-nav-univers-dropdown item" data-opened="0" onmouseenter="dropdownList(this)" data-univers="{{ $unUniver->id }}"> --}}
            <div class="rayon-nav-univers-dropdown item" onclick="show_univ_preview('{{$unUniver->id}}', '{{$unUniver->slug}}')" data-opened="0" onmouseenter="dropdownList(this)" data-univers="{{ $unUniver->id }}">
        <div class="rayon-nav-univers-content">
            <div class="text-block">
                <div class="rayon-nav-univer-icon">
                    <img class="owl-lazy logo-normal" data-src="{{ $unUniver->getIconLink() }}" alt="">
                    <img class="owl-lazy logo-hover" data-src="{{ $unUniver->getIconHoverLink() }}" alt="">
                </div>
                <div class="rayon-nav-univer-text">
                    <p>univers</p>
                    <p>{{ str_replace('Univers', '', $unUniver->getLibelle()) }}</p>
                </div>
            </div>
            <div class="rayon-nav-univers-dropdown-icon">
                <div class="rayon-nav-univer-show">
                    <img class="rayon-nav-plus owl-lazy" data-src="{{ asset('assets/images2/Plus.svg') }}" alt="">
                    <img class="rayon-nav-moins" src="{{ asset('assets/images2/Minus.svg') }}" alt="">
                </div>
            </div>
        </div>
        </div>
    @endforeach
</div>
    <button class="my-slick-btn my-slide-btn-next br-r" onclick="document.getElementById('rayon-nav-next-btn').click()">
        <svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" fill="#fff" class="bi bi-chevron-right" viewBox="0 0 16 16" style="position: relative; top: -1px">
            <path d="M4.146 1.146a.5.5 0 0 1 0 .708L9.293 8l-5.147 5.146a.5.5 0 1 1-.708-.708l5-5a.5.5 0 0 1 0-.708l-5-5a.5.5 0 0 1 .708-.708z"/>
        </svg>
    </button>

    <div class="tirer-logo rayon-nav-icon ml-auto" onclick="toggleShowElement('#rayon-filter-menu')"></div>
    </div>
</div>
