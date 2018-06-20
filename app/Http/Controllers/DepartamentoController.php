<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Departamento as Departamento;

use App\Models\Pais as Pais;

class DepartamentoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $departamentos = Departamento::select('pais.nombrePai','departamentos.*')
                                    ->join('pais', 'pais.id', '=', 'departamentos.idPais')
                                    ->paginate(20);

      return view('Avicol/Departamento/list', compact('departamentos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      $paises = Pais::select('nombrePai','id')->get();

      return view('Avicol/Departamento/create', compact('paises'));
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
            'nombreDep.required' => 'El campo Nombre del Departamento es obligatorio',
            'nombreDep.unique' => 'El nombre ingresado ya se encuentra registrado',
            'nombreDep.alpha' => 'El campo Nombre del Departamento solo permite letras',
            'idPais.required' => 'Es obligatorio seleccionar un Pais',
        ];
        $rules = [
            'nombreDep' => 'required|unique:departamentos|alpha',
            'idPais' => 'required',
        ];

        $this->validate($request, $rules , $messages);

      $departamentos = new Departamento;
      $departamentos->create($request->all());

      return redirect('departamentos');
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
      $departamentos = Departamento::find($id);

      $departamentospais = Departamento::select('departamentos.*','pais.nombrePai')
                                       ->join('pais' , 'pais.id' , '=' , 'departamentos.idPais')
                                       ->where('departamentos.id','=', $id)
                                       ->get();

      $paises = Pais::select('nombrePai','id')->get();

      return view('Avicol/Departamento/update', compact('departamentos','paises','departamentospais'));
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
            'nombreDep.required' => 'El campo Nombre del Departamento es obligatorio',
            'nombreDep.alpha' => 'El campo Nombre del Departamento solo permite letras',
            'idPais.required' => 'Es obligatorio seleccionar un Pais',
        ];
        $rules = [
            'nombreDep' => 'required|alpha',
            'idPais' => 'required',
        ];
        $this->validate($request, $rules , $messages);

      $departamentos = Departamento::find($id);

      $departamentos->update($request->all());

      return redirect('departamentos');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      $departamentos = Departamento::find($id)->delete();

      return back()->with('info', 'Eliminado correctamente');
    }

    public function search(Request $request)
    {
      $departamentos = Departamento::select('departamentos.nombreDep','pais.nombrePai')
                                    ->join('pais', 'pais.id', '=', 'departamentos.idPais')
                                    ->where('nombreDep','like','%'.$request->buscar.'%')
                                    ->orWhere('nombrePai','like','%'.$request->buscar.'%')
                                    ->paginate();

      return \View::make('Avicol/Departamento/list', compact('departamentos'));
    }
}
