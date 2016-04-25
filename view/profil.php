
<div id="profil">
    <div id="pHeader">
        <img src="<?php echo $_SESSION['avatar'] ?>" width="120" height="120"/>
        <p><?php echo "pseudo : ".$_SESSION['pseudo'] ?><br> 
            <br>
        <?php echo "points : ".$_SESSION['pttournoi'] ?><br>
            <br>
        <?php echo "adresse mail : ".$_SESSION['mail']?><br>
            <br>
        <?php echo "Portefeuille du compte : ".$_SESSION['gold']."€"?></p>
    </div>
    
</div>

	
<form method="post" action="index.php?page=user&user=modifProfil"  id="register">
    <fieldset><legend>Identifiants</legend>
        <?php echo $error = null; ?></label><br/>
    <label class="regError"><?php echo $error ?></label><br />

    <label class="labReg">img : </label>
    <input class="inputReg" name="image" type="url" /><br />

    <label class="labReg">Mot de Passe : </label>
    <input class="inputReg" name="pass" type="password"/><br />
    
    <label class="labReg">Mail</label>
    <input class="inputReg" name="mail" type="mail"/><br/>
    </fieldset>

    <input type="submit" value="Modifier" /><br />
</form>

	
	

 
