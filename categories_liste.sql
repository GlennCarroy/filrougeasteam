-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost
-- Généré le :  mar. 06 mars 2018 à 14:51
-- Version du serveur :  10.1.30-MariaDB
-- Version de PHP :  7.2.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `filrougeasteam`
--

-- --------------------------------------------------------

--
-- Structure de la table `categories_liste`
--

CREATE TABLE `categories_liste` (
  `categorie_id` int(11) NOT NULL,
  `categorie_nom` varchar(255) CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `categories_liste`
--

INSERT INTO `categories_liste` (`categorie_id`, `categorie_nom`) VALUES
(1, 'Environnement'),
(2, 'Solidarité'),
(3, 'Projets'),
(7, 'Enseignement');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `categories_liste`
--
ALTER TABLE `categories_liste`
  ADD PRIMARY KEY (`categorie_id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `categories_liste`
--
ALTER TABLE `categories_liste`
  MODIFY `categorie_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
