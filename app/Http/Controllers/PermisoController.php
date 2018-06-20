<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Caffeinated\Shinobi\Models\Permission as Permisos;

class PermisoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $permisos = Permisos::select('permissions.*')
                            ->paginate(20);

        return view('Seguridad/Permisos/list', compact('permisos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Seguridad/Permisos/create');
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
            'name.required' => 'El campo Nombre es obligatorio',
            'slug.required' => 'El campo slug es obligatorio',
            'slug.unique' => 'El slug ingresado ya se encuentra registrado',
        ];
        $rules = [
            'name' => 'required',
            'slug' => 'required|unique:permissions',
        ];

        $this->validate($request, $rules , $messages);

        $permisos = new Permisos;

        $permisos->create($request->all());

        return redirect('permisos');
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
      $permisos = Permisos::find($id);

      return view('Seguridad/Permisos/update', compact('permisos'));
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
            'name.required' => 'El campo Nombre es obligatorio',
            'slug.required' => 'El campo slug es obligatorio',
        ];
        $rules = [
            'name' => 'required',
            'slug' => 'required',
        ];

        $this->validate($request, $rules , $messages);

      $permisos = Permisos::find($id);

      $permisos->update($request->all());

      return redirect('permisos');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      $permisos = Permisos::find($id)->delete();

      return back()->with('info', 'Eliminado correctamente');
    }
}
