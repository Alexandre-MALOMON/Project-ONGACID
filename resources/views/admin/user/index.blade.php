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
                <h6 class="m-0 font-weight-bold text-primary">Utilisateurs

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
                            <th>Photo</th>
                            <th>Nom</th>
                            <th>Prénom</th>
                            <th>Rôle</th>
                            <th>Contact</th>
                            <th>E-mail</th>
                            <th width="280px">Action</th>
                        </tr>
                    </thead>
                    <tbody id="participants">
                        @if ($users->count() >0)
                        @foreach ($users as $user)
                        <tr>
                            <td>{{ $loop->index + 1 }}</td>
                            <td><img src="{{ $user->photo }}" alt="" height="70" width="60"></td>
                            <td>{{ $user->lastname }}</td>
                            <td>{{ $user->firstname}}</td>
                            <td>@if ( $user->role == 1)
                                Administrateur
                                @elseif ( $user->role == 2 )
                                Consultant
                                @elseif ( $user->role == 3)
                                Éditeur
                                @endif</td>
                            <td>{{ $user->contact}}</td>
                            <td>{{ $user->email}}</td>
                            <td>


                                <a class="btn btn-success mr-3" data-bs-toggle="modal" data-bs-target="#modalEdit{{$user->id}}">@if ($user->status == 1)
                                    <i class="fas fa-check"></i>
                                    @else
                                    <i class="fas fa-info-circle "></i></a>
                                @endif
                                <a class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#modalDelete{{$user->id}}"><i class="fa fa-trash"></i></a>
                                @include('admin.user.delete')
                                @include('admin.user.edit')
                            </td>


                        </tr>
                        @endforeach
                        @else
                        <td colspan="13" style="text-align: center;">Aucun utilisateur</td>
                        @endif

                    <tbody>

                </table>
            </div>
            <div class="float-right mt-3">{{ $users->links()}}
            </div>
        </div>
    </div>
</div>
</div>


@endsection