-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  Dim 16 août 2020 à 09:33
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
-- Structure de la table `brands`
--

DROP TABLE IF EXISTS `brands`;
CREATE TABLE IF NOT EXISTS `brands` (
  `id_brand` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(250) NOT NULL,
  `description` varchar(250) NOT NULL,
  PRIMARY KEY (`id_brand`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `brands`
--

INSERT INTO `brands` (`id_brand`, `name`, `description`) VALUES
(1, 'Dilex', 'description'),
(2, 'Ellix', 'description'),
(3, "L'dora", 'description'),
(4, 'Nurixo', 'description'),
(5, 'Pristive', 'description'),
(6, 'W&B', 'description');

-- --------------------------------------------------------

--
-- Structure de la table `categories`
--

DROP TABLE IF EXISTS `categories`;
CREATE TABLE IF NOT EXISTS `categories` (
  `id_category` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(250) NOT NULL,
  PRIMARY KEY (`id_category`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `categories`
--

INSERT INTO `categories` (`id_category`, `name`) VALUES
(1, 'Beauté'),
(2, 'Hygiène et Soins'),
(3, 'Special Femme');

-- --------------------------------------------------------

--
-- Structure de la table `images`
--

DROP TABLE IF EXISTS `images`;
CREATE TABLE IF NOT EXISTS `images` (
  `id_image` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(250) NOT NULL,
  `alt` varchar(250) NOT NULL,
  `id_item` int(11) NOT NULL,
  PRIMARY KEY (`id_image`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `items`
--

DROP TABLE IF EXISTS `items`;
CREATE TABLE IF NOT EXISTS `items` (
  `id_item` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(250) NOT NULL,
  `description` text NOT NULL,
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
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `items`
--

INSERT INTO `items` (`id_item`, `name`, `description`, `price`, `id_category`, `id_subcategory`, `id_brand`, `avis`, `note`, `id_admin`) VALUES
(1, 'Lingettes hydratantes', "Les lingettes nettoyantes et désinfectantes avec huile d'argan...", 15, 2, 10, 1, 'OK', 4, 1),
(2, 'Lingettes démaquillantes', 'Lorem ipsum...', 10, 2, 10, 1, 'Lorem ipsum...', 3, 1),
(3, 'Serviettes hygiéniques, taille M', 'Lorem ipsum...', 10, 3, 11, 1, 'Lorem ipsum...', 4, 1),
(4, 'Mouchoirs en papier', 'Lorem ipsum...', 10, 3, 11, 1, 'Lorem ipsum...', 4, 1);

-- --------------------------------------------------------

--
-- Structure de la table `links`
--

DROP TABLE IF EXISTS `links`;
CREATE TABLE IF NOT EXISTS `links` (
  `id_link` int(250) NOT NULL AUTO_INCREMENT,
  `name` varchar(250) NOT NULL,
  `url` varchar(250) NOT NULL,
  `id_admin` int(11) NOT NULL,
  PRIMARY KEY (`id_link`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `links`
--

INSERT INTO `links` (`id_link`, `name`, `url`, `id_admin`) VALUES
(1, 'Accueil', 'index?route=home', 1),
(2, 'Politique de confidentialité', 'index?route=politique', 1),
(3, 'CGV', 'index?route=cgv', 1),
(4, 'Contact', 'index?route=contact', 1),
(5, 'Liens', 'index?route=liens', 1),
(6, 'Facebook', 'https://www.facebook.com/piscofficial/', 1),
(7, 'Instagram', 'https://www.instagram.com/piscofficial/', 1);

-- --------------------------------------------------------

--
-- Structure de la table `subcategories`
--

DROP TABLE IF EXISTS `subcategories`;
CREATE TABLE IF NOT EXISTS `subcategories` (
  `id_subcategory` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(250) NOT NULL,
  `id_category` int(11) NOT NULL,
  PRIMARY KEY (`id_subcategory`),
  KEY `CATEGORY_PK` (`id_category`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `subcategories`
--

INSERT INTO `subcategories` (`id_subcategory`, `name`, `id_category`) VALUES
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
(11, 'Protection hygiènique', 3),
(12, 'Parfum', 1);

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `items`
--
ALTER TABLE `items`
  ADD CONSTRAINT `ITEM_BRAND0_FK` FOREIGN KEY (`id_brand`) REFERENCES `brands` (`id_brand`),
  ADD CONSTRAINT `ITEM_CATEGORY_FK` FOREIGN KEY (`id_category`) REFERENCES `categories` (`id_category`),
  ADD CONSTRAINT `fk_admin` FOREIGN KEY (`id_admin`) REFERENCES `admins` (`id_admin`);

--
-- Contraintes pour la table `subcategories`
--
ALTER TABLE `subcategories`
  ADD CONSTRAINT `CATEGORY_PK` FOREIGN KEY (`id_category`) REFERENCES `categories` (`id_category`);
COMMIT;

--
-- Structure de la table `chat`
--

DROP TABLE IF EXISTS `chat`;
CREATE TABLE IF NOT EXISTS `chat` (
  `id_chat` int(11) NOT NULL AUTO_INCREMENT,
  `pseudo` varchar(250) NOT NULL,
  `message` text NOT NULL,
  `id_admin` int(11) NOT NULL,
  PRIMARY KEY (`id_chat`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
