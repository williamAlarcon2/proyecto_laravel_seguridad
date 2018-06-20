@extends('layouts.app')
  @section('content')
    <h4 class="with-border">Lotes</h4>
    <div class="col-sm-12" id="formulario">
      <div class="row">
        <div class="col-md-4">
          {!! Form::open(['route' => 'lotes/search', 'method' => 'post', 'novalidate']) !!}
            <div class="form-group has-feedback search">
              <input type="text" class="form-control" name="buscar" placeholder="Buscar por nombre">
              <span class="form-control-feedback"><i class="fa fa-search fa-lg" aria-hidden="true"></i></span>
            </div>
          {!!Form::close() !!}
        </div>
        <div class="col-md-4 col-md-offset-4 separacion">
          @can('lotes.create')
            <a href="{{ route('lotes.create') }}" style="margin: 0% 0% 0% 1%;" class="btn btn-success pull-right"><i class="fa fa-plus" aria-hidden="true"></i> Agregar</a>
          @endcan
        </div>
      </div>
      <table>
        <thead>
          <tr id="tabla">
            <th>Nombre Lote</th>
            <th>Pollitas Recibidas</th>
            <th>Fecha de Encasetamiento</th>
            <th>Variedad</th>
            <th>Granja</th>
            <th>Sistema</th>
            <th>Estado</th>
            <th>Sublotes</th>
            @can('lotes.edit')
              <th>Accion</th>
            @endcan
          </tr>
        </thead>
        <tbody>
          @foreach($lotes as $Lote)
            <tr>
              <td>{{$Lote->nombreLot}}</td>
              <td>{{$Lote->pollitasLot}}</td>
              <td>{{ Carbon\Carbon::parse($Lote->encasetamientoLot)->format('d-m-Y')}}</td>
              <td>{{$Lote->nombreVar}}</td>
              <td>{{$Lote->nombreGra}}</td>
              <td>{{$Lote->nombreSis}}</td>
              <td>{{$Lote->nombreEst}}</td>
              <td>
                @if($Lote->nombreSub != null)
                    <a href="{{ route('subloteslotes', $Lote->id) }}" class="btn"><i class="fa fa-eye" aria-hidden="true"></i> Ver Sublotes</a>
                @endif
                @if($Lote->nombreSub == null)
                    No tiene Sublotes asociados
                @endif
              </td>
              @can('lotes.edit')
                <td class="espacio2" width="10px">
                  <a href="{{ route('lotes.edit', $Lote->id) }}" class="btn" data-toggle="tooltip" data-placement="right" data-original-title="Editar"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
                </td>
              @endcan
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
      td:nth-of-type(1):before { content: "Nombre Lote"; }
      td:nth-of-type(2):before { content: "Pollitas Recibidas"; }
      td:nth-of-type(3):before { content: "Fecha de Encasetamiento"; }
      td:nth-of-type(4):before { content: "Variedad"; }
      td:nth-of-type(5):before { content: "Granja"; }
      td:nth-of-type(6):before { content: "Sistema"; }
      td:nth-of-type(7):before { content: "Acción"; margin: 0 0px 0 -18px;}

      .espacio2{
      padding-left: 50%;
      width: 10%;
      display: inline-block;
      }

    }
</style>
  @endsection
