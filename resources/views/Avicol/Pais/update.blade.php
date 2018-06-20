@extends('layouts.app')
  @section('content')
    <h4 class="with-border">Pais</h4>
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
      {!! Form::model($paises, ['route' => ['paises.update', $paises->id],'method' => 'PUT']) !!}
        <div class="input-group separacion">
          <span class="input-group-addon"><i class="fa fa-address-card-o fa-2x"></i></span>
          <div class="form-group label-floating">
              <label class="control-label">Nombre</label>
              <input type="text" name="nombrePai" class="form-control" id="nombrePai" value="{{ old('nombrePai', $paises->nombrePai)}}" onkeyup="cadaprimera(this)">
          </div>
        </div>
        <div class="input-group separacion">
          <button id="boton_formulario">Actualizar</button>
        </div>
      {{ Form::close() }}
    </div>
  @endsection
