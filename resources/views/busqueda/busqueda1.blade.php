@extends('adminlte::layouts.app')

@section('contentheader_title', trans('todo.busquedaheder'))
@section('contentheader_description', trans('todo.busquedaheder2'))

@section('htmlheader_title')
	{{ trans('adminlte_lang::message.home') }}
@endsection


@section('main-content')
	<div class="panel panel-default">

		<div class="panel-heading">Busqueda</div>
		<div class="panel-body">
			<div class="row">
				<div class="col-xs-12 col-sm-6 col-md-10">
					<ul class="list-group">
						@foreach($archivosbusqueda as $entry )
							@php( $busqueda=false)
							@foreach($usuario->perfileshm as $perfiles)
							@foreach($perfiles->perfilxc->perfilarchivosshm as $archivos)
								@php
								$entry2=$archivos->archivosxc;
								if($entry->filename==$entry2->filename){
									$busqueda=true;
									break;
								}
								@endphp
							@endforeach
							@endforeach
							<li class="list-group-item {{!$busqueda?:'list-group-item-warning'}}">
								@if(!$busqueda)
									{{link_to_route('getentry', $title = $entry->nombre, $entry->filename, $attributes = ["target"=>"_blank"])}}
								@else
									{{$entry->nombre}}
									<span class="label label-danger">No Tiene el perfil adecuado para este archivo</span>
								@endif
								<span class="badge">{{$entry->revicion}}</span>
								<span class="label label-default">{{$entry->mensaje}}</span>
								<span class="label label-default">{{$entry->nuevo==1?"Nuevo":""}}</span>
							</li>
						@endforeach
					</ul>
				</div>
			</div>
		</div>
	</div>
	<ul class="list-group">
		{{--<li class="list-group-item list-group-item-success">Dapibus ac facilisis in</li>
		<li class="list-group-item list-group-item-info">Cras sit amet nibh libero</li>
		<li class="list-group-item list-group-item-warning">Porta ac consectetur ac</li>
		<li class="list-group-item list-group-item-danger">Hjauhsdau</li>
--}}

	</ul>


@endsection
