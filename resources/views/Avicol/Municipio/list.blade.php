@extends('layouts.app')
  @section('content')
    <h4 class="with-border">Municipios</h4>
    <div class="col-sm-12" id="formulario">
      <div class="row">
        <div class="col-md-4">
          {!! Form::open(['route' => 'municipios/search', 'method' => 'post', 'novalidate']) !!}
            <div class="form-group has-feedback search">
              <input type="text" class="form-control" name="buscar" placeholder="Buscar por nombre">
              <span class="form-control-feedback"><i class="fa fa-search fa-lg" aria-hidden="true"></i></span>
            </div>
          {!!Form::close() !!}
        </div>
        <div class="col-md-4 col-md-offset-4">
          @can('municipios.create')
            <a href="{{ route('municipios.create') }}" class="btn btn-success pull-right"><i class="fa fa-plus" aria-hidden="true"></i> Agregar</a>
          @endcan
        </div>
      </div>
      <table>
        <thead>
          <tr id="tabla">
            <th>Nombre</th>
            <th>Departamento</th>
            <th>Pais</th>
            @can('municipios.edit')
              <th colspan="3">Accion</th>
            @endcan
          </tr>
        </thead>
        <tbody>
          @foreach($municipios as $Municipio)
            <tr>
              <td>{{$Municipio->nombreMun}}</td>
              <td>{{$Municipio->nombreDep}}</td>
              <td>{{$Municipio->nombrePai}}</td>
              @can('municipios.edit')
                <td class="espacio2" width="10px">
                  <a href="{{ route('municipios.edit', $Municipio->id) }}" class="btn" data-toggle="tooltip" data-placement="right" data-original-title="Editar"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
                </td>
              @endcan
              @can('municipios.destroy')
                <td class="espacio3" width="10px">
                  {!! Form::open(['route' => ['municipios.destroy', $Municipio->id], 'method' => 'DELETE']) !!}
                    <button class="btn btn-danger" data-toggle="tooltip" data-placement="right" data-original-title="Eliminar"><i class="fa fa-trash" aria-hidden="true"></i></button>
                  {!! Form::close() !!}
                </td>
              @endcan
            </tr>
          @endforeach
        </tbody>
      </table>
      {{ $municipios->render() }}
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
      td:nth-of-type(2):before { content: "Departamento"; }
      td:nth-of-type(3):before { content: "Acción"; margin: 0 0px 0 -18px;}

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
