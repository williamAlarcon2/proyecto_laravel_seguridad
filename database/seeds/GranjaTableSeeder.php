<?php

use Illuminate\Database\Seeder;
use App\Models\Granja as Granja;

class GranjaTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      Granja::create([
        'nombreGra' => 'El triunfo',
        'alturaGra' => '1000',
        'modulopGra' => 'Ponedoras',
        'modulorGra' => 'Reproductoras',
        'modulopeGra' => 'Pollo Engorde',
        'modulolGra' => 'Laboratorio Huevo',
        'idZona' => 1,
        'idEmpresa' => 1,
        'idMunicipio' => 1,
        'idClima' => 1,
        'idEstado' => 1,
      ]);
      Granja::create([
        'nombreGra' => 'Napoles',
        'alturaGra' => '2000',
        'modulopGra' => 'Ponedoras',
        'modulorGra' => 'Reproductoras',
        'modulopeGra' => 'Pollo Engorde',
        'modulolGra' => 'Laboratorio Huevo',
        'idZona' => 2,
        'idEmpresa' => 2,
        'idMunicipio' => 2,
        'idClima' => 2,
        'idEstado' => 1,
      ]);
      Granja::create([
        'nombreGra' => 'Panaca',
        'alturaGra' => '3000',
        'modulopGra' => 'Ponedoras',
        'modulorGra' => 'Reproductoras',
        'modulopeGra' => 'Pollo Engorde',
        'modulolGra' => 'Laboratorio Huevo',
        'idZona' => 3,
        'idEmpresa' => 3,
        'idMunicipio' => 3,
        'idClima' => 3,
        'idEstado' => 1,
      ]);
    }
}
