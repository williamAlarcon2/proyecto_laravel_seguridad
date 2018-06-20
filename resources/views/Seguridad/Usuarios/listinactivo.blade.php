@extends('layouts.app')
  @section('content')
    <h4 class="with-border">Usuarios Inactivos</h4>
    <div class="col-sm-12" id="formulario">
      @can('permisos.create')
        <a href="{{ route('usuarios.index') }}" class="btn btn-sm btn-success pull-right"> <i class="fa fa-user-plus" aria-hidden="true"></i> Usuarios Activos</a>
      @endcan
    </div>
    <div class="col-sm-12" id="formulario">
      <table>
        <thead>
          <tr id="tabla">
            <th>Nombre</th>
            <th>Correo</th>
            <th>Rol</th>
          </tr>
        </thead>
        <tbody>
          @foreach($users as $user)
            <tr>
              <td>{{$user->nomUsuario}}</td>
              <td>{{$user->corUsuario}}</td>
              <td>{{$user->nomRol}}</td>
            </tr>
          @endforeach
        </tbody>
      </table>
      {{ $users->render() }}
    </div>
  @endsection
