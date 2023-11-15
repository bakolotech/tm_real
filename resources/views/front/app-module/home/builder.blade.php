<?php

    $univers1 = \App\Models\Univer::possibles([1]);
    $univers2 = \App\Models\Univer::possibles([2]);

?>
<div class="page-contenu">
    <section>
        <div class="slide">

            <div class="item2">
                <img class="banner" src="{{ asset('assets/images/pub_banner.jpg') }}" alt="">
            </div>
            <div class="item2">
                <img class="banner" src="{{ asset('assets/images/pub_banner_2.jpg') }}" alt="">
            </div>
            <div class="item2">
                <img class="banner" src="{{ asset('assets/images/pub_banner.jpg') }}" alt="">
            </div>


            <div class="item2">
                <img class="banner" src="{{ asset('assets/images/pub_banner.jpg') }}" alt="">
            </div>
            <div class="item2">
                <img class="banner" src="{{ asset('assets/images/pub_banner_2.jpg') }}" alt="">
            </div>
            <div class="item2">
                <img class="banner" src="{{ asset('assets/images/pub_banner.jpg') }}" alt="">
            </div>
        </div>
        <div class="d-flex justify-content-center">
            <a onclick="prev()" class="cercle"><span></span></a>
            <a onclick="next()" class="cercle"><span></span></a>
            <a onclick="next()" class="cercle"><span></span></a>
        </div>
    </section>
    <br><br>
    <section>
        <div class="container input-group col-md-6 mb-3">
            <span class="input-group-text" id="icon_recherche" style="font-size: 15px; color: rgb(25, 25, 112); border-width: 1px 0px 1px 1px; border-top-style: solid; border-bottom-style: solid; border-left-style: solid; border-top-color: rgb(155, 155, 155); border-bottom-color: rgb(155, 155, 155); border-left-color: rgb(155, 155, 155); border-image: initial; height: 34px; background: rgb(255, 255, 255); border-right-style: initial; border-right-color: initial; padding-right: 0px; padding-left: 9px;"><img style="height: 18px;" src="{{ asset('assets/images/Recherche.svg') }}"></span>
            <input autocomplete="on" onclick="focus_champ()" style="font-size: 15px; color: rgb(25, 25, 112); border-width: 1px 0px; border-top-style: solid; border-bottom-style: solid; border-top-color: rgb(155, 155, 155); border-bottom-color: rgb(155, 155, 155); border-image: initial; height: 34px; border-right-style: initial; border-right-color: initial; border-left-style: initial; border-left-color: initial; background: rgb(255, 255, 255);" id="valeur_recherche" class="date-picker form-control" placeholder="Commencez la recherche">
            <span class="input-group-text" onclick="delete_texte()" style="display: none; font-size: 15px; color: rgb(25, 25, 112); border: 1px solid rgb(155, 155, 155); height: 34px; background: rgb(255, 255, 255); cursor: pointer;" id="btn_delete_text"><img style="height: 18px;" src="{{ asset('assets/images/enveloppe.svg') }}"></span>
            <span class="input-group-text" id="icon_galerie" style="font-size: 15px; color: rgb(25, 25, 112); border-width: 1px 1px 1px 0px; border-top-style: solid; border-right-style: solid; border-bottom-style: solid; border-top-color: rgb(155, 155, 155); border-right-color: rgb(155, 155, 155); border-bottom-color: rgb(155, 155, 155); border-image: initial; height: 34px; background: rgb(255, 255, 255); border-left-style: initial; border-left-color: initial;"><img src="{{ asset('assets/images/enveloppe.svg') }}"></span>
        </div>
    </section>

    <div>
        <div class="sliderm">
            @foreach($univers1 as $univer)
                <div class="mask" onclick="document.getElementById('univer-{{ $univer->id }}').click()">
                    <a href="{{ route('univers.show', $univer->id) }}" class="d-none" id="univer-{{ $univer->id }}"></a>
                    <div>
                        <img class="miniature" src="{{ $univer->getMiniLink() }}" alt="">
                    </div>
                    <div class="text_cat">
                        <p  style="color: #4A4A4A">{{ $univer->getLibelle() }}</p>
                    </div>
                </div>
            @endforeach
            <div class="mask">
                <div>
                    <img class="miniature" src="{{ asset('assets/images/Miniature_boutique_vide_par_defaut.jpg') }}" alt="">
                </div>
                <div class="text_cat">
                    <p  style="color: #4A4A4A">UNIVERS VIDE</p>
                </div>
            </div>
            <div class="mask">
                <div>
                    <img class="miniature" src="{{ asset('assets/images/Miniature_boutique_vide_par_defaut.jpg') }}" alt="">
                </div>
                <div class="text_cat">
                    <p  style="color: #4A4A4A">UNIVERS VIDE</p>
                </div>
            </div>
            <div class="mask">
                <div>
                    <img class="miniature" src="{{ asset('assets/images/Miniature_boutique_vide_par_defaut.jpg') }}" alt="">
                </div>
                <div class="text_cat">
                    <p  style="color: #4A4A4A">UNIVERS VIDE</p>
                </div>
            </div>
        </div>
    </div>

    <div class="sliderm">
<div class="mask">
    <div>
        <img class="miniature" src="{{ asset('assets/images/Miniature_boutique_vide_par_defaut.jpg') }}" alt="">
    </div>
    <div class="text_cat">
        <p  style="color: #4A4A4A">UNIVERS VIDE</p>
    </div>
</div>

<div class="mask">
    <div>
        <img class="miniature" src="{{ asset('assets/images/Miniature_boutique_vide_par_defaut.jpg') }}" alt="">
    </div>
    <div class="text_cat">
        <p  style="color: #4A4A4A">UNIVERS VIDE</p>
    </div>
</div>
<div class="mask">
    <div>
        <img class="miniature" src="{{ asset('assets/images/Miniature_boutique_vide_par_defaut.jpg') }}" alt="">
    </div>
    <div class="text_cat">
        <p  style="color: #4A4A4A">UNIVERS VIDE</p>
    </div>
</div>
<div class="mask">
    <div>
        <img class="miniature" src="{{ asset('assets/images/Miniature_boutique_vide_par_defaut.jpg') }}" alt="">
    </div>
    <div class="text_cat">
        <p  style="color: #4A4A4A">UNIVERS VIDE</p>
    </div>
</div>
<div class="mask">
    <div>
        <img class="miniature" src="{{ asset('assets/images/Miniature_boutique_vide_par_defaut.jpg') }}" alt="">
    </div>
    <div class="text_cat">
        <p  style="color: #4A4A4A">UNIVERS VIDE</p>
    </div>
</div>
<div class="mask">
    <div>
        <img class="miniature" src="{{ asset('assets/images/Miniature_boutique_vide_par_defaut.jpg') }}" alt="">
    </div>
    <div class="text_cat">
        <p  style="color: #4A4A4A">UNIVERS VIDE</p>
    </div>
</div>

</div>
</div>

