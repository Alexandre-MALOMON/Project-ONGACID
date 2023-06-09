@extends('partials.website.app')
@section('website_content')

<div class="form_alert" style="margin-top: 70;">
    @if (Session::has('success'))
    <div class="alert alert-success">
        {{ GoogleTranslate::trans(Session::get('success'), app()->getLocale()) }}
    </div>
    @endif
    <form method="post" action="{{ route('volontaire',$emploie->id)}}" enctype="multipart/form-data">
        @csrf
        <div class="input_alert">
            <label for="">{{ GoogleTranslate::trans('Nom', app()->getLocale()) }} <span style="color: red;">*</span></label>
            <input type="text" name="nom"><br>
            @error('nom')
            <span class="text-danger">{{ GoogleTranslate::trans($message, app()->getLocale()) }}</span>
            @enderror
        </div>
        <div class="input_alert">
            <label for="">{{ GoogleTranslate::trans('Prénom', app()->getLocale()) }} <span style="color: red;">*</span></label>
            <input type="text" name="prenom" placeholder="{{ GoogleTranslate::trans('Prenom', app()->getLocale()) }}"><br>
            @error('prenom')
            <span class="text-danger">{{ GoogleTranslate::trans($message, app()->getLocale()) }}</span>
            @enderror
        </div>
        <div class="input_alert">
            <label for="">{{ GoogleTranslate::trans('E-mail', app()->getLocale()) }} <span style="color: red;">*</span></label>
            <input type="email" name="email" placeholder="{{ GoogleTranslate::trans('Email', app()->getLocale()) }}"><br>
            @error('email')
            <span class="text-danger">{{ GoogleTranslate::trans($message, app()->getLocale()) }}</span>
            @enderror
        </div>
        <div class="input_alert">
            <label for="">{{ GoogleTranslate::trans('Numéro de téléphone', app()->getLocale()) }} <span style="color: red;">*</span></label>
            <input type="text" name="contact" placeholder="{{ GoogleTranslate::trans('Numéro de téléphone', app()->getLocale()) }}"><br>
            @error('contact')
            <span class="text-danger">{{ GoogleTranslate::trans($message, app()->getLocale()) }}</span>
            @enderror
        </div>
        <div class="input_alert">
            <label for="">{{ GoogleTranslate::trans('Pays', app()->getLocale()) }} <span style="color: red;">*</span></label>
            <input type="text" name="pays" placeholder="{{ GoogleTranslate::trans('Pays', app()->getLocale()) }}"><br>
            @error('pays')
            <span class="text-danger">{{ GoogleTranslate::trans($message, app()->getLocale()) }}</span>
            @enderror
        </div>
        <div class="input_alert">
            <label for="">{{ GoogleTranslate::trans('Ville de résidence', app()->getLocale()) }} <span style="color: red;">*</span></label>
            <input type="text" name="ville" placeholder="{{ GoogleTranslate::trans('Ville de résidence', app()->getLocale()) }}"><br>
            @error('ville')
            <span class="text-danger">{{ GoogleTranslate::trans($message, app()->getLocale()) }}</span>
            @enderror
        </div>
        <div class="input_alert">
            <label for="">{{ GoogleTranslate::trans('Cv', app()->getLocale()) }} <span style="color: red;">*</span></label>
            <input type="file" name="cv"><br>
            @error('cv')
            <span class="text-danger">{{ GoogleTranslate::trans($message, app()->getLocale()) }}</span>
            @enderror
        </div>
        <button>{{ GoogleTranslate::trans('Envoyer', app()->getLocale()) }}</button>
    </form>
</div>

@endsection
