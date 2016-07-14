@extends('layouts.app')

@section('content')
	<div class="container">
		<div class="row text-center">
			<h2>{{ $hotel->nombre }}</h2>
		</div>

		<div class="row" id="main-btn">
			<a class="btn btn-primary" href="{{ action('RoomsController@create', ['id' => $hotel->id]) }}" role="button">Crear Habitacion</a>
		</div>

		<div class="row">
		
			<table class="table">
				<thead>
				<tr>
					<th>Nombre</th>
					<th>Tarifa</th>
					<th>Maximo de Personas</th>
					<th></th>
				</tr>
				</thead>
				<tbody>
					@foreach ($rooms as $room)
					<tr>
						<td>{{ $room->nombre }}</td>
						<td>{{ $room->tarifa }}</td>
						<td>{{ $room->max_personas }}</td>
						<td class="pull-right">
							<a class="btn btn-primary btn-sm btn-success" href="{{ action('RoomsController@edit', ['id' => $room->id]) }}" role="button">Editar</a>
							<form role="form" method="POST" action="/rooms/{{ $room->id }}">
		                        {{ csrf_field() }}
		                        {{ method_field('DELETE') }}
								<button type="submit" class="btn btn-primary btn-danger btn-sm">Eliminar</button>
							</form>
						</td>
						</tr>
					@endforeach
				</tbody>
			</table>
			
		</div>
	</div>
@endsection