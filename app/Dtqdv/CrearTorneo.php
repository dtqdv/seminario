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

	static private function pushValidationRulesTeams($rules , $rulesTeams)
	{
		foreach ($rulesTeams as $key => $value) {
			foreach ($value as $idx => $rule) {
				$rules[$idx] = $rule;
			}
		}

		return $rules;
	}

	static public function generarValidaciones($rulesDefault , $input)
	{
		$counterTeams = 0;
		$statusTeams = true;
		$nameTeam = 'nombre_equipo_';
		$nameRepresentante = 'representantes_email_equipo_';
		$rules = [];
		while ($statusTeams == true) {
			if(array_key_exists($nameTeam.$counterTeams , $input) && array_key_exists($nameRepresentante.$counterTeams , $input)){
				$counterPlayers = 0;
				$statusPlayers = true;
				$rules[$counterTeams][$nameTeam.$counterTeams] = 'required';
				$rules[$counterTeams][$nameRepresentante.$counterTeams] = 'required';
				while ($statusPlayers == true) {
					if(array_key_exists('jugador_'.$counterPlayers.'_nombre_equipo_'.$counterTeams , $input) && array_key_exists('jugador_'.$counterPlayers.'_apellido_equipo_'.$counterTeams , $input)){
						$rules[$counterTeams]['jugador_'.$counterPlayers.'_nombre_equipo_'.$counterTeams] = 'required';
						$rules[$counterTeams]['jugador_'.$counterPlayers.'_apellido_equipo_'.$counterTeams] = 'required';
						$counterPlayers = $counterPlayers + 1;
					
					}else{
						$statusPlayers = false;
					}
				
				}

				$counterTeams = $counterTeams + 1;
			}else{
				$statusTeams = false;
			}
		}
		return Self::pushValidationRulesTeams($rulesDefault , $rules);

	}

	static public function generarDataValidaciones($dataDefault , $input)
	{
		$counterTeams = 0;
		$statusTeams = true;
		$nameTeam = 'nombre_equipo_';
		$nameRepresentante = 'representantes_email_equipo_';
		$dataNew = $dataDefault;
		while ($statusTeams == true) {
			if(array_key_exists($nameTeam.$counterTeams , $input) && array_key_exists($nameRepresentante.$counterTeams , $input)){
				$counterPlayers = 0;
				$statusPlayers = true;
				$dataNew[$nameTeam.$counterTeams] = $input[$nameTeam.$counterTeams];
				$dataNew[$nameRepresentante.$counterTeams] = $input[$nameRepresentante.$counterTeams];
				while ($statusPlayers == true) {
					if(array_key_exists('jugador_'.$counterPlayers.'_nombre_equipo_'.$counterTeams , $input) && array_key_exists('jugador_'.$counterPlayers.'_apellido_equipo_'.$counterTeams , $input)){
						
						$dataNew['jugador_'.$counterPlayers.'_nombre_equipo_'.$counterTeams] = $input['jugador_'.$counterPlayers.'_nombre_equipo_'.$counterTeams];
						$dataNew['jugador_'.$counterPlayers.'_apellido_equipo_'.$counterTeams] = $input['jugador_'.$counterPlayers.'_apellido_equipo_'.$counterTeams];

						$counterPlayers = $counterPlayers + 1;
					
					}else{
						$statusPlayers = false;
					}
				
				}

				$counterTeams = $counterTeams + 1;
			}else{
				$statusTeams = false;
			}
		}
		return $dataNew;			
	}

	static public function contarEquipos($input)
	{
		$equipos = [];
		$counterTeams = 0;
		$statusTeams = true;
		$nameTeam = 'nombre_equipo_';
		while ($statusTeams == true) {
			if(array_key_exists($nameTeam.$counterTeams, $input)){
				$statusPlayers = true;
				$countJugadores = 0;

				while($statusPlayers == true){
					if(array_key_exists('jugador_'.$countJugadores.'_nombre_equipo_'.$counterTeams, $input) && array_key_exists('jugador_'.$countJugadores.'_apellido_equipo_'.$counterTeams, $input)){

						$countJugadores = $countJugadores + 1;
					}else{
						$countJugadores = $countJugadores - 1;
						$equipos[$counterTeams]['jugadores'] = $countJugadores;
						$statusPlayers = false;
					}
					
				}
				$counterTeams = $counterTeams + 1;
			}else{
				$statusTeams = false;
			}
		}
		return $equipos;
	}

	static public function parse($input)
	{
		$statusTeams = true;
		$counterTeams = 0;
		$keyRepresentante = 'representantes_email_equipo_';
		$keyTeams = 'nombre_equipo_';
		$teams = [];
		while ($statusTeams == true) {
			if(array_key_exists($keyTeams.$counterTeams, $input) && array_key_exists($keyRepresentante.$counterTeams, $input)){
				$teams[$counterTeams]['nombre'] = $input[$keyTeams.$counterTeams];
				$teams[$counterTeams]['representante_email'] = $input[$keyRepresentante.$counterTeams];
				if(array_key_exists('id_equipo_'.$counterTeams, $input)){
					$teams[$counterTeams]['id'] = $input['id_equipo_'.$counterTeams];
				}
				$counterJugadores = 0;
				$statusPlayers = true;
				while($statusPlayers == true){
					if(array_key_exists('jugador_'.$counterJugadores.'_nombre_equipo_'.$counterTeams, $input) && array_key_exists('jugador_'.$counterJugadores.'_apellido_equipo_'.$counterTeams, $input)){
						$teams[$counterTeams]['jugadores'][$counterJugadores]['nombre'] = $input['jugador_'.$counterJugadores.'_nombre_equipo_'.$counterTeams];
						$teams[$counterTeams]['jugadores'][$counterJugadores]['apellido'] = $input['jugador_'.$counterJugadores.'_apellido_equipo_'.$counterTeams];
						if(array_key_exists('id_jugador_'.$counterJugadores.'_equipo_'.$counterTeams, $input)){
							$teams[$counterTeams]['jugadores'][$counterJugadores]['id'] = $input['id_jugador_'.$counterJugadores.'_equipo_'.$counterTeams];
						}
						$counterJugadores = $counterJugadores + 1;	
					}else{
						$statusPlayers = false;
					}
				}
				$counterTeams = $counterTeams + 1;
			}else{
				$statusTeams = false;
			}
		}
		return $teams;
	}

}