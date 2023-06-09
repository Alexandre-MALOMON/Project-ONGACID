@extends('partials.admin_layout')
@section('content')

<div style='margin-left: 20px; margin-right: 20px;' class="shadow p-3 mb-5 bg-white rounded">
    <div>
        <div class="row">
            <div class="col-lg-12 margin-tb">
                <div class="pull-left">
                    <h2>{{ GoogleTranslate::trans("Détaille du livre", app()->getLocale()) }} <b></b>{{ GoogleTranslate::trans($book->title, app()->getLocale()) }}</h2>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>{{ GoogleTranslate::trans("Titre", app()->getLocale()) }}:</strong>
                    {{ GoogleTranslate::trans($book->title, app()->getLocale()) }}
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>{{ GoogleTranslate::trans("Catégorie", app()->getLocale()) }}:</strong>
                    {{ GoogleTranslate::trans($book->bookcategory->name, app()->getLocale()) }}
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>{{ GoogleTranslate::trans("Auteur", app()->getLocale()) }}:</strong>
                    {{ GoogleTranslate::trans($book->auteur, app()->getLocale()) }}
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>{{ GoogleTranslate::trans("Photo", app()->getLocale()) }}:</strong>
                   <img src="{{$book->photo}}" height="300" width="300" alt="">
                </div>
            </div>
        </div>
        <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>{{ GoogleTranslate::trans("Type", app()->getLocale()) }}:</strong>
                        {{ GoogleTranslate::trans($book->type ==1 ? "Payant" : "Gratuit", app()->getLocale()) }}
                    </div>
                </div>
        </div>
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>{{ GoogleTranslate::trans("Téléchargement", app()->getLocale()) }}:</strong>
                       {{$book->telechargement}}
                    </div>
            </div>
        </div>
        <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>{{ GoogleTranslate::trans("Description", app()->getLocale()) }}:</strong>
                        {!! GoogleTranslate::trans($book->description, app()->getLocale()) !!}
                    </div>
                </div>
        </div>

    </div>
</div>

@endsection
