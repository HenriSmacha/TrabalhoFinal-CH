-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 18-Out-2018 às 23:07
-- Versão do servidor: 10.1.36-MariaDB
-- versão do PHP: 7.2.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `fazenda`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `proprietario`
--

CREATE TABLE `proprietario` (
  `idProprietario` bigint(20) NOT NULL,
  `nome` varchar(100) NOT NULL,
  `propriedade` varchar(100) NOT NULL,
  `localizacao` varchar(150) NOT NULL,
  `municipio` varchar(100) NOT NULL,
  `nContato` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `proprietario`
--

INSERT INTO `proprietario` (`idProprietario`, `nome`, `propriedade`, `localizacao`, `municipio`, `nContato`) VALUES
(1, 'a a', 'a', 'a', 'a', 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `user`
--

CREATE TABLE `user` (
  `idUsuario` bigint(20) NOT NULL,
  `login` varchar(100) NOT NULL,
  `senha` varchar(100) NOT NULL,
  `tipo` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `user`
--

INSERT INTO `user` (`idUsuario`, `login`, `senha`, `tipo`) VALUES
(1, 'mimozinha', '996d836b15da4dd9f945a802a77de03c', 'adm');

-- --------------------------------------------------------

--
-- Estrutura da tabela `vaca`
--

CREATE TABLE `vaca` (
  `idVaca` int(11) NOT NULL,
  `nAnimal` varchar(100) NOT NULL,
  `nDeFerro` int(11) NOT NULL,
  `raca` varchar(100) NOT NULL,
  `pelagem` varchar(100) NOT NULL,
  `idade` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `vaca`
--

INSERT INTO `vaca` (`idVaca`, `nAnimal`, `nDeFerro`, `raca`, `pelagem`, `idade`) VALUES
(1, 'a', 1, 'a', 'a', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `proprietario`
--
ALTER TABLE `proprietario`
  ADD PRIMARY KEY (`idProprietario`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`idUsuario`);

--
-- Indexes for table `vaca`
--
ALTER TABLE `vaca`
  ADD PRIMARY KEY (`idVaca`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `proprietario`
--
ALTER TABLE `proprietario`
  MODIFY `idProprietario` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `idUsuario` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `vaca`
--
ALTER TABLE `vaca`
  MODIFY `idVaca` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
