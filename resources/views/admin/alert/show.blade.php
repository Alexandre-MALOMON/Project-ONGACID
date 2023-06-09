@extends('partials.admin_layout')
@section('content')

<div style='margin-left: 20px; margin-right: 20px;' class="shadow p-3 mb-5 bg-white rounded">
    <div>
        <div class="row">
            <div class="col-lg-12 margin-tb">
                <div class="pull-left">
                    <h2>{{ GoogleTranslate::trans("Détaille de l'alerte", app()->getLocale()) }} </h2>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>{{ GoogleTranslate::trans("Nom", app()->getLocale()) }}:</strong>
                    {{ GoogleTranslate::trans($alerte->nom, app()->getLocale()) }}
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>{{ GoogleTranslate::trans("Prénom", app()->getLocale()) }}:</strong>
                    {{ GoogleTranslate::trans($alerte->prenom , app()->getLocale()) }}
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>{{ GoogleTranslate::trans("E-mail", app()->getLocale()) }}:</strong>
                    {{$alerte->email}}
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>{{ GoogleTranslate::trans("Contact", app()->getLocale()) }}:</strong>
                    {{ $alerte->email}}
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>{{ GoogleTranslate::trans("Alerte", app()->getLocale()) }}:</strong>
                    {{ GoogleTranslate::trans($alerte->message, app()->getLocale()) }}
                </div>
            </div>
        </div>

    </div>
</div>

@endsection
