<!DOCTYPE html>
<html>
	<head lang="en">
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">
		<meta http-equiv="x-ua-compatible" content="ie=edge">
		<title>Login</title>
    <link rel="stylesheet" href="{{ asset('css/separate/pages/login.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/lib/bootstrap/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/main.css') }}">
	</head>
	<body onload="nobackbutton();">
    <div class="page-center">
      <div class="page-center-in">
        <div class="container-fluid">
          <form class="sign-box" method="POST" action="{{ route('login') }}">
            {{ csrf_field() }}
            <div class="sign-avatar">
              <img src="img/usuario.svg" alt="">
            </div>
            <header class="sign-title">Login</header>
            <div class="form-group{{ $errors->has('corUsuario') ? ' has-error' : '' }}">
              <input id="email" type="email" class="form-control" name="corUsuario" value="{{ old('corUsuario') }}" required autofocus placeholder="Nombre Usuario">
            </div>
            <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
            	<input id="password" type="password" class="form-control" name="password" required placeholder="Contraseña">
            </div>
            <div class="form-group{{ $errors->has('CaptchaCode') ? ' has-error' : '' }}">
              <label class="col-md-12 control-label">Captcha</label>

              <div class="col-md-12">
                {!! captcha_image_html('ContactCaptcha')  !!}
                <input class="form-control" type="text" id="CaptchaCode" name="CaptchaCode" style="margin-top:5px;">
                @if ($errors->has('CaptchaCode'))
                  <div class="clearfix"></div>
                  <br>
                  <span class="help-block alert alert-error">
                    <strong>{{ $errors->first('CaptchaCode') }}</strong>
                  </span>
                @endif
                @if ($errors->has('corUsuario'))
                  <span class="help-block alert alert-error">
                    <strong>{{ $errors->first('corUsuario') }}</strong>
                  </span>
                @endif
                @if ($errors->has('password'))
                  <span class="help-block alert alert-error">
                    <strong>{{ $errors->first('password') }}</strong>
                  </span>
                @endif
              </div>
            </div>

            <button type="submit" class="btn btn-rounded btn-success sign-up">Iniciar Sesión</button>
          </form>
        </div>
      </div>
    </div><!--.page-center-->
		<script src="{{ asset('js/lib/jquery/jquery-3.2.1.min.js') }}"></script>
		<script src="{{ asset('js/lib/popper/popper.min.js') }}"></script>
		<script src="{{ asset('js/lib/tether/tether.min.js') }}"></script>
		<script src="{{ asset('js/lib/bootstrap/bootstrap.min.js') }}"></script>
		<script src="{{ asset('js/plugins.js') }}"></script>
		<script src="{{ asset('js/lib/match-height/jquery.matchHeight.min.js') }}"></script>
		<script src="{{ asset('js/js.js') }}"></script>
		<script src="{{ asset('js/app.js') }}"></script>
	</body>
</html>
