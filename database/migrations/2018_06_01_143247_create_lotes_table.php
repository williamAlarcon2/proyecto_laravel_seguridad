<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLotesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lotes', function (Blueprint $table) {
            $table->increments('id');
            $table->String('nombreLot');
            $table->String('pollitasLot');
            $table->date('encasetamientoLot');
            $table->Integer('idVariedad')->unsigned();
            $table->foreign('idVariedad')->references('id')->on('variedads');
            $table->Integer('idGranja')->unsigned();
            $table->foreign('idGranja')->references('id')->on('granjas');
            $table->Integer('idSistema')->unsigned();
            $table->foreign('idSistema')->references('id')->on('sistemaexplotacions');
            $table->Integer('idEstado')->unsigned();
            $table->foreign('idEstado')->references('id')->on('estados');
            $table->Integer('idEstadoC')->unsigned()->nullable();
            $table->foreign('idEstadoC')->references('id')->on('estados');
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
        Schema::dropIfExists('lotes');
    }
}
