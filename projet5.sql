-- phpMyAdmin SQL Dump
-- version 4.9.3
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost:8889
-- Généré le :  ven. 24 avr. 2020 à 20:11
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
(1, 1, 'jiji', 'ijij', '2010-03-25 16:49:53', 1),
(2, 1, 'M@teo21', 'M@teo22', '2010-03-25 16:57:16', 1),
(3, 1, 'jerk', 'jerk', '2010-03-25 17:12:52', 1),
(8, 1, 'M@teo21', 'M@teo22', '2020-04-02 13:32:22', 1),
(34, 1, 'M@teo21', 'M@teo22', '2020-04-08 14:03:03', 1),
(33, 1, 'M@teo21', 'M@teo22', '2020-04-08 14:02:51', 1),
(32, 1, 'M@teo21', 'M@teo22', '2020-04-08 11:10:24', 1),
(30, 1, 'M@teo21', 'M@teo22', '2020-04-07 21:12:36', 1),
(31, 1, 'M@teo21', 'M@teo22', '2020-04-07 21:12:51', 1);

-- --------------------------------------------------------

--
-- Structure de la table `posts`
--

CREATE TABLE `posts` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `content` text NOT NULL,
  `creation_date` datetime NOT NULL,
  `author` varchar(255) NOT NULL,
  `chapo` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `posts`
--

INSERT INTO `posts` (`id`, `title`, `content`, `creation_date`, `author`, `chapo`) VALUES
(1, 'Tout sur PHP !', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', '2020-04-18 13:53:06', 'Jérémy Maarek', '\"Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud\"');

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
(15, 'jerez', 'test2@me.com', 'jerez', 'jerez', '2020-04-18', 0, 0),
(16, 'tete', 'tete@me.com', 'tete', 'tete', '2020-04-19', 0, 0),
(18, 'valide', 'valide@me.com', 'valide', 'valide', '2020-04-24', NULL, 1);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT pour la table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
