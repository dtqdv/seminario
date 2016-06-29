<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Equipo extends Model
{
    protected $table = 'equipos';
    protected $fillable = ['nombre' , 'escudo' , 'torneos_id' , 'saldo'];

    public function colores()
    {
    	return $this -> hasMany('App\Color_equipo' , 'equipos_id' , 'id');
    }
    
    /*public function equipo()
    {
    	return $this -> belongsToMany();
    }*/
    public function integrantes()
    {
        return $this -> belongsToMany('App\User' , 'integrantes_equipos' , 'equipos_id' , 'users_id');
    }

    public function torneo()
    {
        return $this -> belongsTo('App\Torneo' , 'equipos_id' , 'id');
    }


}
