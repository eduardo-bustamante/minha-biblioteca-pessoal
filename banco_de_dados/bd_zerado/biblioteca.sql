-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 10/09/2023 às 02:19
-- Versão do servidor: 10.4.28-MariaDB
-- Versão do PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `biblioteca`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `idiomas`
--

CREATE TABLE `idiomas` (
  `id_idiomas` int(11) NOT NULL,
  `idioma` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `idiomas`
--

INSERT INTO `idiomas` (`id_idiomas`, `idioma`) VALUES
(1, 'Português'),
(2, 'Espanhol'),
(3, 'Inglês');

-- --------------------------------------------------------

--
-- Estrutura para tabela `livros`
--

CREATE TABLE `livros` (
  `id` int(11) NOT NULL,
  `titulo` varchar(100) NOT NULL,
  `autor` varchar(100) NOT NULL,
  `coleção` varchar(100) NOT NULL,
  `edição` int(11) NOT NULL,
  `volume` int(11) NOT NULL,
  `paginas` int(11) NOT NULL,
  `idioma` int(11) NOT NULL,
  `ano` int(11) NOT NULL,
  `editora` varchar(100) NOT NULL,
  `tema` varchar(100) NOT NULL,
  `quantidade` int(11) NOT NULL,
  `capa` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `login`
--

CREATE TABLE `login` (
  `idUser` int(11) NOT NULL,
  `usuario` varchar(100) NOT NULL,
  `senha` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `idiomas`
--
ALTER TABLE `idiomas`
  ADD PRIMARY KEY (`id_idiomas`);

--
-- Índices de tabela `livros`
--
ALTER TABLE `livros`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idioma` (`idioma`);

--
-- Índices de tabela `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`idUser`);

--
-- AUTO_INCREMENT para tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `idiomas`
--
ALTER TABLE `idiomas`
  MODIFY `id_idiomas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de tabela `livros`
--
ALTER TABLE `livros`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `login`
--
ALTER TABLE `login`
  MODIFY `idUser` int(11) NOT NULL AUTO_INCREMENT;

--
-- Restrições para tabelas despejadas
--

--
-- Restrições para tabelas `livros`
--
ALTER TABLE `livros`
  ADD CONSTRAINT `livros_ibfk_1` FOREIGN KEY (`idioma`) REFERENCES `idiomas` (`id_idiomas`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
