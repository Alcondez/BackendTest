@extends('layouts.app')

@section('content')
	<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Registrar Establecimiento</div>
                <div class="panel-body">
                    <form class="form-horizontal" role="form" method="POST" action="{{ url('/hotels') }}">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('nombre') ? ' has-error' : '' }}">
                            <label for="nombre" class="col-md-4 control-label">Nombre</label>

                            <div class="col-md-6">
                                <input id="nombre" type="text" class="form-control" name="nombre" maxlength="100" value="{{ old('nombre') }}">

                                @if ($errors->has('nombre'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('nombre') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('tipo') ? ' has-error' : '' }}">
                            <label for="cedula" class="col-md-4 control-label">Tipo de Establecimiento</label>

                            <div class="col-md-6">
                                <select class="form-control" name="tipo">
									<option value="" disabled selected>Seleccione Uno</option>
									
										<option value="hotel">Hotel</option>
										<option value="posada">Posada</option>
										<option value="hostal">Hostal</option>
								</select>

                                @if ($errors->has('tipo'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('tipo') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        

						<div class="form-group{{ $errors->has('fecha') ? ' has-error' : '' }}">
                            <label for="fecha" class="col-md-4 control-label">Fecha de Inauguracion</label>

                            <div class="col-md-6">
                                <input id="fecha" type="date" class="form-control" name="fecha" value="{{ old('fecha') }}">

                                @if ($errors->has('fecha'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('fecha') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>


        
        				<div class="form-group{{ $errors->has('direccion1') ? ' has-error' : '' }}">
                            <label for="direccion1" class="col-md-4 control-label">Direccion 1</label>

                            <div class="col-md-6">
                                <input id="direccion1" type="text" class="form-control" name="direccion1" maxlength="100" value="{{ old('direccion1') }}">

                                @if ($errors->has('direccion1'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('direccion1') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('direccion2') ? ' has-error' : '' }}">
                            <label for="direccion2" class="col-md-4 control-label">Direccion 2</label>

                            <div class="col-md-6">
                                <input id="direccion2" type="text" class="form-control" name="direccion2" maxlength="100" value="{{ old('direccion2') }}">

                                @if ($errors->has('direccion2'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('direccion2') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('estado') ? ' has-error' : '' }}">
                            <label for="estado" class="col-md-4 control-label">Estado</label>

                            <div class="col-md-6">
                                <select class="form-control" name="estado">
									<option value="" disabled selected>Seleccione Uno</option>
									
										@foreach($states as $state)
											<option value="{{ $state }}">{{ $state }}</option>
										@endforeach
	
								</select>

                                @if ($errors->has('estado'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('estado') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('pais') ? ' has-error' : '' }}">
                            <label for="pais" class="col-md-4 control-label">Pais</label>

                            <div class="col-md-6">
                                <select class="form-control" name="pais">
									<option value="" disabled selected>Seleccione Uno</option>
									
										
										<option value="Venezuela">Venezuela</option>
										
	
								</select>

                                @if ($errors->has('pais'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('pais') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
    
						<div class="form-group{{ $errors->has('postal') ? ' has-error' : '' }}">
                            <label for="postal" class="col-md-4 control-label">Codigo Postal</label>

                            <div class="col-md-6">
                                <input id="postal" type="number" class="form-control" name="postal" maxlength="5" value="{{ old('postal') }}">

                                @if ($errors->has('postal'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('postal') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    <i class="fa fa-btn fa-user"></i> Crear Establecimiento
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection