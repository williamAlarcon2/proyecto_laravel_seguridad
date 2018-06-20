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
    {!! Form::model($zonas, ['route' => ['zonas.update', $zonas->id],'method' => 'PUT']) !!}
      <div class="row">
        <input type="hidden" name="_token" value="{{ csrf_token()}}" id="token">
        <div class="col-sm-8 col-md-offset-2" id="formulario">
          <div class="input-group separacion">
            <span class="input-group-addon"><i class="fa fa-address-card-o fa-2x"></i></span>
            <div class="form-group label-floating">
                <label class="control-label">Nombre de la Zona</label>
                <input type="text" name="nombreZon" class="form-control" id="nombreZon" value="{{ old('nombreZon' , $zonas->nombreZon)}}">
            </div>
          </div>    
        </div>  
      </div>
      <div class="row">
        <div class="col-sm-12">
          @foreach($zonasm as $ZonasM)
            @if($zonasm != null)
              <div class="input-group separacion"> 
                <a href="{{ route('zonasmunicios', $zonas->id) }}" class="btn"><i class="fa fa-eye" aria-hidden="true"></i> Ver Municipios</a>
              </div> 
            @endif
          @endforeach
          <div>
            <a type="button" class="boton boton_municipio_update" id="boton_municipio">Agregar Municipio</a>
          </div>
          <div class="separacion" id="row_separacion">    
          </div>           
          <div>
            <button id="boton_formulario">Actualizar</button>
          </div>
        </div>
      </div>
    {{ Form::close() }}
  @endsection
