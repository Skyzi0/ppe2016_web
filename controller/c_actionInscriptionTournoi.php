<?php
require_once('model/m_tournament.php');
if(isset($_GET['id'])){
    $idTournoi = $_GET['id'];
    $idJoueur = $_SESSION['id'];
    setInscription($idTournoi,$idJoueur);
    $tournoi = getTournoiByID($idTournoi);
    $inscription = getInscription($idTournoi);
    //var_dump($inscription);
    if (sizeof($inscription) == $tournoi->getUsers()) {
		include('c_actionSetJoueursMatch.php');
    }
    //header('location: index.php');
} 
else {
    include('index.php');
};
?>