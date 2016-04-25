<?php
require_once('c.collection.php');
require_once('m_user.php');

class Match{

    private $idU;
    private $ndcU;
    private $pseudoU;
    private $mdpU;
    private $avatarU;
    private $pTournoiU;
    private $pMonnaieU;
    
    public function __construct($id, $ndc, $pseudo, $mdp, $avatar, $pTournoi, $pMonnaie){
        $this -> idU = $id;
        $this -> ndcU = $ndc;
        $this -> pseudoU = $pseudo;
        $this -> mdpU = $mdp;
        $this -> avatarU = $avatar;
        $this -> pTournoiU = $pTournoi;
        $this -> pMonnaieU = $pMonnaie;
    }
    
    public function getId(){
        return $this -> idU;
    }
    
    public function getNDC(){
        return $this -> ndcU;
    }
    
    public function getPseudo(){
        return $this -> pseudoU;
    }
    public function getMdpU(){
        return $this -> mpdU;
    }
    
    public function getAvatarU(){
        return $this -> avatarU;
    }
    
    public function getPTournoiU(){
        return $this -> pTournoiU;
    }
    
    public function getPMonnaieU(){
        return $this -> pMonnaieU;
    }
    
    
}
?>