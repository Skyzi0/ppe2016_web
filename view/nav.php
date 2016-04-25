<nav>
    <ul class="nav" id="left_nav">
        <li><a href="index.php">Accueil</a></li>
        <li><a href="index.php?page=forum">Forum</a></li>
        <?php if(isset($_SESSION['rang'])){
                if($_SESSION['rang'] > 0){?>
                    <li><a href="index.php?page=moderation">Modération</a></li>
        <?php }} ?>
        <li><a href="index.php?page=shop">Boutique</a></li>
    </ul>
    <ul class="nav" id="right_nav">
        <?php if(isset($_SESSION['id'])){ ?>
            <li><a href="index.php?page=user&user=profil">Mon Profil</a></li>
            <li><a href="index.php?page=user&user=logout">Se déconnecter</a></li>
        <?php } else { ?>
            <li><a href="index.php?page=user&user=login">Se Connecter</a></li>
            <li><a href="index.php?page=user&user=signup">S'inscrire</a></li>
        <?php } ?>
    </ul>
</nav>