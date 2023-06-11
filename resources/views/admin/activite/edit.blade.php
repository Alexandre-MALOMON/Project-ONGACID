@extends('partials.admin_layout')
@section('content')
<div style='padding-left: 20px;'>
    <h2>Mise à jour d'une activité</h2>
</div>


<div style='padding-right:20px;padding-left: 20px;margin-bottom: 20px;'>
    <form method="post" action="{{ route('activity.update',$activity->id) }}" enctype="multipart/form-data">
        @csrf
        @method('put')
        <div class="form-row">

            <div class="form-group col-md-6">
                <label for="sexe" class="text-gray-800">Catégorie</label>
                <select id="inputState" class="form-control" name="category_id">
                    @foreach ($categories as $categorie)
                    @if ($categorie->id == $activity->category_id)
                    <option value="{{$categorie->id}}">{{ $categorie->name }}</option>
                    @else
                    <option value="{{$categorie->id}}">{{ $categorie->name }}</option>
                    @endif
                    @endforeach


                </select>
                @error('category_id')
                <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <div class="form-group col-md-6">
                <label for="prenom" class="text-gray-800">Titre  de l'activitéTitre de l'evènement</label>
                <input type="text" class="form-control" value="{{ $activity->title }}" name="title" id="inputPassword4">
                @error('title')
                <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
        </div>
        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="age" class="text-gray-800">Photos de l'activité</label>
                <input type="file" class="form-control" name="photo[]" multiple id="inputEmail4" >
                @error('photo')
                <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <div class="form-group col-md-6">
                <label for="classe" class="text-gray-800">Lieu de l'activité </label>
                <input type="text" class="form-control" value="{{ $activity->lieu }}" name="lieu" id="inputPassword4">
                @error('lieu')
                <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
        </div>
        <div class="form-group ">
            <label for="motivation" class="text-gray-800">Decription</label>
            <textarea class="form-control" id="summernote" name="description" cols="30" rows="10">$activity->description</textarea>
            @error('description')
            <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>


        <button type="submit" class="btn btn-primary">Enrégistrer</button>
    </form>
</div>

@endsection
