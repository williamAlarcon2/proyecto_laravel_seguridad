<!DOCTYPE html>
<html>
    <head lang="en">
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <title>Recuperar Contraseña</title>
    <link rel="stylesheet" href="{{ asset('css/separate/pages/login.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/lib/bootstrap/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/main.css') }}">
    </head>
    <body onload="nobackbutton();">
    <div class="page-center">
      <div class="page-center-in">
            <div class="container">
            <div class="row card">
                <div class="card-block">
                    <div class="panel panel-default">
                        <h4 class="with-border">Recuperar Contraseña</h4>

                            <div class="panel-body">
                                <form class="form-horizontal" method="POST" action="{{ route('password.request') }}">
                                    {{ csrf_field() }}

                                    <input type="hidden" name="token" value="{{ $token }}">
                                    <div class="form-group">
                                        <div class="row{{ $errors->has('email') ? ' has-error' : '' }}">
                                            <div class="col-md-3">
                                                <label for="email" class="control-label">E-Mail</label>
                                            </div>

                                            <div class="col-md-6">
                                                <input id="email" autocomplete="off" type="email" class="form-control" name="corUsuario" value="{{ $email or old('email') }}" required autofocus>

                                                @if ($errors->has('email'))
                                                    <span class="help-block">
                                                        <strong>{{ $errors->first('email') }}</strong>
                                                    </span>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="row{{ $errors->has('password') ? ' has-error' : '' }}">
                                            <div class="col-md-3">
                                                <label for="password" class="control-label">Contraseña</label>
                                            </div>

                                            <div class="col-md-6">
                                                <input id="password" type="password" class="form-control" name="password" required>

                                                @if ($errors->has('password'))
                                                    <span class="help-block">
                                                        <strong>{{ $errors->first('password') }}</strong>
                                                    </span>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="row{{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
                                            <div class="col-md-3">
                                                <label for="password-confirm" class="control-label">Confirmar Contraseña</label>
                                            </div>
                                            <div class="col-md-6">
                                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>

                                                @if ($errors->has('password_confirmation'))
                                                    <span class="help-block">
                                                        <strong>{{ $errors->first('password_confirmation') }}</strong>
                                                    </span>
                                                @endif
                                            </div>
                                        </div>

                                    </div>

                                    <div class="form-group">
                                        <div class="col-md-12">
                                            <button type="submit" class="btn btn-success ">
                                                Restablecer Contraseña
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
