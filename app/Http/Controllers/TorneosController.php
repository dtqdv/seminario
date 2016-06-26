<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth as Auth;
use App\Http\Requests;
use App\Dtqdv\Equipos_Input as Equipos_Input;
use App\Torneo as Torneo; //1 agrego torneo y guardo id de torneo agregado
use App\Personas_torneos as Personas_torneos; //2 a que persona le pertenece el torneo
use App\Equipo as Equipo;//3 agrego equipos con id de torneo
use App\User as User;  
use App\Rol_Personas as Rol_Personas;
use App\Integrante_equipo as integrantes;

class TorneosController extends Controller
{
    public function ViewCreate()
    {
    	$user = Auth::User()->toArray();
    	$section = 'Crear Torneo';
    	return view('sections.crear_torneo' , compact('user' , 'section'));
    	
    	
    }

    public function Add(Request $request)
    {
    	$user = Auth::User()->toArray();
    	//guardo torneo
    	
        $id_torneo = Torneo::create([
    		'nombre' => $request -> input('nombre') , 
    		'lugar' => $request -> input('lugar') , 
    		'min_equipos' => $request -> input('min_equipos') , 
    		'max_equipos' => $request -> input('max_equipos')
    	]) -> id;

        //guardo torneo
    	
        //guardo a que persona le pertenece el torneo
    	
        Personas_torneos::create([
    		'users_id' => $user['id'] , 
    		'torneos_id' => $id_torneo
    	]);
    	
        //guardo equipo
    	
        //parseo equipos a formato database
    	$equiposDatabase = Equipos_Input::equiposToDatabase($request -> input() , $id_torneo);
        
        if(count($equiposDatabase) > 1){
            //si hay mas de un equipo se inserta primero 1 , se obtiene el id para posterior proceso y despues se insertan todos los demas.
            $insertEquipo = Equipo::create($equiposDatabase[0]);
            $idEquipo = $insertEquipo -> id;
            $restoEquipos = array_splice($equiposDatabase, 1);
            $restoEquipos = Equipo::insert($restoEquipos);
        }else{
            //si es un equipo solo se inserta uno solo
            $insertEquipo = Equipo::create($equiposDatabase);
            $idEquipo = $insertEquipo -> id;
        }

        //guardo usuarios creados
        $equipos = Equipos_Input::parse($request -> input() , $idEquipo);

        
        //return dd(Equipos_Input::parse($request -> input() , $idEquipo));

    }
}
