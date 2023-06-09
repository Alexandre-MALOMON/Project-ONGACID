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
                <h6 class="m-0 font-weight-bold text-primary">{{ GoogleTranslate::trans("Bénévolat", app()->getLocale()) }}</h6>
                <a class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalCreate" href="">{{ GoogleTranslate::trans("Nouveau recrutement", app()->getLocale()) }}</a>

            </div>
            @include('admin.benevola.create')
        </div>


        <span id="nblignes"></span>
        <div class="card-body">
            <div class="float-right"></div>
            <div class="table-responsive">
                @foreach ($recrutements as $recrutement)
                <button class="accordion">
                    <div class="section__item-top">
                        <div class="section__item-top-left">
                            <span class="section__item-top-left-num">
                                {{ $loop->index + 1}}
                            </span>
                            <div class="section__item-top-left-periode">
                                <span>Du {{date('d-m-Y',strtotime($recrutement->start) )}}</span>
                                <span>
                                    @if ($recrutement->status == 1)
                                    à Aujourd'hui
                                    @else
                                    Au {{date('d-m-Y',strtotime($recrutement->end))}}
                                    @endif
                                </span>
                            </div>
                            <div class="section__item-top-left-name">
                                {{$recrutement->name}}
                            </div>
                            <div class="section__item-top-left-promotion text-uppercase">
                                {{$recrutement->year}}
                            </div>
                        </div>
                        <div class="section__item-top-right">
                            <span class="section__item-top-right-btn bg-warning" href="#" title="Total inscrit">
                           {{ $recrutement->candidatures->count()}} Candi
                            </span>
                            <a class="section__item-top-right-btn bl" href="#" data-bs-toggle="modal" title="Modifier la section" data-bs-target="#modalEdit{{$recrutement->id}}">
                                <span class="fa fa-pencil"></span>
                            </a>

                            @if ($recrutement->status == 1)
                            <a class="section__item-top-right-btn rd" href="#" data-bs-toggle="modal" title="Fermer la section" data-bs-target="#ModalCloseSection{{$recrutement->id}}">
                                <span class="fa fa-close"></span>
                            </a>
                            @endif

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
                                    <th>{{ GoogleTranslate::trans("Nom", app()->getLocale()) }}</th>
                                    <th>{{ GoogleTranslate::trans("Prénom", app()->getLocale()) }}</th>
                                    <th>{{ GoogleTranslate::trans("E-mail", app()->getLocale()) }}</th>
                                    <th>{{ GoogleTranslate::trans("Contact", app()->getLocale()) }}</th>
                                    <th>{{ GoogleTranslate::trans("Pays", app()->getLocale()) }}</th>
                                    <th>{{ GoogleTranslate::trans("Ville", app()->getLocale()) }}</th>
                                    <th>{{ GoogleTranslate::trans("CV", app()->getLocale()) }}</th>

                                </tr>
                            </thead>
                            <tbody id="participants">

                                @if ($recrutement->candidatures->count() >0)
                                @foreach ($recrutement->candidatures as $candidat)
                                <tr>
                                    <td>{{ $loop->index + 1 }}</td>
                                    <td>{{ GoogleTranslate::trans($candidat->nom, app()->getLocale()) }}</td>
                                    <td>{{ GoogleTranslate::trans($candidat->prenom, app()->getLocale()) }}</td>
                                    <td>{{ GoogleTranslate::trans($candidat->email, app()->getLocale()) }}</td>
                                    <td>{{ GoogleTranslate::trans($candidat->contact, app()->getLocale()) }}</td>
                                    <td>{{ GoogleTranslate::trans($candidat->pays, app()->getLocale()) }}</td>
                                    <td>{{ GoogleTranslate::trans($candidat->ville, app()->getLocale()) }}</td>
                                    <td><a href="{{$candidat->cv}}" target="_blank">{{ GoogleTranslate::trans("Lire", app()->getLocale()) }}</a></td>

                                </tr>
                                @endforeach
                                @else
                                <td colspan="13" style="text-align: center;">{{ GoogleTranslate::trans("Aucun candidat", app()->getLocale()) }}</td>
                                @endif

                            <tbody>

                        </table>
                    </div>
                </div>
                @include('admin.benevola.edit')
                @include('admin.recrutement.close')
                @endforeach
            </div>
            <div class="float-right mt-3">{{ $recrutements->links()}}
            </div>
        </div>
    </div>
</div>
</div>


@endsection
