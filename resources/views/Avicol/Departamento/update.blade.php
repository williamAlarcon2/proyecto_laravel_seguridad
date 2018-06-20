@extends('layouts.app')
  @section('content')
    <h4 class="with-border">Departamento</h4>
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
      {!! Form::model($departamentos, ['route' => ['departamentos.update', $departamentos->id],'method' => 'PUT']) !!}
        <div class="input-group separacion">
          <span class="input-group-addon"><i class="fa fa-address-card-o fa-2x"></i></span>
          <div class="form-group label-floating">
              <label class="control-label">Nombre</label>
              <input type="text" name="nombreDep" class="form-control" id="nombreDep" value="{{ old('nombreDep', $departamentos->nombreDep)}}" onkeyup="cadaprimera(this)">
          </div>
        </div>
        <label id="lbl">Pais</label>
        <div class="input-group separacion">
					<select id="pais" name="idPais" class="select2">
              @foreach($departamentospais as $Departamentospais)
                <option value="{{$Departamentospais->idPais}}">{{$Departamentospais->nombrePai}}</option>
              @endforeach
              @foreach($paises as $Pais)
		            <option value="{{$Pais->id}}">{{$Pais->nombrePai}}</option>
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
