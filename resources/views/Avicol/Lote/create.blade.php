@extends('layouts.app')
  @section('content')
    <h4 class="with-border">Lotes</h4>
    @if ($errors->any())
      <div class=" col-md-offset-2 separacion alert alert-danger">
        <ul>
          @foreach ($errors->all() as $error)
            <li>{{ $error}}</li>
          @endforeach
        </ul>
      </div>
    @endif
    {{ Form::open(['route' => 'lotes.store']) }}
      <div class="row">
        <input type="hidden" name="_token" value="{{ csrf_token()}}" id="token">
        <div class="col-sm-8 col-md-offset-2" id="formulario">
          <div class="input-group separacion">
            <span class="input-group-addon"><i class="fa fa-th-large fa-2x"></i></span>
            <div class="form-group label-floating">
                <label class="control-label">Nombre Lote</label>
                <input type="text" name="nombreLot" class="form-control" id="nombreLot" value="{{ old('nombreLot')}}">
            </div>
          </div>
          <div class="input-group separacion">
            <span class="input-group-addon"><i class="fa fa-handshake-o fa-2x"></i></span>
            <div class="form-group label-floating">
                <label class="control-label">Pollitas Recibidas</label>
                <input type="text" name="pollitasLot" class="form-control" id="pollitasLot" value="{{ old('pollitasLot')}}" onkeypress ="return SoloNumerosEnteros(event)">
            </div>
          </div>
          <div class="input-group separacion">
            <span class="input-group-addon"><i class="fa fa-calendar fa-2x"></i></span>
            <div class="form-group label-floating">
                <label class="control-label">Fecha Encasetamiento</label>
                <input id="datepicker" type="text" name="encasetamientoLot" class="form-control datepicker-input" id="encasetamientoLot" value="{{ old('encasetamientoLot')}}" autocomplete="off" readonly>               
            </div>
          </div>
          <label id="lbl">Variedad</label>
          <div class="input-group separacion">
            <select id="variedad" name="idVariedad" class="select2">
              <option value="" disabled selected>Seleccione la Variedad</option>
                @foreach($variedads as $Variedad)
                  <option value="{{$Variedad->id}}">{{$Variedad->nombreVar}}</option>
                @endforeach
            </select>
            <br/>
            <br/>
          </div>
          <label id="lbl">Granja</label>
          <div class="input-group separacion">
            <select id="granja" name="idGranja" class="select2">
              <option value="" disabled selected>Seleccione la Granja</option>
                @foreach($granjas as $Granja)
                  <option value="{{$Granja->id}}">{{$Granja->nombreGra}}</option>
                @endforeach
            </select>
            <br/>
            <br/>
          </div>
          <label id="lbl">Sistema</label>
          <div class="input-group separacion">
            <select id="sistema" name="idSistema" class="inputs_sublotes select2">
              <option value="" disabled selected>Seleccione la Sistema</option>
                @foreach($sistemas as $Sistema)
                  <option value="{{$Sistema->id}}">{{$Sistema->nombreSis}}</option>
                @endforeach
            </select>
            <br/>
            <br/>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-sm-12">
          <div>
            <a type="button" class="boton" id="boton_sublote">Crear Sublote</a>
          </div>
          <div class="separacion" id="row_separacion">
          </div>
          <div>
            <button id="boton_formulario">Guardar</button>
          </div>
        </div>
      </div>
    {{ Form::close() }}
  @endsection
