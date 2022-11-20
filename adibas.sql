-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 19-Nov-2022 às 20:13
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
-- Banco de dados: `adibas`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `tbcliente`
--

CREATE TABLE `tbcliente` (
  `idCliente` int(11) NOT NULL,
  `email` varchar(250) NOT NULL,
  `senha` varchar(250) NOT NULL,
  `nome` varchar(50) NOT NULL,
  `rua` varchar(50) NOT NULL,
  `bairro` varchar(30) NOT NULL,
  `fone` varchar(30) NOT NULL,
  `funcao` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `tbcliente`
--

INSERT INTO `tbcliente` (`idCliente`, `email`, `senha`, `nome`, `rua`, `bairro`, `fone`, `funcao`) VALUES
(12, 'parochasoares@gmail.com', '123456', 'Paulo André Rocha Soares', 'Rua dos bobos', 'Zero', '19971699117', 'cliente'),
(15, 'alo@alo.com', '123456', 'paulo', '123', '123', '19971699117', 'cliente');

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
(3, 's', 'teste15@teste.com', '123456', 'Paulo Coelho', 'vendedor'),
(8, 's', 'pa@pa.com', '123456', 'Paulo', 'vendedor');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tbpedido`
--

CREATE TABLE `tbpedido` (
  `idPedido` int(11) NOT NULL,
  `idCliente` int(11) NOT NULL,
  `idProduto` int(11) NOT NULL,
  `quantidade` int(11) NOT NULL,
  `data` varchar(15) NOT NULL,
  `precoPago` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `tbpedido`
--

INSERT INTO `tbpedido` (`idPedido`, `idCliente`, `idProduto`, `quantidade`, `data`, `precoPago`) VALUES
(1, 12, 15, 1, '20/09/2022', '10.50'),
(2, 12, 14, 2, '20/09/2022', '16.00'),
(3, 12, 12, 1, '20/09/2022', '5.00'),
(4, 12, 1, 1, '20/09/2022', '319.99'),
(5, 12, 7, 1, '20/09/2022', '219.99'),
(6, 15, 1, 4, '21/09/2022', '1279.96');

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
(1, 's', 'Air Cloud', 'Confortável e leve, pra quem vive nas nuvens. ☁', '350.00', 's', '319.99', '1663666428632988fc49309.png'),
(2, 's', 'Air Banana', 'Simples e pra todas as situações, pra você que não gosta de sair do básico. 🍌', '219.99', 'n', '0.00', '16636664976329894116ff8.png'),
(3, 's', 'Air Citric', 'Para você que gosta de algo mais ousado, e não tem medo da acidez alheia. 🍋', '229.99', 'n', '0.00', '16636665236329895b981cf.png'),
(4, 's', 'Air Flower', 'Para você que é mais doce, e busca pelo estilo e conforto. 💐', '239.99', 'n', '0.00', '166366655163298977e85e8.png'),
(5, 's', 'Air Dragon Fruit', 'Para você que é diferenciado, e quer mostrar que não é como os outros. 🐉', '209.99', 'n', '0.00', '1663666613632989b5cab41.png'),
(6, 's', 'Air Midnight', 'Para você que busca furtividade e simplicidade, mas deixando sua marca. 🐱‍👤', '309.99', 'n', '290.99', '1663666638632989ce6f8a3.png'),
(7, 's', 'Air Apple', 'Para você que quer tirar a gravidade da cabeça e curtir. 🍎', '219.99', 'n', '0.00', '1663709944632a32f89fdf5.png'),
(19, 's', 'Charmander', 'Para quem prefere os clássicos, mas não deixa de ter uma personalidade marcante e gentil.🔥', '249.99', 'n', '0.00', '166881694963782035d1705.png'),
(20, 's', 'Bulbassauro', 'Para quem prefere o básico e é mais relaxado. 🍃', '399.99', 'n', '0.00', '166881700163782069d353c.png'),
(21, 's', 'Squirtle', 'Para quem gosta de chamar a atenção e quer deixar sua marca. 🌊', '189.00', 'n', '0.00', '1668817057637820a176131.png'),
(22, 's', 'Pikachu', 'Para quem se sente o protagonista da própria vida, e tem uma personalidade eletrizante. ⚡', '399.99', 'n', '0.00', '1668817102637820ce766a7.png'),
(23, 's', 'AIR Dragonite', 'Para quem não se importa com as aparências, e tem orgulho de si. 😎', '599.99', 'n', '0.00', '1668817142637820f647e6b.png'),
(24, 's', 'AIR Jigglypuff', 'Para as pessoas fofas e instáveis, que se irritam rápido. 😘😡', '599.99', 'n', '0.00', '1668817191637821277b0e0.png'),
(25, 's', 'AIR Snorlax', 'Para quem é preguiçoso e pacífico, sempre buscando o simples. 😴', '599.99', 'n', '0.00', '166881724063782158e2c0d.png');

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
  ADD PRIMARY KEY (`idPedido`);

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
  MODIFY `idCliente` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT de tabela `tbfunc`
--
ALTER TABLE `tbfunc`
  MODIFY `idFunc` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de tabela `tbpedido`
--
ALTER TABLE `tbpedido`
  MODIFY `idPedido` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de tabela `tbproduto`
--
ALTER TABLE `tbproduto`
  MODIFY `idProduto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
