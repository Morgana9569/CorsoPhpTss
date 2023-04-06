-- Active: 1678177573379@@127.0.0.1@3306@form_in_php
-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Creato il: Apr 04, 2023 alle 10:39
-- Versione del server: 10.4.27-MariaDB
-- Versione PHP: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `form_in_php`
--

-- --------------------------------------------------------

--
-- Struttura della tabella `task`
--

DROP TABLE IF EXISTS `task`;
CREATE TABLE IF NOT EXISTS `task` (
  `task_id` int(10) NOT NULL AUTO_INCREMENT,
  `id_user` int(10) NOT NULL,
  `name` varchar(255) NOT NULL,
  `due_date` date NOT NULL,
  `done` tinyint(1) NOT NULL,
  PRIMARY KEY (`task_id`),
  KEY `FOREIGN` (`id_user`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dump dei dati per la tabella `task`
--

INSERT INTO `task` (`task_id`, `id_user`, `name`, `due_date`, `done`) VALUES
(1, 23, 'Comprare il pane', '2023-04-04', 0),
(2, 9, 'Trovare Errori', '2023-04-03', 1),
(4, 27, 'Rimuovi Bugs', '2023-04-04', 0),
(5, 20, 'Comprare il pane', '2023-03-25', 0);

--
-- Limiti per le tabelle scaricate
--

--
-- Limiti per la tabella `task`
--
ALTER TABLE `task`
  ADD CONSTRAINT `FOREIGN` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
