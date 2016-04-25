<?php
    require_once('model/m_user.php');

    if(isset($_POST['fin'])){
        ban($_GET['user'], $_POST['fin']);
    }

    if(isset($_POST['unban'])){
        updateBan($_GET['user']);
    }

    $pseudoPublic = $_GET['user'];
    $user = getUser($pseudoPublic);
    if($user['rang'] >= $_SESSION['rang']){
        $error = "Utilisateur introuvable";
        include('view/404.php');
    } else{
        $pseudo = $user['Pseudo'];
        $mail = $user['adresseMail'];
        $avatar = $user['Avatar'];
        $ptTour = $user['PointTournois'];
        if($ptTour >= 1000){
            if($ptTour >= 5000){
                if($ptTour >= 10000){
                    if($ptTour >= 20000){
                        if($ptTour >= 50000){
                            $color = "#23398C"; $rank = "Diamant";
                        } else{ $color = "#FAF0C5"; $rank = "Platine"; }
                    } else{ $color = "#FFD700"; $rank = "Or"; }
                } else{ $color = "#CECECE"; $rank = "Argent"; }
            } else{ $color = "#614E1A"; $rank = "Bronze"; }
        } else{ $color = "black"; $rank = "Challenger"; }

        include('view/profilpublic.php');
    }
?>