@extends('partials.website.app')
@section('website_content')

<div class="cours_banner">
    <h2> {{ $cour->title_cours }}</h2>
    <div class="cours_icone_banner">
        <span><i class="fa-regular fa-clock"></i></span>
        <p>{{$cour->heure}} heures</p>
    </div>
</div>

<section class="smartwizard_section">
    <div id="smartwizard">
        <ul class="nav nav-progress">
            @foreach ($episodes as $episode)
            <li class="nav-item">
                <a class="nav-link" href="?episode={{ $episode->slug }}">
                    <div class="num">{{ $loop->index + 1 }}</div>
                    {{ $episode->title }}
                </a>
            </li>
            @endforeach
        </ul>

        <div class="tab-content">
            @foreach ($episodes as $episode)
            <div id="step-{{ $loop->index + 1 }}?episode={{$episode->slug}}" class="tab-pane" role="tabpanel" aria-labelledby="step-{{ $loop->index + 1 }}">
                <div class="tab_video">
                    <video src="{{ $episode->video }}" controls></video>
                </div>
                <div class="tab_text">
                    {!! $episode->description !!}
                </div>
            </div>
            @endforeach

        </div>
        <div class="btn_group">
            <button class="btn-prev">Précédent</button>
            <div>
                <form action="{{ route('completide',request()->get('episode'))}}" id="form-js" method="post">
                    @csrf
                    <input type="hidden" name="episode" value="{{request()->get('episode')}}">
                    <button type="submit" class="btn-next">Suivant</button>
                </form>
            </div>



        </div>
    </div>
</section>
<script>
    const forms = document.querySelectorAll('#form-js');

    forms.forEach(form => {
        form.addEventListener('submit', function(e) {
            e.preventDefault();
            var str = document.location.href;
            var urls = new URL(str);
            var episode = urls.searchParams.get("episode");
            const url = this.getAttribute('action');
            const token = document.querySelector('meta[name="csrf-token"]').content;
            var body = {
                episode: episode
            }

            fetch(url, {
                headers: {
                    "Accept": "application/json",
                    'Content-type': 'application/json',
                    'X-CSRF-TOKEN': token
                },

                method: 'post',
                body: JSON.stringify(body)
            }).then(response => {
                //console.log(response,body);
            }).catch(error => {
                console.log(error)

            });

        });
    });
</script>
@endsection
