-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Tempo de geração: 12-Ago-2024 às 01:26
-- Versão do servidor: 8.0.31
-- versão do PHP: 8.0.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `trab_martin_luciano`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `recuperar_senha`
--

DROP TABLE IF EXISTS `recuperar_senha`;
CREATE TABLE IF NOT EXISTS `recuperar_senha` (
  `token` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `usado` tinyint(1) NOT NULL,
  `data_criacao` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Extraindo dados da tabela `recuperar_senha`
--

INSERT INTO `recuperar_senha` (`token`, `email`, `usado`, `data_criacao`) VALUES
('b180cd580134452f3a6d8b13768bbd5ce89297a9ab265c2f31be312b18e329f6a60253699cfe968f5aa4713d73fd94f5422a', 'dbogofbr@gmail.com', 0, '2024-08-11 22:21:38'),
('7ef77c9b8eb608badab519c3bff0a6e9d622c820e5b1fe3d82b22a7915d01a8b9b69bc3ac5102631b68a18073c39137e7c9d', 'dbogofbr@gmail.com', 0, '2024-08-11 22:22:44'),
('f31cb8a0c5b11208ba4f0234d25f29249b26acba6fe823399160d8233dae3ef0997c80d42989ae5ba0f4a5fe2a9659fab3d5', 'dbogofbr@gmail.com', 0, '2024-08-11 22:22:50'),
('8139d5b3bb7b1528f1799b485489ceb134f9bcad5af97ce0e85e83211e70e9264610cc26a32f9926b624184d0a4df81b509f', 'dbogofbr@gmail.com', 0, '2024-08-11 22:22:54'),
('ee9bd573209243fc1b988ed3d032b66990a08627d48813d7797d3deafc4905097603966a96f66be6ff3038efaf68da4cefaf', 'dbogofbr@gmail.com', 0, '2024-08-11 22:22:58'),
('8bc34d44d3b6f21670cde81f90a196101eda50b3bd55b12eeaa4da47dfeeb2cbef7ecf1381656e22c9f0496a8cc248ab83f2', 'dbogofbr@gmail.com', 0, '2024-08-11 22:23:03'),
('7b2999684ef7975abd2e98c9c1bba486af0f7624c060bd8a9cfa41f7d94e4b294a6c770d5ab50d131dff5172280134a452bc', 'yofqby@gmail.com', 0, '2024-08-11 22:25:19'),
('07b833623df1dbc206c5a489cb26ea4e033f5f6fedb7aa018eac10d921f8e0c9a9eb2ccc1faaa3e9d5280e7d4c365271607c', 'yofqby@gmail.com', 0, '2024-08-11 22:25:25'),
('62f567540ac350bb124b8b830fbb71fbb826d24cf94ff2475269a850aecb205d48716b0a20c8739c6dd6c25c190e3d0e59cb', 'yofqby@gmail.com', 0, '2024-08-11 22:25:32');

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuario`
--

DROP TABLE IF EXISTS `usuario`;
CREATE TABLE IF NOT EXISTS `usuario` (
  `id_usuario` int NOT NULL AUTO_INCREMENT,
  `nome` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `senha` varchar(255) NOT NULL,
  `foto` varchar(255) DEFAULT 'default.jpg',
  PRIMARY KEY (`id_usuario`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Extraindo dados da tabela `usuario`
--

INSERT INTO `usuario` (`id_usuario`, `nome`, `email`, `senha`, `foto`) VALUES
(12, 'Luciano', 'lucianokubner22@gmail.com', '12', '66afd8581f981.jfif'),
(16, 'gab', 'gab@gmail.com', '123', 'default.jpg'),
(17, 'gab', 'dbogofbr@gmail.com', '123', '66b9631a01c53.jfif'),
(19, 'joao', 'yofqby@gmail.com', '123', '66b964711f5f7.png');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
