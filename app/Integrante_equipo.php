<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes as SoftDeletes;

class Integrante_equipo extends Model
{
	use SoftDeletes;
    protected $table = 'integrantes_equipos';
    protected $fillable = ['users_id' , 'equipos_id' , 'numero'];


}
