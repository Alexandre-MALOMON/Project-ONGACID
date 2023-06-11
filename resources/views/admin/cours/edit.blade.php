@extends('partials.admin_layout')
@section('content')
<div class="wrapper" style='padding-right:20px;padding-left: 20px;margin-bottom: 20px;'>
    <form action="{{ route('cours.update',$cour->id)}}" method="POST" enctype="multipart/form-data">

        @csrf
        @method('put')
        <div class="form-group">
            <label for="nom" class="text-gray-800">Intitulé du cours</label>
            <input type="text" class="form-control" value="{{ $cour->title_cours }}" name="title_cours" id="inputEmail4">
            @error('title_cours')
            <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>
        <div class="form-group">
            <label for="prenom" class="text-gray-800">Phot illustrative du cours</label>
            <input type="file" class="form-control" name="photo" id="inputPassword4">
            @error('photo')
            <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>
        <div class="form-group">
            <label for="prenom" class="text-gray-800">Nombre d'heure</label>
            <input type="number" class="form-control" name="heure" value="{{ $cour->heure}}" id="inputPassword4">
            @error('heure')
            <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>
        <div class="form_group">
            <label for="sexe" class="text-gray-800">{{ 'La catégorie du cours' }}</label>
            <select id="inputState" class="form-control" name="courCategory_id">
                @foreach ($categoryCourses as $categorie)
                @if ($categorie->id == $cour->courCategory_id)
                <option value="{{$categorie->id}}"> {{ $categorie->name }}</option>

                @else
                <option value="{{$categorie->id}}"> {{ $categorie->name }}</option>

                @endif
                @endforeach
            </select>
            @error('courCategory_id')
            <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>
        <div class="form_group">
            <label for="sexe" class="text-gray-800">{{ 'Type de cours' }}</label>
            <select id="inputState" class="form-control" name="type">
                <option value=""> {{ 'Veuillez choisir le type de cours' }}</option>
                <option value="1"> {{ 'Payant' }}</option>
                <option value="2"> {{ 'Gratuit' }}</option>
            </select>
            @error('type')
            <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>
        <div class="form-group">
            <label for="motivation" class="text-gray-800">Description du cours</label>
            <textarea class="form-control" id="summernote" name="description_cours" cols="30" rows="10">{{ $cour->description_cours }}</textarea>
            @error('description_cours')
            <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>
</div>
<button type="submit" class="btn btn-primary">Enrégistrer</button>



</form>
</div>
@endsection
