@extends('layouts.app')
  @section('content')
    <h4 class="with-border">Ponedoras Levante</h4>
    @if ($errors->any())
      <div class=" col-md-offset-2 separacion alert alert-danger">
        <ul>
          @foreach ($errors->all() as $error)
            <li>{{ $error}}</li>
          @endforeach
        </ul>
      </div>
    @endif
    {!! Form::open(['route' => 'ponedoraslevantes/search', 'method' => 'post', 'novalidate']) !!}
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
      {{ Form::open(['route' => 'ponedoraslevantes.store']) }}
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
                  <input type="text" name="encasetamientoLot" class="form-control" id="encasetamientoLot" value="{{$encasetamientoLot}}" disabled>
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
            <div class="input-group separacion col-md-4">
              <span class="input-group-addon"></span>
              <div class="form-group label-floating">
                  <label class="control-label labelponedoraslevante">Pollitas Recibidas</label>
                  <input type="text" name="pollitasLot" class="form-control" id="pollitasLot" value="{{ $Lote->pollitasLot}}" readonly>
              </div>
            </div>
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
        @if($Lote->nombreLot != null and $Lote->nombreSub == null)
          <input type="hidden" name="idLote" value="{{ $Lote->id}}">
        @endif
        @if($Lote->nombreSub != null)
          <input type="hidden" name="idSublote" value="{{ $Lote->id}}">
        @endif
            <div class="col-md-12">
              <div class="row">
                <div class="input-group separacion col-md-4">
                  <span class="input-group-addon"></span>
                  <div class="form-group label-floating">
                      <label class="control-label labelponedoraslevante">Foto Periodo</label>
                      <input name="fotoPle" class="form-control" id="fotoPle" value="{{ old('fotoPle')}}" onkeypress ="return SoloNumerosEnteros(event)" data-toggle="tooltip" data-placement="right" data-original-title="Digite un Foto Periodo entre 8 y 12">
                  </div>
                </div>
                <div class="input-group separacion col-md-4">
                  <span class="input-group-addon"></span>
                  <div class="form-group label-floating">
                      <label class="control-label labelponedoraslevante">Despique</label>
                      <input name="despiquePle" class="form-control" id="despiquePle" value="{{ old('despiquePle')}}" onkeypress ="return SoloNumerosEnteros(event)" data-toggle="tooltip" data-placement="right" data-original-title="Digite un Despique entre 1 y 5">
                  </div>
                </div>
                <div class="input-group separacion col-md-4">
                  <span class="input-group-addon"></span>
                  <div class="form-group label-floating">
                      <label class="control-label labelponedoraslevante">Traslado Px</label>
                      <input name="trasladoPle" class="form-control" id="trasladoPle" value="{{ old('trasladoPle')}}" onkeypress ="return SoloNumerosEnteros(event)" data-toggle="tooltip" data-placement="right" data-original-title="Digite un Traslado PX entre 10 y 19">
                  </div>
                </div>
              </div>
            </div>
            <div class="col-md-12">
              <div class="row">
                <div class="input-group separacion col-md-4">
                  <label class="labelponedoraslevante">Programa Oscurecimiento</label></br></br>
                </div>
                <div class="input-group separacion col-md-4">
                  <div class="checkbox-detailed checkno">
                    <input type="checkbox" name="programaPle" value="No" id="check-det-1"/>
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
            </div>
            <div class="collapse" id="collapseExample">
              <div>
                <div class="col-md-12">
                  <div class="row">
                    <div class="input-group separacion col-md-4 col-md-offset-2">
                      <span class="input-group-addon"><i class="fa fa-calendar fa-2x"></i></span>
                      <div class="form-group label-floating">
                          <label class="control-label">Inicio- Descenso de Luz</label>
                          <input type="text" id="datepicker" name="inicioluzPle" class="form-control" value="{{ old('inicioluzPle')}}" autocomplete="off" readonly>
                      </div>
                    </div>
                    <div class="input-group separacion col-md-4">
                      <span class="input-group-addon"><i class="fa fa-calendar fa-2x"></i></span>
                      <div class="form-group label-floating">
                          <label class="control-label">Fin- Descenso de Luz</label>
                          <input type="text" id="datepicker1" name="finluzPle" class="form-control" value="{{ old('finluzPle')}}" autocomplete="off" readonly>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-sm-12" id="formularioguia">
            <table class="table table-bordered">
              <thead>
                <tr>
                  <th>Semana Vida</th>
                  <th>Fecha FDS</th>
                  <th>Nº Aves Muertas</th>
                  <th>Mortalidad</th>
                  <th>Seleccion</th>
                  <th>Otros</th>
                  <th>Alimento</th>
                  <th>Consumo Kg</th>
                  <th>Peso Ave</th>
                  <th>% Uniformidad</th>
                  <th>Coeficiente Variacion</th>
                  <th>Observaciones</th>
                  <!--<th></th>-->
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td>1</td>
                  <td><input type="text" name="fdsPle" value="{{$fecha1}}" readonly></td>
                  <td><input type="number" name="avesmuertasPle" value="{{ old('avesmuertasPle')}}" required></td>
                  <td><input type="text" name="mortalidadPle" value="{{ old('mortalidadPle')}}" required onkeypress ="return SoloNumerosEnteros(event)"></td>
                  <td><input type="text" name="seleccionPle" value="{{ old('seleccionPle')}}" required onkeypress ="return SoloNumerosEnteros(event)"></td>
                  <td><input type="text" name="otrosPle" value="{{ old('otrosPle')}}" required onkeypress ="return SoloNumerosEnteros(event)"></td>
                  <td><input type="text" name="alimentoPle" value="{{ old('alimentoPle')}}" required></td>
                  <td><input type="text" name="consumoPle" value="{{ old('consumoPle')}}" required onkeypress="return undecimal(event,this);"></td>
                  <td><input type="text" name="pesoPle" value="{{ old('pesoPle')}}" required onkeypress ="return SoloNumerosEnteros(event)"></td>
                  <td><input type="text" name="uniformidadPle" value="{{ old('uniformidadPle')}}" required onkeypress="return undecimal(event,this);"></td>
                  <td><input type="text" name="coeficientePle" value="{{ old('coeficientePle')}}" required onkeypress ="return SoloNumerosEnteros(event)"></td>
                  <td><input type="text" name="observacionesPle" value="{{ old('observacionesPle')}}" required></td>
                  <!--<td class="espacio2" width="10px"><a href="#" class="btn"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a></td>-->
                </tr>
                <tr>
                  <td>2</td>
                  <td><input type="text" name="fdsPle1" value="{{$fecha2}}" readonly></td>
                  <td><input type="number" name="avesmuertasPle1" value="{{ old('avesmuertasPle1')}}"></td>
                  <td><input type="text" name="mortalidadPle1" value="{{ old('mortalidadPle1')}}" onkeypress ="return SoloNumerosEnteros(event)"></td>
                  <td><input type="text" name="seleccionPle1" value="{{ old('seleccionPle1')}}" onkeypress ="return SoloNumerosEnteros(event)"></td>
                  <td><input type="text" name="otrosPle1" value="{{ old('otrosPle1')}}" onkeypress ="return SoloNumerosEnteros(event)"></td>
                  <td><input type="text" name="alimentoPle1" value="{{ old('alimentoPle1')}}"></td>
                  <td><input type="text" name="consumoPle1" value="{{ old('consumoPle1')}}" onkeypress="return undecimal(event,this);"></td>
                  <td><input type="text" name="pesoPle1" value="{{ old('pesoPle1')}}" onkeypress ="return SoloNumerosEnteros(event)"></td>
                  <td><input type="text" name="uniformidadPle1" value="{{ old('uniformidadPle1')}}" onkeypress="return undecimal(event,this);"></td>
                  <td><input type="text" name="coeficientePle1" value="{{ old('coeficientePle1')}}" onkeypress ="return SoloNumerosEnteros(event)"></td>
                  <td><input type="text" name="observacionesPle1" value="{{ old('observacionesPle1')}}"></td>
                  <!--<td class="espacio2" width="10px"><a href="#" class="btn"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a></td>-->
                </tr>
                <tr>
                  <td>3</td>
                  <td><input type="text" name="fdsPle2" value="{{$fecha3}}" readonly></td>
                  <td><input type="number" name="avesmuertasPle2" value="{{ old('avesmuertasPle2')}}"></td>
                  <td><input type="text" name="mortalidadPle2" value="{{ old('mortalidadPle2')}}" onkeypress ="return SoloNumerosEnteros(event)"></td>
                  <td><input type="text" name="seleccionPle2" value="{{ old('seleccionPle2')}}" onkeypress ="return SoloNumerosEnteros(event)"></td>
                  <td><input type="text" name="otrosPle2" value="{{ old('otrosPle2')}}" onkeypress ="return SoloNumerosEnteros(event)"></td>
                  <td><input type="text" name="alimentoPle2" value="{{ old('alimentoPle2')}}"></td>
                  <td><input type="text" name="consumoPle2" value="{{ old('consumoPle2')}}" onkeypress="return undecimal(event,this);"></td>
                  <td><input type="text" name="pesoPle2" value="{{ old('pesoPle2')}}" onkeypress ="return SoloNumerosEnteros(event)"></td>
                  <td><input type="text" name="uniformidadPle2" value="{{ old('uniformidadPle2')}}" onkeypress="return undecimal(event,this);"></td>
                  <td><input type="text" name="coeficientePle2" value="{{ old('coeficientePle2')}}" onkeypress ="return SoloNumerosEnteros(event)"></td>
                  <td><input type="text" name="observacionesPle2" value="{{ old('observacionesPle2')}}"></td>
                  <!--<td class="espacio2" width="10px"><a href="#" class="btn"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a></td>-->
                </tr>
                <tr>
                  <td>4</td>
                  <td><input type="text" name="fdsPle3" value="{{$fecha4}}" readonly></td>
                  <td><input type="number" name="avesmuertasPle3" value="{{ old('avesmuertasPle3')}}"></td>
                  <td><input type="text" name="mortalidadPle3" value="{{ old('mortalidadPle3')}}" onkeypress ="return SoloNumerosEnteros(event)"></td>
                  <td><input type="text" name="seleccionPle3" value="{{ old('seleccionPle3')}}" onkeypress ="return SoloNumerosEnteros(event)"></td>
                  <td><input type="text" name="otrosPle3" value="{{ old('otrosPle3')}}" onkeypress ="return SoloNumerosEnteros(event)"></td>
                  <td><input type="text" name="alimentoPle3" value="{{ old('alimentoPle3')}}"></td>
                  <td><input type="text" name="consumoPle3" value="{{ old('consumoPle3')}}" onkeypress="return undecimal(event,this);"></td>
                  <td><input type="text" name="pesoPle3" value="{{ old('pesoPle3')}}" onkeypress ="return SoloNumerosEnteros(event)"></td>
                  <td><input type="text" name="uniformidadPle3" value="{{ old('uniformidadPle3')}}" onkeypress="return undecimal(event,this);"></td>
                  <td><input type="text" name="coeficientePle3" value="{{ old('coeficientePle3')}}" onkeypress ="return SoloNumerosEnteros(event)"></td>
                  <td><input type="text" name="observacionesPle3" value="{{ old('observacionesPle3')}}"></td>
                  <!--<td class="espacio2" width="10px"><a href="#" class="btn"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a></td>-->
                </tr>
                <tr>
                  <td>5</td>
                  <td><input type="text" name="fdsPle4" value="{{$fecha5}}" readonly></td>
                  <td><input type="number" name="avesmuertasPle4" value="{{ old('avesmuertasPle4')}}"></td>
                  <td><input type="text" name="mortalidadPle4" value="{{ old('mortalidadPle4')}}" onkeypress ="return SoloNumerosEnteros(event)"></td>
                  <td><input type="text" name="seleccionPle4" value="{{ old('seleccionPle4')}}" onkeypress ="return SoloNumerosEnteros(event)"></td>
                  <td><input type="text" name="otrosPle4" value="{{ old('otrosPle4')}}" onkeypress ="return SoloNumerosEnteros(event)"></td>
                  <td><input type="text" name="alimentoPle4" value="{{ old('alimentoPle4')}}"></td>
                  <td><input type="text" name="consumoPle4" value="{{ old('consumoPle4')}}" onkeypress="return undecimal(event,this);"></td>
                  <td><input type="text" name="pesoPle4" value="{{ old('pesoPle4')}}" onkeypress ="return SoloNumerosEnteros(event)"></td>
                  <td><input type="text" name="uniformidadPle4" value="{{ old('uniformidadPle4')}}" onkeypress="return undecimal(event,this);"></td>
                  <td><input type="text" name="coeficientePle4" value="{{ old('coeficientePle4')}}" onkeypress ="return SoloNumerosEnteros(event)"></td>
                  <td><input type="text" name="observacionesPle4" value="{{ old('observacionesPle4')}}"></td>
                  <!--<td class="espacio2" width="10px"><a href="#" class="btn"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a></td>-->
                </tr>
                <tr>
                  <td>6</td>
                  <td><input type="text" name="fdsPle5" value="{{$fecha6}}" readonly></td>
                  <td><input type="number" name="avesmuertasPle5" value="{{ old('avesmuertasPle5')}}"></td>
                  <td><input type="text" name="mortalidadPle5" value="{{ old('mortalidadPle5')}}" onkeypress ="return SoloNumerosEnteros(event)"></td>
                  <td><input type="text" name="seleccionPle5" value="{{ old('seleccionPle5')}}" onkeypress ="return SoloNumerosEnteros(event)"></td>
                  <td><input type="text" name="otrosPle5" value="{{ old('otrosPle5')}}" onkeypress ="return SoloNumerosEnteros(event)"></td>
                  <td><input type="text" name="alimentoPle5" value="{{ old('alimentoPle5')}}"></td>
                  <td><input type="text" name="consumoPle5" value="{{ old('consumoPle5')}}" onkeypress="return undecimal(event,this);"></td>
                  <td><input type="text" name="pesoPle5" value="{{ old('pesoPle5')}}" onkeypress ="return SoloNumerosEnteros(event)"></td>
                  <td><input type="text" name="uniformidadPle5" value="{{ old('uniformidadPle5')}}" onkeypress="return undecimal(event,this);"></td>
                  <td><input type="text" name="coeficientePle5" value="{{ old('coeficientePle5')}}" onkeypress ="return SoloNumerosEnteros(event)"></td>
                  <td><input type="text" name="observacionesPle5" value="{{ old('observacionesPle5')}}"></td>
                  <!--<td class="espacio2" width="10px"><a href="#" class="btn"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a></td>-->
                </tr>
                <tr>
                  <td>7</td>
                  <td><input type="text" name="fdsPle6" value="{{$fecha7}}" readonly></td>
                  <td><input type="number" name="avesmuertasPle6" value="{{ old('avesmuertasPle6')}}"></td>
                  <td><input type="text" name="mortalidadPle6" value="{{ old('mortalidadPle6')}}" onkeypress ="return SoloNumerosEnteros(event)"></td>
                  <td><input type="text" name="seleccionPle6" value="{{ old('seleccionPle6')}}" onkeypress ="return SoloNumerosEnteros(event)"></td>
                  <td><input type="text" name="otrosPle6" value="{{ old('otrosPle6')}}" onkeypress ="return SoloNumerosEnteros(event)"></td>
                  <td><input type="text" name="alimentoPle6" value="{{ old('alimentoPle6')}}"></td>
                  <td><input type="text" name="consumoPle6" value="{{ old('consumoPle6')}}" onkeypress="return undecimal(event,this);"></td>
                  <td><input type="text" name="pesoPle6" value="{{ old('pesoPle6')}}" onkeypress ="return SoloNumerosEnteros(event)"></td>
                  <td><input type="text" name="uniformidadPle6" value="{{ old('uniformidadPle6')}}" onkeypress="return undecimal(event,this);"></td>
                  <td><input type="text" name="coeficientePle6" value="{{ old('coeficientePle6')}}" onkeypress ="return SoloNumerosEnteros(event)"></td>
                  <td><input type="text" name="observacionesPle6" value="{{ old('observacionesPle6')}}"></td>
                  <!--<td class="espacio2" width="10px"><a href="#" class="btn"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a></td>-->
                </tr>
                <tr>
                  <td>8</td>
                  <td><input type="text" name="fdsPle7" value="{{$fecha8}}" readonly></td>
                  <td><input type="number" name="avesmuertasPle7" value="{{ old('avesmuertasPle7')}}"></td>
                  <td><input type="text" name="mortalidadPle7" value="{{ old('mortalidadPle7')}}" onkeypress ="return SoloNumerosEnteros(event)"></td>
                  <td><input type="text" name="seleccionPle7" value="{{ old('seleccionPle7')}}" onkeypress ="return SoloNumerosEnteros(event)"></td>
                  <td><input type="text" name="otrosPle7" value="{{ old('otrosPle7')}}" onkeypress ="return SoloNumerosEnteros(event)"></td>
                  <td><input type="text" name="alimentoPle7" value="{{ old('alimentoPle7')}}"></td>
                  <td><input type="text" name="consumoPle7" value="{{ old('consumoPle7')}}" onkeypress="return undecimal(event,this);"></td>
                  <td><input type="text" name="pesoPle7" value="{{ old('pesoPle7')}}" onkeypress ="return SoloNumerosEnteros(event)"></td>
                  <td><input type="text" name="uniformidadPle7" value="{{ old('uniformidadPle7')}}" onkeypress="return undecimal(event,this);"></td>
                  <td><input type="text" name="coeficientePle7" value="{{ old('coeficientePle7')}}" onkeypress ="return SoloNumerosEnteros(event)"></td>
                  <td><input type="text" name="observacionesPle7" value="{{ old('observacionesPle7')}}"></td>
                  <!--<td class="espacio2" width="10px"><a href="#" class="btn"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a></td>-->
                </tr>
                <tr>
                  <td>9</td>
                  <td><input type="text" name="fdsPle8" value="{{$fecha9}}" readonly></td>
                  <td><input type="number" name="avesmuertasPle8" value="{{ old('avesmuertasPle8')}}"></td>
                  <td><input type="text" name="mortalidadPle8" value="{{ old('mortalidadPle8')}}" onkeypress ="return SoloNumerosEnteros(event)"></td>
                  <td><input type="text" name="seleccionPle8" value="{{ old('seleccionPle8')}}" onkeypress ="return SoloNumerosEnteros(event)"></td>
                  <td><input type="text" name="otrosPle8" value="{{ old('otrosPle8')}}" onkeypress ="return SoloNumerosEnteros(event)"></td>
                  <td><input type="text" name="alimentoPle8" value="{{ old('alimentoPle8')}}"></td>
                  <td><input type="text" name="consumoPle8" value="{{ old('consumoPle8')}}" onkeypress="return undecimal(event,this);"></td>
                  <td><input type="text" name="pesoPle8" value="{{ old('pesoPle8')}}" onkeypress ="return SoloNumerosEnteros(event)"></td>
                  <td><input type="text" name="uniformidadPle8" value="{{ old('uniformidadPle8')}}" onkeypress="return undecimal(event,this);"></td>
                  <td><input type="text" name="coeficientePle8" value="{{ old('coeficientePle8')}}" onkeypress ="return SoloNumerosEnteros(event)"></td>
                  <td><input type="text" name="observacionesPle8" value="{{ old('observacionesPle8')}}"></td>
                  <!--<td class="espacio2" width="10px"><a href="#" class="btn"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a></td>-->
                </tr>
                <tr>
                  <td>10</td>
                  <td><input type="text" name="fdsPle9" value="{{$fecha10}}" readonly></td>
                  <td><input type="number" name="avesmuertasPle9" value="{{ old('avesmuertasPle9')}}"></td>
                  <td><input type="text" name="mortalidadPle9" value="{{ old('mortalidadPle9')}}" onkeypress ="return SoloNumerosEnteros(event)"></td>
                  <td><input type="text" name="seleccionPle9" value="{{ old('seleccionPle9')}}" onkeypress ="return SoloNumerosEnteros(event)"></td>
                  <td><input type="text" name="otrosPle9" value="{{ old('otrosPle9')}}" onkeypress ="return SoloNumerosEnteros(event)"></td>
                  <td><input type="text" name="alimentoPle9" value="{{ old('alimentoPle9')}}"></td>
                  <td><input type="text" name="consumoPle9" value="{{ old('consumoPle9')}}" onkeypress="return undecimal(event,this);"></td>
                  <td><input type="text" name="pesoPle9" value="{{ old('pesoPle9')}}" onkeypress ="return SoloNumerosEnteros(event)"></td>
                  <td><input type="text" name="uniformidadPle9" value="{{ old('uniformidadPle9')}}" onkeypress="return undecimal(event,this);"></td>
                  <td><input type="text" name="coeficientePle9" value="{{ old('coeficientePle9')}}" onkeypress ="return SoloNumerosEnteros(event)"></td>
                  <td><input type="text" name="observacionesPle9" value="{{ old('observacionesPle9')}}"></td>
                  <!--<td class="espacio2" width="10px"><a href="#" class="btn"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a></td>-->
                </tr>
                <tr>
                  <td>11</td>
                  <td><input type="text" name="fdsPle10" value="{{$fecha11}}" readonly></td>
                  <td><input type="number" name="avesmuertasPle10" value="{{ old('avesmuertasPle10')}}"></td>
                  <td><input type="text" name="mortalidadPle10" value="{{ old('mortalidadPle10')}}" onkeypress ="return SoloNumerosEnteros(event)"></td>
                  <td><input type="text" name="seleccionPle10" value="{{ old('seleccionPle10')}}" onkeypress ="return SoloNumerosEnteros(event)"></td>
                  <td><input type="text" name="otrosPle10" value="{{ old('otrosPle10')}}" onkeypress ="return SoloNumerosEnteros(event)"></td>
                  <td><input type="text" name="alimentoPle10" value="{{ old('alimentoPle10')}}"></td>
                  <td><input type="text" name="consumoPle10" value="{{ old('consumoPle10')}}" onkeypress="return undecimal(event,this);"></td>
                  <td><input type="text" name="pesoPle10" value="{{ old('pesoPle10')}}" onkeypress ="return SoloNumerosEnteros(event)"></td>
                  <td><input type="text" name="uniformidadPle10" value="{{ old('uniformidadPle10')}}" onkeypress="return undecimal(event,this);"></td>
                  <td><input type="text" name="coeficientePle10" value="{{ old('coeficientePle10')}}" onkeypress ="return SoloNumerosEnteros(event)"></td>
                  <td><input type="text" name="observacionesPle10" value="{{ old('observacionesPle10')}}"></td>
                  <!--<td class="espacio2" width="10px"><a href="#" class="btn"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a></td>-->
                </tr>
                <tr>
                  <td>12</td>
                  <td><input type="text" name="fdsPle11" value="{{$fecha12}}" readonly></td>
                  <td><input type="number" name="avesmuertasPle11" value="{{ old('avesmuertasPle11')}}"></td>
                  <td><input type="text" name="mortalidadPle11" value="{{ old('mortalidadPle11')}}" onkeypress ="return SoloNumerosEnteros(event)"></td>
                  <td><input type="text" name="seleccionPle11" value="{{ old('seleccionPle11')}}" onkeypress ="return SoloNumerosEnteros(event)"></td>
                  <td><input type="text" name="otrosPle11" value="{{ old('otrosPle11')}}" onkeypress ="return SoloNumerosEnteros(event)"></td>
                  <td><input type="text" name="alimentoPle11" value="{{ old('alimentoPle11')}}"></td>
                  <td><input type="text" name="consumoPle11" value="{{ old('consumoPle11')}}" onkeypress="return undecimal(event,this);"></td>
                  <td><input type="text" name="pesoPle11" value="{{ old('pesoPle11')}}" onkeypress ="return SoloNumerosEnteros(event)"></td>
                  <td><input type="text" name="uniformidadPle11" value="{{ old('uniformidadPle11')}}" onkeypress="return undecimal(event,this);"></td>
                  <td><input type="text" name="coeficientePle11" value="{{ old('coeficientePle11')}}" onkeypress ="return SoloNumerosEnteros(event)"></td>
                  <td><input type="text" name="observacionesPle11" value="{{ old('observacionesPle11')}}"></td>
                  <!--<td class="espacio2" width="10px"><a href="#" class="btn"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a></td>-->
                </tr>
                <tr>
                  <td>13</td>
                  <td><input type="text" name="fdsPle12" value="{{$fecha13}}" readonly></td>
                  <td><input type="number" name="avesmuertasPle12" value="{{ old('avesmuertasPle12')}}"></td>
                  <td><input type="text" name="mortalidadPle12" value="{{ old('mortalidadPle12')}}" onkeypress ="return SoloNumerosEnteros(event)"></td>
                  <td><input type="text" name="seleccionPle12" value="{{ old('seleccionPle12')}}" onkeypress ="return SoloNumerosEnteros(event)"></td>
                  <td><input type="text" name="otrosPle12" value="{{ old('otrosPle12')}}" onkeypress ="return SoloNumerosEnteros(event)"></td>
                  <td><input type="text" name="alimentoPle12" value="{{ old('alimentoPle12')}}"></td>
                  <td><input type="text" name="consumoPle12" value="{{ old('consumoPle12')}}" onkeypress="return undecimal(event,this);"></td>
                  <td><input type="text" name="pesoPle12" value="{{ old('pesoPle12')}}" onkeypress ="return SoloNumerosEnteros(event)"></td>
                  <td><input type="text" name="uniformidadPle12" value="{{ old('uniformidadPle12')}}" onkeypress="return undecimal(event,this);"></td>
                  <td><input type="text" name="coeficientePle12" value="{{ old('coeficientePle12')}}" onkeypress ="return SoloNumerosEnteros(event)"></td>
                  <td><input type="text" name="observacionesPle12" value="{{ old('observacionesPle12')}}"></td>
                  <!--<td class="espacio2" width="10px"><a href="#" class="btn"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a></td>-->
                </tr>
                <tr>
                  <td>14</td>
                  <td><input type="text" name="fdsPle13" value="{{$fecha14}}" readonly></td>
                  <td><input type="number" name="avesmuertasPle13" value="{{ old('avesmuertasPle13')}}"></td>
                  <td><input type="text" name="mortalidadPle13" value="{{ old('mortalidadPle13')}}" onkeypress ="return SoloNumerosEnteros(event)"></td>
                  <td><input type="text" name="seleccionPle13" value="{{ old('seleccionPle13')}}" onkeypress ="return SoloNumerosEnteros(event)"></td>
                  <td><input type="text" name="otrosPle13" value="{{ old('otrosPle13')}}" onkeypress ="return SoloNumerosEnteros(event)"></td>
                  <td><input type="text" name="alimentoPle13" value="{{ old('alimentoPle13')}}"></td>
                  <td><input type="text" name="consumoPle13" value="{{ old('consumoPle13')}}" onkeypress="return undecimal(event,this);"></td>
                  <td><input type="text" name="pesoPle13" value="{{ old('pesoPle13')}}" onkeypress ="return SoloNumerosEnteros(event)"></td>
                  <td><input type="text" name="uniformidadPle13" value="{{ old('uniformidadPle13')}}" onkeypress="return undecimal(event,this);"></td>
                  <td><input type="text" name="coeficientePle13" value="{{ old('coeficientePle13')}}" onkeypress ="return SoloNumerosEnteros(event)"></td>
                  <td><input type="text" name="observacionesPle13" value="{{ old('observacionesPle13')}}"></td>
                  <!--<td class="espacio2" width="10px"><a href="#" class="btn"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a></td>-->
                </tr>
                <tr>
                  <td>15</td>
                  <td><input type="text" name="fdsPle14" value="{{$fecha15}}" readonly></td>
                  <td><input type="number" name="avesmuertasPle14" value="{{ old('avesmuertasPle14')}}"></td>
                  <td><input type="text" name="mortalidadPle14" value="{{ old('mortalidadPle14')}}" onkeypress ="return SoloNumerosEnteros(event)"></td>
                  <td><input type="text" name="seleccionPle14" value="{{ old('seleccionPle14')}}" onkeypress ="return SoloNumerosEnteros(event)"></td>
                  <td><input type="text" name="otrosPle14" value="{{ old('otrosPle14')}}" onkeypress ="return SoloNumerosEnteros(event)"></td>
                  <td><input type="text" name="alimentoPle14" value="{{ old('alimentoPle14')}}"></td>
                  <td><input type="text" name="consumoPle14" value="{{ old('consumoPle14')}}" onkeypress="return undecimal(event,this);"></td>
                  <td><input type="text" name="pesoPle14" value="{{ old('pesoPle14')}}" onkeypress ="return SoloNumerosEnteros(event)"></td>
                  <td><input type="text" name="uniformidadPle14" value="{{ old('uniformidadPle14')}}" onkeypress="return undecimal(event,this);"></td>
                  <td><input type="text" name="coeficientePle14" value="{{ old('coeficientePle14')}}" onkeypress ="return SoloNumerosEnteros(event)"></td>
                  <td><input type="text" name="observacionesPle14" value="{{ old('observacionesPle14')}}"></td>
                  <!--<td class="espacio2" width="10px"><a href="#" class="btn"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a></td>-->
                </tr>
                <tr>
                  <td>16</td>
                  <td><input type="text" name="fdsPle15" value="{{$fecha16}}" readonly></td>
                  <td><input type="number" name="avesmuertasPle15" value="{{ old('avesmuertasPle15')}}"></td>
                  <td><input type="text" name="mortalidadPle15" value="{{ old('mortalidadPle15')}}" onkeypress ="return SoloNumerosEnteros(event)"></td>
                  <td><input type="text" name="seleccionPle15" value="{{ old('seleccionPle15')}}" onkeypress ="return SoloNumerosEnteros(event)"></td>
                  <td><input type="text" name="otrosPle15" value="{{ old('otrosPle15')}}" onkeypress ="return SoloNumerosEnteros(event)"></td>
                  <td><input type="text" name="alimentoPle15" value="{{ old('alimentoPle15')}}"></td>
                  <td><input type="text" name="consumoPle15" value="{{ old('consumoPle15')}}" onkeypress="return undecimal(event,this);"></td>
                  <td><input type="text" name="pesoPle15" value="{{ old('pesoPle15')}}" onkeypress ="return SoloNumerosEnteros(event)"></td>
                  <td><input type="text" name="uniformidadPle15" value="{{ old('uniformidadPle15')}}" onkeypress="return undecimal(event,this);"></td>
                  <td><input type="text" name="coeficientePle15" value="{{ old('coeficientePle15')}}" onkeypress ="return SoloNumerosEnteros(event)"></td>
                  <td><input type="text" name="observacionesPle15" value="{{ old('observacionesPle15')}}"></td>
                  <!--<td class="espacio2" width="10px"><a href="#" class="btn"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a></td>-->
                </tr>
                <tr>
                  <td>17</td>
                  <td><input type="text" name="fdsPle16" value="{{$fecha17}}" readonly></td>
                  <td><input type="number" name="avesmuertasPle16" value="{{ old('avesmuertasPle16')}}"></td>
                  <td><input type="text" name="mortalidadPle16" value="{{ old('mortalidadPle16')}}" onkeypress ="return SoloNumerosEnteros(event)"></td>
                  <td><input type="text" name="seleccionPle16" value="{{ old('seleccionPle16')}}" onkeypress ="return SoloNumerosEnteros(event)"></td>
                  <td><input type="text" name="otrosPle16" value="{{ old('otrosPle16')}}" onkeypress ="return SoloNumerosEnteros(event)"></td>
                  <td><input type="text" name="alimentoPle16" value="{{ old('alimentoPle16')}}"></td>
                  <td><input type="text" name="consumoPle16" value="{{ old('consumoPle16')}}" onkeypress="return undecimal(event,this);"></td>
                  <td><input type="text" name="pesoPle16" value="{{ old('pesoPle16')}}" onkeypress ="return SoloNumerosEnteros(event)"></td>
                  <td><input type="text" name="uniformidadPle16" value="{{ old('uniformidadPle16')}}" onkeypress="return undecimal(event,this);"></td>
                  <td><input type="text" name="coeficientePle16" value="{{ old('coeficientePle16')}}" onkeypress ="return SoloNumerosEnteros(event)"></td>
                  <td><input type="text" name="observacionesPle16" value="{{ old('observacionesPle16')}}"></td>
                  <!--<td class="espacio2" width="10px"><a href="#" class="btn"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a></td>-->
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
