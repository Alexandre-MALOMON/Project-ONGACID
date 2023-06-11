@extends('partials.admin_layout')
@section('content')

<!-- Success message -->
@if (Session::has('success'))
<div class="alert alert-success">
    {{  Session::get('success') }}
</div>
@endif



<div style='padding-right:25px;padding-left: 25px;'>
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <div style="display: flex;justify-content:space-between;">
                <h6 class="m-0 font-weight-bold text-primary">Catégories de courCategorys</h6>
                @if (Auth::user()->role == 1 || Auth::user()->role == 3)
                <a class="btn btn-success" data-bs-toggle="modal" data-bs-target="#exampleModal">Nouvelle catégorie</a>
                @endif
            </div>
            @include('admin.categorie.course.create')
        </div>


        <span id="nblignes"></span>
        <div class="card-body">
            <div class="float-right"></div>
            <div class="table-responsive">
                <table class="table table-bordered" class="table table-striped table-dark" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>N°</th>
                            <th>Nom</th>
                            <th>Nombre de cours</th>
                            <th>Description</th>

                            <th width="280px">Action</th>
                        </tr>
                    </thead>
                    <tbody id="participants">
                        @if ($courCategorys->count() > 0)


                        @foreach ($courCategorys as $courCategory)
                        <tr>
                            <td>{{ $loop->index + 1 }}</td>
                            <td>{{  $courCategory->name }}</td>
                            <td>{{ $courCategory->courses->count() }}</td>
                            <td>{{ $courCategory->description?   $courCategory->description :"Pas de description"  }}</td>

                            <td>
                                @if (Auth::user()->role == 1 || Auth::user()->role == 3)

                                <a class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalEdit{{$courCategory->id}}"><i class="fa fa-edit"></i></a>
                                <a class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#modalDelete{{$courCategory->id}}"><i class="fa fa-trash"></i></a>
                                @include('admin.categorie.course.delete')
                                @include('admin.categorie.course.edit')
                                @endif
                            </td>


                        </tr>
                        @endforeach
                        @else
                        <td colspan="13" style="text-align: center;">Aucune catégorie de cours enrégistrée</td>
                        @endif

                    <tbody>

                </table>
            </div>
            <div class="float-right mt-3">{{ $courCategorys->links()}}
            </div>
        </div>
    </div>
</div>
</div>
@endsection
