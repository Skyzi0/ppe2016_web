<?php 

class Match{

    private $idM;
    private $idTournoiM;
    private $typeM;
    private $idJ1M;
    private $idJ2M;
    private $idGagnantM;
    
    public function __construct($id, $idTournoi, $type, $idJ1, $idJ2, $idGagnant){
        $this -> idM = $id;
        $this -> idTournoiM = $idTournoi;
        $this -> typeM = $type;
        $this -> idJ1M = $idJ1;
        $this -> idJ2M = $idJ2;
        $this -> idGagnantM = $idGagnant;
    }
    
    public function getId(){
        return $this -> idM;
    }
    
    public function getTournoi(){
        return $this -> idTournoiM;
    }
    
    public function getType(){
        return $this -> typeM;
    }
    
    public function getUserOne(){
        return $this -> idJ1M;
    }
    
    public function getUserTwo(){
        return $this -> idJ2M;
    }

     public function getIdGagnant(){
        return $this -> idGagnantM;
    }
}
?>