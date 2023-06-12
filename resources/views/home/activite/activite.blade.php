@extends('partials.website.app')
@section('website_content')

<div class="banner">
    <h1>NOS ACTIVITES</h1>
</div>

<section class="container_bibli_gratuite">
    <h2>Rechercher un évènement</h2>
            <form class="form_gratuite" method="get" action="{{ route('searchActivity')}}">
                @csrf
                <div class="container_input_gratuite">
                    <select name="categorie_id" id="categorie_id">
                        <option value="">Veuillez choisir une catégorie</option>
                        @foreach ($categories as $categorie)
                        <option value="{{$categorie->id}}">{{ $categorie->name }}</option>
                        @endforeach

                    </select>
                    <input type="text" name="title" placeholder="Nom de l'évènement">
                </div>
                <button>Rechercher</button>
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
            <h3>{{ $activite->title }}</h3>
             <!--  <p>{!!substr($activite->description,0,300)!!}...</p>
          <h4><span>Date :</span> 20 octobre au 19 novembre</h4> -->
            <h5><span>Lieu :</span> {{$activite->lieu}}</h5>
            <a href="{{ route('descriptionactivite',$activite->slug)}}">Lire</a>
        </div>

        @endforeach
        @else
        <p>Aucune activité</p>
        @endif

    </div>
    <p>{{$activites->links()}}</p>
</section>
@endsection
