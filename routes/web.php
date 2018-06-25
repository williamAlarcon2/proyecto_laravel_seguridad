<?php

//URL::forceRootUrl('http://soluciones.software/avicol/');

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('auth.login');
});

Auth::routes();

Route::get('password/reset','Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request');
Route::post('password/email','Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');

Route::get('/home', 'HomeController@index')->name('home');

Route::middleware(['auth'])->group(function () {

  /*
  |--------------------------------------------------------------------------
  | RUTAS PARA LOS ROLES DEL SISTEMA
  |--------------------------------------------------------------------------
  */
  Route::get('roles', 'RolesController@index')->name('roles.index')->middleware('permission:roles.index');

  Route::get('roles/create', 'RolesController@create')->name('roles.create')->middleware('permission:roles.create');

	Route::post('roles/store', 'RolesController@store')->name('roles.store')->middleware('permission:roles.create');

  Route::get('roles/{role}/edit', 'RolesController@edit')->name('roles.edit')->middleware('permission:roles.edit');

	Route::put('roles/{role}', 'RolesController@update')->name('roles.update')->middleware('permission:roles.edit');

	Route::delete('roles/{role}', 'RolesController@destroy')->name('roles.destroy')->middleware('permission:roles.destroy');

  /*
  |--------------------------------------------------------------------------
  | RUTAS PARA LOS USUARIOS DEL SISTEMA
  |--------------------------------------------------------------------------
  */
	Route::get('usuarios', 'UsuarioController@index')->name('usuarios.index')->middleware('permission:usuarios.index');

  Route::get('usuariosinactivos', 'UsuarioController@indexInactivo')->name('usuarios.indexInactivo');

  Route::get('usuarios/create', 'UsuarioController@create')->name('usuarios.create')->middleware('permission:usuarios.create');

	Route::post('usuarios/store', 'UsuarioController@store')->name('usuarios.store')->middleware('permission:usuarios.create');

  Route::get('usuarios/{user}/edit', 'UsuarioController@edit')->name('usuarios.edit')->middleware('permission:usuarios.edit');

	Route::put('usuarios/{user}', 'UsuarioController@update')->name('usuarios.update')->middleware('permission:usuarios.edit');

	Route::delete('usuarios/{user}', 'UsuarioController@destroy')->name('usuarios.destroy')->middleware('permission:usuarios.destroy');

   Route::get('perfilUsuario', ['as' => 'perfilUsuario', 'uses' => 'UsuarioController@perfilUsuario']);
  Route::post('updatePerfil/{id}', ['as' => 'updatePerfil', 'uses' => 'UsuarioController@updatePerfil']);

  Route::get('cambiocontrasena', ['as' => 'cambiocontrasena', 'uses' => 'UsuarioController@cambiocontrasena']);

  Route::post('updatecontrasena/{id}', ['as' => 'updatecontrasena', 'uses' => 'UsuarioController@updatecontrasena']);



  /*
  |--------------------------------------------------------------------------
  | RUTAS PARA LOS PERMISOS DEL SISTEMA
  |--------------------------------------------------------------------------
  */
  Route::get('permisos', 'PermisoController@index')->name('permisos.index')->middleware('permission:permisos.index');

  Route::get('permisos/create', 'PermisoController@create')->name('permisos.create')->middleware('permission:permisos.create');

  Route::post('permisos/store', 'PermisoController@store')->name('permisos.store')->middleware('permission:permisos.create');

  Route::get('permisos/{permiso}/edit', 'PermisoController@edit')->name('permisos.edit')->middleware('permission:permisos.edit');

	Route::put('permisos/{permiso}', 'PermisoController@update')->name('permisos.update')->middleware('permission:permisos.edit');

	Route::delete('permisos/{permiso}', 'PermisoController@destroy')->name('permisos.destroy')->middleware('permission:permisos.destroy');

  /*
  |--------------------------------------------------------------------------
  | RUTAS PARA LOS CLIMAS DEL SISTEMA
  |--------------------------------------------------------------------------
  */
  Route::get('climas', 'ClimaController@index')->name('climas.index')->middleware('permission:climas.index');

  Route::get('climas/create', 'ClimaController@create')->name('climas.create')->middleware('permission:climas.create');

  Route::post('climas/store', 'ClimaController@store')->name('climas.store')->middleware('permission:climas.create');

  Route::get('climas/{clima}/edit', 'ClimaController@edit')->name('climas.edit')->middleware('permission:climas.edit');

	Route::put('climas/{clima}', 'ClimaController@update')->name('climas.update')->middleware('permission:climas.edit');

	Route::delete('climas/{clima}', 'ClimaController@destroy')->name('climas.destroy')->middleware('permission:climas.destroy');

  Route::post('climas/search', ['as' => 'climas/search', 'uses' => 'ClimaController@search']);

  /*
  |--------------------------------------------------------------------------
  | RUTAS PARA LAS VARIEDADES DEL SISTEMA
  |--------------------------------------------------------------------------
  */
  Route::get('variedades', 'VariedadController@index')->name('variedades.index')->middleware('permission:variedades.index');

  Route::get('variedades/create', 'VariedadController@create')->name('variedades.create')->middleware('permission:variedades.create');

  Route::post('variedades/store', 'VariedadController@store')->name('variedades.store')->middleware('permission:variedades.create');

  Route::get('variedades/{variedad}/edit', 'VariedadController@edit')->name('variedades.edit')->middleware('permission:variedades.edit');

	Route::put('variedades/{variedad}', 'VariedadController@update')->name('variedades.update')->middleware('permission:variedades.edit');

	Route::delete('variedades/{variedad}', 'VariedadController@destroy')->name('variedades.destroy')->middleware('permission:variedades.destroy');

  Route::post('variedades/search', ['as' => 'variedades/search', 'uses' => 'VariedadController@search']);

  /*
  |--------------------------------------------------------------------------
  | RUTAS PARA LAS ZONAS DEL SISTEMA
  |--------------------------------------------------------------------------
  */
  Route::get('zonas', 'ZonaController@index')->name('zonas.index')->middleware('permission:zonas.index');

  Route::get('zonas/create', 'ZonaController@create')->name('zonas.create')->middleware('permission:zonas.create');

  Route::post('zonas/store', 'ZonaController@store')->name('zonas.store')->middleware('permission:zonas.create');

  Route::get('zonas/{zona}/edit', 'ZonaController@edit')->name('zonas.edit')->middleware('permission:zonas.edit');

  Route::get('zonasmunicios/{zona}', 'ZonaController@indexzonasmunicipios')->name('zonasmunicios')->middleware('permission:zonas');

	Route::put('zonas/{zona}', 'ZonaController@update')->name('zonas.update')->middleware('permission:zonas.edit');

	Route::delete('zonas/{zona}', 'ZonaController@destroy')->name('zonas.destroy')->middleware('permission:zonas.destroy');

  Route::post('zonas/search', ['as' => 'zonas/search', 'uses' => 'ZonaController@search']);

  Route::post('/consultamunicipios','ZonaController@consultamunicipio');

  /*
  |--------------------------------------------------------------------------
  | RUTAS PARA LOS SISTEMAS DE EXPLOTACION
  |--------------------------------------------------------------------------
  */
  Route::get('sistemaexplotaciones', 'SistemaexplotacionController@index')->name('sistemaexplotaciones.index')->middleware('permission:sistemaexplotaciones.index');

  Route::get('sistemaexplotaciones/create', 'SistemaexplotacionController@create')->name('sistemaexplotaciones.create')->middleware('permission:sistemaexplotaciones.create');

  Route::post('sistemaexplotaciones/store', 'SistemaexplotacionController@store')->name('sistemaexplotaciones.store')->middleware('permission:sistemaexplotaciones.create');

  Route::get('sistemaexplotaciones/{sistemaexplotacion}/edit', 'SistemaexplotacionController@edit')->name('sistemaexplotaciones.edit')->middleware('permission:sistemaexplotaciones.edit');

	Route::put('sistemaexplotaciones/{sistemaexplotacion}', 'SistemaexplotacionController@update')->name('sistemaexplotaciones.update')->middleware('permission:sistemaexplotaciones.edit');

	Route::delete('sistemaexplotaciones/{sistemaexplotacion}', 'SistemaexplotacionController@destroy')->name('sistemaexplotaciones.destroy')->middleware('permission:sistemaexplotaciones.destroy');

  Route::post('sistemaexplotaciones/search', ['as' => 'sistemaexplotaciones/search', 'uses' => 'SistemaexplotacionController@search']);

  /*
  |--------------------------------------------------------------------------
  | RUTAS PARA LOS PAISES DEL SISTEMA
  |--------------------------------------------------------------------------
  */
  Route::get('paises', 'PaisController@index')->name('paises.index')->middleware('permission:paises.index');

  Route::get('paises/create', 'PaisController@create')->name('paises.create')->middleware('permission:paises.create');

  Route::post('paises/store', 'PaisController@store')->name('paises.store')->middleware('permission:paises.create');

  Route::get('paises/{pais}/edit', 'PaisController@edit')->name('paises.edit')->middleware('permission:paises.edit');

	Route::put('paises/{pais}', 'PaisController@update')->name('paises.update')->middleware('permission:paises.edit');

	Route::delete('paises/{pais}', 'PaisController@destroy')->name('paises.destroy')->middleware('permission:paises.destroy');

  Route::post('paises/search', ['as' => 'paises/search', 'uses' => 'PaisController@search']);

  /*
  |--------------------------------------------------------------------------
  | RUTAS PARA LOS MUNICIPIOS DEL SISTEMA
  |--------------------------------------------------------------------------
  */
  Route::get('municipios', 'MunicipioController@index')->name('municipios.index')->middleware('permission:municipios.index');

  Route::get('municipios/create', 'MunicipioController@create')->name('municipios.create')->middleware('permission:municipios.create');

  Route::post('municipios/store', 'MunicipioController@store')->name('municipios.store')->middleware('permission:municipios.create');

  Route::get('municipios/{municipio}/edit', 'MunicipioController@edit')->name('municipios.edit')->middleware('permission:municipios.edit');

  Route::put('municipios/{municipio}', 'MunicipioController@update')->name('municipios.update')->middleware('permission:municipios.edit');

  Route::delete('municipios/{municipio}', 'MunicipioController@destroy')->name('municipios.destroy')->middleware('permission:municipios.destroy');

  Route::post('municipios/search', ['as' => 'municipios/search', 'uses' => 'MunicipioController@search']);

  /*
  |--------------------------------------------------------------------------
  | RUTAS PARA LOS DEPARTAMENTOS DEL SISTEMA
  |--------------------------------------------------------------------------
  */
  Route::get('departamentos', 'DepartamentoController@index')->name('departamentos.index')->middleware('permission:departamentos.index');

  Route::get('departamentos/create', 'DepartamentoController@create')->name('departamentos.create')->middleware('permission:departamentos.create');

  Route::post('departamentos/store', 'DepartamentoController@store')->name('departamentos.store')->middleware('permission:departamentos.create');

  Route::get('departamentos/{departamento}/edit', 'DepartamentoController@edit')->name('departamentos.edit')->middleware('permission:departamentos.edit');

  Route::put('departamentos/{departamento}', 'DepartamentoController@update')->name('departamentos.update')->middleware('permission:departamentos.edit');

  Route::delete('departamentos/{departamento}', 'DepartamentoController@destroy')->name('departamentos.destroy')->middleware('permission:departamentos.destroy');

  Route::post('departamentos/search', ['as' => 'departamentos/search', 'uses' => 'DepartamentoController@search']);

  /*
  |--------------------------------------------------------------------------
  | RUTAS PARA LAS EMPRESAS DEL SISTEMA
  |--------------------------------------------------------------------------
  */
  Route::get('empresas', 'EmpresaController@index')->name('empresas.index')->middleware('permission:empresas.index');

  Route::get('empresas/create', 'EmpresaController@create')->name('empresas.create')->middleware('permission:empresas.create');

  Route::post('empresas/store', 'EmpresaController@store')->name('empresas.store')->middleware('permission:empresas.create');

  Route::get('empresas/{empresa}/edit', 'EmpresaController@edit')->name('empresas.edit')->middleware('permission:empresas.edit');

  Route::put('empresas/{empresa}', 'EmpresaController@update')->name('empresas.update')->middleware('permission:empresas.edit');

  Route::delete('empresas/{empresa}', 'EmpresaController@destroy')->name('empresas.destroy')->middleware('permission:empresas.destroy');

  Route::post('empresas/search', ['as' => 'empresas/search', 'uses' => 'EmpresaController@search']);

  /*
  |--------------------------------------------------------------------------
  | RUTAS PARA LAS CLASIFICAION DE HUEVOS DEL SISTEMA
  |--------------------------------------------------------------------------
  */
  Route::get('clasificacionhuevos', 'ClasificacionhuevoController@index')->name('clasificacionhuevos.index')->middleware('permission:clasificacionhuevos.index');

  Route::post('clasificacionhuevos/store', 'ClasificacionhuevoController@store')->name('clasificacionhuevos.store')->middleware('permission:clasificacionhuevos.create');

  Route::get('clasificacionhuevos/{clasificacionhuevo}/edit', 'ClasificacionhuevoController@edit')->name('clasificacionhuevos.edit')->middleware('permission:clasificacionhuevos.edit');

  Route::put('clasificacionhuevos/{clasificacionhuevo}', 'ClasificacionhuevoController@update')->name('clasificacionhuevos.update')->middleware('permission:clasificacionhuevos.edit');

  Route::post('clasificacionhuevos/search', ['as' => 'clasificacionhuevos/search', 'uses' => 'ClasificacionhuevoController@search']);

  /*
  |--------------------------------------------------------------------------
  | RUTAS PARA LAS GUIAS DEL SISTEMA
  |--------------------------------------------------------------------------
  */
  Route::get('guias', 'GuiaController@index')->name('guias.index')->middleware('permission:guias.index');

  Route::get('guias/create', 'GuiaController@create')->name('guias.create')->middleware('permission:guias.create');

  Route::post('guias/store', 'GuiaController@store')->name('guias.store')->middleware('permission:guias.create');

  Route::get('guias/{guia}/edit', 'GuiaController@edit')->name('guias.edit')->middleware('permission:guias.edit');

  Route::put('guias/{guia}', 'GuiaController@update')->name('guias.update')->middleware('permission:guias.edit');

  Route::delete('guias/{guia}', 'GuiaController@destroy')->name('guias.destroy')->middleware('permission:guias.destroy');

  Route::post('guias/search', ['as' => 'guias/search', 'uses' => 'GuiaController@search']);

  /*
  |--------------------------------------------------------------------------
  | RUTAS PARA LAS GUIAS DE LEVANTE PONEDORAS DEL SISTEMA
  |--------------------------------------------------------------------------
  */
  Route::get('guialevanteponedoras', 'GuiaLevantePonedoraController@index')->name('guialevanteponedoras.index')->middleware('permission:guialevanteponedoras.index');

  Route::get('guialevanteponedoras/create', 'GuiaLevantePonedoraController@create')->name('guialevanteponedoras.create')->middleware('permission:guialevanteponedoras.create');

  Route::post('guialevanteponedoras/store', 'GuiaLevantePonedoraController@store')->name('guialevanteponedoras.store')->middleware('permission:guialevanteponedoras.create');

  Route::get('guialevanteponedoras/{guialevanteponedora}/edit', 'GuiaLevantePonedoraController@edit')->name('guialevanteponedoras.edit')->middleware('permission:guialevanteponedoras.edit');

  Route::put('guialevanteponedoras/{guialevanteponedora}', 'GuiaLevantePonedoraController@update')->name('guialevanteponedoras.update')->middleware('permission:guialevanteponedoras.edit');

  Route::delete('guialevanteponedoras/{guialevanteponedora}', 'GuiaLevantePonedoraController@destroy')->name('guialevanteponedoras.destroy')->middleware('permission:guialevanteponedoras.destroy');

  Route::post('guialevanteponedoras/search', ['as' => 'guialevanteponedoras/search', 'uses' => 'GuiaLevantePonedoraController@search']);

  /*
  |--------------------------------------------------------------------------
  | RUTAS PARA LAS GUIAS DE PRODUCCION PONEDORAS DEL SISTEMA
  |--------------------------------------------------------------------------
  */
  Route::get('guiaproduccionponedoras', 'GuiaProduccionPonedoraController@index')->name('guiaproduccionponedoras.index')->middleware('permission:guiaproduccionponedoras.index');

  Route::get('guiaproduccionponedoras/create', 'GuiaProduccionPonedoraController@create')->name('guiaproduccionponedoras.create')->middleware('permission:guiaproduccionponedoras.create');

  Route::post('guiaproduccionponedoras/store', 'GuiaProduccionPonedoraController@store')->name('guiaproduccionponedoras.store')->middleware('permission:guiaproduccionponedoras.create');

  Route::get('guiaproduccionponedoras/{guialevanteponedora}/edit', 'GuiaProduccionPonedoraController@edit')->name('guiaproduccionponedoras.edit')->middleware('permission:guiaproduccionponedoras.edit');

  Route::put('guiaproduccionponedoras/{guialevanteponedora}', 'GuiaProduccionPonedoraController@update')->name('guiaproduccionponedoras.update')->middleware('permission:guiaproduccionponedoras.edit');

  Route::delete('guiaproduccionponedoras/{guialevanteponedora}', 'GuiaProduccionPonedoraController@destroy')->name('guiaproduccionponedoras.destroy')->middleware('permission:guiaproduccionponedoras.destroy');

  Route::post('guiaproduccionponedoras/search', ['as' => 'guiaproduccionponedoras/search', 'uses' => 'GuiaProduccionPonedoraController@search']);

/*
  |--------------------------------------------------------------------------
  | RUTAS PARA GRANJA
  |--------------------------------------------------------------------------
*/

Route::get('granjas', 'GranjaController@index')->name('granjas.index')->middleware('permission:granjas.index');

Route::get('granjas/create', 'GranjaController@create')->name('granjas.create')->middleware('permission:granjas.create');

  Route::post('granjas/store', 'GranjaController@store')->name('granjas.store')->middleware('permission:granjas.create');

  Route::get('granjas/{granja}/edit', 'GranjaController@edit')->name('granjas.edit')->middleware('permission:granjas.edit');

  Route::put('granjas/{granja}', 'GranjaController@update')->name('granjas.update')->middleware('permission:granjas.edit');

  Route::post('granjas/search', ['as' => 'granjas/search', 'uses' => 'GranjaController@search']);

/*
  |--------------------------------------------------------------------------
  | RUTAS PARA LOTE
  |--------------------------------------------------------------------------
*/

  Route::get('lotes', 'LoteControlle@index')->name('lotes.index')->middleware('permission:lotes.index');

  Route::get('lotes/create', 'LoteControlle@create')->name('lotes.create')->middleware('permission:lotes.create');

  Route::post('lotes/store', 'LoteControlle@store')->name('lotes.store')->middleware('permission:lotes.create');

  Route::get('lotes/{lote}/edit', 'LoteControlle@edit')->name('lotes.edit')->middleware('permission:lotes.edit');

  Route::put('lotes/{lote}', 'LoteControlle@update')->name('lotes.update')->middleware('permission:lotes.edit');

  Route::post('lotes/search', ['as' => 'lotes/search', 'uses' => 'LoteControlle@search']);

  Route::get('subloteslotes/{lote}', 'LoteControlle@indexsublotes')->name('subloteslotes')->middleware('permission:lotes');

  Route::post('/consultasistemas','LoteControlle@consultasistemas');

  Route::get('lotes/sublotes', 'LoteControlle@indexsublotes')->name('lotes/sublotes.indexsublotes');

  Route::delete('lotes/{lote}', 'LoteControlle@destroy')->name('lotes.destroy')->middleware('permission:lotes.destroy');

/*
  |--------------------------------------------------------------------------
  | RUTAS PONEDORAS LEVANTE
  |--------------------------------------------------------------------------
*/

  Route::get('ponedoraslevantes', 'PonedoraslevanteController@index')->name('ponedoraslevantes.index')->middleware('permission:ponedoraslevantes.index');

  Route::get('ponedoraslevantes/produccion', 'PonedoraslevanteController@indexProduccion')->name('ponedoraslevantes/produccion.indexProduccion');

  Route::get('ponedoraslevantes/create', 'PonedoraslevanteController@create')->name('ponedoraslevantes.create')->middleware('permission:ponedoraslevantes.create');

  Route::post('ponedoraslevantes/store', 'PonedoraslevanteController@store')->name('ponedoraslevantes.store')->middleware('permission:ponedoraslevantes.create');

  Route::get('ponedoraslevantes/{ponedoraslevante}/edit', 'PonedoraslevanteController@edit')->name('ponedoraslevantes.edit')->middleware('permission:ponedoraslevantes.edit');

  Route::put('ponedoraslevantes/{ponedoraslevante}', 'PonedoraslevanteController@update')->name('ponedoraslevantes.update')->middleware('permission:ponedoraslevantes.edit');

  Route::post('ponedoraslevantes/search', ['as' => 'ponedoraslevantes/search', 'uses' => 'PonedoraslevanteController@search']);

  Route::post('ponedoraslevantesbuscar/search', ['as' => 'ponedoraslevantesbuscar/search', 'uses' => 'PonedoraslevanteController@searchbuscar']);

  Route::get('ponedoraslevantes/{ponedoraslevante}/enviarproduccion', 'PonedoraslevanteController@enviarproduccion')->name('ponedoraslevantes.enviarproduccion');

  Route::get('ponedoraslevantes/{ponedoraslevante}/camposcalculados', 'PonedoraslevanteController@camposcalculados')->name('ponedoraslevantes.camposcalculados');

  /*
  |--------------------------------------------------------------------------
  | RUTAS PONEDORAS PRODUCCION
  |--------------------------------------------------------------------------
*/

  Route::get('ponedorasproduccions', 'PonedorasproduccionController@index')->name('ponedorasproduccions.index')->middleware('permission:ponedorasproduccions.index');

Route::get('ponedorasproduccions/create', 'PonedorasproduccionController@create')->name('ponedorasproduccions.create')->middleware('permission:ponedorasproduccions.create');

  Route::post('ponedorasproduccions/store', 'PonedorasproduccionController@store')->name('ponedorasproduccions.store')->middleware('permission:ponedorasproduccions.create');

  Route::post('ponedorasproduccions/search', ['as' => 'ponedorasproduccions/search', 'uses' => 'PonedorasproduccionController@search']);

  Route::post('ponedorasproduccionsbuscar/search', ['as' => 'ponedorasproduccionsbuscar/search', 'uses' => 'PonedorasproduccionController@searchbuscar']);


  /*
  |--------------------------------------------------------------------------
  | RUTAS PARA LA CONSOLIDACION DE SUBLOTES DEL SISTEMA
  |--------------------------------------------------------------------------
  */
  Route::get('consolidarsublotes', 'ConsolidarsubloteController@index')->name('consolidarsublotes.index')->middleware('permission:consolidarsublotes.index');

  Route::get('consolidarsublotes/create', 'ConsolidarsubloteController@create')->name('consolidarsublotes.create')->middleware('permission:consolidarsublotes.create');

  Route::post('consolidarsublotes/store', 'ConsolidarsubloteController@store')->name('consolidarsublotes.store')->middleware('permission:consolidarsublotes.create');

  Route::get('consolidarsublotes/{consolidarsublote}/edit', 'ConsolidarsubloteController@edit')->name('consolidarsublotes.edit')->middleware('permission:consolidarsublotes.edit');

  Route::put('consolidarsublotes/{consolidarsublote}', 'ConsolidarsubloteController@update')->name('consolidarsublotes.update')->middleware('permission:consolidarsublotes.edit');

  Route::delete('consolidarsublotes/{consolidarsublote}', 'ConsolidarsubloteController@destroy')->name('consolidarsublotes.destroy')->middleware('permission:consolidarsublotes.destroy');

  Route::post('consolidarsublotes/search', ['as' => 'consolidarsublotes/search', 'uses' => 'ConsolidarsubloteController@search']);

  Route::get('consolidarexport/{consolidarsublote}/excelconsolidar', 'ConsolidarsubloteController@excelconsolidar')->name('consolidarexport.excelconsolidar');

  /*
  |--------------------------------------------------------------------------
  | RUTAS PARA LOS REPORTES DE LEVANTE PONEDORAS DEL SISTEMA
  |--------------------------------------------------------------------------
  */
  Route::get('excelcrearlevante' , ['as' => 'excelcrearlevante' , 'uses' => 'ReporteLevanteController@DescargarExcelLevante']);
  Route::post('levanteExport' , ['as' => 'levanteExport' , 'uses' => 'ReporteLevanteController@excelcrearlevante']);




  /***********Modificado por William********/
  Route::get('web-register', 'Auth\AuthController@webRegister');
  Route::post('web-register', 'Auth\AuthController@webRegisterPost');


});
