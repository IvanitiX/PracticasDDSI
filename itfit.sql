-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 30-12-2019 a las 22:59:18
-- Versión del servidor: 10.4.10-MariaDB
-- Versión de PHP: 7.1.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `itfit`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `centro`
--

CREATE TABLE `centro` (
  `idCentro` varchar(3) NOT NULL,
  `Altas` int(11) DEFAULT NULL CHECK (`Altas` >= 0),
  `Bajas` int(11) DEFAULT NULL CHECK (`Altas` >= 0),
  `NumEmpleados` int(11) DEFAULT NULL CHECK (`NumEmpleados` >= 1)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `centro`
--

INSERT INTO `centro` (`idCentro`, `Altas`, `Bajas`, `NumEmpleados`) VALUES
('C01', 0, 0, 2),
('CO2', 1, 1, 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `incidencias`
--

CREATE TABLE `incidencias` (
  `IdCentro` varchar(3) NOT NULL,
  `IdMaquina` int(3) NOT NULL,
  `IdInstancia` int(11) NOT NULL,
  `IdIncidencia` int(11) NOT NULL,
  `Descripcion` varchar(100) NOT NULL,
  `FechaIncidencia` date NOT NULL,
  `Estado` varchar(30) NOT NULL CHECK (`Estado` in ('Enviada','Inspeccionando','Arreglando','Completada'))
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `inicio`
--

CREATE TABLE `inicio` (
  `Usuario` varchar(30) NOT NULL,
  `Contrasena` varchar(30) NOT NULL,
  `Rol` varchar(30) NOT NULL CHECK (`Rol` in ('Admin','Ventas','RRHH','Contabilidad','Inventario','Clientes'))
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `inicio`
--

INSERT INTO `inicio` (`Usuario`, `Contrasena`, `Rol`) VALUES
('Alberto', 'ITAlberto', 'Clientes'),
('Guillermo', 'ITGuillermo', 'Contabilidad'),
('Iván', 'ITIvan', 'Admin'),
('Iván2', 'ITIvan2', 'Inventario'),
('Migue', 'ITMigue', 'RRHH'),
('Octavio', 'ITOctavio', 'Ventas');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `maquinas`
--

CREATE TABLE `maquinas` (
  `IdCentro` varchar(3) NOT NULL,
  `IdMaquina` int(3) NOT NULL,
  `IdInstancia` int(11) NOT NULL,
  `Descripcion` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `maquinas`
--

INSERT INTO `maquinas` (`IdCentro`, `IdMaquina`, `IdInstancia`, `Descripcion`) VALUES
('C01', 1, 1, 'Cinta de correr'),
('C01', 1, 2, 'Cinta de Correr');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

CREATE TABLE `productos` (
  `IdProducto` int(11) NOT NULL,
  `Descripcion` varchar(30) DEFAULT NULL,
  `Cantidad` int(11) DEFAULT NULL,
  `Precio` float DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `productos`
--

INSERT INTO `productos` (`IdProducto`, `Descripcion`, `Cantidad`, `Precio`) VALUES
(1, 'Whey', 20, 35),
(2, 'LCarnitina', 49, 10);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `centro`
--
ALTER TABLE `centro`
  ADD PRIMARY KEY (`idCentro`);

--
-- Indices de la tabla `incidencias`
--
ALTER TABLE `incidencias`
  ADD PRIMARY KEY (`IdCentro`,`IdMaquina`,`IdInstancia`,`IdIncidencia`) USING BTREE,
  ADD KEY `IdMaquina` (`IdMaquina`),
  ADD KEY `IdInstancia` (`IdInstancia`);

--
-- Indices de la tabla `inicio`
--
ALTER TABLE `inicio`
  ADD PRIMARY KEY (`Usuario`,`Contrasena`);

--
-- Indices de la tabla `maquinas`
--
ALTER TABLE `maquinas`
  ADD PRIMARY KEY (`IdCentro`,`IdInstancia`,`IdMaquina`) USING BTREE,
  ADD KEY `IdMaquina` (`IdMaquina`),
  ADD KEY `IdInstancia` (`IdInstancia`);

--
-- Indices de la tabla `productos`
--
ALTER TABLE `productos`
  ADD PRIMARY KEY (`IdProducto`);

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `incidencias`
--
ALTER TABLE `incidencias`
  ADD CONSTRAINT `incidencias_ibfk_1` FOREIGN KEY (`IdCentro`) REFERENCES `maquinas` (`IdCentro`),
  ADD CONSTRAINT `incidencias_ibfk_2` FOREIGN KEY (`IdMaquina`) REFERENCES `maquinas` (`IdMaquina`),
  ADD CONSTRAINT `incidencias_ibfk_3` FOREIGN KEY (`IdInstancia`) REFERENCES `maquinas` (`IdInstancia`);

--
-- Filtros para la tabla `maquinas`
--
ALTER TABLE `maquinas`
  ADD CONSTRAINT `maquinas_ibfk_1` FOREIGN KEY (`IdCentro`) REFERENCES `centro` (`idCentro`);
COMMIT;

--
--RECURSOS HUMANOS
--
CREATE TABLE  `empleadostrabajan`(
`idEmpleado` varchar(8) NOT NULL, 
`nombre` varchar(10) NOT NULL,
`apellidos` varchar (30) NOT NULL,
`domicilio` varchar(30) NOT NULL,
`IdCentro` varchar(3) NOT NULL,
`correo` varchar(100) NOT NULL,
`Telefono` varchar(9) NOT NULL,
`dni` varchar(9) NOT NULL,
`Puesto` varchar(20) NOT NULL,
`Jornada` INT DEFAULT NULL,
`Estado` varchar(10) NOT NULL CHECK (`Estado` in ('Activo','Baja')),
Formación varchar(20) DEFAULT NULL


)ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE `formacion`(
  `idFormacion` varchar(20) NOT NULL,
  `fecha`date NOT NULL,
  `duraciondias`  INT(11) NOT NULL
)ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

ALTER TABLE `formacion`
  ADD PRIMARY KEY (`idFormacion`) USING BTREE;

ALTER TABLE `empleadostrabajan`
  ADD PRIMARY KEY (`IdEmpleado`) USING BTREE,
  ADD CONSTRAINT `empleadostrabajan_ibfk_1` FOREIGN KEY (`IdCentro`) REFERENCES `centro` (`idCentro`)
  ADD CONSTRAINT `empleadostrabajan_ibfk_2` FOREIGN KEY (`Formación`) REFERENCES `formacion` (`idFormacion`);




CREATE TABLE  `cadena`(
`idCadena` varchar(10) NOT NULL, 
`NumCentros` INT NOT NULL check(`NumCentros` >=1),
`Altas` INT NOT NULL check(`Altas` >= 0),
`Bajas` INT NOT NULL check(`Bajas` >= 0),
`NumEmpleados` INT NOT NULL,
`Maxempleados` INT NOT NULL,
`Vacantes` INT NOT NULL check (`Vacantes` <= `Maxempleados`)
)ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

ALTER TABLE `cadena`
  ADD PRIMARY KEY (`IdCadena`) USING BTREE;
  
INSERT INTO `cadena` (`idCadena`, `NumCentros`, `Altas`, `Bajas`, `NumEmpleados`, `Maxempleados`, `Vacantes`) VALUES ('España', '2', '0', '0', '5', '100', '95');

CREATE TABLE  `contiene`(
`idCentro` varchar(3) NOT NULL, 
`idCadena` varchar(10) NOT NULL
)ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;


ALTER TABLE `contiene`
  ADD PRIMARY KEY (`IdCentro`) USING BTREE,
  ADD CONSTRAINT `contiene_ibfk_1` FOREIGN KEY (`IdCentro`) REFERENCES `centro` (`idCentro`),
  ADD CONSTRAINT `contiene_ibfk_2` FOREIGN KEY (`IdCadena`) REFERENCES `cadena` (`idCadena`);

ALTER TABLE `empleadostrabajan` ADD `incorporacion` date DEFAULT  NULL;
INSERT INTO `contiene` (`idCentro`, `idCadena`) VALUES ('C01', 'España');
INSERT INTO `contiene` (`idCentro`, `idCadena`) VALUES ('CO2', 'España');

INSERT INTO `formacion` (`idFormacion`, `fecha`, `duraciondias`) VALUES ('Tecnofit', '2020-02-13', '15');
INSERT INTO `formacion` (`idFormacion`, `fecha`, `duraciondias`) VALUES ('+salud', '2020-01-30', '6');


INSERT INTO `empleadostrabajan` (`idEmpleado`, `nombre`, `apellidos`, `domicilio`, `IdCentro`, `correo`, `Telefono`, `dni`, `Puesto`, `Jornada`, `Estado`, `Formación`) VALUES ('8556491', 'Lorenzo', 'García Ferrer', 'c/Federico nº6', 'C01', 'lorenzo@gmail.com', '639752148', '8556491P', 'jefe sala', '0', 'Activo', NULL);
-------------------------------------------------------------
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
