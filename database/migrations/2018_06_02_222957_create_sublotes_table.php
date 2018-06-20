<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSublotesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sublotes', function (Blueprint $table) {
            $table->increments('id');
            $table->String('nombreSub')->nullable();
            $table->String('pollitasSub')->nullable();
            $table->Integer('idSistema')->unsigned()->nullable();
            $table->foreign('idSistema')->references('id')->on('sistemaexplotacions');
            $table->Integer('idLote')->unsigned()->nullable();
            $table->foreign('idLote')->references('id')->on('lotes');
            $table->Integer('idEstado')->unsigned()->nullable();
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
        Schema::dropIfExists('sublotes');
    }
}
