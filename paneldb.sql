-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Gép: mysql.omega:3306
-- Létrehozás ideje: 2023. Máj 21. 22:59
-- Kiszolgáló verziója: 5.7.40-log
-- PHP verzió: 5.6.40

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
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

CREATE TABLE `felhasznalok` (
  `id` int(10) UNSIGNED NOT NULL,
  `csaladi_nev` varchar(45) COLLATE utf8mb4_hungarian_ci NOT NULL DEFAULT '',
  `uto_nev` varchar(45) COLLATE utf8mb4_hungarian_ci NOT NULL DEFAULT '',
  `bejelentkezes` varchar(12) COLLATE utf8mb4_hungarian_ci NOT NULL DEFAULT '',
  `jelszo` varchar(40) COLLATE utf8mb4_hungarian_ci NOT NULL DEFAULT ''
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_hungarian_ci;

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

CREATE TABLE `galeria` (
  `kepID` int(11) NOT NULL,
  `otletID` int(11) NOT NULL,
  `sorszam` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_hungarian_ci;

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `idoszak`
--

CREATE TABLE `idoszak` (
  `idoszakID` int(11) NOT NULL,
  `idoszak` varchar(20) COLLATE utf8mb4_hungarian_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_hungarian_ci;

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `kepek`
--

CREATE TABLE `kepek` (
  `kepID` int(11) NOT NULL,
  `kepNev` varchar(10) COLLATE utf8mb4_hungarian_ci NOT NULL,
  `tipusID` int(11) NOT NULL,
  `felhasznaloID` int(11) NOT NULL,
  `feltoltDatum` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `megjegyzes` text COLLATE utf8mb4_hungarian_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_hungarian_ci;

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `keptipus`
--

CREATE TABLE `keptipus` (
  `keptipusID` int(11) NOT NULL,
  `keptipusNev` varchar(10) COLLATE utf8mb4_hungarian_ci NOT NULL
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

CREATE TABLE `lakastipus` (
  `lakasTipusID` int(11) NOT NULL,
  `meret` int(11) NOT NULL,
  `szobaszam` int(11) NOT NULL,
  `kulonWC` varchar(5) COLLATE utf8mb4_hungarian_ci NOT NULL,
  `ablakosKonyha` varchar(5) COLLATE utf8mb4_hungarian_ci NOT NULL,
  `erkelytipus` varchar(20) COLLATE utf8mb4_hungarian_ci NOT NULL,
  `alaprajzID` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_hungarian_ci;

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

CREATE TABLE `lakotelep` (
  `lakotelepID` int(11) NOT NULL,
  `ltpNev` varchar(50) COLLATE utf8mb4_hungarian_ci NOT NULL,
  `idoszak` varchar(20) COLLATE utf8mb4_hungarian_ci NOT NULL,
  `kerulet` int(11) NOT NULL,
  `terkepID` int(11) NOT NULL,
  `leiras` int(11) NOT NULL,
  `fokepID` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_hungarian_ci;

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

CREATE TABLE `ltp-lakastipus` (
  `lakotelepID` int(11) NOT NULL,
  `lakastipusID` int(11) NOT NULL,
  `darab` int(11) NOT NULL,
  `sorszam` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_hungarian_ci;

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `otlet`
--

CREATE TABLE `otlet` (
  `otletID` int(11) NOT NULL,
  `felhasznaloID` varchar(11) COLLATE utf8mb4_hungarian_ci NOT NULL,
  `lakastipusID` int(11) NOT NULL,
  `megnevezes` varchar(50) COLLATE utf8mb4_hungarian_ci NOT NULL,
  `alaprajzValt` tinyint(1) NOT NULL,
  `alaprajzID` int(11) NOT NULL,
  `leiras` text COLLATE utf8mb4_hungarian_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_hungarian_ci;

--
-- A tábla adatainak kiíratása `otlet`
--

INSERT INTO `otlet` (`otletID`, `felhasznaloID`, `lakastipusID`, `megnevezes`, `alaprajzValt`, `alaprajzID`, `leiras`) VALUES
(1, '0', 2, 'alakítás', 0, 0, 'szétszedtük és összeraktuk'),
(2, '0', 2, 'újítás', 0, 0, 'kiütöttük a falat'),
(3, 'baba', 2, 'alakítás', 0, 0, 'szépítettül');

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `terkep`
--

CREATE TABLE `terkep` (
  `terkepID` int(11) NOT NULL,
  `terkepLink` varchar(40) COLLATE utf8mb4_hungarian_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_hungarian_ci;

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `uzenetek`
--

CREATE TABLE `uzenetek` (
  `uzenetID` int(11) NOT NULL,
  `felhasznalo` varchar(16) COLLATE utf8mb4_hungarian_ci NOT NULL,
  `datum` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `iras` text COLLATE utf8mb4_hungarian_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_hungarian_ci;

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
(10, 'vendeg', '2023-05-18 12:47:29', 'uzenet'),
(11, 'baba', '2023-05-20 04:29:42', 'dhagdsf'),
(12, 'vendeg', '2023-05-20 04:49:28', '');

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `varos`
--

CREATE TABLE `varos` (
  `irsz` int(11) NOT NULL,
  `varosNev` varchar(45) CHARACTER SET utf8 COLLATE utf8_hungarian_ci DEFAULT NULL,
  `kerulet` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_hungarian_ci;

--
-- A tábla adatainak kiíratása `varos`
--

INSERT INTO `varos` (`irsz`, `varosNev`, `kerulet`) VALUES
(1221, 'Budapest', 22),
(1222, 'Budapest', 22),
(1223, 'Budapest', 22),
(1224, 'Budapest', 22);

--
-- Indexek a kiírt táblákhoz
--

--
-- A tábla indexei `felhasznalok`
--
ALTER TABLE `felhasznalok`
  ADD PRIMARY KEY (`id`);

--
-- A tábla indexei `galeria`
--
ALTER TABLE `galeria`
  ADD PRIMARY KEY (`sorszam`),
  ADD KEY `kepID` (`kepID`),
  ADD KEY `otletID` (`otletID`);

--
-- A tábla indexei `idoszak`
--
ALTER TABLE `idoszak`
  ADD PRIMARY KEY (`idoszakID`);

--
-- A tábla indexei `kepek`
--
ALTER TABLE `kepek`
  ADD PRIMARY KEY (`kepID`),
  ADD UNIQUE KEY `kepID` (`kepID`),
  ADD KEY `tipusID` (`tipusID`,`felhasznaloID`);

--
-- A tábla indexei `keptipus`
--
ALTER TABLE `keptipus`
  ADD PRIMARY KEY (`keptipusID`);

--
-- A tábla indexei `lakastipus`
--
ALTER TABLE `lakastipus`
  ADD PRIMARY KEY (`lakasTipusID`);

--
-- A tábla indexei `lakotelep`
--
ALTER TABLE `lakotelep`
  ADD PRIMARY KEY (`lakotelepID`),
  ADD KEY `terkepID` (`terkepID`,`fokepID`);

--
-- A tábla indexei `ltp-lakastipus`
--
ALTER TABLE `ltp-lakastipus`
  ADD PRIMARY KEY (`sorszam`),
  ADD KEY `lakotelepID` (`lakotelepID`,`lakastipusID`);

--
-- A tábla indexei `otlet`
--
ALTER TABLE `otlet`
  ADD PRIMARY KEY (`otletID`),
  ADD KEY `felhasznaloID` (`felhasznaloID`,`alaprajzID`);

--
-- A tábla indexei `terkep`
--
ALTER TABLE `terkep`
  ADD PRIMARY KEY (`terkepID`),
  ADD UNIQUE KEY `terkepID` (`terkepID`);

--
-- A tábla indexei `uzenetek`
--
ALTER TABLE `uzenetek`
  ADD PRIMARY KEY (`uzenetID`);

--
-- A tábla indexei `varos`
--
ALTER TABLE `varos`
  ADD PRIMARY KEY (`irsz`),
  ADD UNIQUE KEY `irsz_UNIQUE` (`irsz`),
  ADD KEY `kerulet` (`kerulet`);

--
-- A kiírt táblák AUTO_INCREMENT értéke
--

--
-- AUTO_INCREMENT a táblához `felhasznalok`
--
ALTER TABLE `felhasznalok`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT a táblához `kepek`
--
ALTER TABLE `kepek`
  MODIFY `kepID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT a táblához `lakastipus`
--
ALTER TABLE `lakastipus`
  MODIFY `lakasTipusID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT a táblához `lakotelep`
--
ALTER TABLE `lakotelep`
  MODIFY `lakotelepID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT a táblához `otlet`
--
ALTER TABLE `otlet`
  MODIFY `otletID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT a táblához `uzenetek`
--
ALTER TABLE `uzenetek`
  MODIFY `uzenetID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
