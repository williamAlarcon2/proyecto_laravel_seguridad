<!DOCTYPE html>
<html lang="es" ng-app="app">
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">
		<meta http-equiv="x-ua-compatible" content="ie=edge">
		<title>Avicol</title>
		<link rel="shortcut icon" href="{{asset('Avicol.ico')}}">
	  	<link rel="stylesheet" href="{{asset('css/lib/bootstrap/bootstrap.min.css')}}">
	 	<link rel="stylesheet" href="{{asset('css/main.css')}}">
		<link rel="stylesheet" type="text/css" href="{{asset('css/font-awesome.css')}}">
		<link rel='stylesheet' href="{{asset('css/bootstrap.min.css')}}">
		<link rel="stylesheet" href="{{asset('css/style.css')}}">
		<link rel="stylesheet" href="{{asset('css/separate/vendor/bootstrap-select/bootstrap-select.min.css')}}">
		<link rel="stylesheet" href="{{asset('css/separate/vendor/select2.min.css')}}">
		<link href="https://fonts.googleapis.com/css?family=Amatic+SC" rel="stylesheet">
		<link rel="stylesheet" href="{{asset('css/stylehome.css')}}">
		<link rel="stylesheet" href="{{asset('css/jquery-ui.css')}}"/>
		<script src="{{asset('js/lib/jquery/jquery-3.2.1.min.js')}}"></script>
		<script src="{{asset('js/jquery-ui.js')}}"></script>
	</head>
	<body class="with-side-menu">
		<header class="site-header">
	    <div class="container-fluid">
	      <a href="{{ route('home') }}" class="site-logo">
	          <img class="hidden-md-down" src="{{asset('img/logo-2.png')}}" alt="">
	          <img class="hidden-lg-down" src="{{asset('img/logo-2-mob.png')}}" alt="">
	      </a>
        <button id="show-hide-sidebar-toggle" class="show-hide-sidebar">
            <span>toggle menu</span>
        </button>
        <button class="hamburger hamburger--htla">
            <span>toggle menu</span>
        </button>
        <div class="site-header-content">
	        <div class="site-header-content-in">
            <div class="site-header-shown">
              <div class="dropdown user-menu">
	              <button class="dropdown-toggle" id="dd-user-menu" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
	                  <img src="{{asset('img/avatar-2-64.png')}}" alt="">
	              </button>
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dd-user-menu">
                    <a class="dropdown-item" href="{{ route('perfilUsuario') }}"><span class="font-icon glyphicon glyphicon-user"></span>Perfil</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                      <span class="font-icon glyphicon glyphicon-log-out"></span>Cerrar Sesión
                    </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        {{ csrf_field() }}
                    </form>
                </div>
              </div>
            </div><!--.site-header-shown-->
	        </div><!--site-header-content-in-->
        </div><!--.site-header-content-->
	    </div><!--.container-fluid-->
		</header><!--.site-header-->
		<div class="mobile-menu-left-overlay"></div>
		<nav class="side-menu">
	    <ul class="side-menu-list">
	      @can('usuarios.index' || 'roles.index' || 'permisos.index' )
	      <li class="green with-sub <?php if(strpos(Route::current()->getName(),'usuarios')!==false){echo 'opened';} ?> <?php if(strpos(Route::current()->getName(),'roles')!==false){echo 'opened';} ?> <?php if(strpos(Route::current()->getName(),'permisos')!==false){echo 'opened';} ?>">
	            <span>
	                <i class="fa fa-unlock-alt" aria-hidden="true"></i>
	                <span class="lbl">Seguridad</span>
	            </span>
	            <ul>
	                @can('usuarios.index')
				        <li>
			            <a href="{{ route('usuarios.index') }}">
				            <span class="lbl">Usuarios</span>
			            </a>
				        </li>
			        @endcan
	                @can('roles.index')
			          <li>
			            <a href="{{ route('roles.index') }}">
				            <span class="lbl">Roles</span>
			            </a>
			          </li>
			        @endcan
			        @can('permisos.index')
				        <li>
				          <a href="{{ route('permisos.index') }}">
			              <span class="lbl">Permisos</span>
				          </a>
				        </li>
			        @endcan
	            </ul>
	      </li>
	      @endcan
	      @can('climas.index' || 'variedades.index' || 'zonas.index' || 'sistemaexplotaciones.index' || 'paises.index' || 'departamentos.index' || 'municipios.index' || 'empresas.index' || 'clasificacionhuevos.index' || 'guias.index')
       	  <li class="blue with-sub <?php if(strpos(Route::current()->getName(),'climas')!==false){echo 'opened';} ?> <?php if(strpos(Route::current()->getName(),'variedades')!==false){echo 'opened';} ?> <?php if(strpos(Route::current()->getName(),'zonas')!==false){echo 'opened';} ?> <?php if(strpos(Route::current()->getName(),'sistemaexplotaciones')!==false){echo 'opened';} ?>  <?php if(strpos(Route::current()->getName(),'paises')!==false){echo 'opened';} ?> <?php if(strpos(Route::current()->getName(),'departamentos')!==false){echo 'opened';} ?> <?php if(strpos(Route::current()->getName(),'municipios')!==false){echo 'opened';} ?> <?php if(strpos(Route::current()->getName(),'empresas')!==false){echo 'opened';} ?> <?php if(strpos(Route::current()->getName(),'clasificacionhuevos')!==false){echo 'opened';} ?> <?php if(strpos(Route::current()->getName(),'guias')!==false){echo 'opened';} ?> <?php if(strpos(Route::current()->getName(),'guialevanteponedoras')!==false){echo 'opened';} ?> <?php if(strpos(Route::current()->getName(),'guiaproduccionponedoras')!==false){echo 'opened';} ?>">
	            <span>
	                <i class="fa fa-th-large" aria-hidden="true"></i>
	                <span class="lbl">Generales</span>
	            </span>
	            <ul>
				@can('climas.index')
			        <li>
			          <a href="{{ route('climas.index') }}">
		              <span class="lbl">Climas</span>
			          </a>
			        </li>
		        @endcan
				@can('variedades.index')
			        <li>
			          <a href="{{ route('variedades.index') }}">
		              <span class="lbl">Variedades</span>
			          </a>
			        </li>
		        @endcan
				@can('zonas.index')
			        <li>
			          <a href="{{ route('zonas.index') }}">
		              <span class="lbl">Zonas</span>
			          </a>
			        </li>
		        @endcan
				@can('sistemaexplotaciones.index')
			        <li>
			          <a href="{{ route('sistemaexplotaciones.index') }}">
		              <span class="lbl">Sistema Explotaciones</span>
			          </a>
			        </li>
		        @endcan
				@can('paises.index')
			        <li>
			          <a href="{{ route('paises.index') }}">
		              <span class="lbl">Paises</span>
			          </a>
			        </li>
		        @endcan
				@can('departamentos.index')
			        <li>
			          <a href="{{ route('departamentos.index') }}">
		              <span class="lbl">Departamentos</span>
			          </a>
			        </li>
		        @endcan
				@can('municipios.index')
			        <li>
			          <a href="{{ route('municipios.index') }}">
		              <span class="lbl">Municipios</span>
			          </a>
			        </li>
		        @endcan
				@can('empresas.index')
			        <li>
			          <a href="{{ route('empresas.index') }}">
		              <span class="lbl">Empresas</span>
			          </a>
			        </li>
		        @endcan
				@can('clasificacionhuevos.index')
			        <li>
			          <a href="{{ route('clasificacionhuevos.index') }}">
		              <span class="lbl">Clasificacion Huevos</span>
			          </a>
			        </li>
		        @endcan
				@can('guias.index')
			        <li>
			          <a href="{{ route('guias.index') }}">
		              <span class="lbl">Guias</span>
			          </a>
			        </li>
		        @endcan

		    </ul>
		  </li>
		  @endcan
		  @can( 'granjas.index' || 'lotes.index' || 'ponedoraslevantes.index' || 'consolidarsublotes.index')
	      <li class="brown with-sub <?php if(strpos(Route::current()->getName(),'granjas')!==false){echo 'opened';} ?> <?php if(strpos(Route::current()->getName(),'lotes')!==false){echo 'opened';} ?> <?php if(strpos(Route::current()->getName(),'ponedoraslevantes')!==false){echo 'opened';} ?> <?php if(strpos(Route::current()->getName(),'ponedorasproduccions')!==false){echo 'opened';} ?> <?php if(strpos(Route::current()->getName(),'consolidarsublotes')!==false){echo 'opened';} ?>">
	            <span>
	                <i class="fa fa-window-restore" aria-hidden="true"></i>
	                <span class="lbl">Ponedoras</span>
	            </span>
	            <ul>
	                @can('granjas.index')
				        <li>
				          <a href="{{ route('granjas.index') }}">
			              <span class="lbl">Granjas</span>
				          </a>
				        </li>
			        @endcan
			        @can('lotes.index')
				        <li>
				          <a href="{{ route('lotes.index') }}">
			              <span class="lbl">Lotes</span>
				          </a>
				        </li>
			        @endcan
			        @can('ponedoraslevantes.index')
				        <li>
				          <a href="{{ route('ponedoraslevantes.index') }}">
			              <span class="lbl">Ponedoras Levante</span>
				          </a>
				        </li>
			        @endcan
			        @can('ponedorasproduccions.index')
				        <li>
				          <a href="{{ route('ponedorasproduccions.index') }}">
			              <span class="lbl">Ponedoras Produccion</span>
				          </a>
				        </li>
			        @endcan
							@can('consolidarsublotes.index')
				        <li>
				          <a href="{{ route('consolidarsublotes.index') }}">
			              <span class="lbl">Consolidar Sublotes</span>
				          </a>
				        </li>
			        @endcan
	            </ul>
	      </li>
	      @endcan
				@can('reportelevantes.index')
	      <li class="green with-sub <?php if(strpos(Route::current()->getName(),'reportes')!==false){echo 'opened';} ?>">
	        <span>
	            <i class="fa fa-unlock-alt" aria-hidden="true"></i>
	            <span class="lbl">Reportes</span>
	        </span>
          <ul>
            @can('excelcrearlevante')
			        <li>
		            <a href="{{ route('excelcrearlevante') }}">
			            <span class="lbl">Ponedoras Levante</span>
		            </a>
			        </li>
	        	@endcan
          </ul>
	      </li>
	      @endcan
	    </ul>
		</nav><!--.side-menu-->
		<div class="page-content">
			<div class="container-fluid">
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
		<script src="{{asset('js/lib/popper/popper.min.js')}}"></script>
		<script src="{{asset('js/lib/tether/tether.min.js')}}"></script>
		<script src="{{asset('js/lib/bootstrap/bootstrap.min.js')}}"></script>
		<script src="{{asset('js/plugins.js')}}"></script>
		<script src="{{asset('js/app.js')}}"></script>
		<script  src="{{asset('js/index.js')}}"></script>
	  	<script src="{{asset('js/lib/bootstrap-select/bootstrap-select.min.js')}}"></script>
		<script src="{{asset('js/lib/select2/select2.full.min.js')}}"></script>
		<script src="{{asset('js/js.js')}}"></script>
		<script src="{{asset('js/update.js')}}"></script>
		<script src="{{asset('js/date.js')}}"></script>
	</body>
</html>
