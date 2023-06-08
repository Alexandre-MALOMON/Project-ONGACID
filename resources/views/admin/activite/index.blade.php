@extends('partials.admin_layout')
@section('content')

<!-- Success message -->
@if (Session::has('success'))
<div class="alert alert-success">
    {{ GoogleTranslate::trans( Session::get('success') , app()->getLocale()) }}
</div>
@endif



<div style='padding-right:25px;padding-left: 25px;'>
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <div style="display: flex;justify-content:space-between;">
                <h6 class="m-0 font-weight-bold text-primary">{{ GoogleTranslate::trans("Activités", app()->getLocale()) }}</h6>


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
                            <th>{{ GoogleTranslate::trans("Catégorie", app()->getLocale()) }}</th>
                            <th>{{ GoogleTranslate::trans("Titre", app()->getLocale()) }}</th>
                            <th>{{ GoogleTranslate::trans("Photo", app()->getLocale()) }}</th>
                            <th>{{ GoogleTranslate::trans("Lieu", app()->getLocale()) }}</th>
                            <th width="280px">{{ GoogleTranslate::trans("Action", app()->getLocale()) }}</th>
                        </tr>
                    </thead>
                    <tbody id="participants">
                        @if ($activitys->count() >0)
                        @foreach ($activitys as $activity)
                        <tr>
                            <td>{{ $loop->index + 1 }}</td>
                            <td>{{ GoogleTranslate::trans($activity->activiteCat->name, app()->getLocale()) }}</td>
                            <td>{{ GoogleTranslate::trans($activity->title, app()->getLocale()) }}</td>
                            <td>@php
                                $decodes = json_decode($activity->photo)

                                @endphp
                                @foreach ($decodes as $de)
                                <img src="{{ $de}}" alt="" height="60" width="50">
                                @endforeach
                            </td>
                            <td>{{ GoogleTranslate::trans($activity->lieu, app()->getLocale()) }}</td>
                            <td>

                                <a class="btn btn-success" title="Voir plus" href="{{ route('activity.show',$activity->id)}}"><i class="fa fa-eye"></i></a>
                                @if (Auth::user()->role == 1 || Auth::user()->role == 3)
                                <a class="btn btn-primary" title="Modifier" href="{{ route('activity.edit',$activity->id)}}"><i class="fa fa-edit"></i></a>
                                @endif
                                @if (Auth::user()->role == 1)
                                <a class="btn btn-danger" title="Supprimer" data-bs-toggle="modal" data-bs-target="#modalDelete{{$activity->id}}"><i class="fa fa-trash"></i></a>
                                @include('admin.activite.delete')
                                @endif
                            </td>


                        </tr>
                        @endforeach
                        @else
                        <td colspan="13" style="text-align: center;">{{ GoogleTranslate::trans("Aucune activité enrégistrée", app()->getLocale()) }}</td>
                        @endif

                    <tbody>

                </table>
            </div>
            <div class="float-right mt-3">{{ $activitys->links()}}
            </div>
        </div>
    </div>
</div>
</div>


@endsection
