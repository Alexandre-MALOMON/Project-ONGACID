@extends('partials.website.app')
@section('website_content')

<section class="section_dashboard">
    <h2>{{ GoogleTranslate::trans("Mes formations", app()->getLocale()) }}</h2>
    <table>
        <thead>
            <tr>
                <th class="start">{{ GoogleTranslate::trans("Formations", app()->getLocale()) }}</th>
                <th>{{ GoogleTranslate::trans("Inscription", app()->getLocale()) }}</th>
                <th>{{ GoogleTranslate::trans("Progression", app()->getLocale()) }}</th>
                <th>{{ GoogleTranslate::trans("Certificat", app()->getLocale()) }}</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($courCompletes as $courComplete)
            @foreach ($courComplete->cours as $cour)

            <tr>
                <td class="start" data-label="Formations">{{ GoogleTranslate::trans($cour->title_cours, app()->getLocale()) }}</td>
                <td data-label="Inscription">{{date('d/m/Y',strtotime($courComplete->created_at))}}</td>
                <td data-label="Progression">{{($episodes->where("cour_id",$cour->id)->where("user_id",Auth::user()->id)->count()/$cour->completeds->count())* 100}}</td>
                <td data-label="Certificat">{{ GoogleTranslate::trans("En cours", app()->getLocale()) }}</td>
            </tr>
            @endforeach
            @endforeach
        </tbody>
    </table>
</section>
@endsection
