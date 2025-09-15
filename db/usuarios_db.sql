-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 15/09/2025 às 03:57
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
-- Banco de dados: `usuarios_db`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `receitas`
--

CREATE TABLE `receitas` (
  `id_receita` int(11) NOT NULL,
  `usuario_id` int(11) NOT NULL,
  `nome_receita` varchar(64) NOT NULL,
  `descricao` varchar(256) NOT NULL,
  `ingredientes` varchar(256) NOT NULL,
  `utensilios` varchar(256) NOT NULL,
  `etapa1` varchar(512) NOT NULL,
  `etapa2` varchar(512) NOT NULL,
  `etapa3` varchar(512) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `receitas`
--

INSERT INTO `receitas` (`id_receita`, `usuario_id`, `nome_receita`, `descricao`, `ingredientes`, `utensilios`, `etapa1`, `etapa2`, `etapa3`) VALUES
(1, 7, 'Mr pelado', 'mr', 'mr', 'come ele', '', '', ''),
(2, 8, 'Mr queimado', 'mr fogo', 'mr, fogo', 'pinto', 'pega o pinto e bota fogo', 'mr queimado', '');

-- --------------------------------------------------------

--
-- Estrutura para tabela `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `nome` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `senha` varchar(255) NOT NULL,
  `foto` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `usuarios`
--

INSERT INTO `usuarios` (`id`, `nome`, `email`, `senha`, `foto`) VALUES
(7, 'Caio', 'caio2309abreu@gmail.com', '$2y$10$yokjo2XOp9QguHi0vLfXu.ZtdYp3Euv7OFz4wbWos0dPSqW5gD/Um', 'src/img/uploads/6824fd0b812f3.jpg'),
(8, 'Paulo Freire', 'caioabreu2318@gmail.com', '$2y$10$EP7x3iGUqYvKIyp.NhKegeNSFwQP/WpT2oeMFn0erymxFFkftkMk2', 'src/img/uploads/6824fd705f417.png'),
(9, 'Teste Mensagem1', 'mmm@mmm', '$2y$10$soZ4uoTA.42Jr2wERmpgEeUexjXh/G.xwBVATZ1IS0uevYHvo1oIu', NULL),
(11, 'Teste Mensagem2', 'mmm@mmm2', '$2y$10$7klo1hLieA6AsLp4Vk078eMopXt2UWoxJB7kxkSGkrRZIggrEiE2m', NULL),
(12, 'teste mensagem 3', 'bla@baba', '$2y$10$Pe/DlO2XbU81EwsiS.73vu/8IcXgtsGCVSCzrOvLWqP/6LaQRl4Yi', NULL),
(13, 'Kely', 'kely@kaka', '$2y$10$ZOAMb.KnEkRU/eG2U./4Iep40fmy2Uzf9tdPv8qi164qt8MmmK/eu', NULL),
(14, 'Kely', 'bababa@baba', '$2y$10$obIxaNaGMEGDIsIF2cBujet0BROsVS0qKPMnXLxbWwkftpABqIxE.', NULL),
(15, 'Lucas', 'ga@g', '$2y$10$zNWdnFmKXHgfCNzp7gJWe.kiNqir67fed1tspSVuz.NJ0xOX4R4.K', NULL),
(16, 'Teste Cad 5', 'lala@lala', '$2y$10$ug0PKOGFIX8xGwCqK2KQNuRVfjqqEx/.jo.TAt/Gjc5KYZ6EgR9H6', NULL);

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `receitas`
--
ALTER TABLE `receitas`
  ADD PRIMARY KEY (`id_receita`),
  ADD KEY `fk_usuario` (`usuario_id`);

--
-- Índices de tabela `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT para tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `receitas`
--
ALTER TABLE `receitas`
  MODIFY `id_receita` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de tabela `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- Restrições para tabelas despejadas
--

--
-- Restrições para tabelas `receitas`
--
ALTER TABLE `receitas`
  ADD CONSTRAINT `fk_usuario` FOREIGN KEY (`usuario_id`) REFERENCES `usuarios` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
