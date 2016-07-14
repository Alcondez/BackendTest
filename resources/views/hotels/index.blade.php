@extends('layouts.app')

@section('content')
	<div class="container">
		<div class="row" id="main-btn">
			<a class="btn btn-primary" href="{{ url('/hotels/create') }}" role="button">Crear Establecimiento</a>
		</div>

		<div class="row">
			<ul class="list-group">
				@foreach($hotels as $hotel)
					<li class="list-group-item clearfix">
					<a href="{{ action('HotelsController@show', ['id' => $hotel->id]) }}">{{ $hotel->nombre }}</a>
					<span class="pull-right">
						<a class="btn btn-primary btn-sm btn-success" href="{{ action('HotelsController@edit', ['id' => $hotel->id]) }}" role="button">Editar</a>
						<form role="form" method="POST" action="/hotels/{{ $hotel->id }}">
                        {{ csrf_field() }}
                        {{ method_field('DELETE') }}
						<button type="submit" class="btn btn-primary btn-danger btn-sm">Eliminar</button>
						</form>
					</span>
					</li>
				@endforeach
			</ul>
		</div>
	</div>
@endsection