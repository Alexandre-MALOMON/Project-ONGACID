@extends('partials.website.app')
@section('website_content')
<?php

use Carbon\Carbon;

setlocale(LC_TIME, ['fr', 'fra', 'fr_FR']);
?>
<div class="banner">

</div>

<section class="container_desc_agenda">
    <div class="container_tarifs">
        <div class="tarifs">
            <div class="tarifs_text">
                <h3>{{ GoogleTranslate::trans(Carbon::parse($recrutement->start)->Format('d F Y') . ' au', app()->getLocale()) }} {{ GoogleTranslate::trans(Carbon::parse($recrutement->end)->Format('d F Y'), app()->getLocale()) }}</h3>
                <h2>{{ GoogleTranslate::trans($recrutement->name, app()->getLocale()) }}
                    <h2>
            </div>
            <div class="tarifs_horaire">
                <p><span>{{ GoogleTranslate::trans('Pays', app()->getLocale()) }} :</span> Tchad</p>
                <p><span>{{ GoogleTranslate::trans('Type de contrat', app()->getLocale()) }} :</span> CDI</p>
            </div>
            @if ($recrutement->type == 1)
            <div class="link_desc">
                <a href="{{ route('formdemploi',$recrutement->slug)}}">{{ GoogleTranslate::trans('Postuler', app()->getLocale()) }}</a>
            </div>
            @else
            <div class="link_desc">
                <a href="{{ route('formvolontaire',$recrutement->slug)}}">{{ GoogleTranslate::trans('Postuler', app()->getLocale()) }}</a>
            </div>
            @endif

        </div>

    </div>
    </div>

    <div class="desc_agenda">
        <div class="desc_text">
            <h2>{{ GoogleTranslate::trans($recrutement->name, app()->getLocale()) }}
            </h2>
            <p>{!! GoogleTranslate::trans($recrutement->description, app()->getLocale()) !!}</p>
        </div>
    </div>

</section>
@endsection
