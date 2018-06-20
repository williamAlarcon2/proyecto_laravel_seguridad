<?php

use Illuminate\Database\Seeder;
use App\Models\Municipio as Municipio;

class MunicipioTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      Municipio::create([
        'nombreMun' => 'Leticia',
        'idDepartamento' => 1,
      ]);
      Municipio::create([
        'nombreMun' => 'Medellín',
        'idDepartamento' => 2,
      ]);
      Municipio::create([
        'nombreMun' => 'Arauca',
        'idDepartamento' => 3,
      ]);
      Municipio::create([
        'nombreMun' => 'Barranquilla',
        'idDepartamento' => 4,
      ]);
      Municipio::create([
        'nombreMun' => 'Cartagena',
        'idDepartamento' => 5,
      ]);
      Municipio::create([
        'nombreMun' => 'Tunja',
        'idDepartamento' => 6,
      ]);
      Municipio::create([
        'nombreMun' => 'Manizales',
        'idDepartamento' => 7,
      ]);
      Municipio::create([
        'nombreMun' => 'Florencia',
        'idDepartamento' => 8,
      ]);
      Municipio::create([
        'nombreMun' => 'Yopal',
        'idDepartamento' => 9,
      ]);
      Municipio::create([
        'nombreMun' => 'Popayán',
        'idDepartamento' => 10,
      ]);
      Municipio::create([
        'nombreMun' => 'Valledupar',
        'idDepartamento' => 11,
      ]);
      Municipio::create([
        'nombreMun' => 'Quibdó',
        'idDepartamento' => 12,
      ]);
      Municipio::create([
        'nombreMun' => 'Montería',
        'idDepartamento' => 13,
      ]);
      Municipio::create([
        'nombreMun' => 'Bogotá',
        'idDepartamento' => 14,
      ]);
      Municipio::create([
        'nombreMun' => 'Puerto Inírida',
        'idDepartamento' => 15,
      ]);
      Municipio::create([
        'nombreMun' => 'San José del Guaviare',
        'idDepartamento' => 16,
      ]);
      Municipio::create([
        'nombreMun' => 'Neiva',
        'idDepartamento' => 17,
      ]);
      Municipio::create([
        'nombreMun' => 'Riohacha',
        'idDepartamento' => 18,
      ]);
      Municipio::create([
        'nombreMun' => 'Santa Marta',
        'idDepartamento' => 19,
      ]);
      Municipio::create([
        'nombreMun' => 'Villavicencio',
        'idDepartamento' => 20,
      ]);
      Municipio::create([
        'nombreMun' => 'Pasto',
        'idDepartamento' => 21,
      ]);
      Municipio::create([
        'nombreMun' => 'Cúcuta',
        'idDepartamento' => 22,
      ]);
      Municipio::create([
        'nombreMun' => 'Mocoa',
        'idDepartamento' => 23,
      ]);
      Municipio::create([
        'nombreMun' => 'Armenia',
        'idDepartamento' => 24,
      ]);
      Municipio::create([
        'nombreMun' => 'Pereira',
        'idDepartamento' => 25,
      ]);
      Municipio::create([
        'nombreMun' => 'San Andres',
        'idDepartamento' => 26,
      ]);
      Municipio::create([
        'nombreMun' => 'Bucaramanga',
        'idDepartamento' => 27,
      ]);
      Municipio::create([
        'nombreMun' => 'Sincelejo',
        'idDepartamento' => 28,
      ]);
      Municipio::create([
        'nombreMun' => 'Ibagué',
        'idDepartamento' => 29,
      ]);
      Municipio::create([
        'nombreMun' => 'Cali',
        'idDepartamento' => 30,
      ]);
      Municipio::create([
        'nombreMun' => 'Mitú',
        'idDepartamento' => 31,
      ]);
      Municipio::create([
        'nombreMun' => 'Puerto Carreño',
        'idDepartamento' => 32,
      ]);
    }
}
