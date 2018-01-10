@extends('adminlte::layouts.app')
@section('contentheader_title', trans('todo.usuf2s'))
@section('contentheader_description', trans('todo.creusuf2s2'))
@section('main-content')
{!! Form::open(['url' => 'admin/usuario', 'class' => 'form-horizontal']) !!}

<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">{!! trans('usuario.heading_create') !!}</div>
                <div class="panel-body">
    
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            {!! implode('<br>', $errors->all()) !!}
                        </div>
                    @endif

                    <div class="form-group {{ $errors->has('name') ? 'has-error' : ''}}">
                        {!! Form::label('name', trans('usuario.name').': ', ['class' => 'col-sm-3 control-label']) !!}
                        <div class="col-sm-6">
                            {!! Form::text('name', null, ['class' => 'form-control']) !!}
                            {!! $errors->first('name', '<p class="help-block">:message</p>') !!}
                        </div>
                    </div>
                    <div class="form-group {{ $errors->has('email') ? 'has-error' : ''}}">
                        {!! Form::label('email', trans('usuario.email').': ', ['class' => 'col-sm-3 control-label']) !!}
                        <div class="col-sm-6">
                            {!! Form::email('email', null, ['class' => 'form-control']) !!}
                            {!! $errors->first('email', '<p class="help-block">:message</p>') !!}
                        </div>
                    </div>
                    <div class="form-group {{ $errors->has('password') ? 'has-error' : ''}}">
                        {!! Form::label('password', trans('usuario.password').': ', ['class' => 'col-sm-3 control-label']) !!}
                        <div class="col-sm-6">
                            {!! Form::password('password', ['class' => 'form-control']) !!}
                            {!! $errors->first('password', '<p class="help-block">:message</p>') !!}
                        </div>
                    </div>
                    <div class="form-group {{ $errors->has('tipo_usuario') ? 'has-error' : ''}}">
                        {!! Form::label('tipo_usuario', trans('usuario.tipo_usuario').': ', ['class' => 'col-sm-3 control-label']) !!}
                        <div class="col-sm-6">
                            {!! Form::select('tipo_usuario', \App\Usuario::getENUM('tipo_usuario'), null, ['class' => 'form-control']) !!}
                            {!! $errors->first('tipo_usuario', '<p class="help-block">:message</p>') !!}
                        </div>
                    </div>
                    <div class="form-group {{ $errors->has('Empresa') ? 'has-error' : ''}}">
                        {!! Form::label('Empresa', trans('usuario.Empresa').': ', ['class' => 'col-sm-3 control-label']) !!}
                        <div class="col-sm-6">
                            {!! Form::select('Empresa', \App\Usuario::getENUM('Empresa'), null, ['class' => 'form-control']) !!}
                            {!! $errors->first('Empresa', '<p class="help-block">:message</p>') !!}
                        </div>
                    </div>


                    <div class="form-group">
                        <div class="col-sm-offset-3 col-sm-6">
                            <a href="{{ url('admin/usuario') }}" class="btn btn-default">{!! trans('usuario.button_cancel') !!}</a>
                            &nbsp;
                            {!! Form::submit(trans('usuario.button_create'), ['class' => 'btn btn-primary']) !!}
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>

{!! Form::close() !!}
@endsection