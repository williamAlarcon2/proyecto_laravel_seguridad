@extends('layouts.app')
  @section('content')
    <h4 class="with-border">Granjas</h4>
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
      {{ Form::open(['route' => 'granjas.store']) }}
        <div class="input-group separacion">
      		<span class="input-group-addon"><i class="fa fa-university fa-2x"></i></span>
      		<div class="form-group label-floating">
              <label class="control-label">Nombre Granja</label>
              <input type="text" name="nombreGra" class="form-control" id="nombreGra" value="{{ old('nombreGra')}}" onkeyup="primera(this)">
          </div>
        </div>
        <div class="input-group separacion">
          <span class="input-group-addon"><i class="fa fa-long-arrow-up fa-2x"></i></span>
          <div class="form-group label-floating">
              <label class="control-label">Altura/Nivel del mar</label>
              <input type="text" name="alturaGra" class="form-control" id="alturaGra" value="{{ old('alturaGra')}}">
          </div>
        </div>
        <label id="lbl">Zona</label>
        <div class="input-group separacion">
					<select id="zona" name="idZona" class="select2">
						<option value="" disabled selected>Seleccione la Zona</option>
              @foreach($zonas as $Zona)
		            <option value="{{$Zona->id}}">{{$Zona->nombreZon}}</option>
              @endforeach
					</select>
          <br/>
					<br/>
				</div>
        <label id="lbl">Empresa</label>
        <div class="input-group separacion">
          <select id="empresa" name="idEmpresa" class="select2">
            <option value="" disabled selected>Seleccione la Empresa</option>
              @foreach($empresas as $Empresa)
                <option value="{{$Empresa->id}}">{{$Empresa->nombreEmp}}</option>
              @endforeach
          </select>
          <br/>
          <br/>
        </div>
        <label id="lbl">Municipio</label>
        <div class="input-group separacion">
          <select id="municipio" name="idMunicipio" class="select2">
            <option value="" disabled selected>Seleccione la Municipio</option>
              @foreach($municipios as $Municipio)
                <option value="{{$Municipio->id}}">{{$Municipio->nombreMun}} - {{$Municipio->nombreDep}} - {{$Municipio->nombrePai}}</option>
              @endforeach
          </select>
          <br/>
          <br/>
        </div>
        <label id="lbl">Clima</label>
        <div class="input-group separacion">
          <select id="clima" name="idClima" class="select2">
            <option value="" disabled selected>Seleccione la Clima</option>
              @foreach($climas as $Clima)
                <option value="{{$Clima->id}}">{{$Clima->nombreCli}}</option>
              @endforeach
          </select>
          <br/>
          <br/>
        </div>
        <div class="row">
          <div class="col-sm-8 col-md-offset-2">
            <label style="font-size:16px;">Seleccione los Modulos</label>
          </div>
        </div>
        <div class="checkbox-detailed">
          <input type="checkbox" name="modulopGra" value="Ponedoras" id="check-det-1"/>
          <label for="check-det-1" class="modulocheck">
          <span class="checkbox-detailed-tbl">
            <span class="checkbox-detailed-cell">
              <span class="checkbox-detailed-title">Ponedoras</span>
            </span>
          </span>
          </label>
        </div>
        <div class="checkbox-detailed">
          <input type="checkbox" name="modulorGra" value="Reproductoras" id="check-det-2"/>
          <label for="check-det-2" class="modulocheck">
          <span class="checkbox-detailed-tbl">
            <span class="checkbox-detailed-cell">
              <span class="checkbox-detailed-title">Reproductoras</span>
            </span>
          </span>
          </label>
        </div>
        <div class="checkbox-detailed">
          <input type="checkbox" name="modulopeGra" value="Pollo Engorde" id="check-det-3"/>
          <label for="check-det-3" class="modulocheck">
          <span class="checkbox-detailed-tbl">
            <span class="checkbox-detailed-cell">
              <span class="checkbox-detailed-title">Pollo de Engorde</span>
            </span>
          </span>
          </label>
        </div>
        <div class="checkbox-detailed">
          <input type="checkbox" name="modulolGra" value="Laboratorio Huevo" id="check-det-4"/>
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
