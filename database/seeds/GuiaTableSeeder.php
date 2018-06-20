<?php

use Illuminate\Database\Seeder;

use App\Models\Guia as Guia;

class GuiaTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      Guia::create([
          'nombreGui' => 'Levante Ponedoras',
          'moduloGui' => 'Ponedoras Levante',
      ]);
      Guia::create([
          'nombreGui' => 'Produccion Ponedoras',
          'moduloGui' => 'Ponedoras Produccion',
      ]);
    }
}
