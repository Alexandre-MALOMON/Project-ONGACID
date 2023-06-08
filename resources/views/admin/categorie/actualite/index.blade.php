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
                <h6 class="m-0 font-weight-bold text-primary">{{ GoogleTranslate::trans("Catégories de publication", app()->getLocale()) }}</h6>
                @if (Auth::user()->role == 1 || Auth::user()->role == 3)
                <a class="btn btn-success" data-bs-toggle="modal" data-bs-target="#exampleModal">{{ GoogleTranslate::trans("Nouvelle catégorie", app()->getLocale()) }}</a>
                @endif
            </div>
            @include('admin.categorie.actualite.create')
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
                            <th>{{ GoogleTranslate::trans("Nombre de publication", app()->getLocale()) }}</th>
                            <th>{{ GoogleTranslate::trans("Description", app()->getLocale()) }}</th>

                            <th width="280px">{{ GoogleTranslate::trans("Action", app()->getLocale()) }}</th>
                        </tr>
                    </thead>
                    <tbody id="participants">
                        @if ($categories->count() >0)


                        @foreach ($categories as $categorie)
                        <tr>
                            <td>{{ $loop->index + 1 }}</td>
                            <td>{{ GoogleTranslate::trans( $categorie->name, app()->getLocale()) }}</td>
                            <td>{{ GoogleTranslate::trans($categorie->publication->count(), app()->getLocale()) }}</td>
                            <td>{{ GoogleTranslate::trans($categorie->description?   $categorie->description :"Pas de description" , app()->getLocale()) }}</td>

                            <td>

                                @if (Auth::user()->role == 1 )
                                <a class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalEdit{{$categorie->id}}"><i class="fa fa-edit"></i></a>
                                <a class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#modalDelete{{$categorie->id}}"><i class="fa fa-trash"></i></a>
                                @include('admin.categorie.actualite.delete')
                                @include('admin.categorie.actualite.edit')
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
            <div class="float-right mt-3">{{ $categories->links()}}
            </div>
        </div>
    </div>
</div>
</div>

@endsection
