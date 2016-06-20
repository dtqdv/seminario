<?php

use Illuminate\Database\Seeder;
use App\User as User;
use Faker\Factory as Faker;
class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	$faker = Faker::create();
        for ($i=0; $i < 20; $i++) {

        	User::create([
        		'nombre' => $faker -> name ,
        		'apellido' => $faker -> lastName ,
        		'email' => $faker -> unique() -> email ,
        		'password' => $faker -> password ,
        		'descripcion' => $faker -> paragraph ,
        		'dni' => $faker -> numberBetween($min = 20000000, $max = 60000000),
        		'sexo' => $faker -> randomElement(array('M','F')) , 
        		'estado' => $faker -> randomElement(array('suspendido','baneado','activo'))
        	]);
        }
    }
}
