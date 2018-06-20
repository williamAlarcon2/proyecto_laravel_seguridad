@extends('layouts.app-registro')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Register</div>

                <div class="panel-body">
                    <form class="form-horizontal" method="POST" action="{{ route('register') }}">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('nomUsuario') ? ' has-error' : '' }}">
                            <label for="nomUsuario" class="col-md-4 control-label">Nombre</label>

                            <div class="col-md-6">
                                <input id="nomUsuario" type="text" class="form-control" name="nomUsuario" value="{{ old('nomUsuario') }}" required autofocus>

                                @if ($errors->has('nomUsuario'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('nomUsuario') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('corUsuario') ? ' has-error' : '' }}">
                            <label for="corUsuario" class="col-md-4 control-label">Correo</label>

                            <div class="col-md-6">
                                <input id="corUsuario" type="email" class="form-control" name="corUsuario" value="{{ old('email') }}" required>

                                @if ($errors->has('corUsuario'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('corUsuario') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label for="password" class="col-md-4 control-label">Password</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="password-confirm" class="col-md-4 control-label">Confirm Password</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn">
                                    Register
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
