<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePonedoraslevanteSemanalsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ponedoraslevante_semanals', function (Blueprint $table) {
            $table->increments('id');
            $table->String('semanaPle')->nullable();
            $table->String('idsPle')->nullable();
            $table->String('fdsPle')->nullable();
            $table->String('avesmuertasPle')->nullable();
            $table->String('mortalidadPle')->nullable();
            $table->String('seleccionPle')->nullable();
            $table->String('otrosPle')->nullable();
            $table->String('alimentoPle')->nullable();
            $table->String('consumoPle')->nullable();
            $table->String('pesoPle')->nullable();
            $table->String('uniformidadPle')->nullable();
            $table->String('coeficientePle')->nullable();
            $table->String('observacionesPle')->nullable();
            $table->double('kacumPle', 15, 1)->nullable();
            $table->double('acuPle', 15, 0)->nullable();
            $table->double('saldoavesPle', 15, 0)->nullable();
            $table->double('avediarealPle', 15, 1)->nullable();
            $table->double('graveacPle', 15, 1)->nullable();
            $table->double('mortsemPle', 15, 1)->nullable();
            $table->double('mortacuPle', 15, 1)->nullable();
            $table->double('selsemPle', 15, 1)->nullable();
            $table->double('gananciaavediarPle', 15, 0)->nullable();
            $table->double('msacuPle', 15, 1)->nullable();
            $table->double('convsemPle', 15, 3)->nullable();
            $table->double('cumpgananavesemanaPle', 15, 1)->nullable();
            $table->double('cumplconsgradPle', 15, 1)->nullable();
            $table->double('cumplpesoPle', 15, 1)->nullable();
            $table->double('cumplconsumoacmPle', 15, 1)->nullable();
            $table->Integer('idLevante')->unsigned();
            $table->foreign('idLevante')->references('id')->on('ponedoraslevantes');
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
        Schema::dropIfExists('ponedoraslevante_semanals');
    }
}
