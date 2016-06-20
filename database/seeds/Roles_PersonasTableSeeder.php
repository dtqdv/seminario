<?php

use Illuminate\Database\Seeder;
use App\Persona;
use Faker\Factory as Faker;
class Roles_PersonasTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();
        for($i = 0;$i < 20; $i++){
            App\Rol_persona::create([
                'roles_id' => $faker -> numberBetween($min = 1, $max = 4),
                'users_id' => $faker -> numberBetween($min = 1, $max = 20)
            ]);
        }
    }
}
