<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Granja as Granja;
use App\Models\Zona as Zona;
use App\Models\Empresa as Empresa;
use App\Models\Municipio as Municipio;
use App\Models\Clima as Clima;
use App\Models\Estado as Estado;


class GranjaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $granjas = Granja::select('zonas.nombreZon', 'empresas.nombreEmp', 'municipios.nombreMun', 'climas.nombreCli','estados.nombreEst', 'granjas.*')
                            ->join('zonas' , 'zonas.id' , '=' , 'granjas.idZona')
                            ->join('empresas' , 'empresas.id' , '=', 'granjas.idEmpresa')
                            ->join('municipios' , 'municipios.id' , '=', 'granjas.idMunicipio')
                            ->join('climas', 'climas.id','=','granjas.idClima')
                            ->join('estados', 'estados.id','=','granjas.idEstado')
                            ->paginate(20);

      return view('Avicol/Granja/list', compact('granjas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $zonas = Zona::select('nombreZon', 'id')->get();

        $empresas = Empresa::select('estados.nombreEst','nombreEmp','empresas.id')
                            ->join('estados' , 'estados.id' , '=' , 'empresas.idEstado')
                            ->where('nombreEst', '=', 'Activo')
                            ->where('modulopEmp', '=', 'Ponedoras')
                            ->get();

        $municipios = Municipio::select('municipios.*', 'departamentos.nombreDep', 'pais.nombrePai')
                                ->join('departamentos', 'departamentos.id' , '=' , 'municipios.idDepartamento')
                                ->join('pais', 'pais.id' , '=' , 'departamentos.idPais')
                                ->get();

        $climas = Clima::select('nombreCli', 'id')->get();

        return view('Avicol/Granja/create' , compact('zonas' , 'empresas' , 'municipios', 'climas'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //Validaciones
        $messages = [
            'nombreGra.required' => 'El campo Nombre de la Granja es obligatorio',
            'idZona.required' => 'Es obligatorio seleccionar una zona',
            'idEmpresa.required' => 'Es obligatorio seleccionar una empresa',
            'idMunicipio.required' => 'Es obligatorio seleccionar un municipio',
            'idClima.required' => 'Es obligatorio seleccionar un clima',
        ];
        $rules = [
            'nombreGra' => 'required',
            'idZona' => 'required',
            'idEmpresa' => 'required',
            'idMunicipio' => 'required',
            'idClima' => 'required',
        ];

      $this->validate($request, $rules , $messages);

      $granjas = new Granja;
      $granjas->nombreGra = $request->nombreGra;
      $granjas->alturaGra = $request->alturaGra;
      $granjas->modulopGra = $request->modulopGra;
      $granjas->modulorGra = $request->modulorGra;
      $granjas->modulopeGra = $request->modulopeGra;
      $granjas->modulolGra = $request->modulolGra;
      $granjas->idZona = $request->idZona;
      $granjas->idEmpresa = $request->idEmpresa;
      $granjas->idMunicipio = $request->idMunicipio;
      $granjas->idClima = $request->idClima;
      $granjas->idEstado = 1;
      $granjas->save();
      return redirect('granjas');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $granjas = Granja::find($id);

        $granjazonas =  Granja::select('granjas.*', 'zonas.nombreZon')
                                      ->join('zonas' , 'zonas.id' , '=' , 'granjas.idZona')
                                      ->where('granjas.id' , '=' , $id)
                                      ->get();

        $zonas = Zona::select('nombreZon', 'id')->get();

        $granjaempresas =  Granja::select('granjas.*', 'empresas.nombreEmp')
                                      ->join('empresas' , 'empresas.id' , '=' , 'granjas.idEmpresa')
                                      ->where('granjas.id' , '=' , $id)
                                      ->get();

        $empresas = Empresa::select('estados.nombreEst','nombreEmp','empresas.id')
                            ->join('estados' , 'estados.id' , '=' , 'empresas.idEstado')
                            ->where('nombreEst', '=', 'Activo')
                            ->get();

        $granjamunicipios = Granja::select('granjas.*','municipios.nombreMun', 'departamentos.nombreDep', 'pais.nombrePai')
                                ->join('municipios' , 'municipios.id' , '=' , 'granjas.idMunicipio')
                                ->join('departamentos', 'departamentos.id' , '=' , 'municipios.idDepartamento')
                                ->join('pais', 'pais.id' , '=' , 'departamentos.idPais')
                                ->where('granjas.id' , '=' , $id)
                                ->get();

        $municipios = Municipio::select('municipios.*', 'departamentos.nombreDep', 'pais.nombrePai')
                                ->join('departamentos', 'departamentos.id' , '=' , 'municipios.idDepartamento')
                                ->join('pais', 'pais.id' , '=' , 'departamentos.idPais')
                                ->get();

        $granjaclimas =  Granja::select('granjas.*', 'climas.nombreCli')
                                      ->join('climas' , 'climas.id' , '=' , 'granjas.idClima')
                                      ->where('granjas.id' , '=' , $id)
                                      ->get();
        $climas = Clima::select('nombreCli', 'id')->get();

        $granjaestados =  Granja::select('granjas.*', 'estados.nombreEst')
                                      ->join('estados' , 'estados.id' , '=' , 'granjas.idEstado')
                                      ->where('granjas.id' , '=' , $id)
                                      ->get();
        $estados = Estado::select('nombreEst', 'estados.id')
                          ->join('tipoestados', 'tipoestados.id', '=', 'estados.idTipoEstado')
                          ->where('tipoestados.nombreTip', '=', 'General')
                          ->get();

        return view('Avicol/Granja/update', compact('granjas', 'granjazonas' ,'zonas','granjaempresas' , 'empresas', 'granjamunicipios', 'municipios' , 'granjaclimas', 'climas', 'granjaestados', 'estados'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //Validaciones
        $messages = [
            'nombreGra.required' => 'El campo Nombre de la Granja es obligatorio',
        ];
        $rules = [
            'nombreGra' => 'required',
        ];

      $this->validate($request, $rules , $messages);

      $granjas = Granja::find($id);
      $granjas->nombreGra = $request->nombreGra;
      $granjas->alturaGra = $request->alturaGra;
      $granjas->modulopGra = $request->modulopGra;
      $granjas->modulorGra = $request->modulorGra;
      $granjas->modulopeGra = $request->modulopeGra;
      $granjas->modulolGra = $request->modulolGra;
      $granjas->idZona = $request->idZona;
      $granjas->idEmpresa = $request->idEmpresa;
      $granjas->idMunicipio = $request->idMunicipio;
      $granjas->idClima = $request->idClima;
      $granjas->idEstado = $request->idEstado;
      $granjas->save();
      return redirect('granjas');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function search(Request $request)
    {
        $granjas = Granja::select('zonas.nombreZon', 'empresas.nombreEmp', 'municipios.nombreMun', 'climas.nombreCli','estados.nombreEst', 'granjas.*')
                            ->join('zonas' , 'zonas.id' , '=' , 'granjas.idZona')
                            ->join('empresas' , 'empresas.id' , '=', 'granjas.idEmpresa')
                            ->join('municipios' , 'municipios.id' , '=', 'granjas.idMunicipio')
                            ->join('climas', 'climas.id','=','granjas.idClima')
                            ->join('estados', 'estados.id','=','granjas.idEstado')
                            ->where('nombreGra','like','%'.$request->buscar.'%')
                            ->orWhere('modulopGra','like','%'.$request->buscar.'%')
                            ->orWhere('modulorGra','like','%'.$request->buscar.'%')
                            ->orWhere('modulopeGra','like','%'.$request->buscar.'%')
                            ->orWhere('modulolGra','like','%'.$request->buscar.'%')
                            ->orWhere('nombreZon','like','%'.$request->buscar.'%')
                            ->orWhere('nombreEmp','like','%'.$request->buscar.'%')
                            ->orWhere('nombreMun','like','%'.$request->buscar.'%')
                            ->orWhere('nombreCli','like','%'.$request->buscar.'%')
                            ->orWhere('nombreEst','like','%'.$request->buscar.'%')
                            ->paginate(20);

      return \View::make('Avicol/Granja/list', compact('granjas'));
    }
}
