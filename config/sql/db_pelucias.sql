-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 29/06/2024 às 20:02
-- Versão do servidor: 10.4.32-MariaDB
-- Versão do PHP: 8.2.12

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
-- Estrutura para tabela `carrinho_compras`
--

CREATE TABLE `carrinho_compras` (
  `id` int(11) NOT NULL,
  `produto_id` int(11) NOT NULL,
  `quantidade` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `carrinho_compras`
--

INSERT INTO `carrinho_compras` (`id`, `produto_id`, `quantidade`) VALUES
(1, 1, 5);

-- --------------------------------------------------------

--
-- Estrutura para tabela `clientes`
--

CREATE TABLE `clientes` (
  `id` int(11) NOT NULL,
  `nome` varchar(10) NOT NULL,
  `senha` varchar(10) NOT NULL,
  `email` varchar(50) NOT NULL,
  `endereco` varchar(70) NOT NULL,
  `cep` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `clientes`
--

INSERT INTO `clientes` (`id`, `nome`, `senha`, `email`, `endereco`, `cep`) VALUES
(2, 'José', '1234', 'jose@email.com', 'Rua das Flores, 43', '23123123'),
(4, 'Lukas', '1234', 'lukas@email.com', 'Rua Olinda, 23', '546456456');

-- --------------------------------------------------------

--
-- Estrutura para tabela `funcionarios`
--

CREATE TABLE `funcionarios` (
  `id` int(11) NOT NULL,
  `nome` varchar(10) NOT NULL,
  `senha` varchar(10) NOT NULL,
  `email` varchar(50) NOT NULL,
  `cargo` varchar(20) NOT NULL,
  `usuario` varchar(10) NOT NULL,
  `foto` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `funcionarios`
--

INSERT INTO `funcionarios` (`id`, `nome`, `senha`, `email`, `cargo`, `usuario`, `foto`) VALUES
(126, 'Caroliny R', '123', 'caroliny@email.com', 'Funcionário', 'carol', 'fc460a284730714d9fb73b8599cc20e2.png'),
(127, 'Jéssica Bu', '1234', 'jessica@email.com', 'Funcionária', 'jessica', '3c196636d5899e72da794f93c630d63e.png'),
(128, 'Gabriel Ba', '1234', 'gabriel@email.com', 'Funcionário', 'gabriel', 'd62933030c430acf87985570674240ec.png');

-- --------------------------------------------------------

--
-- Estrutura para tabela `produtos`
--

CREATE TABLE `produtos` (
  `id` int(11) NOT NULL,
  `descricao` varchar(255) DEFAULT NULL,
  `imagem` varchar(30) NOT NULL,
  `preco` decimal(10,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `produtos`
--

INSERT INTO `produtos` (`id`, `descricao`, `imagem`, `preco`) VALUES
(1, 'Pelúcia Ursinho', 'ursinho', 25.99),
(2, 'Pelúcia Coelhinho', 'coelho', 19.99),
(3, 'Pelúcia Carneirinho', 'carneiro', 29.99),
(4, 'Pelúcia Leãozinho', 'leao', 22.50),
(5, 'Pelúcia Elefantinho', 'elefante', 27.99),
(6, 'Pelúcia Girafinha', 'girafa', 32.99);

-- --------------------------------------------------------

--
-- Estrutura para tabela `tabclientes`
--

CREATE TABLE `tabclientes` (
  `cliId` int(11) NOT NULL,
  `cliNome` varchar(40) NOT NULL,
  `cliTelefone` varchar(15) DEFAULT NULL,
  `cliDataNasc` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `tabclientes`
--

INSERT INTO `tabclientes` (`cliId`, `cliNome`, `cliTelefone`, `cliDataNasc`) VALUES
(1, 'Jorge Aparecido Lopes', '(11) 94545-1212', '2023-10-04'),
(2, 'Sandra Conceição Oliveira', '(11) 91445-8895', '2023-10-23'),
(3, 'Pedro Vieira de Carvalho', '(11) 94782-1289', '0000-00-00'),
(4, 'testes', 'testes', '0000-00-00');

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `carrinho_compras`
--
ALTER TABLE `carrinho_compras`
  ADD PRIMARY KEY (`id`),
  ADD KEY `produto_id` (`produto_id`);

--
-- Índices de tabela `clientes`
--
ALTER TABLE `clientes`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `funcionarios`
--
ALTER TABLE `funcionarios`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `produtos`
--
ALTER TABLE `produtos`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `tabclientes`
--
ALTER TABLE `tabclientes`
  ADD PRIMARY KEY (`cliId`);

--
-- AUTO_INCREMENT para tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `carrinho_compras`
--
ALTER TABLE `carrinho_compras`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de tabela `clientes`
--
ALTER TABLE `clientes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de tabela `funcionarios`
--
ALTER TABLE `funcionarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=129;

--
-- AUTO_INCREMENT de tabela `produtos`
--
ALTER TABLE `produtos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de tabela `tabclientes`
--
ALTER TABLE `tabclientes`
  MODIFY `cliId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Restrições para tabelas despejadas
--

--
-- Restrições para tabelas `carrinho_compras`
--
ALTER TABLE `carrinho_compras`
  ADD CONSTRAINT `carrinho_compras_ibfk_1` FOREIGN KEY (`produto_id`) REFERENCES `produtos` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
