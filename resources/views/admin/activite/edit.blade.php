@extends('partials.admin_layout')
@section('content')
<div style='padding-left: 20px;'>
    <h2>{{ GoogleTranslate::trans("Mise à jour d'une activité", app()->getLocale()) }}</h2>
</div>


<div style='padding-right:20px;padding-left: 20px;margin-bottom: 20px;'>
    <form method="post" action="{{ route('activity.update',$activity->id) }}" enctype="multipart/form-data">
        @csrf
        @method('put')
        <div class="form-row">

            <div class="form-group col-md-6">
                <label for="sexe" class="text-gray-800">{{ GoogleTranslate::trans("Catégorie", app()->getLocale()) }}</label>
                <select id="inputState" class="form-control" name="category_id">
                    @foreach ($categories as $categorie)
                    @if ($categorie->id == $activity->category_id)
                    <option value="{{$categorie->id}}">{{ GoogleTranslate::trans($categorie->name, app()->getLocale()) }}</option>
                    @else
                    <option value="{{$categorie->id}}">{{ GoogleTranslate::trans($categorie->name, app()->getLocale()) }}</option>
                    @endif
                    @endforeach


                </select>
                @error('category_id')
                <span class="text-danger">{{ GoogleTranslate::trans($message, app()->getLocale()) }}</span>
                @enderror
            </div>
            <div class="form-group col-md-6">
                <label for="prenom" class="text-gray-800">{{ GoogleTranslate::trans("Titre  de l'activité", app()->getLocale()) }}Titre de l'evènement</label>
                <input type="text" class="form-control" value="{{ GoogleTranslate::trans($activity->title, app()->getLocale()) }}" name="title" id="inputPassword4">
                @error('title')
                <span class="text-danger">{{ GoogleTranslate::trans($message, app()->getLocale()) }}</span>
                @enderror
            </div>
        </div>
        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="age" class="text-gray-800">{{ GoogleTranslate::trans("Photos de l'activité", app()->getLocale()) }}</label>
                <input type="file" class="form-control" name="photo[]" multiple id="inputEmail4" >
                @error('photo')
                <span class="text-danger">{{ GoogleTranslate::trans($message, app()->getLocale()) }}</span>
                @enderror
            </div>
            <div class="form-group col-md-6">
                <label for="classe" class="text-gray-800">{{ GoogleTranslate::trans("Lieu de l'activité", app()->getLocale()) }} </label>
                <input type="text" class="form-control" value="{{ GoogleTranslate::trans($activity->lieu, app()->getLocale()) }}" name="lieu" id="inputPassword4">
                @error('lieu')
                <span class="text-danger">{{ GoogleTranslate::trans($message, app()->getLocale()) }}</span>
                @enderror
            </div>
        </div>
        <div class="form-group ">
            <label for="motivation" class="text-gray-800">{{ GoogleTranslate::trans("Decription", app()->getLocale()) }}</label>
            <textarea class="form-control" id="summernote" name="description" cols="30" rows="10">{{ GoogleTranslate::trans("$activity->description", app()->getLocale()) }}</textarea>
            @error('description')
            <span class="text-danger">{{ GoogleTranslate::trans($message, app()->getLocale()) }}</span>
            @enderror
        </div>


        <button type="submit" class="btn btn-primary">{{ GoogleTranslate::trans("Enrégistrer", app()->getLocale()) }}</button>
    </form>
</div>

@endsection
