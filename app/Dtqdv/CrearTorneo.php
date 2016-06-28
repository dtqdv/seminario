<?php 
namespace App\Dtqdv;

/**
* 
*/
class CrearTorneo
{
	
	private function __construct()
	{
		# code...
	}

	static public function parse($data , $id = null)
	{
		$equipos = [];
		$c = 0;
		foreach ($data['equipo_nombre'] as $keyEquipo => $valueEquipo) {
			
			//creo array modelo para retornar con nombre de equipo , jugadores y representante 
			$equipos[$keyEquipo] = ['nombre' => null , 'jugadores' => [] , 'representante_id' => null , 'id' => null , 'representante_email'];
			//le pongo el nombre de equipo 
			$equipos[$keyEquipo] = ['nombre' => $valueEquipo];
			//saco el array correspondiente a la iteracion actual para los jugadores
			$indexJugadores = 'equipo'.$keyEquipo.'_jugador';
			if($id != null && $c < 1){
				$equipos[$keyEquipo]['id'] = $id;
			}else if($id != null && $c > 0){
				$equipos[$keyEquipo]['id'] = $id + $c;
			} 
			foreach ($data[$indexJugadores] as $keyJugador => $valueJugador) {
				//recorro los jugadores y los pongo en el equipo actual
				$equipos[$keyEquipo]['jugadores'][$keyJugador] = $valueJugador;
			}
			//saco el array correspondiente a la iteracion actual para los representantes
			$id_representante = 'equipo'.$keyEquipo.'_representante_id';
			$email_representante = 'equipo'.$keyEquipo.'_representante_email';
			//pongo el representante correspondiente a este equipo
			$equipos[$keyEquipo]['representante_id'] = $data[$id_representante];
			$equipos[$keyEquipo]['email_representante'] = $data[$email_representante];
			$c++;
		}

		//devuelvo el array completo y ordenado
		return $equipos;
	}

	static public function EquiposToDatabase($data , $id = null)
	{
		$equipos = Self::parse($data);
		foreach ($equipos as $key => $value) {
			if($id != null){
				$equipostoreturn[] = [
					'nombre' => $value['nombre'] , 
					'torneos_id' => $id , 
					'updated_at'=> date('Y-m-d H:i:s') , 
					'created_at' => date('Y-m-d H:i:s')
				];				
			}else{
			$equipostoreturn[] = [
				'nombre' => $value['nombre'] , 
				'updated_at'=> date('Y-m-d H:i:s') , 
				'created_at' => date('Y-m-d H:i:s')
			];				
			}

		}
		return $equipostoreturn;
	}

	static public function representantes($equipos)
	{
		$users = [];
		foreach ($equipos as $key => $value) {
			$users[] = [
				'email' => $value['email_representante'] ,
				'password' => bcrypt('1234') ,
				'nombre' => 'algo' ,
				'apellido' => 'algo' ,
				'sexo' => 'F' , 
				'dni' => 231231 , 
				'equipos_id' => $value['id'] 
			];
		}

		return $users;
	}
}