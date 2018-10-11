-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  mer. 10 oct. 2018 à 14:49
-- Version du serveur :  5.7.19
-- Version de PHP :  7.1.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `wordpress_demo`
--

-- --------------------------------------------------------

--
-- Structure de la table `wp_keliosis`
--

DROP TABLE IF EXISTS `wp_keliosis`;
CREATE TABLE IF NOT EXISTS `wp_keliosis` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `value` longtext COLLATE utf8mb4_unicode_520_ci NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `name` (`name`)
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_520_ci;

--
-- Déchargement des données de la table `wp_keliosis`
--

INSERT INTO `wp_keliosis` (`id`, `name`, `value`) VALUES
(8, 'form_01', 'a:4:{s:7:\"input_1\";s:3:\"123\";s:8:\"input_11\";s:3:\"123\";s:8:\"input_12\";s:3:\"123\";s:10:\"submitForm\";s:7:\"form_01\";}'),
(4, 'form_02', 'a:4:{s:7:\"input_2\";s:9:\"wxcwxcwxc\";s:8:\"input_21\";s:9:\"wxcwxcwxc\";s:8:\"input_22\";s:9:\"wxcwxcwxc\";s:10:\"submitForm\";s:7:\"form_02\";}'),
(9, 'form_03', 'a:4:{s:7:\"input_3\";s:7:\"azezaea\";s:8:\"input_31\";s:6:\"azeaze\";s:8:\"input_32\";s:9:\"azeazeaze\";s:10:\"submitForm\";s:7:\"form_03\";}');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
