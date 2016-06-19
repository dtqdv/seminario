<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateColoresEquipos extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('colores_equipos', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->string('valor' , 45);
            $table->integer('equipos_id')->unsigned();
            $table->foreign('equipos_id')->references('id')->on('equipos');
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('colores_equipos');
    }
}
