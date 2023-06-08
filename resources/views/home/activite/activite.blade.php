@extends('partials.website.app')
@section('website_content')

<div class="banner">
    <h1>{{ GoogleTranslate::trans("NOS ACTIVITES", app()->getLocale()) }}</h1>
</div>

<section class="container_bibli_gratuite">
    <h2>{{ GoogleTranslate::trans("Rechercher un évènement", app()->getLocale()) }}
        <h2>
            <form class="form_gratuite" method="get" action="{{ route('searchActivity')}}">
                @csrf
                <div class="container_input_gratuite">
                    <select name="categorie_id" id="categorie_id">
                        <option value="">{{ GoogleTranslate::trans("Veuillez choisir une catégorie", app()->getLocale()) }}</option>
                        @foreach ($categories as $categorie)
                        <option value="{{$categorie->id}}">{{ GoogleTranslate::trans($categorie->name, app()->getLocale()) }}</option>
                        @endforeach

                    </select>
                    <input type="text" name="title" placeholder="{{ GoogleTranslate::trans('Nom de l\'évènement', app()->getLocale()) }}">
                </div>
                <button>{{ GoogleTranslate::trans("Rechercher", app()->getLocale()) }}</button>
            </form>
</section>

<section class="container_cards_activite">
    <div class="cards_activite">
        @if ($activites->count() > 0)
        @foreach ($activites as $activite)

        <div class="activite">
            @php
            $photo = json_decode($activite->photo)
            @endphp
            <img src="{{ $photo[0]}}" alt="" height="200">
            <h3>{{ GoogleTranslate::trans($activite->title, app()->getLocale()) }}</h3>
             <!--  <p>{!!GoogleTranslate::trans(substr($activite->description,0,300), app()->getLocale())!!}...</p>
          <h4><span>Date :</span> 20 octobre au 19 novembre</h4> -->
            <h5><span>Lieu :</span> {{$activite->lieu}}</h5>
            <a href="{{ route('descriptionactivite',$activite->slug)}}">{{ GoogleTranslate::trans("Lire", app()->getLocale()) }}</a>
        </div>

        @endforeach
        @else
        <p>{{ GoogleTranslate::trans("Aucune activité", app()->getLocale()) }}</p>
        @endif

    </div>
    <p>{{$activites->links()}}</p>
</section>
@endsection