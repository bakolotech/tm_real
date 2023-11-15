@extends('layouts.app')

@section('content')

    <form action="{{ route('caracteristique.store') }}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="row">
            <div class="col-md-10 offset-md-1">
                <div class="card">
                    <div class="card-header align-items-center">
                        <p class="h3">Créer une caractéristique</p>
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
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="type_caracteristique">Type de la caractéristique</label>
                                    <select class="form-control" name="type_caracteristique" id="type_caracteristique" required>
                                        <option value="">Choisissez un élément ici</option>
                                        <option value="affichage">Affichage</option>
                                        <option value="parametre">Caractéristique de parametrage</option>
                                        <option value="vente">Caractéristique de vente</option>
                                    </select>
                                    @error('type_caracteristique')<span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>@enderror
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="demander_valeur1">Démander une valeur ?</label>
                                    <div class="d-flex align-items-center justify-content-start pl-4">
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="demander_valeur" id="demander_valeur1" value="1">
                                            <label class="form-check-label" for="demander_valeur1">
                                                Oui
                                            </label>
                                        </div>
                                        <div class="form-check ml-5">
                                            <input class="form-check-input" type="radio" name="demander_valeur" id="demander_valeur2" checked value="0">
                                            <label class="form-check-label" for="demander_valeur2">
                                                Non
                                            </label>
                                        </div>
                                    </div>
                                    @error('demander_valeur')<span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>@enderror
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="required_value1">La valeur à entrer est obligatoire ?</label>
                                    <div class="d-flex align-items-center justify-content-start pl-4">
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="required_value" id="required_value1" value="1">
                                            <label class="form-check-label" for="required_value1">
                                                Oui
                                            </label>
                                        </div>
                                        <div class="form-check ml-5">
                                            <input class="form-check-input" type="radio" name="required_value" id="required_value2" checked value="0">
                                            <label class="form-check-label" for="required_value2">
                                                Non
                                            </label>
                                        </div>
                                    </div>
                                    @error('required_value')<span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>@enderror
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="type_valeur">Type de valeur</label>
                                    <select type="text" name="type_valeur" class="form-control" id="type_valeur">
                                        <option value="">Sélectionner un élément</option>
                                        <option value="number">Un nombre (Ex: 6 ou 6.02)</option>
                                        <option value="text">Du texte</option>
                                        <option value="bool">Un booléen (oui ou non)</option>
                                        <option value="date">Une date (Ex: 17/08/1960)</option>
                                        <option value="time">Une heure</option>
                                    </select>
                                    @error('type_valeur')<span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>@enderror
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="icone">Icone</label>
                                    <input type="file" accept="image/*" id="icone" name="icon" class="form-control">
                                    @error('icone')<span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>@enderror
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="libelle">Intitulé</label>
                                    <input type="text" id="libelle" @if(old('libelle')) value="{{ old('libelle') }}" @endif name="libelle" placeholder="Ex: Livraison en 24h" class="form-control">
                                    @error('libelle')<span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>@enderror
                                </div>
                            </div>

                            <div class="col-12">
                                <div class="form-group">
                                    <label for="description">Description de la famille</label>
                                    <textarea name="description" id="description" rows="5" class="form-control">@if(old('description')) value="{{ old('description') }}" @endif</textarea>
                                    @error('description')<span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>@enderror
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
