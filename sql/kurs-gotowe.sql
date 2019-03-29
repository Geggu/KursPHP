-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Czas generowania: 12 Gru 2017, 22:24
-- Wersja serwera: 10.1.28-MariaDB
-- Wersja PHP: 7.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Baza danych: `kurs`
--

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `kurs`
--

CREATE TABLE `kurs` (
  `ID_topic` int(11) NOT NULL,
  `topic` tinytext COLLATE utf8_unicode_ci NOT NULL,
  `content` mediumtext COLLATE utf8_unicode_ci NOT NULL,
  `ID_author` int(11) NOT NULL,
  `date` date NOT NULL,
  `verified` binary(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Zrzut danych tabeli `kurs`
--

INSERT INTO `kurs` (`ID_topic`, `topic`, `content`, `ID_author`, `date`, `verified`) VALUES
(1, '1) Osadanie PHP', '<Treść Objęta prawami autorskimi>', 0, '2017-12-12', 0x31),
(2, '2) Komentarze', '<Treść Objęta prawami autorskimi>', 0, '2017-12-12', 0x31),
(25, '3) Zmienne', '<Treść Objęta prawami autorskimi>', 0, '2017-12-12', 0x31),
(26, '4) Typy zmiennych', '<Treść Objęta prawami autorskimi>.', 0, '2017-12-12', 0x31),
(27, '5) StaÅ‚e', '<Treść Objęta prawami autorskimi>', 0, '2017-12-12', 0x31),
(29, '6) Operatory', '<Treść Objęta prawami autorskimi>', 0, '2017-12-12', 0x31),
(30, '7) Typy operatorÃ³w', '<Treść Objęta prawami autorskimi>', 0, '2017-12-12', 0x31),
(31, '8) Instrukcje warunkowe', '<Treść Objęta prawami autorskimi>', 0, '2017-12-12', 0x31),
(32, '9) Instrukcja Switch', '<Treść Objęta prawami autorskimi>', 0, '2017-12-12', 0x01),
(40, '10) PÄ™tla FOR', '<Treść Objęta prawami autorskimi>', 0, '2017-12-12', 0x31),
(41, '11) PÄ™tla WHILE', '<Treść Objęta prawami autorskimi>', 0, '2017-12-12', 0x31),
(42, '12) PÄ™tla do...while', '<Treść Objęta prawami autorskimi>', 0, '2017-12-12', 0x31),
(43, '13) Przerywanie pÄ™tli', '<Treść Objęta prawami autorskimi>', 0, '2017-12-12', 0x31),
(44, '14) Formularz', '<Treść Objęta prawami autorskimi>', 0, '2017-12-12', 0x01),
(45, '15) Pliki Cookies', '<Treść Objęta prawami autorskimi>', 0, '2017-12-12', 0x31),
(47, '16) Tablice', '<Treść Objęta prawami autorskimi>', 0, '2017-12-12', 0x01),
(48, '17) Funkcje', '<<Treść Objęta prawami autorskimi>', 0, '2017-12-12', 0x31),
(49, '18) ZasiÄ™g zmiennych', '<Treść Objęta prawami autorskimi>', 0, '2017-12-12', 0x31),
(50, '19) Instrukcje include i require', '<Treść Objęta prawami autorskimi>', 0, '2017-12-12', 0x31),
(51, '20) Sesje', '<Treść Objęta prawami autorskimi>', 0, '2017-12-12', 0x01),
(52, '21) Operacje na plikach', '<Treść Objęta prawami autorskimi>', 0, '2017-12-12', 0x01);
INSERT INTO `kurs` (`ID_topic`, `topic`, `content`, `ID_author`, `date`, `verified`) VALUES
(53, '22) Walidacja', '<Treść Objęta prawami autorskimi>', 0, '2017-12-12', 0x31);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `test`
--

CREATE TABLE `test` (
  `gaga` int(11) NOT NULL,
  `aaa` int(11) NOT NULL,
  `aaaaf` int(11) NOT NULL,
  `ggggh` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Zrzut danych tabeli `test`
--

INSERT INTO `test` (`gaga`, `aaa`, `aaaaf`, `ggggh`) VALUES
(1111, 1111, 111, 223),
(556, 22, 444, 656);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `users`
--

CREATE TABLE `users` (
  `ID_user` int(11) NOT NULL,
  `name` tinytext COLLATE utf8_unicode_ci NOT NULL,
  `password` tinytext COLLATE utf8_unicode_ci NOT NULL,
  `email` tinytext COLLATE utf8_unicode_ci NOT NULL,
  `user_group` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `verified` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Zrzut danych tabeli `users`
--

INSERT INTO `users` (`ID_user`, `name`, `password`, `email`, `user_group`, `verified`) VALUES
(0, 'Test', '4321', 'test@test.com', 'admin', 1);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `users_groups`
--

CREATE TABLE `users_groups` (
  `group_name` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `database_access` tinyint(1) NOT NULL DEFAULT '0',
  `admin_panel` tinyint(1) NOT NULL DEFAULT '0',
  `page_add` tinyint(1) NOT NULL DEFAULT '0',
  `permission_verify` tinyint(1) NOT NULL DEFAULT '0',
  `permission_edit` tinyint(1) NOT NULL DEFAULT '0',
  `permission_delete` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Zrzut danych tabeli `users_groups`
--

INSERT INTO `users_groups` (`group_name`, `database_access`, `admin_panel`, `page_add`, `permission_verify`, `permission_edit`, `permission_delete`) VALUES
('admin', 1, 1, 1, 1, 1, 1);

--
-- Indeksy dla zrzutów tabel
--

--
-- Indexes for table `kurs`
--
ALTER TABLE `kurs`
  ADD PRIMARY KEY (`ID_topic`),
  ADD KEY `ID_author` (`ID_author`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`ID_user`),
  ADD KEY `user_group` (`user_group`);

--
-- Indexes for table `users_groups`
--
ALTER TABLE `users_groups`
  ADD PRIMARY KEY (`group_name`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT dla tabeli `kurs`
--
ALTER TABLE `kurs`
  MODIFY `ID_topic` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;

--
-- Ograniczenia dla zrzutów tabel
--

--
-- Ograniczenia dla tabeli `kurs`
--
ALTER TABLE `kurs`
  ADD CONSTRAINT `kurs_ibfk_1` FOREIGN KEY (`ID_author`) REFERENCES `users` (`ID_user`);

--
-- Ograniczenia dla tabeli `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`user_group`) REFERENCES `users_groups` (`group_name`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
