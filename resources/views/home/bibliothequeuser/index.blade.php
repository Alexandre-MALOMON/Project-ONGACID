@extends('partials.website.app')
@section('website_content')

<section class="section_dashboard">
    <h2>Ma bibliothèque</h2>
    <table>
        <thead>
            <tr>
                <th class="start">Titre du lire</th>
                <th>Prix</th>
                <th>Auteur</th>
                <th>Livre</th>
                <th>Date achat</th>
            </tr>
        </thead>
        <tbody>
            @if ($biblioUsers->count() > 0)
            @foreach ($biblioUsers as $biblioUser)

            <tr>
                <td class="start" data-label="Formations">{{$biblioUser->book->title}} </td>
                <td class="start" data-label="Formations">{{$biblioUser->book->prix}} FCFA</td>
                <td class="start" data-label="Formations">{{$biblioUser->book->auteur}} </td>
                <td class="start" data-label="Formations"><a class="btn btn-success" href="{{ route('showboooks',$biblioUser->book->slug)}}">Lire</a></td>
                <td class="start" data-label="Formations">{{date('d/m/Y',strtotime($biblioUser->created_at))}}</td>
                <!-- <td data-label="Progression"></td>
                <td data-label="Certificat">En cours</td> -->
            </tr>

            @endforeach
            @else
                <td colspan="5">Aucun livre</td>
            @endif
        </tbody>
    </table>
</section>
@endsection