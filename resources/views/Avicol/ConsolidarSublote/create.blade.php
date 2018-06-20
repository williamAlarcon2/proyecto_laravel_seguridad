@extends('layouts.app')
  @section('content')
    <h4 class="with-border">Consolidar Sublotes Levante</h4>
    @if ($errors->any())
      <div class=" col-md-offset-2 separacion alert alert-danger">
        <ul>
          @foreach ($errors->all() as $error)
            <li>{{ $error}}</li>
          @endforeach
        </ul>
      </div>
    @endif
    {!! Form::open(['route' => 'consolidarsublotes/search', 'method' => 'post', 'novalidate']) !!}
      <div class="row" style="margin-bottom: 2%;">
        <div class="col-md-4 col-md-offset-4">
          <div class="form-group has-feedback search">
            <input type="text" class="form-control" name="buscar" placeholder="Buscar por nombre">
            <span class="form-control-feedback"><i class="fa fa-search fa-lg" aria-hidden="true"></i></span>
          </div>
        </div>
      </div>
    @foreach($lotes as $Lote)
        <div class="col-md-12">
          <h4 class="with-border"><input type="hidden" name="lote" value="{{$Lote->nombreLot}}">Lote{{$Lote->nombreLot}}</h4>
          <table class="table">
            <thead>
              <tr>
                <th>Sublotes</th>
              </tr>
            </thead>
            <tbody>
              @foreach($sublotes as $sublote)
                <tr>
                  <td>{{$sublote->nombreSub}}</td>
                </tr>
              @endforeach
            </tbody>
          </table>
          <div class="row">
            <div class="input-group separacion col-md-4 col-md-offset-4" style="margin-bottom: 2%;">
              <select id="guia" name="idSistema" class="select2">
                <option value="" disabled selected>Seleccione el Sistema Productivo del Lote</option>
                  @foreach($sistema as $Sistema)
                    <option value="{{$Sistema->id}}">{{$Sistema->nombreSis}}<input type="hidden" id="sist" value="{{$Sistema->id}}"></option>
                  @endforeach
              </select>
            </div>
          </div>
          <div class="row">
            <div class="input-group separacion col-md-4">
              <span class="input-group-addon"></span>
              <div class="form-group label-floating">
                <a type="button" class="botoncancelar" id="boton_sublote" href="javascript:history.back()" >Cancelar</a>
              </div>
            </div>

              <div class="input-group separacion col-md-4">
                <span class="input-group-addon"></span>
                <div class="form-group label-floating">
                  <a href="{{ route('consolidarexport.excelconsolidar', $Lote->idlot)}}" type="button" class="botoncancelar" id="boton_sublote">Descargar Consolidado</a>                </div>
              </div>
            <div class="input-group separacion col-md-4">
              <span class="input-group-addon"></span>
              <div class="form-group label-floating">
                <button id="boton_formulario">Consolidar</button>
              </div>
            </div>
          </div>
        </div>
    @endforeach
    {!!Form::close() !!}
  @endsection
