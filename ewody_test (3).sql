-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  ven. 03 juil. 2020 à 14:33
-- Version du serveur :  5.7.26
-- Version de PHP :  7.2.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `ewody_test`
--

-- --------------------------------------------------------

--
-- Structure de la table `avis`
--

DROP TABLE IF EXISTS `avis`;
CREATE TABLE IF NOT EXISTS `avis` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `produit_id` bigint(20) UNSIGNED NOT NULL,
  `commentaire` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `avis_user_id_foreign` (`user_id`),
  KEY `avis_produit_id_foreign` (`produit_id`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `avis`
--

INSERT INTO `avis` (`id`, `user_id`, `produit_id`, `commentaire`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 'Très interessant !', '2020-05-06 14:31:19', '2020-05-06 14:31:19'),
(2, 1, 5, 'Trés interessant', '2020-05-06 14:51:40', '2020-05-06 14:51:40'),
(3, 2, 1, 'J\'aime bien cette paire car c\'est de la qualité', '2020-05-06 15:24:00', '2020-05-06 15:24:00'),
(4, 2, 6, 'J\'aime bien', '2020-05-06 15:54:38', '2020-05-06 15:54:38'),
(5, 2, 6, 'Trop cool', '2020-05-07 17:13:38', '2020-05-07 17:13:38'),
(6, 2, 6, 'Intéressant', '2020-05-13 17:44:59', '2020-05-13 17:44:59'),
(7, 1, 3, 'Geniale', '2020-05-18 23:58:39', '2020-05-18 23:58:39');

-- --------------------------------------------------------

--
-- Structure de la table `caracteristiques`
--

DROP TABLE IF EXISTS `caracteristiques`;
CREATE TABLE IF NOT EXISTS `caracteristiques` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `designation` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `caracteristique_produit`
--

DROP TABLE IF EXISTS `caracteristique_produit`;
CREATE TABLE IF NOT EXISTS `caracteristique_produit` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `produit_id` bigint(20) UNSIGNED NOT NULL,
  `caracteristique_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `categories`
--

DROP TABLE IF EXISTS `categories`;
CREATE TABLE IF NOT EXISTS `categories` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `statut` int(11) NOT NULL,
  `industrie_id` bigint(20) UNSIGNED NOT NULL,
  `designation_categorie` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `categories_industrie_id_foreign` (`industrie_id`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `categories`
--

INSERT INTO `categories` (`id`, `statut`, `industrie_id`, `designation_categorie`, `image`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 'Chaussures', 'avatars_categories/5eb2bfe026e09.jpg', '2020-05-06 13:47:12', '2020-05-06 13:47:12'),
(2, 0, 1, 'produits phares', 'avatars_categories/5eb2c2f495f88.jpg', '2020-05-06 14:00:20', '2020-05-06 14:00:20'),
(3, 1, 2, 'Telephones', 'avatars_categories/5eb2c31f0f57d.jpg', '2020-05-06 14:01:03', '2020-05-06 14:01:03'),
(4, 1, 1, 'Sacs', 'avatars_categories/5eb2c381afc9e.jpeg', '2020-05-06 14:02:41', '2020-05-06 14:02:41'),
(5, 1, 1, 'Montre', 'avatars_categories/5eb2c3a156a86.PNG', '2020-05-06 14:03:13', '2020-05-06 14:03:13'),
(6, 1, 4, 'Panpesse', 'avatars_categories/5eb2c44877ceb.jpg', '2020-05-06 14:06:00', '2020-05-06 14:06:00'),
(7, 1, 3, 'Emballage', 'avatars_categories/5eb2c46b3d7f3.jpg', '2020-05-06 14:06:35', '2020-05-06 14:06:35');

-- --------------------------------------------------------

--
-- Structure de la table `categorie_produit`
--

DROP TABLE IF EXISTS `categorie_produit`;
CREATE TABLE IF NOT EXISTS `categorie_produit` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `produit_id` bigint(20) UNSIGNED NOT NULL,
  `categorie_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=34 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `categorie_produit`
--

INSERT INTO `categorie_produit` (`id`, `produit_id`, `categorie_id`, `created_at`, `updated_at`) VALUES
(1, 1, 1, NULL, NULL),
(2, 2, 3, NULL, NULL),
(3, 2, 2, NULL, NULL),
(4, 3, 4, NULL, NULL),
(29, 16, 1, NULL, NULL),
(6, 4, 5, NULL, NULL),
(7, 5, 4, NULL, NULL),
(8, 6, 4, NULL, NULL),
(9, 7, 4, NULL, NULL),
(10, 8, 5, NULL, NULL),
(26, 6, 2, NULL, NULL),
(12, 9, 5, NULL, NULL),
(15, 10, 5, NULL, NULL),
(14, 10, 2, NULL, NULL),
(16, 11, 1, NULL, NULL),
(17, 12, 7, NULL, NULL),
(18, 13, 7, NULL, NULL),
(19, 14, 7, NULL, NULL),
(25, 1, 2, NULL, NULL),
(21, 15, 6, NULL, NULL),
(22, 3, 2, NULL, NULL),
(23, 12, 2, NULL, NULL),
(30, 17, 1, NULL, NULL),
(31, 18, 1, NULL, NULL),
(32, 19, 1, NULL, NULL),
(33, 20, 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `clients`
--

DROP TABLE IF EXISTS `clients`;
CREATE TABLE IF NOT EXISTS `clients` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `nom` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `prenom` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `telephone` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `motdepass` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `adresse` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `login` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `photo` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `statut` int(11) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `commandes`
--

DROP TABLE IF EXISTS `commandes`;
CREATE TABLE IF NOT EXISTS `commandes` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `commande_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `produits` text COLLATE utf8mb4_unicode_ci,
  `produitsAchat` text COLLATE utf8mb4_unicode_ci,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `telephone` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ville` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `quartier` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lieuProche` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date_commande` date DEFAULT NULL,
  `montant` double NOT NULL,
  `date_echeance` date DEFAULT NULL,
  `statut` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date_livraison` date DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `commandes_user_id_foreign` (`user_id`)
) ENGINE=MyISAM AUTO_INCREMENT=35 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `commandes`
--

INSERT INTO `commandes` (`id`, `commande_id`, `user_id`, `produits`, `produitsAchat`, `name`, `telephone`, `email`, `ville`, `quartier`, `lieuProche`, `date_commande`, `montant`, `date_echeance`, `statut`, `date_livraison`, `created_at`, `updated_at`) VALUES
(1, 'ewody#574', 0, 'a:1:{s:9:\"produit_0\";a:5:{i:0;s:19:\"Chaussure airmaxe\r\n\";i:1;d:150000;i:2;s:1:\"1\";i:3;s:63:\"http://localhost:8000/uploads/avatars_couleur/5ed127e1aa8da.jpg\";i:4;s:2:\"43\";}}', NULL, 'Mahmoud Diallo', '621785645', 'moudmagongore@gmail.com', 'Conakry', 'Cosa', 'Camp carefour', NULL, 150000, NULL, 'En cours', NULL, '2020-06-09 15:13:28', '2020-06-09 15:13:28'),
(2, 'ewody#261', 0, NULL, 'a:1:{s:9:\"produit_0\";a:5:{i:0;s:19:\"Chaussure airmaxe\r\n\";i:1;d:150000;i:2;s:1:\"1\";i:3;s:63:\"http://localhost:8000/uploads/avatars_couleur/5ed127e1aa8da.jpg\";i:4;s:2:\"43\";}}', 'Mahmoud Diallo', '621785645', 'moudmagongore@gmail.com', 'Conakry', 'Cosa', 'Camp carefour', NULL, 150000, NULL, 'En cours', NULL, '2020-06-09 15:14:01', '2020-06-09 15:14:01'),
(3, 'ewody#822', 1, 'a:1:{s:9:\"produit_0\";a:5:{i:0;s:6:\"Jordan\";i:1;d:150000;i:2;s:1:\"1\";i:3;s:64:\"http://localhost:8000/uploads/avatars_couleur/5ed1284884863.jpeg\";i:4;s:2:\"42\";}}', NULL, 'Administrateur', '621785645', NULL, 'Conakry', 'Cosa', 'Camp carefour', NULL, 150000, NULL, 'En cours', NULL, '2020-06-09 15:15:39', '2020-06-09 15:15:39'),
(4, 'ewody#679', 1, NULL, 'a:1:{s:9:\"produit_0\";a:5:{i:0;s:6:\"Jordan\";i:1;d:150000;i:2;s:1:\"1\";i:3;s:64:\"http://localhost:8000/uploads/avatars_couleur/5ed128660ab11.jpeg\";i:4;s:2:\"44\";}}', 'Administrateur', '621785645', NULL, 'Conakry', 'Cosa', 'Camp carefour', NULL, 150000, NULL, 'En cours', NULL, '2020-06-09 15:16:13', '2020-06-09 15:16:13'),
(5, 'ewody#703', 9, 'a:1:{s:9:\"produit_0\";a:5:{i:0;s:20:\"Emballe de tout type\";i:1;d:100000;i:2;s:1:\"1\";i:3;s:64:\"http://localhost:8000/uploads/avatars_produits/5eb2d36098d27.jpg\";i:4;N;}}', NULL, 'Oumar Sow', '666054168', NULL, 'Conakry', 'Cosa', 'Camp carefour', NULL, 100000, NULL, 'Livré', NULL, '2020-06-09 15:22:50', '2020-06-10 15:15:08'),
(6, 'ewody#719', 1, 'a:2:{s:9:\"produit_0\";a:5:{i:0;s:5:\"Gucci\";i:1;d:130000;i:2;s:1:\"1\";i:3;s:64:\"http://localhost:8000/uploads/avatars_produits/5eb2cde7e9532.PNG\";i:4;N;}s:9:\"produit_1\";a:5:{i:0;s:19:\"Chaussure airmaxe\r\n\";i:1;d:150000;i:2;s:1:\"1\";i:3;s:63:\"http://localhost:8000/uploads/avatars_couleur/5ed127e1aa8da.jpg\";i:4;s:2:\"43\";}}', NULL, 'Mahmoud Diallo', '621785645', NULL, 'Conakry', 'Cosa', 'Camp carefour', NULL, 280000, NULL, 'En cours', NULL, '2020-06-09 16:15:53', '2020-06-09 16:15:53'),
(7, 'ewody#600', 0, 'a:1:{s:9:\"produit_0\";a:5:{i:0;s:19:\"Chaussure airmaxe\r\n\";i:1;d:150000;i:2;s:1:\"1\";i:3;s:63:\"http://localhost:8000/uploads/avatars_couleur/5ed1280b6ad7c.jpg\";i:4;s:2:\"42\";}}', NULL, 'Mahmoud Diallo', '621785645', 'moudmagongore@gmail.com', 'Conakry', 'Cosa', 'Camp carefour', NULL, 150000, NULL, 'En cours', NULL, '2020-06-10 13:16:45', '2020-06-10 13:16:45'),
(8, 'ewody#222', 0, 'a:1:{s:9:\"produit_0\";a:5:{i:0;s:19:\"Chaussure airmaxe\r\n\";i:1;d:150000;i:2;s:1:\"3\";i:3;s:63:\"http://localhost:8000/uploads/avatars_couleur/5ed1280b6ad7c.jpg\";i:4;s:2:\"42\";}}', NULL, 'Mahmoud Diallo', '621785645', 'moudmagongore@gmail.com', 'Conakry', 'Cosa', 'Camp carefour', NULL, 450000, NULL, 'En cours', NULL, '2020-06-10 15:07:57', '2020-06-10 15:07:57'),
(9, 'ewody#96', 0, 'a:1:{s:9:\"produit_0\";a:5:{i:0;s:19:\"Chaussure airmaxe\r\n\";i:1;d:150000;i:2;s:1:\"5\";i:3;s:63:\"http://localhost:8000/uploads/avatars_couleur/5ed1280b6ad7c.jpg\";i:4;s:2:\"42\";}}', NULL, 'Oumar Sow', '666054168', 'sow@gmail.com', 'Conakry', 'Cosa', 'Camp carefour', NULL, 750000, NULL, 'En cours', NULL, '2020-06-10 15:09:23', '2020-06-10 15:09:23'),
(10, 'ewody#297', 0, 'a:1:{s:9:\"produit_0\";a:5:{i:0;s:19:\"Chaussure airmaxe\r\n\";i:1;d:150000;i:2;s:1:\"1\";i:3;s:63:\"http://localhost:8000/uploads/avatars_couleur/5ed1280b6ad7c.jpg\";i:4;s:2:\"42\";}}', NULL, 'Mahmoud Diallo', '621785645', 'moudmagongore@gmail.com', 'Conakry', 'Cosa', 'Camp carefour', NULL, 150000, NULL, 'En cours', NULL, '2020-06-10 15:11:21', '2020-06-10 15:11:21'),
(11, 'ewody#145', 1, 'a:1:{s:9:\"produit_0\";a:5:{i:0;s:5:\"Gucci\";i:1;d:130000;i:2;s:1:\"1\";i:3;s:64:\"http://localhost:8000/uploads/avatars_produits/5eb2cde7e9532.PNG\";i:4;N;}}', NULL, 'Administrateur', '621785645', NULL, 'Conakry', 'Cosa', 'Camp carefour', NULL, 130000, NULL, 'En cours', NULL, '2020-06-10 15:19:33', '2020-06-10 15:19:33'),
(12, 'ewody#874', 1, 'a:1:{s:9:\"produit_0\";a:5:{i:0;s:19:\"Chaussure airmaxe\r\n\";i:1;d:150000;i:2;s:1:\"1\";i:3;s:63:\"http://localhost:8000/uploads/avatars_couleur/5ed1280b6ad7c.jpg\";i:4;s:2:\"42\";}}', NULL, 'Mahmoud Diallo', '621785645', NULL, 'Conakry', 'Cosa', 'Camp carefour', NULL, 150000, NULL, 'En cours', NULL, '2020-06-10 15:20:47', '2020-06-10 15:20:47'),
(13, 'ewody#39', 1, 'a:3:{s:9:\"produit_0\";a:5:{i:0;s:19:\"Chaussure airmaxe\r\n\";i:1;d:150000;i:2;s:1:\"2\";i:3;s:63:\"http://localhost:8000/uploads/avatars_couleur/5ed1280b6ad7c.jpg\";i:4;s:2:\"42\";}s:9:\"produit_1\";a:5:{i:0;s:6:\"Diesel\";i:1;d:120000;i:2;s:1:\"1\";i:3;s:64:\"http://localhost:8000/uploads/avatars_produits/5eb2ce20a433a.PNG\";i:4;N;}s:9:\"produit_2\";a:5:{i:0;s:5:\"Gucci\";i:1;d:130000;i:2;s:1:\"1\";i:3;s:64:\"http://localhost:8000/uploads/avatars_produits/5eb2cde7e9532.PNG\";i:4;N;}}', NULL, 'Mahmoud Diallo', '621785645', NULL, 'Conakry', 'Cosa', 'Camp carefour', NULL, 550000, NULL, 'En cours', NULL, '2020-06-10 15:24:05', '2020-06-10 15:24:05'),
(14, 'ewody#337', 1, 'a:1:{s:9:\"produit_0\";a:5:{i:0;s:19:\"Chaussure airmaxe\r\n\";i:1;d:150000;i:2;s:1:\"1\";i:3;s:63:\"http://localhost:8000/uploads/avatars_couleur/5ed1280b6ad7c.jpg\";i:4;s:2:\"42\";}}', NULL, 'Administrateur', '621785645', NULL, 'Conakry', 'Cosa', 'Camp carefour', NULL, 150000, NULL, 'Annulé', NULL, '2020-06-10 16:06:07', '2020-06-10 16:06:36'),
(15, 'ewody#335', 1, 'a:1:{s:9:\"produit_0\";a:5:{i:0;s:19:\"Chaussure airmaxe\r\n\";i:1;d:150000;i:2;s:2:\"50\";i:3;s:63:\"http://localhost:8000/uploads/avatars_couleur/5ed127e1aa8da.jpg\";i:4;s:2:\"43\";}}', NULL, 'Administrateur', '621785645', NULL, 'Conakry', 'Cosa', 'Camp carefour', NULL, 7500000, NULL, 'En cours', '2020-07-01', '2020-06-10 16:17:59', '2020-06-10 16:17:59'),
(16, 'ewody#121', 1, 'a:1:{s:9:\"produit_0\";a:5:{i:0;s:19:\"Chaussure airmaxe\r\n\";i:1;d:150000;i:2;s:2:\"50\";i:3;s:63:\"http://localhost:8000/uploads/avatars_couleur/5ed1280b6ad7c.jpg\";i:4;s:2:\"42\";}}', NULL, 'Administrateur', '621785645', NULL, 'Conakry', 'Cosa', 'Camp carefour', NULL, 7500000, NULL, 'En cours', NULL, '2020-06-10 16:20:52', '2020-06-10 16:20:52'),
(17, 'ewody#313', 1, 'a:1:{s:9:\"produit_0\";a:5:{i:0;s:19:\"Chaussure airmaxe\r\n\";i:1;d:150000;i:2;s:2:\"50\";i:3;s:63:\"http://localhost:8000/uploads/avatars_couleur/5ed127e1aa8da.jpg\";i:4;s:2:\"43\";}}', NULL, 'Administrateur', '621785645', NULL, 'Conakry', 'Cosa', 'Camp carefour', NULL, 7500000, NULL, 'En cours', NULL, '2020-06-10 16:23:40', '2020-06-10 16:23:40'),
(18, 'ewody#631', 1, 'a:1:{s:9:\"produit_0\";a:5:{i:0;s:19:\"Chaussure airmaxe\r\n\";i:1;d:150000;i:2;s:2:\"50\";i:3;s:63:\"http://localhost:8000/uploads/avatars_couleur/5ed1280b6ad7c.jpg\";i:4;s:2:\"42\";}}', NULL, 'Administrateur', '621785645', NULL, 'Conakry', 'Cosa', 'Camp carefour', NULL, 7500000, NULL, 'Annulé', NULL, '2020-06-10 16:24:41', '2020-06-10 16:34:58'),
(19, 'ewody#217', 1, 'a:1:{s:9:\"produit_0\";a:5:{i:0;s:5:\"Corgo\";i:1;d:125000;i:2;s:1:\"2\";i:3;s:64:\"http://localhost:8000/uploads/avatars_produits/5ebea073f2c53.jpg\";i:4;N;}}', NULL, 'Administrateur', '621785645', NULL, 'Conakry', 'Cosa', 'Camp carefour', NULL, 250000, NULL, 'En cours', NULL, '2020-06-10 16:35:54', '2020-06-10 16:35:54'),
(20, 'ewody#997', 1, 'a:1:{s:9:\"produit_0\";a:5:{i:0;s:19:\"Chaussure airmaxe\r\n\";i:1;d:150000;i:2;s:1:\"1\";i:3;s:63:\"http://localhost:8000/uploads/avatars_couleur/5ed127e1aa8da.jpg\";i:4;s:2:\"42\";}}', NULL, 'Administrateur', '621785645', NULL, 'Conakry', 'Cosa', 'Camp carefour', NULL, 150000, NULL, 'En cours', NULL, '2020-06-11 23:38:27', '2020-06-11 23:38:27'),
(21, 'ewody#204', 1, NULL, 'a:1:{s:9:\"produit_0\";a:5:{i:0;s:19:\"Chaussure airmaxe\r\n\";i:1;d:150000;i:2;s:1:\"1\";i:3;s:63:\"http://localhost:8000/uploads/avatars_couleur/5ed1280b6ad7c.jpg\";i:4;s:2:\"42\";}}', 'Administrateur', '621785645', NULL, 'Conakry', 'Cosa', 'Camp carefour', NULL, 150000, NULL, 'En cours', NULL, '2020-06-12 02:14:55', '2020-06-12 02:14:55'),
(22, 'ewody#253', 1, NULL, 'a:1:{s:9:\"produit_0\";a:5:{i:0;s:19:\"Chaussure airmaxe\r\n\";i:1;d:150000;i:2;s:1:\"1\";i:3;s:63:\"http://localhost:8000/uploads/avatars_couleur/5ed127e1aa8da.jpg\";i:4;s:2:\"42\";}}', 'Administrateur', '621785645', NULL, 'Conakry', 'Cosa', 'Camp carefour', NULL, 150000, NULL, 'En cours', NULL, '2020-06-12 02:15:46', '2020-06-12 02:15:46'),
(23, 'ewody#107', 1, 'a:1:{s:9:\"produit_0\";a:5:{i:0;s:19:\"Chaussure airmaxe\r\n\";i:1;d:150000;i:2;s:1:\"1\";i:3;s:63:\"http://localhost:8000/uploads/avatars_couleur/5ed127e1aa8da.jpg\";i:4;s:2:\"42\";}}', NULL, 'Sow Koulibaly', '621785645', NULL, 'Conakry', 'Cosa', 'Camp carefour', NULL, 150000, NULL, 'En cours', '2020-06-19', '2020-06-17 13:27:46', '2020-06-17 13:27:46'),
(24, 'ewody#540', 1, 'a:1:{s:9:\"produit_0\";a:5:{i:0;s:19:\"Chaussure airmaxe\r\n\";i:1;d:150000;i:2;s:1:\"1\";i:3;s:63:\"http://localhost:8000/uploads/avatars_couleur/5ed127e1aa8da.jpg\";i:4;s:2:\"43\";}}', NULL, 'Amadou Diallo', '621785645', NULL, 'Conakry', 'Cosa', 'Camp carefour', NULL, 150000, NULL, 'En cours', NULL, '2020-06-18 00:59:03', '2020-06-18 00:59:03'),
(25, 'ewody#515', 1, 'a:1:{s:9:\"produit_0\";a:5:{i:0;s:19:\"Chaussure airmaxe\r\n\";i:1;d:150000;i:2;s:1:\"1\";i:3;s:63:\"http://localhost:8000/uploads/avatars_couleur/5ed127e1aa8da.jpg\";i:4;s:2:\"43\";}}', NULL, 'Amadou Diallo', '621785645', NULL, 'Conakry', 'Cosa', 'Camp carefour', NULL, 150000, NULL, 'Annulé', NULL, '2020-06-18 00:59:03', '2020-06-29 17:12:49'),
(26, 'ewody#137', 1, 'a:1:{s:9:\"produit_0\";a:5:{i:0;s:19:\"Chaussure airmaxe\r\n\";i:1;d:150000;i:2;s:1:\"1\";i:3;s:63:\"http://localhost:8000/uploads/avatars_couleur/5ed127e1aa8da.jpg\";i:4;s:2:\"43\";}}', NULL, 'Administrateur', '621785645', NULL, 'Conakry', 'Cosa', 'Camp carefour', NULL, 150000, NULL, 'En cours', NULL, '2020-06-18 01:00:14', '2020-06-18 01:00:14'),
(27, 'ewody#668', 0, NULL, 'a:1:{s:9:\"produit_0\";a:5:{i:0;s:19:\"Chaussure airmaxe\r\n\";i:1;d:150000;i:2;s:1:\"1\";i:3;s:63:\"http://localhost:8000/uploads/avatars_couleur/5ed127e1aa8da.jpg\";i:4;s:2:\"43\";}}', 'Amadou Diallo', '621785645', 'amadou@gmail.com', 'Conakry', 'Cosa', 'Camp carefour', NULL, 150000, NULL, 'En cours', NULL, '2020-06-18 01:13:04', '2020-06-18 01:13:04'),
(28, 'ewody#785', 8, NULL, 'a:1:{s:9:\"produit_0\";a:5:{i:0;s:19:\"Chaussure airmaxe\r\n\";i:1;d:150000;i:2;s:1:\"1\";i:3;s:63:\"http://localhost:8000/uploads/avatars_couleur/5ed1280b6ad7c.jpg\";i:4;s:2:\"42\";}}', 'Oumar Sow', '666054168', NULL, 'Conakry', 'Bambeto', 'Mosquée turk de Bambeto', NULL, 150000, NULL, 'En cours', NULL, '2020-06-18 01:58:13', '2020-06-18 01:58:13'),
(29, 'ewody#558', 0, NULL, 'a:1:{s:9:\"produit_0\";a:5:{i:0;s:5:\"Gucci\";i:1;d:130000;i:2;s:1:\"1\";i:3;s:64:\"http://localhost:8000/uploads/avatars_produits/5eb2cde7e9532.PNG\";i:4;N;}}', 'Amadou Diallo', '621785645', 'amadou@gmail.com', 'Conakry', 'Cosa', 'Camp carefour', NULL, 130000, NULL, 'En cours', NULL, '2020-06-18 02:01:08', '2020-06-18 02:01:08'),
(30, 'ewody#756', 0, NULL, 'a:1:{s:9:\"produit_0\";a:5:{i:0;s:19:\"Chaussure airmaxe\r\n\";i:1;d:150000;i:2;s:1:\"1\";i:3;s:63:\"http://localhost:8000/uploads/avatars_couleur/5ed1280b6ad7c.jpg\";i:4;s:2:\"42\";}}', 'Oumar Sow', '666054168', 'sow@gmail.com', 'Conakry', 'Cosa', 'Camp carefour', NULL, 150000, NULL, 'En cours', NULL, '2020-06-21 22:31:17', '2020-06-21 22:31:17'),
(31, 'ewody#903', 1, 'a:1:{s:9:\"produit_0\";a:5:{i:0;s:6:\"Jordan\";i:1;d:150000;i:2;s:1:\"1\";i:3;s:64:\"http://localhost:8000/uploads/avatars_couleur/5ed128660ab11.jpeg\";i:4;s:2:\"44\";}}', NULL, 'Mahmoid diallo', '621785645', NULL, 'Conakry', 'Cosa', 'Camp carefour', NULL, 150000, NULL, 'Livré', NULL, '2020-06-29 17:11:40', '2020-06-29 17:12:10'),
(32, 'ewody#264', 1, NULL, 'a:1:{s:9:\"produit_0\";a:5:{i:0;s:19:\"Chaussure airmaxe\r\n\";i:1;d:150000;i:2;s:1:\"1\";i:3;s:63:\"http://localhost:8000/uploads/avatars_couleur/5ed1280b6ad7c.jpg\";i:4;s:2:\"42\";}}', 'Administrateur', '621785645', NULL, 'Conakry', 'Cosa', 'Camp carefour', NULL, 150000, NULL, 'En cours', NULL, '2020-06-30 18:02:02', '2020-06-30 18:02:02'),
(33, 'ewody#667', 11, 'a:1:{s:9:\"produit_0\";a:5:{i:0;s:19:\"Chaussure airmaxe\r\n\";i:1;d:150000;i:2;s:1:\"1\";i:3;s:63:\"http://localhost:8000/uploads/avatars_couleur/5ed127e1aa8da.jpg\";i:4;s:2:\"43\";}}', NULL, 'Amadou Diallo', '621785645', NULL, 'Conakry', 'Cosa', 'Camp carefour', NULL, 150000, NULL, 'Annulé', NULL, '2020-06-30 18:24:18', '2020-06-30 19:42:31'),
(34, 'ewody#246', 0, 'a:1:{s:9:\"produit_0\";a:5:{i:0;s:19:\"Chaussure airmaxe\r\n\";i:1;d:150000;i:2;s:1:\"2\";i:3;s:63:\"http://localhost:8000/uploads/avatars_couleur/5ed1280b6ad7c.jpg\";i:4;s:2:\"42\";}}', NULL, 'Mahmoud Diallo', '621785645', 'moudmagongore@gmail.com', 'Conakry', 'Cosa', 'Camp carefour', NULL, 300000, NULL, 'En cours', NULL, '2020-07-03 14:21:21', '2020-07-03 14:21:21');

-- --------------------------------------------------------

--
-- Structure de la table `couleurs`
--

DROP TABLE IF EXISTS `couleurs`;
CREATE TABLE IF NOT EXISTS `couleurs` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `designation` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `couleurs`
--

INSERT INTO `couleurs` (`id`, `designation`, `created_at`, `updated_at`) VALUES
(1, 'Blanc', '2020-05-29 15:18:57', '2020-05-29 15:18:57'),
(2, 'Noir', '2020-05-29 15:19:39', '2020-05-29 15:19:39'),
(3, 'Noir', '2020-05-29 15:20:40', '2020-05-29 15:20:40'),
(4, 'Bleu', '2020-05-29 15:21:10', '2020-05-29 15:21:10');

-- --------------------------------------------------------

--
-- Structure de la table `couleur_produit`
--

DROP TABLE IF EXISTS `couleur_produit`;
CREATE TABLE IF NOT EXISTS `couleur_produit` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `quantite` int(11) NOT NULL,
  `produit_id` bigint(20) UNSIGNED NOT NULL,
  `couleur_id` bigint(20) UNSIGNED NOT NULL,
  `images` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `couleur_produit`
--

INSERT INTO `couleur_produit` (`id`, `quantite`, `produit_id`, `couleur_id`, `images`, `created_at`, `updated_at`) VALUES
(1, 49, 1, 1, 'http://localhost:8000/uploads/avatars_couleur/5ed127e1aa8da.jpg', '2020-05-29 15:18:59', '2020-06-30 18:24:18'),
(2, 47, 1, 2, 'http://localhost:8000/uploads/avatars_couleur/5ed1280b6ad7c.jpg', '2020-05-29 15:19:39', '2020-07-03 14:21:21'),
(3, 40, 11, 3, 'http://localhost:8000/uploads/avatars_couleur/5ed1284884863.jpeg', '2020-05-29 15:20:40', '2020-06-09 15:15:39'),
(4, 39, 11, 4, 'http://localhost:8000/uploads/avatars_couleur/5ed128660ab11.jpeg', '2020-05-29 15:21:10', '2020-06-29 17:11:40');

-- --------------------------------------------------------

--
-- Structure de la table `coupons`
--

DROP TABLE IF EXISTS `coupons`;
CREATE TABLE IF NOT EXISTS `coupons` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `code` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remise_en_pourcentage` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `coupons`
--

INSERT INTO `coupons` (`id`, `code`, `remise_en_pourcentage`, `created_at`, `updated_at`) VALUES
(1, 'Ewody', '10', '2020-05-06 14:48:16', '2020-05-08 15:34:13');

-- --------------------------------------------------------

--
-- Structure de la table `favoris`
--

DROP TABLE IF EXISTS `favoris`;
CREATE TABLE IF NOT EXISTS `favoris` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `produit_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `favoris_user_id_foreign` (`user_id`),
  KEY `favoris_produit_id_foreign` (`produit_id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `favoris`
--

INSERT INTO `favoris` (`id`, `user_id`, `produit_id`, `created_at`, `updated_at`) VALUES
(1, 1, 6, '2020-06-30 13:20:29', '2020-06-30 13:20:29'),
(2, 1, 1, '2020-06-30 18:00:14', '2020-06-30 18:00:14'),
(3, 1, 7, '2020-06-30 18:27:05', '2020-06-30 18:27:05');

-- --------------------------------------------------------

--
-- Structure de la table `feedbacks`
--

DROP TABLE IF EXISTS `feedbacks`;
CREATE TABLE IF NOT EXISTS `feedbacks` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `raison_refus_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `feedbacks_user_id_foreign` (`user_id`),
  KEY `feedbacks_raison_refus_id_foreign` (`raison_refus_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `fournisseurs`
--

DROP TABLE IF EXISTS `fournisseurs`;
CREATE TABLE IF NOT EXISTS `fournisseurs` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `statut` int(11) NOT NULL DEFAULT '1',
  `nom` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `prenom` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `telephone` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `adresse` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `motdepass` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `images`
--

DROP TABLE IF EXISTS `images`;
CREATE TABLE IF NOT EXISTS `images` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `images` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `produit_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `images_produit_id_foreign` (`produit_id`)
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `images`
--

INSERT INTO `images` (`id`, `images`, `produit_id`, `created_at`, `updated_at`) VALUES
(1, 'avatars_sousImagesProduit/5eb2c7c35c4b9.jpg', 1, '2020-05-06 14:20:51', '2020-05-06 14:20:51'),
(2, 'avatars_sousImagesProduit/5eb2c7e6a51fa.jpeg', 1, '2020-05-06 14:21:26', '2020-05-06 14:21:26'),
(3, 'avatars_sousImagesProduit/5eb2d2ef507c9.jpg', 12, '2020-05-06 15:08:31', '2020-05-06 15:08:31'),
(4, 'avatars_sousImagesProduit/5eb2d37892a0a.jpg', 13, '2020-05-06 15:10:48', '2020-05-06 15:10:48'),
(5, 'avatars_sousImagesProduit/5eb2d3c064e80.jpg', 13, '2020-05-06 15:12:00', '2020-05-06 15:12:00'),
(6, 'avatars_sousImagesProduit/5eb2d3db4d21b.jpg', 13, '2020-05-06 15:12:27', '2020-05-06 15:12:27'),
(7, 'avatars_sousImagesProduit/5eb2d3f0b7267.jpg', 13, '2020-05-06 15:12:48', '2020-05-06 15:12:48'),
(8, 'avatars_sousImagesProduit/5eb2d455ac785.jpg', 14, '2020-05-06 15:14:29', '2020-05-06 15:14:29'),
(9, 'avatars_sousImagesProduit/5eb2d47ca2038.png', 14, '2020-05-06 15:15:08', '2020-05-06 15:15:08');

-- --------------------------------------------------------

--
-- Structure de la table `industries`
--

DROP TABLE IF EXISTS `industries`;
CREATE TABLE IF NOT EXISTS `industries` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `designation_industrie` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `industries`
--

INSERT INTO `industries` (`id`, `designation_industrie`, `created_at`, `updated_at`) VALUES
(1, 'Fahion', '2020-05-31 00:00:00', '2020-05-31 00:00:00'),
(2, 'Electronique', '2020-05-06 13:41:02', '2020-05-06 13:41:02'),
(3, 'Emballage', '2020-05-06 13:41:25', '2020-05-06 13:41:25'),
(4, 'Beauté personal care', '2020-05-06 13:41:35', '2020-05-06 13:41:35');

-- --------------------------------------------------------

--
-- Structure de la table `livraisons`
--

DROP TABLE IF EXISTS `livraisons`;
CREATE TABLE IF NOT EXISTS `livraisons` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `commande_id` bigint(20) UNSIGNED NOT NULL,
  `date_livraison_reelle` date NOT NULL,
  `montant` double NOT NULL,
  `quantite` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `statut` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `livraisons_commande_id_foreign` (`commande_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=29 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_09_184128_create_produits_table', 1),
(4, '2019_08_09_184315_create_clients_table', 1),
(5, '2019_08_09_184451_create_fournisseurs_table', 1),
(6, '2019_08_09_184543_create_commandes_table', 1),
(7, '2019_08_09_184635_create_categories_table', 1),
(8, '2019_08_09_184713_create_sous_categories_table', 1),
(9, '2019_08_09_184754_create_images_table', 1),
(10, '2019_08_09_184834_create_livraisons_table', 1),
(11, '2019_08_09_185305_create_avis_table', 1),
(12, '2019_09_13_173618_create_privilleges_table', 1),
(13, '2019_10_04_162628_create_categorie_produit_table', 1),
(14, '2019_10_04_162708_create_souscategorie_produit_table', 1),
(15, '2019_10_04_163009_create_privillege_user_table', 1),
(16, '2019_12_30_191338_create_service_table', 1),
(17, '2019_12_30_191650_create_industries_table', 1),
(18, '2019_12_30_192146_create_feedbacks_table', 1),
(19, '2019_12_30_192428_create_raisons_refus_table', 1),
(20, '2020_02_17_175406_create_tailles_table', 1),
(21, '2020_02_17_175458_create_couleurs_table', 1),
(22, '2020_02_21_203722_create_favoris_table', 1),
(23, '2020_03_26_130601_create_produit_taille_table', 1),
(24, '2020_03_26_130623_create_couleur_produit_table', 1),
(25, '2020_03_26_143621_create_caracteristiques_table', 1),
(26, '2020_03_26_143743_create_caracteristique_produit_table', 1),
(27, '2020_03_26_143913_table_foreign', 1),
(28, '2020_03_30_101050_create_coupons_table', 1);

-- --------------------------------------------------------

--
-- Structure de la table `password_resets`
--

DROP TABLE IF EXISTS `password_resets`;
CREATE TABLE IF NOT EXISTS `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `privilleges`
--

DROP TABLE IF EXISTS `privilleges`;
CREATE TABLE IF NOT EXISTS `privilleges` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `designation_privillege` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `privilleges`
--

INSERT INTO `privilleges` (`id`, `designation_privillege`, `created_at`, `updated_at`) VALUES
(1, 'Administrateur', '2020-05-06 13:38:27', '2020-05-06 13:38:27'),
(2, 'Utilisateur', '2020-05-06 13:38:27', '2020-05-06 13:38:27');

-- --------------------------------------------------------

--
-- Structure de la table `privillege_user`
--

DROP TABLE IF EXISTS `privillege_user`;
CREATE TABLE IF NOT EXISTS `privillege_user` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `privillege_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `privillege_user`
--

INSERT INTO `privillege_user` (`id`, `user_id`, `privillege_id`, `created_at`, `updated_at`) VALUES
(1, 1, 1, NULL, NULL),
(2, 2, 2, NULL, NULL),
(11, 8, 2, NULL, NULL),
(9, 6, 2, NULL, NULL),
(12, 9, 2, NULL, NULL),
(14, 11, 2, NULL, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `produits`
--

DROP TABLE IF EXISTS `produits`;
CREATE TABLE IF NOT EXISTS `produits` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `fournisseur_id` bigint(20) UNSIGNED NOT NULL,
  `nom` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `marque` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `prix_unitaire` double NOT NULL,
  `prix_maximum` double NOT NULL,
  `date_dexpiration` date DEFAULT NULL,
  `quantite` int(11) NOT NULL,
  `chemin` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `titre_video` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `photo` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `produits_fournisseur_id_foreign` (`fournisseur_id`)
) ENGINE=MyISAM AUTO_INCREMENT=21 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `produits`
--

INSERT INTO `produits` (`id`, `fournisseur_id`, `nom`, `description`, `marque`, `prix_unitaire`, `prix_maximum`, `date_dexpiration`, `quantite`, `chemin`, `titre_video`, `photo`, `created_at`, `updated_at`) VALUES
(1, 1, 'Chaussure airmaxe\r\n', 'Une bonne paire de chaussure', 'AirsWaras', 150000, 170000, NULL, 96, NULL, 'AirsWaras', 'avatars_produits/5eb2c69a6b880.jpg', '2020-05-06 14:13:38', '2020-07-03 14:21:21'),
(2, 1, 'Iphone 11', 'Un telephone très cool pour le phone', 'Iphone 11', 9500000, 10000000, NULL, 0, NULL, 'Iphone 11', 'avatars_produits/5efa2cdf4dea2.jpg', '2020-05-06 14:17:13', '2020-06-29 18:03:11'),
(3, 1, 'Gucci', 'Gucci de bonne qualitè', 'Gucci', 130000, 150000, NULL, 86, NULL, 'Gucci', 'avatars_produits/5eb2cde7e9532.PNG', '2020-05-06 14:47:03', '2020-06-18 02:01:09'),
(4, 1, 'Diesel', 'Diesel de qualitè', 'Diesel', 120000, 130000, NULL, 97, NULL, 'Diesel', 'avatars_produits/5eb2ce20a433a.PNG', '2020-05-06 14:48:00', '2020-06-10 15:24:05'),
(5, 1, 'Leno', 'Leno de très bonne qualité', 'Leno', 120000, 160000, NULL, 0, NULL, 'Leno', 'avatars_produits/5eb2ce8ce66a2.jpeg', '2020-05-06 14:49:48', '2020-05-26 10:10:34'),
(6, 1, 'Sacs à main gucci', 'Sacs à main de qualitè', 'Sacs à main', 110000, 125000, NULL, 0, NULL, 'Sacs à main', 'avatars_produits/5eb2cfd551492.PNG', '2020-05-06 14:55:17', '2020-06-09 14:55:39'),
(7, 1, 'Gongore', 'un sacs de très bonne quanlité', 'Gongore', 130000, 150000, NULL, 48, NULL, 'Gongore', 'avatars_produits/5eb2d0161e0f7.PNG', '2020-05-06 14:56:22', '2020-05-19 14:53:56'),
(8, 1, 'Rolex', 'Rolex de bonne qualitè', 'Rolex', 345000, 350000, NULL, 49, NULL, 'Rolex', 'avatars_produits/5eb2d0450ec9c.PNG', '2020-05-06 14:57:09', '2020-06-09 14:50:39'),
(9, 1, 'Rolex', 'Casio de qualité', 'Casio', 150000, 170000, NULL, 0, NULL, 'Casio', 'avatars_produits/5eb2d07d6fdfe.PNG', '2020-05-06 14:58:05', '2020-05-28 10:25:21'),
(10, 1, 'Lacoste', 'Lacoste de trés bonne qualité', 'Lacoste', 115000, 125000, NULL, 47, NULL, 'Lacoste', 'avatars_produits/5eb2d0b82ec7b.PNG', '2020-05-06 14:59:04', '2020-05-11 10:09:19'),
(11, 1, 'Jordan', 'Jordan de qualité', 'Jordan', 150000, 170000, NULL, 79, NULL, 'Jordan', 'avatars_produits/5eb2d16604871.jpeg', '2020-05-06 15:01:58', '2020-06-29 17:11:40'),
(12, 1, 'Emballage  café', 'Emballage pour café', 'Emballage  café', 120000, 150000, NULL, 50, NULL, 'Panpesse', 'avatars_produits/5eb2d2d55defe.jpg', '2020-05-06 15:08:05', '2020-05-19 10:08:42'),
(13, 1, 'Emballe de tout type', 'Emballe de tout type trés leger pour emporter', 'Emballe de tout type', 100000, 110000, NULL, 69, NULL, 'Emballe de tout type', 'avatars_produits/5eb2d36098d27.jpg', '2020-05-06 15:10:24', '2020-06-09 15:22:50'),
(14, 1, 'Emballage  mangé', 'Emballage pour mangé trés confortable', 'Emballage mangé', 105000, 115000, NULL, 50, NULL, 'Emballage pour mangé', 'avatars_produits/5eb2d436a2903.jpg', '2020-05-06 15:13:58', '2020-05-19 10:09:03'),
(15, 1, 'Panpesse', 'Panpesse', 'Panpesse', 135000, 150000, NULL, 50, NULL, 'Panpesse', 'avatars_produits/5eb2d538ca425.jpg', '2020-05-06 15:18:16', '2020-05-06 15:18:16'),
(16, 1, 'Corgo', 'Corgo de qualité', 'Corgo', 125000, 150000, NULL, 96, NULL, 'Corgo', 'avatars_produits/5ebea073f2c53.jpg', '2020-05-15 14:00:20', '2020-06-10 16:35:54'),
(17, 1, 'Nike', 'Nike de qualité', 'Nike', 155000, 18000, NULL, 100, NULL, 'Nike', 'avatars_produits/5ebea0f13da9e.jpeg', '2020-05-15 14:02:25', '2020-05-15 14:02:25');

-- --------------------------------------------------------

--
-- Structure de la table `produit_taille`
--

DROP TABLE IF EXISTS `produit_taille`;
CREATE TABLE IF NOT EXISTS `produit_taille` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `quantite` int(11) NOT NULL,
  `produit_id` bigint(20) UNSIGNED NOT NULL,
  `taille_id` bigint(20) UNSIGNED NOT NULL,
  `designation` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `produit_taille`
--

INSERT INTO `produit_taille` (`id`, `quantite`, `produit_id`, `taille_id`, `designation`, `created_at`, `updated_at`) VALUES
(1, 47, 1, 1, 42, '2020-05-29 15:24:23', '2020-07-03 14:21:21'),
(2, 49, 1, 2, 43, '2020-05-29 15:25:00', '2020-06-30 18:24:18'),
(3, 40, 11, 3, 42, '2020-05-29 15:25:24', '2020-06-09 15:15:39'),
(4, 39, 11, 4, 44, '2020-05-29 15:25:50', '2020-06-29 17:11:40');

-- --------------------------------------------------------

--
-- Structure de la table `raisons_refus`
--

DROP TABLE IF EXISTS `raisons_refus`;
CREATE TABLE IF NOT EXISTS `raisons_refus` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `designation_raison` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `services`
--

DROP TABLE IF EXISTS `services`;
CREATE TABLE IF NOT EXISTS `services` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `designation` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `souscategorie_produit`
--

DROP TABLE IF EXISTS `souscategorie_produit`;
CREATE TABLE IF NOT EXISTS `souscategorie_produit` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `produit_id` bigint(20) UNSIGNED NOT NULL,
  `souscategorie_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `sous_categories`
--

DROP TABLE IF EXISTS `sous_categories`;
CREATE TABLE IF NOT EXISTS `sous_categories` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `categorie_id` bigint(20) UNSIGNED NOT NULL,
  `designation_s_categorie` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `sous_categories_categorie_id_foreign` (`categorie_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `tailles`
--

DROP TABLE IF EXISTS `tailles`;
CREATE TABLE IF NOT EXISTS `tailles` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `designation` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `tailles`
--

INSERT INTO `tailles` (`id`, `designation`, `created_at`, `updated_at`) VALUES
(1, '42', '2020-05-29 15:24:23', '2020-05-29 15:24:23'),
(2, '43', '2020-05-29 15:25:00', '2020-05-29 15:25:00'),
(3, '42', '2020-05-29 15:25:24', '2020-05-29 15:25:24'),
(4, '44', '2020-05-29 15:25:50', '2020-05-29 15:25:50');

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `statut` int(11) NOT NULL DEFAULT '1',
  `name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nom` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `prenom` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `telephone` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `adresse` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `photo` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=MyISAM AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id`, `statut`, `name`, `nom`, `prenom`, `telephone`, `adresse`, `email`, `password`, `photo`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 1, 'Administrateur', 'Diallo', 'Mahmoud', '621785645', 'Cosa', 'administrateur@gmail.com', '$2y$10$HZpf5UhJSEvuK.IoL4RqXuf8D2q54yd58z2gKnKT/n00ZGy9Ln0My', 'avatars_profile/5eb2cd5eb22d6.jpg', 'ExOafOxFPhGxe8KU9GxQOExX7kE4K6DOxN3jgl2dGvrTBza5TQEDJwQqBpI6', '2020-05-06 13:38:27', '2020-05-06 14:44:46'),
(2, 1, 'Utilisateur', 'Sow', 'Oumar', '666054168', 'Cosa', 'utilisateur@gmail.com', '$2y$10$DluUVs/l85/E3xpyyEGUfeFTOnvLqqb6B3c3jVyc5VzDTw2XKlMDa', 'avatars_profile/5eb2d6c77ccd6.jpg', 'wKG6K0rwUMscZQTEnf4hc8HjZrs8mk5gZPpuLvTtJVml0wGCImNUW7ZlNc7Q', '2020-05-06 13:38:27', '2020-05-06 15:24:55'),
(8, 1, 'Oury Diallo', 'Diallo', 'Oury', '655542890', 'Bambeto', 'oury@gmail.com', '$2y$10$gQVCV.ZvKZfEiHNuyhc9LOpWmfctHLIngSgBT2YI.p87RVCcrwGIO', 'avatars_profile/5edf9c475caa3.jpg', 'wFrrnntbyESPHLh4QPqhBIAIMKuVJRLlqV4Ltlj6JyVIRqb0JBmAkK65Dc1D', '2020-06-09 14:22:57', '2020-06-09 14:27:19'),
(6, 1, 'Gando', 'Diallo', 'Gando', '666025256', 'Bambeto', 'gando@gmail.com', '$2y$10$Cf3ANcedwP5rPWCl.u9qFuYilRNxIDGxloLtbUe20M7kh2oU.C3bi', 'avatars_profile/5ec69bf7f3452.jpeg', 'roJswbpGpF2e5kWmkosbVJFAbFzRsgmy75zyeZOFgHz3CD3cPYV3BxXijCQu', '2020-05-21 14:49:09', '2020-05-21 15:19:20'),
(9, 1, 'Oumar Sow', NULL, NULL, '666054168', NULL, 'sow@gmail.com', '$2y$10$WqAtym0L5iinFb2lAxfb/usmxyy.XRo/ch4dxOadgkRdB2UT2hoHm', NULL, 'e4gIw62AEIcGCT7Y0tWi19FNhUhBll98sA53gG54KL0SLjZsPsyLGapeoYev', '2020-06-09 15:18:46', '2020-06-09 15:18:46'),
(11, 1, 'Amadou Diallo', NULL, NULL, '66252565', NULL, 'amadou@gmail.com', '$2y$10$RfDCiRRKOCmTVfMwQDr4ZO4htC6Tkl6Eq1wt52tdUILwzDHzwucCO', NULL, 'OT6JpakUnKTW4w3E7rfvWDwekNbGNgE4eOyAIAxyf4m2k51j947yXN4KvgTi', '2020-06-30 18:23:33', '2020-06-30 18:23:33');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
