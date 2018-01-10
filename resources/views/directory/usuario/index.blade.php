@extends('adminlte::layouts.app')
@section('contentheader_title', trans('todo.usuf2s'))
@section('contentheader_description', trans('todo.usuf2s2'))
@section('main-content')

<div class="container">
    <div class="row">
        <div class="panel panel-default">
            <div class="panel-heading">{!! trans('usuario.heading_index') !!}</div>
            <div class="panel-body">
                <p><a href="{{ url('admin/usuario/create') }}" class="btn btn-primary">{!! trans('usuario.button_gocreate') !!}</a></p>

                @include('flash::message')
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
                        @foreach($usuario as $item)
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
                    <div class="pagination"> {!! $usuario->render() !!} </div>
                </div>

            </div>
        </div>
    </div>
</div>

@endsection
