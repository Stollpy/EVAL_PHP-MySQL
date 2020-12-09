-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : mer. 09 déc. 2020 à 14:38
-- Version du serveur :  10.4.14-MariaDB
-- Version de PHP : 7.4.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `logement_florian`
--

-- --------------------------------------------------------

--
-- Structure de la table `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `category`
--

INSERT INTO `category` (`id`, `name`) VALUES
(1, 'Location'),
(2, 'Vente');

-- --------------------------------------------------------

--
-- Structure de la table `comments`
--

CREATE TABLE `comments` (
  `id` int(11) NOT NULL,
  `content` text NOT NULL,
  `createdAt` datetime NOT NULL DEFAULT current_timestamp(),
  `product_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `comments`
--

INSERT INTO `comments` (`id`, `content`, `createdAt`, `product_id`) VALUES
(1, 'TEST', '2020-12-09 14:23:10', 14),
(2, 'J\'adore cette maison !', '2020-12-09 14:32:09', 13),
(3, 'TEST', '2020-12-09 14:33:12', 14);

-- --------------------------------------------------------

--
-- Structure de la table `logement`
--

CREATE TABLE `logement` (
  `id` int(11) NOT NULL,
  `titre` varchar(100) CHARACTER SET utf8 NOT NULL,
  `adresse` varchar(100) NOT NULL,
  `cp` varchar(100) NOT NULL,
  `surface` double NOT NULL,
  `prix` double NOT NULL,
  `photo` varchar(100) NOT NULL,
  `ville` varchar(100) NOT NULL,
  `description` text NOT NULL,
  `createdAt` datetime NOT NULL DEFAULT current_timestamp(),
  `type` smallint(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `logement`
--

INSERT INTO `logement` (`id`, `titre`, `adresse`, `cp`, `surface`, `prix`, `photo`, `ville`, `description`, `createdAt`, `type`) VALUES
(6, 'Magnifique Maison !', '345 rue Persil', '69000', 112, 1234.56, 'Product1', 'Lyon', 'Magnifique maison situé au coeur de lyon ! Venez la visiter vous ne serez pas dessus ! Louez pour 1234.56€/mois', '2020-12-09 12:14:31', 1),
(7, 'Belle Maison coloré !', '23 rue amsterdam ', '42420', 420, 420, 'Product2', 'Amsterdam', 'Magnifique maison pour passer un agréable séjour au pays-bas ! Vous n\'allez pas le regretter.420€/semaine', '2020-12-09 12:17:19', 1),
(8, 'Appartement de prestige ', '345 rue du soleil', '13000', 345, 1000, 'Product3', 'Marseille', 'Magnifique appartement avec vue sur marseille ! Vous ne serrez pas dessus de louez se bien pour vos vacances pour seulement 1000€/semaine!', '2020-12-09 12:20:41', 1),
(9, 'Belle Appartement !', '234 rue national', '69400', 102, 678, 'Product4', 'VilleFranche-sur-saone', 'Magnifique appartement dans la rue commerçante de villefranche !\r\nLe prix de cette location est de 678€/mois', '2020-12-09 12:23:11', 1),
(10, 'Maison perdu dans le bois !', '12 rue de nulpart ', '34567', 547, 15000, 'Product5', 'Nulpart-sur-rien', 'Magnifique maison perdu dans les bois ! \r\nCe logement vous coutera seulement 15000€/mois !', '2020-12-09 12:25:05', 1),
(12, 'Magnifique villa à venre', '347 rue delavilla', '34567', 3430, 780000, 'Product15', 'Villa', 'Magnifique villa à vendre ! venez la visiter !', '2020-12-09 12:34:27', 2),
(13, 'Belle Villa au bord de mer !', '678 rue BordDeMers', '34562', 4508, 950000, 'Product16', 'bord-sur-mers', 'Magnifique villa !', '2020-12-09 12:35:36', 2),
(14, 'Villa Immense ! ', '543 rue DeLaBelleVila', '98623', 3450, 856000, 'Product11', 'BelleVilla', 'Magnifique Villa pour famille ! ', '2020-12-09 12:36:56', 2);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_id` (`product_id`);

--
-- Index pour la table `logement`
--
ALTER TABLE `logement`
  ADD PRIMARY KEY (`id`),
  ADD KEY `type` (`type`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `logement`
--
ALTER TABLE `logement`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
