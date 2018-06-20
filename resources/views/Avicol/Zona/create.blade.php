@extends('layouts.app')
  @section('content')
    <h4 class="with-border">Zona</h4>
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
      {{ Form::open(['route' => 'zonas.store']) }}
        <input type="hidden" name="_token" value="{{ csrf_token()}}" id="token">
        <div class="input-group separacion">
      		<span class="input-group-addon"><i class="fa fa-address-card-o fa-2x"></i></span>
      		<div class="form-group label-floating">
              <label class="control-label">Nombre de la Zona</label>
              <input type="text" name="nombreZon" class="form-control" id="nombreZon" value="{{ old('nombreZon')}}">
          </div>
        </div>
        <div class="row">
          <div class="col-sm-12">
            <div>
              <a type="button" class="boton boton_municipio" id="boton_municipio">Agregar Municipios</a>
            </div>
            <div class="separacion" id="row_separacion">    
            </div>           
            <div>
              <button id="boton_formulario">Guardar</button>
            </div>
          </div>
        </div>
      {{ Form::close() }}
    </div>
  @endsection
