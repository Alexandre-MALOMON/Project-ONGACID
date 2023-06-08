@extends('partials.website.app')
@section('website_content')

<div class="form_des_banner">
    <div class="form_des_container">
        <div class="form_des_text">
            <p>{{ GoogleTranslate::trans($cour->category->name, app()->getLocale()) }}</p>
            <h2>{{ GoogleTranslate::trans($cour->title_cours, app()->getLocale()) }}</h2>
            <div class="form_des_icone">
                <div class="icone_items">
                    <span><i class="fa-solid fa-graduation-cap"></i></span>
                    <h5>
                        @if ($cour->type == 1)
                        {{ GoogleTranslate::trans("Payante", app()->getLocale()) }}
                        @else
                        {{ GoogleTranslate::trans("Gratuite", app()->getLocale()) }}
                        @endif
                    </h5>
                </div>
                <div class="icone_items">
                    <span><i class="fa-regular fa-clock"></i></span>
                    <h5>{{$cour->heure}} {{ GoogleTranslate::trans("heures", app()->getLocale()) }}</h5>
                </div>
                <div class="icone_items">
                    <span><i class="fa-solid fa-award"></i></span>
                    <h5>{{ GoogleTranslate::trans("Certificat gratuite", app()->getLocale()) }}</h5>
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
            <a  href="{{ route('cours',$cour->slug)}}">{{ GoogleTranslate::trans("ACCEDER A LA FORMATION", app()->getLocale()) }}</a>


            @endif
            @else

            <a  id="cour" href="{{ route('courtransaction',$cour->slug)}}">{{ GoogleTranslate::trans("Payer le cour", app()->getLocale()) }}</a>

            @endif

            @else
            <a href="{{ route('cours',$cour->slug)}}">{{ GoogleTranslate::trans("ACCEDER A LA FORMATION", app()->getLocale()) }}</a>
            @endif
        </div>
    </div>
</div>

<div class="form_des_details">
    <div class="details">
        <h2>{{ GoogleTranslate::trans("Détails", app()->getLocale()) }}</h2>
        <p>{!! GoogleTranslate::trans($cour->description_cours, app()->getLocale()) !!} </p>
    </div>
    <div class="programms">
        <h2>{{ GoogleTranslate::trans("Programme du cours", app()->getLocale()) }}</h2>
        @foreach ($episodes as $episode)
        <p><span>{{ GoogleTranslate::trans("Module", app()->getLocale()) }} {{ $loop->index + 1 }} :</span>{{ GoogleTranslate::trans($episode->title, app()->getLocale()) }}</p>
        @endforeach

    </div>
</div>

@endsection
