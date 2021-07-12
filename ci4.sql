-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 12-Jul-2021 às 11:35
-- Versão do servidor: 10.4.19-MariaDB
-- versão do PHP: 8.0.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `ci4`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `autorizid_tokens`
--

CREATE TABLE `autorizid_tokens` (
  `id` int(11) NOT NULL,
  `token` varchar(255) NOT NULL,
  `status` varchar(10) NOT NULL DEFAULT 'N',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `deleted_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `autorizid_tokens`
--

INSERT INTO `autorizid_tokens` (`id`, `token`, `status`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'c4a1fc70e4c269ac6408321a5c2ab885', 'S', '2021-07-12 02:03:36', '2021-07-12 02:06:04', '2021-07-12 02:06:04'),
(3, 'c2a1fc70e4c269ac6411311a5c2ab885', 'S', '2021-07-12 02:03:36', '2021-07-12 02:06:04', '2021-07-12 02:06:04'),
(9, 'b3a9fc70e4c269ac6408321a5c2ac770', 'N', '2021-07-12 02:03:36', '2021-07-12 02:06:04', '2021-07-12 02:06:04'),
(10, 'b3a9fc70e4c279ac6408321a5c2ac770', 'N', '2021-07-12 02:03:36', '2021-07-12 02:06:04', '2021-07-12 02:06:04'),
(11, 'b3a9fc70e4c279ac6408321a5c2ac970', 'N', '2021-07-12 02:03:36', '2021-07-12 02:06:04', '2021-07-12 02:06:04'),
(12, 'b3a9fc70e4c279ac6408321a5c2ac971', 'N', '2021-07-12 02:03:36', '2021-07-12 02:06:04', '2021-07-12 02:06:04'),
(13, 'b3a9fc70e4c279ac6408321a8c2ac971', 'N', '2021-07-12 02:03:36', '2021-07-12 02:06:04', '2021-07-12 02:06:04'),
(14, 'b3a9fc70e4c279ac6408321a8c2ac671', 'N', '2021-07-12 02:03:36', '2021-07-12 02:06:04', '2021-07-12 02:06:04'),
(15, 'b3b9fc70e4c279ac6408321a8c2ac671', 'N', '2021-07-12 02:03:36', '2021-07-12 02:06:04', '2021-07-12 02:06:04'),
(16, 'b3b9fc70e4c279ac6408321a8c9ac671', 'N', '2021-07-12 02:03:36', '2021-07-12 02:06:04', '2021-07-12 02:06:04');

-- --------------------------------------------------------

--
-- Estrutura da tabela `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `name` varchar(75) NOT NULL,
  `lastName` varchar(75) NOT NULL,
  `bi` varchar(20) NOT NULL,
  `phone` varchar(15) NOT NULL,
  `email` varchar(85) NOT NULL,
  `password` varchar(100) NOT NULL,
  `id_autorizid_tokens` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT '2021-07-11 02:34:10',
  `deleted_at` timestamp NOT NULL DEFAULT '2021-07-11 02:34:10'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `user`
--

INSERT INTO `user` (`id`, `name`, `lastName`, `bi`, `phone`, `email`, `password`, `id_autorizid_tokens`, `created_at`, `updated_at`, `deleted_at`) VALUES
(4, 'Miguel', 'Pascoal Leite', '224456674LD187', '+244937858769', 'miguelleite200leite0@gmail.com', '12345678', 1, '2021-07-11 06:05:25', '2021-07-11 00:05:25', '2021-07-11 02:34:10'),
(5, 'Miguel', 'Leite', '003456678LD068', '244927758487', 'miguelleite200leite1@gmail.com', '1234567', 9, '2021-07-11 02:34:10', '2021-07-11 02:34:10', '2021-07-11 02:34:10'),
(6, 'Miguel', 'Leite', '003456678LD069', '+244927758487', 'miguelleite200leite2@gmail.com', '1234567', 10, '2021-07-11 02:34:10', '2021-07-11 02:34:10', '2021-07-11 02:34:10'),
(7, 'Miguel', 'Leite', '003456678LD079', '+244927758477', 'miguelleite200leite10@gmail.com', '1234567', 11, '2021-07-11 02:34:10', '2021-07-11 02:34:10', '2021-07-11 02:34:10'),
(9, 'Miguel', 'Leite', '223456676LD167', '+244937758467', 'miguelleite200leite4@gmail.com', '1234567', 13, '2021-07-11 02:34:10', '2021-07-11 02:34:10', '2021-07-11 02:34:10'),
(10, 'Miguel', 'Leite', '223456674LD167', '+244937758469', 'miguelleite200leite5@gmail.com', '1234567', 14, '2021-07-11 02:34:10', '2021-07-11 02:34:10', '2021-07-11 02:34:10'),
(11, 'Miguel', 'Leite', '224456674LD167', '+244937858469', 'miguelleite200leite6@gmail.com', '1234567', 15, '2021-07-11 02:34:10', '2021-07-11 02:34:10', '2021-07-11 02:34:10');

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `autorizid_tokens`
--
ALTER TABLE `autorizid_tokens`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `autorizid_tokens`
--
ALTER TABLE `autorizid_tokens`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT de tabela `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
