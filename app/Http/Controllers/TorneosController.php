<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth as Auth;
use App\Http\Requests;
use App\Dtqdv\CrearTorneo as CrearTorneo;
use App\Dtqdv\VerTorneos as VerTorneos;
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
        $torneos = Torneo::getTorneosFromUser($user['id']);
        return view('sections.torneos-user' , compact('user' , 'section' , 'torneos'));
    }

    public function showOne($idTorneo)
    {   
        $user = Auth::User()->toArray();
        $torneo = Torneo::getOne($idTorneo , $user['id']) -> toArray();
        $teams = Equipo::getEquipos($idTorneo);
        $integrantes = User::players();
        $equipos = VerTorneos::armarEquipos($teams , $integrantes);
        $countEquipos = VerTorneos::countEquipos($equipos);
        return view('sections.torneos-editar' , compact('torneo' , 'equipos' , 'user' , 'countEquipos'));

    }
    public function eliminar($id)
    {
        return $id;
        //return $request -> input('id');

    }
    public function actualizar(Request $request)
    {
        $user = Auth::User()->toArray();
        $dataTorneo= [
            'nombre' => $request -> input('nombre') ,
            'precio_inscripcion' => $request -> input('precio_inscripcion') ,
            'sexo' => $request -> input('sexo') ,
            'categoria' => $request -> input('categoria') ,
            'lugar' => $request -> input('lugar') ,
            'num_cancha' => $request -> input('cancha') ,
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
        
        //defino las reglas de validacion estaticas , todos los mensajes de error y los datos estaticos que llegan

        //proceso todas las reglas y datos dinamicos        
        $reglas = CrearTorneo::generarValidaciones($reglas , $request -> input());
        $dataTorneo = CrearTorneo::generarDataValidaciones($dataTorneo , $request -> input());
        $equiposCount = CrearTorneo::contarEquipos($request -> input());

        
        //proceso todas las reglas y datos dinamicos        

        //ejecuto el validador
        $validator = Validator::make($dataTorneo , $reglas , $messages);
        //ejecuto el validador

        //evaluo si los datos no son validos
        if($validator -> fails())
        {
           return redirect()-> back() -> withInput($request -> input())->with('equipos' , $equiposCount)->withErrors($validator);
        }
        //evaluo si los datos no son validos
        
        //parseo equipos
        $equipos = CrearTorneo::parse($request -> input());

        $check = Torneo::with('persona') -> where('id' , $request -> input('id_torneo')) -> limit(1) -> get() -> toArray();
        if(!empty($check)){
            
            if($check[0]['persona'][0]['id'] == $user['id']){
                \DB::beginTransaction();
                try {

            
                    $torneoActualizado = Torneo::where('id' , $request -> input('id_torneo')) -> update([
                    'nombre' => $request -> input('nombre') ,
                    'precio_inscripcion' => $request -> input('precio_inscripcion') ,
                    'sexo' => $request -> input('sexo') ,
                    'categoria' => $request -> input('categoria') ,
                    'lugar' => $request -> input('lugar') ,
                    'num_cancha' => $request -> input('cancha') ,
                    'fecha_inicio' => $request -> input('fecha_inicio') ,
                    'min_equipos' => $request -> input('min_equipos') ,
                    'max_equipos' => $request -> input('max_equipos')                 
                    ]);
                    
                    \DB::commit();
                      return redirect('/torneos/'.$request -> input('id_torneo'))->withInput($request -> input())->with('exito' , true);
                    return 'exito';
                } catch (Exception $e) {
                    \DB::rollback();
                    return redirect('/torneos/'.$request -> input('id_torneo'))->withInput($request -> input())->with('error_consulta' , true);
                }
            }else{
                return redirect('/torneos/'.$request -> input('id_torneo'))->withInput($request -> input())->with('error_integridad' , true);
            }            
        }else{
            return redirect() -> back() ->withInput($request -> input())->with('error_torneo' , true);
        }



    }
    public function Add(Request $request)
    {
        //obtengo el usuario
    	$user = Auth::User()->toArray();
        //obtengo el usuario

        //defino las reglas de validacion estaticas , todos los mensajes de error y los datos estaticos que llegan
        $dataTorneo= [
            'nombre' => $request -> input('nombre') ,
            'precio_inscripcion' => $request -> input('precio_inscripcion') ,
            'sexo' => $request -> input('sexo') ,
            'categoria' => $request -> input('categoria') ,
            'lugar' => $request -> input('lugar') ,
            'num_cancha' => $request -> input('cancha') ,
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
            'num_cancha' => 'required|numeric' ,
            'fecha_inicio' => 'required|date' ,
            'min_equipos' => 'required|numeric' ,
            'max_equipos' => 'required|numeric' 
        ];
        //defino las reglas de validacion estaticas , todos los mensajes de error y los datos estaticos que llegan

        //proceso todas las reglas y datos dinamicos        
        $reglas = CrearTorneo::generarValidaciones($reglas , $request -> input());
        $dataTorneo = CrearTorneo::generarDataValidaciones($dataTorneo , $request -> input());
        $equiposCount = CrearTorneo::contarEquipos($request -> input());
        
        //proceso todas las reglas y datos dinamicos        

        //ejecuto el validador
        $validator = Validator::make($dataTorneo , $reglas , $messages);
        //ejecuto el validador
       
        //evaluo si los datos no son validos
        if($validator -> fails())
        {
           return redirect('/crear-torneo')->withInput($request -> input())->with('equipos' , $equiposCount)->withErrors($validator);
        }
        //evaluo si los datos no son validos
        
        //parseo equipos
        $equipos = CrearTorneo::parse($request -> input());
        //parseo equipos
        
        \DB::beginTransaction();
        //creo el torneo
        try {
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
        //creo el torneo

        
        //guardo a que persona le pertenece el torneo
        Personas_torneos::create([
            'users_id' => $user['id'] , 
            'torneos_id' => $id_torneo
        ]);
        //guardo a que persona le pertenece el torneo
        
                
        foreach ($equipos as $key => $value) {
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
                $torneoName = str_replace(' ', '_', $request -> input('nombre'));
                $idJugador = User::create([
                    'nombre' => $torneoName , 
                    'apellido' =>  $value['nombre'],
                    'email' => $value['nombre'].'_'.$torneoName.'_'.$id_equipo.'@gmail.com' ,
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
                        $idjugadorAnonimo = User::create([
                            'nombre' => $valueJugador['nombre'] ,
                            'apellido' => $valueJugador['apellido'] ,
                            'email' => time().$keyJugador.'@gmail.com' ,
                            'sexo' => $request -> input('sexo') ,
                            'estado' => 'no-activado' 
                        ])->id;
                        //asigno cada uno de estos jugadores al rol 'anonimo'
                        Rol_persona::create([
                            'users_id' => $idjugadorAnonimo ,
                            'roles_id' => 6
                        ]);                        
                        //los asigno a los anonimos al equipo actual
                        Integrante_equipo::create([
                            'users_id' => $idjugadorAnonimo ,
                            'equipos_id' =>$id_equipo
                        ]);            
                    }
                }
            
        }
            \DB::commit();
            return redirect('/mis_torneos');           
        } catch (Exception $e) {
            \DB::rollback();
            dd($e);
        }

       }
}
