@extends('partials.website.app')
@section('website_content')
<!-- Success message -->

<div class="agenda_register_form">
    @if (Session::has('success'))
    <div class="alert alert-success">
        {{ GoogleTranslate::trans(Session::get('success'), app()->getLocale()) }}
    </div>
    @endif
    <h2> {{ GoogleTranslate::trans("Inscrivez-vous à la formation", app()->getLocale()) }}</h2>
    <form method="post" action="{{ route('formation.inscription',$formation->id)}}" id="{{$formation->type ==1? 'form_inscription': ''}}">
        @csrf
        <div class="register_input">
            <input type="text" id="nom_inscri" name="nom" placeholder="{{ GoogleTranslate::trans('Nom' , app()->getLocale())}}"><br>
            @error('nom')
            <span class="text-danger">{{GoogleTranslate::trans( $message, app()->getLocale()) }}</span>
            @enderror
        </div>
        <div class="register_input">
            <input type="text" id="prenom_inscri" name="prenom" placeholder="{{ GoogleTranslate::trans('Prénom' , app()->getLocale())}}"><br>
            @error('prenom')
            <span class="text-danger">{{ GoogleTranslate::trans($message , app()->getLocale())}}</span>
            @enderror
        </div>
        <div class="register_input">
            <input type="email" id="email_inscri" name="email" placeholder="{{ GoogleTranslate::trans('Email', app()->getLocale()) }}"><br>
            @error('email')
            <span class="text-danger">{{ GoogleTranslate::trans($message , app()->getLocale())}}</span>
            @enderror
        </div>
        <div class="register_input">
            <input type="text" id="contact_inscri" name="contact" placeholder="{{ GoogleTranslate::trans('Numéro de téléphone', app()->getLocale()) }}"><br>
            @error('contact')
            <span class="text-danger">{{GoogleTranslate::trans( $message , app()->getLocale())}}</span>
            @enderror
        </div>
        @if ($formation->type== 1)
        <input type="text" id="prix" name="montant" disabled value="{{$formation->prix}}">
        <div id="error" style="color: red;"></div>
        @endif
        <button>{{GoogleTranslate::trans( "S'inscrir" , app()->getLocale())}}</button>
    </form>
</div>

@endsection
