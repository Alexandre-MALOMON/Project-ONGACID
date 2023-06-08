@extends('partials.admin_layout')
@section('content')

<div class="wrapper">
    <form action="{{ route('cours.store')}}" method="post" enctype="multipart/form-data">
        @csrf
        <div id="input_form">
            <div id="survey_options">
                <div>
                    <div class="form-group">
                        <label for="prenom" class="text-gray-800">{{ GoogleTranslate::trans("Titre du cours", app()->getLocale()) }}</label>
                        <input type="text" class="form-control" name="title_cours" id="inputPassword4">
                        @error('title_cours')
                        <span class="text-danger">{{ GoogleTranslate::trans($message, app()->getLocale()) }}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="prenom" class="text-gray-800">{{ GoogleTranslate::trans("Phot illustrative du cours", app()->getLocale()) }}</label>
                        <input type="file" class="form-control" name="photo" id="inputPassword4">
                        @error('photo')
                        <span class="text-danger">{{ GoogleTranslate::trans($message, app()->getLocale()) }}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="prenom" class="text-gray-800">{{ GoogleTranslate::trans("Nombre d'heure", app()->getLocale()) }}</label>
                        <input type="number" class="form-control" name="heure" id="inputPassword4">
                        @error('heure')
                        <span class="text-danger">{{ GoogleTranslate::trans($message, app()->getLocale()) }}</span>
                        @enderror
                    </div>
                    <div class="form_group">
                        <label for="sexe" class="text-gray-800">{{ GoogleTranslate::trans('La catégorie du cours', app()->getLocale()) }}</label>
                        <select id="inputState" class="form-control" name="courCategory_id">
                            <option value=""> {{ GoogleTranslate::trans('Veuillez choisir une catégorie', app()->getLocale()) }}</option>
                            @foreach ($categoryCourses as $categorie)
                            <option value="{{$categorie->id}}"> {{ GoogleTranslate::trans($categorie->name, app()->getLocale()) }}</option>
                            @endforeach
                        </select>
                        @error('courCategory_id')
                        <span class="text-danger">{{ GoogleTranslate::trans($message, app()->getLocale()) }}</span>
                        @enderror
                    </div>
                    <div class="form_group">
                        <label for="type" class="text-gray-800">{{ GoogleTranslate::trans('Type de cours', app()->getLocale()) }}</label>
                        <select id="inputState" class="form-control" name="type">
                            <option value=""> {{ GoogleTranslate::trans('Veuillez choisir le type de cours', app()->getLocale()) }}</option>
                            <option value="1"> {{ GoogleTranslate::trans('Payant', app()->getLocale()) }}</option>
                            <option value="2"> {{ GoogleTranslate::trans('Gratuit', app()->getLocale()) }}</option>
                        </select>
                        @error('type')
                        <span class="text-danger">{{ GoogleTranslate::trans($message, app()->getLocale()) }}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="prenom" class="text-gray-800">{{ GoogleTranslate::trans("Prix du cours", app()->getLocale()) }}</label>
                        <input type="number" class="form-control" name="prix" id="inputPassword4">
                        @error('prix')
                        <span class="text-danger">{{ GoogleTranslate::trans($message, app()->getLocale()) }}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="prenom" class="text-gray-800">{{ GoogleTranslate::trans("Description du cours", app()->getLocale()) }}</label>
                        <textarea class="form-control" name="description_cours" id="summernote" cols="30" rows="10"></textarea>
                        @error('decription_cours')
                        <span class="text-danger">{{ GoogleTranslate::trans($message, app()->getLocale()) }}</span>
                        @enderror
                    </div>
                </div>
                <input id="input" type="text" name="title[]" class="form-control" size="100" placeholder="Titre de l'épisode" />
                <input id="input" type="file" name="video[]" class="form-control mb-2" size="50" placeholder="Email" />
                <textarea class="form-control mb-2" name="description[]" id="summer" cols="30" rows="10" placeholder="Description de l'épisode"></textarea>

            </div>
        </div>
        <div class="controls">
            <a href="#" class="btn btn-success" id="add_more_fields"><i class="fa fa-plus"></i>Ajouter</a>
            <a href="#" class="btn btn-danger" id="remove_fields"><i class="fa fa-minus"></i>Supprimer</a>

        </div>
        <button type="submit">Enrégistrer</button>
    </form>
</div>
@endsection
<style>
    @import url('https://fonts.googleapis.com/css2?family=Jost:wght@100;300;400;700&display=swap');

    body {
        background-color: #f0f5ff;
        font-family: 'Jost', sans-serif;
        color: #fff;
    }

    .wrapper {
        width: 600px;
        margin: 40px auto;
        padding: 10px;
        border-radius: 5px;
        background: white;
        box-shadow: 0px 10px 40px 0px rgba(47, 47, 47, .1);
    }

    input[type="text"],
    textarea {
        padding: 10px;
        margin: 10px auto;
        display: block;
        border-radius: 5px;
        border: 1px solid lightgrey;
        background: none;

        color: black;
    }

    input[type="text"]:focus {
        outline: none;
    }

    .controls {
        width: 294px;
        margin: 15px auto;
    }

    #remove_fields {
        float: right;
    }

    .controls a i.fa-minus {
        margin-right: 5px;
    }

    a {
        color: black;
        text-decoration: none;
    }

    h1 {
        text-align: center;
        font-size: 48px;
        color: #232c3d;
    }

    button {
        margin: 0 auto;
        display: block;
        border: 0;
        background: #3f51b5;
        padding: 10px;
        border-radius: 2px;
        color: white;
    }

    .list {
        color: red;
    }
</style>
