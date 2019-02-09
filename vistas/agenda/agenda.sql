-- phpMyAdmin SQL Dump
-- version 4.6.6
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost
-- Tiempo de generación: 06-11-2017 a las 19:48:21
-- Versión del servidor: 5.7.17-log
-- Versión de PHP: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `control_stock`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `agenda`
--

CREATE TABLE `agenda` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(150) COLLATE utf8_spanish_ci DEFAULT NULL,
  `body` text COLLATE utf8_spanish_ci NOT NULL,
  `url` varchar(150) COLLATE utf8_spanish_ci NOT NULL,
  `class` varchar(45) COLLATE utf8_spanish_ci NOT NULL DEFAULT 'event-important',
  `start` varchar(15) COLLATE utf8_spanish_ci NOT NULL,
  `end` varchar(15) COLLATE utf8_spanish_ci NOT NULL,
  `inicio_normal` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `final_normal` varchar(50) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `agenda`
--

INSERT INTO `agenda` (`id`, `title`, `body`, `url`, `class`, `start`, `end`, `inicio_normal`, `final_normal`) VALUES
(15, 'lknlkn', 'nlkn', 'http://localhost/SistemasWebs/control_stock/agenda/descripcion_evento.php?id=15', 'event-info', '1509986760000', '1509986760000', '06/11/2017 13:46:00', '06/11/2017 13:46:00'),
(17, 'klnl', 'nlk', 'http://localhost/SistemasWebs/control_stock/agenda/descripcion_evento.php?id=17', 'event-important', '1509986880000', '1509986880000', '06/11/2017 13:48:00', '06/11/2017 13:48:00'),
(20, 'lknlk', 'nlknlkn', 'http://localhost/SistemasWebs/control_stock/agenda/descripcion_evento.php?id=20', 'event-warning', '1509987180000', '1509987180000', '06/11/2017 13:53:00', '06/11/2017 13:53:00'),
(23, 'kjbkj', 'bkjbkjb', 'http://localhost/SistemasWebs/control_stock/agenda/descripcion_evento.php?id=23', 'event-important', '1509987360000', '1509987360000', '06/11/2017 13:56:00', '06/11/2017 13:56:00'),
(31, 'fd', 'fttg', 'http://localhost/SistemasWebs/control_stock/agenda/descripcion_evento.php?id=31', 'event-info', '1509987780000', '1509987780000', '06/11/2017 14:03:00', '06/11/2017 14:03:00'),
(33, 'ln', 'lknlkn', 'http://localhost/SistemasWebs/control_stock/agenda/descripcion_evento.php?id=33', 'event-info', '1509987840000', '1509987840000', '06/11/2017 14:04:00', '06/11/2017 14:04:00'),
(38, 'KNKLN', 'LKNLKN', 'http://localhost/SistemasWebs/control_stock/agenda/descripcion_evento.php?id=38', 'event-info', '1509988080000', '1509988080000', '06/11/2017 14:08:00', '06/11/2017 14:08:00'),
(40, 'kln', 'lknlkn', 'http://localhost/SistemasWebs/control_stock/agenda/descripcion_evento.php?id=40', 'event-info', '1509988200000', '1509988200000', '06/11/2017 14:10:00', '06/11/2017 14:10:00'),
(48, 'gf', 'drd', 'http://localhost/SistemasWebs/control_stock/agenda/descripcion_evento.php?id=48', 'event-info', '1510161480000', '1509988740000', '08/11/2017 14:18:00', '06/11/2017 14:19:00'),
(53, 'lknl', 'nlkn', 'http://localhost/SistemasWebs/control_stock/agenda/descripcion_evento.php?id=53', 'event-info', '1509989100000', '1509989100000', '06/11/2017 14:25:00', '06/11/2017 14:25:00'),
(54, 'lknlk', 'nlkn', 'http://localhost/SistemasWebs/control_stock/agenda/descripcion_evento.php?id=54', 'event-info', '1509989160000', '1509989160000', '06/11/2017 14:26:00', '06/11/2017 14:26:00'),
(55, 'jbklb', 'lklkn', 'http://localhost/SistemasWebs/control_stock/agenda/descripcion_evento.php?id=55', 'event-info', '1510075620000', '1510075620000', '07/11/2017 14:27:00', '07/11/2017 14:27:00'),
(57, 'k', 'klnkl', 'http://localhost/SistemasWebs/control_stock/agenda/descripcion_evento.php?id=57', 'event-info', '1510075680000', '1510075740000', '07/11/2017 14:28:00', '07/11/2017 14:29:00'),
(72, 'lkn', 'lknk', 'http://localhost/SistemasWebs/control_stock/agenda/descripcion_evento.php?id=72', 'event-info', '1510163160000', '1510163160000', '08/11/2017 14:46:00', '08/11/2017 14:46:00'),
(73, 'ñmñl', 'mñlmñ', 'http://localhost/SistemasWebs/control_stock/agenda/descripcion_evento.php?id=73', 'event-info', '1510163220000', '1510163220000', '08/11/2017 14:47:00', '08/11/2017 14:47:00'),
(75, 'lñmmñ', 'ml', 'http://localhost/SistemasWebs/control_stock/agenda/descripcion_evento.php?id=75', 'event-info', '1510163280000', '1510163280000', '08/11/2017 14:48:00', '08/11/2017 14:48:00'),
(77, 'lmñ', 'lmñl', 'http://localhost/SistemasWebs/control_stock/agenda/descripcion_evento.php?id=77', 'event-info', '1509990540000', '1509990540000', '06/11/2017 14:49:00', '06/11/2017 14:49:00'),
(78, 'ln', 'lnlk', 'http://localhost/SistemasWebs/control_stock/agenda/descripcion_evento.php?id=78', 'event-info', '1509990600000', '1509990600000', '06/11/2017 14:50:00', '06/11/2017 14:50:00'),
(80, 'kl', 'nlkn', 'http://localhost/SistemasWebs/control_stock/agenda/descripcion_evento.php?id=80', 'event-info', '1509990720000', '1509990720000', '06/11/2017 14:52:00', '06/11/2017 14:52:00'),
(87, 'LKB', 'KJBKJB', 'http://localhost/SistemasWebs/control_stock/agenda/descripcion_evento.php?id=87', 'event-info', '1510250280000', '1510250280000', '09/11/2017 14:58:00', '09/11/2017 14:58:00');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `agenda`
--
ALTER TABLE `agenda`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `inicio_normal` (`inicio_normal`),
  ADD UNIQUE KEY `final_normal` (`final_normal`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `agenda`
--
ALTER TABLE `agenda`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=89;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
