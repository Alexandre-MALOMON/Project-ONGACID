@extends('partials.admin_layout')
@section('content')

<!-- Success message -->
@if (Session::has('success'))
<div class="alert alert-success">

    {{ GoogleTranslate::trans(Session::get('success'), app()->getLocale()) }}
</div>
@endif



<div style='padding-right:25px;padding-left: 25px;'>
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <div style="display: flex;justify-content:space-between;">
                <h6 class="m-0 font-weight-bold text-primary">{{ GoogleTranslate::trans("Cours", app()->getLocale()) }}</h6>
                <a class="btn btn-primary" href="{{ route('cours.create')}}">{{ GoogleTranslate::trans("Nouveau Cours", app()->getLocale()) }}</a>

            </div>
        </div>


        <span id="nblignes"></span>
        <div class="card-body">
            <div class="float-right"></div>
            <div class="table-responsive">
                @foreach ($cours as $cour)
                <button class="accordion">
                    <div class="section__item-top">
                        <div class="section__item-top-left">
                            <span class="section__item-top-left-num">
                                {{ $loop->index + 1}}
                            </span>
                            <div class="section__item-top-left-periode">
                                <span>{{ GoogleTranslate::trans("$cour->title_cours", app()->getLocale()) }}</span>

                            </div>

                        </div>
                        <div class="section__item-top-right">
                            <a class="section__item-top-right-btn bg-secondary" href="{{route('achatLivre',$cour->slug)}}" title="Total inscrit">
                                {{ GoogleTranslate::trans("Vente", app()->getLocale()) }}
                            </a>
                            <span class="section__item-top-right-btn bg-warning" href="#" title="Total inscrit">
                                {{ $cour->episodes->count()}} {{ GoogleTranslate::trans("Épisodes", app()->getLocale()) }}
                            </span>
                            <a class="section__item-top-right-btn btn bl" title="Modifier la section" href="{{ route('cours.edit',$cour->id)}}">
                                <span class="fa fa-pencil"></span>
                            </a>
                            <a class="section__item-top-right-btn btn btn-success" href="{{ route('cours.show',$cour->id)}}" title="Voir plus">
                                <span class="fa fa-eye"></span>
                            </a>
                            <a class="section__item-top-right-btn btn rd" href="#" data-bs-toggle="modal" title="Supprimer le cours" data-bs-target="#modalDelete{{ $cour->id }}">
                                <span class="fa fa-trash"></span>
                            </a>
                        </div>
                    </div>
                </button>
                <div class="panel">

                    <p></p>
                    <div class="table-responsive">
                        <table class="table table-bordered" class="table table-striped table-dark" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>N°</th>
                                    <th>{{ GoogleTranslate::trans("Titre", app()->getLocale()) }}</th>
                                    <th>{{ GoogleTranslate::trans("Vidéo", app()->getLocale()) }}</th>
                                    <th>{{ GoogleTranslate::trans("Action", app()->getLocale()) }}</th>

                                </tr>
                            </thead>
                            <tbody id="participants">

                                @if ($cour->episodes->count() >0)
                                @foreach ($cour->episodes as $episode)
                                <tr>
                                    <td>{{ $loop->index + 1 }}</td>
                                    <td>{{ GoogleTranslate::trans($episode->title, app()->getLocale()) }}</td>
                                    <td> <video src="{{ $episode->video}}" controls></video> </td>
                                    <td>
                                        <div class="section__item-top-right">
                                            <a class="section__item-top-right-btn bg-warning" href="{{ route('episode.show',$episode->id)}}" title="Modifier la section" data-bs-target="#modalEdit{{$episode->id}}">
                                                <span class="fa fa-eye"></span>
                                            </a>
                                            <a class="section__item-top-right-btn bl" title="Modifier la section" href="{{ route('episode.edit',$episode->id)}}">
                                                <span class="fa fa-pencil"></span>
                                            </a>
                                            <!--  <a class="section__item-top-right-btn btn btn-success" href="#" data-bs-toggle="modal" title="Mofifier l'épisode" >
                                                <span  class="fa fa-edit"></span>
                                            </a> -->
                                            <a class="section__item-top-right-btn rd" href="#" data-bs-toggle="modal" title="Supprimer une épisode" data-bs-target="#ModalDeleteEpisode{{$episode->id}}">
                                                <span class="fa fa-trash"></span>
                                            </a>

                                        </div>
                                    </td>
                                </tr>
                                @include('admin.episode.delete')
                                @endforeach
                                @else
                                <td colspan="13" style="text-align: center;">{{ GoogleTranslate::trans("Aucune épisode", app()->getLocale()) }}</td>
                                @endif

                            <tbody>

                        </table>
                    </div>
                </div>
                @include('admin.cours.delete')
                @endforeach
            </div>
            <div class="float-right mt-3">{{$cours->links()}}
            </div>
        </div>
    </div>
</div>
</div>
@endsection