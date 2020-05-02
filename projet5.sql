-- phpMyAdmin SQL Dump
-- version 4.9.3
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost:8889
-- Généré le :  sam. 02 mai 2020 à 12:30
-- Version du serveur :  5.7.26
-- Version de PHP :  7.4.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Base de données :  `test`
--

-- --------------------------------------------------------

--
-- Structure de la table `comments`
--

CREATE TABLE `comments` (
  `id` int(11) NOT NULL,
  `post_id` int(11) NOT NULL,
  `author` varchar(255) NOT NULL,
  `comment` text NOT NULL,
  `comment_date` datetime NOT NULL,
  `is_activated` tinyint(1) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `comments`
--

INSERT INTO `comments` (`id`, `post_id`, `author`, `comment`, `comment_date`, `is_activated`) VALUES
(1, 33, 'admin', 'Top', '2020-04-25 13:21:18', 1),
(2, 33, 'admin', 'd', '2020-04-25 14:51:33', 1),
(3, 33, 'admin', '3', '2020-04-25 14:54:57', 1),
(4, 33, 'fr', 'fr', '2020-04-25 22:37:13', 1),
(5, 33, 'admin', 'coc', '2020-04-27 10:41:59', 1),
(6, 33, 'admin', 'admin', '2020-04-27 14:12:43', 1),
(7, 33, 'YES', 'YES', '2020-04-27 14:13:05', 1),
(8, 37, 'admin', 'jojo', '2020-04-29 21:40:00', 1),
(9, 37, 'admin', 'tt', '2020-04-30 10:31:28', 1),
(10, 37, 'admin', 'yes', '2020-04-30 22:17:01', 1),
(11, 42, 'dede', 'de', '2020-05-01 10:10:02', 1),
(12, 43, 'admin', '33', '2020-05-01 14:23:46', 1),
(13, 42, 'admin', '2', '2020-05-01 20:54:13', NULL),
(14, 42, 'admin', 'AAA', '2020-05-01 20:54:50', NULL),
(15, 43, 'Moi', 'Coucou', '2020-05-02 09:17:35', 1),
(16, 43, 'admin', 'oui', '2020-05-02 09:47:24', 1),
(17, 43, 'admin', 'POO', '2020-05-02 11:34:49', 1),
(18, 43, 'admin', 'POO2', '2020-05-02 12:54:58', 1),
(19, 43, 'admin', 'testval', '2020-05-02 13:06:13', 1),
(20, 43, 'admin', 'tee', '2020-05-02 13:07:01', 1),
(21, 42, 'admin', '222', '2020-05-02 13:08:48', 1);

-- --------------------------------------------------------

--
-- Structure de la table `posts`
--

CREATE TABLE `posts` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `content` longtext NOT NULL,
  `creation_date` datetime NOT NULL,
  `author` varchar(255) NOT NULL,
  `chapo` mediumtext NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `posts`
--

INSERT INTO `posts` (`id`, `title`, `content`, `creation_date`, `author`, `chapo`) VALUES
(42, '2', '2', '2020-04-30 22:09:11', '2', '2'),
(43, '3', '3', '2020-05-01 10:16:46', '3', '3');

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `pseudo` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `prenom` varchar(255) NOT NULL,
  `pass` varchar(255) NOT NULL,
  `date_inscription` date NOT NULL,
  `admin` tinyint(1) DEFAULT NULL,
  `is_activated` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id`, `pseudo`, `email`, `prenom`, `pass`, `date_inscription`, `admin`, `is_activated`) VALUES
(13, 'admin', 'jeremy@me.com', 'admin', 'admin', '2020-04-06', 1, 1),
(14, 'ju', 'ju@ju.com', 'ju', 'ju', '2020-04-08', 1, 1),
(15, 'jerez', 'test2@me.com', 'jerez', 'jerez', '2020-04-18', 1, 1),
(16, 'tete', 'tete@me.com', 'tete', 'tete', '2020-04-19', 0, 1),
(18, 'valide', 'valide@me.com', 'valide', 'valide', '2020-04-24', 1, 1),
(19, 'milan', 'coucou@me.com', 'milan', 'milan', '2020-04-25', 1, 1),
(20, 'ardu', 'var@me.com', 'ardu', 'ardu', '2020-04-30', 1, 1),
(21, 'dede', 'dede@m.com', 'dede', 'dede', '2020-05-01', 1, 1),
(22, 'testclass', 'testclass@me.com', 'testclass', 'testclass', '2020-05-01', NULL, 1),
(23, 'JEJE', 'LAST@me.com', 'JEJE', 'JEJE', '2020-05-02', NULL, 1);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT pour la table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;