-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 10-09-2019 a las 05:17:47
-- Versión del servidor: 10.1.21-MariaDB
-- Versión de PHP: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `el_ninio_mensajero`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `administrador`
--

CREATE TABLE `administrador` (
  `ID_ADMINISTRADOR` char(250) NOT NULL,
  `NOMBRE_ADMINISTRADOR` char(250) NOT NULL,
  `APELLIDO_PATERNO_ADMINISTRADOR` char(250) NOT NULL,
  `APELLIDO_MATERNO_ADMINISTRADOR` char(250) DEFAULT NULL,
  `NOMBRE_USUARIO_ADMIN` char(250) NOT NULL,
  `CONTRASENIA_ADMIN` char(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `boletin`
--

CREATE TABLE `boletin` (
  `ID_BOLETIN` char(250) NOT NULL,
  `TEXTO_BOLETIN` longblob NOT NULL,
  `AUTORES` char(250) NOT NULL,
  `FECHA_CREACION` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `carta_recivida`
--

CREATE TABLE `carta_recivida` (
  `ID_CARTA_RECIVIDA` char(250) NOT NULL,
  `ID_ESPECIALIDAD` char(250) NOT NULL,
  `TEXTO_CARTA` longblob NOT NULL,
  `ESPECIALIDAD` char(250) DEFAULT NULL,
  `PRIORIDAD` char(5) DEFAULT NULL,
  `LEIDA` char(5) DEFAULT NULL,
  `RESPUESTA` longblob,
  `POSTULACION_BOLETIN` char(5) DEFAULT NULL,
  `FECHA_RECEPCION` datetime NOT NULL,
  `IMAGEN` longblob
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `editor`
--

CREATE TABLE `editor` (
  `ID_EDITOR` char(250) NOT NULL,
  `ID_ADMINISTRADOR` char(250) NOT NULL,
  `NOMBRE_EDITOR` char(250) NOT NULL,
  `APELLIDO_PATERNO_EDITOR` char(250) NOT NULL,
  `APELLIDO_MATERNO_EDITOR` char(250) DEFAULT NULL,
  `NOMBRE_USUARIO_EDITOR` char(250) NOT NULL,
  `CONTRASENIA_EDITOR` char(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `editor_boletin`
--

CREATE TABLE `editor_boletin` (
  `ID_BOLETIN` char(250) NOT NULL,
  `ID_EDITOR` char(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `editor_carta`
--

CREATE TABLE `editor_carta` (
  `ID_CARTA_RECIVIDA` char(250) NOT NULL,
  `ID_EDITOR` char(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `especialidad`
--

CREATE TABLE `especialidad` (
  `ID_ESPECIALIDAD` char(250) NOT NULL,
  `ID_ADMINISTRADOR` char(250) NOT NULL,
  `NOMBRE_ESPECIALIDAD` char(250) NOT NULL,
  `APELLIDO_PATERNO_ESPECIALIDAD` char(250) NOT NULL,
  `APELLIDO_MATERNO_ESPECIALIDAD` char(250) DEFAULT NULL,
  `NOMBRE_USUARIO_ESPECIALIDAD` char(250) NOT NULL,
  `CONTRASENIA_ESPECIALIDAD` char(250) NOT NULL,
  `ESPECIALIDAD` char(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `administrador`
--
ALTER TABLE `administrador`
  ADD PRIMARY KEY (`ID_ADMINISTRADOR`);

--
-- Indices de la tabla `boletin`
--
ALTER TABLE `boletin`
  ADD PRIMARY KEY (`ID_BOLETIN`);

--
-- Indices de la tabla `carta_recivida`
--
ALTER TABLE `carta_recivida`
  ADD PRIMARY KEY (`ID_CARTA_RECIVIDA`),
  ADD KEY `FK_ESPECIALIDAD_CARTA` (`ID_ESPECIALIDAD`);

--
-- Indices de la tabla `editor`
--
ALTER TABLE `editor`
  ADD PRIMARY KEY (`ID_EDITOR`),
  ADD KEY `FK_ADMINISTRADOR_EDITOR` (`ID_ADMINISTRADOR`);

--
-- Indices de la tabla `editor_boletin`
--
ALTER TABLE `editor_boletin`
  ADD PRIMARY KEY (`ID_BOLETIN`,`ID_EDITOR`),
  ADD KEY `FK_EDITOR_BOLETIN2` (`ID_EDITOR`);

--
-- Indices de la tabla `editor_carta`
--
ALTER TABLE `editor_carta`
  ADD PRIMARY KEY (`ID_CARTA_RECIVIDA`,`ID_EDITOR`),
  ADD KEY `FK_EDITOR_CARTA2` (`ID_EDITOR`);

--
-- Indices de la tabla `especialidad`
--
ALTER TABLE `especialidad`
  ADD PRIMARY KEY (`ID_ESPECIALIDAD`),
  ADD KEY `FK_ADMINISTRADOR_ESPECIALIDAD` (`ID_ADMINISTRADOR`);

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `carta_recivida`
--
ALTER TABLE `carta_recivida`
  ADD CONSTRAINT `FK_ESPECIALIDAD_CARTA` FOREIGN KEY (`ID_ESPECIALIDAD`) REFERENCES `especialidad` (`ID_ESPECIALIDAD`);

--
-- Filtros para la tabla `editor`
--
ALTER TABLE `editor`
  ADD CONSTRAINT `FK_ADMINISTRADOR_EDITOR` FOREIGN KEY (`ID_ADMINISTRADOR`) REFERENCES `administrador` (`ID_ADMINISTRADOR`);

--
-- Filtros para la tabla `editor_boletin`
--
ALTER TABLE `editor_boletin`
  ADD CONSTRAINT `FK_EDITOR_BOLETIN` FOREIGN KEY (`ID_BOLETIN`) REFERENCES `boletin` (`ID_BOLETIN`),
  ADD CONSTRAINT `FK_EDITOR_BOLETIN2` FOREIGN KEY (`ID_EDITOR`) REFERENCES `editor` (`ID_EDITOR`);

--
-- Filtros para la tabla `editor_carta`
--
ALTER TABLE `editor_carta`
  ADD CONSTRAINT `FK_EDITOR_CARTA` FOREIGN KEY (`ID_CARTA_RECIVIDA`) REFERENCES `carta_recivida` (`ID_CARTA_RECIVIDA`),
  ADD CONSTRAINT `FK_EDITOR_CARTA2` FOREIGN KEY (`ID_EDITOR`) REFERENCES `editor` (`ID_EDITOR`);

--
-- Filtros para la tabla `especialidad`
--
ALTER TABLE `especialidad`
  ADD CONSTRAINT `FK_ADMINISTRADOR_ESPECIALIDAD` FOREIGN KEY (`ID_ADMINISTRADOR`) REFERENCES `administrador` (`ID_ADMINISTRADOR`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
