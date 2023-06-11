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
                <h6 class="m-0 font-weight-bold text-primary">{{ "Achat du " . $cour->title }}</h6>
                <p class="m-0 font-weight-bold text-primary">TOTAL : {{$achats->sum('montant')}} FCFA</p>

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
                            <th>Transaction ID</th>
                            <th>Nom</th>
                            <th>Prénom</th>
                            <th>Date d'achat</th>
                        </tr>
                    </thead>
                    <tbody id="participants">
                        @if ($achats->count() >0)
                        @foreach ($achats as $achat)
                        <tr>
                            <td>{{ $loop->index + 1 }}</td>
                            <td>{{ $achat->transaction_id }}</td>
                            <td>{{ $achat->user->lastname }}</td>
                            <td>{{ $achat->user->firstname }}</td>
                            <td>{{ date('d-m-Y',strtotime($achat->created_at))}}</td>


                        </tr>
                        @endforeach
                        @else
                        <td colspan="13" style="text-align: center;">Aucun livre dans la bibliothèque</td>
                        @endif

                    <tbody>

                </table>
            </div>
            <div class="float-right mt-3">{{ $achats->links()}}
            </div>
        </div>
    </div>
</div>
</div>
@endsection
