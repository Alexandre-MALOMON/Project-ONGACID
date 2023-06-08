@extends('partials.website.app')
@section('website_content')
<div class="banner">
    <h1>{{ GoogleTranslate::trans("Bibliothèque", app()->getLocale()) }}</h1>
</div>

<section class="container_bibli_gratuite">
    <h2>{{ GoogleTranslate::trans("Rechercher un document", app()->getLocale()) }}
        <h2>
            <form class="form_gratuite" method="get" action="{{ route('searchDocument')}}">
                <div class="container_input_gratuite">
                    <select name="categorie_id" id="">
                        <option value="">{{ GoogleTranslate::trans("Tous les documents", app()->getLocale()) }}</option>
                        @foreach ($categories as $categorie)
                        <option value="{{$categorie->id}}">{{ GoogleTranslate::trans($categorie->name, app()->getLocale()) }}</option>
                        @endforeach
                    </select>
                    <input type="text" name="title" placeholder="{{ GoogleTranslate::trans('Le titre du document', app()->getLocale()) }}">
                </div>
                <button>{{ GoogleTranslate::trans("Rechercher", app()->getLocale()) }}</button>
            </form>
</section>

<section class="container_document">
    @if ($bibliotheques->count() > 0)
    @foreach ($bibliotheques as $bibliotheque)

    <div class="document">
        <img src="{{ $bibliotheque->photo}}" alt="">
        <div class="document_text">
            <h2>{{ GoogleTranslate::trans($bibliotheque->title, app()->getLocale()) }}</h2>
            <h3>{{ $bibliotheque->auteur}}</h3>
           <!--  <p>{!! GoogleTranslate::trans(substr($bibliotheque->description,0,200), app()->getLocale()) !!}...
            </p> -->

            <div class="container_button_text">
                <div class="link">
                    <a href="{{ route('download',$bibliotheque->slug)}}">{{ GoogleTranslate::trans("TELECHARGER", app()->getLocale()) }}</a>
                </div>

                <div class="text">
                    <p><strong>{{taille_fichier($bibliotheque->livre)}} </strong></p>
                    <p><strong>62</strong> {{ GoogleTranslate::trans("LECTURES", app()->getLocale()) }}</p>
                    <p><strong>{{ $bibliotheque->telechargement ? $bibliotheque->telechargement : 0}} </strong>{{ GoogleTranslate::trans(" TELECHARGEMENTS", app()->getLocale()) }} </p>
                </div>
            </div>
            <div class="social-btn-sp">
                @php
                    $lien = route('download',$bibliotheque->id)
                @endphp
                <p>{!!shareslink($lien)!!}</p>
            </div>
           <!--  <div class="partager">
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
    <p style="text-align: center;">{{ GoogleTranslate::trans("Aucun livre", app()->getLocale()) }}</p>
    @endif
    <p>{{$bibliotheques->links()}}</p>
</section>
@endsection
