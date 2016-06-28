<?php 
namespace App\Dtqdv;
use App\Equipo as Equipo;
/**
* 
*/
class CrearTorneo
{
	
	private function __construct()
	{
		# code...
	}

	public static function parsearEquipos($data)
	{
		$equiposData = [
			'nombre' => null , 
			'representante_id' => null ,
			'representante_email' => null , 
			'jugadores' => []
		];
		$equipos = [];
		foreach ($data['nombre_equipo'] as $idxEquipo => $equipo) {

			$equiposData['nombre'] = $equipo;
			$equiposData['representante_email'] = $data['representantes_email'][$idxEquipo];
			$equiposData['representante_id'] = $data['representantes_id'][$idxEquipo];
			$arrayNombreJugadores = 'jugador_nombre_equipo'.$idxEquipo;
			$arrayApellidoJugadores = 'jugador_apellido_equipo'.$idxEquipo;

			foreach ($data[$arrayNombreJugadores] as $idxnombre => $nombrejugador) {
				$apellido = $data[$arrayApellidoJugadores][$idxnombre];
				$equiposData['jugadores'][$idxnombre] = ['nombre' => $nombrejugador , 'apellido' => $apellido];
			}
			
			$equipos[] = $equiposData;
		}

		return $equipos;
	}

	static private function generateInsert($data , $idTorneo)
	{
		$length = count($data);
		$insert = [];
		for ($i=1; $i < $length; $i++) { 
			$insert = [
				'torneos_id' => $idTorneo , 
				'nombre' => $data[$i]['nombre']
			];
		}
		Equipo::insert($insert);
	}

	static public function insertEquipos($equiposParseados , $idTorneo)
	{	
		$length = count($equiposParseados);
		if($equiposParseados > 1){
			$idEquipo = Equipo::create([
				'torneos_id' => $idTorneo , 
				'nombre' => $equiposParseados[0]['nombre'] 
			]);
			Self::generateInsert($equiposParseados , $idTorneo);

			return $idEquipo;
		}
	}	


}