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

	


}