@extends('layouts.app')
  @section('content')
    <h4 class="with-border">Sistema de Explotacion</h4>
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
      {!! Form::model($sistemaexplotaciones, ['route' => ['sistemaexplotaciones.update', $sistemaexplotaciones->id],'method' => 'PUT']) !!}
        <div class="input-group separacion">
          <span class="input-group-addon"><i class="fa fa-address-card-o fa-2x"></i></span>
          <div class="form-group label-floating">
              <label class="control-label">Nombre</label>
              <input type="text" name="nombreSis" class="form-control" id="nombreSis" value="{{ old('nombreSis' , $sistemaexplotaciones->nombreSis)}}">
          </div>
        </div>
        <div class="row">
          <div class="col-sm-8 col-md-offset-2">
            <label style="font-size:16px;">Seleccione los Modulos</label>
          </div>
        </div>
        @if($sistemaexplotaciones->modulopSis != null)
          <div class="checkbox-detailed">
            <input type="checkbox" name="modulopSis" id="check-det-1" checked/>
            <label for="check-det-1" class="modulocheck">
            <span class="checkbox-detailed-tbl">
              <span class="checkbox-detailed-cell">
                <span class="checkbox-detailed-title">Ponedoras</span>
              </span>
            </span>
            </label>
          </div>
        @endif
        @if($sistemaexplotaciones->modulopSis == null)
          <div class="checkbox-detailed">
            <input type="checkbox" name="modulopSis" id="check-det-1" value="Ponedoras"/>
            <label for="check-det-1" class="modulocheck">
            <span class="checkbox-detailed-tbl">
              <span class="checkbox-detailed-cell">
                <span class="checkbox-detailed-title">Ponedoras</span>
              </span>
            </span>
            </label>
          </div>
        @endif
        @if($sistemaexplotaciones->modulorSis != null)
          <div class="checkbox-detailed">
            <input type="checkbox" name="modulorSis" id="check-det-2" checked/>
            <label for="check-det-2" class="modulocheck">
            <span class="checkbox-detailed-tbl">
              <span class="checkbox-detailed-cell">
                <span class="checkbox-detailed-title">Reproductoras</span>
              </span>
            </span>
            </label>
          </div>
        @endif
        @if($sistemaexplotaciones->modulorSis == null)
          <div class="checkbox-detailed">
            <input type="checkbox" name="modulorSis" value="Reproductoras" id="check-det-2"/>
            <label for="check-det-2" class="modulocheck">
            <span class="checkbox-detailed-tbl">
              <span class="checkbox-detailed-cell">
                <span class="checkbox-detailed-title">Reproductoras</span>
              </span>
            </span>
            </label>
          </div>
        @endif
        @if($sistemaexplotaciones->modulopeSis != null)
          <div class="checkbox-detailed">
            <input type="checkbox" name="modulopeSis" id="check-det-3" checked />
            <label for="check-det-3" class="modulocheck">
            <span class="checkbox-detailed-tbl">
              <span class="checkbox-detailed-cell">
                <span class="checkbox-detailed-title">Pollo de Engorde</span>
              </span>
            </span>
            </label>
          </div>
        @endif
        @if($sistemaexplotaciones->modulopeSis == null)
          <div class="checkbox-detailed">
            <input type="checkbox" name="modulopeSis" value="Pollo Engorde" id="check-det-3"/>
            <label for="check-det-3" class="modulocheck">
            <span class="checkbox-detailed-tbl">
              <span class="checkbox-detailed-cell">
                <span class="checkbox-detailed-title">Pollo de Engorde</span>
              </span>
            </span>
            </label>
          </div>
        @endif
        @if($sistemaexplotaciones->modulolSis != null)
          <div class="checkbox-detailed">
            <input type="checkbox" name="modulolSis" id="check-det-4" checked />
            <label for="check-det-4" class="modulocheck">
            <span class="checkbox-detailed-tbl">
              <span class="checkbox-detailed-cell">
                <span class="checkbox-detailed-title">Laboratorio de Huevo</span>
              </span>
            </span>
            </label>
          </div>
        @endif
        @if($sistemaexplotaciones->modulolSis == null)
          <div class="checkbox-detailed">
            <input type="checkbox" name="modulolSis" value="Laboratorio Huevo" id="check-det-4"/>
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
