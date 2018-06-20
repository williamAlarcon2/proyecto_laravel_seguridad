@extends('layouts.app')
  @section('content')
    <h4 class="with-border">Levante Ponedora</h4>
    <div class="col-sm-12" id="formulario">
      {!! Form::open(['class' => 'col s12', 'route' => 'levanteExport', 'method' => 'post'])!!}
      <div class="row">
        <div class="input-group separacion col-md-6">
          <span class="input-group-addon"><i class="fa fa-calendar fa-2x"></i></span>
          <div class="form-group label-floating">
              <label class="control-label">Desde</label>
              <input id="datepicker" type="text" name="fechainicio" class="form-control datepicker-input" autocomplete="off" readonly>
          </div>
        </div>
        <div class="input-group separacion col-md-6">
          <span class="input-group-addon"><i class="fa fa-calendar fa-2x"></i></span>
          <div class="form-group label-floating">
              <label class="control-label">Hasta</label>
              <input id="datepicker1" type="text" name="fechafin" class="form-control datepicker-input" autocomplete="off" readonly>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="input-group separacion col-md-4 col-md-offset-1">
          <select id="empresa" name="idLote" class="select2">
            <option value="" disabled selected>Seleccione el Lote</option>
              @foreach($lotes as $Lote)
                <option value="{{$Lote->nombreLot}}">{{$Lote->nombreLot}}</option>
              @endforeach
          </select>
          <br/>
          <br/>
        </div>
        <div class="input-group separacion col-md-4 col-md-offset-2">
          <select id="empresa" name="idEmpresa" class="select2">
            <option value="" disabled selected>Seleccione la Sublote</option>
              @foreach($sublotes as $Sublote)
                <option value="{{$Sublote->id}}">{{$Sublote->nombreSub}}</option>
              @endforeach
          </select>
          <br/>
          <br/>
        </div>
      </div>
      <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
        <div class="panel panel-default">
          <div class="panel-heading" role="tab" id="headingOne">
            <h4 class="panel-title">
              <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                Filtro General
              </a>
            </h4>
          </div>
          <div id="collapseOne" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne">
            <div class="panel-body">
              <div class="row">
                <div class="input-group separacion col-md-3 col-md-offset-1">
                  <select id="empresa" name="idEmpresa" class="select2">
                    <option value="" disabled selected>Seleccione la Empresa</option>
                      @foreach($empresas as $Empresa)
                        <option value="{{$Empresa->nombreEmp}}">{{$Empresa->nombreEmp}}</option>
                      @endforeach
                  </select>
                  <br/>
                  <br/>
                </div>
                <div class="input-group separacion col-md-3 col-md-offset-1">
                  <select id="empresa" name="idZona" class="select2">
                    <option value="" disabled selected>Seleccione la Zona</option>
                      @foreach($zonas as $Zona)
                        <option value="{{$Zona->id}}">{{$Zona->nombreZon}}</option>
                      @endforeach
                  </select>
                  <br/>
                  <br/>
                </div>
                <div class="input-group separacion col-md-3 col-md-offset-1">
                  <select id="empresa" name="idVariedad" class="select2">
                    <option value="" disabled selected>Seleccione la Variedad</option>
                      @foreach($variedads as $Variedad)
                        <option value="{{$Variedad->id}}">{{$Variedad->nombreVar}}</option>
                      @endforeach
                  </select>
                  <br/>
                  <br/>
                </div>
              </div>
              <div class="row">
                <div class="input-group separacion col-md-3 col-md-offset-1">
                  <select id="empresa" name="idGranja" class="select2">
                    <option value="" disabled selected>Seleccione la Granja</option>
                      @foreach($granjas as $Granja)
                        <option value="{{$Granja->id}}">{{$Granja->nombreGra}}</option>
                      @endforeach
                  </select>
                  <br/>
                  <br/>
                </div>
                <div class="input-group separacion col-md-3 col-md-offset-1">
                  <select id="empresa" name="idPais" class="select2">
                    <option value="" disabled selected>Seleccione el Pais</option>
                      @foreach($pais as $Pais)
                        <option value="{{$Pais->id}}">{{$Pais->nombrePai}}</option>
                      @endforeach
                  </select>
                  <br/>
                  <br/>
                </div>
                <div class="input-group separacion col-md-3 col-md-offset-1">
                  <select id="empresa" name="idDepartamento" class="select2">
                    <option value="" disabled selected>Seleccione el Departamento</option>
                      @foreach($departamentos as $Departamento)
                        <option value="{{$Departamento->id}}">{{$Departamento->nombreDep}}</option>
                      @endforeach
                  </select>
                  <br/>
                  <br/>
                </div>
              </div>
              <div class="row">
                <div class="input-group separacion col-md-3 col-md-offset-1">
                  <select id="empresa" name="idMunicipio" class="select2">
                    <option value="" disabled selected>Seleccione el Municipio</option>
                      @foreach($municipios as $Municipio)
                        <option value="{{$Municipio->id}}">{{$Municipio->nombreMun}}</option>
                      @endforeach
                  </select>
                  <br/>
                  <br/>
                </div>
                <div class="input-group separacion col-md-3 col-md-offset-1">
                  <select id="empresa" name="idClima" class="select2">
                    <option value="" disabled selected>Seleccione el Clima</option>
                      @foreach($climas as $Clima)
                        <option value="{{$Clima->id}}">{{$Clima->nombreCli}}</option>
                      @endforeach
                  </select>
                  <br/>
                  <br/>
                </div>
                <div class="input-group separacion col-md-3 col-md-offset-1">
                  <select id="empresa" name="idSistema" class="select2">
                    <option value="" disabled selected>Seleccione el Sistema</option>
                      @foreach($sistemas as $Sistema)
                        <option value="{{$Sistema->id}}">{{$Sistema->nombreSis}}</option>
                      @endforeach
                  </select>
                  <br/>
                  <br/>
                </div>
              </div>
              <div class="row">
                <div class="input-group separacion col-md-3">
                  <span class="input-group-addon"></span>
                  <div class="form-group label-floating">
                      <label class="control-label labelponedoraslevante">Altura/Nivel del mar</label>
                      <input type="text" name="alturaGra" class="form-control" id="alturaGra" value="">
                  </div>
                </div>
                <div class="input-group separacion col-md-3 col-md-offset-1">
                  <span class="input-group-addon"></span>
                  <div class="form-group label-floating">
                      <label class="control-label labelponedoraslevante">Pollitas Recibidas</label>
                      <input type="text" name="pollitasLot" class="form-control" id="pollitasLot" value="">
                  </div>
                </div>
                <div class="input-group separacion col-md-3 col-md-offset-1">
                  <span class="input-group-addon"></span>
                  <div class="form-group label-floating">
                      <label class="control-label labelponedoraslevante">Foto Periodo</label>
                      <input name="fotoPle" class="form-control" value="" onkeypress ="return SoloNumerosEnteros(event)">
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="input-group separacion col-md-3 col-md-offset-2">
                  <span class="input-group-addon"></span>
                  <div class="form-group label-floating">
                      <label class="control-label labelponedoraslevante">Despique</label>
                      <input name="despiquePle" class="form-control" value="" onkeypress ="return SoloNumerosEnteros(event)">
                  </div>
                </div>
                <div class="input-group separacion col-md-3 col-md-offset-1">
                  <span class="input-group-addon"></span>
                  <div class="form-group label-floating">
                      <label class="control-label labelponedoraslevante">Traslado Px</label>
                      <input name="trasladoPle" class="form-control" value="" onkeypress ="return SoloNumerosEnteros(event)">
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="panel panel-default">
          <div class="panel-heading" role="tab" id="headingTwo">
            <h4 class="panel-title">
              <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                Filtro Programa de Oscurecimiento
              </a>
            </h4>
          </div>
          <div id="collapseTwo" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo">
            <div class="panel-body">
              <div class="row">
                <div class="input-group separacion col-md-6">
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
                <div class="input-group separacion col-md-6">
                  <div class="checkbox-detailed checkno">
                    <input type="checkbox" name="programaPle1" value="Si" id="check-det-2"/>
                    <label for="check-det-2">
                    <span class="checkbox-detailed-tbl">
                      <span class="checkbox-detailed-cell">
                        <span class="checkbox-detailed-title">Si</span>
                      </span>
                    </span>
                    </label>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="input-group separacion col-md-6">
                  <span class="input-group-addon"><i class="fa fa-calendar fa-2x"></i></span>
                  <div class="form-group label-floating">
                      <label class="control-label">Desde Inicio de Luz</label>
                      <input id="datepicker2" type="text" name="fechainiciodesdeluz" class="form-control datepicker-input" autocomplete="off" readonly>
                  </div>
                </div>
                <div class="input-group separacion col-md-6">
                  <span class="input-group-addon"><i class="fa fa-calendar fa-2x"></i></span>
                  <div class="form-group label-floating">
                      <label class="control-label">Hasta Inicio de Luz</label>
                      <input id="datepicker3" type="text" name="fechainiciohastaluz" class="form-control datepicker-input" autocomplete="off" readonly>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="input-group separacion col-md-6">
                  <span class="input-group-addon"><i class="fa fa-calendar fa-2x"></i></span>
                  <div class="form-group label-floating">
                      <label class="control-label">Desde Fin de Luz</label>
                      <input id="datepicker4" type="text" name="fechafindesdeluz" class="form-control datepicker-input" autocomplete="off" readonly>
                  </div>
                </div>
                <div class="input-group separacion col-md-6">
                  <span class="input-group-addon"><i class="fa fa-calendar fa-2x"></i></span>
                  <div class="form-group label-floating">
                      <label class="control-label">Hasta Fin de Luz</label>
                      <input id="datepicker5" type="text" name="fechafinhastaluz" class="form-control datepicker-input" autocomplete="off" readonly>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="panel panel-default">
          <div class="panel-heading" role="tab" id="headingThree">
            <h4 class="panel-title">
              <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                Filtro Semanal
              </a>
            </h4>
          </div>
          <div id="collapseThree" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingThree">
            <div class="panel-body">
              <div class="row">
                <div class="input-group separacion col-md-3 col-md-offset-1">
                  <select id="semana" name="idSemana" class="select2">
                    <option value="" disabled selected>Seleccione la Semana</option>
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                    <option value="5">5</option>
                    <option value="6">6</option>
                    <option value="7">7</option>
                    <option value="8">8</option>
                    <option value="9">9</option>
                    <option value="10">10</option>
                    <option value="11">11</option>
                    <option value="12">12</option>
                    <option value="13">13</option>
                    <option value="14">14</option>
                    <option value="15">15</option>
                    <option value="16">16</option>
                    <option value="17">17</option>
                  </select>
                  <br/>
                  <br/>
                </div>
                <div class="input-group separacion col-md-3 col-md-offset-1">
                  <span class="input-group-addon"></span>
                  <div class="form-group label-floating">
                      <label class="control-label labelponedoraslevante">Nº Aves Muertas</label>
                      <input name="trasladoPle" class="form-control" value="" onkeypress ="return SoloNumerosEnteros(event)">
                  </div>
                </div>
                <div class="input-group separacion col-md-3 col-md-offset-1">
                  <span class="input-group-addon"></span>
                  <div class="form-group label-floating">
                      <label class="control-label labelponedoraslevante">Mortalidad</label>
                      <input name="trasladoPle" class="form-control" value="" onkeypress ="return SoloNumerosEnteros(event)">
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="input-group separacion col-md-3 col-md-offset-1">
                  <span class="input-group-addon"></span>
                  <div class="form-group label-floating">
                      <label class="control-label labelponedoraslevante">Seleccion</label>
                      <input name="trasladoPle" class="form-control" value="" onkeypress ="return SoloNumerosEnteros(event)">
                  </div>
                </div>
                <div class="input-group separacion col-md-3 col-md-offset-1">
                  <span class="input-group-addon"></span>
                  <div class="form-group label-floating">
                      <label class="control-label labelponedoraslevante">Otros</label>
                      <input name="trasladoPle" class="form-control" value="" onkeypress ="return SoloNumerosEnteros(event)">
                  </div>
                </div>
                <div class="input-group separacion col-md-3 col-md-offset-1">
                  <span class="input-group-addon"></span>
                  <div class="form-group label-floating">
                      <label class="control-label labelponedoraslevante">Alimento</label>
                      <input name="trasladoPle" class="form-control" value="" onkeypress ="return SoloNumerosEnteros(event)">
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="input-group separacion col-md-3 col-md-offset-1">
                  <span class="input-group-addon"></span>
                  <div class="form-group label-floating">
                      <label class="control-label labelponedoraslevante">Consumo Kg</label>
                      <input name="trasladoPle" class="form-control" value="" onkeypress ="return SoloNumerosEnteros(event)">
                  </div>
                </div>
                <div class="input-group separacion col-md-3 col-md-offset-1">
                  <span class="input-group-addon"></span>
                  <div class="form-group label-floating">
                      <label class="control-label labelponedoraslevante">Peso Ave</label>
                      <input name="trasladoPle" class="form-control" value="" onkeypress ="return SoloNumerosEnteros(event)">
                  </div>
                </div>
                <div class="input-group separacion col-md-3 col-md-offset-1">
                  <span class="input-group-addon"></span>
                  <div class="form-group label-floating">
                      <label class="control-label labelponedoraslevante">% Uniformidad</label>
                      <input name="trasladoPle" class="form-control" value="" onkeypress ="return SoloNumerosEnteros(event)">
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="input-group separacion col-md-3 col-md-offset-5">
                  <span class="input-group-addon"></span>
                  <div class="form-group label-floating">
                      <label class="control-label labelponedoraslevante">Coeficiente Variacion</label>
                      <input name="trasladoPle" class="form-control" value="" onkeypress ="return SoloNumerosEnteros(event)">
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="input-group separacion">
          <button id="boton_formulario">Descargar</button>
        </div>
      </div>
      {!! Form::close() !!}
    </div>
  @endsection
