-- Base de données : gestion_absences

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";

CREATE TABLE `absences` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_etudiant` int(11) NOT NULL,
  `id_prof` int(11) DEFAULT NULL,
  `dateAbsences` datetime NOT NULL,
  `module` varchar(100) NOT NULL,
  `justifiee` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` datetime DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

CREATE TABLE `classes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

INSERT INTO `classes` (`id`, `nom`) VALUES
(1, 'Groupe A'),
(2, 'Groupe B'),
(3, 'Groupe C'),
(4, 'Groupe D');

CREATE TABLE `cours` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_prof` int(11) NOT NULL,
  `classe_id` int(11) NOT NULL,
  `libelle` varchar(150) NOT NULL,
  `jour` varchar(20) NOT NULL,
  `horaire` varchar(50) NOT NULL,
  `salle` varchar(50) DEFAULT NULL,
  `created_at` datetime DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

INSERT INTO `cours` (`id`, `id_prof`, `classe_id`, `libelle`, `jour`, `horaire`, `salle`) VALUES
(5, 7, 4, 'R209', 'Lundi', '08:00-10:00', 'A201'),
(6, 9, 1, 'R209', 'Lundi', '08:00-10:00', 'A201');

CREATE TABLE `etudiant` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(100) NOT NULL,
  `prenom` varchar(100) NOT NULL,
  `email` varchar(150) DEFAULT NULL,
  `mdp` varchar(255) NOT NULL,
  `classe_id` int(11) DEFAULT NULL,
  `created_at` datetime DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

-- Mots de passe en clair
INSERT INTO `etudiant` (`id`, `nom`, `prenom`, `email`, `mdp`, `classe_id`) VALUES
(2, 'philippe', 'florian', 'florian.philippe@univ-rouen.fr', '1234', 0),
(3, 'Zouzane', 'Abdellah', 'zouzane.abdellah@univ-rouen.fr', '1234', 0),
(4, 'Gauthier', 'Rayan', 'gauthier.rayan@univ-rouen.fr', '1234', 0),
(5, 'Foura', 'Said', 'foura.said@univ-rouen.fr', '1234', 0);

CREATE TABLE `profs` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(100) NOT NULL,
  `prenom` varchar(100) NOT NULL,
  `email` varchar(150) DEFAULT NULL,
  `mdp` varchar(255) NOT NULL,
  `role` varchar(20) NOT NULL DEFAULT 'prof',
  `created_at` datetime DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

-- Mots de passe en clair
INSERT INTO `profs` (`id`, `nom`, `prenom`, `email`, `mdp`, `role`) VALUES
(7, 'Ennaji', 'Abdellatif', 'ennaji.abedellatif@univ-rouen.fr', 'prof123', 'prof'),
(8, 'Ravach', 'Gwennola', 'ravach.gwennola@univ-rouen.fr', 'prof123', 'prof'),
(9, 'Broussin', 'Christophe', 'broussin.christophe@univ-rouen.fr', 'prof123', 'prof');

CREATE TABLE `secretaires` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(100) NOT NULL,
  `prenom` varchar(100) NOT NULL,
  `email` varchar(150) DEFAULT NULL,
  `mdp` varchar(255) NOT NULL,
  `role` varchar(20) NOT NULL DEFAULT 'secretaire',
  `created_at` datetime DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

INSERT INTO `secretaires` (`id`, `nom`, `prenom`, `email`, `mdp`, `role`) VALUES
(1, 'rt', 'secrétariat', 'rt.secretariat@gmail.com', 'admin123', 'secretaire');

COMMIT;
