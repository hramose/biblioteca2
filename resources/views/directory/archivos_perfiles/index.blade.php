@extends('adminlte::layouts.app')
@section('contentheader_title', trans('todo.p4ar2'))
@section('contentheader_description', trans('todo.p4ar22'))
@section('main-content')

<div class="container">
    <div class="row">
        <div class="panel panel-default">
            <div class="panel-heading">{!! trans('archivos_perfiles.heading_index') !!}</div>
            <div class="panel-body">
                <p><a href="{{ url('admin/archivos_perfiles/create') }}" class="btn btn-primary">{!! trans('archivos_perfiles.button_gocreate') !!}</a></p>

                @include('flash::message')
                <div class="table-responsive">
                    <table class="table table-bordered table-striped table-hover">
                        <thead>
                            <tr>
                                <th>{{ trans('archivos_perfiles.archivos_biblioteca_id') }}</th>
                                <th>{{ trans('archivos_perfiles.perfiles_biblioteca_id') }}</th>
                                <th>{!! trans('archivos_perfiles.tableheading_actions') !!}</th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach($archivos_perfiles as $item)
                            <tr>
                                <td><a href="{{ url('admin/archivos_perfiles', $item->id) }}">{{$item->archivo->nombre}}</a></td>
                                <td>{{isset($item->perfil->perfil_nombre)?$item->perfil->perfil_nombre:"Sin perfil"}} </td>
                                <td>
                                    <a href="{{ url('admin/archivos_perfiles/' . $item->id . '/edit') }}" class="btn btn-primary btn-xs">{!! trans('archivos_perfiles.button_goedit') !!}</a>
                                    &nbsp;
                                    <a href="{{ url('admin/archivos_perfiles/' . $item->id . '/predelete') }}" class="btn btn-danger btn-xs">{!! trans('archivos_perfiles.button_godelete') !!}</a>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                    <div class="pagination"> {!! $archivos_perfiles->render() !!} </div>
                </div>

            </div>
        </div>
    </div>
</div>

@endsection
