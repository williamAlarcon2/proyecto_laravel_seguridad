<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEmpresasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('empresas', function (Blueprint $table) {
            $table->increments('id');
            $table->String('nombreEmp');
            $table->String('modulopEmp')->nullable();
            $table->String('modulorEmp')->nullable();
            $table->String('modulopeEmp')->nullable();
            $table->String('modulolEmp')->nullable();
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
        Schema::dropIfExists('empresas');
    }
}
