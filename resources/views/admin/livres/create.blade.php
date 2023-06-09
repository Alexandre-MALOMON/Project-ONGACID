@extends('partials.admin_layout')
@section('content')
<div style='padding-left: 20px;'>
    <h2>{{ GoogleTranslate::trans("Enrégistrement de livre", app()->getLocale()) }}</h2>
</div>
@if (Session::has('success'))
<div class="alert alert-success">
    {{ GoogleTranslate::trans(Session::get('success'), app()->getLocale()) }}
</div>
@endif


<div style='padding-right:20px;padding-left: 20px;margin-bottom: 20px;'>
    <form method="post" action="{{ route('book.store') }}" enctype="multipart/form-data">
        @csrf
        <div class="form-row">

            <div class="form-group col-md-6">
                <label for="sexe" class="text-gray-800">{{ GoogleTranslate::trans("Catégorie", app()->getLocale()) }}</label>
                <select id="inputState" class="form-control" name="document_id">
                    <option value="">{{ GoogleTranslate::trans("Veuillez choisir une catégorie", app()->getLocale()) }}</option>
                    @foreach ($categories as $categorie)
                    <option value="{{$categorie->id}}">{{ GoogleTranslate::trans($categorie->name, app()->getLocale()) }}</option>
                    @endforeach


                </select>
                @error('document_id')
                <span class="text-danger">{{ GoogleTranslate::trans($message, app()->getLocale()) }}</span>
                @enderror
            </div>
            <div class="form-group col-md-6">
                <label for="prenom" class="text-gray-800">{{ GoogleTranslate::trans("Titre du livre", app()->getLocale()) }}</label>
                <input type="text" class="form-control" name="title" id="inputPassword4">
                @error('title')
                <span class="text-danger">{{ GoogleTranslate::trans($message, app()->getLocale()) }}</span>
                @enderror
            </div>
        </div>
        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="age" class="text-gray-800">{{ GoogleTranslate::trans("Photo du livre (optionnel)", app()->getLocale()) }}</label>
                <input type="file" class="form-control" name="photo" id="inputEmail4" placeholder="email du stagiaire">
                @error('photo')
                <span class="text-danger">{{ GoogleTranslate::trans($message, app()->getLocale()) }}</span>
                @enderror
            </div>
            <div class="form-group col-md-6">
                <label for="classe" class="text-gray-800">{{ GoogleTranslate::trans("Auteur du livre", app()->getLocale()) }}</label>
                <input type="text" class="form-control" name="auteur" id="inputPassword4">
                @error('auteur')
                <span class="text-danger">{{ GoogleTranslate::trans($message, app()->getLocale()) }}</span>
                @enderror
            </div>
        </div>
        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="sexe" class="text-gray-800">{{ GoogleTranslate::trans("Type de document", app()->getLocale()) }}</label>
                <select id="inputState" class="form-control" name="type">
                    <option value="">{{ GoogleTranslate::trans("Veuillez choisir le type de document", app()->getLocale()) }}</option>
                    <option value="1">Payant</option>
                    <option value="2">Gratuit</option>
                </select>
                @error('type')
                <span class="text-danger">{{ GoogleTranslate::trans($message, app()->getLocale()) }}</span>
                @enderror
            </div>
            <div class="form-group col-md-6">
                <label for="classe" class="text-gray-800">{{ GoogleTranslate::trans("Lien d'achat du livre du livre(optionnel)", app()->getLocale()) }}</label>
                <input type="url" class="form-control" name="lien" id="inputPassword4">
                @error('lien')
                <span class="text-danger">{{ GoogleTranslate::trans($message, app()->getLocale()) }}</span>
                @enderror
            </div>
        </div>
        <div class="row">
            <div class="form-group col-md-6">
                <label for="classe" class="text-gray-800">{{ GoogleTranslate::trans("Prix d'achat du livre du livre (optionnel)", app()->getLocale()) }}</label>
                <input type="number" class="form-control" name="prix" id="inputPassword4">
                @error('prix')
                <span class="text-danger">{{ GoogleTranslate::trans($message, app()->getLocale()) }}</span>
                @enderror
            </div>
            <div class="form-group col-md-6">
                <label for="age" class="text-gray-800">{{ GoogleTranslate::trans("Livre en pdf (optionnel)", app()->getLocale()) }}</label>
                <input type="file" class="form-control" name="livre" id="inputEmail4" placeholder="email du stagiaire">
                @error('livre')
                <span class="text-danger">{{ GoogleTranslate::trans($message, app()->getLocale()) }}</span>
                @enderror
            </div>
        </div>

        <div class="form-group ">
            <label for="motivation" class="text-gray-800">{{ GoogleTranslate::trans("Description", app()->getLocale()) }}</label>
            <textarea class="form-control" id="summernote" name="description" cols="30" rows="10"></textarea>
        </div>


        <button type="submit" class="btn btn-primary">{{ GoogleTranslate::trans("Enrégistrer", app()->getLocale()) }}</button>
    </form>
</div>

@endsection
