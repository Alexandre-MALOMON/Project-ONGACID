@extends('partials.website.app')
@section('website_content')
<?php

use Carbon\Carbon;

setlocale(LC_TIME, ['fr', 'fra', 'fr_FR']);
?>
<div class="banner">
    <h1>{{ GoogleTranslate::trans("NOTRE AGENDA", app()->getLocale()) }}</h1>
</div>

<section class="container_bibli_gratuite">
    <h2>{{ GoogleTranslate::trans("Rechercher une formation", app()->getLocale()) }}<h2>
            <form class="form_gratuite" method="get" action="{{ route('agendaSearch')}}">
                @csrf
                <div class="container_input_gratuite">

                    <input type="text" name="title" placeholder="{{ GoogleTranslate::trans('Title de la formation', app()->getLocale()) }}">
                </div>
                <button>{{ GoogleTranslate::trans("Rechercher", app()->getLocale()) }}</button>
            </form>
</section>

<section class="container_agenda">
    @if ($agendas->count() > 0)
    @foreach ($agendas as $agenda)
    <div class="agenda_cards">
        <img src="{{ $agenda->photo }}" alt="">
        <div class="agenda_cards_text">
            <div class="agenda_text">
                <h3>{{ GoogleTranslate::trans(Carbon::parse($agenda->debut)->Format('d F Y') . ' au', app()->getLocale()) }}  {{ GoogleTranslate::trans(Carbon::parse($agenda->fin)->Format('d F Y'), app()->getLocale()) }}</h3>
                <h2>{{ GoogleTranslate::trans($agenda->title, app()->getLocale()) }}
                    <h2>
                        <p>{!! GoogleTranslate::trans(substr($agenda->description,0,200), app()->getLocale()) !!}...
                        <p>
            </div>
            <div class="agenda_horaire">
                <p><span>Lieu :</span> {{$agenda->lieu}}</p>
                <p><span>Heure :</span> {{$agenda->heure}}</p>
                <p><span>Prix :</span> {{$agenda->prix}} fcfa
                <p>
            </div>
            <div class="link_agenda">
                <a href="{{ route('descriptionagenda',$agenda->slug)}}">{{ GoogleTranslate::trans("Savoir plus", app()->getLocale()) }}</a>
            </div>
        </div>
    </div>
    @endforeach

    @else
    <p style="text-align: center;">{{ GoogleTranslate::trans("Aucun résultats de recherche", app()->getLocale()) }}</p>
    @endif
    <p style="text-align: center;">{{$agendas->links()}}</p>

</section>
@endsection
