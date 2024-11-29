-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 29-Nov-2024 às 21:00
-- Versão do servidor: 10.4.24-MariaDB
-- versão do PHP: 7.4.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `finar`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `chat_messages`
--

CREATE TABLE `chat_messages` (
  `id` int(11) NOT NULL,
  `user` varchar(100) NOT NULL,
  `message` text NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estrutura da tabela `endereco`
--

CREATE TABLE `endereco` (
  `id_endereco` int(11) NOT NULL,
  `cep` char(9) NOT NULL,
  `bairro` varchar(80) NOT NULL,
  `rua` varchar(80) NOT NULL,
  `numero` char(4) NOT NULL,
  `cidade` varchar(60) NOT NULL,
  `pais` char(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `endereco`
--

INSERT INTO `endereco` (`id_endereco`, `cep`, `bairro`, `rua`, `numero`, `cidade`, `pais`) VALUES
(1, '17516740', 'Jardim Esmeralda', 'Avenida João Procópio da Silva', '700', 'Marília', 'br');

-- --------------------------------------------------------

--
-- Estrutura da tabela `login`
--

CREATE TABLE `login` (
  `id_login` int(11) NOT NULL,
  `nome` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `senha` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `login`
--

INSERT INTO `login` (`id_login`, `nome`, `email`, `senha`) VALUES
(1, 'Augusto', 'augusto.valenciano@fabricadecodigos.com.br', '3lZoWSLXRJr8eHdCplFKqg==');

-- --------------------------------------------------------

--
-- Estrutura da tabela `migrations`
--

CREATE TABLE `migrations` (
  `version` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `migrations`
--

INSERT INTO `migrations` (`version`) VALUES
(2);

-- --------------------------------------------------------

--
-- Estrutura da tabela `obra`
--

CREATE TABLE `obra` (
  `id_obra` int(11) NOT NULL,
  `nome_obra` varchar(50) NOT NULL,
  `descricao` varchar(120) NOT NULL,
  `id_endereco` int(11) NOT NULL,
  `ponto` varchar(30) NOT NULL,
  `prazo` date NOT NULL,
  `responsavel` varchar(50) NOT NULL,
  `aprovado` char(1) NOT NULL,
  `valor_programado` decimal(10,4) NOT NULL,
  `valor_final` decimal(10,4) NOT NULL,
  `user_finalizado` varchar(80) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `obra`
--

INSERT INTO `obra` (`id_obra`, `nome_obra`, `descricao`, `id_endereco`, `ponto`, `prazo`, `responsavel`, `aprovado`, `valor_programado`, `valor_final`, `user_finalizado`) VALUES
(1, 'Gustavo Camossi', 'Rua com o asfalto ruim e esgoto a ceu aberto', 1, '', '0000-00-00', '', 'F', '0.0000', '0.0000', '');

-- --------------------------------------------------------

--
-- Estrutura da tabela `ouvidoria`
--

CREATE TABLE `ouvidoria` (
  `id_ouvidoria` int(11) NOT NULL,
  `cidadao` varchar(80) NOT NULL,
  `cep` char(9) NOT NULL,
  `endereco` varchar(80) NOT NULL,
  `rua` varchar(80) NOT NULL,
  `numero` char(5) NOT NULL,
  `bairro` varchar(80) NOT NULL,
  `reclamacao` varchar(120) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `ouvidoria`
--

INSERT INTO `ouvidoria` (`id_ouvidoria`, `cidadao`, `cep`, `endereco`, `rua`, `numero`, `bairro`, `reclamacao`) VALUES
(2, 'Julio Pereira', '17516740', 'Avenida João Procópio da Silva,Jardim Esmeralda,900', 'Avenida João Procópio da Silva', '900', 'Jardim Esmeralda', 'testeee');

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `chat_messages`
--
ALTER TABLE `chat_messages`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `endereco`
--
ALTER TABLE `endereco`
  ADD PRIMARY KEY (`id_endereco`);

--
-- Índices para tabela `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`id_login`);

--
-- Índices para tabela `obra`
--
ALTER TABLE `obra`
  ADD PRIMARY KEY (`id_obra`);

--
-- Índices para tabela `ouvidoria`
--
ALTER TABLE `ouvidoria`
  ADD PRIMARY KEY (`id_ouvidoria`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `chat_messages`
--
ALTER TABLE `chat_messages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `endereco`
--
ALTER TABLE `endereco`
  MODIFY `id_endereco` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de tabela `login`
--
ALTER TABLE `login`
  MODIFY `id_login` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de tabela `obra`
--
ALTER TABLE `obra`
  MODIFY `id_obra` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de tabela `ouvidoria`
--
ALTER TABLE `ouvidoria`
  MODIFY `id_ouvidoria` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
