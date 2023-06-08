@extends('partials.admin_layout')
@section('content')

<div style='margin-left: 20px; margin-right: 20px;' class="shadow p-3 mb-5 bg-white rounded">
    <div>
        <div class="row">
            <div class="col-lg-12 margin-tb">
                <div class="pull-left">
                    <h2>{{ GoogleTranslate::trans("Détaille de la formation", app()->getLocale()) }} <b></b>{{ GoogleTranslate::trans($formation->title, app()->getLocale()) }}</h2>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>{{ GoogleTranslate::trans("Titre", app()->getLocale()) }}:</strong>
                    {{ GoogleTranslate::trans($formation->title, app()->getLocale()) }}
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>{{ GoogleTranslate::trans("Catégorie", app()->getLocale()) }}:</strong>
                    {{ GoogleTranslate::trans($formation->type ==1 ? 'Payante' : 'Gratuite', app()->getLocale()) }}
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>{{ GoogleTranslate::trans("Début", app()->getLocale()) }}:</strong>
                    {{ date('d/m/Y',strtotime($formation->debut))}}
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>{{ GoogleTranslate::trans("Fin", app()->getLocale()) }}:</strong>
                    {{ date('d/m/Y',strtotime($formation->fin))}}
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>{{ GoogleTranslate::trans("Lieu", app()->getLocale()) }}:</strong>
                    {{ GoogleTranslate::trans($formation->lieu, app()->getLocale()) }}
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>{{ GoogleTranslate::trans("Heure", app()->getLocale()) }}:</strong>
                    {{$formation->heure}}
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>{{ GoogleTranslate::trans("Prix", app()->getLocale()) }}:</strong>
                    {{$formation->prix}}
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>{{ GoogleTranslate::trans("Lien", app()->getLocale()) }}:</strong>
                     <a target="blank" href="{{$formation->lien}}"> {{$formation->lien}}</a>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>{{ GoogleTranslate::trans("Description", app()->getLocale()) }}:</strong>
                    {!! GoogleTranslate::trans($formation->description, app()->getLocale()) !!}
                </div>
            </div>
        </div>

    </div>
</div>

@endsection
