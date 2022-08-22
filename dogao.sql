-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 12-Nov-2021 às 15:18
-- Versão do servidor: 10.4.17-MariaDB
-- versão do PHP: 8.0.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `dogao`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `tbcliente`
--

CREATE TABLE `tbcliente` (
  `idCliente` int(11) NOT NULL,
  `ativo` char(1) NOT NULL,
  `email` varchar(250) NOT NULL,
  `senha` varchar(250) NOT NULL,
  `nome` varchar(50) NOT NULL,
  `rua` varchar(50) NOT NULL,
  `bairro` varchar(30) NOT NULL,
  `fone` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tbfunc`
--

CREATE TABLE `tbfunc` (
  `idFunc` int(11) NOT NULL,
  `ativo` char(1) NOT NULL,
  `email` varchar(250) NOT NULL,
  `senha` varchar(250) NOT NULL,
  `nome` varchar(50) NOT NULL,
  `funcao` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `tbfunc`
--

INSERT INTO `tbfunc` (`idFunc`, `ativo`, `email`, `senha`, `nome`, `funcao`) VALUES
(1, 's', 'supervisor@supervisor.com', 'supervisor', 'supervisor', 'gerente'),
(2, 's', 'teste5@teste.br', '123456', 'João Grandão', 'gerente'),
(3, 's', 'teste15@teste.com', '123456', 'Paulo Coelho', 'vendedor'),
(4, 's', 'teste1@teste.com', '123456', 'Paulo', 'vendedor'),
(5, 'n', 'testeXX@teste.com.br', '123456', 'Pacato Silva', 'caixa'),
(6, 'n', '', '123456', '', ''),
(7, 's', 'teste5@teste.com', '123456', 'Joana', 'caixa');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tbpedido`
--

CREATE TABLE `tbpedido` (
  `idPedito` int(11) NOT NULL,
  `idCliente` int(11) NOT NULL,
  `idProduto` int(11) NOT NULL,
  `data` date NOT NULL,
  `precoPago` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tbproduto`
--

CREATE TABLE `tbproduto` (
  `idProduto` int(11) NOT NULL,
  `ativo` char(1) NOT NULL,
  `produto` varchar(30) NOT NULL,
  `descricaoProduto` varchar(100) NOT NULL,
  `precoVenda` decimal(10,2) NOT NULL,
  `promocao` char(1) NOT NULL,
  `precoPromocao` decimal(10,2) NOT NULL,
  `nomeFoto` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `tbproduto`
--

INSERT INTO `tbproduto` (`idProduto`, `ativo`, `produto`, `descricaoProduto`, `precoVenda`, `promocao`, `precoPromocao`, `nomeFoto`) VALUES
(11, 's', 'Salgado', 'coxinha de frango', '5.00', 'n', '0.00', '16362188276186b7cb2307c.jpg'),
(12, 's', 'Salgado', 'coxinha de frango e catupiry', '5.00', 'n', '0.00', '16362188786186b7feb53cb.jpg'),
(13, 's', 'Salgado', 'coxinha de queijo grande', '4.50', 'n', '4.40', '16362200836186bcb3c4239.jpg'),
(14, 's', 'Pastel', 'queijo e presunto', '9.00', 's', '8.00', '16362189686186b85871145.jpg'),
(15, 's', 'Pastel', 'frango e catupiry', '10.50', 'n', '10.00', '16362200296186bc7d6b205.jpg'),
(16, 'n', 'Salgado', 'bolinha de queijo ', '8.00', 'n', '0.00', '1636639929618d24b930def.jpg');

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `tbcliente`
--
ALTER TABLE `tbcliente`
  ADD PRIMARY KEY (`idCliente`);

--
-- Índices para tabela `tbfunc`
--
ALTER TABLE `tbfunc`
  ADD PRIMARY KEY (`idFunc`);

--
-- Índices para tabela `tbpedido`
--
ALTER TABLE `tbpedido`
  ADD PRIMARY KEY (`idPedito`);

--
-- Índices para tabela `tbproduto`
--
ALTER TABLE `tbproduto`
  ADD PRIMARY KEY (`idProduto`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `tbcliente`
--
ALTER TABLE `tbcliente`
  MODIFY `idCliente` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `tbfunc`
--
ALTER TABLE `tbfunc`
  MODIFY `idFunc` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de tabela `tbpedido`
--
ALTER TABLE `tbpedido`
  MODIFY `idPedito` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `tbproduto`
--
ALTER TABLE `tbproduto`
  MODIFY `idProduto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
