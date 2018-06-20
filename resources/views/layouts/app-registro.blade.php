<!DOCTYPE html>
<html lang="es">
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">
		<meta http-equiv="x-ua-compatible" content="ie=edge">
		<title>Menú</title>
	  <link rel="stylesheet" href="{{asset('css/lib/bootstrap/bootstrap.min.css')}}">
	  <link rel="stylesheet" href="{{asset('css/main.css')}}">
	  <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons">
		<link rel="stylesheet" type="text/css" href="{{asset('css/font-awesome.css')}}">
		<link rel='stylesheet' href="{{asset('css/bootstrap.min.css')}}">
		<link rel="stylesheet" href="{{asset('css/style.css')}}">
		<link rel="stylesheet" href="{{asset('css/separate/vendor/bootstrap-select/bootstrap-select.min.css')}}">
		<link rel="stylesheet" href="{{asset('css/separate/vendor/select2.min.css')}}">
	</head>
	<body>
		<div class="separacion">
			<div class="container-fluid separacion">
				<!--<header class="section-header">
					<div class="tbl">
						<div class="tbl-row">
							<div class="tbl-cell">
								<ol class="breadcrumb breadcrumb-simple">
									<li><a href="#">StartUI</a></li>
									<li><a href="#">Forms</a></li>
									<li class="active">Form extras</li>
								</ol>
							</div>
						</div>
					</div>
				</header>-->
		      <div class="row card">
		        <div class="card-block">
						@yield('content')
		        </div>
		      </div>
			</div><!--.container-fluid-->
		</div><!--.page-content-->
		<script src="{{asset('js/lib/jquery/jquery-3.2.1.min.js')}}"></script>
		<script src="{{asset('js/lib/popper/popper.min.js')}}"></script>
		<script src="{{asset('js/lib/tether/tether.min.js')}}"></script>
		<script src="{{asset('js/lib/bootstrap/bootstrap.min.js')}}"></script>
		<script src="{{asset('js/plugins.js')}}"></script>
		<script src="{{asset('js/app.js')}}"></script>
		<script  src="{{asset('js/index.js')}}"></script>
	  <script src="{{asset('js/lib/bootstrap-select/bootstrap-select.min.js')}}"></script>
		<script src="{{asset('js/lib/select2/select2.full.min.js')}}"></script>
	</body>
</html>
