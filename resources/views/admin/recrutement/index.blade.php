@extends('partials.admin_layout')
@section('content')

<!-- Success message -->
@if (Session::has('success'))
<div class="alert alert-success">

    {{ Session::get('success')}}
</div>
@endif



<div style='padding-right:25px;padding-left: 25px;'>
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <div style="display: flex;justify-content:space-between;">
                <h6 class="m-0 font-weight-bold text-primary">Recrutement</h6>
                <a class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalCreate" href="">Nouveau recrutement</a>

            </div>
            @include('admin.recrutement.create')
        </div>


        <span id="nblignes"></span>
        <div class="card-body">
            <div class="float-right"></div>
            <div class="table-responsive">
                @foreach ($recrutements as $recrutement)
                <button class="accordion">
                    <div class="section__item-top">
                        <div class="section__item-top-left">
                            <span class="section__item-top-left-num">
                                {{ $loop->index + 1}}
                            </span>
                            <div class="section__item-top-left-periode">
                                <span>Du {{date('d-m-Y',strtotime($recrutement->start) )}}</span>
                                <span>
                                    @if ($recrutement->status == 1)
                                    à Aujourd'hui
                                    @else
                                    Au {{date('d-m-Y',strtotime($recrutement->end))}}
                                    @endif
                                </span>
                            </div>
                            <div class="section__item-top-left-name">
                                {{$recrutement->name}}
                            </div>
                            <div class="section__item-top-left-promotion text-uppercase">
                                {{$recrutement->year}}
                            </div>
                        </div>
                        <div class="section__item-top-right">
                            <span class="section__item-top-right-btn bg-warning" href="#" title="Total inscrit">
                            {{ $recrutement->candidatures->count()}} Candi
                            </span>
                            <a class="section__item-top-right-btn bl" href="#" data-bs-toggle="modal" title="Modifier la section" data-bs-target="#modalEdit{{$recrutement->id}}">
                                <span class="fa fa-pencil"></span>
                            </a>

                            @if ($recrutement->status == 1)
                            <a class="section__item-top-right-btn rd" href="#" data-bs-toggle="modal" title="Fermer la section" data-bs-target="#ModalCloseSection{{$recrutement->id}}">
                                <span class="fa fa-close"></span>
                            </a>
                            @endif

                        </div>
                    </div>
                </button>
                <div class="panel">

                    <p></p>
                    <div class="table-responsive">
                        <table class="table table-bordered" class="table table-striped table-dark" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>N°</th>
                                    <th>Nom</th>
                                    <th>Prénom</th>
                                    <th>E-mail</th>
                                    <th>Contact</th>
                                    <th>Pays</th>
                                    <th>Ville</th>
                                    <th>Cv</th>
                                    <th>Lettre</th>
                                    <th>Diplome</th>

                                </tr>
                            </thead>
                            <tbody id="participants">

                                @if ($recrutement->candidatures->count() >0)
                                @foreach ($recrutement->candidatures as $candidat)
                                <tr>
                                    <td>{{ $loop->index + 1 }}</td>
                                    <td>{{ $candidat->nom }}</td>
                                    <td>{{ $candidat->prenom }}</td>
                                    <td>{{ $candidat->email }}</td>
                                    <td>{{ $candidat->contact }}</td>
                                    <td>{{ $candidat->pays }}</td>
                                    <td>{{ $candidat->ville }}</td>
                                    <td><a href="{{$candidat->cv}}" target="_blank">Lire</a></td>
                                    <td><a href="{{$candidat->lettre}}" target="_blank">Lire</a></td>
                                    <td>
                                        @php
                                            $diplomes = json_decode($candidat->diplome)
                                        @endphp
                                        @foreach ($diplomes as $diplome)

                                        <a href="{{$diplome}}" target="_blank">Lire</a>
                                        @endforeach
                                    </td>

                                </tr>
                                @endforeach
                                @else
                                <td colspan="13" style="text-align: center;">Aucun candidat</td>
                                @endif

                            <tbody>

                        </table>
                    </div>
                </div>
                @include('admin.recrutement.edit')
                @include('admin.recrutement.close')
                @endforeach
            </div>
            <div class="float-right mt-3">{{ $recrutements->links()}}
            </div>
        </div>
    </div>
</div>
</div>


@endsection
