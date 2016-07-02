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
use App\Rol_persona as Rol_persona;
use App\Integrante_equipo as Integrante_equipo;
use Validator;
class TorneosController extends Controller
{
    public function ViewCreate()
    {
    	$user = Auth::User()->toArray();
    	$section = 'Crear Torneo';
    	return view('sections.crear_torneo' , compact('user' , 'section'));
    	
    }
    public function showAll()
    {
        $user = Auth::User()->toArray();
        $section = 'Tus torneos';
        return view('sections.torneos-user' , compact('user' , 'section'));
    }

    public function Add(Request $request)
    {
    	$user = Auth::User()->toArray();
        
        $dataTorneo= [
            'nombre' => $request -> input('nombre') ,
            'precio_inscripcion' => $request -> input('precio_inscripcion') ,
            'sexo' => $request -> input('sexo') ,
            'categoria' => $request -> input('categoria') ,
            'lugar' => $request -> input('lugar') ,
            'cancha' => $request -> input('cancha') ,
            'fecha_inicio' => $request -> input('fecha_inicio') ,
            'min_equipos' => $request -> input('min_equipos') ,
            'max_equipos' => $request -> input('max_equipos') 
        ];

        $messages = [
            'required' => 'El :attribute no puede estar vacio' ,
            'numeric' => 'El :attribute debe ser un numero' ,
            'sexo' => 'El sexo tiene que ser femenino o masculino' ,
            'categoria.in' => 'La categoria tiene que ser +18,+30,libre o sub-20' ,
            'date' => 'Tiene que ser de formato fecha'
        ];
        
        $reglas = [
            'nombre' => 'required' , 
            'precio_inscripcion' => 'required|numeric' ,
            'sexo' => 'required|in:F,M' ,
            'categoria' => 'required|in:+18,+30,libre,sub-20',
            'lugar' => 'required' ,
            'cancha' => 'required|numeric' ,
            'fecha_inicio' => 'required|date' ,
            'min_equipos' => 'required|numeric' ,
            'max_equipos' => 'required|numeric' 
        ];

        $rulesTeams = CrearTorneo::generateValidationRulesTeams($request -> input());
        $reglas = CrearTorneo::pushValidationRulesTeams($reglas , $rulesTeams);
        
        $equipos = CrearTorneo::generateCountEquiposJugadores($request -> input());
        
        $validator = Validator::make($dataTorneo , $reglas , $messages);
        
        //return dd($equipos);
        if($validator -> fails())
        {
           return redirect('/crear-torneo')->withInput($request -> input())->with('equipos' , $equipos);
        }
        /*$id_torneo = Torneo::create([
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
        
        //guardo todos los equipos con sus representantes-jugador , roles de usuarios y integrantes de equipo
        
        foreach ($equiposParseados as $key => $value) {
            //guardo equipo y recupero id
            $id_equipo = Equipo::create([
                'nombre' => $value['nombre'] , 
                'torneos_id' => $id_torneo
            ])->id;
                //guardo representante
                $idRepresentante = User::create([
                    'nombre' => $value['jugadores'][0]['nombre'] ,
                    'apellido' => $value['jugadores'][0]['apellido'] ,
                    'email' => $value['representante_email'] ,
                    'password' => bcrypt('1234'),
                    'sexo' => $request -> input('sexo') ,
                    'estado' => 'activo'
                ]) -> id;
                //guardo que este usuario tenga el rol 'representante'
                Rol_persona::create([
                    'users_id' => $idRepresentante ,
                    'roles_id' => 3
                ]);
                //lo guardo como integrante del equipo actual
                Integrante_equipo::create([
                    'users_id' => $idRepresentante ,
                    'equipos_id' =>$id_equipo
                ]);
                //guardo el tipo de usuario jugador desactivado , lo tiene que activar el representante
                $idJugador = User::create([
                    'nombre' => $value['nombre'] , 
                    'apellido' => 'usuario-jugador' ,
                    'email' => $value['nombre'].'_'.$request -> input('nombre').'@gmail.com' ,
                    'password' => bcrypt('1234') ,
                    'sexo' => $request -> input('sexo') ,
                    'estado' => 'no-activado'
                ])->id;
                //asigno que este jugador es del equipo
                Integrante_equipo::create([
                    'users_id' => $idJugador ,
                    'equipos_id' =>$id_equipo
                ]);
                //le asigno el rol de jugador
                Rol_persona::create([
                    'users_id' => $idJugador ,
                    'roles_id' => 5
                ]);
                foreach ($value['jugadores'] as $keyJugador => $valueJugador) {//recorro todos los jugadores , menos el primero que siempre va a ser el representante
                    if($keyJugador > 0)
                    {
                        $id_jugador = User::create([
                            'nombre' => $valueJugador['nombre'] ,
                            'apellido' => $valueJugador['apellido'] ,
                            'email' => time().$keyJugador.'@gmail.com' ,
                            'sexo' => $request -> input('sexo') ,
                            'estado' => 'no-activado' 
                        ])->id;
                        //asigno cada uno de estos jugadores al rol 'anonimo'
                        Rol_persona::create([
                            'users_id' => $idJugador ,
                            'roles_id' => 6
                        ]);                        
                        //los asigno a los anonimos al equipo actual
                        Integrante_equipo::create([
                            'users_id' => $id_jugador ,
                            'equipos_id' =>$id_equipo
                        ]);            
                    }
                }
            
        }*/
        //guardo torneo
       }
}
