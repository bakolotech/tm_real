@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                {{-- <img src="/uploads/avatars/{{ Auth::user()->text(Auth::user()->image) }}" style="width:150px; height:150px; float:left; border-radius:50%; margin-right:25px;"> --}}
                <h2>Photo de profil {{ Auth::user()->text(Auth::user()->prenom) }} {{ Auth::user()->text(Auth::user()->nom) }}</h2>
                <form enctype="multipart/form-data" action="/profile" method="POST">
                    <input type="file" name="avatar">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <input type="submit" class="pull-right btn btn-sm btn-primary">
                </form>
            </div>
        </div>
    </div>
@endsection
