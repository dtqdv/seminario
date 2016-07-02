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

	public static function pushValidationRulesTeams($rules , $rulesTeams)
	{
		foreach ($rulesTeams as $key => $value) {
			foreach ($value as $idx => $rule) {
				$rules[$idx] = $rule;
			}
		}

		return $rules;
	}

	public static function generateValidationRulesTeams($input)
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
		return $rules;

	}

	public static function generateCountEquiposJugadores($input)
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

}