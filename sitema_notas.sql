-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 30-10-2018 a las 21:54:57
-- Versión del servidor: 5.7.14
-- Versión de PHP: 5.6.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `sitema_notas`
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
  `final_normal` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `consulta` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `alumnos`
--

CREATE TABLE `alumnos` (
  `id_alumno` int(50) NOT NULL,
  `nombres` varchar(50) DEFAULT NULL,
  `apellidos` varchar(50) DEFAULT NULL,
  `direccion` varchar(100) DEFAULT NULL,
  `telefono` varchar(50) DEFAULT NULL,
  `celular` int(11) DEFAULT NULL,
  `nombrepadre` varchar(100) DEFAULT NULL,
  `nombremadre` varchar(100) DEFAULT NULL,
  `fechanacimiento` date DEFAULT NULL,
  `matricula` varchar(50) DEFAULT NULL,
  `sexo` varchar(20) DEFAULT NULL,
  `correo` varchar(100) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `anio_ciclo_escolar`
--

CREATE TABLE `anio_ciclo_escolar` (
  `id_anio_ciclo_escolar` int(11) NOT NULL,
  `anio_ciclo_escolar` year(4) NOT NULL,
  `estado_ciclo_escolar` varchar(10) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `asignacion_alumno`
--

CREATE TABLE `asignacion_alumno` (
  `id_asignacion_alumno` int(11) NOT NULL,
  `id_alumno` varchar(50) NOT NULL,
  `id_ciclo_escolar` int(11) NOT NULL,
  `fecha_inscripcion` datetime NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `asignacion_grado_seccion`
--

CREATE TABLE `asignacion_grado_seccion` (
  `id_asignacion_grado_seccion` int(11) NOT NULL,
  `id_anio_ciclo_escolar` int(11) NOT NULL,
  `seccion` varchar(10) NOT NULL,
  `id_profesores` int(11) DEFAULT NULL,
  `id_grado` int(11) NOT NULL,
  `jornada` varchar(15) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `asignacion_maestro_seccion`
--

CREATE TABLE `asignacion_maestro_seccion` (
  `id_asignacion_maestro_seccion` int(11) NOT NULL,
  `id_profesor` int(11) NOT NULL,
  `id_pensum` int(11) NOT NULL,
  `id_asignacion_grado_seccion` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `grado`
--

CREATE TABLE `grado` (
  `id_grado` int(11) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `categoria` varchar(25) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `horario`
--

CREATE TABLE `horario` (
  `id_horario` int(11) NOT NULL,
  `id_grado` int(11) NOT NULL,
  `id_asignacion_grado_seccion` int(11) NOT NULL,
  `hora_inicio` time NOT NULL,
  `hora_fin` time NOT NULL,
  `dia` varchar(20) NOT NULL,
  `numero_dia` int(11) NOT NULL,
  `id_pensum` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `mensuallidades`
--

CREATE TABLE `mensuallidades` (
  `id_mensualidades` int(11) NOT NULL,
  `id_alumno` int(11) NOT NULL,
  `id_asignacion_grado_seccion` int(11) NOT NULL,
  `enero` varchar(15) DEFAULT NULL,
  `febrero` varchar(15) DEFAULT NULL,
  `marzo` varchar(15) DEFAULT NULL,
  `abril` varchar(15) DEFAULT NULL,
  `mayo` varchar(15) DEFAULT NULL,
  `junio` varchar(15) DEFAULT NULL,
  `julio` varchar(15) DEFAULT NULL,
  `agosto` varchar(15) DEFAULT NULL,
  `septiembre` varchar(15) DEFAULT NULL,
  `octubre` varchar(15) DEFAULT NULL,
  `noviembre` varchar(15) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `modulos`
--

CREATE TABLE `modulos` (
  `id_modulos` int(11) NOT NULL,
  `nombre_modulo` varchar(100) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `notas_alumno`
--

CREATE TABLE `notas_alumno` (
  `id_notas_alumno` int(11) NOT NULL,
  `unidad1` int(11) DEFAULT NULL,
  `unidad2` int(11) DEFAULT NULL,
  `unidad3` int(11) DEFAULT NULL,
  `unidad4` int(11) DEFAULT NULL,
  `unidad5` int(11) DEFAULT NULL,
  `promedio` float DEFAULT NULL,
  `id_alumno` int(11) DEFAULT NULL,
  `id_pensum` int(11) DEFAULT NULL,
  `id_asignacion_grado_seccion` int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pase`
--

CREATE TABLE `pase` (
  `id_passe` int(11) NOT NULL,
  `nombre_pase` varchar(50) NOT NULL,
  `pase_encr` varchar(150) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `tipo_usuario` varchar(50) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pensum`
--

CREATE TABLE `pensum` (
  `id_pensum` int(11) NOT NULL,
  `nombre_materia` varchar(100) NOT NULL,
  `estado` varchar(10) NOT NULL,
  `id_grado` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `profesores`
--

CREATE TABLE `profesores` (
  `dpi_profesor` int(11) NOT NULL,
  `nombres` varchar(50) DEFAULT NULL,
  `apellidos` varchar(50) DEFAULT NULL,
  `telefono` varchar(50) DEFAULT NULL,
  `celular` int(11) DEFAULT NULL,
  `correo` varchar(50) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `recibo`
--

CREATE TABLE `recibo` (
  `id_recibo` int(11) NOT NULL,
  `fecha_hora_pago` datetime NOT NULL,
  `tipo_pago` varchar(50) NOT NULL,
  `id_alumno` int(11) NOT NULL,
  `id_asignacion_grado_seccion` int(11) NOT NULL,
  `nombre_persona_q_paga` varchar(100) NOT NULL,
  `codigo_recibo` varchar(50) NOT NULL,
  `total` float NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `roles`
--

CREATE TABLE `roles` (
  `id_roles` int(11) NOT NULL,
  `nombre` varchar(50) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_pago`
--

CREATE TABLE `tipo_pago` (
  `id_tipo_pago` int(11) NOT NULL,
  `nombre_pago` varchar(50) NOT NULL,
  `estado` varchar(15) NOT NULL,
  `pago` float NOT NULL,
  `anio` year(4) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `nombres` varchar(100) NOT NULL,
  `usuario` varchar(75) NOT NULL,
  `password` varchar(100) NOT NULL,
  `tipo` varchar(25) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `nombres`, `usuario`, `password`, `tipo`) VALUES
(1, 'Angel Alberto', 'Root', '0cc175b9c0f1b6a831c399e269772661', 'Root'),
(2, 'Michelle Estefania\r\n', 'Catedratico', '0cc175b9c0f1b6a831c399e269772661', 'Catedratico'),
(3, 'Jorge Remache', 'Administrador', '0cc175b9c0f1b6a831c399e269772661', 'Admin');

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
-- Indices de la tabla `alumnos`
--
ALTER TABLE `alumnos`
  ADD PRIMARY KEY (`id_alumno`);

--
-- Indices de la tabla `anio_ciclo_escolar`
--
ALTER TABLE `anio_ciclo_escolar`
  ADD PRIMARY KEY (`id_anio_ciclo_escolar`);

--
-- Indices de la tabla `asignacion_alumno`
--
ALTER TABLE `asignacion_alumno`
  ADD PRIMARY KEY (`id_asignacion_alumno`),
  ADD KEY `Refalumnos7` (`id_alumno`),
  ADD KEY `Refciclo_escolar11` (`id_ciclo_escolar`);

--
-- Indices de la tabla `asignacion_grado_seccion`
--
ALTER TABLE `asignacion_grado_seccion`
  ADD PRIMARY KEY (`id_asignacion_grado_seccion`);

--
-- Indices de la tabla `asignacion_maestro_seccion`
--
ALTER TABLE `asignacion_maestro_seccion`
  ADD PRIMARY KEY (`id_asignacion_maestro_seccion`);

--
-- Indices de la tabla `grado`
--
ALTER TABLE `grado`
  ADD PRIMARY KEY (`id_grado`);

--
-- Indices de la tabla `horario`
--
ALTER TABLE `horario`
  ADD PRIMARY KEY (`id_horario`);

--
-- Indices de la tabla `mensuallidades`
--
ALTER TABLE `mensuallidades`
  ADD PRIMARY KEY (`id_mensualidades`);

--
-- Indices de la tabla `modulos`
--
ALTER TABLE `modulos`
  ADD PRIMARY KEY (`id_modulos`);

--
-- Indices de la tabla `notas_alumno`
--
ALTER TABLE `notas_alumno`
  ADD PRIMARY KEY (`id_notas_alumno`);

--
-- Indices de la tabla `pase`
--
ALTER TABLE `pase`
  ADD PRIMARY KEY (`id_passe`);

--
-- Indices de la tabla `pensum`
--
ALTER TABLE `pensum`
  ADD PRIMARY KEY (`id_pensum`);

--
-- Indices de la tabla `profesores`
--
ALTER TABLE `profesores`
  ADD PRIMARY KEY (`dpi_profesor`);

--
-- Indices de la tabla `recibo`
--
ALTER TABLE `recibo`
  ADD PRIMARY KEY (`id_recibo`);

--
-- Indices de la tabla `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id_roles`);

--
-- Indices de la tabla `tipo_pago`
--
ALTER TABLE `tipo_pago`
  ADD PRIMARY KEY (`id_tipo_pago`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `agenda`
--
ALTER TABLE `agenda`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `alumnos`
--
ALTER TABLE `alumnos`
  MODIFY `id_alumno` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT de la tabla `anio_ciclo_escolar`
--
ALTER TABLE `anio_ciclo_escolar`
  MODIFY `id_anio_ciclo_escolar` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `asignacion_alumno`
--
ALTER TABLE `asignacion_alumno`
  MODIFY `id_asignacion_alumno` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `asignacion_grado_seccion`
--
ALTER TABLE `asignacion_grado_seccion`
  MODIFY `id_asignacion_grado_seccion` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `asignacion_maestro_seccion`
--
ALTER TABLE `asignacion_maestro_seccion`
  MODIFY `id_asignacion_maestro_seccion` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT de la tabla `grado`
--
ALTER TABLE `grado`
  MODIFY `id_grado` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT de la tabla `horario`
--
ALTER TABLE `horario`
  MODIFY `id_horario` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `mensuallidades`
--
ALTER TABLE `mensuallidades`
  MODIFY `id_mensualidades` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `modulos`
--
ALTER TABLE `modulos`
  MODIFY `id_modulos` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `notas_alumno`
--
ALTER TABLE `notas_alumno`
  MODIFY `id_notas_alumno` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT de la tabla `pase`
--
ALTER TABLE `pase`
  MODIFY `id_passe` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `pensum`
--
ALTER TABLE `pensum`
  MODIFY `id_pensum` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT de la tabla `recibo`
--
ALTER TABLE `recibo`
  MODIFY `id_recibo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT de la tabla `roles`
--
ALTER TABLE `roles`
  MODIFY `id_roles` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `tipo_pago`
--
ALTER TABLE `tipo_pago`
  MODIFY `id_tipo_pago` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
