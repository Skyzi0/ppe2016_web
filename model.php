<?php
    function BDDConnexionPDO()
    {
        $PARAM_hote='btsinfo-rousseau53.fr:33017'; //Chemin vers le serveur
        $PARAM_port='33017';
        $PARAM_nom_db='2014-tm_ppe';  //Nom de la base de donnée
        $PARAM_utilisateur='2014-tm';  //Nom d'utilisateur pour se connecter à la base de donnée
        $PARAM_mot_passe='123456';    //Mot de passe pour se connecter à la base de donnée

        try
        {
            $connexion = new PDO('mysql:host='.$PARAM_hote.';dbname='.$PARAM_nom_db,$PARAM_utilisateur,$PARAM_mot_passe, array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
            $connexion -> setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_WARNING);
            $connexion -> setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE,PDO::FETCH_OBJ);
            return $connexion;
        }
        catch (Exception $e)
        {
            echo 'Erreur:'.$e->getMessage().'<br/>';
            echo 'N°:'.$e->getCode();
            die;    
        }
    }
?>