<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateZonamunicipiosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('zonamunicipios', function (Blueprint $table) {
            $table->increments('id');
            $table->Integer('idZona')->unsigned();
            $table->foreign('idZona')->references('id')->on('zonas');
            $table->Integer('idMunicipio')->unsigned();
            $table->foreign('idMunicipio')->references('id')->on('municipios');
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
        Schema::dropIfExists('zonamunicipios');
    }
}
