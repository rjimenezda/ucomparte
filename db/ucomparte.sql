-- phpMyAdmin SQL Dump
-- version 3.3.10
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1:3307
-- Tiempo de generación: 21-12-2011 a las 19:44:38
-- Versión del servidor: 5.1.43
-- Versión de PHP: 5.2.12



/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `ucomparte`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `asignatura`
--

DROP TABLE IF EXISTS `asignatura`;
CREATE TABLE IF NOT EXISTS `asignatura` (
  `asignatura_id` int(6) NOT NULL AUTO_INCREMENT,
  `titulacion_id` int(6) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  PRIMARY KEY (`asignatura_id`,`titulacion_id`),
  KEY `titulacion_id` (`titulacion_id`)
) TYPE=InnoDB AUTO_INCREMENT=1 ;

--
-- Volcar la base de datos para la tabla `asignatura`
--


-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `comentario_recurso`
--

DROP TABLE IF EXISTS `comentario_recurso`;
CREATE TABLE IF NOT EXISTS `comentario_recurso` (
  `comentario_id` int(6) NOT NULL AUTO_INCREMENT,
  `recurso_id` int(8) NOT NULL,
  `usuario_id` int(7) NOT NULL,
  `contenido` text NOT NULL,
  `fecha` date NOT NULL,
  PRIMARY KEY (`comentario_id`,`recurso_id`,`usuario_id`),
  KEY `recurso_id` (`recurso_id`),
  KEY `usuario_id` (`usuario_id`)
) TYPE=InnoDB AUTO_INCREMENT=1 ;

--
-- Volcar la base de datos para la tabla `comentario_recurso`
--


-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `grupo`
--

DROP TABLE IF EXISTS `grupo`;
CREATE TABLE IF NOT EXISTS `grupo` (
  `grupo_id` int(6) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(20) NOT NULL UNIQUE,
  `descripcion` text,
  `fecha_alta` date NOT NULL,
  PRIMARY KEY (`grupo_id`)
) TYPE=InnoDB AUTO_INCREMENT=1 ;

--
-- Volcar la base de datos para la tabla `grupo`
--


-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `grupo_usuario`
--

DROP TABLE IF EXISTS `grupo_usuario`;
CREATE TABLE IF NOT EXISTS `grupo_usuario` (
  `grupo_id` int(6) NOT NULL,
  `usuario_id` int(7) NOT NULL,
  PRIMARY KEY (`grupo_id`,`usuario_id`),
  KEY `usuario_id` (`usuario_id`)
) TYPE=InnoDB;

--
-- Volcar la base de datos para la tabla `grupo_usuario`
--


-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `publicacion_grupo`
--

DROP TABLE IF EXISTS `publicacion_grupo`;
CREATE TABLE IF NOT EXISTS `publicacion_grupo` (
  `publicacion_id` int(6) NOT NULL AUTO_INCREMENT,
  `grupo_id` int(6) NOT NULL,
  `usuario_id` int(7) NOT NULL,
  `titulo` varchar(50) NOT NULL,
  `contenido` text NOT NULL,
  `fecha` date NOT NULL,
  PRIMARY KEY (`publicacion_id`,`grupo_id`,`usuario_id`),
  KEY `grupo_id` (`grupo_id`),
  KEY `usuario_id` (`usuario_id`)
) TYPE=InnoDB AUTO_INCREMENT=1 ;

--
-- Volcar la base de datos para la tabla `publicacion_grupo`
--


-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `recurso`
--

DROP TABLE IF EXISTS `recurso`;
CREATE TABLE IF NOT EXISTS `recurso` (
  `recurso_id` int(8) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(30) NOT NULL,
  `descripcion` varchar(100) NOT NULL,
  `fecha` date NOT NULL,
  `usuario_id` int(7) NOT NULL,
  `URL` varchar(200) NOT NULL,
  `tamano` varchar(10) NOT NULL,
  `formato` varchar(3) NOT NULL,
  PRIMARY KEY (`recurso_id`),
  KEY `usuario_id` (`usuario_id`)
) TYPE=InnoDB AUTO_INCREMENT=1 ;

--
-- Volcar la base de datos para la tabla `recurso`
--


-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `recurso_asignatura`
--

DROP TABLE IF EXISTS `recurso_asignatura`;
CREATE TABLE IF NOT EXISTS `recurso_asignatura` (
  `asignatura_id` int(6) NOT NULL,
  `recurso_id` int(8) NOT NULL,
  PRIMARY KEY (`asignatura_id`,`recurso_id`),
  KEY `recurso_id` (`recurso_id`)
) TYPE=InnoDB;

--
-- Volcar la base de datos para la tabla `recurso_asignatura`
--


-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `reporte`
--

DROP TABLE IF EXISTS `reporte`;
CREATE TABLE IF NOT EXISTS `reporte` (
  `reporte_id` int(6) NOT NULL AUTO_INCREMENT,
  `contenido` text NOT NULL,
  PRIMARY KEY (`reporte_id`)
) TYPE=InnoDB AUTO_INCREMENT=1 ;

--
-- Volcar la base de datos para la tabla `reporte`
--


-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `respuesta`
--

DROP TABLE IF EXISTS `respuesta`;
CREATE TABLE IF NOT EXISTS `respuesta` (
  `respuesta_id` int(6) NOT NULL AUTO_INCREMENT,
  `usuario_id` int(7) NOT NULL,
  `publicacion_id` int(6) NOT NULL,
  `contenido` text NOT NULL,
  `fecha` date NOT NULL,
  PRIMARY KEY (`respuesta_id`,`usuario_id`,`publicacion_id`),
  KEY `usuario_id` (`usuario_id`),
  KEY `publicacion_id` (`publicacion_id`)
) TYPE=InnoDB AUTO_INCREMENT=1 ;

--
-- Volcar la base de datos para la tabla `respuesta`
--


-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `titulacion`
--

DROP TABLE IF EXISTS `titulacion`;
CREATE TABLE IF NOT EXISTS `titulacion` (
  `titulacion_id` int(6) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(50) NOT NULL,
  PRIMARY KEY (`titulacion_id`)
) TYPE=InnoDB AUTO_INCREMENT=1 ;

--
-- Volcar la base de datos para la tabla `titulacion`
--


-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

DROP TABLE IF EXISTS `usuario`;
CREATE TABLE IF NOT EXISTS `usuario` (
  `usuario_id` int(7) NOT NULL AUTO_INCREMENT,
  `email` varchar(15) NOT NULL,
  `password` varchar(32) NOT NULL,
  `es_administrador` tinyint(1) NOT NULL DEFAULT '0',
  `nombre` varchar(30) NOT NULL,
  `apellidos` varchar(60) NOT NULL,
  `pais` varchar(50) NOT NULL,
  `localidad` varchar(50) NOT NULL,
  `provincia` varchar(50) NOT NULL,
  `sexo` varchar(1) NOT NULL,
  `fecha_Nacimiento` date NOT NULL,
  `fecha_alta` date NOT NULL,
  PRIMARY KEY (`usuario_id`),
  UNIQUE KEY `email` (`email`)
) TYPE=InnoDB AUTO_INCREMENT=1 ;

--
-- Volcar la base de datos para la tabla `usuario`
--


-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario_recurso_apunte`
--

DROP TABLE IF EXISTS `usuario_recurso_apunte`;
CREATE TABLE IF NOT EXISTS `usuario_recurso_apunte` (
  `usuario_id` int(7) NOT NULL,
  `recurso_id` int(8) NOT NULL,
  PRIMARY KEY (`usuario_id`,`recurso_id`),
  KEY `recurso_id` (`recurso_id`)
) TYPE=InnoDB;

--
-- Volcar la base de datos para la tabla `usuario_recurso_apunte`
--


--
-- Filtros para las tablas descargadas (dump)
--

--
-- Filtros para la tabla `asignatura`
--
ALTER TABLE `asignatura`
  ADD CONSTRAINT `asignatura_ibfk_1` FOREIGN KEY (`titulacion_id`) REFERENCES `titulacion` (`titulacion_id`);

--
-- Filtros para la tabla `comentario_recurso`
--
ALTER TABLE `comentario_recurso`
  ADD CONSTRAINT `comentario_recurso_ibfk_2` FOREIGN KEY (`usuario_id`) REFERENCES `usuario` (`usuario_id`),
  ADD CONSTRAINT `comentario_recurso_ibfk_1` FOREIGN KEY (`recurso_id`) REFERENCES `recurso` (`recurso_id`);

--
-- Filtros para la tabla `grupo_usuario`
--
ALTER TABLE `grupo_usuario`
  ADD CONSTRAINT `grupo_usuario_ibfk_2` FOREIGN KEY (`usuario_id`) REFERENCES `usuario` (`usuario_id`),
  ADD CONSTRAINT `grupo_usuario_ibfk_1` FOREIGN KEY (`grupo_id`) REFERENCES `grupo` (`grupo_id`);

--
-- Filtros para la tabla `publicacion_grupo`
--
ALTER TABLE `publicacion_grupo`
  ADD CONSTRAINT `publicacion_grupo_ibfk_2` FOREIGN KEY (`usuario_id`) REFERENCES `usuario` (`usuario_id`),
  ADD CONSTRAINT `publicacion_grupo_ibfk_1` FOREIGN KEY (`grupo_id`) REFERENCES `grupo` (`grupo_id`);

--
-- Filtros para la tabla `recurso`
--
ALTER TABLE `recurso`
  ADD CONSTRAINT `recurso_ibfk_1` FOREIGN KEY (`usuario_id`) REFERENCES `usuario` (`usuario_id`);

--
-- Filtros para la tabla `recurso_asignatura`
--
ALTER TABLE `recurso_asignatura`
  ADD CONSTRAINT `recurso_asignatura_ibfk_2` FOREIGN KEY (`recurso_id`) REFERENCES `recurso` (`recurso_id`),
  ADD CONSTRAINT `recurso_asignatura_ibfk_1` FOREIGN KEY (`asignatura_id`) REFERENCES `asignatura` (`asignatura_id`);

--
-- Filtros para la tabla `respuesta`
--
ALTER TABLE `respuesta`
  ADD CONSTRAINT `respuesta_ibfk_2` FOREIGN KEY (`publicacion_id`) REFERENCES `publicacion_grupo` (`publicacion_id`),
  ADD CONSTRAINT `respuesta_ibfk_1` FOREIGN KEY (`usuario_id`) REFERENCES `usuario` (`usuario_id`);

--
-- Filtros para la tabla `usuario_recurso_apunte`
--
ALTER TABLE `usuario_recurso_apunte`
  ADD CONSTRAINT `usuario_recurso_apunte_ibfk_2` FOREIGN KEY (`recurso_id`) REFERENCES `recurso` (`recurso_id`),
  ADD CONSTRAINT `usuario_recurso_apunte_ibfk_1` FOREIGN KEY (`usuario_id`) REFERENCES `usuario` (`usuario_id`);
  
-- Vistas

CREATE VIEW meloapuntos_count AS
SELECT recurso.recurso_id, COUNT(usuario_recurso_apunte.usuario_id) as meloapuntos FROM recurso LEFT JOIN usuario_recurso_apunte ON recurso.recurso_id = usuario_recurso_apunte.recurso_id GROUP BY recurso.recurso_id;

CREATE VIEW detalles_recursos AS 
SELECT recurso.recurso_id, recurso.usuario_id, recurso.URL, recurso.nombre, recurso.descripcion, recurso.tamano, meloapuntos_count.meloapuntos FROM recurso INNER JOIN meloapuntos_count ON meloapuntos_count.recurso_id = recurso.recurso_id;

CREATE VIEW recursos_detalles_usuarios AS 
SELECT detalles_recursos.recurso_id, detalles_recursos.nombre, detalles_recursos.descripcion, detalles_recursos.tamano, detalles_recursos.meloapuntos, usuario_recurso_apunte.usuario_id FROM usuario_recurso_apunte INNER JOIN detalles_recursos ON usuario_recurso_apunte.recurso_id = detalles_recursos.recurso_id;

CREATE VIEW recursos_detalles_asignatura AS
SELECT detalles_recursos.recurso_id, detalles_recursos.nombre, detalles_recursos.descripcion, detalles_recursos.tamano, detalles_recursos.meloapuntos, recurso_asignatura.asignatura_id FROM recurso_asignatura INNER JOIN detalles_recursos ON recurso_asignatura.recurso_id = detalles_recursos.recurso_id; 

INSERT INTO `usuario`
(`usuario_id`, `email`, `password`, `es_administrador`, `nombre`, `apellidos`, `pais`, `localidad`, `provincia`, `sexo`, `fecha_Nacimiento`, `fecha_alta`) 
VALUES 
(NULL, 'i52cigam@uco.es', 'password', '0', 'Miguel Angel', 'Cid Garcia', 'España', 'Cordoba', 'Cordoba', 'H', '1986-12-02', '2011-12-23');

INSERT INTO `usuario`
(`usuario_id`, `email`, `password`, `es_administrador`, `nombre`, `apellidos`, `pais`, `localidad`, `provincia`, `sexo`, `fecha_Nacimiento`, `fecha_alta`) 
VALUES 
(NULL, 'i52gagac@uco.es', 'password', '1', 'Carlos', 'Garcia Garcia', 'España', 'Cordoba', 'Cordoba', 'H', '1987-06-17', '2011-12-23');

INSERT INTO `usuario`
(`usuario_id`, `email`, `password`, `es_administrador`, `nombre`, `apellidos`, `pais`, `localidad`, `provincia`, `sexo`, `fecha_Nacimiento`, `fecha_alta`) 
VALUES 
(NULL, 'i52jianr@uco.es', 'password', '1', 'Roman', 'Jimenez De Andres', 'España', 'Cordoba', 'Cordoba', 'H', '1987-06-02', '2011-12-23');

INSERT INTO `usuario`
(`usuario_id`, `email`, `password`, `es_administrador`, `nombre`, `apellidos`, `pais`, `localidad`, `provincia`, `sexo`, `fecha_Nacimiento`, `fecha_alta`) 
VALUES 
(NULL, 'i52besar@uco.es', 'password', '1', 'Rafael', 'Bernal Sanz', 'España', 'Cordoba', 'Cordoba', 'H', '1987-06-12', '2011-12-23');

INSERT INTO `usuario`
(`usuario_id`, `email`, `password`, `es_administrador`, `nombre`, `apellidos`, `pais`, `localidad`, `provincia`, `sexo`, `fecha_Nacimiento`, `fecha_alta`) 
VALUES 
(NULL, 'i42excaj@uco.es', 'password', '1', 'Jose David', 'Exposito Canete', 'España', 'Cordoba', 'Cordoba', 'H', '1986-05-11', '2011-12-23');

INSERT INTO `titulacion` (`titulacion_id`, `nombre`) VALUES (NULL, 'Ingenieria Informatica');

INSERT INTO `titulacion` (`titulacion_id`, `nombre`) VALUES (NULL, 'Ingenieria Tecnica Informatica Sistemas');

INSERT INTO `asignatura` (`asignatura_id`, `titulacion_id`, `nombre`) VALUES (NULL, '1', 'Proyectos');

INSERT INTO `asignatura` (`asignatura_id`, `titulacion_id`, `nombre`) VALUES (NULL, '1', 'Redes');

INSERT INTO `asignatura` (`asignatura_id`, `titulacion_id`, `nombre`) VALUES (NULL, '1', 'Bioinformatica');

INSERT INTO `asignatura` (`asignatura_id`, `titulacion_id`, `nombre`) VALUES (NULL, '2', 'Matematica');

INSERT INTO `grupo` (`grupo_id`, `nombre`, `descripcion`, `fecha_alta`) VALUES (NULL, 'Primera Fila', ' ', '2011-12-23');

INSERT INTO `grupo` (`grupo_id`, `nombre`, `descripcion`, `fecha_alta`) VALUES (NULL, 'Segunda Fila', 'grupo para hablar sobre sudaderas ', '2011-12-23');

INSERT INTO `grupo_usuario` (`grupo_id`, `usuario_id`) VALUES ('1', '1');

INSERT INTO `grupo_usuario` (`grupo_id`, `usuario_id`) VALUES ('1', '2');

INSERT INTO `grupo_usuario` (`grupo_id`, `usuario_id`) VALUES ('2', '3');

INSERT INTO `grupo_usuario` (`grupo_id`, `usuario_id`) VALUES ('1', '4');

INSERT INTO `grupo_usuario` (`grupo_id`, `usuario_id`) VALUES ('1', '5');

INSERT INTO `publicacion_grupo` 
(`publicacion_id`, `grupo_id`, `usuario_id`, `titulo`, `contenido`, `fecha`)
VALUES 
(NULL, '1', '1', 'Cena de Navidad', 'Donde y cuando quereis hacer la cena de Navidad?', '2011-12-23');

INSERT INTO `publicacion_grupo` 
(`publicacion_id`, `grupo_id`, `usuario_id`, `titulo`, `contenido`, `fecha`)
VALUES 
(NULL, '2', '4', 'Nueva temporada de sudadertas', 'Ha empezado la nueva temporada de sudaderas y me gustaria que me dijeseis como me queda','2011-12-15');

INSERT INTO `respuesta` 
(`respuesta_id`, `usuario_id`, `publicacion_id`, `contenido`, `fecha`) 
VALUES 
(NULL, '2', '1', 'Pues yo quiero el Moriles el dia 26', '2011-12-23');

INSERT INTO `respuesta` 
(`respuesta_id`, `usuario_id`, `publicacion_id`, `contenido`, `fecha`) 
VALUES 
(NULL, '3', '1', 'A mi me gustaria el Juramento que se come de lujo', '2011-12-23');

INSERT INTO `respuesta` 
(`respuesta_id`, `usuario_id`, `publicacion_id`, `contenido`, `fecha`)
VALUES 
(NULL, '5', '2', 'Pues te queda muy bien tio!', '2011-12-23');

INSERT INTO `recurso` 
(`recurso_id`, `nombre`, `descripcion`, `fecha`, `usuario_id`, `URL`, `tamano`, `formato`)
VALUES 
(NULL, 'Practica 2', 'Memorias de la practica 2 de Bioinfo', '2011-12-23', '1', 'www.google.es', '2 MB', 'Pdf');

INSERT INTO `recurso` 
(`recurso_id`, `nombre`, `descripcion`, `fecha`, `usuario_id`, `URL`, `tamano`, `formato`)
VALUES 
(NULL, 'Ejercicio', 'Ejercicio de IP de Redes', '2011-12-23', '2', 'www.redes.es', '64 KB', 'Txt');

INSERT INTO `recurso` 
(`recurso_id`, `nombre`, `descripcion`, `fecha`, `usuario_id`, `URL`, `tamano`, `formato`)
VALUES 
(NULL, 'Plantilla Latex', 'Plantilla en Latex para cualquier asignatura', '2011-12-23', '5', 'www.latex.es', '10 KB', 'Ltx');

INSERT INTO `recurso_asignatura` (`asignatura_id`, `recurso_id`) VALUES ('3', '1');

INSERT INTO `recurso_asignatura` (`asignatura_id`, `recurso_id`) VALUES ('2', '2');

INSERT INTO `recurso_asignatura` (`asignatura_id`, `recurso_id`) VALUES ('1', '3');

INSERT INTO `usuario_recurso_apunte` (`usuario_id`, `recurso_id`) VALUES ('1', '1');

INSERT INTO `usuario_recurso_apunte` (`usuario_id`, `recurso_id`) VALUES ('2', '1');

INSERT INTO `usuario_recurso_apunte` (`usuario_id`, `recurso_id`) VALUES ('3', '1');

INSERT INTO `usuario_recurso_apunte` (`usuario_id`, `recurso_id`) VALUES ('4', '1');

INSERT INTO `usuario_recurso_apunte` (`usuario_id`, `recurso_id`) VALUES ('4', '2');

INSERT INTO `usuario_recurso_apunte` (`usuario_id`, `recurso_id`) VALUES ('5', '3');

INSERT INTO `usuario_recurso_apunte` (`usuario_id`, `recurso_id`) VALUES ('1', '3');

INSERT INTO `comentario_recurso` 
(`comentario_id`, `recurso_id`, `usuario_id`, `contenido`, `fecha`)
VALUES 
(NULL, '1', '2', 'La verdad que estas practicas estan muy bien', '2011-12-23');

INSERT INTO `comentario_recurso` 
(`comentario_id`, `recurso_id`, `usuario_id`, `contenido`, `fecha`)
VALUES 
(NULL, '1', '3', 'TIENEN UN VIRUS SERÁS HIJOPUTA D:', NOW());

INSERT INTO `comentario_recurso` 
(`comentario_id`, `recurso_id`, `usuario_id`, `contenido`, `fecha`)
VALUES 
(NULL, '2', '1', 'El ejercicio esta bien resuelto', '2011-12-23');

INSERT INTO `reporte` (`reporte_id`, `contenido`) VALUES (NULL, 'El recurso 1 esta mal');



