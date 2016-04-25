<!-- Boucle affichant les tournois dans le tableau -->
<?php foreach ($listeTournois as $tournoi ){ ?>
    <div class="tournoi">
        <a class="nom_tournoi" href="index.php?page=tournois&id=<?php echo $tournoi -> getId() ?>"><?php echo $tournoi->getName() ?></a><p class="nb_tournoi"><?php echo $tournoi -> getUsers() ?> participants</p><p class="sign_tournoi" style="color: darkred">Inscription terminées !</p>
        <p class="desc_tournoi"><?php echo $tournoi -> getDesc() ?></p>
    </div>
<?php  } ?>

<!-- Boucle affichant les tournois dans le tableau -->
<?php foreach ($listeTournoisInscription as $tournoi ){  ?>
    <div class="tournoi">
        <a class="nom_tournoi" href="index.php?page=inscription&id=<?php echo $tournoi -> getId() ?>"><?php echo $tournoi->getName() ?></a><p class="nb_tournoi"><?php echo $tournoi -> getUsers() ?> participants</p><p class="sign_tournoi" style="color: darkgreen">Inscription ouvertes !</p>
        <p class="desc_tournoi"><?php echo $tournoi -> getDesc() ?></p>
    </div>
<?php  } ?>
