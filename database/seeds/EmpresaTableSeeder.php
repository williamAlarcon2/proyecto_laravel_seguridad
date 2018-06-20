<?php

use Illuminate\Database\Seeder;
use App\Models\Empresa as Empresa;

class EmpresaTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      Empresa::create([
        'nombreEmp' => 'Campollo',
        'modulopEmp' => 'Ponedoras',
        'modulorEmp' => 'Reproductoras',
        'modulopeEmp' => 'Pollo Engorde',
        'modulolEmp' => 'Laboratorio Huevo',
        'idEstado' => 1,
      ]);
      Empresa::create([
        'nombreEmp' => 'Avicol',
        'modulopEmp' => 'Ponedoras',
        'modulorEmp' => 'Reproductoras',
        'modulopeEmp' => 'Pollo Engorde',
        'modulolEmp' => 'Laboratorio Huevo',
        'idEstado' => 1,
      ]);
      Empresa::create([
        'nombreEmp' => 'MacPollo',
        'modulopEmp' => 'Ponedoras',
        'modulorEmp' => 'Reproductoras',
        'modulopeEmp' => 'Pollo Engorde',
        'modulolEmp' => 'Laboratorio Huevo',
        'idEstado' => 1,
      ]);
    }
}
