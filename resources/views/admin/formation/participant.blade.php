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
                <h6 class="m-0 font-weight-bold text-primary">{{ GoogleTranslate::trans($formation->title, app()->getLocale()) }}</h6>
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
                            <th>{{ GoogleTranslate::trans("Transaction ID", app()->getLocale()) }}</th>
                            <th>{{ GoogleTranslate::trans("Nom", app()->getLocale()) }}</th>
                            <th>{{ GoogleTranslate::trans("Prénom", app()->getLocale()) }}</th>
                            <th>{{ GoogleTranslate::trans("contact", app()->getLocale()) }}</th>
                            <th>{{ GoogleTranslate::trans("E-mail", app()->getLocale()) }}</th>
                            <!--  @if ($formation->type == 1)
                            <th width="280px">{{ GoogleTranslate::trans("Action", app()->getLocale()) }}</th>
                            @endif -->
                        </tr>
                    </thead>
                    <tbody id="participants">
                        @if ($participants->count() >0)
                        @foreach ($participants as $participant)
                        <tr>
                            <td>{{ $loop->index + 1 }}</td>
                            <td>{{ GoogleTranslate::trans($participant->transaction_id, app()->getLocale()) }}</td>
                            <td>{{ GoogleTranslate::trans($participant->nom, app()->getLocale()) }}</td>
                            <td>{{ GoogleTranslate::trans($participant->prenom, app()->getLocale()) }}</td>
                            <td>{{ GoogleTranslate::trans($participant->contact, app()->getLocale()) }}</td>
                            <td>{{ GoogleTranslate::trans($participant->email, app()->getLocale()) }}</td>
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
                        <td colspan="13" style="text-align: center;">{{ GoogleTranslate::trans("Aucun participant", app()->getLocale()) }}</td>
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