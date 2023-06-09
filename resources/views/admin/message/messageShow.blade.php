@extends('partials.admin_layout')
@section('content')

<div style='margin-left: 20px; margin-right: 20px;' class="shadow p-3 mb-5 bg-white rounded">
    <div>
        <div class="row">
            <div class="col-lg-12 margin-tb">
                <div class="pull-left">
                    <h2>{{ GoogleTranslate::trans("Méssage", app()->getLocale()) }} </h2>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>{{ GoogleTranslate::trans("Nom", app()->getLocale()) }}:</strong>
                    {{ GoogleTranslate::trans($message->name, app()->getLocale()) }}
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>{{ GoogleTranslate::trans("E-mail", app()->getLocale()) }}:</strong>
                    {{ GoogleTranslate::trans($message->email, app()->getLocale()) }}
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>{{ GoogleTranslate::trans("Méssage", app()->getLocale()) }}:</strong>
                    {{ GoogleTranslate::trans($message->message, app()->getLocale()) }}
                </div>
            </div>
        </div>


        <button type="submit" class="btn btn-primary"><a href="mailto:{{$message->email}}">{{ GoogleTranslate::trans("Repondre", app()->getLocale()) }}</a></button>

    </div>
</div>

@endsection
