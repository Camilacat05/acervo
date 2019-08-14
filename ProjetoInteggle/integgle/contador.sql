-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: 03-Maio-2018 às 02:42
-- Versão do servidor: 5.7.21
-- PHP Version: 5.6.35

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `integgle`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `contador`
--

DROP TABLE IF EXISTS `contador`;
CREATE TABLE IF NOT EXISTS `contador` (
  `page` varchar(1000) NOT NULL,
  `IP` varchar(40) NOT NULL,
  `date` varchar(12) NOT NULL,
  `origem` varchar(200) NOT NULL,
  `Id` int(12) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`Id`)
) ENGINE=MyISAM AUTO_INCREMENT=21 DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `contador`
--

INSERT INTO `contador` (`page`, `IP`, `date`, `origem`, `Id`) VALUES
('sdfgh.php', '10030', '26/04/2018', 'visita', 1),
('sdfgh.php', '10030', '26/04/2018', 'visita', 2),
('sdfgh.php', '10030', '26/04/2018', 'visita', 3),
('sdfgh.php', '10030', '26/04/2018', 'visita', 4),
('sdfgh.php', '10030', '26/04/2018', 'visita', 5),
('sdfgh.php', '10030', '26/04/2018', 'visita', 6),
('sdfgh.php', '10030', '26/04/2018', 'visita', 7),
('', '::1', '26/04/2018', 'visita', 8),
('/integgle/', '::1', '26/04/2018', 'visita', 9),
('/integgle/', '::1', '26/04/2018', 'visita', 10),
('/integgle/', '::1', '26/04/2018', 'visita', 11),
('/integgle/', '23456', '26/04/2018', 'visita', 12),
('/integgle/', '::1', '12345678', 'visita', 13),
('/integgle/post.php?id=20', '::1', '26/04/2018', 'visita', 14),
('/integgle/post.php?id=20', '234567', '26/04/2018', 'visita', 15),
('/integgle/post.php?id=19', '::1', '26/04/2018', 'visita', 16),
('/integgle/index.php?pg=2', '::1', '26/04/2018', 'visita', 17),
('/integgle/post.php?id=16', '::1', '26/04/2018', 'visita', 18),
('/integgle/', '::1', '02/05/2018', 'visita', 19),
('/integgle/post.php?id=20', '::1', '02/05/2018', 'visita', 20);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
