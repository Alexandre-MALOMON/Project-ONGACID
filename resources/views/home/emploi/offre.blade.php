@extends('partials.website.app')
@section('website_content')
<div class="offre_banner">
         <h1>NOS OFFRES D'EMPLOI</h1>
</div>


<div class="offre_container">
    <div class="offre_group">
        <a href="{{ route('offredemploi')}}">
            <div class="offre_card">
                <p>RECRUTEMENT</p>
            </div>
        </a>
        <a href="{{ route('volontariat')}}">
            <div class="offre_card">
                <p>VOLONTARIAT</p>
            </div>
        </a>
    </div>
</div>


@endsection
