-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1:3307
-- Tiempo de generación: 19-06-2019 a las 23:05:06
-- Versión del servidor: 10.1.37-MariaDB
-- Versión de PHP: 7.3.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `udsocial`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `administrador`
--

CREATE TABLE `administrador` (
  `idadministrador` int(11) NOT NULL,
  `nombre` varchar(45) NOT NULL,
  `apellido` varchar(45) NOT NULL,
  `correo` varchar(45) NOT NULL,
  `clave` varchar(45) NOT NULL,
  `estado` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `administrador`
--

INSERT INTO `administrador` (`idadministrador`, `nombre`, `apellido`, `correo`, `clave`, `estado`) VALUES
(1, 'Hector', 'Florez', '123@123.com', '202cb962ac59075b964b07152d234b70', 1),
(2, 'Arturo', 'Fernandez', '1234@123.com', '202cb962ac59075b964b07152d234b70', 1),
(3, 'Pedro', 'Picapiedra', '789@123.com', '68053af2923e00204c3ca7c6a3150cf7', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estudiante`
--

CREATE TABLE `estudiante` (
  `idestudiante` int(11) NOT NULL,
  `nombre` varchar(45) NOT NULL,
  `apellido` varchar(45) NOT NULL,
  `correo` varchar(45) NOT NULL,
  `codigo` varchar(45) DEFAULT NULL,
  `clave` varchar(45) NOT NULL,
  `foto` varchar(45) DEFAULT NULL,
  `estado` tinyint(1) NOT NULL,
  `programa_idprograma` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `estudiante`
--

INSERT INTO `estudiante` (`idestudiante`, `nombre`, `apellido`, `correo`, `codigo`, `clave`, `foto`, `estado`, `programa_idprograma`) VALUES
(1, 'Homero', 'Simpson', 'hs@123.com', NULL, '250cf8b51c773f3f8dc8b4be867a9a02', NULL, 1, 1),
(2, 'Juan', 'Rojas', '123@123.com', '', '937ae20cedcca9d080b49688bbe460d0', '', 1, 2),
(3, 'Anna', 'Ramirez', 'anaramirez99@hotmail.com', '', '88c9f003684ccd67922937292c4e0689', '', 0, 1),
(4, 'Jorge', 'Avellaneda', 'jorgeavellaneda99@hotmail.com', '', 'aa3b3d2a9249b6fa369d34527205b1b7', '', 1, 2),
(5, 'Andrea', 'Bernal', 'andreabernal22@gmail.com', '', '150b2c9b702b78e78d6a840122cacb58', '', 1, 1),
(6, 'Claudia', 'Romero', 'claudiaromero33@gmail.com', '', 'eaac8adb1fcaed1be2a06d6b791bac55', '', 1, 1),
(7, 'Carlos', 'Fernandez', 'carlosfernandez22@gmail.com', NULL, 'eb442d13da805f6dd0dbe05cf57e4ddd', NULL, 1, 1),
(8, 'Lucia', 'Guzman', 'luciguzman99@hotmail.com', NULL, '6f271ab842c0fe4347338db1054862bb', NULL, 1, 2),
(9, 'Lizeth', 'Leon', 'lizzleon24@gmail.com', NULL, 'e3f35a0f4d30f885c4ae41099f9ee0cf', NULL, 1, 2),
(10, 'Manuel', 'Bohorquez', 'manuelbohorquez12@yahoo.es', NULL, '0a9d0c1feab584966da27bc32db3b8b2', NULL, 1, 1),
(11, 'Jorge', 'Daza', 'jorged@gmail.com', '', 'fae0b27c451c728867a567e8c1bb4e53', '', 1, 1),
(13, 'Pedro', 'Jimenez', '123', '123', '202cb962ac59075b964b07152d234b70', NULL, 1, 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `facultad`
--

CREATE TABLE `facultad` (
  `idfacultad` int(11) NOT NULL,
  `nombre` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `facultad`
--

INSERT INTO `facultad` (`idfacultad`, `nombre`) VALUES
(1, 'Artes'),
(2, 'Ciencias y Educacion'),
(3, 'Ingenieria'),
(4, 'Medio Ambiente'),
(5, 'Tecnologica');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `programa`
--

CREATE TABLE `programa` (
  `idprograma` int(11) NOT NULL,
  `nombre` varchar(45) NOT NULL,
  `facultad_idfacultad` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `programa`
--

INSERT INTO `programa` (`idprograma`, `nombre`, `facultad_idfacultad`) VALUES
(1, 'Tecnologia en Sistematizacion de Datos', 5),
(2, 'Ingenieria en Telematica', 5),
(3, 'Arte Danzario', 1),
(4, 'Artes Plasticas', 1),
(5, 'Ingenieria forestal', 4),
(6, 'Ingenieria de sistemas', 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `publicacion`
--

CREATE TABLE `publicacion` (
  `idpublicacion` int(11) NOT NULL,
  `texto` text NOT NULL,
  `numgusta` int(11) NOT NULL,
  `fecha` date NOT NULL,
  `usuario_idusuario` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `administrador`
--
ALTER TABLE `administrador`
  ADD PRIMARY KEY (`idadministrador`);

--
-- Indices de la tabla `estudiante`
--
ALTER TABLE `estudiante`
  ADD PRIMARY KEY (`idestudiante`,`programa_idprograma`),
  ADD KEY `fk_usuario_programa1_idx` (`programa_idprograma`);

--
-- Indices de la tabla `facultad`
--
ALTER TABLE `facultad`
  ADD PRIMARY KEY (`idfacultad`);

--
-- Indices de la tabla `programa`
--
ALTER TABLE `programa`
  ADD PRIMARY KEY (`idprograma`,`facultad_idfacultad`),
  ADD KEY `fk_carrera_facultad_idx` (`facultad_idfacultad`);

--
-- Indices de la tabla `publicacion`
--
ALTER TABLE `publicacion`
  ADD PRIMARY KEY (`idpublicacion`,`usuario_idusuario`),
  ADD KEY `fk_publicacion_usuario1_idx` (`usuario_idusuario`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `administrador`
--
ALTER TABLE `administrador`
  MODIFY `idadministrador` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `estudiante`
--
ALTER TABLE `estudiante`
  MODIFY `idestudiante` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT de la tabla `facultad`
--
ALTER TABLE `facultad`
  MODIFY `idfacultad` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `programa`
--
ALTER TABLE `programa`
  MODIFY `idprograma` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `publicacion`
--
ALTER TABLE `publicacion`
  MODIFY `idpublicacion` int(11) NOT NULL AUTO_INCREMENT;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `estudiante`
--
ALTER TABLE `estudiante`
  ADD CONSTRAINT `fk_usuario_programa1` FOREIGN KEY (`programa_idprograma`) REFERENCES `programa` (`idprograma`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `programa`
--
ALTER TABLE `programa`
  ADD CONSTRAINT `fk_carrera_facultad` FOREIGN KEY (`facultad_idfacultad`) REFERENCES `facultad` (`idfacultad`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `publicacion`
--
ALTER TABLE `publicacion`
  ADD CONSTRAINT `fk_publicacion_usuario1` FOREIGN KEY (`usuario_idusuario`) REFERENCES `estudiante` (`idestudiante`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
