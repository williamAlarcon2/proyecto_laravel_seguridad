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
    {!! Form::model($lotes, ['route' => ['lotes.update', $lotes->id],'method' => 'PUT']) !!}
      <div class="row">
        <input type="hidden" name="_token" value="{{ csrf_token()}}" id="token">
        <div class="col-sm-8 col-md-offset-2" id="formulario">
          <div class="input-group separacion">
            <span class="input-group-addon"><i class="fa fa-th-large fa-2x"></i></span>
            <div class="form-group label-floating">
                <label class="control-label">Nombre Lote</label>
                <input type="text" name="nombreLot" class="form-control" id="nombreLot" value="{{ old('nombreLot' , $lotes->nombreLot)}}">
            </div>
          </div>
          <div class="input-group separacion">
            <span class="input-group-addon"><i class="fa fa-handshake-o fa-2x"></i></span>
            <div class="form-group label-floating">
                <label class="control-label">Pollitas Recibidas</label>
                <input type="text" name="pollitasLot" class="form-control" id="pollitasLot" value="{{ old('pollitasLot', $lotes->pollitasLot)}}" onkeypress ="return SoloNumerosEnteros(event)">
            </div>
          </div>
          <div class="input-group separacion">
            <span class="input-group-addon"><i class="fa fa-calendar fa-2x"></i></span>
            <div class="form-group label-floating">
                <label class="control-label">Fecha Encasetamiento</label>
                <input type="text" name="encasetamientoLot" class="form-control" id="datepicker" value="{{ old('encasetamientoLot', $lotes->encasetamientoLot)}}" autocomplete="off" readonly>
            </div>
          </div>
          <label id="lbl">Variedad</label>
          <div class="input-group separacion">
            <select id="variedad" name="idVariedad" class="select2">
                @foreach($lotevariedads as $Lotevariedad)
                  <option value="{{$Lotevariedad->idVariedad}}">{{$Lotevariedad->nombreVar}}</option>
                @endforeach
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
                @foreach($lotegranjas as $Lotegranja)
                  <option value="{{$Lotegranja->idGranja}}">{{$Lotegranja->nombreGra}}</option>
                @endforeach
                @foreach($granjas as $Granja)
                  <option value="{{$Granja->id}}">{{$Granja->nombreGra}}</option>
                @endforeach
            </select>
            <br/>
            <br/>
          </div>
          <label id="lbl">Sistema</label>
          <div class="input-group separacion">
            <select id="sistema" name="idSistema" class="select2">
                @foreach($lotesistemas as $Lotesistema)
                  <option value="{{$Lotesistema->idSistema}}">{{$Lotesistema->nombreSis}}</option>
                @endforeach
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
           @foreach($sublotes as $Sublotes)
            @if($sublotes != null)
              <div class="input-group separacion">
                <a href="{{ route('subloteslotes', $lotes->id) }}" class="btn"><i class="fa fa-eye" aria-hidden="true"></i> Ver Sublotes</a>
              </div>
            @endif
          @endforeach

          <div>
            <a type="button" class="boton" id="boton_sublote">Crear Sublote</a>
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
