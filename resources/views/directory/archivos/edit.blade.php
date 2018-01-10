@extends('adminlte::layouts.app')

@section('main-content')
{!! Form::model($archivo, [
    'method' => 'PATCH',
    'url' => ['admin/archivos', $archivo->id],
    'class' => 'form-horizontal'
]) !!}

<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">{!! trans('archivos.heading_edit') !!}</div>
                <div class="panel-body">

                    @if ($errors->any())
                        <div class="alert alert-danger">
                            {!! implode('<br>', $errors->all()) !!}
                        </div>
                    @endif

                    <div class="form-group {{ $errors->has('nombre') ? 'has-error' : ''}}">
                        {!! Form::label('nombre', trans('archivos.nombre').': ', ['class' => 'col-sm-3 control-label']) !!}
                        <div class="col-sm-6">
                            {!! Form::text('nombre', null, ['class' => 'form-control']) !!}
                            {!! $errors->first('nombre', '<p class="help-block">:message</p>') !!}
                        </div>
                    </div>
                    <div class="form-group {{ $errors->has('nuevo') ? 'has-error' : ''}}">
                        {!! Form::label('nuevo', trans('archivos.nuevo').': ', ['class' => 'col-sm-3 control-label']) !!}
                        <div class="col-sm-6">
                            {{ Form::select('nuevo', [ 1=>'SI', -1=> 'NO'], null, ['class' => 'form-control']) }}
                            {!! $errors->first('nuevo', '<p class="help-block">:message</p>') !!}
                        </div>
                    </div>
                    <div class="form-group {{ $errors->has('revicion') ? 'has-error' : ''}}">
                        {!! Form::label('revicion', trans('archivos.revicion').': ', ['class' => 'col-sm-3 control-label']) !!}
                        <div class="col-sm-6">
                            {!! Form::text('revicion', null, ['class' => 'form-control']) !!}
                            {!! $errors->first('revicion', '<p class="help-block">:message</p>') !!}
                        </div>
                    </div>
                    <div class="form-group {{ $errors->has('fecha_revicion') ? 'has-error' : ''}}">
                        {!! Form::label('fecha_revicion', trans('archivos.fecha_revicion').': ', ['class' => 'col-sm-3 control-label']) !!}
                        <div class="col-sm-6">
                            {!! Form::date('fecha_revicion', null, ['class' => 'form-control']) !!}
                            {!! $errors->first('fecha_revicion', '<p class="help-block">:message</p>') !!}
                        </div>
                    </div>
                    <div class="form-group {{ $errors->has('mensaje') ? 'has-error' : ''}}">
                        {!! Form::label('mensaje', trans('archivos.mensaje').': ', ['class' => 'col-sm-3 control-label']) !!}
                        <div class="col-sm-6">
                            {!! Form::text('mensaje', null, ['class' => 'form-control']) !!}
                            {!! $errors->first('mensaje', '<p class="help-block">:message</p>') !!}
                        </div>
                    </div>


                    <div class="form-group">
                        <div class="col-sm-offset-3 col-sm-6">
                            <a href="{{ url('admin/archivos') }}" class="btn btn-default">{!! trans('archivos.button_cancel') !!}</a>
                            &nbsp;
                            {!! Form::submit(trans('archivos.button_edit'), ['class' => 'btn btn-primary']) !!}
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>

{!! Form::close() !!}
@endsection