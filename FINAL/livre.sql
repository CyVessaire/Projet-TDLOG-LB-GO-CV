-- phpMyAdmin SQL Dump
-- version 4.5.2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Feb 02, 2016 at 10:04 
-- Server version: 10.1.9-MariaDB
-- PHP Version: 5.6.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `livre`
--

-- --------------------------------------------------------

--
-- Table structure for table `Livre_a`
--

CREATE TABLE `Livre_a` (
  `id` int(11) NOT NULL,
  `ISBN` bigint(20) NOT NULL,
  `Titre` varchar(1000) COLLATE utf8_bin NOT NULL,
  `Auteur` varchar(1000) COLLATE utf8_bin DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `Livre_a`
--

INSERT INTO `Livre_a` (`id`, `ISBN`, `Titre`, `Auteur`) VALUES
(1, 9782070643028, 'Harry Potter à l école des sorciers', 'J.K. Rowling , traduit de l anglais par Jean-François Ménard'),
(2, 9782266154116, 'Le seigneur des anneaux. Tome I, La communauté de l anneau', 'J. R. R. Tolkien , [traduit de l anglais par F. Ledoux].'),
(3, 9782070416219, 'L adversaire', 'Emmanuel Carrère.'),
(4, 9782070409310, 'Cyrano de Bergerac', 'Edmond Rostand , édition présentée, établie et annotée par Patrick Besnier.');

-- --------------------------------------------------------

--
-- Table structure for table `Livre_b`
--

CREATE TABLE `Livre_b` (
  `id` int(11) NOT NULL,
  `Editeur` varchar(255) CHARACTER SET latin1 DEFAULT NULL,
  `nbr_pages` int(11) DEFAULT NULL,
  `dateparution` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `Livre_b`
--

INSERT INTO `Livre_b` (`id`, `Editeur`, `nbr_pages`, `dateparution`) VALUES
(1, 'Gallimard Jeunesse', 311, 2007),
(2, 'Pocket', 697, 0),
(3, 'P.O.L.', 219, 0),
(4, 'Gallimard', 464, 0);

-- --------------------------------------------------------

--
-- Table structure for table `Livre_themes`
--

CREATE TABLE `Livre_themes` (
  `id` int(11) NOT NULL,
  `roman` int(11) NOT NULL DEFAULT '0',
  `policier` int(11) NOT NULL DEFAULT '0',
  `fantaisie` int(11) NOT NULL DEFAULT '0',
  `amour` int(11) NOT NULL DEFAULT '0',
  `humour` int(11) NOT NULL DEFAULT '0',
  `horreur` int(11) NOT NULL DEFAULT '0',
  `aventure` int(11) NOT NULL DEFAULT '0',
  `espionnage` int(11) NOT NULL DEFAULT '0',
  `conte` int(11) NOT NULL DEFAULT '0',
  `absurde` int(11) NOT NULL DEFAULT '0',
  `historique` int(11) NOT NULL DEFAULT '0',
  `memoire` int(11) NOT NULL DEFAULT '0',
  `antihero` int(11) NOT NULL DEFAULT '0',
  `antiquite` int(11) NOT NULL DEFAULT '0',
  `moyen_age` int(11) NOT NULL DEFAULT '0',
  `renaissance` int(11) NOT NULL DEFAULT '0',
  `tempsmoderne` int(11) NOT NULL DEFAULT '0',
  `lumiere` int(11) NOT NULL DEFAULT '0',
  `debut_XIX` int(11) NOT NULL DEFAULT '0',
  `fin_XIX` int(11) NOT NULL DEFAULT '0',
  `debutXX` int(11) NOT NULL DEFAULT '0',
  `milieu_XX` int(11) NOT NULL DEFAULT '0',
  `moderne` int(11) NOT NULL DEFAULT '0',
  `futur` int(11) NOT NULL DEFAULT '0',
  `epoque_autre` int(11) NOT NULL DEFAULT '0',
  `inspire` int(11) NOT NULL DEFAULT '0',
  `reflexion` int(11) NOT NULL DEFAULT '0',
  `surprise` int(11) NOT NULL DEFAULT '0',
  `reve` int(11) NOT NULL DEFAULT '0',
  `rire` int(11) NOT NULL DEFAULT '0',
  `peur` int(11) NOT NULL DEFAULT '0',
  `emotion` int(11) NOT NULL DEFAULT '0',
  `meh` int(11) NOT NULL DEFAULT '0',
  `poche` int(11) NOT NULL DEFAULT '0',
  `valise` int(11) NOT NULL DEFAULT '0',
  `facile` int(11) NOT NULL DEFAULT '0',
  `moyen` int(11) NOT NULL DEFAULT '0',
  `morceau` int(11) NOT NULL DEFAULT '0',
  `difficile` int(11) NOT NULL DEFAULT '0',
  `Total` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `Livre_themes`
--

INSERT INTO `Livre_themes` (`id`, `roman`, `policier`, `fantaisie`, `amour`, `humour`, `horreur`, `aventure`, `espionnage`, `conte`, `absurde`, `historique`, `memoire`, `antihero`, `antiquite`, `moyen_age`, `renaissance`, `tempsmoderne`, `lumiere`, `debut_XIX`, `fin_XIX`, `debutXX`, `milieu_XX`, `moderne`, `futur`, `epoque_autre`, `inspire`, `reflexion`, `surprise`, `reve`, `rire`, `peur`, `emotion`, `meh`, `poche`, `valise`, `facile`, `moyen`, `morceau`, `difficile`, `Total`) VALUES
(1, 0, 0, 2, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 2, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 2, 0, 0, 2, 0, 0, 2),
(2, 0, 0, 1, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 1, 0, 1),
(3, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 2, 0, 2, 2, 0, 0, 0, 0, 0, 2, 0, 0, 2, 0, 0, 2),
(4, 0, 0, 0, 1, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 1, 0, 0, 1, 0, 0, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `Livre_a`
--
ALTER TABLE `Livre_a`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `Livre_b`
--
ALTER TABLE `Livre_b`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `Livre_themes`
--
ALTER TABLE `Livre_themes`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `Livre_a`
--
ALTER TABLE `Livre_a`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `Livre_b`
--
ALTER TABLE `Livre_b`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `Livre_themes`
--
ALTER TABLE `Livre_themes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
