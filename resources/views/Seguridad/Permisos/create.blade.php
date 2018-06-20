@extends('layouts.app')
  @section('content')
    <h4 class="with-border">Permisos</h4>
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
      {{ Form::open(['route' => 'permisos.store']) }}
        <div class="input-group separacion">
      		<span class="input-group-addon"><i class="fa fa-address-card-o fa-2x"></i></span>
      		<div class="form-group label-floating">
              <label class="control-label">Nombre</label>
              <input type="text" name="name" class="form-control" id="name" value="{{ old('name')}}">
          </div>
        </div>
        <div class="input-group separacion">
      		<span class="input-group-addon"><i class="fa fa-align-center fa-2x"></i></span>
      		<div class="form-group label-floating">
              <label class="control-label">Slug</label>
              <input type="text" name="slug" class="form-control" id="slug" value="{{ old('slug')}}">
          </div>
        </div>
        <div class="input-group separacion">
      		<span class="input-group-addon"><i class="fa fa-align-left fa-2x"></i></span>
      		<div class="form-group label-floating">
              <label class="control-label">Descripcion</label>
              <input type="text" name="description" class="form-control" id="description" value="{{ old('description')}}">
          </div>
        </div>
        <div class="input-group separacion">
          <button id="boton_formulario">Guardar</button>
    		</div>
      {{ Form::close() }}
    </div>
  @endsection
