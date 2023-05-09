-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Gép: 127.0.0.1:3306
-- Létrehozás ideje: 2023. Máj 09. 21:00
-- Kiszolgáló verziója: 8.0.31
-- PHP verzió: 8.0.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Adatbázis: `paneldb`
--

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `erkelytipus`
--

DROP TABLE IF EXISTS `erkelytipus`;
CREATE TABLE IF NOT EXISTS `erkelytipus` (
  `erkelytipusID` int NOT NULL,
  `erkelyNev` varchar(15) NOT NULL,
  PRIMARY KEY (`erkelytipusID`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb3;

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `felhasznalo`
--

DROP TABLE IF EXISTS `felhasznalo`;
CREATE TABLE IF NOT EXISTS `felhasznalo` (
  `felhasznaloID` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `felhasznaloNev` varchar(10) NOT NULL default '',
  `vezeteknev` varchar(20) NOT NULL default '',
  `keresztnev` varchar(20) NOT NULL default '',
  `irsz` int NOT NULL default '0',
  `email` varchar(20) NOT NULL default '',
  `regDatum` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `jelszo` varchar(8) NOT NULL,
  PRIMARY KEY (`felhasznaloID`)  
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb3;

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `galeria`
--

DROP TABLE IF EXISTS `galeria`;
CREATE TABLE IF NOT EXISTS `galeria` (
  `kepID` int NOT NULL,
  `otletID` int NOT NULL,
  `sorszam` int NOT NULL,
  PRIMARY KEY (`sorszam`),
  KEY `kepID` (`kepID`),
  KEY `otletID` (`otletID`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb3;

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `idoszak`
--

DROP TABLE IF EXISTS `idoszak`;
CREATE TABLE IF NOT EXISTS `idoszak` (
  `idoszakID` int NOT NULL,
  `idoszak` varchar(20) NOT NULL,
  PRIMARY KEY (`idoszakID`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb3;

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `kepek`
--

DROP TABLE IF EXISTS `kepek`;
CREATE TABLE IF NOT EXISTS `kepek` (
  `kepID` int NOT NULL AUTO_INCREMENT,
  `tipusID` int NOT NULL,
  `felhasznaloID` int NOT NULL,
  `feltoltDatum` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `megjegyzes` text NOT NULL,
  PRIMARY KEY (`kepID`),
  UNIQUE KEY `kepID` (`kepID`),
  KEY `tipusID` (`tipusID`,`felhasznaloID`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb3;

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `keptipus`
--

DROP TABLE IF EXISTS `keptipus`;
CREATE TABLE IF NOT EXISTS `keptipus` (
  `keptipusID` int NOT NULL,
  `keptipusNev` varchar(10) NOT NULL,
  PRIMARY KEY (`keptipusID`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb3;

--
-- A tábla adatainak kiíratása `keptipus`
--

INSERT INTO `keptipus` (`keptipusID`, `keptipusNev`) VALUES
(1, 'alaprajz'),
(2, 'fenykep');

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `lakastipus`
--

DROP TABLE IF EXISTS `lakastipus`;
CREATE TABLE IF NOT EXISTS `lakastipus` (
  `lakasTipusID` int NOT NULL,
  `meret` int NOT NULL,
  `szobaszam` int NOT NULL,
  `kulonWC` tinyint(1) NOT NULL,
  `ablakosKonyha` tinyint(1) NOT NULL,
  `erkelytipusID` int NOT NULL,
  `alaprajzID` int NOT NULL,
  PRIMARY KEY (`lakasTipusID`),
  KEY `erkelytipusID` (`erkelytipusID`,`alaprajzID`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb3;

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `lakotelep`
--

DROP TABLE IF EXISTS `lakotelep`;
CREATE TABLE IF NOT EXISTS `lakotelep` (
  `lakotelepID` int NOT NULL,
  `ltpNev` varchar(50) NOT NULL,
  `kerulet` int NOT NULL,
  `terkepID` int NOT NULL,
  `idoszakID` int NOT NULL,
  `leiras` int NOT NULL,
  `fokepID` int NOT NULL,
  PRIMARY KEY (`lakotelepID`),
  KEY `terkepID` (`terkepID`,`idoszakID`,`fokepID`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb3;

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `ltp-lakastipus`
--

DROP TABLE IF EXISTS `ltp-lakastipus`;
CREATE TABLE IF NOT EXISTS `ltp-lakastipus` (
  `lakotelepID` int NOT NULL,
  `lakastipusID` int NOT NULL,
  `darab` int NOT NULL,
  `sorszam` int NOT NULL,
  PRIMARY KEY (`sorszam`),
  KEY `lakotelepID` (`lakotelepID`,`lakastipusID`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb3;

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `otlet`
--

DROP TABLE IF EXISTS `otlet`;
CREATE TABLE IF NOT EXISTS `otlet` (
  `otletID` int NOT NULL,
  `felhasznaloID` int NOT NULL,
  `lakastipusID` int NOT NULL,
  `megnevezes` varchar(50) NOT NULL,
  `alaprajzValt` tinyint(1) NOT NULL,
  `alaprajzID` int NOT NULL,
  `leiras` text NOT NULL,
  PRIMARY KEY (`otletID`),
  KEY `felhasznaloID` (`felhasznaloID`,`alaprajzID`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb3;

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `terkep`
--

DROP TABLE IF EXISTS `terkep`;
CREATE TABLE IF NOT EXISTS `terkep` (
  `terkepID` int NOT NULL,
  `terkepLink` varchar(40) NOT NULL,
  PRIMARY KEY (`terkepID`),
  UNIQUE KEY `terkepID` (`terkepID`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb3;

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `varos`
--

DROP TABLE IF EXISTS `varos`;
CREATE TABLE IF NOT EXISTS `varos` (
  `irsz` int NOT NULL,
  `varosNev` varchar(45) CHARACTER SET utf8mb3 COLLATE utf8mb3_hungarian_ci DEFAULT NULL,
  `kerulet` int NOT NULL,
  PRIMARY KEY (`irsz`),
  UNIQUE KEY `irsz_UNIQUE` (`irsz`),
  KEY `kerulet` (`kerulet`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- A tábla adatainak kiíratása `varos`
--

INSERT INTO `varos` (`irsz`, `varosNev`, `kerulet`) VALUES
(1221, 'Budapest', 22),
(1222, 'Budapest', 22),
(1223, 'Budapest', 22),
(1224, 'Budapest', 22);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
