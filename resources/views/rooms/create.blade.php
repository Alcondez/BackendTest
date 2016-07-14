@extends('layouts.app')

@section('content')
	<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Registrar Habitacion</div>
                <div class="panel-body">
                    <form class="form-horizontal" role="form" method="POST" action="{{ url('/rooms') }}">
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


        				<div class="form-group{{ $errors->has('tarifa') ? ' has-error' : '' }}">
                            <label for="tarifa" class="col-md-4 control-label">Tarifa</label>

                            <div class="col-md-6">
                                <div class="input-group">
                                    <div class="input-group-addon">Bs.</div>
                                <input id="tarifa" type="number" class="form-control" name="tarifa" maxlength="10" value="{{ old('tarifa') }}">
                                </div>
                                @if ($errors->has('tarifa'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('tarifa') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('max_personas') ? ' has-error' : '' }}">
                            <label for="max_personas" class="col-md-4 control-label">Maximo de Personas</label>

                            <div class="col-md-6">
                                
                                    <input id="max_personas" type="number" class="form-control" name="max_personas" maxlength="5" value="{{ old('max_personas') }}">
                                
                                @if ($errors->has('max_personas'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('max_personas') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <input name="hotel_id" type="hidden" value="{{ $hotel_id }}">

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    <i class="fa fa-btn fa-user"></i> Crear Habitacion
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