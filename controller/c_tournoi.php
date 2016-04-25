<?php 

    require_once('model/m_tournament.php');
    require_once('class/c.collection.php');

    if(isset($_GET['id'])){
        $tournoi = getTournoiByID($_GET['id']);
        $matchs = $tournoi -> getlistMatch();
        include('view/afficheTournois.php');
    } else {
        include('index.php');
    };
?>