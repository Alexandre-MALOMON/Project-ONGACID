@extends('partials.admin_layout')
@section('content')

<!-- Success message -->
@if (Session::has('success'))
<div class="alert alert-success">
    {{ GoogleTranslate::trans( Session::get('success'), app()->getLocale()) }}
</div>
@endif

<div style='padding-right:25px;padding-left: 25px;'>
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">{{ GoogleTranslate::trans("Alerte", app()->getLocale()) }}</h6>

        </div>


        <span id="nblignes"></span>
        <div class="card-body">
            <div class="float-right"></div>
            <div class="table-responsive">
                <table class="table table-bordered" class="table table-striped table-dark" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>N°</th>
                            <th>{{ GoogleTranslate::trans("Nom", app()->getLocale()) }}</th>
                            <th>{{ GoogleTranslate::trans("Prénom", app()->getLocale()) }}</th>
                            <th>{{ GoogleTranslate::trans("E-mail", app()->getLocale()) }}</th>
                            <th>{{ GoogleTranslate::trans("Contact", app()->getLocale()) }}</th>

                            <th width="280px">{{ GoogleTranslate::trans("Action", app()->getLocale()) }}</th>
                        </tr>
                    </thead>
                    <tbody id="participants">
                        @if ($alertes->count() >0)


                        @foreach ($alertes as $alerte)
                        <tr>
                            <td>{{ $loop->index + 1 }}</td>
                            <td>{{ GoogleTranslate::trans( $alerte->nom, app()->getLocale()) }}</td>
                            <td>{{ GoogleTranslate::trans($alerte->prenom, app()->getLocale()) }}</td>
                            <td>{{ GoogleTranslate::trans($alerte->email, app()->getLocale()) }}</td>
                            <td>{{ GoogleTranslate::trans($alerte->contact, app()->getLocale()) }}</td>

                            <td>
                                <a class="btn btn-primary" href="{{ route('alert.show',$alerte->id)}}" ><i class="fa fa-eye"></i></a>
                            </td>

                        </tr>
                        @endforeach
                        @else
                        <td colspan="13" style="text-align: center;">{{ GoogleTranslate::trans("Aucune alerte", app()->getLocale()) }}</td>
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
