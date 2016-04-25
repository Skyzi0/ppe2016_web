<div>
    <?php
        function afficheQuestion($question ,$user){ ?>
            <div class="reponse" id="main_post">
                <section>
                    <figure>
                        <img src="<?php echo $user['Avatar']; ?>" width="120" height="120" style="border : 2px solid <?php echo $user['color']; ?>" />
                        <figcaption style="color: <?php echo $user['color']; ?>"><?php echo $user['rank'] ?></figcaption>
                    </figure>
                    <p><?php echo $user['Pseudo']; ?></p>
                </section>
                <div>
                    <p><?php echo $question -> getTexteQuestion() ?></p>
                </div>
            </div>
            <a class="btn btn-secondary repondre" onclick="document.getElementById('textbox').style.display = 'block'">
                Répondre au sujet
            </a>
            <form id="textbox" method="post" action="index.php?page=forum&idQuestion=<?php echo $_GET['idQuestion'] ?>&idCategorie=<?php echo $_GET['idCategorie'] ?>">
                <input type="text" name="textbox" />
                <input type="submit" value="Valider ma réponse" />
            </form>
        <?php }

        function afficheReponse($text, $user){ ?>
            <div class="reponse" id="main-post">
                <section>
                    <figure>
                        <img src="<?php echo $user['Avatar']; ?>" width="120" height="120" style="border : 2px solid <?php echo $user['color']; ?>" />
                        <figcaption style="color: <?php echo $user['color']; ?>"><?php echo $user['rank'] ?></figcaption>
                    </figure>
                    <p><?php echo $user['Pseudo']; ?></p>
                </section>
                <div>
                    <p><?php echo $text ?></p>
                </div>
            </div>
        <?php }
    ?>
</div>
