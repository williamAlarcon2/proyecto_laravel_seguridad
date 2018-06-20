<?php

use Illuminate\Database\Seeder;

use App\Models\Tipoestado as Tipoestado;

class TipoestadoTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      Tipoestado::create([
          'nombreTip'          => 'General'
      ]);

      Tipoestado::create([
          'nombreTip'          => 'ponedoras'
      ]);

      //Modificado por William
      Tipoestado::create([
          'id'                 => 3,
          'nombreTip'          => 'Usuarios'
      ]);

      Tipoestado::create([
          'id'                 => 4,
          'nombreTip'          => 'Sesiones'
      ]);
    }
}
