-- phpMyAdmin SQL Dump
-- version 2.10.3
-- http://www.phpmyadmin.net
-- 
-- Servidor: localhost
-- Tiempo de generación: 05-07-2013 a las 16:01:27
-- Versión del servidor: 5.0.51
-- Versión de PHP: 5.2.6
-- 
-- Evaluacion
-- 

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";

-- 
-- Base de datos: `sistema evaluacion`
-- 

-- --------------------------------------------------------

-- 
-- Estructura de tabla para la tabla `alumno`
-- 

CREATE TABLE `alumno` (
  `alumnoID` int(8) NOT NULL,
  `facultadID` int(8) NOT NULL,
  `nombreAlum` varchar(30) NOT NULL,
  `apeAlum` varchar(30) NOT NULL,
  PRIMARY KEY  (`alumnoID`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='Define a un alumno';

-- 
-- Volcar la base de datos para la tabla `alumno`
-- 


-- --------------------------------------------------------

-- 
-- Estructura de tabla para la tabla `curso`
-- 

CREATE TABLE `curso` (
  `cursoID` int(8) NOT NULL,
  `docenteID` int(8) NOT NULL,
  `nombreCurso` varchar(50) NOT NULL,
  `creditos` int(2) NOT NULL,
  `cicloRelat` int(2) NOT NULL,
  `numeroHoras` int(2) NOT NULL,
  PRIMARY KEY  (`cursoID`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='Define al curso que dicta';

-- 
-- Volcar la base de datos para la tabla `curso`
-- 


-- --------------------------------------------------------

-- 
-- Estructura de tabla para la tabla `departamento`
-- 

CREATE TABLE `departamento` (
  `departamentoID` int(8) NOT NULL,
  `nombreDep` varchar(50) NOT NULL,
  PRIMARY KEY  (`departamentoID`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- 
-- Volcar la base de datos para la tabla `departamento`
-- 


-- --------------------------------------------------------

-- 
-- Estructura de tabla para la tabla `docente`
-- 

CREATE TABLE `docente` (
  `docenteID` int(8) NOT NULL,
  `departamentoID` int(8) NOT NULL,
  `facultadID` int(8) NOT NULL,
  `categoria` varchar(50) NOT NULL,
  `nombreDoc` varchar(50) NOT NULL,
  `apeDoc` varchar(50) NOT NULL,
  PRIMARY KEY  (`docenteID`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='Define al docente ';

-- 
-- Volcar la base de datos para la tabla `docente`
-- 


-- --------------------------------------------------------

-- 
-- Estructura de tabla para la tabla `especialidad`
-- 

CREATE TABLE `especialidad` (
  `especialidadID` int(8) NOT NULL,
  `facultadID` int(8) NOT NULL,
  `nombreEsp` varchar(50) NOT NULL,
  PRIMARY KEY  (`especialidadID`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- 
-- Volcar la base de datos para la tabla `especialidad`
-- 


-- --------------------------------------------------------

-- 
-- Estructura de tabla para la tabla `facultad`
-- 

CREATE TABLE `facultad` (
  `facultadID` int(8) NOT NULL,
  `nombreFac` varchar(50) NOT NULL,
  PRIMARY KEY  (`facultadID`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='Define a la facultada del alumno';

-- 
-- Volcar la base de datos para la tabla `facultad`
-- 


-- --------------------------------------------------------

-- 
-- Estructura de tabla para la tabla `nota`
-- 

CREATE TABLE `nota` (
  `alumnoID` int(8) NOT NULL,
  `cursoID` int(8) NOT NULL,
  `practica1` int(2) NOT NULL,
  `practica2` int(2) NOT NULL,
  `practica3` int(2) NOT NULL,
  `practica4` int(2) NOT NULL,
  `examenParcial` int(2) NOT NULL,
  `examenFinal` int(2) NOT NULL,
  PRIMARY KEY  (`alumnoID`,`cursoID`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- 
-- Volcar la base de datos para la tabla `nota`
-- 

