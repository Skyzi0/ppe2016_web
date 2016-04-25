<?php
    require_once("model/m_user.php");
    if(isset($_SESSION['rang'])){
        if($_SESSION['rang'] > 0){
            $users = getListUser() -> getCollection();
            $user = $users[0];
            $pseudo = $user['pseudo'];
            $letter = substr($pseudo, 0, 1);
            include("view/moderation.php");
        } else{
            header('Location: index.php?page=user&user=profil');
        }
    } else{
        header('Location: index.php?page=user&user=login');
    }