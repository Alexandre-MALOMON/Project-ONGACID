
@extends('authentification.app')
@section('auth_content')

<section class="section_form">
    <div class="register_form">
        <h2>INSCRIPTION</h2>
         <!-- Validation Errors -->
         <x-auth-validation-errors class="mb-4" :errors="$errors" />
        <form method="POST" action="{{ route('register') }}">
            @csrf
            <div class="register_input_item">
                <label for="">Nom</label><br>
                <input type="text" name="lastname" :value="old('lastname')" required autofocus>
            </div>
            <div class="register_input_item">
                <label for="">Prénom</label><br>
                <input type="text" name="firstname" :value="old('firstname')" required autofocus>
            </div>
            <div class="register_input_item">
                <label for="">Contact</label><br>
                <input type="number" name="contact" :value="old('contact')" required autofocus>
            </div>
            <div class="register_input_item">
                <label for="">Email</label><br>
                <input type="email" name="email" :value="old('email')" required>
            </div>
            <div class="register_input_item">
                <label for="">Mot de passe</label><br>
                <div class="register_input_password">
                    <input type="password" class="input_toggle password" name="password" required autocomplete="new-password">
                    <img class="eyeicon" src="{{ asset('images/eye-invisible.svg') }}" alt="">
                </div>
            </div>
            <div class="register_input_item">
                <label for="">Confirmer le mot de passe</label><br>
                <div class="register_input_password">
                    <input type="password" class="input_toggle password" name="password_confirmation" required>
                    <img class="eyeicon" src="{{ asset('images/eye-invisible.svg') }}" alt="">
                </div>
            </div>
            <div class="register_link_action">
                <a href="{{ route('login')}}">Se connecter</a>
                <!-- <a href="#">Mots de passe oublié</a> -->
            </div>
            <button>S'inscrire</button>
        </form>
    </div>
</section>

@endsection
