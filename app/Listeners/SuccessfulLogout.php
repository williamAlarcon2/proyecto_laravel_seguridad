<?php

namespace App\Listeners;

use Illuminate\Auth\Events\Logout;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\Models\Sesiones as Sesiones;
class SuccessfulLogout
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
     * @param  Logout  $event
     * @return void
     */
    public function handle(Logout $event)
    {
        $sesion = new Sesiones();
        $sesion->user_id = auth()->user()->id;
        $sesion->direccion_ip = \Request::ip();
        $sesion->fecha = date('Y-m-d H:i:s');
        $sesion->estado_sesion = 13;
        $sesion->save();     
    }
}
