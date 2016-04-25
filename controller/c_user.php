<?php
    if (isset($_GET['user'])){
        switch($_GET['user']){
            case 'signup' : register(); break;
            case 'login' : login(); break;
            case 'checkLogin' : checkLogin(); break;
            case 'logout' : logout(); break;
            case 'profil' : getProfil(); break;
            case 'modifProfil' :modifProfil(); break;
        }
    }
    function register(){
        require_once('model/m_user.php');
        if(isset($_SESSION['id'])){
            getProfil();
        }
         elseif(isset($_POST['email']) && isset($_POST['pseudo']) && isset($_POST['pass']) && isset($_POST['pass2'])){

            $email = $_POST['email'];
            $pseudo = $_POST['pseudo'];
            $pass1 = $_POST['pass'];
            $pass2 = $_POST['pass2'];

            if($pass1 != $pass2){
                $error = "Les deux mots de passe ne sont pas identiques";
                include("/view/register.php");

            } elseif(strlen($pseudo) <= 3 && strlen($pseudo) >= 15 || ($pseudo == null)){
                $error = "Taille du pseudo incorrecte";
                include("/view/register.php");

            }else{
                $check = mRegister($email, $pseudo, md5($pass1));
                if($check == 0){
                    header('Location: index.php?page=user&user=profil');
                } else{
                    header('Location: index.php?page=user&user=signup');
                    $error = "Une erreur est survenue dans la base de données";
                }
            }
        } else{
            $error = null;
            include("/view/register.php");
        }
    }
    
    function login(){
        if (!isset($_SESSION['id']) || !isset($_POST['pseudo'])) {
            $error = null;
			include("/view/login.php");
        }
    }

    function checkLogin()
    {
        include("/model/m_user.php");
        if ($_POST['pseudo'] = null || $_POST['pass'] = null) {
            $error = "pseudo ou mot de passe vide , veuillez indiquer ces informations";
            include("/view/login.php");
        } else {
            $pseudo = $_POST['lPseudo'];
            $pass = $_POST['lPass'];
            if (getBan($pseudo) == false) {
                mLogin($pseudo, $pass);
                if ($_SESSION != null) {
                    header('Location: index.php?page=user&user=profil');
                } else {
                    $error = "Mot de passe invalide";
                    include("/view/login.php");
                }
            } else {
                $error = "Vous avez été banni";
                include('view/404.php');
            }
        }
    }
    
    function logout(){
        if(isset($_SESSION['id'])){
            session_unset();
            header('Location: index.php');
        } else{
            header('Location: index.php?page=user&user=login');
        }
    }
    
    function getProfil(){
        require_once('model/m_user.php');
        if(isset($_SESSION['id'])){
            $pseudo = $_SESSION['pseudo'];
            $avatar = $_SESSION['avatar'];
            $nbpt = $_SESSION['pttournoi'];
            include("view/profil.php");
        } else{
            header('Location: index.php?page=user&user=login');
        }
    }
    function modifProfil(){
    	include("/model/m_user.php");
    	$error = null;
        if ($_POST['mail'] != null) {
            $mail = $_POST['mail'];
            updateMail($mail);
        } 
        if($_POST['image'] !=null){
            $image = $_POST['image'];
            updateAvatar($image);
}
        if($_POST['pass'] !=null){
            $pass = $_POST['pass'];
            updatePass($pass);
        }    
        getProfil();
    }
    function parier(){
        $error = null;
        require_once("/model/m_user.php");
        if($_SESSION['gold'] >= 2){
            $_SESSION['gold'] = $_SESSION['gold'] - 2;
            $montantParis = 2;
            parier($montantParis);
        include ("view/afficheTournois.php");
        }
        else{
            $error = "Votre portefeuille ne contient pas assez d argent pour parier";
            include ("view/afficheTournois.php");
        }
    }
?>
