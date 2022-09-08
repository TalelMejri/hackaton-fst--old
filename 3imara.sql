-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : sam. 26 mars 2022 à 15:49
-- Version du serveur : 10.4.22-MariaDB
-- Version de PHP : 8.1.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `3imara`
--

-- --------------------------------------------------------

--
-- Structure de la table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `nom` varchar(30) NOT NULL,
  `prenom` varchar(30) NOT NULL,
  `avatar` varchar(250) NOT NULL,
  `email` varchar(50) NOT NULL,
  `mot_de_passe` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `bloc`
--

CREATE TABLE `bloc` (
  `id_bloc` int(11) NOT NULL,
  `nom_bloc` varchar(30) NOT NULL,
  `nbr_chambre` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `chambre`
--

CREATE TABLE `chambre` (
  `id_chambre` int(11) NOT NULL,
  `nom_chambre` varchar(30) NOT NULL,
  `prix` float NOT NULL,
  `etat` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `resident`
--

CREATE TABLE `resident` (
  `id_resident` int(11) NOT NULL,
  `nom` varchar(30) NOT NULL,
  `prenom` varchar(30) NOT NULL,
  `avatar` varchar(250) NOT NULL,
  `email` varchar(30) NOT NULL,
  `cin` int(15) NOT NULL,
  `tel` int(15) NOT NULL,
  `id_chambre` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `syndicate`
--

CREATE TABLE `syndicate` (
  `id_synd` int(11) NOT NULL,
  `nom` varchar(30) NOT NULL,
  `prenom` varchar(30) NOT NULL,
  `avatar` varchar(250) NOT NULL,
  `email` int(11) NOT NULL,
  `tel` int(15) NOT NULL,
  `id_bloc` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `bloc`
--
ALTER TABLE `bloc`
  ADD PRIMARY KEY (`id_bloc`);

--
-- Index pour la table `chambre`
--
ALTER TABLE `chambre`
  ADD PRIMARY KEY (`id_chambre`);

--
-- Index pour la table `resident`
--
ALTER TABLE `resident`
  ADD PRIMARY KEY (`id_resident`),
  ADD KEY `chambree` (`id_chambre`);

--
-- Index pour la table `syndicate`
--
ALTER TABLE `syndicate`
  ADD PRIMARY KEY (`id_synd`),
  ADD KEY `blocee` (`id_bloc`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `bloc`
--
ALTER TABLE `bloc`
  MODIFY `id_bloc` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `chambre`
--
ALTER TABLE `chambre`
  MODIFY `id_chambre` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `resident`
--
ALTER TABLE `resident`
  MODIFY `id_resident` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `syndicate`
--
ALTER TABLE `syndicate`
  MODIFY `id_synd` int(11) NOT NULL AUTO_INCREMENT;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `resident`
--
ALTER TABLE `resident`
  ADD CONSTRAINT `chambree` FOREIGN KEY (`id_chambre`) REFERENCES `chambre` (`id_chambre`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `syndicate`
--
ALTER TABLE `syndicate`
  ADD CONSTRAINT `blocee` FOREIGN KEY (`id_bloc`) REFERENCES `bloc` (`id_bloc`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
