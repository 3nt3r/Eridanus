-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: 18-Maio-2019 às 22:19
-- Versão do servidor: 10.3.14-MariaDB
-- versão do PHP: 7.3.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `id8224055_eridanus`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `administrador`
--

CREATE TABLE `administrador` (
  `nome` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `sobrenome` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `senha` varchar(50) CHARACTER SET utf8 DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Extraindo dados da tabela `administrador`
--

INSERT INTO `administrador` (`nome`, `sobrenome`, `email`, `senha`) VALUES
('Ruben', 'Jose', 'rubenjosma11@gmail.com', 'aa1bf4646de67fd9086cf6c79007026c');

-- --------------------------------------------------------

--
-- Estrutura da tabela `log`
--

CREATE TABLE `log` (
  `id` int(10) NOT NULL,
  `navegacao` varchar(50) NOT NULL,
  `id_usuario` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `mensagem`
--

CREATE TABLE `mensagem` (
  `id` int(30) NOT NULL,
  `mensagem` varchar(500) NOT NULL,
  `remetente` int(30) NOT NULL,
  `destinatario` int(30) NOT NULL,
  `idObjeto` int(30) NOT NULL,
  `statusResposta` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `objeto`
--

CREATE TABLE `objeto` (
  `id` int(11) NOT NULL,
  `nome` varchar(30) COLLATE utf8_unicode_ci DEFAULT NULL,
  `descricao` varchar(500) CHARACTER SET utf8 DEFAULT NULL,
  `data_publicacao` date DEFAULT NULL,
  `status_atual` varchar(30) COLLATE utf8_unicode_ci DEFAULT NULL,
  `id_usuario` int(11) NOT NULL,
  `imagem` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `observacoes` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `projeto`
--

CREATE TABLE `projeto` (
  `codigo` int(11) NOT NULL,
  `titulo` varchar(30) COLLATE utf8_unicode_ci DEFAULT NULL,
  `autor` varchar(30) COLLATE utf8_unicode_ci DEFAULT NULL,
  `descricao` varchar(500) CHARACTER SET utf8 DEFAULT NULL,
  `data_publicacao` date DEFAULT NULL,
  `status_atual` varchar(30) COLLATE utf8_unicode_ci DEFAULT NULL,
  `id_usuario` int(11) NOT NULL,
  `imagem` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `materiais` varchar(500) CHARACTER SET utf8 DEFAULT NULL,
  `video` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `observacoes` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `recuperacao`
--

CREATE TABLE `recuperacao` (
  `cod` varchar(7) DEFAULT NULL,
  `verif` varchar(50) NOT NULL,
  `id_usuario` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `resposta`
--

CREATE TABLE `resposta` (
  `id` int(30) NOT NULL,
  `mensagem` varchar(500) NOT NULL,
  `idMensagem` int(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuario`
--

CREATE TABLE `usuario` (
  `id` int(11) NOT NULL,
  `nome` varchar(30) COLLATE utf8_unicode_ci DEFAULT NULL,
  `sobrenome` varchar(30) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(40) COLLATE utf8_unicode_ci NOT NULL,
  `senha` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `cidade` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Extraindo dados da tabela `usuario`
--

INSERT INTO `usuario` (`id`, `nome`, `sobrenome`, `email`, `senha`, `cidade`) VALUES
(24, 'Ruben', 'Jose', 'rubenjosma11@gmail.com', 'aa1bf4646de67fd9086cf6c79007026c', 'Salgueiro-PE');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `administrador`
--
ALTER TABLE `administrador`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `log`
--
ALTER TABLE `log`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_usuario` (`id_usuario`);

--
-- Indexes for table `mensagem`
--
ALTER TABLE `mensagem`
  ADD PRIMARY KEY (`id`),
  ADD KEY `remetente` (`remetente`),
  ADD KEY `destinatario` (`destinatario`),
  ADD KEY `idObjeto` (`idObjeto`);

--
-- Indexes for table `objeto`
--
ALTER TABLE `objeto`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_obj_usu` (`id_usuario`);

--
-- Indexes for table `projeto`
--
ALTER TABLE `projeto`
  ADD PRIMARY KEY (`codigo`),
  ADD KEY `fk_pjt_usu` (`id_usuario`);

--
-- Indexes for table `recuperacao`
--
ALTER TABLE `recuperacao`
  ADD PRIMARY KEY (`verif`),
  ADD KEY `id_usuario` (`id_usuario`);

--
-- Indexes for table `resposta`
--
ALTER TABLE `resposta`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idMensagem` (`idMensagem`);

--
-- Indexes for table `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `log`
--
ALTER TABLE `log`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `mensagem`
--
ALTER TABLE `mensagem`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `objeto`
--
ALTER TABLE `objeto`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `projeto`
--
ALTER TABLE `projeto`
  MODIFY `codigo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `resposta`
--
ALTER TABLE `resposta`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- Constraints for dumped tables
--

--
-- Limitadores para a tabela `log`
--
ALTER TABLE `log`
  ADD CONSTRAINT `log_ibfk_1` FOREIGN KEY (`id_usuario`) REFERENCES `usuario` (`id`);

--
-- Limitadores para a tabela `mensagem`
--
ALTER TABLE `mensagem`
  ADD CONSTRAINT `mensagem_ibfk_1` FOREIGN KEY (`remetente`) REFERENCES `usuario` (`id`),
  ADD CONSTRAINT `mensagem_ibfk_2` FOREIGN KEY (`destinatario`) REFERENCES `usuario` (`id`),
  ADD CONSTRAINT `mensagem_ibfk_3` FOREIGN KEY (`idObjeto`) REFERENCES `objeto` (`id`);

--
-- Limitadores para a tabela `objeto`
--
ALTER TABLE `objeto`
  ADD CONSTRAINT `fk_obj_usu` FOREIGN KEY (`id_usuario`) REFERENCES `usuario` (`id`);

--
-- Limitadores para a tabela `projeto`
--
ALTER TABLE `projeto`
  ADD CONSTRAINT `fk_pjt_usu` FOREIGN KEY (`id_usuario`) REFERENCES `usuario` (`id`);

--
-- Limitadores para a tabela `recuperacao`
--
ALTER TABLE `recuperacao`
  ADD CONSTRAINT `recuperacao_ibfk_1` FOREIGN KEY (`id_usuario`) REFERENCES `usuario` (`id`);

--
-- Limitadores para a tabela `resposta`
--
ALTER TABLE `resposta`
  ADD CONSTRAINT `resposta_ibfk_1` FOREIGN KEY (`idMensagem`) REFERENCES `mensagem` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
