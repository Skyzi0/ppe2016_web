
INSERT INTO `2014-tm_ppe`.`utilisateur` (`idUtilisateur`, `NomCompte`, `Pseudo`, `MotDePasse`, `PointTournois`, `PorteMonnaie`) VALUES ('1', 'Limi', 'LoupAlpha42', '123', '0', '0');
INSERT INTO `2014-tm_ppe`.`utilisateur` (`idUtilisateur`, `NomCompte`, `Pseudo`, `MotDePasse`, `PointTournois`, `PorteMonnaie`) VALUES ('2', 'Turfu91', 'Booba', '456', '10', '10');
INSERT INTO `2014-tm_ppe`.`utilisateur` (`idUtilisateur`, `NomCompte`, `Pseudo`, `MotDePasse`, `PointTournois`, `PorteMonnaie`) VALUES ('3', 'Gandoulf', 'Boby', '789', '50', '1000');
INSERT INTO `2014-tm_ppe`.`utilisateur` (`idUtilisateur`, `NomCompte`, `Pseudo`, `MotDePasse`, `PointTournois`, `PorteMonnaie`) VALUES ('4', 'skid', 'limdull', '456123', '0', '20');



INSERT INTO `2014-tm_ppe`.`produit` (`idProduit`, `NomProduit`, `Prix`) VALUES ('3', 'SacPourPortable', '30');
INSERT INTO `2014-tm_ppe`.`produit` (`idProduit`, `NomProduit`, `Prix`) VALUES ('4', 'GuidePapierHearthstone', '20');
INSERT INTO `2014-tm_ppe`.`produit` (`idProduit`, `NomProduit`, `Prix`) VALUES ('5', 'CasqueGamingAfterGlow', '90');
INSERT INTO `2014-tm_ppe`.`produit` (`idProduit`, `NomProduit`, `Prix`) VALUES ('6', 'StickerDécoratif', '5');



INSERT INTO `2014-tm_ppe`.`achat` (`numCommande`, `idProduit`, `idUtilisateur`, `Quantité`, `Date`) VALUES ('1', '1', '1', '2', '04/10/2016');
INSERT INTO `2014-tm_ppe`.`achat` (`numCommande`, `idProduit`, `idUtilisateur`, `Quantité`, `Date`) VALUES ('2', '1', '1', '4', '05/10/2016');
INSERT INTO `2014-tm_ppe`.`achat` (`numCommande`, `idProduit`, `idUtilisateur`, `Quantité`, `Date`) VALUES ('3', '1', '2', '1', '04/10/2016');
INSERT INTO `2014-tm_ppe`.`achat` (`numCommande`, `idProduit`, `idUtilisateur`, `Quantité`, `Date`) VALUES ('4', '3', '3', '10', '15/09/2016');


INSERT INTO `2014-tm_ppe`.`administrateur` (`idUtilisateur`) VALUES ('2');



INSERT INTO `2014-tm_ppe`.`annonces` (`idAnnonces`, `messageAnnonce`, `dateAnnonce`, `annonceActive`, `idUtilisateur`) VALUES ('1', 'LancementDuSite', '2016-04-08', 'true', '2');
INSERT INTO `2014-tm_ppe`.`annonces` (`idAnnonces`, `messageAnnonce`, `dateAnnonce`, `annonceActive`, `idUtilisateur`) VALUES ('2', 'LancementTournoi', '2016-04-08', 'true', '2');
INSERT INTO `2014-tm_ppe`.`annonces` (`idAnnonces`, `messageAnnonce`, `dateAnnonce`, `annonceActive`, `idUtilisateur`) VALUES ('3', 'InscriptionTournoi', '2016-04-08', 'true', '2');
INSERT INTO `2014-tm_ppe`.`annonces` (`idAnnonces`, `messageAnnonce`, `dateAnnonce`, `annonceActive`, `idUtilisateur`) VALUES ('4', 'MaintenanceDuSite', '2016-05-16', 'false', '2');
INSERT INTO `2014-tm_ppe`.`annonces` (`idAnnonces`, `messageAnnonce`, `dateAnnonce`, `annonceActive`, `idUtilisateur`) VALUES ('5', 'AnnulationTournoi', '2016-07-01', 'false', '2');
INSERT INTO `2014-tm_ppe`.`annonces` (`idAnnonces`, `messageAnnonce`, `dateAnnonce`, `annonceActive`, `idUtilisateur`) VALUES ('6', 'LancementDeLaBoutiqueEnLigne', '2016-07-30', 'false', '2');



INSERT INTO `2014-tm_ppe`.`contact` (`idContact`, `idEnvoi`, `idReception`, `titreMessage`, `texteMessage`) VALUES ('1', '2', '1', 'PrésentationDeLaMessagerie', 'BonjourCeciEstLaMessagerie');
INSERT INTO `2014-tm_ppe`.`contact` (`idContact`, `idEnvoi`, `idReception`, `titreMessage`, `texteMessage`) VALUES ('2', '3', '2', 'JeSouhaiteM\'inscrire', 'jeveuxinscrire');
INSERT INTO `2014-tm_ppe`.`contact` (`idContact`, `idEnvoi`, `idReception`, `titreMessage`, `texteMessage`) VALUES ('3', '1', '2', 'Candidaturepourlamodération', 'jesouhaitedeveniradmin');



INSERT INTO `2014-tm_ppe`.`categorie` (`idCategorie`, `nomCategorie`) VALUES ('1', 'SupportTechnique');
INSERT INTO `2014-tm_ppe`.`categorie` (`idCategorie`, `nomCategorie`) VALUES ('2', 'DiscussionGénérales');
INSERT INTO `2014-tm_ppe`.`categorie` (`idCategorie`, `nomCategorie`) VALUES ('3', 'BoiteAIdée');



INSERT INTO `2014-tm_ppe`.`question` (`idQuestion`, `titreQuestion`, `texteQuestion`, `idUtilisateur`, `idCategorie`) VALUES ('1', 'PropositionCandiature', 'Jesouhaiteêtradmin', '1', '1');
INSERT INTO `2014-tm_ppe`.`question` (`idQuestion`, `titreQuestion`, `texteQuestion`, `idUtilisateur`, `idCategorie`) VALUES ('2', 'ProbèmeAffichageRésultatsTournois', 'ImpossibleD\'afficherLesRésultats', '2', '2');



INSERT INTO `2014-tm_ppe`.`reponses` (`idReponses`, `texteReponse`, `idUtilisateur`, `idQuestion`) VALUES ('1', 'Re:Candidature', '1', '1');
INSERT INTO `2014-tm_ppe`.`reponses` (`idReponses`, `texteReponse`, `idUtilisateur`, `idQuestion`) VALUES ('2', 'Re:Candidature', '2', '1');
INSERT INTO `2014-tm_ppe`.`reponses` (`idReponses`, `texteReponse`, `idUtilisateur`, `idQuestion`) VALUES ('3', 'Re:Candidature', '1', '1');
INSERT INTO `2014-tm_ppe`.`reponses` (`idReponses`, `texteReponse`, `idUtilisateur`, `idQuestion`) VALUES ('4', 'Re:ResultatTournois', '3', '2');
INSERT INTO `2014-tm_ppe`.`reponses` (`idReponses`, `texteReponse`, `idUtilisateur`, `idQuestion`) VALUES ('5', 'Re:ResultatTournois', '2', '2');



INSERT INTO `2014-tm_ppe`.`tournoi` (`idTournoi`, `nomTournoi`, `nombreParticipantMax`) VALUES ('1', 'Hearthstone', '4');
INSERT INTO `2014-tm_ppe`.`tournoi` (`idTournoi`, `nomTournoi`, `nombreParticipantMax`) VALUES ('2', 'WoW', '4');



INSERT INTO `2014-tm_ppe`.`inscription` (`idUtilisateur`, `idTournoi`) VALUES ('1', '1');
INSERT INTO `2014-tm_ppe`.`inscription` (`idUtilisateur`, `idTournoi`) VALUES ('2', '1');
INSERT INTO `2014-tm_ppe`.`inscription` (`idUtilisateur`, `idTournoi`) VALUES ('3', '1');
INSERT INTO `2014-tm_ppe`.`inscription` (`idUtilisateur`, `idTournoi`) VALUES ('4', '1');
INSERT INTO `2014-tm_ppe`.`inscription` (`idUtilisateur`, `idTournoi`) VALUES ('1', '2');
INSERT INTO `2014-tm_ppe`.`inscription` (`idUtilisateur`, `idTournoi`) VALUES ('2', '2');
INSERT INTO `2014-tm_ppe`.`inscription` (`idUtilisateur`, `idTournoi`) VALUES ('3', '2');
INSERT INTO `2014-tm_ppe`.`inscription` (`idUtilisateur`, `idTournoi`) VALUES ('4', '2');


INSERT INTO `2014-tm_ppe`.`typematch` (`idTypeMatch`, `nomTypeMatch`) VALUES ('1', 'Régle 1');
INSERT INTO `2014-tm_ppe`.`typematch` (`idTypeMatch`, `nomTypeMatch`) VALUES ('2', 'Régle 2');
INSERT INTO `2014-tm_ppe`.`typematch` (`idTypeMatch`, `nomTypeMatch`) VALUES ('3', 'Régle 3');



INSERT INTO `2014-tm_ppe`.`match` (`idMatch`, `idTournoi`, `typeMatch`, `idJoueurUn`, `idJoueurDeux`) VALUES ('1', '1', '1', '1', '2');
INSERT INTO `2014-tm_ppe`.`match` (`idMatch`, `idTournoi`, `typeMatch`, `idJoueurUn`, `idJoueurDeux`) VALUES ('2', '1', '1', '4', '3');
INSERT INTO `2014-tm_ppe`.`match` (`idMatch`, `idTournoi`, `typeMatch`, `idJoueurUn`, `idJoueurDeux`) VALUES ('3', '1', '1', '1', '4');
INSERT INTO `2014-tm_ppe`.`match` (`idMatch`, `idTournoi`, `typeMatch`, `idJoueurUn`, `idJoueurDeux`) VALUES ('4', '2', '2', '1', '2');
INSERT INTO `2014-tm_ppe`.`match` (`idMatch`, `idTournoi`, `typeMatch`, `idJoueurUn`, `idJoueurDeux`) VALUES ('5', '2', '2', '3', '4');
INSERT INTO `2014-tm_ppe`.`match` (`idMatch`, `idTournoi`, `typeMatch`, `idJoueurUn`, `idJoueurDeux`) VALUES ('6', '2', '2', '2', '4');



INSERT INTO `2014-tm_ppe`.`pari` (`idMatch`, `idVotant`, `idVote`, `mise`) VALUES ('1', '1', '1', '10');
INSERT INTO `2014-tm_ppe`.`pari` (`idMatch`, `idVotant`, `idVote`, `mise`) VALUES ('2', '2', '3', '40');
INSERT INTO `2014-tm_ppe`.`pari` (`idMatch`, `idVotant`, `idVote`, `mise`) VALUES ('3', '4', '2', '100');
