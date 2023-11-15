@extends('front.layout.main-layout')

@section('css-debut')
    <link rel="stylesheet" href="{{asset('css/home.css')}}">
    <link rel="stylesheet" href="{{asset('css/demo.css')}}">
    <link rel="stylesheet" href="{{ asset('css/rayon.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/slick/slick.css') }}">
@endsection

@section('contenu')
    <div class="my-navbar bg-white d-flex">
        <img style="height: 42px;width: 42px; margin-top: 3px;" src="{{ asset('assets/images2/left-icon.png') }}" alt="">

        <div class="d-flex justify-content-between" style="height: 100%; margin-left: 5px;">
            <div style="width: 50px; height: 100%; border-radius: 50% 0 0 50%; background-color: #191970;">
                <img style="height: 100%;" src="{{ asset('assets/images/Boissons.svg') }}" alt="">
            </div>
            <div style="background-color: #191970; padding: 7px 4px;">
                <P style="line-height: 2.3em; color: white; font-weight: 600;">Fruits & Légumes</P>
            </div>
        </div>

        <div class="my-navbar-content">

        </div>
    </div>





@endsection


@section('js-fin')

    <script src="{{ asset('assets/slick/slick.min.js') }}"></script>

@endsection
