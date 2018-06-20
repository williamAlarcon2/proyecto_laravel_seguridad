<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Empresa as Empresa;

use App\Models\Estado as Estado;

class EmpresaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $empresas = Empresa::select('estados.nombreEst','empresas.*')
                          ->join('estados', 'estados.id', '=', 'empresas.idEstado')
                          ->paginate(20);

      return view('Avicol/Empresa/list', compact('empresas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      $estados = Estado::select('nombreEst','estados.id')
                        ->join('tipoestados', 'tipoestados.id', '=', 'estados.idTipoEstado')
                        ->where('tipoestados.nombreTip', '=', 'General')
                        ->get();

      return view('Avicol/Empresa/create', compact('estados'));
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
            'nombreEmp.required' => 'El campo Nombre es obligatorio',
            'nombreEmp.unique' => 'El nombre ingresado ya se encuentra registrado',
        ];
        $rules = [
            'nombreEmp' => 'required|unique:empresas',
        ];

        $this->validate($request, $rules , $messages);

      $empresas = new Empresa;
      $empresas->nombreEmp = $request->nombreEmp;
      $empresas->modulopEmp = $request->modulopEmp;
      $empresas->modulorEmp = $request->modulorEmp;
      $empresas->modulopeEmp = $request->modulopeEmp;
      $empresas->modulolEmp = $request->modulolEmp;
      $empresas->idEstado = 1;
      $empresas->save();

      return redirect('empresas');
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
      $empresas = Empresa::find($id);

      $empresasestado = Empresa::select('empresas.*','estados.nombreEst')
                               ->join('estados' , 'estados.id' , '=' , 'empresas.idEstado')
                               ->where('empresas.id','=', $id)
                               ->get();

       $estados = Estado::select('nombreEst','estados.id')
                         ->join('tipoestados', 'tipoestados.id', '=', 'estados.idTipoEstado')
                         ->where('tipoestados.nombreTip', '=', 'General')
                         ->get();

      return view('Avicol/Empresa/update', compact('empresas','estados','empresasestado'));
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
            'nombreEmp.required' => 'El campo Nombre es obligatorio',
            'idEstado.required' => 'Es obligatorio seleccionar un Estado',
        ];
        $rules = [
            'nombreEmp' => 'required',
            'idEstado' => 'required',
        ];
         $this->validate($request, $rules , $messages);

          $empresas = Empresa::find($id);
          $empresas->nombreEmp = $request->nombreEmp;
          $empresas->idEstado = $request->idEstado;
          $empresas->modulopEmp = $request->modulopEmp;
          $empresas->modulorEmp = $request->modulorEmp;
          $empresas->modulopeEmp = $request->modulopeEmp;
          $empresas->modulolEmp = $request->modulolEmp;
          $empresas->save();
      return redirect('empresas');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      $empresas = Empresa::find($id)->delete();

      return back()->with('info', 'Eliminado correctamente');
    }

    public function search(Request $request)
    {
      $empresas = Empresa::select('empresas.nombreEmp','estados.nombreEst')
                          ->join('estados', 'estados.id', '=', 'empresas.idEstado')
                          ->where('nombreEmp','like','%'.$request->buscar.'%')
                          ->orWhere('nombreEst','like','%'.$request->buscar.'%')
                          ->orWhere('modulopEmp','like','%'.$request->buscar.'%')
                          ->orWhere('modulorEmp','like','%'.$request->buscar.'%')
                          ->orWhere('modulopeEmp','like','%'.$request->buscar.'%')
                          ->orWhere('modulolEmp','like','%'.$request->buscar.'%')
                          ->paginate();

      return \View::make('Avicol/Empresa/list', compact('empresas'));
    }
}
