@extends('layouts.app')
  @section('content')
    <h4 class="with-border">Consolidar Sublotes</h4>
    @if ($errors->any())
      <div class=" col-md-offset-2 separacion alert alert-danger">
        <ul>
          @foreach ($errors->all() as $error)
            <li>{{ $error}}</li>
          @endforeach
        </ul>
      </div>
    @endif
    {!! Form::open(['route' => 'consolidarsublotes/search', 'method' => 'post', 'novalidate']) !!}
      <div class="row">
        <div class="col-md-4 col-md-offset-4">
          <div class="form-group has-feedback search">
            <input type="text" class="form-control" name="buscar" placeholder="Buscar por nombre">
            <span class="form-control-feedback"><i class="fa fa-search fa-lg" aria-hidden="true"></i></span>
          </div>
        </div>
      </div>
    {!!Form::close() !!}

  @endsection
