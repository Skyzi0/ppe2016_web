<?php
    require_once("model/m_shop.php");
    require_once("view/shop.php");

    if(isset($_GET['search_type']) && $_GET['search_type'] != null){
        foreach(getListProduit() as $produit){
            if($produit -> getType() == $_GET['search_type']){
                $return = true;
                afficheProduit($produit);
            }
        }
    } else if(isset($_GET['search_name']) && $_GET['search_name'] != null){
        foreach(getListProduit() as $produit){
            if(stristr($produit -> getNom(), $_GET['search_name'])){
                afficheProduit($produit);
            }
        }
    } else{
        foreach(getListProduit() as $produit){
            afficheProduit($produit);
        }
    }
?>


