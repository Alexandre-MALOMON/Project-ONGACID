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
                <h6 class="m-0 font-weight-bold text-primary">{{ GoogleTranslate::trans("Message", app()->getLocale()) }}</h6>

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
                            <th>{{ GoogleTranslate::trans("E-mail", app()->getLocale()) }}</th>
                            <th>{{ GoogleTranslate::trans("Message", app()->getLocale()) }}</th>

                            <th width="280px">{{ GoogleTranslate::trans("Action", app()->getLocale()) }}</th>
                        </tr>
                    </thead>
                    <tbody id="participants">
                        @if ($contacts->count() >0)


                        @foreach ($contacts as $contact)
                        <tr>
                            <td>{{ $loop->index + 1 }}</td>
                            <td>{{ GoogleTranslate::trans( $contact->name, app()->getLocale()) }}</td>
                            <td>{{ GoogleTranslate::trans($contact->email, app()->getLocale()) }}</td>
                            <td>{{ GoogleTranslate::trans(substr($contact->message,0,200), app()->getLocale()) }}...</td>
                            <td>
                                <a class="btn btn-primary" href="{{ route('message.show',$contact->id)}}"><i class="fa fa-eye"></i></a>
                                <a class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#modalDelete{{$contact->id}}"><i class="fa fa-trash"></i></a>
                            @include('admin.message.delete')
                            </td>


                        </tr>
                        @endforeach
                        @else
                        <td colspan="13" style="text-align: center;">{{ GoogleTranslate::trans("Aucun méssage", app()->getLocale()) }}</td>
                        @endif

                    <tbody>

                </table>
            </div>
            <div class="float-right mt-3">{{ $contacts->links()}}
            </div>
        </div>
    </div>
</div>
</div>

@endsection
