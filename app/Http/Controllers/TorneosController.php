<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth as Auth;
use App\Http\Requests;
use App\Dtqdv\CrearTorneo as CrearTorneo;
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
    	$equiposDatabase = CrearTorneo::equiposToDatabase($request -> input() , $id_torneo);
        Equipo::insert($equiposDatabase);


/*
        //guardo usuarios creados
        $equipos = CrearTorneo::parse($request -> input() , $idEquipo);
        $users = CrearTorneo::representantes($equipos);
        foreach ($users as $key => $value) {
            unset($users[$key]['equipos_id']);
            
        }
       
        if(count($users) > 1){
            $insertUsers = User::create($users[0]);
            $idUser = $insertUsers -> id;
            $restoUsers = array_splice($users, 1);
            $restoUsers = User::insert($restoUsers);
        }else{
            $insertUsers = User::create($users);
            $idUser = $insertUsers -> id;
        }

        return 'algo';
        
        //return dd(CrearTorneo::parse($request -> input() , $idEquipo));
        //return dd(CrearTorneo::parse($request -> input()));
        //return dd($request -> input());*/

    }
}
