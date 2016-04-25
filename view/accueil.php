<div class="" style="margin-top:2%; display:inline-block">
	<table class="tableauAfficheTournois" style="border-collapse: collapse; display:inline-block">
		<tr >
			<td style="border: 1px solid black; max-width: 40 %"> Tournois en cours</td>
			
		</tr>
		<!-- Boucle affichant les tournois dans le tableau -->
		<?php foreach ($listeTournois as $tournoi ){  ?>
			<tr>
				<td  style="border: 1px solid black"><a href="index.php?page=tournois&id=<?php echo $tournoi -> getId() ?>" class="tournoisTableau"><?php echo $tournoi->getName() ?></a></td>
			</tr>
		<?php  } ?>

	</table>
	<table class="tableauAfficheTournois" style="border-collapse: collapse; display:inline-block">
		<tr >
			<td style="border: 1px solid black"> Inscription ouvertes </td>
			
		</tr>
		<!-- Boucle affichant les tournois dans le tableau -->
		<?php foreach ($listeTournoisInscription as $tournoi ){  ?>
			<tr>
				<td  style="border: 1px solid black"><a href="index.php?page=inscription&id=<?php echo $tournoi -> getId() ?>" class="tournoisTableau"><?php echo $tournoi->getName() ?></a></td>
			</tr>
		<?php  } ?>

	</table>
</div>