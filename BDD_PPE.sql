-- phpMyAdmin SQL Dump
-- version 4.2.12deb2
-- http://www.phpmyadmin.net
--
-- Client :  localhost
-- Généré le :  Lun 12 Octobre 2015 à 16:45
-- Version du serveur :  5.5.44-0+deb8u1
-- Version de PHP :  5.6.13-0+deb8u1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données :  `2014-tm_ppe`
--

-- --------------------------------------------------------

--
-- Structure de la table `achat`
--

CREATE TABLE IF NOT EXISTS `achat` (
  `numCommande` int(11) NOT NULL,
  `idProduit` int(11) NOT NULL,
  `idUtilisateur` int(11) NOT NULL,
  `Quantité` int(11) NOT NULL,
  `Date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `achat`
--

INSERT INTO `achat` (`numCommande`, `idProduit`, `idUtilisateur`, `Quantité`, `Date`) VALUES
(1, 1, 1, 2, '0000-00-00'),
(2, 1, 1, 4, '0000-00-00'),
(3, 1, 2, 1, '0000-00-00'),
(4, 3, 3, 10, '0000-00-00');

-- --------------------------------------------------------

--
-- Structure de la table `administrateur`
--

CREATE TABLE IF NOT EXISTS `administrateur` (
  `idUtilisateur` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `administrateur`
--

INSERT INTO `administrateur` (`idUtilisateur`) VALUES
(2);

-- --------------------------------------------------------

--
-- Structure de la table `annonces`
--

CREATE TABLE IF NOT EXISTS `annonces` (
  `idAnnonces` int(11) NOT NULL,
  `messageAnnonce` text,
  `dateAnnonce` date DEFAULT NULL,
  `annonceActive` int(11) DEFAULT NULL,
  `idUtilisateur` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `annonces`
--

INSERT INTO `annonces` (`idAnnonces`, `messageAnnonce`, `dateAnnonce`, `annonceActive`, `idUtilisateur`) VALUES
(1, 'LancementDuSite', '0000-00-00', 0, 2),
(2, 'LancementTournoi', '0000-00-00', 0, 2),
(3, 'InscriptionTournoi', '0000-00-00', 0, 2),
(4, 'MaintenanceDuSite', '0000-00-00', 0, 2),
(5, 'AnnulationTournoi', '0000-00-00', 0, 2),
(6, 'LancementDeLaBoutiqueEnLigne', '0000-00-00', 0, 2);

-- --------------------------------------------------------

--
-- Structure de la table `categorie`
--

CREATE TABLE IF NOT EXISTS `categorie` (
  `idCategorie` int(11) NOT NULL,
  `nomCategorie` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `categorie`
--

INSERT INTO `categorie` (`idCategorie`, `nomCategorie`) VALUES
(1, 'SupportTechnique'),
(2, 'DiscussionGénérales'),
(3, 'BoiteAIdée');

-- --------------------------------------------------------

--
-- Structure de la table `contact`
--

CREATE TABLE IF NOT EXISTS `contact` (
  `idContact` int(11) NOT NULL,
  `idEnvoi` int(11) NOT NULL,
  `idReception` int(11) NOT NULL,
  `titreMessage` varchar(45) DEFAULT NULL,
  `texteMessage` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `contact`
--

INSERT INTO `contact` (`idContact`, `idEnvoi`, `idReception`, `titreMessage`, `texteMessage`) VALUES
(1, 2, 1, 'PrésentationDeLaMessagerie', 'BonjourCeciEstLaMessagerie'),
(2, 3, 2, 'JeSouhaiteM''inscrire', 'jeveuxinscrire'),
(3, 1, 2, 'Candidaturepourlamodération', 'jesouhaitedeveniradmin');

-- --------------------------------------------------------

--
-- Structure de la table `inscription`
--

CREATE TABLE IF NOT EXISTS `inscription` (
  `idUtilisateur` int(11) NOT NULL,
  `idTournoi` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `inscription`
--

INSERT INTO `inscription` (`idUtilisateur`, `idTournoi`) VALUES
(1, 1),
(2, 1),
(3, 1),
(4, 1),
(5, 1),
(6, 1),
(7, 1),
(8, 1);

-- --------------------------------------------------------

--
-- Structure de la table `match`
--

CREATE TABLE IF NOT EXISTS `match` (
  `idMatch` int(11) NOT NULL,
  `idTournoi` int(11) NOT NULL,
  `typeMatch` int(11) NOT NULL,
  `idJoueurUn` int(11) NOT NULL,
  `idJoueurDeux` int(11) NOT NULL,
  `idGagnant` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `match`
--

INSERT INTO `match` (`idMatch`, `idTournoi`, `typeMatch`, `idJoueurUn`, `idJoueurDeux`, `idGagnant`) VALUES
(1, 1, 1, 1, 2, 1),
(2, 1, 2, 1, 3, 1),
(3, 1, 2, 2, 4, 2),
(4, 1, 3, 1, 5, 1),
(5, 1, 3, 3, 6, 3),
(6, 1, 3, 2, 7, 2),
(7, 1, 3, 4, 8, 4);

-- --------------------------------------------------------

--
-- Structure de la table `pari`
--

CREATE TABLE IF NOT EXISTS `pari` (
  `idMatch` int(11) NOT NULL,
  `idVotant` int(11) NOT NULL,
  `idVote` int(11) DEFAULT NULL,
  `mise` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `pari`
--

INSERT INTO `pari` (`idMatch`, `idVotant`, `idVote`, `mise`) VALUES
(1, 1, 1, 10),
(2, 2, 3, 40),
(3, 4, 2, 100);

-- --------------------------------------------------------

--
-- Structure de la table `produit`
--

CREATE TABLE IF NOT EXISTS `produit` (
  `idProduit` int(11) NOT NULL,
  `NomProduit` varchar(45) DEFAULT NULL,
  `Prix` int(11) DEFAULT NULL,
  `Photo` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `produit`
--

INSERT INTO `produit` (`idProduit`, `NomProduit`, `Prix`, `Photo`) VALUES
(1, 'SacPourPortable', 30, NULL),
(2, 'GuidePapierHearthstone', 20, NULL),
(3, 'CasqueGamingAfterGlow', 90, NULL),
(4, 'StickerDécoratif', 5, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `question`
--

CREATE TABLE IF NOT EXISTS `question` (
  `idQuestion` int(11) NOT NULL,
  `titreQuestion` varchar(45) DEFAULT NULL,
  `texteQuestion` text,
  `idUtilisateur` int(11) NOT NULL,
  `idCategorie` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `question`
--

INSERT INTO `question` (`idQuestion`, `titreQuestion`, `texteQuestion`, `idUtilisateur`, `idCategorie`) VALUES
(1, 'PropositionCandiature', 'Jesouhaiteêtradmin', 1, 1),
(2, 'ProbèmeAffichageRésultatsTournois', 'ImpossibleD''afficherLesRésultats', 2, 2);

-- --------------------------------------------------------

--
-- Structure de la table `reponses`
--

CREATE TABLE IF NOT EXISTS `reponses` (
  `idReponses` int(11) NOT NULL,
  `texteReponse` text,
  `idUtilisateur` int(11) NOT NULL,
  `idQuestion` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `reponses`
--

INSERT INTO `reponses` (`idReponses`, `texteReponse`, `idUtilisateur`, `idQuestion`) VALUES
(1, 'Re:Candidature', 1, 1),
(2, 'Re:Candidature', 2, 1),
(3, 'Re:Candidature', 1, 1),
(4, 'Re:ResultatTournois', 3, 2),
(5, 'Re:ResultatTournois', 2, 2);

-- --------------------------------------------------------

--
-- Structure de la table `tournoi`
--

CREATE TABLE IF NOT EXISTS `tournoi` (
  `idTournoi` int(11) NOT NULL,
  `nomTournoi` varchar(45) DEFAULT NULL,
  `nombreParticipantMax` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `tournoi`
--

INSERT INTO `tournoi` (`idTournoi`, `nomTournoi`, `nombreParticipantMax`) VALUES
(1, 'Hearthstone', 4),
(2, 'WoW', 4);

-- --------------------------------------------------------

--
-- Structure de la table `typematch`
--

CREATE TABLE IF NOT EXISTS `typematch` (
  `idTypeMatch` int(11) NOT NULL,
  `nombreParticipants` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `typematch`
--

INSERT INTO `typematch` (`idTypeMatch`, `nombreParticipants`) VALUES
(1, 2),
(2, 4),
(3, 8),
(4, 16),
(5, 32),
(6, 64),
(7, 128),
(8, 256);

-- --------------------------------------------------------

--
-- Structure de la table `utilisateur`
--

CREATE TABLE IF NOT EXISTS `utilisateur` (
  `idUtilisateur` int(11) NOT NULL,
  `NomCompte` varchar(45) DEFAULT NULL,
  `Pseudo` varchar(45) DEFAULT NULL,
  `MotDePasse` varchar(45) DEFAULT NULL,
  `Avatar` varchar(45) DEFAULT NULL,
  `PointTournois` int(11) DEFAULT NULL,
  `PorteMonnaie` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `utilisateur`
--

INSERT INTO `utilisateur` (`idUtilisateur`, `NomCompte`, `Pseudo`, `MotDePasse`, `Avatar`, `PointTournois`, `PorteMonnaie`) VALUES
(1, 'Limi', 'LoupAlpha42', '123', NULL, 0, 0),
(2, 'Turfu91', 'Booba', '456', NULL, 10, 10),
(3, 'Gandoulf', 'Boby', '789', NULL, 50, 1000),
(4, 'skid', 'limdull', '456123', NULL, 0, 20),
(5, 'test', 'test', 'test', NULL, 0, 100),
(6, 'test1', 'test1', 'test1', NULL, 0, 100),
(7, 'test2', 'test2', 'test2', NULL, 0, 100),
(8, 'test3', 'test3', 'test3', NULL, 0, 100),
(9, 'test4', 'test4', 'test4', NULL, 0, 100),
(10, 'test5', 'test5', 'test5', NULL, 0, 100),
(11, 'test6', 'test6', 'test6', NULL, 0, 100),
(12, 'test7', 'test7', 'test7', NULL, 0, 100),
(13, 'test8', 'test8', 'test8', NULL, 0, 100),
(14, 'test9', 'test9', 'test9', NULL, 0, 100),
(15, 'test10', 'test10', 'test10', NULL, 0, 100),
(16, 'test11', 'test11', 'test11', NULL, 0, 100);

--
-- Index pour les tables exportées
--

--
-- Index pour la table `achat`
--
ALTER TABLE `achat`
 ADD PRIMARY KEY (`numCommande`), ADD KEY `produit` (`idProduit`), ADD KEY `client` (`idUtilisateur`);

--
-- Index pour la table `administrateur`
--
ALTER TABLE `administrateur`
 ADD PRIMARY KEY (`idUtilisateur`);

--
-- Index pour la table `annonces`
--
ALTER TABLE `annonces`
 ADD PRIMARY KEY (`idAnnonces`), ADD KEY `annonce` (`idUtilisateur`);

--
-- Index pour la table `categorie`
--
ALTER TABLE `categorie`
 ADD PRIMARY KEY (`idCategorie`);

--
-- Index pour la table `contact`
--
ALTER TABLE `contact`
 ADD PRIMARY KEY (`idContact`), ADD KEY `envoi` (`idEnvoi`), ADD KEY `reception` (`idReception`);

--
-- Index pour la table `inscription`
--
ALTER TABLE `inscription`
 ADD PRIMARY KEY (`idUtilisateur`,`idTournoi`), ADD KEY `iTournoi` (`idTournoi`);

--
-- Index pour la table `match`
--
ALTER TABLE `match`
 ADD PRIMARY KEY (`idMatch`), ADD KEY `mTournoi` (`idTournoi`), ADD KEY `mTypeMatch` (`typeMatch`), ADD KEY `mJoueurUn` (`idJoueurUn`), ADD KEY `mJoueurDeux` (`idJoueurDeux`), ADD KEY `mWin` (`idGagnant`);

--
-- Index pour la table `pari`
--
ALTER TABLE `pari`
 ADD PRIMARY KEY (`idMatch`,`idVotant`), ADD KEY `pVotant` (`idVotant`), ADD KEY `pVote` (`idVote`);

--
-- Index pour la table `produit`
--
ALTER TABLE `produit`
 ADD PRIMARY KEY (`idProduit`);

--
-- Index pour la table `question`
--
ALTER TABLE `question`
 ADD PRIMARY KEY (`idQuestion`), ADD KEY `question` (`idUtilisateur`), ADD KEY `categorie` (`idCategorie`);

--
-- Index pour la table `reponses`
--
ALTER TABLE `reponses`
 ADD PRIMARY KEY (`idReponses`), ADD KEY `rUtilisateur` (`idUtilisateur`), ADD KEY `rQuestion` (`idQuestion`);

--
-- Index pour la table `tournoi`
--
ALTER TABLE `tournoi`
 ADD PRIMARY KEY (`idTournoi`);

--
-- Index pour la table `typematch`
--
ALTER TABLE `typematch`
 ADD PRIMARY KEY (`idTypeMatch`);

--
-- Index pour la table `utilisateur`
--
ALTER TABLE `utilisateur`
 ADD PRIMARY KEY (`idUtilisateur`);

--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `achat`
--
ALTER TABLE `achat`
ADD CONSTRAINT `produit` FOREIGN KEY (`idProduit`) REFERENCES `produit` (`idProduit`),
ADD CONSTRAINT `client` FOREIGN KEY (`idUtilisateur`) REFERENCES `utilisateur` (`idUtilisateur`);

--
-- Contraintes pour la table `administrateur`
--
ALTER TABLE `administrateur`
ADD CONSTRAINT `user` FOREIGN KEY (`idUtilisateur`) REFERENCES `utilisateur` (`idUtilisateur`);

--
-- Contraintes pour la table `annonces`
--
ALTER TABLE `annonces`
ADD CONSTRAINT `annonce` FOREIGN KEY (`idUtilisateur`) REFERENCES `administrateur` (`idUtilisateur`);

--
-- Contraintes pour la table `contact`
--
ALTER TABLE `contact`
ADD CONSTRAINT `envoi` FOREIGN KEY (`idEnvoi`) REFERENCES `utilisateur` (`idUtilisateur`),
ADD CONSTRAINT `reception` FOREIGN KEY (`idReception`) REFERENCES `utilisateur` (`idUtilisateur`);

--
-- Contraintes pour la table `inscription`
--
ALTER TABLE `inscription`
ADD CONSTRAINT `iUtilisateur` FOREIGN KEY (`idUtilisateur`) REFERENCES `utilisateur` (`idUtilisateur`),
ADD CONSTRAINT `iTournoi` FOREIGN KEY (`idTournoi`) REFERENCES `tournoi` (`idTournoi`);

--
-- Contraintes pour la table `match`
--
ALTER TABLE `match`
ADD CONSTRAINT `mWin` FOREIGN KEY (`idGagnant`) REFERENCES `inscription` (`idUtilisateur`),
ADD CONSTRAINT `mTournoi` FOREIGN KEY (`idTournoi`) REFERENCES `tournoi` (`idTournoi`),
ADD CONSTRAINT `mTypeMatch` FOREIGN KEY (`typeMatch`) REFERENCES `typematch` (`idTypeMatch`),
ADD CONSTRAINT `mUserDeux` FOREIGN KEY (`idJoueurDeux`) REFERENCES `inscription` (`idUtilisateur`),
ADD CONSTRAINT `mUserUn` FOREIGN KEY (`idJoueurUn`) REFERENCES `inscription` (`idUtilisateur`);

--
-- Contraintes pour la table `pari`
--
ALTER TABLE `pari`
ADD CONSTRAINT `pMatch` FOREIGN KEY (`idMatch`) REFERENCES `match` (`idMatch`),
ADD CONSTRAINT `pVotant` FOREIGN KEY (`idVotant`) REFERENCES `utilisateur` (`idUtilisateur`),
ADD CONSTRAINT `pVote` FOREIGN KEY (`idVote`) REFERENCES `utilisateur` (`idUtilisateur`);

--
-- Contraintes pour la table `question`
--
ALTER TABLE `question`
ADD CONSTRAINT `question` FOREIGN KEY (`idUtilisateur`) REFERENCES `utilisateur` (`idUtilisateur`),
ADD CONSTRAINT `categorie` FOREIGN KEY (`idCategorie`) REFERENCES `categorie` (`idCategorie`);

--
-- Contraintes pour la table `reponses`
--
ALTER TABLE `reponses`
ADD CONSTRAINT `rUtilisateur` FOREIGN KEY (`idUtilisateur`) REFERENCES `utilisateur` (`idUtilisateur`),
ADD CONSTRAINT `rQuestion` FOREIGN KEY (`idQuestion`) REFERENCES `question` (`idQuestion`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
