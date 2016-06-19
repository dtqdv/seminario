<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nombre' , 40);
            $table->string('apellido' , 40);
            $table->string('email' , 70)->unique();
            $table->string('password' , 60);
            $table->text('descripcion')->nullable();
            $table->enum('sexo' , ['S' , 'M']);
            $table->integer('dni');
            $table->enum('estado' , ['suspendido' , 'baneado' , 'activo']);
            $table->rememberToken();
            $table->timestamps();
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
        Schema::drop('users');
    }
}
