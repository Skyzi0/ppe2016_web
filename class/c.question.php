<?php
require_once('c.collection.php');
class question{

    public $idQuestion;
    public $titreQuestion;
    public $texteQuestion;
    public $idUtilisateur;
    public $idCategorie;

    public function __construct($idQuestion, $titreQuestion,$texteQuestion,$idUtilisateur,$idCategorie){
        $this -> idQuestion = $idQuestion;
        $this -> titreQuestion = $titreQuestion;
        $this -> texteQuestion = $texteQuestion;
        $this -> idUtilisateur = $idUtilisateur;
        $this -> idCategorie = $idCategorie;
        }

    function getIdQuestion(){
        return $this -> idQuestion;
    }

    function getTitreQuestion(){
        return $this -> titreQuestion;
    }
    
    function getIdCategorie(){
        return $this -> idCategorie;
    }
    
    function getTexteQuestion(){
        return $this -> texteQuestion;
    }
    
    function getidUtilisateur(){
        return $this -> idUtilisateur;
    }
    
}
?>