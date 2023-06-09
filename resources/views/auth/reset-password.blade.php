

@extends('authentification.app')
@section('auth_content')

<section class="section_form">
    <div class="chang_form">
          <!-- Validation Errors -->
          <x-auth-validation-errors class="mb-4" :errors="$errors" />
        <h2>CHANGER DE MOTS DE PASSE</h2>
        <form method="POST" action="{{ route('password.update') }}">
            @csrf

            <!-- Password Reset Token -->
            <input type="hidden" name="token" value="{{ $request->route('token') }}">
            <div class="chang_input_item">
                <label for="">E-mail</label><br>
                <div class="chang_input_password">
                    <input type="email"  name="email" :value="old('email', $request->email)" required autofocus>
                </div>
            </div>
            <div class="chang_input_item">
                <label for="">Nouveau mot de passe</label><br>
                <div class="chang_input_password">
                    <input type="password" class="input_toggle password"  name="password" required >
                    <img class="eyeicon" src="{{ asset('images/eye-invisible.svg') }}" alt="" >
                </div>
            </div>
            <div class="chang_input_item">
                <label for="">Comfirmer mot de passe</label><br>
                <div class="chang_input_password">
                    <input type="password" class="input_toggle password" name="password_confirmation" required>
                    <img class="eyeicon" src="{{ asset('images/eye-invisible.svg') }}" alt="">
                </div>
            </div>
            <button>Envoyer</button>
        </form>
    </div>
</section>

@endsection
