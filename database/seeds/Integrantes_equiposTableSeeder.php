<?php

use Illuminate\Database\Seeder;
use App\Integrante_equipo as Integrante_equipo;
use Faker\Factory as Faker;
class Integrantes_equiposTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();

        for($i = 0;$i<20;$i++){
            Integrante_equipo::create([
                'users_id' => $faker -> unique() -> numberBetween($min = 1, $max = 20) ,
                'equipos_id' => $faker -> numberBetween($min = 1, $max = 4) ,
                'numero' => $faker -> numberBetween($min = 1, $max = 12)
            ]);
        }
    }

}

