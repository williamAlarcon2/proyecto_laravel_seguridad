@extends('layouts.app')
  @section('content')
    <h4 class="with-border">Clasificacion de Huevo</h4>
    @if ($errors->any())
      <div class=" col-md-offset-2 separacion alert alert-danger">
        <ul>
          @foreach ($errors->all() as $error)
            <li>{{ $error}}</li>
          @endforeach
        </ul>
      </div>
    @endif
    <div class="col-sm-8 col-md-offset-2" id="formulario">
      {{ Form::open(['route' => 'clasificacionhuevos.store']) }}
        <div class="input-group separacion">
      		<span class="input-group-addon"><i class="fa fa-address-card-o fa-2x"></i></span>
      		<div class="form-group label-floating">
              <label class="control-label">Nombre</label>
              <input type="text" name="nombreCla" class="form-control" id="nombreCla" value="{{ old('nombreCla')}}">
          </div>
        </div>
        <div class="input-group separacion">
      		<span class="input-group-addon"><i class="fa fa-exchange fa-2x"></i></span>
      		<div class="form-group label-floating">
              <label class="control-label">Desde</label>
              <input type="text" name="desdeCla" class="form-control" id="desdeCla" value="{{ old('desdeCla')}}">
          </div>
        </div>
        <div class="input-group separacion">
      		<span class="input-group-addon"><i class="fa fa-exchange fa-2x"></i></span>
      		<div class="form-group label-floating">
              <label class="control-label">Hasta</label>
              <input type="text" name="hastaCla" class="form-control" id="hastaCla" value="{{ old('hastaCla')}}">
          </div>
        </div>
        <div class="input-group separacion">
          <button id="boton_formulario">Guardar</button>
    		</div>
      {{ Form::close() }}
    </div>
  @endsection
