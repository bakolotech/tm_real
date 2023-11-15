@extends('layouts.app')

@section('content')
    <form action="{{ route('rayon.update', $rayon->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('put')
        <div class="row">
            <div class="col-md-8 offset-md-2">
                <div class="card">
                    <div class="card-header">
                        <h3>{{ $page['title'] }}</h3>
                        @if(\Illuminate\Support\Facades\Session::has('success-message'))
                            <div class="alert alert-success">
                                <h5>{{ \Illuminate\Support\Facades\Session::get('success-message') }}</h5>
                            </div>
                        @endif
                        @if(\Illuminate\Support\Facades\Session::has('error-message'))
                            <div class="alert alert-danger">
                                <h5>{{ \Illuminate\Support\Facades\Session::get('error-message') }}</h5>
                            </div>
                        @endif
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="libelle">Intitulé</label>
                                    <input type="text" id="libelle"  value="{{ $rayon->text($rayon->libelle) }}" name="libelle" placeholder="Ex: Univers beauté" class="form-control">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="univers">Dans quel univers se trouve cette étagère ?</label>
                                    <select class="custom-select" name="univers" id="univers">
                                        @foreach($univers as $univer)
                                            <option @if(old('univers') && old('univers') == $univer->id) selected @endif value="{{ $univer->id }}">{{ html_entity_decode($univer->text($univer->libelle)) }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">

                                    <label for="petite_etagere">Image de la petite étagère</label>
                                    <input accept="image/*" type="file" id="petite_etagere" name="petite_etagere"  class="form-control">
                                    <a href="javascript:;" data-toggle="modal" data-target="#petitEtagere" style="margin-top: 2%" class="form-control btn btn-primary">image de la petite étagère</a>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="grande_etagere">Image de la grande étagère</label>
                                    <input type="file" id="grande_etagere" name="grande_etagere" accept="image/*" class="form-control">
                                    <a href="javascript:;" data-toggle="modal" data-target="#grandeEtagere" style="margin-top: 2%" class="form-control btn btn-primary">image de la grande étagère</a>

                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="logo">Icone de l'étagère</label>
                                    <input type="file" accept="image/*" name="logo" id="logo" class="form-control">
                                    <a href="javascript:;" data-toggle="modal" data-target="#IconeEtagere" style="margin-top: 2%" class="form-control btn btn-primary">icone de l'étagère</a>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group">
                                    <label for="description">Description de l'étagère</label>
                                    <textarea name="description" id="description" rows="5" class="form-control">@if(old('description')) value="{{ old('description') }}" @endif</textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer">
                        <div class="d-flex justify-content-end">
                            <button type="submit" class="btn btn-primary">Enrégistrer</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>

    @yield('modal-debut')

        @include('front.app-module.home.modals.grande-etagere')
        @include('front.app-module.home.modals.petite-etagere')
        @include('front.app-module.home.modals.icone-etagere')

    @yield('modal-fin')
@endsection
