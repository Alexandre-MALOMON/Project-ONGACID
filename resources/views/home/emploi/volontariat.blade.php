@extends('partials.website.app')
@section('website_content')
<?php

use Carbon\Carbon;

setlocale(LC_TIME, ['fr', 'fra', 'fr_FR']);
?>
<div class="volontariat_banner">
    <h1>VOLONTARIAT</h1>

    <div class="volontariat_form">
        <h2>Rechercher une offre</h2>
                <form>
                    <div class="volontariat_input">
                        <div class="volontariat_champ">
                            <input type="text" name="" placeholder="Tapez des mots clés...">
                        </div>
                        <div class="volontariat_champ">
                            <input type="text" name="" placeholder="Nom de l'offre">
                        </div>
                    </div>
                    <button>Rechercher</button>
                </form>
    </div>

</div>


<section class="emploi_container_cards">
    @if ($volontariats->count() > 0)
    @foreach ($volontariats as $volontariat)
    <div class="emploi_card">
        <div class="emploi_text">
            <h3>{{ Carbon::parse($volontariat->start)->Format('d F Y') . ' au' }} {{ Carbon::parse($volontariat->end)->Format('d F Y') }}</h3>
            <h2>{{ GoogleTranslate::trans($volontariat->name, app()->getLocale()) }}
                <h2>
                   <!--  <p>{!! GoogleTranslate::trans(substr($volontariat->description,0,200), app()->getLocale()) !!}...
                    <p> -->
        </div>
        <div class="emploi_action">
            <div class="action_1">
                <a href="{{ route('descriptionoffre',$volontariat->slug)}}">TOUT LIRE</a>
            </div>
            <div class="action_2">
                <a href="{{ route('formvolontaire',$volontariat->slug)}}">POSTULER</a>
            </div>
        </div>
    </div>
    @endforeach
    @else
    <p style="text-align: center;">Aucune offre de volontariat</p>
    @endif


    <p style="text-align: center;">{{$volontariats->links()}}</p>
</section>
@endsection
