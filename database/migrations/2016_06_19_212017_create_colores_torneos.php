<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateColoresTorneos extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('colores_torneos', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->integer('torneos_id')->unsigned();
            $table->foreign('torneos_id')->references('id')->on('torneos');
            $table->string('valor' , 45);
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
        Schema::drop('colores_torneos');
    }
}
