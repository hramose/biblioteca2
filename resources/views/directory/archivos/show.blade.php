@extends('adminlte::layouts.app')

@section('main-content')

<div class="container">
    <div class="row">
        <div class="panel panel-default">
            <div class="panel-heading">{!! trans('archivos.heading_show') !!}</div>
            <div class="panel-body">
                <p><a href="{{ url('admin/archivos') }}" class="btn btn-default">{!! trans('archivos.button_goback') !!}</a></p>

                <div class="table-responsive">
                    <table class="table table-bordered table-striped table-hover">
                        <tr><th>Nombre</th><td>{{ $archivo->nombre }}</td></tr>
                        <tr><th>Filesize</th><td>{{ $archivo->filesize }}</td></tr>
                        <tr><th>Filemtime</th><td>{{ $archivo->filemtime }}</td></tr>
                        <tr><th>Filedate</th><td>{{ $archivo->filedate }}</td></tr>
                        <tr><th>Filetype</th><td>{{ $archivo->filetype }}</td></tr>
                        <tr><th>Filename</th><td>{{ $archivo->filename }}</td></tr>
                        <tr><th>Filename Url</th><td>{{ $archivo->filename_url }}</td></tr>
                        <tr><th>File DeleteURL</th><td>{{ $archivo->file_deleteURL }}</td></tr>
                        <tr><th>Email</th><td>{{ $archivo->email }}</td></tr>
                        <tr><th>Log Forma</th><td>{{ $archivo->log_forma }}</td></tr>
                        <tr><th>Nuevo</th><td>{{ $archivo->nuevo }}</td></tr>
                        <tr><th>Revicion</th><td>{{ $archivo->revicion }}</td></tr>
                        <tr><th>Fecha Revicion</th><td>{{ $archivo->fecha_revicion }}</td></tr>
                        <tr><th>Mensaje</th><td>{{ $archivo->mensaje }}</td></tr>
                    </table>
                </div>

            </div>
        </div>
    </div>
</div>

@endsection