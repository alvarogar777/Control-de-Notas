

CREATE TABLE `agenda` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(150) COLLATE utf8_spanish_ci DEFAULT NULL,
  `body` text COLLATE utf8_spanish_ci NOT NULL,
  `url` varchar(150) COLLATE utf8_spanish_ci NOT NULL,
  `class` varchar(45) COLLATE utf8_spanish_ci NOT NULL DEFAULT 'event-important',
  `start` varchar(15) COLLATE utf8_spanish_ci NOT NULL,
  `end` varchar(15) COLLATE utf8_spanish_ci NOT NULL,
  `inicio_normal` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `final_normal` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `consulta` date NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `inicio_normal` (`inicio_normal`),
  UNIQUE KEY `final_normal` (`final_normal`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

INSERT INTO agenda VALUES("1","Dia de la revolucion ","Descanso","http://localhost/controlnotas/vistas/agenda/descripcion_evento.php?id=1","event-special","1540059900000","1540059660000","20/10/2018 15:25:00","20/10/2018 15:21:00","2018-10-20");
INSERT INTO agenda VALUES("2","a","s","http://localhost/controlnotas/vistas/agenda/descripcion_evento.php?id=2","event-info","1539658860000","1539658860000","16/10/2018 00:01:00","16/10/2018 00:01:00","2018-10-16");



CREATE TABLE `alumnos` (
  `id_alumno` int(50) NOT NULL AUTO_INCREMENT,
  `nombres` varchar(50) DEFAULT NULL,
  `apellidos` varchar(50) DEFAULT NULL,
  `direccion` varchar(100) DEFAULT NULL,
  `telefono` varchar(50) DEFAULT NULL,
  `nombrepadre` varchar(100) DEFAULT NULL,
  `nombremadre` varchar(100) DEFAULT NULL,
  `fechanacimiento` date DEFAULT NULL,
  `matricula` varchar(50) DEFAULT NULL,
  `sexo` varchar(20) DEFAULT NULL,
  `correo` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id_alumno`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

INSERT INTO alumnos VALUES("1","Roberto Jose","Fernandez Gonzalez","","","","","1996-10-02","01AB","masculino","");
INSERT INTO alumnos VALUES("2","Louis","Del Valle","","","","","1997-09-03","2","masculino","");
INSERT INTO alumnos VALUES("3","Katerin","García","","","","","2000-09-09","3","masculino","");
INSERT INTO alumnos VALUES("4","Manuel","Antonio","","","","","2018-11-01","4","masculino","");



CREATE TABLE `anio_ciclo_escolar` (
  `id_anio_ciclo_escolar` int(11) NOT NULL AUTO_INCREMENT,
  `anio_ciclo_escolar` year(4) NOT NULL,
  `estado_ciclo_escolar` varchar(10) NOT NULL,
  PRIMARY KEY (`id_anio_ciclo_escolar`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

INSERT INTO anio_ciclo_escolar VALUES("1","2018","Activo");
INSERT INTO anio_ciclo_escolar VALUES("2","2017","Activo");



CREATE TABLE `asignacion_alumno` (
  `id_asignacion_alumno` int(11) NOT NULL AUTO_INCREMENT,
  `id_alumno` varchar(50) NOT NULL,
  `id_ciclo_escolar` int(11) NOT NULL,
  `fecha_inscripcion` datetime NOT NULL,
  PRIMARY KEY (`id_asignacion_alumno`),
  KEY `Refalumnos7` (`id_alumno`),
  KEY `Refciclo_escolar11` (`id_ciclo_escolar`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;




CREATE TABLE `asignacion_grado_seccion` (
  `id_asignacion_grado_seccion` int(11) NOT NULL AUTO_INCREMENT,
  `id_anio_ciclo_escolar` int(11) NOT NULL,
  `seccion` varchar(10) NOT NULL,
  `id_profesores` int(11) DEFAULT NULL,
  `id_grado` int(11) NOT NULL,
  `jornada` varchar(15) NOT NULL,
  PRIMARY KEY (`id_asignacion_grado_seccion`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

INSERT INTO asignacion_grado_seccion VALUES("1","1","A","1","1","Matutina");
INSERT INTO asignacion_grado_seccion VALUES("2","1","A","2","2","Matutina");



CREATE TABLE `asignacion_maestro_seccion` (
  `id_asignacion_maestro_seccion` int(11) NOT NULL AUTO_INCREMENT,
  `id_profesor` int(11) NOT NULL,
  `id_pensum` int(11) NOT NULL,
  `id_asignacion_grado_seccion` int(11) NOT NULL,
  PRIMARY KEY (`id_asignacion_maestro_seccion`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

INSERT INTO asignacion_maestro_seccion VALUES("1","1","1","1");
INSERT INTO asignacion_maestro_seccion VALUES("2","2","2","1");
INSERT INTO asignacion_maestro_seccion VALUES("3","1","5","2");
INSERT INTO asignacion_maestro_seccion VALUES("4","2","6","2");



CREATE TABLE `grado` (
  `id_grado` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(100) NOT NULL,
  `categoria` varchar(25) NOT NULL,
  PRIMARY KEY (`id_grado`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

INSERT INTO grado VALUES("1","Parvulos","Pre-primaria");
INSERT INTO grado VALUES("2","Primero primaria","Primaria");
INSERT INTO grado VALUES("3","Segundo Primaria","Primaria");



CREATE TABLE `horario` (
  `id_horario` int(11) NOT NULL AUTO_INCREMENT,
  `id_grado` int(11) NOT NULL,
  `id_asignacion_grado_seccion` int(11) NOT NULL,
  `hora_inicio` time NOT NULL,
  `hora_fin` time NOT NULL,
  `dia` varchar(20) NOT NULL,
  `numero_dia` int(11) NOT NULL,
  `id_pensum` int(11) NOT NULL,
  PRIMARY KEY (`id_horario`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;




CREATE TABLE `mensuallidades` (
  `id_mensualidades` int(11) NOT NULL AUTO_INCREMENT,
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
  `noviembre` varchar(15) DEFAULT NULL,
  PRIMARY KEY (`id_mensualidades`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

INSERT INTO mensuallidades VALUES("7","1","1","","","","","","","","","","","");
INSERT INTO mensuallidades VALUES("2","2","2","","","","","","","","","","","");
INSERT INTO mensuallidades VALUES("3","2","1","","","","","","","","","","","");
INSERT INTO mensuallidades VALUES("4","3","1","","","","","","","","","","","");



CREATE TABLE `mensuallidades_respaldo` (
  `id_mensualidades` int(1) NOT NULL AUTO_INCREMENT,
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
  `noviembre` varchar(15) DEFAULT NULL,
  PRIMARY KEY (`id_mensualidades`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

INSERT INTO mensuallidades_respaldo VALUES("1","1","1","pagado","","","","","","","","","","");
INSERT INTO mensuallidades_respaldo VALUES("6","1","1","","","","","","","","","","","");
INSERT INTO mensuallidades_respaldo VALUES("5","1","2","","","","","","","","","","","");



CREATE TABLE `modulos` (
  `id_modulos` int(11) NOT NULL AUTO_INCREMENT,
  `nombre_modulo` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id_modulos`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;




CREATE TABLE `notas_alumno` (
  `id_notas_alumno` int(11) NOT NULL AUTO_INCREMENT,
  `unidad1` int(11) DEFAULT NULL,
  `unidad2` int(11) DEFAULT NULL,
  `unidad3` int(11) DEFAULT NULL,
  `unidad4` int(11) DEFAULT NULL,
  `promedio` float DEFAULT NULL,
  `id_alumno` int(11) DEFAULT NULL,
  `id_pensum` int(11) DEFAULT NULL,
  `id_asignacion_grado_seccion` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_notas_alumno`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

INSERT INTO notas_alumno VALUES("2","40","0","0","0","10","2","1","1");



CREATE TABLE `notas_alumno_respaldo` (
  `id_notas_alumno` int(1) NOT NULL AUTO_INCREMENT,
  `unidad1` int(11) DEFAULT NULL,
  `unidad2` int(11) DEFAULT NULL,
  `unidad3` int(11) DEFAULT NULL,
  `unidad4` int(11) DEFAULT NULL,
  `promedio` float DEFAULT NULL,
  `id_alumno` int(11) DEFAULT NULL,
  `id_pensum` int(11) DEFAULT NULL,
  `id_asignacion_grado_seccion` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_notas_alumno`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

INSERT INTO notas_alumno_respaldo VALUES("1","60","65","0","0","31.25","1","1","1");



CREATE TABLE `pase` (
  `id_passe` int(11) NOT NULL AUTO_INCREMENT,
  `nombre_pase` varchar(50) NOT NULL,
  `pase_encr` varchar(150) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `tipo_usuario` varchar(50) NOT NULL,
  PRIMARY KEY (`id_passe`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;




CREATE TABLE `pensum` (
  `id_pensum` int(11) NOT NULL AUTO_INCREMENT,
  `nombre_materia` varchar(100) NOT NULL,
  `estado` varchar(10) NOT NULL,
  `id_grado` int(11) NOT NULL,
  PRIMARY KEY (`id_pensum`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

INSERT INTO pensum VALUES("1","Ciencias Naturales","activo","1");
INSERT INTO pensum VALUES("2","Matematicas","activo","1");
INSERT INTO pensum VALUES("3","Fisica Fundamental","activo","1");
INSERT INTO pensum VALUES("4","Ingles","activo","1");
INSERT INTO pensum VALUES("5","Fisica","activo","2");
INSERT INTO pensum VALUES("6","Ciencias Naturales","activo","2");
INSERT INTO pensum VALUES("7","Matematicas","activo","2");



CREATE TABLE `profesores` (
  `dpi_profesor` int(11) NOT NULL,
  `nombres` varchar(50) DEFAULT NULL,
  `apellidos` varchar(50) DEFAULT NULL,
  `telefono` varchar(50) DEFAULT NULL,
  `correo` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`dpi_profesor`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

INSERT INTO profesores VALUES("1","Jose Antonio","García","","");
INSERT INTO profesores VALUES("2","Manuel Jose ","Fernandez","","");
INSERT INTO profesores VALUES("3","Karla","Peréz","","");
INSERT INTO profesores VALUES("21400304","Jose ","Antonio","","");



CREATE TABLE `recibo` (
  `id_recibo` int(11) NOT NULL AUTO_INCREMENT,
  `fecha_hora_pago` datetime NOT NULL,
  `tipo_pago` varchar(50) NOT NULL,
  `id_alumno` int(11) NOT NULL,
  `id_asignacion_grado_seccion` int(11) NOT NULL,
  `nombre_persona_q_paga` varchar(100) NOT NULL,
  `codigo_recibo` varchar(50) NOT NULL,
  `total` float NOT NULL,
  PRIMARY KEY (`id_recibo`)
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

INSERT INTO recibo VALUES("9","2018-11-27 21:55:05","Inscripcion","1","1","ka","c7ftwjj2zyfrp8xtn127","9");
INSERT INTO recibo VALUES("2","2018-10-15 21:37:17","enero","1","1","Roberto","tq5221inyzubwo5s9aq9","100");
INSERT INTO recibo VALUES("3","2018-10-15 22:42:48","1","1","1","Roberto","mtdo2uviu3ljcp2pd1v8","100");
INSERT INTO recibo VALUES("4","2018-10-16 00:40:04","Inscripcion","2","2","Louis","rcaffgncqc6fn6s31ga2","100");
INSERT INTO recibo VALUES("5","2018-11-26 18:49:06","Inscripcion","2","1","Luis","l9ot8mvdq5eaq4z5989i","100");
INSERT INTO recibo VALUES("6","2018-11-26 21:22:51","Inscripcion","3","1","Juan","nwex3h5j0biikguvjzfg","200");



CREATE TABLE `recibo_respaldo` (
  `id_recibo` int(1) NOT NULL AUTO_INCREMENT,
  `fecha_hora_pago` datetime NOT NULL,
  `tipo_pago` varchar(50) NOT NULL,
  `id_alumno` int(11) NOT NULL,
  `id_asignacion_grado_seccion` int(11) NOT NULL,
  `nombre_persona_q_paga` varchar(100) NOT NULL,
  `codigo_recibo` varchar(50) NOT NULL,
  `total` float NOT NULL,
  PRIMARY KEY (`id_recibo`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

INSERT INTO recibo_respaldo VALUES("8","2018-11-27 21:20:14","Inscripcion","1","1","Juan","39n0vv3lgz8xpw8mwoey","12");
INSERT INTO recibo_respaldo VALUES("1","2018-10-15 21:14:42","Inscripcion","1","1","Roberto","zyp2e47jai95fi8vtn9m","100");
INSERT INTO recibo_respaldo VALUES("7","2018-11-26 22:40:55","Inscripcion","1","2","q","03o67yya11cl47fxmklw","12");



CREATE TABLE `roles` (
  `id_roles` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id_roles`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;




CREATE TABLE `tipo_pago` (
  `id_tipo_pago` int(11) NOT NULL AUTO_INCREMENT,
  `nombre_pago` varchar(50) NOT NULL,
  `estado` varchar(15) NOT NULL,
  `pago` float NOT NULL,
  `anio` year(4) NOT NULL,
  PRIMARY KEY (`id_tipo_pago`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

INSERT INTO tipo_pago VALUES("1","Aniversario","activo","100","2018");



CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombres` varchar(100) NOT NULL,
  `usuario` varchar(75) NOT NULL,
  `password` varchar(100) NOT NULL,
  `tipo` varchar(25) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

INSERT INTO usuarios VALUES("1","Angel Alberto","Root","0cc175b9c0f1b6a831c399e269772661","Root");
INSERT INTO usuarios VALUES("2","Michelle Estefania
","Catedratico","0cc175b9c0f1b6a831c399e269772661","Catedratico");
INSERT INTO usuarios VALUES("3","Jorge Remache","Administrador","0cc175b9c0f1b6a831c399e269772661","Admin");

