@extends('adminlte::layouts.app')

@section('contentheader_title', trans('todo.perf2s'))
@section('contentheader_description', trans('todo.perf2s2'))

@section('main-content')

<div class="container">
    <div class="row">
        <div class="panel panel-default">
            <div class="panel-heading">{!! trans('perfiles_biblioteca.heading_index') !!}</div>
            <div class="panel-body">
                <p><a href="{{ url('admin/perfiles_biblioteca/create') }}" class="btn btn-primary">{!! trans('perfiles_biblioteca.button_gocreate') !!}</a></p>

                @include('flash::message')
                <div class="table-responsive">
                    <table class="table table-bordered table-striped table-hover">
                        <thead>
                            <tr>
                                <th>{{ trans('perfiles_biblioteca.perfil_nombre') }}</th>
                                <th>{!! trans('perfiles_biblioteca.tableheading_actions') !!}</th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach($perfiles_biblioteca as $item)
                            <tr>
                                <td><a href="{{ url('admin/perfiles_biblioteca', $item->id) }}">{{ $item->perfil_nombre }}</a></td>
                                <td>
                                    <a href="{{ url('admin/perfiles_biblioteca/' . $item->id . '/edit') }}" class="btn btn-primary btn-xs">{!! trans('perfiles_biblioteca.button_goedit') !!}</a>
                                    &nbsp;
                                    <a href="{{ url('admin/perfiles_biblioteca/' . $item->id . '/predelete') }}" class="btn btn-danger btn-xs">{!! trans('perfiles_biblioteca.button_godelete') !!}</a>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                    <div class="pagination"> {!! $perfiles_biblioteca->render() !!} </div>
                </div>

            </div>
        </div>
    </div>
</div>

@endsection
