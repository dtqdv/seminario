<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Color_torneo extends Model
{
    protected $table = 'colores_torneos';
    protected $fillable = ['valor' , 'torneos_id'];

    
}
