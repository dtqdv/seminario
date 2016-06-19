<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Torneo extends Model
{
	protected $table = 'torneos';
    protected $fillable = ['nombre' , 'descripcion' , 'lugar' , 'logo' , 'facebook' , 'instagram' , 'twitter' , 'precio_inscripcion' , 'precio_partido' , 'min_equipos' , 'max_equipos'];


    public function persona()
    {
        return $this -> belongsToMany('App\User' , 'personas_torneos' , 'torneos_id' , 'users_id');
    }

}
