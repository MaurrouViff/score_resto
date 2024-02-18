-- phpMyAdmin SQL Dump
-- version 4.5.4.1
-- http://www.phpmyadmin.net
--
-- Client :  localhost
-- Généré le :  Dim 18 Février 2024 à 16:26
-- Version du serveur :  5.7.11
-- Version de PHP :  7.2.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `bd_resto_view`
--

-- --------------------------------------------------------

--
-- Structure de la table `aimer`
--

CREATE TABLE `aimer` (
  `idR` bigint(20) NOT NULL,
  `mailU` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Contenu de la table `aimer`
--

INSERT INTO `aimer` (`idR`, `mailU`) VALUES
(1, 'achille@tallon.fr'),
(8, 'achille@tallon.fr'),
(1, 'bugs.bunny@gmail.com'),
(2, 'bugs.bunny@gmail.com'),
(3, 'bugs.bunny@gmail.com'),
(4, 'bugs.bunny@gmail.com'),
(7, 'bugs.bunny@gmail.com'),
(8, 'bugs.bunny@gmail.com'),
(10, 'gaston.lagaffe@gmail.com'),
(11, 'john.doe@gmail.com'),
(1, 'mdp@mdp.mdp'),
(3, 'mdp@mdp.mdp'),
(1, 'michel.garay@gmail.com'),
(4, 'test@bts.sio'),
(5, 'test@bts.sio'),
(7, 'test@bts.sio'),
(8, 'test@bts.sio');

-- --------------------------------------------------------

--
-- Structure de la table `critiquer`
--

CREATE TABLE `critiquer` (
  `idR` bigint(20) NOT NULL,
  `mailU` varchar(150) NOT NULL,
  `note` int(11) DEFAULT NULL,
  `commentaire` varchar(4096) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Contenu de la table `critiquer`
--

INSERT INTO `critiquer` (`idR`, `mailU`, `note`, `commentaire`) VALUES
(1, 'achille@tallon.fr', 5, NULL),
(1, 'bugs.bunny@gmail.com', 3, 'Très bonne entrecote, les frites sont maisons et delicieuses.'),
(1, 'jj.soueix@gmail.com', 3, 'moyen'),
(1, 'john.doe@gmail.com', 4, 'Très bon accueil.'),
(1, 'mdp@mdp.mdp', 0, '4'),
(2, 'bugs.bunny@gmail.com', 1, 'À éviter...'),
(2, 'jj.soueix@gmail.com', 2, 'bof.'),
(2, 'john.doe@gmail.com', 1, 'Cuisine tres moyenne.'),
(2, 'mdp@mdp.mdp', 2, 'oui'),
(4, 'bugs.bunny@gmail.com', 5, NULL),
(4, 'john.doe@gmail.com', 5, 'Rapide.'),
(4, 'test@bts.sio', 3, 'salut'),
(5, 'bugs.bunny@gmail.com', 4, 'Ma critique sur ce restaurant est très positive.'),
(5, 'john.doe@gmail.com', 3, 'Cuisine correcte.'),
(5, 'mdp@mdp.mdp', 0, '3'),
(6, 'john.doe@gmail.com', 4, 'Cuisine de qualité.'),
(7, 'bugs.bunny@gmail.com', NULL, NULL),
(7, 'gaston.lagaffe@gmail.com', 4, 'Bon accueil.'),
(7, 'john.doe@gmail.com', 5, 'Excellent.'),
(7, 'mdp@mdp.mdp', 2, 'tyjyjgtjgtgyj'),
(8, 'achille@tallon.fr', 4, NULL),
(8, 'test@bts.sio', 1, NULL),
(9, 'bugs.bunny@gmail.com', 4, 'Très bon accueil :)'),
(9, 'test@bts.sio', 2, 'dzdzdzdd');

-- --------------------------------------------------------

--
-- Structure de la table `photo`
--

CREATE TABLE `photo` (
  `idP` bigint(20) NOT NULL,
  `cheminP` varchar(255) DEFAULT NULL,
  `idR` bigint(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Contenu de la table `photo`
--

INSERT INTO `photo` (`idP`, `cheminP`, `idR`) VALUES
(0, 'entrepote.jpg', 1),
(2, 'sapporo.jpg', 3),
(3, 'entrepote.jpg', 1),
(4, 'barDuCharcutier.jpg', 2),
(6, 'cidrerieDuFronton.jpg', 4),
(7, 'agadir.jpg', 5),
(8, 'leBistrotSainteCluque.jpg', 6),
(9, 'auberge.jpg', 7),
(10, 'laTableDePottoka.jpg', 8),
(11, 'rotisserieDuRoyLeon.jpg', 9),
(12, 'barDuMarche.jpg', 10),
(13, 'trinquetModerne.jpg', 11),
(14, 'cidrerieDuFronton2.jpg', 4),
(15, 'cidrerieDuFronton3.jpg', 4);

-- --------------------------------------------------------

--
-- Structure de la table `preferer`
--

CREATE TABLE `preferer` (
  `mailU` varchar(150) NOT NULL,
  `idTC` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Contenu de la table `preferer`
--

INSERT INTO `preferer` (`mailU`, `idTC`) VALUES
('achille@tallon.fr', 1),
('bugs.bunny@gmail.com', 1),
('john.doe@gmail.com', 1),
('mdp@mdp.mdp', 1),
('michel.garay@gmail.com', 1),
('test@bts.sio', 1),
('john.doe@gmail.com', 2),
('mdp@mdp.mdp', 2),
('michel.garay@gmail.com', 2),
('michel.garay@gmail.com', 3),
('bugs.bunny@gmail.com', 5),
('test@bts.sio', 6),
('achille@tallon.fr', 7),
('test@bts.sio', 7),
('achille@tallon.fr', 9),
('bugs.bunny@gmail.com', 9),
('achille@tallon.fr', 10),
('bugs.bunny@gmail.com', 10),
('michel.garay@gmail.com', 10),
('test@bts.sio', 10),
('achille@tallon.fr', 11),
('bugs.bunny@gmail.com', 11),
('john.doe@gmail.com', 11),
('test@bts.sio', 11);

-- --------------------------------------------------------

--
-- Structure de la table `proposer`
--

CREATE TABLE `proposer` (
  `idR` bigint(20) NOT NULL,
  `idTC` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Contenu de la table `proposer`
--

INSERT INTO `proposer` (`idR`, `idTC`) VALUES
(1, 1),
(2, 1),
(4, 1),
(10, 1),
(11, 1),
(3, 3),
(5, 3),
(7, 6),
(4, 8),
(6, 10),
(9, 10),
(11, 10),
(4, 11),
(8, 11);

-- --------------------------------------------------------

--
-- Structure de la table `resto`
--

CREATE TABLE `resto` (
  `idR` bigint(20) NOT NULL,
  `nomR` varchar(255) DEFAULT NULL,
  `numAdrR` varchar(20) DEFAULT NULL,
  `voieAdrR` varchar(255) DEFAULT NULL,
  `cpR` char(5) DEFAULT NULL,
  `villeR` varchar(255) DEFAULT NULL,
  `latitudeDegR` float DEFAULT NULL,
  `longitudeDegR` float DEFAULT NULL,
  `descR` text,
  `horairesR` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Contenu de la table `resto`
--

INSERT INTO `resto` (`idR`, `nomR`, `numAdrR`, `voieAdrR`, `cpR`, `villeR`, `latitudeDegR`, `longitudeDegR`, `descR`, `horairesR`) VALUES
(1, 'l\'entrepote', '2', 'rue Maurice Ravel', '33000', 'Bordeaux', 44.7948, -0.58754, 'description', '<table>\n    <thead>\n        <tr>\n            <th>Ouverture</th><th>Semaine</th>	<th>Week-end</th>\n        </tr>\n    </thead>\n    <tbody>\n        <tr>\n            <td class="label">Midi</td>\n            <td class="cell">de 11h45 à 14h30</td>\n            <td class="cell">de 11h45 à 15h00</td>\n        </tr>\n        <tr>\n            <td class="label">Soir</td>\n            <td class="cell">de 18h45 à 22h30</td>\n            <td class="cell">de 18h45 à 1h</td>	\n        </tr>\n        <tr>\n            <td class="label">À emporter</td>\n            <td class="cell">de 11h30 à 23h</td>\n            <td class="cell">de 11h30 à 2h</td>\n        </tr>\n    </tbody>\n</table>'),
(2, 'le bar du charcutier', '30', 'rue Parlement Sainte-Catherine', '33000', 'Bordeaux', NULL, NULL, 'description', '<table>\r\n    <thead>\r\n        <tr>\r\n            <th>Ouverture</th><th>Semaine</th>	<th>Week-end</th>\r\n        </tr>\r\n    </thead>\r\n    <tbody>\r\n        <tr>\r\n            <td class="label">Midi</td>\r\n            <td class="cell">de 11h45 à 14h30</td>\r\n            <td class="cell">de 11h45 à 15h00</td>\r\n        </tr>\r\n        <tr>\r\n            <td class="label">Soir</td>\r\n            <td class="cell">de 18h45 à 22h30</td>\r\n            <td class="cell">de 18h45 à 1h</td>	\r\n        </tr>\r\n        <tr>\r\n            <td class="label">À emporter</td>\r\n            <td class="cell">de 11h30 à 23h</td>\r\n            <td class="cell">de 11h30 à 2h</td>\r\n        </tr>\r\n    </tbody>\r\n</table>'),
(3, 'Sapporo', '33', 'rue Saint Rémi', '33000', 'Bordeaux', NULL, NULL, 'Le Sapporo propose à ses clients de délicieux plats typiques japonais.', '<table>\r\n    <thead>\r\n        <tr>\r\n            <th>Ouverture</th><th>Semaine</th>	<th>Week-end</th>\r\n        </tr>\r\n    </thead>\r\n    <tbody>\r\n        <tr>\r\n            <td class="label">Midi</td>\r\n            <td class="cell">de 11h45 à 14h30</td>\r\n            <td class="cell">de 11h45 à 15h00</td>\r\n        </tr>\r\n        <tr>\r\n            <td class="label">Soir</td>\r\n            <td class="cell">de 18h45 à 22h30</td>\r\n            <td class="cell">de 18h45 à 1h</td>	\r\n        </tr>\r\n        <tr>\r\n            <td class="label">À emporter</td>\r\n            <td class="cell">de 11h30 à 23h</td>\r\n            <td class="cell">de 11h30 à 2h</td>\r\n        </tr>\r\n    </tbody>\r\n</table>'),
(4, 'Cidrerie du fronton', NULL, 'Place du Fronton', '64210', 'Arbonne', NULL, NULL, 'description', '<table>\r\n    <thead>\r\n        <tr>\r\n            <th>Ouverture</th><th>Semaine</th>	<th>Week-end</th>\r\n        </tr>\r\n    </thead>\r\n    <tbody>\r\n        <tr>\r\n            <td class="label">Midi</td>\r\n            <td class="cell">de 11h45 à 14h30</td>\r\n            <td class="cell">de 11h45 à 15h00</td>\r\n        </tr>\r\n        <tr>\r\n            <td class="label">Soir</td>\r\n            <td class="cell">de 18h45 à 22h30</td>\r\n            <td class="cell">de 18h45 à 1h</td>	\r\n        </tr>\r\n        <tr>\r\n            <td class="label">À emporter</td>\r\n            <td class="cell">de 11h30 à 23h</td>\r\n            <td class="cell">de 11h30 à 2h</td>\r\n        </tr>\r\n    </tbody>\r\n</table>'),
(5, 'Agadir', '3', 'Rue Sainte-Catherine', '64100', 'Bayonne', NULL, NULL, 'description', '<table>\r\n    <thead>\r\n        <tr>\r\n            <th>Ouverture</th><th>Semaine</th>	<th>Week-end</th>\r\n        </tr>\r\n    </thead>\r\n    <tbody>\r\n        <tr>\r\n            <td class="label">Midi</td>\r\n            <td class="cell">de 11h45 à 14h30</td>\r\n            <td class="cell">de 11h45 à 15h00</td>\r\n        </tr>\r\n        <tr>\r\n            <td class="label">Soir</td>\r\n            <td class="cell">de 18h45 à 22h30</td>\r\n            <td class="cell">de 18h45 à 1h</td>	\r\n        </tr>\r\n        <tr>\r\n            <td class="label">À emporter</td>\r\n            <td class="cell">de 11h30 à 23h</td>\r\n            <td class="cell">de 11h30 à 2h</td>\r\n        </tr>\r\n    </tbody>\r\n</table>'),
(6, 'Le Bistrot Sainte Cluque', '9', 'Rue Hugues', '64100', 'Bayonne', NULL, NULL, 'description', '<table>\r\n    <thead>\r\n        <tr>\r\n            <th>Ouverture</th><th>Semaine</th>	<th>Week-end</th>\r\n        </tr>\r\n    </thead>\r\n    <tbody>\r\n        <tr>\r\n            <td class="label">Midi</td>\r\n            <td class="cell">de 11h45 à 14h30</td>\r\n            <td class="cell">de 11h45 à 15h00</td>\r\n        </tr>\r\n        <tr>\r\n            <td class="label">Soir</td>\r\n            <td class="cell">de 18h45 à 22h30</td>\r\n            <td class="cell">de 18h45 à 1h</td>	\r\n        </tr>\r\n        <tr>\r\n            <td class="label">À emporter</td>\r\n            <td class="cell">de 11h30 à 23h</td>\r\n            <td class="cell">de 11h30 à 2h</td>\r\n        </tr>\r\n    </tbody>\r\n</table>'),
(7, 'la petite auberge', '15', 'rue des cordeliers', '64100', 'Bayonne', NULL, NULL, 'description', '<table>\r\n    <thead>\r\n        <tr>\r\n            <th>Ouverture</th><th>Semaine</th>	<th>Week-end</th>\r\n        </tr>\r\n    </thead>\r\n    <tbody>\r\n        <tr>\r\n            <td class="label">Midi</td>\r\n            <td class="cell">de 11h45 à 14h30</td>\r\n            <td class="cell">de 11h45 à 15h00</td>\r\n        </tr>\r\n        <tr>\r\n            <td class="label">Soir</td>\r\n            <td class="cell">de 18h45 à 22h30</td>\r\n            <td class="cell">de 18h45 à 1h</td>	\r\n        </tr>\r\n        <tr>\r\n            <td class="label">À emporter</td>\r\n            <td class="cell">de 11h30 à 23h</td>\r\n            <td class="cell">de 11h30 à 2h</td>\r\n        </tr>\r\n    </tbody>\r\n</table>'),
(8, 'La table de POTTOKA', '21', 'Quai Amiral Dubourdieu', '64100', 'Bayonne', NULL, NULL, 'description', '<table>\r\n    <thead>\r\n        <tr>\r\n            <th>Ouverture</th><th>Semaine</th>	<th>Week-end</th>\r\n        </tr>\r\n    </thead>\r\n    <tbody>\r\n        <tr>\r\n            <td class="label">Midi</td>\r\n            <td class="cell">de 11h45 à 14h30</td>\r\n            <td class="cell">de 11h45 à 15h00</td>\r\n        </tr>\r\n        <tr>\r\n            <td class="label">Soir</td>\r\n            <td class="cell">de 18h45 à 22h30</td>\r\n            <td class="cell">de 18h45 à 1h</td>	\r\n        </tr>\r\n        <tr>\r\n            <td class="label">À emporter</td>\r\n            <td class="cell">de 11h30 à 23h</td>\r\n            <td class="cell">de 11h30 à 2h</td>\r\n        </tr>\r\n    </tbody>\r\n</table>'),
(9, 'La Rotisserie du Roy Léon', '8', 'rue de coursic', '64100', 'Bayonne', NULL, NULL, 'description', '<table>\r\n    <thead>\r\n        <tr>\r\n            <th>Ouverture</th><th>Semaine</th>	<th>Week-end</th>\r\n        </tr>\r\n    </thead>\r\n    <tbody>\r\n        <tr>\r\n            <td class="label">Midi</td>\r\n            <td class="cell">de 11h45 à 14h30</td>\r\n            <td class="cell">de 11h45 à 15h00</td>\r\n        </tr>\r\n        <tr>\r\n            <td class="label">Soir</td>\r\n            <td class="cell">de 18h45 à 22h30</td>\r\n            <td class="cell">de 18h45 à 1h</td>	\r\n        </tr>\r\n        <tr>\r\n            <td class="label">À emporter</td>\r\n            <td class="cell">de 11h30 à 23h</td>\r\n            <td class="cell">de 11h30 à 2h</td>\r\n        </tr>\r\n    </tbody>\r\n</table>'),
(10, 'Bar du Marché', '39', 'Rue des Basques', '64100', 'Bayonne', NULL, NULL, 'description', '<table>\r\n    <thead>\r\n        <tr>\r\n            <th>Ouverture</th><th>Semaine</th>	<th>Week-end</th>\r\n        </tr>\r\n    </thead>\r\n    <tbody>\r\n        <tr>\r\n            <td class="label">Midi</td>\r\n            <td class="cell">de 11h45 à 14h30</td>\r\n            <td class="cell">de 11h45 à 15h00</td>\r\n        </tr>\r\n        <tr>\r\n            <td class="label">Soir</td>\r\n            <td class="cell">de 18h45 à 22h30</td>\r\n            <td class="cell">de 18h45 à 1h</td>	\r\n        </tr>\r\n        <tr>\r\n            <td class="label">À emporter</td>\r\n            <td class="cell">de 11h30 à 23h</td>\r\n            <td class="cell">de 11h30 à 2h</td>\r\n        </tr>\r\n    </tbody>\r\n</table>'),
(11, 'Trinquet Moderne', '60', 'Avenue Dubrocq', '64100', 'Bayonne', NULL, NULL, 'description', '<table>\r\n    <thead>\r\n        <tr>\r\n            <th>Ouverture</th><th>Semaine</th>	<th>Week-end</th>\r\n        </tr>\r\n    </thead>\r\n    <tbody>\r\n        <tr>\r\n            <td class="label">Midi</td>\r\n            <td class="cell">de 11h45 à 14h30</td>\r\n            <td class="cell">de 11h45 à 15h00</td>\r\n        </tr>\r\n        <tr>\r\n            <td class="label">Soir</td>\r\n            <td class="cell">de 18h45 à 22h30</td>\r\n            <td class="cell">de 18h45 à 1h</td>	\r\n        </tr>\r\n        <tr>\r\n            <td class="label">À emporter</td>\r\n            <td class="cell">de 11h30 à 23h</td>\r\n            <td class="cell">de 11h30 à 2h</td>\r\n        </tr>\r\n    </tbody>\r\n</table>');

-- --------------------------------------------------------

--
-- Structure de la table `typecuisine`
--

CREATE TABLE `typecuisine` (
  `idTC` bigint(20) NOT NULL,
  `libelleTC` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Contenu de la table `typecuisine`
--

INSERT INTO `typecuisine` (`idTC`, `libelleTC`) VALUES
(1, 'sud ouest'),
(2, 'japonaise'),
(3, 'orientale'),
(4, 'fastfood'),
(5, 'vegetarienne'),
(6, 'vegan'),
(7, 'crepe'),
(8, 'sandwich'),
(9, 'tartes'),
(10, 'viande'),
(11, 'grillade');

-- --------------------------------------------------------

--
-- Structure de la table `utilisateur`
--

CREATE TABLE `utilisateur` (
  `mailU` varchar(150) NOT NULL,
  `mdpU` varchar(50) DEFAULT NULL,
  `pseudoU` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Contenu de la table `utilisateur`
--

INSERT INTO `utilisateur` (`mailU`, `mdpU`, `pseudoU`) VALUES
('123@gmail.com', 'seu.8HpuOxyTU', '123'),
('achille@tallon.fr', 'sej6dETYl/ea.', 'yann'),
('anawpdu08@gmail.com', 'se7gZTHbfW36.', 'Maurrou'),
('bugs.bunny@gmail.com', 'seSzpoUAQgIl.', 'pich'),
('gaston.lagaffe@gmail.com', '$1$zvN5hYSQSQDFUIQSdufUQSDFznHF5osT.', '@lex'),
('jj.soueix@gmail.com', '$1$zvN5hYMI$SDFGSDFGJqJSDJF.', 'drskott'),
('john.doe@gmail.com', '$1$zvNDSFQSdfqsDfQsdfsT.', 'Nico40'),
('mdp@mdp.mdp', 'sej5vWNdAeBCw', 'mdp'),
('michel.garay@gmail.com', '$1$zvN5hYMI$VSatLQ6SDFGdsfgznHF5osT.', 'Mitch'),
('rofldu0@gmail.com', 'seOF91nAayeI6', 'Maurrou'),
('test@bts.sio', 'seBu1yIEvVgVM', 'Maurrou');

--
-- Index pour les tables exportées
--

--
-- Index pour la table `aimer`
--
ALTER TABLE `aimer`
  ADD PRIMARY KEY (`idR`,`mailU`),
  ADD KEY `mailU` (`mailU`);

--
-- Index pour la table `critiquer`
--
ALTER TABLE `critiquer`
  ADD PRIMARY KEY (`idR`,`mailU`),
  ADD KEY `mailU` (`mailU`);

--
-- Index pour la table `photo`
--
ALTER TABLE `photo`
  ADD PRIMARY KEY (`idP`),
  ADD KEY `idR` (`idR`);

--
-- Index pour la table `preferer`
--
ALTER TABLE `preferer`
  ADD PRIMARY KEY (`mailU`,`idTC`),
  ADD KEY `idTC` (`idTC`);

--
-- Index pour la table `proposer`
--
ALTER TABLE `proposer`
  ADD PRIMARY KEY (`idR`,`idTC`),
  ADD KEY `idTC` (`idTC`);

--
-- Index pour la table `resto`
--
ALTER TABLE `resto`
  ADD PRIMARY KEY (`idR`);

--
-- Index pour la table `typecuisine`
--
ALTER TABLE `typecuisine`
  ADD PRIMARY KEY (`idTC`);

--
-- Index pour la table `utilisateur`
--
ALTER TABLE `utilisateur`
  ADD PRIMARY KEY (`mailU`);

--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `aimer`
--
ALTER TABLE `aimer`
  ADD CONSTRAINT `aimer_ibfk_1` FOREIGN KEY (`idR`) REFERENCES `resto` (`idR`),
  ADD CONSTRAINT `aimer_ibfk_2` FOREIGN KEY (`mailU`) REFERENCES `utilisateur` (`mailU`);

--
-- Contraintes pour la table `critiquer`
--
ALTER TABLE `critiquer`
  ADD CONSTRAINT `critiquer_ibfk_1` FOREIGN KEY (`idR`) REFERENCES `resto` (`idR`),
  ADD CONSTRAINT `critiquer_ibfk_2` FOREIGN KEY (`mailU`) REFERENCES `utilisateur` (`mailU`);

--
-- Contraintes pour la table `photo`
--
ALTER TABLE `photo`
  ADD CONSTRAINT `photo_ibfk_1` FOREIGN KEY (`idR`) REFERENCES `resto` (`idR`);

--
-- Contraintes pour la table `preferer`
--
ALTER TABLE `preferer`
  ADD CONSTRAINT `preferer_ibfk_1` FOREIGN KEY (`mailU`) REFERENCES `utilisateur` (`mailU`),
  ADD CONSTRAINT `preferer_ibfk_2` FOREIGN KEY (`idTC`) REFERENCES `typecuisine` (`idTC`);

--
-- Contraintes pour la table `proposer`
--
ALTER TABLE `proposer`
  ADD CONSTRAINT `proposer_ibfk_1` FOREIGN KEY (`idR`) REFERENCES `resto` (`idR`),
  ADD CONSTRAINT `proposer_ibfk_2` FOREIGN KEY (`idTC`) REFERENCES `typecuisine` (`idTC`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
