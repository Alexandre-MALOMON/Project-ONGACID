@extends('partials.website.app')
@section('website_content')

<div class="form_alert" style="margin-top: 70;">
    @if (Session::has('success'))
    <div class="alert alert-success">
        {{ Session::get('success') }}
    </div>
    @endif
    <form method="post" action="{{ route('volontaire',$emploie->id)}}" enctype="multipart/form-data">
        @csrf
        <div class="input_alert">
            <label for="">Nom<span style="color: red;">*</span></label>
            <input type="text" name="nom"><br>
            @error('nom')
            <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>
        <div class="input_alert">
            <label for="">Prénom<span style="color: red;">*</span></label>
            <input type="text" name="prenom" placeholder="Prenom"><br>
            @error('prenom')
            <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>
        <div class="input_alert">
            <label for="">E-mail<span style="color: red;">*</span></label>
            <input type="email" name="email" placeholder="Email"><br>
            @error('email')
            <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>
        <div class="input_alert">
            <label for="">Numéro de téléphone <span style="color: red;">*</span></label>
            <input type="text" name="contact" placeholder="Numéro de téléphone"><br>
            @error('contact')
            <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>
        <div class="input_alert">
            <label for="">Pays<span style="color: red;">*</span></label>
            <input type="text" name="pays" placeholder="Pays"><br>
            @error('pays')
            <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>
        <div class="input_alert">
            <label for="">Ville de résidence<span style="color: red;">*</span></label>
            <input type="text" name="ville" placeholder="Ville de résidence"><br>
            @error('ville')
            <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>
        <div class="input_alert">
            <label for="">Cv<span style="color: red;">*</span></label>
            <input type="file" name="cv"><br>
            @error('cv')
            <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>
        <button>Envoyer</button>
    </form>
</div>

@endsection
