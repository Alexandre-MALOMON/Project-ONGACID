@extends('partials.admin_layout')
@section('content')

<div style='margin-left: 20px; margin-right: 20px;' class="shadow p-3 mb-5 bg-white rounded">
    <div>
        <div class="row">
            <div class="col-lg-12 margin-tb">
                <div class="pull-left">
                    <h2>{{ GoogleTranslate::trans("Détaille de l'activité", app()->getLocale()) }}</h2>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Titre:</strong>
                    {{ GoogleTranslate::trans("$activity->title", app()->getLocale()) }}
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>{{ GoogleTranslate::trans("Catégorie", app()->getLocale()) }}:</strong>
                    {{ GoogleTranslate::trans($activity->activiteCat->name, app()->getLocale()) }}
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>{{ GoogleTranslate::trans("Lieu", app()->getLocale()) }}:</strong>
                    {{ GoogleTranslate::trans($activity->lieu, app()->getLocale()) }}
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>{{ GoogleTranslate::trans("Photo", app()->getLocale()) }}:</strong>
                    @php
                    $decodes = json_decode($activity->photo)

                    @endphp
                    @foreach ($decodes as $de)
                    <img src="{{ $de}}" alt="" height="60" width="50">
                    @endforeach
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>{{ GoogleTranslate::trans("Description", app()->getLocale()) }}:</strong>
                    {!!GoogleTranslate::trans("$activity->description", app()->getLocale()) !!}
                </div>
            </div>
        </div>

    </div>
</div>

@endsection
