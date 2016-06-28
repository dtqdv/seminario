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
        $equiposParseados = CrearTorneo::parsearEquipos($request -> input());
        //guardo torneo
    	$id_torneo = Torneo::create([
    		'nombre' => $request -> input('nombre') ,
            'sexo' => $request -> input('sexo') , 
            'precio_inscripcion' => $request -> input('precio_inscripcion') , 
            'categoria' => $request -> input('categoria') , 
    		'lugar' => $request -> input('lugar') ,
            'fecha_inicio' => $request -> input('fecha_inicio') , 
            'num_cancha' => $request -> input('cancha') ,  
    		'min_equipos' => $request -> input('min_equipos') , 
    		'max_equipos' => $request -> input('max_equipos')
    	]) -> id;

        //guardo torneo
    	
        //guardo a que persona le pertenece el torneo
    	
        Personas_torneos::create([
    		'users_id' => $user['id'] , 
    		'torneos_id' => $id_torneo
    	]);
    	
        $primerId = CrearTorneo::insertEquipos($equiposParseados);

        //return $primerId;
        //guardo equipo

       

    }
}
