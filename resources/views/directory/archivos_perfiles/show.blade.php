@extends('adminlte::layouts.app')
@section('contentheader_title', trans('todo.p4ar2'))
@section('contentheader_description', trans('todo.p4ar2s'))

@section('main-content')

<div class="container">
    <div class="row">
        <div class="panel panel-default">
            <div class="panel-heading">{!! trans('archivos_perfiles.heading_show') !!}</div>
            <div class="panel-body">
                <p><a href="{{ url('admin/archivos_perfiles') }}" class="btn btn-default">{!! trans('archivos_perfiles.button_goback') !!}</a></p>

                <div class="table-responsive">
                    <table class="table table-bordered table-striped table-hover">
                        <tr><th>Archivos Biblioteca Id</th><td>{{ $archivos_perfile->archivos_biblioteca_id }}</td></tr>
                        <tr><th>Perfiles Biblioteca Id</th><td>{{ $archivos_perfile->perfiles_biblioteca_id }}</td></tr>
                    </table>
                </div>

            </div>
        </div>
    </div>
</div>

@endsection