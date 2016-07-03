<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Personas_torneos extends Model
{
    protected $table = 'personas_torneos';
    protected $fillable = ['users_id' , 'torneos_id'];
    
}
