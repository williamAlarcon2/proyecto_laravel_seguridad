<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSistemaexplotacionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sistemaexplotacions', function (Blueprint $table) {
            $table->increments('id');
            $table->String('nombreSis');
            $table->String('modulopSis')->nullable();
            $table->String('modulorSis')->nullable();
            $table->String('modulopeSis')->nullable();
            $table->String('modulolSis')->nullable();
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
        Schema::dropIfExists('sistemaexplotacions');
    }
}
