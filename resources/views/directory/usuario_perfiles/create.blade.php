@extends('adminlte::layouts.app')
@section('contentheader_title', trans('todo.p2wsx'))
@section('contentheader_description', trans('todo.p2wsxc'))
@section('main-content')
{!! Form::open(['url' => 'admin/usuario_perfiles', 'class' => 'form-horizontal']) !!}

<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">{!! trans('usuario_perfiles.heading_create') !!}</div>
                <div class="panel-body">
    
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            {!! implode('<br>', $errors->all()) !!}
                        </div>
                    @endif
                    @if($user_id <0 )
                    <div class="form-group {{ $errors->has('user_id') ? 'has-error' : ''}}">
                        {!! Form::label('user_id', trans('usuario_perfiles.user_id').': ', ['class' => 'col-sm-3 control-label']) !!}
                        <div class="col-sm-6">

                            {!! Form::select('user_id',
                               App\Usuario::orderBy('name','asc')->pluck('name','id'),
                               null,
                               ['class' => 'form-control'] )!!}
                            {!! $errors->first('user_id', '<p class="help-block">:message</p>') !!}

                        </div>
                    </div>
                        @else

                            {!! Form::hidden('user_id',$user_id) !!}
                        @endif
                    <div class="form-group {{ $errors->has('perfiles_biblioteca_id') ? 'has-error' : ''}}">
                        {!! Form::label('perfiles_biblioteca_id', trans('usuario_perfiles.perfiles_biblioteca_id').': ', ['class' => 'col-sm-3 control-label']) !!}
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
                            <a href="{{ url('admin/usuario_perfiles') }}" class="btn btn-default">{!! trans('usuario_perfiles.button_cancel') !!}</a>
                            &nbsp;
                            {!! Form::submit(trans('usuario_perfiles.button_create'), ['class' => 'btn btn-primary']) !!}
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>

{!! Form::close() !!}
@endsection