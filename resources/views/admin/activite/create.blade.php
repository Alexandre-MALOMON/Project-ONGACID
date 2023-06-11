@extends('partials.admin_layout')
@section('content')
<div style='padding-left: 20px;'>
    <h2> Publication d'une activité</h2>
</div>


<div style='padding-right:20px;padding-left: 20px;margin-bottom: 20px;'>
    <form method="post" action="{{ route('activity.store') }}" enctype="multipart/form-data">
        @csrf
        <div class="form-row">

            <div class="form-group col-md-6">
                <label for="sexe" class="text-gray-800">Catégorie</label>
                <select id="inputState" class="form-control" name="category_id">
                    <option value=""> Veuillez choisir une catégorie</option>
                    @foreach ($categories as $categorie)
                    <option value="{{$categorie->id}}"> {{ $categorie->name }}</option>
                    @endforeach


                </select>
                @error('category_id')
                <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <div class="form-group col-md-6">
                <label for="prenom" class="text-gray-800">Titre de l'evènement</label>
                <input type="text" class="form-control" name="title" id="inputPassword4">
                @error('title')
                <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
        </div>
        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="age" class="text-gray-800">Photos de l'activité</label>
                <input type="file" class="form-control" name="photo[]" multiple id="inputEmail4" placeholder="email du stagiaire">
                @error('photo')
                <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <div class="form-group col-md-6">
                <label for="classe" class="text-gray-800">Lieu de l'activité</label>
                <input type="text" class="form-control" name="lieu" id="inputPassword4">
                @error('lieu')
                <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
        </div>
        <div class="form-group ">
            <label for="motivation" class="text-gray-800">Decription</label>
            <textarea class="form-control" id="summernote" name="description" cols="30" rows="10"></textarea>
            @error('description')
                <span class="text-danger">{{ $message }}</span>
                @enderror
        </div>


        <button type="submit" class="btn btn-primary">Enrégistrer</button>
    </form>
</div>

@endsection
