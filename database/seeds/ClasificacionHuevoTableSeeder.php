<?php

use Illuminate\Database\Seeder;
use App\Models\Clasificacionhuevo as ClasificacionHuevo;

class ClasificacionHuevoTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        ClasificacionHuevo::create([
          'nombreCla' => 'Jumbo',
          'desdeCla' => '72.6',
          'hastaCla' => 'Mayores de 72.6',
      	]);

     	ClasificacionHuevo::create([
          'nombreCla' => 'Extra/AAA',
          'desdeCla' => '63.6',
          'hastaCla' => '72.5',
      	]);

      	ClasificacionHuevo::create([
          'nombreCla' => 'AA',
          'desdeCla' => '56.6',
          'hastaCla' => '63.5',
      	]);

      	ClasificacionHuevo::create([
          'nombreCla' => 'A',
          'desdeCla' => '49.6',
          'hastaCla' => '56.5',
      	]);

      	ClasificacionHuevo::create([
          'nombreCla' => 'B',
          'desdeCla' => '44.1',
          'hastaCla' => '49.5',
      	]);

      	ClasificacionHuevo::create([
          'nombreCla' => 'C',
          'desdeCla' => '41.1',
          'hastaCla' => '40.0',
      	]);

      	ClasificacionHuevo::create([
          'nombreCla' => 'Pipo',
          'desdeCla' => 'Inferiores de 41.0',
          'hastaCla' => '41.0',
      	]);
    }
}
