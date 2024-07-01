-- Criação do banco de dados e uso
CREATE DATABASE IF NOT EXISTS db_pelucias;
USE db_pelucias;

-- Tabela de clientes
CREATE TABLE IF NOT EXISTS clientes (
  id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
  nome VARCHAR(10) NOT NULL,
  senha VARCHAR(10) NOT NULL,
  email VARCHAR(50) NOT NULL,
  endereco VARCHAR(70) NOT NULL,
  cep VARCHAR(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Tabela de funcionários
CREATE TABLE IF NOT EXISTS funcionarios (
  id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
  nome VARCHAR(10) NOT NULL,
  senha VARCHAR(10) NOT NULL,
  email VARCHAR(50) NOT NULL,
  cargo VARCHAR(20) NOT NULL,
  usuario VARCHAR(10) NOT NULL,
  foto VARCHAR(18) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Dados iniciais para a tabela de funcionários
INSERT INTO funcionarios (id, nome, senha, email, cargo, usuario, foto) VALUES
(123, 'Carol', '1234', 'carolinyteste@gmail.com', 'Segurança', '1234', 'mulher1'),
(1, '', '', '', '', '', '');

-- Tabela de produtos
CREATE TABLE IF NOT EXISTS produtos (
  id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
  descricao VARCHAR(255) DEFAULT NULL,
  imagem VARCHAR(30) NOT NULL,
  preco DECIMAL(10,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Dados iniciais para a tabela de produtos
INSERT INTO produtos (id, descricao, imagem, preco) VALUES
(1, 'Pelúcia Ursinho', 'ursinho', 25.99),
(2, 'Pelúcia Coelhinho', 'coelho', 19.99),
(3, 'Pelúcia Carneirinho', 'carneiro', 29.99),
(4, 'Pelúcia Leãozinho', 'leao', 22.50),
(5, 'Pelúcia Elefantinho', 'elefante', 27.99),
(6, 'Pelúcia Girafinha', 'girafa', 32.99);

-- Tabela de itens no carrinho de compras
CREATE TABLE IF NOT EXISTS carrinho_compras (
  id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
  produto_id INT NOT NULL,
  quantidade INT DEFAULT NULL,
  FOREIGN KEY (produto_id) REFERENCES produtos(id)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Dados iniciais para a tabela de carrinho de compras
INSERT INTO carrinho_compras (id, produto_id, quantidade) VALUES
(1, 1, 5);

-- Índices e AUTO_INCREMENT
-- ALTER TABLE carrinho_compras ADD PRIMARY KEY (id);
-- ALTER TABLE carrinho_compras MODIFY id INT NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

-- Fim do script SQL
