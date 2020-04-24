-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  lun. 13 avr. 2020 à 11:37
-- Version du serveur :  10.4.10-MariaDB
-- Version de PHP :  7.3.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `nantflix`
--

-- --------------------------------------------------------

--
-- Structure de la table `regarde`
--

DROP TABLE IF EXISTS `regarde`;
CREATE TABLE IF NOT EXISTS `regarde` (
  `RefEpisode` int(3) NOT NULL AUTO_INCREMENT,
  `RefUtilisateur` varchar(30) NOT NULL,
  KEY `RefUtilisateur` (`RefUtilisateur`),
  KEY `regarde_ibfk_1` (`RefEpisode`)
) ENGINE=InnoDB AUTO_INCREMENT=247 DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `serie`
--

DROP TABLE IF EXISTS `serie`;
CREATE TABLE IF NOT EXISTS `serie` (
  `intitule` varchar(40) NOT NULL,
  `Nb_Episodes` int(3) NOT NULL,
  `Annee_sortie` int(4) NOT NULL,
  `realisateur` varchar(30) NOT NULL,
  `acteurs_principaux` varchar(100) NOT NULL,
  PRIMARY KEY (`intitule`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `serie`
--

INSERT INTO `serie` (`intitule`, `Nb_Episodes`, `Annee_sortie`, `realisateur`, `acteurs_principaux`) VALUES
('Game of Thrones', 73, 2011, 'Mark Huffam', 'Kit Harington, Peter Dinklage, Emilia Clarke'),
('La casa de papel', 30, 2017, 'Alex Pina', 'Alba Flores, Ursula Corbero, Alvaro Morte'),
('Narcos', 30, 2015, 'Chris Bancato', 'Jose Padilha, Eric Newman, Doug Miro'),
('Validé', 10, 2020, 'Franck Gastambide', 'Hatik, Reda Outazgui, Brahim Bouhlel'),
('Walking Dead', 143, 2010, 'Frank Darabont', 'Andrew Lincoln, Norman Reedus, Steven Yeun');

-- --------------------------------------------------------

--
-- Structure de la table `utilisateur`
--

DROP TABLE IF EXISTS `utilisateur`;
CREATE TABLE IF NOT EXISTS `utilisateur` (
  `adresse_mail` varchar(30) NOT NULL,
  `mdp` varchar(30) NOT NULL,
  `nom` varchar(30) NOT NULL,
  `prenom` varchar(30) NOT NULL,
  `sexe` varchar(10) NOT NULL,
  `date_naissance` int(4) NOT NULL,
  `tel` int(11) DEFAULT NULL,
  PRIMARY KEY (`adresse_mail`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `utilisateur`
--

INSERT INTO `utilisateur` (`adresse_mail`, `mdp`, `nom`, `prenom`, `sexe`, `date_naissance`, `tel`) VALUES
('exemple@messagerie.com', 'exemple123', 'nom', 'prenom', 'on', 1995, 606060606);

-- --------------------------------------------------------

--
-- Structure de la table `épisode`
--

DROP TABLE IF EXISTS `épisode`;
CREATE TABLE IF NOT EXISTS `épisode` (
  `Id_Episode` int(3) NOT NULL AUTO_INCREMENT,
  `N°Episode` int(3) NOT NULL,
  `Refserie` varchar(40) NOT NULL,
  `duree` time NOT NULL DEFAULT '00:01:00',
  `note` float NOT NULL DEFAULT 5,
  PRIMARY KEY (`Id_Episode`),
  KEY `Refserie` (`Refserie`)
) ENGINE=InnoDB AUTO_INCREMENT=288 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `épisode`
--

INSERT INTO `épisode` (`Id_Episode`, `N°Episode`, `Refserie`, `duree`, `note`) VALUES
(147, 1, 'Game of Thrones', '00:01:00', 5),
(148, 2, 'Game of Thrones', '00:01:00', 5),
(149, 3, 'Game of Thrones', '00:01:00', 5),
(150, 4, 'Game of Thrones', '00:01:00', 5),
(151, 5, 'Game of Thrones', '00:01:00', 5),
(152, 6, 'Game of Thrones', '00:01:00', 5),
(153, 7, 'Game of Thrones', '00:01:00', 5),
(154, 8, 'Game of Thrones', '00:01:00', 5),
(155, 9, 'Game of Thrones', '00:01:00', 5),
(156, 10, 'Game of Thrones', '00:01:00', 5),
(157, 11, 'Game of Thrones', '00:01:00', 5),
(158, 12, 'Game of Thrones', '00:01:00', 5),
(159, 13, 'Game of Thrones', '00:01:00', 5),
(160, 14, 'Game of Thrones', '00:01:00', 5),
(161, 15, 'Game of Thrones', '00:01:00', 5),
(162, 16, 'Game of Thrones', '00:01:00', 5),
(163, 17, 'Game of Thrones', '00:01:00', 5),
(164, 18, 'Game of Thrones', '00:01:00', 5),
(165, 19, 'Game of Thrones', '00:01:00', 5),
(166, 20, 'Game of Thrones', '00:01:00', 5),
(167, 21, 'Game of Thrones', '00:01:00', 5),
(168, 22, 'Game of Thrones', '00:01:00', 5),
(169, 23, 'Game of Thrones', '00:01:00', 5),
(170, 24, 'Game of Thrones', '00:01:00', 5),
(171, 25, 'Game of Thrones', '00:01:00', 5),
(172, 26, 'Game of Thrones', '00:01:00', 5),
(173, 27, 'Game of Thrones', '00:01:00', 5),
(174, 28, 'Game of Thrones', '00:01:00', 5),
(175, 29, 'Game of Thrones', '00:01:00', 5),
(176, 1, 'La casa de papel', '00:01:00', 5),
(177, 2, 'La casa de papel', '00:01:00', 5),
(178, 3, 'La casa de papel', '00:01:00', 5),
(179, 4, 'La casa de papel', '00:01:00', 5),
(180, 5, 'La casa de papel', '00:01:00', 5),
(181, 6, 'La casa de papel', '00:01:00', 5),
(182, 7, 'La casa de papel', '00:01:00', 5),
(183, 8, 'La casa de papel', '00:01:00', 5),
(184, 9, 'La casa de papel', '00:01:00', 5),
(185, 10, 'La casa de papel', '00:01:00', 5),
(186, 11, 'La casa de papel', '00:01:00', 5),
(187, 12, 'La casa de papel', '00:01:00', 5),
(188, 13, 'La casa de papel', '00:01:00', 5),
(189, 14, 'La casa de papel', '00:01:00', 5),
(190, 15, 'La casa de papel', '00:01:00', 5),
(191, 16, 'La casa de papel', '00:01:00', 5),
(192, 17, 'La casa de papel', '00:01:00', 5),
(193, 18, 'La casa de papel', '00:01:00', 5),
(194, 19, 'La casa de papel', '00:01:00', 5),
(195, 20, 'La casa de papel', '00:01:00', 5),
(196, 21, 'La casa de papel', '00:01:00', 5),
(197, 22, 'La casa de papel', '00:01:00', 5),
(198, 23, 'La casa de papel', '00:01:00', 5),
(199, 24, 'La casa de papel', '00:01:00', 5),
(200, 25, 'La casa de papel', '00:01:00', 5),
(201, 26, 'La casa de papel', '00:01:00', 5),
(202, 27, 'La casa de papel', '00:01:00', 5),
(203, 28, 'La casa de papel', '00:01:00', 5),
(204, 29, 'La casa de papel', '00:01:00', 5),
(205, 30, 'La casa de papel', '00:01:00', 5),
(206, 1, 'Narcos', '00:01:00', 5),
(207, 2, 'Narcos', '00:01:00', 5),
(208, 3, 'Narcos', '00:01:00', 5),
(209, 4, 'Narcos', '00:01:00', 5),
(210, 5, 'Narcos', '00:01:00', 5),
(211, 6, 'Narcos', '00:01:00', 5),
(212, 7, 'Narcos', '00:01:00', 5),
(213, 8, 'Narcos', '00:01:00', 5),
(214, 9, 'Narcos', '00:01:00', 5),
(215, 10, 'Narcos', '00:01:00', 5),
(216, 11, 'Narcos', '00:01:00', 5),
(217, 12, 'Narcos', '00:01:00', 5),
(218, 13, 'Narcos', '00:01:00', 5),
(219, 14, 'Narcos', '00:01:00', 5),
(220, 15, 'Narcos', '00:01:00', 5),
(221, 16, 'Narcos', '00:01:00', 5),
(222, 17, 'Narcos', '00:01:00', 5),
(223, 18, 'Narcos', '00:01:00', 5),
(224, 19, 'Narcos', '00:01:00', 5),
(225, 20, 'Narcos', '00:01:00', 5),
(226, 21, 'Narcos', '00:01:00', 5),
(227, 22, 'Narcos', '00:01:00', 5),
(228, 23, 'Narcos', '00:01:00', 5),
(229, 24, 'Narcos', '00:01:00', 5),
(230, 25, 'Narcos', '00:01:00', 5),
(231, 26, 'Narcos', '00:01:00', 5),
(232, 27, 'Narcos', '00:01:00', 5),
(233, 28, 'Narcos', '00:01:00', 5),
(234, 29, 'Narcos', '00:01:00', 5),
(235, 30, 'Narcos', '00:01:00', 5),
(236, 1, 'Validé', '00:01:00', 5),
(237, 2, 'Validé', '00:01:00', 5),
(238, 3, 'Validé', '00:01:00', 5),
(239, 4, 'Validé', '00:01:00', 5),
(240, 5, 'Validé', '00:01:00', 5),
(241, 6, 'Validé', '00:01:00', 5),
(242, 7, 'Validé', '00:01:00', 5),
(243, 8, 'Validé', '00:01:00', 5),
(244, 9, 'Validé', '00:01:00', 5),
(245, 10, 'Validé', '00:01:00', 5),
(246, 1, 'Walking dead', '00:01:00', 5),
(247, 2, 'Walking dead', '00:01:00', 5),
(248, 3, 'Walking dead', '00:01:00', 5),
(249, 4, 'Walking dead', '00:01:00', 5),
(250, 5, 'Walking dead', '00:01:00', 5),
(251, 6, 'Walking dead', '00:01:00', 5),
(252, 7, 'Walking dead', '00:01:00', 5),
(253, 8, 'Walking dead', '00:01:00', 5),
(254, 9, 'Walking dead', '00:01:00', 5),
(255, 10, 'Walking dead', '00:01:00', 5),
(256, 11, 'Walking dead', '00:01:00', 5),
(257, 12, 'Walking dead', '00:01:00', 5),
(258, 13, 'Walking dead', '00:01:00', 5),
(259, 14, 'Walking dead', '00:01:00', 5),
(260, 15, 'Walking dead', '00:01:00', 5),
(261, 16, 'Walking dead', '00:01:00', 5),
(262, 17, 'Walking dead', '00:01:00', 5),
(263, 18, 'Walking dead', '00:01:00', 5),
(264, 19, 'Walking dead', '00:01:00', 5),
(265, 20, 'Walking dead', '00:01:00', 5),
(266, 21, 'Walking dead', '00:01:00', 5),
(267, 22, 'Walking dead', '00:01:00', 5),
(268, 23, 'Walking dead', '00:01:00', 5),
(269, 24, 'Walking dead', '00:01:00', 5),
(270, 25, 'Walking dead', '00:01:00', 5),
(271, 26, 'Walking dead', '00:01:00', 5),
(272, 27, 'Walking dead', '00:01:00', 5),
(273, 28, 'Walking dead', '00:01:00', 5),
(274, 29, 'Walking dead', '00:01:00', 5),
(275, 30, 'Walking dead', '00:01:00', 5),
(276, 31, 'Walking dead', '00:01:00', 5),
(277, 32, 'Walking dead', '00:01:00', 5),
(278, 33, 'Walking dead', '00:01:00', 5),
(279, 34, 'Walking dead', '00:01:00', 5),
(280, 35, 'Walking dead', '00:01:00', 5),
(281, 36, 'Walking dead', '00:01:00', 5),
(282, 37, 'Walking dead', '00:01:00', 5),
(283, 38, 'Walking dead', '00:01:00', 5),
(284, 39, 'Walking dead', '00:01:00', 5),
(285, 40, 'Walking dead', '00:01:00', 5),
(286, 41, 'Walking dead', '00:01:00', 5),
(287, 42, 'Walking dead', '00:01:00', 5);

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `regarde`
--
ALTER TABLE `regarde`
  ADD CONSTRAINT `regarde_ibfk_1` FOREIGN KEY (`RefEpisode`) REFERENCES `épisode` (`Id_Episode`),
  ADD CONSTRAINT `regarde_ibfk_2` FOREIGN KEY (`RefUtilisateur`) REFERENCES `utilisateur` (`adresse_mail`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
