<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\SoftDeletes as SoftDeletes;
class User extends Authenticatable  
{

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'nombre', 'apellido' , 'email', 'password', 'descripcion' , 'sexo' , 'dni' , 'estado'  
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
    use SoftDeletes;
    
    public function rol()
    {

        return $this -> belongsToMany('App\Rol' , 'roles_personas' , 'users_id' , 'roles_id');
    }

    public function equipo()
    {
        return $this -> belongsToMany('App\Equipo' , 'integrantes_equipos' , 'users_id' , 'equipos_id');
    }

    static public function players()
    {
        return User::join('roles_personas' , 'roles_personas.users_id' , '=' , 'users.id') -> join('integrantes_equipos' , 'integrantes_equipos.users_id' , '=' , 'users.id') -> whereIn('roles_personas.roles_id' , [3 , 6]) -> whereIn('integrantes_equipos.equipos_id' , [1 , 2]) -> get() -> toArray();
    }

}
