@extends('partials.admin_layout')
@section('content')

<div style='margin-left: 20px; margin-right: 20px;' class="shadow p-3 mb-5 bg-white rounded">
    <div>
        <div class="row">
            <div class="col-lg-12 margin-tb">
                <div class="pull-left">
                    <h2>{{ GoogleTranslate::trans("Détaille de la publication" , app()->getLocale()) }} </h2>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>{{ GoogleTranslate::trans("Titre", app()->getLocale()) }}:</strong>
                    {{ GoogleTranslate::trans($new->title, app()->getLocale()) }}
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>{{ GoogleTranslate::trans("Catégorie", app()->getLocale()) }}:</strong>
                    {{ GoogleTranslate::trans($new->pub->name, app()->getLocale()) }}
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>{{ GoogleTranslate::trans("Photo", app()->getLocale()) }}:</strong>
                    <td><img src="{{ $new->photo}}" alt="" height="300" width="300"></td>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>{{ GoogleTranslate::trans("Description", app()->getLocale()) }}:</strong>
                   {!! GoogleTranslate::trans($new->description, app()->getLocale()) !!}
                </div>
            </div>
        </div>

    </div>
</div>

@endsection