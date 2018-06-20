@extends('layouts.app')
  @section('content')
    <h4 class="with-border">Municipio</h4>
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
      {!! Form::model($municipios, ['route' => ['municipios.update', $municipios->id],'method' => 'PUT']) !!}
        <div class="input-group separacion">
          <span class="input-group-addon"><i class="fa fa-address-card-o fa-2x"></i></span>
          <div class="form-group label-floating">
              <label class="control-label">Nombre Municipio</label>
              <input type="text" name="nombreMun" class="form-control" id="nombreMun" value="{{ old('nombreMun' , $municipios->nombreMun)}}" onkeyup="cadaprimera(this)">
          </div>
        </div>
        <label id="lbl">Departamento</label>
        <div class="input-group separacion">
					<select id="departamento" name="idDepartamento" class="select2">
            @foreach($municipiosdepartamento as $Municipiosdepartamento)
              <option value="{{$Municipiosdepartamento->idDepartamento}}">{{$Municipiosdepartamento->nombreDep}}</option>
            @endforeach
            @foreach($departamentos as $Departamento)
	            <option value="{{$Departamento->id}}">{{$Departamento->nombreDep}} - {{$Departamento->nombrePai}}</option>
            @endforeach
					</select>
          <br/>
					<br/>
				</div>
        <div class="input-group separacion">
          <button id="boton_formulario">Actualizar</button>
        </div>
      {{ Form::close() }}
    </div>
  @endsection
