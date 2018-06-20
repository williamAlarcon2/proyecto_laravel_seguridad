@extends('layouts.app')
  @section('content')
    <h4 class="with-border">Perfil</h4>
    @if ($errors->any())
      <div class="col-md-offset-2 separacion alert alert-danger">
        <ul>
          @foreach ($errors->all() as $error)
            <li>{{ $error}}</li>
          @endforeach
        </ul>
      </div>
    @endif   
    @foreach($perfils as $perfil)
      {!!Form::model($perfil, ['route' => ['updatePerfil', $perfil->id], 'method' => 'post'])!!}
      {{ csrf_field() }}
        <div class="col-md-12" id="formulario">         
          <div class="row">
            <div class="col-md-2">
              <img src="{{asset('Avicol.ico')}}" alt="..." class="img-rounded">
            </div>
            <div class="col-sm-4 col-md-offset-1 input-group separacion camposperfil">
              <span class="input-group-addon"><i class="fa fa-user-o fa-2x"></i></span>
              <div class="form-group label-floating">
                  <label class="control-label">Nombre Usuario</label>
                  <input type="text" name="nomUsuario" class="form-control" id="nomUsuario" value="{{ old('nomUsuario', $perfil->nomUsuario)}}" disabled>
              </div>          
            </div> 
            <div class="col-sm-4 input-group separacion camposperfil">
              <span class="input-group-addon"><i class="fa fa-users fa-2x"></i></span>
              <div class="form-group label-floating">
                  <label class="control-label">Nombre Rol</label>
                  <input type="text" name="nomRol" class="form-control" id="nomRol" value="{{$perfil->nomRol}}" disabled>
              </div>
            </div>            
          </div>
          <div class="row">
            <div class="col-sm-2 input-group separacion cambiarcontrasena">
              <a href="{{ route('cambiocontrasena') }}">Cambiar Contraseña <i class="fa fa-key"></i></a>
            </div>
            <div class="col-sm-4 col-md-offset-3 input-group separacion">
              <span class="input-group-addon"><i class="fa fa-envelope-o fa-2x"></i></span>
              <div class="form-group label-floating">
                  <label class="control-label">Correo Usuario</label>
                  <input type="text" name="corUsuario" class="form-control" id="corUsuario" value="{{ old('corUsuario', $perfil->corUsuario)}}">
              </div>
            </div>
          </div>
          <div class="input-group separacion">
            <button id="boton_formulario">Guardar</button>
          </div>
        </div>
      {!!Form::close()!!}  
    @endforeach  
  @endsection
