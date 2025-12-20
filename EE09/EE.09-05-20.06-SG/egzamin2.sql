-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Czas generowania: 27 Mar 2023, 00:57
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
-- Baza danych: `egzamin2`
--

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `kadra`
--

CREATE TABLE `kadra` (
  `id` int(10) UNSIGNED NOT NULL,
  `imie` text DEFAULT NULL,
  `nazwisko` text DEFAULT NULL,
  `stanowisko` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Zrzut danych tabeli `kadra`
--

INSERT INTO `kadra` (`id`, `imie`, `nazwisko`, `stanowisko`) VALUES
(1, 'Anna', 'Kowalska', 'dietetyk'),
(2, 'Jolanta', 'Szczesny', 'kosmetolog'),
(3, 'Aleksandra', 'Wilk', 'stylista'),
(4, 'Katarzyna', 'Nowak', 'fryzjer'),
(5, 'Piotr', 'Bartczak', 'fizjoterapeuta');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `uslugi`
--

CREATE TABLE `uslugi` (
  `id` int(10) UNSIGNED NOT NULL,
  `kadra_id` int(10) UNSIGNED NOT NULL,
  `rodzaj` int(10) UNSIGNED DEFAULT NULL,
  `nazwa` text DEFAULT NULL,
  `cena` double DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Zrzut danych tabeli `uslugi`
--

INSERT INTO `uslugi` (`id`, `kadra_id`, `rodzaj`, `nazwa`, `cena`) VALUES
(1, 2, 1, 'Piling enzymatyczny', 45),
(2, 5, 3, 'Masaz twarzy', 20),
(3, 2, 1, 'Maska', 30),
(4, 2, 1, 'Regulacja brwi', 5),
(5, 4, 2, 'Farbowanie', 50),
(6, 4, 2, 'Strzyzenie', 40),
(7, 1, 3, 'Ustalenie diety', 70),
(8, 2, 1, 'Henna', 10),
(9, 2, 1, 'Paznokcie', 90),
(10, 4, 2, 'Czesanie', 30);

--
-- Indeksy dla zrzutów tabel
--

--
-- Indeksy dla tabeli `kadra`
--
ALTER TABLE `kadra`
  ADD PRIMARY KEY (`id`);

--
-- Indeksy dla tabeli `uslugi`
--
ALTER TABLE `uslugi`
  ADD PRIMARY KEY (`id`),
  ADD KEY `uslugi_FKIndex1` (`kadra_id`);

--
-- AUTO_INCREMENT dla zrzuconych tabel
--

--
-- AUTO_INCREMENT dla tabeli `kadra`
--
ALTER TABLE `kadra`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT dla tabeli `uslugi`
--
ALTER TABLE `uslugi`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
