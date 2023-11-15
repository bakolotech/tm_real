@extends('layouts.app')

@section('css-debut')
    <link rel="stylesheet" href="{{ asset('assets/multiple-select-1/filter_multi_select.css') }}">
@endsection

@section('content')
    <form action="{{ route('sous-categorie.store') }}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="row">
            <div class="col-md-8 offset-md-2">
                <div class="card">
                    <div class="card-header">
                        <h3>Ajouter une sous catégorie à une famille</h3>
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
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="libelle">Intitulé</label>
                                    <input type="text" id="libelle" @if(old('libelle')) value="{{ old('libelle') }}" @endif name="libelle" placeholder="Ex: Filet de boeuf" class="form-control">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="famille_id">Famille d'apparténance</label>
                                    <select class="custom-select" name="famille_id" id="famille_id">
                                        @foreach($familles as $famille)
                                            <option @if(old('familles') && old('familles') == $famille->id) selected @endif value="{{ $famille->id }}">{{ html_entity_decode($famille->libelle) }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="petite_etagere">Image de la sous catégorie</label>
                                    <input accept="image/*" type="file" id="image" name="image"  class="form-control">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="petite_etagere">Caractéristiques</label>
                                    <select multiple name="caracteristiques[]" id="animals" class="filter-multi-select">
                                        @foreach($caracteristiques as $caracteristique)
                                            <option value="{{ $caracteristique->id }}">{{ $caracteristique->text($caracteristique->libelle) }}</option>
                                        @endforeach
                                    </select>
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

@section('js-fin')
    <script src="{{ asset('assets/multiple-select-1/filter-multi-select-bundle.min.js') }}"></script>
    <script src="{{ asset('js/multipleSelectConfig.js') }}"></script>
@endsection
