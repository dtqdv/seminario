<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Integrante_equipo extends Model
{
    protected $table = 'integrantes_equipos';
    protected $fillable = ['users_id' , 'equipos_id' , 'numero'];


}
