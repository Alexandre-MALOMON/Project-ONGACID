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
            <h6 class="m-0 font-weight-bold text-primary">Alerte</h6>

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
                            <th>Prénom</th>
                            <th>E-mail</th>
                            <th>Contact</th>

                            <th width="280px">Action</th>
                        </tr>
                    </thead>
                    <tbody id="participants">
                        @if ($alertes->count() >0)


                        @foreach ($alertes as $alerte)
                        <tr>
                            <td>{{ $loop->index + 1 }}</td>
                            <td>{{  $alerte->nom }}</td>
                            <td>{{ $alerte->prenom }}</td>
                            <td>{{ $alerte->email }}</td>
                            <td>{{ $alerte->contact }}</td>

                            <td>
                                <a class="btn btn-primary" href="{{ route('alert.show',$alerte->id)}}"><i class="fa fa-eye"></i></a>
                            </td>

                        </tr>
                        @endforeach
                        @else
                        <td colspan="13" style="text-align: center;">Aucune alerte</td>
                        @endif

                    <tbody>

                </table>
            </div>
            <div class="float-right mt-3">{{ $alertes->links()}}
            </div>
        </div>
    </div>
</div>
</div>

@endsection