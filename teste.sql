-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 17-Jul-2021 às 15:44
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
-- Banco de dados: `teste`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `baixas`
--

CREATE TABLE `baixas` (
  `id` int(11) UNSIGNED NOT NULL,
  `idProduto` varchar(255) DEFAULT NULL,
  `quantidadeRetirada` varchar(255) DEFAULT NULL,
  `data` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `baixas`
--

INSERT INTO `baixas` (`id`, `idProduto`, `quantidadeRetirada`, `data`) VALUES
(1, '1', '10', '2021-07-15 18:55:16'),
(2, '1', '10', '2021-07-16 19:10:15'),
(3, '1', '-10', '2021-07-16 19:10:20'),
(4, '13', '-50', '2021-07-17 12:52:19'),
(5, '3', '-20', '2021-07-17 13:13:29'),
(6, '5', '-100', '2021-07-17 13:13:36');

-- --------------------------------------------------------

--
-- Estrutura da tabela `estoque`
--

CREATE TABLE `estoque` (
  `id` int(11) UNSIGNED NOT NULL,
  `nome` varchar(255) DEFAULT NULL,
  `quantidade` varchar(255) DEFAULT NULL,
  `sku` varchar(255) DEFAULT NULL,
  `data` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `estoque`
--

INSERT INTO `estoque` (`id`, `nome`, `quantidade`, `sku`, `data`) VALUES
(1, 'Arroz', '290', '001AR', '2021-07-15 18:29:07'),
(3, 'Feijão', '500', '003FE', '2021-07-15 18:29:07'),
(4, 'Açúcar', '50', '004AÇ', '2021-07-16 18:29:07'),
(5, 'Banana', '200', '005BA', '2021-07-16 18:29:07'),
(7, 'Batata', '300', '007BA', '2021-07-16 18:29:07'),
(8, 'Nescau', '55', '008NE', '2021-07-17 18:29:07'),
(9, 'Pudim', '25', '009PU', '2021-07-17 18:29:07'),
(12, 'Cebola', '600', '0010CE', '2021-07-18 12:27:52'),
(13, 'Fubá', '150', '0011FU', '2021-07-17 12:51:34');

-- --------------------------------------------------------

--
-- Estrutura da tabela `produtos`
--

CREATE TABLE `produtos` (
  `id` int(11) UNSIGNED NOT NULL,
  `nome` varchar(255) DEFAULT NULL,
  `quantidade` varchar(255) DEFAULT NULL,
  `sku` varchar(255) DEFAULT NULL,
  `data` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `produtos`
--

INSERT INTO `produtos` (`id`, `nome`, `quantidade`, `sku`, `data`) VALUES
(1, 'Arroz', '290', '001AR', '2021-07-15 18:29:07'),
(3, 'Feijão', '480', '003FE', '2021-07-15 18:29:07'),
(4, 'Açúcar', '50', '004AÇ', '2021-07-16 18:29:07'),
(5, 'Banana', '100', '005BA', '2021-07-16 18:29:07'),
(7, 'Batata', '300', '007BA', '2021-07-16 18:29:07'),
(8, 'Nescau', '55', '008NE', '2021-07-17 18:29:07'),
(9, 'Pudim', '25', '009PU', '2021-07-17 18:29:07'),
(12, 'Cebola', '600', '0010CE', '2021-07-18 12:27:52'),
(13, 'Fubá', '100', '0011FU', '2021-07-17 12:51:34');

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) UNSIGNED NOT NULL,
  `user` varchar(255) DEFAULT NULL,
  `senha` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `usuarios`
--

INSERT INTO `usuarios` (`id`, `user`, `senha`) VALUES
(1, 'admin', 'admin');

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `baixas`
--
ALTER TABLE `baixas`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `estoque`
--
ALTER TABLE `estoque`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `produtos`
--
ALTER TABLE `produtos`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `baixas`
--
ALTER TABLE `baixas`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de tabela `estoque`
--
ALTER TABLE `estoque`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT de tabela `produtos`
--
ALTER TABLE `produtos`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT de tabela `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
