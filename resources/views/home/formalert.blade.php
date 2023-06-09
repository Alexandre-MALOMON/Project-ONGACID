@extends('partials.website.app')
@section('website_content')

<!-- Success message -->
@if (Session::has('success'))
<div class="alert alert-success">
    {{ GoogleTranslate::trans(Session::get('success'), app()->getLocale()) }}
</div>
@endif
<div class="form_alert">
    <form method="post" action="{{ route('alert.store')}}">
        @csrf
        <div class="input_alert">
            <input type="text" name="nom" placeholder="{{ GoogleTranslate::trans('Nom', app()->getLocale()) }}"><br>
            @error('nom')
            <span class="text-danger">{{ GoogleTranslate::trans($message, app()->getLocale()) }}</span>
            @enderror
        </div>
        <div class="input_alert">
            <input type="text" name="prenom" placeholder="{{ GoogleTranslate::trans('Prenom', app()->getLocale()) }}"><br>
            @error('prenom')
            <span class="text-danger">{{ GoogleTranslate::trans($message, app()->getLocale()) }}</span>
            @enderror
        </div>
        <div class="input_alert">
            <input type="email" name="email" placeholder="{{ GoogleTranslate::trans('Email', app()->getLocale()) }}"><br>
            @error('email')
            <span class="text-danger">{{ GoogleTranslate::trans($message, app()->getLocale()) }}</span>
            @enderror
        </div>
        <div class="input_alert">
            <input type="text" name="contact" placeholder="{{ GoogleTranslate::trans('Numéro de téléphone', app()->getLocale()) }}"><br>
            @error('contact')
            <span class="text-danger">{{ GoogleTranslate::trans($message, app()->getLocale()) }}</span>
            @enderror
        </div>
        <div class="input_alert">
            <textarea name="message" placeholder="{{ GoogleTranslate::trans('Message', app()->getLocale()) }}"></textarea>
            @error('message')
            <span class="text-danger">{{ GoogleTranslate::trans($message, app()->getLocale()) }}</span>
            @enderror
        </div>

        <button type="submit">{{ GoogleTranslate::trans('Envoyer', app()->getLocale()) }}</button>
    </form>
</div>
@endsection