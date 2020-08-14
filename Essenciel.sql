-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost
-- Généré le : ven. 14 août 2020 à 02:04
-- Version du serveur :  10.4.13-MariaDB
-- Version de PHP : 7.4.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `Essenciel`
--

-- --------------------------------------------------------

--
-- Structure de la table `accompaniments`
--

CREATE TABLE `accompaniments` (
  `id` int(11) NOT NULL,
  `img` varchar(255) NOT NULL,
  `accompaniment` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `accompaniments`
--

INSERT INTO `accompaniments` (`id`, `img`, `accompaniment`) VALUES
(1, 'building', 'Un accompagnement à distance'),
(2, 'house', 'Un accompagnement en agence');

-- --------------------------------------------------------

--
-- Structure de la table `civilities`
--

CREATE TABLE `civilities` (
  `id` int(11) NOT NULL,
  `civility` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `civilities`
--

INSERT INTO `civilities` (`id`, `civility`) VALUES
(1, 'Madame'),
(2, 'Monsieur');

-- --------------------------------------------------------

--
-- Structure de la table `devis`
--

CREATE TABLE `devis` (
  `id` int(11) NOT NULL,
  `etablishment_address` varchar(255) NOT NULL,
  `id_accompaniment` int(11) NOT NULL,
  `id_civility_def` int(11) NOT NULL,
  `last_name_def` varchar(255) NOT NULL,
  `first_name_def` varchar(255) NOT NULL,
  `id_link` int(11) NOT NULL,
  `id_civility` int(11) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `phone_number` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `id_formule` int(11) NOT NULL,
  `createdAt` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `devis`
--

INSERT INTO `devis` (`id`, `etablishment_address`, `id_accompaniment`, `id_civility_def`, `last_name_def`, `first_name_def`, `id_link`, `id_civility`, `last_name`, `first_name`, `phone_number`, `email`, `id_formule`, `createdAt`) VALUES
(1, '18', 0, 1, 'fe', 'fe', 3, 1, 'fe', 'fe', 'fe', 'fe', 0, '2020-08-08 09:12:07'),
(2, '18', 0, 1, 'fe', 'fe', 3, 1, 'fe', 'fe', 'fe', 'fe', 0, '2020-08-08 09:12:20');

-- --------------------------------------------------------

--
-- Structure de la table `formule`
--

CREATE TABLE `formule` (
  `id` int(11) NOT NULL,
  `id_location` int(11) DEFAULT NULL,
  `id_type` int(11) DEFAULT NULL,
  `id_type_option_answer` int(11) DEFAULT NULL,
  `total` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `formule`
--

INSERT INTO `formule` (`id`, `id_location`, `id_type`, `id_type_option_answer`, `total`) VALUES
(1, 1, 1, 2, 1890),
(2, 1, 1, 1, 2190),
(3, 1, 2, 1, 2190),
(4, 1, 2, 2, 2490),
(5, 2, 1, 2, 3190),
(6, 2, 1, 1, 3490),
(7, 2, 2, 1, 3490),
(8, 2, 2, 2, 3790),
(9, 3, 1, 2, 2090),
(10, 3, 1, 1, 2390),
(11, 3, 2, 1, 2390),
(12, 3, 2, 2, 2690),
(25, 1, NULL, NULL, 0),
(26, 2, NULL, NULL, 1300),
(27, 3, NULL, NULL, 300),
(28, 1, 1, NULL, 1800),
(29, 1, 2, NULL, 2190),
(30, 2, 1, NULL, 3100),
(31, 2, 2, NULL, 3490),
(32, 3, 1, NULL, 2100),
(33, 3, 2, NULL, 2490);

-- --------------------------------------------------------

--
-- Structure de la table `links`
--

CREATE TABLE `links` (
  `id` int(11) NOT NULL,
  `link` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `links`
--

INSERT INTO `links` (`id`, `link`) VALUES
(1, 'Conjoint.e'),
(2, 'Enfant'),
(3, 'Grand-parent'),
(4, 'Neveu / Nièce'),
(5, 'Parent'),
(6, 'Frère / Sœur'),
(7, 'Oncle / Tante'),
(8, 'Autre...');

-- --------------------------------------------------------

--
-- Structure de la table `location`
--

CREATE TABLE `location` (
  `id_location` int(11) NOT NULL,
  `letter_key` varchar(255) NOT NULL,
  `img_location` varchar(255) NOT NULL,
  `location` varchar(255) NOT NULL,
  `price_add` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `location`
--

INSERT INTO `location` (`id_location`, `letter_key`, `img_location`, `location`, `price_add`) VALUES
(1, 'A', 'building', 'Il se trouve <br /> en établissement <br /> de soin.', 0),
(2, 'B', 'house', 'Il se trouve <br /> à domicile ou en <br /> maison de retraite.', 1300),
(3, 'C', 'cardic', 'Il se trouve <br /> à l’institut <br /> médico légale.', 300);

-- --------------------------------------------------------

--
-- Structure de la table `prestation`
--

CREATE TABLE `prestation` (
  `id_prestation` int(11) NOT NULL,
  `id_prestation_category` int(11) NOT NULL,
  `prestation` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `prestation`
--

INSERT INTO `prestation` (`id_prestation`, `id_prestation_category`, `prestation`) VALUES
(1, 1, 'Accompagnement pendant toute la durée des obsèques. Nous nous occupons de tout.'),
(2, 1, 'Démarches et formalités Administratives'),
(3, 1, 'Remise d’un guide des démarches Post-Obsèques'),
(4, 1, 'Retrait de Pacemaker réalisé si nécessaire'),
(5, 1, 'Toilette et Habillage du défunt selon les choix de la famille, si celle-ci n’est pas assurée par l’hôpital.'),
(6, 1, 'Mise à Disposition d’un Corbillard Funéraire pour le transfert du défunt vers le funérarium.'),
(7, 1, 'Mise à Disposition d’un Chauffeur-Porteur.'),
(8, 1, 'Frais de Funérarium Tout Compris.'),
(9, 1, 'Toilette et Habillage du défunt selon les choix de la famille.'),
(10, 1, 'Démarches spécifiques IML et formalités Administratives'),
(11, 1, 'Prise en charge des frais de L’Institut Médico-légal'),
(12, 2, 'Cercueil en Peuplier, forme parisienne, teinte naturelle, finition verni clair satiné, équipé de 4 poignées, d’une cuvette bio et de la plaque d’identité.'),
(13, 2, 'Capiton en taffetas blanc'),
(14, 2, 'Mise en Bière et fermeture du cercueil, si celle-ci n’est pas assurée par l’hôpital'),
(15, 2, 'Urne funéraire en aluminium ou Urne de dispersion en carton'),
(16, 2, 'Mise à disposition d’un registre de condoléances (sur demande)'),
(17, 2, 'Mise en Bière et fermeture du cercueil, si celle-ci n’est pas assurée par le Funérarium.'),
(18, 3, 'Mise à disposition d’un Corbillard Funéraire'),
(19, 3, 'Mise à disposition d’un chauffeur porteur'),
(20, 3, 'Mise à disposition d’un Chauffeur porteur faisant office de Maître de cérémonie'),
(21, 3, 'Mise à disposition d’une équipe de 4 Porteurs dont 1 Porteur-Maître de Cérémonie'),
(22, 4, 'Ouverture/Fermeture du caveau et fourniture d’un jeu de dalles intermédiaires. '),
(23, 5, 'Dispersion des cendres au jardin du souvenir ou Remise de l’urne à la famille'),
(24, 6, 'Frais de Crémation (sans cérémonie)'),
(25, 6, 'Taxes diverses'),
(26, 6, 'Frais de Crémation (avec cérémonie)');

-- --------------------------------------------------------

--
-- Structure de la table `prestations`
--

CREATE TABLE `prestations` (
  `id` int(11) NOT NULL,
  `id_formule` int(11) NOT NULL,
  `id_prestation` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `prestations`
--

INSERT INTO `prestations` (`id`, `id_formule`, `id_prestation`) VALUES
(1, 0, 1),
(2, 0, 2),
(3, 0, 3),
(4, 0, 4),
(5, 0, 12),
(6, 0, 13),
(7, 0, 14),
(8, 0, 15),
(9, 0, 18),
(10, 0, 19),
(11, 0, 23),
(12, 0, 24),
(13, 0, 25),
(14, 1, 1),
(15, 1, 5),
(16, 1, 2),
(17, 1, 3),
(18, 1, 4),
(19, 1, 12),
(20, 1, 13),
(21, 1, 14),
(22, 1, 16),
(23, 1, 15),
(24, 1, 18),
(25, 1, 20),
(26, 1, 23),
(27, 1, 24),
(28, 1, 25),
(29, 2, 1),
(30, 2, 5),
(31, 2, 2),
(32, 2, 3),
(33, 2, 4),
(34, 2, 12),
(35, 2, 13),
(36, 2, 14),
(37, 2, 16),
(38, 2, 18),
(39, 2, 21),
(40, 2, 22),
(41, 2, 25),
(42, 3, 1),
(43, 3, 5),
(44, 3, 2),
(45, 3, 3),
(46, 3, 4),
(47, 3, 12),
(48, 3, 13),
(49, 3, 14),
(50, 3, 16),
(51, 3, 18),
(52, 3, 19),
(53, 3, 24),
(54, 3, 25),
(55, 4, 1),
(56, 4, 6),
(57, 4, 7),
(58, 4, 8),
(59, 4, 9),
(60, 4, 2),
(61, 4, 4),
(62, 4, 12),
(63, 4, 13),
(64, 4, 14),
(65, 4, 15),
(66, 4, 18),
(67, 4, 20),
(68, 4, 24),
(69, 4, 25),
(70, 5, 1),
(71, 5, 6),
(72, 5, 7),
(73, 5, 8),
(74, 5, 9),
(75, 5, 2),
(76, 5, 3),
(77, 5, 4),
(78, 5, 12),
(79, 5, 13),
(80, 5, 17),
(81, 5, 16),
(82, 5, 15),
(83, 5, 18),
(84, 5, 20),
(85, 5, 26),
(86, 5, 25),
(87, 6, 1),
(88, 6, 6),
(89, 6, 7),
(90, 6, 8),
(91, 6, 9),
(92, 6, 2),
(93, 6, 3),
(94, 6, 4),
(95, 6, 12),
(96, 6, 13),
(97, 6, 14),
(98, 6, 16),
(99, 6, 18),
(100, 6, 21),
(101, 6, 22),
(102, 6, 25),
(103, 7, 1),
(104, 7, 6),
(105, 7, 7),
(106, 7, 8),
(107, 7, 9),
(108, 7, 2),
(109, 7, 3),
(110, 7, 4),
(111, 7, 12),
(112, 7, 13),
(113, 7, 14),
(114, 7, 16),
(115, 7, 18),
(116, 7, 21),
(117, 7, 25),
(118, 8, 1),
(119, 8, 10),
(120, 8, 11),
(121, 8, 12),
(122, 8, 13),
(123, 8, 15),
(124, 8, 18),
(125, 8, 19),
(126, 8, 24),
(127, 8, 25),
(128, 9, 1),
(129, 9, 10),
(130, 9, 11),
(131, 9, 3),
(132, 9, 12),
(133, 9, 13),
(134, 9, 15),
(135, 9, 18),
(136, 9, 20),
(137, 9, 26),
(138, 9, 25),
(139, 10, 1),
(140, 10, 10),
(141, 10, 3),
(142, 10, 12),
(143, 10, 13),
(144, 10, 16),
(145, 10, 18),
(146, 10, 21),
(147, 10, 22),
(148, 10, 25),
(149, 11, 1),
(150, 11, 10),
(151, 11, 3),
(152, 11, 12),
(153, 11, 13),
(154, 11, 16),
(155, 11, 18),
(156, 11, 21),
(157, 11, 25);

-- --------------------------------------------------------

--
-- Structure de la table `prestation_category`
--

CREATE TABLE `prestation_category` (
  `id_prestation_category` int(11) NOT NULL,
  `prestation_category` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `prestation_category`
--

INSERT INTO `prestation_category` (`id_prestation_category`, `prestation_category`) VALUES
(1, 'Préparation des obsèques'),
(2, 'Cerceuil et accessoires'),
(3, 'Réalisation du convoi funéraire'),
(4, 'Autre'),
(5, 'Destination des cendres'),
(6, 'Frais et taxes de crémation');

-- --------------------------------------------------------

--
-- Structure de la table `type`
--

CREATE TABLE `type` (
  `id` int(11) NOT NULL,
  `letter_key` varchar(255) NOT NULL,
  `img` varchar(255) DEFAULT NULL,
  `text` varchar(255) NOT NULL,
  `price_add` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `type`
--

INSERT INTO `type` (`id`, `letter_key`, `img`, `text`, `price_add`) VALUES
(1, 'A', 'building', 'Une<br /> crémation', 1800),
(2, 'B', 'house', 'Un<br />enterrement', 2190);

-- --------------------------------------------------------

--
-- Structure de la table `types`
--

CREATE TABLE `types` (
  `id_type` int(11) NOT NULL,
  `letter_key` varchar(255) NOT NULL,
  `img_type` varchar(255) NOT NULL,
  `type` varchar(255) NOT NULL,
  `add_price_type` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `types`
--

INSERT INTO `types` (`id_type`, `letter_key`, `img_type`, `type`, `add_price_type`) VALUES
(1, 'A', 'building', 'Une<br /> crémation', 1800),
(2, 'B', 'house', 'Un <br />enterrement', 2190);

-- --------------------------------------------------------

--
-- Structure de la table `type_option`
--

CREATE TABLE `type_option` (
  `id_type_option` int(11) NOT NULL,
  `id_type` int(11) NOT NULL,
  `type_option` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `type_option`
--

INSERT INTO `type_option` (`id_type_option`, `id_type`, `type_option`) VALUES
(1, 1, 'Souhaitez-vous organiser une cérémonie ?'),
(2, 2, 'et je souhaite que mon proche défunt soit');

-- --------------------------------------------------------

--
-- Structure de la table `type_option_answer`
--

CREATE TABLE `type_option_answer` (
  `id_type_option_answer` int(11) NOT NULL,
  `id_type_option` int(11) NOT NULL,
  `type_option_answer` varchar(255) NOT NULL,
  `price_add_type_option_answer` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `type_option_answer`
--

INSERT INTO `type_option_answer` (`id_type_option_answer`, `id_type_option`, `type_option_answer`, `price_add_type_option_answer`) VALUES
(1, 1, 'oui', 300),
(2, 1, 'non', 0),
(3, 2, 'placé dans <br /> le caveau familiale existant.', 300),
(4, 2, 'placé dans <br /> une sépulture pleine-terre.', 0);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `accompaniments`
--
ALTER TABLE `accompaniments`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `civilities`
--
ALTER TABLE `civilities`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `devis`
--
ALTER TABLE `devis`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `formule`
--
ALTER TABLE `formule`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `links`
--
ALTER TABLE `links`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `location`
--
ALTER TABLE `location`
  ADD PRIMARY KEY (`id_location`);

--
-- Index pour la table `prestation`
--
ALTER TABLE `prestation`
  ADD PRIMARY KEY (`id_prestation`);

--
-- Index pour la table `prestations`
--
ALTER TABLE `prestations`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `prestation_category`
--
ALTER TABLE `prestation_category`
  ADD PRIMARY KEY (`id_prestation_category`);

--
-- Index pour la table `type`
--
ALTER TABLE `type`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `types`
--
ALTER TABLE `types`
  ADD PRIMARY KEY (`id_type`);

--
-- Index pour la table `type_option`
--
ALTER TABLE `type_option`
  ADD PRIMARY KEY (`id_type_option`);

--
-- Index pour la table `type_option_answer`
--
ALTER TABLE `type_option_answer`
  ADD PRIMARY KEY (`id_type_option_answer`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `accompaniments`
--
ALTER TABLE `accompaniments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `civilities`
--
ALTER TABLE `civilities`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `devis`
--
ALTER TABLE `devis`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `formule`
--
ALTER TABLE `formule`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT pour la table `links`
--
ALTER TABLE `links`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT pour la table `location`
--
ALTER TABLE `location`
  MODIFY `id_location` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `prestation`
--
ALTER TABLE `prestation`
  MODIFY `id_prestation` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT pour la table `prestations`
--
ALTER TABLE `prestations`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=158;

--
-- AUTO_INCREMENT pour la table `prestation_category`
--
ALTER TABLE `prestation_category`
  MODIFY `id_prestation_category` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT pour la table `type`
--
ALTER TABLE `type`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `types`
--
ALTER TABLE `types`
  MODIFY `id_type` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `type_option`
--
ALTER TABLE `type_option`
  MODIFY `id_type_option` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `type_option_answer`
--
ALTER TABLE `type_option_answer`
  MODIFY `id_type_option_answer` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
