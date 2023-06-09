@extends('partials.website.app')
@section('website_content')

<div class="form_des_banner">
    <div class="form_des_container">
        <div class="form_des_text">
            <p>{{ $cour->category->name }}</p>
            <h2>{{ $cour->title_cours }}</h2>
            <div class="form_des_icone">
                <div class="icone_items">
                    <span><i class="fa-solid fa-graduation-cap"></i></span>
                    <h5>
                        @if ($cour->type == 1)
                        Payante
                        @else
                        Gratuite
                        @endif
                    </h5>
                </div>
                <div class="icone_items">
                    <span><i class="fa-regular fa-clock"></i></span>
                    <h5>{{$cour->heure}} heures</h5>
                </div>
                <div class="icone_items">
                    <span><i class="fa-solid fa-award"></i></span>
                    <h5>Certificat gratuite</h5>
                </div>
                <div class="icone_items">
                    <span><i class="fa-solid fa-award"></i></span>
                    <h5 id="">{{$cour->prix}} Fcfa</h5>
                    <input type="hidden" name="" value="{{$cour->prix}}" id="price">
                </div>
            </div>
        </div>
        <div class="form_des_action">
            @if ($cour->prix)
            @if ($courSuivis)
            @if ($cour->id == $courSuivis['cour_id'] && Auth::user()->id== $courSuivis['user_id'])
            <a  href="{{ route('cours',$cour->slug)}}">ACCEDER A LA FORMATION</a>


            @endif
            @else

            <a  id="cour" href="{{ route('courtransaction',$cour->slug)}}">Payer le cour</a>

            @endif

            @else
            <a href="{{ route('cours',$cour->slug)}}">ACCEDER A LA FORMATION</a>
            @endif
        </div>
    </div>
</div>

<div class="form_des_details">
    <div class="details">
        <h2>Détails</h2>
        <p>{!! $cour->description_cours !!} </p>
    </div>
    <div class="programms">
        <h2>Programme du cours</h2>
        @foreach ($episodes as $episode)
        <p><span>Module {{ $loop->index + 1 }} :</span>{{ $episode->title }}</p>
        @endforeach

    </div>
</div>

@endsection
