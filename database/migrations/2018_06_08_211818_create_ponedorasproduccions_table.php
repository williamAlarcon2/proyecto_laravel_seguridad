<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePonedorasproduccionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ponedorasproduccions', function (Blueprint $table) {
            $table->increments('id');
            $table->String('programaPpr')->nullable();
            $table->String('fotoestimuloPpr')->nullable();
            $table->String('fotoperiodoPpr')->nullable();
            $table->Integer('idLote')->unsigned()->unique();
            $table->foreign('idLote')->references('id')->on('lotes');
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
        Schema::dropIfExists('ponedorasproduccions');
    }
}
