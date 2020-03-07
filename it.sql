-- phpMyAdmin SQL Dump
-- version 4.5.4.1deb2ubuntu2.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Dec 16, 2019 at 10:29 AM
-- Server version: 5.7.24-0ubuntu0.16.04.1
-- PHP Version: 7.2.12-1+ubuntu16.04.1+deb.sury.org+1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `it`
--

-- --------------------------------------------------------

--
-- Table structure for table `pm`
--

CREATE TABLE `pm` (
  `id` bigint(20) NOT NULL,
  `id2` int(11) NOT NULL,
  `title` varchar(256) NOT NULL,
  `user1` bigint(20) NOT NULL,
  `user2` bigint(20) NOT NULL,
  `message` text NOT NULL,
  `timestamp` int(10) NOT NULL,
  `user1read` varchar(3) NOT NULL,
  `user2read` varchar(3) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `Rezervacija`
--

CREATE TABLE `Rezervacija` (
  `id` int(11) NOT NULL,
  `fk_pateikia` int(11) NOT NULL,
  `fk_priima` int(11) NOT NULL,
  `data` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `User`
--

CREATE TABLE `User` (
  `id` int(11) NOT NULL,
  `usr` text NOT NULL,
  `pass` text NOT NULL,
  `vardas` text,
  `pavarde` text,
  `type` int(11) NOT NULL,
  `amzius` text,
  `statusas` int(11) DEFAULT NULL,
  `reitingas` int(11) DEFAULT NULL,
  `kreditai` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `User`
--

INSERT INTO `User` (`id`, `usr`, `pass`, `vardas`, `pavarde`, `type`, `amzius`, `statusas`, `reitingas`, `kreditai`) VALUES
(1, 'jonas', 'jonas', 'jonas', 'petraska', 1, '21', NULL, NULL, NULL),
(2, 'jonas2', 'jonas2', 'jonas2', 'petraska2', 2, '21', 1, 0, 0),
(3, 'jonas3', 'jonas3', 'jonas3', 'petraska3', 3, '21', NULL, NULL, 4),
(4, 'testas', 'testas', NULL, NULL, 1, NULL, NULL, NULL, NULL),
(6, 'paskutinis testas', 'testas', NULL, NULL, 2, NULL, NULL, NULL, NULL),
(7, 'registracijaa', 'aa', NULL, NULL, 2, NULL, NULL, NULL, 3000),
(8, 'testukas', '$2y$10$CgHHa02SDuU5RC5LfmhUTuLw6B9Y9AUCWw8JfxxUyd6969ZbHxYZa', NULL, NULL, 3, NULL, NULL, NULL, NULL),
(9, 'kodukas', '$2y$10$OOhrIxF0YyRPEkuVcZUTK.iQwQYlkeyxbAH5AlLdD4MFF3jJMjoUO', NULL, NULL, 2, NULL, NULL, NULL, NULL),
(10, 'admin', '$2y$10$VO2JyKMekxy8uvl6xKTZtOl1kO7gZvnXAMvL5IWRi8dqiLUhQ5BGG', NULL, NULL, 1, NULL, NULL, NULL, NULL),
(11, 'worker', '$2y$10$9HT0KItasI/mc/UCmlyVtuW5U2fQUxbMelZffwbpKcrWn.cc2AukS', 'Jonas', 'Petraska', 2, '85', 0, 6, NULL),
(12, 'client', '$2y$10$F7vwVtgD/CGl3gBQVUKjQ.3KIt8iCaAeI1cNi1eKoX.g5ekZWrKQi', 'Klientas', 'klitus', 3, '58', NULL, NULL, 10);

-- --------------------------------------------------------

--
-- Table structure for table `Zinute`
--

CREATE TABLE `Zinute` (
  `id` int(11) NOT NULL,
  `fk_siuntejas` int(11) NOT NULL,
  `fk_gavejas` int(11) NOT NULL,
  `tekstas` text NOT NULL,
  `atsakymas` text,
  `atsakyta` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Zinute`
--

INSERT INTO `Zinute` (`id`, `fk_siuntejas`, `fk_gavejas`, `tekstas`, `atsakymas`, `atsakyta`) VALUES
(1, 11, 2, 'sveiki', NULL, 1),
(2, 11, 2, 'asdf', NULL, 1),
(3, 12, 2, 'Mano klausimas, ar galeciau perrasyti windows ?', 'Atsakau tau', 1),
(4, 12, 2, 'Klausimas dar vienas', 'Atsakau tau', 1),
(5, 12, 2, 'Sveiki', 'Atsakau tau', 1),
(6, 12, 11, 'Noriu paklausti', 'Atsakau tau', 1),
(7, 11, 12, 'Atsakau jums', NULL, 1),
(8, 12, 11, 'Dar vienas klausimas', 'Issamus atsakymas apie tai kaip tai reiketu igyvendinti ir kaip tai veikia ir apskritai ilgas teksto fragmentas', 1),
(9, 12, 11, 'Klasuimelis', 'ATSAKYMAS TESTAVIMUI', 1),
(10, 12, 11, 'ttt', 'ATSAKYMAS TESTAVIMUI', 1),
(11, 12, 11, 'super klausimas', 'ATSAKYMAS TESTAVIMUI', 1),
(12, 12, 11, 'ttttttt', 'ATSAKYMAS TESTAVIMUI', 1),
(13, 12, 11, 'asdf', 'ATSAKYMAS TESTAVIMUI', 1),
(14, 12, 11, 'asdfg', 'ATSAKYMAS TESTAVIMUI', 1),
(15, 12, 11, 'TESTAVIMO KLAUSIMAS', NULL, 0),
(16, 12, 11, 'TESTAVIMO KLAUSIMAS 2', 'ATSAKYMAS', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `Rezervacija`
--
ALTER TABLE `Rezervacija`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `User`
--
ALTER TABLE `User`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id_3` (`id`),
  ADD KEY `id` (`id`),
  ADD KEY `id_2` (`id`);

--
-- Indexes for table `Zinute`
--
ALTER TABLE `Zinute`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `User`
--
ALTER TABLE `User`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `Zinute`
--
ALTER TABLE `Zinute`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
