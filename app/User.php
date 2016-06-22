<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;

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
   
    public function rol()
    {

        return $this -> belongsToMany('App\Rol' , 'roles_personas' , 'users_id' , 'roles_id');
    }

    public function equipo()
    {
        return $this -> belongsToMany('App\Equipo' , 'integrantes_equipos' , 'users_id' , 'equipos_id');
    }
    public function torneo()
    {
        return $this -> belongsToMany('App\Torneo' , 'personas_torneos' , 'users_id' , 'torneos_id');
    }

}
