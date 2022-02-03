-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Tempo de geração: 03-Fev-2022 às 16:43
-- Versão do servidor: 5.7.36
-- versão do PHP: 7.4.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `adote_me`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `adoption_process`
--

DROP TABLE IF EXISTS `adoption_process`;
CREATE TABLE IF NOT EXISTS `adoption_process` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `kid_id` int(11) NOT NULL,
  `status` varchar(255) COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_user_adoption_process` (`user_id`),
  KEY `fk_kid_adoption_process` (`kid_id`)
) ENGINE=MyISAM AUTO_INCREMENT=43 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Extraindo dados da tabela `adoption_process`
--

INSERT INTO `adoption_process` (`id`, `user_id`, `kid_id`, `status`) VALUES
(17, 5, 4, 'APROVADO'),
(10, 4, 6, 'NEGADO'),
(42, 3, 6, 'EM ANALISE');

-- --------------------------------------------------------

--
-- Estrutura da tabela `contact`
--

DROP TABLE IF EXISTS `contact`;
CREATE TABLE IF NOT EXISTS `contact` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `message` varchar(255) COLLATE utf8_bin NOT NULL,
  `user_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Extraindo dados da tabela `contact`
--

INSERT INTO `contact` (`id`, `message`, `user_id`) VALUES
(5, 'Parabens pela iniciativa!', 3),
(6, 'Aguardando pela aprovacao <3', 5);

-- --------------------------------------------------------

--
-- Estrutura da tabela `doubt`
--

DROP TABLE IF EXISTS `doubt`;
CREATE TABLE IF NOT EXISTS `doubt` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `message` varchar(255) COLLATE utf8_bin NOT NULL,
  `user_id` int(11) NOT NULL,
  `whatsapp` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_doubt_user` (`user_id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Extraindo dados da tabela `doubt`
--

INSERT INTO `doubt` (`id`, `message`, `user_id`, `whatsapp`) VALUES
(1, 'Como adotar?', 2, NULL),
(3, 'Como adoto?', 5, '21990838187');

-- --------------------------------------------------------

--
-- Estrutura da tabela `kid`
--

DROP TABLE IF EXISTS `kid`;
CREATE TABLE IF NOT EXISTS `kid` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `birthday` date NOT NULL,
  `gender` varchar(255) COLLATE utf8_bin NOT NULL,
  `adopted` tinyint(1) NOT NULL DEFAULT '0',
  `photo_link` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `localization` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `health` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `adoption_process` varchar(255) COLLATE utf8_bin DEFAULT 'FECHADO',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=20 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Extraindo dados da tabela `kid`
--

INSERT INTO `kid` (`id`, `name`, `birthday`, `gender`, `adopted`, `photo_link`, `localization`, `health`, `adoption_process`) VALUES
(1, 'Joao Marins', '2016-12-12', 'MASCULINO', 1, 'https://images.unsplash.com/photo-1552873816-636e43209957?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1031&q=80', 'RIO DE JANEIRO', 'SAUDAVEL', 'FECHADO'),
(2, 'Debora Lopes', '2019-10-12', 'FEMININO', 1, 'https://images.pexels.com/photos/3932961/pexels-photo-3932961.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=650&w=940', 'MINAS GERAIS', 'SAUDAVEL', 'FECHADO'),
(3, 'Lucca Duarte', '2015-06-01', 'MASCULINO', 1, 'https://images.unsplash.com/photo-1542319272-42dba4f554be?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=769&q=80', 'RIO DE JANEIRO', 'SAUDAVEL', 'FECHADO'),
(4, 'Ana Vitorino', '2010-10-10', 'FEMININO', 1, 'https://images.unsplash.com/photo-1549069786-641f4cb652c7?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=870&q=80', 'BAHIA', 'SAUDAVEL', 'FECHADO'),
(5, 'Marco Lopes', '2020-09-25', 'MASCULINO', 0, 'https://images.unsplash.com/photo-1503284116362-30c49f508156?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=387&q=80', 'RIO DE JANEIRO', 'SAUDAVEL', 'FECHADO'),
(6, 'Jennifer Araujo', '2019-03-05', 'FEMININO', 0, 'https://images.unsplash.com/photo-1571211468362-33f20cb1982f?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=387&q=80', 'MINAS GERAIS', 'SAUDAVEL', 'ABERTO'),
(7, 'Maria Julia Batista', '2020-06-01', 'FEMININO', 0, 'https://images.pexels.com/photos/161593/baby-child-kid-girl-161593.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=650&w=940', 'BAHIA', 'SAUDAVEL', 'FECHADO'),
(8, 'Renata Marques', '2020-03-11', 'FEMININO', 0, 'https://images.pexels.com/photos/774910/pexels-photo-774910.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=650&w=940', 'RIO DE JANEIRO', 'SAUDAVEL', 'FECHADO'),
(9, 'Pietra Novais', '2010-03-03', 'FEMININO', 0, 'https://images.unsplash.com/photo-1629783509182-68c8c190e952?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=387&q=80', 'Santa Catarina', 'SAUDAVEL', 'FECHADO'),
(10, 'Fernando Portugal', '2020-08-10', 'MASCULINO', 0, 'https://images.unsplash.com/photo-1522771930-78848d9293e8?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=435&q=80', 'Rio de Janeiro', 'SAUDAVEL', 'FECHADO'),
(19, 'Juan Marques', '2018-10-03', 'MASCULINO', 0, 'https://images.unsplash.com/photo-1528502668750-88ba58015b2f?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxzZWFyY2h8MzF8fGtpZHxlbnwwfHwwfHw%3D&auto=format&fit=crop&w=500&q=60', 'Rio de Janeiro', 'SAUDAVEL', 'FECHADO');

-- --------------------------------------------------------

--
-- Estrutura da tabela `kid_kid`
--

DROP TABLE IF EXISTS `kid_kid`;
CREATE TABLE IF NOT EXISTS `kid_kid` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `kid_id_1` int(11) NOT NULL,
  `kid_id_2` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Extraindo dados da tabela `kid_kid`
--

INSERT INTO `kid_kid` (`id`, `kid_id_1`, `kid_id_2`) VALUES
(7, 8, 19),
(6, 19, 8);

-- --------------------------------------------------------

--
-- Estrutura da tabela `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_bin NOT NULL,
  `email` varchar(255) COLLATE utf8_bin NOT NULL,
  `password` varchar(255) COLLATE utf8_bin NOT NULL,
  `admin` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  UNIQUE KEY `email` (`email`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Extraindo dados da tabela `user`
--

INSERT INTO `user` (`id`, `name`, `email`, `password`, `admin`) VALUES
(6, 'Douglas', 'doug@email.com', '$argon2i$v=19$m=65536,t=4,p=1$Z2o1OUVWaVdvME5yZGlJVg$51qrMeiNzQVrnH+s5cFkkbAUGxzCxDdGv2XlYVVsluc', 0),
(2, 'admin', 'admin@email.com', '$argon2i$v=19$m=65536,t=4,p=1$LldLSGRoSDRUOXBZWDdHWA$Y62dOqIOczq9qLWcNsLTlXJSBaVG7KP7sGVYTAbrBNA', 1),
(3, 'Matheus Antunes', 'matheus@email.com', '$argon2i$v=19$m=65536,t=4,p=1$NURHV1lIVnF2eVFjLndwZA$RwUks5wn0b+Ld75QP9W0cmIGspdI0d7x474ZHTFJ/2A', 0),
(4, 'Felipe Antunes', 'felipe@email.com', '$argon2i$v=19$m=65536,t=4,p=1$VzcxQ3dSaGlxbFpEWFVIeA$vQtLjqa35LxSQIfGDGlK5oI7T6E+2+lIKln8CLIqe9g', 0),
(5, 'Rosieli Heringer', 'rosieli@email.com', '$argon2i$v=19$m=65536,t=4,p=1$TTl0bWtqVjIwdWpLZ2NDRg$mSlyQtWSbf8GYS583yIQ2fMXljYgtH7SYOuRRBs/9Mc', 0);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
