@extends('partials.website.app')
@section('website_content')
<section class="section_formation">
    <div class="formation_banner">
        <h1>{{ GoogleTranslate::trans("Nos cours", app()->getLocale()) }}</h1>
        <form method="post" action="{{ route('seachCours')}}">
            @csrf
            <select name="categorie" id="">
                <option value="">{{ GoogleTranslate::trans("Catégorie de cours", app()->getLocale()) }}</option>
                @foreach ($categories as $categorie)
                <option value="{{$categorie->id}}">{{ GoogleTranslate::trans($categorie->name, app()->getLocale()) }}</option>
                @endforeach
            </select>
            <button>{{ GoogleTranslate::trans("Rechercher", app()->getLocale()) }}</button>

        </form>
    </div>
    <div class="formation_cards">
        <div class="formation_cards_group">
            @if ($courses->count() > 0)
            @foreach ($courses as $course)
            <div class="formation_cards_element">
                <img src="{{$course->photo }}" alt="" class="">
                <h2>{{ GoogleTranslate::trans($course->title_cours, app()->getLocale()) }}</h2>
                <div class="cour_info">
                    <div class="cour_items">
                        <span><i class="fa-regular fa-clock"></i></span>
                        <h5>{{$course->heure}} {{ GoogleTranslate::trans("heures", app()->getLocale()) }}</h5>
                    </div>
                    <div class="cour_items">
                        <span><i class="fa-solid fa-award"></i></span>
                        <h5>{{ GoogleTranslate::trans("Certificat
                        ", app()->getLocale()) }}</h5>
                    </div>
                </div>
                <a href="{{ route('courses.show',$course->slug)}}">{{ GoogleTranslate::trans("Voir plus", app()->getLocale()) }}</a>
            </div>
            @endforeach
            @else
            <p style="text-align: center;">{{ GoogleTranslate::trans("Aucun résultat de recherche", app()->getLocale()) }}</p>
            @endif
            <p style="text-align: center;">{{$courses->links()}}</p>
        </div>
    </div>
</section>

@endsection