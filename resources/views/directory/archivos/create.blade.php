@extends('adminlte::layouts.app')

@section('contentheader_title', trans('todo.archiv2s'))
@section('contentheader_description', trans('todo.archiv2s2'))

@section('main-content')
{!! Form::open(['url' => 'admin/archivos', 'class' => 'form-horizontal']) !!}

<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">{!! trans('archivos.heading_create') !!}</div>
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
                    <div class="form-group {{ $errors->has('filesize') ? 'has-error' : ''}}">
                        {!! Form::label('filesize', trans('archivos.filesize').': ', ['class' => 'col-sm-3 control-label']) !!}
                        <div class="col-sm-6">
                            {!! Form::text('filesize', null, ['class' => 'form-control']) !!}
                            {!! $errors->first('filesize', '<p class="help-block">:message</p>') !!}
                        </div>
                    </div>
                    <div class="form-group {{ $errors->has('filemtime') ? 'has-error' : ''}}">
                        {!! Form::label('filemtime', trans('archivos.filemtime').': ', ['class' => 'col-sm-3 control-label']) !!}
                        <div class="col-sm-6">
                            {!! Form::text('filemtime', null, ['class' => 'form-control']) !!}
                            {!! $errors->first('filemtime', '<p class="help-block">:message</p>') !!}
                        </div>
                    </div>
                    <div class="form-group {{ $errors->has('filedate') ? 'has-error' : ''}}">
                        {!! Form::label('filedate', trans('archivos.filedate').': ', ['class' => 'col-sm-3 control-label']) !!}
                        <div class="col-sm-6">
                            {!! Form::text('filedate', null, ['class' => 'form-control']) !!}
                            {!! $errors->first('filedate', '<p class="help-block">:message</p>') !!}
                        </div>
                    </div>
                    <div class="form-group {{ $errors->has('filetype') ? 'has-error' : ''}}">
                        {!! Form::label('filetype', trans('archivos.filetype').': ', ['class' => 'col-sm-3 control-label']) !!}
                        <div class="col-sm-6">
                            {!! Form::text('filetype', null, ['class' => 'form-control']) !!}
                            {!! $errors->first('filetype', '<p class="help-block">:message</p>') !!}
                        </div>
                    </div>
                    <div class="form-group {{ $errors->has('filename') ? 'has-error' : ''}}">
                        {!! Form::label('filename', trans('archivos.filename').': ', ['class' => 'col-sm-3 control-label']) !!}
                        <div class="col-sm-6">
                            {!! Form::text('filename', null, ['class' => 'form-control']) !!}
                            {!! $errors->first('filename', '<p class="help-block">:message</p>') !!}
                        </div>
                    </div>
                    <div class="form-group {{ $errors->has('filename_url') ? 'has-error' : ''}}">
                        {!! Form::label('filename_url', trans('archivos.filename_url').': ', ['class' => 'col-sm-3 control-label']) !!}
                        <div class="col-sm-6">
                            {!! Form::text('filename_url', null, ['class' => 'form-control']) !!}
                            {!! $errors->first('filename_url', '<p class="help-block">:message</p>') !!}
                        </div>
                    </div>
                    <div class="form-group {{ $errors->has('file_deleteURL') ? 'has-error' : ''}}">
                        {!! Form::label('file_deleteURL', trans('archivos.file_deleteURL').': ', ['class' => 'col-sm-3 control-label']) !!}
                        <div class="col-sm-6">
                            {!! Form::text('file_deleteURL', null, ['class' => 'form-control']) !!}
                            {!! $errors->first('file_deleteURL', '<p class="help-block">:message</p>') !!}
                        </div>
                    </div>
                    <div class="form-group {{ $errors->has('email') ? 'has-error' : ''}}">
                        {!! Form::label('email', trans('archivos.email').': ', ['class' => 'col-sm-3 control-label']) !!}
                        <div class="col-sm-6">
                            {!! Form::text('email', null, ['class' => 'form-control']) !!}
                            {!! $errors->first('email', '<p class="help-block">:message</p>') !!}
                        </div>
                    </div>
                    <div class="form-group {{ $errors->has('log_forma') ? 'has-error' : ''}}">
                        {!! Form::label('log_forma', trans('archivos.log_forma').': ', ['class' => 'col-sm-3 control-label']) !!}
                        <div class="col-sm-6">
                            {!! Form::text('log_forma', null, ['class' => 'form-control']) !!}
                            {!! $errors->first('log_forma', '<p class="help-block">:message</p>') !!}
                        </div>
                    </div>
                    <div class="form-group {{ $errors->has('nuevo') ? 'has-error' : ''}}">
                        {!! Form::label('nuevo', trans('archivos.nuevo').': ', ['class' => 'col-sm-3 control-label']) !!}
                        <div class="col-sm-6">
                            {!! Form::text('nuevo', null, ['class' => 'form-control']) !!}
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
                            {!! Form::text('fecha_revicion', null, ['class' => 'form-control']) !!}
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
                            {!! Form::submit(trans('archivos.button_create'), ['class' => 'btn btn-primary']) !!}
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>

{!! Form::close() !!}
@endsection