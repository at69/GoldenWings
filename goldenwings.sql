-- phpMyAdmin SQL Dump
-- version 3.4.9
-- http://www.phpmyadmin.net
--
-- Client: localhost
-- Généré le : Mer 20 Juin 2012 à 13:19
-- Version du serveur: 5.5.8
-- Version de PHP: 5.3.5

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données: `goldenwings`
--

-- --------------------------------------------------------

--
-- Structure de la table `journeylog`
--

CREATE TABLE IF NOT EXISTS `journeylog` (
  `idReservation` int(11) NOT NULL,
  `flightDate` date NOT NULL,
  `departureAirfield` varchar(20) COLLATE utf8_swedish_ci NOT NULL,
  `departureTime` time NOT NULL,
  `arrivalAirfield` varchar(20) COLLATE utf8_swedish_ci NOT NULL,
  `arrivalTime` time NOT NULL,
  `flightDuration` time NOT NULL DEFAULT '00:00:00',
  `idPlane` varchar(20) COLLATE utf8_swedish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_swedish_ci;

-- --------------------------------------------------------

--
-- Structure de la table `logbook`
--

CREATE TABLE IF NOT EXISTS `logbook` (
  `idMember` int(11) NOT NULL,
  `flightDate` date NOT NULL,
  `typePlane` varchar(20) COLLATE utf8_swedish_ci NOT NULL,
  `idPlane` varchar(20) COLLATE utf8_swedish_ci NOT NULL,
  `departureAirfield` varchar(20) COLLATE utf8_swedish_ci NOT NULL,
  `departureTime` time NOT NULL,
  `arrivalAirfield` varchar(20) COLLATE utf8_swedish_ci NOT NULL,
  `arrivalTime` time NOT NULL,
  `PICName` varchar(30) COLLATE utf8_swedish_ci NOT NULL,
  `FInumber` int(11) NOT NULL,
  `dualTimeReceived` time NOT NULL DEFAULT '00:00:00',
  `flightTimePIC` time NOT NULL DEFAULT '00:00:00',
  `totalFlightDuration` time NOT NULL DEFAULT '00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_swedish_ci;

-- --------------------------------------------------------

--
-- Structure de la table `members`
--

CREATE TABLE IF NOT EXISTS `members` (
  `firstName` varchar(24) COLLATE utf8_swedish_ci NOT NULL,
  `lastName` varchar(24) COLLATE utf8_swedish_ci NOT NULL,
  `idMember` int(11) NOT NULL AUTO_INCREMENT,
  `address` varchar(100) COLLATE utf8_swedish_ci DEFAULT NULL,
  `gender` varchar(12) COLLATE utf8_swedish_ci NOT NULL,
  `phone` int(10) DEFAULT NULL,
  `email` varchar(60) COLLATE utf8_swedish_ci NOT NULL,
  `password` varchar(60) COLLATE utf8_swedish_ci NOT NULL,
  `typeMember` varchar(20) COLLATE utf8_swedish_ci NOT NULL,
  `isAdmin` tinyint(1) NOT NULL,
  `feesPaid` tinyint(1) NOT NULL,
  `accBalance` float NOT NULL,
  PRIMARY KEY (`idMember`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_swedish_ci AUTO_INCREMENT=70 ;

-- --------------------------------------------------------

--
-- Structure de la table `pilots`
--

CREATE TABLE IF NOT EXISTS `pilots` (
  `firstName` varchar(24) COLLATE utf8_swedish_ci NOT NULL,
  `lastName` varchar(24) COLLATE utf8_swedish_ci NOT NULL,
  `idMember` int(11) NOT NULL AUTO_INCREMENT,
  `address` varchar(100) COLLATE utf8_swedish_ci DEFAULT NULL,
  `gender` varchar(12) COLLATE utf8_swedish_ci NOT NULL,
  `phone` int(10) DEFAULT NULL,
  `email` varchar(60) COLLATE utf8_swedish_ci NOT NULL,
  `password` varchar(60) COLLATE utf8_swedish_ci NOT NULL,
  `typeMember` varchar(20) COLLATE utf8_swedish_ci NOT NULL,
  `isAdmin` tinyint(1) NOT NULL,
  `feesPaid` tinyint(1) NOT NULL,
  `accBalance` float NOT NULL,
  `license` tinyint(1) NOT NULL,
  `FInumber` int(20) NOT NULL,
  PRIMARY KEY (`idMember`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_swedish_ci AUTO_INCREMENT=70 ;

-- --------------------------------------------------------

--
-- Structure de la table `planes`
--

CREATE TABLE IF NOT EXISTS `planes` (
  `typePlane` varchar(20) COLLATE utf8_swedish_ci NOT NULL,
  `idPlane` varchar(11) COLLATE utf8_swedish_ci NOT NULL,
  `locationCost` float NOT NULL,
  `availability` tinyint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`idPlane`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_swedish_ci;

-- --------------------------------------------------------

--
-- Structure de la table `reservation`
--

CREATE TABLE IF NOT EXISTS `reservation` (
  `idReservation` int(11) NOT NULL AUTO_INCREMENT,
  `idMember` int(11) NOT NULL,
  `idPlane` varchar(20) COLLATE utf8_swedish_ci NOT NULL,
  `dateReservation` date NOT NULL,
  `FInumber` int(20) NOT NULL,
  `dureeReservation` time NOT NULL,
  `status` varchar(20) COLLATE utf8_swedish_ci NOT NULL DEFAULT 'pending',
  PRIMARY KEY (`idReservation`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_swedish_ci AUTO_INCREMENT=38 ;

-- --------------------------------------------------------

--
-- Structure de la table `staff`
--

CREATE TABLE IF NOT EXISTS `staff` (
  `firstName` varchar(24) COLLATE utf8_swedish_ci NOT NULL,
  `lastName` varchar(24) COLLATE utf8_swedish_ci NOT NULL,
  `idMember` int(11) NOT NULL AUTO_INCREMENT,
  `address` varchar(100) COLLATE utf8_swedish_ci DEFAULT NULL,
  `gender` varchar(12) COLLATE utf8_swedish_ci NOT NULL,
  `phone` int(10) DEFAULT NULL,
  `email` varchar(60) COLLATE utf8_swedish_ci NOT NULL,
  `password` varchar(60) COLLATE utf8_swedish_ci NOT NULL,
  `typeMember` varchar(20) COLLATE utf8_swedish_ci NOT NULL,
  `isAdmin` tinyint(1) NOT NULL,
  `feesPaid` tinyint(1) NOT NULL,
  `accBalance` float NOT NULL,
  PRIMARY KEY (`idMember`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_swedish_ci AUTO_INCREMENT=68 ;


/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
