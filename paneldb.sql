-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Gép: 127.0.0.1:3306
-- Létrehozás ideje: 2023. Máj 18. 13:45
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
-- Tábla szerkezet ehhez a táblához `felhasznalok`
--

DROP TABLE IF EXISTS `felhasznalok`;
CREATE TABLE IF NOT EXISTS `felhasznalok` (
  `id` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `csaladi_nev` varchar(45) COLLATE utf8mb4_hungarian_ci NOT NULL DEFAULT '',
  `uto_nev` varchar(45) COLLATE utf8mb4_hungarian_ci NOT NULL DEFAULT '',
  `bejelentkezes` varchar(12) COLLATE utf8mb4_hungarian_ci NOT NULL DEFAULT '',
  `jelszo` varchar(40) COLLATE utf8mb4_hungarian_ci NOT NULL DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_hungarian_ci;

--
-- A tábla adatainak kiíratása `felhasznalok`
--

INSERT INTO `felhasznalok` (`id`, `csaladi_nev`, `uto_nev`, `bejelentkezes`, `jelszo`) VALUES
(1, 'ba', 'ba', 'baba', 'b78b647728101ba462182b4c7e5b2ca57b9f5a99'),
(2, 'na', 'na', 'nana', '893a6a6789d8aef157ac0615ac3855587daaac07');

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
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_hungarian_ci;

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `idoszak`
--

DROP TABLE IF EXISTS `idoszak`;
CREATE TABLE IF NOT EXISTS `idoszak` (
  `idoszakID` int NOT NULL,
  `idoszak` varchar(20) COLLATE utf8mb4_hungarian_ci NOT NULL,
  PRIMARY KEY (`idoszakID`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_hungarian_ci;

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `kepek`
--

DROP TABLE IF EXISTS `kepek`;
CREATE TABLE IF NOT EXISTS `kepek` (
  `kepID` int NOT NULL AUTO_INCREMENT,
  `kepNev` varchar(10) COLLATE utf8mb4_hungarian_ci NOT NULL,
  `tipusID` int NOT NULL,
  `felhasznaloID` int NOT NULL,
  `feltoltDatum` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `megjegyzes` text COLLATE utf8mb4_hungarian_ci NOT NULL,
  PRIMARY KEY (`kepID`),
  UNIQUE KEY `kepID` (`kepID`),
  KEY `tipusID` (`tipusID`,`felhasznaloID`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_hungarian_ci;

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `keptipus`
--

DROP TABLE IF EXISTS `keptipus`;
CREATE TABLE IF NOT EXISTS `keptipus` (
  `keptipusID` int NOT NULL,
  `keptipusNev` varchar(10) COLLATE utf8mb4_hungarian_ci NOT NULL,
  PRIMARY KEY (`keptipusID`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_hungarian_ci;

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
  `lakasTipusID` int NOT NULL AUTO_INCREMENT,
  `meret` int NOT NULL,
  `szobaszam` int NOT NULL,
  `kulonWC` varchar(5) COLLATE utf8mb4_hungarian_ci NOT NULL,
  `ablakosKonyha` varchar(5) COLLATE utf8mb4_hungarian_ci NOT NULL,
  `erkelytipus` varchar(20) COLLATE utf8mb4_hungarian_ci NOT NULL,
  `alaprajzID` int NOT NULL,
  PRIMARY KEY (`lakasTipusID`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_hungarian_ci;

--
-- A tábla adatainak kiíratása `lakastipus`
--

INSERT INTO `lakastipus` (`lakasTipusID`, `meret`, `szobaszam`, `kulonWC`, `ablakosKonyha`, `erkelytipus`, `alaprajzID`) VALUES
(3, 40, 1, 'igen', 'nem', 'Francia erkély', 70),
(2, 50, 3, 'Igen', 'Nem', 'Erkély', 1);

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `lakotelep`
--

DROP TABLE IF EXISTS `lakotelep`;
CREATE TABLE IF NOT EXISTS `lakotelep` (
  `lakotelepID` int NOT NULL AUTO_INCREMENT,
  `ltpNev` varchar(50) COLLATE utf8mb4_hungarian_ci NOT NULL,
  `idoszak` varchar(20) COLLATE utf8mb4_hungarian_ci NOT NULL,
  `kerulet` int NOT NULL,
  `terkepID` int NOT NULL,
  `leiras` int NOT NULL,
  `fokepID` int NOT NULL,
  PRIMARY KEY (`lakotelepID`),
  KEY `terkepID` (`terkepID`,`fokepID`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_hungarian_ci;

--
-- A tábla adatainak kiíratása `lakotelep`
--

INSERT INTO `lakotelep` (`lakotelepID`, `ltpNev`, `idoszak`, `kerulet`, `terkepID`, `leiras`, `fokepID`) VALUES
(1, 'Rózsakerti lakótelep', '80-as évek', 22, 0, 0, 0),
(2, 'Gazdagréti lakótelep', '70-as évek', 11, 0, 0, 0);

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
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_hungarian_ci;

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `otlet`
--

DROP TABLE IF EXISTS `otlet`;
CREATE TABLE IF NOT EXISTS `otlet` (
  `otletID` int NOT NULL,
  `felhasznaloID` int NOT NULL,
  `lakastipusID` int NOT NULL,
  `megnevezes` varchar(50) COLLATE utf8mb4_hungarian_ci NOT NULL,
  `alaprajzValt` tinyint(1) NOT NULL,
  `alaprajzID` int NOT NULL,
  `leiras` text COLLATE utf8mb4_hungarian_ci NOT NULL,
  PRIMARY KEY (`otletID`),
  KEY `felhasznaloID` (`felhasznaloID`,`alaprajzID`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_hungarian_ci;

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `terkep`
--

DROP TABLE IF EXISTS `terkep`;
CREATE TABLE IF NOT EXISTS `terkep` (
  `terkepID` int NOT NULL,
  `terkepLink` varchar(40) COLLATE utf8mb4_hungarian_ci NOT NULL,
  PRIMARY KEY (`terkepID`),
  UNIQUE KEY `terkepID` (`terkepID`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_hungarian_ci;

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `uzenetek`
--

DROP TABLE IF EXISTS `uzenetek`;
CREATE TABLE IF NOT EXISTS `uzenetek` (
  `uzenetID` int NOT NULL AUTO_INCREMENT,
  `felhasznalo` varchar(16) COLLATE utf8mb4_hungarian_ci NOT NULL,
  `datum` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `iras` text COLLATE utf8mb4_hungarian_ci NOT NULL,
  PRIMARY KEY (`uzenetID`)
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_hungarian_ci;

--
-- A tábla adatainak kiíratása `uzenetek`
--

INSERT INTO `uzenetek` (`uzenetID`, `felhasznalo`, `datum`, `iras`) VALUES
(1, 'vendeg', '0000-00-00 00:00:00', 'bababab'),
(2, 'vendeg', '0000-00-00 00:00:00', 'bababab'),
(3, 'vendeg', '0000-00-00 00:00:00', 'bababab'),
(4, 'vendeg', '0000-00-00 00:00:00', 'bababab'),
(5, 'vendeg', '0000-00-00 00:00:00', 'chgíydghc'),
(6, 'vendeg', '0000-00-00 00:00:00', 'chgíydghc'),
(7, 'baba', '0000-00-00 00:00:00', 'sfghsfgsf'),
(8, 'baba', '2023-05-18 10:28:02', 'asdfasd'),
(9, 'baba', '2023-05-18 12:40:12', 'sdfghdf'),
(10, 'vendeg', '2023-05-18 12:47:29', 'uzenet');

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
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_hungarian_ci;

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
