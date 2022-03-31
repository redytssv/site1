-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 31-Mar-2022 às 02:24
-- Versão do servidor: 10.4.22-MariaDB
-- versão do PHP: 8.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `futmoney`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `administrador`
--

CREATE TABLE `administrador` (
  `id_adm` int(11) NOT NULL,
  `login` varchar(50) NOT NULL,
  `senha` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `administrador`
--

INSERT INTO `administrador` (`id_adm`, `login`, `senha`) VALUES
(1, 'admin', 'admin');

-- --------------------------------------------------------

--
-- Estrutura da tabela `apostas`
--

CREATE TABLE `apostas` (
  `id_ap` int(11) NOT NULL,
  `nomecliente` varchar(50) NOT NULL,
  `telefonecliente` varchar(50) NOT NULL,
  `id_jogo1` int(11) NOT NULL,
  `result_1` varchar(50) NOT NULL,
  `id_jogo2` int(11) NOT NULL,
  `result_2` varchar(50) NOT NULL,
  `id_jogo3` int(11) NOT NULL,
  `result_3` varchar(50) NOT NULL,
  `id_jogo4` int(11) NOT NULL,
  `result_4` varchar(50) NOT NULL,
  `id_jogo5` int(11) NOT NULL,
  `result_5` varchar(50) NOT NULL,
  `horario` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `jogos`
--

CREATE TABLE `jogos` (
  `id_jogos` int(11) NOT NULL,
  `time1` varchar(120) NOT NULL,
  `img_time1` longtext NOT NULL,
  `time2` varchar(120) NOT NULL,
  `img_time2` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `administrador`
--
ALTER TABLE `administrador`
  ADD PRIMARY KEY (`id_adm`);

--
-- Índices para tabela `apostas`
--
ALTER TABLE `apostas`
  ADD PRIMARY KEY (`id_ap`),
  ADD KEY `id_jogo1` (`id_jogo1`),
  ADD KEY `id_jogo2` (`id_jogo2`),
  ADD KEY `id_jogo3` (`id_jogo3`),
  ADD KEY `id_jogo4` (`id_jogo4`),
  ADD KEY `id_jogo5` (`id_jogo5`);

--
-- Índices para tabela `jogos`
--
ALTER TABLE `jogos`
  ADD PRIMARY KEY (`id_jogos`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `administrador`
--
ALTER TABLE `administrador`
  MODIFY `id_adm` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de tabela `apostas`
--
ALTER TABLE `apostas`
  MODIFY `id_ap` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT de tabela `jogos`
--
ALTER TABLE `jogos`
  MODIFY `id_jogos` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `apostas`
--
ALTER TABLE `apostas`
  ADD CONSTRAINT `apostas_ibfk_1` FOREIGN KEY (`id_jogo1`) REFERENCES `jogos` (`id_jogos`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `apostas_ibfk_2` FOREIGN KEY (`id_jogo2`) REFERENCES `jogos` (`id_jogos`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `apostas_ibfk_3` FOREIGN KEY (`id_jogo3`) REFERENCES `jogos` (`id_jogos`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `apostas_ibfk_4` FOREIGN KEY (`id_jogo4`) REFERENCES `jogos` (`id_jogos`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `apostas_ibfk_5` FOREIGN KEY (`id_jogo5`) REFERENCES `jogos` (`id_jogos`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
