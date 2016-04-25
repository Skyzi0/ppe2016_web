<?php

class Produit{
    private $id;
    private $nom;
    private $type;
    private $description;
    private $prix;
    private $stock;
    private $picture;

    public function __construct($id, $nom, $type, $description, $prix, $stock, $picture){
        $this -> id = $id;
        $this -> nom = $nom;
        $this -> type = $type;
        $this -> description = $description;
        $this -> prix = $prix;
        $this -> stock = $stock;
        $this -> picture = $picture;
    }

    public function getId(){
        return $this->id;
    }

    public function getNom(){
        return $this->nom;
    }

    public function getType(){
        return $this->type;
    }

    public function getDescription(){
        return $this->description;
    }

    public function getPrix(){
        return $this->prix;
    }

    public function getStock(){
        return $this->stock;
    }

    public function getPicture(){
        return $this->picture;
    }
}