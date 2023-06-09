@extends('partials.website.app')
@section('website_content')
<?php

use Carbon\Carbon;

setlocale(LC_TIME, ['fr', 'fra', 'fr_FR']);
?>
<div class="emploi_banner">
    <h1>TOUTES NOS OFFRES DISPONIBLES</h1>

    <div class="emploi_form">
        <h2>Rechercher une offre d'emploi</h2>
                <form>
                    <div class="emploi_input">
                        <div class="emploi_champ">
                            <input type="text" name="" placeholder="Tapez des mots clés...">
                        </div>
                        <div class="emploi_champ">
                            <input type="text" name="" placeholder="Pays">
                        </div>
                        <div class="emploi_champ">
                            <input type="text" name="" placeholder="Domaine d'activité">
                        </div>
                    </div>
                    <button>Rechercher</button>
                </form>
    </div>

</div>


<section class="emploi_container_cards">
    @if ($emploies->count() > 0)
    @foreach ($emploies as $emploie)
    <div class="emploi_card">
        <div class="emploi_text">
            <h3>{{ Carbon::parse($emploie->start)->Format('d F Y') . ' au' }} {{ Carbon::parse($emploie->end)->Format('d F Y') }}</h3>
            <h2>{{ $emploie->name }}
                <h2>
                    <p>{!! substr($emploie->description,0,200) !!}...
                    <p>
        </div>

        <div class="emploi_info">
            <div class="emploi_info_text">
                <p>Tchad</p>
                <p>Temps partiel</p>
            </div>
            <div class="emploi_info_partage">
                <p>Partager sur</p>
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
                <a href="{{ route('descriptionoffre',$emploie->slug)}}">TOUT LIRE</a>
            </div>
            <div class="action_2">
                <a href="{{ route('formdemploi',$emploie->slug)}}">POSTULER</a>
            </div>
        </div>
    </div>
    @endforeach
    @else
    <p style="text-align: center;">Aucune offre d'emploie</p>
    @endif
    <p style="text-align: center;">{{$emploies->links()}}</p>
</section>
@endsection
