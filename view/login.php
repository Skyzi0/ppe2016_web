

<form method="post" action="index.php?page=user&user=checkLogin"  id="register">
    <fieldset><legend>Identifiants</legend>
    <label class="regError"><?php echo $error ?></label><br />

    <label class="labReg">Pseudo : </label>
    <input class="inputReg" name="lPseudo" type="text"/><br />

    <label class="labReg">Mot de Passe : </label>
    <input class="inputReg" name="lPass" type="password"/><br />

    </fieldset>

    <input type="submit" value="Se connecter" /><br />
</form>
