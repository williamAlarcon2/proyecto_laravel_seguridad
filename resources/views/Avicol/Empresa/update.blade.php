@extends('layouts.app')
  @section('content')
    <h4 class="with-border">Empresa</h4>
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
      {!! Form::model($empresas, ['route' => ['empresas.update', $empresas->id],'method' => 'PUT']) !!}
        <div class="input-group separacion">
          <span class="input-group-addon"><i class="fa fa-address-card-o fa-2x"></i></span>
          <div class="form-group label-floating">
              <label class="control-label">Nombre</label>
              <input type="text" name="nombreEmp" class="form-control" id="nombreEmp" value="{{ old('nombreEmp', $empresas->nombreEmp)}}" onkeyup="cadaprimera(this)">
          </div>
        </div>
        <label id="lbl">Estado</label>
        <div class="input-group separacion">
					<select id="estado" name="idEstado" class="select2">
            @foreach($empresasestado as $Empresasestado)
              <option value="{{$Empresasestado->idEstado}}">{{$Empresasestado->nombreEst}}</option>
            @endforeach
            @foreach($estados as $Estado)
	            <option value="{{$Estado->id}}">{{$Estado->nombreEst}}</option>
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
        @if($empresas->modulopEmp != null)
          <div class="checkbox-detailed">
            <input type="checkbox" name="modulopEmp" id="check-det-1" value="Ponedoras" checked/>
            <label for="check-det-1" class="modulocheck">
            <span class="checkbox-detailed-tbl">
              <span class="checkbox-detailed-cell">
                <span class="checkbox-detailed-title">Ponedoras</span>
              </span>
            </span>
            </label>
          </div>
        @endif
        @if($empresas->modulopEmp == null)
          <div class="checkbox-detailed">
            <input type="checkbox" name="modulopEmp" id="check-det-1" value="Ponedoras"/>
            <label for="check-det-1" class="modulocheck">
            <span class="checkbox-detailed-tbl">
              <span class="checkbox-detailed-cell">
                <span class="checkbox-detailed-title">Ponedoras</span>
              </span>
            </span>
            </label>
          </div>
        @endif
        @if($empresas->modulorEmp != null)
          <div class="checkbox-detailed">
            <input type="checkbox" name="modulorEmp" id="check-det-2" value="Reproductoras" checked/>
            <label for="check-det-2" class="modulocheck">
            <span class="checkbox-detailed-tbl">
              <span class="checkbox-detailed-cell">
                <span class="checkbox-detailed-title">Reproductoras</span>
              </span>
            </span>
            </label>
          </div>
        @endif
        @if($empresas->modulorEmp == null)
          <div class="checkbox-detailed">
            <input type="checkbox" name="modulorEmp" value="Reproductoras" id="check-det-2"/>
            <label for="check-det-2" class="modulocheck">
            <span class="checkbox-detailed-tbl">
              <span class="checkbox-detailed-cell">
                <span class="checkbox-detailed-title">Reproductoras</span>
              </span>
            </span>
            </label>
          </div>
        @endif
        @if($empresas->modulopeEmp != null)
          <div class="checkbox-detailed">
            <input type="checkbox" name="modulopeEmp" id="check-det-3" value="Pollo Engorde" checked />
            <label for="check-det-3" class="modulocheck">
            <span class="checkbox-detailed-tbl">
              <span class="checkbox-detailed-cell">
                <span class="checkbox-detailed-title">Pollo de Engorde</span>
              </span>
            </span>
            </label>
          </div>
        @endif
        @if($empresas->modulopeEmp == null)
          <div class="checkbox-detailed">
            <input type="checkbox" name="modulopeEmp" value="Pollo Engorde" id="check-det-3"/>
            <label for="check-det-3" class="modulocheck">
            <span class="checkbox-detailed-tbl">
              <span class="checkbox-detailed-cell">
                <span class="checkbox-detailed-title">Pollo de Engorde</span>
              </span>
            </span>
            </label>
          </div>
        @endif
        @if($empresas->modulolEmp != null)
          <div class="checkbox-detailed">
            <input type="checkbox" name="modulolEmp" id="check-det-4" value="Laboratorio Huevo" checked />
            <label for="check-det-4" class="modulocheck">
            <span class="checkbox-detailed-tbl">
              <span class="checkbox-detailed-cell">
                <span class="checkbox-detailed-title">Laboratorio de Huevo</span>
              </span>
            </span>
            </label>
          </div>
        @endif
        @if($empresas->modulolEmp == null)
          <div class="checkbox-detailed">
            <input type="checkbox" name="modulolEmp" value="Laboratorio Huevo" id="check-det-4"/>
            <label for="check-det-4" class="modulocheck">
            <span class="checkbox-detailed-tbl">
              <span class="checkbox-detailed-cell">
                <span class="checkbox-detailed-title">Laboratorio de Huevo</span>
              </span>
            </span>
            </label>
          </div>
        @endif
        <div class="input-group separacion">
          <button id="boton_formulario">Actualizar</button>
        </div>
      {{ Form::close() }}
    </div>
  @endsection
