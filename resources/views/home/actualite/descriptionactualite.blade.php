@extends('partials.website.app')
@section('website_content')

    <div class="banner">

    </div>

    <section class="container_description">
        <div class="description">
            <img src="{{ $actualite->photo }}" height="550px" style="object-fit: fill;" alt="">
            <h2>{{ GoogleTranslate::trans("$actualite->title", app()->getLocale()) }}</h2>
            <p>{!! GoogleTranslate::trans("$actualite->description", app()->getLocale()) !!}</p>

               <!--  <img src="{{ asset('images/img-2.jpg') }}" alt="">
                <img src="{{ asset('images/img-2.jpg') }}" alt=""> -->
        </div>
    </section>

  @endsection
