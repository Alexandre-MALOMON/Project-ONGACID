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
            <h6 class="m-0 font-weight-bold text-primary">Don</h6>

        </div>


        <span id="nblignes"></span>
        <div class="card-body">
            <div class="float-right"></div>
            <div class="table-responsive">
                <table class="table table-bordered" class="table table-striped table-dark" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>N°</th>
                            <th>Transaction ID</th>
                            <th>Type de don</th>
                            <th>Nom</th>
                            <th>Prénom</th>
                            <th>E-mail</th>
                            <th>Contact</th>
                            <th>Montant</th>
                        </tr>
                    </thead>
                    <tbody id="participants">
                        @if ($dons->count() >0)
                        @foreach ($dons as $don)
                        <tr>
                            <td>{{ $loop->index + 1 }}</td>
                            <td>{{ $don->transaction_id }}</td>
                            <td>{{ $don->don->name }}</td>
                            <td>{{ $don->lastname }}</td>
                            <td>{{ $don->firstname }}</td>
                            <td>{{ $don->email }}</td>
                            <td>{{ $don->contact }}</td>
                            <td>{{ $don->montant }} Fcfa</td>

                        </tr>
                        @endforeach
                        @else
                        <td colspan="13" style="text-align: center;">Aucun don</td>
                        @endif

                    <tbody>

                </table>
            </div>
            <div class="float-right mt-3">{{ $dons->links()}}
            </div>
        </div>
    </div>
</div>
</div>

@endsection