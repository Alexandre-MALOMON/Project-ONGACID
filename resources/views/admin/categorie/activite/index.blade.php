@extends('partials.admin_layout')
@section('content')

<!-- Success message -->
@if (Session::has('success'))
<div class="alert alert-success">
    {{ GoogleTranslate::trans( Session::get('success'), app()->getLocale()) }}
</div>
@endif

<div style='padding-right:25px;padding-left: 25px;'>
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <div style="display: flex;justify-content:space-between;">
                <h6 class="m-0 font-weight-bold text-primary">{{ GoogleTranslate::trans("Catégories d'activité", app()->getLocale()) }}</h6>
                @if (Auth::user()->role == 1 || Auth::user()->role == 3)
                <a class="btn btn-success" data-bs-toggle="modal" data-bs-target="#exampleModal">{{ GoogleTranslate::trans("Nouvelle catégorie", app()->getLocale()) }}</a>
                @endif
            </div>
            @include('admin.categorie.activite.create')
        </div>


        <span id="nblignes"></span>
        <div class="card-body">
            <div class="float-right"></div>
            <div class="table-responsive">
                <table class="table table-bordered" class="table table-striped table-dark" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>N°</th>
                            <th>{{ GoogleTranslate::trans("Nom", app()->getLocale()) }}</th>
                            <th>{{ GoogleTranslate::trans("Nombre d'activité", app()->getLocale()) }}</th>
                            <th>{{ GoogleTranslate::trans("Description", app()->getLocale()) }}</th>

                            <th width="280px">{{ GoogleTranslate::trans("Action", app()->getLocale()) }}</th>
                        </tr>
                    </thead>
                    <tbody id="participants">
                        @if ($activites->count() >0)


                        @foreach ($activites as $activite)
                        <tr>
                            <td>{{ $loop->index + 1 }}</td>
                            <td>{{ GoogleTranslate::trans( $activite->name, app()->getLocale()) }}</td>
                            <td>{{ GoogleTranslate::trans($activite->activite->count(), app()->getLocale()) }}</td>
                            <td>{{ GoogleTranslate::trans($activite->description?   $activite->description :"Pas de description" , app()->getLocale()) }}</td>

                            <td>

                                @if (Auth::user()->role == 1 )
                                <a class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalEdit{{$activite->id}}"><i class="fa fa-edit"></i></a>
                                <a class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#modalDelete{{$activite->id}}"><i class="fa fa-trash"></i></a>
                                @include('admin.categorie.activite.delete')
                                @include('admin.categorie.activite.edit')
                                @endif

                            </td>


                        </tr>
                        @endforeach
                        @else
                        <td colspan="13" style="text-align: center;">{{ GoogleTranslate::trans("Aucune catégorie enrégistrée", app()->getLocale()) }}</td>
                        @endif

                    <tbody>

                </table>
            </div>
            <div class="float-right mt-3">{{ $activites->links()}}
            </div>
        </div>
    </div>
</div>
</div>

@endsection
