<?php

use Illuminate\Database\Seeder;
use App\Equipo as Equipo;
use Faker\Factory as Faker;
class EquiposTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $equipos = ['Los borbotones' , 'Los magios' , 'Los isotopos de Springfield' , 'Chicago FC'];
        $faker = Faker::create();
        for ($i=0; $i < 4; $i++) { 
        	Equipo::create([
        		'nombre' => $equipos[$i] ,
        		'escudo' => 'escudo.jpg' ,
        		'saldo' => $faker -> numberBetween($min = (-300), $max = 0) , 
        		'torneos_id' => 1
        	]);
        }
    }
}
