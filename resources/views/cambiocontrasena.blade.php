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
      {!!Form::model($perfil, ['route' => ['updatecontrasena', $perfil->id], 'method' => 'post'])!!}
      {{ csrf_field() }}
        <div class="col-md-12" id="formulario">         
          <div class="row">  
            <div class=" col-md-offset-1 col-sm-5 input-group separacion">
              <span class="input-group-addon"><i class="fa fa-key fa-2x"></i></span>
              <div class="form-group label-floating">
                <label class="control-label">Contraseña</label>
                <input type="password" name="password" class="form-control" id="password">
              </div>
            </div>
            <div class="col-sm-5 input-group separacion">
              <span class="input-group-addon"><i class="fa fa-unlock-alt fa-2x"></i></span>
              <div class="form-group label-floating">
                  <label class="control-label">Confirmar Contraseña</label>
                  <input id="password-confirm" type="password" class="form-control" name="password_confirmation">
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
