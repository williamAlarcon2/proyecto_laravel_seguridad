<?php

use Illuminate\Database\Seeder;
use App\Models\Variedad as Variedad;

class VariedadTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      Variedad::create([
        'nombreVar' => 'Ross',
        'modulopVar' => 'Ponedoras',
        'modulorVar' => 'Reproductoras',
        'modulopeVar' => 'Pollo Engorde',
        'modulolVar' => 'Laboratorio Huevo',
      ]);

      Variedad::create([
        'nombreVar' => 'Hyline',
        'modulopVar' => 'Ponedoras',
        'modulorVar' => 'Reproductoras',
        'modulopeVar' => 'Pollo Engorde',
        'modulolVar' => 'Laboratorio Huevo',
      ]);
    }
}
