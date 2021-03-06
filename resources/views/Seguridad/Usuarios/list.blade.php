@extends('layouts.app')
  @section('content')
    <h4 class="with-border">Usuarios</h4>
    <div class="col-sm-12" id="formulario">
      <div class="input-group separacion">
        @can('usuarios.create')
          <a href="{{ route('usuarios.create') }}" style="margin: 0% 0% 0% 1%;" class="btn btn-success pull-right"><i class="fa fa-plus" aria-hidden="true"></i> Agregar</a>
        @endcan
        <a href="{{ route('usuarios.indexInactivo') }}" class="btn btn-warning pull-right"><i class="fa fa-user-times" aria-hidden="true"></i> Usuarios Inactivos</a>
      </div>
    </div>
    <div class="col-sm-12" id="formulario">
      <table>
        <thead id="tabla">
            <tr>
                <th>Nombre</th>
                <th>Correo</th>
                <th>Estado</th>
                <th>Rol</th>
                @can('usuarios.edit')
                  <th colspan="2">Accion</th>
                @endcan
            </tr>
        </thead>
        <tbody>
          @foreach($users as $user)
            <tr>
              <td>{{$user->nomUsuario}}</td>
              <td>{{$user->corUsuario}}</td>
              <td>{{$user->nombreEst}}</td>
              <td>{{$user->nomRol}}</td>
              @can('usuarios.edit')
                <td class="espacio2" width="10px">
                  <a href="{{ route('usuarios.edit', $user->id) }}" class="btn" data-toggle="tooltip" data-placement="right" data-original-title="Editar"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
                </td>
              @endcan
              @can('usuarios.destroy')
                <td class="espacio3" width="10px">
                  {!! Form::open(['route' => ['usuarios.destroy', $user->id], 'method' => 'DELETE']) !!}
                    <button class="btn btn-danger" data-toggle="tooltip" data-placement="right" data-original-title="Inactivar"><i class="fa fa-user-times" aria-hidden="true"></i></button>
                  {!! Form::close() !!}
                </td>
              @endcan
            </tr>
          @endforeach
        </tbody>
      </table>
      {{ $users->render() }}
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
      td:nth-of-type(2):before { content: "Correo"; }
      td:nth-of-type(3):before { content: "Estado"; }
      td:nth-of-type(4):before { content: "Rol"; }
      td:nth-of-type(5):before { content: "Acción"; margin: 0 0px 0 -18px;}

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
