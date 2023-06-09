@extends('partials.website.app')
@section('website_content')

<div class="banner">
    <h1>NOS ACTUALITES</h1>
</div>

<section class="container_bibli_gratuite">
    <h2>Rechercher une actualité</h2>
            <form class="form_gratuite" method="get" action="{{ route('searchActualite')}}">
                @csrf
                <div class="container_input_gratuite">
                    <select name="categorie_id" id="">
                        <option value="">Veuillez choisir une catégorie</option>
                        @foreach ($categories as $categorie)
                        <option value="{{$categorie->id}}">{{ $categorie->name }}</option>
                        @endforeach
                    </select>
                    <input type="text" name="title" placeholder="Titre de l'actualité">
                </div>
                <button>Rechercher</button>
            </form>
</section>

<section class="container_cards_actualite">
    @if ($postes->count() > 0 )
    @foreach ($postes as $poste)
    <div class="cards_group_actualite">
        <div class="cards_actualite">
            <img src="{{ $poste->photo }}" alt="">
            <div class="text_actualite">
                <h2>{{ $poste->title }}
                </h2>
               <!-- <p>{!! GoogleTranslate::trans(substr($poste->description,0,200), app()->getLocale()) !!}...</p>-->
                <div class="link_actualite">
                    <a href="{{ route('descriptionactualite', $poste->slug)}}">Lire</a>
                </div>
            </div>
        </div>
    </div>
    @endforeach
    @else
    <p style="text-align: center;">Aucun résultats de recherche</p>
    @endif
    <p style="text-align: center;">{{$postes->links()}}</p>

</section>
@endsection
