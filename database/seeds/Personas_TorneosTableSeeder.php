<?php

use Illuminate\Database\Seeder;
use App\Personas_torneos as Personas_torneos;
use Faker\Factory as Faker;
class Personas_TorneosTableSeeder extends Seeder
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
         	Personas_torneos::create([
         		'torneos_id' => $faker  -> numberBetween($min = 1 , $max = 10) ,
         		'users_id' => $faker -> numberBetween($min = 1, $max = 20)
         	]);
         } 
    }
}
