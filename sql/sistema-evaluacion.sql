-- phpMyAdmin SQL Dump
-- version 3.5.1
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 06-07-2013 a las 04:33:21
-- Versión del servidor: 5.1.36-community-log
-- Versión de PHP: 5.4.3

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `sistema-evaluacion`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `alumno`
--

CREATE TABLE IF NOT EXISTS `alumno` (
  `alumnoID` int(11) NOT NULL AUTO_INCREMENT,
  `nombreAlum` varchar(30) NOT NULL,
  `apeAlum` varchar(30) NOT NULL,
  `facultadID` int(11) NOT NULL,
  PRIMARY KEY (`alumnoID`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Volcado de datos para la tabla `alumno`
--

INSERT INTO `alumno` (`alumnoID`, `nombreAlum`, `apeAlum`, `facultadID`) VALUES
(1, 'Hugo', 'Martinez', 1),
(2, 'María', 'Sosa', 2),
(3, 'Jurgen', 'Salas', 3),
(4, 'Estefany', 'Goytia', 4),
(5, 'Jorge Luis', 'Salazar', 5),
(6, 'Joel', 'Massa Lojas', 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `curso`
--

CREATE TABLE IF NOT EXISTS `curso` (
  `cursoID` int(11) NOT NULL AUTO_INCREMENT,
  `nombreCurso` varchar(50) NOT NULL,
  `numeroHoras` int(11) NOT NULL,
  `creditos` int(11) NOT NULL,
  `cicloRelat` int(11) NOT NULL,
  `docenteID` int(11) NOT NULL,
  PRIMARY KEY (`cursoID`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `departamento`
--

CREATE TABLE IF NOT EXISTS `departamento` (
  `departamentoID` int(11) NOT NULL AUTO_INCREMENT,
  `nombreDep` varchar(50) NOT NULL,
  PRIMARY KEY (`departamentoID`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Volcado de datos para la tabla `departamento`
--

INSERT INTO `departamento` (`departamentoID`, `nombreDep`) VALUES
(1, 'Departamento 1'),
(2, 'Departamento 2');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `docente`
--

CREATE TABLE IF NOT EXISTS `docente` (
  `docenteID` int(11) NOT NULL AUTO_INCREMENT,
  `nombreDoc` varchar(50) NOT NULL,
  `apeDoc` varchar(50) NOT NULL,
  `categoria` varchar(50) NOT NULL,
  `facultadID` int(11) NOT NULL,
  `departamentoID` int(11) NOT NULL,
  PRIMARY KEY (`docenteID`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Volcado de datos para la tabla `docente`
--

INSERT INTO `docente` (`docenteID`, `nombreDoc`, `apeDoc`, `categoria`, `facultadID`, `departamentoID`) VALUES
(1, 'Luis', 'Hernández', 'Categoría 01', 1, 2),
(2, 'Julián', 'Ramirez Ugaz', 'categoria 02', 4, 1),
(3, 'Geraldine', 'Fajardo', 'categoria 03', 3, 1),
(5, 'Mauro', 'Rosales', 'categoria 03', 2, 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `especialidad`
--

CREATE TABLE IF NOT EXISTS `especialidad` (
  `especialidadID` int(11) NOT NULL AUTO_INCREMENT,
  `nombreEsp` varchar(50) NOT NULL,
  `facultadID` int(11) NOT NULL,
  PRIMARY KEY (`especialidadID`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `facultad`
--

CREATE TABLE IF NOT EXISTS `facultad` (
  `facultadID` int(11) NOT NULL AUTO_INCREMENT,
  `nombreFac` varchar(50) NOT NULL,
  PRIMARY KEY (`facultadID`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Volcado de datos para la tabla `facultad`
--

INSERT INTO `facultad` (`facultadID`, `nombreFac`) VALUES
(1, 'Ingeniería Industrial y de Sistemas'),
(2, 'Ingeniería Ambiental'),
(3, 'Ingeniería Mecánica'),
(4, 'Ingeniería Química y Textil'),
(5, 'Ingeniería Eléctrica y Electrónica'),
(7, 'Ingeniería Civil');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `nota`
--

CREATE TABLE IF NOT EXISTS `nota` (
  `alumnoID` int(8) NOT NULL,
  `cursoID` int(8) NOT NULL,
  `practica1` int(2) NOT NULL,
  `practica2` int(2) NOT NULL,
  `practica3` int(2) NOT NULL,
  `practica4` int(2) NOT NULL,
  `examenParcial` int(2) NOT NULL,
  `examenFinal` int(2) NOT NULL,
  PRIMARY KEY (`alumnoID`,`cursoID`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
