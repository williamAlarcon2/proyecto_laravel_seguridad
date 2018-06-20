@extends('layouts.app')
  @section('content')
    <h4 class="with-border">Ponedoras Produccion</h4>
    @if ($errors->any())
      <div class=" col-md-offset-2 separacion alert alert-danger">
        <ul>
          @foreach ($errors->all() as $error)
            <li>{{ $error}}</li>
          @endforeach
        </ul>
      </div>
    @endif
    {!! Form::open(['route' => 'ponedorasproduccions/search', 'method' => 'post', 'novalidate']) !!}
      <div class="row">
        <div class="col-md-4 col-md-offset-4">
          <div class="form-group has-feedback search">
            <input type="text" class="form-control" name="buscar" placeholder="Buscar por nombre">
            <span class="form-control-feedback"><i class="fa fa-search fa-lg" aria-hidden="true"></i></span>
          </div>
        </div>
      </div>
    {!!Form::close() !!}
    @foreach($lotes as $Lote)
      {{ Form::open(['route' => 'ponedorasproduccions.store']) }}
        <div class="col-md-12">
          <div class="row">
            <div class="input-group separacion col-md-4 col-md-offset-4">
              <span class="input-group-addon"></span>
              <div class="form-group label-floating">
                  <label class="control-label labelponedoraslevante">Lote</label>
                  <input type="text" name="nombreLot" class="form-control" id="nombreLot" value="{{ $Lote->nombreLot}}" readonly>
              </div>
            </div>

            @if($Lote->nombreSub != null)  
            <div class="input-group separacion col-md-4 col-md-offset-4">
              <span class="input-group-addon"></span>
              <div class="form-group label-floating">
                  <label class="control-label labelponedoraslevante">Sublote</label>
                  <input type="text" name="nombreSub" class="form-control" id="nombreSub" value="{{ $Lote->nombreSub}}" readonly>
              </div>
            </div>
            @endif 
          </div>
        </div>
        <div class="col-md-12">
          <div class="row">
            <div class="input-group separacion col-md-4 col-md-offset-4" style="margin-bottom: 2%;">
              <select id="guia" name="idGuia" class="select2" required>
                <option value="" disabled selected>Seleccione la Guia</option>
                  @foreach($guia as $guias)
                    <option value="{{$guias->id}}">{{$guias->nombreGui}}</option>
                  @endforeach
              </select>
            </div>
          </div>
        </div>
        <div class="col-md-12">
          <div class="row">
            <div class="input-group separacion col-md-4">
              <span class="input-group-addon"></span>
              <div class="form-group label-floating">
                  <label class="control-label labelponedoraslevante">Empresa</label>
                  <input type="text" name="nombreEmp" class="form-control" id="nombreEmp" value="{{ $Lote->nombreEmp}}" disabled>
              </div>
            </div>
            <div class="input-group separacion col-md-4">
              <span class="input-group-addon"></span>
              <div class="form-group label-floating">
                  <label class="control-label labelponedoraslevante">Altura/Nivel del mar</label>
                  <input type="text" name="alturaGra" class="form-control" id="alturaGra" value="{{ $Lote->alturaGra}}" disabled>
              </div>
            </div>
            <div class="input-group separacion col-md-4">
              <span class="input-group-addon"></span>
              <div class="form-group label-floating">
                  <label class="control-label labelponedoraslevante">Zona Avicol</label>
                  <input type="text" name="nombreZon" class="form-control" id="nombreZon" value="{{ $Lote->nombreZon}}" disabled>
              </div>
            </div>
          </div>
        </div>
        <div class="col-md-12">
          <div class="row">
            <div class="input-group separacion col-md-4">
              <span class="input-group-addon"></span>
              <div class="form-group label-floating">
                  <label class="control-label labelponedoraslevante">Variedad</label>
                  <input type="text" name="nombreVar" class="form-control" id="nombreVar" value="{{ $Lote->nombreVar}}" disabled>
              </div>
            </div>
            <div class="input-group separacion col-md-4">
              <span class="input-group-addon"></span>
              <div class="form-group label-floating">
                  <label class="control-label labelponedoraslevante">Granja</label>
                  <input type="text" name="nombreGra" class="form-control" id="nombreGra" value="{{ $Lote->nombreGra}}" disabled>
              </div>
            </div>
            <div class="input-group separacion col-md-4">
              <span class="input-group-addon"></span>
              <div class="form-group label-floating">
                  <label class="control-label labelponedoraslevante">Fecha Encasetamiento</label>
                  <input type="text" name="encasetamientoLot" class="form-control" id="encasetamientoLot" value="" disabled>
              </div>
            </div>
          </div>
        </div>
        <div class="col-md-12">
          <div class="row">
            <div class="input-group separacion col-md-4">
              <span class="input-group-addon"></span>
              <div class="form-group label-floating">
                  <label class="control-label labelponedoraslevante">Pais</label>
                  <input type="text" name="nombrePai" class="form-control" id="nombrePai" value="{{ $Lote->nombrePai}}" disabled>
              </div>
            </div>
            <div class="input-group separacion col-md-4">
              <span class="input-group-addon"></span>
              <div class="form-group label-floating">
                  <label class="control-label labelponedoraslevante">Departamento</label>
                  <input type="text" name="nombreDep" class="form-control" id="nombreDep" value="{{ $Lote->nombreDep}}" disabled>
              </div>
            </div>
            <div class="input-group separacion col-md-4">
              <span class="input-group-addon"></span>
              <div class="form-group label-floating">
                  <label class="control-label labelponedoraslevante">Municipio</label>
                  <input type="text" name="nombreMun" class="form-control" id="nombreMun" value="{{ $Lote->nombreMun}}" disabled>
              </div>
            </div>
          </div>
        </div>
        <div class="col-md-12">
          <div class="row">
            @if($Lote->nombreSub == null)
            <div class="input-group separacion col-md-4">
              <span class="input-group-addon"></span>
              <div class="form-group label-floating">
                  <label class="control-label labelponedoraslevante">Pollitas Recibidas Lote</label>
                  <input type="text" name="pollitasLot" class="form-control" id="pollitasLot" value="{{$Lote->pollitasLot}}" readonly>
              </div>
            </div>
            @endif
            @if($Lote->nombreSub != null)
              <div class="input-group separacion col-md-4">
                <span class="input-group-addon"></span>
                <div class="form-group label-floating">
                    <label class="control-label labelponedoraslevante">Pollitas Recibidas Sublote</label>
                    <input type="text" name="pollitasLot" class="form-control" id="pollitasLot" value="{{$Lote->pollitasSub}}" readonly>
                </div>
              </div>
            @endif
            <div class="input-group separacion col-md-4">
              <span class="input-group-addon"></span>
              <div class="form-group label-floating">
                  <label class="control-label labelponedoraslevante">Clima</label>
                  <input type="text" name="nombreCli" class="form-control" id="nombreCli" value="{{ $Lote->nombreCli}}" disabled>
              </div>
            </div>
            <div class="input-group separacion col-md-4">
              <span class="input-group-addon"></span>
              <div class="form-group label-floating">
                  <label class="control-label labelponedoraslevante">Sistema Explotacion</label>
                  <input type="text" name="nombreSis" class="form-control" id="nombreSis" value="{{ $Lote->nombreSis}}" disabled>
              </div>
            </div>
          </div>
        </div>
        <input type="hidden" name="idLote" value="{{ $Lote->id}}">
        <div class="col-md-12">
            <div class="row">              
              @if($Lote->nombreSub == null)
              <div class="input-group separacion col-md-4 col-md-offset-2">
                <span class="input-group-addon"></span>
                <div class="form-group label-floating">
                    <label class="control-label labelponedoraslevante">Pollitas Recibidas Produccion Lote</label>
                    <input type="text" name="pollitasPpr" class="form-control" id="pollitasPpr" value="{{ old('pollitasPpr' , $Lote->pollitasLot) }}" onkeypress ="return SoloNumerosEnteros(event)">
                </div>
              </div>
              @endif
              @if($Lote->nombreSub != null)
              <div class="input-group separacion col-md-4 col-md-offset-2">
                <span class="input-group-addon"></span>
                <div class="form-group label-floating">
                    <label class="control-label labelponedoraslevante">Pollitas Recibidas Produccion Sublote</label>
                    <input type="text" name="pollitasPpr" class="form-control" id="pollitasPpr" value="{{ old('pollitasPpr' , $Lote->pollitasSub) }}" onkeypress ="return SoloNumerosEnteros(event)">
                </div>
              </div>
              @endif
              <div class="input-group separacion col-md-4">
                <span class="input-group-addon"></span>
                <div class="form-group label-floating">
                    <label class="control-label labelponedoraslevante">Foto Estimulo</label>
                    <input type="text" name="fotoestimuloPpr" class="form-control" id="fotoestimuloPpr" value="{{ old('fotoestimuloPpr')}}" onkeypress ="return SoloNumerosEnteros(event)" data-toggle="tooltip" data-placement="right" data-original-title="Digite un Foto Estimulo entre 15 y 19">
                </div>
              </div>
            </div>
            <div class="row">  
              <div class="input-group separacion col-md-4">
                <label class="labelponedoraslevante">Programa de Luz</label></br></br>
              </div>
              <div class="input-group separacion col-md-4">
                <div class="checkbox-detailed checkno">
                  <input type="checkbox" name="programaPpr" value="No" id="check-det-1"/>
                  <label for="check-det-1">
                  <span class="checkbox-detailed-tbl">
                    <span class="checkbox-detailed-cell">
                      <span class="checkbox-detailed-title">No</span>
                    </span>
                  </span>
                  </label>
                </div>
              </div>
              <div class="input-group separacion col-md-4">
                <button class="btn btn-primary checkno" type="button" data-toggle="collapse" data-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample" id="accesos_limitados">
                  <label id="Accesos">Si</label>
                </button>
              </div>
            </div>            
            <div class="collapse" id="collapseExample">
              <div>
                <div class="col-md-12">
                  <div class="row">
                    <div class="input-group separacion col-md-5 col-md-offset-3">
                      <span class="input-group-addon"></span>
                      <div class="form-group label-floating">
                          <label class="control-label">Fotoperiodo</label>
                          <input type="text" name="fotoperiodoPpr" class="form-control" id="fotoperiodoPpr" value="{{ $Lote->fotoperiodoPpr}}" onkeypress ="return SoloNumerosEnteros(event)" data-toggle="tooltip" data-placement="right" data-original-title="Digite un Fotoperiodo entre 12 y 16">
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            @if($Lote->nombreLot != null and $Lote->nombreSub == null)
              <input type="hidden" name="idLote" value="{{ $Lote->id}}">
            @endif
            @if($Lote->nombreSub != null)
              <input type="hidden" name="idSublote" value="{{ $Lote->id}}">
            @endif
            <table class="table table-bordered">
              <thead>
                <tr>
                  <th>Semana Produccion</th>
                  <th>Fecha FDS</th>
                  <th>Semana Vida</th>
                  <th>Huevos Total</th>
                  <th>Consumo Kg</th>
                  <th>Mortalidad</th>
                  <th>Seleccion</th>
                  <th>Ventas</th>
                  <th>Peso Ave</th>
                  <th>Peso Huevo</th>
                  <th>Alimento</th>
                  <th>Observaciones</th>
                  <th>Clasificacion Huevos</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td>1</td>
                  <td><input type="text" name="dfsPpr" value="{{ old('dfsPpr')}}"></td>
                  <td><input type="text" name="semanavidaPpr" value="{{ old('semanavidaPpr')}}"></td>
                  <td><input type="text" name="huevosPpr" value="{{ old('huevosPpr')}}" onkeypress ="return SoloNumerosEnteros(event)"></td>
                  <td><input type="text" name="consumoPpr" value="{{ old('consumoPpr')}}" onkeypress ="return SoloNumerosEnteros(event)"></td>
                  <td><input type="text" name="mortalidadPpr" value="{{ old('mortalidadPpr')}}" onkeypress ="return SoloNumerosEnteros(event)"></td>
                  <td><input type="text" name="seleccionPpr" value="{{ old('seleccionPpr')}}" onkeypress ="return SoloNumerosEnteros(event)"></td>
                  <td><input type="text" name="ventasPpr" value="{{ old('ventasPpr')}}" onkeypress ="return SoloNumerosEnteros(event)"></td>
                  <td><input type="text" name="pesoavePpr" value="{{ old('pesoavePpr')}}" onkeypress ="return SoloNumerosEnteros(event)"></td>
                  <td><input type="text" name="pesohuevoPpr" value="{{ old('pesohuevoPpr')}}" onkeypress ="return SoloNumerosEnteros(event)"></td>
                  <td><input type="text" name="alimentoPpr" value="{{ old('alimentoPpr')}}"></td>
                  <td><input type="text" name="ObservacionesPpr" value="{{ old('ObservacionesPpr')}}"></td>
                  <td><a href="#" class="btn"><i class="fa fa-plus-circle" aria-hidden="true"></i></a></td>
                </tr>
                <tr>
                  <td>2</td>
                  <td><input type="text" name="dfsPpr1" value="{{ old('dfsPpr1')}}"></td>
                  <td><input type="text" name="semanavidaPpr1" value="{{ old('semanavidaPpr1')}}"></td>
                  <td><input type="text" name="huevosPpr1" value="{{ old('huevosPpr1')}}" onkeypress ="return SoloNumerosEnteros(event)"></td>
                  <td><input type="text" name="consumoPpr1" value="{{ old('consumoPpr1')}}" onkeypress ="return SoloNumerosEnteros(event)"></td>
                  <td><input type="text" name="mortalidadPpr1" value="{{ old('mortalidadPpr1')}}" onkeypress ="return SoloNumerosEnteros(event)"></td>
                  <td><input type="text" name="seleccionPpr1" value="{{ old('seleccionPpr1')}}" onkeypress ="return SoloNumerosEnteros(event)"></td>
                  <td><input type="text" name="ventasPpr1" value="{{ old('ventasPpr1')}}" onkeypress ="return SoloNumerosEnteros(event)"></td>
                  <td><input type="text" name="pesoavePpr1" value="{{ old('pesoavePpr1')}}" onkeypress ="return SoloNumerosEnteros(event)"></td>
                  <td><input type="text" name="pesohuevoPpr1" value="{{ old('pesohuevoPpr1')}}" onkeypress ="return SoloNumerosEnteros(event)"></td>
                  <td><input type="text" name="alimentoPpr1" value="{{ old('alimentoPpr1')}}"></td>
                  <td><input type="text" name="ObservacionesPpr1" value="{{ old('ObservacionesPpr1')}}"></td>
                  <td><a href="#" class="btn"><i class="fa fa-plus-circle" aria-hidden="true"></i></a></td>
                </tr>
                <tr>
                  <td>3</td>
                  <td><input type="text" name="dfsPpr2" value="{{ old('dfsPpr2')}}"></td>
                  <td><input type="text" name="semanavidaPpr2" value="{{ old('semanavidaPpr2')}}"></td>
                  <td><input type="text" name="huevosPpr2" value="{{ old('huevosPpr2')}}" onkeypress ="return SoloNumerosEnteros(event)"></td>
                  <td><input type="text" name="consumoPpr2" value="{{ old('consumoPpr2')}}" onkeypress ="return SoloNumerosEnteros(event)"></td>
                  <td><input type="text" name="mortalidadPpr2" value="{{ old('mortalidadPpr2')}}" onkeypress ="return SoloNumerosEnteros(event)"></td>
                  <td><input type="text" name="seleccionPpr2" value="{{ old('seleccionPpr2')}}" onkeypress ="return SoloNumerosEnteros(event)"></td>
                  <td><input type="text" name="ventasPpr2" value="{{ old('ventasPpr2')}}" onkeypress ="return SoloNumerosEnteros(event)"></td>
                  <td><input type="text" name="pesoavePpr2" value="{{ old('pesoavePpr2')}}" onkeypress ="return SoloNumerosEnteros(event)"></td>
                  <td><input type="text" name="pesohuevoPpr2" value="{{ old('pesohuevoPpr2')}}" onkeypress ="return SoloNumerosEnteros(event)"></td>
                  <td><input type="text" name="alimentoPpr2" value="{{ old('alimentoPpr2')}}"></td>
                  <td><input type="text" name="ObservacionesPpr2" value="{{ old('ObservacionesPpr2')}}"></td>
                  <td><a href="#" class="btn"><i class="fa fa-plus-circle" aria-hidden="true"></i></a></td>
                </tr>
                <tr>
                  <td>4</td>
                  <td><input type="text" name="dfsPpr3" value="{{ old('dfsPpr3')}}"></td>
                  <td><input type="text" name="semanavidaPpr3" value="{{ old('semanavidaPpr3')}}"></td>
                  <td><input type="text" name="huevosPpr3" value="{{ old('huevosPpr3')}}" onkeypress ="return SoloNumerosEnteros(event)"></td>
                  <td><input type="text" name="consumoPpr3" value="{{ old('consumoPpr3')}}" onkeypress ="return SoloNumerosEnteros(event)"></td>
                  <td><input type="text" name="mortalidadPpr3" value="{{ old('mortalidadPpr3')}}" onkeypress ="return SoloNumerosEnteros(event)"></td>
                  <td><input type="text" name="seleccionPpr3" value="{{ old('seleccionPpr3')}}" onkeypress ="return SoloNumerosEnteros(event)"></td>
                  <td><input type="text" name="ventasPpr3" value="{{ old('ventasPpr3')}}" onkeypress ="return SoloNumerosEnteros(event)"></td>
                  <td><input type="text" name="pesoavePpr3" value="{{ old('pesoavePpr3')}}" onkeypress ="return SoloNumerosEnteros(event)"></td>
                  <td><input type="text" name="pesohuevoPpr3" value="{{ old('pesohuevoPpr3')}}" onkeypress ="return SoloNumerosEnteros(event)"></td>
                  <td><input type="text" name="alimentoPpr3" value="{{ old('alimentoPpr3')}}"></td>
                  <td><input type="text" name="ObservacionesPpr3" value="{{ old('ObservacionesPpr3')}}"></td>
                  <td><a href="#" class="btn"><i class="fa fa-plus-circle" aria-hidden="true"></i></a></td>
                </tr>
                <tr>
                  <td>5</td>
                  <td><input type="text" name="dfsPpr4" value="{{ old('dfsPpr4')}}"></td>
                  <td><input type="text" name="semanavidaPpr4" value="{{ old('semanavidaPpr4')}}"></td>
                  <td><input type="text" name="huevosPpr4" value="{{ old('huevosPpr4')}}" onkeypress ="return SoloNumerosEnteros(event)"></td>
                  <td><input type="text" name="consumoPpr4" value="{{ old('consumoPpr4')}}" onkeypress ="return SoloNumerosEnteros(event)"></td>
                  <td><input type="text" name="mortalidadPpr4" value="{{ old('mortalidadPpr4')}}" onkeypress ="return SoloNumerosEnteros(event)"></td>
                  <td><input type="text" name="seleccionPpr4" value="{{ old('seleccionPpr4')}}" onkeypress ="return SoloNumerosEnteros(event)"></td>
                  <td><input type="text" name="ventasPpr4" value="{{ old('ventasPpr4')}}" onkeypress ="return SoloNumerosEnteros(event)"></td>
                  <td><input type="text" name="pesoavePpr4" value="{{ old('pesoavePpr4')}}" onkeypress ="return SoloNumerosEnteros(event)"></td>
                  <td><input type="text" name="pesohuevoPpr4" value="{{ old('pesohuevoPpr4')}}" onkeypress ="return SoloNumerosEnteros(event)"></td>
                  <td><input type="text" name="alimentoPpr4" value="{{ old('alimentoPpr4')}}"></td>
                  <td><input type="text" name="ObservacionesPpr4" value="{{ old('ObservacionesPpr4')}}"></td>
                  <td><a href="#" class="btn"><i class="fa fa-plus-circle" aria-hidden="true"></i></a></td>
                </tr>
                <tr>
                  <td>6</td>
                  <td><input type="text" name="dfsPpr5" value="{{ old('dfsPpr5')}}"></td>
                  <td><input type="text" name="semanavidaPpr5" value="{{ old('semanavidaPpr5')}}"></td>
                  <td><input type="text" name="huevosPpr5" value="{{ old('huevosPpr5')}}" onkeypress ="return SoloNumerosEnteros(event)"></td>
                  <td><input type="text" name="consumoPpr5" value="{{ old('consumoPpr5')}}" onkeypress ="return SoloNumerosEnteros(event)"></td>
                  <td><input type="text" name="mortalidadPpr5" value="{{ old('mortalidadPpr5')}}" onkeypress ="return SoloNumerosEnteros(event)"></td>
                  <td><input type="text" name="seleccionPpr5" value="{{ old('seleccionPpr5')}}" onkeypress ="return SoloNumerosEnteros(event)"></td>
                  <td><input type="text" name="ventasPpr5" value="{{ old('ventasPpr5')}}" onkeypress ="return SoloNumerosEnteros(event)"></td>
                  <td><input type="text" name="pesoavePpr5" value="{{ old('pesoavePpr5')}}" onkeypress ="return SoloNumerosEnteros(event)"></td>
                  <td><input type="text" name="pesohuevoPpr5" value="{{ old('pesohuevoPpr5')}}" onkeypress ="return SoloNumerosEnteros(event)"></td>
                  <td><input type="text" name="alimentoPpr5" value="{{ old('alimentoPpr5')}}"></td>
                  <td><input type="text" name="ObservacionesPpr5" value="{{ old('ObservacionesPpr5')}}"></td>
                  <td><a href="#" class="btn"><i class="fa fa-plus-circle" aria-hidden="true"></i></a></td>
                </tr>
                <tr>
                  <td>7</td>
                  <td><input type="text" name="dfsPpr6" value="{{ old('dfsPpr6')}}"></td>
                  <td><input type="text" name="semanavidaPpr6" value="{{ old('semanavidaPpr6')}}"></td>
                  <td><input type="text" name="huevosPpr6" value="{{ old('huevosPpr6')}}" onkeypress ="return SoloNumerosEnteros(event)"></td>
                  <td><input type="text" name="consumoPpr6" value="{{ old('consumoPpr6')}}" onkeypress ="return SoloNumerosEnteros(event)"></td>
                  <td><input type="text" name="mortalidadPpr6" value="{{ old('mortalidadPpr6')}}" onkeypress ="return SoloNumerosEnteros(event)"></td>
                  <td><input type="text" name="seleccionPpr6" value="{{ old('seleccionPpr6')}}" onkeypress ="return SoloNumerosEnteros(event)"></td>
                  <td><input type="text" name="ventasPpr6" value="{{ old('ventasPpr6')}}" onkeypress ="return SoloNumerosEnteros(event)"></td>
                  <td><input type="text" name="pesoavePpr6" value="{{ old('pesoavePpr6')}}" onkeypress ="return SoloNumerosEnteros(event)"></td>
                  <td><input type="text" name="pesohuevoPpr6" value="{{ old('pesohuevoPpr6')}}" onkeypress ="return SoloNumerosEnteros(event)"></td>
                  <td><input type="text" name="alimentoPpr6" value="{{ old('alimentoPpr6')}}"></td>
                  <td><input type="text" name="ObservacionesPpr6" value="{{ old('ObservacionesPpr6')}}"></td>
                  <td><a href="#" class="btn"><i class="fa fa-plus-circle" aria-hidden="true"></i></a></td>
                </tr>
                <tr>
                  <td>8</td>
                  <td><input type="text" name="dfsPpr7" value="{{ old('dfsPpr7')}}"></td>
                  <td><input type="text" name="semanavidaPpr7" value="{{ old('semanavidaPpr7')}}"></td>
                  <td><input type="text" name="huevosPpr7" value="{{ old('huevosPpr7')}}" onkeypress ="return SoloNumerosEnteros(event)"></td>
                  <td><input type="text" name="consumoPpr7" value="{{ old('consumoPpr7')}}" onkeypress ="return SoloNumerosEnteros(event)"></td>
                  <td><input type="text" name="mortalidadPpr7" value="{{ old('mortalidadPpr7')}}" onkeypress ="return SoloNumerosEnteros(event)"></td>
                  <td><input type="text" name="seleccionPpr7" value="{{ old('seleccionPpr7')}}" onkeypress ="return SoloNumerosEnteros(event)"></td>
                  <td><input type="text" name="ventasPpr7" value="{{ old('ventasPpr7')}}" onkeypress ="return SoloNumerosEnteros(event)"></td>
                  <td><input type="text" name="pesoavePpr7" value="{{ old('pesoavePpr7')}}" onkeypress ="return SoloNumerosEnteros(event)"></td>
                  <td><input type="text" name="pesohuevoPpr7" value="{{ old('pesohuevoPpr7')}}" onkeypress ="return SoloNumerosEnteros(event)"></td>
                  <td><input type="text" name="alimentoPpr7" value="{{ old('alimentoPpr7')}}"></td>
                  <td><input type="text" name="ObservacionesPpr7" value="{{ old('ObservacionesPpr7')}}"></td>
                  <td><a href="#" class="btn"><i class="fa fa-plus-circle" aria-hidden="true"></i></a></td>
                </tr>
                <tr>
                  <td>9</td>
                  <td><input type="text" name="dfsPpr8" value="{{ old('dfsPpr8')}}"></td>
                  <td><input type="text" name="semanavidaPpr8" value="{{ old('semanavidaPpr8')}}"></td>
                  <td><input type="text" name="huevosPpr8" value="{{ old('huevosPpr8')}}" onkeypress ="return SoloNumerosEnteros(event)"></td>
                  <td><input type="text" name="consumoPpr8" value="{{ old('consumoPpr8')}}" onkeypress ="return SoloNumerosEnteros(event)"></td>
                  <td><input type="text" name="mortalidadPpr8" value="{{ old('mortalidadPpr8')}}" onkeypress ="return SoloNumerosEnteros(event)"></td>
                  <td><input type="text" name="seleccionPpr8" value="{{ old('seleccionPpr8')}}" onkeypress ="return SoloNumerosEnteros(event)"></td>
                  <td><input type="text" name="ventasPpr8" value="{{ old('ventasPpr8')}}" onkeypress ="return SoloNumerosEnteros(event)"></td>
                  <td><input type="text" name="pesoavePpr8" value="{{ old('pesoavePpr8')}}" onkeypress ="return SoloNumerosEnteros(event)"></td>
                  <td><input type="text" name="pesohuevoPpr8" value="{{ old('pesohuevoPpr8')}}" onkeypress ="return SoloNumerosEnteros(event)"></td>
                  <td><input type="text" name="alimentoPpr8" value="{{ old('alimentoPpr8')}}"></td>
                  <td><input type="text" name="ObservacionesPpr8" value="{{ old('ObservacionesPpr8')}}"></td>
                  <td><a href="#" class="btn"><i class="fa fa-plus-circle" aria-hidden="true"></i></a></td>
                </tr>
                <tr>
                  <td>10</td>
                  <td><input type="text" name="dfsPpr9" value="{{ old('dfsPpr9')}}"></td>
                  <td><input type="text" name="semanavidaPpr9" value="{{ old('semanavidaPpr9')}}"></td>
                  <td><input type="text" name="huevosPpr9" value="{{ old('huevosPpr9')}}" onkeypress ="return SoloNumerosEnteros(event)"></td>
                  <td><input type="text" name="consumoPpr9" value="{{ old('consumoPpr9')}}" onkeypress ="return SoloNumerosEnteros(event)"></td>
                  <td><input type="text" name="mortalidadPpr9" value="{{ old('mortalidadPpr9')}}" onkeypress ="return SoloNumerosEnteros(event)"></td>
                  <td><input type="text" name="seleccionPpr9" value="{{ old('seleccionPpr9')}}" onkeypress ="return SoloNumerosEnteros(event)"></td>
                  <td><input type="text" name="ventasPpr9" value="{{ old('ventasPpr9')}}" onkeypress ="return SoloNumerosEnteros(event)"></td>
                  <td><input type="text" name="pesoavePpr9" value="{{ old('pesoavePpr9')}}" onkeypress ="return SoloNumerosEnteros(event)"></td>
                  <td><input type="text" name="pesohuevoPpr9" value="{{ old('pesohuevoPpr9')}}" onkeypress ="return SoloNumerosEnteros(event)"></td>
                  <td><input type="text" name="alimentoPpr9" value="{{ old('alimentoPpr9')}}"></td>
                  <td><input type="text" name="ObservacionesPpr9" value="{{ old('ObservacionesPpr9')}}"></td>
                  <td><a href="#" class="btn"><i class="fa fa-plus-circle" aria-hidden="true"></i></a></td>
                </tr>
                <tr>
                  <td>11</td>
                  <td><input type="text" name="dfsPpr10" value="{{ old('dfsPpr10')}}"></td>
                  <td><input type="text" name="semanavidaPpr10" value="{{ old('semanavidaPpr10')}}"></td>
                  <td><input type="text" name="huevosPpr10" value="{{ old('huevosPpr10')}}" onkeypress ="return SoloNumerosEnteros(event)"></td>
                  <td><input type="text" name="consumoPpr10" value="{{ old('consumoPpr10')}}" onkeypress ="return SoloNumerosEnteros(event)"></td>
                  <td><input type="text" name="mortalidadPpr10" value="{{ old('mortalidadPpr10')}}" onkeypress ="return SoloNumerosEnteros(event)"></td>
                  <td><input type="text" name="seleccionPpr10" value="{{ old('seleccionPpr10')}}" onkeypress ="return SoloNumerosEnteros(event)"></td>
                  <td><input type="text" name="ventasPpr10" value="{{ old('ventasPpr10')}}" onkeypress ="return SoloNumerosEnteros(event)"></td>
                  <td><input type="text" name="pesoavePpr10" value="{{ old('pesoavePpr10')}}" onkeypress ="return SoloNumerosEnteros(event)"></td>
                  <td><input type="text" name="pesohuevoPpr10" value="{{ old('pesohuevoPpr10')}}" onkeypress ="return SoloNumerosEnteros(event)"></td>
                  <td><input type="text" name="alimentoPpr10" value="{{ old('alimentoPpr10')}}"></td>
                  <td><input type="text" name="ObservacionesPpr10" value="{{ old('ObservacionesPpr10')}}"></td>
                  <td><a href="#" class="btn"><i class="fa fa-plus-circle" aria-hidden="true"></i></a></td>
                </tr>








                <tr>
                  <td>12</td>
                  <td><input type="text" name="dfsPpr11" value="{{ old('dfsPpr11')}}"></td>
                  <td><input type="text" name="semanavidaPpr11" value="{{ old('semanavidaPpr11')}}"></td>
                  <td><input type="text" name="huevosPpr11" value="{{ old('huevosPpr11')}}" onkeypress ="return SoloNumerosEnteros(event)"></td>
                  <td><input type="text" name="consumoPpr11" value="{{ old('consumoPpr11')}}" onkeypress ="return SoloNumerosEnteros(event)"></td>
                  <td><input type="text" name="mortalidadPpr11" value="{{ old('mortalidadPpr11')}}" onkeypress ="return SoloNumerosEnteros(event)"></td>
                  <td><input type="text" name="seleccionPpr11" value="{{ old('seleccionPpr11')}}" onkeypress ="return SoloNumerosEnteros(event)"></td>
                  <td><input type="text" name="ventasPpr11" value="{{ old('ventasPpr11')}}" onkeypress ="return SoloNumerosEnteros(event)"></td>
                  <td><input type="text" name="pesoavePpr11" value="{{ old('pesoavePpr11')}}" onkeypress ="return SoloNumerosEnteros(event)"></td>
                  <td><input type="text" name="pesohuevoPpr11" value="{{ old('pesohuevoPpr11')}}" onkeypress ="return SoloNumerosEnteros(event)"></td>
                  <td><input type="text" name="alimentoPpr11" value="{{ old('alimentoPpr11')}}"></td>
                  <td><input type="text" name="ObservacionesPpr11" value="{{ old('ObservacionesPpr11')}}"></td>
                  <td><a href="#" class="btn"><i class="fa fa-plus-circle" aria-hidden="true"></i></a></td>
                </tr>
                <tr>
                  <td>13</td>
                  <td><input type="text" name="dfsPpr12" value="{{ old('dfsPpr12')}}"></td>
                  <td><input type="text" name="semanavidaPpr12" value="{{ old('semanavidaPpr12')}}"></td>
                  <td><input type="text" name="huevosPpr12" value="{{ old('huevosPpr12')}}" onkeypress ="return SoloNumerosEnteros(event)"></td>
                  <td><input type="text" name="consumoPpr12" value="{{ old('consumoPpr12')}}" onkeypress ="return SoloNumerosEnteros(event)"></td>
                  <td><input type="text" name="mortalidadPpr12" value="{{ old('mortalidadPpr12')}}" onkeypress ="return SoloNumerosEnteros(event)"></td>
                  <td><input type="text" name="seleccionPpr12" value="{{ old('seleccionPpr12')}}" onkeypress ="return SoloNumerosEnteros(event)"></td>
                  <td><input type="text" name="ventasPpr12" value="{{ old('ventasPpr12')}}" onkeypress ="return SoloNumerosEnteros(event)"></td>
                  <td><input type="text" name="pesoavePpr12" value="{{ old('pesoavePpr12')}}" onkeypress ="return SoloNumerosEnteros(event)"></td>
                  <td><input type="text" name="pesohuevoPpr12" value="{{ old('pesohuevoPpr12')}}" onkeypress ="return SoloNumerosEnteros(event)"></td>
                  <td><input type="text" name="alimentoPpr12" value="{{ old('alimentoPpr12')}}"></td>
                  <td><input type="text" name="ObservacionesPpr12" value="{{ old('ObservacionesPpr12')}}"></td>
                  <td><a href="#" class="btn"><i class="fa fa-plus-circle" aria-hidden="true"></i></a></td>
                </tr>
                <tr>
                  <td>14</td>
                  <td><input type="text" name="dfsPpr13" value="{{ old('dfsPpr13')}}"></td>
                  <td><input type="text" name="semanavidaPpr13" value="{{ old('semanavidaPpr13')}}"></td>
                  <td><input type="text" name="huevosPpr13" value="{{ old('huevosPpr13')}}" onkeypress ="return SoloNumerosEnteros(event)"></td>
                  <td><input type="text" name="consumoPpr13" value="{{ old('consumoPpr13')}}" onkeypress ="return SoloNumerosEnteros(event)"></td>
                  <td><input type="text" name="mortalidadPpr13" value="{{ old('mortalidadPpr13')}}" onkeypress ="return SoloNumerosEnteros(event)"></td>
                  <td><input type="text" name="seleccionPpr13" value="{{ old('seleccionPpr13')}}" onkeypress ="return SoloNumerosEnteros(event)"></td>
                  <td><input type="text" name="ventasPpr13" value="{{ old('ventasPpr13')}}" onkeypress ="return SoloNumerosEnteros(event)"></td>
                  <td><input type="text" name="pesoavePpr13" value="{{ old('pesoavePpr13')}}" onkeypress ="return SoloNumerosEnteros(event)"></td>
                  <td><input type="text" name="pesohuevoPpr13" value="{{ old('pesohuevoPpr13')}}" onkeypress ="return SoloNumerosEnteros(event)"></td>
                  <td><input type="text" name="alimentoPpr13" value="{{ old('alimentoPpr13')}}"></td>
                  <td><input type="text" name="ObservacionesPpr13" value="{{ old('ObservacionesPpr13')}}"></td>
                  <td><a href="#" class="btn"><i class="fa fa-plus-circle" aria-hidden="true"></i></a></td>
                </tr>
                <tr>
                  <td>15</td>
                  <td><input type="text" name="dfsPpr14" value="{{ old('dfsPpr14')}}"></td>
                  <td><input type="text" name="semanavidaPpr14" value="{{ old('semanavidaPpr14')}}"></td>
                  <td><input type="text" name="huevosPpr14" value="{{ old('huevosPpr14')}}" onkeypress ="return SoloNumerosEnteros(event)"></td>
                  <td><input type="text" name="consumoPpr14" value="{{ old('consumoPpr14')}}" onkeypress ="return SoloNumerosEnteros(event)"></td>
                  <td><input type="text" name="mortalidadPpr14" value="{{ old('mortalidadPpr14')}}" onkeypress ="return SoloNumerosEnteros(event)"></td>
                  <td><input type="text" name="seleccionPpr14" value="{{ old('seleccionPpr14')}}" onkeypress ="return SoloNumerosEnteros(event)"></td>
                  <td><input type="text" name="ventasPpr14" value="{{ old('ventasPpr14')}}" onkeypress ="return SoloNumerosEnteros(event)"></td>
                  <td><input type="text" name="pesoavePpr14" value="{{ old('pesoavePpr14')}}" onkeypress ="return SoloNumerosEnteros(event)"></td>
                  <td><input type="text" name="pesohuevoPpr14" value="{{ old('pesohuevoPpr14')}}" onkeypress ="return SoloNumerosEnteros(event)"></td>
                  <td><input type="text" name="alimentoPpr14" value="{{ old('alimentoPpr14')}}"></td>
                  <td><input type="text" name="ObservacionesPpr14" value="{{ old('ObservacionesPpr14')}}"></td>
                  <td><a href="#" class="btn"><i class="fa fa-plus-circle" aria-hidden="true"></i></a></td>
                </tr>
                <tr>
                  <td>16</td>
                  <td><input type="text" name="dfsPpr15" value="{{ old('dfsPpr15')}}"></td>
                  <td><input type="text" name="semanavidaPpr15" value="{{ old('semanavidaPpr15')}}"></td>
                  <td><input type="text" name="huevosPpr15" value="{{ old('huevosPpr15')}}" onkeypress ="return SoloNumerosEnteros(event)"></td>
                  <td><input type="text" name="consumoPpr15" value="{{ old('consumoPpr15')}}" onkeypress ="return SoloNumerosEnteros(event)"></td>
                  <td><input type="text" name="mortalidadPpr15" value="{{ old('mortalidadPpr15')}}" onkeypress ="return SoloNumerosEnteros(event)"></td>
                  <td><input type="text" name="seleccionPpr15" value="{{ old('seleccionPpr15')}}" onkeypress ="return SoloNumerosEnteros(event)"></td>
                  <td><input type="text" name="ventasPpr15" value="{{ old('ventasPpr15')}}" onkeypress ="return SoloNumerosEnteros(event)"></td>
                  <td><input type="text" name="pesoavePpr15" value="{{ old('pesoavePpr15')}}" onkeypress ="return SoloNumerosEnteros(event)"></td>
                  <td><input type="text" name="pesohuevoPpr15" value="{{ old('pesohuevoPpr15')}}" onkeypress ="return SoloNumerosEnteros(event)"></td>
                  <td><input type="text" name="alimentoPpr15" value="{{ old('alimentoPpr15')}}"></td>
                  <td><input type="text" name="ObservacionesPpr15" value="{{ old('ObservacionesPpr15')}}"></td>
                  <td><a href="#" class="btn"><i class="fa fa-plus-circle" aria-hidden="true"></i></a></td>
                </tr>
                <tr>
                  <td>17</td>
                  <td><input type="text" name="dfsPpr16" value="{{ old('dfsPpr16')}}"></td>
                  <td><input type="text" name="semanavidaPpr16" value="{{ old('semanavidaPpr16')}}"></td>
                  <td><input type="text" name="huevosPpr16" value="{{ old('huevosPpr16')}}" onkeypress ="return SoloNumerosEnteros(event)"></td>
                  <td><input type="text" name="consumoPpr16" value="{{ old('consumoPpr16')}}" onkeypress ="return SoloNumerosEnteros(event)"></td>
                  <td><input type="text" name="mortalidadPpr16" value="{{ old('mortalidadPpr16')}}" onkeypress ="return SoloNumerosEnteros(event)"></td>
                  <td><input type="text" name="seleccionPpr16" value="{{ old('seleccionPpr16')}}" onkeypress ="return SoloNumerosEnteros(event)"></td>
                  <td><input type="text" name="ventasPpr16" value="{{ old('ventasPpr16')}}" onkeypress ="return SoloNumerosEnteros(event)"></td>
                  <td><input type="text" name="pesoavePpr16" value="{{ old('pesoavePpr16')}}" onkeypress ="return SoloNumerosEnteros(event)"></td>
                  <td><input type="text" name="pesohuevoPpr16" value="{{ old('pesohuevoPpr16')}}" onkeypress ="return SoloNumerosEnteros(event)"></td>
                  <td><input type="text" name="alimentoPpr16" value="{{ old('alimentoPpr16')}}"></td>
                  <td><input type="text" name="ObservacionesPpr16" value="{{ old('ObservacionesPpr16')}}"></td>
                  <td><a href="#" class="btn"><i class="fa fa-plus-circle" aria-hidden="true"></i></a></td>
                </tr>
                <tr>
                  <td>18</td>
                  <td><input type="text" name="dfsPpr17" value="{{ old('dfsPpr17')}}"></td>
                  <td><input type="text" name="semanavidaPpr17" value="{{ old('semanavidaPpr17')}}"></td>
                  <td><input type="text" name="huevosPpr17" value="{{ old('huevosPpr17')}}" onkeypress ="return SoloNumerosEnteros(event)"></td>
                  <td><input type="text" name="consumoPpr17" value="{{ old('consumoPpr17')}}" onkeypress ="return SoloNumerosEnteros(event)"></td>
                  <td><input type="text" name="mortalidadPpr17" value="{{ old('mortalidadPpr17')}}" onkeypress ="return SoloNumerosEnteros(event)"></td>
                  <td><input type="text" name="seleccionPpr17" value="{{ old('seleccionPpr17')}}" onkeypress ="return SoloNumerosEnteros(event)"></td>
                  <td><input type="text" name="ventasPpr17" value="{{ old('ventasPpr17')}}" onkeypress ="return SoloNumerosEnteros(event)"></td>
                  <td><input type="text" name="pesoavePpr17" value="{{ old('pesoavePpr17')}}" onkeypress ="return SoloNumerosEnteros(event)"></td>
                  <td><input type="text" name="pesohuevoPpr17" value="{{ old('pesohuevoPpr17')}}" onkeypress ="return SoloNumerosEnteros(event)"></td>
                  <td><input type="text" name="alimentoPpr17" value="{{ old('alimentoPpr17')}}"></td>
                  <td><input type="text" name="ObservacionesPpr17" value="{{ old('ObservacionesPpr17')}}"></td>
                  <td><a href="#" class="btn"><i class="fa fa-plus-circle" aria-hidden="true"></i></a></td>
                </tr>
                <tr>
                  <td>19</td>
                  <td><input type="text" name="dfsPpr18" value="{{ old('dfsPpr18')}}"></td>
                  <td><input type="text" name="semanavidaPpr18" value="{{ old('semanavidaPpr18')}}"></td>
                  <td><input type="text" name="huevosPpr18" value="{{ old('huevosPpr18')}}" onkeypress ="return SoloNumerosEnteros(event)"></td>
                  <td><input type="text" name="consumoPpr18" value="{{ old('consumoPpr18')}}" onkeypress ="return SoloNumerosEnteros(event)"></td>
                  <td><input type="text" name="mortalidadPpr18" value="{{ old('mortalidadPpr18')}}" onkeypress ="return SoloNumerosEnteros(event)"></td>
                  <td><input type="text" name="seleccionPpr18" value="{{ old('seleccionPpr18')}}" onkeypress ="return SoloNumerosEnteros(event)"></td>
                  <td><input type="text" name="ventasPpr18" value="{{ old('ventasPpr18')}}" onkeypress ="return SoloNumerosEnteros(event)"></td>
                  <td><input type="text" name="pesoavePpr18" value="{{ old('pesoavePpr18')}}" onkeypress ="return SoloNumerosEnteros(event)"></td>
                  <td><input type="text" name="pesohuevoPpr18" value="{{ old('pesohuevoPpr18')}}" onkeypress ="return SoloNumerosEnteros(event)"></td>
                  <td><input type="text" name="alimentoPpr18" value="{{ old('alimentoPpr18')}}"></td>
                  <td><input type="text" name="ObservacionesPpr18" value="{{ old('ObservacionesPpr18')}}"></td>
                  <td><a href="#" class="btn"><i class="fa fa-plus-circle" aria-hidden="true"></i></a></td>
                </tr>                
                <tr>
                  <td>20</td>
                  <td><input type="text" name="dfsPpr19" value="{{ old('dfsPpr19')}}"></td>
                  <td><input type="text" name="semanavidaPpr19" value="{{ old('semanavidaPpr19')}}"></td>
                  <td><input type="text" name="huevosPpr19" value="{{ old('huevosPpr19')}}" onkeypress ="return SoloNumerosEnteros(event)"></td>
                  <td><input type="text" name="consumoPpr19" value="{{ old('consumoPpr19')}}" onkeypress ="return SoloNumerosEnteros(event)"></td>
                  <td><input type="text" name="mortalidadPpr19" value="{{ old('mortalidadPpr19')}}" onkeypress ="return SoloNumerosEnteros(event)"></td>
                  <td><input type="text" name="seleccionPpr19" value="{{ old('seleccionPpr19')}}" onkeypress ="return SoloNumerosEnteros(event)"></td>
                  <td><input type="text" name="ventasPpr19" value="{{ old('ventasPpr19')}}" onkeypress ="return SoloNumerosEnteros(event)"></td>
                  <td><input type="text" name="pesoavePpr19" value="{{ old('pesoavePpr19')}}" onkeypress ="return SoloNumerosEnteros(event)"></td>
                  <td><input type="text" name="pesohuevoPpr19" value="{{ old('pesohuevoPpr19')}}" onkeypress ="return SoloNumerosEnteros(event)"></td>
                  <td><input type="text" name="alimentoPpr19" value="{{ old('alimentoPpr19')}}"></td>
                  <td><input type="text" name="ObservacionesPpr19" value="{{ old('ObservacionesPpr19')}}"></td>
                  <td><a href="#" class="btn"><i class="fa fa-plus-circle" aria-hidden="true"></i></a></td>
                </tr>
                <tr>
                  <td>21</td>
                  <td><input type="text" name="dfsPpr20" value="{{ old('dfsPpr20')}}"></td>
                  <td><input type="text" name="semanavidaPpr20" value="{{ old('semanavidaPpr20')}}"></td>
                  <td><input type="text" name="huevosPpr20" value="{{ old('huevosPpr20')}}" onkeypress ="return SoloNumerosEnteros(event)"></td>
                  <td><input type="text" name="consumoPpr20" value="{{ old('consumoPpr20')}}" onkeypress ="return SoloNumerosEnteros(event)"></td>
                  <td><input type="text" name="mortalidadPpr20" value="{{ old('mortalidadPpr20')}}" onkeypress ="return SoloNumerosEnteros(event)"></td>
                  <td><input type="text" name="seleccionPpr20" value="{{ old('seleccionPpr20')}}" onkeypress ="return SoloNumerosEnteros(event)"></td>
                  <td><input type="text" name="ventasPpr20" value="{{ old('ventasPpr20')}}" onkeypress ="return SoloNumerosEnteros(event)"></td>
                  <td><input type="text" name="pesoavePpr20" value="{{ old('pesoavePpr20')}}" onkeypress ="return SoloNumerosEnteros(event)"></td>
                  <td><input type="text" name="pesohuevoPpr20" value="{{ old('pesohuevoPpr20')}}" onkeypress ="return SoloNumerosEnteros(event)"></td>
                  <td><input type="text" name="alimentoPpr20" value="{{ old('alimentoPpr20')}}"></td>
                  <td><input type="text" name="ObservacionesPpr20" value="{{ old('ObservacionesPpr20')}}"></td>
                  <td><a href="#" class="btn"><i class="fa fa-plus-circle" aria-hidden="true"></i></a></td>
                </tr>
                <tr>
                  <td>22</td>
                  <td><input type="text" name="dfsPpr21" value="{{ old('dfsPpr21')}}"></td>
                  <td><input type="text" name="semanavidaPpr21" value="{{ old('semanavidaPpr21')}}"></td>
                  <td><input type="text" name="huevosPpr21" value="{{ old('huevosPpr21')}}" onkeypress ="return SoloNumerosEnteros(event)"></td>
                  <td><input type="text" name="consumoPpr21" value="{{ old('consumoPpr21')}}" onkeypress ="return SoloNumerosEnteros(event)"></td>
                  <td><input type="text" name="mortalidadPpr21" value="{{ old('mortalidadPpr21')}}" onkeypress ="return SoloNumerosEnteros(event)"></td>
                  <td><input type="text" name="seleccionPpr21" value="{{ old('seleccionPpr21')}}" onkeypress ="return SoloNumerosEnteros(event)"></td>
                  <td><input type="text" name="ventasPpr21" value="{{ old('ventasPpr21')}}" onkeypress ="return SoloNumerosEnteros(event)"></td>
                  <td><input type="text" name="pesoavePpr21" value="{{ old('pesoavePpr21')}}" onkeypress ="return SoloNumerosEnteros(event)"></td>
                  <td><input type="text" name="pesohuevoPpr21" value="{{ old('pesohuevoPpr21')}}" onkeypress ="return SoloNumerosEnteros(event)"></td>
                  <td><input type="text" name="alimentoPpr21" value="{{ old('alimentoPpr21')}}"></td>
                  <td><input type="text" name="ObservacionesPpr21" value="{{ old('ObservacionesPpr21')}}"></td>
                  <td><a href="#" class="btn"><i class="fa fa-plus-circle" aria-hidden="true"></i></a></td>
                </tr>
                <tr>
                  <td>23</td>
                  <td><input type="text" name="dfsPpr22" value="{{ old('dfsPpr22')}}"></td>
                  <td><input type="text" name="semanavidaPpr22" value="{{ old('semanavidaPpr22')}}"></td>
                  <td><input type="text" name="huevosPpr22" value="{{ old('huevosPpr22')}}" onkeypress ="return SoloNumerosEnteros(event)"></td>
                  <td><input type="text" name="consumoPpr22" value="{{ old('consumoPpr22')}}" onkeypress ="return SoloNumerosEnteros(event)"></td>
                  <td><input type="text" name="mortalidadPpr22" value="{{ old('mortalidadPpr22')}}" onkeypress ="return SoloNumerosEnteros(event)"></td>
                  <td><input type="text" name="seleccionPpr22" value="{{ old('seleccionPpr22')}}" onkeypress ="return SoloNumerosEnteros(event)"></td>
                  <td><input type="text" name="ventasPpr22" value="{{ old('ventasPpr22')}}" onkeypress ="return SoloNumerosEnteros(event)"></td>
                  <td><input type="text" name="pesoavePpr22" value="{{ old('pesoavePpr22')}}" onkeypress ="return SoloNumerosEnteros(event)"></td>
                  <td><input type="text" name="pesohuevoPpr22" value="{{ old('pesohuevoPpr22')}}" onkeypress ="return SoloNumerosEnteros(event)"></td>
                  <td><input type="text" name="alimentoPpr22" value="{{ old('alimentoPpr22')}}"></td>
                  <td><input type="text" name="ObservacionesPpr22" value="{{ old('ObservacionesPpr22')}}"></td>
                  <td><a href="#" class="btn"><i class="fa fa-plus-circle" aria-hidden="true"></i></a></td>
                </tr>
                <tr>
                  <td>24</td>
                  <td><input type="text" name="dfsPpr23" value="{{ old('dfsPpr23')}}"></td>
                  <td><input type="text" name="semanavidaPpr23" value="{{ old('semanavidaPpr23')}}"></td>
                  <td><input type="text" name="huevosPpr23" value="{{ old('huevosPpr23')}}" onkeypress ="return SoloNumerosEnteros(event)"></td>
                  <td><input type="text" name="consumoPpr23" value="{{ old('consumoPpr23')}}" onkeypress ="return SoloNumerosEnteros(event)"></td>
                  <td><input type="text" name="mortalidadPpr23" value="{{ old('mortalidadPpr23')}}" onkeypress ="return SoloNumerosEnteros(event)"></td>
                  <td><input type="text" name="seleccionPpr23" value="{{ old('seleccionPpr23')}}" onkeypress ="return SoloNumerosEnteros(event)"></td>
                  <td><input type="text" name="ventasPpr23" value="{{ old('ventasPpr23')}}" onkeypress ="return SoloNumerosEnteros(event)"></td>
                  <td><input type="text" name="pesoavePpr23" value="{{ old('pesoavePpr23')}}" onkeypress ="return SoloNumerosEnteros(event)"></td>
                  <td><input type="text" name="pesohuevoPpr23" value="{{ old('pesohuevoPpr23')}}" onkeypress ="return SoloNumerosEnteros(event)"></td>
                  <td><input type="text" name="alimentoPpr23" value="{{ old('alimentoPpr23')}}"></td>
                  <td><input type="text" name="ObservacionesPpr23" value="{{ old('ObservacionesPpr23')}}"></td>
                  <td><a href="#" class="btn"><i class="fa fa-plus-circle" aria-hidden="true"></i></a></td>
                </tr>
                <tr>
                  <td>25</td>
                  <td><input type="text" name="dfsPpr24" value="{{ old('dfsPpr24')}}"></td>
                  <td><input type="text" name="semanavidaPpr24" value="{{ old('semanavidaPpr24')}}"></td>
                  <td><input type="text" name="huevosPpr24" value="{{ old('huevosPpr24')}}" onkeypress ="return SoloNumerosEnteros(event)"></td>
                  <td><input type="text" name="consumoPpr24" value="{{ old('consumoPpr24')}}" onkeypress ="return SoloNumerosEnteros(event)"></td>
                  <td><input type="text" name="mortalidadPpr24" value="{{ old('mortalidadPpr24')}}" onkeypress ="return SoloNumerosEnteros(event)"></td>
                  <td><input type="text" name="seleccionPpr24" value="{{ old('seleccionPpr24')}}" onkeypress ="return SoloNumerosEnteros(event)"></td>
                  <td><input type="text" name="ventasPpr24" value="{{ old('ventasPpr24')}}" onkeypress ="return SoloNumerosEnteros(event)"></td>
                  <td><input type="text" name="pesoavePpr24" value="{{ old('pesoavePpr24')}}" onkeypress ="return SoloNumerosEnteros(event)"></td>
                  <td><input type="text" name="pesohuevoPpr24" value="{{ old('pesohuevoPpr24')}}" onkeypress ="return SoloNumerosEnteros(event)"></td>
                  <td><input type="text" name="alimentoPpr24" value="{{ old('alimentoPpr24')}}"></td>
                  <td><input type="text" name="ObservacionesPpr24" value="{{ old('ObservacionesPpr24')}}"></td>
                  <td><a href="#" class="btn"><i class="fa fa-plus-circle" aria-hidden="true"></i></a></td>
                </tr>
                <tr>
                  <td>26</td>
                  <td><input type="text" name="dfsPpr25" value="{{ old('dfsPpr25')}}"></td>
                  <td><input type="text" name="semanavidaPpr25" value="{{ old('semanavidaPpr25')}}"></td>
                  <td><input type="text" name="huevosPpr25" value="{{ old('huevosPpr25')}}" onkeypress ="return SoloNumerosEnteros(event)"></td>
                  <td><input type="text" name="consumoPpr25" value="{{ old('consumoPpr25')}}" onkeypress ="return SoloNumerosEnteros(event)"></td>
                  <td><input type="text" name="mortalidadPpr25" value="{{ old('mortalidadPpr25')}}" onkeypress ="return SoloNumerosEnteros(event)"></td>
                  <td><input type="text" name="seleccionPpr25" value="{{ old('seleccionPpr25')}}" onkeypress ="return SoloNumerosEnteros(event)"></td>
                  <td><input type="text" name="ventasPpr25" value="{{ old('ventasPpr25')}}" onkeypress ="return SoloNumerosEnteros(event)"></td>
                  <td><input type="text" name="pesoavePpr25" value="{{ old('pesoavePpr25')}}" onkeypress ="return SoloNumerosEnteros(event)"></td>
                  <td><input type="text" name="pesohuevoPpr25" value="{{ old('pesohuevoPpr25')}}" onkeypress ="return SoloNumerosEnteros(event)"></td>
                  <td><input type="text" name="alimentoPpr25" value="{{ old('alimentoPpr25')}}"></td>
                  <td><input type="text" name="ObservacionesPpr25" value="{{ old('ObservacionesPpr25')}}"></td>
                  <td><a href="#" class="btn"><i class="fa fa-plus-circle" aria-hidden="true"></i></a></td>
                </tr>
                <tr>
                  <td>27</td>
                  <td><input type="text" name="dfsPpr26" value="{{ old('dfsPpr26')}}"></td>
                  <td><input type="text" name="semanavidaPpr26" value="{{ old('semanavidaPpr26')}}"></td>
                  <td><input type="text" name="huevosPpr26" value="{{ old('huevosPpr26')}}" onkeypress ="return SoloNumerosEnteros(event)"></td>
                  <td><input type="text" name="consumoPpr26" value="{{ old('consumoPpr26')}}" onkeypress ="return SoloNumerosEnteros(event)"></td>
                  <td><input type="text" name="mortalidadPpr26" value="{{ old('mortalidadPpr26')}}" onkeypress ="return SoloNumerosEnteros(event)"></td>
                  <td><input type="text" name="seleccionPpr26" value="{{ old('seleccionPpr26')}}" onkeypress ="return SoloNumerosEnteros(event)"></td>
                  <td><input type="text" name="ventasPpr26" value="{{ old('ventasPpr26')}}" onkeypress ="return SoloNumerosEnteros(event)"></td>
                  <td><input type="text" name="pesoavePpr26" value="{{ old('pesoavePpr26')}}" onkeypress ="return SoloNumerosEnteros(event)"></td>
                  <td><input type="text" name="pesohuevoPpr26" value="{{ old('pesohuevoPpr26')}}" onkeypress ="return SoloNumerosEnteros(event)"></td>
                  <td><input type="text" name="alimentoPpr26" value="{{ old('alimentoPpr26')}}"></td>
                  <td><input type="text" name="ObservacionesPpr26" value="{{ old('ObservacionesPpr26')}}"></td>
                  <td><a href="#" class="btn"><i class="fa fa-plus-circle" aria-hidden="true"></i></a></td>
                </tr>                
                <tr>
                  <td>28</td>
                  <td><input type="text" name="dfsPpr27" value="{{ old('dfsPpr27')}}"></td>
                  <td><input type="text" name="semanavidaPpr27" value="{{ old('semanavidaPpr27')}}"></td>
                  <td><input type="text" name="huevosPpr27" value="{{ old('huevosPpr27')}}" onkeypress ="return SoloNumerosEnteros(event)"></td>
                  <td><input type="text" name="consumoPpr27" value="{{ old('consumoPpr27')}}" onkeypress ="return SoloNumerosEnteros(event)"></td>
                  <td><input type="text" name="mortalidadPpr27" value="{{ old('mortalidadPpr27')}}" onkeypress ="return SoloNumerosEnteros(event)"></td>
                  <td><input type="text" name="seleccionPpr27" value="{{ old('seleccionPpr27')}}" onkeypress ="return SoloNumerosEnteros(event)"></td>
                  <td><input type="text" name="ventasPpr27" value="{{ old('ventasPpr27')}}" onkeypress ="return SoloNumerosEnteros(event)"></td>
                  <td><input type="text" name="pesoavePpr27" value="{{ old('pesoavePpr27')}}" onkeypress ="return SoloNumerosEnteros(event)"></td>
                  <td><input type="text" name="pesohuevoPpr27" value="{{ old('pesohuevoPpr27')}}" onkeypress ="return SoloNumerosEnteros(event)"></td>
                  <td><input type="text" name="alimentoPpr27" value="{{ old('alimentoPpr27')}}"></td>
                  <td><input type="text" name="ObservacionesPpr27" value="{{ old('ObservacionesPpr27')}}"></td>
                  <td><a href="#" class="btn"><i class="fa fa-plus-circle" aria-hidden="true"></i></a></td>
                </tr>
                <tr>
                  <td>29</td>
                  <td><input type="text" name="dfsPpr28" value="{{ old('dfsPpr28')}}"></td>
                  <td><input type="text" name="semanavidaPpr28" value="{{ old('semanavidaPpr28')}}"></td>
                  <td><input type="text" name="huevosPpr28" value="{{ old('huevosPpr28')}}" onkeypress ="return SoloNumerosEnteros(event)"></td>
                  <td><input type="text" name="consumoPpr28" value="{{ old('consumoPpr28')}}" onkeypress ="return SoloNumerosEnteros(event)"></td>
                  <td><input type="text" name="mortalidadPpr28" value="{{ old('mortalidadPpr28')}}" onkeypress ="return SoloNumerosEnteros(event)"></td>
                  <td><input type="text" name="seleccionPpr28" value="{{ old('seleccionPpr28')}}" onkeypress ="return SoloNumerosEnteros(event)"></td>
                  <td><input type="text" name="ventasPpr28" value="{{ old('ventasPpr28')}}" onkeypress ="return SoloNumerosEnteros(event)"></td>
                  <td><input type="text" name="pesoavePpr28" value="{{ old('pesoavePpr28')}}" onkeypress ="return SoloNumerosEnteros(event)"></td>
                  <td><input type="text" name="pesohuevoPpr28" value="{{ old('pesohuevoPpr28')}}" onkeypress ="return SoloNumerosEnteros(event)"></td>
                  <td><input type="text" name="alimentoPpr28" value="{{ old('alimentoPpr28')}}"></td>
                  <td><input type="text" name="ObservacionesPpr28" value="{{ old('ObservacionesPpr28')}}"></td>
                  <td><a href="#" class="btn"><i class="fa fa-plus-circle" aria-hidden="true"></i></a></td>
                </tr>
                <tr>
                  <td>30</td>
                  <td><input type="text" name="dfsPpr29" value="{{ old('dfsPpr29')}}"></td>
                  <td><input type="text" name="semanavidaPpr29" value="{{ old('semanavidaPpr29')}}"></td>
                  <td><input type="text" name="huevosPpr29" value="{{ old('huevosPpr29')}}" onkeypress ="return SoloNumerosEnteros(event)"></td>
                  <td><input type="text" name="consumoPpr29" value="{{ old('consumoPpr29')}}" onkeypress ="return SoloNumerosEnteros(event)"></td>
                  <td><input type="text" name="mortalidadPpr29" value="{{ old('mortalidadPpr29')}}" onkeypress ="return SoloNumerosEnteros(event)"></td>
                  <td><input type="text" name="seleccionPpr29" value="{{ old('seleccionPpr29')}}" onkeypress ="return SoloNumerosEnteros(event)"></td>
                  <td><input type="text" name="ventasPpr29" value="{{ old('ventasPpr29')}}" onkeypress ="return SoloNumerosEnteros(event)"></td>
                  <td><input type="text" name="pesoavePpr29" value="{{ old('pesoavePpr29')}}" onkeypress ="return SoloNumerosEnteros(event)"></td>
                  <td><input type="text" name="pesohuevoPpr29" value="{{ old('pesohuevoPpr29')}}" onkeypress ="return SoloNumerosEnteros(event)"></td>
                  <td><input type="text" name="alimentoPpr29" value="{{ old('alimentoPpr29')}}"></td>
                  <td><input type="text" name="ObservacionesPpr29" value="{{ old('ObservacionesPpr29')}}"></td>
                  <td><a href="#" class="btn"><i class="fa fa-plus-circle" aria-hidden="true"></i></a></td>
                </tr>
                <tr>
                  <td>31</td>
                  <td><input type="text" name="dfsPpr30" value="{{ old('dfsPpr30')}}"></td>
                  <td><input type="text" name="semanavidaPpr30" value="{{ old('semanavidaPpr30')}}"></td>
                  <td><input type="text" name="huevosPpr30" value="{{ old('huevosPpr30')}}" onkeypress ="return SoloNumerosEnteros(event)"></td>
                  <td><input type="text" name="consumoPpr30" value="{{ old('consumoPpr30')}}" onkeypress ="return SoloNumerosEnteros(event)"></td>
                  <td><input type="text" name="mortalidadPpr30" value="{{ old('mortalidadPpr30')}}" onkeypress ="return SoloNumerosEnteros(event)"></td>
                  <td><input type="text" name="seleccionPpr30" value="{{ old('seleccionPpr30')}}" onkeypress ="return SoloNumerosEnteros(event)"></td>
                  <td><input type="text" name="ventasPpr30" value="{{ old('ventasPpr30')}}" onkeypress ="return SoloNumerosEnteros(event)"></td>
                  <td><input type="text" name="pesoavePpr30" value="{{ old('pesoavePpr30')}}" onkeypress ="return SoloNumerosEnteros(event)"></td>
                  <td><input type="text" name="pesohuevoPpr30" value="{{ old('pesohuevoPpr30')}}" onkeypress ="return SoloNumerosEnteros(event)"></td>
                  <td><input type="text" name="alimentoPpr30" value="{{ old('alimentoPpr30')}}"></td>
                  <td><input type="text" name="ObservacionesPpr30" value="{{ old('ObservacionesPpr30')}}"></td>
                  <td><a href="#" class="btn"><i class="fa fa-plus-circle" aria-hidden="true"></i></a></td>
                </tr>
                <tr>
                  <td>32</td>
                  <td><input type="text" name="dfsPpr31" value="{{ old('dfsPpr31')}}"></td>
                  <td><input type="text" name="semanavidaPpr31" value="{{ old('semanavidaPpr31')}}"></td>
                  <td><input type="text" name="huevosPpr31" value="{{ old('huevosPpr31')}}" onkeypress ="return SoloNumerosEnteros(event)"></td>
                  <td><input type="text" name="consumoPpr31" value="{{ old('consumoPpr31')}}" onkeypress ="return SoloNumerosEnteros(event)"></td>
                  <td><input type="text" name="mortalidadPpr31" value="{{ old('mortalidadPpr31')}}" onkeypress ="return SoloNumerosEnteros(event)"></td>
                  <td><input type="text" name="seleccionPpr31" value="{{ old('seleccionPpr31')}}" onkeypress ="return SoloNumerosEnteros(event)"></td>
                  <td><input type="text" name="ventasPpr31" value="{{ old('ventasPpr31')}}" onkeypress ="return SoloNumerosEnteros(event)"></td>
                  <td><input type="text" name="pesoavePpr31" value="{{ old('pesoavePpr31')}}" onkeypress ="return SoloNumerosEnteros(event)"></td>
                  <td><input type="text" name="pesohuevoPpr31" value="{{ old('pesohuevoPpr31')}}" onkeypress ="return SoloNumerosEnteros(event)"></td>
                  <td><input type="text" name="alimentoPpr31" value="{{ old('alimentoPpr31')}}"></td>
                  <td><input type="text" name="ObservacionesPpr31" value="{{ old('ObservacionesPpr31')}}"></td>
                  <td><a href="#" class="btn"><i class="fa fa-plus-circle" aria-hidden="true"></i></a></td>
                </tr>
                <tr>
                  <td>33</td>
                  <td><input type="text" name="dfsPpr32" value="{{ old('dfsPpr32')}}"></td>
                  <td><input type="text" name="semanavidaPpr32" value="{{ old('semanavidaPpr32')}}"></td>
                  <td><input type="text" name="huevosPpr32" value="{{ old('huevosPpr32')}}" onkeypress ="return SoloNumerosEnteros(event)"></td>
                  <td><input type="text" name="consumoPpr32" value="{{ old('consumoPpr32')}}" onkeypress ="return SoloNumerosEnteros(event)"></td>
                  <td><input type="text" name="mortalidadPpr32" value="{{ old('mortalidadPpr32')}}" onkeypress ="return SoloNumerosEnteros(event)"></td>
                  <td><input type="text" name="seleccionPpr32" value="{{ old('seleccionPpr32')}}" onkeypress ="return SoloNumerosEnteros(event)"></td>
                  <td><input type="text" name="ventasPpr32" value="{{ old('ventasPpr32')}}" onkeypress ="return SoloNumerosEnteros(event)"></td>
                  <td><input type="text" name="pesoavePpr32" value="{{ old('pesoavePpr32')}}" onkeypress ="return SoloNumerosEnteros(event)"></td>
                  <td><input type="text" name="pesohuevoPpr32" value="{{ old('pesohuevoPpr32')}}" onkeypress ="return SoloNumerosEnteros(event)"></td>
                  <td><input type="text" name="alimentoPpr32" value="{{ old('alimentoPpr32')}}"></td>
                  <td><input type="text" name="ObservacionesPpr32" value="{{ old('ObservacionesPpr32')}}"></td>
                  <td><a href="#" class="btn"><i class="fa fa-plus-circle" aria-hidden="true"></i></a></td>
                </tr>
                <tr>
                  <td>34</td>
                  <td><input type="text" name="dfsPpr33" value="{{ old('dfsPpr33')}}"></td>
                  <td><input type="text" name="semanavidaPpr33" value="{{ old('semanavidaPpr33')}}"></td>
                  <td><input type="text" name="huevosPpr33" value="{{ old('huevosPpr33')}}" onkeypress ="return SoloNumerosEnteros(event)"></td>
                  <td><input type="text" name="consumoPpr33" value="{{ old('consumoPpr33')}}" onkeypress ="return SoloNumerosEnteros(event)"></td>
                  <td><input type="text" name="mortalidadPpr33" value="{{ old('mortalidadPpr33')}}" onkeypress ="return SoloNumerosEnteros(event)"></td>
                  <td><input type="text" name="seleccionPpr33" value="{{ old('seleccionPpr33')}}" onkeypress ="return SoloNumerosEnteros(event)"></td>
                  <td><input type="text" name="ventasPpr33" value="{{ old('ventasPpr33')}}" onkeypress ="return SoloNumerosEnteros(event)"></td>
                  <td><input type="text" name="pesoavePpr33" value="{{ old('pesoavePpr33')}}" onkeypress ="return SoloNumerosEnteros(event)"></td>
                  <td><input type="text" name="pesohuevoPpr33" value="{{ old('pesohuevoPpr33')}}" onkeypress ="return SoloNumerosEnteros(event)"></td>
                  <td><input type="text" name="alimentoPpr33" value="{{ old('alimentoPpr33')}}"></td>
                  <td><input type="text" name="ObservacionesPpr33" value="{{ old('ObservacionesPpr33')}}"></td>
                  <td><a href="#" class="btn"><i class="fa fa-plus-circle" aria-hidden="true"></i></a></td>
                </tr>
                <tr>
                  <td>35</td>
                  <td><input type="text" name="dfsPpr34" value="{{ old('dfsPpr34')}}"></td>
                  <td><input type="text" name="semanavidaPpr34" value="{{ old('semanavidaPpr34')}}"></td>
                  <td><input type="text" name="huevosPpr34" value="{{ old('huevosPpr34')}}" onkeypress ="return SoloNumerosEnteros(event)"></td>
                  <td><input type="text" name="consumoPpr34" value="{{ old('consumoPpr34')}}" onkeypress ="return SoloNumerosEnteros(event)"></td>
                  <td><input type="text" name="mortalidadPpr34" value="{{ old('mortalidadPpr34')}}" onkeypress ="return SoloNumerosEnteros(event)"></td>
                  <td><input type="text" name="seleccionPpr34" value="{{ old('seleccionPpr34')}}" onkeypress ="return SoloNumerosEnteros(event)"></td>
                  <td><input type="text" name="ventasPpr34" value="{{ old('ventasPpr34')}}" onkeypress ="return SoloNumerosEnteros(event)"></td>
                  <td><input type="text" name="pesoavePpr34" value="{{ old('pesoavePpr34')}}" onkeypress ="return SoloNumerosEnteros(event)"></td>
                  <td><input type="text" name="pesohuevoPpr34" value="{{ old('pesohuevoPpr34')}}" onkeypress ="return SoloNumerosEnteros(event)"></td>
                  <td><input type="text" name="alimentoPpr34" value="{{ old('alimentoPpr34')}}"></td>
                  <td><input type="text" name="ObservacionesPpr34" value="{{ old('ObservacionesPpr34')}}"></td>
                  <td><a href="#" class="btn"><i class="fa fa-plus-circle" aria-hidden="true"></i></a></td>
                </tr>
                <tr>
                  <td>36</td>
                  <td><input type="text" name="dfsPpr35" value="{{ old('dfsPpr35')}}"></td>
                  <td><input type="text" name="semanavidaPpr35" value="{{ old('semanavidaPpr35')}}"></td>
                  <td><input type="text" name="huevosPpr35" value="{{ old('huevosPpr35')}}" onkeypress ="return SoloNumerosEnteros(event)"></td>
                  <td><input type="text" name="consumoPpr35" value="{{ old('consumoPpr35')}}" onkeypress ="return SoloNumerosEnteros(event)"></td>
                  <td><input type="text" name="mortalidadPpr35" value="{{ old('mortalidadPpr35')}}" onkeypress ="return SoloNumerosEnteros(event)"></td>
                  <td><input type="text" name="seleccionPpr35" value="{{ old('seleccionPpr35')}}" onkeypress ="return SoloNumerosEnteros(event)"></td>
                  <td><input type="text" name="ventasPpr35" value="{{ old('ventasPpr35')}}" onkeypress ="return SoloNumerosEnteros(event)"></td>
                  <td><input type="text" name="pesoavePpr35" value="{{ old('pesoavePpr35')}}" onkeypress ="return SoloNumerosEnteros(event)"></td>
                  <td><input type="text" name="pesohuevoPpr35" value="{{ old('pesohuevoPpr35')}}" onkeypress ="return SoloNumerosEnteros(event)"></td>
                  <td><input type="text" name="alimentoPpr35" value="{{ old('alimentoPpr35')}}"></td>
                  <td><input type="text" name="ObservacionesPpr35" value="{{ old('ObservacionesPpr35')}}"></td>
                  <td><a href="#" class="btn"><i class="fa fa-plus-circle" aria-hidden="true"></i></a></td>
                </tr>
                <tr>
                  <td>37</td>
                  <td><input type="text" name="dfsPpr36" value="{{ old('dfsPpr36')}}"></td>
                  <td><input type="text" name="semanavidaPpr36" value="{{ old('semanavidaPpr36')}}"></td>
                  <td><input type="text" name="huevosPpr36" value="{{ old('huevosPpr36')}}" onkeypress ="return SoloNumerosEnteros(event)"></td>
                  <td><input type="text" name="consumoPpr36" value="{{ old('consumoPpr36')}}" onkeypress ="return SoloNumerosEnteros(event)"></td>
                  <td><input type="text" name="mortalidadPpr36" value="{{ old('mortalidadPpr36')}}" onkeypress ="return SoloNumerosEnteros(event)"></td>
                  <td><input type="text" name="seleccionPpr36" value="{{ old('seleccionPpr36')}}" onkeypress ="return SoloNumerosEnteros(event)"></td>
                  <td><input type="text" name="ventasPpr36" value="{{ old('ventasPpr36')}}" onkeypress ="return SoloNumerosEnteros(event)"></td>
                  <td><input type="text" name="pesoavePpr36" value="{{ old('pesoavePpr36')}}" onkeypress ="return SoloNumerosEnteros(event)"></td>
                  <td><input type="text" name="pesohuevoPpr36" value="{{ old('pesohuevoPpr36')}}" onkeypress ="return SoloNumerosEnteros(event)"></td>
                  <td><input type="text" name="alimentoPpr36" value="{{ old('alimentoPpr36')}}"></td>
                  <td><input type="text" name="ObservacionesPpr36" value="{{ old('ObservacionesPpr36')}}"></td>
                  <td><a href="#" class="btn"><i class="fa fa-plus-circle" aria-hidden="true"></i></a></td>
                </tr>
                <tr>
                  <td>38</td>
                  <td><input type="text" name="dfsPpr37" value="{{ old('dfsPpr37')}}"></td>
                  <td><input type="text" name="semanavidaPpr37" value="{{ old('semanavidaPpr37')}}"></td>
                  <td><input type="text" name="huevosPpr37" value="{{ old('huevosPpr37')}}" onkeypress ="return SoloNumerosEnteros(event)"></td>
                  <td><input type="text" name="consumoPpr37" value="{{ old('consumoPpr37')}}" onkeypress ="return SoloNumerosEnteros(event)"></td>
                  <td><input type="text" name="mortalidadPpr37" value="{{ old('mortalidadPpr37')}}" onkeypress ="return SoloNumerosEnteros(event)"></td>
                  <td><input type="text" name="seleccionPpr37" value="{{ old('seleccionPpr37')}}" onkeypress ="return SoloNumerosEnteros(event)"></td>
                  <td><input type="text" name="ventasPpr37" value="{{ old('ventasPpr37')}}" onkeypress ="return SoloNumerosEnteros(event)"></td>
                  <td><input type="text" name="pesoavePpr37" value="{{ old('pesoavePpr37')}}" onkeypress ="return SoloNumerosEnteros(event)"></td>
                  <td><input type="text" name="pesohuevoPpr37" value="{{ old('pesohuevoPpr37')}}" onkeypress ="return SoloNumerosEnteros(event)"></td>
                  <td><input type="text" name="alimentoPpr37" value="{{ old('alimentoPpr37')}}"></td>
                  <td><input type="text" name="ObservacionesPpr37" value="{{ old('ObservacionesPpr37')}}"></td>
                  <td><a href="#" class="btn"><i class="fa fa-plus-circle" aria-hidden="true"></i></a></td>
                </tr>                
                <tr>
                  <td>39</td>
                  <td><input type="text" name="dfsPpr38" value="{{ old('dfsPpr38')}}"></td>
                  <td><input type="text" name="semanavidaPpr38" value="{{ old('semanavidaPpr38')}}"></td>
                  <td><input type="text" name="huevosPpr38" value="{{ old('huevosPpr38')}}" onkeypress ="return SoloNumerosEnteros(event)"></td>
                  <td><input type="text" name="consumoPpr38" value="{{ old('consumoPpr38')}}" onkeypress ="return SoloNumerosEnteros(event)"></td>
                  <td><input type="text" name="mortalidadPpr38" value="{{ old('mortalidadPpr38')}}" onkeypress ="return SoloNumerosEnteros(event)"></td>
                  <td><input type="text" name="seleccionPpr38" value="{{ old('seleccionPpr38')}}" onkeypress ="return SoloNumerosEnteros(event)"></td>
                  <td><input type="text" name="ventasPpr38" value="{{ old('ventasPpr38')}}" onkeypress ="return SoloNumerosEnteros(event)"></td>
                  <td><input type="text" name="pesoavePpr38" value="{{ old('pesoavePpr38')}}" onkeypress ="return SoloNumerosEnteros(event)"></td>
                  <td><input type="text" name="pesohuevoPpr38" value="{{ old('pesohuevoPpr38')}}" onkeypress ="return SoloNumerosEnteros(event)"></td>
                  <td><input type="text" name="alimentoPpr38" value="{{ old('alimentoPpr38')}}"></td>
                  <td><input type="text" name="ObservacionesPpr38" value="{{ old('ObservacionesPpr38')}}"></td>
                  <td><a href="#" class="btn"><i class="fa fa-plus-circle" aria-hidden="true"></i></a></td>
                </tr>
                <tr>
                  <td>40</td>
                  <td><input type="text" name="dfsPpr39" value="{{ old('dfsPpr39')}}"></td>
                  <td><input type="text" name="semanavidaPpr39" value="{{ old('semanavidaPpr39')}}"></td>
                  <td><input type="text" name="huevosPpr39" value="{{ old('huevosPpr39')}}" onkeypress ="return SoloNumerosEnteros(event)"></td>
                  <td><input type="text" name="consumoPpr39" value="{{ old('consumoPpr39')}}" onkeypress ="return SoloNumerosEnteros(event)"></td>
                  <td><input type="text" name="mortalidadPpr39" value="{{ old('mortalidadPpr39')}}" onkeypress ="return SoloNumerosEnteros(event)"></td>
                  <td><input type="text" name="seleccionPpr39" value="{{ old('seleccionPpr39')}}" onkeypress ="return SoloNumerosEnteros(event)"></td>
                  <td><input type="text" name="ventasPpr39" value="{{ old('ventasPpr39')}}" onkeypress ="return SoloNumerosEnteros(event)"></td>
                  <td><input type="text" name="pesoavePpr39" value="{{ old('pesoavePpr39')}}" onkeypress ="return SoloNumerosEnteros(event)"></td>
                  <td><input type="text" name="pesohuevoPpr39" value="{{ old('pesohuevoPpr39')}}" onkeypress ="return SoloNumerosEnteros(event)"></td>
                  <td><input type="text" name="alimentoPpr39" value="{{ old('alimentoPpr39')}}"></td>
                  <td><input type="text" name="ObservacionesPpr39" value="{{ old('ObservacionesPpr39')}}"></td>
                  <td><a href="#" class="btn"><i class="fa fa-plus-circle" aria-hidden="true"></i></a></td>
                </tr>
                <tr>
                  <td>41</td>
                  <td><input type="text" name="dfsPpr40" value="{{ old('dfsPpr40')}}"></td>
                  <td><input type="text" name="semanavidaPpr40" value="{{ old('semanavidaPpr40')}}"></td>
                  <td><input type="text" name="huevosPpr40" value="{{ old('huevosPpr40')}}" onkeypress ="return SoloNumerosEnteros(event)"></td>
                  <td><input type="text" name="consumoPpr40" value="{{ old('consumoPpr40')}}" onkeypress ="return SoloNumerosEnteros(event)"></td>
                  <td><input type="text" name="mortalidadPpr40" value="{{ old('mortalidadPpr40')}}" onkeypress ="return SoloNumerosEnteros(event)"></td>
                  <td><input type="text" name="seleccionPpr40" value="{{ old('seleccionPpr40')}}" onkeypress ="return SoloNumerosEnteros(event)"></td>
                  <td><input type="text" name="ventasPpr40" value="{{ old('ventasPpr40')}}" onkeypress ="return SoloNumerosEnteros(event)"></td>
                  <td><input type="text" name="pesoavePpr40" value="{{ old('pesoavePpr40')}}" onkeypress ="return SoloNumerosEnteros(event)"></td>
                  <td><input type="text" name="pesohuevoPpr40" value="{{ old('pesohuevoPpr40')}}" onkeypress ="return SoloNumerosEnteros(event)"></td>
                  <td><input type="text" name="alimentoPpr40" value="{{ old('alimentoPpr40')}}"></td>
                  <td><input type="text" name="ObservacionesPpr40" value="{{ old('ObservacionesPpr40')}}"></td>
                  <td><a href="#" class="btn"><i class="fa fa-plus-circle" aria-hidden="true"></i></a></td>
                </tr>
                <tr>
                  <td>42</td>
                  <td><input type="text" name="dfsPpr41" value="{{ old('dfsPpr41')}}"></td>
                  <td><input type="text" name="semanavidaPpr41" value="{{ old('semanavidaPpr41')}}"></td>
                  <td><input type="text" name="huevosPpr41" value="{{ old('huevosPpr41')}}" onkeypress ="return SoloNumerosEnteros(event)"></td>
                  <td><input type="text" name="consumoPpr41" value="{{ old('consumoPpr41')}}" onkeypress ="return SoloNumerosEnteros(event)"></td>
                  <td><input type="text" name="mortalidadPpr41" value="{{ old('mortalidadPpr41')}}" onkeypress ="return SoloNumerosEnteros(event)"></td>
                  <td><input type="text" name="seleccionPpr41" value="{{ old('seleccionPpr41')}}" onkeypress ="return SoloNumerosEnteros(event)"></td>
                  <td><input type="text" name="ventasPpr41" value="{{ old('ventasPpr41')}}" onkeypress ="return SoloNumerosEnteros(event)"></td>
                  <td><input type="text" name="pesoavePpr41" value="{{ old('pesoavePpr41')}}" onkeypress ="return SoloNumerosEnteros(event)"></td>
                  <td><input type="text" name="pesohuevoPpr41" value="{{ old('pesohuevoPpr41')}}" onkeypress ="return SoloNumerosEnteros(event)"></td>
                  <td><input type="text" name="alimentoPpr41" value="{{ old('alimentoPpr41')}}"></td>
                  <td><input type="text" name="ObservacionesPpr41" value="{{ old('ObservacionesPpr41')}}"></td>
                  <td><a href="#" class="btn"><i class="fa fa-plus-circle" aria-hidden="true"></i></a></td>
                </tr>
                <tr>
                  <td>43</td>
                  <td><input type="text" name="dfsPpr42" value="{{ old('dfsPpr42')}}"></td>
                  <td><input type="text" name="semanavidaPpr42" value="{{ old('semanavidaPpr42')}}"></td>
                  <td><input type="text" name="huevosPpr42" value="{{ old('huevosPpr42')}}" onkeypress ="return SoloNumerosEnteros(event)"></td>
                  <td><input type="text" name="consumoPpr42" value="{{ old('consumoPpr42')}}" onkeypress ="return SoloNumerosEnteros(event)"></td>
                  <td><input type="text" name="mortalidadPpr42" value="{{ old('mortalidadPpr42')}}" onkeypress ="return SoloNumerosEnteros(event)"></td>
                  <td><input type="text" name="seleccionPpr42" value="{{ old('seleccionPpr42')}}" onkeypress ="return SoloNumerosEnteros(event)"></td>
                  <td><input type="text" name="ventasPpr42" value="{{ old('ventasPpr42')}}" onkeypress ="return SoloNumerosEnteros(event)"></td>
                  <td><input type="text" name="pesoavePpr42" value="{{ old('pesoavePpr42')}}" onkeypress ="return SoloNumerosEnteros(event)"></td>
                  <td><input type="text" name="pesohuevoPpr42" value="{{ old('pesohuevoPpr42')}}" onkeypress ="return SoloNumerosEnteros(event)"></td>
                  <td><input type="text" name="alimentoPpr42" value="{{ old('alimentoPpr42')}}"></td>
                  <td><input type="text" name="ObservacionesPpr42" value="{{ old('ObservacionesPpr42')}}"></td>
                  <td><a href="#" class="btn"><i class="fa fa-plus-circle" aria-hidden="true"></i></a></td>
                </tr>
                <tr>
                  <td>44</td>
                  <td><input type="text" name="dfsPpr43" value="{{ old('dfsPpr43')}}"></td>
                  <td><input type="text" name="semanavidaPpr43" value="{{ old('semanavidaPpr43')}}"></td>
                  <td><input type="text" name="huevosPpr43" value="{{ old('huevosPpr43')}}" onkeypress ="return SoloNumerosEnteros(event)"></td>
                  <td><input type="text" name="consumoPpr43" value="{{ old('consumoPpr43')}}" onkeypress ="return SoloNumerosEnteros(event)"></td>
                  <td><input type="text" name="mortalidadPpr43" value="{{ old('mortalidadPpr43')}}" onkeypress ="return SoloNumerosEnteros(event)"></td>
                  <td><input type="text" name="seleccionPpr43" value="{{ old('seleccionPpr43')}}" onkeypress ="return SoloNumerosEnteros(event)"></td>
                  <td><input type="text" name="ventasPpr43" value="{{ old('ventasPpr43')}}" onkeypress ="return SoloNumerosEnteros(event)"></td>
                  <td><input type="text" name="pesoavePpr43" value="{{ old('pesoavePpr43')}}" onkeypress ="return SoloNumerosEnteros(event)"></td>
                  <td><input type="text" name="pesohuevoPpr43" value="{{ old('pesohuevoPpr43')}}" onkeypress ="return SoloNumerosEnteros(event)"></td>
                  <td><input type="text" name="alimentoPpr43" value="{{ old('alimentoPpr43')}}"></td>
                  <td><input type="text" name="ObservacionesPpr43" value="{{ old('ObservacionesPpr43')}}"></td>
                  <td><a href="#" class="btn"><i class="fa fa-plus-circle" aria-hidden="true"></i></a></td>
                </tr>
                <tr>
                  <td>45</td>
                  <td><input type="text" name="dfsPpr44" value="{{ old('dfsPpr44')}}"></td>
                  <td><input type="text" name="semanavidaPpr44" value="{{ old('semanavidaPpr44')}}"></td>
                  <td><input type="text" name="huevosPpr44" value="{{ old('huevosPpr44')}}" onkeypress ="return SoloNumerosEnteros(event)"></td>
                  <td><input type="text" name="consumoPpr44" value="{{ old('consumoPpr44')}}" onkeypress ="return SoloNumerosEnteros(event)"></td>
                  <td><input type="text" name="mortalidadPpr44" value="{{ old('mortalidadPpr44')}}" onkeypress ="return SoloNumerosEnteros(event)"></td>
                  <td><input type="text" name="seleccionPpr44" value="{{ old('seleccionPpr44')}}" onkeypress ="return SoloNumerosEnteros(event)"></td>
                  <td><input type="text" name="ventasPpr44" value="{{ old('ventasPpr44')}}" onkeypress ="return SoloNumerosEnteros(event)"></td>
                  <td><input type="text" name="pesoavePpr44" value="{{ old('pesoavePpr44')}}" onkeypress ="return SoloNumerosEnteros(event)"></td>
                  <td><input type="text" name="pesohuevoPpr44" value="{{ old('pesohuevoPpr44')}}" onkeypress ="return SoloNumerosEnteros(event)"></td>
                  <td><input type="text" name="alimentoPpr44" value="{{ old('alimentoPpr44')}}"></td>
                  <td><input type="text" name="ObservacionesPpr44" value="{{ old('ObservacionesPpr44')}}"></td>
                  <td><a href="#" class="btn"><i class="fa fa-plus-circle" aria-hidden="true"></i></a></td>
                </tr>
                <tr>
                  <td>46</td>
                  <td><input type="text" name="dfsPpr45" value="{{ old('dfsPpr45')}}"></td>
                  <td><input type="text" name="semanavidaPpr45" value="{{ old('semanavidaPpr45')}}"></td>
                  <td><input type="text" name="huevosPpr45" value="{{ old('huevosPpr45')}}" onkeypress ="return SoloNumerosEnteros(event)"></td>
                  <td><input type="text" name="consumoPpr45" value="{{ old('consumoPpr45')}}" onkeypress ="return SoloNumerosEnteros(event)"></td>
                  <td><input type="text" name="mortalidadPpr45" value="{{ old('mortalidadPpr45')}}" onkeypress ="return SoloNumerosEnteros(event)"></td>
                  <td><input type="text" name="seleccionPpr45" value="{{ old('seleccionPpr45')}}" onkeypress ="return SoloNumerosEnteros(event)"></td>
                  <td><input type="text" name="ventasPpr45" value="{{ old('ventasPpr45')}}" onkeypress ="return SoloNumerosEnteros(event)"></td>
                  <td><input type="text" name="pesoavePpr45" value="{{ old('pesoavePpr45')}}" onkeypress ="return SoloNumerosEnteros(event)"></td>
                  <td><input type="text" name="pesohuevoPpr45" value="{{ old('pesohuevoPpr45')}}" onkeypress ="return SoloNumerosEnteros(event)"></td>
                  <td><input type="text" name="alimentoPpr45" value="{{ old('alimentoPpr45')}}"></td>
                  <td><input type="text" name="ObservacionesPpr45" value="{{ old('ObservacionesPpr45')}}"></td>
                  <td><a href="#" class="btn"><i class="fa fa-plus-circle" aria-hidden="true"></i></a></td>
                </tr>
                <tr>
                  <td>47</td>
                  <td><input type="text" name="dfsPpr46" value="{{ old('dfsPpr46')}}"></td>
                  <td><input type="text" name="semanavidaPpr46" value="{{ old('semanavidaPpr46')}}"></td>
                  <td><input type="text" name="huevosPpr46" value="{{ old('huevosPpr46')}}" onkeypress ="return SoloNumerosEnteros(event)"></td>
                  <td><input type="text" name="consumoPpr46" value="{{ old('consumoPpr46')}}" onkeypress ="return SoloNumerosEnteros(event)"></td>
                  <td><input type="text" name="mortalidadPpr46" value="{{ old('mortalidadPpr46')}}" onkeypress ="return SoloNumerosEnteros(event)"></td>
                  <td><input type="text" name="seleccionPpr46" value="{{ old('seleccionPpr46')}}" onkeypress ="return SoloNumerosEnteros(event)"></td>
                  <td><input type="text" name="ventasPpr46" value="{{ old('ventasPpr46')}}" onkeypress ="return SoloNumerosEnteros(event)"></td>
                  <td><input type="text" name="pesoavePpr46" value="{{ old('pesoavePpr46')}}" onkeypress ="return SoloNumerosEnteros(event)"></td>
                  <td><input type="text" name="pesohuevoPpr46" value="{{ old('pesohuevoPpr46')}}" onkeypress ="return SoloNumerosEnteros(event)"></td>
                  <td><input type="text" name="alimentoPpr46" value="{{ old('alimentoPpr46')}}"></td>
                  <td><input type="text" name="ObservacionesPpr46" value="{{ old('ObservacionesPpr46')}}"></td>
                  <td><a href="#" class="btn"><i class="fa fa-plus-circle" aria-hidden="true"></i></a></td>
                </tr>
                <tr>
                  <td>48</td>
                  <td><input type="text" name="dfsPpr47" value="{{ old('dfsPpr47')}}"></td>
                  <td><input type="text" name="semanavidaPpr47" value="{{ old('semanavidaPpr47')}}"></td>
                  <td><input type="text" name="huevosPpr47" value="{{ old('huevosPpr47')}}" onkeypress ="return SoloNumerosEnteros(event)"></td>
                  <td><input type="text" name="consumoPpr47" value="{{ old('consumoPpr47')}}" onkeypress ="return SoloNumerosEnteros(event)"></td>
                  <td><input type="text" name="mortalidadPpr47" value="{{ old('mortalidadPpr47')}}" onkeypress ="return SoloNumerosEnteros(event)"></td>
                  <td><input type="text" name="seleccionPpr47" value="{{ old('seleccionPpr47')}}" onkeypress ="return SoloNumerosEnteros(event)"></td>
                  <td><input type="text" name="ventasPpr47" value="{{ old('ventasPpr47')}}" onkeypress ="return SoloNumerosEnteros(event)"></td>
                  <td><input type="text" name="pesoavePpr47" value="{{ old('pesoavePpr47')}}" onkeypress ="return SoloNumerosEnteros(event)"></td>
                  <td><input type="text" name="pesohuevoPpr47" value="{{ old('pesohuevoPpr47')}}" onkeypress ="return SoloNumerosEnteros(event)"></td>
                  <td><input type="text" name="alimentoPpr47" value="{{ old('alimentoPpr47')}}"></td>
                  <td><input type="text" name="ObservacionesPpr47" value="{{ old('ObservacionesPpr47')}}"></td>
                  <td><a href="#" class="btn"><i class="fa fa-plus-circle" aria-hidden="true"></i></a></td>
                </tr>
                <tr>
                  <td>49</td>
                  <td><input type="text" name="dfsPpr48" value="{{ old('dfsPpr48')}}"></td>
                  <td><input type="text" name="semanavidaPpr48" value="{{ old('semanavidaPpr48')}}"></td>
                  <td><input type="text" name="huevosPpr48" value="{{ old('huevosPpr48')}}" onkeypress ="return SoloNumerosEnteros(event)"></td>
                  <td><input type="text" name="consumoPpr48" value="{{ old('consumoPpr48')}}" onkeypress ="return SoloNumerosEnteros(event)"></td>
                  <td><input type="text" name="mortalidadPpr48" value="{{ old('mortalidadPpr48')}}" onkeypress ="return SoloNumerosEnteros(event)"></td>
                  <td><input type="text" name="seleccionPpr48" value="{{ old('seleccionPpr48')}}" onkeypress ="return SoloNumerosEnteros(event)"></td>
                  <td><input type="text" name="ventasPpr48" value="{{ old('ventasPpr48')}}" onkeypress ="return SoloNumerosEnteros(event)"></td>
                  <td><input type="text" name="pesoavePpr48" value="{{ old('pesoavePpr48')}}" onkeypress ="return SoloNumerosEnteros(event)"></td>
                  <td><input type="text" name="pesohuevoPpr48" value="{{ old('pesohuevoPpr48')}}" onkeypress ="return SoloNumerosEnteros(event)"></td>
                  <td><input type="text" name="alimentoPpr48" value="{{ old('alimentoPpr48')}}"></td>
                  <td><input type="text" name="ObservacionesPpr48" value="{{ old('ObservacionesPpr48')}}"></td>
                  <td><a href="#" class="btn"><i class="fa fa-plus-circle" aria-hidden="true"></i></a></td>
                </tr>
                <tr>
                  <td>50</td>
                  <td><input type="text" name="dfsPpr49" value="{{ old('dfsPpr49')}}"></td>
                  <td><input type="text" name="semanavidaPpr49" value="{{ old('semanavidaPpr49')}}"></td>
                  <td><input type="text" name="huevosPpr49" value="{{ old('huevosPpr49')}}" onkeypress ="return SoloNumerosEnteros(event)"></td>
                  <td><input type="text" name="consumoPpr49" value="{{ old('consumoPpr49')}}" onkeypress ="return SoloNumerosEnteros(event)"></td>
                  <td><input type="text" name="mortalidadPpr49" value="{{ old('mortalidadPpr49')}}" onkeypress ="return SoloNumerosEnteros(event)"></td>
                  <td><input type="text" name="seleccionPpr49" value="{{ old('seleccionPpr49')}}" onkeypress ="return SoloNumerosEnteros(event)"></td>
                  <td><input type="text" name="ventasPpr49" value="{{ old('ventasPpr49')}}" onkeypress ="return SoloNumerosEnteros(event)"></td>
                  <td><input type="text" name="pesoavePpr49" value="{{ old('pesoavePpr49')}}" onkeypress ="return SoloNumerosEnteros(event)"></td>
                  <td><input type="text" name="pesohuevoPpr49" value="{{ old('pesohuevoPpr49')}}" onkeypress ="return SoloNumerosEnteros(event)"></td>
                  <td><input type="text" name="alimentoPpr49" value="{{ old('alimentoPpr49')}}"></td>
                  <td><input type="text" name="ObservacionesPpr49" value="{{ old('ObservacionesPpr49')}}"></td>
                  <td><a href="#" class="btn"><i class="fa fa-plus-circle" aria-hidden="true"></i></a></td>
                </tr>
                <tr>
                  <td>51</td>
                  <td><input type="text" name="dfsPpr50" value="{{ old('dfsPpr50')}}"></td>
                  <td><input type="text" name="semanavidaPpr50" value="{{ old('semanavidaPpr50')}}"></td>
                  <td><input type="text" name="huevosPpr50" value="{{ old('huevosPpr50')}}" onkeypress ="return SoloNumerosEnteros(event)"></td>
                  <td><input type="text" name="consumoPpr50" value="{{ old('consumoPpr50')}}" onkeypress ="return SoloNumerosEnteros(event)"></td>
                  <td><input type="text" name="mortalidadPpr50" value="{{ old('mortalidadPpr50')}}" onkeypress ="return SoloNumerosEnteros(event)"></td>
                  <td><input type="text" name="seleccionPpr50" value="{{ old('seleccionPpr50')}}" onkeypress ="return SoloNumerosEnteros(event)"></td>
                  <td><input type="text" name="ventasPpr50" value="{{ old('ventasPpr50')}}" onkeypress ="return SoloNumerosEnteros(event)"></td>
                  <td><input type="text" name="pesoavePpr50" value="{{ old('pesoavePpr50')}}" onkeypress ="return SoloNumerosEnteros(event)"></td>
                  <td><input type="text" name="pesohuevoPpr50" value="{{ old('pesohuevoPpr50')}}" onkeypress ="return SoloNumerosEnteros(event)"></td>
                  <td><input type="text" name="alimentoPpr50" value="{{ old('alimentoPpr50')}}"></td>
                  <td><input type="text" name="ObservacionesPpr50" value="{{ old('ObservacionesPpr50')}}"></td>
                  <td><a href="#" class="btn"><i class="fa fa-plus-circle" aria-hidden="true"></i></a></td>
                </tr>
                <tr>
                  <td>52</td>
                  <td><input type="text" name="dfsPpr51" value="{{ old('dfsPpr51')}}"></td>
                  <td><input type="text" name="semanavidaPpr51" value="{{ old('semanavidaPpr51')}}"></td>
                  <td><input type="text" name="huevosPpr51" value="{{ old('huevosPpr51')}}" onkeypress ="return SoloNumerosEnteros(event)"></td>
                  <td><input type="text" name="consumoPpr51" value="{{ old('consumoPpr51')}}" onkeypress ="return SoloNumerosEnteros(event)"></td>
                  <td><input type="text" name="mortalidadPpr51" value="{{ old('mortalidadPpr51')}}" onkeypress ="return SoloNumerosEnteros(event)"></td>
                  <td><input type="text" name="seleccionPpr51" value="{{ old('seleccionPpr51')}}" onkeypress ="return SoloNumerosEnteros(event)"></td>
                  <td><input type="text" name="ventasPpr51" value="{{ old('ventasPpr51')}}" onkeypress ="return SoloNumerosEnteros(event)"></td>
                  <td><input type="text" name="pesoavePpr51" value="{{ old('pesoavePpr51')}}" onkeypress ="return SoloNumerosEnteros(event)"></td>
                  <td><input type="text" name="pesohuevoPpr51" value="{{ old('pesohuevoPpr51')}}" onkeypress ="return SoloNumerosEnteros(event)"></td>
                  <td><input type="text" name="alimentoPpr51" value="{{ old('alimentoPpr51')}}"></td>
                  <td><input type="text" name="ObservacionesPpr51" value="{{ old('ObservacionesPpr51')}}"></td>
                  <td><a href="#" class="btn"><i class="fa fa-plus-circle" aria-hidden="true"></i></a></td>
                </tr>
                <tr>
                  <td>53</td>
                  <td><input type="text" name="dfsPpr52" value="{{ old('dfsPpr52')}}"></td>
                  <td><input type="text" name="semanavidaPpr52" value="{{ old('semanavidaPpr52')}}"></td>
                  <td><input type="text" name="huevosPpr52" value="{{ old('huevosPpr52')}}" onkeypress ="return SoloNumerosEnteros(event)"></td>
                  <td><input type="text" name="consumoPpr52" value="{{ old('consumoPpr52')}}" onkeypress ="return SoloNumerosEnteros(event)"></td>
                  <td><input type="text" name="mortalidadPpr52" value="{{ old('mortalidadPpr52')}}" onkeypress ="return SoloNumerosEnteros(event)"></td>
                  <td><input type="text" name="seleccionPpr52" value="{{ old('seleccionPpr52')}}" onkeypress ="return SoloNumerosEnteros(event)"></td>
                  <td><input type="text" name="ventasPpr52" value="{{ old('ventasPpr52')}}" onkeypress ="return SoloNumerosEnteros(event)"></td>
                  <td><input type="text" name="pesoavePpr52" value="{{ old('pesoavePpr52')}}" onkeypress ="return SoloNumerosEnteros(event)"></td>
                  <td><input type="text" name="pesohuevoPpr52" value="{{ old('pesohuevoPpr52')}}" onkeypress ="return SoloNumerosEnteros(event)"></td>
                  <td><input type="text" name="alimentoPpr52" value="{{ old('alimentoPpr52')}}"></td>
                  <td><input type="text" name="ObservacionesPpr52" value="{{ old('ObservacionesPpr52')}}"></td>
                  <td><a href="#" class="btn"><i class="fa fa-plus-circle" aria-hidden="true"></i></a></td>
                </tr>
                <tr>
                  <td>54</td>
                  <td><input type="text" name="dfsPpr53" value="{{ old('dfsPpr53')}}"></td>
                  <td><input type="text" name="semanavidaPpr53" value="{{ old('semanavidaPpr53')}}"></td>
                  <td><input type="text" name="huevosPpr53" value="{{ old('huevosPpr53')}}" onkeypress ="return SoloNumerosEnteros(event)"></td>
                  <td><input type="text" name="consumoPpr53" value="{{ old('consumoPpr53')}}" onkeypress ="return SoloNumerosEnteros(event)"></td>
                  <td><input type="text" name="mortalidadPpr53" value="{{ old('mortalidadPpr53')}}" onkeypress ="return SoloNumerosEnteros(event)"></td>
                  <td><input type="text" name="seleccionPpr53" value="{{ old('seleccionPpr53')}}" onkeypress ="return SoloNumerosEnteros(event)"></td>
                  <td><input type="text" name="ventasPpr53" value="{{ old('ventasPpr53')}}" onkeypress ="return SoloNumerosEnteros(event)"></td>
                  <td><input type="text" name="pesoavePpr53" value="{{ old('pesoavePpr53')}}" onkeypress ="return SoloNumerosEnteros(event)"></td>
                  <td><input type="text" name="pesohuevoPpr53" value="{{ old('pesohuevoPpr53')}}" onkeypress ="return SoloNumerosEnteros(event)"></td>
                  <td><input type="text" name="alimentoPpr53" value="{{ old('alimentoPpr53')}}"></td>
                  <td><input type="text" name="ObservacionesPpr53" value="{{ old('ObservacionesPpr53')}}"></td>
                  <td><a href="#" class="btn"><i class="fa fa-plus-circle" aria-hidden="true"></i></a></td>
                </tr>
                <tr>
                  <td>55</td>
                  <td><input type="text" name="dfsPpr54" value="{{ old('dfsPpr54')}}"></td>
                  <td><input type="text" name="semanavidaPpr54" value="{{ old('semanavidaPpr54')}}"></td>
                  <td><input type="text" name="huevosPpr54" value="{{ old('huevosPpr54')}}" onkeypress ="return SoloNumerosEnteros(event)"></td>
                  <td><input type="text" name="consumoPpr54" value="{{ old('consumoPpr54')}}" onkeypress ="return SoloNumerosEnteros(event)"></td>
                  <td><input type="text" name="mortalidadPpr54" value="{{ old('mortalidadPpr54')}}" onkeypress ="return SoloNumerosEnteros(event)"></td>
                  <td><input type="text" name="seleccionPpr54" value="{{ old('seleccionPpr54')}}" onkeypress ="return SoloNumerosEnteros(event)"></td>
                  <td><input type="text" name="ventasPpr54" value="{{ old('ventasPpr54')}}" onkeypress ="return SoloNumerosEnteros(event)"></td>
                  <td><input type="text" name="pesoavePpr54" value="{{ old('pesoavePpr54')}}" onkeypress ="return SoloNumerosEnteros(event)"></td>
                  <td><input type="text" name="pesohuevoPpr54" value="{{ old('pesohuevoPpr54')}}" onkeypress ="return SoloNumerosEnteros(event)"></td>
                  <td><input type="text" name="alimentoPpr54" value="{{ old('alimentoPpr54')}}"></td>
                  <td><input type="text" name="ObservacionesPpr54" value="{{ old('ObservacionesPpr54')}}"></td>
                  <td><a href="#" class="btn"><i class="fa fa-plus-circle" aria-hidden="true"></i></a></td>
                </tr>
                <tr>
                  <td>56</td>
                  <td><input type="text" name="dfsPpr55" value="{{ old('dfsPpr55')}}"></td>
                  <td><input type="text" name="semanavidaPpr55" value="{{ old('semanavidaPpr55')}}"></td>
                  <td><input type="text" name="huevosPpr55" value="{{ old('huevosPpr55')}}" onkeypress ="return SoloNumerosEnteros(event)"></td>
                  <td><input type="text" name="consumoPpr55" value="{{ old('consumoPpr55')}}" onkeypress ="return SoloNumerosEnteros(event)"></td>
                  <td><input type="text" name="mortalidadPpr55" value="{{ old('mortalidadPpr55')}}" onkeypress ="return SoloNumerosEnteros(event)"></td>
                  <td><input type="text" name="seleccionPpr55" value="{{ old('seleccionPpr55')}}" onkeypress ="return SoloNumerosEnteros(event)"></td>
                  <td><input type="text" name="ventasPpr55" value="{{ old('ventasPpr55')}}" onkeypress ="return SoloNumerosEnteros(event)"></td>
                  <td><input type="text" name="pesoavePpr55" value="{{ old('pesoavePpr55')}}" onkeypress ="return SoloNumerosEnteros(event)"></td>
                  <td><input type="text" name="pesohuevoPpr55" value="{{ old('pesohuevoPpr55')}}" onkeypress ="return SoloNumerosEnteros(event)"></td>
                  <td><input type="text" name="alimentoPpr55" value="{{ old('alimentoPpr55')}}"></td>
                  <td><input type="text" name="ObservacionesPpr55" value="{{ old('ObservacionesPpr55')}}"></td>
                  <td><a href="#" class="btn"><i class="fa fa-plus-circle" aria-hidden="true"></i></a></td>
                </tr>
                <tr>
                  <td>57</td>
                  <td><input type="text" name="dfsPpr56" value="{{ old('dfsPpr56')}}"></td>
                  <td><input type="text" name="semanavidaPpr56" value="{{ old('semanavidaPpr56')}}"></td>
                  <td><input type="text" name="huevosPpr56" value="{{ old('huevosPpr56')}}" onkeypress ="return SoloNumerosEnteros(event)"></td>
                  <td><input type="text" name="consumoPpr56" value="{{ old('consumoPpr56')}}" onkeypress ="return SoloNumerosEnteros(event)"></td>
                  <td><input type="text" name="mortalidadPpr56" value="{{ old('mortalidadPpr56')}}" onkeypress ="return SoloNumerosEnteros(event)"></td>
                  <td><input type="text" name="seleccionPpr56" value="{{ old('seleccionPpr56')}}" onkeypress ="return SoloNumerosEnteros(event)"></td>
                  <td><input type="text" name="ventasPpr56" value="{{ old('ventasPpr56')}}" onkeypress ="return SoloNumerosEnteros(event)"></td>
                  <td><input type="text" name="pesoavePpr56" value="{{ old('pesoavePpr56')}}" onkeypress ="return SoloNumerosEnteros(event)"></td>
                  <td><input type="text" name="pesohuevoPpr56" value="{{ old('pesohuevoPpr56')}}" onkeypress ="return SoloNumerosEnteros(event)"></td>
                  <td><input type="text" name="alimentoPpr56" value="{{ old('alimentoPpr56')}}"></td>
                  <td><input type="text" name="ObservacionesPpr56" value="{{ old('ObservacionesPpr56')}}"></td>
                  <td><a href="#" class="btn"><i class="fa fa-plus-circle" aria-hidden="true"></i></a></td>
                </tr>
                <tr>
                  <td>58</td>
                  <td><input type="text" name="dfsPpr57" value="{{ old('dfsPpr57')}}"></td>
                  <td><input type="text" name="semanavidaPpr57" value="{{ old('semanavidaPpr57')}}"></td>
                  <td><input type="text" name="huevosPpr57" value="{{ old('huevosPpr57')}}" onkeypress ="return SoloNumerosEnteros(event)"></td>
                  <td><input type="text" name="consumoPpr57" value="{{ old('consumoPpr57')}}" onkeypress ="return SoloNumerosEnteros(event)"></td>
                  <td><input type="text" name="mortalidadPpr57" value="{{ old('mortalidadPpr57')}}" onkeypress ="return SoloNumerosEnteros(event)"></td>
                  <td><input type="text" name="seleccionPpr57" value="{{ old('seleccionPpr57')}}" onkeypress ="return SoloNumerosEnteros(event)"></td>
                  <td><input type="text" name="ventasPpr57" value="{{ old('ventasPpr57')}}" onkeypress ="return SoloNumerosEnteros(event)"></td>
                  <td><input type="text" name="pesoavePpr57" value="{{ old('pesoavePpr57')}}" onkeypress ="return SoloNumerosEnteros(event)"></td>
                  <td><input type="text" name="pesohuevoPpr57" value="{{ old('pesohuevoPpr57')}}" onkeypress ="return SoloNumerosEnteros(event)"></td>
                  <td><input type="text" name="alimentoPpr57" value="{{ old('alimentoPpr57')}}"></td>
                  <td><input type="text" name="ObservacionesPpr57" value="{{ old('ObservacionesPpr57')}}"></td>
                  <td><a href="#" class="btn"><i class="fa fa-plus-circle" aria-hidden="true"></i></a></td>
                </tr>
                <tr>
                  <td>59</td>
                  <td><input type="text" name="dfsPpr58" value="{{ old('dfsPpr58')}}"></td>
                  <td><input type="text" name="semanavidaPpr58" value="{{ old('semanavidaPpr58')}}"></td>
                  <td><input type="text" name="huevosPpr58" value="{{ old('huevosPpr58')}}" onkeypress ="return SoloNumerosEnteros(event)"></td>
                  <td><input type="text" name="consumoPpr58" value="{{ old('consumoPpr58')}}" onkeypress ="return SoloNumerosEnteros(event)"></td>
                  <td><input type="text" name="mortalidadPpr58" value="{{ old('mortalidadPpr58')}}" onkeypress ="return SoloNumerosEnteros(event)"></td>
                  <td><input type="text" name="seleccionPpr58" value="{{ old('seleccionPpr58')}}" onkeypress ="return SoloNumerosEnteros(event)"></td>
                  <td><input type="text" name="ventasPpr58" value="{{ old('ventasPpr58')}}" onkeypress ="return SoloNumerosEnteros(event)"></td>
                  <td><input type="text" name="pesoavePpr58" value="{{ old('pesoavePpr58')}}" onkeypress ="return SoloNumerosEnteros(event)"></td>
                  <td><input type="text" name="pesohuevoPpr58" value="{{ old('pesohuevoPpr58')}}" onkeypress ="return SoloNumerosEnteros(event)"></td>
                  <td><input type="text" name="alimentoPpr58" value="{{ old('alimentoPpr58')}}"></td>
                  <td><input type="text" name="ObservacionesPpr58" value="{{ old('ObservacionesPpr58')}}"></td>
                  <td><a href="#" class="btn"><i class="fa fa-plus-circle" aria-hidden="true"></i></a></td>
                </tr>
                <tr>
                  <td>60</td>
                  <td><input type="text" name="dfsPpr59" value="{{ old('dfsPpr59')}}"></td>
                  <td><input type="text" name="semanavidaPpr59" value="{{ old('semanavidaPpr59')}}"></td>
                  <td><input type="text" name="huevosPpr59" value="{{ old('huevosPpr59')}}" onkeypress ="return SoloNumerosEnteros(event)"></td>
                  <td><input type="text" name="consumoPpr59" value="{{ old('consumoPpr59')}}" onkeypress ="return SoloNumerosEnteros(event)"></td>
                  <td><input type="text" name="mortalidadPpr59" value="{{ old('mortalidadPpr59')}}" onkeypress ="return SoloNumerosEnteros(event)"></td>
                  <td><input type="text" name="seleccionPpr59" value="{{ old('seleccionPpr59')}}" onkeypress ="return SoloNumerosEnteros(event)"></td>
                  <td><input type="text" name="ventasPpr59" value="{{ old('ventasPpr59')}}" onkeypress ="return SoloNumerosEnteros(event)"></td>
                  <td><input type="text" name="pesoavePpr59" value="{{ old('pesoavePpr59')}}" onkeypress ="return SoloNumerosEnteros(event)"></td>
                  <td><input type="text" name="pesohuevoPpr59" value="{{ old('pesohuevoPpr59')}}" onkeypress ="return SoloNumerosEnteros(event)"></td>
                  <td><input type="text" name="alimentoPpr59" value="{{ old('alimentoPpr59')}}"></td>
                  <td><input type="text" name="ObservacionesPpr59" value="{{ old('ObservacionesPpr59')}}"></td>
                  <td><a href="#" class="btn"><i class="fa fa-plus-circle" aria-hidden="true"></i></a></td>
                </tr>
                <tr>
                  <td>61</td>
                  <td><input type="text" name="dfsPpr60" value="{{ old('dfsPpr60')}}"></td>
                  <td><input type="text" name="semanavidaPpr60" value="{{ old('semanavidaPpr60')}}"></td>
                  <td><input type="text" name="huevosPpr60" value="{{ old('huevosPpr60')}}" onkeypress ="return SoloNumerosEnteros(event)"></td>
                  <td><input type="text" name="consumoPpr60" value="{{ old('consumoPpr60')}}" onkeypress ="return SoloNumerosEnteros(event)"></td>
                  <td><input type="text" name="mortalidadPpr60" value="{{ old('mortalidadPpr60')}}" onkeypress ="return SoloNumerosEnteros(event)"></td>
                  <td><input type="text" name="seleccionPpr60" value="{{ old('seleccionPpr60')}}" onkeypress ="return SoloNumerosEnteros(event)"></td>
                  <td><input type="text" name="ventasPpr60" value="{{ old('ventasPpr60')}}" onkeypress ="return SoloNumerosEnteros(event)"></td>
                  <td><input type="text" name="pesoavePpr60" value="{{ old('pesoavePpr60')}}" onkeypress ="return SoloNumerosEnteros(event)"></td>
                  <td><input type="text" name="pesohuevoPpr60" value="{{ old('pesohuevoPpr60')}}" onkeypress ="return SoloNumerosEnteros(event)"></td>
                  <td><input type="text" name="alimentoPpr60" value="{{ old('alimentoPpr60')}}"></td>
                  <td><input type="text" name="ObservacionesPpr60" value="{{ old('ObservacionesPpr60')}}"></td>
                  <td><a href="#" class="btn"><i class="fa fa-plus-circle" aria-hidden="true"></i></a></td>
                </tr>
                <tr>
                  <td>62</td>
                  <td><input type="text" name="dfsPpr61" value="{{ old('dfsPpr61')}}"></td>
                  <td><input type="text" name="semanavidaPpr61" value="{{ old('semanavidaPpr61')}}"></td>
                  <td><input type="text" name="huevosPpr61" value="{{ old('huevosPpr61')}}" onkeypress ="return SoloNumerosEnteros(event)"></td>
                  <td><input type="text" name="consumoPpr61" value="{{ old('consumoPpr61')}}" onkeypress ="return SoloNumerosEnteros(event)"></td>
                  <td><input type="text" name="mortalidadPpr61" value="{{ old('mortalidadPpr61')}}" onkeypress ="return SoloNumerosEnteros(event)"></td>
                  <td><input type="text" name="seleccionPpr61" value="{{ old('seleccionPpr61')}}" onkeypress ="return SoloNumerosEnteros(event)"></td>
                  <td><input type="text" name="ventasPpr61" value="{{ old('ventasPpr61')}}" onkeypress ="return SoloNumerosEnteros(event)"></td>
                  <td><input type="text" name="pesoavePpr61" value="{{ old('pesoavePpr61')}}" onkeypress ="return SoloNumerosEnteros(event)"></td>
                  <td><input type="text" name="pesohuevoPpr61" value="{{ old('pesohuevoPpr61')}}" onkeypress ="return SoloNumerosEnteros(event)"></td>
                  <td><input type="text" name="alimentoPpr61" value="{{ old('alimentoPpr61')}}"></td>
                  <td><input type="text" name="ObservacionesPpr61" value="{{ old('ObservacionesPpr61')}}"></td>
                  <td><a href="#" class="btn"><i class="fa fa-plus-circle" aria-hidden="true"></i></a></td>
                </tr>
                <tr>
                  <td>63</td>
                  <td><input type="text" name="dfsPpr62" value="{{ old('dfsPpr62')}}"></td>
                  <td><input type="text" name="semanavidaPpr62" value="{{ old('semanavidaPpr62')}}"></td>
                  <td><input type="text" name="huevosPpr62" value="{{ old('huevosPpr62')}}" onkeypress ="return SoloNumerosEnteros(event)"></td>
                  <td><input type="text" name="consumoPpr62" value="{{ old('consumoPpr62')}}" onkeypress ="return SoloNumerosEnteros(event)"></td>
                  <td><input type="text" name="mortalidadPpr62" value="{{ old('mortalidadPpr62')}}" onkeypress ="return SoloNumerosEnteros(event)"></td>
                  <td><input type="text" name="seleccionPpr62" value="{{ old('seleccionPpr62')}}" onkeypress ="return SoloNumerosEnteros(event)"></td>
                  <td><input type="text" name="ventasPpr62" value="{{ old('ventasPpr62')}}" onkeypress ="return SoloNumerosEnteros(event)"></td>
                  <td><input type="text" name="pesoavePpr62" value="{{ old('pesoavePpr62')}}" onkeypress ="return SoloNumerosEnteros(event)"></td>
                  <td><input type="text" name="pesohuevoPpr62" value="{{ old('pesohuevoPpr62')}}" onkeypress ="return SoloNumerosEnteros(event)"></td>
                  <td><input type="text" name="alimentoPpr62" value="{{ old('alimentoPpr62')}}"></td>
                  <td><input type="text" name="ObservacionesPpr62" value="{{ old('ObservacionesPpr62')}}"></td>
                  <td><a href="#" class="btn"><i class="fa fa-plus-circle" aria-hidden="true"></i></a></td>
                </tr>
                <tr>
                  <td>64</td>
                  <td><input type="text" name="dfsPpr63" value="{{ old('dfsPpr63')}}"></td>
                  <td><input type="text" name="semanavidaPpr63" value="{{ old('semanavidaPpr63')}}"></td>
                  <td><input type="text" name="huevosPpr63" value="{{ old('huevosPpr63')}}" onkeypress ="return SoloNumerosEnteros(event)"></td>
                  <td><input type="text" name="consumoPpr63" value="{{ old('consumoPpr63')}}" onkeypress ="return SoloNumerosEnteros(event)"></td>
                  <td><input type="text" name="mortalidadPpr63" value="{{ old('mortalidadPpr63')}}" onkeypress ="return SoloNumerosEnteros(event)"></td>
                  <td><input type="text" name="seleccionPpr63" value="{{ old('seleccionPpr63')}}" onkeypress ="return SoloNumerosEnteros(event)"></td>
                  <td><input type="text" name="ventasPpr63" value="{{ old('ventasPpr63')}}" onkeypress ="return SoloNumerosEnteros(event)"></td>
                  <td><input type="text" name="pesoavePpr63" value="{{ old('pesoavePpr63')}}" onkeypress ="return SoloNumerosEnteros(event)"></td>
                  <td><input type="text" name="pesohuevoPpr63" value="{{ old('pesohuevoPpr63')}}" onkeypress ="return SoloNumerosEnteros(event)"></td>
                  <td><input type="text" name="alimentoPpr63" value="{{ old('alimentoPpr63')}}"></td>
                  <td><input type="text" name="ObservacionesPpr63" value="{{ old('ObservacionesPpr63')}}"></td>
                  <td><a href="#" class="btn"><i class="fa fa-plus-circle" aria-hidden="true"></i></a></td>
                </tr>
                <tr>
                  <td>65</td>
                  <td><input type="text" name="dfsPpr64" value="{{ old('dfsPpr64')}}"></td>
                  <td><input type="text" name="semanavidaPpr64" value="{{ old('semanavidaPpr64')}}"></td>
                  <td><input type="text" name="huevosPpr64" value="{{ old('huevosPpr64')}}" onkeypress ="return SoloNumerosEnteros(event)"></td>
                  <td><input type="text" name="consumoPpr64" value="{{ old('consumoPpr64')}}" onkeypress ="return SoloNumerosEnteros(event)"></td>
                  <td><input type="text" name="mortalidadPpr64" value="{{ old('mortalidadPpr64')}}" onkeypress ="return SoloNumerosEnteros(event)"></td>
                  <td><input type="text" name="seleccionPpr64" value="{{ old('seleccionPpr64')}}" onkeypress ="return SoloNumerosEnteros(event)"></td>
                  <td><input type="text" name="ventasPpr64" value="{{ old('ventasPpr64')}}" onkeypress ="return SoloNumerosEnteros(event)"></td>
                  <td><input type="text" name="pesoavePpr64" value="{{ old('pesoavePpr64')}}" onkeypress ="return SoloNumerosEnteros(event)"></td>
                  <td><input type="text" name="pesohuevoPpr64" value="{{ old('pesohuevoPpr64')}}" onkeypress ="return SoloNumerosEnteros(event)"></td>
                  <td><input type="text" name="alimentoPpr64" value="{{ old('alimentoPpr64')}}"></td>
                  <td><input type="text" name="ObservacionesPpr64" value="{{ old('ObservacionesPpr64')}}"></td>
                  <td><a href="#" class="btn"><i class="fa fa-plus-circle" aria-hidden="true"></i></a></td>
                </tr>
                <tr>
                  <td>66</td>
                  <td><input type="text" name="dfsPpr65" value="{{ old('dfsPpr65')}}"></td>
                  <td><input type="text" name="semanavidaPpr65" value="{{ old('semanavidaPpr65')}}"></td>
                  <td><input type="text" name="huevosPpr65" value="{{ old('huevosPpr65')}}" onkeypress ="return SoloNumerosEnteros(event)"></td>
                  <td><input type="text" name="consumoPpr65" value="{{ old('consumoPpr65')}}" onkeypress ="return SoloNumerosEnteros(event)"></td>
                  <td><input type="text" name="mortalidadPpr65" value="{{ old('mortalidadPpr65')}}" onkeypress ="return SoloNumerosEnteros(event)"></td>
                  <td><input type="text" name="seleccionPpr65" value="{{ old('seleccionPpr65')}}" onkeypress ="return SoloNumerosEnteros(event)"></td>
                  <td><input type="text" name="ventasPpr65" value="{{ old('ventasPpr65')}}" onkeypress ="return SoloNumerosEnteros(event)"></td>
                  <td><input type="text" name="pesoavePpr65" value="{{ old('pesoavePpr65')}}" onkeypress ="return SoloNumerosEnteros(event)"></td>
                  <td><input type="text" name="pesohuevoPpr65" value="{{ old('pesohuevoPpr65')}}" onkeypress ="return SoloNumerosEnteros(event)"></td>
                  <td><input type="text" name="alimentoPpr65" value="{{ old('alimentoPpr65')}}"></td>
                  <td><input type="text" name="ObservacionesPpr65" value="{{ old('ObservacionesPpr65')}}"></td>
                  <td><a href="#" class="btn"><i class="fa fa-plus-circle" aria-hidden="true"></i></a></td>
                </tr>
                <tr>
                  <td>67</td>
                  <td><input type="text" name="dfsPpr66" value="{{ old('dfsPpr66')}}"></td>
                  <td><input type="text" name="semanavidaPpr66" value="{{ old('semanavidaPpr66')}}"></td>
                  <td><input type="text" name="huevosPpr66" value="{{ old('huevosPpr66')}}" onkeypress ="return SoloNumerosEnteros(event)"></td>
                  <td><input type="text" name="consumoPpr66" value="{{ old('consumoPpr66')}}" onkeypress ="return SoloNumerosEnteros(event)"></td>
                  <td><input type="text" name="mortalidadPpr66" value="{{ old('mortalidadPpr66')}}" onkeypress ="return SoloNumerosEnteros(event)"></td>
                  <td><input type="text" name="seleccionPpr66" value="{{ old('seleccionPpr66')}}" onkeypress ="return SoloNumerosEnteros(event)"></td>
                  <td><input type="text" name="ventasPpr66" value="{{ old('ventasPpr66')}}" onkeypress ="return SoloNumerosEnteros(event)"></td>
                  <td><input type="text" name="pesoavePpr66" value="{{ old('pesoavePpr66')}}" onkeypress ="return SoloNumerosEnteros(event)"></td>
                  <td><input type="text" name="pesohuevoPpr66" value="{{ old('pesohuevoPpr66')}}" onkeypress ="return SoloNumerosEnteros(event)"></td>
                  <td><input type="text" name="alimentoPpr66" value="{{ old('alimentoPpr66')}}"></td>
                  <td><input type="text" name="ObservacionesPpr66" value="{{ old('ObservacionesPpr66')}}"></td>
                  <td><a href="#" class="btn"><i class="fa fa-plus-circle" aria-hidden="true"></i></a></td>
                </tr>
                <tr>
                  <td>68</td>
                  <td><input type="text" name="dfsPpr67" value="{{ old('dfsPpr67')}}"></td>
                  <td><input type="text" name="semanavidaPpr67" value="{{ old('semanavidaPpr67')}}"></td>
                  <td><input type="text" name="huevosPpr67" value="{{ old('huevosPpr67')}}" onkeypress ="return SoloNumerosEnteros(event)"></td>
                  <td><input type="text" name="consumoPpr67" value="{{ old('consumoPpr67')}}" onkeypress ="return SoloNumerosEnteros(event)"></td>
                  <td><input type="text" name="mortalidadPpr67" value="{{ old('mortalidadPpr67')}}" onkeypress ="return SoloNumerosEnteros(event)"></td>
                  <td><input type="text" name="seleccionPpr67" value="{{ old('seleccionPpr67')}}" onkeypress ="return SoloNumerosEnteros(event)"></td>
                  <td><input type="text" name="ventasPpr67" value="{{ old('ventasPpr67')}}" onkeypress ="return SoloNumerosEnteros(event)"></td>
                  <td><input type="text" name="pesoavePpr67" value="{{ old('pesoavePpr67')}}" onkeypress ="return SoloNumerosEnteros(event)"></td>
                  <td><input type="text" name="pesohuevoPpr67" value="{{ old('pesohuevoPpr67')}}" onkeypress ="return SoloNumerosEnteros(event)"></td>
                  <td><input type="text" name="alimentoPpr67" value="{{ old('alimentoPpr67')}}"></td>
                  <td><input type="text" name="ObservacionesPpr67" value="{{ old('ObservacionesPpr67')}}"></td>
                  <td><a href="#" class="btn"><i class="fa fa-plus-circle" aria-hidden="true"></i></a></td>
                </tr>
                <tr>
                  <td>69</td>
                  <td><input type="text" name="dfsPpr68" value="{{ old('dfsPpr68')}}"></td>
                  <td><input type="text" name="semanavidaPpr68" value="{{ old('semanavidaPpr68')}}"></td>
                  <td><input type="text" name="huevosPpr68" value="{{ old('huevosPpr68')}}" onkeypress ="return SoloNumerosEnteros(event)"></td>
                  <td><input type="text" name="consumoPpr68" value="{{ old('consumoPpr68')}}" onkeypress ="return SoloNumerosEnteros(event)"></td>
                  <td><input type="text" name="mortalidadPpr68" value="{{ old('mortalidadPpr68')}}" onkeypress ="return SoloNumerosEnteros(event)"></td>
                  <td><input type="text" name="seleccionPpr68" value="{{ old('seleccionPpr68')}}" onkeypress ="return SoloNumerosEnteros(event)"></td>
                  <td><input type="text" name="ventasPpr68" value="{{ old('ventasPpr68')}}" onkeypress ="return SoloNumerosEnteros(event)"></td>
                  <td><input type="text" name="pesoavePpr68" value="{{ old('pesoavePpr68')}}" onkeypress ="return SoloNumerosEnteros(event)"></td>
                  <td><input type="text" name="pesohuevoPpr68" value="{{ old('pesohuevoPpr68')}}" onkeypress ="return SoloNumerosEnteros(event)"></td>
                  <td><input type="text" name="alimentoPpr68" value="{{ old('alimentoPpr68')}}"></td>
                  <td><input type="text" name="ObservacionesPpr68" value="{{ old('ObservacionesPpr68')}}"></td>
                  <td><a href="#" class="btn"><i class="fa fa-plus-circle" aria-hidden="true"></i></a></td>
                </tr>
                <tr>
                  <td>70</td>
                  <td><input type="text" name="dfsPpr69" value="{{ old('dfsPpr69')}}"></td>
                  <td><input type="text" name="semanavidaPpr69" value="{{ old('semanavidaPpr69')}}"></td>
                  <td><input type="text" name="huevosPpr69" value="{{ old('huevosPpr69')}}" onkeypress ="return SoloNumerosEnteros(event)"></td>
                  <td><input type="text" name="consumoPpr69" value="{{ old('consumoPpr69')}}" onkeypress ="return SoloNumerosEnteros(event)"></td>
                  <td><input type="text" name="mortalidadPpr69" value="{{ old('mortalidadPpr69')}}" onkeypress ="return SoloNumerosEnteros(event)"></td>
                  <td><input type="text" name="seleccionPpr69" value="{{ old('seleccionPpr69')}}" onkeypress ="return SoloNumerosEnteros(event)"></td>
                  <td><input type="text" name="ventasPpr69" value="{{ old('ventasPpr69')}}" onkeypress ="return SoloNumerosEnteros(event)"></td>
                  <td><input type="text" name="pesoavePpr69" value="{{ old('pesoavePpr69')}}" onkeypress ="return SoloNumerosEnteros(event)"></td>
                  <td><input type="text" name="pesohuevoPpr69" value="{{ old('pesohuevoPpr69')}}" onkeypress ="return SoloNumerosEnteros(event)"></td>
                  <td><input type="text" name="alimentoPpr69" value="{{ old('alimentoPpr69')}}"></td>
                  <td><input type="text" name="ObservacionesPpr69" value="{{ old('ObservacionesPpr69')}}"></td>
                  <td><a href="#" class="btn"><i class="fa fa-plus-circle" aria-hidden="true"></i></a></td>
                </tr>
              </tbody>
            </table>
        </div>
        <div class="col-md-12">
          <div class="row">
            <div class="input-group separacion">
              <button id="boton_formulario">Guardar</button>
            </div>
          </div>
        </div>              
      {{ Form::close() }}
    @endforeach 
  @endsection