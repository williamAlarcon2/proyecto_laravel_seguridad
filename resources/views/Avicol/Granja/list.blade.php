@extends('layouts.app')
  @section('content')
    <h4 class="with-border">Granjas</h4>
    <div class="col-sm-12" id="formulario">
      <div class="row">
        <div class="col-md-4">
          {!! Form::open(['route' => 'granjas/search', 'method' => 'post', 'novalidate']) !!}
            <div class="form-group has-feedback search">
              <input type="text" class="form-control" name="buscar" placeholder="Buscar por nombre">
              <span class="form-control-feedback"><i class="fa fa-search fa-lg" aria-hidden="true"></i></span>
            </div>
          {!!Form::close() !!}
        </div>
        <div class="col-md-4 col-md-offset-4">
          @can('granjas.create')
            <a href="{{ route('granjas.create') }}" class="btn btn-success pull-right"><i class="fa fa-plus" aria-hidden="true"></i> Agregar</a>
          @endcan
        </div>
      </div>
      <table>
        <thead>
          <tr id="tabla">
            <th>Nombre</th>
            <th>Altura/Nivel del mar</th>
            <th>Ponedoras</th>
            <th>Reproductoras</th>
            <th>Pollo Engorde</th>
            <th>Laboratorio Huevo</th>
            <th>Zona</th>
            <th>Empresa</th>
            <th>Municipio</th>
            <th>Clima</th>
            <th>Estado</th>
            @can('granjas.edit')
              <th>Accion</th>
            @endcan
          </tr>
        </thead>
        <tbody>
          @foreach($granjas as $Granja)
            <tr>
              <td>{{$Granja->nombreGra}}</td>
              <td>{{$Granja->alturaGra}}</td>
              <td>@if($Granja->modulopGra != null) <i class="fa fa-check" aria-hidden="true"></i> @endif</td>
              <td>@if($Granja->modulorGra != null) <i class="fa fa-check" aria-hidden="true"></i> @endif</td>
              <td>@if($Granja->modulopeGra != null) <i class="fa fa-check" aria-hidden="true"></i> @endif</td>
              <td>@if($Granja->modulolGra != null) <i class="fa fa-check" aria-hidden="true"></i> @endif</td>
              <td>{{$Granja->nombreZon}}</td>
              <td>{{$Granja->nombreEmp}}</td>
              <td>{{$Granja->nombreMun}}</td>
              <td>{{$Granja->nombreCli}}</td>
              <td>{{$Granja->nombreEst}}</td>
              @can('granjas.edit')
                <td class="espacio2" width="10px">
                  <a href="{{ route('granjas.edit', $Granja->id) }}" class="btn" data-toggle="tooltip" data-placement="right" data-original-title="Editar"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
                </td>
              @endcan
            </tr>
          @endforeach
        </tbody>
      </table>
      {{ $granjas->render() }}
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
      td:nth-of-type(1):before { content: "Nombre"; }
      td:nth-of-type(2):before { content: "Altura/Nivel del mar"; }
      td:nth-of-type(3):before { content: "Zona"; }
      td:nth-of-type(4):before { content: "Empresa"; }
      td:nth-of-type(5):before { content: "Municipio"; }
      td:nth-of-type(6):before { content: "Clima"; }
      td:nth-of-type(7):before { content: "Estado"; }
      td:nth-of-type(8):before { content: "Modulo"; }
      td:nth-of-type(9):before { content: "Acción"; margin: 0 0px 0 -18px;}

      .espacio2{
      padding-left: 50%;
      width: 10%;
      display: inline-block;
      }

    }
</style>
  @endsection
