<?php
    require_once('model.php');
    require_once('class/c.collection.php');
    require_once('controller/c_utilities.php');

    function getListUser(){
        $rang = $_SESSION['rang'];
        $req = "SELECT idUtilisateur, Pseudo FROM utilisateur WHERE rang <'$rang' ORDER BY Pseudo";
        $ex = BDDConnexionPDO() -> query($req);
        $users = new Collection();
        while($donnees = $ex -> fetch(PDO::FETCH_ASSOC)){
            $user = array(
                'id' => $donnees['idUtilisateur'],
                'pseudo' => $donnees['Pseudo']);
            $users -> ajouter($user);
        }
        return $users;
    }

    function getUser($pseudo){
        try{
            $req = "SELECT idUtilisateur, adresseMail, Pseudo, rang, Avatar, PointTournois FROM utilisateur WHERE '$pseudo' = Pseudo";
            $ex = BDDConnexionPDO() -> query($req);
            $donnees = $ex -> fetch(PDO::FETCH_ASSOC);
            return $donnees;
        } catch(Exception $e){
            $error = "Utilisateur introuvable";
            include('view/404.php');
        }
    }

    function getUserById($idUtilisateur){
        $req = "SELECT idUtilisateur, adresseMail, Pseudo, rang, Avatar, PointTournois FROM utilisateur WHERE '$idUtilisateur' = idUtilisateur";
        $ex = BDDConnexionPDO() -> query($req);
        $donnees = $ex -> fetch(PDO::FETCH_ASSOC);
        return $donnees;
    }


    function getPseudo($idUser){
        $req = "SELECT Pseudo FROM utilisateur WHERE ".$idUser." = idUtilisateur";
        $ex = BDDConnexionPDO() -> query($req);
        $donnees = $ex -> fetch(PDO::FETCH_ASSOC);
        return $donnees['Pseudo'];
    }

    function mLogin($pseudo, $pass){
        $req = BDDConnexionPDO()->prepare("SELECT Pseudo, MotDePasse FROM utilisateur WHERE Pseudo = ?");
        $req->execute(array($pseudo));
        $donnees = $req->fetch(PDO::FETCH_ASSOC);

        if ($donnees['MotDePasse'] == $pass) {
            sessionInit($pseudo);
        }
     }

    function sessionInit($pseudo){
        $req = BDDConnexionPDO() -> prepare("SELECT * FROM utilisateur WHERE Pseudo = ?");
        $req -> execute(array($pseudo));
        $donnees = $req -> fetch(PDO::FETCH_ASSOC);

        $_SESSION['id'] = $donnees['idUtilisateur'];
        $_SESSION['mail'] = $donnees['adresseMail'];
        $_SESSION['pseudo'] = $donnees['Pseudo'];
        $_SESSION['rang'] = $donnees['rang'];
        $_SESSION['avatar'] = $donnees['Avatar'];
        $_SESSION['pttournoi'] = $donnees['PointTournois'];
        $_SESSION['gold'] = $donnees['PorteMonnaie'];
    }

    function mRegister($mail, $pseudo, $pass){
        $ex = BDDConnexionPDO() -> prepare("SELECT * FROM utilisateur WHERE Pseudo = ?");
        $ex -> execute(array($pseudo));
        $donnees = $ex -> fetch(PDO::FETCH_ASSOC);
        if($donnees){
            $error = "Utilisateur déjà enregistré !";
        } else{
            try{
                $ex = BDDConnexionPDO() -> prepare("INSERT INTO utilisateur(adresseMail, Pseudo, MotDePasse) VALUES (?, ?, ?)");
                $ex -> execute(array($mail, $pseudo, $pass));
                sessionInit($pseudo);
                return 0;
            } catch(Exception $e){
                return 1;
            }
        }
    }

    function updateMail($mail){
        try{
            $pseudo = $_SESSION['pseudo'];
            $req = "UPDATE utilisateur SET adresseMail = '$mail' WHERE '$pseudo' = Pseudo";
            $ex =  BDDConnexionPDO()-> query($req);

            $req = "SELECT adresseMail FROM utilisateur WHERE '$pseudo' = Pseudo";
            $ex = BDDConnexionPDO() -> query($req);
            $donnees = $ex -> fetch(PDO::FETCH_ASSOC);
            $_SESSION['mail'] = $donnees['adresseMail'];
        } catch(Exception $e){
            echo "Erreur d'enregistrement";
        }
    }

    function updateAvatar($image){
        try{
            $pseudo = $_SESSION['pseudo'];
            $req = "UPDATE utilisateur SET Avatar = '$image' WHERE '$pseudo' = Pseudo";
            $ex =  BDDConnexionPDO()-> query($req);

            $req = "SELECT Avatar FROM utilisateur WHERE '$pseudo' = Pseudo";
            $ex = BDDConnexionPDO() -> query($req);
            $donnees = $ex -> fetch(PDO::FETCH_ASSOC);
            $_SESSION['avatar'] = $donnees['Avatar'];
        } catch(Exception $e){
            echo "Erreur d'enregistrement";
        }
    }

    function updatePass($pass){
        try{
            $pseudo = $_SESSION['pseudo'];
            $req = "UPDATE utilisateur SET MotDePasse = '$pass' WHERE '$pseudo' = Pseudo";
            $ex =  BDDConnexionPDO()-> query($req);
        } catch(Exception $e){
            echo "Erreur d'enregistrement";
        }
    }

    function getBan($pseudo){
        $data = getUser($pseudo);
        $id = $data['idUtilisateur'];
        $req = "SELECT * FROM banissement WHERE idUser = '$id' ORDER BY dateFin DESC";
        $ex = BDDConnexionPDO() -> query($req);
        $donnees = $ex -> fetch(PDO::FETCH_ASSOC);
        if(strcmp(getDateToday(), $donnees['dateFin']) < 0){
            return true;
        } else{
            return false;
        }
    }

    function ban($pseudo, $dateFin){
        $date = getDateToday();
        if(strcmp($date, $dateFin) >= 0){
            $error = "Date de banissement incorrecte !";
            include('view/404.php');
        } else{
            $data = getUser($pseudo);
            $id = $data['idUtilisateur'];
            try{
                $req = "INSERT INTO banissement VALUES ('$id', '$date', '$dateFin')";
                $ex = BDDConnexionPDO() -> query($req);
            } catch(Exception $e){
                $error = "Action non réalisée";
                include('view/404.php');
            }
        }
    }

    function updateBan($pseudo){
        $ban = getBan($pseudo);
        $data = getUser($pseudo);
        $idUser = $data['idUtilisateur'];
        if($ban == true){
            $req = "DELETE FROM banissement WHERE '$idUser' = idUser";
            $ex = BDDConnexionPDO() -> query($req);
        } else{
            $error = "Utilisateur non banni !";
            include('view/404.php');
        }
    }
?>