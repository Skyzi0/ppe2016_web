<?php 

class Tournoi{

    private $idT;
    private $nameT;
    private $usersT;
    private $listMatchT;
    private $descT;
    
    public function __construct($id, $name, $users, $listMatch, $desc){
        $this -> idT = $id;
        $this -> nameT = $name;
        $this -> usersT = $users;
        $this -> listMatchT = $listMatch;
        $this -> descT = $desc;
    }
    
    function getId(){
        return $this -> idT;
    }
    
    function getName(){
        return $this -> nameT;
    }
    
    function getUsers(){
        return $this -> usersT;
    }
    
    function getListMatch(){
        return $this -> listMatchT;   
    }

    function getDesc(){
        return $this -> descT;
    }
}
?>