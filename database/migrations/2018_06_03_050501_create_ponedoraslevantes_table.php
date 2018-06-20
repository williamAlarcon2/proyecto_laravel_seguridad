<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePonedoraslevantesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ponedoraslevantes', function (Blueprint $table) {
            $table->increments('id');
            $table->String('programaPle')->nullable();
            $table->String('fotoPle')->nullable();
            $table->String('despiquePle')->nullable();
            $table->String('trasladoPle')->nullable();
            $table->date('inicioluzPle')->nullable();
            $table->date('finluzPle')->nullable();
            $table->Integer('idLote')->unsigned()->unique()->nullable();
            $table->foreign('idLote')->references('id')->on('lotes');
            $table->Integer('idGuia')->unsigned();
            $table->foreign('idGuia')->references('id')->on('guias');
            $table->Integer('idSublote')->unsigned()->nullable();
            $table->foreign('idSublote')->references('id')->on('sublotes');
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
        Schema::dropIfExists('ponedoraslevantes');
    }
}
