@extends('adminlte::layouts.app')

@section('contentheader_title', trans('todo.perf2s'))
@section('contentheader_description', trans('todo.showperf2s2'))
@section('main-content')

<div class="container">
    <div class="row">
        <div class="panel panel-default">
            <div class="panel-heading">{!! trans('perfiles_biblioteca.heading_show') !!}</div>
            <div class="panel-body">
                <p><a href="{{ url('admin/perfiles_biblioteca') }}" class="btn btn-default">{!! trans('perfiles_biblioteca.button_goback') !!}</a></p>

                <div class="table-responsive">
                    <table class="table table-bordered table-striped table-hover">
                        <tr><th>Perfil Nombre</th><td>{{ $perfiles_biblioteca->perfil_nombre }}</td></tr>
                    </table>
                </div>

            </div>
            <div class="table-responsive">
                <table class="table table-bordered table-striped table-hover">
                    <thead>
                    <tr>
                        <th>{{ trans('usuario.name') }}</th>
                        <th>{{ trans('usuario.email') }}</th>
                        <th>{{ trans('usuario.tipo_usuario') }}</th>
                        <th>{!! trans('usuario.tableheading_actions') !!}</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($perfiles_biblioteca->usuarios as $item)
                        <tr>
                            <td><a href="{{ url('admin/usuario', $item->id) }}">{{ $item->name }}</a></td>
                            <td>{{ $item->email }}</td>
                            <td>{{ $item->tipo_usuario }}</td>
                            <td>
                                <a href="{{ url('admin/usuario/' . $item->id . '/edit') }}" class="btn btn-primary btn-xs">{!! trans('usuario.button_goedit') !!}</a>
                                &nbsp;
                                <a href="{{ url('admin/usuario/' . $item->id . '/predelete') }}" class="btn btn-danger btn-xs">{!! trans('usuario.button_godelete') !!}</a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>

            </div>
        </div>
    </div>
</div>

@endsection