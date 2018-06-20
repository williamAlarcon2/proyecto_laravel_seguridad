<?php

use Illuminate\Database\Seeder;
use App\Models\Zona as Zona;

class ZonaTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      Zona::create([
        'nombreZon' => '1',
      ]);
      Zona::create([
        'nombreZon' => '2',
      ]);
      Zona::create([
        'nombreZon' => '3',
      ]);
      Zona::create([
        'nombreZon' => '4',
      ]);
      Zona::create([
        'nombreZon' => '5',
      ]);
      Zona::create([
        'nombreZon' => '6',
      ]);
      Zona::create([
        'nombreZon' => '7',
      ]);
      Zona::create([
        'nombreZon' => '8',
      ]);
      Zona::create([
        'nombreZon' => '9',
      ]);
      Zona::create([
        'nombreZon' => '10',
      ]);
    }
}
