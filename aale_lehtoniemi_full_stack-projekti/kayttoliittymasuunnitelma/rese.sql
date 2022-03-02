-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 21.05.2020 klo 16:24
-- Palvelimen versio: 10.4.11-MariaDB
-- PHP Version: 7.4.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `rese`
--

-- --------------------------------------------------------

--
-- Rakenne taululle `admin`
--

CREATE TABLE `admin` (
  `adminID` int(11) NOT NULL,
  `salasana` varchar(120) NOT NULL,
  `email` varchar(50) NOT NULL,
  `sukunimi` varchar(50) NOT NULL,
  `etunimi` varchar(50) NOT NULL,
  `puhelin` varchar(50) NOT NULL,
  `katuosoite` varchar(50) DEFAULT NULL,
  `postinumero` varchar(10) DEFAULT NULL,
  `paikkakunta` varchar(50) DEFAULT NULL,
  `rooli` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Vedos taulusta `admin`
--

INSERT INTO `admin` (`adminID`, `salasana`, `email`, `sukunimi`, `etunimi`, `puhelin`, `katuosoite`, `postinumero`, `paikkakunta`, `rooli`) VALUES
(3, '$2y$10$D8L0kUxwg7GbUrEOMJoJjOg4uL2QbLuODZSz7UkLCBViN9vHpXKXe', 'aale.lehtoniemi1@lapinamk.fi', 'Lehtoniemi', 'Aale', '0407780415', 'Teräväpää 1', '96460', 'Rovaniemi', 'Admin'),
(7, '$2y$10$bXebZ5t4VdYhgWcJUp9Tm.MM.BadgURWSn3ZFSzzm4XjahneecsIK', 'veini.virtanen@edu.lapinamk.fi', 'Virtanen', 'Veini', '', NULL, NULL, NULL, 'Admin');

-- --------------------------------------------------------

--
-- Rakenne taululle `kayttaja`
--

CREATE TABLE `kayttaja` (
  `kayttajaID` int(11) NOT NULL,
  `salasana` varchar(120) NOT NULL,
  `email` varchar(50) NOT NULL,
  `sukunimi` varchar(50) NOT NULL,
  `etunimi` varchar(50) NOT NULL,
  `puhelin` varchar(50) NOT NULL,
  `katuosoite` varchar(50) DEFAULT NULL,
  `postinumero` varchar(50) DEFAULT NULL,
  `paikkakunta` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Vedos taulusta `kayttaja`
--

INSERT INTO `kayttaja` (`kayttajaID`, `salasana`, `email`, `sukunimi`, `etunimi`, `puhelin`, `katuosoite`, `postinumero`, `paikkakunta`) VALUES
(2, '', 'ano.korhonen@edu.lapinamk.fi', 'Korhonen', 'Ano', '0403602816', 'Turhatie 1', '95400', 'Tornio'),
(4, '$2y$10$AjVkfyhHvnthri3kCUSBsOmx.yjSm9vO4ETtHMJ3RjR', 'ailo.korhonen@edu.lapinamk.fi', 'Korhonen', 'Ailo', '000000', 'Kauppakatu 58', '95400', 'TORNIO'),
(8, '$2y$10$vTOd5P27PJLoQFCWE2uZsOmM5m7tKqvrEkTf.YTZ8QAVBMxBXanZe', 'veini.virtanen@edu.lapinamk.fi', 'Virtanen', 'Veini', '0405678310', 'Korpitie 1, 95600 Ylitornio', NULL, NULL),
(14, '$2y$10$aid3MsucDeGflhXyWWTE1uuxUztUD.QkYY3We00mMfE4T5rx9cnf6', 'aale.lehtoniemi1@lapinamk.fi', 'Lehtoniemi', 'Aale', '0407780415', 'Teräväpää 1, 96460 Rovaniemi', NULL, NULL),
(16, '$2y$10$83hGtpJBz9MyTklk4rjnlus/EYPypqYwZMi/yycdc6k3pjW2GaPwu', 'jussi.juokale@edu.lapinamk.fi', 'Juokale', 'Jussi', '040567890', 'Turhatie 1, 95400 Tornio', NULL, NULL),
(17, '$2y$10$jyQCXRi119wgYgLLApBP.uYm95Of1Ncgy0GrkQv91q8I3GkKO1eBm', 'antti.anteroinen@edu.lapinamk.fi', 'Anteroinen', 'Antti', '05067890', 'Turhatie 2, 95400 Tornio', NULL, NULL),
(18, '$2y$10$YZvTEegvpFqk/QqKgT/Jg.61qkpf970I0LGx3avHUpQSTcehIybsq', 'aino.ainoa@edu.lapinamk.fi', 'Ainoa', 'Aino', '0400543210', 'Turhatie 3, 95400 Tornio', NULL, NULL);

-- --------------------------------------------------------

--
-- Rakenne taululle `resurssi`
--

CREATE TABLE `resurssi` (
  `resurssiID` int(11) NOT NULL,
  `kuvaus` text DEFAULT NULL,
  `kaytossa` tinyint(1) NOT NULL,
  `maksimiaika` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Vedos taulusta `resurssi`
--

INSERT INTO `resurssi` (`resurssiID`, `kuvaus`, `kaytossa`, `maksimiaika`) VALUES
(1, 'Huone 213', 1, 6);

-- --------------------------------------------------------

--
-- Rakenne taululle `varaus`
--

CREATE TABLE `varaus` (
  `varausID` int(11) NOT NULL,
  `kayttajaID` int(11) NOT NULL,
  `resurssiID` int(11) NOT NULL,
  `aloitusaika` datetime NOT NULL,
  `lopetusaika` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Vedos taulusta `varaus`
--

INSERT INTO `varaus` (`varausID`, `kayttajaID`, `resurssiID`, `aloitusaika`, `lopetusaika`) VALUES
(15, 16, 1, '2020-05-28 09:00:00', '2020-05-28 11:00:00'),
(16, 17, 1, '2020-05-25 09:00:00', '2020-05-25 11:00:00'),
(17, 18, 1, '2020-06-22 09:00:00', '2020-06-22 11:00:00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`adminID`);

--
-- Indexes for table `kayttaja`
--
ALTER TABLE `kayttaja`
  ADD PRIMARY KEY (`kayttajaID`);

--
-- Indexes for table `resurssi`
--
ALTER TABLE `resurssi`
  ADD PRIMARY KEY (`resurssiID`);

--
-- Indexes for table `varaus`
--
ALTER TABLE `varaus`
  ADD PRIMARY KEY (`varausID`),
  ADD KEY `kayttajaID` (`kayttajaID`),
  ADD KEY `resurssiID` (`resurssiID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `adminID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `kayttaja`
--
ALTER TABLE `kayttaja`
  MODIFY `kayttajaID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `resurssi`
--
ALTER TABLE `resurssi`
  MODIFY `resurssiID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `varaus`
--
ALTER TABLE `varaus`
  MODIFY `varausID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- Rajoitteet vedostauluille
--

--
-- Rajoitteet taululle `varaus`
--
ALTER TABLE `varaus`
  ADD CONSTRAINT `varaus_ibfk_1` FOREIGN KEY (`kayttajaID`) REFERENCES `kayttaja` (`kayttajaID`),
  ADD CONSTRAINT `varaus_ibfk_2` FOREIGN KEY (`resurssiID`) REFERENCES `resurssi` (`resurssiID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
