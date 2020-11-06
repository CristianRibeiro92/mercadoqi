-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 05-Nov-2020 às 13:26
-- Versão do servidor: 10.4.14-MariaDB
-- versão do PHP: 7.4.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `dbprodutos`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `produtos`
--

CREATE TABLE `produtos` (
  `codigo` int(11) NOT NULL,
  `item` varchar(100) COLLATE utf8mb4_general_nopad_ci NOT NULL,
  `tipo` varchar(100) COLLATE utf8mb4_general_nopad_ci NOT NULL,
  `marca` varchar(100) COLLATE utf8mb4_general_nopad_ci NOT NULL,
  `preco` float(10,2) NOT NULL,
  `vencimento` date NOT NULL,
  `peso` float(10,2) NOT NULL,
  `quantidade` int(6) NOT NULL,
  `departamento` varchar(100) COLLATE utf8mb4_general_nopad_ci NOT NULL,
  `pais` varchar(100) COLLATE utf8mb4_general_nopad_ci NOT NULL,
  `foto` varchar(256) COLLATE utf8mb4_general_nopad_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_nopad_ci;

--
-- Extraindo dados da tabela `produtos`
--

INSERT INTO `produtos` (`codigo`, `item`, `tipo`, `marca`, `preco`, `vencimento`, `peso`, `quantidade`, `departamento`, `pais`, `foto`) VALUES
(1, 'Arroz Branco', 'Longo-fino Tipo 1', 'Tio João', 28.00, '2020-11-28', 5.00, 1, 'Mercearia', 'Brasil', '6fb7666b5fa04e26f4a82a711106c721.jpg'),
(2, 'Vinho', 'Tinto Suave', 'Altue', 32.50, '0000-00-00', 0.75, 1, 'bebidas', 'chile', '804b385e9d6a73873de4888cd3eb5f2f.jpg'),
(3, 'Leite Condensado Moça Lata', 'Leite Condensado', 'Nestlé', 5.29, '0000-00-00', 0.40, 1, 'confeitaria', 'brasil', '6e098afe8ad014dd398d0f81f1ff9231.jpg'),
(4, 'Club Social Cebolinha', 'Biscoito Integral ', 'Club Social', 4.09, '0000-00-00', 0.14, 6, 'Biscoitos e Bolachas', 'brasil', '892944ea1c0ab6083e78690ea2a3ba97.jpg'),
(5, 'Bombom Lacta Variedades Caixa', 'Chocolates', 'Lacta', 9.40, '0000-00-00', 0.25, 1, 'Alimentos e Bebidas', 'brasil', 'd792377ee64ac898a06e94890fd0d37b.jpg');

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuarios`
--

CREATE TABLE `usuarios` (
  `codigo` int(11) NOT NULL,
  `usuario` varchar(200) COLLATE utf8mb4_general_nopad_ci NOT NULL,
  `senha` varchar(100) COLLATE utf8mb4_general_nopad_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_nopad_ci;

--
-- Extraindo dados da tabela `usuarios`
--

INSERT INTO `usuarios` (`codigo`, `usuario`, `senha`) VALUES
(1, 'cristian', '123456');

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `produtos`
--
ALTER TABLE `produtos`
  ADD PRIMARY KEY (`codigo`);

--
-- Índices para tabela `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`codigo`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `produtos`
--
ALTER TABLE `produtos`
  MODIFY `codigo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
