-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 06-07-2019 a las 21:40:27
-- Versión del servidor: 10.1.38-MariaDB
-- Versión de PHP: 7.3.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `licorera`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `administrador`
--
CREATE SCHEMA IF NOT EXISTS `licorera` DEFAULT CHARACTER SET utf8 ;
USE `licorera` ;

CREATE TABLE `administrador` (
  `idadministrador` int(11) NOT NULL,
  `nombre` varchar(45) NOT NULL,
  `apellido` varchar(45) NOT NULL,
  `correo` varchar(45) NOT NULL,
  `clave` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `administrador`
--

INSERT INTO `administrador` (`idadministrador`, `nombre`, `apellido`, `correo`, `clave`) VALUES
(1, 'santy', 'aza', '123@123.com', '202cb962ac59075b964b07152d234b70');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detalle`
--

CREATE TABLE `detalle` (
  `iddetalle` int(11) NOT NULL,
  `idventa` int(11) NOT NULL,
  `idproducto` int(11) DEFAULT NULL,
  `cantidad` int(11) DEFAULT NULL,
  `precio` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `producto`
--

CREATE TABLE `producto` (
  `idproducto` int(11) NOT NULL,
  `nombre` varchar(20) DEFAULT NULL,
  `precio` int(11) DEFAULT NULL,
  `palcohol` int(10) DEFAULT NULL,
  `stock` int(10) DEFAULT NULL,
  `idvolumen` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `venta`
--

CREATE TABLE `venta` (
  `idventa` int(11) NOT NULL,
  `nombre_cliente` varchar(60) DEFAULT NULL,
  `fecha` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `volumen`
--

CREATE TABLE `volumen` (
  `idvolumen` int(11) NOT NULL,
  `descripcion` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `volumen`
--

INSERT INTO `volumen` (`idvolumen`, `descripcion`) VALUES
(2, '250ml'),
(3, '375ml'),
(4, '1000ml'),
(5, '2000ml'),
(6, 'Lata'),
(7, 'Botella vidrio');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `administrador`
--
ALTER TABLE `administrador`
  ADD PRIMARY KEY (`idadministrador`);

--
-- Indices de la tabla `detalle`
--
ALTER TABLE `detalle`
  ADD PRIMARY KEY (`iddetalle`,`idventa`),
  ADD KEY `idproducto` (`idproducto`),
  ADD KEY `idventa` (`idventa`);

--
-- Indices de la tabla `producto`
--
ALTER TABLE `producto`
  ADD PRIMARY KEY (`idproducto`),
  ADD KEY `idvolumen` (`idvolumen`);

--
-- Indices de la tabla `venta`
--
ALTER TABLE `venta`
  ADD PRIMARY KEY (`idventa`);

--
-- Indices de la tabla `volumen`
--
ALTER TABLE `volumen`
  ADD PRIMARY KEY (`idvolumen`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `administrador`
--
ALTER TABLE `administrador`
  MODIFY `idadministrador` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `detalle`
--
ALTER TABLE `detalle`
  MODIFY `iddetalle` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `producto`
--
ALTER TABLE `producto`
  MODIFY `idproducto` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `venta`
--
ALTER TABLE `venta`
  MODIFY `idventa` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `volumen`
--
ALTER TABLE `volumen`
  MODIFY `idvolumen` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `detalle`
--
ALTER TABLE `detalle`
  ADD CONSTRAINT `detalle_ibfk_1` FOREIGN KEY (`idproducto`) REFERENCES `producto` (`idproducto`),
  ADD CONSTRAINT `detalle_ibfk_2` FOREIGN KEY (`idventa`) REFERENCES `venta` (`idventa`);

--
-- Filtros para la tabla `producto`
--
ALTER TABLE `producto`
  ADD CONSTRAINT `producto_ibfk_1` FOREIGN KEY (`idvolumen`) REFERENCES `volumen` (`idvolumen`);
COMMIT;
INSERT INTO `producto` (`idproducto`, `nombre`, `precio`, `palcohol`, `stock`, `idvolumen`) VALUES 
(NULL, 'Ron', '36000', '30', '10', '3'),
(NULL, 'Ron', '70000', '30', '5', '4'),
(NULL, 'Ron', '120000', '30', '2', '5'),

(NULL, 'aguardiente', '36000', '30', '10', '3'),
(NULL, 'aguardiente', '70000', '30', '5', '4'),
(NULL, 'aguardiente', '120000', '30', '2', '5'),

(NULL, 'vino', '36000', '30', '10', '3'),
(NULL, 'vino', '70000', '30', '5', '4'),
(NULL, 'vino', '120000', '30', '2', '5'),

(NULL, 'whisky', '36000', '30', '10', '3'),
(NULL, 'whisky', '70000', '30', '5', '4'),
(NULL, 'whisky', '120000', '30', '2', '5'),

(NULL, 'vodka', '36000', '30', '10', '3'),
(NULL, 'vodka', '70000', '30', '5', '4'),
(NULL, 'vodka', '120000', '30', '2', '5'),

(NULL, 'poker', '2600', '5', '10', '6'),
(NULL, 'poker', '4000', '5', '7', '7'),

(NULL, 'aguila', '2600', '5', '10', '6'),
(NULL, 'aguila', '4000', '5', '7', '7')
;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
