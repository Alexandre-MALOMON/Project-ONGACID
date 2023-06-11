@extends('partials.admin_layout')
@section('content')
<div style='padding-left: 20px;'>
    <h2>Programmer une formation</h2>
</div>


<div style='padding-right:20px;padding-left: 20px;margin-bottom: 20px;'>
    <form method="post" action="{{ route('formation.store') }}" enctype="multipart/form-data">
        @csrf
        <div class="form-row">

            <div class="form-group col-md-6">
                <label for="sexe" class="text-gray-800">Catégorie de formtion</label>
                <select id="inputState" class="form-control" name="type">
                    <option value="">Veuillez choisir une catégorie</option>
                    <option value="1">Payante</option>
                    <option value="2">Gratuite</option>

                </select>
                @error('type')
                <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <div class="form-group col-md-6">
                <label for="prenom" class="text-gray-800">Titre de la formation</label>
                <input type="text" class="form-control" name="title" id="inputPassword4">
                @error('title')
                <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
        </div>
        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="age" class="text-gray-800">Début de la formation</label>
                <input type="date" class="form-control" name="debut" multiple id="inputEmail4" placeholder="email du stagiaire">
                @error('debut')
                <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <div class="form-group col-md-6">
                <label for="classe" class="text-gray-800">Fin de la formation</label>
                <input type="date" class="form-control" name="fin" id="inputPassword4">
                @error('fin')
                <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
        </div>
        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="age" class="text-gray-800">Lieu de la formation(Optionnel)</label>
                <input type="text" class="form-control" name="lieu" multiple id="inputEmail4">
                @error('lieu')
                <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <div class="form-group col-md-6">
                <label for="classe" class="text-gray-800">Heure de la formation</label>
                <input type="time" class="form-control" name="heure" id="inputPassword4">
                @error('heure')
                <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
        </div>
        <div class="row">
            <div class="form-group col-md-6">
                <label for="classe" class="text-gray-800">Prix de la formation</label>
                <input type="number" class="form-control" name="prix" id="inputPassword4">
                @error('prix')
                <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <div class="form-group col-md-6">
                <label for="classe" class="text-gray-800">Lien de la formation(Optionnel)</label>
                <input type="url" class="form-control" name="lien" id="inputPassword4">
                @error('lien')
                <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
        </div>
        <div class="form-group col-md-6">
            <label for="classe" class="text-gray-800">Insérer une image </label>
            <input type="file" class="form-control" name="photo" id="inputPassword4">
            @error('photo')
            <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>
        <div class="form-group ">
            <label for="motivation" class="text-gray-800">Description</label>
            <textarea class="form-control" id="summernote" name="description" cols="30" rows="10"></textarea>
            @error('description')
            <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>


        <button type="submit" class="btn btn-primary">Enrégistrer</button>
    </form>
</div>

@endsection
