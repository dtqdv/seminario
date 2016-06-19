<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Color_equipo extends Model
{
    protected $table = 'colores_equipos';
    protected $fillable = ['valor' , 'equipos_id'];

	public function equipo()
	{
		return $this -> belongsTo('App\Equipo' , 'equipos_id' , 'id');
	}

}
