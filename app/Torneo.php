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
    
    public function equipos()
    {
    	return $this -> hasMany('App\Equipo' , 'torneos_id' , 'id');
    }
    
    static public function getOne($idTorneo , $idUser)
    {
        return Personas_torneos::join('users' , 'users.id' , '=' , 'users_id')->join('torneos' , 'torneos.id' , '=' , 'torneos_id') -> where('users.id',  '=' , $idUser) -> where('torneos.id' , '=' , $idTorneo) -> select('torneos.*') -> limit(1) -> get()[0];
    }

    static public function getTorneosFromUser($id)
    {
        return Personas_torneos::join('users' , 'users.id' , '=' , 'users_id')->join('torneos' , 'torneos.id' , '=' , 'torneos_id') -> where('users.id',  '=' , $id) -> select('torneos.*') -> get() -> toArray();
    }

}
