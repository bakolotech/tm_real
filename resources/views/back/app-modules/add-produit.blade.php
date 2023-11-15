@extends('layouts.app')

@section('content')
    <form action="{{ route('produit.store') }}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="row">
            <div class="col-md-8 offset-md-2">
                <div class="card">
                    <div class="card-header">
                        <h3>Ajouter un produit à une sous categorie</h3>
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
                            <div class="col-12">
                            <div class="form-group">
                                <label for="libelle">Nom du produit</label>
                                <input name="libelle" id="libelle" rows="5" class="form-control" @if(old('libelle')) value="{{ old('libelle') }}" @endif>
                            </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="prix">Quel est le prix</label>
                                    <input type="number" id="prix" @if(old('prix')) value="{{ old('prix') }}" @endif name="prix" placeholder="Saisir le prix de votre produit" class="form-control">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="sous_categorie">Dans quel famille se trouve ce produit ?</label>
                                    <select class="custom-select" name="sous_categorie" id="sous_categorie">
                                        @foreach($sousCategories as $sousCategorie)
                                            <option @if(old('sous_categorie') && old('sous_categorie') == $sousCategorie->id) selected @endif value="{{ $sousCategorie->id }}">{{ $sousCategorie->text($sousCategorie->libelle) }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="petite_etagere">Image principale</label>
                                    <input accept="image/*" type="file" id="image" name="image"  class="form-control">
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="petite_etagere">Autre 1</label>
                                    <input accept="image/*" type="file" id="image" name="images[]"  class="form-control">
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="petite_etagere">Autre 2</label>
                                    <input accept="image/*" type="file" id="image" name="images[]"  class="form-control">
                                </div>
                            </div>


                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="petite_etagere">Autre 3</label>
                                    <input accept="image/*" type="file" id="image" name="images[]"  class="form-control">
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="petite_etagere">Autre 4</label>
                                    <input accept="image/*" type="file" id="image" name="images[]"  class="form-control">
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="petite_etagere">Autre 5</label>
                                    <input accept="image/*" type="file" id="image" name="images[]"  class="form-control">
                                </div>
                            </div>

                            <div class="col-12">
                                <div class="form-group">
                                    <label for="description">Description du produit</label>
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
