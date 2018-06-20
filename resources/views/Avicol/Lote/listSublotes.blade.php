@extends('layouts.app')
  @section('content')
    @foreach($nomlot as $Nomlot)
      <h4 class="with-border">Lotes: {{$Nomlot->nombreLot}}</h4>
    @endforeach
    <div class="col-sm-12" id="formulario">
      <div class="row">
        <div class="col-md-4">
        </div>
        <div class="col-md-4 col-md-offset-4 separacion">
            <a href="javascript:history.back()" class="btn btn-success pull-right"><i class="fa fa-undo" aria-hidden="true"></i> Volver</a>
        </div>
      </div>
      <table>
        <thead>
          <tr id="tabla">
            <th>Sublote</th>
            <th>Pollitas Sublote</th>
            <th>Sistema de Explotacion</th>
            <th>Estado</th>
            <th>Eliminar</th>
          </tr>
        </thead>
        <tbody>
          @foreach($sublotes as $Sublote)
            <tr>
              <td>{{$Sublote->nombreSub}}</td>
              <td>{{$Sublote->pollitasSub}}</td>
              <td>{{$Sublote->nombreSis}}</td>
              <td>{{$Sublote->nombreEst}}</td>
              <td>
                {!! Form::open(['route' => ['lotes.destroy', $Sublote->id], 'method' => 'DELETE']) !!}
                  <button class="btn btn-danger" data-toggle="tooltip" data-placement="right" data-original-title="Eliminar"><i class="fa fa-trash" aria-hidden="true"></i></button>
                {!! Form::close() !!}
              </td>
            </tr>
          @endforeach
        </tbody>
      </table>
      {{ $sublotes->render() }}
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
      td:nth-of-type(1):before { content: "Nombre Lote"; }
      td:nth-of-type(2):before { content: "Nombre Sublote"; }
      td:nth-of-type(3):before { content: "Pollitas Sublote"; }
      td:nth-of-type(4):before { content: "Sistema de Explotacion"; }
      td:nth-of-type(5):before { content: "Eliminar"; }

      .espacio2{
      padding-left: 50%;
      width: 10%;
      display: inline-block;
      }

    }
</style>
  @endsection
