<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Caffeinated\Shinobi\Models\Role as Rol;
use App\User as Usuario;
use App\Models\Estado as Estado;

class UsuarioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = Usuario::select('estados.nombreEst','roles.name as nomRol','users.*')
                        ->join('estados', 'estados.id', '=', 'users.idEstado')
                        ->leftjoin('role_user', 'role_user.user_id', '=', 'users.id')
                        ->leftjoin('roles', 'roles.id', '=', 'role_user.role_id')
                        ->where('idEstado', '=', 1)
                        ->paginate(20);

        return view('Seguridad/Usuarios/list', compact('users'));
    }

    public function indexInactivo()
    {
        $users = Usuario::select('roles.name as nomRol','users.*')
                        ->leftjoin('role_user', 'role_user.user_id', '=', 'users.id')
                        ->leftjoin('roles', 'roles.id', '=', 'role_user.role_id')
                        ->where('idEstado', '=', 2)
                        ->paginate(20);

        return view('Seguridad/Usuarios/listinactivo', compact('users'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function create()
    {
        $estados = Estado::select('nombreEst','id')->get();

        $roles = Rol::select('name','id')->get();

        return view('Seguridad/Usuarios/create', compact('estados','roles'));
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
            'nomUsuario.required' => 'El campo Nombre Usuario es obligatorio',
            'corUsuario.required' => 'El campo Correo Usuario es obligatorio',
            'corUsuario.email' => 'El correo ingresado no es valido: "example@example.com"',
            'corUsuario.unique' => 'El correo ingresado ya se encuentra registrado',
            'password.required' => 'El campo Contraseña Usuario es obligatorio',
            'password.min' => 'La contraseña debe tener minimo 6 caracteres',
            'password.max' => 'La contraseña debe tener maximo 15 caracteres',
            'roles.required' => 'Es obligatorio seleccionar un Rol',
        ];
        $rules = [
            'nomUsuario' => 'required',
            'corUsuario' => 'required|unique:users|email',
            'password' => 'required|min:6|max:15',
            'roles' => 'required',
        ];

        $this->validate($request, $rules , $messages);

        $usuario = new Usuario;
        $usuario->nomUsuario = $request->nomUsuario;
        $usuario->corUsuario = $request->corUsuario;
        $usuario->password = bcrypt($request->password);
        $usuario->idEstado = 1;
        $usuario->save();
        $usuario->roles()->sync($request->get('roles'));

        return redirect('usuarios');
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
        $user = Usuario::find($id);

        $roles = Rol::select('name','id')->get();

        $usuariosrol = Usuario::select('users.*','roles.name','role_user.role_id')
                              ->leftjoin('role_user', 'role_user.user_id', '=', 'users.id')
                              ->leftjoin('roles', 'roles.id', '=', 'role_user.role_id')
                              ->where('users.id','=', $id)
                              ->get();

        return view('Seguridad/Usuarios/update', compact('user', 'roles','usuariosrol'));
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
            'nomUsuario.required' => 'El campo Nombre Usuario es obligatorio',
            'corUsuario.required' => 'El campo Correo Usuario es obligatorio',
            'corUsuario.email' => 'El correo ingresado no es valido: "example@example.com"',
            'password.min' => 'La contraseña debe tener minimo 6 caracteres',
            'password.max' => 'La contraseña debe tener maximo 15 caracteres',
            'roles.required' => 'Es obligatorio seleccionar un Rol',
        ];
        $rules = [
            'nomUsuario' => 'required',
            'corUsuario' => 'required|email',
            'password' => 'min:6|max:15',
            'roles' => 'required',
        ];

        $this->validate($request, $rules , $messages);

        $usuario = Usuario::find($id);
        $usuario->nomUsuario = $request->nomUsuario;
        $usuario->corUsuario = $request->corUsuario;
        $usuario->password = bcrypt($request->password);
        $usuario->save();
        $usuario->roles()->sync($request->get('roles'));

        return redirect('usuarios');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = Usuario::find($id);
        $user->idEstado = 2;
        $user->save();

        return back()->with('info', 'Usuario Inactivado');
    }

    public function perfilUsuario()
    {
        $perfils = Usuario::select('roles.name as nomRol','users.*')
                        ->leftjoin('role_user', 'role_user.user_id', '=', 'users.id')
                        ->leftjoin('roles', 'roles.id', '=', 'role_user.role_id')
                        ->where('users.id', '=', \Auth::user()->id)
                        ->get();

        return view('perfil', compact('perfils'));
    }
    public function updatePerfil(Request $request, $id)
    {
        //Validaciones
        $messages = [
            'corUsuario.email' => 'El correo ingresado no es valido: "example@example.com"',
        ];
        $rules = [
            'corUsuario' => 'required|email',

        ];

        $this->validate($request, $rules , $messages);

          $user = Usuario::find($id);
          $user->corUsuario = $request->corUsuario;
          $user->password = bcrypt($request->password);
          $user->save();

        return redirect('home');
    }

    public function cambiocontrasena()
    {
        $perfils = Usuario::select('roles.name as nomRol','users.*')
                        ->leftjoin('role_user', 'role_user.user_id', '=', 'users.id')
                        ->leftjoin('roles', 'roles.id', '=', 'role_user.role_id')
                        ->where('users.id', '=', \Auth::user()->id)
                        ->get();

        return view('cambiocontrasena', compact('perfils'));
    }
    public function updatecontrasena(Request $request, $id)
    {
        //Validaciones
        $messages = [
              'password.required' => 'El campo Contraseña es obligatorio',
              'password.min' => 'La contraseña debe tener minimo 6 caracteres',
              'password.max' => 'La contraseña debe tener maximo 15 caracteres',
              'password_confirmation.required' => 'El campo Confirmar Contraseña es obligatorio',
        ];
        $rules = [
              'password' => 'required|min:6|max:15|confirmed',
              'password_confirmation' => 'required',

        ];

        $this->validate($request, $rules , $messages);

          $user = Usuario::find($id);
          $user->password = bcrypt($request->password);
          $user->save();

        return redirect('home');


    }
}
