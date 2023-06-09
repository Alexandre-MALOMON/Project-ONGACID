@extends('authentification.app')
@section('auth_content')

<section class="section_form">
    <div class="login_form">
        <h2>Connexion</h2>
        <!-- Session Status -->
        <x-auth-session-status class="mb-4" :status="session('status')" />

        <!-- Validation Errors -->
        <x-auth-validation-errors class="mb-4" :errors="$errors" />
        <form method="POST" action="{{ route('login') }}">
            @csrf
            <div class="login_input_item">
                <label for="">Email</label><br>
                <input type="email" name="email" :value="old('email')">
            </div>
            <div class="login_input_item">
                <label for="">Mot de passe</label><br>
                <div class="login_input_password">
                    <input type="password" name="password" required autocomplete="current-password" class="input_toggle password">
                    <img class="eyeicon" src="{{ asset('images/eye-invisible.svg') }}" alt="">
                </div>
            </div>
            <div class="block mt-4">
                <label for="remember_me" class="inline-flex items-center">
                    <input id="remember_me" type="checkbox" class="rounded border-gray-300 text-indigo-600 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" name="remember">
                    <span class="ml-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
                </label>
            </div>
            <div class="login_link_action">
                <a href="{{ route('register')}}">S'inscrire</a>
                @if (Route::has('password.request'))
                    <a href="{{ route('password.request') }}">Mots de passe oublié ?</a>
                @endif

            </div>
            <button>Se connecter</button>
        </form>
    </div>
</section>

@endsection
