<?php
    require_once('model.php');
    require_once('class/c.categorie.php');
    require_once ('class/c.collection.php');
    require_once('class/c.question.php');
    require_once('class/c.reponse.php');
    $connexion = BDDConnexionPDO();
    
    function getCategorie(){
        $listCategorie = new Collection();
        $req ="SELECT idCategorie, nomCategorie ,descriptionCategorie from categorie";
        $ex =BDDConnexionPDO() -> query($req);
        while ($donnees = $ex -> fetch(PDO::FETCH_ASSOC)){
            $categorie = new categorie ($donnees['idCategorie'] ,$donnees['nomCategorie'] ,$donnees['descriptionCategorie']);
            $listCategorie -> ajouter($categorie);
        }
        return $listCategorie -> getCollection();
    }

    function getQuestion($idCategorie){
        $listQuestion = new Collection();
        $req ="SELECT idQuestion, titreQuestion,texteQuestion,idUtilisateur,idCategorie from question where idCategorie ='$idCategorie'";
        $ex = BDDConnexionPDO() -> query($req);
        while($donnees = $ex -> fetch(PDO::FETCH_ASSOC)){
            $question = new question ($donnees['idQuestion'] ,$donnees['titreQuestion'] ,$donnees['texteQuestion'],$donnees['idUtilisateur'],$donnees['idCategorie']);
            $listQuestion -> ajouter($question);
        }
        return $listQuestion -> getCollection();
    }

    function getReponse($idQuestion){
        $listReponse = new Collection();
        $req ="SELECT idReponses, texteReponse,idUtilisateur,idQuestion from reponses where idQuestion ='$idQuestion'";
        $ex = BDDConnexionPDO() -> query($req);

            while ($donnees = $ex->fetch(PDO::FETCH_ASSOC)) {
                $reponse = new reponse ($donnees['idReponses'], $donnees['texteReponse'], $donnees['idUtilisateur'], $donnees['idQuestion']);
                $listReponse->ajouter($reponse);
            }
        return $listReponse -> getCollection();
    }
    function getCategorieById($idCategorie){
        $req = "SELECT * FROM categorie WHERE idCategorie = '$idCategorie'";
        $ex = BDDConnexionPDO() -> query($req);
        $donnees =  $ex -> fetch(PDO::FETCH_ASSOC);
        return new categorie ($donnees['idCategorie'] ,$donnees['nomCategorie'] ,$donnees['descriptionCategorie']);
    }

    function getQuestionById($idQuestion){
        $req = "SELECT * FROM question WHERE idQuestion = '$idQuestion'";
        $ex = BDDConnexionPDO() -> query($req);
        $donnees = $ex -> fetch(PDO::FETCH_ASSOC);
        return new question ($donnees['idQuestion'] ,$donnees['titreQuestion'] ,$donnees['texteQuestion'],$donnees['idUtilisateur'],$donnees['idCategorie']);
    }

    function addReponse($idUser, $idQuestion, $text){
        try{
            $ex = BDDConnexionPDO() -> prepare("INSERT INTO reponses (texteReponse, idUtilisateur, idQuestion) VALUES (?, ?, ?)");
            $ex -> execute(array($text, $idUser, $idQuestion));
            return 0;
        } catch(Exception $e){
            return 1;
        }
    }
    
?>