@extends('partials.website.app')
@section('website_content')
<!-- Success message -->

<div class="agenda_register_form">
    @if (Session::has('success'))
    <div class="alert alert-success">
        {{ Session::get('success') }}
    </div>
    @endif
    <h2>Inscrivez-vous à la formation</h2>
    <form method="post" action="{{ route('formation.inscription',$formation->id)}}" id="{{$formation->type ==1? 'form_inscription': ''}}">
        @csrf
        <div class="register_input">
            <input type="text" id="nom_inscri" name="nom" placeholder="Nom"><br>
            @error('nom')
            <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>
        <div class="register_input">
            <input type="text" id="prenom_inscri" name="prenom" placeholder="Prénom"><br>
            @error('prenom')
            <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>
        <div class="register_input">
            <input type="email" id="email_inscri" name="email" placeholder="Email"><br>
            @error('email')
            <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>
        <div class="register_input">
            <input type="text" id="contact_inscri" name="contact" placeholder="Numéro de téléphone"><br>
            @error('contact')
            <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>
        @if ($formation->type== 1)
        <input type="text" id="prix" name="montant" disabled value="{{$formation->prix}}">
        <div id="error" style="color: red;"></div>
        @endif
        <button>S'inscrire</button>
    </form>
</div>

@endsection
