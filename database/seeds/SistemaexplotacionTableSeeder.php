<?php

use Illuminate\Database\Seeder;
use App\Models\Sistemaexplotacion as Sistemaexplotacion;

class SistemaexplotacionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      Sistemaexplotacion::create([
        'nombreSis' => 'Piso',
        'modulopSis' => 'Ponedoras',
        'modulorSis' => 'Reproductoras',
        'modulopeSis' => 'Pollo Engorde',
        'modulolSis' => 'Laboratorio Huevo',
      ]);
      Sistemaexplotacion::create([
        'nombreSis' => 'Jaula',
        'modulopSis' => 'Ponedoras',
        'modulorSis' => 'Reproductoras',
        'modulopeSis' => 'Pollo Engorde',
        'modulolSis' => 'Laboratorio Huevo',
      ]);
    }
}
