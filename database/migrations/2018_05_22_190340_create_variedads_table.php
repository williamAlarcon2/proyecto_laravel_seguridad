<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVariedadsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('variedads', function (Blueprint $table) {
            $table->increments('id');
            $table->String('nombreVar');
            $table->String('modulopVar')->nullable();
            $table->String('modulorVar')->nullable();
            $table->String('modulopeVar')->nullable();
            $table->String('modulolVar')->nullable();
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
        Schema::dropIfExists('variedads');
    }
}
