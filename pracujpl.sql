-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Czas generowania: 05 Lis 2023, 23:34
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
-- Baza danych: `pracujpl`
--

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `category`
--

CREATE TABLE `category` (
  `category_id` int(10) UNSIGNED NOT NULL,
  `name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_polish_ci;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `company`
--

CREATE TABLE `company` (
  `company_id` int(10) UNSIGNED NOT NULL,
  `name` varchar(50) NOT NULL,
  `localization` text NOT NULL,
  `logo` text NOT NULL,
  `description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_polish_ci;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `offer`
--

CREATE TABLE `offer` (
  `offer_id` int(10) UNSIGNED NOT NULL,
  `company_id` int(10) UNSIGNED NOT NULL,
  `profession_name` varchar(40) NOT NULL,
  `profession_level` varchar(40) NOT NULL,
  `type_of_contract` varchar(50) NOT NULL,
  `employment` varchar(50) NOT NULL,
  `type_of_job` varchar(30) NOT NULL,
  `salary` text NOT NULL,
  `days` text NOT NULL,
  `hours` text NOT NULL,
  `expired` date NOT NULL,
  `category_id` int(10) UNSIGNED NOT NULL,
  `duties` text NOT NULL,
  `requirements` text NOT NULL,
  `benefits` int(11) NOT NULL,
  `application_count` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_polish_ci;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `user`
--

CREATE TABLE `user` (
  `user_id` int(10) UNSIGNED NOT NULL,
  `firstname` varchar(30) NOT NULL,
  `surname` varchar(30) NOT NULL,
  `birth_date` date NOT NULL,
  `email` varchar(50) NOT NULL,
  `number` int(10) UNSIGNED NOT NULL,
  `avatar` text NOT NULL,
  `address` varchar(40) NOT NULL,
  `profession` varchar(40) NOT NULL,
  `profession_description` text NOT NULL,
  `experience` text NOT NULL,
  `job_experience` text NOT NULL,
  `education` text NOT NULL,
  `languages` text NOT NULL,
  `skills` text NOT NULL,
  `courses` text NOT NULL,
  `links` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_polish_ci;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `user_lastwatched`
--

CREATE TABLE `user_lastwatched` (
  `id` tinyint(3) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `offer_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_polish_ci;

--
-- Indeksy dla zrzutów tabel
--

--
-- Indeksy dla tabeli `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT dla zrzuconych tabel
--

--
-- AUTO_INCREMENT dla tabeli `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
