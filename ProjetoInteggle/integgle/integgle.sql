-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: 06-Ago-2019 às 00:35
-- Versão do servidor: 5.7.26
-- versão do PHP: 7.2.18

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
-- Estrutura da tabela `cad_postagem`
--

DROP TABLE IF EXISTS `cad_postagem`;
CREATE TABLE IF NOT EXISTS `cad_postagem` (
  `titulo` varchar(255) NOT NULL,
  `data` varchar(255) NOT NULL,
  `imagem` varchar(255) NOT NULL,
  `exibir` varchar(255) NOT NULL,
  `descricao` varchar(255) NOT NULL,
  `documento` varchar(255) NOT NULL,
  `categoria` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `contador`
--

DROP TABLE IF EXISTS `contador`;
CREATE TABLE IF NOT EXISTS `contador` (
  `page` varchar(255) NOT NULL,
  `IP` varchar(255) NOT NULL,
  `date` varchar(255) NOT NULL,
  `origem` varchar(255) NOT NULL,
  `Id` int(255) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`Id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `contador`
--

INSERT INTO `contador` (`page`, `IP`, `date`, `origem`, `Id`) VALUES
('/ProjetoInteggle/integgle/', '::1', '05/08/2019', 'visita', 1),
('/ProjetoInteggle/integgle/index.php?pesquisar=yt', '::1', '05/08/2019', 'visita', 2),
('/ProjetoInteggle/integgle/post.php?id=0', '::1', '05/08/2019', 'visita', 3);

-- --------------------------------------------------------

--
-- Estrutura da tabela `login`
--

DROP TABLE IF EXISTS `login`;
CREATE TABLE IF NOT EXISTS `login` (
  `id` int(11) NOT NULL,
  `nome` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `usuario` varchar(255) NOT NULL,
  `senha` varchar(255) NOT NULL,
  `thumb` varchar(255) NOT NULL,
  `nivel` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `login`
--

INSERT INTO `login` (`id`, `nome`, `email`, `usuario`, `senha`, `thumb`, `nivel`) VALUES
(1, 'João Leandro', 'contato@conectaverdade.com', 'admin', 'admin', '', '1'),
(2, 'Equipeabencoada', 'tese@live.com', 'teste', 'teste', '', '0'),
(1, 'João Leandro', 'contato@conectaverdade.com', 'admin', 'admin', '', '1'),
(2, 'Equipeabencoada', 'tese@live.com', 'teste', 'teste', '', '0');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_postagens`
--

DROP TABLE IF EXISTS `tb_postagens`;
CREATE TABLE IF NOT EXISTS `tb_postagens` (
  `titulo` varchar(255) NOT NULL,
  `data` varchar(255) NOT NULL,
  `imagem` varchar(255) NOT NULL,
  `exibir` varchar(255) NOT NULL,
  `descricao` longtext NOT NULL,
  `categoria` varchar(255) NOT NULL,
  `documento` varchar(255) NOT NULL,
  `id` int(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `tb_postagens`
--

INSERT INTO `tb_postagens` (`titulo`, `data`, `imagem`, `exibir`, `descricao`, `categoria`, `documento`, `id`) VALUES
('yt', '32/32/3243', '1527695389.png', 'Sim', '<br>', 'Artesanato', '1651352035.docx', 0),
('sfdsfsd', '21/31/2321', '691086199.png', 'Sim', 'wqe<br>', 'Artesanato', '124985861.docx', 0);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
