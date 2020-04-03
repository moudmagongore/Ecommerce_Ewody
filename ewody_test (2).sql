-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  ven. 03 avr. 2020 à 17:04
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
  `commentaire` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date_comment` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `avis_user_id_foreign` (`user_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
  `designation_categorie` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `categories`
--

INSERT INTO `categories` (`id`, `designation_categorie`, `created_at`, `updated_at`) VALUES
(1, 'Montre', '2020-03-26 16:42:00', '2020-03-26 16:42:00'),
(2, 'Sacs', '2020-03-26 16:42:07', '2020-03-26 16:42:07'),
(3, 'Produits phares', '2020-03-26 16:42:17', '2020-03-26 16:42:17'),
(4, 'Telephone', '2020-03-26 16:42:26', '2020-03-26 16:42:26');

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
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `categorie_produit`
--

INSERT INTO `categorie_produit` (`id`, `produit_id`, `categorie_id`, `created_at`, `updated_at`) VALUES
(1, 1, 1, NULL, NULL),
(2, 3, 2, NULL, NULL),
(3, 4, 4, NULL, NULL),
(4, 1, 1, NULL, NULL),
(5, 2, 2, NULL, NULL),
(6, 2, 3, NULL, NULL),
(7, 3, 4, NULL, NULL);

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
  `commande_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `produits` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `nom` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `prenom` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `telephone` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `adresse` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date_commande` date DEFAULT NULL,
  `montant` double DEFAULT NULL,
  `date_echeance` date DEFAULT NULL,
  `statut` enum('En cours','Emballé','En route','Livré','Annulé') COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `date_livraison` date DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `commandes_user_id_foreign` (`user_id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `commandes`
--

INSERT INTO `commandes` (`id`, `commande_id`, `user_id`, `produits`, `nom`, `prenom`, `telephone`, `adresse`, `date_commande`, `montant`, `date_echeance`, `statut`, `date_livraison`, `created_at`, `updated_at`) VALUES
(1, 'ewody#722', 1, 'a:1:{s:9:\"produit_0\";a:4:{i:0;s:14:\"Encore du test\";i:1;d:150000;i:2;i:1;i:3;s:62:\"avatars_produits/kOa7lEweSD9wZ0r8mEFfxxTat6rEIkKk60LFnvMj.jpeg\";}}', 'Diallo', 'Mahmoudd', '665544585', 'Cosa', NULL, 150000, NULL, 'Annulé', '2020-05-03', '2020-04-03 11:39:34', '2020-04-03 15:25:41'),
(2, 'ewody#578', 1, 'a:1:{s:9:\"produit_0\";a:4:{i:0;s:9:\"Telephone\";i:1;d:250000;i:2;s:1:\"2\";i:3;s:62:\"avatars_produits/XBw7xFDn7l990jjFfWQd2TmtWu6OzjY0rLVDa4QE.jpeg\";}}', 'Sow', 'Oumar', '666054168', 'Cosa', NULL, 500000, NULL, 'Livré', '2020-05-02', '2020-04-03 12:22:39', '2020-04-03 15:22:24'),
(3, 'ewody#27', 1, 'a:1:{s:9:\"produit_0\";a:4:{i:0;s:14:\"Encore du test\";i:1;d:150000;i:2;s:1:\"2\";i:3;s:62:\"avatars_produits/kOa7lEweSD9wZ0r8mEFfxxTat6rEIkKk60LFnvMj.jpeg\";}}', 'Sow', 'Oumar', '666054168', 'Cosa', NULL, 300000, NULL, 'En route', '2020-04-14', '2020-04-03 15:25:16', '2020-04-03 15:34:03'),
(4, 'ewody#995', 1, 'a:1:{s:9:\"produit_0\";a:4:{i:0;s:4:\"Test\";i:1;d:100000;i:2;i:1;i:3;s:62:\"avatars_produits/vzUbgPUmcKzX0aIbSBRfQwcBhrY3LnCcEa8PF6Dv.jpeg\";}}', 'Camara', 'Fodé', '666525858', 'Bambeto', NULL, 100000, NULL, 'Livré', '2020-05-03', '2020-04-03 15:32:42', '2020-04-03 16:12:50'),
(5, 'ewody#834', 1, 'a:1:{s:9:\"produit_0\";a:4:{i:0;s:9:\"Telephone\";i:1;d:250000;i:2;s:1:\"3\";i:3;s:62:\"avatars_produits/XBw7xFDn7l990jjFfWQd2TmtWu6OzjY0rLVDa4QE.jpeg\";}}', 'Kante', 'Yéro', '66625856', 'Lambagui', NULL, 375000, NULL, 'Emballé', '2020-05-03', '2020-04-03 15:33:29', '2020-04-03 15:33:54'),
(6, 'ewody#31', 2, 'a:1:{s:9:\"produit_0\";a:4:{i:0;s:9:\"Telephone\";i:1;d:250000;i:2;s:1:\"3\";i:3;s:62:\"avatars_produits/XBw7xFDn7l990jjFfWQd2TmtWu6OzjY0rLVDa4QE.jpeg\";}}', 'Sow', 'Oumar', '666054168', 'Cosa', NULL, 375000, NULL, 'Livré', '2020-05-03', '2020-04-03 16:09:35', '2020-04-03 16:12:39');

-- --------------------------------------------------------

--
-- Structure de la table `couleur`
--

DROP TABLE IF EXISTS `couleur`;
CREATE TABLE IF NOT EXISTS `couleur` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `designation` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `coupons`
--

INSERT INTO `coupons` (`id`, `code`, `remise_en_pourcentage`, `created_at`, `updated_at`) VALUES
(1, 'ABC', '50', '2020-03-30 14:23:17', '2020-03-30 14:23:17');

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
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `fournisseurs`
--

INSERT INTO `fournisseurs` (`id`, `statut`, `nom`, `prenom`, `email`, `telephone`, `adresse`, `motdepass`, `type`, `created_at`, `updated_at`) VALUES
(1, 1, 'Diallo', 'Mahmoud', 'moudmagongore@gmail.com', '621785645', 'Cosa', '$2y$10$HJmR5DvealRfmsUXWGKXQuGlOzH6L.HFuR.kMEZQqd2VCdRkJNgRO', NULL, '2020-03-30 13:16:28', '2020-03-30 13:16:28');

-- --------------------------------------------------------

--
-- Structure de la table `images`
--

DROP TABLE IF EXISTS `images`;
CREATE TABLE IF NOT EXISTS `images` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `nom` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `produit_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `images_produit_id_foreign` (`produit_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
) ENGINE=MyISAM AUTO_INCREMENT=185 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(157, '2014_10_12_000000_create_users_table', 4),
(158, '2014_10_12_100000_create_password_resets_table', 4),
(159, '2019_08_09_184128_create_produits_table', 4),
(160, '2019_08_09_184315_create_clients_table', 4),
(161, '2019_08_09_184451_create_fournisseurs_table', 4),
(162, '2019_08_09_184543_create_commandes_table', 4),
(163, '2019_08_09_184635_create_categories_table', 4),
(164, '2019_08_09_184713_create_sous_categories_table', 4),
(165, '2019_08_09_184754_create_images_table', 4),
(166, '2019_08_09_184834_create_livraisons_table', 4),
(167, '2019_08_09_185305_create_avis_table', 4),
(168, '2019_09_13_173618_create_privilleges_table', 4),
(169, '2019_10_04_162628_create_categorie_produit_table', 4),
(170, '2019_10_04_162708_create_souscategorie_produit_table', 4),
(171, '2019_10_04_163009_create_privillege_user_table', 4),
(172, '2019_12_30_191338_create_service_table', 4),
(173, '2019_12_30_191650_create_industries_table', 4),
(174, '2019_12_30_192146_create_feedbacks_table', 4),
(175, '2019_12_30_192428_create_raisons_refus_table', 4),
(149, '2020_02_17_175406_create_taille_table', 3),
(176, '2020_02_17_175406_create_tailles_table', 4),
(177, '2020_02_17_175458_create_couleur_table', 4),
(178, '2020_02_21_203722_create_favoris_table', 4),
(179, '2020_03_26_130601_create_produit_taille_table', 4),
(75, '2020_03_26_130651_table_foreign', 1),
(180, '2020_03_26_130623_create_produit_couleur_table', 4),
(128, '2020_03_26_143743_create_produit_caracteristique_table', 2),
(182, '2020_03_26_143743_create_caracteristique_produit_table', 4),
(181, '2020_03_26_143621_create_caracteristiques_table', 4),
(183, '2020_03_26_143913_table_foreign', 4),
(184, '2020_03_30_101050_create_coupons_table', 5);

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
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `privilleges`
--

INSERT INTO `privilleges` (`id`, `designation_privillege`, `created_at`, `updated_at`) VALUES
(1, 'Administrateur', '2020-03-26 16:41:03', '2020-03-26 16:41:03'),
(2, 'Utilisateur', '2020-03-26 16:41:03', '2020-03-26 16:41:03'),
(3, 'Vendeur', '2020-03-26 16:56:18', '2020-03-26 16:56:18');

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
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `privillege_user`
--

INSERT INTO `privillege_user` (`id`, `user_id`, `privillege_id`, `created_at`, `updated_at`) VALUES
(1, 1, 1, NULL, NULL),
(2, 2, 2, NULL, NULL),
(3, 3, 2, NULL, NULL),
(4, 4, 2, NULL, NULL),
(6, 6, 2, NULL, NULL);

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
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `produits`
--

INSERT INTO `produits` (`id`, `fournisseur_id`, `nom`, `description`, `marque`, `prix_unitaire`, `prix_maximum`, `date_dexpiration`, `quantite`, `chemin`, `titre_video`, `photo`, `created_at`, `updated_at`) VALUES
(1, 1, 'Test', 'Test', 'Test', 100000, 150000, NULL, 32, NULL, 'Test', 'avatars_produits/vzUbgPUmcKzX0aIbSBRfQwcBhrY3LnCcEa8PF6Dv.jpeg', '2020-04-01 11:36:29', '2020-04-03 15:32:42'),
(2, 1, 'Encore du test', 'Encore du test', 'Encore du test', 150000, 200000, NULL, 38, NULL, 'Encore du test', 'avatars_produits/kOa7lEweSD9wZ0r8mEFfxxTat6rEIkKk60LFnvMj.jpeg', '2020-04-01 11:37:40', '2020-04-03 15:25:16'),
(3, 1, 'Telephone', 'Telephone', 'Telephone', 250000, 300000, NULL, 74, NULL, 'Telephone', 'avatars_produits/XBw7xFDn7l990jjFfWQd2TmtWu6OzjY0rLVDa4QE.jpeg', '2020-04-01 11:38:21', '2020-04-03 16:09:35');

-- --------------------------------------------------------

--
-- Structure de la table `produit_caracteristique`
--

DROP TABLE IF EXISTS `produit_caracteristique`;
CREATE TABLE IF NOT EXISTS `produit_caracteristique` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `produit_id` bigint(20) UNSIGNED NOT NULL,
  `caracteristique_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `produit_couleur`
--

DROP TABLE IF EXISTS `produit_couleur`;
CREATE TABLE IF NOT EXISTS `produit_couleur` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `produit_id` bigint(20) UNSIGNED NOT NULL,
  `couleur_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `produit_taille`
--

DROP TABLE IF EXISTS `produit_taille`;
CREATE TABLE IF NOT EXISTS `produit_taille` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `produit_id` bigint(20) UNSIGNED NOT NULL,
  `taille_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
-- Structure de la table `taille`
--

DROP TABLE IF EXISTS `taille`;
CREATE TABLE IF NOT EXISTS `taille` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `designation` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
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
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id`, `statut`, `name`, `nom`, `prenom`, `telephone`, `adresse`, `email`, `password`, `photo`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 1, 'Admin', 'Diallo', 'Mahmoud', '666054168', 'Cosa', 'administrateur@gmail.com', '$2y$10$.hBPWTuKuc1gwZkW37.ujey4zD6r8IaQQiz5K2GWLM4g1SOR/zvmC', 'avatars_profile/PXP97J9HvHGwaQSuHuJv2OMgcJmVlzjuBJda6iaV.jpeg', '9T38A0Z20t3LDoCwJV5WpxoKz3Ji0IkwdPM9WqUySabl5WOxstErsbWaL5OC', '2020-03-26 16:41:03', '2020-03-27 10:19:20'),
(2, 1, 'Oumar Sow', 'Sow', 'Oumar', '666054168', 'Cosa', 'utilisateur@gmail.com', '$2y$10$.0Wg7TJkwG7y8OXqmAeUuukHfcuS5U4/W0cjCY0oqwsKwKQt61pOO', 'avatars_profile/C5u3KsFEiDLsdU5lCkCcrtEnq5QvJrjNehs7jo25.jpeg', '6lPRb1SqNuRY5My5xKv3OdlMyB6AEfvKpmYXenxW4H7buG6TCLffA7vhwB5s', '2020-03-26 16:41:03', '2020-03-28 16:23:13'),
(3, 1, 'Mahmoud', 'Diallo', 'Mahmoud', '621785645', 'Cosa', 'moudmagongore@gmail.com', '$2y$10$j3im4NCCalLyCwmTsKTMPuSPuWV5pL7aq6rUWcEsQ4F.ghVG.XbhO', 'avatars_profile/Nyn6HDpJZc6qmQYP3pDEgx9dWt1jnvcjN5DWyFst.jpeg', 'XMOSM7CO3PYmLQCZyVbC16wF0E7eBRUzntbRgfMT4jbzhyG8cEhz0TzXxunt', '2020-03-26 16:56:48', '2020-03-27 10:12:48'),
(4, 1, 'Oury Diallo', 'Diallo', 'Oury', '655542890', 'Bambeto', 'oury@gmail.com', '$2y$10$PYyDUzTdUFw.JnFShl0xseX43D3TpVxgxu1aGdaQQuXi4GO6qCoAS', NULL, '5uSaKeEExMqEExowx4CVqAjsRN4BfsXgPaxAThSU6bEhDuue4xSSX1RQWgsd', '2020-04-02 12:45:44', '2020-04-02 12:45:44'),
(6, 1, 'Gando', NULL, NULL, NULL, NULL, 'gando@gmail.com', '$2y$10$FsOQJcv65Q6F2O/UpHAE1OmzuaxrKL0pqsBShd9YWCRQ.ItHBpcjy', NULL, NULL, '2020-04-03 10:55:33', '2020-04-03 10:55:33');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
