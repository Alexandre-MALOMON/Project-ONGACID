@extends('partials.website.app')
@section('website_content')
<div class="offre_banner">
         <h1>{{ GoogleTranslate::trans("NOS OFFRES D'EMPLOI", app()->getLocale()) }}</h1>
</div>


<div class="offre_container">
    <div class="offre_group">
        <a href="{{ route('offredemploi')}}">
            <div class="offre_card">
                <p>{{ GoogleTranslate::trans("RECRUTEMENT", app()->getLocale()) }}</p>
            </div>
        </a>
        <a href="{{ route('volontariat')}}">
            <div class="offre_card">
                <p>{{ GoogleTranslate::trans("VOLONTARIAT", app()->getLocale()) }}</p>
            </div>
        </a>
    </div>
</div>


@endsection
