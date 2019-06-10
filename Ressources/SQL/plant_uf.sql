-- phpMyAdmin SQL Dump
-- version 4.6.6deb4
-- https://www.phpmyadmin.net/
--
-- Client :  localhost:3306
-- Généré le :  Lun 10 Juin 2019 à 17:30
-- Version du serveur :  10.1.38-MariaDB-0+deb9u1
-- Version de PHP :  7.0.33-0+deb9u3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `plant_uf`
--
CREATE DATABASE IF NOT EXISTS `plant_uf` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `plant_uf`;

-- --------------------------------------------------------

--
-- Structure de la table `datas`
--

DROP TABLE IF EXISTS `datas`;
CREATE TABLE `datas` (
  `data_id` int(11) NOT NULL,
  `data_luminosity` float NOT NULL,
  `data_humidity` float NOT NULL,
  `data_temperature` float NOT NULL,
  `data_timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `uplant_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `datas`
--

INSERT INTO `datas` (`data_id`, `data_luminosity`, `data_humidity`, `data_temperature`, `data_timestamp`, `uplant_id`) VALUES
(1, 84, 4, -10, '2019-06-10 00:31:42', 1),
(2, 0, -300, 350, '2019-06-10 00:17:23', 3);

-- --------------------------------------------------------

--
-- Structure de la table `plants`
--

DROP TABLE IF EXISTS `plants`;
CREATE TABLE `plants` (
  `plant_id` int(11) NOT NULL,
  `plant_name` varchar(255) NOT NULL,
  `plant_category` varchar(255) NOT NULL,
  `plant_photo` varchar(1000) NOT NULL,
  `plant_description` text NOT NULL,
  `plant_luminosity_min` float NOT NULL,
  `plant_luminosity_max` float NOT NULL,
  `plant_humidity_min` float NOT NULL,
  `plant_humidity_max` float NOT NULL,
  `plant_temperature_min` float NOT NULL,
  `plant_temperature_max` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `plants`
--

INSERT INTO `plants` (`plant_id`, `plant_name`, `plant_category`, `plant_photo`, `plant_description`, `plant_luminosity_min`, `plant_luminosity_max`, `plant_humidity_min`, `plant_humidity_max`, `plant_temperature_min`, `plant_temperature_max`) VALUES
(1, 'Rose', 'Arbuste', 'https://www.meillandrichardier.com/media/catalog/product/cache/1/image/800x800/040ec09b1e35df139433887a97daa66f/0/5/0522-2919b-rosier-monica-bellucci-meimonkeur-ho-t1000.jpg', 'La description de la rose', 50, 100, 60, 90, -20, 30),
(2, 'Mimosa', 'Arbre', 'http://www.plantes-ornementales.com/photos/a-saligna.jpg', 'Acacia saligna est une espèce de culture facile donnant un grand nombre graines fertiles germant rapidement , elle est même devenu un problème dans certaines régions car elle devient envahissante . Supportant les embruns et les conditions difficiles , elle peut être plantée sur les dunes .', 70, 100, 10, 30, 0, 30),
(3, 'Othonna cheirifolia   L. ', 'Plantes grasses', 'http://www.plantes-ornementales.com/photos/o-cheirifolia.jpg', 'Même en dehors de la période de floraison l\'Othonna reste décoratif par son feuillage bleuté . Plante sans problème particulier . Bonne résistance à la sécheresse .', 60, 100, 0, 50, -12, 30),
(4, 'Bananier', 'Plantes exotiques', 'https://www.promessedefleurs.com/media/catalog/product/cache/1/image/9df78eab33525d08d6e5fb8d27136e95/M/u/Musa-basjoo-78039-1.jpg', 'Les bananiers, Musa, sont un genre de plantes monocotylédones vivaces de la famille des Musaceae dont les fruits, en général, sont les bananes. Le bananier, contrairement aux apparences, n\'est pas un arbre mais une plante herbacée.', 80, 100, 90, 100, 5, 40),
(5, 'Papyrus d\'Egypte', 'Plantes aquatiques', 'https://media.ooreka.fr/public/image/plant/526/mainImage-source-12011713.jpg', 'Le papyrus est une belle plante, à l’aise en milieu humide, que ce soit en bassin, au bord d’une rivière ou en bac avec un fond d’eau.', 75, 100, 85, 100, 5, 40);

-- --------------------------------------------------------

--
-- Structure de la table `uplants`
--

DROP TABLE IF EXISTS `uplants`;
CREATE TABLE `uplants` (
  `uplant_id` int(11) NOT NULL,
  `uplant_name` varchar(255) NOT NULL,
  `user_id` int(11) NOT NULL,
  `plant_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `uplants`
--

INSERT INTO `uplants` (`uplant_id`, `uplant_name`, `user_id`, `plant_id`) VALUES
(1, 'guy', 1, 1),
(3, 'jerry', 1, 2),
(8, 'noah', 2, 1),
(10, 'stich', 1, 1),
(11, 'freddy', 2, 4),
(13, 'mercury', 2, 3),
(20, 'cheguevara', 1, 5),
(21, 'salameche', 2, 3);

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `user_username` varchar(255) NOT NULL,
  `user_password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `users`
--

INSERT INTO `users` (`user_id`, `user_username`, `user_password`) VALUES
(1, 'emma', '00a809937eddc44521da9521269e75c6'),
(2, 'antoine', '0e5091a25295e44fea9957638527301f');

--
-- Index pour les tables exportées
--

--
-- Index pour la table `datas`
--
ALTER TABLE `datas`
  ADD PRIMARY KEY (`data_id`),
  ADD KEY `FK_uplant_id` (`uplant_id`);

--
-- Index pour la table `plants`
--
ALTER TABLE `plants`
  ADD PRIMARY KEY (`plant_id`);

--
-- Index pour la table `uplants`
--
ALTER TABLE `uplants`
  ADD PRIMARY KEY (`uplant_id`),
  ADD KEY `FK_user_id` (`user_id`),
  ADD KEY `FK_plant_id` (`plant_id`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `datas`
--
ALTER TABLE `datas`
  MODIFY `data_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT pour la table `plants`
--
ALTER TABLE `plants`
  MODIFY `plant_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT pour la table `uplants`
--
ALTER TABLE `uplants`
  MODIFY `uplant_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `datas`
--
ALTER TABLE `datas`
  ADD CONSTRAINT `FK_uplant_id` FOREIGN KEY (`uplant_id`) REFERENCES `uplants` (`uplant_id`);

--
-- Contraintes pour la table `uplants`
--
ALTER TABLE `uplants`
  ADD CONSTRAINT `FK_plant_id` FOREIGN KEY (`plant_id`) REFERENCES `plants` (`plant_id`),
  ADD CONSTRAINT `FK_user_id` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
