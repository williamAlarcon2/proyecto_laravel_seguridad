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
                            @if (session('status'))
                                <div class="alert alert-success">
                                    {{ session('status') }}
                                </div>
                            @endif

                            <form class="form-horizontal" method="POST" action="{{ route('password.email') }}">
                                {{ csrf_field() }}

                                <div class="row {{ $errors->has('email') ? ' has-error' : '' }}">
                                    <div class="col-md-2">
                                        <label for="email" class="control-label">E-Mail </label>
                                    </div>
                                    <div class="col-md-6">
                                        <input id="email" autocomplete="off" type="email" class="form-control" name="corUsuario" value="{{ old('corUsuario') }}" required>

                                        @if ($errors->has('email'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('email') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                    <div class="col-md-4">
                                        <button type="submit" class="btn btn-success ">
                                            Enviar 
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
</div></body>
</html>
