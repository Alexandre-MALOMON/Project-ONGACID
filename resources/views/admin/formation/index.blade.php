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
                <h6 class="m-0 font-weight-bold text-primary">{{ GoogleTranslate::trans("Agenda de formation", app()->getLocale()) }}</h6>


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
                            <th>{{ GoogleTranslate::trans("Type", app()->getLocale()) }}</th>
                            <th>{{ GoogleTranslate::trans("Titre", app()->getLocale()) }}</th>
                            <th>{{ GoogleTranslate::trans("Début", app()->getLocale()) }}</th>
                            <th>{{ GoogleTranslate::trans("Fin", app()->getLocale()) }}</th>
                            <th>{{ GoogleTranslate::trans("Lieu", app()->getLocale()) }}</th>
                            <th>{{ GoogleTranslate::trans("Heure", app()->getLocale()) }}</th>
                            <th>{{ GoogleTranslate::trans("Prix", app()->getLocale()) }}</th>
                            <th>{{ GoogleTranslate::trans("Lien de la formation", app()->getLocale()) }}</th>
                            <th width="280px">{{ GoogleTranslate::trans("Action", app()->getLocale()) }}</th>
                        </tr>
                    </thead>
                    <tbody id="participants">
                        @if ($formations->count() >0)
                        @foreach ($formations as $formation)
                        <tr>
                            <td>{{ $loop->index + 1 }}</td>
                            <td>{{ GoogleTranslate::trans($formation->type ==1 ? 'Payante' : 'Gratuite', app()->getLocale()) }}</td>
                            <td>{{ GoogleTranslate::trans($formation->title, app()->getLocale()) }}</td>
                            <td>{{ date('d/m/Y',strtotime($formation->debut))}}</td>
                            <td>{{ date('d/m/Y',strtotime($formation->fin))}}</td>
                            <td>{{ GoogleTranslate::trans($formation->lieu, app()->getLocale()) }}</td>
                            <td>{{ $formation->heure }}</td>
                            <td>{{$formation->prix }}</td>
                            <td>
                                @if ($formation->lien)
                                <a target="_blank" href="{{$formation->lien }}"><i class="fa fa-link"></i></a>
                            </td>
                            @else
                            --
                            @endif
                            <td>

                                <a class="btn btn-success" title="Voir plus" href="{{ route('formation.show',$formation->id)}}"><i class="fa fa-eye"></i></a>
                                @if (Auth::user()->role == 1 || Auth::user()->role == 3)
                                <a class="btn btn-primary" href="{{ route('formation.edit',$formation->id)}}"><i class="fa fa-edit"></i></a>
                                <a href="{{ route('participant',$formation->slug)}}" class="btn btn-primary">Participants</a>
                                @endif
                                @if (Auth::user()->role == 1 )
                                <a class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#modalDelete{{$formation->id}}"><i class="fa fa-trash"></i></a>
                                @include('admin.formation.delete')
                                @endif
                            </td>


                        </tr>
                        @endforeach
                        @else
                        <td colspan="13" style="text-align: center;">{{ GoogleTranslate::trans("Aucune formation programmée", app()->getLocale()) }}</td>
                        @endif

                    <tbody>

                </table>
            </div>
            <div class="float-right mt-3">{{ $formations->links()}}
            </div>
        </div>
    </div>
</div>
</div>


@endsection
