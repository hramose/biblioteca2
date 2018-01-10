@extends('adminlte::layouts.app')
@section('contentheader_title', trans('todo.p4ar2'))
@section('contentheader_description', trans('todo.p4ar2c'))
@section('main-content')
{!! Form::open(['url' => 'admin/archivos_perfiles', 'class' => 'form-horizontal']) !!}

<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">{!! trans('archivos_perfiles.heading_create') !!}</div>
                <div class="panel-body">
    
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            {!! implode('<br>', $errors->all()) !!}
                        </div>
                    @endif

                    <div class="form-group {{ $errors->has('archivos_biblioteca_id') ? 'has-error' : ''}}">
                        {!! Form::label('archivos_biblioteca_id', trans('archivos_perfiles.archivos_biblioteca_id').': ', ['class' => 'col-sm-3 control-label']) !!}
                        <div class="col-sm-6">
                            {!! Form::select('archivos_biblioteca_id',
                               App\Archivos::orderBy('nombre','asc')->pluck('nombre','id'),
                               null,
                               ['class' => 'form-control'] )!!}
                            {!! $errors->first('archivos_biblioteca_id', '<p class="help-block">:message</p>') !!}
                        </div>
                    </div>
                    <div class="form-group {{ $errors->has('perfiles_biblioteca_id') ? 'has-error' : ''}}">
                        {!! Form::label('perfiles_biblioteca_id', trans('archivos_perfiles.perfiles_biblioteca_id').': ', ['class' => 'col-sm-3 control-label']) !!}
                        <div class="col-sm-6">
                            {!! Form::select('perfiles_biblioteca_id',
                               App\PerfilesBiblioteca::orderBy('perfil_nombre','asc')->pluck('perfil_nombre','id'),
                               null,
                               ['class' => 'form-control'] )!!}
                            {!! $errors->first('perfiles_biblioteca_id', '<p class="help-block">:message</p>') !!}
                        </div>
                    </div>


                    <div class="form-group">
                        <div class="col-sm-offset-3 col-sm-6">
                            <a href="{{ url('admin/archivos_perfiles') }}" class="btn btn-default">{!! trans('archivos_perfiles.button_cancel') !!}</a>
                            &nbsp;
                            {!! Form::submit(trans('archivos_perfiles.button_create'), ['class' => 'btn btn-primary']) !!}
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>

{!! Form::close() !!}
@endsection