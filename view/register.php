<form method="post" action="index.php?page=user&user=signup" id="register">
    <fieldset><legend>Identifiants</legend>
    <label class="regError"><?php echo $error ?></label><br />

    <label class="labReg">Adresse E-Mail : </label>
    <input class="inputReg" name="email" type="email"/><br />

    <label class="labReg">Pseudo (Compris entre 3 et 15 caractères) : </label>
    <input class="inputReg" name="pseudo" type="text"/><br />

    <label class="labReg">Mot de Passe : </label>
    <input class="inputReg" name="pass" type="password"/><br />

    <label class="labReg">Confirmez votre Mot de Passe : </label>
    <input class="inputReg" name="pass2" type="password"/><br />
    </fieldset>

    <input type="submit" value="S'inscrire" /><br />
</form>