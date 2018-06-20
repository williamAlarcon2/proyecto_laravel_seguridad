<?php

use Illuminate\Database\Seeder;

use App\Models\Estado as Estado;

class EstadoTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      Estado::create([
          'nombreEst' => 'Activo',
          'idTipoEstado' => 1,
      ]);

      Estado::create([
          'nombreEst' => 'Inactivo',
          'idTipoEstado' => 1,
      ]);

      Estado::create([
          'nombreEst'          => 'Levante',
          'idTipoEstado' => 2,
      ]);

      Estado::create([
          'nombreEst'          => 'Produccion',
          'idTipoEstado' => 2,
      ]);

      Estado::create([
          'nombreEst' => 'Inicial',
          'idTipoEstado' => 2,
      ]);

      Estado::create([
          'nombreEst' => 'En Produccion',
          'idTipoEstado' => 2,
      ]);

      Estado::create([
          'nombreEst' => 'Produccion Finalizada',
          'idTipoEstado' => 2,
      ]);

      //Modificado por William
      Estado::create([
          'nombreEst' => 'Activo',
          'idTipoEstado' => 3,
      ]);

      Estado::create([
          'nombreEst' => 'Suspendido',
          'idTipoEstado' => 3,
      ]);

      Estado::create([
          'nombreEst' => 'Bloqueado',
          'idTipoEstado' => 3,
      ]);

      Estado::create([
          'nombreEst' => 'Eliminado',
          'idTipoEstado' => 3,
      ]);

      Estado::create([
          'nombreEst' => 'Sesion Iniciada',
          'idTipoEstado' => 4,
      ]);

      Estado::create([
          'nombreEst' => 'Sesion Finalizada',
          'idTipoEstado' => 4,
      ]);
    }
}
