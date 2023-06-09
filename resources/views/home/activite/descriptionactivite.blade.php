@extends('partials.website.app')
@section('website_content')

<div class="banner">

</div>

<section class="activite_group_arrow">
    <div class="gallery">
        @php
        $photos = json_decode($activite->photo)
        @endphp
        @foreach ($photos as $photo)
        <img src="{{ $photo}}" alt="Image 1" class="gallery-image">

        @endforeach
    </div>

    <div class="modal-container">
        <div class="modal-content">
            <img src="" alt="" class="modal-image">
            <div class="modal-buttons">
                <div class="button_arrows">
                    <button class="modal-prev-button"><i class="fa-solid fa-chevron-left"></i></button>
                    <button class="modal-next-button"><i class="fa-solid fa-chevron-right"></i></button>
                </div>
            </div>
            <button class="modal-close-button"><i class="fa-solid fa-xmark"></i></button>
        </div>
    </div>
    <button class="modal-close-button"><i class="fa-solid fa-xmark"></i></button>
    </div>
    </div>

    <section class="container_description_activite">
        <div class="description_activite">

            <h2> {{ GoogleTranslate::trans("$activite->title", app()->getLocale()) }}</h2>
            <p> {!! GoogleTranslate::trans("$activite->description", app()->getLocale()) !!}

            </p>
        </div>
    </section>
</section>



@endsection
