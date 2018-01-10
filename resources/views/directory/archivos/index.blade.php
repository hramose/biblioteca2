@extends('adminlte::layouts.app')

@section('main-content')

<div class="container">
    <div class="row">
        <div class="panel panel-default">
            <div class="panel-heading">{!! trans('archivos.heading_index') !!}</div>
            <div class="panel-body">
                <p><a href="{{ url('admin/archivos/create') }}" class="btn btn-primary">{!! trans('archivos.button_gocreate') !!}</a></p>

                @include('flash::message')
                <div class="table-responsive">
                    <table class="table table-bordered table-striped table-hover">
                        <thead>
                            <tr>
                                <th>{{ trans('archivos.nombre') }}</th>
                                <th>{{ trans('archivos.filesize') }}</th>
                                <th>{{ trans('archivos.filemtime') }}</th>
                                <th>{!! trans('archivos.tableheading_actions') !!}</th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach($archivos as $item)
                            <tr>
                                <td><a href="{{ url('admin/archivos', $item->id) }}">{{ $item->nombre }}</a></td>
                                <td>{{ $item->filesize }}</td>
                                <td>{{ $item->filemtime }}</td>
                                <td>
                                    <a href="{{ url('admin/archivos/' . $item->id . '/edit') }}" class="btn btn-primary btn-xs">{!! trans('archivos.button_goedit') !!}</a>
                                    &nbsp;
                                    <a href="{{ url('admin/archivos/' . $item->id . '/predelete') }}" class="btn btn-danger btn-xs">{!! trans('archivos.button_godelete') !!}</a>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                    <div class="pagination"> {!! $archivos->render() !!} </div>
                </div>

            </div>
        </div>
    </div>
</div>

@endsection
