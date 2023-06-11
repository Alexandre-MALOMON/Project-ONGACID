@extends('partials.admin_layout')
@section('content')

<!-- Success message -->
@if (Session::has('success'))
<div class="alert alert-success">
    {{ Session::get('success') }}
</div>
@endif



<div style='padding-right:25px;padding-left: 25px;'>
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <div style="display: flex;justify-content:space-between;">
                <h6 class="m-0 font-weight-bold text-primary">Publication</h6>


            </div>
        </div>


        <span id="nblignes"></span>
        <div class="card-body">
            <div class="float-right"></div>
            <div class="table-responsive">
                <table class="table table-bordered" class="table table-striped table-dark" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>N°</th>
                            <th>Titre</th>
                            <th>Catégorie</th>
                            <th>Photo</th>
                            <th width="280px">Action</th>
                        </tr>
                    </thead>
                    <tbody id="participants">
                        @if ($news->count() >0)
                        @foreach ($news as $new)
                        <tr>
                            <td>{{ $loop->index + 1 }}</td>
                            <td>{{ $new->title }}</td>
                            <td>{{ $new->pub->name }}</td>
                            <td><img src="{{ $new->photo}}" alt="" height="60" width="50"></td>

                            <td>
                                @if (Auth::user()->role == 1 || Auth::user()->role == 3)
                                <a class="btn btn-success" title="Voir plus" href="{{ route('new.show',$new->id)}}"><i class="fa fa-eye"></i></a>
                                @endif
                                @if (Auth::user()->role == 1 )
                                <a class="btn btn-primary" title="Modifier" href="{{ route('new.edit',$new->id)}}"><i class="fa fa-edit"></i></a>
                                <a class="btn btn-danger" title="Supprimer" data-bs-toggle="modal" data-bs-target="#modalDelete{{$new->id}}"><i class="fa fa-trash"></i></a>
                                @include('admin.news.delete')
                                @endif
                            </td>


                        </tr>
                        @endforeach
                        @else
                        <td colspan="13" style="text-align: center;">Aucune publication</td>
                        @endif

                    <tbody>

                </table>
            </div>
            <div class="float-right mt-3">{{ $news->links()}}
            </div>
        </div>
    </div>
</div>
</div>


@endsection
