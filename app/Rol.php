<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Rol extends Model
{
    protected $table = 'roles';

    protected $fillable = ['valor'];

    public function persona(){

        return $this -> belongsToMany('App\User' , 'roles_personas' , 'roles_id' , 'users_id');
    }
}
