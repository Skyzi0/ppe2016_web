<?php
    require_once('model.php');
    require_once("class/c.collection.php");
    require_once("class/c.produit.php");

    function getListProduit(){
        $listProduit = new Collection();
        $req = "SELECT * FROM produit";
        $ex = BDDConnexionPDO() -> query($req);
        while ($donnees = $ex -> fetch(PDO::FETCH_ASSOC)){
            $produit = new produit($donnees['idProduit'], $donnees['nomProduit'], $donnees['typeProduit'], $donnees['description'], $donnees['prix'], $donnees['stock'], $donnees['photo']);
            $listProduit -> ajouter($produit);
        }
        return $listProduit -> getCollection();
    }

    function getListType(){
        $listType = new Collection();
        $req = "SELECT typeProduit FROM produit GROUP BY typeProduit";
        $ex = BDDConnexionPDO() -> query($req);
        while($donnees = $ex -> fetch(PDO::FETCH_ASSOC)){
            $listType -> ajouter($donnees['typeProduit']);
        }
        return $listType -> getCollection();
    }
?>