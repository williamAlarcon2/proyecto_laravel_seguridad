<?php

use Illuminate\Database\Seeder;
use App\Models\Clima as Clima;

class ClimaTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      Clima::create([
        'nombreCli' => 'Calido',
      ]);

      Clima::create([
        'nombreCli' => 'Frio',
      ]);

      Clima::create([
        'nombreCli' => 'Medio',
      ]);
    }
}
