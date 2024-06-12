-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 05/12/2023 às 19:16
-- Versão do servidor: 10.4.28-MariaDB
-- Versão do PHP: 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `db_pelucias`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `tabcarrinho`
--

CREATE TABLE `tabcarrinho` (
  `carId` int(11) NOT NULL,
  `carProId` int(11) NOT NULL,
  `carQtde` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `tabcarrinho`
--

INSERT INTO `tabcarrinho` (`carId`, `carProId`, `carQtde`) VALUES
(1, 0, 5);

-- --------------------------------------------------------

--
-- Estrutura para tabela `tabclientes`
--

CREATE TABLE `tabclientes` (
  `funId` int(11) NOT NULL,
  `unNome` varchar(10) NOT NULL,
  `funSenha` varchar(10) NOT NULL,
  `funEmail` varchar(50) NOT NULL,
  `funEnd` varchar(70) NOT NULL,
  `funCep` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `tabfuncionarios`
--

CREATE TABLE `tabfuncionarios` (
  `funId` int(11) NOT NULL,
  `funNome` varchar(10) NOT NULL,
  `funSenha` varchar(10) NOT NULL,
  `funEmail` varchar(50) NOT NULL,
  `funCargo` varchar(20) NOT NULL,
  `funUsuario` varchar(10) NOT NULL,
  `funFoto` varchar(18) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `tabfuncionarios`
--

INSERT INTO `tabfuncionarios` (`funId`, `funNome`, `funSenha`, `funEmail`, `funCargo`, `funUsuario`, `funFoto`) VALUES
(123, 'Carol', '1234', 'carolinyteste@gmail.com', 'Segurança', '1234', 'mulher1'),
(0, '', '', '', '', '', '');

-- --------------------------------------------------------

--
-- Estrutura para tabela `tabprodutos`
--

CREATE TABLE `tabprodutos` (
  `proId` int(11) NOT NULL,
  `proDescricao` varchar(255) DEFAULT NULL,
  `proImagem` varchar(30) NOT NULL,
  `proPreco` decimal(10,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `tabprodutos`
--

INSERT INTO `tabprodutos` (`proId`, `proDescricao`, `proImagem`, `proPreco`) VALUES
(0, 'Pelúcia Ursinho', 'ursinho', 25.99),
(0, 'Pelúcia Coelhinho', 'coelho', 19.99),
(0, 'Pelúcia Carneirinho', 'carneiro', 29.99),
(0, 'Pelúcia Leãozinho', 'leao', 22.50),
(0, 'Pelúcia Elefantinho', 'elefante', 27.99),
(0, 'Pelúcia Girafinha', 'girafa', 32.99),
(0, 'Pelúcia Ursinho', 'ursinho', 25.99),
(0, 'Pelúcia Coelhinho', 'coelho', 19.99),
(0, 'Pelúcia Carneirinho', 'carneiro', 29.99),
(0, 'Pelúcia Leãozinho', 'leao', 22.50),
(0, 'Pelúcia Elefantinho', 'elefante', 27.99),
(0, 'Pelúcia Girafinha', 'girafa', 32.99);

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `tabcarrinho`
--
ALTER TABLE `tabcarrinho`
  ADD PRIMARY KEY (`carId`);

--
-- AUTO_INCREMENT para tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `tabcarrinho`
--
ALTER TABLE `tabcarrinho`
  MODIFY `carId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
