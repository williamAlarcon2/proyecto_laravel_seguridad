<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(PermissionsTableSeeder::class);
        $this->call(UsersTableSeeder::class);
        $this->call(TipoestadoTableSeeder::class);
        $this->call(EstadoTableSeeder::class);
        $this->call(ClasificacionHuevoTableSeeder::class);
        $this->call(ClimaTableSeeder::class);
        $this->call(VariedadTableSeeder::class);
        $this->call(ZonaTableSeeder::class);
        $this->call(SistemaexplotacionTableSeeder::class);
        $this->call(PaisTableSeeder::class);
        $this->call(DepartamentoTableSeeder::class);
        $this->call(MunicipioTableSeeder::class);
        $this->call(EmpresaTableSeeder::class);
        $this->call(GranjaTableSeeder::class);
        $this->call(LoteTableSeeder::class);
        $this->call(GuiaTableSeeder::class);
        $this->call(GuialevanteponedoraTableSeeder::class);
        $this->call(GuiaproduccionTableSeeder::class);
    }
}
