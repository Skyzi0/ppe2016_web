<?php
    require_once('model.php');
    require_once('class/c.tournoi.php');
    require_once('class/c.match.php');
    require_once('m_user.php');
    $connexion = BDDConnexionPDO();


    // Récupère la liste des Tournois - Retourne une Collection de Tournois
    function getTournoi(){
        $req = "SELECT * FROM tournoi";
        $ex = $GLOBALS['connexion'] -> query($req);
        $listTour = new Collection(); // Collection de Tournois
        
        while($donnees = $ex -> fetch(PDO::FETCH_ASSOC)){ // Créations d'Objets Tournois et Ajout à la liste de Tournois
            $tournoi = new Tournoi($donnees['idTournoi'], $donnees['nomTournoi'], $donnees['nombreParticipantMax'], getMatchsByTournament($donnees['idTournoi']), $donnees['description']);
            $listTour -> ajouter($tournoi);
        }
        return $listTour -> getCollection();
    }

    
    // Récupère un tournoi par ID - Retourne un Objet Tournoi
    function getTournoiByID($idTournoi){
        $req = "SELECT * FROM tournoi WHERE idTournoi = ".$idTournoi;
        $ex = $GLOBALS['connexion'] -> query($req);
        
        $donnees = $ex -> fetch(PDO::FETCH_ASSOC);
        $tournoi = new Tournoi($donnees['idTournoi'], $donnees['nomTournoi'], $donnees['nombreParticipantMax'], getMatchsByTournament($donnees['idTournoi']), $donnees['description']);
        
        return $tournoi;
    }

    // Récupère un tournoi par ID - Retourne un Objet Tournoi
    function getTournoiNonFini(){
        $req = "SELECT * from tournoi where idTournoi in (SELECT idTournoi from inscription i group by idTournoi having count(idUtilisateur) < (select nombreParticipantMax from tournoi t where t.idTournoi = i.idTournoi))";
        $ex = $GLOBALS['connexion'] -> query($req);
        
        $listTour = new Collection(); // Collection de Tournois
        
        while($donnees = $ex -> fetch(PDO::FETCH_ASSOC)){ // Créations d'Objets Tournois et Ajout à la liste de Tournois
            $tournoi = new Tournoi($donnees['idTournoi'], $donnees['nomTournoi'], $donnees['nombreParticipantMax'], getMatchsByTournament($donnees['idTournoi']), $donnees['description']);
            $listTour -> ajouter($tournoi);
        }
        return $listTour -> getCollection();
    }

    function getTournoiNonCommence(){
        $req = "SELECT * FROM `tournoi` where idTournoi not in (select distinct idTournoi from inscription)";
        $ex = $GLOBALS['connexion'] -> query($req);
        
        $listTour = new Collection(); // Collection de Tournois
        
        while($donnees = $ex -> fetch(PDO::FETCH_ASSOC)){ // Créations d'Objets Tournois et Ajout à la liste de Tournois
            $tournoi = new Tournoi($donnees['idTournoi'], $donnees['nomTournoi'], $donnees['nombreParticipantMax'], getMatchsByTournament($donnees['idTournoi']), $donnees['description']);
            $listTour -> ajouter($tournoi);
        }
        return $listTour -> getCollection();
    }

    function getTournoiEnCours(){
        $req = "SELECT * from tournoi where idTournoi in (SELECT idTournoi from inscription i group by idTournoi having count(idUtilisateur) = (select nombreParticipantMax from tournoi t where t.idTournoi = i.idTournoi))";
        $ex = $GLOBALS['connexion'] -> query($req);
        
        $listTour = new Collection(); // Collection de Tournois
        
        while($donnees = $ex -> fetch(PDO::FETCH_ASSOC)){ // Créations d'Objets Tournois et Ajout à la liste de Tournois
            $tournoi = new Tournoi($donnees['idTournoi'], $donnees['nomTournoi'], $donnees['nombreParticipantMax'], getMatchsByTournament($donnees['idTournoi']), $donnees['description']);
            $listTour -> ajouter($tournoi);
        }
        return $listTour -> getCollection();
    }


    // Récupère l'indice de la dernière ronde du tournoi - Retourne un entier
    function getLastIndice($idTournoi){
        $req = "SELECT MAX(typeMatch) FROM fight WHERE idTournoi = ".$idTournoi;
        $ex = $GLOBALS['connexion'] -> query($req);
        $donnees = $ex -> fetch(PDO::FETCH_ASSOC);
        $indice = intval($donnees['MAX(typeMatch)']);
        return $indice;
    }

    function getFirstIndiceMatch($idTournoi){
        $req = "SELECT MIN(idMatch) FROM fight WHERE idTournoi = ".$idTournoi;
        $ex = $GLOBALS['connexion'] -> query($req);
        $donnees = $ex -> fetch(PDO::FETCH_ASSOC);
        $indice = intval($donnees['MIN(idMatch)']);
        return $indice;
    }


    function getMatchsByTournament($idTournoi){
        $req = "SELECT * FROM fight
                        WHERE idTournoi = ".$idTournoi;
        $ex = $GLOBALS['connexion'] -> query($req);
        $listMatch = new Collection();
        while($donnees = $ex -> fetch(PDO::FETCH_ASSOC)){
            $match = new Match($donnees['idMatch'], $donnees['idTournoi'], $donnees['typeMatch'], $donnees['idJoueurUn'], $donnees['idJoueurDeux'], $donnees['idGagnant']);
            $listMatch -> ajouter($match);
        }
    return $listMatch -> getCollection();
    }

    function getUnMatch($idMatch){
        $req = "SELECT * FROM fight where idMatch =".$idMatch;
        $ex = $GLOBALS['connexion'] -> query($req);
        
        $donnees = $ex -> fetch(PDO::FETCH_ASSOC);
        $match = new Match($donnees['idMatch'], $donnees['idTournoi'], $donnees['typeMatch'], $donnees['idJoueurUn'], $donnees['idJoueurDeux'], $donnees['idGagnant']);
        
        return $match;
    }

    // Récupère la liste des matchs en fonction d'un tournoi et d'une phase - Retourne une Collection de Matchs
    function getMatch($idTournoi, $typeMatch){
        $req = "SELECT * FROM fight
                WHERE idTournoi = ".$idTournoi."
                AND typeMatch = ".$typeMatch;
        $ex = $GLOBALS['connexion'] -> query($req);
        $listMatch = new Collection();
        while($donnees = $ex -> fetch(PDO::FETCH_ASSOC)){
            $match = new Match($donnees['idMatch'], $donnees['idTournoi'], $donnees['typeMatch'], $donnees['idJoueurUn'], $donnees['idJoueurDeux'], $donnees['idGagnant']);
            $listMatch -> ajouter($match);
        }
        return $listMatch -> getCollection();
    }

    function getInscription($idTournoi){
        $req = "SELECT * FROM inscription WHERE idTournoi = ".$idTournoi;
        $ex = $GLOBALS['connexion'] -> query($req);
        $listInscrit = new Collection();
        while($donnees = $ex -> fetch(PDO::FETCH_ASSOC)){
            $inscrit = $donnees['idUtilisateur'];
            $listInscrit -> ajouter($inscrit);
        }
        return $listInscrit -> getCollection();
    }

    function setVainqueurMatch($idMatch, $idJoueur){
        $req = "UPDATE `fight` SET `idGagnant`= ".$idJoueur." WHERE `idMatch`=".$idMatch;
        $ex = $GLOBALS['connexion'] -> query($req);
        return true;
    }

    function setVainqueurMatchSuivant($idMatch, $vainqueur, $numJoueur){
        if ($numJoueur == 0) {
            $joueur = 'idJoueurDeux';
        }
        else{
            $joueur = 'idJoueurUn';
        }
        $req = "UPDATE `fight` SET `".$joueur."`= ".$vainqueur." WHERE `idMatch`=".$idMatch;
        $ex = $GLOBALS['connexion'] -> query($req);
        return $req;
    }

    function setInscription($idTournoi, $idJoueur){
        $req = "INSERT INTO `inscription`(`idUtilisateur`, `idTournoi`) VALUES (".$idJoueur.",".$idTournoi.")";
        $ex = $GLOBALS['connexion'] -> query($req);
        return true;
    }

    function setMatch($idTournoi, $idJoueurUn, $idJoueurDeux){
        $tournoi = getTournoiByID($idTournoi);
        $i = 1;
        $j = 1;
        while ($i < $tournoi->getUsers()) {
            $j ++;
            $i = $i*2;
        }
        $req = "INSERT INTO `fight`(`idMatch`, `idTournoi`, `typeMatch`, `idJoueurUn`, `idJoueurDeux`, `idGagnant`) VALUES ('', ".$idTournoi.", ".$j.", ".$idJoueurUn.", ".$idJoueurDeux.",null)";
        $ex = $GLOBALS['connexion'] -> query($req);
        return true;
    }

    function setJoueursFight($idMatch, $idJoueurUn, $idJoueurDeux){
        $req = "UPDATE `fight` SET `idJoueurUn`=".$idJoueurDeux.",`idJoueurDeux`=".$idJoueurUn." WHERE `idMatch` =".$idMatch;
        $ex = $GLOBALS['connexion'] -> query($req);
        return true;
    }

    function getPlayerPos($idJoueur){
        $req = "SELECT DISTINCT idTournoi FROM fight WHERE idJoueurUn = ".$idJoueur." OR idJoueurDeux = ".$idJoueur;
        $ex = BDDConnexionPDO() -> query($req);
        $tournament = new Collection();
        while($donnees = $ex -> fetch(PDO::FETCH_ASSOC)){
            $data = array("idTournoi" => $donnees['idTournoi'], "posTournoi" => "12");
            $tournament -> ajouter($data);
        }
        return $tournament -> getCollection();
    }
?>