-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 29-03-2025 a las 20:51:31
-- Versión del servidor: 10.4.32-MariaDB
-- Versión de PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `gabrica`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `inscripciones`
--

CREATE TABLE `inscripciones` (
  `id` int(11) NOT NULL,
  `nombre_cliente` varchar(100) NOT NULL,
  `nit` varchar(50) NOT NULL,
  `nombre_punto` varchar(100) NOT NULL,
  `nombre_equipo` varchar(100) NOT NULL,
  `ciudad` varchar(100) NOT NULL,
  `promotor` varchar(100) NOT NULL,
  `rtc` varchar(20) NOT NULL,
  `capitan_usuario` varchar(100) NOT NULL,
  `acepta_datos` tinyint(1) NOT NULL,
  `ip` varchar(50) NOT NULL,
  `fecha` date NOT NULL,
  `hora` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `inscripciones`
--

INSERT INTO `inscripciones` (`id`, `nombre_cliente`, `nit`, `nombre_punto`, `nombre_equipo`, `ciudad`, `promotor`, `rtc`, `capitan_usuario`, `acepta_datos`, `ip`, `fecha`, `hora`) VALUES
(1, 'Eida Castillo', '11111111', 'prueba punto', 'prueba equipo', 'Bogota', 'prueba promotor', '2222222', 'prueba capitan usuario ', 1, '198.169.12.12', '2025-03-27', '17:57:41'),
(2, '', '', '', '', '', '', '', '', 0, '', '0000-00-00', '00:00:00'),
(3, '', '', '', '', '', '', '', '', 0, '', '0000-00-00', '00:00:00'),
(4, '', '', '', '', '', '', '', '', 0, '', '0000-00-00', '00:00:00'),
(5, '', '1233507360', '', '', 'Medellín', 'prueba promotor dos', '1111111', '', 0, '::1', '2025-03-28', '02:19:27'),
(6, '', '1233507360', '', '', 'Cali', 'prueba promotor dos', '1111111', '', 0, '::1', '2025-03-28', '02:29:57'),
(7, '', '1233507360', '', '', 'Cali', 'prueba promotor dos', '1111111', '', 0, '::1', '2025-03-28', '02:31:31'),
(8, '', '22222222', '', '', 'Bogotá', 'prueba promotor dos', '1111111', '', 0, '::1', '2025-03-28', '02:31:54'),
(9, '', '901026168', '', '', 'Medellín', 'prueba promotor dos', '1111111', '', 0, '::1', '2025-03-28', '02:33:18'),
(10, '', '901026168', '', '', 'Medellín', 'prueba promotor dos', '1111111', '', 0, '::1', '2025-03-28', '02:39:19'),
(11, '', '901026168', '', '', 'Bogotá', 'prueba promotor dos', '1111111', '', 0, '::1', '2025-03-28', '02:41:57'),
(12, '', '901026168', '', '', 'Bogotá', 'prueba promotor dos', '1111111', '', 0, '::1', '2025-03-28', '02:42:08'),
(13, '', '901026168', '', '', 'Bogotá', 'prueba promotor dos', '1111111', '', 0, '::1', '2025-03-28', '02:42:09'),
(14, '', '901026168', '', '', 'Bogotá', 'prueba promotor dos', '1111111', '', 0, '::1', '2025-03-28', '02:42:12'),
(15, '', '901026168', '', '', 'Bogotá', 'prueba promotor dos', '1111111', '', 0, '::1', '2025-03-28', '02:42:23'),
(16, '', '901026168', '', '', 'Bogotá', 'prueba promotor dos', '1111111', '', 0, '::1', '2025-03-28', '02:42:37'),
(17, '', '901026168', '', '', 'Bogotá', 'prueba promotor dos', '1111111', '', 0, '::1', '2025-03-28', '02:42:48'),
(18, '', '901026168', '', '', 'Bogotá', 'prueba promotor dos', '1111111', '', 0, '::1', '2025-03-28', '02:43:15'),
(19, 'GABYHUER', '901026168', '', '', 'Medellín', 'prueba promotor dos', '1111111', '', 0, '::1', '2025-03-28', '02:43:58'),
(20, 'GABYHUERbb', '1233507360', 'GERGEGE', 'GEGEGEG', 'Bogotá', 'prueba promotor dos', '1111111', 'GABYHUEER', 0, '::1', '2025-03-28', '02:45:53'),
(21, 'GABYHUERttt', '1128426714', 'GERGEGE', 'GEGEGEG', 'Medellín', 'prueba promotor dos', '1111111', 'GABYHUEER', 0, '::1', '2025-03-28', '02:46:44'),
(22, 'GABYHUERttt', '1128426714', 'GERGEGE', 'GEGEGEG', 'Medellín', 'prueba promotor dos', '1111111', 'GABYHUEER', 0, '::1', '2025-03-27', '20:49:30'),
(23, 'GABYHUER', '1233507360', 'GERGEGE', 'GEGEGEG', 'Cali', 'prueba promotor dos', '1111111', 'GABYHUEER', 1, '::1', '2025-03-27', '20:52:30'),
(24, 'GABYHUER', '1024544807', 'GERGEGE', 'GEGEGEG', 'Cali', 'prueba promotor dos', '1111111', 'GABYHUEER', 1, '<?php echo $ip; ?>', '2025-03-27', '20:58:43'),
(25, 'GABYHUER', '1024544807', 'GERGEGE', 'GEGEGEG', 'Cali', 'prueba promotor dos', '1111111', 'GABYHUEER', 1, '<?php echo $ip; ?>', '2025-03-27', '21:01:00'),
(26, 'GABYHUER', '1024544807', 'GERGEGE', 'GEGEGEG', 'Cali', 'prueba promotor dos', '1111111', 'GABYHUEER', 1, '<?php echo $ip; ?>', '2025-03-27', '21:05:04'),
(27, 'GABYHUER', '1024544807', 'GERGEGE', 'GEGEGEG', 'Cali', 'prueba promotor dos', '1111111', 'GABYHUEER', 1, '<?php echo $ip; ?>', '2025-03-27', '21:05:06'),
(28, 'GABYHUERttt', '1233507360', 'GERGEGE', 'GEGEGEG', 'Cali', 'prueba promotor dos', '1111111', 'GABYHUEER', 1, '<?php echo htmlspecialchars($ip, ENT_QUOTES, \'UTF-', '2025-03-27', '21:05:34'),
(29, 'GABYHUERttt', '1233507360', 'GERGEGE', 'GEGEGEG', 'Cali', 'prueba promotor dos', '1111111', 'GABYHUEER', 1, '<?php echo htmlspecialchars($ip, ENT_QUOTES, \'UTF-', '2025-03-27', '21:06:25'),
(30, 'GABYHUERttt', '1233507360', 'GERGEGE', 'GEGEGEG', 'Cali', 'prueba promotor dos', '1111111', 'GABYHUEER', 1, '$ip', '2025-03-27', '21:06:28'),
(31, 'GABYHUERttt', '1233507360', 'GERGEGE', 'GEGEGEG', 'Cali', 'prueba promotor dos', '1111111', 'GABYHUEER', 1, '$ip', '2025-03-27', '21:06:58'),
(32, 'GABYHUERttt', '1233507360', 'GERGEGE', 'GEGEGEG', 'Cali', 'prueba promotor dos', '1111111', 'GABYHUEER', 1, '', '2025-03-27', '21:07:01'),
(33, 'GABYHUERttt', '1233507360', 'GERGEGE', 'GEGEGEG', 'Cali', 'prueba promotor dos', '1111111', 'GABYHUEER', 1, '::1', '2025-03-27', '21:12:55'),
(34, 'GABYHUERttt', '1233507360', 'GERGEGE', 'GEGEGEG', 'Cali', 'prueba promotor dos', '1111111', 'GABYHUEER', 1, '::1', '2025-03-27', '21:14:08'),
(35, 'GABYHUERttt', '1233507360', 'GERGEGE', 'GEGEGEG', 'Cali', 'prueba promotor dos', '1111111', 'GABYHUEER', 1, '::1', '2025-03-27', '21:14:11'),
(36, 'GABYHUERttt', '1233507360', 'GERGEGE', 'GEGEGEG', 'Cali', 'prueba promotor dos', '1111111', 'GABYHUEER', 1, '::1', '2025-03-27', '21:23:28'),
(37, 'GABYHUERttt', '1233507360', 'GERGEGE', 'GEGEGEG', 'Cali', 'prueba promotor dos', '1111111', 'GABYHUEER', 1, '::1', '2025-03-27', '21:23:30'),
(38, 'GABYHUERttt', '1233507360', 'GERGEGE', 'GEGEGEG', 'Cali', 'prueba promotor dos', '1111111', 'GABYHUEER', 1, '::1', '2025-03-27', '21:23:44'),
(39, 'GABYHUER', '1233507360', 'GERGEGE', 'GEGEGEG', 'Bogotá', 'prueba promotor dos', '1111111', 'GABYHUEER', 1, '::1', '2025-03-27', '21:23:59'),
(42, 'GABYHUER', '1233507360', 'GERGEGE', 'GEGEGEG', 'Medellín', 'prueba promotor dos', '1111111', 'GABYHUEER', 1, '::1', '2025-03-27', '22:02:47'),
(43, 'GABYHUER', '1233507360', 'GERGEGE', 'GEGEGEG', 'Medellín', 'prueba promotor dos', '1111111', 'GABYHUEER', 1, '::1', '2025-03-27', '22:05:15'),
(44, '', '', '', '', '', '', '', '', 0, '::1', '2025-03-28', '00:08:26'),
(45, '', '', '', '', '', '', '', '', 0, '::1', '2025-03-28', '00:11:48'),
(46, '', '', '', '', '', '', '', '', 0, '::1', '2025-03-28', '00:15:29'),
(47, '', '', '', '', '', '', '', '', 0, '::1', '2025-03-28', '00:15:33'),
(48, '', '', '', '', '', '', '', '', 0, '::1', '2025-03-28', '00:22:54'),
(49, '', '', '', '', '', '', '', '', 0, '::1', '2025-03-28', '00:22:58'),
(50, 'LEONARDO TOVAR', '1233507360', 'GERGEGE', 'PRUEBASS', 'Medellín', 'prueba promotor dos', '111111154555', 'GABYHUEER', 0, '', '0000-00-00', '00:00:00'),
(51, 'LEONARDO TOVAR', '1233507360', 'GERGEGE', 'PRUEBASS', 'Medellín', 'prueba promotor dos', '111111154555', 'GABYHUEER', 0, '', '0000-00-00', '00:00:00'),
(52, 'LEONARDO TOVAR', '1233507360', 'GERGEGE', 'PRUEBASS', 'Bogotá', 'prueba promotor dos', '111111154555', 'ususususus', 1, '', '2025-03-28', '15:29:47'),
(53, 'LEONARDO TOVAR2', '1233507360', 'GERGEGE', 'PRUEBASS', 'Medellín', 'prueba promotor dos', '111111154555', 'GABYHUEER', 1, '', '2025-03-29', '09:06:17'),
(54, 'LEONARDO TOVAR', '1024544807', 'GERGEGE', 'PRUEBASS', 'Cali', 'prueba promotor dos', '1111111', 'GABYHUEER', 1, '179.32.18.158', '2025-03-29', '09:25:05'),
(55, 'JOSE QUINTERO', '1233507360', 'PRUEBASS', 'PRUEBASS', 'Bogotá', 'JJJJJJJJ', '555555555555', 'JOSEQUIN', 1, '179.32.18.158', '2025-03-29', '09:32:17'),
(56, 'LEONARDO TOVAR', '46548642', 'PRUEBASS', 'PRUEBASS', 'Medellín', 'JIUOHUIJN', '111111154555', 'ususususus', 1, '179.32.18.158', '2025-03-29', '09:40:59'),
(57, 'GABYHUERbb', '4684897415', 'PRUEBASS', 'GEGEGEG', 'Medellín', 'JJJJJJJJ', '555555555555', 'GABYHUEER', 1, '179.32.18.158', '2025-03-29', '09:53:48'),
(58, '', '', '', '', '', '', '', '', 0, '', '2025-03-29', '09:55:44'),
(59, '', '', '', '', '', '', '', '', 0, '', '2025-03-29', '09:57:46'),
(60, '', '', '', '', '', '', '', '', 0, '', '2025-03-29', '09:58:28'),
(61, '', '', '', '', '', '', '', '', 0, '', '2025-03-29', '09:59:23'),
(62, '', '', '', '', '', '', '', '', 0, '', '2025-03-29', '10:00:02'),
(63, '', '', '', '', '', '', '', '', 0, '', '2025-03-29', '10:09:01'),
(64, '', '', '', '', '', '', '', '', 0, '', '2025-03-29', '10:09:06'),
(65, '', '', '', '', '', '', '', '', 0, '', '2025-03-29', '10:09:57'),
(66, '', '', '', '', '', '', '', '', 0, '', '2025-03-29', '10:10:39'),
(67, '', '', '', '', '', '', '', '', 0, '', '2025-03-29', '10:11:03'),
(68, '', '', '', '', '', '', '', '', 0, '', '2025-03-29', '10:11:27'),
(69, '', '', '', '', '', '', '', '', 0, '', '2025-03-29', '10:31:43'),
(70, '', '', '', '', '', '', '', '', 0, '', '2025-03-29', '10:31:57'),
(71, '', '', '', '', '', '', '', '', 0, '', '2025-03-29', '10:32:09'),
(72, '', '', '', '', '', '', '', '', 0, '', '2025-03-29', '10:33:04'),
(73, '', '', '', '', '', '', '', '', 0, '', '2025-03-29', '10:46:27'),
(74, '', '', '', '', '', '', '', '', 0, '', '2025-03-29', '10:51:21'),
(75, '', '', '', '', '', '', '', '', 0, '', '2025-03-29', '10:53:28'),
(76, '', '', '', '', '', '', '', '', 0, '', '2025-03-29', '10:59:06'),
(77, '', '', '', '', '', '', '', '', 0, '', '2025-03-29', '11:06:01'),
(78, '', '', '', '', '', '', '', '', 0, '', '2025-03-29', '11:11:32');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `usuario` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `usuario`, `password`) VALUES
(1, 'gabyhuer', '123456789'),
(3, 'admin', '$2y$10$jz9nhknwXxlfABYxmEQobOySFPdVL4IGsNWzmwXi2YqlU7Fgf29Mq');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `inscripciones`
--
ALTER TABLE `inscripciones`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `usuario` (`usuario`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `inscripciones`
--
ALTER TABLE `inscripciones`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=79;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
