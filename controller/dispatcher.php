<?php
    include('model/model.php'); //BDD

    include('view/header.php'); //VUE
    include('view/nav.php'); //VUE
    

    if(isset($_GET['page'])){
        switch($_GET['page']){
            case 'tournois' :
                include('c_tournoi.php');
                break;

            case 'inscription':
                include('c_inscriptionTournoi.php');
                break;

            case 'actionInscriptionTournois':
                include('c_actionInscriptionTournoi.php');
                break;
            
            case 'user' :
                if(isset($_GET['user'])){ include('c_user.php'); };
                break;
            
            case 'forum':
                include('c_forum.php');
                break;

            case 'moderation':
                include('c_moderation.php');
                break;

            case 'profilpublic':
                include('c_profilpublic.php');
                break;

            case 'matchGagne': //===============================ROMAIN===============================
                include('c_actionMatchGagne.php');
                break;

            case 'matchPerdu':
                include('c_actionMatchPerdu.php');
                break;

            case '404':
                include('view/404.php');
                break;

            case'shop':
                include('c_shop.php');
                break;

            default:
                include('c_accueil.php');
                break;
        }
    } else { include('c_accueil.php'); }

    include('view/footer.php'); //VUE
?>