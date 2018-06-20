<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGuialevanteponedorasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('guialevanteponedoras', function (Blueprint $table) {
            $table->increments('id');
            $table->String('semanaGul')->nullable();
            $table->String('avediatabGul')->nullable();
            $table->String('graveactabGul')->nullable();
            $table->String('pesotabGul')->nullable();
            $table->String('convsemtabGul')->nullable();
            $table->String('gananciaaveriatGul')->nullable();
            $table->Integer('idGuia')->unsigned();
            $table->foreign('idGuia')->references('id')->on('guias');
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
        Schema::dropIfExists('guialevanteponedoras');
    }
}
