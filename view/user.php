<?php
if (empty($_POST['pseudo'])) // Si on la variable est vide, on peut considérer qu'on est sur la page de formulaire
{
	echo '<h1>Inscription 1/2</h1>';
	echo '<form method="post" action="register.php" enctype="multipart/form-data">
	<fieldset><legend>Identifiants</legend>
	<label for="pseudo">* Pseudo :</label>  <input name="pseudo" type="text" id="pseudo" /> (le pseudo doit contenir entre 3 et 15 caractères)<br />
	<label for="nomCompte">* nomCompte :</label> <input name="nomCompte" type="text" id="nomCompte"/> (indiquer nom de compte) <br />
    <label for="password">* Mot de Passe :</label><input type="password" name="password" id="password" /><br />
	<label for="confirm">* Confirmer le mot de passe :</label><input type="password" name="confirm" id="confirm" />
	<label for="email">* Votre adresse Mail :</label><input type="text" name="email" id="email" /><br />
	</fieldset>
	<p> les champs avec une * sont obligatoire </p>
	<p><input type="submit" value="S\'inscrire" /></p></form>
	</div>
	</body>
	</html>';
	
	
} 