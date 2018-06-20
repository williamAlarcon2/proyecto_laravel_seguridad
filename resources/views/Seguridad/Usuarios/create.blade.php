@extends('layouts.app')
  @section('content')
    <h4 class="with-border">Usuario </h4>
    @if ($errors->any())
      <div class=" col-md-offset-2 separacion alert alert-danger">
        <ul>
          @foreach ($errors->all() as $error)
            <li>{{ $error}}</li>
          @endforeach
        </ul>
      </div>
    @endif
    <div class="col-sm-8 col-md-offset-2" id="formulario">
      {{ Form::open(['route' => 'usuarios.store']) }}
        {{ csrf_field() }}
        <div class="input-group separacion">
          <span class="input-group-addon"><i class="fa fa-user fa-2x"></i></span>
          <div class="form-group label-floating">
            <label class="control-label">Usuario</label>
            <input type="text" name="nomUsuario" class="form-control" id="nomUsuario"  value="{{ old('nomUsuario')}}">
          </div>
        </div>
        <div class="input-group separacion">
          <span class="input-group-addon"><i class="fa fa-envelope-o fa-2x"></i></span>
          <div class="form-group label-floating">
            <label class="control-label">Correo</label>
            <input type="text" name="corUsuario" class="form-control" id="corUsuario"  value="{{ old('corUsuario')}}">
          </div>
        </div>
        <div class="input-group separacion">
					<span class="input-group-addon">
						<i class="fa fa-key fa-2x" aria-hidden="true"></i>
					</span>
					<div class="form-group label-floating">
            	<label for="password" class="control-label">Password</label>
            	<input id="password" type="password" class="form-control" name="password">
          </div>
				</div>
        <label id="lbl">Rol</label>
        <div class="input-group separacion">
					<select id="rol" name="roles" class="select2">
						<option value="" disabled selected>Seleccione el Rol</option>
              @foreach($roles as $role)
		            <option value="{{$role->id}}">{{$role->name}}</option>
              @endforeach
					</select>
          <br/>
					<br/>
				</div>
        <div class="input-group separacion">
          <button id="boton_formulario">Guardar</button>
    		</div>
      {!! Form::close() !!}
    </div>
  @endsection
