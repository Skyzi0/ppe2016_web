<?php
require_once('c.collection.php');
class reponse{

public    $idReponse;
   public $texteReponse;
    public $idUtilisateur;
    public $idQuestion;

    public function __construct($idReponse, $texteReponse,$idUtilisateur,$idQuestion){
        $this -> idReponse = $idReponse;
        $this -> texteReponse = $texteReponse;
        $this -> idUtilisateur = $idUtilisateur;
        $this -> idQuestion = $idQuestion;
        }
    function getIdReponse(){
        return $this -> idReponse;
    }

    function getTexteReponse(){
        return $this -> texteReponse;
    }

    function getIdQuestion(){
        return $this -> idQuestion;
    }
    
    function getIdUtilisateur(){
        return $this -> idUtilisateur;
    }
    
}
?>