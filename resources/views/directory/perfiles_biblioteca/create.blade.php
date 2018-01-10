@extends('adminlte::layouts.app')
@section('contentheader_title', trans('todo.perf2s'))
@section('contentheader_description', trans('todo.creperf2s2'))
@section('main-content')
{!! Form::open(['url' => 'admin/perfiles_biblioteca', 'class' => 'form-horizontal']) !!}

<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">{!! trans('perfiles_biblioteca.heading_create') !!}</div>
                <div class="panel-body">
    
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            {!! implode('<br>', $errors->all()) !!}
                        </div>
                    @endif

                    <div class="form-group {{ $errors->has('perfil_nombre') ? 'has-error' : ''}}">
                        {!! Form::label('perfil_nombre', trans('perfiles_biblioteca.perfil_nombre').': ', ['class' => 'col-sm-3 control-label']) !!}
                        <div class="col-sm-6">
                            {!! Form::text('perfil_nombre', null, ['class' => 'form-control']) !!}
                            {!! $errors->first('perfil_nombre', '<p class="help-block">:message</p>') !!}
                        </div>
                    </div>


                    <div class="form-group">
                        <div class="col-sm-offset-3 col-sm-6">
                            <a href="{{ url('admin/perfiles_biblioteca') }}" class="btn btn-default">{!! trans('perfiles_biblioteca.button_cancel') !!}</a>
                            &nbsp;
                            {!! Form::submit(trans('perfiles_biblioteca.button_create'), ['class' => 'btn btn-primary']) !!}
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>

{!! Form::close() !!}
@endsection