-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 26-Jun-2019 às 22:52
-- Versão do servidor: 10.3.15-MariaDB
-- versão do PHP: 7.1.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `forum`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `mensagem`
--

CREATE TABLE `mensagem` (
  `idMensagem` int(6) NOT NULL,
  `idTopico` int(6) NOT NULL,
  `idUsuario` int(6) NOT NULL,
  `mensagem` text NOT NULL,
  `dataEnvio` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `mensagem`
--

INSERT INTO `mensagem` (`idMensagem`, `idTopico`, `idUsuario`, `mensagem`, `dataEnvio`) VALUES
(1, 20, 14, 'afsdfsdfsdf', '2019-06-23 00:00:00'),
(2, 21, 14, 'asdasdasdasd', '2019-06-24 00:00:00'),
(3, 21, 14, 'teste', '2019-06-24 00:00:00'),
(4, 22, 14, 'oiiii', '2019-06-24 00:00:00'),
(5, 22, 14, 'ghghjgh', '2019-06-24 00:00:00'),
(6, 23, 14, 'Vou adicionar uma resposta para este tÃ³pico.', '2019-06-24 00:00:00'),
(7, 24, 14, 'Eu adicionei uma mensagem no tÃ³pico', '2019-06-24 00:00:00'),
(8, 25, 14, 'respondido', '2019-06-24 00:00:00'),
(9, 26, 14, 'asdasdasdasdasdasdasdasdasdasd', '2019-06-24 00:00:00'),
(10, 26, 14, 'sdfsdfsdf', '2019-06-24 00:00:00'),
(11, 27, 14, 'Adicionando uma nova resposta', '2019-06-24 02:14:24'),
(12, 27, 14, 'Outra resposta adicionada.', '2019-06-24 02:14:37'),
(13, 27, 14, 'Okay, jÃ¡ sei como responde, e agora?', '2019-06-24 02:14:51'),
(14, 29, 14, 'oiiii', '2019-06-24 02:52:02'),
(15, 29, 14, 'olaaaa', '2019-06-24 02:52:07'),
(16, 32, 14, 'oiiiii', '2019-06-24 16:43:16'),
(17, 32, 14, 'Outra resposta aqui.\r\nQuebra de linha.', '2019-06-24 16:53:27'),
(18, 33, 14, 'Esta Ã© umaasdasdasdasd', '2019-06-25 02:31:05'),
(19, 33, 14, 'aisofuaoifuaoisudas', '2019-06-25 02:31:46'),
(20, 34, 14, 'dfgdfgdfgdfg', '2019-06-25 02:45:10'),
(21, 34, 14, 'sdfsdfsdfsdfsdf', '2019-06-25 02:47:52'),
(22, 35, 14, 'rtrtyrtyrtyrtyrty', '2019-06-25 03:19:37'),
(23, 36, 14, 'asdasdasdasd', '2019-06-25 03:21:52'),
(24, 38, 14, 'ASDASDASDASD', '2019-06-25 03:26:56'),
(25, 38, 14, 'ASDADASDASD', '2019-06-25 03:27:02'),
(26, 38, 14, 'ASDASDASDASD', '2019-06-25 03:27:14'),
(27, 39, 14, 'sdasdasd', '2019-06-25 04:15:28'),
(28, 39, 14, 'asdasdasdasdasd', '2019-06-25 04:26:39'),
(29, 40, 14, 'oIIIIIIIIIASDASdasdasd', '2019-06-25 22:48:41'),
(30, 43, 14, 'oiiiii', '2019-06-26 00:17:27'),
(31, 43, 14, 'asdasdasdasd', '2019-06-26 00:19:22'),
(32, 43, 14, 'asdasdasdasd', '2019-06-26 00:19:24'),
(33, 43, 14, 'Teste 25-06-2019 as 19:19', '2019-06-26 00:19:54'),
(34, 44, 14, 'sdfsdfsdfsdf', '2019-06-26 00:22:42'),
(35, 44, 14, 'sdfsdfsdfsdf', '2019-06-26 00:25:50'),
(36, 44, 14, 'sdfsdfsdfsdffghfghfg', '2019-06-26 00:26:45'),
(37, 47, 14, 'sdfsdfsdfs', '2019-06-26 00:29:31'),
(38, 47, 14, 'sdfsdfsdfsdf', '2019-06-26 00:29:38'),
(39, 47, 14, 'sdfsdfsdfsd', '2019-06-26 00:34:09'),
(40, 47, 14, 'asdasdasdasdasdasd', '2019-06-26 00:34:36'),
(41, 47, 14, 'sdfsdfsdf', '2019-06-26 00:47:07'),
(42, 47, 14, 'sdasdasdasdasd', '2019-06-26 00:47:20'),
(43, 47, 14, 'sdasdasdasdasd', '2019-06-26 03:59:09'),
(44, 47, 14, 'sdasdasdasdasd', '2019-06-26 04:01:05');

-- --------------------------------------------------------

--
-- Estrutura da tabela `topico`
--

CREATE TABLE `topico` (
  `idTopico` int(6) NOT NULL,
  `idUsuario` int(6) NOT NULL,
  `assunto` varchar(100) NOT NULL,
  `descricao` text NOT NULL,
  `dataCriacao` datetime NOT NULL,
  `dataUltimaAtualizacao` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `topico`
--

INSERT INTO `topico` (`idTopico`, `idUsuario`, `assunto`, `descricao`, `dataCriacao`, `dataUltimaAtualizacao`) VALUES
(2, 15, 'Teste', 'asdasdasdasd', '1970-01-01 00:00:00', '1970-01-01 00:00:00'),
(3, 15, 'Teste', 'asdasdasdasd', '1970-01-01 00:00:00', '1970-01-01 00:00:00'),
(4, 14, 'Teste', 'asdasdasd', '1970-01-01 00:00:00', '1970-01-01 00:00:00'),
(5, 14, 'Teste', 'asdasdasdasdasd', '1970-01-01 00:00:00', '1970-01-01 00:00:00'),
(6, 14, 'Teste', 'asdasdasdasdasd', '1970-01-01 00:00:00', '1970-01-01 00:00:00'),
(7, 14, 'Teste', 'asdasdasdasdasdsdasd', '1970-01-01 00:00:00', '1970-01-01 00:00:00'),
(8, 14, 'dasdasd', 'asdasdasdasdasd', '1970-01-01 00:00:00', '1970-01-01 00:00:00'),
(9, 14, 'dasdasd', 'asdasdasdasdasddasdasd', '1970-01-01 00:00:00', '1970-01-01 00:00:00'),
(10, 14, 'dasdasd', 'asdasdasdasdasddasdaasdasdasdasdas123123sd', '1970-01-01 00:00:00', '1970-01-01 00:00:00'),
(11, 14, 'dasdasdasdasda', 'asdasdasdasdasddasdaasdasdasdasdas123123sd', '1970-01-01 00:00:00', '1970-01-01 00:00:00'),
(12, 14, 'Biscoito ou Bolacha? HEHE', 'Testando o campo de texto.\r\nasdasdiuo;a\r\n...', '2019-06-23 00:00:00', '2019-06-23 00:00:00'),
(13, 14, 'Biscoito ou Bolacha? HEHE', 'Testando o campo de texto.\r\nasdasdiuo;a\r\n...', '2019-06-23 00:00:00', '2019-06-23 00:00:00'),
(14, 14, 'Assunto novo', 'Testenaod\r\n\r\ntexto no assunto novo.\r\n\r\nasdasd123.\r\n.\r\n.', '2019-06-23 00:00:00', '2019-06-23 00:00:00'),
(15, 14, 'Teste', 'asdasdasdasd', '2019-06-23 00:00:00', '2019-06-23 00:00:00'),
(16, 14, 'asdasdasda', 'asdasdasdasd', '2019-06-23 00:00:00', '2019-06-23 00:00:00'),
(17, 14, 'asdasdasda', 'sadasdasdasd', '2019-06-23 00:00:00', '2019-06-23 00:00:00'),
(18, 14, 'asdasdasda', 'sadasdasdasd', '2019-06-23 00:00:00', '2019-06-23 00:00:00'),
(19, 14, 'teste', 'teste', '2019-06-23 00:00:00', '2019-06-23 00:00:00'),
(20, 14, 'Teste', 'asdasdasdasdas', '2019-06-23 00:00:00', '2019-06-23 00:00:00'),
(21, 14, 'Teste', 'yhjghjghjghj', '2019-06-24 00:00:00', '2019-06-24 00:00:00'),
(22, 14, 'Teste', 'sdfgsdfgdfgdfg', '2019-06-24 00:00:00', '2019-06-24 00:00:00'),
(23, 14, 'TÃ­tulo do tÃ³pico', 'Aqui tem uma descriÃ§Ã£o do tÃ³pico.\r\n\r\nTambÃ©m posso dar quebra de linha.', '2019-06-24 00:00:00', '2019-06-24 00:00:00'),
(24, 14, 'Este Ã© o tÃ­tulo do TÃ³pico', 'Aqui tem uma mensagem', '2019-06-24 00:00:00', '2019-06-24 00:00:00'),
(25, 14, 'Teste', 'asdasdasd', '2019-06-24 00:00:00', '2019-06-24 00:00:00'),
(26, 14, 'Teste', 'asdasdasdas', '2019-06-24 00:00:00', '2019-06-24 00:00:00'),
(27, 14, 'Testando novamente o tÃ³pico', 'Vamos testar as mensagens', '2019-06-24 02:13:03', '2019-06-24 02:13:03'),
(28, 14, 'sdfsdf', 'sdfsdfsdf', '2019-06-24 02:51:36', '2019-06-24 02:51:36'),
(29, 14, 'sdfsdf', 'sdfsdfsdf', '2019-06-24 02:51:57', '2019-06-24 02:51:57'),
(30, 14, 'Teste', 'sdasdasdasdasd', '2019-06-24 04:58:56', '2019-06-24 04:58:56'),
(31, 14, 'Teste', 'asdasd', '2019-06-24 16:42:51', '2019-06-24 16:42:51'),
(32, 14, 'Teste', 'asdasd', '2019-06-24 16:43:11', '2019-06-24 16:43:11'),
(33, 14, 'Este Ã© um tÃ³pico novo!', 'Estou com uma dÃºvida!\r\n\r\nPosso dar quebra de linha a vontade!\r\nokay:', '2019-06-25 02:25:09', '2019-06-25 02:25:09'),
(34, 14, 'Teste', 'dfdfgdfgdfg', '2019-06-25 02:45:04', '2019-06-25 02:45:04'),
(35, 14, 'ertedrter', 'tertertert', '2019-06-25 03:19:19', '2019-06-25 03:19:19'),
(36, 14, 'asdasdas', 'asdasdasd', '2019-06-25 03:21:45', '2019-06-25 03:21:45'),
(37, 14, 'dfsfsdf', 'sdfsdfsdf', '2019-06-25 03:22:53', '2019-06-25 03:22:53'),
(38, 14, 'QSasdA', 'SDASDASDASD', '2019-06-25 03:26:49', '2019-06-25 03:26:49'),
(39, 14, 'dfsdfsd', 'sdfsdfsfsdf', '2019-06-25 03:35:05', '2019-06-25 03:35:05'),
(40, 14, 'Testeasd', 'asdasdasdasd', '2019-06-25 22:48:17', '2019-06-25 22:48:17'),
(41, 14, 'hfghdfghfghfg', 'fghfghfghfg', '2019-06-26 00:07:30', '2019-06-26 00:07:30'),
(42, 14, 'rfgdfgdf', 'dfgdfgdfg', '2019-06-26 00:08:12', '2019-06-26 00:08:12'),
(43, 14, 'asdasdasdasd', 'asdasdasdasdasdasdasd', '2019-06-26 00:17:23', '2019-06-26 00:17:23'),
(44, 14, 'sdfsdfsdf', 'sdfsdfsdfsdfsdfsdf', '2019-06-26 00:22:40', '2019-06-26 00:22:40'),
(45, 14, 'asdasdasdasd', 'asdasdasdasdasdasd', '2019-06-26 00:27:02', '2019-06-26 00:27:02'),
(46, 14, 'asdasdasdasd', 'asdasdasdasdasdasd', '2019-06-26 00:27:15', '2019-06-26 00:27:15'),
(47, 14, 'asdasdasdasd', 'asdasdasdasdasdasd', '2019-06-26 00:29:29', '2019-06-26 00:29:29');

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuario`
--

CREATE TABLE `usuario` (
  `idUsuario` int(6) NOT NULL,
  `nome` varchar(50) NOT NULL,
  `email` varchar(30) NOT NULL,
  `login` varchar(16) NOT NULL,
  `senha` varchar(16) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `usuario`
--

INSERT INTO `usuario` (`idUsuario`, `nome`, `email`, `login`, `senha`) VALUES
(2, 'Kevin Costa Inacio', 'kevincostainacio@hotmail.com', 'spetox', '4564123789'),
(3, 'asdasdas', 'asdasdas@asdasd', 'asdasd', 'asdasdasd'),
(14, 'Sara', 'sara@email.com', 'sara', '123'),
(15, 'Harrison', 'harrison@gmail.com', 'harrison', '123'),
(16, 'Joao Rebeldites', 'joaosilva@hotmail.com', 'rebeldites', '123');

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `mensagem`
--
ALTER TABLE `mensagem`
  ADD PRIMARY KEY (`idMensagem`),
  ADD KEY `fkMensagemTopico` (`idTopico`),
  ADD KEY `fkMensagemUsuario` (`idUsuario`);

--
-- Índices para tabela `topico`
--
ALTER TABLE `topico`
  ADD PRIMARY KEY (`idTopico`),
  ADD KEY `fkTopicoUsuario` (`idUsuario`);

--
-- Índices para tabela `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`idUsuario`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `mensagem`
--
ALTER TABLE `mensagem`
  MODIFY `idMensagem` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT de tabela `topico`
--
ALTER TABLE `topico`
  MODIFY `idTopico` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- AUTO_INCREMENT de tabela `usuario`
--
ALTER TABLE `usuario`
  MODIFY `idUsuario` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `mensagem`
--
ALTER TABLE `mensagem`
  ADD CONSTRAINT `fkMensagemTopico` FOREIGN KEY (`idTopico`) REFERENCES `topico` (`idTopico`),
  ADD CONSTRAINT `fkMensagemUsuario` FOREIGN KEY (`idUsuario`) REFERENCES `usuario` (`idUsuario`);

--
-- Limitadores para a tabela `topico`
--
ALTER TABLE `topico`
  ADD CONSTRAINT `fkTopicoUsuario` FOREIGN KEY (`idUsuario`) REFERENCES `usuario` (`idUsuario`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
