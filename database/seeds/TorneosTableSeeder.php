<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use App\Torneo;
class TorneosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();

        for($i = 0;$i < 10;$i++){
        	App\Torneo::create([
        		'nombre' => $faker -> company ,
        		'descripcion' => $faker -> paragraph($nbSentences = 3, $variableNbSentences = true) ,
        		'lugar' => $faker -> secondaryAddress ,
        		'logo' => $faker -> image($dir = '/tmp', $width = 640, $height = 480)  ,
        		'precio_inscripcion' => $faker -> numberBetween($min = 400, $max = 1000) ,
        		'precio_partido' => $faker -> numberBetween($min = 100, $max = 300) ,
        		'min_equipos' => $faker -> numberBetween($min = 10, $max = 20) ,
        		'max_equipos' => $faker -> numberBetween($min = 25, $max = 40) ,
                'sexo' => $faker -> randomElement(['F' , 'M']) ,
                'categoria' => $faker -> randomElement(['+18' , '+30' , 'sub-18' , 'libre']) ,
                'fecha_inicio' => $faker -> date ,
                'num_cancha' =>  $faker -> numberBetween([5 , 7 , 11 , 9])
        	]);
        }
    }
}
