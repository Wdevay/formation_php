-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : jeu. 22 fév. 2024 à 12:06
-- Version du serveur : 10.4.32-MariaDB
-- Version de PHP : 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `mvc_php`
--

-- --------------------------------------------------------

--
-- Structure de la table `contact`
--

CREATE TABLE `contact` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `name` varchar(80) NOT NULL,
  `firstname` varchar(80) NOT NULL,
  `adress` varchar(255) NOT NULL,
  `adress2` varchar(255) NOT NULL,
  `city` varchar(80) NOT NULL,
  `state` varchar(80) NOT NULL,
  `code_postal` varchar(80) NOT NULL,
  `message` text NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `contact`
--

INSERT INTO `contact` (`id`, `user_id`, `name`, `firstname`, `adress`, `adress2`, `city`, `state`, `code_postal`, `message`, `created_at`) VALUES
(1, 1, 'vfdgdfsg', 'gfdsgsdfgsdfg', '1234 rue jean valjean', 'ds', 'dsqdzqd', 'Guadeloupe', 'dsqgdsqfds', 'qsdqsdqsd', '2024-02-21 16:33:05'),
(2, 2, 'fdgdf', 'gsgsg', 'dsqfqsg', '', 'dzqsdqzsd', 'Guyane', 'dqsffgsg', 'dsqdsqdsqd', '2024-02-22 09:53:19');

-- --------------------------------------------------------

--
-- Structure de la table `post`
--

CREATE TABLE `post` (
  `id` int(11) NOT NULL,
  `title` varchar(80) NOT NULL,
  `description` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `post`
--

INSERT INTO `post` (`id`, `title`, `description`, `image`, `created_at`) VALUES
(1, 'Mon premier article de blog', ' Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce hendrerit tortor eget nunc tincidunt gravida. Donec faucibus neque ut magna fringilla placerat. Suspendisse aliquam massa quis magna euismod faucibus. Proin vitae ullamcorper felis. Sed ut ia', 'https://cdn.pixabay.com/photo/2023/11/20/10/40/vietnam-8400803_960_720.jpg', '2024-02-20 11:25:14'),
(2, 'Mon deuxieme article de blog ', 'Aliquam iaculis erat ac sapien posuere, a pulvinar ex maximus. Morbi varius vestibulum est, non pellentesque ligula molestie quis. Nullam quis velit pellentesque, aliquet nisl eu, vehicula tellus. Donec efficitur diam et ex placerat dictum. Suspendisse vi', 'https://cdn.pixabay.com/photo/2024/01/09/14/44/cow-8497722_960_720.jpg', '2024-02-20 11:29:07'),
(3, 'Mon troisième article de blog', 'Donec ut congue tellus. Aenean in porta libero. Curabitur eu est vulputate, euismod diam eu, auctor arcu. Cras bibendum laoreet purus. In nec libero scelerisque magna egestas pulvinar non eu enim. Suspendisse ultrices magna metus, sit amet consequat metus', 'https://cdn.pixabay.com/photo/2023/09/29/06/57/mountain-8283084_960_720.jpg', '2024-02-20 11:29:07'),
(4, 'Mon quatrième article de blog', 'Pellentesque ultricies, est non gravida auctor, mauris nisl aliquet diam, vel porttitor enim eros et eros. Vestibulum imperdiet nisi vitae odio convallis ornare. Etiam convallis urna eget orci hendrerit malesuada tincidunt accumsan risus. Fusce euismod sa', 'https://cdn.pixabay.com/photo/2023/07/22/09/04/european-shorthair-8142967_960_720.jpg', '2024-02-20 11:29:07'),
(5, 'Mon cinquième article de blog', 'Nulla facilisi. Nullam suscipit sollicitudin sapien, maximus porttitor metus. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla mi arcu, volutpat non metus sed, interdum finibus diam. Aliquam tortor massa, facilisis id magna eget, bibendum po', 'https://cdn.pixabay.com/photo/2024/01/04/21/54/volcano-8488486_960_720.jpg', '2024-02-20 11:30:24'),
(6, 'Nouveau post', 'Cras accumsan, libero sit amet mattis maximus, sapien massa sollicitudin orci, in ornare turpis turpis in dolor. Morbi ut auctor massa. Proin ullamcorper aliquet orci, eu egestas risus interdum in. Ut consequat tempus faucibus. Nam varius nisi ut congue t', 'https://cdn.pixabay.com/photo/2023/06/14/02/18/flowers-8062135_960_720.jpg', '2024-02-20 15:16:55');

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `email` varchar(80) NOT NULL,
  `password` varchar(255) NOT NULL,
  `roles` varchar(255) NOT NULL DEFAULT '[]',
  `regisered_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `user`
--

INSERT INTO `user` (`id`, `email`, `password`, `roles`, `regisered_at`) VALUES
(1, 'ddqsdqsdz@me.co', '$2y$10$8k3yPJoperKnv8kRTIF2R.H5FHhZS/PPIIdRrjE..9tvLVyHYTi.G', '[]', '2024-02-21 16:33:05'),
(2, 'dz@me.co', '$2y$10$segdYmzoXWhXhU/YzWAMEuZTD9d2vdGKmSmCcxUuic74MgpVIZwmi', '[]', '2024-02-22 09:53:19');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_contact_user` (`user_id`);

--
-- Index pour la table `post`
--
ALTER TABLE `post`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `contact`
--
ALTER TABLE `contact`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `post`
--
ALTER TABLE `post`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT pour la table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `contact`
--
ALTER TABLE `contact`
  ADD CONSTRAINT `fk_contact_user` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
