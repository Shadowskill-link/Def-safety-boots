-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 06-Jan-2023 às 23:51
-- Versão do servidor: 10.4.21-MariaDB
-- versão do PHP: 7.3.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `def_safety`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `cart`
--

CREATE TABLE `cart` (
  `id_cart` int(11) NOT NULL,
  `type` varchar(111) NOT NULL,
  `nome_produto` varchar(111) NOT NULL,
  `code_produto` varchar(111) NOT NULL,
  `descricao_produto` varchar(111) NOT NULL,
  `quantity` int(11) NOT NULL,
  `imagem_produto` varchar(111) NOT NULL,
  `imagem_baixo_produto` varchar(111) NOT NULL,
  `detalhes_produto` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estrutura da tabela `categoria`
--

CREATE TABLE `categoria` (
  `categoria_id` int(11) NOT NULL,
  `nome` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `categoria`
--

INSERT INTO `categoria` (`categoria_id`, `nome`) VALUES
(1, 'boots'),
(2, 'earmuffs'),
(3, 'reflective vests'),
(4, 'gloves'),
(5, 'eyewear'),
(6, 'otherppi');

-- --------------------------------------------------------

--
-- Estrutura da tabela `distributor`
--

CREATE TABLE `distributor` (
  `id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `adress` varchar(255) NOT NULL,
  `adress2` varchar(255) NOT NULL,
  `city` varchar(255) NOT NULL,
  `state` varchar(255) NOT NULL,
  `zip` varchar(255) NOT NULL,
  `country` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `distributor`
--

INSERT INTO `distributor` (`id`, `email`, `password`, `adress`, `adress2`, `city`, `state`, `zip`, `country`) VALUES
(2, 'samsonmassiga@gmail.com', 'Shadownet22', 'Urbanizacao', 'Q:40 casa 25 R/C', 'Maputo', 'Maputo', '1214', 'MZ'),
(3, 'laercioaristides@gmail.com', 'Maunde013', 'Mahotas', 'Q:19 casa 56 R/C', 'CIdade Maputo', 'Maputo', '1106', 'MZ');

-- --------------------------------------------------------

--
-- Estrutura da tabela `emails`
--

CREATE TABLE `emails` (
  `id` int(11) NOT NULL,
  `email` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estrutura da tabela `orders`
--

CREATE TABLE `orders` (
  `orders_id` int(111) NOT NULL,
  `fullname` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `company` varchar(255) NOT NULL,
  `address1` varchar(255) NOT NULL,
  `address2` varchar(255) NOT NULL,
  `city` varchar(255) NOT NULL,
  `provincia` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `orders`
--

INSERT INTO `orders` (`orders_id`, `fullname`, `email`, `company`, `address1`, `address2`, `city`, `provincia`) VALUES
(610, 'Samson Massinga', 'samsonmassinga@gmail.com', 'SAMoz', 'Av. Angola', 'casa.23', 'Maputo', 'Maputo Province'),
(611, 'Laércio Aristide', 'laercioaristides13@gmail.com', 'NextOne', 'AV.angola', 'DEF', 'Maputo', 'Maputo Province');

-- --------------------------------------------------------

--
-- Estrutura da tabela `order_produto`
--

CREATE TABLE `order_produto` (
  `id` int(11) NOT NULL,
  `id_orders` int(11) NOT NULL,
  `nome_produto` varchar(255) NOT NULL,
  `descricao_produto` varchar(255) NOT NULL,
  `quantity` int(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `order_produto`
--

INSERT INTO `order_produto` (`id`, `id_orders`, `nome_produto`, `descricao_produto`, `quantity`) VALUES
(85, 610, 'DEF CHELSEA', 'DE-7500 ', 1),
(86, 610, 'DEF:G-10GRIP', 'Latex Grip rough palm FLEX and GRIP', 1),
(87, 611, 'DEF BASIX', 'B700160', 1),
(88, 611, 'DEF EURO CLEAR', 'CODE:DEF 200c', 1),
(89, 611, 'DEF:G-10XTRA', 'Polytril Grip rough palm GRIP', 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `produtos`
--

CREATE TABLE `produtos` (
  `id` int(11) NOT NULL,
  `categoria_id` int(11) NOT NULL,
  `categoria` varchar(255) NOT NULL,
  `Type` varchar(255) NOT NULL,
  `nome_produto` varchar(255) NOT NULL,
  `code_produto` varchar(25) NOT NULL,
  `descricao_produto` varchar(255) NOT NULL,
  `quantity` int(25) NOT NULL,
  `imagem_produto` varchar(255) NOT NULL,
  `imagem_produto_baixo` varchar(255) NOT NULL,
  `detalhes_produto` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `produtos`
--

INSERT INTO `produtos` (`id`, `categoria_id`, `categoria`, `Type`, `nome_produto`, `code_produto`, `descricao_produto`, `quantity`, `imagem_produto`, `imagem_produto_baixo`, `detalhes_produto`) VALUES
(1, 1, 'Boots/Botas', '', 'DEF BASIX', '', 'B700160', 0, 'boot-1.jpg\n', 'boot-1-baixo.jpg', '- Chrome Barton print water resistant\nleather upper;\n- 200 Joule Steel toe cap;\n- Anti-static properties;\n- Anti-penetration midsole;\n- Dual density PU outer sole;\n- Padded collar and Padded tongue;\n- Reective strip on back of boot;\n- SRC slip resistance rated;\n- Use waxy polish to feed the leather and\nadd to the lifespan of the boot.\nSizes: 3 - 13'),
(2, 1, 'Boots/Botas', '', 'DEF FORTE', '', 'DE-6550 ', 0, 'boot-2.jpg', 'boot-2-baixo.jpg', 'Full grain Barton print water resistant upper;\r\n- 200 Joule Steel toe cap;\r\n- Bumper on toe cap for added protection;\r\n- Anti-static properties;\r\n- Anti-penetration midsole;\r\n- Memory foam footbed for added comfort;\r\n- High quality Dual density polyurethane outer\r\nsole;\r\n- Reective stipe on back of boot;\r\n- Six eyelets that mold to the shape of your\r\nboot for added comfort;\r\n- Padded collar Padded tongue;\r\n- SRC slip resistance rated.\r\nSizes: 2 to 13'),
(3, 1, 'Boots/Botas', '', 'DEF CHELSEA', '', 'DE-7500 ', 0, 'boot-3.jpg', 'boot-3-baixo.jpg', '- Full grain Nubuck water resistant leather;\r\n- 200 Joule Steel toe cap;\r\n- Bumper on toe cap for added protection;\r\n- Anti-static properties;\r\n- Memory foam footbed for added comfort;\r\n- PU/RUBBER Outsole resisting heat up to\r\n300 degrees;\r\n- SRC slip resistance rated;\r\n- Use a Kiwi foam cleaner to feed the leather\r\nthis assists in maintaining the distressed\r\nlook and adds to the lifespan of the boot.\r\nSizes: 3 - 13'),
(4, 1, 'Boots/Botas', '', 'DEF TEC', '', 'DE-8500', 0, 'boot-5.jpg', 'boot-5-baixo.jpg', 'Full Grain New Waxy Leather Upper with\r\nwater resistant properties;\r\n- 200 Joule composite toe cap;\r\n- Bumper on toe cap added protection;\r\n- Anti-static properties;\r\n- Memory foam footbed with Gel heel for\r\nadded comfort;\r\n- Footbed also includes assistance in\r\nstabilizing the foot for all day wear;\r\n- PU/RUBBER Outsole resisting heat up to 300\r\ndegrees;\r\n- SRC slip resistance rated;\r\n- Padded collar and Padded tongue for added\r\ncomfort;\r\n- 3M Thinsulate material used inside boot\r\nwhich assists with water resistance,\r\nincreases moisture release and keeps the\r\nfeet cool on hot days.\r\nSizes: 3 - 1'),
(5, 1, 'Boots/Botas', '', 'DEF FORTE BROWN', '', 'B700160', 0, 'boot-4.jpg', 'boot-4-baixo.jpg', ''),
(6, 2, 'Reflective vests/reflectores', '', 'DEF-FOR REFLECTIVE VESTS', '', '2 Tone FORCE jacket', 0, 'def-for.png', '', ''),
(7, 2, 'Reflective vests/reflectores', '', 'DEFEXEC-Y/N REFLECTIVE VESTS', '', '2 Tone Multipocket vest', 0, 'defexec-yn.png', '', ''),
(8, 2, 'Reflective vests/reflectores', '', 'DEFEXEC-Y/G REFLECTIVE VESTS', '', '2 Tone Multipocket vest', 0, 'defexec-yg.png', '', ''),
(9, 2, 'Reflective vests/reflectores', '', 'DEFEXEC-R/B REFLECTIVE VESTS', '', '2 Tone Multipocket Vest', 0, 'defexec-rb.png', '', ''),
(10, 2, 'Reflective vests/reflectores', '', 'DEFZIPO REFLECTIVE VESTS', '', '120grm Vest with Zip', 0, 'defzipo.png', '', ''),
(11, 2, 'Reflective vests/reflectores', '', 'DEFEXEC-O/N REFLECTIVE VESTS', '', '2 Tone Multipocket Vest', 0, 'defexe-on.png', '', ''),
(12, 2, 'Reflective vests/reflectores', '', 'DEF HIVIZWCO', '', '5 Way Adjustable Vest', 0, 'defhivizwco.png', '', ''),
(13, 2, 'Reflective vests/reflectores', '', 'DEF HIVIZWCL', '', '5 Way Adjustable Vest', 0, 'defzhivizwcl.png', '', ''),
(14, 3, 'SAFETY EYEWEAR/ oculos', '', 'DEF CRUZ', '', 'CODE:DEF-1022', 0, 'cruz.png', '', ''),
(15, 3, 'SAFETY EYEWEAR/ oculos', '', 'DEF XCELZ', '', 'CODE:DEF-1027', 0, 'xcelz.png', '', ''),
(16, 3, 'SAFETY EYEWEAR/ oculos', '', 'DEF TWINZ', '', 'CODE:DEF-1026', 0, 'twinz.png', '', ''),
(17, 4, 'SAFETY EYEWEAR/ oculos', '', 'DEF SPORT CLEAR', '', 'CODE:DEF 100c', 0, 'def-sport-clear.png', '', ''),
(18, 4, 'SAFETY EYEWEAR/ oculos', '', 'DEF EURO CLEAR', '', 'CODE:DEF 200c', 0, 'def-euro-clear.png', '', ''),
(19, 4, 'SAFETY EYEWEAR/ oculos', '', 'DEF HAWK CLEAR', '', 'CODE:DEF 300C', 0, 'def-hawk-clear.png', '', ''),
(20, 4, 'SAFETY EYEWEAR/ oculos', '', 'DEF HAWK MIRROR', '', 'CODE:DEF 300 M', 0, 'def-hawk-mirror.png', '', ''),
(21, 4, 'SAFETY EYEWEAR/ oculos', '', 'DEF HAWK GRAY', '', 'CODE:DEF 300 G', 0, 'def-hawk-gray.png', '', ''),
(22, 5, 'Gloves / Luvas', 'DEF NITRILE SERIES', 'DEF:G-10FLEX', '', 'Nitrile Grip rough palm FLEX and GRIP', 0, 'glove-1.png', '', ''),
(23, 5, 'Gloves / Luvas', 'DEF NITRILE SERIES', 'DEF:G-POLY', '', 'Polytril Grip rough palm GRIP', 0, 'glove-2.png', '', ''),
(24, 5, 'Gloves / Luvas', 'DEF NITRILE SERIES', 'DEF:G-10XTRA', '', 'Polytril Grip rough palm GRIP', 0, 'glove-3.png', '', ''),
(25, 5, 'Gloves / Luvas', 'DEF NITRILE SERIES', 'DEF:G-CUTFL', '', 'Nitrile Grip rough palm CUT LEVEL 5 and GRIP', 0, 'glove-4.png', '', ''),
(26, 5, 'Gloves / Luvas', 'DEF PU SERIES', 'DEF:G-CUTP', '', 'PU Coated - Rough palm CUT LEVEL 5 and GRIP', 0, 'glove-5.png', '', ''),
(27, 5, 'Gloves / Luvas', 'DEF NITRILE SERIES', 'DEF:LA146G', '', 'Green Nitrile, flock lined 46cm', 0, 'glove-6.png', '', ''),
(28, 5, 'Gloves / Luvas', 'DEF NITRILE SERIES', 'DEF:LA142G', '', 'DEF:LA142G', 0, 'glove-7.png', '', ''),
(29, 5, '', 'DEF NITRILE SERIES', 'DEF:G-NITBL', '', 'Five (5) pack gloves', 0, 'glove-8.png', '', ''),
(30, 5, '', 'DEF LATEX SERIES', 'DEF:G-MGHI', '', 'Latex Grip rough palm FLEX and GRIP', 0, 'glove-9.png', '', ''),
(31, 5, '', 'DEF LATEX SERIES', 'DEF:G-10GRIP', '', 'Latex Grip rough palm FLEX and GRIP', 0, 'glove-10.png', '', ''),
(32, 5, '', 'DEF PVC SERIES', 'DEF:G-PVC-KW', '', 'PVC Glove - Knit wrist', 0, 'glove-11.png', '', ''),
(33, 5, '', 'DEF PVC SERIES', 'DEF:G-PVC-27', '', 'PVC Glove - open cuff 27cm', 0, 'glove-12.png', '', ''),
(34, 5, '', 'DEF PVC SERIES', 'DEF:G-PVC-35', '', 'PVC glove - open cuff 35cm', 0, 'glove-13.png', '', ''),
(35, 5, '', 'DEF PVC SERIES', 'DEF:G-PVC-60', '', 'PVC Glove with elasticated attachment - 60cm', 0, 'glove-14.png', '', ''),
(36, 6, '', '', 'DEFCAP-AZUL', '', 'EN8122012', 0, '11.png', '', '- The cap is designed to absorb impact energy by partial, not always\r\nvisible, destruction of its structure;\r\n- The cap which has been struck with significant force should be\r\nreplaced;\r\n- The cap should be protected from contact with solvents, acids and\r\nchemicals, open flame and hot metal splinters;\r\n- The usage period of the cap is 5 years starting from the date of\r\nproduction. After this period then cap should be physically destroyed;\r\n- The cap can be used at a temperature range of -10°C to +50°C.'),
(37, 6, '', '', 'DEF-COV', '', 'Type 5/6 Disposable\r\nCoverall', 0, '6.png', '7.png', '- Type 5 & 6 microporpous protective coverall with hood;\r\n- SMS polypropylene base material with microporous\r\nfilm coating 6 g/m2;\r\n- Elasticated wrist, Legs and Waist;\r\n- Single use garment.'),
(45, 7, 'caps/ chapeus', '', 'DEFCAP', 'EN8122012', 'DEFCAP-VER', 0, '45.png', '45.png', 'The industrial bump cap (baseball style bump cap) is intended\r\nto give protection to the wearer against the eects of striking\r\nthe head against hard, stationary objects.'),
(46, 7, 'CAPS /CHAPEUS', '', 'DEFCAP', 'EN8122012', 'DEFCAP-AZUL', 0, '42.png', '42.png', 'The industrial bump cap (baseball style bump cap) is intended\r\nto give protection to the wearer against the eects of striking\r\nthe head against hard, stationary objects.'),
(49, 7, 'CAPS/CHAPEUS', '', 'DEFCAP', 'EN8122012', 'DEFCAP-GRN', 0, '43.png', '43.png', 'The industrial bump cap (baseball style bump cap) is intended\r\nto give protection to the wearer against the eects of striking\r\nthe head against hard, stationary objects.'),
(50, 7, 'caps/ chapeus', '', 'DEFCAP', 'EN8122012', 'DEFCAP-PRE', 0, '44.png', '44.png', 'The industrial bump cap (baseball style bump cap) is intended\r\nto give protection to the wearer against the eects of striking\r\nthe head against hard, stationary objects.');

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `categoria`
--
ALTER TABLE `categoria`
  ADD PRIMARY KEY (`categoria_id`);

--
-- Índices para tabela `distributor`
--
ALTER TABLE `distributor`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `emails`
--
ALTER TABLE `emails`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`orders_id`);

--
-- Índices para tabela `order_produto`
--
ALTER TABLE `order_produto`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `produtos`
--
ALTER TABLE `produtos`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `categoria`
--
ALTER TABLE `categoria`
  MODIFY `categoria_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de tabela `distributor`
--
ALTER TABLE `distributor`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de tabela `orders`
--
ALTER TABLE `orders`
  MODIFY `orders_id` int(111) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=612;

--
-- AUTO_INCREMENT de tabela `order_produto`
--
ALTER TABLE `order_produto`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=90;

--
-- AUTO_INCREMENT de tabela `produtos`
--
ALTER TABLE `produtos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
