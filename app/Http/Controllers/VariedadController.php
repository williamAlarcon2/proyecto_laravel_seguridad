<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Variedad as Variedad;

class VariedadController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $variedades = Variedad::select('variedads.*')
                            ->paginate(20);

      return view('Avicol/Variedad/list', compact('variedades'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Avicol/Variedad/create');
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
            'nombreVar.required' => 'El campo Nombre es obligatorio',
        ];
        $rules = [
            'nombreVar' => 'required',
        ];

        $this->validate($request, $rules , $messages);

      $variedades = new Variedad;
      $variedades->nombreVar = $request->nombreVar;
      $variedades->modulopVar = $request->modulopVar;
      $variedades->modulorVar = $request->modulorVar;
      $variedades->modulopeVar = $request->modulopeVar;
      $variedades->modulolVar = $request->modulolVar;
      $variedades->save();

      return redirect('variedades');
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
      $variedades = Variedad::find($id);

      return view('Avicol/Variedad/update', compact('variedades'));
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
            'nombreVar.required' => 'El campo Nombre es obligatorio',
        ];
        $rules = [
            'nombreVar' => 'required',
        ];

        $this->validate($request, $rules , $messages);

      $variedades = Variedad::find($id);
      $variedades->nombreVar = $request->nombreVar;
      $variedades->modulopVar = $request->modulopVar;
      $variedades->modulorVar = $request->modulorVar;
      $variedades->modulopeVar = $request->modulopeVar;
      $variedades->modulolVar = $request->modulolVar;
      $variedades->save();

      return redirect('variedades');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      $variedades = Variedad::find($id)->delete();

      return back()->with('info', 'Eliminado correctamente');
    }

    public function search(Request $request)
    {
      $variedades = Variedad::where('nombreVar','like','%'.$request->buscar.'%')
                            ->orWhere('modulopVar','like','%'.$request->buscar.'%')
                            ->orWhere('modulorVar','like','%'.$request->buscar.'%')
                            ->orWhere('modulopeVar','like','%'.$request->buscar.'%')
                            ->orWhere('modulolVar','like','%'.$request->buscar.'%')
                            ->paginate();

      return \View::make('Avicol/Variedad/list', compact('variedades'));
    }
}
