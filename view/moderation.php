<div id="panMod">
    <div id="nameMod">Panel de Modération</div>

    <div id="editUser">Liste des Utilisateurs :
        <section class="user">
            <?php
            echo $letter, "<br />";
            echo "<a href='index.php?page=profilpublic&user=", $user['pseudo'] ,"' style='color: #4d5260;'> - ", $user['pseudo'], "</a><br/>";
            for($id = 1; $id < count($users); $id++){
                $user = $users[$id];
                if(strncmp($letter, substr($user['pseudo'], 0, 1), 1) != 0) {
                    $letter = substr($user['pseudo'], 0, 1);
                    echo strtoupper($letter), "<br />";
                }
                echo "<a href='index.php?page=profilpublic&user=", $user['pseudo'] ,"' style='color: #4d5260;'> - ", $user['pseudo'], "</a><br/>";
            }?>
        </section>
    </div>
</div>