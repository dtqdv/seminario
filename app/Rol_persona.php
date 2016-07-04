<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes as SoftDeletes;

class Rol_persona extends Model
{
	use SoftDeletes;
    protected $table = 'roles_personas';
    protected $fillable = ['roles_id' , 'users_id'];


}
