<?php 
	require_once('model/m_tournament.php');
	$listeTournois = getTournoiEnCours();
	$listeTournoisInscription = getTournoiNonFini();
	foreach (getTournoiNonCommence() as $tournoi) {
		array_push($listeTournoisInscription, $tournoi);
	}
	include('view/accueil.php');

?>