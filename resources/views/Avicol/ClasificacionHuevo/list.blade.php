@extends('layouts.app')
  @section('content')
    <h4 class="with-border">Clasificacion de Huevos</h4>
    <div class="col-sm-12" id="formulario">
      <div class="row">
        <div class="col-md-4">
          {!! Form::open(['route' => 'clasificacionhuevos/search', 'method' => 'post', 'novalidate']) !!}
            <div class="form-group has-feedback search">
              <input type="text" class="form-control" name="buscar" placeholder="Buscar por nombre">
              <span class="form-control-feedback"><i class="fa fa-search fa-lg" aria-hidden="true"></i></span>
            </div>
          {!!Form::close() !!}
        </div>
      </div>
      <table>
        <thead>
          <tr id="tabla">
            <th>Nombre</th>
            <th>Desde</th>
            <th>Hasta</th>
            @can('clasificacionhuevos.edit')
              <th>Acción</th>
            @endcan
          </tr>
        </thead>
        <tbody>
          @foreach($clasificacionhuevos as $Clasificacionhuevo)
            <tr>
              <td>{{$Clasificacionhuevo->nombreCla}}</td>
              <td>{{$Clasificacionhuevo->desdeCla}}</td>
              <td>{{$Clasificacionhuevo->hastaCla}}</td>
              @can('clasificacionhuevos.edit')
                <td class="botonsolo" width="10px">
                  <a href="{{ route('clasificacionhuevos.edit', $Clasificacionhuevo->id) }}" class="btn" data-toggle="tooltip" data-placement="right" data-original-title="Editar"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
                </td>
              @endcan
            </tr>
          @endforeach
        </tbody>
      </table>
      {{ $clasificacionhuevos->render() }}
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
      td:nth-of-type(2):before { content: "Desde"; }
      td:nth-of-type(3):before { content: "Hasta"; }
      td:nth-of-type(4):before { content: "Acción";  margin: 0 0px 0 -18px;}

      .botonsolo{
          margin-left: -15%;
          width: 27%;
          display: inline-block;
      }
    }
</style>
  @endsection
