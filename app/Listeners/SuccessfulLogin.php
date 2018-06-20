<?php

namespace App\Listeners;

use Illuminate\Http\Request;
use Illuminate\Auth\Events\Login;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\Models\Sesiones as Sesiones;

class SuccessfulLogin
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  Login  $event
     * @return void
     */
    public function handle(Login $event)
    {
        $sesion = new Sesiones();
        $sesion->user_id = auth()->user()->id;
        $sesion->direccion_ip = \Request::ip();
        $sesion->fecha = date('Y-m-d H:i:s');
        $sesion->estado_sesion = 12;
        $sesion->save();       
    }
}
