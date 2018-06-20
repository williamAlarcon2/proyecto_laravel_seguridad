<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Clasificacionhuevo as Clasificacionhuevo;

class ClasificacionhuevoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $clasificacionhuevos = Clasificacionhuevo::select('clasificacionhuevos.*')
                                                ->paginate(20);

      return view('Avicol/ClasificacionHuevo/list', compact('clasificacionhuevos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Avicol/ClasificacionHuevo/create');
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
            'nombreCla.required' => 'El campo Nombre es obligatorio',
            'desdeCla.required' => 'El campo desde es obligatorio',
            'hastaCla.required' => 'El campo hasta es obligatorio',
            'desdeCla.unique' => 'Este rango ya se encuentra en otra clasificacion',
            'hastaCla.unique' => 'Este rango ya se encuentra en otra clasificacion',
        ];
        $rules = [
            'nombreCla' => 'required',
            'desdeCla' => 'required|unique:clasificacionhuevos',
            'hastaCla' => 'required|unique:clasificacionhuevos',
        ];

        $this->validate($request, $rules , $messages);

      $clasificacionhuevos = new Clasificacionhuevo;
      $clasificacionhuevos->create($request->all());

      return redirect('clasificacionhuevos');
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
      $clasificacionhuevos = Clasificacionhuevo::find($id);

      return view('Avicol/ClasificacionHuevo/update', compact('clasificacionhuevos'));
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
            'nombreCla.required' => 'El campo Nombre es obligatorio',
            'desdeCla.required' => 'El campo desde es obligatorio',
            'hastaCla.required' => 'El campo hasta es obligatorio',
            'desdeCla.unique' => 'El rango Desde de esta clasificación ya se encuentra incluido en otra clasificacion',
            'hastaCla.unique' => 'El rango Hasta de esta clasificación ya se encuentra incluido en otra clasificacion',
        ];
        $rules = [
            'nombreCla' => 'required',
            'desdeCla' => 'required|unique:clasificacionhuevos',
            'hastaCla' => 'required|unique:clasificacionhuevos',
        ];

        $this->validate($request, $rules , $messages);

      $clasificacionhuevos = Clasificacionhuevo::find($id);

      $clasificacionhuevos->update($request->all());

      return redirect('clasificacionhuevos');
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
      $clasificacionhuevos = Clasificacionhuevo::where('nombreCla','like','%'.$request->buscar.'%')
                                                ->orWhere('desdeCla','like','%'.$request->buscar.'%')
                                                ->orWhere('hastaCla','like','%'.$request->buscar.'%')
                                                ->paginate();

      return \View::make('Avicol/ClasificacionHuevo/list', compact('clasificacionhuevos'));
    }
}
