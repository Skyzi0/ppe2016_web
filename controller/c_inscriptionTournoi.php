<?php 

    require_once('model/m_tournament.php');
    require_once('class/c.collection.php');
    require_once('model/m_user.php');

    if(isset($_GET['id'])){
        $listeJoueur = getInscription($_GET['id']);
        $joueurInscrit = false;
        foreach ($listeJoueur as $joueur) {
        	if (isset($_SESSION['id'])) {
	        	if ($joueur == $_SESSION['id']) {
	        		$joueurInscrit = true;
	        	}
        	}
        }
        $tournoi = getTournoiByID($_GET['id']);
        include('view/afficheInscription.php');
    } 
    else {
        include('index.php');
    };
?>