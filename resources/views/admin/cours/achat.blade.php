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
                <h6 class="m-0 font-weight-bold text-primary">{{ GoogleTranslate::trans("Achat du " . $cour->title, app()->getLocale()) }}</h6>
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
                            <th>{{ GoogleTranslate::trans("Transaction ID", app()->getLocale()) }}</th>
                            <th>{{ GoogleTranslate::trans("Nom", app()->getLocale()) }}</th>
                            <th>{{ GoogleTranslate::trans("Prénom", app()->getLocale()) }}</th>
                            <th>{{ GoogleTranslate::trans("Date d'achat", app()->getLocale()) }}</th>
                        </tr>
                    </thead>
                    <tbody id="participants">
                        @if ($achats->count() >0)
                        @foreach ($achats as $achat)
                        <tr>
                            <td>{{ $loop->index + 1 }}</td>
                            <td>{{ GoogleTranslate::trans($achat->transaction_id, app()->getLocale()) }}</td>
                            <td>{{ GoogleTranslate::trans($achat->user->lastname, app()->getLocale()) }}</td>
                            <td>{{ GoogleTranslate::trans($achat->user->firstname, app()->getLocale()) }}</td>
                            <td>{{ date('d-m-Y',strtotime($achat->created_at))}}</td>


                        </tr>
                        @endforeach
                        @else
                        <td colspan="13" style="text-align: center;">{{ GoogleTranslate::trans("Aucun livre dans la bibliothèque", app()->getLocale()) }}</td>
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
