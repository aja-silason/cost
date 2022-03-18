-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 25-Fev-2022 às 22:02
-- Versão do servidor: 10.4.11-MariaDB
-- versão do PHP: 7.4.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `quemvoceprocurabd`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `comentario`
--

CREATE TABLE `comentario` (
  `idcoment` int(11) NOT NULL,
  `comentario` varchar(60) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estrutura da tabela `comentariopost`
--

CREATE TABLE `comentariopost` (
  `idcomentpost` int(11) NOT NULL,
  `comentpost` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `comentariopost`
--

INSERT INTO `comentariopost` (`idcomentpost`, `comentpost`) VALUES
(1, 'Onde foi a ultima vez que o viste???'),
(2, 'Sinto muito!😥😩');

-- --------------------------------------------------------

--
-- Estrutura da tabela `mensagem`
--

CREATE TABLE `mensagem` (
  `idms` int(11) NOT NULL,
  `sms` varchar(255) DEFAULT NULL,
  `datasms` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `mensagem`
--

INSERT INTO `mensagem` (`idms`, `sms`, `datasms`) VALUES
(76, 'Testando o chat da comunidade!👌🏾🖖🏾✈💪🏾👫🏾👭🏾👬🏾', '2022-02-08 23:00:00'),
(98, 'Testando novamente a comunidade!', '2022-02-08 23:00:00'),
(99, 'Testando o chat da comunidade!👌🏾🖖🏾✈💪🏾👫🏾👭🏾👬🏾', '2022-02-08 23:00:00'),
(100, 'Teste 3✈', '2022-02-09 18:26:18'),
(101, 'Teste 4!...', '2022-02-09 18:33:19'),
(102, 'Bom dia a todos que se encontram na comunidade...Espero que todos que estão a ler essa mensagem fiquem felizes com o meu comentário.\r\n\r\nOnde é que o cassule foi visto pela última vez?', '2022-02-13 20:12:58'),
(103, 'Anda atoa 😂😅😅', '2022-02-13 20:15:28'),
(104, 'Boa tarde!', '2022-02-14 12:57:07'),
(105, 'BOA TARDE', '2022-02-15 13:05:27'),
(106, 'Testando o Yelp....', '2022-02-21 15:32:01'),
(107, 'Bom dia ...', '2022-02-24 10:25:02'),
(108, 'Boa tarde, sou novo na comunidade...', '2022-02-24 15:22:33'),
(109, 'jbjgdjcaej', '2022-02-25 14:41:35');

-- --------------------------------------------------------

--
-- Estrutura da tabela `postagem`
--

CREATE TABLE `postagem` (
  `idposts` int(11) NOT NULL,
  `imagempost` mediumblob NOT NULL,
  `nomepost` varchar(50) NOT NULL,
  `idadepost` varchar(20) NOT NULL,
  `localizacao` varchar(50) NOT NULL,
  `contatopost` int(15) NOT NULL,
  `descricaopost` varchar(500) NOT NULL,
  `data` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `user` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `postagem`
--

INSERT INTO `postagem` (`idposts`, `imagempost`, `nomepost`, `idadepost`, `localizacao`, `contatopost`, `descricaopost`, `data`, `user`) VALUES
(10, '', 'Ageu Lumengo', '19', 'Por tráz do Amor e Paz, Casa 9', 915520792, 'Rapaz gago....', '2022-02-23 23:00:00', ''),
(11, '', 'Ageu Lumengo', '19', 'Por tráz do Amor e Paz, Casa 9', 915520792, 'Rapaz gago...', '2022-02-23 23:00:00', ''),
(12, '', 'Matias Damásio', '48', 'Belo Horizonte, rua Amílcar Cabral', 958747474, 'É o mesmo Matias, sim, o cantor.\r\nQuem o vir o favor de ligar no número acima.\r\nObrigado.', '2022-02-23 23:00:00', ''),
(13, '', 'Super Homem', '35', 'Metrópolis', 958747474, 'Apertem bem o Batman, ele sabe... o indivíduo bateu o coitado do Super Homem até chamar pela mamãe.', '2022-02-24 10:42:34', ''),
(14, '', 'Mancebo Cadiabo Martins', '24', 'Bairro Jacinto Tchipa, Rua 14, Sector F.', 958585858, 'É o Zé Cadiábo...', '2022-02-24 15:17:30', ''),
(16, '', 'Elisa André', '21', 'Bairro Jacinto Tchipa, Rua 14, Sector F.', 944996909, 'Anta atoa...🚶🏾😩😅🐜', '2022-02-25 10:40:06', '');

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `nome` varchar(30) NOT NULL,
  `telefone` varchar(30) NOT NULL,
  `pais` varchar(20) NOT NULL,
  `pass` varchar(20) NOT NULL,
  `email` varchar(255) NOT NULL,
  `descricao` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `usuarios`
--

INSERT INTO `usuarios` (`id`, `nome`, `telefone`, `pais`, `pass`, `email`, `descricao`) VALUES
(1, 'admin', '900000000', 'Angola', 'adm122ad', 'admin@qvp.com', ''),
(2, 'Ananias Augusto', '944996909', 'Angola', '944996909', 'ananiasjaimeaugusto@gmail.com', ''),
(3, 'Kidima David', '928523015', 'Angola', 'guy', 'guydavid@qvc.com', ''),
(4, 'Murgel Diogo Quianda', '929588811', 'Angola', 'gword', 'mdword@qvc.com', ''),
(5, 'Diamantino Baia', '932110933', 'Angola', 'dbaia', 'baia@qvc.com', ''),
(6, '', '', '', '', '', ''),
(8, '', '', '', '', '', ''),
(9, '', '', '', '', 'murgeldiogo53@gmail.', ''),
(10, 'Margarida Bartolomeu', '947775324', 'Huíla', 'mgb', 'mgb@gmail.com', ''),
(11, 'Cleonice Samukumbi', '922462983', 'Moxico', 'cln', 'cleonice.samukumbi2@gmail.com', ''),
(12, 'Silas Augusto', '932811722', 'Moxico', 'silas', 'silasaugusto@gmail.com', ''),
(13, 'Leandro Tomás', '926468757', 'Luanda', 'leandro', 'leandro@hotmail.com', ''),
(14, 'adilson figueira', '92777777', 'Cuanza Sul', 'murgel', 'humberto@hotmail.com', ''),
(16, 'Silas Jaime Augusto', '923563611', 'Luanda', 'silasjaime', 'silasjaime@gmail.com', ''),
(17, 'Zé Gato', '950456584', 'Cuanza Sul', 'zegato', 'ze@hotmail.com', ''),
(18, 'NELSON MUZANGUISSA', '914580858', 'Moxico', 'ANNGOLA2222', 'nelsonmuza@gmail.com', ''),
(19, '944996909', '0000000', 'A tua província', '0', '1141001@gmail.com', ''),
(20, 'ss', '55', 'A tua província', 'ss', 's@gmail.com', ''),
(21, 'Alice Augusto', '915520792', 'Luanda', 'augusto', 'aliceaugusto@gmail.com', ''),
(22, 'Dilson Tigrão', '929961220', 'Luanda', 'dilson', 'dilson@gmail.com', ''),
(23, '0', '00', 'A tua província', '0', '0@gmail.com', ''),
(24, 'Divaldo Maneul', '949549658', 'Luanda', 'mistersubera', 'mistersuberano10@gmail.com', '');

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `comentario`
--
ALTER TABLE `comentario`
  ADD PRIMARY KEY (`idcoment`);

--
-- Índices para tabela `comentariopost`
--
ALTER TABLE `comentariopost`
  ADD PRIMARY KEY (`idcomentpost`);

--
-- Índices para tabela `mensagem`
--
ALTER TABLE `mensagem`
  ADD PRIMARY KEY (`idms`);

--
-- Índices para tabela `postagem`
--
ALTER TABLE `postagem`
  ADD PRIMARY KEY (`idposts`);

--
-- Índices para tabela `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `comentario`
--
ALTER TABLE `comentario`
  MODIFY `idcoment` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `comentariopost`
--
ALTER TABLE `comentariopost`
  MODIFY `idcomentpost` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de tabela `mensagem`
--
ALTER TABLE `mensagem`
  MODIFY `idms` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=110;

--
-- AUTO_INCREMENT de tabela `postagem`
--
ALTER TABLE `postagem`
  MODIFY `idposts` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT de tabela `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `postagem`
--
ALTER TABLE `postagem`
  ADD CONSTRAINT `postagem_ibfk_1` FOREIGN KEY (`idposts`) REFERENCES `usuarios` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
