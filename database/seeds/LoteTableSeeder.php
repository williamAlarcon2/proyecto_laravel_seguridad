<?php

use Illuminate\Database\Seeder;
use App\Models\Lote as Lote;

class LoteTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      Lote::create([
        'nombreLot' => '001',
        'pollitasLot' => '1000',
        'encasetamientoLot' => '2018-06-06',
        'encLot' => '2018-06-06',
        'idVariedad' => 1,
        'idGranja' => 1,
        'idSistema' => 1,
        'idEstado' => 5,
      ]);
      Lote::create([
        'nombreLot' => '002',
        'pollitasLot' => '2000',
        'encasetamientoLot' => '2018-07-07',
        'encLot' => '2018-07-07',
        'idVariedad' => 1,
        'idGranja' => 2,
        'idSistema' => 1,
        'idEstado' => 5,
      ]);
      Lote::create([
        'nombreLot' => '003',
        'pollitasLot' => '3000',
        'encasetamientoLot' => '2018-07-05',
        'encLot' => '2018-07-05',
        'idVariedad' => 2,
        'idGranja' => 3,
        'idSistema' => 2,
        'idEstado' => 5,
      ]);
      Lote::create([
        'nombreLot' => '004',
        'pollitasLot' => '4000',
        'encasetamientoLot' => '2018-07-04',
        'encLot' => '2018-07-04',
        'idVariedad' => 2,
        'idGranja' => 3,
        'idSistema' => 2,
        'idEstado' => 5,
      ]);
      Lote::create([
        'nombreLot' => '005',
        'pollitasLot' => '5000',
        'encasetamientoLot' => '2018-07-03',
        'encLot' => '2018-07-03',
        'idVariedad' => 1,
        'idGranja' => 1,
        'idSistema' => 1,
        'idEstado' => 5,
      ]);
    }
}
