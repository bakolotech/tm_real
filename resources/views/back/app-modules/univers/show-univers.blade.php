<?php
/*
@extends('front.layout.main-layout')

@section('css-debut')
@endsection



@section('css-fin')
    <style>
        .bloc-recherche{
            margin-top: 20px;
            width:100%
        }
        .select-recherche{
            box-sizing: border-box;
            height: 33px;
            width: 204px;
            border: 1px solid #979797;
            border-radius: 6px 0 0 6px;
            background-color: #F8F8F8;
        }

        .input-recherche{
            box-sizing: border-box;
            height: 33px;
            width: 445px;
            border: 1px solid #9B9B9B;
            border-left: none;
            border-right: none;
            border-radius: 0px;
            background-color: #FFFFFF;
        }

        .button-recherche{
            height: 33px;
            width: 32px;
            border-radius: 0 6px 6px 0;
            background-color: #1A7EF5;
            border: none;
        }

        .image-recherche{
            height: 17.33px;
            width: 16.69px;
        }

    </style>
    <link rel="stylesheet" href="{{ asset('css/rayon.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/slick/slick.css') }}">
@endsection


@section('navbar')
    <div class="my-navbar bg-white">
        <div class="my-navbar-content">
            <div class="menu-logo rayon-nav-icon"></div>
            <button class="my-slick-btn my-slick-btn-prev" data-to="0">
                <img src="{{ asset('assets/images/ic_chevron_right.svg') }}" alt="">
            </button>
            <div class="rayon-nav-slick">

                @foreach($univers as $unUniver)
                    <div class="d-flex rayon-nav-univers-dropdown">
                        <div class="rayon-nav-univer-icon"><img src="{{ $unUniver->getIconLink() }}" alt=""></div>
                        <div class="rayon-nav-univer-text">{{ str_replace('Univers', 'univers', $unUniver->getLibelle()) }}</div>
                        <div class="rayon-nav-univer-show">
                            <img class="rayon-nav-univer-show-1" src="{{ asset('assets/images/plus.svg') }}" alt="">
                            <img class="rayon-nav-univer-show-0 d-none" src="{{ asset('assets/images2/moins.png') }}" alt="">
                        </div>
                    </div>
                @endforeach
                @foreach($univers as $unUniver)
                    <div class="d-flex rayon-nav-univers-dropdown">
                        <div class="rayon-nav-univer-icon"><img src="{{ $unUniver->getIconLink() }}" alt=""></div>
                        <div class="rayon-nav-univer-text">{{ str_replace('Univers', 'univers', $unUniver->getLibelle()) }}</div>
                        <div class="rayon-nav-univer-show">
                            <img class="rayon-nav-univer-show-1" src="{{ asset('assets/images/plus.svg') }}" alt="">
                            <img class="rayon-nav-univer-show-0 d-none" src="{{ asset('assets/images2/moins.png') }}" alt="">
                        </div>
                    </div>
                @endforeach
                @foreach($univers as $unUniver)
                    <div class="d-flex rayon-nav-univers-dropdown">
                        <div class="rayon-nav-univer-icon"><img src="{{ $unUniver->getIconLink() }}" alt=""></div>
                        <div class="rayon-nav-univer-text">{{ str_replace('Univers', 'univers', $unUniver->getLibelle()) }}</div>
                        <div class="rayon-nav-univer-show">
                            <img class="rayon-nav-univer-show-1" src="{{ asset('assets/images/plus.svg') }}" alt="">
                            <img class="rayon-nav-univer-show-0 d-none" src="{{ asset('assets/images2/moins.png') }}" alt="">
                        </div>
                    </div>
                @endforeach
                @foreach($univers as $unUniver)
                    <div class="d-flex rayon-nav-univers-dropdown">
                        <div class="rayon-nav-univer-icon"><img src="{{ $unUniver->getIconLink() }}" alt=""></div>
                        <div class="rayon-nav-univer-text">{{ str_replace('Univers', 'univers', $unUniver->getLibelle()) }}</div>
                        <div class="rayon-nav-univer-show">
                            <img class="rayon-nav-univer-show-1" src="{{ asset('assets/images/plus.svg') }}" alt="">
                            <img class="rayon-nav-univer-show-0 d-none" src="{{ asset('assets/images2/moins.png') }}" alt="">
                        </div>
                    </div>
                @endforeach
                @foreach($univers as $unUniver)
                    <div class="d-flex rayon-nav-univers-dropdown">
                        <div class="rayon-nav-univer-icon"><img src="{{ $unUniver->getIconLink() }}" alt=""></div>
                        <div class="rayon-nav-univer-text">{{ str_replace('Univers', 'univers', $unUniver->getLibelle()) }}</div>
                        <div class="rayon-nav-univer-show">
                            <img class="rayon-nav-univer-show-1" src="{{ asset('assets/images/plus.svg') }}" alt="">
                            <img class="rayon-nav-univer-show-0 d-none" src="{{ asset('assets/images2/moins.png') }}" alt="">
                        </div>
                    </div>
                @endforeach
            </div>
            <button class="my-slick-btn my-slick-btn-next" data-to="1">
                <img src="{{ asset('assets/images/ic_chevron_right.svg') }}" alt="">
            </button>

            <div class="tirer-logo rayon-nav-icon"></div>
        </div>
    </div>
@endsection

@section('search-bar')
    <div class="form-group bloc-recherche" >
        <div class="d-flex ">
            <select name="" class="custom-select select-recherche"  id="">
                <option value="">Fruits & Légumes</option>
            </select>
            <input type="text" class="form-control input-recherche"  name="" id="">
            <button class="button-recherche">
                <img class="image-recherche" src="{{ asset('assets/images/recherche1.svg') }}" alt="">
            </button>
        </div>
    </div>
@endsection

@section('contenu')
    <div class="rayon-main-div">
        <div class="d-none"></div>
        <div class="rayon-btn-direction prev-div-btn my-slick-btn-2" data-to="0">
            <button class="btn-left btn-direction">
                <img class="img-direction-btn" src="{{ asset('assets/images2/prec.svg') }}" alt="">
            </button>
        </div>
        <div class="rayon d-flex justify-content-around">
            @foreach($univer->rayons as $rayon)
                <div class="une-etagere">
                    <a class="petite-etagere" href="{{ url('rayon/'. $rayon->id .'/'. $rayon->slug) }}">
                        <img class="etagere-img" src="{{ $rayon->getPEtagereLink() }}" alt="">
                    </a>
                </div>
            @endforeach
        </div>

        <div class="rayon-btn-direction next-div-btn my-slick-btn-2" data-to="1">
            <button class="btn-direction btn-right">
                <img class="img-direction-btn" src="{{ asset('assets/images2/Next.svg') }}" alt="">
            </button>
        </div>
    </div>

@endsection


@section('js-debut')

@endsection


@section('js-fin')
    <script src="{{ asset('assets/slick/slick.min.js') }}"></script>
    <script>
        jQuery(document).ready(function () {
            $('.rayon-nav-slick').slick({
                slidesToShow: 5,
                slidesToScroll: 1,
                autoplay: false,
                adaptiveHeight: false,
                arrows: true,
                responsive: [
                    {
                        breakpoint: 980, // tablet breakpoint
                        settings: {
                            slidesToShow: 7,
                            slidesToScroll: 1
                        }
                    },
                    {
                        breakpoint: 480, // mobile breakpoint
                        settings: {
                            slidesToShow: 2,
                            slidesToScroll: 1
                        }
                    }
                ]
            })
            $('.rayon').slick({
                slidesToShow: 5,
                slidesToScroll: 1,
                autoplay: false,
                adaptiveHeight: false,
                arrows: true,
                responsive: [
                    {
                        breakpoint: 980, // tablet breakpoint
                        settings: {
                            slidesToShow: 7,
                            slidesToScroll: 1
                        }
                    },
                    {
                        breakpoint: 480, // mobile breakpoint
                        settings: {
                            slidesToShow: 2,
                            slidesToScroll: 1
                        }
                    }
                ]
            })

        })
    </script>
@endsection
*/
