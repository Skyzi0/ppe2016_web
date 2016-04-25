<?php
shuffle($inscription);
/*var_dump($inscription);
for($i = 0; $i < sizeof($inscription); $i = $i+2){
	setMatch($idTournoi, $inscription[$i], $inscription[$i+1]);
}*/
$matchTournois = getMatchsByTournament($idTournoi);
$tailleTournois = $tournoi->getUsers();
var_dump($inscription);

$idMatch = $matchTournois[0]->getId();
for ($i=0; $i < sizeof($inscription); $i = $i+2) { 
	setJoueursFight($idMatch,$inscription[$i],$inscription[$i+1]);
	$idMatch ++;
}
?>