-- phpMyAdmin SQL Dump
-- version 4.9.5
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost:3306
-- Généré le : mer. 29 avr. 2020 à 22:38
-- Version du serveur :  10.3.16-MariaDB
-- Version de PHP : 7.3.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `discord`
--
CREATE DATABASE IF NOT EXISTS `discord` DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci;
USE `discord`;

-- --------------------------------------------------------

--
-- Structure de la table `applications`
--

CREATE TABLE `applications` (
  `applicationId` int(11) NOT NULL,
  `applicationFirstName` varchar(100) DEFAULT NULL,
  `applicationSecondName` varchar(100) DEFAULT NULL,
  `applicationBirthDay` varchar(10) DEFAULT NULL,
  `applicationSubject` varchar(500) DEFAULT NULL,
  `applicationMotivation` varchar(25000) DEFAULT NULL,
  `applicationDate` varchar(10) DEFAULT NULL,
  `applicationStatut` varchar(500) DEFAULT NULL,
  `applicationVisibility` tinyint(1) DEFAULT NULL,
  `applicationArchive` tinyint(1) DEFAULT NULL,
  `applicationEmail` varchar(200) DEFAULT NULL,
  `applicationDiscord` varchar(200) DEFAULT NULL,
  `userId` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `applications`
--

INSERT INTO `applications` (`applicationId`, `applicationFirstName`, `applicationSecondName`, `applicationBirthDay`, `applicationSubject`, `applicationMotivation`, `applicationDate`, `applicationStatut`, `applicationVisibility`, `applicationArchive`, `applicationEmail`, `applicationDiscord`, `userId`) VALUES
(1, 'Samuel', 'Brosse', '04/02/2000', 'Candidature', 'Tempore quo primis auspiciis in mundanum fulgorem surgeret victura dum erunt homines Roma, ut augeretur sublimibus incrementis, foedere pacis aeternae Virtus convenit atque Fortuna plerumque dissidentes, quarum si altera defuisset, ad perfectam non venerat summitatem.', '26-04-2020', 'Validée', 0, 0, 'brosse.samuel@brindustries.fr', 'SurprisK#4499', 1),
(2, 'Samuel', 'Brosse', '04/02/2000', 'Candidature', 'Thalassius vero ea tempestate praefectus praetorio praesens ipse quoque adrogantis ingenii, considerans incitationem eius ad multorum augeri discrimina, non maturitate vel consiliis mitigabat, ut aliquotiens celsae potestates iras principum molliverunt, sed adversando iurgandoque cum parum congrueret, eum ad rabiem potius evibrabat, Augustum actus eius exaggerando creberrime docens, idque, incertum qua mente, ne lateret adfectans. quibus mox Caesar acrius efferatus, velut contumaciae quoddam vexillum altius erigens, sine respectu salutis alienae vel suae ad vertenda opposita instar rapidi fluminis irrevocabili impetu ferebatur.', '26-04-2020', 'En cours de traitement', 1, 0, 'brosse.samuel@brindustries.fr', 'SurprisK#4499', NULL),
(3, 'test', 'test', '01/01/1990', 'test', 'test', '26-04-2020', 'En cours de traitement', 1, 0, 'test@brindustries.fr', 'test#4499', NULL);

-- --------------------------------------------------------

--
-- Structure de la table `requests`
--

CREATE TABLE `requests` (
  `requestId` int(11) NOT NULL,
  `requestName` varchar(100) DEFAULT NULL,
  `requestDesc` varchar(10000) DEFAULT NULL,
  `requestDate` varchar(10) DEFAULT NULL,
  `requestStatut` varchar(500) DEFAULT NULL,
  `requestVisibility` tinyint(1) DEFAULT NULL,
  `requestArchive` tinyint(1) DEFAULT NULL,
  `userId` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `requests`
--

INSERT INTO `requests` (`requestId`, `requestName`, `requestDesc`, `requestDate`, `requestStatut`, `requestVisibility`, `requestArchive`, `userId`) VALUES
(2, 'SurprisK#4499', 'Tempore quo primis auspiciis in mundanum fulgorem surgeret victura dum erunt homines Roma, ut augeretur sublimibus incrementis, foedere pacis aeternae Virtus convenit atque Fortuna plerumque dissidentes, quarum si altera defuisset, ad perfectam non venerat summitatem.', '26-04-2020', 'En cours de traitement', 1, 0, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `userId` int(11) NOT NULL,
  `userName` varchar(100) DEFAULT NULL,
  `userPass` varchar(100) DEFAULT NULL,
  `userType` int(11) NOT NULL,
  `userDate` varchar(10) DEFAULT NULL,
  `userBirthDay` varchar(10) DEFAULT NULL,
  `userAddress` varchar(500) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`userId`, `userName`, `userPass`, `userType`, `userDate`, `userBirthDay`, `userAddress`) VALUES
(1, 'a', '0cc175b9c0f1b6a831c399e269772661', 0, NULL, NULL, NULL),
(2, 'Lorem', 'e78f5438b48b39bcbdea61b73679449d', 1, '26-04-2020', NULL, NULL),
(3, 'Ipsum', 'd2e16e6ef52a45b7468f1da56bba1953', 2, '26-04-2020', NULL, NULL);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `applications`
--
ALTER TABLE `applications`
  ADD PRIMARY KEY (`applicationId`),
  ADD KEY `userId` (`userId`);

--
-- Index pour la table `requests`
--
ALTER TABLE `requests`
  ADD PRIMARY KEY (`requestId`),
  ADD KEY `userId` (`userId`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`userId`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `applications`
--
ALTER TABLE `applications`
  MODIFY `applicationId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `requests`
--
ALTER TABLE `requests`
  MODIFY `requestId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `userId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `applications`
--
ALTER TABLE `applications`
  ADD CONSTRAINT `applications_ibfk_1` FOREIGN KEY (`userId`) REFERENCES `users` (`userId`),
  ADD CONSTRAINT `applications_ibfk_2` FOREIGN KEY (`userId`) REFERENCES `users` (`userId`);

--
-- Contraintes pour la table `requests`
--
ALTER TABLE `requests`
  ADD CONSTRAINT `requests_ibfk_1` FOREIGN KEY (`userId`) REFERENCES `users` (`userId`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
