@extends('layouts.app')
  @section('content')
    <h4 class="with-border">Lotes</h4>
    @if ($errors->any())
      <div class="col-md-offset-2 separacion alert alert-danger">
        <ul>
          @foreach ($errors->all() as $error)
            <li>{{ $error}}</li>
          @endforeach
        </ul>
      </div>
    @endif
    <div id="formulario">
      {!! Form::model($ponedoraslevantes, ['route' => ['ponedoraslevantes.update', $ponedoraslevantes->id],'method' => 'PUT']) !!}
        @foreach($lotes as $Lote)

        <div class="col-md-12">
          <div class="row">
            <div class="input-group separacion col-md-4 col-md-offset-4">
              <span class="input-group-addon"></span>
              <div class="form-group label-floating">
                  <label class="control-label labelponedoraslevante">Lote</label>
                  <input type="text" name="nombreLot" class="form-control" id="nombreLot" value="{{ $Lote->nombreLot}}" disabled>
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
              <select id="guia" name="idGuia" class="select2">
                @foreach($ponedoraslevantesguia as $ponedoraslevantesguias)
                  <option value="{{$ponedoraslevantesguias->idGuia}}">{{$ponedoraslevantesguias->nombreGui}}</option>
                @endforeach
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
                  <input type="text" name="nombreEmp" class="form-control" id="nombreEmp" value="{{$Lote->nombreEmp}} {{$Lote->nomemp}}" disabled>
              </div>
            </div>
            <div class="input-group separacion col-md-4">
              <span class="input-group-addon"></span>
              <div class="form-group label-floating">
                  <label class="control-label labelponedoraslevante">Altura/Nivel del mar</label>
                  <input type="text" name="alturaGra" class="form-control" id="alturaGra" value="{{$Lote->alturaGra}} {{$Lote->altgra}}" disabled>
              </div>
            </div>
            <div class="input-group separacion col-md-4">
              <span class="input-group-addon"></span>
              <div class="form-group label-floating">
                  <label class="control-label labelponedoraslevante">Zona Avicol</label>
                  <input type="text" name="nombreZon" class="form-control" id="nombreZon" value="{{$Lote->nombreZon}} {{$Lote->nomzon}}" disabled>
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
                  <input type="text" name="nombreVar" class="form-control" id="nombreVar" value="{{$Lote->nombreVar}} {{$Lote->nomvar}}" disabled>
              </div>
            </div>
            <div class="input-group separacion col-md-4">
              <span class="input-group-addon"></span>
              <div class="form-group label-floating">
                  <label class="control-label labelponedoraslevante">Granja</label>
                  <input type="text" name="nombreGra" class="form-control" id="nombreGra" value="{{$Lote->nombreGra}} {{$Lote->nomgra}}" disabled>
              </div>
            </div>
            <div class="input-group separacion col-md-4">
              <span class="input-group-addon"></span>
              <div class="form-group label-floating">
                  <label class="control-label labelponedoraslevante">Fecha Encasetamiento</label>
                  <input type="text" name="encasetamientoLot" class="form-control" id="encasetamientoLot" value="{{ $Lote->encasetamientoLot}}" disabled>
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
                  <input type="text" name="nombrePai" class="form-control" id="nombrePai" value="{{$Lote->nombrePai}} {{$Lote->nompai}}" disabled>
              </div>
            </div>
            <div class="input-group separacion col-md-4">
              <span class="input-group-addon"></span>
              <div class="form-group label-floating">
                  <label class="control-label labelponedoraslevante">Departamento</label>
                  <input type="text" name="nombreDep" class="form-control" id="nombreDep" value="{{$Lote->nombreDep}} {{$Lote->nomdep}}" disabled>
              </div>
            </div>
            <div class="input-group separacion col-md-4">
              <span class="input-group-addon"></span>
              <div class="form-group label-floating">
                  <label class="control-label labelponedoraslevante">Municipio</label>
                  <input type="text" name="nombreMun" class="form-control" id="nombreMun" value="{{$Lote->nombreMun}} {{$Lote->nommun}}" disabled>
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
                  <input type="text" name="pollitasLot" class="form-control" id="pollitasLot" value="{{$Lote->pollitasLot}} {{$Lote->polsub}}" readonly>
              </div>
            </div>
            <div class="input-group separacion col-md-4">
              <span class="input-group-addon"></span>
              <div class="form-group label-floating">
                  <label class="control-label labelponedoraslevante">Clima</label>
                  <input type="text" name="nombreCli" class="form-control" id="nombreCli" value="{{$Lote->nombreCli}} {{$Lote->nomcli}}" disabled>
              </div>
            </div>
            <div class="input-group separacion col-md-4">
              <span class="input-group-addon"></span>
              <div class="form-group label-floating">
                  <label class="control-label labelponedoraslevante">Sistema Explotacion</label>
                  <input type="text" name="nombreSis" class="form-control" id="nombreSis" value="{{$Lote->nombreSis}} {{$Lote->nomsis}}" disabled>
              </div>
            </div>
          </div>
        </div>
          <input type="hidden" name="idLote" value="{{ $Lote->id}}">
            <div class="col-md-12">
              <div class="row">
                <div class="input-group separacion col-md-4">
                  <span class="input-group-addon"></span>
                  <div class="form-group label-floating">
                      <label class="control-label labelponedoraslevante">Foto Periodo</label>
                      <input name="fotoPle" class="form-control" id="fotoPle" value="{{ old('fotoPle' , $Lote->fotoPle)}}" onkeypress ="return SoloNumerosEnteros(event)" data-toggle="tooltip" data-placement="right" data-original-title="Digite un Foto Periodo entre 8 y 12">
                  </div>
                </div>
                <div class="input-group separacion col-md-4">
                  <span class="input-group-addon"></span>
                  <div class="form-group label-floating">
                      <label class="control-label labelponedoraslevante">Despique</label>
                      <input name="despiquePle" class="form-control" id="despiquePle" value="{{ old('despiquePle', $Lote->despiquePle)}}" onkeypress ="return SoloNumerosEnteros(event)" data-toggle="tooltip" data-placement="right" data-original-title="Digite un Despique entre 1 y 5">
                  </div>
                </div>
                <div class="input-group separacion col-md-4">
                  <span class="input-group-addon"></span>
                  <div class="form-group label-floating">
                      <label class="control-label labelponedoraslevante">Traslado Px</label>
                      <input name="trasladoPle" class="form-control" id="trasladoPle" value="{{ old('trasladoPle', $Lote->trasladoPle)}}" onkeypress ="return SoloNumerosEnteros(event)" data-toggle="tooltip" data-placement="right" data-original-title="Digite un Traslado PX entre 10 y 19">
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
                          <input type="text"  id="datepicker" name="inicioluzPle" class="form-control" id="inicioluzPle" value="{{ old('inicioluzPle', $Lote->inicioluzPle)}}" autocomplete="off" readonly>
                      </div>
                    </div>
                    <div class="input-group separacion col-md-4">
                      <span class="input-group-addon"><i class="fa fa-calendar fa-2x"></i></span>
                      <div class="form-group label-floating">
                          <label class="control-label">Fin- Descenso de Luz</label>
                          <input type="text"  id="datepicker1" name="finluzPle" class="form-control" id="finluzPle" value="{{ old('finluzPle', $Lote->finluzPle)}}" autocomplete="off" readonly>
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
                  @foreach($semanallevantes1 as $semanallevante1)
                    <td>1</td>
                    <td><input type="text" name="fdsPle" value="{{ old('fdsPle', $semanallevante1->fdsPle)}}" readonly></td>
                    <td><input type="number" name="avesmuertasPle" value="{{ old('avesmuertasPle', $semanallevante1->avesmuertasPle)}}" required></td>
                    <td><input type="text" name="mortalidadPle" value="{{ old('mortalidadPle', $semanallevante1->mortalidadPle)}}" required onkeypress ="return SoloNumerosEnteros(event)"></td>
                    <td><input type="text" name="seleccionPle" value="{{ old('seleccionPle', $semanallevante1->seleccionPle)}}" required onkeypress ="return SoloNumerosEnteros(event)"></td>
                    <td><input type="text" name="otrosPle" value="{{ old('otrosPle', $semanallevante1->otrosPle)}}" required onkeypress ="return SoloNumerosEnteros(event)"></td>
                    <td><input type="text" name="alimentoPle" value="{{ old('alimentoPle', $semanallevante1->alimentoPle)}}" required></td>
                    <td><input type="text" name="consumoPle" value="{{ old('consumoPle', $semanallevante1->consumoPle)}}" required onkeypress="return undecimal(event,this);"></td>
                    <td><input type="text" name="pesoPle" value="{{ old('pesoPle', $semanallevante1->pesoPle)}}" required onkeypress ="return SoloNumerosEnteros(event)"></td>
                    <td><input type="text" name="uniformidadPle" value="{{ old('uniformidadPle', $semanallevante1->uniformidadPle)}}" required onkeypress="return undecimal(event,this);"></td>
                    <td><input type="text" name="coeficientePle" value="{{ old('coeficientePle', $semanallevante1->coeficientePle)}}" required required onkeypress ="return SoloNumerosEnteros(event)"></td>
                    <td><input type="text" name="observacionesPle" value="{{ old('observacionesPle', $semanallevante1->observacionesPle)}}" required></td>
                    <!--<td class="espacio2" width="10px"><a href="#" class="btn"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a></td>-->
                  @endforeach
                </tr>
                <tr>
                  @foreach($semanallevantes2 as $semanallevante2)
                  <td>2</td>
                  <td><input type="text" name="fdsPle1" value="{{ old('fdsPle1', $semanallevante2->fdsPle)}}" readonly></td>
                  <td><input type="number" name="avesmuertasPle1" value="{{ old('avesmuertasPle1', $semanallevante2->avesmuertasPle)}}"></td>
                  <td><input type="text" name="mortalidadPle1" value="{{ old('mortalidadPle1', $semanallevante2->mortalidadPle)}}" onkeypress ="return SoloNumerosEnteros(event)"></td>
                  <td><input type="text" name="seleccionPle1" value="{{ old('seleccionPle1', $semanallevante2->seleccionPle)}}" onkeypress ="return SoloNumerosEnteros(event)"></td>
                  <td><input type="text" name="otrosPle1" value="{{ old('otrosPle1', $semanallevante2->otrosPle)}}" onkeypress ="return SoloNumerosEnteros(event)"></td>
                  <td><input type="text" name="alimentoPle1" value="{{ old('alimentoPle1', $semanallevante2->alimentoPle)}}"></td>
                  <td><input type="text" name="consumoPle1" value="{{ old('consumoPle1', $semanallevante2->consumoPle)}}" onkeypress="return undecimal(event,this);"></td>
                  <td><input type="text" name="pesoPle1" value="{{ old('pesoPle1', $semanallevante2->pesoPle)}}" onkeypress ="return SoloNumerosEnteros(event)"></td>
                  <td><input type="text" name="uniformidadPle1" value="{{ old('uniformidadPle1', $semanallevante2->uniformidadPle)}}" onkeypress="return undecimal(event,this);"></td>
                  <td><input type="text" name="coeficientePle1" value="{{ old('coeficientePle1', $semanallevante2->coeficientePle)}}" onkeypress ="return SoloNumerosEnteros(event)"></td>
                  <td><input type="text" name="observacionesPle1" value="{{ old('observacionesPle1', $semanallevante2->observacionesPle)}}"></td>
                  <!--<td class="espacio2" width="10px"><a href="#" class="btn"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a></td>-->
                  @endforeach
                </tr>
                <tr>
                  @foreach($semanallevantes3 as $semanallevante3)
                  <td>3</td>
                  <td><input type="text" name="fdsPle2" value="{{ old('fdsPle2', $semanallevante3->fdsPle)}}" readonly></td>
                  <td><input type="number" name="avesmuertasPle2" value="{{ old('avesmuertasPle2', $semanallevante3->avesmuertasPle)}}"></td>
                  <td><input type="text" name="mortalidadPle2" value="{{ old('mortalidadPle2', $semanallevante3->mortalidadPle)}}" onkeypress ="return SoloNumerosEnteros(event)"></td>
                  <td><input type="text" name="seleccionPle2" value="{{ old('seleccionPle2', $semanallevante3->seleccionPle)}}" onkeypress ="return SoloNumerosEnteros(event)"></td>
                  <td><input type="text" name="otrosPle2" value="{{ old('otrosPle2', $semanallevante3->otrosPle)}}" onkeypress ="return SoloNumerosEnteros(event)"></td>
                  <td><input type="text" name="alimentoPle2" value="{{ old('alimentoPle2', $semanallevante3->alimentoPle)}}"></td>
                  <td><input type="text" name="consumoPle2" value="{{ old('consumoPle2', $semanallevante3->consumoPle)}}" onkeypress="return undecimal(event,this);"></td>
                  <td><input type="text" name="pesoPle2" value="{{ old('pesoPle2', $semanallevante3->pesoPle)}}" onkeypress ="return SoloNumerosEnteros(event)"></td>
                  <td><input type="text" name="uniformidadPle2" value="{{ old('uniformidadPle2', $semanallevante3->uniformidadPle)}}" onkeypress="return undecimal(event,this);"></td>
                  <td><input type="text" name="coeficientePle2" value="{{ old('coeficientePle2', $semanallevante3->coeficientePle)}}" onkeypress ="return SoloNumerosEnteros(event)"></td>
                  <td><input type="text" name="observacionesPle2" value="{{ old('observacionesPle2', $semanallevante3->observacionesPle)}}"></td>
                  <!--<td class="espacio2" width="10px"><a href="#" class="btn"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a></td>-->
                  @endforeach
                </tr>
                <tr>
                  @foreach($semanallevantes4 as $semanallevante4)
                  <td>4</td>
                  <td><input type="text" name="fdsPle3" value="{{ old('fdsPle3', $semanallevante4->fdsPle)}}" readonly></td>
                  <td><input type="number" name="avesmuertasPle3" value="{{ old('avesmuertasPle3', $semanallevante4->avesmuertasPle)}}"></td>
                  <td><input type="text" name="mortalidadPle3" value="{{ old('mortalidadPle3', $semanallevante4->mortalidadPle)}}" onkeypress ="return SoloNumerosEnteros(event)"></td>
                  <td><input type="text" name="seleccionPle3" value="{{ old('seleccionPle3', $semanallevante4->seleccionPle)}}" onkeypress ="return SoloNumerosEnteros(event)"></td>
                  <td><input type="text" name="otrosPle3" value="{{ old('otrosPle3', $semanallevante4->otrosPle)}}" onkeypress ="return SoloNumerosEnteros(event)"></td>
                  <td><input type="text" name="alimentoPle3" value="{{ old('alimentoPle3', $semanallevante4->alimentoPle)}}"></td>
                  <td><input type="text" name="consumoPle3" value="{{ old('consumoPle3', $semanallevante4->consumoPle)}}" onkeypress="return undecimal(event,this);"></td>
                  <td><input type="text" name="pesoPle3" value="{{ old('pesoPle3', $semanallevante4->pesoPle)}}" onkeypress ="return SoloNumerosEnteros(event)"></td>
                  <td><input type="text" name="uniformidadPle3" value="{{ old('uniformidadPle3', $semanallevante4->uniformidadPle)}}" onkeypress="return undecimal(event,this);"></td>
                  <td><input type="text" name="coeficientePle3" value="{{ old('coeficientePle3', $semanallevante4->coeficientePle)}}" onkeypress ="return SoloNumerosEnteros(event)"></td>
                  <td><input type="text" name="observacionesPle3" value="{{ old('observacionesPle3', $semanallevante4->observacionesPle)}}"></td>
                  <!--<td class="espacio2" width="10px"><a href="#" class="btn"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a></td>-->
                  @endforeach
                </tr>
                <tr>
                  @foreach($semanallevantes5 as $semanallevante5)
                  <td>5</td>
                  <td><input type="text" name="fdsPle4" value="{{ old('fdsPle4', $semanallevante5->fdsPle)}}" readonly></td>
                  <td><input type="number" name="avesmuertasPle4" value="{{ old('avesmuertasPle4', $semanallevante5->avesmuertasPle)}}"></td>
                  <td><input type="text" name="mortalidadPle4" value="{{ old('mortalidadPle4', $semanallevante5->mortalidadPle)}}" onkeypress ="return SoloNumerosEnteros(event)"></td>
                  <td><input type="text" name="seleccionPle4" value="{{ old('seleccionPle4', $semanallevante5->seleccionPle)}}" onkeypress ="return SoloNumerosEnteros(event)"></td>
                  <td><input type="text" name="otrosPle4" value="{{ old('otrosPle4', $semanallevante5->otrosPle)}}" onkeypress ="return SoloNumerosEnteros(event)"></td>
                  <td><input type="text" name="alimentoPle4" value="{{ old('alimentoPle4', $semanallevante5->alimentoPle)}}"></td>
                  <td><input type="text" name="consumoPle4" value="{{ old('consumoPle4', $semanallevante5->consumoPle)}}" onkeypress="return undecimal(event,this);"></td>
                  <td><input type="text" name="pesoPle4" value="{{ old('pesoPle4', $semanallevante5->pesoPle)}}" onkeypress ="return SoloNumerosEnteros(event)"></td>
                  <td><input type="text" name="uniformidadPle4" value="{{ old('uniformidadPle4', $semanallevante5->uniformidadPle)}}" onkeypress="return undecimal(event,this);"></td>
                  <td><input type="text" name="coeficientePle4" value="{{ old('coeficientePle4', $semanallevante5->coeficientePle)}}" onkeypress ="return SoloNumerosEnteros(event)"></td>
                  <td><input type="text" name="observacionesPle4" value="{{ old('observacionesPle4', $semanallevante5->observacionesPle)}}"></td>
                  <!--<td class="espacio2" width="10px"><a href="#" class="btn"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a></td>-->
                  @endforeach
                </tr>
                <tr>
                  @foreach($semanallevantes6 as $semanallevante6)
                  <td>6</td>
                  <td><input type="text" name="fdsPle5" value="{{ old('fdsPle5', $semanallevante6->fdsPle)}}" readonly></td>
                  <td><input type="number" name="avesmuertasPle5" value="{{ old('avesmuertasPle5', $semanallevante6->avesmuertasPle)}}"></td>
                  <td><input type="text" name="mortalidadPle5" value="{{ old('mortalidadPle5', $semanallevante6->mortalidadPle)}}" onkeypress ="return SoloNumerosEnteros(event)"></td>
                  <td><input type="text" name="seleccionPle5" value="{{ old('seleccionPle5', $semanallevante6->seleccionPle)}}" onkeypress ="return SoloNumerosEnteros(event)"></td>
                  <td><input type="text" name="otrosPle5" value="{{ old('otrosPle5', $semanallevante6->otrosPle)}}" onkeypress ="return SoloNumerosEnteros(event)"></td>
                  <td><input type="text" name="alimentoPle5" value="{{ old('alimentoPle5', $semanallevante6->alimentoPle)}}"></td>
                  <td><input type="text" name="consumoPle5" value="{{ old('consumoPle5', $semanallevante6->consumoPle)}}" onkeypress="return undecimal(event,this);"></td>
                  <td><input type="text" name="pesoPle5" value="{{ old('pesoPle5', $semanallevante6->pesoPle)}}" onkeypress ="return SoloNumerosEnteros(event)"></td>
                  <td><input type="text" name="uniformidadPle5" value="{{ old('uniformidadPle5', $semanallevante6->uniformidadPle)}}" onkeypress="return undecimal(event,this);"></td>
                  <td><input type="text" name="coeficientePle5" value="{{ old('coeficientePle5', $semanallevante6->coeficientePle)}}" onkeypress ="return SoloNumerosEnteros(event)"></td>
                  <td><input type="text" name="observacionesPle5" value="{{ old('observacionesPle5', $semanallevante6->observacionesPle)}}"></td>
                  <!--<td class="espacio2" width="10px"><a href="#" class="btn"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a></td>-->
                  @endforeach
                </tr>
                <tr>
                  @foreach($semanallevantes7 as $semanallevante7)
                  <td>7</td>
                  <td><input type="text" name="fdsPle6" value="{{ old('fdsPle6', $semanallevante7->fdsPle)}}" readonly></td>
                  <td><input type="number" name="avesmuertasPle6" value="{{ old('avesmuertasPle6', $semanallevante7->avesmuertasPle)}}"></td>
                  <td><input type="text" name="mortalidadPle6" value="{{ old('mortalidadPle6', $semanallevante7->mortalidadPle)}}" onkeypress ="return SoloNumerosEnteros(event)"></td>
                  <td><input type="text" name="seleccionPle6" value="{{ old('seleccionPle6', $semanallevante7->seleccionPle)}}" onkeypress ="return SoloNumerosEnteros(event)"></td>
                  <td><input type="text" name="otrosPle6" value="{{ old('otrosPle6', $semanallevante7->otrosPle)}}" onkeypress ="return SoloNumerosEnteros(event)"></td>
                  <td><input type="text" name="alimentoPle6" value="{{ old('alimentoPle6', $semanallevante7->alimentoPle)}}"></td>
                  <td><input type="text" name="consumoPle6" value="{{ old('consumoPle6', $semanallevante7->consumoPle)}}" onkeypress="return undecimal(event,this);"></td>
                  <td><input type="text" name="pesoPle6" value="{{ old('pesoPle6', $semanallevante7->pesoPle)}}" onkeypress ="return SoloNumerosEnteros(event)"></td>
                  <td><input type="text" name="uniformidadPle6" value="{{ old('uniformidadPle6', $semanallevante7->uniformidadPle)}}" onkeypress="return undecimal(event,this);"></td>
                  <td><input type="text" name="coeficientePle6" value="{{ old('coeficientePle6', $semanallevante7->coeficientePle)}}" onkeypress ="return SoloNumerosEnteros(event)"></td>
                  <td><input type="text" name="observacionesPle6" value="{{ old('observacionesPle6', $semanallevante7->observacionesPle)}}"></td>
                  <!--<td class="espacio2" width="10px"><a href="#" class="btn"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a></td>-->
                  @endforeach
                </tr>
                <tr>
                  @foreach($semanallevantes8 as $semanallevante8)
                  <td>8</td>
                  <td><input type="text" name="fdsPle7" value="{{ old('fdsPle7', $semanallevante8->fdsPle)}}" readonly></td>
                  <td><input type="number" name="avesmuertasPle7" value="{{ old('avesmuertasPle7', $semanallevante8->avesmuertasPle)}}"></td>
                  <td><input type="text" name="mortalidadPle7" value="{{ old('mortalidadPle7', $semanallevante8->mortalidadPle)}}" onkeypress ="return SoloNumerosEnteros(event)"></td>
                  <td><input type="text" name="seleccionPle7" value="{{ old('seleccionPle7', $semanallevante8->seleccionPle)}}" onkeypress ="return SoloNumerosEnteros(event)"></td>
                  <td><input type="text" name="otrosPle7" value="{{ old('otrosPle7', $semanallevante8->otrosPle)}}" onkeypress ="return SoloNumerosEnteros(event)"></td>
                  <td><input type="text" name="alimentoPle7" value="{{ old('alimentoPle7', $semanallevante8->alimentoPle)}}"></td>
                  <td><input type="text" name="consumoPle7" value="{{ old('consumoPle7', $semanallevante8->consumoPle)}}" onkeypress="return undecimal(event,this);"></td>
                  <td><input type="text" name="pesoPle7" value="{{ old('pesoPle7', $semanallevante8->pesoPle)}}" onkeypress ="return SoloNumerosEnteros(event)"></td>
                  <td><input type="text" name="uniformidadPle7" value="{{ old('uniformidadPle7', $semanallevante8->uniformidadPle)}}" onkeypress="return undecimal(event,this);"></td>
                  <td><input type="text" name="coeficientePle7" value="{{ old('coeficientePle7', $semanallevante8->coeficientePle)}}" onkeypress ="return SoloNumerosEnteros(event)"></td>
                  <td><input type="text" name="observacionesPle7" value="{{ old('observacionesPle7', $semanallevante8->observacionesPle)}}"></td>
                  <!--<td class="espacio2" width="10px"><a href="#" class="btn"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a></td>-->
                  @endforeach
                </tr>
                <tr>
                  @foreach($semanallevantes9 as $semanallevante9)
                  <td>9</td>
                  <td><input type="text" name="fdsPle8" value="{{ old('fdsPle8', $semanallevante9->fdsPle)}}" readonly></td>
                  <td><input type="number" name="avesmuertasPle8" value="{{ old('avesmuertasPle8', $semanallevante9->avesmuertasPle)}}"></td>
                  <td><input type="text" name="mortalidadPle8" value="{{ old('mortalidadPle8', $semanallevante9->mortalidadPle)}}" onkeypress ="return SoloNumerosEnteros(event)"></td>
                  <td><input type="text" name="seleccionPle8" value="{{ old('seleccionPle8', $semanallevante9->seleccionPle)}}" onkeypress ="return SoloNumerosEnteros(event)"></td>
                  <td><input type="text" name="otrosPle8" value="{{ old('otrosPle8', $semanallevante9->otrosPle)}}" onkeypress ="return SoloNumerosEnteros(event)"></td>
                  <td><input type="text" name="alimentoPle8" value="{{ old('alimentoPle8', $semanallevante9->alimentoPle)}}"></td>
                  <td><input type="text" name="consumoPle8" value="{{ old('consumoPle8', $semanallevante9->consumoPle)}}" onkeypress="return undecimal(event,this);"></td>
                  <td><input type="text" name="pesoPle8" value="{{ old('pesoPle8', $semanallevante9->pesoPle)}}" onkeypress ="return SoloNumerosEnteros(event)"></td>
                  <td><input type="text" name="uniformidadPle8" value="{{ old('uniformidadPle8', $semanallevante9->uniformidadPle)}}" onkeypress="return undecimal(event,this);"></td>
                  <td><input type="text" name="coeficientePle8" value="{{ old('coeficientePle8', $semanallevante9->coeficientePle)}}" onkeypress ="return SoloNumerosEnteros(event)"></td>
                  <td><input type="text" name="observacionesPle8" value="{{ old('observacionesPle8', $semanallevante9->observacionesPle)}}"></td>
                  <!--<td class="espacio2" width="10px"><a href="#" class="btn"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a></td>-->
                  @endforeach
                </tr>
                <tr>
                  @foreach($semanallevantes10 as $semanallevante10)
                  <td>10</td>
                  <td><input type="text" name="fdsPle9" value="{{ old('fdsPle9', $semanallevante10->fdsPle)}}" readonly></td>
                  <td><input type="number" name="avesmuertasPle9" value="{{ old('avesmuertasPle9', $semanallevante10->avesmuertasPle)}}"></td>
                  <td><input type="text" name="mortalidadPle9" value="{{ old('mortalidadPle9', $semanallevante10->mortalidadPle)}}" onkeypress ="return SoloNumerosEnteros(event)"></td>
                  <td><input type="text" name="seleccionPle9" value="{{ old('seleccionPle9', $semanallevante10->seleccionPle)}}" onkeypress ="return SoloNumerosEnteros(event)"></td>
                  <td><input type="text" name="otrosPle9" value="{{ old('otrosPle9', $semanallevante10->otrosPle)}}" onkeypress ="return SoloNumerosEnteros(event)"></td>
                  <td><input type="text" name="alimentoPle9" value="{{ old('alimentoPle9', $semanallevante10->alimentoPle)}}"></td>
                  <td><input type="text" name="consumoPle9" value="{{ old('consumoPle9', $semanallevante10->consumoPle)}}" onkeypress="return undecimal(event,this);"></td>
                  <td><input type="text" name="pesoPle9" value="{{ old('pesoPle9', $semanallevante10->pesoPle)}}" onkeypress ="return SoloNumerosEnteros(event)"></td>
                  <td><input type="text" name="uniformidadPle9" value="{{ old('uniformidadPle9', $semanallevante10->uniformidadPle)}}" onkeypress="return undecimal(event,this);"></td>
                  <td><input type="text" name="coeficientePle9" value="{{ old('coeficientePle9', $semanallevante10->coeficientePle)}}" onkeypress ="return SoloNumerosEnteros(event)"></td>
                  <td><input type="text" name="observacionesPle9" value="{{ old('observacionesPle9', $semanallevante10->observacionesPle)}}"></td>
                  <!--<td class="espacio2" width="10px"><a href="#" class="btn"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a></td>-->
                  @endforeach
                </tr>
                <tr>
                  @foreach($semanallevantes11 as $semanallevante11)
                  <td>11</td>
                  <td><input type="text" name="fdsPle10" value="{{ old('fdsPle10', $semanallevante11->fdsPle)}}" readonly></td>
                  <td><input type="number" name="avesmuertasPle10" value="{{ old('avesmuertasPle10', $semanallevante11->avesmuertasPle)}}"></td>
                  <td><input type="text" name="mortalidadPle10" value="{{ old('mortalidadPle10', $semanallevante11->mortalidadPle)}}" onkeypress ="return SoloNumerosEnteros(event)"></td>
                  <td><input type="text" name="seleccionPle10" value="{{ old('seleccionPle10', $semanallevante11->seleccionPle)}}" onkeypress ="return SoloNumerosEnteros(event)"></td>
                  <td><input type="text" name="otrosPle10" value="{{ old('otrosPle10', $semanallevante11->otrosPle)}}" onkeypress ="return SoloNumerosEnteros(event)"></td>
                  <td><input type="text" name="alimentoPle10" value="{{ old('alimentoPle10', $semanallevante11->alimentoPle)}}"></td>
                  <td><input type="text" name="consumoPle10" value="{{ old('consumoPle10', $semanallevante11->consumoPle)}}" onkeypress="return undecimal(event,this);"></td>
                  <td><input type="text" name="pesoPle10" value="{{ old('pesoPle10', $semanallevante11->pesoPle)}}" onkeypress ="return SoloNumerosEnteros(event)"></td>
                  <td><input type="text" name="uniformidadPle10" value="{{ old('uniformidadPle10', $semanallevante11->uniformidadPle)}}" onkeypress="return undecimal(event,this);"></td>
                  <td><input type="text" name="coeficientePle10" value="{{ old('coeficientePle10', $semanallevante11->coeficientePle)}}" onkeypress ="return SoloNumerosEnteros(event)"></td>
                  <td><input type="text" name="observacionesPle10" value="{{ old('observacionesPle10', $semanallevante11->observacionesPle)}}"></td>
                  <!--<td class="espacio2" width="10px"><a href="#" class="btn"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a></td>-->
                  @endforeach
                </tr>
                <tr>
                  @foreach($semanallevantes12 as $semanallevante12)
                  <td>12</td>
                  <td><input type="text" name="fdsPle11" value="{{ old('fdsPle11', $semanallevante12->fdsPle)}}" readonly></td>
                  <td><input type="number" name="avesmuertasPle11" value="{{ old('avesmuertasPle11', $semanallevante12->avesmuertasPle)}}"></td>
                  <td><input type="text" name="mortalidadPle11" value="{{ old('mortalidadPle11', $semanallevante12->mortalidadPle)}}" onkeypress ="return SoloNumerosEnteros(event)"></td>
                  <td><input type="text" name="seleccionPle11" value="{{ old('seleccionPle11', $semanallevante12->seleccionPle)}}" onkeypress ="return SoloNumerosEnteros(event)"></td>
                  <td><input type="text" name="otrosPle11" value="{{ old('otrosPle11', $semanallevante12->otrosPle)}}" onkeypress ="return SoloNumerosEnteros(event)"></td>
                  <td><input type="text" name="alimentoPle11" value="{{ old('alimentoPle11', $semanallevante12->alimentoPle)}}"></td>
                  <td><input type="text" name="consumoPle11" value="{{ old('consumoPle11', $semanallevante12->consumoPle)}}" onkeypress="return undecimal(event,this);"></td>
                  <td><input type="text" name="pesoPle11" value="{{ old('pesoPle11', $semanallevante12->pesoPle)}}" onkeypress ="return SoloNumerosEnteros(event)"></td>
                  <td><input type="text" name="uniformidadPle11" value="{{ old('uniformidadPle11', $semanallevante12->uniformidadPle)}}" onkeypress="return undecimal(event,this);"></td>
                  <td><input type="text" name="coeficientePle11" value="{{ old('coeficientePle11', $semanallevante12->coeficientePle)}}" onkeypress ="return SoloNumerosEnteros(event)"></td>
                  <td><input type="text" name="observacionesPle11" value="{{ old('observacionesPle11', $semanallevante12->observacionesPle)}}"></td>
                  <!--<td class="espacio2" width="10px"><a href="#" class="btn"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a></td>-->
                  @endforeach
                </tr>
                <tr>
                  @foreach($semanallevantes13 as $semanallevante13)
                  <td>13</td>
                  <td><input type="text" name="fdsPle12" value="{{ old('fdsPle12', $semanallevante13->fdsPle)}}" readonly></td>
                  <td><input type="number" name="avesmuertasPle12" value="{{ old('avesmuertasPle12', $semanallevante13->avesmuertasPle)}}"></td>
                  <td><input type="text" name="mortalidadPle12" value="{{ old('mortalidadPle12', $semanallevante13->mortalidadPle)}}" onkeypress ="return SoloNumerosEnteros(event)"></td>
                  <td><input type="text" name="seleccionPle12" value="{{ old('seleccionPle12', $semanallevante13->seleccionPle)}}" onkeypress ="return SoloNumerosEnteros(event)"></td>
                  <td><input type="text" name="otrosPle12" value="{{ old('otrosPle12', $semanallevante13->otrosPle)}}" onkeypress ="return SoloNumerosEnteros(event)"></td>
                  <td><input type="text" name="alimentoPle12" value="{{ old('alimentoPle12', $semanallevante13->alimentoPle)}}"></td>
                  <td><input type="text" name="consumoPle12" value="{{ old('consumoPle12', $semanallevante13->consumoPle)}}" onkeypress="return undecimal(event,this);"></td>
                  <td><input type="text" name="pesoPle12" value="{{ old('pesoPle12', $semanallevante13->pesoPle)}}" onkeypress ="return SoloNumerosEnteros(event)"></td>
                  <td><input type="text" name="uniformidadPle12" value="{{ old('uniformidadPle12', $semanallevante13->uniformidadPle)}}" onkeypress="return undecimal(event,this);"></td>
                  <td><input type="text" name="coeficientePle12" value="{{ old('coeficientePle12', $semanallevante13->coeficientePle)}}" onkeypress ="return SoloNumerosEnteros(event)"></td>
                  <td><input type="text" name="observacionesPle12" value="{{ old('observacionesPle12', $semanallevante13->observacionesPle)}}"></td>
                  <!--<td class="espacio2" width="10px"><a href="#" class="btn"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a></td>-->
                  @endforeach
                </tr>
                <tr>
                  @foreach($semanallevantes14 as $semanallevante14)
                  <td>14</td>
                  <td><input type="text" name="fdsPle13" value="{{ old('fdsPle13', $semanallevante14->fdsPle)}}" readonly></td>
                  <td><input type="number" name="avesmuertasPle13" value="{{ old('avesmuertasPle13', $semanallevante14->avesmuertasPle)}}"></td>
                  <td><input type="text" name="mortalidadPle13" value="{{ old('mortalidadPle13', $semanallevante14->mortalidadPle)}}" onkeypress ="return SoloNumerosEnteros(event)"></td>
                  <td><input type="text" name="seleccionPle13" value="{{ old('seleccionPle13', $semanallevante14->seleccionPle)}}" onkeypress ="return SoloNumerosEnteros(event)"></td>
                  <td><input type="text" name="otrosPle13" value="{{ old('otrosPle13', $semanallevante14->otrosPle)}}" onkeypress ="return SoloNumerosEnteros(event)"></td>
                  <td><input type="text" name="alimentoPle13" value="{{ old('alimentoPle13', $semanallevante14->alimentoPle)}}"></td>
                  <td><input type="text" name="consumoPle13" value="{{ old('consumoPle13', $semanallevante14->consumoPle)}}" onkeypress="return undecimal(event,this);"></td>
                  <td><input type="text" name="pesoPle13" value="{{ old('pesoPle13', $semanallevante14->pesoPle)}}" onkeypress ="return SoloNumerosEnteros(event)"></td>
                  <td><input type="text" name="uniformidadPle13" value="{{ old('uniformidadPle13', $semanallevante14->uniformidadPle)}}" onkeypress="return undecimal(event,this);"></td>
                  <td><input type="text" name="coeficientePle13" value="{{ old('coeficientePle13', $semanallevante14->coeficientePle)}}" onkeypress ="return SoloNumerosEnteros(event)"></td>
                  <td><input type="text" name="observacionesPle13" value="{{ old('observacionesPle13', $semanallevante14->observacionesPle)}}"></td>
                  <!--<td class="espacio2" width="10px"><a href="#" class="btn"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a></td>-->
                  @endforeach
                </tr>
                <tr>
                  @foreach($semanallevantes15 as $semanallevante15)
                  <td>15</td>
                  <td><input type="text" name="fdsPle14" value="{{ old('fdsPle14', $semanallevante15->fdsPle)}}" readonly></td>
                  <td><input type="number" name="avesmuertasPle14" value="{{ old('avesmuertasPle14', $semanallevante15->avesmuertasPle)}}"></td>
                  <td><input type="text" name="mortalidadPle14" value="{{ old('mortalidadPle14', $semanallevante15->mortalidadPle)}}" onkeypress ="return SoloNumerosEnteros(event)"></td>
                  <td><input type="text" name="seleccionPle14" value="{{ old('seleccionPle14', $semanallevante15->seleccionPle)}}" onkeypress ="return SoloNumerosEnteros(event)"></td>
                  <td><input type="text" name="otrosPle14" value="{{ old('otrosPle14', $semanallevante15->otrosPle)}}" onkeypress ="return SoloNumerosEnteros(event)"></td>
                  <td><input type="text" name="alimentoPle14" value="{{ old('alimentoPle14', $semanallevante15->alimentoPle)}}"></td>
                  <td><input type="text" name="consumoPle14" value="{{ old('consumoPle14', $semanallevante15->consumoPle)}}" onkeypress="return undecimal(event,this);"></td>
                  <td><input type="text" name="pesoPle14" value="{{ old('pesoPle14', $semanallevante15->pesoPle)}}" onkeypress ="return SoloNumerosEnteros(event)"></td>
                  <td><input type="text" name="uniformidadPle14" value="{{ old('uniformidadPle14', $semanallevante15->uniformidadPle)}}" onkeypress="return undecimal(event,this);"></td>
                  <td><input type="text" name="coeficientePle14" value="{{ old('coeficientePle14', $semanallevante15->coeficientePle)}}" onkeypress ="return SoloNumerosEnteros(event)"></td>
                  <td><input type="text" name="observacionesPle14" value="{{ old('observacionesPle14', $semanallevante15->observacionesPle)}}"></td>
                  <!--<td class="espacio2" width="10px"><a href="#" class="btn"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a></td>-->
                  @endforeach
                </tr>
                <tr>
                  @foreach($semanallevantes16 as $semanallevante16)
                  <td>16</td>
                  <td><input type="text" name="fdsPle15" value="{{ old('fdsPle15', $semanallevante16->fdsPle)}}" readonly></td>
                  <td><input type="number" name="avesmuertasPle15" value="{{ old('avesmuertasPle15', $semanallevante16->avesmuertasPle)}}"></td>
                  <td><input type="text" name="mortalidadPle15" value="{{ old('mortalidadPle15', $semanallevante16->mortalidadPle)}}" onkeypress ="return SoloNumerosEnteros(event)"></td>
                  <td><input type="text" name="seleccionPle15" value="{{ old('seleccionPle15', $semanallevante16->seleccionPle)}}" onkeypress ="return SoloNumerosEnteros(event)"></td>
                  <td><input type="text" name="otrosPle15" value="{{ old('otrosPle15', $semanallevante16->otrosPle)}}" onkeypress ="return SoloNumerosEnteros(event)"></td>
                  <td><input type="text" name="alimentoPle15" value="{{ old('alimentoPle15', $semanallevante16->alimentoPle)}}"></td>
                  <td><input type="text" name="consumoPle15" value="{{ old('consumoPle15', $semanallevante16->consumoPle)}}" onkeypress="return undecimal(event,this);"></td>
                  <td><input type="text" name="pesoPle15" value="{{ old('pesoPle15', $semanallevante16->pesoPle)}}" onkeypress ="return SoloNumerosEnteros(event)"></td>
                  <td><input type="text" name="uniformidadPle15" value="{{ old('uniformidadPle15', $semanallevante16->uniformidadPle)}}" onkeypress="return undecimal(event,this);"></td>
                  <td><input type="text" name="coeficientePle15" value="{{ old('coeficientePle15', $semanallevante16->coeficientePle)}}" onkeypress ="return SoloNumerosEnteros(event)"></td>
                  <td><input type="text" name="observacionesPle15" value="{{ old('observacionesPle15', $semanallevante16->observacionesPle)}}"></td>
                  <!--<td class="espacio2" width="10px"><a href="#" class="btn"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a></td>-->
                  @endforeach
                </tr>
                <tr>
                  @foreach($semanallevantes17 as $semanallevante17)
                  <td>17</td>
                  <td><input type="text" name="fdsPle16" value="{{ old('fdsPle16', $semanallevante17->fdsPle)}}" readonly></td>
                  <td><input type="number" name="avesmuertasPle16" value="{{ old('avesmuertasPle16', $semanallevante17->avesmuertasPle)}}"></td>
                  <td><input type="text" name="mortalidadPle16" value="{{ old('mortalidadPle16', $semanallevante17->mortalidadPle)}}" onkeypress ="return SoloNumerosEnteros(event)"></td>
                  <td><input type="text" name="seleccionPle16" value="{{ old('seleccionPle16', $semanallevante17->seleccionPle)}}" onkeypress ="return SoloNumerosEnteros(event)"></td>
                  <td><input type="text" name="otrosPle16" value="{{ old('otrosPle16', $semanallevante17->otrosPle)}}" onkeypress ="return SoloNumerosEnteros(event)"></td>
                  <td><input type="text" name="alimentoPle16" value="{{ old('alimentoPle16', $semanallevante17->alimentoPle)}}"></td>
                  <td><input type="text" name="consumoPle16" value="{{ old('consumoPle16', $semanallevante17->consumoPle)}}" onkeypress="return undecimal(event,this);"></td>
                  <td><input type="text" name="pesoPle16" value="{{ old('pesoPle16', $semanallevante17->pesoPle)}}"  onkeypress ="return SoloNumerosEnteros(event)"></td>
                  <td><input type="text" name="uniformidadPle16" value="{{ old('uniformidadPle16', $semanallevante17->uniformidadPle)}}" onkeypress="return undecimal(event,this);"></td>
                  <td><input type="text" name="coeficientePle16" value="{{ old('coeficientePle16', $semanallevante17->coeficientePle)}}" onkeypress ="return SoloNumerosEnteros(event)"></td>
                  <td><input type="text" name="observacionesPle16" value="{{ old('observacionesPle16', $semanallevante17->observacionesPle)}}"></td>
                  <!--<td class="espacio2" width="10px"><a href="#" class="btn"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a></td>-->
                  @endforeach
                </tr>
              </tbody>
            </table>
          </div>
        <div class="input-group separacion">
          <button id="boton_formulario">Actualizar</button>
        </div>
      {{ Form::close() }}
      @endforeach
    </div>
  @endsection
