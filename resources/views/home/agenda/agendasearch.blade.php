@extends('partials.website.app')
@section('website_content')
<?php

use Carbon\Carbon;

setlocale(LC_TIME, ['fr', 'fra', 'fr_FR']);
?>
<div class="banner">
    <h1>NOTRE AGENDA</h1>
</div>

<section class="container_bibli_gratuite">
    <h2>Rechercher une formation<h2>
            <form class="form_gratuite" method="get" action="{{ route('agendaSearch')}}">
                @csrf
                <div class="container_input_gratuite">

                    <input type="text" name="title" placeholder="Title de la formation">
                </div>
                <button>Rechercher</button>
            </form>
</section>

<section class="container_agenda">
    @if ($agendas->count() > 0)
    @foreach ($agendas as $agenda)
    <div class="agenda_cards">
        <img src="{{ $agenda->photo }}" alt="">
        <div class="agenda_cards_text">
            <div class="agenda_text">
                <h3>{{ Carbon::parse($agenda->debut)->Format('d F Y') . ' au' }}  {{ Carbon::parse($agenda->fin)->Format('d F Y') }}</h3>
                <h2>{{ $agenda->title }}
                    <h2>
                        <p>{!! substr($agenda->description,0,200) !!}...
                        <p>
            </div>
            <div class="agenda_horaire">
                <p><span>Lieu :</span> {{$agenda->lieu}}</p>
                <p><span>Heure :</span> {{$agenda->heure}}</p>
                <p><span>Prix :</span> {{$agenda->prix}} fcfa
                <p>
            </div>
            <div class="link_agenda">
                <a href="{{ route('descriptionagenda',$agenda->slug)}}">Savoir plus</a>
            </div>
        </div>
    </div>
    @endforeach

    @else
    <p style="text-align: center;">Aucun résultats de recherche</p>
    @endif
    <p style="text-align: center;">{{$agendas->links()}}</p>

</section>
@endsection
