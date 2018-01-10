@extends('adminlte::layouts.app')

@section('htmlheader_title')
	{{ trans('adminlte_lang::message.home') }}
@endsection


@section('main-content')
	<example name="{{ Auth::user()->name }}" titulo="Home" cuerpo="{{ trans('adminlte_lang::message.logged') }}"></example>
	<div class="panel panel-default">
		@foreach($usuario->perfileshm as $perfiles)
		<div class="panel-heading">{{ (isset($p->perfilxc->perfilarchivosshm))?$perfiles->perfilxc->perfil_nombre:"Sin Perfil"}}</div>
		<div class="panel-body">
			<div class="row">
				<div class="col-xs-12 col-sm-6 col-md-10">
					<ul class="list-group">
						@if( isset($perfiles->perfilxc->perfilarchivosshm))
						@foreach($perfiles->perfilxc->perfilarchivosshm as $archivos)
							@php($entry=$archivos->archivosxc)
							<li class="list-group-item">
								{{link_to_route('getentry', $title = $entry->nombre, $entry->filename, $attributes = ["target"=>"_blank"])}}
								<span class="badge">{{$entry->revicion}}</span>
								<span class="label label-default">{{$entry->mensaje}}</span>
								<span class="label label-default">{{$entry->nuevo==1?"Nuevo":""}}</span>
							</li>
						@endforeach
							@endif
					</ul>
				</div>
			</div>
		</div>
		@endforeach
	</div>

@endsection
