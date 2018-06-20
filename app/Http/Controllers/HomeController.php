<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User as Usuario;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $usuarios = Usuario::select('estados.nombreEst','users.id')
                         ->join('estados', 'estados.id', '=', 'users.idEstado')
                         ->where('users.id','=', \Auth::user()->id)
                         ->get();

     foreach ($usuarios as $usuario) {
       if ($usuario->nombreEst == 'Activo') {
         return view('home');
       }else {
         abort('405');
       }
     }
    }
}
