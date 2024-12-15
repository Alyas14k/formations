-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : dim. 15 déc. 2024 à 14:07
-- Version du serveur : 8.3.0
-- Version de PHP : 8.2.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `formation`
--

-- --------------------------------------------------------

--
-- Structure de la table `failed_jobs`
--

DROP TABLE IF EXISTS `failed_jobs`;
CREATE TABLE IF NOT EXISTS `failed_jobs` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `uuid` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL,
  `connection` text CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL,
  `queue` text CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL,
  `payload` longtext CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL,
  `exception` longtext CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `formateurs`
--

DROP TABLE IF EXISTS `formateurs`;
CREATE TABLE IF NOT EXISTS `formateurs` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `nom` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL,
  `prenom` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL,
  `mobile` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL,
  `email` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `matiere` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `user` int DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

--
-- Déchargement des données de la table `formateurs`
--

INSERT INTO `formateurs` (`id`, `nom`, `prenom`, `mobile`, `email`, `created_at`, `updated_at`, `matiere`, `user`) VALUES
(1, 'BARRO', 'IBRAHIM', '12345678', 'barro.rahim@gmail.com', '2024-12-09 21:39:16', '2024-12-09 21:39:16', 'INFORMATIQUE', 1),
(2, 'BARRO', 'ABDOUL RAZAK', '12345678', 'barro.rahim@gmail.com', '2024-12-09 21:41:09', '2024-12-09 21:41:09', 'BD', 1),
(3, 'COMPAORE', 'ELYSE', '12345678', 'elyse@gmail.com', '2024-12-11 20:49:03', '2024-12-11 20:49:03', 'PLATEFORME JAVA', NULL);

-- --------------------------------------------------------

--
-- Structure de la table `formations`
--

DROP TABLE IF EXISTS `formations`;
CREATE TABLE IF NOT EXISTS `formations` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `titre` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL,
  `prix` int NOT NULL,
  `date_debut` date DEFAULT NULL,
  `date_fin` date DEFAULT NULL,
  `place` int DEFAULT NULL,
  `lieu` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `objectif` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `description` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `user` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `modify_by` int DEFAULT NULL,
  `url` varchar(255) COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

--
-- Déchargement des données de la table `formations`
--

INSERT INTO `formations` (`id`, `titre`, `prix`, `date_debut`, `date_fin`, `place`, `lieu`, `objectif`, `description`, `user`, `created_at`, `updated_at`, `modify_by`, `url`) VALUES
(1, 'SQL SERVER', 40000, '2024-12-10', '2024-12-14', 45, 'OUAGA', NULL, 'Desc', 1, '2024-12-09 22:39:32', '2024-12-09 22:39:32', NULL, NULL),
(2, 'INFORMATIQUE', 560000, '2024-12-12', '2024-12-20', 34, 'BOBO', NULL, 'Test desc', 1, '2024-12-10 22:14:51', '2024-12-10 22:14:51', NULL, NULL),
(3, 'ADMINISTRATION LINUX', 350000, '2024-12-11', '2024-12-26', 30, 'KOUDOUGOU', NULL, 'Test Desc', 1, '2024-12-10 22:15:42', '2024-12-10 22:15:42', NULL, NULL),
(4, 'DEVELOPPEMENT MOBILE', 70000, '2025-01-06', '2025-01-11', 10, 'OUAGA', NULL, 'Tes Description', 1, '2024-12-10 22:17:02', '2024-12-10 22:17:02', NULL, NULL),
(5, 'Code JAVA', 140000, '2024-12-16', '2024-12-20', 14, 'AMPO OUAGA', NULL, 'Test', 2, '2024-12-11 20:53:35', '2024-12-11 20:53:35', NULL, NULL),
(6, 'TESTE', 90000, '2024-12-23', '2024-12-28', 10, 'BANG POORE', NULL, 'BARRO MODIF TEST', 2, '2024-12-14 09:55:30', '2024-12-15 11:44:23', 1, 'public/files/2024/2024_6.png'),
(7, 'BARRO FORMATION', 100000, '2024-12-23', '2024-12-28', 10, 'UNIVERSITE AUBE NOUVELLE', NULL, 'TEST', 1, '2024-12-15 12:21:06', '2024-12-15 12:21:06', NULL, 'public/files/2024/Sun-Dec-2024.png'),
(8, 'ESSAI', 34000, '2024-12-09', '2024-12-07', 23, 'UJKZ', NULL, 'ENCORE', 1, '2024-12-15 12:22:24', '2024-12-15 12:24:04', 1, 'public/files/2024/Sun-Dec-2024_8.png');

-- --------------------------------------------------------

--
-- Structure de la table `formation_formateurs`
--

DROP TABLE IF EXISTS `formation_formateurs`;
CREATE TABLE IF NOT EXISTS `formation_formateurs` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `formation_id` int NOT NULL,
  `formateur_id` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

--
-- Déchargement des données de la table `formation_formateurs`
--

INSERT INTO `formation_formateurs` (`id`, `formation_id`, `formateur_id`, `created_at`, `updated_at`) VALUES
(1, 1, 1, '2024-12-09 22:39:32', '2024-12-09 22:39:32'),
(2, 2, 2, '2024-12-10 22:14:51', '2024-12-10 22:14:51'),
(3, 3, 2, '2024-12-10 22:15:42', '2024-12-10 22:15:42'),
(4, 4, 1, '2024-12-10 22:17:02', '2024-12-10 22:17:02'),
(5, 5, 3, '2024-12-11 20:53:35', '2024-12-11 20:53:35'),
(6, 6, 3, '2024-12-14 09:55:30', '2024-12-14 10:37:45'),
(7, 7, 1, '2024-12-15 12:21:06', '2024-12-15 12:21:06'),
(8, 8, 2, '2024-12-15 12:22:24', '2024-12-15 12:22:24');

-- --------------------------------------------------------

--
-- Structure de la table `inscrits`
--

DROP TABLE IF EXISTS `inscrits`;
CREATE TABLE IF NOT EXISTS `inscrits` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `nom` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL,
  `prenom` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL,
  `sexe` int NOT NULL,
  `email` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `mobile_1` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL,
  `mobile_2` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `formation_id` int NOT NULL,
  `objectif` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `statut` int NOT NULL,
  `type` int NOT NULL,
  `user` int DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `type_formation` int DEFAULT NULL,
  `modify_by` int DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

--
-- Déchargement des données de la table `inscrits`
--

INSERT INTO `inscrits` (`id`, `nom`, `prenom`, `sexe`, `email`, `mobile_1`, `mobile_2`, `formation_id`, `objectif`, `statut`, `type`, `user`, `created_at`, `updated_at`, `type_formation`, `modify_by`) VALUES
(1, 'BARRO', 'IB', 0, 'barro.rahim@gmail.com', '12345678', NULL, 4, 'Test', 1, 0, 1, '2024-12-10 23:00:14', '2024-12-10 23:00:14', 0, NULL),
(2, 'OUEDRAOGO', 'ALI U-AUBEN MSI', 0, 'ibrahim.barro@me.bf', '7656789', NULL, 1, NULL, 2, 0, 1, '2024-12-11 20:10:25', '2024-12-13 22:34:57', 1, 2),
(3, 'TONDE', 'ADAMA', 0, 'adama@gmail.com', '73245632', NULL, 3, NULL, 1, 0, 2, '2024-12-11 20:26:38', '2024-12-13 22:37:18', 0, 2),
(4, 'PILABRE', 'OUMOUL KOULSOUM', 1, 'pilabre@gmail.com', '77678899', '9876578', 1, 'HJGHJHJKJKJKK', 2, 0, 2, '2024-12-14 14:33:26', '2024-12-15 10:10:48', 0, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL,
  `batch` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

--
-- Déchargement des données de la table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(3, '2014_10_12_200000_add_two_factor_columns_to_users_table', 1),
(4, '2019_08_19_000000_create_failed_jobs_table', 1),
(5, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(6, '2024_12_06_103952_create_sessions_table', 1),
(7, '2024_01_24_203050_create_roles_table', 2),
(8, '2024_01_24_203100_create_permissions_table', 2),
(9, '2024_12_06_121117_create_formations_table', 2),
(10, '2024_12_06_121148_create_paiements_table', 2),
(11, '2024_12_06_183749_create_formateurs_table', 3),
(12, '2024_12_06_183808_create_formation_formateurs_table', 3),
(15, '2024_12_07_011553_create_inscrits_table', 4),
(16, '2024_12_09_213552_add_coloumn_matiere_to_formateurs_table', 4),
(17, '2024_12_10_225301_add_column_to_inscrits_table', 5),
(19, '2024_12_11_105321_add_column_to_paiements_table', 6),
(20, '2024_12_13_224759_add_column_to_inscrits_table', 7),
(21, '2024_12_13_234642_add_column_to_formations_table', 8),
(22, '2024_12_14_155947_add_column_to_users_table', 9),
(23, '2024_12_15_122537_add_column_to_fomations_table', 10);

-- --------------------------------------------------------

--
-- Structure de la table `paiements`
--

DROP TABLE IF EXISTS `paiements`;
CREATE TABLE IF NOT EXISTS `paiements` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `formation_id` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL,
  `inscrit_id` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL,
  `montant` bigint NOT NULL,
  `reste` bigint NOT NULL,
  `user` int NOT NULL,
  `modify_by` int DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `tranche` int DEFAULT NULL,
  `code` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

--
-- Déchargement des données de la table `paiements`
--

INSERT INTO `paiements` (`id`, `formation_id`, `inscrit_id`, `montant`, `reste`, `user`, `modify_by`, `created_at`, `updated_at`, `tranche`, `code`) VALUES
(6, '4', '1', 10000, 60000, 2, NULL, '2024-12-11 21:19:10', '2024-12-11 21:19:10', 1, '01-4-2024'),
(7, '4', '1', 10000, 50000, 2, NULL, '2024-12-11 21:25:04', '2024-12-11 21:25:04', 1, '07-4-2024'),
(8, '4', '1', 20000, 30000, 2, NULL, '2024-12-11 21:25:23', '2024-12-11 21:25:23', 1, '08-4-2024'),
(9, '4', '1', 5000, 25000, 2, NULL, '2024-12-11 21:25:58', '2024-12-11 21:25:58', 1, '09-4-2024'),
(10, '1', '2', 40000, 520000, 2, 2, '2024-12-11 21:31:12', '2024-12-13 22:34:57', 1, '010-2-2024'),
(11, '1', '2', 25000, 495000, 2, 2, '2024-12-11 21:31:43', '2024-12-13 22:34:57', 1, '011-2-2024'),
(12, '1', '2', 495000, 0, 2, 2, '2024-12-11 21:34:18', '2024-12-13 22:34:57', 0, '012-2-2024'),
(13, '3', '3', 50000, 300000, 2, NULL, '2024-12-12 22:03:13', '2024-12-12 22:03:13', 1, '013-3-2024'),
(14, '3', '3', 25000, 275000, 2, NULL, '2024-12-12 22:04:28', '2024-12-12 22:04:28', 1, '014-3-2024'),
(15, '1', '4', 25000, 15000, 1, NULL, '2024-12-15 10:09:43', '2024-12-15 10:09:43', 1, '015-1-2024'),
(16, '1', '4', 10000, 5000, 1, NULL, '2024-12-15 10:10:20', '2024-12-15 10:10:20', 1, '016-1-2024'),
(17, '1', '4', 5000, 0, 1, NULL, '2024-12-15 10:10:48', '2024-12-15 10:10:48', 0, '017-1-2024');

-- --------------------------------------------------------

--
-- Structure de la table `password_reset_tokens`
--

DROP TABLE IF EXISTS `password_reset_tokens`;
CREATE TABLE IF NOT EXISTS `password_reset_tokens` (
  `email` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL,
  `token` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `permissions`
--

DROP TABLE IF EXISTS `permissions`;
CREATE TABLE IF NOT EXISTS `permissions` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL,
  `for` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

--
-- Déchargement des données de la table `permissions`
--

INSERT INTO `permissions` (`id`, `name`, `for`, `created_at`, `updated_at`) VALUES
(1, 'Creer Inscrit', 'inscription', '2024-12-11 17:39:35', '2024-12-11 17:39:35'),
(2, 'Liste Inscrit', 'inscription', '2024-12-11 17:41:23', '2024-12-11 17:41:23'),
(3, 'Creer Paiement', 'inscription', '2024-12-11 17:41:45', '2024-12-11 17:41:45'),
(4, 'Liste Paiement', 'inscription', '2024-12-11 17:41:55', '2024-12-11 17:41:55'),
(5, 'Creer Utilisateur', 'administration', '2024-12-11 17:42:13', '2024-12-11 17:42:13'),
(6, 'Liste Utilisateur', 'administration', '2024-12-11 17:42:24', '2024-12-11 17:42:24'),
(7, 'Modifier Utilisateur', 'administration', '2024-12-11 17:42:37', '2024-12-11 17:42:37'),
(8, 'Supprimer Utilisateur', 'administration', '2024-12-11 17:42:50', '2024-12-11 17:42:50'),
(9, 'Creer Role', 'administration', '2024-12-11 17:43:02', '2024-12-11 17:43:02'),
(10, 'Creer Permission', 'administration', '2024-12-11 17:43:14', '2024-12-11 17:43:14'),
(11, 'Dashboard', 'inscription', '2024-12-11 20:22:41', '2024-12-11 20:22:41'),
(12, 'Editer Paiement', 'inscription', '2024-12-11 20:41:39', '2024-12-14 20:14:52');

-- --------------------------------------------------------

--
-- Structure de la table `permission_role`
--

DROP TABLE IF EXISTS `permission_role`;
CREATE TABLE IF NOT EXISTS `permission_role` (
  `role_id` int NOT NULL,
  `permission_id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

--
-- Déchargement des données de la table `permission_role`
--

INSERT INTO `permission_role` (`role_id`, `permission_id`) VALUES
(1, 10),
(1, 9),
(1, 8),
(1, 7),
(1, 6),
(1, 5),
(1, 4),
(1, 3),
(1, 2),
(1, 1),
(2, 4),
(2, 3),
(2, 2),
(2, 1),
(3, 11),
(3, 4),
(3, 3),
(3, 12);

-- --------------------------------------------------------

--
-- Structure de la table `personal_access_tokens`
--

DROP TABLE IF EXISTS `personal_access_tokens`;
CREATE TABLE IF NOT EXISTS `personal_access_tokens` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `tokenable_type` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL,
  `tokenable_id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL,
  `token` varchar(64) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL,
  `abilities` text CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `roles`
--

DROP TABLE IF EXISTS `roles`;
CREATE TABLE IF NOT EXISTS `roles` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `nom` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

--
-- Déchargement des données de la table `roles`
--

INSERT INTO `roles` (`id`, `nom`, `created_at`, `updated_at`) VALUES
(1, 'Admin', '2024-12-11 17:44:38', '2024-12-11 17:44:38'),
(2, 'Manager', '2024-12-11 20:21:15', '2024-12-11 20:21:15'),
(3, 'Caisse', '2024-12-11 20:42:08', '2024-12-14 21:09:27');

-- --------------------------------------------------------

--
-- Structure de la table `role_user`
--

DROP TABLE IF EXISTS `role_user`;
CREATE TABLE IF NOT EXISTS `role_user` (
  `user_id` int NOT NULL,
  `role_id` int NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `role_user`
--

INSERT INTO `role_user` (`user_id`, `role_id`) VALUES
(7, 1),
(7, 2),
(7, 3),
(1, 1);

-- --------------------------------------------------------

--
-- Structure de la table `sessions`
--

DROP TABLE IF EXISTS `sessions`;
CREATE TABLE IF NOT EXISTS `sessions` (
  `id` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL,
  `user_id` bigint UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `user_agent` text CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci,
  `payload` longtext CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL,
  `last_activity` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `sessions_user_id_index` (`user_id`),
  KEY `sessions_last_activity_index` (`last_activity`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

--
-- Déchargement des données de la table `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('Gx9gXBd6Mzsc1IiMDQUBMyYAOMfA34DkWmf2fKvV', 1, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/131.0.0.0 Safari/537.36', 'YTo1OntzOjY6Il90b2tlbiI7czo0MDoiM1pPMjN3NlBXemt2UGFtTkxySnE3WGUwN3B2TlEwWHZnZU1KRkVSNCI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzE6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9kYXNoYm9hcmQiO31zOjUwOiJsb2dpbl93ZWJfNTliYTM2YWRkYzJiMmY5NDAxNTgwZjAxNGM3ZjU4ZWE0ZTMwOTg5ZCI7aToxO3M6MjE6InBhc3N3b3JkX2hhc2hfc2FuY3R1bSI7czo2MDoiJDJ5JDEwJHhJc1hVdFg2TmtWbFJVNldJdjBZb3VnUVdqYndFTGEzbWdoQmZ1UDlqSFJDeGZlOVNJbDFtIjt9', 1734264704),
('y7dEuJwfP3W52GUduJo75YdRFKeEiua6iiy84v55', 1, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/131.0.0.0 Safari/537.36', 'YTo1OntzOjY6Il90b2tlbiI7czo0MDoiQ3VRUXByZGlPMWd4MVZzSjA5aDE3bTZxanZ1azFVQUpYVG1OQ1RtNyI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzE6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9kYXNoYm9hcmQiO31zOjUwOiJsb2dpbl93ZWJfNTliYTM2YWRkYzJiMmY5NDAxNTgwZjAxNGM3ZjU4ZWE0ZTMwOTg5ZCI7aToxO3M6MjE6InBhc3N3b3JkX2hhc2hfc2FuY3R1bSI7czo2MDoiJDJ5JDEwJHhJc1hVdFg2TmtWbFJVNldJdjBZb3VnUVdqYndFTGEzbWdoQmZ1UDlqSFJDeGZlOVNJbDFtIjt9', 1734271620);

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL,
  `email` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL,
  `two_factor_secret` text CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci,
  `two_factor_recovery_codes` text CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci,
  `two_factor_confirmed_at` timestamp NULL DEFAULT NULL,
  `remember_token` varchar(100) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `current_team_id` bigint UNSIGNED DEFAULT NULL,
  `profile_photo_path` varchar(2048) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `prenom` varchar(255) COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `two_factor_secret`, `two_factor_recovery_codes`, `two_factor_confirmed_at`, `remember_token`, `current_team_id`, `profile_photo_path`, `created_at`, `updated_at`, `prenom`) VALUES
(1, 'BARRO', 'barro.rahim@gmail.com', NULL, '$2y$10$xIsXUtX6NkVlRU6WIv0YougQWjbwELa3mghBfuP9jHRCxfe9SIl1m', NULL, NULL, NULL, NULL, NULL, NULL, '2024-12-06 11:16:13', '2024-12-14 19:53:42', 'Ibrahim'),
(7, 'COMPAORE', 'elyse@gmail', NULL, '$2y$10$qx6EJO1XxNlJm.y0HThMGuv9qhJg7cA54kaekWYhA2fkEyrvUSvDC', NULL, NULL, NULL, NULL, NULL, NULL, '2024-12-14 15:15:28', '2024-12-14 19:53:04', 'Elysé');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
