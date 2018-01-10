@extends('adminlte::layouts.app')
@section('contentheader_title', trans('todo.usuf2s'))
@section('contentheader_description', trans('todo.predelusuf2s2'))
@section('main-content')

{!! Form::open([
    'method'=>'DELETE',
    'url' => ['admin/usuario', $usuario->id],
    'style' => 'display:inline'
]) !!}

<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">{!! trans('usuario.heading_predelete') !!}</div>
                <div class="panel-body">

                    @if ($errors->any())
                        <div class="alert alert-danger">
                            {!! implode('<br>', $errors->all()) !!}
                        </div>
                    @endif

                    <div class="form-group {{ $errors->has('name') ? 'has-error' : ''}}">
                        <div class="col-sm-12">
                            <div class="checkbox">
                                <label>{!! Form::checkbox('confirm', '1') !!} <span>{!! trans('usuario.label_confirmdelete') !!}</span></label>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-sm-12">
                            <a href="{{ url('admin/usuario') }}" class="btn btn-default">{!! trans('usuario.button_cancel') !!}</a>
                            &nbsp;
                            {!! Form::submit(trans('usuario.button_delete'), ['class' => 'btn btn-danger']) !!}
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>

{!! Form::close() !!}
@endsection