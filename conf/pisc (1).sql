-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  lun. 03 août 2020 à 08:09
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
-- Base de données :  `pisc`
--

-- --------------------------------------------------------

--
-- Structure de la table `admins`
--

DROP TABLE IF EXISTS `admins`;
CREATE TABLE IF NOT EXISTS `admins` (
  `id_admin` int(11) NOT NULL AUTO_INCREMENT,
  `nick` varchar(250) NOT NULL,
  `email` varchar(250) NOT NULL,
  `password` varchar(250) NOT NULL,
  PRIMARY KEY (`id_admin`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `admins`
--

INSERT INTO `admins` (`id_admin`, `nick`, `email`, `password`) VALUES
(1, 'admin1', 'katharina.r@hotmail.fr', '$2y$10$/ZCKRwu8Nm/QStPzSlfv3.hFOO.TXCF88H07g8fO3TKK5ydQw9pnK');

-- --------------------------------------------------------

--
-- Structure de la table `brand`
--

DROP TABLE IF EXISTS `brand`;
CREATE TABLE IF NOT EXISTS `brand` (
  `id_brand` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(250) NOT NULL,
  `description` varchar(50) NOT NULL,
  PRIMARY KEY (`id_brand`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `brand`
--

INSERT INTO `brand` (`id_brand`, `name`, `description`) VALUES
(1, 'Dilex', 'description'),
(2, 'Ellix', 'description'),
(3, 'Ldora', 'description'),
(4, 'Nurixo', 'description'),
(5, 'Pristive', 'description'),
(6, 'W&B', 'description');

-- --------------------------------------------------------

--
-- Structure de la table `category`
--

DROP TABLE IF EXISTS `category`;
CREATE TABLE IF NOT EXISTS `category` (
  `id_category` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(250) NOT NULL,
  PRIMARY KEY (`id_category`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `category`
--

INSERT INTO `category` (`id_category`, `name`) VALUES
(1, 'Beauté'),
(2, 'Hygiène et Soins'),
(3, 'Special Femme');

-- --------------------------------------------------------

--
-- Structure de la table `item`
--

DROP TABLE IF EXISTS `item`;
CREATE TABLE IF NOT EXISTS `item` (
  `id_item` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(250) NOT NULL,
  `description` varchar(250) NOT NULL,
  `price` float NOT NULL,
  `id_category` int(11) NOT NULL,
  `id_subcategory` int(11) NOT NULL,
  `id_brand` int(11) NOT NULL,
  `avis` varchar(250) NOT NULL,
  `note` int(5) NOT NULL,
  `id_admin` int(11) NOT NULL,
  PRIMARY KEY (`id_item`),
  KEY `ITEM_CATEGORY_FK` (`id_category`),
  KEY `ITEM_BRAND0_FK` (`id_brand`),
  KEY `fk_admin` (`id_admin`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `item`
--


INSERT INTO `item` (`id_item`, `name`, `description`, `price`, `id_category`, `id_subcategory`, `id_brand`, `avis`, `note`, `id_admin`) VALUES
(1, 'Lingettes hydratantes', "Les lingettes nettoyantes et désinfectantes avec huile d'argan...", 15, 2, 10, 1, 'OK', 4, 1),
(2, 'Lingettes démaquillantes', 'Lorem ipsum...', 10, 2, 10, 1, 'Lorem ipsum...', 3, 1),
(3, 'Serviettes hygiéniques, taille M', 'Lorem ipsum...', 10, 3, 11, 1, 'Lorem ipsum...', 4, 1),
(4, 'Mouchoirs en papier', 'Lorem ipsum...', 10, 3, 11, 1, 'Lorem ipsum...', 4, 1),
(5, 'Coton-tige', 'Lorem ipsum...', 6, 2, 9, 1, 'Lorem ipsum...', 4, 1),
(6, 'Lingettes pour les mains et le visage', 'Lorem ipsum...', 7, 2, 10, 1, 'Lorem ipsum...', 4, 1);

-- --------------------------------------------------------

--
-- Structure de la table `photo`
--

DROP TABLE IF EXISTS `photo`;
CREATE TABLE IF NOT EXISTS `photo` (
  `id_photo` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(250) NOT NULL,
  `alt` varchar(50) NOT NULL,
  `id_item` int(11) NOT NULL,
  PRIMARY KEY (`id_photo`),
  KEY `PHOTO_ITEM_FK` (`id_item`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `subcategory`
--

DROP TABLE IF EXISTS `subcategory`;
CREATE TABLE IF NOT EXISTS `subcategory` (
  `id_subcategory` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(250) NOT NULL,
  `id_category` int(11) NOT NULL,
  PRIMARY KEY (`id_subcategory`),
  KEY `CATEGORY_PK` (`id_category`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `subcategory`
--

INSERT INTO `subcategory` (`id_subcategory`, `name`, `id_category`) VALUES
(1, 'Beauté du visage', 1),
(2, 'Beauté des cheveux', 1),
(3, 'Beaute des yeux et sourcils', 1),
(4, 'Beauté du corps', 1),
(5, 'Soins des mains et du visage', 2),
(6, 'Soins des cheveux', 2),
(7, 'Soins bucco-dentaires', 2),
(8, 'Soins du corps', 2),
(9, 'Coton-tiges', 2),
(10, 'Lingettes', 2),
(11, 'Protection hygiènique', 3);

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `item`
--
ALTER TABLE `item`
  ADD CONSTRAINT `ITEM_BRAND0_FK` FOREIGN KEY (`id_brand`) REFERENCES `brand` (`id_brand`),
  ADD CONSTRAINT `ITEM_CATEGORY_FK` FOREIGN KEY (`id_category`) REFERENCES `category` (`id_category`),
  ADD CONSTRAINT `fk_admin` FOREIGN KEY (`id_admin`) REFERENCES `admins` (`id_admin`);

--
-- Contraintes pour la table `photo`
--
ALTER TABLE `photo`
  ADD CONSTRAINT `PHOTO_ITEM_FK` FOREIGN KEY (`id_item`) REFERENCES `item` (`id_item`);

--
-- Contraintes pour la table `subcategory`
--
ALTER TABLE `subcategory`
  ADD CONSTRAINT `CATEGORY_PK` FOREIGN KEY (`id_category`) REFERENCES `category` (`id_category`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
