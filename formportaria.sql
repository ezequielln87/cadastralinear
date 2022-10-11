-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Tempo de geração: 14/10/2020 às 17:25
-- Versão do servidor: 8.0.21
-- Versão do PHP: 7.4.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `formportaria`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `cliente`
--

CREATE TABLE `cliente` (
  `id` int NOT NULL,
  `condominio` varchar(150) COLLATE utf8mb4_general_ci NOT NULL,
  `email` varchar(150) COLLATE utf8mb4_general_ci NOT NULL,
  `dvrdhcp` varchar(5) COLLATE utf8mb4_general_ci NOT NULL,
  `usuariocriado` varchar(5) COLLATE utf8mb4_general_ci NOT NULL,
  `guaritaipdhcp` varchar(5) COLLATE utf8mb4_general_ci NOT NULL,
  `senhaguaritaip` varchar(5) COLLATE utf8mb4_general_ci NOT NULL,
  `createad` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `cliente`
--

INSERT INTO `cliente` (`id`, `condominio`, `email`, `dvrdhcp`, `usuariocriado`, `guaritaipdhcp`, `senhaguaritaip`) VALUES
(1, 'asdfasd', 'asdf@ste.com.br', 'Sim', 'Sim', 'Sim', 'Sim'),
(2, 'asdfasd', 'asdf@ste.com.br', 'Sim', 'Sim', 'Sim', 'Sim'),
(3, 'asdfasd', 'asdf@ste.com.br', 'Sim', 'Sim', 'Sim', 'Sim'),
(4, 'asdfasd', 'asdf@ste.com.br', 'Sim', 'Sim', 'Sim', 'Sim'),
(5, 'asdfasd', 'asdf@ste.com.br', 'Sim', 'Sim', 'Sim', 'Sim'),
(6, 'asdfasd', 'asdf@ste.com.br', 'Sim', 'Sim', 'Sim', 'Sim'),
(7, 'asdfasd', 'asdf@ste.com.br', 'Sim', 'Sim', 'Sim', 'Sim'),
(8, 'asdfa', 'asdfasd@asdfasd.com.br', 'Sim', 'Sim', 'Sim', 'Sim'),
(9, 'asdfa', 'asdfasd@asdfasd.com.br', 'Sim', 'Sim', 'Sim', 'Sim'),
(10, 'asdfa', 'asdfasd@asdfasd.com.br', 'Sim', 'Sim', 'Sim', 'Sim'),
(11, 'asdfa', 'asdfasd@asdfasd.com.br', 'Sim', 'Sim', 'Sim', 'Sim'),
(12, 'asdfa', 'asdfasd@asdfasd.com.br', 'Sim', 'Sim', 'Sim', 'Sim'),
(13, 'asdfa', 'asdfasd@asdfasd.com.br', 'Sim', 'Sim', 'Sim', 'Sim'),
(14, 'asdfa', 'asdfasd@asdfasd.com.br', 'Sim', 'Sim', 'Sim', 'Sim'),
(15, 'asdfa', 'asdfasd@asdfasd.com.br', 'Sim', 'Sim', 'Sim', 'Sim'),
(16, 'asdfa', 'asdfasd@asdfasd.com.br', 'Sim', 'Sim', 'Sim', 'Sim'),
(17, 'asdfa', 'asdfasd@asdfasd.com.br', 'Sim', 'Sim', 'Sim', 'Sim'),
(18, 'asdfa', 'asdfasd@asdfasd.com.br', 'Sim', 'Sim', 'Sim', 'Sim'),
(19, 'asdfa', 'asdfasd@asdfasd.com.br', 'Sim', 'Sim', 'Sim', 'Sim'),
(20, 'asdfa', 'asdfasd@asdfasd.com.br', 'Sim', 'Sim', 'Sim', 'Sim'),
(21, 'asdfa', 'asdfasd@asdfasd.com.br', 'Sim', 'Sim', 'Sim', 'Sim'),
(22, 'asdfa', 'asdfasd@asdfasd.com.br', 'Sim', 'Sim', 'Sim', 'Sim'),
(23, 'asdfa', 'asdfasd@asdfasd.com.br', 'Sim', 'Sim', 'Sim', 'Sim'),
(24, 'asdfa', 'asdfasd@asdfasd.com.br', 'Sim', 'Sim', 'Não', 'Sim'),
(25, 'asdfa', 'asdfasd@asdfasd.com.br', 'Sim', 'Sim', 'Não', 'Sim'),
(26, 'asdfasd', 'ezequielln87@gmail.com', 'Sim', 'Não', 'Sim', 'Não'),
(27, 'asdfasd', 'ezequielln87@gmail.com', 'Sim', 'Não', 'Sim', 'Não'),
(28, 'asdfasd', 'ezequielln87@gmail.com', 'Sim', 'Não', 'Sim', 'Não'),
(29, 'asdfasd', 'ezequielln87@gmail.com', 'Sim', 'Não', 'Sim', 'Não'),
(30, 'asdfasd', 'ezequielln87@gmail.com', 'Sim', 'Não', 'Sim', 'Não'),
(31, 'asdfasd', 'ezequielln87@gmail.com', 'Sim', 'Não', 'Sim', 'Não'),
(32, 'asdfasd', 'ezequielln87@gmail.com', 'Sim', 'Não', 'Sim', 'Não'),
(33, 'asdfasd', 'ezequielln87@gmail.com', 'Sim', 'Não', 'Sim', 'Não');

-- --------------------------------------------------------

--
-- Estrutura para tabela `devices`
--

CREATE TABLE `devices` (
  `id` int NOT NULL,
  `fk_cliente_ID` int NOT NULL,
  `indice` varchar(150) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `receptor` varchar(150) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `modoOperacao` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `saida1` varchar(150) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `camera1` varchar(150) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `nomerecurso1` varchar(150) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `saida2` varchar(150) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `camera2` varchar(150) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `nomerecurso2` varchar(150) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `saida3` varchar(150) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `camera3` varchar(150) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `nomerecurso3` varchar(150) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `saida4` varchar(150) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `camera4` varchar(150) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `nomerecurso4` varchar(150) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `devices`
--

INSERT INTO `devices` (`id`, `fk_cliente_ID`, `indice`, `receptor`, `modoOperacao`, `saida1`, `camera1`, `nomerecurso1`, `saida2`, `camera2`, `nomerecurso2`, `saida3`, `camera3`, `nomerecurso3`, `saida4`, `camera4`, `nomerecurso4`) VALUES
(1, 32, 'asdf', 'CTW', NULL, 'asdfasd', 'asdfasd', 'asdfadsfasdfasd', 'asdfasdf', 'asdfasd', '', '', '', '', '', '', ''),
(2, 32, 'asdfasd', 'TX', NULL, 'asdfasdf', 'asdfasdf', 'asdfasdf', 'asdfasdf', 'adsfasd', 'adsfasdfasd', '', '', '', '', '', ''),
(3, 33, 'asdf', 'CTW', NULL, 'asdfasd', 'asdfasd', 'asdfadsfasdfasd', 'asdfasdf', 'asdfasd', '', '', '', '', '', '', ''),
(4, 33, 'asdfasd', 'TX', NULL, 'asdfasdf', 'asdfasdf', 'asdfasdf', 'asdfasdf', 'adsfasd', 'adsfasdfasd', '', '', '', '', '', '');

--
-- Índices de tabelas apagadas
--

--
-- Índices de tabela `cliente`
--
ALTER TABLE `cliente`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `devices`
--
ALTER TABLE `devices`
  ADD PRIMARY KEY (`id`),
  ADD KEY `cliente_id` (`fk_cliente_ID`);

--
-- AUTO_INCREMENT de tabelas apagadas
--

--
-- AUTO_INCREMENT de tabela `cliente`
--
ALTER TABLE `cliente`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT de tabela `devices`
--
ALTER TABLE `devices`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Restrições para dumps de tabelas
--

--
-- Restrições para tabelas `devices`
--
ALTER TABLE `devices`
  ADD CONSTRAINT `cliente_id` FOREIGN KEY (`fk_cliente_ID`) REFERENCES `cliente` (`id`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
