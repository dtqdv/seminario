<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTorneosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('torneos', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->string('nombre' , 45);
            $table->text('descripcion')->nullable();
            $table->string('lugar' , 90);
            $table->string('logo' , 45)->nullable();
            $table->string('facebook' , 65)->nullable();
            $table->string('twitter' , 65)->nullable();
            $table->string('instagram' , 65)->nullable();
            $table->smallInteger('precio_inscripcion')->nullable();
            $table->smallInteger('precio_partido')->nullable();
            $table->enum('sexo' , ['F' , 'M']);
            $table->enum('categoria' , ['+18' , '+30' , 'libre' , 'sub-18']);
            $table->date('fecha_inicio');
            $table->tinyInteger('num_cancha'); 
            $table->tinyInteger('min_equipos');
            $table->tinyInteger('max_equipos');
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
        Schema::drop('torneos');
    }
}
