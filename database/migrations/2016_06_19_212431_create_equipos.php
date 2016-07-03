<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEquipos extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('equipos', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->string('nombre' , 30);
            $table->string('escudo' , 45)->nullable();
            $table->integer('torneos_id')->unsigned();
            $table->foreign('torneos_id')->references('id')->on('torneos')->onDelete('cascade');
            $table->smallInteger('saldo')->nullable();
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
        Schema::drop('equipos');
    }
}
