@extends('partials.admin_layout')
@section('content')
<div style='padding-left: 20px;'>
    <h2>Enrégistrement d'utilisateur</h2>
</div>


<div style='padding-right:20px;padding-left: 20px;margin-bottom: 20px;'>
    <form method="post" action="{{ route('user.store') }}" enctype="multipart/form-data">
        @csrf
        <div class="form-row">

            <div class="form-group col-md-6">
                <label for="prenom" class="text-gray-800">Nom</label>
                <input type="text" class="form-control" name="lastname" id="inputPassword4">
                @error('lastname')
                <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <div class="form-group col-md-6">
                <label for="prenom" class="text-gray-800">Prénom</label>
                <input type="text" class="form-control" name="firstname" id="inputPassword4">
                @error('firstname')
                <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
        </div>
        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="age" class="text-gray-800">contact</label>
                <input type="number" class="form-control" name="contact" multiple id="inputEmail4">
                @error('contact')
                <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <div class="form-group col-md-6">
                <label for="classe" class="text-gray-800">E-mail</label>
                <input type="email" class="form-control" name="email" id="inputPassword4">
                @error('email')
                <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
        </div>
        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="age" class="text-gray-800">Photo(optionnel)</label>
                <input type="file" class="form-control" name="photo" id="inputEmail4">
                @error('photo')
                <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <div class="form-group col-md-6">
                <label for="sexe" class="text-gray-800">Rôle</label>
                <select id="inputState" class="form-control" name="role">
                    <option value="">Veuillez choisir un Rôle</option>
                    <option value="1">Adminitrateur</option>
                    <option value="2">Consultant</option>
                    <option value="3">Éditeur</option>
                </select>
                @error('role')
                <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
        </div>


        <button type="submit" class="btn btn-primary">Enrégistrer</button>
    </form>
</div>

@endsection