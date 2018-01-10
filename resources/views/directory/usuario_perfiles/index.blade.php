@extends('adminlte::layouts.app')
@section('contentheader_title', trans('todo.p2wsx'))
@section('contentheader_description', trans('todo.p2wsx2'))
@section('main-content')

<div class="container">
    <div class="row">
        <div class="panel panel-default">
            <div class="panel-heading">{!! trans('usuario_perfiles.heading_index') !!}</div>
            <div class="panel-body">
                <p><a href="{{ url('admin/usuario_perfiles/create') }}" class="btn btn-primary">{!! trans('usuario_perfiles.button_gocreate') !!}</a></p>

                @include('flash::message')
                <div class="table-responsive">
                    <table class="table table-bordered table-striped table-hover">
                        <thead>
                            <tr>
                                <th>{{ trans('usuario_perfiles.user_id') }}</th>
                                <th>{{ trans('usuario_perfiles.perfiles_biblioteca_id') }}</th>
                                <th>{!! trans('usuario_perfiles.tableheading_actions') !!}</th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach($usuario_perfiles as $item)
                            <tr>
                                <td><a href="{{ url('admin/usuario_perfiles', $item->id) }}">{{ $item->usuario->name }}</a></td>
                                <td>{{ isset($item->perfil->perfil_nombre)?$item->perfil->perfil_nombre:"Sin perfil" }}</td>
                                <td>
                                    <a href="{{ url('admin/usuario_perfiles/' . $item->id . '/edit') }}" class="btn btn-primary btn-xs">{!! trans('usuario_perfiles.button_goedit') !!}</a>
                                    &nbsp;
                                    <a href="{{ url('admin/usuario_perfiles/' . $item->id . '/predelete') }}" class="btn btn-danger btn-xs">{!! trans('usuario_perfiles.button_godelete') !!}</a>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                    <div class="pagination"> {!! $usuario_perfiles->render() !!} </div>
                </div>

            </div>
        </div>
    </div>
</div>

@endsection
