-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Czas generowania: 28 Mar 2023, 23:19
-- Wersja serwera: 10.4.27-MariaDB
-- Wersja PHP: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Baza danych: `ee09`
--

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `dyspozytorzy`
--

CREATE TABLE `dyspozytorzy` (
  `id` int(10) UNSIGNED NOT NULL,
  `imie` text DEFAULT NULL,
  `nazwisko` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Zrzut danych tabeli `dyspozytorzy`
--

INSERT INTO `dyspozytorzy` (`id`, `imie`, `nazwisko`) VALUES
(1, 'Ewelina', 'Nowak'),
(2, 'Krzysztof', 'Kowalewski'),
(3, 'Joanna', 'Pospieszalska'),
(4, 'Jan', 'Winny');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `ratownicy`
--

CREATE TABLE `ratownicy` (
  `id` int(10) UNSIGNED NOT NULL,
  `nrKaretki` int(10) UNSIGNED DEFAULT NULL,
  `ratownik1` text DEFAULT NULL,
  `ratownik2` text DEFAULT NULL,
  `ratownik3` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Zrzut danych tabeli `ratownicy`
--

INSERT INTO `ratownicy` (`id`, `nrKaretki`, `ratownik1`, `ratownik2`, `ratownik3`) VALUES
(1, 10, 'Krzysztof Lewandowski', 'Janina Gawlowska', 'Ewa Krasinska'),
(2, 8, 'Robert Marciniak', 'Robert Bialy', 'Krystyna Kowalska'),
(3, 45, 'Tomasz Kos', 'Janusz Sowa', 'Grzegorz Witkowski'),
(4, 13, 'Krzysztof Jerzykowski', 'Jan Niepokorski', 'Waldemar Skory');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `zgloszenia`
--

CREATE TABLE `zgloszenia` (
  `id` int(10) UNSIGNED NOT NULL,
  `ratownicy_id` int(10) UNSIGNED NOT NULL,
  `dyspozytorzy_id` int(10) UNSIGNED NOT NULL,
  `adres` text DEFAULT NULL,
  `pilne` tinyint(1) DEFAULT NULL,
  `czas_zgloszenia` time DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Zrzut danych tabeli `zgloszenia`
--

INSERT INTO `zgloszenia` (`id`, `ratownicy_id`, `dyspozytorzy_id`, `adres`, `pilne`, `czas_zgloszenia`) VALUES
(1, 3, 4, 'Warszawa, Marszalkowska 133/2', 0, '15:30:00'),
(2, 3, 4, 'Warszawa, Postepu 13/2', 0, '15:30:00'),
(3, 1, 1, 'Warszawa, Dluga 2', 1, '15:34:00'),
(4, 3, 2, 'Warszawa, Krasinskiego 34', 0, '15:45:00'),
(5, 4, 3, 'Warszawa, Edelmana 5/22', 0, '15:47:00'),
(6, 2, 4, 'Warszawa, Nowowiejska 56/1', 1, '16:20:00'),
(7, 1, 3, 'Warszawa, Poleczki 2/2', 0, '16:23:00');

--
-- Indeksy dla zrzutów tabel
--

--
-- Indeksy dla tabeli `dyspozytorzy`
--
ALTER TABLE `dyspozytorzy`
  ADD PRIMARY KEY (`id`);

--
-- Indeksy dla tabeli `ratownicy`
--
ALTER TABLE `ratownicy`
  ADD PRIMARY KEY (`id`);

--
-- Indeksy dla tabeli `zgloszenia`
--
ALTER TABLE `zgloszenia`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT dla zrzuconych tabel
--

--
-- AUTO_INCREMENT dla tabeli `dyspozytorzy`
--
ALTER TABLE `dyspozytorzy`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT dla tabeli `ratownicy`
--
ALTER TABLE `ratownicy`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT dla tabeli `zgloszenia`
--
ALTER TABLE `zgloszenia`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
