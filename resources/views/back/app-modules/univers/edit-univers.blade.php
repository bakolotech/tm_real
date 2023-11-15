@extends('layouts.app')

@section('content')
    <form action="{{ route('univers.update', $univers->id) }}" method="post" enctype="multipart/form-data">
        @csrf
        @method('put')
        <div class="row">
            <div class="col-md-8 offset-md-2">
                <div class="card">
                    <div class="card-header">
                        <h3>Ajouter un univers</h3>
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
                                    <input type="text" id="libelle" name="libelle" placeholder="Ex: Univers beauté" class="form-control" value="{{ $univers->text($univers->libelle) }}">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="ranger">Place de l'univers sur l'accueil</label>
                                    <select class="custom-select" name="ranger" id="ranger">
                                        <option value="1" @if($univers->ranger == 1) selected @endif>Sur la ligne du haut</option>
                                        <option value="2" @if($univers->ranger == 2) selected @endif>Sur la ligne du bas</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="mini">Image de la miniature</label>
                                    <input accept="image/*" type="file" id="mini" name="mini"  class="form-control">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="background">Image de d'arrière plan des étagères</label>
                                    <input type="file" id="background" name="background" accept="image/*" class="form-control">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="logo">Icone normale de l'univers</label>
                                    <input type="file" accept="image/*" name="logo" id="logo" class="form-control">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="logo">Icone de l'univers au click</label>
                                    <input type="file" accept="image/*" name="logo_hover" id="logo_hover" class="form-control">
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group">
                                    <label for="description">Description de l'univers</label>
                                    <textarea name="description" id="description" rows="5" class="form-control">{{ $univers->text($univers->description) }}</textarea>
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
