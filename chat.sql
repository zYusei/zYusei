-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : dim. 09 jan. 2022 à 17:25
-- Version du serveur : 10.4.22-MariaDB
-- Version de PHP : 8.1.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `chat`
--

-- --------------------------------------------------------

--
-- Structure de la table `messageprive`
--

CREATE TABLE `messageprive` (
  `id` int(11) NOT NULL,
  `message` text NOT NULL,
  `id_destinataire` int(11) NOT NULL,
  `id_auteur` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `messageprive`
--

INSERT INTO `messageprive` (`id`, `message`, `id_destinataire`, `id_auteur`) VALUES
(71, 'Salut Valentio, ça va ?', 1, 13),
(72, 'Oui ça va et toi ?', 13, 1),
(73, 'Salut Laurent, ça va ?', 14, 1),
(74, 'Salut ça va ?', 2, 1),
(75, 'Salut, vous allez bien ?', 13, 16);

-- --------------------------------------------------------

--
-- Structure de la table `messages`
--

CREATE TABLE `messages` (
  `id` int(11) NOT NULL,
  `pseudo` varchar(50) NOT NULL,
  `message` varchar(1000) NOT NULL,
  `date` datetime NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `messages`
--

INSERT INTO `messages` (`id`, `pseudo`, `message`, `date`) VALUES
(45, 'Paul', 'azerty', '2022-01-03 09:19:12'),
(44, 'Fred', 'Super test', '2021-11-19 01:29:39'),
(43, 'test', 'test', '2021-11-18 09:12:03'),
(42, 'Fred', 'On test le chat', '2021-11-16 08:33:32'),
(46, 'Fred', 'Salut', '2022-01-03 09:37:26'),
(47, 'test', 'test', '2022-01-07 08:29:52'),
(48, 'Laurent', 'Salut tout le monde', '2022-01-07 08:47:00'),
(49, 'Valentio', 'Bonjour', '2022-01-07 09:23:12');

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `pseudo` varchar(255) NOT NULL,
  `mdp` varchar(255) NOT NULL,
  `nom` varchar(255) NOT NULL,
  `prenom` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id`, `pseudo`, `mdp`, `nom`, `prenom`) VALUES
(1, 'Valentio', '12345', 'Tenison', 'Valentio'),
(2, 'Goku', 'mdp', 'San', 'Goku'),
(10, 'Itachi$', 'mdp', 'Uchiwa', 'Itachi'),
(13, 'Warlock29', 'warlock29', 'Dupont', 'Francis'),
(14, 'Laurent', 'laurent123', 'Paul', 'Laurent'),
(16, 'Bernard', 'lol123', 'Dacosta', 'Bernard');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `messageprive`
--
ALTER TABLE `messageprive`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `messages`
--
ALTER TABLE `messages`
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
-- AUTO_INCREMENT pour la table `messageprive`
--
ALTER TABLE `messageprive`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=76;

--
-- AUTO_INCREMENT pour la table `messages`
--
ALTER TABLE `messages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=80;

--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
