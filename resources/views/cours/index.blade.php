@extends('partials.website.app')
@section('website_content')
<section class="section_formation">
    <div class="formation_banner">
        <h1>Nos cours</h1>
        <form method="post" action="{{ route('seachCours')}}">
            @csrf
            <select name="categorie" id="">
                <option value="">Catégorie de cours</option>
                @foreach ($categories as $categorie)
                <option value="{{$categorie->id}}">{{ $categorie->name }}</option>
                @endforeach
            </select>
            <button> Rechercher </button>

        </form>
    </div>
    <div class="formation_cards">
        <div class="formation_cards_group">
            @if ($courses->count() > 0)
            @foreach ($courses as $course)
            <div class="formation_cards_element">
                <img src="{{$course->photo }}" alt="" class="">
                <h2>{{ $course->title_cours }}</h2>
                <!--  <p>{!! substr($course->description_cours,0,2000) !!}... </p> -->
                <div class="cour_info">
                    <div class="cour_items">
                        <span><i class="fa-regular fa-clock"></i></span>
                        <h5>{{$course->heure}} heures</h5>
                    </div>
                    <div class="cour_items">
                        <span><i class="fa-solid fa-award"></i></span>
                        <h5>Certificat</h5>
                    </div>
                </div>
                <a href="{{ route('courses.show',$course->slug)}}">Voir plus</a>
            </div>
            @endforeach
            @else
            <p style="text-align: center;">Aucun cours disponible</p>
            @endif
            <p style="text-align: center;">{{$courses->links()}}</p>

        </div>
    </div>
</section>

@endsection
