<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGranjasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('granjas', function (Blueprint $table) {
            $table->increments('id');
            $table->String('nombreGra');
            $table->String('alturaGra');
            $table->String('modulopGra')->nullable();
            $table->String('modulorGra')->nullable();
            $table->String('modulopeGra')->nullable();
            $table->String('modulolGra')->nullable();
            $table->Integer('idZona')->unsigned();
            $table->foreign('idZona')->references('id')->on('zonas');
            $table->Integer('idEmpresa')->unsigned();
            $table->foreign('idEmpresa')->references('id')->on('empresas');
            $table->Integer('idMunicipio')->unsigned();
            $table->foreign('idMunicipio')->references('id')->on('municipios');
            $table->Integer('idClima')->unsigned();
            $table->foreign('idClima')->references('id')->on('climas');
            $table->Integer('idEstado')->unsigned();
            $table->foreign('idEstado')->references('id')->on('estados');
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
        Schema::dropIfExists('granjas');
    }
}
