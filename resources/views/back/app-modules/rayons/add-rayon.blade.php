@extends('layouts.app')

@section('content')
    <form action="{{ route('etagere.store') }}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="row">
            <div class="col-md-8 offset-md-2">
                <div class="card">
                    <div class="card-header">
                        <h3>Ajouter une étagère à un univers</h3>
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
                                    <input type="text" id="libelle" @if(old('libelle')) value="{{ old('libelle') }}" @endif name="libelle" placeholder="Ex: Univers beauté" class="form-control">
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
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="grande_etagere">Image de la grande étagère</label>
                                    <input type="file" id="grande_etagere" name="grande_etagere" accept="image/*" class="form-control">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="logo">Icone normale de l'étagère</label>
                                    <input type="file" accept="image/*" name="logo" id="logo" class="form-control">
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
                            <button class="btn btn-primary">Enrégistrer</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
@endsection
