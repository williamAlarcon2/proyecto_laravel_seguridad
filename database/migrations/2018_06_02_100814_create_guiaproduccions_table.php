<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGuiaproduccionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('guiaproduccions', function (Blueprint $table) {
            $table->increments('id');
            $table->String('semanaGup')->nullable();
            $table->String('tbGup')->nullable();
            $table->String('tb1Gup')->nullable();
            $table->String('tb2Gup')->nullable();
            $table->String('real4Gup')->nullable();
            $table->String('tab1Gup')->nullable();
            $table->String('real5Gup')->nullable();
            $table->String('tab2Gup')->nullable();
            $table->String('prodtbGup')->nullable();
            $table->String('haatabGup')->nullable();
            $table->String('grtbGup')->nullable();
            $table->String('pesohuevotablaGup')->nullable();
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
        Schema::dropIfExists('guiaproduccions');
    }
}
