<?php
require_once('c.collection.php');
class categorie{

public    $idCategorie;
   public $nomCategorie;
    public $descriptionCategorie;

  public function __construct($idCategorie, $nomCategorie,$descriptionCategorie){
        $this -> idCategorie = $idCategorie;
        $this -> nomCategorie= $nomCategorie;
        $this -> descriptionCategorie = $descriptionCategorie;
        }
 function getIdCategorie(){
        return $this -> idCategorie;
    }
    
    function getNomCategorie(){
        return $this -> nomCategorie;
    }
    
    function getDescriptionCategorie(){
        return $this -> descriptionCategorie;
    }
    
}
?>