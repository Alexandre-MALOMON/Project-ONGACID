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
                <h3>{{ Carbon::parse($recrutement->start)->Format('d F Y') . ' au' }} {{ Carbon::parse($recrutement->end)->Format('d F Y') }}</h3>
                <h2>{{ $recrutement->name }}
                    <h2>
            </div>
            <div class="tarifs_horaire">
                <p><span>Pays :</span> Tchad</p>
                <p><span>Type de contrat :</span> CDI</p>
            </div>
            @if ($recrutement->type == 1)
            <div class="link_desc">
                <a href="{{ route('formdemploi',$recrutement->slug)}}">Postuler</a>
            </div>
            @else
            <div class="link_desc">
                <a href="{{ route('formvolontaire',$recrutement->slug)}}">Postuler</a>
            </div>
            @endif

        </div>

    </div>
    </div>

    <div class="desc_agenda">
        <div class="desc_text">
            <h2>{{ $recrutement->name }}
            </h2>
            <p>{!! $recrutement->description !!}</p>
        </div>
    </div>

</section>
@endsection
