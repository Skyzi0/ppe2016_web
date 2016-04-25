<div id="forum">
    <?php
        foreach ($listCategorie as $value ){ ?>
            <div class="categorie">
                <a href ="index.php?page=forum&idCategorie=<?php echo $value -> getIdCategorie(); ?>">
                    <?php echo $value -> getNomCategorie(); ?>
                </a>
                <p>
                    <?php echo $value -> getDescriptionCategorie(); ?>
                </p>
            </div>
        <?php }
    ?>
</div>
