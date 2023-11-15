<?php
    // dd($caracteristique);
?>

@extends('front.layout.main-layout')

{{-- <html>
    <head>
        <title>caracteristique</title> --}}

        <style>
            .caracteristique-section {
                width: 90%;
                height: 90%;
                min-height: 300px;
                background-color: #c2c1bd2b;
                position: relative;
                margin-left: auto;
                margin-right: auto;
                border-radius: 6px;
                display: flex;
                justify-content: center;
                column-gap: 20px;
            }

            .caracteristiques-main-section {
                width: 30%;
                height: 100%;
                border: 1px solid green;
                border-radius: 6px;
            }

            .valeurs-main-section {
                width: 30%;
                height: 100%;
                border: 1px solid green;
                border-radius: 6px;
            }

            .rayon-caracteristique-main-section {
                width: 30%;
                height: 100%;
                border: 1px solid green;
                border-radius: 6px;
            }

            .mon-contenu {
                display: none;
            }
        </style>
    </head>

    <body>
        <h1 style="text-align: center; font-size: 16px; margin-top: 10px">PRODUIT CARACTERISTIQUES</h1>

        <div class="caracteristique-section" >
            {{-- <div class="libelle-caracteristique"> --}}
                <style>

                    .caracteristique-input-section {
                        border-radius: 6px 6px 0px 0px;
                        background-color: #c2c1bd2b;
                        height: 32px;
                    }

                    .caracteristique-search-input {
                        width: 100%;
                        height: 32px;
                        font-family: 'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana, sans-serif;
                        font-size: 14px;
                        border-top: none;
                        border-left: none;
                        border-right: none;
                        border-radius: 6px 6px 0px 0px;
                        padding-left: 10px;
                        border-bottom: 1px solid;
                    }

                    .caracteristique-search-input:focus {
                        outline: none;
                    }

                    .caracteristique-result-search {
                        width: 100%;
                        height: calc(100% - 32px);
                        width: 100%;
                        height: calc(100% - 32px);
                        overflow-y: scroll;
                        overflow-x: hidden;
                        padding-bottom: 20px;
                    }

                    .rayon_caracteristique_select {
                        width: 93%;
                        height: 32px;
                        border-radius: 6px;
                        padding-left: 10px;
                    }

                    .select-section {
                        width: 100%;
                        position: relative;
                        margin-left: 3%;
                        margin-right: auto;
                        margin-top: 15px;
                    }

                    .liste-caracteristique {
                        list-style: none;
                    }

                    .save-btn {
                        position: absolute;
                        bottom: 0px;
                        margin-left: -1228px;
                        border: 1px solid goldenrod;
                        border-radius: 6px;
                        margin-bottom: 12px;
                    }

                    .add-caracteristique-section {
                        width: 30%;
                        height: 45px;
                        background-color: rgb(2, 69, 105);
                        /* background-color: rgba(239, 242, 67, 0.224); */
                        position: absolute;
                        bottom: 0px;
                        border-radius: 0px 0px 6px 6px;

                        display: flex;
                        align-items: center;
                        justify-content: center;
                        padding-top: 1.3%;
                    }

                </style>
                <div class="rayon-caracteristique-main-section">
                    {{-- <div class="caracteristique-input-section" style="display: flex; padding-top: 5px" >

                        <div class="rayon-section">
                            <label for="rayon">
                                <input type="radio" value="Rayons" name="caracterique"> Rayons
                            </label>
                        </div>

                        <div class="rayon-section">
                            <label for="rayon">
                                <input type="radio" value="Rayons" name="caracterique"> Catégorie
                            </label>
                        </div>

                    </div> --}}

                    <div class="caracteristique-result-search" style="display: flex; flex-direction: column; ">

                        {{-- <div class="select-section">
                            <label for=""><b style="font-weight: 500" >Choisissez le rayon:</b></label>
                            <select name="rayon_caracteristique_select" id="rayon_caracteristique_1" class="rayon_caracteristique_select">
                                @foreach($rayons as $r)
                                    <option value="{{$r->id}}">{{$r->libelle}}</option>
                                @endforeach
                            </select>
                        </div> --}}

                        <div class="select-section">
                            <label for=""><b style="font-weight: 500">Choisissez la catégorie:</b></label>
                            <select name="rayon_caracteristique_select" id="rayon_caracteristique_2" class="rayon_caracteristique_select">
                                @foreach($categories as $c)
                                    <option value="{{$c->id}}">{{$c->libelle}}</option>
                                @endforeach
                            </select>
                        </div>

                    </div>
                </div>

                <div class="caracteristiques-main-section" >
                    <h6 style="text-align: center; margin-top: 10px">CHOIX DE LA CARACTERISTIQUE</h6>
                    <div class="caracteristique-input-section">
                        <input type="text" class="caracteristique-search-input" placeholder="Recherchez une caractéristique ..." id="caracteristique-search-input">
                    </div>

                    <div class="caracteristique-result-search">
                        <ul>

                            @foreach ($caracteristique as $car)
                                <li class="liste-caracteristique">
                                    <input type="checkbox" name="caracteristique_bis[]" value="{{ $car->id }}" id="carbis_{{ $car->id }}">
                                    <label for="carbis_{{ $car->id }}">{{ $car->libelle }}</label>
                                </li>
                            @endforeach

                        </ul>

                        <div class="add-caracteristique-section">
                            <form action="#">
                                <input type="text" placeholder="Ajouter une caracteristique" id="caracteristique_input">
                                <button type="submit" onclick="addCaracteristique(event)">Ajouter</button>
                            </form>
                        </div>
                    </div>

                </div>

                <div class="valeurs-main-section">
                    <div class="caracteristique-input-section">
                        <input type="text" class="caracteristique-search-input" placeholder="Recherchez une valeur ...">
                    </div>

                    <div class="caracteristique-result-search">

                        <ul id="caracteristique-value-element">
                            @foreach ($valeur_caracteristique as $car)
                                <li class="liste-caracteristique">
                                    <input type="checkbox" name="caracteristique[]" value="{{ $car->id }}" id="car_{{ $car->id }}">
                                    <label for="car_{{ $car->id }}">{{ $car->libelle }}</label>
                                </li>
                            @endforeach
                        </ul>

                        <div class="add-caracteristique-section">
                            <form action="#">
                                <input type="text" placeholder="Ajouter une valeur" id="valeur_caracteristique_input">
                                <button type="submit" onclick="addValeurCaracteristique(event)">Ajouter</button>
                            </form>
                        </div>

                    </div>
                </div>

            {{-- </div> --}}
            <button class="save-btn" onclick="saveCaracteristique()">Enregistrer</button>
        </div>



    <script>
        document.getElementById('caracteristique-search-input').addEventListener('keyup', function() {
            $.ajax({
                url: '/get_caracteristique_data',
                type: 'POST',
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                success: function(response) {
                    console.log('Here is response data', response)
                }
            })
            console.log('Caracteristique key')
        })

        function saveCaracteristique() {

            var caracteristique_name = $('input[name="caracteristique_bis[]"]:checked').val();
            // console.log('Helo world !', checkboxValue)
            var caracteristique_values = [];
            $("#caracteristique-value-element input[type='checkbox']").each(function() {
            // Check if the checkbox is checked
            if ($(this).is(":checked")) {
                caracteristique_values.push($(this).val());
            }

            });


            var rayon = $('#rayon_caracteristique_1').find(':selected').val()
            var categorie = $('#rayon_caracteristique_2').find(':selected').val()

            var data_caracteristique = {
                caracteristique_name: caracteristique_name,
                caracteristique_values: caracteristique_values,
                categorie: categorie
            }

            $.ajax({
                url: '/get_caracteristique_data',
                type: 'POST',
                data: data_caracteristique,
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                success: function(response) {
                    console.log('Here is response data', response)
                }
            })

            // console.log('Votre objet est bien => ', data_caracteristique)


        }

        function addCaracteristique(event) {
            event.preventDefault()
            var caracteristique_value = $('#caracteristique_input').val();
            console.log("Add section", caracteristique_value)
            $.ajax({
                type: 'POST',
                url: '/ajout_caracteristique',
                data: {caracteristique_value: caracteristique_value },
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                success: function(response) {
                    console.log('Retour post => ', response)
                }
            })
        }

        function addValeurCaracteristique(event) {

            event.preventDefault()

            var valeur = $('#valeur_caracteristique_input').val();
            $.ajax({
                type: 'POST',
                url: '/add_valeur_caracteristique',
                data: {valeur: valeur},
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                success: function(response) {
                    console.log('La valeur caracteristique', response)
                }
            })

        }

    </script>

    {{-- </body>

</html> --}}
