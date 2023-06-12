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
                <h3>{{ Carbon::parse($agenda->debut)->Format('d F Y') . ' au' }} {{ Carbon::parse($agenda->fin)->Format('d F Y') }}</h3>
                <h2>{{ $agenda->title }}
                    <h2>
            </div>
            <div class="tarifs_horaire">
                <p><span>Lieu :</span>{{ $agenda->lieu }}</p>
                <p><span>Heure :</span> {{$agenda->heure}}</p>
                <p><span>Prix :</span> {{$agenda->prix}} FCFA
                <p>
            </div>
            <div class="link_desc">
                <a href="{{route('formagenda',$agenda->slug)}}">S'inscrire</a>
            </div>
        </div>

    </div>
    </div>

    <div class="desc_agenda">
        <div class="desc_text">
            <h2>{{ $agenda->title }}
            </h2>
            <p>
                {!! $agenda->description !!}

            </p>
        </div>
    </div>

</section>
@endsection
