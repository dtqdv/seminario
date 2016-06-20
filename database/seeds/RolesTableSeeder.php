<?php

use Illuminate\Database\Seeder;
use App\Rol;
class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	$roles = ['Administrador' , 'Organizador' , 'Jugador' , 'Personalizado'];
    	foreach ($roles as $key => $value) {
    		Rol::create(['valor' => $value]);
    	}
        
    }
}
