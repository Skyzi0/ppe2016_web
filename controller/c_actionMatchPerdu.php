<?php
require_once('model/m_tournament.php');
$idMatch = $_POST['match'];
$leMatch = getUnMatch($idMatch);
$idTournois = $leMatch->getTournoi();
$idJoueur = $_SESSION['id'];
if ($idJoueur == $leMatch->getUserOne()) {
	$vainqueur = $leMatch->getUserTwo();
}
else{
	$vainqueur = $leMatch->getUserOne();
}
setVainqueurMatch($idMatch, $vainqueur);
$tournois = getTournoiByID($idTournois);
if ($leMatch->getId()%2 == 1) {
	$i = 1;
}
else{
	$i = 0;
}
$matchTournois = getFirstIndiceMatch($idTournois)-1;
$idMatchSuivant = $tournois->getUsers()/2 + $matchTournois + ($leMatch->getId()+$i-$matchTournois)/2;
$placeJoueur = $leMatch->getId;
setVainqueurMatchSuivant($idMatchSuivant, $vainqueur, $i);
header("location: index.php?page=tournois&id=".$idTournois);
?>