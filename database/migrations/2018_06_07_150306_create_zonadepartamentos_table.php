<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateZonadepartamentosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('zonadepartamentos', function (Blueprint $table) {
            $table->increments('id');
            $table->Integer('idZona')->unsigned();
            $table->foreign('idZona')->references('id')->on('zonas');
            $table->Integer('idDepartamento')->unsigned();
            $table->foreign('idDepartamento')->references('id')->on('departamentos');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('zonadepartamentos');
    }
}
