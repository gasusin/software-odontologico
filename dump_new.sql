-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 04-Dez-2018 às 05:11
-- Versão do servidor: 10.1.10-MariaDB
-- PHP Version: 5.5.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `software_odontologico`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `exame`
--

CREATE TABLE `exame` (
  `id` int(11) NOT NULL,
  `descricao` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `id_paciente` int(11) NOT NULL,
  `arquivo` longblob NOT NULL,
  `tipo` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `id_usuario_cadastro` int(11) NOT NULL,
  `data_exame` date NOT NULL,
  `nome_arquivo` varchar(70) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Extraindo dados da tabela `exame`
--

INSERT INTO `exame` (`id`, `descricao`, `id_paciente`, `arquivo`, `tipo`, `id_usuario_cadastro`, `data_exame`, `nome_arquivo`) VALUES
(1, 'Teste', 6, '', '', 4, '2018-12-01', ''),
(2, 'Teste2', 6, '', '', 4, '2018-12-02', ''),
(4, 'Teste2', 7, '', 'Radiologia', 4, '2018-12-02', ''),
(7, 'teste', 7, '', 'Radiologia', 4, '2018-12-02', '68a6c2945e6be86ead4b1ebf16c46574.png'),
(9, 'teste', 7, '', 'Radiologia', 4, '2018-12-02', '6e0ea49273e01e2407d4046bc1abecce.png'),
(10, 'teste', 7, '', 'Radiologia', 4, '2018-12-02', 'f8d9a0ac7aae31130aa9cc5d53d9446e.png'),
(11, 'teste daniel alterado', 7, '', 'Outros', 4, '2018-12-02', '5d1699dbf2ec138444cc2852938c6f11.png'),
(12, 'Primeiro exame do Daniel Scheeren 2 - alterado data', 8, '', 'Outros', 4, '0000-00-00', '6470887849c3df45096728487d5ad929.png'),
(14, 'Exame 2', 7, '', 'Radiologia', 4, '2018-12-04', '91a6f6a9fb24f5260a0c0bd3480977b5.png'),
(15, 'Exame 1', 10, '', 'Radiologia', 4, '2018-12-03', '63b8d762c247310ec3b828cb756f8379.png');

-- --------------------------------------------------------

--
-- Estrutura da tabela `pessoa`
--

CREATE TABLE `pessoa` (
  `id` int(11) NOT NULL,
  `nome` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `cpf` varchar(14) COLLATE utf8_unicode_ci NOT NULL,
  `plano_saude` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ind_paciente` tinyint(1) NOT NULL,
  `id_usuario_criacao` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Extraindo dados da tabela `pessoa`
--

INSERT INTO `pessoa` (`id`, `nome`, `cpf`, `plano_saude`, `ind_paciente`, `id_usuario_criacao`) VALUES
(7, 'Daniel Scheeren', '11111111111', 'Unimed', 1, 4),
(8, 'Daniel Scheeren 2', '91919191919', 'Circulo', 1, 4),
(9, 'Daniel Scheeren', '123.123.123-14', 'Unimed', 1, 4),
(10, 'DS SD DS', '111.111.111-11', 'jiadsoiudsajoiads', 1, 4);

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuario`
--

CREATE TABLE `usuario` (
  `id` int(11) NOT NULL,
  `nome` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `senha` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Extraindo dados da tabela `usuario`
--

INSERT INTO `usuario` (`id`, `nome`, `senha`) VALUES
(1, 'admin', 'e10adc3949ba59abbe56e057f20f883e'),
(2, 'Jairo', 'e10adc3949ba59abbe56e057f20f883e'),
(4, 'daniel', '827ccb0eea8a706c4c34a16891f84e7b');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `exame`
--
ALTER TABLE `exame`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pessoa`
--
ALTER TABLE `pessoa`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `exame`
--
ALTER TABLE `exame`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT for table `pessoa`
--
ALTER TABLE `pessoa`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
