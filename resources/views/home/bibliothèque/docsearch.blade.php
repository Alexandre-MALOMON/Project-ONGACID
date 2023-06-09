@extends('partials.website.app')
@section('website_content')
<div class="banner">
    <h1>Bibliothèque</h1>
</div>

<section class="container_bibli_gratuite">
    <h2>Rechercher un document</h2>
            <form class="form_gratuite" method="get" action="{{ route('searchDocument')}}">
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
    @if ($books->count() > 0)


    @foreach ($books as $book)

    <div class="document">
        <img src="{{ $book->photo}}" alt="">
        <div class="document_text">
            <h2>{{ $book->title }}</h2>
            <h3>{{ $book->auteur}}</h3>
            <p>{{ substr($book->description,0,200) }}...
            </p>

            <div class="container_button_text">
                <div class="link">
                    <a href="{{ route('download',$book->id)}}">TELECHARGER</a>
                </div>

                <div class="text">
                    <p><strong>{{taille_fichier($book->livre)}}</strong></p>
                    <p><strong>62</strong>LECTURES</p>
                    <p><strong>{{ $book->telechargement ? $book->telechargement : 0}} </strong>{{ GoogleTranslate::trans(" TELECHARGEMENTS", app()->getLocale()) }} </p>
                </div>
            </div>
            <div class="social-btn-sp">
                @php
                    $lien = route('download',$book->id)
                @endphp
                <p>{!!shareslink($lien)!!}</p>
            </div>
            <!--<div class="partager">
                <p>{{ GoogleTranslate::trans("Partager sur", app()->getLocale()) }}</p>
                <a href="#">
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
                </a>
            </div> -->
        </div>
    </div>
    @endforeach
    @else
    <p style="text-align: center;">Aucun résultat de recherche</p>
    @endif
    <p>{{$books->links()}}</p>
</section>
@endsection
