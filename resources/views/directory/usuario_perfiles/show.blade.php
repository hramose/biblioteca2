@extends('adminlte::layouts.app')
@section('contentheader_title', trans('todo.p2wsx'))
@section('contentheader_description', trans('todo.p2wsxs'))
@section('main-content')

<div class="container">
    <div class="row">
        <div class="panel panel-default">
            <div class="panel-heading">{!! trans('usuario_perfiles.heading_show') !!}</div>
            <div class="panel-body">
                <p><a href="{{ url('admin/usuario_perfiles') }}" class="btn btn-default">{!! trans('usuario_perfiles.button_goback') !!}</a></p>

                <div class="table-responsive">
                    <table class="table table-bordered table-striped table-hover">
                        <tr><th>User Id</th><td>{{ $usuario_perfile->user_id }}</td></tr>
                        <tr><th>Perfiles Biblioteca Id</th><td>{{ $usuario_perfile->perfiles_biblioteca_id }}</td></tr>
                    </table>
                </div>

            </div>
        </div>
    </div>
</div>

@endsection