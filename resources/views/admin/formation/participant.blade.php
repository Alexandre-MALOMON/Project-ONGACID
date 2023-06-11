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
                <h6 class="m-0 font-weight-bold text-primary">{{ $formation->title }}</h6>
                @if ($formation->type ==1 )
                <p class="m-0 font-weight-bold text-primary">TOTAL : {{$participants->sum('montant')}} FCFA</p>

                @endif
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
                            <th>{{ Transaction ID }}</th>
                            <th>{{ Nom }}</th>
                            <th>{{ Prénom }}</th>
                            <th>{{ contact }}</th>
                            <th>{{ E-mail }}</th>
                            <!--  @if ($formation->type == 1)
                            <th width="280px">{{ Action }}</th>
                            @endif -->
                        </tr>
                    </thead>
                    <tbody id="participants">
                        @if ($participants->count() >0)
                        @foreach ($participants as $participant)
                        <tr>
                            <td>{{ $loop->index + 1 }}</td>
                            <td>{{ $participant->transaction_id }}</td>
                            <td>{{ $participant->nom }}</td>
                            <td>{{ $participant->prenom }}</td>
                            <td>{{ $participant->contact }}</td>
                            <td>{{ $participant->email }}</td>
                            <!--  @if ($formation->type == 1)
                            <td>

                                @if (Auth::user()->role == 1 || Auth::user()->role == 3)
                                @if ($participant->status == 0)
                                <a class="btn btn-warning" title="Deliver Pass" href="{{ route('pass',$participant->id)}}">Délivrer le pass</a>
                                @else
                                <a class="btn btn-success" disabled href="">Délivré</a>
                                @endif
                                @endif

                            </td>
                            @endif -->
                        </tr>
                        @endforeach
                        @else
                        <td colspan="13" style="text-align: center;">{{ Aucun participant }}</td>
                        @endif

                    <tbody>

                </table>
            </div>
            <div class="float-right mt-3">{{ $participants->links()}}
            </div>
        </div>
    </div>
</div>
</div>


@endsection