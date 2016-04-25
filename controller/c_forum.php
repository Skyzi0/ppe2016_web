<?php
    $title = "GT | Forum";

    require_once('model/m_forum.php');
    require_once('model/m_user.php');
    require_once('view/reponse.php');

    if(isset($_POST['textbox'])){
        $text = $_POST['textbox'];
        $idQuestion = $_GET['idQuestion'];
        $idUser = $_SESSION['id'];

        if(addReponse($idUser, $idQuestion, $text) == 0){
            $alert = "Réponse ajoutée";
        } else{
            $alert = "Erreur lors de l'ajout";
        }

        echo "<script>alert(.$alert.)</script>";
    }

    if(isset($_GET['idCategorie']) && !isset($_GET['idQuestion'])){
        $idCategorie = $_GET['idCategorie'];
        $listQuestion = getQuestion($idCategorie);
        $categorie = getCategorieById($idCategorie);
        include('view/categorie.php');

    } elseif(isset($_GET['idQuestion'])){
        $idQuestion= $_GET['idQuestion'];
        $listReponse = getReponse($idQuestion);
        $question = getQuestionById($idQuestion);
        $user = getUserById($question -> getIdUtilisateur());
        $ptTour = $user['PointTournois'];
        $user['color'] = getRank($ptTour)['0'];
        $user['rank'] = getRank($ptTour)['1'];
        afficheQuestion($question, $user);
        
        foreach ($listReponse as $value){
            $text = $value -> getTexteReponse();
            $user = getUserById($value ->getIdUtilisateur());
            $ptTour = $user['PointTournois'];
            $user['color'] = getRank($ptTour)['0'];
            $user['rank'] = getRank($ptTour)['1'];
            afficheReponse($text, $user);
        }

    } else{
        $listCategorie = getCategorie();
        include('view/forum.php');
    }

    function getRank($ptTour){
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

        $infos = Array($color, $rank);
        return $infos;
    }
?>
<title><?php echo $title ?></title>
