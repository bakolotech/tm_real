@extends('layouts.app')

@section('content')
    <form action="{{ route('famille.store') }}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="row">
            <div class="col-md-8 offset-md-2">
                <div class="card">
                    <div class="card-header">
                        <h3>Ajouter une famille</h3>
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
                                    <input type="text" id="libelle" @if(old('libelle')) value="{{ old('libelle') }}" @endif name="libelle" placeholder="Ex: famille boeuf" class="form-control">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="rayon">Dans quel rayon se trouve cette famille ?</label>
                                    <select class="custom-select" name="rayon_id" id="rayon_id">
                                        @foreach($rayons as $rayon)
                                            <option @if(old('rayons') && old('rayon') == $rayon->id) selected @endif value="{{ $rayon->id }}">
                                                {{ \App\Models\Rayon::text($rayon->libelle) }}
                                                ({{ html_entity_decode($rayon->univer->libelle) }})
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="col-12">
                                <div class="form-group">
                                    <label for="description">Description de la famille</label>
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
