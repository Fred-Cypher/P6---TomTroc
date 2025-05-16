-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost:3306
-- Généré le : ven. 16 mai 2025 à 14:22
-- Version du serveur : 5.7.33
-- Version de PHP : 8.3.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `tomtroc`
--

-- --------------------------------------------------------

--
-- Structure de la table `books`
--

CREATE TABLE `books` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `author` varchar(255) NOT NULL,
  `comment` text NOT NULL,
  `cover` varchar(255) DEFAULT NULL,
  `availability` tinyint(1) DEFAULT '1',
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `user_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `books`
--

INSERT INTO `books` (`id`, `title`, `author`, `comment`, `cover`, `availability`, `created_at`, `updated_at`, `user_id`) VALUES
(36, 'Sherlock, une vie', 'Sherlock Holmes', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Culpa modi consequatur recusandae eos, reiciendis maiores possimus aliquam cupiditate dolore laudantium velit molestias iure obcaecati sunt! Dolorum ex modi deleniti dignissimos.\r\n\r\nCulpa modi consequatur recusandae eos, reiciendis maiores possimus aliquam cupiditate dolore laudantium velit molestias iure obcaecati sunt! Dolorum ex modi deleniti dignissimos.\r\n\r\nLorem ipsum dolor sit amet consectetur adipisicing elit. Culpa modi consequatur recusandae eos, reiciendis maiores possimus aliquam cupiditate dolore laudantium velit molestias iure obcaecati sunt! Dolorum ex modi deleniti dignissimos.\r\n\r\nCulpa modi consequatur recusandae eos, reiciendis maiores possimus aliquam cupiditate dolore laudantium velit molestias iure obcaecati sunt! Dolorum ex modi deleniti dignissimos.\r\n\r\nLorem ipsum dolor sit amet consectetur adipisicing elit. Culpa modi consequatur recusandae eos, reiciendis maiores possimus aliquam cupiditate dolore laudantium velit molestias iure obcaecati sunt! Dolorum ex modi deleniti dignissimos.', 'f8d5c1ac1c2ca27df4c21a074ec3a013.webp', 1, '2025-03-05 11:21:30', '2025-03-05 11:21:30', 10),
(37, 'Le prince des nuages', 'Christophe Galfard', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Culpa modi consequatur recusandae eos, reiciendis maiores possimus aliquam cupiditate dolore laudantium velit molestias iure obcaecati sunt! Dolorum ex modi deleniti dignissimos.', '66866cdb9d1254c05729e034afe5b848.webp', 1, '2025-03-05 11:24:11', '2025-03-05 11:24:11', 11),
(38, 'Harry Potter à l\'école des sorciers ', 'J. K. Rowling', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Culpa modi consequatur recusandae eos, reiciendis maiores possimus aliquam cupiditate dolore laudantium velit molestias iure obcaecati sunt! Dolorum ex modi deleniti dignissimos.', 'de6440c1274070d977169fb330a54922.webp', 1, '2025-03-05 11:25:20', '2025-03-05 11:25:20', 11),
(39, 'Le chien des Baskerville', 'Arthur Conan Doyle', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Culpa modi consequatur recusandae eos, reiciendis maiores possimus aliquam cupiditate dolore laudantium velit molestias iure obcaecati sunt! Dolorum ex modi deleniti dignissimos.\r\nLorem ipsum dolor sit amet consectetur adipisicing elit. \r\n\r\n Lorem ipsum dolor sit amet consectetur adipisicing elit. Culpa modi consequatur recusandae eos, reiciendis maiores possimus aliquam cupiditate dolore laudantium velit molestias iure obcaecati sunt! Dolorum ex modi deleniti dignissimos.\r\nLorem ipsum dolor sit amet consectetur adipisicing elit.\r\n\r\n Lorem ipsum dolor sit amet consectetur adipisicing elit. Culpa modi consequatur recusandae eos, reiciendis maiores possimus aliquam cupiditate dolore laudantium velit molestias iure obcaecati sunt! Dolorum ex modi deleniti dignissimos.\r\nLorem ipsum dolor sit amet consectetur adipisicing elit.\r\n\r\n Lorem ipsum dolor sit amet consectetur adipisicing elit. Culpa modi consequatur recusandae eos, reiciendis maiores possimus aliquam cupiditate dolore laudantium velit molestias iure obcaecati sunt! Dolorum ex modi deleniti dignissimos.\r\nLorem ipsum dolor sit amet consectetur adipisicing elit.                                                                                ', 'c08a08d514ed936db71864558935d71d.webp', 1, '2025-03-05 11:26:37', '2025-05-16 12:22:07', 9),
(40, 'D\'un monde à l\'autre', 'Pierre Bottero', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Culpa modi consequatur recusandae eos, reiciendis maiores possimus aliquam cupiditate dolore laudantium velit molestias iure obcaecati sunt! Dolorum ex modi deleniti dignissimos.', 'bfc466bf2c90b0247fb12c93e8f898dd.webp', 1, '2025-03-05 11:27:15', '2025-03-05 11:27:15', 9),
(41, 'Ellena l\'envol', 'Pierre Bottero', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Culpa modi consequatur recusandae eos, reiciendis maiores possimus aliquam cupiditate dolore laudantium velit molestias iure obcaecati sunt! Dolorum ex modi deleniti dignissimos.', '6f0ef0a84fbe50a059612f61a3e0c448.webp', 0, '2025-03-05 11:27:56', '2025-03-05 11:27:56', 9),
(42, 'Le garçon qui voulait courir vite', 'Pierre Bottero', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Culpa modi consequatur recusandae eos, reiciendis maiores possimus aliquam cupiditate dolore laudantium velit molestias iure obcaecati sunt! Dolorum ex modi deleniti dignissimos.', '0788d3f1e7de21097f6935e9e2c29428.webp', 1, '2025-03-05 11:28:41', '2025-03-05 11:28:41', 9),
(43, 'Le chant du Troll', 'Pierre Bottero', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Culpa modi consequatur recusandae eos, reiciendis maiores possimus aliquam cupiditate dolore laudantium velit molestias iure obcaecati sunt! Dolorum ex modi deleniti dignissimos.', '61536d8f6fdd48096db0a99a01ca50a8.webp', 0, '2025-03-05 11:29:12', '2025-03-05 11:29:12', 9);

-- --------------------------------------------------------

--
-- Structure de la table `conversations`
--

CREATE TABLE `conversations` (
  `id` int(11) NOT NULL,
  `user1_id` int(11) DEFAULT NULL,
  `user2_id` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `user_hash` char(64) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `conversations`
--

INSERT INTO `conversations` (`id`, `user1_id`, `user2_id`, `created_at`, `user_hash`) VALUES
(1, 9, 11, '2025-03-27 14:21:21', 'f1bb101f0e59f5db6c621117c3b758fb79a6d33bfa0b27c36474abff5473497b'),
(2, 9, 10, '2025-03-27 15:14:08', '3dedff63b0e5c993dd233e8ee066783e359c40a546aa0d4740f19eecdc1b4a28'),
(3, 10, 11, '2025-04-03 09:31:24', '45da1b666c9edd5a79a75acca0673a7bd525a2ae06f46eea47666208db0f9801'),
(6, 12, 9, '2025-05-09 04:57:27', '9909580d47cd00dc1f53b5129a728021970df959ff10533e2a76ba237862d5ad');

-- --------------------------------------------------------

--
-- Structure de la table `messages`
--

CREATE TABLE `messages` (
  `id` int(11) NOT NULL,
  `conversation_id` int(11) NOT NULL,
  `sender_id` int(11) DEFAULT NULL,
  `content` text NOT NULL,
  `is_read` tinyint(1) DEFAULT '0',
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `messages`
--

INSERT INTO `messages` (`id`, `conversation_id`, `sender_id`, `content`, `is_read`, `created_at`) VALUES
(5, 1, 9, 'Lorem ipsum dolor sit amet, consectetur .adipiscing elit, sed do eiusmod tempor ', 1, '2025-03-28 14:46:05'),
(17, 2, 9, 'Lorem ipsum dolor sit amet, consectetur .adipiscing elit, sed do eiusmod tempor ', 0, '2025-03-31 09:57:52'),
(19, 1, 11, 'Lorem ipsum dolor sit amet, consectetur .adipiscing elit, sed do eiusmod tempor ', 1, '2025-04-01 08:37:19'),
(21, 1, 9, 'Lorem ipsum dolor sit amet, consectetur .adipiscing elit, sed do eiusmod tempor ', 1, '2025-04-01 09:16:59'),
(22, 2, 10, 'Lorem ipsum dolor sit amet, consectetur .adipiscing elit, sed do eiusmod tempor ', 1, '2025-04-01 09:17:40'),
(23, 1, 11, 'Lorem ipsum dolor sit amet, consectetur .adipiscing elit, sed do eiusmod tempor ', 1, '2025-04-01 09:19:15'),
(24, 1, 9, 'Lorem ipsum dolor sit amet, consectetur .adipiscing elit, sed do eiusmod tempor ', 1, '2025-04-01 09:26:34'),
(25, 1, 11, 'Lorem ipsum dolor sit amet, consectetur .adipiscing elit, sed do eiusmod tempor ', 1, '2025-04-02 08:59:13'),
(26, 3, 10, 'Lorem ipsum dolor sit amet, consectetur .adipiscing elit, sed do eiusmod tempor ', 1, '2025-04-03 09:31:39'),
(27, 3, 10, 'Lorem ipsum dolor sit amet, consectetur .adipiscing elit, sed do eiusmod tempor ', 1, '2025-04-03 09:34:30'),
(29, 2, 9, 'Lorem ipsum dolor sit amet, consectetur .adipiscing elit, sed do eiusmod tempor ', 0, '2025-04-07 08:57:54'),
(30, 1, 9, 'Lorem ipsum dolor sit amet, consectetur .adipiscing elit, sed do eiusmod tempor ', 1, '2025-04-16 09:45:51'),
(31, 1, 11, 'Lorem ipsum dolor sit amet, consectetur .adipiscing elit, sed do eiusmod tempor ', 1, '2025-04-22 08:47:18'),
(32, 1, 11, 'Lorem ipsum dolor sit amet, consectetur .adipiscing elit, sed do eiusmod tempor ', 1, '2025-04-30 08:22:00'),
(33, 1, 9, 'Lorem ipsum dolor sit amet, consectetur .adipiscing elit, sed do eiusmod tempor ', 1, '2025-05-01 13:21:28'),
(35, 6, 12, 'Lorem ipsum dolor sit amet, consectetur .adipiscing elit, sed do eiusmod tempor ', 1, '2025-05-09 04:57:33'),
(38, 6, 9, 'Lorem ipsum dolor sit amet, consectetur .adipiscing elit, sed do eiusmod tempor ', 1, '2025-05-14 09:28:35');

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `pseudo` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `avatar` varchar(255) DEFAULT NULL,
  `role` varchar(50) DEFAULT 'User',
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id`, `pseudo`, `email`, `password`, `avatar`, `role`, `created_at`, `updated_at`) VALUES
(0, 'Utilisateur supprimé', '', '', NULL, 'ROLE_USER', '2025-03-12 12:36:09', '2025-03-12 12:36:09'),
(9, 'Admin', 'admin@test.com', '$2y$10$SJUTYeC7evdJjDE1tlLWge6HpgD1LMtTHRDaaX.c5mmNyYeQgHW3W', '2d55eaf598783af5bb824f4b68119374.webp', 'ROLE_ADMIN', '2025-03-05 10:58:39', '2025-05-16 03:44:18'),
(10, 'Sherlock', 'sherlock@test.com', '$2y$10$Jn4JrQ0hO7.r49yTCFLQYeH.wZNWKta4xgEMmeaTDg8Hq9T9I0wTm', '7bf329be3553ed8f0acc80df8456aa28.webp', 'ROLE_USER', '2025-03-05 10:59:24', '2025-05-16 03:58:18'),
(11, 'John', 'john@test.com', '$2y$10$K9XmCnR1VGFawkjB2bTID.lUW.VHoXC6LtVjEoViHDzJQSDKigWWi', '88323fd68fc864640ace27c2d7d6b4d3.webp', 'ROLE_USER', '2025-03-05 10:59:39', '2025-03-05 11:22:39'),
(12, 'James', 'james@test.com', '$2y$10$T55HWvvzDGBRkzD4i20N0OiLYIfmhOoVSFTM1KGOpixxxwU1u8rqq', 'e1eb0ad87ad396be820895e1b1c716e9.webp', 'ROLE_USER', '2025-03-07 05:52:01', '2025-03-07 05:53:40');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `books`
--
ALTER TABLE `books`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Index pour la table `conversations`
--
ALTER TABLE `conversations`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user1_id` (`user1_id`),
  ADD KEY `user2_id` (`user2_id`);

--
-- Index pour la table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`id`),
  ADD KEY `conversation_id` (`conversation_id`),
  ADD KEY `sender_id` (`sender_id`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `books`
--
ALTER TABLE `books`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT pour la table `conversations`
--
ALTER TABLE `conversations`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT pour la table `messages`
--
ALTER TABLE `messages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `books`
--
ALTER TABLE `books`
  ADD CONSTRAINT `books_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Contraintes pour la table `conversations`
--
ALTER TABLE `conversations`
  ADD CONSTRAINT `conversations_ibfk_1` FOREIGN KEY (`user1_id`) REFERENCES `users` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `conversations_ibfk_2` FOREIGN KEY (`user2_id`) REFERENCES `users` (`id`) ON DELETE SET NULL;

--
-- Contraintes pour la table `messages`
--
ALTER TABLE `messages`
  ADD CONSTRAINT `messages_ibfk_1` FOREIGN KEY (`conversation_id`) REFERENCES `conversations` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `messages_ibfk_2` FOREIGN KEY (`sender_id`) REFERENCES `users` (`id`) ON DELETE SET NULL;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
