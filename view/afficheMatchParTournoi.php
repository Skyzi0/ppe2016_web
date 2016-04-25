<?php
    require_once('model/m_tournament.php');

	$listeMatch = getMatchsByTournament($_GET['id']);
?>
<!--<table class="tableauAfficheMatch" style="border-collapse: collapse">
	<tr >
		<td style="border: 1px solid black"> Match </td>
		<td style="border: 1px solid black"> Joueur 1 </td>
		<td style="border: 1px solid black"> Joueur 2 </td>
	</tr -->
	
<?php foreach ($listeMatch as $match){ }?>
