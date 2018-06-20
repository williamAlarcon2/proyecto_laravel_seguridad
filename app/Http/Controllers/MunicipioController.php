<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Municipio as Municipio;

use App\Models\Departamento as Departamento;

class MunicipioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $municipios = Municipio::select('pais.nombrePai','departamentos.nombreDep','municipios.*')
                              ->join('departamentos', 'departamentos.id', '=', 'municipios.idDepartamento')
                              ->join('pais', 'pais.id', '=', 'departamentos.idPais')
                              ->paginate(20);

      return view('Avicol/Municipio/list', compact('municipios'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      $departamentos = Departamento::select('nombrePai','nombreDep','departamentos.id')
                                    ->join('pais', 'pais.id', '=', 'departamentos.idPais')
                                    ->get();

      return view('Avicol/Municipio/create', compact('departamentos'));
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
            'nombreMun.required' => 'El campo Nombre del Municipio es obligatorio',
            'nombreMun.unique' => 'El nombre ingresado ya se encuentra registrado',
            'nombreMun.alpha' => 'El campo Nombre del Municipio solo permite letras',
            'idDepartamento.required' => 'Es obligatorio seleccionar un Departamento',
        ];
        $rules = [
            'nombreMun' => 'required|unique:municipios|alpha',
            'idDepartamento' => 'required',
        ];

        $this->validate($request, $rules , $messages);

      $municipios = new Municipio;
      $municipios->create($request->all());

      return redirect('municipios');
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
      $municipios = Municipio::find($id);

      $municipiosdepartamento = Municipio::select('municipios.*','departamentos.nombreDep')
                                         ->join('departamentos' , 'departamentos.id' , '=' , 'municipios.idDepartamento')
                                         ->where('municipios.id','=', $id)
                                         ->get();

     $departamentos = Departamento::select('nombrePai','nombreDep','departamentos.id')
                                   ->join('pais', 'pais.id', '=', 'departamentos.idPais')
                                   ->get();


      return view('Avicol/Municipio/update', compact('departamentos','municipios','municipiosdepartamento'));
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
            'nombreMun.required' => 'El campo Nombre del Municipio es obligatorio',
            'nombreMun.alpha' => 'El campo Nombre del Municipio solo permite letras',
            'idDepartamento.required' => 'Es obligatorio seleccionar un Departamento',
        ];
        $rules = [
            'nombreMun' => 'required|alpha',
            'idDepartamento' => 'required',
        ];

        $this->validate($request, $rules , $messages);

      $municipios = Municipio::find($id);

      $municipios->update($request->all());

      return redirect('municipios');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      $municipios = Municipio::find($id)->delete();

      return back()->with('info', 'Eliminado correctamente');
    }

    public function search(Request $request)
    {
      $municipios = Municipio::select('departamentos.nombreDep','pais.nombrePai','municipios.nombreMun')
                              ->join('departamentos', 'departamentos.id', '=', 'municipios.idDepartamento')
                              ->join('pais', 'pais.id', '=', 'departamentos.idPais')
                              ->where('nombreDep','like','%'.$request->buscar.'%')
                              ->orWhere('nombrePai','like','%'.$request->buscar.'%')
                              ->orWhere('nombreMun','like','%'.$request->buscar.'%')
                              ->paginate();

      return \View::make('Avicol/Municipio/list', compact('municipios'));
    }
}
