@extends('partials.admin_layout')
@section('content')
<div class="wrapper" style='padding-right:20px;padding-left: 20px;margin-bottom: 20px;'>
    <form action="{{ route('cours.update',$cour->id)}}" method="POST" enctype="multipart/form-data">

        @csrf
        @method('put')
        <div class="form-group">
            <label for="nom" class="text-gray-800">{{ GoogleTranslate::trans("Intitulé du cours", app()->getLocale()) }}</label>
            <input type="text" class="form-control" value="{{ GoogleTranslate::trans($cour->title_cours, app()->getLocale()) }}" name="title_cours" id="inputEmail4">
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
            <input type="number" class="form-control" name="heure" value="{{ $cour->heure}}" id="inputPassword4">
            @error('heure')
            <span class="text-danger">{{ GoogleTranslate::trans($message, app()->getLocale()) }}</span>
            @enderror
        </div>
        <div class="form_group">
            <label for="sexe" class="text-gray-800">{{ GoogleTranslate::trans('La catégorie du cours', app()->getLocale()) }}</label>
            <select id="inputState" class="form-control" name="courCategory_id">
                @foreach ($categoryCourses as $categorie)
                @if ($categorie->id == $cour->courCategory_id)
                <option value="{{$categorie->id}}"> {{ GoogleTranslate::trans($categorie->name, app()->getLocale()) }}</option>

                @else
                <option value="{{$categorie->id}}"> {{ GoogleTranslate::trans($categorie->name, app()->getLocale()) }}</option>

                @endif
                @endforeach
            </select>
            @error('courCategory_id')
            <span class="text-danger">{{ GoogleTranslate::trans($message, app()->getLocale()) }}</span>
            @enderror
        </div>
        <div class="form_group">
            <label for="sexe" class="text-gray-800">{{ GoogleTranslate::trans('Type de cours', app()->getLocale()) }}</label>
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
            <label for="motivation" class="text-gray-800">{{ GoogleTranslate::trans("Description du cours", app()->getLocale()) }}</label>
            <textarea class="form-control" id="summernote" name="description_cours" cols="30" rows="10">{{ GoogleTranslate::trans($cour->description_cours, app()->getLocale()) }}</textarea>
            @error('description_cours')
            <span class="text-danger">{{ GoogleTranslate::trans($message, app()->getLocale()) }}</span>
            @enderror
        </div>
</div>
<button type="submit" class="btn btn-primary">{{ GoogleTranslate::trans("Enrégistrer", app()->getLocale()) }}</button>



</form>
</div>
@endsection
