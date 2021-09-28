-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Počítač: 127.0.0.1
-- Vytvořeno: Čtv 02. dub 2020, 16:21
-- Verze serveru: 10.4.11-MariaDB
-- Verze PHP: 7.4.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Databáze: `darujkrev`
--

-- --------------------------------------------------------

--
-- Struktura tabulky `donors`
--

CREATE TABLE `donors` (
  `id` int(11) NOT NULL,
  `name` varchar(20) NOT NULL,
  `surname` varchar(20) NOT NULL,
  `dateOfBirth` varchar(20) NOT NULL,
  `email` varchar(40) NOT NULL,
  `bloodType` char(3) NOT NULL,
  `selectedDate` date NOT NULL,
  `subject` char(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Vypisuji data pro tabulku `donors`
--

INSERT INTO `donors` (`id`, `name`, `surname`, `dateOfBirth`, `email`, `bloodType`, `selectedDate`, `subject`) VALUES
(168, 'julie', 'prazakova', '1.1.2000', 'julpraza@seznam.cz', 'B+', '2020-03-05', 'krev'),
(169, 'julie', 'Pražáková', '22.1.1979', 'lucka.prazakova@gmail.com', 'AB-', '2020-03-05', 'krev'),
(170, 'julie', 'Pražáková', '22.1.1979', 'lucka.prazakova@gmail.com', 'AB-', '2020-03-05', 'krev'),
(171, 'julie', 'Pražáková', '22.1.1979', 'lucka.prazakova@gmail.com', 'AB-', '2020-03-05', 'krev'),
(201, 'anicka', 'Pražáková', '22.1.1979', 'julpraza@gmail.com', 'AB+', '2020-03-27', 'krev'),
(202, 'anicka', 'Pražáková', '22.1.1979', 'julpraza@gmail.com', 'AB+', '2020-03-27', 'krev'),
(205, 'Julie', 'Pražáková', '1.1.2000', 'lucka.prazakova@gmail.com', 'B-', '2020-04-13', 'krev'),
(215, 'julie', 'trinacta', '20. Únor 2003', 'lucka.prazakova@gmail.com', 'AB+', '2020-03-24', 'krev'),
(216, 'julie', 'trinacta', '20. Únor 2003', 'lucka.prazakova@gmail.com', 'AB+', '2020-03-24', 'krev'),
(217, 'julie', 'trinacta', '20. Únor 2003', 'lucka.prazakova@gmail.com', 'AB+', '2020-03-24', 'krev'),
(218, 'julie', 'trinacta', '20. Únor 2003', 'lucka.prazakova@gmail.com', 'AB+', '2020-03-24', 'krev'),
(219, 'julie', 'trinacta', '20. Únor 2003', 'lucka.prazakova@gmail.com', 'AB+', '2020-03-24', 'krev'),
(220, 'julie', 'trinacta', '20. Únor 2003', 'lucka.prazakova@gmail.com', 'AB+', '2020-03-24', 'krev'),
(221, 'julie', 'trinacta', '20. Únor 2003', 'lucka.prazakova@gmail.com', 'AB+', '2020-03-24', 'krev'),
(222, 'julie', 'trinacta', '20. Únor 2003', 'lucka.prazakova@gmail.com', 'AB+', '2020-03-24', 'krev'),
(223, 'julie', 'trinacta', '20. Únor 2003', 'lucka.prazakova@gmail.com', 'AB+', '2020-03-24', 'krev'),
(224, 'julie', 'trinacta', '20. Únor 2003', 'lucka.prazakova@gmail.com', 'AB+', '2020-03-24', 'krev'),
(225, 'julie', 'trinacta', '20. Únor 2003', 'lucka.prazakova@gmail.com', 'AB+', '2020-03-24', 'krev'),
(226, 'julie', 'trinacta', '20. Únor 2003', 'lucka.prazakova@gmail.com', 'AB+', '2020-03-24', 'krev'),
(227, 'julie', 'trinacta', '20. Únor 2003', 'lucka.prazakova@gmail.com', 'AB+', '2020-03-24', 'krev'),
(228, 'julie', 'trinacta', '20. Únor 2003', 'lucka.prazakova@gmail.com', 'AB+', '2020-03-24', 'krev'),
(229, 'julie', 'trinacta', '20. Únor 2003', 'lucka.prazakova@gmail.com', 'AB+', '2020-03-19', 'krev'),
(230, 'Lucie', 'Pražáková', '19. Březen 2002', 'lucka.prazakova@gmail.com', 'AB-', '2020-03-23', 'krev'),
(231, 'Lucie', 'Pražáková', '19. Březen 2002', 'lucka.prazakova@gmail.com', 'AB-', '2020-03-09', 'krev'),
(232, 'Lucie', 'Pražáková', '3. Květen 1990', 'prazakova.lucie@seznam.cz', 'AB+', '2020-03-24', 'krev'),
(233, 'Julie', 'Pražáková', '20. Červenec 2002', 'julpraza@seznam.cz', '0+', '2020-03-24', 'plasma'),
(234, 'Julie', 'Pražáková', '2. Listopad 2000', 'julpraza@seznam.cz', 'A-', '2020-03-31', 'krev'),
(235, 'julie', 'prazakova', '19. Prosinec 1984', 'julpraza@seznam.cz', '0+', '2020-03-31', 'krev'),
(236, 'julie', 'prazakova', '19. Prosinec 1984', 'julpraza@seznam.cz', '0+', '2020-03-31', 'krev'),
(237, 'julie', 'prazakova', '19. Prosinec 1984', 'julpraza@seznam.cz', '0+', '2020-03-31', 'krev'),
(238, 'Lucie', 'Pražáková', '19. Říjen 1982', 'julpraza@seznam.cz', '0-', '2020-05-20', 'krev'),
(239, 'julie', 'prazakova', '21. Prosinec 1995', 'julpraza@seznam.cz', 'AB-', '2020-03-31', 'plasma'),
(240, 'Julie', 'Pražáková', '18. Listopad 1983', 'julpraza@seznam.cz', 'B-', '2020-04-29', 'krev'),
(241, 'julie', 'prazakova', '2. Červenec 1986', 'julpraza@gmail.com', 'B-', '2020-04-28', 'plasma'),
(242, 'julie', 'prazakova', '18. Prosinec 1984', 'julpraza@seznam.cz', '0-', '2020-04-30', 'plasma'),
(243, 'julie', 'prazakova', '18. Červenec 1989', 'julpraza@seznam.cz', 'AB-', '2020-04-27', 'plasma'),
(244, 'julie', 'prazakova', '18. Červenec 1989', 'julpraza@seznam.cz', 'AB-', '2020-04-27', 'krev'),
(245, 'julie', 'prazakova', '18. Červenec 1989', 'julpraza@seznam.cz', 'AB-', '2020-04-28', 'krev'),
(246, 'julie', 'prazakova', '17. Listopad 1986', 'julpraza@seznam.cz', '0-', '2020-04-28', 'plasma'),
(247, 'julie', 'Pražáková', '20. Prosinec 1985', 'julpraza@seznam.cz', '0-', '2020-04-28', 'plasma'),
(248, 'julie', 'Pražáková', '19. Prosinec 1985', 'julpraza@seznam.cz', '0+', '2020-04-28', 'krev'),
(252, 'julie', 'Pražáková', '19. Prosinec 1985', 'julpraza@seznam.cz', '0+', '2020-04-28', 'plasma'),
(253, 'julča', 'Pražáková', '30. Listopad 1985', 'julpraza@seznam.cz', '0+', '2020-04-21', 'krev'),
(254, 'Julie', 'Pražáková', '18. Listopad 1983', 'julpraza@seznam.cz', 'AB+', '2020-04-21', 'krev'),
(255, 'Julie', 'Pražáková', '18. Listopad 1983', 'julpraza@seznam.cz', 'AB+', '2020-04-21', 'krev'),
(256, 'Julie', 'Pražáková', '18. Listopad 1983', 'julpraza@seznam.cz', 'AB+', '2020-04-21', 'krev'),
(257, 'Julie', 'Pražáková', '18. Listopad 1983', 'julpraza@seznam.cz', 'AB+', '2020-04-21', 'krev'),
(258, 'Julie', 'Pražáková', '18. Listopad 1983', 'julpraza@seznam.cz', 'AB+', '2020-04-21', 'krev'),
(259, 'Julie', 'Pražáková', '18. Listopad 1983', 'julpraza@seznam.cz', 'AB+', '2020-04-21', 'krev'),
(260, 'Julie', 'Pražáková', '18. Listopad 1983', 'julpraza@seznam.cz', 'AB+', '2020-04-21', 'krev'),
(261, 'Lucie', 'Pražáková', '18. Prosinec 1998', 'lucka.prazakova@gmail.com', '0+', '2020-06-11', 'krev'),
(262, 'Lucie', 'Pražáková', '18. Prosinec 1998', 'lucka.prazakova@gmail.com', '0+', '2020-04-29', 'krev');

-- --------------------------------------------------------

--
-- Struktura tabulky `logins`
--

CREATE TABLE `logins` (
  `id` int(11) NOT NULL,
  `login` varchar(20) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Vypisuji data pro tabulku `logins`
--

INSERT INTO `logins` (`id`, `login`, `password`) VALUES
(2, 'admin1', 'test'),
(3, 'personal', '$2y$10$/QWASBwriC4UV5ADKZX/N.IfPFv8TPCNVAyL8qOvVdN4GI9UDvcJS'),
(4, 'admin', '$2y$10$0Vojk..YJNrLQ2j5hKIrwu69NG3gnNY5KgVQobTBkQdCwO7xE34fy'),
(5, 'sestra2', '$2y$10$0IrmgQwMdRyWIWLaMgjwouogVUIifLfPnZeP2VMnslldgz1UiG6hq'),
(6, 'sestra3', '$2y$10$5FXtqaTobbLt.C3u4IqbkuEBj2KteCGj16gBlmqibyJCGSHEEtVAm');

--
-- Klíče pro exportované tabulky
--

--
-- Klíče pro tabulku `donors`
--
ALTER TABLE `donors`
  ADD PRIMARY KEY (`id`);

--
-- Klíče pro tabulku `logins`
--
ALTER TABLE `logins`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pro tabulky
--

--
-- AUTO_INCREMENT pro tabulku `donors`
--
ALTER TABLE `donors`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=263;

--
-- AUTO_INCREMENT pro tabulku `logins`
--
ALTER TABLE `logins`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
