<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes as SoftDeletes;

class Personas_torneos extends Model
{
	use SoftDeletes;
    protected $table = 'personas_torneos';
    protected $fillable = ['users_id' , 'torneos_id'];
    
}
