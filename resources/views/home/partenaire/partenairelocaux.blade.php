@extends('partials.website.app')
@section('website_content')
<div class="partenaire_banner">
         <h1>{{ GoogleTranslate::trans("PARTENAIRES LOCAUX", app()->getLocale()) }}</h1>
</div>

<div class="container_partenaire">
    <div class="partenaire_card">
       <span><i class="fa-brands fa-pied-piper"></i></span>
    </div>
    <div class="partenaire_card">
       <span><i class="fa-brands fa-pied-piper"></i></span>
    </div>
    <div class="partenaire_card">
       <span><i class="fa-brands fa-pied-piper"></i></span>
    </div>
    <div class="partenaire_card">
       <span><i class="fa-brands fa-pied-piper"></i></span>
    </div>
    <div class="partenaire_card">
       <span><i class="fa-brands fa-pied-piper"></i></span>
    </div>
    <div class="partenaire_card">
       <span><i class="fa-brands fa-pied-piper"></i></span>
    </div>
    <div class="partenaire_card">
       <span><i class="fa-brands fa-pied-piper"></i></span>
    </div>
    <div class="partenaire_card">
       <span><i class="fa-brands fa-pied-piper"></i></span>
    </div>
</div>


@endsection
