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
            $table->string('email' , 70)->nullable()->unique();
            $table->string('password' , 60)->nullable();
            $table->text('descripcion')->nullable();
            $table->enum('sexo' , ['F' , 'M']);
            $table->integer('dni')->nullable();
            $table->enum('estado' , ['suspendido' , 'baneado' , 'activo' , 'no-activado'])->nullable();
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
