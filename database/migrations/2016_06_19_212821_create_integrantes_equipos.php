<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateIntegrantesEquipos extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('integrantes_equipos', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->integer('users_id')->unsigned();
            $table->integer('equipos_id')->unsigned();
            $table->foreign('users_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('equipos_id')->references('id')->on('equipos')->onDelete('cascade');
            $table->tinyInteger('numero')->nullable();
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
        Schema::drop('integrantes_equipos');
    }
}
