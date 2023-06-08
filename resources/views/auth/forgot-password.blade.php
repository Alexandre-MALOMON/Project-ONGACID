
@extends('authentification.app')
@section('auth_content')

<section class="section_form">
    <div class="send_form">
    <!-- Session Status -->
            <x-auth-session-status class="mb-4" :status="session('status')" />

            <!-- Validation Errors -->
            <x-auth-validation-errors class="mb-4" :errors="$errors" />
        <p>Indiquez le nom d'utilisateur ou l'adresse e-mail du compte afin de recevoir un e-mail
            et réinitialiser votre mot de passe.
        <p>

        <form method="POST" action="{{ route('password.email') }}">
            @csrf
            <div class="send_input_item">
                <input type="email" placeholder="Email" type="email" name="email" :value="old('email')" required autofocus>
            </div>
            <button>Envoyer</button>
        </form>
    </div>
</section>

@endsection
