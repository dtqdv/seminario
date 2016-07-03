<?php
namespace app\Dtqdv;

/**
* 
*/
class VerTorneos  
{
	
	private function __construct()
	{
		# code...
	}

	static public function armarEquipos($equipos , $jugadores)
	{
		foreach ($equipos as $key => $value) {
			$equipos[$key]['integrantes'] = [];

			foreach ($jugadores as $keyJ => $valueJ) {
				if($valueJ['equipos_id'] == $equipos[$key]['id']){
					array_push($equipos[$key]['integrantes'], $valueJ);
				}		
			}	
		}
	
		return $equipos;
	}
}