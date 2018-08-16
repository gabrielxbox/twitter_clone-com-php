-- phpMyAdmin SQL Dump
-- version 4.8.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 05-Ago-2018 às 21:18
-- Versão do servidor: 10.1.31-MariaDB
-- PHP Version: 7.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `clone`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `tweet`
--

CREATE TABLE `tweet` (
  `id_tweet` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `tweet` varchar(140) NOT NULL,
  `data_incrusao` datetime DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `tweet`
--

INSERT INTO `tweet` (`id_tweet`, `id_usuario`, `tweet`, `data_incrusao`) VALUES
(1, 0, 'gabi', '2018-07-31 14:24:40'),
(2, 4, 'teste de twitter', '2018-07-31 15:00:49'),
(3, 4, 'você é uma gatinha em', '2018-07-31 15:08:38'),
(4, 4, 'você é uma gatinha em', '2018-07-31 15:08:44'),
(5, 18, 'oi gatinha', '2018-07-31 15:12:45'),
(6, 18, 'tudo bem com vove', '2018-07-31 15:13:00'),
(7, 4, 'tudo legal no twitter', '2018-08-03 17:53:09'),
(8, 4, 'voce é uma gata', '2018-08-03 17:53:21'),
(9, 4, 'dfgsfshgkjklkçklçkllgjg', '2018-08-03 17:56:26'),
(10, 20, 'tudo legal no twitter', '2018-08-05 13:18:56'),
(11, 20, 'gato', '2018-08-05 13:19:32'),
(12, 20, 'voce é uma gata ', '2018-08-05 13:19:50'),
(13, 4, 'gato', '2018-08-05 14:43:55'),
(14, 20, 'tudo legal no twitter', '2018-08-05 15:22:33');

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `usuario` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `senha` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `usuarios`
--

INSERT INTO `usuarios` (`id`, `usuario`, `email`, `senha`) VALUES
(4, 'gabriel', 'gabriels_16@hotmail.com', '202cb962ac59075b964b07152d234b70'),
(5, 'maria', 'LAURENNORMAL@GMAIL.COM', '202cb962ac59075b964b07152d234b70'),
(6, 'mau', 'mau@hotmail.com', '202cb962ac59075b964b07152d234b70'),
(7, 'danilo', 'danilo_@hotmail.com', '202cb962ac59075b964b07152d234b70'),
(8, 'paulo', 'paulosergiosarmento@gmail.com', '3fc4210dfed00df8b11b9150e738550c'),
(9, 'paulo', 'gabriels_16@hotmail.com', 'e10adc3949ba59abbe56e057f20f883e'),
(10, 'tiago', 'tiago@hotmail.com', '25f9e794323b453885f5181f1b624d0b'),
(11, 'xbox', 'gabriels_16@hotmail.com', '202cb962ac59075b964b07152d234b70'),
(12, 'rafael', 'rafael@gmail.com', '202cb962ac59075b964b07152d234b70'),
(13, 'gabrielssd', 'gabriels_16@hotmail.com', '202cb962ac59075b964b07152d234b70'),
(14, 'gabrieledfgdhd', 'gabriels_16@hotmail.com', '9996535e07258a7bbfd8b132435c5962'),
(15, 'gafsdfsdbriel', 'gabriels_16@hotmail.com', '202cb962ac59075b964b07152d234b70'),
(16, 'pablo', 'pablo+kkk@hotmail.com', '202cb962ac59075b964b07152d234b70'),
(17, 'adasdasdas', 'dadasdada@fdd', '827ccb0eea8a706c4c34a16891f84e7b'),
(18, 'jose ', 'jose@hotmail.com', '202cb962ac59075b964b07152d234b70'),
(19, 'lula', 'bvbvb@hotmail.com', '202cb962ac59075b964b07152d234b70'),
(20, 'fabio', 'fabio_santos@hotmail.com', '202cb962ac59075b964b07152d234b70');

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuarios_seguidores`
--

CREATE TABLE `usuarios_seguidores` (
  `id_usuario_seguidor` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `seguindo_id_usuario` int(11) NOT NULL,
  `tata_registro` datetime DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `usuarios_seguidores`
--

INSERT INTO `usuarios_seguidores` (`id_usuario_seguidor`, `id_usuario`, `seguindo_id_usuario`, `tata_registro`) VALUES
(1, 20, 4, '2018-08-05 15:25:27'),
(2, 20, 13, '2018-08-05 15:25:29'),
(3, 20, 14, '2018-08-05 15:25:31');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tweet`
--
ALTER TABLE `tweet`
  ADD PRIMARY KEY (`id_tweet`);

--
-- Indexes for table `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `usuarios_seguidores`
--
ALTER TABLE `usuarios_seguidores`
  ADD PRIMARY KEY (`id_usuario_seguidor`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tweet`
--
ALTER TABLE `tweet`
  MODIFY `id_tweet` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `usuarios_seguidores`
--
ALTER TABLE `usuarios_seguidores`
  MODIFY `id_usuario_seguidor` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
