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
                <h6 class="m-0 font-weight-bold text-primary">{{ GoogleTranslate::trans("Bibliothèque", app()->getLocale()) }}</h6>


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
                            <th>{{ GoogleTranslate::trans("Auteur", app()->getLocale()) }}</th>
                            <th>{{ GoogleTranslate::trans("Type de document", app()->getLocale()) }}</th>
                            <th>{{ GoogleTranslate::trans("Prix ", app()->getLocale()) }}</th>
                            <th>{{ GoogleTranslate::trans("Lien d'achat", app()->getLocale()) }}</th>
                            <th>{{ GoogleTranslate::trans("Téléchargement", app()->getLocale()) }}</th>

                            <th width="280px">{{ GoogleTranslate::trans("Action", app()->getLocale()) }}</th>
                        </tr>
                    </thead>
                    <tbody id="participants">
                        @if ($books->count() >0)
                        @foreach ($books as $book)
                        <tr>
                            <td>{{ $loop->index + 1 }}</td>
                            <td>{{ GoogleTranslate::trans($book->bookcategory->name, app()->getLocale()) }}</td>
                            <td>{{ GoogleTranslate::trans($book->title, app()->getLocale()) }}</td>
                            <td><img src="{{ $book->photo}}" alt="" height="60" width="50"></td>
                            <td>{{ $book->auteur}}</td>
                            <td>{{ GoogleTranslate::trans($book->type ==1 ? "Payant" : "Gratuit", app()->getLocale()) }}</td>
                            <td>{{ $book->prix}}</td>
                            <td>@if ( $book->lien )
                                <a target="_blank" href="{{ $book->lien}}"><i class="fa fa-link"></i></a>
                                @else
                                -
                                @endif
                            </td>
                            <td>{{ GoogleTranslate::trans($book->telechargement!= null ? $book->telechargement : 0, app()->getLocale()) }}</td>

                            <td>

                                <a class="btn btn-success mb-4" title="Voir plus" href="{{ route('book.show',$book->id)}}"><i class="fa fa-eye"></i></a>
                                @if (Auth::user()->role == 1 || Auth::user()->role == 3)
                                <a class="btn btn-primary mb-4" title="Modifier" href="{{ route('book.edit',$book->id)}}"><i class="fa fa-edit"></i></a>
                                @endif
                                @if (Auth::user()->role == 1)
                                <a class="btn btn-danger mb-4" title="Supprimer" data-bs-toggle="modal" data-bs-target="#modalDelete{{$book->id}}"><i class="fa fa-trash"></i></a>
                                @include('admin.livres.delete')
                                @endif
                                <a class="btn btn-warning" href="{{ route('achat',$book->slug)}}">{{ GoogleTranslate::trans("Achat", app()->getLocale()) }}</a>
                            </td>


                        </tr>
                        @endforeach
                        @else
                        <td colspan="13" style="text-align: center;">{{ GoogleTranslate::trans("Aucun livre dans la bibliothèque", app()->getLocale()) }}</td>
                        @endif

                    <tbody>

                </table>
            </div>
            <div class="float-right mt-3">{{ $books->links()}}
            </div>
        </div>
    </div>
</div>
</div>
@endsection
