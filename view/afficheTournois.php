<?php
    include_once('model/m_tournament.php');
    include_once('model/m_user.php');

    // !--- Controller : C'est du basique pour le controller
    $idTournois = $_GET['id'];
//    var_dump($idTournois);
//    $listeMatchs = getMatchsByTournament($idTournois);
//    var_dump($listeMatchs);
    $dernierIndice = getLastIndice($idTournois);
    $NombreDeMatch = getTournoiByID($idTournois)->getUsers()/2;
    $HauteurTableau = $NombreDeMatch*64;
    // ---!
?>
<div class="TableauTournois">
<?php
    while($NombreDeMatch*2 >= 2){
        ?>
        <div class="ColonneTournois" style="height:<?php echo $HauteurTableau ?>px; width:16%; display:inline-block; vertical-align: bottom;">
        <?php
            // !--- Controller : Toute la partie de génération des variables peut être fait en controller
        $Compteur = 1;
        $BrancheArbre = $HauteurTableau/($NombreDeMatch*2);
        $EspaceRestant = $HauteurTableau-(60*$NombreDeMatch);
        $Margin = $EspaceRestant/($NombreDeMatch*2);
        $LongeurBranche = $HauteurTableau/($NombreDeMatch*2)-1;
        $LongeurBranche1 = $LongeurBranche-1;
        $LongeurBranche2 = $LongeurBranche-4;
        $LongeurBranche3 = $LongeurBranche + 1;
        $listeMatchs = getMatch($idTournois,$dernierIndice);

        foreach ($listeMatchs as $match) {
            if (isset($_SESSION['id'])) {
                if ($match->getUserOne() == $_SESSION['id'] || $match->getUserTwo() == $_SESSION['id']) {
                    if ($match->getIdGagnant() == null) {
                        $utilisateurJoueMatch = true;
                    }
                    else{
                        $utilisateurJoueMatch = false;
                    }
                }
                else{
                    $utilisateurJoueMatch = false;
                }
            }
        ?>

            <div class="BlocMatch" style="height:60px; width:100%; background-color: #eeeeee; display:inline-block; margin-top:<?php echo $Margin ?>px; margin-bottom:<?php echo $Margin ?>px;">
                <div class="col-md-12">
                    <div class="col-md-4 col-md-pull-2"><?php if($match->getUserOne() != null) echo  getPseudo($match->getUserOne()); ?></div>
                    <?php if ($match->getIdGagnant() == $match->getUserOne() && $match->getIdGagnant(0 != null)) {?>
                        <div style="margin-right: 6px; color: #74d600; display:inline-block; float:right"> V </div>
                    <?php } ?>
                       <?php if($match->getUserOne() != null && $match->getUserTwo()) if(isset($utilisateurJoueMatch)) if ($utilisateurJoueMatch == true && $match->getUserOne() == $_SESSION['id']) {?>
                           <form class="col-md-4" action="index.php?page=matchGagne" method="post">
                                <button type="submit" name="match" class="btn btn-default btn-xs" value="<?php echo $match->getId(); ?>">Gagné</button>
                            </form>
                           <form class="col-md-4" action="index.php?page=matchPerdu" method="post">
                                <button type="submit" name="match" class="btn btn-default btn-xs" value="<?php echo $match->getId(); ?>">Perdu</button>
                            </form>
                       <?php } ?>
                    <br><br>
                    <div class="col-md-4 col-md-pull-2"><?php if($match->getUserTwo() != null) echo  getPseudo($match->getUserTwo());?></div>
                    <?php if ($match->getIdGagnant() == $match->getUserTwo() && $match->getIdGagnant(0 != null)) {?>
                        <div style="margin-right: 6px; color: #74d600; display:inline-block; float:right"> V </div>
                    <?php }?>
                        <?php if(isset($utilisateurJoueMatch)) if ($utilisateurJoueMatch == true && $match->getUserTwo() == $_SESSION['id']) {?>
                           <button class="btn btn-default btn-xs col-md-4" >Gagné</button>
                           <button class="btn btn-default btn-xs col-md-4" >Perdu</button>
                       <?php } ?>
                </div>
            </div>
           <?php
        }
        $NombreDeMatch = $NombreDeMatch/2;
        $dernierIndice = $dernierIndice-1;
        $Compteur = $Compteur + 1;
        ?>
            </div>
            <?php
            if ($NombreDeMatch >= 1) {
                ?><div class="BlocJointure" style="width: 18px; display: inline-block;">
                <?php for ($i=0; $i < $NombreDeMatch ; $i ++) { ?>
                    <div class="bloc1" style="width: 6px; height: <?php echo $LongeurBranche1 ?>px ; display:inline-block; border-top: 1px solid black; border-right: 1px solid black; margin-top: <?php echo $LongeurBranche ?> "></div>
                    <div class="bloc2" style="width: 7px; height: <?php echo $LongeurBranche ?>px ; display:inline-block; border-bottom: 1px solid black; margin-top: <?php echo $LongeurBranche ?>px; margin-left: -5px; "></div>
                    <div class="bloc3" style="width: 6px; height: <?php echo $LongeurBranche1 ?>px ; display:inline-block; border-bottom: 1px solid black; margin-bottom: <?php echo $LongeurBranche1 ?>px; border-right: 1px solid black; margin-top: -4px; "></div>
                    <div class="bloc4" style="width: 7px; height: <?php echo $LongeurBranche ?>px ; display:inline-block; margin-bottom: <?php echo $LongeurBranche1 ?>px; margin-top: -4px; margin-left: -4px;"></div>
                 <?php }
                 ?></div>
                 <?php
            }
        }
        ?>
    <?php
if(isset($_SESSION['id'])){
//idMatch , idVotant ,idVote quand y clique dessus , verif de l'argent utilisateur , si suffisant , accepter , sinon , indication comme quoi il n'a pas assez d'argents 1, ensuite déduction du nombre d'argents parier du compte du joueur , une fois que le résultat du match et rentrer , envoye de l'information au joueur comme quoi il a gagner (avec le montant d'argent gagner ) ou perdu.


} 
?>
</div>