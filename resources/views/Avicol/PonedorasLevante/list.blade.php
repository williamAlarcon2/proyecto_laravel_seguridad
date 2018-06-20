@extends('layouts.app')
  @section('content')
    <h4 class="with-border">Levante Ponedora</h4>
    <div class="col-sm-12" id="formulario">
      <div class="row">
        <div class="col-md-4">
          {!! Form::open(['route' => 'ponedoraslevantesbuscar/search', 'method' => 'post', 'novalidate']) !!}
            <div class="form-group has-feedback search">
              <input type="text" class="form-control" name="buscar" placeholder="Buscar por nombre">
              <span class="form-control-feedback"><i class="fa fa-search fa-lg" aria-hidden="true"></i></span>
            </div>
          {!! Form::close() !!}
        </div>
        <div class="col-md-2 col-md-offset-4">
            <a href="{{ route('ponedoraslevantes/produccion.indexProduccion') }}" class="btn btn-warning pull-right"><i class="fa fa-archive" aria-hidden="true"></i>Lotes Produccion</a>
        </div>
        <div class="col-md-2">
          @can('ponedoraslevantes.create')
            <a href="{{ route('ponedoraslevantes.create') }}" class="btn btn-success pull-right"><i class="fa fa-plus" aria-hidden="true"></i> Agregar</a>
          @endcan
        </div>
      </div>
      <table>
        <thead>
          <tr id="tabla">
          	<th>Lote</th>
            <th>Sublote</th>
            <th>Empresa/Compañia</th>
            <th>Zona Avicol</th>
            <th>Granja</th>
            <th>Municipio</th>
            <th>Departamento</th>
            <th>Clima</th>
            <th>Foto Periodo</th>
            <th>Traslado Px</th>
            <th>Altura/Nivel del mar</th>
            <th>Variedad</th>
            <th>Fecha de encasetamiento</th>
            <th>Pollitas Recibidas</th>
            <th>Sistemas Explotacion</th>
            <th>Programa de Oscurecimiento</th>
            <th>Despique</th>
            <th>Guia</th>
            <th>Ver Campos</th>
            @can('ponedoraslevantes.edit')
              <th>Editar</th>
            @endcan
            <th>Enviar Produccion</th>            
          </tr>
        </thead>
        <tbody>
          @foreach($ponedoraslevantes as $ponedoraslevante)
            <tr>
              <td>{{$ponedoraslevante->nombreLot}} {{$ponedoraslevante->nomlot}}</td>
              <td>{{$ponedoraslevante->nombreSub}}</td>
              <td>{{$ponedoraslevante->nombreEmp}} {{$ponedoraslevante->nomemp}}</td>
              <td>{{$ponedoraslevante->nombreZon}} {{$ponedoraslevante->nomzon}}</td>
              <td>{{$ponedoraslevante->nombreGra}} {{$ponedoraslevante->nomgra}}</td>
              <td>{{$ponedoraslevante->nombreMun}} {{$ponedoraslevante->nommun}}</td>
              <td>{{$ponedoraslevante->nombreDep}} {{$ponedoraslevante->nomdep}}</td>
              <td>{{$ponedoraslevante->nombreCli}} {{$ponedoraslevante->nomcli}}</td>
              <td id="list_foto"><input type="hidden" id="fotoPleL" value="{{$ponedoraslevante->fotoPle}}">{{$ponedoraslevante->fotoPle}}</td>
              <td id="list_tras"><input type="hidden" id="trasladoPleL" value="{{$ponedoraslevante->trasladoPle}}">{{$ponedoraslevante->trasladoPle}}</td>
              <td>{{$ponedoraslevante->alturaGra}} {{$ponedoraslevante->altgra}}</td>
              <td>{{$ponedoraslevante->nombreVar}} {{$ponedoraslevante->nomvar}}</td>
              <td>{{$ponedoraslevante->encasetamientoLot}} {{$ponedoraslevante->encsub}}</td>
              <td>{{$ponedoraslevante->pollitasLot}} {{$ponedoraslevante->polsub}}</td>
              <td>{{$ponedoraslevante->nombreSis}} {{$ponedoraslevante->nomsis}}</td>
              <td>{{$ponedoraslevante->programaPle}}</td>
              <td id="list_despique"><input type="hidden" id="despiquePleL" value="{{$ponedoraslevante->despiquePle}}">{{$ponedoraslevante->despiquePle}}</td>
              <td>{{$ponedoraslevante->nombreGui}}</td>
              <td class="espacio3" width="10px">
                <a href="{{ route('ponedoraslevantes.camposcalculados', $ponedoraslevante->id) }}" class="btn"><i class="fa fa-list-ol" aria-hidden="true"></i></a>
              </td>
              @can('ponedoraslevantes.edit')
                <td class="espacio2" width="10px">
                  <a href="{{ route('ponedoraslevantes.edit', $ponedoraslevante->id) }}" class="btn"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
                </td>
              @endcan
              <td class="espacio3" width="10px">
                  <a href="{{ route('ponedoraslevantes.enviarproduccion', $ponedoraslevante->id) }}" class="btn enviarproduccion"><i class="fa fa-paper-plane" aria-hidden="true"></i></a>
              </td>                
            </tr>
          @endforeach
        </tbody>
      </table>
      {{ $ponedoraslevantes->render() }}
    </div>
    <style>
        @media
        only screen and (max-width: 760px),
        (min-device-width: 768px) and (max-device-width: 1024px)  {

          table, thead, tbody, th, td, tr {
            display: block;
          }

          thead tr {
            position: absolute;
            top: -9999px;
            left: -9999px;
          }

          tr { border: 1px solid #ccc; }

          td {
            border: none;
            border-bottom: 1px solid #eee;
            position: relative;
            padding-left: 50%;
          }

          td:before {
            position: absolute;
            top: 6px;
            left: 6px;
            width: 45%;
            padding-right: 10px;
            white-space: nowrap;
          }

          /*
          Label the data
          */
          td:nth-of-type(1):before { content: "Lote"; }
          td:nth-of-type(2):before { content: "Empresa/Compañia"; }
          td:nth-of-type(3):before { content: "Zona Avicol"; }
          td:nth-of-type(4):before { content: "Granja"; }
          td:nth-of-type(5):before { content: "Municipio"; }
          td:nth-of-type(6):before { content: "Departamento"; }
          td:nth-of-type(7):before { content: "Clima"; }
          td:nth-of-type(8):before { content: "Foto Periodo"; }
          td:nth-of-type(9):before { content: "Traslado Px"; }
          td:nth-of-type(10):before { content: "Altura/Nivel del mar"; }
          td:nth-of-type(11):before { content: "Variedad"; }
          td:nth-of-type(12):before { content: "Fecha de encasetamiento"; }
          td:nth-of-type(13):before { content: "Pollitas Recibidas"; }
          td:nth-of-type(14):before { content: "Sistemas Explotacion"; }
          td:nth-of-type(15):before { content: "Programa de Oscurecimiento"; }
          td:nth-of-type(16):before { content: "Despique"; }
          td:nth-of-type(17):before { content: "Guia"; }
          td:nth-of-type(18):before { content: "Acción"; margin: 0 0px 0 -18px;}

          .espacio2{
          padding-left: 50%;
          width: 10%;
          display: inline-block;
          }

          .espacio3{
            padding-left: 0;
            width: 11%;
            margin-left: 34px;
            display: inline-block;
          }
        }
    </style>
  @endsection
