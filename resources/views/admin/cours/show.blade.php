@extends('partials.admin_layout')
@section('content')

<div style='margin-left: 20px; margin-right: 20px;' class="shadow p-3 mb-5 bg-white rounded">
    <div>
        <div class="row">
            <div class="col-lg-12 margin-tb">
                <div class="pull-left">
                    <h2>{{ GoogleTranslate::trans("Détaille du cours", app()->getLocale()) }} </h2>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>{{ GoogleTranslate::trans("Titre", app()->getLocale()) }}:</strong>
                    {{ GoogleTranslate::trans($cour->title_cours, app()->getLocale()) }}
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>{{ GoogleTranslate::trans("Desciption", app()->getLocale()) }}:</strong>
                    {{ GoogleTranslate::trans($cour->description_cours, app()->getLocale()) }}
                </div>
            </div>
        </div>

    </div>
</div>

@endsection
