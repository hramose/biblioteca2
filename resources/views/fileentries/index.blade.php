@extends('adminlte::layouts.app')
@section('contentheader_title', trans('todo.filerfs'))
@section('contentheader_description', trans('todo.filerfs2'))
@section('htmlheader_title')
    {{ trans('Subir archivos') }}
@endsection

@section('main-content')
    <div class="container">
        <div class="row">

            <form action="{{route('addentry', [])}}" method="post" enctype="multipart/form-data">
                {{ csrf_field() }}
                <input type="file" name="filefield" class="btn btn-default navbar-btn" >
                <input type="submit" class="btn btn-default navbar-btn" >
            </form>
            <div class="panel panel-default">
                <div class="panel-heading">Archive list</div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-xs-12 col-sm-6 col-md-10">
                        <ul class="list-group">
                            @foreach($entries as $entry)
                            <li class="list-group-item">
                                {{link_to_route('getentry', $title = $entry->nombre, $entry->filename, $attributes = ["target"=>"_blank"])}}
                                <span class="badge">{{$entry->revicion}}</span>
                                <span class="label label-default">{{$entry->nuevo==1?"Nuevo":""}}</span>

                                {{ Form::open(array('method'=>'post','class'=> 'form_permisos','url' => 'permisos_archivos', 'id'=>'comment','data-id'=>$entry->id)) }}
                                {!! Form::hidden('archivos_biblioteca_id',$entry->id) !!}
                                <div class="checkbox">
                                    @foreach($permi as $per)
                                    <label>
                                        {{ Form::checkbox('perfiles_biblioteca[]', $per->id, $entry->perfiles->contains('id', $per->id)) }} {{$per->perfil_nombre}}
                                    </label>
                                    @endforeach
                                </div>
                                <div class="btn-group" role="group" aria-label="...">
                                    {{ Form::submit('Actualiza!',array('class' => 'btn btn-default  btn-xs actpermisos')) }}
                                    <a href="{{ url('admin/archivos/' . $entry->id . '/edit') }}" class="btn btn-primary btn-xs">{!! trans('archivos.button_goedit') !!}</a>
                                    &nbsp;
                                    <a href="{{ url('admin/archivos/' . $entry->id . '/predelete') }}" class="btn btn-danger btn-xs">{!! trans('archivos.button_godelete') !!}</a>
                                </div>
                                {{ Form::close() }}

                            </li>
                            @endforeach
                        </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>




@endsection

@section('scripts')
    @include('adminlte::layouts.partials.scripts')


    <script>
        $(function () {

            $( '.form_permisos' ).on( 'submit', function(e) {
                e.preventDefault();
                //alert('hola mmmm');
                var str = $(this).serialize();//es para pasar los datos del form como un query conlos campos
               //alert(str);
               var url2 = $(this).attr("action");

                $.ajax({
                    url: url2,
                    type: 'post',
                    data: str,
                    success: function (data) {
                        if (data != "")
                            alert(data);

                    }
                });

            });


        });

    </script>
@show

