<div id="profilPublic">

    <?php if(getBan($pseudo) == true){?>
        <p id="ban">Utilisateur Banni</p>
    <?php } ?>

    <figure>
        <img src="<?php echo $avatar ?>" width="120" height="120" style="border : 2px solid <?php echo $color ?>" />
        <figcaption style="color: <?php echo $color ?>"><?php echo $rank ?></figcaption>
    </figure>

<?php
    if($_SESSION['rang'] == 2){?>

        <div id="pInfos">
            <p><?php echo $pseudo ?></p>
            <p><?php echo $mail ?></p>
        </div>

    <?php } else{?>

        <div id="pInfos">
            <p><?php echo $pseudo ?></p>
        </div>

    <?php }
?>
</div>

<?php
    if(getBan($pseudo) == false){
        if($_SESSION['rang'] == 1 || $_SESSION['rang'] == 2){ ?>
        <form method="post" id="profilPublicBan" action="index.php?page=profilpublic&user=<?php echo $pseudo ?>">
            Date de Fin : <input type="date" name="fin" />
            <input class="button" type="submit" value="Bannir" />
        </form>
<?php   }
    } else{ ?>
        <form method="post" id="profilPublicBan" action="index.php?page=profilpublic&user=<?php echo $pseudo ?>">
            <input type="hidden" name="unban" value="1" />
            <input class="button" type="submit" value="Retirer le Banissement" />
        </form>
    <?php } ?>
