@extends('partials.website.app')
@section('website_content')

<section class="section_setting">
    <h2>Paramètre du compte</h2>
    <div class="setting_item">
        <div class="setting_mail">
            <h3>Profil</h3>
            <form method="post" action="{{ route('updateProfil',Auth::user()->id)}}">
                @csrf
                @method('put')
                <div class="username_input_item">
                    <label for="">Nom</label><br>
                    <input type="text" name="lastname" value="{{ Auth::user()->lastname}}" >
                </div>
                <div class="username_input_item">
                    <label for="">Prénom</label><br>
                    <input type="text" name="firstname" value="{{ Auth::user()->firstname}}" >
                </div>
                <div class="mail_input_item">
                    <label for="">Adresse e-mail</label><br>
                    <input type="email" name="email" value="{{ Auth::user()->email}}" >
                </div>
                <div class="password_input_item">
                    <label for="">Mot de passe</label><br>
                    <div class="password_input_password">
                        <input type="password" name="password" class="input_toggle password">
                        <img class="eyeicon" src="{{ asset('images/eye-invisible.svg') }}" alt="">
                    </div>
                </div>
                <button>Changer</button>
            </form>
        </div>
        <div class="setting_delete">
            <a title="Supprimer" data-bs-toggle="modal" data-bs-target="#modalDelete">Supprimer votre compte</a>
        </div>
        @include('profile.modal')
    </div>
</section>
@endsection
