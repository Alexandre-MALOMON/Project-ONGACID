@extends('partials.website.app')
@section('website_content')
<?php

use Carbon\Carbon;

setlocale(LC_TIME, ['fr', 'fra', 'fr_FR']);
?>
<div class="emploi_banner">
    <h1>{{ GoogleTranslate::trans('TOUTES NOS OFFRES DISPONIBLES', app()->getLocale()) }}</h1>

    <div class="emploi_form">
        <h2>{{ GoogleTranslate::trans("Rechercher une offre d'emploi", app()->getLocale()) }}
            <h2>
                <form>
                    <div class="emploi_input">
                        <div class="emploi_champ">
                            <input type="text" name="" placeholder="{{ GoogleTranslate::trans('Tapez des mots clés...', app()->getLocale()) }}">
                        </div>
                        <div class="emploi_champ">
                            <input type="text" name="" placeholder="{{ GoogleTranslate::trans('Pays', app()->getLocale()) }}">
                        </div>
                        <div class="emploi_champ">
                            <input type="text" name="" placeholder="{{ GoogleTranslate::trans('Domaine d\'activité', app()->getLocale()) }}">
                        </div>
                    </div>
                    <button>{{ GoogleTranslate::trans('Rechercher', app()->getLocale()) }}</button>
                </form>
    </div>

</div>


<section class="emploi_container_cards">
    @if ($emploies->count() > 0)
    @foreach ($emploies as $emploie)
    <div class="emploi_card">
        <div class="emploi_text">
            <h3>{{ GoogleTranslate::trans(Carbon::parse($emploie->start)->Format('d F Y') . ' au', app()->getLocale()) }} {{ GoogleTranslate::trans(Carbon::parse($emploie->end)->Format('d F Y'), app()->getLocale()) }}</h3>
            <h2>{{ GoogleTranslate::trans($emploie->name, app()->getLocale()) }}
                <h2>
                    <p>{!! GoogleTranslate::trans(substr($emploie->description,0,200), app()->getLocale()) !!}...
                    <p>
        </div>

        <div class="emploi_info">
            <div class="emploi_info_text">
                <p>Tchad</p>
                <p>Temps partiel</p>
            </div>
            <div class="emploi_info_partage">
                <p>{{ GoogleTranslate::trans('Partager sur', app()->getLocale()) }}</p>
                <p>
                    @php
                        $link = route('descriptionoffre',$emploie->name);
                    @endphp
                    {!!shareslink($link)!!}
                </p>
                <!-- <a href="#">
                    <span><i class="fa-brands fa-facebook"></i></span>
                </a>
                <a href="#">
                    <span><i class="fa-brands fa-twitter"></i></span>
                </a>
                <a href="#">
                    <span><i class="fa-brands fa-linkedin"></i></span>
                </a>
                <a href="#">
                    <span><i class="fa-brands fa-whatsapp"></i></span>
                </a> -->
            </div>
        </div>
        <div class="emploi_action">
            <div class="action_1">
                <a href="{{ route('descriptionoffre',$emploie->slug)}}">{{ GoogleTranslate::trans('TOUT LIRE', app()->getLocale()) }}</a>
            </div>
            <div class="action_2">
                <a href="{{ route('formdemploi',$emploie->slug)}}">{{ GoogleTranslate::trans('POSTULER', app()->getLocale()) }}</a>
            </div>
        </div>
    </div>
    @endforeach
    @else
    <p style="text-align: center;">{{ GoogleTranslate::trans("Aucune offre d'emploie", app()->getLocale()) }}</p>
    @endif
    <p style="text-align: center;">{{$emploies->links()}}</p>
</section>
@endsection
