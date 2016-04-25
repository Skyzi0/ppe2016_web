<div style="width: 40%; margin-left: 30%">
	<table class="table-striped table-bordered text-center" width = "100%">
		<thead>
			<th>Joueurs inscrit</th>
		</thead>
		<?php
		foreach ($listeJoueur as $joueur) {
			?>
			<tr>
				<td><?php echo getPseudo($joueur);?></td>
			</tr>
		<?php }
		?>
		<?php if(sizeof($listeJoueur) == 0){?><tr>Aucun joueur n'est encore inscrit.</tr><?php } ?>
	</table>

<?php 
if ($joueurInscrit == true) { ?>
	<button class="btn btn-default" disabled>Vous êtes déjà inscrit</button>
<?php }
else{
	if (sizeof($listeJoueur)>= $tournoi->getUsers()) {?>
		<div>Ce tournoi est complet!</div>
	<?php }
	else{
		if (isset($_SESSION['id'])) { ?>
			<a class="btn btn-default" href="index.php?page=actionInscriptionTournois&id=<?php echo $tournoi -> getId() ?>">S'inscrire à ce tournoi</a>
		<?php }
		else{?>
			<a class="btn btn-default" href="index.php?page=user&user=login">Il reste des places, connecté vous!</a>
		<?php }
	}	
} ?>
</div>