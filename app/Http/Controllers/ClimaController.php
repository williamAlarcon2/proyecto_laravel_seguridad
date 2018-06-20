<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Clima as Clima;

class ClimaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $climas = Clima::select('climas.*')
                      ->paginate(20);

      return view('Avicol/Clima/list', compact('climas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Avicol/Clima/create');
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
            'nombreCli.required' => 'El campo Nombre Clima es obligatorio',
            'nombreCli.alpha' => 'El campo Nombre Clima solo permite letras',
        ];
        $rules = [
            'nombreCli' => 'required|alpha',
        ];

        $this->validate($request, $rules , $messages);

        $climas = new Clima;
        $climas->create($request->all());

        return redirect('climas');
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
      $climas = Clima::find($id);

      return view('Avicol/Clima/update', compact('climas'));
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
            'nombreCli.required' => 'El campo Nombre Clima es obligatorio',
            'nombreCli.alpha' => 'El campo Nombre Clima solo permite letras',
        ];
        $rules = [
            'nombreCli' => 'required|alpha',
        ];

        $this->validate($request, $rules , $messages);

      $climas = Clima::find($id);

      $climas->update($request->all());

      return redirect('climas');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      $climas = Clima::find($id)->delete();

      return back()->with('info', 'Eliminado correctamente');
    }

    public function search(Request $request)
    {
      $climas = Clima::where('nombreCli','like','%'.$request->buscar.'%')->paginate();

      return \View::make('Avicol/Clima/list', compact('climas'));
    }
}
