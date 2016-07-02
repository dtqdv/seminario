<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Personas_torneos extends Model
{
    protected $table = 'personas_torneos';
    protected $fillable = ['users_id' , 'torneos_id'];
    public static function getTorneosFromUser($id)
    {
    	return Personas_torneos::join('users' , 'users.id' , '=' , 'users_id')->join('torneos' , 'torneos.id' , '=' , 'torneos_id') -> where('users.id',  '=' , $id) -> select('torneos.*') -> get() -> toArray();
    }
}
