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

DROP TABLE IF EXISTS `Asignatura`;
CREATE TABLE IF NOT EXISTS `Asignatura` (
  `Asignatura_id` int(6) NOT NULL AUTO_INCREMENT,
  `Titulacion_id` int(6) NOT NULL,
  `Nombre` varchar(50) NOT NULL,
  PRIMARY KEY (`Asignatura_id`,`Titulacion_id`),
  KEY `Titulacion_id` (`Titulacion_id`)
) TYPE=InnoDB AUTO_INCREMENT=1 ;

--
-- Volcar la base de datos para la tabla `asignatura`
--


-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `comentario_recurso`
--

DROP TABLE IF EXISTS `Comentario_recurso`;
CREATE TABLE IF NOT EXISTS `Comentario_recurso` (
  `Comentario_id` int(6) NOT NULL AUTO_INCREMENT,
  `Recurso_id` int(8) NOT NULL,
  `Usuario_id` int(7) NOT NULL,
  `Contenido` text NOT NULL,
  `Fecha` date NOT NULL,
  PRIMARY KEY (`Comentario_id`,`Recurso_id`,`Usuario_id`),
  KEY `Recurso_id` (`Recurso_id`),
  KEY `Usuario_id` (`Usuario_id`)
) TYPE=InnoDB AUTO_INCREMENT=1 ;

--
-- Volcar la base de datos para la tabla `comentario_recurso`
--


-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `grupo`
--

DROP TABLE IF EXISTS `Grupo`;
CREATE TABLE IF NOT EXISTS `Grupo` (
  `Grupo_id` int(6) NOT NULL AUTO_INCREMENT,
  `Nombre` varchar(20) NOT NULL,
  `Descripcion` text,
  `Fecha_alta` date NOT NULL,
  PRIMARY KEY (`Grupo_id`)
) TYPE=InnoDB AUTO_INCREMENT=1 ;

--
-- Volcar la base de datos para la tabla `grupo`
--


-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `grupo_usuario`
--

DROP TABLE IF EXISTS `Grupo_usuario`;
CREATE TABLE IF NOT EXISTS `Grupo_usuario` (
  `Grupo_id` int(6) NOT NULL,
  `Usuario_id` int(7) NOT NULL,
  PRIMARY KEY (`Grupo_id`,`Usuario_id`),
  KEY `Usuario_id` (`Usuario_id`)
) TYPE=InnoDB;

--
-- Volcar la base de datos para la tabla `grupo_usuario`
--


-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `publicacion_grupo`
--

DROP TABLE IF EXISTS `Publicacion_grupo`;
CREATE TABLE IF NOT EXISTS `publicacion_grupo` (
  `Publicacion_id` int(6) NOT NULL AUTO_INCREMENT,
  `Grupo_id` int(6) NOT NULL,
  `Usuario_id` int(7) NOT NULL,
  `Titulo` varchar(50) NOT NULL,
  `Contenido` text NOT NULL,
  `Fecha` date NOT NULL,
  PRIMARY KEY (`Publicacion_id`,`Grupo_id`,`Usuario_id`),
  KEY `Grupo_id` (`Grupo_id`),
  KEY `Usuario_id` (`Usuario_id`)
) TYPE=InnoDB AUTO_INCREMENT=1 ;

--
-- Volcar la base de datos para la tabla `publicacion_grupo`
--


-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `recurso`
--

DROP TABLE IF EXISTS `Recurso`;
CREATE TABLE IF NOT EXISTS `Recurso` (
  `Recurso_id` int(8) NOT NULL AUTO_INCREMENT,
  `Nombre` varchar(30) NOT NULL,
  `Descripcion` varchar(100) NOT NULL,
  `Fecha` date NOT NULL,
  `Usuario_id` int(7) NOT NULL,
  `URL` varchar(200) NOT NULL,
  `Tamaño` varchar(10) NOT NULL,
  `Formato` varchar(3) NOT NULL,
  PRIMARY KEY (`Recurso_id`),
  KEY `Usuario_id` (`Usuario_id`)
) TYPE=InnoDB AUTO_INCREMENT=1 ;

--
-- Volcar la base de datos para la tabla `recurso`
--


-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `recurso_asignatura`
--

DROP TABLE IF EXISTS `Recurso_asignatura`;
CREATE TABLE IF NOT EXISTS `Recurso_asignatura` (
  `Asignatura_id` int(6) NOT NULL,
  `Recurso_id` int(8) NOT NULL,
  PRIMARY KEY (`Asignatura_id`,`Recurso_id`),
  KEY `Recurso_id` (`Recurso_id`)
) TYPE=InnoDB;

--
-- Volcar la base de datos para la tabla `recurso_asignatura`
--


-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `reporte`
--

DROP TABLE IF EXISTS `Reporte`;
CREATE TABLE IF NOT EXISTS `Reporte` (
  `Reporte_id` int(6) NOT NULL AUTO_INCREMENT,
  `Contenido` text NOT NULL,
  PRIMARY KEY (`Reporte_id`)
) TYPE=InnoDB AUTO_INCREMENT=1 ;

--
-- Volcar la base de datos para la tabla `reporte`
--


-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `respuesta`
--

DROP TABLE IF EXISTS `Respuesta`;
CREATE TABLE IF NOT EXISTS `Respuesta` (
  `Respuesta_id` int(6) NOT NULL AUTO_INCREMENT,
  `Usuario_id` int(7) NOT NULL,
  `Publicacion_id` int(6) NOT NULL,
  `Contenido` text NOT NULL,
  `Fecha` date NOT NULL,
  PRIMARY KEY (`Respuesta_id`,`Usuario_id`,`Publicacion_id`),
  KEY `Usuario_id` (`Usuario_id`),
  KEY `Publicacion_id` (`Publicacion_id`)
) TYPE=InnoDB AUTO_INCREMENT=1 ;

--
-- Volcar la base de datos para la tabla `respuesta`
--


-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `titulacion`
--

DROP TABLE IF EXISTS `Titulacion`;
CREATE TABLE IF NOT EXISTS `Titulacion` (
  `Titulacion_id` int(6) NOT NULL AUTO_INCREMENT,
  `Nombre` varchar(50) NOT NULL,
  PRIMARY KEY (`Titulacion_id`)
) TYPE=InnoDB AUTO_INCREMENT=1 ;

--
-- Volcar la base de datos para la tabla `titulacion`
--


-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

DROP TABLE IF EXISTS `Usuario`;
CREATE TABLE IF NOT EXISTS `Usuario` (
  `Usuario_id` int(7) NOT NULL AUTO_INCREMENT,
  `Email` varchar(15) NOT NULL,
  `Password` varchar(32) NOT NULL,
  `Es_Administrador` tinyint(1) NOT NULL DEFAULT '0',
  `Nombre` varchar(30) NOT NULL,
  `Apellidos` varchar(60) NOT NULL,
  `Pais` varchar(50) NOT NULL,
  `Localidad` varchar(50) NOT NULL,
  `Provincia` varchar(50) NOT NULL,
  `Sexo` varchar(1) NOT NULL,
  `Fecha_Nacimiento` date NOT NULL,
  `Fecha_alta` date NOT NULL,
  PRIMARY KEY (`Usuario_id`),
  UNIQUE KEY `Email` (`Email`)
) TYPE=InnoDB AUTO_INCREMENT=1 ;

--
-- Volcar la base de datos para la tabla `usuario`
--


-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario_recurso_apunte`
--

DROP TABLE IF EXISTS `Usuario_recurso_apunte`;
CREATE TABLE IF NOT EXISTS Usuario_recurso_apunte` (
  `Usuario_id` int(7) NOT NULL,
  `Recurso_id` int(8) NOT NULL,
  PRIMARY KEY (`Usuario_id`,`Recurso_id`),
  KEY `Recurso_id` (`Recurso_id`)
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
ALTER TABLE `Asignatura`
  ADD CONSTRAINT `Asignatura_ibfk_1` FOREIGN KEY (`Titulacion_id`) REFERENCES `Titulacion` (`Titulacion_id`);

--
-- Filtros para la tabla `comentario_recurso`
--
ALTER TABLE `Comentario_recurso`
  ADD CONSTRAINT `Comentario_recurso_ibfk_2` FOREIGN KEY (`Usuario_id`) REFERENCES `Usuario` (`Usuario_id`),
  ADD CONSTRAINT `Comentario_recurso_ibfk_1` FOREIGN KEY (`Recurso_id`) REFERENCES `Recurso` (`Recurso_id`);

--
-- Filtros para la tabla `grupo_usuario`
--
ALTER TABLE `Grupo_usuario`
  ADD CONSTRAINT `Grupo_usuario_ibfk_2` FOREIGN KEY (`Usuario_id`) REFERENCES `Usuario` (`Usuario_id`),
  ADD CONSTRAINT `Grupo_usuario_ibfk_1` FOREIGN KEY (`Grupo_id`) REFERENCES `Grupo` (`Grupo_id`);

--
-- Filtros para la tabla `publicacion_grupo`
--
ALTER TABLE `Publicacion_grupo`
  ADD CONSTRAINT `Publicacion_grupo_ibfk_2` FOREIGN KEY (`Usuario_id`) REFERENCES `Usuario` (`Usuario_id`),
  ADD CONSTRAINT `Publicacion_grupo_ibfk_1` FOREIGN KEY (`Grupo_id`) REFERENCES `Grupo` (`Grupo_id`);

--
-- Filtros para la tabla `recurso`
--
ALTER TABLE `Recurso`
  ADD CONSTRAINT `Recurso_ibfk_1` FOREIGN KEY (`Usuario_id`) REFERENCES `Usuario` (`Usuario_id`);

--
-- Filtros para la tabla `recurso_asignatura`
--
ALTER TABLE `Recurso_asignatura`
  ADD CONSTRAINT `Recurso_asignatura_ibfk_2` FOREIGN KEY (`Recurso_id`) REFERENCES `Recurso` (`Recurso_id`),
  ADD CONSTRAINT `Recurso_asignatura_ibfk_1` FOREIGN KEY (`Asignatura_id`) REFERENCES `Asignatura` (`Asignatura_id`);

--
-- Filtros para la tabla `respuesta`
--
ALTER TABLE `Respuesta`
  ADD CONSTRAINT `Respuesta_ibfk_2` FOREIGN KEY (`Publicacion_id`) REFERENCES `Publicacion_grupo` (`Publicacion_id`),
  ADD CONSTRAINT `Respuesta_ibfk_1` FOREIGN KEY (`Usuario_id`) REFERENCES `Usuario` (`Usuario_id`);

--
-- Filtros para la tabla `usuario_recurso_apunte`
--
ALTER TABLE `Usuario_recurso_apunte`
  ADD CONSTRAINT `Usuario_recurso_apunte_ibfk_2` FOREIGN KEY (`Recurso_id`) REFERENCES `recurso` (`Recurso_id`),
  ADD CONSTRAINT `Usuario_recurso_apunte_ibfk_1` FOREIGN KEY (`Usuario_id`) REFERENCES `usuario` (`Usuario_id`);

INSERT INTO `Rsuario`
(`Usuario_id`, `Email`, `Password`, `Es_Administrador`, `Nombre`, `Apellidos`, `Pais`, `Localidad`, `Provincia`, `Sexo`, `Fecha_Nacimiento`, `Fecha_alta`) 
VALUES 
(NULL, 'i52cigam@uco.es', 'password', '0', 'Miguel Angel', 'Cid Garcia', 'España', 'Cordoba', 'Cordoba', 'H', '1986-12-02', '2011-12-23');

INSERT INTO `Usuario`
(`Usuario_id`, `Email`, `Password`, `Es_Administrador`, `Nombre`, `Apellidos`, `Pais`, `Localidad`, `Provincia`, `Sexo`, `Fecha_Nacimiento`, `Fecha_alta`) 
VALUES 
(NULL, 'i52gagac@uco.es', 'password', '1', 'Carlos', 'Garcia Garcia', 'España', 'Cordoba', 'Cordoba', 'H', '1987-06-17', '2011-12-23');

INSERT INTO `Usuario`
(`Usuario_id`, `Email`, `Password`, `Es_Administrador`, `Nombre`, `Apellidos`, `Pais`, `Localidad`, `Provincia`, `Sexo`, `Fecha_Nacimiento`, `Fecha_alta`) 
VALUES 
(NULL, 'i52jianr@uco.es', 'password', '1', 'Roman', 'Jimenez De Andres', 'España', 'Cordoba', 'Cordoba', 'H', '1987-06-02', '2011-12-23');




