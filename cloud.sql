-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 25-11-2016 a las 15:53:38
-- Versión del servidor: 10.1.13-MariaDB
-- Versión de PHP: 5.5.35

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `cloud`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `administrador`
--

CREATE TABLE `administrador` (
  `ci_administrador` int(11) NOT NULL,
  `nombre` varchar(30) NOT NULL,
  `apellido` varchar(30) NOT NULL,
  `telefono` varchar(50) NOT NULL,
  `correo` varchar(50) NOT NULL,
  `ubicacion` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `administrador`
--

INSERT INTO `administrador` (`ci_administrador`, `nombre`, `apellido`, `telefono`, `correo`, `ubicacion`) VALUES
(123, 'administrador', 'admin', '0412358520', 'admin@administrador.com', '1'),
(987654, 'admins2', 'admin2', '91238123', 'NASD@AD.COM', 'adad');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `especialista`
--

CREATE TABLE `especialista` (
  `ci_especialista` int(15) NOT NULL,
  `nombre` varchar(30) NOT NULL,
  `apellido` varchar(30) NOT NULL,
  `telefono` varchar(15) DEFAULT NULL,
  `socio` char(1) NOT NULL,
  `especializacion` varchar(30) NOT NULL,
  `ubicacion` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `especialista`
--

INSERT INTO `especialista` (`ci_especialista`, `nombre`, `apellido`, `telefono`, `socio`, `especializacion`, `ubicacion`) VALUES
(1234, 'Mamamama', '0jkhkjhkj', '0', 'G', '0jghgjjh', 'c-1'),
(321123, 'adddd', 'dddddd', '123456', 'D', 'Medicina', 'x-q'),
(929292929, 'Hector', 'Martinez', '04123030250', 'B', 'centro', 'ubvi'),
(2147483647, 'adasdasd', 'adasad', 'adasd', 'a', 'Medicina', 'adsasd');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `informe`
--

CREATE TABLE `informe` (
  `id_informe` int(11) NOT NULL,
  `ci_paciente` int(11) NOT NULL,
  `ci_especialista` int(11) NOT NULL,
  `fecha_hora` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `detalle` varchar(200) DEFAULT NULL,
  `observacion` varchar(160) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `informe`
--

INSERT INTO `informe` (`id_informe`, `ci_paciente`, `ci_especialista`, `fecha_hora`, `detalle`, `observacion`) VALUES
(1, 111111, 222222, '2016-07-13 22:21:49', 'descarga/archivo1.txt', NULL),
(2, 987654321, 1234, '2016-09-09 01:21:00', NULL, NULL),
(3, 87654567, 1234, '2016-09-09 01:27:10', NULL, NULL),
(4, 87654567, 1234, '2016-09-09 01:28:44', NULL, NULL),
(5, 12345, 1111111, '2016-11-24 17:39:06', 'descarga/archivo1.txt', 'asdad');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `paciente`
--

CREATE TABLE `paciente` (
  `ci_paciente` int(20) NOT NULL,
  `nombre` varchar(30) NOT NULL,
  `apellido` varchar(30) NOT NULL,
  `telefono` varchar(15) DEFAULT NULL,
  `direccion` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `paciente`
--

INSERT INTO `paciente` (`ci_paciente`, `nombre`, `apellido`, `telefono`, `direccion`) VALUES
(12345, 'prueba', 'de nuevo', 'mamama', 'marinlq .asd, qwe '),
(123445, 'nanana', 'mamamama', 'mao013123', 'maria s211.0 '),
(1234323, 'Pedro01', 'MANA', '1234543', 'ASDDDD'),
(1234567, 'Pedro01', 'PESQA', '123456', 'ASDQ'),
(12312312, 'asdad', 'adasd', NULL, NULL),
(12321312, 'dsdasd', 'asdad', 'adads', 'asdasdasd'),
(12983812, 'laaassa', 'akasklas', 'sklaskldas', 'lkasklasklasd'),
(23001002, 'Mariana', 'Martinez Luna', '04123010872', 'barinitas, urb. el paraiso'),
(87654567, 'keke', 'kaka', NULL, NULL),
(123123123, 'asdasda', 'asdasd', 'asd', 'asdad'),
(987654321, 'nana', 'nanana', NULL, NULL),
(1111111111, 'prueba ', 'pruebanoesta', NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_documentos`
--

CREATE TABLE `tbl_documentos` (
  `id_documento` int(10) UNSIGNED NOT NULL,
  `titulo` varchar(150) DEFAULT NULL,
  `descripcion` mediumtext,
  `tamanio` int(10) UNSIGNED DEFAULT NULL,
  `tipo` varchar(150) DEFAULT NULL,
  `nombre_archivo` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tbl_documentos`
--

INSERT INTO `tbl_documentos` (`id_documento`, `titulo`, `descripcion`, `tamanio`, `tipo`, `nombre_archivo`) VALUES
(4, 'prueba', 'esta es una prueba', 171758, 'application/pdf', 'EJEMPLO.pdf'),
(5, 'ejemplo 2', 'segundo ejemplo', 100152, 'application/pdf', 'php.pdf');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `perfil` varchar(30) COLLATE utf8_spanish_ci NOT NULL,
  `username` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `password` varchar(100) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `perfil`, `username`, `password`) VALUES
(123, 'Administrador', 'admin', 'admin'),
(1234, 'Especialista', 'dajkasd', 'jkasjkas'),
(321123, 'Especialista', 'asdd', '12345'),
(987654, '0', 'admins2', 'admin2'),
(929292929, 'Especialista', 'nana', 'nanana'),
(2147483647, 'Especialista', 'mari', 'mari');

-- --------------------------------------------------------

--
-- Estructura para la vista `consulta_1`
--
DROP TABLE IF EXISTS `consulta_1`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `consulta_1`  AS  select `i`.`id_informe` AS `id`,`i`.`detalle` AS `detalle`,`i`.`fecha_hora` AS `fecha_hora`,`i`.`observacion` AS `obs`,`p`.`ci_paciente` AS `cedula_p`,`p`.`nombre` AS `nombre_p`,`p`.`apellido` AS `apellido_p`,`e`.`ci_especialista` AS `cedula_e`,`e`.`nombre` AS `nombre_e`,`e`.`apellido` AS `apellido_e` from ((`informe` `i` join `paciente` `p`) join `especialista` `e`) where ((`i`.`ci_especialista` = `e`.`ci_especialista`) and (`i`.`ci_paciente` = `p`.`ci_paciente`)) ;

-- --------------------------------------------------------

--
-- Estructura para la vista `consulta_23`
--
DROP TABLE IF EXISTS `consulta_23`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `consulta_23`  AS  select `i`.`id_informe` AS `id`,`i`.`detalle` AS `detalle`,`i`.`fecha_hora` AS `fecha_hora`,`i`.`observación` AS `obs`,`p`.`nombre` AS `nombre_p`,`p`.`apellido` AS `apellido_p`,`p`.`ci_paciente` AS `cedula_p`,`e`.`ci_especialista` AS `cedula_e`,`e`.`nombre` AS `nombre_e`,`e`.`apellido` AS `apellido_e` from ((`informe` `i` join `paciente` `p`) join `especialista` `e`) where ((`i`.`ci_especialista` = `e`.`ci_especialista`) and (`i`.`ci_paciente` = `p`.`ci_paciente`)) ;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `administrador`
--
ALTER TABLE `administrador`
  ADD PRIMARY KEY (`ci_administrador`);

--
-- Indices de la tabla `especialista`
--
ALTER TABLE `especialista`
  ADD PRIMARY KEY (`ci_especialista`);

--
-- Indices de la tabla `informe`
--
ALTER TABLE `informe`
  ADD PRIMARY KEY (`id_informe`);

--
-- Indices de la tabla `paciente`
--
ALTER TABLE `paciente`
  ADD PRIMARY KEY (`ci_paciente`);

--
-- Indices de la tabla `tbl_documentos`
--
ALTER TABLE `tbl_documentos`
  ADD PRIMARY KEY (`id_documento`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `informe`
--
ALTER TABLE `informe`
  MODIFY `id_informe` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT de la tabla `tbl_documentos`
--
ALTER TABLE `tbl_documentos`
  MODIFY `id_documento` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2147483647;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
