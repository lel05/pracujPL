-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Czas generowania: 11 Mar 2024, 07:00
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
-- Baza danych: `karieraplus`
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
  `phone_number` int(10) UNSIGNED NOT NULL,
  `avatar` text NOT NULL,
  `address` varchar(40) NOT NULL,
  `profession` varchar(40) NOT NULL,
  `profession_description` text NOT NULL,
  `job_experience` text NOT NULL,
  `education` text NOT NULL,
  `languages` text NOT NULL,
  `skills` text NOT NULL,
  `courses` text NOT NULL,
  `links` text DEFAULT NULL,
  `password` varchar(128) NOT NULL,
  `role` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_polish_ci;

--
-- Zrzut danych tabeli `user`
--

INSERT INTO `user` (`user_id`, `firstname`, `surname`, `birth_date`, `email`, `phone_number`, `avatar`, `address`, `profession`, `profession_description`, `job_experience`, `education`, `languages`, `skills`, `courses`, `links`, `password`, `role`) VALUES
(1, 'Jakub', 'Mitkowski', '2005-11-20', 'jakub.mitkowski1@gmail.com', 725004900, '65edaa3248fea6.46113747.jpg', '', '', '', 'okokokokokokokokokokokokokokokokokokokokokokokokokokokokokokokokokokokokokokokokokokokokokokokokokokokokokokokokokokokokokokokokokokokokokokokokokokokokokokokokokokokokokokokokokok', 'okokokokokokokokokokokokokokokokokokokokokokokokokokokokokokokokokokokokokokokokokokokokokokokokokokokokokokokokokokokokokokokokokokokokokokokokokokokokokokokokokokokokokokokokokok', '', 'okokokokokokokokokokokokokokokokokokokokokokokokokokokokokokokokokokokokokokokokokokokokokokokokokokokokokokokokokokokokokokokokokokokokokokokokokokokokokokokokokokokokokokokokokok', 'okokokokokokokokokokokokokokokokokokokokokokokokokokokokokokokokokokokokokokokokokokokokokokokokokokokokokokokokokokokokokokokokokokokokokokokokokokokokokokokokokokokokokokokokokok', 'https://www.hltv.org https://www.faceit.com/en/players/_Puchatek', '$2y$10$101pudr/2oL56aijkvgw4e7OZz1pnagOX5wj5NtwSjHeMJC0RLtdK', 'admin'),
(2, 'Mateusz', 'Brzęczyszczykiewicz', '1997-04-21', 'g.brzeczyk@gmail.com', 123456789, '', '', '', '', 'dadad', 'adada', '', 'adadad', 'adadad', 'https://hltv.org/', '$2y$10$C7x9fN62zWWXY1Bak4J/9ubxdCa2RGCUsGtdmiKldLO1DdgRQNu.a', 'user'),
(3, 'Adam', 'Kowalski', '2002-02-22', 'adam.kowalski@gmail.com', 668927484, '65edac16772be3.23553381.png', '', '', '', 'Doświadczenie zawodowe:Doświadczenie zawodowe:Doświadczenie zawodowe:Doświadczenie zawodowe:Doświadczenie zawodowe:Doświadczenie zawodowe:', 'Wykształcenie:Wykształcenie:Wykształcenie:Wykształcenie:Wykształcenie:Wykształcenie:Wykształcenie:Wykształcenie:Wykształcenie:Wykształcenie:Wykształcenie:', '', 'Wykształcenie:Wykształcenie:Wykształcenie:Wykształcenie:Wykształcenie:Wykształcenie:Wykształcenie:Wykształcenie:Wykształcenie:Wykształcenie:Wykształcenie:Wykształcenie:', 'Kursy:Kursy:Kursy:Kursy:Kursy:Kursy:Kursy:Kursy:Kursy:Kursy:Kursy:Kursy:Kursy:Kursy:Kursy:Kursy:Kursy:Kursy:Kursy:Kursy:Kursy:Kursy:Kursy:Kursy:', 'https://www.hltv.org', '$2y$10$mN6IbigXuVVocmYg.Zx2J.pgvZ4RWOx6ff4hg7UR7mhzZPY8qUSkC', 'user'),
(4, 'Mateusz', 'Pieniążek', '0000-00-00', 'm.p@gmail.com', 0, '', '', '', '', '', '', '', '', '', NULL, '$2y$10$XJsVT4lNmncEJBlhn8DTU.oViy7ipIZV2Iw5/0vaPSv6R4Y.fuu5m', 'user'),
(5, 'Bożydar', 'Kowalski', '0000-00-00', 'b.k@gmail.com', 0, '', '', '', '', '', '', '', '', '', NULL, '$2y$10$BgPLWfDQ5l9bjA0NtqhjJuWo23/LkVwcMU5GQVuMUjeWOs653do7y', 'user');

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
  MODIFY `user_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
