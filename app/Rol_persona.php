<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Rol_persona extends Model
{
    protected $table = 'roles_personas';
    protected $fillable = ['roles_id' , 'users_id'];


}
