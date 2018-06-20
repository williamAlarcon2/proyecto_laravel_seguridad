@extends('layouts.app')
  @section('content')
    <h4 class="with-border">Variedad</h4>
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
      {{ Form::open(['route' => 'variedades.store']) }}
        <div class="input-group separacion">
      		<span class="input-group-addon"><i class="fa fa-address-card-o fa-2x"></i></span>
      		<div class="form-group label-floating">
              <label class="control-label">Nombre</label>
              <input type="text" name="nombreVar" class="form-control" id="nombreVar" value="{{ old('nombreVar')}}">
          </div>
        </div>
        <div class="row">
          <div class="col-sm-8 col-md-offset-2">
            <label style="font-size:16px;">Seleccione los Modulos</label>
          </div>
        </div>
        <div class="checkbox-detailed">
          <input type="checkbox" name="modulopVar" value="Ponedoras" id="check-det-1"/>
          <label for="check-det-1" class="modulocheck">
          <span class="checkbox-detailed-tbl">
            <span class="checkbox-detailed-cell">
              <span class="checkbox-detailed-title">Ponedoras</span>
            </span>
          </span>
          </label>
        </div>
        <div class="checkbox-detailed">
          <input type="checkbox" name="modulorVar" value="Reproductoras" id="check-det-2"/>
          <label for="check-det-2" class="modulocheck">
          <span class="checkbox-detailed-tbl">
            <span class="checkbox-detailed-cell">
              <span class="checkbox-detailed-title">Reproductoras</span>
            </span>
          </span>
          </label>
        </div>
        <div class="checkbox-detailed">
          <input type="checkbox" name="modulopeVar" value="Pollo Engorde" id="check-det-3"/>
          <label for="check-det-3" class="modulocheck">
          <span class="checkbox-detailed-tbl">
            <span class="checkbox-detailed-cell">
              <span class="checkbox-detailed-title">Pollo de Engorde</span>
            </span>
          </span>
          </label>
        </div>
        <div class="checkbox-detailed">
          <input type="checkbox" name="modulolVar" value="Laboratorio Huevo" id="check-det-4"/>
          <label for="check-det-4" class="modulocheck">
          <span class="checkbox-detailed-tbl">
            <span class="checkbox-detailed-cell">
              <span class="checkbox-detailed-title">Laboratorio de Huevo</span>
            </span>
          </span>
          </label>
        </div>
        <div class="input-group separacion">
          <button id="boton_formulario">Guardar</button>
    		</div>
      {{ Form::close() }}
    </div>
  @endsection
