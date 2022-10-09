-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : dim. 09 oct. 2022 à 23:51
-- Version du serveur : 10.4.17-MariaDB
-- Version de PHP : 8.0.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `zoorifics_animals`
--

-- --------------------------------------------------------

--
-- Structure de la table `activities`
--

CREATE TABLE `activities` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `schedule` varchar(255) NOT NULL,
  `employee_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `activities`
--

INSERT INTO `activities` (`id`, `name`, `description`, `schedule`, `employee_id`) VALUES
(1, 'Visite à la ferme', 'Vous êtes invités à aider le personnel du zoo à prendre soin des animaux de la ferme.', 'Samedi : 10h-12h', 1),
(2, 'Poney club', 'Vous êtes invité à faire une petite ballade à cheval dans le zoo', 'Samedi : 14h-16h', 1),
(3, 'Spectacle équestre', 'Venez assister à notre spectacle équestre. Il y a même des sauts d\'obstacles !', 'Lundi : 10h-12h', 1),
(4, 'Les maîtres des airs', 'Venez assister à un spectacle d\'oiseaux !', 'Lundi : 14h-16h', 1),
(5, 'Spectacle aquatique de dauphins', 'Venez assister à notre spectacle aquatique de dauphins', 'Mardi : 10h-12h', 1),
(6, 'Spectacle aquatique d\'orques', 'Venez assister à notre spectacle aquatique d\'orques', 'Mercredi : 10h-12h', 1),
(7, 'Spectacle aquatique d\'otaries', 'Venez assister à notre spectacle aquatique d\'otaries', 'Jeudi : 10h-12h', 1),
(8, 'La course du guépard', 'Vous pourrez voir des guépard lancés au grand gallot !', 'Mardi : 14h-16h', 1),
(9, 'Spectacle de tigres', 'Venez assister à notre spectacle de tigres', 'Mercredi : 14h-16h', 1),
(10, 'Spectacle de lions', 'Venez assister à notre spectacle de lions', 'Jeudi : 14h-16h', 1),
(11, 'Dressage de chiens', 'Venez assister à notre spectacle de chiens', 'Vendredi : 14h-16h', 1),
(12, 'Spectacle d\'éléphants', 'Venez assister à notre spectacle d\'éléphants', 'Vendredi : 10h-12h', 1);

-- --------------------------------------------------------

--
-- Structure de la table `activity_animal`
--

CREATE TABLE `activity_animal` (
  `activity_id` int(11) NOT NULL,
  `animal_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `activity_animal`
--

INSERT INTO `activity_animal` (`activity_id`, `animal_id`) VALUES
(4, 1),
(4, 3);

-- --------------------------------------------------------

--
-- Structure de la table `animals`
--

CREATE TABLE `animals` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `breed_id` int(11) NOT NULL,
  `born_at` date NOT NULL,
  `sexe` tinyint(1) NOT NULL,
  `weight` decimal(10,2) NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `medical_status` text DEFAULT NULL,
  `last_medical_check_at` date NOT NULL,
  `next_medical_check_at` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `animals`
--

INSERT INTO `animals` (`id`, `name`, `breed_id`, `born_at`, `sexe`, `weight`, `image`, `medical_status`, `last_medical_check_at`, `next_medical_check_at`) VALUES
(1, 'Nyx', 32, '2021-09-13', 1, '3.50', 'envol-aigle.jpg', 'En bonne santé', '2022-09-01', '2022-10-01'),
(3, 'Willow', 32, '2021-09-13', 0, '4.50', 'aigle-royal.jpg', 'En bonne santé', '2022-09-01', '2022-10-01'),
(4, 'Zorro', 45, '2021-09-13', 1, '24.00', 'baracuda.jpg', 'En bonne santé', '2022-09-01', '2022-10-01'),
(5, 'Eros', 23, '2021-09-13', 1, '13.00', 'boa.jpg', 'En bonne santé', '2022-09-01', '2022-10-01'),
(6, 'Lanterne', 64, '2021-09-13', 1, '100.00', 'serpent-blanc-python.jpg', 'En bonne santé', '2022-09-01', '2022-10-01'),
(7, 'Goldie', 23, '2021-09-13', 0, '13.00', 'boa2.jpg', 'En bonne santé', '2022-09-01', '2022-10-01'),
(8, 'Coton', 3, '2021-09-13', 0, '80.00', 'she-goat.jpg', 'En bonne santé', '2022-09-01', '2022-10-01'),
(9, 'Ace', 3, '2021-09-01', 1, '20.00', 'bebe-chevre.jpg', 'En bonne santé', '2022-09-14', '2022-11-14'),
(10, 'Mercury', 3, '2021-09-01', 1, '20.00', 'cute_petite_chevre.jpg', 'En bonne santé', '2022-09-14', '2022-11-14'),
(11, 'Blue', 3, '2021-09-01', 0, '20.00', 'bebe-mignon-chevre.jpg', 'En bonne santé', '2022-09-14', '2022-11-14'),
(12, 'Twinklebell', 3, '2021-09-01', 0, '20.00', 'chevre.jpg', 'En bonne santé', '2022-09-14', '2022-11-14'),
(13, 'Solace', 12, '2021-08-03', 1, '200.00', 'cerf.jpg', 'En bonne santé', '2022-09-14', '2022-11-14'),
(14, 'Quest', 12, '2021-08-03', 1, '200.00', 'cerf2.jpg', 'En bonne santé', '2022-09-14', '2022-11-14'),
(15, 'Hazel', 12, '2021-08-11', 0, '200.00', 'biche.jpg', 'En bonne santé', '2022-09-14', '2022-11-14'),
(16, 'Spot', 12, '2021-09-01', 0, '40.00', 'faon.jpg', 'En bonne santé', '2022-09-14', '2022-11-14');

-- --------------------------------------------------------

--
-- Structure de la table `breeds`
--

CREATE TABLE `breeds` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `diet_id` int(11) NOT NULL,
  `description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `breeds`
--

INSERT INTO `breeds` (`id`, `name`, `diet_id`, `description`) VALUES
(1, 'Cheval', 1, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus id cursus felis. Nulla bibendum imperdiet dictum. Curabitur id eleifend tellus. Pellentesque gravida luctus eros, vel viverra velit malesuada in. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Nulla quis vulputate augue. Pellentesque at dui dapibus turpis ullamcorper scelerisque nec non massa. In vestibulum ex eget dolor interdum, sed pulvinar felis molestie. In hac habitasse platea dictumst. Sed sed tellus aliquet leo scelerisque convallis sed vel nunc. Pellentesque elementum arcu laoreet, accumsan enim non, eleifend elit. Etiam at odio sed elit dignissim commodo gravida non ligula. Ut rhoncus vulputate cursus. Nam sit amet est neque. Morbi libero ligula, malesuada euismod leo eu, luctus consequat arcu. '),
(2, 'Mouton', 1, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus id cursus felis. Nulla bibendum imperdiet dictum. Curabitur id eleifend tellus. Pellentesque gravida luctus eros, vel viverra velit malesuada in. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Nulla quis vulputate augue. Pellentesque at dui dapibus turpis ullamcorper scelerisque nec non massa. In vestibulum ex eget dolor interdum, sed pulvinar felis molestie. In hac habitasse platea dictumst. Sed sed tellus aliquet leo scelerisque convallis sed vel nunc. Pellentesque elementum arcu laoreet, accumsan enim non, eleifend elit. Etiam at odio sed elit dignissim commodo gravida non ligula. Ut rhoncus vulputate cursus. Nam sit amet est neque. Morbi libero ligula, malesuada euismod leo eu, luctus consequat arcu. '),
(3, 'Chèvre', 1, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus id cursus felis. Nulla bibendum imperdiet dictum. Curabitur id eleifend tellus. Pellentesque gravida luctus eros, vel viverra velit malesuada in. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Nulla quis vulputate augue. Pellentesque at dui dapibus turpis ullamcorper scelerisque nec non massa. In vestibulum ex eget dolor interdum, sed pulvinar felis molestie. In hac habitasse platea dictumst. Sed sed tellus aliquet leo scelerisque convallis sed vel nunc. Pellentesque elementum arcu laoreet, accumsan enim non, eleifend elit. Etiam at odio sed elit dignissim commodo gravida non ligula. Ut rhoncus vulputate cursus. Nam sit amet est neque. Morbi libero ligula, malesuada euismod leo eu, luctus consequat arcu. '),
(4, 'Taureau/Vache', 1, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus id cursus felis. Nulla bibendum imperdiet dictum. Curabitur id eleifend tellus. Pellentesque gravida luctus eros, vel viverra velit malesuada in. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Nulla quis vulputate augue. Pellentesque at dui dapibus turpis ullamcorper scelerisque nec non massa. In vestibulum ex eget dolor interdum, sed pulvinar felis molestie. In hac habitasse platea dictumst. Sed sed tellus aliquet leo scelerisque convallis sed vel nunc. Pellentesque elementum arcu laoreet, accumsan enim non, eleifend elit. Etiam at odio sed elit dignissim commodo gravida non ligula. Ut rhoncus vulputate cursus. Nam sit amet est neque. Morbi libero ligula, malesuada euismod leo eu, luctus consequat arcu. '),
(5, 'Coq/Poule', 5, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus id cursus felis. Nulla bibendum imperdiet dictum. Curabitur id eleifend tellus. Pellentesque gravida luctus eros, vel viverra velit malesuada in. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Nulla quis vulputate augue. Pellentesque at dui dapibus turpis ullamcorper scelerisque nec non massa. In vestibulum ex eget dolor interdum, sed pulvinar felis molestie. In hac habitasse platea dictumst. Sed sed tellus aliquet leo scelerisque convallis sed vel nunc. Pellentesque elementum arcu laoreet, accumsan enim non, eleifend elit. Etiam at odio sed elit dignissim commodo gravida non ligula. Ut rhoncus vulputate cursus. Nam sit amet est neque. Morbi libero ligula, malesuada euismod leo eu, luctus consequat arcu. '),
(6, 'Chat', 2, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus id cursus felis. Nulla bibendum imperdiet dictum. Curabitur id eleifend tellus. Pellentesque gravida luctus eros, vel viverra velit malesuada in. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Nulla quis vulputate augue. Pellentesque at dui dapibus turpis ullamcorper scelerisque nec non massa. In vestibulum ex eget dolor interdum, sed pulvinar felis molestie. In hac habitasse platea dictumst. Sed sed tellus aliquet leo scelerisque convallis sed vel nunc. Pellentesque elementum arcu laoreet, accumsan enim non, eleifend elit. Etiam at odio sed elit dignissim commodo gravida non ligula. Ut rhoncus vulputate cursus. Nam sit amet est neque. Morbi libero ligula, malesuada euismod leo eu, luctus consequat arcu. '),
(7, 'Chien', 2, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus id cursus felis. Nulla bibendum imperdiet dictum. Curabitur id eleifend tellus. Pellentesque gravida luctus eros, vel viverra velit malesuada in. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Nulla quis vulputate augue. Pellentesque at dui dapibus turpis ullamcorper scelerisque nec non massa. In vestibulum ex eget dolor interdum, sed pulvinar felis molestie. In hac habitasse platea dictumst. Sed sed tellus aliquet leo scelerisque convallis sed vel nunc. Pellentesque elementum arcu laoreet, accumsan enim non, eleifend elit. Etiam at odio sed elit dignissim commodo gravida non ligula. Ut rhoncus vulputate cursus. Nam sit amet est neque. Morbi libero ligula, malesuada euismod leo eu, luctus consequat arcu. '),
(8, 'Lapin', 1, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus id cursus felis. Nulla bibendum imperdiet dictum. Curabitur id eleifend tellus. Pellentesque gravida luctus eros, vel viverra velit malesuada in. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Nulla quis vulputate augue. Pellentesque at dui dapibus turpis ullamcorper scelerisque nec non massa. In vestibulum ex eget dolor interdum, sed pulvinar felis molestie. In hac habitasse platea dictumst. Sed sed tellus aliquet leo scelerisque convallis sed vel nunc. Pellentesque elementum arcu laoreet, accumsan enim non, eleifend elit. Etiam at odio sed elit dignissim commodo gravida non ligula. Ut rhoncus vulputate cursus. Nam sit amet est neque. Morbi libero ligula, malesuada euismod leo eu, luctus consequat arcu. '),
(9, 'Hamster', 5, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus id cursus felis. Nulla bibendum imperdiet dictum. Curabitur id eleifend tellus. Pellentesque gravida luctus eros, vel viverra velit malesuada in. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Nulla quis vulputate augue. Pellentesque at dui dapibus turpis ullamcorper scelerisque nec non massa. In vestibulum ex eget dolor interdum, sed pulvinar felis molestie. In hac habitasse platea dictumst. Sed sed tellus aliquet leo scelerisque convallis sed vel nunc. Pellentesque elementum arcu laoreet, accumsan enim non, eleifend elit. Etiam at odio sed elit dignissim commodo gravida non ligula. Ut rhoncus vulputate cursus. Nam sit amet est neque. Morbi libero ligula, malesuada euismod leo eu, luctus consequat arcu. '),
(10, 'Cochon d\'inde', 1, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus id cursus felis. Nulla bibendum imperdiet dictum. Curabitur id eleifend tellus. Pellentesque gravida luctus eros, vel viverra velit malesuada in. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Nulla quis vulputate augue. Pellentesque at dui dapibus turpis ullamcorper scelerisque nec non massa. In vestibulum ex eget dolor interdum, sed pulvinar felis molestie. In hac habitasse platea dictumst. Sed sed tellus aliquet leo scelerisque convallis sed vel nunc. Pellentesque elementum arcu laoreet, accumsan enim non, eleifend elit. Etiam at odio sed elit dignissim commodo gravida non ligula. Ut rhoncus vulputate cursus. Nam sit amet est neque. Morbi libero ligula, malesuada euismod leo eu, luctus consequat arcu. '),
(11, 'Cochon', 5, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus id cursus felis. Nulla bibendum imperdiet dictum. Curabitur id eleifend tellus. Pellentesque gravida luctus eros, vel viverra velit malesuada in. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Nulla quis vulputate augue. Pellentesque at dui dapibus turpis ullamcorper scelerisque nec non massa. In vestibulum ex eget dolor interdum, sed pulvinar felis molestie. In hac habitasse platea dictumst. Sed sed tellus aliquet leo scelerisque convallis sed vel nunc. Pellentesque elementum arcu laoreet, accumsan enim non, eleifend elit. Etiam at odio sed elit dignissim commodo gravida non ligula. Ut rhoncus vulputate cursus. Nam sit amet est neque. Morbi libero ligula, malesuada euismod leo eu, luctus consequat arcu. '),
(12, 'Cerf/Biche', 1, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus id cursus felis. Nulla bibendum imperdiet dictum. Curabitur id eleifend tellus. Pellentesque gravida luctus eros, vel viverra velit malesuada in. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Nulla quis vulputate augue. Pellentesque at dui dapibus turpis ullamcorper scelerisque nec non massa. In vestibulum ex eget dolor interdum, sed pulvinar felis molestie. In hac habitasse platea dictumst. Sed sed tellus aliquet leo scelerisque convallis sed vel nunc. Pellentesque elementum arcu laoreet, accumsan enim non, eleifend elit. Etiam at odio sed elit dignissim commodo gravida non ligula. Ut rhoncus vulputate cursus. Nam sit amet est neque. Morbi libero ligula, malesuada euismod leo eu, luctus consequat arcu. '),
(13, 'Loup arctique', 2, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus id cursus felis. Nulla bibendum imperdiet dictum. Curabitur id eleifend tellus. Pellentesque gravida luctus eros, vel viverra velit malesuada in. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Nulla quis vulputate augue. Pellentesque at dui dapibus turpis ullamcorper scelerisque nec non massa. In vestibulum ex eget dolor interdum, sed pulvinar felis molestie. In hac habitasse platea dictumst. Sed sed tellus aliquet leo scelerisque convallis sed vel nunc. Pellentesque elementum arcu laoreet, accumsan enim non, eleifend elit. Etiam at odio sed elit dignissim commodo gravida non ligula. Ut rhoncus vulputate cursus. Nam sit amet est neque. Morbi libero ligula, malesuada euismod leo eu, luctus consequat arcu. '),
(14, 'Loup gris', 2, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus id cursus felis. Nulla bibendum imperdiet dictum. Curabitur id eleifend tellus. Pellentesque gravida luctus eros, vel viverra velit malesuada in. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Nulla quis vulputate augue. Pellentesque at dui dapibus turpis ullamcorper scelerisque nec non massa. In vestibulum ex eget dolor interdum, sed pulvinar felis molestie. In hac habitasse platea dictumst. Sed sed tellus aliquet leo scelerisque convallis sed vel nunc. Pellentesque elementum arcu laoreet, accumsan enim non, eleifend elit. Etiam at odio sed elit dignissim commodo gravida non ligula. Ut rhoncus vulputate cursus. Nam sit amet est neque. Morbi libero ligula, malesuada euismod leo eu, luctus consequat arcu. '),
(15, 'Tigre', 2, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus id cursus felis. Nulla bibendum imperdiet dictum. Curabitur id eleifend tellus. Pellentesque gravida luctus eros, vel viverra velit malesuada in. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Nulla quis vulputate augue. Pellentesque at dui dapibus turpis ullamcorper scelerisque nec non massa. In vestibulum ex eget dolor interdum, sed pulvinar felis molestie. In hac habitasse platea dictumst. Sed sed tellus aliquet leo scelerisque convallis sed vel nunc. Pellentesque elementum arcu laoreet, accumsan enim non, eleifend elit. Etiam at odio sed elit dignissim commodo gravida non ligula. Ut rhoncus vulputate cursus. Nam sit amet est neque. Morbi libero ligula, malesuada euismod leo eu, luctus consequat arcu. '),
(16, 'Tigre de Sibérie', 2, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus id cursus felis. Nulla bibendum imperdiet dictum. Curabitur id eleifend tellus. Pellentesque gravida luctus eros, vel viverra velit malesuada in. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Nulla quis vulputate augue. Pellentesque at dui dapibus turpis ullamcorper scelerisque nec non massa. In vestibulum ex eget dolor interdum, sed pulvinar felis molestie. In hac habitasse platea dictumst. Sed sed tellus aliquet leo scelerisque convallis sed vel nunc. Pellentesque elementum arcu laoreet, accumsan enim non, eleifend elit. Etiam at odio sed elit dignissim commodo gravida non ligula. Ut rhoncus vulputate cursus. Nam sit amet est neque. Morbi libero ligula, malesuada euismod leo eu, luctus consequat arcu. '),
(17, 'Lion', 2, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus id cursus felis. Nulla bibendum imperdiet dictum. Curabitur id eleifend tellus. Pellentesque gravida luctus eros, vel viverra velit malesuada in. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Nulla quis vulputate augue. Pellentesque at dui dapibus turpis ullamcorper scelerisque nec non massa. In vestibulum ex eget dolor interdum, sed pulvinar felis molestie. In hac habitasse platea dictumst. Sed sed tellus aliquet leo scelerisque convallis sed vel nunc. Pellentesque elementum arcu laoreet, accumsan enim non, eleifend elit. Etiam at odio sed elit dignissim commodo gravida non ligula. Ut rhoncus vulputate cursus. Nam sit amet est neque. Morbi libero ligula, malesuada euismod leo eu, luctus consequat arcu. '),
(18, 'Guépard', 2, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus id cursus felis. Nulla bibendum imperdiet dictum. Curabitur id eleifend tellus. Pellentesque gravida luctus eros, vel viverra velit malesuada in. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Nulla quis vulputate augue. Pellentesque at dui dapibus turpis ullamcorper scelerisque nec non massa. In vestibulum ex eget dolor interdum, sed pulvinar felis molestie. In hac habitasse platea dictumst. Sed sed tellus aliquet leo scelerisque convallis sed vel nunc. Pellentesque elementum arcu laoreet, accumsan enim non, eleifend elit. Etiam at odio sed elit dignissim commodo gravida non ligula. Ut rhoncus vulputate cursus. Nam sit amet est neque. Morbi libero ligula, malesuada euismod leo eu, luctus consequat arcu. '),
(19, 'Panthère', 2, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus id cursus felis. Nulla bibendum imperdiet dictum. Curabitur id eleifend tellus. Pellentesque gravida luctus eros, vel viverra velit malesuada in. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Nulla quis vulputate augue. Pellentesque at dui dapibus turpis ullamcorper scelerisque nec non massa. In vestibulum ex eget dolor interdum, sed pulvinar felis molestie. In hac habitasse platea dictumst. Sed sed tellus aliquet leo scelerisque convallis sed vel nunc. Pellentesque elementum arcu laoreet, accumsan enim non, eleifend elit. Etiam at odio sed elit dignissim commodo gravida non ligula. Ut rhoncus vulputate cursus. Nam sit amet est neque. Morbi libero ligula, malesuada euismod leo eu, luctus consequat arcu. '),
(21, 'Gorille', 1, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus id cursus felis. Nulla bibendum imperdiet dictum. Curabitur id eleifend tellus. Pellentesque gravida luctus eros, vel viverra velit malesuada in. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Nulla quis vulputate augue. Pellentesque at dui dapibus turpis ullamcorper scelerisque nec non massa. In vestibulum ex eget dolor interdum, sed pulvinar felis molestie. In hac habitasse platea dictumst. Sed sed tellus aliquet leo scelerisque convallis sed vel nunc. Pellentesque elementum arcu laoreet, accumsan enim non, eleifend elit. Etiam at odio sed elit dignissim commodo gravida non ligula. Ut rhoncus vulputate cursus. Nam sit amet est neque. Morbi libero ligula, malesuada euismod leo eu, luctus consequat arcu. '),
(22, 'Chimpanzé ', 5, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus id cursus felis. Nulla bibendum imperdiet dictum. Curabitur id eleifend tellus. Pellentesque gravida luctus eros, vel viverra velit malesuada in. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Nulla quis vulputate augue. Pellentesque at dui dapibus turpis ullamcorper scelerisque nec non massa. In vestibulum ex eget dolor interdum, sed pulvinar felis molestie. In hac habitasse platea dictumst. Sed sed tellus aliquet leo scelerisque convallis sed vel nunc. Pellentesque elementum arcu laoreet, accumsan enim non, eleifend elit. Etiam at odio sed elit dignissim commodo gravida non ligula. Ut rhoncus vulputate cursus. Nam sit amet est neque. Morbi libero ligula, malesuada euismod leo eu, luctus consequat arcu. '),
(23, 'Boa', 2, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus id cursus felis. Nulla bibendum imperdiet dictum. Curabitur id eleifend tellus. Pellentesque gravida luctus eros, vel viverra velit malesuada in. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Nulla quis vulputate augue. Pellentesque at dui dapibus turpis ullamcorper scelerisque nec non massa. In vestibulum ex eget dolor interdum, sed pulvinar felis molestie. In hac habitasse platea dictumst. Sed sed tellus aliquet leo scelerisque convallis sed vel nunc. Pellentesque elementum arcu laoreet, accumsan enim non, eleifend elit. Etiam at odio sed elit dignissim commodo gravida non ligula. Ut rhoncus vulputate cursus. Nam sit amet est neque. Morbi libero ligula, malesuada euismod leo eu, luctus consequat arcu. '),
(24, 'Cobra royal', 2, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus id cursus felis. Nulla bibendum imperdiet dictum. Curabitur id eleifend tellus. Pellentesque gravida luctus eros, vel viverra velit malesuada in. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Nulla quis vulputate augue. Pellentesque at dui dapibus turpis ullamcorper scelerisque nec non massa. In vestibulum ex eget dolor interdum, sed pulvinar felis molestie. In hac habitasse platea dictumst. Sed sed tellus aliquet leo scelerisque convallis sed vel nunc. Pellentesque elementum arcu laoreet, accumsan enim non, eleifend elit. Etiam at odio sed elit dignissim commodo gravida non ligula. Ut rhoncus vulputate cursus. Nam sit amet est neque. Morbi libero ligula, malesuada euismod leo eu, luctus consequat arcu. '),
(25, 'Migale', 2, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus id cursus felis. Nulla bibendum imperdiet dictum. Curabitur id eleifend tellus. Pellentesque gravida luctus eros, vel viverra velit malesuada in. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Nulla quis vulputate augue. Pellentesque at dui dapibus turpis ullamcorper scelerisque nec non massa. In vestibulum ex eget dolor interdum, sed pulvinar felis molestie. In hac habitasse platea dictumst. Sed sed tellus aliquet leo scelerisque convallis sed vel nunc. Pellentesque elementum arcu laoreet, accumsan enim non, eleifend elit. Etiam at odio sed elit dignissim commodo gravida non ligula. Ut rhoncus vulputate cursus. Nam sit amet est neque. Morbi libero ligula, malesuada euismod leo eu, luctus consequat arcu. '),
(26, 'Scorpion', 4, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus id cursus felis. Nulla bibendum imperdiet dictum. Curabitur id eleifend tellus. Pellentesque gravida luctus eros, vel viverra velit malesuada in. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Nulla quis vulputate augue. Pellentesque at dui dapibus turpis ullamcorper scelerisque nec non massa. In vestibulum ex eget dolor interdum, sed pulvinar felis molestie. In hac habitasse platea dictumst. Sed sed tellus aliquet leo scelerisque convallis sed vel nunc. Pellentesque elementum arcu laoreet, accumsan enim non, eleifend elit. Etiam at odio sed elit dignissim commodo gravida non ligula. Ut rhoncus vulputate cursus. Nam sit amet est neque. Morbi libero ligula, malesuada euismod leo eu, luctus consequat arcu. '),
(27, 'Chauve-souris', 5, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus id cursus felis. Nulla bibendum imperdiet dictum. Curabitur id eleifend tellus. Pellentesque gravida luctus eros, vel viverra velit malesuada in. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Nulla quis vulputate augue. Pellentesque at dui dapibus turpis ullamcorper scelerisque nec non massa. In vestibulum ex eget dolor interdum, sed pulvinar felis molestie. In hac habitasse platea dictumst. Sed sed tellus aliquet leo scelerisque convallis sed vel nunc. Pellentesque elementum arcu laoreet, accumsan enim non, eleifend elit. Etiam at odio sed elit dignissim commodo gravida non ligula. Ut rhoncus vulputate cursus. Nam sit amet est neque. Morbi libero ligula, malesuada euismod leo eu, luctus consequat arcu. '),
(28, 'Crocodile', 2, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus id cursus felis. Nulla bibendum imperdiet dictum. Curabitur id eleifend tellus. Pellentesque gravida luctus eros, vel viverra velit malesuada in. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Nulla quis vulputate augue. Pellentesque at dui dapibus turpis ullamcorper scelerisque nec non massa. In vestibulum ex eget dolor interdum, sed pulvinar felis molestie. In hac habitasse platea dictumst. Sed sed tellus aliquet leo scelerisque convallis sed vel nunc. Pellentesque elementum arcu laoreet, accumsan enim non, eleifend elit. Etiam at odio sed elit dignissim commodo gravida non ligula. Ut rhoncus vulputate cursus. Nam sit amet est neque. Morbi libero ligula, malesuada euismod leo eu, luctus consequat arcu. '),
(29, 'Hippopotame ', 5, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus id cursus felis. Nulla bibendum imperdiet dictum. Curabitur id eleifend tellus. Pellentesque gravida luctus eros, vel viverra velit malesuada in. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Nulla quis vulputate augue. Pellentesque at dui dapibus turpis ullamcorper scelerisque nec non massa. In vestibulum ex eget dolor interdum, sed pulvinar felis molestie. In hac habitasse platea dictumst. Sed sed tellus aliquet leo scelerisque convallis sed vel nunc. Pellentesque elementum arcu laoreet, accumsan enim non, eleifend elit. Etiam at odio sed elit dignissim commodo gravida non ligula. Ut rhoncus vulputate cursus. Nam sit amet est neque. Morbi libero ligula, malesuada euismod leo eu, luctus consequat arcu. '),
(30, 'Gazelle', 1, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus id cursus felis. Nulla bibendum imperdiet dictum. Curabitur id eleifend tellus. Pellentesque gravida luctus eros, vel viverra velit malesuada in. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Nulla quis vulputate augue. Pellentesque at dui dapibus turpis ullamcorper scelerisque nec non massa. In vestibulum ex eget dolor interdum, sed pulvinar felis molestie. In hac habitasse platea dictumst. Sed sed tellus aliquet leo scelerisque convallis sed vel nunc. Pellentesque elementum arcu laoreet, accumsan enim non, eleifend elit. Etiam at odio sed elit dignissim commodo gravida non ligula. Ut rhoncus vulputate cursus. Nam sit amet est neque. Morbi libero ligula, malesuada euismod leo eu, luctus consequat arcu. '),
(31, 'Eléphant ', 1, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus id cursus felis. Nulla bibendum imperdiet dictum. Curabitur id eleifend tellus. Pellentesque gravida luctus eros, vel viverra velit malesuada in. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Nulla quis vulputate augue. Pellentesque at dui dapibus turpis ullamcorper scelerisque nec non massa. In vestibulum ex eget dolor interdum, sed pulvinar felis molestie. In hac habitasse platea dictumst. Sed sed tellus aliquet leo scelerisque convallis sed vel nunc. Pellentesque elementum arcu laoreet, accumsan enim non, eleifend elit. Etiam at odio sed elit dignissim commodo gravida non ligula. Ut rhoncus vulputate cursus. Nam sit amet est neque. Morbi libero ligula, malesuada euismod leo eu, luctus consequat arcu. '),
(32, 'Aigle royal', 2, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus id cursus felis. Nulla bibendum imperdiet dictum. Curabitur id eleifend tellus. Pellentesque gravida luctus eros, vel viverra velit malesuada in. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Nulla quis vulputate augue. Pellentesque at dui dapibus turpis ullamcorper scelerisque nec non massa. In vestibulum ex eget dolor interdum, sed pulvinar felis molestie. In hac habitasse platea dictumst. Sed sed tellus aliquet leo scelerisque convallis sed vel nunc. Pellentesque elementum arcu laoreet, accumsan enim non, eleifend elit. Etiam at odio sed elit dignissim commodo gravida non ligula. Ut rhoncus vulputate cursus. Nam sit amet est neque. Morbi libero ligula, malesuada euismod leo eu, luctus consequat arcu. '),
(33, 'Faucon gerfaut', 2, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus id cursus felis. Nulla bibendum imperdiet dictum. Curabitur id eleifend tellus. Pellentesque gravida luctus eros, vel viverra velit malesuada in. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Nulla quis vulputate augue. Pellentesque at dui dapibus turpis ullamcorper scelerisque nec non massa. In vestibulum ex eget dolor interdum, sed pulvinar felis molestie. In hac habitasse platea dictumst. Sed sed tellus aliquet leo scelerisque convallis sed vel nunc. Pellentesque elementum arcu laoreet, accumsan enim non, eleifend elit. Etiam at odio sed elit dignissim commodo gravida non ligula. Ut rhoncus vulputate cursus. Nam sit amet est neque. Morbi libero ligula, malesuada euismod leo eu, luctus consequat arcu. '),
(34, 'Faucon merlin', 2, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus id cursus felis. Nulla bibendum imperdiet dictum. Curabitur id eleifend tellus. Pellentesque gravida luctus eros, vel viverra velit malesuada in. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Nulla quis vulputate augue. Pellentesque at dui dapibus turpis ullamcorper scelerisque nec non massa. In vestibulum ex eget dolor interdum, sed pulvinar felis molestie. In hac habitasse platea dictumst. Sed sed tellus aliquet leo scelerisque convallis sed vel nunc. Pellentesque elementum arcu laoreet, accumsan enim non, eleifend elit. Etiam at odio sed elit dignissim commodo gravida non ligula. Ut rhoncus vulputate cursus. Nam sit amet est neque. Morbi libero ligula, malesuada euismod leo eu, luctus consequat arcu. '),
(35, 'Corbeau', 5, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus id cursus felis. Nulla bibendum imperdiet dictum. Curabitur id eleifend tellus. Pellentesque gravida luctus eros, vel viverra velit malesuada in. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Nulla quis vulputate augue. Pellentesque at dui dapibus turpis ullamcorper scelerisque nec non massa. In vestibulum ex eget dolor interdum, sed pulvinar felis molestie. In hac habitasse platea dictumst. Sed sed tellus aliquet leo scelerisque convallis sed vel nunc. Pellentesque elementum arcu laoreet, accumsan enim non, eleifend elit. Etiam at odio sed elit dignissim commodo gravida non ligula. Ut rhoncus vulputate cursus. Nam sit amet est neque. Morbi libero ligula, malesuada euismod leo eu, luctus consequat arcu. '),
(36, 'Rouge-gorge', 4, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus id cursus felis. Nulla bibendum imperdiet dictum. Curabitur id eleifend tellus. Pellentesque gravida luctus eros, vel viverra velit malesuada in. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Nulla quis vulputate augue. Pellentesque at dui dapibus turpis ullamcorper scelerisque nec non massa. In vestibulum ex eget dolor interdum, sed pulvinar felis molestie. In hac habitasse platea dictumst. Sed sed tellus aliquet leo scelerisque convallis sed vel nunc. Pellentesque elementum arcu laoreet, accumsan enim non, eleifend elit. Etiam at odio sed elit dignissim commodo gravida non ligula. Ut rhoncus vulputate cursus. Nam sit amet est neque. Morbi libero ligula, malesuada euismod leo eu, luctus consequat arcu. '),
(37, 'Moineau', 5, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus id cursus felis. Nulla bibendum imperdiet dictum. Curabitur id eleifend tellus. Pellentesque gravida luctus eros, vel viverra velit malesuada in. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Nulla quis vulputate augue. Pellentesque at dui dapibus turpis ullamcorper scelerisque nec non massa. In vestibulum ex eget dolor interdum, sed pulvinar felis molestie. In hac habitasse platea dictumst. Sed sed tellus aliquet leo scelerisque convallis sed vel nunc. Pellentesque elementum arcu laoreet, accumsan enim non, eleifend elit. Etiam at odio sed elit dignissim commodo gravida non ligula. Ut rhoncus vulputate cursus. Nam sit amet est neque. Morbi libero ligula, malesuada euismod leo eu, luctus consequat arcu. '),
(38, 'Perroquet ', 1, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus id cursus felis. Nulla bibendum imperdiet dictum. Curabitur id eleifend tellus. Pellentesque gravida luctus eros, vel viverra velit malesuada in. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Nulla quis vulputate augue. Pellentesque at dui dapibus turpis ullamcorper scelerisque nec non massa. In vestibulum ex eget dolor interdum, sed pulvinar felis molestie. In hac habitasse platea dictumst. Sed sed tellus aliquet leo scelerisque convallis sed vel nunc. Pellentesque elementum arcu laoreet, accumsan enim non, eleifend elit. Etiam at odio sed elit dignissim commodo gravida non ligula. Ut rhoncus vulputate cursus. Nam sit amet est neque. Morbi libero ligula, malesuada euismod leo eu, luctus consequat arcu. '),
(39, 'Chouette', 2, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus id cursus felis. Nulla bibendum imperdiet dictum. Curabitur id eleifend tellus. Pellentesque gravida luctus eros, vel viverra velit malesuada in. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Nulla quis vulputate augue. Pellentesque at dui dapibus turpis ullamcorper scelerisque nec non massa. In vestibulum ex eget dolor interdum, sed pulvinar felis molestie. In hac habitasse platea dictumst. Sed sed tellus aliquet leo scelerisque convallis sed vel nunc. Pellentesque elementum arcu laoreet, accumsan enim non, eleifend elit. Etiam at odio sed elit dignissim commodo gravida non ligula. Ut rhoncus vulputate cursus. Nam sit amet est neque. Morbi libero ligula, malesuada euismod leo eu, luctus consequat arcu. '),
(40, 'Hibou ', 2, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus id cursus felis. Nulla bibendum imperdiet dictum. Curabitur id eleifend tellus. Pellentesque gravida luctus eros, vel viverra velit malesuada in. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Nulla quis vulputate augue. Pellentesque at dui dapibus turpis ullamcorper scelerisque nec non massa. In vestibulum ex eget dolor interdum, sed pulvinar felis molestie. In hac habitasse platea dictumst. Sed sed tellus aliquet leo scelerisque convallis sed vel nunc. Pellentesque elementum arcu laoreet, accumsan enim non, eleifend elit. Etiam at odio sed elit dignissim commodo gravida non ligula. Ut rhoncus vulputate cursus. Nam sit amet est neque. Morbi libero ligula, malesuada euismod leo eu, luctus consequat arcu. '),
(41, 'Requin blanc', 3, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus id cursus felis. Nulla bibendum imperdiet dictum. Curabitur id eleifend tellus. Pellentesque gravida luctus eros, vel viverra velit malesuada in. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Nulla quis vulputate augue. Pellentesque at dui dapibus turpis ullamcorper scelerisque nec non massa. In vestibulum ex eget dolor interdum, sed pulvinar felis molestie. In hac habitasse platea dictumst. Sed sed tellus aliquet leo scelerisque convallis sed vel nunc. Pellentesque elementum arcu laoreet, accumsan enim non, eleifend elit. Etiam at odio sed elit dignissim commodo gravida non ligula. Ut rhoncus vulputate cursus. Nam sit amet est neque. Morbi libero ligula, malesuada euismod leo eu, luctus consequat arcu. '),
(42, 'Piranha ', 2, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus id cursus felis. Nulla bibendum imperdiet dictum. Curabitur id eleifend tellus. Pellentesque gravida luctus eros, vel viverra velit malesuada in. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Nulla quis vulputate augue. Pellentesque at dui dapibus turpis ullamcorper scelerisque nec non massa. In vestibulum ex eget dolor interdum, sed pulvinar felis molestie. In hac habitasse platea dictumst. Sed sed tellus aliquet leo scelerisque convallis sed vel nunc. Pellentesque elementum arcu laoreet, accumsan enim non, eleifend elit. Etiam at odio sed elit dignissim commodo gravida non ligula. Ut rhoncus vulputate cursus. Nam sit amet est neque. Morbi libero ligula, malesuada euismod leo eu, luctus consequat arcu. '),
(43, 'Pieuvre', 3, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus id cursus felis. Nulla bibendum imperdiet dictum. Curabitur id eleifend tellus. Pellentesque gravida luctus eros, vel viverra velit malesuada in. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Nulla quis vulputate augue. Pellentesque at dui dapibus turpis ullamcorper scelerisque nec non massa. In vestibulum ex eget dolor interdum, sed pulvinar felis molestie. In hac habitasse platea dictumst. Sed sed tellus aliquet leo scelerisque convallis sed vel nunc. Pellentesque elementum arcu laoreet, accumsan enim non, eleifend elit. Etiam at odio sed elit dignissim commodo gravida non ligula. Ut rhoncus vulputate cursus. Nam sit amet est neque. Morbi libero ligula, malesuada euismod leo eu, luctus consequat arcu. '),
(44, 'Murène', 3, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus id cursus felis. Nulla bibendum imperdiet dictum. Curabitur id eleifend tellus. Pellentesque gravida luctus eros, vel viverra velit malesuada in. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Nulla quis vulputate augue. Pellentesque at dui dapibus turpis ullamcorper scelerisque nec non massa. In vestibulum ex eget dolor interdum, sed pulvinar felis molestie. In hac habitasse platea dictumst. Sed sed tellus aliquet leo scelerisque convallis sed vel nunc. Pellentesque elementum arcu laoreet, accumsan enim non, eleifend elit. Etiam at odio sed elit dignissim commodo gravida non ligula. Ut rhoncus vulputate cursus. Nam sit amet est neque. Morbi libero ligula, malesuada euismod leo eu, luctus consequat arcu. '),
(45, 'Barracuda ', 3, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus id cursus felis. Nulla bibendum imperdiet dictum. Curabitur id eleifend tellus. Pellentesque gravida luctus eros, vel viverra velit malesuada in. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Nulla quis vulputate augue. Pellentesque at dui dapibus turpis ullamcorper scelerisque nec non massa. In vestibulum ex eget dolor interdum, sed pulvinar felis molestie. In hac habitasse platea dictumst. Sed sed tellus aliquet leo scelerisque convallis sed vel nunc. Pellentesque elementum arcu laoreet, accumsan enim non, eleifend elit. Etiam at odio sed elit dignissim commodo gravida non ligula. Ut rhoncus vulputate cursus. Nam sit amet est neque. Morbi libero ligula, malesuada euismod leo eu, luctus consequat arcu. '),
(46, 'Méduse', 3, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus id cursus felis. Nulla bibendum imperdiet dictum. Curabitur id eleifend tellus. Pellentesque gravida luctus eros, vel viverra velit malesuada in. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Nulla quis vulputate augue. Pellentesque at dui dapibus turpis ullamcorper scelerisque nec non massa. In vestibulum ex eget dolor interdum, sed pulvinar felis molestie. In hac habitasse platea dictumst. Sed sed tellus aliquet leo scelerisque convallis sed vel nunc. Pellentesque elementum arcu laoreet, accumsan enim non, eleifend elit. Etiam at odio sed elit dignissim commodo gravida non ligula. Ut rhoncus vulputate cursus. Nam sit amet est neque. Morbi libero ligula, malesuada euismod leo eu, luctus consequat arcu. '),
(47, 'Tortue', 5, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus id cursus felis. Nulla bibendum imperdiet dictum. Curabitur id eleifend tellus. Pellentesque gravida luctus eros, vel viverra velit malesuada in. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Nulla quis vulputate augue. Pellentesque at dui dapibus turpis ullamcorper scelerisque nec non massa. In vestibulum ex eget dolor interdum, sed pulvinar felis molestie. In hac habitasse platea dictumst. Sed sed tellus aliquet leo scelerisque convallis sed vel nunc. Pellentesque elementum arcu laoreet, accumsan enim non, eleifend elit. Etiam at odio sed elit dignissim commodo gravida non ligula. Ut rhoncus vulputate cursus. Nam sit amet est neque. Morbi libero ligula, malesuada euismod leo eu, luctus consequat arcu. '),
(48, 'Poisson clown', 5, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus id cursus felis. Nulla bibendum imperdiet dictum. Curabitur id eleifend tellus. Pellentesque gravida luctus eros, vel viverra velit malesuada in. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Nulla quis vulputate augue. Pellentesque at dui dapibus turpis ullamcorper scelerisque nec non massa. In vestibulum ex eget dolor interdum, sed pulvinar felis molestie. In hac habitasse platea dictumst. Sed sed tellus aliquet leo scelerisque convallis sed vel nunc. Pellentesque elementum arcu laoreet, accumsan enim non, eleifend elit. Etiam at odio sed elit dignissim commodo gravida non ligula. Ut rhoncus vulputate cursus. Nam sit amet est neque. Morbi libero ligula, malesuada euismod leo eu, luctus consequat arcu. '),
(49, 'Panda', 1, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus id cursus felis. Nulla bibendum imperdiet dictum. Curabitur id eleifend tellus. Pellentesque gravida luctus eros, vel viverra velit malesuada in. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Nulla quis vulputate augue. Pellentesque at dui dapibus turpis ullamcorper scelerisque nec non massa. In vestibulum ex eget dolor interdum, sed pulvinar felis molestie. In hac habitasse platea dictumst. Sed sed tellus aliquet leo scelerisque convallis sed vel nunc. Pellentesque elementum arcu laoreet, accumsan enim non, eleifend elit. Etiam at odio sed elit dignissim commodo gravida non ligula. Ut rhoncus vulputate cursus. Nam sit amet est neque. Morbi libero ligula, malesuada euismod leo eu, luctus consequat arcu. '),
(50, 'Ours polaire', 5, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus id cursus felis. Nulla bibendum imperdiet dictum. Curabitur id eleifend tellus. Pellentesque gravida luctus eros, vel viverra velit malesuada in. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Nulla quis vulputate augue. Pellentesque at dui dapibus turpis ullamcorper scelerisque nec non massa. In vestibulum ex eget dolor interdum, sed pulvinar felis molestie. In hac habitasse platea dictumst. Sed sed tellus aliquet leo scelerisque convallis sed vel nunc. Pellentesque elementum arcu laoreet, accumsan enim non, eleifend elit. Etiam at odio sed elit dignissim commodo gravida non ligula. Ut rhoncus vulputate cursus. Nam sit amet est neque. Morbi libero ligula, malesuada euismod leo eu, luctus consequat arcu. '),
(51, 'Ours à collier', 5, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus id cursus felis. Nulla bibendum imperdiet dictum. Curabitur id eleifend tellus. Pellentesque gravida luctus eros, vel viverra velit malesuada in. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Nulla quis vulputate augue. Pellentesque at dui dapibus turpis ullamcorper scelerisque nec non massa. In vestibulum ex eget dolor interdum, sed pulvinar felis molestie. In hac habitasse platea dictumst. Sed sed tellus aliquet leo scelerisque convallis sed vel nunc. Pellentesque elementum arcu laoreet, accumsan enim non, eleifend elit. Etiam at odio sed elit dignissim commodo gravida non ligula. Ut rhoncus vulputate cursus. Nam sit amet est neque. Morbi libero ligula, malesuada euismod leo eu, luctus consequat arcu. '),
(52, 'Ours brun', 2, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus id cursus felis. Nulla bibendum imperdiet dictum. Curabitur id eleifend tellus. Pellentesque gravida luctus eros, vel viverra velit malesuada in. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Nulla quis vulputate augue. Pellentesque at dui dapibus turpis ullamcorper scelerisque nec non massa. In vestibulum ex eget dolor interdum, sed pulvinar felis molestie. In hac habitasse platea dictumst. Sed sed tellus aliquet leo scelerisque convallis sed vel nunc. Pellentesque elementum arcu laoreet, accumsan enim non, eleifend elit. Etiam at odio sed elit dignissim commodo gravida non ligula. Ut rhoncus vulputate cursus. Nam sit amet est neque. Morbi libero ligula, malesuada euismod leo eu, luctus consequat arcu. '),
(53, 'Orque', 3, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus id cursus felis. Nulla bibendum imperdiet dictum. Curabitur id eleifend tellus. Pellentesque gravida luctus eros, vel viverra velit malesuada in. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Nulla quis vulputate augue. Pellentesque at dui dapibus turpis ullamcorper scelerisque nec non massa. In vestibulum ex eget dolor interdum, sed pulvinar felis molestie. In hac habitasse platea dictumst. Sed sed tellus aliquet leo scelerisque convallis sed vel nunc. Pellentesque elementum arcu laoreet, accumsan enim non, eleifend elit. Etiam at odio sed elit dignissim commodo gravida non ligula. Ut rhoncus vulputate cursus. Nam sit amet est neque. Morbi libero ligula, malesuada euismod leo eu, luctus consequat arcu. '),
(54, 'Manchot', 3, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus id cursus felis. Nulla bibendum imperdiet dictum. Curabitur id eleifend tellus. Pellentesque gravida luctus eros, vel viverra velit malesuada in. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Nulla quis vulputate augue. Pellentesque at dui dapibus turpis ullamcorper scelerisque nec non massa. In vestibulum ex eget dolor interdum, sed pulvinar felis molestie. In hac habitasse platea dictumst. Sed sed tellus aliquet leo scelerisque convallis sed vel nunc. Pellentesque elementum arcu laoreet, accumsan enim non, eleifend elit. Etiam at odio sed elit dignissim commodo gravida non ligula. Ut rhoncus vulputate cursus. Nam sit amet est neque. Morbi libero ligula, malesuada euismod leo eu, luctus consequat arcu. '),
(55, 'Renard roux', 2, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus id cursus felis. Nulla bibendum imperdiet dictum. Curabitur id eleifend tellus. Pellentesque gravida luctus eros, vel viverra velit malesuada in. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Nulla quis vulputate augue. Pellentesque at dui dapibus turpis ullamcorper scelerisque nec non massa. In vestibulum ex eget dolor interdum, sed pulvinar felis molestie. In hac habitasse platea dictumst. Sed sed tellus aliquet leo scelerisque convallis sed vel nunc. Pellentesque elementum arcu laoreet, accumsan enim non, eleifend elit. Etiam at odio sed elit dignissim commodo gravida non ligula. Ut rhoncus vulputate cursus. Nam sit amet est neque. Morbi libero ligula, malesuada euismod leo eu, luctus consequat arcu. '),
(56, 'Renard gris', 2, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus id cursus felis. Nulla bibendum imperdiet dictum. Curabitur id eleifend tellus. Pellentesque gravida luctus eros, vel viverra velit malesuada in. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Nulla quis vulputate augue. Pellentesque at dui dapibus turpis ullamcorper scelerisque nec non massa. In vestibulum ex eget dolor interdum, sed pulvinar felis molestie. In hac habitasse platea dictumst. Sed sed tellus aliquet leo scelerisque convallis sed vel nunc. Pellentesque elementum arcu laoreet, accumsan enim non, eleifend elit. Etiam at odio sed elit dignissim commodo gravida non ligula. Ut rhoncus vulputate cursus. Nam sit amet est neque. Morbi libero ligula, malesuada euismod leo eu, luctus consequat arcu. '),
(57, 'Renard polaire', 2, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus id cursus felis. Nulla bibendum imperdiet dictum. Curabitur id eleifend tellus. Pellentesque gravida luctus eros, vel viverra velit malesuada in. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Nulla quis vulputate augue. Pellentesque at dui dapibus turpis ullamcorper scelerisque nec non massa. In vestibulum ex eget dolor interdum, sed pulvinar felis molestie. In hac habitasse platea dictumst. Sed sed tellus aliquet leo scelerisque convallis sed vel nunc. Pellentesque elementum arcu laoreet, accumsan enim non, eleifend elit. Etiam at odio sed elit dignissim commodo gravida non ligula. Ut rhoncus vulputate cursus. Nam sit amet est neque. Morbi libero ligula, malesuada euismod leo eu, luctus consequat arcu. '),
(58, 'Fennec', 2, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus id cursus felis. Nulla bibendum imperdiet dictum. Curabitur id eleifend tellus. Pellentesque gravida luctus eros, vel viverra velit malesuada in. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Nulla quis vulputate augue. Pellentesque at dui dapibus turpis ullamcorper scelerisque nec non massa. In vestibulum ex eget dolor interdum, sed pulvinar felis molestie. In hac habitasse platea dictumst. Sed sed tellus aliquet leo scelerisque convallis sed vel nunc. Pellentesque elementum arcu laoreet, accumsan enim non, eleifend elit. Etiam at odio sed elit dignissim commodo gravida non ligula. Ut rhoncus vulputate cursus. Nam sit amet est neque. Morbi libero ligula, malesuada euismod leo eu, luctus consequat arcu. '),
(59, 'Panda roux', 5, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus id cursus felis. Nulla bibendum imperdiet dictum. Curabitur id eleifend tellus. Pellentesque gravida luctus eros, vel viverra velit malesuada in. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Nulla quis vulputate augue. Pellentesque at dui dapibus turpis ullamcorper scelerisque nec non massa. In vestibulum ex eget dolor interdum, sed pulvinar felis molestie. In hac habitasse platea dictumst. Sed sed tellus aliquet leo scelerisque convallis sed vel nunc. Pellentesque elementum arcu laoreet, accumsan enim non, eleifend elit. Etiam at odio sed elit dignissim commodo gravida non ligula. Ut rhoncus vulputate cursus. Nam sit amet est neque. Morbi libero ligula, malesuada euismod leo eu, luctus consequat arcu. ');
INSERT INTO `breeds` (`id`, `name`, `diet_id`, `description`) VALUES
(60, 'Grand dauphin', 3, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus id cursus felis. Nulla bibendum imperdiet dictum. Curabitur id eleifend tellus. Pellentesque gravida luctus eros, vel viverra velit malesuada in. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Nulla quis vulputate augue. Pellentesque at dui dapibus turpis ullamcorper scelerisque nec non massa. In vestibulum ex eget dolor interdum, sed pulvinar felis molestie. In hac habitasse platea dictumst. Sed sed tellus aliquet leo scelerisque convallis sed vel nunc. Pellentesque elementum arcu laoreet, accumsan enim non, eleifend elit. Etiam at odio sed elit dignissim commodo gravida non ligula. Ut rhoncus vulputate cursus. Nam sit amet est neque. Morbi libero ligula, malesuada euismod leo eu, luctus consequat arcu. '),
(61, 'Dauphin commun', 3, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus id cursus felis. Nulla bibendum imperdiet dictum. Curabitur id eleifend tellus. Pellentesque gravida luctus eros, vel viverra velit malesuada in. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Nulla quis vulputate augue. Pellentesque at dui dapibus turpis ullamcorper scelerisque nec non massa. In vestibulum ex eget dolor interdum, sed pulvinar felis molestie. In hac habitasse platea dictumst. Sed sed tellus aliquet leo scelerisque convallis sed vel nunc. Pellentesque elementum arcu laoreet, accumsan enim non, eleifend elit. Etiam at odio sed elit dignissim commodo gravida non ligula. Ut rhoncus vulputate cursus. Nam sit amet est neque. Morbi libero ligula, malesuada euismod leo eu, luctus consequat arcu. '),
(62, 'Otarie', 3, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus id cursus felis. Nulla bibendum imperdiet dictum. Curabitur id eleifend tellus. Pellentesque gravida luctus eros, vel viverra velit malesuada in. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Nulla quis vulputate augue. Pellentesque at dui dapibus turpis ullamcorper scelerisque nec non massa. In vestibulum ex eget dolor interdum, sed pulvinar felis molestie. In hac habitasse platea dictumst. Sed sed tellus aliquet leo scelerisque convallis sed vel nunc. Pellentesque elementum arcu laoreet, accumsan enim non, eleifend elit. Etiam at odio sed elit dignissim commodo gravida non ligula. Ut rhoncus vulputate cursus. Nam sit amet est neque. Morbi libero ligula, malesuada euismod leo eu, luctus consequat arcu. '),
(63, 'Girafe ', 1, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus id cursus felis. Nulla bibendum imperdiet dictum. Curabitur id eleifend tellus. Pellentesque gravida luctus eros, vel viverra velit malesuada in. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Nulla quis vulputate augue. Pellentesque at dui dapibus turpis ullamcorper scelerisque nec non massa. In vestibulum ex eget dolor interdum, sed pulvinar felis molestie. In hac habitasse platea dictumst. Sed sed tellus aliquet leo scelerisque convallis sed vel nunc. Pellentesque elementum arcu laoreet, accumsan enim non, eleifend elit. Etiam at odio sed elit dignissim commodo gravida non ligula. Ut rhoncus vulputate cursus. Nam sit amet est neque. Morbi libero ligula, malesuada euismod leo eu, luctus consequat arcu. '),
(64, 'Python', 2, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus id cursus felis. Nulla bibendum imperdiet dictum. Curabitur id eleifend tellus. Pellentesque gravida luctus eros, vel viverra velit malesuada in. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Nulla quis vulputate augue. Pellentesque at dui dapibus turpis ullamcorper scelerisque nec non massa. In vestibulum ex eget dolor interdum, sed pulvinar felis molestie. In hac habitasse platea dictumst. Sed sed tellus aliquet leo scelerisque convallis sed vel nunc. Pellentesque elementum arcu laoreet, accumsan enim non, eleifend elit. Etiam at odio sed elit dignissim commodo gravida non ligula. Ut rhoncus vulputate cursus. Nam sit amet est neque. Morbi libero ligula, malesuada euismod leo eu, luctus consequat arcu. '),
(65, 'Zèbre', 1, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut vehicula, dolor nec porta rutrum, nunc nisi feugiat neque, in rutrum sapien tellus a nisi. Donec ullamcorper ipsum id sem pellentesque lacinia. Morbi blandit orci eleifend mi cursus, et eleifend orci malesuada. Integer volutpat dui a augue dapibus, at suscipit ante sagittis. Vestibulum iaculis tristique felis in placerat. Suspendisse placerat, magna in lacinia aliquet, libero felis tempor sapien, eu consectetur elit sapien vel odio. Ut condimentum lorem dui, nec vehicula justo pharetra quis. Mauris eget aliquam nibh, nec egestas augue. Praesent interdum metus non fringilla accumsan. Cras ex odio, semper at libero eu, rhoncus gravida elit. Fusce elementum felis ante, non fermentum velit convallis vitae. Quisque a dignissim velit. Nunc in fermentum tortor. Aenean at vestibulum leo. Praesent congue molestie lectus, id vulputate eros tempor sit amet.'),
(66, 'Gnou', 1, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut vehicula, dolor nec porta rutrum, nunc nisi feugiat neque, in rutrum sapien tellus a nisi. Donec ullamcorper ipsum id sem pellentesque lacinia. Morbi blandit orci eleifend mi cursus, et eleifend orci malesuada. Integer volutpat dui a augue dapibus, at suscipit ante sagittis. Vestibulum iaculis tristique felis in placerat. Suspendisse placerat, magna in lacinia aliquet, libero felis tempor sapien, eu consectetur elit sapien vel odio. Ut condimentum lorem dui, nec vehicula justo pharetra quis. Mauris eget aliquam nibh, nec egestas augue. Praesent interdum metus non fringilla accumsan. Cras ex odio, semper at libero eu, rhoncus gravida elit. Fusce elementum felis ante, non fermentum velit convallis vitae. Quisque a dignissim velit. Nunc in fermentum tortor. Aenean at vestibulum leo. Praesent congue molestie lectus, id vulputate eros tempor sit amet.'),
(67, 'Rhinocéros', 1, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut vehicula, dolor nec porta rutrum, nunc nisi feugiat neque, in rutrum sapien tellus a nisi. Donec ullamcorper ipsum id sem pellentesque lacinia. Morbi blandit orci eleifend mi cursus, et eleifend orci malesuada. Integer volutpat dui a augue dapibus, at suscipit ante sagittis. Vestibulum iaculis tristique felis in placerat. Suspendisse placerat, magna in lacinia aliquet, libero felis tempor sapien, eu consectetur elit sapien vel odio. Ut condimentum lorem dui, nec vehicula justo pharetra quis. Mauris eget aliquam nibh, nec egestas augue. Praesent interdum metus non fringilla accumsan. Cras ex odio, semper at libero eu, rhoncus gravida elit. Fusce elementum felis ante, non fermentum velit convallis vitae. Quisque a dignissim velit. Nunc in fermentum tortor. Aenean at vestibulum leo. Praesent congue molestie lectus, id vulputate eros tempor sit amet.');

-- --------------------------------------------------------

--
-- Structure de la table `diets`
--

CREATE TABLE `diets` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `color` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `diets`
--

INSERT INTO `diets` (`id`, `name`, `description`, `color`) VALUES
(1, 'Herbivore', 'Se nourrit exclusivement d\'herbes et de plantes', 'success'),
(2, 'Carnivore', 'Se nourrit exclusivement de viandes', 'danger'),
(3, 'Piscivore', 'Se nourrit exclusivement de poissons', 'primary'),
(4, 'Insectivore', 'Se nourrit exclusivement d\'insectes', 'warning'),
(5, 'Omnivore ', 'Peut se nourrir de tout', 'info');

-- --------------------------------------------------------

--
-- Structure de la table `jobs`
--

CREATE TABLE `jobs` (
  `id` int(11) NOT NULL,
  `post` varchar(255) NOT NULL,
  `role` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL CHECK (json_valid(`role`))
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `jobs`
--

INSERT INTO `jobs` (`id`, `post`, `role`) VALUES
(1, 'Agent d\'entretient', '[\"RECEPTION_STAFF\"]'),
(2, 'Agent de sécurité', '[\"RECEPTION_STAFF\"]'),
(3, 'Agent d\'accueil', '[\"RECEPTION_STAFF\"]'),
(4, 'Directeur', '[\"ADMIN\"]'),
(5, 'Directeur adjoint', '[\"ADMIN\"]'),
(6, 'R.H.', '[\"RH_STAFF\"]'),
(7, 'Vétérinaire', '[\"MEDICAL_STAFF\"]'),
(8, 'Assistant vétérinaire', '[\"MEDICAL_STAFF\"]'),
(9, 'Animateur', '[\"MEDICAL_STAFF\"]');

-- --------------------------------------------------------

--
-- Structure de la table `tickets`
--

CREATE TABLE `tickets` (
  `id` int(11) NOT NULL,
  `number` int(11) NOT NULL,
  `bought_at` datetime NOT NULL,
  `price` decimal(10,0) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `hired_at` date NOT NULL,
  `phone` varchar(20) NOT NULL,
  `email` varchar(255) NOT NULL,
  `job_id` int(11) NOT NULL,
  `token` varchar(255) DEFAULT NULL,
  `date_token_at` datetime DEFAULT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id`, `first_name`, `last_name`, `hired_at`, `phone`, `email`, `job_id`, `token`, `date_token_at`, `password`) VALUES
(1, 'Jasper', 'Brouette', '2022-09-01', '', 'jasper.brouette@gmail.com', 9, NULL, NULL, 'Test1234!'),
(2, 'Pépito', 'Brouette', '2022-08-02', '', 'pepito.brouette@gmail.com', 4, NULL, NULL, 'Test123!');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `activities`
--
ALTER TABLE `activities`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`employee_id`),
  ADD KEY `employee_id` (`employee_id`);

--
-- Index pour la table `activity_animal`
--
ALTER TABLE `activity_animal`
  ADD KEY `activity_category_activity_id` (`activity_id`),
  ADD KEY `animal_id` (`animal_id`);

--
-- Index pour la table `animals`
--
ALTER TABLE `animals`
  ADD PRIMARY KEY (`id`),
  ADD KEY `breed_id` (`breed_id`);

--
-- Index pour la table `breeds`
--
ALTER TABLE `breeds`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name` (`name`),
  ADD KEY `diet_id` (`diet_id`);

--
-- Index pour la table `diets`
--
ALTER TABLE `diets`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `tickets`
--
ALTER TABLE `tickets`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD KEY `job_id` (`job_id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `activities`
--
ALTER TABLE `activities`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT pour la table `animals`
--
ALTER TABLE `animals`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT pour la table `breeds`
--
ALTER TABLE `breeds`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=68;

--
-- AUTO_INCREMENT pour la table `diets`
--
ALTER TABLE `diets`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT pour la table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT pour la table `tickets`
--
ALTER TABLE `tickets`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `activity_animal`
--
ALTER TABLE `activity_animal`
  ADD CONSTRAINT `activity_animal_ibfk_2` FOREIGN KEY (`activity_id`) REFERENCES `activities` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `activity_animal_ibfk_3` FOREIGN KEY (`animal_id`) REFERENCES `animals` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `animals`
--
ALTER TABLE `animals`
  ADD CONSTRAINT `animals_ibfk_1` FOREIGN KEY (`breed_id`) REFERENCES `breeds` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `breeds`
--
ALTER TABLE `breeds`
  ADD CONSTRAINT `breeds_ibfk_1` FOREIGN KEY (`diet_id`) REFERENCES `diets` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`job_id`) REFERENCES `jobs` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
