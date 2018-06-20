<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Caffeinated\Shinobi\Models\Role as Rol;
use Caffeinated\Shinobi\Models\Permission;

class RolesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $roles = Rol::paginate(20);

        return view('Seguridad/Roles/list', compact('roles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $permissions = Permission::get();

        return view('Seguridad/Roles/create', compact('permissions'));
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
            'name.required' => 'El campo Nombre del Rol es obligatorio',
            'name.unique' => 'El nombre del rol ingresado ya se encuentra registrado',
        ];
        $rules = [
            'name' => 'required|unique:roles',
        ];

        $this->validate($request, $rules , $messages);

        $role = new Rol;
        $role->name = $request->name;
        $role->slug = $request->name;
        $role->description = $request->description;
        $role->save();

        $role->permissions()->sync($request->get('permissions'));

        return redirect('roles');
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
        $role = Rol::find($id);

        $permissions = Permission::get();

        return view('Seguridad/Roles/update', compact('role', 'permissions'));
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
            'name.required' => 'El campo Nombre del Rol es obligatorio',
        ];
        $rules = [
            'name' => 'required',
        ];

        $this->validate($request, $rules , $messages);

        $role = Rol::find($id);
        $role->name = $request->name;
        $role->slug = $request->name;
        $role->description = $request->description;
        $role->save();
        
        $role->permissions()->sync($request->get('permissions'));

        return redirect('roles');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $role = Rol::find($id)->delete();

        return back()->with('info', 'Eliminado correctamente');
    }
}
