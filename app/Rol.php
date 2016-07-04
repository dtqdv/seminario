<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes as SoftDeletes;

class Rol extends Model
{
	use SoftDeletes;
    protected $table = 'roles';

    protected $fillable = ['valor'];

    public function persona(){

        return $this -> belongsToMany('App\User' , 'roles_personas' , 'roles_id' , 'users_id');
    }
}
