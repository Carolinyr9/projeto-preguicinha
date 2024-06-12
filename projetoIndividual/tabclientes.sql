-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 31-Out-2023 às 13:49
-- Versão do servidor: 10.4.21-MariaDB
-- versão do PHP: 8.0.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `bd_exemplo`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `tabclientes`
--

CREATE TABLE `tabclientes` (
  `cliId` int(11) NOT NULL,
  `cliNome` varchar(40) NOT NULL,
  `cliTelefone` varchar(15) DEFAULT NULL,
  `cliDataNasc` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `tabclientes`
--

INSERT INTO `tabclientes` (`cliId`, `cliNome`, `cliTelefone`, `cliDataNasc`) VALUES
(1, 'Jorge Aparecido Lopes', '(11) 94545-1212', '2023-10-04'),
(2, 'Sandra Conceição Oliveira', '(11) 91445-8895', '2023-10-23'),
(3, 'Pedro Vieira de Carvalho', '(11) 94782-1289', '0000-00-00');

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `tabclientes`
--
ALTER TABLE `tabclientes`
  ADD PRIMARY KEY (`cliId`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `tabclientes`
--
ALTER TABLE `tabclientes`
  MODIFY `cliId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
