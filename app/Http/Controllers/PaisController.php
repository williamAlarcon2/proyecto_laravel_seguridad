<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Pais as Pais;

class PaisController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $paises = Pais::select('pais.*')
                    ->paginate(20);

      return view('Avicol/Pais/list', compact('paises'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Avicol/Pais/create');
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
            'nombrePai.required' => 'El campo Nombre es obligatorio',
            'nombrePai.alpha' => 'El campo Nombre Pais solo permite letras',
            'nombrePai.unique' => 'El pais ingresado ya se encuentra registrado',
        ];
        $rules = [
            'nombrePai' => 'required|alpha|unique:pais',
        ];

        $this->validate($request, $rules , $messages);
      $paises = new Pais;
      $paises->create($request->all());

      return redirect('paises');
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
      $paises = Pais::find($id);

      return view('Avicol/Pais/update', compact('paises'));
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
            'nombrePai.required' => 'El campo Nombre es obligatorio',
            'nombrePai.alpha' => 'El campo Nombre Pais solo permite letras',
        ];
        $rules = [
            'nombrePai' => 'required|alpha',
        ];

        $this->validate($request, $rules , $messages);

      $paises = Pais::find($id);

      $paises->update($request->all());

      return redirect('paises');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      $paises = Pais::find($id)->delete();

      return back()->with('info', 'Eliminado correctamente');
    }

    public function search(Request $request)
    {
      $paises = Pais::where('nombrePai','like','%'.$request->buscar.'%')->paginate();

      return \View::make('Avicol/Pais/list', compact('paises'));
    }
}
