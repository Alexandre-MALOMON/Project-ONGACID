@extends('partials.website.app')
@section('website_content')
<div class="banner">
    <h1>Bibliothèque</h1>
</div>

<section class="container_bibli_gratuite">
    <h2>Rechercher un document</h2>
            <form class="form_gratuite" method="get" action="{{ route('searchDocumentPayant')}}">
                <div class="container_input_gratuite">
                    <select name="categorie_id" id="">
                        <option value="">Tous les documents</option>
                        @foreach ($categories as $categorie)
                        <option value="{{$categorie->id}}">{{ $categorie->name }}</option>
                        @endforeach
                    </select>
                    <input type="text" name="title" placeholder="Le titre du document">
                </div>
                <button>Rechercher</button>
            </form>
</section>

<section class="container_document">
    @if ($bibliotheques->count() > 0)
    @foreach ($bibliotheques as $bibliotheque)

    <div class="document">
        <img src="{{ $bibliotheque->photo}}" alt="">
        <div class="document_text">
            <h2>{{ $bibliotheque->title }}</h2>
            <h3>{{ $bibliotheque->auteur}}</h3>
             <p>{{$bibliotheque->prix }} FCFA</p>

            <div class="container_button_text" id="book" href="{{  route('bookTransaction',$bibliotheque->slug)}}">
                <div class="link">
                    <button id="lien" href="{{  route('bookTransaction',$bibliotheque->slug)}}">ACHETER</button>
                </div>
                <input type="hidden" name="" value="{{$bibliotheque->prix}}" id="price_book">
                <div class="text">
                    <p><strong>{{taille_fichier($bibliotheque->livre)}} </strong></p>
                    <p><strong>62</strong>LECTURES</p>
                    <p><strong>{{ $bibliotheque->telechargement ? $bibliotheque->telechargement : 0}} </strong> TELECHARGEMENTS</p>
                </div>
            </div>
            <div class="social-btn-sp">
                <p>{!!shareslink($bibliotheque->lien)!!}</p>
            </div>

        </div>
    </div>
    @endforeach
    @else
    <p style="text-align: center;">Aucun livre</p>
    @endif
    <p>{{$bibliotheques->links()}}</p>
</section>

@endsection
