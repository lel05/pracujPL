-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Cze 16, 2024 at 11:29 PM
-- Wersja serwera: 10.4.32-MariaDB
-- Wersja PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `karieraplus`
--

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `applications`
--

CREATE TABLE `applications` (
  `user_id` int(11) NOT NULL,
  `offer_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `applications`
--

INSERT INTO `applications` (`user_id`, `offer_id`) VALUES
(1, 2);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `category`
--

CREATE TABLE `category` (
  `category_id` int(10) UNSIGNED NOT NULL,
  `name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_polish_ci;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`category_id`, `name`) VALUES
(1, 'IT i telekomunikacja'),
(2, 'Finanse i bankowość'),
(3, 'Marketing i reklama'),
(4, 'Sprzedaż i handel'),
(5, 'Edukacja'),
(6, 'Medycyna i opieka zdrowotna'),
(7, 'Prawo'),
(8, 'Transport i logistyka'),
(9, 'Budownictwo i nieruchomości'),
(10, 'Produkcja i przemysł'),
(11, 'Usługi'),
(12, 'Horeca (Hotelarstwo, Gastronomia, Catering)'),
(13, 'Rolnictwo');

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

--
-- Dumping data for table `company`
--

INSERT INTO `company` (`company_id`, `name`, `localization`, `logo`, `description`) VALUES
(1, 'ZUP Emiter Sp. z o.o.', 'Limanowa', 'EmiterLogo.png', 'ZUP Emiter Sp. z o.o. to firma, która od ponad 30 lat specjalizuje się w projektowaniu, produkcji i dystrybucji obudów poliestrowych, metalowych, przekładników prądowych oraz w prefabrykacji rozdzielnic elektrycznych.  Należymy do liderów w produkcji i sprzedaży złącz oraz rozdzielnic elektrycznych w obudowach z materiału termoutwardzalnego.'),
(2, 'Nvidia', 'Santa Clara, Kalifornia, Stany Zjednoczone', 'NvidiaLogo.png', 'Amerykańskie przedsiębiorstwo komputerowe będące jednym z największych na świecie producentów procesorów graficznych i innych układów scalonych przeznaczonych na rynek komputerowy. NVIDIA jest także głównym dostawcą kart graficznych dla komputerów osobistych ze swoją standardową serią GeForce.');

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

--
-- Dumping data for table `offer`
--

INSERT INTO `offer` (`offer_id`, `company_id`, `profession_name`, `profession_level`, `type_of_contract`, `employment`, `type_of_job`, `salary`, `days`, `hours`, `expired`, `category_id`, `duties`, `requirements`, `benefits`, `application_count`) VALUES
(1, 2, 'Woźny', '', 'Umowa na czas nieokreślony', '', 'Sprzątanie ten tego', '3500zł', 'pon-sob', '7:00-20:00', '2024-07-03', 11, 'aksjhdgfkjahsgdf.', 'alisudhflkjashdlkjf,\r\nalkjdshfkljashdkljf.', 0, 0),
(2, 1, 'Programista', '', 'Umowa na czas określony', '', 'Programowanie w PHP, SQL', '5000zł', 'pon-pt', '9:00-17:00', '2024-06-20', 1, 'askudyhfgkjahsgdfkjahsdf.\r\n', 'ahsdgfjkhasdgkfjhagsdf,\r\nalshjdgfkjashdgfkjhasgdf,\r\nasidfgaksjhdgfkjashdgf.', 0, 1),
(3, 1, 'Sekretarz/Sekretarka', '', 'Umowa na czas określony', '', 'tak', '5000zł', 'pon-pt', '9:00-17:00', '2024-06-27', 11, 'kjhasgdjhGASJKHD', 'KASGDFKHJASGKJgkjgkjaszdgfkjasdf', 0, 0),
(4, 2, 'Programista', '', 'Umowa na czas określony', '', 'tak', '5000zł', 'pon-pt', '9:00-17:00', '2024-06-30', 1, 'asjdhgfjkashgdfkjahsgdf', 'jjzghsdfjkashkldjffhlkjasf', 0, 0),
(5, 1, 'Programista', '', 'Umowa na czas określony', '', 'Programowanie w PHP, SQL', '5000zł', 'pon-pt', '9:00-17:00', '2024-06-14', 1, 'asdfasdf', 'asdfasdf', 0, 0);

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
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `firstname`, `surname`, `birth_date`, `email`, `phone_number`, `avatar`, `address`, `profession`, `profession_description`, `job_experience`, `education`, `languages`, `skills`, `courses`, `links`, `password`, `role`) VALUES
(1, 'Jakub', 'Mitkowski', '2005-11-20', 'jakub.mitkowski1@gmail.com', 725004900, '65edaa3248fea6.46113747.jpg', '', '', '', 'okokokokokokokokokokokokokokokokokokokokokokokokokokokokokokokokokokokokokokokokokokokokokokokokokokokokokokokokokokokokokokokokokokokokokokokokokokokokokokokokokokokokokokokokokok', 'okokokokokokokokokokokokokokokokokokokokokokokokokokokokokokokokokokokokokokokokokokokokokokokokokokokokokokokokokokokokokokokokokokokokokokokokokokokokokokokokokokokokokokokokokok', '', 'okokokokokokokokokokokokokokokokokokokokokokokokokokokokokokokokokokokokokokokokokokokokokokokokokokokokokokokokokokokokokokokokokokokokokokokokokokokokokokokokokokokokokokokokokok', 'okokokokokokokokokokokokokokokokokokokokokokokokokokokokokokokokokokokokokokokokokokokokokokokokokokokokokokokokokokokokokokokokokokokokokokokokokokokokokokokokokokokokokokokokokok', 'https://www.hltv.org https://www.faceit.com/en/players/_Puchatek', '$2y$10$101pudr/2oL56aijkvgw4e7OZz1pnagOX5wj5NtwSjHeMJC0RLtdK', 'admin'),
(2, 'Grzegorz', 'Brzęczyszczykiewicz', '1997-04-21', 'g.brzeczyk@gmail.com', 123456789, '66604ec1c59a12.58252765.png', '', '', '', 'dadad', 'adada', '', 'adadad', 'adadad', 'https://hltv.org/', '$2y$10$C7x9fN62zWWXY1Bak4J/9ubxdCa2RGCUsGtdmiKldLO1DdgRQNu.a', 'user'),
(3, 'Adam', 'Kowalski', '2002-02-22', 'adam.kowalski@gmail.com', 668927484, '65edac16772be3.23553381.png', '', '', '', 'Doświadczenie zawodowe:Doświadczenie zawodowe:Doświadczenie zawodowe:Doświadczenie zawodowe:Doświadczenie zawodowe:Doświadczenie zawodowe:', 'Wykształcenie:Wykształcenie:Wykształcenie:Wykształcenie:Wykształcenie:Wykształcenie:Wykształcenie:Wykształcenie:Wykształcenie:Wykształcenie:Wykształcenie:', '', 'Wykształcenie:Wykształcenie:Wykształcenie:Wykształcenie:Wykształcenie:Wykształcenie:Wykształcenie:Wykształcenie:Wykształcenie:Wykształcenie:Wykształcenie:Wykształcenie:', 'Kursy:Kursy:Kursy:Kursy:Kursy:Kursy:Kursy:Kursy:Kursy:Kursy:Kursy:Kursy:Kursy:Kursy:Kursy:Kursy:Kursy:Kursy:Kursy:Kursy:Kursy:Kursy:Kursy:Kursy:', 'https://www.hltv.org', '$2y$10$mN6IbigXuVVocmYg.Zx2J.pgvZ4RWOx6ff4hg7UR7mhzZPY8qUSkC', 'user'),
(4, 'Mateusz', 'Pieniążek', '0000-00-00', 'm.p@gmail.com', 0, '', '', '', '', '', '', '', '', '', NULL, '$2y$10$XJsVT4lNmncEJBlhn8DTU.oViy7ipIZV2Iw5/0vaPSv6R4Y.fuu5m', 'user');

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
-- Indeksy dla tabeli `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`category_id`);

--
-- Indeksy dla tabeli `company`
--
ALTER TABLE `company`
  ADD PRIMARY KEY (`company_id`);

--
-- Indeksy dla tabeli `offer`
--
ALTER TABLE `offer`
  ADD PRIMARY KEY (`offer_id`);

--
-- Indeksy dla tabeli `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `category_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `company`
--
ALTER TABLE `company`
  MODIFY `company_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `offer`
--
ALTER TABLE `offer`
  MODIFY `offer_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
