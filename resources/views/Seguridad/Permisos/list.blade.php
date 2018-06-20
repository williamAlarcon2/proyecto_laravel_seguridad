@extends('layouts.app')
  @section('content')
    <h4 class="with-border">Permisos</h4>
    <div class="col-sm-12" id="formulario">
      <div class="input-group separacion">
        @can('permisos.create')
          <a href="{{ route('permisos.create') }}" class="btn btn-success pull-right"><i class="fa fa-plus" aria-hidden="true"></i> Agregar</a>
        @endcan
      </div>
    </div>
    <div class="col-sm-12" id="formulario">
      <table>
        <thead>
          <tr id="tabla">
            <th>Nombre</th>
            <th>Slug</th>
            <th>Descripcion</th>
            @can('permisos.edit')
              <th colspan="3">Acción</th>
            @endcan
          </tr>
        </thead>
        <tbody>
          @foreach($permisos as $Permiso)
            <tr>
              <td>{{$Permiso->name}}</td>
              <td>{{$Permiso->slug}}</td>
              <td>{{$Permiso->description}}</td>
              @can('permisos.edit')
                <td class="espacio2" width="10px">
                  <a href="{{ route('permisos.edit', $Permiso->id) }}" class="btn" data-toggle="tooltip" data-placement="right" data-original-title="Editar"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
                </td>
              @endcan
              @can('permisos.destroy')
                <td class="espacio3" width="10px">
                  {!! Form::open(['route' => ['permisos.destroy', $Permiso->id], 'method' => 'DELETE']) !!}
                    <button class="btn btn-danger" data-toggle="tooltip" data-placement="right" data-original-title="Eliminar"><i class="fa fa-trash" aria-hidden="true"></i></button>
                  {!! Form::close() !!}
                </td>
              @endcan
            </tr>
          @endforeach
        </tbody>
      </table>
      {{ $permisos->render() }}
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
      td:nth-of-type(2):before { content: "Slug"; }
      td:nth-of-type(3):before { content: "Descripcion"; }
      td:nth-of-type(4):before { content: "Acción"; margin: 0 0px 0 -18px;}

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
