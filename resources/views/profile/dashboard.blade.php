@extends('partials.website.app')
@section('website_content')

<section class="section_dashboard">
    <h2>Mes formations</h2>
    <table>
        <thead>
            <tr>
                <th class="start">Formations</th>
                <th>Inscription</th>
                <th>Progression</th>
                <th>Certificat</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($courCompletes as $courComplete)
            @foreach ($courComplete->cours as $cour)

            <tr>
                <td class="start" data-label="Formations">{{$cour->title_cours}}</td>
                <td data-label="Inscription">{{date('d/m/Y',strtotime($courComplete->created_at))}}</td>
                <td data-label="Progression">{{$episodes->where("cour_id",$cour->id)->where("user_id",Auth::user()->id)->count()}} {{$completions->where('episode_id','')}}</td>
                <td data-label="Certificat">En cours</td>
            </tr>
            @endforeach
            @endforeach
        </tbody>
    </table>
</section>
@endsection
