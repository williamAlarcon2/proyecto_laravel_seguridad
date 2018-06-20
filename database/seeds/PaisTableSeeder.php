<?php

use Illuminate\Database\Seeder;
use App\Models\Pais as Pais;

class PaisTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      Pais::create([
        'nombrePai' => 'Colombia',
      ]);
      Pais::create([
        'nombrePai' => 'Peru',
      ]);
      Pais::create([
        'nombrePai' => 'Ecuador',
      ]);
    }
}
