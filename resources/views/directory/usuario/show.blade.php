@extends('adminlte::layouts.app')
@section('contentheader_title', trans('todo.usuf2s'))
@section('contentheader_description', trans('todo.showusuf2s2'))
@section('main-content')

<div class="container">
    <div class="row">
        <div class="panel panel-default">
            <div class="panel-heading">{!! trans('usuario.heading_show') !!}</div>
            <div class="panel-body">
                <p><a href="{{ url('admin/usuario') }}" class="btn btn-default">{!! trans('usuario.button_goback') !!}</a></p>

                <div class="table-responsive">
                    <table class="table table-bordered table-striped table-hover">
                        <tr><th>Name</th><td>{{ $usuario->name }}</td></tr>
                        <tr><th>Email</th><td>{{ $usuario->email }}</td></tr>

                        <tr><th>Tipo Usuario</th><td>{{ $usuario->tipo_usuario }}</td></tr>
                        <tr><th>Empresa</th><td>{{ $usuario->Empresa }}</td></tr>
                    </table>
                </div>

            </div>
        </div>
    </div>
</div>
<hr />
<div class="container">
    <div class="row">
        <div class="panel panel-default">
            <div class="panel-heading">{!! trans('usuario_perfiles.heading_index') !!}</div>
            <div class="panel-body">
                <p><a href="{{ url('admin/usuario_perfiles/create') }}" class="btn btn-primary">{!! trans('usuario_perfiles.button_gocreate') !!}</a></p>
                <?php \Illuminate\Support\Facades\Session::put('user_id', $usuario->id);
                \Illuminate\Support\Facades\Session::put('dir34df5',url('admin/usuario/'.$usuario->id));
                ?>

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
                                <td>{{ isset($item->perfil->perfil_nombre)?$item->perfil->perfil_nombre:"Sin Perfil" }}</td>
                                <td>
                                    <a href="{{ url('admin/usuario_perfiles/' . $item->id . '/edit') }}" class="btn btn-primary btn-xs">{!! trans('usuario_perfiles.button_goedit') !!}</a>
                                    &nbsp;
                                    <a href="{{ url('admin/usuario_perfiles/' . $item->id . '/predelete') }}" class="btn btn-danger btn-xs">{!! trans('usuario_perfiles.button_godelete') !!}</a>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>

                </div>

            </div>
        </div>
    </div>
</div>
@endsection