-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost
-- Généré le : ven. 13 nov. 2020 à 17:55
-- Version du serveur :  5.7.32-0ubuntu0.18.04.1
-- Version de PHP : 7.3.15-3+ubuntu18.04.1+deb.sury.org+1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `live-28_cindy40230_fromagerie_renelle_projet`
--

-- --------------------------------------------------------

--
-- Structure de la table `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `category`
--

INSERT INTO `category` (`id`, `name`) VALUES
(1, 'Actualité'),
(2, 'Recette'),
(3, 'évènement');

-- --------------------------------------------------------

--
-- Structure de la table `dough`
--

CREATE TABLE `dough` (
  `id` int(11) NOT NULL,
  `name` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `dough`
--

INSERT INTO `dough` (`id`, `name`) VALUES
(1, 'pates fraiches'),
(2, 'Pâtes molles à croûte '),
(3, 'Pâtes pressées cuite'),
(4, 'Pâtes pressées non cuite'),
(5, 'Pâtes molle à croûte fleurie'),
(6, 'Pâtes molle à croûte lavée'),
(7, 'Pâtes persillées');

-- --------------------------------------------------------

--
-- Structure de la table `knife`
--

CREATE TABLE `knife` (
  `id` int(11) NOT NULL,
  `name` varchar(45) NOT NULL,
  `picture` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `knife`
--

INSERT INTO `knife` (`id`, `name`, `picture`) VALUES
(1, 'chèvre', '1598964734chevre.svg'),
(2, 'couteau-a-brie', 'couteau-a-brie.svg'),
(3, 'pate-dur', 'pate-dur.svg'),
(4, 'pate-extra-dur', 'pate-extra-dur.svg'),
(5, 'pate-molle-a-croute-lavee', 'pate-molle-a-croute-lavee.svg'),
(6, 'pate-molle-a-pate-fleurie', 'pate-molle-a-pate-fleurie.svg'),
(7, 'pate-molle-sans-croute', 'pate-molle-sans-croute.svg'),
(8, 'pate-persillée', 'pate-persillée.svg'),
(9, 'pate-pressee-non-cuite', 'pate-pressee-non-cuite.svg');

-- --------------------------------------------------------

--
-- Structure de la table `messages`
--

CREATE TABLE `messages` (
  `id` int(11) NOT NULL,
  `lastName` varchar(255) NOT NULL,
  `firstName` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `sujet` varchar(255) NOT NULL,
  `content` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `messages`
--

INSERT INTO `messages` (`id`, `lastName`, `firstName`, `email`, `sujet`, `content`) VALUES
(3, 'Ruet', 'Cindy', 'cindy.ruet@sfr.fr', 'livraison', 'Bonjour,avez vous d\'autre livraison possible ?'),
(4, 'RUET', 'CINDY', 'cindy.ruet@sfr.fr', 'commande en retard', 'Bonjour, je n\'ai pas recu ma commande ,pouvez vous me tenir informer'),
(9, 'RUET', 'CINDY', 'cindy.ruet@sfr.fr', '&lt;script&gt; alert (\'message\')&lt;/script&gt;', '');

-- --------------------------------------------------------

--
-- Structure de la table `milk`
--

CREATE TABLE `milk` (
  `id` int(11) NOT NULL,
  `name` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `milk`
--

INSERT INTO `milk` (`id`, `name`) VALUES
(1, 'Vache'),
(2, 'Chèvre'),
(3, 'Brebis');

-- --------------------------------------------------------

--
-- Structure de la table `order`
--

CREATE TABLE `order` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `totalAmount` double NOT NULL,
  `weightTotal` float NOT NULL,
  `taxRate` float NOT NULL,
  `taxAmount` double NOT NULL,
  `orderDate` datetime NOT NULL,
  `statut_id` int(11) NOT NULL,
  `completeTimesTamp` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `order`
--

INSERT INTO `order` (`id`, `user_id`, `totalAmount`, `weightTotal`, `taxRate`, `taxAmount`, `orderDate`, `statut_id`, `completeTimesTamp`) VALUES
(147, 51, 67.97, 0.0025, 20, 13.594, '2020-09-05 11:07:32', 1, NULL),
(148, 51, 47.97, 0.00375, 20, 9.594, '2020-09-05 11:22:15', 3, NULL),
(149, 51, 115.94, 0.0075, 20, 23.188, '2020-09-05 11:24:59', 1, NULL),
(150, 51, 11.4, 0.475, 20, 2.28, '2020-09-05 11:25:37', 1, NULL),
(151, 51, 36.98, 2, 20, 7.396, '2020-09-05 12:19:48', 1, NULL),
(152, 51, 32.39, 1.675, 20, 6.478, '2020-09-07 08:23:48', 1, NULL),
(153, 51, 24.79, 0.9, 20, 4.958, '2020-09-07 11:41:22', 1, NULL),
(155, 51, 73.96, 3, 20, 14.792, '2020-09-08 11:39:09', 1, NULL),
(156, 51, 11.4, 0.45, 20, 2.28, '2020-09-08 14:51:34', 2, NULL),
(159, 55, 232.66, 10.65, 20, 46.532, '2020-09-09 14:03:04', 1, NULL),
(165, 51, 19.79, 0.9, 20, 3.958, '2020-09-10 16:26:10', 1, NULL),
(177, 57, 20.19, 0.95, 20, 4.038, '2020-09-11 16:15:09', 1, NULL),
(181, 58, 11.4, 0.5, 20, 2.28, '2020-09-11 16:54:24', 2, NULL),
(183, 58, 49.58, 1.75, 20, 9.916, '2020-09-15 17:50:56', 1, NULL),
(184, 60, 16.5, 0.775, 20, 3.3, '2020-09-18 11:02:39', 1, NULL),
(185, 57, 96.2, 4.6, 20, 19.24, '2020-10-12 09:32:20', 3, NULL),
(187, 57, 15.2, 0.525, 20, 3.04, '2020-10-13 14:00:34', 2, NULL),
(188, 57, 88.96, 3.25, 20, 17.792, '2020-10-13 16:27:52', 1, NULL),
(189, 57, 15.99, 0.75, 20, 3.198, '2020-10-14 18:20:02', 1, NULL),
(191, 57, 4.2, 0.2, 20, 0.84, '2020-10-20 09:09:21', 1, NULL),
(193, 57, 15.6, 0.575, 20, 3.12, '2020-11-02 08:25:25', 1, NULL),
(201, 57, 3.8, 0.15, 20, 0.76, '2020-11-03 14:28:32', 1, NULL),
(202, 57, 41.2, 1.85, 20, 8.24, '2020-11-04 16:38:45', 1, NULL),
(203, 57, 41.2, 1.85, 20, 8.24, '2020-11-04 16:40:52', 1, NULL),
(204, 57, 41.2, 1.85, 20, 8.24, '2020-11-04 16:41:09', 1, NULL),
(205, 57, 41.2, 1.85, 20, 8.24, '2020-11-04 16:41:40', 1, NULL),
(207, 57, 26.6, 0.975, 20, 5.32, '2020-11-04 16:47:36', 1, NULL),
(208, 57, 22.8, 0.9, 20, 4.56, '2020-11-04 16:50:11', 1, NULL),
(209, 57, 7.6, 0.3, 20, 1.52, '2020-11-04 17:35:00', 2, NULL),
(214, 58, 46.18, 1.7, 20, 9.236, '2020-11-04 20:21:50', 1, NULL),
(216, 57, 27.4, 1.15, 20, 5.48, '2020-11-06 09:26:39', 1, NULL),
(217, 57, 30.4, 1.325, 20, 6.08, '2020-11-06 09:27:40', 1, NULL),
(218, 57, 25.19, 0.95, 20, 5.038, '2020-11-06 09:28:44', 1, NULL),
(260, 57, 7.6, 0.25, 20, 1.52, '2020-11-12 17:48:13', 1, NULL),
(261, 57, 59.98, 2.075, 20, 11.996, '2020-11-12 18:08:03', 1, NULL),
(263, 57, 98.36, 3.85, 20, 19.672, '2020-11-12 18:20:51', 1, NULL),
(264, 57, 100.97, 3.35, 20, 20.194, '2020-11-12 18:24:56', 1, NULL),
(266, 57, 73.16, 3.2, 20, 14.632, '2020-11-13 09:14:16', 1, NULL),
(267, 57, 73.16, 3.2, 20, 14.632, '2020-11-13 09:14:19', 1, NULL),
(268, 57, 32.39, 1.175, 20, 6.478, '2020-11-13 09:15:45', 1, NULL),
(269, 57, 32.39, 1.175, 20, 6.478, '2020-11-13 09:17:08', 1, NULL),
(270, 57, 32.39, 1.175, 20, 6.478, '2020-11-13 09:17:10', 1, NULL),
(273, 57, 27.79, 1.325, 20, 5.558, '2020-11-13 09:21:51', 1, NULL),
(275, 57, 27.79, 1.325, 20, 5.558, '2020-11-13 09:23:38', 1, NULL),
(276, 57, 27.79, 1.325, 20, 5.558, '2020-11-13 09:24:01', 1, NULL),
(278, 57, 27.79, 1.325, 20, 5.558, '2020-11-13 09:26:46', 1, NULL),
(279, 57, 27.79, 1.325, 20, 5.558, '2020-11-13 09:27:26', 1, NULL),
(302, 57, 67.17, 2.7, 20, 13.434, '2020-11-13 11:57:21', 1, NULL),
(303, 57, 67.17, 2.7, 20, 13.434, '2020-11-13 11:57:23', 1, NULL),
(304, 57, 67.17, 2.7, 20, 13.434, '2020-11-13 11:57:23', 1, NULL),
(305, 57, 67.17, 2.7, 20, 13.434, '2020-11-13 11:57:23', 1, NULL),
(306, 57, 67.17, 2.7, 20, 13.434, '2020-11-13 11:57:24', 1, NULL),
(307, 57, 67.17, 2.7, 20, 13.434, '2020-11-13 11:57:27', 1, NULL),
(308, 57, 67.17, 2.7, 20, 13.434, '2020-11-13 11:57:37', 1, NULL),
(309, 57, 67.17, 2.7, 20, 13.434, '2020-11-13 11:58:16', 1, NULL),
(310, 57, 67.17, 2.7, 20, 13.434, '2020-11-13 11:58:37', 1, NULL),
(311, 57, 30.4, 1.1, 20, 6.08, '2020-11-13 12:03:53', 1, NULL),
(312, 57, 30.4, 1.1, 20, 6.08, '2020-11-13 12:03:56', 1, NULL),
(313, 57, 30.4, 1.1, 20, 6.08, '2020-11-13 12:05:18', 1, NULL),
(314, 57, 30.4, 1.1, 20, 6.08, '2020-11-13 12:06:14', 1, NULL),
(315, 57, 30.4, 1.1, 20, 6.08, '2020-11-13 12:07:56', 1, NULL),
(316, 57, 30.4, 1.1, 20, 6.08, '2020-11-13 12:08:38', 1, NULL),
(317, 57, 30.4, 1.1, 20, 6.08, '2020-11-13 12:09:21', 1, NULL),
(318, 57, 30.4, 1.1, 20, 6.08, '2020-11-13 12:09:27', 1, NULL),
(319, 57, 30.4, 1.1, 20, 6.08, '2020-11-13 12:09:51', 1, NULL),
(320, 57, 3.8, 0.125, 20, 0.76, '2020-11-13 12:14:26', 1, NULL),
(321, 57, 3.8, 0.125, 20, 0.76, '2020-11-13 12:14:33', 1, NULL),
(322, 57, 3.8, 0.125, 20, 0.76, '2020-11-13 12:15:53', 1, NULL),
(323, 57, 3.8, 0.125, 20, 0.76, '2020-11-13 12:16:01', 1, NULL),
(324, 57, 3.8, 0.125, 20, 0.76, '2020-11-13 12:26:47', 1, NULL),
(325, 57, 3.8, 0.125, 20, 0.76, '2020-11-13 12:30:31', 1, NULL),
(326, 57, 3.8, 0.125, 20, 0.76, '2020-11-13 12:33:44', 1, NULL),
(327, 57, 3.8, 0.125, 20, 0.76, '2020-11-13 12:35:46', 1, NULL),
(328, 57, 3.8, 0.125, 20, 0.76, '2020-11-13 12:36:23', 1, NULL),
(329, 57, 3.8, 0.125, 20, 0.76, '2020-11-13 12:36:42', 1, NULL),
(330, 57, 3.8, 0.125, 20, 0.76, '2020-11-13 12:37:48', 1, NULL),
(331, 57, 3.8, 0.125, 20, 0.76, '2020-11-13 12:41:46', 1, NULL),
(332, 57, 3.8, 0.125, 20, 0.76, '2020-11-13 12:42:38', 1, NULL),
(333, 57, 8.4, 0.4, 20, 1.68, '2020-11-13 13:36:04', 1, NULL),
(334, 57, 8.4, 0.4, 20, 1.68, '2020-11-13 13:36:10', 1, NULL),
(335, 57, 8.4, 0.4, 20, 1.68, '2020-11-13 13:36:59', 1, NULL),
(336, 57, 3.8, 0.125, 20, 0.76, '2020-11-13 13:44:05', 1, NULL),
(337, 57, 47.6, 2, 20, 9.52, '2020-11-13 13:45:35', 1, NULL),
(338, 57, 7.6, 0.25, 20, 1.52, '2020-11-13 13:47:17', 1, NULL),
(339, 57, 44.98, 1.825, 20, 8.996, '2020-11-13 13:57:52', 1, NULL),
(340, 57, 62.98, 2.425, 20, 12.596, '2020-11-13 14:08:31', 1, NULL),
(341, 57, 89.96, 3.65, 20, 17.992, '2020-11-13 14:17:53', 1, NULL),
(342, 57, 11.4, 0.475, 20, 2.28, '2020-11-13 14:21:25', 1, NULL),
(343, 57, 11.4, 0.475, 20, 2.28, '2020-11-13 14:21:41', 1, NULL),
(344, 57, 11.4, 0.475, 20, 2.28, '2020-11-13 14:22:49', 1, NULL),
(345, 57, 11.4, 0.475, 20, 2.28, '2020-11-13 14:27:27', 1, NULL),
(346, 57, 11.4, 0.475, 20, 2.28, '2020-11-13 14:28:34', 1, NULL),
(347, 57, 11.4, 0.475, 20, 2.28, '2020-11-13 14:28:44', 1, NULL),
(348, 57, 11.4, 0.475, 20, 2.28, '2020-11-13 14:29:02', 1, NULL),
(349, 57, 11.4, 0.475, 20, 2.28, '2020-11-13 14:29:27', 1, NULL),
(350, 57, 11.4, 0.475, 20, 2.28, '2020-11-13 14:30:21', 1, NULL),
(351, 57, 8.4, 0.4, 20, 1.68, '2020-11-13 14:39:01', 1, NULL),
(352, 57, 8, 0.325, 20, 1.6, '2020-11-13 14:39:40', 1, NULL),
(353, 57, 8, 0.325, 20, 1.6, '2020-11-13 14:39:43', 1, NULL),
(354, 57, 8, 0.325, 20, 1.6, '2020-11-13 14:41:31', 1, NULL),
(355, 57, 8, 0.325, 20, 1.6, '2020-11-13 14:41:38', 1, NULL),
(356, 57, 8, 0.325, 20, 1.6, '2020-11-13 14:41:58', 1, NULL),
(357, 57, 7.6, 0.3, 20, 1.52, '2020-11-13 14:45:49', 1, NULL),
(358, 57, 8.4, 0.4, 20, 1.68, '2020-11-13 14:49:39', 1, NULL),
(359, 57, 68.96, 3, 20, 13.792, '2020-11-13 14:52:24', 1, NULL),
(360, 57, 3.8, 0.125, 20, 0.76, '2020-11-13 14:54:42', 1, NULL),
(361, 57, 4.2, 0.2, 20, 0.84, '2020-11-13 15:02:56', 1, NULL),
(362, 57, 4.2, 0.2, 20, 0.84, '2020-11-13 15:05:42', 1, NULL),
(363, 57, 4.2, 0.2, 20, 0.84, '2020-11-13 15:07:03', 1, NULL),
(364, 57, 4.2, 0.2, 20, 0.84, '2020-11-13 15:08:38', 1, NULL),
(365, 57, 4.2, 0.2, 20, 0.84, '2020-11-13 15:12:25', 1, NULL),
(366, 57, 4.2, 0.2, 20, 0.84, '2020-11-13 15:12:59', 1, NULL),
(367, 57, 4.2, 0.2, 20, 0.84, '2020-11-13 15:27:25', 1, NULL),
(368, 57, 4.2, 0.2, 20, 0.84, '2020-11-13 15:28:53', 1, NULL),
(369, 57, 4.2, 0.2, 20, 0.84, '2020-11-13 15:28:57', 1, NULL),
(370, 57, 4.2, 0.2, 20, 0.84, '2020-11-13 15:29:29', 1, NULL),
(371, 57, 4.2, 0.2, 20, 0.84, '2020-11-13 15:30:18', 1, NULL),
(372, 57, 4.2, 0.2, 20, 0.84, '2020-11-13 15:32:36', 1, NULL),
(373, 57, 4.2, 0.2, 20, 0.84, '2020-11-13 15:34:09', 1, NULL),
(374, 57, 4.2, 0.2, 20, 0.84, '2020-11-13 15:39:39', 1, NULL),
(375, 57, 4.2, 0.2, 20, 0.84, '2020-11-13 15:40:18', 1, NULL),
(376, 57, 4.2, 0.2, 20, 0.84, '2020-11-13 15:40:55', 1, NULL),
(377, 57, 4.2, 0.2, 20, 0.84, '2020-11-13 15:41:17', 1, NULL),
(378, 57, 11.4, 0.425, 20, 2.28, '2020-11-13 15:44:30', 1, NULL),
(379, 57, 11.4, 0.425, 20, 2.28, '2020-11-13 15:44:40', 1, NULL),
(380, 57, 11.4, 0.425, 20, 2.28, '2020-11-13 15:45:08', 1, NULL),
(381, 57, 11.4, 0.425, 20, 2.28, '2020-11-13 15:46:01', 1, NULL),
(382, 57, 44.58, 1.775, 20, 8.916, '2020-11-13 15:50:01', 2, NULL),
(383, 57, 19, 0.65, 20, 3.8, '2020-11-13 16:05:49', 1, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `orderlines`
--

CREATE TABLE `orderlines` (
  `id` int(11) NOT NULL,
  `quantityOrdered` int(4) NOT NULL,
  `product_id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `priceEach` float NOT NULL,
  `type` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `orderlines`
--

INSERT INTO `orderlines` (`id`, `quantityOrdered`, `product_id`, `order_id`, `priceEach`, `type`) VALUES
(301, 1, 12, 147, 15.99, 'tray'),
(302, 1, 13, 147, 20.99, 'tray'),
(303, 1, 14, 147, 30.99, 'tray'),
(304, 3, 12, 148, 15.99, 'tray'),
(305, 2, 12, 149, 15.99, 'tray'),
(306, 4, 13, 149, 20.99, 'tray'),
(307, 1, 45, 150, 3.8, 'produit'),
(308, 1, 46, 150, 3.8, 'produit'),
(309, 1, 56, 150, 3.8, 'produit'),
(310, 1, 12, 151, 15.99, 'tray'),
(311, 1, 13, 151, 20.99, 'tray'),
(312, 2, 4, 152, 3.8, 'produit'),
(313, 1, 49, 152, 3.8, 'produit'),
(314, 1, 13, 152, 20.99, 'tray'),
(315, 1, 4, 153, 3.8, 'produit'),
(316, 1, 13, 153, 20.99, 'tray'),
(318, 2, 12, 155, 15.99, 'tray'),
(319, 2, 13, 155, 20.99, 'tray'),
(320, 2, 4, 156, 3.8, 'produit'),
(321, 1, 46, 156, 3.8, 'produit'),
(324, 1, 13, 159, 20.99, 'tray'),
(325, 13, 12, 159, 15.99, 'tray'),
(326, 1, 4, 159, 3.8, 'produit'),
(331, 1, 46, 165, 3.8, 'produit'),
(332, 1, 12, 165, 15.99, 'tray'),
(342, 1, 1, 177, 4.2, 'produit'),
(343, 1, 12, 177, 15.99, 'tray'),
(349, 2, 2, 181, 3.8, 'produit'),
(350, 1, 9, 181, 3.8, 'produit'),
(352, 2, 13, 183, 20.99, 'tray'),
(353, 2, 5, 183, 3.8, 'produit'),
(354, 2, 74, 184, 3.8, 'produit'),
(355, 1, 134, 184, 5.1, 'produit'),
(356, 1, 38, 184, 3.8, 'produit'),
(357, 1, 56, 185, 3.8, 'produit'),
(358, 22, 1, 185, 4.2, 'produit'),
(360, 1, 2, 187, 3.8, 'produit'),
(361, 1, 3, 187, 3.8, 'produit'),
(362, 2, 10, 187, 3.8, 'produit'),
(363, 1, 12, 188, 15.99, 'tray'),
(364, 2, 13, 188, 20.99, 'tray'),
(365, 1, 14, 188, 30.99, 'tray'),
(366, 1, 12, 189, 15.99, 'tray'),
(368, 1, 1, 191, 4.2, 'produit'),
(370, 1, 1, 193, 4.2, 'produit'),
(371, 3, 3, 193, 3.8, 'produit'),
(384, 1, 15, 201, 3.8, 'produit'),
(386, 4, 8, 207, 15.2, 'produit'),
(387, 4, 6, 208, 3.8, 'produit'),
(388, 2, 9, 208, 3.8, 'produit'),
(389, 2, 8, 209, 7.6, 'produit'),
(396, 1, 1, 214, 4.2, 'produit'),
(397, 2, 13, 214, 41.98, 'tray'),
(399, 1, 5, 217, 3.8, 'produit'),
(400, 3, 9, 217, 11.4, 'produit'),
(401, 4, 15, 217, 15.2, 'produit'),
(402, 1, 13, 218, 20.99, 'tray'),
(403, 1, 1, 218, 4.2, 'produit'),
(437, 2, 10, 260, 3.8, 'produit'),
(438, 1, 1, 261, 4.2, 'produit'),
(439, 1, 18, 261, 3.8, 'produit'),
(440, 1, 13, 261, 20.99, 'tray'),
(441, 1, 14, 261, 30.99, 'tray'),
(443, 1, 1, 263, 4.2, 'produit'),
(444, 2, 20, 263, 3.8, 'produit'),
(445, 1, 12, 263, 15.99, 'tray'),
(446, 3, 13, 263, 20.99, 'tray'),
(447, 2, 18, 263, 3.8, 'produit'),
(448, 1, 1, 264, 4.2, 'produit'),
(449, 1, 12, 264, 3.8, 'produit'),
(450, 3, 14, 264, 30.99, 'tray'),
(466, 1, 1, 310, 4.2, 'produit'),
(467, 2, 12, 310, 15.99, 'tray'),
(468, 1, 14, 310, 30.99, 'tray'),
(469, 4, 2, 319, 3.8, 'produit'),
(470, 4, 3, 319, 3.8, 'produit'),
(471, 1, 10, 320, 3.8, 'produit'),
(472, 1, 10, 321, 3.8, 'produit'),
(473, 1, 10, 322, 3.8, 'produit'),
(474, 1, 10, 323, 3.8, 'produit'),
(475, 1, 10, 332, 3.8, 'produit'),
(476, 2, 1, 335, 4.2, 'produit'),
(477, 1, 3, 336, 3.8, 'produit'),
(478, 2, 3, 337, 3.8, 'produit'),
(479, 5, 1, 337, 4.2, 'produit'),
(480, 5, 4, 337, 3.8, 'produit'),
(481, 2, 3, 338, 3.8, 'produit'),
(482, 1, 1, 339, 4.2, 'produit'),
(483, 1, 6, 339, 3.8, 'produit'),
(484, 1, 13, 339, 20.99, 'tray'),
(485, 1, 12, 339, 15.99, 'tray'),
(486, 2, 1, 340, 4.2, 'produit'),
(487, 1, 6, 340, 3.8, 'produit'),
(488, 1, 12, 340, 15.99, 'tray'),
(489, 1, 14, 340, 30.99, 'tray'),
(490, 1, 44, 340, 3.8, 'produit'),
(491, 2, 1, 341, 4.2, 'produit'),
(492, 2, 6, 341, 3.8, 'produit'),
(493, 2, 13, 341, 20.99, 'tray'),
(494, 2, 12, 341, 15.99, 'tray'),
(495, 1, 60, 350, 3.8, 'produit'),
(496, 1, 62, 350, 3.8, 'produit'),
(497, 1, 61, 350, 3.8, 'produit'),
(498, 1, 1, 354, 4.2, 'produit'),
(499, 1, 3, 354, 3.8, 'produit'),
(500, 1, 1, 355, 4.2, 'produit'),
(501, 1, 3, 355, 3.8, 'produit'),
(502, 1, 1, 356, 4.2, 'produit'),
(503, 1, 3, 356, 3.8, 'produit'),
(504, 1, 8, 357, 3.8, 'produit'),
(505, 1, 12, 357, 3.8, 'produit'),
(506, 2, 1, 358, 4.2, 'produit'),
(507, 1, 13, 359, 20.99, 'tray'),
(508, 3, 12, 359, 15.99, 'tray'),
(509, 1, 3, 360, 3.8, 'produit'),
(510, 1, 1, 377, 4.2, 'produit'),
(511, 1, 3, 381, 3.8, 'produit'),
(512, 2, 8, 381, 3.8, 'produit'),
(513, 1, 3, 382, 3.8, 'produit'),
(514, 1, 8, 382, 3.8, 'produit'),
(515, 1, 12, 382, 15.99, 'tray'),
(516, 1, 13, 382, 20.99, 'tray'),
(517, 1, 4, 383, 3.8, 'produit'),
(518, 4, 43, 383, 3.8, 'produit');

-- --------------------------------------------------------

--
-- Structure de la table `post`
--

CREATE TABLE `post` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `id_category` int(11) NOT NULL,
  `description` text NOT NULL,
  `picture` varchar(255) DEFAULT NULL,
  `createdDate` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `post`
--

INSERT INTO `post` (`id`, `title`, `id_category`, `description`, `picture`, `createdDate`) VALUES
(1, 'Lorem ipsum dolor sit amet ', 1, 'Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Vestibulum tortor quam, feugiat vitae, ultricies eget, tempor sit amet, ante. Donec eu libero sit amet quam egestas semper. Aenean ultricies mi vitae est. Mauris placerat eleifend leo. Quisque sit amet est et sapien ullamcorper pharetra. Vestibulum erat wisi, condimentum sed, commodo vitae, ornare sit amet, wisi. Aenean fermentum, elit eget tincidunt condimentum, eros ipsum rutrum orci, sagittis tempus lacus enim ac dui. Donec non enim in turpis pulvinar facilisis. Ut felis. Praesent dapibus, neque id cursus faucibus, tortor neque egestas augue, eu vulputate magna eros eu erat. Aliquam erat volutpat. Nam dui mi, tincidunt quis, accumsan porttitor, facilisis luctus, metus Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Vestibulum tortor quam, feugiat vitae, ultricies eget, tempor sit amet, ante. Donec eu libero sit amet quam egestas semper. Aenean ultricies mi vitae est. Mauris placerat eleifend leo. Quisque sit amet est et sapien ullamcorper pharetra. Vestibulum erat wisi, condimentum sed, commodo vitae, ornare sit amet, wisi. Aenean fermentum, elit eget tincidunt condimentum, eros ipsum rutrum orci, sagittis tempus lacus enim ac dui. Donec non enim in turpis pulvinar facilisis. Ut felis. Praesent dapibus, neque id cursus faucibus, tortor neque egestas augue, eu vulputate magna eros eu erat. Aliquam erat volutpat. Nam dui mi, tincidunt quis, accumsan porttitor, facilisis luctus, metus', '1599823221plateaufromage.jpg', '2020-11-13 07:48:12'),
(4, 'Lorem ipsum dolor sit amet!!!', 3, 'Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Vestibulum tortor quam, feugiat vitae, ultricies eget, tempor sit amet, ante. Donec eu libero sit amet quam egestas semper. Aenean ultricies mi vitae est. Mauris placerat eleifend leo. Quisque sit amet est et sapien ullamcorper pharetra. Vestibulum erat wisi, condimentum sed, commodo vitae, ornare sit amet, wisi. Aenean fermentum, elit eget tincidunt condimentum, eros ipsum rutrum orci, sagittis tempus lacus enim ac dui. Donec non enim in turpis pulvinar facilisis. Ut felis. Praesent dapibus, neque id cursus faucibus, tortor neque egestas augue, eu vulputate magna eros eu erat. Aliquam erat volutpat. Nam dui mi, tincidunt quis, accumsan porttitor, facilisis luctus, metus Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Vestibulum tortor quam, feugiat vitae, ultricies eget, tempor sit amet, ante. Donec eu libero sit amet quam egestas semper. Aenean ultricies mi vitae est.\r\n\r\nMauris placerat eleifend leo. Quisque sit amet est et sapien ullamcorper pharetra. Vestibulum erat wisi, condimentum sed, commodo vitae, ornare sit amet, wisi. Aenean fermentum, elit eget tincidunt condimentum, eros ipsum rutrum orci, sagittis tempus lacus enim ac dui. Donec non enim in turpis pulvinar facilisis. Ut felis. Praesent dapibus, neque id cursus faucibus, tortor neque egestas augue, eu vulputate magna eros eu erat. Aliquam erat volutpat. Nam dui mi, tincidunt quis, accumsan porttitor, facilisis luctus, metus', 'evenement-cheese.jpg', '2020-10-13 07:37:00'),
(5, 'dolor sit amet', 2, 'Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Vestibulum tortor quam, feugiat vitae, ultricies eget, tempor sit amet, ante. Donec eu libero sit amet quam egestas semper. Aenean ultricies mi vitae est. Mauris placerat eleifend leo. Quisque sit amet est et sapien ullamcorper pharetra. Vestibulum erat wisi, condimentum sed, commodo vitae, ornare sit amet, wisi. Aenean fermentum, elit eget tincidunt condimentum, eros ipsum rutrum orci, sagittis tempus lacus enim ac dui. Donec non enim in turpis pulvinar facilisis. Ut felis. Praesent dapibus, neque id cursus faucibus, tortor neque egestas augue, eu vulputate magna eros eu erat. Aliquam erat volutpat. Nam dui mi, tincidunt quis, accumsan porttitor, facilisis luctus, metus Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Vestibulum tortor quam, feugiat vitae, ultricies eget, tempor sit amet, ante. Donec eu libero sit amet quam egestas semper. Aenean ultricies mi vitae est.\r\n\r\nMauris placerat eleifend leo. Quisque sit amet est et sapien ullamcorper pharetra. Vestibulum erat wisi, condimentum sed, commodo vitae, ornare sit amet, wisi. Aenean fermentum, elit eget tincidunt condimentum, eros ipsum rutrum orci, sagittis tempus lacus enim ac dui. Donec non enim in turpis pulvinar facilisis. Ut felis. Praesent dapibus, neque id cursus faucibus, tortor neque egestas augue, eu vulputate magna eros eu erat. Aliquam erat volutpat. Nam dui mi, tincidunt quis, accumsan porttitor, facilisis luctus, metus', '', '2020-09-11 10:46:28'),
(6, 'sit amet Lorem ipsum dolor ', 1, 'Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Vestibulum tortor quam, feugiat vitae, ultricies eget, tempor sit amet, ante. Donec eu libero sit amet quam egestas semper. Aenean ultricies mi vitae est. Mauris placerat eleifend leo. Quisque sit amet est et sapien ullamcorper pharetra. Vestibulum erat wisi, condimentum sed, commodo vitae, ornare sit amet, wisi. Aenean fermentum, elit eget tincidunt condimentum, eros ipsum rutrum orci, sagittis tempus lacus enim ac dui. Donec non enim in turpis pulvinar facilisis. Ut felis. Praesent dapibus, neque id cursus faucibus, tortor neque egestas augue, eu vulputate magna eros eu erat. Aliquam erat volutpat. Nam dui mi, tincidunt quis, accumsan porttitor, facilisis luctus, metus Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Vestibulum tortor quam, feugiat vitae, ultricies eget, tempor sit amet, ante. Donec eu libero sit amet quam egestas semper. Aenean ultricies mi vitae est. Mauris placerat eleifend leo. Quisque sit amet est et sapien ullamcorper pharetra. Vestibulum erat wisi, condimentum sed, commodo vitae, ornare sit amet, wisi. Aenean fermentum, elit eget tincidunt condimentum, eros ipsum rutrum orci, sagittis tempus lacus enim ac dui. Donec non enim in turpis pulvinar facilisis. Ut felis. Praesent dapibus, neque id cursus faucibus, tortor neque egestas augue, eu vulputate magna eros eu erat. Aliquam erat volutpat. Nam dui mi, tincidunt quis, accumsan porttitor, facilisis luctus, metus', 'whiteandredcheese.png', '2020-09-11 10:46:50'),
(8, 'sit amet Lorem ipsum dolor ', 1, 'Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Vestibulum tortor quam, feugiat vitae, ultricies eget, tempor sit amet, ante. Donec eu libero sit amet quam egestas semper. Aenean ultricies mi vitae est. Mauris placerat eleifend leo. Quisque sit amet est et sapien ullamcorper pharetra. Vestibulum erat wisi, condimentum sed, commodo vitae, ornare sit amet, wisi. Aenean fermentum, elit eget tincidunt condimentum, eros ipsum rutrum orci, sagittis tempus lacus enim ac dui. Donec non enim in turpis pulvinar facilisis. Ut felis. Praesent dapibus, neque id cursus faucibus, tortor neque egestas augue, eu vulputate magna eros eu erat. Aliquam erat volutpat. Nam dui mi, tincidunt quis, accumsan porttitor, facilisis luctus, metus Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Vestibulum tortor quam, feugiat vitae, ultricies eget, tempor sit amet, ante. Donec eu libero sit amet quam egestas semper. Aenean ultricies mi vitae est. Mauris placerat eleifend leo. Quisque sit amet est et sapien ullamcorper pharetra. Vestibulum erat wisi, condimentum sed, commodo vitae, ornare sit amet, wisi. Aenean fermentum, elit eget tincidunt condimentum, eros ipsum rutrum orci, sagittis tempus lacus enim ac dui. Donec non enim in turpis pulvinar facilisis. Ut felis. Praesent dapibus, neque id cursus faucibus, tortor neque egestas augue, eu vulputate magna eros eu erat. Aliquam erat volutpat. Nam dui mi, tincidunt quis, accumsan porttitor, facilisis luctus, metus', 'whiteandredcheese.png', '2020-11-03 10:46:50'),
(9, 'Lorem ipsum dolor sit amet!!!', 3, 'Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Vestibulum tortor quam, feugiat vitae, ultricies eget, tempor sit amet, ante. Donec eu libero sit amet quam egestas semper. Aenean ultricies mi vitae est. Mauris placerat eleifend leo. Quisque sit amet est et sapien ullamcorper pharetra. Vestibulum erat wisi, condimentum sed, commodo vitae, ornare sit amet, wisi. Aenean fermentum, elit eget tincidunt condimentum, eros ipsum rutrum orci, sagittis tempus lacus enim ac dui. Donec non enim in turpis pulvinar facilisis. Ut felis. Praesent dapibus, neque id cursus faucibus, tortor neque egestas augue, eu vulputate magna eros eu erat. Aliquam erat volutpat. Nam dui mi, tincidunt quis, accumsan porttitor, facilisis luctus, metus Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Vestibulum tortor quam, feugiat vitae, ultricies eget, tempor sit amet, ante. Donec eu libero sit amet quam egestas semper. Aenean ultricies mi vitae est.\r\n\r\nMauris placerat eleifend leo. Quisque sit amet est et sapien ullamcorper pharetra. Vestibulum erat wisi, condimentum sed, commodo vitae, ornare sit amet, wisi. Aenean fermentum, elit eget tincidunt condimentum, eros ipsum rutrum orci, sagittis tempus lacus enim ac dui. Donec non enim in turpis pulvinar facilisis. Ut felis. Praesent dapibus, neque id cursus faucibus, tortor neque egestas augue, eu vulputate magna eros eu erat. Aliquam erat volutpat. Nam dui mi, tincidunt quis, accumsan porttitor, facilisis luctus, metus', 'evenement-cheese.jpg', '2020-11-04 07:37:00');

-- --------------------------------------------------------

--
-- Structure de la table `product`
--

CREATE TABLE `product` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `picture` varchar(255) DEFAULT NULL,
  `id_milk` int(11) NOT NULL,
  `id_dough` int(11) NOT NULL,
  `id_shape` int(11) NOT NULL,
  `id_knife` int(11) NOT NULL,
  `id_region` int(11) NOT NULL,
  `id_wine1` int(11) DEFAULT NULL,
  `id_wine2` int(11) DEFAULT NULL,
  `quantityInStock` tinyint(4) NOT NULL,
  `weight` int(255) NOT NULL,
  `buyPrice` double NOT NULL,
  `salePrice` double NOT NULL,
  `exclusivity` int(11) NOT NULL,
  `conseil_degustation` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `product`
--

INSERT INTO `product` (`id`, `name`, `description`, `picture`, `id_milk`, `id_dough`, `id_shape`, `id_knife`, `id_region`, `id_wine1`, `id_wine2`, `quantityInStock`, `weight`, `buyPrice`, `salePrice`, `exclusivity`, `conseil_degustation`) VALUES
(1, 'Recuite', 'La fabrication de la recuite\r\n\r\nLa recuite est la dénomination d\'un fromage de lactosérum de l\'Aveyron méridional et de l\'Est du Tarn. Il possède plusieurs noms en fonction de la région où il est fabriqué, le procéssus de fabrication reste pour autant quasiment le même :\r\n\r\nBrousse (Provence)\r\n\r\nBrocciu (Corse)\r\n\r\nSérac (Suisse)\r\n\r\nRicotta (Italie)\r\n\r\n \r\n\r\nLe produit de base est le petit lait (lactosérum) que l\'on récupère après la fabrication des tommes. \r\n\r\nNous le chauffons dans la cuve de transformation suffisamment de temps pour que se crée \"un floculat\" que nous récupèrons avec une passoire.\r\n\r\nLa coagulation de la protéine du petit-lait n\'est possible qu\'à haute température (80-90 °C). Les protéines concernées sont, en particulier, l\'albumine et la globuline.\r\n\r\n \r\n\r\nLa recuite se consomme habituellement nature, salée ou bien sucrée (miel, confiture, compote de fruits...). Elle sert aussi à l\'élaboration de la flaune, gâteau typiquement Aveyronnais.\r\n	', 'recuite.jpg', 3, 1, 8, 6, 7, NULL, NULL, 50, 3, 3.5, 4.2, 1, 'Adimenda conveniet Montius praefecti mandaverat custodiam scholarum docens scholarum propensior conveniet perferens sed conperto id praefecto propensior custodiam adlocutus ille quidem perferens nec consulens quidem quaestor palatinarum obiurgatorio indigna vita vocis'),
(2, 'Sérac-au-lait-de-Brebis', 'Adimenda conveniet Montius praefecti mandaverat custodiam scholarum docens scholarum propensior conveniet perferens sed conperto id praefecto propensior custodiam adlocutus ille quidem perferens nec consulens quidem quaestor palatinarum obiurgatorio indigna vita vocis quod commune nec post perferens quaestor super propensior securius docens consulens vocis scholarum iniusta vita palatinarum deiectas sed fieri.\r\n	', 'serac.jpg', 3, 1, 8, 6, 3, NULL, NULL, 41, 2, 3.2, 3.8, 0, NULL),
(3, 'Sérac-au-lait-de- Chèvre', 'Adimenda conveniet Montius praefecti mandaverat custodiam scholarum docens scholarum propensior conveniet perferens sed conperto id praefecto propensior custodiam adlocutus ille quidem perferens nec consulens quidem quaestor palatinarum obiurgatorio indigna vita vocis quod commune nec post perferens quaestor super propensior securius docens consulens vocis scholarum iniusta vita palatinarum deiectas sed fieri.\r\n	', 'serac.jpg', 2, 1, 8, 6, 3, NULL, NULL, 34, 1, 3.2, 3.8, 0, 'qsdfghjklqsdfghjkqsdfghj'),
(4, 'Sérac-au-lait-de- Vache', 'Adimenda conveniet Montius praefecti mandaverat custodiam scholarum docens scholarum propensior conveniet perferens sed conperto id praefecto propensior custodiam adlocutus ille quidem perferens nec consulens quidem quaestor palatinarum obiurgatorio indigna vita vocis quod commune nec post perferens quaestor super propensior securius docens consulens vocis scholarum iniusta vita palatinarum deiectas sed fieri.\r\n	', 'serac.jpg', 1, 1, 8, 6, 3, NULL, NULL, 43, 2, 3.2, 3.8, 0, ''),
(5, 'Claquebitou-au-lait-de-Chèvre', 'Adimenda conveniet Montius praefecti mandaverat custodiam scholarum docens scholarum propensior conveniet perferens sed conperto id praefecto propensior custodiam adlocutus ille quidem perferens nec consulens quidem quaestor palatinarum obiurgatorio indigna vita vocis quod commune nec post perferens quaestor super propensior securius docens consulens vocis scholarum iniusta vita palatinarum deiectas sed fieri.\r\n	', 'claquebitou.jpg', 2, 1, 6, 6, 3, NULL, NULL, 50, 1, 3.5, 3.8, 0, NULL),
(6, 'Claquebitou-Au lait-de-Brebis', 'Adimenda conveniet Montius praefecti mandaverat custodiam scholarum docens scholarum propensior conveniet perferens sed conperto id praefecto propensior custodiam adlocutus ille quidem perferens nec consulens quidem quaestor palatinarum obiurgatorio indigna vita vocis quod commune nec post perferens quaestor super propensior securius docens consulens vocis scholarum iniusta vita palatinarum deiectas sed fieri.\r\n	', 'claquebitou.jpg', 3, 1, 6, 6, 3, NULL, NULL, 46, 1, 3.5, 3.8, 0, NULL),
(7, 'Brocciu-au-lait-de-Chèvre', 'Adimenda conveniet Montius praefecti mandaverat custodiam scholarum docens scholarum propensior conveniet perferens sed conperto id praefecto propensior custodiam adlocutus ille quidem perferens nec consulens quidem quaestor palatinarum obiurgatorio indigna vita vocis quod commune nec post perferens quaestor super propensior securius docens consulens vocis scholarum iniusta vita palatinarum deiectas sed fieri.\r\n	', 'brocciu.jpg', 2, 1, 8, 6, 7, 11, 12, 47, 2, 3.5, 3.8, 0, NULL),
(8, 'Brocciu-au-lait-de-Brebis', 'Adimenda conveniet Montius praefecti mandaverat custodiam scholarum docens scholarum propensior conveniet perferens sed conperto id praefecto propensior custodiam adlocutus ille quidem perferens nec consulens quidem quaestor palatinarum obiurgatorio indigna vita vocis quod commune nec post perferens quaestor super propensior securius docens consulens vocis scholarum iniusta vita palatinarum deiectas sed fieri.\r\n	', 'brocciu.jpg', 3, 1, 8, 6, 7, 11, 12, 40, 2, 3.5, 3.8, 0, NULL),
(9, 'Greuilh', 'Adimenda conveniet Montius praefecti mandaverat custodiam scholarum docens scholarum propensior conveniet perferens sed conperto id praefecto propensior custodiam adlocutus ille quidem perferens nec consulens quidem quaestor palatinarum obiurgatorio indigna vita vocis quod commune nec post perferens quaestor super propensior securius docens consulens vocis scholarum iniusta vita palatinarum deiectas sed fieri.\r\n	', 'greuilh.jpg', 3, 1, 8, 6, 8, NULL, NULL, 50, 3, 3.5, 3.8, 0, NULL),
(10, 'Rove-des-Garrigues', 'Adimenda conveniet Montius praefecti mandaverat custodiam scholarum docens scholarum propensior conveniet perferens sed conperto id praefecto propensior custodiam adlocutus ille quidem perferens nec consulens quidem quaestor palatinarum obiurgatorio indigna vita vocis quod commune nec post perferens quaestor super propensior securius docens consulens vocis scholarum iniusta vita palatinarum deiectas sed fieri.\r\n	', 'rove-des-garrigues.jpg', 2, 1, 8, 6, 6, NULL, NULL, 50, 1, 3.5, 3.8, 0, NULL),
(12, 'Charolais', 'Adimenda conveniet Montius praefecti mandaverat custodiam scholarum docens scholarum propensior conveniet perferens sed conperto id praefecto propensior custodiam adlocutus ille quidem perferens nec consulens quidem quaestor palatinarum obiurgatorio indigna vita vocis quod commune nec post perferens quaestor super propensior securius docens consulens vocis scholarum iniusta vita palatinarum deiectas sed fieri.\r\n	', 'charolais.jpg', 2, 2, 6, 5, 4, 13, 14, 48, 2, 3.5, 3.8, 0, NULL),
(14, 'Chevrotin', 'Adimenda conveniet Montius praefecti mandaverat custodiam scholarum docens scholarum propensior conveniet perferens sed conperto id praefecto propensior custodiam adlocutus ille quidem perferens nec consulens quidem quaestor palatinarum obiurgatorio indigna vita vocis quod commune nec post perferens quaestor deiectas sed fieri.\r\n	', 'chevrotin.jpg', 2, 2, 6, 5, 4, 15, 16, 19, 2, 3.5, 3.8, 0, NULL),
(15, 'Maconnais', 'Adimenda conveniet Montius praefecti mandaverat custodiam scholarum docens scholarum propensior conveniet perferens sed conperto id praefecto propensior custodiam adlocutus ille quidem perferens nec consulens quidem quaestor palatinarum obiurgatorio indigna vita vocis quod commune nec post perferens quaestor super propensior securius docens consulens vocis scholarum iniusta vita palatinarum deiectas sed fieri.\r\n	', 'mâconnais.jpg', 2, 2, 6, 5, 3, 17, 18, 50, 2, 3.5, 3.8, 0, ''),
(16, 'Maconnais', 'Adimenda conveniet Montius praefecti mandaverat custodiam scholarum docens scholarum propensior conveniet perferens sed conperto id praefecto propensior custodiam adlocutus ille quidem perferens nec consulens quidem quaestor palatinarum obiurgatorio indigna vita vocis quod commune nec post perferens quaestor super propensior securius docens consulens vocis scholarum iniusta vita palatinarum deiectas sed fieri.\r\n	', 'mâconnais.jpg', 2, 2, 6, 5, 4, 18, 17, 50, 4, 3.5, 3.8, 0, ''),
(17, 'Bonde-de-gâtine', 'Adimenda conveniet Montius praefecti mandaverat custodiam scholarum docens scholarum propensior conveniet perferens sed conperto id praefecto propensior custodiam adlocuestor palatinarum obiurgatorio indigna vita vocis quod commune nec post perferens quaestor super propensior securius docens consulens vocis scholarum iniusta vita palatinarum deiectas sed fieri.\r\n	', 'bonde-de-gâtine.jpg', 2, 2, 6, 5, 8, NULL, NULL, 20, 2, 3.5, 3.8, 0, NULL),
(18, 'Rigotte-de-condrieu', 'Adimenda conveniet Montius praefecti mandaverat custodiam scholarum docens scholarum propensior conveniet perferens sed conperto id praefecto propensior custodiam adlocutus ille quidem perferens nec consulens quidem quaestor palatinarum obiurgatorio indigna vita vocis quod commune nec post perferens quaestor super propensior securius docens consulens vocis scholarum iniusta vita palatinarum deiectas sed fieri.\r\n	', 'rigotte-de-condrieu.jpg', 2, 2, 6, 5, 4, 19, 20, 50, 1, 3.5, 3.8, 0, 'obiurgatorio indigna vita vocis quod commune nec post perferens quaestor super propensior securius docens consulens vocis scholarum iniusta vita palatinarum deiectas sed fieri.\r\n	'),
(19, 'Bouton-de-culotte', 'Adimenda conveniet Montius praefecti mandaverat custodiam scholarum docens scholarum propensior conveniet perferens sed conperto id praefecto propensior custodiam adlocutus ille quidem perferens nec consulens quidem quaestor palatinarum obiurgatorio indigna vita vocis quod commune nec post perferens quaestor super propensior securius docens consulens vocis scholarum iniusta vita palatinarum deiectas sed fieri.\r\n	', 'bouton-de-culotte.jpg', 2, 2, 6, 5, 3, NULL, NULL, 20, 2, 3.5, 3.8, 0, 'obiurgatorio indigna vita vocis quod commune nec post perferens quaestor super propensior securius docens consulens vocis scholarum iniusta vita palatinarum deiectas sed fieri.\r\n	'),
(20, 'Crottin-de- chavignol', 'Adimenda conveniet Montius praefecti mandaverat custodiam scholarum docens scholarum propensior conveniet perferens sed conperto id praefecto propensior custodiam adlocutus ille quidem perferens nec consulens quidem quaestor palatinarum obiurgatorio indigna vita vocis quod commune nec post perferens quaestor super propensior securius docens consulens vocis scholarum iniusta vita palatinarum deiectas sed fieri.\r\n	', 'crottin-de-chavignol.jpg', 2, 2, 6, 5, 9, 21, 22, 17, 3, 3.5, 3.8, 0, 'obiurgatorio indigna vita vocis quod commune nec post perferens quaestor super propensior securius docens consulens vocis scholarum iniusta vita palatinarum deiectas sed fieri.\r\n	'),
(22, 'Vézelay(dôme)', 'Adimenda conveniet Montius praefecti mandaverat custodiam scholarum docens scholarum propensior conveniet perferens sed conperto id praefecto propensior custodiam adlocutus ille quidem perferens nec consulens quidem quaestor palatinarum obiurgatorio indigna vita vocis quod commune nec post perferens quaestor super propensior securius docens consulens vocis scholarum iniusta vita palatinarum deiectas sed fieri.\r\n	', 'dome-de-vezelay.jpg', 2, 2, 6, 5, 9, NULL, NULL, 20, 2, 3.5, 3.8, 0, 'obiurgatorio indigna vita vocis quod commune nec post perferens quaestor super propensior securius docens consulens vocis scholarum iniusta vita palatinarum deiectas sed fieri.\r\n	'),
(23, 'Cosne-du-port-Aubry', 'Adimenda conveniet Montius praefecti mandaverat custodiam scholarum docens scholarum propensior conveniet perferens sed conperto id praefecto propensior custodiam adlocutus ille quidem perferens nec consulens quidem quaestor palatinarum obiurgatorio indigna vita vocis quod commune nec post perferens quaestor super propensior securius docens consulens vocis scholarum iniusta vita palatinarum deiectas sed fieri.\r\n	', 'cosne-du-port\'aubry.jpg', 2, 2, 6, 5, 3, NULL, NULL, 20, 3, 3.5, 3.8, 0, 'obiurgatorio indigna vita vocis quod commune nec post perferens quaestor super propensior securius docens consulens vocis scholarum iniusta vita palatinarum deiectas sed fieri.\r\n	'),
(24, 'Pouligny-Saint-Pierre', 'Adimenda conveniet Montius praefecti mandaverat custodiam scholarum docens scholarum propensior conveniet perferens sed conperto id praefecto propensior custodiam adlocutus ille quidem perferens nec consulens quidem quaestor palatinarum obiurgatorio indigna vita vocis quod commune nec post perferens quaestor super propensior securius docens consulens vocis scholarum iniusta vita palatinarum deiectas sed fieri.\r\n	', 'poligny-saint-pierre.jpg', 2, 2, 6, 5, 9, 23, 24, 20, 1, 3.5, 3.8, 0, 'obiurgatorio indigna vita vocis quod commune nec post perferens quaestor super propensior securius docens consulens vocis scholarum iniusta vita palatinarum deiectas sed fieri.\r\n	'),
(25, 'Saint-Maure-De-Touraine', 'Adimenda conveniet Montius praefecti mandaverat custodiam scholarum docens scholarum propensior conveniet perferens sed conperto id praefecto propensior custodiam adlocutus ille quidem perferens nec consulens quidem quaestor palatinarum obiurgatorio indigna vita vocis quod commune nec post perferens quaestor super propensior securius docens consulens vocis scholarum iniusta vita palatinarum deiectas sed fieri.\r\n	', 'sainte-maure-de-touraine.jpg', 2, 2, 8, 5, 9, 21, 25, 20, 2, 3.5, 3.8, 0, 'obiurgatorio indigna vita vocis quod commune nec post perferens quaestor super propensior securius docens consulens vocis scholarum iniusta vita palatinarum deiectas sed fieri.\r\n	'),
(26, 'Saint-Maure-De-Touraine', 'Adimenda conveniet Montius praefecti mandaverat custodiam scholarum docens scholarum propensior conveniet perferens sed conperto id praefecto propensior custodiam adlocutus ille quidem perferens nec consulens quidem quaestor palatinarum obiurgatorio indigna vita vocis quod commune nec post perferens quaestor super propensior securius docens consulens vocis scholarum iniusta vita palatinarum deiectas sed fieri.\r\n	', 'sainte-maure-de-touraine.jpg', 2, 2, 8, 5, 8, 21, 25, 20, 2, 3.5, 3.8, 0, 'obiurgatorio indigna vita vocis quod commune nec post perferens quaestor super propensior securius docens consulens vocis scholarum iniusta vita palatinarum 	'),
(27, 'Selles-Sur-Cher', 'Adimenda conveniet Montius praefecti mandaverat custodiam scholarum docens scholarum propensior conveniet perferens sed conperto id praefecto propensior custodiam adlocutus ille quidem perferens nec consulens quidem quaestor palatinarum obiurgatorio indigna vita vocis quod commune nec post perferens quaestor super propensior securius docens consulens vocis scholarum iniusta vita palatinarum deiectas sed fieri.\r\n	', 'selles-sur-cher.jpg', 2, 2, 8, 5, 9, 26, 27, 20, 1, 3.5, 3.8, 0, 'obiurgatorio indigna vita vocis quod commune nec post perferens quaestor super propensior securius docens consulens vocis scholarum iniusta vita palatinarum deiectas sed fieri.\r\n	'),
(28, 'Valençay', 'Adimenda conveniet Montius praefecti mandaverat custodiam scholarum docens scholarum propensior conveniet perferens sed conperto id praefecto propensior custodiam adlocutus ille quidem perferens nec consulens quidem quaestor palatinarum obiurgatorio indigna vita vocis quod commune nec post perferens quaestor super propensior securius docens consulens vocis scholarum iniusta vita palatinarum deiectas sed fieri.\r\n	', 'valencay.jpg', 2, 2, 6, 5, 9, 28, 29, 20, 2, 3.5, 3.8, 0, 'obiurgatorio indigna vita vocis quod commune nec post perferens quaestor super propensior securius docens consulens vocis scholarum iniusta vita palatinarum deiectas sed fieri.\r\n	'),
(29, 'Trèfle', 'Adimenda conveniet Montius praefecti mandaverat custodiam scholarum docens scholarum propensior conveniet perferens sed conperto id praefecto propensior custodiam adlocutus ille quidem perferens nec consulens quidem quaestor palatinarum obiurgatorio indigna vita vocis quod commune nec post perferens quaestor super propensior securius docens consulens vocis scholarum iniusta vita palatinarum deiectas sed fieri.\r\n	', 'trèfle.jpg', 2, 2, 6, 5, 12, NULL, NULL, 20, 2, 3.5, 3.8, 0, 'obiurgatorio indigna vita vocis quod commune nec post perferens quaestor super propensior securius docens consulens vocis scholarum iniusta vita palatinaru'),
(31, 'Bastelicaccia', 'Adimenda conveniet Montius praefecti mandaverat custodiam scholarum docens scholarum propensior conveniet perferens sed conperto id praefecto propensior custodiam adlocutus ille quidem perferens nec consulens quidem quaestor palatinarum obiurgatorio indigna vita vocis quod commune nec post perferens quaestor super propensior securius docens consulens vocis scholarum iniusta vita palatinarum deiectas sed fieri.\r\n	', 'bastelicaccia.jpg', 3, 2, 8, 5, 7, NULL, NULL, 20, 2, 3.5, 3.8, 0, 'obiurgatorio indigna vita vocis quod commune nec post perferens quaestor super propensior securius docens consulens vocis scholarum iniusta vita palatinarum deiectas sed fieri.\r\n	'),
(32, 'Chabichou-du-poitou', 'Adimenda conveniet Montius praefecti mandaverat custodiam scholarum docens scholarum propensior conveniet perferens sed conperto id praefecto propensior custodiam adlocutus ille quidem perferens nec consulens quidem quaestor palatinarum obiurgatorio indigna vita vocis quod commune nec post perferens quaestor super propensior securius docens consulens vocis scholarum iniusta vita palatinarum deiectas sed fieri.\r\n	', 'chabichou-du-poitou.jpg', 2, 2, 6, 5, 8, 30, 31, 20, 3, 3.5, 3.8, 0, 'obiurgatorio indigna vita vocis quod commune nec post perferens quaestor super propensior securius docens consulens vocis scholarum iniusta vita \r\n	'),
(33, 'Feuille-du-Limousin', 'Adimenda conveniet Montius praefecti mandaverat custodiam scholarum docens scholarum propensior conveniet perferens sed conperto id praefecto propensior custodiam adlocutus ille quidem perferens nec consulens quidem quaestor palatinarum obiurgatorio indigna vita vocis quod commune nec post perferens quaestor super propensior securius docens consulens vocis scholarum iniusta vita palatinarum deiectas sed fieri.\r\n	', 'feuille-du-limousin.jpg', 2, 2, 6, 5, 8, NULL, NULL, 20, 1, 3.5, 3.8, 0, 'obiurgatorio indigna vita vocis quod commune nec post perferens quaestor super propensior securius docens consulens vocis scholarum iniusta vita palatinarum deiectas sed fieri.\r\n	'),
(34, 'Rocamadour', 'Adimenda conveniet Montius praefecti mandaverat custodiam scholarum docens scholarum propensior conveniet perferens sed conperto id praefecto propensior custodiam adlocutus ille quidem perferens nec consulens quidem quaestor palatinarum obiurgatorio indigna vita vocis quod commune nec post perferens quaestor super propensior securius docens consulens vocis scholarum iniusta vita palatinarum deiectas sed fieri.\r\n	', 'rocamadour.jpg', 2, 2, 8, 5, 8, 32, 33, 20, 2, 3.5, 3.8, 0, 'obiurgatorio indigna vita vocis quod commune nec post perferens quaestor super propensior securius docens consulens vocis scholarum iniusta vita palatinarum deiectas sed fieri.\r\n	'),
(35, 'Rocamadour', 'Adimenda conveniet Montius praefecti mandaverat custodiam scholarum docens scholarum propensior conveniet perferens sed conperto id praefecto propensior custodiam adlocutus ille quidem perferens nec consulens quidem quaestor palatinarum obiurgatorio indigna vita vocis quod commune nec post perferens quaestor super propensior securius docens consulens vocis scholarum iniusta vita palatinarum deiectas sed fieri.\r\n	', 'rocamadour.jpg', 2, 2, 8, 5, 7, 32, 33, 20, 1, 3.5, 3.8, 0, 'obiurgatorio indigna vita vocis quod commune nec post perferens quaestor super propensior securius docens consulens vocis scholarum iniusta vita palatinarueri.\r\n	'),
(36, 'Gour-noir', 'Adimenda conveniet Montius praefecti mandaverat custodiam scholarum docens scholarum propensior conveniet perferens sed conperto id praefecto propensior custodiam adlocutus ille quidem perferens nec consulens quidem quaestor palatinarum obiurgatorio indigna vita vocis quod commune nec post perferens quaestor super propensior securius docens consulens vocis scholarum iniusta vita palatinarum deiectas sed fieri.\r\n	', 'gour-noir.jpg', 2, 2, 8, 5, 8, NULL, NULL, 20, 1, 3.5, 3.8, 0, 'obiurgatorio indigna vita vocis quod commune nec post perferens quaestor super propensior securius docens consulens vocis scholarum iniusta vita palatinarum deiectas sed fieri.\r\n	'),
(37, 'Mothais-sur-Feuille', 'Adimenda conveniet Montius praefecti mandaverat custodiam scholarum docens scholarum propensior conveniet perferens sed conperto id praefecto propensior custodiam adlocutus ille quidem perferens nec consulens quidem quaestor palatinarum obiurgatorio indigna vita vocis quod commune nec post perferens quaestor super propensior securius docens consulens vocis scholarum iniusta vita palatinarum deiectas sed fieri.\r\n	', 'Mothais-sur-feuille.jpg', 2, 2, 8, 5, 8, NULL, NULL, 20, 2, 3.5, 3.8, 0, 'obiurgatorio indigna vita vocis quod commune nec post perferens quaestor super propensior securius docens consulens vocis scholarum iniusta vita palatinarum deiectas sed fieri.\r\n	'),
(38, 'Pélardon', 'Adimenda conveniet Montius praefecti mandaverat custodiam scholarum docens scholarum propensior conveniet perferens sed conperto id praefecto propensior custodiam adlocutus ille quidem perferens nec consulens quidem quaestor palatinarum obiurgatorio indigna vita vocis quod commune nec post perferens quaestor super propensior securius docens consulens vocis scholarum iniusta vita palatinarum deiectas sed fieri.\r\n	', 'pélardon.jpg', 2, 2, 8, 5, 7, 34, 35, 19, 1, 3.5, 3.8, 0, 'obiurgatorio indigna vita vocis quod commune nec post perferens quaestor super propensior securius docens consulens vocis scholarum iniusta vita palatinarum deiectas sed fieri.\r\n	'),
(39, 'Banon', 'Adimenda conveniet Montius praefecti mandaverat custodiam scholarum docens scholarum propensior conveniet perferens sed conperto id praefecto propensior custodiam adlocutus ille quidem perferens nec consulens quidem quaestor palatinarum obiurgatorio indigna vita vocis quod commune nec post perferens quaestor super propensior securius docens consulens vocis scholarum iniusta vita palatinarum deiectas sed fieri.\r\n	', 'banon.jpg', 2, 2, 8, 5, 4, 36, 85, 50, 1, 3.5, 3.8, 0, 'obiurgatorio indigna vita vocis quod commune nec post perferens quaestor super propensior securius docens consulens vocis scholarum iniusta vita palatinarum deiectas sed fieri.\r\n	'),
(40, 'Banon', 'Adimenda conveniet Montius praefecti mandaverat custodiam scholarum docens scholarum propensior conveniet perferens sed conperto id praefecto propensior custodiam adlocutus ille quidem perferens nec consulens quidem quaestor palatinarum obiurgatorio indigna vita vocis quod commune nec post perferens quaestor super propensior securius docens consulens vocis scholarum iniusta vita palatinarum deiectas sed fieri.\r\n	', 'banon.jpg', 2, 2, 8, 5, 6, 36, 85, 20, 2, 3.5, 3.8, 0, 'obiurgatorio indigna vita vocis quod commune nec post perferens quaestor super propensior securius docens consulens vocis scholarum iniusta vita palatinarum deiectas sed fieri.\r\n	'),
(41, 'Picodon', 'Adimenda conveniet Montius praefecti mandaverat custodiam scholarum docens scholarum propensior conveniet perferens sed conperto id praefecto propensior custodiam adlocutus ille quidem perferens nec consulens quidem quaestor palatinarum obiurgatorio indigna vita vocis quod commune nec post perferens quaestor super propensior securius docens consulens vocis scholarum iniusta vita palatinarum deiectas sed fieri.\r\n	', 'picodon.jpg', 2, 2, 8, 5, 6, 38, 39, 20, 1, 3.5, 3.8, 0, 'obiurgatorio indigna vita vocis quod commune nec post perferens quaestor super propensior securius docens consulens vocis scholarum iniusta vita palatineri.\r\n	'),
(43, 'Beaufort', 'Adimenda conveniet Montius praefecti mandaverat custodiam scholarum docens scholarum propensior conveniet perferens sed conperto id praefecto propensior custodiam adlocutus ille quidem perferens nec consulens quidem quaestor palatinarum obiurgatorio indigna vita vocis quod commune nec post perferens quaestor super propensior securius docens consulens vocis scholarum iniusta vita palatinarum deiectas sed fieri.\r\n	', 'beaufort.jpg', 1, 3, 4, 3, 4, 16, 42, 46, 1, 3.5, 3.8, 0, 'obiurgatorio indigna vita vocis quod commune nec post perferens quaestor super propensior securius docens consulens vocis scholarum iniusta vita palatinarum deiectas sed fieri.\r\n	'),
(44, 'Compté', 'Adimenda conveniet Montius praefecti mandaverat custodiam scholarum docens scholarum propensior conveniet perferens sed conperto id praefecto propensior custodiam adlocutus consulens quidem quaestor palatinarum obiurgatorio indigna vita vocis quod commune nec post perferens quaestor super propensior securius docens consulens vocis scholarum iniusta vita palatinarum deiectas sed fieri.\r\n	', 'compté.jpg', 1, 3, 4, 3, 3, 43, 44, 49, 2, 3.5, 3.8, 0, 'obiurgatorio indigna vita vocis quod commune nec post perferens quaestor super propensior securius docens consulens vocis scholarum iniusta vita palatinarum deiectas sed fieri.\r\n	'),
(45, 'Emmental-de-Savoie', 'Adimenda conveniet Montius praefecti mandaverat custodiam scholarum docens scholarum propensior conveniet perferens sed conperto id praefecto propensior custodiam adlocutus ille quidem perferens nec consulens quidem quaestor palatinarum obiurgatorio indigna vita vocis quod commune nec post perferens quaestor super propensior securius docens consulens vocis scholarum iniusta vita palatinarum deiectas sed fieri.\r\n	', 'emmental-de-savoie.jpg', 1, 3, 4, 3, 4, 3, 45, 50, 1, 3.5, 3.8, 0, 'obiurgatorio indigna vita vocis quod commune nec post perferens quaestor super propensior securius docens consulens vocis scholarum iniusta vita palatinarum deiectas sed fieri.\r\n	'),
(46, 'Emmental-Grand-Cru-est-central', 'Adimenda conveniet Montius praefecti mandaverat custodiam scholarum docens scholarum propensior conveniet perferens sed conperto id praefecto propensior custodiam adlocutus ille quidem perferens nec consulens quidem quaestor palatinarum obiurgatorio indigna vita vocis quod commune nec post perferens quaestor super propensior securius docens consulens vocis scholarum iniusta vita palatinarum deiectas sed fieri.\r\n	', 'Emmental-Grand-cru-est-central.jpg', 1, 3, 4, 3, 3, 44, 45, 17, 2, 3.5, 3.8, 0, 'obiurgatorio indigna vita vocis quod commune nec post perferens quaestor super propensior securius docens consulens vocis scholarum iniusta vita palatinarum deiectas sed fieri.\r\n	'),
(48, 'Emmental-Grand-Cru-est-central', 'Adimenda conveniet Montius praefecti mandaverat custodiam scholarum docens scholarum propensior conveniet perferens sed conperto id praefecto propensior custodiam adlocutus ille quidem perferens nec consulens quidem quaestor palatinarum obiurgatorio indigna vita vocis quod commune nec post perferens quaestor super propensior securius docens consulens vocis scholarum iniusta vita palatinarum deiectas sed fieri.\r\n	', 'Emmental-Grand-cru-est-central.jpg', 1, 3, 4, 3, 4, 44, 45, 20, 1, 3.5, 3.8, 0, 'obiurgatorio indigna vita vocis quod commune nec post perferens quaestor super propensior securius docens consulens vocis scholarum iniusta vita palatinarum deiectas sed fieri.\r\n	'),
(49, 'Gryère-Francais', 'Adimenda conveniet Montius praefecti mandaverat custodiam scholarum docens scholarum propensior conveniet perferens sed conperto id praefecto propensior custodiam adlocutus ille quidem perferens nec consulens quidem quaestor palatinarum obiurgatorio indigna vita vocis quod commune nec post perferens quaestor super propensior securius docens consulens vocis scholarum iniusta vita palatinarum deiectas sed fieri.\r\n	', 'gruyère-Francais.jpg', 1, 3, 4, 3, 4, 46, 45, 19, 1, 3.5, 3.8, 0, 'obiurgatorio indigna vita vocis quod commune nec post perferens quaestor super propensior securius docens consulens vocis scholarum iniusta vita palatinarum deiectas sed fieri.\r\n	'),
(50, 'Gryère-Francais', 'Adimenda conveniet Montius praefecti mandaverat custodiam scholarum docens scholarum propensior conveniet perferens sed conperto id praefecto propensior custodiam adlocutus ille quidem perferens nec consulens quidem quaestor palatinarum obiurgatorio indigna vita vocis quod commune nec post perferens quaestor super propensior securius docens consulens vocis scholarum iniusta vita palatinarum deiectas sed fieri.\r\n	', 'gruyère-Francais.jpg', 1, 3, 4, 3, 3, 46, 45, 20, 1, 3.5, 3.8, 0, 'obiurgatorio indigna vita vocis quod commune nec post perferens quaestor super propensior securius docens consulens vocis scholarum iniusta vita palatinarum'),
(51, 'Cantal', 'Adimenda conveniet Montius praefecti mandaverat custodiam scholarum docens scholarum propensior conveniet perferens sed conperto id praefecto propensior custodiam adlocutus ille quidem perferens nec consulens quidem quaestor palatinarum obiurgatorio indigna vita vocis quod commune nec post perferens quaestor super propensior securius docens consulens vocis scholarum iniusta vita palatinarum deiectas sed fieri.\r\n	', 'Cantal.jpg', 1, 4, 4, 3, 7, 8, 9, 19, 2, 3.5, 3.8, 0, 'obiurgatorio indigna vita vocis quod commune nec post perferens quaestor super propensior securius docens consulens vocis scholarum iniusta vita palatinarum deiectas sed fieri.\r\n	'),
(53, 'Cantal', 'Adimenda conveniet Montius praefecti mandaverat custodiam scholarum docens scholarum propensior conveniet perferens sed conperto id praefecto propensior custodiam adlocutus ille quidem perferens nec consulens quidem quaestor palatinarum obiurgatorio indigna vita vocis quod commune nec post perferens quaestor super propensior securius docens consulens vocis scholarum iniusta vita palatinarum deiectas sed fieri.\r\n	', 'Cantal.jpg', 1, 4, 4, 3, 8, 8, 9, 20, 2, 3.5, 3.8, 0, 'obiurgatorio indigna vita vocis quod commune nec post perferens quaestor super propensior securius docens consulens vocis scholarum iniusta vita palatinarum '),
(54, 'Fromage-aux-artisous', 'Adimenda conveniet Montius praefecti mandaverat custodiam scholarum docens scholarum propensior conveniet perferens sed conperto id praefecto propensior custodiam adlocutus ille quidem perferens nec consulens quidem quaestor palatinarum obiurgatorio indigna vita vocis quod commune nec post perferens quaestor super propensior securius docens consulens vocis scholarum iniusta vita palatinarum deiectas sed fieri.\r\n	', 'fromage-aux-artisous.jpg', 1, 4, 4, 3, 4, NULL, NULL, 20, 1, 3.5, 3.8, 0, 'obiurgatorio indigna vita vocis quod commune nec post perferens quaestor super propensior securius docens consulens vocis scholarum iniusta vita palatinarum deiectas sed fieri.\r\n	'),
(55, 'Morbier', 'Adimenda conveniet Montius praefecti mandaverat custodiam scholarum docens scholarum propensior conveniet perferens sed conperto id praefecto propensior custodiam adlocutus ille quidem perferens nec consulens quidem quaestor palatinarum obiurgatorio indigna vita vocis quod commune nec post perferens quaestor super propensior securius docens consulens vocis scholarum iniusta vita palatinarum deiectas sed fieri.\r\n	', 'Morbier.jpg', 1, 4, 4, 3, 3, 46, 47, 20, 2, 3.5, 3.8, 0, 'obiurgatorio indigna vita vocis quod commune nec post perferens quaestor super propensior securius docens consulens vocis scholarum iniusta vita palatinarum deiectas sed fieri.\r\n	'),
(56, 'Morbier', 'Adimenda conveniet Montius praefecti mandaverat custodiam scholarum docens scholarum propensior conveniet perferens sed conperto id praefecto propensior custodiam adlocutus ille quidem perferens nec consulens quidem quaestor palatinarum obiurgatorio indigna vita vocis quod commune nec post perferens quaestor super propensior securius docens consulens vocis scholarum iniusta vita palatinarum deiectas sed fieri.\r\n	', 'Morbier.jpg', 1, 4, 4, 3, 4, 46, 47, 18, 3, 3.5, 3.8, 0, 'obiurgatorio indigna vita vocis quod commune nec post perferens quaestor super propensior securius docens consulens vocis scholarum iniusta vita  fieri.\r\n	'),
(57, 'Raclette', 'Adimenda conveniet Montius praefecti mandaverat custodiam scholarum docens scholarum propensior conveniet perferens sed conperto id praefecto propensior custodiam adlocutus ille quidem perferens nec consulens quidem quaestor palatinarum obiurgatorio indigna vita vocis quod commune nec post perferens quaestor super propensior securius docens consulens vocis scholarum iniusta vita palatinarum deiectas sed fieri.\r\n	', 'raclette.jpg', 1, 4, 4, 3, 4, NULL, NULL, 19, 1, 3.5, 3.8, 0, 'obiurgatorio indigna vita vocis quod commune nec post perferens quaestor super propensior securius docens consulens vocis scholarum iniusta vita palatinarum deiectas sed fieri.\r\n	'),
(58, 'reblochon-de-savoie', 'Adimenda conveniet Montius praefecti mandaverat custodiam scholarum docens scholarum propensior conveniet perferens sed conperto id praefecto propensior custodiam adlocutus ille quidem perferens nec consulens quidem quaestor palatinarum obiurgatorio indigna vita vocis quod commune nec post perferens quaestor super propensior securius docens consulens vocis scholarum iniusta vita palatinarum deiectas sed fieri.\r\n	', 'reblochon-de-savoie.jpg', 1, 4, 4, 3, 4, 48, 10, 20, 4, 3.5, 3.8, 0, 'obiurgatorio indigna vita vocis quod commune nec post perferens quaestor super propensior securius docens consulens vocis scholarum iniusta vita palatinarum deiectas sed fieri.\r\n	'),
(60, 'Salers', 'Adimenda conveniet Montius praefecti mandaverat custodiam scholarum docens scholarum propensior conveniet perferens sed conperto id praefecto propensior custodiam adlocutus ille quidem perferens nec consulens quidem quaestor palatinarum obiurgatorio indigna vita vocis quod commune nec post perferens quaestor super propensior securius docens consulens vocis scholarum iniusta vita palatinarum deiectas sed fieri.\r\n	', 'salers.jpg', 1, 4, 8, 5, 7, 7, 6, 20, 3, 3.5, 3.8, 0, 'obiurgatorio indigna vita vocis quod commune nec post perferens quaestor super propensior securius docens consulens vocis scholarum iniusta vita palatinarum deiectas sed fieri.\r\n	'),
(61, 'Salers', 'Adimenda conveniet Montius praefecti mandaverat custodiam scholarum docens scholarum propensior conveniet perferens sed conperto id praefecto propensior custodiam adlocutus ille quidem perferens nec consulens quidem quaestor palatinarum obiurgatorio indigna vita vocis quod commune nec post perferens quaestor super propensior securius docens consulens vocis scholarum iniusta vita palatinarum deiectas sed fieri.\r\n	', 'salers.jpg', 1, 4, 8, 5, 4, 7, 6, 20, 1, 3.5, 3.8, 0, 'obiurgatorio indigna vita vocis quod commune nec post perferens quaestor super propensior securius docens consulens vocis scholarum iniusta vita palatinarum deiectas sed fieri.\r\n	'),
(62, 'Salers-d\'Auvergne-Rhone-Alpe', 'Adimenda conveniet Montius praefecti mandaverat custodiam scholarum docens scholarum propensior conveniet perferens sed conperto id praefecto propensior custodiam adlocutus ille quidem perferens nec consulens quidem quaestor palatinarum obiurgatorio indigna vita vocis quod commune nec post perferens quaestor super propensior securius docens consulens vocis scholarum iniusta vita palatinarum deiectas sed fieri.\r\n	', 'salers.jpg', 1, 4, 8, 5, 4, 7, 6, 20, 2, 3.5, 3.8, 0, 'obiurgatorio indigna vita vocis quod commune nec post perferens quaestor super propensior securius docens consulens vocis scholarum iniusta vita palatinarumn	'),
(63, 'Tome-des-Beauges', 'Adimenda conveniet Montius praefecti mandaverat custodiam scholarum docens scholarum propensior conveniet perferens sed conperto id praefecto propensior custodiam adlocutus ille quidem perferens nec consulens quidem quaestor palatinarum obiurgatorio indigna vita vocis quod commune nec post perferens quaestor super propensior securius docens consulens vocis scholarum iniusta vita palatinarum deiectas sed fieri.\r\n	', 'tome-des-bauges.jpg', 1, 4, 4, 5, 4, 3, 5, 20, 3, 3.5, 3.8, 0, 'obiurgatorio indigna vita vocis quod commune nec post perferens quaestor super propensior securius docens consulens vocis scholarum iniusta vita palatinarum deiectas sed fieri.\r\n	'),
(64, 'Tome-de-Savoie', 'Adimenda conveniet Montius praefecti mandaverat custodiam scholarum docens scholarum propensior conveniet perferens sed conperto id praefecto propensior custodiam adlocutus ille quidem perferens nec consulens quidem quaestor palatinarum obiurgatorio indigna vita vocis quod commune nec post perferens quaestor super propensior securius docens consulens vocis scholarum iniusta vita palatinarum deiectas sed fieri.\r\n	', 'tome-de-savoie.jpg', 1, 4, 4, 5, 4, 4, 3, 20, 1, 3.5, 3.8, 0, 'obiurgatorio indigna vita vocis quod commune nec post perferens quaestor super propensior securius docens consulens vocis scholarum iniusta vita palatinarum deiectas sed fieri.\r\n	'),
(65, 'Tome-des-grands-Causses', 'Adimenda conveniet Montius praefecti mandaverat custodiam scholarum docens scholarum propensior conveniet perferens sed conperto id praefecto propensior custodiam adlocutus ille quidem perferens nec consulens quidem quaestor palatinarum obiurgatorio indigna vita vocis quod commune nec post perferens quaestor super propensior securius docens consulens vocis scholarum iniusta vita palatinarum deiectas sed fieri.\r\n	', 'tome-des-grands-causses.jpg', 3, 4, 4, 5, 7, NULL, NULL, 20, 2, 3.5, 3.8, 0, 'obiurgatorio indigna vita vocis quod commune nec post perferens quaestor super propensior securius docens consulens vocis scholarum iniusta vita palatinarum	'),
(66, 'Phébus', 'Adimenda conveniet Montius praefecti mandaverat custodiam scholarum docens scholarum propensior conveniet perferens sed conperto id praefecto propensior custodiam adlocutus ille quidem perferens nec consulens quidem quaestor palatinarum obiurgatorio indigna vita vocis quod commune nec post perferens quaestor super propensior securius docens consulens vocis scholarum iniusta vita palatinarum deiectas sed fieri.\r\n	', 'phébus.jpg', 1, 4, 4, 5, 3, NULL, NULL, 20, 1, 3.5, 3.8, 0, 'obiurgatorio indigna vita vocis quod commune nec post perferens quaestor super propensior securius docens consulens vocis scholarum iniusta vita palatinarum deiectas sed fieri.\r\n	'),
(67, 'Bargkass', 'Adimenda conveniet Montius praefecti mandaverat custodiam scholarum docens scholarum propensior conveniet perferens sed conperto id praefecto propensior custodiam adlocutus ille quidem perferens nec consulens quidem quaestor palatinarum obiurgatorio indigna vita vocis quod commune nec post perferens quaestor super propensior securius docens consulens vocis scholarum iniusta vita palatinarum deiectas sed fieri.\r\n	', 'Bargkass.jpg', 1, 4, 4, 5, 2, NULL, NULL, 20, 2, 3.5, 3.8, 0, 'obiurgatorio indigna vita vocis quod commune nec post perferens quaestor super propensior securius docens consulens vocis scholarum iniusta vita palatinarum deiectas sed fieri.\r\n	'),
(68, 'Coeur-de-massif', 'Adimenda conveniet Montius praefecti mandaverat custodiam scholarum docens scholarum propensior conveniet perferens sed conperto id praefecto propensior custodiam adlocutus ille quidem perferens nec consulens quidem quaestor palatinarum obiurgatorio indigna vita vocis quod commune nec post perferens quaestor super propensior securius docens consulens vocis scholarum iniusta vita palatinarum deiectas sed fieri.\r\n	', 'coeur-de-massif.jpg', 1, 4, 1, 5, 2, NULL, NULL, 19, 1, 3.5, 3.8, 0, 'obiurgatorio indigna vita vocis quod commune nec post perferens quaestor super propensior securius docens consulens vocis scholarum iniusta vita palatinarum'),
(69, 'Bergues', 'Adimenda conveniet Montius praefecti mandaverat custodiam scholarum docens scholarum propensior conveniet perferens sed conperto id praefecto propensior custodiam adlocutus ille quidem perferens nec consulens quidem quaestor palatinarum obiurgatorio indigna vita vocis quod commune nec post perferens quaestor super propensior securius docens consulens vocis scholarum iniusta vita palatinarum deiectas sed fieri.\r\n	', 'bergues.jpg', 1, 4, 4, 5, 13, NULL, NULL, 20, 3, 3.5, 3.8, 0, 'obiurgatorio indigna vita vocis quod commune nec post perferens quaestor super propensior securius docens consulens vocis scholarum iniusta vita palatinarum deiectas sed fieri.\r\n	'),
(70, 'Mimolette', 'Adimenda conveniet Montius praefecti mandaverat custodiam scholarum docens scholarum propensior conveniet perferens sed conperto id praefecto propensior custodiam adlocutus ille quidem perferens nec consulens quidem quaestor palatinarum obiurgatorio indigna vita vocis quod commune nec post perferens quaestor super propensior securius docens consulens vocis scholarum iniusta vita palatinarum deiectas sed fieri.\r\n	', 'mimolette.jpg', 1, 4, 8, 5, 13, NULL, NULL, 20, 4, 3.5, 3.8, 0, 'obiurgatorio indigna vita vocis quod commune nec post perferens quaestor super propensior securius docens consulens vocis scholarum iniusta vita palatinarum deiectas sed fieri.\r\n	'),
(71, 'Ossau-Irraty-d\'Occitanie', 'Adimenda conveniet Montius praefecti mandaverat custodiam scholarum docens scholarum propensior conveniet perferens sed conperto id praefecto propensior custodiam adlocutus ille quidem perferens nec consulens quidem quaestor palatinarum obiurgatorio indigna vita vocis quod commune nec post perferens quaestor super propensior securius docens consulens vocis scholarum iniusta vita palatinarum deiectas sed fieri.\r\n	', 'ossau-iraty.jpg', 3, 4, 8, 5, 7, 1, 2, 20, 2, 3.5, 3.8, 0, 'obiurgatorio indigna vita vocis quod commune nec post perferens quaestor super propensior securius docens consulens vocis scholarum iniusta vita palatinarum deiec'),
(72, 'Ossau-Irraty-d\'Aquitaine', 'Adimenda conveniet Montius praefecti mandaverat custodiam scholarum docens scholarum propensior conveniet perferens sed conperto id praefecto propensior custodiam adlocutus ille quidem perferens nec consulens quidem quaestor palatinarum obiurgatorio indigna vita vocis quod commune nec post perferens quaestor super propensior securius docens consulens vocis scholarum iniusta vita palatinarum deiectas sed fieri.\r\n	', 'ossau-iraty.jpg', 3, 4, 8, 5, 8, 1, 2, 20, 1, 3.5, 3.8, 0, 'obiurgatorio indigna vita vocis quod commune nec post perferens quaestor super propensior securius docens consulens vocis scholarum iniusta vita palatinarum deiectas sed fieri.\r\n	'),
(73, 'Bethmale', 'Adimenda conveniet Montius praefecti mandaverat custodiam scholarum docens scholarum propensior conveniet perferens sed conperto id praefecto propensior custodiam adlocutus ille quidem perferens nec consulens quidem quaestor palatinarum obiurgatorio indigna vita vocis quod commune nec post perferens quaestor super propensior securius docens consulens vocis scholarum iniusta vita palatinarum deiectas sed fieri.\r\n	', 'bethmale.jpg', 1, 4, 4, 5, 7, NULL, NULL, 20, 2, 3.5, 3.8, 0, 'obiurgatorio indigna vita vocis quod commune nec post perferens quaestor super propensior securius docens consulens vocis scholarum iniusta vita palatinarum deiectas sed fieri.\r\n	'),
(74, 'Laguiole-d\'occitanie', 'Adimenda conveniet Montius praefecti mandaverat custodiam scholarum docens scholarum propensior conveniet perferens sed conperto id praefecto propensior custodiam adlocutus ille quidem perferens nec consulens quidem quaestor palatinarum obiurgatorio indigna vita vocis quod commune nec post perferens quaestor super propensior securius docens consulens vocis scholarum iniusta vita palatinarum deiectas sed fieri.\r\n	', 'laguiole.jpg', 1, 4, 8, 5, 7, 9, 53, 18, 3, 3.5, 3.8, 0, 'obiurgatorio indigna vita vocis quod commune nec post perferens quaestor super propensior securius docens consulens vocis scholarum iniusta vita palatinarum '),
(75, 'LaguioleD\'Auvergne-Rhône-Alpe', 'Adimenda conveniet Montius praefecti mandaverat custodiam scholarum docens scholarum propensior conveniet perferens sed conperto id praefecto propensior custodiam adlocutus ille quidem perferens nec consulens quidem quaestor palatinarum obiurgatorio indigna vita vocis quod commune nec post perferens quaestor super propensior securius docens consulens vocis scholarum iniusta vita palatinarum deiectas sed fieri.\r\n	', 'laguiole.jpg', 1, 4, 8, 5, 4, 9, 53, 20, 4, 3.5, 3.8, 0, 'obiurgatorio indigna vita vocis quod commune nec post perferens quaestor super propensior securius docens consulens vocis scholarum iniusta vita palatinarum deiectas sed fieri.\r\n	'),
(76, 'Tomme-Des-Pyrénée-d\'occitanie', 'Adimenda conveniet Montius praefecti mandaverat custodiam scholarum docens scholarum propensior conveniet perferens sed conperto id praefecto propensior custodiam adlocutus ille quidem perferens nec consulens quidem quaestor palatinarum obiurgatorio indigna vita vocis quod commune nec post perferens quaestor super propensior securius docens consulens vocis scholarum iniusta vita palatinarum deiectas sed fieri.\r\n	', 'tomme-des-pyrénées.jpg', 1, 4, 4, 5, 7, 8, 54, 20, 1, 3.5, 3.8, 0, 'obiurgatorio indigna vita vocis quod commune nec post perferens quaestor super propensior securius docens consulens vocis scholarum iniusta vita palatinarum deiectas sed fieri.\r\n	'),
(77, 'Tomme-Des-Pyrénée-d\'Aquitaine', 'Adimenda conveniet Montius praefecti mandaverat custodiam scholarum docens scholarum propensior conveniet perferens sed conperto id praefecto propensior custodiam adlocutus ille quidem perferens nec consulens quidem quaestor palatinarum obiurgatorio indigna vita vocis quod commune nec post perferens quaestor super propensior securius docens consulens vocis scholarum iniusta vita palatinarum deiectas sed fieri.\r\n	', 'tomme-des-pyrénées.jpg', 1, 4, 4, 5, 8, 8, 54, 20, 2, 3.5, 3.8, 0, 'obiurgatorio indigna vita vocis quod commune nec post perferens quaestor super propensior securius docens consulens vocis scholarum iniusta vita pal'),
(78, 'Brie-de-Meaux-d\'Ile-de-France', 'Adimenda conveniet Montius praefecti mandaverat custodiam scholarum docens scholarum propensior conveniet perferens sed conperto id praefecto propensior custodiam adlocutus ille quidem perferens nec consulens quidem quaestor palatinarum obiurgatorio indigna vita vocis quod commune nec post perferens quaestor super propensior securius docens consulens vocis scholarum iniusta vita palatinarum deiectas sed fieri.\r\n	', 'brie-de-meaux.jpg', 1, 5, 4, 2, 1, 18, 55, 14, 2, 3.5, 3.8, 0, 'obiurgatorio indigna vita vocis quod commune nec post perferens quaestor super propensior securius docens consulens vocis scholarum iniusta vita palatinarum deiectas sed fieri.\r\n	'),
(79, 'Brie-de-Meaux-du-centre-val-de-Loire', 'Adimenda conveniet Montius praefecti mandaverat custodiam scholarum docens scholarum propensior conveniet perferens sed conperto id praefecto propensior custodiam adlocutus ille quidem perferens nec consulens quidem quaestor palatinarum obiurgatorio indigna vita vocis quod commune nec post perferens quaestor super propensior securius docens consulens vocis scholarum iniusta vita palatinarum deiectas sed fieri.\r\n	', 'brie-de-meaux.jpg', 1, 5, 4, 2, 9, 18, 55, 20, 1, 3.5, 3.8, 0, 'obiurgatorio indigna vita vocis quod commune nec post perferens quaestor super propensior securius docens consulens vocis scholarum iniusta vita palatinarum deiectas sed fieri.\r\n	'),
(80, 'Brie-de-Meaux-du-Grand-est', 'Adimenda conveniet Montius praefecti mandaverat custodiam scholarum docens scholarum propensior conveniet perferens sed conperto id praefecto propensior custodiam adlocutus ille quidem perferens nec consulens quidem quaestor palatinarum obiurgatorio indigna vita vocis quod commune nec post perferens quaestor super propensior securius docens consulens vocis scholarum iniusta vita palatinarum deiectas sed fieri.\r\n	', 'brie-de-meaux.jpg', 1, 5, 4, 2, 2, 18, 55, 20, 4, 3.5, 3.8, 0, 'obiurgatorio indigna vita vocis quod commune nec post perferens quaestor super propensior securius docens consulens vocis scholarum iniusta vita palatinarum deiectas sed '),
(130, 'Bleu-de-séverac', 'Alii indulta imperio damnabantur tamquam timebatur aestimati laribus voluntatem voluntatem suis et per indulta sibi et per claudebantur voluntatem sibi et licentia quidam timebatur laribus et sibi damnabantur converso conlaticia imperio laribus necati pars alii lacrimas sibi necati querelas praeter cruentam damnabantur indulta quorum et multatione timebatur quoque clarae crudelitati.\r\n	', 'Bleu-de-severac.jpg', 3, 7, 4, 8, 7, NULL, NULL, 20, 3, 3.6, 3.8, 0, 'Alii indulta imperio damnabantur tamquam timebatur aestimati laribus voluntatem voluntatem suis et per indulta sibi et per claudebantur voluntatem sibi et licentia quidam timebatur laribus et sibi damnabantur converso conlaticia imperio l\r\n	'),
(131, 'Roquefort', 'Alii indulta imperio damnabantur tamquam timebatur aestimati laribus voluntatem voluntatem suis et per indulta sibi et per claudebantur voluntatem sibi et licentia quidam timebatur laribus et sibi damnabantur converso conlaticia imperio laribus necati pars alii lacrimas sibi necati querelas praeter cruentam damnabantur indulta quorum et multatione timebatur quoque clarae crudelitati.\r\n	', 'roquefort.jpg', 3, 7, 5, 8, 7, 84, 33, 20, 3, 3.5, 3.8, 0, 'damnabantur converso conlaticia imperio laribus necati pars alii lacrimas sibi necati querelas praeter cruentam damnabantur indulta quorum et multatione timebatur quoque clarae crudelitati.');
INSERT INTO `product` (`id`, `name`, `description`, `picture`, `id_milk`, `id_dough`, `id_shape`, `id_knife`, `id_region`, `id_wine1`, `id_wine2`, `quantityInStock`, `weight`, `buyPrice`, `salePrice`, `exclusivity`, `conseil_degustation`) VALUES
(132, 'Bleu-des-causses', 'Alii indulta imperio damnabantur tamquam timebatur aestimati laribus voluntatem voluntatem suis et per indulta sibi et per claudebantur voluntatem sibi et licentia quidam timebatur laribus et sibi damnabantur converso conlaticia imperio laribus necati pars alii lacrimas sibi necati querelas praeter cruentam damnabantur indulta quorum et multatione timebatur quoque clarae crudelitati.\r\n	', 'bleu-des-causses.jpg', 1, 7, 5, 8, 7, 78, 83, 20, 3, 3.5, 3.8, 0, 'Alii indulta imperio damnabantur tamquam timebatur aestimati laribus voluntatem voluntatem suis et per indulta sibi et per claudebantur voluntatem sibi et licentia quidam timebatur laribus et sibi damnabantu\r\n	'),
(133, 'Bleu-d\'Auvergne', 'Alii indulta imperio damnabantur tamquam timebatur aestimati laribus voluntatem voluntatem suis et per indulta sibi et per claudebantur voluntatem sibi et licentia quidam timebatur laribus et sibi damnabantur converso conlaticia imperio laribus necati pars alii lacrimas sibi necati querelas praeter cruentam damnabantur indulta quorum et multatione timebatur quoque clarae crudelitati.\r\n	', 'bleu-d\'auvergne.jpg', 1, 7, 4, 8, 4, 32, 78, 20, 4, 3.6, 4.2, 0, 'Alii indulta imperio damnabantur tamquam timebatur aestimati laribus voluntatem voluntatem suis et per indulta sibi et per claudebantur voluntatem sibi et licentia quidam timebatur laribus et sibi damnabantur converso conlaticia imperio '),
(139, 'Camenbert-de- Normandie', 'Alii indulta imperio damnabantur tamquam timebatur aestimati laribus voluntatem voluntatem suis et per indulta sibi et per claudebantur voluntatem sibi et licentia quidam timebatur laribus et sibi damnabantur converso conlaticia imperio laribus necati pars alii lacrimas sibi necati querelas praeter cruentam damnabantur indulta quorum et multatione timebatur quoque clarae crudelitati.\r\n	', 'camenbert-de-normandie.jpg', 1, 5, 8, 6, 12, 60, 59, 20, 1, 3.5, 3.8, 0, 'Alii indulta imperio damnabantur tamquam timebatur aestimati laribus voluntatem voluntatem suis et per indulta sibi et per claudebantur voluntatem sibi et licentia quidam timebatur laribus et sibi s sibi necati querelas praeter cruentam damnabantur indulta quorum et multatione timebatur quoque clarae crudelitati.\r\n	'),
(140, 'Abondance', 'Alii indulta imperio damnabantur tamquam timebatur aestimati laribus voluntatem voluntatem suis et per indulta sibi et per claudebantur voluntatem sibi et licentia quidam timebatur laribus et sibi damnabantur converso conlaticia imperio laribus necati pars alii lacrimas sibi necati querelas praeter cruentam damnabantur indulta quorum et multatione timebatur quoque clarae crudelitati.\r\n	', 'abondance.jpg', 3, 3, 4, 3, 4, 16, 3, 25, 1, 3.6, 3.8, 0, 'Alii indulta imperio damnabantur tamquam timebatur aestimati laribus voluntatem voluntatem suis et per indulta sibi et per claudebantur voluntatem sibi et licentia quidam timebatur laribus et sibi d\r\n	');

-- --------------------------------------------------------

--
-- Structure de la table `region`
--

CREATE TABLE `region` (
  `id` int(11) NOT NULL,
  `name` varchar(45) NOT NULL,
  `picture` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `region`
--

INSERT INTO `region` (`id`, `name`, `picture`) VALUES
(1, 'Île de France', 'ile-de-france.svg'),
(2, 'Grand-est', '1599587722grand-est.svg'),
(3, 'Bourgogne-France-Compté', 'bourgogne-france-comté.svg'),
(4, 'Auvergne-Rhône-Alpe', 'auvergne-rhone-alpes.svg'),
(5, 'Corse', 'corse.svg'),
(6, 'Provence-Alpe-Cotes-D’azur', 'provence-alpes-cotes-d\'azur.svg'),
(7, 'Occitanie', 'occitanie.svg'),
(8, 'Nouvelle Aquitaine', 'nouvelle-aquitaine.svg'),
(9, 'Centre-val-de-Loire', '1602570219centre-val-de-loire.svg'),
(10, 'Pays-de-la-Loire', 'pays-de-la-loire.svg'),
(11, 'Bretagne', 'bretagne.svg'),
(12, 'Normandie', 'normandie.svg'),
(13, 'Haut-de-France', 'haut-de-france.svg');

-- --------------------------------------------------------

--
-- Structure de la table `shape`
--

CREATE TABLE `shape` (
  `id` int(11) NOT NULL,
  `name` varchar(45) NOT NULL,
  `picture` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `shape`
--

INSERT INTO `shape` (`id`, `name`, `picture`) VALUES
(1, 'fromage-carrée', '1598965265fromage-carre.svg'),
(2, 'fromage-en-buche', 'fromage-en-buche.svg'),
(3, 'fromage-en-meule', 'fromage-en-meule.svg'),
(4, 'fromage-en-part', 'fromage-en-part.svg'),
(5, 'fromage-en-part', 'fromage-en-part.svg'),
(6, 'fromage-en-pyramide-cylindrique', 'fromage-en-pyramide-cylindrique.svg'),
(7, 'fromage-particulier', 'fromage-particulier.svg'),
(8, 'fromage-rond', 'fromage-rond.svg'),
(9, 'grand-fromage-en-part', 'grand-fromage-en-part.svg');

-- --------------------------------------------------------

--
-- Structure de la table `shipping`
--

CREATE TABLE `shipping` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `price` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `shipping`
--

INSERT INTO `shipping` (`id`, `name`, `price`) VALUES
(1, 'de 0 à 0.25 kg', 4.95),
(2, 'de 0.25 kg à 0.50 k g', 6.35),
(3, 'de 0.50 kg à 0.75 kg', 7.25),
(4, 'de 0,75 kg à 1kg', 7.95),
(5, 'de 1kg à 2kg', 8.95),
(6, 'de 2kg à 5kg', 13.75),
(8, 'de 5kg à 7kg', 14.99);

-- --------------------------------------------------------

--
-- Structure de la table `statut`
--

CREATE TABLE `statut` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `statut`
--

INSERT INTO `statut` (`id`, `name`) VALUES
(1, 'Commande validée'),
(2, 'En attente de paiement'),
(3, 'En cours de préparation'),
(4, 'Expédiée');

-- --------------------------------------------------------

--
-- Structure de la table `tray`
--

CREATE TABLE `tray` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `picture` varchar(255) DEFAULT NULL,
  `description` text NOT NULL,
  `product1` int(11) NOT NULL,
  `product2` int(11) NOT NULL,
  `product3` int(11) DEFAULT NULL,
  `product4` int(11) DEFAULT NULL,
  `product5` int(11) DEFAULT NULL,
  `quantityInStock` int(11) NOT NULL,
  `weight` int(11) NOT NULL,
  `salePrice` double NOT NULL,
  `buyPrice` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `tray`
--

INSERT INTO `tray` (`id`, `name`, `picture`, `description`, `product1`, `product2`, `product3`, `product4`, `product5`, `quantityInStock`, `weight`, `salePrice`, `buyPrice`) VALUES
(12, ' Plateau entre amis', 'plateau-entre-amis.jpg', 'Pourquoi cuisiner alors que de délicieux fromages et des légumes frais feront le bonheur de vos amies ? Pour émerveiller vos copines, nous avons réalisé  une sélection d’un top 4 des fromages de la Fromagerie Renelle : le comté , la Mimolette extra-vieille… des fromages qui se prêtent à une dégustation en fines tranches ou petits morceaux faciles et rapide à préparer. Et un fromage de Chèvre frais La Buchette de Banon une spécialité de la Provence, sa pâte délicate s’offre en savoureuse tartine avec un miel d’Acacia et des figues fraîches.', 44, 70, 40, 140, 1, 50, 8, 15.99, 10.99),
(13, 'Plateau Barbecue', '1599546963plateau-barbecue.jpg', 'À l’approche des beaux jours, les envies de grillades se font sentir, de quoi profiter du grand air tout en appréciant un moment de cuisine et de convivialité. Afin de satisfaire ces appétits, la Fromagerie Renelle,site de livraison à domicile de fromages haut de gamme, a élaboré une box spéciale, pour revisiter le barbecue à la française. Un florilège de délicieux fromages et des idées recettes originales 100% barbecue sont à découvrir pour de succulentes associations entre viandes grillées et fromages : Camembert, Tomme de Savoie, Comté, Roquefort, et Cœur de Massif, ont été soigneusement sélectionnés par le Maître Affineur de la Maison.', 64, 44, 131, 68, 139, 50, 8, 20.99, 15.99),
(14, 'Plateau du Mois', 'plateau-mois.jpg', 'Quatre joyaux que nous avons sélectionnés pour votre plus grand plaisir : Le Brie de Meaux,  le Comté 36 mois,  le Roquefort et la Tomme d\\\'Abondance fermière. Tous ces fromages ont une histoire intimement liée à la vie de nos monarques.', 78, 44, 131, 140, NULL, 50, 9, 30.99, 19.99);

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `lastName` varchar(100) NOT NULL,
  `firstName` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `birthDay` date NOT NULL,
  `address` varchar(255) NOT NULL,
  `zipCode` char(5) NOT NULL,
  `city` varchar(30) NOT NULL,
  `phone` char(10) NOT NULL,
  `country` varchar(45) NOT NULL,
  `admin` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `user`
--

INSERT INTO `user` (`id`, `lastName`, `firstName`, `email`, `password`, `birthDay`, `address`, `zipCode`, `city`, `phone`, `country`, `admin`) VALUES
(57, 'Renelle     ', 'Estelle', 'fromagerieRenelle@gmail.com', '$2y$10$O.Kh4Z62puxhJRLFSDPwdO5Bb2/Fm3UCG7RygfyLRNrHPQBA7g7pC', '2020-08-01', ' dfghjklrtyuiop', '64300', ' Orthez', '0000000000', ' France', 1),
(60, 'Vilport', 'Cécile', 'cecilevilport@gmail.com', '$2y$10$Ox.SGvTTmnRxsOrfO5lha.ovRryh4M2/MQbAebKBLAjKWB2F6Sbk2', '1981-10-27', '13 rue Roger Salengro', '62750', 'Loos en Gohelle', '0662169620', 'France', 0),
(61, 'formateur', 'formateur', 'l@3wa.fr', '$2y$10$Utw0SPa1/jgL8mAcmczKg./MNCoTktKaxypfykVJgZvOWHxppYUiG', '1945-01-01', '10 rue de paris', '75000', 'Paris', '0700000000', 'France', 0),
(62, 'ruet', 'cindy', 'cin31@hotmail.fr', '$2y$10$X.n1oginKv91lsD/Qe38TOSwIdHglk76wsqgwp7b6B963C.P/UnLy', '1982-08-14', '604 route de sarraillot', '40230', 'Benesse-maremne', '0778426770', 'France', 0);

-- --------------------------------------------------------

--
-- Structure de la table `weights`
--

CREATE TABLE `weights` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `weights`
--

INSERT INTO `weights` (`id`, `name`) VALUES
(1, '125g'),
(2, '150g'),
(3, '200g'),
(4, '250g'),
(5, '275g'),
(6, '300g'),
(7, '500g'),
(8, '750g'),
(9, '1000g'),
(10, '1250g'),
(11, '1500g'),
(13, '1600g'),
(14, '1800g'),
(15, '2000g');

-- --------------------------------------------------------

--
-- Structure de la table `wine`
--

CREATE TABLE `wine` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `zoned` varchar(100) NOT NULL,
  `color` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `wine`
--

INSERT INTO `wine` (`id`, `name`, `zoned`, `color`) VALUES
(1, 'Irouleguy', 'SUD-OUEST', 'ROUGE'),
(2, 'Pacheren Du Vic-Bilh', 'SUD-OUEST', 'BLANC'),
(3, 'Chigrin-Bergeron', 'SAVOIE', 'BLANC'),
(4, 'Bugey', 'BUGEY', 'ROUGE'),
(5, 'Vin-De-Savoie Arbin', 'SAVOIE', 'ROUGE'),
(6, 'Mercurey', 'BOURGOGNE', 'ROUGE'),
(7, 'Touraine', 'VALEE DE LA LOIRE', 'ROUGE'),
(8, 'Côtes-D\'Auvergne', 'VALEE DE LA LOIRE', ''),
(9, 'Saint-Pourcain', 'VALEE DE LA LOIRE', 'ROUGE'),
(10, 'Crepy', 'SAVOIE', 'BLANC'),
(11, 'Patrimonio', 'CORSE', 'ROUGE'),
(12, 'Pouilly-Fuisse', 'BOURGOGNE', 'BLANC'),
(13, 'Chablis', 'BOURGOGNE', 'BLANC'),
(14, 'Côte-De-Beaune', 'BOURGOGNE', 'BLANC'),
(15, 'Seyselle', 'SAVOIE', 'BLANC'),
(16, 'Rousette-De-Savoie', 'SAVOIE', 'BLANC'),
(17, 'Macon-Villages', 'BOURGOGNE', 'BLANC'),
(18, 'Morgon', 'BEAUJOLAIS', 'ROUGE'),
(19, 'Saint-Joseph', 'VALEE DU RHONE', 'BLANC'),
(20, 'Côte-Rôtie', 'VALEE DU RHONE', 'ROUGE'),
(21, 'Sancerre', 'VALEE DE LA LOIRE', 'BLANC'),
(22, 'Pouilly-Sur-Loire', 'VALEE DE LA LOIRE', 'BLANC'),
(23, 'Reuilly', 'VALEE DE LA LOIRE', 'BLANC'),
(24, 'Menetou-Salon', 'VALEE DE LA LOIRE', 'BLANC'),
(25, 'Cour-Cheverny', 'VALEE DE LA LOIRE', 'BLANC'),
(26, 'Poully-Fume', 'VALEE DE LA LOIRE', 'BLANC'),
(27, 'Chinon', 'VALEE DE LA LOIRE', 'ROUGE'),
(28, 'VALENCAY', 'VALEE DE LA LOIRE', 'BLANC'),
(29, 'Valencay', 'VALEE DE LA LOIRE', 'ROUGE'),
(30, 'Cheverny', 'VALEE DE LA LOIRE', 'BLANC'),
(31, 'Haut-Poitou', 'VALEE DE LA LOIRE', 'BLANC'),
(32, 'Jurançon', 'SUD OUEST', 'BLANC'),
(33, 'Cahors', 'SUD OUEST', 'ROUGE'),
(34, 'Saint-Chinian', 'LANGUEDOC', 'ROUGE'),
(35, 'Languedoc', 'LANGUEDOC', 'BLANC'),
(36, 'Cassis', 'PROVENCE', 'ROUGE'),
(37, 'Candrieu', 'VALEE DU RHONE', 'BLANC'),
(38, 'Côte Du Liberon', 'VALEE DU RHONE', 'BLANC'),
(39, 'Côte-De-Provence', 'PROVENCE', 'BLANC'),
(42, 'Meursault', 'BOURGOGNE', 'BLANC'),
(43, 'L\'étoile', 'JURA', 'BLANC'),
(44, 'Château-Chalons', 'JURA', 'BLANC'),
(45, 'Apremont', 'SAVOIE', 'BLANC'),
(46, 'Arbois-Pupillin', 'JURA', 'BLANC'),
(47, 'Arbois', 'JURA', 'BLANC'),
(48, 'Chautagne', 'SAVOIE', 'ROUGE'),
(53, 'Marcillac', 'SUD OUEST', 'ROUGE'),
(54, 'Côte-Du-Frontonnais', 'SUD OUEST', 'ROUGE'),
(55, 'Saint-Nicolas-de-Bourgueil', 'VALEE DE LA LOIRE', 'ROUGE'),
(56, 'Côte-Chalonnaise-Givry', 'BOURGOGNE', 'ROUGE'),
(57, 'Crément de Bourgogne', 'BOURGOGNE', 'BLANC'),
(58, 'Chablis Grand Cru', 'BOURGOGNE', 'BLANC'),
(59, 'Moulin à vent', 'BEAUJOLAIS', 'ROUGE'),
(60, 'Cidre', 'PAYS D\'AUGE', 'ROSE'),
(61, 'Bourgogne-Aligote', 'BOURGOGNE', 'BLANC'),
(62, 'Côtes-Catalanes', 'LANGUEDOC', 'BLANC'),
(63, 'Côtes-du-Rhône', 'VALEE DU RHONE', 'ROUGE'),
(64, 'Rose-Des-Riceys', 'CHAMPGNE', 'ROUGE'),
(65, 'Lalande de Pomerol', 'BORDELAIS', 'ROUGE'),
(66, 'Biére Blonde ou Ambrée', 'HAUT DE FRANCE', 'ROSE'),
(67, 'Cidre de Calvados', 'PAYS D\'AUBE', 'ROSE'),
(68, 'Coteau-de-Saumur', 'VALEE DE LA LOIRE', 'BLANC'),
(69, 'Volnay', 'BOURGOGNE', 'ROUGE'),
(70, 'Côtes-de-Jura', 'JURA', 'BLANC'),
(71, 'Puligny-Montrachet', 'BOURGOGNE', 'BLANC'),
(72, 'Corton-Charlemagne', 'BOURGOGNE', 'BLANC'),
(73, 'Chassagne-Montrachet', 'BOURGOGNE', 'ROUGE'),
(74, 'Cote-de-Nuit', 'BOURGOGNE', 'ROUGE'),
(75, 'Alsace-Pinot-Gris', 'ALSACE', 'BLANC'),
(76, 'Alsace Gewurzttraminer', 'ALSACE', 'BLANC'),
(77, 'Vin de paille', 'JURA', 'BLANC'),
(78, 'Madiran', 'SUD-OUEST', 'ROUGE'),
(79, 'Clairette-de-Die', 'VALEE DU RHONE', 'BLANC'),
(80, 'Chatillon-en-Diois', 'VALEE DU RHONE', 'ROUGE'),
(81, 'Coteau-du-Layon', 'VALEE DE LA LOIRE', 'BLANC'),
(82, 'Quarts de Chaume', 'VALEE DE LA LOIRE', 'BLANC'),
(83, 'Bergerac', 'SUD OUEST', 'ROUGE'),
(84, 'Sauternes', 'BORDELAIS', 'BLANC'),
(85, 'Condrieu', 'VALLEE DU RHONE', 'BLANC');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `dough`
--
ALTER TABLE `dough`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `knife`
--
ALTER TABLE `knife`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `milk`
--
ALTER TABLE `milk`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `order`
--
ALTER TABLE `order`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `statut_id` (`statut_id`);

--
-- Index pour la table `orderlines`
--
ALTER TABLE `orderlines`
  ADD PRIMARY KEY (`id`),
  ADD KEY `Product_Id` (`product_id`),
  ADD KEY `Order_Id` (`order_id`);

--
-- Index pour la table `post`
--
ALTER TABLE `post`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_category` (`id_category`);

--
-- Index pour la table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`),
  ADD KEY `Id_ knife` (`id_knife`),
  ADD KEY `product_ibfk_3` (`id_region`),
  ADD KEY `product_ibfk_4` (`id_dough`),
  ADD KEY `product_ibfk_5` (`id_shape`),
  ADD KEY `product_ibfk_7` (`id_milk`),
  ADD KEY `Id_wine` (`id_wine1`),
  ADD KEY `product_ibfk_9` (`id_wine2`),
  ADD KEY `weight` (`weight`);

--
-- Index pour la table `region`
--
ALTER TABLE `region`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `shape`
--
ALTER TABLE `shape`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `shipping`
--
ALTER TABLE `shipping`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `statut`
--
ALTER TABLE `statut`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `tray`
--
ALTER TABLE `tray`
  ADD PRIMARY KEY (`id`),
  ADD KEY `Product1` (`product1`),
  ADD KEY `Product2` (`product2`),
  ADD KEY `Product3` (`product3`),
  ADD KEY `Product4` (`product4`),
  ADD KEY `Product5` (`product5`),
  ADD KEY `weight` (`weight`);

--
-- Index pour la table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `weights`
--
ALTER TABLE `weights`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `wine`
--
ALTER TABLE `wine`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `dough`
--
ALTER TABLE `dough`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT pour la table `knife`
--
ALTER TABLE `knife`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT pour la table `messages`
--
ALTER TABLE `messages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT pour la table `milk`
--
ALTER TABLE `milk`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT pour la table `order`
--
ALTER TABLE `order`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=388;

--
-- AUTO_INCREMENT pour la table `orderlines`
--
ALTER TABLE `orderlines`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=533;

--
-- AUTO_INCREMENT pour la table `post`
--
ALTER TABLE `post`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT pour la table `product`
--
ALTER TABLE `product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=144;

--
-- AUTO_INCREMENT pour la table `region`
--
ALTER TABLE `region`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT pour la table `shape`
--
ALTER TABLE `shape`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT pour la table `shipping`
--
ALTER TABLE `shipping`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT pour la table `statut`
--
ALTER TABLE `statut`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT pour la table `tray`
--
ALTER TABLE `tray`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT pour la table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=63;

--
-- AUTO_INCREMENT pour la table `weights`
--
ALTER TABLE `weights`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT pour la table `wine`
--
ALTER TABLE `wine`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=87;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `order`
--
ALTER TABLE `order`
  ADD CONSTRAINT `order_ibfk_2` FOREIGN KEY (`statut_id`) REFERENCES `statut` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Contraintes pour la table `orderlines`
--
ALTER TABLE `orderlines`
  ADD CONSTRAINT `orderlines_ibfk_2` FOREIGN KEY (`order_id`) REFERENCES `order` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `post`
--
ALTER TABLE `post`
  ADD CONSTRAINT `post_ibfk_1` FOREIGN KEY (`id_category`) REFERENCES `category` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Contraintes pour la table `product`
--
ALTER TABLE `product`
  ADD CONSTRAINT `product_ibfk_10` FOREIGN KEY (`weight`) REFERENCES `weights` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `product_ibfk_2` FOREIGN KEY (`id_knife`) REFERENCES `knife` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `product_ibfk_3` FOREIGN KEY (`id_region`) REFERENCES `region` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `product_ibfk_4` FOREIGN KEY (`id_dough`) REFERENCES `dough` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `product_ibfk_5` FOREIGN KEY (`id_shape`) REFERENCES `shape` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `product_ibfk_7` FOREIGN KEY (`id_milk`) REFERENCES `milk` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `product_ibfk_8` FOREIGN KEY (`id_wine1`) REFERENCES `wine` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `product_ibfk_9` FOREIGN KEY (`id_wine2`) REFERENCES `wine` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Contraintes pour la table `tray`
--
ALTER TABLE `tray`
  ADD CONSTRAINT `tray_ibfk_1` FOREIGN KEY (`product1`) REFERENCES `product` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `tray_ibfk_2` FOREIGN KEY (`product2`) REFERENCES `product` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `tray_ibfk_3` FOREIGN KEY (`product3`) REFERENCES `product` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `tray_ibfk_4` FOREIGN KEY (`product4`) REFERENCES `product` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `tray_ibfk_5` FOREIGN KEY (`product5`) REFERENCES `product` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `tray_ibfk_6` FOREIGN KEY (`weight`) REFERENCES `weights` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
