<div id="forum">
    <div id="cat">
        <p><?php echo $categorie -> getNomCategorie() ?></p>
        <?php  ?>
        <?php
        foreach ($listQuestion as $value ){?>
            <div class="question">
                <a href="index.php?page=forum&idQuestion=<?php echo $value -> getIdQuestion()?>&idCategorie=<?php echo $value ->getIdCategorie() ?>"><?php echo $value -> getTitreQuestion()?></a>
                <p><?php echo substr($value -> getTexteQuestion(), 0, 150) ?> ...</p>
            </div>
        <?php } ?>
    </div>
</div>
