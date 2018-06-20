@extends('layouts.app')
  @section('content')
    <h4 class="with-border">Produccion Ponedora</h4>
    <div class="col-sm-12" id="formulario">
      <div class="row">
        <div class="col-md-4">
          {!! Form::open(['route' => 'ponedorasproduccionsbuscar/search', 'method' => 'post', 'novalidate']) !!}
            <div class="form-group has-feedback search">
              <input type="text" class="form-control" name="buscar" placeholder="Buscar por nombre">
              <span class="form-control-feedback"><i class="fa fa-search fa-lg" aria-hidden="true"></i></span>
            </div>
          {!!Form::close() !!}
        </div>
        <div class="col-md-4 col-md-offset-4">
          @can('ponedorasproduccions.create')
            <a href="{{ route('ponedorasproduccions.create') }}" class="btn btn-success pull-right"><i class="fa fa-plus" aria-hidden="true"></i> Agregar</a>
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
            <th>Variedad</th>
            <th>Departamento</th>
            <th>Municipio</th>            
            <th>Clima</th>
            <th>Altura/Nivel del mar</th>  
            <th>Fecha de encasetamiento</th>
            <th>Pollitas Recibidas Produccion</th>
            <th>Sistemas Explotacion</th>
            <th>Foto Estimulo</th>
            <th>Programa Luz</th>
            <th>Fotoperiodo</th> 
          </tr>
        </thead>
        <tbody>
          @foreach($lotes as $ponedorasproduccion)
            <tr>
              <td>{{$ponedorasproduccion->nombreLot}} {{$ponedorasproduccion->nomlot}}</td>
              <td>{{$ponedorasproduccion->nombreSub}}</td>
              <td>{{$ponedorasproduccion->nombreEmp}} {{$ponedorasproduccion->nomemp}}</td>
              <td>{{$ponedorasproduccion->nombreZon}} {{$ponedorasproduccion->nomzon}}</td>
              <td>{{$ponedorasproduccion->nombreGra}} {{$ponedorasproduccion->nomgra}}</td>
              <td>{{$ponedorasproduccion->nombreVar}} {{$ponedorasproduccion->nomvar}}</td>
              <td>{{$ponedorasproduccion->nombreDep}} {{$ponedorasproduccion->nomdep}}</td>              
              <td>{{$ponedorasproduccion->nombreMun}} {{$ponedorasproduccion->nommun}}</td>              
              <td>{{$ponedorasproduccion->nombreCli}} {{$ponedorasproduccion->nomcli}}</td>
              <td>{{$ponedorasproduccion->alturaGra}} {{$ponedorasproduccion->altgra}}</td>
              <td>{{$ponedorasproduccion->encasetamientoLot}} {{$ponedorasproduccion->encsub}}</td>
              <td>{{$ponedorasproduccion->pollitasPpr}}</td>
               <td>{{$ponedorasproduccion->nombreSis}} {{$ponedorasproduccion->nomsis}}</td>
              <td>{{$ponedorasproduccion->fotoestimuloPpr}}</td>
              <td>{{$ponedorasproduccion->programaPpr}}</td>             
              <td>{{$ponedorasproduccion->fotoperiodoPpr}}</td>
            </tr>
          @endforeach
        </tbody>
      </table>
      {{ $lotes->render() }}
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
          td:nth-of-type(5):before { content: "Variedad"; }
          td:nth-of-type(6):before { content: "Departamento"; }
          td:nth-of-type(7):before { content: "Municipio"; }          
          td:nth-of-type(8):before { content: "Clima"; }
          td:nth-of-type(9):before { content: "Altura/Nivel del mar"; }          
          td:nth-of-type(10):before { content: "Fecha de encasetamiento"; }
          td:nth-of-type(11):before { content: "Pollitas Recibidas"; }
          td:nth-of-type(12):before { content: "Sistemas Explotacion"; }
          td:nth-of-type(13):before { content: "Programa de Luz"; }
          td:nth-of-type(14):before { content: "Fotoperiodo"; }
          td:nth-of-type(15):before { content: "FotoEstimulo"; }

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
