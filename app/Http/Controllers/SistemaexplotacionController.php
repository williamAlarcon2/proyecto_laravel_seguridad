<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Sistemaexplotacion as Sistemaexplotacion;

class SistemaexplotacionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $sistemaexplotaciones = Sistemaexplotacion::select('sistemaexplotacions.*')
                                      ->paginate(20);

      return view('Avicol/SistemaExplotacion/list', compact('sistemaexplotaciones'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Avicol/SistemaExplotacion/create');
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
            'nombreSis.required' => 'El campo Nombre de Sistema de Explotación es obligatorio',
        ];
        $rules = [
            'nombreSis' => 'required',
        ];

        $this->validate($request, $rules , $messages);

      $sistemaexplotaciones = new Sistemaexplotacion;
      $sistemaexplotaciones->nombreSis = $request->nombreSis;
      $sistemaexplotaciones->modulopSis = $request->modulopSis;
      $sistemaexplotaciones->modulorSis = $request->modulorSis;
      $sistemaexplotaciones->modulopeSis = $request->modulopeSis;
      $sistemaexplotaciones->modulolSis = $request->modulolSis;
      $sistemaexplotaciones->save();

      return redirect('sistemaexplotaciones');
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
      $sistemaexplotaciones = Sistemaexplotacion::find($id);

      return view('Avicol/SistemaExplotacion/update', compact('sistemaexplotaciones'));
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
            'nombreSis.required' => 'El campo Nombre de Sistema de Explotación es obligatorio',
        ];
        $rules = [
            'nombreSis' => 'required',
        ];

        $this->validate($request, $rules , $messages);

      $sistemaexplotaciones = Sistemaexplotacion::find($id);
      $sistemaexplotaciones->nombreSis = $request->nombreSis;
      $sistemaexplotaciones->modulopSis = $request->modulopSis;
      $sistemaexplotaciones->modulorSis = $request->modulorSis;
      $sistemaexplotaciones->modulopeSis = $request->modulopeSis;
      $sistemaexplotaciones->modulolSis = $request->modulolSis;
      $sistemaexplotaciones->save();

      return redirect('sistemaexplotaciones');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      $sistemaexplotaciones = Sistemaexplotacion::find($id)->delete();

      return back()->with('info', 'Eliminado correctamente');
    }

    public function search(Request $request)
    {
      $sistemaexplotaciones = Sistemaexplotacion::where('nombreSis','like','%'.$request->buscar.'%')
                                                ->orWhere('modulopSis','like','%'.$request->buscar.'%')
                                                ->orWhere('modulorSis','like','%'.$request->buscar.'%')
                                                ->orWhere('modulopeSis','like','%'.$request->buscar.'%')
                                                ->orWhere('modulolSis','like','%'.$request->buscar.'%')
                                                ->paginate();

      return \View::make('Avicol/SistemaExplotacion/list', compact('sistemaexplotaciones'));
    }
}
