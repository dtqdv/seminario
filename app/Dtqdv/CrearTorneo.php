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

	static public function parsearEquipos($data)
	{
		$equiposData = [
			'nombre' => null , 
			'representante_email' => null , 
			'jugadores' => []
		];
		$equipos = [];
		foreach ($data['nombre_equipo'] as $idxEquipo => $equipo) {

			$equiposData['nombre'] = $equipo;
			$equiposData['representante_email'] = $data['representantes_email'][$idxEquipo];
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

	


}