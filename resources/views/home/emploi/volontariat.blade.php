@extends('partials.website.app')
@section('website_content')
<?php

use Carbon\Carbon;

setlocale(LC_TIME, ['fr', 'fra', 'fr_FR']);
?>
<div class="volontariat_banner">
    <h1>{{ GoogleTranslate::trans('VOLONTARIAT', app()->getLocale()) }}</h1>

    <div class="volontariat_form">
        <h2>{{ GoogleTranslate::trans('Rechercher une offre', app()->getLocale()) }}
            <h2>
                <form>
                    <div class="volontariat_input">
                        <div class="volontariat_champ">
                            <input type="text" name="" placeholder="{{ GoogleTranslate::trans('Tapez des mots clés...', app()->getLocale()) }}">
                        </div>
                        <div class="volontariat_champ">
                            <input type="text" name="" placeholder="{{ GoogleTranslate::trans('Nom de l\'offre', app()->getLocale()) }}">
                        </div>
                    </div>
                    <button>{{ GoogleTranslate::trans('Rechercher', app()->getLocale()) }}</button>
                </form>
    </div>

</div>


<section class="emploi_container_cards">
    @if ($volontariats->count() > 0)
    @foreach ($volontariats as $volontariat)
    <div class="emploi_card">
        <div class="emploi_text">
            <h3>{{ GoogleTranslate::trans(Carbon::parse($volontariat->start)->Format('d F Y') . ' au', app()->getLocale()) }} {{ GoogleTranslate::trans(Carbon::parse($volontariat->end)->Format('d F Y'), app()->getLocale()) }}</h3>
            <h2>{{ GoogleTranslate::trans($volontariat->name, app()->getLocale()) }}
                <h2>
                   <!--  <p>{!! GoogleTranslate::trans(substr($volontariat->description,0,200), app()->getLocale()) !!}...
                    <p> -->
        </div>
        <div class="emploi_action">
            <div class="action_1">
                <a href="{{ route('descriptionoffre',$volontariat->slug)}}">{{ GoogleTranslate::trans('TOUT LIRE', app()->getLocale()) }}</a>
            </div>
            <div class="action_2">
                <a href="{{ route('formvolontaire',$volontariat->slug)}}">{{ GoogleTranslate::trans('POSTULER', app()->getLocale()) }}</a>
            </div>
        </div>
    </div>
    @endforeach
    @else
    <p style="text-align: center;">{{ GoogleTranslate::trans('Aucune offre de volontariat', app()->getLocale()) }}</p>
    @endif


    <p style="text-align: center;">{{$volontariats->links()}}</p>
</section>
@endsection
